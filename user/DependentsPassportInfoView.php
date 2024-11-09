
<!DOCTYPE html>
<html lang="en">
	<?php $path1 = $path."html/usercontent/images/"; 
	
	if($identificatorDetail ['front_image_path']!=null) { $filename="../estorecss/".$identificatorDetail ['front_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$identificatorDetail ['front_image_path'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; 
	
	if($identificatorDetail ['back_image_path']!=null) { $filename="../estorecss/".$identificatorDetail ['back_image_path'].".txt"; if (file_exists($filename)) { $value_b=file_get_contents("../estorecss/".$identificatorDetail ['back_image_path'].".txt"); $value_b=str_replace('"','',$value_b); } else { $value_b="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_b="../../../../html/usercontent/images/default-profile-pic.jpg";
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
		
		if($identificatorDetail ['front_image_path']!=null) { $filename="../estorecss/".$identificatorDetail ['front_image_path'].".txt";   if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$identificatorDetail ['front_image_path'].".txt");   $imgsData=$value_a; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs1="../../../html/usercontent/images/default-profile-pic.jpg"; $imgsData=''; } }  else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs1="../../../html/usercontent/images/default-profile-pic.jpg"; $imgsData=''; }
		
		
		if($identificatorDetail ['back_image_path']!=null) { $filename="../estorecss/".$identificatorDetail ['back_image_path'].".txt"; if (file_exists($filename)) { $value_b=file_get_contents("../estorecss/".$identificatorDetail ['back_image_path'].".txt"); $imgsData1=$value_b; } else { $value_b="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; $imgsData1=''; } }  else { $value_b="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; $imgsData1=''; }
	?>
	<head>
		<meta charset="utf-8">
			<meta name="viewport" content="width=device-width,initial-scale=1">
				<title>Qmatchup</title>
				<!-- Styles -->
				<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">

					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />

					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
					<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
					<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
						<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
							
							<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
						<script>
								submitFlag=1;
								var issueM="<?php echo date('m'); ?>";
								var issueY="<?php echo date('Y'); ?>";
								var expiryM="<?php echo date('m'); ?>";
								var expiryY="<?php echo date('Y'); ?>";
								
		function updateMonth(id)
         {
         	if(id<issueY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#issue_month").html(allDays);							
         	}
         	else
         	{
         	for(i=1;i<=issueM;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#issue_month").html(allDays);							
         	}
         }
         function updateExpiryMonth(id)
         {
         	if(id>expiryY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#expiry_month").html(allDays);							
         	}
         	else
         	{
         	for(i=issueM;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#expiry_month").html(allDays);							
         	}
         }
        
										function changeClass(link)
										{

										$(".class-toggler").removeClass('active');
										$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
										$(link).closest('.fa-caret-down').removeClass('hidden');
										}
										function checkEmail(id) {

										var email = document.getElementById(id);
										var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

										if (!filter.test(email.value)) {
										alert('Please provide a valid email address');
										email.focus();
										return false;
										}
										else
										return true; 


										}
										
										 
								 function sendInformation() {
             $("#error_msg_form").html('');
         
             if ($('#image-data1').val() == "" || $('#image-data1').val() == null) {
         
                 $("#error_msg_form").html('Please select front image');
                 submitFlag = 0;
                 return false;
             }
         
             if ($('#image-data3').val() == "" || $('#image-data3').val() == null) {
         
                 $("#error_msg_form").html('Please select back image');
                 submitFlag = 0;
                 return false;
             }
             if ($("#id_number").val() == null || $("#id_number").val() == "") {
         
                 $("#error_msg_form").html('Please enter passport number');
                 submitFlag = 0;
                 return false;
             }
              
             var send_data = {};
             send_data.variation_id = $('#id_number').val();
             $.ajax({
                 type: "POST",
                 url: "../checkUsedIdentificator/<?php echo $data['did']; ?>",
                 data: send_data,
                 dataType: "text",
                 contentType: "application/x-www-form-urlencoded;charset=utf-8",
                 success: function(data1) {
         
                     if (data1 == 0) {
                         submitFlag = 1;
                     } else {
         
                         window.location.href = "https://www.safeqloud.com/user/index.php/Dependents/requestGuardian/" + data1;
         
                         submitFlag = 0;
         
                         return false;
                     }
                 }
             });
         
             if (submitFlag == 1) {
                 document.getElementById('save_indexing').submit();
             }  
         }
function readURL(input) {
	 
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
			 
            $('#image-data')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data1').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }

	 
} 

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
            $('#image-data2')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data3').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }

	 
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

								<body class="white_bg">

								 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../childInformation/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../childInformation/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div> 
								 <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn ffamily_avenir" >Dependent</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please verify passport detail of the dependent.</a></div>
					<!-- Center content -->
					 
														<form action="../updateDependentPassport/<?php echo $data['did']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
															<div class="marb0 padtrl0">
																 
											<div class="marb25  ">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php echo $imgsData; ?>" class="hidden-image-data" />
										 
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: url(<?php echo $value_a; ?>);" id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								
								 
							</div>
						</div>
						
						 
								 
								<div class="marb25  ">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data3" id="image-data3" value="<?php echo $imgsData1; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: url(<?php echo $value_b; ?>);" id="image-data2" name="image-data2"></div>
											 
										</div>
									</div>
								
								 
							</div>
						</div>	 
						
						<div class="on_clmn mart10 xxs-mart10">
									<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 dflex alit_c">
											
											<label class="forword ">
												Front Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
										</div>
										<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 dflex alit_c">
											
											<label class="forword ">
												Back Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL2(this);">
											</label>
											</div></div>
											
											</div>
											</div>
											
										</div>
										<div class="clear"></div>
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                        <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                           <!--<div class="clear hidden-xs"></div>-->
                           <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                              <div class="fleft wi_100  xs-mar0 xs-padt10">
                                 <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Passport</span>
                                 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please enter passport number?</span> 
                              </div>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
											
																 			
																	<div class="on_clmn ">
																
											
												
																	<div class="pos_rel">

																		<input type="text" name="id_number" id="id_number" placeholder="Passport number"  class=" default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt  " value="<?php echo $identificatorDetail['passport_number']; ?>" >

																		</div>
																
																	</div>
		<div class="clear"></div>
                     <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                        <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                           <!--<div class="clear hidden-xs"></div>-->
                           <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                              <div class="fleft wi_100  xs-mar0 xs-padt10">
                                 <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Issue date</span>
                                 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please select issue date for passport</span> 
                              </div>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
					 
					 <div class="on_clmn ">
                        <div class="thr_clmn  wi_50 "  >
                           <div class="pos_rel">
                              <select id="issue_year" name="issue_year" class=" default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" onchange='updateMonth(this.value);' >
                                 <?php $date=date('Y'); $year=date('Y')-12;  for($i=$date; $i>=$year;$i--) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($identificatorDetail['issue_year']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="thr_clmn wi_50 padl20">
                           <div class="pos_rel">
                              <select id="issue_month" name="issue_month" class=" default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"  >
                                 <?php $dateM=date('m'); if($identificatorDetail['issue_year']==$date){ for($i=1; $i<=date('m');$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($identificatorDetail['issue_month']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
                                 <?php } } else { for($i=1; $i<=12;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($identificatorDetail['issue_month']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
								  <?php } } ?>
                              </select>
                           </div>
                        </div>
                     </div>
					 
                     						
					 <div class="clear"></div>
                     <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                        <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                           <!--<div class="clear hidden-xs"></div>-->
                           <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                              <div class="fleft wi_100  xs-mar0 xs-padt10">
                                 <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Expiry date</span>
                                 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please select expiry date for passport</span> 
                              </div>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
                     <div class="on_clmn ">
                        <div class="thr_clmn  wi_50 "  >
                           <div class="pos_rel">
                              <select id="expiry_year" name="expiry_year" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"  onchange='updateExpiryMonth(this.value);'>
                                 <?php $year=$date+12; for($i=$date; $i<=$year;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($identificatorDetail['expiry_year']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="thr_clmn wi_50 padl20">
                           <div class="pos_rel">
                              <select id="expiry_month" name="expiry_month" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"  >
                                 <?php if($identificatorDetail['expiry_year']==$date){ for($i=$dateM; $i<=12;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($identificatorDetail['expiry_month']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
                                 <?php } } else { for($i=1; $i<=12;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($identificatorDetail['expiry_month']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
								  <?php } } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                    						
														
																			</div>

																			<div id="error_msg_form" class="red_txt fsz20 ffamily_avenir"></div>
												<div class="clear"></div>														</div>
											<div class="talc padtb20  mart35"> 
										 
								<button type="button" name="Next" class="forword minhei_55p fsz18 t_67cff7_bg ffamily_avenir" onclick="sendInformation();">Next</button>
											 
										
									
									</div>
																									




																									</div>
																									
																								
																							</form>
																						</div>
																					 
																					<div id="popup_fade" class="opa0 opa55_a black_bg"></div>	
																				</div>
																				 
																				<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
																					<div class="modal-content pad25  nobrdb talc brdrad5 ">


																						<div id="" class="fsz20"> </div>

																						<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
																					</div>
																				</div>
																				<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
																				<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />

																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script> 
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script> 
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script> 
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/s/vex.combined.min.js"></script>
																				<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_image.js"></script><script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>


																			</body>
																		</html>