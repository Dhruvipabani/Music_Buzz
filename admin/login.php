<?php
session_start();


if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin_page.php');
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === '123') {
        $_SESSION['admin_logged_in'] = true;

        header('Location: admin_page.php');
        exit();
    } else {
        $error_message = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Music Streaming Platform</title>
    <style>
       
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #009688, #004d40); /* Teal to light blue gradient */
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            padding: 2.5rem;
            width: 350px;
            text-align: center;
            transition: all 0.3s ease;
        }

        h1 {
            margin-bottom: 1.5rem;
            font-size: 24px;
            color: #333;
        }

        .input-group {
            margin-bottom: 1.25rem;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #4A5568;
            font-size: 14px;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem;
            font-size: 16px;
            border: 1px solid #CBD5E0;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .input-group input:focus {
            border-color: #38B2AC;
            box-shadow: 0 0 5px rgba(56, 178, 172, 0.4);
            outline: none;
        }

        button {
            width: 100%;
            padding: 0.75rem;
            background: #009688; /* Vibrant blue */
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #2B6CB0;
            box-shadow: 0 4px 10px rgba(49, 130, 206, 0.4);
        }

        .error-message {
            margin-top: 1rem;
            color: #E53E3E; 
            font-size: 14px;
            font-weight: bold;
        }

        @media (max-width: 500px) {
            .login-container {
                width: 90%;
                padding: 1.5rem;
            }
            h1 {
                font-size: 22px;
            }
        }
    
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form method="POST" action="">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <?php if (!empty($error_message)): ?>
            <div class="error-message">
                <?= $error_message="Incorrect Username and Password"; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
