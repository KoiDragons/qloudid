<head>
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
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
	<script>
	function addType(id)
	{
		var getValue=$('#food_type').val();
		if($('#'+id).hasClass('green_98ce44'))
		{
			$('#'+id).removeClass('green_98ce44');
			$('#'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#food_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_98ce44');
			$('#'+id).removeClass('lgtgrey_bg');		
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
			function selectCategoryDetail(id)
			{
				var send_data={};
				send_data.id=id;
				
				$.ajax({
					type:"POST",
					url:"../../allCategories/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1)
					{
						document.getElementById("category_id").innerHTML=data1;
					}
				}
				});
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
			if($("#serve_type").val()==0)
			{
				
				$("#errorMsg1").html('Please select serve type');
				return false;
			}
			
			if($("#category_id").val()==0)
			{
				
				$("#errorMsg1").html('Please select serve category');
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
				
			</script>
			
			
		
	</head>
	<body class="white_bg">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../menuInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../menuInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Article</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc brdb_black xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Add product, service or dish below</a></div>
			 
					 <div class="clear"></div>
							
							<form action="../../addDishDetail/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											
											 
											
											<input type="hidden" name="food_type" id="food_type" value="" />
											
											<div class="on_clmn   mart10 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Type of dish" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
												 <div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												
												<select name="dish_type" id="dish_type"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir dropdown-bg" onchange="selectWarning(this.value);"> 
											 <option value="0">Select category</option> 
											<option value="1" class="lgtgrey2_bg" >Food</option>
											<option value="2" class="lgtgrey2_bg" >Drink</option>
											 	 
											</select>
												
											</div>
										 
											 
										</div>
										
										
										<div class="on_clmn   mart10 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Serve type" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
												 <div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												
												<select name="serve_type" id="serve_type"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir dropdown-bg" onchange="selectCategoryDetail(this.value);"> 
											  <option value="0">Select type</option> 
											<option value="1" class="lgtgrey2_bg <?php if($resturantWorkCount['breakfast_available']==0) echo 'hidden'; ?>" >Breakfast</option>
											<option value="2" class="lgtgrey2_bg <?php if($resturantWorkCount['brunch_available']==0) echo 'hidden'; ?>" >Brunch</option>
											<option value="3" class="lgtgrey2_bg <?php if($resturantWorkCount['lunch_available']==0) echo 'hidden'; ?>" >Lunch</option>
											<option value="4" class="lgtgrey2_bg <?php if($resturantWorkCount['dinner_available']==0) echo 'hidden'; ?>" >Dinner</option>	
											<option value="5" class="lgtgrey2_bg <?php if($resturantWorkCount['alcohol_available']==0) echo 'hidden'; ?>" >Alcohol</option>
											 	 
											</select>
												
											</div>
										 
											 
										</div>
										
										
										
										<div class="on_clmn   mart10 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Food category" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
												 <div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												
												<select name="category_id" id="category_id"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir dropdown-bg" > 
											 <option value="0">Select category</option> 
											 
											 	 
											</select>
												
											</div>
										 
											 
										</div>
										
										<div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Dish name" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
											 <div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="dish_name" id="dish_name" placeholder="Title" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											</div>
										 
											 
										</div>
										
										<div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Description" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										
										<div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												
												
												<input type="text" name="dish_detail" id="dish_detail" placeholder="Description" class="wi_100   lgtgrey_bg txtind10 brd  tall minhei_55p fsz18     llgrey_txt ffamily_avenir"/> 
												
											</div>
											 
										 
										</div>
										
									
									<div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Type of food" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										
										<div class="wi_100 maxwi_500p ovfl_hid padt10 brdb">
										 
										<div class="category-apps email-collab marrbl-2 uppercase fsz12">
										 
										 <?php $i=0; foreach($foodTypeInformation as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<a href="javascript:void();" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h  lgtgrey_bg  brdr black_txt connect" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>"> <span class="dblock pi1<?php echo $i; ?>"></span><?php echo substr($value['food_type'],0,13); ?></a>
														<?php $i++; } ?>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
										
										
										 	
											
								 
									 
								 <div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Price" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
								 
								 <div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												
												
												<input type="number" name="dish_price" id="dish_price" placeholder="Price" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											</div>
											 
										 
										</div>
								
								
							 		<div class="on_clmn mart20 marb35">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  ">
											<div class="cropped_image   grey_brd5  " style="background-image: <?php echo '../../usercontent/images/default-profile-pic.jpg'; ?>;" id="image-data" name="image-data"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
						</div>
										 
										 
									  	<input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir"> <a href="javascript:void();" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	</body>
	 						