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
	//$path="../";
?>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/responsive.css" />
		<!--	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/modules.css" />-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/editor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/jquery.js"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-101260776-1');
		</script>
		
	
		<style>
			
			.custom-scrollbar::-webkit-scrollbar {
			width: 8px;
			}
			.custom-scrollbar::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			}
			.custom-scrollbar::-webkit-scrollbar-thumb {
			background-color: darkgrey;
			outline: 1px solid slategrey;
			}
			.keep-completed[data-before]:not(:empty):before{
			content: attr(data-before);
			margin-bottom: 5px;
			padding-left: 25px;
			font-weight: bold;
			}
		</style>
	
	</head>
	
	<body>
		
		<?php $path1 = $path."usercontent/images/"; ?>
		<!-- HEADER -->
		
		<?php include 'CompanyNewsHeaderUpdated.php'; ?>
		<div class="clear"></div>
		
	
		
		
		
		
		<!-- CONTENT -->
		<div id="section-content" onclick="checkFlag();">
			<div class="wrap maxwi_100 dflex fxwrap_w md-fxwrap_nw alit_fs justc_sb mart40" >
				<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu">
								<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt">Min</a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz35 xs-fsz30 sm-fsz30 
														bold">Arbetsplats</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php echo substr(html_entity_decode($companyDetail['company_name']),0,20); ?></span>  </div>
													</a></div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									
								<div class="column_m padb10 hidden">
									 <div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
												<!-- Logo -->
												<?php if($companyDetail['profile_pic']!=null || $companyDetail['profile_pic']!="") { ?><div class="pad20 wi_100  xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20  yellow_bg_a lgtgrey2_bg white_txt" style="height:180px;"><img src="<?php echo $imgs;  ?>" width="90px;" height="90px;" class="brdb_w"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 2%; "> </div><?php } else { ?>
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20  yellow_bg_a lgtgrey2_bg black_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
																	" ><?php echo substr(html_entity_decode($companyDetail['company_name']),0,1); ?></div> <?php } ?>
													<a href="#" class="black_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span><?php echo substr(html_entity_decode($companyDetail['company_name']),0,20); ?></span>  </div>
													</a>
													</div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
								
								
									<ul class="marr20 pad0">
									<li class=" dblock padb10 padl8">
											<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Nyhetsflöde</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8">
											<a href="#" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Kalender</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn ">Personalhandbok</h4>
											<ul class="marr20 pad0">
											<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Handbok</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">FAQ</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
													<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Fråga HR</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>												
												
												
											</ul>
											
										</li>
										
										
										
										<!-- Newsfeed -->
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn ">Utforska</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Om oss</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Karriär</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Återförsäljare</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Leverantörer</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
									<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn ">Kontakta</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Växel</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Anställda</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Avdelningar</span>
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
					
				<!-- CENTER CONTENT -->
				<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xs-white_bg sm-white_bg padl10">
					<div class=" maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb20 brdb_new">
				<div class="white_bg tall wi_100">
					<!-- Logo -->
					<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz25 xs-fsz30 sm-fsz30 bold">Personalhandbok </a> </div>
					<!-- Meta -->
					<div class="padr10 fsz20 xs-padr0 xs-padb10 xs-brdb_b"> <span>Syftet med Qmatchup personalhandbok är att beskriva de rättigheter och skyldigheter </span>          </div>
				</div>
				
				
				
			</div>
					<!-- Home -->
					<div class="white_bg fsz14 dark_grey_txt">
						<div class="container  xs-padrl15">
							
							<div class="sticky_spacer">
								<div class="sticky zi100 padtb5 brdb_new white_bg" data-offset="40" >
									<select class="jui-select selectmenu-scroll-to selectmenu-scroll-detect" data-button-classes="wi_autoi maxwi_100i pad0 nobrdi bg_transi fsz35 xs-fsz28 txt_2d3e52i" data-icon-classes="pos_abs pos_cenY right0" data-offset="60">
										
																					<option value="#section-0">Inledning</option>
																					<option value="#section-1">Företagskultur</option>
																					<option value="#section-2">Anställning</option>
																					<option value="#section-3">Arbetstider</option>
										
									</select>
									
								</div>
							</div>
						</div>
					</div>
					
						<!-- INNEHÅLLSFÖRTECKNING sections-->
					<div class="scroll_menu_header mart40 white_bg fsz16 dark_grey_txt" id="section-0">
							<div class="container padb25 xs-padrl15">
								
								<h2 class="padb5 uppercase fsz24 xs-fsz16 bold">Inledning</h2>
								<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
								
								<div>
									<p>




</p><p><strong>Syfte</strong><br>Syftet med Qmatchup personalhandbok är att beskriva de rättigheter och skyldigheter som bolaget och medarbetaren har gentemot varandra. Personalhandboken utgör även ett regelverk för hur rutiner fungerar inom bolaget. Dessutom ingår riktlinjer för den anställdes vardag som medarbetare i Qmatchup.</p>
<p><strong>Ändringar</strong><br>Huvudansvarig för dokumentet är &lt;ANSVARIG CHEF&gt;. Ansvaret är sedan delegerat till den person som är ansvarig för aktuellt arbetsområde, exempelvis &lt;ANSVARIG&gt; för IT-frågor.<br>Personalansvarig uppdaterar personalhandboken kontinuerligt. Det är alla medarbetares skyldighet att känna till vilken information som finns i personalhandboken och ta del av de kontinuerliga ändringarna. <br>Om du som medarbetare har synpunkter på personalhandboken, kontakta &lt;ANSVARIG&gt;.</p>
<p><strong>Avgränsningar</strong><br>Personalhandboken behandlar generella regler för hela Qmatchup. Individuella medarbetares överenskommelser regleras i medarbetares anställningsavtal. Gällande anställningsavtal och lagstiftning går före detta dokument.</p>

<p></p>
								</div>
								
							</div>
						</div>
											<div class="scroll_menu_header mart10 white_bg fsz16 dark_grey_txt" id="section-1">
							<div class="container padb25 xs-padrl15">
								
								<h2 class="padb5 uppercase fsz24 xs-fsz16 bold">Företagskultur</h2>
								<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
								
								<div>
									<p>




</p><p><strong>Arbeta hos Qmatchup</strong><br>Att arbeta hos Qmatchup innebär både rättigheter och skyldigheter. Alla bär ett ansvar för att Qmatchup verksamhetsmål uppnås och att företagskulturen bibehålls.<br>Qmatchup erbjuder sina medarbetare en stor möjlighet att påverka både företagets och sin egen utveckling. Genom medarbetarnas engagemang skall Qmatchup växa på både antalet nya som befintliga kunder, samt säkerhetsställa långsiktiga kundrelationer.</p>
<p>Våra ledord (exempel)<br>Qmatchup ledord är Kundnytta, Service och Hängivenhet. Våra ledord skall genomsyra arbetet, både internt och externt.</p>
<p><strong>Kundnytta </strong></p>
<ul style="list-style-type: disc;">
<li>Vi delar generöst med oss av vår kunskap och tid.</li>
<li>Aktivt söker fördelar och hjälper andra företag genom våra tjänster.</li>
<li>Förståelse för de utmaningar som våra kunder, och även vår övriga omgivning ställs inför.</li>
</ul>
<p><strong>Service</strong></p>
<ul style="list-style-type: disc;">
<li>Snabba återkopplingar och lösningar.</li>
<li>Lyhördhet inför våra klienters behov.</li>
<li>Medvetenhet om att service är en känsla.</li>
</ul>
<p><strong>Hängivenhet</strong></p>
<ul style="list-style-type: disc;">
<li>Vi håller hög service och ger det bästa av bemötanden.</li>
<li>Vi är ärliga och håller vad vi lovar.</li>
<li>Vi eftersträvar framgång genom att bidra till att människor och företag i vår närhet lyckas.</li>
</ul>
<p>Genom att vara generösa, lyhörda och engagerade vinner vi förtroende. Att bygga förtroende är resultatet av våra ledord. Man pratar exempelvis inte illa om andra kunder eller avslöjar detaljer om andra företag. Förtroende från kunden är den bästa uppskattningen du som medarbetare kan få. Förtroende får du genom att visa respekt för kunden, alltid se till kundens bästa och alltid hålla det som du har lovat. Du bör eftersträva att vara tydlig i all kommunikation med kunden för att undvika missförstånd.</p>
<p><strong>Organisationsschema (exempel)</strong></p>
<p>Qmatchup är ett privatägt aktiebolag. Bolaget ägs av…<br>Områdeschefer:</p>
<ul style="list-style-type: disc;">
<li>Vd – &lt;namn&gt;, &lt;mailadress&gt;, &lt;mobil&gt;</li>
<li>Marknad och strategi – &lt;namn&gt;, &lt;mailadress&gt;, &lt;mobil&gt;</li>
<li>Personal, ekonomi och kundtjänst, &lt;namn&gt;, &lt;mailadress&gt;, &lt;mobil&gt;</li>
<li>It- och avtalsansvarig, &lt;namn&gt;, &lt;mailadress&gt;, &lt;mobil&gt;</li>
</ul>
<p>&lt; FÖRETAGETS&gt; styrelseordförande heter:</p>
<ul style="list-style-type: disc;">
<li>&lt;Namn&gt;
<ul style="list-style-type: disc;">
<li>Bolagets styrelse träffas regelbundet och beslutar bland annat om dess strategiska utveckling. Bolagets ordförande kan personal kontakta direkt i förtrolighet och med löfte om sekretess, om personal anser att bolagets ledning missköter sina uppdrag.</li>
</ul>
</li>
</ul>
<p><strong>Personalförteckning</strong></p>
<p>Hos personaladministratören finns alltid en aktuell personalförteckning. Det åligger varje medarbetare att själv uppdatera sina adressuppgifter etc. till personaladministratören, för att försäkra att exempelvis administration av löner fungerar.</p>

<p></p>
								</div>
								
							</div>
						</div>
											<div class="scroll_menu_header mart10 white_bg fsz16 dark_grey_txt" id="section-2">
							<div class="container padb25 xs-padrl15">
								
								<h2 class="padb5 uppercase fsz24 xs-fsz16 bold">Anställning</h2>
								<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
								
								<div>
									<p>




</p><p><strong>Anställningsavtal<br></strong>I samband med anställningen på Qmatchup upprättas ett anställningsavtal. Avtalet utfärdas i två exemplar: ett till medarbetare och ett till bolaget. I anställningsavtalet står anställningsvillkoren.</p>
<p><strong>Anställningsform</strong><br>Medarbetare inom Qmatchup lyder under någon av följande anställningsformer provanställd, projektanställd, timanställd eller tillsvidareanställd.</p>
<p><strong>Konkurrerande anställning<br></strong>Medarbetaren får ej utföra arbete eller uppdrag direkt eller indirekt eller driva egen ekonomisk verksamhet, som konkurrerar med bolaget. Medarbetaren får ej heller åtaga sig uppdrag eller bedriva verksamhet som kan inverka negativt på fullgörandet av dennes tjänst. Om medarbetaren avser att åta sig uppdrag eller bisyssla av mer omfattande slag, skall denne först inhämta medgivande från Qmatchup.</p>
<p><strong>Närmaste anhörig<br></strong>Varje medarbetare ska meddela personaladministratör närmaste anhörig samt vilket telefonnummer denna person nås på dagtid och kvällstid. Detta för att bolaget snabbt ska kunna kontakta närmaste anhörig om det skulle hända medarbetaren något under arbete. </p>

<p></p>
								</div>
								
							</div>
						</div>
											<div class="scroll_menu_header mart10 white_bg fsz16 dark_grey_txt" id="section-3">
							<div class="container padb25 xs-padrl15">
								
								<h2 class="padb5 uppercase fsz24 xs-fsz16 bold">Arbetstider</h2>
								<div class="wi_50p marb20 brdt brdclr_black brdwi_2"></div>
								
								<div>
									<p>




</p><p>Normal arbetstid på Qmatchup är 40 timmar vecka, 08.00-16.30, med en halvtimmes lunch. De anställda på Qmatchup har möjlighet att själva påverka sin arbetstid inom bestämda ramar genom så kallad flextid. Flextid står för flexibel arbetstid och innebär att den anställde inom vissa givna tidsramar själv får bestämma över förläggningen av den ordinarie arbetstiden.</p>
<p>Ramen för flextid innebär att den anställde börjar 07:00 – 09:00 på morgonen och slutar 15:30 – 17:30. Ex; om man börjar 08:30 så slutar man 17:00.</p>
<p>Användandet av flextid ska rapporteras i separat tidrapporteringsfil. Vid risk för övertid så ska personalansvarig alltid kontaktas i god tid.</p>
<p>Fikaraster och dylikt ingår i arbetstid. Se nedan för en lista av speciella dagar.</p>
<p>&nbsp;</p>
<p><strong><u>Arbetstid</u></strong></p>
<ul>
<li>Nyårsdagen (Arbetsfri)</li>
<li>Trettondagsafton (00-13.00)</li>
<li>Trettondag jul Arbetsfri</li>
<li>Skärtorsdag 00-13.00</li>
<li>Långfredag Arbetsfri</li>
<li>Annandag påsk Arbetsfri</li>
<li>Valborgsmässoafton (vid vardag) 00-13.00</li>
<li>1: a maj Arbetsfri</li>
<li>Onsdag före Kristi Himmelsfärd 00-13.00</li>
<li>Kristi Himmelsfärd dag Arbetsfri</li>
<li>Dag efter Kristi Himmelsfärds dag Arbetsfri</li>
<li>Sveriges nationaldag 6 juni Arbetsfri</li>
<li>Midsommarafton Arbetsfri</li>
<li>Fredag före Alla Helgons Dag 00-13.00</li>
<li>Julafton Arbetsfri</li>
<li>Juldagen Arbetsfri</li>
<li>Annandag Jul Arbetsfri</li>
<li>Nyårsafton Arbetsfri</li>
</ul>

<p></p>
								</div>
								
							</div>
						</div>
											
					
				</div>
				
				
			
				
			</div>
		</div>
		
		<script>
			function changeIndex(id){
				if($("#"+id).hasClass("active"))
				{
					var id_val=$("#indexing_save").val();
					var id_val = id_val.replace($("#"+id).attr('id')+',', "");
					$("#indexing_save").val(id_val);
				}
				else
				{
					var id_val=$("#indexing_save").val()+$("#"+id).attr('id')+',';
					$("#indexing_save").val(id_val);
				}
				$("#"+id).toggleClass('active');
				//alert($(this).attr('id'));
				return false;
			};
		</script>
		
		
		<div id="keep_fade" class="wi_100 hei_100 dnone pos_fix zi998 top0 left0 bg_0_54"></div>
		
		<div class="wi_600p maxwi_90 dnone pos_fix zi999 pos_cen  bs_bb fsz14" id="keep-modal">
			<form>
				<div class="keep-block keep-block-modal pos_rel  brdrad2 bg_f txt_0_87 trans_bgc1 setId">
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
					
					<div class=" custom-scrollbar minhei_60p maxhei_100vh-70p ovfl_auto pos_rel">
						<div class="keep-images dflex fxwrap_w alit_c"></div>
						<div class="padt16 padr16 padl16">
							<textarea name="title" rows="1" cols="1" class="autosize keep-title wi_100 dblock marb16 pad0 nobrd bg_trans ff_inh bold fsz27 txt_0_87" placeholder="Title" readonly></textarea>
						</div>
						<div class="keep-list padr16 padl16 fsz16 mart10"></div>
						
						<div class="keep-completed marb16 padr16 padl16 " data-before="Completed items"></div>
						<div class="keep-metas dflex fxwrap_w alit_c marb10 padr16 padl16 mart15"></div>
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
							<button type="submit" class="marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Close</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		
		<!-- Sliding modal tabs -->
		<div class="sliding-modal-tabs active-base wi_400p maxwi_100 hei_100vh pos_fix zi50 top0 right-450p right0_a bs_bb bxsh_00100_03 white_bg fsz14 dark_grey2_txt trans_all3">
			<!-- header -->
			<div class="sliding-modal-header hidden ovfl_hid pos_abs zi1 top25 right100 brdradtl3 fsz16">
				<ul class="mar0 pad0">
					<li class="dblock mar0 pad0">
						<a href="#" class="wp-tooltip dblock wi_40p hei_40p talc lgn_hight_40 dblue_bg blue2_bg_h white_bg_a white_txt dblue_txt_a" data-target=".tab-vacant-position" data-tooltip="Vacant position" data-offset-x="10" data-offset-y="8"><span class="fa fa-book"></span></a>
					</li>
					<li class="dblock mar0 pad0">
						<a href="#" class="wp-tooltip dblock wi_40p hei_40p talc lgn_hight_40 dblue_bg blue2_bg_h white_bg_a white_txt dblue_txt_a" data-target=".tab-passport" data-tooltip="Passport" data-offset-x="10" data-offset-y="8"><span class="fa fa-comments"></span></a>
					</li>
					<li class="dblock mar0 pad0">
						<a href="#" class="wp-tooltip dblock wi_40p hei_40p talc lgn_hight_40 dblue_bg blue2_bg_h white_bg_a white_txt dblue_txt_a" data-target=".tab-cv" data-tooltip="CV" data-offset-x="10" data-offset-y="8"><span class="fa fa-drivers-license-o"></span></a>
					</li>
					<li class="show-when-active dblock mar0 pad0">
						<a href="#" class="wp-tooltip sliding-modal-tabs-close dblock wi_40p hei_40p talc lgn_hight_40 red_bg white_txt" data-tooltip="Close" data-offset-x="10" data-offset-y="8"><span class="fa fa-close"></span></a>
					</li>
				</ul>
			</div>
			
			<!-- content -->
			<div class="sliding-modal-content wi_100 hei_100 ovfl_auto pos_abs zi5 top0 left0 white_bg">
				
				<!-- Vacant position tab -->
				<div class="sliding-modal-tab aero-bold tab-vacant-position">
					<form action="" method="post" class="pos_rel">
						
						<!-- header area -->
						<div class="wi_100 hei_190p pos_abs top0 left0 bs_bb padtrl10 lgtgrey2_bg">
							
							<!-- progress -->
							<div class="progress wi_85 hei_10p ovfl_hid fleft mart10 grey_bg">
								<div class="dblue_bg wi_25 hei_100"></div>
							</div>
							<div class="clear padb30"></div>
							
							<!-- title -->
							<h2 class="bold fsz32">Jobba direkt efter studenten</h2>
							
							<div class="padt10 fsz12">
								<div class="dinlblck marrb10 padr5 brdr valm uppercase">
									<strong>City: </strong> <span>SÖDERTÄLJE</span>
								</div>
								<div class="dinlblck marrb10 padr10 valm uppercase">
									<strong>Position: </strong> <span>Sales</span>
								</div>
							</div>
							
						</div>
						
						<!-- questions  -->
						<div class="mhei_100vh bs_bb padt200 padb125 xs-padb150 sm-padb150">
							
							<div class="padrl10">
								
								<div class="marb20 padb10 brdb fsz12">
									<div class="dinlblck martrb5 padr5 brdr valm"><strong class="uppercase">Conditions:</strong> <span>Normal, Fulltime, Office hours</span> </div>
									<div class="dinlblck martrb5 padr5 brdr valm"><strong class="uppercase">Experience:</strong> <span>Manager, Minimum 2 years</span> </div>
									<div class="dinlblck martrb5 padr5 brdr valm"><strong class="uppercase">Driving license:</strong> <span>Yes, since 5 years</span> </div>
									<div class="dinlblck martrb5 padr5 brdr valm"><strong class="uppercase">Skills:</strong> <span>CRM, Office, Teamleader, Performance</span> </div>
								</div>
								<p>
									Nu expanderar vi vårt drömteam i Södertäkje! Vi söker nu drivna, karismatiska och resultatfokuserade säljare som brinner för kvalitet i allt de tar sig för.
								</p>
								
								<p>OM KEY SOLUTIONS OCH ROLLEN SOM SUPERSÄLJARE</p>
								
								<p>Key Solutions har blivit utsedda till Sveriges bästa Säljbyrå av bl.a. Tele2 och Com Hem. Du kommer att ingå i ett team på 30 säljande superstjärnor. Teamet kommer att sälja fasta och mobila lösningar till både befintliga och presumtiva privatkunder.</p>
								
								<p>Just nu söker vi dig som tog studenten sommaren 2016.</p>
								
								<span>Vad särskiljer oss från alla andra arbetsgivare?</span>
								<ul>
									<li>Garanterad månadslön på 30 000 SEK inom 6 månader</li>
									<li>Säljtävlingar med resor till t.ex. Barcelona, Miami, Los Angeles och New York</li>
									<li>Sveriges skönaste arbetstider för den morgontrötta med start 12:00</li>
									<li>Vi avsätter minst en timme per dag för din personliga utveckling</li>
								</ul>
								
								<span>Vi söker dig som:</span>
								<ul>
									<li>Har god social kompetens och gillar att söka kontakt med nya människor</li>
									<li>Är tävlingsinriktad och älskar att vara i händelsernas centrum</li>
									<li>Är målinriktad och har en stark vilja att ständigt bli bättre</li>
									<li>Körkort och tillgång till egen bil är meriterat (tjänstebil kan vara aktuellt)</li>
								</ul>
								
								<span>Vi erbjuder rätt person:</span>
								<ul>
									<li>Fast garantilön, provision samt generösa bonusar</li>
									<li>Kostnadsfri säljutbildning i Key Business School (Inga studielån och full lön under studietiden, värde: 50 000 SEK)</li>
									<li>Fantastiska möjligheter att utvecklas och göra karriär på Europas 2:a Bästa Arbetsplats 2015</li>
								</ul>
								
								<p>Då vi har några av Sveriges absolut bästa säljare och coacher till förfogande, samt erbjuder säljutbildning i Key Business School, så har vi inget krav på tidigare försäljningserfarenhet. Vi tar ansvaret över att ge våra medarbetare rätt verktyg själva.</p>
								
								<p>Om du tycker detta låter kul, skicka ett mail till oss och berätta vem du är. Du behöver inte bifoga något formellt CV, ett kort mail till <a href="mailto:jobb@keysolutions.se">jobb@keysolutions.se</a> räcker.</p>
								
								<p>Besök gärna några av våra sociala medier för en inblick i hur vardagen för en säljare hos oss ser ut: <a href="https://instagram.com/keysolutionsse">https://instagram.com/keysolutionsse</a> eller <a href="http://www.facebook.com/KeysolutionsSE">http://www.facebook.com/KeysolutionsSE</a>
								</p>
								
								<p><big>Sök jobbet senast <strong>11 mars 2017</strong></big>
								</p>
								
								<a href="#">
									<img src="<?php echo $path; ?>html/articlecss/images/icon-link.png" class="valm" />
									<span class="valm">Ansök på arbetsgivarens webbplats</span>
								</a>
								
							</div>
							
						</div>
						
						<!-- footer area -->
						<div class="wi_100 pos_abs bot0 left0">
							<div class="pad10 lgtgrey2_bg">
								<div class="padtb5">
									<a href="#" class="form-progress-back dinlblock fleft padt10 fsz14">
										<span class="fa fa-chevron-left valm"></span>
										<span class="valm">Back</span>
									</a>
									<a href="#" class="form-progress-next dblue_btn bs_bb fright blue2_bg dblue2_bg_h tall fsz14">Next</a>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="pad10 grey_bg talc fsz14">
								<div class="padtb5">
									Want to get hired for projects? <a href="#">Become a freelancer</a>
								</div>
							</div>
						</div>
						
					</form>
					
				</div>
				
				<!-- Passport tab -->
				<div class="sliding-modal-tab aero-bold tab-passport">
					<form action="" method="post" class="pos_rel">
						
						<!-- header area -->
						<div class="wi_100 hei_190p pos_abs top0 left0 bs_bb padtrl10 lgtgrey2_bg">
							
							<!-- progress -->
							<div class="progress wi_85 hei_10p ovfl_hid fleft mart10 grey_bg">
								<div class="dblue_bg wi_25 hei_100"></div>
							</div>
							<div class="clear padb30"></div>
							
							<table class="wi_100 nobrd" cellpadding="0" cellspacing="0">
								<tr>
									<td class="wi_50 valm">
										<h2 class="bold fsz28">Qmatchup Inc</h2>
										<div class="mart padb5 brd brdst_dot nobrdt nobrdr nobrdl valm"><span class="uppercase">TELECOMMUNICATIONS</strong></div>	
									</td>
									<td class="wi_50 valm talr">
										<a href="#">
											<img src="<?php echo $path; ?>html/articlecss/images/volvo.jpg" class="maxwi_100 hei_auto" />
										</a>
									</td>
								</tr>
							</table>
							
						</div>
						
						<!-- questions  -->
						<div class="mhei_100vh bs_bb padt200 padb125 xs-padb150 sm-padb150">
							
							<div class="padrl10">
								
								<div class="marb20 padb10 fsz14">
									<div class="mart5">
										<span class="dblock fsz12">CID:</span> <span>125113</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Visiting address :</span> <span>Sweden</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Founded :</span> <span>01/03/2017</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Website :</span> <span>GMAIL.COM</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Phone :</span> <span>GMAIL.COM</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Annual Turnover :</span> <span>0</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Employee Size :</span> <span>5 - 9</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Validated Until :</span> <span>01/04/2017</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
								</div>
								
							</div>
							
						</div>
						
						<!-- footer area -->
						<div class="wi_100 pos_abs bot0 left0">
							<div class="pad10 lgtgrey2_bg">
								<div class="padtb5">
									<a href="#" class="form-progress-back dinlblock fleft padt10 fsz14">
										<span class="fa fa-chevron-left valm"></span>
										<span class="valm">Back</span>
									</a>
									<a href="#" class="form-progress-next dblue_btn bs_bb fright blue2_bg dblue2_bg_h tall fsz14">Next</a>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="pad10 grey_bg talc fsz14">
								<div class="padtb5">
									Want to get hired for projects? <a href="#">Become a freelancer</a>
								</div>
							</div>
						</div>
						
					</form>
					
				</div>
				
				<!-- CV -->
				<div class="sliding-modal-tab active-base2 aero-bold tab-cv">
					<form action="" method="post" class="mhei_100vh pos_rel">
						
						<!-- header area -->
						<div class="wi_100 bs_bb pad10 brd brdst_dot nobrdt nobrdr nobrdl lgtgrey2_bg">
							<a href="#" class="fleft">
								<img src="<?php echo $path; ?>html/articlecss/images/sliding-image.jpg" width="85" class="maxwi_100 hei_auto brd brdclr_white brdrad5 brdwi_2" />
							</a>
							<div class="marl100">
								<h2 class="bold fsz28">Henric Diefke</h2>
								<div class="padb10 valm">
									<span class="uppercase">Parter</span>
								</div>
							</div>
							<div class="clear"></div>
							
						</div>
						
						<!-- questions  -->
						<div class="padb80">
							
							<div class="padrl10">
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16">Professional Summary</h2>
									<div class="cv_px">
										<p>After years as a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.123</p>
									</div>
								</div>
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16 padb20">Experience Summary</h2>
									<div class="career_timeline font_opnsns xs-nobrd xs-mar0 xs-padl0 xs-padr0">
										<span class="trend_start hiddeni-xs"></span>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>Current</span></span>
											<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Remotia</h2>
											<p>January 2016 - Still working | Stockholm</p>
											multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004. Work?
										</div>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>2016</span></span>
											<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Qmatchup Inc</h2>
											<p>May 2014 - March 2016 | Stockholm</p>
											After years as a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.
										</div>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>2015</span></span>
											<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Giko Outsourcing</h2>
											<p>September 2012 - April 2015 | Stockholm</p>
											After years as a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.
										</div>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>2010</span></span>
											<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Notitia</h2>
											<p>January 2001 - May 2010 | Stockholm</p>
											After years as a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16 padb20">Educational Summary</h2>
									<div class="career_timeline font_opnsns xs-nobrd xs-mar0 xs-padl0 xs-padr0">
										<span class="trend_start hiddeni-xs"></span>
										
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>2011</span></span>
											<h2 class="padb5"><strong>Inkpare</strong>@ Affrshgskolan</h2>
											<p>2008 - 2011 </p>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16 padb20">Language</h2>
									<div class="career_timeline font_opnsns xs-nobrd xs-mar0 xs-padl0 xs-padr0">
										<span class="trend_start hiddeni-xs"></span>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"></span>
											<h2 class="padb5"><strong>Turkey</strong></h2>
											<p>Level-5 </p>
										</div>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"></span>
											<h2 class="padb5"><strong>Armenia</strong></h2>
											<p>Level-3 </p>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16 padb20">Driving Licence</h2>
									<div class="career_timeline font_opnsns xs-nobrd xs-mar0 xs-padl0 xs-padr0">
										<span class="trend_start hiddeni-xs"></span>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"></span>
											<h2 class="padb5"><strong>Licence</strong></h2>
											<p>Yes </p>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
							</div>
						</div>
						
						<!-- footer area -->
						<div class="show-when-active2 wi_400p maxwi_100 pos_fix zi10 bot0 right0">
							<div class="pad10 lgtgrey2_bg">
								<div class="padtb5">
									<a href="#" target="_blank" class="close-sliding-modal fa fa-close wi_30p hei_40p dinlblck fright bs_bb marr20 brdrad3 red_bg talc lgn_hight_40 fsz16 white_txt"></a>
									<a href="#" class="form-progress-next dblue_btn wi_360p wi_100-60p bs_bb fright marr10 blue2_bg dblue2_bg_h talc fsz14">Apply</a>
									<div class="clear"></div>
								</div>
							</div>
						</div>
						
					</form>
					
				</div>
				
				
			</div>
		</div>
		
		
		<!-- WP fade -->
		<div id="wp_fade"></div>
		
		
		<!-- Slide fade -->
		<div id="slide_fade"></div>
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/autosize.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/icheck.js"></script>
		
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/keep_update_new.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/jquery.sticky-kit.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/in-view.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/editor.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/autosize.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/custom.js"></script>
		
		
		
	</body>
	
</html>		