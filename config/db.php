<?php

     ob_start();
      // Set sessions
     if(!isset($_SESSION)) {
         session_start();
     }

    

     $hostname = "localhost";
     $username = "id15615877_lavank";
     $password = "*********";
     $dbname = "id15615877_dblavan";

     $conn = mysqli_connect($hostname, $username, $password, $dbname) or die ("Database connection not established.");
?>