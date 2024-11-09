<!doctype html>
<html>
	<?php
		
		$path1 = "../../html/usercontent/images/";
		 ?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			
			var currentLang = 'sv';
			
			function selectCode(id)
			{
				if(id==1)
				{
					document.getElementById("codeSelect").style.display='block';
				}
				else
				{
					document.getElementById("codeSelect").style.display='none';
				}
			}
			
			function searchUser()
			{
				
				if($("#reque").val()==1)
				{
					
					if($("#code_id").val()=="")
				{
					$("#errorMsg").html('Personal number can not be blank');
					return false;
				}
				if(isNaN($("#code_id").val())) 
				{
					$("#errorMsg").html('Personal number must be a numeric value');
					return false;
				}
				if($("#code_id").val().length < 12 || $("#code_id").val().length > 12) 
				{
					$("#errorMsg").html('Personal number must be 12 digit numeric value');
					return false;
				}
						var send_data={};
						send_data.pnumber=$("#code_id").val();
						
						$.ajax({
							type:"POST",
							url:"../searchUserDetail/<?php echo $data['cid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.safeqloud.com/user/index.php/CompanyConsentPlatform/companyAccount/<?php echo $data['cid']; ?>";
								}
								
							}
						});
					
					
				}
				
				else
					{
					alert("Please select code!!!");
					return false;
				}
				
					
			}
			

			
		</script>
	</head>
	
	<body class="white_bg">
		
		<?php include 'UserHeaderUpdated.php'; ?>
		<div class="clear" id=""></div>
		
		
		
		<div class="column_m pos_rel">
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<!-- Left sidebar -->
					<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt"><?php echo $row_summary['last_name']; ?></a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz40 xs-fsz30 sm-fsz30 
														bold"><?php echo $row_summary['first_name']; ?></a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php date_default_timezone_set("Europe/Stockholm");   echo date("D F j, Y"); ?></span>  </div>
													</a></div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									
									
									
									<ul class="marr20 pad0">
										<li class=" dblock padrb10  padl8">
											<a href="https://www.safeqloud.com/user/index.php/StoreData/userAccount" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Mina uppgifter</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padrb10  padl8">
											<a href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Delade uppgifter </span> <span class="counter_position"><?php echo $receivedAllCount; ?></span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padr10 padl8">
											<a href="NewsfeedDetail" class="lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock padb10 padl8 hidden">
											<a href="#" class="show_popup_modal lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" data-target="#gratis_popup_code">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Skapa förfrågan</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										<li class=" dblock padb0 padl8 hidden">
											<a href="#" class="show_popup_modal  lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" data-target="#gratis_popup">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn" data-trn-key="You got invitation">Aktivera inbjudan</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
									</ul>
									
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										<!-- Company -->
										
										
										
										
										<li class=" dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn" data-trn-key="MINA APPAR">MINA APPAR</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/PersonalRequests/sentRequests" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" data-trn-key="Verifiera ID">Verifiera ID </span> <span class="counter_position"><?php echo $receivedRequestsUser; ?></span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/ConnectKin/connectAccount" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Anhöriga </span> <span class="counter_position"><?php echo $connectAccountReceivedCount; ?></span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/BoughtProducts" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" data-trn-key="Historik">Historik</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="https://www.safeqloud.com/user/index.php/ForloratOchUpphittat" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn" >Värdesaker</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class=" dblock padr10 padl8">
											<a href="#" class="lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Daily News</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
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
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xs-white_bg sm-white_bg padl20" >
						<div class="width_485 col-xs-12 col-sm-12 fleft fsz14">
							
							<div class="bsa_bb txt_0_87" id="keep">
								<div class="keep-block pos_rel marb20 brdrad2 bg_f trans_bgc1" id="keep-1">
                                    <input type="checkbox" name="keep-1-check" id="keep-1-check" class="keep-checker default sr-only">
                                    <label for="keep-1-check" class="wi_26p hei_26p dblock opa0 opa1_ph opa1_sibc pos_abs zi5 top-8p left-8p bxsh_0111_001 brdrad50 bg_f bg_6f_sibc curp trans_all1">
                                        <img src="<?php echo $path;?>html/keepcss/images/icons/check.svg" width="18" height="18" class="dblock opa1 opa0_psibc pos_abs pos_cen trans_opa1" alt="Check">
                                        <img src="<?php echo $path;?>html/keepcss/images/icons/check-white.svg" width="18" height="18" class="dblock opa0 opa1_psibc pos_abs pos_cen trans_opa1" alt="Check">
                                        <div class="opa0_nph opa80 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Select note</span>
										</div>
									</label>
                                    <div class="wi_100 hei_100 pos_abs zi-1 top0 left0 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph bxsh_0004_6f_sibc brdrad2 trans_bxsh1"></div>
                                    <a href="#" class="keep-pin dblock pos_abs zi5 top4p right4p pad5">
                                        <img src="<?php echo $path;?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="dblock dnone_pa opa50 opa1_h trans_opa1" alt="Pin note">
                                        <img src="<?php echo $path;?>html/keepcss/images/icons/pin_active.svg" width="18" height="18" class="dnone dblock_pa" alt="Unpin note">
                                        <div class="dblock dnone_pa opa0_nph opa80 pos_abs zi1 top100 right0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Pin note</span>
										</div>
                                        <div class="dnone dblock_pa opa0_nph opa80 pos_abs zi1 top100 right0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Unpin note</span>
										</div>
									</a>
                                    <div class="minhei_60p pos_rel">
                                        <a href="#" class="show_keep_modal wi_100 hei_100_15p dblock pos_abs zi1 top0 left0"></a>
                                        <div class="keep-images dflex fxwrap_w alit_c">
                                            <div class="keep-image" id="keep-1-image-1">
                                                <img src="<?php echo $path;?>html/keepcss/images/article/avatar.jpg" width="200" height="200" class="wi_100 hei_auto dblock">
											</div>
                                            <div class="keep-image" id="keep-1-image-2">
                                                <img src="<?php echo $path;?>html/keepcss/images/article/article.jpg" width="500" height="269" class="wi_100 hei_auto dblock">
											</div>
										</div>
                                        <div class="dnone dblock_siba"><img src="<?php echo $path;?>html/keepcss/images/loader-line-2.gif" width="160" height="20" class="maxwi_100 hei_auto dblock marrla"></div>
                                        <h4 class="keep-title wi_100-15p mar0 marb16 padt16 padr16 padb0 padl16 bold fsz17 txt_0_87">Copy folder - functionality on Users added folder</h4>
                                        <div class="keep-list padr16 padl16">
                                            <div class="keep-list-item pos_rel padtb5 padl25 txt_21" id="keep-1-item-1">
                                                <input type="checkbox" name="keep-1-check-1" id="keep-1-check-1" class="default sr-only">
                                                <label for="keep-1-check-1" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1">
                                                    <div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>
												</label>
                                                <span class="keep-list-title opa54_sibc txtdec_lt_sibc">Copy folder (inclusive documents) and rename</span>
											</div>
                                            <div class="keep-list-item pos_rel padtb5 padl25 txt_21" id="keep-1-item-2">
                                                <input type="checkbox" name="keep-1-check-2" id="keep-1-check-2" class="default sr-only">
                                                <label for="keep-1-check-2" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1">
                                                    <div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>
												</label>
                                                <span class="keep-list-title opa54_sibc txtdec_lt_sibc">(All documents) will also be copied</span>
											</div>
										</div>
                                        <div class="keep-completed marb16 padr16 padl16">
                                            <div class="keep-list-item pos_rel padtb5 padl25 txt_21" id="keep-1-item-3">
                                                <input type="checkbox" name="keep-1-check-3" id="keep-1-check-3" class="default sr-only" checked>
                                                <label for="keep-1-check-3" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1">
                                                    <div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>
												</label>
                                                <span class="keep-list-title opa54_sibc txtdec_lt_sibc">Rename folder</span>
											</div>
										</div>
                                        <div class="keep-metas dflex fxwrap_w alit_c marb10 padr16 padl16">
                                            <div class="keep-meta maxwi_100 minhei_24p dflex alit_c pos_rel marb6 marr6 xs-padr15 sm-padr15 brdrad2 bg_0_08" id="keep-1-meta-1">
                                                <span class="maxwi_100 dflex alit_c opa1 opa0_ph pos_rel zi1 padtb3 padrl5 txtdec_n">
                                                    <span class="meta-content maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">4. Personalhandboken</span>
												</span>
                                                <a href="#" class="wi_100 maxwi_100 hei_100 minwi_0 dflex alit_c opa0 opa1_ph pos_abs top0 left0 zi2 padtb3 padr12 padl5 txtdec_n txt_inh">
                                                    <span class="maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">4. Personalhandboken</span>
												</a>
                                                <a href="#" class="keep-meta-delete hei_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_abs zi3 top0 right0 pad3">
                                                    <img src="<?php echo $path;?>html/keepcss/images/icons/icon-close.svg" width="14" height="14" class="opa54" alt="Delete">
                                                    <div class="opa0_nph opa80 xs-opa1 pos_abs zi1 bot100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                        <span class="dblock padrl8">Delete</span>
													</div>
												</a>
											</div>
                                            <div class="keep-meta maxwi_100 minhei_24p dflex alit_c pos_rel marb6 marr6 xs-padr15 sm-padr15 brdrad2 bg_0_08" id="keep-1-meta-2">
                                                <span class="maxwi_100 dflex alit_c opa1 opa0_ph padtb3 padrl5 txtdec_n">
                                                    <img src="<?php echo $path;?>html/keepcss/images/icons/icon-clock.svg" width="18" height="18" class="meta-icon opa54" alt="Remind">
                                                    <span class="meta-content maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">Tomorrow, 8:00 AM</span>
												</span>
                                                <a href="#" class="wi_100 maxwi_100 minwi_0 hei_100 dflex alit_c opa0 opa1_ph pos_abs top0 left0 zi2 padtb3 padr12 padl5 txtdec_n txt_inh">
                                                    <img src="<?php echo $path;?>html/keepcss/images/icons/icon-clock.svg" width="18" height="18" class="meta-icon opa54" alt="Remind">
                                                    <span class="maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">Tomorrow, 8:00 AM</span>
												</a>
                                                <a href="#" class="keep-meta-delete hei_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_abs zi3 top0 right0 pad3">
                                                    <img src="<?php echo $path;?>html/keepcss/images/icons/icon-close.svg" width="14" height="14" class="opa54" alt="Delete">
                                                    <div class="opa0_nph opa80 xs-opa1 pos_abs zi1 bot100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                        <span class="dblock padrl8">Delete reminder</span>
													</div>
												</a>
											</div>
										</div>
									</div>
                                    <div class="keep-actions wi_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_rel zi5 padb5 trans_opa1">
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-remind dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Remind me</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-collaborator dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-collaborator.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Collaborator">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Collaborator</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
											</a>
                                            <div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs bot100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_e0 brdclr_80_h brdclr_80_a brdrad50 bg_f trans_all2 active" data-color="#fff"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ff8a80 brdclr_80_h brdrad50 bg_ff8a80 trans_all2" data-color="#ff8a80"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffd180 brdclr_80_h brdrad50 bg_ffd180 trans_all2" data-color="#ffd180"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffff8d brdclr_80_h brdrad50 bg_ffff8d trans_all2" data-color="#ffff8d"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ccff90 brdclr_80_h brdrad50 bg_ccff90 trans_all2" data-color="#ccff90"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_a7ffeb brdclr_80_h brdrad50 bg_a7ffeb trans_all2" data-color="#a7ffeb"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_80d8ff brdclr_80_h brdrad50 bg_80d8ff trans_all2" data-color="#80d8ff"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_82b1ff brdclr_80_h brdrad50 bg_82b1ff trans_all2" data-color="#82b1ff"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_b388ff brdclr_80_h brdrad50 bg_b388ff trans_all2" data-color="#b388ff"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_f8bbd0 brdclr_80_h brdrad50 bg_f8bbd0 trans_all2" data-color="#f8bbd0"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_d7ccc8 brdclr_80_h brdrad50 bg_d7ccc8 trans_all2" data-color="#d7ccc8"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_cfd8dc brdclr_80_h brdrad50 bg_cfd8dc trans_all2" data-color="#cfd8dc"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
											</div>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Change color</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <label class="keep-add-image dblock opa50 opa1_h pos_rel pad5 talc curp trans_opa1">
                                                <!--<input type="file" accept="image/*" class="sr-only">-->
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-image.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Add image">
											</label>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Add image</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-archive dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Archive</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-more dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">More</span>
											</div>
										</div>
									</div>
								</div>
								
                                <!-- keep block -->
                                <div class="keep-block pos_rel marb20 brdrad2 bg_f trans_bgc1" id="keep-2">
                                    <input type="checkbox" name="keep-2-check" id="keep-2-check" class="keep-checker default sr-only">
                                    <label for="keep-2-check" class="wi_26p hei_26p dblock opa0 opa1_ph opa1_sibc pos_abs zi5 top-8p left-8p bxsh_0111_001 brdrad50 bg_f bg_6f_sibc curp trans_all1">
                                        <img src="<?php echo $path;?>html/keepcss/images/icons/check.svg" width="18" height="18" class="dblock opa1 opa0_psibc pos_abs pos_cen trans_opa1" alt="Check">
                                        <img src="<?php echo $path;?>html/keepcss/images/icons/check-white.svg" width="18" height="18" class="dblock opa0 opa1_psibc pos_abs pos_cen trans_opa1" alt="Check">
                                        <div class="opa0_nph opa80 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Select note</span>
										</div>
									</label>
                                    <div class="wi_100 hei_100 pos_abs zi-1 top0 left0 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph bxsh_0004_6f_sibc brdrad2 trans_bxsh1"></div>
                                    <a href="#" class="keep-pin dblock pos_abs zi5 top4p right4p pad5">
                                        <img src="<?php echo $path;?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="dblock dnone_pa opa50 opa1_h trans_opa1" alt="Pin note">
                                        <img src="<?php echo $path;?>html/keepcss/images/icons/pin_active.svg" width="18" height="18" class="dnone dblock_pa" alt="Unpin note">
                                        <div class="dblock dnone_pa opa0_nph opa80 pos_abs zi1 top100 right0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Pin note</span>
										</div>
                                        <div class="dnone dblock_pa opa0_nph opa80 pos_abs zi1 top100 right0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Unpin note</span>
										</div>
									</a>
                                    <div class="minhei_60p pos_rel">
                                        <a href="#" class="show_keep_modal wi_100 hei_100_15p dblock pos_abs zi1 top0 left0"></a>
                                        <div class="keep-images dflex fxwrap_w alit_c"></div>
                                        <div class="dnone dblock_siba"><img src="<?php echo $path;?>html/keepcss/images/loader-line-2.gif" width="160" height="20" class="maxwi_100 hei_auto dblock marrla"></div>
                                        <h4 class="keep-title wi_100-15p mar0 marb16 padt16 padr16 padb0 padl16 bold fsz17 txt_0_87">Copy folder - functionality on Users added folder</h4>
                                        <div class="keep-list padr16 padl16">
                                            <div class="keep-list-item pos_rel padtb5 padl25 txt_21" id="keep-2-item-1">
                                                <input type="checkbox" name="keep-2-check-1" id="keep-2-check-1" class="default sr-only">
                                                <label for="keep-2-check-1" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1">
                                                    <div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>
												</label>
                                                <span class="keep-list-title opa54_sibc txtdec_lt_sibc">Copy folder (inclusive documents) and rename</span>
											</div>
										</div>
                                        <div class="keep-completed marb16 padr16 padl16"></div>
                                        <div class="keep-metas dflex fxwrap_w alit_c marb10 padr16 padl16">
                                            <div class="keep-meta maxwi_100 minhei_24p dflex alit_c pos_rel marb6 marr6 xs-padr15 sm-padr15 brdrad2 bg_0_08" id="keep-2-meta-1">
                                                <span class="maxwi_100 dflex alit_c opa1 opa0_ph pos_rel zi1 padtb3 padrl5 txtdec_n">
                                                    <span class="meta-content maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">4. Personalhandboken</span>
												</span>
                                                <a href="#" class="wi_100 maxwi_100 hei_100 minwi_0 dflex alit_c opa0 opa1_ph pos_abs top0 left0 zi2 padtb3 padr12 padl5 txtdec_n txt_inh">
                                                    <span class="maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">4. Personalhandboken</span>
												</a>
                                                <a href="#" class="keep-meta-delete hei_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_abs zi3 top0 right0 pad3">
                                                    <img src="<?php echo $path;?>html/keepcss/images/icons/icon-close.svg" width="14" height="14" class="opa54" alt="Delete">
                                                    <div class="opa0_nph opa80 xs-opa1 pos_abs zi1 bot100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                        <span class="dblock padrl8">Delete</span>
													</div>
												</a>
											</div>
                                            <div class="keep-meta maxwi_100 minhei_24p dflex alit_c pos_rel marb6 marr6 xs-padr15 sm-padr15 brdrad2 bg_0_08" id="keep-2-meta-2">
                                                <span class="maxwi_100 dflex alit_c opa1 opa0_ph padtb3 padrl5 txtdec_n">
                                                    <img src="<?php echo $path;?>html/keepcss/images/icons/icon-clock.svg" width="18" height="18" class="meta-icon opa54" alt="Remind">
                                                    <span class="meta-content maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">Tomorrow, 8:00 AM</span>
												</span>
                                                <a href="#" class="wi_100 maxwi_100 minwi_0 hei_100 dflex alit_c opa0 opa1_ph pos_abs top0 left0 zi2 padtb3 padr12 padl5 txtdec_n txt_inh">
                                                    <img src="<?php echo $path;?>html/keepcss/images/icons/icon-clock.svg" width="18" height="18" class="opa54" alt="Remind">
                                                    <span class="maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">Tomorrow, 8:00 AM</span>
												</a>
                                                <a href="#" class="keep-meta-delete hei_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_abs zi3 top0 right0 pad3">
                                                    <img src="<?php echo $path;?>html/keepcss/images/icons/icon-close.svg" width="14" height="14" class="opa54" alt="Delete">
                                                    <div class="opa0_nph opa80 xs-opa1 pos_abs zi1 bot100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                        <span class="dblock padrl8">Delete reminder</span>
													</div>
												</a>
											</div>
										</div>
									</div>
                                    <div class="keep-actions wi_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_rel zi5 padb5 trans_opa1">
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-remind dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Remind me</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-collaborator dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-collaborator.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Collaborator">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Collaborator</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
											</a>
                                            <div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs bot100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_e0 brdclr_80_h brdclr_80_a brdrad50 bg_f trans_all2 active" data-color="#fff"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ff8a80 brdclr_80_h brdrad50 bg_ff8a80 trans_all2" data-color="#ff8a80"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffd180 brdclr_80_h brdrad50 bg_ffd180 trans_all2" data-color="#ffd180"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffff8d brdclr_80_h brdrad50 bg_ffff8d trans_all2" data-color="#ffff8d"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ccff90 brdclr_80_h brdrad50 bg_ccff90 trans_all2" data-color="#ccff90"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_a7ffeb brdclr_80_h brdrad50 bg_a7ffeb trans_all2" data-color="#a7ffeb"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_80d8ff brdclr_80_h brdrad50 bg_80d8ff trans_all2" data-color="#80d8ff"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_82b1ff brdclr_80_h brdrad50 bg_82b1ff trans_all2" data-color="#82b1ff"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_b388ff brdclr_80_h brdrad50 bg_b388ff trans_all2" data-color="#b388ff"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_f8bbd0 brdclr_80_h brdrad50 bg_f8bbd0 trans_all2" data-color="#f8bbd0"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_d7ccc8 brdclr_80_h brdrad50 bg_d7ccc8 trans_all2" data-color="#d7ccc8"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_cfd8dc brdclr_80_h brdrad50 bg_cfd8dc trans_all2" data-color="#cfd8dc"><img src="<?php echo $path;?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
											</div>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Change color</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-image dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-image.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Add image">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Add image</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-archive dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Archive</span>
											</div>
										</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-more dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path;?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
											</a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">More</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        
						<div class="wi_200p col-xs-12 col-sm-12 fright pos_rel zi5">
							
							
							
							<div class="column_m padb15 xs-mart40">
								<div class="padrl10 xs-padrl0 ">
									<div class="sidebar_prdt_bx">
										<div class="pad10 brd brdrad3">
											<!--<div class="prdt_pic padl20 martb10"><img src="../../../../usercontent/images/smile.png" width="190" height="120" alt="Hilton" title="Hilton"> </div>-->
											<h3 class="prdt_name padb5 fsz20"> Ta del av förmåner från din arbetsgivare - Gratis!</h3>
											
											<div class="padtb0">
												
												<div class="padtb10 clear">
													<div class="line"></div>
												</div>
												<p>Detta erbjudande är inte förknippat med några syngliga eller dolda kostnader. Dock är det begränsat och därmed ber vi dig registrera dig omgående.</p>
												<div class="clear"></div>
											</div>
											<div class="clear"></div>
											<div class="hidden-xs hidden-sm marb10 padrl10">
												<a href="https://www.safeqloud.com/user/index.php/GetVerified/userAccount" class="dblock padrl20 brdrad3 zohoorange_bg ws_now talc lgn_hight_29 fsz14 white_txt">
													<img src="../../html/usercontent/images/icons/gift.png" width="20" height="20" class="marr5 valm">
													<span class="valm">Erbjudande</span>
												</a>
											</div> </div>
											<div class="clear"></div>
									</div>
								</div>
								
								
								
								
								
								
								
								<div class="column_m padb15">
									<div class="padt20 ">
										<div class="xs-padtb10 padrl10">
											<h2 class="fsz16">Undrar du något?</h2>
											<p>Vi hjälper dig mer än gärna med att svara på dina frågor eller funderingar. Hör av dig till oss på telefon eller via mejl.</p>
											<ul class="small_icon_list_30">
												<li>
													<div class="icon_bx phone_ico"></div>
													<div class="icon_bx_content">
														<h2 class="lgtblue_txt padb5 fsz18">010 -15 10 125</h2>
														<div> support@qmatchup.com</div>
													</div>
												</li>
											</ul>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			
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
			
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_code">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div class="marb20">
					<img src="../../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb10 pad0 bold fsz24 black_txt">Känn dig trygg...</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb0 talc">
						
						<span class="valm fsz16">Använd Qloud ID Verify till att  be din motpart, privatperson som företag att legitimera sig innan ett möte eller affär.</span>
					</div>
					
					
				</div>
				
				<div class="mart0 pad15 lgtgrey2_bg">
					
					<div class="pos_rel ">
						
						<select name="reque" id= "reque" class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt" onchange="selectCode(this.value);">
							
							<option value="0">--Välj en metod--</option>
							<option value="1">Via personnummer</option>
							
							
							
						</select>
					</div>
				</div>
				<div id="codeSelect" style="display:none">
					<div class="padrbl15 lgtgrey2_bg">
						
						<div class="pos_rel ">
							
							
							<input type="text" id="code_id" name="code_id" class="white_bg  wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Mottagarens personnummer">
						</div>
					</div>
				</div>
				
				<div id="errorMsg" class="red_txt"> </div>
				
				
				<div class="mart20">
					<input type="button" value="Skicka förfrågan" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchUser();">
					
				</div>
				
				
				
			</div>
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_user">
			<div class="modal-content pad25 brd brdrad10">
				<div id="search_user">
					<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
						No result found
						<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
					</h3>
					
					
					
					
					
					
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