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
													" id="aa_1227620">P</div><a href="#" class="black_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span>Partner portal</span>  </div>
													</a></div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
											<ul class="marr20 pad0">
												
												
												
												<li class=" dblock padb10 padl8">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
														<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
														<span class="valm trn">PartnerEndCustomer</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
													</a>
												</li>
												<li class=" dblock  padl8">
													<a href="PartnerCompany" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
														<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
														<span class="valm trn">Partner Company</span>
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
									
									<div class="container tab-header padt5 talc dark_grey_txt ">
										<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone lgtgrey_bg">
											
											
											
											<li>
												<a href="#" class="dblock brdradt5 active" data-id="tab_total">
													<span class="count black_txt"><?php echo $receptionistCount['num']; ?></span>
													<span class="black_txt fsz16"> End Partner </span>
												</a>
											</li>
											
											
											
											
											<div class="clear"></div>
										</ul>
										<select class="tab-header xs-wi_100 maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb_new xs-fsz30 pblue2_bg">
											<option value="tab_total" selected class="xs-fsz20"><?php echo $receptionistCount['num']; ?></option>
											
											
											
											
										</select>
										<div class="clear"></div>
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
															<th class="pad5  nobold   tall " >Company name	</th>
													<th class="pad5  nobold  tall" >Owner Company name</th>
															
															<th class="wi_130p padtb5   hidden-xs"></th>
														</tr>
														
													</thead>
													<tbody id="total_data">
														<?php 
															
															foreach($receptionistDetail as $category => $value) 
															
															{  	
															?>
															<tr class="style_base bg_fffbcc_a fsz16">
																<td class="brdb_new padr5 padb10 hidden-xs" >
																	<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
																</td>
																
																<td class="pad10 brdb_new">
																	<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > <?php echo substr($value['receptionist_company_name'],0,1);  ?> </div>
																</td>
																
																<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['receptionist_company_name']; ?></div>
													</td>
																<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['company_name']; ?></div>
													</td>
																
																
																
																
															</tr>
														<?php }	 ?>
													</tbody>
													
												</table>
												
												<div class="mart20 talc">
													<a href="javascript:void(0);" class="dblue_btn" value="1" id="new_value" onclick="add_more_rows(this,this.value)" > View more </a>
												</div>
												
												
											</form>
										</div>
										
										
										
										
									</div>
									
									
									
								</div>
								
								
								<script>
									
									function add_more_rows(link,id){
										
										var id_val=parseInt($(link).attr('value'))+1;
										
										
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										send_data.message=id;
										$.ajax({
											type:"POST",
											url:"PartnerEndCustomer/morePartnerEndCustomerDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												
												html1=data1;
												var $tbody = $(link).closest('form').find('tbody'),
												html=html1;
												
												$tbody
												.append($(data1))
												.find('input.check')
												.iCheck({
													checkboxClass: 'icheckbox_minimal-aero',
													radioClass: 'iradio_minimal-aero',
													increaseArea: '20%'
												});
												}
										});
										
									}
									
									
								</script>
								
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