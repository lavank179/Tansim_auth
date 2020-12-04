<?php
include('./config/db.php');
require_once './lib/vendor/autoload.php';
    
     $email = '';
     if(isset($_GET['email'])){
         $email = $_GET['email'];
     }

     $firstname = 'TANSIM';
     

     $token = rand(100000, 999999);

     $update = mysqli_query($conn, "UPDATE users SET token = '$token' WHERE email = '$email' ");

     // Send verification email
     if($update) {
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

?>