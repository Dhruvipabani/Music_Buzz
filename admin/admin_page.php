<!DOCTYPE html>
<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Music Streaming Platform</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(to right, #009688, #004d40); /* Teal gradient */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dashboard-container {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.3);
            padding: 2.5rem;
            width: 400px;
            text-align: center;
            animation: fadeIn 1.5s ease-in-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .dashboard-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.4);
        }

        h1 {
            margin-bottom: 1.5rem;
            color: #333333;
            font-size: 1.75rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        p.welcome-message {
            margin-bottom: 2rem;
            color: #666666;
            font-size: 1.1rem;
            font-weight: 400;
        }

        button {
            display: block;
            width: calc(100% - 2rem);
            padding: 1rem;
            margin: 0.75rem auto;
            background: #009688; /* Teal */
            color: #ffffff;
            border: none;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background: #00796b; /* Darker teal */
            transform: translateY(-4px);
        }

        button:active {
            transform: translateY(0);
        }

        .logout {
            margin-top: 1.5rem;
            font-size: 1rem;
        }

        .logout a {
            color: #004d40; /* Dark slate */
            text-decoration: none;
            font-weight: 600;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .logout a:hover {
            color: #00796b; /* Darker teal */
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
    <h1 style="font-family: Arial, sans-serif; color: #4CAF50; text-align: center; font-size: 36px; margin-top: 50px; letter-spacing: 2px;">Welcome to the Admin Dashboard</h1>

<p class="welcome-message" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: #555555; text-align: center; font-size: 20px; margin: 20px 0; line-height: 1.6;">
You are logged in as the admin.
</p>

        <button onclick="location.href='admin_songs.php'">Add song</button>
        <button onclick="location.href='add_artist.php'">Add Artist</button>
        <button onclick="location.href='view_login.php'">View Logged-In Users</button>
        <button onclick="location.href='view_contact.php'">Contact</button>
        <div class="logout">
    <a href="logout.php" onclick="handleLogout(event)">Logout</a>
</div>

<script>
    function handleLogout(event) {
        event.preventDefault(); 
        const confirmLogout = confirm("Are you sure you want to logout?");
        if (confirmLogout) {
          
            window.location.href = 'logout.php';
        }
    }
</script>

   
</body>
</html>
