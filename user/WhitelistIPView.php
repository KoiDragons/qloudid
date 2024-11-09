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
								window.location.href="https://www.safeqloud.com/user/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>";
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
								window.location.href="https://www.safeqloud.com/user/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>";
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
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20 brdrad1000 yellow_bg_a yellownew_bg white_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
													" id="aa_1227620">R</div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span>Receptionist Portal</span>  </div>
													</a></div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
									
									
									<ul class="marr20 pad0">
										<li class=" dblock padb10 padl8 hidden">
											<a href="../../ConsentPlatformBusiness/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Samtyckesplattform</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 hidden">
											<a href="https://www.safeqloud.com/user/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Företagsuppgifter</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 hidden">
											<a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Kontor</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 hidden">
											<a href="https://www.safeqloud.com/user/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Delade uppgifter</span><span class="counter_position"><?php echo $customerRequestReceivedCount; ?></span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 ">
											<a href="https://www.safeqloud.com/user/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
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
										<li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Hantera</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Besökare </span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10 ">
													<a href="https://www.safeqloud.com/company/index.php/BudandLeverans/packageInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Bud & Leverans</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/Parkering/parkingInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Parkering</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/ForloratOchUpphittat/forloratInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Förlorat & upphittat</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/MeetingRoom/roomSpaceDetail/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn"> Meeting rooms </span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										
										<li class=" dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Till reception</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/OmInkop/inkopAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Inköp</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
											
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/OmAutostaffer/stafferAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Bemanna</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										<!-- Newsfeed -->
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a hidden">
											<h4 class="padb5 uppercase ff-sans black_txt trn">APPAR</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Verifiera ID</span><span class="counter_position"><?php echo $verifyIDReceivedCount; ?></span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Besökare</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/Apps/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">API</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/CompanyUpdates/updateInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Updates</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/WhitelistIP/statistics/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Statistics</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/ManagePermissions/manageAdmin/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Company Admins</span><span class="counter_position"><?php echo $adminRequestReceivedCount; ?></span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/CompanyDevApps/appsAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Company Dev Apps</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10 ">
													<a href="https://www.safeqloud.com/company/index.php/DeliveryPickup/pickupInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Delivery Pickup</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/Receptionist/workInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Receptionist</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/CompanyPartner/partnerInfo/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Partner</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/LostandFound/itemInfo/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Lost and found</span>
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
							
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class="white_bg tall">
									
									
									
									
									<!-- Logo -->
									<h1 class="fsz25 bold">Besökssystemet</h1>
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Här kan du hantera alla bokade och oväntade besökare </a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
									<div class="hidden-xs hidden-sm padrl10">
									<a href="https://www.safeqloud.com/user/index.php/WhitelistIP/visitorsInformation/<?php echo $data['cid']; ?>" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt " >
										
										<span class="valm"> Registrera </span>
									</a> <a href="../ipSetting/<?php echo $data['cid']; ?>"><span class="fas fa-cog fsz22 padl10 lgn_hight_29 valm"></span></a>
								</div>
								
								
							</div>
							
							
							<div class="column_m container tab-header  talc dark_grey_txt mart5">
								<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone lgtgrey_bg">
									<li>
										<a href="#" class="dblock brdradt5 active" data-id="tab_total">
											<span class="count black_txt"><?php echo $visitorsCount['num']+$visitorsCountRegularArrived['num']; ?></span>
											<span class="black_txt trn fsz16" >Besöksdatum</span>
										</a>
									</li>
									
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_total1">
											<span class="count black_txt"><?php echo $visitorsCountRegular['num']; ?></span>
											<span class="black_txt trn fsz16">Besökstid</span>
										</a>
									</li>
									
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_total3">
											<span class="count black_txt"><?php echo $visitorsLeftCount['num']+$visitorsCountRegularLamnat['num']; ?></span>
											<span class="black_txt trn fsz16">Lämnade </span>
										</a>
									</li>
									<div class="clear"></div>
								</ul>
								
								<select class="tab-header xs-wi_100 maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb_new xs-fsz30 pblue2_bg">
									<option value="tab_total" selected class="xs-fsz20"><?php echo $visitorsCount['num']; ?></option>
									<option value="tab_total1"  class="xs-fsz20">Besökstid</option>
									
									<option value="tab_total3"  class="xs-fsz20">Lämnade</option>
								</select>
								<div class="clear"></div>
							</div>
							
							<div class="column_m container   fsz14 dark_grey_txt">
								<div class="tab-content padb25 padt5" id="tab_total3">
									
									
									
									<table class="wi_100 " cellpadding="0" cellspacing="0" id="mytableleft">
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Namn</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Efternamn</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Typ</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Enter Date</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Enter Time</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Left Time</div>
												</th>
											</tr>
											
										</thead>
										<tbody >
											<?php $i=0;
												
												foreach($visitorsLeftDetail as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['name']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['last_name']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['booked']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('h:i:s',strtotime($value['created_on'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('h:i:s',strtotime($value['left_office_at'])); ?></div>
													</td>
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									
									<table class="wi_100 padtb20" cellpadding="0" cellspacing="0" >
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Namn</div>
												</th>
												
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Datum</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Tid</div>
												</th>
												
												
												
											</tr>
											
										</thead>
										<tbody id="regularVisitorLamnat">
											<?php $i=0;
												
												foreach($visitorsDetailRegularLamnat as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#"><?php echo $value['full_name']; ?></a></div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('Y-m-d',strtotime($value['visiting_date'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('h:i',strtotime($value['visiting_time'])); ?></div>
													</td>
													
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									
									<div class="padt20 talc">
										<a href="#" class="load_more_results  marrl5" value="1" onclick="add_more_my_lamnat(this);">Visa fler</a>
										
									</div>
									<script>
										function add_more_my_lamnat(link) {
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
												url:"../moreRegularVisitorsLamnat/<?php echo $data['cid']; ?>",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#regularVisitorLamnat"),
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
								
								<div class="tab-content padb25 padt5 " id="tab_total1" >
									
									
									
									<table class="wi_100 padb20" cellpadding="0" cellspacing="0" >
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Namn</div>
												</th>
												
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Datum</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Tid</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Status</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<a href="../visitorsInformation/<?php echo $data['cid']; ?>"><div class="padtb5 ">+Lägg till</div></a>
												</th>
											</tr>
											
										</thead>
										<tbody id="regularVisitor">
											<?php $i=0;
												
												foreach($visitorsDetailRegular as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['full_name']; ?></div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('Y-m-d',strtotime($value['visiting_date'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('h:i',strtotime($value['visiting_time'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<a href="../setArrived/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>"><div class="padtb5 ">Anlänt</div></a>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														
													</td>
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									
									<div class="padt20 talc">
										<a href="#" class="load_more_results  marrl5" value="1" onclick="add_more_my(this);">Visa fler</a>
										
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
												url:"../moreRegularVisitors/<?php echo $data['cid']; ?>",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#regularVisitor"),
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
								
								<div class="tab-content padb25 padt5 active" id="tab_total" style="display:block;">
									
									<table class="wi_100 hidden" cellpadding="0" cellspacing="0" id="mytable">
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Visitor Page</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">IP address</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Edit</div>
												</th>
											</tr>
											
										</thead>
										<tbody id="approvedConnections">
											<?php $i=0;
												
												foreach($requestDetailApprovedConnections as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="../../Company/visitorsIP/<?php echo $data['cid']; ?>">Visit Page</a></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['ip_address']; ?></div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><a href="#" class="show_popup_modal" data-target="#edit_ip" onclick="updatePopup(<?php echo $value['id']; ?>,'<?php echo $value['ip_address']; ?>');">Edit</a></div>
													</td>
													
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									<div class="padtb20 talc hidden">
										<a href="#" class="load_more_results  marrl5 " value="1" onclick="add_more_rows_approved_Connections(this);">Visa fler</a>
										
									</div>
									<label class="fsz16">Oväntade</label>
									<table class="wi_100 padb20" cellpadding="0" cellspacing="0" >
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Namn</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Efternamn</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Typ</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Datum</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Tid</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Status</div>
												</th>
											</tr>
											
										</thead>
										<tbody >
											<?php $i=0;
												
												foreach($visitorsDetail as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['name']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['last_name']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['booked']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('h:i:s',strtotime($value['created_on'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><a href="../updateVisitors/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>">Lämnat</a></div>
													</td>
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									<label class="fsz16 padt10">Anmälda</label>
									<table class="wi_100 padb20" cellpadding="0" cellspacing="0" >
										<thead class="fsz14" >
											<tr class="lgtgrey2_bg">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt">Namn</div>
												</th>
												
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Datum</div>
												</th>
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Tid</div>
												</th>
												
												<th class="pad5 brdb_new nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Status</div>
												</th>
											</tr>
											
										</thead>
										<tbody id="regularVisitorArrived">
											<?php $i=0;
												
												foreach($visitorsDetailRegularArrived as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
													
													
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['full_name']; ?></div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('Y-m-d',strtotime($value['visiting_date'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo date('h:i',strtotime($value['visiting_time'])); ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<a href="../setLamnat/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>"><div class="padtb5 ">Lämnat</div></a>
													</td>
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
									
									<div class="padt20 talc">
										<a href="#" class="load_more_results  marrl5" value="1" onclick="add_more_my_arrived(this);">Visa fler</a>
										
									</div>
									<script>
										function add_more_my_arrived(link) {
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
												url:"../moreRegularVisitorsArrived/<?php echo $data['cid']; ?>",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#regularVisitorArrived"),
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
									
									
									<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new hidden">
										<div class="white_bg tall">
											
											
											
											
											<!-- Logo -->
											<h1 class="fsz25 bold">Bemannad</h1>
											<!-- Logo -->
											<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Här kan du lista vem som sk bemanna receptionen.  </a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
												<!-- Meta -->
												
											</a></div>
											
											
									</div>
									<table class="wi_100 padtb20 hidden" cellpadding="0" cellspacing="0" >
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
								<script>
									function add_more_rows_approved_Connections(link) {
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										//send_data.message=id;
										$.ajax({
											type:"POST",
											url:"../moreRequestDetailApprovedConnections/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#approvedConnections"),
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
					<a href="https://www.safeqloud.com/user/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
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
					<a href="https://www.safeqloud.com/user/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Store it</span>
					</a>
					<a href="https://www.safeqloud.com/user/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
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
						<a href="https://www.safeqloud.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
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