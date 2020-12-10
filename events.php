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
                        <a href="addevent.php"><button class="btn btn-primary btn-md"> Add Events </button></a>
                    </div>
                </div>

                <div class="">

                    <?php
                    $email = $_SESSION['email'];

                    $limit = 4;
                    $page = isset($_GET['page']) ? $_GET['page'] : 1;
                    $start = ($page - 1) * $limit;

                    $queryEvent = "SELECT * FROM events LIMIT $start, $limit";
                    $result = mysqli_query($conn, $queryEvent);
                    $Events = mysqli_fetch_assoc($result);

                    $queryCount = "SELECT count(id) AS idc FROM events";
                    $result1 = mysqli_query($conn, $queryCount);
                    $eventCount = mysqli_fetch_assoc($result1);

                    $total = $eventCount['idc'];
                    $pages = ceil($total / $limit);

                    $Previous = $page - 1;
                    $Next = $page + 1; ?>








                    <?php while ($row = mysqli_fetch_array($result)) {
                        $dated = $row['eventdate'];
                        $timed = $row['eventtime'];
                        $d1 = date("l", strtotime($dated));
                        $dated = date("d F, y", strtotime($dated));
                        $timed = date("h:i A", strtotime($timed));


                        echo '<div class="card mb-3 hoverable1">
                    <div class="row no-gutters">
                        <div class="col-sm-3 col-md-3 col-lg-3">
                            <img src="./controllers/uploaded_files/' . $row['image'] . '" class="card-img" alt="">
                            </div>
                        <div class="col-sm-9 col-md-9 col-lg-9">
                            <div class="card-body">
                            <div class=row>
                            <div class="col-sm-8 col-md-8 col-lg-8">
                                <p class="p3"><b> ' . $row['title'] . '</b></p>
                                <p class="p4"> ' . $row['short_des'] . ' </p>
                                <p class="p5"> ' . $row['industries'] . ' - ' . $row['sector'] . ' </p>
                                <p class="card-text p6">
                                    <div class="text-muted small">
                                    <img src="https://img.icons8.com/color/96/000000/calendar.png"/> ' . $dated . '&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <img src="https://img.icons8.com/material-outlined/24/000000/clock.png"/> ' . $d1 . ',  ' . $timed . ' 
                                    </div>
                                </p>
                                
                                </div>
                                <div class="col-sm-4 col-md-4 col-lg-4">
                                    <div class="lake">
                                        <a href="editevent.php?id=' . $row['id'] . '">
                                        <span class="btn btn-md btn-primary btn-edit"><img src="./assets/edit.png" /> Edit </span>
                                        </a>
                                        <a href="./controllers/deleteevent.php?id=' . $row['id'] . '">
                                        <span class="btn btn-md btn-primary btn-edit"><img src="./assets/edit.png" /> Delete </span>
                                        </a>
                                        <p class="p7"><img src="./assets/location.jpg" /> ' . $row['location'] . ' </p>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
                    } ?>

                    <div class="row" id="page-nav">
                        <nav aria-label="Page navigation">
                            <ul class="nav-link">
                                <li>
                                    <a href="events.php?page=<?= $Previous; ?>" aria-label="Previous" class="<?php echo $page <= 1 ? 'disabled' : ''; ?> abP">
                                        <span aria-hidden="true">&laquo; </span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $pages; $i++) : ?>
                                    <li><a href="events.php?page=<?= $i; ?>"><?= $i; ?></a></li>
                                <?php endfor; ?>
                                <li>
                                    <a href="events.php?page=<?= $Next; ?>" aria-label="Next" class="<?php echo $page >= $pages ? 'disabled' : ''; ?> abN">
                                        <span aria-hidden="true"> &raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                </div>


            </div>


            <div class="col-sm-1 col-md-1 col-lg-1"></div>
        </div>


        <script>
            $('.hoverable1').mouseenter(function() {
                $(this).addClass('shadow');
            });
            $('.hoverable1').mouseleave(function() {
                $(this).removeClass('shadow');
            });
            if ($('.abP').hasClass("disabled")) {
                $('.abP').removeAttr('href');
            } else {
                $('.abP').attr('href', "events.php?page=<?= $Previous; ?>");
            }

            if ($('.abN').hasClass("disabled")) {
                $('.abN').removeAttr('href');
            } else {
                $('.abN').attr('href', "events.php?page=<?= $Next; ?>");
            }
        </script>

    <?php } else {
        echo "<script>
         alert('A valid session was not exist. Please Login to Access.');
         window.location.href='https://lavankumar.000webhostapp.com/tansim_auth/';
         </script>";
    } ?>
</body>

</html>