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
	$im=0;
if($GetStartedUser ['passport_image']!=null) { $filename="../estorecss/".$GetStartedUser ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$GetStartedUser ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; $im=1; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

<!doctype html>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		
		
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
			
			function changeClass1(link)
				{
					
					$(".class-toggler").removeClass('active');
					
				}
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
			var timeout=0;
			var a;
			const timeInterval=3000;
			const tout=40;
			var send_data1={};
			function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(link).addClass('active');
			}
			
			var currentLang = 'sv';
			
			function selectCode(id)
			{
				if(id==1)
				{
					document.getElementById("codeSelect").style.display='block';
				}
				else
				{
					document.getElementById("codeSelect").style.display='none';
				}
			}
			
			function checkBankid()
			{
				//Clear previous message, if any
				$("#error_msg_form").html('');
				$("#cinMsg").html('');
				
				if($("#code_id").val()=="")
				{
					$("#error_msg_form").html('Personal number can not be blank');
					return false;
				}
				if(isNaN($("#code_id").val())) 
				{
					$("#error_msg_form").html('Personal number must be a numeric value');
					return false;
				}
				if($("#code_id").val().length < 12 || $("#code_id").val().length > 12) 
				{
					$("#error_msg_form").html('Personal number must be 12 digit numeric value');
					return false;
				}
				var send_data={};
				send_data.ssecurity1=$("#code_id").val();
				send_data.id='<?php echo $data['r_id']; ?>';
				var result=0;
				$.ajax({
					type:"POST",
					url:"../checkUserAvailability",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						
							$("#loginBank").hide();
							$("#loginBankMsg").attr('style','display:block');
							$("#headerData").attr('style','display:none');
							
							send_data1.user_id=data1;
							send_data1.prnumber=$("#code_id").val();
							send_data.prnumber=$("#code_id").val();
							$.ajax({
								type:"POST",
								url:"../../../../user/index.php/BankidCheck/initiate",
								data:send_data,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									
									if(data1)
									{
										send_data1.orderRef=data1;
										a = setInterval(ajaxSend, timeInterval);
									}
									else 
									{
										$("#errorMsg").html('error request');
									}
								}
							});
							
						
					}
				});
				
				
				
				
				
			}
			function ajaxSend()
			{ 
				$.ajax({
					type:"POST",
					url:"../../../../user/index.php/BankidCheck/checkOrderReference",
					data:send_data1,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data2){
						if(data2!='complete')
						{
							timeout++;
							if(data2==1)
							{
								clearInterval(a);
								$("#errorMsg").html("Det BankID du försöker använda är för gammalt eller spärrat. Använd ett annat BankID eller hämta ett nytt hos din internetbank.");
							}
							else if(data2==2)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten. Försök igen.");
							}
							else if(data2==3)
							{
								clearInterval(a);
								$("#errorMsg").html("BankID-appen verkar inte finnas i din dator eller telefon. Installera den och hämta ett BankID hos din internetbank. Installera appen från din appbutik eller https://install.bankid.com.");
							}
							else if(data2==4)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten.");
							}
							else if(timeout>tout)
							{
								clearInterval(a);
								$("#loginBankMsg").attr('style','display:none');
								$("#loginFailMsg").attr('style','display:block');
								//$("#errorMsg").html('Internt tekniskt fel. Försök igen.');
							} 
							else 
							{
								$("#errorMsg").html(data2);
							}
						}
						else 
						{
							send_data1.id='<?php echo $data['r_id']; ?>';
							
							$.ajax({
								type:"POST",
								url:"../approveRequest",
								data:send_data1,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									
									if(data1==0)
									{
										$("#errorMsg").html('Some error occured please try again later');
										clearInterval(a);
									}
									else 
									{
										clearInterval(a);
										window.location.href="https://www.safeqloud.com/public/index.php/PublicUserRequest/requestAccount/<?php echo $data['r_id']; ?>";
									}
								}
							});
							
							
							
						}
						
					}
				});
				
			}
			
			
		</script>
		
		
		
	</head>
	
	<?php $path1 = $path."html/usercontent/images/"; ?>
	
	<body class="white_bg" id="bodyBg">
		<div class="column_m header  bs_bb white_bg" id="headerData">
			<div class="wi_100 hei_65p xs-pos_fix pos_fix  padtb5 padrl10 white_bg">
				<div class="logo  marr15 wi_140p xs-wi_80p">
						<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 " style="width: 50px; padding : 5px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="" style="margin: 0 30px 0 0;">
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
					
				<div class="hidden-xs hidden-sm fleft padl20 padr10 brdl">
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
				
				<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg uppercase lgn_hight_30 white_txt  white_txt_h  brdl" data-en="Close" data-sw="Close">Close</a> </li>
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20 "> <a href="#"  class="translate hei_30pi dblock padrl20   lgn_hight_30 black_txt show_popup_modal   " data-target="#om_mina" data-en="Om mina uppgifter" data-sw="Om mina uppgifter">Om mina uppgifter</a> </li>
					</ul>
					
				</div>
				
				<div class="visible-xs visible-sm fright marr0 padr0"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
			
				<div class="clear"></div>
				
			</div>
		</div>
		
		
		<div class="clear"></div>
		<!-- LOGIN FORM -->
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart65 mart95 marb0" id="loginBankMsg" style="display:none;">
			<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
				<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
					
				<div class="talc fsz75 red_txt"><img src="<?php echo $path; ?>html/usercontent/images/icon_64x64@2x.png" /></span></div>
				<div class="padb10 padt20">
					<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="errorMsg"></h1>
					<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="cinMsg"></h1>
					
				</div>
				
				
			</div><div class="clear"></div>
			
			
			
		</div>
	</div>
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart65 mart95 marb0" id="loginFailMsg" style="display:none;">
		<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
				
			<div class="talc fsz75 red_txt"> <img src="<?php echo $path; ?>html/usercontent/images/icon_64x64@2x.png" /></span></div>
			<div class="padb10 padt20">
				<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" >Internt tekniskt fel. Försök igen.</h1>
				
				
			</div>
			
			<div class="mart20 talc">
				<a href="https://www.safeqloud.com/public/index.php/GetIdentified/verifyRequest/<?php echo $data['id']; ?>">	<input type="button" value="Pröva igen" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" ></a>
				
			</div>
		</div><div class="clear"></div>
		
		
		
	</div>
