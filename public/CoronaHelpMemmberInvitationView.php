
<!DOCTYPE html>
 
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Qloudid</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/skeleton.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/layout.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/main.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/base.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		 
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/smart/css/icofont.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		 <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		 <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/smart/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script> 
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->


  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>

<!-- JavaScript
	================================================== -->

    

    
	
   <script src="<?php echo $path; ?>html/usercontent/js/custom.js" type="text/javascript"></script> <!-- jQuery initialization -->

	<script src="<?php echo $path; ?>html/coronahelpcss/ticker.js" type="text/javascript"></script>
	 <link rel="shortcut icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	 <link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="<?php echo $path; ?>html/coronahelpcss/helper.css">

<script type="text/javascript">
 
function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					 
					$("#error_msg_form").html('Please provide a valid email address');
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}



			function register(id)
			{
				 
				$("#error_msg_form").html('');
				 $("#error_msg_form").addClass('hidden');
				if($("#cntry").val()=="" || $("#cntry").val()==null)
				{
				 $("#error_msg_form").removeClass('hidden');
					$("#error_msg_form").html('please select country of residense.');
					return false;
				}	
				 	
				 
				if($("#email").val()=="" || $("#email").val()==null)
				{
				 $("#error_msg_form").removeClass('hidden');
					$("#error_msg_form").html('please enter email address.');
					return false;
				}
				 
				if(!checkEmail("email"))
				{
				  $("#error_msg_form").removeClass('hidden');
				$("#error_msg_form").html("please enter correct email format");
					return false;
				}
				
				
				if($("#password").val()=="" || $("#password").val()==null)
				{
				 $("#error_msg_form").removeClass('hidden');
					$("#error_msg_form").html('please enter password.');
					return false;
				}
				 document.getElementById('save_indexing').submit();
			}
			
    
    //reset previously set border colors and hide all message on .keyup()
    
</script>
</head>
<body class="ffamily_avenir ">



	<!-- Header Section
	================================================== -->
	<div class="bg_333333">
		<div class="wi_1200p maxwi_100 container xs-wi_100">
			<div class="wi_1200p maxwi_100 twenty columns header_container xs-wi_100 bg_333333">
				<div class="wi_760p xsi-wi_100 columns header_left alpha padt140 xs-padt0 xs-talc maxwi_100">
					<div class="header_left_inner">
						 
						<div class="clearfix small_padding"></div>
						 
						<div class="clearfix"></div>
						<h2 class="white_txt fsz46 lgn_hight_60 ffamily_avenir nobold  xs-fsz30 xxs-lgn_hight_40">
							<?php echo $viewGroupDetail['group_name']; ?>
						</h2>	
						<h3 class="header_text ffamily_avenir fsz25 xs-fsz20 lgn_hight_25">
							Sverige och världen befinner sig i en extraordinär situation och vi ställs inför nya utmaningar. Som medlem kommer du kunna ta del av uppdrag i ditt närområde och följa gruppens prestation.
						</h3>	
						<div class="clearfix "></div>
						<div class="container">
							
					</div>
				</div>

				<div class="seven  columns alpha hidden-xs">
					<div class="header_tagline">
						<p class="header_bottom_text ffamily_avenir hidden-xs">
							Skriv upp dig nu, din hjälp behövs.
						</p>
					</div>
				</div>
				 
						</div>

			<div class="seven columns header_right white_bg  omega xs-wi_100 box_shadow">
					<div class="header_right_inner padrtl35i white_bg padb0">
						<div class="clearfix small_padding"></div>
						 
						<div class="clearfix small_padding"></div>
						 
						<div class="clearfix"></div>
						 <div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 xxs-fsz45  padb10 black_txt trn" style="font-family: Monospace">Volontär</h1>
									</div>
									<div class="mart0 xs-mart0 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" > Skapa konto och hjälp till.</a></div>
						<form action="../registerMember/<?php echo $data['invitation_id']; ?>" method="POST" name="save_indexing" id="save_indexing"  accept-charset="ISO-8859-1" autocomplete="off" >
						<div class="clearfix"></div>
						<fieldset >
							<label for="phone" ><span class="labelSpan ffamily_avenir">Country *</span><br/> 
							<select  name="cntry" id="cntry" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_black brd_width_1 red_ff2828_txt fsz20  minhei_65p xxs-minhei_60p trans_bg dropdown-bg  tall padl0 ffamily_avenir marb20" >
						    <option value="">Select country</option>
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg lgt_grey_txt  tall"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>                            
											</select>
						    </label>
						  
						    <label for="email"><span class="labelSpan ffamily_avenir">Email *</span><br/> 
						    <input type="email" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_black brd_width_1 tall  xxs-minhei_60p minhei_65p fsz20 red_ff2828_txt ffamily_avenir  marb20" name="email" id="email" autocomplete="off" />
						    </label>
						    
						   
						    <label for="phone"><span class="labelSpan ffamily_avenir">Password *</span><br/> 
						    <input type="password"  class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_black brd_width_1 tall  xxs-minhei_60p minhei_65p fsz20 red_ff2828_txt ffamily_avenir marb20" name="password" id="password"  autocomplete="off"/>
						    </label>
							 
							<input type="hidden" id="lstatus" name="lstatus" value='0' />
						 <div class="valm fsz16 red_txt marb20 hidden" id="error_msg_form"> </div>
						 
						 <div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword minhei_55p red_ff2828_bg fsz18 padrl80" onclick="register();">Registrera</button>
								
							</div>
						    <div class="talc fsz16">Detta är kostnadsfritt</div>
						    
						</fieldset>
						</form>
					 
						<div class="clearfix"></div>

					</div>
				</div>
			</div>
		</div>
	</div>



