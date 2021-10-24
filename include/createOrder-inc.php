<?php
include_once 'session-db-func.php';
?>
<?php
//PREVENT RANDOM ACCESS BY GUEST

if (isset($_POST['firstName'])) {
	//$name = $_POST['firstName'];
	//echo "<script type='text/javascript'>alert('$name');</script>";
	
	// GET LASTEST ID FROM A TABLE
	$sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = ? AND TABLE_NAME = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
			//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
			mysqli_close($conn);
		}
		else
		{
			//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
		}
	$tableName = "orders";
	mysqli_stmt_bind_param($stmt, "ss", $dBName, $tableName);	
	mysqli_stmt_execute($stmt);
	$resultlastId = mysqli_stmt_get_result($stmt);
	$lastId = mysqli_fetch_assoc($resultlastId)['AUTO_INCREMENT'];
	echo "<script type='text/javascript'>alert('$lastId');</script>";
	//
	
	$custID = $_SESSION['customer_id'];
	echo "<script type='text/javascript'>alert('$custID');</script>";
	
	$custEmail = $_POST['email'];
	echo "<script type='text/javascript'>alert('$custEmail');</script>";
	
	$addressArr = array($_POST['unitAdr'], $_POST['streetAdr'],$_POST['towncityAdr'],$_POST['stateAdr'],$_POST['postzipAdr'],$_POST['countryAdr']);
	$streetAddress = implode(", ", $addressArr);
	//$streetAddress = $_POST['streetAdr'];
	echo "<script type='text/javascript'>alert('Address : $streetAddress');</script>";

	$note = $_POST['note'];
	echo "<script type='text/javascript'>alert('$note');</script>";

	$status = "Pending";
	echo "<script type='text/javascript'>alert('$status');</script>";

	$total = number_format($_SESSION['cartTotal'],2,'.','');
	echo "<script type='text/javascript'>alert('$total');</script>";
	
	$delivery = $_POST['delivery'];
	echo "<script type='text/javascript'>alert('Delivery : $delivery');</script>";
	
	//$test = $_POST['cardChoice'];
	//echo "<script type='text/javascript'>alert('Delivery : $test');</script>";
	
	//$payMethod = implode("_", array($_POST['payMethod'], $_POST['cardChoice']));
	$payMethod = $_POST['paymethod'];
	echo "<script type='text/javascript'>alert('Pay method : $payMethod');</script>";
	
	//CREATE ORDER
	$sql = "INSERT INTO orders (orders_id, orders_customerId, orders_email, orders_shippingAddress, orders_comment, orders_status, orders_total, orders_deliveryMethod, orders_payMethod) VALUES ('$lastId', '$custID', '$custEmail', '$streetAddress', '$note', '$status', '$total', '$delivery', '$payMethod')";
	$stmt = mysqli_stmt_init($conn);
	if (mysqli_query($conn, $sql)) 
    {
		echo "<script type='text/javascript'>alert('Order successfully created!');</script>";
	}
	else 
	{
		echo "
			<script>
				alert('Error: " . $sql . "\n" . mysqli_error($conn) . "');
			</script>";
    }
	//
	
	//CREATE ORDER DETAILS
	if (isset($_SESSION['cart'])) {
		$num = count($_SESSION['cart']);
		echo "<script type='text/javascript'>alert($num);</script>";
		
		$products_in_cart = array_keys($_SESSION['cart']);
		
		//echo "<script type='text/javascript'>alert('".implode(',', array_keys($products_in_cart))."');</script>";
		for($i =0; $i < $num; $i++)
		{
			$currentProdId = $products_in_cart[$i];
			$currentProdQuantity = $_SESSION['cart'][$currentProdId];
			//echo "Current prod id : $currentProdId <br>";
			//echo "Current prod quantity : $currentProdQuantity <br>";
			
			$sql = "SELECT product_listedPrice FROM product WHERE product_id = $currentProdId";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				//echo "<script type='text/javascript'>alert('stmt failed!');</script>";
				mysqli_close($conn);
			}
			else
			{
				//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
			}
			
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$resultArray = mysqli_fetch_assoc($result);
			$resultListedPrice = $resultArray['product_listedPrice'];
			//echo "Current prod subtotal : $resultListedPrice <br>";
			
			$currentProdSubTotal = $currentProdQuantity * $resultListedPrice;
			
			$sql = "INSERT INTO ordersDetail (ordersDetail_ordersId, ordersDetail_productId, ordersDetail_quantity, ordersDetail_subtotal) VALUES ('$lastId', '$currentProdId', '$currentProdQuantity', '$currentProdSubTotal')";
			$stmt = mysqli_stmt_init($conn);
			if (mysqli_query($conn, $sql)) 
			{
				unset($_SESSION['cart']);
				unset($_SESSION['cartTotal']);
				unset($_SESSION['checkout']);
				echo "<script type='text/javascript'>alert('Order successfully created!');</script>";
			}
			else 
			{
				echo "
					<script>
						alert('Error: " . $sql . "\n" . mysqli_error($conn) . "');
					</script>";
			}
			echo "<script> location.assign('/fyp-project/successful_checkout.php');</script>";
			
		}
	}
	
}
else
{
	echo "<script> location.assign('cart.php');</script>";
}


?>