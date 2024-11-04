<!doctype html>
<html>
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
		//echo $companyDetail ['profile_pic']; die;
	if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>
	<head>
		<meta charset="utf-8">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
		
		function addActive(link){
		//var $this = $(this);
			
			$(link).addClass('active');
		
		
		return false;
		}
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
				
				var send_data = {};
				//send_data.user_id=document.getElementById('user_id').value;
				send_data.ssn=$(".ssn").text();
				send_data.name=$(".name").text();
				send_data.l_name=$(".l_name").text();
				send_data.dob=$(".dob").text();
				
				$.ajax({
					url: '../updateData/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
				})
				.done(function(data){
				})
				.fail(function(){})
				.always(function(){});
			}
			
			function checkDataBank()
			{
				
				var send_data = {};
				//send_data.user_id=document.getElementById('user_id').value;
				send_data.bankgiro_med=$(".bankgiro_med").text();
				send_data.bankgiro_utan=$(".bankgiro_utan").text();
				send_data.iban=$(".iban").text();
				send_data.bic=$(".bic").text();
				send_data.bank=$(".bank").text();
				send_data.ftax=$(".ftax").text();
				
				$.ajax({
					url: '../updateDataBank/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
				})
				.done(function(data){
				})
				.fail(function(){})
				.always(function(){});
			}
			
			
			function checkDataPhone()
			{
				
				var send_data = {};
				//send_data.user_id=document.getElementById('user_id').value;
				send_data.phone=$(".phone").text();
				send_data.c_phone=$(".c_phone").text();
				
				
				$.ajax({
					url: '../updateDataPhone/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
				})
				.done(function(data){
				})
				.fail(function(){})
				.always(function(){});
			}
			
			function checkDataPost()
			{
				
				var send_data = {};
				
				//send_data.user_id=document.getElementById('user_id').value;
				send_data.addrs=$(".addrs").text();
				send_data.zip=$(".zip").text();
				send_data.city=$(".city").text();
				send_data.cntry=$(".cntry").text();
				
				$.ajax({
					url: '../updateDataPost/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
				})
				.done(function(data){
				})
				.fail(function(){})
				.always(function(){});
			}
			
			function checkDataPostSuppliear()
			{
				
				var send_data = {};
				
				//send_data.user_id=document.getElementById('user_id').value;
				send_data.addrssi=$(".addrssi").text();
				send_data.zipsi=$(".zipsi").text();
				send_data.citysi=$(".citysi").text();
				send_data.cntrysi=$(".cntrysi").text();
				send_data.addrssd=$(".addrssd").text();
				send_data.zipsd=$(".zipsd").text();
				send_data.citysd=$(".citysd").text();
				send_data.cntrysd=$(".cntrysd").text();
				send_data.vat=$(".vat").text();
				$.ajax({
					url: '../updateDataPostSupplier/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
				})
				.done(function(data){
				})
				.fail(function(){})
				.always(function(){});
			}
			function checkDataPostNew()
			{
				
				var send_data = {};
				
				//send_data.user_id=document.getElementById('user_id').value;
				send_data.addrs=$(".addrs1").text();
				send_data.zip=$(".zip1").text();
				send_data.city=$(".city1").text();
				send_data.cntry=$(".cntry1").text();
				
				$.ajax({
					url: '../updateDataPostNew/<?php echo $data['cid']; ?>',
					type: 'POST',
					dataType: 'json',
					data: send_data
				})
				.done(function(data){
				})
				.fail(function(){})
				.always(function(){});
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
			
			function submitWeb()
			{
				
				if($("#website").val()==null || $("#website").val()=="")
				{
					$("#errorMsg").html("Enter website name");
					return false;
				}
				if($("#wlink").val()==null || $("#wlink").val()=="")
				{
					$("#errorMsg").html("Enter website link");
					return false;
				}
				
				var txt = $('#wlink').val();
				var re = /(((http|ftp|https):\/{2})+(([0-9a-z_-]+\.)+(aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|cz|de|dj|dk|dm|do|dz|ec|ee|eg|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mk|ml|mn|mn|mo|mp|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|nom|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ra|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw|arpa)(:[0-9]+)?((\/([~0-9a-zA-Z\#\+\%@\.\/_-]+))?(\?[0-9a-zA-Z\+\%@\/&\[\];=_-]+)?)?))\b/;
				if (re.test(txt)) {
					
				}
				else
				{
					$("#errorMsg").html('In-Valid URL');
					return false;
				}
				document.getElementById("gratis_popup_company_search").style.display='none';
				document.getElementById("loading_image").style.display='block';
				$(".loading_image").addClass('active'); 
				$(".activepopup").removeClass('active');
				var send_data={};
				
				send_data.web=$("#website").val();
				send_data.wlink=$("#wlink").val();
				$.ajax({
					type:"POST",
					url:"../addWeblink/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						if(data1=='0')
						{
							$(".loading_image").removeClass('active');
							document.getElementById("gratis_popup_company_search").style.display='none';
							document.getElementById("gratis_popup_company_searched").style.display='block';
							$(".gratis_popup_company_searched").addClass('active');
						}
						else
						{
							document.getElementById("loading_image").style.display='none';
							$(".loading_image").removeClass('active');
							document.getElementById("gratis_popup_company_search").style.display='none';
							document.getElementById("gratis_popup_company_searched").style.display='block';
							$(".gratis_popup_company_searched").addClass('active');
							$("#searched").html('');
							$("#searched").append(data1);
						}
					}
				});
			}
			
			function getLink()
			{
				var send_data={};
				
				$.ajax({
					type:"POST",
					url:"../getLinkid/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						$(".activepopup").removeClass('active');
						document.getElementById("gratis_popup_company_search").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched").html('');
						$("#searched").append(data1);
						
					}
				});
			}
			
		</script>
	</head>
	
	<body class="white_bg">
		
		<?php include 'CompanyHeaderClosed.php'; ?>
		<div class="clear" id=""></div>
		
		
		
		<div class="column_m pos_rel">
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<!-- Left sidebar -->
						<div class="wi_240p fleft pos_rel zi50">
								<div class="padrl10">
									
									<!-- Scroll menu -->
									<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
										<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new" id="scroll_menu">
											
											<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt">Min</a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz35 xs-fsz30 sm-fsz30 
														bold">Arbetsprofil</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php echo substr(html_entity_decode($row_summary['name']),0,20); ?></span>  </div>
													</a></div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
											<ul class="marr20 pad0">
									<li class=" dblock padb10 padl8">
											<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Nyhetsflöde </span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8">
											<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 greyblue_bg black_txt white_txt_h black_txt_a ">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Kalender	</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg  rotate45"></div>
											</a>
										</li>
										
										
										
										
										
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										
										
										<!-- Newsfeed -->
										
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Personalfrågor</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padr10">
													<a href="../../AskHR/hrAccount/<?php echo $data['eid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Fråga HR</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												
												
												
											</ul>
											
										</li>
										
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Hantera dina..</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="../../EmployeeVisitors/invitationInfo/<?php echo $data['eid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Besök</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												<li class="dblock padr10">
													<a href="../../Leveranser/employeeReceivedInfo/<?php echo $data['eid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Brev eller Paket </span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
													
												
											</ul>
											
										</li>
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Gå till...</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="../../EmployeeBusinessCardDetail/shareInfo/<?php echo $data['eid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mitt visitkort</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Min närvaro</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Min lön</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mitt schema</span>
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
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">
						
						<div class="padb20 xxs-padb0 ">
							<!-- Charts -->
							
							
							
							<div class="column_m  fsz14 lgn_hight_22 dark_grey_txt">
								<div class="container <?php if($countryInfo==0) { echo 'hidden'; } ?>">
									<div class="">
										<h2 class=" tall fsz25 bold">Tillgängliga appar</h2>
										<div class="marb0 "> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Här nedan kan du hitta appar utvecklade av oss eller av företag som vi har granskat och godkänt. Vi kommer med jämna mellanrum att fylla på med fler nyheter.</a></div>
										
										<div class="tab-header mart10">
											<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active" data-id="utab_Popular">Mina appar</a>
											<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Analytics">Utforska</a>
											<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Advertising">Kommande</a>
											<!--<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_AB_Testing">Marketing</a>
											<a href="#" class="dinlblck mar5 padrl15 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Attribution">NOFF Business</a>-->
											
										</div>
										
										<div class="tab_container mart20">
											
											<!-- Popular -->
											<div class="tab_content hide active" id="utab_Popular" style="display: block;">
											<?php  foreach($getPermissionDetailEmployees as $category => $value) 
																	{
																		
																	?>
												<div class="xs-wi_100 wi_33 fleft bs_bb padrb8 talc <?php if($value['is_permission']==0) echo 'hidden'; if($value['is_downloaded']==0) echo 'hidden';  ?>" >
													<div class="toggle-parent wi_100 dflex alit_s" onclick="addActive(this);">
														<div class="wi_100 dnone_pa ">
															<a href="#" class="style_base hei_240p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad20 lgtgrey2_bg_h trans_all2">
																<div class="trf_y-12p_ph trans_all2">
																	<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
																		<span class="dblock wi_100 maxwi_100p fsz50 maxhei_100p padtb5"><span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x <?php echo $value['app_bg']; ?>"></i>
																				  <i class="black_txt <?php echo $value['app_icon']; ?> fab1" ></i>
																				</span></span>
																	</div>
																	
																	<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
																		<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10"><?php echo $value['app_name']; ?></h3>
																		<span class="dblock marb5 midgrey_txt">Sales</span>
																		<div class="opa0 opa1_ph lgn_hight_15 fsz14 black_txt trans_all2 panlyellow_bg pad10 mart10 marrl10">View</div>
																	</div>
																</div>
															</a>
														</div>
														
														<div class="wi_100 hide dblock_pa style_base hei_190p  bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
															<h3 class="marb15 talc bold fsz16">Medlemskap HR</h3>
															<div class="marb10 padrl20">
																<a href="#" class=" dblock blue_bg talc lgn_hight_40 white_txt" data-target="#pipefy_sliding_modal">läs mer</a>
															</div>
															<div class="padrl20">
																<a href="#" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">Besök sidan</a>
															</div>
														</div>
													</div>
												</div>
											
																	<?php } ?>
													<div class="clear"></div>
												</div>
												
												<!-- Analytics -->
												<div class="tab_content hide" id="utab_Analytics" style="display: none;">
												<div class="clear"></div>
												</div>
												
												<!-- Advertising -->
												<div class="tab_content hide" id="utab_Advertising" style="display: none;">
													
													<div class="clear"></div>
												</div>
												
												<!-- A/B Testing -->
												<div class="tab_content hide" id="utab_AB_Testing" style="display: none;">
													
													
													<div class="clear"></div>
												</div>
												
												
												
											</div>
										</div>
									</div>
									
									
								</div>
								
								
								
								
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtblue2_bg">
				
				<!-- primary menu -->
				<div class="tab-content active" id="mob-primary-menu" style="display: block;">
					<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
						<a href="https://www.qloudid.com/company/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
							<span>One time</span>
						</a>
						<a href="https://www.qloudid.com/company/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
							<span>Ongoing</span>
						</a>
						<div class="tab-header">
							<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
								<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtblue2_bg brdrad100 talc lgn_hight_40 fsz32">
									<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
									<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								</div>
							</a>
						</div>
						<a href="https://www.qloudid.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
							<span>Store it</span>
						</a>
						<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
								<span class="fa fa-file-text-o"></span>
							</div>
							<span>Your brand</span>
						</a>
					</div>
				</div>
				
				<!-- add  menu -->
				<div class="tab-content padb10" id="mob-add-menu">
					<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
					<ul class="mar0 pad0 brdrad3 white_bg fsz14">
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
								<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
								Create request
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
								<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
								You got an invitation
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="https://www.qloudid.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
								<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
								Inform relatives
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb_new">
							<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
								<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
								Company
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb_new">
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
			<div class="hei_80p hidden-xs"></div>
			
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
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
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
			
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg <?php if($countryInfo==0) { echo 'active'; } ?>" style="display:<?php if($countryInfo==0) { echo 'block'; } else echo 'none'; ?>"></div>
			
		</div>
		
		<div class="wi_600p maxwi_90 dnone pos_fix zi999 pos_cen  bs_bb fsz14" id="keep-modal">
			<form>
				<div class="keep-block keep-block-modal pos_rel brdrad2 bg_f txt_0_87 trans_bgc1 ">
					<a href="#" class="keep-pin dblock pos_abs zi5 top4p right4p pad5">
						<img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="dblock dnone_pa opa50 opa1_h trans_opa1" alt="Pin note">
						<img src="<?php echo $path; ?>html/keepcss/images/icons/pin_active.svg" width="18" height="18" class="dnone dblock_pa" alt="Unpin note">
						<div class="dblock dnone_pa opa0_nph opa80 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8">Pin note</span>
						</div>
						<div class="dnone dblock_pa opa0_nph opa80 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8">Unpin note</span>
						</div>
					</a>
					<div class="custom-scrollbar minhei_60p maxhei_100vh-70p ovfl_auto pos_rel">
						<div class="keep-images dflex fxwrap_w alit_c"></div>
						<div class="padt16 padr16 padl16">
							<textarea name="title" rows="1" cols="1" class="autosize keep-title wi_100-15p dblock marb16 pad0 nobrd bg_trans ff_inh bold fsz17 txt_0_87" placeholder="Title"></textarea>
						</div>
						<div class="keep-list padr16 padl16"></div>
						<div class="keep-list-add-item opa54 pos_rel marr16 marl16 marb16 padtb5 padrl25 txt_21">
							<label for="keep-list-add" class="dblock pos_abs pos_cenY left-2p curp">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-plus.svg" width="18" height="18" class="dblock">
							</label>
							<input type="text" name="keep-list-add" id="keep-list-add" class="wi_100 dblock pad0 nobrd bg_trans ff_inh fsz_inh txt_21" placeholder="List item">
						</div>
						<div class="keep-completed marb16 padr16 padl16" data-before="Completed items"></div>
						<div class="keep-metas dflex fxwrap_w alit_c marb10 padr16 padl16"></div>
					</div>
					<div class="wi_100 dflex fxwrap_w alit_c justc_sb">
						<div class="keep-actions wi_100 maxwi_400p dflex alit_c pos_rel zi5 padb5">
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-action-remind dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Remind me</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-action-collaborator dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-collaborator.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Collaborator">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Collaborator</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
								</a>
								<div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs bot100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
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
							<div class="keep-action wi_12_5 pos_rel">
								<label class="keep-add-image dblock opa50 opa1_h pos_rel pad5 talc curp trans_opa1">
									<input type="file" accept="image/*" class="sr-only">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-image.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Add image">
								</label>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Add image</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-action-archive dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Archive</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-action-more dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">More</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="dblock opa50 opa1_h opa25_na_i pad5 talc curna curp_a trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-undo.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Undo">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Undo</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="dblock opa50 opa1_h opa25_na_i pad5 talc curna curp_a trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-undo.svg" width="18" height="18" class="maxwi_100 hei_auto scale-11" alt="Redo">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Redo</span>
								</div>
							</div>
						</div>
						<div class="fxshrink_0 marr15 marla padb5">
							<button type="submit" class="marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Done</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtblue2_bg">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="https://www.qloudid.com/company/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>One time</span>
					</a>
					<a href="https://www.qloudid.com/company/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Ongoing</span>
					</a>
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtblue2_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="https://www.qloudid.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Store it</span>
					</a>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span class="fa fa-file-text-o"></span>
						</div>
						<span>Your brand</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Create request
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							You got an invitation
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="https://www.qloudid.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Inform relatives
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb_new">
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
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10 <?php if($countryInfo==0) { echo 'active'; } ?>"  id="gratis_popup_alert" style="display:<?php if($countryInfo==0) { echo 'block'; } else echo 'none'; ?>">
		<div class="modal-content pad25 brd brdrad10">
			<div id="search_user">
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					Currently our apps are not available for your country
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
			</div>
			
		</div>
	</div>
	
		<!--Keep modal fade -->
		<div id="keep_fade" class="wi_100 hei_100 dnone pos_fix zi998 top0 left0 bg_0_54"></div>
		<div class="popup_modal wi_960p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_company_searched">
			<div class="modal-content pad25 brd brdrad10 talc">
				<div id="searched">
					<?php if($aboutUsCount==1) { echo "https://www.qmatchup.com/beta/company/index.php/PublicAboutUs/companyAccount/".$getLinkid; } ?>
					
				</div>
				
			</div>
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 loading_image brd brdrad10"  id="loading_image">
			<div class="modal-content pad25 brd brdrad10 talc">
				<img src="<?php echo $path; ?>html/usercontent/images/loading_icon.png" />
				
			</div>
		</div>
		
		
		
			<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search">
		<div class="modal-content pad25 brd nobrdb talc brdrad5">
			
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Web Information</h3>
			<div class="marb20">
				<img src="../../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
				</div>
				
				
			</div>
			
				
					<div class="pad15 lgtgrey2_bg">
						
						<div class="pos_rel padrl10">
							<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							<input type="text" id="website" name="website" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Website Name">
						</div>
					</div>
					
					<div class="padrbl15 lgtgrey2_bg">
						
						<div class="pos_rel padrl10">
							<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							
							<input type="text" id="wlink" name="wlink" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company website">
						</div>
					</div>
					
					
					
					<div id="errorMsg" class="red_txt"></div>
				
		
			<div class="mart20">
				<input type="button" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submitWeb();" />
				<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				
			</div>
			
			
			
			
		</div>
	</div>
	
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/autosize.min.js"></script>
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