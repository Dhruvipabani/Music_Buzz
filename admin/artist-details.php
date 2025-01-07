<?php
// Fetch artists from file
$artistsFile = 'artists.json';
$artists = [];
if (file_exists($artistsFile)) {
    $artists = json_decode(file_get_contents($artistsFile), true);
}

// Get the selected artist's index from URL
$artistIndex = $_GET['artistIndex'] ?? null;

// Ensure $artistIndex is a valid integer and within bounds
if (is_numeric($artistIndex) && isset($artists[$artistIndex])) {
    $artist = $artists[$artistIndex];
} else {
    // Handle the case where the artist index is invalid
    echo 'Invalid artist index.';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
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
            color: #444;
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
        }
        img {
            max-width: 200px;
            height: auto;
            border-radius: 6px;
            display: block;
            margin: 0 auto;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 15px;
        }
        .audio-player {
            margin-top: 10px;
        }
        .audio-player audio {
            width: 100%;
        }
        a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
        }
        a:hover {
            background-color: #0056b3;
        }
        /* Back button style */
        .back-btn {
            display: inline-block;
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .back-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Back button to redirect to allartist.php -->
    <a href="allartists.php" class="back-btn">Back to All Artists</a>

    <div class="container">
        <h1>Artist Details: <?= isset($artist['artistName']) ? htmlspecialchars($artist['artistName']) : 'Unknown Artist' ?></h1>

        <!-- Display artist information -->
        <img src="<?= isset($artist['albumArt']) ? htmlspecialchars($artist['albumArt']) : 'default-image.png'; ?>" alt="Album Art">

        <!-- Display the list of songs -->
        <h2>Songs</h2>
        <ul>
            <?php if (isset($artist['songs']) && is_array($artist['songs']) && !empty($artist['songs'])): ?>
                <?php foreach ($artist['songs'] as $song): ?>
                    <li>
                        <span><?= htmlspecialchars($song['name']) ?></span>

                        <!-- Provide an audio player for the song -->
                        <?php if (!empty($song['file'])): ?>
                            <div class="audio-player">
                                <audio controls>
                                    <source src="<?= htmlspecialchars($song['file']) ?>" type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li>No songs available for this artist.</li>
            <?php endif; ?>
        </ul>

        <a href="add-songs.php?artistIndex=<?= htmlspecialchars($artistIndex) ?>">Add More Songs</a>
    </div>
</body>
</html>
