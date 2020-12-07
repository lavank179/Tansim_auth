<?php include('config/db.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Helvetica|Rubik|Lato" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>PHP User Registration System Example</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <header id="home">
        <?php include('header.php'); ?>
    </header>

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem">
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['email'])) { ?>
                        <h5 class="card-title text-center mb-4">User Profile</h5>
                        <p class="card-text">Email address: <?php echo $_SESSION['email']; ?></p>
                        <p class="card-text">Mobile number: <?php echo $_SESSION['mobilenumber']; ?></p>
                        <a class="btn btn-danger btn-block" href="logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="pag">
        <div class="col-sm-1 col-md-1 col-lg-1"></div>

        <div class="col-sm-10 col-md-10 col-lg-10">
            <div class="row">
                <div class="col-sm-5 col-md-5 col-lg-5">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <a href="http://localhost/tansim_auth/dashboard.php">
                                <img src="https://img.icons8.com/material-sharp/24/000000/home.png" /><span id="p1"> Dashboard | Events List </span> </a>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6"></div>
                    </div>
                </div>
                <div class="col-sm-7 col-md-7 col-lg-7"></div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <p id="p2"> Events List </p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6" style="text-align: right; padding-top: 20px">
                    <button class="btn btn-primary btn-md"> Add Events </button>
                </div>
            </div>

            <div class="">

            <?php 
                $email = $_SESSION['email'];
                $queryEvent = "SELECT * FROM events WHERE email='$email'";
                $result = mysqli_query($conn, $queryEvent);

                while ($row = mysqli_fetch_array($result)) {

                    $dated = $row['eventdate'];
                    $timed = $row['eventtime'];
                    $dated = date("d F, y", strtotime($dated));
                    $timed = date("h:i A", strtotime($timed));
                    
                echo '<div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <img src="./controllers/uploaded_files/'.$row['image'].'" class="card-img" alt="...">
                            </div>
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <div class="card-body">
                            <div class=row>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <p class="p3"><b> '.$row['title'].'</b></p>
                                <p class="p4"> '.$row['short_des'].' </p>
                                <p class="p5"> '.$row['industries'].' - '.$row['location'].' </p>
                                <p class="card-text p6">
                                    <div class="text-muted small">
                                    <img src="https://img.icons8.com/color/96/000000/calendar.png"/> '. $dated .' <img src="https://img.icons8.com/material-outlined/24/000000/clock.png"/> '.$timed.' 
                                    </div>
                                </p>
                                
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="lake">
                                        <a href="http://localhost/tansim_auth/editevent.php?id='.$row['id'].'">
                                        <span class="btn btn-md btn-primary btn-edit"><i class="bi bi-pencil-square"></i> Edit </span>
                                        </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                
                } ?>

            </div>
        </div>


        <div class="col-sm-1 col-md-1 col-lg-1"></div>
    </div>
<?php } else {
                        echo "<script>
                                    alert('A valid session was not exist. Please Login to Access.');
                                    window.location.href='http://localhost/tansim_auth';
                                  </script>";
                    } ?>


</body>

</html>