</div>										
<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();" style="display:<?php if($checkVerifiedRequest==1) echo 'block'; else echo 'none'; ?>">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
						
						<div class="talc fsz75 green_txt"> <span class="fas fa-check-circle"></span></div>
							<div class="padb10 ">
									<h1 class="padb5 talc fsz65 xs-fsz25 bold ">Thanks !</h1>
									<p class="pad0 xs-padb10 talc fsz25 xs-fsz16 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 xs-brdb_b">This request has been/already verified.</p>
								</div>
						
						<div class="mart20 talc">
						<input type="button" value="Logga in" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" >
						
					</div>
					</div><div class="clear"></div>
				</div>
			</div>
			
<div class="column_m xs-padb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart0 mart10 marb0" id="loginBank" onclick="checkFlag();" style="display:<?php if($checkVerifiedRequest==0) echo 'block'; else echo 'none'; ?>">
	<div class="padrl10 xs-padrl15">
		<div class="wrap maxwi_100   xs-nobrdb  xs-padb0 mart0 xs-mart0">
			
			
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla padrbl10  xs-pad0  ">	
				
				<div class="wi_100 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart0 brdrad5 talc">
					
					
					<div class="padb0 xxs-pad0 xxs-padb0">
						<?php if($im==0) { ?>
							<div class="marb30 talc">
								<div class="talc fsz256 green_txt"> <span class="far fa-building"></span></div>
							</div>
							<?php } else { ?>
							<div class="marb30 talc">
								<img src="<?php echo $imgs; ?>" class="maxwi_100 xs-wi_50 hei_auto brd brdrad5" width="380" height="168.88" style="border-color: #ffffff;">
							</div>
						<?php } ?>
						<h4 class="bold fsz40 xs-fsz30 padb10 talc xs-talc">
							Bekräfta din identitet</h4>
							<h3 class="fsz20 xs-fsz20 padb10 padt10 xs-padt0 brdb_new tall  lgn_hight_30 xs-talc">Var god och bekräfta din ID-handling med ditt mobila BankID.</h3>
						
						<div class="marb0 padrl0 first">
							
							
							<div class="on_clmn padtb0">
								
								
								<div class="on_clmn mart5 marb10" >
									
									<input type="text" name="code_id" id="code_id" placeholder="Ditt personnummer i ett följd" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
									
									
								</div>
								
								
								<div id="error_msg_form" class="red_txt"></div>
								<div class="clear"></div>
							</div>
							
							
							
							
							<div class="clear"></div>
							
							<div class="padb10 xs-padrl0 mart10" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="checkBankid();">Verifiera dig med BankID</a> </div>
							
							
							
						</div>
						
						
						
						
						
					</div>
					
					
				</div>
				<div class="wi_100 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc  xs-padr0 xs-padl0 visible-sm visible-xs">
					<h4 class="bold fsz20 xs-fsz20 padb10 tall">Frågor och svar</h4>
					
					
					<ul class="mart10 pad0 tall fsz18">
						
						<li class="dblock mar0 marb10 pad0">
							<a href="javascript:void(0);" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass1(this);">
								<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
								<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
								Frågeställaren
							</a>
							<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
								
								<p class="padb5"><?php echo $GetStartedUser['ssn']; ?> 
								</p>
								
								<p class="padb5"><?php echo $GetStartedUser['name']; ?>  </p>		
										
								<p class="padb5"><?php if($GetStartedUser['address']==null || $GetStartedUser['address']=="") echo "-"; else echo $GetStartedUser['address']; ?>  </p>		
								<p class="padb5"> <?php if($GetStartedUser['zipcode']==null || $GetStartedUser['zipcode']=="") echo "-"; else echo $GetStartedUser['zipcode']; ?>  <?php if($GetStartedUser['city']==null || $GetStartedUser['city']=="") echo "-"; else echo html_entity_decode($GetStartedUser['city']); ?> </p>		
										
								<p class="padb5"><?php if($GetStartedUser['phone_number']==null || $GetStartedUser['phone_number']=="") echo "-"; else echo $GetStartedUser['phone_number']; ?>   </p>		
								
							</div>
						</li>
						
						<li class="dblock mar0 marb10 pad0 hidden">
							<a href="javascript:void(0);" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass1(this);">
								<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
								<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
								Om din data
							</a>
							<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
								
								<p>När du har verifierat din identitet skickas en bekräftelse till beställaren . Uppgifterna som du lämnar ifrån dig hanteras enligt gällande GDPR-lagstiftning. 
								</p>
								
								<p>Vid frågor kring detta, vänligen hör av dig till beställaren eller oss på Qloud ID på +46 10 1510125. </p>		
							</div>
						</li>
						
						
					</ul>
				</div>
				
			</div>
		</div>
	</div>
	
	<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
