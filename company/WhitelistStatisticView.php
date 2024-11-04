<!doctype html>
<?php
	function base64_to_jpeg($base64_string, $output_file) {
		// open the output file for writing
		$ifp = fopen( $output_file, 'wb' ); 
		
		// split the string on commas
		// $data[ 0 ] == "data:image/png;base64"
		// $data[ 1 ] == <actual base64 string>
		$data = explode( ',', $base64_string );
		//print_r($data); die;
		// we could add validation here with ensuring count( $data ) > 1
		fwrite( $ifp, base64_decode( $data[1] ) );
		
		// clean up the file resource
		fclose( $ifp ); 
		
		return $output_file; 
	}
	$path1 = "../../../../html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		
		<script>
			function updateCompany()
			{
				$('#errorMsgCmp').html("");
				
				var ty=$("#type_c");			
				if(ty.val() == 0)
				{
					
					$('#errorMsgCmp').html("Please select any value !!!");
					return false;
					
				}
				if(ty.val() == 1)
				{
					var full_num=$("#addcomp");			
					if(full_num.val() == 0)
					{
						$('#errorMsgCmp').html("Please select company name !!!");
						return false;
					}
				}
				else if(ty.val() == 2)
				{
					var full_num=$("#addMsg");			
					if(full_num.val() == null || full_num.val() == '')
					{
						$('#errorMsgCmp').html("Please Enter offer !!!");
						return false;
					}
				}
				document.getElementById("save_indexing").submit();
				
			}
			function searchIP()
			{
				$("#errorMsg").html('');
				var ip = "^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$";
				var ipadd=$("#ipadd").val();
				
				validIpAddressRegex = "^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$";
				ipCheckFlag = true;
				ipLists = ipadd.split(',');
				for(ip=0; ip<ipLists.length; ip++){
					if(!ipLists[ip].trim().match(validIpAddressRegex)){
						ipCheckFlag = false;
					}
				}
				if(ipCheckFlag==false) 
				{ 
					$("#errorMsg").html('Please enter a valid ip address');
					return false;
				}
				else
				{
					
					var send_data={};
					send_data.id=ipadd;
					
					$.ajax({
						type:"POST",
						url:"../addIp/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							if(data1==0)
							{
								$("#errorMsg").html('Please enter a valid ip address');
								return false;
							}
							else
							{
								window.location.href="https://www.qloudid.com/company/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>";
							}
						}
					});
					
				}
				
			}
			
			function editIP()
			{
				$("#errorMsg").html('');
				var ip = "^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$";
				var ipadd=$("#ipedit").val();
				
				validIpAddressRegex = "^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$";
				ipCheckFlag = true;
				ipLists = ipadd.split(',');
				for(ip=0; ip<ipLists.length; ip++){
					if(!ipLists[ip].trim().match(validIpAddressRegex)){
						ipCheckFlag = false;
					}
				}
				if(ipCheckFlag==false) 
				{ 
					$("#errorMsg1").html('Please enter a valid ip address');
					return false;
				}
				else
				{
					
					var send_data={};
					send_data.ip=ipadd;
					send_data.id=$("#ipid").val();
					$.ajax({
						type:"POST",
						url:"../editIp/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							if(data1==0)
							{
								$("#errorMsg1").html('Please enter a valid ip address');
								return false;
							}
							else
							{
								window.location.href="https://www.qloudid.com/company/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>";
							}
						}
					});
					
				}
				
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
		
		<!-- HEADER -->
		<?php include 'CompanyHeaderUpdated.php'; ?>
		<div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
												<!-- Logo -->
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20 brdrad1000 yellow_bg_a greenyellow_bg black_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
													" id="aa_1227620">P</div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span>Partners Portal</span>  </div>
													</a></div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
									
										<ul class="marr20 pad0">
										
										<li class=" dblock padb10 padl8 ">
											<a href="../../Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 ">
											<a href="../../CompanyPartner/partnerInfo/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Bli partner</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										<li class="dblock pos_rel padb10 brdclr_hgrey hidden">
										
											<ul class="marr20 pad0">
												
												
												
												
												<li class="dblock padrb10">
													<a href="../../CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Meddelande</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												</ul>
											
										</li>
										
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Branschpartner</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="../../Receptionist/workInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Företagskunder</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li> 
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Teknisk Partner</h4>
											<ul class="marr20 pad0">
												
												
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Integration</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li> 
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Utvecklar Partner</h4>
											<ul class="marr20 pad0">
												
												
												<li class="dblock padrb10">
													<a href="../../Apps/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">API</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
													<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Statistic</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
													<li class="dblock padrb10">
													<a href="../../CompanyDevApps/appsAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Company Devs App</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
											</ul>
											
										</li> 
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				
					<!-- Center content -->
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">
						
						
						
						
						
						
						<div class="padb20 xxs-padb0 ">
							
							
							
							
							<div class="column_m container tab-header  talc dark_grey_txt mart5">
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
										<div class="white_bg tall">
											
											
											
											
											<!-- Logo -->
											<h1 class="fsz25 bold">Bemannad</h1>
											<!-- Logo -->
											<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Här kan du lista vem som sk bemanna receptionen.  </a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
												<!-- Meta -->
												
											</a></div>
											
											
									</div>
									<div class="column_m marrl0 mart5 brd brdrad3 ">
									<div class="dflex fxwrap_w alit_s marrl-10">
								
										<!-- Line chart -->
										<div class="wi_50-20p xs-wi_100-20p marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel">
												<div class="dflex justc_sb alit_fe">
													<div>
														<h4 class="pad0 bold fsz26">54%</h4>
														<span class="fsz10">2.341 new customers</span>
													</div>
													<div class="tall fsz12 lgtgrey4_txt">
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 blue_bg"></span>
															<span class="valm">Upcoming</span>
														</div>
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 pur_ba03d9_bg"></span>
															<span class="valm">Incoming</span>
														</div>
													</div>
												</div>
												<div id="line-chart-Inhouse"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 319px; height: 200px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="319" height="200" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_0"><clipPath id="_ABSTRACT_RENDERER_ID_1"><rect x="0" y="20" width="319" height="160"></rect></clipPath></defs><rect x="0" y="0" width="319" height="200" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="0" y="20" width="319" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g clip-path="url(https://www.qmatchup.com/beta/company/index.php/InvitedEmployee/employeeAccount/WUdvcFBZQ08zUjNySjkrc1MzWEpvUT09#_ABSTRACT_RENDERER_ID_1)"><g><rect x="0" y="179" width="319" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="0" y="100" width="319" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="0" y="20" width="319" height="1" stroke="none" stroke-width="0" fill="#cccccc"></rect><rect x="0" y="139" width="319" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect><rect x="0" y="60" width="319" height="1" stroke="none" stroke-width="0" fill="#ebebeb"></rect></g><g><rect x="0" y="179" width="319" height="1" stroke="none" stroke-width="0" fill="#333333"></rect></g><g><path d="M23.214285714285715,100C23.214285714285715,100,53.50000000000001,108.61249999999735,68.64285714285714,107.95C83.78571428571429,107.28750000000264,98.92857142857144,99.3375000000265,114.07142857142858,96.02499999999999C129.21428571428572,92.7124999999735,144.35714285714286,88.7374999999735,159.5,88.07499999999999C174.64285714285717,87.4125000000265,189.78571428571428,91.65249999999999,204.92857142857144,92.05C220.07142857142856,92.44749999999999,235.21428571428575,102.38499999999999,250.35714285714286,90.46C265.5,78.535,295.7857142857143,20.5,295.7857142857143,20.5" stroke="#3691c0" stroke-width="2" fill-opacity="1" fill="none"></path><path d="M23.214285714285715,131.8C23.214285714285715,131.8,53.50000000000001,130.47499999999735,68.64285714285714,131.8C83.78571428571429,133.12500000000264,98.92857142857144,137.7625,114.07142857142858,139.75C129.21428571428572,141.7375,144.35714285714286,143.725,159.5,143.725C174.64285714285717,143.725,189.78571428571428,140.67750000000265,204.92857142857144,139.75C220.07142857142856,138.82249999999735,235.21428571428575,137.89500000000265,250.35714285714286,138.16C265.5,138.42499999999734,295.7857142857143,141.34,295.7857142857143,141.34" stroke="#ba03d9" stroke-width="2" fill-opacity="1" fill="none"></path></g></g><g><circle cx="23.214285714285715" cy="100" r="3.5" stroke="none" stroke-width="0" fill="#3691c0"></circle><circle cx="68.64285714285714" cy="107.95" r="3.5" stroke="none" stroke-width="0" fill="#3691c0"></circle><circle cx="114.07142857142858" cy="96.02499999999999" r="3.5" stroke="none" stroke-width="0" fill="#3691c0"></circle><circle cx="159.5" cy="88.07499999999999" r="3.5" stroke="none" stroke-width="0" fill="#3691c0"></circle><circle cx="204.92857142857144" cy="92.05" r="3.5" stroke="none" stroke-width="0" fill="#3691c0"></circle><circle cx="250.35714285714286" cy="90.46" r="3.5" stroke="none" stroke-width="0" fill="#3691c0"></circle><circle cx="295.7857142857143" cy="20.5" r="3.5" stroke="none" stroke-width="0" fill="#3691c0"></circle><circle cx="23.214285714285715" cy="131.8" r="3.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle><circle cx="68.64285714285714" cy="131.8" r="3.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle><circle cx="114.07142857142858" cy="139.75" r="3.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle><circle cx="159.5" cy="143.725" r="3.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle><circle cx="204.92857142857144" cy="139.75" r="3.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle><circle cx="250.35714285714286" cy="138.16" r="3.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle><circle cx="295.7857142857143" cy="141.34" r="3.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle></g><g><g><text text-anchor="middle" x="23.214285714285715" y="193.5" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#222222">MON</text></g><g><text text-anchor="middle" x="68.64285714285714" y="193.5" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#222222">TUE</text></g><g><text text-anchor="middle" x="114.07142857142858" y="193.5" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#222222">WED</text></g><g><text text-anchor="middle" x="159.5" y="193.5" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#222222">THU</text></g><g><text text-anchor="middle" x="204.92857142857144" y="193.5" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#222222">FRI</text></g><g><text text-anchor="middle" x="250.35714285714286" y="193.5" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#222222">SAT</text></g><g><text text-anchor="middle" x="295.7857142857143" y="193.5" font-family="Arial" font-size="10" stroke="none" stroke-width="0" fill="#222222">SUN</text></g></g></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Day</th><th>Upcoming</th><th>Incoming</th></tr></thead><tbody><tr><td>MON</td><td>100</td><td>60</td></tr><tr><td>TUE</td><td>90</td><td>60</td></tr><tr><td>WED</td><td>105</td><td>50</td></tr><tr><td>THU</td><td>115</td><td>45</td></tr><tr><td>FRI</td><td>110</td><td>50</td></tr><tr><td>SAT</td><td>112</td><td>52</td></tr><tr><td>SUN</td><td>200</td><td>48</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 210px; left: 329px; white-space: nowrap; font-family: Arial; font-size: 10px;">...</div><div></div></div></div>
											</div>
										</div>
								
										<!-- Donut chart -->
										<div class="wi_50-20p xs-wi_100-20p ovfl_hid marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel padt10">
												<div class="dflex tab-header padrl10">
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a active" data-id="tab-yearly-Inhouse">Yearly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-monthly-Inhouse">Monthly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-daily-Inhouse">Daily</a>
												</div>
												<div id="tab-yearly-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg active" style="display: block;">
													<div class="pos_rel marrl10">
														<div id="donut-chart-yearly-Inhouse" class="pos_rel zi1"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 299px; height: 200px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="299" height="200" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_2"></defs><rect x="0" y="0" width="299" height="200" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="201" y="57" width="98" height="76" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g column-id="< 18 y.o."><rect x="201" y="57" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="68.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">&lt; 18 y.o.</text></g><circle cx="207.5" cy="63.5" r="6.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle></g><g column-id="other"><rect x="201" y="78" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="89.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">other</text></g><circle cx="207.5" cy="84.5" r="6.5" stroke="none" stroke-width="0" fill="#f7f7f7"></circle></g><g column-id="23-30 y.o."><rect x="201" y="99" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="110.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">23-30 y.o.</text></g><circle cx="207.5" cy="105.5" r="6.5" stroke="none" stroke-width="0" fill="#85db18"></circle></g><g column-id="18-22 y.o."><rect x="201" y="120" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="131.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">18-22 y.o.</text></g><circle cx="207.5" cy="126.5" r="6.5" stroke="none" stroke-width="0" fill="#3691c0"></circle></g></g><g><path d="M33,94.99999999999999L18,94.99999999999999A75,75,0,0,1,147.67264705660588,43.65896705534836L136.73811764528472,53.92717364427869A60,60,0,0,0,33,95.00000000000001" stroke="#ffffff" stroke-width="1" fill="#ba03d9"></path></g><g><path d="M136.73811764528472,53.92717364427869L147.67264705660588,43.65896705534836A75,75,0,0,1,153.67627457812105,139.0838939219355L141.54101966249686,130.2671151375484A60,60,0,0,0,136.73811764528472,53.92717364427869" stroke="#ffffff" stroke-width="1" fill="#f7f7f7"></path></g><g><path d="M54.754560615078596,141.23079456654733L45.19320076884824,152.78849320818418A75,75,0,0,1,18,95.00000000000001L33,95.00000000000001A60,60,0,0,0,54.754560615078596,141.23079456654733" stroke="#ffffff" stroke-width="1" fill="#3691c0"></path></g><g><path d="M141.54101966249686,130.2671151375484L153.67627457812105,139.0838939219355A75,75,0,0,1,45.19320076884824,152.78849320818418L54.754560615078596,141.23079456654733A60,60,0,0,0,141.54101966249686,130.2671151375484" stroke="#ffffff" stroke-width="1" fill="#85db18"></path></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Age range</th><th>Attendance</th></tr></thead><tbody><tr><td>&lt; 18 y.o.</td><td>38</td></tr><tr><td>other</td><td>22</td></tr><tr><td>23-30 y.o.</td><td>26</td></tr><tr><td>18-22 y.o.</td><td>14</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 210px; left: 309px; white-space: nowrap; font-family: Arial; font-size: 13px;">18-22 y.o.</div><div></div></div></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$13.6k</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">54%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">253</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">18</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-monthly-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-monthly-Inhouse" class="pos_rel zi1"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 299px; height: 200px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="299" height="200" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_3"></defs><rect x="0" y="0" width="299" height="200" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="201" y="57" width="98" height="76" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g column-id="< 18 y.o."><rect x="201" y="57" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="68.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">&lt; 18 y.o.</text></g><circle cx="207.5" cy="63.5" r="6.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle></g><g column-id="other"><rect x="201" y="78" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="89.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">other</text></g><circle cx="207.5" cy="84.5" r="6.5" stroke="none" stroke-width="0" fill="#f7f7f7"></circle></g><g column-id="23-30 y.o."><rect x="201" y="99" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="110.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">23-30 y.o.</text></g><circle cx="207.5" cy="105.5" r="6.5" stroke="none" stroke-width="0" fill="#85db18"></circle></g><g column-id="18-22 y.o."><rect x="201" y="120" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="131.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">18-22 y.o.</text></g><circle cx="207.5" cy="126.5" r="6.5" stroke="none" stroke-width="0" fill="#3691c0"></circle></g></g><g><path d="M33,94.99999999999999L18,94.99999999999999A75,75,0,0,1,167.40860259858584,85.60000748267716L152.52688207886865,87.48000598614173A60,60,0,0,0,33,95.00000000000001" stroke="#ffffff" stroke-width="1" fill="#ba03d9"></path></g><g><path d="M152.52688207886865,87.48000598614173L167.40860259858584,85.60000748267716A75,75,0,0,1,153.67627457812105,139.0838939219355L141.54101966249686,130.2671151375484A60,60,0,0,0,152.52688207886865,87.48000598614173" stroke="#ffffff" stroke-width="1" fill="#f7f7f7"></path></g><g><path d="M89.23256882824118,154.8816037056963L88.29071103530148,169.85200463212038A75,75,0,0,1,18,95.00000000000001L33,95.00000000000001A60,60,0,0,0,89.23256882824118,154.8816037056963" stroke="#ffffff" stroke-width="1" fill="#3691c0"></path></g><g><path d="M141.54101966249686,130.2671151375484L153.67627457812105,139.0838939219355A75,75,0,0,1,88.29071103530148,169.85200463212038L89.23256882824118,154.8816037056963A60,60,0,0,0,141.54101966249686,130.2671151375484" stroke="#ffffff" stroke-width="1" fill="#85db18"></path></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Age range</th><th>Attendance</th></tr></thead><tbody><tr><td>&lt; 18 y.o.</td><td>48</td></tr><tr><td>other</td><td>12</td></tr><tr><td>23-30 y.o.</td><td>16</td></tr><tr><td>18-22 y.o.</td><td>24</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 210px; left: 309px; white-space: nowrap; font-family: Arial; font-size: 13px;">18-22 y.o.</div><div></div></div></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$1600</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">34%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">36</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">2</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
												<div id="tab-daily-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-daily-Inhouse" class="pos_rel zi1"><div style="position: relative;"><div dir="ltr" style="position: relative; width: 299px; height: 200px;"><div aria-label="A chart." style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="299" height="200" aria-label="A chart." style="overflow: hidden;"><defs id="_ABSTRACT_RENDERER_ID_4"></defs><rect x="0" y="0" width="299" height="200" stroke="none" stroke-width="0" fill="#ffffff"></rect><g><rect x="201" y="57" width="98" height="76" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g column-id="< 18 y.o."><rect x="201" y="57" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="68.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">&lt; 18 y.o.</text></g><circle cx="207.5" cy="63.5" r="6.5" stroke="none" stroke-width="0" fill="#ba03d9"></circle></g><g column-id="other"><rect x="201" y="78" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="89.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">other</text></g><circle cx="207.5" cy="84.5" r="6.5" stroke="none" stroke-width="0" fill="#f7f7f7"></circle></g><g column-id="23-30 y.o."><rect x="201" y="99" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="110.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">23-30 y.o.</text></g><circle cx="207.5" cy="105.5" r="6.5" stroke="none" stroke-width="0" fill="#85db18"></circle></g><g column-id="18-22 y.o."><rect x="201" y="120" width="98" height="13" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect><g><text text-anchor="start" x="219" y="131.05" font-family="Arial" font-size="13" stroke="none" stroke-width="0" fill="#c6c8ca">18-22 y.o.</text></g><circle cx="207.5" cy="126.5" r="6.5" stroke="none" stroke-width="0" fill="#3691c0"></circle></g></g><g><path d="M33,94.99999999999999L18,94.99999999999999A75,75,0,1,1,166.67154380465166,109.05359859392937L151.93723504372133,106.24287887514349A60,60,0,1,0,33,95.00000000000001" stroke="#ffffff" stroke-width="1" fill="#ba03d9"></path></g><g><path d="M151.93723504372133,106.24287887514349L166.67154380465166,109.05359859392937A75,75,0,0,1,120.60934145135082,164.73323644161889L115.08747316108065,150.7865891532951A60,60,0,0,0,151.93723504372133,106.24287887514349" stroke="#ffffff" stroke-width="1" fill="#f7f7f7"></path></g><g><path d="M44.45898033750316,130.2671151375484L32.32372542187895,139.0838939219355A75,75,0,0,1,18,95.00000000000001L33,95.00000000000001A60,60,0,0,0,44.45898033750316,130.2671151375484" stroke="#ffffff" stroke-width="1" fill="#3691c0"></path></g><g><path d="M115.0874731610807,150.78658915329507L120.60934145135087,164.73323644161883A75,75,0,0,1,32.32372542187899,139.08389392193556L44.45898033750319,130.26711513754844A60,60,0,0,0,115.0874731610807,150.78658915329507" stroke="#ffffff" stroke-width="1" fill="#85db18"></path></g><g></g></svg><div aria-label="A tabular representation of the data in the chart." style="position: absolute; left: -10000px; top: auto; width: 1px; height: 1px; overflow: hidden;"><table><thead><tr><th>Age range</th><th>Attendance</th></tr></thead><tbody><tr><td>&lt; 18 y.o.</td><td>53</td></tr><tr><td>other</td><td>16</td></tr><tr><td>23-30 y.o.</td><td>21</td></tr><tr><td>18-22 y.o.</td><td>10</td></tr></tbody></table></div></div></div><div aria-hidden="true" style="display: none; position: absolute; top: 210px; left: 309px; white-space: nowrap; font-family: Arial; font-size: 13px;">18-22 y.o.</div><div></div></div></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$341</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">23%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">10</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">1</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
								
								
											</div>
										</div>
								
									</div>
								</div>
							<div class="column_m container   fsz14 dark_grey_txt">
									<table class="wi_100 padb20 padt5" cellpadding="0" cellspacing="0" >
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Company Name</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Type</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Status</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt"><a href="../messageInfo/<?php echo $data['cid']; ?>" >Lägg till</a></div>
												</th>
											</tr>
											
										</thead>
										<tbody >
											<?php $i=0;
												
												foreach($addedCompany as $category => $value) 
												{
													
													
												?> 
												
												<tr class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['company_name']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php if($value['is_company']==1) { echo "Company"; } else if($value['is_company']==2) { echo "Offer"; } ?></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<a href="../activateInactive/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>/<?php echo  $value['status']; ?>"<div class="padtb5 "><?php if($value['status']==1) { echo "Active"; } else if($value['status']==0) { echo "In-Active"; } ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "></div>
													</td>
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									
									</div>
									<div class="column_m container   fsz14 dark_grey_txt">
									<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class="white_bg tall">
									
									
									
									
									<!-- Logo -->
									<h1 class="fsz25 bold">Statistics</h1>
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Alla profiler som godkänt för att dela sin data med ert bolag i 24 timmar.  </a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
								
								
							</div>
									<table class="wi_100 padb20 padt5" cellpadding="0" cellspacing="0" >
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Company Name</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Type</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Statistic</div>
												</th>
												
											</tr>
											
										</thead>
										<tbody >
											<?php $i=0;
												
												foreach($addedCompany as $category => $value) 
												{
													
													
												?> 
												
												<tr class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['company_name']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php if($value['is_company']==1) { echo "Company"; } else if($value['is_company']==2) { echo "Offer"; } ?></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['exposed_times']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "></div>
													</td>
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									
								</div>	
									
									
									
									
								</div>
								
								
							</div>
							
							<div class="clear"></div>
						</div>
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtblue2_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>One time</span>
					</a>
					<a href="https://www.qloudid.com/company/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Ongoing</span>
					</a>
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtblue2_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="https://www.qloudid.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Store it</span>
					</a>
					<a href="https://www.qloudid.com/company/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span class="fa fa-file-text-o"></span>
						</div>
						<span>Your brand</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Create request
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							You got an invitation
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="https://www.qloudid.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Inform relatives
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
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
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="add_ip">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Verifiera en motpart…</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Be din motpart, privatperson eller företag att legitimera sig innan ett möte eller affär. Välj ur du vill skicka din förfrågan, sms, email eller med Qloud ID kod. </span>
				</div>
				
				
			</div>
			
			
			
			
			<div class="on_clmn padb10">
				
				<div class="pos_rel ">
					
					<input type="text" id="ipadd" name="ipadd" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Add IP">
				</div>
			</div>
			<div id="errorMsg" class="red_txt fsz16"> </div>
			
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchIP();">
				
			</div>
			
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="add_company">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Verifiera en motpart…</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Be din motpart, privatperson eller företag att legitimera sig innan ett möte eller affär. Välj ur du vill skicka din förfrågan, sms, email eller med Qloud ID kod. </span>
				</div>
				
				
			</div>
			
			
			<form action="../addCompanyName/<?php echo $data['cid']; ?>" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
				
				<div class="on_clmn padb10">
					<div class="on_clmn padrl0 padb0 xs-padrl0">
						<select name="type_c" id="type_c"  class="lgtgrey2_bg default_view nobrd wi_100 mart5 padl10 hei_50p fsz18 llgrey_txt" onchange="checkDisplay(this.value);">
							<option value="0">Välj</option>
							<option value="1">Visa ditt företagsnamn</option>
							<option value="2"> Visa ett erbjudande</option>
						</select>
						
					</div>
					
					<div class="clear"></div>
				</div>
				
				
				
				<div id="cmp" style="display:none;">
					<div class="on_clmn padb10">
						
						<div class="pos_rel ">
							
							<select id="addcomp" name="addcomp" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Name">
								<option value="0">select</option>
								<option value="Securitas">Securitas</option>
								<option value="Manpower">Manpower</option>
								<option value="Poolia">Poolia</option>
								<option value="Falck">Falck</option>
								<option value="CWS Boco Inital">CWS Boco Inital</option>
								<option value="Montico HR">Montico HR</option>
								<option value="Volvo">Volvo</option>
								<option value="Vasakronan">Vasakronan</option>
								<option value="Sodexho">Sodexho</option>
								<option value="SEB">SEB</option>
								
							</select>
						</div>
					</div>
				</div>
				
				<div id="msg" style="display:none">
					<div class="on_clmn padb10">
						<div class="on_clmn padrl0 padb0 xs-padrl0">
							<input type="text" name="addMsg" id="addMsg"  class="lgtgrey2_bg default_view nobrd wi_100 mart5 padl10 hei_50p fsz18 llgrey_txt" placeholder="Skriv ditt erbjudande" >
							
							
						</div>
						
						<div class="clear"></div>
					</div>
				</div>
				
				<div id="errorMsgCmp" class="red_txt fsz16"> </div>
				
				<div class="on_clmn mart10 marb20">
					<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="updateCompany();">
					
				</div>
			</form>
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="edit_ip">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Verifiera en motpart…</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Be din motpart, privatperson eller företag att legitimera sig innan ett möte eller affär. Välj ur du vill skicka din förfrågan, sms, email eller med Qloud ID kod. </span>
				</div>
				
				
			</div>
			
			
			
			
			<div class="on_clmn padb10">
				
				<div class="pos_rel ">
					
					<input type="text" id="ipedit" name="ipedit" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Add IP">
				</div>
			</div>
			<div id="errorMsg1" class="red_txt fsz16"> </div>
			
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="editIP();">
				<input type="hidden" id="ipid" name="ipid" />
			</div>
			
			
		</div>
	</div>
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		function updatePopup(id,id1)
		{
			$("#ipid").val(id);
			$("#ipedit").val(id1);
			//$("#popup_fade").addClass('active');
		}
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