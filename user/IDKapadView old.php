<?php
	$path1 = $path."usercontent/images/"; 
	
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>
	<script>
function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
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
</script>	
	<body class="white_bg">
		<?php $path1 = $path."html/usercontent/images/"; ?>
		<div class="column_m header  bs_bb lgtgrey2_bg" id="headerData">
			<div class="wi_100 hei_65p xs-pos_fix pos_fix  padtb5 padrl10 lgtgrey2_bg">
				
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
				
				<div class="fright xs-dnone visible_si padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="https://www.qloudid.com/user/index.php/StoreData/userAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
					</ul>
				</div>
				
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.qloudid.com/user/index.php/StoreData/userAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
				<div class="clear"></div>
				
			</div>
		</div>
		
			
		<div class="clear"></div>
		<div class="column_m pos_rel">
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart40" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					<div class="dflex xs-fxwrap_w alit_c">
							<div class="wi_50 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 marr30 xs-marr0">
								
								<h4 class="bold fsz45 xs-fsz40 padb10 tall  ">Anmäl ditt ID kapad</h4>
								<h3 class="fsz25 padb10  tall hidden-xs lgn_hight_30">Att anmä.la ditt ID kapad kostar inget. Vi meddelar sedan över 60 000 företag om att ditt ID är kapad. Och förhindrar sedan kaparen med att handla med ditt ID.</h3>
								
								<div class="talc padtb10 "> <a href="AboutQmatchupOmOss" ><input type="button" value="Submit" class="nobrd wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2"  ></a>
										
									</div>
								<div class="talc padtb0 "> <a href="StoreData/userAccount" ><input type="button" value="Cancel" class="nobrd wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 trans_bg fsz18 xs-fsz16 darkgrey_txt trans_all2"  ></a>
										
									</div>
							</div>
							<div class="wi_50 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc padl50 xs-padr0 xs-padl0">
								<h4 class="bold fsz25 padb10 tall hidden-xs">Varför dessa uppgifter är viktiga</h4>
								
								<ul class="mart10 pad0 tall fsz16">
									<li class="dblock mar0 marb10 pad0 first">
										<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3 hidden"></span>
											För att försäkra rätt information...
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>När du ansluter ditt Qloud ID till din arbetsgivare, skola eller bostadsförening får du tillgång till all viktig information som är stängd för allmänheten. Genom ett gemensamt samtycke till att dela varandras information har ni alltid rätta uppgifter.  </p>
											
											<p>Om du tex byter bank behöver du inte oroa dig för att inte få lönen i tid eller att hyran inte dras från rätt konto. </p>
											
											
											
											
										</div>
									</li>
									
									<li class="dblock mar0 marb10 pad0">
										<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3 hidden"></span>
											För att kunna kommunicera i förväg...
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Du får all information som berör dig som individ på ett ställe. Skall vattnet stängas av i din bostad, skall ni ha konferens, planerar skolan ett event?</p>
											<p>Du kommunicerar med din arbetsgivare, skola och bostadsförening via din Qloud ID anslutning.</p>
											<!--<p><strong class="uppercase">TIPS:</strong> En tumregel är att inte ansöka om lån som överstiger 90% av din årsinkomst.</p>-->
										</div>
									</li>
									<li class="dblock mar0 marb10 pad0">
										<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3 hidden"></span>
											För att bli meddelad om något hänt...
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Om olyckan skulle vara framme eller något akut har inträffat som gör att du behöver nås snabbt blir du meddelad tack vare att du är ansluten. Brinner det i din fastighet? Behöver skolan stängas för dagen?  </p>
											
											<p>Måste din arbetsgivare få ut ett meddelande till dig och alla dina kollegor, snabbt? Du blir direkt meddelad tack vare att ni är anslutna! </p>
										</div>
									</li>
									
									<li class="dblock mar0 marb10 pad0">
										<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3 hidden"></span>
											För att få tillgång till erbjudanden och förmåner....
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Dina Qloud ID anslutningar ger dig tillgång till alla de erbjudanden och förmåner som du ska ha tillgång till. Du når studentrabatter, erbjudanden från din fastighetsägare och förmåner från din arbetsgivare. </p>
										</div>
									</li>
									<li class="dblock mar0 marb10 pad0 last">
										<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3 hidden"></span>
											För att samverka och skapa relationer...
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Du når dina kollegor, elever som går på din skola eller boende i din fastighet via era privata ”nätverk” i Qloud ID. </p>
											
											<p>Skapa ett trivsammare miljöer genom att samverka och ta hjälp av varandra. Det är ovärderligt att ha folk som hjälper till när det behövs. </p>
											<p>Att få hjälp då man är bortrest eller att kunna utbyta kunskap med de som går på samma skola eller arbetar på samma arbetsplats.  </p>
										</div>
									</li>
									
								</ul>
							</div>
							
						</div>
				</div>
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
		</div>
	</div>
		
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	</body>
	<?php 
		if(isset($_GET['error']))
		{
			if($_GET['error']==1)
			{
				echo '<script>alert("Some error occured while completing your request !!!")</script>';	
			}
			else if($_GET['error']==2)
			{
				echo '<script>alert("You have an active employee for the same email !!!")</script>';	
			}
		}
	?>							