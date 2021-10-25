<?php
include_once '../admin/include/adminheader.php';	
?>
<?php
$sql = "SELECT * FROM orders;";
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
$orders = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($orders);
?>
<?php
if(isset($_GET['order']))
{
	$sql = "SELECT * FROM orders, ordersdetail where orders_id = ? AND ordersdetail_ordersId = ?;";
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

	mysqli_stmt_bind_param($stmt, "ss", $_GET['order'], $_GET['order']);
	mysqli_stmt_execute($stmt);

	$order = mysqli_stmt_get_result($stmt);
	$orderDetails = mysqli_fetch_assoc($order);
	
	$sql = "
	SELECT DISTINCT customer_id, customer_name
	FROM customer 
	LEFT JOIN orders ON orders.orders_customerId = customer.customer_id
	WHERE orders.orders_customerId IS NOT NULL";
	
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

	$customers = mysqli_stmt_get_result($stmt);
	$customersRow = mysqli_fetch_assoc($customers);
	
	$sql = "
	SELECT DISTINCT *, product_name
	FROM ordersdetail 
	LEFT JOIN product ON product.product_id = ordersdetail.ordersDetail_productId
    WHERE ordersDetail_ordersId = ?";
	
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
	mysqli_stmt_bind_param($stmt, "s", $_GET['order']);
	mysqli_stmt_execute($stmt);
	
	$orderProducts = mysqli_stmt_get_result($stmt);
?>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order No. <span class="h4 font-weight-bold text-primary"><?=$_GET['order']?></span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item"><a href="./orderlist.php">Order List</a></li>
			  <li class="breadcrumb-item active" aria-current="page"><?=$_GET['order']?></li>
            </ol>
          </div>
		  <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order Details</h6>
				  <h6 class="m-0 font-weight-bold text-secondary">This order was made on: <span class="text-primary"><?=$orderDetails['orders_creationDate']?></span></h6>
                </div>
                <div class="card-body">   
				<form>
					<div class="form-group">
						<label for="customer_Id">Customer ID</label>
						<select class="select2-single form-control" name="customer_Id" id="customer_Id">
							<option value="">Select Customer ID</option>
							<?php foreach($customers as $customer):?>
							<option value="<?=$customer['customer_id']?>" <?php if($orderDetails['orders_customerId'] == $customer['customer_id']){echo"selected";}?> ><?=$customer['customer_id']?> - <?=$customer['customer_name']?></option>
							<?php endforeach;?>
						</select>
					</div>
					<div class="form-group">
						<label for="customer_email">Customer email</label>
						<input readonly type="email" class="form-control" id="customer_email" value="<?=$orderDetails['orders_email']?>" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="customer_address">Customer address</label>
						<textarea type="text" class="form-control" id="customer_address" placeholder="Enter customer address"><?=$orderDetails['orders_shippingAddress']?></textarea>
					</div>
					<div class="form-group">
						<label for="orders_comment">Order comment</label>
						<textarea type="text" class="form-control" id="orders_comment" placeholder="Enter order note"><?=$orderDetails['orders_comment']?></textarea>
					</div>
					<div class="form-group">
						<label for="orders_status">Status</label>
						<input readonly type="text" class="form-control" id="orders_status" value="<?=$orderDetails['orders_status']?>" placeholder="Enter status">
						<p></p>
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<div>
						<button type="button" class="btn btn-secondary mb-1">Pending</button>
						<button type="button" class="btn btn-primary mb-1">Processing</button>
						<button type="button" class="btn btn-warning mb-1">Shipping</button>
						<button type="button" class="btn btn-success mb-1">Delivered</button>
						</div>
						<div>
						<button type="button" class="btn btn-danger mb-1">Cancelled</button>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label for="orders_delivery">Delivery method</label>
						<input readonly type="text" class="form-control" id="orders_delivery" value="<?=$orderDetails['orders_deliveryMethod']?>" placeholder="Enter delivery method">
						<p></p>
						<button type="button" class="btn btn-danger mb-1">POS Laju</button>
						<button type="button" class="btn btn-primary mb-1">FedEX</button>
						<button type="button" class="btn btn-warning mb-1">DHL</button>
					</div>
					<div class="form-group">
						<label for="orders_payMethod">Payment Method</label>
						<input readonly type="email" class="form-control" id="orders_payMethod" value="<?=$orderDetails['orders_payMethod']?>" placeholder="Enter payment method">
					</div>
					
					<div class="form-group">
					<table class="table table-bordered table-striped table-hover table-condensed">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Quantity</th>
							</tr>
						</thead>
      
						<tbody>
							<?php foreach($orderProducts as $orderProduct):?>
							<?php endforeach;?>
							<tr>
								<td><?=$orderProduct['ordersDetail_productId']?></td>
								<td><?=$orderProduct['product_name']?></td>
								<td>
								<div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected">
								<input class="form-control" type="text" id="touchSpin3" value="<?=$orderProduct['ordersDetail_quantity']?>">
								<span class="input-group-btn-vertical">
									<button class="btn btn-primary bootstrap-touchspin-up" type="button">+</button>
									<button class="btn btn-primary bootstrap-touchspin-down" type="button">-</button>
								</span>
								</div>
								</td>
							</tr>
						</tbody>
					</table>
					</div>
				</form>
				</div>
		  </div>
</div>
<?php
}

else
{
?>
<div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order List</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item">Order</li>
              <li class="breadcrumb-item active" aria-current="page">Order List</li>
            </ol>
          </div>
		  


          <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php if(empty($row)): ?>
					<tr>
						<td colspan="4"><div style="text-align:center;">Order list is empty!<br/>No orders have been created yet.</div></td>
					</tr>
					<?php else: ?>
					<?php foreach($orders as $order):?>
					<tr>
                        <td><a href="#"><?=$order['orders_id']?></a></td>
                        <td><?=$order['orders_customerId']?></td>
                        <td><span class="badge <?php if($order['orders_status'] == "Pending"){echo"badge-secondary";}else{echo"badge-success";}?>"><?=$order['orders_status']?></span></td>
                        <td><a href="orderlist.php?order=<?=$order['orders_id']?>" class="btn btn-sm btn-primary">Detail</a></td>
                    </tr>
					<!--
                      <tr>
                        <td><a href="#">RA0449</a></td>
                        <td>Udin Wayang</td>
                        <td>Nasi Padang</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA5324</a></td>
                        <td>Jaenab Bajigur</td>
                        <td>Gundam 90' Edition</td>
                        <td><span class="badge badge-warning">Shipping</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA8568</a></td>
                        <td>Rivat Mahesa</td>
                        <td>Oblong T-Shirt</td>
                        <td><span class="badge badge-danger">Pending</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA1453</a></td>
                        <td>Indri Junanda</td>
                        <td>Hat Rounded</td>
                        <td><span class="badge badge-info">Processing</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
                      <tr>
                        <td><a href="#">RA1998</a></td>
                        <td>Udin Cilok</td>
                        <td>Baby Powder</td>
                        <td><span class="badge badge-success">Delivered</span></td>
                        <td><a href="#" class="btn btn-sm btn-primary">Detail</a></td>
                      </tr>
					  -->
					<?php endforeach;?>
					<?php endif; ?>
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
          </div>
          <!--Row-->
		  
		  
</div>
<?php
}?>
<?php
include_once 'include/adminfooter.php';	
?>