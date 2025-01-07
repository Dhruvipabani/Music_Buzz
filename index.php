<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Music Buzz</title>

    <link href="css/style-font.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-color.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        .sidepanel {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 2;
            top: 0;
            right: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidepanel a {
            padding: 8px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidepanel a:hover {
            color: #f1f1f1;
        }

        .sidepanel .closebtn {
            position: absolute;
            bottom: 80px;

            right: 20px;

            font-size: 30px;
            color: white;
            background-color: #ff8c00;
            border: none;
            padding: 5px;
            cursor: pointer;
        }

        .profile-section {
            color: white;
            font-size: 16px;
            margin: 20px;
            margin-top: 50px;
        }

        .profile-section h4 {
            color: #ff8c00;
        }

        .admin-link {
            color: #ff8c00;
            font-size: 16px;
            margin: 20px;
        }

        .openbtn {
            font-size: 18px;
            cursor: pointer;
            color: white;
            background-color: #111;
            border: none;
            padding: 5px 10px;
            position: absolute;
            top: 90px;
            right: 20px;
            z-index: 2;
        }

        h2.animated {
            animation-duration: 1s;
            animation-delay: 0.5s;
        }

        h3.animated {
            animation-duration: 1.5s;
            animation-delay: 1s;
        }

        a.animated {
            animation-duration: 2s;
            animation-delay: 1.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <script>
        function openNav() {
            document.getElementById("mySidepanel").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidepanel").style.width = "0";
        }
    </script>


</head>

<body background-color=black>


    <div class="wrapper" id="home">
        <?php
        session_start(); ?>
        <?php include("header.php"); ?>


        <div class="banner">

            <button class="openbtn" onclick="openNav()">☰</button>

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="img/banner/b1.jpg" alt="Music Banner">
                        <div class="container">

                            <div class="carousel-caption slide-one">

                                <h2 style="animation: fadeIn 1s ease-in-out 0.5s both;"> LISTEN TO MUSIC</h2>
                                <h3 style="animation: fadeIn 1.5s ease-in-out 1s both;"> BUZZ ANYWHERE . . . .</h3>

                                <h4 style="animation: fadeIn 2s ease-in-out 1.5s both;">Tune in to the Vibe!</h4>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="mySidepanel" class="sidepanel">
        <button class="closebtn" onclick="closeNav()">×</button>
        <div class="profile-section">
            <h4><a href="profile.php">User Profile</a></h4>
            <p><strong>Name:</strong>
                <?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : 'Guest'; ?></p>
            <p><strong>Email:</strong>
                <?php echo isset($_SESSION['user_email']) ? htmlspecialchars($_SESSION['user_email']) : 'guest@example.com'; ?>
            </p>
        </div>
        <div class="admin-link">
            <a href="admin/login.php">Go to Admin Page</a>
            <a href="login/logout.php">Logout</a>
        </div>
    </div>

    <?php include 'footer.php'; ?>

</body>

</html>