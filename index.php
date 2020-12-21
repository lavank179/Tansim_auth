<?php
ob_start();
// Set sessions
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['email'])) {
    echo "<script>
         alert('A valid session is still running. Please Logout to proceed to Login Page.');
         window.location.href='dashboard.php';
         </script>";
} else {?>
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


        <div class="col-sm-7 col-md- col-lg-7">



            <div class="row">
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <div>
                        <!-- Login script -->
                        <?php
                        include('./controllers/login.php'); ?>
                    </div>
                    <div>
                        <?php echo $accountNotExistErr; ?>
                        <?php echo $verificationRequiredErr; ?>
                    </div>
                    <!-- Login form -->
                    <div class="login-form">
                        <p id="p1"><b>Login</b></p>
                        <p id="p2">Hello there! Welcome Back</p>
                        <form action="" method="post">

                            <div class="form-group" id="li1">
                                <input type="email" class="form-control" name="email_signin" id="email_signin" placeholder="Enter Email"
                                value="<?php if(isset($_SESSION['emailtmp'])){
                                    echo $_SESSION['emailtmp'];
                                }
                                else{
                                    echo '';
                                } ?>" />

                                <?php echo $emailPwdErr; ?>
                                <?php echo $email_empty_err; ?>
                            </div>

                            <div class="form-group" id="li2">
                                <input type="password" class="form-control" name="password_signin" id="password_signin" placeholder="Enter Password"
                                value="<?php if(isset($_SESSION['passtmp'])){
                                    echo $_SESSION['passtmp'];
                                }
                                else{
                                    echo '';
                                } ?>" />

                                <?php echo $wrongPwdErr; ?>
                                <?php echo $pass_empty_err;
                                ?>
                            </div>


                            <button type="submit" name="login" id="sign_in" class="btn btn-lg btn-block">LOGIN</button>
                        </form>
                        <p id="p3">By Signing up, you agree to the Privacy Policy, Terms and Conditions.</p>
                    </div>
                </div>
                <div class="col-sm-2 col-md-2 col-lg-2"></div>
            </div>
        </div>

    </div>
</body>

</html>
<?php }?>