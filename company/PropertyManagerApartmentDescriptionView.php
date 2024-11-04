<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
	<script>
	function getAreaDetail(id)
				{
					$('#errorMsg').html('');
				var send_data={};
				 send_data.city_id=id;
				 
				 $.ajax({
							type:"POST",
							url:"../getAreaInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
							$('#varea').html('');
							$('#varea').html(data1); 	  	
							 	  
							}
						});	
				}
	function updatePropertyType(id)
	   {
		   $("#property_type_detail").val(id);
	   }
		function submitform()
		{
			var total_pic=parseInt($('#total_pics').val())+parseInt($('#indexing_save').val());
			 
			$("#errorMsg1").html('');
			if(total_pic<5)
			{
				
				$("#errorMsg1").html('Please add minimum five images');
				return false;
			}
			 
			 if($("#property_type_detail").val()==null || $("#property_type_detail").val()=="")
			{
				
				$("#errorMsg1").html('Please select property type');
				return false;
			}
			if($("#vcity").val()==0)
			{
				
				$("#errorMsg1").html('Please select city');
				return false;
			}
			
			
			if($("#varea").val()==0)
			{
				
				$("#errorMsg1").html('Please select area');
				return false;
			}
			 
			 if($("#property_title").val()==null || $("#property_title").val()=="")
			{
				
				$("#errorMsg1").html('Please enter property title');
				return false;
			}
			
			if($("#bedroom_count").val()==0)
			{
				
				$("#errorMsg1").html('Please enter available bedrooms');
				return false;
			}
			 
			
				if($("#bathroom_count").val()==0)
			{
				
				$("#errorMsg1").html('Please enter available bathrooms');
				return false;
			}
			 if($("#price_per_night").val()==0)
			{
				
				$("#errorMsg1").html('Please enter price per night');
				return false;
			}
			
			 if($("#seller_price_per_night").val()==0)
			{
				
				$("#errorMsg1").html('Please enter selling price per night');
				return false;
			} 
			 
			document.getElementById('save_indexing').submit();
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
                        <a href="../propertyList/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../propertyList/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		<?php $path1 = $path."html/usercontent/images/"; ?>
		 <script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		
		$('#imagesUp').attr('style','display:block;');
		value_ind=parseInt($('#indexing_save').val())+1;
		reader.onload = function (e) {
            $('#imgs'+value_ind)
                .attr('src', e.target.result)
                .width(100)
                .height(100);
				 
				$('#image_data'+value_ind).val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }
	$("#file1").val('');
	var total_img=parseInt($('#indexing_save').val())+2;
	var total_img1=parseInt($('#indexing_save').val())+1;
	$('#indexing_save').val(total_img1);
	var newImg='<img src="<?php echo $path1; ?>default-profile-pic.jpg" id="imgs'+total_img+'" name="imgs'+total_img+'" width="100" height="100"  class="fleft padl5"/> ';
	var mData='<input type="hidden" id="image_data'+total_img+'" name="image_data'+total_img+'" />';
	$('#imagesUp').append(newImg);
	$('#more_data').append(mData);
}

