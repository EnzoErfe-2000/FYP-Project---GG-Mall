<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';
require_once 'include/dbh-inc.php';

$name = $email = $phone = $dob = $address = "";
$email_err = $phone_err = "";

if(isset($_POST['submitt']))
{
    $name = $_POST['name'];
    $newemail = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    if (empty($_POST["phone"])) 
    {
        $phone_err = "Phone number is required";
    } 
    else if (!preg_match('/^[0-9]{10}+$/', $_POST["phone"]) && !preg_match('/^[0-9]{11}+$/', $_POST["phone"]) && !preg_match('/^[0-9]{12}+$/', $_POST["phone"])) 
    {
        $phone_err ="Invalid phone number format";
    }
    else 
    {
        $phone = $_POST["phone"];
    }

    if(empty($_POST['email']))
    {
        $email_err = "Please enter your email";
    }
    else if (!preg_match("/^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/", ($_POST["email"])))
    {
        $email_err = "Invalid email format";
    } 
    else
    {
        // Prepare a select statement

        $sql = "SELECT * FROM customer WHERE customer_email_address = '" . ($_POST["email"]) . "'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) 
        {
            //$email_err = "Email is taken";
        } 
    }
	echo "<script>alert($_POST[unit])</script>";
    if(empty($email_err) && empty($phone_err))
    {
        $sql = "
        UPDATE customer SET 
        customer_name = '".$_POST["name"]."', 
        customer_email_address = '". $_POST["email"]."', 
        customer_phone = '".$_POST["phone"]."', 
        customer_dateOfBirth = '".$_POST["dob"]."',
        customer_address_street = '".$_POST["address"]."',
		customer_address_unit = '".$_POST["unit"]."',
		customer_address_city = '".$_POST["city"]."',
		customer_address_state = '".$_POST["state"]."',
		customer_address_country = '".$_POST["country"]."',
		customer_address_postcodeZIP = '".$_POST["postcode"]."'
		
        WHERE customer_id = ". $_SESSION['customer_id'];

        if(mysqli_query($conn, $sql))
        {
            echo "
            <script> 
                alert('Updated Successfully');
                location.assign('/fyp-project/personal.php');
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
                                <h4 class="accounttitle">Personal Details</h4>
                                    <div class="welcome">
                                        <p class="lead">Hello, 
                                            <?php
                                                echo "<b>". $_SESSION['customer_name'] ."</b>";
                                            ?>
                                        - To update your account information.
                                        </p>
                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" >
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div id="personal-details">
                                                        <div class="form-group required">
                                                        <?php 
                                                            $sql = "SELECT * FROM customer WHERE customer_id = ".$_SESSION['customer_id'];
                                                            $result = mysqli_query($conn, $sql);
                                                    
                                                            while($row=mysqli_fetch_assoc($result)) 
                                                            {
                                                                $name = $row['customer_name'];
                                                                $email = $row['customer_email_address'];
                                                                $phone = $row['customer_phone'];
                                                                $dob = $row['customer_dateOfBirth'];
																$street = $row['customer_address_street'];
																$unit = $row['customer_address_unit'];
																$city = $row['customer_address_city'];
																$state = $row['customer_address_state'];
																$country = $row['customer_address_country'];
																$zip = $row['customer_address_postcodeZIP'];
                                                            }
                                                        ?>
                                                            <label for="input-name" class="control-label">Name</label>
                                                            <input type="text" class="simple-input" id="input-name" placeholder="Name" name="name" value="<?php echo $name?>" required>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label for="input-email" class="control-label">E-Mail</label>
                                                            <input type="email" class="simple-input" id="input-email" placeholder="name@email.com" name="email" value="<?php echo $email?>" required>
                                                            <span class="invalid-feedback" style="color: red;"><?php echo $email_err; ?></span>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label for="input-phone" class="control-label">Phone Number</label>
                                                            <input type="tel" class="simple-input" id="input-phone" placeholder="0123456789" name="phone" value="<?php echo $phone?>" required>
                                                            <span class="invalid-feedback" style="color: red;"><?php echo $phone_err; ?></span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="input-dob" class="control-label">Date of Birth</label>
                                                            <input type="date" class="simple-input" id="input-dob" placeholder="YYYY-MM-DD" name="dob" value="<?php echo $dob?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="input-dob" class="control-label">Street Address</label>
                                                            <input type="text" class="simple-input" id="input-address" placeholder="123, Taman 1, 75350 Melaka" name="address" value="<?php echo $street?>" required>
															<div class="empty-space col-xs-b10"></div>
															<div class="row m10">
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">Unit No.</label>
																	<div class="empty-space col-xs-b5"></div>
																	<input class="simple-input" type="text" value="<?=$unit?>" placeholder="Unit No." name="unit"/>
																	<div class="empty-space col-xs-b10"></div>
																</div>
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">Town/City</label>
																	<div class="empty-space col-xs-b5"></div>
																	<input class="simple-input" type="text" value="<?=$city?>" placeholder="Town/City" name="city"/>
																	<div class="empty-space col-xs-b10"></div>
																</div>
															</div>
															<div class="row m10">
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">State</label>
																	<div class="empty-space col-xs-b5"></div>
																	<input class="simple-input" type="text" value="<?=$state?>" placeholder="State" name="state"/>
																	<div class="empty-space col-xs-b10"></div>
																</div>
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">Country</label>
																	<div class="empty-space col-xs-b5"></div>
																	<input class="simple-input" type="text" value="<?=$country?>" placeholder="Country" name="country"/>
																	<div class="empty-space col-xs-b5"></div>
																</div>
															</div>
															<div class="row m10">
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">Postcode/ZIP</label>
																	<div class="empty-space col-xs-b10"></div>
																	<input class="simple-input" type="text" value="<?=$zip?>" placeholder="Postcode/ZIP" name="postcode"/>
																	<div class="empty-space col-xs-b5"></div>
																</div>
															</div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm=6">
                                                    <button class="button noshadow size-2 style-3" type="submit" name="submitt" id="submit" class="submit" style="border:none" >
                                                        <span class="button-wrapper">
                                                            <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                                            <span class="text">save</span>
                                                        </span>
                                                    </button>  
                                                </div>
                                            </div>
                                        </form>    
                                    </div>
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


<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>
