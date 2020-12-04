<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Helvetica|Rubik|Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/style.css">
    <title>PHP User Registration System Example</title>
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
                <p id="p3"><a href="#" style="text-decoration: none; color: #FFFFFF;">Have an account? Login</a></p>
            </div>
        </div>

        <div class="col-sm-7 col-md-7 col-lg-7">
            <div class="row">
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                <div><?php include('./controllers/register.php'); ?></div>
                    <div class="signup-form">
                        <p id="p1"><b>Sign up for an account today.</b></p>
                        <form action="" method="post">

                            <?php echo $success_msg; ?>
                            <?php echo $email_exist; ?>

                            <?php echo $email_verify_err; ?>
                            <?php echo $email_verify_success; ?>


                            <div class="form-group" id="l1">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" />

                                <?php echo $_emailErr; ?>
                                <?php echo $emailEmptyErr; ?>
                            </div>


                            <div class="form-group" id="l2">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" />

                                <?php echo $_passwordErr; ?>
                                <?php echo $passwordEmptyErr; ?>
                            </div>

                            <div class="form-group" id="l3">
                                <input type="password" class="form-control" name="confirmpassword" id="password" placeholder="Confirm Password" />

                                <?php echo $_cpasswordErr; ?>
                                <?php echo $cpasswordEmptyErr; ?>
                            </div>

                            <div class="form-group" id="l4">
                                <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Mobile Number"/>

                                <?php echo $_mobileErr; ?>
                                <?php echo $mobileEmptyErr; ?>
                            </div>

                            
                            <br><br><br>
                            <button type="submit" name="submit" id="submit" class="btn btn-lg btn-block"> CREATE YOUR ACCOUNT </button>
                            <p id="p2">By Signing up, you agree to the Privacy Policy, Terms and Conditions.</p>
                        </form>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2"></div>
            </div>
        </div>
    </div>

</body>

</html>