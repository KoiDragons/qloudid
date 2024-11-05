<!doctype html>
<html>
	<?php

		$path1 = "../../html/usercontent/images/";
		 ?>	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		<script>
			function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
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
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
			function sendInformation()
			{
				$("#error_msg_form").html('');
				
				 if($("#phone").val()=="" || $("#phone").val()==null)
				{
					document.getElementById("popup_fade").style.display='block';
					$("#popup_fade").addClass('active');
					document.getElementById("person_informed").style.display='block';
					$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter phone number');
					return false;
				}
				
				else if($("#description").val()=="" || $("#description").val()==null)
				{
					document.getElementById("popup_fade").style.display='block';
					$("#popup_fade").addClass('active');
					document.getElementById("person_informed").style.display='block';
					$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter description of item');
					return false;
				}
				
				else{
					var send_data={};
					send_data.country_phone=$("#country_phone").val();
					send_data.phone=$("#phone").val();
					send_data.item_name=$("#item_name").val();
					send_data.serial=$("#description").val();
					$.ajax({
						type:"POST",
						url: "PublicLostandFound/sendInformation",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							if(data1==1)
							{
								window.location.href ="https://www.qloudid.com/user/index.php/PublicLostandFound";
							}
							else
							{
								document.getElementById("popup_fade").style.display='block';
								$("#popup_fade").addClass('active');
								document.getElementById("person_informed").style.display='block';
								$(".person_informed").addClass('active');	
								$("#error_msg_form").html('Some error occured. Please report to web admin !!!');
								return false;
							}
						}
					});
				}
				
			}
		</script>
		<?php $path1 = $path."html/usercontent/images/"; ?>
	</head>
	<body class="white_bg" >
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
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20"> <a href="https://www.qloudid.com" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg uppercase lgn_hight_30 white_txt  white_txt_h  brdl" data-en="Close" data-sw="Close">Close</a> </li>
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20 "> <a href="#"  class="translate hei_30pi dblock padrl20   lgn_hight_30 black_txt show_popup_modal   " data-target="#om_mina" data-en="Om mina uppgifter" data-sw="Om mina uppgifter">Om mina uppgifter</a> </li>
					</ul>
				</div>
				
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.qloudid.com" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
				<div class="clear"></div>
				
			</div>
		</div>
		
			
		<div class="column_m container zi5  " onclick="checkFlag();">
			<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100   xs-nobrdb">
						<div class="dflex xs-fxwrap_w alit_c">
							
				<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc padl50 xs-padl0 xs-mart0">
								
								
								<div class="pos_rel padrbl30 xs-padrl20 xs-darkgrey_txt">
						<div class="wi_100 hei_100 xs-dnone opa60 pos_abs zi1 top0 left0 "></div>
						<div class="maxwi_500p pos_rel zi5">	
						<h2 class="mar0 padt15 bold fsz40 xs-fsz22 black_txt xs-darkgrey_txt tall">Hämta ditt paket</h2>
							<h3 class="fsz25 xs-fsz20 padb10 padt0 xs-padt0 brdb_new tall  lgn_hight_30 xs-talc black_txt">Skriv in ditt namn och hämta ut ditt paket.</h3>
					
					<div id="collaborators-container">
						<div class="collaborator-row dflex alit_c pos_rel">
							
						</div>
					</div> 
					
					<form action="" method="POST" name="collaborators-form" id="collaborators-form">
						<div class="marb0 padrl0 first">
							
							
							<div class="on_clmn padtb0">
								
									<div class="on_clmn mart20">
												
											<select name="item_name" id="item_name"  class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt lgtgrey2_bg fsz18 brdrad5"> 
											<option value="1">Cell Phone</option>
											<option value="2">Key</option>
											<option value="3">Laptop</option>
											</select>
											</div>
											
											<div class="on_clmn mart10">
										<div class="thr_clmn  wi_50 "  >
											
											<div class="pos_rel">
												
												<select name="country_phone" id="country_phone" class="wi_100 rbrdr padrl10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
													
													
													<option value="Afghanistan">Afghanistan</option>
													
													<option value="Albania">Albania</option>
													
													<option value="Algeria">Algeria</option>
													
													<option value="American Samoa">American Samoa</option>
													
													<option value="Andorra">Andorra</option>
													
													<option value="Angola">Angola</option>
													
													<option value="Anguilla">Anguilla</option>
													
													<option value="Antarctica">Antarctica</option>
													
													<option value="Antigua and Barbuda">Antigua and Barbuda</option>
													
													<option value="Argentina">Argentina</option>
													
													<option value="Armenia">Armenia</option>
													
													<option value="Aruba">Aruba</option>
													
													<option value="Australia">Australia</option>
													
													<option value="Austria">Austria</option>
													
													<option value="Azerbaijan">Azerbaijan</option>
													
													<option value="Bahamas">Bahamas</option>
													
													<option value="Bahrain">Bahrain</option>
													
													<option value="Bangladesh">Bangladesh</option>
													
													<option value="Barbados">Barbados</option>
													
													<option value="Belarus">Belarus</option>
													
													<option value="Belgium">Belgium</option>
													
													<option value="Belize">Belize</option>
													
													<option value="Benin">Benin</option>
													
													<option value="Bermuda">Bermuda</option>
													
													<option value="Bhutan">Bhutan</option>
													
													<option value="Bolivia">Bolivia</option>
													
													<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
													
													<option value="Botswana">Botswana</option>
													
													<option value="Bouvet Island">Bouvet Island</option>
													
													<option value="Brazil">Brazil</option>
													
													<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
													
													<option value="Brunei">Brunei</option>
													
													<option value="Bulgaria">Bulgaria</option>
													
													<option value="Burkina Faso">Burkina Faso</option>
													
													<option value="Burundi">Burundi</option>
													
													<option value="CÃƒÂ´te dÃ¢â‚¬â„¢Ivoire">CÃƒÂ´te dÃ¢â‚¬â„¢Ivoire</option>
													
													<option value="Cambodia">Cambodia</option>
													
													<option value="Cameroon">Cameroon</option>
													
													<option value="Canada">Canada</option>
													
													<option value="Cape Verde">Cape Verde</option>
													
													<option value="Cayman Islands">Cayman Islands</option>
													
													<option value="Central African Republic">Central African Republic</option>
													
													<option value="Chad">Chad</option>
													
													<option value="Chile">Chile</option>
													
													<option value="China">China</option>
													
													<option value="Christmas Island">Christmas Island</option>
													
													<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
													
													<option value="Colombia">Colombia</option>
													
													<option value="Comoros">Comoros</option>
													
													<option value="Congo">Congo</option>
													
													<option value="Congo, The Democratic Republic">Congo, The Democratic Republic</option>
													
													<option value="Cook Islands">Cook Islands</option>
													
													<option value="Costa Rica">Costa Rica</option>
													
													<option value="Croatia">Croatia</option>
													
													<option value="Cuba">Cuba</option>
													
													<option value="Cyprus">Cyprus</option>
													
													<option value="Czech Republic">Czech Republic</option>
													
													<option value="Denmark">Denmark</option>
													
													<option value="Djibouti">Djibouti</option>
													
													<option value="Dominica">Dominica</option>
													
													<option value="Dominican Republic">Dominican Republic</option>
													
													<option value="East Timor">East Timor</option>
													
													<option value="Ecuador">Ecuador</option>
													
													<option value="Egypt">Egypt</option>
													
													<option value="El Salvador">El Salvador</option>
													
													<option value="Equatorial Guinea">Equatorial Guinea</option>
													
													<option value="Eritrea">Eritrea</option>
													
													<option value="Estonia">Estonia</option>
													
													<option value="Ethiopia">Ethiopia</option>
													
													<option value="Falkland Islands">Falkland Islands</option>
													
													<option value="Faroe Islands">Faroe Islands</option>
													
													<option value="Fiji Islands">Fiji Islands</option>
													
													<option value="Finland">Finland</option>
													
													<option value="France">France</option>
													
													<option value="French Guiana">French Guiana</option>
													
													<option value="French Polynesia">French Polynesia</option>
													
													<option value="French Southern territories">French Southern territories</option>
													
													<option value="Gabon">Gabon</option>
													
													<option value="Gambia">Gambia</option>
													
													<option value="Georgia">Georgia</option>
													
													<option value="Germany">Germany</option>
													
													<option value="Ghana">Ghana</option>
													
													<option value="Gibraltar">Gibraltar</option>
													
													<option value="Greece">Greece</option>
													
													<option value="Greenland">Greenland</option>
													
													<option value="Grenada">Grenada</option>
													
													<option value="Guadeloupe">Guadeloupe</option>
													
													<option value="Guam">Guam</option>
													
													<option value="Guatemala">Guatemala</option>
													
													<option value="Guinea">Guinea</option>
													
													<option value="Guinea-Bissau">Guinea-Bissau</option>
													
													<option value="Guyana">Guyana</option>
													
													<option value="Haiti">Haiti</option>
													
													<option value="Heard Island and McDonald Isla">Heard Island and McDonald Isla</option>
													
													<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
													
													<option value="Honduras">Honduras</option>
													
													<option value="Hong Kong">Hong Kong</option>
													
													<option value="Hungary">Hungary</option>
													
													<option value="Iceland">Iceland</option>
													
													<option value="India">India</option>
													
													<option value="Indonesia">Indonesia</option>
													
													<option value="Iran">Iran</option>
													
													<option value="Iraq">Iraq</option>
													
													<option value="Ireland">Ireland</option>
													
													<option value="Israel">Israel</option>
													
													<option value="Italy">Italy</option>
													
													<option value="Jamaica">Jamaica</option>
													
													<option value="Japan">Japan</option>
													
													<option value="Jordan">Jordan</option>
													
													<option value="Kazakstan">Kazakstan</option>
													
													<option value="Kenya">Kenya</option>
													
													<option value="Kiribati">Kiribati</option>
													
													<option value="Kuwait">Kuwait</option>
													
													<option value="Kyrgyzstan">Kyrgyzstan</option>
													
													<option value="Laos">Laos</option>
													
													<option value="Latvia">Latvia</option>
													
													<option value="Lebanon">Lebanon</option>
													
													<option value="Lesotho">Lesotho</option>
													
													<option value="Liberia">Liberia</option>
													
													<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
													
													<option value="Liechtenstein">Liechtenstein</option>
													
													<option value="Lithuania">Lithuania</option>
													
													<option value="Luxembourg">Luxembourg</option>
													
													<option value="Macao">Macao</option>
													
													<option value="Macedonia">Macedonia</option>
													
													<option value="Madagascar">Madagascar</option>
													
													<option value="Malawi">Malawi</option>
													
													<option value="Malaysia">Malaysia</option>
													
													<option value="Maldives">Maldives</option>
													
													<option value="Mali">Mali</option>
													
													<option value="Malta">Malta</option>
													
													<option value="Marshall Islands">Marshall Islands</option>
													
													<option value="Martinique">Martinique</option>
													
													<option value="Mauritania">Mauritania</option>
													
													<option value="Mauritius">Mauritius</option>
													
													<option value="Mayotte">Mayotte</option>
													
													<option value="Mexico">Mexico</option>
													
													<option value="Micronesia, Federated States o">Micronesia, Federated States o</option>
													
													<option value="Moldova">Moldova</option>
													
													<option value="Monaco">Monaco</option>
													
													<option value="Mongolia">Mongolia</option>
													
													<option value="Montserrat">Montserrat</option>
													
													<option value="Morocco">Morocco</option>
													
													<option value="Mozambique">Mozambique</option>
													
													<option value="Myanmar">Myanmar</option>
													
													<option value="Namibia">Namibia</option>
													
													<option value="Nauru">Nauru</option>
													
													<option value="Nepal">Nepal</option>
													
													<option value="Netherlands">Netherlands</option>
													
													<option value="Netherlands Antilles">Netherlands Antilles</option>
													
													<option value="New Caledonia">New Caledonia</option>
													
													<option value="New Zealand">New Zealand</option>
													
													<option value="Nicaragua">Nicaragua</option>
													
													<option value="Niger">Niger</option>
													
													<option value="Nigeria">Nigeria</option>
													
													<option value="Niue">Niue</option>
													
													<option value="Norfolk Island">Norfolk Island</option>
													
													<option value="North Korea">North Korea</option>
													
													<option value="Northern Mariana Islands">Northern Mariana Islands</option>
													
													<option value="Norway">Norway</option>
													
													<option value="Oman">Oman</option>
													
													<option value="Pakistan">Pakistan</option>
													
													<option value="Palau">Palau</option>
													
													<option value="Palestine">Palestine</option>
													
													<option value="Panama">Panama</option>
													
													<option value="Papua New Guinea">Papua New Guinea</option>
													
													<option value="Paraguay">Paraguay</option>
													
													<option value="Peru">Peru</option>
													
													<option value="Philippines">Philippines</option>
													
													<option value="Pitcairn">Pitcairn</option>
													
													<option value="Poland">Poland</option>
													
													<option value="Portugal">Portugal</option>
													
													<option value="Puerto Rico">Puerto Rico</option>
													
													<option value="Qatar">Qatar</option>
													
													<option value="RÃƒÂ©union">RÃƒÂ©union</option>
													
													<option value="Romania">Romania</option>
													
													<option value="Russian Federation">Russian Federation</option>
													
													<option value="Rwanda">Rwanda</option>
													
													<option value="Saint Helena">Saint Helena</option>
													
													<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
													
													<option value="Saint Lucia">Saint Lucia</option>
													
													<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
													
													<option value="Saint Vincent and the Grenadin">Saint Vincent and the Grenadin</option>
													
													<option value="Samoa">Samoa</option>
													
													<option value="San Marino">San Marino</option>
													
													<option value="Sao Tome and Principe">Sao Tome and Principe</option>
													
													<option value="Saudi Arabia">Saudi Arabia</option>
													
													<option value="Senegal">Senegal</option>
													
													<option value="Seychelles">Seychelles</option>
													
													<option value="Sierra Leone">Sierra Leone</option>
													
													<option value="Singapore">Singapore</option>
													
													<option value="Slovakia">Slovakia</option>
													
													<option value="Slovenia">Slovenia</option>
													
													<option value="Solomon Islands">Solomon Islands</option>
													
													<option value="Somalia">Somalia</option>
													
													<option value="South Africa">South Africa</option>
													
													<option value="South Georgia and the South Sa">South Georgia and the South Sa</option>
													
													<option value="South Korea">South Korea</option>
													
													<option value="Spain">Spain</option>
													
													<option value="Sri Lanka">Sri Lanka</option>
													
													<option value="Sudan">Sudan</option>
													
													<option value="Suriname">Suriname</option>
													
													<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
													
													<option value="Swaziland">Swaziland</option>
													
													<option value="Sweden" selected="">Sweden</option>
													
													<option value="Switzerland">Switzerland</option>
													
													<option value="Syria">Syria</option>
													
													<option value="Taiwan">Taiwan</option>
													
													<option value="Tajikistan">Tajikistan</option>
													
													<option value="Tanzania">Tanzania</option>
													
													<option value="Thailand">Thailand</option>
													
													<option value="Togo">Togo</option>
													
													<option value="Tokelau">Tokelau</option>
													
													<option value="Tonga">Tonga</option>
													
													<option value="Trinidad and Tobago">Trinidad and Tobago</option>
													
													<option value="Tunisia">Tunisia</option>
													
													<option value="Turkey">Turkey</option>
													
													<option value="Turkmenistan">Turkmenistan</option>
													
													<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
													
													<option value="Tuvalu">Tuvalu</option>
													
													<option value="Uganda">Uganda</option>
													
													<option value="Ukraine">Ukraine</option>
													
													<option value="United Arab Emirates">United Arab Emirates</option>
													
													<option value="United Kingdom">United Kingdom</option>
													
													<option value="United States">United States</option>
													
													<option value="United States Minor Outlying I">United States Minor Outlying I</option>
													
													<option value="Uruguay">Uruguay</option>
													
													<option value="Uzbekistan">Uzbekistan</option>
													
													<option value="Vanuatu">Vanuatu</option>
													
													<option value="Venezuela">Venezuela</option>
													
													<option value="Vietnam">Vietnam</option>
													
													<option value="Virgin Islands, British">Virgin Islands, British</option>
													
													<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
													
													<option value="Wallis and Futuna">Wallis and Futuna</option>
													
													<option value="Western Sahara">Western Sahara</option>
													
													<option value="Yemen">Yemen</option>
													
													<option value="Yugoslavia">Yugoslavia</option>
													
													<option value="Zambia">Zambia</option>
													
													<option value="Zimbabwe">Zimbabwe</option>
													
												</select>
												
											</div>
											
										</div>
										<div class="thr_clmn  wi_50 padl10" >
											<div class="pos_rel">
												
												<input type="text" name="phone" id="phone" placeholder="Phone number" class="wi_100 rbrdr padrl10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5"  >
												
											</div>
										</div>
										</div>
										
											
												<div class="on_clmn martb10">
												
											<input type="text" name="description" id="description" placeholder="Description" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt lgtgrey2_bg fsz18 brdrad5"> </div>
									
								<div class="clear"></div>
							</div>
							
							
							
							
							<div class="clear"></div>
							
							<div class="padb10 xs-padrl0" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="sendInformation();">Meddela</a> </div>
							
								
						</div>
						
						
					</form>
					
					
				</div>
				
				
				</div>
			</div>
			
			<div class="wi_50 xs-wi_100 fxshrink_0 order_1 xs-order_2 martb20 marr30 xs-marr0 talc  xs-padr0">
								<img src="https://www.qloudid.com/html/omworkplace/images/random/undraw_gradma_wanr.png" class="wi_100 hidden-xs">
								
								<h4 class="bold fsz25 padb10 tall">Hur det fungerar</h4>
								
								<ul class="mart10 padl20 tall">
									<li class="black_txt fsz16">Fyll i den skadades person nummer. Se till att det är rätt land</li>
									<li class="black_txt fsz16">Fyll i address var personen befinner sig.</li>
									<li class="black_txt fsz16">Skriv ett kort meddelande</li>
									<li class="black_txt fsz16">Fyll i ditt personnummer</li>
									<li class="black_txt fsz16">Klicka på meddela rutan</li>
								</ul>
								</div>
			
			</div>
			
		</div>
		
		</div>
			
		</div>
		
		
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
		
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div id="error_msg_form" class="fsz20"> </div>
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
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
							<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
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
							<a href="#" class="class-toggler dark_grey_txt " data-classes="active" onclick="changeClass(this);">
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
		
		<div class="clear"></div>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
		
		
		<script>
			
			function updateInd(id)
			{
				
				$("#ind").val(id);
			}
			// Collborators autocomplete
			var $col_cont = $('#collaborators-container'),
			$col_form = $("#collaborators-form"),
			$lookup = $("#collaborators-lookup");
			
			if($col_cont[0] && $lookup[0]){
				$lookup
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../employeeList/<?php echo $data['cid']; ?>",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							$("#ind").val('');
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							
							$lookup.data('item', item);
							event.target.value = item['label'];
							$("#ind").val(indset);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				$col_form.on('submit', function(){
					var item = $lookup.data('item'),
					val = $lookup.val().trim();
					
					if(item && val === item['label']){
						console.log(1);
						var col_html = '<div class="collaborator-row dflex alit_c pos_rel mart10">';
						if(item.image){
							col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 bgir_norep bgip_c bgis_cov" style="background-image: url(' + item.image + ')"></div>';
						}
						else{
							var fl = item['first-name'] ? item['first-name'].charAt(0) : (item['last-name'] ? item['last-name'].charAt(0) : (item['email'] ? item['email'].charAt(0) : '?'));
							col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + fl.toUpperCase() + '</div>';
						}
						
						col_html += '<div class="flex_1 padr40 padl15 fsz13">';
						if(item['first-name'] || item['last-name']){
							col_html += '<div><strong>' + item['first-name'] + ' ' + item['last-name'] +  '</strong></div>';
						}
						if(item['email']){
							col_html += '<div class="txt_0_54">' + item['email'] + '</div>';
						}
						col_html += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
						
						$col_cont.append(col_html);
						
						$lookup
						.val('')
						.parent()
						.removeClass('active');
					}
					else{
						if(val.length > 3 && val.indexOf('@') > -1 && val.indexOf('.') > -1){
							console.log(2);
							var col_html = '<div class="collaborator-row dflex alit_c pos_rel mart10">';
							col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + val.charAt(0).toUpperCase() + '</div>';
							col_html += '<div class="flex_1 padr40 padl15 fsz13">';
							col_html += '<div><strong>' + val +  '</strong></div>';
							col_html += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont.append(col_html);
							
							$lookup
							.val('')
							.parent()
							.removeClass('active');
						}
					}
					return false;
				});
			}
		</script>
		
		
	</body>
</html>										