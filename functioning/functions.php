<?php
session_start();
$link = mysqli_connect("Your database details");
  if (mysqli_connect_errno()) {
        
        print_r(mysqli_connect_error());
        exit();
        
    }

    if (isset($_GET['function']) == "logout") {
        
        session_unset();
        
    }
?>