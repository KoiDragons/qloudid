<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		
		<script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="77fefb06-b275-4fb0-8db7-da263fbd4267" type="text/javascript" async></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101162438);</script>
		<script async src="//static.getclicky.com/js"></script>
		
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
			
				
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
				
			</script>
			
			
		</head>
		
		<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg" id="bodyBg"><div class="sharethis-inline-share-buttons"></div>
			
				<div class="column_m header  bs_bb white_bg" id="headerData">
			<div class="wi_100 hei_65p xs-pos_fix pos_fix  padtb5 padrl10 white_bg">
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15 wi_140p">
					<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
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
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel  brdclr_dblue marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20 blue_bg uppercase lgn_hight_30 white_txt  white_txt_h  brdl" data-en="Close" data-sw="Close">Close</a> </li>
					</ul>
				</div>
				
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
				<div class="clear"></div>
				
			</div>
		</div>
		
			
			
			
			<div class="clear"></div>
			
			<!-- LOGIN FORM -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart0 mart30 marb0" id="loginBank" onclick="checkFlag();">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
						<div class="dflex xs-fxwrap_w alit_c">
							<div class="brdb_b  visible-xs visible-sm">
								<h4 class="bold fsz30 padb10 tall visible-xs visible-sm">Visitors</h4>
								<h3 class="fsz18 padb20 tall visible-xs visible-sm ">Hjälp en medmänniska i nöd.</h3>
							</div>
							
							<div class="wi_40 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc">
								
								
								<div class="padb0 xxs-pad0 xxs-padb80">
									
									
									<h4 class="bold fsz65 padb10 tall hidden-xs ">Visitors</h4>
									<h3 class="fsz25 padb10 brdb_red_new tall hidden-xs lgn_hight_30">Gratis meddelandetjänst till den skadades anhöriga</h3>
									
									<div class="marb0 padrl0 first">
										
										
										<div class="on_clmn padtb0">
											
											<div class="on_clmn mart20">
												
												<div class="pos_rel">
													
													<select name="booked" id="booked" class="default_view wi_100 mart5 rbrdr pad10  lgtgrey2_bg hei_50p fsz18 llgrey_txt">
														
														
														<option value="Booked">Booked</option>
														
														<option value="Dropin">Dropin</option>
														
													
														
													</select>													
													
												</div>
											</div>
											
											<div class="on_clmn mart20">
												
												<div class="pos_rel">
													
												<input type="text" name="empname"  placeholder="Search Employee" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" id="collaborators-lookup" >
													
												</div>
											</div>
											
											<div class="on_clmn mart10">
												
											<input type="text" name="name" id="name" placeholder="Name" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt lgtgrey2_bg fsz18 brdrad5"> </div>
											
												<div class="on_clmn mart10">
												
											<input type="text" name="lname" id="lname" placeholder="Last Name" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt lgtgrey2_bg fsz18 brdrad5"> </div>
											
												<div class="on_clmn mart10">
												
											<input type="text" name="cname" id="cname" placeholder="Company name" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt lgtgrey2_bg fsz18 brdrad5"> </div>
											
												<div class="on_clmn mart10">
												
											<input type="text" name="email" id="email" placeholder="E-post" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt lgtgrey2_bg fsz18 brdrad5"> </div>
											
											<div class="on_clmn martb10">
											
											<div class="thr_clmn  wi_50 "  >
												
												<div class="pos_rel">
													
													<select id="cntry" name="cntry" class=" default_view wi_100 mart5 rbrdr pad10  lgtgrey2_bg hei_50p fsz18 llgrey_txt"  >
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn  wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="uphno" id="uphno" placeholder="Mobil" class=" wi_100 rbrdr pad10 mart5  lgtgrey2_bg hei_50p fsz18 llgrey_txt">
													
												</div>
												
											</div>
											
											
											
										</div>
										
										
										
											<input type="hidden" id="ind" name="ind" />
											
											<div id="error_msg_form" class="red_txt"></div>
											<div class="clear"></div>
										</div>
										
										
										
										
										<div class="clear"></div>
										
										<div class="padb10 xs-padrl0" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn  fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="checkBankid();">Meddela med BankID</a> </div>
										
										
										
									</div>
									
									
									
									
									
								</div>
								
								
							</div>
							<div class="wi_60 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc padl80 xs-padr0">
								<h4 class="bold fsz25 padb10 tall hidden-xs">Hur det fungerar</h4>
								<h3 class="fsz18 padb20 tall hidden-xs">Mayday - Notify Family & Friends</h3>
								<ul class="mart10 padl20 tall">
									<li class="black_txt fsz16">Fyll i den skadades person nummer. Se till att det är rätt land</li>
									<li class="black_txt fsz16">Fyll i address var personen befinner sig.</li>
									<li class="black_txt fsz16">Skriv ett kort meddelande</li>
									<li class="black_txt fsz16">Fyll i ditt personnummer</li>
									<li class="black_txt fsz16">Klicka på meddela rutan</li>
								</ul>
								<ul class="mart10 pad0 tall">
									
									
									<li class="dblock mar0 marb10 pad0">
										<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											Vad gör man vid en svår olycka
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Om du har hittat en person som ligger medvetslös skall du ALLTID i första hand larma 112. De har alla kunskaper och kan guida dig i vad du kan göra och säga under en akut situation. </p>
											
										</div>
									</li>
									<li class="dblock mar0 marb10 pad0">
										<a href="#" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
											<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
											<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
											Varför välja "ID Typ" och "Land"...
										</a>
										<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
											<p>Om olyckan skulle vara framme eller något akut har inträffat som gör att du behöver nås snabbt blir du meddelad tack vare att du är ansluten. Brinner det i din fastighet? Behöver skolan stängas för dagen?  </p>
											
											<p>Måste din arbetsgivare få ut ett meddelande till dig och alla dina kollegor, snabbt? Du blir direkt meddelad tack vare att ni är anslutna! </p>
										</div>
									</li>
									
								</ul>
							</div>
							
						</div>
					</div>
				</div>
				
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_connect  brdrad5"  id="gratis_popup_connect">
				<div class="modal-content pad25  brdrad5 ">
					<div id="connect_id">
						
						
					</div>
				</div>
				
			</div>
			
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_login">
				<div class="modal-content pad25 brdrad5 ">
					
			<h2 class="marb10 pad0 bold fsz24 black_txt talc">Slå in koden</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Låt oss fastställa din identitet. Vi har precis skickat ett text meddelande med en ny kod till telefon numret som slutar på *****<span id="lastPh"></span> </span>
				</div>
				
				
			</div>
			
							<form method="POST" action="InformRelatives/sendEmail" id="save_indexing_email" name="save_indexing_email" accept-charset="ISO-8859-1">
								
								
								<div class="padb0">
									
									<div class="pos_rel ">
										
										<input type="text" name="otp" id="otp" placeholder="Fyll i lösenordet" max="9999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
										
									</div>
								</div>
								<div class="red_bg" id="error_msg_opt">
									
									
								</div>
								
								
								
								
								
							</form>
						<div class="mart20 talc marb10">
				<input type="button" value="Signera och kom igång" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkOtp();">
					<input type="hidden" id="infor_id" name="infor_id" />
				
			</div>
			<div class="talc"> Inte fått något sms? Försök igen.</div>
						
					</div>
				</div>
				
			
			
		
			<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_send">
				<div class="modal-content pad25 brdrad5 ">
					<div class="padb5 ">
						<h1 class="padb5 tall fsz30">SOS <span class="fa fa-heart red_txt"></span> F&F </h1>
						<p class="pad0 tall fsz18 padb10 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">På uppdrag från familj och vänner till denna personen - Tackar vi dig<span class="padl10 fa fa-praying-hands"></span></p>
					</div>
					<div class="lgtgrey2_bg">
						<h3 class="pos_rel marb0 padrl25 padtb10 fsz20 dark_grey_txt lgtgrey2_bg">
							Ett engångslösenord är skickad
							
						</h3>
						
						
						<div class="pad15 lgtgrey2_bg">
							<label class="marb5  padl10 padb10">Phone Number</label>
							<div class="pos_rel padrl10">
								<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
								<input type="text" name="phno" id="phno" placeholder="Phone number" max="9999999999" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt">
								
							</div>
						</div>
						<div class="red_bg" id="error_msg_phone">
							
							
						</div>
						
					</div>
					<div class="mart20 talc">
						<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
						<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp" onclick="submit_info();">
						
					</div>
				</div>
			</div>
			
			<div class="clear"></div>
			<script type="text/javascript" src="../../html/usercontent/js/jquery-ui.min.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/vex.combined.min.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/superfish.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/icheck.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/jquery.selectric.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/tinymce/tinymce.min.js"></script>
			<script type="text/javascript" src="../../html/usercontent/modules.js"></script>
			<script type="text/javascript" src="../../html/usercontent/js/custom.js"></script>
			
			<script>
			
			function updateInd(id)
		{
			var id_val=$("#ind").val();
			//alert(id_val);
			var id_val1 = id+',';
			id_val=id_val.replace(id_val1, "");
			$("#ind").val(id_val);
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
							//alert(data.serialize()); 
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
							var indset=$("#ind").val()+item['id']+',';
							
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