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
	
	function updateBroad(id,link)
   {
	   broadcast=id;
	  
   }
	function addType(id)
	{
		var getValue=$('#payment_type').val();
		if($('#'+id).hasClass('green_98ce44'))
		{
			$('#'+id).removeClass('green_98ce44');
			$('#'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#payment_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_98ce44');
			$('#'+id).removeClass('lgtgrey_bg');		
			getValue=getValue+id+',';
			$("#payment_type").val(getValue);
		}
		
	}
	
	
	function addBType(id)
	{
		var getValue=$('#broadcast_channel').val();
		if($('#b_'+id).hasClass('green_98ce44'))
		{
			$('#b_'+id).removeClass('green_98ce44');
			$('#b_'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#broadcast_channel").val(getValue);
		}
		else
		{
			$('#b_'+id).addClass('green_98ce44');
			$('#b_'+id).removeClass('lgtgrey_bg');		
			getValue=getValue+id+',';
			$("#broadcast_channel").val(getValue);
		}
		
	}
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
			 
			if($("#resturant_type").val()==0)
			{
				
				$("#errorMsg1").html('Please select type');
				return false;
			}
			if($("#p_id").val()==0)
			{
				
				$("#errorMsg1").html('Please select location');
				return false;
			}
			 if($("#resturant_name").val()==null || $("#resturant_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter resturant name');
				return false;
			}
			
			 if($("#dress_code").val()==null || $("#dress_code").val()=="")
			{
				
				$("#errorMsg1").html('Please enter dress code');
				return false;
			}
			if($("#payment_type").val()=='')
			{
				
				$("#errorMsg1").html('Please select atleast one payment type');
				return false;
			}
			if($("#broadcast_type").val()==1)
			{
				
				if($("#broadcast_channel").val()=='')
			{
				
				$("#errorMsg1").html('Please select atleast one channel/program type');
				return false;
			}
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
                        <a href="../availableResturant/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../availableResturant/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Add</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Add a food and drink place</a></div>
					 
					 
							
							<form action="../addResturant/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											<div class="on_clmn   mart10  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Resturant type" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 
											 
											<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<select name="resturant_type" id="resturant_type"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 <option value="0">Select type</option> 
													 
														
														<option value="1" class="lgtgrey2_bg" >Restaurants</option>
														<option value="2" class="lgtgrey2_bg" >Coffee & Tea</option>
														<option value="3" class="lgtgrey2_bg" >Bar & Pubs</option>
														<option value="4" class="lgtgrey2_bg" >Nightclub</option>
													 
											</select>
												
											</div>
										 
											 
										</div>
									<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Location" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn    ">
											 
											<div class="pos_rel">
												
												<select name="p_id" id="p_id"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
											 <option value="0">Select location</option> 
													<?php  foreach($locationDetail as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" ><?php echo $value['visiting_address']; ?></option>
													<?php 	}	?>
											</select>
												
											 
											</div>
										</div>
										
									
											
											 
											
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Resturant name" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn    ">
											 
											<div class="pos_rel">
												
												<input type="text" name="resturant_name" id="resturant_name" placeholder="Name" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											 
											</div>
											 
											</div>
										 
								<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Dress code" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="dress_code" id="dress_code" placeholder="Dress code" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											 
											</div>
											 
											</div>
											
											
											
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Table reservation" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<select class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir  "   name="table_reservation" id="table_reservation" >
											 <option value="1" class="lgtgrey2_bg black_txt"  >Not necessary</option>
											<option value="2" class="lgtgrey2_bg black_txt"  >Required</option>
											<option value="3" class="lgtgrey2_bg black_txt" >Recommended</option>                  
											</select>
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Pets allowed" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<select class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="pets_allowed" id="pets_allowed">
											 <option value="1" class="lgtgrey2_bg black_txt"  >Yes</option>
											<option value="2" class="lgtgrey2_bg black_txt" >No</option>
											                  
											</select>
										</div>
									</div>
									 
									</div>
									
									<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Description" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn">
											<div class="pos_rel">
												<textarea class="texteditor "  id="description" name="description"> 
										</textarea>
												 
												
											 
											</div>
											 
											</div>
									
									<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Delivery available" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<select name="delivery_available" id="delivery_available"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
												<option value="1" class="lgtgrey2_bg" >Yes</option>
												<option value="2" class="lgtgrey2_bg" >No</option>
												 
											</select>
												
											</div>
										 
											 
										</div>
									
									
									<div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Form of payment" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									 <div class="wi_100 maxwi_500p ovfl_hid padt10 brdb">
										 
										<div class="category-apps email-collab marrbl-2 uppercase fsz12">
										 
										 <?php $i=0; foreach($paymentType as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<a href="javascript:void();" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h  lgtgrey_bg  brdr black_txt connect" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>"> <span class="dblock pi1<?php echo $i; ?> ffamily_avenir"></span><?php echo substr($value['payment_type'],0,13); ?></a>
														<?php $i++; } ?>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
									 	
																			
									 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Broadcast" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateBroad(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div class="wi_100 maxwi_500p ovfl_hid padt10 brdb  hidden" id="b_channels">
										 
										<div class="category-apps email-collab marrbl-2 uppercase fsz12">
										 
										 <?php $i=0; foreach($broadcastDetail as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<a href="javascript:void();" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h  lgtgrey_bg  brdr black_txt connect" onclick="addBType(<?php echo $value['id']; ?>);" id="b_<?php echo $value['id']; ?>"> <span class="dblock pi1<?php echo $i; ?> ffamily_avenir"></span><?php echo substr($value['broadcast_channel'],0,13); ?></a>
														<?php $i++; } ?>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
									 	
																			
								 			 <input type="hidden" id="broadcast_channel" name="broadcast_channel" value="" />									
									 <input type="hidden" id="broadcast_type" name="broadcast_type" value="0" />										
																			
								 	 <input type="hidden" id="payment_type" name="payment_type" value="" />
										 <input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	 						