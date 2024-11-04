
<!DOCTYPE html>
 
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Qloudid</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/skeleton.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/layout.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/main.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/base.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		 
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smart/css/icofont.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		 <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script> 
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

<!-- JavaScript
	================================================== -->

    

    
	
   <script src="<?php echo $path; ?>html/usercontent/js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->

	<script src="<?php echo $path; ?>html/coronahelpcss/ticker.js" type="text/javascript"></script>
	 <link rel="shortcut icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	 <link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/helper.css">

<script type="text/javascript">
 
function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					 
					$("#error_msg_form").html('Please provide a valid email address');
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}



			function register()
			{
				 
				$("#error_msg_form").html('');
				 $("#error_msg_form").addClass('hidden');
				if($("#cntry").val()=="" || $("#cntry").val()==null)
				{
				 $("#error_msg_form").removeClass('hidden');
					$("#error_msg_form").html('please select country of residense.');
					return false;
				}	
				 	
				 
				if($("#email").val()=="" || $("#email").val()==null)
				{
				 $("#error_msg_form").removeClass('hidden');
					$("#error_msg_form").html('please enter email address.');
					return false;
				}
				 
				if(!checkEmail("email"))
				{
				  $("#error_msg_form").removeClass('hidden');
				$("#error_msg_form").html("please enter correct email format");
					return false;
				}
				
				
				if($("#password").val()=="" || $("#password").val()==null)
				{
				 $("#error_msg_form").removeClass('hidden');
					$("#error_msg_form").html('please enter password.');
					return false;
				}
				
				if(!document.getElementById("terms").checked)
							{
						$("#error_msg_form").removeClass('hidden');
					$("#error_msg_form").html('please select term and conditions.');
					return false;
						
							} 
				 document.getElementById('save_indexing').submit();
			}
			
    
    //reset previously set border colors and hide all message on .keyup()
    
</script>
</head>
<body class="ffamily_avenir">
<div class="column_m header hei_45p xs-header xsip-header xsi-header bs_bb white_bg hidden-xs">
				<div class="wi_100 hei_45p xs-pos_fix padt0 padrl10 black_bg">
				
				<div class="logo marr15 wi_140p xs-wi_130p ">
				
					<a href="#"> <h3 class="marb0 pad0 fsz20 white_txt padt5 padb10" style="font-family: Avenir;">Qualeefy</h3> </a>
					
				
				</div>
			 <div class="fright xs-dnone sm-dnone padt10 padb0 hei_45p">
					<ul class="mar0 pad0 sf-menu fsz16">
						<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 white_txt white_txt_h ffamily_avenir" >Logga in</a></li>
					 
	<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 white_txt white_txt_h ffamily_avenir" data-en="About us" data-sw="About us">About us</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="DigitalID.php" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 white_txt white_txt_h ffamily_avenir" data-en="Our Technology" data-sw="Our Technology">Our Technology</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 white_txt white_txt_h ffamily_avenir" data-en="Portfolio" data-sw="Portfolio">Portfolio</a></li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr10 padr10 padt10  brdwi_3"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz16 black_txt" style="font-family: Avenir;">About</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		
