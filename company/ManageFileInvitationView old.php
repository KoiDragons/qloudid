<!doctype html>
<?php 
	$path1 = "../../../usercontent/images/";
?>

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
			function submitform1()
			{
			
			var inps = document.getElementsByName('maped[]');
				var inp=[];
				var i=0;
				for (var i = 0; i <inps.length; i++) {
					var inp1=inps[i];
					inp[i]=inp1.value;
				}
				var recipientsArray = inp.sort(); 
				
				var reportRecipientsDuplicate = [];
				for (var i = 0; i < recipientsArray.length - 1; i++) {
					if (recipientsArray[i + 1] == recipientsArray[i]) {
						$("#popup_fade").addClass('active');
						$("#popup_fade").attr('style','display:block;');
						$("#gratis_popup_error").addClass('active');
						$("#gratis_popup_error").attr('style','display:block;');
						$("#connect_id").html("please select unique header values");
						return false;
					}
				}
			
			
			
				inps = document.getElementsByName('mapping[]');
				
				for (i = 0; i <inps.length; i++) {
					var inp1=inps[i];
					inp[i]=inp1.value;
				}
				var recipientsArray = inp.sort(); 
				
				var reportRecipientsDuplicate = [];
				for (var i = 0; i < recipientsArray.length - 1; i++) {
					if (recipientsArray[i + 1] == recipientsArray[i]) {
						$("#popup_fade").addClass('active');
						$("#popup_fade").attr('style','display:block;');
						$("#gratis_popup_error").addClass('active');
						$("#gratis_popup_error").attr('style','display:block;');
						$("#connect_id").html("please select unique mapping values");
						return false;
					}
				}
				
				
				
				
				
				
				if(jQuery.inArray("3", inp) != -1)
				{
					document.getElementById('save_indexing').submit();
				}
				else
				{
					$("#popup_fade").addClass('active');
					$("#popup_fade").attr('style','display:block;');
					$("#gratis_popup_error").addClass('active');
					$("#gratis_popup_error").attr('style','display:block;');
					$("#connect_id").html("please choose email");
					return false;
				}
			}
		</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
			
									 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../InviteEmployee/selectMethod/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
      <div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../InviteEmployee/selectMethod/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear" id=""></div>
	
		
		<div class="column_m pos_rel">
			 
			
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart0 mart40 marb0" id="loginBank">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart0 xs-mart0">
					<div class="padb20 xxs-padb0 ">	
							
									<h1 class="marb0  xxs-talc talc fsz100 xs-fsz45 padb10 black_txt trn ffamily_avenir"  >Connect</h1>
									</div>
									<!-- Logo -->
									<div class="martb20  xxs-talc talc padb10 brdb_red_ff2828 brd_width_2"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please select header and mapping to invite employees </a></div>	
						<div class="dflex xs-fxwrap_w alit_c">
							
								<div class="wi_40 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 talc">
									<form action="../inviteEmployees/<?php echo $data['cid']; ?>" method="POST" name="save_indexing" id="save_indexing">
									<div class="container  white_bg fsz14 dark_grey_txt ">
										<?php 
											$i=0;
											for($j=0; $j<count($file); $j++)
											{
											?>		 		  
											<div class="column_m">
												<ul class="quizfields">					
													<li class="first last">
														<!--  showing companies list -->
														<div class="txlabel">Header</div>
														<div class="txtfield">
															<select class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" name="maped[]" id="maped[]">
																<option value="">Select</option>
																<?php 
																	$i=0;
																	foreach($file as $sep_value)
																	{
																	?>
																	<option value="<?php echo $i; ?>"><?php echo $sep_value; ?></option>
																	
																	
																<?php $i++; } ?>
															</select>
														</div>
													</li>
												</ul>
											</div>
											<div class="padtb15 clear">
												<div class="line"></div>
											</div>
										<?php } ?>
										
										
										
									</div>
									
								</div>
								
								<div class="wi_60 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb0 padt20  marr30 xs-marr0 xs-padl0 talc padl80 xs-padr0">
									
									<div class="container  white_bg fsz14 dark_grey_txt ">
										
										
										
										<div class="padtb15 clear">
										</div>					
										<?php 
											$i=0;
											for($j=0; $j<count($file); $j++)
											{
											?>		 		  
											<div class="column_m">
												<ul class="quizfields">					
													<li class="first last">
														<!--  showing companies list -->
														<div class="txlabel">Mapping</div>
														<div class="txtfield">
															<select class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" name="mapping[]" id="mapping[]">
																<option value="">Select</option>
																<option value="0">SSN</option>
																<option value="1">Name</option>
																<option value="2">Last Name</option>
																<option value="3">Email</option>
																<option value="4">Mobile</option>
																 <option value="5">Work Mobile</option>
																<option value="6">Work Email</option>
																<option value="7">Employee Number</option>
																 
																
																 
															</select>
														</div>
													</li>
												</ul>
											</div>
											<div class="padtb15 clear">
												<div class="line"></div>
											</div>
										<?php } ?>
										<div class="column_m">
											<div class="talc">
												<input type="button" value="Submit" onclick="submitform1();" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd forword  fsz18 white_txt curp">
												<input type="hidden" name="indexing_save" id="indexing_save" value="<?php echo $data['file_e']; ?>" />
											</div>
											<div class="clear"></div>
										</div>
										<div class="clear"></div>
										
										
									</div>
										</form>
								</div>
						
						</div>
					</div>
				</div>
				
				
			</div>
			<!-- CONTENT -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		<div class="clear"></div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_connect  brdrad5"  id="gratis_popup_error">
			<div class="modal-content pad25  brdrad5 ">
			<h3 class="pos_rel marb0 pad0 padr40 bold fsz20 dark_grey_txt">
					
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				<div id="connect_id">
					
					
				</div>
			</div>
			
		</div>
		
		
		<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg hidden">
			
			<!-- primary menu -->
			<div class="tab-content active" id="mob-primary-menu" style="display: block;">
				<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
						<span>Senaste</span>
					</a>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
						<span>Filer</span>
					</a>
					<div class="tab-header">
						<a href="#" class="dark_grey_txt dblue_txt_h show_popup_modal" data-target="#gratis_popup_events">
							<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtgrey_bg brdrad100 talc lgn_hight_40 fsz32">
								<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							</div>
						</a>
					</div>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
						<span>Foton</span>
					</a>
					<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
						<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
							<span>...</span>
						</div>
						<span>More</span>
					</a>
				</div>
			</div>
			
			<!-- add  menu -->
			<div class="tab-content padb10" id="mob-add-menu">
				<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
				<ul class="mar0 pad0 brdrad3 white_bg fsz14">
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Activity
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							Deal
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Note
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
					</li>
					<li class="dblock mar0 padrl15 brdb">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
							Photo
						</a>
					</li>
					<li class="dblock mar0 padrl15">
						<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
							Audio Note
						</a>
					</li>
				</ul>
				<div class="tab-header mart10 brdrad3 white_bg talc lgn_hight_50 fsz18">
					<a href="#" class="" data-id="mob-primary-menu">Cancel</a>
				</div>
			</div>
		</div>
		<div class="hei_80p"></div>
		
		
	</div>
	
	
	
	
	
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	 
</body>

</html>