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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_verify.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			var keepGlobal=0;
			var send_data = {};
			send_data.general=0;
			send_data.post=0;
			send_data.byphone=0;
			var countries_flags = {
				'United States' : '../../../html/usercontent/images/flags/us.png',
				'Canada' : '../../../html/usercontent/images/flags/cd.png',
				'Turkey' : '../../../html/usercontent/images/flags/tr.png',
				'Sweden' : '../../../html/usercontent/images/slide/flag_sw.png',
			};
			var countries_codes = {"Abkhazia" : "+7 840 ","Afghanistan" : "+93 ","Albania" : "+355 ","Algeria" : "+213 ","American Samoa" : "+1 684 ","Andorra" : "+376 ","Angola" : "+244 ","Anguilla" : "+1 264 ","Antigua and Barbuda" : "+1 268 ","Argentina" : "+54 ","Armenia" : "+374 ","Aruba" : "+297 ","Ascension" : "+247 ","Australia" : "+61 ","Australian External Territories" : "+672 ","Austria" : "+43 ","Azerbaijan" : "+994 ","Bahamas" : "+1 242 ","Bahrain" : "+973 ","Bangladesh" : "+880 ","Barbados" : "+1 246 ","Barbuda" : "+1 268 ","Belarus" : "+375 ","Belgium" : "+32 ","Belize" : "+501 ","Benin" : "+229 ","Bermuda" : "+1 441 ","Bhutan" : "+975 ","Bolivia" : "+591 ","Bosnia and Herzegovina" : "+387 ","Botswana" : "+267 ","Brazil" : "+55 ","British Indian Ocean Territory" : "+246 ","British Virgin Islands" : "+1 284 ","Brunei" : "+673 ","Bulgaria" : "+359 ","Burkina Faso" : "+226 ","Burundi" : "+257 ","Cambodia" : "+855 ","Cameroon" : "+237 ","Canada" : "+1 ","Cape Verde" : "+238 ","Cayman Islands" : "+ 345 ","Central African Republic" : "+236 ","Chad" : "+235 ","Chile" : "+56 ","China" : "+86 ","Christmas Island" : "+61 ","Cocos-Keeling Islands" : "+61 ","Colombia" : "+57 ","Comoros" : "+269 ","Congo" : "+242 ","Congo, Dem. Rep. of (Zaire)" : "+243 ","Cook Islands" : "+682 ","Costa Rica" : "+506 ","Croatia" : "+385 ","Cuba" : "+53 ","Curacao" : "+599 ","Cyprus" : "+537 ","Czech Republic" : "+420 ","Denmark" : "+45 ","Diego Garcia" : "+246 ","Djibouti" : "+253 ","Dominica" : "+1 767 ","Dominican Republic" : "+1 809 ","East Timor" : "+670 ","Easter Island" : "+56 ","Ecuador" : "+593 ","Egypt" : "+20 ","El Salvador" : "+503 ","Equatorial Guinea" : "+240 ","Eritrea" : "+291 ","Estonia" : "+372 ","Ethiopia" : "+251 ","Falkland Islands" : "+500 ","Faroe Islands" : "+298 ","Fiji" : "+679 ","Finland" : "+358 ","France" : "+33 ","French Antilles" : "+596 ","French Guiana" : "+594 ","French Polynesia" : "+689 ","Gabon" : "+241 ","Gambia" : "+220 ","Georgia" : "+995 ","Germany" : "+49 ","Ghana" : "+233 ","Gibraltar" : "+350 ","Greece" : "+30 ","Greenland" : "+299 ","Grenada" : "+1 473 ","Guadeloupe" : "+590 ","Guam" : "+1 671 ","Guatemala" : "+502 ","Guinea" : "+224 ","Guinea-Bissau" : "+245 ","Guyana" : "+595 ","Haiti" : "+509 ","Honduras" : "+504 ","Hong Kong SAR China" : "+852 ","Hungary" : "+36 ","Iceland" : "+354 ","India" : "+91 ","Indonesia" : "+62 ","Iran" : "+98 ","Iraq" : "+964 ","Ireland" : "+353 ","Israel" : "+972 ","Italy" : "+39 ","Ivory Coast" : "+225 ","Jamaica" : "+1 876 ","Japan" : "+81 ","Jordan" : "+962 ","Kazakhstan" : "+7 7 ","Kenya" : "+254 ","Kiribati" : "+686 ","Kuwait" : "+965 ","Kyrgyzstan" : "+996 ","Laos" : "+856 ","Latvia" : "+371 ","Lebanon" : "+961 ","Lesotho" : "+266 ","Liberia" : "+231 ","Libya" : "+218 ","Liechtenstein" : "+423 ","Lithuania" : "+370 ","Luxembourg" : "+352 ","Macau SAR China" : "+853 ","Macedonia" : "+389 ","Madagascar" : "+261 ","Malawi" : "+265 ","Malaysia" : "+60 ","Maldives" : "+960 ","Mali" : "+223 ","Malta" : "+356 ","Marshall Islands" : "+692 ","Martinique" : "+596 ","Mauritania" : "+222 ","Mauritius" : "+230 ","Mayotte" : "+262 ","Mexico" : "+52 ","Micronesia" : "+691 ","Midway Island" : "+1 808 ","Moldova" : "+373 ","Monaco" : "+377 ","Mongolia" : "+976 ","Montenegro" : "+382 ","Montserrat" : "+1664 ","Morocco" : "+212 ","Myanmar" : "+95 ","Namibia" : "+264 ","Nauru" : "+674 ","Nepal" : "+977 ","Netherlands" : "+31 ","Netherlands Antilles" : "+599 ","Nevis" : "+1 869 ","New Caledonia" : "+687 ","New Zealand" : "+64 ","Nicaragua" : "+505 ","Niger" : "+227 ","Nigeria" : "+234 ","Niue" : "+683 ","Norfolk Island" : "+672 ","North Korea" : "+850 ","Northern Mariana Islands" : "+1 670 ","Norway" : "+47 ","Oman" : "+968 ","Pakistan" : "+92 ","Palau" : "+680 ","Palestinian Territory" : "+970 ","Panama" : "+507 ","Papua New Guinea" : "+675 ","Paraguay" : "+595 ","Peru" : "+51 ","Philippines" : "+63 ","Poland" : "+48 ","Portugal" : "+351 ","Puerto Rico" : "+1 787 ","Qatar" : "+974 ","Reunion" : "+262 ","Romania" : "+40 ","Russia" : "+7 ","Rwanda" : "+250 ","Samoa" : "+685 ","San Marino" : "+378 ","Saudi Arabia" : "+966 ","Senegal" : "+221 ","Serbia" : "+381 ","Seychelles" : "+248 ","Sierra Leone" : "+232 ","Singapore" : "+65 ","Slovakia" : "+421 ","Slovenia" : "+386 ","Solomon Islands" : "+677 ","South Africa" : "+27 ","South Georgia and the South Sandwich Islands" : "+500 ","South Korea" : "+82 ","Spain" : "+34 ","Sri Lanka" : "+94 ","Sudan" : "+249 ","Suriname" : "+597 ","Swaziland" : "+268 ","Sweden" : "+46 ","Switzerland" : "+41 ","Syria" : "+963 ","Taiwan" : "+886 ","Tajikistan" : "+992 ","Tanzania" : "+255 ","Thailand" : "+66 ","Timor Leste" : "+670 ","Togo" : "+228 ","Tokelau" : "+690 ","Tonga" : "+676 ","Trinidad and Tobago" : "+1 868 ","Tunisia" : "+216 ","Turkey" : "+90 ","Turkmenistan" : "+993 ","Turks and Caicos Islands" : "+1 649 ","Tuvalu" : "+688 ","U.S. Virgin Islands" : "+1 340 ","Uganda" : "+256 ","Ukraine" : "+380 ","United Arab Emirates" : "+971 ","United Kingdom" : "+44 ","United States" : "+1 ","Uruguay" : "+598 ","Uzbekistan" : "+998 ","Vanuatu" : "+678 ","Venezuela" : "+58 ","Vietnam" : "+84 ","Wake Island" : "+1 808 ","Wallis and Futuna" : "+681 ","Yemen" : "+967 ","Zambia" : "+260 ","Zanzibar" : "+255 ","Zimbabwe" : "+263 "}
			function add_phone_country(){
				var country = $('#passport-country').text().trim(),
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
			function addActive()
			{
				$("#more").addClass('active');
			}
			function show_rename()
			{
				$("#more-rename-modal").addClass('active');
				$("#more-rename-modal").attr("style", "display:block");
			}
			function show_restore()
			{
				$("#more-restore-modal").addClass('active');
				$("#more-restore-modal").attr("style", "display:block");
			}
			function show_delete()
			{
				$("#more-delete-modal").addClass('active');
				$("#more-delete-modal").attr("style", "display:block");
			}
			
			function show_suspend()
			{
				$("#more-suspend-modal").addClass('active');
				$("#more-suspend-modal").attr("style", "display:block");
			}
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
			translator.lang("sv");
			var translation = translator.get("Home");
			
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
			
			function submit_value()
			{
				document.getElementById("save_indexing").submit();
			}
		</script>
	</head>
	
	<body class="white_bg" >
		
		<!-- HEADER -->
		<?php include 'CompanyHeaderUpdated.php'; ?><div class="clear" id=""></div>
		
		
		
		<!-- CONTENT -->
		<div class="column_m container zi5 mart40 xs-mart20" onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				<div class="wi_960p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  xs-pad0">
					<!-- About us -->
					<div class="zi1 padb5">
						<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
							<div class="white_bg tall">
								
								
								
								
								<!-- Logo -->
								<h1 class="fsz45 xs-fsz25 talc bold">Säkerhetsnivån för ditt konto</h1>
								<!-- Logo -->
								<div class="marb0"> <a href="#" class="blacka1_txt talc fsz25 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Vi har fyra nivåer av säkerhet för ett Qloud ID konto. De första 3 nivåerna kan du hantera med enkelhet med din dator och smartphone. Medans den fjärde alternativet kräver att du vänder dig till din arbetsgivare. Samtliga nivåer är kostnadsfria.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
									<!-- Meta -->
									
								</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
							</a>
							
							
						</div>
					</div>
					
						<div class="column_m container tab-header mart30 talc dark_grey_txt ">
						<ul class="tab-header tab-header-custom tab-header-custom7 xs-dnone lgtgrey2_bg">
						<li >
						<a href="#" class="dblock brdradt5 active" data-id="tab_total0">
									<span class="count black_txt" >4</span>
									<span class="black_txt trn fsz16" > </span>
								</a>
							</li>
						
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total">
									<span class="count black_txt"><?php echo $companyDetail['completed_requests']; ?>%</span>
									<span class="black_txt trn fsz16" >B </span>
								</a>
							</li>
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total2">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16" >A </span>
								</a>
							</li>
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total1">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16" >AA </span>
								</a>
							</li>
							
							
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total3">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16" >AAA </span>
								</a>
							</li>
							
							<div class="clear"></div>
						</ul>
						
						<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb xs-fsz30 panlyellow_bg xs-wi_100">
						<option value="tab_total0" class="xs-fsz20">Description</option>
						<option value="tab_total" class="xs-fsz20">B</option>
						<option value="tab_total1" class="xs-fsz20">A</option>
						<option value="tab_total2" class="xs-fsz20">AA</option>
						<option value="tab_total3" class="xs-fsz20">AAA</option>
						</select>
						<div class="clear"></div>
					</div>
					
					<div class="column_m container   fsz14 dark_grey_txt">
						<div class="tab-content padt5 " id="tab_total0" style="display:none;">
							
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_44_7 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Description</div></a>
										</th>
										
										<th class="wi_12 pad5 brdb_new nobold  talc  <?php if($companyDetail['grading_status']==0) echo 'yellow_bg'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn" >Rating B</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc <?php if($companyDetail['grading_status']==1) echo 'yellow_bg'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn">Rating A</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc  <?php if($companyDetail['grading_status']==2) echo 'yellow_bg'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn">Rating AA</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc <?php if($companyDetail['grading_status']==3) echo 'yellow_bg'; else echo ''; ?>">
											<div class="padtb5 black_txt trn">Rating AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Email & Lösenord</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Mobil nummer</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Namn & Efternamn</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Person nummer</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Legitimation</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($companyDetail['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($companyDetail['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($companyDetail['grading_status']==2) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc <?php if($companyDetail['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 tall cn">
											<div class="padtb5 " ></div>
										</td>
										<?php if($companyDetail['grading_status']==0) {  ?>
										<td class="pad5 talc cd <?php if($companyDetail['grading_status']==0) echo 'yellow_bg'; else echo ''; ?>">
											<div class="padtb5 ">Selected</div>
										</td>
										<?php } else { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Select</a></div>
										</td>
										<?php } if($companyDetail['grading_status']==0) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',1); ?>/<?php echo $data['cid']; ?>">Select</a></div>
										</td>
										<?php } else if($companyDetail['grading_status']==1) { ?>
										<td class="pad5 talc cd <?php if($companyDetail['grading_status']==1) echo 'yellow_bg'; else echo ''; ?>">
											<div class="padtb5 ">Selected</div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Select</a></div>
										</td>
										<?php } if($companyDetail['grading_status']==1) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',2); ?>/<?php echo $data['cid']; ?>">Select</a></div>
										</td>
										<?php } else if($companyDetail['grading_status']==2) { ?>
										<td class="pad5 talc cd <?php if($companyDetail['grading_status']==2) echo 'yellow_bg'; else echo ''; ?>">
											<div class="padtb5 ">Selected</div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Select</a></div>
										</td>
										<?php } if($companyDetail['grading_status']==2) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',3); ?>/<?php echo $data['cid']; ?>">Select</a></div>
										</td>
										<?php } else if($companyDetail['grading_status']==3) { ?>
										<td class="pad5 talc cd <?php if($companyDetail['grading_status']==3) echo 'yellow_bg'; else echo ''; ?>">
											<div class="padtb5 ">Selected</div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Select</a></div>
										</td>
										<?php } ?>
										
									</tr>
									
									</tbody>
								
							</table>
							
						</div>
					
						<!-- Summary -->
						
					</div>
					
					
					
					
					
					
					
					
					
				</div>
				
				
				
				
				
				
				<!-- Center content -->
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 hidden">
					
					<div class="padb10 ">
						<h1 class="padb5 talc fsz50">Security</h1>
						<p class="pad0 talc fsz18 padb20 brdb wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10">Manage security settings for your business</p>
					</div>
					
					
					
					<div class="clear"></div>
					
					
				</div>
				
				<div class="wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  hidden ">
					<!-- About us -->
					<div class="marrl10 lgtblue2_bg brdrad3 xs-marrl0 white_bg" >
						
						<div class="container pad25 padb20 xs-pad10 xs-padt10 xs-padb20  brdrad1 fsz14 dark_grey_txt lgtgrey2_bg">
							<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall lgtgrey2_bg">
								<div class="wi_100 pos_abs xs-pos_sta top0 right0">
									<div class="dflex alit_c justc_fe marb10 ">
										<div class="pos_rel">
											
										</div>
										<div class="pos_rel">
											<a href="#" class="show_popup_modal dblock opa50 opa1_h pad10 trans_opa2" data-target="#reset-pass-modal">
												<img src="<?php echo $path;?>html/usercontent/images/icons/reset-password-24.svg">
											</a>
											<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
												<span class="dblock padrl8">Reset password</span>
											</div>
										</div>
										<div class="pos_rel">
											<a href="#" class="class-toggler dblock opa50 opa1_h pad10 trans_opa2" onclick="addActive();" data-classes="active">
												<img src="<?php echo $path;?>html/usercontent/images/icons/more.svg">
											</a>
											<div class="wi_120p dnone dblocki_a pos_abs zi40 top100 right-20p bxsh_02100_105112113_05 brd bg_f" id="more">
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" >Rename</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-rename-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" >Restore data</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-restore-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" >Suspend</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-suspend-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" >Delete</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-delete-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="idcard_header wi_100 xs-wi_70 xs-order_2 bs_bb marb10 xs-padl15 sm-padl5">
									<h2 class="dnone xs-dblock padb15 uppercase bold fsz18 trn">Cloud ID Business</h2>
									<div>
										<img src="<?php echo $path;?>html/usercontent/images/flag.png" width="40" class="marr5 valm">
										<span class="valm bold xs-nobold fsz24 xs-fsz15 trn">Business</span>
										<span class="dblock xs-dnone bold fsz14 trn">Passport</span>
									</div>
									<div class="dnone xs-dblock mart10 marb20">
										<img src="<?php echo $path;?>html/usercontent/images/score.png" width="40" class="marr5 valm">
										<span class="valm bold xs-nobold fsz24 xs-fsz15">100/70</span>
									</div>
								</div>
								<!--<div class="clear hidden-xs"></div>-->
								<div class="wi_30 xs-order_1">
										<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
											<div class="imgwrap nobrd bgis_coni">
												<div class="cropped_image <?php if($companyDetail ['profile_pic']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" ></div>
												
											</div>
										</div>
										
									</div>
								<div class="wi_70 xs-wi_100 xs-order_4 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Company identification number</span> <span class=" edit-text jain dblock brdb brdclr_lgtgrey2 fsz20"><?php echo $companyDetail['cid']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Company name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $companyDetail['company_name']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Industry</span> <span class="edit-select dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="Staffing &amp; Recruiting"><?php echo $companyDetail['industry']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span>Visiting address</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $companyDetail['address']; ?></span> </div>
										<div class="container marrl-2 padl15 xs-pad0">
											<div class="fleft wi_33 bs_bb padrl2"> <span>City</span> <span class=" edit-text jain11 dblock brdb brdclr_lgtgrey2 curt fsz16"><?php echo $companyDetail['city']; ?></span> </div>
											<div class="fleft wi_33 bs_bb padrl2"> <span>Zip</span> <span class=" edit-text jain12 dblock brdb brdclr_lgtgrey2 wordb_ba curt fsz16"><?php echo $companyDetail['zip']; ?></span> </div>
											<div class="fleft wi_33 bs_bb padrl2"> <span>Country</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16" data-list="countries-list" ><?php echo $companyDetail['country']; ?></span> </div>
											<datalist id="countries-list">
												<option value="Abkhazia"></option>
												<option value="Afghanistan"></option>
												<option value="Albania"></option>
												<option value="Algeria"></option>
												<option value="American Samoa"></option>
												<option value="Andorra"></option>
												<option value="Angola"></option>
												<option value="Anguilla"></option>
												<option value="Antigua and Barbuda"></option>
												<option value="Argentina"></option>
												<option value="Armenia"></option>
												<option value="Aruba"></option>
												<option value="Ascension"></option>
												<option value="Australia"></option>
												<option value="Australian External Territories"></option>
												<option value="Austria"></option>
												<option value="Azerbaijan"></option>
												<option value="Bahamas"></option>
												<option value="Bahrain"></option>
												<option value="Bangladesh"></option>
												<option value="Barbados"></option>
												<option value="Barbuda"></option>
												<option value="Belarus"></option>
												<option value="Belgium"></option>
												<option value="Belize"></option>
												<option value="Benin"></option>
												<option value="Bermuda"></option>
												<option value="Bhutan"></option>
												<option value="Bolivia"></option>
												<option value="Bosnia and Herzegovina"></option>
												<option value="Botswana"></option>
												<option value="Brazil"></option>
												<option value="British Indian Ocean Territory"></option>
												<option value="British Virgin Islands"></option>
												<option value="Brunei"></option>
												<option value="Bulgaria"></option>
												<option value="Burkina Faso"></option>
												<option value="Burundi"></option>
												<option value="Cambodia"></option>
												<option value="Cameroon"></option>
												<option value="Canada"></option>
												<option value="Cape Verde"></option>
												<option value="Cayman Islands"></option>
												<option value="Central African Republic"></option>
												<option value="Chad"></option>
												<option value="Chile"></option>
												<option value="China"></option>
												<option value="Christmas Island"></option>
												<option value="Cocos-Keeling Islands"></option>
												<option value="Colombia"></option>
												<option value="Comoros"></option>
												<option value="Congo"></option>
												<option value="Congo, Dem. Rep. of (Zaire)"></option>
												<option value="Cook Islands"></option>
												<option value="Costa Rica"></option>
												<option value="Croatia"></option>
												<option value="Cuba"></option>
												<option value="Curacao"></option>
												<option value="Cyprus"></option>
												<option value="Czech Republic"></option>
												<option value="Denmark"></option>
												<option value="Diego Garcia"></option>
												<option value="Djibouti"></option>
												<option value="Dominica"></option>
												<option value="Dominican Republic"></option>
												<option value="East Timor"></option>
												<option value="Easter Island"></option>
												<option value="Ecuador"></option>
												<option value="Egypt"></option>
												<option value="El Salvador"></option>
												<option value="Equatorial Guinea"></option>
												<option value="Eritrea"></option>
												<option value="Estonia"></option>
												<option value="Ethiopia"></option>
												<option value="Falkland Islands"></option>
												<option value="Faroe Islands"></option>
												<option value="Fiji"></option>
												<option value="Finland"></option>
												<option value="France"></option>
												<option value="French Antilles"></option>
												<option value="French Guiana"></option>
												<option value="French Polynesia"></option>
												<option value="Gabon"></option>
												<option value="Gambia"></option>
												<option value="Georgia"></option>
												<option value="Germany"></option>
												<option value="Ghana"></option>
												<option value="Gibraltar"></option>
												<option value="Greece"></option>
												<option value="Greenland"></option>
												<option value="Grenada"></option>
												<option value="Guadeloupe"></option>
												<option value="Guam"></option>
												<option value="Guatemala"></option>
												<option value="Guinea"></option>
												<option value="Guinea-Bissau"></option>
												<option value="Guyana"></option>
												<option value="Haiti"></option>
												<option value="Honduras"></option>
												<option value="Hong Kong SAR China"></option>
												<option value="Hungary"></option>
												<option value="Iceland"></option>
												<option value="India"></option>
												<option value="Indonesia"></option>
												<option value="Iran"></option>
												<option value="Iraq"></option>
												<option value="Ireland"></option>
												<option value="Israel"></option>
												<option value="Italy"></option>
												<option value="Ivory Coast"></option>
												<option value="Jamaica"></option>
												<option value="Japan"></option>
												<option value="Jordan"></option>
												<option value="Kazakhstan"></option>
												<option value="Kenya"></option>
												<option value="Kiribati"></option>
												<option value="Kuwait"></option>
												<option value="Kyrgyzstan"></option>
												<option value="Laos"></option>
												<option value="Latvia"></option>
												<option value="Lebanon"></option>
												<option value="Lesotho"></option>
												<option value="Liberia"></option>
												<option value="Libya"></option>
												<option value="Liechtenstein"></option>
												<option value="Lithuania"></option>
												<option value="Luxembourg"></option>
												<option value="Macau SAR China"></option>
												<option value="Macedonia"></option>
												<option value="Madagascar"></option>
												<option value="Malawi"></option>
												<option value="Malaysia"></option>
												<option value="Maldives"></option>
												<option value="Mali"></option>
												<option value="Malta"></option>
												<option value="Marshall Islands"></option>
												<option value="Martinique"></option>
												<option value="Mauritania"></option>
												<option value="Mauritius"></option>
												<option value="Mayotte"></option>
												<option value="Mexico"></option>
												<option value="Micronesia"></option>
												<option value="Midway Island"></option>
												<option value="Moldova"></option>
												<option value="Monaco"></option>
												<option value="Mongolia"></option>
												<option value="Montenegro"></option>
												<option value="Montserrat"></option>
												<option value="Morocco"></option>
												<option value="Myanmar"></option>
												<option value="Namibia"></option>
												<option value="Nauru"></option>
												<option value="Nepal"></option>
												<option value="Netherlands"></option>
												<option value="Netherlands Antilles"></option>
												<option value="Nevis"></option>
												<option value="New Caledonia"></option>
												<option value="New Zealand"></option>
												<option value="Nicaragua"></option>
												<option value="Niger"></option>
												<option value="Nigeria"></option>
												<option value="Niue"></option>
												<option value="Norfolk Island"></option>
												<option value="North Korea"></option>
												<option value="Northern Mariana Islands"></option>
												<option value="Norway"></option>
												<option value="Oman"></option>
												<option value="Pakistan"></option>
												<option value="Palau"></option>
												<option value="Palestinian Territory"></option>
												<option value="Panama"></option>
												<option value="Papua New Guinea"></option>
												<option value="Paraguay"></option>
												<option value="Peru"></option>
												<option value="Philippines"></option>
												<option value="Poland"></option>
												<option value="Portugal"></option>
												<option value="Puerto Rico"></option>
												<option value="Qatar"></option>
												<option value="Reunion"></option>
												<option value="Romania"></option>
												<option value="Russia"></option>
												<option value="Rwanda"></option>
												<option value="Samoa"></option>
												<option value="San Marino"></option>
												<option value="Saudi Arabia"></option>
												<option value="Senegal"></option>
												<option value="Serbia"></option>
												<option value="Seychelles"></option>
												<option value="Sierra Leone"></option>
												<option value="Singapore"></option>
												<option value="Slovakia"></option>
												<option value="Slovenia"></option>
												<option value="Solomon Islands"></option>
												<option value="South Africa"></option>
												<option value="South Georgia and the South Sandwich Islands"></option>
												<option value="South Korea"></option>
												<option value="Spain"></option>
												<option value="Sri Lanka"></option>
												<option value="Sudan"></option>
												<option value="Suriname"></option>
												<option value="Swaziland"></option>
												<option value="Sweden"></option>
												<option value="Switzerland"></option>
												<option value="Syria"></option>
												<option value="Taiwan"></option>
												<option value="Tajikistan"></option>
												<option value="Tanzania"></option>
												<option value="Thailand"></option>
												<option value="Timor Leste"></option>
												<option value="Togo"></option>
												<option value="Tokelau"></option>
												<option value="Tonga"></option>
												<option value="Trinidad and Tobago"></option>
												<option value="Tunisia"></option>
												<option value="Turkey"></option>
												<option value="Turkmenistan"></option>
												<option value="Turks and Caicos Islands"></option>
												<option value="Tuvalu"></option>
												<option value="U.S. Virgin Islands"></option>
												<option value="Uganda"></option>
												<option value="Ukraine"></option>
												<option value="United Arab Emirates"></option>
												<option value="United Kingdom"></option>
												<option value="United States"></option>
												<option value="Uruguay"></option>
												<option value="Uzbekistan"></option>
												<option value="Vanuatu"></option>
												<option value="Venezuela"></option>
												<option value="Vietnam"></option>
												<option value="Wake Island"></option>
												<option value="Wallis and Futuna"></option>
												<option value="Yemen"></option>
												<option value="Zambia"></option>
												<option value="Zanzibar"></option>
												<option value="Zimbabwe"></option>
											</datalist>
											
											<div class="clear marb5"></div>
											
											<div class="fleft wi_50 bs_bb padrl2">
												<span>Phone</span>
												<div class="dflex alit_c pos_rel brdb brdclr_lgtgrey2">
													<span class="padr5" id="phone-country-flag"><img src="<?php echo $path;?>html/usercontent/images/flags/default.png" height="18" class="dblock"></span>
													<span class="padr5 uppercase fsz16" ></span>
													<span class=" edit-phone dblock flex_1 uppercase wordb_ba curt fsz16"><?php echo $companyDetail['phone']; ?></span>
												</div>
											</div>
											
											<div class="fleft wi_50 bs_bb padrl2 brdb brdclr_lgtgrey2"> <span>Website</span> <span class="edit-text dblock curt fsz16">gmail.com</span> </div>
											<div class="clear marb10"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Founded</span> <span class=" edit-datepicker jain2 dblock brdb brdclr_lgtgrey2 curp fsz16"><?php echo $companyDetail['founded']; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Annual Turnover</span> <span class=" edit-select jain4 dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="0,< 1 tkr, 1 - 499 tkr, 500 - 999 tkr, 1000 - 9999 tkr, 10 000 - 49 999 tkr, 50 000 - 499 999 tkr, > 499 999 tkr">&lt; 1 tkr</span> </div>
											<div class="clear visible-xs visible-sm marb10"></div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Employee Size</span> <span class=" edit-select jain5 dblock brdb brdclr_lgtgrey2 curp fsz16" data-options="0,1 - 4,5 - 9,10 - 19,20 - 49,50 - 99,100 - 199,200 - 999,> 1000">5 - 9</span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span>Validated Until</span> <span class=" edit-datepicker jain3 dblock brdb brdclr_lgtgrey2 curp fsz16">01/04/2017</span> </div>
											<div class="clear visible-xs visible-sm marb10"></div>
											
											<input type="hidden" id="company_id" value="1">
										</div>
									</div>
								
								<div class="qapscore_bord hidden-xs" style="position: absolute; z-index: 1; top: 74px; right: 40px;">
									
									<div class="scorenew scorelevelnew"><?php if($companyDetail['grading_status']==0) { echo "B"; } else if($companyDetail['grading_status']==1) { echo "A"; } else if($companyDetail['grading_status']==2) { echo "AA"; } else if($companyDetail['grading_status']==3) { echo "AAA"; } ?></div>
								</div>
								
								<div class="right_number hidden-xs bold talc fsz14"> <span>5500040N</span> </div>
								<!-- <div class="clear hidden-xs"></div>-->
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class=" xs-marrl0 sm-marrl0  mart30">
						
						<div class="marb10 brdb">
							<h2 class="fleft mar0 padb5 fsz18 ">Current security level</h2>
							
							<div class="clear"></div>
						</div>
					</div>
					<div class="flex_1 ">
						<div class=" xs-pad0">
							<form class="toggle-base">
								<!-- Search results -->
								<div class="search_result_list column_m padb20">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										
										<tbody id="search_results_target">
											<tr>
												
												<td class="pad5 yellowb_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt"><?php if($companyDetail['grading_status']==0) { echo "B"; } else if($companyDetail['grading_status']==1) { echo "A"; } else if($companyDetail['grading_status']==2) { echo "AA"; } else if($companyDetail['grading_status']==3) { echo "AAA"; } ?></a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz14"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"> <a href="#" class="dinlblck marr5 pad5 red_bg yellow_bg_h white_txt fsz13 brdrad3">#Categoty</a> </div>
													</div>
												</td>
											</tr>
											<tr>
												<td class="padt5 padb10">
													<div class=""></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											
											
											
										</tbody>
									</table>
								</div>
								
							</form>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class=" xs-marrl0 sm-marrl0  mart10">
						
						<div class="marb10 brdb">
							<h2 class="fleft mar0 padb5">Upgrade your security</h2>
							<div class="fright pos_rel padb5 fsz13">
								<a href="#" class="class-toggler" data-target="#profile-dropdown1,#profile-fade" data-classes="active">
									<span>Why</span>
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
					<div class="flex_1 ">
						<div class="  xs-pad0">
							<form class="toggle-base">
								<!-- Search results -->
								<div class="search_result_list column_m padb20">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										
										<tbody id="search_results_target">
											<?php if($companyDetail['grading_status']==0) {  ?>
											
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">A</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',1); ?>/<?php echo $data['cid']; ?>" class="dinlblck marr5 pad5 red_bg yellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } else {  ?>
											
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">B</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg yellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											<?php if($companyDetail['grading_status']<=1) {  ?>
											
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AA</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',2); ?>/<?php echo $data['cid']; ?>" class="dinlblck marr5 pad5 red_bg yellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } else {  ?>
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">A</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg yellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											<?php if($companyDetail['grading_status']<=2) {  ?>
											
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AAA</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="../../UpdateGradeCompany/updateGradeAccount/<?php echo encrypt_decrypt('encrypt',3); ?>/<?php echo $data['cid']; ?>" class="dinlblck marr5 pad5 red_bg yellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } else {  ?>
											<tr>
												
												<td class="pad5 lgtgrey2_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AA</a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg yellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
													</div>
												</td>
											</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											
											
										</tbody>
									</table>
								</div>
								
							</form>
							<div class="clear"></div>
						</div>
					</div>
					
					
	
					
				</div>
				
				
				
				
				
				
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="hei_80p"></div>
</div>
<div class="popup_modal wi_600p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb bxsh_0350_0_2 brdrad1 white_bg fsz14 txt_0_87" id="collaborators-modal">
	<div class="modal-header padtrl15">
		<h3 class="pos_rel mar0 pad0 padb15 brdb lgn_hight_19 bold fsz18 dark_grey_txt">
			Collaborators
		</h3>
	</div>
	<div class="modal-content pad15">
		<div id="collaborators-container">
			<div class="collaborator-row dflex alit_c pos_rel">
				<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">K</div>
				<div class="flex_1 padr40 padl15 fsz13">
					<div>
						<strong>Kowaken Ghirmai</strong>
						<i>(owner)</i>
					</div>
					<div class="txt_0_54">kowaken.ghirmai@qmatchup.com</div>
				</div>
			</div>
		</div>
		<form id="collaborators-form">
			<div class="dflex alit_c pos_rel mart10">
				<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c brd brdclr_7f brdrad50 uppercase fsz20 txt_f">
					<img src="<?php echo $path;?>html/usercontent/images/icons/add-person.svg" width="18" height="24" class="dblock opa50" alt="Collaborator">
				</div>
				<div class="flex_1 padr40 padl15 fsz13">
					<input type="text" name="name" id="collaborators-lookup" class="wi_100 dblock nobrd ui-autocomplete-input" placeholder="Person or email to share with" autocomplete="off">
					<div class="dnone dblock_pa pos_abs pos_cenY right0">
						<button type="submit" class="dblock opa50 opa1_h mar0 pad3 nobrd bg_trans curp trans_opa2">
							<img src="<?php echo $path;?>html/usercontent/images/icons/check.svg" width="18" height="18" class="dblock">
						</button>
						<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
							<span class="dblock padrl8">Add collaborator</span>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="modal-footer mart5 padtb10 padrl15 bg_ed talr">
		<button type="button" class="close_popup_modal marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Cancel</button>
		<button type="submit" class="marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Save</button>
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
				<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
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
				<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
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
				<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
			</div>
		</form>
	</div>
</div>

<div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="new-organization-modal">
	<div class="modal-content pad25 brd">
		<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
			Create new organization
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		<form>
			<div class="marb15">
				<label for="new-organization-name" class="sr-only">Name of the organization</label>
				<input type="text" name="name" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Name of the organization" />
			</div>
			<div class="marb15">
				<label for="new-organization-description" class="sr-only">Description (optional)</label>
				<textarea row="3" name="name" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Description (optional)"></textarea>
			</div>
			<div class="marb15 padt15">
				<label for="new-organization-under" class="txt_0">Place this organization under:</label>
				<select name="name" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica">
					<option value="1">qmatchup.com</option>
					<option value="2">google.com</option>
					<option value="3">yandex.ru</option>
				</select>
			</div>
			<div class="mart30 talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Create Organization</button>
			</div>
		</form>
	</div>
</div>



<div class="popup_modal wi_600p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="reset-pass-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			Reset password
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		<div class="tab-header">
			<a href="#" class="ws_now txt_0_a active" data-id="reset-pass-set">Set password</a>
			<span class="padrl5">|</span>
			<a href="#" class="ws_now txt_0_a" data-id="reset-pass-auto">Auto-generate password</a>
		</div>
		
		<div class="tab-content padt20" id="reset-pass-set">
			<form action="changePassword" method="POST" id="loginform">
				<div class="wi_100 minhei_190p padb15">
					<div class="dflex fxwrap_w alit_fs padb5">
						<div class="wi_100 maxwi_100 marr15 marb15">
							<label for="reset-pass-password" class="sr-only">Password</label>
							<input type="password" name="cpassword" id="cpassword" class="wi_175p mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Type Current Password" />
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<label for="reset-pass-password" class="sr-only">Password</label>
							<input type="password" name="newpassword" id="newpassword" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Type New Password" />
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<label for="reset-pass-retype" class="sr-only">Password</label>
							<input type="password" name="repassword" id="repassword" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Retype New Password" />
						</div>
					</div>
					<div class="marb25">
						<span>Password strength:</span>
						<span class="password-strength"></span>
						<div class="wi_175p maxwi_100 mart5 bg_e0">
							<div class="maxwi_100 hei_3p" data-weak="bg_fc3" data-good="bg_69c" data-strong="bg_008000"></div>
						</div>
					</div>
					<label>
						<input type="checkbox" name="require-change" value="1" />
						<span class="marl5">Require a change of password in the next sign in</span>
					</label>
				</div>
				<div class="talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<button type="button" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validateLogin();">Submit</button>
				</div>
			</form>
		</div>
		<div class="tab-content padt20" id="reset-pass-auto">
			<form>
				<div class="wi_100 minhei_190p padb15">
					<div class="dflex fxwrap_w alit_fs padb10">
						<div class="wi_175p maxwi_100 marr15 marb15">
							<input type="password" name="password" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f trans_bg font_helvetica" value="qweqweqweqwe" disabled />
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<input type="password" name="retype-password" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f trans_bg font_helvetica" value="qweqweqweqwe" disabled />
						</div>
					</div>
					<label>
						<input type="checkbox" name="require-change" value="1" />
						<span class="marl5">Require a change of password in the next sign in</span>
					</label>
				</div>
				<div class="talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Submit</button>
				</div>
			</form>
		</div>
		
	</div>
</div>

<div class="popup_modal wi_640p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="more-rename-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			Rename user
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		
		<div class="marb30">
			Before renaming this user, ask the user to sign out of his or her account. After you rename this user:
			<ul class="padl15">
				<li>All contacts in the user's Google Talk chat list are removed.</li>
				<li>The user might not be able to use chat for up to 3 days.</li>
				<li>The rename operation can take up to 10 minutes.</li>
				<li>The user's current address (bot-first@spam1-samf.com) becomes an alias to ensure email delivery.</li>
				<li>The new name might not be available for up to 10 minutes.</li>
			</ul>
		</div>
		
		<form>
			<div class="wi_100 minhei_190p padb15">
				<div class="dflex fxwrap_w alit_fs padb5">
					<div class="wi_175p maxwi_100 marr15 marb15">
						<label for="more-rename-fname" class="">First name</label>
						<input type="text" name="first-name" id="more-rename-fname1" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Kowaken" />
					</div>
					<div class="wi_175p maxwi_100 marr15 marb15">
						<label for="more-rename-lname" class="">Last name</label>
						<input type="text" name="last-name" id="more-rename-lname" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Ghirmai" />
					</div>
				</div>
				<div class="wi_365p maxwi_100 dflex alit_fe padb5">
					<div class="flex_1 marb15">
						<label for="more-rename-fname" class="">Primary email address</label>
						<input type="text" name="first-name" id="more-rename-fname2" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Kowaken" />
					</div>
					<div class="fxshrink_0 marb15 padb10">
						<span>@qmatchup.com</span>
					</div>
				</div>
			</div>
			<div class="talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Rename user</button>
			</div>
		</form>
		
	</div>
</div>

<!-- More - restore -->
<div class="popup_modal wi_550p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="more-restore-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			Restore data
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		<form>
			<div class="marb30">
				<p>Select data range and target services for data restore. <a href="#">Learn more</a>
				</p>
				
				<div class="wi_100 dflex xxs-fxwrap_w alit_c marb20 padb5">
					<div class="wi_50 xxs-wi_100 maxwi_100 flex_1 pos_rel marr15 marb15">
						<label for="more-restore-from" class="sr-only">From date</label>
						<input type="text" name="from" id="more-restore-from" class="datepicker2 wi_100 mart5 padtbl10 padr30 brd brdclr_dblue_f font_helvetica" placeholder="From" />
						<span class="fa fa-calendar-o pos_abs zi2 pos_cenY right8p padt1"></span>
					</div>
					<div class="wi_50 xxs-wi_100 maxwi_100 flex_1 pos_rel marr15 marb15">
						<label for="more-restore-to" class="sr-only">To date</label>
						<input type="text" name="to" id="more-restore-to" class="datepicker2 wi_100 mart5 padtbl10 padr30 brd brdclr_dblue_f font_helvetica" placeholder="To" />
						<span class="fa fa-calendar-o pos_abs zi2 pos_cenY right8p padt1"></span>
					</div>
					<div class="fxshrink_0 marb15">
						GMT+2:00
					</div>
				</div>
				
				<div class="padtb5">
					<label>
						<input type="radio" name="source" value="drive" />
						<img src="<?php echo $path;?>html/usercontent/images/icons/drive-32.png" width="28" height="28" class="marr5 marl10 valm" />
						<span class="valm">Drive</span>
					</label>
				</div>
				<div class="padtb5">
					<label>
						<input type="radio" name="source" vaue="gmail" />
						<img src="<?php echo $path;?>html/usercontent/images/icons/google_plus_32dp.png" width="28" height="28" class="marr5 marl10 valm" />
						<span class="valm">Gmail</span>
					</label>
				</div>
				
			</div>
			
			
			<div class="mart20 talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Restore data</button>
			</div>
		</form>
		
	</div>
</div>

<!-- More - suspend -->
<div class="popup_modal wi_480p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="more-suspend-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			Suspend Kowaken Ghirmai
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		
		<div class="marb30">
			This user will not be able to:
			<ul class="padl15">
				<li>Login to spam1-samf.com</li>
				<li>Access services like Gmail, Drive, Calendar, but data will not be deleted</li>
				<li>Receive invites sent to Gmail and Calendar</li>
			</ul>
			<p>
				Gmail delegates of the user (if any) will stop seeing him in Account Chooser
				<br> You will be able to activate this user later
			</p>
			<p>
				<strong class="txt_dd4b39">User license fees still apply to suspended users</strong>
			</p>
		</div>
		
		<form>
			<div class="talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Suspend user</button>
			</div>
		</form>
		
	</div>
</div>

<!-- More - delete -->
<div class="popup_modal wi_550p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="more-delete-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			User Deletion
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		<form>
			<div class="marb30">
				<p>Before deleting this account, you have the option to transfer data associated with the account to a new owner.</p>
				
				<div class="fsz13">
					Select data to transfer:
					<div class="martb10">
						<label>
							<input type="checkbox" name="drive-docs" />
							<img src="<?php echo $path;?>html/usercontent/images/icons/drive-32.png" width="28" height="28" class="marr5 marl10 valm" />
							<strong class="valm">
								Drive and Docs
							</strong>
						</label>
						<div class="padt15 padb10 padl30">
							<label>
								<input type="checkbox" name="shared" />
								<span>Also include data that is not shared with anyone</span>
							</label>
						</div>
					</div>
					<div class="martb10">
						<label>
							<input type="checkbox" name="google+pages" />
							<img src="<?php echo $path;?>html/usercontent/images/icons/google_plus_32dp.png" width="28" height="28" class="marr5 marl10 valm" />
							<strong class="valm">
								Google+ Pages
							</strong>
						</label>
						<div class="padt15 padb10 padl30">
							Data from all Brand Accounts will be transferred to a new primary owner. This includes Google+ Pages & Google My Business.
						</div>
					</div>
					<div class="mart20">
						<strong>Note:</strong> All data associated with this account (except data associated with the Google services selected above) will be deleted. <a href="#">Learn more</a>
					</div>
				</div>
			</div>
			
			
			<div class="talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Assign a new owner for this data</button>
			</div>
		</form>
		
	</div>
</div>


<!-- Popup fade -->
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

<div id="keep-selected" class="wi_100 hei_64p dflex xs-dnone sm-dnone alit_c justc_sb opa0 opa1_a pos_fix zi999 top-64p top0_a left0 padrl15 bxsh_0220_0_14_031-2_0_2_0150_0_12 bg_f trans_all2">
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
			<span id="keep-selected-count"></span> updated
		</div>
	</div>
	<div class="keep-actions wi_100 maxwi_250p dflex alit_c padtb10">
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1" onclick="submit_value();">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Pin">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Pin</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Remind me</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
			</a>
			<div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs zi2 top100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_e0 brdclr_80_h brdclr_80_a brdrad50 bg_f trans_all2 active" data-color="#fff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ff8a80 brdclr_80_h brdrad50 bg_ff8a80 trans_all2" data-color="#ff8a80"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffd180 brdclr_80_h brdrad50 bg_ffd180 trans_all2" data-color="#ffd180"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffff8d brdclr_80_h brdrad50 bg_ffff8d trans_all2" data-color="#ffff8d"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ccff90 brdclr_80_h brdrad50 bg_ccff90 trans_all2" data-color="#ccff90"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_a7ffeb brdclr_80_h brdrad50 bg_a7ffeb trans_all2" data-color="#a7ffeb"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_80d8ff brdclr_80_h brdrad50 bg_80d8ff trans_all2" data-color="#80d8ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_82b1ff brdclr_80_h brdrad50 bg_82b1ff trans_all2" data-color="#82b1ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_b388ff brdclr_80_h brdrad50 bg_b388ff trans_all2" data-color="#b388ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_f8bbd0 brdclr_80_h brdrad50 bg_f8bbd0 trans_all2" data-color="#f8bbd0"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_d7ccc8 brdclr_80_h brdrad50 bg_d7ccc8 trans_all2" data-color="#d7ccc8"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_cfd8dc brdclr_80_h brdrad50 bg_cfd8dc trans_all2" data-color="#cfd8dc"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
			</div>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Change color</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Archive</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">More</span>
			</div>
		</div>
	</div>
</div>


<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist2-fade" data-target="#menulist2-dropdown,#menulist2-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="organization-move-fade" data-target="#organization-move,#organization-move-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="add-userto-group-fade" data-target="#add-userto-group,#add-userto-group-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="more-fade" data-target="#more,#more-fade" data-classes="active" data-toggle-type="separate"></a>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
</body>

</html>