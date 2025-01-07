<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Of Romance</title>
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

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #ff6600;
           
            border: none;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        .back-button:hover {
            background-color: #cc5200;
           
        }

        .song-list {
            width: 80%;
            max-width: 800px;
            margin: auto;
            background-color: #1e1e1e;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .song {
            padding: 15px;
            border-bottom: 1px solid #444;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2a2a2a;
            border-radius: 10px;
            margin-bottom: 10px;
        }

        .song button {
            background-color: #ff6600;
           
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 10px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .song button:hover {
            background-color: #cc5200;
           
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="playlist.php" class="back-button">Back</a>
        <center>
            <h2>Let's Play - Arijit Singh</h2>
        </center>
        <div class="song-list">
            <div class="song">
            Ishq Wala
                <button onclick="togglePlayPause(event, 'audio1')">Play</button>
                <audio id="audio1" src="audio/Ishq Wala.mp3"></audio>
            </div>
            <div class="song">
            Jag Ghoomeya
                <button onclick="togglePlayPause(event, 'audio2')">Play</button>
                <audio id="audio2" src="audio/Jag Ghoomeya.mp3"></audio>
            </div>
            <div class="song">
            Tujhe Kitna Chahein
                <button onclick="togglePlayPause(event, 'audio3')">Play</button>
                <audio id="audio3" src="audio/Tujhe Kitna Chahein.mp3"></audio>
            </div>
            <div class="song">
            Ve Maahi
                <button onclick="togglePlayPause(event, 'audio4')">Play</button>
                <audio id="audio4" src="audio/Ve Maahi.mp3"></audio>
            </div>
            <div class="song">
            Mere Naam Tu
                <button onclick="togglePlayPause(event, 'audio5')">Play</button>
                <audio id="audio5" src="audio/Mere Naam Tu.mp3"></audio>
            </div>
            <div class="song">
            Malhari
                <button onclick="togglePlayPause(event, '')">Play</button>
                <audio id="audio1" src="audio/Aaj Ki R.mp3"></audio>
            </div>
            <div class="song">


            Tattad Tattad
                <button onclick="togglePlayPause(event, '')">Play</button>
                <audio id="audio1" src="audio/Aaj Ki Raat.mp3"></audio>
            </div>

            
        </div>
    </div>

    <script>
        function togglePlayPause(event, audioId) {
            event.stopPropagation(); 

            const button = event.target;
            const audio = document.getElementById(audioId);

            const allAudios = document.querySelectorAll('audio');
            allAudios.forEach(a => {
                if (a !== audio) {
                    a.pause();
                }
            });

            
            if (audio.paused) {
                audio.play();
                button.textContent = 'Pause';
            } else {
                audio.pause();
                button.textContent = 'Play';
            }
        }
    </script>
</body>

</html>