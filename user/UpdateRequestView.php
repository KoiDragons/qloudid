<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>safeqloud</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		 <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
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
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		
		<script>
			var currentLang = 'sv';
			function submitForm()
			{
			$('#errorMsg').html('');
			
				if($("#ssn").val()=="")
				{
				
				$("#errorMsg").html("please enter personnal number  !!!");
					return false;
				}
				else if($("#ssn").val().length!=12)
				{
				
				$("#errorMsg").html("please enter correct personnal number  !!!");
					return false;
				}
				else 
				{
				var send_data={};
				
				send_data.ssn=$("#ssn").val();
				$.ajax({
					type:"POST",
					url:"../CheckSsnDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1==1)
						{
						
						$("#errorMsg").html("Another user already have this personal number. Please enter another one  !!!");
						return false;
						}
						else if(data1==0)
						{
						
								document.getElementById("loginform").submit();
							
						}
					}
				});	
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
		</script>
	</head>
	<?php $path1 = $path."html/usercontent/images/"; ?>
	<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg" >
		<div class="column_m header xs-header xsip-header xsi-header bs_bb lineargrey_bg"  >
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lineargrey_bg"  >
								<div class="logo marr15 wi_60p">
				<a href="https://www.safeqloud.com"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">QiD</h3> </a>
			</div>
			<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 padt5 xxxs-padt20 xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
								<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" ><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
			<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
			<div class="flag_top_menu flefti padt10 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" ><i class="fas fa-globe" onclick="togglePopup();"></i></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
                  <li class="fsz14">
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="sv" onclick="changeLanguage(1);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="sv" onclick="changeLanguage(1);">  Svenska</a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="en" onclick="changeLanguage(0);"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="en" onclick="changeLanguage(0);">  Engelska </a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
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
			
				<div class="fright xs-dnone visible-si padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs visible-si fright pos_rel brdl "> <a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Skip" data-sw="Skip">Skip</a> </li>
						 
					</ul>
				</div>
				<!--sf-js-enabled sf-arrows hidden-xs-->
				<div class="top_menu frighti padt15 padb20 hidden">
					<ul class="menulist sf-menu  fsz14 ">
						
						
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz24 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
						</li>
						
					</ul>
				</div>
				<div class="visible-xs hidden-si fright marr0 padr0 xs-padt5"> <a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Skip</a> </div>
				<div class="clear"></div>
			</div>
		</div>
<div class="clear"></div>
		
		<!-- LOGIN FORM -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz60 bold padb10 black_txt trn">Anslut</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Please select an option…</a></div>
						
							
					
					<div class="container padrl15 xs-padrl0">
						
						<div class="marrla xs-wi_100">
							
							<form action="../updateRequestAll/<?php echo $data['cid']; ?>" method="POST" id="loginform" >
								<div class="marb0 padtb10 ">
									
									
									<div class="on_clmn mart10 marb25">
										<div class="pos_rel">
										<input type="text" name="ssn" id="ssn" placeholder="Employee SSN"  class="wi_100 rbrdr pad10  brdb talc  minhei_65p fsz18 llgrey_txt fsz16" >
									</div>
										
										</div>
										
										<div class="clear"></div>
									</div>
									
									<div id="errorMsg" class="red_txt fsz16"> </div>
									
							<input type="hidden" name="employer" id="employer" value="<?php echo $_POST['employer']; ?>" />
							<input type="hidden" name="supplier" id="supplier" value="<?php echo $_POST['supplier']; ?>" />
							<input type="hidden" name="tenant" id="tenant" value="<?php echo $_POST['tenant']; ?>" />
							<input type="hidden" name="skola" id="skola" value="<?php echo $_POST['skola']; ?>" />
							<input type="hidden" name="ind" id="ind" value="<?php echo $_POST['ind']; ?>" />
							<input type="hidden" name="property_id" id="property_id" value="<?php echo $_POST['property_id']; ?>" />		
								</div>
								
								<div class="padt5 xxs-talc talc">
								
								<button type="button" name="forward" class="forward hei_55p fsz18 trn" onclick="submitForm();">Anslut</button>
								
							</div>
								
								
								
								
								
							</form>
							
						</div>
						
					</div>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/custom.js"></script>
	</body>
	
</html>