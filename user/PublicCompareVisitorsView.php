<html><head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg_verify.css">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		
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
		
		
			var langVar='sv';
			var keepGlobal=0;
			var send_data = {};
			send_data.general=0;
			send_data.post=0;
			send_data.byphone=0;
			
			function changeLanguage(id)
			{
				var send_data1={};
				send_data1.id=id;
				
				$.ajax({
					url: 'updateUserLanguage',
					type: 'POST',
					dataType: 'json',
					data: send_data1
				})
				.done(function(data){
				})
				.fail(function(){})
				.always(function(){});
			}
			
			
			
			
			var countries_flags = {
				'United States' : '<?php echo $path; ?>html/usercontent/images/flags/us.png',
				'Canada' : '<?php echo $path; ?>html/usercontent/images/flags/cd.png',
				'Turkey' : '<?php echo $path; ?>html/usercontent/images/flags/tr.png',
				'Sweden' : '<?php echo $path; ?>html/usercontent/images/slide/flag_sw.png',
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
					$phone.html('<img src="<?php echo $path; ?>html/usercontent/images/flags/default.png" style="width: auto; height: 18px; display: block;" />');
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
				send_data.user_id=document.getElementById('user_id').value;
				send_data.ssn=$(".ssn").text();
				send_data.name=$(".name").text();
				send_data.l_name=$(".l_name").text();
				send_data.dob=$(".dob").text();
				send_data.sex=$(".sex").text();
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				
				/*$.ajax({
					url: '../NewPersonal/updateData',
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
				//alert($(".addrs").text());
				//return false;
				
				send_data.post=send_data.post+1;
				//send_data.user_id=document.getElementById('user_id').value;
				send_data.addrs=$(".addrs").text();
				send_data.zip=$(".zip").text();
				send_data.city=$(".city").text();
				send_data.cntry=$(".cntry").text();
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				/*$.ajax({
					url: '../NewPersonal/updateDataPost',
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
				var send_data = {};
				send_data.user_id=document.getElementById('user_id').value;
				send_data.clear_number=$(".clear_number").text();
				send_data.bank_acc=$(".bank_acc").text();
				send_data.langu=$(".langu").text();
				
				
				/*$.ajax({
					url: '../NewPersonal/updateDataBank',
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
				//send_data.user_id=document.getElementById('user_id').value;
				send_data.phone=$(".phone").text();
				send_data.c_phone=$(".c_phone").text();
				
				var myJSON = JSON.stringify(send_data);
				$("#total_value").val(myJSON);
				/*$.ajax({
					url: '../NewPersonal/updateDataPhone',
					type: 'POST',
					dataType: 'json',
					data: send_data
					})
					.done(function(data){
					})
					.fail(function(){})
				.always(function(){});*/
			}
			
			
			function validateLogin()
			{
				
				// alert("hi"); return false;
				
				var cpass=$("#cpassword").val();
				var user=43;
				if($("#cpassword").val() == "")
				{
					alert("Enter current password");
					$("#cpassword").css("background-color","#FF9494");
					return false;
				}
				
				
				
				if($("#newpassword").val() == "" )
				{
                    $("#newpassword").css("background-color","#FF9494");
					alert("Enter New Password");
                    return false;
				}
				
				if($("#repassword").val() == "" )
				{
                    $("#repassword").css("background-color","#FF9494");
					alert("Re-Enter New Password");
                    return false;
				}
				
				if($("#repassword").val() != $("#newpassword").val())
				{
                    $("#repassword").css("background-color","#FF9494");
					$("#newpassword").css("background-color","#FF9494");
					alert("New password must match !!");
                    return false;
				}
				
				$.get("checkPassword/"+cpass+"/"+user,function(data1,status){
					//alert(user); return false;
					if(data1==0)
					{
						$("#cpassword").css("background-color","#FF9494");
						alert("Your current password don't match !!");
						return false;
					}
					else
					{
						document.getElementById("loginform").submit();	
					}
					
					
				});
				
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
			var translator = $('body').translate({lang: "sv", t: dict});
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
	
	<body class="white_bg">
			<?php $path1 = $path."html/usercontent/images/"; ?>
		<!-- HEADER -->
		<div class="column_m header xs-header  bs_bb white_bg">
			<div class="wi_100 xs-hei_40p hei_65p pos_fix padtb5 padrl10  white_bg">
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15 wi_140p">
					<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
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
													<div class="user_pic padt5"><a href="javascript:checkFlag();" data-value="sv" ><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:checkFlag();" class="fsz14 black_txt" data-value="sv" >  Svenska</a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:changeHeader();" data-value="en"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:changeHeader();" class="fsz14 black_txt" data-value="en" >  Engelska </a> </div>
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
					<ul class="mar0 pad0 sf-menu fsz16 sf-js-enabled sf-arrows">
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue first"> <a href="https://www.qloudid.com" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h " data-en="Privat" data-sw="Privat">Privat</a> </li>
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.qloudid.com/user/index.php/CorporateServices" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Företag" data-sw="Företag">Företag</a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue"> <a href="https://www.qloudid.com/user/index.php/PublicNews"  class="ranslate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="Partners" data-sw="Partners">Partners</a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel  brdclr_dblue hidden"> <a href="https://www.qloudid.com/user/index.php/InformRelatives" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt white_txt_h" data-en="sos" data-sw="sos">NOTIFY <span class="fa fa-heart red_txt"></span> F&F </a> </li>
						<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_lgrey2 lgtgrey2_bg brdrad5 marl20 "> <a href="https://www.qmatchup.com/beta/company/index.php/PublicAboutUs/companyAccount/N0ZvS0gycGRubUx4MlpxeTJNY1czZz09" id="usermenu_singin" class="translate hei_30pi dblock padrl20   lgn_hight_25 black_txt black_txt_h" data-en="About" data-sw="About">About</a> </li>
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20 last"> <a href="https://www.qloudid.com/user/index.php/LoginAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg_h  lgn_hight_30 black_txt  white_txt_h  brdl" data-en="Logga in" data-sw="Logga in">Logga in</a> </li>
					</ul>
				</div>
				
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3 "> <a href="https://www.qloudid.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
				<div class="clear"></div>
				
			</div>
		</div>
		
		
		<div class="clear" id=""></div>
		
		
		<!-- CONTENT -->
		<div class="column_m container  zi5  martb40 xs-mart20  padb20 brdb_new" onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
				
				
				
				<div class="wi_960p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  xs-pad0">
					<!-- About us -->
					<div class="zi1 padb5">
						<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
							<div class="white_bg tall">
								
								
								
								
								<!-- Logo -->
								<h1 class="fsz45 xz-fsz25 talc bold">Säkerhetsnivån för ditt konto</h1>
								<!-- Logo -->
								<div class="marb0"> <a href="#" class="blacka1_txt talc fsz25 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Vi har fyra nivåer av säkerhet för ett Qloud ID konto. De första 3 nivåerna kan du hantera med enkelhet med din dator och smartphone. Medans den fjärde alternativet kräver att du vänder dig till din arbetsgivare. Samtliga nivåer är kostnadsfria.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
									<!-- Meta -->
									
								</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
							</a>
							
							
						</div>
					</div>
					
						<div class="column_m container tab-header mart30 talc dark_grey_txt ">
						<ul class="tab-header tab-header-custom tab-header-custom7 xs-dnone lgtgrey2_bg">
						<li class="active">
						<a href="#" class="dblock brdradt5 active" data-id="tab_total0">
									<span class="count black_txt">4</span>
									<span class="black_txt trn fsz16"> </span>
								</a>
							</li>
						
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16 xs-fsz20">B </span>
								</a>
							</li>
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total2">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16 xs-fsz20">A </span>
								</a>
							</li>
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total1">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16 xs-fsz20">AA </span>
								</a>
							</li>
							
							
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total3">
									<span class="count black_txt">0</span>
									<span class="black_txt trn fsz16 xs-fsz20">AAA </span>
								</a>
							</li>
							
							<div class="clear"></div>
						</ul>
						
						<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb xs-fsz30 panlyellow_bg xs-wi_100">
						<option value="tab_total0" class="xs-fsz20 ">Description</option>
						<option value="tab_total" class="xs-fsz20 ">B</option>
						<option value="tab_total2" class="xs-fsz20 ">A</option>
						<option value="tab_total1" class="xs-fsz20 ">AA</option>
						<option value="tab_total3" class="xs-fsz20 ">AAA</option>
						</select>
						<div class="clear"></div>
					</div>
					
					<div class="column_m container   fsz14 dark_grey_txt">
						<div class="tab-content padt5 active" id="tab_total0" style="display: block;">
							
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_44_7 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Express Scheduling</div></a>
										</th>
										
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> B</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc ">
											<div class="padtb5 black_txt trn"> A</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> AA</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc yellow_bg">
											<div class="padtb5 black_txt trn"> AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Inbjudning skapas på</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Webben</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Outlook mail</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Gmail</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Inbjudan innehåller</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Address</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Parkering</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">WiFi</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">QR kod</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									</tbody>
								
							</table>
							
							
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_44_7 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Express Checkin</div></a>
										</th>
										
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> B</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc ">
											<div class="padtb5 black_txt trn"> A</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> AA</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc yellow_bg">
											<div class="padtb5 black_txt trn"> AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Checkin typer</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Dropin</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Besökare</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Inregistrering skapas av</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Besökare</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Arrangören</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Receptionist</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									
									</tbody>
								
							</table>
							
							
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_44_7 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Express Communicate</div></a>
										</th>
										
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> B</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc ">
											<div class="padtb5 black_txt trn"> A</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> AA</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc yellow_bg">
											<div class="padtb5 black_txt trn"> AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Arrangör meddelas via</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Email</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">SMS</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Arrangör informera</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">På ingång</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">om ev. försening</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>	
									
									
									</tbody>
								
							</table>
							
							
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_44_7 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Express Access</div></a>
										</th>
										
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> B</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc ">
											<div class="padtb5 black_txt trn"> A</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> AA</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc yellow_bg">
											<div class="padtb5 black_txt trn"> AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Besökaren kan via inbjudan (med QR kod) öppna</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Port</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Grind</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Speedgate</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
								
									
									
									</tbody>
								
							</table>
							
								<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_44_7 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Express Parking</div></a>
										</th>
										
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> B</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc ">
											<div class="padtb5 black_txt trn"> A</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> AA</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc yellow_bg">
											<div class="padtb5 black_txt trn"> AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Inregistrera bilen</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Webben</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Receptionen</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Lista på parkerade bilar i realtid</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
								
									
									
									</tbody>
								
							</table>
							
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_44_7 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Express Checkout</div></a>
										</th>
										
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> B</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc ">
											<div class="padtb5 black_txt trn"> A</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> AA</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc yellow_bg">
											<div class="padtb5 black_txt trn"> AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Utloggning av</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Besökaren</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Arrangören</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Receptionist</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
								
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Utregistrera bilen</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
								
								<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">I samband med "Express checkout"</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
								
									
									</tbody>
								
							</table>
							
							
							
								<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14" style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_44_7 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Express Escape</div></a>
										</th>
										
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> B</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc ">
											<div class="padtb5 black_txt trn"> A</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc  ">
											<div class="padtb5 black_txt trn"> AA</div>
										</th>
										<th class="wi_12 pad5 brdb_new nobold  talc yellow_bg">
											<div class="padtb5 black_txt trn"> AAA</div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Evakuerings sida</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Besökare i lokal i realtid</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja**</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Avbockning vid kris</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 ">Ring saknade</div>
										</td>
										
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd ">
											<div class="padtb5 ">Ja</div>
										</td>
										<td class="pad5 brdb_new talc bg_fffbcc">
											<div class="padtb5">
												Ja
											</div>
										</td>
										
									</tr>
								
									
									
									</tbody>
								
							</table>
							
						</div>
					
						<!-- Summary -->
						
					</div>
					
					
					
					
					
					
					
					
				</div>
				
				
				
				
				
				
			</div>
			<div class="clear"></div>
		
		</div>
		
		
		<div class="column_m padb20  xs-padtb10 talc lgn_hight_22 fsz16 white_bg ">
				
				<div class="wrap maxwi_100 xs-marb30 xs-padb30 xs-padrl25 padt40 padb40  white_bg">
					<div class="dflex xs-dblock justc_c alit_c fsz22 xs-fsz18 darkgrey_txt padrl30 padb40 brdb_new  xs-padrl0">
						<div class="wi_20 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-1.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_60 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="#" class="marr5 black_txt">NYHET</a>
							</div>
							<h2 class="padb15 bold fsz35 xs-fsz22 black_txt lgn_hight_40">Qloud ID Business</h2>
							<div class="lgn_hight_30 black_txt">Qloud ID Visitor välkomnar era besökare och håller er informerade om alla besökare under hela dagen. Ett modernt digitalt besökssystem som höjer säkerheten och förmedlar ett professionellt första intryck.</div>
							
							
							
						</div>
						<div class="wi_20 xs-wi_100 fsz70 yellow_txt">
							<a href="https://www.qloudid.com/user/index.php/ManageVisitors"><span class="fas fa-arrow-alt-circle-right"></span></a>
						</div>
					</div>
					<div class="dflex xs-dblock justc_c alit_c fsz22 xs-fsz18 darkgrey_txt padrl30  xs-padrl0 padtb40 brdb_new">
						<div class="wi_20 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-1.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_60 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="#" class="marr5 black_txt">NYHET</a>
							</div>
							<h2 class="padb15 bold fsz35 xs-fsz22 black_txt lgn_hight_40">Inköpsportal</h2>
							<div class="lgn_hight_30 black_txt">Qlean Data håller din personal- och kunddatabasuppdaterad, färsk och GDPR-anpassad. Rätt information snabbar upp säljprocessen och minskar arbetsbelastningen på HR- och Ekonomiavdelningen. </div>
							
							
						</div>
						<div class="wi_20 xs-wi_100 fsz70 yellow_txt">
							<span class="fas fa-arrow-alt-circle-right"></span>
						</div>
					</div>
					<div class="dflex xs-dblock justc_c alit_c fsz22 xs-fsz18 darkgrey_txt padrl30  xs-padrl0 padtb40 brdb_new">
						<div class="wi_20 xs-wi_100">
							<img src="../../html/smartappcss/images/smart/design-1.png" class="wi_100 hei_auto">
						</div>
						<div class="wi_60 xs-wi_100 bs_bb padl40 xs-padl0 tall">
							<div class="padb5 fsz18 xs-fsz16 tall">
								<a href="#" class="marr5 black_txt">NYHET</a>
							</div>
							<h2 class="padb15 bold fsz35 xs-fsz22 black_txt lgn_hight_40">Bemanningsportal</h2>
							<div class="lgn_hight_30 black_txt">Var beredd innan nästa incident inträffar.Samordna beredskapsteamet och ha ett klart och tydligt krishanteringssystem när en oväntad händelse inträffar. </div>
							
							
							
						</div>
						<div class="wi_20 xs-wi_100 fsz70 yellow_txt">
							<span class="fas fa-arrow-alt-circle-right"></span>
						</div>
					</div>
					
				</div>
				
				
				
			</div>	
			
		<?php include 'PublicUserFooter.php'; ?>
	<div class="clear"></div>
	

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
					<img src="<?php echo $path; ?>html/usercontent/images/icons/add-person.svg" width="18" height="24" class="dblock opa50" alt="Collaborator">
				</div>
				<div class="flex_1 padr40 padl15 fsz13">
					<input type="text" name="name" id="collaborators-lookup" class="wi_100 dblock nobrd ui-autocomplete-input" placeholder="Person or email to share with" autocomplete="off">
					<div class="dnone dblock_pa pos_abs pos_cenY right0">
						<button type="submit" class="dblock opa50 opa1_h mar0 pad3 nobrd bg_trans curp trans_opa2">
							<img src="<?php echo $path; ?>html/usercontent/images/icons/check.svg" width="18" height="18" class="dblock">
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
			<div class="marb20"> <img src="<?php echo $path; ?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto"> </div>
			<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
			<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
				<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
				<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
				<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
				<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
				<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
				<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
			</div>
			<div class="marb25">
			<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
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
			<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
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
			<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
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
				<input type="text" name="name" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Name of the organization">
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
		
		<div class="tab-content padt20 active" id="reset-pass-set" style="display: block;">
			<form action="changePassword" method="POST" id="loginform">
				<div class="wi_100 minhei_190p padb15">
					<div class="dflex fxwrap_w alit_fs padb5">
						<div class="wi_100 maxwi_100 marr15 marb15">
							<label for="reset-pass-password" class="sr-only">Password</label>
							<input type="password" name="cpassword" id="cpassword" class="wi_175p mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Type Current Password">
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<label for="reset-pass-password" class="sr-only">Password</label>
							<input type="password" name="newpassword" id="newpassword" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Type New Password">
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<label for="reset-pass-retype" class="sr-only">Password</label>
							<input type="password" name="repassword" id="repassword" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Retype New Password">
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
						<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="require-change" value="1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
							<input type="password" name="password" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f trans_bg font_helvetica" value="qweqweqweqwe" disabled="">
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<input type="password" name="retype-password" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f trans_bg font_helvetica" value="qweqweqweqwe" disabled="">
						</div>
					</div>
					<label>
						<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="require-change" value="1" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
						<input type="text" name="first-name" id="more-rename-fname1" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Kowaken">
					</div>
					<div class="wi_175p maxwi_100 marr15 marb15">
						<label for="more-rename-lname" class="">Last name</label>
						<input type="text" name="last-name" id="more-rename-lname" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Ghirmai">
					</div>
				</div>
				<div class="wi_365p maxwi_100 dflex alit_fe padb5">
					<div class="flex_1 marb15">
						<label for="more-rename-fname" class="">Primary email address</label>
						<input type="text" name="first-name" id="more-rename-fname2" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Kowaken">
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
						<input type="text" name="from" id="more-restore-from" class="datepicker2 wi_100 mart5 padtbl10 padr30 brd brdclr_dblue_f font_helvetica hasDatepicker" placeholder="From">
						<span class="fa fa-calendar-o pos_abs zi2 pos_cenY right8p padt1"></span>
					</div>
					<div class="wi_50 xxs-wi_100 maxwi_100 flex_1 pos_rel marr15 marb15">
						<label for="more-restore-to" class="sr-only">To date</label>
						<input type="text" name="to" id="more-restore-to" class="datepicker2 wi_100 mart5 padtbl10 padr30 brd brdclr_dblue_f font_helvetica hasDatepicker" placeholder="To">
						<span class="fa fa-calendar-o pos_abs zi2 pos_cenY right8p padt1"></span>
					</div>
					<div class="fxshrink_0 marb15">
						GMT+2:00
					</div>
				</div>
				
				<div class="padtb5">
					<label>
						<div class="iradio_minimal-aero" style="position: relative;"><input type="radio" name="source" value="drive" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
						<img src="<?php echo $path; ?>html/usercontent/images/icons/drive-32.png" width="28" height="28" class="marr5 marl10 valm">
						<span class="valm">Drive</span>
					</label>
				</div>
				<div class="padtb5">
					<label>
						<div class="iradio_minimal-aero" style="position: relative;"><input type="radio" name="source" vaue="gmail" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
						<img src="<?php echo $path; ?>html/usercontent/images/icons/google_plus_32dp.png" width="28" height="28" class="marr5 marl10 valm">
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
							<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="drive-docs" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
							<img src="<?php echo $path; ?>html/usercontent/images/icons/drive-32.png" width="28" height="28" class="marr5 marl10 valm">
							<strong class="valm">
								Drive and Docs
							</strong>
						</label>
						<div class="padt15 padb10 padl30">
							<label>
								<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="shared" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
								<span>Also include data that is not shared with anyone</span>
							</label>
						</div>
					</div>
					<div class="martb10">
						<label>
							<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="google+pages" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
							<img src="<?php echo $path; ?>html/usercontent/images/icons/google_plus_32dp.png" width="28" height="28" class="marr5 marl10 valm">
							<strong class="valm">
								Google+ Pages
							</strong>
						</label>
						<div class="padt15 padb10 padl30">
							Data from all Brand Accounts will be transferred to a new primary owner. This includes Google+ Pages &amp; Google My Business.
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
				<img src="../../..//html/keepcss/images/icons/icon-arrow-left.svg" width="24" height="24" class="maxwi_100 hei_auto" alt="Clear selection">
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
				<img src="../../../html/keepcss/images/icons/pin.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Pin">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Pin</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="../../../html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Remind me</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="../../../html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
			</a>
			<div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs zi2 top100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_e0 brdclr_80_h brdclr_80_a brdrad50 bg_f trans_all2 active" data-color="#fff"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ff8a80 brdclr_80_h brdrad50 bg_ff8a80 trans_all2" data-color="#ff8a80"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffd180 brdclr_80_h brdrad50 bg_ffd180 trans_all2" data-color="#ffd180"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffff8d brdclr_80_h brdrad50 bg_ffff8d trans_all2" data-color="#ffff8d"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ccff90 brdclr_80_h brdrad50 bg_ccff90 trans_all2" data-color="#ccff90"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_a7ffeb brdclr_80_h brdrad50 bg_a7ffeb trans_all2" data-color="#a7ffeb"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_80d8ff brdclr_80_h brdrad50 bg_80d8ff trans_all2" data-color="#80d8ff"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_82b1ff brdclr_80_h brdrad50 bg_82b1ff trans_all2" data-color="#82b1ff"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_b388ff brdclr_80_h brdrad50 bg_b388ff trans_all2" data-color="#b388ff"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_f8bbd0 brdclr_80_h brdrad50 bg_f8bbd0 trans_all2" data-color="#f8bbd0"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_d7ccc8 brdclr_80_h brdrad50 bg_d7ccc8 trans_all2" data-color="#d7ccc8"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_cfd8dc brdclr_80_h brdrad50 bg_cfd8dc trans_all2" data-color="#cfd8dc"><img src="../../../html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
			</div>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Change color</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="../../../html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Archive</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="../../../html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
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

<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>





<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div><iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe><div id="GOOGLE_INPUT_CHEXT_FLAG" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}" style="display: none;"></div></body></html>