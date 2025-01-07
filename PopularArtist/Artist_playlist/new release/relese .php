<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Releases</title>
    <link rel="stylesheet" href="styles.css">
    <style>
/* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
}

header {
    background: #333;
    color: #fff;
    padding: 10px 0;
    text-align: center;
}

header h1 {
    margin: 0;
}

main {
    padding: 20px;
}

.song-list {
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.song-list h2 {
    margin-bottom: 20px;
    color: #333;
}

ul {
    list-style: none;
}

li {
    margin-bottom: 20px;
}

.title {
    font-weight: bold;
}

.artist {
    font-style: italic;
    color: #666;
}

audio {
    display: block;
    margin-top: 10px;
    width: 100%;
}

footer {
    background: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    width: 100%;
    bottom: 0;
}


    </style>
</head>
<body>
    <header>
        <h1>New Releases</h1>
    </header>
    <main>
        <section class="song-list">
            <h2>Latest Songs</h2>
            <ul>
                <li>
                    <span class="title">Song Title 1</span> by <span class="artist">Artist Name 1</span>
                    <audio controls>
                        <source src="path/to/song1.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </li>
                <li>
                    <span class="title">Song Title 2</span> by <span class="artist">Artist Name 2</span>
                    <audio controls>
                        <source src="path/to/song2.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </li>
                <li>
                    <span class="title">Song Title 3</span> by <span class="artist">Artist Name 3</span>
                    <audio controls>
                        <source src="path/to/song3.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </li>
                <li>
                    <span class="title">Song Title 4</span> by <span class="artist">Artist Name 4</span>
                    <audio controls>
                        <source src="path/to/song4.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </li>
                <li>
                    <span class="title">Song Title 5</span> by <span class="artist">Artist Name 5</span>
                    <audio controls>
                        <source src="path/to/song5.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Music Inc.</p>
    </footer>
</body>
</html>
