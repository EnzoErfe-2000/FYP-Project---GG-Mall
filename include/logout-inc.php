<?php
session_start();
session_unset();
session_destroy();
//header("location: ../index.php");
$uri = $_SERVER['HTTP_REFERER'];
header("location: ".$uri);
?>