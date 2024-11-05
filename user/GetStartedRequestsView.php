<?php 
	$path1 = "../../../../html/usercontent/images/";
?>
<!doctype html>
<html>
	
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script>
			var countClick=0;
			var getDepartment='';
			function submitForm()
			{
				if(countClick==0)
				{
					return false;
				}
				document.getElementById("save_indexing").submit();
			}
			
			function changeBg(id)
			{
				
				$(".yellow_bg").addClass('lgtgrey2_bg');
				$(".yellow_bg").removeClass('yellow_bg');
				$("#"+id).removeClass('lgtgrey2_bg');
				$("#"+id).addClass('yellow_bg');
				
				
			}
			
			function searchCompany()
			{
				var send_data={};
				
				send_data.id=$("#cid_number").val();
				$.ajax({
					type:"POST",
					url:"GetStartedRequests/searchCompanyDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched_company").html('');
						$("#searched_company").append(data1);
						
					}
				});
				
			}			
			function checkRequest()
			{
				var send_data={};
				
				send_data.id=$("#compa_id").val();
				$.ajax({
					type:"POST",
					url:"GetStartedRequests/requestDetailCompany",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched_company").html('');
						$("#searched_company").append(data1);
						
					}
				});
			}	
		</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<div class="column_m header header_small bs_bb white_bg">
			<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 white_bg brdb">
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15">
					<a href="#"><h3 class="marb0 pad0 fsz22 black_txt " style="font-family: 'Audiowide', sans-serif;">Workplace</h3></a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl10">
					<div class="languages">
						<a href="#" id="language_selector" class="padrl10"></a>
						<ul class="wi_100 mar0 pad5 blue_bg">
							<li class="dblock">
								<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path; ?>vacancycontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
								</a>
							</li>
							<li class="dblock">
								<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path; ?>vacancycontent/images/slide/flag_us.png" width="24" height="16" title="Sweden" alt="Sweden" />
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="top_menu frighti padt10">
					<ul class="menulist sf-menu">
						<li>
							<a href="https://www.qmatchup.com/beta/user/index.php/NewPersonal/userAccount" ><span class="black_txt pred_txt_h">+<?php echo substr($company['first_name'],0,10); ?>...</span></a>
						</li>
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-envelope-o black_txt"></span></a>
							<ul>
								<li>
									<div class="top_arrow"></div>
								</li>
								<li>
									<div class="application_menu pad20">
										<ol>
											<li>
												<a href="http://jain.com" target="_blank" class="business_prof"> <span></span> First App </a>
											</li>
											<li>
												<a href="http://www.gh.in" target="_blank" class="swedBank"> <span></span> testing 1.2 </a>
											</li>
											<li>
												<a href="http://www.ee.se" target="_blank" class="business_prof"> <span></span> Jobseeking </a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m"> <a href="#" target="_blank" class="contractor_btn"><span></span>View More</a> </div>
										
										<div class="clear"></div>
									</div>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-cog black_txt"></span></a>
						</li>
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-bell-o black_txt"></span></a>
						</li>
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-qrcode black_txt"></span></a>
							<ul>
								<li>
									<div class="top_arrow"></div>
								</li>
								<li>
									<div class="setting_menu pad15">
										<div class="fsz13">Sign in as</div>
										<ol class="">
											<li><a href="javascript:void(0);"><?php echo $company['name']; ?></a>
											</li>
											<li>
												<div class="line martb10"></div>
											</li>
											<li>
												<div class="line marb10"></div>
											</li>
											<li><a href="../../userlogout.php?action=logout">Logout</a>
											</li>
										</ol>
										<div class="clear"></div>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="zoho_hr_portal7_subscription.html" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Erbjudande</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		
		<div class="column_m pos_rel">
			
			
			<div class="clear"></div>
			
			
			
			
			<div class="clear"></div>	
			<!-- CONTENT -->
			<div class="column_m container zi5  mart20 xs-mart20">
				<div class="wrap maxwi_100 padrl10 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="maxwi_100 wi_640p col-xs-12 col-sm-12 pos_rel zi5  fsz14  marrla  xs-pad0">
						
						
						
						<!-- Configure Data -->
						
						<div class=" xs-marrl0 sm-marrl0 white_bg">
							<div class="wrap maxwi_100 padrl0 md-padrl0 lg-padrl0 xs-padrl0">
								
								<div class="padb10 brdb_new">
									<h1 class="padb5 tall fsz45 xs-fsz35">MANAGER OF WHICH DEPARTMENTS</h1>
									
								</div>
								
								
								
								<div class="clear"></div>
								
								
							</div>
							
							
							
							
						</div>
						<div class=" bs_bb mart10">
							
							
							
							
							<table class="wi_100" cellpadding="0" cellspacing="0">
								<tbody>
									<tr class="odd">
										<td class="wi_100 pad10 valm talc lgtblue2_bg">
											<div class="padrl0 tall black_txt fsz20">
												
												
												<h2 class=" padb0 tall fsz16 lgn_hight_s1 black_txt">Qloud ID är ett snabbt, växande slutet nätverk av frivilligt registrerade och verifierade privatpersoner, företag och organisationer. På Qloud ID råder samtyckeskultur.</h2>
												
												
												
												
												
												
												
												
												
												
												
												
											</div>
										</td>
										
									</tr>
								</tbody>
							</table>
						</div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						<div class="column_m container zi5  mart10">
							<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
								
								
								
								<table class="wi_100 padt10 " cellpadding="0" cellspacing="0" id="mytable">
									
									<tbody><tr class="hei_40p wi_640p">
										<td class="padr5 padb10">
											<div class="wi_140p dtrow brdrad5 mart10 talc padt10">
												<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 marr10 lgtgrey2_bg" id="1">
													
													<a href="javascript:void(0);" class="show_popup_modal wi_140p hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(1);" data-target="#gratis_popup_company_search" >
														<span class="dnone_pa">HR</span>
														
													</a>
												</div>
											</div>
										</td>
										<td class="padr5 padb10">
											<div class="wi_140p dtrow brdrad5 mart10 talc padt10">
												<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 marrl10 lgtgrey2_bg" id="2">
													
													<a href="javascript:void(0);" class="wi_140p hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(2);">
														<span class="dnone_pa">Sälj</span>
														
													</a>
												</div>
											</div>
										</td>
										<td class="padr5 padb10">
											<div class="wi_140p dtrow brdrad5 mart10 talc padt10">
												<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 marrl10 lgtgrey2_bg" id="3">
													
													<a href="javascript:void(0);" class="wi_140p hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(3);">
														<span class="dnone_pa">Marknad</span>
														
													</a>
												</div>
											</div>
										</td>
										<td class="padr0 padb10">
											<div class="wi_140p dtrow brdrad5 mart10 talc padt10">
												<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marl10 " id="4">
													
													<a href="javascript:void(0);" class="wi_140p hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(4);">
														<span class="dnone_pa">Inköp</span>
														
													</a>
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="hei_40p wi_640p">
										<td class="padr5 padb10">
											<div class="wi_140p dtrow brdrad5 mart10 talc padt10">
												<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marr10 " id="5">
													
													<a href="javascript:void(0);" class="wi_140p hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(5);">
														<span class="dnone_pa">Ekonomi</span>
														
													</a>
												</div>
											</div>
										</td>
										<td class="padr5 padb10">
											<div class="wi_140p dtrow brdrad5 mart10 talc padt10">
												<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10 " id="6">
													
													<a href="javascript:void(0);" class="wi_140p hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(6);">
														<span class="dnone_pa">IT</span>
														
													</a>
												</div>
											</div>
										</td>
										<td class="padr5 padb10">
											<div class="wi_140p dtrow brdrad5 mart10 talc padt10">
												<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10 " id="7">
													
													<a href="javascript:void(0);" class="wi_140p hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(7);">
														<span class="dnone_pa">Styrelse</span>
														
													</a>
												</div>
											</div>
										</td>
										<td class="padr0 padb10">
											<div class="wi_140p dtrow brdrad5 mart10 talc padt10">
												<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marl10 " id="8">
													
													<a href="javascript:void(0);" class="wi_140p hei_140p dblock red_bg_a lgn_hight_40 talc dark_grey_txt padt50" onclick="changeBg(8);">
														<span class="dnone_pa">Production</span>
														
													</a>
												</div>
											</div>
										</td>
									</tr>
									</tbody></table>
							</div>
						</div>
						<!--<div class="padt20 talc">
							<a href="#" class="load_more_results dblue_btn marrl5" >View More</a>
							
						</div>-->
						
						
						
						
						
						
						
						<div class="clear"></div>
						
						
						
						
						<form action="GetStartedDepartments/updateUser" method="POST" id="save_indexing" name="save_indexing">
							<div class="mart20"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="submitForm();">Klicka här och logga in</a> </div>
							
							<div class="mart10"> <a href="#" class="wi_100 maxwi_500p  dflex justc_c alit_c opa90_h marrla fsz18 xs-fsz16 darkblue_txt trans_all2">Har du inget - Skaffa ett Gratis. Här</a> </div>
							
							<input type="hidden" id="indexing_save" name="indexing_save" value=""/>
							<input type="hidden" id="indexing_save_department" name="indexing_save_department" value=""/>
							<!-- Marquee -->
						</form>
						<div class="clear"></div>
					</div>
					
					
					
				</div></div>
				<div class="clear"></div>
				<div class="hei_80p"></div>
				
				
				<!-- Edit news popup -->
				<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
					<div class="modal-content pad25 brd nobrdb talc">
						<form>
							<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
							<div class="marb20"> <img src="../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto"> </div>
							<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
							<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
								<div class="wi_50 marb10"> <img src="../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
								<div class="wi_50 marb10"> <img src="../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
								<div class="wi_50 marb10"> <img src="../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
								<div class="wi_50 marb10"> <img src="../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
								<div class="wi_50 marb10"> <img src="../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
								<div class="wi_50 marb10"> <img src="../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							</div>
							<div class="marb25">
							<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
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
							<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
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
							<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
							<div>
								<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
							</div>
						</form>
					</div>
				</div>
				
				
				<!-- Popup fade -->
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
				
		</div>
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_company_searched" id="gratis_popup_company_searched">
			<div class="modal-content pad25 brd">
				<h3 class=" padb15 uppercase fsz16 dark_grey_txt talc">Result</h3>
				<div class="marb20">
					<img src="../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb5 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
					
					
					
					<div class="wi_100 marb10 talc">
						
						<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
					</div>
					
					
				</div>
				<div id="searched_company">
					
					
				</div>
				
			</div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search">
			<div class="modal-content pad25 brd nobrdb talc brdrad5">
				
				<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Search Company</h3>
				<div class="marb20">
					<img src="../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
				<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					<!--<div class="wi_50 marb10">
						<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
						<span class="valm">Läsa nyheter och  följa trender </span>
					</div>-->
					
					<div class="wi_100 marb10 talc">
						
						<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
					</div>
					
					
				</div>
				
				<div class="pad15 lgtgrey2_bg">
					
					<div class="pos_rel padrl10">
						<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
						<input type="text" id="cid_number" name="cid_number" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
					</div>
				</div>
				<div class="mart20">
					<input type="button" value="Search" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompany();">
					
					
				</div>
				
				
				
				
			</div>
		</div>
		
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		
		
		
		
		
	</body>
	
</html>
<?php
	if(isset($_GET['requestSent']))
	{
		if($_GET['requestSent'] == true)
		{
			// showing alert message if article already exists
			echo '<script>alert("you have already sent request to same company !!!")</script>';
		}
	
	}
?>