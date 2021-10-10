<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';	
?>
<?php
if(isset($_SESSION['cart']))
{
	$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
	$products = array();
	$subtotal = 0.00;
	
	if ($products_in_cart) {
		$sql = "SELECT * FROM product WHERE product_id IN (".implode(',', array_keys($products_in_cart)).");";
		
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
		
		$orderList = mysqli_stmt_get_result($stmt);
		
		foreach ($orderList as $order) {
        $subtotal += (float)$order['product_listedPrice'] * (int)$products_in_cart[$order['product_id']];
		}
	}
	
	$sql = "SELECT * FROM customer WHERE customer_id = ?;";
		
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
		
		$resultData = mysqli_stmt_get_result($stmt);
		$row = mysqli_fetch_assoc($resultData);
		$num = count($row);
		//echo "<script type='text/javascript'>alert('$num');</script>";
		/*<?=$row['customer_name_first']?>*/
}
else
{
	echo "<script> location.assign('index.php');</script>";
}
?>
<div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="/fyp-project/index.php">home</a>
				<a href="/fyp-project/cart.php">shopping cart</a>
                <a href="#">checkout</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="text-center">
                <div class="h2">Checkout</div>
                <div class="simple-article size-3 grey uppercase col-xs-b5">please remember to check your info before proceeding</div>
                <div class="title-underline center"><span></span></div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xs-b50 col-md-b0">
                    <h4 class="h4 col-xs-b25">billing details</h4>
                    <select class="SlectBox">
                        <option disabled="disabled" selected="selected">Choose country</option>
                        <option value="malaysia">Malaysia</option>
                    </select>
                    <div class="empty-space col-xs-b20"></div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_name_first]";}else{echo "";}?>" placeholder="First name" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_name_last]";}else{echo "";}?>" placeholder="Last name" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
					<!--
                    <input class="simple-input" type="text" value="" placeholder="Company name" />
                    <div class="empty-space col-xs-b20"></div>
					-->
                    <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_address_street]";}else{echo "";}?>" placeholder="Street address" />
                    <div class="empty-space col-xs-b20"></div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_address_unit]";}else{echo "";}?>" placeholder="Unit No." />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_address_city]";}else{echo "";}?>" placeholder="Town/City" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_address_state]";}else{echo "";}?>" placeholder="State" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
						    <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_address_country]";}else{echo "";}?>" placeholder="Country" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
                    <div class="row m10">
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_address_postcodeZIP]";}else{echo "";}?>" placeholder="Postcode/ZIP" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_phone]";}else{echo "";}?>" placeholder="Phone" />
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
					<input class="simple-input" type="text" value="<?php if($row >0){echo "$row[customer_email_address]";}else{echo "";}?>" placeholder="Email" />
                    <div class="empty-space col-xs-b20"></div>
                    <label class="checkbox-entry">
                        <input type="checkbox" required><span>Privacy policy agreement</span>
                    </label>
                    <div class="empty-space col-xs-b50"></div>
					<!--
                    <label class="checkbox-entry checkbox-toggle-title">
                        <input type="checkbox"><span>ship to different address?</span>
                    </label>
                    <div class="checkbox-toggle-wrapper">
                        <div class="empty-space col-xs-b25"></div>
                        <select class="SlectBox">
                            <option disabled="disabled" selected="selected">Choose country</option>
                            <option value="malaysia">Malaysia</option>
                        </select>
                        <div class="empty-space col-xs-b20"></div>
                        <div class="row m10">
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="First name" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="Last name" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                        </div>
						<!--
                        <input class="simple-input" type="text" value="" placeholder="Company name" />
                        <div class="empty-space col-xs-b20"></div>
						
                        <input class="simple-input" type="text" value="" placeholder="Street address" />
                        <div class="empty-space col-xs-b20"></div>
                        <div class="row m10">
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="Unit No." />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="Town/City" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                        </div>
                        <div class="row m10">
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="State/Country" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                            <div class="col-sm-6">
                                <input class="simple-input" type="text" value="" placeholder="Postcode/ZIP" />
                                <div class="empty-space col-xs-b20"></div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b30 col-sm-b60"></div>
                    -->
					<textarea class="simple-input" placeholder="Note about your order"></textarea>
                </div>
                <div class="col-md-6">
                    <h4 class="h4 col-xs-b25">your order</h4>
                    <div style="max-height:440px; overflow-y:auto">
					<?php foreach ($orderList as $order): ?>
					<div class="cart-entry clearfix">
                        <a class="cart-entry-thumbnail" href="product.php?product=<?=$order['product_id']?>"><img src="product_img/<?=$order['product_img']?>" alt=""></a>
                        <div class="cart-entry-description">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="h6"><a href="product.php?product=<?=$order['product_id']?>"><?=$order['product_name']?></a></div>
                                            <div class="simple-article size-1">QUANTITY:&emsp;<span class="h4" style="font-weight:bold;"><?=$products_in_cart[$order['product_id']]?></span></div>
                                        </td>
                                        <td>
                                            <div class="simple-article size-3 grey">RM <?=number_format($order['product_listedPrice'],2,".",",")?></div>
                                            <div class="simple-article size-1">TOTAL: RM <?= number_format(($order['product_listedPrice']*$products_in_cart[$order['product_id']]),2,'.',',')?></div>
                                        </td>
										<!--
                                        <td>
                                            <div class="cart-color" style="background: #eee;"></div>
                                        </td>
										-->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
					<?php endforeach; ?>
					</div>
					<div class="order-details-entry simple-article size-3 grey uppercase">
                        <div class="row">
                            <div class="col-xs-6">
                                cart subtotal
                            </div>
                            <div class="col-xs-6 col-xs-text-right">
                                <div class="color">RM <?=number_format($subtotal,2,".",",")?></div>
                            </div>
                        </div>
                    </div>
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
                                <div class="color"> RM <?=number_format($subtotal,2,".",",")?></div>
                            </div>
                        </div>
                    </div>
                    <div class="empty-space col-xs-b50"></div>
                    <h4 class="h4 col-xs-b25">payment method</h4>
                    <select class="SlectBox">
                        <option selected="selected">PayPal</option>
                        <!--
						<option value="volvo">Volvo</option>
                        <option value="saab">Saab</option>
                        <option value="mercedes">Mercedes</option>
                        <option value="audi">Audi</option>
						-->
                    </select>
                    <div class="empty-space col-xs-b10"></div>
                    <div class="simple-article size-2">* The following page may redirect you to another page based on your selected payment method</div>
                    <div class="empty-space col-xs-b30"></div>
                    <div class="button block size-2 style-3">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                            <span class="text">place order</span>
                        </span>
                        <input type="submit"/>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>

        
<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>