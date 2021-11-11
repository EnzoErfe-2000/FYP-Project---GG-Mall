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
                            <div class="entry"><address><b>email:</b><a href="mailto:ggmall.inc2001@gmail.com"> ggmall.inc2001@gmail.com</a></address></div>
                        </div>
                        <div class="col-md-7 col-md-text-right">
                            <?php
								//class='open-popup' data-rel='1'
								if(isset($_SESSION["customer_id"]))
								{
									echo "<div class='entry language'>
											<div class='title'><b>" . $_SESSION["customer_name"] ."</b></div>
											<div class='language-toggle header-toggle-animation'>
												<a href='profile.php'>Profile</a>
												<a href='user_order.php'>Orders</a>
											</div>
										</div>";
									
									echo "<div class='entry'><a href='/fyp-project/include/logout-inc.php'><b>Logout</b></a></div>";                            
								}
								else
								{
									echo "<div class='entry'><a class='open-popup' data-rel='1'><b>login</b></a>&nbsp; or &nbsp;<a class='open-popup' data-rel='2'><b>register</b></a></div>";                            
								}
							?>
							<div class="entry hidden-xs hidden-sm">
                                <a href="/fyp-project/cart.php">
                                    <b class="hidden-xs">Your cart</b>
                                    <span class="cart-icon">
                                        <i class="fa fa-shopping-bag" href="/fyp-project/cart.php" aria-hidden="true"></i>
                                        <span class="cart-label"><?=isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;?></span>
                                    </span>
                                    <span class="cart-title hidden-xs">RM <?=isset($_SESSION['cartTotal']) ? number_format($_SESSION['cartTotal'],2,".",",") : 0;?></span>
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
                                            <a class="button size-2 style-3" href="checkout1.php">
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
                                        </li>
                                        <li <?php classActive("about.php"); ?>>
                                            <a href="/fyp-project/about.php">about us</a>
                                        </li>
                                        <li class="megamenu-wrapper <?php active("products.php"); ?>">
                                            <a href="/fyp-project/products.php">products</a>
                                            <div class="menu-toggle"></div>
										</li>
                                        <li <?php classActive("services.php"); ?>>
                                            <a href="/fyp-project/services.php">Services</a>
                                        </li>
										<li <?php classActive("contact.php"); ?>><a href="/fyp-project/contact.php">contact</a></li>
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
                            
                            <div class="header-bottom-icon visible-rd">
                                <a href="/fyp-project/cart.php">
									<i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                </a>
								<span class="cart-label"><?=isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;?></span>
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