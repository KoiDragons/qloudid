﻿<!doctype html>
<?php 
$path1 = "../../../html/usercontent/images/";
?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<!-- Styles -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnew.css" />
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<!-- Scripts -->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	
		<script>
		var available_yes=0;
		function approveUser(id,st,par)
		{
			//alert(id); return false;
			var a=par.closest("tr");
			 var val1=document.getElementById("number").innerHTML; 
			var user=0;
			
			 var send_data = {};
			 send_data.user_id=user;
			 send_data.a_id=id;
			 send_data.status=st;
			//alert(user); return false;
		$.ajax({
    url: '../Invitation/approveUserRequest',
    type: 'POST',
   //dataType: 'text/xml',
    data: send_data
	//async:false
	
  })
  .done(function(data){
	 
		 document.getElementById("number").innerHTML=val1-1;
	  document.getElementById(id).parentElement.parentElement.parentElement.remove();
	
	 if(st==1)
	   {
		   // var chk= $(a).find("td.chk").html();
		   var cn= $(a).find("td.cn").html();
		   var nm= $(a).find("td.nm").html();
		   var cd= $(a).find("td.cd").html();
		 
		  $("#myTable").last().append("<tr><td>"+cn+"</td><td>"+nm+"</td><td>"+cd+"</td><td>Approved</td><td></td><td></td></tr>");
		  
	   }
	   else if(st==2)
	   {
		    //var chk= $(a).find("td.chk").html();
		   var cn= $(a).find("td.cn").html();
		   //alert(cn);
		   var nm= $(a).find("td.nm").html();
		   var cd= $(a).find("td.cd").html();
		 
		 $("#myTable").last().append("<tr><td>"+cn+"</td><td>"+nm+"</td><td>"+cd+"</td><td>Rejected</td><td></td><td></td></tr>");
	   }
	   if(data==1)
	   {
		 alert("Success !!!");  
	   }
	   else
	   {
		   alert("Failed !!!");
	   }
	   
  })
  .fail(function(){})
  .always(function(){});
			
		}
		</script>
	
	<script>
	function removeActive()
	{
		$("#menulist-dropdown2").removeClass('active');
		$("#menulist-dropdown3").removeClass('active');
		$("#menulist-dropdown4").removeClass('active');
	}
	function rActive()
	{
		
		$("#menulist-dropdown3").removeClass('active');
		$("#menulist-dropdown4").removeClass('active');
	}
		function raActive()
	{
		
		$("#menulist-dropdown2").removeClass('active');
		$("#menulist-dropdown4").removeClass('active');
	}
	function rbActive()
	{
		
		$("#menulist-dropdown3").removeClass('active');
		$("#menulist-dropdown2").removeClass('active');
	}
	
		var currentLang = 'sv';
	</script>
</head>

