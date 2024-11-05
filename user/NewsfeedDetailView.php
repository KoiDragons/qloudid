<!doctype html>
<?php
	
	$path1 = $path."html/usercontent/images/";
	
?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
			<script>
			function addActive(link){
				//var $this = $(this);
				
				$(link).addClass('active');
				
				
				return false;
			}
			
			
			function searchUser()
			{
				if($("#reque").val()!=3)
				{
					alert("Please select code!!!");
					return false;
				}
				
				if($("#reque").val()==3)
				{
					if($("#code_id").val()=="" || $("#code_id").val()==null)
					{
						alert("Please enter your verification code!!!");
						return false;
					}
					else
					{
						var send_data={};
						send_data.id=$("#code_id").val();
						$.ajax({
							type:"POST",
							url:"NewsfeedDetail/searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/NewsfeedDetail";
								}
								
							}
						});
					}
					
				}
				
			}
			
			function checkRequest()
			{
				if($("#request_id").val()==0)
				{
					alert("Please select request type!!!");
					return false;
				}
				document.getElementById("save_request_company").submit();
			}
			function submit_unique()
			{
				if($("#unique_id").val()=="" || $("#unique_id").val()==null)
				{
					alert("Please enter your unique code!!!");
					return false;
				}
				document.getElementById("save_indexing_unique").submit();
			}
		</script>
	
	 	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/user/index.php/Dependents/approvedDependents" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		 
	<div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
					 
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/user/index.php/Dependents/approvedDependents" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>

	 
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_720p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  >Apps</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc   xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" > Select and explore your apps</a></div>
			 
					 <div class="tab-header mart10 padb10 brdb_black xs-talc talc">
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10       brdrad40 black_bg_a lgn_hight_36 fsz16 midgrey_txt   white_txt_a white_txt_ah active" data-id="utab_Popular">Active</a>
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10       brdrad40 black_bg_a lgn_hight_36 fsz16 midgrey_txt   white_txt_a white_txt_ah" data-id="utab_Analytics">Explore</a>
                                             
                                        </div>
										<div class="tab_container mart20">
											
											<!-- Popular -->
											<div class="tab_content hide active" id="utab_Popular" style="display: block;">
												<?php $i=0; if($countryInfo>0) { 
												foreach($getPermissionDetail as $category => $value) 
													{
													?>
													<div class="xs-wi_100 sm-wi_33 xsip-wi_33 wi_33 fleft bs_bb padrb20 talc hidden-xs  <?php  if($value['is_permission']==0) echo  '  hidden'; if($value['is_downloaded']==0) echo  '  hidden'; ?>">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="<?php echo $value['app_link']; ?>" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb padrl40">
																		<span class="dblock wi_100 maxwi_100p fsz30 maxhei_100p padtb5"><span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x brdrad50" style="background-color:<?php   if($value['app_id']==15){  echo '#ff5bad; color:#ff5bad;'; } else if($value['app_id']==16) {  echo 'rgba(255, 33, 46, 1); color:rgba(255, 33, 46, 1)'; } else if($value['app_id']==35) {  echo '#e4e4e4; color:#e4e4e4'; } else if($value['app_id']==38)  echo '#67cff7; color:#67cff7'; else if($value['app_id']==39)  echo '#47E2A1; color:#47E2A1'; else echo '#f9f9f9; color:#f9f9f9'; ?>"></i>
																				  
																				  <?php   if($value['app_id']==15) { ?>
													<span class="fsz20 fa-stack-1x fab1 bold padl2_5 mar0" aria-hidden="true" style="color:#ffffff;  ">SOS</span>
													<?php } else if($value['app_id']==16) { ?>
																				  <i class="black_txt <?php echo $value['app_icon']; ?> fab1 mar0" style="color: #ffffff;"></i>
													<?php } else { ?>
													<li class="<?php echo $value['app_icon']; ?>   brdrad0 fab1 padl0 mar0" style="<?php if($value['app_id']==35)  echo 'color:#fcaf16;'; else if($value['app_id']==38)  echo 'color:#ffffff;';  else if($value['app_id']==17)  echo 'color:#67cff7;'; else if($value['app_id']==39)  echo 'color:#ffffff;'; else echo 'color:#ffaeae;'; ?>"></li>
													<?php } ?>
																				</span></span>
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0"><?php echo $value['app_name']; ?></h3>
																		<span class="dblock talc marb5 padt10 midgrey_txt fsz18">Instantly notify employees.</span>
																		<div class="brdrad5  opa1 hidden lgn_hight_15 fsz14 black_txt  pfgreen_bgnew pad10 mart10 ">Besök <span class="panlyellow_bg"><?php if($value['app_id']==15)echo $connectAccountReceivedCount; else if($value['app_id']==14) echo $receivedRequestsUser; ?></span></div>
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												 
													<a href="<?php echo $value['app_link']; ?>">
													<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?> mart5  brdrad3   bg_fffbcc_a  marb10 visible-xs <?php  if($value['is_permission']==0) echo  '  hidden'; if($value['is_downloaded']==0) echo  '  hidden'; ?>" style="">
										<div class="container padtb15 padrl10 brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													<div class="fleft   marr15 " style="background-color:<?php   if($value['app_id']==15){  echo '#ff5bad; '; } else if($value['app_id']==16) {  echo 'rgba(255, 33, 46, 1); '; } else if($value['app_id']==35) {  echo '#e4e4e4; '; } else if($value['app_id']==38)  echo '#67cff7;'; else if($value['app_id']==39)  echo '#47E2A1;'; else echo '#f9f9f9'; ?>; border-radius: 10%; "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36  yellow_bg_a   "  >
													<?php   if($value['app_id']==15) { ?>
													<span class="fsz20 fa-stack-1x fab1 bold padl2_5 mar0" aria-hidden="true" style="color:#ffffff; background-color: #ff5bad;">SOS</span>
													<?php } else if($value['app_id']==16) { ?>
													<span class="<?php echo $value['app_icon']; ?> white_txt brdrad0 fab1 padl0 mar0" style="background-color: rgba(255, 33, 46, 1);"></span>
													<?php } else { ?>
													<span class="<?php echo $value['app_icon']; ?> <?php echo $value['app_bg']; ?> brdrad0 fab1 padl0 mar0" style="background-color: #<?php if($value['app_id']==35)  echo 'e4e4e4; color:#fcaf16;'; else if($value['app_id']==38)  echo '67cff7; color:#ffffff;';  else if($value['app_id']==17)  echo 'f9f9f9; color:#67cff7;'; else if($value['app_id']==39)  echo '47E2A1; color:#ffffff;'; else echo 'f9f9f9;'; ?>"></span>
													<?php } ?>
													</div>
							 				</div>
												 
													<div class="fleft wi_70   xs-mar0 ">
													
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 ffamily_avenir fsz18 bold black_txt"><?php  echo $value['app_name']; ?></span>
													
													 <span class="edit-text  fsz14 jain2 dblock  ffamily_avenir lgn_hight_18 "><?php echo $value['sub_heading']; ?></span> </div>
													 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</a>
												
												
												
												<?php $i++; } } ?>
												
												
												<?php $i=0; if($countryInfo>0) { 
												foreach($getMandatoryApps as $category => $value) 
													{
														if($value['app_id']!=55)
														{
															if($value['app_id']!=65)
															continue;	
														}
															
													?>
													<div class="xs-wi_100 sm-wi_33 xsip-wi_33 wi_33 fleft bs_bb padrb20 talc hidden-xs   ">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="<?php echo $value['app_link']; ?>" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb padrl40">
																		<span class="dblock wi_100 maxwi_100p fsz30 maxhei_100p padtb5"><span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x brdrad50" style="background-color:#ff5bad; color:#ff5bad;"></i>
																				  
																				   
																				  <i class="black_txt <?php echo $value['app_icon']; ?> fab1 mar0" style="color: #ffffff;"></i>
													 
																				</span></span>
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0"><?php echo $value['app_name']; ?></h3>
																		<span class="dblock talc marb5 padt10 midgrey_txt fsz18">Instantly notify employees.</span>
																		<div class="brdrad5  opa1 hidden lgn_hight_15 fsz14 black_txt  pfgreen_bgnew pad10 mart10 ">Besök <span class="panlyellow_bg"><?php if($value['app_id']==15)echo $connectAccountReceivedCount; else if($value['app_id']==14) echo $receivedRequestsUser; ?></span></div>
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												 
													<a href="<?php echo $value['app_link']; ?>">
													<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?> mart5  brdrad3   bg_fffbcc_a  marb10 visible-xs  " style="">
										<div class="container padtb15 padrl10 brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													<div class="fleft   marr15 " style="background-color:#ff5bad; color:#ff5bad; border-radius: 10%; "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36  yellow_bg_a   "  >
													 
													<span class="<?php echo $value['app_icon']; ?> white_txt brdrad0 fab1 padl0 mar0" style="background-color: rgba(255, 33, 46, 1);"></span>
													 
													</div>
							 				</div>
												 
													<div class="fleft wi_70   xs-mar0 ">
													
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 ffamily_avenir fsz18 bold black_txt"><?php  echo $value['app_name']; ?></span>
													
													 <span class="edit-text  fsz14 jain2 dblock  ffamily_avenir lgn_hight_18 "><?php echo $value['sub_heading']; ?></span> </div>
													 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</a>
												
												
												
												<?php $i++; } } ?>
												
												<div class="clear"></div>
											</div>
											
											<!-- Analytics -->
											<div class="tab_content hide" id="utab_Analytics" style="display: none;">
												<?php $i=0; if($countryInfo>0) { 
												foreach($getPermissionDetail as $category => $value) 
													{
													?>
													<div class="xs-wi_100 sm-wi_33 xsip-wi_33 wi_33 fleft bs_bb padrb20 talc hidden-xs <?php  if($value['is_permission']==0) echo  '  hidden'; if($value['is_downloaded']==1) echo  '  hidden'; ?>">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="NewsfeedDetail/productPage/<?php echo $value['enc']; ?>" class="style_base hei_210p  dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb padrl40">
																		<span class="dblock wi_100 maxwi_100p fsz30 maxhei_100p padtb5"><span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x brdrad50" style="background-color:<?php   if($value['app_id']==15){  echo '#ff5bad; color:#ff5bad;'; } else if($value['app_id']==16) {  echo 'rgba(255, 33, 46, 1); color:rgba(255, 33, 46, 1)'; } else if($value['app_id']==35) {  echo '#e4e4e4; color:#e4e4e4'; } else if($value['app_id']==38)  echo '#67cff7; color:#67cff7'; else if($value['app_id']==39)  echo '#47E2A1; color:#47E2A1'; else echo '#f9f9f9; color:#f9f9f9'; ?>"></i>
																				  
																				  <?php   if($value['app_id']==15) { ?>
													<span class="fsz20 fa-stack-1x fab1 bold padl2_5" aria-hidden="true" style="color:#ffffff;  ">SOS</span>
													<?php } else if($value['app_id']==16) { ?>
																				  <i class="black_txt <?php echo $value['app_icon']; ?> fab1" style="color: #ffffff;"></i>
													<?php } else { ?>
													<li class="<?php echo $value['app_icon']; ?>   brdrad0 fab1 padl0" style="<?php if($value['app_id']==35)  echo 'color:#fcaf16;'; else if($value['app_id']==38)  echo 'color:#ffffff;';  else if($value['app_id']==17)  echo 'color:#67cff7;'; else if($value['app_id']==39)  echo 'color:#ffffff;'; else echo 'color:#ffaeae;'; ?>"></li>
													<?php } ?>
																				</span></span>
																	</div>
																	
																	<div class="trf_y-10p_ph  padrbl15 padt0">
																		<h3 class="ovfl_hid pad0 talc txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0 "><?php echo $value['app_name']; ?></h3>
																		<span class="dblock marb5 padt10 talc midgrey_txt fsz18">Instantly notify employees.</span>
																		<div class="opa0  opa1_ph lgn_hight_15 fsz14 black_txt  panlyellow_bg pad10 mart10 hidden">View</div>
																	</div>
																</div>
															</a>
														</div>
														<div class="wi_100 hide dblock_pa style_base hei_190p  bs_bb pad25 brd brdclr_seggreen_h brdrad4 ">
															<h3 class="marb15 talc bold fsz16">Medlemskap HR</h3>
															<div class="marb10 padrl20">
																<a href="#" class=" dblock blue_bg talc lgn_hight_40 white_txt" data-target="#pipefy_sliding_modal">läs mer</a>
															</div>
															<div class="padrl20">
																<a href="NewsfeedDetail/productPage/<?php echo $value['enc']; ?>" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">Besök sidan</a>
															</div>
														</div>
														
													</div>
												</div>
												
												<a href="NewsfeedDetail/productPage/<?php echo $value['enc']; ?>">
												<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?> mart5  brdrad3   bg_fffbcc_a  marb10 visible-xs <?php  if($value['is_permission']==0) echo  '  hidden'; if($value['is_downloaded']==1) echo  '  hidden'; ?>" style="">
										<div class="container padtb15 padrl10 brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													<div class="fleft   marr15 " style="background-color:<?php   if($value['app_id']==15){  echo '#ff5bad; '; } else if($value['app_id']==16) {  echo 'rgba(255, 33, 46, 1); '; } else if($value['app_id']==35) {  echo '#e4e4e4; '; } else if($value['app_id']==38)  echo '#67cff7;'; else if($value['app_id']==39)  echo '#47E2A1'; else echo '#f9f9f9'; ?>; border-radius: 10%;"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36  yellow_bg_a   "  >
													<?php   if($value['app_id']==15) { ?>
													<span class="fsz20 fa-stack-1x fab1 mar0 bold padl2_5" aria-hidden="true" style="color:#ffffff; background-color: #ff5bad;">SOS</span>
													<?php } else if($value['app_id']==16) { ?>
													<span class="<?php echo $value['app_icon']; ?> white_txt brdrad0 fab1 padl0" style="background-color: rgba(255, 33, 46, 1);"></span>
													<?php } else { ?>
													<span class="<?php echo $value['app_icon']; ?> <?php echo $value['app_bg']; ?> brdrad0 fab1 padl0" style="background-color: #<?php if($value['app_id']==35)  echo 'e4e4e4; color:#fcaf16;'; else if($value['app_id']==38)  echo '67cff7; color:#ffffff;';  else if($value['app_id']==17)  echo 'f9f9f9; color:#67cff7;'; else if($value['app_id']==39)  echo '47E2A1; color:#ffffff;'; else echo 'f9f9f9;'; ?>"></span>
													<?php } ?>
													</div>
							 				</div>
												 
													<div class="fleft wi_70   xs-mar0 ">
													
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 ffamily_avenir fsz18 bold black_txt"><?php  echo $value['app_name']; ?></span>
													
													 <span class="edit-text  fsz14 jain2 dblock ffamily_avenir lgn_hight_18 "><?php echo $value['sub_heading']; ?></span> </div>
													 
												 
													
												</div>
											
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											</a>
												
											<?php $i++; } } ?>
												
												<div class="clear"></div>
											</div>
											
											<!-- Advertising -->
											<div class="tab_content hide" id="utab_Advertising" style="display: none;">
												
												<div class="clear"></div>
											</div>
											
											
											
										</div>
									 
	<div class="clear"></div>



