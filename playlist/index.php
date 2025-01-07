<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlist</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .playlist {
            cursor: pointer;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .playlist img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }
        .playlist-title {
            font-size: 1.2em;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .songs {
            display: none;
        }
        .song {
            margin: 10px 0;
            display: flex;
            align-items: center;
        }
        .song button {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="playlist" onclick="togglePlaylist(1)">
        <img src="images/playlist1-cover.jpg" alt="Playlist 1">
        <div class="playlist-title">Playlist 1</div>
        <div class="songs" id="playlist1">
            <div class="song">
                AAA
                <button onclick="togglePlayPause(event, 'audio1')">Play</button>
                <audio id="audio1" src="audio/Aaj-Ki-Raat.mp3"></audio>
            </div>
            <div class="song">
                Song 1-2
                <button onclick="togglePlayPause(event, 'audio2')">Play</button>
                <audio id="audio2" src="audio/song1-2.mp3"></audio>
            </div>
        </div>
    </div>

    <script>
        function togglePlayPause(event, audioId) {
            event.stopPropagation(); 
            const button = event.target;
            const audio = document.getElementById(audioId);

            if (audio.paused) {
                audio.play();
                button.textContent = 'Pause';
            } else {
                audio.pause();
                button.textContent = 'Play';
            }
        }

        function togglePlaylist(playlistId) {
            const playlist = document.getElementById(`playlist${playlistId}`);
            if (playlist.style.display === 'none' || playlist.style.display === '') {
                playlist.style.display = 'block';
            } else {
                playlist.style.display = 'none';
            }
        }
    </script>
</body>
</html>
