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
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10    brdb_black black_txt  padb10"> <span class="valm trn ltr_space" >Login api</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div></a>
								 </li>
					 
						  <li class="dblock padrb10   padt5 ">
						<a href="../purchaseApiDocumentation/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Purchase </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
							</a></li>
						  
							 <li class="dblock padrb10   ">
						<a href="../signInApiDocumentation/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Sign in </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
							</a></li>

							<li class="dblock padrb10   ">
						<a href="../bookHotelApiDocumentation/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Book hotel </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
							</a></li>
							<li class="dblock padrb10   ">
						<a href="../checkinHotelApiDocumentation/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Checkin hotel </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
							</a></li>
							 				 
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
									
									<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">This is a documentation on how you can integrate your software to Qloud ID platform and generate digital ID for your domain</a></div>
									
									<?php
									if($appsDetailSelectedCount['num']>0)
									{
										?>
										<div class="column_m container  marb5   fsz14 dark_grey_txt brd">
												<div class="lgtgrey_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_25  xs-mar0 hidden-xs">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Client id</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">Client secret</span>  </div>
													 
													<div class="fleft wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo substr($appsDetailSelected['client_id'],0,45); ?>  </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt"><?php echo $appsDetailSelected['client_secret']; ?></span>  </div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													 
													 
													<div class="fleft wi_80   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo $appsDetailSelected['api_interface_url']; ?>  </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Login</span>  </div>
													  
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
									
									<?php
									} else {
									  ?>
									<div class="talc padt20 ffamily_avenir  "> <a href="https://www.qloudid.com/company/index.php/CreateApps/appsAccount/<?php echo strip_tags($data['cid']); ?>" ><input type="button" value="Generate api key" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"></a> </div>		
									<?php
									} ?>
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 white_bg " >
			
			<div class="wrap maxwi_100  xs-padr25 xs-padl10  padt40 xs-padt0 white_bg    tall  ">
				
				<section class=" section  whats-new xs-padt0 ffamily_avenir">
					<div class="section__nav section__nav--small">
						<h2 class="whats-new__headline bold">Information to connect API</h2>
						
					</div>
					<div class="l-row whats-new__content">
						
						<div class="l-column small-12 medium-9 large-8a small-valign-top">
							<div id="ember239" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view">    
								
								<div data-clamp="" id="ember241" class="we-clamp ember-view fsz14">
								  




<p class="black_txt   fsz16">First of developer need a user account on Qloudid and he must be a employee of the company on Qloudid for the company he want to generate API URL. Then he needs to go to </p>
 <p class="black_txt   fsz16">https://www.qloudid.com/company/index.php/AppsList/appsAccount/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09 </p>

<p class="black_txt padt10  padb0"><strong>if developer already have a developer account he will see list of API's created or he will be asked to request a developer account. After approval of suport team he can continue with following </strong></p>
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>If he want to generate new client id he can click on + and go to :</li>
<li>https://www.qloudid.com/company/index.php/CreateApps/appsAccount/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09 </li>
<li>Here he can select which API URL he wants to generate. App name here must be unique i.e. not used by other user or company. Redirect URL is the one where developer wants to redirect after login that he have selected will be completed.</li>
<li>After submitting the data a new Client id and password will be generated for developer and a tiny URL will be provided to him that he can use on their domain to login with Qloudid.</li>
<li>When a user want to login on their web they click on Login button like here. Here user need to provide the API generated for the login</li>
<li>https://www.qmatchup.com/beta/user/index.php/LoginAccount</li>
<li>And the user will be redirected to login page on Qloudid and there he can login with his app</li>
<li>After successful login if user is employee for more than one company we ask him to select one profile by which he want to be logged in else he is logged in as a user. </li>
<li>After successful submission of profile user is redirected to added URL</li>
<li>On qmathup for now we are redirecting on : http://www.qmatchup.com/beta/user/index.php/LoginAccount/loginQloud </li>
<li>From Qmatchup user need to send request to https://www.qloudid.com/walk/token.php using client id and secret key to generate access token.</li>
<li>Following details are required in request:
<ul>
<li>$fields = ['grant_type'=>'authorization_code','code' => $_GET['code'],'client_id'=>$username, 'client_secret'=>$password] here username is client id and password id secret key</li>
<li>$headers = array('PHP_AUTH_USER' => 'username' , 'PHP_AUTH_PW' => 'password'); here username is client id and password id secret key</li>
</ul>
<li> As soon as access tokan is received on qmatchup side they need to send the same to https://www.qloudid.com/walk/resource.php?login=1 using curl request</li>
<li>Here on this Qmatchup is rechecking before they make user logged that if user is not making a cheat and opening URL directly. So they re-verify from their client id and password and user detail from Qloudid.</li>
<li>This is two way handshaking process used on Qmatchup and Qloudid domain. So they can verify user login securely. Other domains using our API can work as per their requirement they can use two way handshaking or can make user logged in directly after receiving data from Qloudid.</li>
<li>Data will be sent in json and if user have selected company he will receive data as : {"type":"login","first_name":"Ram","last_name":"kumar","email":"x@x.com","company_name":"company_name","company_email":"x@x.com","emp_uniq_code":"123"} </li>
<li>If user have selected user profile they will receive: {"type":"login","first_name":"Ram","last_name":"kumar","email":"x@x.com","country_of_residence":"100"}</li>
 
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