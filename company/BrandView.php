<!doctype html>
<html>
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
		$path1 = $path."html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
	if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
			<script>
function submitFormCom()
{
	
	$("#save_indexingcs").submit();
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
</script>
		<script>
		
		function addActive(link){
		//var $this = $(this);
			
			$(link).addClass('active');
		
		
		return false;
		}
		 
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
			 
			function submitWeb()
			{
				
				if($("#website").val()==null || $("#website").val()=="")
				{
					$("#errorMsg").html("Enter website name");
					return false;
				}
				if($("#wlink").val()==null || $("#wlink").val()=="")
				{
					$("#errorMsg").html("Enter website link");
					return false;
				}
				
				var txt = $('#wlink').val();
				var re = /(((http|ftp|https):\/{2})+(([0-9a-z_-]+\.)+(aero|asia|biz|cat|com|coop|edu|gov|info|int|jobs|mil|mobi|museum|name|net|org|pro|tel|travel|ac|ad|ae|af|ag|ai|al|am|an|ao|aq|ar|as|at|au|aw|ax|az|ba|bb|bd|be|bf|bg|bh|bi|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|cr|cu|cv|cx|cy|cz|cz|de|dj|dk|dm|do|dz|ec|ee|eg|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gg|gh|gi|gl|gm|gn|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|im|in|io|iq|ir|is|it|je|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mk|ml|mn|mn|mo|mp|mr|ms|mt|mu|mv|mw|mx|my|mz|na|nc|ne|nf|ng|ni|nl|no|np|nr|nu|nz|nom|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|ps|pt|pw|py|qa|re|ra|rs|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tl|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw|arpa)(:[0-9]+)?((\/([~0-9a-zA-Z\#\+\%@\.\/_-]+))?(\?[0-9a-zA-Z\+\%@\/&\[\];=_-]+)?)?))\b/;
				if (re.test(txt)) {
					
				}
				else
				{
					$("#errorMsg").html('In-Valid URL');
					return false;
				}
				document.getElementById("gratis_popup_company_search").style.display='none';
				document.getElementById("loading_image").style.display='block';
				$(".loading_image").addClass('active'); 
				$(".activepopup").removeClass('active');
				var send_data={};
				
				send_data.web=$("#website").val();
				send_data.wlink=$("#wlink").val();
				$.ajax({
					type:"POST",
					url:"../addWeblink/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						if(data1=='0')
						{
							$(".loading_image").removeClass('active');
							document.getElementById("gratis_popup_company_search").style.display='none';
							document.getElementById("gratis_popup_company_searched").style.display='block';
							$(".gratis_popup_company_searched").addClass('active');
						}
						else
						{
							document.getElementById("loading_image").style.display='none';
							$(".loading_image").removeClass('active');
							document.getElementById("gratis_popup_company_search").style.display='none';
							document.getElementById("gratis_popup_company_searched").style.display='block';
							$(".gratis_popup_company_searched").addClass('active');
							$("#searched").html('');
							$("#searched").append(data1);
						}
					}
				});
			}
			
			function getLink()
			{
				var send_data={};
				
				$.ajax({
					type:"POST",
					url:"../getLinkid/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						$(".activepopup").removeClass('active');
						document.getElementById("gratis_popup_company_search").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched").html('');
						$("#searched").append(data1);
						
					}
				});
			}
			
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
	
<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../CompanyProperty/locationAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_720p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart20 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn nobold"  >Apps</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc xs-padb15  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn nobold" >  Select and explore your apps</a></div>
							
							
							<div class="column_m  fsz14 lgn_hight_22 dark_grey_txt">
								<div class="container <?php if($countryInfo==0) { echo  '  hidden'; } ?>">
									<div class="">
										
										 <div class="tab-header mart10 padb10 brdb_new brdclr_seggreen_47E2A1 brd_width_2 xs-talc talc">
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10   brdclr_seggreen_47E2A1_h brdclr_seggreen_47E2A1_a brdrad40 seggreen_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active" data-id="utab_Popular">Active</a>
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10   brdclr_seggreen_47E2A1_h brdclr_seggreen_47E2A1_a brdrad40 seggreen_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Analytics">Explore</a>
                                             
                                        </div>
										
										<div class="tab_container mart20">
											
											<!-- Popular -->
											<div class="tab_content hide active" id="utab_Popular" style="display: block;">
											<?php 
												foreach($getPermissionDetail as $category => $value) 
													{
														if($value['app_id']==52)
														{
															continue;
														}
													?>
													 
													<div class="xs-wi_100 sm-wi_33 xsip-wi_33 wi_33 fleft bs_bb padrb20 talc hidden-xs  <?php if(isset($getPermissionDetail)) { if($value['is_permission']==0) echo  '  hidden'; if($value['is_downloaded']==0) echo  '  hidden'; } ?>">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="<?php if($value['app_link']==null) echo '#'; else echo $value['app_link'].''.$data['cid']; ?>" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb padrl40">
																		<span class="dblock wi_100 maxwi_100p fsz30 maxhei_100p padtb5"><span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x brdrad50 <?php echo $value['app_bg']; ?>" ></i>
																				  
																				 
													<li class="<?php echo $value['app_icon']; ?>   brdrad0 fab1 black_txt"></li>
												 
																				</span></span>
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0"><?php echo $value['app_name']; ?></h3>
																		<span class="dblock talc marb5 padt10 midgrey_txt fsz18"><?php echo $value['sub_heading']; ?></span>
																		<div class="brdrad5  opa1 hidden lgn_hight_15 fsz14 black_txt  pfgreen_bgnew pad10 mart10 ">Besök  </div>
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												
												<a href="<?php if($value['app_link']==null) echo '#'; else echo $value['app_link'].''.$data['cid']; ?>">
													<div class=" white_bg mart5  brdrad3 box_shadow bg_fffbcc_a  marb10 visible-xs <?php if(isset($getPermissionDetail)) { if($value['is_permission']==0) echo  '  hidden'; if($value['is_downloaded']==0) echo  '  hidden'; } ?>"  >
										<div class="container padtb15 padrl10 brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													<div class="fleft   marr15 <?php echo $value['app_bg']; ?>" style="  border-radius: 10%;"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36  yellow_bg_a   "  >
													 
													<span class="<?php echo $value['app_icon']; ?> black_txt brdrad0 fab1 padl0"  ></span>
													 
													</div>
							 				</div>
												 
													<div class="fleft wi_70   xs-mar0 ">
													
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold blue_67cff7 "><?php  echo $value['app_name']; ?></span>
													
													 <span class="edit-text  fsz14 jain2 dblock  lgn_hight_18 "><?php echo $value['sub_heading']; ?></span> </div>
													 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</a>
												
												 
												
													<?php } ?>
												
										<div class="xs-wi_100 sm-wi_33 xsip-wi_33 wi_33 fleft bs_bb padrb20 talc hidden-xs ">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="https://www.safeqloud.com/company/index.php/Community/listSociety/<?php echo $data['cid']; ?>" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb padrl40">
																		<span class="dblock wi_100 maxwi_100p fsz30 maxhei_100p padtb5"><span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x brdrad50 circle_bg_apps1" ></i>
																				  
																				 
													<li class="far fa-handshake fa-stack-1x   brdrad0 fab1 black_txt"></li>
												 
																				</span></span>
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0">Community</h3>
																		<span class="dblock talc marb5 padt10 midgrey_txt fsz18">Here you can add and list communities.</span>
																		<div class="brdrad5  opa1 hidden lgn_hight_15 fsz14 black_txt  pfgreen_bgnew pad10 mart10 ">Besök  </div>
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												
												<a href="https://www.safeqloud.com/company/index.php/Community/listSociety/<?php echo $data['cid']; ?>">
													<div class=" white_bg mart5  brdrad3 box_shadow bg_fffbcc_a  marb10 visible-xs "  >
										<div class="container padtb15 padrl10 brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													<div class="fleft   marr15 circle_bg_apps1" style="  border-radius: 10%;"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36  yellow_bg_a   "  >
													 
													<span class="far fa-handshake fa-stack-1x black_txt brdrad0 fab1 padl0"  ></span>
													 
													</div>
							 				</div>
												 
													<div class="fleft wi_70   xs-mar0 ">
													
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold blue_67cff7 ">Community</span>
													
													 <span class="edit-text  fsz14 jain2 dblock  lgn_hight_18 ">Here you can add and list communities</span> </div>
													 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</a>
													<div class="clear"></div>
												</div>
												
												<!-- Analytics -->
												<div class="tab_content hide" id="utab_Analytics" style="display: none;">
												
												<?php 
												foreach($getPermissionDetail as $category => $value) 
													{
														if($value['app_id']==52)
														{
															continue;
														}
													?>
													 
													<div class="xs-wi_100 sm-wi_33 xsip-wi_33 wi_33 fleft bs_bb padrb20 talc hidden-xs  <?php if(isset($getPermissionDetail)) { if($value['is_permission']==0) echo  '  hidden'; if($value['is_downloaded']==1) echo  '  hidden'; } ?>">
													<div class="toggle-parent wi_100 dflex alit_s" >
														<div class="wi_100 dnone_pa ">
															<a href="../productPage/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>" class="style_base hei_210p dblock bs_bb pad20 brd brdclr_seggreen_h brdrad5 lgtgrey2_bg_h  box_shadow">
																<div class=" ">
																	<div class="wi_100 hei_90p dflex bs_bb padrl40">
																		<span class="dblock wi_100 maxwi_100p fsz30 maxhei_100p padtb5"><span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x brdrad50 <?php echo $value['app_bg']; ?>" ></i>
																				  
																				 
													<li class="<?php echo $value['app_icon']; ?>   brdrad0 fab1 black_txt"></li>
												 
																				</span></span>
																	</div>
																	
																	<div class="  padrbl15 padt0">
																		<h3 class="ovfl_hid talc pad0 txtovfl_el ws_now lgn_hight_24 bold fsz18 segdblue_txt padt0"><?php echo $value['app_name']; ?></h3>
																		<span class="dblock talc marb5 padt10 midgrey_txt fsz18"><?php echo $value['sub_heading']; ?></span>
																		<div class="brdrad5  opa1 hidden lgn_hight_15 fsz14 black_txt  pfgreen_bgnew pad10 mart10 ">Besök  </div>
																	</div>
																</div>
															</a>
														</div>
														
														
													</div>
												</div>
												
												
												<a href="../productPage/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>">
													<div class=" white_bg mart5  brdrad3 box_shadow bg_fffbcc_a  marb10 visible-xs <?php if(isset($getPermissionDetail)) { if($value['is_permission']==0) echo  '  hidden'; if($value['is_downloaded']==1) echo  '  hidden'; } ?>"  >
										<div class="container padtb15 padrl10 brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													<div class="fleft   marr15 <?php echo $value['app_bg']; ?>" style="  border-radius: 10%;"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz36  yellow_bg_a   "  >
													 
													<span class="<?php echo $value['app_icon']; ?> black_txt brdrad0 fab1 padl0"  ></span>
													 
													</div>
							 				</div>
												 
													<div class="fleft wi_70   xs-mar0 ">
													
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold blue_67cff7 "><?php  echo $value['app_name']; ?></span>
													
													 <span class="edit-text  fsz14 jain2 dblock  lgn_hight_18 "><?php echo $value['sub_heading']; ?></span> </div>
													 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</a>
												
												 
												
													<?php } ?>
												
												
												
												 
													<div class="clear"></div>
												</div>
												
												 
												
											</div>
										</div>
									</div>
									
									
								</div>
								
								
								
								
								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			 
			
			<div class="clear"></div>
			<div class="hei_80p hidden-xs"></div>
			
			
			 
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg <?php if($countryInfo==0) { echo 'active'; } ?>" style="display:<?php if($countryInfo==0) { echo 'block'; } else echo 'none'; ?>"></div>
			
		</div>
		
		<div class="wi_600p maxwi_90 dnone pos_fix zi999 pos_cen  bs_bb fsz14" id="keep-modal">
			<form>
				<div class="keep-block keep-block-modal pos_rel brdrad2 bg_f txt_0_87 trans_bgc1 ">
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
					<div class="custom-scrollbar minhei_60p maxhei_100vh-70p ovfl_auto pos_rel">
						<div class="keep-images dflex fxwrap_w alit_c"></div>
						<div class="padt16 padr16 padl16">
							<textarea name="title" rows="1" cols="1" class="autosize keep-title wi_100-15p dblock marb16 pad0 nobrd bg_trans ff_inh bold fsz17 txt_0_87" placeholder="Title"></textarea>
						</div>
						<div class="keep-list padr16 padl16"></div>
						<div class="keep-list-add-item opa54 pos_rel marr16 marl16 marb16 padtb5 padrl25 txt_21">
							<label for="keep-list-add" class="dblock pos_abs pos_cenY left-2p curp">
								<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-plus.svg" width="18" height="18" class="dblock">
							</label>
							<input type="text" name="keep-list-add" id="keep-list-add" class="wi_100 dblock pad0 nobrd bg_trans ff_inh fsz_inh txt_21" placeholder="List item">
						</div>
						<div class="keep-completed marb16 padr16 padl16" data-before="Completed items"></div>
						<div class="keep-metas dflex fxwrap_w alit_c marb10 padr16 padl16"></div>
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
							<button type="submit" class="marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Done</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		
	 	
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10 <?php if($countryInfo==0) { echo 'active'; } ?>"  id="gratis_popup_alert" style="display:<?php if($countryInfo==0) { echo 'block'; } else echo 'none'; ?>">
		<div class="modal-content pad25 brd brdrad10">
			<div id="search_user">
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					Currently our apps are not available for your country
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
			</div>
			
		</div>
	</div>
	
		<!--Keep modal fade -->
		<div id="keep_fade" class="wi_100 hei_100 dnone pos_fix zi998 top0 left0 bg_0_54"></div>
		<div class="popup_modal wi_960p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_company_searched">
			<div class="modal-content pad25 brd brdrad10 talc">
				<div id="searched">
					<?php if($aboutUsCount==1) { echo "https://www.qmatchup.com/beta/company/index.php/PublicAboutUs/companyAccount/".$getLinkid; } ?>
					
				</div>
				
			</div>
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 loading_image brd brdrad10"  id="loading_image">
			<div class="modal-content pad25 brd brdrad10 talc">
				<img src="<?php echo $path; ?>html/usercontent/images/loading_icon.png" />
				
			</div>
		</div>
		
		
		
			<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search">
		<div class="modal-content pad25 brd nobrdb talc brdrad5">
			
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Web Information</h3>
			<div class="marb20">
				<img src="../../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
				</div>
				
				
			</div>
			
				
					<div class="pad15 lgtgrey2_bg">
						
						<div class="pos_rel padrl10">
							<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							<input type="text" id="website" name="website" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Website Name">
						</div>
					</div>
					
					<div class="padrbl15 lgtgrey2_bg">
						
						<div class="pos_rel padrl10">
							<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							
							<input type="text" id="wlink" name="wlink" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company website">
						</div>
					</div>
					
					
					
					<div id="errorMsg" class="red_txt"></div>
				
		
			<div class="mart20">
				<input type="button" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submitWeb();" />
				<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				
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