<div class="column_m header xs-hei_55p bs_bb pink_bg">
				<div class="wi_100 hei_65p xs-hei_55p xs-pos_fix padtb5 padrl10 pink_bg">
				
				<div class="logo marr15 wi_110p xs-wi_130p ">
				
					<a href="#"> <h3 class="marb0 pad0 fsz30 bold red_ff2828_txt  padt10 xs-padt5 padb10" style="font-family: Avenir;">Qricis</h3> </a>
					
				
				</div>
				<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
			<div class="flag_top_menu flefti padt10 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30 red_ff2828_txt"><i class="fas fa-globe" onclick="togglePopup();" aria-hidden="true"></i></a>
					 	</li>
					
        
       
					
					
				</ul>
			</div>
			</div>
			 <div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz20 nobold">
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="https://www.qloudid.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 black_txt white_txt_h ffamily_avenir" data-en="Logga in" data-sw="Logga in">Logga in</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel  "><a href="https://www.qloudid.com/public/index.php/CoronaHelp/detailInfoVolunteer/QkhHaWQzcnBweFU5MDRIMllxY3IzQT09" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h  lgn_hight_30 black_txt white_txt_h ffamily_avenir" data-en="Help seeker" data-sw="Help seeker">Help givers</a></li>
	 
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr10 padr10 padt10 xs-padt5 brdwi_3"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz16 black_txt" style="font-family: Avenir;">About</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>

	<!-- Header Section
	================================================== -->
	<div class="pink_bg">
		<div class="wi_1200p maxwi_100 container xs-wi_100 pink_bg">
			<div class="wi_1200p maxwi_100 twenty columns header_container xs-wi_100 pink_bg">
				<div class="wi_760p xsi-wi_100 columns header_left alpha padt90 xs-padt0 xs-talc maxwi_100">
					<div class="header_left_inner">
						 
						<div class="clearfix small_padding"></div>
						 
						<div class="clearfix"></div>
						<h2 class="black_txt fsz90 ffamily_avenir nobold xxs-fsz54 lgn_hight_100 xs-lgn_hight_55">I karantän &
</h2>
<h2 class="black_txt bold fsz90 ffamily_avenir bold xxs-fsz54 lgn_hight_80 xs-lgn_hight_55">i behov av hjälp
</h2>	
	
						<h3 class="header_text ffamily_avenir lgn_hight_35 xs-lgn_hight_30 fsz30 xs-fsz20 black_txt padt10">
							 Det är inget problem, alls. Stanna hemma och ta hjälp av volontärer och organisationer med dina mat- och apotektsinköp.
						</h3>	
						<h3 class="header_text ffamily_avenir lgn_hight_35 bold xs-lgn_hight_30 fsz30 xs-fsz20 black_txt padt10">
							  Börja med att skapa konto.
						</h3>
						<div class="clearfix "></div>
						<div class="container">
							
					</div>
					
					<div class="dflex fxwrap_w xxs-justc_c   marl-10 xxs-marl-15 hidden">
							<a href="https://www.qloudid.com/public/index.php/CoronaHelp/detailInfo/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" class="wi_200p hei_45p dflex alit_c justc_c pos_rel zi1 mart15 marl15 brdrad50 txtdec_n xs-padrl15  bold fsz16 xs-fsz16 black_txt " target="_blank" tabindex="0">
								<div class="wi_100 hei_120 opa0_ph pos_abs zi-1 top5 left0  bglgrad_r_46c8ff_81d37e bg_62cec1 xs-nobrd  xs-bg_62cec1 brdrad50 xs-bglgrad_r_46c8ff_81d37e trans_opa2"></div>
								<div class="wi_100 hei_120 opa0 opa1_ph pos_abs zi-1 top5 left0 brdrad50 bglgrad_r_46c8ff_81d37e bg_62cec1 trans_opa2"></div>
								 
								Jag behöver hjälp
							</a>
							 
						</div>
					
					
				</div>

				
				 
						</div>

			<div class="seven columns header_right white_bg maxwi_375p omega xs-wi_100 box_shadow_00000070 mart40 marb40">
					<div class="header_right_inner padrtl35i white_bg padb0 ">
						
						<div class="clearfix"></div>
						 <div class="talc fsz35 red_txt hidden"><img src="<?php echo $path; ?>html/usercontent/images/random/bankid_high_rgb.png" height="128" width="128"/></span></div>
						 <div class="padb0 talc fsz60 padt10"><i class="fas fa-first-aid red_ff2828_txt"></i></div>
									<div class="mart10 xs-mart0 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Skapa konto & kom igång</a></div>
						<form action="../registerYourself/<?php echo $data['rid']; ?>" method="POST" name="save_indexing" id="save_indexing"  accept-charset="ISO-8859-1" autocomplete="off" >
						<div class="clearfix"></div>
						<fieldset   >
							 <label for="phone" >  
							<select  name="cntry" id="cntry" class="default_view wi_100 mart0  pink_bg nobrdr nobrdt nobrdl red_ff2828_brdclr brd_width_1 red_ff2828_txt fsz18  xxs-minhei_50p minhei_55p     tall  ffamily_avenir marb15" style="text-align-last:center;">
						    <option value="">V&auml;lj land</option>
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg lgt_grey_txt  tall"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>                            
											</select>
						    </label>
						  
						    <label for="email">
						    <input type="email" class="wi_100 nobrdt nobrdr nobrdl pink_bg   brdb_black brd_width_1 red_ff2828_brdclr talc  xxs-minhei_50p minhei_55p fsz18 red_ff2828_txt ffamily_avenir  marb15" placeholder="E-post adress" name="email" id="email" autocomplete="off" />
						    </label>
						    
						   
						    <label for="phone"> 
						    <input type="password"  class="wi_100 nobrdt nobrdr nobrdl pink_bg   brdb_black brd_width_1 red_ff2828_brdclr talc  xxs-minhei_50p minhei_55p fsz18 red_ff2828_txt ffamily_avenir marb15" placeholder="V&auml;lj lösenord" name="password" id="password"  autocomplete="off"/>
						    </label>
							
							<div class="on_clmn mart10 xxs-mart10 marb5">
				<div class="pos_rel">
				<label class="dblock fsz12 fleft">
				<input type="checkbox" name="terms" id="terms" /> <span class="marl5 fsz16 xs-fsz16 valm trn">Accept our terms</label>
				</div>
				 
				</div>
							<input type="hidden" name="login" >
							
							 <div class="clear"></div>
							<input type="hidden" id="lstatus" name="lstatus" value='0' /> 
						 <div class="valm fsz16 red_txt marb20 hidden" id="error_msg_form"> </div>
						 
						 <div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword minhei_55p red_ff2828_bg fsz18 padrl80" onclick="register();">Logga in</button>
								
							</div>
						    
						    <div class="clearfix"></div>
						</fieldset>
						</form>
					  
					</div>
				
				
				
				</div>
				
			</div>
		</div>
	</div>