</div>
 
</div>
<div class="clear"></div>
</div>
 



<div class="clear"></div>
<div class="hei_80p hidden-xs"></div>

 
<!-- Popup fade -->
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

</div>

 
	
<!-- Slide fade -->
<div id="slide_fade"></div>

<!-- Menu list fade -->
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>


<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
<script>
	
	// Charts
	google.charts.load('current', { 'packages': ['corechart'] });
	
	
	// Line Chart
	google.charts.setOnLoadCallback(drawLineChartInhouse);
	function drawLineChartInhouse() {
		var data = google.visualization.arrayToDataTable([
		['Day', 'Upcoming', 'Incoming'],
		['MON', 100, 60],
		['TUE', 90, 60],
		['WED', 105, 50],
		['THU', 115, 45],
		['FRI', 110, 50],
		['SAT', 112, 52],
		['SUN', 200, 48]
		]);
		
		var options = {
			curveType: 'function',
			chartArea : {
				width: '100%',
				height: 160,
				top: 20,
			},
			pointSize: 5,
			colors: ['#3691c0', '#ba03d9']
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawLineChartStaffing);
	function drawLineChartStaffing() {
		var data = google.visualization.arrayToDataTable([
		['Day', 'Upcoming', 'Incoming'],
		['MON', 100, 60],
		['TUE', 90, 60],
		['WED', 105, 50],
		['THU', 115, 45],
		['FRI', 110, 50],
		['SAT', 112, 52],
		['SUN', 200, 48]
		]);
		
		var options = {
			curveType: 'function',
			chartArea : {
				width: '100%',
				height: 160,
				top: 20,
			},
			pointSize: 5,
			colors: ['#3691c0', '#ba03d9']
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawLineChartRecruiting);
	function drawLineChartRecruiting() {
		var data = google.visualization.arrayToDataTable([
		['Day', 'Upcoming', 'Incoming'],
		['MON', 100, 60],
		['TUE', 90, 60],
		['WED', 105, 50],
		['THU', 115, 45],
		['FRI', 110, 50],
		['SAT', 112, 52],
		['SUN', 200, 48]
		]);
		
		var options = {
			curveType: 'function',
			chartArea : {
				width: '100%',
				height: 160,
				top: 20,
			},
			pointSize: 5,
			colors: ['#3691c0', '#ba03d9']
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
	function drawLineChartBackgroundChecks() {
		var data = google.visualization.arrayToDataTable([
		['Day', 'Upcoming', 'Incoming'],
		['MON', 100, 60],
		['TUE', 90, 60],
		['WED', 105, 50],
		['THU', 115, 45],
		['FRI', 110, 50],
		['SAT', 112, 52],
		['SUN', 200, 48]
		]);
		
		var options = {
			curveType: 'function',
			chartArea : {
				width: '100%',
				height: 160,
				top: 20,
			},
			pointSize: 5,
			colors: ['#3691c0', '#ba03d9']
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
		chart.draw(data, options);
	}
	
	
	// Donut Chart
	// - yearly
	google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
	function drawDonutChartYearlyInhouse() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 38],
		['other', 22],
		['23-30 y.o.', 26],
		['18-22 y.o.', 14]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
	function drawDonutChartYearlyStaffing() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 38],
		['other', 22],
		['23-30 y.o.', 26],
		['18-22 y.o.', 14]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
	function drawDonutChartYearlyRecruiting() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 38],
		['other', 22],
		['23-30 y.o.', 26],
		['18-22 y.o.', 14]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
	function drawDonutChartYearlyBackgroundChecks() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 38],
		['other', 22],
		['23-30 y.o.', 26],
		['18-22 y.o.', 14]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
		chart.draw(data, options);
	}
	
	
	// - monthly
	google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
	function drawDonutChartMonthlyInhouse() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 48],
		['other', 12],
		['23-30 y.o.', 16],
		['18-22 y.o.', 24]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
	function drawDonutChartMonthlyStaffing() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 48],
		['other', 12],
		['23-30 y.o.', 16],
		['18-22 y.o.', 24]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
	function drawDonutChartMonthlyRecruiting() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 48],
		['other', 12],
		['23-30 y.o.', 16],
		['18-22 y.o.', 24]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
	function drawDonutChartMonthlyBackgroundChecks() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 48],
		['other', 12],
		['23-30 y.o.', 16],
		['18-22 y.o.', 24]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
		chart.draw(data, options);
	}
	
	
	// - daily
	google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
	function drawDonutChartDailyInhouse() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 53],
		['other', 16],
		['23-30 y.o.', 21],
		['18-22 y.o.', 10]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
	function drawDonutChartDailyStaffing() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 53],
		['other', 16],
		['23-30 y.o.', 21],
		['18-22 y.o.', 10]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
	function drawDonutChartDailyRecruiting() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 53],
		['other', 16],
		['23-30 y.o.', 21],
		['18-22 y.o.', 10]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
	function drawDonutChartDailyBackgroundChecks() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 53],
		['other', 16],
		['23-30 y.o.', 21],
		['18-22 y.o.', 10]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
		chart.draw(data, options);
	}
	
	
	tinyMCE.init({
		selector: '.texteditor',
		plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
		toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
		//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
		//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
		menubar: false,
		toolbar_items_size: 'small',
		style_formats: [
		{
			title: 'Bold text',
			inline: 'b'
		},
		{
			title: 'Red text',
			inline: 'span',
			styles:
			{
				color: '#ff0000'
			}
		},
		{
			title: 'Red header',
			block: 'h1',
			styles:
			{
				color: '#ff0000'
			}
		},
		{
			title: 'Example 1',
			inline: 'span',
			classes: 'example1'
		},
		{
			title: 'Example 2',
			inline: 'span',
			classes: 'example2'
		},
		{
			title: 'Table styles'
		},
		{
			title: 'Table row 1',
			selector: 'tr',
			classes: 'tablerow1'
		}],
		templates: [
		{
			title: 'Test template 1',
			content: 'Test 1'
		},
		{
			title: 'Test template 2',
			content: 'Test 2'
		}]
	});
</script>
</body>

</html>