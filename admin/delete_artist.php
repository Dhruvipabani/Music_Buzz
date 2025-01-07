<?php

$artistsFile = 'artists.json';
$artists = [];
if (file_exists($artistsFile)) {
    $artists = json_decode(file_get_contents($artistsFile), true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deleteArtist'])) {
        $artistIndex = $_POST['artistIndex'] ?? '';

        if (is_numeric($artistIndex) && isset($artists[$artistIndex])) {
           
            array_splice($artists, $artistIndex, 1);

           
            file_put_contents($artistsFile, json_encode($artists));

      
            header('Location: delete_artist.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Artists - Music Streaming Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .artist-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .artist-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .artist-card:hover {
            transform: scale(1.05);
        }
        .artist-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .artist-name {
            font-size: 18px;
            color: #333;
            margin-top: 15px;
            font-weight: bold;
        }
        
        .delete-btn {
            background-color: #ff4c4c;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
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
        <h1>Delete Artists</h1>
        <div class="artist-list">
            <?php if (!empty($artists)): ?>
                <?php foreach ($artists as $index => $artist): ?>
                    <div class="artist-card">
                        <img src="<?= htmlspecialchars($artist['albumArt']); ?>" alt="Album Art">
                        <p class="artist-name"><?= htmlspecialchars($artist['artistName']); ?></p>

                      
                        <form action="delete_artist.php" method="post">
                            <input type="hidden" name="artistIndex" value="<?= $index; ?>">
                            <button type="submit" name="deleteArtist" class="delete-btn">Delete Artist</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="text-align: center; color: #777;">No artists available to delete.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