<!-- features Section
	================================================== -->
	<div class="features_section hidden">
		<div class="container wi_1200p maxwi_100" >
			<div class="sixteen columns wi_1200p maxwi_100">
				<div class="one-third column wi_385p alpha xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-home pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Best Homes</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
				<div class="one-third column wi_385p xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-credit pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Great Prices</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
				<div class="one-third column omega wi_385p xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-tools pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Free Support</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="wi_100 ovfl_hid lgtblue2_bg">
<div class="wi_1200p maxwi_100 dflex xs-fxwrap_w alit_c padt30 xs-padt10 marb0 lgtblue2_bg marrla ">
						
						
						<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall  padl0 padr40 xxs-brdb_new talc xs-padrl20">
							
							
							<div class="wi_100 xs-wi_100 bs_bb pad40 tall padrl0 xs-padrl0 xs-pad20">
								
								<h2 class=" padtb20 xs-padt0 tall bold fsz32 xs-fsz25 ffamily_avenir"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Om Krishjälpen </font></font></h2>
								<div class="padrbl0 lgn_hight_s1_5 tall fsz18 black_txt ffamily_avenir"><font style="vertical-align: inherit;">I tider av oro behöver vi vara fler som värnar om varandra och hjälper till där det behövs som mest. Vi har därför valt att skapa Krishjälpen för att hjälpa de som drabbats av coronaviruset och skydda de som till hör en av riskgrupperna från covid 19. Var med och stoppa spridningen av coronaviruset genom att hjälpa till med inköp av förnödenheter till någon i karantän.   
 
