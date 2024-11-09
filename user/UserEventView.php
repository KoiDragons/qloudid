<!doctype html>
<html>
	<?php
		$path1 = "../../../html/usercontent/images/";
	if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; ?>
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			function show_more_data(link,id) {
				//var $tbody = $(link).closest('form').find('tbody');
				var html;
				var id_val1=parseInt($(link).attr('value'));
				var id_val=parseInt($(link).attr('value'))+1;
				//alert(id_val);
				$(link).val(id_val);
				$("#temp").attr('value',id_val);
				//alert($(link).val());
				var send_data={};
				
				send_data.id=id_val1;
				$.ajax({
					type:"POST",
					url:"moreEvents",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						html=data1;
						
						$("#more_data")
						.append($(html))
						.find('input.init')
						.iCheck({
							checkboxClass: 'icheckbox_minimal-aero',
							radioClass: 'iradio_minimal-aero',
							increaseArea: '20%'
						});
						
					}
				});
				
				return false;
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
				
				$.get("checkPassword/"+cpass+"/"+user,function(data1,status){
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
			var translator = $('body').translate({lang: "en", t: dict});
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
		</script>
	</head>
	
	<body class="white_bg ">
		
			<?php include 'UserHeader.php'; ?><div class="clear" id=""></div>
		
		<div class="column_m pos_rel">
			
			
			
			
			
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40" onclick="removeActive();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14" id="scroll_menu">
									
									<div class="column_m padb15">
										<div class="padl10 white_bg">
											<div class="sidebar_prdt_bx padr20">
												<div class="pad10 lgtblue2_bg brdrad3">
													
													<h3 class="prdt_name padb5 fsz25 h_color"> <?php echo $row_summary['first_name']; ?></h3>
													
													<div class="padtb0">
														
														
														
														<div class="clear"></div>
													</div>
													<div class="clear"></div>
													
													<div class="clear"></div>
												</div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>	
									
									<ul class="marr20 pad0">
										<li class=" dblock padrb10 padl8">
											<a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Newsfeed</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
									</ul>
									
									
									
									<ul class="dblock mar0 padl10 fsz13">
										
										
										<!-- Company -->
										<li class=" dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn">ABOUT YOUR DATA</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/StoreData/userAccount" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Store it</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/GetVerified/userAccount" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Secure it</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Share & monitor it</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li>
										
										<li class="active dblock pos_rel padb20 brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Plus services</h4>
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Created accounts</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Applied Jobs</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/BoughtProducts" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Bought Products</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/PersonalRequests/sentRequests" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Consents</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Trace it</span>
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
				<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg padrl10">
					
							
					<div class="wrap maxwi_100 pos_rel zi10 xs-padrl0">
								<div class=" bs_bb padb15 black_txt">
						
						<h1 class="edit-text jain padb5 tall fsz50 black_txt xs-fsz35 uppercase" id="dFJHdit4c3R6VlhXelY0bXdXTUtxUT09">My events</h1>
						<p class="pad0 tall fsz20 xs-fsz16">Here you can trace your movement with your Qloud ID</p>
					</div>
				</div>
					
					<div class="marrl0  xs-marrl0 sm-marrl0 white_bg mart0">
						
						
						
						<h1 class="mar0 padtb10 bold fsz18 blue3_txt">API Events</h1>
						<div class="marb20 brdb">
							<h2 class="fleft mar0 padb5 fsz15">Information som du har samlat</h2>
							<div class="fright pos_rel padb5 fsz13">
								<a href="#" class="class-toggler" data-target="#profile-dropdown1,#profile-fade1" data-classes="active">
									<span>Setup 60% complete</span>
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
					<?php foreach($event as $category => $value ) { ?>
						<div class=" white_bg mart20 brd brdrad3" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="fleft wi_15 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Event Name">Event Name</span> <span class="jain dblock brdb brdclr_lgtgrey2 fsz20"><?php echo $value['event']; ?></span> </div>
										<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="At">At</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['login_company']; ?></span> </div>
										<div class="fleft wi_20 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="As/On behalf of">As/On behalf of</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['favour']; ?></span> </div>
										<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Dated">Dated</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['date']; ?></span></div>
										
										
									</div>
									
									
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span>5500040N</span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
					<?php } ?>
					<div id="more_data">
					</div>
					<div class="padt20 talc">
						<a href="#" value="1" id="temp" class="load_more_results dblue_btn marrl5" onclick="show_more_data(this,this.value);">View More</a>
						
					</div>
						<div class="wi_100 visible-xs visible-sm fleft bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3">
						<h3 class="padb20 uppercase bold fsz16">Lediga jobb</h3>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/fb.png" width="80" title="Facebook" alt="Facebook" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/volvo.png" width="80" title="Volvo" alt="Volvo" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path;?>html/usercontent/images/spot.png" width="80" title="Spotify" alt="Spotify" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="marb15 padt15 talc fsz16"> <a href="#">View more</a> </div>
					</div>
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="hei_80p"></div>
	</div>
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
	<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
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
				<form action="changePassword" method="POST" id="loginform">
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