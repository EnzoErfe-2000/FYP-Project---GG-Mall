<!--Register Function-->
<?php
    require_once 'dbh-inc.php';
	require_once 'functions-inc.php';

    // Define variables and initialize with empty values
	$email_chk = $username_chk = $pwd_chk = $cpwd_chk = 0;
    $email_err = $username_err = $password_err = $confirm_password_err = "";

    function test_input($data) 
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Processing form data when form is submitted
    if(isset($_POST['submit']))
    {
 
        // Validate email
        if (!filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) 
        {
            $email_err = "Invalid email format";
			echo '<script type="text/javascript">alert("wrong format.");</script>';
        } 
		else
		{
			// Prepare a select statement

            $sql = "SELECT * FROM customer WHERE customer_email_address = '" . test_input($_POST["email"]) . "'";
            $result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) 
            {
                echo '<script type="text/javascript">alert("Email taken.");</script>';
            } 
            else 
            {
                $email = test_input($_POST["email"]);
				$email_chk = 1;
            }
		}
		
		// Validate username
        if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"])))
        {
			echo '<script type="text/javascript">alert("Username can only contain letters, numbers, and underscores.");</script>';
        } 
        else
        {
            $username = ucwords(test_input($_POST["username"]));
			$username_chk = 1;
        }
		
		// Validate password
        if(strlen(trim($_POST["password"])) < 6)
        {
			echo '<script type="text/javascript">alert("Password must have atleast 6 characters.");</script>';
        } 
        else
        {
            $password = ($_POST["password"]);
			$pwd_chk = 1;
        }
		
		// Validate confirm password
        $confirm_password = $_POST["confirm_password"];

        if($password != $confirm_password)
        {
			echo '<script type="text/javascript">alert("Password did not match.");</script>';
        }
		else
			$cpwd_chk = 1;
		
		
		// Check input errors before inserting in database
        if($email_chk == 1 && $username_chk == 1 && $pwd_chk == 1 && $cpwd_chk == 1)
        {
			// Prepare an insert statement
            $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO customer (customer_email_address, customer_name, customer_password ) VALUES ('$email', '$username', '$hashed_pass')";
            
            if (mysqli_query($conn, $sql)) 
            {
                echo "
                <script>
                  alert('New account created');
				  location.assign('/fyp-project/index.php');
                </script>";
            }
            else 
            {
				echo "
				<script>
					alert('Error: " . $sql . "\n" . mysqli_error($conn) . "');
				</script>";
            }
        }
		else{
			echo "
            <script>
				history.go(-1);
            </script>";
		}
        // Close connection
        mysqli_close($conn);
    }

?>