</font></div>
							</div>
							
							
						</div>
						<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall xs-padrl20 padl40 brdrad5 talc ">
							
							
							<div class="wi_100 xs-wi_100 bs_bb pad40 tall padrl0 xs-padrl0 xs-pad20">
								
								<h2 class=" padtb20 xs-padt0 tall bold fsz32 xs-fsz25 ffamily_avenir"><font style="vertical-align: inherit;">Hur ber jag om hjälp? </font></h2>
								<div class="padrbl0 lgn_hight_s1_5 tall fsz18 black_txt ffamily_avenir"><font style="vertical-align: inherit;">Vi är många som vill hjälpa och vi blir tacksamma om du låter oss få göra det. ”Skapa ett konto" på högersida. Sär det bara att följa anvisningarna och skapa en inköpslista på de saker du behöver få inhandlade.
								 
								
								<p class="padt10 ">Det går också bra att ringa till oss på 010 – 15 10 125.</p>
</font></div>

							</div>
							
							
						</div>
						
					</div>

</div>
<div class="wi_100 ovfl_hid bg_f2f4f5">
		<div class="wi_1200p maxwi_100 minwi_0  alit_s marrla padt90 xs-padt40   xs-padrl20">
		<div class="wi_50 minwi_0  alit_c pos_rel marrla "><h2 class=" padt20 padrl15 talc fntwei_300  fsz32 bold sm-fsz32 md-fsz36 lg-fsz40 black_txt ffamily_avenir">FAQs<div class="wi_100 maxwi_100   mart5  bg_f"></div></h2></div>
		<div class="dflex fxwrap_w alit_s padt0 tall">
			<div class="wi_50 xs-wi_100 dflex ">
				<div class="wi_100 padtb40 xs-padb0 sm-padtb55 md-padtb70 lg-padtb90 padr15  xs-padrl0 txt_708198">
					 
				<div class="hide-base padt15 sm-padt30 md-padt45 lg-padt55 txt_708198">
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-1" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Hur skapar man konto till äldre som inte har kunskaper om internet? </span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-1" style="display: none;">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">	Vi vet att många äldre varken far Facebook, bank ID eller ens internet. Därför kan du som anhörig eller vän skapa ett konto till en äldre genom att agera ”förmyndare”. Detta går även att göra för släktingar som befinner dig på annan ort men som du inte får besöka med tanke på smittspridningen. Skapa ett konto och välj sedan ” registrera anhörig” och lägg upp en inköpslista år den du ansöker om hjälp för. Ring oss på 010- 15 10 125 om du vill veta mer. 
									</font>

									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-3" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Är det tryggt?   </span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-3">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">Alla som hjälper till och ber om hjälp i Krishjälpen har skapat konto med sitt BankID, och på så sätt identifierar man sig på ett säkert sätt. Vi lämnar inte heller ut några telefonnummer till varken hjälpsökande eller volontär. Detta innebär att bedragare inte har någon möjlighet att nå och försöka lura varken hjälpsökande eller volontär.  </font>
									</div>
								</div>
							</div>
						</div>
						
						</div>
				</div>
			</div>
			<div class="wi_50 xs-wi_100 dflex ">
				<div class="wi_100 padtb40 xs-padt0 sm-padtb55 md-padtb70 lg-padtb90 padl15 xs-padrl0 txt_708198">
					 
				<div class="hide-base padt15 sm-padt30 md-padt45 lg-padt55 txt_708198">
				<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-4" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Jag är i karantän hur ber jag om hjälp?  </span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-4">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
								<font style="vertical-align: inherit;">Att be om hjälp kan kännas ovant. Vi är många som vill hjälpa och vi blir tacksamma om du låter oss få göra det. Det är väldigt betydelsefullt att få känna sig behövd och viktig.
