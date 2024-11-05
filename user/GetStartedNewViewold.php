<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>usercontent/images/favicon.ico">
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
		<script>
			function closeUnique()
			{
			
				document.getElementById("sales_popup").style.display='none';
			}
			function searchCompany()
			{
				var send_data={};
				
				send_data.id=$("#cid_number").val();
				$.ajax({
					type:"POST",
					url:"GetStartedNew/searchCompanyDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched").html('');
						$("#searched").append(data1);
						
					}
				});
				
			}
			
			function createCompanyPop()
			{
				
				
				
				document.getElementById("gratis_popup_company_search").style.display='none';
				document.getElementById("gratis_popup_company_searched").style.display='none';
				document.getElementById("gratis_popup_company").style.display='block';
				$(".gratis_popup_company").addClass('active');
				
				
				
				
			}
			
			function submit_unique()
			{
				if($("#unique_id").val()=="" || $("#unique_id").val()==null)
				{
					alert("Please enter your unique code!!!");
					return false;
				}
				document.getElementById("save_indexing_unique").submit();
			}
			function validateAddCompany()
			{
				var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
				
				
				if( $("#company_name_add").val() == "" )
				{
					$("#company_name_add").css("background-color","#FF9494");
					return false;
				}
				
				
				if( $("#company_website").val() == "" )
				{
					$("#company_website").css("background-color","#FF9494");
					return false;
				}
				if( $("#company_email").val() == "" )
				{
					$("#company_email").css("background-color","#FF9494");
					return false;
				}
				if (!reg.test($("#company_email").val())){
                    
                    $("#company_email").css("background-color","#FF9494");
                    alert("Incorrect Email address format");
                    return false;
                    
				}
				
				
				
				var inds  = $("#inds");
				
				if(inds.val()==0)
				{
					//alert("This company is already registered in database");
					$("#inds").css("background-color","#FF9494");
					return false;
					
				}
				
				var cntry  = $("#cntry");
				
				if(cntry.val()==0)
				{
					//alert("This company is already registered in database");
					$("#cntry").css("background-color","#FF9494");
					return false;
					
				}
				var websiteAddress =  $("#company_website").val();
				var companyEmail = $("#company_email").val();
				
				var web = companyEmail.split("@")[1];
				
				
				
				if(!websiteAddress.match(web))
				{
					alert("Email address does not match with Organization 's website URL");
					$("#company_email").css("background-color","#FF9494");
					return false;
				}
				
				var send_data={};
				
				send_data.web1='@'+web;
				$.ajax({
					type:"POST",
					url:"GetStartedNew/selectOrganizationWeb",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						if(data1 == 1)
						{
							alert("This Organization is already registered in database");
							return false;
						}
						else if(data1 == 0)
						{
							document.getElementById("save_indexing_company").submit();
						}
						else if(data1 == 2)
						{
							alert("Some error occurred, Please report to web admin !!!");
							return false;
						}
					}
				});
				
			}
			
			
		</script>
			
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<div class="column_m header header_small bs_bb white_bg ">
				<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 white_bg brdb">
					<div class="visible-xs visible-sm fleft">
						<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
					</div>
					<div class="logo hidden-xs hidden-sm marr15">
										<a href="https://www.qmatchup.com"><h3 class="marb0 pad0 fsz22 black_txt " style="font-family: 'Audiowide', sans-serif;">Qmatchup</h3></a>
										</div>
					<div class="hidden-xs hidden-sm fleft padl10">
						<div class="languages">
							<a href="#" id="language_selector" class="padrl10"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US">
									</a>
							<ul class="wi_100 mar0 pad5 blue_bg">
								<li class="dblock">
									<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US">
									</a>
								</li>
								<li class="dblock">
									<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden">
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
						<div class="hidden-xs hidden-sm padrl10">
					<a href="#" class="diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
						
						<span class="valm">Ring oss - 010-15 10 125</span>
					</a>
				</div>

							
							
						</ul>
					</div>
					<div class="top_menu top_menu_custom mart2">
						<ul class="menulist">
							
							<!--<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue"> <a href="#"  class="translate hei_30pi dblock padrl25  uppercase lgn_hight_30 black_txt black_txt_h show_popup_modal" data-en="företag" data-sw="företag" data-target="#gratis_popup_for1">företag</a> </li>
							<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue"> <a href="#"  class="show_popup_modal translate hei_30pi dblock padrl25  uppercase lgn_hight_30 black_txt black_txt_h" data-en="förläggare" data-sw="förläggare" data-target="#gratis_popup_for2">förläggare</a> </li>-->
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
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
														</div>Personal</a>
												</li>
												<li>
													<a href="#" data-id="tab-bus" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="">
														</div>Cloud ID</a>
												</li>
												<li>
													<a href="#" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="">
														</div>Verify</a>
												</li>
												<li>
													<a href="#" class="posted_jobs">
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-3.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
														</div>Cloud ID</a>
												</li>
												<li>
													<a href="#" data-id="tab-bus-vrf" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
														</div>Verify</a>
												</li>
												<li>
													<a href="#" data-id="tab-bus-act" class="posted_jobs">
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
														</div>Activate</a>
												</li>
												<li>
													<a href="#" data-id="tab-bus-eng" class="proposals">
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-4.png" width="45" height="45" title="" alt="">
														</div>Business</a>
												</li>
												<li>
													<a href="#" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-5.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-6.png" width="45" height="45" title="" alt="">
														</div>Basic - Free</a>
												</li>
												<li>
													<a href="#" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-7.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
														</div>By organization</a>
												</li>
												<li>
													<a href="#" data-id="tab-bus-act-ind" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
														</div>By industry</a>
												</li>
												<li>
													<a href="#" data-id="tab-bus-act-top" class="posted_jobs">
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-8.png" width="45" height="45" title="" alt="">
														</div>HR Portal</a>
												</li>
												<li>
													<a href="#" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-9.png" width="45" height="45" title="" alt="">
														</div>Sales</a>
												</li>
												<li>
													<a href="#" class="posted_jobs">
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-10.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-11.png" width="45" height="45" title="" alt="">
														</div>Telemarketing</a>
												</li>
												<li>
													<a href="#" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-1.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/product icons/icon-2.png" width="45" height="45" title="" alt="">
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
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
														</div>Employees</a>
												</li>
												<li>
													<a href="#" class="swedBank">
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
														</div>Customers</a>
												</li>
												<li>
													<a href="#" class="posted_jobs">
														<div><img src="<?php echo $path;?>html/usercontent/images/dropbox icons/folder.png" width="45" height="45" title="" alt="">
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
					<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="QmatchupBizSubscription" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Erbjudande</a> </div>
					<div class="clear"></div>
				</div>
				
				
				
			</div>
			<div class="clear"></div>
		
		<div class="column_m pos_rel">
		
		
		<div class="clear"></div>
		
				
		
		
				<div class="clear"></div>	
			<!-- CONTENT -->
			<div class="column_m container zi5  mart20 xs-mart20">
			<div class="wrap maxwi_100 padrl10 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="maxwi_100 wi_640p col-xs-12 col-sm-12 pos_rel zi5  fsz14  marrla  xs-pad0">
						
				
						
						<!-- Configure Data -->
						
						<div class="padrl10  xs-marrl0 sm-marrl0 white_bg">
							<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xs-padrl0">
								
								<div class="padb10 ">
									<h1 class="padb5 tall fsz50 xs-fsz35">KOM IGÅNG MED HR</h1>
									<p class="pad0 tall fsz18 padb20 brdb wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10">För att komma igång med tjänsten och framgångsrikt använda den i ditt arbete behöver vi att du konfiguerar plattformen efter ert företag. Det går fort och kommer spara dig avsevärt mer i tid senare. </p>
								</div>
								
								
								
								<div class="clear"></div>
								
								
							</div>
							
							
							
							
								</div>
