<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modules.css" />
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126618362-1');
</script>
	<script>
function submitForm()
{
	if($("#message").val()=="")
	{
		alert("please enter company name");
		return false;
	}
	$("#save_indexing").submit();
}
</script>
</head>

<body class="white_bg">

	<!-- HEADER -->
	<div class="column_m header header_small bs_bb bg_colorn_new hei_40p " >
		<div class="wi_100 hei_30p xs-pos_fix padtb5 padrl10 bg_colorn_new" >
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15">
				<a href="https://www.qloudid.com"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr30">
				<div class="languages">
					<a href="#" id="language_selector" class="padrl10"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" /></a>
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
			<div class="search padt1" >
			<form action="PublicSearchResult" method="POST" id="save_indexing" name="indexing_save" accept-charset="ISO-8859-1">
      <div class="fleft">
        <input type="text" name="message" id="message" class="search_fld hi_wi385" >
      </div>
      <div class="fleft">
        <input type="button" value="" class="search_btn hi26"  onclick="submitForm();">
      </div>
	  </form>
    </div>
			<div class="fright xs-dnone sm-dnone">
				<ul class="mar0 pad0">
					<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Logga In" data-sw="Logga In">Logga IN</a> </li>
				</ul>
			</div>
			<div class="top_menu top_menu_custom mart2">
				<ul class="menulist">
					<li class="xs-mar0i sm-mar0i">
						<a href="#" class="class-toggler" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"> <span class="fa fa-qrcode white_txt fsz20"></span> </a>
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
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Erbjudande</a> </div>
			<div class="clear"></div>
		</div>
	</div><div class="clear"></div>
	<div class="clear"></div>
	
	<!-- CONTENT -->
	<div class="column_m container zi5">
		<div class="wrap maxwi_100">

			<!-- Content -->
			<div class="column_m bs_bb pad15 mart30">

				<h2>Search results: <?php if(isset($_POST['message'])) { echo $companyListSearchCount; } else echo 0; ?> found</h2>

				<!-- Search and filter -->
				<div class="marb30 brdb">
					<form action="" method="post">

						<div class="wd_search default-controls">

							<div class="xs-wi_100_30p fleft dflex justc_sb alit_c bs_bb marb10 xs-marrl-15 padt2 xs-padrl15 xs-lgtgrey_bg">

								<div class="hidden-sm hidden-md hidden-lg opa0">
									<span class="fa fa-plus fsz20"></span>
								</div>
								<div class="tab-header dflex">
									<a href="#" data-id="tab-user" data-extra="#new-person-btn,#user-actions" class="dblock martb5 padrl15 brd brdclr_segblue_h brdclr_segblue_a brdradtl3 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt segblue_txt_h white_txt_a white_txt_ah">User</a>
									<a href="#" data-id="tab-business" data-extra="#new-business-btn,#business-actions" class="dblock martb5 padrl15 brd brdclr_segblue_h brdclr_segblue_a segblue_bg_a lgn_hight_26 fsz14 midgrey_txt segblue_txt_h white_txt_a white_txt_ah active">Business</a>
									<a href="#" data-id="tab-reps" data-extra="#new-employee-btn,#reps-actions" class="dblock martb5 padrl15 brd brdclr_segblue_h brdclr_segblue_a brdradrb3 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt segblue_txt_h white_txt_a white_txt_ah">Reps</a>
								</div>
								<div class="hidden-sm hidden-md hidden-lg">
									<span class="fa fa-filter fsz20"></span>
								</div>
							</div>

							<div class="bgcolor-light xs-wi_100 fright talr">
								<div class="xs-wi_100 dflex">
									<div class="expanding-input wi_120p hei_40p dinlblck flex_1 pos_rel marr3 valm">
										<!--<div class="active expanding-input-wrap wi_100 wi_250p_a xs-wi_100_a hei_40p bs_bb pos_abs top0 right0 brd brdrad3 white_bg trans_all3">
											<div class="hide-when-active wi_100 pos_abs top0 left0 lgn_hight_40 talc"> 
												<span class="fa fa-search fsz18i clr-light"></span> 
												<span>Sok</span> 
											</div>
											<input type="text" value="book" class="wi_100 hei_100 pos_abs top0 left0 bs_bb padrl30 nobrd" /> 
											<span class="fa fa-search show-when-active pos_abs top0 left0 padl5 lgn_hight_40 fsz18i"></span>
											<a href="#" class="deactivate show-when-active pos_abs top0 right0 padr5 dark_grey_txt"> <span class="fa fa-close fleft lgn_hight_40 fsz18i"></span> </a>
										</div>-->
									</div>
									<a href="#" data-target=".wd_filters" data-base=".wd_search" class="expander-toggler hei_40p dinlblck bs_bb marr3 padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14 clr-default">
										<span class="hidden-xs">
											<span class="fa fa-angle-down down marr5"></span>
											<span class="fa fa-angle-up up marr5"></span>
											Filter
										</span>
										<span class="fa fa-phone visible-xs lgn_hight_38 fsz20"></span>
									</a>
									<div class="dinlblck hidden-xs hidden-sm valm">
										<div id="new-person-btn" class="dnone diblock_a">
											<a href="#" class="hei_40p dblock bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg fsz18" title="Add new Person">
												<span class="fa fa-plus valm"></span>
											</a>
										</div>
										<div id="new-business-btn" class="dnone diblock_a">
											<a href="#" class="hei_40p dblock bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg fsz18" title="Add new Business">
												<span class="fa fa-plus valm"></span>
											</a>
										</div>
										<div id="new-employee-btn" class="dnone diblock_a">
											<a href="#" class="hei_40p dblock bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg fsz18" title="Add new Employee">
												<span class="fa fa-plus valm"></span>
											</a>
										</div>
									</div>
									<div class="dnone diblock_va pos_rel marl3" id="user-actions">
										<a href="#" class="hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" onclick="return false;">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_sibf zi1 zi2_sibf pos_abs top105 right0">
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall">
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 1</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 2</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 3</a></li>
											</ul>
										</div>
									</div>
									<div class="dnone diblock_va pos_rel marl3" id="business-actions">
										<a href="#" class="hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" onclick="return false;">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_sibf zi1 zi2_sibf pos_abs top105 right0">
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall">
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 1</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 2</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 3</a></li>
											</ul>
										</div>
									</div>
									<div class="dnone diblock_va pos_rel marl3" id="reps-actions">
										<a href="#" class="hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" onclick="return false;">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_sibf zi1 zi2_sibf pos_abs top105 right0">
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall">
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 1</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 2</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 3</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="clear marb10"></div>
								<div class="filter_crumbs filter_crumbs_1 fsz13_333"> <a href="#" class="clear_filters clr-default">Clear filters</a> </div>
							</div>
							<div class="clear"></div>
							<div class="wd_filters lgtgrey2_bg clr-default hide brdrad3">
								<div class="wd_filters_wrap ">
									<div class="padt15"></div>
									<div class="clear"></div>

									<!-- Text/Checkbox filter -->
									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Locations
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<!-- Text filter -->
											<div class="filter filter-text marb5 fsz13_333">
												<input type="text" name="location_search" placeholder="Search locations" class="wi_100 hei_32p bs_bb dblock padrl8 brdrad2 fsz14"
												 data-list="#location_search_dl" />
											</div>
											<!-- Checkbox filters -->
											<div class="filter filter-additional-permanent filter-checkbox marb5 fsz13_333">
												<label>
														<input type="checkbox" name="any_location" value="0" /> <span class="marl5 valm">Any location</span> </label>
											</div>
										</div>
									</div>

									<!-- Checkbox filter -->
									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Bolagsform
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="Aktiebolag" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Aktiebolag
															<span class="count">(25 258)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Sambruksförening" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Sambruksförening
															<span class="count">(6 578)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Värdepappersfonder" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Värdepappersfonder
															<span class="count">(1 041)</span>
														</span>
													</label>
											</div>
										</div>
									</div>
									<div class="clear visible-xs"></div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Lan
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="Stockholm" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Stockholm
															<span class="count">(12 961)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Sambruksförening" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Västra götaland
															<span class="count">(5 783)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Värdepappersfonder" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Skåne
															<span class="count">(4 492)</span>
														</span>
													</label>
											</div>
										</div>
									</div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Bransch
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="Bank, finans" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Bank, finans &amp; fö...
															<span class="count">(33 900)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Juridik, ekonomi" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Juridik, ekonomi ...
															<span class="count">(134)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Fastighetsverksamhet" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Fastighetsverksamhet
															<span class="count">(88)</span>
														</span>
													</label>
											</div>
										</div>
									</div>
									<div class="clear"></div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Omsättning
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="0" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															0
															<span class="count">(18 874)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="&lt; 1 tkr" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															&lt; 1 tkr
															<span class="count">(4 273)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="1 - 499 tkr" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															1 - 499 tkr
															<span class="count">(5 057)</span>
														</span>
													</label>
											</div>
										</div>
									</div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Anställda
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="0" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															0
															<span class="count">(22 275)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="1 - 4" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															1 - 4
															<span class="count">(4 919)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="5 - 9" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															5 - 9
															<span class="count">(459)</span>
														</span>
													</label>
											</div>
										</div>
									</div>
									<div class="clear visible-xs"></div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Inaktiva bolag
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="Inaktiva bolag" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Inaktiva bolag
														</span>
													</label>
											</div>
										</div>
									</div>

									<!-- Sliding checkbox filter -->
									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Convert
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<!-- Slide filter -->
											<div class="filter filter-slide-checkbox filter-slide-checkbox-green pos_rel marb5 fsz13_333">
												<input type="checkbox" name="convert_bool" class="default" data-true="Yes" data-false="No" data-text="Convert" />												</div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="padt15"></div>
							</div>
						</div>

						<div class="clear"></div>
					</form>

					
				</div>

				<!-- User -->
				<div class="tab-content" id="tab-user">

					<div class="wi_100 dflex">

						<!-- Results -->
						<div class="flex_1 marrl-10">
							
								<form>
									<table class="wi_100 " cellpadding="10" cellspacing="0">
										<thead>
											<tr>
												<!--<th class="hidden-xs"><input type="checkbox" name="check_all" class="check_all" /></th>-->
												<th class="wi_100 brdb">Name</th>
												<!--<th class="brdb">CRM</th>-->
											</tr>
										</thead>
										<tbody>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">John <span class="bold dblue_txt">Book</span></a>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Steven</a>
													<div class="mart5">
														Email: steven<span class="bold dblue_txt">book</span>.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Bob</a>
													<div class="mart5">
														Website: http://<span class="bold dblue_txt">book</span>s-online.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Martin</a>
													<div class="mart5">
														Department: <span class="bold dblue_txt">Book</span>keeping
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Alex</a>
													<div class="mart5">
														Delivery address: <span class="bold dblue_txt">Book</span> street, Houston, Texas
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Andrea</a>
													<div class="mart5">
														Delivery address: Richmond avenue, Kam<span class="bold dblue_txt">book</span>ja, Texas
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Alma</a>
													<div class="mart5">
														Email: alma<span class="bold dblue_txt">book</span>.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Areo</a>
													<div class="mart5">
														Website: http://area-<span class="bold dblue_txt">book</span>s.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Stas</a>
													<div class="mart5">
														Department: <span class="bold dblue_txt">Book</span>keeping
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Charley</a>
													<div class="mart5">
														Delivery address: <span class="bold dblue_txt">Book</span> street, Houston, Texas
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<!--<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#user-actions" data-check-all="true" data-closest=".tab-content" /></td>-->
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Rockey</a>
													<div class="mart5">
														Email: rockey<span class="bold dblue_txt">book</span>.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
										</tbody>
									</table>
									<div class="mart20 talc">
										<a href="#" class="add_more_rows dblue_btn" onclick="add_more_rows(this)">View more</a>
									</div>
								</form>
							
						
						</div>

					</div>

					<script>
						function add_more_rows(link) {
							var $tbody = $(link).closest('form').find('tbody'),
								html = '<tr> <td class="hidden-xs"><input type="checkbox" class="check init" /></td> <td class="brdb"><a href="crm_company.html" class="dark_grey_txt">Facebook</a></td> <!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>--> </tr><tr> <td class="hidden-xs"><input type="checkbox" class="check init" /></td> <td class="brdb"><a href="crm_company.html" class="dark_grey_txt">Facebook</a></td> <!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>--> </tr><tr> <td class="hidden-xs"><input type="checkbox" class="check init" /></td> <td class="brdb"><a href="crm_company.html" class="dark_grey_txt">Facebook</a></td> <!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>--> </tr><tr> <td class="hidden-xs"><input type="checkbox" class="check init" /></td> <td class="brdb"><a href="crm_company.html" class="dark_grey_txt">Facebook</a></td> <!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>--> </tr><tr> <td class="hidden-xs"><input type="checkbox" class="check init" /></td> <td class="brdb"><a href="crm_company.html" class="dark_grey_txt">Almatv</a></td> <!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>--> </tr>';

							$tbody
								.append($(html))
								.find('input.init')
								.iCheck({
									checkboxClass: 'icheckbox_minimal-aero',
									radioClass: 'iradio_minimal-aero',
									increaseArea: '20%'
								});
							return false;
						}
					</script>

				</div>

				<!-- Business -->
				<div class="tab-content padt10" id="tab-business">

					<div class="wi_100 dflex">					

						<!-- Results -->
						<div class="flex_1 marrl-10">
							
								<form>
									<table class="wi_100 fsz16 pad10" cellpadding="10" cellspacing="0">
										<thead>
											<tr>
												<!--<th class="hidden-xs"><input type="checkbox" name="check_all" class="check_all" /></th>-->
												<!--<th class="wi_100 brdb">Company name</th>
												<th class="brdb">CRM</th>-->
											</tr>
										</thead>
										<tbody id="t_data">
											<?php if(isset($_POST['message'])) { echo html_entity_decode($companyListSearch); } ?>
										</tbody>
									</table>
									<div class="mart20 talc">
										<a href="#" class="add_more_rows dblue_btn" value="1" onclick="add_more_rows(this,this.value)">View more</a>
									</div>
								</form>
							
						</div>
					</div>

				</div>

				<!-- Reps -->
				<div class="tab-content" id="tab-reps">

					<div class="wi_100 dflex">

						
						<!-- Results -->
						<div class="flex_1 marrl-10">
							
								<form>
									<table class="wi_100 " cellpadding="10" cellspacing="0">
										<thead>
											<tr>
												<th class="hidden-xs"><input type="checkbox" name="check_all" class="check_all" /></th>
												<th class="wi_100 brdb">Name</th>
												<th class="brdb">CRM</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Steven</a>
													<div class="mart5">
														Email: steven<span class="bold dblue_txt">book</span>.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Bob</a>
													<div class="mart5">
														Website: http://<span class="bold dblue_txt">book</span>s-online.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Martin</a>
													<div class="mart5">
														Department: <span class="bold dblue_txt">Book</span>keeping
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Alex</a>
													<div class="mart5">
														Delivery address: <span class="bold dblue_txt">Book</span> street, Houston, Texas
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Andrea</a>
													<div class="mart5">
														Delivery address: Richmond avenue, Kam<span class="bold dblue_txt">book</span>ja, Texas
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Alma</a>
													<div class="mart5">
														Email: alma<span class="bold dblue_txt">book</span>.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Areo</a>
													<div class="mart5">
														Website: http://area-<span class="bold dblue_txt">book</span>s.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Stas</a>
													<div class="mart5">
														Department: <span class="bold dblue_txt">Book</span>keeping
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Charley</a>
													<div class="mart5">
														Delivery address: <span class="bold dblue_txt">Book</span> street, Houston, Texas
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">Rockey</a>
													<div class="mart5">
														Email: rockey<span class="bold dblue_txt">book</span>.com
													</div>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
											<tr>
												<td class="hidden-xs"><input type="checkbox" class="check toggle-visited" data-target="#reps-actions" data-check-all="true" data-closest=".tab-content" /></td>
												<td class="brdb">
													<a href="crm_person.html" class="dark_grey_txt">John <span class="bold dblue_txt">Book</span></a>
												</td>
												<!--<td class="brdb ws_now"><a href="#">Add to CRM</a></td>-->
											</tr>
										</tbody>
									</table>
									<div class="mart20 talc">
										<a href="#" class="add_more_rows dblue_btn" onclick="add_more_rows(this)">View more</a>
									</div>
								</form>
							
						</div>

					</div>

					<script>
						function add_more_rows(link,id) {
							var $tbody = $(link).closest('form').find('tbody');
							var html;
							var id_val=parseInt($(link).attr('value'))+1;
							//alert(data);
							$(link).val(id_val);
							var send_data={};
							send_data.message='<?php if(isset($_POST['message'])) echo $_POST['message']; ?>' ;
							send_data.id=id_val;
		$.ajax({
            type:"POST",
            url:"PublicSearchResult/companyListNew",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									html=data1;
									$("#t_data").html("");
								$tbody
								.append($(html))
								.find('input.init')
								.iCheck({
									checkboxClass: 'icheckbox_minimal-aero',
									radioClass: 'iradio_minimal-aero',
									increaseArea: '20%'
								});
								
										}
									});
							
							return false;
						}
					</script>

				</div>

			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>

	<!-- Mobile bottom menu -->
	<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">

		<!-- primary menu -->
		<div class="tab-content active" id="mob-primary-menu" style="display: block;">
			<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
				<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
					<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
					<span>Senaste</span>
				</a>
				<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
					<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
					<span>Filer</span>
				</a>
				<div class="tab-header">
					<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
						<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtgrey_bg brdrad100 talc lgn_hight_40 fsz32">
							<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
						</div>
					</a>
				</div>
				<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
					<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
					<span>Foton</span>
				</a>
				<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
					<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
						<span>...</span>
					</div>
					<span>More</span>
				</a>
			</div>
		</div>

		<!-- add  menu -->
		<div class="tab-content padb10" id="mob-add-menu">
			<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
			<ul class="mar0 pad0 brdrad3 white_bg fsz14">
				<li class="dblock mar0 padrl15 brdb">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Activity
						</a>
				</li>
				<li class="dblock mar0 padrl15 brdb">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							Deal
						</a>
				</li>
				<li class="dblock mar0 padrl15 brdb">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Note
						</a>
				</li>
				<li class="dblock mar0 padrl15 brdb">
					<a href="crm_add_company.html" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
				</li>
				<li class="dblock mar0 padrl15 brdb">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
							Photo
						</a>
				</li>
				<li class="dblock mar0 padrl15">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
							Audio Note
						</a>
				</li>
			</ul>
			<div class="tab-header mart10 brdrad3 white_bg talc lgn_hight_50 fsz18">
				<a href="#" class="" data-id="mob-primary-menu">Cancel</a>
			</div>
		</div>
	</div>

	<div class="hei_80p"></div>


	<!-- Dynamic filter menu -->
	<ul class="filter-add-menu filter-add-radio hide" id="filter-add-category">
		<li class="has-submenu">
			<a href="#" class="dblock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1"
			 data-name="radio2" data-value="submenu1">
				Web, Mobile &amp; Software Dev<span class="fa fa-chevron-right fright"></span>
			</a>
			<ul>
				<li>
					<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1"
					 data-name="radio2" data-value="submenu1">
						All subcategories <span class="count">(0)</span>
					</a>
				</li>
				<li class="has-submenu">
					<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu11">
						Software Development<span class="count">(0)</span><span class="fa fa-chevron-right fright"></span>
					</a>
					<ul>
						<li>
							<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1"
							 data-name="radio2" data-value="submenu1">
								All subcategories <span class="count">(0)</span>
							</a>
						</li>
						<li class="has-submenu">
							<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
							 data-value="submenu111">
								Software Development<span class="count">(0)</span><span class="fa fa-chevron-right fright"></span>
							</a>
							<ul>
								<li>
									<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1"
									 data-name="radio2" data-value="submenu1">
										All subcategories <span class="count">(0)</span>
									</a>
								</li>
								<li>
									<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
									 data-value="submenu1111">
										Software Development<span class="count">(0)</span>
									</a>
								</li>
								<li>
									<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
									 data-value="submenu1112">
										Ecommerce Development<span class="count">(0)</span>
									</a>
								</li>
								<li>
									<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
									 data-value="submenu1113">
										Game Development<span class="count">(0)</span>
									</a>
								</li>
							</ul>
							<div class="clear"></div>
						</li>
						<li>
							<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
							 data-value="submenu112">
								Ecommerce Development<span class="count">(0)</span>
							</a>
						</li>
						<li>
							<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
							 data-value="submenu113">
								Game Development<span class="count">(0)</span>
							</a>
						</li>
					</ul>
					<div class="clear"></div>
				</li>
				<li>
					<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu12">
						Ecommerce Development<span class="count">(0)</span>
					</a>
				</li>
				<li>
					<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu13">
						Game Development<span class="count">(0)</span>
					</a>
				</li>
			</ul>
			<div class="clear"></div>
		</li>
		<li class="has-submenu">
			<a href="#" class="dblock" data-text="IT &amp; Networking" data-category="Category" data-additional="checkbox1" data-name="radio2"
			 data-value="submenu2">
				IT &amp; Networking<span class="fa fa-chevron-right fright"></span>
			</a>
			<ul>
				<li>
					<a href="#" class="dlock" data-text="IT &amp; Networking" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu2">
						All subcategories <span class="count">(0)</span>
					</a>
				</li>
				<li>
					<a href="" class="dblock" data-text="Database Administration" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu21">
						Database Administration<span class="count">(0)</span>
					</a>
				</li>
				<li>
					<a href="" class="dblock" data-text="ERP / CRM Software" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu22">
						ERP / CRM Software<span class="count">(0)</span>
					</a>
				</li>
				<li>
					<a href="" class="dblock" data-text="Information Security" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu23">
						Information Security<span class="count">(0)</span>
					</a>
				</li>
			</ul>
			<div class="clear"></div>
		</li>
	</ul>

	<!-- Locations input datalist -->
	<ul class="filter-datalist-menu filter-text-datalist-menu filter-add-checkbox hide" id="location_search_dl">
		<li disabled="disabled">
			<span class="dblock">
				Regions
			</span>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Africa" data-category="Location" data-value="africa" data-name="africa">
				Africa
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Antarctica" data-category="Location" data-value="antarctica" data-name="antarctica">
				Antarctica
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Asia" data-category="Location" data-value="asia" data-name="asia">
				Asia
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Europe" data-category="Location" data-value="europe" data-name="europe">
				Europe
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Oceania" data-category="Location" data-value="oceania" data-name="oceania">
				Oceania
			</a>
		</li>
		<li disabled="disabled">
			<span class="dblock">
				Countries
			</span>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Albania" data-category="Location" data-value="albania" data-name="albania">
				Albania
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Kazakhstan" data-category="Location" data-value="kazakhstan" data-name="kazakhstan">
				Kazakhstan
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Russia" data-category="Location" data-value="russia" data-name="russia">
				Russia
			</a>
		</li>
	</ul>

	<!-- Tests input datalist -->
	<ul class="filter-datalist-menu filter-text-datalist-menu filter-add-checkbox hide" id="tests_search_dl">
		<li>
			<a href="#" class="dblock" data-text="3ds Max 9" data-category="Test" data-additional="test_scores" data-value="3ds_Max_9"
			 data-name="3ds_Max_9">
				3ds Max 9
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Accounting Principles" data-category="Test" data-additional="test_scores" data-value="Accounting_Principles"
			 data-name="Accounting_Principles">
				Accounting Principles
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Accounting Skills Test" data-category="Test" data-additional="test_scores" data-value="Accounting_Skills_Test"
			 data-name="Accounting_Skills_Test">
				Accounting Skills Test
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Accounts Payable" data-category="Test" data-additional="test_scores" data-value="Accounts_Payable"
			 data-name="Accounts_Payable">
				Accounts Payable
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Adobe Flash CS3" data-category="Test" data-additional="test_scores" data-value="Adobe_Flash_CS3"
			 data-name="Adobe_Flash_CS3">
				Adobe Flash CS3
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Adobe Illustrator" data-category="Test" data-additional="test_scores" data-value="Adobe_Illustrator"
			 data-name="Adobe_Illustrator">
				Adobe Illustrator
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="C++ Programming" data-category="Test" data-additional="test_scores" data-value="C++_Programming"
			 data-name="C++_Programming">
				C++ Programming
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Compiler Design" data-category="Test" data-additional="test_scores" data-value="compiler_design"
			 data-name="compiler_design">
				Compiler Design
			</a>
		</li>
	</ul>

	<!-- Filter input datalist -->
	<div class="filter-datalist-menu filter-range-datalist-menu hide" id="area_search_dl">
		<!-- * NOTE
			- data-weight is required for min/max relationships
			- based on it max values will be hidden if min is selected and otherwise
		-->
		<div class="filter-range-menu-wrap">
			<ul class="filter-range-menu-min wi_50 fleft bs_bb mar0 pad0">
				<li disabled="disabled">
					<span class="dblock">Min</span>
				</li>
				<li>
					<a href="#" class="dblock" data-text="10m²" data-category="Area" data-weight="10">10m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="20m²" data-category="Area" data-weight="20">20m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="30m²" data-category="Area" data-weight="30">30m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="40m²" data-category="Area" data-weight="40">40m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="50m²" data-category="Area" data-weight="50">50m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="60m²" data-category="Area" data-weight="60">60m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="70m²" data-category="Area" data-weight="70">70m²</a>
				</li>
			</ul>
			<ul class="filter-range-menu-max wi_50 fleft bs_bb mar0 pad0">
				<li disabled="disabled">
					<span class="dblock">Max</span>
				</li>
				<li>
					<a href="#" class="dblock" data-text="10m²" data-category="Area" data-weight="10">10m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="20m²" data-category="Area" data-weight="20">20m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="30m²" data-category="Area" data-weight="30">30m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="40m²" data-category="Area" data-weight="40">40m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="50m²" data-category="Area" data-weight="50">50m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="60m²" data-category="Area" data-weight="60">60m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="70m²" data-category="Area" data-weight="70">70m²</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="padtb10 talr">
			<button class="datalist-menu-close marr5 lgtgrey_btn min_height">OK</button>
		</div>
	</div>

	<!-- Filter input datalist -->
	<div class="filter-datalist-menu filter-range-datalist-menu hide" id="price_search_dl">
		<div class="filter-range-menu-wrap">
			<ul class="filter-range-menu-min wi_50 fleft bs_bb mar0 pad0">
				<li disabled="disabled">
					<span class="dblock">Min</span>
				</li>
				<li>
					<a href="#" class="dblock" data-text="50 kr" data-category="Price" data-weight="0">50 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="100 tkr" data-category="Price" data-weight="10">100 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="200 tkr" data-category="Price" data-weight="20">200 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="300 tkr" data-category="Price" data-weight="30">300 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="400 tkr" data-category="Price" data-weight="40">400 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="500 tkr" data-category="Price" data-weight="50">500 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="750 tkr" data-category="Price" data-weight="60">750 000</a>
				</li>
			</ul>
			<ul class="filter-range-menu-max wi_50 fleft bs_bb mar0 pad0">
				<li disabled="disabled">
					<span class="dblock">Max</span>
				</li>
				<li>
					<a href="#" class="dblock" data-text="50 kr" data-category="Price" data-weight="0">50 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="100 tkr" data-category="Price" data-weight="10">100 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="200 tkr" data-category="Price" data-weight="20">200 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="300 tkr" data-category="Price" data-weight="30">300 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="400 tkr" data-category="Price" data-weight="40">400 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="500 tkr" data-category="Price" data-weight="50">500 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="750 tkr" data-category="Price" data-weight="60">750 000</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="padtb10 talr">
			<button class="datalist-menu-close marr5 lgtgrey_btn min_height">OK</button>
		</div>
	</div>


	<!-- Company info popup -->
	<div class="crm-popup company-popup wi_720p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top70p right0 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right5p orange_btn brdrad3 bold">Close</a>
		<div class="popup-content padb15"></div>
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
		var countries_list = '<option value="" disabled="disabled">Choose your country</option> <option value="AF">Afghanistan</option> <option value="AL">Albania</option> <option value="DZ">Algeria</option> <option value="AS">American Samoa</option> <option value="AD">Andorra</option> <option value="AO">Angola</option> <option value="AI">Anguilla</option> <option value="AQ">Antarctica</option> <option value="AG">Antigua and Barbuda</option> <option value="AR">Argentina</option> <option value="AM">Armenia</option> <option value="AW">Aruba</option> <option value="AU">Australia</option> <option value="AT">Austria</option> <option value="AZ">Azerbaijani Republic</option> <option value="BS">Bahamas</option> <option value="BH">Bahrain</option> <option value="BD">Bangladesh</option> <option value="BB">Barbados</option> <option value="BY">Belarus</option> <option value="BE">Belgium</option> <option value="BZ">Belize</option> <option value="BJ">Benin</option> <option value="BM">Bermuda</option> <option value="BT">Bhutan</option> <option value="BO">Bolivia</option> <option value="BA">Bosnia and Herzegovina</option> <option value="BW">Botswana</option> <option value="BR">Brazil</option> <option value="VG">British Virgin Islands</option> <option value="BN">Brunei Darussalam</option> <option value="BG">Bulgaria</option> <option value="BF">Burkina Faso</option> <option value="BI">Burundi</option> <option value="MP">CNMI</option> <option value="KH">Cambodia</option> <option value="CM">Cameroon</option> <option value="CA">Canada</option> <option value="CV">Cape Verde</option> <option value="BQ">Caribbean Netherlands</option> <option value="KY">Cayman Islands</option> <option value="CF">Central African Republic</option> <option value="TD">Chad</option> <option value="CL">Chile</option> <option value="CN">China</option> <option value="CO">Colombia</option> <option value="KM">Comoros</option> <option value="CG">Congo</option> <option value="CK">Cook Islands</option> <option value="CR">Costa Rica</option> <option value="CI">Cote d&#39;Ivoire</option> <option value="HR">Croatia</option> <option value="CU">Cuba</option> <option value="CY">Cyprus</option> <option value="CZ">Czech Republic</option> <option value="CD">Democratic Republic of the Congo</option> <option value="DK">Denmark</option> <option value="DJ">Djibouti</option> <option value="DM">Dominica</option> <option value="DO">Dominican Republic</option> <option value="EC">Ecuador</option> <option value="EG">Egypt</option> <option value="SV">El Salvador</option> <option value="GQ">Equatorial Guinea</option> <option value="ER">Eritrea</option> <option value="EE">Estonia</option> <option value="ET">Ethiopia</option> <option value="FK">Falkland Islands</option> <option value="FO">Faroe Islands</option> <option value="FJ">Fiji</option> <option value="FI">Finland</option> <option value="FR">France</option> <option value="GF">French Guiana</option> <option value="PF">French Polynesia</option> <option value="GA">Gabonese Republic</option> <option value="GM">Gambia</option> <option value="GE">Georgia</option> <option value="DE">Germany</option> <option value="GH">Ghana</option> <option value="GI">Gibraltar</option> <option value="GR">Greece</option> <option value="GL">Greenland</option> <option value="GD">Grenada</option> <option value="GP">Guadeloupe</option> <option value="GU">Guam</option> <option value="GT">Guatemala</option> <option value="GN">Guinea</option> <option value="GW">Guinea-Bissau</option> <option value="GY">Guyana</option> <option value="HT">Haiti</option> <option value="HN">Honduras</option> <option value="HK">Hongkong, China</option> <option value="HU">Hungary</option> <option value="IS">Iceland</option> <option value="IN">India</option> <option value="ID">Indonesia</option> <option value="IR">Iran</option> <option value="IQ">Iraq</option> <option value="IE">Ireland</option> <option value="IL">Israel</option> <option value="IT">Italy</option> <option value="JM">Jamaica</option> <option value="JP">Japan</option> <option value="JO">Jordan</option> <option value="KZ">Kazakhstan</option> <option value="KE">Kenya</option> <option value="KI">Kiribati</option> <option value="KP">Korea (Democratic People&#39;s Republic of)</option> <option value="KR">Korea (Republic of)</option> <option value="KW">Kuwait</option> <option value="KG">Kyrgyzstan</option> <option value="LA">Laos</option> <option value="LV">Latvia</option> <option value="LB">Lebanon</option> <option value="LS">Lesotho</option> <option value="LR">Liberia</option> <option value="LY">Libya</option> <option value="LI">Liechtenstein</option> <option value="LT">Lithuania</option> <option value="LU">Luxembourg</option> <option value="MO">Macao, China</option> <option value="MK">Macedonia</option> <option value="MG">Madagascar</option> <option value="MW">Malawi</option> <option value="MY">Malaysia</option> <option value="MV">Maldives</option> <option value="ML">Mali</option> <option value="MT">Malta</option> <option value="MH">Marshall Islands</option> <option value="MQ">Martinique</option> <option value="MR">Mauritania</option> <option value="MU">Mauritius</option> <option value="YT">Mayotte</option> <option value="MX">Mexico</option> <option value="FM">Micronesia</option> <option value="MD">Moldova</option> <option value="MC">Monaco</option> <option value="MN">Mongolia</option> <option value="ME">Montenegro</option> <option value="MS">Montserrat</option> <option value="MA">Morocco</option> <option value="MZ">Mozambique</option> <option value="MM">Myanmar</option> <option value="NA">Namibia</option> <option value="NR">Nauru</option> <option value="NP">Nepal</option> <option value="NL">Netherlands</option> <option value="AN">Netherlands Antilles</option> <option value="NC">New Caledonia</option> <option value="NZ">New Zealand</option> <option value="NI">Nicaragua</option> <option value="NE">Niger</option> <option value="NG">Nigeria</option> <option value="NU">Niue</option> <option value="NO">Norway</option> <option value="OM">Oman</option> <option value="PK">Pakistan</option> <option value="PW">Palau</option> <option value="PS">Palestine</option> <option value="PA">Panama</option> <option value="PG">Papua New Guinea</option> <option value="PY">Paraguay</option> <option value="PE">Peru</option> <option value="PH">Philippines</option> <option value="PL">Poland</option> <option value="PT">Portugal</option> <option value="PR">Puerto Rico</option> <option value="QA">Qatar</option> <option value="RE">Reunion</option> <option value="RO">Romania</option> <option value="RU">Russia</option> <option value="RW">Rwanda</option> <option value="SH">Saint Helena</option> <option value="KN">Saint Kitts and Nevis</option> <option value="LC">Saint Lucia</option> <option value="PM">Saint Pierre and Miquelon</option> <option value="VC">Saint Vincent and the Grenadines</option> <option value="WS">Samoa</option> <option value="SM">San Marino</option> <option value="ST">Sao Tome and Principe</option> <option value="SA">Saudi Arabia</option> <option value="SN">Senegal</option> <option value="RS">Serbia</option> <option value="SC">Seychelles</option> <option value="SL">Sierra Leone</option> <option value="SG">Singapore</option> <option value="SX">Sint Marteen</option> <option value="SK">Slovakia</option> <option value="SI">Slovenia</option> <option value="SB">Solomon Islands</option> <option value="SO">Somalia</option> <option value="ZA">South Africa</option> <option value="SS">South Sudan</option> <option value="ES">Spain</option> <option value="LK">Sri Lanka</option> <option value="SD">Sudan</option> <option value="SR">Suriname</option> <option value="SZ">Swaziland</option> <option value="SE">Sweden</option> <option value="CH">Switzerland</option> <option value="SY">Syria</option> <option value="TW">Taiwan</option> <option value="TJ">Tajikistan</option> <option value="TZ">Tanzania</option> <option value="TH">Thailand</option> <option value="TL">Timor-Leste</option> <option value="TG">Togo</option> <option value="TK">Tokelau</option> <option value="TO">Tonga</option> <option value="TT">Trinidad and Tobago</option> <option value="TN">Tunisia</option> <option value="TR">Turkey</option> <option value="TM">Turkmenistan</option> <option value="TC">Turks &amp; Caicos</option> <option value="TV">Tuvalu</option> <option value="AE">UAE</option> <option value="VI">US Virgin Islands</option> <option value="UG">Uganda</option> <option value="UA">Ukraine</option> <option value="GB">United Kingdom</option> <option value="US">United States</option> <option value="UY">Uruguay</option> <option value="UZ">Uzbekistan</option> <option value="VU">Vanuatu</option> <option value="VA">Vatican</option> <option value="VE">Venezuela</option> <option value="VN">Vietnam</option> <option value="WF">Wallis and Futuna</option> <option value="YE">Yemen</option> <option value="ZM">Zambia</option> <option value="ZW">Zimbabwe</option>';
		
		/* - moved to company_info.php
		var company_data = {
			'id': 'facebook',
			'label': 'Facebook',
			'tabs': [{
				'id': 'profile',
				'label': 'My profile',
				'state' : 'active',
				'fields': [{
					'id': 'company-name',
					'name': 'profile-company-name',
					'label': 'Company name',
					'type': 'text',
					'value': 'Text company',
					'classes': 'wi_25',
				},{
					'id': 'industry',
					'name': 'profile-industry',
					'label': 'Industry',
					'type': 'select',
					'options': [{
						'value': '1',
						'label': 'Option 1'
					},{
						'value': '2',
						'label': 'Option 2'
					},{
						'value': '3',
						'label': 'Option 3'
					}],
					'value': '3',
					'classes': 'wi_25',
				},{
					'id': 'phone',
					'name': 'profile-phone',
					'label': 'Telephone',
					'type': 'text',
					'value': '+7 123 456 7890',
					'classes': 'wi_25',
				},{
					'id': 'email',
					'name': 'profile-email',
					'label': 'Email',
					'type': 'email',
					'value': 'test@test.com',
					'classes': 'wi_25',
				},{
					'id': 'website',
					'name': 'profile-website',
					'label': 'Website',
					'type': 'url',
					'value': 'https://test.com',
					'classes': 'wi_25',
				},{
					'id': 'reg-num',
					'name': 'profile-reg-num',
					'label': 'Registration no',
					'type': 'number',
					'value': '123456789',
					'classes': 'wi_25',
				},{
					'id': 'employees-size',
					'name': 'profile-employees-size',
					'label': 'Employees size',
					'type': 'select',
					'options': [{
						'value': '1',
						'label': 'Option 1'
					},{
						'value': '2',
						'label': 'Option 2'
					},{
						'value': '3',
						'label': 'Option 3'
					}],
					'value': '3',
					'classes': 'wi_25',
				},{
					'id': 'annual-revenue',
					'name': 'profile-annual-revenue',
					'label': 'Annual revenue',
					'type': 'select',
					'options': [{
						'value': '1',
						'label': 'Option 1'
					},{
						'value': '2',
						'label': 'Option 2'
					},{
						'value': '3',
						'label': 'Option 3'
					}],
					'value': '2',
					'classes': 'wi_25',
				}]
			
			
			},{
				'id': 'invoicing-address-form',
				'label': 'Invoicing address form',
				'fields': [{
					'id': 'address',
					'name': 'invoicing-address',
					'label': 'Address',
					'type': 'text',
					'value': '9009 Richmond Ave.',
					'classes': 'wi_25',
				},{
					'id': 'zipcode',
					'name': 'invoicing-zipcode',
					'label': 'Zip code',
					'type': 'text',
					'value': '75062',
					'classes': 'wi_12_5',
				},{
					'id': 'city',
					'name': 'invoicing-city',
					'label': 'City',
					'type': 'text',
					'value': 'Paris',
					'classes': 'wi_12_5',
				},{
					'id': 'country',
					'name': 'invoicing-country',
					'label': 'Country',
					'type': 'select',
					'options' : 'countries_list',
					'value': 'FR',
					'classes': 'wi_25',
				},{
					'id': 'payment-terms',
					'name': 'invoicing-payment-terms',
					'label': 'Payment terms',
					'type': 'text',
					'value': 'test data',
					'classes': 'wi_25',
				},{
					'id': 'cost-center',
					'name': 'invoicing-cost-center',
					'label': 'Cost center',
					'type': 'text',
					'value': 'test data',
					'classes': 'wi_25',
				},{
					'id': 'price-list',
					'name': 'invoicing-price-list',
					'label': 'Price list',
					'type': 'select',
					'options': [{
						'value': '1',
						'label': 'Price list A'
					},{
						'value': '2',
						'label': 'Price list B'
					}],
					'value': '2',
					'classes': 'wi_25',
				},{
					'id': 'order-number',
					'name': 'invoicing-order-number',
					'label': 'Order number',
					'type': 'text',
					'value': 'test number',
					'classes': 'wi_25',
				},{
					'id': 'currency',
					'name': 'invoicing-currency',
					'label': 'Currency',
					'type': 'select',
					'options': [{
						'value': '1',
						'label': 'SEK'
					}],
					'value': 'SEK',
					'classes': 'wi_8_3',
				},{
					'id': 'rate',
					'name': 'invoicing-rate',
					'label': 'Rate',
					'type': 'text',
					'value': '',
					'classes': 'wi_8_3',
				},{
					'id': 'unit',
					'name': 'invoicing-unit',
					'label': 'Unit',
					'type': 'text',
					'value': '',
					'classes': 'wi_8_3',
				}],
			},{
				'id': 'delivery-address-form',
				'label': 'Delivery address form',
				'fields': [{
					'id': 'address',
					'name': 'delivery-address',
					'label': 'Address',
					'type': 'text',
					'value': '9009 Richmond Ave.',
					'classes': 'wi_25',
				},{
					'id': 'zipcode',
					'name': 'delivery-zipcode',
					'label': 'Zip code',
					'type': 'text',
					'value': '75062',
					'classes': 'wi_12_5',
				},{
					'id': 'city',
					'name': 'delivery-city',
					'label': 'City',
					'type': 'text',
					'value': 'Paris',
					'classes': 'wi_12_5',
				},{
					'id': 'country',
					'name': 'delivery-country',
					'label': 'Country',
					'type': 'select',
					'options' : 'countries_list',
					'value': 'FR',
					'classes': 'wi_25',
				},{
					'id': 'delivery-method',
					'name': 'delivery-method',
					'label': 'Delivery method',
					'type': 'select',
					'options': [{
						'value': '1',
						'label': 'Method 1'
					},{
						'value': '2',
						'label': 'Method 2'
					}],
					'value': '2',
					'classes': 'wi_25',
				},{
					'id': 'delivery-terms',
					'name': 'delivery-terms',
					'label': 'Delivery terms',
					'type': 'select',
					'options': [{
						'value': '1',
						'label': 'Term 1'
					},{
						'value': '2',
						'label': 'Term 2'
					}],
					'value': '2',
					'classes': 'wi_25',
				}]
			},{
				'id': 'employees',
				'label': 'Employees',
				'thead' : [{
					'class': 'brdb',
					'text' : 'Name'
				},{
					'class': 'brdb',
					'text' : 'Email'
				}],
				'tbody': [
					['<a href="#" class="get-employee-info" data-keep="true" data-id="john">John</a>', '<a href="mailto:test@email.com">test@email.com</a>'],
					['<a href="#" class="get-employee-info" data-keep="true" data-id="steven">Steven</a>', '<a href="mailto:test@email.com">test@email.com</a>'],
					['<a href="#" class="get-employee-info" data-keep="true" data-id="bob">Bob</a>', '<a href="mailto:test@email.com">test@email.com</a>'],
					['<a href="#" class="get-employee-info" data-keep="true" data-id="martin">Martin</a>', '<a href="mailto:test@email.com">test@email.com</a>'],
					['<a href="#" class="get-employee-info" data-keep="true" data-id="alex">Alex</a>', '<a href="mailto:test@email.com">test@email.com</a>'],
					['<a href="#" class="get-employee-info" data-keep="true" data-id="andrea">Andrea</a>', '<a href="mailto:test@email.com">test@email.com</a>'],
					['<a href="#" class="get-employee-info" data-keep="true" data-id="alma">Alma</a>', '<a href="mailto:test@email.com">test@email.com</a>'],
					['<a href="#" class="get-employee-info" data-keep="true" data-id="areo">Areo</a>', '<a href="mailto:test@email.com">test@email.com</a>']
				]
			}],
			'buttons': ['<a href="#" class="dblue_btn marrl5 fsz16 ">Save changes</a>']
		}
		*/
		
		/* - moved to employee_info.php
		var employees_data = {
			'id': 'john',
			'label': 'John',
			'tabs': [{
				'id': 'general',
				'label': 'General',
				'state' : 'active',
				'fields': [{
					'id': 'name',
					'name': 'general-name',
					'label': 'Name',
					'type': 'text',
					'value': 'John',
					'classes': 'wi_25',
				},{
					'id': 'phone',
					'name': 'general-phone',
					'label': 'Telephone',
					'type': 'text',
					'value': '+1 123 456 7890',
					'classes': 'wi_25',
				},{
					'id': 'email',
					'name': 'general-email',
					'label': 'Email',
					'type': 'email',
					'value': 'john@test.com',
					'classes': 'wi_25',
				},{
					'id': 'website',
					'name': 'general-website',
					'label': 'Website',
					'type': 'url',
					'value': 'http://john.com',
					'classes': 'wi_25',
				}]
			},{
				'id': 'flow',
				'label': 'Flow',
			},{
				'id': 'deals',
				'label': 'Deals',
			}],
			'buttons': ['<a href="#" class="dblue_btn marrl5 fsz16 ">Save changes</a>']
		}
		*/

		$(document).ready(function () {
			var $window = $(window),
				$body = $(document.body),
				$company_popup = $('.company-popup'),
				$company_popup_content = $company_popup.find('.popup-content'),
				$employee_popup = $('.employee-popup'),
				$employee_popup_content = $employee_popup.find('.popup-content');
			
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
				var html = '<h2 class="marb10 padrl20 padtb10 fsz18 white_txt' + (data.label_class ?  ' ' + data.label_class : '') + '">' + data.label + '</h2>';
				if(data.tabs){
					for(var tb = 0, tbL = data.tabs.length; tb < tbL; tb++){
						var tab = data.tabs[tb];
						html += '<div class="padrbl20">';
						html += '<div class="marrl5 padb10 brdb fsz13">';
						html += '<a href="#' + tab.id + '" class="expander-toggler' + ((tab.state && tab.state === 'active') ? ' target_shown' : '')  + '"><span class="down fa fa-chevron-down"></span><span class="up fa fa-chevron-up"></span> ' + tab.label + '</a>';
						if(tab.postfix){
							html += tab.postfix;
						}
						html += '</div>';
						html += '<div id="' + tab.id + '" class="' + ((tab.state && tab.state === 'active') ? '' : 'dnone ')  + 'padt15"><div class="wi_100 dflex fxwrap_w">';
						
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
										html += '<select name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13">';
										var field_val = field.value;

										if(field.options){
											if(typeof field.options === 'string'){
												try{
													var options = eval(field.options);
													if(field_val){
														html += options.replace('value="' + field_val + '"', 'value="' + field_val + '" selected');
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
										html += '<textarea name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" class="wi_100 bs_bb pad5 brd fsz13">' + (field.value ? field.value : '') + '</textarea>';
									}
									else{
										html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class="wi_100 hei_30p bs_bb pad5 brd fsz13" />';
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
								html += '<thead class="fsz11"><tr>';
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

				$container
					.removeClass('active')
					.html(html);
			}

			// Populate popup with employee info
			var populate_employees = function(data, $container){
				var html = '<h2 class="marb10 padrl20 padtb10 fsz18 white_txt' + (data.label_class ?  ' ' + data.label_class : '') + '">' + data.label;

				if(data.company){
					html += '<div class="mart10 fsz14">';
					
					if(data.company.icon){
						if(data.company.icon['icon-url']){
							html += '<img src="' + data.company.icon['icon-url'] + '" class="wi_20p hei_auto valm' + (data.company.icon.classes ?  ' ' + data.company.icon.classes : '') + '">';
						}
						else if(data.company.icon.classes){
							html += '<span class="' + data.company.icon.classes + '"></span>';
						}
						
					}
					if(data.company['label']){
						html += '<span class="valm">' + data.company['label'] + '</span>';
					}
					html += '</div>';
				}

				html += '</h2>';

				if(data.tabs){
					var tab_header_html = '<div><ul class="tab-header mar0 pad0 padrl10 brdb fsz11">',
						tab_content_html = '';

					for(var t = 0, tL = data.tabs.length; t < tL; t++){
						var tab = data.tabs[t];
						tab_header_html += '<li class="diblock marrl10 padrl5"><a href="#" class="dblock padb15 brdb brdwi_3 brdclr_trans brdclr_dblue_h brdclr_dblue_a grey_txt dblue_txt_a' + ((tab.state && tab.state === 'active') ? ' active' : '') + '" data-id="' + tab.id + '">' + tab.label + '</a></li>';
						/*
						html += '<div class="padrbl20">';
						html += '<div class="marrl5 padb10 brdb fsz14"><a href="#' + tab.id + '" class="expander-toggler' + ((tab.state && tab.state === 'active') ? ' target_shown' : '')  + '"><span class="down fa fa-chevron-down"></span><span class="up fa fa-chevron-up"></span> ' + tab.label + '</a></div>';
						html += '<div id="' + tab.id + '" class="' + ((tab.state && tab.state === 'active') ? '' : 'dnone ')  + 'padt15"><div class="wi_100 dflex fxwrap_w">';
						*/
						tab_content_html += '<div id="' + tab.id + '" class="tab-content hide padt15 padrl20' + ((tab.state && tab.state === 'active') ? ' active' : '')  + '"' + ((tab.state && tab.state === 'active') ? ' style="display:block;"' : '')  + '><div class="wi_100 dflex fxwrap_w">';
						if(tab.fields){
							for(var f = 0, fL = tab.fields.length; f < fL; f++){
								var field = tab.fields[f];



								tab_content_html += '<div class="' + field.classes + ' bs_bb padrl5 padb15">';
								
								if(field.type === 'line'){
									tab_content_html += '</div>';
								}
								else{
									tab_content_html += '<label class="dblock marb5">' + field.label + '</label><div class="wi_100 dflex alit_c">';

									if(field.prefix){
										tab_content_html += field.prefix;
									}

									
									if(field.type === 'select'){
										tab_content_html += '<select name="' + field.name + '" class="default wi_100 hei_30p bs_bb brd pad5 fsz13">';
										var field_val = field.value;

										if(field.options){
											if(typeof field.options === 'string'){
												try{
													var options = eval(field.options);
													if(field_val){
														tab_content_html += options.replace('value="' + field_val + '"', 'value="' + field_val + '" selected');
													}
													else{
														tab_content_html += options;
													}
													
												}
												catch(e){}
											}
											else if(typeof field.options === 'object'){
												for(var o = 0, oL = field.options.length; o < oL; o++){
													var option = field.options[o];
													tab_content_html += '<option value="' + option.value + '"' + (field_val == option.value ? ' selected' : '')  + '>' + option.label + '</option>';
												}
											}
										}

										tab_content_html += '</select>';
									}
									else if(field.type === 'textarea'){
										tab_content_html += '<textarea name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" class="wi_100 bs_bb pad5 brd fsz13">' + (field.value ? field.value : '') + '</textarea>';
									}
									else{
										tab_content_html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class="wi_100 hei_30p bs_bb pad5 brd fsz13" />';
									}

									if(field.postfix){
										tab_content_html += field.postfix;
									}
									tab_content_html += '</div></div>';
								}

							}
						}

						if(tab.thead || tab.tbody){
							tab_content_html += '<div class="wi_100"><table width="100%" border="0" cellpadding="0" cellspacing="0">';
							
							if(tab.thead){
								tab_content_html += '<thead><tr>';
								for(var t = 0, tL = tab.thead.length; t < tL; t++){
									tab_content_html += '<th align="left" class="' + (tab.thead[t].class ? tab.thead[t].class : '') + '"><div class="padtb10">' + tab.thead[t].text + '</div></th>';
								}
								tab_content_html += '</tr></thead>';
							}
							if(tab.tbody){
								tab_content_html += '<tbody><tr>';
								for(var t = 0, tL = tab.tbody.length; t < tL; t++){
									var trs = tab.tbody[t];
									tab_content_html += '<tr>';
									for(var d = 0, dL = trs.length; d < dL; d++){
										tab_content_html += '<td class="brb"><div class="padtb10">' + trs[d] + '</div></td>';
									}
									tab_content_html += '</tr>';
								}
								tab_content_html += '</tr></tbody>';
							}

							tab_content_html += '</table></div>';
						}

						tab_content_html += '</div></div></div>';
					}

					tab_header_html += '</ul></div>';

					html += tab_header_html;
					html += tab_content_html;
				}

				if(data.buttons){
					html += '<div class="container padrl20 tall">';
					for(var b = 0, bL = data.buttons.length; b < bL; b++){
						html += data.buttons[b];
					}
					html += '</div>';
				}

				$container
					.removeClass('active')
					.html(html);
			}




			// Show company popup and call population function
			$body.on('click', '.get-company-info', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($employee_popup);
					$company_popup_content.addClass('active');

					$.ajax({
						url: 'company_info.php',
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

			// Show new company popup
			$body.on('click', '#new-business-btn a', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($employee_popup);
					$company_popup_content.addClass('active');

					$.ajax({
						url: 'new_company_info.php',
						type: 'POST',
						dataType: 'json',
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
		});
	</script>


	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/search/js/custom.js"></script>
</body>

</html>