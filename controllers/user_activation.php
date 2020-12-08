<?php
    // Database connection
    include('./config/db.php');

    global $email_verified, $email_already_verified, $activation_error, $vf;

    // GET the token = ?token
    if(!empty($_POST['token']) && !empty($_POST['email'])){
       $token = $_POST['token'];
       $email = $_POST['email'];
    } else {
        $token = "";
        $email = "";
    }

    if($token != "" && $email != "") {
        $sqlQuery = mysqli_query($conn, "SELECT * FROM users WHERE token = '$token' AND email = '$email' ");
        $countRow = mysqli_num_rows($sqlQuery);

        if($countRow == 1){
            while($rowData = mysqli_fetch_array($sqlQuery)){
                $is_active = $rowData['is_active'];
                  if($is_active == 0) {
                     $update = mysqli_query($conn, "UPDATE users SET is_active = '1' WHERE token = '$token' AND email = '$email' ");
                       if($update){
                           $email_verified = '<div class="alert alert-success">
                                  User email successfully verified!
                                </div>
                           ';
                           $vf = 1;
                       }
                  } else {
                        $email_already_verified = '<div class="alert alert-danger">
                               User email already verified!
                            </div>
                        ';
                  }
            }
        } else {
            $activation_error = '<div class="alert alert-danger">
                    Activation error!
                </div>
            ';
        }
    }

?>