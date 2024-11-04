<!doctype html>
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
		</script>
		
		</head>
		<?php $path1 = $path."html/usercontent/images/"; ?>
<body class="lgtgrey2_bg ffamily_avenir">
	
	<div class="column_m header xs-header xsip-header xsi-header bs_bb lgtgrey_bg">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey_bg">
				<div class="logo padt10 wi_50p xs-wi_50p"><a href="#"><img src="<?php echo $path; ?>html/usercontent/images/favicon-32x32.png" alt="Qmatchup" title="Bisswise" height="32" width="32"></a></div>
				
				<div class="visible-xs visible-sm fleft padl10">
							<div class="flag_top_menu flefti  padb10 padt10  xs-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
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
	
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="marb50 padt30 xs-padt30">
							 
					<div class="talc fsz75 red_txt"> <span class="fas fa-minus-circle"></span></div>		
					
							 
								
							</div>
					 
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100   xxs-fsz45 padb10 trn ffamily_avenir" style="color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#000000"; else echo $corporateColor['bg_color']; ?>">Sorry!</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >This time slot is already booked. Please visit later. </a></div>
						
							 
						
						<div class="talc padtb20 "> <a href="../welcomeVisitors/<?php echo $data['cid']; ?>" ><input type="button" value="Join meeting" class="forword hei_55p fsz18  t_67cff7_bg ffamily_avenir"  ></a>
									
								 		
									
									</div>
					</div><div class="clear"></div>
					
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
								url: "../../employeeList/<?php echo $data['cid']; ?>",
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