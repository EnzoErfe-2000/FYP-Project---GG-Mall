<?php
include_once 'include/session-db-func.php';
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
                                <h4 class="accounttitle h4 col-xs-b25">Check Orders</h4>
                                <div class="container">
                                    <table class="cart-table">
                                        <thead>
                                            <tr>
                                                <th style="width: 150px;">order id</th>
                                                <th style="width: 150px; text-align:center;">date created</th>
                                                <th style="width: 150px;">status</th>
                                                <th style="width: 150px;">total</th>
                                                <th style="width: 150px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td style="text-align:center;">Aug 22, 2018</td>
                                                <td>Pending</td>
                                                <td>$3000</td>
                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td style="text-align:center;">July 22, 2018</td>
                                                <td>Approved</td>
                                                <td>$200</td>
                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td style="text-align:center;">June 12, 2017</td>
                                                <td>On Hold</td>
                                                <td>$990</td>
                                                <td><a href="cart.html" class="check-btn sqr-btn ">View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
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
