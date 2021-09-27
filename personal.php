<?php
include_once 'include/header.php';
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
                                        <form>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div id="personal-details">
                                                        <div class="form-group required">
                                                            <label for="input-firstname" class="control-label">First Name</label>
                                                            <input type="text" class="simple-input" id="input-firstname" placeholder="First Name" value="" name="firstname">
                                                        </div>
                                                        <div class="form-group required">
                                                            <label for="input-lastname" class="control-label">Last Name</label>
                                                            <input type="text" class="simple-input" id="input-lastname" placeholder="Last Name" value="" name="lastname">
                                                        </div>
                                                        <div class="form-group required">
                                                            <label for="input-email" class="control-label">E-Mail</label>
                                                            <input type="email" class="simple-input" id="input-email" placeholder="name@email.com" value="" name="email">
                                                        </div>
                                                        <div class="form-group required">
                                                            <label for="input-telephone" class="control-label">Telephone</label>
                                                            <input type="tel" class="simple-input" id="input-telephone" placeholder="012-3456789" value="" name="telephone">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="input-dob" class="control-label">Date of Birth</label>
                                                            <input type="text" class="simple-input" id="input-dob" placeholder="YYYY-MM-DD" value="" name="dob">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="input-dob" class="control-label">Address</label>
                                                            <input type="text" class="simple-input" id="input-address" placeholder="123, Taman 1, 75350 Melaka" value="" name="address">
                                                        </div>
                                                    </div>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm=6">
                                                    <button class="button noshadow size-2 style-3" type="submit" name="submit" id="submit" class="submit" style="border:none" onclick="validate">
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
