<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Helvetica|Rubik|Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Login System</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>


    <div class="row">
        <div class="col-sm-5 col-md-5 col-lg-5">
            <div id="sidebar1">
                <p id="logo"><b>TANSIM LOGO</b></p>
                <p id="p1"><b>Entrepreneurship Development<br> and Innovation Institute</b></p>
                <p id="p2">It provides various information such as details<br> about. Startup ecosystem in State, events.</p>
                <p id="p3"><a href="#" style="text-decoration: none; color: #FFFFFF;">Don’t have an account? Sign up</a></p>
            </div>

        </div>


        <div class="col-sm-7 col-md- col-lg-7">



            <div class="row">
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <!-- Login form -->
                    <div class="login-form">
                                <p id="p1"><b>Login</b></p>
                                <p id="p2">Hello there! Welcome Back</p>
                                <form action="" method="post">

                                    <div class="form-group" id="li1">
                                        <input type="email" class="form-control" name="email_signin" id="email_signin" placeholder="Enter Email" />
                                    </div>

                                    <div class="form-group" id="li2">
                                        <input type="password" class="form-control" name="password_signin" id="password_signin" placeholder="Enter Password" />
                                    </div>

                                    <div>
                                        <!-- Login script -->
                                        <?php include('./controllers/login.php'); ?>
                                    </div>
                                    <button type="submit" name="login" id="sign_in" class="btn btn-outline-primary btn-lg btn-block">Sign
                                        in</button>
                                </form>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2"></div>
            </div>
        </div>

    </div>
</body>

</html>