function moreImages()
{
	var total_img=parseInt($('#indexing_save').val());
	if($('#image_data'+total_img).val()=="")
	{
		alert('please select image first'); return false;
	}
	$("#file1").val();
	var total_img=parseInt($('#indexing_save').val())+1;
	$('#indexing_save').val(total_img);
	var newImg='<img src="<?php echo $path1; ?>default-profile-pic.jpg" id="imgs'+total_img+'" name="imgs'+total_img+'" class="mart20 padl10" width="100" height="100" />';
	var mData='<input type="hidden" id="image_data'+total_img+'" name="image_data'+total_img+'" />';
	$('#imagesUp').append(newImg);
	$('#more_data').append(mData);
}
</script>
		
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10   trn ffamily_avenir" >Property</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please provide the basic information about your property below.</a></div>
			 
					 <div class="clear"></div>
							
		<form action="../addPropertyApartment/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="UTF-8">
								
								 <input type="hidden" id="image_data1" name="image_data1" />
								<div id="more_data"></div>
								 <div class="on_clmn mart10 xxs-mart10 marb30 marrl30 xs-marrl0" id="imagesUp" style="display:block;">
									 
										<img src="<?php echo $path1; ?>default-profile-pic.jpg" id="imgs1" name="imgs1" width="100" height="100"   class="fleft" />
										 
										
										</div>
										<div class="clear"></div>
									<div class="on_clmn mart35">
									 
										<div class="thr_clmn  wi_60 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 dflex alit_c">
											
											<label class="forword ">
												Add photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div>
											</div>
											</div>
											</div>
											</div>
												<div class="clear"></div>
											 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Property type</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">What type of property does it apply to?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									  <div id="propertyTypeInfo" class="padt10">
									<div class="clear"></div>
									<?php 
												foreach($propertyType as $category => $value) 
												{
													
													
												?> 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updatePropertyType(<?php echo $value['id']; ?>)"><input data-testid="test-checkbox-Walls" name="property_type" type="radio" class="css-radio-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText"><?php echo str_ireplace('&','and',$value['property_type']); ?></label></div>
															
															</div>
															
												<?php } ?>	
										<input type="hidden" id="property_type_detail" name="property_type_detail" />
														
										</div>
											
											<div class="clear"></div>
									  <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Location</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please select your preffered location?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									<div class="on_clmn padt10">
												 <div class="thr_clmn  wi_50 padr5">  
											<div class="pos_rel">
												<select id="vcity" name="vcity" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l" onchange="getAreaDetail(this.value)">
														
													 <?php echo $vitechCityList; ?>
														</select>
												 <label for="vcity" class="floating__label tall nobold padl10" data-content="Vitech city">
											<span class="hidden--visually">
											  Vitech city</span></label>
												 
											</div>
											 
											 
											</div>
											
											
											<div class="thr_clmn  wi_50 padl5">
											 
										  
											 
											<div class="pos_rel">
												<select id="varea" name="varea" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
														
													<option value="0">Select</option>
														</select>
												 <label for="varea" class="floating__label tall nobold padl10" data-content="Vitech area">
											<span class="hidden--visually">
											  Vitech area</span></label>
											  
												 
											 
											 </div>
											 
											</div>
											</div>
									
									 
											<div class="clear"></div>
											 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Title</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please provide a suitable name for property.</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="text" name="property_title" id="property_title" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"  > 
												
											 <label for="property_title" class="floating__label tall nobold padl10  " data-content="Title">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 
											 </div>
												 
											<div class="clear"></div>
											 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Bedrooms</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How many bedrooms are there in this property.</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="number" name="bedroom_count" id="bedroom_count" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" min=1 value="1"> 
												
											 <label for="bedroom_count" class="floating__label tall nobold padl10  " data-content="Total bedrooms">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 
											 </div>
												<div class="clear"></div>
											 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Bathrooms</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How many bathrooms are there in this property.</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="number" name="bathroom_count" id="bathroom_count" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" min=1 value="1"> 
												
											 <label for="bathroom_count" class="floating__label tall nobold padl10  " data-content="Total bathrooms">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 
											 </div>
									 	<div class="clear"></div>
										
									  <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Pets</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Do you allow pets in the property?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 <script>
										function updatePetType(id)
										   {
											   $("#pets_info_detail").val(id);
											   if(id==0)
											   {
												   $("#petsInfo").addClass('hidden');
												   $("#pet_fee").val(0);
											   }
											   else
												   {
												   $("#petsInfo").removeClass('hidden');
												   $("#pet_fee").val(0);
											   }
										   }
										</script>
										
										<div class="clear"></div>
									<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updatePetType(1)"><input data-testid="test-checkbox-Walls" name="pets_info" type="radio" class="css-radio-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Yes</label></div>
															
															</div>
															
											<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updatePetType(0)"><input data-testid="test-checkbox-Walls" name="pets_info" type="radio" class="css-radio-1lgzhz8" checked></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">No</label></div>
															
															</div>	
										<input type="hidden" id="pets_info_detail" name="pets_info_detail" value="0" />
										
									  <div id="petsInfo" class="padt10 hidden">
									<div class="clear"></div>
											 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Pet fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How much do you charge for pet entry.</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="number" name="pet_fee" id="pet_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" min=0 value="0"> 
												
											 <label for="pet_fee" class="floating__label tall nobold padl10  " data-content="Pet entry fee">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 
											 </div>
									 	<div class="clear"></div>
															
										</div>
										<div class="clear"></div>
										  <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Disable</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Do you allow disabled person in the property?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 <script>
										function updateDisableType(id)
										   {
											   $("#disable_info_detail").val(id);
											    
										   }
										</script>
										
										<div class="clear"></div>
									<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updateDisableType(1)"><input data-testid="test-checkbox-Walls" name="disable_info" type="radio" class="css-radio-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Yes</label></div>
															
															</div>
															
											<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updateDisableType(0)"><input data-testid="test-checkbox-Walls" name="disable_info" type="radio" class="css-radio-1lgzhz8" checked></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">No</label></div>
															
															</div>	
										<input type="hidden" id="disable_info_detail" name="disable_info_detail" value="0" />
										
										<div class="clear"></div>
										 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Owner price</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please enter owner pricing detail</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									 <div class="on_clmn">
											<div class="thr_clmn  wi_33 padr5"> 
											<div class="pos_rel">
												
												<input type="number" name="price_per_night" id="price_per_night" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" min=0 value="0"> 
												
											 <label for="price_per_night" class="floating__label tall nobold padl10  " data-content="Price per night">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 </div>
											<div class="thr_clmn  wi_33 padr5"> 
											<div class="pos_rel">
												
												<input type="number" name="deposit_fee" id="deposit_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"  min=0 value="0"> 
												
											 <label for="deposit_fee" class="floating__label tall nobold padl10  " data-content="Deposit fee">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 </div>
											 <div class="thr_clmn  wi_33"> 
											<div class="pos_rel">
												
												<input type="number" name="cleaning_fee" id="cleaning_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"  min=0 value="0"> 
												
											 <label for="cleaning_fee" class="floating__label tall nobold padl10  " data-content="Cleaning fee">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 </div>
											</div>
									
									<div class="clear"></div>
										 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Seller price</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please enter seller pricing detail</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									 <div class="on_clmn">
											<div class="thr_clmn  wi_50 padr5"> 
											<div class="pos_rel">
												
												<input type="number" name="seller_price_per_night" id="seller_price_per_night" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" min=0 value="0"> 
												
											 <label for="seller_price_per_night" class="floating__label tall nobold padl10  " data-content="Price per night">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 </div>
											<div class="thr_clmn  wi_50 padl5"> 
											<div class="pos_rel">
												
												<input type="number" name="seller_deposit_fee" id="seller_deposit_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"  min=0 value="0"> 
												
											 <label for="deposit_fee" class="floating__label tall nobold padl10  " data-content="Deposit fee">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 </div>
											 
											</div>
											
									<div class="on_clmn padt10">
											<div class="thr_clmn  wi_50 padr5"> 
											<div class="pos_rel">
												
												<input type="number" name="seller_cleaning_fee" id="seller_cleaning_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"  min=0 value="0"> 
												
											 <label for="seller_cleaning_fee" class="floating__label tall nobold padl10  " data-content="Cleaning fee">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 </div>
											<div class="thr_clmn  wi_50 padl5"> 
											<div class="pos_rel">
												
												<input type="number" name="late_arrival_fee" id="late_arrival_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"  min=0 value="0"> 
												
											 <label for="late_arrival_fee" class="floating__label tall nobold padl10  " data-content="Late arrival fee">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 </div>
											 
											</div>
									
									 	<div class="clear"></div>
										  <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Parking</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Do you parking available in the property?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 <script>
										function updateParkingType(id)
										   {
											   $("#parking_info_detail").val(id);
											   if(id==0)
											   {
												   $("#parkingInfo").addClass('hidden');
												   $("#parking_fee").val(0);
											   }
											   else
												   {
												   $("#parkingInfo").removeClass('hidden');
												   $("#parking_fee").val(0);
											   }
										   }
										</script>
										
										<div class="clear"></div>
									<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updateParkingType(1)"><input data-testid="test-checkbox-Walls" name="parking_info" type="radio" class="css-radio-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Yes</label></div>
															
															</div>
															
											<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updateParkingType(0)"><input data-testid="test-checkbox-Walls" name="parking_info" type="radio" class="css-radio-1lgzhz8" checked></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">No</label></div>
															
															</div>	
										<input type="hidden" id="parking_info_detail" name="parking_info_detail" value="0" />
										
									  <div id="parkingInfo" class="padt10 hidden">
									<div class="clear"></div>
											 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Parking fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How much do you charge for parking.</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="number" name="parking_fee" id="parking_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" min=0 value="0"> 
												
											 <label for="parking_fee" class="floating__label tall nobold padl10  " data-content="Parking fee">
											<span class="hidden--visually ">
											  First name</span></label>
											</div>
											 
											 </div>
									 	<div class="clear"></div>
															
										</div>
									 
									 <div class="clear"></div>
									 <input type="hidden" id="total_pics" name="total_pics" value="0" />
								 <input type="hidden" id="indexing_save" name="indexing_save" value="0" />
								 <div class="clear"></div>
								 
							 
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
											</div>
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
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
	 
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
		
			<script>
			 
		function updateInd(id)
			{
				id1=$("#ind").val();
				 
				 id1 = id1.replace(id+",", "");
				 $("#ind").val(id1);
			}
			
			function updateInd1(id)
			{
				id1=$("#ind1").val();
				 
				 id1 = id1.replace(id+",", "");
				 $("#ind1").val(id1);
			}
			
			function updateInd2(id)
			{
				id1=$("#ind2").val();
				 
				 id1 = id1.replace(id+",", "");
				 $("#ind2").val(id1);
			}
			
			function updateInd3(id)
			{
				id1=$("#ind3").val();
				 
				 id1 = id1.replace(id+",", "");
				 $("#ind3").val(id1);
			}
			
			// Collborators autocomplete
			var $col_cont = $('#collaborators-container'),
			$col_form = $("#save_indexing"),
			$lookup = $("#collaborators-lookup");
			var col_html='';
			
			if($col_cont[0] && $lookup[0]){
				$lookup
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../../getAirports",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							id1=$("#ind").val()+'' +indset + ',' ;
							$lookup.data('item', item);
							event.target.value = item['label'];
							$("#ind").val(id1);
							//alert($('#collaborators-lookup').val());
							col_html='<div class="collaborator-row dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + item['label'].charAt(0).toUpperCase() + '</div>';
							col_html += '<div class="flex_1 padr40 padl15 fsz13">';
						
							col_html += '<div><strong>' + item['airport_name'] +  '</strong></div>';
						
						
						col_html += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont.append(col_html);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				 
			}
			
			
			var $col_cont1 = $('#collaborators-container1'),
			//$col_form = $("#save_indexing"),
			$lookup1 = $("#collaborators-lookup1");
			var col_html1='';
			
			if($col_cont1[0] && $lookup1[0]){
				$lookup1
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../../getLanguages",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							id1=$("#ind1").val()+'' +indset + ',' ;
							$lookup1.data('item', item);
							event.target.value = item['label'];
							$("#ind1").val(id1);
							//alert($('#collaborators-lookup1').val());
							col_html1='<div class="collaborator-row1 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + item['label'].charAt(0).toUpperCase() + '</div>';
							col_html1 += '<div class="flex_1 padr40 padl15 fsz13">';
						
							col_html1 += '<div><strong>' + item['lang_eng'] +  '</strong></div>';
						
						
						col_html1 += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row1"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd1('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont1.append(col_html1);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup1.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				 
			}
			
			
			var $col_cont2 = $('#collaborators-container2'),
			//$col_form = $("#save_indexing"),
			$lookup2 = $("#collaborators-lookup2");
			var col_html2='';
			
			if($col_cont2[0] && $lookup2[0]){
				$lookup2
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../../getCurrency",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							id1=$("#ind2").val()+'' +indset + ',' ;
							$lookup2.data('item', item);
							event.target.value = item['label'];
							$("#ind2").val(id1);
							//alert($('#collaborators-lookup2').val());
							col_html2='<div class="collaborator-row2 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + item['label'].charAt(0).toUpperCase() + '</div>';
							col_html2 += '<div class="flex_1 padr40 padl15 fsz13">';
						
							col_html2 += '<div><strong>' + item['short_name'] +  '</strong></div>';
						
						
						col_html2 += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row2"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd2('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont2.append(col_html2);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup2.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				 
			}
			
			
			var $col_cont3 = $('#collaborators-container3'),
			//$col_form = $("#save_indexing"),
			$lookup3 = $("#collaborators-lookup3");
			var col_html3='';
			
			if($col_cont3[0] && $lookup3[0]){
				$lookup3
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "../../getCards",
							data: {
								filter: request.term
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							id1=$("#ind3").val()+'' +indset + ',' ;
							$lookup3.data('item', item);
							event.target.value = item['label'];
							$("#ind3").val(id1);
							//alert($('#collaborators-lookup3').val());
							col_html3='<div class="collaborator-row3 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + item['label'].charAt(0).toUpperCase() + '</div>';
							col_html3 += '<div class="flex_1 padr40 padl15 fsz13">';
						
							col_html3 += '<div><strong>' + item['card_name'] +  '</strong></div>';
						
						
						col_html3 += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row3"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd3('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont3.append(col_html3);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup3.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
				 
			}
		</script>
	
										
	</body>
	<?php 
		if(isset($_GET['error']))
		{
			if($_GET['error']==1)
			{
				echo '<script>alert("Some error occured while completing your request !!!")</script>';	
			}
			else if($_GET['error']==2)
			{
				echo '<script>alert("You have an active employee for the same email !!!")</script>';	
			}
		}
	?>							