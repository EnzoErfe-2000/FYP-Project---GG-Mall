<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';
require_once 'include/dbh-inc.php';

$fname = $lname = $phone = $unit = $address = $country = $state = $pcode = $city = "";
$fname_err = $lname_err = $phone_err = $unit_err = $address_err = $country_err = $state_err = $pcode_err = $city_err = "";
$form = "true";

$fname = array();
$lname = array();
$phone = array();
$unit = array();
$address = array();
$country = array();
$state = array();
$pcode = array();
$city = array();

if(isset($_POST['addaddress']))
{
   $sql = "
            UPDATE address SET 
            fname" . $_POST["no"] . " = '" . ($_POST['input-fname']) . "',
            lname" . $_POST["no"] . " = '" . ($_POST['input-lname']) . "',
            phone" . $_POST["no"] . " = '" . ($_POST['input-phone']) . "',
            unit_no" . $_POST["no"] . " = '" . ($_POST['input-unit']) . "',
            street_address" . $_POST["no"] . " = '" . ($_POST['input-address']) . "',
            country" . $_POST["no"] . " = '" . ($_POST['input-country']) . "',
            state" . $_POST["no"] . " = '" . ($_POST['input-state']) . "',
            postcode" . $_POST["no"] . " = '" . ($_POST['input-pcode']) . "',
            city" . $_POST["no"] . " = '" . ($_POST['input-city']) . "'
            WHERE customer_id = " . $_SESSION["customer_id"];

    if(mysqli_query($conn, $sql))
    {
        echo'
            <script>
                alert("Updated.");
            </script>
        ';
    }
    else
    {
        echo'
            <script>
                alert("Something went wrong.");
            </script>
        ';
    }
}
   
