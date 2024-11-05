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
		
		if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; }
		function month_s($value)
		{
			if($value==1)
			{
				return "January";
			}
			else if($value==2)
			{
				return "February";
			}
			else if($value==3)
			{
				return "March";
			}
			else if($value==4)
			{
				return "April";
			}
			else if($value==5)
			{
				return "May";
			}
			else if($value==6)
			{
				return "June";
			}
			else if($value==7)
			{
				return "July";
			}
			else if($value==8)
			{
				return "August";
			}
			
			else if($value==9)
			{
				return "September";
			}
			else if($value==10)
			{
				return "October";
			}
			else if($value==11)
			{
				return "November";
			}
			else if($value==12)
			{
				return "December";
			}
		}
		
		
	?>
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
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
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
				var user=<?php echo $data['user_id']; ?>;
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
				
				$.get("../ChangePassword/checkPassword/"+cpass+"/"+user,function(data1,status){
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
			
			function searchUser()
			{
				/*if($("#reque").val()!=3 || $("#reque").val()!=2)
					{
					alert("Please select code!!!");
					return false;
				}*/
				if($("#reque").val()==1)
				{
					if($("#cntryph").val()==0)
					{
						alert("Please select country!!!");
						return false;
					}
					else if($("#phoneno").val()=="" || $("#phoneno").val()==null)
					{
						alert("Please enter phone number!!!");
						return false;
					}
					else
					{
						var send_data={};
						send_data.countryname=$("#cntryph").val();
						send_data.phoneno=$("#phoneno").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/StoreData/userAccount";
								}
								
							}
						});
					}
					
				}
				
				else if($("#reque").val()==3)
				{
					if($("#code_id").val()=="" || $("#code_id").val()==null)
					{
						alert("Please enter your verification code!!!");
						return false;
					}
					else
					{
						var send_data={};
						send_data.id=$("#code_id").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/StoreData/userAccount";
								}
								
							}
						});
					}
					
				}
				
				else if($("#reque").val()==2)
				{
					var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
					if (!reg.test($("#email_id").val())){
						
						$("#email_id").css("background-color","#FF9494");
						alert("Incorrect Email address format");
						return false;
						
					}
					if($("#email_id").val()=="" || $("#email_id").val()==null)
					{
						alert("Please enter your verification email!!!");
						return false;
					}
					
					else
					{
						var send_data={};
						send_data.email_id=$("#email_id").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/StoreData/userAccount";
								}
								
							}
						});
					}
					
				}
				else
				{
					alert("Please select code!!!");
					return false;
				}
				
				
			}
			
			
			function submit_unique()
			{
				if($("#unique_id").val()=="" || $("#unique_id").val()==null)
				{
					alert("Please enter your unique code!!!");
					return false;
				}
				document.getElementById("save_indexing_unique").submit();
			}
			
			function selectCode(id)
			{
				
				
				if(id==3)
				{
					document.getElementById("phoneSelect").style.display='none';
					document.getElementById("codeSelect").style.display='block';
					document.getElementById("emailSelect").style.display='none';
				}
				else if(id==2)
				{
					document.getElementById("phoneSelect").style.display='none';
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='block';
				}
				else if(id==1)
				{
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='none';
					document.getElementById("phoneSelect").style.display='block';
				}
				else
				{
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='none';
					document.getElementById("phoneSelect").style.display='none';
				}
			}
			
			
		</script>
	</head>
	
	<body class="white_bg" >
		
		<!-- HEADER -->
		<?php include 'UserHeaderUpdated.php'; ?><div class="clear" id=""></div>
		
		
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart20" onclick="removeActive();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
				<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt"><?php echo $row_summary['last_name']; ?></a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz40 xs-fsz30 sm-fsz30 
														bold"><?php echo $row_summary['first_name']; ?></a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php date_default_timezone_set("Europe/Stockholm");   echo date("D F j, Y"); ?></span>  </div>
													</a></div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									
									
									
									<ul class="marr20 pad0">
										
										<li class=" dblock padrb10  padl8">
											<a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Dina samtycken </span><span class="counter_position"><?php echo $receivedAllCount; ?></span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										
										<li class=" dblock padrb10  padl8">
											<a href="https://www.qloudid.com/user/index.php/NewsfeedDetail" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar </span> 
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<?php if($resultOrg1['ssn']=="" || $resultOrg1['ssn']== null || $resultOrg1['ssn']== 0) { ?>
										<li class=" dblock padrb10  padl8">
											<a href="#" class=" lgtgrey_bg  hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a show_popup_modal" data-target="#gratis_msg">
												<span class="fa fa-address-card-o wi_20p dnone_pa " ></span>
												<span class="valm trn">Anmäl ID Kapad </span> 
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										<?php } else { ?>
									<li class=" dblock padrb10  padl8">
											<a href="../IDKapad" class=" <?php if($hijackedUser['num']==0) echo 'lgtgrey_bg '; else echo 'red_bg '; ?> hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Anmäl ID Kapad </span> 
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<?php } ?>
										
									</ul>
									
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										<!-- Company -->
										<li class=" dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Mitt ID Skydd...</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="#" class=" active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   greyblue_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Mina uppgifter</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../AboutQmatchupOmOss" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Mitt ID Skydd</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../GetVerified/userAccount" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Mitt s&auml;kerhetsl&aring;s</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li>
										
										
										<li class=" dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">GÅ TILL DIN...</h4>
											<ul class="marr20 pad0">
												
												
												<li class="dblock padrb10">
													<a href="../Arbetsplats" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Arbetsplats</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../Bostad" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Bostad</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../Skola" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Skola</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../Leverantor" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Leverantör</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										
										<li class=" dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Förmyndare</h4>
											<ul class="marr20 pad0">
												
												
												<li class="dblock padrb10">
													<a href="../Dependents/dependentList" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Mina barn</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										
										
										
										
									
										
										
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 xsi-padl0  padl20 xs-padl0">
						
						<div class="padb20 xxs-padb0 ">
							<!-- Charts -->
							
							<div class="column_m container zi1 padb5">
								<div class="wrap maxwi_100 dflex alit_fe justc_sb pos_rel padb10 brdb_new">
									<div class="white_bg tall">
										
										
										
										
										<!-- Logo -->
										<h1 class="fsz25 bold">Mina personliga uppgifter</h1>
										<!-- Logo -->
										<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Tag kontrollen över dina uppgifter. Uppdatera och dela till alla från en plats... </a></div>
										<!-- Meta -->
										
									</div>
									<div class="hidden-xs hidden-sm padrl10">
										<a href="https://www.qloudid.com/user/index.php/BoughtProducts" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt">
											
											<span class="valm">Min historik</span>
										</a>
									</div>	
									
								</div>
								
								
								<div class=" lgtgrey2_bg mart5  brdrad3  marb20" style="">
									<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											
											<!--<div class="clear hidden-xs"></div>-->
											
											<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
												<div class="container marrl-2 padl15 xs-padl0 xs-marrl0">
													<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0 xs-padb10"> <span class="trn xs-fsz14" >Country of residence</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16 clear_number xs-fsz20"><?php if($row_summary['country_name']!="" || $row_summary['country_name']!= null) echo $row_summary['country_name']; else echo "-"; ?> </span></div>
													
													
													
													<input type="hidden" id="user_id" value="<?php echo $data['user_id']; ?>" />
													
												</div>
												
											</div>
											
											
											
											
											<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
											<!-- <div class="clear hidden-xs"></div>-->
										</div>
										
										<div class="clear"></div>
										 
									</div>
								</div>
								
								<div class=" lgtgrey2_bg mart5  brdrad3  marb20" style="">
									<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											
											<!--<div class="clear hidden-xs"></div>-->
											
											<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
												<div class="container marrl-2 padl15 xs-padl0 xs-marrl0">
													<div class="wi_100 xs-wi_70 xsip-wi_70 xsi-wi_70 marl15 xs-marl25 padb15"> <span class="trn xs-fsz14">Personnummer</span> <span class=" edit-text jain dblock brdb brdclr_lgtgrey2 fsz20"><?php if($resultOrg1['ssn']!="" || $resultOrg1['ssn']!= null) echo $resultOrg1['ssn']; else echo "-"; ?> <span class="fsz16 xs-fsz14 bold <?php if($userBankid==1 && $row_summary['grading_status']==2) { echo 'green_txt'; } else { echo 'red_txt'; } ?>"><?php if($userBankid==1 && $row_summary['grading_status']==2) { echo '(Verified)'; } else { echo '(Not verified)'; } ?></span> </span> </div>
													
													
													
													<input type="hidden" id="user_id" value="<?php echo $data['user_id']; ?>" />
													
												</div>
												
											</div>
											
											
											
											
											<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
											<!-- <div class="clear hidden-xs"></div>-->
										</div>
										
										<div class="clear"></div>
										 
									</div>
								</div>
								
								<div class=" lgtgrey2_bg mart5  brdrad3  " style="">
									<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											
											<!--<div class="clear hidden-xs"></div>-->
											
											<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
												<div class="container marrl-2 padl15 xs-padl0 xs-marrl0">
													<div class="wi_100 xs-wi_70 xsip-wi_70 xsi-wi_70 marl15 xs-marl25 padb15"> <span class="trn xs-fsz14">Mobil</span>

													<div class="dflex alit_c pos_rel brdb brdclr_lgtgrey2">
															
															<span class="padr5 uppercase fsz16 xs-fsz20" id="phone-country"><?php if($resultOrg1['country_code']!="" || $resultOrg1['country_code']!= null) echo '+'.$resultOrg1['country_code']; ?></span>
															<span class=" dblock flex_1  wordb_ba curt xs-fsz20 fsz16 phone"><?php if($resultOrg1['phone_number']!="" || $resultOrg1['phone_number']!= null) echo $resultOrg1['phone_number']; else echo "-"; ?>  <span class="xs-fsz14 <?php if($rowsummary['phone_verified']==0) { echo 'red_txt'; } else { echo 'green_txt'; } ?> bold"><?php if($rowsummary['phone_verified']==0) { echo '(Not verified)'; } else { echo '(Verified)'; } ?></span> </span>  
														</div> </div>
													
													
													
													<input type="hidden" id="user_id" value="<?php echo $data['user_id']; ?>" />
													
												</div>
												
											</div>
											
											
											
											
											<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
											<!-- <div class="clear hidden-xs"></div>-->
										</div>
										
										<div class="clear"></div>
										
										<div class=" mart20 talc fsz16  " > <a href="addPhoneNumber" class="dblue_btn trn brdrad3" data-trn-key="Uppdatera">Uppdatera </a> </div>
										
									</div>
								</div>
								
								<div class=" white_bg brdrad3 mart30" >
									<div class=" container pad25  xs-pad0 xs-padb20   fsz14 dark_grey_txt lgtgrey2_bg  brdrad3">
										
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall marrl10 brdrad3 xs-marrl0">
											<div class="wi_100 pos_abs xs-pos_sta top0 right0">
												<div class="dflex alit_c justc_fe marb10 hidden-xs">
													<div class="pos_rel">
														
													</div>
													<div class="pos_rel hidden">
														<a href="#" class="show_popup_modal dblock opa50 opa1_h pad10 trans_opa2" data-target="#reset-pass-modal">
															<img src="<?php echo $path;?>html/usercontent/images/icons/reset-password-24.svg">
														</a>
														<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
															<span class="dblock padrl8">Reset password</span>
														</div>
													</div>
													<div class="pos_rel hidden">
														<a href="#" class="class-toggler dblock opa50 opa1_h pad10 trans_opa2" onclick="addActive();" data-classes="active">
															<img src="<?php echo $path;?>html/usercontent/images/icons/more.svg">
														</a>
														<div class="wi_120p dnone dblocki_a pos_abs zi40 top100 right-20p bxsh_02100_105112113_05 brd bg_f" id="more">
															<div>
																<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_rename();">Rename</a>
																<a href="#" class="show_popup_modal dnone" data-target="#more-rename-modal">Show modal</a>
																<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
															</div>
															<div>
																<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_restore();">Restore data</a>
																<a href="#" class="show_popup_modal dnone" data-target="#more-restore-modal">Show modal</a>
																<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
															</div>
															<div>
																<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_suspend();">Suspend</a>
																<a href="#" class="show_popup_modal dnone" data-target="#more-suspend-modal">Show modal</a>
																<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
															</div>
															<div>
																<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_delete();">Delete</a>
																<a href="#" class="show_popup_modal dnone" data-target="#more-delete-modal">Show modal</a>
																<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="idcard_header wi_100 xs-wi_70 xs-order_2 bs_bb marb10 xs-padl15 sm-padl5 hidden-xs">
												<h2 class="dnone xs-dblock padb15 uppercase  fsz18 trn">Cloud ID Business</h2>
												<div>
													<span class="dblock xs-dnone  fsz14 trn"><?php echo $row_summary ['country_name']; ?></span>
													<img src="<?php echo $path;?>html/usercontent/images/flag.png" width="40" class="marr5 valm hidden">
													
													<span class="valm bold xs-nobold fsz20 xs-fsz15 trn">Qloud ID Privat</span>
													
												</div>
												<div class="dnone xs-dblock mart10 marb20">
													<img src="<?php echo $path;?>html/usercontent/images/score.png" width="40" class="marr5 valm">
													<span class="valm bold xs-nobold fsz24 xs-fsz15">100/70</span>
												</div>
											</div>
											<!--<div class="clear hidden-xs"></div>-->
											<div class="wi_30 xxs-wi_100 xxs-padrl100  xs-order_1">
												
												<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
													
													<div class="imgwrap nobrd">
														<div class="cropped_image <?php if($row_summary ['passport_image']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" id="image-data-1" name="image-data-1"></div>
														
													</div>
													
													
													<div class="qapscore_bord hidden-xs brdrad5" style="position: absolute; z-index: 1; top: 205px; right: -5px;">
														
														<div class="scorenew scorelevelnew"><?php if($row_summary['grading_status']==0) { echo "B"; } else if($row_summary['grading_status']==1 && $rowsummary['phone_verified']==1) { echo "A"; } else if($userBankid==1 && $row_summary['grading_status']==2 && $rowsummary['phone_verified']==0) { echo "AA-"; } else if($userBankid==1 && $row_summary['grading_status']==2 && $rowsummary['phone_verified']==1) { echo "AA+"; } ?></div>
													</div>
													
												</div>
												
												
												
											</div>
											<div class="wi_70 xs-wi_100 xsip-wi_70 xsi-wi_70 xs-order_3 xs-padt10 fsz12">
												
												
												
												
												<div class="container marrl-8 xs-marrl0 xs-padl0">
												<div class="fleft marl25 wi_40 xs-wi_40  bs_bb  xs-padb15 padb15"> <span class="trn xs-fsz14">Efternamn</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 xs-fsz20"><?php echo $resultOrg['last_name']; ?></span> </div>
												<div class="fleft  wi_50 xs-wi_50 sm-wi_50 bs_bb padrl2 padb15 xs-padb15 xs-padl15"> <span class="trn xs-fsz14">Förnamn</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16 xs-fsz20"><?php echo $resultOrg['first_name']; ?></span> </div>
												
												
												
													<div class="fleft marl25 wi_40 xs-wi_50 sm-wi_40 xsip-wi_40 bs_bb  xs-padb15"> <span class="trn xs-fsz14">Adress</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16 xs-fsz20"><?php if($resultOrg1['address']!="" || $resultOrg1['address']!= null) echo $resultOrg1['address']; else echo "-"; ?> </span></div>
													<div class="fleft  wi_25 xs-wi_50 sm-wi_20 bs_bb padrl2 xs-padb15 xs-padl25"> <span class="trn xs-fsz14">Zipcode</span> <span class=" edit-text dblock brdb brdclr_lgtgrey2 fsz16 xs-fsz20"><?php if($resultOrg1['zipcode']!="" || $resultOrg1['zipcode']!= null) echo $resultOrg1['zipcode']; else echo "-"; ?> </span></div>
													<div class="fleft  wi_25 xs-wi_50 sm-wi_25  bs_bb padrl2 xs-padb15 "> <span class="trn xs-fsz14">City</span> <span class=" edit-text dblock brdb brdclr_lgtgrey2 fsz16 xs-fsz20"><?php if($resultOrg1['city']!="" || $resultOrg1['city']!= null) echo $resultOrg1['city']; else echo "-"; ?> </span></div>
													<div class="fleft marl25 wi_40 xs-wi_50 sm-wi_40 xsip-wi_40 bs_bb  xs-padb15 xs-padt0 padt15"> <span class="trn xs-fsz14">Födelsedatum</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16 xs-fsz20"><?php echo $resultOrg['dob_month'].'/'.$resultOrg['dob_day'].'/'.$resultOrg['dob_year']; ?></span> </div>
													<div class="fleft wi_25  xs-wi_50 sm-wi_20 xsip-wi_25 bs_bb padrl2 xs-padb15 xs-padt0 padt15 xs-padl25"> <span class="trn xs-fsz14">Kön</span> <span class=" edit-select dblock brdb brdclr_lgtgrey2 uppercase curt fsz16 xs-fsz20" data-options="M,F,T"><?php if($resultOrg['sex']==1) echo "M"; else if($resultOrg['sex']==2) echo "F"; else echo "T"; ?></span> </div>
													
													<div class="fleft  wi_25 xs-wi_50 sm-wi_20 bs_bb padrl2 xs-padb15 padt15 xs-padt0"> <span class="trn xs-fsz14">Skapad datum</span> <span class="  dblock brdb brdclr_lgtgrey2 uppercase curt fsz16 xs-fsz20"><?php echo date('m/d/Y', strtotime("+0 days", strtotime($resultOrg['created_on']))); ?></span> </div>
													
													
													
													<div class="fleft wi_100 xs-wi_70 xsip-wi_70 xsi-wi_70 bs_bb marl25 padtb15 xs-padt0 ">
														<span class="trn xs-fsz14">Mobil</span>
														<div class="dflex alit_c pos_rel brdb brdclr_lgtgrey2">
															
															<span class="padr5 uppercase fsz16 xs-fsz20" id="phone-country"><?php if($resultOrg1['country_code']!="" || $resultOrg1['country_code']!= null) echo '+'.$resultOrg1['country_code']; ?></span>
															<span class=" dblock flex_1  wordb_ba curt xs-fsz20 fsz16 phone"><?php if($resultOrg1['phone_number']!="" || $resultOrg1['phone_number']!= null) echo $resultOrg1['phone_number']; else echo "-"; ?>  <span class="xs-fsz14 <?php if($rowsummary['phone_verified']==0) { echo 'red_txt'; } else { echo 'green_txt'; } ?> bold"><?php if($rowsummary['phone_verified']==0) { echo '(Not verified)'; } else { echo '(Verified)'; } ?></span> </span>  
														</div>
													</div>
													
													<div class="fleft wi_90  bs_bb marl25">
														<span class="trn xs-fsz14">E-post </span>
														<div class="dflex alit_c pos_rel brdb brdclr_lgtgrey2">
															
															
															<span class=" dblock flex_1  wordb_ba curt fsz16 xs-fsz20 hidden-xs"><?php if($resultOrg['email']!="" || $resultOrg['email']!= null) echo $resultOrg['email']; else echo "-"; ?><span class="green_txt fsz16 bold"> (Verified)</span></span>
															<span class=" dblock flex_1  wordb_ba curt fsz16 bold xs-fsz20 visible-xs"><?php if($resultOrg['email']!="" || $resultOrg['email']!= null){ if(strlen($resultOrg['email'])>16) echo substr($resultOrg['email'],0,16)."..."; else echo $resultOrg['email']; } else echo "-"; ?><span class="green_txt fsz16 xs-fsz14"> (Verified)</span></span>
														</div>
													</div>
													<input type="hidden" id="user_id" value="<?php echo $data['user_id']; ?>" />
													<form method="POST" action="../Verify/domainAccount" id="save_indexing" name="save_indexing" >
														<input type="hidden" id="total_value" name="total_value" value='' />
													</form>
												</div>
												
											</div>
											
											
											
											<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
											<!-- <div class="clear hidden-xs"></div>-->
										</div>
										<div class="clear"></div>
										
										<div class=" mart20 talc fsz16  " > <a href="../NewPersonal/userAccount" class="dblue_btn trn brdrad3" data-trn-key="Uppdatera ">Uppdatera </a> </div>
									</div>
								</div>
								<div class=" mart30 xs-marrl0 sm-marrl0 white_bg">
									
									<div class=" marb10 brdb_new">
										<h2 class="fleft mar0 padb5 fsz15">Bank uppgifter</h2>
										<div class="fright pos_rel padb5 fsz14">
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
								
								
								<div class=" lgtgrey2_bg mart5  brdrad3  " style="">
									<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											
											<!--<div class="clear hidden-xs"></div>-->
											
											<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
												<div class="container marrl-2 padl15 xs-padl0 xs-marrl0">
													<div class="fleft wi_25 xs-wi_100 sm-wi_25 xsip-wi_25 marl15 xs-mar0 xs-padb15"> <span class="trn xs-fsz14" data-trn-key="Clearing nummer">Clearing nummer</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16 clear_number xs-fsz20"><?php if($resultOrg1['clearing_number']!="" || $resultOrg1['clearing_number']!= null) echo $resultOrg1['clearing_number']; else echo "-"; ?> </span></div>
													
													<div class="fleft wi_25 xs-wi_100 sm-wi_25 xsip-wi_25 marl15 xs-mar0  xs-padb15"> <span class="trn xs-fsz14" data-trn-key="Bank konto">Bank konto</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 bank_acc xs-fsz20"><?php if($resultOrg1['bank_account_number']!="" || $resultOrg1['bank_account_number']!= null) echo $resultOrg1['bank_account_number']; else echo "-"; ?></span> </div>
													<div class="fleft wi_25 xs-wi_100 sm-wi_25 marl15 xsip-wi_25 xs-mar0  xs-padb15"> <span class="trn xs-fsz14" data-trn-key="Bank namn">Bank namn</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16 langu xs-fsz20"><?php if($resultOrg1['language']!="" || $resultOrg1['language']!= null) echo $resultOrg1['language']; else echo "-"; ?></span> </div>
													
													<input type="hidden" id="user_id" value="<?php echo $data['user_id']; ?>" />
													
												</div>
												
											</div>
											
											
											
											
											<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
											<!-- <div class="clear hidden-xs"></div>-->
										</div>
										
										<div class="clear"></div>
										
										<div class=" mart20 talc fsz16  " > <a href="../NewPersonal/userAccount" class="dblue_btn trn brdrad3" data-trn-key="Uppdatera">Uppdatera </a> </div>
									</div>
								</div>
								
									<div class=" mart30 xs-marrl0 sm-marrl0 white_bg">
									
									<div class=" marb10 brdb_new">
										<h2 class="fleft mar0 padb5 fsz15">Mina kort</h2>
										<div class="fright pos_rel padb5 fsz14">
											<a href="#" class="class-toggler" data-target="#profile-dropdownn,#profile-faden" data-classes="active">
												<span>Mina kort</span>
												<span class="fa fa-angle-down"></span>
											</a>
											<div id="profile-dropdownn" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
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
								
								
								<div class=" lgtgrey2_bg mart5  brdrad3  " style="">
									<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											
											<!--<div class="clear hidden-xs"></div>-->
											<?php foreach($userCardDetail  as $category => $value) { ?>
											<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12 marb20">
												<div class="container marrl-2 padl15 xs-padl0 xs-marrl0">
													<div class="fleft wi_25 xs-wi_100 sm-wi_25 xsip-wi_25 marl15 xs-mar0 xs-padb15"> <span class="trn xs-fsz14" data-trn-key="Card nummer">Card nummer</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16 clear_number xs-fsz20"><?php echo $value['card_number']; ?> </span></div>
													
													<div class="fleft wi_25 xs-wi_100 sm-wi_25 xsip-wi_25 marl15 xs-mar0  xs-padb15"> <span class="trn xs-fsz14" data-trn-key="Expire on">Expire on</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 bank_acc xs-fsz20"><?php echo month_s($value['exp_month'])."/".$value['exp_year']; ?></span> </div>
													<div class="fleft wi_25 xs-wi_100 sm-wi_25 xsip-wi_25 marl15 xs-mar0  xs-padb15"> <span class="trn xs-fsz14" data-trn-key="Card type">Card type</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16 langu xs-fsz20"><?php echo $value['card_type']; ?></span> </div>
													
												</div>
												
											</div>
											
											<?php } ?>
											
											
											<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
											<!-- <div class="clear hidden-xs"></div>-->
										</div>
										
										<div class="clear"></div>
										
										<div class=" mart0 talc fsz16  " > <a href="../NewPersonal/bankAccount" class="dblue_btn trn brdrad3" data-trn-key="Add card">Add card </a> </div>
									</div>
								</div>
								
								
								
								
								
								<div class=" mart30 xs-marrl0 sm-marrl0 white_bg hide">
									
									<div class="marb10 brdb_new">
										<h2 class="fleft mar0 padb5 fsz15">Ditt telefon nummer</h2>
										<div class="fright pos_rel padb5 fsz14">
											<a href="#" class="class-toggler" data-target="#profile-dropdown2,#profile-fade2" data-classes="active">
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
								
								<div class=" lgtgrey2_bg mart10  brdrad3 hide" style="">
									<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt ">
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											
											<!--<div class="clear hidden-xs"></div>-->
											
											<div class="fleft wi_33 bs_bb padrl2"> <span>Country</span> <span class="edit-select jain1 dblock brdb brdclr_lgtgrey2 fsz16 c_phone" data-options="<?php echo $country; ?>" data-post-action="add_phone_country" id="passport-country"><?php if($resultOrg1['country_phone']!="" || $resultOrg1['country_phone']!= null) echo $resultOrg1['country_phone']; else echo "Sweden"; ?></span> </div>
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
													<span class="padr5 uppercase fsz16" id="phone-country"></span>
													<span class="editable edit-phone dblock flex_1 uppercase wordb_ba curt fsz16 phone"><?php if($resultOrg1['phone_number']!="" || $resultOrg1['phone_number']!= null) echo $resultOrg1['phone_number']; else echo "-"; ?></span>
												</div>
											</div>
											<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
											
										</div>
										
										
										<div class="mart20 talc fsz16  "> <a href="#" class="dblue_btn trn brdrad3" >Uppdatera </a> </div>
										
										
										<!-- <div class="clear hidden-xs"></div>-->
									</div>
									<div class="clear"></div>
								</div>
								
								<div class=" mart30 xs-marrl0 sm-marrl0 white_bg hide">
									
									<div class="marb10 brdb_new">
										<h2 class="fleft mar0 padb5 fsz15">Din e-post adress</h2>
										<div class="fright pos_rel padb5 fsz14">
											<a href="#" class="class-toggler" data-target="#profile-dropdown3,#profile-fade3" data-classes="active">
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
								
								
								<div class=" lgtgrey2_bg mart10  brdrad3 hide" style="">
									<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											
											<!--<div class="clear hidden-xs"></div>-->
											
											<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
												<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 "> <span class="trn" data-trn-key="Email">Email</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16 email"><?php if($resultOrg['email']!="" || $resultOrg['email']!= null) echo $resultOrg['email']; else echo "-"; ?> </span></div>
												
												
												
												
												
												
												<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
												<!-- <div class="clear hidden-xs"></div>-->
											</div>
											<div class="clear"></div>
										</div>
										<!--<div class="hidden-xs mart20 talc fsz16  " > <a href="#" class="dblue_btn trn brdrad3" >Update </a> </div>-->
									</div>
								</div>
								
								<div class=" mart30 xs-marrl0 sm-marrl0 white_bg">
									
									<div class="marb10 brdb_new">
										<h2 class="fleft mar0 padb5 fsz15">Din yrkeskarriär</h2>
										<div class="fright pos_rel padb5 fsz14">
											<a href="#" class="class-toggler" data-target="#profile-dropdown5,#profile-fade5" data-classes="active">
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
								
								
								<div class="fsz15 xs-fsz16 sm-fsz16 lgtgrey2_bg mart5  brdrad3">
									
									
									<div class="column_m profile_sorting_list  " id="curriculum_vitae" >
										
										<div class="column_m">
											<a href="#" class="add_pro_sum tooltip" title="edit"></a>
											
											<?php
												if($rowsummary['summary'] != '' or $rowsummary['summary'] != null)
												{
												?>
												<div class="padtrl15  brdrad3">
													<h2 class="cyanblue_txt bold fsz16">Professional Summary</h2>
													
													<div class="cv_px fsz14 dark_grey_txt"> <?php echo html_entity_decode($rowsummary['summary']); ?></div>
													
													<form method="POST" id="summery" action="updateUserSummary">
														<div class="lgtgrey_bg pad15 pro_sum_form hide">
															<textarea class="texteditor xs-fsz16" name="summery_text" id="summery_text"><?php echo html_entity_decode($rowsummary['summary']); ?></textarea>
															<div class="clear"></div>
															<div class="column_m padt10"> <a href="javascript:void(0);" onclick="javascript:valsummary();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_pro_sum min_height lgtgrey_btn">Cancel</a> </div>
															<div class="clear"></div>
														<input type="hidden" name="user_summery"> </div>
													</form>
													
												</div>
												<?php } else
												{ ?>
												<div class="padtrl15  brdrad3">
													<h2 class="cyanblue_txt bold fsz16">Professional Summary </h2>
													<form method="POST" id="summery" action="updateUserSummary" >	
														<div class="lgtgrey_bg pad15 pro_sum_form hide">
															<textarea class="texteditor" name="summery_text" id="summery_text" ></textarea>
															<div class="clear"></div>
															<div class="column_m padt10"> <a href="javascript:void(0);" onclick="javascript:valsummary();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_pro_sum min_height lgtgrey_btn">Cancel</a> </div>
															<div class="clear"></div>
															<input type="hidden" name="user_summery" >
														</div>
													</form>		
													
												</div>
											<?php } ?>
											
										</div>
										
										<div class="column_m">
											<div class=" brdrad3 ">
												<?php
													if($row_exp_count['num'] !=0)
													{
													?>
													<div class="padtrl15">
													<h2 class="cyanblue_txt bold fsz16 padb10">Experience Summary </h2> </div>
													
													<form action="updateUserExperience" method="POST" name="experiance" id="experiance" accept-charset="ISO-8859-1">	
														<div class="exp_sum_form lgtgrey_bg hide pad15">
															<div class="input_fields_list ">
																<ul>
																	<li>
																		<div class="field_labl  xs-dnone">Compnay name</div>
																		<div class="field_box xs-wi_100i">
																			<input class="input_white_field wi_100" onkeyup="company_select(this.value);" type="text" name="com_name" id="com_name" list="company_names"/>
																			<datalist id="company_names">
																				
																			</datalist>
																			
																		</div>
																	</li>
																	<input type="hidden" name="comp_experiance_loop" value="" >
																	<li>
																		<div class="field_labl  xs-dnone">Title</div>
																		<div class="field_box xs-wi_100i">
																			<input class="input_white_field wi_100" type="text" name="com_title" id="com_title" />
																		</div>
																	</li>
																	<li>
																		<div class="field_labl  xs-dnone">Location</div>
																		<div class="field_box xs-wi_100i">
																			<input class="input_white_field wi_100" type="text" name="com_loc" id="com_loc" />
																		</div>
																	</li>
																	<li>
																		<div class="field_labl xs-dnone">Time Period</div>
																		<div class="field_box xs-wi_100i">
																			<div class="dflex xxs-fxwrap_w alit_c">
																				
																				<div class="wi_25 xxs-wi_50 xxs-marb10">
																					<select name="com_start_month" id="com_start_month" class="input_white_field">
																						<option value="0">Select</option>
																						<option value="1">January</option>
																						<option value="2">February</option>
																						<option value="3">March</option>
																						<option value="4">April</option>
																						<option value="5">May</option>
																						<option value="6">June</option>
																						<option value="7">July</option>
																						<option value="8">August</option>
																						<option value="9">September</option>
																						<option value="10">October</option>
																						<option value="11">November</option>
																						<option value="12">December</option>
																					</select>
																				</div>
																				<div class="wi_25 xxs-wi_50 xxs-marb10">
																					<select name="com_start_year" id="com_start_year" class="input_white_field wi_100">
																						<option value="0">Select</option>
																						<option value="2016">2016</option>
																						<option value="2015">2015</option>
																						<option value="2014">2014</option>
																						<option value="2013">2013</option>
																						<option value="2012">2012</option>
																						<option value="2011">2011</option>
																						<option value="2010">2010</option>
																						<option value="2009">2009</option>
																						<option value="2008">2008</option>
																						<option value="2007">2007</option>
																						<option value="2006">2006</option>
																						<option value="2005">2005</option>
																						<option value="2004">2004</option>
																						<option value="2003">2003</option>
																						<option value="2002">2002</option>
																						<option value="2001">2001</option>
																						<option value="2000">2000</option>
																						<option value="1999">1999</option>
																						<option value="1998">1998</option>
																						<option value="1997">1997</option>
																						<option value="1996">1996</option>
																						<option value="1995">1995</option>
																						<option value="1994">1994</option>
																						<option value="1993">1993</option>
																						<option value="1992">1992</option>
																						<option value="1991">1991</option>
																						<option value="1990">1990</option>
																						<option value="1989">1989</option>
																						<option value="1988">1988</option>
																						<option value="1987">1987</option>
																						<option value="1986">1986</option>
																						<option value="1985">1985</option>
																						<option value="1984">1984</option>
																						<option value="1983">1983</option>
																						<option value="1982">1982</option>
																						<option value="1981">1981</option>
																						<option value="1980">1980</option>
																						<option value="1979">1979</option>
																						<option value="1978">1978</option>
																						<option value="1977">1977</option>
																						<option value="1976">1976</option>
																						<option value="1975">1975</option>
																						<option value="1974">1974</option>
																						<option value="1973">1973</option>
																						<option value="1972">1972</option>
																						<option value="1971">1971</option>
																						<option value="1970">1970</option>
																						<option value="1969">1969</option>
																						<option value="1968">1968</option>
																						<option value="1967">1967</option>
																						<option value="1966">1966</option>
																						<option value="1965">1965</option>
																						<option value="1964">1964</option>
																						<option value="1963">1963</option>
																						<option value="1962">1962</option>
																						<option value="1961">1961</option>
																						<option value="1960">1960</option>
																						<option value="1959">1959</option>
																						<option value="1958">1958</option>
																						<option value="1957">1957</option>
																						<option value="1956">1956</option>
																						<option value="1955">1955</option>
																						<option value="1954">1954</option>
																						<option value="1953">1953</option>
																						<option value="1952">1952</option>
																						<option value="1951">1951</option>
																						<option value="1950">1950</option>
																						<option value="1949">1949</option>
																						<option value="1948">1948</option>
																						<option value="1947">1947</option>
																						<option value="1946">1946</option>
																						<option value="1945">1945</option>
																						<option value="1944">1944</option>
																						<option value="1943">1943</option>
																						<option value="1942">1942</option>
																						<option value="1941">1941</option>
																						<option value="1940">1940</option>
																					</select>
																				</div>
																				<div class="xxs-dnone fxshrink_0 padrl10">-</div>
																				<div class="wi_25 xxs-wi_50">
																					<select name="com_end_month" id="com_end_month" class="input_white_field">
																						<option value="0">Select</option>
																						<option value="1">January</option>
																						<option value="2">February</option>
																						<option value="3">March</option>
																						<option value="4">April</option>
																						<option value="5">May</option>
																						<option value="6">June</option>
																						<option value="7">July</option>
																						<option value="8">August</option>
																						<option value="9">September</option>
																						<option value="10">October</option>
																						<option value="11">November</option>
																						<option value="12">December</option>
																					</select>
																				</div>
																				<div class="wi_25 xxs-wi_50">
																					<select class="input_white_field wi_100" name="com_end_year" id="com_end_year">
																						<option value="0">Select</option>
																						<option value="2016">2016</option>
																						<option value="2015">2015</option>
																						<option value="2014">2014</option>
																						<option value="2013">2013</option>
																						<option value="2012">2012</option>
																						<option value="2011">2011</option>
																						<option value="2010">2010</option>
																						<option value="2009">2009</option>
																						<option value="2008">2008</option>
																						<option value="2007">2007</option>
																						<option value="2006">2006</option>
																						<option value="2005">2005</option>
																						<option value="2004">2004</option>
																						<option value="2003">2003</option>
																						<option value="2002">2002</option>
																						<option value="2001">2001</option>
																						<option value="2000">2000</option>
																						<option value="1999">1999</option>
																						<option value="1998">1998</option>
																						<option value="1997">1997</option>
																						<option value="1996">1996</option>
																						<option value="1995">1995</option>
																						<option value="1994">1994</option>
																						<option value="1993">1993</option>
																						<option value="1992">1992</option>
																						<option value="1991">1991</option>
																						<option value="1990">1990</option>
																						<option value="1989">1989</option>
																						<option value="1988">1988</option>
																						<option value="1987">1987</option>
																						<option value="1986">1986</option>
																						<option value="1985">1985</option>
																						<option value="1984">1984</option>
																						<option value="1983">1983</option>
																						<option value="1982">1982</option>
																						<option value="1981">1981</option>
																						<option value="1980">1980</option>
																						<option value="1979">1979</option>
																						<option value="1978">1978</option>
																						<option value="1977">1977</option>
																						<option value="1976">1976</option>
																						<option value="1975">1975</option>
																						<option value="1974">1974</option>
																						<option value="1973">1973</option>
																						<option value="1972">1972</option>
																						<option value="1971">1971</option>
																						<option value="1970">1970</option>
																						<option value="1969">1969</option>
																						<option value="1968">1968</option>
																						<option value="1967">1967</option>
																						<option value="1966">1966</option>
																						<option value="1965">1965</option>
																						<option value="1964">1964</option>
																						<option value="1963">1963</option>
																						<option value="1962">1962</option>
																						<option value="1961">1961</option>
																						<option value="1960">1960</option>
																						<option value="1959">1959</option>
																						<option value="1958">1958</option>
																						<option value="1957">1957</option>
																						<option value="1956">1956</option>
																						<option value="1955">1955</option>
																						<option value="1954">1954</option>
																						<option value="1953">1953</option>
																						<option value="1952">1952</option>
																						<option value="1951">1951</option>
																						<option value="1950">1950</option>
																						<option value="1949">1949</option>
																						<option value="1948">1948</option>
																						<option value="1947">1947</option>
																						<option value="1946">1946</option>
																						<option value="1945">1945</option>
																						<option value="1944">1944</option>
																						<option value="1943">1943</option>
																						<option value="1942">1942</option>
																						<option value="1941">1941</option>
																						<option value="1940">1940</option>
																					</select>
																				</div>
																				
																			</div>
																		</div>
																		</li> <li>
																		<div class="field_labl  xs-dnone">Description</div>
																		<div class="field_box xs-wi_100i">
																			<textarea class="texteditor" name="com_desc" id="com_desc" ></textarea>
																		</div>
																	</li>
																	
																	<li>
																		<div class="field_labl  xs-dnone">Refrence Email</div>
																		<div class="field_box xs-wi_100i">
																			<input class="input_white_field wi_100" type="text" name="r_email" id="r_email" />
																		</div>
																	</li>
																	<li>
																		<div class="field_labl  xs-dnone">&nbsp;</div>
																		<div class="field_box xs-wi_100i">
																			<input type="checkbox" name="com_current" id="com_current" />
																		&nbsp; I currently work here</div>
																	</li>
																</ul>
															</div>
															<div class="clear"></div>
															<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkexperiance()" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_exp_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink" value="0">Remove This Position</a></div>
															<div class="clear"></div>
														</div>
														<input type="hidden" name="comp_experiance" id="comp_experiance" >
													</form>
													
													<div class="clear"></div>
													<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd  xs-fsz16 sm-fsz16"><span class="trend_start xs-dnone"></span>
														<div class="mart15">
															<?php
																
																
																foreach($result_exp as $category => $row_exp)
																{
																	
																	$start_month=month_s($row_exp['duration_start_month']);
																	$endmonth = month_s($row_exp['duration_end_month']);
																	$endyear = $row_exp['duration_end'];
																	if($row_exp['duration_end']==2100)
																	{
																		$end_val=0;
																	}
																	else
																	{
																		$end_val=$row_exp['duration_end_month'];
																	}
																?>
																
																<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit"  class=" tooltip " href="javascript:void(0);"></a> <span class="year_trend xs-pos_stai xs-marb5"><span><?php if($endyear==2100) echo "Current"; else echo $endyear; ?></span></span>
																	<h2 class="padb5 xs-fsz16"><strong><?php echo $row_exp['title']; ?></strong><strong> @ </strong><?php echo $row_exp['company_name']; ?></h2>
																	<p><?php echo $start_month." ".$row_exp['duration_start']." - "; if($row_exp['duration_end'] == '2100')
																	{ echo "Still working"." | "; } else echo $endmonth." ".$endyear." | "; echo $row_exp['location']; ?></p>
																	<div class="fsz14" ><?php echo $row_exp['description']; ?></div>
																	<input type="hidden" name="exp<?php echo $row_exp['cv_com_id']; ?>" id="exp<?php echo $row_exp['cv_com_id']; ?>" value="<?php echo $row_exp['description']; ?>" >
																</div>
																
																
															<?php  } ?>	  
														</div>                                    
														<div class="clear"></div>
													</div>
													<?php }
													else
													{ ?>
													
													<div class="padtrl15">
													<h2 class="cyanblue_txt bold fsz16 padb10">Experience Summary </h2> </div>
													
													<form action="updateUserExperience" method="POST" name="experiance" id="experiance" accept-charset="ISO-8859-1">	
														<div class="exp_sum_form lgtgrey_bg hide pad15">
															<div class="input_fields_list ">
																<ul>
																	<li>
																		<div class="field_labl xs-dnone">Compnay name</div>
																		<div class="field_box  xs-wi_100i">
																			<input class="input_white_field wi_100" type="text" name="com_name" id="com_name" onkeyup="company_select(this.value);" list="company_names" />
																			<datalist id="company_names">
																				
																			</datalist>
																		</div>
																	</li>
																	<input type="hidden" name="comp_experiance_loop" value="" >
																	<input type="hidden" name="my_hash" value="<?php echo time();  ?>" >
																	<li>
																		<div class="field_labl xs-dnone">Title</div>
																		<div class="field_box xs-wi_100i">
																			<input class="input_white_field wi_100" type="text" name="com_title" id="com_title" />
																		</div>
																	</li>
																	<li>
																		<div class="field_labl xs-dnone">Location</div>
																		<div class="field_box xs-wi_100i">
																			<input class="input_white_field wi_100" type="text" name="com_loc" id="com_loc" />
																		</div>
																	</li>
																	<li>
																		<div class="field_labl xs-dnone">Time Period</div>
																		<div class="field_box xs-wi_100i">
																			<div class="dflex xxs-fxwrap_w alit_c">
																				
																				<div class="wi_25 xxs-wi_50 xxs-marb10">
																					<select name="com_start_month" id="com_start_month" class="input_white_field">
																						<option value="0">Select</option>
																						<option value="1">January</option>
																						<option value="2">February</option>
																						<option value="3">March</option>
																						<option value="4">April</option>
																						<option value="5">May</option>
																						<option value="6">June</option>
																						<option value="7">July</option>
																						<option value="8">August</option>
																						<option value="9">September</option>
																						<option value="10">October</option>
																						<option value="11">November</option>
																						<option value="12">December</option>
																					</select>
																				</div>
																				<div class="wi_25 xxs-wi_50 xxs-marb10">
																					<select name="com_start_year" id="com_start_year" class="input_white_field wi_100">
																						<option value="0">Select</option>
																						<option value="2016">2016</option>
																						<option value="2015">2015</option>
																						<option value="2014">2014</option>
																						<option value="2013">2013</option>
																						<option value="2012">2012</option>
																						<option value="2011">2011</option>
																						<option value="2010">2010</option>
																						<option value="2009">2009</option>
																						<option value="2008">2008</option>
																						<option value="2007">2007</option>
																						<option value="2006">2006</option>
																						<option value="2005">2005</option>
																						<option value="2004">2004</option>
																						<option value="2003">2003</option>
																						<option value="2002">2002</option>
																						<option value="2001">2001</option>
																						<option value="2000">2000</option>
																						<option value="1999">1999</option>
																						<option value="1998">1998</option>
																						<option value="1997">1997</option>
																						<option value="1996">1996</option>
																						<option value="1995">1995</option>
																						<option value="1994">1994</option>
																						<option value="1993">1993</option>
																						<option value="1992">1992</option>
																						<option value="1991">1991</option>
																						<option value="1990">1990</option>
																						<option value="1989">1989</option>
																						<option value="1988">1988</option>
																						<option value="1987">1987</option>
																						<option value="1986">1986</option>
																						<option value="1985">1985</option>
																						<option value="1984">1984</option>
																						<option value="1983">1983</option>
																						<option value="1982">1982</option>
																						<option value="1981">1981</option>
																						<option value="1980">1980</option>
																						<option value="1979">1979</option>
																						<option value="1978">1978</option>
																						<option value="1977">1977</option>
																						<option value="1976">1976</option>
																						<option value="1975">1975</option>
																						<option value="1974">1974</option>
																						<option value="1973">1973</option>
																						<option value="1972">1972</option>
																						<option value="1971">1971</option>
																						<option value="1970">1970</option>
																						<option value="1969">1969</option>
																						<option value="1968">1968</option>
																						<option value="1967">1967</option>
																						<option value="1966">1966</option>
																						<option value="1965">1965</option>
																						<option value="1964">1964</option>
																						<option value="1963">1963</option>
																						<option value="1962">1962</option>
																						<option value="1961">1961</option>
																						<option value="1960">1960</option>
																						<option value="1959">1959</option>
																						<option value="1958">1958</option>
																						<option value="1957">1957</option>
																						<option value="1956">1956</option>
																						<option value="1955">1955</option>
																						<option value="1954">1954</option>
																						<option value="1953">1953</option>
																						<option value="1952">1952</option>
																						<option value="1951">1951</option>
																						<option value="1950">1950</option>
																						<option value="1949">1949</option>
																						<option value="1948">1948</option>
																						<option value="1947">1947</option>
																						<option value="1946">1946</option>
																						<option value="1945">1945</option>
																						<option value="1944">1944</option>
																						<option value="1943">1943</option>
																						<option value="1942">1942</option>
																						<option value="1941">1941</option>
																						<option value="1940">1940</option>
																					</select>
																				</div>
																				<div class="xxs-dnone fxshrink_0 padrl10">-</div>
																				<div class="wi_25 xxs-wi_50">
																					<select name="com_end_month" id="com_end_month" class="input_white_field">
																						<option value="0">Select</option>
																						<option value="1">January</option>
																						<option value="2">February</option>
																						<option value="3">March</option>
																						<option value="4">April</option>
																						<option value="5">May</option>
																						<option value="6">June</option>
																						<option value="7">July</option>
																						<option value="8">August</option>
																						<option value="9">September</option>
																						<option value="10">October</option>
																						<option value="11">November</option>
																						<option value="12">December</option>
																					</select>
																				</div>
																				<div class="wi_25 xxs-wi_50">
																					<select class="input_white_field wi_100" name="com_end_year" id="com_end_year">
																						<option value="0">Select</option>
																						<option value="2016">2016</option>
																						<option value="2015">2015</option>
																						<option value="2014">2014</option>
																						<option value="2013">2013</option>
																						<option value="2012">2012</option>
																						<option value="2011">2011</option>
																						<option value="2010">2010</option>
																						<option value="2009">2009</option>
																						<option value="2008">2008</option>
																						<option value="2007">2007</option>
																						<option value="2006">2006</option>
																						<option value="2005">2005</option>
																						<option value="2004">2004</option>
																						<option value="2003">2003</option>
																						<option value="2002">2002</option>
																						<option value="2001">2001</option>
																						<option value="2000">2000</option>
																						<option value="1999">1999</option>
																						<option value="1998">1998</option>
																						<option value="1997">1997</option>
																						<option value="1996">1996</option>
																						<option value="1995">1995</option>
																						<option value="1994">1994</option>
																						<option value="1993">1993</option>
																						<option value="1992">1992</option>
																						<option value="1991">1991</option>
																						<option value="1990">1990</option>
																						<option value="1989">1989</option>
																						<option value="1988">1988</option>
																						<option value="1987">1987</option>
																						<option value="1986">1986</option>
																						<option value="1985">1985</option>
																						<option value="1984">1984</option>
																						<option value="1983">1983</option>
																						<option value="1982">1982</option>
																						<option value="1981">1981</option>
																						<option value="1980">1980</option>
																						<option value="1979">1979</option>
																						<option value="1978">1978</option>
																						<option value="1977">1977</option>
																						<option value="1976">1976</option>
																						<option value="1975">1975</option>
																						<option value="1974">1974</option>
																						<option value="1973">1973</option>
																						<option value="1972">1972</option>
																						<option value="1971">1971</option>
																						<option value="1970">1970</option>
																						<option value="1969">1969</option>
																						<option value="1968">1968</option>
																						<option value="1967">1967</option>
																						<option value="1966">1966</option>
																						<option value="1965">1965</option>
																						<option value="1964">1964</option>
																						<option value="1963">1963</option>
																						<option value="1962">1962</option>
																						<option value="1961">1961</option>
																						<option value="1960">1960</option>
																						<option value="1959">1959</option>
																						<option value="1958">1958</option>
																						<option value="1957">1957</option>
																						<option value="1956">1956</option>
																						<option value="1955">1955</option>
																						<option value="1954">1954</option>
																						<option value="1953">1953</option>
																						<option value="1952">1952</option>
																						<option value="1951">1951</option>
																						<option value="1950">1950</option>
																						<option value="1949">1949</option>
																						<option value="1948">1948</option>
																						<option value="1947">1947</option>
																						<option value="1946">1946</option>
																						<option value="1945">1945</option>
																						<option value="1944">1944</option>
																						<option value="1943">1943</option>
																						<option value="1942">1942</option>
																						<option value="1941">1941</option>
																						<option value="1940">1940</option>
																					</select>
																				</div>
																				
																			</div>
																		</div>
																	</li>
																	<li>
																		<div class="field_labl xs-dnone">Description</div>
																		<div class="field_box xs-wi_100i">
																			<textarea class="texteditor" name="com_desc" id="com_desc" ></textarea>
																		</div>
																	</li>
																	
																	<li>
																		<div class="field_labl xs-dnone">Refrence Email</div>
																		<div class="field_box xs-wi_100i">
																			<input class="input_white_field wi_100" type="text" name="r_email" id="r_email" />
																		</div>
																	</li>
																	<li>
																		<div class="field_labl xs-dnone">&nbsp;</div>
																		<div class="field_box xs-wi_100i">
																			<input type="checkbox" name="com_current" id="com_current" />
																		&nbsp; I currently work here</div>
																	</li>
																</ul>
															</div>
															<div class="clear"></div>
															<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkexperiance()" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_exp_sum min_height lgtgrey_btn">Cancel</a>&nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink" value="0">Remove This Position</a> </div>
															<div class="clear"></div>
														</div>
														<input type="hidden" name="comp_experiance" >
													</form>
													
													<div class="clear"></div>
												<?php } ?>
												
											</div>
										</div>
										
										
										<div class="clear"></div>
										<div class="column_m">
											<div class=" brdrad3 ">
												<?php
													if($row_edu_count['num'] !=0)
													{
													?>
													<div class="padtrl15">
													<h2 class="cyanblue_txt bold fsz16 padb10">Educational Summary </h2> </div>
													<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd  xs-fsz16 sm-fsz16"> <span class="trend_start"></span>
														<div class="mart15">
															<?php foreach($result_edu as $category => $row_edu)
																{
																	$js =   $row_edu['id'].";;;;;".$row_edu['c_id'].";;;;;".$row_edu['s_id'].";;;;;".$row_edu['cl_id'].";;;;;".$row_edu['duration'].";;;;;".$row_edu['duration_start'].";;;;;".$row_edu['duration_end']; 
																	$js = str_replace(array("\r", "\n"), '', $js);
																	?>		<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit" class="  tooltip"  href="#"></a> <span class="year_trend xs-pos_stai xs-marb5"><span><?php echo $row_edu['duration_end']; ?></span></span>
																	<h2 class="padb5"><strong><?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['degree']); ?></strong>@ <?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['school']); ?></h2> 
																	<p><?php echo $row_edu['duration_start']." - ".$row_edu['duration_end']; ?> </p>
																	
																	
																</div>
															<?php } ?>
															<div class="clear"></div>
														</div>
														<div class="clear"></div>
													</div>
													<div class="padtrl15">
														<form action="updateEducation" method="POST" name="cveducation" id="cveducation" >	
															<div class="edu_sum_form hide lgtgrey_bg pad15">
																<div class="input_fields_list ">
																	<ul>
																		<li>
																			<div class="field_labl xs-wi_100i">Country</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50 xxs-wi_100" name="country_id" id="country_id" onchange="school(this.value);">
																					<option value="0">---Select----</option>
																					<?php 
																						foreach($result_country as $category => $row_country)
																						{
																							
																						?>			
																						<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																					<?php } ?>
																				</select>
																				
																			</div>
																		</li>
																		<li>
																			<div class="field_labl xs-wi_100i">School</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50 xxs-wi_100" name="cv_school" id="cv_school" onchange="degree(this.value);">
																					<option>---Select---</option>
																					<?php 
																						foreach($result_school1 as $category => $row_school1)
																						{
																							
																						?>			
																						<option value="<?php echo $row_school1['id']; ?>"><?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_school1['name']); ?></option>
																					<?php } ?>						
																				</select>
																				
																			</div>
																		</li>
																		<li>
																			<div class="field_labl xs-wi_100i">Class</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50 xxs-wi_100" name="cv_degree" id="cv_degree">
																					<?php foreach($result_school111 as $category => $row_school11)
																						{
																							
																						?>			
																						<option value="<?php echo $row_school11['id']; ?>"><?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_school11['name']); ?></option>
																					<?php } ?>				
																				</select>
																				
																			</div>
																		</li>
																		
																		<li>
																			<div class="field_labl xs-wi_100i">Duration</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50 xxs-wi_100" name="duration" id="duration">
																					
																					<option value="0">---Select---</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>							
																				</select>
																				
																			</div>
																		</li>
																		
																		<li>
																			<div class="field_labl xs-wi_100i">Dates attended</div>
																			<div class="field_box xs-wi_100i">
																				<div class="dflex xs-fxwrap_w alit_c">
																					<div class="padr10">
																						Start year
																					</div>
																					<div class="">
																						<select class="input_white_field wi_100" name="cv_school_start" id="cv_school_start">
																							<option value="0">Select</option>
																							<option value="2014">2014</option>
																							<option value="2013">2013</option>
																							<option value="2012">2012</option>
																							<option value="2011">2011</option>
																							<option value="2010">2010</option>
																							<option value="2009">2009</option>
																							<option value="2008">2008</option>
																							<option value="2007">2007</option>
																							<option value="2006">2006</option>
																							<option value="2005">2005</option>
																							<option value="2004">2004</option>
																							<option value="2003">2003</option>
																							<option value="2002">2002</option>
																							<option value="2001">2001</option>
																							<option value="2000">2000</option>
																							<option value="1999">1999</option>
																							<option value="1998">1998</option>
																							<option value="1997">1997</option>
																							<option value="1996">1996</option>
																							<option value="1995">1995</option>
																							<option value="1994">1994</option>
																							<option value="1993">1993</option>
																							<option value="1992">1992</option>
																							<option value="1991">1991</option>
																							<option value="1990">1990</option>
																							<option value="1989">1989</option>
																							<option value="1988">1988</option>
																							<option value="1987">1987</option>
																							<option value="1986">1986</option>
																							<option value="1985">1985</option>
																							<option value="1984">1984</option>
																							<option value="1983">1983</option>
																							<option value="1982">1982</option>
																							<option value="1981">1981</option>
																							<option value="1980">1980</option>
																							<option value="1979">1979</option>
																							<option value="1978">1978</option>
																							<option value="1977">1977</option>
																							<option value="1976">1976</option>
																							<option value="1975">1975</option>
																							<option value="1974">1974</option>
																							<option value="1973">1973</option>
																							<option value="1972">1972</option>
																							<option value="1971">1971</option>
																							<option value="1970">1970</option>
																							<option value="1969">1969</option>
																							<option value="1968">1968</option>
																							<option value="1967">1967</option>
																							<option value="1966">1966</option>
																							<option value="1965">1965</option>
																							<option value="1964">1964</option>
																							<option value="1963">1963</option>
																							<option value="1962">1962</option>
																							<option value="1961">1961</option>
																							<option value="1960">1960</option>
																							<option value="1959">1959</option>
																							<option value="1958">1958</option>
																							<option value="1957">1957</option>
																							<option value="1956">1956</option>
																							<option value="1955">1955</option>
																							<option value="1954">1954</option>
																							<option value="1953">1953</option>
																							<option value="1952">1952</option>
																							<option value="1951">1951</option>
																							<option value="1950">1950</option>
																							<option value="1949">1949</option>
																							<option value="1948">1948</option>
																							<option value="1947">1947</option>
																							<option value="1946">1946</option>
																							<option value="1945">1945</option>
																							<option value="1944">1944</option>
																							<option value="1943">1943</option>
																							<option value="1942">1942</option>
																							<option value="1941">1941</option>
																							<option value="1940">1940</option>
																						</select>
																					</div>
																					<div class="xs-wi_100 fxshrink_0 padrl10">
																						<span class="xs-dnone">-</span>
																					</div>
																					<div class="padr10">
																						End year
																					</div>
																					<div class="">
																						<select class="input_white_field wi_100" name="cv_school_end" id="cv_school_end">
																							<option value="0">Select</option>
																							<option value="2014">2014</option>
																							<option value="2013">2013</option>
																							<option value="2012">2012</option>
																							<option value="2011">2011</option>
																							<option value="2010">2010</option>
																							<option value="2009">2009</option>
																							<option value="2008">2008</option>
																							<option value="2007">2007</option>
																							<option value="2006">2006</option>
																							<option value="2005">2005</option>
																							<option value="2004">2004</option>
																							<option value="2003">2003</option>
																							<option value="2002">2002</option>
																							<option value="2001">2001</option>
																							<option value="2000">2000</option>
																							<option value="1999">1999</option>
																							<option value="1998">1998</option>
																							<option value="1997">1997</option>
																							<option value="1996">1996</option>
																							<option value="1995">1995</option>
																							<option value="1994">1994</option>
																							<option value="1993">1993</option>
																							<option value="1992">1992</option>
																							<option value="1991">1991</option>
																							<option value="1990">1990</option>
																							<option value="1989">1989</option>
																							<option value="1988">1988</option>
																							<option value="1987">1987</option>
																							<option value="1986">1986</option>
																							<option value="1985">1985</option>
																							<option value="1984">1984</option>
																							<option value="1983">1983</option>
																							<option value="1982">1982</option>
																							<option value="1981">1981</option>
																							<option value="1980">1980</option>
																							<option value="1979">1979</option>
																							<option value="1978">1978</option>
																							<option value="1977">1977</option>
																							<option value="1976">1976</option>
																							<option value="1975">1975</option>
																							<option value="1974">1974</option>
																							<option value="1973">1973</option>
																							<option value="1972">1972</option>
																							<option value="1971">1971</option>
																							<option value="1970">1970</option>
																							<option value="1969">1969</option>
																							<option value="1968">1968</option>
																							<option value="1967">1967</option>
																							<option value="1966">1966</option>
																							<option value="1965">1965</option>
																							<option value="1964">1964</option>
																							<option value="1963">1963</option>
																							<option value="1962">1962</option>
																							<option value="1961">1961</option>
																							<option value="1960">1960</option>
																							<option value="1959">1959</option>
																							<option value="1958">1958</option>
																							<option value="1957">1957</option>
																							<option value="1956">1956</option>
																							<option value="1955">1955</option>
																							<option value="1954">1954</option>
																							<option value="1953">1953</option>
																							<option value="1952">1952</option>
																							<option value="1951">1951</option>
																							<option value="1950">1950</option>
																							<option value="1949">1949</option>
																							<option value="1948">1948</option>
																							<option value="1947">1947</option>
																							<option value="1946">1946</option>
																							<option value="1945">1945</option>
																							<option value="1944">1944</option>
																							<option value="1943">1943</option>
																							<option value="1942">1942</option>
																							<option value="1941">1941</option>
																							<option value="1940">1940</option>
																						</select>
																					</div>
																					<div class="padl10">
																						Or expected graduation year
																					</div>
																				</div>
																			</div>
																		</li>
																		
																		
																	</ul>
																</div>
																<div class="clear"></div>
																<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkedu();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_edu_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink1" value="0">Remove This Education</a> </div>
																<div class="clear"></div>
																<input type="hidden" name="cv_edu" id="cv_edu">
															</div>
														</form>
													</div>
													<?php }
													else
													{ ?>
													
													<div class="padtrl15">
														<h2 class="cyanblue_txt bold fsz16 padb10">Educational Summary </h2>
														
														<form action="updateEducation" method="POST" name="cveducation" id="cveducation" >	
															<div class="edu_sum_form hide lgtgrey_bg pad15">
																<div class="input_fields_list ">
																	<ul>
																		<li>
																			<div class="field_labl xs-wi_100i">Country</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50 xxs-wi_100" name="country_id" id="country_id" onchange="school(this.value);">
																					<option value="0">---Select----</option>
																					<?php foreach($result_country as $category => $row_country)
																						{
																							
																						?>			
																						<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																					<?php } ?>
																				</select>
																				
																			</div>
																		</li>
																		<li>
																			<div class="field_labl xs-wi_100i">School</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50 xs-wi_100" name="cv_school" id="cv_school" onchange="degree(this.value);">
																					<option value="0">Select</option>				
																				</select>
																				
																			</div>
																		</li>
																		<li>
																			<div class="field_labl xs-wi_100i">Class</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50 xs-wi_100" name="cv_degree" id="cv_degree">
																					<option value="0">Select</option>			
																				</select>
																				
																			</div>
																		</li>
																		<li>
																			<div class="field_labl xs-wi_100i">Duration</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50 xs-wi_100" name="duration" id="duration">
																					
																					<option value="0">---Select---</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>							
																				</select>
																				
																			</div>
																		</li>
																		
																		<li>
																			<div class="field_labl xs-wi_100i">Dates attended</div>
																			<div class="field_box xs-wi_100i">
																				<div class="dflex xs-fxwrap_w alit_c">
																					<div class="padr10">
																						Start year
																					</div>
																					<div class="">
																						<select class="input_white_field wi_100" name="cv_school_start" id="cv_school_start">
																							<option value="0">Select</option>
																							<option value="2014">2014</option>
																							<option value="2013">2013</option>
																							<option value="2012">2012</option>
																							<option value="2011">2011</option>
																							<option value="2010">2010</option>
																							<option value="2009">2009</option>
																							<option value="2008">2008</option>
																							<option value="2007">2007</option>
																							<option value="2006">2006</option>
																							<option value="2005">2005</option>
																							<option value="2004">2004</option>
																							<option value="2003">2003</option>
																							<option value="2002">2002</option>
																							<option value="2001">2001</option>
																							<option value="2000">2000</option>
																							<option value="1999">1999</option>
																							<option value="1998">1998</option>
																							<option value="1997">1997</option>
																							<option value="1996">1996</option>
																							<option value="1995">1995</option>
																							<option value="1994">1994</option>
																							<option value="1993">1993</option>
																							<option value="1992">1992</option>
																							<option value="1991">1991</option>
																							<option value="1990">1990</option>
																							<option value="1989">1989</option>
																							<option value="1988">1988</option>
																							<option value="1987">1987</option>
																							<option value="1986">1986</option>
																							<option value="1985">1985</option>
																							<option value="1984">1984</option>
																							<option value="1983">1983</option>
																							<option value="1982">1982</option>
																							<option value="1981">1981</option>
																							<option value="1980">1980</option>
																							<option value="1979">1979</option>
																							<option value="1978">1978</option>
																							<option value="1977">1977</option>
																							<option value="1976">1976</option>
																							<option value="1975">1975</option>
																							<option value="1974">1974</option>
																							<option value="1973">1973</option>
																							<option value="1972">1972</option>
																							<option value="1971">1971</option>
																							<option value="1970">1970</option>
																							<option value="1969">1969</option>
																							<option value="1968">1968</option>
																							<option value="1967">1967</option>
																							<option value="1966">1966</option>
																							<option value="1965">1965</option>
																							<option value="1964">1964</option>
																							<option value="1963">1963</option>
																							<option value="1962">1962</option>
																							<option value="1961">1961</option>
																							<option value="1960">1960</option>
																							<option value="1959">1959</option>
																							<option value="1958">1958</option>
																							<option value="1957">1957</option>
																							<option value="1956">1956</option>
																							<option value="1955">1955</option>
																							<option value="1954">1954</option>
																							<option value="1953">1953</option>
																							<option value="1952">1952</option>
																							<option value="1951">1951</option>
																							<option value="1950">1950</option>
																							<option value="1949">1949</option>
																							<option value="1948">1948</option>
																							<option value="1947">1947</option>
																							<option value="1946">1946</option>
																							<option value="1945">1945</option>
																							<option value="1944">1944</option>
																							<option value="1943">1943</option>
																							<option value="1942">1942</option>
																							<option value="1941">1941</option>
																							<option value="1940">1940</option>
																						</select>
																					</div>
																					<div class="xs-wi_100 fxshrink_0 padrl10">
																						<span class="xs-dnone">-</span>
																					</div>
																					<div class="padr10">
																						End year
																					</div>
																					<div class="">
																						<select class="input_white_field wi_100" name="cv_school_end" id="cv_school_end">
																							<option value="0">Select</option>
																							<option value="2014">2014</option>
																							<option value="2013">2013</option>
																							<option value="2012">2012</option>
																							<option value="2011">2011</option>
																							<option value="2010">2010</option>
																							<option value="2009">2009</option>
																							<option value="2008">2008</option>
																							<option value="2007">2007</option>
																							<option value="2006">2006</option>
																							<option value="2005">2005</option>
																							<option value="2004">2004</option>
																							<option value="2003">2003</option>
																							<option value="2002">2002</option>
																							<option value="2001">2001</option>
																							<option value="2000">2000</option>
																							<option value="1999">1999</option>
																							<option value="1998">1998</option>
																							<option value="1997">1997</option>
																							<option value="1996">1996</option>
																							<option value="1995">1995</option>
																							<option value="1994">1994</option>
																							<option value="1993">1993</option>
																							<option value="1992">1992</option>
																							<option value="1991">1991</option>
																							<option value="1990">1990</option>
																							<option value="1989">1989</option>
																							<option value="1988">1988</option>
																							<option value="1987">1987</option>
																							<option value="1986">1986</option>
																							<option value="1985">1985</option>
																							<option value="1984">1984</option>
																							<option value="1983">1983</option>
																							<option value="1982">1982</option>
																							<option value="1981">1981</option>
																							<option value="1980">1980</option>
																							<option value="1979">1979</option>
																							<option value="1978">1978</option>
																							<option value="1977">1977</option>
																							<option value="1976">1976</option>
																							<option value="1975">1975</option>
																							<option value="1974">1974</option>
																							<option value="1973">1973</option>
																							<option value="1972">1972</option>
																							<option value="1971">1971</option>
																							<option value="1970">1970</option>
																							<option value="1969">1969</option>
																							<option value="1968">1968</option>
																							<option value="1967">1967</option>
																							<option value="1966">1966</option>
																							<option value="1965">1965</option>
																							<option value="1964">1964</option>
																							<option value="1963">1963</option>
																							<option value="1962">1962</option>
																							<option value="1961">1961</option>
																							<option value="1960">1960</option>
																							<option value="1959">1959</option>
																							<option value="1958">1958</option>
																							<option value="1957">1957</option>
																							<option value="1956">1956</option>
																							<option value="1955">1955</option>
																							<option value="1954">1954</option>
																							<option value="1953">1953</option>
																							<option value="1952">1952</option>
																							<option value="1951">1951</option>
																							<option value="1950">1950</option>
																							<option value="1949">1949</option>
																							<option value="1948">1948</option>
																							<option value="1947">1947</option>
																							<option value="1946">1946</option>
																							<option value="1945">1945</option>
																							<option value="1944">1944</option>
																							<option value="1943">1943</option>
																							<option value="1942">1942</option>
																							<option value="1941">1941</option>
																							<option value="1940">1940</option>
																						</select>
																					</div>
																					<div class="padl10">
																						Or expected graduation year
																					</div>
																				</div>
																			</div>
																		</li>
																		
																		
																	</ul>
																</div>
																<div class="clear"></div>
																<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkedu();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_edu_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink1" value="0">Remove This Education</a>  </div>
																<div class="clear"></div>
																<input type="hidden" name="cv_edu" value="0" >
															</div>
														</form>
													</div>
												<?php } ?>
												<div class="clear"></div>
											</div>
										</div>
										<div class="clear"></div>
										<div class="column_m">
											<div class=" brdrad3 ">
												<?php
													
													if($row_lang_count['num']!=0)
													{
													?>
													<div class="padtrl15">
														<h2 class="cyanblue_txt bold fsz16 padb10">Language</h2>
													</div>
													<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd  xs-fsz16 sm-fsz16"> <span class="trend_start xs-dnone"></span>
														<div class="mart15">
															<?php
																
																
																foreach($result_lang as $category => $row_lang)
																{
																?>
																
																<?php
																	$js =   $row_lang['id'].";;;;;".$row_lang['c_id'].";;;;;".$row_lang['level_id']; 
																	$js = str_replace(array("\r", "\n"), '', $js);
																	//echo $js; die;
																	//echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['degree']); 
																	
																	
																?>
																<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit" class="  tooltip"  href="#"></a> <span class="year_trend"></span>
																	<h2 class="padb5"><strong><?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_lang['country_name']); ?></strong></h2> 
																	<p><?php echo "Level-".$row_lang['level_id']; ?> </p>
																	
																	
																</div>
															<?php } ?>
															<div class="clear"></div>
														</div>
														<div class="clear"></div>
													</div>
													<div class="padtrl15">
														
														
														<form action="updateLanguage" method="POST" name="langu" id="langu" >	
															<div class="edu_lang_form hide lgtgrey_bg pad15">
																<div class="input_fields_list ">
																	<ul>
																		<li>
																			<div class="field_labl xs-wi_100i">Country</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50" name="lang_id" id="lang_id">
																					<option value="0">---Select----</option>
																					<?php 
																						foreach($result_country as $category => $row_country)
																						{
																							
																						?>			
																						<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																					<?php } ?>
																				</select>
																				
																			</div>
																		</li>
																		
																		<li>
																			<div class="field_labl xs-wi_100i">Level</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50" name="level_id" id="level_id">
																					
																					<option value="0">---Select---</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>							
																				</select>
																				
																			</div>
																		</li>
																		
																		
																		
																	</ul>
																</div>
																<div class="clear"></div>
																<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checklang();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_lang_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_lang_sum min_height lgtgrey_btn" id="mylang" value="0">Remove This Language</a> </div>
																<div class="clear"></div>
																<input type="hidden" name="cv_lang" id="cv_lang">
															</div>
														</form>
													</div>
													<?php } 
													else
													{ ?>
													
													<div class="padtrl15">
														<h2 class="cyanblue_txt bold fsz16 padb10">Language </h2>
														
														<form action="updateLanguage" method="POST" name="langu" id="langu" >	
															<div class="edu_lang_form hide lgtgrey_bg pad15">
																<div class="input_fields_list ">
																	<ul>
																		<li>
																			<div class="field_labl xs-wi_100i">Country</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50" name="lang_id" id="lang_id">
																					<option value="0">---Select----</option>
																					<?php 
																						foreach($result_country as $category => $row_country)
																						{
																							
																						?>			
																						<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																					<?php } ?>
																				</select>
																				
																			</div>
																		</li>
																		
																		<li>
																			<div class="field_labl xs-wi_100i">Level</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50" name="level_id" id="level_id">
																					
																					<option value="0">---Select---</option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					<option value="5">5</option>							
																				</select>
																				
																			</div>
																		</li>
																		
																		
																		
																	</ul>
																</div>
																<div class="clear"></div>
																<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checklang();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_lang_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_lang_sum min_height lgtgrey_btn" id="mylang" value="0">Remove This Language</a> </div>
																<div class="clear"></div>
																<input type="hidden" name="cv_lang" id="cv_lang" value="0">
															</div>
														</form>
													</div>
												<?php } ?>
												<div class="clear"></div>
											</div>
										</div>
										
										<div class="clear"></div>
										<div class="column_m">
											<div class=" brdrad3 ">
												<?php
													if($row_lice['id'] != '' or $row_lice['id'] != null)
													{
													?>
													<div class="padtrl15">
														<h2 class="cyanblue_txt bold fsz16 padb10">Driving Licence</h2>
													</div>
													<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd  xs-fsz16 sm-fsz16"> <span class="trend_start xs-dnone"></span>
														<div class="mart15">
															
															
															<?php
																$js =   $row_lice['id'].";;;;;".$row_lice['lice_id']; 
																$js = str_replace(array("\r", "\n"), '', $js);
																
																//echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['degree']); 
																
																
															?>
															<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit" class="add_lice_sum tooltip"  href="javascript:void(0);"></a> <span class="year_trend xs-pos_stai xs-marb5"></span>
																<h2 class="padb5"><strong>Licence</strong></h2> 
																<p><?php if($row_lice['lice_id']==1) echo "Yes"; else if($row_lice['lice_id']==2) echo "No";  ?> </p>
																
																
															</div>
															
															<div class="clear"></div>
														</div>
														<div class="clear"></div>
													</div>
													<div class="padtrl15">
														
														
														<form action="updateLicence" method="POST" name="lice" id="lice" >	
															<div class="lice_sum_form hide lgtgrey_bg pad15">
																<div class="input_fields_list ">
																	<ul>
																		
																		
																		
																		<li>
																			<div class="field_labl xs-wi_100i">Licence</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50" name="lice_id" id="lice_id">
																					
																					<option value="0">---Select---</option>
																					<option value="1">Yes</option>
																					<option value="2">No</option>
																					
																				</select>
																				
																			</div>
																		</li>
																		
																		
																		
																	</ul>
																</div>
																<div class="clear"></div>
																<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checklice();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_lice_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_lice_sum min_height lgtgrey_btn" id="mylice" value="0">Remove</a> </div>
																<div class="clear"></div>
																<input type="hidden" name="cv_lice" id="cv_lice">
															</div>
														</form>
													</div>
													<?php }
													else
													{ ?>
													
													<div class="padtrl15">
														<h2 class="cyanblue_txt bold fsz16 padb10">Driving Licence </h2>
														
														<form action="updateLicence" method="POST" name="lice" id="lice" >	
															<div class="lice_sum_form hide lgtgrey_bg pad15">
																<div class="input_fields_list ">
																	<ul>
																		
																		
																		
																		<li>
																			<div class="field_labl xs-wi_100i">Licence</div>
																			<div class="field_box xs-wi_100i">
																				<select class="wi_50" name="lice_id" id="lice_id">
																					
																					<option value="0">---Select---</option>
																					<option value="1">Yes</option>
																					<option value="2">No</option>
																					
																				</select>
																				
																			</div>
																		</li>
																		
																		
																		
																	</ul>
																</div>
																<div class="clear"></div>
																<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checklice();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_lice_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_lice_sum min_height lgtgrey_btn" id="mylice" value="0">Remove</a> </div>
																<div class="clear"></div>
																<input type="hidden" name="cv_lice" id="cv_lice">
															</div>
														</form>
													</div>
												<?php } ?>
												<div class="clear"></div>
											</div>
										</div>
										
										<div class=" martb20 talc fsz16 " > <a href="../Minkarriar/UserAccount" class="dblue_btn trn brdrad3" data-trn-key="Uppdatera ">Uppdatera </a> </div>
									</div>
									<div class="clear"></div>
									
									
								</div>
								
								
								
								
								
								
								
								
								
								
								
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			
		</div>
		<div class="wi_100 hidden-md hidden-lg   pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>One time</span>
					</a>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Ongoing</span>
					</a>
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtgrey_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="https://www.qloudid.com/user/index.php/ConnectKin/connectAccount" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Next of kin</span>
					</a>
					<a href="https://www.qloudid.com/user/index.php/StoreData/userAccount" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span class="fa fa-file-text-o"></span>
						</div>
						<span>Your data</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Create request
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							You got an invitation
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="https://www.qloudid.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Inform relatives
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
							Photo
						</a>
					</li>
					<li class="dblock mar0 padrl15">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
							Audio Note
						</a>
					</li>
				</ul>
				<div class="tab-header mart10 brdrad3 white_bg talc lgn_hight_50 fsz18">
					<a href="#" class="" data-id="mob-primary-menu">Cancel</a>
				</div>
			</div>
		</div>
		
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		
		
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
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup">
			<div class="modal-content pad25 nobrdb talc brdrad5">
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt">Aktivera din inbjudan</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">Använd koden som du fått via mejl för att aktivera inbjudan. När du fyller i koden så godkänner per automatik att motpart är ansluten till dig.  </span>
						</div>
						
						
					</div>
					
					<div class="padb0">
						
						<div class="pos_rel ">
							
							<input type="text" id="unique_id" name="unique_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Add the code">
						</div>
					</div>
					<div class="mart20">
						<input type="button" value="aktivera" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_unique();">
						<input type="hidden" id="indexing_save_unique" name="indexing_save_unique">
						
					</div>
					
					
					
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
					<form action="../ChangePassword/changePassword" method="POST" id="loginform">
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
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_code">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div class="marb20">
					<img src="../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb10 pad0 bold fsz24 black_txt">Verifiera en motpart…</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb0 talc">
						
						<span class="valm fsz16">Be din motpart, privatperson eller företag att legitimera sig innan ett möte eller affär. Välj ur du vill skicka din förfrågan, sms, email eller med Qloud ID kod. </span>
					</div>
					
					
				</div>
				
				<div class="on_clmn padb10">
					
					<div class="pos_rel ">
						
						<select name="reque" id= "reque" class=" wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" onchange="selectCode(this.value);">
							
							<option value="0">--Välj metod--</option>
							<option value="1">Mobile</option>
							<option value="2">Email</option>
							<option value="3">Code</option>
							
							
						</select>
					</div>
				</div>
				<div id="codeSelect" style="display:none">
					<div class="on_clmn padb10">
						
						<div class="pos_rel ">
							
							
							<input type="text" id="code_id" name="code_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter Code">
						</div>
					</div>
				</div>
				<div id="emailSelect" style="display:none">
					<div class="on_clmn padb10">
						
						<div class="pos_rel ">
							
							<input type="text" id="email_id" name="email_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter Email">
						</div>
					</div>
				</div>
				
				<div id="phoneSelect" style="display:none">
					<div class="on_clmn padb10">
						
						<div class="on_clmn ">
							<div class="thr_clmn wi_50">	
								
								
								
								<div class="pos_rel padl0">
									
									
									<select id="cntryph" name="cntryph" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
										<option value="0">--Select country--</option>
										<?php  foreach($resultContry as $category => $value) 
											{
												$category = htmlspecialchars($category); 
												echo '<option value="'. $value['country_name'] .'">'. $value['country_name'] .'</option>';
											}
										?>
									</select>
								</div>
								
							</div>
							<div class="thr_clmn padl10 wi_50">
								
								
								<div class="pos_rel padr0">
									
									
									<input type="number" id="phoneno" name="phoneno" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter phone">
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="on_clmn mart10 marb20">
					<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchUser();">
					
				</div>
				
				
				
			</div>
		</div>
		
		<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow white_bg" id="gratis_msg">
		 
	
	<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="padt25 marb0  brdradtr10">
				 
				<img src="../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_150p">
			 
			</div>
			<h2 class="marb0 padrl10 padt20 bold fsz24 black_txt">Identification</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20 padt10 padb20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 black_txt"> In order to report ID hijacked we need your social security number for identification purposes.</span>
				</div>
				
				
			</div>	
		<div class="on_clmn padb20 padrl20">
				<a href="addUserSSN"  class="padt15 trn wi_300p maxwi_100  hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold"  >Add</a>
				
			</div>
			 <div class="padb20">
			<a href="#" class="talc trn close_popup_modal" >Cancel</a>
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
	</body>
	
</html>