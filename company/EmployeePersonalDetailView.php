<!doctype html>
<html>
	<?php
		$path1 = $path."html/usercontent/images/";
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
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
		
		 
	</head>
	
	<body class="white_bg ffamily_avenir" >
		
		<!-- HEADER -->
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
									<a href="https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
                <div class="clear"></div>

            </div>
        </div>
		<div class="clear" id=""></div>
		
		 
		<div class="column_m pos_rel">
		 
			<div class="column_m talc lgn_hight_22 fsz16 mart20 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						 
						
							<div class="padb20  talc padt20">
										<div class="padrl0 ">
											<img src="<?php echo '../../'.$imgs; ?>" width="160" height="160" class="white_brd borderr">
											
										</div>
									</div>

						<p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 red_ff2828_txt bold">VD</p>
						<h1 class="lgn_hight_35 padt10 talc fsz35 black_txt padb0"><?php echo $resultOrg['name']; ?> </h1>
						<p class="lgn_hight_16 padt10 talc fsz20   padb10 marb20 xs-padb5 grey_new_txt"><?php echo $resultOrg1['address']; ?> </p>
					 
						 <div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
                                            <a href="../../employeeAccount/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir">Work</a>
                                            <a href="#" class="dinlblck mar5 padrl30     bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Personal</a>
                                              
                                             <a href="../../employeeServiceAccount/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" onclick="changeHeader();" >Services</a>  

                                        </div>

  
									
								  
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
																	border-radius: 10%;">S</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Social security number </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php if($resultOrg['ssn']!="" || $resultOrg['ssn']!= null) echo $resultOrg['ssn']; else echo "-"; ?>" readonly />
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
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Email </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php echo $resultOrg['email']; ?>" readonly />
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
																	border-radius: 10%;">P</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Phone </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php if($resultOrg['phone_number']!="" || $resultOrg['phone_number']!= null) echo '+'.$resultOrg1['country_code'].'-'.$resultOrg['phone_number']; else echo "-"; ?>" readonly />
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
																	border-radius: 10%;">D</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Date of birth </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php  echo $resultOrg['dob_day'].'-'.$resultOrg['dob_month'].'-'.$resultOrg['dob_year']; ?>" readonly />
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
																	border-radius: 10%;">G</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Gender </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php if($resultOrg['sex']==1) echo 'Male'; else echo "Female"; ?>" readonly />
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
																	border-radius: 10%;">A</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Address </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php if($resultOrg['address']!="" || $resultOrg['address']!= null) echo $resultOrg['address']; else echo "-"; ?>" readonly />
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
																	border-radius: 10%;">B</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Bank </span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir" value="<?php if($resultOrg['language']!="" || $resultOrg['language']!= null) echo  $resultOrg['language']; else echo "-"; ?>" readonly />
										 </div>
									 
												</div>
												 
												</div>
												
												
												
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
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup">
			<div class="modal-content pad25 nobrdb talc brdrad5">
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt">Aktivera din inbjudan</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">Använd koden som du fått via mejl för att aktivera inbjudan. När du fyller i koden så godkänner per automatik att motpart är ansluten till dig.  </span>
						</div>
						
						
					</div>
					
					<div class="padb0">
						
						<div class="pos_rel ">
							
							<input type="text" id="unique_id" name="unique_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Add the code">
						</div>
					</div>
					<div class="mart20">
						<input type="button" value="aktivera" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_unique();">
						<input type="hidden" id="indexing_save_unique" name="indexing_save_unique">
						
					</div>
					
					
					
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
					<form action="../ChangePassword/changePassword" method="POST" id="loginform">
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
		
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>

	</body>
	
</html>