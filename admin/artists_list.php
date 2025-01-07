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
    <title>Artists List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #7f7fd5 0%, #86a8e7 50%, #91eae4 100%); /* Updated background gradient */
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 30px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            position: relative;
        }
        h1 {
            color: #333;
            font-size: 2.5em;
            margin-bottom: 30px;
            text-align: center;
            font-weight: bold;
        }
        .artist-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .artist-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 220px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 12px;
            padding: 15px;
            background: #e0f7fa;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .artist-item:hover {
            transform: scale(1.08);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }
        .artist-item img {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }
        .artist-item a {
            display: block;
            background-color: #00695c;
            color: white;
            padding: 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .artist-item a:hover {
            background-color: #004d40;
        }
        .no-artists {
            text-align: center;
            font-size: 1.2em;
            color: #333;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #ff8c00;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .back-btn:hover {
            background-color: #e67e22;
        }

        footer {
            background-color: #111;
            color: white;
            padding: 40px 0;
            width: 100%;
            margin-top: 50px;
        }

        .footer-links ul {
            list-style: none;
            padding-left: 0;
        }

        .footer-links ul li {
            display: inline-block;
            margin-right: 15px;
        }

        .footer-links a {
            color: #fff;
            text-decoration: none;
        }

        .footer-links a:hover {
            color: #ff8c00;
        }

        .social-icons {
            text-align: center;
        }

        .social-icons i {
            margin: 0 10px;
            color: white;
            font-size: 20px;
        }

        .social-icons i:hover {
            color: #ff8c00;
        }

        .copy-right {
            text-align: center;
            color: #818181;
            padding: 20px 0 0;
        }

        .totop {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .totop a {
            color: white;
            background-color: #ff8c00;
            padding: 10px;
            border-radius: 50%;
        }

        .totop a:hover {
            background-color: #111;
        }
    </style>
</head>
<body>
    <div class="container">
       
        <a href="../index.php" class="back-btn">Back</a>
        
        <h1>Artists List</h1>

        <div class="artist-list">
            <?php if (!empty($artists)): ?>
                <?php foreach ($artists as $index => $artist): ?>
                    <div class="artist-item">
                        <img src="<?= isset($artist['albumArt']) ? htmlspecialchars($artist['albumArt']) : 'default-image.png'; ?>" alt="Artist Picture">
                        <a href="artist_details_user.php?artistIndex=<?= urlencode($index) ?>">
                            <?= htmlspecialchars($artist['artistName']) ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-artists">No artists available.</p>
            <?php endif; ?>
        </div>
    </div>

    <span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>
</body>
</html>
