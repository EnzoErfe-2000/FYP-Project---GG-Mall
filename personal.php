<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';
require_once 'include/dbh-inc.php';

if(isset($_SESSION['customer_id']))
{
	$name = $email = $phone = $dob = $address = $postcode = $street = $unit = $city = $state = $country =  "";
	$email_err = $phone_err = $postcode_err = $name_err = $street_err = $unit_err = $city_err = $state_err = $country_err =  "";

	if(isset($_POST['submitt']))
	{
		$name = $_POST['name'];
		$newemail = $_POST['email'];
		$phone = $_POST['phone'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$postcode = $_POST['postcode'];
		$unit = $_POST['unit'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$country = $_POST['country'];

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
		
		if(empty($_POST['postcode']))
		{
			$postcode_err = "Please enter postcode.";
		}
		else if(!preg_match('/^[0-9]{5}+$/', $_POST["postcode"]))
		{
			$postcode_err = "Please enter valid postcode";
		}
		else 
		{
			$postcode = $_POST["postcode"];
		}

		if(empty($_POST['name']))
		{
			$name_err = "Please enter name.";
		}
		else if(!preg_match("/^[a-zA-Z-' ]*$/", $_POST["name"]))
		{
			$name_err = "Please enter valid name";
		}
		else 
		{
			$name = $_POST["name"];
		}

		if(empty($_POST['address']))
		{
			$address_err = "Please enter street address.";
		}
		else 
		{
			$address = $_POST["address"];
		}

		if(empty($_POST['unit']))
		{
			$unit_err = "Please enter unit no.";
		}
		else 
		{
			$unit = $_POST["unit"];
		}

		if(empty($_POST['city']))
		{
			$city_err = "Please enter city.";
		}
		else 
		{
			$city = $_POST["city"];
		}

		if(empty($_POST['state']))
		{
			$state_err = "Please enter state.";
		}
		else 
		{
			$state = $_POST["state"];
		}

		if(empty($_POST['country']))
		{
			$country_err = "Please enter country.";
		}
		else 
		{
			$country = $_POST["country"];
		}

		if(empty($email_err) && empty($phone_err) && empty($postcode_err) && empty($name_err) && empty($address_err) && empty($unit_err) && empty($city_err) && empty($state_err) && empty($country_err))
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
}
else
{
	echo "<script> location.assign('error_404.php');</script>";
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
                            <div class="col-xl-8 col-md-8" style="border: 2px solid black; border-radius: 15px;">
                                <h4 class="accounttitle"><br>Personal Details</h4>
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
                                                                $address = $row['customer_address_street'];
																$unit = $row['customer_address_unit'];
																$city = $row['customer_address_city'];
																$state = $row['customer_address_state'];
																$country = $row['customer_address_country'];
																$zip = $row['customer_address_postcodeZIP'];
                                                            }
                                                        ?>
                                                            <label for="input-name" class="control-label">Name</label>
                                                            <input type="text" class="simple-input" id="input-name" placeholder="Name" name="name" value="<?php echo $name?>" required>
                                                            <span class="invalid-feedback" style="color: red;"><?php echo $name_err; ?></span>
                                                        </div>
                                                        <div class="form-group required">
                                                            <label for="input-email" class="control-label">E-Mail</label>
                                                            <input type="email" readonly class="simple-input" id="input-email" placeholder="name@email.com" name="email" value="<?php echo $email?>" required>
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
                                                            <input type="text" class="simple-input" id="input-address" placeholder="123, Taman 1, 75350 Melaka" name="address" value="<?php echo $address?>" required>
															<div class="empty-space col-xs-b10"></div>
                                                            <span class="invalid-feedback" style="color: red;"><?php echo $street_err; ?></span>
															<div class="row m10">
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">Unit No.</label>
																	<div class="empty-space col-xs-b5"></div>
																	<input class="simple-input" id="input-unit" type="text" value="<?=$unit?>" placeholder="Unit No." name="unit"/>
																	<div class="empty-space col-xs-b10"></div>
                                                                    <span class="invalid-feedback" style="color: red;"><?php echo $unit_err; ?></span>
																</div>
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">Town/City</label>
																	<div class="empty-space col-xs-b5"></div>
																	<input class="simple-input" id="input-city" type="text" value="<?=$city?>" placeholder="Town/City" name="city"/>
																	<div class="empty-space col-xs-b10"></div>
                                                                    <span class="invalid-feedback" style="color: red;"><?php echo $city_err; ?></span>
																</div>
															</div>
															<div class="row m10">
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">State</label>
																	<div class="empty-space col-xs-b5"></div>
																	<input class="simple-input" id="input-state" type="text" value="<?=$state?>" placeholder="State" name="state"/>
																	<div class="empty-space col-xs-b10"></div>
                                                                    <span class="invalid-feedback" style="color: red;"><?php echo $state_err; ?></span>
																</div>
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">Country</label>
																	<div class="empty-space col-xs-b5"></div>
																	<input class="simple-input" id="input-country" type="text" value="<?=$country?>" placeholder="Country" name="country"/>
																	<div class="empty-space col-xs-b5"></div>
                                                                    <span class="invalid-feedback" style="color: red;"><?php echo $country_err; ?></span>
																</div>
															</div>
															<div class="row m10">
																<div class="col-sm-6">
																	<label for="input-dob" class="control-label">Postcode/ZIP</label>
																	<div class="empty-space col-xs-b10"></div>
																	<input class="simple-input" id="input-postcode" type="text" value="<?=$zip?>" placeholder="Postcode/ZIP" name="postcode"/>
																	<div class="empty-space col-xs-b5"></div>
                                                                    <span class="invalid-feedback" style="color: red;"><?php echo $postcode_err; ?></span>
																</div>
															</div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
												<div class="col-sm-6">
													<?php
														$sql ="
														SELECT * FROM address WHERE address.customer_id = $_SESSION[customer_id]
														";
														$stmt = mysqli_stmt_init($conn);
														if(!mysqli_stmt_prepare($stmt, $sql)){
															//header("location: cart.php?error=stmtfailed");
															//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
															//exit();
															mysqli_close($conn);
														}
														else
														{
														//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
														}
														mysqli_stmt_execute($stmt);
														$adressResult = mysqli_stmt_get_result($stmt);
														$adressResultRow = mysqli_fetch_assoc($adressResult);
													?>
													<div class="form-group required">
														<label for="address-selector" class="control-label">Select from your preset address & details.</label>
														<select class="SlectBox SumoUnder" tabindex=-1 id="address-selector" name="select-box" onchange="changeDetails(event)">
															<option disabled="disabled" selected="selected">Choose from presets</option>
															<option value='1'>1</option>
															<option value='2'>2</option>
															<option value='3'>3</option>
															<option value='4'>4</option>
														</select>
														<span class="invalid-feedback" style="color: red;"><?php echo $email_err; ?></span>
													</div>
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
                                                <br>
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
<script>
function changeDetails(e) {
	
	var currentIndexValue = e.target.options[e.target.selectedIndex].value;
    //alert(currentIndexValue);
	var firstName, lastName, currentName;
	var currentStreeAddress, currentCountry, currentCity;
	var currentState, currentPostcode, currentPhone,currentUnit;
	switch(parseInt(currentIndexValue))
	{
		case 1:
			firstName = <?php echo(json_encode($adressResultRow['fname1']))?>;
			lastName = <?php echo(json_encode($adressResultRow['lname1']))?>;
			currentStreeAddress = <?php echo(json_encode($adressResultRow['street_address1']))?>;
			currentCountry = <?php echo(json_encode($adressResultRow['country1']))?>;
			currentCity = <?php echo(json_encode($adressResultRow['city1']))?>; 
			currentState = <?php echo(json_encode($adressResultRow['state1']))?>; 
			currentPostcode = <?php echo(json_encode($adressResultRow['postcode1']))?>; 
			currentPhone = <?php echo(json_encode($adressResultRow['phone1']))?>;
			currentUnit = <?php echo(json_encode($adressResultRow['unit_no1']))?>;
			currentName = firstName + " " + lastName;
			break;
		case 2:
			firstName = <?php echo(json_encode($adressResultRow['fname2']))?>;
			lastName = <?php echo(json_encode($adressResultRow['lname2']))?>;
			currentStreeAddress = <?php echo(json_encode($adressResultRow['street_address2']))?>;
			currentCountry = <?php echo(json_encode($adressResultRow['country2']))?>;
			currentCity = <?php echo(json_encode($adressResultRow['city2']))?>; 
			currentState = <?php echo(json_encode($adressResultRow['state2']))?>; 
			currentPostcode = <?php echo(json_encode($adressResultRow['postcode2']))?>; 
			currentPhone = <?php echo(json_encode($adressResultRow['phone2']))?>;
			currentUnit = <?php echo(json_encode($adressResultRow['unit_no2']))?>;
			currentName = firstName + " " + lastName;
			break;
		case 3:
			firstName = <?php echo(json_encode($adressResultRow['fname3']))?>;
			lastName = <?php echo(json_encode($adressResultRow['lname3']))?>;
			currentStreeAddress = <?php echo(json_encode($adressResultRow['street_address3']))?>;
			currentCountry = <?php echo(json_encode($adressResultRow['country3']))?>;
			currentCity = <?php echo(json_encode($adressResultRow['city3']))?>; 
			currentState = <?php echo(json_encode($adressResultRow['state3']))?>; 
			currentPostcode = <?php echo(json_encode($adressResultRow['postcode3']))?>; 
			currentPhone = <?php echo(json_encode($adressResultRow['phone3']))?>;
			currentUnit = <?php echo(json_encode($adressResultRow['unit_no3']))?>;
			currentName = firstName + " " + lastName;
			break;
		case 4:
			firstName = <?php echo(json_encode($adressResultRow['fname4']))?>;
			lastName = <?php echo(json_encode($adressResultRow['lname4']))?>;
			currentStreeAddress = <?php echo(json_encode($adressResultRow['street_address4']))?>;
			currentCountry = <?php echo(json_encode($adressResultRow['country4']))?>;
			currentCity = <?php echo(json_encode($adressResultRow['city4']))?>; 
			currentState = <?php echo(json_encode($adressResultRow['state4']))?>; 
			currentPostcode = <?php echo(json_encode($adressResultRow['postcode4']))?>; 
			currentPhone = <?php echo(json_encode($adressResultRow['phone4']))?>;
			currentUnit = <?php echo(json_encode($adressResultRow['unit_no4']))?>;
			currentName = firstName + " " + lastName;
			break;	
		default:
	}
	document.getElementById("input-name").value = currentName;
	document.getElementById("input-address").value = currentStreeAddress;
	document.getElementById("input-country").value = currentCountry;
	document.getElementById("input-city").value = currentCity;
	document.getElementById("input-state").value = currentState;
	document.getElementById("input-postcode").value = currentPostcode;
	document.getElementById("input-phone").value = currentPhone;
	document.getElementById("input-unit").value = currentUnit;
}
</script>