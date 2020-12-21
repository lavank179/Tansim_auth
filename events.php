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
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Industry
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="container">
                                <input type="checkbox" name="industries" value="AWS Group">
                                <label>AWS Group</label>
                                <input type="checkbox" name="industries" value="GDG">
                                <label>GDG</label>
                                <input type="checkbox" name="industries" value="Apple">
                                <label>Apple</label>
                                <input type="checkbox" name="industries" value="Facebook">
                                <label>Facebook</label>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sector
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="container">
                                <input type="checkbox" name="sector" value="chennai">
                                <label> Chennai </label>
                                <input type="checkbox" name="sector" value="bangalore">
                                <label> Bangalore </label>
                                <input type="checkbox" name="sector" value="hyderabad">
                                <label> Hyderabad </label>
                                <input type="checkbox" name="sector" value="mumbai">
                                <label> Mumbai </label>
                                <input type="checkbox" name="sector" value="delhi">
                                <label> Delhi </label>
                                <input type="checkbox" name="sector" value="trivandrum">
                                <label> Trivandrum </label>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Date
                        </button>

                        <div class="dropdown-menu px-2 pb-3" aria-labelledby="dropdownMenuButton" style="text-align: center;">
                            <label for="date" id="l4"> From </label>
                            <input type="date" class="form-control" name="eventdate" id="fromdate" style="width: 170px;">
                            <label for="date" id="l4"> To </label>
                            <input type="date" class="form-control" name="eventdate" id="todate" style="width: 170px;">
                        </div>
                    </div>
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Location
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="container">
                                <input type="checkbox" name="location" value="chennai">
                                <label> Chennai </label>
                                <input type="checkbox" name="location" value="bangalore">
                                <label> Bangalore </label>
                                <input type="checkbox" name="location" value="hyderabad">
                                <label> Hyderabad </label>
                                <input type="checkbox" name="location" value="mumbai">
                                <label> Mumbai </label>
                                <input type="checkbox" name="location" value="delhi">
                                <label> Delhi </label>
                                <input type="checkbox" name="location" value="trivandrum">
                                <label> Trivandrum </label>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown dl">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Payment
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <div class="container">
                                <input type="checkbox" name="payment" value="free">
                                <label> Free </label>
                                <input type="checkbox" name="payment" value="paid">
                                <label> Paid </label>
                            </div>
                        </div>
                    </div>
                    <div class="dl"><button name="submit1" id="submit" class="btn btn-primary btn-md" style="background-color: #565565;border: none;"> Apply Filter</button></div>
                    <div class="dl"><img id="clear" src="https://img.freepik.com/free-icon/x-circle_318-2105.jpg?size=338&ext=jpg" alt="clear filter"/></div>
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

                function load_data(page, query='') {
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

                function load_data2(page, query2) {
                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            page: page,
                            query2: query2
                        },
                        success: function(data) {
                            $('#dynamic_content').html(data);
                        }
                    });
                }

                function filtering() {
                    fDate = $('#fromdate').val().split("/");
                    tDate = $('#todate').val().split("/");
                    if(fDate == "") fDate = null
                    if(tDate == "") tDate = null
                    var indus = [];
                    $("input:checkbox[name=industries]:checked").each(function() {
                        indus.push($(this).val());
                    });
                    var sect = [];
                    $("input:checkbox[name=sector]:checked").each(function() {
                        sect.push($(this).val());
                    });
                    var locat = [];
                    $("input:checkbox[name=location]:checked").each(function() {
                        locat.push($(this).val());
                    });
                    var paym = [];
                    $("input:checkbox[name=payment]:checked").each(function() {
                        paym.push($(this).val());
                    });
                    var query2 = [fDate, tDate, indus, sect, locat, paym];
                    return query2;
                }

                $(document).on('click', '.page-link', function() {
                    query2 = filtering();
                    if (query2[2].length <= 0 && query2[3].length <= 0 && query2[4].length <= 0 && query2[5].length <= 0 &&
                        query2[0] == null && query2[1] == null) {
                        var page = $(this).data('page_number');
                        var query = $('#search_box').val();
                        load_data(page, query);
                    } else {
                        var page = $(this).data('page_number');
                        var query2 = query2;
                        load_data2(page, query2);
                    }
                });

                $('#search_box').keyup(function() {
                    var query = $('#search_box').val();
                    load_data(1, query);
                });



                $("#submit").on('click', function() {
                    query2 = filtering();
                    if (query2[2].length <= 0 && query2[3].length <= 0 && query2[4].length <= 0 && query2[5].length <= 0 &&
                        query2[0] == null && query2[1] == null) {
                            alert("No filter Data selected");
                        }else{
                            load_data2(1, query2);
                        }
                    
                });

                $("#clear").on('click', function() {
                    location.reload();
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