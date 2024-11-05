

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
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
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
		    var chk= $(a).find("td.chk").html();
		   var cn= $(a).find("td.cn").html();
		   var nm= $(a).find("td.nm").html();
		   var cd= $(a).find("td.cd").html();
		 
		  $("#myTable").last().append("<tr><td>"+chk+"</td><td>"+cn+"</td><td>"+nm+"</td><td>"+cd+"</td><td>Approved</td><td></td><td></td></tr>");
		  
	   }
	   else if(st==2)
	   {
		    var chk= $(a).find("td.chk").html();
		   var cn= $(a).find("td.cn").html();
		   //alert(cn);
		   var nm= $(a).find("td.nm").html();
		   var cd= $(a).find("td.cd").html();
		 
		 $("#myTable").last().append("<tr><td>"+chk+"</td><td>"+cn+"</td><td>"+nm+"</td><td>"+cd+"</td><td>Rejected</td><td></td><td></td></tr>");
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
	</head>
	<body style="background-color: #f9f9f9;">
		<?php include 'UserHeader.php'; ?>
	<div class="clear"></div>
		<div class="column_m container zindx5">
			<div class="wrap">
				
				<!-- Hey -->
				<div class="column_m">
					<div class="padtb30">
						<h1 class="padb5 talc fsz50">Hey, <?php echo $row_summary['name']; ?></h1>
						<p class="pad0 talc fsz16">This is your account</p>
					</div>
				</div>
				<div class="clear"></div>
				
				<div class="column_m padt15">
					
					<!-- Left sidebar -->
					<div class="left_sidebar">
						<div class="padr10">
							<div class="">
								<div class="profile_info_bx">
									<!-- Scroll menu -->
									<div class="scroll-fix">
										<div class="scroll-fix-wrap column_m fsz14" id="scroll_menu"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					
					<!-- Right content -->
					<div class="right_container">
						
						<!-- Set availability -->
						<div class="column_m mart10">
							<div class="white_bg column_m scroll_menu_header" data-text="Set availability">
								<div class="container pad25">
									<form>
										<h3 class="fleft uppercase fsz16 bold">Are you looking for work?</h3>
										<div class="boolean-control fright">
											<input type="checkbox" name="show_form" class="default" data-target="#work_params" data-true="Yes" data-false="No" />
										</div>
										<div class="clear"></div>
										<div class="hide padt20" id="work_params">
											<table class="wi_100" cellpadding="0" cellspacing="0">
												<thead>
													<tr>
														<th class="pad5">Length</th>
														<th class="pad5">Hours</th>
														<th class="pad5">Type</th>
														<th class="pad5">Where</th>
														<th class="pad5">State</th>
														<th class="pad5">City</th>
														<th class="pad5">District</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="pad5">
															<select name="length" class="default wi_100 pad5">
																<option value="10">10 weeks</option>
																<option value="9">9 weeks</option>
															</select>
														</td>
														<td class="pad5">
															<select name="hours" class="default wi_100 pad5">
																<option value="fulltime">Fulltime</option>
																<option value="parttime">Part time</option>
															</select>
														</td>
														<td class="pad5">
															<select name="type" class="default wi_100 pad5">
																<option value="daytime">Daytime</option>
																<option value="evening">Evening</option>
															</select>
														</td>
														<td>
															<select name="where" class="default wi_100 pad5">
																<option value="sweden">Sweden</option>
															</select>
														</td>
														<td class="pad5">
															<select name="state" class="default wi_100 pad5">
																<option value="stockholm">Stockholm</option>
																<option value="malmo">Malmo</option>
															</select>
														</td>
														<td class="pad5">
															<select name="city" class="default wi_100 pad5">
																<option value="stockholm">Stockholm</option>
																<option value="rissne">Rissne</option>
															</select>
														</td>
														<td class="pad5">
															<select name="city" class="default wi_100 pad5">
																<option value="tensta">Tensta</option>
																<option value="spanga">Spanga</option>
															</select>
														</td>
													</tr>
												</tbody>
											</table>
											<div class="padt30 talc">
												<button type="submit" class="dblue_btn marrl15 fsz12">Update</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						
						<!-- Suggestions -->
						<div class="column_m mart10">
							<div class="white_bg column_m scroll_menu_header" data-text="Suggestions">
								<h2 class="pad25 brdb talc fsz36">Deals</h2>
								<div class="container pad25">
									<!-- my deals -->
									<div class="marb30">
										<h3 class="brdb uppercase fsz16 bold">Your deals</h3>
										
										<table class="wi_100" cellpadding="0" cellspacing="0">
											<tr id="manage_deal_row1">
												<td class="wi_36p padr15 brdb valm talr">
													<img src="<?php echo $path; ?>html/available/images/flags/ind.png" width="36" height="36" title="US" alt="US" />
												</td>
												<td class="content-cell padtb30 brdb valm">
													<h3 class="padb5 fsz22">India - Big Saver</h3>
													<div class="date fsz12">Expires 25 September 2016</div>
												</td>
												<td class="secondary-cell wi_25 padr30 brdb valm talr">
													<span class="top_info dblock marb5 fsz20">153 min</span>
													<span class="bot_info fsz12">Left of 200 min</span>
												</td>
												<td class="secondary-cell wi_36p padl15 brdb valm talr">
													<a href="#" class="vex_manage_deal_caller dotted_btn brd fsz16 bold dark_grey_txt" data-id="manage_deal_row1">...</a>
												</td>
											</tr>
										</table>
									</div>
								
									<!-- available deals -->
									<div class="">
										<h3 class="uppercase fsz16 bold">Available deals</h3>
										
										<div class="padtb15">
											<form method="post" action="" class="padb30 brdb">
												<input type="text" placeholder="Where are you calling?" class="filter_list_input wi_100 bs_border pad15 brd fsz16" data-id="deals_list" data-row-tag="tr" data-filter-tag="h3" />
											</form>
										</div>
										
										<div class="">
											<table class="wi_100" cellpadding="0" cellspacing="0" id="deals_list">
												<tr id="manage_deal_row1">
													<td class="wi_36p padr15 brdb valm talr">
														<img src="<?php echo $path; ?>html/available/images/flags/afg.png" width="36" height="36" title="US" alt="US" />
													</td>
													<td class="content-cell padtb30 brdb valm">
														<h3 class="padb5 fsz22">Afghanistan - Big Saver</h3>
														<div class="date fsz12">Lasts for 30 days</div>
													</td>
													<td class="secondary-cell wi_20 padr30 brdb valm talr">
														<span class="top_info dblock marb5 fsz20">50 min</span>
													</td>
													<td class="wi_20 secondary-cell brdb valm talr">
														<a href="#" class="dblue_btn wi_100 bs_border talc fsz16">$9.90</a>
													</td>
												</tr>
												<tr id="manage_deal_row1">
													<td class="wi_36p padr15 brdb valm talr">
														<img src="<?php echo $path; ?>html/available/images/flags/afg.png" width="36" height="36" title="US" alt="US" />
													</td>
													<td class="content-cell padtb30 brdb valm">
														<h3 class="padb5 fsz22">Afghanistan - Max Saver</h3>
														<div class="date fsz12">Lasts for 30 days</div>
													</td>
													<td class="secondary-cell wi_20 padr30 brdb valm talr">
														<span class="top_info dblock marb5 fsz20">50 min</span>
													</td>
													<td class="wi_20 secondary-cell brdb valm talr">
														<a href="#" class="dblue_btn wi_100 bs_border talc fsz16">$9.90</a>
													</td>
												</tr>
											</table>
										</div>
									</div>
									
									<div class="padt30 talc">
										<a href="manage_deals2.html" class="dblue_btn marrl15" target="_self">Show more</a>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						
						<div class="column_m scroll_menu_header mart10 padb30 white_bg" data-text="Employees Invitation">
							<!-- tabs header -->
							<div class="container">
								<ul class="tab-header tab-header-custom talc dark_grey_txt">
									
									<li>
										<a href="#" class="active" data-id="tab_inprogress11">
											<span class="count" id="number"><?php echo $rowP['num']; ?></span>
											<span>Invitations</span>
										</a>
									</li>
									
									
									<div class="clear"></div>
								</ul>
								<div class="clear"></div>
							</div>
							
							<!-- tabs content -->
							<div class="container padt30 fsz14 dark_grey_txt">
								
								
								
								<div class="tab-content pad25" id="tab_inprogress11">
									<!-- inner tab content -->
									
												<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
											<thead class="fsz13" style="color: #c6c8ca;">
												<tr>
													<th class="pad5 brdb tall">
														<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Company name</div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Type</div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Created Date</div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Status</div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Approve</div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Reject</div>
													</th>
												</tr>
												
											</thead>
											<tbody>
											
											<?php $i=0;
											
											foreach($rowUser as $category => $value) 
												{
													
												   if($i==5)
												   {
													   break;
												   }
												?> 
												
												
												<tr id="<?php echo $i; ?>">
													<td class="pad5 brdb tall chk">
														<div class="padtb5"><input type="checkbox" name="check0" class="check"  /></div>
													</td>
													<td class="pad5 brdb tall cn">
														<div class="padtb5 " ><?php echo $value['company_name']; ?></div>
													</td>
													<td class="pad5 brdb tall nm">
														<div class="padtb5 "><?php if ($value['invited_emp']==1) echo "Employee"; else if ($value['invited_emp']==2) echo "Student"; else if ($value['invited_emp']==3) echo "Commercial Tenant"; else if ($value['invited_emp']==4) echo "Private Tenant";?></div>
													</td>
													<td class="pad5 brdb tall cd">
														<div class="padtb5 "><?php echo $value['created_date']; ?></div>
													</td>
													<td class="pad5 brdb tall sts">
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
												<?php $i++; } ?>
												
												
												</tbody>
											
										</table>
									
											</div>
								
								
							
								</div>	
							
							<div class="padt30 talc">
							<?php if($data['us']==1)
							{ ?>
								<a href="../Invitation/moreInvitationShow/1" class="dblue_btn marrl15" target="_self">Show more</a>
							<?php } else  { ?>
							<a href="#" class="dblue_btn marrl15" target="_self">Show more</a>
							<?php } ?>
							</div>
							
						</div>
						<div class="clear"></div>
						<!-- Curriculum vitae (professional summary) -->
						<div class="column_m mart10">
							<div class="white_bg column_m profile_sorting_list scroll_menu_header" data-text="Curriculum vitae">
								<div class="column_m">
									<a href="#" class="edit_user_pro tooltip" title="edit"></a>
									<div class="pad25">
										<h2 class="cyanblue_txt bold fsz16">Professional Summary</h2>
										<p class="fsz14 dark_grey_txt pad0">Solutions-focused, team oriented Senior Technical Support Analyst with broad-based experience and hands-on skill in the successful implementation of highly effective helpdesk operations and the cost-effective management of innovative customer and technical support strategies. Proven ability to successfully analyze an organization's critical support requirements, identify deficiencies and potential opportunities, and develop innovative solutions for increasing reliability and improving productivity.</p>
									</div>
								</div>
								<div class="column_m">
									<!--<a href="#" class="edit_user_pro tooltip" title="edit"></a>-->
									<div class="">
										<div class="pad25">
											<h2 class="cyanblue_txt bold fsz16 padb10">Experience Summary</h2>
										</div>
										<div class="clear"></div>
										<div class="career_timeline font_opnsns">
											<span class="trend_start"></span>
											<div class="column_m career_year_exp padb30">
												<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="year_trend"><span>Now</span></span>
												<h2 class="padb5"><strong>Chairman</strong> at Telezales</h2>
												<p>April 2012 – Present (2 years 3 months) | United Kingdom</p>
												<p>Develop sales and marketing strategies forecasts and programs inclusive of reseller channel development for existing and new SaaS software business applications plus develop organization to acquire new customers and convert Freemium customers into paying customers.</p>
												<ul class="bullet_list">
													<li>Consult on acquisition decision of additional software companies </li>
													<li>Developed financial models for acquisition of investment capital</li>
													<li>Developed Income and Expense forecast</li>
												</ul>
											</div>
											<div class="column_m career_year_exp padb30">
												<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="trend_change"></span>
												<h2 class="padb5"><strong>CTO</strong> at Telezales</h2>
												<p>April 2014 – Present (1 years 5 months) | United Kingdom</p>
											</div>
											<div class="column_m career_year_exp padb30">
												<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="year_trend"><span>2014</span></span>
												<h2 class="padb5"><strong>Business Executive Developer</strong> at Versata Software, Inc.</h2>
												<p>April 2012 – Present (2 years 3 months) | United Kingdom</p>
												<p>Under full time contract relationship, I was responsible for development and management of global partner programs including leadership, sales and marketing development for Versata subsidiary partner companies.</p>
												<ul class="bullet_list">
													<li>Increased annual software revenue by 61% from $1.9M to $3.1M with a strategic sales program </li>
													<li>Grew partner revenue to the company's largest producing quarter of $932K </li>
													<li>Increased company profitability by $355K ongoing, per year from maintenance revenue </li>
												</ul>
											</div>
											<div class="column_m career_year_exp padb30">
												<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="trend_change"></span>
												<h2 class="padb5"><strong>Business Analyst</strong> at Telezales</h2>
												<p>April 2014 – Present (5 months) | United Kingdom</p>
											</div>
											<div class="column_m career_year_exp padb30">
												<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="trend_change"></span>
												<h2 class="padb5"><strong>Analyst</strong> at Telezales</h2>
												<p>April 2014 – Present (5 months) | United Kingdom</p>
											</div>
											<div class="column_m career_year_exp padb30">
												<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="year_trend"><span>2011</span></span>
												<h2 class="padb5"><strong>Business Executive</strong> at Versata Software, Inc.</h2>
												<p>April 2012 – Present (2 years 3 months) | United Kingdom</p>
												<ul class="bullet_list">
													<li>Increased annual software revenue by 61% from $1.9M to $3.1M with a strategic sales program <br>
													</li>
													<li>Grew partner revenue to the company's largest producing quarter of $932K </li>
													<li>Increased company profitability by $355K ongoing, per year from maintenance revenue </li>
												</ul>
											</div>
											<div class="column_m career_year_exp padb30">
												<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="year_trend"><span>2009</span></span>
												<h2 class="padb5"><strong>Senior Director Partner Management</strong> at SSA, AG.</h2>
												<p>April 2012 – Present (2 years 3 months) | United Kingdom </p>
												<ul class="bullet_list">
													<li>Increased annual software revenue by 61% from $1.9M to $3.1M with a strategic sales program <br>
													</li>
													<li>Grew partner revenue to the company's largest producing quarter of $932K </li>
													<li>Increased company profitability by $355K ongoing, per year from maintenance revenue </li>
												</ul>
											</div>
											<div class="column_m career_year_exp padb30">
												<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="trend_change"></span>
												<h2 class="padb5"><strong>Tranee</strong> at Telezales</h2>
												<p>April 2014 – Present (5 months) | United Kingdom</p>
											</div>
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
										<h2 class="cyanblue_txt bold pad25 fsz16">Educational Summary</h2>
										<div class="career_timeline font_opnsns">
											<span class="trend_start"></span>
											<div class="mart15">
												<div class="column_m career_year_exp padb30">
													<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="year_trend"><span>2008 </span></span>
													<h2 class="padb5"><strong>Graduated as Bachelore of Science</strong></h2>
													<ul class="bullet_list">
														<li>Advanced and Quantitative Marketing </li>
														<li>Advanced Economics, Finance<br>
														</li>
														<li>Business Administration, Accounting </li>
													</ul>
												</div>
												<div class="column_m career_year_exp padb30">
													<a title="edit" class="edit_user_pro tooltip" href="#"></a> <span class="year_trend"><span>2005 </span></span>
													<h2 class="padb5"><strong>Completed Higher Studies</strong></h2>
													<ul class="bullet_list">
														<li>Advanced and Quantitative Marketing </li>
														<li>Advanced Economics, Finance<br>
														</li>
													</ul>
												</div>
												<div class="clear"></div>
											</div>
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="column_m padb25">
										<div class="wi_25 center_bx"><a class="white_btn dblock fsz14" href="#">Read more</a></div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					
						<!-- Followers -->
						<div class="column_m mart10">
							<div class="white_bg column_m scroll_menu_header" data-text="Followers">
								<div class="container pad25 dark_grey_txt">
									<form method="post" action="" class="fsz14">
										<table class="wi_100" cellpadding="0" cellspacing="0">
											<thead class="fsz13">
												<tr>
													<th class="pad5 brdb tall">
														<div class="padtb5"></div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Company</div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Vacancy</div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">My Status</div>
													</th>
													<th class="pad5 brdb tall">
														<div class="padtb5">Reason</div>
													</th>
													<th class="wi_36p pad5 brdb tall">
														<div class="padtb5">Convert</div>
													</th>
												</tr>
												
											</thead>
											<tbody>
												<tr>
													<td class="pad5 brdb tall" colspan="6">
														<div class="padtb5 bold">September</div>
													</td>
												</tr>
												<tr>
													<td class="pad5 brdb tall">
														<div class="padtb5"><input type="radio" name="activity_row1" value="0" checked  /></div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">Qmatch Inc 1</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">DU001 Salesperson 1</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">Accepted</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5"></div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5"><a href="#" class="dblue_btn min_height">Convert</a></div>
													</td>
												</tr>
												<tr>
													<td class="pad5 brdb tall">
														<div class="padtb5"><input type="radio" name="activity_row1" value="1"  /></div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">Qmatch Inc</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">DU001 Salesperson 1</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">Accepted</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5"></div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5"><a href="#" class="dblue_btn min_height">Convert</a></div>
													</td>
												</tr>
												<tr>
													<td class="pad5 brdb tall" colspan="6">
														<div class="padtb5 bold">August</div>
													</td>
												</tr>
												<tr>
													<td class="pad5 brdb tall">
														<div class="padtb5"><input type="radio" name="activity_row2" value="0" checked  /></div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">Qmatch Inc 1</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">DU001 Salesperson 1</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">Accepted</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5"></div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5"><a href="#" class="dblue_btn min_height">Convert</a></div>
													</td>
												</tr>
												<tr>
													<td class="pad5 brdb tall">
														<div class="padtb5"><input type="radio" name="activity_row2" value="1"  /></div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">Qmatch Inc</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">DU001 Salesperson 1</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5">Accepted</div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5"></div>
													</td>
													<td class="pad5 brdb tall">
														<div class="padtb5"><a href="#" class="dblue_btn min_height">Convert</a></div>
													</td>
												</tr>
											</tbody>
											
										</table>
									</form>
									<div class="padt30 talc">
										<a href="followers.html" class="dblue_btn marrl15" target="_self">Show more</a>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						
					</div>
					<div class=""></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<!-- FOOTER -->
	
		<!-- Vex phone/cart -->
		<div id="vex_modal_content" class="hide"></div>
		
		<!-- Vex add phone -->
		<div id="vex_modal_addphone_content" class="hide">
			<div class="vex_inner padt10">
				<h3 class="brdb talc fsz20">Add number</h3>
				<form action="" method="post" >
					<div class="container">
						<div class="pad15">
							<label for="inputPhoneNumber" class="dblock marb10 uppercase bold">ENTER NUMBER</label>
							<input type="text" name="inputPhoneNumber" id="inputPhoneNumber" class="wi_100 dblock bs_border pad10" placeholder="Start with +" required="required" />
						</div>
						<div class="pad15">
							<button type="submit" class="wi_100 dblue_btn">Create</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		
		<!-- Vex address -->
		<div id="vex_modal_address_content" class="hide">
			<div class="vex_inner padt10">
				<h3 class="brdb talc fsz20">Add address details</h3>
				<form action="" method="post">
					<div class="container">
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputAddressName" class="dblock marb10 uppercase bold">Address</label>
								<input type="text" name="inputAddressName" id="inputAddressName" class="wi_100 dblock bs_border pad10" placeholder="Enter your address" required="required" />
							</div>
						</div>
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputAddressZip" class="dblock marb10 uppercase bold">Zip code</label>
								<input type="text" name="inputAddressZip" id="inputAddressZip" class="wi_100 dblock bs_border pad10" placeholder="Enter your zip code" required="required" />
							</div>
						</div>
						<div class="clear"></div>
						
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputAddressCity" class="dblock marb10 uppercase bold">City</label>
								<input type="text" name="inputAddressCity" id="inputAddressCity" class="wi_100 dblock bs_border pad10" required="required" />
							</div>
						</div>
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputAddressCountry" class="dblock marb10 uppercase bold">Country</label>
								<select name="inputAddressCountry" id="inputAddressCountry" class="default wi_100 dblock bs_border pad10" required="required">
									<option value="" disabled="disabled" data-i18n="title.select_country">Choose your country</option>
									<option value="AF">Afghanistan</option>
									<option value="AL">Albania</option>
									<option value="DZ">Algeria</option>
									<option value="AS">American Samoa</option>
									<option value="AD">Andorra</option>
									<option value="AO">Angola</option>
									<option value="AI">Anguilla</option>
									<option value="AQ">Antarctica</option>
									<option value="AG">Antigua and Barbuda</option>
									<option value="AR">Argentina</option>
									<option value="AM">Armenia</option>
									<option value="AW">Aruba</option>
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="AZ">Azerbaijani Republic</option>
									<option value="BS">Bahamas</option>
									<option value="BH">Bahrain</option>
									<option value="BD">Bangladesh</option>
									<option value="BB">Barbados</option>
									<option value="BY">Belarus</option>
									<option value="BE">Belgium</option>
									<option value="BZ">Belize</option>
									<option value="BJ">Benin</option>
									<option value="BM">Bermuda</option>
									<option value="BT">Bhutan</option>
									<option value="BO">Bolivia</option>
									<option value="BA">Bosnia and Herzegovina</option>
									<option value="BW">Botswana</option>
									<option value="BR">Brazil</option>
									<option value="VG">British Virgin Islands</option>
									<option value="BN">Brunei Darussalam</option>
									<option value="BG">Bulgaria</option>
									<option value="BF">Burkina Faso</option>
									<option value="BI">Burundi</option>
									<option value="MP">CNMI</option>
									<option value="KH">Cambodia</option>
									<option value="CM">Cameroon</option>
									<option value="CA">Canada</option>
									<option value="CV">Cape Verde</option>
									<option value="BQ">Caribbean Netherlands</option>
									<option value="KY">Cayman Islands</option>
									<option value="CF">Central African Republic</option>
									<option value="TD">Chad</option>
									<option value="CL">Chile</option>
									<option value="CN">China</option>
									<option value="CO">Colombia</option>
									<option value="KM">Comoros</option>
									<option value="CG">Congo</option>
									<option value="CK">Cook Islands</option>
									<option value="CR">Costa Rica</option>
									<option value="CI">Cote d'Ivoire</option>
									<option value="HR">Croatia</option>
									<option value="CU">Cuba</option>
									<option value="CY">Cyprus</option>
									<option value="CZ">Czech Republic</option>
									<option value="CD">Democratic Republic of the Congo</option>
									<option value="DK">Denmark</option>
									<option value="DJ">Djibouti</option>
									<option value="DM">Dominica</option>
									<option value="DO">Dominican Republic</option>
									<option value="EC">Ecuador</option>
									<option value="EG">Egypt</option>
									<option value="SV">El Salvador</option>
									<option value="GQ">Equatorial Guinea</option>
									<option value="ER">Eritrea</option>
									<option value="EE">Estonia</option>
									<option value="ET">Ethiopia</option>
									<option value="FK">Falkland Islands</option>
									<option value="FO">Faroe Islands</option>
									<option value="FJ">Fiji</option>
									<option value="FI">Finland</option>
									<option value="FR">France</option>
									<option value="GF">French Guiana</option>
									<option value="PF">French Polynesia</option>
									<option value="GA">Gabonese Republic</option>
									<option value="GM">Gambia</option>
									<option value="GE">Georgia</option>
									<option value="DE">Germany</option>
									<option value="GH">Ghana</option>
									<option value="GI">Gibraltar</option>
									<option value="GR">Greece</option>
									<option value="GL">Greenland</option>
									<option value="GD">Grenada</option>
									<option value="GP">Guadeloupe</option>
									<option value="GU">Guam</option>
									<option value="GT">Guatemala</option>
									<option value="GN">Guinea</option>
									<option value="GW">Guinea-Bissau</option>
									<option value="GY">Guyana</option>
									<option value="HT">Haiti</option>
									<option value="HN">Honduras</option>
									<option value="HK">Hongkong, China</option>
									<option value="HU">Hungary</option>
									<option value="IS">Iceland</option>
									<option value="IN">India</option>
									<option value="ID">Indonesia</option>
									<option value="IR">Iran</option>
									<option value="IQ">Iraq</option>
									<option value="IE">Ireland</option>
									<option value="IL">Israel</option>
									<option value="IT">Italy</option>
									<option value="JM">Jamaica</option>
									<option value="JP">Japan</option>
									<option value="JO">Jordan</option>
									<option value="KZ">Kazakhstan</option>
									<option value="KE">Kenya</option>
									<option value="KI">Kiribati</option>
									<option value="KP">Korea (Democratic People's Republic of)</option>
									<option value="KR">Korea (Republic of)</option>
									<option value="KW">Kuwait</option>
									<option value="KG">Kyrgyzstan</option>
									<option value="LA">Laos</option>
									<option value="LV">Latvia</option>
									<option value="LB">Lebanon</option>
									<option value="LS">Lesotho</option>
									<option value="LR">Liberia</option>
									<option value="LY">Libya</option>
									<option value="LI">Liechtenstein</option>
									<option value="LT">Lithuania</option>
									<option value="LU">Luxembourg</option>
									<option value="MO">Macao, China</option>
									<option value="MK">Macedonia</option>
									<option value="MG">Madagascar</option>
									<option value="MW">Malawi</option>
									<option value="MY">Malaysia</option>
									<option value="MV">Maldives</option>
									<option value="ML">Mali</option>
									<option value="MT">Malta</option>
									<option value="MH">Marshall Islands</option>
									<option value="MQ">Martinique</option>
									<option value="MR">Mauritania</option>
									<option value="MU">Mauritius</option>
									<option value="YT">Mayotte</option>
									<option value="MX">Mexico</option>
									<option value="FM">Micronesia</option>
									<option value="MD">Moldova</option>
									<option value="MC">Monaco</option>
									<option value="MN">Mongolia</option>
									<option value="ME">Montenegro</option>
									<option value="MS">Montserrat</option>
									<option value="MA">Morocco</option>
									<option value="MZ">Mozambique</option>
									<option value="MM">Myanmar</option>
									<option value="NA">Namibia</option>
									<option value="NR">Nauru</option>
									<option value="NP">Nepal</option>
									<option value="NL">Netherlands</option>
									<option value="AN">Netherlands Antilles</option>
									<option value="NC">New Caledonia</option>
									<option value="NZ">New Zealand</option>
									<option value="NI">Nicaragua</option>
									<option value="NE">Niger</option>
									<option value="NG">Nigeria</option>
									<option value="NU">Niue</option>
									<option value="NO">Norway</option>
									<option value="OM">Oman</option>
									<option value="PK">Pakistan</option>
									<option value="PW">Palau</option>
									<option value="PS">Palestine</option>
									<option value="PA">Panama</option>
									<option value="PG">Papua New Guinea</option>
									<option value="PY">Paraguay</option>
									<option value="PE">Peru</option>
									<option value="PH">Philippines</option>
									<option value="PL">Poland</option>
									<option value="PT">Portugal</option>
									<option value="PR">Puerto Rico</option>
									<option value="QA">Qatar</option>
									<option value="RE">Reunion</option>
									<option value="RO">Romania</option>
									<option value="RU">Russia</option>
									<option value="RW">Rwanda</option>
									<option value="SH">Saint Helena</option>
									<option value="KN">Saint Kitts and Nevis</option>
									<option value="LC">Saint Lucia</option>
									<option value="PM">Saint Pierre and Miquelon</option>
									<option value="VC">Saint Vincent and the Grenadines</option>
									<option value="WS">Samoa</option>
									<option value="SM">San Marino</option>
									<option value="ST">Sao Tome and Principe</option>
									<option value="SA">Saudi Arabia</option>
									<option value="SN">Senegal</option>
									<option value="RS">Serbia</option>
									<option value="SC">Seychelles</option>
									<option value="SL">Sierra Leone</option>
									<option value="SG">Singapore</option>
									<option value="SX">Sint Marteen</option>
									<option value="SK">Slovakia</option>
									<option value="SI">Slovenia</option>
									<option value="SB">Solomon Islands</option>
									<option value="SO">Somalia</option>
									<option value="ZA">South Africa</option>
									<option value="SS">South Sudan</option>
									<option value="ES">Spain</option>
									<option value="LK">Sri Lanka</option>
									<option value="SD">Sudan</option>
									<option value="SR">Suriname</option>
									<option value="SZ">Swaziland</option>
									<option value="SE">Sweden</option>
									<option value="CH">Switzerland</option>
									<option value="SY">Syria</option>
									<option value="TW">Taiwan</option>
									<option value="TJ">Tajikistan</option>
									<option value="TZ">Tanzania</option>
									<option value="TH">Thailand</option>
									<option value="TL">Timor-Leste</option>
									<option value="TG">Togo</option>
									<option value="TK">Tokelau</option>
									<option value="TO">Tonga</option>
									<option value="TT">Trinidad and Tobago</option>
									<option value="TN">Tunisia</option>
									<option value="TR">Turkey</option>
									<option value="TM">Turkmenistan</option>
									<option value="TC">Turks &amp; Caicos</option>
									<option value="TV">Tuvalu</option>
									<option value="AE">UAE</option>
									<option value="VI">US Virgin Islands</option>
									<option value="UG">Uganda</option>
									<option value="UA">Ukraine</option>
									<option value="GB">United Kingdom</option>
									<option value="US">United States</option>
									<option value="UY">Uruguay</option>
									<option value="UZ">Uzbekistan</option>
									<option value="VU">Vanuatu</option>
									<option value="VA">Vatican</option>
									<option value="VE">Venezuela</option>
									<option value="VN">Vietnam</option>
									<option value="WF">Wallis and Futuna</option>
									<option value="YE">Yemen</option>
									<option value="ZM">Zambia</option>
									<option value="ZW">Zimbabwe</option>
								</select>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="container pad15 talc fsz16">
						<button type="submit" class="dblue_btn">Add</button>
					</div>
					<div class="clear"></div>
				</form>
			</div>
		</div>
		
		<!-- Vex payment -->
		<div id="vex_modal_payment_content" class="hide">
			<div class="vex_inner padt10">
				<h3 class="brdb talc fsz20">Add card details</h3>
				<!-- first form -->
				<form action="" method="post" class="form_1" >
					<div class="container">
						<div class="on_clmn">
							<div class="pad15">
								<label for="inputCardNumber" class="dblock marb10 uppercase bold">Card number</label>
								<input type="text" name="inputCardNumber" id="inputCardNumber" class="wi_100 dblock bs_border pad10" placeholder="1111 2222 3333 4444" required="required" />
							</div>
						</div>
						<div class="clear"></div>
						
						<div class="on_clmn">
							<div class="padtb15">
								<div class="padrl15">
									<label class="dblock marb10 uppercase bold">Expiry date</label>
								</div>
								<div class="tw_clmn">
									<div class="padrl15">
										<select name="inputMonth" id="inputMonth" class="default wi_100 dblock bs_border pad10" required="required">
											<option value="" disabled="disabled">Month</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="01">01</option>
											<option value="02">02</option>
											<option value="03">03</option>
											<option value="04">04</option>
											<option value="05">05</option>
											<option value="06">06</option>
											<option value="07">07</option>
											<option value="08">08</option>
											<option value="09">09</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
										</select>
									</div>
								</div>
								<div class="tw_clmn">
									<div class="padrl15">
										<select name="inputYear" id="inputYear" class="default wi_100 dblock bs_border pad10" required="required">
											<option value="" disabled="disabled">Year</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
											<option value="2022">2022</option>
											<option value="2023">2023</option>
											<option value="2024">2024</option>
											<option value="2025">2025</option>
											<option value="2026">2026</option>
											<option value="2027">2027</option>
											<option value="2028">2028</option>
											<option value="2029">2029</option>
											<option value="2030">2030</option>
										</select>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
						
						<div class="on_clmn">
							<div class="padtb15">
								<div class="padrl15">
									<label for="inputSecCode" class="dblock marb10 uppercase bold">Security code</label>
								</div>
								<div class="tw_clmn">
									<div class="padrl15">
										<input type="text" name="inputSecCode" id="inputSecCode" class="wi_100 dblock bs_border pad10" required="required" />
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="container pad15 fsz16">
						<div class="wi_20 fleft tall">&nbsp;</div>
						<div class="wi_60 fleft padt10 talc">
							1 of 2
						</div>
						<div class="wi_20 fright talr">
							<button type="submit" class="dblue_btn">Next</button>
						</div>
						<div class="clear"></div>
					</div>
				</form>
				
				<!-- second form -->
				<form action="" method="post" class="form_2 hide">
					<div class="container">
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputCardName" class="dblock marb10 uppercase bold">Name</label>
								<input type="text" name="inputCardName" id="inputCardName" class="wi_100 dblock bs_border pad10" placeholder="Enter your name" required="required" />
							</div>
						</div>
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputCardEmail" class="dblock marb10 uppercase bold">Email</label>
								<input type="text" name="inputCardEmail" id="inputCardEmail" class="wi_100 dblock bs_border pad10" placeholder="Your receipt will be sent to this email" required="required" />
							</div>
						</div>
						<div class="clear"></div>
						
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputCardAddress" class="dblock marb10 uppercase bold">Address</label>
								<input type="text" name="inputCardAddress" id="inputCardAddress" class="wi_100 dblock bs_border pad10" placeholder="Enter your address" required="required" />
							</div>
						</div>
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputCardZip" class="dblock marb10 uppercase bold">Zip code</label>
								<input type="text" name="inputCardZip" id="inputCardZip" class="wi_100 dblock bs_border pad10" required="required" />
							</div>
						</div>
						<div class="clear"></div>
						
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputCardCity" class="dblock marb10 uppercase bold">City</label>
								<input type="text" name="inputCardCity" id="inputCardCity" class="wi_100 dblock bs_border pad10" required="required" />
							</div>
						</div>
						<div class="tw_clmn">
							<div class="pad15">
								<label for="inputCardCountry" class="dblock marb10 uppercase bold">Country</label>
								<select name="inputCardCountry" id="inputCardCountry" class="default wi_100 dblock bs_border pad10" required="required">
									<option value="" disabled="disabled" data-i18n="title.select_country">Choose your country</option>
									<option value="AF">Afghanistan</option>
									<option value="AL">Albania</option>
									<option value="DZ">Algeria</option>
									<option value="AS">American Samoa</option>
									<option value="AD">Andorra</option>
									<option value="AO">Angola</option>
									<option value="AI">Anguilla</option>
									<option value="AQ">Antarctica</option>
									<option value="AG">Antigua and Barbuda</option>
									<option value="AR">Argentina</option>
									<option value="AM">Armenia</option>
									<option value="AW">Aruba</option>
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="AZ">Azerbaijani Republic</option>
									<option value="BS">Bahamas</option>
									<option value="BH">Bahrain</option>
									<option value="BD">Bangladesh</option>
									<option value="BB">Barbados</option>
									<option value="BY">Belarus</option>
									<option value="BE">Belgium</option>
									<option value="BZ">Belize</option>
									<option value="BJ">Benin</option>
									<option value="BM">Bermuda</option>
									<option value="BT">Bhutan</option>
									<option value="BO">Bolivia</option>
									<option value="BA">Bosnia and Herzegovina</option>
									<option value="BW">Botswana</option>
									<option value="BR">Brazil</option>
									<option value="VG">British Virgin Islands</option>
									<option value="BN">Brunei Darussalam</option>
									<option value="BG">Bulgaria</option>
									<option value="BF">Burkina Faso</option>
									<option value="BI">Burundi</option>
									<option value="MP">CNMI</option>
									<option value="KH">Cambodia</option>
									<option value="CM">Cameroon</option>
									<option value="CA">Canada</option>
									<option value="CV">Cape Verde</option>
									<option value="BQ">Caribbean Netherlands</option>
									<option value="KY">Cayman Islands</option>
									<option value="CF">Central African Republic</option>
									<option value="TD">Chad</option>
									<option value="CL">Chile</option>
									<option value="CN">China</option>
									<option value="CO">Colombia</option>
									<option value="KM">Comoros</option>
									<option value="CG">Congo</option>
									<option value="CK">Cook Islands</option>
									<option value="CR">Costa Rica</option>
									<option value="CI">Cote d'Ivoire</option>
									<option value="HR">Croatia</option>
									<option value="CU">Cuba</option>
									<option value="CY">Cyprus</option>
									<option value="CZ">Czech Republic</option>
									<option value="CD">Democratic Republic of the Congo</option>
									<option value="DK">Denmark</option>
									<option value="DJ">Djibouti</option>
									<option value="DM">Dominica</option>
									<option value="DO">Dominican Republic</option>
									<option value="EC">Ecuador</option>
									<option value="EG">Egypt</option>
									<option value="SV">El Salvador</option>
									<option value="GQ">Equatorial Guinea</option>
									<option value="ER">Eritrea</option>
									<option value="EE">Estonia</option>
									<option value="ET">Ethiopia</option>
									<option value="FK">Falkland Islands</option>
									<option value="FO">Faroe Islands</option>
									<option value="FJ">Fiji</option>
									<option value="FI">Finland</option>
									<option value="FR">France</option>
									<option value="GF">French Guiana</option>
									<option value="PF">French Polynesia</option>
									<option value="GA">Gabonese Republic</option>
									<option value="GM">Gambia</option>
									<option value="GE">Georgia</option>
									<option value="DE">Germany</option>
									<option value="GH">Ghana</option>
									<option value="GI">Gibraltar</option>
									<option value="GR">Greece</option>
									<option value="GL">Greenland</option>
									<option value="GD">Grenada</option>
									<option value="GP">Guadeloupe</option>
									<option value="GU">Guam</option>
									<option value="GT">Guatemala</option>
									<option value="GN">Guinea</option>
									<option value="GW">Guinea-Bissau</option>
									<option value="GY">Guyana</option>
									<option value="HT">Haiti</option>
									<option value="HN">Honduras</option>
									<option value="HK">Hongkong, China</option>
									<option value="HU">Hungary</option>
									<option value="IS">Iceland</option>
									<option value="IN">India</option>
									<option value="ID">Indonesia</option>
									<option value="IR">Iran</option>
									<option value="IQ">Iraq</option>
									<option value="IE">Ireland</option>
									<option value="IL">Israel</option>
									<option value="IT">Italy</option>
									<option value="JM">Jamaica</option>
									<option value="JP">Japan</option>
									<option value="JO">Jordan</option>
									<option value="KZ">Kazakhstan</option>
									<option value="KE">Kenya</option>
									<option value="KI">Kiribati</option>
									<option value="KP">Korea (Democratic People's Republic of)</option>
									<option value="KR">Korea (Republic of)</option>
									<option value="KW">Kuwait</option>
									<option value="KG">Kyrgyzstan</option>
									<option value="LA">Laos</option>
									<option value="LV">Latvia</option>
									<option value="LB">Lebanon</option>
									<option value="LS">Lesotho</option>
									<option value="LR">Liberia</option>
									<option value="LY">Libya</option>
									<option value="LI">Liechtenstein</option>
									<option value="LT">Lithuania</option>
									<option value="LU">Luxembourg</option>
									<option value="MO">Macao, China</option>
									<option value="MK">Macedonia</option>
									<option value="MG">Madagascar</option>
									<option value="MW">Malawi</option>
									<option value="MY">Malaysia</option>
									<option value="MV">Maldives</option>
									<option value="ML">Mali</option>
									<option value="MT">Malta</option>
									<option value="MH">Marshall Islands</option>
									<option value="MQ">Martinique</option>
									<option value="MR">Mauritania</option>
									<option value="MU">Mauritius</option>
									<option value="YT">Mayotte</option>
									<option value="MX">Mexico</option>
									<option value="FM">Micronesia</option>
									<option value="MD">Moldova</option>
									<option value="MC">Monaco</option>
									<option value="MN">Mongolia</option>
									<option value="ME">Montenegro</option>
									<option value="MS">Montserrat</option>
									<option value="MA">Morocco</option>
									<option value="MZ">Mozambique</option>
									<option value="MM">Myanmar</option>
									<option value="NA">Namibia</option>
									<option value="NR">Nauru</option>
									<option value="NP">Nepal</option>
									<option value="NL">Netherlands</option>
									<option value="AN">Netherlands Antilles</option>
									<option value="NC">New Caledonia</option>
									<option value="NZ">New Zealand</option>
									<option value="NI">Nicaragua</option>
									<option value="NE">Niger</option>
									<option value="NG">Nigeria</option>
									<option value="NU">Niue</option>
									<option value="NO">Norway</option>
									<option value="OM">Oman</option>
									<option value="PK">Pakistan</option>
									<option value="PW">Palau</option>
									<option value="PS">Palestine</option>
									<option value="PA">Panama</option>
									<option value="PG">Papua New Guinea</option>
									<option value="PY">Paraguay</option>
									<option value="PE">Peru</option>
									<option value="PH">Philippines</option>
									<option value="PL">Poland</option>
									<option value="PT">Portugal</option>
									<option value="PR">Puerto Rico</option>
									<option value="QA">Qatar</option>
									<option value="RE">Reunion</option>
									<option value="RO">Romania</option>
									<option value="RU">Russia</option>
									<option value="RW">Rwanda</option>
									<option value="SH">Saint Helena</option>
									<option value="KN">Saint Kitts and Nevis</option>
									<option value="LC">Saint Lucia</option>
									<option value="PM">Saint Pierre and Miquelon</option>
									<option value="VC">Saint Vincent and the Grenadines</option>
									<option value="WS">Samoa</option>
									<option value="SM">San Marino</option>
									<option value="ST">Sao Tome and Principe</option>
									<option value="SA">Saudi Arabia</option>
									<option value="SN">Senegal</option>
									<option value="RS">Serbia</option>
									<option value="SC">Seychelles</option>
									<option value="SL">Sierra Leone</option>
									<option value="SG">Singapore</option>
									<option value="SX">Sint Marteen</option>
									<option value="SK">Slovakia</option>
									<option value="SI">Slovenia</option>
									<option value="SB">Solomon Islands</option>
									<option value="SO">Somalia</option>
									<option value="ZA">South Africa</option>
									<option value="SS">South Sudan</option>
									<option value="ES">Spain</option>
									<option value="LK">Sri Lanka</option>
									<option value="SD">Sudan</option>
									<option value="SR">Suriname</option>
									<option value="SZ">Swaziland</option>
									<option value="SE">Sweden</option>
									<option value="CH">Switzerland</option>
									<option value="SY">Syria</option>
									<option value="TW">Taiwan</option>
									<option value="TJ">Tajikistan</option>
									<option value="TZ">Tanzania</option>
									<option value="TH">Thailand</option>
									<option value="TL">Timor-Leste</option>
									<option value="TG">Togo</option>
									<option value="TK">Tokelau</option>
									<option value="TO">Tonga</option>
									<option value="TT">Trinidad and Tobago</option>
									<option value="TN">Tunisia</option>
									<option value="TR">Turkey</option>
									<option value="TM">Turkmenistan</option>
									<option value="TC">Turks &amp; Caicos</option>
									<option value="TV">Tuvalu</option>
									<option value="AE">UAE</option>
									<option value="VI">US Virgin Islands</option>
									<option value="UG">Uganda</option>
									<option value="UA">Ukraine</option>
									<option value="GB">United Kingdom</option>
									<option value="US">United States</option>
									<option value="UY">Uruguay</option>
									<option value="UZ">Uzbekistan</option>
									<option value="VU">Vanuatu</option>
									<option value="VA">Vatican</option>
									<option value="VE">Venezuela</option>
									<option value="VN">Vietnam</option>
									<option value="WF">Wallis and Futuna</option>
									<option value="YE">Yemen</option>
									<option value="ZM">Zambia</option>
									<option value="ZW">Zimbabwe</option>
								</select>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="container pad15 fsz16">
						<div class="wi_20 fleft tall">
							<a href="#" class="back_btn lgtgrey_btn">Back</a>
						</div>
						<div class="wi_60 fleft padt10 talc">
							2 of 2
						</div>
						<div class="wi_20 fright talr">
							<button type="submit" class="dblue_btn">Confirm</button>
						</div>
						<div class="clear"></div>
					</div>
				</form>
			</div>
		</div>
		
		!-- Vex styles -->
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
	</body>
</html>