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
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
		
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		<script>
			var getDepartment='';
			function changeBg(id)
			{
				if($("#"+id).hasClass('lgtgrey2_bg'))
				{
					
					$("#"+id).removeClass('lgtgrey2_bg');
					$("#"+id).addClass('panlyellow_bg');
					
					getDepartment=getDepartment+id+',';
					
					$("#indexing_save_partner").val(getDepartment);
				}
				else
				{
					
					$("#"+id).addClass('lgtgrey2_bg');
					$("#"+id).removeClass('panlyellow_bg');
					
					getDepartment = getDepartment.replace(id+",", "");
					$("#indexing_save_partner").val(getDepartment);
				}
			}
			
			
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
			
			function checkInformation()
			{
				document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
				$("#error_msg_form").html('You are done with selecting company partner types.');
				return false;
			}
			function requestAdmin()
			{
				document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("admin_request").style.display='block';
				$(".admin_request").addClass('active');
				
				return false;
			}
			function sendInformation()
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
				
				else if($("#indexing_save_partner").val()=="")
				{
					document.getElementById("popup_fade").style.display='block';
					$("#popup_fade").addClass('active');
					document.getElementById("person_informed").style.display='block';
					$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please select atleast one partner type');
					return false;
				} 
				
				else {
					var send_data={};
					send_data.company_name=$(".company_name").text();
					send_data.ccountry=$(".country").text();
					send_data.address=$(".address").text();
					send_data.zip_code=$(".zip").text();
					send_data.city=$(".city").text();
					send_data.cid=$(".cid").text();
					send_data.ind=$("#ind").val();
					send_data.indexing_save_partner=$("#indexing_save_partner").val();
					$.ajax({
						type:"POST",
						url: "../sendInformation/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							if(data1==1)
							{
								window.location.href ="https://www.safeqloud.com/company/index.php/CompanyPartner/partnerInfo/<?php echo $data['cid']; ?>";
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
		<?php include 'CompanyHeaderUpdated.php'; ?>
		<div class="clear" id=""></div>
		
		
		<div class="column_m container zi5  mart40 xs-mart40" onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
												<!-- Logo -->
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20 brdrad1000 yellow_bg_a greenyellow_bg black_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
													" id="aa_1227620">P</div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span>Partners Portal</span>  </div>
													</a></div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
									
										<ul class="marr20 pad0">
										
										<li class=" dblock padb10 padl8 ">
											<a href="../../Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 ">
											<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Bli partner</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										<li class="dblock pos_rel padb10 brdclr_hgrey hidden">
										
											<ul class="marr20 pad0">
												
												
												
												
												<li class="dblock padrb10">
													<a href="../../CompanyNews/companyNewsAccount/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Meddelande</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												</ul>
											
										</li>
										
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Branschpartner</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="../../Receptionist/workInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Företagskunder</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li> 
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Teknisk Partner</h4>
											<ul class="marr20 pad0">
												
												
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Integration</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li> 
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Utvecklar Partner</h4>
											<ul class="marr20 pad0">
												
												
												<li class="dblock padrb10">
													<a href="../../Apps/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">API</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
													<li class="dblock padrb10">
													<a href="../../WhitelistIP/statistics/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Statistic</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
													<li class="dblock padrb10">
													<a href="../../CompanyDevApps/appsAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Company Devs App</span>
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
						
						<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class="white_bg tall">
									
									
									
									
									<!-- Logo -->
									<h1 class="fsz25 bold">Ansök om partnerskap.</h1>
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Gratis tjänst till anhöriga</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
										
								
							</div>
						<div class="column_m pos_rel white_bg mart10  greygrey_bg  xs-padrl0">
									<div class="pos_rel bgir_norep bgip_r">
										<div class="wi_100 ovfl_hid xs-dnone pos_abs zi1 top0 left0">
											<div class="wrap maxwi_100">
												
											</div>
										</div>
										<div class="wrap maxwi_100 minhei_85vh dflex alit_c pos_rel zi2 padtb20 padrl20">
											<div>
												
												<div class="dflex xs-dblock fxwrap_w padb0 xs-padt0 xs-padb0">
													<div class="wi_50 xs-wi_100 order_2 padrl10">
														<img src="https://www.safeqloud.com/html/smartappcss/images/smart/design-1.png" width="642" height="439" class="maxwi_100 hei_auto">
													</div>
													<div class="wi_50 xs-wi_100 padtb0 sm-padtb55 md-padtb70 lg-padtb90 padr20 txt_708198">
														<h2 class="bold marb20 pad0 tall xs-talc fntwei_300 fsz55 sm-fsz32 md-fsz36 lg-fsz40 black_txt xs-fsz30">Upp till 70% billigare inköp<div class="wi_50p maxwi_100 hei_4p mart5 xs-marrla black_bg"></div>
														</h2>
														
														<ul class="mar0 pad0 tall fsz18 black_txt">
															<li class="wi_100 dflex marb15 first">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																Du sparar dyrbar tid</div>
															</li>
															<li class="wi_100 dflex marb15">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																Du sparar pengar</div>
															</li>
															<li class="wi_100 dflex marb15">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																	Jämförelse data
																</div>
															</li>
															<li class="wi_100 dflex marb15 last">
																<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																<div class="flex_1 alself_s padl10">
																	Expert hjälp
																</div>
															</li>
														</ul>
													</div></div>
											</div>
										</div>
										
									</div>
									
									
									
								</div>
							<div class="column_m container zi5  martb20">
									<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
										
										
										<!-- Center content -->
										<div class="wi_640p col-xs-12 col-sm-12 fleft pos_rel zi5  fsz14 padr0">
											
											
											
											
											<div class="column_m container zi5 padt0 fsz18 ">
												
												<!-- Section 1 -->
												<div class="xs-padrl10 ">
													<div class="wrap maxwi_100 ">
														<div class="dflex xs-fxwrap_w alit_c">
															<div class="xs-wi_100 flex_1">
																
																<h2 class=" mart0 marb10 pad0 tall lgn_hight_s12 fsz30 bold">Vad är Q-inköp...</h2>
																<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
																<p>Qinkop är en inköpsorganisation som tecknar förmånliga inköpsavtal för sina medlemmar inom icke produktionsrelaterade produkter och tjänster. Qinkop tecknar inköpsavtal med leverantörer inom produkt- och tjänsteområden som de flesta små och medelstora företag har behov av i sin dagliga verksamhet.
																</p>
																
																<h3 class="mart20 padb15 fsz25 hidden">MED Q-INKÖP </h3>
																<ul class="mar0 pad0 tall hidden">
																	
																	<li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Har du en butik med 1000 rabatterade produkter </em>
																		</div>
																	</li>
																	
																	
																	
																	
																	<li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Snabb leverans</em>
																		</div>
																	</li>
																	
																	<li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Grym support</em>
																		</div>
																		</li><li class="wi_100 dflex marb15">
																		<span class="fa fa-check wi_32p brdrad100 bg_8fccd2 talc lgn_hight_32 white_txt"></span>
																		<div class="flex_1 alself_s padl10">
																			<em>Gratis medlemskap </em>
																		</div>
																	</li>
																	
																	
																</ul>
																
																
																<div class="mart30 hidden">
																	<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Kom igång idag</a>
																</div>
															</div>
														</div>
													</div>
												</div>
												
												
												
												<!-- Section 2 -->
												
												
												
												<div class="xs-padrl10 brdb_new hidden">
													<div class="wrap maxwi_100 padtb30">
														<div class="dflex xs-fxwrap_w alit_c">
															<div class="xs-wi_100 flex_1">
																<h2 class=" marb10 pad0 tall lgn_hight_s12 fsz30 bold">Så fungerar Q-inkop</h2>
																<div class="wi_50p marb20 brdt_new  brdwi_3"></div>
																
																
																
																
																
																<h3 class="mart20 padb15 fsz18">1. Beställ kundnummer hos Officedepot. Klicka på knappen "Kundnummer"</h3>
																<p class="brdb_new hidden">Skriv yrket Du behöver i sökrutan, välj det från yrkeslistan, eller klicka Dig fram via branscherna ! 
																	
																</p>
																<h3 class="mart20 padb15 fsz18">2. Inom kort får du per e-post ditt personliga kundnummer.</h3>
																<p class="brdb_new hidden">Du får mail från oss när någon leverantör vill ha Ditt uppdrag! </p>
																<h3 class="mart20 padb15 fsz18">3. Påföljande dag kan du klicka på "Handla" för att komma till Officedepot webbutik. Vid brådskande beställning kan du ringa samma dag, Officedepot på 010-xxxxxxx</h3>
																<p class="brdb_new hidden">Du får mail från oss när någon leverantör vill ha Ditt uppdrag! </p>
																
																<h3 class="mart20 padb15 fsz18">4. Angivna priser i webbutiken är avtalspriser med avdragen rabatt.</h3>
																
																
																
																
																
																
																
																
																
																
																<div class="mart15">
																	<a href="#" class="maxwi_200p minhei_50p dflex justc_c alit_c opa90_h brdrad3 tmgreen_bg talc bold fsz18 xs-fsz16 white_txt trans_all2">Kom igång idag</a>
																</div>
															</div>
															
														</div>
													</div>
												</div>
												
												
												
											</div>
											
											
											
											<div class="clear"></div>
										</div>
										
										
										
									</div>
								</div>
							
						<h1 class="fsz18 bold padtb10 mart20">Steg 1 - Välj ett eller alla partner typer</h1>
						<table class="wi_100 padb10 brdb_new top-10p <?php if($remainingpartnerTypeCount['num']==0) echo 'hidden'; ?>" cellpadding="0" cellspacing="0" id="mytable">
										
										<tbody>
										
											<tr class="hei_40p ">
												<?php foreach($remainingpartnerType as $category => $value) 
													{	?> 
													<td class="padr5 padb10 wi_33">
														<div class=" brdrad5  talc ">
															<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 marr10 lgtgrey2_bg panlyellow_bg_h" id="<?php echo $value['id']; ?>">
																
																<a href="javascript:void(0);" class="fsz20 wi_100 hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(<?php echo $value['id']; ?>);" >
																	<span class="dnone_pa"><?php echo $value['partner_type']; ?></span>
																	
																</a>
															</div>
														</div>
													</td>
												<?php } ?>
											</tr>
											
											
											
										</tbody></table>
										
						<h2 class="fleft mar0 padtb5 fsz18 bold mart20">Steg 2 - Verifiera att uppgifterna stämmer. </h2>			
						
						<div class=" lgtgrey2_bg mart50  brdrad3 padb10" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20   fsz14 dark_grey_txt  ">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="container marrl-2 padl15 xs-marrl0 padl0">
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10"> <span class="trn">Company name</span> <span class=" edit-address dblock brdb_new brdclr_lgtgrey2 fsz16 company_name"><?php if($companyDetail['company_name']!="" || $companyDetail['company_name']!= null) echo $companyDetail['company_name']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10 "> <span class="trn">CID</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16 cid"><?php if($companyDetail['cid']!="" || $companyDetail['cid']!= null) echo $companyDetail['cid']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10 "> <span class="trn" >Address</span> <span class=" edit-text jain2 dblock brdb_new brdclr_lgtgrey2 fsz16 address"><?php if($companyDetail['address']!="" || $companyDetail['address']!= null) echo $companyDetail['address']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2 marl15  padb10 xs-padl0"> <span>Zip</span> <span class=" edit-select zip dblock brdb_new brdclr_lgtgrey2 fsz16"  ><?php if($companyDetail['zip']!="" || $companyDetail['zip']!= null) echo $companyDetail['zip']; else echo "-"; ?></span> </div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0 padb10"> <span class="trn">City</span> <span class=" edit-address dblock brdb_new brdclr_lgtgrey2 fsz16 city"><?php if($companyDetail['city']!="" || $companyDetail['city']!= null) echo $companyDetail['city']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0  padb10"> <span class="trn">Country</span> <span class=" edit-text jain1 dblock brdb_new brdclr_lgtgrey2 fsz16 country"><?php if($companyDetail['country_name']!="" || $companyDetail['country_name']!= null) echo $companyDetail['country_name']; else echo "-"; ?></span> </div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 marl15 xs-mar0  "> <span class="trn" >Employee Name</span> <span class=" edit-text  dblock brdb_new brdclr_lgtgrey2 fsz16 emp_name"><?php echo $userDetail['first_name'].' '.$userDetail['last_name']; ?></span> </div>
											
										</div>
										
									</div>
									
									
									
									
									
								</div>
								
								
							</div>
							
						</div>		
						
						
									
										
										
										<input type="hidden" id="ind" name="ind" value='<?php echo $userDetail['id']; ?>' />
										
										<input type="hidden" id="indexing_save_partner" name="indexing_save_partner" value="" />
										
								
								
								
								
								<div class="clear"></div>
								
								<div class="padtb10 xs-padrl0 brdb_new <?php if($remainingpartnerTypeCount['num']==0) echo 'hidden'; ?> <?php if($adminDetail==0) echo 'hidden'; ?>" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="sendInformation();">Meddela</a> </div>
								
								<div class="padtb10 xs-padrl0 brdb_new <?php if($remainingpartnerTypeCount['num']>0) echo 'hidden'; ?> <?php if($adminDetail==0) echo 'hidden'; ?>" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="checkInformation();">Meddela</a> </div>
								<div class="padtb10 xs-padrl0 brdb_new <?php if($adminDetail==1) echo 'hidden'; ?>" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="requestAdmin();">Meddela</a> </div>
							</div>
							
							
						</form>
						
						
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
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="admin_request">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<h2 class="fsz20">Only company admin can sign partnership</h2>
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Become admin</a> </div>
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