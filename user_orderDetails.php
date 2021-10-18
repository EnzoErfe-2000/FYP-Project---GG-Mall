<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';

if(isset($_GET['orderID']))
{	
	$id = $_GET['orderID'];
	$sql = "SELECT orders_customerId,orders_total FROM orders WHERE orders_id = ? AND orders_customerId = ?";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
		mysqli_close($conn);
	}
	else
	{
		//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
	}
	mysqli_stmt_bind_param($stmt, "ss", $id, $_SESSION['customer_id']);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	$resultCol = mysqli_fetch_assoc($result);
	$num2 = count($resultCol);
	if($resultCol > 0)
	{
		//echo "<script>alert($id)</script>";
	
		$sql = "SELECT 
		ordersDetail_ordersId,ordersDetail_productId,ordersDetail_quantity,ordersDetail_subtotal,product_id, product_img, product_name, product_listedPrice  
		FROM ordersdetail, product WHERE ordersDetail_ordersId = ? AND product_id = ordersDetail_productId";
		
		$stmt = mysqli_stmt_init($conn);
	
		if(!mysqli_stmt_prepare($stmt, $sql)){
			//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
			mysqli_close($conn);
		}
		else
		{
			//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
		}
		mysqli_stmt_bind_param($stmt, "s", $id);
		mysqli_stmt_execute($stmt);
		
		$ordersDetail = mysqli_stmt_get_result($stmt);
		$array = array($ordersDetail);
		$num = count($array);
		$row = mysqli_fetch_assoc($ordersDetail);
		$num1 = count($row);
		//echo "<script>alert($num)</script>";
		
	}
	else
	{
		echo "<script> location.assign('error_404.php');</script>";
	}
}
else
{
	echo "<script> location.assign('error_404.php');</script>";
}
?>
<div class="header-empty-space"></div>
	<div class="container">
		<div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
        <div class="row">
			<div class="text-center">
				<div class="h2 col-xs-b5">Your Order</div>
				<div class="title-underline center"><span></span></div>
				<div class="simple-article size-3 grey uppercase col-xs-b5">Order Id: <?=$id?></div>
			</div>
		</div>
		<div class="empty-space col-xs-b15 col-sm-b50 col-md-b20"></div>
		<div class="row">
			<div class="col-sm-3">
			<div class="h4">Customer ID..</div>
			<div class="h4">Customer Email..</div>
			<div class="h4">Shipping Address..</div>
			<div class="h4">Status..</div>
			<div class="h4">Delivery..</div>
			<div class="h4">PayMethod..</div>
			<div class="h4">Comment..</div>
			</div>
			<div class="col-sm-9">
			<div class="container">
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th style="width: 150px; text-align:center;">product id</th>
                            <th style="width: 95px; text-align:center;">Image</th>
                            <th style="">name</th>
							<th style="width: 150px;">price/unit</th>
                            <th style="width: 150px;">quantity</th>
                            <th style="width: 150px;">subtotal</th>
                        </tr>
                    </thead>
					<tbody>
					<?php foreach($ordersDetail as $ordersDetails):?>
						<tr>
							<td><input readonly name="orderID" value="<?=$ordersDetails['ordersDetail_productId']?>" style="text-align:center;"></td>
                            <td style="text-align:middle;">
								<a class="cart-entry-thumbnail" href="product.php?product=<?=$ordersDetails['ordersDetail_productId']?>">
									<img src="/fyp-project/product_img/<?=$ordersDetails['product_img']?>" alt="">
								</a>
							</td>
                            <td style="text-align:left;">
								<h6 class="h6">
									<a href="product.php?product=<?=$ordersDetails['ordersDetail_productId']?>">
										<?=$ordersDetails['product_name']?>
									</a>
								</h6>
							</td>
							<td><?=$ordersDetails['product_listedPrice']?></td>
							<td><?=$ordersDetails['ordersDetail_quantity']?></td>
                            <td>RM <?=number_format($ordersDetails['ordersDetail_subtotal'],2,'.',',')?></td>
                        </tr>
					<?php endforeach;?>
					</tbody>
                </table>
				<div class="empty-space col-xs-b35"></div>
				<div class="row">
					<div class="col-md-6 col-xs-b50 col-md-b0">
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<h4 class="h4" style="float:right">total</h4>
							</div>
							<div class="col-xs-6 col-xs-text-right">
								<div class="color" style="font-weight:bold;font-size:18px">RM <?=number_format($resultCol['orders_total'],2,".",",")?></div>
							</div>
						</div>
					</div>
				</div>
            </div>    
			</div>
		</div>
	</div>
	<div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>
