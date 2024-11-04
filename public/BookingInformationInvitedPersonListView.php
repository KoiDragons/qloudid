<html><head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css">
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		 <script>
		 function checkinAdult(id)
	{
		var getValue=$('#guest_adults').val();
		if($('#a'+id).hasClass('green_txt'))
		{
			$('#a'+id).removeClass('green_txt');
			$('#a'+id).addClass('red_txt');		
			getValue = getValue.replace(id+",", "");
			$("#guest_adults").val(getValue);
		}
		else
		{
			$('#a'+id).addClass('green_txt');
			$('#a'+id).removeClass('red_txt');		
			getValue=getValue+id+',';
			$("#guest_adults").val(getValue);
		}
		
	}
	
	
	 function checkinChild(id)
	{
		var getValue=$('#guest_children').val();
		if($('#c'+id).hasClass('green_txt'))
		{
			$('#c'+id).removeClass('green_txt');
			$('#c'+id).addClass('red_txt');		
			getValue = getValue.replace(id+",", "");
			$("#guest_children").val(getValue);
		}
		else
		{
			$('#c'+id).addClass('green_txt');
			$('#c'+id).removeClass('red_txt');		
			getValue=getValue+id+',';
			$("#guest_children").val(getValue);
		}
		
	}
	function submitform()
	{
		document.getElementById('save_indexing').submit();	
	}
		 </script>
		
	</head>
	<body class="bg_212b3a ffamily_avenir">
	 
			<div class="column_m header   bs_bb trans_bg " style="height:97.44px; border-bottom: 1px solid #353945;">
         <div class="header__center center padding2080 xs-padding032 " style="display: flex;
    align-items: center; width: 100%;
    max-width: 1280px;
    margin: 0 auto;
  "><a class="header__logo xs-fsz20 " href="#" style="
    border: 2px solid #ffffff; 
    padding: 10px;
    color: white;
    border-radius: 5px;
    font-family: Avenir;
    font-size: 20PX;
    line-height:25px !important
    "><?php echo $bookingInformationDetail['hotel_name']; ?></a>


		 
			
			
			

