<?php
include_once 'include/header.php';	
?>
<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['product_quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['product_quantity'])) {
    echo '<script type="text/javascript">alert("Successfully posted!");</script>';
	// Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['product_quantity'];
    echo "<script type='text/javascript'>alert('ProductID = $product_id');</script>";
	echo "<script type='text/javascript'>alert('ProductQuantity = $quantity');</script>";
	
	// Prepare the SQL statement, we basically are checking if the product exists in our databaser
    //$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    //$stmt->execute([$_POST['product_id']]);
	
	$sql = "SELECT * FROM product WHERE product_id = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt, $sql)){
		//header("location: cart.php?error=stmtfailed");
		echo "<script type='text/javascript'>alert('stmt failed!');</script>";
		//exit();
		mysqli_close($conn);
	}
	else
	{
		echo "<script type='text/javascript'>alert('stmt successful!');</script>";
	}
	
	mysqli_stmt_bind_param($stmt, "s", $product_id);
	mysqli_stmt_execute($stmt);
	
    // Fetch the product from the database and return the result as an Array
    //$product = $stmt->fetch(PDO::FETCH_ASSOC);
    
	$productData = mysqli_stmt_get_result($stmt);
	
	$product = mysqli_fetch_assoc($productData);
	
	// Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        echo "<script type='text/javascript'>alert('product found');</script>";
		if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
			echo "<script type='text/javascript'>alert('There are products in cart');</script>";
            //if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                //$_SESSION['cart'][$product_id] += $quantity;
            //} else {
                // Product is not in cart so add it
                //$_SESSION['cart'][$product_id] = $quantity;
            //}
			$item = array_keys($_SESSION['cart']);
			echo "<script type='text/javascript'>alert('Array keys: $item');</script>";

        } else {
            // There are no products in cart, this will add the first product to cart
            echo "<script type='text/javascript'>alert('There are NO products in cart');</script>";
			$_SESSION['cart'] = array($product_id => $quantity);
        }
    }
	else
		echo "<script type='text/javascript'>alert('product NOT found');</script>";
    // Prevent form resubmission...
	
	mysqli_stmt_close($stmt);
    //header('location: cart.php');
    //exit;
	//mysqli_close($conn);
}

// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
// If there are products in cart
if ($products_in_cart) {
	echo "<script type='text/javascript'>alert('Proceeding to fill up cart...');</script>";
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    
	//$stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    
	//$sql = "SELECT * FROM product WHERE product_id IN (10004);";
	$sql = "SELECT * FROM product WHERE product_id IN (".implode(',', array_keys($products_in_cart)).");";
	echo "<script type='text/javascript'>alert('$sql');</script>";
	
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt, $sql)){
		echo "<script type='text/javascript'>alert('stmt failed!');</script>";
		mysqli_close($conn);
	}
	else
	{
		echo "<script type='text/javascript'>alert('stmt successful!');</script>";
	}
	
	// We only need the array keys, not the values, the keys are the id's of the products
    //$stmt->execute(array_keys($products_in_cart));
    
	//mysqli_stmt_bind_param($stmt, "s", $array_to_question_marks);
	mysqli_stmt_execute($stmt);
	// Fetch the products from the database and return the result as an Array
    //$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
	$productData = mysqli_stmt_get_result($stmt);
	
	$products = mysqli_fetch_assoc($productData);
	// Calculate the subtotal
    //foreach ($products as $product) {
        //$subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    //}
	
	mysqli_close($conn);
}
?>        

        <div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="/fyp-project/index.php">home</a>
                <a href="/fyp-project/cart.php">shopping cart</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="text-center">
                <div class="h2 col-xs-b5">Shopping Cart</div>
				<div class="simple-article size-3 grey uppercase col-xs-b5">remember to check your products!</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th style="width: 95px;"></th>
                        <th>product name</th>
                        <th style="width: 150px;">price</th>
                        <th style="width: 260px;">quantity</th>
                        <th style="width: 70px;">color</th>
                        <th style="width: 150px;">total</th>
                        <th style="width: 70px;"></th>
                    </tr>
                </thead>
                <tbody>
					<?php if (empty($products)): ?>
					<tr>
						<td colspan="7" class="simple-article size-5 grey uppercase col-xs-b5"><div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>You have no products added in your Shopping Cart<div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div></td>
					</tr>
				    <?php else: ?>
					<tr>
						<td colspan="7" class="simple-article size-5 grey uppercase col-xs-b5"><div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>You have some products added in your Shopping Cart<div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div></td>
					</tr>
					<!--
                    <tr>
                        <td data-title=" ">
                            <a class="cart-entry-thumbnail" href="#"><img src="img/product-1.png" alt=""></a>
                        </td>
                        <td data-title=" "><h6 class="h6"><a href="#">modern beat ht</a></h6></td>
                        <td data-title="Price: ">$155.00</td>
                        <td data-title="Quantity: ">
                            <div class="quantity-select">
                                <span class="minus"></span>
                                <span class="number">2</span>
                                <span class="plus"></span>
                            </div>
                        </td>
                        <td data-title="Color: "><div class="cart-color" style="background: #eee;"></div></td>
                        <td data-title="Total:">$310.00</td>
                        <td data-title="">
                            <div class="button-close"></div>
                        </td>
                    </tr>
                    <tr>
                        <td data-title=" ">
                            <a class="cart-entry-thumbnail" href="#"><img src="img/product-2.png" alt=""></a>
                        </td>
                        <td data-title=" "><h6 class="h6"><a href="#">sport beat atx</a></h6></td>
                        <td data-title="Price: ">$155.00</td>
                        <td data-title="Quantity: ">
                            <div class="quantity-select">
                                <span class="minus"></span>
                                <span class="number">1</span>
                                <span class="plus"></span>
                            </div>
                        </td>
                        <td data-title="Color: "><div class="cart-color" style="background: #eee;"></div></td>
                        <td data-title="Total:">$310.00</td>
                        <td data-title="">
                            <div class="button-close"></div>
                        </td>
                    </tr>
                    <tr>
                        <td data-title=" ">
                            <a class="cart-entry-thumbnail" href="#"><img src="img/product-3.png" alt=""></a>
                        </td>
                        <td data-title=" "><h6 class="h6"><a href="#">hipster beat hr</a></h6></td>
                        <td data-title="Price: ">$155.00</td>
                        <td data-title="Quantity: ">
                            <div class="quantity-select">
                                <span class="minus"></span>
                                <span class="number">1</span>
                                <span class="plus"></span>
                            </div>
                        </td>
                        <td data-title="Color: "><div class="cart-color" style="background: #eee;"></div></td>
                        <td data-title="Total:">$310.00</td>
                        <td data-title=" ">
                            <div class="button-close"></div>
                        </td>
                    </tr>
					-->
					<?php endif; ?>
				</tbody>
            </table>
            <div class="empty-space col-xs-b35"></div>
            <div class="row">
                <div class="col-md-6 col-xs-b50 col-md-b0">
					<!--
                    <h4 class="h4 col-xs-b25">calculate shipping</h4>
                    <select class="SlectBox">
                        <option disabled="disabled" selected="selected">Choose country for shipping</option>
                        <option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
                    </select>
                    <div class="empty-space col-xs-b20"></div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="State / Country" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="" placeholder="Postcode / Zip" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
                    <div class="button size-2 style-2">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-1.png" alt=""></span>
                            <span class="text">update totals</span>
                        </span>
                        <input type="submit"/>
                    </div>
					-->
                </div>
                <div class="col-md-6">
                    <h4 class="h4">cart totals</h4>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                cart subtotal
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">$1195.00</div>
                            </div>
                        </div>
                    </div>
					<!--
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                shipping and handling
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">free shipping</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                order total
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">$1195.00</div>
                            </div>
                        </div>
                    </div>
					-->
                </div>
            </div>
            <div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="row">
                <div class="col-sm-6 col-md-5 col-xs-b10 col-sm-b0">
					<!--
                    <div class="single-line-form">
                        <input class="simple-input" type="text" value="" placeholder="Enter your coupon code" />
                        <div class="button size-2 style-3">
                            <span class="button-wrapper">
                                <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                <span class="text">submit</span>
                            </span>
                            <input type="submit" value="">
                        </div>
                    </div>
					-->
                </div>
                <div class="col-sm-6 col-md-7 col-sm-text-right">
                    <div class="buttons-wrapper">
                        <a class="button size-2 style-2" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="img/icon-2.png" alt=""></span>
                                <span class="text">update cart</span>
                            </span>
                        </a>
                        <a class="button size-2 style-3" href="#">
                            <span class="button-wrapper">
                                <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                <span class="text">proceed to checkout</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
			<div class="empty-space col-xs-b35 col-md-b70"></div>
            <div class="empty-space col-xs-b35 col-md-b70"></div>
        </div>

<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>