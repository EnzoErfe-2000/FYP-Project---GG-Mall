<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no, minimal-ui"/>
    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet">

    <link href="/fyp-project/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/fyp-project/css/bootstrap.extension.css" rel="stylesheet" type="text/css" />
    <link href="/fyp-project/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/fyp-project/css/swiper.css" rel="stylesheet" type="text/css" />
    <link href="/fyp-project/css/sumoselect.css" rel="stylesheet" type="text/css" />
    <link href="/fyp-project/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="/fyp-project/img/favicon.ico" />

  	<title>GG MALL</title>
</head>
<body>

    <!-- LOADER -->
    <div id="loader-wrapper"></div>

    <div id="content-block">
        <!-- HEADER -->
        <header>
			<div class="header-top">
                <div class="content-margins">
                    <div class="row">
                        <div class="col-md-5 hidden-xs hidden-sm">
                            <div class="entry"><b>contact us:</b> <a href="tel:+0121314520">+0121314520</a></div>
                            <div class="entry"><address><b>email:</b><a href="mailto:ggmall_inc@gmail.com"> ggmall_inc@gmail.com</a></address></div>
                        </div>
                        <div class="col-md-7 col-md-text-right">
                            <?php
								//class='open-popup' data-rel='1'
								if(isset($_SESSION["customer_id"]))
								{
									echo "<div class='entry language'>
											<div class='title'><b>" . $_SESSION["customer_name"] ."</b></div>
											<div class='language-toggle header-toggle-animation'>
												<a href='#.html'>Profile</a>
												<a href='#.html'>Orders</a>
												<a href='#.html'>Wishlist</a>
											</div>
										</div>";
									
									echo "<div class='entry'><a href='/fyp-project/include/logout-inc.php'><b>Logout</b></a></div>";                            
								}
								else
								{
									echo "<div class='entry'><a class='open-popup' data-rel='1'><b>login</b></a>&nbsp; or &nbsp;<a class='open-popup' data-rel='2'><b>register</b></a></div>";                            
								}
							?>
                            <!--
							<div class="entry language">
                                <div class="title"><b>en</b></div>
                                <div class="language-toggle header-toggle-animation">
                                    <a href="index1.html">fr</a>
                                    <a href="index1.html">ru</a>
                                    <a href="index1.html">it</a>
                                    <a href="index1.html">sp</a>
                                </div>
                            </div>
							<div class="entry hidden-xs hidden-sm"><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></div>
                            -->
							<div class="entry hidden-xs hidden-sm cart">
                                <a href="cart.php">
                                    <b class="hidden-xs">Your cart</b>
                                    <span class="cart-icon">
                                        <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                        <span class="cart-label">5</span>
                                    </span>
                                    <span class="cart-title hidden-xs">$1195.00</span>
                                </a>
                                <div class="cart-toggle hidden-xs hidden-sm">
                                    <div class="cart-overflow">
                                        <div class="cart-entry clearfix">
                                            <a class="cart-entry-thumbnail" href="#"><img src="/fyp-project/img/product-1.png" alt="" /></a>
                                            <div class="cart-entry-description">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                                        </td>
                                                        <td>
                                                            <div class="simple-article size-3 grey">$155.00</div>
                                                            <div class="simple-article size-1">TOTAL: $310.00</div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-color" style="background: #eee;"></div>
                                                        </td>
                                                        <td>
                                                            <div class="button-close"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="cart-entry clearfix">
                                            <a class="cart-entry-thumbnail" href="#"><img src="/fyp-project/img/product-2.png" alt="" /></a>
                                            <div class="cart-entry-description">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                                        </td>
                                                        <td>
                                                            <div class="simple-article size-3 grey">$155.00</div>
                                                            <div class="simple-article size-1">TOTAL: $310.00</div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-color" style="background: #bf584b;"></div>
                                                        </td>
                                                        <td>
                                                            <div class="button-close"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="cart-entry clearfix">
                                            <a class="cart-entry-thumbnail" href="#"><img src="/fyp-project/img/product-3.png" alt="" /></a>
                                            <div class="cart-entry-description">
                                                <table>
                                                    <tr>
                                                        <td>
                                                            <div class="h6"><a href="#">modern beat ht</a></div>
                                                            <div class="simple-article size-1">QUANTITY: 2</div>
                                                        </td>
                                                        <td>
                                                            <div class="simple-article size-3 grey">$155.00</div>
                                                            <div class="simple-article size-1">TOTAL: $310.00</div>
                                                        </td>
                                                        <td>
                                                            <div class="cart-color" style="background: #facc22;"></div>
                                                        </td>
                                                        <td>
                                                            <div class="button-close"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="empty-space col-xs-b40"></div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="cell-view empty-space col-xs-b50">
                                                <div class="simple-article size-5 grey">TOTAL <span class="color">$1195.00</span></div>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 text-right">
                                            <a class="button size-2 style-3" href="checkout1.html">
                                                <span class="button-wrapper">
                                                    <span class="icon"><img src="/fyp-project/img/icon-4.png" alt=""></span>
                                                    <span class="text">proceed to checkout</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="hamburger-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="content-margins">
                    <div class="row">
                        <div class="col-xs-3 col-sm-1">
                            <a id="logo" <?php hrefIndex(); ?>><img src="/fyp-project/img/logo1.png" alt="" /></a>  
                        </div>
                        <div class="col-xs-9 col-sm-11 text-right">
                            <div class="nav-wrapper">
                                <div class="nav-close-layer"></div>
                                <nav>
                                    <ul>
                                        <li <?php classActive("index.php"); ?>>
                                            <a href="/fyp-project/index.php">Home</a>
                                            <!--<div class="menu-toggle"></div>
                                            <ul>
                                                <li class="active"><a href="index1.html">Homepage 1</a></li>
                                                <li><a href="index2.html">Homepage 2</a></li>
                                                <li><a href="index3.html">Homepage 3</a></li>
                                                <li><a href="index4.html">Homepage 4</a></li>
                                                <li><a href="index5.html">Homepage 5</a></li>
                                                <li><a href="index6.html">Homepage 6</a></li>
                                            </ul>
											-->
                                        </li>
                                        <li <?php classActive("about.html"); ?>>
                                            <a href="/fyp-project/about.html">about us</a>
                                        </li>
                                        <li class="megamenu-wrapper <?php active("products.php"); ?>">
                                            <a href="/fyp-project/products.php">products</a>
                                            <div class="menu-toggle"></div>
											<!--
                                            <div class="megamenu">
                                                <div class="links">
                                                    <a class="active" href="products1.html">Products Landing 1</a>
                                                    <a href="products2.html">Products Landing 2</a>
                                                    <a href="products3.html">Products Landing 3</a>
                                                    <a href="product.html">Product Detail</a>
                                                </div>
                                                <div class="content">
                                                    <div class="row nopadding">
                                                        <div class="col-xs-6">
                                                            <div class="product-shortcode style-5">
                                                                <div class="product-label green">best price</div>
                                                                <div class="icons">
                                                                    <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                                    <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                    <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                                </div>
                                                                <div class="preview">
                                                                    <div class="swiper-container" data-loop="1">
                                                                        <div class="swiper-button-prev style-1"></div>
                                                                        <div class="swiper-button-next style-1"></div>
                                                                        <div class="swiper-wrapper">
                                                                            <div class="swiper-slide">
                                                                                <img src="/fyp-project/img/product-59.jpg" alt="" />
                                                                            </div>
                                                                            <div class="swiper-slide">
                                                                                <img src="/fyp-project/img/product-61.jpg" alt="" />
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-animate">
                                                                    <div class="title">
                                                                        <div class="shortcode-rate-wrapper">
                                                                            <div class="rate-wrapper align-inline">
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="h6 animate-to-green"><a href="product.html">modern beat nine</a></div>
                                                                    </div>
                                                                    <div class="description">
                                                                        <div class="simple-article text size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada</div>
                                                                    </div>
                                                                    <div class="price">
                                                                        <div class="simple-article size-4 dark">$630.00</div>
                                                                    </div>
                                                                </div>
                                                                <div class="preview-buttons">
                                                                    <div class="buttons-wrapper">
                                                                        <a class="button size-2 style-2" href="product.html">
                                                                            <span class="button-wrapper">
                                                                                <span class="icon"><img src="/fyp-project/img/icon-1.png" alt=""></span>
                                                                                <span class="text">Learn More</span>
                                                                            </span>
                                                                        </a>
                                                                        <a class="button size-2 style-3" href="#">
                                                                            <span class="button-wrapper">
                                                                                <span class="icon"><img src="/fyp-project/img/icon-3.png" alt=""></span>
                                                                                <span class="text">Add To Cart</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="product-shortcode style-5">
                                                                <div class="product-label green">best price</div>
                                                                <div class="icons">
                                                                    <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                                    <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                    <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                                </div>
                                                                <div class="preview">
                                                                    <div class="swiper-container" data-loop="1">
                                                                        <div class="swiper-button-prev style-1"></div>
                                                                        <div class="swiper-button-next style-1"></div>
                                                                        <div class="swiper-wrapper">
                                                                            <div class="swiper-slide">
                                                                                <img src="/fyp-project/img/product-60.jpg" alt="" />
                                                                            </div>
                                                                            <div class="swiper-slide">
                                                                                <img src="/fyp-project/img/product-61.jpg" alt="" />
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-animate">
                                                                    <div class="title">
                                                                        <div class="shortcode-rate-wrapper">
                                                                            <div class="rate-wrapper align-inline">
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="h6 animate-to-green"><a href="product.html">modern beat nine</a></div>
                                                                    </div>
                                                                    <div class="description">
                                                                        <div class="simple-article text size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada</div>
                                                                    </div>
                                                                    <div class="price">
                                                                        <div class="simple-article size-4 dark">$630.00</div>
                                                                    </div>
                                                                </div>
                                                                <div class="preview-buttons">
                                                                    <div class="buttons-wrapper">
                                                                        <a class="button size-2 style-2" href="product.html">
                                                                            <span class="button-wrapper">
                                                                                <span class="icon"><img src="/fyp-project/img/icon-1.png" alt=""></span>
                                                                                <span class="text">Learn More</span>
                                                                            </span>
                                                                        </a>
                                                                        <a class="button size-2 style-3" href="#">
                                                                            <span class="button-wrapper">
                                                                                <span class="icon"><img src="/fyp-project/img/icon-3.png" alt=""></span>
                                                                                <span class="text">Add To Cart</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											-->
										</li>
                                        <li <?php classActive("services.html"); ?>>
                                            <a href="/fyp-project/services.html">Services</a>
                                        </li>
										<!--
                                        <li>
                                            <a href="blog3.html">blog</a>
                                            <div class="menu-toggle"></div>
                                            <ul>
                                                <li>
                                                    <a href="blog3.html">Blog Landing Pages</a>
                                                    <div class="menu-toggle"></div>
                                                    <ul>
                                                        <li><a href="blog3.html">Blog Landing 1</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="blogdetail1.html">Blog Detail Pages</a>
                                                    <div class="menu-toggle"></div>
                                                    <ul>
                                                        <li><a href="blogdetail1.html">Blog Detail 1</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="gallery1.html">gallery</a>
                                            <div class="menu-toggle"></div>
                                            <ul>
                                                <li><a href="gallery1.html">Gallery 1</a></li>
                                                <li><a href="gallery2.html">Gallery 2</a></li>
                                            </ul>
                                        </li>
                                        <li class="megamenu-wrapper">
                                            <a href="#">Pages</a>
                                            <div class="menu-toggle"></div>
                                            <div class="megamenu">
                                                <div class="links">
                                                    <a class="active" href="checkout1.html">Checkout 1</a>
                                                    <a href="checkout2.html">Checkout 2</a>
                                                    <a href="cart.html">Cart</a>
                                                    <a href="elements.html">Elements</a>
                                                </div>
                                                <div class="content">
                                                    <div class="row nopadding">
                                                        <div class="col-xs-6">
                                                            <div class="product-shortcode style-5">
                                                                <div class="product-label green">best price</div>
                                                                <div class="icons">
                                                                    <a class="entry"><i class="fa fa-check" aria-hidden="true"></i></a>
                                                                    <a class="entry open-popup" data-rel="3"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                                    <a class="entry"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                                </div>
                                                                <div class="preview">
                                                                    <div class="swiper-container" data-loop="1">
                                                                        <div class="swiper-button-prev style-1"></div>
                                                                        <div class="swiper-button-next style-1"></div>
                                                                        <div class="swiper-wrapper">
                                                                            <div class="swiper-slide">
                                                                                <img src="img/product-61.jpg" alt="" />
                                                                            </div>
                                                                            <div class="swiper-slide">
                                                                                <img src="img/product-59.jpg" alt="" />
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                </div>
                                                                <div class="content-animate">
                                                                    <div class="title">
                                                                        <div class="shortcode-rate-wrapper">
                                                                            <div class="rate-wrapper align-inline">
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="h6 animate-to-green"><a href="product.html">modern beat nine</a></div>
                                                                    </div>
                                                                    <div class="description">
                                                                        <div class="simple-article text size-2">Mollis nec consequat at In feugiat molestie tortor a malesuada</div>
                                                                    </div>
                                                                    <div class="price">
                                                                        <div class="simple-article size-4 dark">$630.00</div>
                                                                    </div>
                                                                </div>
                                                                <div class="preview-buttons">
                                                                    <div class="buttons-wrapper">
                                                                        <a class="button size-2 style-2" href="product.html">
                                                                            <span class="button-wrapper">
                                                                                <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                                                <span class="text">Learn More</span>
                                                                            </span>
                                                                        </a>
                                                                        <a class="button size-2 style-3" href="#">
                                                                            <span class="button-wrapper">
                                                                                <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                                                                <span class="text">Add To Cart</span>
                                                                            </span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <div class="banner-shortcode style-3 rounded-image text-center" style="background-image: url(img/background-11.jpg);">
                                                                <div class="valign-middle-cell">
                                                                    <div class="valign-middle-content">
                                                                        <div class="simple-article size-5 light transparent uppercase col-xs-b5"><span class="color">30%</span>DISCOUNT</div>
                                                                        <h3 class="h3 light col-xs-b15">all models from relax seriece</h3>
                                                                        <div class="simple-article size-3 light transparent col-xs-b30">Vivamus in tempor eros. Phasellus rhoncus in nunc sit amet mattis. Integer in ipsum vestibulum, molestie arcu ac</div>
                                                                        <a class="button size-2 style-1" href="#">
                                                                            <span class="button-wrapper">
                                                                                <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                                                <span class="text">learn more</span>
                                                                            </span>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        -->
										<li <?php classActive("contact.html"); ?>><a href="/fyp-project/contact.html">contact</a></li>
                                    </ul>
                                    <div class="navigation-title">
                                        Navigation
                                        <div class="hamburger-icon active">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                            <div class="header-bottom-icon toggle-search"><i class="fa fa-search" aria-hidden="true"></i></div>
                            <div class="header-bottom-icon visible-rd"><i class="fa fa-heart-o" aria-hidden="true"></i></div>
                            <div class="header-bottom-icon visible-rd">
                                <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                <span class="cart-label">5</span>
                            </div>
                        </div>
                    </div>
                    <div class="header-search-wrapper">
                        <div class="header-search-content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                        <form>
                                            <div class="search-submit">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                                <input type="submit"/>
                                            </div>
                                            <input class="simple-input style-1" type="text" value="" placeholder="Enter keyword" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="button-close"></div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
		
<?php
function classActive($currect_page){
  $uri = $_SERVER['REQUEST_URI'];
  if(strpos($uri, $currect_page)){
      echo 'class = "active"'; //class name in css 
  } 
}

function active($currect_page){
  $uri = $_SERVER['REQUEST_URI'];
  if(strpos($uri, $currect_page)){
      echo 'active'; //class name in css 
  } 
}
function hrefIndex(){
  $uri = $_SERVER['REQUEST_URI'];
  if(!strpos($uri, "index.php")){
      echo 'href = "/fyp-project/index.php"'; //class name in css 
  } 
}
?>