<!doctype html>

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
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="<?php echo $path1;?>default-profile-pic.jpg";  $imgs="<?php echo $path1;?>default-profile-pic.jpg"; } }  else {  $imgs="<?php echo $path1;?>default-profile-pic.jpg"; $value_a="<?php echo $path1;?>default-profile-pic.jpg"; } ?>
<html>
	
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
			function expressEntry()
			{
				document.getElementById('save_indexing').submit();
			}

			function informEmployee(id)
			{
				$("#error_msg_form").html('');
				if($("#ind").val()=="" || $("#ind").val()==0 || $("#ind").val()==null)
				{
				document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please select employee');
					return false;
				}
				
				if($("#name").val()=="" || $("#name").val()==null)
				{
				document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter name');
					return false;
				}
				
				if($("#lname").val()=="" || $("#lname").val()==null)
				{
					document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter last name');
					return false;
				}
				
				
				
				
				if($("#uphno").val()=="" || $("#uphno").val()==null)
				{
					document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter phone number');
					return false;
				}
				else if(isNaN($("#uphno").val())) {
					document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					alert("Phone number must be a numeric value!!");
					return false;
				}			
				else{
					var send_data={};
					send_data.booked=$("#booked").val();
					send_data.ind=$("#ind").val();
					send_data.name=$("#name").val();
					send_data.lname=$("#lname").val();
					send_data.cname=$("#cname").val();
					send_data.email=$("#email").val();
					send_data.cntry=$("#cntry").val();
					send_data.uphno=$("#uphno").val();
					send_data.car_res_num=$("#car_res_num").val();
					$.ajax({
						type:"POST",
						url: "../../checkVisitor/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						if(data1==0)
						{
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("person_informed").style.display='block';
							$(".person_informed").addClass('active');
							$("#error_msg_form").html('Person already registered !!!');
							return false;
						}
						else
						{
							document.getElementById('collaborators-form').submit();
						}
						}
					});
				}
				
			}
			
			
		</script>
			
	
		<?php $path1 = $path."html/usercontent/images/"; ?>
		</head>
		<body class="lgtgrey2_bg">
	
	<div class="column_m header xs-header xsip-header xsi-header bs_bb" style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10" style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f9f9f9"; else echo $corporateColor['bg_color']; ?>">
				<div class="logo padt10 wi_50p xs-wi_50p"><a href="#"><img src="<?php echo $path; ?>html/usercontent/images/favicon-32x32.png" alt="Qmatchup" title="Bisswise" height="32" width="32"></a></div>
				
				<div class="visible-xs visible-sm fleft padl10">
							<div class="flag_top_menu flefti  padb10 padt10  xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path; ?>/html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
			<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel brd2 brdclr_black brdrad5 marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25 black_txt black_txt_h" data-en="About" data-sw="About">About</a> </li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr0 padr0 padt10  brdwi_3"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz14 black_txt">Your data</a> </div>
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
			
			
			
			
			<div class="column_m container zi5  mart40 xs-mart40 lgtgrey2_bg"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 mart0 xs-pad0">
					
						<div class="padb20 xxs-padb0 ">
							<div class="marb30 padt60">
								<img src="<?php echo $imgs; ?>" class="maxwi_100 hei_auto  brdrad5" height="125" width="125" >
							</div>
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_black">
								<div class=" talc">
									
									<h1 class="padb5 talc fsz50 xs-fsz40 xsi-fsz45 bold " style="color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#00000"; else echo $corporateColor['bg_color']; ?>">Välkommen</h1>
									<p class="black_txt padt20 xs-padt10 xsi-padb20 xs-padb20 talc fsz25 xs-fsz20  xsi-fsz23 padb0  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10">Vänligen välj ett alternativ...</p>
								</div>
						</div>
						<form action="../../informEmployee/<?php echo $data['cid']; ?>" method="POST" name="collaborators-form" id="collaborators-form" accept-charset="ISO-8859-1">
							<!-- Leave for security protection, read docs for details -->
							<div class="hei_160p">
								<div class="step">
								
									<input type="hidden" name="booked" id="booked" value="Drop in" />
									
									
									<div class="row">
									<div class="col-5">
											<div class="form-group">
										<input type="text" name="name" id="name" placeholder="Namn" value="<?php  echo $userInformation['first_name']; ?>" class="fsz18 xs-fsz16 brdb brdrad3 wi_100 trans_bg required minhei_65p nobrd tall black_txt" <?php  echo 'readonly'; ?>>
									</div>
										</div>
										<div class="col-7">
											<div class="form-group">
												<input type="text" name="lname" id="lname" value="<?php  echo $userInformation['last_name']; ?>" placeholder="Efternamn" class="fsz18 xs-fsz16 brdb brdrad3 wi_100 trans_bg required minhei_65p nobrd tall black_txt" <?php  echo 'readonly'; ?>>
											</div>
										</div>
										
									</div>
									
									
									<div class="form-group">
										<input type="text" name="cname" id="cname" value="<?php  echo $userInformation['company_name']; ?>" placeholder="Ditt företag" class="fsz18 xs-fsz16 brdb brdrad3 wi_100 trans_bg required minhei_65p nobrd tall black_txt" >
									</div>
									
									<div class="form-group">
										<input type="text" name="email" id="email" value="<?php  echo $userInformation['visitor_email']; ?>" placeholder="Email" class="fsz18 xs-fsz16 brdb brdrad3 wi_100 trans_bg required minhei_65p nobrd tall black_txt" <?php  echo 'readonly'; ?>>
									</div>
									
									<div class="row">
									<div class="col-6">
											<div class="form-group">
										<div class="styled-select clearfix fsz18">
											<select class="default_view wi_100 mart0 trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p  dark_grey_txt tall padl0" name="cntry" id="cntry" disabled>
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php  if($value['id']==$userInformation['country_id']) echo 'selected';  ?> class="lgtgrey2_bg fsz18 tall"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>                            
											</select>
										</div>
									</div>
										</div>
										<div class="col-6">
											<div class="form-group nobrd">
												<input type="number" name="uphno" id="uphno" value="<?php  echo $userInformation['phone_number']; ?>" placeholder="Mobil" class="fsz18 xs-fsz16 brdb brdrad3 wi_100 trans_bg required minhei_65p nobrd tall black_txt" readonly>
											</div>
										</div>
										
									</div>
									
									
										<input type="hidden" name="car_res_num" id="car_res_num" placeholder="Din bils reg nr." class="form-control required" >
									
									
									<input type="hidden" id="ind" name="ind" value="<?php echo $employeeQuardInformation['id']; ?>"/>
								
									<!-- /row -->
									<div class="form-group terms hidden">
										<label class="container_check">Please accept our <a href="#" data-toggle="modal" data-target="#terms-txt">Terms and conditions</a>
											<input type="checkbox" name="terms" value="Yes" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
									
								
								</div>
							
						</form>
						
						<div class="padb10 xs-padrl10"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 white_bg panlyellow_bg_h  xs-panlyellow_bg_a xs-panlyellow_bg_h fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd" onclick="informEmployee();">Meddela </a> </div>
						<?php if($data['comp_id']!=0) { ?>
						<p class="padt20 xs-padt10 xs-padb20 talc fsz18 xs-fsz16 padb0  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 black_txt">This front desk is managed by <?php echo $data['comp_name']; ?></p>
						<?php } ?>
						
					</div>
					<div class="clear"></div>
				</div></div>
				
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30 mart30 marb0 white_bg">
			<div class=" dflex justc_sb alit_c padtb10 padrl40 brdt lgn_hight_34 fsz14 txt_787e89 fleft <?php if($verifyIP==0) echo "hidden"; ?>" >
				<div>
			
				<img src="<?php echo $path; ?>html/usercontent/images/map-pointer.svg" width="23" height="33" class="marr10 valm">
						<span class="val">
		            		<b>Qloud ID | </b><span class="hidden-xs"> Zum Quellenpark 33, Bad Soden </span>
		        		</span>
						
						
					</div>
					
				</div>
		</div>
			<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
				<div class="modal-content pad25  nobrdb talc brdrad5 ">
					
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Premiuminnehåll</h3>
					<div class="marb20">
						<img src="<?php echo $path1;?>gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Person Has been informaed</span>
						</div>
						
						
					</div>
					
						<div class="on_clmn mart10 marb20">
				<input type="button" value="Close" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp " onclick="closePop();">
					
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