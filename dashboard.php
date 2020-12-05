<?php include('config/db.php'); ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>PHP User Registration System Example</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <header id="home">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light fixed-top">

                <a class="navbar-brand pl-5 pr-3" href="#home"><img src="#"> TANSIM </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active hoverable">
                            <a class="nav-link" href="#home"> Dashboard </a>
                        </li>
                        <li class="nav-item hoverable">
                            <a class="nav-link" href="#about"> Events </a>
                        </li>

                        <li class="nav-item hoverable">
                            <a class="nav-link" href="#"> Add Event </a>
                        </li>
                        <li class="navbar-nav  nav-item hoverable">
                            <div class="pl-3 pr-5  ml-auto mr-auto">
                                <div class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle userA" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="./assets/profile.png" alt="User Profile">
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item btn-success" href="logout.php">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>

            </nav>
        </div>
    </header>

    <div class="container mt-5">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 25rem">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">User Profile</h5>
                    <p class="card-text">Email address: <?php echo $_SESSION['email']; ?></p>
                    <p class="card-text">Mobile number: <?php echo $_SESSION['mobilenumber']; ?></p>

                    <a class="btn btn-danger btn-block" href="logout.php">Log out</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>