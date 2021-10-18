<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';

if(isset($_SESSION['customer_id']))
{
	$sql = "SELECT * FROM orders WHERE orders_customerId = ?";
		
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
		mysqli_close($conn);
	}
	else
	{
		//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
	}
	mysqli_stmt_bind_param($stmt, "s", $_SESSION["customer_id"]);
	mysqli_stmt_execute($stmt);
	
	$orders = mysqli_stmt_get_result($stmt);
	//$num = count($orders);
	$row = mysqli_fetch_assoc($orders);
	//$num1 = count($row);
	//echo "<script>alert($num)</script>";
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
										<?php if(empty($row)): ?>
										<tr>
											<td colspan="5" class="simple-article size-5 grey uppercase col-xs-b5"><div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>order list is empty!<br/>you have not created any orders yet<div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div></td>
										</tr>
										<?php else: ?>
										<?php foreach($orders as $order):?>
                                            <tr>
                                                <td><form id="order_<?=$order['orders_id']?>" action="user_orderDetails.php" method="get"><input readonly name="orderID" value="<?=$order['orders_id']?>" style="text-align:center;"></form></td>
                                                <td style="text-align:center;"><?php echo date_format(date_create($order['orders_creationDate']), 'd-M-Y');?></td>
                                                <td><?=$order['orders_status']?></td>
                                                <td>RM <?=number_format($order['orders_total'],2,'.',',')?></td>
                                                <td>
													<button form="order_<?=$order['orders_id']?>" type="submit" class=" button size-1 style-2 noshadow">
														<span class="button-wrapper">
															<span class="icon">
																<img src="img/icon-4.png" alt="">
															</span>
															<span class="text">View</span>
														</span>
													</button>
												</td>
                                            </tr>
										<?php endforeach;?>
										<?php endif; ?>
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
			<div class="empty-space col-xs-b50"></div>
        </div>
    
</body>


<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>
