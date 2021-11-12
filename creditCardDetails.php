<?php
include_once 'include/session-db-func.php';
?>
<?php
	$card = "";
	
	if (isset($_POST['firstName'])) {
		
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
	
	<style>
	body
	{
		background: #f9f9f9;
	}
	.payment-option
	{
		border: 1px #eee solid;
		background: #fff;
		width: 150px;
		padding: 0px 10px;
		position: relative;
		margin: 0px 10px;
		
	}
	.payment-option img
	{
		max-width: 100%; height: auto; display: block;
	}
	.payment-option:hover
	{
		background: #f2f2f2;
	}
	.payment-option.active
	{
		background: #b8cd07;
		color:#fff;
	}
	.payment-option.active:hover
	{
		
	}
	.payment-option-container
	{
		display:flex;
		justify-content:center;
		flex-wrap:nowrap;
	}
	.selectedTick
	{
		display:none;position:absolute;right:0px;top:0px;background: #fff;border-radius: 0px 0px 0px 10px;padding: 4px 6px;
	}
	.selectedTick.active
	{
		display:block;
	}
	
	
	</style>
</head>
<body>

    <!-- LOADER -->
    <div id="loader-wrapper"></div>
    <div id="content-block">
		<form action="include/createOrder-inc.php" name="cardForm" method="post">
		<div class="container">
			<div class="empty-space col-xs-b15 col-sm-b50 col-md-b100"></div>
            <div class="text-center">
				<div class="h2 col-xs-b5">Payment</div>
				<div class="title-underline center"><span></span></div>
				<div class="simple-article size-3 grey uppercase col-xs-b5">choose payment option below</div>
			</div>
			<div class="row payment-option-container">
					<div class="h5 payment-option <?php if(isset($_GET['card']) && $_GET['card'] == "visa"){echo "active";$card="VISA";}?>">
						<img src="img/Visa.png" style="position:relative;"><div class="text-center">Visa</div>
						<div class="entry selectedTick <?php if(isset($_GET['card']) && $_GET['card'] == "visa"){echo "active";}?>"><i class="fa fa-check color" ></i></div>
						<input hidden class="cardName" value="_Visa">
					</div>	
					<div class="h5 payment-option <?php if(isset($_GET['card']) && $_GET['card'] == "master"){echo "active";$card="MasterCard";}?>">
						<img src="img/MasterCard.png" style="position:relative;"><div class="text-center" id="paymentName">MasterCard</div>
						<div class="entry selectedTick <?php if(isset($_GET['card']) && $_GET['card'] == "master"){echo "active";}?>"><i class="fa fa-check color" ></i></div>
						<input hidden class="cardName" value="_MasterCard">
					</div>	
			</div>
			<input hidden type="text" name="firstName" value="<?=$_POST['firstName']?>">
			<input hidden type="text" name="lastName" value="<?=$_POST['lastName']?>">
			<input hidden type="text" name="email" value="<?=$_POST['email']?>">
			<input hidden type="text" name="email" value="<?=$_POST['email']?>">
			<input hidden type="text" name="unitAdr" value="<?=$_POST['unitAdr']?>">
			<input hidden type="text" name="streetAdr" value="<?=$_POST['streetAdr']?>">
			<input hidden type="text" name="towncityAdr" value="<?=$_POST['towncityAdr']?>">
			<input hidden type="text" name="stateAdr" value="<?=$_POST['stateAdr']?>">
			<input hidden type="text" name="postzipAdr" value="<?=$_POST['postzipAdr']?>">
			<input hidden type="text" name="countryAdr" value="<?=$_POST['countryAdr']?>">
			<input hidden type="text" name="note" value="<?=$_POST['note']?>">
			<input hidden type="text" name="delivery" value="<?=$_POST['delivery']?>">
			<input hidden type="text" class="paymethod" name="paymethod" value="<?php if(isset($_GET['card'])){if($_GET['card'] == "visa"){echo "Card_Credit_Visa";}else if($_GET['card'] == "master"){echo "Card_Credit_MasterCard";}}?>">
			<div class="empty-space col-xs-b20"></div>
			<div class="" style="display:flex;justify-content:center">
				<div class="col-md-6 col-xs-b50 col-md-b0">
					<div class="title-underline text-center"><span></span></div>
					<div class="empty-space col-xs-b20"></div>
					<h4 class="h4 col-xs-b25">Card Info</h4>
					<div class="empty-space col-xs-b20"></div>
					<input required name="cardHolderName" id="cardHolderName" class="simple-input" type="text" value="" placeholder="Cardholder's Name" />
					<div class="empty-space col-xs-b20"></div>
					<input required name="cardNumber" id="cardNumber" class="simple-input" type="text" value="" placeholder="Card Number [Ex: 0000111122223333]" maxlength="16"/>
                    <div class="empty-space col-xs-b20"></div>
					<div class="row m10">
                        <div class="col-sm-6">
							<input required name="expMonth" id="expMonth" class="simple-input" type="text" value="" placeholder="Exp Month [Ex: 01]" maxlength="2"/>
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                        <div class="col-sm-6">
                            <input required name="expYear" id="expYear" class="simple-input" type="text" value="" placeholder="Exp Year [Ex: 01]" maxlength="2"/>
                            <div class="empty-space col-xs-b20"></div>
                        </div>
                    </div>
					<input required name="cardCVC" id="cardCVC" class="simple-input" type="text" value="" placeholder="Card CVC Number [Ex: 001]" maxlength="3"/>
                    <div class="empty-space col-xs-b20"></div>
					<button class="button block size-2 style-3 noshadow placeOrderBtn" style="width:100%" type="submit" onclick="" value="placeOrder" name="placeOrder" id="placeOrder">
                        <span class="button-wrapper">
                            <span class="icon"><img src="img/icon-4.png" alt=""></span>
                            <span class="text">place order</span>
                        </span>
                    </button>
					<div class="empty-space col-xs-b50"></div>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
</body>
</html>

<script src="/fyp-project/js/jquery-2.2.4.min.js"></script>
<script src="/fyp-project/js/swiper.jquery.min.js"></script>
<script src="/fyp-project/js/global.js"></script>

<!-- styled select -->
<script src="/fyp-project/js/jquery.sumoselect.min.js"></script>

<!-- counter -->
<script src="/fyp-project/js/jquery.classycountdown.js"></script>
<script src="/fyp-project/js/jquery.knob.js"></script>
<script src="/fyp-project/js/jquery.throttle.js"></script>

<!-- range slider -->
    <script src="/fyp-project/js/jquery-ui.min.js"></script>
    <script src="/fyp-project/js/jquery.ui.touch-punch.min.js"></script>
    <script>
        $(document).ready(function(){
            var minVal = parseInt($('.min-price').text());
            var maxVal = parseInt($('.max-price').text());
            $( "#prices-range" ).slider({
                range: true,
                min: minVal,
                max: maxVal,
                step: 5,
                values: [ minVal, maxVal ],
                slide: function( event, ui ) {
                    $('.min-price').text(ui.values[ 0 ]);
                    $('.max-price').text(ui.values[ 1 ]);
                }
            });
        });
    </script>
	
<!-- CONTACT -->
<script src="/fyp-project/js/contact.form.js"></script>

<script type="text/javascript">
$(document).on('click', '.payment-option', function(){
	if ( !($(this).hasClass('active')) ) {
		$('.selectedTick').hide();
		$('.payment-option').removeClass('active');
		$(this).addClass('active');
		$(this).find('.selectedTick').fadeIn({ top: "-=30px", }, 300 );
		$('.paymethod').val("Card_Credit"+ $(this).find('.cardName').val());
	}
	return false;
});

$(document).on('keyup', '#cardHolderName', function(){
    var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
	if(format.test($(this).val())){
		alert("Please do not use special characters.");
		a = 1;
	}
});
$(document).on('keyup', '#cardNumber', function(){
    if(isNaN($(this).val())) 
	alert("Please input a valid card number. Format is 16 numbers");
	//change to alerts
});

$(document).on('keyup', '#expMonth, #expYear', function(){
    if(isNaN($(this).val())) 
		alert("Please input a valid month. Format is 2 numbers");
	
	if($('#expMonth').val() > 12 || $('#expMonth').val() < 1)
		alert("Please input a valid month. [1-12]");
	
	//change to alerts
});
$(document).on('keyup', '#cardCVC', function(){
    if(isNaN($(this).val())) 
	alert("Please input a valid CVC number. Format is 3 numbers");
	//change to alerts
});
</script>
<?php
}
else
{
	echo "<script> location.assign('cart.php');</script>";
}
?>