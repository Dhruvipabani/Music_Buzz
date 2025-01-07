<?php
$artistsFile = 'artists.json';
$artists = [];
if (file_exists($artistsFile)) {
    $artists = json_decode(file_get_contents($artistsFile), true);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Artists - Music Streaming Platform</title>
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
        .artist-genre {
            font-size: 14px;
            color: #777;
            margin-top: 5px;
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
        .no-artists {
            text-align: center;
            color: #777;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="admin_page.php" class="back-btn">Back</a>
        <h1>All Artists</h1>
        
        <?php if (!empty($artists)): ?>
            <div class="artist-list">
                <?php foreach ($artists as $index => $artist): ?>
                    <div class="artist-card" onclick="location.href='add-songs.php?artistIndex=<?= htmlspecialchars($index, ENT_QUOTES, 'UTF-8'); ?>';">
                        <img src="<?= htmlspecialchars($artist['albumArt'], ENT_QUOTES, 'UTF-8'); ?>" alt="Album Art">
                        <p class="artist-name"><?= htmlspecialchars($artist['artistName'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="no-artists">No artists available. Please add some artists first.</p>
        <?php endif; ?>
    </div>
</body>
</html>
