<?php
    require_once 'dbh-inc.php';
	require_once 'functions-inc.php';
	$conn= new mysqli($serverName, $dBUserName, $dBPassword, $dBName);
	resetHeadErrMsgs();
	
    if(isset($_POST['login_email']) ){
		$email = $_POST['login_email'];
		$password = $_POST['login_password'];
		
			//session_start();    
			$uidExists = uidExists($conn, $email, $password);
			
			//
			if($uidExists === false)
			{
				echo '<script type="text/javascript">alert("User not found!\nPlease try again.");</script>';
				//echo "<script type='text/javascript'>alert('Invalid Username or Password.');</script>";            
			}
			else
			{
				$correctPwd = checkPassword($password, $uidExists);
				if($correctPwd === false)
				{
					echo '<script type="text/javascript">alert("Invalid Email or Password!\nPlease try again.");</script>';
					}
				else if($correctPwd === true)
				{
					session_start();      
					$_SESSION["customer_id"] = $uidExists["customer_id"];
					$_SESSION["customer_name"] = $uidExists["customer_name"];
					$_SESSION["customer_email_address"] = $uidExists["customer_email_address"];
					$custName = $uidExists["customer_name"];
					echo "<script type='text/javascript'>alert('Welcome back, $custName');</script>";
					//echo "<script> location.assign('index.php');</script>";
				}
			}
			$uri=$_SERVER['HTTP_REFERER'];
			echo "<script> location.assign('$uri');</script>";
			mysqli_close($conn);
		
    } 
?>
