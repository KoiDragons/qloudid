<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Fleet</title>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $path; ?>/html/fleet/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $path; ?>/html/fleet/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $path; ?>/html/fleet/img/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $path; ?>/html/fleet/img/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $path; ?>/html/fleet/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta name="description" content="Epic Travel Shopping Design Kit">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ui8">
    <meta name="twitter:title" content="Fleet – Travel Shopping UI Kit">
    <meta name="twitter:description" content="Epic Travel Shopping Design Kit">
    <meta name="twitter:creator" content="@ui8">
    <meta name="twitter:image" content="https://ui8-fleet-html.herokuapp.com/<?php echo $path; ?>/html/fleet/img/twitter-card.jpg">
    <meta property="og:title" content="Fleet – Travel Shopping UI Kit">
    <meta property="og:type" content="Article">
    <meta property="og:url" content="https://ui8.net/ui8/products/fleet--travel-shopping-ui-design-kit">
    <meta property="og:image" content="https://ui8-fleet-html.herokuapp.com/<?php echo $path; ?>/html/fleet/img/fb-og-image.jpg">
    <meta property="og:description" content="Epic Travel Shopping Design Kit">
    <meta property="og:site_name" content="Fleet – Travel Shopping UI Kit">
    <meta property="fb:admins" content="132951670226590">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@700&amp;family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" media="all" href="<?php echo $path; ?>/html/fleet/css/app.min.css">
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
    <script>
      var viewportmeta = document.querySelector('meta[name="viewport"]');
      if (viewportmeta) {
        if (screen.width < 375) {
          var newScale = screen.width / 375;
          viewportmeta.content = 'width=375, minimum-scale=' + newScale + ', maximum-scale=1.0, user-scalable=no, initial-scale=' + newScale + '';
        } else {
          viewportmeta.content = 'width=device-width, maximum-scale=1.0, initial-scale=1.0';
        }
      }
	  
     $(document).ready(function () {
            if (window.IsDuplicate()) {
                swal ( "Oops" ,  "This is duplicate window\n\n Closing..." ,  "error" );
                window.close();
            }
        });
     
