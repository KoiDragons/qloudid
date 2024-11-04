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
		
	<script>
	 	function closePop()
		{
			document.getElementById("popup_fade").style.display='none';
			$("#popup_fade").removeClass('active');
			document.getElementById("person_informed").style.display='none';
			$(".person_informed").removeClass('active');
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
			 
			$("#errorMsg1").html('');
		 
			 if($("#t_operators").val()==null || $("#t_operators").val()=="" || $("#t_operators").val()==0)
			{
				
				$("#errorMsg1").html('Please enter working operators for the queue');
				return false;
			}
			
			if(isNaN($("#t_operators").val()))
			{
				
				$("#errorMsg1").html('Please enter numeric value for working operators for the queue');
				return false;
			}
			 
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
				
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../listQueue/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../listQueue/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Drop in</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Add a drop in place</a></div>
					 
					 
							
							<form action="../../updateQueue/<?php echo $data['cid']; ?>/<?php echo $data['id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
										 
											
											 
											 
											 
									<div class="on_clmn   mart10  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Location" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn    ">
											 
											<div class="pos_rel">
												
												<select name="p_id" id="p_id" disabled class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 <option value="0">Select location</option> 
													<?php  foreach($locationDetail as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($queueDetail['location_id']==$value['id']) echo 'selected'; ?> disabled><?php echo $value['visiting_address']; ?></option>
													<?php 	}	?>
											</select>
												
											 
											</div>
										</div>
										
									
											
											 
											
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Queue name" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn    ">
											 
											<div class="pos_rel">
												
												<input type="text" name="queue_name" id="queue_name" placeholder="Name" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $queueDetail['queue_name']; ?>" readonly /> 
												
											 
											</div>
											 
											</div>
										 
								<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Total operators" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="number" name="t_operators" id="t_operators" placeholder="Operators" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $queueDetail['total_operators']; ?>"/> 
												
											 
											</div>
											 
											</div>
											
											
											
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Opening hrs" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<select class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir  "   name="open_hrs" id="open_hrs" >
												<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if($queueDetail['opening_time']==$value['work_time']) echo 'selected'; ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>               
											</select>
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Closing hrs" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<select class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="closing_hrs" id="closing_hrs">
												<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>"  <?php if($queueDetail['closing_time']==$value['work_time']) echo 'selected'; ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											                  
											</select>
										</div>
									</div>
									 
									</div>
									
									 	<div class="on_clmn  mart20   ">
									 
											 
										<div class="pos_rel talc">
									<input type="text" value="Token closing" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<select class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir  "   name="token_closing" id="token_closing" >
												  
											<option value="5" <?php if($queueDetail['tokan_closing']==5) echo 'selected'; ?>>5 minutes</option> 
											<option value="10" <?php if($queueDetail['tokan_closing']==10) echo 'selected'; ?>>10 minutes</option>
											<option value="15" <?php if($queueDetail['tokan_closing']==15) echo 'selected'; ?>>15 minutes</option>
											<option value="20" <?php if($queueDetail['tokan_closing']==20) echo 'selected'; ?>>20 minutes</option>
											<option value="25" <?php if($queueDetail['tokan_closing']==25) echo 'selected'; ?>>25 minutes</option>
											<option value="30" <?php if($queueDetail['tokan_closing']==30) echo 'selected'; ?>>30 minutes</option>
											<option value="35" <?php if($queueDetail['tokan_closing']==35) echo 'selected'; ?>>35 minutes</option>
											<option value="40" <?php if($queueDetail['tokan_closing']==40) echo 'selected'; ?>>40 minutes</option>
											<option value="45" <?php if($queueDetail['tokan_closing']==45) echo 'selected'; ?>>45 minutes</option>
											<option value="50" <?php if($queueDetail['tokan_closing']==50) echo 'selected'; ?>>50 minutes</option>
											<option value="55" <?php if($queueDetail['tokan_closing']==55) echo 'selected'; ?>>55 minutes</option>
											<option value="60" <?php if($queueDetail['tokan_closing']==60) echo 'selected'; ?>>60 minutes</option>
											</select>
									</div>
									 
								 
									 
									</div>
									
										 <input type="hidden" id="indexing_save" name="indexing_save" />
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
				
			</script>
		
	</body>
	 						