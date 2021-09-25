<?php
include_once 'include/header.php';	
?>
<?php
	if(isset($_GET['product']) && is_numeric($_GET['product']))
	{
		$product_id = (int)$_GET['product'];
		//echo "<script type='text/javascript'>alert('$product_id');</script>";
	
		$sql = "SELECT * FROM product WHERE product_id = ?;";
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
		
		mysqli_stmt_bind_param($stmt, "s", $product_id);
		mysqli_stmt_execute($stmt);
		
		$productData = mysqli_stmt_get_result($stmt);
		$product = mysqli_fetch_assoc($productData);
		$bigSwiperImgs = explode(" ", $product['product_bigSwiperImg']);
		$swiperImgs = explode(" ", $product['product_swiperImg']);
		
		//$num = count($swiperImgs);
		//echo "<script type='text/javascript'>alert('size of array: $num');</script>";
		//echo "<script type='text/javascript'>alert('$bigSwiperImgs[0]');</script>";
	
	}
?>

	<div class="header-empty-space"></div>

	<div class="container">
		<div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="/fyp-project/index.php">home</a>
                <a href="#">products</a>
                <!--
				<a href="#">laptops</a>
                -->
				<a href="#">
					<?=$product['product_name']?>
				</a>
            </div>
		
		<div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
        
		<div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="row">
                    <div class="col-sm-6 col-xs-b30 col-sm-b0">
						<div class="main-product-slider-wrapper swipers-couple-wrapper">
							<div class="swiper-container swiper-control-top">
								<div class="swiper-button-prev hidden"></div>
								<div class="swiper-button-next hidden"></div>
								<div class="swiper-wrapper">
									<?php
										for($i = 0; $i < count($bigSwiperImgs); $i++)
										{
											echo "<div class='swiper-slide'>
													<div class='swiper-lazy-preloader'></div>
													<div class='product-big-preview-entry swiper-lazy' data-background='product_img/" . $bigSwiperImgs[$i] . "'></div>
												</div>";
										}
									?>
								</div>
								  
								<div class="empty-space col-xs-b30 col-sm-b60"></div>
								
								<div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5" data-center="1" data-click="1">
									<div class="swiper-button-prev hidden"></div>
									<div class="swiper-button-next hidden"></div>
									<div class="swiper-wrapper">
										<?php
											for($i = 0; $i < count($swiperImgs); $i++)
											{
												echo "<div class='swiper-slide'>
														<div class='product-small-preview-entry'>
															<img src='product_img/" . $swiperImgs[$i] . "' alt='' />
														</div>
													</div>";
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-6">
                        <div class="simple-article size-3 grey col-xs-b5">Gaming Laptop</div>
                        <div class="h3 col-xs-b25"><span id="prod_name"><?=$product['product_name']?></span><br><?=$product['product_nameExtra']?></div>
                        <?php echo '<script type="text/javascript">document.title = "GG Mall | " + document.getElementById("prod_name").innerText;</script>';?>
						<div class="row col-xs-b25">
                            <div class="col-sm-6">
                                <div class="simple-article size-5 grey">PRICE: <span class="color">RM <?=number_format($product['product_regularPrice'],2,".",",")?></span></div>        
                            </div>
                            <div class="col-sm-6 col-sm-text-right">
                                <div class="rate-wrapper align-inline">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                </div>
                                <div class="simple-article size-2 align-inline">0 Reviews</div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="simple-article size-3 col-xs-b5">PRODUCT ID : <span class="grey prodID"><?=$product['product_id']?></span></div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6 col-sm-text-right">
                                <div class="simple-article size-3 col-xs-b5">AVAILABLE : <span class="grey"><?php if($product['product_availability'] == 1){ echo 'YES';}?></span></div>
								<div class="simple-article size-3 col-xs-b20">STOCK : <span class="color"><?=$product['product_stock']?></span></div>
                            </div>
                        </div>
                        <div class="simple-article size-3 col-xs-b30">
						<?=$product['product_description']?>
						</div>
                            
						<form action="/fyp-project/cart.php" onsubmit="addToCartFunction()" id="add-to-cart-form" method="post">
							<input type="hidden" name="product_id" id="product_id" value="not yet defined">
							<div class="row col-xs-b40">
                                <div class="col-sm-3">
                                    <div class="h6 detail-data-title size-1">quantity:</div>
                                </div>
								<div class="col-sm-9">
									<div class="quantity-select">
										<span class="minus"></span>
										<span class="number" name="product_quantity">1</span>
										<input type="hidden" name="product_quantity" id="product_quantity" value="not yet defined">
										<span class="plus"></span>
									</div>
								</div>
							</div>
							<div class="row m5 col-xs-b40">
								<div class="col-sm-6">
									<button class="button size-2 style-1 block noshadow" href="#">
										<span class="button-wrapper">
											<span class="icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
											<span class="text">add to favourites</span>
										</span>
									</button>
								</div>
								<div class="col-sm-6 col-xs-b10 col-sm-b0">
									<button class="button size-2 style-2 block noshadow" type="submit">
										<span class="button-wrapper">
											<span class="icon"><img src="../img/icon-2.png" alt=""></span>
											<span class="text">add to cart</span>
										</span>
									</button>
								</div>
							</div>
						</form>
						<div class="row">
                            <div class="col-sm-3">
                                <div class="h6 detail-data-title size-2">share:</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="follow light">
                                    <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
									<a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
                                    <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
					
				</div>
				<div class="empty-space col-md-b70"></div>
			</div>
			<div class="col-md-3 col-md-pull-9">
                <div class="h4 col-xs-b10">popular categories</div>
                <ul class="categories-menu transparent">
                    <li>
                        <a href="#">PC Gaming Peripheral</a>
                        <div class="toggle"></div>
                        <ul>
                            <li>
                                <a href="#">Gaming Headset</a>
                                <div class="toggle"></div>
                                <ul>
                                    <li>
                                        <a href="STEELSERIES ARCTIS 5 7.1 SURROUND RGB GAMING HEADSET.html">SteelSeries Arctis 5 7.1 Surround RGB Gaming Headset</a>
                                    </li>
                                    <li>
                                        <a href="Razer Blackshark V2 X Esports Gaming Headset.html">Razer Blackshark V2 X Esports Gaming Headset</a>
                                    </li>
                                    <li>
                                        <a href="Razer Kraken Bluetooth Kitty Edition Wireless Gaming RGB Headset.html">Razer Kraken Bluetooth Kitty Edition Wireless Gaming RGB Headset</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Gaming Keyboard</a>
                                <div class="toggle"></div>
                                <ul>
                                    <li>
                                        <a href="SteelSeries Apex 3 Water Resistant Gaming Keyboard.html">SteelSeries Apex 3 Water Resistant Gaming Keyboard</a>
                                    </li>
                                    <li>
                                        <a href="Cooler Master CK530 V2 TKL RGB Gaming Keyboard.html">Cooler Master CK530 V2 TKL RGB Gaming Keyboard</a>
                                    </li>
									<li>
                                        <a href="Razer BlackWidow Green Mechanical Gaming Keyboard.html">Razer BlackWidow Green Mechanical Gaming Keyboard</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Gaming Mice</a>
								<div class="toggle"></div>
                                <ul>
                                    <li>
                                        <a href="Logitech G502 Hero High Performance Gaming Mouse.html">Logitech G502 Hero High Performance Gaming Mouse</a>
                                    </li>
                                    <li>
                                        <a href="Razer DeathAdder Essential Gaming Mouse.html">Razer DeathAdder Essential Gaming Mouse</a>
                                    </li>
									<li>
                                        <a href="Steelseries Aerox 3 Wireless Lightweight Gaming Mouse.html">Steelseries Aerox 3 Wireless Lightweight Gaming Mouse</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">PC Office</a>
                        <div class="toggle"></div>
                        <ul>
                            <li>
                                <a href="#">Office Mice</a>
                                <div class="toggle"></div>
                                <ul>
                                    <li>
                                        <a href="Logitech M170 Wireless Mouse.html">Logitech M170 Wireless Mouse</a>
                                    </li>
                                    <li>
                                        <a href="Logitech MX Master 3 Wireless Mouse.html">Logitech MX Master 3 Wireless Mouse</a>
                                    </li>
                                    <li>
                                        <a href="Logitech M325 Wireless Mouse.html">Logitech M325 Wireless Mouse</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Office Keyboard</a>
                                <div class="toggle"></div>
                                <ul>
                                    <li>
                                        <a href="Logitech K380 Slim Multi-Device Keyboard.html">Logitech K380 Slim Multi-Device Keyboard</a>
                                    </li>
                                    <li>
                                        <a href="Microsoft Bluetooth Desktop Combo Keyboard.html">Microsoft Bluetooth Desktop Combo Keyboard</a>
                                    </li>
									<li>
                                        <a href="Targus KB55 Multi-Platform Bluetooth.html">Targus KB55 Multi-Platform Bluetooth</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Webcam</a>
                                <div class="toggle"></div>
                                <ul>
                                    <li>
                                        <a href="Logitech C922 Pro HD Stream Webcam.html">Logitech C922 Pro HD Stream Webcam</a>
                                    </li>
                                    <li>
                                        <a href="J5Create USB HD Webcam with 360° Rotation (JVCU100).html">J5Create USB HD Webcam with 360° Rotation (JVCU100)</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Laptop</a>
                        <div class="toggle"></div>
                        <ul>
                            <li>
                                <a href="#">Consumer Laptop</a>
                                <div class="toggle"></div>
                                <ul>
                                    <li>
                                        <a href="MSI Modern 15 15.6″ FHD Laptop.html">MSI Modern 15 15.6″ FHD Laptop</a>
                                    </li>
                                    <li>
                                        <a href="Acer Swift 3x SF314-510G-761J 14” FHD Laptop Steam Blue.html">Acer Swift 3x SF314-510G-761J 14” FHD Laptop Steam Blue</a>
                                    </li>
                                    <li>
                                        <a href="Asus ZenBook 13 UX325E-AKG349TS 13.3” OLED FHD Laptop Pine Grey.html">Asus ZenBook 13 UX325E-AKG349TS 13.3” OLED FHD Laptop Pine Grey</a>
                                    </li>
                                </ul>
                            </li>
							<li>
                                <a href="#">Gaming Laptop</a>
                                <div class="toggle"></div>
                                <ul>
                                    <li>
                                        <a href="MSI GF63 Thin 15.6″ FHD Gaming Laptop.html">MSI GF63 Thin 15.6″ FHD Gaming Laptop </a>
                                    </li>
                                    <li>
                                        <a href="Asus TUF Dash F15 FX516P-MHN085T 15.6″FHD.html">Asus TUF Dash F15 FX516P-MHN085T 15.6″FHD</a>
                                    </li>
                                    <li>
                                        <a href="Acer Nitro 5 AN515-45-R7QR 15.6″ Gaming Laptop Black.html">Acer Nitro 5 AN515-45-R7QR 15.6″ Gaming Laptop Black</a>
                                    </li>
                                </ul>
                            </li>
               			</ul>
					</li>
				</ul>
                <div class="empty-space col-xs-b25 col-sm-b50"></div>
            </div>
		</div>
	</div>
	
<script>
// This function gets called once the user submits the form
function addToCartFunction(){

    // First get the value from the span
    quantityValue = $('.number').html();
	prodIdValue = $('.prodID').html();

    // Then store the extracted timerValue in a hidden form field
    $("#product_quantity").val(quantityValue);
	$("#product_id").val(prodIdValue);

    // submit the form using it's ID "my-form"
	$("#add-to-cart-form").action = "/fyp-project/cart.php";
	$("#add-to-cart-form").submit();
}
</script>	
<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>