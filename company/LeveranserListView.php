<!doctype html>


<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		
		
		
		<script>
		
		function checkFlag()
	{
		if($(".popupShow").hasClass('active'))
		{
			$(".popupShow").removeClass('active')
			$(".popupShow").attr('style','display:none');
			}
		
		}
	function togglePopup()
	{
		if($(".popupShow").hasClass('active'))
		{
			$(".popupShow").removeClass('active')
			$(".popupShow").attr('style','display:none');
			}
		else
		{
			$(".popupShow").addClass('active')
			$(".popupShow").attr('style','display:block');
			}
		}
function submitFormCom()
{
	
	$("#save_indexingcs").submit();
}

			
			
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
		
		<?php include 'CompanyHeaderClosed.php'; ?>
	<div class="clear"></div>
		
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- SUB-HEADER -->
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="removeActive();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
						
			
					<!-- Center content -->
					<div class="wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0">
						<div class="column_m container zi1 padb5">
								<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								
								
								<div class="white_bg tall">
									
								
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Pick up info.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
								
									
								</div>
							</div>
						
						
						
						<div class="padb20 xxs-padb0 ">
							
							<div class="column_m container">
								<div class="tab-content active" id="tab_user" style="display: block;">	
								<?php $i=0;
													
													foreach($pickupList as $category => $value) 
													{
														
														
													?> 
								<div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_30 xs-wi_100 sm-wi_40 xsip-wi_40  marl15 xs-mar0 padb10 xs-padb15"> <span class="trn" data-trn-key="Item number">Item number</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo html_entity_decode($value['item_number']); ?></span> </div>
													<div class="fleft wi_45 xs-wi_100 sm-wi_50 xsip-wi_50 marl15 xs-mar0 padb10 xs-padb15"> <span class="trn" data-trn-key="Received">Received</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['date_today']; ?></span> </div>
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div>
									
																	
								
													<?php } ?>
																	
																<div id="more_data">
								</div>
								
								<div class="padt20 talc">
									<a href="../approvePickup/<?php echo $data['eid']; ?>" value="1" id="temp" class="load_more_results dblue_btn marrl5">Confirm</a>
									
								</div>
							</div>
							
						</div>
						<div class="clear"></div>
						</div>
					</div>
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>One time</span>
					</a>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Ongoing</span>
					</a>
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtgrey_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="https://www.qloudid.com/user/index.php/ConnectKin/connectAccount" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Next of kin</span>
					</a>
					<a href="https://www.qloudid.com/user/index.php/StoreData/userAccount" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span class="fa fa-file-text-o"></span>
						</div>
						<span>Your data</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Create request
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							You got an invitation
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="https://www.qloudid.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Inform relatives
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
		
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
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