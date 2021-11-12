<?php
session_start();
include_once '../include/dbh-inc.php';

$code_err = "";
$code = "";
$Remail = "";
$otpCode = "";
if(isset($_POST['submitt']))
{
    if(empty($code))
    {
        $code_err = "Please enter your OTP code.";
    }
    else 
    {
        $code = $_POST['code'];
    }

    $Remail = $_SESSION["resetemail"];

    $sql = "SELECT * FROM otp WHERE email = '$Remail' ";
    $result = mysqli_query($conn, $sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $otpCode = $row['code'];
    }

    if($_POST['code'] == $otpCode)
    {
        echo"
            <script>
                alert('Left one step to reset your password.');
                location.href = 'admin_new_pw.php';
            </script>
        ";
    }
    else
    {
        $code_err = "You have entered wrong code.";
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
                    <h1 class="h4 text-gray-900 mb-4">Verify OTP</h1>
                  </div>
                  <form action="#" method="post">
                    <div class="form-group">
                    <input type="text" name="code" class="form-control" placeholder="Enter your code">
                      <span class="invalid-feedback d-block"><?php echo $code_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block" name="submitt" value="Submit">
                    </div>
                  </form>
                  <hr>
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

