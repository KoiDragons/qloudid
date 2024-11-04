<!doctype html>
<html>
		<?php
			$path1 = $path."html/usercontent/images/";
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
		
		if($childrenDetail ['child_image_path']!=null) { $filename="../estorecss/".$childrenDetail ['child_image_path'].".txt"; if (file_exists($filename)) { $value_c=file_get_contents("../estorecss/".$childrenDetail ['child_image_path'].".txt"); $value_c=str_replace('"','',$value_c); $value_c = base64_to_jpeg( $value_c, '../estorecss/tmp'.$childrenDetail['child_image_path'].'.jpg' ); } else { $value_c="../html/usercontent/images/person-male.png"; } }  else $value_c="../html/usercontent/person-male.png";
		
		
		if($parentPassportDetail ['passport_image']!=null) { $filename="../estorecss/".$parentPassportDetail ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$parentPassportDetail ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>
		<head>
	<meta charset="utf-8">
	<meta name="theme-color" content="<?php if($parentPassportDetail['bg_color']=="" || $parentPassportDetail['bg_color']==null) echo "#f5f5f5"; else echo $parentPassportDetail['bg_color']; ?>" />
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
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		<script>
	 
		 
		
		function show_popup()
		{
			if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#popup_fade").removeClass('active');
				$("#popup_fade").attr('style','display:none;');
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				
			}
			else
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block;');	
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
			}
		}
		
		function closemob_popup()
		{
			
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block;');	
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
			
		}
		
		function show_phone()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_phone").addClass('active');
				$("#gratis_popup_phone").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_phone").removeClass('active');
				$("#gratis_popup_phone").attr('style','display:none;');
				
			}
			}
			
			function show_save()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_saveq").addClass('active');
				$("#gratis_popup_saveq").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_saveq").removeClass('active');
				$("#gratis_popup_saveq").attr('style','display:none;');
				
			}
			}
			
			function show_savev()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_verify").addClass('active');
				$("#gratis_popup_verify").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_verify").removeClass('active');
				$("#gratis_popup_verify").attr('style','display:none;');
				
			}
			}
			
			function show_email()
			{
				if($("#gratis_popup_mob").hasClass('active'))
			{
				$("#gratis_popup_mob").removeClass('active');
				$("#gratis_popup_mob").attr('style','display:none;');
				$("#gratis_popup_email").addClass('active');
				$("#gratis_popup_email").attr('style','display:block;');	
				
			}
			else
			{
				$("#gratis_popup_mob").addClass('active');
				$("#gratis_popup_mob").attr('style','display:block;');
				$("#gratis_popup_email").removeClass('active');
				$("#gratis_popup_email").attr('style','display:none;');
				
			}
			}
			
			
			function shareInformation()
			{	
				$("#errPhone").html('');
				 if($("#phoneno").val()=="" || $("#phoneno").val()==null)
				{
					$("#errPhone").html("Please enter phone number!!!");
					return false;
				}
				
				document.getElementById("share_data").submit();
			}
			
			
			function shareInformationEmail()
			{	
				$("#errEmail").html('');
				 if($("#email_info").val()=="" || $("#email_info").val()==null)
				{
					$("#errEmail").html("Please enter Email!!!");
					return false;
				}
				
				document.getElementById("share_data_email").submit();
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
							window.location.href="https://www.qloudid.com/public/index.php/EmployeeList/companyAccount/<?php echo $data['eid']; ?>";
						}
					}
				});
				
			}
			
			</script>
	</head>
	
	<body class="lgtgrey2_bg  ffamily_avenir">
		
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../parentRelativeDetail/<?php echo $data['child_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
      <div class="column_m header hei_55p  bs_bb lgtgrey2_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 lgtgrey2_bg"  >
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../parentRelativeDetail/<?php echo $data['child_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel " onclick="checkFlag();"  >
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart20  xs-mart0 lgtgrey2_bg"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 lgtgrey2_bg">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla padrl10  brdrad3 lgtgrey2_bg"  >
						<div class="padtb0 brdrad3 ">
						
							<div class="padb20  talc padt20">
										<div class="padrl0 ">
											<img src="../<?php echo $imgs; ?>" width="160" height="160" class="white_brd borderr">
											
										</div>
									</div>

						<p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 yellow_txt bold">Personal ID</p>
<h1 class="lgn_hight_35 padt10 padb20 xs-padb10 talc fsz35 black_txt"><?php echo $parentPassportDetail['first_name']." ".$parentPassportDetail['last_name']; ?></h1>
						
						<p class="lgn_hight_16 padt10 talc fsz20   padb10 marb0 xs-padb5 grey_new_txt">9856 3212 3321 6564</p>
						 
						
							
						
						<p class="lgn_hight_16 padt0 talc fsz20   padb10 marb20 xs-padb5 xxs-marb100 grey_new_txt">07/18    133</p>

						 
						<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb20 xs-padb0">
						<div class="wi_25-12p marl10">
						<a href="<?php if($parentPassportDetail['phone_number']==null || $parentPassportDetail['phone_number']=='') echo'#'; else echo 'tel:+'.$parentPassportDetail['country_code'].''.$parentPassportDetail['phone_number']; ?>" class="fsz30 <?php if(($parentPassportDetail['phone_number']=="" || $parentPassportDetail['phone_number']==null) && ($parentPassportDetail['phone_number']=="" || $parentPassportDetail['phone_number']==null) && ($parentPassportDetail['phone_number']=="" || $parentPassportDetail['phone_number']==null || $parentPassportDetail['phone_number']=='-'))echo ''; else echo 'show_popup_modal'; ?>" data-target="#gratis_popup_contact"   >
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;" aria-hidden="true" class="bg_rgb_blue fa-circle fa-stack-2x   color_rgb_blue "></i>
																				  <i class="<?php if(($parentPassportDetail['phone_number']=="" || $parentPassportDetail['phone_number']==null) && ($parentPassportDetail['phone_number']=="" || $parentPassportDetail['phone_number']==null) && ($parentPassportDetail['phone_number']=="" || $parentPassportDetail['phone_number']==null || $parentPassportDetail['phone_number']=='-')) echo 'red_txt fas fa-times'; else echo 'white_txt fas fa-phone'; ?>    fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz15  padt5 grey_new_txt" >Phone</p>
						</div>
						 
						
						 
						
						 

						
						 
							<div class="wi_25-12p marl10">
						<a href="<?php if($parentPassportDetail['phone_number']==null || $parentPassportDetail['phone_number']=='') echo'#'; else echo 'sms:+'.$parentPassportDetail['country_code'].''.$parentPassportDetail['phone_number']; ?>" class="fsz30"   style="color: <?php if($parentPassportDetail['phone_number']=="" || $parentPassportDetail['phone_number']==null || $parentPassportDetail['phone_number']=='-') echo 'red'; else { echo '#e4e4e4'; } ?>">
						<span class="fa-stack-info">
																				   <i style="border-radius: 10%;" aria-hidden="true" class="bg_rgb_blue fa-circle fa-stack-2x   color_rgb_blue "></i>
																				  <i class="black_txt <?php if($parentPassportDetail['phone_number']==null || $parentPassportDetail['phone_number']=='') echo 'red_txt fas fa-times'; else echo 'fas fa-sms white_txt'; ?> fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz15  padt5 grey_new_txt"  >SMS</p>
						</div>
						 
						 
						
						<div class="wi_25-12p marl10"><a href="<?php if($parentPassportDetail['email']==null || $parentPassportDetail['email']=='') echo'#'; else echo 'mailto:'.$parentPassportDetail['email']; ?>" class="fsz30  " style="color: <?php if($parentPassportDetail['email']==null || $parentPassportDetail['email']=='') echo'red'; else { echo "#e4e4e4"; } ?>"> <span class="fa-stack-info ">
																				  <i style="border-radius: 10%;" aria-hidden="true" class="bg_rgb_blue fa-circle fa-stack-2x   color_rgb_blue "></i>
																				  <i class=" <?php if($parentPassportDetail['email']==null || $parentPassportDetail['email']=='') echo 'fas fa-times red_txt'; else echo 'far fa-envelope-open white_txt'; ?> fa-stack-1x fab1 pad0" aria-hidden="true"></i>
																				</span></a>
						<p class="fsz15  padt5 grey_new_txt"  >Email</p>
						</div>  

						
						<div class="wi_25-12p marl10"><a href="https://maps.google.com/?q=<?php echo  $parentPassportDetail['address']; ?>" class="fsz30  " style="color: #e4e4e4"> <span class="fa-stack-info ">
																				  <i style="border-radius: 10%;" aria-hidden="true" class="bg_rgb_blue fa-circle fa-stack-2x   color_rgb_blue "></i></i>
																				  <span class="white_txt fas fa-map-marker-alt fa-stack-1x fab1 pad0" aria-hidden="true"></span>
																				</span></a>
						<p class="fsz15  padt5 grey_new_txt"  ">Map</p>
						</div> 
						
						</div>
	
							
						
						
						</div>
						
						
						
					</div>
					
					
					
				</div>
						
			</div>
		
			
		</div>
		 
		  
		<div id="popup_fade" class="opa0 opa55_a black_bg" onclick="closemob_popup();"></div>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		 
		
	</body>
	
</html>