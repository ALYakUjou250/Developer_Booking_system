<?php
session_start();
include 'db.php';

$error = ""; // Error message holder

if (isset($_POST['login'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $result = $conn->query("SELECT * FROM developers WHERE name='$name' AND password='$password'");
    
    if ($result->num_rows > 0) {
        $_SESSION['developer'] = $name;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Developer Name or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: black;
            color: #0f0;
            font-family: "Orbitron", sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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

        .login-container {
            background: rgba(0, 0, 0, 0.85);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 255, 0, 0.8);
            text-align: center;
            width: 350px;
        }

        h2 {
            font-size: 24px;
            text-shadow: 0 0 5px #0f0;
        }

        .error-msg {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
            text-shadow: 0 0 5px red;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            background: black;
            color: #0f0;
            border: 1px solid #0f0;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            transition: 0.3s;
        }

        input:focus {
            border-color: cyan;
            box-shadow: 0 0 10px cyan;
            outline: none;
        }

        .login-btn {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            background: #0f0;
            color: black;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.8);
            cursor: pointer;
            transition: 0.3s;
        }

        .login-btn:hover {
            background: black;
            color: #0f0;
            box-shadow: 0 0 20px rgba(0, 255, 0, 1);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<video id="background-video" autoplay loop muted>
        <source src="assets/hacker.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="login-container">
        <h2>Developer Login</h2>

        <?php if ($error) echo "<p class='error-msg'>$error</p>"; ?>

        <form action="" method="POST">
            <input type="text" name="name" placeholder="Developer Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
