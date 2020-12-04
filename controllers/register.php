<?php
    
    // Database connection
    include('config/db.php');

    // Swiftmailer lib
    require_once './lib/vendor/autoload.php';

    // Error & success messages
    global $success_msg, $email_exist, $_emailErr, $_mobileErr, $_passwordErr, $_cpasswordErr;
    global $emailEmptyErr, $mobileEmptyErr, $passwordEmptyErr, $cpasswordEmptyErr, $email_verify_err, $email_verify_success;

    // Set empty form vars for validation mapping
    $_email = $_mobile_number = $_password = $_cpassword = "";

    if(isset($_POST["submit"])) {
        $email         = $_POST["email"];
        $mobilenumber  = $_POST["mobilenumber"];
        $cpassword      = $_POST["confirmpassword"];
        $password      = $_POST["password"];

        $email_check_query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' ");
        $rowCount = mysqli_num_rows($email_check_query);


        // PHP validation
        // Verify if form values are not empty
        if(!empty($email) && !empty($mobilenumber) && !empty($password) && !empty($cpassword)) {

            // check if user email already exist
            if($rowCount > 0){
                $email_exist = '
                <div class="alert alert-danger" role="alert">
                    User with email already exist!
                </div>
            ';
            } else {
                // clean the form data before sending to database
                $_email = mysqli_real_escape_string($conn, $email);
                $_mobile_number = mysqli_real_escape_string($conn, $mobilenumber);
                $_password = mysqli_real_escape_string($conn, $password);
                $_cpassword = mysqli_real_escape_string($conn, $cpassword);

                // perform validation
                if(!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
                    $_emailErr = '<div class="alert alert-danger">
                            Email format is invalid.
                        </div>';
                }
                if(!preg_match("/^[0-9]{10}+$/", $_mobile_number)) {
                    $_mobileErr = '<div class="alert alert-danger">
                            Only 10-digit mobile numbers allowed.
                        </div>';
                }
                if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_password)) {
                    $_passwordErr = '<div class="alert alert-danger">
                             Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                        </div>';
                }

                if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $_cpassword)) {
                    $_cpasswordErr = '<div class="alert alert-danger">
                             Password should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                        </div>';
                }

                if($cpassword != $password){
                    $_cpasswordErr = '<div class="alert alert-danger">
                             Confirm Password should be same as Password.
                        </div>';
                }

                // Store the data in db, if all the preg_match condition met
                if((filter_var($_email, FILTER_VALIDATE_EMAIL)) && (preg_match("/^[0-9]{10}+$/", $_mobile_number)) && 
                (preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $_password))) {

                    // Generate random activation token
                    $token = rand(100000, 999999);

                    // Password hash
                    $password_hash = password_hash($password, PASSWORD_BCRYPT);
                    $cpassword_hash = password_hash($cpassword, PASSWORD_BCRYPT);

                    // Query
                    $sql = "INSERT INTO users (email, mobilenumber, password, cpassword, token, is_active,
                    date_time) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$mobilenumber}', '{$password_hash}','{$cpassword_hash}', 
                    '{$token}', '0', now())";

                    // Create mysql query
                    $sqlQuery = mysqli_query($conn, $sql);

                    if(!$sqlQuery) {
                        die("MySQL query failed" . mysqli_error($conn));
                    }

                    // Send verification email
                    if($sqlQuery) {
                        $msg = 'Your OTP for verifying : '.$token.'<br> Or <br><br>Click on the activation link to verify your email. <br><br>
                        <a href="http://localhost/tansim_auth/mail_verify.php?email='.$email.'"> Click here to verify email</a>
                      ';

                      // Create the Transport
                      $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                      ->setUsername('chlavankumar179@gmail.com')
                      ->setPassword("lavan@801KUMAR");

                      // Create the Mailer using your created Transport
                      $mailer = new Swift_Mailer($transport);

                      // Create a message
                      $firstname = "TANSIM";
                      $message = (new Swift_Message('Please Verify Email Address!'))
                      ->setFrom([$email => $firstname])
                      ->setTo($email)
                      ->addPart($msg, "text/html")
                      ->setBody('Hello! User');

                      // Send the message
                      $result = $mailer->send($message);
                          
                      if(!$result){
                          $email_verify_err = '<div class="alert alert-danger">
                                  Verification email coud not be sent!
                          </div>';
                      } else {
                          $email_verify_success = '<div class="alert alert-success">
                              Verification email has been sent!
                          </div>';

                          header('location:mail_verify.php?email='.$email);
                      }
                    }
                }
            }
            
        } else {
            if(empty($email)){
                $emailEmptyErr = '<div class="alert alert-danger">
                    Email can not be blank.
                </div>';
            }
            if(empty($mobilenumber)){
                $mobileEmptyErr = '<div class="alert alert-danger">
                    Mobile number can not be blank.
                </div>';
            }
            if(empty($password)){
                $passwordEmptyErr = '<div class="alert alert-danger">
                    Password can not be blank.
                </div>';
            }
            if(empty($cpassword)){
                $cpasswordEmptyErr = '<div class="alert alert-danger">
                    Password can not be blank.
                </div>';
            }
        }
    }
?>