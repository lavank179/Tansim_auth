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

        <div class="row" id="pag">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>

            <div class="col-sm-10 col-md-10 col-lg-10">
                <div class="row">
                    <div class="col-sm-5 col-md-5 col-lg-5">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <a href="dashboard.php">
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
                        <!-- <a href="addevent.php"><button class="btn btn-primary btn-md"> Add Events </button></a> -->
                        <div class="form-group">
                            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Search Here..." />
                        </div>
                    </div>
                </div>

                <div class="filter">
                    <input type="hidden" name="page" class="form-control" value="<?= $_GET['page']; ?>">
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Industry
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <p class="dropdown-item">Action</p>
                            <p class="dropdown-item">Another action</p>
                            <p class="dropdown-item">Something else here</p>
                        </div>
                    </div>
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sector
                        </button>
                    </div>
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Date
                        </button>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-align: center;">
                            <label for="date" id="l4"> From </label>
                            <input type="date" class="form-control" name="eventdate" id="fromdate" style="width: 170px;">
                            <label for="date" id="l4"> To </label>
                            <input type="date" class="form-control" name="eventdate" id="todate" style="width: 170px;">
                        </div>
                    </div>
                    <div class="dropdown dl">
                        <select class="custom-select custom-select-lg" id="selLocation" style="width: 193px;">
                            <option selected><span style="font-size: 9px;">Location</span></option>
                            <option value="1">chennai</option>
                            <option value="2">bangalore</option>
                            <option value="3">hyderabad</option>
                            <option value="3">mumbai</option>
                            <option value="3">delhi</option>
                            <option value="3">trivandrum</option>
                        </select>
                    </div>
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Free or Paid
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="text-align: center;">
                            <p class="dropdown-item">
                                <div class="custom-control custom-radio custom-control-inline" style="text-align: center;">
                                    <input type="radio" id="customRadioInline1" name="epayment" class="custom-control-input pay" value="free">
                                    <label class="custom-control-label" for="customRadioInline1"> Free </label>
                                </div>
                            </p>
                            <p class="dropdown-item">
                                <div class="custom-control custom-radio custom-control-inline" style="text-align: center;">
                                    <input type="radio" id="customRadioInline2" name="epayment" class="custom-control-input pay" value="paid">
                                    <label class="custom-control-label" for="customRadioInline2"> Paid </label>
                                </div>
                            </p>

                        </div>
                    </div>
                    <div class="dl"><button name="submit1" id="submit" class="btn btn-primary btn-lg">Submit</button></div>
                </div>

                <br><br>
                <div class="" id="dynamic_content"></div>


            </div>


            <div class="col-sm-1 col-md-1 col-lg-1"></div>

        </div>
        <br><br><br><br>
        <script>
            $('.hoverable1').mouseenter(function() {
                $(this).addClass('shadow');
            });
            $('.hoverable1').mouseleave(function() {
                $(this).removeClass('shadow');
            });

            $(document).ready(function() {

                load_data(1);

                function load_data(page, query = '') {
                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            page: page,
                            query: query
                        },
                        success: function(data) {
                            $('#dynamic_content').html(data);
                        }
                    });
                }

                $(document).on('click', '.page-link', function() {
                    var page = $(this).data('page_number');
                    var query = $('#search_box').val();
                    var query = query + $('input[name="epayment"]:checked').val();
                    //var query = query + $('#selLocation :selected').text();
                    load_data(page, query);
                });

                $('#search_box').keyup(function() {
                    var query = $('#search_box').val();
                    load_data(1, query);
                });



                $("#submit").on('click', function() {
                    var query = $('input[name="epayment"]:checked').val();
                    //var query = query + $('#selLocation :selected').text();
                    fDate = $('#fromdate').val().split("/");
                    tDate = $('#todate').val().split("/");
                    load_data(1, query);
                });



            });
        </script>

    <?php } else {
        echo "<script>
         alert('A valid session was not exist. Please Login to Access.');
         window.location.href='https://lavankumar.000webhostapp.com/tansim_auth/';
         </script>";
    } ?>
</body>

</html>