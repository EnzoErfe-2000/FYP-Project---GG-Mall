<?php
include_once 'include/session-db-func.php';
include_once 'include/header.php';	
?>       
<?php
$uri=$_SERVER['HTTP_REFERER'];
if($uri == "http://localhost/fyp-project/include/createOrder-inc.php")
{
	
?>
<div class="header-empty-space"></div>

        <div class="container">
            <div class="empty-space col-xs-b15 col-sm-b30"></div>
            <div class="breadcrumbs">
                <a href="#">home</a>
                <a href="cart.php">checkout</a>
				<a href="#">successful checkout</a>
            </div>
            <div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="text-center">
                <div class="simple-article size-3 grey uppercase col-xs-b5">your order has been successfully adopted</div>
                <div class="h2">track your order now</div>
                <div class="title-underline center"><span></span></div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <a class="button size-2 style-3" href="user_order.php">
                            <span class="button-wrapper">
                                <span class="icon"><img src="img/icon-4.png" alt=""></span>
                                <span class="text">track</span>
                            </span>
                            <input type="submit"/>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="empty-space col-xs-b35 col-md-b70"></div>
        <div class="empty-space col-xs-b35 col-md-b70"></div>
<?php
}
else
{
	echo "<script> location.assign('error_404.php');</script>";
}

?>
<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>