<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Booking</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');

        body {
            margin: 0;
            padding: 0;
            font-family: 'Orbitron', sans-serif;
            color: #0f0;
            text-align: center;
            background: black;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .container {
            width: 40%;
            margin: auto;
            padding: 20px;
            background: rgba(0, 0, 0, 0.85);
            color: #0f0;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.8);
            text-transform: uppercase;
            flex: 1;
        }

        h2 {
            font-family: 'Press Start 2P', cursive;
            font-size: 18px;
            text-shadow: 0 0 5px #0f0;
        }

        input, textarea, select, button {
            width: 100%;
            margin: 10px 0;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            text-align: left;
        }

        input, textarea, select {
            background: rgba(0, 255, 0, 0.2);
            color: #0f0;
            border: 1px solid #0f0;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        button {
            cursor: pointer;
            font-weight: bold;
            text-transform: uppercase;
            padding: 12px 20px;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.7);
        }

        .submit {
            background: #0f0;
            color: #000;
        }

        .cancel {
            background: #ff0033;
            color: white;
        }

        footer {
            text-align: center;
            padding: 2px;
            background-color: #fff;
            color: rgb(0, 0, 0);
            opacity: 1;
            margin-top: auto;
            z-index: 1;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .footer-links a {
            text-decoration: none;
            color: #000;
            font-size: 14px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .social-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px;
        }

        .social-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .social-logo:hover {
            transform: scale(1.20);
        }

        .coc2-logo-container {
            text-align: center;
            margin-top: 10px;
        }

        .coc2-logo {
            width: 500px;
            height: 100px;
            object-fit: contain;
            margin: 0 auto;
        }

        footer .social-links img:last-child {
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <video id="background-video" autoplay loop muted>
        <source src="assets/hacker.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="container">
        <h2>Book a Developer</h2>
        <form action="submit.php" method="POST">
            <input type="text" name="first_name" placeholder="First Name" required>
            <input type="text" name="last_name" placeholder="Last Name" required>
            <input type="text" name="contact" placeholder="Contact" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="email" name="email" placeholder="Email" required>

            <label for="system_type">Choose System Type:</label>
            <select name="system_type" id="system_type" required onchange="updatePrice()">
                <option value="" disabled selected>Select a system</option>
                <option value="POS System" data-price="₱15,000">POS System - ₱15,000</option>
                <option value="Payroll System" data-price="₱10,000">Payroll System - ₱10,000</option>
                <option value="Booking System" data-price="₱8,000">Booking System - ₱8,000</option>
                <option value="Inventory System" data-price="₱12,000">Inventory System - ₱12,000</option>
                <option value="Custom System" data-price="₱20,000">Custom System - ₱20,000</option>
            </select>
            <label for="meeting_date">Select Date:</label>
            <input type="date" name="meeting_date" id="meeting_date" required onfocus="this.showPicker()" style="color: gray;" oninput="this.style.color='white';">

            <select name="developer_id" required>
                <?php
                $result = $conn->query("SELECT * FROM developers");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['name']}</option>";
                }
                ?>
            </select>

            <div class="button-group">
                <button type="submit" name="submit" class="submit">Submit</button>
                <button type="button" class="cancel" onclick="window.location.href='index.html'">Cancel</button>
            </div>
        </form>
    </div>

    <footer>
        <div class="social-links">
            <a href="https://www.facebook.com" target="_blank">
                <img src="assets/facebook.png" alt="Facebook Logo" class="social-logo">
            </a>
            <a href="https://www.facebook.com/@phinmaofficial/" target="_blank">
                <img src="assets/phinma.jpg" alt="YouTube Logo" class="social-logo">
            </a>
            <a href="https://www.facebook.com/phinmaed.cite" target="_blank">
                <img src="assets/cite.jpg" alt="Twitter Logo" class="social-logo">
            </a>
        </div>
        <p>&copy; 2025 Team Anonymous. All Rights Reserved.</p>
    </footer>

    <script>
        function updatePrice() {
            var systemType = document.getElementById("system_type");
            var selectedOption = systemType.options[systemType.selectedIndex];
            var price = selectedOption.getAttribute("data-price") || "-";
            document.getElementById("price_display").innerText = "Price: " + price;
        }
    </script>

</body>
</html>
