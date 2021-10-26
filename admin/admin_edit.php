<?php
    include_once '../admin/include/adminheader.php';	

    if(isset($_GET["admin_id"])) {
        $_SESSION["adminid"] = $_GET["admin_id"];
        $sql = "SELECT * FROM admin WHERE admin_id = " . $_GET["admin_id"];
        $result=mysqli_query($conn, $sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $adminName = $row['admin_name'];
            $adminEmail = $row['admin_emailAddress'];
            $adminNum = $row['admin_contactNo'];
        }
    }

    $name = $email = $number = "";
    $name_err = $email_err = $number_err = "";

    if(isset($_POST['set']))
    {
        if(empty($_POST['name']))
        {
            echo"
            <script>
                alert('Enter name.');
            </script>
            ";
        }
        else
        {
            $name = $_POST['name'];
        }

        if(empty($_POST['email']))
        {
            echo"
            <script>
                alert('Enter email.');
            </script>
            ";
        }
        else
        {
            $email = $_POST['email'];
        }

        if(empty($_POST['number']))
        {
            echo"
            <script>
                alert('Enter number.');
            </script>
            ";
        }
        else if (!preg_match('/^[0-9]{10}+$/', $_POST["number"]) && !preg_match('/^[0-9]{11}+$/', $_POST["number"]) && !preg_match('/^[0-9]{12}+$/', $_POST["number"])) 
        {
            echo"
            <script>
                alert('Invalid phone number format');
                location.href = 'adminlist.php';
            </script>
            ";
            $number_err = "Invalid phone number";
        }
        else
        {
            $number = $_POST['number'];
        }

        if(empty($name_err) && empty($email_err) && empty($number_err))
        {
            $sql = "UPDATE admin SET admin_name = '$name', admin_emailAddress = '$email', admin_contactNo = '$number' WHERE admin_id = " .$_SESSION["adminid"];
            if(mysqli_query($conn, $sql))
            {
                echo'
                    <script>
                        alert("Updated infomation.");
                        location.href = "adminlist.php";
                    </script>
                ';
            }
            else
            {
                echo'
                    <script>
                        alert("Something went wrong.");
                        location.href = "adminlist.php";
                    </script>
                ';
            }
        }
    }

    $new_pw_err = $new_cfpw_err = $oldpw_err = "";
?>
<div class="col-lg-12">
    <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Edit Admin Profile</h6>
        </div>
        <div class = "row">
            <div class="col-xl-8 col-md-8">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" >
                    <div class="row">
                        <div class="col-sm-6" style="margin-left:30px;">
                            <div class="form-group required">
                                <label for="input-name" class="control-label">Name</label><br>
                                <input type="text" class="simple-input" id="input-password" name="name" placeholder="<?php echo $adminName ?>" required style="width: 350px;">
                                <span class="invalid-feedback d-block"><?php echo $oldpw_err; ?></span>
                            </div>
                            <div class="form-group required">
                                <label for="input-email" class="control-label">Email</label><br>
                                <input type="email" class="simple-input" id="input-email" name="email"  placeholder="<?php echo $adminEmail ?>" required style="width: 350px;">
                                <span class="invalid-feedback d-block" ><?php echo $new_pw_err; ?></span>
                                <span id="msg"></span>
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="control-label">Contact No</label><br>
                                <input type="text" class="simple-input" id="input-number" name="number" placeholder="<?php echo $adminNum ?>" required style="width: 350px;">
                                <span class="invalid-feedback d-block" style="color: red;"><?php echo $new_cfpw_err; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 50px;">
                        <div class="col-sm=6" style="margin-left:40px;">
                            <button class="btn btn-primary" type="submit" name="set" id="submit" class="submit" style="border:none; margin-top: 20px;">
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