<!-- features Section
	================================================== -->
	<div class="features_section hidden">
		<div class="container wi_1200p maxwi_100" >
			<div class="sixteen columns wi_1200p maxwi_100">
				<div class="one-third column wi_385p alpha xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-home pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Best Homes</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
				<div class="one-third column wi_385p xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-credit pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Great Prices</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
				<div class="one-third column omega wi_385p xs-padrl15 xs-wi_100">
					<div class="feature_item">
						<span class="pe-7s-tools pe-5x pe-va feature_icon"></span>
						<div class="feature_text_div">
							<h3 class="feature_iem_title ffamily_avenir">Free Support</h3>
							<p class="feature_item_text ffamily_avenir">Design becoming like this is one of your goals here are some general pointers.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="wi_1200p maxwi_100 dflex xs-fxwrap_w alit_c padt30 xs-padt10 marb0 white_bg marrla hidden">
						
						
						<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall  padl0 padr40 xxs-brdb_new talc xs-padrl20">
							
							
							<div class="wi_100 xs-wi_100 bs_bb pad40 tall padrl0 xs-padrl0 xs-pad20">
								
								<h2 class=" padtb20 xs-padt0 tall bold fsz32 xs-fsz25 ffamily_avenir"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Om Krishjälpen </font></font></h2>
								<div class="padrbl0 lgn_hight_s1_5 tall fsz18 black_txt ffamily_avenir"><font style="vertical-align: inherit;">I tider av oro behöver vi vara fler som värnar om varandra och hjälper till där det behövs som mest. Vi har därför valt att skapa Krishjälpen för att hjälpa de som drabbats av coronaviruset och skydda de som till hör en av riskgrupperna från covid 19. Var med och stoppa spridningen av coronaviruset genom att hjälpa till med inköp av förnödenheter till någon i karantän.   
 
</font></div>
							</div>
							
							
						</div>
						<div class="wi_50 xs-wi_100 flex_1 order_2 xs-order_2 xs-tall tall xs-padrl20 padl40 brdrad5 talc ">
							
							
							<div class="wi_100 xs-wi_100 bs_bb pad40 tall padrl0 xs-padrl0 xs-pad20">
								
								<h2 class=" padtb20 xs-padt0 tall bold fsz32 xs-fsz25 ffamily_avenir"><font style="vertical-align: inherit;">Hur det fungerar</font></h2>
								<div class="padrbl0 lgn_hight_s1_5 tall fsz18 black_txt ffamily_avenir"><font style="vertical-align: inherit;">Registrera dig som Krishjälpare genom att registrera ett konto och anmäla dig som volontär. Du som redan har ett Qloud ID konto, får upp en förfrågan om du kan tänka dig att hjälpa en medmänniska i din närhet nästa gång du loggar in. 
								
								<p class="padt10 ">Behöver du hjälp med att skapa konto, ring oss på 010 – 15 10 125</p>
