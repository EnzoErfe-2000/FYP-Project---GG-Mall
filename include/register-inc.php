<!--Register Function-->
<?php
    require_once 'dbh-inc.php';
	require_once 'functions-inc.php';

    // Define variables and initialize with empty values
	$email_chk = $username_chk = $pwd_chk = $cpwd_chk = 0;
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
    if(isset($_POST['submit']))
    {
 
        // Validate email
        if (!preg_match("/^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/", test_input($_POST["email"]))) 
        {
            $email_err = "Invalid email format";
			echo '<script type="text/javascript">alert("Invalid email format.");history.go(-1);</script>';
        } 
		else
		{
			// Prepare a select statement

            $sql = "SELECT * FROM customer WHERE customer_email_address = '" . test_input($_POST["email"]) . "'";
            $result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) 
            {
                echo '<script type="text/javascript">alert("Email taken.");history.go(-1);</script>';
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
			echo '<script type="text/javascript">alert("Username can only contain letters, numbers, and underscores.");history.go(-1);</script>';
        } 
        else
        {
            $username = ucwords(test_input($_POST["username"]));
			$username_chk = 1;
        }
		
		// Validate password
        $password = $_POST['password'];
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if(empty($_POST['password']))
        {
            $password_err = "Please enter a password";
            echo '<script type="text/javascript">alert("Please enter a password.");</script>';
        }
        else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
        {
            $password_err = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            echo '<script type="text/javascript">alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");history.go(-1);</script>';
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
		{
            $confirm_password = $_POST["confirm_password"];
            $cpwd_chk = 1;
        }
		
		// Check input errors before inserting in database
        if($email_chk == 1 && $username_chk == 1 && $pwd_chk == 1 && $cpwd_chk == 1)
        {
			// Prepare an insert statement
            $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO customer (customer_email_address, customer_name, customer_password ) VALUES ('$email', '$username', '$hashed_pass')";
            $sqll= "SELECT customer_id from customer where customer_email_address = '$email' and customer_password = '$hashed_pass'";

            if (mysqli_query($conn, $sql)) 
            {
				if($id=mysqli_query($conn, $sqll))
                {
                    while($row=mysqli_fetch_assoc($id))
                    {
                        $sql_insert_address = "INSERT INTO address (customer_id) VALUES (" . $row['customer_id'] . ")";

                        if(mysqli_query($conn, $sql_insert_address))
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
									alert('Error: " . $sql_insert_address . "\n" . mysqli_error($conn) . "');
								</script>";
						}
					}
				}
			}
			else
			{
				echo "
				<script>
					alert('Error: " . $sql . "\n" . mysqli_error($conn) . "');
					history.go(-1);
				</script>";
			}
		}
        // Close connection
        mysqli_close($conn);
    }

?>