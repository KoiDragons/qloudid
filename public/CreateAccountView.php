
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnew.css" />
	 <link href="<?php echo $path;?>html/kincss/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $path;?>html/kincss/css/menu.css" rel="stylesheet">
    <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
	<link href="<?php echo $path;?>html/kincss/css/vendors.css" rel="stylesheet">
	
    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo $path;?>html/kincss/css/custom.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		
		<script type="text/javascript" async src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
			<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		<script>
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
			var langVar='<?php echo $verifyLanguage; ?>';
			
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
   
function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
	function submitForm()
	{
	document.getElementById("newForm").submit();	
	}
			
			function validateForm()
			{
				
				var submitForm = true;
				$("#error_msg_form").html('');
				
				
				if(!checkEmail("email"))
				{
					submitForm = false;
					return false;
				}
				var send_data={};
				send_data.email=$("#email").val();
				$.ajax({
					type:"POST",
					url:"CreateAccount/checkmail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						 
						if(data1==0)
						{
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_connect").style.display='block';
							$(".gratis_popup_connect").addClass('active');
							$("#connect_id").html('');
							$("#connect_id").html('Registration is not possible with given email address.');
							return false;
						}
						else if(data1==1)
						{
							if(document.getElementById("fname").value == "")
							{
								submitForm = false;
								document.getElementById("popup_fade").style.display='block';
								$("#popup_fade").addClass('active');
								document.getElementById("person_informed").style.display='block';
								$(".person_informed").addClass('active');
								
								document.getElementById("fname").focus();
								return false;
							} 
							
							if(document.getElementById("lname").value == "")
							{
								submitForm = false;
								document.getElementById("popup_fade").style.display='block';
								$("#popup_fade").addClass('active');
								document.getElementById("person_informed_lname").style.display='block';
								$(".person_informed_lname").addClass('active');
								
								document.getElementById("lname").focus();
								return false;
							}
							if(document.getElementById("cntry").value == "0")
							{
								submitForm = false;
								document.getElementById("popup_fade").style.display='block';
								$("#popup_fade").addClass('active');
								document.getElementById("person_informed1").style.display='block';
								$(".person_informed1").addClass('active');
								document.getElementById("cntry").focus();
								return false;
							}
							if(!document.getElementById("terms").checked)
							{
								//submitForm = false;
								/*document.getElementById("popup_fade").style.display='block';
								$("#popup_fade").addClass('active');
								document.getElementById("person_informed3").style.display='block';
								$(".person_informed3").addClass('active');*/
								
								//document.getElementById("terms").focus();
								//return false;
							}         
							if(submitForm)
							{
								document.getElementById("form").submit();
								//return true;
							}
							else{
								return false;
							}
						}
						else
						{
							var send_data={};
				send_data.email=$("#email").val();
				$.ajax({
					type:"POST",
					url:"CreateAccount/getDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						$('#loginBank').addClass('hidden');
						$('#loginBank1').removeClass('hidden');
						$("#oemail").val(send_data.email);
						$('#userName').html(data1);
					}
					});
						}
					
					}
				});
				
				
				
				
				
				
			}
			
			function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					document.getElementById("popup_fade").style.display='block';
					$("#popup_fade").addClass('active');
					document.getElementById("person_informed_email").style.display='block';
					$(".person_informed_email").addClass('active');
					
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}
			
			function checkFlag()
			{
				if($(".popupShow").hasClass('active'))
				{
					$(".popupShow").removeClass('active');
					$(".popupShow").attr('style','display:none');
				}
				
			}
			function togglePopup()
			{
				if($(".popupShow").hasClass('active'))
				{
					$(".popupShow").removeClass('active');
					$(".popupShow").attr('style','display:none');
				}
				else
				{
					$(".popupShow").addClass('active');
					$(".popupShow").attr('style','display:block');
				}
			}
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
</script>	
	
</head>

