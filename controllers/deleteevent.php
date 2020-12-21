<?php

ob_start();
      // Set sessions
     if(!isset($_SESSION)) {
         session_start();
     }

    

     $hostname = "sql103.byethost32.com";
     $username = "b32_27511221";
     $password = "***********";
     $dbname = "b32_27511221_dblk";

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