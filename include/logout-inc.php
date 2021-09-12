<?php
session_start();
session_unset();
session_destroy();
$uri = $_SERVER['HTTP_REFERER'];
header("location: ".$uri);
?>