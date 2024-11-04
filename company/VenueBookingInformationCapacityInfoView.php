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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	 	
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../completeVenueInformation/<?php echo $data['cid']; ?>/<?php echo $data['vid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../completeVenueInformation/<?php echo $data['cid']; ?>/<?php echo $data['vid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Capacity</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Update seating/standing capacity of venue  </a></div>
					 
					 
							
							<form action="../../updateVenueBookingCapacity/<?php echo $data['cid']; ?>/<?php echo $data['vid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Standing / cocktail (max) </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many people can attend the event while standing?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
											 
											 <div class="on_clmn">
											<div class="pos_rel">
												 
												<input type="number" name="standing_capacity" id="standing_capacity" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $venueInformationDetail['standing_capacity']; ?>" min="1" /> 
											 
											 	
											</div>
											</div>
										 	 <div class="clear"></div>
									 
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Seated (max) </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many people can attend the event while seating?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
											 
											 <div class="on_clmn">
											<div class="pos_rel">
												 
												<input type="number" name="seating_capacity" id="seating_capacity" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $venueInformationDetail['seating_capacity']; ?>" min="1" /> 
											 
											 	
											</div>
											</div>
										 	 <div class="clear"></div>
									 
										 
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Classroom </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many people can attend the event in classroom table formation?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
											 
											 <div class="on_clmn">
											<div class="pos_rel">
												 
												<input type="number" name="classroom_formation" id="classroom_formation" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $venueInformationDetail['classroom_formation']; ?>" min="1" /> 
											 
											 	
											</div>
											</div>
										 	 <div class="clear"></div>
										
										 
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Theater </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many people can attend the event in theater table formation?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
											 
											 <div class="on_clmn">
											<div class="pos_rel">
												 
												<input type="number" name="theater_formation" id="theater_formation" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $venueInformationDetail['theater_formation']; ?>" min="1" /> 
											 
											 	
											</div>
											</div>
										 	 <div class="clear"></div>
										
										 
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Banquet </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many people can attend the event in banquet table formation?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
											 
											 <div class="on_clmn">
											<div class="pos_rel">
												 
												<input type="number" name="banquet_formation" id="banquet_formation" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $venueInformationDetail['banquet_formation']; ?>"  min="1" /> 
											 
											 	
											</div>
											</div>
										 	 <div class="clear"></div>
										
										 
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Conference </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many people can attend the event in conference table formation?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
											 
											 <div class="on_clmn">
											<div class="pos_rel">
												 
												<input type="number" name="conference_formation" id="conference_formation" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $venueInformationDetail['conference_formation']; ?>"  min="1" /> 
											 
											 	
											</div>
											</div>
										 	 <div class="clear"></div>
										
										
										 
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">U-shape </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many people can attend the event in U-shape table formation?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
											 
											 <div class="on_clmn">
											<div class="pos_rel">
												 
												<input type="number" name="ushape_formation" id="ushape_formation" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $venueInformationDetail['ushape_formation']; ?>" min="1" /> 
											 
											 	
											</div>
											</div>
										 	 <div class="clear"></div>
									 
									 
										 
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Floor area (m2) </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Exact area of the venue?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											 
											 
											 <div class="on_clmn">
											<div class="pos_rel">
												 
												<input type="number" name="floor_area" id="floor_area" min="10" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $venueInformationDetail['floor_area']; ?>" /> 
											 
											 	
											</div>
											</div>
										 	 <div class="clear"></div>
									 
										
									  <input type="hidden" id="indexing_save" name="indexing_save" />
									  <div class="clear"></div>
								<div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Update" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	<script>
				var tinyMCE_options = {
					selector: '.texteditor',
					plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
					toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
					//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
					//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
					menubar: false,
					max_chars : "25000",
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
				}
				tinyMCE.init(tinyMCE_options);
				
		  
		function submitform()
		{
			 
			$("#errorMsg1").html('');
			
			if($("#standing_capacity").val()==null || $("#standing_capacity").val()=="")
			{
				
				$("#errorMsg1").html('Please enter standing capacity');
				return false;
			}
			
			if($("#standing_capacity").val()==0)
			{
				
				$("#errorMsg1").html('Standing capacity must be atleast one');
				return false;
			}
			
			if(isNaN($("#standing_capacity").val()))
			{
				
				$("#errorMsg1").html('Standing capacity must be a numeric value');
				return false;
			}
			
			if($("#seating_capacity").val()==null || $("#seating_capacity").val()=="")
			{
				
				$("#errorMsg1").html('Please enter seating capacity');
				return false;
			}
			
			if($("#seating_capacity").val()==0)
			{
				
				$("#errorMsg1").html('Seating capacity must be atleast one');
				return false;
			}
			
			if(isNaN($("#seating_capacity").val()))
			{
				
				$("#errorMsg1").html('Seating capacity must be a numeric value');
				return false;
			}
			
			 if($("#classroom_formation").val()==null || $("#classroom_formation").val()=="")
			{
				
				$("#errorMsg1").html('Please enter seating capacity in classroom formation');
				return false;
			}
			
			if($("#classroom_formation").val()==0)
			{
				
				$("#errorMsg1").html('Seating capacity in classroom formation must be atleast one');
				return false;
			}
			
			if(isNaN($("#classroom_formation").val()))
			{
				
				$("#errorMsg1").html('Seating capacity in classroom formation must be a numeric value');
				return false;
			}
			
			if($("#theater_formation").val()==null || $("#theater_formation").val()=="")
			{
				
				$("#errorMsg1").html('Please enter seating capacity in theater formation');
				return false;
			}
			
			if($("#theater_formation").val()==0)
			{
				
				$("#errorMsg1").html('Seating capacity in theater formation must be atleast one');
				return false;
			}
			
			if(isNaN($("#theater_formation").val()))
			{
				
				$("#errorMsg1").html('Seating capacity in theater formation must be a numeric value');
				return false;
			}
			
			if($("#banquet_formation").val()==null || $("#banquet_formation").val()=="")
			{
				
				$("#errorMsg1").html('Please enter seating capacity in banquet formation');
				return false;
			}
			
			if($("#banquet_formation").val()==0)
			{
				
				$("#errorMsg1").html('Seating capacity in banquet formation must be atleast one');
				return false;
			}
			
			if(isNaN($("#banquet_formation").val()))
			{
				
				$("#errorMsg1").html('Seating capacity in banquet formation must be a numeric value');
				return false;
			}
			
			if($("#conference_formation").val()==null || $("#conference_formation").val()=="")
			{
				
				$("#errorMsg1").html('Please enter seating capacity in conference formation');
				return false;
			}
			
			if($("#conference_formation").val()==0)
			{
				
				$("#errorMsg1").html('Seating capacity in conference formation must be atleast one');
				return false;
			}
			
			if(isNaN($("#conference_formation").val()))
			{
				
				$("#errorMsg1").html('Seating capacity in conference formation must be a numeric value');
				return false;
			}
			
			if($("#ushape_formation").val()==null || $("#ushape_formation").val()=="")
			{
				
				$("#errorMsg1").html('Please enter seating capacity in ushape formation');
				return false;
			}
			
			if($("#ushape_formation").val()==0)
			{
				
				$("#errorMsg1").html('Seating capacity in ushape formation must be atleast one');
				return false;
			}
			
			if(isNaN($("#ushape_formation").val()))
			{
				
				$("#errorMsg1").html('Seating capacity in ushape formation must be a numeric value');
				return false;
			}
			
			 if($("#floor_area").val()==null || $("#floor_area").val()=="")
			{
				
				$("#errorMsg1").html('Please enter floor area');
				return false;
			}
			
			if($("#floor_area").val()==0)
			{
				
				$("#errorMsg1").html('Floor area must be atleast 10 meter suqare');
				return false;
			}
			
			if(isNaN($("#floor_area").val()))
			{
				
				$("#errorMsg1").html('Floor area must be a numeric value');
				return false;
			}
			 
			 document.getElementById('save_indexing').submit();
			}
		
		 
	  
				
			</script>
			
	
	</body>
	 						