$show = "SELECT * FROM address where customer_id = " . $_SESSION["customer_id"];
if($result = mysqli_query($conn, $show))
{
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($fname, $row['fname1'], $row['fname2'], $row['fname3'], $row['fname4']);
        array_push($lname, $row['lname1'], $row['lname2'], $row['lname3'], $row['lname4']);
        array_push($phone, $row['phone1'], $row['phone2'], $row['phone3'], $row['phone4']);
        array_push($unit, $row['unit_no1'], $row['unit_no2'], $row['unit_no3'], $row['unit_no4']);
        array_push($address, $row['street_address1'], $row['street_address2'], $row['street_address3'], $row['street_address4']);
        array_push($country, $row['country1'], $row['country2'], $row['country3'], $row['country4']);
        array_push($state, $row['state1'], $row['state2'], $row['state3'], $row['state4']);
        array_push($pcode, $row['postcode1'], $row['postcode2'], $row['postcode3'], $row['postcode4']);
        array_push($city, $row['city1'], $row['city2'], $row['city3'], $row['city4']);
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

        .modal-body
        {
            overflow-y: scroll;
            max-height: calc(100vh - 210px);
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
                            <div class="col-md-8">
                                <h4 class="accounttitle">Address</h4>
                                <div class="container" style="background-color: rgb(66, 170, 245); border-radius: 5px;">
                                    <div class="row" style="margin-top: 10px; margin-left:30px; font-size: 16px;">
                                        <?php

                                            $counterr = 0;
                                            for($x = 0 ; $x < 4; $x++)
                                            {
                                                $counterr++; 
                                                echo'
                                                    <div class="col-md-6">
                                                        <p>First Name    : '.$fname[$x].' </p>
                                                        <p>Last Name     : '.$lname[$x].'</p>
                                                        <p>Phone Number  : '.$phone[$x].'</p>
                                                        <p>Street Address: '.$address[$x].'</p>
                                                        <p>Unit No       : '.$unit[$x].'</p>
                                                        <p>Country       : '.$country[$x].'</p>
                                                        <p>City          : '.$city[$x].'</p>
                                                        <p>State         : '.$state[$x].'</p>
                                                        <p>Postcode      : '.$pcode[$x].'</p>
                                                        <button type="button" class="btn btn-gray" onclick="return openmodal(' . $counterr . ')" style="margin-bottom: 20px;">
                                                            Edit
                                                        </button>
                                                    </div>
                                                '; 
                                            }  
                                        ?>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
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

    <?php
        $counter = 0;
        for($x = 0 ; $x < 4; $x++)
        {
            $counter++;
            echo'
            <div class="modal" role="dialog" id="addaddresss' . $counter . '" style="background-color:rgba(0,0,0,0.50);">
                <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="modal-header">
                    <h3 class="h3 text-center" style="margin-top:20px; ">Address</h3>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="post">
                        
                            <div class="row">
                                <div class="col-md-6 form-group required">
                                    <label for="input-fname" class="control-label">First Name</label><br>
                                    <input type="text" placeholder="First name" name="fname' . $counter . '" class="simple-input" value="'. $fname[$x].'" id="input-fname' . $counter . '" required />
                                    <span class="invalid-feedback d-block"style="color: red;" id="fname_err'.$counter.'"><?php echo $fname_err; ?></span>
                                </div>

                                <div class="col-md-6 form-group required">
                                    <label for="input-lname" class="control-label">Last Name</label><br>
                                    <input type="text" placeholder="Last name" name="lname' . $counter . '" class="simple-input" value="'.$lname[$x].'" id="input-lname' . $counter . '"  required/>
                                    <span class="invalid-feedback d-block"style="color: red;" id="lname_err'.$counter.'"><?php echo $lname_err; ?></span>
                                </div>
                            </div>
                            
                            
                            <div class="form-group required">
                                <label for="input-phone" class="control-label">Phone Number</label><br>
                                <input type="text" placeholder="60123456789" name="phone' . $counter . '" class="simple-input" value="'.$phone[$x].'" id="input-phone' . $counter . '" required/>
                                <span class="invalid-feedback d-block" style="color: red;" id="phone_err'.$counter.'"><?php echo $phone_err; ?></span>
                            </div>

                            <div class="form-group required">
                                <label for="input-cfmpassword" class="control-label">Street Address</label><br>
                                <input type="text" placeholder="No,123, Melaka" name="address' . $counter . '" class="simple-input" value="'.$address[$x].'" id="input-address' . $counter . '"  required/>
                                <span class="invalid-feedback d-block"style="color: red;" id="address_err'.$counter.'"><?php echo $address_err; ?></span>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group required">
                                    <label for="input-cfmpassword" class="control-label">Unit No</label><br>
                                    <input type="number" placeholder="" name="unit' . $counter . '" class="simple-input" value="'.$unit[$x].'" id="input-unit' . $counter . '"  required/>
                                    <span class="invalid-feedback d-block"id="unit_err'.$counter.'" ><?php echo $unit_err; ?></span>
                                </div>

                                <div class="col-md-6 form-group required">
                                    <label for="input-country" class="control-label">City</label><br>
                                    <input type="text" placeholder="Melaka Tengah" name="city' . $counter . '' . $counter . '" class="simple-input" value="'.$city[$x].'" id="input-city' . $counter . '"  required/>
                                    <span class="invalid-feedback d-block"style="color: red;" id="city_err'.$counter.'"><?php echo $city_err; ?></span>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 form-group required">
                                    <label for="input-country" class="control-label">Country</label><br>
                                    <input type="text" placeholder="Malaysia" name="country' . $counter . '" class="simple-input" value="'.$country[$x].'" id="input-country' . $counter . '" required />
                                    <span class="invalid-feedback d-block" style="color: red;" id="country_err'.$counter.'"><?php echo $country_err; ?></span>
                                </div>

                                <div class="col-md-6 form-group required">
                                    <label for="input-country" class="control-label">State</label><br>
                                    <input type="text" placeholder="Malacca" name="state' . $counter . '" class="simple-input" value="'.$state[$x].'" id="input-state' . $counter . '" required />
                                    <span class="invalid-feedback d-block"style="color: red;" id="state_err'.$counter.'"><?php echo $state_err; ?></span>
                                </div>
                            </div>
                            

                            <div class="form-group required">
                                <label for="input-pcode" class="control-label">Postcode</label><br>
                                <input type="text" placeholder="" name="pcode' . $counter . '" class="simple-input" value="'.$pcode[$x].'" id="input-pcode' . $counter . '" required />
                                <span class="invalid-feedback d-block" style="color: red;" id="pcode_err'.$counter.'"><?php echo $pcode_err; ?></span>
                            </div>

                            <div class="col-sm-5">
                                <button class="button noshadow size-2 style-3" type="submit" name="addaddress" id="login_submit" class="login_submit" onclick="return updateAdd(' . $counter . ');"style="border: none; margin-top: 30px;">
                                    <span class="button-wrapper">
                                        <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                        <span class="text">submit</span>
                                    </span>
                                </button> 
                            </div>
                            
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button class="button noshadow size-2 style-3" type="button" name="login_submit" id="login_submit" class="login_submit" style="border:none" onclick="return closemodal('.$counter.')">
                            <span class="button-wrapper">
                                <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                <span class="text">Close</span>
                            </span>
                        </button>  
                    </div>
                </div>
                </div>
            </div>';
        }
    ?>

    <script>
        function updateAdd(counter)
        {
            var fname = document.getElementById("input-fname" + counter).value;
            var lname = document.getElementById("input-lname" + counter).value;
            var phone = document.getElementById("input-phone" + counter).value;
            var unit = document.getElementById("input-unit" + counter).value;
            var address = document.getElementById("input-address" + counter).value;
            var country = document.getElementById("input-country" + counter).value;
            var state = document.getElementById("input-state" + counter).value;
            var pcode = document.getElementById("input-pcode" + counter).value;
            var city = document.getElementById("input-city" + counter).value;
            document.getElementById("fname_err" + counter).innerHTML = "";
            document.getElementById("lname_err" + counter).innerHTML = "";
            document.getElementById("phone_err" + counter).innerHTML = "";
            document.getElementById("unit_err" + counter).innerHTML = "";
            document.getElementById("address_err" + counter).innerHTML = "";
            document.getElementById("country_err" + counter).innerHTML = "";
            document.getElementById("state_err" + counter).innerHTML = "";
            document.getElementById("pcode_err" + counter).innerHTML = "";
            document.getElementById("city_err" + counter).innerHTML = "";

            var pass = true;

            if (fname == "") 
            {
                document.getElementById("fname_err" + counter).innerHTML = "First Name is required";
                pass = false;
            }

            if (lname == "") 
            {
                document.getElementById("lname_err" + counter).innerHTML = "Last Name is required";
                pass = false;
            }

            if (phone == "") 
            {
                document.getElementById("phone_err" + counter).innerHTML = "Phone is required";
                pass = false;
            }

            if (unit == "") 
            {
                document.getElementById("unit_err" + counter).innerHTML = "Unit is required";
                pass = false;
            }

            if (address == "") 
            {
                document.getElementById("address_err" + counter).innerHTML = "Address is required";
                pass = false;
            }

            if (country == "") 
            {
                document.getElementById("country_err" + counter).innerHTML = "Country is required";
                pass = false;
            }

            if (state == "") 
            {
                document.getElementById("state_err" + counter).innerHTML = "State is required";
                pass = false;
            }

            if (pcode == "") 
            {
                document.getElementById("pcode_err" + counter).innerHTML = "Postcode is required";
                pass = false;
            }

            if (city == "") 
            {
                document.getElementById("city_err" + counter).innerHTML = "City is required";
                pass = false;
            }

            if (pass) {
                $.ajax({
                    type: "post",
                    url: "address.php",
                    data: {
                        'addaddress': true,
                        'no': counter,
                        'input-fname': fname,
                        'input-lname': lname,
                        'input-phone': phone,
                        'input-unit': unit,
                        'input-address': address,
                        'input-country': country,
                        'input-state': state,
                        'input-pcode': pcode,
                        'input-city': city
                    },
                    cache: false,
                    success: function(html) {
                        alert('Address updated');
                        location.reload();
                    }
                });
            }
            return false;

        }

        function closemodal(counter)
        {
            $('#addaddresss'+counter).fadeOut();
            return false;
        }
        function openmodal(counter)
        {
            $('#addaddresss'+counter).fadeIn();
            return false;
        }
        if(document.getElementById("form").innerHTML == "false") {
            $('#addaddresss').fadeIn();
        }
    </script>
    
</body>


<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>
