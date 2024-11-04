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
 /* function updateInclutionType(id)
	   {
		   var getValue=$('#selected_companies').val();
			if($('#'+id).hasClass('green_bg'))
			{
				$('#'+id).removeClass('green_bg');
				$('#'+id).addClass('lgtgrey_bg');
				getValue = getValue.replace(id+",", "");
				$("#selected_companies").val(getValue);
			}
			else
			{
				$('#'+id).addClass('green_bg');
				$('#'+id).removeClass('lgtgrey_bg');
				getValue=getValue+id+',';
				$("#selected_companies").val(getValue);
			}
	   }*/
	   
	function updateInclutionType(id)
	   {
		   var getValue=$('#selected_companies').val();
			if($('#'+id).hasClass('checked'))
			{
				$('#'+id).removeClass('checked');
				getValue = getValue.replace(id+",", "");
				$("#selected_companies").val(getValue);
			}
			else
			{
				$('#'+id).addClass('checked');
				getValue=getValue+id+',';
				$("#selected_companies").val(getValue);
			}
	   }
	 function submitform()
		{
			 
			$("#errorMsg1").html('');
			
			
			if($("#selected_companies").val()=="" || $("#selected_companies").val()==0)
			{
				
				$("#errorMsg1").html('Please select atleast one company');
				return false;
			}
					 document.getElementById('save_indexing').submit();
		
			}	
		  
				
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
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
		
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20  ">
				<div class="wrap maxwi_100 padrl0 xs-padrl25 xsi-padrl134">
					 <!-- Center content -->
						<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc tall fsz55 xxs-fsz65 bold lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Companies</h1>
									</div>
									<div class="mart10 marb5 xxs-talc tall  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Select companies from below listed Professional service providers</a></div>
									 
									 
									  <div class="on_clmn brdb marb5">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Companies list" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
									  <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Companies</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Please select companies</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
										<div class="wi_100 maxwi_500p ovfl_hid padt0 brdb">
										   <div class="category-apps email-collab marrbl-2 uppercase fsz12">
										   <?php $i=0;
																			
												foreach($matchingProfessionalCompanies as $category => $value) 
												{
																				
																				
												?> 
												
												<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="<?php echo $value['id']; ?>">
														<a href="javascript:void(0);"   onclick="updateInclutionType(<?php echo $value['id']; ?>)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8" ></a>
														</div>
											<label for="oven" class="css-14q70q1"><?php echo $value['company_name']; ?></label></div>
															
															</div>
											   
											  <?php } ?>
											  <div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										   </div>
										</div>
							 <form action="../../sendJobRequestInfo/<?php echo $data['job_id']; ?>/<?php echo $data['mid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1" class="checkout__item js-tabs-item">			
						 <input type="hidden" id="selected_companies" name="selected_companies" />	
								</form>
								<div id="errorMsg1" class="fsz20 red_txt padtb20 tall"></div>
								<div class="clear"></div>
								<div class="padtb20 xxs-talc talc">
								
							<a href="#" onclick="submitform();">	<button type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18" fdprocessedid="9dio1s">Submit</button></a>
								
							</div>
							 	</div>
								
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
	 						