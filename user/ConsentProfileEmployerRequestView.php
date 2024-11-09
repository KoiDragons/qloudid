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
		 
		if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; }

	$path1 = $path."html/usercontent/images/";
	?>
		<head>
	<meta charset="utf-8">
 
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
		var id='<?php echo $data['cid']; ?>';
		var dict = {
				"Home": {
					sv: "Início"
				},
				"Download plugin": {
					sv: "Descarregar plugin",
					en: "Download plugin"
				}
			}
			var translator = $('body').translate({lang: "en", t: dict});
			translator.lang("en");
			var translation = translator.get("Home");
			var currentLang = 'en';
			var langVar='En';
			
			
		 function showError()
		 {
			 $('#ErrorMsg').removeClass('hidden');
		 }
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
			
			function changeDisplay(id,link)
		{
				
			if($(link).hasClass('active'))
			{
				$('.expander-toggler').removeClass('active');
				$(link).removeClass('active');	
				if(id==1)
				{
					$('#employees1').attr('style','display:none;');
										
				}
				else if(id==2)
				{
					$('#employees2').attr('style','display:none;');
										
				}
				else if(id==3)
				{
					$('#employees3').attr('style','display:none;');
										
				}
				else if(id==4)
				{
					$('#employees4').attr('style','display:none;');
										
				}
				
			}
			else
			{
				$('.expander-toggler').removeClass('active');
				$(link).addClass('active');	
				if(id==1)
				{
					$('#employees1').attr('style','display:block;');
					$('#employees2').attr('style','display:none;');
					$('#employees3').attr('style','display:none;');
					$('#employees4').attr('style','display:none;');
				}
				else if(id==2)
				{
					$('#employees1').attr('style','display:none;');
					$('#employees2').attr('style','display:block;')
					$('#employees3').attr('style','display:none;');
					$('#employees4').attr('style','display:none;');
				}
				else if(id==3)
				{
					$('#employees1').attr('style','display:none;');
					$('#employees2').attr('style','display:none;')
					$('#employees3').attr('style','display:block;');
					$('#employees4').attr('style','display:none;');
				}
				else if(id==4)
				{
					$('#employees1').attr('style','display:none;');
					$('#employees2').attr('style','display:none;')
					$('#employees3').attr('style','display:none;');
					$('#employees4').attr('style','display:block;');
				}
			}
		}
			 
			 
			 function setDisconnect()
			{
				var send_data={};
				send_data.cid=id;
				
				$.ajax({
					type:"POST",
					url:"../../ShareMonitor/checkConnection",
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
							$("#cid").val(id);
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
			 
			 
			</script>
	</head>
	
	<body class="white_bg ffamily_avenir xs-white_bg">
		
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					 
                <div class="clear"></div>

            </div>
        </div>
		<div class="clear" id=""></div>
		
	
		 
		<div class="column_m pos_rel " >
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart20  xs-mart0 white_bg xs-white_bg">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  brdrad3 white_bg xs-white_bg">
						<div class="padtb0 brdrad3 ">
						
							<div class="padb20  talc padt20">
										<div class="padrl0 ">
											<img src="<?php echo $imgs; ?>" width="160" height="160" class="white_brd borderr">
											
										</div>
									</div>

						<p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 yellow_txt bold"><?php if($data['request']==1) echo 'Pending'; else if($data['request']==2) echo 'Received'; else if($data['request']==3) echo 'Approved'; else echo 'Rejected'; ?></p>
<h1 class="lgn_hight_35 padt10 padb20 xs-padb10 talc fsz35 black_txt"><?php echo $companyDetail['company_name']; ?></h1>
						
						<p class="lgn_hight_16 padt10 talc fsz20   padb10 marb0 xs-padb5 grey_new_txt">9856 3212 3321 6564</p>
						 
						
							
						
						<p class="lgn_hight_16 padt0 talc fsz20   padb10 marb20 xs-padb5 xxs-marb100 grey_new_txt"><?php echo date('m/y',strtotime($companyRequest['created_on']))."      123";?></p>

						<?php if($data['request']==2 || $data['request']==3) { ?>
							<div class="padrbl20 xs-padrl10 ">
				 
			<div class="mart10 marrl5 padb10  fsz14  white_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt active" onclick="changeDisplay(1,this);">
			<span class="dnone_pa fa fa-chevron-down" aria-hidden="true"></span>
			<span class="dnone diblock_pa fa fa-chevron-up" aria-hidden="true">
			</span> Bas uppgifter</a>
			</div>
			<div id="employees1" style="display:block;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="fsz14 black_txt white_bg"><tr>
			</tr>
			<tr class="black_txt  fsz13 white_bg odd">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">SSN</div></td>
			
			<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="ssn" id="ssn" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
			 
			</tr>
			<tr class="black_txt  fsz13 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Name</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="first_name" id="first_name" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg odd">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Last Name</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="last_name" id="last_name" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
									 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Day)</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="dob_day" id="dob_day" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg odd">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Month)</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="dob_month" id="dob_month" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
										
									</tr>
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Year)</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="dob_year" id="dob_year" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									
									<tr class="black_txt  fsz13 white_bg odd">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Sex</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="sex" id="sex" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
			
			</tbody>
			</table>
			</div>
			</div>
			</div>
			<div class="mart10 marrl5 padtb10  fsz14  white_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt" onclick="changeDisplay(2,this);">
			<span class="dnone_pa fa fa-chevron-down" aria-hidden="true"></span>
			<span class="dnone diblock_pa fa fa-chevron-up" aria-hidden="true">
			</span> Hem adress</a>
			</div>
			<div id="employees2" style="display:none;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="black_txt  fsz15 white_bg">
				<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">City</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="city" id="city" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
									 
									</tr>
									<tr class="black_txt  fsz13 white_bg odd">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">State</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="state" id="state" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Zip</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="zip" id="zip" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg odd">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Address</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="address" id="address" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Country</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="country" id="country" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
			
			</tbody>
			</table>
			</div>
			</div>
			</div>
			<div class="mart10 marrl5 padtb10  fsz14  white_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt" onclick="changeDisplay(3,this);">
			<span class="dnone_pa fa fa-chevron-down" aria-hidden="true"></span>
			<span class="dnone diblock_pa fa fa-chevron-up" aria-hidden="true">
			</span>Telefon nummer</a>
			</div>
			<div id="employees3" style="display:none;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="black_txt  fsz15 white_bg">
				<tr class="black_txt  fsz13 white_bg odd">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Telephone</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="tel" id="tel" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Mobile</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="mobile_p" id="mobile_p" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg odd">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Marital Status</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="marital_status" id="marital_status" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
			</tbody>
			</table>
			</div>
			</div>
			</div>
			<div class="mart10 marrl5 padtb10  fsz14  white_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt" onclick="changeDisplay(4,this);">
			<span class="dnone_pa fa fa-chevron-down" aria-hidden="true"></span>
			<span class="dnone diblock_pa fa fa-chevron-up" aria-hidden="true">
			</span>Arbete</a>
			</div>
			<div id="employees4" style="display:none;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="black_txt  fsz15 white_bg">
				<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Nationality</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="nation" id="nation" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg odd">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Employee Number</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="e_number" id="e_number" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Hiring Date</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="s_date" id="s_date" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg odd">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Resigned Date</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="r_date" id="r_date" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Phone</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="phone" id="phone" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
									 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg odd">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Mobile</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="mobile" id="mobile" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Email</div>
										</td>
										<td class="pad5 brdb_new tall">
													<div class="padtb5">
														<div class="boolean-control boolean-control-small boolean-control-green fright checked">
															<input type="checkbox" name="email" id="email" class="default" data-true="Yes" data-false="No">
														</div>
													</div>
												</td>
										 
									</tr>
									
			</tbody>
			</table>
			</div>
			</div>
			</div>
			
			
			</div>
						
						<?php }  if($data['request']==2) { ?>
						<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb40   xs-padb0">
						
						 
						
						 	<div class="wi_25-12p marl123 xxs-mar87">
						<a href="../../ShareMonitor/approveEmployee/<?php echo $data['rid']; ?>" class="fsz30 ">
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #e4e4e4; color: #e4e4e4" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="black_txt fab fa-airbnb fa-stack-1x fab1 bold pad0" aria-hidden="true" style="color:#fcaf16;"></i>
																				</span></a>
						<p class="fsz14  padt5 grey_new_txt">Accept</p>
						</div>
						 
						<div class="wi_25-12p marl10">
					 
				<a href="../../ShareMonitor/rejectEmployee/<?php echo $data['rid']; ?>" class="fsz30 ">
				 
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #e4e4e4; color: #e4e4e4;" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="far fa-building fa-stack-1x fab1 bold pad0" aria-hidden="true" style="color:#01b7f2;"></i>
																				</span></a>
						<p class="fsz14  padt5 grey_new_txt">Reject</p>
						</div>
						
						 
						</div>
						
	 				
						
						<?php } else if($data['request']==3) { ?>
						<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb40   xs-padb0">
						
						 
						
						 	<div class="wi_25-12p marl193 xxs-mar126">
						<a href="#" class="fsz30 " onclick="setDisconnect();">
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #e4e4e4; color: #e4e4e4" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="black_txt fab fa-airbnb fa-stack-1x fab1 bold pad0" aria-hidden="true" style="color:#fcaf16;"></i>
																				</span></a>
						<p class="fsz14  padt5 grey_new_txt">Disconnect</p>
						</div>
						 
						 
						 
						</div>
						<?php } ?>
					</div>
					
					
					
				</div>
						
			</div>
		
			
		</div>
			
		</div>
	 
	 <div id="popup_fade" class="opa0 opa55_a black_bg"></div>
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
						You are owner of the same company. You can not be disconnected from this company.
						
					</h3>
					
				</div>
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
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
			<form action="../../ShareMonitor/disconnectEmployee" method="POST">
			
			
			<input type="hidden" id="cid" name="cid" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
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