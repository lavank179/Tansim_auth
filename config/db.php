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
?>