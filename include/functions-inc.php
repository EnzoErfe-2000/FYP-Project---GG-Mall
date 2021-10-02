<?php
function emptyInputLogin($email, $pwd){
	$result;
	if(empty($email) || empty($pwd))
	{
		$result = true;
	}
	else
	{
		$result = false;
	}
	return $result;
}

function uidExists($conn, $email, $password){
	$sql = "SELECT * FROM customer WHERE customer_email_address = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		header("location: ../index.php?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_bind_param($stmt, "s", $email);
	mysqli_stmt_execute($stmt);
	
	$resultData = mysqli_stmt_get_result($stmt);
	
	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}
	else{
		$result = false;
		return $result;
	}
	mysqli_stmt_close($stmt);
}

function checkPassword($password, $row)
{
	$pwdHashed = $row["customer_password"];
	$checkPwd = password_verify($password, $pwdHashed);
	return $checkPwd;
}

function resetHeadErrMsgs()
{
	echo "<script type='text/javascript'>document.getElementById('errEmail').innerHTML = '&nbsp;';</script>";
	echo "<script type='text/javascript'>document.getElementById('errPwd').innerHTML = '&nbsp;';</script>";
}
/*
function loginUser($conn, $email, $pwd){
	$uidExists = uidExists($conn, $email, $email);
	
	if($uidExists === false){
		header("location: ../index.php?error=wronglogin");
		print '<script type="text/javascript">alert("User not found!")</script>';
		exit();
	}
	
	$pwdHashed = $uidExists["customer_password"];
	$checkPwd = password_verify($pwd, $pwdHashed);
	
	if($checkPwd === false){
		header("location: ../index.php?error=wrongpassword");		
		print '<script type="text/javascript">alert("User not found!")</script>';
		exit();
	}
	else if($checkPwd === true){
		session_start();
		$_SESSION["customer_id"] = $uidExists["customer_id"];
		$_SESSION["customer_name"] = $uidExists["customer_name"];
		$_SESSION["customer_email_address"] = $uidExists["customer_email_address"];
		header("location: ../index.php?session=start");
		exit();
	}
}
*/
?>