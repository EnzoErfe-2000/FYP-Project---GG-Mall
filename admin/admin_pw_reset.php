<?php
session_start();
include_once '../include/dbh-inc.php';

$email_err = "";
$email = "";

$no = 6;
function get_otp($no)
{
    $numbers = '0123456789';
    $randomString = '';

    for ($i = 0; $i < $no; $i++) {
        $otp = rand(0, strlen($numbers) - 1);
        $randomString .= $numbers[$otp];
    }

    return $randomString;
}

if(isset($_POST['submit']))
{
    if(empty($_POST['email']))
    {
        $email_err = "Please enter your email to reset password.";
        
    }
    else 
    {
		$email = $_POST["email"];
	}

    $sql = "SELECT * FROM admin WHERE admin_emailAddress = '$email'";
	$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

		while ($row = mysqli_fetch_assoc($result)) 
        {
			$_SESSION["resetid"] = $row["admin_id"];
			$_SESSION["resetemail"] = $row["admin_emailAddress"];
		}
	} else 
    {
		$email_err = "Sorry, your e-mail does not exist.";
	}

    if(empty($email_err))
    {
        $_SESSION["otp"] = get_otp($no);

        $otp = $_SESSION["otp"];
        $remail = $_SESSION["resetemail"];

        $sql = "INSERT INTO otp (code, email) VALUES ('$otp', '$remail')";
        $result = mysqli_query($conn, $sql);

        $to = "1191202622@student.mmu.edu.my"; //send to our email
        $subject = "Reset Password";
        $message = 'Here is your one-time password ' . $_SESSION["otp"] . '. ';

        $headers = 'From: GGMall <ggmall.inc2001@gmail.com>' . "\r\n";
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";  // Set from headers
        mail($to, $subject, $message, $headers);

        
        echo"
            <script>
                alert('Please check your E-mail');
                location.href = 'verifyOTP.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                  </div>
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                      <span class="invalid-feedback d-block"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/fyp-project/admin/login.php">Back to Admin Login</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>
