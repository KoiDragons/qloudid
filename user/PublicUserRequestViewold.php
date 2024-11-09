<?php 
	$path1 = "../../../../html/usercontent/images/";
	 
?>
<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
		function validateLogin()
			{
				
				
				var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
				
				if($("#username").val() == "")
				{
					alert("Enter username");
					$("#username").css("background-color","#FF9494");
					return false;
				}
				if (!reg.test($("#username").val())){
                    
                    $("#username").css("background-color","#FF9494");
                    alert("Incorrect Email address format");
                    return false;
                    
				}
				if($("#password").val() == "" )
				{
                    $("#password").css("background-color","#FF9494");
					alert("Enter Password");
                    return false;
				}
				
				
				
				var send_data={};
				
				send_data.username=$("#username").val();
				send_data.password=$("#password").val();
				$.ajax({
					type:"POST",
					url:"../../PublicUserRequest/loginAccount?rid=<?php echo $data['r_id']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
					
					if(data1==1)
					{
				$("#warning").html('');
				var msg="User does not exist.<a href='https://www.safeqloud.com/user/index.php/CreateAccount'>Sign up</a>";
				$("#warning").html(msg);
				}
					else if(data1==5)
					{
				$("#warning").html('');
				var msg="Wrong password. <a href='https://www.safeqloud.com/user/index.php/ForgotPswd'>Forgot password?</a>";
				$("#warning").html(msg);
				}	
					else if(data1==2 || data1==3 || data1==4)
					{
				window.location.href='https://www.safeqloud.com/user/index.php/PersonalRequests/sentRequests?rid=<?php echo $data['r_id']; ?>';
					}
					
					else 
					{
				$("#warning").html('');
				var msg="Login Error !!! Please try again later";
				$("#warning").html(msg);
				}		
						
					}
				});
			}				
					
			
		</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
				<div class="column_m header  bs_bb white_bg">
		<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc">
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15 wi_140p">
				<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr30">
			<div class="languages">
					<a href="#" id="language_selector" class="padrl10 black_txt"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="US" alt="US"></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="US" alt="US">
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden">
							</a>
						</li>
					</ul>
				</div>
			</div>
		<div class="usermenu">
					<ul>
						<li class="right hei_30p">
							<a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="translate orange_btn bold xs-padrl10i hei_30p " id="usermenu_singin" data-en="Sign In" data-sw="Logga In">Sign In</a>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
				<div class="clear"></div>
			
		</div>
	</div>
	<div class="clear"></div>
	
		<div class="column_m pos_rel">
		
		
		<div class="clear"></div>
		
				
		
		
				<div class="clear"></div>	
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20">
			<div class="wrap maxwi_100 padrl10 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="maxwi_100 wi_640p col-xs-12 col-sm-12 pos_rel zi5  fsz14  marrla  xs-pad0">
				
						
						<!-- Configure Data -->
						
						<div class="padrl0  xs-marrl0 sm-marrl0 white_bg">
							<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xs-padrl0">
								
								<div class="padb10 ">
									<h1 class="padb5 talc fsz40 xs-fsz35"><?php echo $GetStartedUser['name']; ?></h1>
									<p class="pad10 lgtblue2_bg talc fsz16 padb10 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10"> want to access your detail. Do you agree?</p>
								</div>
								
								
								
								<div class="clear"></div>
								
								
							</div>
							
							
							
							
								</div>
							
								<div class="white_bg brd">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									<div class="idcard_header wi_100 xs-wi_70 xs-order_2 bs_bb marb10 xs-padl5 sm-padl5">
										<h2 class="dnone xs-dblock padb15 uppercase bold fsz18">Cloud ID Business</h2>
										<div>
											<img src="<?php echo $path;?>html/usercontent/images/flag.png" width="40" class="marr5 valm">
											<span class="valm bold xs-nobold fsz24 xs-fsz15">User</span>
											<span class="dblock xs-dnone bold fsz14">Passport</span>
										</div>
										
									</div>
									<!--<div class="clear hidden-xs"></div>-->
									<div class="wi_30 xs-order_1">
									
										<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
									<div class="imgwrap nobrd">
										<div class="cropped_image " style="background-image: ../../../html/usercontent/images/default-profile-pic.jpg;" id="image-data" name="image-data"></div>
										
									</div>
								</div>
								
									</div>
									<div class="wi_70 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span> Social Security Number</span> <span class=" edit-text jain dblock brdb brdclr_lgtgrey2 fsz20">-</span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Family name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">-</span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Given names</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">-</span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Address</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16">-</span></div>
										<div class="container marrl-2 padl15">
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Date of birth</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16">-/-/-</span> </div>
											<div class="fleft wi_10  xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Sex</span> <span class=" edit-select dblock brdb brdclr_lgtgrey2 uppercase curt fsz16" data-options="M,F,T">-</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Endorsements</span> <span class=" edit-text dblock brdb brdclr_lgtgrey2 uppercase curt fsz16">&nbsp;&nbsp;&nbsp;</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Date of Exp</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16">&nbsp;&nbsp;&nbsp;</span> </div>
											<div class="clear marb5"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Restrictions</span> <span class=" edit-text dblock brdb brdclr_lgtgrey2 uppercase curt fsz16">&nbsp;&nbsp;&nbsp;</span> </div>
											<div class="fleft wi_10  xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>&nbsp;</span> <span class="dblock uppercase bold fsz16"></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Classification</span> <span class=" edit-text dblock brdb brdclr_lgtgrey2 uppercase curt fsz16">B</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Date of issue</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16">-/-/-</span> </div>
											
										</div>
									</div>
									
									<div class="qapscore_bord hidden-xs" style="position: absolute; z-index: 1; top: 74px; right: 10px;">
									
									<div class="scorenew scorelevelnew">A+</div>
								</div>
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span>5500040N</span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						
					
						
						
						
						
						
						
						<div class="clear"></div>
						
						
						
						
						
						<div class="mart20"> <a href="#" class="show_popup_modal wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2" data-target="#gratis_popup_login">Yes i agree</a> </div>
						
						<div class="mart10"> <a href="#" class="show_popup_modal wi_100 maxwi_500p  dflex justc_c alit_c opa90_h marrla fsz18 xs-fsz16 darkblue_txt trans_all2" data-target="#gratis_popup_login">No</a> </div>
						<!-- Marquee -->
						
						<div class="clear"></div>
					</div>
				
				
				
				</div></div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="marb20"> <img src="<?php echo $path;?>usercontent/images/gratis.png" class="maxwi_100 hei_auto"> </div>
						<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
						<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
						<div class="marb10 padtb20 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span> </div>
							<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
					</form>
				</div>
			</div>
			
			
			<!-- Sales popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Marketing popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_login">
			<div class="modal-content pad25 brd nobrdb talc brdrad5">
				
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Please Login</h3>
					<div class="marb20">
						<img src="../../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span></span>
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
					
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					
					<div class="pad15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="text" id="username" name="username" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Email">
					</div>
					</div>
					
						<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="password" id="password" name="password" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="password">
					</div>
					</div>
					<div id="warning" class="red_txt"></div>
					<div class="mart20">
						<input type="button" value="Search" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="validateLogin();">
						
						
					</div>
					
					
					
				
			</div>
		</div>
	
	
		
		
		
		
		
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
			<div class="crm-popup profile-popup wi_720p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top50p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16">
			<a href="#" class="popup-close dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f">Close</a>
			<div class="popup-content"></div>
		</div>
		
		<div class="crm-popup request-popup wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
			<a href="#" class="popup-close dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f">Close</a>
			<div class="popup-content"></div>
		</div>
		
		<div class="crm-popup fortnox-popup wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
			<a href="#" class="popup-close dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f">Close</a>
			<div class="popup-content"></div>
		</div>
		
		<!-- Company info popup -->
		<div class="crm-popup company-popup wi_600p maxwi_96 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p xs-right8 right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
			<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
			<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold">Close</a>
			<form action="../addNewEmployee/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
				<div class="popup-content padb15"></div>
			</form>
		</div>
		
		<div class="crm-popup company-popup-edit wi_600p maxwi_96 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p xs-right8 right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
			<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt " ></a>
			<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold" onclick="removeBackground();">Close</a>
			
				<div class="popup-content padb15"></div>
			
		</div>
		
		<div class="crm-popup company-popup-pos wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
			<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
			<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold">Close</a>
			<form action="../addNewPosition/<?php echo $data['cid']; ?>" method="POST" id="save_indexingp" name="save_indexingp" accept-charset="ISO-8859-1">
				<div class="popup-content padb15"></div>
			</form>
		</div>
		
		<!-- User info popup -->
		<div class="crm-popup employee-popup wi_720p maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi100 top70p right0 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
			<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
			<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right5p orange_btn brdrad3 bold">Close</a>
			<div class="popup-content padb15"></div>
		</div>
		
		<!-- Reps info popup -->
		<div class="crm-popup reps-popup wi_720p maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi100 top70p right0 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
			<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
			<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right5p orange_btn brdrad3 bold">Close</a>
			<div class="popup-content padb15"></div>
		</div>
		
		<script>
			// A list of countries to use in country select countrols
			var countries_list = "<?php echo $countryList; ?>";
			var countries_listname = '<?php echo $countryListName; ?>';
			var location_list = "<?php echo $locationList; ?>";
			var job_list = "<?php echo $jobList; ?>";
			var relationship='<option value="In-relationship">In-relationship</option><option value="Single">Single</option><option value="Married">Married</option><option value="Divorced">Divorced</option>';
			$(document).ready(function () {
				var $window = $(window),
				$body = $(document.body),
				$fortnox_popup = $('.fortnox-popup'),
				$fortnox_popup_content = $fortnox_popup.find('.popup-content'),
				$request_popup = $('.request-popup'),
				$request_popup_content = $request_popup.find('.popup-content'),
				$company_popup = $('.company-popup'),
				$company_popup_content = $company_popup.find('.popup-content'),
				$company_popup_edit = $('.company-popup-edit'),
				$company_popup_content_edit = $company_popup_edit.find('.popup-content'),
				$company_popup_pos = $('.company-popup-pos'),
				$company_popup_content_pos = $company_popup_pos.find('.popup-content'),
				$employee_popup = $('.employee-popup'),
				$employee_popup_content = $employee_popup.find('.popup-content');
			    $popups = $('.crm-popup'),
				$profile_popup = $popups.filter('.profile-popup'),
				$profile_popup_content = $profile_popup.find('.popup-content');
				// Show / close popups
				var show_crm_popup = function ($popup) {
					clearTimeout($popup.data('tm'));
					$popup.css('display', 'block');
					requestAnimationFrame(function () {
						$popup.addClass('active');
					});
				}
				var close_crm_popup = function ($popup) {
					if ($popup.is(':visible')) {
						$popup
						.removeClass('active')
						.data('tm', setTimeout(function () {
							$popup.css('display', 'none');
						}, 200));
						
						if ($popup.data('keep') == true) {
							$popup.data('keep', false);
							show_crm_popup($popup.data('$pop'));
						}
					}
				}
				
				// Populate popup with company info
				var populate_company = function(data, $container){
					var html = '<h2 class="marb10 padrl20 padtb10 fsz18 black_txt yellow_bg">' + data.label + '</h2>';
					if(data.tabs){
						for(var tb = 0, tbL = data.tabs.length; tb < tbL; tb++){
							var tab = data.tabs[tb];
							html += '<div class="padrbl20 xs-padrl10">';
							html += '<div class="marrl5 padb10 brdb fsz13">';
							html += '<a href="#' + tab.id + '" class="expander-toggler black_txt' + ((tab.state && tab.state === 'active') ? ' target_shown' : '')  + '"><span class="dnone_pa fa fa-chevron-down"></span><span class="dnone diblock_pa fa fa-chevron-up"></span> ' + tab.label + '</a>';
							if(tab.postfix){
								html += tab.postfix;
							}
							html += '</div>';
							html += '<div id="' + tab.id + '" class="' + ((tab.state && tab.state === 'active') ? '' : 'dnone ')  + '"><div class="mart10 wi_100 dflex fxwrap_w">';
							
							if(tab.fields){
								for(var f = 0, fL = tab.fields.length; f < fL; f++){
									var field = tab.fields[f];
									
									html += '<div class="' + field.classes + ' bs_bb padrl5 padb15">';
									
									if(field.type === 'line'){
										html += '</div>';
									}
									else{
										html += '<label class="dblock marb5 fsz11">' + field.label + '</label><div class="wi_100 dflex alit_c">';
										
										if(field.prefix){
											html += field.prefix;
										}
										
										if(field.type === 'select'){
											
											if(field.name ==='job_family')
											{
												
												html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_family1(this.value);">';
											}
											else if(field.name ==='job_function') 
											{
												html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_function1(this.value);">';
											}
											if(field.name ==='job_familyp')
											{
												
												html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_family2(this.value);">';
											}
											else if(field.name ==='job_functionp') 
											{
												html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_function2(this.value);">';
											}
											else if(field.name ==='permision') 
											{
												html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="empPermission(this.value);">';
											}
											else
											{
												html += '<select id="' + field.name + '" name="' + field.name + '" class="default  wi_100 hei_30p bs_bb pad5 brd fsz13">';
											}
											
											var field_val = field.value;
											
											if(field.options){
												if(typeof field.options === 'string'){
													try{
														var options = eval(field.options);
														if(field_val){
															html += options.replace('value="' + field_val + '"', 'value="' + field_val + '" selected');
															//alert('value="' + field_val + '"', 'value="' + field_val + '" selected');
														}
														else{
															html += options;
														}
														
													}
													catch(e){}
												}
												else if(typeof field.options === 'object'){
													for(var o = 0, oL = field.options.length; o < oL; o++){
														var option = field.options[o];
														html += '<option value="' + option.value + '"' + (field_val == option.value ? ' selected' : '')  + '>' + option.label + '</option>';
													}
												}
											}
											
											html += '</select>';
										}
										else if(field.type === 'textarea'){
											html += '<textarea name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" class="wi_100  bs_bb pad5 brd fsz13">' + (field.value ? field.value : '') + '</textarea>';
										}
										else{
											if(field.name=='rprice')
											{
												html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class=" wi_100 hei_30p bs_bb pad5 brd fsz13" min="0"/>';
											}
											else
											{
												html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class=" wi_100 hei_30p bs_bb pad5 brd fsz13" />';
											}
										}
										
										if(field.postfix){
											html += field.postfix;
										}
										
										html += '</div></div>';
									}
								}
							}
							
							if(tab.thead || tab.tbody){
								html += '<div class="wi_100 padl5"><table width="100%" border="0" cellpadding="0" cellspacing="0">';
								
								if(tab.thead){
									html += '<thead class="fsz11 lgtgrey2_bg"><tr>';
									for(var t = 0, tL = tab.thead.length; t < tL; t++){
										html += '<th align="left" class="' + (tab.thead[t].class ? tab.thead[t].class : '') + '"><div class="padtb10">' + tab.thead[t].text + '</div></th>';
									}
									html += '</tr></thead>';
								}
								if(tab.tbody){
									html += '<tbody class="fsz13"><tr>';
									for(var t = 0, tL = tab.tbody.length; t < tL; t++){
										var trs = tab.tbody[t];
										html += '<tr>';
										for(var d = 0, dL = trs.length; d < dL; d++){
											html += '<td class="brdb"><div class="padtb10">' + trs[d] + '</div></td>';
										}
										html += '</tr>';
									}
									html += '</tr></tbody>';
								}
								
								html += '</table></div>';
							}
							
							html += '</div></div></div>';
						}
					}
					
					if(data.buttons){
						html += '<div class="container padrl20 tall">';
						for(var b = 0, bL = data.buttons.length; b < bL; b++){
							html += data.buttons[b];
						}
						html += '</div>';
					}
					//alert(html);
					$container
					.removeClass('active')
					.html(html);
				}
				
				$body.on('click', '.get-position-info1', function () {
					var $this = $(this);
					
					
					$company_popup_content_pos.addClass('active');
					
					$.ajax({
						url: '../editActivePosition',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $company_popup_content_pos);
						}
						
						// Error
						else{
							$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$company_popup_content_pos.removeClass('active');
					});
					
					if (!$company_popup_pos.hasClass('active')) {
						show_crm_popup($company_popup_pos);
					}
					return false;
				});
				
				
				
				$body.on('click', '.get-position-info', function () {
					var $this = $(this);
					
					
					$company_popup_content_pos.addClass('active');
					
					$.ajax({
						url: '../addPosition',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $company_popup_content_pos);
						}
						
						// Error
						else{
							$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$company_popup_content_pos.removeClass('active');
					});
					
					if (!$company_popup_pos.hasClass('active')) {
						show_crm_popup($company_popup_pos);
					}
					return false;
				});
				
				/*$body.on('click', '.get-active-position-info', function () {
					var $this = $(this);
					
					
					$company_popup_content_pos.addClass('active');
					
					$.ajax({
						url: '../addActivePosition',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $company_popup_content_pos);
						}
						
						// Error
						else{
							$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$company_popup_content_pos.removeClass('active');
					});
					
					if (!$company_popup_pos.hasClass('active')) {
						show_crm_popup($company_popup_pos);
					}
					return false;
				});
				*/
				$body.on('click', '.get-company-info', function () {
					var $this = $(this);
					
					
					$company_popup_content.addClass('active');
					
					$.ajax({
						url: '../addEmployee',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $company_popup_content);
						}
						
						// Error
						else{
							$company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$company_popup_content.removeClass('active');
					});
					
					if (!$company_popup.hasClass('active')) {
						show_crm_popup($company_popup);
					}
					return false;
				});
				
				$body.on('click', '.get-company-info1', function () {
					var $this = $(this);
					var c_id=$(this).closest('td').find('a').attr('data-id');
					$(this).closest('tr').addClass('active');
					$company_popup_content_edit.addClass('active');
					$("#a"+c_id).addClass('active');
					$.ajax({
						url: '../../editEmployee',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
							'employee_id' : c_id,
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $company_popup_content_edit);
						}
						
						// Error
						else{
							$company_popup_content_edit.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$company_popup_content_edit.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$company_popup_content_edit.removeClass('active');
					});
					
					if (!$company_popup_edit.hasClass('active')) {
						show_crm_popup($company_popup_edit);
					}
					return false;
				});
				
				$body.on('click', '.get-request-info', function () {
					var $this = $(this);
					var c_id=$(this).closest('td').find('a').attr('data-id');
					
					$request_popup_content.addClass('active');
					
					$.ajax({
						url: '../requestUpdate',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
							'employee_id' : c_id,
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $request_popup_content);
						}
						
						// Error
						else{
							$request_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$request_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$request_popup_content.removeClass('active');
					});
					
					if (!$request_popup.hasClass('active')) {
						show_crm_popup($request_popup);
					}
					return false;
				});
				
				$body.on('click', '.get-fortnox-info', function () {
					var $this = $(this);
					var c_id=$(this).closest('td').find('a').attr('data-id');
					
					$fortnox_popup_content.addClass('active');
					
					$.ajax({
						url: '../fortnoxUpdate',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
							'employee_id' : c_id,
						},
					})
					.done(function(data){
						
						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $fortnox_popup_content);
						}
						
						// Error
						else{
							$fortnox_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$fortnox_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$fortnox_popup_content.removeClass('active');
					});
					
					if (!$fortnox_popup.hasClass('active')) {
						show_crm_popup($fortnox_popup);
					}
					return false;
				});
				
				// Populate popup with company info
				var populate_profile = function(data, $container){
					var html = '<div><h2 class="xxs-dnone mar0 padrl20 padtb10 lgn_hight_20 fsz18 white_txt frmlblue_bg">' + data.user.name + '</h2>';
					html += '<div class="padb80 xxs-pad0 xxs-padb80">';
					
					// Top info
					html += '<div class="xxs-mar0 pad20 xxs-pad0 bxsh_016_577376_035 xxs-bxsh_none bg_f"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035">';
					html += '<div class="hei_125p dnone xxs-dblock padt20 bg_31932c">';
					html += '<div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="popup-close wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a>';
					html += '<div class="minwi_0 flex_1 talc">';
					if(data.job.description){
						html += '<div class="ovfl_hid ws_now txtovfl_el fsz18">' + data.job.description + '</div>';
					}
					if(data.job.match){
						html += '<div class="fsz16">' + data.job.match + '</div>';
					}
					html += '</div>';
					html += '<div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div>';
					if(data.job.best_match){
						html += '<div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>' + data.job.best_match + '</div>';
					}
					html += '</div>';
					
					if(data.user.avatar){
						html += '<div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50 padr15 xxs-pad0 xxs-marb5"><img src="' + data.user.avatar + '" width="100" height="100" class="dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brdrad100" title="' + data.user.name + '" alt="' + data.user.name + '"></div>';
					}
					
					html += '<div class="flex_1 xxs-dflex xxs-fxdir_col xxs-padrl20 xxs-talc">';
					html += '<div class="dflex xxs-dblock xxs-order_1 alit_fs justc_sb padb10 xxs-pad0"><h3 class="mar0 marb10 xxs-mar0 pad0 bold fsz22">' + data.user.name + '</h3>';
					if(data.user.rate){
						html += '<div class="xxs-dnone marb10 fsz22">' + data.user.rate.amount + ' /' + data.user.rate.period + '</div>';
					}
					html += '</div>';
					
					if(data.user.description){
						html += '<div class="xxs-order_3 marb10 xxs-marb5 lgn_hight_24 xxs-bold fsz15 xxs-fsz26">' + data.user.description + '</div>';
					}
					if(data.user.rising_talent){
						html += '<div class="dnone xxs-dblock xxs-order_4 marb15 uppercase txt_14bff5"><span class="fa fa-star"></span> ' + data.user.rising_talent + '</div>';
					}
					if(data.user.rate){
						html += '<div class="dnone xxs-dblock xxs-order_5 txt_8e"><span class="bold fsz26 txt_37a000">' +data.user.rate.amount + '</span> /' + data.user.rate.period + '</div>';
					}
					if(data.user.location || data.user.time){
						html += '<div class="xxs-order_2 marb10 xxs-marb15 xxs-fsz18 xxs-txt_8e">';
						html += '<span class="fa fa-map-marker xxs-dnone"></span> <span class="xxs-dnone">' + data.user.location + ' - ' + data.user.time.full + '</span>';
						html += '<span class="dnone xxs-dblock">' + data.user.location + ', ' + data.user.time.short + '</span>';
						html += '</div>';
					}
					
					if(data.user.skills){
						html += '<div class="xxs-dnone marl-5 fsz12">';
						var inline_skills = data.user.skills.inline,
						inline_more_skills = data.user.skills.inlne_more;
						if(inline_skills){
							for(var s = 0, sL = inline_skills.length; s < sL; s++){
								html += '<span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_skills[s] + '</span>';
							}	
						}
						if(inline_more_skills){
							for(var s = 0, sL = inline_more_skills.length; s < sL; s++){
								html += '<span class="dnone diblock_pa marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_more_skills[s] + '</span>';
							}
							html += '<a href="#" class="class-toggler diblock dnone_pa marbl10 bold fsz13 txt_37a000" data-target="parent" data-classes="active">See more</a>';
						}
						html += '</div>';
					}
					
					if(data.user.jobs || data.user.hours){
						html += '<div class="dnone xxs-dblock xxs-order_6 mart20 padtb15 brdt txt_8e">';
						if(data.user.jobs){
							html += '<span class="marrl5"><span class="bold txt_0">' + data.user.jobs + '</span> jobs</span>';
						}
						if(data.user.hours){
							html += '<span class="marrl5"><span class="bold txt_0">' + data.user.hours + '</span> hours</span>';
						}
						html += '</div>';
					}
					
					html += '</div></div>';
					
					if(data.sections){
						var overview;
						
						for(var s = 0, sL = data.sections.length; s < sL; s++){
							var section = data.sections[s];
							if(section.tag === 'overview'){
								overview = section;
								break;
							}
						}
						
						if(overview){
							html += '<div class="xxs-dnone mart10 padt20 brdt"><h3 class="mar0 marb20 pad0 bold fsz22">' + overview.label + '</h3>';
							if(overview.content){
								if(overview.content.html){
									html += overview.content.html;
								}
								if(overview.content.more){
									html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
								}
							}
							html += '</div>';
						}
					}
					
					html += '</div>';
					
					
					// Sections
					if(data.sections){
						for(var s = 0, sL = data.sections.length; s < sL; s++){
							var section = data.sections[s];
							html += '<div class="mart20 xxs-mart15 xxs-marrl10 bxsh_016_577376_035 bg_f' + (section.class ? ' ' + section.class : '') + '">';
							html += '<h3 class="mar0 pad20 xxs-padt10 xxs-padb15 brdb xxs-nobrd xxs-talc bold xxs-fntwei_n fsz22 xxs-txt_8e">' + section.label + '</h3>';
							
							// - section content
							if(section.content){
								html += '<div class="pad20 xxs-pad15 xxs-padt0">';
								
								if(section.content.html){
									html += section.content.html;
								}
								
								if(section.content.more){
									html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
								}
								
								var inline_content = section.content.inline;
								if(inline_content){
									for(var i = 0, iL = inline_content.length; i < iL; i++){
										html += '<span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_content[i] + '</span>';
									}
								}
								
								var inline_content_more = section.content.inline_more;
								if(inline_content_more){
									for(var i = 0, iL = inline_content_more.length; i < iL; i++){
										html += '<span class="dnone diblock_pa marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_content_more[i] + '</span>';
									}
									html += '<a href="#" class="class-toggler wi_100 dblock dnone_pa mart10 talc bold txt_37a000" data-target="parent" data-classes="active">See more</a><a href="#" class="class-toggler wi_100 dnone dblock_pa mart10 talc bold txt_37a000" data-target="parent" data-classes="active">See less</a>';
								}
								html += '</div>';
							}
							
							
							//  - timeline
							if(section.timeline){
								html += '<div class="padt20 xxs-padt0 xxs-padrl15 padb5"><div class="career_timeline xs-mar0 xs-padrl20 xs-nobrd xxs-fsz16"><span class="trend_start xs-dnone"></span>';
								for(var t = 0, tL = section.timeline.length; t < tL; t++){
									var timeline = section.timeline[t];
									html += '<div class="career_year_exp pos_rel marb15 padb15 xs-brdb">';
									
									if(timeline.year){
										html += '<span class="year_trend xs-pos_stai xs-marb5"><span>' + timeline.year + '</span></span>';
									}
									if(timeline.title){
										html += '<div class="padb5 fsz18 xxs-fsz17 txt_0">' + timeline.title + '</div>';
									}
									if(timeline.short_description){
										html += '<p>' + timeline.short_description + '</p>';
									}
									if(timeline.description){
										html += '<div>' + timeline.description + '</div>';
									}
									
									html += '</div>';
								}
								html += '</div></div>';
							}
							html += '</div>';
						}
					}
					
					html += '</div><div class="wi_720p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot0 right0 bs_bb pad10 bg_f"><div class="dflex talc bold"><div class="wi_50 padrl10"><a href="#" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Message</a></div><div class="wi_50 padrl10"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Hire</a></div></div></div></div>';
					$container
					.removeClass('active')
					.html(html);
				}
				
				
				
				// Show company popup and call population function
				/*$body.on('click', '.get-company-info', function () {
					var $this = $(this);
					if ($window.width() > 991) {
					close_crm_popup($employee_popup);
					$company_popup_content.addClass('active');
					
					$.ajax({
					url: '../../profileInfo',
					type: 'POST',
					dataType: 'json',
					data: {
					'id': $this.data('id'),
					},
					})
					.done(function(data){
					
					// Success
					if(data.status == 'ok'){
					populate_company(data.message, $company_popup_content);
					}
					
					// Error
					else{
					$company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
					})
					.fail(function(){
					$company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
					$company_popup_content.removeClass('active');
					});
					
					if (!$company_popup.hasClass('active')) {
					show_crm_popup($company_popup);
					}
					return false;
					}
					});
				*/
				// Show new company popup
				// Show employee popup and call population function
				$body.on('click', '.get-employee-info', function () {
					var $this = $(this);
					if ($window.width() > 991) {
						close_crm_popup($company_popup);
						$employee_popup.data({
							'keep': $this.data('keep'),
							'$pop': $company_popup
						});
						$employee_popup_content.addClass('active');
						
						$.ajax({
							url: 'employee_info.php',
							type: 'POST',
							dataType: 'json',
							data: {
								'id': $this.data('id'),
							},
						})
						.done(function(data){
							
							// Success
							if(data.status == 'ok'){
								populate_employees(data.message, $employee_popup_content);
							}
							
							// Error
							else{
								$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
							}
						})
						.fail(function(){
							$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
						})
						.always(function(){
							$employee_popup_content.removeClass('active');
						});
						
						if (!$employee_popup.hasClass('active')) {
							show_crm_popup($employee_popup);
						}
						return false;
					}
				});
				
				// Show new employee popup
				$body.on('click', '#new-employee-btn a', function () {
					var $this = $(this);
					if ($window.width() > 991) {
						close_crm_popup($company_popup);
						$employee_popup.data({
							'keep': $this.data('keep'),
							'$pop': $company_popup
						});
						$employee_popup_content.addClass('active');
						
						$.ajax({
							url: 'new_employee_info.php',
							type: 'POST',
							dataType: 'json',
							data: {
								'id': $this.data('id'),
							},
						})
						.done(function(data){
							
							// Success
							if(data.status == 'ok'){
								populate_employees(data.message, $employee_popup_content);
							}
							
							// Error
							else{
								$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
							}
						})
						.fail(function(){
							$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
						})
						.always(function(){
							$employee_popup_content.removeClass('active');
						});
						
						if (!$employee_popup.hasClass('active')) {
							show_crm_popup($employee_popup);
						}
						return false;
					}
				});
				
				// Show new person popup
				$body.on('click', '#new-person-btn a', function () {
					var $this = $(this);
					console.log($this);
					if ($window.width() > 991) {
						close_crm_popup($company_popup);
						$employee_popup.data({
							'keep': $this.data('keep'),
							'$pop': $company_popup
						});
						$employee_popup_content.addClass('active');
						
						$.ajax({
							url: 'new_person_info.php',
							type: 'POST',
							dataType: 'json',
							data: {
								'id': $this.data('id'),
							},
						})
						.done(function(data){
							
							// Success
							if(data.status == 'ok'){
								populate_employees(data.message, $employee_popup_content);
							}
							
							// Error
							else{
								$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
							}
						})
						.fail(function(){
							$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
						})
						.always(function(){
							$employee_popup_content.removeClass('active');
						});
						
						if (!$employee_popup.hasClass('active')) {
							show_crm_popup($employee_popup);
						}
						return false;
					}
				});
				
				// Show new company person popup
				$body.on('click', '.get-new-employee', function () {
					var $this = $(this);
					if ($window.width() > 991) {
						close_crm_popup($company_popup);
						$employee_popup.data({
							'keep': $this.data('keep'),
							'$pop': $company_popup
						});
						$employee_popup_content.addClass('active');
						
						$.ajax({
							url: 'new_company_person_info.php',
							type: 'POST',
							dataType: 'json',
							data: {
								'id': $this.data('id'),
							},
						})
						.done(function(data){
							
							// Success
							if(data.status == 'ok'){
								populate_employees(data.message, $employee_popup_content);
							}
							
							// Error
							else{
								$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
							}
						})
						.fail(function(){
							$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
						})
						.always(function(){
							$employee_popup_content.removeClass('active');
						});
						
						if (!$employee_popup.hasClass('active')) {
							show_crm_popup($employee_popup);
						}
						return false;
					}
				});
				
				// Close popup
				$body.on('click', '.crm-popup .popup-close', function () {
					close_crm_popup($(this).closest('.crm-popup'));
					return false;
				});
				
				
				
				
				// Count selected
				$body.on('ifChecked ifUnchecked', 'input[type=checkbox].toggle-visited', function(event){
					var $this = $(this),
					$form = $this.closest('form'),
					$count_target = $form.data('$count_target'),
					$inputs = $form.find('input[type=checkbox].toggle-visited:checked');
					//alert($inputs.length);
					if(!$count_target){
						//alert($count_target);
						$count_target = $($form.data('count-target'));
						$form.data('$count_target', $count_target);
					}
					if($count_target[0]){
						alert($count_target.html($inputs.length));
						$count_target.html($inputs.length);
					}
				});
				
			});
		</script>
		
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	
	



</body>

</html>