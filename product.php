<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';	
?>
<?php
	if(isset($_GET['product']) && is_numeric($_GET['product']))
	{
		$product_id = (int)$_GET['product'];
		
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
	}
?>
<?php
	//
	if(count($product) != 0 && $product['product_isUnlisted'] != 1 && ($product['product_availability'] == "YES" || $product['product_availability'] == "Yes")){
?>
	<div class="header-empty-space"></div>

	<div class="container">
		<div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="/fyp-project/index.php">home</a>
                <a href="#">products</a>
                <a href="#"><?=$product['product_category0']?></a>
				<a href="#"><?=$product['product_category1']?></a>
				<a href="#"><?=$product['product_name']?></a>
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
													<div class='product-big-preview-entry swiper-lazy' data-background='./admin/product_img/" . $bigSwiperImgs[$i] . "'></div>
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
											for($i = 0; $i < count($bigSwiperImgs); $i++)
											{
												echo "<div class='swiper-slide'>
														<div class='product-small-preview-entry'>
															<img src='./admin/product_img/" . $bigSwiperImgs[$i] . "'width='50' height='50' alt='' />
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
                        <div class="simple-article size-3 grey col-xs-b5"><?=$product['product_category0']?> <?=$product['product_category1']?></div>
                        <div class="h3 col-xs-b25"><span id="prod_name"><?=$product['product_name']?></span><br><?=$product['product_nameExtra']?></div>
                        <?php echo '<script type="text/javascript">document.title = "GG Mall | " + document.getElementById("prod_name").innerText;</script>';?>
						<div class="row col-xs-b10">
                            <div class="col-sm-6">
                                <div class="simple-article size-5 grey">PRICE: <span class="color">RM <?=number_format($product['product_regularPrice'],2,".",",")?></span></div>        
                            </div>
                            <div class="col-sm-6 col-sm-text-right">
                                <div class="simple-article size-3 col-xs-b5">AVAILABLE : <span class="grey"><?=$product['product_availability']?></span></div>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
								<div class="simple-article size-3 col-xs-b5">PRODUCT ID : <span class="grey prodID"><?=$product['product_id']?></span></div>
                            </div>
                            <div class="col-sm-6 col-sm-text-right">
                                <div class="simple-article size-3 col-xs-b20">STOCK : <span class="productStock color"><?=$product['product_stock']?></span></div>
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
										<button type="button" class="minus" style="border:none;"></button>
										<input class="numInput" style="font-weight:bold;margin:0;" type="number" name="product_quantity" value="1" min=1 max=<?=$product['product_stock']?> required>
										<button type="button" class="plus" style="border:none;"></button>
									</div>
								</div>
							</div>
							<div class="row m5 col-xs-b40">
								<div class="col-sm-6">
									
								</div>
								<div class="col-sm-6 col-xs-b10 col-sm-b0">
									<button class="button size-2 style-2 block noshadow" type="submit">
										<span class="button-wrapper">
											<span class="icon"><img src="img/icon-2.png" alt=""></span>
											<span class="text">add to cart</span>
										</span>
									</button>
								</div>
							</div>
						</form>
                    </div>
					
				</div>
				<div class="empty-space col-md-b70"></div>
			</div>
			<div class="col-md-3 col-md-pull-9">
					<div class="row">
                    <div class="h4 col-xs-b10">popular categories</div>
                    <ul class="categories-menu transparent">
						<?php
						$sql = "
						SELECT category_name FROM category
						GROUP BY category_name
						";
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
						$categories = mysqli_stmt_get_result($stmt);

						$categoriesArray = array();
						while ($categoriesRow = mysqli_fetch_assoc($categories))
						{
						  $categoriesArray[] = $categoriesRow;
						}

						$sql = "
						SELECT subcategory_name FROM subcategory
						";
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
						$subcategories = mysqli_stmt_get_result($stmt);

						$subcategoriesArray = array();
						while ($subcategoriesRow = mysqli_fetch_assoc($subcategories))
						{
						  $subcategoriesArray[] = $subcategoriesRow;
						}
						
						
						for($i = 0 ; $i< count($categoriesArray) ; $i++)
						{
							$categoryName = $categoriesArray[$i]['category_name'];
							echo "
								<li>
									<a>". $categoryName ."</a>
									<div class='toggle'></div>
									<ul>
									";
									for($j = 0 ; $j< count($subcategoriesArray) ; $j++)
									{
										$subcategoryName = $subcategoriesArray[$j]['subcategory_name'];
										echo "
											<li>
												<a>". $categoryName." ".$subcategoryName ."</a>
												<div class='toggle'></div>
												<ul>";
												
												settype($categoryName, "string");
												settype($subcategoryName, "string");
												$sql = "
												SELECT product_id, product_name FROM product 
												WHERE product_category0 = '$categoryName'
												AND product_category1 = '$subcategoryName'
												";
												
												$stmt = mysqli_stmt_init($conn);
												if(!mysqli_stmt_prepare($stmt, $sql)){
													mysqli_close($conn);
												}
												else
												{
													//echo "<script type='text/javascript'>alert('stmt successful!');</script>";
												}
												mysqli_stmt_execute($stmt);
												$productsByCategories = mysqli_stmt_get_result($stmt);
												$productsByCategoriesRow = mysqli_fetch_assoc($productsByCategories);
												foreach($productsByCategories as $data)
												{
													echo "
														<li>
															<a href='/fyp-project/product.php?product=".$data['product_id']."'>".$data['product_name']."</a>
														</li>
														";
												}
										echo "	</ul>
											</li>
											";
									}
							echo "
									</ul>
								</li>
								";
						}
						?>
                    </ul>

                    <div class="empty-space col-xs-b25 col-sm-b50"></div>
           
                </div> 
            </div>
            
		</div>
	</div>
	
<!--JS Function addToCartFunction is at header_popup.php-->

<?php
}
else
{
?>
        <div class="block-entry fixed-background" style="background-image: url(img/background-22.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div class="cell-view simple-banner-height text-center">
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                            <h1 class="h1 light">Error - 404</h1>
                            <div class="title-underline center"><span></span></div>
                            <div class="simple-article light transparent size-4">Sorry, the item you are looking for was not found.</div>
                            <div class="empty-space col-xs-b35 col-sm-b70"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
}
?>	

<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>