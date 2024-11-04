<!doctype html>
<?php
	
	$path1 = $path."html/usercontent/images/";
	
?>

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
			var available_yes=0;
			var currentLang = 'sv';
			function submitFormCom()
			{
				$("#errorMsg").html('');
				if($('#message').val()=="" || $('#message').val()==null)
				{
					$("#errorMsg").html('Please enter company name to search');
					return false;
				}
				
				$("#save_indexingcs").submit();
			}

function confirmSubmit(id)
{
	
	$("#location_id").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_confirm").addClass('active')
	$("#gratis_popup_confirm").attr('style','display:block');
	
}
function confirmYes(id)
{
	
	$("#location_id_yes").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_yes").addClass('active')
	$("#gratis_popup_yes").attr('style','display:block');
	
}
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
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
	<?php $path1 = $path."html/usercontent/images/"; ?>
			<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../../HotelStay/roomsTypeList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		 
	<div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
					 
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../../../HotelStay/roomsTypeList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>

		<div class="column_m pos_rel"  >
			
			<!-- SUB-HEADER -->
			
			
			
			<!-- CONTENT -->
			<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn nobold"  >Connect</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc xs-padb15  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn nobold" > Search and connect with your resturant for room service.</a></div>	
							
								 
					 
						<form action="../../../searchResturant/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['sid']; ?>" method="POST" id="save_indexingcs" name="save_indexingcs" accept-charset="ISO-8859-1">
							<div class="dflex alit_s marb15">
								<input type="message" name="message" id="message" class="minhei_65p flex_1 padrl15 lgtgrey_bg nobrd fsz15 ffamily_avenir" placeholder="Resturant name" value="">
								<button type="submit" class="minhei_65p padrl30 forword button_bg_color nobrd fsz14 bold ffamily_avenir">Search</button>
							</div>
							</form>
							 <?php echo $roomServiecRequestSent; ?>
							<div class="mart15" id="t_data">
								
								<?php 
								
								if(isset($_POST['message']))
									{
									echo $resturantListSearch; } ?>
								
							</div>
							
							<div class="clear"></div>
							 
							 <div class="red_txt fsz20 talc" id="errorMsg"> </div>
						 
					</div>
					
				 
				 	
				</div>
</div>
<div class="clear"></div>
</div>
</div>



<div class="clear"></div>
<div class="hei_80p hidden-xs"></div>
 
<!-- Popup fade -->
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

</div>

	
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