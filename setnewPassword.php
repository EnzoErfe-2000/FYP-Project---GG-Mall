<?php
include_once 'include/session-db-func.php';	
include_once 'include/header.php';

$pwd_err = $cfmpwd_err = "";
$pwd = $cfmpwd = "";

if(isset($_POST['setPassword']))
{
    if(empty($_POST['pwd']))
    {
        $pwd_err = "Please enter new password.";
    }
    else
    {
        $pwd = $_POST['pwd'];
    }

    if(empty($_POST['cpwd']))
    {
        $cfmpwd_err = "Please confirm your password.";
    }
    else
    {
        $cfmpwd = $_POST['cpwd'];
    }

    $password = $_POST['pwd'];
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
    {
        $pwd_err = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
    }

    if(empty($pwd_err) && empty($cfmpwd_err))
    {
        if($_POST['pwd'] == $_POST['cpwd'])
        {
            $eemail = $_SESSION["resetemail"];
            $password = $_POST['pwd'];
            $sql = "UPDATE customer SET customer_password = '" . password_hash($password, PASSWORD_DEFAULT) . "' WHERE customer_email_address =  '$eemail'";
            $sql_delete_otp = "DELETE FROM otp WHERE email = '$eemail'";

            if(mysqli_query($conn, $sql))
            {
                if(mysqli_query($conn, $sql_delete_otp))
                {
                    echo"
                        <script>
                            alert('Password updated.');
                            location.href = 'index.php';
                        </script>
                    ";
                }
                else
                {
                    echo"
                        <script>
                            alert('Something went wrong.');
                            location.href = 'index.php';
                        </script>
                    ";
                }
            }
            else
            {
                echo"
                    <script>
                        alert('Something went wrong.');
                        location.href = 'index.php';
                    </script>
                ";
            }
        }
        else
        {
            echo"
                <script>
                    alert('Password did not match.');
                    location.href = 'setnewPassword.php';
                </script>
            ";
        }
    }
}
?>
    <div class="header-empty-space"></div>

    <div class="container" style="border: 2px solid black; border-radius: 10px;">
        <p style="text-align: center; font-size: 28px; margin-top: 10px;">Enter New Password</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group" style="text-align: left">
                <label><b>Password</b> </label> </br>
                <input type="password" name="pwd" class="simple-input" placeholder="Enter your password">
                <span class="invalid-feedback d-block" style="color: red;"><?php echo $pwd_err; ?></span>
            </div>

            <div class="form-group" style="text-align: left">
                <label><b>Confirm Password</b> </label> </br>
                <input type="password" name="cpwd" class="simple-input" placeholder="Comfirm your password">
                <span class="invalid-feedback d-block" style="color: red;"><?php echo $cfmpwd_err; ?></span>
            </div>

            <div class="col-sm-6 text-right">
                <button class="button noshadow size-2 style-3" type="submit" name="setPassword" id="login_submit" class="login_submit" style="border:none; margin-bottom:10px; margin-left: 490px;">
                    <span class="button-wrapper">
                        <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                        <span class="text">Submit</span>
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