<body>
	<?php $path1 = $path."html/usercontent/images/"; ?>
	<div class="column_m header xs-header xsip-header xsi-header bs_bb lgtgrey_bg">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey_bg">
				<div class="logo padt10 wi_50p xs-wi_50p"><a href="#"><img src="<?php echo $path; ?>html/usercontent/images/favicon-32x32.png" alt="Qmatchup" title="Bisswise" height="32" width="32"></a></div>
				
				<div class="visible-xs visible-sm fleft padl10">
							<div class="flag_top_menu flefti  padb10 padt10  xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="45" height="45" alt="email" title="email" class="lang_selector" data-value="sv" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="45" height="45" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													
													
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/germanf.png" width="45" height="45" alt="email" title="email"class="lang_selector" data-value="de" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
                  <li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"data-value="sv" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/germanf.png" width="28" height="28" alt="email" title="email"data-value="de" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German </a> </div>
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
			<div class="fright visible-xs visible-sm padt10 padb10 <?php if(isset($_POST['qard_employee'])) echo 'hidden'; ?>">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock  fleft pos_rel brd2 brdclr_black brdrad5 marl20 "> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25 black_txt black_txt_h" data-en="Login" data-sw="Login"  >Login</a> </li>
						
					</ul>
				</div>
			<div class="hidden-xs hidden-xsi fright marr0 padr0 padt10  brdwi_3"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz14 black_txt">Login</a> </div>
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
	
	
	 
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad0 mart0 xs-pad0">
					 
						<div class="padb0 xxs-padb0 mart40">		
							
									<h1 class="marb0   xxs-talc talc fsz45 xxs-fsz30 bold padb0 black_txt trn"  >Create account</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Tänk på att använda din personliga email address. Använd inte företagets email address.</a></div>
										 
							
									
						<form action="CreateAccount/createAccount" method="POST" id="form" name="form" accept-charset="ISO-8859-1">		
									 
									<div class="on_clmn mart10 xxs-mart10">
											
										<div class="pos_rel">
											<select class="input1 minhei_65p fsz16 nobrd brdb trans_bg nobold dropdown-bg  llgrey_txt tall padl0" name="cntry" id="cntry" style="text-align-last:center;">
											<option value="0" class="lgtgrey2_bg">Select country</option>
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>                            
											</select>
											</div>
									</div>
									<div class="on_clmn mart10 xxs-mart10">
								<div class="thr_clmn   wi_50 padr10">				
				<div class="pos_rel">
				<input type="text" name="fname" id="fname" placeholder="First name" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" /> </div>
				</div>	  
				 
							<div class="thr_clmn   wi_50 padl10">				
				<div class="pos_rel">
				<input type="text" name="lname" id="lname" placeholder="Last name" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" /> </div>
				</div>	  
				</div>	
									<div class="on_clmn mart10 xxs-mart10">
												
				<div class="pos_rel">
				<input type="text" name="email" id="email" placeholder="du@epostadress.se" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" /> </div>
				</div>
								
									
									<div class="on_clmn mart10 xxs-mart10 marb25">
				<div class="pos_rel">
				<label class="dblock fsz12 fleft">
				<input type="checkbox" name="terms" id="terms" /> <span class="marl5 fsz16 xs-fsz16 valm trn">Please accept our</span> <a href="#" class="show_popup_modal trn fsz16" data-target="#terms-txt">terms and conditions</a> </label>
				</div>
				 
				</div>
						</form>
					<div class="talc  padt20"><a href="#" onclick="validateForm();"><input type="button" value="Logga in" class="forword button_bg_color minhei_55p"  /></a>
									 
									
									</div>						
							 
							</div>
								</div>
							 
	 
		
	</div>
				<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 hidden" id="loginBank1" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad0 mart0 xs-pad0">
					 
						<div class="padb0 xxs-padb0 mart40">		
							
									<h1 class="marb0   xxs-talc talc fsz45 xxs-fsz30 bold padb0 black_txt trn"  >Hi! <span id="userName"></span></h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >We have an account with given email address. To continue with your sign up process please click the button below.</a></div>
										 
							
									
						<form action="CreateAccount/resumeSignup" method="POST" id="newForm" name="newForm" accept-charset="ISO-8859-1">		
										<div class="on_clmn mart10 xxs-mart10 hidden">
												
				<div class="pos_rel">
				<input type="text" name="oemail" id="oemail" placeholder="du@epostadress.se" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" /> </div>
				</div>
								
									
									 
						 	</div>	
								
						</form>
					<div class="talc  padt20"><a href="#" onclick="submitForm();"><input type="button" value="Continue" class="forword button_bg_color minhei_55p"  /></a>
									 
									
									</div>						
							 
							</div>
								</div>
						
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	<div class="popup_modal wi_550p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10" id="terms-txt" >
		<div class="">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close close_popup_modal" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1 close_popup_modal" data-dismiss="modal">Close</button>
				</div>
			</div>
			 
		</div>
		 </div>
	 <!-- /.modal -->
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
	
		
		<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="person_informed3">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" >Du måste....</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16" >	Please select terms and conditions. </span>
				</div>
				
				
			</div>
			
			<div class="on_clmn padt20">
				<button type="button"  class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp trn">Close</button>
				
			</div>
	</div>
	
	</div>
		
		<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="person_informed1">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" >Du måste....</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 trn" >Please select country of residence </span>
				</div>
				
				
			</div>
			
			<div class="on_clmn padt20">
				<button type="button"  class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp trn">Close</button>
				
			</div>
	</div>
	
	</div>
		
		<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="person_informed">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" >Du måste....</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 trn" >Please enter first name</span>
				</div>
				
				
			</div>
			
				<div class="on_clmn padt20">
				<button type="button"  class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp trn">Close</button>
				
			</div>
	</div>
	
	</div>
	
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="person_informed_lname">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" >Du måste....</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 trn" >Please enter last name</span>
				</div>
				
				
			</div>
			
				<div class="on_clmn padt20">
				<button type="button"  class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp trn">Close</button>
				
			</div>
	</div>
	
	</div>
	
	
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="person_informed_email">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" >Du måste....</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 trn" >Please add a valid email address</span>
				</div>
				
				
			</div>
			
				<div class="on_clmn padt20">
				<button type="button"  class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp trn">Close</button>
				
			</div>
	</div>
	
	</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
		</div>
	</div>
		
	 
<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
	
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/createAccount.js"></script>
</body>
</html>