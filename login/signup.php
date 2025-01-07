<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Sign Up</title>
    <style>
        body {
            background: linear-gradient(to right, #000000, #ff8c90);
            font-family: 'Arial', sans-serif;
            color: #ffffff;
        }
        .form-02-main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background: #222222; /
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
        }
        h3 {
            color: #ff8c90; 
            margin-bottom: 20px;
        }
        .form-control {
            border-radius: 30px;
            padding: 15px;
            font-size: 16px;
            background-color: #333333;
            color: #ffffff;
            border: 1px solid #ff8c90; 
        }
        .form-control::placeholder {
            color: #bbbbbb; 
        }
        .btn-primary {
            background-color: #ff8c90;
            border-color: #ff8c90;
            border-radius: 30px;
            padding: 10px 30px;
            font-size: 16px;
        }
        .btn-primary:hover {
            background-color: #ff7518;
            border-color: #ff7518;
        }
        p {
            margin-top: 15px;
        }
        a {
            color: #ff8c90;
            font-weight: bold;
        }
        a:hover {
            color: #ff7518;
        }
    </style>
</head>
<body>
    <section class="form-02-main">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6 col-lg-4">
                    <div class="form-container text-center">
                        <h3>Sign Up</h3>
                        <form action="signuptbl.php" method="post">
                            <div class="form-group mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
