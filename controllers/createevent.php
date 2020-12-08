<?php
ob_start();
    /// your code here

    // Database connection
    include('config/db.php');


    // Error & success messages
    global $_titleErr, $_short_desErr, $_locationErr, $_mobileErr, $_industriesErr, $_sectorErr, $_imageErr, $_paymentErr, $_reglinkErr, $_brief_desErr, $success_msg;
    global $titleEmptyErr, $short_desEmptyErr, $locationEmptyErr, $eventdateEmptyErr, $eventtimeEmptyErr, $mobileEmptyErr, $industriesEmptyErr, $sectorEmptyErr, $imageEmptyErr, $paymentEmptyErr, $reglinkEmptyErr, $brief_desEmptyErr;

    // Set empty form vars for validation mapping
    $_title = $_short_des = $_location = $_eventdate = $_mobile_number = $_industries = $_sector = $_image = $_payment = $_reglink = $_brief_des = "";

    if (isset($_POST["submit"])) {
        $title         = $_POST["title"];
        $short_des     = $_POST["short_des"];
        $location      = $_POST["location"];
        $eventdate     = $_POST["eventdate"];
        $_time         = $_POST["eventtime"];
        $mobile        = $_POST["mobilenumber"];
        $industries    = $_POST["industries"];
        $sector        = $_POST["sector"];
        $payment       = $_POST["eventpayment"];
        $reglink       = $_POST["reglink"];
        $brief_des     = $_POST["brief_des"];

        // PHP validation
        // Verify if form values are not empty
        if (
            !empty($title) && !empty($short_des) && !empty($location) && !empty($eventdate) && !empty($mobile) && !empty($industries)
            && !empty($sector) && !empty($payment) && !empty($reglink) && !empty($brief_des)
        ) {
            if (!preg_match("/^[a-zA-Z0-9_ ]{5,50}+$/", $title)) {
                $_titleErr = '<div class="alert alert-danger">
                        Title should be 10 - 50 characters.
                    </div>';
            }

            if (!preg_match("/^[a-zA-Z0-9_ ]{8,25}+$/", $location)) {
                $_locationErr = '<div class="alert alert-danger">
                        Location should be 10 - 50 characters.
                    </div>';
            }

            if (!preg_match("/^[0-9]{10}+$/", $mobile)) {
                $_mobileErr = '<div class="alert alert-danger">
            Only 10-digit mobile numbers allowed.
                    </div>';
            }

            if (!preg_match("/^[a-zA-Z0-9_ ]{5,20}+$/", $industries)) {
                $_industriesErr = '<div class="alert alert-danger">
                        Industries should be 5 - 20 characters.
                    </div>';
            }

            if (!preg_match("/^[a-zA-Z0-9_ ]{5,15}+$/", $sector)) {
                $_sectorErr = '<div class="alert alert-danger">
                        Sector should be 5 - 15 characters.
                    </div>';
            }

            if (strlen($short_des) < 10) {
                $_short_desErr = '<div class="alert alert-danger">
                        Short Description should not be less than 10 characters.
                    </div>';
            }


            if (strlen($brief_des) < 10) {
                $_brief_desErr = '<div class="alert alert-danger">
                        Brief Description should not be less than characters.
                    </div>';
            }


            if ((!preg_match("/^[a-zA-Z0-9_ ]{10,50}+$/", $title)) && (!preg_match("/^[a-zA-Z0-9_ ]{8,25}+$/", $location)) &&
                (!preg_match("/^[0-9]{10}+$/", $mobile)) && (!preg_match("/^[a-zA-Z0-9_ ]{5,20}+$/", $industries)) &&
                (strlen($short_des) < 10) && (strlen($brief_des) < 10)
            ) {
                echo "<h1> Not ok </h1>";
            } else {
                if (isset($_FILES['bannerimage']) && $_FILES['bannerimage']['error'] === UPLOAD_ERR_OK) {
                    $allowedfileExtensions = array('jpg', 'png', 'jpeg');

                    // get details of the uploaded file
                    $fileTmpPath = $_FILES['bannerimage']['tmp_name'];
                    $fileName = $_FILES['bannerimage']['name'];
                    $fileSize = $_FILES['bannerimage']['size'];
                    $fileType = $_FILES['bannerimage']['type'];
                    $fileNameCmps = explode(".", $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));


                    $uploadFileDir = 'https://lavankumar.000webhostapp.com/tansim_auth/controllers/uploaded_files/';
                    $dest_path = $uploadFileDir . $fileName;

                    if (in_array($fileExtension, $allowedfileExtensions)) {
                            $time = DATE("H:i", STRTOTIME("$_time"));
                            $email = $_SESSION['email'];
                            $imagef = $fileName;

                            // Query
                            $sql = "INSERT INTO events (email, title, short_des, location, eventdate, eventtime, mobilenumber, industries, sector, 
                        image, payment, reglink, brief_des, created_time)
                         VALUES ('{$email}', '{$title}', '{$short_des}', '{$location}','{$eventdate}', '{$time}', '{$mobile}', '{$industries}',
                         '{$sector}', '{$imagef}', '{$payment}', '{$reglink}', '{$brief_des}', now())";

                            // Create mysql query
                            $sqlQuery = mysqli_query($conn, $sql);

                            if (!$sqlQuery) {
                                $err = mysqli_error($conn);

                                $success_msg = '<div class="alert alert-danger">
                                                Database operation failed. ' . $err . '
                                            </div>';
                            } else {
                                header("Location: ./dashboard.php");
                            }
                    } else {
                        $_imageErr = '<div class="alert alert-danger">
                                        Only  png, jpg and jpeg file types are allowed.
                                      </div>';
                    }
                } else {
                    $_imageErr = '<div class="alert alert-danger">
                                Image is not Uploaded. May be network issue.
                              </div>';
                }
            }
        } else {
            if (empty($title)) {
                $titleEmptyErr = '<div class="alert alert-danger">
                    Title can not be blank.
                </div>';
            }
            if (empty($short_des)) {
                $short_desEmptyErr = '<div class="alert alert-danger">
                    description can not be blank.
                </div>';
            }
            if (empty($location)) {
                $locationEmptyErr = '<div class="alert alert-danger">
                    Location number can not be blank.
                </div>';
            }
            if (empty($eventdate)) {
                $eventdateEmptyErr = '<div class="alert alert-danger">
                    Date can not be blank.
                </div>';
            }
            if (empty($_time)) {
                $eventtimeEmptyErr = '<div class="alert alert-danger">
                    Time can not be blank.
                </div>';
            }
            if (empty($mobile)) {
                $mobileEmptyErr = '<div class="alert alert-danger">
                    Mobile Number can not be blank.
                </div>';
            }
            if (empty($industries)) {
                $industriesEmptyErr = '<div class="alert alert-danger">
                    Industries can not be blank.
                </div>';
            }
            if (empty($sector)) {
                $sectorEmptyErr = '<div class="alert alert-danger">
                    Sector can not be blank.
                </div>';
            }
            // if (empty($image)) {
            //     $imageEmptyErr = '<div class="alert alert-danger">
            //             Password can not be blank.
            //         </div>';
            //}
            if (empty($payment)) {
                $paymentEmptyErr = '<div class="alert alert-danger">
                    Payment can not be blank.
                </div>';
            }
            if (empty($reglink)) {
                $reglinkEmptyErr = '<div class="alert alert-danger">
                    Link can not be blank.
                </div>';
            }
            if (empty($brief_des)) {
                $brief_desEmptyErr = '<div class="alert alert-danger">
                    description can not be blank.
                </div>';
            }
        }
    }
?>