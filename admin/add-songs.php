<?php

$artistsFile = 'artists.json';
$artists = [];
if (file_exists($artistsFile)) {
    $artists = json_decode(file_get_contents($artistsFile), true);
}


$artistIndex = $_GET['artistIndex'] ?? null;
$artist = $artists[$artistIndex] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addSong'])) {
    $songName = $_POST['songName'] ?? '';

    
    $songFilePath = '';
    if (isset($_FILES['songFile']) && $_FILES['songFile']['error'] === UPLOAD_ERR_OK) {
        $songDir = 'uploads/songs/';
        if (!is_dir($songDir)) {
            mkdir($songDir, 0755, true);
        }
        $songFilePath = $songDir . basename($_FILES['songFile']['name']);
        move_uploaded_file($_FILES['songFile']['tmp_name'], $songFilePath);
    }

   
    if ($artist) {
        $newSong = [
            'name' => $songName,
            'file' => $songFilePath, 
        ];

      
        if (!isset($artists[$artistIndex]['songs']) || !is_array($artists[$artistIndex]['songs'])) {
            $artists[$artistIndex]['songs'] = [];
        }

        $artists[$artistIndex]['songs'][] = $newSong;

      
        file_put_contents($artistsFile, json_encode($artists));

        header('Location: artist-details.php?artistIndex=' . $artistIndex);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Songs to Artist</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="text"]:focus,
        input[type="file"]:focus {
            outline: none;
            border-color: #007bff;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Songs to <?= htmlspecialchars($artist['artistName']) ?></h1>

      
        <form action="add-songs.php?artistIndex=<?= $artistIndex ?>" method="POST" enctype="multipart/form-data">
            <div>
                <label for="songName">Song Name:</label>
                <input type="text" id="songName" name="songName" required>
            </div>

            <div>
                <label for="songFile">Upload Song (MP3):</label>
                <input type="file" id="songFile" name="songFile" accept="audio/*" required>
            </div>

            <button type="submit" name="addSong">Add Song</button>
        </form>

        <a href="artist-details.php?artistIndex=<?= $artistIndex ?>" class="back-link">Back to Artist Details</a>
    </div>
</body>
</html>
