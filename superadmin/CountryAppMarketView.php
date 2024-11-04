<!doctype html>
<?php 
	$path1 = "../../../../html/usercontent/images/";
?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylene.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bgadmin.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		
		<script>
			function updateVisible(id,link)
			{
				var send_data = {};
				send_data.p_id=id;
				if($(link).hasClass('checked'))
				{
					send_data.updateR=0; 
				}
				else
				{ 
					send_data.updateR=1; 
				}
				$.ajax({
					url: '../updateAppsStatus',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data){
				if(data==5)
				{
			document.location.href = 'https://www.qloudid.com/superadmin/index.php/LoginAdmin',true;
				}
					if(data==0)
					{
						$("#gratis_alert").attr('style','display:block');
						$("#gratis_alert").addClass('active');
						$("#popup_fade").attr('style','display:block');
						$("#popup_fade").addClass('active');
						$(link).addClass('checked');
					}
					
				})
				.fail(function(){})
				.always(function(){});
				
			}
		</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<?php include 'AdminHeaderUpdated.php'; ?>
		
		<div class="column_m pos_rel"  onclick="checkFlag();">
			
			<div class=" column_m container zi5  mart40 xs-mart0">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="xs-wi_100 dflex justc_sb alit_c bs_bb marb0  padt2  xs-lgtgrey_bg">
						<div class="wi_960p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg xs-lgtgrey_bg sm-lgtgrey_bg">
							
							<!-- Left sidebar -->
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
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey2_bg black_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
													" id="aa_1227620">A</div><a href="#" class="black_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span>Appmarket - <?php echo $countryInfo['country_name']; ?></span>  </div>
													</a></div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
											<ul class="marr20 pad0">
												<li class=" dblock padb10 padl8">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
														<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
														<span class="valm trn">App Market</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
													</a>
												</li>
												<li class=" dblock  padl8 ">
											<a href="../emergencyListing/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Travel</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
											</ul>
											
											
												</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							
							<!-- Center content -->
							<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg padl20 xs-padl0">
								
								
								
								
								
								
								
								<div class="padb20 xxs-padb0 ">
									
									<div class="wrap maxwi_100 dflex alit_fe justc_sb pos_rel padb10 brdb_new">
										<div class="white_bg tall">
											
											
											
											
											<!-- Logo -->
											<h1 class="fsz25 bold">Adressbok över anställda</h1>
											<!-- Logo -->
											<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Här kan du kontaktuppgifter tillanställda och chefer. </a></div>
											<!-- Meta -->
											
										</div>
										<div class="hidden-xs hidden-sm padrl10">
											<a href="#" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt">
												
												<span class="valm">Hantera</span>
											</a>
										</div>	
										
									</div>
									<div class="container  white_bg fsz14 dark_grey_txt ">
										
										<!-- Summary -->
										
										<div class="tab-content padb25 padt5 active xs-padt0" id="tab_total" style="display: block;">
											<form>
												<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
													<thead class="fsz14">
														<tr class="lgtgrey2_bg hei_40p">
															<th class=" padr5 grey_txt nobold hidden-xs">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<!--<th class="wi_6p pad0 "></th>-->
															<th class="padl10 padr10  grey_txt nobold hidden-xs tall">Image</th>
															<th class="padl10 pad10  grey_txt nobold tall" >Name</th>
															<th class="padl10 padr10  grey_txt nobold hidden-xs talc">Active</th>
															<th class="padl10 padr10  grey_txt nobold hidden-xs talr hidden">Admin</th>
															<th class="padl10 padr10  grey_txt nobold hidden-xs talr">Product Page</th>
															<th class="wi_130p padtb5   hidden-xs"></th>
														</tr>
														
													</thead>
													<tbody id="total_data">
														<?php 
															
															foreach($getPermissionDetail as $category => $value) 
															
															{  	
															?>
															<tr class="style_base bg_fffbcc_a ">
																<td class="brdb_new padr5 padb10 hidden-xs" >
																	<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
																</td>
																
																<td class="pad10 brdb_new hidden-xs">
																	 <div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" id="<?php echo 'aa_'.$value['id']; ?>"> <?php echo substr($value['app_name'],0,1);  ?> </div> 
																</td>
																<td class="pad10 brdb_new">
																	<div class="wi_100">
																		<div class="dflex alit_c">
																			<h3 class="mar0 pad0 fsz16 xs-fsz16">
																				<a href="#" class=" dark_grey_txt txt_0070e0_sbh" data-id="<?php echo 'a_'.$value['id']; ?>" id="<?php echo 'a_'.$value['id']; ?>"><?php echo $value['app_name']; ?></a>
																			</h3>
																			<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																		</div>
																		
																		
																	</div>
																</td>
																
																<td class="pad5 brdb_new talr">
														<div class="padtb5">
															<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($value['is_permission']==1) echo 'checked'; else echo ''; ?>" onclick="updateVisible(<?php echo $value['id']; ?>,this);">
																<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No" >
															</div>
														</div>
													</td>
													
													
													
																<td class="pad5 brdb_new talr">
														<a href="../productInfo/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>"><div class="padtb5">
															Add/Edit
														</div></a>
													</td>
																
																<td class="pad5 brdb_new   hidden-xs">
																	<div class="dflex fxshrink_0">
																		<a href="#" class="wi_70p hei_32p dflex alit_c justc_c vis_hid vis_vis_sbh vis_vis_sba brd brdrad5 bg_f dark_grey_txt">Share</a>
																		<a href="#" class="wi_36p hei_32p dflex alit_c justc_c marl10 brd brdrad5 bg_f dark_grey_txt"><span class="fa fa-ellipsis-h"></span></a>
																	</div>
																</td>
															</tr>
														<?php }	 ?>
													</tbody>
													
												</table>
												
												
												
												
											</form>
										</div>
										
									</div>
									
									<div class="clear"></div>
								</div>
								
								<div class="clear"></div>
							</div>
							
						</div>
						<div class="clear"></div>
					</div>	
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="hei_80p"></div>
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	
		
	</div>
	
	
	
	<!-- Company info popup -->
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_alert">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Some error occured. Please report to web admin!!</h2>
			
		
			
			<div class="on_clmn mart10 marb20">
				
				<input type="button" value="Close" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd trans_bg fsz18 black_txt curp close_popup_modal" >
			</div>
			
			
		</div>
	</div>
	
	
	
	
	
	
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/keep.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>

</html>
<?php
	if(isset($_GET['error']))
	{
		if($_GET['error'] == 0)
		{
			// showing alert message if article already exists
			echo '<script>alert("Invalid file !!!")</script>';
		}
		else if($_GET['error'] == 2)
		{
			
			echo '<script>alert("File error !!!")</script>';
		}
		
	}
	?>		