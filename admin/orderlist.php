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
	SELECT DISTINCT customer_id, customer_name , customer_email_address
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
<?php
if(isset($_POST['updateSubmit']))
{
	echo "<script type='text/javascript'>alert('huhuhu');</script>";
	
}
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
				<form action="orderlist.php?order=<?=$_GET['order']?>" method="post">
					<div class="form-group">
						<label for="customer_Id">Customer ID & Name</label>
						<input readonly type="text" class="form-control" id="customer_id_email" value="<?=$orderDetails['orders_customerId']?> - <?php foreach($customers as $customer){if($orderDetails['orders_customerId'] == $customer['customer_id']){echo $customer['customer_name'];}}?>" placeholder="Enter email">
						<!--<select required class="select2-single form-control" name="customer_Id" id="customer_Id">
							<option value="">Select Customer ID</option>
							//<php //foreach($customers as $customer):?>
							<option value="<=//$customer['customer_id']?>" <php //if($orderDetails['orders_customerId'] == $customer['customer_id']){echo"selected";}?> ><=//$customer['customer_id']?> - <=//$customer['customer_name']?></option>
							<php //endforeach;?>
						</select>
						-->
					</div>
					<div class="form-group">
						<label for="customer_email">Customer email</label>
						<input readonly type="email" class="form-control" id="customer_email" value="<?=$orderDetails['orders_email']?>" placeholder="Enter email">
					</div>
					<div class="form-group">
						<label for="customer_address">Customer address</label>
						<textarea type="text" class="form-control" name="customer_address" id="customer_address" placeholder="Enter customer address"><?=$orderDetails['orders_shippingAddress']?></textarea>
					</div>
					<div class="form-group">
						<label for="orders_comment">Order comment</label>
						<textarea type="text" class="form-control" name="orders_comment" id="orders_comment" placeholder="Enter order note"><?=$orderDetails['orders_comment']?></textarea>
					</div>
					<div class="form-group">
						<label for="orders_status">Status</label>
						<input readonly type="text" class="form-control" name="orders_status" id="orders_status" value="<?=$orderDetails['orders_status']?>" placeholder="Enter status">
						<p></p>
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<div>
						<button type="button" class="btn btn-secondary mb-1" onclick="updateStatus('Pending')">Pending</button>
						<button type="button" class="btn btn-primary mb-1" onclick="updateStatus('Processing')">Processing</button>
						<button type="button" class="btn btn-warning mb-1" onclick="updateStatus('Shipping')">Shipping</button>
						<button type="button" class="btn btn-success mb-1" onclick="updateStatus('Delivered')">Delivered</button>
						</div>
						<div>
						<button type="button" class="btn btn-danger mb-1" onclick="updateStatus('Cancelled')">Cancelled</button>
						</div>
						</div>
					</div>
					<div class="form-group">
						<label for="orders_delivery">Delivery method</label>
						<input readonly type="text" class="form-control" name="orders_delivery" id="orders_delivery" value="<?=$orderDetails['orders_deliveryMethod']?>" placeholder="Enter delivery method">
						<p></p>
						<button type="button" class="btn btn-danger mb-1" onclick="updateDelivery('POSLaju')">POS Laju</button>
						<button type="button" class="btn btn-primary mb-1" onclick="updateDelivery('FedEx')">FedEx</button>
						<button type="button" class="btn btn-warning mb-1" onclick="updateDelivery('DHL')">DHL</button>
					</div>
					<div class="form-group">
						<label for="orders_payMethod">Payment Method</label>
						<input readonly type="text" class="form-control" id="orders_payMethod" value="<?=$orderDetails['orders_payMethod']?>" placeholder="Enter payment method">
					</div>
					
					<div class="form-group">
					<label for="productDetailsTable">Product Details</label>
						
					<table class="table table-bordered table-flush table-hover table-condensed" id="productDetailsTable">
						<thead>
							<tr>
								<th>ID</th>
								<th style="width: 400px;">Name</th>
								<th>Price</th>
								<th style="width: 200px;">Quantity</th>
								<th>Subtotal</th>
							</tr>
						</thead>
      
						<tbody>
							<?php foreach($orderProducts as $orderProduct):?>
							<tr>
								<td><?=$orderProduct['ordersDetail_productId']?></td>
								<td><?=$orderProduct['product_name']?></td>
								<td>RM<span id="prodPrice"><?=$orderProduct['product_listedPrice']?></span></td>
								<td>
								<div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected">
								<input onkeyup="updateSubtotal(<?=$orderProduct['ordersDetail_productId']?>)" style="font-weight:bold;margin:0;" class="form-control quantityBox" type="number" id="quantityInput[<?=$orderProduct['ordersDetail_productId']?>]" min=1 value=<?=$orderProduct['ordersDetail_quantity']?>>
								<input hidden readonly class="thisProdID" value="<?=$orderProduct['ordersDetail_productId']?>">
								<button class="btn btn-primary bootstrap-touchspin-up sub" type="button">-</button>
								<button class="btn btn-primary bootstrap-touchspin-down add" type="button">+</button>
								</div>
								</td>
								<td>RM <span class="subTotal" name="prodSubtotal" id="subTotal[<?=$orderProduct['ordersDetail_productId']?>]"><?=$orderProduct['ordersDetail_subtotal']?></span></td>
							</tr>
							<?php endforeach;?>
							<tr>
								<td colspan="3"></td>
								<td>Total</td>
								<td id="orders_total">RM <?=$orderDetails['orders_total']?></td>
							</tr>
						</tbody>
					</table>
					</div>
					<div class="form-group">
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<div></div>
							<div>
								<button type="submit" name="updateSubmit" class="btn btn-primary mb-1">Save Changes</button>
							</div>
						</div>
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

