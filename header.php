<!DOCTYPE html>
<html>

<head>
   
    <title>Music Buzz</title>

    <link href="css/style-font.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-color.css" rel="stylesheet">

   
    <style>
       
        header {
        padding: 0 0; 
    }

   
    .navbar-nav > li > a {
        padding: 35px 15px; 
        font-size: 16px;
    }

   
    .navbar-default {
        min-height: 90px; 
    }

    .navbar-brand img {
        max-height: 60px; 
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
        }

       
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-fixed-top navbar-default">
            <div class="container">
             
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
                    <a class="navbar-brand" href="#home">
                   
                        <img class="img-responsive" src="img/logo/logo5.png" alt="" />
                    </a>
                </div>

              
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="admin/user_song.php">New Release</a></li>
                        <li><a href="PopularArtist/index.php">Popular Artist</a></li>
                        <li><a href="PodCast/podcast.php">PodCast</a></li>
                        <li>
                            <div class="dropdown">
                                <a href="genre.php">Genre</a>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#latestalbum">Library</a>
                                <div class="dropdown-content">
                                    <a href="admin/artists_list.php">All Artist</a>
                                    <a href="playlist/playlist.php">Playlist</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown">
                                <a href="#latestalbum">Contact</a>
                                <div class="dropdown-content">
                                    <a href="aboutus.php">About us</a>
                                    <a href="Contact/contact.php">Help</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
 
</body>

</html>
