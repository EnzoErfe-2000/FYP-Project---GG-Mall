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
            border-radius: 0px;
            border-style: double;
            width: 1430px;
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
                                <h4 class="accounttitle">Dashboard</h4>
                                    <div class="welcome">
                                    <p>Hello,  
                                        <?php
                                            echo "(If not ". $_SESSION["customer_name"] . " please <a href='/fyp-project/include/logout-inc.php'><b>Logout</b></a> )";
                                        ?>
                                    </p>
                                        <p class="m-t-25"><br>From your account dashboard. you can easily check &amp; view your
                                            recent orders, manage your shipping and billing <br>addresses and edit your password and
                                            account details.</p>
                                    </div>
                            </div>
                            <div class="col-xl-3 col-md-4">
                                <div class="dashboardmenu"><span style="font-size:18px; text-decoration:underline; font-weight:bold;" >Account Selection</span>
                                    <ul>
                                        <li>
                                            <a href="profile.php">
                                            > Dashboard</a>
                                        </li>
                                        <li>
                                            > Personal Details
                                        </li>
                                        <li>
                                            > Address
                                        </li>
                                        <li>
                                            > Password Changes
                                        </li>
                                        <li>
                                            > Logout
                                        </li>
                                    </ul>
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
