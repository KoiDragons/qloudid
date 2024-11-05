<!doctype html>
<html>
	<?php
		$path1 = "../../html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
	if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; ?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			
			
			function submit_value()
			{
				
				var send_data={};
				
				send_data.total_value=$("#total_value").val();
				$.ajax({
					type:"POST",
					url:"../searchCompanyDetail/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						$("#keep-selected").removeClass('active');
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched").html('');
						$("#searched").append(data1);
						
					}
				});
				
			}
			
			function submit_value_company()
			{
				document.getElementById("save_indexing").submit();
				/*var send_data={};
				
				send_data.total_value=$("#total_value").val();
				$.ajax({
					type:"POST",
					url:"../searchCompanyCountry/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1==0)
						{
					document.getElementById("gratis_popup_company_searched").style.display='none';
							$(".gratis_popup_company_searched").removeClass('active');
							document.getElementById("popup_fade").style.display='block';
							$(".popup_fade").addClass('active');
							document.getElementById("gratis_popup_company_error").style.display='block';
							$("#gratis_popup_company_error").addClass('active');
							
						}
						else
						{
							document.getElementById("save_indexing").submit();
						}
					}
				});*/
				
			}
			
			
			var keepGlobal=0;
			var send_data = {};
			send_data.general=0;
			send_data.va=0;
			send_data.bypost=0;
			send_data.byphone=0;
			send_data.fors=0;
			send_data.forc=0;
			var countries_flags = {
				'United States' : '../../../html/usercontent/images/flags/us.png',
				'Canada' : '../../../html/usercontent/images/flags/cd.png',
				'Turkey' : '../../../html/usercontent/images/flags/tr.png',
				'Sweden' : '../../../html/usercontent/images/slide/flag_sw.png',
			};
			var countries_codes = {"Abkhazia" : "+7 840 ","Afghanistan" : "+93 ","Albania" : "+355 ","Algeria" : "+213 ","American Samoa" : "+1 684 ","Andorra" : "+376 ","Angola" : "+244 ","Anguilla" : "+1 264 ","Antigua and Barbuda" : "+1 268 ","Argentina" : "+54 ","Armenia" : "+374 ","Aruba" : "+297 ","Ascension" : "+247 ","Australia" : "+61 ","Australian External Territories" : "+672 ","Austria" : "+43 ","Azerbaijan" : "+994 ","Bahamas" : "+1 242 ","Bahrain" : "+973 ","Bangladesh" : "+880 ","Barbados" : "+1 246 ","Barbuda" : "+1 268 ","Belarus" : "+375 ","Belgium" : "+32 ","Belize" : "+501 ","Benin" : "+229 ","Bermuda" : "+1 441 ","Bhutan" : "+975 ","Bolivia" : "+591 ","Bosnia and Herzegovina" : "+387 ","Botswana" : "+267 ","Brazil" : "+55 ","British Indian Ocean Territory" : "+246 ","British Virgin Islands" : "+1 284 ","Brunei" : "+673 ","Bulgaria" : "+359 ","Burkina Faso" : "+226 ","Burundi" : "+257 ","Cambodia" : "+855 ","Cameroon" : "+237 ","Canada" : "+1 ","Cape Verde" : "+238 ","Cayman Islands" : "+ 345 ","Central African Republic" : "+236 ","Chad" : "+235 ","Chile" : "+56 ","China" : "+86 ","Christmas Island" : "+61 ","Cocos-Keeling Islands" : "+61 ","Colombia" : "+57 ","Comoros" : "+269 ","Congo" : "+242 ","Congo, Dem. Rep. of (Zaire)" : "+243 ","Cook Islands" : "+682 ","Costa Rica" : "+506 ","Croatia" : "+385 ","Cuba" : "+53 ","Curacao" : "+599 ","Cyprus" : "+537 ","Czech Republic" : "+420 ","Denmark" : "+45 ","Diego Garcia" : "+246 ","Djibouti" : "+253 ","Dominica" : "+1 767 ","Dominican Republic" : "+1 809 ","East Timor" : "+670 ","Easter Island" : "+56 ","Ecuador" : "+593 ","Egypt" : "+20 ","El Salvador" : "+503 ","Equatorial Guinea" : "+240 ","Eritrea" : "+291 ","Estonia" : "+372 ","Ethiopia" : "+251 ","Falkland Islands" : "+500 ","Faroe Islands" : "+298 ","Fiji" : "+679 ","Finland" : "+358 ","France" : "+33 ","French Antilles" : "+596 ","French Guiana" : "+594 ","French Polynesia" : "+689 ","Gabon" : "+241 ","Gambia" : "+220 ","Georgia" : "+995 ","Germany" : "+49 ","Ghana" : "+233 ","Gibraltar" : "+350 ","Greece" : "+30 ","Greenland" : "+299 ","Grenada" : "+1 473 ","Guadeloupe" : "+590 ","Guam" : "+1 671 ","Guatemala" : "+502 ","Guinea" : "+224 ","Guinea-Bissau" : "+245 ","Guyana" : "+595 ","Haiti" : "+509 ","Honduras" : "+504 ","Hong Kong SAR China" : "+852 ","Hungary" : "+36 ","Iceland" : "+354 ","India" : "+91 ","Indonesia" : "+62 ","Iran" : "+98 ","Iraq" : "+964 ","Ireland" : "+353 ","Israel" : "+972 ","Italy" : "+39 ","Ivory Coast" : "+225 ","Jamaica" : "+1 876 ","Japan" : "+81 ","Jordan" : "+962 ","Kazakhstan" : "+7 7 ","Kenya" : "+254 ","Kiribati" : "+686 ","Kuwait" : "+965 ","Kyrgyzstan" : "+996 ","Laos" : "+856 ","Latvia" : "+371 ","Lebanon" : "+961 ","Lesotho" : "+266 ","Liberia" : "+231 ","Libya" : "+218 ","Liechtenstein" : "+423 ","Lithuania" : "+370 ","Luxembourg" : "+352 ","Macau SAR China" : "+853 ","Macedonia" : "+389 ","Madagascar" : "+261 ","Malawi" : "+265 ","Malaysia" : "+60 ","Maldives" : "+960 ","Mali" : "+223 ","Malta" : "+356 ","Marshall Islands" : "+692 ","Martinique" : "+596 ","Mauritania" : "+222 ","Mauritius" : "+230 ","Mayotte" : "+262 ","Mexico" : "+52 ","Micronesia" : "+691 ","Midway Island" : "+1 808 ","Moldova" : "+373 ","Monaco" : "+377 ","Mongolia" : "+976 ","Montenegro" : "+382 ","Montserrat" : "+1664 ","Morocco" : "+212 ","Myanmar" : "+95 ","Namibia" : "+264 ","Nauru" : "+674 ","Nepal" : "+977 ","Netherlands" : "+31 ","Netherlands Antilles" : "+599 ","Nevis" : "+1 869 ","New Caledonia" : "+687 ","New Zealand" : "+64 ","Nicaragua" : "+505 ","Niger" : "+227 ","Nigeria" : "+234 ","Niue" : "+683 ","Norfolk Island" : "+672 ","North Korea" : "+850 ","Northern Mariana Islands" : "+1 670 ","Norway" : "+47 ","Oman" : "+968 ","Pakistan" : "+92 ","Palau" : "+680 ","Palestinian Territory" : "+970 ","Panama" : "+507 ","Papua New Guinea" : "+675 ","Paraguay" : "+595 ","Peru" : "+51 ","Philippines" : "+63 ","Poland" : "+48 ","Portugal" : "+351 ","Puerto Rico" : "+1 787 ","Qatar" : "+974 ","Reunion" : "+262 ","Romania" : "+40 ","Russia" : "+7 ","Rwanda" : "+250 ","Samoa" : "+685 ","San Marino" : "+378 ","Saudi Arabia" : "+966 ","Senegal" : "+221 ","Serbia" : "+381 ","Seychelles" : "+248 ","Sierra Leone" : "+232 ","Singapore" : "+65 ","Slovakia" : "+421 ","Slovenia" : "+386 ","Solomon Islands" : "+677 ","South Africa" : "+27 ","South Georgia and the South Sandwich Islands" : "+500 ","South Korea" : "+82 ","Spain" : "+34 ","Sri Lanka" : "+94 ","Sudan" : "+249 ","Suriname" : "+597 ","Swaziland" : "+268 ","Sweden" : "+46 ","Switzerland" : "+41 ","Syria" : "+963 ","Taiwan" : "+886 ","Tajikistan" : "+992 ","Tanzania" : "+255 ","Thailand" : "+66 ","Timor Leste" : "+670 ","Togo" : "+228 ","Tokelau" : "+690 ","Tonga" : "+676 ","Trinidad and Tobago" : "+1 868 ","Tunisia" : "+216 ","Turkey" : "+90 ","Turkmenistan" : "+993 ","Turks and Caicos Islands" : "+1 649 ","Tuvalu" : "+688 ","U.S. Virgin Islands" : "+1 340 ","Uganda" : "+256 ","Ukraine" : "+380 ","United Arab Emirates" : "+971 ","United Kingdom" : "+44 ","United States" : "+1 ","Uruguay" : "+598 ","Uzbekistan" : "+998 ","Vanuatu" : "+678 ","Venezuela" : "+58 ","Vietnam" : "+84 ","Wake Island" : "+1 808 ","Wallis and Futuna" : "+681 ","Yemen" : "+967 ","Zambia" : "+260 ","Zanzibar" : "+255 ","Zimbabwe" : "+263 "}
			
			function add_phone_country(){
				var country = $('#passport-country').val().trim(),
				url = '',
				code = '';
				
				try{url = countries_flags[country];}
				catch(e){}
				
				var $phone = $('#phone-country-flag');
				if(url){
					$phone.html('<img src="' + url + '" style="width: auto; height: 18px; display: block;" />');
					} else{
					$phone.html('<img src="<?php echo $path;?>html/usercontent/images/flags/default.png" style="width: auto; height: 18px; display: block;" />');
				}
				
				try{code = countries_codes[country];}
				catch(e){}
				
				var $code = $('#phone-country');
				if(code){
					$code.html(code);
					} else{
					$phone.html('');
				}
			}
			
			function checkData()
			{
				
				$("#keep-selected").addClass("active");
				keepGlobal=keepGlobal+1;
				$("#keep-selected-count").text(keepGlobal);
				send_data.general=send_data.general+1;
				send_data.ssn=$(".ssn").text();
				send_data.name=$(".name").text();
				send_data.l_name=$("#l_name").val();
				send_data.dob=$(".dob").text();
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				/*$.ajax({
					url: '../updateData/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
					})
					.done(function(data){
					})
					.fail(function(){})
				.always(function(){});*/
			}
			
			function checkDataBank()
			{
				
				$("#keep-selected").addClass("active");
				keepGlobal=keepGlobal+1;
				$("#keep-selected-count").text(keepGlobal);
				send_data.forc=send_data.forc+1;
				send_data.bankgiro_med=$(".bankgiro_med").text();
				send_data.bankgiro_utan=$(".bankgiro_utan").text();
				send_data.iban=$(".iban").text();
				send_data.bic=$(".bic").text();
				send_data.bank=$(".bank").text();
				send_data.ftax=$(".ftax").text();
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				/*$.ajax({
					url: '../updateDataBank/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
					})
					.done(function(data){
					})
					.fail(function(){})
				.always(function(){});*/
			}
			
			
			function checkDataPhone()
			{
				
				$("#keep-selected").addClass("active");
				keepGlobal=keepGlobal+1;
				$("#keep-selected-count").text(keepGlobal);
				send_data.byphone=send_data.byphone+1;
				send_data.phone=$(".phone").text();
				send_data.c_phone=$("#passport-country").val();
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				
				/*	$.ajax({
					url: '../updateDataPhone/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
					})
					.done(function(data){
					})
					.fail(function(){})
				.always(function(){});*/
			}
			
			function checkDataPost()
			{
				
				$("#keep-selected").addClass("active");
				keepGlobal=keepGlobal+1;
				$("#keep-selected-count").text(keepGlobal);
				send_data.va=send_data.va+1;
				send_data.addrs=$(".addrs").text();
				send_data.zip=$(".zip").text();
				send_data.city=$(".city").text();
				send_data.cntry=$("#cntry").val();
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				/*$.ajax({
					url: '../updateDataPost/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
					})
					.done(function(data){
					})
					.fail(function(){})
				.always(function(){});*/
			}
			
			function checkDataPostSuppliear()
			{
				
				$("#keep-selected").addClass("active");
				keepGlobal=keepGlobal+1;
				$("#keep-selected-count").text(keepGlobal);
				send_data.fors=send_data.fors+1;
				send_data.addrssi=$(".addrssi").text();
				send_data.zipsi=$(".zipsi").text();
				send_data.citysi=$(".citysi").text();
				send_data.cntrysi=$("#cntrysi").val();
				send_data.addrssd=$(".addrssd").text();
				send_data.zipsd=$(".zipsd").text();
				send_data.citysd=$(".citysd").text();
				send_data.cntrysd=$("#cntrysd").val();
				send_data.vat=$(".vat").text();
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				/*$.ajax({
					url: '../updateDataPostSupplier/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
					})
					.done(function(data){
					})
					.fail(function(){})
				.always(function(){});*/
			}
			function checkDataPostNew()
			{
				
				$("#keep-selected").addClass("active");
				keepGlobal=keepGlobal+1;
				$("#keep-selected-count").text(keepGlobal);
				send_data.bypost=send_data.bypost+1;
				send_data.addrs1=$(".addrs1").text();
				send_data.zip1=$(".zip1").text();
				send_data.city1=$(".city1").text();
				send_data.cntry1=$("#cntry1").val();
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				/*$.ajax({
					url: '../updateDataPostNew/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
					})
					.done(function(data){
					})
					.fail(function(){})
				.always(function(){});*/
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
			function imageUpdate()
			{
				
				
				var bg_url = $('#image-data').css('background-image');
				//alert(bg_url);
				if(bg_url=="" || bg_url==null || bg_url=="none")
				{
					alert("please select image");
					return false;
				}
				else
				{
					$('#image-data1').val(bg_url);
					//alert($('#image-data1').val());
				}
				document.getElementById("save_image").submit();
			}
			
			function imageUpdate()
			{
				
				
				var bg_url = $('#image-data').css('background-image');
				//alert(bg_url);
				if(bg_url=="" || bg_url==null || bg_url=="none")
				{
					alert("please select image");
					return false;
				}
				else
				{
					$('#image-data1').val(bg_url);
					//alert($('#image-data1').val());
				}
				document.getElementById("save_image").submit();
			}
		</script>
	</head>
	
	<body class="lgtgrey2_bg">
		
		<!-- HEADER -->
		<?php include 'CompanyHeaderUpdated.php'; ?><div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel">
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<!-- Center content -->
					<div class="wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  xs-pad0  ">
						
						<div class="padb10 ">
							<h1 class="padb5 tall fsz45 xs-fsz25 bold ">FÖRETAGETS GRUNDUPPGIFTER</h1>
							<p class="pad0 xs-padb20 tall fsz18 xs-fsz16 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Nedan finns företagets uppgifter. Ändringar på dessa uppgifter kan endast träda i kraft efter signering med BankID från beslutsfattare. </p>
						</div>
						
						<div class=" mart10 xs-marrl0 sm-marrl0 ">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">Din bild &amp; grunduppgifter</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown1,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown1" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" white_bg   brdrad3 xs-nobrd" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt brdb_new">
								
								<!--<form method="POST" action="../../VerifyCompany/domainAccount/<?php echo $data['cid']; ?>" id="save_indexing" name="save_indexing" >-->
								<input type="hidden" id="total_value" name="total_value" value='' />
								<!--</form>-->
								
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<div class="wi_30 xs-order_1 xs-wi_100">
										<form method="POST" action="../updateImage/<?php echo $data['cid']; ?>" id="save_image" name="save_image" >
											<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
												<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
												
												
												<div class="imgwrap nobrd">
													<div class="cropped_image <?php if($companyDetail ['profile_pic']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" id="image-data" name="image-data"></div>
													<div class="subimg_load">
														<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
													</div>
												</div>
											</div>
										</form>
										<div class="hidden-xs mart10 talc fsz16 "> <a href="#" class="dblue_btn trn brdrad3" onclick="imageUpdate();">Refresh</a> </div>
									</div>
									
									<div class="wi_70 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="wi_75 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Organisation nr">Organisation nr</span> <span class="txtind10 editable lgn_hight_50 hei_50p  edit-text ssn dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg "><?php if($companyDetail['cid']!="" || $companyDetail['cid']!= null) echo $companyDetail['cid']; else echo "-"; ?></span> </div>
										<div class="wi_75 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10 "> <span class="trn" data-trn-key="Företagsnamn">Företagsnamn</span> <span class="txtind10 editable lgn_hight_50 hei_50p  edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  name"><?php echo $companyDetail['company_name']; ?></span> </div>
										
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Industri</span> <select class="txtind10 editable lgn_hight_50 hei_50p  edit-select dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  l_name wi_100" id="l_name"  >
											<option value="1">Sales</option>
											<?php foreach($industryOpt as $category => $value)
												
												{
												?>
												<option value="<?php echo $value['id']; ?>" <?php if($companyDetail['industry']!="" || $companyDetail['industry']!= null) { if($companyDetail['industry']== $value['id'] ) echo 'selected'; } ?>><?php echo $value['name']; ?></option>
											<?php } ?>
											
										</select> </div>
										<div class="container marrl-2 padl15 xs-padl0 ">
											<div class="fleft wi_25 xs-wi_100 sm-wi_50 bs_bb padrl2 "> <span class="trn" data-trn-key="Skapad">Skapad</span> <span class="txtind10 editable lgn_hight_50 hei_50p  edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz20 lgtgrey2_bg  dob"><?php if($companyDetail['founded']!="" || $companyDetail['founded']!= null) echo $companyDetail['founded']; else echo "-"; ?></span> </div>
											
											<div class="fleft wi_25  xs-wi_100 bs_bb padrl2 marl15 xs-marl0 xs-padl0"> <span>Land</span> <select class="txtind10 editable lgn_hight_50 hei_50p  edit-select cntry dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg wi_100"  disabled="true">
												
												<option value="">Select</option>
												<?php foreach($countryOpt as $category => $value ) {
												?>
												
												<option value="<?php echo $value['id']; ?>" <?php if($companyDetail['country_id']==$value['id']) echo 'selected';?> ><?php echo $value['country_name']; ?></option>
												
												<?php } ?>
												
												
											</select> </div>
										</div>
										
										
										
										
										
										<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
										<!-- <div class="clear hidden-xs"></div>-->
									</div>
									
								</div>
								<div class=" mart20 talc fsz16  " onclick="checkData();"> <a href="#" class="dblue_btn trn brdrad3" >Uppdatera </a> </div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" mart30 xs-marrl0 sm-marrl0 hidden-xs ">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">Besöksadress</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown2,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown2" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" white_bg   brdrad3 xs-nobrd" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt ">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12 padb10 ">
										<div class="container marrl-2  xs-padl0">
											<div class="fleft wi_50 xs-wi_100 sm-wi_50 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Adress">Adress</span> <span class="editable lgn_hight_50 hei_50p  edit-address dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  addrs"><?php if($companyDetail['address']!="" || $companyDetail['address']!= null) echo $companyDetail['address']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 xs-padrl2 padb10"> <span class="trn" data-trn-key="Post nr">Post nr</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  zip"><?php if($companyDetail['zip']!="" || $companyDetail['zip']!= null) echo $companyDetail['zip']; else echo "-"; ?></span> </div>
											<div class="fleft wi_50 xs-wi_50 sm-wi_100 marl15 xs-mar0 xs-padrl2 "> <span class="trn" data-trn-key="Stad">Stad</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  city"><?php if($companyDetail['city']!="" || $companyDetail['city']!= null) echo $companyDetail['city']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25  xs-wi_100 bs_bb padrl2 marl15 xs-marl0 xs-padl0"> <span>Land</span> <select class="editable lgn_hight_50 hei_50p  edit-select cntry dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg wi_100" id="cntry">
												
												<option value="">Select</option>
												<?php foreach($countryOpt as $category => $value ) {
												?>
												
												<option value="<?php echo $value['country_name']; ?>" <?php if($companyDetail['country']==$value['country_name']) echo 'selected';?> ><?php echo $value['country_name']; ?></option>
												
												<?php } ?>
												
												
											</select> </div>
											
										</div>
										
									</div>
									
									
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								<div class=" mart20 talc fsz16  " onclick="checkDataPost();"> <a href="#" class="dblue_btn trn brdrad3" >Uppdatera </a> </div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" mart30 xs-marrl0 sm-marrl0 hidden-xs">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">Ditt post</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown3,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown3" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" white_bg   brdrad3 xs-nobrd" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt brdb_new">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12 padb10 ">
										<div class="container marrl-2  xs-padl0">
											<div class="fleft wi_50 xs-wi_100 sm-wi_50 marl15 xs-mar0 "> <span class="trn" data-trn-key="Adress">Adress</span> <span class="editable lgn_hight_50 hei_50p  edit-address dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  addrs1"><?php if($companyDetail['delivery_address']!="" || $companyDetail['delivery_address']!= null) echo $companyDetail['delivery_address']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0  xs-padrl2"> <span class="trn" data-trn-key="Post nr">Post nr</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  zip1"><?php if($companyDetail['d_zip']!="" || $companyDetail['d_zip']!= null) echo $companyDetail['d_zip']; else echo "-"; ?></span> </div>
											<div class="fleft wi_50 xs-wi_50 sm-wi_100 marl15 xs-mar0  xs-padrl2"> <span class="trn" data-trn-key="Stad">Stad</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  city1"><?php if($companyDetail['d_city']!="" || $companyDetail['d_city']!= null) echo $companyDetail['d_city']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_100 bs_bb padrl2 marl15 xs-marl0 xs-padl0"> <span>Land</span> <select class="editable lgn_hight_50 hei_50p  edit-select cntry1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg wi_100"  id="cntry1">
												
												<option value="">Select</option>
												<?php foreach($countryOpt as $category => $value ) {
												?>
												
												<option value="<?php echo $value['country_name']; ?>" <?php if($companyDetail['d_country']==$value['country_name']) echo 'selected';?> ><?php echo $value['country_name']; ?></option>
												
												<?php } ?>
												
												
											</select> </div>
											
											
										</div>
										
									</div>
									
									
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								<div class=" mart20 talc fsz16  " onclick="checkDataPostNew();"> <a href="#" class="dblue_btn trn brdrad3" >Uppdatera </a> </div>
								<div class="clear"></div>
							</div>
						</div>		
						
						<div class=" mart30 xs-marrl0 sm-marrl0 hidden-xs">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">Ditt telefon nummer</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown4,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown4" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" white_bg   brdrad3 xs-nobrd" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt brdb_new">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall  padl15 xs-padl0">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="fleft wi_33 xs-wi_100 bs_bb padrl2 xs-padb10"> <span>Land</span> <select class="editable lgn_hight_50 hei_50p  edit-select jain1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  c_phone wi_100" data-post-action="add_phone_country" id="passport-country">
										
										<option value="">Select</option>
										<?php foreach($countryOpt as $category => $value ) {
										?>
										
										<option value="<?php echo $value['country_name']; ?>" <?php if($companyDetail['phone_country']==$value['country_name']) echo 'selected';?> ><?php echo $value['country_name']; ?></option>
										
										<?php } ?>
										
										
									</select> </div>
									
									<div class="clear marb5"></div>
									
									<div class="fleft wi_50 xs-wi_100 bs_bb padrl2">
										<span>Telefon nr</span>
										<div class="dflex alit_c pos_rel brdb brdclr_lgtgrey2">
											
											<span class="padr5 uppercase fsz20 lgtgrey2_bg " id="phone-country"></span>
											<span class="editable lgn_hight_50 hei_50p  edit-phone dblock flex_1 uppercase wordb_ba curt fsz20 lgtgrey2_bg  phone"><?php if($companyDetail['phone']!="" || $companyDetail['phone']!= null) echo $companyDetail['phone']; else echo "-"; ?></span>
										</div>
									</div>
									
									<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
									
								</div>
								
								
								<div class=" mart20 talc fsz16  " onclick="checkDataPhone();"> <a href="#" class="dblue_btn trn brdrad3" >Uppdatera </a> </div>
								
								
								<!-- <div class="clear hidden-xs"></div>-->
							</div>
							<div class="clear"></div>
						</div>
						
						
						<div class=" mart30 xs-marrl0 sm-marrl0 hidden-xs">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">Din e-post adress</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown5,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown5" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" white_bg   brdrad3 xs-nobrd" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt brdb_new">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 "> <span class="trn" data-trn-key="E-post">E-post</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg lgn_hight_50 hei_50p  email"><?php if($companyDetail['company_email']!="" || $companyDetail['company_email']!= null) echo $companyDetail['company_email']; else echo "-"; ?> </span></div>
										
										
										
										
										
										
										<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
										<!-- <div class="clear hidden-xs"></div>-->
									</div>
									<div class="clear"></div>
								</div>
								<div class=" mart20 talc fsz16  " > <a href="#" class="dblue_btn trn brdrad3" >Uppdatera </a> </div>
							</div>
						</div>
						
						<div class=" mart30 xs-marrl0 sm-marrl0 hidden-xs">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">For Suppliers </h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown6,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown6" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" white_bg   brdrad3 xs-nobrd" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt brdb_new">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="container marrl-2  xs-padl0">
											<div class="fleft wi_50 xs-wi_100 sm-wi_50 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Faktura adress">Faktura adress</span> <span class="editable lgn_hight_50 hei_50p  edit-address dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  addrssi"><?php if($companyDetail['si_address']!="" || $companyDetail['si_address']!= null) echo $companyDetail['si_address']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10 xs-padrl2"> <span class="trn" data-trn-key="Post nr">Post nr</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  zipsi"><?php if($companyDetail['si_zip']!="" || $companyDetail['si_zip']!= null) echo $companyDetail['si_zip']; else echo "-"; ?></span> </div>
											<div class="fleft wi_50 xs-wi_50 sm-wi_100 marl15 xs-mar0 padb10 xs-padrl2 brdb"> <span class="trn" data-trn-key="Stad">Stad</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  citysi"><?php if($companyDetail['si_city']!="" || $companyDetail['si_city']!= null) echo $companyDetail['si_city']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_100 bs_bb padrl2 marl15 xs-marl0  padb10 xs-padl0 brdb"> <span>Land</span> <select class="editable lgn_hight_50 hei_50p  edit-select cntrysi dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg wi_100"  id="cntrysi">
												<option value="">Select</option>
												<?php foreach($countryOpt as $category => $value ) {
												?>
												
												<option value="<?php echo $value['country_name']; ?>" <?php if($companyDetail['si_country']==$value['country_name']) echo 'selected';?> ><?php echo $value['country_name']; ?></option>
												
												<?php } ?>
												
												
											</select> </div>
											
											<div class="fleft wi_50 xs-wi_100 sm-wi_50 marl15 xs-mar0 padtb10 "> <span class="trn" data-trn-key="Delivery Address">Leveransadress</span> <span class="editable lgn_hight_50 hei_50p  edit-address dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  addrssd"><?php if($companyDetail['sd_address']!="" || $companyDetail['sd_address']!= null) echo $companyDetail['sd_address']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0  padtb10 xs-padrl2"> <span class="trn" data-trn-key="Post nr">Post nr</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  zipsd"><?php if($companyDetail['sd_zip']!="" || $companyDetail['sd_zip']!= null) echo $companyDetail['sd_zip']; else echo "-"; ?></span> </div>
											<div class="fleft wi_50 xs-wi_50 sm-wi_100 marl15 xs-mar0  padb10 xs-padrl2 brdb"> <span class="trn" data-trn-key="Stad">Stad</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  citysd"><?php if($companyDetail['sd_city']!="" || $companyDetail['sd_city']!= null) echo $companyDetail['sd_city']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_100 bs_bb padrl2 marl15 xs-marl0 padb10 xs-padl0 brdb"> <span>Land</span> <select class="editable lgn_hight_50 hei_50p  edit-select cntrysd dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg wi_100" id="cntrysd" >
												
												<option value="">Select</option>
												<?php foreach($countryOpt as $category => $value ) {
												?>
												
												<option value="<?php echo $value['country_name']; ?>" <?php if($companyDetail['sd_country']==$value['country_name']) echo 'selected';?> ><?php echo $value['country_name']; ?></option>
												
												<?php } ?>
												
											</select> </div>
											
											<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0  padt10"> <span class="trn" data-trn-key="Vat">VAT</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  vat"><?php if($companyDetail['vat']!="" || $companyDetail['vat']!= null) echo $companyDetail['vat']; else echo "-"; ?></span> </div>
											
										</div>
										
									</div>
									
									
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								<div class=" mart20 talc fsz16  " onclick="checkDataPostSuppliear();"> <a href="#" class="dblue_btn trn brdrad3" >Uppdatera </a> </div>
								<div class="clear"></div>
							</div>
						</div>		
						
						<div class=" mart30 xs-marrl0 sm-marrl0 hidden-xs">
							
							<div class="marb0 ">
								<h2 class="fleft mar0 padb5 fsz15">For Customers</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown7,#profile-fade1" data-classes="active">
										<span>Kort förklaring</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown7" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class=" white_bg   brdrad3 xs-nobrd" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt brdb_new">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<div class="wi_70 xs-wi_100 xs-order_3 xs-padt10 fsz12">
									<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Bank">Bank</span> <span class="editable lgn_hight_50 hei_50p  edit-text bank dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg "><?php if($companyDetail['bank']!="" || $companyDetail['bank']!= null) echo $companyDetail['bank']; else echo "-"; ?></span> </div>
									<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10 "> <span class="trn" data-trn-key="Bankgiro utan OCR">Bankgiro utan OCR</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  bankgiro_utan"><?php if($companyDetail['bankgiro_utan']!="" || $companyDetail['bankgiro_utan']!= null) echo $companyDetail['bankgiro_utan']; else echo "-"; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Bankgiro med OCR">Bankgiro med OCR</span> <span class="editable lgn_hight_50 hei_50p  edit-text bankgiro_med dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg "><?php if($companyDetail['bankgiro_med']!="" || $companyDetail['bankgiro_med']!= null) echo $companyDetail['bankgiro_med']; else echo "-"; ?></span> </div>
										
										
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10 "> <span class="trn" data-trn-key="IBAN">IBAN</span> <span class="editable lgn_hight_50 hei_50p  edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz20 lgtgrey2_bg  iban"><?php if($companyDetail['iban']!="" || $companyDetail['iban']!= null) echo $companyDetail['iban']; else echo "-"; ?></span> </div>
										<div class="container marrl-2 padl15 xs-padl0">
											<div class="fleft wi_50 xs-wi_50 sm-wi_50 bs_bb padrl2 "> <span class="trn" data-trn-key="BIC">BIC</span> <span class="editable lgn_hight_50 hei_50p  edit-text dblock brdb brdclr_lgtgrey2 uppercase curt fsz20 lgtgrey2_bg  bic"><?php if($companyDetail['bic']!="" || $companyDetail['bic']!= null) echo $companyDetail['bic']; else echo "-"; ?></span> </div>
											
											<div class="fleft wi_30  xs-wi_100 sm-wi_50 bs_bb padrl2 hide"> <span class="trn" data-trn-key="F-skattebevis">F-skattebevis</span> <span class="editable lgn_hight_50 hei_50p  edit-select dblock brdb brdclr_lgtgrey2 uppercase curt fsz20 lgtgrey2_bg  ftax" data-options="Yes,No"><?php echo $companyDetail['f_tax']; ?></span> </div>
											
										</div>
										
										
										
										
										
										<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
										<!-- <div class="clear hidden-xs"></div>-->
									</div>
									
								</div>
								<div class=" mart20 talc fsz16  " onclick="checkDataBank();"> <a href="#" class="dblue_btn trn brdrad3" >Uppdatera </a> </div>
								<div class="clear"></div>
							</div>
						</div>
						
						
						
					</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			<div id="keep-selected" class="wi_100 hei_64p dflex  alit_c justc_sb opa0 opa1_a pos_fix zi999 top-64p top0_a left0 padrl15 bxsh_0220_0_14_031-2_0_2_0150_0_12 bg_f trans_all2">
				<div class="dflex fxwrap_w alit_c padtb10">
					<div class="pos_rel marr15">
						<a href="#" class="keep-selected-clear dflex alit_c justc_c talc">
							<img src="<?php echo $path; ?>/html/keepcss/images/icons/icon-arrow-left.svg" width="24" height="24" class="maxwi_100 hei_auto" alt="Clear selection">
						</a>
						<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8">Clear selection</span>
						</div>
					</div>
					<div class="marr15 fsz20 txt_0_54">
						<span id="keep-selected-count"></span> uppdatering
					</div>
				</div>
				<div class="keep-actions wi_100 xs-maxwi_150p  maxwi_250p dflex  padtb10">
					<div class="keep-action wi_40 pos_rel">
						<a href="#" class="show_popup_modal dblock opa50 opa1_h pad5 talc trans_opa1 blue_btn fsz16"  onclick="submit_value();" data-target="#gratis_popup_company_searched">
							Godkänn <!--  <img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Godkänn">-->
						</a>
						<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8 ">Godkänn</span>
						</div>
					</div>
					
				</div>
			</div>
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="marb20"> <img src="<?php echo $path;?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" /> </div>
						<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
						<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
						<div class="marb10 padtb20 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span> </div>
							<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
					</form>
				</div>
			</div>
			
			
			<!-- Sales popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Marketing popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 lgn_hight_50 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad5"  id="gratis_popup_company_searched">
			<div class="modal-content pad25 brdrad10">
				<div id="searched">
					
					
				</div>
				
			</div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14  brd brdrad5"  id="gratis_popup_company_error">
			<div class="modal-content pad25 brdrad10">
				<h3 class="fsz20">You are not authorized to update this company</h3>
				
			</div>
		</div>
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
	</body>
	
</html>