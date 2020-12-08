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
                <p id="p3"><a href="https://lavankumar.000webhostapp.com/tansim_auth/" style="text-decoration: none; color: #FFFFFF;">Have an account? Login</a></p>
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
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" 
                                value="<?php if(isset($_SESSION['tmpEmail'])){
                                    echo $_SESSION['tmpEmail'];
                                }
                                else{
                                    echo '';
                                } ?>"/>

                                <?php echo $_emailErr; ?>
                                <?php echo $emailEmptyErr; ?>
                            </div>


                            <div class="form-group" id="l2">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" 
                                value="<?php if(isset($_SESSION['tmppassword'])){
                                    echo $_SESSION['tmppassword'];
                                }
                                else{
                                    echo '';
                                } ?>" />

                                <?php echo $_passwordErr; ?>
                                <?php echo $passwordEmptyErr; ?>
                            </div>

                            <div class="form-group" id="l3">
                                <input type="password" class="form-control" name="confirmpassword" id="password" placeholder="Confirm Password" 
                                value="<?php if(isset($_SESSION['tmpcpassword'])){
                                    echo $_SESSION['tmpcpassword'];
                                }
                                else{
                                    echo '';
                                } ?>"/>

                                <?php echo $_cpasswordErr; ?>
                                <?php echo $cpasswordEmptyErr; ?>
                            </div>

                            <div class="form-group" id="l4">
                                <input type="text" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="Mobile Number" 
                                value="<?php if(isset($_SESSION['tmpmobile'])){
                                    echo $_SESSION['tmpmobile'];
                                }
                                else{
                                    echo '';
                                } ?>"/>

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