<?php     
    session_start();
    session_destroy();
      
    header("Location: http://localhost/tansim_auth/index.php")
;?>