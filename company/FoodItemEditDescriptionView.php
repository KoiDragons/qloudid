<head>
<?php
		 if($selectedDish ['dish_image']!=null) { $filename="../estorecss/".$selectedDish ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$selectedDish ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; ?>
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
	<script>
	function updateHot(id)
	{
		if(id==1)
		{
		hotCold='<a href="javascript:void(0);" onclick="updateHot(1);"><div id="toilet-chip" class="css-cedhmb"> <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu"><span class="chip chip_is-selected"><span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">Hot</span> </span></span> </div></div></a> <a href="javascript:void(0);" onclick="updateHot(2);"><div id="bath-chip" class="css-cedhmb"> <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu"><span class="chip chip_not-selected"> <span class="chip_content"> <div class="css-ylfimb"></div> <span class="chip_text">Cold</span></span></span></div> </div></a>';	
		$('#hot_cold').val(id);
		$('.hot_cold').html(hotCold);
		}
		else
		{
		hotCold='<a href="javascript:void(0);" onclick="updateHot(1);"><div id="bath-chip" class="css-cedhmb"> <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu"><span class="chip chip_not-selected"> <span class="chip_content"> <div class="css-ylfimb"></div> <span class="chip_text">Hot</span></span></span></div> </div></a><a href="javascript:void(0);" onclick="updateHot(2);"><div id="toilet-chip" class="css-cedhmb"> <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu"><span class="chip chip_is-selected"><span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">Cold</span> </span></span> </div></div></a>';	
		$('#hot_cold').val(id);
		$('.hot_cold').html(hotCold);
		}
		
													 
	}
	
	function updateFood(id)
	{
		if(id==1)
		{
		hotCold='<a href="javascript:void(0);" onclick="updateFood(1);"><div id="toilet-chip" class="css-cedhmb"> <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu"><span class="chip chip_is-selected"><span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">Food</span> </span></span> </div></div></a> <a href="javascript:void(0);" onclick="updateFood(2);"><div id="bath-chip" class="css-cedhmb"> <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu"><span class="chip chip_not-selected"> <span class="chip_content"> <div class="css-ylfimb"></div> <span class="chip_text">Drink</span></span></span></div> </div></a>';	
		$('#food_drink').val(id);
		$('.food_drink').html(hotCold);
		}
		else
		{
		hotCold='<a href="javascript:void(0);" onclick="updateFood(1);"><div id="bath-chip" class="css-cedhmb"> <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu"><span class="chip chip_not-selected"> <span class="chip_content"> <div class="css-ylfimb"></div> <span class="chip_text">Food</span></span></span></div> </div></a><a href="javascript:void(0);" onclick="updateFood(2);"><div id="toilet-chip" class="css-cedhmb"> <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu"><span class="chip chip_is-selected"><span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">Drink</span> </span></span> </div></div></a>';	
		$('#food_drink').val(id);
		$('.food_drink').html(hotCold);
		}
		
													 
	}
	
	
	function addType(id)
	{
		var getValue=$('#food_type').val();
		if($('#'+id).hasClass('green_bg'))
		{
			$('#'+id).removeClass('green_bg');
			$('#'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#food_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_bg');
			$('#'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#food_type").val(getValue);
		}
		
	}
	
	function selectWarning(id)
	{
		if(id==1)
		{
			$('#warningsDetail').removeClass('hidden');
		}
		else
		{
			$('#warningsDetail').addClass('hidden');
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
			 if($("#dish_name").val()==null || $("#dish_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter dish name');
				return false;
			}
			
			 
			
			if($("#dish_type").val()==0)
			{
				
				$("#errorMsg1").html('Please choose food category');
				return false;
			}
			if($("#dish_price").val()==0)
			{
				
				$("#errorMsg1").html('Please enter dish price');
				return false;
			}
			if(isNaN($("#dish_price").val()))
			{
				
				$("#errorMsg1").html('Please enter correct dish price');
				return false;
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
		 	</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../foodInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../foodInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									 
							
							<form action="../../editDishItemDetail/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											<div class="on_clmn mart20  ">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  borderr ">
											<div class="cropped_image borderr grey_brd5 <?php if($selectedDish ['dish_image']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" id="image-data" name="image-data"></div>
										 
										</div>
									</div>
								
								 
							</div>
						</div>
											 <div class="on_clmn mart10 xxs-mart10">
									<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 dflex alit_c">
											
											<label class="forword ">
												Add image <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
										</div>
										 
											
										</div> 
											
											<input type="hidden" name="food_type" id="food_type" value="<?php echo $selectedDish['dish_warnings']; ?>" />
											
											
											
											
											 <div class="on_clmn mart10 hidden">
											 
											<div class="pos_rel">
												
												<select name="dish_type" id="dish_type"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"   onchange="selectWarning(this.value);" > 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['dish_type']==1) echo 'selected'; ?>>Food</option>
											 	 
											</select>
											<label for="dish_type" class="floating__label tall nobold" data-content="Dish type" >
											<span class="hidden--visually">
											 Dish type</span></label>	
											</div>
										 
											 
										</div>
										
										
										<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">If this is a food or drink?</p>
												   <div class="chip-container food_drink">
												   <?php if($selectedDish['food_drink']==1) { ?>
													  <a href="javascript:void(0);" onclick="updateFood(1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Food</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													
													 <a href="javascript:void(0);" onclick="updateFood(2);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Drink</span>
															   </span>
															</span>
														 </div>
													  </div></a>
												   <?php } else { ?>
												   
													
													 <a href="javascript:void(0);" onclick="updateFood(1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Food</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													  
													   <a href="javascript:void(0);" onclick="updateFood(2);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Drink</span>
															   </span>
															</span>
														 </div>
													  </div></a>
												   <?php } ?>
												   </div>
												</div>
												<div class="clear"></div>
											 
										 
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 <input type="hidden" name="food_drink" id="food_drink" value="<?php echo $selectedDish['food_drink']; ?>" />
											 
									</div>
									 
									 
										<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd">If this dish is a hot or cold?</p>
												   <div class="chip-container hot_cold">
												   <?php if($selectedDish['hot_cold']==1) { ?>
													  <a href="javascript:void(0);" onclick="updateHot(1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Hot</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													
													 <a href="javascript:void(0);" onclick="updateHot(2);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Cold</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 <?php } else { ?>
													 
													 
													
													 <a href="javascript:void(0);" onclick="updateHot(1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Hot</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													  
													    <a href="javascript:void(0);" onclick="updateHot(2);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Cold</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 <?php } ?>
												   </div>
												</div>
												<div class="clear"></div>
											 
										 
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
										 <input type="hidden" name="hot_cold" id="hot_cold" value="<?php echo $selectedDish['hot_cold']; ?>" />	 
											 
											 
									</div>
									 
											
										
										
											 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="dish_name" id="dish_name" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" value="<?php echo $selectedDish['dish_name']; ?>" /> 
												<label for="dish_name" class="floating__label tall nobold" data-content="Title" >
											<span class="hidden--visually">
											 Title</span></label>
											</div>
										 
											 
										</div>
										
										
										<div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												
												
												<input type="text" name="dish_detail" id="dish_detail" placeholder="Description" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" value="<?php echo $selectedDish['dish_detail']; ?>" /> 
												<label for="dish_detail" class="floating__label tall nobold" data-content="Description" >
											<span class="hidden--visually">
											Description</span></label>
											</div>
											 
										 
										</div>
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Product description" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										<div class="on_clmn mart20 ">
											 
											<div class="pos_rel"><textarea class="texteditor "  id="product_information" name="product_information"> <?php echo $selectedDish['product_information']; ?>
										</textarea></div>
										</div>
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10 " id="warningsDetail">
										<?php  foreach($foodTypeInformation as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="<?php echo substr($value['food_type'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?> fsz18 white_txt curp ffamily_avenir" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>">
														</div>
														<?php } ?>

			
																			</div>	
											
								 
									 
								 
								 
								 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												
												
												<input type="number" name="dish_price" id="dish_price" placeholder="Price" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" value="<?php echo $selectedDish['dish_price']; ?>" <?php if($selectedDish['variation_type']==1) echo 'readonly'; ?> /> 
												<label for="dish_price" class="floating__label tall nobold" data-content="Price" >
											<span class="hidden--visually">
											Price</span></label>
											</div>
											 
										 
										</div>
								
							 		 
										 
										 
									  	<input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><button type="button" value="" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Update</button></a> </div>
							
						</div>
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
	 
	 	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
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
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
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
	 						