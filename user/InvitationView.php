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
			
			function searchCompany()
			{
				var send_data={};
				
				send_data.id=$("#cid_number").val();
				$.ajax({
					type:"POST",
					url:"searchCompanyDetail",
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
					url:"selectOrganizationWeb",
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
				// alert("error");
				/*	 $.get("CreateCompany/selectOrganizationWeb/'"+web+"'",function(data1,status){
					
					if(data1 == 1)
					{
					alert("This Organization is already registered in database");
					return false;
					}
					else if(data1 == 0)
					{
					document.getElementById("save_indexing").submit();
					}
					else if(data1 == 2)
					{
					alert("Some error occurred, Please report to web admin !!!");
					return false;
					}
					
					
					});
				*/
				
				//document.getElementById("save_indexing").submit();
			}
			
			var available_yes=0;
			function approveUser(id,st,par)
			{
				//alert(id); return false;
				var a=par.closest("tr");
				//var val1=document.getElementById("number").innerHTML; 
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
					
					//document.getElementById("number").innerHTML=val1-1;
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
						window.location.href ="https://www.qloudid.com/user/index.php/Invitation/invitationShow";
					}
					else
					{
						alert("Failed !!!");
					}
					
				})
				.fail(function(){})
				.always(function(){});
				
			}
			
			function updateRequest(id,link)
			{
				var send_data = {};
				send_data.c_id=id;
				if($(link).hasClass('checked'))
				{
					send_data.updateR=0; 
				}
				else
				{ 
					send_data.updateR=1; 
				}
				$.ajax({
					url: '../Invitation/updateRequest',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data){
					
					
					
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
	
	<body class="white_bg">
		
		<!-- HEADER -->
				<div class="column_m header header_small bs_bb grey_header_bg" >
			<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 grey_header_bg" >
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15">
					<a href="https://www.qloudid.com/user/index.php/NewsfeedDetail"> <img src="<?php echo $path; ?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10">
					<div class="grey_languages">
						<a href="#" id="language_selector" class="padrl10"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" /></a>
						<ul class="wi_100 mar0 pad5 blue_bg">
							<li class="dblock">
								<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
								</a>
							</li>
							<li class="dblock">
								<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path; ?>html/usercontent/images/slide/flag_us.png" width="24" height="16" title="Sweden" alt="Sweden" />
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="fright xs-dnone sm-dnone">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs hidden-sm fright pos_rel "> <a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow" id="usermenu_singin" class="translate hei_30pi dblock padrl25 red_bg uppercase lgn_hight_30 white_txt white_txt_h brdrad3" data-en="Close" data-sw="Close">Close</a> </li>
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
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Close</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear" id=""></div>
	
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40" onclick="removeActive();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10   white_bg">
						
						
						
						
						
						
						<div class="padb20 xxs-padb0 ">
							<!-- Charts -->
						<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
									
									<div class="padb10 ">
									<h1 class="padb5 talc fsz50">SHARE & MONITOR</h1>
									<p class="pad0 talc fsz18 padb20 brdb wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10">Here you can share your data with your employers</p>
								</div>
								
								
								
								<div class="clear"></div>
								
								
							</div>
							
							
							
							<div class="padb15 mart20">
								<h3 class="pad0 uppercase fsz20 blue_txt"><a href="#" class="show_popup_modal" data-target="#sales_popup">Premium Services</a></h3>
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
											<div class="wi_50 xxs-wi_100 dflex alit_s  marb30 padrl15">
												<a href="#" class="show_popup_modal" data-target="#gratis_popup_unique"><div class="wi_100 dflex fxdir_col alit_c justc_c pos_rel zi1 pad25 talc">
													<input type="checkbox" name="priority-access" id="enterprise-priority-access" class="price-addon price-value sr-only default" data-regularity="monthly" value="350" data-label="Priority Access" data-note="(billed annually)">
													<div class="wi_100 hei_100 pos_abs zi-1 top0 left0 bxsh_ins0001_00a4bd_sibc brd brdclr_00a4bd brdrad5 bg_f bg_e6f5f8_ph bg_e6f5f8_sibc"></div>
													<label for="enterprise-priority-access" class="wi_100 hei_100 dblock pos_abs zi10 top0 left0 curp"></label>
													
													<div class="wi_20p hei_20p dnone_sibc marrla brd brdwi_2 brdclr_00a4bd brdrad3 bg_f talc lgn_hight_n"></div>
													<div class="wi_20p hei_20p dnone dblock_sibc marrla brd brdwi_2 brdclr_00a4bd brdrad3 bg_f talc lgn_hight_n fsz14 txt_00a4bd">
														<span class="fa fa-check"></span>
													</div>
													<h4 class="mart10 pad0 bold fsz20 xs-fsz16 txt_2d3e50">Har fått en inbjudan</h4>
													<div class="mart10 fsz12 txt_425b76 black_txt">Monthly sessions with an inbound consultant for guidance on your marketing and sales strategy, plus quarterly strategy reports</div>
													<div class="padt20 talc">
														<a href="#" class=" load_more_results dblue_btn marrl5" >Yes</a>
														
													</div>
												</div></a>
											</div>
											<div class="wi_50 xxs-wi_100 dflex alit_s  marb30 padrl15">
												<a href="#" class="show_popup_modal" data-target="#gratis_popup_company_search"><div class="wi_100 dflex fxdir_col alit_c justc_c pos_rel zi1 pad25 talc">
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
										<a href="#" class="dblock brdradt5 active" data-id="tab_total">
											<span class="count black_txt"><?php echo $approveCount['num']+$requestApprovedCount['num']; ?></span>
											<span></span>
										</a>
									</li>
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_total1">
											<span class="count black_txt"><?php echo $requestPendingCount['num']; ?></span>
											<span class="black_txt">My Requests</span>
										</a>
									</li>
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_total2">
											<span class="count black_txt"><?php echo $rowP['num']; ?></span>
											<span class="black_txt">Employer Requests</span>
										</a>
									</li>
									<div class="clear"></div>
								</ul>
								<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
									<option value="tab_total" selected><?php echo $approveCount['num']+$requestApprovedCount['num']; ?></option>
									<option value="tab_total1">My Requests</option>
									<option value="tab_total2">Employer Requests</option>
									<!--<option value="tab1_InternalPublished">Published</option>
										<option value="tab1_InternalInProgress">In Progress</option>
									<option value="tab1_InternalClosed">Closed</option>-->
								</select>
								<div class="clear"></div>
							</div>
							
							<div class="container  white_bg fsz14 dark_grey_txt">
								
								<!-- Summary -->
								<div class="mart30 brdb">
									<h2 class="fleft mar0 padb5 fsz15 bold">Approved</h2>
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
								
								<div class="tab-content padb25 padt5 active" id="tab_total">
									
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
										<thead class="fsz16" style="color: #c6c8ca;">
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5">Company</div>
												</th>
												
												<th class="pad5 brdb nobold  tall hidden-xs" style="color:#c6c8ca;">
													<div class="padtb5">Approved date</div>
												</th>
												<th class="pad5 brdb nobold hidden-xs tall" style="color:#c6c8ca;">
													<div class="padtb5">Initiator</div>
												</th>
												<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5">Action</div>
												</th>
											</tr>
											
										</thead>
										<tbody  id="allRequest">
											<?php 
											echo $rowUserApproved;  ?>
										</tbody>
										
									</table>
									<div class="padt20 talc">
										<a href="#" class="load_more_results dblue_btn marrl5" value="1" onclick="add_more_all(this);">View More</a>
										
									</div>
								</div>
								<script>
									function add_more_all(link) {
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
											url:"moreApprovedUser",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#allRequest"),
												html=html1;
												//alert(html);
												$tbody.html('');
												$tbody
												.append($(html))
												.find('input.check')
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
								
								<div class="tab-content " id="tab_total1">
									
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1">
										<thead class="fsz16" style="color: #c6c8ca;">
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5">Company</div>
												</th>
												
												<th class="pad5 brdb nobold hidden-xs tall" style="color:#c6c8ca;">
													<div class="padtb5">Created Date</div>
												</th>
												<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5">Status</div>
												</th>
												
											</tr>
											
										</thead>
										<tbody id="myRequest">
											<?php $i=0;
												
												foreach($requestPendingDetail as $category => $value) 
												{
													
												?> 
												
												<tr class="fsz16">
													
													<td class="pad5 brdb tall cn">
														<div class="padtb5 " ><?php echo $value['company_name']; ?></div>
													</td>
													
													<td class="pad5 brdb hidden-xs tall cd">
														<div class="padtb5 "><?php echo $value['created_on']; ?></div>
													</td>
													<td class="pad5 brdb tall sts">
														<div class="padtb5">Pending</div>
													</td>
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									<div class="padt20 talc">
										<a href="#" class="load_more_results dblue_btn marrl5" value="1" onclick="add_more_my(this);">View More</a>
										
									</div>
								</div>
								<script>
									function add_more_my(link) {
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
											url:"moreRequestDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#myRequest"),
												html=html1;
												//alert(data1); 
												$tbody
												.append($(html))
												.find('input.check')
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
								<div class="tab-content " id="tab_total2">
									
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable2">
										<thead class="fsz16" style="color: #c6c8ca;">
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5">Company</div>
												</th>
												<th class="pad5 brdb nobold hidden-xs tall" style="color:#c6c8ca;">
													<div class="padtb5">Type</div>
												</th>
												<th class="pad5 brdb nobold hidden-xs tall" style="color:#c6c8ca;">
													<div class="padtb5">Created Date</div>
												</th>
												<th class="pad5 brdb nobold hidden-xs tall" style="color:#c6c8ca;">
													<div class="padtb5">Status</div>
												</th>
												<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5">Approve</div>
												</th>
												<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
													<div class="padtb5">Reject</div>
												</th>
											</tr>
											
										</thead>
										<tbody  id="employerRequest">
											<?php $i=0;
												
												foreach($rowUser as $category => $value) 
												{
													
													
												?> 
												
												<tr class="fsz16">
													
													<td class="pad5 brdb tall cn">
														<div class="padtb5 " ><?php echo $value['company_name']; ?></div>
													</td>
													<td class="pad5 brdb tall hidden-xs nm">
														<div class="padtb5 "><?php if ($value['invited_emp']==1) echo "Employee"; else if ($value['invited_emp']==2) echo "Student"; else if ($value['invited_emp']==3) echo "Commercial Tenant"; else if ($value['invited_emp']==4) echo "Private Tenant";?></div>
													</td>
													<td class="pad5 brdb tall hidden-xs cd">
														<div class="padtb5 "><?php echo $value['created_date']; ?></div>
													</td>
													<td class="pad5 brdb tall hidden-xs sts">
														<div class="padtb5"><?php if($value['status']==1) { echo "Approved"; } else if($value['status']==0) { echo "Pending"; } else if($value['status']==2) { echo "Rejected"; } ?></div>
													</td>
													<?php if($value['status']==0) { ?>
														<td class="pad5 brdb tall ap" id="app">
															<div class="padtb5"><a href="#" onclick="approveUser(this.id,1,this);" id="<?php echo encrypt_decrypt('encrypt',$value['id']); ?>">Approve</a></div>
														</td>
														<td class="pad5 brdb tall rj" id="rjj">
															<div class="padtb5"><a href="#" onclick="approveUser(this.id,2,this);" id="<?php echo encrypt_decrypt('encrypt',$value['id']); ?>">Reject</a></div>
														</td>
														<?php } else { ?>
														<td class="pad5 brdb tall "> </td>
														<td class="pad5 brdb tall"> </td>
													<?php } ?>
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									<div class="padt20 talc">
										<a href="#" class="load_more_results dblue_btn marrl5" value="1" onclick="add_more_employer(this);">View More</a>
										
									</div>
								</div>
								
								<script>
									function add_more_employer(link) {
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
											url:"moreEmployerRequestDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#employerRequest"),
												html=html1;
												//alert(data1); 
												$tbody
												.append($(html))
												.find('input.check')
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
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 brdrad10 " id="gratis_popup_unique" >
			<div class="modal-content pad25 brd nobrdb talc brdrad10">
				
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Premiuminnehåll</h3>
					<div class="marb20">
						<img src="../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
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
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb talc">
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
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
						<input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Please provide your unique code here" />
					</div>
					<div>
						<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();"/>
						<input type="hidden" id="indexing_save_unique" name="indexing_save_unique" >
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
			<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
				
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
	
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 brdrad10" id="sales_popup">
		<div class="modal-content pad25 brd brdrad10 ">
			
				<h3 class="pos_rel marb10 pad0 padr40 bold  fsz25 dark_grey_txt">Add Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
				
				<div class="minwi_100 dflex fxwrap_w alit_s marrl-10 marb10 mart20" id="sales_popup_boxes">
					<div class="minwi_100 dtrow brdrad5 ">
						<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c1">
					
							<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt" onclick="changeBg('c1');">
								<span class="dnone_pa">Start subscribe</span>
								<span class="dnone dblock_pa">Unsubscribe</span>
							</a>
						</div>
					</div>
					<div class="minwi_100 dtrow brdrad5 mart10">
						<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c2">
							
							<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c2');">
								<span class="dnone_pa">Start subscribe</span>
								<span class="dnone dblock_pa">Unsubscribe</span>
							</a>
						</div>
					</div>
					<div class="minwi_100 dtrow brdrad5 mart10">
						<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c3">
							
							<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c3');">
								<span class="dnone_pa">Start subscribe</span>
								<span class="dnone dblock_pa">Unsubscribe</span>
							</a>
						</div>
					</div>
					<div class="minwi_100 dtrow brdrad5 mart10">
						<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c4">
							
							<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c4');">
								<span class="dnone_pa">Start subscribe</span>
								<span class="dnone dblock_pa">Unsubscribe</span>
							</a>
						</div>
					</div>
					<div class="minwi_100 dtrow brdrad5 mart10">
						<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c5">
							
							<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c5');">
								<span class="dnone_pa">Start subscribe</span>
								<span class="dnone dblock_pa">Unsubscribe</span>
							</a>
						</div>
					</div>
					
					
				</div>
				<script>
					function changeBg(id)
					{
						if($("#"+id).hasClass('lgtgrey2_bg'))
						{
							$("#"+id).removeClass('lgtgrey2_bg');
							$("#"+id).addClass('yellow_bg');
						}
						else
						{
							$("#"+id).addClass('lgtgrey2_bg');
							$("#"+id).removeClass('yellow_bg');
						}
					}
					
					
					/*$(document).ready(function(){
						$('#sales_popup_boxes a').on('click', function(){
						if($(this).hasClass("active"))
						{
						var id_val=$("#indexing_save").val();
						var id_val = id_val.replace($(this).attr('id')+',', "");
						$("#indexing_save").val(id_val);
						}
						else
						{
						var id_val=$("#indexing_save").val()+$(this).attr('id')+',';
						$("#indexing_save").val(id_val);
						}
						$(this).toggleClass('active');
						
						return false;
						})
					});*/
				</script>
				<div class="mart30 talc">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp padr10 brd brdrad5"  />
					
				</div>
			
		</div>
	</div>
	

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