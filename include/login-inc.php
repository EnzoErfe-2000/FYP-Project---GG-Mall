<?php
    require_once 'dbh-inc.php';
	require_once 'functions-inc.php';
	$conn= new mysqli($serverName, $dBUserName, $dBPassword, $dBName);
	resetHeadErrMsgs();
	
	$form = "true";
	
    if(isset($_POST['login_email']) ){
		$form = "false";
		$email = $_POST['login_email'];
		$password = $_POST['login_password'];
		
		$err_mssg = "";

			if (isset($_POST['g-recaptcha-response'])) {
				// RECAPTCHA SETTINGS
				$captcha = $_POST['g-recaptcha-response'];
				$ip = $_SERVER['REMOTE_ADDR'];
				$secret_key = '6Lc4KPkcAAAAAFGhXxLHBAaLajrdvbW3QAWerc2I';
				$url = 'https://www.google.com/recaptcha/api/siteverify';

				// RECAPTCH RESPONSE
				$recaptcha_response = file_get_contents($url . '?secret=' . $secret_key . '&response=' . $captcha . '&remoteip=' . $ip);
				$data = json_decode($recaptcha_response);

				if (isset($data->success) &&  $data->success === true) {
				} else {
					$err_mssg = 'Verify your reCAPTCHA';
					echo '<script type="text/javascript">alert("Verify your reCAPTCHA");</script>';
				}
			}
			if(empty($err_mssg))
			{
				$form="true";
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
						$_SESSION["loggedin"] = true;
						$_SESSION["customer_id"] = $uidExists["customer_id"];
						$_SESSION["customer_name"] = $uidExists["customer_name"];
						$_SESSION["customer_email_address"] = $uidExists["customer_email_address"];
						$custName = $uidExists["customer_name"];
						echo "<script type='text/javascript'>alert('Welcome back, $custName');</script>";
						//echo "<script> location.assign('index.php');</script>";
					}
				}
			}
			
			$uri=$_SERVER['HTTP_REFERER'];
			echo "<script> location.assign('$uri');</script>";
			mysqli_close($conn);
		
    } 
?>