</div>

<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_connect  brdrad5"  id="gratis_popup_connect">
	<div class="modal-content pad25  brdrad5 ">
		<div id="connect_id">
			
			
		</div>
	</div>
	
</div>
<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_login">
	<div class="modal-content pad25 brdrad5 ">
		<div class="padb5 ">
			<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F </h1>
			<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
		</div>
		<div class="lgtgrey2_bg">
			<h3 class="pos_rel marb0 padrl25 padtb10 fsz20 dark_grey_txt lgtgrey2_bg">
				Ett engångslösenord är skickad
				
			</h3>
			<form method="POST" action="InformRelatives/sendEmail" id="save_indexing_email" name="save_indexing_email" accept-charset="ISO-8859-1">
				
				
				<div class="pad15 lgtgrey2_bg">
					<label class="marb5  padl10 padb10">Lösenord</label>
					<div class="pos_rel padrl10">
						<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
						<input type="text" name="otp" id="otp" placeholder="Fyll i lösenordet" max="9999999" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
						
					</div>
				</div>
				<div class="red_bg" id="error_msg_opt">
					
					
				</div>
			</form>
		</div>
		<div class="mart20 talc">
			<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
			<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp" onclick="checkOtp();">
			<input type="hidden" id="infor_id" name="infor_id" />
		</div>
	</div>
