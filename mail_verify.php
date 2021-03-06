<?php ?>
<!doctype html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
</head>

<body>


    <div class="row">
        <div class="col-sm-5 col-md-5 col-lg-5">
            <div id="sidebar1">
                <p id="logo"><b>TANSIM LOGO</b></p>
                <p id="p1"><b>Entrepreneurship Development<br> and Innovation Institute</b></p>
                <p id="p2">It provides various information such as details<br> about. Startup ecosystem in State, events.</p>
                <p id="p3"><a href="signup.php" style="text-decoration: none; color: #FFFFFF;">Don’t have an account? Sign up</a></p>
            </div>
        </div>

        <div class="col-sm-7 col-md-7 col-lg-7">

            <div class="row" id="email-verify">
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <div><?php include('./controllers/user_activation.php'); ?></div>
                    <p id="p1"><b>Email Verification</b></p>
                    <p id="p2">We need to verify your email address before<br> getting started!</p>
                    <div class="col-12 mb-5 text-center">
                        <?php echo $email_already_verified; ?>
                        <?php echo $email_verified; ?>
                        <?php echo $activation_error; ?>
                    </div>
                    <div class="inner-block">
                        <form method="post">
                            <?php

                            if (isset($_SESSION['Vemail'])) {

                                $email = $_SESSION['Vemail'];
                            } else {
                                $email = $_GET['email'];
                            }
                            ?>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $email; ?>" />
                            <div class="form-group" id="l1">
                                <input type="text" class="form-control" name="token" id="otp" />
                                <hr />
                            </div>

                            <button type="submit" id="submit" class="btn btn-lg btn-block">VERIFY</button>
                        </form>
                    </div>
                    <p id="p3">By Signing up, you agree to the Privacy Policy, Terms and Conditions.</p>
                    <br><br>
                    <div class="container-fluid" style="text-align: center;">
                        <a href="resend-otp.php?email=<?php echo $email; ?>" class="btn btn-lg btn-primary"> Resend OTP </a>
                        <?php
                        if ($vf == 1) {
                            $message = "Email Verified Successfully!  Thank You for being a TANSIM member";
                            echo "<script> 
                                alert('$message');
                                </script>";
                            $_SESSION['id'] = $id;
                            $_SESSION['email'] = $email;
                            $_SESSION['mobilenumber'] = $mobilenumber;
                            $_SESSION['token'] = $token;
                            header("Location: ./dashboard.php");
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