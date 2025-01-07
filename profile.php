<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['new_name'])) {
        $_SESSION['user_name'] = htmlspecialchars($_POST['new_name']);
    }

    if (isset($_FILES['profile_image'])) {
        $fileTmpPath = $_FILES['profile_image']['tmp_name'];
        $fileName = $_FILES['profile_image']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = 'uploads/';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }
            $dest_path = $uploadFileDir . uniqid() . '.' . $fileExtension;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $_SESSION['profile_image'] = $dest_path;
            }
        }
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('Refresh: 2; URL=profile.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #1f4037, #99f2c8);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            background-color: rgba(30, 30, 30, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
            width: 400px;
            text-align: center;
        }
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto;
            margin-bottom: 20px;
            background-image: url('https://via.placeholder.com/120');
            background-size: cover;
            background-position: center;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 10px;
            color: #ff8c00;
        }
        p {
            font-size: 16px;
            color: #ddd;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="file"] {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            background-color: #282828;
            color: #fff;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="text"]:focus, input[type="file"]:focus {
            background-color: #3a3a3a;
            outline: none;
        }
        input[type="submit"] {
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #1db954;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #17a74a;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .logout-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .logout-button:hover {
            background-color: #ff3333;
        }
    </style>
</head>
<body>

    <div class="profile-container">
        <div class="profile-pic" id="profilePic" style="background-image: url('<?php echo isset($_SESSION['profile_image']) ? $_SESSION['profile_image'] : 'https://via.placeholder.com/120'; ?>');"></div>

        <h1 id="displayName">
            <?php 
                echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Guest';
            ?>
        </h1>

        <form id="editProfileForm" method="POST" enctype="multipart/form-data">
            <input type="text" id="userName" name="new_name" placeholder="Enter new name" />
            <input type="file" id="profileImage" name="profile_image" accept="image/*" />
            <input type="submit" value="Save Changes">
        </form>

        <a class="back-button" href="index.php">Back to Home</a>
        
    </div>

</body>
</html>
