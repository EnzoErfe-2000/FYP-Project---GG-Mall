<?php
include_once 'include/session-db-func.php';	
include_once 'include/header.php';

$code_err = "";
$code = "";
if(isset($_POST['vfypass']))
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
                location.href = 'setnewPassword.php';
            </script>
        ";
    }
    else
    {
        $code_err = "You have entered wrong code.";
    }

}
?>
    <div class="header-empty-space"></div>

    <div class="container" style="border: 2px solid black; border-radius: 10px;">
        <p style="text-align: center; font-size: 28px; margin-top: 10px;">Verify Code</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group" style="text-align: left">
                <label><b>OTP Code:</b> </label> </br>
                <input type="text" name="code" class="simple-input" placeholder="Enter your code">
                <span class="invalid-feedback d-block" style="color: red;"><?php echo $code_err; ?></span>
            </div>

            <div class="col-sm-6 text-right">
                <button class="button noshadow size-2 style-3" type="submit" name="vfypass" id="login_submit" class="login_submit" style="border:none; margin-bottom:10px; margin-left: 490px;">
                    <span class="button-wrapper">
                        <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                        <span class="text">Verify</span>
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