</div>
      </div>
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart60 " id="loginBank">
				<div class="wrap maxwi_100 padrl25 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_70 xxs-lgn_hight_50 padb0 white_txt trn ffamily_avenir changedText">Check-in</h1>
									</div>
									<div class=" xxs-tall talc xs-padb20 padb35 ffamily_avenir"> <a href="#" class="txt_777E90 fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_30 changedText">Pre-checked guest will turn green can get checked-in succesfully.</a></div>
									
									 
					  <div class="column_m container  brdb353945     fsz14 dark_grey_txt  ">
												<div class="bg_212b3a  bg_fffbcc_a ">
										<div class="container   brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   
												   <div class="chip-container">
													 
													 
													  <a href="javascript:void(0);" ><div id="bath-chip" class="css-cedhmb">
													   <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="sv8pva">
														  <span class="chip chip_is-selected">
															 <span class="chip_content">
																<div class="css-utgzrm hidden"></div>
																<span class="chip_text">Check-in</span>
															 </span>
														  </span>
													   </div>
													</div></a>
												   </div>
												</div>
												<div class="clear"></div>
											 
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									
							 
					 
					  <div class="tab-header martb10 padb10 xs-tall brdb2_3B71FE nobrdt nobrdl nobrdr talc hidden">
									   <a href="#" class="dinlblck marni5 padrl30  xs-marl0  nobrd  bg_3B71FE brdrad40 xxs-brdrad10 lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active" >Guests</a></div>
									 <?php $i=0;
												foreach($adultsCheckedInList as $category => $value) 
												{
													
													if($value['is_user']==1) {
												?> 	
								 
									 <a href="javascript:void(0);">	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="<?php if($value['checked_in']==0) echo 'bg_border_brd212b3b'; else echo 'bg_2F3C4F'; ?>   brdrad5  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75   xs-mar0 padt10">
													
													<span class="edit-text   padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 white_txt changedText"><?php echo $value['name']; ?> </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  txt_777E90 changedText"><?php if($value['checked_in']==0) echo 'Pre checked-in'; else echo 'Checked-in'; ?></span>    
													   
													  </div>
													 
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>

													<?php } else { if($value['is_confirmed']==1)  { ?>
													
													<a href="javascript:void(0);" >	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="bg_2F3C4F brdrad5  bg_fffbcc_a "  >
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75   xs-mar0 padt10">
													 
													<span class="edit-text   padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 white_txt changedText">Adult <?php echo $i; ?> </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  txt_777E90 changedText">Has checked-in</span>    
													   
													  </div>
													 
													 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz30 padt15  padb0 xxs-marr20 ">
														  <span class="fas fa-check-circle green_txt" aria-hidden="true" id="a<?php echo $value['id']; ?>"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>

													<?php	}else{ ?>
													<a href="javascript:void(0);" onclick="checkinAdult(<?php echo $value['id']; ?>);">	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="bg_border_brd212b3b brdrad5  bg_fffbcc_a "  >
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75   xs-mar0 padt10">
													 
													<span class="edit-text   padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 white_txt changedText">Adult <?php echo ' '.$i; ?> - Invitation sent </span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  txt_777E90 changedText">Adult <?php echo ' '.$i; ?> has not checked in yet</span>    
													   
													  </div>
													 
													 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz30 padt15  padb0 xxs-marr20 ">
														  <span class="fas fa-check-circle red_txt" aria-hidden="true" id="a<?php echo $value['id']; ?>"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>

													<?php													} } $i++; } ?>
										
										<?php 
												for($i=1;$i<=$updatePreCheckinStatus['guest_adult_left'];$i++) 
												{
													
													
												?> 	
								 
									 <a href="../../PrecheckinInformation/selectInvitationType/<?php echo $data['hotel_checkin_id']; ?>">	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="bg_border_brd212b3b brdrad5  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75   xs-mar0 padt10">
													
													<span class="edit-text   padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 white_txt changedText">Invite adult</span>
													<span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  txt_777E90 changedText">No adult has been invited yet</span>    
													   
													  </div>
													 
														<div class="fright wi_25  padl20 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir txt_777E90 trans_bgi" fdprocessedid="8r6b1">Invite</button>
																			</div>
													
												</div>
												
											
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>

												<?php }
												
												$i=1; foreach($dependentsCheckedInList as $category => $value) 
												{
													
													if($value['checked_in_dependent']==1)
													{
												?> 	
								 
									 <a href="javascript:void(0);" >	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="bg_2F3C4F brdrad5  bg_fffbcc_a " >
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75    xs-mar0 padt10">
													
													<span class="edit-text   padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 white_txt changedText"><?php echo $value['name']; ?></span>
													   <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  txt_777E90 changedText">Checked-in</span> 
													   
													  </div>
													 
													 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz30 padt15  padb0 xxs-marr20 ">
														  <span class="fas fa-check-circle green_txt" aria-hidden="true" id="c<?php echo $value['id']; ?>"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>
													<?php } else { ?>
													 <a href="javascript:void(0);" >	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="bg_border_brd212b3b brdrad5  bg_fffbcc_a " >
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75    xs-mar0 padt10">
													
													<span class="edit-text   padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 white_txt changedText"><?php echo $value['name']; ?></span>
													   <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  txt_777E90 changedText">Pre checked-in</span> 
													   
													  </div>
													 
													 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz30 padt15  padb0 xxs-marr20 ">
														  <span class="fas fa-check-circle green_txt" aria-hidden="true" id="c<?php echo $value['id']; ?>"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>
													<?php } $i++; } ?>
										
										<?php 
												for($i=1;$i<=$updatePreCheckinStatus['guest_children_left'];$i++) 
												{
													
													
												?> 	
								 
									 <a href="../../PrecheckinInformation/dependentsList/<?php echo $data['hotel_checkin_id']; ?>">	
											<div class="column_m container  marb5 mart5   fsz14 dark_grey_txt">
												<div class="brdrad5  bg_fffbcc_a bg_border_brd212b3b">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft wi_75    xs-mar0 padt10">
													
													<span class="edit-text   padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 white_txt changedText">Invite child</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  txt_777E90 changedText">No child has been invited yet</span> 
													      
													   
													  </div>
													 
													<div class="fright wi_25  padl20 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0">
																				<button type="button" name="Edit" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir txt_777E90 trans_bgi" fdprocessedid="8r6b1">Invite</button>
																			</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												</a>

												<?php } ?>	
													<form action="../checkinGuests/<?php echo $data['hotel_checkin_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
													<input type="hidden" id="guest_adults" name="guest_adults" value="" />
													<input type="hidden" id="guest_children" name="guest_children" value="" />
													</form>
												<div class="clear"></div>
												 
												<div class="padt20 xxs-talc talc padb50 mart35">
								
								<a href="#" onclick="submitform();"><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #ffffff; color: #777E90;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Proceed to checkin</font></font></button></a>
								
							</div>
						 </div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10" id="gratis_popup_error">
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
	<script type="text/javascript" src="<?php echo $path;?>html/vacancycontent/js/custom.js"></script>
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
				
			</script>
		
	
	 						</div></body></html>