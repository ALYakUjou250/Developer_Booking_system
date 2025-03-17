<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $system_type = mysqli_real_escape_string($conn, $_POST['system_type']);
    $developer_id = mysqli_real_escape_string($conn, $_POST['developer_id']);
    $meeting_date = mysqli_real_escape_string($conn, $_POST['meeting_date']);

    // Convert date to UNIX timestamp
    $selected_date = strtotime($meeting_date);
    $current_date = strtotime(date("Y-m-d")); // Today's date
    $min_date = strtotime("+3 days", $current_date); // 3 days from today

    // Validate date
    if ($selected_date < $min_date) {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Error</title>
            <link rel="stylesheet" href="styles.css">
            <style>
                body {
                    background: black;
                    color: red;
                    font-family: "Orbitron", sans-serif;
                    text-align: center;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                }
                .error-msg {
                    font-size: 20px;
                    color: red;
                    text-shadow: 0 0 10px red;
                    margin-bottom: 20px;
                }
                .back-btn {
                    display: inline-block;
                    padding: 10px 20px;
                    font-size: 16px;
                    font-weight: bold;
                    text-transform: uppercase;
                    text-decoration: none;
                    background: red;
                    color: black;
                    border-radius: 5px;
                    box-shadow: 0 0 10px rgba(255, 0, 0, 0.8);
                    transition: 0.3s ease-in-out;
                }
                .back-btn:hover {
                    background: black;
                    color: red;
                    box-shadow: 0 0 20px rgba(255, 0, 0, 1);
                    transform: scale(1.1);
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Error!</h2>
                <p class="error-msg">Invalid appointment date! Please select a date at least 3 days from today.</p>
                <a href="index.php" class="back-btn">Go Back</a>
            </div>
        </body>
        </html>';
        exit(); // Stop execution if the date is invalid
    }

    // Check if customer already exists
    $check = $conn->query("SELECT * FROM customers WHERE email='$email'");
    if ($check->num_rows == 0) {
        $conn->query("INSERT INTO customers (first_name, last_name, contact, address, email) 
                      VALUES ('$first_name', '$last_name', '$contact', '$address', '$email')");
        $customer_id = $conn->insert_id;
    } else {
        $row = $check->fetch_assoc();
        $customer_id = $row['id'];
    }

    // Insert booking
    $conn->query("INSERT INTO appointments (customer_id, developer_id, system_type, meeting_date) 
                  VALUES ('$customer_id', '$developer_id', '$system_type', '$meeting_date')");

    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Success</title>
        <link rel="stylesheet" href="styles.css">
        <style>
            body {
                background: black;
                color: #0f0;
                font-family: "Orbitron", sans-serif;
                text-align: center;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .success-msg {
                font-size: 20px;
                color: #0f0;
                text-shadow: 0 0 10px #0f0;
                margin-bottom: 20px;
            }
            .back-btn {
                display: inline-block;
                padding: 10px 20px;
                font-size: 16px;
                font-weight: bold;
                text-transform: uppercase;
                text-decoration: none;
                background: #0f0;
                color: black;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 255, 0, 0.8);
                transition: 0.3s ease-in-out;
            }
            .back-btn:hover {
                background: black;
                color: #0f0;
                box-shadow: 0 0 20px rgba(0, 255, 0, 1);
                transform: scale(1.1);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Booking Confirmed!</h2>
            <p class="success-msg">Your appointment has been successfully submitted. Please wait for an email confirmation from the developer.</p>
            <a href="index.php" class="back-btn">Back to Home</a>
        </div>
    </body>
    </html>';
}
?>
