<!doctype html>
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
	$path1 = "../../html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

<html>
	
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		
		
		<script>
				function updateAdmin(id,link)
			{
				var send_data = {};
				 send_data.id=id; 
				if($(link).hasClass('checked'))
				{
					send_data.updateR=0; 
					$('#'+id).addClass('hidden');
				}
				else
				{ 
					send_data.updateR=1;
					$('#'+id).removeClass('hidden');	
				}
				$.ajax({
					url: '../updateAdminStatus/<?php echo $data['cid']; ?>',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data){
					
					
				})
				.fail(function(){})
				.always(function(){});
				
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
			 function checkFlag() {
                if ($(".popupShow").hasClass('active')) {
                    $(".popupShow").removeClass('active')
                    $(".popupShow").attr('style', 'display:none');
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
		
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../serviceInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../serviceInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		<div class="column_m pos_rel">
			 
			<!-- CONTENT -->
				<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "   >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Cleaners</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" > Please update your if cleaner work as inspector </a></div>
					 
					 
                        <div class="padb20 xxs-padb0 ">
                            

                            <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt">
                                <div class="container ">
                                    <div class="">

                                        <div class="tab-header mart10 padb10 brdb_new tb_67cff7_bg xs-talc">
                                            <a href="#" class="dinlblck mar5 padrl30_a  padrl10   blue_67cff7_brd_h blue_67cff7_brd_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Cleaners</a>
                                             
                                           

                                        </div>

                                        <div class="tab_container">
					 
							 
							 
							 
							 <div class="tab_content active" id="utab_Popular" style="display: block;">
									
									
									
									 
										<div id='allRequest'>
											<?php $i=0;
												
												foreach($employeesDetail as $category => $value) 
												{
													
													
												?> 
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  hidden-xs"> 
													<div class="wi_50p   hei_50p  "><img src="../../../<?php echo $value['img']; ?>" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>
																	</div>
													
													<div class="fleft xs-wi_50 wi_50  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Cleaner</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt"><?php echo $value['name']; ?></span>  </div>
													 
													<div class="fright wi_10 padt10 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz25  padb0  ">
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($value['is_inspector']==1) echo 'checked'; else echo ''; ?>" onclick="updateAdmin(<?php echo $value['id']; ?>,this);">
																<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No" >
															</div>
													</div>
													
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												
										<?php } ?>
										</div>
										
								 <div class="clear"></div>
									 
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
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	</div>
	 
		<div class="hei_80p hidden-xs"></div>
		
	 
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
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