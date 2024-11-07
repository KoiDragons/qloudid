<!doctype html>
<html>
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
		
	if($employeeDetail ['passport_image']!=null) { $filename="../estorecss/".$employeeDetail ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$employeeDetail ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; }

	$path1 = $path."html/usercontent/images/";
	?>
		<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="<?php if($employeeDetail['bg_color']=="" || $employeeDetail['bg_color']==null) echo "#f5f5f5"; else echo $employeeDetail['bg_color']; ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101162438);</script>
		<script async src="//static.getclicky.com/js"></script>
		
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
		
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
			
			
			function generateOTP()
			{
				var send_data={};
				$.ajax({
						type:"POST",
						url:"../verifyUserDetail/<?php echo $data['eid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
								
								$("#gratis_popup_confirm").removeClass('active');
								$("#gratis_popup_confirm").attr('style','display:none;');
								$("#gratis_popup_login").addClass('active');
								$("#gratis_popup_login").attr('style','display:block;');
								$("#infor_id").val(data1);
								
							
							
						}
					});
			}
			
			function checkOtp()
			{
				$("#error_msg_opt").html('');
				if($("#otp").val()=="")
				{
					$("#error_msg_opt").html('Fyll i lösenordet');
					return false;
					
				}
				
				var send_data={};
				
				send_data.otp=$("#otp").val();
				send_data.infor_id=$("#infor_id").val();
				
				$.ajax({
					type:"POST",
					url:"../verifyOtp",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==0)
						{
							$("#error_msg_opt").html('Fyll i rätt lösenord');
						}
						else 
						{
							window.location.href="https://www.safeqloud.com/public/index.php/EmployeeList/companyAccount/<?php echo $data['eid']; ?>";
						}
					}
				});
				
			}
			
			
			</script>
	</head>
	
	<body class="white_bg">
		
	<div class="column_m header xs-hei_55p  bs_bb " id="headerData" style="background-color: <?php if($employeeDetail['bg_color']=="" || $employeeDetail['bg_color']==null) echo "#f5f5f5"; else echo $employeeDetail['bg_color']; ?>">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10" style="background-color: <?php if($employeeDetail['bg_color']=="" || $employeeDetail['bg_color']==null) echo "#f5f5f5"; else echo $employeeDetail['bg_color']; ?>">
					<div class="logo  marr15 wi_140p xs-wi_80p hidden-xs hidden-sm visible-xxs">
						<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="visible-xs visible-sm fleft padrl10">
							<div class="flag_top_menu flefti  padb10 " style="width: 70px; padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1  padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw1.png" width="45" height="31" alt="email" title="email" onclick="togglePopup();" class="brdrad5"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="hidden-xs hidden-sm fleft padl20 padr10 ">
						<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="hidden-xs" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
					</div>
					
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="#" class="show_popup_modal diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt" data-target="#gratis_popup_confirm">
									
									<span class="valm">St&auml;ng Sidan</span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
					<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="show_popup_modal diblock padl10 padr5 brdrad3   fsz35 "  style="color:  <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>" data-target="#gratis_popup_confirm"><i class="fas fa-bars" ></i></a> </div>
					
					<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="show_popup_modal diblock padl10 padr5 brdrad3   fsz35 "  style="color:  <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>" data-target="#login_qard"><i class="fas fa-sign-in-alt" ></i></a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
			<div class="clear"></div>
			
		
		<div class="column_m pos_rel " onclick="checkFlag();" style="background-color: <?php if($employeeDetail['bg_color']=="" || $employeeDetail['bg_color']==null) echo "#f5f5f5"; else echo $employeeDetail['bg_color']; ?>">
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart20  xs-mart0" style="background-color: <?php if($employeeDetail['bg_color']=="" || $employeeDetail['bg_color']==null) echo "#f5f5f5"; else echo $employeeDetail['bg_color']; ?>">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla padrl10  brdrad3" style="background-color: <?php if($employeeDetail['bg_color']=="" || $employeeDetail['bg_color']==null) echo "#f5f5f5"; else echo $employeeDetail['bg_color']; ?>">
						<div class="padtb0 brdrad3 ">
						
							<div class="padb10  talc padt20" >
										<div class="padrl0 ">
											<img src="<?php echo $imgs; ?>" width="140" height="140" class="white_brd borderr">
											
										</div>
									</div>

						<h1 class="lgn_hight_35 padt20 padb10 talc fsz40 bold  " style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>"><?php echo $employeeDetail['first_name']." ".substr($employeeDetail['last_name'],0,1); ?></h1>
						
						<p class="lgn_hight_35 padt25 talc fsz35   padb10 marb20 xs-padb5" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>"><?php if($employeeDetail['title']=="" || $employeeDetail['title']==null) echo 'Employee'; else echo $employeeDetail['title']; ?></p>
						<p class="lgn_hight_35 talc fsz30 padb20 black_txt hidden"><a href="#"><span class="bold"><?php echo $employeeDetail['company_name']; ?></span></a></p>
						
							
						
						<div class="wi_500p maxwi_100 dflex xs-fxwrap_w talc padt30 fleft  ">
						<div class="wi_25 xs-wi_75p marl10"><a href="javascript:void(0);" class="fsz40 show_popup_modal " data-target="#gratis_popup_contact" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>"> <span><i class="fas fa-phone-square " aria-hidden="true"></i> </span></a>
						<p class="fsz13  padt5" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>">Phone</p>
						</div>
						 
						<span class="padrl5 xs-padrl0"></span><div class="wi_25 xs-wi_75p"><a href="javascript:void(0);" class="fsz40 " style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>"> <span><i class="fas fa-sms" aria-hidden="true"></i> </span></a>
						<p class="fsz13  padt5" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>">SMS</p>
						</div>
						<span class="padrl5 xs-padrl0"></span>
						<div class="wi_25 xs-wi_75p"><a href="javascript:void(0);" class="fsz40 show_popup_modal" data-target="#gratis_popup_email" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>"><span><i class="far fa-envelope " aria-hidden="true"></i></span></a>
						<p class="fsz13  padt5" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>">Email</p>
						</div>

						<span class="padrl5 xs-padrl0"></span>
						<div class="wi_25 xs-wi_75p"><a href="javascript:void(0);" class="fsz40 " style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>"><span><i class="fas fa-map-marker-alt " aria-hidden="true"></i></span>
						<p class="fsz13  padt5" style="color: <?php if($employeeDetail['f_color']=="" || $employeeDetail['f_color']==null) echo "#000000"; else echo $employeeDetail['f_color']; ?>">Map</p>
						
						</a>
						
						</div>
						</div>
						
						</div>
						
						
						
					</div>
					
					
					
				</div>
						
			</div>
		
			
		</div>
		<div class="column_m container zi5 mart0 white_bg">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="padb10 ">
					
					
					
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  white_bg brdrad3">
						<div class="padtb0 brdrad3 ">
						
							
						
								
						<p class="lgn_hight_30 pad0 talc fsz30 padt20   xs-marb5 black_txt hidden"><i class="far fa-building"></i></p>		
						<p class="lgn_hight_35 talc fsz25  black_txt padt20 padb0 "><a href="../../CompanyOmOss/companyAccount/<?php echo $data['eid']; ?>"><span class="bold"><?php echo $employeeDetail['company_name']; ?></span></a></p>
						<p class="lgn_hight_30 pad0 talc fsz25 padb0   xs-marb5 black_txt hidden"><a href="javascript:void(0);"> <?php echo substr($employeeDetail['location'],0,25)."..."; ?></a></p>	
							
							<div class="talc padt5  padb20 hidden">
							<a href="javascript:void(0);" class="fsz30 hidden"> <span><i class="fas fa-phone-square black_txt"></i> </span></a><a href="javascript:void(0);" class="black_txt  fsz25"><?php if($employeeDetail['phone_number']=="" || $employeeDetail['phone_number']==null) echo "Not Available"; else echo "+".$employeeDetail['company_country_code']." ".$employeeDetail['phone_number']; ?></a></div>
						</div>
					</div>
					
				</div>
						
		
			</div><div class="clear"></div>
			<div class="hei_40p"></div>
		
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5" id="gratis_popup_contact">
	<div class="modal-content pad25 brdrad10">
		<div id="searched"><div class="padb0 ">
			<h2 class="talc marb5 pad0 bold fsz24 black_txt">Want to Contact me</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 talc ">
			
			<span class="valm fsz16">Here are details you can select from</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0" id="search_data">
			<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold ">
				<span class="marr5 valm">Conact Details</span>
				
				</div>
				</div>
				
				</div>
				<div class="sources-content  dnone padb20 " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Phone number :</a>
				</div>
				<a href="tel: <?php if($employeeDetail['phone']=="" || $employeeDetail['phone']==null) echo "Not Available"; else echo "+".$employeeDetail['company_country_code']." ".$employeeDetail['phone']; ?>"><span class="fxshrink_0 "><?php if($employeeDetail['phone']=="" || $employeeDetail['phone']==null) echo "Not Available"; else echo "+".$employeeDetail['company_country_code']." ".$employeeDetail['phone']; ?></span></a>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Mobile number :</a>
				</div>
				<a href="tel: <?php if($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) echo "Not Available"; else echo "+".$employeeDetail['mobile_country_code']." ".$employeeDetail['mobile']; ?>"><span class="fxshrink_0 "><?php if($employeeDetail['mobile']=="" || $employeeDetail['mobile']==null) echo "Not Available"; else echo "+".$employeeDetail['mobile_country_code']." ".$employeeDetail['mobile']; ?></span></a>
				</li>
				
				
				</ul>
				</div>
				</div>   
			
			
			
			</div>
			
			</div>
			
			
			</div>
			
			
			
			
			</div>
		
	</div>
