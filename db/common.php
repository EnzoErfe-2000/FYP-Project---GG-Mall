<?php
    $con = mysqli_connect("localhost", "root", "", "gg_mall") or die(mysqli_error($con));
    if(!isset($_SESSION)){
      session_start();
    }
?>

