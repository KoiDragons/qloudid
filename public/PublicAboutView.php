<?php $path1 = "../../html/usercontent/images/";
?>
<!doctype html>
<html>
	
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
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126618362-1');
</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<div class="column_m header header_small bs_bb bg_colorn_new" >
			<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 bg_colorn_new" >
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15">
					<a href="https://safeqloud-228cbc38a2be.herokuapp.com/"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10">
					<div class="languages">
						<a href="#" id="language_selector" class="padrl10">
							<img src="../../html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US">
							</a>
						<ul class="wi_100 mar0 pad5 blue_bg">
							<li class="dblock">
								<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
								</a>
							</li>
							<li class="dblock">
								<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="fright xs-dnone sm-dnone">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://safeqloud-228cbc38a2be.herokuapp.com/" id="usermenu_singin" class="translate hei_30pi dblock padrl25  uppercase lgn_hight_30 white_txt white_txt_h bg_f80" data-en="Close" data-sw="Close">Close</a> </li>
					</ul>
				</div>
				<div class="top_menu top_menu_custom mart2">
					<ul class="menulist">
						<li class="xs-mar0i sm-mar0i">
							<a href="#" class="class-toggler" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"> <span class="fa fa-qrcode white_txt fsz26"></span> </a>
							<ul class="dblocki_a" id="menulist-dropdown">
								<li>
									<div class="top_arrow"></div>
								</li>
								<li>
									<!-- MAIN -->
									<div class="tab-content application_menu pad20" id="tab-main">
										<ol class="tab-header">
											<li>
												<a href="#" data-id="tab-per" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Personal</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Business</a>
											</li>
										</ol>
										<div class="clear"></div>
									</div>
									<!-- PERSONAL -->
									<div class="tab-content application_menu pad20" id="tab-per">
										<ol>
											<li>
												<a href="#" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
													</div>Cloud ID</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
													</div>Verify</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-3.png" width="45" height="45" title="" alt="" />
													</div>Activate</a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-main"><span></span> Back to Business</a> </div>
										<div class="clear"></div>
									</div>
									<!-- BUSINESS -->
									<div class="tab-content application_menu pad20" id="tab-bus">
										<ol class="tab-header">
											<li>
												<a href="#" data-id="tab-bus-cld" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Cloud ID</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-vrf" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Verify</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Activate</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-eng" class="proposals">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Engage </a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-main"><span></span> Back to Qmatchup</a> </div>
										<div class="clear"></div>
									</div>
									<!-- Cloud ID -->
									<div class="tab-content application_menu pad20" id="tab-bus-cld">
										<ol>
											<li>
												<a href="#" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-4.png" width="45" height="45" title="" alt="" />
													</div>Business</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-5.png" width="45" height="45" title="" alt="" />
													</div>Employees</a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
										<div class="clear"></div>
									</div>
									<!-- Verify -->
									<div class="tab-content application_menu pad20" id="tab-bus-vrf">
										<ol>
											<li>
												<a href="#" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-6.png" width="45" height="45" title="" alt="" />
													</div>Basic - Free</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-7.png" width="45" height="45" title="" alt="" />
													</div>Full - Paid</a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
										<div class="clear"></div>
									</div>
									<!-- Activate -->
									<div class="tab-content application_menu pad20" id="tab-bus-act">
										<ol class="tab-header">
											<li>
												<a href="#" data-id="tab-bus-act-org" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>By organization</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act-ind" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>By industry</a>
											</li>
											<li>
												<a href="#" data-id="tab-bus-act-top" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>By topic</a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
										<div class="clear"></div>
									</div>
									<!-- - by organization -->
									<div class="tab-content application_menu pad20 active" id="tab-bus-act-org" style="display: block;">
										<ol>
											<li>
												<a href="#" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-8.png" width="45" height="45" title="" alt="" />
													</div>HR Portal</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-9.png" width="45" height="45" title="" alt="" />
													</div>Sales</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-10.png" width="45" height="45" title="" alt="" />
													</div>Marketing</a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
										<div class="clear"></div>
									</div>
									<!-- - by industry -->
									<div class="tab-content application_menu pad20" id="tab-bus-act-ind">
										<ol>
											<li>
												<a href="#" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-11.png" width="45" height="45" title="" alt="" />
													</div>Telemarketing</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="" />
													</div>Lawyers</a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
										<div class="clear"></div>
									</div>
									<!-- - by topic -->
									<div class="tab-content application_menu pad20" id="tab-bus-act-top">
										<ol>
											<li>
												<a href="#" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="" />
													</div>Miljöplus</a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus-act"><span></span> Back to Activate</a> </div>
										<div class="clear"></div>
									</div>
									<!-- Engage -->
									<div class="tab-content application_menu pad20" id="tab-bus-eng">
										<ol>
											<li>
												<a href="#" class="business_prof">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Employees</a>
											</li>
											<li>
												<a href="#" class="swedBank">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Customers</a>
											</li>
											<li>
												<a href="#" class="posted_jobs">
													<div><img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="" />
													</div>Suppliers</a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m tab-header"> <a href="#" class="contractor_btn" data-id="tab-bus"><span></span> Back to Business</a> </div>
										<div class="clear"></div>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.qloudid.com" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Close</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="column_m pos_rel">
		
		<div class="column_m container zi1 padtb20">
			<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel">
				<div class="white_bg tall">
					<div class="padb0 fsz20">
       
      
       <a href="#" class="marr5 black_txt">Company </a>
      
	
       
      </div>
					<!-- Logo -->
					<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30">Qmatchup </span></a> </div>
					<!-- Meta -->
					<div class="padr10 fsz12"> <span><?php date_default_timezone_set("Europe/Stockholm");   echo date("D F j, Y"); ?></span> <span class="marrl5">|</span> <span class="fa fa-file-text-o"></span> <span>Todays Paper</span> <span class="marrl5">|</span> <span class="fa fa-video-camera"></span> <span>Video</span> <span class="marrl5">|</span> <span class="fa fa-sun-o regyellow_txt"></span> <span>50&deg;F</span> </div>
				</div>
				<div class="hidden-xs hidden-sm padrl10">
					<a href="#" class="diblock padrl20 brdrad3 pred2_bg ws_now lgn_hight_29 fsz14 white_txt">
						<img src="<?php echo $path; ?>html/usercontent/images/icons/gift.png" width="20" height="20" class="marr5 valm" />
						<span class="valm">Erbjudande</span>
					</a>
				</div>
				
			</div>
		</div>
		<div class="clear"></div>
		
				<div class="column_m  hei_40p scroll-fix hidden-xs hidden-sm zi0" style="height: 40px;">
			<div class="column_m scroll-fix-wrap">
				<div class="wrap sub_header_brd_new sub_header_brdclr_dblue dflex justc_sb alit_fe bs_bb padt5 brdt_b">
					<!-- Tab header -->
					<ul class="mar0 pad0">
						<li class="diblock marr10 padr5"> <a href="PublicAboutQmatchup" class="dblock padb10 brdb brdwi_3 brdclr_trans brdclr_text_topinfo_menu_h brdclr_text_topinfo_menu_a fsz14 fsz14_a  grey_txt  " data-id="tab-HR" data-refresh="scroll">Magazine</a> </li>
						
						<li class="diblock marrl10 padrl5"> <a href="#" class="dblock padb10 brdb brdwi_3 brdclr_trans brdclr_text_topinfo_menu_h brdclr_text_topinfo_menu_a fsz14 fsz14_a  black_txt active" data-target="#gratis_popup">Om oss</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="PublicCareerPage" class=" dblock padb10 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a fsz14 fsz14_a grey_txt pred2_txt_a bold_a " data-target="#gratis_popup">Lediga jobb</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="PublicAterforsljare" class=" dblock padb10 brdb brdwi_3 brdclr_trans brdclr_pred2_h brdclr_pred2_a fsz14 fsz14_a grey_txt pred2_txt_a bold_a " data-target="#gratis_popup">Återförsäljare</a> </li>
						
					</ul>
				</div>
			</div>
		</div>
		
		
				<div class="clear"></div>	
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_640p col-xs-12 col-sm-12 fleft pos_rel zi5  fsz14 brdr padr20">
						
				
						
						<!-- Configure Data -->
						<div class=" xs-marrl0 sm-marrl0 lgtgrey2_bg brdrad3 " >
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									<div class="idcard_header wi_100 xs-wi_70 xs-order_2 bs_bb marb10 xs-padl5 sm-padl5">
										<h2 class="dnone xs-dblock padb15 uppercase bold fsz18">Business</h2>
										<div>
											<img src="../../html/usercontent/images/flag.png" width="40" class="marr5 valm">
											<span class="valm bold xs-nobold fsz24 xs-fsz15">Business</span>
											<span class="dblock xs-dnone bold fsz14">Online passport</span>
										</div>
										<div class="dnone xs-dblock mart10">
											<img src="../../html/usercontent/images/score.png" width="40" class="marr5 valm">
											<span class="valm bold xs-nobold fsz24 xs-fsz15">100/70</span>
										</div>
									</div>
									<div class="wi_30 xs-order_1">
										<div class="wp_columns_upload wp_columns_upload_custom brd brd brdwi_2 brdclr_lgtgrey2">
											<div class="imgwrap nobrd bgis_coni">
												<div class="cropped_image"></div>
												
											</div>
										</div>
										
									</div>
									
									
									
									
									<div class="wi_70 xs-wi_100 xs-order_4 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Company identification number</span> <span class="editable edit-text jain dblock brdb brdclr_lgtgrey2 fsz20">125113</span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Company name</span> <span class="editable edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">Qmatchup Inc</span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Industry</span> <span class="edit-select dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="Staffing &amp; Recruiting">Staffing &amp; Recruiting</span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Visiting address</span> <span class="editable edit-address dblock brdb brdclr_lgtgrey2 fsz16">Sweden</span> </div>
										<div class="container marrl-2 padl15 xs-pad0">
											<div class="fleft wi_33 bs_bb padrl2"> <span>Zip</span> <span class="editable edit-text jain11 dblock brdb brdclr_lgtgrey2 curt fsz16">-</span> </div>
											<div class="fleft wi_33 bs_bb padrl2"> <span>City</span> <span class="editable edit-text jain12 dblock brdb brdclr_lgtgrey2 wordb_ba curt fsz16">-</span> </div>
											<div class="fleft wi_33 bs_bb padrl2"> <span>Country</span> <span class="editable edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16" data-list="countries-list" data-post-action="add_phone_country" id="passport-country">Sweden</span> </div>
											<datalist id="countries-list">
												<option value="Abkhazia"></option>
												<option value="Afghanistan"></option>
												<option value="Albania"></option>
												<option value="Algeria"></option>
												<option value="American Samoa"></option>
												<option value="Andorra"></option>
												<option value="Angola"></option>
												<option value="Anguilla"></option>
												<option value="Antigua and Barbuda"></option>
												<option value="Argentina"></option>
												<option value="Armenia"></option>
												<option value="Aruba"></option>
												<option value="Ascension"></option>
												<option value="Australia"></option>
												<option value="Australian External Territories"></option>
												<option value="Austria"></option>
												<option value="Azerbaijan"></option>
												<option value="Bahamas"></option>
												<option value="Bahrain"></option>
												<option value="Bangladesh"></option>
												<option value="Barbados"></option>
												<option value="Barbuda"></option>
												<option value="Belarus"></option>
												<option value="Belgium"></option>
												<option value="Belize"></option>
												<option value="Benin"></option>
												<option value="Bermuda"></option>
												<option value="Bhutan"></option>
												<option value="Bolivia"></option>
												<option value="Bosnia and Herzegovina"></option>
												<option value="Botswana"></option>
												<option value="Brazil"></option>
												<option value="British Indian Ocean Territory"></option>
												<option value="British Virgin Islands"></option>
												<option value="Brunei"></option>
												<option value="Bulgaria"></option>
												<option value="Burkina Faso"></option>
												<option value="Burundi"></option>
												<option value="Cambodia"></option>
												<option value="Cameroon"></option>
												<option value="Canada"></option>
												<option value="Cape Verde"></option>
												<option value="Cayman Islands"></option>
												<option value="Central African Republic"></option>
												<option value="Chad"></option>
												<option value="Chile"></option>
												<option value="China"></option>
												<option value="Christmas Island"></option>
												<option value="Cocos-Keeling Islands"></option>
												<option value="Colombia"></option>
												<option value="Comoros"></option>
												<option value="Congo"></option>
												<option value="Congo, Dem. Rep. of (Zaire)"></option>
												<option value="Cook Islands"></option>
												<option value="Costa Rica"></option>
												<option value="Croatia"></option>
												<option value="Cuba"></option>
												<option value="Curacao"></option>
												<option value="Cyprus"></option>
												<option value="Czech Republic"></option>
												<option value="Denmark"></option>
												<option value="Diego Garcia"></option>
												<option value="Djibouti"></option>
												<option value="Dominica"></option>
												<option value="Dominican Republic"></option>
												<option value="East Timor"></option>
												<option value="Easter Island"></option>
												<option value="Ecuador"></option>
												<option value="Egypt"></option>
												<option value="El Salvador"></option>
												<option value="Equatorial Guinea"></option>
												<option value="Eritrea"></option>
												<option value="Estonia"></option>
												<option value="Ethiopia"></option>
												<option value="Falkland Islands"></option>
												<option value="Faroe Islands"></option>
												<option value="Fiji"></option>
												<option value="Finland"></option>
												<option value="France"></option>
												<option value="French Antilles"></option>
												<option value="French Guiana"></option>
												<option value="French Polynesia"></option>
												<option value="Gabon"></option>
												<option value="Gambia"></option>
												<option value="Georgia"></option>
												<option value="Germany"></option>
												<option value="Ghana"></option>
												<option value="Gibraltar"></option>
												<option value="Greece"></option>
												<option value="Greenland"></option>
												<option value="Grenada"></option>
												<option value="Guadeloupe"></option>
												<option value="Guam"></option>
												<option value="Guatemala"></option>
												<option value="Guinea"></option>
												<option value="Guinea-Bissau"></option>
												<option value="Guyana"></option>
												<option value="Haiti"></option>
												<option value="Honduras"></option>
												<option value="Hong Kong SAR China"></option>
												<option value="Hungary"></option>
												<option value="Iceland"></option>
												<option value="India"></option>
												<option value="Indonesia"></option>
												<option value="Iran"></option>
												<option value="Iraq"></option>
												<option value="Ireland"></option>
												<option value="Israel"></option>
												<option value="Italy"></option>
												<option value="Ivory Coast"></option>
												<option value="Jamaica"></option>
												<option value="Japan"></option>
												<option value="Jordan"></option>
												<option value="Kazakhstan"></option>
												<option value="Kenya"></option>
												<option value="Kiribati"></option>
												<option value="Kuwait"></option>
												<option value="Kyrgyzstan"></option>
												<option value="Laos"></option>
												<option value="Latvia"></option>
												<option value="Lebanon"></option>
												<option value="Lesotho"></option>
												<option value="Liberia"></option>
												<option value="Libya"></option>
												<option value="Liechtenstein"></option>
												<option value="Lithuania"></option>
												<option value="Luxembourg"></option>
												<option value="Macau SAR China"></option>
												<option value="Macedonia"></option>
												<option value="Madagascar"></option>
												<option value="Malawi"></option>
												<option value="Malaysia"></option>
												<option value="Maldives"></option>
												<option value="Mali"></option>
												<option value="Malta"></option>
												<option value="Marshall Islands"></option>
												<option value="Martinique"></option>
												<option value="Mauritania"></option>
												<option value="Mauritius"></option>
												<option value="Mayotte"></option>
												<option value="Mexico"></option>
												<option value="Micronesia"></option>
												<option value="Midway Island"></option>
												<option value="Moldova"></option>
												<option value="Monaco"></option>
												<option value="Mongolia"></option>
												<option value="Montenegro"></option>
												<option value="Montserrat"></option>
												<option value="Morocco"></option>
												<option value="Myanmar"></option>
												<option value="Namibia"></option>
												<option value="Nauru"></option>
												<option value="Nepal"></option>
												<option value="Netherlands"></option>
												<option value="Netherlands Antilles"></option>
												<option value="Nevis"></option>
												<option value="New Caledonia"></option>
												<option value="New Zealand"></option>
												<option value="Nicaragua"></option>
												<option value="Niger"></option>
												<option value="Nigeria"></option>
												<option value="Niue"></option>
												<option value="Norfolk Island"></option>
												<option value="North Korea"></option>
												<option value="Northern Mariana Islands"></option>
												<option value="Norway"></option>
												<option value="Oman"></option>
												<option value="Pakistan"></option>
												<option value="Palau"></option>
												<option value="Palestinian Territory"></option>
												<option value="Panama"></option>
												<option value="Papua New Guinea"></option>
												<option value="Paraguay"></option>
												<option value="Peru"></option>
												<option value="Philippines"></option>
												<option value="Poland"></option>
												<option value="Portugal"></option>
												<option value="Puerto Rico"></option>
												<option value="Qatar"></option>
												<option value="Reunion"></option>
												<option value="Romania"></option>
												<option value="Russia"></option>
												<option value="Rwanda"></option>
												<option value="Samoa"></option>
												<option value="San Marino"></option>
												<option value="Saudi Arabia"></option>
												<option value="Senegal"></option>
												<option value="Serbia"></option>
												<option value="Seychelles"></option>
												<option value="Sierra Leone"></option>
												<option value="Singapore"></option>
												<option value="Slovakia"></option>
												<option value="Slovenia"></option>
												<option value="Solomon Islands"></option>
												<option value="South Africa"></option>
												<option value="South Georgia and the South Sandwich Islands"></option>
												<option value="South Korea"></option>
												<option value="Spain"></option>
												<option value="Sri Lanka"></option>
												<option value="Sudan"></option>
												<option value="Suriname"></option>
												<option value="Swaziland"></option>
												<option value="Sweden"></option>
												<option value="Switzerland"></option>
												<option value="Syria"></option>
												<option value="Taiwan"></option>
												<option value="Tajikistan"></option>
												<option value="Tanzania"></option>
												<option value="Thailand"></option>
												<option value="Timor Leste"></option>
												<option value="Togo"></option>
												<option value="Tokelau"></option>
												<option value="Tonga"></option>
												<option value="Trinidad and Tobago"></option>
												<option value="Tunisia"></option>
												<option value="Turkey"></option>
												<option value="Turkmenistan"></option>
												<option value="Turks and Caicos Islands"></option>
												<option value="Tuvalu"></option>
												<option value="U.S. Virgin Islands"></option>
												<option value="Uganda"></option>
												<option value="Ukraine"></option>
												<option value="United Arab Emirates"></option>
												<option value="United Kingdom"></option>
												<option value="United States"></option>
												<option value="Uruguay"></option>
												<option value="Uzbekistan"></option>
												<option value="Vanuatu"></option>
												<option value="Venezuela"></option>
												<option value="Vietnam"></option>
												<option value="Wake Island"></option>
												<option value="Wallis and Futuna"></option>
												<option value="Yemen"></option>
												<option value="Zambia"></option>
												<option value="Zanzibar"></option>
												<option value="Zimbabwe"></option>
											</datalist>
											
											<div class="clear marb5"></div>
											
											<div class="fleft wi_50 bs_bb padrl2">
												<span>Phone</span>
												<div class="dflex alit_c pos_rel brdb brdclr_lgtgrey2">
													<span class="padr5" id="phone-country-flag"><img src="../../html/usercontent/images/flags/default.png" height="18" class="dblock"></span>
													<span class="padr5 uppercase fsz16" id="phone-country"></span>
													<span class="editable edit-phone dblock flex_1 uppercase wordb_ba curt fsz16">123456789</span>
												</div>
											</div>
											
											<div class="fleft wi_50 bs_bb padrl2 brdb brdclr_lgtgrey2"> <span>Website</span> <span class="edit-text dblock curt fsz16">gmail.com</span> </div>
											<div class="clear marb10"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Founded</span> <span class="editable edit-datepicker jain2 dblock brdb brdclr_lgtgrey2 curp fsz16">01/03/2017</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Annual Turnover</span> <span class="editable edit-select jain4 dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="0,< 1 tkr, 1 - 499 tkr, 500 - 999 tkr, 1000 - 9999 tkr, 10 000 - 49 999 tkr, 50 000 - 499 999 tkr, > 499 999 tkr">&lt; 1 tkr</span> </div>
											<div class="clear visible-xs visible-sm marb10"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Employee Size</span> <span class="editable edit-select jain5 dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="0,1 - 4,5 - 9,10 - 19,20 - 49,50 - 99,100 - 199,200 - 999,> 1000">5 - 9</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Validated Until</span> <span class="editable edit-datepicker jain3 dblock brdb brdclr_lgtgrey2 curp fsz16">01/04/2017</span> </div>
											<div class="clear visible-xs visible-sm marb10"></div>
											
											<input type="hidden" id="company_id" value="1">
										</div>
									</div>
										<div class="qapscore_bord hidden-xs" style="position: absolute; z-index: 1; top: 74px; right: 40px;">
									
									<div class="scorenew scorelevelnew">A</div>
								</div>
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span>5500040N</span> </div>
								</div>
								
								
								<script>
									var countries_flags = {
										'United States' : 'images/flags/us.png',
										'Canada' : 'images/flags/cd.png',
										'Turkey' : 'images/flags/tr.png',
									};
									var countries_codes = {"Abkhazia" : "+7 840 ","Afghanistan" : "+93 ","Albania" : "+355 ","Algeria" : "+213 ","American Samoa" : "+1 684 ","Andorra" : "+376 ","Angola" : "+244 ","Anguilla" : "+1 264 ","Antigua and Barbuda" : "+1 268 ","Argentina" : "+54 ","Armenia" : "+374 ","Aruba" : "+297 ","Ascension" : "+247 ","Australia" : "+61 ","Australian External Territories" : "+672 ","Austria" : "+43 ","Azerbaijan" : "+994 ","Bahamas" : "+1 242 ","Bahrain" : "+973 ","Bangladesh" : "+880 ","Barbados" : "+1 246 ","Barbuda" : "+1 268 ","Belarus" : "+375 ","Belgium" : "+32 ","Belize" : "+501 ","Benin" : "+229 ","Bermuda" : "+1 441 ","Bhutan" : "+975 ","Bolivia" : "+591 ","Bosnia and Herzegovina" : "+387 ","Botswana" : "+267 ","Brazil" : "+55 ","British Indian Ocean Territory" : "+246 ","British Virgin Islands" : "+1 284 ","Brunei" : "+673 ","Bulgaria" : "+359 ","Burkina Faso" : "+226 ","Burundi" : "+257 ","Cambodia" : "+855 ","Cameroon" : "+237 ","Canada" : "+1 ","Cape Verde" : "+238 ","Cayman Islands" : "+ 345 ","Central African Republic" : "+236 ","Chad" : "+235 ","Chile" : "+56 ","China" : "+86 ","Christmas Island" : "+61 ","Cocos-Keeling Islands" : "+61 ","Colombia" : "+57 ","Comoros" : "+269 ","Congo" : "+242 ","Congo, Dem. Rep. of (Zaire)" : "+243 ","Cook Islands" : "+682 ","Costa Rica" : "+506 ","Croatia" : "+385 ","Cuba" : "+53 ","Curacao" : "+599 ","Cyprus" : "+537 ","Czech Republic" : "+420 ","Denmark" : "+45 ","Diego Garcia" : "+246 ","Djibouti" : "+253 ","Dominica" : "+1 767 ","Dominican Republic" : "+1 809 ","East Timor" : "+670 ","Easter Island" : "+56 ","Ecuador" : "+593 ","Egypt" : "+20 ","El Salvador" : "+503 ","Equatorial Guinea" : "+240 ","Eritrea" : "+291 ","Estonia" : "+372 ","Ethiopia" : "+251 ","Falkland Islands" : "+500 ","Faroe Islands" : "+298 ","Fiji" : "+679 ","Finland" : "+358 ","France" : "+33 ","French Antilles" : "+596 ","French Guiana" : "+594 ","French Polynesia" : "+689 ","Gabon" : "+241 ","Gambia" : "+220 ","Georgia" : "+995 ","Germany" : "+49 ","Ghana" : "+233 ","Gibraltar" : "+350 ","Greece" : "+30 ","Greenland" : "+299 ","Grenada" : "+1 473 ","Guadeloupe" : "+590 ","Guam" : "+1 671 ","Guatemala" : "+502 ","Guinea" : "+224 ","Guinea-Bissau" : "+245 ","Guyana" : "+595 ","Haiti" : "+509 ","Honduras" : "+504 ","Hong Kong SAR China" : "+852 ","Hungary" : "+36 ","Iceland" : "+354 ","India" : "+91 ","Indonesia" : "+62 ","Iran" : "+98 ","Iraq" : "+964 ","Ireland" : "+353 ","Israel" : "+972 ","Italy" : "+39 ","Ivory Coast" : "+225 ","Jamaica" : "+1 876 ","Japan" : "+81 ","Jordan" : "+962 ","Kazakhstan" : "+7 7 ","Kenya" : "+254 ","Kiribati" : "+686 ","Kuwait" : "+965 ","Kyrgyzstan" : "+996 ","Laos" : "+856 ","Latvia" : "+371 ","Lebanon" : "+961 ","Lesotho" : "+266 ","Liberia" : "+231 ","Libya" : "+218 ","Liechtenstein" : "+423 ","Lithuania" : "+370 ","Luxembourg" : "+352 ","Macau SAR China" : "+853 ","Macedonia" : "+389 ","Madagascar" : "+261 ","Malawi" : "+265 ","Malaysia" : "+60 ","Maldives" : "+960 ","Mali" : "+223 ","Malta" : "+356 ","Marshall Islands" : "+692 ","Martinique" : "+596 ","Mauritania" : "+222 ","Mauritius" : "+230 ","Mayotte" : "+262 ","Mexico" : "+52 ","Micronesia" : "+691 ","Midway Island" : "+1 808 ","Moldova" : "+373 ","Monaco" : "+377 ","Mongolia" : "+976 ","Montenegro" : "+382 ","Montserrat" : "+1664 ","Morocco" : "+212 ","Myanmar" : "+95 ","Namibia" : "+264 ","Nauru" : "+674 ","Nepal" : "+977 ","Netherlands" : "+31 ","Netherlands Antilles" : "+599 ","Nevis" : "+1 869 ","New Caledonia" : "+687 ","New Zealand" : "+64 ","Nicaragua" : "+505 ","Niger" : "+227 ","Nigeria" : "+234 ","Niue" : "+683 ","Norfolk Island" : "+672 ","North Korea" : "+850 ","Northern Mariana Islands" : "+1 670 ","Norway" : "+47 ","Oman" : "+968 ","Pakistan" : "+92 ","Palau" : "+680 ","Palestinian Territory" : "+970 ","Panama" : "+507 ","Papua New Guinea" : "+675 ","Paraguay" : "+595 ","Peru" : "+51 ","Philippines" : "+63 ","Poland" : "+48 ","Portugal" : "+351 ","Puerto Rico" : "+1 787 ","Qatar" : "+974 ","Reunion" : "+262 ","Romania" : "+40 ","Russia" : "+7 ","Rwanda" : "+250 ","Samoa" : "+685 ","San Marino" : "+378 ","Saudi Arabia" : "+966 ","Senegal" : "+221 ","Serbia" : "+381 ","Seychelles" : "+248 ","Sierra Leone" : "+232 ","Singapore" : "+65 ","Slovakia" : "+421 ","Slovenia" : "+386 ","Solomon Islands" : "+677 ","South Africa" : "+27 ","South Georgia and the South Sandwich Islands" : "+500 ","South Korea" : "+82 ","Spain" : "+34 ","Sri Lanka" : "+94 ","Sudan" : "+249 ","Suriname" : "+597 ","Swaziland" : "+268 ","Sweden" : "+46 ","Switzerland" : "+41 ","Syria" : "+963 ","Taiwan" : "+886 ","Tajikistan" : "+992 ","Tanzania" : "+255 ","Thailand" : "+66 ","Timor Leste" : "+670 ","Togo" : "+228 ","Tokelau" : "+690 ","Tonga" : "+676 ","Trinidad and Tobago" : "+1 868 ","Tunisia" : "+216 ","Turkey" : "+90 ","Turkmenistan" : "+993 ","Turks and Caicos Islands" : "+1 649 ","Tuvalu" : "+688 ","U.S. Virgin Islands" : "+1 340 ","Uganda" : "+256 ","Ukraine" : "+380 ","United Arab Emirates" : "+971 ","United Kingdom" : "+44 ","United States" : "+1 ","Uruguay" : "+598 ","Uzbekistan" : "+998 ","Vanuatu" : "+678 ","Venezuela" : "+58 ","Vietnam" : "+84 ","Wake Island" : "+1 808 ","Wallis and Futuna" : "+681 ","Yemen" : "+967 ","Zambia" : "+260 ","Zanzibar" : "+255 ","Zimbabwe" : "+263 "}
									function add_phone_country(){
										var country = $('#passport-country').text().trim(),
										url = '',
										code = '';
										
										try{url = countries_flags[country];}
										catch(e){}
										
										var $phone = $('#phone-country-flag');
										if(url){
											$phone.html('<img src="' + url + '" style="width: auto; height: 18px; display: block;" />');
											} else{
											$phone.html('<img src="images/flags/default.png" style="width: auto; height: 18px; display: block;" />');
										}
										
										try{code = countries_codes[country];}
										catch(e){}
										
										var $code = $('#phone-country');
										if(code){
											$code.html(code);
											} else{
											$phone.html('');
										}
									}
								</script>		
							</div>
						</div>
						<div class=" bs_bb mart20">
							
							
							
							
							<table class="wi_100" cellpadding="0" cellspacing="0">
								<tbody>
									<tr class="odd">
										<td class="wi_100 padtb30 valm talc lgtblue2_bg padrl10">
											<div class="padrl30 talc">
												<h2 class="padb30 talc fsz28 lgn_hight_s1 bold black_txt">Intro <br>Business Info</h2>
												<h3 class="fsz20">Här är våra tjänster för dig</h3>
												<p> En HR-avdelning måste ha många strängar på sin lyra. Förhandling, avtal, policys, arbetsmiljö, arbetsrätt, kollektivavtal, ledarskapsutveckling, intern kommunikation. Och så fortsätter listan. Hos oss kan du skräddarsy din egen HR-lösning som passar din vardag. Du kan välja mellan allt från HR Expert som täcker dina grundbehov i arbetsmiljö och arbetsrätt, till skräddarsydda portallösningar som fungerar likt ett intranät för din organisation. </p>
												<div class="mart15">
													<a href="connect.html" class="style_base diblock pos_rel padtb10 padrl30 pgreen_bg lgn_hight_20 talc fsz20 white_txt">
														<span class="wi_22p wi_36p_sbh hei_100 dblock opa30 pos_abs top0 left0 white_bg trans_all2"></span>
														<span class="dblock">Få en personlig visning</span>
													</a>
												</div>
											</div>
										</td>
										
									</tr>
								</tbody>
							</table>
						</div>
						
						
						
						
						<div class="bs_bb brdrad3 mart20  lgtgrey2_bg">
							<div class="padtrl15">
							<h2 class="black_txt fsz28 padb10 talc bold">Timeline &nbsp;&nbsp;&nbsp;</h2> </div>
							
							<form action="updateUserExperience" method="POST" name="experiance" id="experiance" accept-charset="ISO-8859-1">	
								<div class="exp_sum_form lgtgrey_bg hide pad15">
									<div class="input_fields_list ">
										<ul>
											<li>
												<div class="field_labl  xs-dnone">Compnay name</div>
												<div class="field_box xs-wi_100i">
													<input class="input_white_field wi_100" onkeyup="company_select(this.value);" type="text" name="com_name" id="com_name" list="company_names">
													<datalist id="company_names">
														
													</datalist>
													
												</div>
											</li>
											<input type="hidden" name="comp_experiance_loop" value="">
											<li>
												<div class="field_labl  xs-dnone">Title</div>
												<div class="field_box xs-wi_100i">
													<input class="input_white_field wi_100" type="text" name="com_title" id="com_title">
												</div>
											</li>
											<li>
												<div class="field_labl  xs-dnone">Location</div>
												<div class="field_box xs-wi_100i">
													<input class="input_white_field wi_100" type="text" name="com_loc" id="com_loc">
												</div>
											</li>
											<li>
												<div class="field_labl xs-dnone">Time Period</div>
												<div class="field_box xs-wi_100i">
													<div class="dflex xxs-fxwrap_w alit_c">
														
														<div class="wi_25 xxs-wi_50 xxs-marb10">
															<select name="com_start_month" id="com_start_month" class="input_white_field">
																<option value="0">Select</option>
																<option value="1">January</option>
																<option value="2">February</option>
																<option value="3">March</option>
																<option value="4">April</option>
																<option value="5">May</option>
																<option value="6">June</option>
																<option value="7">July</option>
																<option value="8">August</option>
																<option value="9">September</option>
																<option value="10">October</option>
																<option value="11">November</option>
																<option value="12">December</option>
															</select>
														</div>
														<div class="wi_25 xxs-wi_50 xxs-marb10">
															<select name="com_start_year" id="com_start_year" class="input_white_field wi_100">
																<option value="0">Select</option>
																<option value="2016">2016</option>
																<option value="2015">2015</option>
																<option value="2014">2014</option>
																<option value="2013">2013</option>
																<option value="2012">2012</option>
																<option value="2011">2011</option>
																<option value="2010">2010</option>
																<option value="2009">2009</option>
																<option value="2008">2008</option>
																<option value="2007">2007</option>
																<option value="2006">2006</option>
																<option value="2005">2005</option>
																<option value="2004">2004</option>
																<option value="2003">2003</option>
																<option value="2002">2002</option>
																<option value="2001">2001</option>
																<option value="2000">2000</option>
																<option value="1999">1999</option>
																<option value="1998">1998</option>
																<option value="1997">1997</option>
																<option value="1996">1996</option>
																<option value="1995">1995</option>
																<option value="1994">1994</option>
																<option value="1993">1993</option>
																<option value="1992">1992</option>
																<option value="1991">1991</option>
																<option value="1990">1990</option>
																<option value="1989">1989</option>
																<option value="1988">1988</option>
																<option value="1987">1987</option>
																<option value="1986">1986</option>
																<option value="1985">1985</option>
																<option value="1984">1984</option>
																<option value="1983">1983</option>
																<option value="1982">1982</option>
																<option value="1981">1981</option>
																<option value="1980">1980</option>
																<option value="1979">1979</option>
																<option value="1978">1978</option>
																<option value="1977">1977</option>
																<option value="1976">1976</option>
																<option value="1975">1975</option>
																<option value="1974">1974</option>
																<option value="1973">1973</option>
																<option value="1972">1972</option>
																<option value="1971">1971</option>
																<option value="1970">1970</option>
																<option value="1969">1969</option>
																<option value="1968">1968</option>
																<option value="1967">1967</option>
																<option value="1966">1966</option>
																<option value="1965">1965</option>
																<option value="1964">1964</option>
																<option value="1963">1963</option>
																<option value="1962">1962</option>
																<option value="1961">1961</option>
																<option value="1960">1960</option>
																<option value="1959">1959</option>
																<option value="1958">1958</option>
																<option value="1957">1957</option>
																<option value="1956">1956</option>
																<option value="1955">1955</option>
																<option value="1954">1954</option>
																<option value="1953">1953</option>
																<option value="1952">1952</option>
																<option value="1951">1951</option>
																<option value="1950">1950</option>
																<option value="1949">1949</option>
																<option value="1948">1948</option>
																<option value="1947">1947</option>
																<option value="1946">1946</option>
																<option value="1945">1945</option>
																<option value="1944">1944</option>
																<option value="1943">1943</option>
																<option value="1942">1942</option>
																<option value="1941">1941</option>
																<option value="1940">1940</option>
															</select>
														</div>
														<div class="xxs-dnone fxshrink_0 padrl10">-</div>
														<div class="wi_25 xxs-wi_50">
															<select name="com_end_month" id="com_end_month" class="input_white_field">
																<option value="0">Select</option>
																<option value="1">January</option>
																<option value="2">February</option>
																<option value="3">March</option>
																<option value="4">April</option>
																<option value="5">May</option>
																<option value="6">June</option>
																<option value="7">July</option>
																<option value="8">August</option>
																<option value="9">September</option>
																<option value="10">October</option>
																<option value="11">November</option>
																<option value="12">December</option>
															</select>
														</div>
														<div class="wi_25 xxs-wi_50">
															<select class="input_white_field wi_100" name="com_end_year" id="com_end_year">
																<option value="0">Select</option>
																<option value="2016">2016</option>
																<option value="2015">2015</option>
																<option value="2014">2014</option>
																<option value="2013">2013</option>
																<option value="2012">2012</option>
																<option value="2011">2011</option>
																<option value="2010">2010</option>
																<option value="2009">2009</option>
																<option value="2008">2008</option>
																<option value="2007">2007</option>
																<option value="2006">2006</option>
																<option value="2005">2005</option>
																<option value="2004">2004</option>
																<option value="2003">2003</option>
																<option value="2002">2002</option>
																<option value="2001">2001</option>
																<option value="2000">2000</option>
																<option value="1999">1999</option>
																<option value="1998">1998</option>
																<option value="1997">1997</option>
																<option value="1996">1996</option>
																<option value="1995">1995</option>
																<option value="1994">1994</option>
																<option value="1993">1993</option>
																<option value="1992">1992</option>
																<option value="1991">1991</option>
																<option value="1990">1990</option>
																<option value="1989">1989</option>
																<option value="1988">1988</option>
																<option value="1987">1987</option>
																<option value="1986">1986</option>
																<option value="1985">1985</option>
																<option value="1984">1984</option>
																<option value="1983">1983</option>
																<option value="1982">1982</option>
																<option value="1981">1981</option>
																<option value="1980">1980</option>
																<option value="1979">1979</option>
																<option value="1978">1978</option>
																<option value="1977">1977</option>
																<option value="1976">1976</option>
																<option value="1975">1975</option>
																<option value="1974">1974</option>
																<option value="1973">1973</option>
																<option value="1972">1972</option>
																<option value="1971">1971</option>
																<option value="1970">1970</option>
																<option value="1969">1969</option>
																<option value="1968">1968</option>
																<option value="1967">1967</option>
																<option value="1966">1966</option>
																<option value="1965">1965</option>
																<option value="1964">1964</option>
																<option value="1963">1963</option>
																<option value="1962">1962</option>
																<option value="1961">1961</option>
																<option value="1960">1960</option>
																<option value="1959">1959</option>
																<option value="1958">1958</option>
																<option value="1957">1957</option>
																<option value="1956">1956</option>
																<option value="1955">1955</option>
																<option value="1954">1954</option>
																<option value="1953">1953</option>
																<option value="1952">1952</option>
																<option value="1951">1951</option>
																<option value="1950">1950</option>
																<option value="1949">1949</option>
																<option value="1948">1948</option>
																<option value="1947">1947</option>
																<option value="1946">1946</option>
																<option value="1945">1945</option>
																<option value="1944">1944</option>
																<option value="1943">1943</option>
																<option value="1942">1942</option>
																<option value="1941">1941</option>
																<option value="1940">1940</option>
															</select>
														</div>
														
													</div>
												</div>
												</li> <li>
												<div class="field_labl  xs-dnone">Description</div>
												<div class="field_box xs-wi_100i">
													<div id="mceu_30" class="mce-tinymce mce-container mce-panel" hidefocus="1" tabindex="-1" role="application" style="visibility: hidden; border-width: 1px;"><div id="mceu_30-body" class="mce-container-body mce-stack-layout"><div id="mceu_31" class="mce-toolbar-grp mce-container mce-panel mce-stack-layout-item mce-first" hidefocus="1" tabindex="-1" role="group"><div id="mceu_31-body" class="mce-container-body mce-stack-layout"><div id="mceu_32" class="mce-container mce-toolbar mce-stack-layout-item mce-first mce-last" role="toolbar"><div id="mceu_32-body" class="mce-container-body mce-flow-layout"><div id="mceu_33" class="mce-container mce-flow-layout-item mce-first mce-btn-group" role="group"><div id="mceu_33-body"><div id="mceu_20" class="mce-widget mce-btn mce-btn-small mce-first" tabindex="-1" aria-labelledby="mceu_20" role="button" aria-label="Bold"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-bold"></i></button></div><div id="mceu_21" class="mce-widget mce-btn mce-btn-small" tabindex="-1" aria-labelledby="mceu_21" role="button" aria-label="Italic"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-italic"></i></button></div><div id="mceu_22" class="mce-widget mce-btn mce-btn-small" tabindex="-1" aria-labelledby="mceu_22" role="button" aria-label="Underline"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-underline"></i></button></div><div id="mceu_23" class="mce-widget mce-btn mce-btn-small mce-last" tabindex="-1" aria-labelledby="mceu_23" role="button" aria-label="Strikethrough"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-strikethrough"></i></button></div></div></div><div id="mceu_34" class="mce-container mce-flow-layout-item mce-btn-group" role="group"><div id="mceu_34-body"><div id="mceu_24" class="mce-widget mce-btn mce-btn-small mce-first" tabindex="-1" aria-labelledby="mceu_24" role="button" aria-label="Align left"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignleft"></i></button></div><div id="mceu_25" class="mce-widget mce-btn mce-btn-small" tabindex="-1" aria-labelledby="mceu_25" role="button" aria-label="Align center"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-aligncenter"></i></button></div><div id="mceu_26" class="mce-widget mce-btn mce-btn-small" tabindex="-1" aria-labelledby="mceu_26" role="button" aria-label="Align right"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignright"></i></button></div><div id="mceu_27" class="mce-widget mce-btn mce-btn-small mce-last" tabindex="-1" aria-labelledby="mceu_27" role="button" aria-label="Justify"><button role="presentation" type="button" tabindex="-1"><i class="mce-ico mce-i-alignjustify"></i></button></div></div></div><div id="mceu_35" class="mce-container mce-flow-layout-item mce-last mce-btn-group" role="group"><div id="mceu_35-body"><div id="mceu_28" class="mce-widget mce-btn mce-splitbtn mce-btn-small mce-menubtn mce-first" role="button" tabindex="-1" aria-label="Bullet list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-bullist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div><div id="mceu_29" class="mce-widget mce-btn mce-splitbtn mce-btn-small mce-menubtn mce-last" role="button" tabindex="-1" aria-label="Numbered list" aria-haspopup="true"><button type="button" hidefocus="1" tabindex="-1"><i class="mce-ico mce-i-numlist"></i></button><button type="button" class="mce-open" hidefocus="1" tabindex="-1"> <i class="mce-caret"></i></button></div></div></div></div></div></div></div><div id="mceu_36" class="mce-edit-area mce-container mce-panel mce-stack-layout-item" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><iframe id="com_desc_ifr" frameborder="0" allowtransparency="true" title="Rich Text Area. Press ALT-F9 for menu. Press ALT-F10 for toolbar. Press ALT-0 for help" src='javascript:""' style="width: 100%; height: 100px; display: block;"></iframe></div><div id="mceu_37" class="mce-statusbar mce-container mce-panel mce-stack-layout-item mce-last" hidefocus="1" tabindex="-1" role="group" style="border-width: 1px 0px 0px;"><div id="mceu_37-body" class="mce-container-body mce-flow-layout"><div id="mceu_38" class="mce-path mce-flow-layout-item mce-first"><div role="button" class="mce-path-item mce-last" data-index="0" tabindex="-1" id="mceu_38-0" aria-level="0">p</div></div><span id="mceu_41" class="mce-wordcount mce-widget mce-label mce-flow-layout-item">Words: 0</span><div id="mceu_39" class="mce-flow-layout-item mce-resizehandle mce-last"><i class="mce-ico mce-i-resize"></i></div></div></div></div></div><textarea class="texteditor" name="com_desc" id="com_desc" style="display: none;" aria-hidden="true"></textarea>
												</div>
											</li>
											
											<li>
												<div class="field_labl  xs-dnone">Refrence Email</div>
												<div class="field_box xs-wi_100i">
													<input class="input_white_field wi_100" type="text" name="r_email" id="r_email">
												</div>
											</li>
											<li>
												<div class="field_labl  xs-dnone">&nbsp;</div>
												<div class="field_box xs-wi_100i">
													<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="com_current" id="com_current" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
												&nbsp; I currently work here</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>
									<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkexperiance()" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_exp_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink" value="0">Remove This Position</a></div>
									<div class="clear"></div>
								</div>
								<input type="hidden" name="comp_experiance" id="comp_experiance">
							</form>
							
							<div class="clear"></div>
							<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd font_opnsns xs-fsz16 sm-fsz16"><span class="trend_start xs-dnone"></span>
								<div class="mart15">
									
									<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit" href="javascript:void(0);"></a> <span class="year_trend xs-pos_stai xs-marb5"><span>Current</span></span>
										<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Qmatchup IncJ</h2>
										<p>January 2010 - Still working | Stockholm</p>
										
										
										
										
										
										<div class="fsz14" >Accomplished Business Developer backed by proven track record from various industries with skills to deliver diversity, corporate training and organizational development activities for start-up to multi billion dollar worldwide corporations across multiple sites. &nbsp;</div>
										
										<input type="hidden" name="exp3" id="exp3" value="
										
										
										
										
										Accomplished Business Developer backed by proven track record from various industries with skills to deliver diversity, corporate training and organizational development activities for start-up to multi billion dollar worldwide corporations across multiple sites. &nbsp;
										
										">
									</div>
									
									
									
									<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit"  href="javascript:void(0);"></a> <span class="year_trend xs-pos_stai xs-marb5"><span>2010</span></span>
										<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Volvo A</h2>
										<p>December 2008 - January 2010 | Stockholm</p>
										
										
										
										
										
										<div class="fsz14" >Visible achievements include developing sales opportunities that supports business strategy, productivity and profitability. Covering all aspects of the business development model including growth hacking, channel sales, channel marketing, prospecting, sales cycle management, quota attainment, client account management, retention and up-selling. Skilled in implementing comprehensive programs in training/development, partner opportunities and management development programs. Active champion of evolving diversity management, EEO and affirmative action initiatives for the past 10 years.</div>
										
										<input type="hidden" name="exp4" id="exp4" value="
										
										
										
										
										Visible achievements include developing sales opportunities that supports business strategy, productivity and profitability. Covering all aspects of the business development model including growth hacking, channel sales, channel marketing, prospecting, sales cycle management, quota attainment, client account management, retention and up-selling. Skilled in implementing comprehensive programs in training/development, partner opportunities and management development programs. Active champion of evolving diversity management, EEO and affirmative action initiatives for the past 10 years.
										
										">
									</div>
									
									
									
								</div>                                    
								<div class="clear"></div>
							</div>
							<div class="padtrl15"></div>
						</div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div class=" txt_37404a lgtblue2_bg mart20 brdrad3">
							<div class="wrap maxwi_100 padtb30">
								
								<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
									<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl10 xs-padtb15 brdr xs-nobrdr xs-brdb">
										<div>
											<h3 class="padb30 fsz24 bold">Mission</h3>
											<p>Tillsammans med våra kunder arbetar vi för att ta fram kraftfulla digitala lösningar för företag och privatpersoner. Vi satsar på innovation, vi är lyhörda för våra kunders behov och vårdar relationerna
											</p>
											<a href="#">Learn more</a>
										</div>
									</div>
									<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl10 xs-padtb15 nobrdr xs-nobrdr xs-brdb">
										<div>
											<h3 class="padb30 fsz24 bold">Vision</h3>
											<p>Vår vision är att alla bolag skall vara digitaliserade och verifierade på nätet. All handel skall ske utav kvalificerade köpare och säljare. Vi vill skapa känslan av att man ”ser varandra i ögonen” trotts att man gör affärer på nätet.   
											</p>
											<a href="#">Learn more</a>
										</div>
									</div>
								</div>
							</div>
							</div>
							
							<div class=" txt_37404a  mart20 brdrad3 brdt brdb">
							<div class="wrap maxwi_100 padtb30">
								
								
								
								<div class="dflex xs-dblock alit_s lgn_hight_22 fsz16">
									<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padrl0 xs-padtb15 brdr xs-nobrdr xs-brdb">
										<div>
											<h3 class="padb30 fsz24 bold">Give back friday</h3>
											<p>
												Give-Back-Friday innebär att vi en fredag i månaden ägnar helt och hållet till välgörenhet av olika slag. Hjälpa hemlösa, rädda miljön, mat och vatten till fattiga länder samt stödja forskning för ryggmärgsskador är några av de stöttningar som vi gjort. Vi tror stenhårt på konceptet ”ingen kan göra allt men alla kan göra något”. 
												
												
											</p>
											<a href="#">Learn more</a>
										</div>
									</div>
									<div class="wi_50 xs-wi_100 dflex xs-dblock alit_c pad30 xs-padt15 xs-padrl0 xs-padb0 talc green_bg">
										<div>
											<span class="crm-icon crm-icon-1"></span>
											<h4 class="bold fsz18">Just nu sker</h4>
											<p>En insamling till hjärnfondens forskning på stamceller som behandling av skador i ryggmärgen och hjärnan. 
											Kontakta oss för att vara med och stödja.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						
						
						
						
						
						
						
						
						
						
						<div class="clear"></div>
						
						
						
						
						
						<div class="mart20"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2">Skapa din egen företagssida - Gratis</a> </div>
						
						
						<!-- Marquee -->
						
						<div class="clear"></div>
					</div>
				
				<div class="wi_300p col-xs-12 col-sm-12 fright pos_rel zi5">
									
									<div class="dflex alit_s marb20 padr10">
										<input type="search" name="search" class="hei_50p flex_1 padrl15 brd brdrad0 brdradtl3 bg_fe white_bg_f fsz15" placeholder="Skriv.." value="">
										<button type="submit" class="hei_50p padr20 padl30 brd nobrdl brdrad0 brdradrb3 white_bg fsz14 bold curp">Sök</button>
									</div>
									<div class="clear"></div>
									
									<div class="minhei_210 ovfl_hid pos_rel brdrad5 bglgrad_bot_f19961_f97a67 txt_f marl10">
										
										<input type="radio" name="subscribe-card" value="card-1" id="subscribe-card-1" class="default sr-only" checked="checked">
										<div class="wi_100 opa0 opa1_dsibc pos_abs pos_cenY left-100 left0_dsibc left100_sibc pad15 trans_all2" id="work" style="display:block;">
											<h3 class="marb30 padb10 brdb brdwi_2 brdclr_f talc fsz20 txt_f">Subscribe</h3>
											
											<label for="subscribe-card-2" onclick="closeView(1);" class="hei_40p dblock pos_rel marb10 brdrad4 bg_f bg_f2f5f8_h fsz16 txt_00a4bd curp trans_all2">
												<span class="pos_abs pos_cenY left15p">Email</span>
												<span class="fa fa-envelope-o pos_abs pos_cenY right15p bold fsz20"></span>
											</label>
											
											<label for="subscribe-card-5" onclick="closeView(2);" class="hei_40p dblock pos_rel marb10 brdrad4 bg_f bg_f2f5f8_h fsz16 txt_00a4bd curp trans_all2">
												<span class="pos_abs pos_cenY left15p">Dela</span>
												<span class="fa fa-envelope-o pos_abs pos_cenY right15p bold fsz20"></span>
											</label>
										</div>
										<div id="work1" style="display:none">
											<form action="../../PublicContentDetail/subscribeUser" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1" class="wi_230p maxwi_100 dblock padrl10">
												<input type="radio" name="subscribe-card" value="card-2" id="subscribe-card-2" class="default sr-only">
												<div class="wi_100 opa0 opa1_dsibc pos_abs pos_cenY left-100 left0_dsibc left100_sibc pad15 trans_all2">
													<h3 class="marb30 padb10 brdb brdwi_2 brdclr_f talc fsz20 txt_f">Prenumerera på...</h3>
													
													<div class="marb30 padt1 fsz14">
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="1" onclick="changeIndex(this.id);" name="1" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>HR</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="2" onclick="changeIndex(this.id);" name="2" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Sälj</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="4" onclick="changeIndex(this.id);" name="4" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Inköp</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="5" onclick="changeIndex(this.id);" name="5" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Marknad</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="6" onclick="changeIndex(this.id);" name="6" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Ekonomi</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="8" onclick="changeIndex(this.id);" name="8" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>IT</span>
															</label>
																													<label class="dblock pos_rel marb10 padl20 curp">
																<input type="checkbox" id="9" onclick="changeIndex(this.id);" name="9" class="default sr-only">
																<div class="wi_16p hei_16p pos_abs zi1 top-1p left0 brdrad3 bg_f"></div>
																<div class="wi_11p hei_6p opa0 opa1_sibc pos_abs zi2 top3p left3p brdl brdb brdclr_00a4bd rotate-45"></div>
																<span>Styrelse</span>
															</label>
																												
													</div>
													
													<label for="subscribe-email">Email Address</label>
													<input type="=&quot;email&quot;" name="email" id="email" class="wi_100 hei_40p hei_ dblock mart5 brd brdclr_f brdrad4 bg_f talc" placeholder="Enter your Email Address">
													
													<input type="button" onclick="submitForm();" value="Submit" class="wi_100 hei_40p dblock mart15 nobrd brdrad4 bg_f bg_f2f5f8_h talc fsz15 txt_00a4bd curp trans_all2">
													
													
													<input type="hidden" id="indexing_save" name="indexing_save" value="">
													
													
													<label for="subscribe-card-1" onclick="viewWork(1);" class="dblock talc fsz14 mart20 curp">
														<span class="fa fa-angle-left"></span>	
														Back to Other Options
													</label>
												</div>
											</form>
										</div>
										<div id="work2" style="display:none">
											<form action="../../PublicContentDetail/subscribeTemplate" method="POST" id="save_indexings" name="save_indexings" accept-charset="ISO-8859-1" class="wi_230p maxwi_100 dblock padrl10">
												<input type="radio" name="subscribe-card" value="card-5" id="subscribe-card-5" class="default sr-only">
												<div class="wi_100 opa0 opa1_dsibc pos_abs pos_cenY left-100 left0_dsibc left100_sibc pad15 trans_all2">
													<h3 class="marb30 padb10 brdb brdwi_2 brdclr_f talc fsz20 txt_f width_190">Dela med dig till</h3>
													
													<label for="subscribe-name">Name</label>
													<input type="=&quot;text&quot;" name="r_name" id="r_name" class="marb20 wi_100 hei_40p hei_ dblock mart5 brd brdclr_f brdrad4 bg_f talc" placeholder="Enter receivers name">
													Dela med dig till
													<label for="subscribe-email">Email Address</label>
													<input type="=&quot;email&quot;" name="emails" id="emails" class="marb20 wi_100 hei_40p hei_ dblock mart5 brd brdclr_f brdrad4 bg_f talc" placeholder="Enter receivers Email Address">
													
													<label for="subscribe-name">Senders Name</label>
													<input type="=&quot;text&quot;" name="s_name" id="s_name" class="marb20 wi_100 hei_40p hei_ dblock mart5 brd brdclr_f brdrad4 bg_f talc" placeholder="Enter your name">
													
													<input type="button" onclick="submitForms();" value="Submit" class="wi_100 hei_40p dblock mart15 nobrd brdrad4 bg_f bg_f2f5f8_h talc fsz15 txt_00a4bd curp trans_all2">
													
													
													<input type="hidden" id="indexing_saves" name="indexing_saves" value="">
													
													
													<label for="subscribe-card-1" onclick="viewWork(2);" class="dblock talc fsz14 mart20 curp">
														<span class="fa fa-angle-left"></span>	
														Back to Other Options
													</label>
												</div>
											</form>
										</div>
									</div>
									
									
									
									
									<!-- Links -->
									<div class="column_m bs_bb marb20 padrl0 pink_bg">
										<h3 class="padtb10 padrl10 pred2_bg lgn_hight_24 bold fsz18 white_txt">Lediga tjänster</h3>
										<div class="mart20 padb10  marrl10">
											<h4 class="padb0 fsz15">
												<a href="#" class="black_txt">Assistent - Bryssel</a>
											</h4>   </div>
											<div class="padtb10  marrl10">
												<h4 class="padb0 fsz14">
													<a href="#" class="black_txt">IP-jurist till varumärkesavdelningen i Stockholm</a>
												</h4>   </div>
												<div class="padtb10  marrl10">
													<h4 class="padb0 fsz14">
														<a href="#" class="black_txt">Biträdande jurister - Göteborg</a>
													</h4>   </div>
													
													<div class="padtb10  marrl10">
														<h4 class="padb0 fsz14">
															<a href="#" class="black_txt">Biträdande jurister - Skåne</a>
														</h4>   </div>
														<div class="padtb10  marrl10">
															<h4 class="padb0 fsz14">
																<a href="#" class="black_txt">Biträdande jurister - Stockholm</a>
															</h4>   </div>
									</div>
									<div class="column_m bs_bb marb15">
										<a href="https://www.qmatchup.com/beta/user/index.php/TrendwatchPricing"><h3 class="padtb10 padrl10 lgtgrey_bg lgn_hight_24 bold fsz18 black_txt">Mer HR Nyheter</h3></a>
																					
											
											
																						
											
											
																						
											
											
																				</div>
									
									
									<div class="clear"></div>
									
																		
									<div class="column_m padb15 hidden-xs">
										<div class="white_bg">
											<div class="pad10">
												<h2 class="fsz16">Undrar du något?</h2>
												<p>Vi hjälper dig mer än gärna med att svara på dina frågor eller funderingar. Hör av dig till oss på telefon eller via mejl.</p>
												<ul class="small_icon_list_30">
													<li>
														<div class="icon_bx phone_ico"></div>
														<div class="icon_bx_content">
															<h2 class="lgtblue_txt padb5 fsz18">010 -15 10 125</h2>
															<div> support@qmatchup.com</div>
														</div>
													</li>
												</ul>
												<div class="clear"></div>
											</div>
										</div>
									</div>
									
									<div class="clear"></div>
								</div>
				
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
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	</body>
	
</html>
</body>

</html>