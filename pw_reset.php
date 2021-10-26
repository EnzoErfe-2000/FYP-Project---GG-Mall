<?php
include_once 'include/session-db-func.php';	
include_once 'include/header.php';

if (isset($_SESSION["loggedin"])) {
	header("location: index.php");
	exit;
}

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

if(isset($_POST['forgetpass']))
{
    if(empty($_POST['email']))
    {
        $email_err = "Please enter your email to reset password.";
    }
    else 
    {
		$email = $_POST["email"];
	}

    $sql = "SELECT * FROM customer WHERE customer_email_address = '$email'";
	$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

		while ($row = mysqli_fetch_assoc($result)) 
        {
			$_SESSION["resetid"] = $row["customer_id"];
			$_SESSION["resetemail"] = $row["customer_email_address"];
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
                location.href = 'setPassword.php';
            </script>
        ";
    }
}
?>
    <div class="header-empty-space"></div>

    <div class="container" style="border: 2px solid black; border-radius: 10px;">
        <p style="text-align: center; font-size: 28px; margin-top: 10px;">Forget Password</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group" style="text-align: left">
                <label><b>Email:</b> </label> </br>
                <input type="text" name="email" class="simple-input" placeholder="Enter your email">
                <span class="invalid-feedback d-block" style="color: red;"><?php echo $email_err; ?></span>
            </div>

            <div class="col-sm-6 text-right">
                <button style="border:none; margin-bottom:10px; margin-left: 490px;" class="button noshadow size-2 style-3" type="submit" name="forgetpass" id="login_submit" class="login_submit" >
                    <span class="button-wrapper">
                        <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                        <span class="text">send</span>
                    </span>
                </button>  
            </div>
        </form>
    </div>

    <div class="header-empty-space"></div>
<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>
