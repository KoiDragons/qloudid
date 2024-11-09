<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
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
			
		
		
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
			
			function changeClass(link)
				{
					
					$(".class-toggler").removeClass('active');
					$(link).addClass('active');
				}
				
			function openPop()
			{
			$("#popup_fade").addClass('active');
			$("#popup_fade").attr('style','display:block');
			$("#gratis_alert").addClass('active');
			$("#gratis_alert").attr('style','display:block');
			}
			function closePop()
			{
			$("#popup_fade").removeClass('active');
			$("#popup_fade").attr('style','display:none');
			$("#gratis_alert").removeClass('active');
			$("#gratis_alert").attr('style','display:none');
			}	
				
		</script>
		
		<script>
			
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
			
			function searchUser()
			{
				
				if($("#reque").val()==1)
				{
					
					if($("#code_id").val()=="")
					{
						$("#errorMsg").html('Personal number can not be blank');
						return false;
					}
					if(isNaN($("#code_id").val())) 
					{
						$("#errorMsg").html('Personal number must be a numeric value');
						return false;
					}
					if($("#code_id").val().length < 12 || $("#code_id").val().length > 12) 
					{
						$("#errorMsg").html('Personal number must be 12 digit numeric value');
						return false;
					}
					
					if($("#phone_no").val()=="")
				{
					$("#errorMsg").html('Phone number can not be blank');
					return false;
				}
				if(isNaN($("#phone_no").val())) 
				{
					$("#errorMsg").html('Phone number must be a numeric value');
					return false;
				}
				
					
					
					var send_data={};
					send_data.pnumber=$("#code_id").val();
					send_data.cnrty=$("#country").val();
					send_data.phone=$("#phone_no").val();
					$.ajax({
						type:"POST",
						url:"../searchUserDetail/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
							if(data1)
							{
								window.location.href ="https://www.safeqloud.com/user/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>";
							}
							
						}
					});
					
					
				}
				
				else
				{
					alert("Please select code!!!");
					return false;
				}
				
				
			}
			
			
			
		</script>
		
		
		
	</head>
	
	<?php $path1 = $path."html/usercontent/images/"; ?>
	
	<body class="white_bg " id="bodyBg">
	
		
		<!-- LOGIN FORM -->
		<div class="column_m xs-padb10 talc lgn_hight_22 fsz16" id="loginBank" onclick="checkFlag();">
			<div class="dflex xs-dblock justc_fe pos_rel padb40 xs-pad0" onclick="checkFlag();">
				<div class="wi_100 hei_100 pos_abs xs-pos_sta zi1 top0 left0 bgir_norep bgip_c bgis_cov" style="background-image: url(<?php echo $path; ?>html/usercontent/images/bg/9B.jpg);">
					<img src="<?php echo $path; ?>html/usercontent/images/bg/9B.jpg" class="wi_100 hei_auto hide xs-dblock">
				</div>
				<div class="wi_30 xs-wi_100 pos_rel zi5 white_txt right30">
								
								
								<div class="pos_rel padrbl30 xs-padrl20 xs-darkgrey_txt">
						<div class="wi_100 hei_100 xs-dnone opa60 pos_abs zi1 top0 left0 blue_bg"></div>
						<div class="maxwi_400p pos_rel zi5">	
							<h4 class="bold fsz40 xs-fsz22 padb10 tall lgn_hight_40 hidden-xs padt100">ID kontroll med BankID</h4>
							<h3 class="fsz25 xs-fsz20 padt0 padb10 tall hidden-xs brdb_new">Skicka länk till kund och be hen att verifiera sin id-handlingen med BankID. </h3>
							<div class="marb0 padrl0 first">
									
									
									<div class="on_clmn padtb0">
										
										
										
										
										
										<div class="on_clmn mart0">
											
											<select name="reque" id="reque" class="wi_100 default_view white_bg rbrdr pad10 mart20 hei_50p llgrey_txt fsz18 brdb brdrad5" onchange="selectCode(this.value);">
												
												<option value="1">Via personnummer</option>
											</select>
										</div>
										<div id="codeSelect" style="display: block;">
										<div class="on_clmn mart10">
											
											<input type="text" name="code_id" id="code_id" placeholder="Mottagarens personnummer" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 white_bg brdrad5">
											
											
										</div>
										<div class="on_clmn martb10">
											<div class="on_clmn">
											<div class="thr_clmn wi_50">
											<div class="pos_rel">
											<select name="country" id="country" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 white_bg brdrad5">
																	<?php foreach($selectCountry as $category => $value) { ?>
												<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'selected'; ?>><?php echo $value['country_name']; ?></option>
												<?php } ?>						
																							</select>
											</div>
											</div>
											<div class="thr_clmn padl10  wi_50">
											<div class="pos_rel">
											<input type="text" name="phone_no" id="phone_no" placeholder="phone number" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 white_bg brdrad5">
											
											</div>
											</div>
											</div>
										</div>
									
										</div>
										<div id="errorMsg" class="red_txt"></div>
										<div class="clear"></div>
									</div>
									
									
									
									
									<div class="clear"></div>
																		<div class="padb10 xs-padrl0 mart10" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn  fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="searchUser();">Skicka förfrågan (4) </a> </div>
									
																	</div>

						</div>
						
					</div>
				</div>
			</div>
			
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		<div class=" dflex justc_sb alit_c padtb10 padrl40 brdt lgn_hight_34 fsz14 txt_787e89 white_bg footer "  >
					<div>
						<img src="<?php echo $path; ?>html/usercontent/images/map-pointer.svg" width="23" height="33" class="marr10 valm">
						<span class="val">
		            		<b>Qloud ID | </b><span class="hidden-xs"> Zum Quellenpark 33, Bad Soden </span>
		        		</span>
					</div>
					<a href="#" class="show_popup_modal black_txt" data-target="#om_mina"><span>Om din data</span></a>
				</div>
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_connect  brdrad5"  id="gratis_popup_connect">
			<div class="modal-content pad25  brdrad5 ">
				<div id="connect_id">
					
					
				</div>
			</div>
			
		</div>
		
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_user">
			<div class="modal-content pad25 brd brdrad10">
				<div id="search_user">
					<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
						No result found
						<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
					</h3>
					
					
					
					
					
					
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
		
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_alert">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			<div class="marb20">
				<img src="../../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">You don't have credit to initiate a connect request.</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Please recharge your account</span>
				</div>
				
				
			</div>
			
			
			
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Add Credits" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp " >
					<input type="button" value="Cancel" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd trans_bg fsz18 black_txt curp close_popup_modal" onclick="closePop();">
			</div>
			
			
		</div>
	</div>
	
	
		
		<div class="clear"></div>
		<script type="text/javascript" src="../../html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="../../html/usercontent/modules.js"></script>
		<script type="text/javascript" src="../../html/usercontent/js/custom.js"></script>
		
		
		
		
	</body>
</html>																			