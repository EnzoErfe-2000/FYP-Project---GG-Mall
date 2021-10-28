<?php
include_once '../admin/include/adminheader.php';	

$old_pw = $new_pw = $new_cfpw = "";
$new_pw_err = $new_cfpw_err = $oldpw_err = "";

if(isset($_POST['save']))
{
    $old_pw = $_POST['old-password'];
    $new_pw = $_POST['new-password'];
    $new_cfpw = $_POST['new-confirm'];
    $sql = "SELECT * FROM admin WHERE admin_id = ".$_SESSION["id"];

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if($old_pw == $row['admin_password'])
    {
        $uppercase = preg_match('@[A-Z]@', $new_pw);
        $lowercase = preg_match('@[a-z]@', $new_pw);
        $number = preg_match('@[0-9]@', $new_pw);
        $specialChars = preg_match('@[^\w]@', $new_pw);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($new_pw) < 8) 
        {
            $new_pw_err = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
        }
        else if($new_pw != $new_cfpw)
        {
            $new_cfpw_err = "Password does not match";
        }

        if(empty($new_pw_err) && empty($new_cfpw_err))
        {
            if($old_pw != $new_pw)
            {
                $sql = "UPDATE admin SET admin_password = '$new_pw' WHERE admin_id = ". $_SESSION['id'];

                if(mysqli_query($conn, $sql))
                {
                    echo'
                        <script>
                            alert("New password successfully update.");
                            location.href = "adminchange.php";
                        </script>
                    ';
                }
                else
                {
                    echo'
                        <script>
                            alert("Something went wrong");
                        </script>
                    ';
                }
            }
            else
            {
                echo'
                    <script>
                        alert("Please insert different password");
                    </script>
                ';
            }
        }

    }
    else
    {
        $oldpw_err = "Password does not match";
    }
}

?>
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Admin Change Password</h6>
        </div>
        <div class = "row">
            <div class="col-xl-8 col-md-8">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" >
                    <div class="row">
                        <div class="col-sm-6" style="margin-left:30px;">
                            <div class="form-group required">
                                <label for="input-password" class="control-label">Old Password</label><br>
                                <input type="password" class="simple-input" id="input-password" name="old-password" required style="width: 350px;">
                                <span class="invalid-feedback d-block"><?php echo $oldpw_err; ?></span>
                            </div>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">New Password</label><br>
                                <input type="password" class="simple-input" id="input-password" name="new-password" onkeyup="validatepassword(this.value);" required style="width: 350px;">
                                <span class="invalid-feedback d-block" ><?php echo $new_pw_err; ?></span>
                                <span id="msg"></span>
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="control-label">New Password Confirm</label><br>
                                <input type="password" class="simple-input" id="input-confirm" name="new-confirm" required style="width: 350px;">
                                <span class="invalid-feedback d-block" style="color: red;"><?php echo $new_cfpw_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-sm=6" style="margin-left:40px;">
                            <button class="btn btn-primary" type="submit" name="save" id="submit" class="submit" style="border:none; margin-top: 20px;">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                    <span class="text">Save</span>
                                </span>
                            </button>  
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>  
</div>      
<script>
    function validatepassword(password) {
        // Do not show anything when the length of password is zero.
        if (password.length === 0) {
            document.getElementById("msg").innerHTML = "";
            return;
        }
        // Create an array and push all possible values that you want in password
        var matchedCase = new Array();
        matchedCase.push("[$@$!%*#?&]"); // Special Charector
        matchedCase.push("[A-Z]"); // Uppercase Alpabates
        matchedCase.push("[0-9]"); // Numbers
        matchedCase.push("[a-z]"); // Lowercase Alphabates

        // Check the conditions
        var ctr = 0;
        for (var i = 0; i < matchedCase.length; i++) {
            if (new RegExp(matchedCase[i]).test(password)) {
                ctr++;
            }
        }
        // Display it
        var color = "";
        var strength = "";
        switch (ctr) {
            case 0:
            case 1:
            case 2:
                strength = "Very Weak";
                color = "red";
                break;
            case 3:
                strength = "Medium";
                color = "orange";
                break;
            case 4:
                strength = "Strong";
                color = "green";
                break;
        }
        document.getElementById("msg").innerHTML = strength;
        document.getElementById("msg").style.color = color;
    }

</script>
<?php
include_once 'include/adminfooter.php';	
?>