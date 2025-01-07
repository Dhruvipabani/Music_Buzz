<?php

$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "music";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $sql = "SELECT file_path FROM songs WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $song = $result->fetch_assoc();

    if ($song) {
    
        if ($song['file_path'] && file_exists($song['file_path'])) {
            unlink($song['file_path']);
        }

       
        $sql = "DELETE FROM songs WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            echo "<script>alert('Song deleted successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $song_title = $_POST['song_title'];
    $song_url = $_POST['song_url'];
    $song_file = $_FILES['song_file'];


    $file_path = '';

    if ($song_file['error'] == 0) {
     
        $upload_dir = 'uploads/';
        $file_path = $upload_dir . basename($song_file['name']);

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

       
        if (move_uploaded_file($song_file['tmp_name'], $file_path)) {
            echo "<script>alert('File uploaded successfully!');</script>";
        } else {
            echo "<script>alert('File upload failed!');</script>";
            $file_path = ''; 
        }
    } elseif ($song_url) {
        $file_path = $song_url;
    }

   
    if ($song_title && ($file_path || $song_url)) {
        $sql = "INSERT INTO songs (title, url, file_path) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $song_title, $song_url, $file_path);
        if ($stmt->execute()) {
            echo "<script>alert('Song added successfully!');</script>";
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Please provide a song title and either a URL or upload a file.');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Songs</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(180deg, #e0f7fa, #80deea);
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #444;
            font-size: 2em;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input, button {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
        }
        button {
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            font-size: 1.1em;
            transition: background 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .song-list {
            margin-top: 20px;
        }
        .song-item {
            padding: 15px;
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
            background: #f9f9f9;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .song-item:hover {
            background: #eaf6ff;
        }
        h3 {
            margin: 0;
            font-size: 1.1em;
            color: #222;
        }
        .no-songs {
            text-align: center;
            font-size: 1em;
            color: #666;
            padding: 10px;
            border-radius: 6px;
            background: #f9f9f9;
        }
        .delete-button {
            background: #ff4d4d;
            color: #fff;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9em;
            transition: background 0.3s ease;
        }
        .delete-button:hover {
            background: #cc0000;
        }
        
        .back-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    <a href="admin_page.php" class="back-btn">Back</a>
        <h1>Admin - Manage Songs</h1>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="song_title">Song Title:</label>
                <input type="text" id="song_title" name="song_title" placeholder="Enter song title" required>
            </div>

            <div class="form-group">
                <label for="song_url">Song URL:</label>
                <input type="text" id="song_url" name="song_url" placeholder="Enter song URL (optional)">
            </div>

            <div class="form-group">
                <label for="song_file">Upload MP3 File:</label>
                <input type="file" id="song_file" name="song_file" accept="audio/mpeg">
            </div>
            
            <button type="submit">Add Song</button>
        </form>

       
        <h2>Existing Songs</h2>
        <div class="song-list">
            <?php
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "SELECT id, title FROM songs";
            $result = $conn->query($sql);
            $conn->close();

            if ($result->num_rows > 0):
                while ($row = $result->fetch_assoc()): ?>
                    <div class="song-item">
                        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                        <a href="?delete_id=<?php echo $row['id']; ?>" class="delete-button">Delete</a>
                    </div>
                <?php endwhile;
            else: ?>
                <p class="no-songs">No songs available.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
