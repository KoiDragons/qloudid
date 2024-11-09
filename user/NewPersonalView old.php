
<!DOCTYPE html>
<html lang="en">
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
		
		if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; }
	
	?>
	
	
	
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		 
	
	<script type="text/javascript">
     function changeDOB()
	 {
		 
		 $('#dobc').val(1);
	 }
	 
	 function changeGender()
	 {
		if($('#sexc').val()==0)
		{
			
		$('#sexc').val(1);
		
		}
		else
		{
		$('#sexc').val(0);	
		}
		 
	 }

	function sendInformation()
			{
				$("#error_msg_form").html('');
				if($("#sex").val()==0)
				{
					$("#error_msg_form").html('Please select gender');
					return false
				}
				var bg_url = $('#image-data').css('background-image');
				$('#image-data1').val(bg_url);
				  document.getElementById('save_indexing').submit();	 
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
		 
		
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
</script>	
	
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg ffamily_avenir" >
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			<?php if($data['user_id']==43) { ?>
					 <div class="fright marr0  ">
				<div class="top_menu fright  padt15 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows mart10 marb0">
					<li class="hidden-xs padr10 padt5">
						<a href="https://www.safeqloud.com/user/index.php/BoughtProducts"><span class="black_txt pred_txt_h ffamily_avenir">History</span></a>
					</li> 
					<li class="last first marr10i">
						<a href="https://www.safeqloud.com/user/index.php/NewPersonal/userInfo" class="lgn_hight_s1 fsz30" ><span class="fa fa-qrcode  " aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
			</div>
					 <?php } else { ?>
					 <div class="fright marr0  ">
				<div class="top_menu fright  padt15 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows mart10 marb0">
					<li class="hidden-xs padr10 padt5">
						<a href="https://www.safeqloud.com/user/index.php/BoughtProducts"><span class="black_txt pred_txt_h ffamily_avenir">History</span></a>
					</li> 
					 
				</ul>
			</div>
			</div>
			  <?php } ?>
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<?php if($data['user_id']==43) { ?>
					 <div class="fright marr0  ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="https://www.safeqloud.com/user/index.php/NewPersonal/userInfo" class="lgn_hight_s1 fsz30" ><span class="fa fa-qrcode  " aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
			</div>
					 <?php } ?>
                <div class="clear"></div>

            </div>
        </div>
		<div class="clear" id=""></div>
		
	<!-- /menu -->
	
	<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 
				<div class="wi_240p fleft pos_rel zi50">
												<div class="padrl10">

													<!-- Scroll menu -->
													<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
														<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new" id="scroll_menu">
														
														<div class="column_m padb0 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb padb20 marb10">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p talc  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																	<img src="<?php echo $imgs; ?>" height="100" width="100" class="brdrad5 padb0">
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="fsz30 ffamily_avenir"> <span><?php echo $resultOrg['first_name']; ?></span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
											<ul class="marr20 pad0">
											 <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="#" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey         black_txt panlyellow_bg_h  black_txt_a show_popup_modal" data-target="#gratis_msg">
                                    <span class="valm trn">Status Q<?php echo $profileStatus; ?></span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p    rotate45"></div>
                                 </a>
                              </li>
							  </ul>
							   <ul class="dblock marr20  padl10 fsz16">
							   <li class="dblock padrb10 brdb marb10">
                                 <a href="certificateList" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Exp detail</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>		
							  </ul>
											
											       <ul class="marr20 pad0">
							<?php if($resultOrg1['ssn']=="" || $resultOrg1['ssn']== null || $resultOrg1['ssn']== 0) { ?>					 
                              <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="#" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey         black_txt panlyellow_bg_h  black_txt_a show_popup_modal" data-target="#gratis_msg">
                                    <span class="valm trn">Block ID service</span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p    rotate45"></div>
                                 </a>
                              </li>
							  <?php } else { ?>
							   <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="../IDKapad" class=" <?php if($hijackedUser['num']==0) echo 'lgtgrey_bg '; else echo 'red_bg '; ?>  hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey         black_txt panlyellow_bg_h  black_txt_a" >
                                    <span class="valm trn">Block ID service</span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p    rotate45"></div>
                                 </a>
                              </li>
							  <?php } ?>
                           </ul>
                           <ul class="dblock marr20  padl10 fsz16">
							 					
							  
							   
							 <li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb tb_67cff7_bg brd_width_2 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">My profile</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
								 
										 
									 <li class="dblock padrb10 padt5">
                                 <a href="https://www.safeqloud.com/user/index.php/GetVerified/userAccount" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Security setting</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>				
									<li class="dblock padrb10 hidden">
                                 <a href="../StoreData/identificatorInfo" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Identificator</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>				 
									 <li class="dblock padrb10  ">
                                 <a href="identificatorsList" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Identificators</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>				
											</ul>
											
									 
								
								
															 
														 

														</div>
													</div>
													<div class="clear"></div>
												</div>
											</div>

											
				
				
						 					
					<!-- Center content -->
						<div class="wi_500p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xsi-padrl0 xs-pad0">
						
					
					<!-- Center content -->
				 
					 <form method="POST" action="../NewPersonal/verifyDetail" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
					<div class="marb25 wi_500p maxwi_100 padrl10  xs-padrl0">
						
									<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white  ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd borderr">
											<div class="cropped_image <?php if($row_summary ['passport_image']!=null) { echo "cropped_image_added"; } ?> borderr grey_brd5" style="background-image: <?php echo $value_a; ?>;" id="image-data" name="image-data"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
							 
								
							</div>
							 
									<div class="mart0 xs-marb20 marb35  xxs-talc talc   wi_500p maxwi_100 padrl10  xxs-padrl75"> <a href="#" class="black_txt fsz25  xs-fsz18 xxs-talc talc edit-text jain_drop_company trn " >Update your details.</a></div>
								 								
								 <div class="column_m container wi_500p maxwi_100  marb25   fsz14 dark_grey_txt">
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													 
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Country</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										<select class=" padt0 jain2 dblock black_txt ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd trans_bg"  disabled >
											<?php foreach($countryOpt as $category => $value ) {
										?>
										
										<option value="<?php echo $value['id']; ?>" <?php if($row_summary['country_of_residence']==$value['id']) echo 'selected'; ?> class="lgtgrey2_bg black_txt ffamily_avenir" disabled><?php echo $value['country_name']; ?></option>
										
										<?php } ?>
												 
											                  
											</select>
										
												</div>	 
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										 
										 
										
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt <?php if($userBankid==1 && $row_summary['grading_status']==2) { echo 'bg_green'; } else { echo 'bg_pink'; } ?>  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="<?php if($userBankid==1 && $row_summary['grading_status']==2) { echo 'fas fa-check'; } else { echo 'fas fa-times'; } ?> "></span></div>
																	</div>
											
												 
										<div class="fleft wi_60   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Name - <?php if($userBankid==1 && $row_summary['grading_status']==2) { echo '"Verified"'; } else { echo '"Not-verified"'; } ?> </span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
										<?php if(isset($_POST['l_name'])) { ?>
										<input type="text"    value="<?php echo $_POST['name']; echo ' '; echo $_POST['l_name']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php } else {  ?>
											<input type="text"   value="<?php echo $resultOrg['first_name']; echo ' '; echo $resultOrg['last_name']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php  } ?>			 
												
													
												</div>
												
												</div>
												<?php if($row_summary['grading_status']<2) { ?>
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="../StoreData/addUserName"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												<?php } ?>	
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
														<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
											
												 
										<div class="fleft wi_60   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Selected identificator(<?php if(empty($userIdentificatorVerification)) echo 'Unverified'; else { if($userIdentificatorVerification['is_visible']==0 || $userIdentificatorVerification['name_visible']==0 || $userIdentificatorVerification['idnumber_visible']==0 || $userIdentificatorVerification['issue_date_visible']==0 || $userIdentificatorVerification['expiry_date_visible']==0) echo 'Unverified'; else echo 'Verified'; }?> )</span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
										 
											<input type="text"   value="<?php if($identificatorInfo['identification_type']==1) echo 'ID'; else if($identificatorInfo['identification_type']==2) echo 'Driving Licence'; else if($identificatorInfo['identification_type']==3) echo 'Passport'; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										 	 
												
													
												</div>
												
												</div>
											 
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="#"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												 
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt <?php if($userBankid==1 && $row_summary['grading_status']==2) { echo 'bg_green'; } else { echo 'bg_pink'; } ?>  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="<?php if($userBankid==1 && $row_summary['grading_status']==2) { echo 'fas fa-check'; } else { echo 'fas fa-times'; } ?> "></span></div>
																	</div>
											
												 
										<div class="fleft wi_80   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh ffamily_avenir"><span class="edit-text padt0 jain2 ffamily_avenir dblock brdclr_lgtgrey2 fsz12">Social Security No - <?php if($userBankid==1 && $row_summary['grading_status']==2) { echo '"Verified"'; } else { echo '"Not-verified"'; } ?> </span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
										<?php if(isset($_POST['ssn'])) { ?>
										<input type="text"  name="ssn" id="ssn" value="<?php echo $_POST['ssn']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php } else { if($resultOrg1['ssn']=="" || $resultOrg1['ssn']== null || $resultOrg1['ssn']== '-') { ?>
											<a href="../StoreData/addUserSSN"><input type="text" name="ssn" id="ssn" placeholder="+ Add SSN " value="<?php if($resultOrg1['ssn']!="" || $resultOrg1['ssn']!= null) echo $resultOrg1['ssn']; else echo ""; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly></a>
											<?php } else { ?>
											<input type="text"  name="ssn" id="ssn" value="<?php echo $resultOrg1['ssn']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php } } ?>			 
													
												</div>
												
												</div>
												
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
											
											
											
											
										<input type="hidden" name="name" id="name" class="edit-text padt0 jain2 dblock pink_bg brdclr_lgtgrey2 fsz22 nobrd" value="<?php if(isset($_POST['name'])) { echo htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1'); } else echo $resultOrg['first_name']; ?>" />
										
									 <input type="hidden"  name="l_name" id="l_name" value="<?php if(isset($_POST['l_name'])) { echo htmlentities($_POST['l_name'],ENT_NOQUOTES, 'ISO-8859-1'); } else echo $resultOrg['last_name']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd">
									 
										  
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
												 
										<div class="fleft wi_80 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Email - "Verified"</span></a> 
										
										<div class="fleft wi_100 xs-mar0 "> 
										    
													 
									 
											<input type="text"   value="<?php if($resultOrg['email']!="" || $resultOrg['email']!= null) echo $resultOrg['email']; else echo "-"; ?> " class="edit-text padt0 jain2 wi_100  dblock ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd" readonly>
										 		 
													
												</div>
												
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
									
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a white_txt <?php if($resultOrg1['phone_verified']==1) { echo 'bg_green'; } else { echo 'bg_pink'; } ?>  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="<?php if($resultOrg1['phone_verified']==1) { echo 'fas fa-check'; } else { echo 'fas fa-times'; } ?> "></span></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Phone - <?php if($resultOrg1['phone_verified']==1) { echo '"Verified"'; } else { echo '"Not-verified"'; } ?></span></a> 
										
										<div class="fleft wi_100  xs-mar0 "> 
										    
													 
										<?php if(isset($_POST['uphno'])) { ?>
										<input type="text"  name="phone" id="phone" value="<?php echo $_POST['uphno']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php } else { if($resultOrg1['phone_number']=="" || $resultOrg1['phone_number']== null || $resultOrg1['phone_number']== '-') { ?>
											<a href="addPhoneNumber"><input type="text" name="phone" id="phone" placeholder="+ lagg till " value="<?php echo ""; ?>" class="edit-text padt0 jain2 dblock ffamily_avenir brdclr_lgtgrey2 fsz22 nobrd" readonly></a>
											<?php } else { ?>
											<input type="text"  name="phone" id="phone" value="<?php if($resultOrg1['phone_number']!="" || $resultOrg1['phone_number']!= null) echo $resultOrg1['phone_number']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php } } ?>			 
													
												</div>
												</div>
												<?php if($resultOrg1['phone_number']!="" || $resultOrg1['phone_number']!= null) { ?>
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="../StoreData/updatePhoneDetail"><span class="grey_txt_d4d4d5e8  fas fas fa-long-arrow-alt-right"></span></a>
													</div>
												<?php } ?>
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Date of birth</span></a> 
										
										<div class="fleft wi_100    xs-mar0 "> 
										 <input type="date" name="dob" id="dob" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" value="<?php echo date('Y-m-d',strtotime($resultOrg['dob_day'].'-'.$resultOrg['dob_month'].'-'.$resultOrg['dob_year'])); ?>" onchange="changeDOB();"/>  </div>
													 </div>
													 
												</div>
												
												
												<input type="hidden" id="dobc" name="dobc" value="0" />
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a bg_green white_txt" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><span class="fas fa-check"></span></div>
																	</div>
													
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Gender</span></a> 
										
										<div class="fleft wi_100    xs-mar0 "> 
										 <select name="sex" id="sex" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" onchange="changeGender();">
										  <option value="0" >Select</option>
										 <option value="1" <?php if($resultOrg['sex']==1) echo 'selected'; ?>>Male</option>
										 <option value="2" <?php if($resultOrg['sex']==2) echo 'selected'; ?>>Female</option>
										 
										</select>
										 </div>
													 </div>
													 
												</div>
												
												<input type="hidden" id="sexc" name="sexc" value="0" />
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-map-marker-alt"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Street address</span></a> 
										
										<div class="fleft wi_100   xs-mar0 "> 
										    
													 
										<?php if(isset($_POST['addrs'])) { ?>
										<input type="text"  name="addrs" id="addrs" value="<?php echo htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1').'-'.$_POST['pnumber']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd" readonly>
										<?php } else { if($resultOrg1['address']=="" || $resultOrg1['address']== null || $resultOrg1['address']== '-') { ?>
											<a href="updateAddressDetail"><input type="text" name="addrs" id="addrs" placeholder="+ lagg till " value="<?php echo ""; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly></a>
											<?php } else { ?>
											<input type="text"  name="addrs" id="addrs" value="<?php if($resultOrg1['address']!="" || $resultOrg1['address']!= null) echo $resultOrg1['address'].'-'.$resultOrg1['port_number']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php } } ?>			 
													
												</div>
												
												</div>
												
												<?php if($resultOrg1['address']!="" || $resultOrg1['address']!= null || $resultOrg1['address']!= '-') { ?>
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30 padb0   xs-padt10">
														 <a href="updateAddressDetail"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												<?php } ?>
												</div>
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0 hidden" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">1</div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Clearing number</span></a> 
										</div>
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										 <input type="text" name="clear_number" id="clear_number" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" value="<?php if(isset($_POST['clear_number'])) echo $_POST['clear_number']; else { if($resultOrg1['clearing_number']!="" || $resultOrg1['clearing_number']!= null) echo $resultOrg1['clearing_number']; else echo "-"; } ?>" />  </div>
													 
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
											
										<div class="white_bg mart0 brdb bg_fffbcc_a marb0 hidden" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-piggy-bank"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Bank account number</span></a> 
										
										<div class="fleft wi_100   xs-mar0 "> 
										    
													 
										<?php if(isset($_POST['bank_acc'])) { ?>
										<input type="text"  name="bank_acc" id="bank_acc" value="<?php echo $_POST['bank_acc']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php } else { if($resultOrg1['bank_account_number']=="" || $resultOrg1['bank_account_number']== null || $resultOrg1['bank_account_number']== '-') { ?>
											<a href="updateBankDetail"><input type="text" name="bank_acc" id="bank_acc" placeholder="+ lagg till " value="<?php echo ""; ?>" class="edit-text padt0 ffamily_avenir jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd" readonly></a>
											<?php } else { ?>
											<input type="text"  name="bank_acc" id="bank_acc" value="<?php if($resultOrg1['bank_account_number']!="" || $resultOrg1['bank_account_number']!= null) echo $resultOrg1['bank_account_number']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" readonly>
										<?php } } ?>			 
													
												</div>
												
												</div>
												
												<?php if($resultOrg1['bank_account_number']!="" || $resultOrg1['bank_account_number']!= null || $resultOrg1['bank_account_number']!= '-') { ?>
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30  padb0  xs-padt10 ">
														 <a href="updateBankDetail"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												<?php } ?>
													 
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
										
										<div class="white_bg mart0  bg_fffbcc_a marb0" style=""> 
										<div class="container pad20 xs-pad10 xs-padt10 xs-padb10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><i class="fas fa-piggy-bank"></i></div>
																	</div>
													
												 
										<div class="fleft wi_60  sm-wi_60 xsip-wi_60 xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 fsz12">Bank</span></a> 
										
										<div class="fleft wi_100    xs-mar0 "> 
										 <input type="text" name="langu" id="langu" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz22 nobrd ffamily_avenir" value="<?php if(isset($_POST['langu'])) echo $_POST['langu']; else { if($resultOrg1['language']!="" || $resultOrg1['language']!= null) echo $resultOrg1['language']; else echo "-"; } ?>" />  </div>
													 </div>
													<?php if($resultOrg1['bank_account_number']!="" || $resultOrg1['bank_account_number']!= null || $resultOrg1['bank_account_number']!= '-') { ?>
												<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40 xs-fsz30  padb0  xs-padt10 ">
														 <a href="updateBankDetail"><span class="grey_txt_d4d4d5e8  fas fa-long-arrow-alt-right"></span></a>
													</div>
												<?php } ?> 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
										
											 	

									 <input type="hidden" id="fln" name="fln" value="<?php if(isset($_POST['fln'])) echo $_POST['fln']; else echo 0; ?>" />
									
									<input type="hidden" id="fnum" name="fnum" value="<?php if(isset($_POST['fnum'])) echo $_POST['fnum']; else echo 0; ?>" />
									<input type="hidden" id="ecode" name="ecode" value="<?php if(isset($_POST['ecode'])) echo $_POST['ecode']; else echo 0; ?>" />
									<input type="hidden" id="hname" name="hname" value="<?php if(isset($_POST['hname'])) echo $_POST['hname']; else echo 0; ?>" />
									<input type="hidden" name="flname" id="flname"  value="<?php if(isset($_POST['addrs'])) { echo $_POST['flname']; } else { if($resultOrg1['name_on_door']!="" || $resultOrg1['name_on_door']!= null) echo $resultOrg1['name_on_door']; else echo ""; } ?>" />
									 
									<input type="hidden" name="entry_code" id="entry_code"  value="<?php if(isset($_POST['addrs'])) { echo $_POST['entry_code']; } else { if($resultOrg1['entry_code']!="" || $resultOrg1['entry_code']!= null) echo $resultOrg1['entry_code']; else echo ""; } ?>" />
									<input type="hidden" name="addrs1" id="addrs1" value="<?php if(isset($_POST['addrs'])) echo htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1'); else echo 0; ?>" />
									<input type="hidden" name="dzip" id="dzip" value="<?php if(isset($_POST['dzip'])) echo $_POST['dzip']; else echo 0; ?>" />
									<input type="hidden" name="dcity" id="dcity" value="<?php if(isset($_POST['dcity'])) echo htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1'); else echo 0; ?>" />
									 <input type="hidden" name="passport-country" id="passport-country" value="<?php echo $row_summary['country_name']; ?>" />
									<input type="hidden" name="general" id="general" value="1" />
									<input type="hidden" name="fn" id="fn" value="<?php if(isset($_POST['fn'])) echo $_POST['fn']; else echo 0; ?>" />
									<input type="hidden" name="ln" id="ln" value="<?php if(isset($_POST['ln'])) echo $_POST['ln']; else echo 0; ?>" />
									<input type="hidden" name="post" id="post" value="<?php if(isset($_POST['adr'])) echo 1; else echo 0; ?>" />
									<input type="hidden" name="byaddress" id="byaddress" value="<?php if(isset($_POST['adr'])) echo 1; else echo 0; ?>" />
									<input type="hidden" name="iaddress" id="iaddress" value="<?php if(isset($_POST['iaddress'])) echo htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1'); else echo 0; ?>" />
									<input type="hidden" name="i_port_number" id="i_port_number" value="<?php if(isset($_POST['i_port_number'])) echo $_POST['i_port_number']; else echo 0; ?>" />
									<input type="hidden" name="izip" id="izip" value="<?php if(isset($_POST['izip'])) echo $_POST['izip']; else echo 0; ?>" />
									<input type="hidden" name="icity" id="icity" value="<?php if(isset($_POST['icity'])) echo htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1'); else echo 0; ?>" />
									<input type="hidden" name="zp" id="zp" value="<?php if(isset($_POST['zp'])) echo $_POST['zp']; else echo 0; ?>" />
									<input type="hidden" name="prt" id="prt" value="<?php if(isset($_POST['prt'])) echo $_POST['prt']; else echo 0; ?>" />
									<input type="hidden" name="cty" id="cty" value="<?php if(isset($_POST['cty'])) echo $_POST['cty']; else echo 0; ?>" />
									<input type="hidden" name="same_invoice" id="same_invoice" value="<?php if(isset($_POST['same_invoice'])) echo $_POST['same_invoice']; else echo 0; ?>" />
									<input type="hidden" name="iadr" id="idr" value="<?php if(isset($_POST['iadr'])) echo $_POST['iadr']; else echo 0; ?>" />
									<input type="hidden" name="same_name" id="same_name" value="<?php if(isset($_POST['same_name'])) echo $_POST['same_name']; else echo 0; ?>" />
									<input type="hidden" name="izp" id="izp" value="<?php if(isset($_POST['izp'])) echo $_POST['izp']; else echo 0; ?>" />
									<input type="hidden" name="iprt" id="iprt" value="<?php if(isset($_POST['iprt'])) echo $_POST['iprt']; else echo 0; ?>" />
									<input type="hidden" name="icty" id="icty" value="<?php if(isset($_POST['icty'])) echo $_POST['icty']; else echo 0; ?>" />
									
									<input type="hidden" name="bc" id="bc" value="<?php if(isset($_POST['bc'])) echo $_POST['bc']; else echo 0; ?>" />
									<input type="hidden" name="cn" id="cn" value="<?php if(isset($_POST['cn'])) echo $_POST['cn']; else echo 0; ?>" />
									<input type="hidden" name="bn" id="bn" value="<?php if(isset($_POST['bn'])) echo $_POST['bn']; else echo 0; ?>" />
									<input type="hidden" name="byphone" id="byphone" value="<?php echo $data['byPhone']; ?>" />
									<input type="hidden" name="byssn" id="byssn" value="<?php echo $data['bySSN']; ?>" />
									<input type="hidden" name="bank" id="bank" value="<?php echo $data['byBank']; ?>" />
									<input type="hidden" name="c_phone" id="c_phone" value="<?php echo $resultOrg1['country_phone'];?>" />
									<input type="hidden" name="pnumber" id="pnumber"  value="<?php if(isset($_POST['pnumber'])) { echo $_POST['pnumber']; } else { if($resultOrg1['port_number']!="" || $resultOrg1['port_number']!= null) echo $resultOrg1['port_number']; else echo "-"; } ?>" />
									<!--<input type="hidden" name="latitude" id="latitude"  value="<?php //if(isset($_POST['addrs'])) { echo $_POST['latit']; } else { if($resultOrg1['latitude']!="" || $resultOrg1['latitude']!= null) echo $resultOrg1['latitude']; else echo ""; } ?>" />
									<input type="hidden" name="longitude" id="longitude"  value="<?php //if(isset($_POST['addrs'])) { echo $_POST['longi']; } else { if($resultOrg1['longitude']!="" || $resultOrg1['longitude']!= null) echo $resultOrg1['longitude']; else echo ""; } ?>" />-->
									<input type="hidden" name="cntry" id="cntry"  value="<?php echo $row_summary['country_name']; ?>" />
																		
									<div id="error_msg_form" class="red_txt fsz20"> </div>
									 </form>
									<div class="talc marb40 mart20 "> <a href="#" onclick="sendInformation();"><input type="button" value="Update" class="forword minhei_55p t_67cff7_bg fsz18 ffamily_avenir"  ></a>
										
									
									</div>
									</div>
								</div>
								
							 
							
							
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
		
		 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	<!-- /.modal -->
	 <div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow white_bg" id="gratis_msg">
		 
	
	<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="padt25 marb0  brdradtr10">
				 
				<img src="../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_150p">
			 
			</div>
			<h2 class="marb0 padrl10 padt20 bold fsz24 black_txt">Identification</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20 padt10 padb20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 black_txt"> In order to report ID hijacked we need your social security number for identification purposes.</span>
				</div>
				
				
			</div>	
		<div class="on_clmn padb20 padrl20">
				<a href="../StoreData/addUserSSN"  class="padt15 trn wi_300p maxwi_100  hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold"  >Add</a>
				
			</div>
			 <div class="padb20">
			<a href="#" class="talc trn close_popup_modal" >Cancel</a>
			</div>
	</div>
	
	</div>
	
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
		</div>
	</div>
		
	 
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
</body>
</html>