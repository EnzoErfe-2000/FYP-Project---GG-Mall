<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';
require_once 'include/dbh-inc.php';

$unit = $street = $country = $state = $postcode = "";

if(isset($_POST['submittt']))
{
    $unit = $_POST['unit'];
    $street = $_POST['street'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $postcode = $_POST['postcode'];
    $sql = "
        UPDATE address SET 
        unit_no = '".$_POST["unit"]."', 
        street_address = '". $_POST["street"]."', 
        country = '".$_POST["country"]."', 
        state = '".$_POST["state"]."',
        postcode = '".$_POST["postcode"]."'
        WHERE customer_id = ". $_SESSION['customer_id'];

    if(mysqli_query($conn, $sql))
    {
        echo "
        <script> 
            alert('Updated Successfully');
            location.assign('/fyp-project/address.php');
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
                                <h4 class="accounttitle">Address</h4>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-xs-b50 col-md-b0">
                                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);  ?>" >  
                                            <?php
                                                $sql_get_info = "SELECT * FROM address where customer_id =  ".$_SESSION['customer_id'];
                                                $result = mysqli_query($conn, $sql_get_info);
                                                    
                                                while($row=mysqli_fetch_assoc($result)) 
                                                {
                                                    $unit = $row['unit_no'];
                                                    $street = $row['street_address'];
                                                    $country = $row['country'];
                                                    $state = $row['state'];
                                                    $postcode = $row['postcode'];
                                                }
                                            ?>
                                                <div class="form-group" style="margin-left:15px;">
                                                    <label for="input-unit" class="control-label">Unit No.</label>
                                                    <input class="simple-input" name="unit" type="text" placeholder="Unit No." value="<?php echo $unit?>" />
                                                    <div class="empty-space col-xs-b20"></div>
                                                </div>
                                                <div class="form-group" style="margin-left:15px;">
                                                    <label for="input-street" class="control-label">Street Address</label>
                                                    <input class="simple-input" name="street" type="text" placeholder="Street address" value="<?php echo $street?>" />
                                                    <div class="empty-space col-xs-b20"></div>
                                                </div>  
                                                <div class="form-group" style="margin-left:15px;">
                                                    <label for="input-country" class="control-label">Country</label>
                                                    <input class="simple-input" name="country" type="text" placeholder="Country" value="<?php echo $country?>" />
                                                    <div class="empty-space col-xs-b20"></div>
                                                </div>
                                                <div class="form-group" style="margin-left:15px;">
                                                    <label for="input-state" class="control-label">State</label>
                                                    <input class="simple-input" name="state" type="text" placeholder="State" value="<?php echo $state?>" />
                                                    <div class="empty-space col-xs-b20"></div>
                                                </div>
                                                <div class="form-group" style="margin-left:15px;">
                                                    <label for="input-postcode" class="control-label">Postcode</label>
                                                    <input class="simple-input" name="postcode" type="text" placeholder="Postcode" value="<?php echo $postcode?>" />
                                                    <div class="empty-space col-xs-b20"></div>
                                                </div>
                                                <div class="row" style="margin-left:10px;">
                                                    <div class="col-sm=6">
                                                        <button class="button noshadow size-2 style-3" type="submit" name="submittt" id="submit" class="submit" style="border:none" >
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
