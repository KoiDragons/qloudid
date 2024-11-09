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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			function submit_value()
			{
				
				if($("#total_value").val()=="")
				{
					alert("No data found!!!")
					return false;
				}
				else
				{
					//alert("hi"); return false;
					document.getElementById("save_indexing").submit();
				}
				
			}
			var currentLang = 'sv';
			var serc='<?php if(isset($_POST['search']))	{ echo $_POST['search']; } ?>';
			
			/*function checkSearch()
			{
				if($("#search").val()=="" || $("#search").val()==null)
				{
					alert("please enter domain name");
					return false;
				}
				
				document.getElementById("save_indexing").submit();
			}*/
			
			function showMore(id)
			{
				var new_val=$("#resultVal").val();
				var d=parseInt(new_val)+1;
				$.get("../DomainSearchResults/domainSearch/"+id+"/"+new_val,function(data1,status){
					
					$("#search_data").html("");
					$("#search_data").html(data1);
					$("#resultVal").val(d);
					
				});
			}
		</script>
	</head>
	
	<body class="lgtblue2_bg">
		
		<div class="column_m header xs-header  bs_bb bg_colorn_new" >
			<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 bg_colorn_new" >
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15 padt15 wi_125p">
					<a href="#"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10 padr30 padt15">
					<div class="languages">
						<a href="#" id="language_selector" class="padrl10"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" /></a>
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
				<div class="fright xs-dnone sm-dnone padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://www.safeqloud.com/user/index.php/CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Close" data-sw="Close">Close</a> </li>
					</ul>
				</div>
				<div class="top_menu top_menu_custom mart12 ">
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
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.safeqloud.com/user/index.php/CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Close</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel">
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart20">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="padb10 ">
						<h1 class="padb5 talc fsz50">Verifiera</h1>
						<p class="pad0 talc fsz18 padb20 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">Signera dina ändrade uppgifter</p>
					</div>
					
					<!-- Center content -->
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
						<div class="pad15 brdrad3 white_bg">
							<h2 class="marb15 fsz20 bold talc">
								
								<a href="#" class="opa90 opa1_h padrl5 fsz16 txt_9d"><span class="fa fa-question-circle"></span></a>
							</h2>
							
							
							
							
							
							<div class="mart15" id="search_data">
								<?php if($posted_value['general']>0) { ?>
									<div class="result-item padtb20 brdb">
										<div class="dflex alit_c">
											<div class="flex_1">
												
												<div class="fsz16 dgrey_txt bold">
													<span class="marr5 valm">General</span>
													<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
													<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
												</div>
											</div>
											<div class="fxshrink_0 dflex alit_c">
												<a href="#" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz14 white_txt" title="Save the lead"><span class="fa fa-minus"></span></a>
												<div class="wi_100p talr">
													<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
														<span><?php echo $posted_value['general']; ?></span>
														<span class="fa fa-caret-up dnone diblock_pa"></span>
														<span class="fa fa-caret-down dnone_pa"></span>
													</a>
												</div>
											</div>
										</div>
										<div class="sources-content dnone" style="display: none;">
											<ul class="mar0 pad0 padt10 fsz14">
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Company Indentification Number</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['ssn']; ?> </span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Company Name</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['name']; ?> </span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Industry</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['l_name']; ?> </span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Founded</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['dob']; ?></span>
												</li>
												
											</ul>
										</div>
									</div>
									<?php  } if($posted_value['va']>0) { ?>
									<div class="result-item padtb20 brdb">
										<div class="dflex alit_c">
											<div class="flex_1">
												
												<div class="bold fsz16 dgrey_txt">
													<span class="marr5 valm">Visiting Address</span>
													<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
													<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
												</div>
											</div>
											<div class="fxshrink_0 dflex alit_c">
												<a href="#" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 white_txt" title="Save the lead"><span class="fa fa-minus"></span></a>
												<div class="wi_100p talr">
													<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
														<span><?php echo $posted_value['va']; ?></span>
														<span class="fa fa-caret-up dnone diblock_pa"></span>
														<span class="fa fa-caret-down dnone_pa"></span>
													</a>
												</div>
											</div>
										</div>
										<div class="sources-content dnone" style="display: none;">
											<ul class="mar0 pad0 padt10 fsz14">
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Address</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['addrs']; ?>    </span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Zipcode</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['zip']; ?></span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">City</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['city']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Country</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['cntry']; ?></span>
												</li>
											</ul>
										</div>
									</div>
									
									<?php  } if($posted_value['bypost']>0) { ?>
									<div class="result-item padtb20 brdb">
										<div class="dflex alit_c">
											<div class="flex_1">
												
												<div class="bold fsz16 dgrey_txt">
													<span class="marr5 valm">Contact by Post</span>
													<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
													<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
												</div>
											</div>
											<div class="fxshrink_0 dflex alit_c">
												<a href="#" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 white_txt" title="Save the lead"><span class="fa fa-minus"></span></a>
												<div class="wi_100p talr">
													<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
														<span><?php echo $posted_value['bypost']; ?></span>
														<span class="fa fa-caret-up dnone diblock_pa"></span>
														<span class="fa fa-caret-down dnone_pa"></span>
													</a>
												</div>
											</div>
										</div>
										<div class="sources-content dnone" style="display: none;">
											<ul class="mar0 pad0 padt10 fsz14">
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Address</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['addrs1']; ?>    </span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Zipcode</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['zip1']; ?></span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">City</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['city1']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Country</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['cntry1']; ?></span>
												</li>
											</ul>
										</div>
									</div>
									<?php  } if($posted_value['byphone']>0) { ?>
									<div class="result-item padtb20 brdb">
										<div class="dflex alit_c">
											<div class="flex_1">
												
												<div class="fsz16 bold dgrey_txt">
													<span class="marr5 valm">Contact by Phone</span>
													<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
													<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
												</div>
											</div>
											<div class="fxshrink_0 dflex alit_c">
												<a href="#" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 white_txt" title="Save the lead"><span class="fa fa-minus"></span></a>
												<div class="wi_100p talr">
													<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
														<span><?php echo $posted_value['byphone']; ?></span>
														<span class="fa fa-caret-up dnone diblock_pa"></span>
														<span class="fa fa-caret-down dnone_pa"></span>
													</a>
												</div>
											</div>
										</div>
										<div class="sources-content dnone" style="display: none;">
											<ul class="mar0 pad0 padt10 fsz14">
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Country</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['c_phone']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Phone</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['phone']; ?></span>
												</li>
											</ul>
										</div>
									</div>
								<?php } if($posted_value['fors']>0) { ?>
									<div class="result-item padtb20 brdb">
										<div class="dflex alit_c">
											<div class="flex_1">
												
												<div class="fsz16 bold dgrey_txt">
													<span class="marr5 valm">For Suppliers</span>
													<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
													<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
												</div>
											</div>
											<div class="fxshrink_0 dflex alit_c">
												<a href="#" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 white_txt" title="Save the lead"><span class="fa fa-minus"></span></a>
												<div class="wi_100p talr">
													<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
														<span><?php echo $posted_value['fors']; ?></span>
														<span class="fa fa-caret-up dnone diblock_pa"></span>
														<span class="fa fa-caret-down dnone_pa"></span>
													</a>
												</div>
											</div>
										</div>
										<div class="sources-content dnone" style="display: none;">
											<ul class="mar0 pad0 padt10 fsz14">
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Invoicing Address</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['addrssi']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Zipcode</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['zipsi']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">City</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['citysi']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Country</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['cntrysi']; ?></span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Delivery Address</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['addrssd']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Zipcode</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['zipsd']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">City</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['citysd']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Country</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['cntrysd']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">VAT</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['vat']; ?></span>
												</li>
											</ul>
										</div>
									</div>
								<?php } if($posted_value['forc']>0) { ?>
									<div class="result-item padtb20 brdb">
										<div class="dflex alit_c">
											<div class="flex_1">
												
												<div class="fsz16 bold dgrey_txt">
													<span class="marr5 valm">For Customers</span>
													<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
													<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
												</div>
											</div>
											<div class="fxshrink_0 dflex alit_c">
												<a href="#" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 white_txt" title="Save the lead"><span class="fa fa-minus"></span></a>
												<div class="wi_100p talr">
													<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
														<span><?php echo $posted_value['forc']; ?></span>
														<span class="fa fa-caret-up dnone diblock_pa"></span>
														<span class="fa fa-caret-down dnone_pa"></span>
													</a>
												</div>
											</div>
										</div>
										<div class="sources-content dnone" style="display: none;">
											<ul class="mar0 pad0 padt10 fsz14">
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Bankgiro med OCR</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['bankgiro_med']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Bankgiro utan OCR</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['bankgiro_utan']; ?></span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">IBAN</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['iban']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">BIC</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['bic']; ?></span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Bank</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['bank']; ?></span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">F tax</a>
													</div>
													<span class="fxshrink_0 marl10"><?php echo $posted_value['ftax']; ?></span>
												</li>
											</ul>
										</div>
									</div>
								<?php } ?>
									
								
							</div>
							
						</div>
						
					</div>
					<form method="POST" action="../../VerifyCompany/updateAccount/<?php echo $data['cid']; ?>" id="save_indexing" name="save_indexing" >
						<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart30"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="submit_value();">Signera med Mobilt BankId</a> 
							<input type="hidden" id="total_value" name="total_value" value="<?php if(isset($_POST['total_value'])) echo str_ireplace('"',"'",$_POST['total_value']); ?>" />
						</div>
					</form>
					
				</div>
			</div><div class="clear"></div>
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
		
		
		
		<!-- FOOTER -->
		
		<!-- Menu list fade -->
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		
		
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
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
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
							
							if(tab.tabs){
								for(var itb = 0, itbL = tab.tabs.length; itb < itbL; itb++){
									var itab = tab.tabs[itb];
									tab_content_html += '<div class="wi_100 padb20">';
									tab_content_html += '<div class="marrl5 padb10 brdb fsz13">';
									tab_content_html += '<a href="#' + itab.id + '" class="expander-toggler' + ((itab.state && itab.state === 'active') ? ' target_shown' : '')  + '"><span class="down fa fa-chevron-down"></span><span class="up fa fa-chevron-up"></span> ' + itab.label + '</a>';
									if(itab.postfix){
										tab_content_html += itab.postfix;
									}
									tab_content_html += '</div>';
									tab_content_html += '<div id="' + itab.id + '" class="' + ((itab.state && itab.state === 'active') ? '' : 'dnone ')  + 'padt15"><div class="wi_100 dflex fxwrap_w">';
									
									if(itab.fields){
										for(var f = 0, fL = itab.fields.length; f < fL; f++){
											var field = itab.fields[f];
											
											tab_content_html += '<div class="' + field.classes + ' bs_bb padrl5 padb15">';
											
											if(field.type === 'line'){
												tab_content_html += '</div>';
											}
											else{
												tab_content_html += '<label class="dblock marb5 fsz11">' + field.label + '</label><div class="wi_100 dflex alit_c">';
												
												if(field.prefix){
													tab_content_html += field.prefix;
												}
												
												if(field.type === 'select'){
													tab_content_html += '<select name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13">';
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
									
									if(itab.thead || itab.tbody){
										tab_content_html += '<div class="wi_100 padl5"><table width="100%" border="0" cellpadding="0" cellspacing="0">';
										
										if(itab.thead){
											tab_content_html += '<thead class="fsz11"><tr>';
											for(var t = 0, tL = itab.thead.length; t < tL; t++){
												tab_content_html += '<th align="left" class="' + (itab.thead[t].class ? itab.thead[t].class : '') + '"><div class="padtb10">' + itab.thead[t].text + '</div></th>';
											}
											tab_content_html += '</tr></thead>';
										}
										if(itab.tbody){
											tab_content_html += '<tbody class="fsz13"><tr>';
											for(var t = 0, tL = itab.tbody.length; t < tL; t++){
												var trs = itab.tbody[t];
												tab_content_html += '<tr>';
												for(var d = 0, dL = trs.length; d < dL; d++){
													tab_content_html += '<td class="brdb"><div class="padtb10">' + trs[d] + '</div></td>';
												}
												tab_content_html += '</tr>';
											}
											tab_content_html += '</tr></tbody>';
										}
										
										tab_content_html += '</table></div>';
									}
									
									tab_content_html += '</div></div></div>';
								}
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
		<!-- BEGIN JIVOSITE CODE {literal} -->
		
	</body>
	
</html>