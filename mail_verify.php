<?php

if (isset($_GET['email'])) {

    $email = $_GET['email'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Helvetica|Rubik|Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/style.css">
    <title>User Verification</title>

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

        <div class="col-sm-7 col-md-7 col-lg-7">

            <div class="row" id="email-verify">
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <p id="p1"><b>Email Verification</b></p>
                    <p id="p2">We need to verify your email address before<br> getting started!</p>
                    <div class="col-12 mb-5 text-center">
                        <?php echo $email_already_verified; ?>
                        <?php echo $email_verified; ?>
                        <?php echo $activation_error; ?>
                    </div>
                    <div class="inner-block">
                        <form method="get">
                            <input type="text" class="form-control" name="email" id="firstName" value="<?php echo $email; ?>" />
                            <div class="form-group" id="l1">
                                <input type="text" class="form-control" name="token" id="firstName" />
                                <hr />
                            </div>
                            <div><?php include('./controllers/user_activation.php'); ?></div>
                            <button type="submit" id="submit" class="btn btn-lg btn-block">Verify</button>
                        </form>
                    </div>
                    <p id="p3">By Signing up, you agree to the Privacy Policy, Terms and Conditions.</p>
                    <br><br>
                    <div class="container-fluid" style="text-align: center;">
                        <a href="http://localhost/tansim_auth/resend-otp.php?email=<?php echo $email; ?>"> Resend OTP </a>
                        <?php
                            if ($vf == 1) {
                                header('location:index.php');
                            }
                        ?>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2"></div>
            </div>
        </div>
    </div>


</body>

</html>