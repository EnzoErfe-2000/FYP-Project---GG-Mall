<?php
include_once 'include/session-db-func.php';	
include_once 'include/header.php';

$sql = "
SELECT * FROM product;
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
$products = mysqli_stmt_get_result($stmt);

$productsArray = array();
while ($productsRow = mysqli_fetch_assoc($products))
{
  $productsArray[] = $productsRow; // add the row in to the results (data) array
}
?>
        <div class="header-empty-space"></div>

        <div class="slider-wrapper">
            <div class="swiper-button-prev visible-lg"></div>
            <div class="swiper-button-next visible-lg"></div>
            <div class="swiper-container" data-parallax="1" data-auto-height="1">
               <div class="swiper-wrapper">
                   <div class="swiper-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="cell-view page-height">
                                        <div class="col-xs-b40 col-sm-b80"></div>
                                        <div data-swiper-parallax-x="-600">
                                            <div class="simple-article grey size-5">BEST PRICE <span class="color">RM<?=number_format($productsArray[23]['product_listedPrice'], 2)?></span></div>
                                            <div class="col-xs-b5"></div>
                                        </div>
                                        <div data-swiper-parallax-x="-500">
                                            <h1 class="h1"><?=$productsArray[23]['product_name']?></h1>
                                            <div class="title-underline left"><span></span></div>
                                        </div>
                                        <div data-swiper-parallax-x="-400">
                                            <div class="simple-article size-4 grey">Explore and enjoy a new level of gaming with the powerful Nitro 5. The solid, understated design houses a lightning-quick 144Hz FHD IPS display and a lineup of impressive tech to enhance every aspect of gameplay.</div>
                                            <div class="col-xs-b30"></div>
                                        </div>
                                        <div data-swiper-parallax-x="-300">
                                            <div class="buttons-wrapper">
                                                <a class="button size-2 style-2" href="/fyp-project/product.php?product=10023">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                        <span class="text">Learn More</span>
                                                    </span>
                                                </a>
                                                <!--
												<a class="button size-2 style-3" href="#">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                                        <span class="text">Add To Cart</span>
                                                    </span>
                                                </a>
												-->
                                            </div>
                                        </div>
                                        <div class="col-xs-b40 col-sm-b80"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-product-preview">
                                <div class="product-preview-shortcode">
                                    <div class="preview">
                                        <div class="swiper-lazy-preloader"></div>
                                        <div class="entry full-size swiper-lazy active" data-background="/fyp-project/product_img/AcerNitro5_01.png"></div>
                                        <div class="entry full-size swiper-lazy" data-background="/fyp-project/product_img/AcerNitro5_02.png"></div>
                                        <div class="entry full-size swiper-lazy" data-background="/fyp-project/product_img/AcerNitro5_03.png"></div>
                                    </div>
                                    <div class="sidebar valign-middle" data-swiper-parallax-x="-300">
                                        <div class="valign-middle-content">
                                            <div class="entry active"><img src="/fyp-project/product_img/AcerNitro5_01~1.png" alt="" /></div>
                                            <div class="entry"><img src="/fyp-project/product_img/AcerNitro5_02~1.png" alt="" /></div>
                                            <div class="entry"><img src="/fyp-project/product_img/AcerNitro5_03~1.png" alt="" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="empty-space col-xs-b80 col-sm-b0"></div>
                        </div>
                   </div>
                   <div class="swiper-slide">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="cell-view page-height">
                                        <div class="col-xs-b40 col-sm-b80"></div>
                                        <div data-swiper-parallax-x="-600">
                                            <div class="simple-article grey size-5">BEST PRICE <span class="color">RM<?=number_format($productsArray[18]['product_listedPrice'], 2)?></span></div>
                                            <div class="col-xs-b5"></div>
                                        </div>
                                        <div data-swiper-parallax-x="-500">
                                            <h1 class="h1"><?=$productsArray[18]['product_name']?></h1>
                                            <div class="title-underline left"><span></span></div>
                                        </div>
                                        <div data-swiper-parallax-x="-400">
                                            <div class="simple-article size-4 grey">Bring your vivid imagination to life with this 15.6-inch MSI Modern laptop. The 512GB SSD provides high-performance storage, while the Intel Core i7 processor and 16GB of RAM support advanced content creation.</div>
                                            <div class="col-xs-b30"></div>
                                        </div>
                                        <div data-swiper-parallax-x="-300">
                                            <div class="buttons-wrapper">
                                                <a class="button size-2 style-2" href="/fyp-project/product.php?product=10018">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                        <span class="text">Learn More</span>
                                                    </span>
                                                </a>
                                                <!--
												<a class="button size-2 style-3" href="#">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                                        <span class="text">Add To Cart</span>
                                                    </span>
                                                </a>
												-->
                                            </div>
                                        </div>
                                        <div class="col-xs-b40 col-sm-b80"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-product-preview">
                                <div class="product-preview-shortcode">
                                    <div class="preview">
                                        <div class="swiper-lazy-preloader"></div>
                                        <div class="entry full-size swiper-lazy active" data-background="/fyp-project/product_img/MSIModern15_01.png"></div>
                                        <div class="entry full-size swiper-lazy" data-background="/fyp-project/product_img/MSIModern15_02.png"></div>
                                        <div class="entry full-size swiper-lazy" data-background="/fyp-project/product_img/MSIModern15_03.png"></div>
                                    </div>
                                    <div class="sidebar valign-middle" data-swiper-parallax-x="-300">
                                        <div class="valign-middle-content">
                                            <div class="entry active"><img src="/fyp-project/product_img/MSIModern15_01~1.png" alt="" /></div>
                                            <div class="entry"><img src="/fyp-project/product_img/MSIModern15_02~1.png" alt="" /></div>
                                            <div class="entry"><img src="/fyp-project/product_img/MSIModern15_03~1.png" alt="" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="empty-space col-xs-b80 col-sm-b0"></div>
                        </div>
                   </div>
               </div>
               <div class="swiper-pagination"></div>
            </div>
        </div>

        <div class="grey-background">
            <div class="empty-space col-xs-b40 col-sm-b80"></div>
            <div class="container">
                <div class="row">
				
                    <div class="col-md-9 col-md-push-3">
                        <div class="tabs-block">
                            <div class="tabulation-menu-wrapper text-center">
                                <div class="tabulation-title simple-input">all</div>
                            </div>
							<div class="align-inline spacing-1">
								<div class="h4">BEST RECOMMENDED</div>
							</div>
                            <div class="tab-entry visible">
                                <div class="products-content">
									<div class="products-wrapper">
										<div class="row nopadding">
                                
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[1]['product_category0']?> <?=$productsArray[1]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[1]['product_id']?>"><?=$productsArray[1]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[1]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[1]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[1]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">Best mic in gaming: the Discord-certified Clearcast bidirectional microphone</div>
														
													</div>
												</div>  
											</div>
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[2]['product_category0']?> <?=$productsArray[2]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[2]['product_id']?>"><?=$productsArray[2]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[2]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[2]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[2]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">Advanced Passive Noise Cancellation</div>
														
													</div>
												</div>  
											</div>
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[3]['product_category0']?> <?=$productsArray[3]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[3]['product_id']?>"><?=$productsArray[3]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[3]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[3]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[3]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">Kitty ears and earcups powered by Razer Chroma RGB</div>
														
													</div>
												</div>  
											</div>
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[4]['product_category0']?> <?=$productsArray[4]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[4]['product_id']?>"><?=$productsArray[4]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[4]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[4]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[4]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">Customizable 10-zone RGB illumination reacts to games and Discord</div>
														
													</div>
												</div>  
											</div>
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[9]['product_category0']?> <?=$productsArray[9]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[9]['product_id']?>"><?=$productsArray[9]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[9]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[9]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[9]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">PTFE glide skates for silky smooth mouse movements</div>
														
													</div>
												</div>  
											</div>
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[21]['product_category0']?> <?=$productsArray[21]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[21]['product_id']?>"><?=$productsArray[21]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[21]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[21]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[21]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">i5-10500H Processor with Graphic card of GTX 1650</div>
														
													</div>
												</div>  
											</div>
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[23]['product_category0']?> <?=$productsArray[23]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[23]['product_id']?>"><?=$productsArray[23]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[23]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[23]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[23]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">15.6" 144Hz Slim Bezel FHD IPS Display with Ryzen7-5800H processor</div>
														
													</div>
												</div>  
											</div>
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[11]['product_category0']?> <?=$productsArray[11]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[11]['product_id']?>"><?=$productsArray[11]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[11]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[11]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[11]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">Top mouse for productivity and creative tasks</div>
														
													</div>
												</div>  
											</div>
											<div class="col-sm-4">
												<div class="product-shortcode style-1">
													<div class="title">
														<div class="simple-article size-1 color col-xs-b5"><a href="#"><?=$productsArray[14]['product_category0']?> <?=$productsArray[14]['product_category1']?></a></div>
														<div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[14]['product_id']?>"><?=$productsArray[14]['product_name']?></a></div>
													</div>
													<div class="preview">
														<img src="product_img/<?=$productsArray[14]['product_img']?>" alt="">
														<div class="preview-buttons valign-middle">
															<div class="valign-middle-content">
																<a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[14]['product_id']?>">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-1.png" alt=""></span>
																		<span class="text">Learn More</span>
																	</span>
																</a>
																<!--
																<a class="button size-2 style-3" href="#">
																	<span class="button-wrapper">
																		<span class="icon"><img src="img/icon-3.png" alt=""></span>
																		<span class="text">Add To Cart</span>
																	</span>
																</a>
																-->
															</div>
														</div>
													</div>
													<div class="price">
														<div class="simple-article size-4 dark">RM<?=number_format($productsArray[14]['product_listedPrice'], 2)?></div>
													</div>
													<div class="description">
														<div class="simple-article text size-2">Slim, modern design at an exceptional value</div>
														
													</div>
												</div>  
										   </div>
										</div>
									</div>
								</div>
							</div>
                            <div class="tab-entry">
                                <div class="row nopadding">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container arrows-align-top" data-breakpoints="1" data-xs-slides="1" data-sm-slides="2" data-md-slides="2" data-lt-slides="2" data-slides-per-view="2">
                            <div class="h4 swiper-title">hot proposes</div>
                            <div class="empty-space col-xs-b20"></div>
                            <div class="swiper-button-prev style-1"></div>
                            <div class="swiper-button-next style-1"></div>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="product-shortcode style-3">
                                        <div class="simple-article size-5 grey col-xs-b20">BEST PRICE: <span class="color">RM<?=number_format($productsArray[11]['product_listedPrice'], 2)?></span></div>
                                        <div class="products-line col-xs-b25">
                                            <div class="line col-xs-b10"><div class="fill" style="width: 55%;"></div></div>
                                            <div class="row">
                                                <div class="col-xs-6 text-left">
                                                    <div class="simple-article size-1">AVAILABLE: <span class="grey"><?=$productsArray[11]['product_stock']?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-container" data-loop="1" data-touch="0">
                                            <div class="swiper-button-prev style-1"></div>
                                            <div class="swiper-button-next style-1"></div>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <img src="/fyp-project/product_img/<?=$productsArray[11]['product_bigSwiperImg']?>" alt="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="empty-space col-xs-b20"></div>
                                        <div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[11]['product_id']?>"><?=$productsArray[11]['product_name']?></a></div>
                                        <div class="empty-space col-xs-b10"></div>
                                        <div class="description">
                                            <div class="simple-article size-2">Get work done anywhere with this small portable mouse. </div>
                                        </div>
                                        <div class="empty-space col-xs-b20"></div>
                                        <div class="countdown-wrapper">
                                            <div class="countdown" data-end="Dec,31,2021"></div>
                                        </div>
                                        <div class="preview-buttons">
                                            <div class="buttons-wrapper">
                                                <a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[11]['product_id']?>">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                        <span class="text">Learn More</span>
                                                    </span>
                                                </a>
												<!--
                                                <a class="button size-2 style-3" href="#">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                                        <span class="text">Add To Cart</span>
                                                    </span>
                                                </a>
												-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="product-shortcode style-3">
                                        <div class="simple-article size-5 grey col-xs-b20">BEST PRICE: <span class="color">RM<?=number_format($productsArray[1]['product_listedPrice'], 2)?></span></div>
                                        <div class="products-line col-xs-b25">
                                            <div class="line col-xs-b10"><div class="fill" style="width: 55%;"></div></div>
                                            <div class="row">
                                                <div class="col-xs-6 text-left">
                                                    <div class="simple-article size-1">AVAILABLE: <span class="grey"><?=$productsArray[1]['product_stock']?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-container" data-loop="1" data-touch="0">
                                            <div class="swiper-button-prev style-1"></div>
                                            <div class="swiper-button-next style-1"></div>
                                            <div class="swiper-wrapper">
                                                <?php
													$bigSwiperImgs = explode(" ", $productsArray[1]['product_bigSwiperImg']);
													//print_r($bigSwiperImgs);
													for($i = 0; $i < count($bigSwiperImgs); $i++)
													{
														echo "<div class='swiper-slide'>
																<img src='./admin/product_img/" . $bigSwiperImgs[$i] . "' alt='' />
															</div>";
													}
												?>
                                            </div>
                                        </div>
                                        <div class="empty-space col-xs-b20"></div>
                                        <div class="h6 animate-to-green"><a href="/fyp-project/product.php?product=<?=$productsArray[1]['product_id']?>"><?=$productsArray[1]['product_name']?></a></div>
                                        <div class="empty-space col-xs-b10"></div>
                                        <div class="description">
                                            <div class="simple-article size-2">Best mic in gaming: the Discord-certified Clearcast bidirectional microphone</div>
                                        </div>
                                        <div class="empty-space col-xs-b20"></div>
                                        <div class="countdown-wrapper">
                                            <div class="countdown" data-end="Dec,20,2021"></div>
                                        </div>
                                        <div class="preview-buttons">
                                            <div class="buttons-wrapper">
                                                <a class="button size-2 style-2" href="/fyp-project/product.php?product=<?=$productsArray[1]['product_id']?>">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-1.png" alt=""></span>
                                                        <span class="text">Learn More</span>
                                                    </span>
                                                </a>
                                                <!--
                                                <a class="button size-2 style-3" href="#">
                                                    <span class="button-wrapper">
                                                        <span class="icon"><img src="img/icon-3.png" alt=""></span>
                                                        <span class="text">Add To Cart</span>
                                                    </span>
                                                </a>
												-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
							</div>
                            <div class="swiper-pagination relative-pagination visible-xs"></div>
                        </div>

                        <div class="empty-space col-xs-b35 col-md-b70"></div>

                    </div>

                    <div class="col-md-3 col-md-pull-9">
						<div class="row">
							<div class="h4 col-xs-b10">popular categories</div>
							<ul class="categories-menu transparent">
								<?php
								$sql = "
								SELECT category_name FROM category
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
															//print_r($data['product_name']);
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
        </div>
     
<?php
include_once 'include/footer.php';
?>
<?php
include_once 'include/header_popup.php';
?>
