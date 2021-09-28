<?php
    include_once 'include/header.php';
    include_once 'include/dbh-inc.php';

    $newpassword = $oldpassword = $cfmpassword = "";

    if(isset($_POST['save']))
    {
        $oldpassword = $_POST['old-password'];
        $newpassword = $_POST['new-password'];
        $cfmpassword = $_POST['new-confirm'];

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
                                                    <input type="password" class="simple-input" id="input-password" name="new-password" required>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-confirm" class="control-label">New Password Confirm</label>
                                                    <input type="password" class="simple-input" id="input-confirm" name="new-confirm" required>
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


<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>