<script>
var newStyle = document.createElement("style");
newStyle.innerHTML = 
    "input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {"+
        "-webkit-appearance: none;"+
		"margin: 0;"+
    "}";
document.getElementsByTagName("head")[0].appendChild(newStyle);

$(document).on('click', '.sub', function(){
    	//Decrement inputs
    	var newValue = parseInt($(this).parent().find('.quantityBox').val());
    	$(this).parent().find('.quantityBox').val(newValue>1?(newValue-1):newValue);
		var prodID = $(this).parent().find('.thisProdID').val();
		updateSubtotal(prodID);
	});
	
$(document).on('click', '.add', function(){
    	//Increment inputs
    	var newValue = parseInt($(this).parent().find('.quantityBox').val());
		$(this).parent().find('.quantityBox').val((newValue+1));
		var prodID = $(this).parent().find('.thisProdID').val();
		updateSubtotal(prodID);
	});
	
	
function updateSubtotal(n){
	const Quantity = parseInt(document.getElementById("quantityInput["+n+"]").value);
    //alert(Quantity);
	const Price = parseFloat(document.getElementById("prodPrice").innerHTML);
	//alert(Price);
	if(Quantity < 1 || isNaN(Quantity))
	{	Quantity = 1;
	}const newSubTotal = (Price*Quantity).toFixed(2);
	document.getElementById("subTotal["+n+"]").innerHTML = newSubTotal;
	updateTotal();
}
function updateStatus(n){
	document.getElementById("orders_status").value = n;
}
function updateDelivery(n){
	document.getElementById("orders_delivery").value = n;
}
function updateTotal(){
	const all = document.getElementsByName('prodSubtotal');
	var total = parseFloat(0);
	for (var i = 0; i < all.length; i++) {
		total += parseFloat(all[i].innerHTML);
	}
	document.getElementById("orders_total").innerHTML = (total).toFixed(2);
}
/*
$(document).on('keyup', '.quantityBox', function() {
	const Quantity = parseInt($(this).parent().find('.quantityBox').val());
    const Price = parseFloat(document.getElementById("prodPrice").innerHTML);
	if(Quantity < 1 || isNaN(Quantity))
		Quantity = 1;
	alert(Price*Quantity);
	
	//this.parentNode.parentNode.find('.subTotal').val(Quantity * Price);
});
*/
</script>