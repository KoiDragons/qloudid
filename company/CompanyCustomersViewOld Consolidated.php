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
	$path1 = "../../html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
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
		function setDisconnect(id)
			{
				var send_data={};
				send_data.uid=id;
				
				$.ajax({
					type:"POST",
					url:"../checkConnection/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==1)
						{
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_disconnect").style.display='block';
							$("#gratis_popup_disconnect").addClass('active');
							$("#uid").val(id);
						}
						else
						{
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_error").style.display='block';
							$("#gratis_popup_error").addClass('active');
						}
						
					}
				});
			}
			
			function setDisconnectSupplier(id)
			{
			
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_disconnect_supplier").style.display='block';
							$("#gratis_popup_disconnect_supplier").addClass('active');
							$("#uids").val(id);
						
			}
			
			
			function closePop (){
				
				$('.yellow_bg').removeClass('yellow_bg');
				
			} 
			function showUserDetailReceived(id,link,aid,rid)
			{
				
				var send_data={};
				send_data.id=id;
				send_data.aid=aid;
				send_data.rid=rid;
				send_data.cid='<?php echo $data['cid']; ?>';
				var $this = $(this);
				$(".yellow_bg").removeClass('yellow_bg');
				$(link).closest('tr').addClass('yellow_bg');
				$.ajax({
					type:"POST",
					url:"../profileInfo",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						document.getElementById("gratis_popup_user_profile").style.display='none';
						$("#gratis_popup_user_profile").removeClass('active');
						$("#search_user_profile").html('');
						document.getElementById("gratis_popup_user_profile").style.display='block';
						$("#gratis_popup_user_profile").addClass('active');
						$("#search_user_profile").append(data1);
					}
				});
				
				
				
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
					
					<!-- Left sidebar -->
					<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt">Business</a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz40 xs-fsz30 sm-fsz30 
														bold"><?php echo substr(html_entity_decode($companyDetail['company_name']),0,6); ?></a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php date_default_timezone_set("Europe/Stockholm");   echo date("D F j, Y"); ?></span>  </div>
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
										<li class=" dblock padb10 padl8">
											<a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Företagsuppgifter</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 ">
											<a href="https://www.safeqloud.com/company/index.php/CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Kontor</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 ">
											<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Delade uppgifter</span> <span class="counter_position"><?php echo $requestCount['num']+$pendingCountCustomer['num']+$pendingCountStudent['num']+$pendingCountTenant['num']; ?></span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 ">
											<a href="https://www.safeqloud.com/company/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
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
										<!-- Newsfeed -->
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">APPAR</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Verifiera ID</span><span class="counter_position"><?php echo $verifyIDReceivedCount; ?></span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Besökare</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/Parkering/parkingInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Parkering</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/Apps/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">API</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/CompanyUpdates/updateInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Historik</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/WhitelistIP/statistics/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Statistics</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/company/index.php/ManagePermissions/manageAdmin/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Company Admins </span> <span class="counter_position"><?php echo $adminRequestReceivedCount; ?></span>
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
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  padl20 xs-padl0 brdr_new ">
						
						<!--<div class="wrap maxwi_100 pos_rel zi10 xs-padrl0">
							<div class=" bs_bb padb15 black_txt">
							
							<h1 class="edit-text jain padb5 tall fsz50 black_txt xs-fsz35 uppercase" id="dFJHdit4c3R6VlhXelY0bXdXTUtxUT09">Manage requests</h1>
							<p class="pad0 tall fsz20 xs-fsz16">Please store your data here</p>
							</div>
						</div>-->
						<div class="padb20 xxs-padb0 ">
							<div class=" container zi1 padb5">
								<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
									<div class="white_bg tall">
										
										
										
										
										<!-- Logo -->
										<h1 class="fsz25 bold">Löpande samtycken</h1>
										<!-- Logo -->
										<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Alla profiler som har godkänt att dela sin data med ert bolag.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
											<!-- Meta -->
											
										</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
									</a>
									
									
								</div>
							</div>
							<div class="container tab-header  talc dark_grey_txt ">
								<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone lgtgrey_bg">
									<li>
										<a href="#" class="dblock brdradt5 active " data-id="tab_inprogress">
											<span class="count black_txt"><?php echo $approveCount['num']+$approveCountCustomer['num']+$approveCountStudent['num']+$approveCountTenant['num']; ?></span><span class="black_txt fsz16"> Anslutna </span>
										</a>
									</li>
									
									
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_total">
											<span class="count black_txt"><?php echo $requestCount['num']+$pendingCountCustomer['num']+$pendingCountStudent['num']+$pendingCountTenant['num']; ?></span>
											<span class="black_txt fsz16"> Mottagna </span>
										</a>
									</li>
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_sent">
											<span class="count black_txt "><?php echo $sentRequestCount['num']; ?></span><span class="black_txt fsz16"> Skickade</span>
										</a>
									</li>
									
									<li>
										<a href="#" class="dblock brdradt5 " data-id="tab_offered">
											<span class="count black_txt "><?php echo $rejectCount['num']+$rejectedCountCustomer['num']+$rejectedCountStudent['num']+$rejectedCountTenant['num']; ?></span><span class="black_txt fsz16"> Avböjda</span>
										</a>
									</li>
									
									<div class="clear"></div>
								</ul>
								<select class="tab-header xs-wi_100 maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb_new xs-fsz30 pblue2_bg">
									<option value="tab_inprogress" selected class="xs-fsz20"><?php echo $approveCount['num']+$approveCountCustomer['num']+$approveCountStudent['num']+$approveCountTenant['num']; ?></option>
									
									<option value="tab_total" class="xs-fsz20">Mottagna </option>
									<option value="tab_sent" class="xs-fsz20"> Skickade</option>
									<option value="tab_offered" class="xs-fsz20">Avböjda </option>
									
								</select>
								<div class="clear"></div>
							</div>
							
							<div class="container   fsz14 dark_grey_txt">
								
								<!-- Summary -->
								<div class="tab-content padt5 " id="tab_sent">
									
									<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytablesent">
											
											<thead class="fsz14 lgtgrey_bg" >
												<tr class="">
													<!--<th class="pad5 brdb_new nobold  tall" >
														<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5  nobold  tall xs-wi_100" >
														<div class="padtb5 black_txt">Mina anställda</div>
													</th>
													
													<th class="pad5  nobold   tall " >
														
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold   tall" >
														<div class="padtb5 black_txt"></div>
													</th>
												</tr>
												
											</thead>
											
											<tbody id="pendingSent">
												<?php $i=0;
													
													foreach($sentRequestDetail as $category => $value) 
													{
														
														
													?> 
													
													<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
														
														<td class="pad5 brdb_new tall cn">
															<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
														</td>
														<td class="pad5 brdb_new tall nm hidden-xs ">
															<div class="padtb5 "><?php echo $value['last_name']; ?></div>
														</td>
														<td class="pad5 brdb_new tall cd">
															<div class="padtb5 "><?php echo $value['email']; ?></div>
														</td>
														
														
														<td class="pad5 brdb_new tall ap hidden-xs " >
															<div class="padtb5 black_txt"><a href="#" >Pending</a></div>
														</td>
														
														
													</tr>
												<?php } ?>
											</tbody>
											
										</table>
									</form>
									<div class="padtb20 talc">
										<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows_sent(this);" value="1">Visa fler</a>
										
									</div>
									
									<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytablesentCustomers">
											<thead class="fsz14 lgtgrey_bg">
												<tr class="">
													<!--<th class="pad5 brdb_new nobold  tall" >
														<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt">Mina kunder (Privat)</div>
													</th>
													
													<th class="pad5  nobold  tall " >
														
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
												</tr>
												
											</thead>
											
											
										</table>
									</form>
									<div class="padtb20 talc">
										<a href="#" class="load_more_results  marrl5" >Visa fler</a>
										
									</div>
									
									
									<script>
										function add_more_rows_sent(link) {
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"../moreSentRequestDetail/<?php echo $data['cid']; ?>",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#pendingSent"),
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
								
								<div class="tab-content  padt5" id="tab_total">
									
									<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
											
											<thead class="fsz14 lgtgrey_bg">
												<tr class="">
													<!--<th class="pad5 brdb_new nobold  tall" >
														<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt">Mina anställda</div>
													</th>
													
													<th class="pad5  nobold  tall " >
														
													</th>
													<th class="pad5  nobold   tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold   tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
												</tr>
												
											</thead>
											<tbody id="pending">
												<?php $i=0;
													
													foreach($requestDetail as $category => $value) 
													{
														
														
													?> 
													
													<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
														
														<td class="pad5 brdb_new tall cn">
															<div class="padtb5 " ><a href="#" class="show_popup_modal black_txt"  onclick="showUserDetailReceived(<?php echo $value['uid']; ?>,this,'<?php echo $value['enc']; ?>',1);"><?php echo $value['first_name']; ?></a></div>
														</td>
														<td class="pad5 brdb_new tall nm hidden-xs ">
															<div class="padtb5 "><?php echo $value['last_name']; ?></div>
														</td>
														<td class="pad5 brdb_new tall cd">
															<div class="padtb5 "><?php echo $value['email']; ?></div>
														</td>
														
														
														<td class="pad5 brdb_new tall ap hidden-xs " >
															<div class="padtb5 black_txt"><a href="../approveEmployeeRequest/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>" >Godkänn</a></div>
														</td>
														<td class="pad5 brdb_new tall rj hidden-xs ">
															<div class="padtb5 black_txt"><a href="../rejectEmployeeRequest/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>">Avböj</a></div>
														</td>
														
													</tr>
												<?php } ?>
											</tbody>
											
										</table>
									</form>
									<div class="padtb20 talc">
										<a href="javascript:void(0);" class="load_more_results  marrl5 " onclick="add_more_rows(this);" value="1">Visa fler</a>
										
									</div>
									
									<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytableCustomer">
											<thead class="fsz14 lgtgrey_bg">
												<tr class="">
													<!--<th class="pad5 brdb_new nobold  tall" >
														<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt">Mina kunder (Privat)</div>
													</th>
													
													<th class="pad5  nobold  tall " >
														
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
												</tr>
												
											</thead>
											<tbody id="pendingCustomer">
												<?php $i=0;
													
													foreach($requestDetailCustomer as $category => $value) 
													{
														
														
													?> 
													
													<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
														
														<td class="pad5 brdb_new tall cn">
															<div class="padtb5 " ><a href="#" class="show_popup_modal black_txt"  onclick="showUserDetailReceived(<?php echo $value['uid']; ?>,this,'<?php echo $value['enc']; ?>',2);"><?php echo $value['first_name']; ?></a></div>
														</td>
														<td class="pad5 brdb_new tall nm">
															<div class="padtb5 "><?php echo $value['last_name']; ?></div>
														</td>
														<td class="pad5 brdb_new tall cd">
															<div class="padtb5 "><?php echo $value['email']; ?></div>
														</td>
														
														
														<td class="pad5 brdb_new tall hidden-xs  ap" >
															<div class="padtb5 black_txt"><a href="../approveRequestCustomer/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>" >Godkänn</a></div>
														</td>
														<td class="pad5 brdb_new tall hidden-xs  rj">
															<div class="padtb5 black_txt"><a href="../rejectRequestCustomer/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>">Avböj</a></div>
														</td>
														
													</tr>
												<?php } ?>
											</tbody>
											
										</table>
									</form>
									<div class="padtb20 talc">
										<a href="javascript:void(0);" class="load_more_results  marrl5 " onclick="add_more_rows_customer(this);" value="1">Visa fler</a>
										
									</div>
									
									<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytableStudent">
											<thead class="fsz14 lgtgrey_bg">
												<tr class="">
													<!--<th class="pad5 brdb_new nobold  tall" >
														<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt">Mina elever</div>
													</th>
													
													<th class="pad5  nobold  tall" >
														
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
												</tr>
												
											</thead>
											<tbody id="pendingStudent">
												<?php $i=0;
													
													foreach($requestDetailStudent as $category => $value) 
													{
														
														
													?> 
													
													<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
														
														<td class="pad5 brdb_new tall cn">
															<div class="padtb5 " ><a href="#" class="show_popup_modal black_txt"  onclick="showUserDetailReceived(<?php echo $value['uid']; ?>,this,'<?php echo $value['enc']; ?>',3);"><?php echo $value['first_name']; ?></a></div>
														</td>
														<td class="pad5 brdb_new tall nm">
															<div class="padtb5 "><?php echo $value['last_name']; ?></div>
														</td>
														<td class="pad5 brdb_new tall cd">
															<div class="padtb5 "><?php echo $value['email']; ?></div>
														</td>
														
														
														<td class="pad5 brdb_new tall hidden-xs  ap" >
															<div class="padtb5 black_txt"><a href="../approveRequestStudent/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>" >Godkänn</a></div>
														</td>
														<td class="pad5 brdb_new tall hidden-xs  rj">
															<div class="padtb5 black_txt"><a href="../rejectRequestStudent/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>">Avböj</a></div>
														</td>
														
													</tr>
												<?php } ?>
											</tbody>
											
										</table>
									</form>
									<div class="padtb20 talc">
										<a href="javascript:void(0);" class="load_more_results  marrl5 " onclick="add_more_rows_student(this);" value="1">Visa fler</a>
										
									</div>
									
									
									<form>
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytableTenant">
											<thead class="fsz14 lgtgrey_bg">
												<tr class="">
													<!--<th class="pad5 brdb_new nobold  tall" >
														<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt">Mina hyresgäster (Privat)</div>
													</th>
													
													<th class="pad5  nobold  tall" >
														
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
												</tr>
												
											</thead>
											<tbody id="pendingTenant">
												<?php $i=0;
													
													foreach($requestDetailTenant as $category => $value) 
													{
														
														
													?> 
													
													<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
														
														<td class="pad5 brdb_new tall cn">
															<div class="padtb5 " ><a href="#" class="show_popup_modal black_txt"  onclick="showUserDetailReceived(<?php echo $value['uid']; ?>,this,'<?php echo $value['enc']; ?>',4);"><?php echo $value['first_name']; ?></a></div>
														</td>
														<td class="pad5 brdb_new tall nm">
															<div class="padtb5 "><?php echo $value['last_name']; ?></div>
														</td>
														<td class="pad5 brdb_new tall cd">
															<div class="padtb5 "><?php echo $value['email']; ?></div>
														</td>
														
														
														<td class="pad5 brdb_new tall hidden-xs  ap" >
															<div class="padtb5 black_txt"><a href="../approveRequestTenant/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>" >Godkänn</a></div>
														</td>
														<td class="pad5 brdb_new tall hidden-xs  rj">
															<div class="padtb5 black_txt"><a href="../rejectRequestTenant/<?php echo $value['enc']; ?>/<?php echo $data['cid']; ?>">Avböj</a></div>
														</td>
														
													</tr>
												<?php } ?>
											</tbody>
											
										</table>
									</form>
									<div class="padtb20 talc">
										<a href="javascript:void(0);" class="load_more_results  marrl5 " onclick="add_more_rows_tenant(this);" value="1">Visa fler</a>
										
									</div>
									
									
									<div class="padtb20 talc">
										<a href="https://www.safeqloud.com/company/index.php/ManageRequest/requestAccount/<?php echo $data['cid']; ?>" class="load_more_results dblue_btn marrl5" >Update</a>
										
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
									
									function add_more_rows_customer(link) {
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										//send_data.message=id;
										$.ajax({
											type:"POST",
											url:"../moreRequestDetailCustomer/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#pendingCustomer"),
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
									
									
									
									function add_more_rows_student(link) {
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										//send_data.message=id;
										$.ajax({
											type:"POST",
											url:"../moreRequestDetailStudent/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#pendingStudent"),
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
									
									function add_more_rows_tenant(link) {
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										//send_data.message=id;
										$.ajax({
											type:"POST",
											url:"../moreRequestDetailTenant/<?php echo $data['cid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#pendingTenant"),
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
								
								<div class="tab-content padt5" id="tab_inprogress">
									<form>
										<!-- inner tab header -->
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytableEmployees">
											
											<thead class="fsz14 lgtgrey_bg">
												<tr class="">
													<!--<th class="pad5 brdb_new nobold  tall" >
														<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt">Mina anställda</div>
													</th>
													
													<th class="pad5  nobold  tall " >
														
													</th>
													<th class="pad5  nobold hidden-xs  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold hidden-xs  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													<th class="pad5  nobold hidden-xs  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
												</tr>
												
											</thead>
											<tbody id="approved">
												<?php $i=0;
													
													foreach($approveDetail as $category => $value) 
													{
														
														
													?> 
													
													<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
														
														<td class="pad5 brdb_new tall cn">
															<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
														</td>
														<td class="pad5 brdb_new tall nm hidden-xs ">
															<div class="padtb5 "><?php echo $value['last_name']; ?></div>
														</td>
														<td class="pad5 brdb_new tall cd">
															<div class="padtb5 "><?php echo $value['email']; ?></div>
														</td>
														<td class="pad5 brdb_new tall cd">
															<div class="padtb5 "><a href="javascript:void();" onclick="setDisconnect('<?php echo $value['uid']; ?>');">Disconnect</a></div>
														</td>
														<td class="pad5 brdb_new talr hidden-xs  cd">
															<a href="https://www.safeqloud.com/company/index.php/ManagePermissions/setPermissions/<?php echo $value['enc']; ?>" class="load_more_results  marrl5">Permission</a>
														</td>
														
														
														
													</tr>
												<?php } ?>
											</tbody>
											
										</table>
									</form>
									<div class="padtb20 talc">
										<a href="javascript:void(0);" class="load_more_results  marrl5 " onclick="add_more_rows_approved(this);" value="1">Visa fler</a>
										
									</div>
									
									<form>
										<!-- inner tab header -->
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytableCustomerReceived">
											<thead class="fsz14 lgtgrey_bg">
												<tr class="">
													<!--<th class="pad5 brdb_new nobold  tall" >
														<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5  nobold  tall" >
														<div class="padtb5 black_txt">Mina kunder (Privat)</div>
													</th>
													
													<th class="pad5  nobold  tall " >
														
													</th>
													<th class="pad5  nobold hidden-xs  tall" >
														<div class="padtb5 black_txt"></div>
													</th>
													
												</tr>
												
											</thead>
											
										</thead>
										<tbody id="approvedCustomer">
											<?php $i=0;
												
												foreach($requestDetailApprovedCustomer as $category => $value) 
												{
													
													
												?> 
												
												<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 "><?php echo $value['last_name']; ?></div>
													</td>
													<td class="pad5 brdb_new tall cd">
														<div class="padtb5 "><?php echo $value['email']; ?></div>
													</td>
													
													
													<td class="pad5 brdb_new tall cd">
															<div class="padtb5 "><a href="javascript:void();" onclick="setDisconnectSupplier('<?php echo $value['uid']; ?>');">Disconnect</a></div>
														</td>
													
													
												</tr>
											<?php } ?>
										</tbody>
										
									</table>
								</form>
								<div class="padtb20 talc">
									<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows_approved_customer(this);" value="1">Visa fler</a>
									
								</div>
								
								
								<form>
									<!-- inner tab header -->
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytableStudentReceived">
										<thead class="fsz14 lgtgrey_bg">
											<tr class="">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5  nobold  tall" >
													<div class="padtb5 black_txt">Mina elever</div>
												</th>
												
												<th class="pad5  nobold  tall " >
													
												</th>
												<th class="pad5  nobold hidden-xs  tall" >
													<div class="padtb5 black_txt"></div>
												</th>
												
											</tr>
											
										</thead>
										
									</thead>
									<tbody id="approvedStudent">
										<?php $i=0;
											
											foreach($requestDetailApprovedStudent as $category => $value) 
											{
												
												
											?> 
											
											<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
												
												<td class="pad5 brdb_new tall cn">
													<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
												</td>
												<td class="pad5 brdb_new tall nm hidden-xs ">
													<div class="padtb5 "><?php echo $value['last_name']; ?></div>
												</td>
												<td class="pad5 brdb_new tall cd">
													<div class="padtb5 "><?php echo $value['email']; ?></div>
												</td>
												
												
												
												
												
											</tr>
										<?php } ?>
									</tbody>
									
								</table>
							</form>
							<div class="padtb20 talc">
								<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows_approved_student(this);" value="1">Visa fler</a>
								
							</div>
							
							<form>
								<!-- inner tab header -->
								<table class="wi_100" cellpadding="0" cellspacing="0" id="mytableCustomerReceived">
									<thead class="fsz14 lgtgrey_bg">
										<tr class="">
											<!--<th class="pad5 brdb_new nobold  tall" >
												<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
											</th>-->
											<th class="pad5  nobold  tall" >
												<div class="padtb5 black_txt">Mina hyresgäster (Privat)</div>
											</th>
											
											<th class="pad5  nobold  tall " >
												
											</th>
											<th class="pad5  nobold hidden-xs  tall" >
												<div class="padtb5 black_txt"></div>
											</th>
											
										</tr>
										
									</thead>
									
								</thead>
								<tbody id="approvedTenant">
									<?php $i=0;
										
										foreach($requestDetailApprovedTenant as $category => $value) 
										{
											
											
										?> 
										
										<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
											
											<td class="pad5 brdb_new tall cn">
												<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
											</td>
											<td class="pad5 brdb_new tall nm hidden-xs ">
												<div class="padtb5 "><?php echo $value['last_name']; ?></div>
											</td>
											<td class="pad5 brdb_new tall cd">
												<div class="padtb5 "><?php echo $value['email']; ?></div>
											</td>
											
											
											
											
											
										</tr>
									<?php } ?>
								</tbody>
								
							</table>
						</form>
						<div class="padtb20 talc">
							<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows_approved_Tenant(this);" value="1">Visa fler</a>
							
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
						
						function add_more_rows_approved_customer(link) {
							var id_val=parseInt($(link).attr('value'))+1;
							var html1="";
							var send_data={};
							send_data.id=parseInt($(link).attr('value'));
							$(link).attr('value',id_val);
							//send_data.message=id;
							$.ajax({
								type:"POST",
								url:"../moreRequestDetailApprovedCustomer/<?php echo $data['cid']; ?>",
								data:send_data,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									html1=data1;
									var $tbody = $("#approvedCustomer"),
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
						
						
						
						function add_more_rows_approved_student(link) {
							var id_val=parseInt($(link).attr('value'))+1;
							var html1="";
							var send_data={};
							send_data.id=parseInt($(link).attr('value'));
							$(link).attr('value',id_val);
							//send_data.message=id;
							$.ajax({
								type:"POST",
								url:"../moreRequestDetailApprovedStudent/<?php echo $data['cid']; ?>",
								data:send_data,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									html1=data1;
									var $tbody = $("#approvedStudent"),
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
						
						
						function add_more_rows_approved_tenant(link) {
							var id_val=parseInt($(link).attr('value'))+1;
							var html1="";
							var send_data={};
							send_data.id=parseInt($(link).attr('value'));
							$(link).attr('value',id_val);
							//send_data.message=id;
							$.ajax({
								type:"POST",
								url:"../moreRequestDetailApprovedTenant/<?php echo $data['cid']; ?>",
								data:send_data,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									html1=data1;
									var $tbody = $("#approvedTenant"),
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
					
					
					
					<div class="tab-content padt5" id="tab_offered">
						
						<form>
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
								
								<thead class="fsz14 lgtgrey_bg">
									<tr class="">
										<!--<th class="pad5 brdb_new nobold  tall" >
											<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
										</th>-->
										<th class="pad5  nobold  tall" >
											<div class="padtb5 black_txt">Mina anställda</div>
										</th>
										
										<th class="pad5  nobold  tall " >
											
										</th>
										<th class="pad5  nobold hidden-xs  tall" >
											<div class="padtb5 black_txt"></div>
										</th>
										<th class="pad5  nobold hidden-xs  tall" >
											<div class="padtb5 black_txt"></div>
										</th>
									</tr>
									
								</thead>
								<tbody id="rejected">
									<?php $i=0;
										
										foreach($rejectDetail as $category => $value) 
										{
											
											
										?> 
										
										<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
											
											<td class="pad5 brdb_new tall cn">
												<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
											</td>
											<td class="pad5 brdb_new tall nm hidden-xs ">
												<div class="padtb5 "><?php echo $value['last_name']; ?></div>
											</td>
											<td class="pad5 brdb_new tall cd">
												<div class="padtb5 "><?php echo $value['email']; ?></div>
											</td>
											
											
											<td class="pad5 brdb_new tall ap hidden-xs " >
												<div class="padtb5 black_txt"><a href="#" >Rejected</a></div>
											</td>
											
											
										</tr>
										
									<?php } ?>
								</tbody>
								
							</table>
						</form>
						<div class="padtb20 talc">
							<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows_rejected(this);" value="1">Visa fler</a>
							
						</div>
						<table class="wi_100" cellpadding="0" cellspacing="0">
							<thead class="fsz14 lgtgrey_bg">
								<tr class="">
									<!--<th class="pad5 brdb_new nobold  tall" >
										<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
									</th>-->
									<th class="pad5  nobold  tall" >
										<div class="padtb5 black_txt">Mina kunder (Privat)</div>
									</th>
									
									<th class="pad5  nobold  tall" >
										
									</th>
									<th class="pad5  nobold  tall" >
										<div class="padtb5 black_txt"></div>
									</th>
									<th class="pad5  nobold  tall" >
										<div class="padtb5 black_txt"></div>
									</th>
								</tr>
								
							</thead>
							<tbody id="rejectedCustomer">
								<?php $i=0;
									
									foreach($requestDetailRejectedCustomer as $category => $value) 
									{
										
										
									?> 
									
									<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
										</td>
										<td class="pad5 brdb_new tall nm hidden-xs ">
											<div class="padtb5 "><?php echo $value['last_name']; ?></div>
										</td>
										<td class="pad5 brdb_new tall cd">
											<div class="padtb5 "><?php echo $value['email']; ?></div>
										</td>
										
										
										<td class="pad5 brdb_new tall ap hidden-xs " >
											<div class="padtb5 black_txt"><a href="#" >Rejected</a></div>
										</td>
										
										
									</tr>
									
								<?php } ?>
							</tbody>
							
						</table>
					</form>
					<div class="padtb20 talc">
						<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows_rejected_customers(this);" value="1">Visa fler</a>
						
					</div>
					
					
					<table class="wi_100" cellpadding="0" cellspacing="0">
						<thead class="fsz14 lgtgrey_bg">
							<tr class="">
								<!--<th class="pad5 brdb_new nobold  tall" >
									<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
								</th>-->
								<th class="pad5  nobold  tall" >
									<div class="padtb5 black_txt">Mina elever</div>
								</th>
								
								<th class="pad5  nobold  tall" >
									
								</th>
								<th class="pad5  nobold  tall" >
									<div class="padtb5 black_txt"></div>
								</th>
								<th class="pad5  nobold  tall" >
									<div class="padtb5 black_txt"></div>
								</th>
							</tr>
							
						</thead>
						<tbody id="rejectedStudent">
							<?php $i=0;
								
								foreach($requestDetailRejectedStudent as $category => $value) 
								{
									
									
								?> 
								
								<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
									
									<td class="pad5 brdb_new tall cn">
										<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
									</td>
									<td class="pad5 brdb_new tall nm hidden-xs ">
										<div class="padtb5 "><?php echo $value['last_name']; ?></div>
									</td>
									<td class="pad5 brdb_new tall cd">
										<div class="padtb5 "><?php echo $value['email']; ?></div>
									</td>
									
									
									<td class="pad5 brdb_new tall ap hidden-xs " >
										<div class="padtb5 black_txt"><a href="#" >Rejected</a></div>
									</td>
									
									
								</tr>
								
							<?php } ?>
						</tbody>
						
					</table>
				</form>
				<div class="padtb20 talc">
					<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows_rejected_students(this);" value="1">Visa fler</a>
					
				</div>
				
				
				<table class="wi_100" cellpadding="0" cellspacing="0">
					<thead class="fsz14 lgtgrey_bg">
						<tr class="">
							<!--<th class="pad5 brdb_new nobold  tall" >
								<div class="padtb5 black_txt"><input type="checkbox" name="check_all" class="check_all" /></div>
							</th>-->
							<th class="pad5  nobold  tall" >
								<div class="padtb5 black_txt">Mina hyresgäster (Privat)</div>
							</th>
							
							<th class="pad5  nobold  tall" >
								
							</th>
							<th class="pad5  nobold  tall" >
								<div class="padtb5 black_txt"></div>
							</th>
							<th class="pad5  nobold  tall" >
								<div class="padtb5 black_txt"></div>
							</th>
						</tr>
						
					</thead>
					<tbody id="rejectedTenant">
						<?php $i=0;
							
							foreach($requestDetailRejectedTenant as $category => $value) 
							{
								
								
							?> 
							
							<tr id="<?php echo $i; ?>" class="fsz16 xs-fsz16">
								
								<td class="pad5 brdb_new tall cn">
									<div class="padtb5 " ><?php echo $value['first_name']; ?></div>
								</td>
								<td class="pad5 brdb_new tall nm hidden-xs ">
									<div class="padtb5 "><?php echo $value['last_name']; ?></div>
								</td>
								<td class="pad5 brdb_new tall cd">
									<div class="padtb5 "><?php echo $value['email']; ?></div>
								</td>
								
								
								<td class="pad5 brdb_new tall ap hidden-xs " >
									<div class="padtb5 black_txt"><a href="#" >Rejected</a></div>
								</td>
								
								
							</tr>
							
						<?php } ?>
					</tbody>
					
				</table>
			</form>
			<div class="padtb20 talc">
				<a href="javascript:void(0);" class="load_more_results  marrl5" onclick="add_more_rows_rejected_tenants(this);" value="1">Visa fler</a>
				
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
			
			function add_more_rows_rejected_customers(link) {
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
					url:"../moreRequestDetailRejectedCustomer/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						html1=data1;
						var $tbody = $("#rejectedCustomer"),
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
			
			function add_more_rows_rejected_students(link) {
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
					url:"../moreRequestDetailRejectedStudent/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						html1=data1;
						var $tbody = $("#rejectedStudent"),
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
			
			function add_more_rows_rejected_tenants(link) {
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
					url:"../moreRequestDetailRejectedTenant/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						html1=data1;
						var $tbody = $("#rejectedTenant"),
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
<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtblue2_bg">
	
	<!-- primary menu -->
	<div class="tab-content active" id="mob-primary-menu" style="display: block;">
		<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
			<a href="https://www.safeqloud.com/company/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
				<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
				<span>One time</span>
			</a>
			<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
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
			<a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
				<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
				<span>Store it</span>
			</a>
			<a href="https://www.safeqloud.com/company/index.php/Brand/brandAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
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


<!-- Edit news popup -->
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
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
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
	<div class="modal-content pad25 brd nobrdb talc">
		<form>
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
			<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
	<div class="modal-content pad25 brd nobrdb talc">
		<form>
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
			<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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

<div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup_company">
	<div class="modal-content pad25 brd">
		<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
			Add Company
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
			
			<div class="marb15 "  >
				<label for="new-organization-name" class="sr-only">Company Name</label>
				<input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Name">
			</div>
			
			<div class="marb15 padt15"  >
				<label for="new-organization-name" class="sr-only">Website</label>
				<input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Website">
			</div>
			
			<div class="marb15 padt15"  >
				<label for="new-organization-name" class="sr-only">Company Email</label>
				<input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Email">
			</div>
			
			<div class="marb15 padt15">
				<label for="new-organization-under" class="txt_0">Industry</label>
				<select name="inds" id= "inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" >
					
					<option value="0">--Select--</option>
					<?php  foreach($resultIndus as $category => $value) 
						{
							$category = htmlspecialchars($category); 
							echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
						}
					?>
				</select>
			</div>
			
			<div class="marb15 padt15">
				<label for="new-organization-under" class="txt_0">Country</label>
				<select name="cntry" id= "cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" >
					
					<option value="0">--Select--</option>
					<?php  foreach($resultContry as $category => $value) 
						{
							$category = htmlspecialchars($category); 
							echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
						}
					?>
				</select>
			</div>
			
			
			<div class="mart30 talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validateAddCompany();" />
				<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
			</div>
		</form>
	</div>
</div>

<div class="popup_modal"  id="gratis_popup_user_profile">
	
	<div id="search_user_profile">
		
		
	</div>
	
	
</div>

<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_error">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
				</div>
				
				
			</div>
			
			<div class="pad15 lgtgrey2_bg">
				
				<div id="search_user">
					<h3 class="pos_rel pad15  bold fsz20 dark_grey_txt">
						You are not authorized to remove/disconnect owner of the company.
						
					</h3>
					
				</div>
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Close" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to disconnect?</span>
				</div>
				
				
			</div>
			
			<form action="../disconnectEmployee/<?php echo $data['cid']; ?>" method="POST">
			
			<input type="hidden" id="uid" name="uid" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect_supplier">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to disconnect?</span>
				</div>
				
				
			</div>
			
			<form action="../disconnectSupplier/<?php echo $data['cid']; ?>" method="POST">
			
			<input type="hidden" id="uids" name="uids" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
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