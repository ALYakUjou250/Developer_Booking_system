<?php
session_start();
include 'db.php';

if (!isset($_SESSION['developer'])) {
    header("Location: login.php");
    exit();
}

$developer = $_SESSION['developer'];
$devData = $conn->query("SELECT id FROM developers WHERE name='$developer'")->fetch_assoc();
$developer_id = $devData['id'];

// Fetch appointments with correct customer details
$result = $conn->query("
    SELECT a.id AS appointment_id, a.system_type, a.status, a.meeting_date, 
           c.first_name, c.last_name, c.contact, c.address, c.email 
    FROM appointments a
    INNER JOIN customers c ON a.customer_id = c.id
    WHERE a.developer_id = '$developer_id'
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');

        body {
            font-family: 'Orbitron', sans-serif;
            background: black;
            color: #0f0;
            text-align: center;
        }

        h2 {
            text-shadow: 0 0 5px #0f0;
        }

        #background-video {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
            filter: brightness(50%) contrast(120%);
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.8);
        }

        th, td {
            border: 1px solid #0f0;
            padding: 10px;
            text-align: center;
        }

        th {
            background: rgba(0, 0, 0, 0.85);
            color: #0f0;
            text-shadow: 0 0 5px #0f0;
        }

        select, button {
            background: black;
            color: #0f0;
            border: 1px solid #0f0;
            padding: 5px;
            border-radius: 5px;
            cursor: pointer;
        }

        .update-btn, .delete-btn {
            background: #0f0;
            color: black;
            font-weight: bold;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .update-btn:hover, .delete-btn:hover {
            background: black;
            color: #0f0;
            box-shadow: 0 0 10px rgba(0, 255, 0, 1);
            transform: scale(1.05);
        }

        .delete-btn {
            background: red;
            color: white;
        }
    </style>
</head>
<body>
    <video id="background-video" autoplay loop muted>
        <source src="assets/hacker.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <h2>Welcome, <?php echo $developer; ?>!</h2>
    <a href="logout.php" style="color: red; font-weight: bold;">Logout</a>

    <h3>Your Appointments:</h3>

    <table>
        <tr>
            <th>Customer</th>
            <th>Contact</th>
            <th>Address</th>
            <th>Email</th>
            <th>System Type</th>
            <th>Meeting Date</th> <!-- Changed from Description -->
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr id="row-<?= $row['appointment_id']; ?>">
                <td><?= $row['first_name'] . " " . $row['last_name']; ?></td>
                <td><?= $row['contact']; ?></td>
                <td><?= $row['address']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['system_type']; ?></td>
                <td><?= date('Y-m-d', strtotime($row['meeting_date'])); ?></td> <!-- Formatted Date -->
                <td class="status-<?= $row['appointment_id']; ?>"><?= $row['status']; ?></td>
                <td>
                    <select class="status-select" data-id="<?= $row['appointment_id']; ?>">
                        <option value="Waiting" <?= $row['status'] == 'Waiting' ? 'selected' : ''; ?>>Waiting</option>
                        <option value="On Working" <?= $row['status'] == 'On Working' ? 'selected' : ''; ?>>On Working</option>
                        <option value="Completed" <?= $row['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                    </select>
                    <button class="update-btn" data-id="<?= $row['appointment_id']; ?>">Update</button>
                    <button class="delete-btn" data-id="<?= $row['appointment_id']; ?>">Delete</button>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <script>
        $(document).ready(function () {
            $(".update-btn").click(function () {
                var id = $(this).data("id");
                var newStatus = $(".status-select[data-id='" + id + "']").val();            

                $.ajax({
                    url: "update_status.php",
                    type: "POST",
                    data: { id: id, status: newStatus },
                    success: function (response) {
                        if (response === "success") {
                            $(".status-" + id).text(newStatus);
                        } else {
                            alert("Failed to update status.");
                        }
                    }
                });
            });

            $(".delete-btn").click(function () {
                var id = $(this).data("id");
                if (confirm("Are you sure you want to delete this appointment?")) {
                    $.ajax({
                        url: "delete_appointment.php",
                        type: "POST",
                        data: { id: id },
                        success: function (response) {
                            if (response === "success") {
                                $("#row-" + id).remove();
                            } else {
                                alert("Failed to delete appointment.");
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
