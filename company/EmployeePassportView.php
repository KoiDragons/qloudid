
<!doctype html>
<html>
<?php if($empl ['passport_image']!=null) { $filename="../estorecss/".$empl ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$empl ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $value_b=$value_a; } else { $value_a="../../../../husercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../../../husercontent/images/default-profile-pic.jpg"; ?>


<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
	<title>Qmatchup</title>
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
	<!-- Scripts -->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
	
	<script>
		var currentLang = 'sv';
		
		function imageUpdate()
		{
			
			
			var bg_url = $('#image-data').css('background-image');
			//alert(bg_url);
			if(bg_url=="" || bg_url==null || bg_url=="none")
			{
				alert("please select image");
				return false;
			}
			else
			{
			$('#image-data1').val(bg_url);
			//alert($('#image-data1').val());
			}
				document.getElementById("save_image").submit();
		}
	</script>
</head>

<body class="white_bg xs-grey_bg sm-grey_bg">
	
	<!-- HEADER -->
		<?php include 'UserHeader.php'; ?>
		<div class="clear"></div>
	
	
	<div class="column_m pos_rel">
		
		<!-- SUB-HEADER -->
		<div class="column_m hidden-xs hidden-sm lgtblue2_bg padt0" >
			<div class="column_m lgtblue2_bg" >
				<div class="wrap sub_header_brdclr_dblue bs_bb">
					<!-- Tab header -->
					<ul class="dflex alit_s justc_c mar0 pad0" style="justify-content: left;">
					<li class="dflex alself_fs marrl10 padrl5" style="height:93px;">
							<a href="https://www.qloudid.com/user/index.php/NewPersonal/userAccount" class="minwi_80p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz14 fsz15_a black_txt pblue2_txt_a pad10"><div class="dflex alit_c pos_rel padr20">
							
								<span class="active fa fa-undo hei_75p dflex alit_c justc_c talc  black_txt pblue2_txt_ph pblue2_txt_pa mar10" style="font-size: 40px;"></span>
								<div class="padl10">
									<h3 class="marb5 pad0 fsz20">Go Back</h3>
									<span style="font-size: 13px;  float:left;"> One step</span>
								</div>
								<div class="hei_60p pos_abs top5 right0 brdr"></div>
							</div></a>
						</li>
						
						
						
						<li class="dflex alit_s marrl10 padrl5" style="height:93px;">
							<a href="#" class=" minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz14 fsz14_a black_txt pblue2_txt_a popup_false pad10" data-target="#gratis_popup">
								<span class="fa fa-building-o hei_35p dflex alit_c justc_c talc fsz28 black_txt mar10"></span>
								<span class="dblock mart10">Chefs portalen</span>
							</a>
						</li>
						
						<li class="dflex alit_s marrl10 padrl5" style="height:93px;">
							<a href="#" class="minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a talc fsz14 fsz15_a black_txt pred2_txt_a popup_false pad10" data-target="#gratis_popup">
								<span class="fa fa-retweet hei_35p dflex alit_c justc_c talc fsz28 black_txt pred2_txt_ph pred2_txt_pa mar10"></span>
								<span class="dblock mart10"><?php echo $company['company_name']; ?></span>
							</a>
						</li>
						<li class="dflex alit_s marrl10 padrl5" style="height:93px;">
							<a href="#" class="active minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz14 fsz15_a black_txt pblue2_txt_a popup_false pad10" data-target="#gratis_popup">
								<span class="mar10 fa fa-briefcase hei_35p dflex alit_c justc_c talc fsz28 black_txt pred2_txt_ph pred2_txt_pa"></span>
								<span class="dblock mart10">Min profil</span>
							</a>
						</li>
						</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
		
		
		<!-- Top info -->
		<div class="scroll-fix column_m container hidden-xs hidden-sm">
			<div class="scroll-fix-wrap white_bg">
				<div class="wrap maxwi_100">
					<ul class="mar0 pad0 padb15 talc fsz15">
						<li class="diblock marrl10 padrl5"> <!--<a href="#" class="show_popup_modal dblock padtb15 fsz14 fsz15_a txt_f2f1f1 pred2_txt_h pred2_txt_a bold_a" data-target="#sales_popup">Work profile</a>--> </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		
		<!-- CONTENT -->
		<div class="column_m container zi5 padt10">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				<!-- Left sidebar -->
				<div class="wi_240p fleft pos_rel zi50">
					<div class="padrl10">
						
						<!-- Scroll menu -->
						<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
							<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 padt5 white_bg fsz14" id="scroll_menu">
								
							<!--	<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
									<div class="imgwrap nobrd">
										<div class="cropped_image"></div>
										<div class="subimg_load">
											<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
										</div>
									</div>
								</div>-->
								
								<ul class="mar0 pad0">
									<li class="dblock padrb10 padl8">
										<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 pred2_bg_h pred2_bg_a dark_grey_txt white_txt_h white_txt_a">
											<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
											<span class="valm">Newsfeed</span>
											<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
										</a>
									</li>
									<!--<li class="dblock padrb10 padl8">
										<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 pred2_bg_h pred2_bg_a dark_grey_txt white_txt_h white_txt_a">
											<span class="fa fa-comment-o wi_20p dnone_pa"></span>
											<span class="valm">Messages</span>
											<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
										</a>
									</li>-->
								</ul>
										
								<div class="mart10 marr40 marb20 brdt"></div>
								
								<ul class="dblock mar0 padl20 fsz13">
									
									<!-- Newsfeed -->
									<li class="dblock pos_rel padb20 padl30 brdl brdclr_hgrey brdclr_pred2_a">
										<h4 class="padb5 uppercase ff-sans black_txt">Newsfeed</h4>
										<ul class="mar0 pad0">
											<li class="dblock padrb10">
												<a href="#" data-id="scroll-section-1" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pred2_h brdclr_pred2_a pred2_bg_h pred2_bg_a black_txt white_txt_h white_txt_a"> <span class="valm">News</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pred2_bg rotate45"></div>
												</a>
											</li>
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pred2_bg_pa  white_txt_pa">1</div>
									</li>
									
									<!-- Company -->
									<li class="active dblock pos_rel padb20 padl30  brdclr_hgrey brdclr_pred2_a">
										<h4 class="padb5 uppercase ff-sans black_txt">Employee</h4>
										<ul class="marr20 pad0">
											<li class="dblock padrb10">
												<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm">Passport</span>
													<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
												</a>
											</li>
											
											
											
										</ul>
										<div class="wi_26p hei_26p pos_abs top0 left-13p brd talc lgn_hight_26 lgtgrey_bg pblue2_bg_pa  black_txt_pa">2</div>
									</li>
									
								
								</ul>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				
				<!-- Center content -->
				<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg">
				
					<!-- About us -->
						<div class="marrl10 white_bg" style="box-shadow: rgba(0,0,0,.1) 10px 2px 40px;">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									<div class="idcard_header wi_100 xs-wi_70 xs-order_2 bs_bb marb10 xs-padl5 sm-padl5">
										<h2 class="dnone xs-dblock padb15 uppercase bold fsz18">Cloud ID Business</h2>
										<div>
											<img src="<?php echo $path;?>html/usercontent/images/flag.png" width="40" class="marr5 valm">
											<span class="valm bold xs-nobold fsz24 xs-fsz15">Employee</span>
											<span class="dblock xs-dnone bold fsz14">Passport</span>
										</div>
										<div class="dnone xs-dblock mart10">
											<img src="<?php echo $path;?>html/usercontent/images/score.png" width="40" class="marr5 valm">
											<span class="valm bold xs-nobold fsz24 xs-fsz15">100/70</span>
										</div>
									</div>
									<!--<div class="clear hidden-xs"></div>-->
									<div class="wi_30 xs-order_1">
									<form method="POST" action="#" id="save_image" name="save_image" >
										<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
									<div class="imgwrap nobrd">
										<div class="cropped_image <?php if($empl ['passport_image']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" id="image-data" name="image-data"></div>
										
									</div>
								</div>
								</form>
										<div class="hidden-xs mart10 bold talc uppercase fsz16"> <a href="#" class="dblue_btn" >Update Image</a>Veteran </div>
									</div>
									<div class="wi_70 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span> Employee identification Number</span> <span class="edit-text jain dblock brdb brdclr_lgtgrey2 fsz20"><?php if($resultOrg1['e_number']!="" || $resultOrg1['e_number']!= null) echo $resultOrg1['e_number']; else echo "-"; ?> </span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Family name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $resultOrg['last_name']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Given names</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $resultOrg['first_name']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Address</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16"><?php if($resultOrg1['location']!="" || $resultOrg1['location']!= null) echo $resultOrg1['location']; else echo "-"; ?> </span></div>
										<div class="container marrl-2 padl15">
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Date of birth</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16"><?php echo $resultOrg['dob_day'].'/'.$resultOrg['dob_month'].'/'.$resultOrg['dob_year']; ?></span> </div>
											<div class="fleft wi_10  xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Sex</span> <span class=" edit-select dblock brdb brdclr_lgtgrey2 uppercase curt fsz16" data-options="M,F,T"><?php if($resultOrg['sex']==1) echo "M"; else if($resultOrg['sex']==2) echo "F"; else echo "T"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Position</span> <span class=" edit-text dblock brdb brdclr_lgtgrey2 uppercase curt fsz16"></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Resignation Date</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16"><?php if($resultOrg1['res_date']!="" || $resultOrg1['res_date']!= null) echo $resultOrg1['res_date']; else echo "-"; ?></span> </div>
											<div class="clear marb5"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Restrictions</span> <span class=" edit-text dblock brdb brdclr_lgtgrey2 uppercase curt fsz16">&nbsp;&nbsp;&nbsp;</span> </div>
											<div class="fleft wi_10  xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>&nbsp;</span> <span class="dblock uppercase bold fsz16"></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Classification</span> <span class=" edit-text dblock brdb brdclr_lgtgrey2 uppercase curt fsz16">B</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Hired Date</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16"><?php echo $resultOrg1['h_date']; ?></span> </div>
											
										</div>
									</div>
									
									<div class="qapscore_bord hidden-xs" style="position: absolute;z-index: 1;top: 130px;right: 40px;">
										<div class="score">100</div>
										<div class="score scorelevel">75</div>
									</div>
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="right_number hidden-xs bold talc fsz14"> <span>5500040N</span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						
					
					
					<!-- Marquee -->
					<div class="wi_100 visible-xs visible-sm fleft bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
						<h3 class="padb20 uppercase bold fsz16">Lediga jobb</h3>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/fb.png" width="80" title="Facebook" alt="Facebook" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/volvo.png" width="80" title="Volvo" alt="Volvo" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/spot.png" width="80" title="Spotify" alt="Spotify" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="marb15 padt15 talc fsz16"> <a href="#">View more</a> </div>
					</div>
										
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="marb20"> <img src="<?php echo $path;?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" /> </div>
					<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
					<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
					</div>
					<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
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
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
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
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
					<div>
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
					</div>
				</form>
			</div>
		</div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
	
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
</body>

</html>
</body>

</html>