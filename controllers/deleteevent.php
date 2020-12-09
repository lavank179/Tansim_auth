<?php

ob_start();
      // Set sessions
     if(!isset($_SESSION)) {
         session_start();
     }

    

     $hostname = "localhost";
     $username = "id15615877_lavank";
     $password = "User#9512log";
     $dbname = "id15615877_dblavan";

     $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ("Database connection not established.");

    if (isset($_GET['id'])) {

        $id1 = $_GET['id'];
        $sql = "DELETE FROM events WHERE id='$id1'";

            // Create mysql query
            $sqlQuery = mysqli_query($conn, $sql);  
            if (!$sqlQuery) {
                $err = mysqli_error($conn);

                $success_msg = '<div class="alert alert-danger">
                                Database operation failed. ' . $err . '
                            </div>';
            } else {
                echo "<script>
         alert('Deleted Successfully');
         window.location.href='../dashboard.php';
         </script>";
            }
    }
?>