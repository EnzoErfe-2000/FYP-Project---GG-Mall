<?php
/*
if(isset($_POST["submit"]))
{
	$email = $_POST["email"];
	$pwd = $_POST["password"];
	
	require_once 'dbh-inc.php';
	require_once 'functions-inc.php';
	
	//if(emptyInputLogin($email, $pwd)!==false){
	//	header("location: ../index.php?error=emptyinput");
	//	exit();
	//}

	
	loginUser($conn, $email, $pwd);
}
else
{
	header("location: ../index.php");
	exit();
}	
*/
require_once 'dbh-inc.php';
require_once 'functions-inc.php';
session_start();
if(isset($_POST["email"]))
{
	$email = $_POST["email"];
	$pwd = $_POST["password"];
	$uidExists = uidExists($conn, $email, $pwd);
	if($uidExists === false)
	{
		echo 'No';
	}	
	else
	{
		echo'Yes';
	}
}
?>