function checkPopup()
{
var newWin = window.open('','_blank');             

if(!newWin || newWin.closed || typeof newWin.closed=='undefined') 
{ 
    alert('please allow popups before continue');
}
else
{
	newWin.close();
}
}
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

 
		 
		var timeout=0;
			var a;
			const timeInterval=1000;
			const tout=90;
			var send_data1={};
			
			function checkLogin()
			{
				//checkPopup();
				send_data1.orderRef='<?php echo $verifyIP; ?>';
				a = setInterval(ajaxSend, timeInterval);
				
				var userAgent = window.navigator.userAgent.toLowerCase(),
    safari = /safari/.test( userAgent ),
    ios = /iphone|ipod|ipad/.test( userAgent );

				if( ios ) {
					$('#iOS').removeClass('hidden');
				} else {
				   $('#android').removeClass('hidden');
				}
			}
			
		function ajaxSend()
			{ 
			
			send_data1.loginType=1;
				$.ajax({
					type:"POST",
					url:"../../user/index.php/QloudidApp/checkOrderReference",
					data:send_data1,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data2){
						//alert(send_data1.orderRef);
						if(data2!=2)
						{
							
							if(data2==0)
							{
								$('#loginBank').removeClass('hidden');
								$("#loginBankMsg").attr('style','display:none');
								return false;
							}
							else if(data2==1)
							{
								$('#loginBank').addClass('hidden');
								$("#loginBankMsg").attr('style','display:block');
								$("#errorMsg").html("Type in your security code in the Qloud ID app..");
								return false;
							}
							 else if(data2==3)
							{
								 
								$("#errorMsg").html("Wrong password.Please get back and enter correct password.");
								return false;
							}
							
							
							 
						}
						else 
						{
							window.location.href="https://www.qloudid.com/demo/index.php/DemoSign/thanks";
						}
						
					}
				});
				
			}
			
			function goVisitSite(Site)
{
NewWindow1 = window.open(Site,
"viewwin",
"toolbar=0,menubar=0,width=900,height=280,top=0,left=0,scrollbars=1,resizable=yes" ,"_blank");
}
			 
			
		</script>
	
  </head>
  <body onload="checkLogin();">
    <script>
      console.log(localStorage.getItem('darkMode'));
      if (localStorage.getItem('darkMode') === "on") {
        document.body.classList.add("dark");
        document.addEventListener("DOMContentLoaded", function() {
          document.querySelector('.js-theme input').checked = true;
        });
      }
    </script>
    <!-- outer-->
    <div class="outer">
      <!-- header-->
	  <div class="column_m header xs-hei_55p  bs_bb black_bg visible-xs xs-pad0" style="margin:0 0 20px 0;">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 black_bg ">
               
					
				<div class="top_menu talc    wi_100 "  >
				<ul class="menulist sf-menu  fsz20 wi_100 sf-js-enabled sf-arrows dflex">
					<li class="padr10 first last wi_100 talc">
						<a href="https://www.qloudid.com/public/index.php/Eshop/itemInformation/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09"><span class="white_txt pred_txt_h ffamily_avenir">Payment</span></a>
					</li>
				 	 <li class="padr10 first last wi_100 talc">
						<a href="https://www.qloudid.com/user/index.php/LoginAccount/loginapp"><span class="white_txt pred_txt_h ffamily_avenir">Login</span></a>
					</li>
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="white_txt pred_txt_h ffamily_avenir">Sign</span></a>
					</li>
       			 	</ul>
			</div> 
			<div class="hidden fright marr0 padt2 "> <a href="#" class="diblock padr10 brdrad3 fsz30 white_txt padt5"><i class="fas fa-search" aria-hidden="true"></i></a> </div>		
                <div class="clear"></div>

            </div>
        </div>
	  <div class="column_m hei_45p header xs-header bs_bb red_ff2828_bg  hidden-xs">
		<div class="wi_100 hei_45p   padrl10 red_ff2828_bg">
			
			<div class="  fleft padrl0 hidden">
							<div class="flag_top_menu flefti padb10 wi_50p padt5">
							<ul class="menulist sf-menu fsz14">
								 
								<li class="first last" style="margin: 0 15px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz15 sf-with-ul"><i class="fab fa-airbnb white_txt fsz30 padb0" aria-hidden="true"></i></a>
								</li>
								
								 
								 
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="header__wrapper js-header-wrapper" style="border:none;">
            <div class="header__item header__item_dropdown js-header-item">
              
              <div class="header__body js-header-body">
                <div class="header__menu"><a class="header__link active" href="#">
                    <svg class="icon icon-comment">
                      <use xlink:href="#icon-comment"></use>
                    </svg>Stays</a><a class="header__link" href="#">
                    <svg class="icon icon-email">
                      <use xlink:href="#icon-email"></use>
                    </svg>Flights</a><a class="header__link" href="#">
                    <svg class="icon icon-home">
                      <use xlink:href="#icon-home"></use>
                    </svg>Things to do</a><a class="header__link" href="#">
                    <svg class="icon icon-email">
                      <use xlink:href="#icon-email"></use>
                    </svg>Cars</a></div>
              </div>
            </div>
			
			<a class="header__item" href="https://www.qloudid.com/public/index.php/Eshop/itemInformation/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09">Payment</a>
            <div class="header__item header__item_language js-header-item">
             <a  href="https://www.qloudid.com/user/index.php/LoginAccount/loginapp"> <button class="header__head js-header-head">
                <svg class="icon icon-globe">
                  <use xlink:href="#icon-globe"></use>
                </svg>Login
              </button></a>
              <div class="header__body js-header-body">
                <div class="header__list"><a class="header__box active" href="#">
                    <div class="header__category">English</div>
                    <div class="header__country">United States</div></a><a class="header__box" href="#">
                    <div class="header__category">Vietnamese</div>
                    <div class="header__country">Vietnamese</div></a><a class="header__box" href="#">
                    <div class="header__category">Français</div>
                    <div class="header__country">Belgique</div></a><a class="header__box" href="#">
                    <div class="header__category">Français</div>
                    <div class="header__country">Canada</div></a></div>
              </div>
            </div><a class="button button-stroke button-small header__button" href="#">Sign contract</a>
          </div>
			
			  <div class="clear"></div>
		</div>
	</div>
      <header class="header js-header header_border xs-pad0"  >
        <div class="header__center center"><a class="header__logo" href="#"><img class="some-icon" src="<?php echo $path; ?>/html/fleet/img/logo-dark.svg" alt="Fleet"><img class="some-icon-dark" src="<?php echo $path; ?>/html/fleet/img/logo-light.svg" alt="Fleet"></a>
          <div class="header__wrapper js-header-wrapper">
            <div class="header__item header__item_dropdown js-header-item">
              <button class="header__head js-header-head">Travelers
                <svg class="icon icon-arrow-down">
                  <use xlink:href="#icon-arrow-down"></use>
                </svg>
              </button>
              <div class="header__body js-header-body">
                <div class="header__menu"><a class="header__link active" href="#">
                    <svg class="icon icon-comment">
                      <use xlink:href="#icon-comment"></use>
                    </svg>Stays</a><a class="header__link" href="#">
                    <svg class="icon icon-email">
                      <use xlink:href="#icon-email"></use>
                    </svg>Flights</a><a class="header__link" href="#">
                    <svg class="icon icon-home">
                      <use xlink:href="#icon-home"></use>
                    </svg>Things to do</a><a class="header__link" href="#">
                    <svg class="icon icon-email">
                      <use xlink:href="#icon-email"></use>
                    </svg>Cars</a></div>
              </div>
            </div><a class="header__item" href="#">Support</a>
            <div class="header__item header__item_language js-header-item">
              <button class="header__head js-header-head">
                <svg class="icon icon-globe">
                  <use xlink:href="#icon-globe"></use>
                </svg>Language
              </button>
              <div class="header__body js-header-body">
                <div class="header__list"><a class="header__box active" href="#">
                    <div class="header__category">English</div>
                    <div class="header__country">United States</div></a><a class="header__box" href="#">
                    <div class="header__category">Vietnamese</div>
                    <div class="header__country">Vietnamese</div></a><a class="header__box" href="#">
                    <div class="header__category">Français</div>
                    <div class="header__country">Belgique</div></a><a class="header__box" href="#">
                    <div class="header__category">Français</div>
                    <div class="header__country">Canada</div></a></div>
              </div>
            </div><a class="button button-stroke button-small header__button" href="#">List your property</a>
          </div>
          <div class="header__item header__item_notification js-header-item hidden-xs">
            <button class="header__head js-header-head active">
              <svg class="icon icon-notification">
                <use xlink:href="#icon-notification"></use>
              </svg>
            </button>
            <div class="header__body js-header-body">
              <div class="header__title">Notification</div>
              <div class="header__notifications"><a class="header__notification" href="#">
                  <div class="header__avatar"><img src="<?php echo $path; ?>/html/fleet/img/content/avatar-1.jpg" alt="Avatar"></div>
                  <div class="header__details">
                    <div class="header__subtitle">Kohaku Tora</div>
                    <div class="header__content">just sent you a message</div>
                    <div class="header__date">1 minute ago</div>
                    <div class="header__status" style="background-color: #3B71FE;"></div>
                  </div></a><a class="header__notification" href="#">
                  <div class="header__avatar"><img src="<?php echo $path; ?>/html/fleet/img/content/avatar-1.jpg" alt="Avatar"></div>
                  <div class="header__details">
                    <div class="header__subtitle">Kohaku Tora</div>
                    <div class="header__content">just sent you a message</div>
                    <div class="header__date">3 hours ago</div>
                    <div class="header__status" style="background-color: #3B71FE;"></div>
                  </div></a></div>
            </div>
          </div><a class="header__login js-popup-open" href="#popup-login" data-effect="mfp-zoom-in">
            <svg class="icon icon-user">
              <use xlink:href="#icon-user"></use>
            </svg></a>
          <div class="header__item header__item_user js-header-item hidden-xs">
            <button class="header__head js-header-head"><img src="<?php echo $path; ?>/html/fleet/img/content/avatar-2.jpg" alt="Avatar"></button>
            <div class="header__body js-header-body">
              <div class="header__group">
                <div class="header__menu"><a class="header__link" href="#">
                    <svg class="icon icon-comment">
                      <use xlink:href="#icon-comment"></use>
                    </svg>Messages</a><a class="header__link" href="#">
                    <svg class="icon icon-home">
                      <use xlink:href="#icon-home"></use>
                    </svg>Bookings</a><a class="header__link" href="#">
                    <svg class="icon icon-email">
                      <use xlink:href="#icon-email"></use>
                    </svg>Wishlists</a></div>
                <div class="header__menu"><a class="header__link" href="#">
                    <svg class="icon icon-building">
                      <use xlink:href="#icon-building"></use>
                    </svg>List your property</a><a class="header__link" href="#">
                    <svg class="icon icon-flag">
                      <use xlink:href="#icon-flag"></use>
                    </svg>Host an experience</a></div>
              </div>
              <div class="header__btns"><a class="button button-small header__button" href="#">Account</a>
                <button class="button-stroke button-small header__button">Log out</button>
              </div>
            </div>
          </div>
          <button class="header__burger js-header-burger hidden-xs"></button>
        </div>
      </header>
      <!-- outer content-->
      <div class="outer__inner">
        <div class="section-mb80 checkout checkout_stays">
          <div class="checkout__center center">
            <div class="control"><a class="button-stroke button-small control__button hidden-xs" href="#">
                <svg class="icon icon-arrow-left">
                  <use xlink:href="#icon-arrow-left"></use>
                </svg><span>Go home</span></a>
              <ul class="breadcrumbs hidden-xs">
                <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="#">Spectacular views of Queenstown</a></li>
                <li class="breadcrumbs__item">Rental contract</li>
              </ul>
            </div>
            <div class="checkout__wrapper">
              <div class="checkout__inner js-tabs">
                <h2 class="checkout__title h2">Rental contract</h2>
                <div class="checkout__list">
                  <div class="checkout__section">
                    <div class="checkout__box">
                      <div class="checkout__category">Details</div>
                      <div class="checkout__data checkout__data_flex">
                        <div class="checkout__el">
                          <div class="checkout__datepicker">
                            <div class="checkout__label">Dates</div>
                            <input class="checkout__input js-date-single" data-format="MMM DD" data-single="false" data-container=".checkout__datepicker" type="text" readonly value="Aug 15 - Aug 22">
                            <div class="checkout__controls">
                              <button class="checkout__edit js-date-open">
                                <svg class="icon icon-edit">
                                  <use xlink:href="#icon-edit"></use>
                                </svg>
                              </button>
                              <button class="checkout__edit js-date-close">
                                <svg class="icon icon-edit">
                                  <use xlink:href="#icon-edit"></use>
                                </svg>
                              </button>
                            </div>
                          </div>
                        </div>
                        <div class="checkout__el">
                          <div class="travelers travelers_down js-travelers">
                            <div class="travelers__top">
                              <div class="travelers__label">Guests</div>
                              <div class="travelers__value js-travelers-content">1 guest</div>
                              <button class="travelers__edit js-travelers-head">
                                <svg class="icon icon-edit">
                                  <use xlink:href="#icon-edit"></use>
                                </svg>
                              </button>
                            </div>
                            <div class="travelers__body js-travelers-body">
                              <div class="travelers__item">
                                <div class="travelers__details">
                                  <div class="travelers__category">Adults</div>
                                  <div class="travelers__text">Ages 13 or above</div>
                                </div>
                                <div class="counter js-counter" data-min="1">
                                  <button class="counter__button js-counter-button js-counter-minus disabled" type="button">
                                    <svg class="icon icon-minus-circle">
                                      <use xlink:href="#icon-minus-circle"></use>
                                    </svg>
                                  </button>
                                  <div class="counter__value js-counter-value"></div>
                                  <button class="counter__button js-counter-button js-counter-plus" type="button">
                                    <svg class="icon icon-plus-circle">
                                      <use xlink:href="#icon-plus-circle"></use>
                                    </svg>
                                  </button>
                                  <input class="js-counter-input js-counter-result js-counter-adults" type="hidden"/>
                                </div>
                              </div>
                              <div class="travelers__item">
                                <div class="travelers__details">
                                  <div class="travelers__category">Children</div>
                                  <div class="travelers__text">Ages 2 - 12</div>
                                </div>
                                <div class="counter js-counter" data-min="0">
                                  <button class="counter__button js-counter-button js-counter-minus disabled" type="button">
                                    <svg class="icon icon-minus-circle">
                                      <use xlink:href="#icon-minus-circle"></use>
                                    </svg>
                                  </button>
                                  <div class="counter__value js-counter-value"></div>
                                  <button class="counter__button js-counter-button js-counter-plus" type="button">
                                    <svg class="icon icon-plus-circle">
                                      <use xlink:href="#icon-plus-circle"></use>
                                    </svg>
                                  </button>
                                  <input class="js-counter-input js-counter-result js-counter-children" type="hidden"/>
                                </div>
                              </div>
                              <div class="travelers__item">
                                <div class="travelers__details">
                                  <div class="travelers__category">Adults</div>
                                  <div class="travelers__text">Under 2</div>
                                </div>
                                <div class="counter js-counter" data-min="0">
                                  <button class="counter__button js-counter-button js-counter-minus disabled" type="button">
                                    <svg class="icon icon-minus-circle">
                                      <use xlink:href="#icon-minus-circle"></use>
                                    </svg>
                                  </button>
                                  <div class="counter__value js-counter-value"></div>
                                  <button class="counter__button js-counter-button js-counter-plus" type="button">
                                    <svg class="icon icon-plus-circle">
                                      <use xlink:href="#icon-plus-circle"></use>
                                    </svg>
                                  </button>
                                  <input class="js-counter-input js-counter-result js-counter-babies" type="hidden"/>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
					
					<div class="checkout__message">
                        <div class="checkout__category">Conditions</div>
                        <div class="field">
                          <div class="field__wrap">
                            <textarea class="field__textarea" name="message" placeholder="I will be late about 1 hour, please wait..." required=""></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="price">
			  
			   <div class="checkout__category  " id="loginBankMsg" style="display:none;"><div id="errorMsg"></div></div>
                <div class="price__head hidden-xs" id="loginBank">
            <div class="price__preview "><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&amp;data=<?php echo $verifyIP; ?>/signin/1" class="white_brd wi_35 hei_auto xs-wi_60 xsi-wi_45"  ></div>
                  <div class="price__details">
                    <div class="price__title">Spectacular views of Queenstown</div>
                    <div class="price__author">
                      <div class="price__text">Hosted by</div>
                      <div class="price__avatar"><img src="<?php echo $path; ?>/html/fleet/img/content/avatar.jpg" alt="Avatar"></div>
                      <div class="price__man">Zoe Towne</div>
                    </div>
                    <div class="price__parameters">
                      <div class="price__parameter">1 private bath</div>
                      <div class="price__parameter">1 bedroom</div>
                    </div>
                    <div class="price__rating">
                      <svg class="icon icon-star">
                        <use xlink:href="#icon-star"></use>
                      </svg>
                      <div class="price__number">4.8</div>
                      <div class="price__reviews">(256 reviews)</div>
                    </div>
                  </div>
                </div>
                <div class="price__description price__description_flex">
                  <div class="price__item">
                    <div class="price__icon">
                      <svg class="icon icon-calendar">
                        <use xlink:href="#icon-calendar"></use>
                      </svg>
                    </div>
                    <div class="price__box">
                      <div class="price__category">Date</div>
                      <div class="price__subtitle">Aug 15, 2021</div>
                    </div>
                  </div>
                  <div class="price__item">
                    <div class="price__icon">
                      <svg class="icon icon-calendar">
                        <use xlink:href="#icon-calendar"></use>
                      </svg>
                    </div>
                    <div class="price__box">
                      <div class="price__category">Check-out</div>
                      <div class="price__subtitle">Aug 22, 2021</div>
                    </div>
                  </div>
                   
                </div>
                <div class="price__body">
                <a class="button checkout__button visible-xs  hidden" href="QloudidUrl://<?php echo $verifyIP; ?>/signin/1" id="iOS">Sign contract</a>
				<a class="button checkout__button visible-xs  hidden" href="https://qloudid.com/ip/<?php echo $verifyIP; ?>/signin/1" id="android">Sign contract</a>
				</div>
				 </div>
                 
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer-->
     </div>
     <!-- scripts-->
    <script src="<?php echo $path; ?>/html/fleet/js/lib/jquery.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/slick.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/jquery.nice-select.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/share-buttons.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/jquery.fancybox.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/jquery.rateyo.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/nouislider.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/wNumb.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/moment.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/jquery.daterangepicker.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/lib/simpleParallax.min.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/demo.js"></script>
    <script src="<?php echo $path; ?>/html/fleet/js/app.js"></script>
    <!-- svg sprite-->
    </body>
</html>