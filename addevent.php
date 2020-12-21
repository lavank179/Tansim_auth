<?php include('config/db.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <?php include('head.php'); ?>
</head>

<body>
<?php
if (isset($_SESSION['email'])) { ?>

        <header id="home">
            <?php include('header.php'); ?>
        </header>

        <section id="add-event">
            <?php include('./controllers/createevent.php'); ?>
            <div class="row">
                <div class="col-sm-1 col-md-1 col-lg-1"></div>
                <div class="col-sm-10 col-md-10 col-lg-10">


                    <div class="add-form">
                        <div class="row">
                            <div class="col-sm-1 col-md-1 col-lg-1"></div>
                            <div class="col-sm-10 col-md-10 col-lg-10">
                                <?php echo $success_msg; ?>
                                <p id="p1"><b>Add Events</b></p>
                                <hr>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="Title" id="l1"> Title </label>
                                        <input type="text" class="form-control" id="i1" name="title">
                                        <?php echo $_titleErr; ?>
                                        <?php echo $titleEmptyErr; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="short_description" id="l2"> Short Description </label>
                                        <textarea type="text" class="form-control" id="i2" rows="3" name="short_des" placeholder="Write about the description"></textarea>
                                        <?php echo $_short_desErr; ?>
                                        <?php echo $short_desEmptyErr; ?>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="location" id="l3"> Location </label>
                                            <input type="location" class="form-control" id="i3" name="location">
                                            <?php echo $_locationErr; ?>
                                            <?php echo $locationEmptyErr; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <label for="date" id="l4"> Date </label>
                                                    <input type="date" class="form-control" id="i4" name="eventdate">
                                                    <?php echo $eventdateEmptyErr; ?>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="time" id="l4"> Time </label>
                                                    <input type="time" class="form-control" id="i4" name="eventtime">
                                                    <?php echo $eventtimeEmptyErr; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="industries" id="l5"> Industries </label>
                                            <input type="text" class="form-control" id="i5" name="industries">
                                            <?php echo $_industriesErr; ?>
                                            <?php echo $industriesEmptyErr; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="sector" id="l6"> Sector </label>
                                            <input type="text" class="form-control" id="i6" name="sector">
                                            <?php echo $_sectorErr; ?>
                                            <?php echo $sectorEmptyErr; ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="mobile" id="l7"> Mobile Number </label>
                                            <input type="phone" class="form-control" id="i7" name="mobilenumber" placeholder="+91 99999 99999">
                                            <div id="er4" class="alert-danger"></div>
                                            <?php echo $_mobileErr; ?>
                                            <?php echo $mobileEmptyErr; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="bannerimage" id="l8"> Banner Image </label>
                                            <input type="file" class="form-control" id="i8" name="bannerimage" multiple>
                                            <?php echo $_imageErr; ?>
                                            <?php echo $imageEmptyErr; ?>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="payment" id="l9"> Events Payment </label><br>
                                            <div class="custom-control custom-radio custom-control-inline pt-4" style="text-align: center;">
                                                <input type="radio" id="customRadioInline1" name="eventpayment" class="custom-control-input" value="free">
                                                <label class="custom-control-label" for="customRadioInline1"> Free </label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline pt-4" style="text-align: center;">
                                                <input type="radio" id="customRadioInline2" name="eventpayment" class="custom-control-input" value="paid">
                                                <label class="custom-control-label" for="customRadioInline2"> Paid </label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="reglink" id="l10"> Registration Link </label>
                                            <input type="text" class="form-control" id="i10" name="reglink">
                                            <?php echo $_reglinkErr; ?>
                                            <?php echo $reglinkEmptyErr; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="brief_description" id="l11"> Brief </label>
                                        <textarea type="text" class="form-control" id="i11" rows="5" name="brief_des" placeholder="Write about the description"></textarea>
                                        <?php echo $_brief_desErr; ?>
                                        <?php echo $brief_desEmptyErr; ?>
                                    </div>
                                    <div style="text-align: right; font-family: 'Helvetica';"><button type="submit" name="submit" id="submit" class="btn btn-primary btn-lg">Submit</button></div>
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
         window.location.href='index.php';
         </script>";
        } ?>
<script>
    $('#i7').change(function () {
        var text = document.getElementById("i7").value;
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
</body>

</html>