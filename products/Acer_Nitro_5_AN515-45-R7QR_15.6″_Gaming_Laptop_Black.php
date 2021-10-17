<?php
include_once '../include/header.php';	
?>

        <div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="/fyp-project/index.php">home</a>
                <a href="#">products</a>
                <a href="#">laptops</a>
                <a href="#">Acer Nitro 5 AN515-45-R7QR 15.6″ Gaming Laptop BLACK</a>
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
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="../product_img/AcerNitro5_01.png"></div>
                                       </div>
									   <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="../product_img/AcerNitro5_02.png"></div>
                                       </div>
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="../product_img/AcerNitro5_03.png"></div>
                                       </div>
									   
									  </div>
                                </div>

                                <div class="empty-space col-xs-b30 col-sm-b60"></div>

                                <div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5" data-center="1" data-click="1">
                                   <div class="swiper-button-prev hidden"></div>
                                   <div class="swiper-button-next hidden"></div>
                                   <div class="swiper-wrapper">
                                       <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="../product_img/AcerNitro5_01~1.png" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="../product_img/AcerNitro5_02~1.png" alt="" />
                                            </div>
                                        </div>
										<div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="../product_img/AcerNitro5_03~1.png" alt="" />
                                            </div>
                                        </div>
										
                                   </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="simple-article size-3 grey col-xs-b5">Gaming Laptop</div>
                            <div class="h3 col-xs-b25"><span id="prod_name">Acer Nitro 5 AN515-45-R7QR 15.6″ Gaming Laptop BLACK</span><br>(RYZEN7-5800H, 8GB, 512GB, GTX1650, WIN10)</div>
                            <?php echo '<script type="text/javascript">document.title = "GG Mall | " + document.getElementById("prod_name").innerText;</script>';?>
							<div class="row col-xs-b25">
                                <div class="col-sm-6">
                                    <div class="simple-article size-5 grey">PRICE: <span class="color">RM4,149.00</span></div>        
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
                                <div class="col-sm-6">
                                    <div class="simple-article size-3 col-xs-b5">PRODUCT ID : <span class="grey prodID">10004</span></div>
                                </div>
                                <div class="col-sm-6 col-sm-text-right">
                                    <div class="simple-article size-3 col-xs-b5">AVAILABLE : <span class="grey">YES</span></div>
									<div class="simple-article size-3 col-xs-b20">STOCK : <span class="color">10</span></div>
                                </div>
                            </div>
                            <div class="simple-article size-3 col-xs-b30">
							• Processor	: AMD Ryzen 7 5800H Processor (3.2Ghz up to 4.4Ghz, 16MB cache 8 Cores)<br>
							• RAM		:8GB DDR4 3200Mhz<br>
							• Storage   :512B PCIE NVME M.2 SSD<br>
							• Graphic Card   :NVIDIA GeForce GTX1650 4GB GDDR6<br>
							• Display Screen / Design / Resolution :15.6″ FHD (1920×1080), 144Hz IPS technology Slim bezel Display<br>
							• Operation System  :Windows 10 Home<br>
							• Warranty   :2 Years Warranty<br>
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
                <div class="empty-space col-md-b70"></div>

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
include_once '../include/products_sidebar.php';
?>
<?php
include_once '../include/footer.php';
?>
<?php
include_once '../include/header_popup.php';
?>