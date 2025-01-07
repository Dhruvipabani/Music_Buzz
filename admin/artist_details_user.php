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
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #acb6e5 100%);
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 20px;
            text-align: center;
        }
        .artist-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }
        .artist-info img {
            max-width: 250px;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        .artist-info h2 {
            color: #555;
            font-size: 1.8em;
            margin-top: 15px;
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        li {
            background: rgba(255, 255, 255, 0.8);
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        li span {
            font-size: 1.2em;
            color: #333;
            flex: 2;
            padding-right: 10px;
        }
        .audio-player {
            flex: 1;
            max-width: 350px;
            align-self: flex-end;
        }
        .audio-player audio {
            width: 100%;
            height: 30px;
            border-radius: 6px;
        }
        .back-btn {
            display: block;
            text-align: center;
            margin-top: 30px;
            font-size: 1.2em;
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 6px;
            box-shadow: 0 4px 10px rgba(0, 123, 255, 0.5);
            transition: all 0.3s ease;
        }
        .back-btn:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.7);
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="artist-info">
            <h1><?= isset($artist['artistName']) ? htmlspecialchars($artist['artistName']) : 'Unknown Artist' ?></h1>
            <img src="<?= isset($artist['albumArt']) ? htmlspecialchars($artist['albumArt']) : 'default-image.png'; ?>" alt="Album Art">
        </div>

        <!-- Display the list of songs -->
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

        <a href="artists_list.php" class="back-btn">Back to Artists List</a>
    </div>
</body>
</html>