</div>
	
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5" id="gratis_popup_email">
	<div class="modal-content pad25 brdrad10">
		<div id="searched"><div class="padb0 ">
			<h2 class="talc marb5 pad0 bold fsz24 black_txt">Want to Contact me</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 talc ">
			
			<span class="valm fsz16">Here are details you can select from</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0" id="search_data">
			<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold ">
				<span class="marr5 valm">Conact Details</span>
				
				</div>
				</div>
				
				</div>
				<div class="sources-content  dnone padb20 " style="display:block;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Email :</a>
				</div>
				<a href="email: <?php if($employeeDetail['work_email']=="" || $employeeDetail['work_email']==null) echo "Not Available"; else echo $employeeDetail['work_email']; ?>"><span class="fxshrink_0 "><?php if($employeeDetail['work_email']=="" || $employeeDetail['work_email']==null) echo "Not Available"; else echo $employeeDetail['work_email']; ?></span></a>
				</li>
				
				
				</ul>
				</div>
				</div>   
			
			
			
			</div>
			
			</div>
			
			
			</div>
			
			
			
			
			</div>
		
	</div>
</div>
	
<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5" id="login_qard">
	<div class="modal-content pad25 brdrad10">
		<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 ">
						
							<div class="padb10  talc padt20">
										<div class="padrl0 ">
											<img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&amp;data=https://www.safeqloud.com/company/index.php/EmployeeLogin/expressLogin/<?php echo $data['eid']; ?>" class="white_brd wi_50 hei_auto xs-wi_100">
											
										</div>
									</div>

						
						</div>
			
			</div>
			
			
			
	</div>
