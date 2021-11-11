<?php
session_start();
include_once '../include/dbh-inc.php';

$pwd_err = $cfmpwd_err = "";
$password = $cfmpwd = "";

if(isset($_POST['send']))
{
    if(empty($_POST['password']))
    {
        $pwd_err = "Please enter new password.";
    }
    else
    {
        $password = $_POST['password'];
    }

    if(empty($_POST['cfmpw']))
    {
        $cfmpwd_err = "Please confirm your password.";
    }
    else
    {
        $cfmpwd = $_POST['cfmpw'];
    }

    $password = $_POST['password'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
    {
        $pwd_err = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
    }

    if($_POST['password'] != $_POST['cfmpw'])
    {
        $cfmpwd_err = "Password did not match.";
    }

    if(empty($pwd_err) && empty($cfmpwd_err))
    {
        $sql_updatepass = "UPDATE admin SET admin_password = '".$_POST['password']."' WHERE admin_emailAddress = '".$_SESSION["resetemail"]."'";
        $sql_delete_otp = "DELETE FROM otp WHERE email = '".$_SESSION["resetemail"]."'";

        if(mysqli_query($conn, $sql_updatepass))
        {
            if(mysqli_query($conn, $sql_delete_otp))
            {
                echo"
                    <script>
                        alert('Password updated.');
                        location.href = 'login.php';
                    </script>
                ";
            }
            else
            {
                echo"
                    <script>
                        alert('Something wrong.');
                    </script>
                ";
            }
        }
        else
        {
            echo"
                <script>
                    alert('Something went wrong.');
                </script>
            ";
        }
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
                    <h1 class="h4 text-gray-900 mb-4">Set New Password</h1>
                  </div>
                  <form action="#" method="post">
                    <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Enter New password">
                      <span class="invalid-feedback d-block"><?php echo $pwd_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="cfmpw" placeholder="Confirm Password">
                      <span class="invalid-feedback d-block"><?php echo $cfmpwd_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block" name="send" value="Submit">
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

