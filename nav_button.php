<?php
session_start();


$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$email = isset($_SESSION['email']) ? $_SESSION['email'] : 'guest@example.com';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button with Sub-options</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .button-container {
            position: relative;
            display: inline-block;
        }

        .main-btn {
            background-color: #007bff;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            position: relative;
            transition: background-color 0.3s ease;
        }

        .main-btn:hover {
            background-color: #0056b3;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 200px;
            z-index: 1;
            text-align: left;
        }

        .dropdown-content button {
            width: 100%;
            padding: 12px;
            text-align: left;
            background-color: white;
            border: none;
            color: #333;
            font-size: 14px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
        }

        .dropdown-content button:last-child {
            border-bottom: none;
        }

        .dropdown-content button:hover {
            background-color: #f1f1f1;
        }

        /* Show dropdown on button click */
        .button-container:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

    <div class="button-container">
        <!-- Main Button -->
        <button class="main-btn">Options</button>

       
        <div class="dropdown-content">
            <button>User: <?= htmlspecialchars($username); ?><br>Email: <?= htmlspecialchars($email); ?></button>
        
            
            <button onclick="window.location.href='admin_dashboard.php'">Go to Admin</button>
        </div>
    </div>

</body>
</html>