</div>


<div class="popup_modal wi_300p maxwi_90 pos_fix pos_btop xs-pos_btop xsi-pos_btop zi50 bs_bb  fsz14 brdrad3 popup_shadow white_bg" id="gratis_popup_confirm" style=" box-shadow: 0 2px 10px 0 rgba(105, 112, 113, 0.5);">
		<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="pad25  brdradtr10">
				<a href="javascript:void(0);" class="fsz100 blue_txt" > <span><i class="fas fa-bars" aria-hidden="true"></i> </span></a>
			</div>
			<h2 class="marb0 padrl20  bold fsz20 dark_grey_txt  tall">List Employees using security verification</h2>
		
			<div class="on_clmn padtb20 padrl20">
				<input type="button" value="Yes" class=" wi_300p maxwi_100  hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick="generateOTP();">
				
			</div>
			<div class="padtb10">
			<a href="#" class="talc close_popup_modal">Avbryt</a>
			</div>
	</div>
	
	</div>	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_login">
				<div class="modal-content pad25 brdrad5 ">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt talc">Slå in koden</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">Låt oss fastställa din identitet. Vi har precis skickat ett text meddelande med en ny kod till telefon numret som slutar  </span>
						</div>
						
						
					</div>
					
					<form method="POST" action="approveOtp" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
						
						
						<div class="padb0">
							
							<div class="pos_rel ">
								
								<input type="text" name="otp" id="otp" placeholder="Fyll i lösenordet" max="9999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
								
							</div>
						</div>
						<div class="red_bg" id="error_msg_opt">
							
							
						</div>
						
						
						
						
						
					</form>
					<div class="mart20 talc marb10">
						<input type="button" value="Signera och kom igång" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkOtp();">
						<input type="hidden" id="infor_id" name="infor_id" />
						
					</div>
					<div> Inte fått något sms? Försök igen.</div>
					
				</div>
			</div>

</div>
		
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
		
	</body>
	
</html>