</div>
<div class="popup_modal wi_700p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="om_mina">
				<div class="modal-content pad25  nobrdb talc brdrad5 ">
					
					
					<h2 class="marb10 pad0 bold fsz24 black_txt">HANTERING AV PERSONUPPGIFTER</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla tall">
						
						
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Vi värnar om din integritet</span>
						</div>
						<ul class="mart10 pad0 tall fsz16">
									
									
									<li class="dblock mar0 marb10 pad0 first">
										<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass1(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											Hantering av personuppgifter
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>När du matar in ditt namn och telefonnummer i vårt besökssystem används uppgifterna för att informera den person du besöker per sms och/eller e-post via en extern tjänsteleverantör om din ankomst och lagras i syfte att kunna ta fram en utrymningslista i händelse av brand eller annan fara. Uppgifterna raderas automatiskt från besökssystemet efter 1 dygn men kan lagras under en längre tid hos våra externa tjänsteleverantörer för fakturerings- och statistikändamål.  </p>
											<p>Grunden för insamlingen är att det eter en intresseavvägning finns ett legitimt syfte med att samla in dina uppgifter för att kunna informera om ditt besök och veta vilka personer som vistas i våra lokaler. </p>
										</div>
									</li>
									<li class="dblock mar0 marb10 pad0 last">
										<a href="#" class="class-toggler dark_grey_txt " data-classes="active" onclick="changeClass1(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											Du äger din data
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Du kan så länge dina personuppgifter finns lagrade begära att få ut utdrag på uppgifterna eller få uppgifterna rättade eller raderade. Du har också rätt att klaga på behandlingen till tillsynsmyndigheten (i Sverige Datainspektionen). Dina personuppgifter kommer inte att lämnas ut till tredje part (utöver vad som angetts ovan), föras över till part i land utanför EU som inte är ”privacyshield”-certifierad eller behandlas för några andra ändamål än vad som angetts ovan. I fall där besöksmottagaren eller du som besökare har telefontjänster eller mailtjänster via leverantörer utanför EU kommer dock uppgifter om besöket aviseras via dessa leverantörer.   </p>
											
											
										</div>
									</li>
									
								</ul>
						
							<div class="wi_100 mart10 talc">
				<input type="button" value="Close" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp ">
					
			</div>
				</div>
			</div>
			
			</div>
			
<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_send">
	<div class="modal-content pad25 brdrad5 ">
		<div class="padb5 ">
			<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F </h1>
			<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
		</div>
		<div class="lgtgrey2_bg">
			<h3 class="pos_rel marb0 padrl25 padtb10 fsz20 dark_grey_txt lgtgrey2_bg">
				Ett engångslösenord är skickad
				
			</h3>
			
			
			<div class="pad15 lgtgrey2_bg">
				<label class="marb5  padl10 padb10">Phone Number</label>
				<div class="pos_rel padrl10">
					<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="text" name="phno" id="phno" placeholder="Phone number" max="9999999999" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
					
				</div>
			</div>
			<div class="red_bg" id="error_msg_phone">
				
				
			</div>
			
		</div>
		<div class="mart20 talc">
			<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
			<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp" onclick="submit_info();">
			
		</div>
	</div>
</div>

<div class="clear"></div>
<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>




</body>
</html>																			