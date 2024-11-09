<!doctype html>
<?php
	 $path1 = "../../../../html/usercontent/images/";
	 ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qloudid</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_time.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
			<script>
	function changeDisplay()
	{
		if($('#ulDisplay').css('display') == 'none')
		{
		$('#ulDisplay').attr('style','display:block');	
		}
		else
		{
			$('#ulDisplay').attr('style','display:none');	
		}
		
	}
	
	function closePopup()
	{
		if($('#ulDisplay').css('display') == 'block')
		{
		$('#ulDisplay').attr('style','display:none');	
		}
		 
	}
</script> 
		
	 </head>
	
	<body class="white_bg ffamily_avenir">
		
		
		
			<!-- HEADER -->
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../appsAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			  
            <div class="clear"></div>
         </div>
      </div>
		
		 	 
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../appsAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
			  
            <div class="clear"></div>
         </div>
      </div>
		 
	<div class="clear"></div>
		
		
		
		<div class="column_m pos_rel " onclick="closePopup();">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 xs-padrl15 ">
				 
					<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" >
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" >
								
								 <ul class="dblock marr20 padt250 padl10 fsz18 mart0">
						  
					 
							 			<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10    brdb_black black_txt  padb10"> <span class="valm trn ltr_space" >Inter app login</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div></a>
								 </li>	 
											</ul>
							
								 
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_720p   fleft pos_rel zi5    padl20   xs-pad0">
						 
					 <div class="padb0 xxs-padb0 ">		
							<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn">API</h1>
									</div>
									
									<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">This is a documentation on how you can integrate your software to Qloud ID app for login</a></div>
									
									 
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 white_bg " >
			
			<div class="wrap maxwi_100  xs-padr25 xs-padl10  padt40 xs-padt0 white_bg    tall  ">
				
				<section class=" section  whats-new xs-padt0 ffamily_avenir">
					<div class="section__nav section__nav--small">
						<h2 class="whats-new__headline bold">Information to connect Qloud ID app</h2>
						
					</div>
					<div class="l-row whats-new__content">
						
						<div class="l-column small-12 medium-9 large-8a small-valign-top">
							<div id="ember239" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view">    
								
								<div data-clamp="" id="ember241" class="we-clamp ember-view fsz14">
								  




<p class="black_txt   fsz16">We have an hybrid app that runs on iOS and android both plateforms. If we want to wake Qloud ID app from adroid plateform app we need to hit following url from our app (for now we have developed this for WORQ)</p>
 <p class="black_txt   fsz16"> https://qloudid.com</p>

<p class="black_txt padt10  padb0"><strong>If we are using iOS platefporm we need to hit :- com.Qloudid.Url to wake Qloud ID app</strong></p>
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>Now on Qloud ID user is asked to enter password and verify him self (for completing this step user must be connected to a valid certificate on Qloud ID app).</li>
<li>When user hit submit after entering pin api call is sent and checked if user password is correct or not</li>
<li>After successful completion on API we receive a session on Qloud ID that is sent back to WORQ and using this session WORQ can fetch user details from Qloud ID web.</li>
<li>To wake WORQ from Qloud ID we are using following URL for android and iOS: </li>
<li>https://NoffaPlusApp.com/{session}</li>
<li>com.NoffaPlusApp.Url/{session}</li>
<li>If session is not equal to 0 we call following API from WORQ sendiing session received as a parameter</li>

<li>https://www.safeqloud.com/user/index.php/QloudidApp/verifyInterAppSession</li>
<li>If session is a valid session we receive a json with values {"user_id":1,"result":1}</li>
</ul>
<ul>
<p class="black_txt  bold fsz16">Note:-</p>
<li>To connect with other apps we need the url to be hit from Qloud ID after successful login</li>
 
<li>Also when other app will hit Qloud ID we will provide them a key when then provide consent to use the Qloud ID app</li>
 
<li>Right now API is sending desired information for WORQ only we can make changes on API or provide a different API for  each app based on their data requirements.</li>
 
  
 </ul>


 

 
									
								</div>
								
								
								
								
							<!----></div>
						</div>
					</div>	</section>
				
			</div>		
			
		</div>
	
					  
								 
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
	 
		 
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	 <div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey_bg fsz14 brdrad10 popup_shadow" id="gratis_popup_delete">
		<div class="modal-content nobrdb talc box_shadox brdradtr10  lgtgrey_bg">
			
			
			<div class="pad25 lgtgrey_bg brdradtr10">
				<img src="../../../../../html/usercontent/images/kitten_1.jpg" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Are you Sure?</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">All available dishes in the menu will also be deleted. </span>
				</div>
				
				
			</div>
			
			<form action="../../deleteCategory/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" name="save_indexing2" id="save_indexing2" method="POST" >
			<input type="hidden" name="category_id" id="category_id" />
				</form>
			<div class="on_clmn padtb10">
				<a href="#" onclick="confirmCategoryDelete();"><input type="button" value="Confirm" class="wi_300p maxwi_100   hei_50p diblock nobrd red_ff2828_bg fsz18 white_txt curp bold close_popup_modal"></a>
				
			</div>
			
			<div class="on_clmn padt0">
				<input type="button" value="Close" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold">
				
			</div>
			 
	</div>
	
	</div>
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	
 </body>

</html>