<body class="white_bg ">
	
	<!-- HEADER -->
	<div class="column_m header header_small bs_bb grey_header_bg" >
				<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 grey_header_bg" >
					<div class="visible-xs visible-sm fleft">
						<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
					</div>
					<div class="logo hidden-xs hidden-sm marr15">
						<a href="#"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
					</div>
					<div class="hidden-xs hidden-sm fleft padl10">
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
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<li class="dblock hidden-xs hidden-sm fright pos_rel brdl brdclr_dblue"> <a href="https://www.qloudid.com/user/index.php/CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 white_txt white_txt_h" data-en="Close" data-sw="Close">Close</a> </li>
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
					<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.qloudid.com/user/index.php/CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Close</a> </div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			
		<div class="column_m pos_rel">
		<!-- CONTENT -->
			<div class="column_m container zi5  mart40" onclick="removeActive();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
			
				<!-- Center content -->
				<div class="wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10   white_bg">
						
						
						
						
						
						
						<div class="padb20 xxs-padb0 ">
							<!-- Charts -->
						<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
									
									<div class="padb10 ">
									<h1 class="padb5 talc fsz50 uppercase">Manage requests</h1>
									<p class="pad0 talc fsz18 padb20 brdb wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10">Here you can share your data with your employers</p>
								</div>
								
								
								
								<div class="clear"></div>
								
								
							</div>
								<div class="mart20">
									<h3 class="pad0 uppercase fsz20 blue_txt">Premium Services</h3>
									<div class="dflex alit_fs justc_sb brdb">
										<span class="flex_1">Upgrade your plan with these premium services for expert help and guidance.</span>
										<a href="#" class="toggle-btn dblock fxshrink_0 marr-10 marl20 padrl10 fsz20 txt_00a4bd active" data-toggle-id="enterprise-premium">
											<span class="fa fa-plus dblock dnone_pa"></span>
											<span class="fa fa-minus dnone dblock_pa"></span>
										</a>
									</div>
									<div id="enterprise-premium" style="display: block;">
										
										<div class="padt15 brdb">
											
											<div class="dflex fxwrap_w alit_s marrl-15">
												<div class="wi_50 xxs-wi_100 dflex alit_s  marb10 padrl15">
													<div class="wi_100 dflex fxdir_col alit_c justc_c pos_rel zi1 pad25 talc">
														<input type="checkbox" name="priority-access" id="enterprise-priority-access" class="price-addon price-value sr-only default" data-regularity="monthly" value="350" data-label="Priority Access" data-note="(billed annually)">
														<div class="wi_100 hei_100 pos_abs zi-1 top0 left0 bxsh_ins0001_00a4bd_sibc brd brdclr_00a4bd brdrad5 bg_f bg_e6f5f8_ph bg_e6f5f8_sibc"></div>
														<label for="enterprise-priority-access" class="wi_100 hei_100 dblock pos_abs zi10 top0 left0 curp"></label>
														
														<div class="wi_20p hei_20p dnone_sibc marrla brd brdwi_2 brdclr_00a4bd brdrad3 bg_f talc lgn_hight_n"></div>
														<div class="wi_20p hei_20p dnone dblock_sibc marrla brd brdwi_2 brdclr_00a4bd brdrad3 bg_f talc lgn_hight_n fsz14 txt_00a4bd">
															<span class="fa fa-check"></span>
														</div>
														<h4 class="mart10 pad0 bold fsz20 xs-fsz16 txt_2d3e50">Har fått en inbjudan</h4>
														<div class="mart10 fsz12 txt_425b76">Monthly sessions with an inbound consultant for guidance on your marketing and sales strategy, plus quarterly strategy reports</div>
														<div class="padt20 talc">
															<a href="#" class="load_more_results dblue_btn marrl5">Yes</a>
															
														</div>
													</div>
												</div>
												<div class="wi_50 xxs-wi_100 dflex alit_s  marb10 padrl15">
													<a href="#" class="show_popup_modal" data-target="#gratis_popup_company"><div class="wi_100 dflex fxdir_col alit_c justc_c pos_rel zi1 pad25 talc">
														<input type="checkbox" name="ongoing-consulting-access" id="enterprise-ongoing-consulting-access" class="price-addon price-value sr-only default" data-regularity="monthly" value="800" data-label="Ongoing Consulting Access" data-note="(billed annually)">
														<div class="wi_100 hei_100 pos_abs zi-1 top0 left0 bxsh_ins0001_00a4bd_sibc brd brdclr_00a4bd brdrad5 bg_f bg_e6f5f8_ph bg_e6f5f8_sibc"></div>
														<label for="enterprise-ongoing-consulting-access" class="wi_100 hei_100 dblock pos_abs zi10 top0 left0 curp"></label>
														
														<div class="wi_20p hei_20p dnone_sibc marrla brd brdwi_2 brdclr_00a4bd brdrad3 bg_f talc lgn_hight_n"></div>
														<div class="wi_20p hei_20p dnone dblock_sibc marrla brd brdwi_2 brdclr_00a4bd brdrad3 bg_f talc lgn_hight_n fsz14 txt_00a4bd">
															<span class="fa fa-check"></span>
														</div>
														<h4 class="black_txt mart10 pad0 bold fsz20 xs-fsz16 txt_2d3e50">Har ingen inbjudan</h4>
														<div class="mart10 fsz12 txt_425b76 black_txt">Up to five hours per month with an inbound consultant for guidance on your marketing and sales strategy, plus quarterly strategy reports</div>
														<div class="padt20 talc">
															<a href="#" class="load_more_results dblue_btn marrl5">No</a>
															
														</div>
													</div></a>
												</div>
												
												
												
												
											</div>
											
											
											
										</div>
										
									</div>
								</div>
								
								
								<div class="container tab-header  talc dark_grey_txt mart20">
									<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone lgtgrey2_bg">
										<li>
										<a href="#" class="dblock brdradt5 active" data-id="tab_inprogress">
											<span class="count black_txt"><?php echo $approveCount['num']; ?></span>
										</a>
									</li>
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_sent">
											<span class="count black_txt">0</span><span class="black_txt">Sent requests</span>
										</a>
									</li>
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_total">
											<span class="count black_txt"><?php echo $requestCount['num']; ?></span><span class="black_txt">Received requests</span>
										</a>
									</li>
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_offered">
											<span class="count black_txt"><?php echo $rejectCount['num']; ?></span><span class="black_txt">Rejected</span>
										</a>
									</li>
											
										<div class="clear"></div>
									</ul>
									<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
										<option value="tab1_Internal" selected></option>
										<option value="tab1_InternalNotPosted">Not Posted</option>
										<option value="tab1_InternalPosted">Posted</option>
									<!--<option value="tab1_InternalPublished">Published</option>
										<option value="tab1_InternalInProgress">In Progress</option>
										<option value="tab1_InternalClosed">Closed</option>-->
									</select>
									<div class="clear"></div>
								</div>
					
								<div class="container  white_bg fsz14 dark_grey_txt">
					
									<!-- Summary -->
										<div class="tab-content  " id="tab_sent">
										<div class="mart20 brdb padb5">
											<h2 class="fleft mar0 padb5 fsz15 ">Sent requests</h2>
											<div class="fright pos_rel padb5 fsz13">
												<a href="#" class="class-toggler" data-target="#profile-dropdownsent,#profile-fade1s" data-classes="active">
													<span>You got code?</span>
													<span class="fa fa-angle-down"></span>
												</a>
												<div id="profile-dropdownsent" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd">
													<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
														<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
															<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
														</div>
														<span class="fxshrink_0 marl15">Step 4/5</span>
													</div>
													<div class="padtb30 padrl15 talc">
														<div class="marb10">
															<span class="fa fa-envelope-open-o fsz40"></span>
														</div>
														<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
														<div class="mart10">
															Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
														</div>
														<div class="mart20">
															<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
														</div>
														<div class="mart20">
															Then verify that it's set up by <a href="#">sending a test email</a>.
														</div>
													</div>
												</div>
											</div>
											<div class="clear"></div>
										</div>
									
									<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytablesent">
											<thead class="fsz16" style="color: #c6c8ca;">
												<tr class="lgtgrey2_bg">
													<!--<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">First Name</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Last Name</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Email</div>
													</th>
													
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Status</div>
													</th>
													
												</tr>
												
											</thead>
											
										</table>
										</form>
									<div class="padt20 talc">
													<a href="#" class="load_more_results dblue_btn marrl5">View More</a>
													
												</div>
								</div>
								
									<div class="tab-content  " id="tab_total">
										<div class="mart20 brdb padb5">
											<h2 class="fleft mar0 padb5 fsz15 ">Received requests</h2>
											<div class="fright pos_rel padb5 fsz13">
												<a href="#" class="class-toggler" data-target="#profile-dropdown,#profile-fade1" data-classes="active">
													<span>You got code?</span>
													<span class="fa fa-angle-down"></span>
												</a>
												<div id="profile-dropdown" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd">
													<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
														<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
															<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
														</div>
														<span class="fxshrink_0 marl15">Step 4/5</span>
													</div>
													<div class="padtb30 padrl15 talc">
														<div class="marb10">
															<span class="fa fa-envelope-open-o fsz40"></span>
														</div>
														<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
														<div class="mart10">
															Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
														</div>
														<div class="mart20">
															<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
														</div>
														<div class="mart20">
															Then verify that it's set up by <a href="#">sending a test email</a>.
														</div>
													</div>
												</div>
											</div>
											<div class="clear"></div>
										</div>
									
									<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
											<thead class="fsz16" style="color: #c6c8ca;">
												<tr class="lgtgrey2_bg">
													<!--<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">First Name</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Last Name</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Email</div>
													</th>
													
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Approve</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Reject</div>
													</th>
												</tr>
												
											</thead>
											<tbody id="pending">
											<?php $i=0;
											
											foreach($requestDetail as $category => $value) 
												{
													
												  
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16">
													
													<td class="pad5 brdb tall cn">
														<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
													</td>
													<td class="pad5 brdb tall nm">
														<div class="padtb5 "><?php echo $value['last_name']; ?></div>
													</td>
													<td class="pad5 brdb tall cd">
														<div class="padtb5 "><?php echo $value['email']; ?></div>
													</td>
													
													
													<td class="pad5 brdb tall ap" >
														<div class="padtb5"><a href="../approveRequest/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>" >Approve</a></div>
													</td>
													<td class="pad5 brdb tall rj">
														<div class="padtb5"><a href="../rejectRequest/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>">Reject</a></div>
													</td>
													
												</tr>
												<?php } ?>
											</tbody>
											
										</table>
										</form>
									<div class="padt20 talc">
													<a href="#" class="load_more_results dblue_btn marrl5" onclick="add_more_rows(this);" value="1">View More</a>
													
												</div>
								</div>
								
								<script>
						function add_more_rows(link) {
							var id_val=parseInt($(link).attr('value'))+1;
								var html1="";
								var send_data={};
								send_data.id=parseInt($(link).attr('value'));
								$(link).attr('value',id_val);
								//send_data.message=id;
							$.ajax({
            type:"POST",
            url:"../moreRequestDetail/<?php echo $data['cid']; ?>",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									html1=data1;
									var $tbody = $("#pending"),
									html=html1;
								
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
								
								<div class="tab-content mart5" id="tab_inprogress">
									<form>
									<!-- inner tab header -->
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
											<thead class="fsz16" style="color: #c6c8ca;">
												<tr class="lgtgrey2_bg">
													<!--<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">First Name</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Last Name</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Email</div>
													</th>
													
												<!--	<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Transfer</div>
													</th>-->
													
												</tr>
												
											</thead>
											<tbody id="approved">
											<?php $i=0;
											
											foreach($approveDetail as $category => $value) 
												{
													
												  
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16">
													
													<td class="pad5 brdb tall cn">
														<a href="https://www.qloudid.com/user/index.php/ManagePermissions/setPermissions/<?php echo $value['encId']; ?>"><div class="padtb5 " ><?php echo $value['first_name']; ?></div></a>
													</td>
													<td class="pad5 brdb tall nm">
														<div class="padtb5 "><?php echo $value['last_name']; ?></div>
													</td>
													<td class="pad5 brdb tall cd">
														<div class="padtb5 "><?php echo $value['email']; ?></div>
													</td>
													
													<?php if($value['enc']=="") { ?>
														<td class="pad5 brdb tall ap" >
														
													</td>
														<?php } else { ?>
													<td class="pad5 brdb tall ap" >
														<div class="padtb5"><a href="../sendQloudEmployee/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>" >Transfer</a></div>
													</td>
													<?php } ?>
													
												</tr>
												<?php } ?>
											</tbody>
											
										</table>
										</form>
									<div class="padt20 talc">
													<a href="#" class="load_more_results dblue_btn marrl5" onclick="add_more_rows_approved(this);" value="1">View More</a>
													
												</div>
								</div>
								<script>
						function add_more_rows_approved(link) {
							var id_val=parseInt($(link).attr('value'))+1;
								var html1="";
								var send_data={};
								send_data.id=parseInt($(link).attr('value'));
								$(link).attr('value',id_val);
								//send_data.message=id;
							$.ajax({
            type:"POST",
            url:"../moreApprovedDetail/<?php echo $data['cid']; ?>",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									html1=data1;
									var $tbody = $("#approved"),
									html=html1;
								
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
								<div class="tab-content " id="tab_offered">
									<div class="mart20 brdb padb5">
											<h2 class="fleft mar0 padb5 fsz15 ">Rejected</h2>
											<div class="fright pos_rel padb5 fsz13">
												<a href="#" class="class-toggler" data-target="#profile-dropdown1,#profile-fade1" data-classes="active">
													<span>You got code?</span>
													<span class="fa fa-angle-down"></span>
												</a>
												<div id="profile-dropdown1" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd">
													<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
														<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
															<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
														</div>
														<span class="fxshrink_0 marl15">Step 4/5</span>
													</div>
													<div class="padtb30 padrl15 talc">
														<div class="marb10">
															<span class="fa fa-envelope-open-o fsz40"></span>
														</div>
														<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
														<div class="mart10">
															Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
														</div>
														<div class="mart20">
															<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
														</div>
														<div class="mart20">
															Then verify that it's set up by <a href="#">sending a test email</a>.
														</div>
													</div>
												</div>
											</div>
											<div class="clear"></div>
										</div>
									
									
								<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
											<thead class="fsz16" style="color: #c6c8ca;">
												<tr class="lgtgrey2_bg">
													<!--<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">First Name</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Last Name</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Email</div>
													</th>
													
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Status</div>
													</th>
													
												</tr>
												
											</thead>
											<tbody id="rejected">
											<?php $i=0;
											
											foreach($rejectDetail as $category => $value) 
												{
													
												  
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16">
													
													<td class="pad5 brdb tall cn">
														<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
													</td>
													<td class="pad5 brdb tall nm">
														<div class="padtb5 "><?php echo $value['last_name']; ?></div>
													</td>
													<td class="pad5 brdb tall cd">
														<div class="padtb5 "><?php echo $value['email']; ?></div>
													</td>
													
													
													<td class="pad5 brdb tall ap" >
														<div class="padtb5"><a href="#" >Rejected</a></div>
													</td>
													
													
												</tr>
												
												<?php } ?>
											</tbody>
											
										</table>
										</form>
									<div class="padt20 talc">
													<a href="#" class="load_more_results dblue_btn marrl5" onclick="add_more_rows_rejected(this);" value="1">View More</a>
													
												</div>
								</div>
								
								<script>
						function add_more_rows_rejected(link) {
							//var $tbody = $("#rejected");
							//alert($tbody.html); return false;
							var id_val=parseInt($(link).attr('value'))+1;
								var html1="";
								var send_data={};
								send_data.id=parseInt($(link).attr('value'));
								$(link).attr('value',id_val);
								//send_data.message=id;
							$.ajax({
            type:"POST",
            url:"../moreRejectDetail/<?php echo $data['cid']; ?>",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									html1=data1;
									var $tbody = $("#rejected"),
									html=html1;
								//alert(data1); 
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
					
								<div class="clear"></div>
							</div>
							
							<div class="clear"></div>
						
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
					<form method="POST" >
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">TJÄNSTEN är en del av vårt premiuminnehåll</h3>
						<div class="marb20">
							<img src="<?php echo $path; ?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" />
						</div>
						<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
						<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
						<div class="wi_75 dflex fxwrap_w marrla marb20 tall">
							<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Hålla dig  uppdaterad inom arbetsrätt</span>
							</div>
							<!--<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Läsa nyheter och  följa trender </span>
							</div>-->
							<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Använda smarta webblösningar</span>
							</div>
							<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
							</div>
							<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Utföra bakgrundskontroller på din personal eller nästa rekryt </span>
							</div>
							<!--<div class="wi_50 marb10">
								<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
								<span class="valm">Men nästa gång behovet dyker upp då finns allting färdigt.</span>
							</div>-->
						</div>
						
						<div class="marb10">
							<input type="text" id="email_text" name="email_text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" />
						</div>
						<div>
							<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp"/>
							<input type="hidden" id="indexing_savee" name="indexing_savee" >
						</div>
						<div class="marb10 padtb10 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div>
							<span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span>
						</div>
						<div class="padb0">
							<a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a>
						</div>
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
	
	
	<!-- CALLBACK 
	<div class="column_m zi10 frtred_bg">
		<div class="wrap maxwi_100 padtb60 padrl15 talc white_txt fsz16">
			<h2 class="padb15 fsz44 white_txt">Räkna ut kostnaden för ditt medlemskap</h2>
			<p class="padb15 uppercase">Välj medlemskap, ange postnummer och antal anställda och se årskostnad</p>
			<form>
				<div class="dflex fxwrap_w justc_c marrl-5">
					<div class="wi_25 sm-wi_33 xs-wi_33 xxs-wi_100 bs_bb marb15 padrl5">
						<label class="sr-only" for="callback-select">Type</label>
						<select class="wi_100 jui-select" id="callback-select" data-button-classes="wi_100_i hei_36p padt9 padrl15 nobrd frtdred_bg_i white_txt_i" data-icon-classes="fa fa-angle-down marr-10 bgi_none_i txtind0" data-menu-classes="fsz16">
							<option value="1">Företagare</option>
							<option value="2">Nystartad företagare</option>
							<option value="3">Ung företagare</option>
							<option value="4">Student</option>
							<option value="5">Stödjande</option>
						</select>
					</div>
					<div class="wi_25 sm-wi_33 xs-wi_33 xxs-wi_100 bs_bb marb15 padrl5">
						<label class="sr-only" for="callback-text">Ange ditt postnummer</label>
						<input type="text" class="wi_100 hei_36p padrl10 nobrd brdrad3 frtdred_bg fsz16 white_txt" id="callback-text" placeholder="Ange ditt postnummer" /> </div>
					<div class="wi_25 sm-wi_33 xs-wi_33 xxs-wi_100 bs_bb marb15 padrl5">
						<label class="sr-only" for="callback-number">Ange antal anställda</label>
						<input type="number" class="wi_100 hei_36p padrl10 nobrd brdrad3 frtdred_bg fsz16 white_txt" id="callback-number" placeholder="Ange antal anställda" /> </div>
					<div class="wi_100p xxs-wi_100 bs_bb marb15 padrl5">
						<button type="submit" class="wi_100 hei_36p nobrd brdrad3 white_bg frtgrey_bg_h fsz16 frtred_txt curp trans_all2">Räkna ut</button>
					</div>
				</div>
			</form>
			<p class="padt15 padb15 uppercase"> <a href="#" class="white_txt" target="_blank">Läs mer om medlemskapet</a> </p>
		</div>
	</div>
	<div class="clear"></div>
	-->
	
	<!-- ADVANTAGES 
	<div class="column_m zi10 frtlgrey_bg">
		<div class="wrap maxwi_100 padt30 padb10 padrl15 fsz16 dark_grey_txt">
			<h2 class="padb15 talc fsz44 dark_grey_txt">Förmåner &amp; Försäkringar</h2>
			<p class="padb15 uppercase talc">Ingår i ditt medlemskap</p>
			<div class="slick-slider dflex alit_s marrl-15 padt15" data-slick-settings="dots:true,arrows:false,infinite:true,slidesToShow:4,slidesToScroll:1" data-slick-sm-settings="dots:true,arrows:false,infinite:true,slidesToShow:3,slidesToScroll:1" data-slick-xs-settings="dots:true,arrows:false,infinite:true,slidesToShow:2,slidesToScroll:1" data-slick-xxs-settings="dots:true,arrows:false,infinite:true,slidesToShow:1,slidesToScroll:1">
				<div class="pos_rel marb30 padrl15 padb40">
					<div> <img src="<?php echo $path;?>html/usercontent/images/news/foretagarna1.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Affärsnätverket" alt="Affärsnätverket" />
						<h3 class="padb10 fsz24 dark_grey_txt">Affärsnätverket</h3>
						<div> Hitta andra företagare och få nya kunder med Företagarnas Affärsnätverk. Sök medlemmar, beställ offerter och gör affärer! </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
				</div>
				<div class="pos_rel marb30 padrl15 padb40">
					<div> <img src="<?php echo $path;?>html/usercontent/images/news/foretagarna2.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Försäkringar" alt="Försäkringar" />
						<h3 class="padb10 fsz24 dark_grey_txt">Försäkringar</h3>
						<div> Omfattande försäkringspaket anpassat för dig som företagare. Vi har försäkringar för dig, ditt företag och dina anställda. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
				</div>
				<div class="pos_rel marb30 padrl15 padb40">
					<div> <img src="<?php echo $path;?>html/usercontent/images/news/foretagarna3.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Rådgivningen" alt="Rådgivningen" />
						<h3 class="padb10 fsz24 dark_grey_txt">Rådgivningen</h3>
						<div> Ring våra jurister kostnadsfritt när du behöver hjälp med en juridisk fråga! Eller sök rätt på svaret i vår FAQ. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
				</div>
				<div class="pos_rel marb30 padrl15 padb40">
					<div> <img src="<?php echo $path;?>html/usercontent/images/news/foretagarna4.jpg" width="265" height="177" class="wi_100 hei_auto dblock marb15" title="Förmåner" alt="Förmåner" />
						<h3 class="padb10 fsz24 dark_grey_txt">Förmåner</h3>
						<div> Spar tid och pengar genom att nyttja våra medlemsförmåner. Erbjudanden och rabatter på allt från bilar, drivmedel, resor, telefoni och hårdvara. </div> <a href="#" class="dblock pos_abs bot0 left15p undln_h bold frtgreen_txt">Läs mer</a> </div>
				</div>
			</div>
		</div>
		<style>
			.slick-dots li button:before {
				font-size: 15px;
				color: #00c0a9!important;
			}
		</style>
	</div>
	<div class="clear"></div>
	-->
	
	
		<!-- New client modal -->
		
		<!-- Slide fade -->
		<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		
			// Charts
			google.charts.load('current', { 'packages': ['corechart'] });
			
			
			// Line Chart
			google.charts.setOnLoadCallback(drawLineChartInhouse);
			function drawLineChartInhouse() {
			    var data = google.visualization.arrayToDataTable([
			        ['Day', 'Upcoming', 'Incoming'],
			        ['MON', 100, 60],
			        ['TUE', 90, 60],
			        ['WED', 105, 50],
			        ['THU', 115, 45],
			        ['FRI', 110, 50],
			        ['SAT', 112, 52],
			        ['SUN', 200, 48]
			    ]);
			
			    var options = {
			        curveType: 'function',
			        chartArea : {
			        	width: '100%',
			        	height: 160,
			        	top: 20,
			        },
			        pointSize: 5,
			        colors: ['#3691c0', '#ba03d9']
			    };
			    
			    var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
			    chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawLineChartStaffing);
			function drawLineChartStaffing() {
			    var data = google.visualization.arrayToDataTable([
			        ['Day', 'Upcoming', 'Incoming'],
			        ['MON', 100, 60],
			        ['TUE', 90, 60],
			        ['WED', 105, 50],
			        ['THU', 115, 45],
			        ['FRI', 110, 50],
			        ['SAT', 112, 52],
			        ['SUN', 200, 48]
			    ]);
			
			    var options = {
			        curveType: 'function',
			        chartArea : {
			        	width: '100%',
			        	height: 160,
			        	top: 20,
			        },
			        pointSize: 5,
			        colors: ['#3691c0', '#ba03d9']
			    };
			    
			    var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
			    chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawLineChartRecruiting);
			function drawLineChartRecruiting() {
			    var data = google.visualization.arrayToDataTable([
			        ['Day', 'Upcoming', 'Incoming'],
			        ['MON', 100, 60],
			        ['TUE', 90, 60],
			        ['WED', 105, 50],
			        ['THU', 115, 45],
			        ['FRI', 110, 50],
			        ['SAT', 112, 52],
			        ['SUN', 200, 48]
			    ]);
			
			    var options = {
			        curveType: 'function',
			        chartArea : {
			        	width: '100%',
			        	height: 160,
			        	top: 20,
			        },
			        pointSize: 5,
			        colors: ['#3691c0', '#ba03d9']
			    };
			    
			    var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
			    chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
			function drawLineChartBackgroundChecks() {
			    var data = google.visualization.arrayToDataTable([
			        ['Day', 'Upcoming', 'Incoming'],
			        ['MON', 100, 60],
			        ['TUE', 90, 60],
			        ['WED', 105, 50],
			        ['THU', 115, 45],
			        ['FRI', 110, 50],
			        ['SAT', 112, 52],
			        ['SUN', 200, 48]
			    ]);
			
			    var options = {
			        curveType: 'function',
			        chartArea : {
			        	width: '100%',
			        	height: 160,
			        	top: 20,
			        },
			        pointSize: 5,
			        colors: ['#3691c0', '#ba03d9']
			    };
			    
			    var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
			    chart.draw(data, options);
			}
			
			
			// Donut Chart
			// - yearly
			google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
			function drawDonutChartYearlyInhouse() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 38],
		          	['other', 22],
		          	['23-30 y.o.', 26],
		          	['18-22 y.o.', 14]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
			function drawDonutChartYearlyStaffing() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 38],
		          	['other', 22],
		          	['23-30 y.o.', 26],
		          	['18-22 y.o.', 14]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
			function drawDonutChartYearlyRecruiting() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 38],
		          	['other', 22],
		          	['23-30 y.o.', 26],
		          	['18-22 y.o.', 14]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
			function drawDonutChartYearlyBackgroundChecks() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 38],
		          	['other', 22],
		          	['23-30 y.o.', 26],
		          	['18-22 y.o.', 14]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
        		chart.draw(data, options);
			}
			
			
			// - monthly
			google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
			function drawDonutChartMonthlyInhouse() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 48],
		          	['other', 12],
		          	['23-30 y.o.', 16],
		          	['18-22 y.o.', 24]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
			function drawDonutChartMonthlyStaffing() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 48],
		          	['other', 12],
		          	['23-30 y.o.', 16],
		          	['18-22 y.o.', 24]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
			function drawDonutChartMonthlyRecruiting() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 48],
		          	['other', 12],
		          	['23-30 y.o.', 16],
		          	['18-22 y.o.', 24]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
			function drawDonutChartMonthlyBackgroundChecks() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 48],
		          	['other', 12],
		          	['23-30 y.o.', 16],
		          	['18-22 y.o.', 24]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
        		chart.draw(data, options);
			}
			
			
			// - daily
			google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
			function drawDonutChartDailyInhouse() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 53],
		          	['other', 16],
		          	['23-30 y.o.', 21],
		          	['18-22 y.o.', 10]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
			function drawDonutChartDailyStaffing() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 53],
		          	['other', 16],
		          	['23-30 y.o.', 21],
		          	['18-22 y.o.', 10]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
			function drawDonutChartDailyRecruiting() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 53],
		          	['other', 16],
		          	['23-30 y.o.', 21],
		          	['18-22 y.o.', 10]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
        		chart.draw(data, options);
			}
			
			google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
			function drawDonutChartDailyBackgroundChecks() {
			    var data = google.visualization.arrayToDataTable([
		          	['Age range', 'Attendance'],
		          	['< 18 y.o.', 53],
		          	['other', 16],
		          	['23-30 y.o.', 21],
		          	['18-22 y.o.', 10]
		          	
		        ]);
		        
		        var options = {
		          	pieHole: 0.8,
		          	chartArea : {
			        	width: 320,
			        	height: 150,
			        	top: 20,
			        },
			        pieStartAngle : -90,
			        legend: {
			        	position: 'right',
			        	alignment: 'center',
			        	textStyle: {
			        		fontSize: 13,
			        		color: '#c6c8ca',
			        	}
			        },
			        pieSliceText : 'none',
		          	colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		        };
		        
			    var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
        		chart.draw(data, options);
			}
		
	
		tinyMCE.init({
				selector: '.texteditor',
				plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
				toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
				//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
				//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
				menubar: false,
				toolbar_items_size: 'small',
				style_formats: [
				{
					title: 'Bold text',
					inline: 'b'
				},
				{
					title: 'Red text',
					inline: 'span',
					styles:
					{
						color: '#ff0000'
					}
				},
				{
					title: 'Red header',
					block: 'h1',
					styles:
					{
						color: '#ff0000'
					}
				},
				{
					title: 'Example 1',
					inline: 'span',
					classes: 'example1'
				},
				{
					title: 'Example 2',
					inline: 'span',
					classes: 'example2'
				},
				{
					title: 'Table styles'
				},
				{
					title: 'Table row 1',
					selector: 'tr',
					classes: 'tablerow1'
				}],
				templates: [
				{
					title: 'Test template 1',
					content: 'Test 1'
				},
				{
					title: 'Test template 2',
					content: 'Test 2'
				}]
			});
	</script>
</body>

</html>