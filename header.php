<?php
if (isset($_SESSION['email'])) { ?>


<nav class="navbar navbar-expand-lg navbar-light fixed-top">

    <a class="navbar-brand pl-5 pr-3" href="#home"><img src="#"> TANSIM </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active hoverable">
                <a class="nav-link" href="dashboard.php"><button class="btn btn-outline-secondary"> Dashboard </button></a>
            </li>
            <li class="nav-item hoverable">
                <a class="nav-link" href="events.php"><button class="btn btn-outline-secondary"> Events </button></a>
            </li>

            <li class="nav-item hoverable">
                <a class="nav-link" href="addevent.php"><button class="btn btn-outline-secondary"> Add Event </button></a>
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

<?php } else {
            echo "<script>
         alert('A valid session was not exist. Please Login to Access.');
         window.location.href='https://lavankumar.000webhostapp.com/tansim_auth/';
         </script>";
        } ?>