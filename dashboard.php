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



        <div class="row dash">
            <div class="col-sm-1 col-md-1 col-lg-1"></div>

            <div class="col-sm-10 col-md-10 col-lg-10">
                <div class="row dash">
                    <div class="col-sm-9 col-md-9 col-lg-9">
                        <div class="row k1">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <p class="p1"> Events List </p>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <p class="p2"><a href="events.php"> View all </a></p>
                            </div>
                        </div>
                        <hr style="border: 1px dashed #C8CFD6;" />


                        <div class="row">
                            <?php
                            $email = $_SESSION['email'];
                            $queryEvent = "SELECT * FROM events WHERE email='$email'";
                            $result = mysqli_query($conn, $queryEvent);

                            echo '';
                            while ($row = mysqli_fetch_array($result)) {

                                $dated = $row['eventdate'];
                                $timed = $row['eventtime'];
                                $d1 = date("l", strtotime($dated));
                                $d2 = date("j", strtotime($dated));
                                $d3 = date("F, Y", strtotime($dated));
                                $dated = date("d F, y", strtotime($dated));
                                $timed = date("h:i A", strtotime($timed));

                                echo '
                                        <div class="grid-item">
                                            <div class="card hoverable" style="width: 18.5rem; height: 19rem;">
                                                <div class="card-body">
                                                    <div class="row">
                                                                <div class="col-sm-3 col-md-3 col-lg-3 p3"> ' . $d2 . '</div>
                                                                <div class="col-sm-9 col-md-9 col-lg-9 p4"> ' . $d1 . ' <br> <span>' . $d3 . '</span></div>
                                                    </div>

                                                    <br><br><br><br>
                                                    <p class="p5"><b> ' . $row['title'] . '</b></p>
                                                    <p class="p6"> ' . $row['industries'] . ' - ' . $row['sector'] . ' </p>
                                                    <p class="p7"> Starts at ' . $timed . ' </p>
                                                    <div class="viewbtn"><a href="editevent.php?id=' . $row['id'] . '"><div class="p8"> <span>View / Edit</span> </div></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    ';
                            } ?>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 sideb">
                        <div class="card">
                            <div class="card-body">
                                <div class="row dash">
                                    <div class="col-sm-7 col-md-7 col-lg-7">
                                        <p class="p1"> TANSIM Guidelines and Benefits of Organziations </p>
                                    </div>
                                    <div class="col-sm-5 col-md-5 col-lg-5"> <button class="btn btn-danger p2"> Get Started </button></div>
                                </div>
                            </div>
                        </div>

                        <p class="p3"><b> Quick Actions </b></p>

                        <div class="card mt-5">
                            <div class="card-body">
                                <p class="p4"> Dummy links </p>
                                <p class="p4"> Ecosystem </p>
                                <p class="p4"> Resource </p>
                                <p class="p4"> Blog / News </p>
                                <p class="p4"> Applied Events </p>
                                <p class="p4"> Applied Deals </p>
                                <p class="p4"> Applied Schemes </p>
                                <p class="p4"> FAQ’S </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-1 col-md-1 col-lg-1">
            </div>
        </div>


        <script>
            $('.hoverable').mouseenter(function() {
                $(this).addClass('shadow');
                $(this).find(".viewbtn").show();
            });
            $('.hoverable').mouseleave(function() {
                $(this).removeClass('shadow');
                $(this).find(".viewbtn").hide();
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