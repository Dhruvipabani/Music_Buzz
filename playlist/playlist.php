<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Playlists</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background: linear-gradient(135deg, #000440, #ff5400); 
            background-size: cover;
            color: #ffffff;
        }

        .container {
            position: relative;
            z-index: 2;
            padding: 20px;
        }

        .playlist-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            width: 80%;
            max-width: 800px;
            margin: auto;
        }

        .playlist {
            width: 250px;
            background-color: #1e1e1e;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
            text-decoration: none; 
        }

        .playlist:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.5);
            background-color: #2a2a2a;
        }

        .playlist img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-bottom: 3px solid #ff6600; 
        }

        .playlist-title {
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            background-color: #222;
            text-align: center;
            color: #ffffff;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #ff6600;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .back-button:hover {
            background-color: #e65c00;
        }
    </style>
</head>
<body>

    <a href="../index.php" >  <img class="img-responsive" src="images/logo5.png" alt="" height="65px" width="120px"></a>

    <div class="container">
        <div class="playlist-container">
            <a href="playlist1.php" class="playlist">
                <img src="images/1.jpg" alt="Playlist 1" style="height: 300px; width: 240px;">
                <div class="playlist-title">Best Of Romance</div>
            </a>

            <a href="playlist2.php" class="playlist">
                <img src="images/p2.jpg" alt="Playlist 2" style="height: 300px; width: 240px;">
                <div class="playlist-title">Dance Hits 2024</div>
            </a>

            <a href="playlist3.php" class="playlist"> 
                <img src="images/p3.jpg" alt="Playlist 3" style="height: 300px; width: 240px;">
                <div class="playlist-title">Let's Play - Arijit Singh</div>
            </a>

            <a href="playlist4.php" class="playlist">
                <img src="images/p4.jpg" alt="Playlist 4" style="height: 300px; width: 290px;">
                <div class="playlist-title">Best Of Hip Hop</div>
            </a>

            <a href="playlist5.php" class="playlist">
                <img src="images/p5.jpg" alt="Playlist 5" style="height: 300px; width: 290px;">
                <div class="playlist-title">Best Of Dance</div>
            </a>

            <a href="playlist6.php" class="playlist">
                <img src="images/p6.jpg" alt="Playlist 6" style="height: 300px; width: 280px;">
                <div class="playlist-title">Best Of 2010s</div>
            </a>
        </div>
    </div>

</body>
</html>
