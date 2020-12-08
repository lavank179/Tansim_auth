<?php
include('./config/db.php');


require_once './controllers/PHPMailer/src/Exception.php';
require_once './controllers/PHPMailer/src/PHPMailer.php';
require_once './controllers/PHPMailer/src/SMTP.php';
    
     $email = '';
     if(isset($_GET['email'])){
         $email = $_GET['email'];
     }

     $firstname = 'TANSIM';
     

     $token = rand(100000, 999999);

     $update = mysqli_query($conn, "UPDATE users SET token = '$token' WHERE email = '$email' ");

     // Send verification email
     if($update) {
        
        $mail = new PHPMailer\PHPMailer\PHPMailer();
                        $mail->isSMTP();
                        $mail->Host = 'smtp-mail.outlook.com';
                        $mail->Port = 587;
                        $mail->SMTPSecure = "tls";  
                        $mail->SMTPAuth = true;
                        $mail->Username = 'ram-lavan17@outlook.com';
                        $mail->Password = 'LAVAN@801kumar';
                        $mail->setFrom('ram-lavan17@outlook.com');
                        $mail->addAddress($email);
                        $mail->isHTML(true);
                        $mail->Subject = 'Please Verify Email Address!';
                        $mail->Body    = 'Your OTP for verifying : ' . $token . '<br> Or <br><br>Click on the activation link to verify your email. <br><br>
                        <a href="http://localhost/tansim_auth/mail_verify.php?email=' . $email . '"> Click here to verify email</a>
                      ';
                        
                        $result = $mail->send();
          
      if(!$result){
          $email_verify_err = '<div class="alert alert-danger">
                  Verification email coud not be sent! '.$mail->ErrorInfo.'
          </div>';
      } else {
          $email_verify_success = '<div class="alert alert-success">
              Verification email has been sent!
          </div>';
          
          $message = "verification Code has been sent to your email.";
                            echo "<script>
                                alert('$message');
                                window.location.href='mail_verify.php?email=$email';
                                </script>";
      }
    }

?>