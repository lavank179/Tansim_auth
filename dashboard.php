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
                        <?php } else {
                            echo "<script>
                                    alert('A valid session was not exist. Please Login to Access.');
                                    window.location.href='http://localhost/tansim_auth';
                                  </script>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>

    </body>

    </html>