Genom att stanna hemma just nu, kan vi tillsammans se till att så många som möjligt håller sig friska. Klicka på knappen ”JAG BEHÖVER HJÄLP” och skapa en inköpslista på de saker du behöver få inhandlade. 

Det går också bra att ringa till oss på 010 – 15 10 125. </font>
									</div>
								</div>
							</div>
						</div>
						
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-2" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Hur förhindrar jag smitta vid överlämning?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-2">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
								<font style="vertical-align: inherit;">De som handlar åt personer som är isolerade på grund av covid-19 eller tillhör riskgrupper och behöver undvika smitta måste givetvis vara extremt noggrann med hygien när de levererar mat, mediciner eller liknande. För att minimera smittspridning skall du som tar emot varor: 
									<ul>
									<li>	Undvik all kontakt med volontär </li>
									<li>	Hämta upp dina varor utanför din dörr efter att volontär har gått.</li>
									<li>	Tvätta händerna med tvål och varmt vatten i 30 sekunder när du packat upp dina varor.</li>
									<li>	Om du kan så använd handsprit. </li>
									<li>	Va rädd om dig!  </li>
									</ul>

													</font>
									</div>
								</div>
							</div>
						</div>
						
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-5" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Hur vet jag när, var och vilken hjälp som behövs?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-5">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">Vi skickar push notiser till dig när någon söker hjälp i din närhet. Hjälpsökande har skapat en inköpslista med de varor som behövs. Du väljer de varor som du har möjlighet att hjälpa till med. När du har valt dina varor ingår du en överenskommelse om att du skall leverera dem men du behöver inte köpa allt på inköpslistan. Flera volontärer kan hjälpas åt och stätta en hjälpsökande.   </font>
									</div>
								</div>
							</div>
						</div>
					
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-11" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Hur hjälper jag till?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-11" style="display: none;">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
								<font style="vertical-align: inherit;">Registrera dig som Krishjälpare genom att registrera ett konto och anmäla dig som volontär. Du som redan har ett Qloud ID konto, får upp en förfrågan om du kan tänka dig att hjälpa en medmänniska i din närhet nästa gång du loggar in. 

								Behöver du hjälp med att skapa konto, ring oss på 010 – 15 10 125</font>

									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-12" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Which hardware works with SafeQid?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-12">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">	SafeQid is not a hardware-intensive solution. The only requirement is a good internet connection. Once you buy our solution, our Get-started-coach will help you configure SafeQid for your daycare center using devices you already have</font>.
									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-13" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">How much does it cost to install SafeQid?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-13">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">	SafeQid license is free to install for daycare centers. All services are included and we nly charge for educations and extra support-services. </font>
									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-14" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">When is SafeQid support available?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-14">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">	SafeQid Support is available 5 days a week. Monday through Friday 8:00 am to 5:00 pm and Central European time. You can call us at +46 10 15 10 125, email support@safeqid.com or use the live chat feature on our web site. Please don’t hesitate to Contact SafeQid, we’re here to help!</font>
									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-15" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Who can get SafeQid? </span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-15">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
								<font style="vertical-align: inherit;">		SafeQid serves all private, and public daycare centers, pre-schools and after-school programs. This is a secure, smart and complete safety solution for those looking to increase the safety of their enrolled children. </font> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
			</div>
		</div>
		<style>
			.custom-scroll::-webkit-scrollbar{
				width: 12px;
				height: 12px;
				padding: 0 3px;
				border-radius: 20px;
    			background: #e9e9e9;
			}
			.custom-scroll::-webkit-scrollbar-button{
				width: 12px;
				height: 12px;
			}
			.custom-scroll::-webkit-scrollbar-track{
				width: 100px;
			}
			.custom-scroll::-webkit-scrollbar-thumb{
				border-right: 3px solid #e9e9e9;
				border-left: 3px solid #e9e9e9;
				background: #a549e9;
			}
		</style>
	</div>	
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>


<!-- End Document
================================================== -->
</body>
</html>