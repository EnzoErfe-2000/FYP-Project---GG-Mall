<div class="popup-wrapper">
    <div class="bg-layer"></div>
        <div class="popup-content" data-rel="1">
			<div class="layer-close"></div>
			<div class="popup-container size-1">
				<div class="popup-align">
					<form action = "/fyp-project/include/login-inc.php" method="post">
						<h3 class="h3 text-center">Log in</h3>
						<div class="empty-space col-xs-b30"></div>
						<input class="simple-input" type="email" value="" placeholder="Your email" name="login_email" id="login_email" required />
						<div class="empty-space col-xs-b10 col-sm-b20">
							<span class="simple-article size-2" id="errEmail" style="color:red; margin-left: 30px;">&nbsp;</span>
						</div>
						<input class="simple-input" type="password" value="" placeholder="Enter password" name="login_password" id="login_password" required />
						<div class="empty-space col-xs-b10 col-sm-b20">
							<span class="simple-article size-2" id="errPwd" style="color:red; margin-left: 30px;">&nbsp;</span>
						</div>
						<div class="row">
							<div class="col-sm-6 col-xs-b10 col-sm-b0">
								<div class="empty-space col-sm-b5"></div>
								<a href="pw_reset.php" class="simple-link">Forgot password?</a>
								<div class="empty-space col-xs-b5"></div>
								<a class="simple-link switchModal">register now</a>
							</div>
							<div class="col-sm-6 text-right">
								<button class="button noshadow size-2 style-3" type="submit" name="login_submit" id="login_submit" class="login_submit" style="border:none" onclick="validate">
									<span class="button-wrapper">
										<span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
										<span class="text">submit</span>
									</span>
								</button>  
							</div>
						</div>
					</form>
					<div class="popup-or">
						<span>or</span>
					</div>
					<div class="row m5">
					<div class="col-sm-12 col-xs-b10 col-sm-b0">
						<a class="button twitter-button size-2 style-4 block" href="admin/login.php">
							<span class="button-wrapper">
								<span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
								<span class="text">Admin</span>
							</span>
						</a>
					</div>
					</div>
				</div>
            <div class="button-close"></div>
			</div>
		</div>

        <div class="popup-content" data-rel="2">
            <div class="layer-close"></div>
            <div class="popup-container size-1">
                <div class="popup-align">
                    <form 
                    action="/fyp-project/include/register-inc.php" 
                    method="post"
                    style="text-align: left">
					
					<?php $email = $username = $password = $confirm_password = "";?>
                    <h3 class="h3 text-center">register</h3>
                    <div class="empty-space col-xs-b30"></div>
                    <input type="text" placeholder="Your name" name="username" class="simple-input" value="<?php echo $username; ?>" required />
                    
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <input type="email" placeholder="Your email" name="email" class="simple-input" value="<?php echo $email; ?>" required />
                    
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <input type="password" placeholder="Enter password" name="password" class="simple-input <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" onkeyup="validatepassword(this.value);" value="<?php echo $password; ?>" required/>
                    <span class="invalid-feedback d-block" id="msg"><?php echo $password_err; ?></span>

                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <input type="password" placeholder="Repeat password" name="confirm_password" class="simple-input" value="<?php echo $confirm_password; ?>" required />
                    
                    <div class="empty-space col-xs-b10 col-sm-b20"></div>
                    <div class="row">
                        <div class="col-sm-5 text-right">
                            <button class="button noshadow size-2 style-3" type="submit" name="submit" id="submit" class="submit" style="border:none; margin-right:30px;" onclick="validate">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                    <span class="text">submit</span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="popup-or">
                        <span>or</span>
                    </div>
                    <div class="row m5">
                        <div class="col-sm-4 col-xs-b10 col-sm-b0">
                            <a class="button facebook-button size-2 style-4 block" href="#">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                    <span class="text">facebook</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-4 col-xs-b10 col-sm-b0">
                            <a class="button twitter-button size-2 style-4 block" href="#">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                    <span class="text">twitter</span>
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a class="button google-button size-2 style-4 block" href="#">
                                <span class="button-wrapper">
                                    <span class="icon"><img src="/fyp-project/img/icon-4.png" alt="" /></span>
                                    <span class="text">google+</span>
                                </span>
                            </a>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="button-close"></div>
            </div>
        </div>

        <div class="popup-content" data-rel="3">
            <div class="layer-close"></div>
            <div class="popup-container size-2">
                <div class="popup-align">
                    <div class="row">
                        <div class="col-sm-6 col-xs-b30 col-sm-b0">
                            
                            <div class="main-product-slider-wrapper swipers-couple-wrapper">
                                <div class="swiper-container swiper-control-top">
                                   <div class="swiper-button-prev hidden"></div>
                                   <div class="swiper-button-next hidden"></div>
                                   <div class="swiper-wrapper">
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="/fyp-project/img/product-preview-4.jpg"></div>
                                       </div>
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="/fyp-project/img/product-preview-5.jpg"></div>
                                       </div>
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="/fyp-project/img/product-preview-6.jpg"></div>
                                       </div>
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="/fyp-project/img/product-preview-7.jpg"></div>
                                       </div>
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="/fyp-project/img/product-preview-8.jpg"></div>
                                       </div>
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="/fyp-project/img/product-preview-9.jpg"></div>
                                       </div>
                                       <div class="swiper-slide">
                                            <div class="swiper-lazy-preloader"></div>
                                            <div class="product-big-preview-entry swiper-lazy" data-background="/fyp-project/img/product-preview-10.jpg"></div>
                                       </div>
                                   </div>
                                </div>

                                <div class="empty-space col-xs-b30 col-sm-b60"></div>

                                <div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="5" data-slides-per-view="5" data-center="1" data-click="1">
                                   <div class="swiper-button-prev hidden"></div>
                                   <div class="swiper-button-next hidden"></div>
                                   <div class="swiper-wrapper">
                                       <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="/fyp-project/img/product-preview-4_.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="/fyp-project/img/product-preview-5_.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="/fyp-project/img/product-preview-6_.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="/fyp-project/img/product-preview-7_.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="/fyp-project/img/product-preview-8_.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="/fyp-project/img/product-preview-9_.jpg" alt="" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="product-small-preview-entry">
                                                <img src="/fyp-project/img/product-preview-10_.jpg" alt="" />
                                            </div>
                                       </div>

                                   </div>
                                </div>
                            </div>

                        </div>
                      
                    </div>
                </div>
                <div class="button-close"></div>
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
	<script>
	// This function gets called once the user submits the form
	function addToCartFunction(){

		// Get the value from the span
		quantityValue = $('.number').html();
		prodIdValue = $('.prodID').html();

		// Store the values in hidden entry elements
		$("#product_quantity").val(quantityValue);
		$("#product_id").val(prodIdValue);

		// Submit form using ID "add-to-cart-form"
		$("#add-to-cart-form").action = "/fyp-project/cart.php";
		$("#add-to-cart-form").submit();
	}
	
	$(document).on('click', '.switchModal', function(e){
		e.preventDefault();
		$('.popup-content').removeClass('active');
		$('.popup-wrapper, .popup-content[data-rel="2"]').addClass('active');
		$('html').addClass('overflow-hidden');
		return false;
	});
	</script>
    <script>
        function validatepassword(password) {
        // Do not show anything when the length of password is zero.
        if (password.length === 0) {
            document.getElementById("msg").innerHTML = "";
            return;
        }
        // Create an array and push all possible values that you want in password
        var matchedCase = new Array();
        matchedCase.push("[$@$!%*#?&]"); // Special Charector
        matchedCase.push("[A-Z]"); // Uppercase Alpabates
        matchedCase.push("[0-9]"); // Numbers
        matchedCase.push("[a-z]"); // Lowercase Alphabates

        // Check the conditions
        var ctr = 0;
        for (var i = 0; i < matchedCase.length; i++) {
            if (new RegExp(matchedCase[i]).test(password)) {
                ctr++;
            }
        }
        // Display it
        var color = "";
        var strength = "";
        switch (ctr) {
            case 0:
            case 1:
            case 2:
                strength = "Very Weak";
                color = "red";
                break;
            case 3:
                strength = "Medium";
                color = "orange";
                break;
            case 4:
                strength = "Strong";
                color = "green";
                break;
        }
        document.getElementById("msg").innerHTML = strength;
        document.getElementById("msg").style.color = color;
    }
    </script>
	
<!-- MAP -->
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="/fyp-project/js/map.js"></script>

<!-- CONTACT -->
<script src="/fyp-project/js/contact.form.js"></script>
