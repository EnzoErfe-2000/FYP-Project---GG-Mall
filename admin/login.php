<?php
  require "../include/dbh-inc.php";

  $email = $password = "";
  $email_err = $password_err = $login_err = "";

  if (isset($_POST['login']))
  {
    if(empty($_POST['email']))
    {
      echo'
          <script>
            alert("Please enter email.");
          </script>
        ';
    }
    else
    {
      $email = trim($_POST["email"]);
    }

    if(empty($_POST['password']))
    {
      echo'
          <script>
            alert("Please enter password.");
          </script>
        ';
    }
    else
    {
      $password = $_POST["password"];
    }

    if(empty($email_err) && empty($password_err))
    { 
      $sql = "SELECT * FROM admin WHERE admin_emailAddress = '$email' AND admin_password = '$password' ";
      $result = mysqli_query($conn, $sql);

      if(mysqli_num_rows($result) == 1)
      {
        while($row=mysqli_fetch_assoc($result))
        {
          session_start();
          $_SESSION["loggedin"] = true;
          $_SESSION["name"] = $row['admin_name'];
		  $_SESSION["id"] = $row['admin_id'];
          $_SESSION["status"] = $row['admin_status'];
        }
        echo"
          <script>
            alert('Welcome back ". $_SESSION["name"]."');
            location.href='index.php'
          </script>
        ";
      }
      else
      {
        echo'
          <script>
            alert("Admin not found.");
          </script>
        ';
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
  <link href="../img/logo1~1.png" rel="icon">
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
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form action="#" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address" required>
                      <span class="invalid-feedback"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password" required>
                      <span class="invalid-feedback"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
                    </div>
                    <hr>
                    <a href="admin_pw_reset.php" class="btn btn-google btn-block">
                      Forgot Password
                    </a>
                    <!--
                    <a href="index.html" class="btn btn-facebook btn-block">
                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                              </a>
                    -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="/fyp-project/index.php">Back to User Login</a>
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