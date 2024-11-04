<!doctype html>
<?php
		$path1 = "../../html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
	if($userSelectedIdentificatorDetail ['front_image_path']!=null) { $filename="../estorecss/".$userSelectedIdentificatorDetail ['front_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$userSelectedIdentificatorDetail ['front_image_path'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; 
	
	if($userSelectedIdentificatorDetail ['back_image_path']!=null) { $filename="../estorecss/".$userSelectedIdentificatorDetail ['back_image_path'].".txt"; if (file_exists($filename)) { $value_b=file_get_contents("../estorecss/".$userSelectedIdentificatorDetail ['back_image_path'].".txt"); $value_b=str_replace('"','',$value_b); } else { $value_b="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_b="../../usercontent/images/default-profile-pic.jpg";
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
		
		if($userSelectedIdentificatorDetail ['front_image_path']!=null) { $filename="../estorecss/".$userSelectedIdentificatorDetail ['front_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$userSelectedIdentificatorDetail ['front_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs1 = base64_to_jpeg( $value_a, '../estorecss/tmp'.$userSelectedIdentificatorDetail['front_image_path'].'.jpg' );  $imgs1='../../../../../'.$imgs1; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs1="../../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg"; $imgs1="../../../html/usercontent/images/default-profile-pic.jpg"; }
		
		
		if($userSelectedIdentificatorDetail ['back_image_path']!=null) { $filename="../estorecss/".$userSelectedIdentificatorDetail ['back_image_path'].".txt"; if (file_exists($filename)) { $value_b=file_get_contents("../estorecss/".$userSelectedIdentificatorDetail ['back_image_path'].".txt"); $value_b=str_replace('"','',$value_b); $imgs = base64_to_jpeg( $value_b, '../estorecss/tmp'.$userSelectedIdentificatorDetail['back_image_path'].'.jpg' );  $imgs='../../../../../'.$imgs; } else { $value_b="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_b="../../../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
	?>
	
<html class="home">
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_time.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script>
	 
	function updatePicVisible(id)
		 {
			picVisible=1; 
		 }
	  	 	
	function updateIssueDateVisible(id)
		 {
			issueDateVisible=1; 
		 }
										 
		function updateExpiryDateVisible(id)
		 {
			expiryDateVisible=1; 
		 }								

	function updateNumberVisible(id)
		 {
			idnumberVisible=1; 
		 }
		 
	function updateNameVisible(id)
		 {
			nameVisible=1; 
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
		function submitform()
		{
			$('#errorMsg1').html(''); 		
			if($('#is_visible').val()==0)
			{
			$('#errorMsg1').html('please select if pictures are clearly visible or not!!');
				return false;
			}
			document.getElementById("save_indexing").submit();
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
</head>

	<body class="white_bg ffamily_avenir">
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
				 
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn">Verify</h1>
									</div>
								 
							<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please verify identificator info.</a></div>
				<div class="dflex fxwrap_w alit_s padt0 talc">
				
				 <div class="wi_50 xs-wi_100 maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						 
						
							 
									
								  
							<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container padtb15 padrl10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">C</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Country</span>
									 
										<span> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php echo $row_summary ['country_name']; ?>" readonly />
										 </span>
									 
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>	
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container padtb15 padrl10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
												<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($userSelectedIdentificatorDetail['id_detail'],0,1); ?></div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14"><?php echo $userSelectedIdentificatorDetail['id_detail']; ?></span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php echo $userSelectedIdentificatorDetail['identity_number']; ?>" readonly />
										 </div>
									 
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>	
										
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container padtb15 padrl10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">N</div>
																	</div>
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Name </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php if($resultOrg['name']!="" || $resultOrg['name']!= null) echo $resultOrg['name']; else echo "-"; ?>" readonly />
										 </div>
									 
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>	
							
							<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container padtb15 padrl10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">E</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Expiry date </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php echo $userSelectedIdentificatorDetail['expiry_month'].'/'.$userSelectedIdentificatorDetail['expiry_year']; ?>" readonly />
										 </div>
									 
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>	
							<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container padtb15 padrl10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">I</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Issue date </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php echo $userSelectedIdentificatorDetail['issue_month'].'/'.$userSelectedIdentificatorDetail['issue_year']; ?>" readonly />
										 </div>
									 
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>	
							
							 
							<div class="clear"></div>
						</div>
					
					<div class="wi_50 xs-wi_100 maxwi_100 pos_rel zi5 marrla pad10 brdl mart40 xs-mart0 xs-pad0">
					
							<form action="../../../verifySignature/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
							
							<div class="marb25">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl70">
								 <img ci-src="<?php echo $imgs1;?>?w=200&h=200&org_if_sml=1" ci-sizes="{ sm: { w: 200, h: 200 } }"  width="200px;" height="200px;"/>
								 </div>
								 </div>
								 
								 <div class="marb25">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl70">
								 <img ci-src="<?php echo $imgs;?>?w=200&h=200&org_if_sml=1" ci-sizes="{ sm: { w: 200, h: 200 } }"  width="200px;" height="200px;"/>
								 </div>
								 </div>
							
							
								 <div class="marb25 hidden">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  ">
											<div class="cropped_image   grey_brd5  " style="background-image: <?php echo $value_a; ?>;" id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								
								 
							</div>
						</div>
						
						
						<div class="marb25 hidden">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  ">
											<div class="cropped_image   grey_brd5  " style="background-image: <?php echo $value_b; ?>;" id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								
								 
							</div>
						</div>
								 
								<div class="marb0 padtrl0">		 
							  <div class="on_clmn   mart10  ">
									<div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If picture are clearly visible to you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
											<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updatePicVisible(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
														 
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type='hidden' id="is_visible" name="is_visible" value="2" />
										
										 
											 
											</div>
										<div class="hidden" id="visibleTrue">
											<div class="on_clmn   mart20  ">
											  
											  
											  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If name is clearly visible to you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
											<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateNameVisible(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
														
													</div>
											</div>
											</div>
											 
										


										</div>
										<input type='hidden' id="name_visible" name="name_visible"  value="2"/>
											  
											  
										 
												</div> 
												
												<div class="on_clmn   mart20  ">
											  
											  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If number is clearly visible to you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
											<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateNumberVisible(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
														
													</div>
											</div>
											</div>
											 
										
										</div>
										<input type='hidden' id="idnumber_visible" name="idnumber_visible"  value="2"/>
											  
										 
												 
												</div>
											 
											 <div class="on_clmn   mart20  ">
											   <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If issue date is clearly visible to you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateIssueDateVisible(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
											
											
													 
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type='hidden' id="issue_date_visible" name="issue_date_visible"  value="2"/>
											  
										 
												 
												</div> 
											 
											  <div class="on_clmn   mart20  ">
											   <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If expiry date is clearly visible to you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
											<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateExpiryDateVisible(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
														 
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type='hidden' id="expiry_date_visible" name="expiry_date_visible"  value="2"/>
										 
												 
												</div> 
											 
											</div>
									 <input type="hidden" id="identity_id" name="identity_id" value="<?php echo $userSelectedIdentificatorDetail['id']; ?>"
						
						   <div class="clear"></div>
	 
	 				 


	 	 

										 
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20  ffamily_avenir mart35" id="submitButton"> <a href="#" onclick="submitform();"><button type="button" value="Get Details" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Get Details</button></a> </div>
					 		
						</div>
						</div>
						</div>
					</div> 
		 
	</div>
</div>
<script src="https://cdn.scaleflex.it/plugins/js-cloudimage-responsive/4.6.5/js-cloudimage-responsive.min.js"></script>
<script>
	 
    const ciResponsive = new window.CIResponsive({
      token: 'ajfkzjyzgp'
   
    });
 
</script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>

	</body>
</html>
