<?php
    include_once 'include/session-db-func.php';
    include_once 'include/header.php';
    include_once 'include/dbh-inc.php';

    $newpassword = $oldpassword = $cfmpassword = "";
    $newpassworderr = $cfmpassworderr = "";

    if(isset($_POST['save']))
    {
        $oldpassword = $_POST['old-password'];
        $newpassword = $_POST['new-password'];
        $cfmpassword = $_POST['new-confirm'];
        $sql = "SELECT customer_password FROM customer WHERE customer_id = ?;";

        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql))
        {
            //echo "<script type='text/javascript'>alert('stmt failed!');</script>";
        }
        else
        {
            //echo "<script type='text/javascript'>alert('stmt successful!');</script>";
        }

        mysqli_stmt_bind_param($stmt, "s", $_SESSION['customer_id']);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if(password_verify($oldpassword, $row['customer_password']))
        {
            $uppercase = preg_match('@[A-Z]@', $newpassword);
            $lowercase = preg_match('@[a-z]@', $newpassword);
            $number = preg_match('@[0-9]@', $newpassword);
            $specialChars = preg_match('@[^\w]@', $newpassword);

            if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpassword) < 8) 
            {
                $newpassworderr = "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            }
            else if($newpassword != $cfmpassword)
            {
                $cfmpassworderr = "Password does not match";
            }

            if(empty($newpassworderr) && empty($cfmpassworderr))
            {
                if($oldpassword != $newpassword)
                {
                    $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);
    
                    $sql = "UPDATE customer SET customer_password = '$hashed_password' WHERE customer_id = ". $_SESSION['customer_id'];
        
                    if(mysqli_query($conn, $sql))
                    {
                        echo "
                        <script> 
                            alert('Password Updated Successfully');
                            location.assign('/fyp-project/pw_change.php');
                        </script>";
                    }
                    else
                    {
                        echo"
                        <script> 
                            alert('Something went wrong');
                        </script>";
                    }
                }
                else
                {
                    echo"
                        <script> 
                            alert('Please insert different password');
                        </script>";
                }
            }
        }
        else
        {
            echo"
                <script> 
                    alert('Password does not match');
                </script>";
        }

    }
?>
<head>
    <style>
        .containerr
        {
            color:Black;
            background-color:white;
            margin-top: 70px;
            margin-left: 50px;
            margin-bottom: 80px;
            width: 1500px;
        }

        .accounttitle
        {
            margin-left:30px;
            margin-bottom:30px;
        }

        .welcome
        {
            margin-left:30px;
        }

        .dashboardmenu
        {
            margin-bottom:10px;
        }

        ul.a 
        {
            list-style-type: square;
            margin-left:11px;
            padding:1%;
            margin-bottom:5%;
        }
    </style>
</head>
<body>
    <div class="header-empty-space"></div>
        <div class="containerr">
            <div class="row">
                <div class="col-12">
                    <div class="dashboard">
                        <div class="row">
                            <div class="col-xl-8 col-md-8">
                                <h4 class="accounttitle">Change Password</h4>
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" >
                                        <div class="row">
                                            <div class="col-sm-6" style="margin-left:30px;">
                                                <div class="form-group required">
                                                    <label for="input-password" class="control-label">Old Password</label>
                                                    <input type="password" class="simple-input" id="input-password" name="old-password" required>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-password" class="control-label">New Password</label>
                                                    <input type="password" class="simple-input" id="input-password" name="new-password" onkeyup="validatepassword(this.value);" required><span id="msg"></span>
                                                    <span class="invalid-feedback" style="color: red;"><?php echo $newpassworderr; ?></span>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-confirm" class="control-label">New Password Confirm</label>
                                                    <input type="password" class="simple-input" id="input-confirm" name="new-confirm" required>
                                                    <span class="invalid-feedback" style="color: red;"><?php echo $cfmpassworderr; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm=6" style="margin-left:40px;">
                                                <button class="button noshadow size-2 style-3" type="submit" name="save" id="submit" class="submit" style="border:none" onclick="validate">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                                        <span class="text">save</span>
                                                    </span>
                                                </button>  
                                            </div>
                                        </div>
                                    </form>    
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="dashboardmenu"><span style="font-size:18px; text-decoration:underline; font-weight:bold;" >Account Selection</span>
                                    <div class="menus">
                                        <ul class="a">
                                            <li>
                                                <a href="profile.php">
                                                Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="personal.php">
                                                Personal Details</a>
                                            </li>
                                            <li>
                                                <a href="pw_change.php">
                                                Password Changes</a>
                                            </li>
                                            <li>
                                                <a href="address.php">
                                                Address Details</a>
                                            </li>
                                            <li>
                                                <a href="user_order.php">
                                                Orders</a>
                                            </li>
                                            <li>
                                                <a href='/fyp-project/include/logout-inc.php'>
                                                Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</body>
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
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>
