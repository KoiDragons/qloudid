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
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylene.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
		<div class="hidden-xs">
		<?php include 'AdminHeaderUpdated.php'; ?>
		</div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
				
						<div class="top_menu frighti padt10 padb10 wi_60i visible-xs visible-sm visible-xsi">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">
					 
       			
					<li class="marri15 first last">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25"><span class="fas fa-bars black_txt"></span></a>
					</li>
				</ul>
			</div>
					
			
					 
					
                <div class="clear"></div>

            </div>
        </div>
		
		<div class="column_m pos_rel"  onclick="checkFlag();">
			
			<div class=" column_m container zi5  mart40 xs-mart0">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="xs-wi_100 dflex justc_sb alit_c bs_bb marb0  padt2  xs-lgtgrey_bg">
						<div class="wi_960p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg xs-lgtgrey_bg sm-lgtgrey_bg">
							
							<!-- Left sidebar -->
							<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 640px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px;">
								
								 
								<ul class="dblock marr20 padt200 padl10 fsz16 mart0">
								<li class="dblock padrb10">
						<a href="DeveloperRequest" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space">Developer</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
						<li class="dblock padrb10">
						<a href="LawCompany" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space">Law company</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 		 
						<li class="dblock padrb10">
						<a href="CompanyDunsNumberRequest" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space">Duns Number</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 	
											<li class="dblock padb10 ">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space">Partner Company</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
						
						<li class="dblock padrb10 padt5">
						<a href="VerifyIdRequest" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space">Verify ID</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
						 
						
						 
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
							<!-- Center content -->
							<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg padl20 xs-padl0 mart40 xs-mart20 xs-pad0">
								
								
								
								
								
								
								
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
													<span class="count black_txt"><?php echo $partnerCount['num']; ?></span>
													<span class="black_txt fsz16"> Company Partner </span>
												</a>
											</li>
												<li>
												<a href="#" class="dblock brdradt5 " data-id="tab_total1">
													<span class="count black_txt"><?php echo $partnerCountApproved['num']; ?></span>
													<span class="black_txt fsz16"> Approved </span>
												</a>
											</li>
												<li>
												<a href="#" class="dblock brdradt5 " data-id="tab_total2">
													<span class="count black_txt"><?php echo $partnerCountRejected['num']; ?></span>
													<span class="black_txt fsz16"> Rejected </span>
												</a>
											</li>
											
											
											
											<div class="clear"></div>
										</ul>
										<select class="tab-header xs-wi_100 maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb_new xs-fsz30 pblue2_bg">
											<option value="tab_total" selected class="xs-fsz20"><?php echo $partnerCount['num']; ?></option>
											
											<option value="tab_total1"  class="xs-fsz20">Approved</option>
											<option value="tab_total2"  class="xs-fsz20">Rejected</option>
											
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
													<th class="pad5  nobold  tall" >Partner type</th>
														<th class="pad5  nobold   tall " >Approve	</th>
													<th class="pad5  nobold  tall" >Reject</th>
																
															
														</tr>
														
													</thead>
													<tbody id="total_data">
														<?php 
															
															foreach($partnerDetail as $category => $value) 
															
															{  	
															?>
															<tr class="style_base bg_fffbcc_a fsz16">
																<td class="brdb_new padr5 padb10 hidden-xs" >
																	<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
																</td>
																
																<td class="pad10 brdb_new">
																	<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > <?php echo substr($value['company_name'],0,1);  ?> </div>
																</td>
																
																<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo substr($value['company_name'],0,20);  ?></div>
													</td>
																<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['partner_type']; ?>
															
															
															</div>
													</td>
																
														<td class="pad5 brdb_new tall cn">
														<a href="PartnerCompany/approvePartner/<?php echo $value['enc']; ?>"><div class="padtb5 " >Approve
															
															
															</div></a>
													</td>		
																
														<td class="pad5 brdb_new tall cn">
														<a href="PartnerCompany/rejectPartner/<?php echo $value['enc']; ?>"><div class="padtb5 " >Reject
															
															
															</div></a>
													</td>		
															</tr>
														<?php }	 ?>
													</tbody>
													
												</table>
												
												<div class="mart20 talc">
													<a href="javascript:void(0);" class="dblue_btn" value="1" id="new_value" onclick="add_more_rows(this,this.value)" > View more </a>
												</div>
												
												
											</form>
											
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
											url:"PartnerCompany/morePartnerCompany",
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
								
										</div>
										
										
										<div class="tab-content padb25 padt5 xs-padt0" id="tab_total1">
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
													<th class="pad5  nobold  tall" >Partner type</th>
													
																
															
														</tr>
														
													</thead>
													<tbody id="total_data1">
														<?php 
															
															foreach($partnerDetailApproved as $category => $value) 
															
															{  	
															?>
															<tr class="style_base bg_fffbcc_a fsz16">
																<td class="brdb_new padr5 padb10 hidden-xs" >
																	<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
																</td>
																
																<td class="pad10 brdb_new">
																	<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > <?php echo substr($value['company_name'],0,1);  ?> </div>
																</td>
																
																<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo substr($value['company_name'],0,20);  ?></div>
													</td>
																<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['partner_type']; ?>
															
															
															</div>
													</td>
																
														
															</tr>
														<?php }	 ?>
													</tbody>
													
												</table>
												
												<div class="mart20 talc">
													<a href="javascript:void(0);" class="dblue_btn" value="1" id="new_value" onclick="add_more_rows_approved(this,this.value)" > View more </a>
												</div>
												
												
											</form>
											
											<script>
									
									function add_more_rows_approved(link,id){
										
										var id_val=parseInt($(link).attr('value'))+1;
										
										
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										send_data.message=id;
										$.ajax({
											type:"POST",
											url:"PartnerCompany/morePartnerCompanyApproved",
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
								
										</div>
										
										
										<div class="tab-content padb25 padt5 xs-padt0" id="tab_total2">
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
													<th class="pad5  nobold  tall" >Partner type</th>
													
																
															
														</tr>
														
													</thead>
													<tbody id="total_data2">
														<?php 
															
															foreach($partnerDetailRejected as $category => $value) 
															
															{  	
															?>
															<tr class="style_base bg_fffbcc_a fsz16">
																<td class="brdb_new padr5 padb10 hidden-xs" >
																	<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
																</td>
																
																<td class="pad10 brdb_new">
																	<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > <?php echo substr($value['company_name'],0,1);  ?> </div>
																</td>
																
																<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo substr($value['company_name'],0,20);  ?></div>
													</td>
																<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><?php echo $value['partner_type']; ?>
															
															
															</div>
													</td>
																
																
															</tr>
														<?php }	 ?>
													</tbody>
													
												</table>
												
												<div class="mart20 talc">
													<a href="javascript:void(0);" class="dblue_btn" value="1" id="new_value" onclick="add_more_rows_rejected(this,this.value)" > View more </a>
												</div>
												
												
											</form>
											
											<script>
									
									function add_more_rows_rejected(link,id){
										
										var id_val=parseInt($(link).attr('value'))+1;
										
										
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										send_data.message=id;
										$.ajax({
											type:"POST",
											url:"PartnerCompany/morePartnerCompanyRejected",
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
								
										</div>
										
										
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