</font></div>

							</div>
							
							
						</div>
						
					</div>
<div class="wi_100 ovfl_hid bg_f2f4f5 hidden">
		<div class="wi_1200p maxwi_100 minwi_0  alit_s marrla padt90 xs-padt40   xs-padrl20">
		<div class="wi_50 minwi_0  alit_c pos_rel marrla "><h2 class=" padt20 padrl15 talc fntwei_300  fsz32 bold sm-fsz32 md-fsz36 lg-fsz40 black_txt ffamily_avenir">FAQs<div class="wi_100 maxwi_100   mart5  bg_f"></div></h2></div>
		<div class="dflex fxwrap_w alit_s padt0 tall">
			<div class="wi_50 xs-wi_100 dflex ">
				<div class="wi_100 padtb40 xs-padb0 sm-padtb55 md-padtb70 lg-padtb90 padr15  xs-padrl0 txt_708198">
					 
				<div class="hide-base padt15 sm-padt30 md-padt45 lg-padt55 txt_708198">
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-1" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Vad kan jag hjälpa till med? </span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-1" style="display: none;">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">	För att minimera risken för smittspridning i samhället bör inte alla invånare åka och handla i affärer. Genom att bli en del av Krishjälpen kan du hjälpa dina medmänniskor med :
									<ul>
									<li>	Handla mat och andra varor </li>
									<li>	Handla apoteksvaror</li>
									<li>	Gå ut med hunden</li>
									<li>	Låna ut parkeringsplats</li>
									<li>	Digital läxhjälp</li>
									<li>	Någon att prata med</li>
									<li>	Låna ut kontorsutrustning</li>
									<li>	Lämna post/brev</li>
									<li>	Etc</li>
									</ul>
									</font>

									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-2" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Hur förhindrar jag smitta vid överlämning?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-2">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
								<font style="vertical-align: inherit;">Följ alla myndighetsrekommendationer till punkt och pricka: tvätta händerna ofta med tvål och varmt vatten i 30 sekunder, rör inte vid ditt ansikte när du inte har nytvättade händer och undvik social kontakt om du har förkylningssymptom (vanliga symptom vid covid-19-smitta är feber, andningsbesvär, halsont, torrhosta, huvudvärk, och muskelvärk. Stanna hemma även om du bara har andra förkylningssymptom som tät/rinnande näsa och nysningar).
									Du som handlar åt personer som är isolerade på grund av covid-19 eller tillhör riskgrupper och behöver undvika smitta måste givetvis vara extremt noggrann med hygien när du levererar mat, mediciner eller liknande. Tvätta händerna med tvål och varmt vatten i 30 sekunder innan du går och handlar. Undvik smycken såsom klockor/armband, och ringar.
									<ul>
									<li>	Lämna det du ska leverera utanför dörren. </li>
									<li>	Tvätta händerna med tvål och varmt vatten i 30 sekunder när du kommer hem från affären.</li>
									<li>	Om du kan så använd handsprit</li>
									<li>	Om du själv börjar få minsta symptom på förkylning - delegera uppdraget vidare!</li>
									</ul>

													</font>
									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-3" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Är det tryggt? </span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-3">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">Alla som hjälper till och ber om hjälp i Krishjälpen har skapat konto med sitt BankID, och på så sätt identifierar man sig på ett säkert sätt. Vi lämnar inte heller ut några telefonnummer till varken hjälpsökande eller volontär. Detta innebär att bedragare inte har någon möjlighet att nå och försöka lura varken hjälpsökande eller volontär. </font>
									</div>
								</div>
							</div>
						</div>
						</div>
				</div>
			</div>
			<div class="wi_50 xs-wi_100 dflex ">
				<div class="wi_100 padtb40 xs-padt0 sm-padtb55 md-padtb70 lg-padtb90 padl15 xs-padrl0 txt_708198">
					 
				<div class="hide-base padt15 sm-padt30 md-padt45 lg-padt55 txt_708198">
				<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-4" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Hur hjälper jag de i min närhet? </span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-4">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
								<font style="vertical-align: inherit;">Du registrerar din adress och väljer inom vilken radie du har möjlighet att hjälpa. Du kommer endast få notiser samt kunna se de hjälpsökande som befinner sig inom ditt förvalda område. Du kan öka och minska ditt hjälpområde om du skulle vilja. </font>
									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-5" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Hur vet jag när, var och vilken hjälp som behövs?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-5">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">Vi skickar push notiser till dig när någon söker hjälp i din närhet. Hjälpsökande har skapat en inköpslista med de varor som behövs. Du väljer de varor som du har möjlighet att hjälpa till med. När du har valt dina varor ingår du en överenskommelse om att du skall leverera dem men du behöver inte köpa allt på inköpslistan. Flera volontärer kan hjälpas åt och stätta en hjälpsökande.   </font>
									</div>
								</div>
							</div>
						</div>
					
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-11" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Hur hjälper jag till?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-11" style="display: none;">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
								<font style="vertical-align: inherit;">Registrera dig som Krishjälpare genom att registrera ett konto och anmäla dig som volontär. Du som redan har ett Qloud ID konto, får upp en förfrågan om du kan tänka dig att hjälpa en medmänniska i din närhet nästa gång du loggar in. 

								Behöver du hjälp med att skapa konto, ring oss på 010 – 15 10 125</font>

									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-12" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Which hardware works with SafeQid?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-12">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">	SafeQid is not a hardware-intensive solution. The only requirement is a good internet connection. Once you buy our solution, our Get-started-coach will help you configure SafeQid for your daycare center using devices you already have</font>.
									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-13" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">How much does it cost to install SafeQid?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-13">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">	SafeQid license is free to install for daycare centers. All services are included and we nly charge for educations and extra support-services. </font>
									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-14" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">When is SafeQid support available?</span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-14">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
									<font style="vertical-align: inherit;">	SafeQid Support is available 5 days a week. Monday through Friday 8:00 am to 5:00 pm and Central European time. You can call us at +46 10 15 10 125, email support@safeqid.com or use the live chat feature on our web site. Please don’t hesitate to Contact SafeQid, we’re here to help!</font>
									</div>
								</div>
							</div>
						</div>
						<div class="marb12 bxsh_00150_2430110009 brdrad5 bg_f hidden">
							<a href="#" class="expander-toggler wi_100 minhei_48p dflex alit_c pos_rel padtb10 padr50 padl20 brdrad5 bg_f black_bg_a fntwei_600 fsz18 sm-fsz17 txt_516074 txt_a549e9_h txt_f_ai trans_all2" data-target="#faq-15" data-hide="all" data-hide-base=".hide-base">
								<span class="ffamily_avenir">Who can get SafeQid? </span>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0_pa pos_abs zi1 pos_cenY right20p brdrad100 bg_dee1e5 fsz12 txt_1246b8"><span class="padl1 icofont icofont-plus"></span></div>
								<div class="wi_24p hei_24p dflex alit_c justc_c opa0 opa1_pa pos_abs zi2 pos_cenY right20p brdrad100 bg_f fsz12 txt_a549e9"><span class="padl1 icofont icofont-minus"></span></div>
							</a>
							<div class="dnone brdrad5 bg_f" id="faq-15">
								<div class="padtbl20 padr26">
									<div class="custom-scroll hei_150p ovfl_auto padr20 lgn_hight_s1_5  fsz18 black_txt ffamily_avenir tall">
								<font style="vertical-align: inherit;">		SafeQid serves all private, and public daycare centers, pre-schools and after-school programs. This is a secure, smart and complete safety solution for those looking to increase the safety of their enrolled children. </font> 
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			
			</div>
			</div>
		</div>
		<style>
			.custom-scroll::-webkit-scrollbar{
				width: 12px;
				height: 12px;
				padding: 0 3px;
				border-radius: 20px;
    			background: #e9e9e9;
			}
			.custom-scroll::-webkit-scrollbar-button{
				width: 12px;
				height: 12px;
			}
			.custom-scroll::-webkit-scrollbar-track{
				width: 100px;
			}
			.custom-scroll::-webkit-scrollbar-thumb{
				border-right: 3px solid #e9e9e9;
				border-left: 3px solid #e9e9e9;
				background: #a549e9;
			}
		</style>
	</div>	
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>


<!-- End Document
================================================== -->
</body>
</html>