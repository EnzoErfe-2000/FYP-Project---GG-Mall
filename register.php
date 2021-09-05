<?php
    // Include config file
    require "db/common.php";
    
    // Define variables and initialize with empty values
    $email = $username = $password = $confirm_password = "";
    $email_err = $username_err = $password_err = $confirm_password_err = "";

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
 
        // Validate email
        if (empty($_POST["email"])) 
        {
            $email_err = "Email is required";

        } else if (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
            
        } else 
        {
            // Prepare a select statement

            $sql = "SELECT customer_id FROM customer WHERE customer_email_address = '" . test_input($_POST["email"]) . "'";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                $email_err = "Email is taken";

            } else {
                $email = test_input($_POST["email"]);

            }
        }

        // Validate username
        if(empty($_POST["username"]))
        {
            $username_err = "Please enter a username.";
        } 
        elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"])))
        {
            $username_err = "Username can only contain letters, numbers, and underscores.";
        } 
        else
        {
            $username = ucwords(test_input($_POST["username"]));
        }
        
        
        // Validate password
        if(empty($_POST["password"]))
        {
            $password_err = "Please enter a password.";     
        }
         elseif(strlen(trim($_POST["password"])) < 6)
        {
            $password_err = "Password must have atleast 6 characters.";
        } else
        {
            $password = ($_POST["password"]);
        }
        
        // Validate confirm password
        if(empty($_POST["confirm_password"]))
        {
            $confirm_password_err = "Please confirm password.";     
        }
        else
        {
            $confirm_password = $_POST["confirm_password"];

            if(empty($password_err) && ($password != $confirm_password))
            {
                $confirm_password_err = "Password did not match.";
            }
        }
        
        // Check input errors before inserting in database
        if(empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err))
        {
            
            // Prepare an insert statement
            $sql = "INSERT INTO customer (customer_email_address, customer_name, customer_password ) VALUES ('$email', '$username', '$password')";
            
            if (mysqli_query($con, $sql)) 
            {
                echo "
                <script>
                  alert('New account created');
                  location.href = 'index.php';
                </script>";
      
            }
            else 
            {
            echo "
            <script>
                alert('Error: " . $sql . "\n" . mysqli_error($con) . "')
            </script>";
    
            }
        }
    
        // Close connection
        mysqli_close($con);
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap.extension.css" rel="stylesheet" type="text/css" />
    <link href="css/swiper.css" rel="stylesheet" type="text/css" />
    <link href="css/sumoselect.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="img/favicon.ico" />
  	<title>EX ZO</title>
    <style>
        body
        { 
            font: 14px sans-serif; 
            background-image: url("https://cdn.wallpaper.com/main/styles/responsive_1460w_scale/s3/wallpaperstore2.jpg?itok=ld54IJZc");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .wrapper{ width: 360px; padding: 20px; }

        .loginbox
        {
            width: 40%;
            text-align: center;
            border-radius: 5px;
            border-style: double;
            border-color: black;
            background-color: white;
            justify-content: center;
            padding: 50px;
            margin-top: 35px;
            margin-bottom: 37px;
            margin-left: 480px;
        }
    </style>
</head>
<body>
    <div class="wrapper loginbox">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>E-mail</label> </br>
                <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div> 
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            <p>Back to <a href="index.php">Home</a></p>
        </form>
    </div>    
</body>
</html>