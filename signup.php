<?php
ob_start();
// Set sessions
if(!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['email'])) {
    echo "<script>
         alert('A valid session is still running. Please Logout to proceed to SignUp Page.');
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
                <p id="p3"><a href="index.php" style="text-decoration: none; color: #FFFFFF;">Have an account? Login</a></p>
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
                                <div id="er1"></div>

                                <?php echo $_emailErr; ?>
                                <?php echo $emailEmptyErr; ?>
                            </div>


                            <div class="form-group" id="l2">
                                <input type="password" class="form-control k1" name="password" id="password" placeholder="Password"
                                value="<?php if(isset($_SESSION['tmppassword'])){
                                    echo $_SESSION['tmppassword'];
                                }
                                else{
                                    echo '';
                                } ?>" />
                                <div id="er2"></div>

                                <?php echo $_passwordErr; ?>
                                <?php echo $passwordEmptyErr; ?>
                            </div>
                            <br>
                            <div class="form-group" id="l3">
                                <input type="password" class="form-control" name="confirmpassword" id="cpassword" placeholder="Confirm Password"
                                value="<?php if(isset($_SESSION['tmpcpassword'])){
                                    echo $_SESSION['tmpcpassword'];
                                }
                                else{
                                    echo '';
                                } ?>"/>
                                <div id="er3"></div>

                                <?php echo $_cpasswordErr; ?>
                                <?php echo $cpasswordEmptyErr; ?>
                            </div>
                            <br>
                            <div class="form-group" id="l4">
                                <input type="tel" class="form-control" name="mobilenumber" id="mobilenumber" placeholder="+91 99999 99999"
                                value="<?php if(isset($_SESSION['tmpmobile'])){
                                    echo $_SESSION['tmpmobile'];
                                }
                                else{
                                    echo '';
                                } ?>"/>
                                <div id="er4" class="alert-danger"></div>

                                <?php echo $_mobileErr; ?>
                                <?php echo $mobileEmptyErr; ?>
                            </div>

                            <br><br><br><br>
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
<script>
    $('#email').change(function () {
        var text = document.getElementById("email").value;
        var regx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (!regx.test(text)){
            $("#er1").html('Email should be valid. EG: example@example.com');
            $("#er1").addClass('alert-danger');
            $("#er1").removeClass('alert-success');
        } else {
            $("#er1").html('Email is Valid');
            $("#er1").removeClass('alert-danger');
            $("#er1").addClass('alert-success');
        }
    });

    $('#cpassword').change(function () {
        var text = document.getElementById("password").value;
        var text1 = document.getElementById("cpassword").value;
        if (text != text1){
            $("#er3").html('Password and confirm password should be same.');
            $("#er3").addClass('alert-danger');
            $("#er3").removeClass('alert-success');
        } else {
            $("#er3").html('Paswords are valid');
            $("#er3").removeClass('alert-danger');
            $("#er3").addClass('alert-success');
        }
    });

    $('#mobilenumber').change(function () {
        var text = document.getElementById("mobilenumber").value;
        var regx = /^([0|+[0-9]{1,5})?([7-9][0-9]{9})$/;
        if (!regx.test(text)){
            $("#er4").html('Mobile number should be valid. +(**) - country code AND (**********) - 10 digit number');
            $("#er4").addClass('alert-danger');
            $("#er4").removeClass('alert-success');
    } else {
            $("#er4").html('Mobile number Verified');
            $("#er4").removeClass('alert-danger');
            $("#er4").addClass('alert-success');
        }
    });
</script>
</html>
<?php }?>