<div class=" bs_bb mart0">
							
							
							
							
							<table class="wi_100" cellpadding="0" cellspacing="0">
								<tbody>
									<tr class="odd">
										<td class="wi_100 padtb0 valm talc lgtblue2_bg padrl0">
											<div class="tab-container">
			<div class="tab-content active padrl5 padtb10" id="tab-Deals" style="display: block;">
				<div class="dflex fxwrap_w alit_s ">
				<?php if($result['get_started_wizard_status']==1) { ?>
				<a href="#">
				<?php } else { ?>
				<a href="NewPersonal/userAccount" >
				<?php } ?>
				    <div class="wi_190p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padtb10 bxsh_black02_h  brdrad3 white_bg talc">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16"><?php if($result['get_started_wizard_status']==1) echo "Done"; else echo "Lägg till anställd"; ?></h3>
						        <div class="marb15 talc">
								<?php if($result['get_started_wizard_status']==1) { ?>
						            <a href="#" class="dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" >0 TOTAL</a>
								<?php } else { ?>
								 <a href="NewPersonal/userAccount" class="dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" >0 TOTAL</a>
								<?php } ?>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						
				    </div>
				    
				   </a>
				    
				<?php if($result['get_started_wizard_status']==0) { ?>
				<a href="#">
				<?php } else { ?>
				<a href="#" class="show_popup_modal" data-target="#sales_popup" >
					<?php } ?>
				    <div class="wi_190p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padtb10 bxsh_black02_h  brdrad3 white_bg talc">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16"><?php if($result['get_started_wizard_status']==1) echo "Proceed"; else echo "Lägg till anställd"; ?></h3>
						        <div class="marb15 talc">
								<?php if($result['get_started_wizard_status']==1) { ?>
						            <a href="#" class="show_popup_modal dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" data-target="#sales_popup" >0 TOTAL</a>
								<?php } else { ?>
								 <a href="#" class="dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active" >0 TOTAL</a>
								<?php } ?>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						
				    </div>
				    
				   </a>
				    
				</div>
			
		
				
				</div>
		
			
			
			
			</div>	
			<div class="tab-content" id="tab-Products">
				<div class="dflex fxwrap_w alit_s padt10">
					
					<div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">FI</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Finance</h3>
						        <div class="marb15 talc">
						            <a href="#" class="class-toggler dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				
				    <div class="wi_33-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">HR</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Gold</h3>
						        <div class="marb15 talc">
						            <a href="#" class="class-toggler dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				    
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">SA</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Sales</h3>
						        <div class="marb15 talc">
						            <a href="#" class="class-toggler dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				    
				    <div class="wi_25-20p xs-wi_50-20p xxs-wi_100-20p dflex alit_s pos_rel bs_bb mar10 padb30 bxsh_black02_h white_bg brdrad3">
					    <div class="toggle-parent wi_100 dflex alit_s">
						    <div class="wi_100 dnone_pa padt10">
						        <div class="marb15 talc">
						            <div class="wi_50p hei_50p marrla brdrad50 pfgrey_bg talc lgn_hight_50 fsz20 white_txt">MA</div>
						        </div>
						        <h3 class="marb15 talc bold fsz16">Marketing</h3>
						        <div class="marb15 talc">
						            <a href="#" class="class-toggler dinlblck padrl10 brdrad3 pfgreen_bg lgn_hight_20 white_txt" data-closest=".toggle-parent" data-classes="active">0 TOTAL</a>
						        </div>
						        <p class="talc midgrey_txt">
						            Last updated at 1 hour
						        </p>
						    </div>
						    <div class="wi_100 hide dblock_pa padt30 padb20">
						        <h3 class="marb15 talc bold fsz16">Purchase requisition</h3>
						        <div class="marb10 padrl20">
						            <a href="#" class="dblock blue_bg talc lgn_hight_40 white_txt">View Pipe</a>
						        </div>
						        <div class="padrl20">
						            <a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">New card</a>
						        </div>
						    </div>
						</div>
						<div class="wi_100 pos_abs bot0 left0 bs_bb brdt">
						    <div class="fleft padl10 lgn_hight_30 fsz11 bfgrey_txt">
						        1 Member
						    </div>
						    <div class="wi_40p fright brdl talc lgn_hight_30 fsz18">
						        <a href="#" class="dblock bfgrey_txt"><span class="fa fa-ellipsis-h"></span></a>
						    </div>
						    <div class="clear"></div>
						</div>
				    </div>
				</div>
			</div>
		</div>


										</td>
										
									</tr>
								</tbody>
							</table>
						</div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
							
							
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="clear"></div>
						
						
						
						
						<?php if($result['get_started_wizard_status']==1) { ?>
						<div class="mart20"> <a href="PersonalRequests/sentRequests" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2">Klicka här och logga in</a> </div>
						<?php } else { ?>
						<div class="mart20"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2">Klicka här och logga in</a> </div>
						<?php } ?>
						<div class="mart10"> <a href="#" class="wi_100 maxwi_500p  dflex justc_c alit_c opa90_h marrla fsz18 xs-fsz16 darkblue_txt trans_all2">Har du inget - Skaffa ett Gratis. Här</a> </div>
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
						<div class="marb20"> <img src="../../usercontent/images/gratis.png" class="maxwi_100 hei_auto"> </div>
						<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
						<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
							<div class="wi_50 marb10"> <img src="../../usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="../../usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="../../usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="../../usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="../../usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="../../usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
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
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad10 brd" id="gratis_popup_company_search">
		<div class="modal-content pad25 brd brdrad10">
			<div id="search_new">
				<h3 class="pos_rel marb10 pad0 padr40 bold fsz25 dark_grey_txt">
					Search Company
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				<div class="marb15 "  >
					<label for="new-organization-name" class="sr-only">Company Identification Number</label>
					<input type="text" id="cid_number" name="cid_number" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Company Identification Number">
				</div>
				
				
				
				<div class="mart30 talc">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14  curp white_txt brdrad5" onclick="searchCompany();" />
					
				</div>
				
			</div>
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_company_searched">
		<div class="modal-content pad25 brd brdrad10">
			<div id="searched">
				
				
			</div>
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company brdrad10 brd" id="gratis_popup_company">
		<div class="modal-content pad25 brd brdrad10 ">
			<h3 class="pos_rel marb25 pad0 padr40 bold fsz25 dark_grey_txt">
				Add Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			<form method="POST" action="GetStartedNew/createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Company Name</label>
					<input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Company Name">
				</div>
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Website</label>
					<input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Website">
				</div>
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Company Email</label>
					<input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Company Email">
				</div>
				
				<div class="marb10 padt10">
					<label for="new-organization-under" class="txt_0">Industry</label>
					<select name="inds" id= "inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica lgtgrey2_bg" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultIndus as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				<div class="marb10 padt10">
					<label for="new-organization-under" class="txt_0">Country</label>
					<select name="cntry" id= "cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica lgtgrey2_bg" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultContry as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				
				<div class="mart30 talc">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp padr10 brd brdrad5" onclick="validateAddCompany();" />
					<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				</div>
			</form>
		</div>
	</div>
	
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 brdrad10 " id="gratis_popup_unique" >
			<div class="modal-content pad25 brd nobrdb talc brdrad10">
				
				<form action="GetStartedNew/updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Premiuminnehåll</h3>
					<div class="marb20">
						<img src="../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						<!--<div class="wi_50 marb10">
							<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Läsa nyheter och  följa trender </span>
						</div>-->
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					
					<div class="marb10">
						<input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz16" placeholder="Add the code">
					</div>
					<div>
						<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();">
						<input type="hidden" id="indexing_save_unique" name="indexing_save_unique">
					</div>
					
					
				</form>
			</div>
		</div>
		
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 brdrad10" id="sales_popup">
		<div class="modal-content pad25 brd brdrad10 ">
			
				<h3 class="pos_rel marb10 pad0 padr40 bold  fsz25 dark_grey_txt">Update/Send Invitation
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Do you have any invitation</span>
						</div>
				
				<div class="mart30 talc">
					<button type="button" class="show_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp" data-target="#gratis_popup_unique" onclick="closeUnique();">Yes</button>
					<input type="button" value="No" class="show_popup_modal marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp padr10 brd brdrad5"  data-target="#gratis_popup_company_search" onclick="closeUnique();"/>
					
				</div>
			
		</div>
	</div>
	

		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
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