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

    <section id="add-event">
        <div class="row">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>
            <div class="col-sm-10 col-md-10 col-lg-10">


                <div class="add-form">
                    <div class="row">
                        <div class="col-sm-1 col-md-1 col-lg-1"></div>
                        <div class="col-sm-10 col-md-10 col-lg-10">
                            <p id="p1"><b>Add Events</b></p>
                            <hr>
                            <form>
                                <div class="form-group">
                                    <label for="Title" id="l1"> Title </label>
                                    <input type="text" class="form-control" id="i1" name="title">
                                </div>
                                <div class="form-group">
                                    <label for="short_description" id="l2"> Short Description </label>
                                    <textarea type="text" class="form-control" id="i2" rows="3" name="short_des" placeholder="Write about the description"></textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="location" id="l3"> Location </label>
                                        <input type="location" class="form-control" id="i3" name="eventlocation">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="date" id="l4"> Date </label>
                                        <input type="date" class="form-control" id="i4" name="eventdate">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="industries" id="l5"> Industries </label>
                                        <input type="text" class="form-control" id="i5" name="eventlocation">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sector" id="l6"> Sector </label>
                                        <input type="text" class="form-control" id="i6" name="eventdate">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="mobile" id="l7"> Mobile Number </label>
                                        <input type="phone" class="form-control" id="i7" name="mobilenumber">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="bannerimage" id="l8"> Banner Image </label>
                                        <input type="file" class="form-control" id="i8" name="bannerimage">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                    <label for="payment" id="l9"> Events Payment </label><br>
                                        <div class="custom-control custom-radio custom-control-inline pt-4" style="text-align: center;">
                                            <input type="radio" id="customRadioInline1" name="eventpayment" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline1"> Free </label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline pt-4" style="text-align: center;">
                                            <input type="radio" id="customRadioInline2" name="eventpayment" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadioInline2"> Paid </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="reglink" id="l10"> Registration Link </label>
                                        <input type="text" class="form-control" id="i10" name="reglink">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="brief_description" id="l11"> Brief </label>
                                    <textarea type="text" class="form-control" id="i11" rows="5" name="brief_des" placeholder="Write about the description"></textarea>
                                </div>
                                <div style="text-align: right; font-family: 'Helvetica';"><button type="submit" class="btn btn-primary btn-lg">Submit</button></div>
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

</body>

</html>