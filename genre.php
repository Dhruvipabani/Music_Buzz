<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Genre</title>
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your,Keywords">
    <meta name="author" content="HimanshuGupta">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style-font.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-color.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('img/banner/.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        img.img-responsive {
            display: none;
        }

        .search {
            display: flex;
            align-items: center;
            gap: 6px;
            height: 10%;
            width: 40%;
            background-color: rgba(29, 29, 29, 0.9);
            border: 1px solid #464748;
            padding: 10px;
            border-radius: 8px;
            margin: -110px 500px -100px 20px;
        }

        .search input {
            flex-grow: 1;
            background: none;
            border: none;
            color: #fff;
            outline: none;
            height: 100%;
        }

        .search button {
            background-color: #464748;
            border: none;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            padding: 25px 20px;
            font-size: 15px;
            font-weight: 700;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            min-width: 160px;
            z-index: 1;
            right: 0;
            left: 0;
            background-color: #333;
            border-radius: 4px;
        }

        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
            color: black;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
</head>

<body style="margin: 0; padding: 0; height: 100vh; display: flex; flex-direction: column; align-items: center; justify-content: center; background-image: url('img/banner/b3.avif'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <?php include 'header.php'; ?>
    <h2 style="color: #fff; text-align: left; margin: -130px 800px 10px 20px;">Yo, pick your jam genre</h2>
    <h2 style="color: #fff; text-align: left; margin: 10px 600px 20px 20px;">and let’s get this party started!</h2>

    <div class="search" style="display: flex; align-items: center; gap: 6px; width: 50%; background-color: transparent; border: 1px solid #464748; padding: 10px; border-radius: 8px; margin: 50px 400px -50px 20px;">
        <i class="bx bx-search" style="font-size: 1.2em; color: #919191;"></i>
        <input type="text" id="searchInput" placeholder="Type here to search" style="flex-grow: 1; background: none; border: none; color: #fff; outline: none;">
        <button type="button" onclick="searchMusic()" style="background-color: #464748; border: none; color: #fff; padding: 6px 12px; border-radius: 4px; cursor: pointer;">Search</button>
        <div class="dropdown" style="position: relative;">
            <button type="button" onclick="toggleDropdown()" style="background-color: #464748; border: none; color: #fff; padding: 6px 12px; border-radius: 4px; cursor: pointer;">Genres</button>
            <div id="dropdownMenu" style="display: none; position: absolute; top: 100%; right: 0; background-color: #464748; border: 1px solid #464748; border-radius: 4px; margin-top: 6px; padding: 0; width: 150px;">
                <a href="PopularArtist/Artist_playlist/Genre/pop.php" style="display: block; color: #fff; padding: 8px 12px; text-decoration: none;">Pop</a>
                <a href="PopularArtist/Artist_playlist/Genre/rock.php" style="display: block; color: #fff; padding: 8px 12px; text-decoration: none;">Rock</a>
                <a href="PopularArtist/Artist_playlist/Genre/romantic.php" style="display: block; color: #fff; padding: 8px 12px; text-decoration: none;">Romantic</a>
                <a href="PopularArtist/Artist_playlist/Genre/hip-hop.php" style="display: block; color: #fff; padding: 8px 12px; text-decoration: none;">Hip-Hop</a>
                <a href="PopularArtist/Artist_playlist/Genre/jazz.php" style="display: block; color: #fff; padding: 8px 12px; text-decoration: none;">Jazz</a>
                <a href="PopularArtist/Artist_playlist/Genre/classical.php" style="display: block; color: #fff; padding: 8px 12px; text-decoration: none;">Classical</a>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown() {
            var menu = document.getElementById('dropdownMenu');
            menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
        }
    </script>

    <script>
        function searchMusic() {
            var musicName = document.getElementById('searchInput').value.trim();
            var baseURL = '/ABC/PopularArtist/Artist_playlist/Genre/';
            var filePath = baseURL + encodeURIComponent(musicName) + '.php';
            if (musicName) {
                window.location.href = filePath;
            } else {
                alert('Please enter a music name.');
            }
        }
    </script>

</body>

</html>
