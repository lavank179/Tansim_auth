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
    <?php
    if (isset($_SESSION['email'])) { ?>

        <header id="home">
            <?php include('header.php'); ?>
        </header>

        <section id="add-event">
            <?php include('./controllers/updateevent.php'); ?>

            <?php
            global $id1;
            $id1 = $_GET['id'];
            $email = $_SESSION['email'];
            $queryEvent = "SELECT * FROM events WHERE id='$id1'";
            $result = mysqli_query($conn, $queryEvent);

            $row = mysqli_fetch_array($result);
            ?>
            <div class="row">
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-sm-10 col-md-10 col-lg-10">


                    <div class="add-form">
                        <div class="row">
                            <div class="col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="col-sm-10 col-md-10 col-lg-10">
                                <?php echo $success_msg; ?>
                                <p id="p1"><b>Edit Events</b></p>
                                <hr>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="Title" id="l1"> Title </label>
                                        <input type="text" class="form-control" id="i1" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="text" class="form-control" id="i1" name="title" value="<?php echo $row['title']; ?>">
                                        <?php echo $_titleErr; ?>
                                        <?php echo $titleEmptyErr; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description" id="l2"> Short Description </label>
                                        <textarea type="text" class="form-control" id="i2" rows="3" name="short_des" placeholder="Write about the description"><?php echo $row['short_des']; ?></textarea>
                                        <?php echo $_short_desErr; ?>
                                        <?php echo $short_desEmptyErr; ?>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="location" id="l3"> Location </label>
                                            <input type="location" class="form-control" id="i3" name="location" value="<?php echo $row['location']; ?>">
                                            <?php echo $_locationErr; ?>
                                            <?php echo $locationEmptyErr; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="date" id="l4"> Date </label>
                                                    <input type="date" class="form-control" id="i4" name="eventdate" value="<?php echo $row['eventdate']; ?>">
                                                    <?php echo $eventdateEmptyErr; ?>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="time" id="l4"> Time </label>
                                                    <input type="time" class="form-control" id="i4" name="eventtime" value="<?php echo $row['eventtime']; ?>">
                                                    <?php echo $eventtimeEmptyErr; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="industries" id="l5"> Industries </label>
                                            <input type="text" class="form-control" id="i5" name="industries" value="<?php echo $row['industries']; ?>">
                                            <?php echo $_industriesErr; ?>
                                            <?php echo $industriesEmptyErr; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="sector" id="l6"> Sector </label>
                                            <input type="text" class="form-control" id="i6" name="sector" value="<?php echo $row['sector']; ?>">
                                            <?php echo $_sectorErr; ?>
                                            <?php echo $sectorEmptyErr; ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="mobile" id="l7"> Mobile Number </label>
                                            <input type="phone" class="form-control" id="i7" name="mobilenumber" value="<?php echo $row['mobilenumber']; ?>">
                                            <?php echo $_mobileErr; ?>
                                            <?php echo $mobileEmptyErr; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="bannerimage" id="l8"> Banner Image </label>
                                            <input type="file" class="form-control" id="i8" name="bannerimage" multiple value="<?php echo $row['image']; ?>">
                                            <?php echo $_imageErr; ?>
                                            <?php echo $imageEmptyErr; ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="payment" id="l9"> Events Payment </label><br>
                                            <div class="custom-control custom-radio custom-control-inline pt-4" style="text-align: center;">
                                                <input type="radio" id="customRadioInline1" name="eventpayment" class="custom-control-input" value="free" <?php if($row['payment']=="free"){ echo "checked";}?>>
                                                <label class="custom-control-label" for="customRadioInline1"> Free </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline pt-4" style="text-align: center;">
                                                <input type="radio" id="customRadioInline2" name="eventpayment" class="custom-control-input" value="paid" <?php if($row['payment']=="paid"){ echo "checked";}?>>
                                                <label class="custom-control-label" for="customRadioInline2"> Paid </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="reglink" id="l10"> Registration Link </label>
                                            <input type="text" class="form-control" id="i10" name="reglink" value="reglink">
                                            <?php echo $_reglinkErr; ?>
                                            <?php echo $reglinkEmptyErr; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="brief_description" id="l11"> Brief </label>
                                        <textarea type="text" class="form-control" id="i11" rows="5" name="brief_des" placeholder="Write about the description"><?php echo $row['brief_des']; ?></textarea>
                                        <?php echo $_brief_desErr; ?>
                                        <?php echo $brief_desEmptyErr; ?>
                                    </div>
                                    <div style="text-align: right; font-family: 'Helvetica';"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg"> Update </button></div>
                                </form>
                            </div>
                            <div class="col-sm-1 col-md-1 col-lg-1"></div>
                        </div>
                    </div>


                </div>
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
            </div>
            </div>

        </section>
    <?php } else {
        echo "<script>
         alert('A valid session was not exist. Please Login to Access.');
         window.location.href='http://localhost/tansim_auth';
         </script>";
    } ?>

</body>

</html>