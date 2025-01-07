<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Playlist</title>
    <link rel="stylesheet" href="styles.css">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #333;
    color: #fff;
    padding: 1em;
    text-align: center;
}

main {
    padding: 1em;
}

.playlist {
    max-width: 800px;
    margin: 0 auto;
}

h1, h2 {
    color: #333;
}

.track {
    display: flex;
    align-items: center;
    margin-bottom: 1em;
}

.track img {
    width: 60px;
    height: 60px;
    border-radius: 5px;
    margin-right: 1em;
}

.track-info {
    color: #333;
}

.track-title {
    font-weight: bold;
}

.tracklist {
    list-style: none;
    padding: 0;
}

.tracklist li {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ddd;
    padding: 0.5em 0;
}

.tracklist img {
    width: 50px;
    height: 50px;
    margin-right: 1em;
}

audio {
    margin-top: 0.5em;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 1em;
    position: fixed;
    width: 100%;
    bottom: 0;
}

        </style>
</head>
<body>
    <header>
        <h1>My Music Playlist</h1>
    </header>
    
    <main>
        <section class="playlist">
            <h2>Now Playing</h2>
            <div class="track">
                <img src="cover1.jpg" alt="Album Cover">
                <div class="track-info">
                    <p class="track-title">Song Title 1</p>
                    <p class="track-artist">Artist 1</p>
                    <audio controls>
                        <source src="path/to/song1.mp3" type="audio/mp3">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>

            <h2>Playlist</h2>
            <ul class="tracklist">
                <li>
                    <img src="cover2.jpg" alt="Album Cover">
                    <div class="track-info">
                        <p class="track-title">Song Title 2</p>
                        <p class="track-artist">Artist 2</p>
                        <audio controls>
                            <source src="path/to/song2.mp3" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </li>
                <li>
                    <img src="cover3.jpg" alt="Album Cover">
                    <div class="track-info">
                        <p class="track-title">Song Title 3</p>
                        <p class="track-artist">Artist 3</p>
                        <audio controls>
                            <source src="path/to/song3.mp3" type="audio/mp3">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </li>
                <!-- Add more tracks as needed -->
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Music Streaming Platform</p>
    </footer>
</body>
</html>
