<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
<title>Qloudid</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, maximum-scale=1.0, initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon" sizes="180x180" href="https://ui8-fleet-html.herokuapp.com/img/apple-touch-icon.png">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css">
 
 
<link rel="stylesheet" media="all" href="<?php echo $path;?>html/fleet/css/app.min.css">
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/translateCombine.js"></script>
	
	<script type="text/javascript">
function updateFill(id)
   {
	   for(i=1;i<=id;i++)
	   {
		   $('#'+i).attr('fill','#FFD166');
	   }
	   
	   for(j=i;j<=5;j++)
	   {
		   $('#'+j).attr('fill','#B1B5C3'); 
	   }
	   
	   $('#user_rating').val(id);
   }
   
  
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
     	function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
			}
			 
			
			function submitForm()
			{
				$("#error_msg_form").html('');
				 
				 if($("#user_rating").val()==0)
				{
					 
					$("#error_msg_form").html('Please select rating');
					return false;
				}
			 if($("#review_information").val()=='' || $("#review_information").val()==null)
			 {
			$("#error_msg_form").html('Please enter review description');
				return false;	 
			 }
				 document.getElementById('save_indexing').submit();
				 
				}
		</script>
			
			
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg ffamily_avenir" >
		 <div class="column_m     bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10" style="background-color: #c12219 !important;">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m   hei_60p  bs_bb lgtgrey2_bg visible-xs">
         <div class="wi_100 hei_60p xs-pos_fix padtb5 padrl10 lgtgrey2_bg">
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 
			  
            <div class="clear"></div>
         </div>
      </div>
		 
	<div class="clear"></div>
				 
	
	<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40   xs-mart0 xs-pad0">
					
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_65 xxs-lgn_hight_50 padb0 black_txt trn ffamily_avenir"  >Review</h1>
									</div>
									<div class="mart10 marb5 xxs-tall talc  xs-padb0 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please update your review here about your job request.</a></div>
								 
									
									<form action="../addUserReview/<?php echo $data['job_id']; ?>" method="POST" class="comment__form mart40" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
                    <div class="comment__title tall">Add a review</div>
                    <div class="comment__head">
                      <div class="comment__text">Help us with your review </div>
                      <div class="rating js-rating jq-ry-container" data-rating="4" data-read="false" style="width: 111px;"><div class="jq-ry-group-wrapper"><div class="jq-ry-normal-group jq-ry-group">
					  <svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#B1B5C3" id="1" onclick="updateFill(1);"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg>
					  <svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#B1B5C3" style="margin-left: 4px;"id="2"  onclick="updateFill(2);"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg>
					  <svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#B1B5C3" style="margin-left: 4px;"id="3"  onclick="updateFill(3);"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg>
					  <svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#B1B5C3" style="margin-left: 4px;"id="4"  onclick="updateFill(4);"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg>
					  <svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#B1B5C3" style="margin-left: 4px;"id="5"  onclick="updateFill(5);"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg>
					  </div>
					  <div class="jq-ry-rated-group jq-ry-group hidden" style="width: 79.2793%;"><svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#FFD166"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg><svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#FFD166" style="margin-left: 4px;"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg><svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#FFD166" style="margin-left: 4px;"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg><svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#FFD166" style="margin-left: 4px;"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg><svg width="19px" height="19px" viewBox="0 0 19 18" xmlns="http://www.w3.org/2000/svg" fill="#FFD166" style="margin-left: 4px;"><path d="M6.49075 5.87586L9.19442 0.468508C9.29094 0.275471 9.56642 0.275471 9.66293 0.468508L12.3666 5.87586C12.4054 5.95351 12.4802 6.00687 12.5663 6.01834L18.3319 6.7871C18.547 6.81577 18.6359 7.07849 18.4825 7.2319L14.2421 11.4723C14.1802 11.5342 14.1533 11.623 14.1705 11.7089L15.3237 17.4749C15.3664 17.6886 15.1446 17.858 14.9497 17.7605L9.54581 15.0586C9.47207 15.0217 9.38529 15.0217 9.31155 15.0586L3.90765 17.7605C3.71271 17.858 3.49096 17.6886 3.5337 17.4749L4.6869 11.7089C4.70408 11.623 4.6772 11.5342 4.61528 11.4723L0.374865 7.2319C0.221458 7.07849 0.310398 6.81577 0.525446 6.7871L6.29111 6.01834C6.37715 6.00687 6.45193 5.95351 6.49075 5.87586Z" fill-opacity="1"></path></svg></div></div></div>
                    </div>
                    <div class="comment__field">
                      <input type="text" class="comment__input" required type="text" name="review_information" id="review_information" placeholder="Share your thoughts"  >
                      <div class="smile js-smile hidden">
                        <button class="smile__button js-smile-button" type="button" fdprocessedid="f36n2">
                          <svg class="icon icon-smile">
                            <use xlink:href="#icon-smile"></use>
                          </svg>
                          <svg class="icon icon-smile-fill">
                            <use xlink:href="#icon-smile-fill"></use>
                          </svg>
                        </button>
                        <div class="smile__body js-smile-body">
                          <div class="smile__item">❤️</div>
                          <div class="smile__item">🙌</div>
                          <div class="smile__item">👍</div>
                          <div class="smile__item">😊</div>
                          <div class="smile__item">🤣</div>
                          <div class="smile__item">😡</div>
                        </div>
                      </div>
					  
					  <input type="hidden" id="user_rating" name="user_rating" required value="" />
                      <input type="button" value="Post it!" class="button-small comment__button"   onclick="submitForm();">
                    </div>
                  </form>
					 <div id="error_msg_form" class="fsz20 red_txt padtb20 tall"></div>
					</div>
					<!-- /Wizard container -->
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		  
	 
	
	
	 	 
		 	
 
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
 
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	 
</body>
</html>