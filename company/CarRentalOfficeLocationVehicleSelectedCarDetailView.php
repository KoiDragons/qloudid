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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/floatingLabel.css">
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
	function updateRoomServiceDetail(id)
	{
		if(id==1)
		{
			$('#roomServiceDetail').removeClass('hidden');
		}
		else
		{
			$('#roomServiceDetail').addClass('hidden');
			$('#delivery_fee').val(0);
			$('#room_service_opening').val('00:00');
			$('#room_service_closing').val('00:00');
		}
	}
	var year_m=<?php echo date('Y'); ?>;
 
	 
		function submitform()
		{
			var total_pic=parseInt($('#total_pics').val())+parseInt($('#indexing_save').val());
			 
			$("#errorMsg1").html('');
			if($("#car_rental_price").val()==0 || $("#car_rental_price").val()=='' || $("#car_rental_price").val()==null) 
				{
					$("#errorMsg1").html('Please enter rental price per day');
					return false;
				}
				
				if(isNaN($("#car_rental_price").val())) 
				{
					$("#errorMsg1").html('Rental price must be a numeric value');
					return false;
				}
			if($("#car_manufecturing_year").val()==0 || $("#car_manufecturing_year").val()=='' || $("#car_manufecturing_year").val()==null) 
				{
					$("#errorMsg1").html('Please enter manufecturing year');
					return false;
				}
				
				if($("#car_manufecturing_year").val()<1700 || $("#car_manufecturing_year").val()>year_m) 
				{
					$("#errorMsg1").html('Please enter a valid manufecturing year');
					return false;
				}
				
				if(isNaN($("#car_rental_price").val())) 
				{
					$("#errorMsg1").html('Manufecturing year must be a numeric value');
					return false;
				}
				
				if($("#car_registration_number").val()=='' || $("#car_registration_number").val()==null) 
				{
					$("#errorMsg1").html('Please enter registration number');
					return false;
				}
				var i=0;
				for(i=1;i<=8;i++)
				{
					if($('#feeDetail'+i).val()=='' || $('#feeDetail'+i).val()==null)
					{
					$("#errorMsg1").html('Please enter numeric value for fee');
					return false;	
					}
					if(isNaN($('#feeDetail'+i).val()))
					{
					$("#errorMsg1").html('Please enter numeric value for fee');
					return false;	
					}
				}
				var send_data={};
	
				send_data.id=$("#car_registration_number").val();
					$.ajax({
							type:"POST",
							url: "../../../../checkRegistrationNumber/<?php echo $data['car_id']; ?>",
							data:send_data,
						})
						.done(function(data){
							if(data>0)
							{
							$("#errorMsg1").html('Registration number already in use by other car');
							return false;	
							}
							else
							{
									document.getElementById('save_indexing').submit();
							}
						});
				 		
				
		
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
                        <a href="../../../../vehicleTypeCarList/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>/<?php echo $data['vtype_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../../../vehicleTypeCarList/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>/<?php echo $data['vtype_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10   trn ffamily_avenir" >Car info</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please provide the basic information about your car below.</a></div>
			 
					 <div class="clear"></div>
							
							<form action="../../../../updateCarDetail/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>/<?php echo $data['vtype_id']; ?>/<?php echo $data['car_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="UTF-8">
								
								 <input type="hidden" id="image_data1" name="image_data1" />
								<div id="more_data"></div>
								 <div class="on_clmn mart10 xxs-mart10 marb30 marrl30 xs-marrl0" id="imagesUp" style="display:<?php if(count($carImages)==0) { echo 'none'; } else echo 'block'; ?>;">
										<?php foreach($carImages as $category => $value) 
														{ $value_a=file_get_contents("../estorecss/".$value ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); ?>
										<img src="<?php echo $value_a; ?>" id="imgs" name="imgs" width="100" height="100"   class="fleft padr10" />
										<?php } ?> 
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
											</div></div>
											
											</div>
											</div>
											
										</div>
								  <input type="hidden" id="total_pics" name="total_pics" value="<?php echo count($carImages); ?>" />
								 <input type="hidden" id="indexing_save" name="indexing_save" value="0" />
								 <div class="clear"></div>
								<div class="marb0 padtrl0">		 
							 
									<div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_color" id="car_color" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;" >
											<option value="0" class="lgtgrey2_bg">Select</option>	
											<?php foreach($carColors as $category => $value) { ?>
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($vehicleTypeSelectedCarDetail['car_color']==$value['id'])  echo 'selected'; ?>><?php echo $value['color']; ?></option>
											<?php } ?>						
											</select>
												<label for="car_color" class="floating__label tall nobold padl10" data-content="Car color">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 		
											 
									<div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="fuel_type" id="fuel_type" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;">
											<option value="1" class="lgtgrey2_bg" <?php if($vehicleTypeSelectedCarDetail['fuel_type']==1)  echo 'selected'; ?>>Petrol</option>
											<option value="2" class="lgtgrey2_bg" <?php if($vehicleTypeSelectedCarDetail['fuel_type']==2)  echo 'selected'; ?>>Diesel</option>	
											<option value="3" class="lgtgrey2_bg" <?php if($vehicleTypeSelectedCarDetail['fuel_type']==3)  echo 'selected'; ?>>Electric</option>												
											</select>
												<label for="fuel_type" class="floating__label tall nobold padl10" data-content="Fuel type">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											<div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="transmission_type" id="transmission_type" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;">
											<option value="1" class="lgtgrey2_bg" <?php if($vehicleTypeSelectedCarDetail['transmission_type']==1)  echo 'selected'; ?>>Automatic</option>
											<option value="2" class="lgtgrey2_bg" <?php if($vehicleTypeSelectedCarDetail['transmission_type']==2)  echo 'selected'; ?>>Mannual</option>	
											 										
											</select>
												<label for="transmission_type" class="floating__label tall nobold padl10" data-content="Transmission">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>

											<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['car_price']; ?>" min="1" name="car_rental_price" id="car_rental_price" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="car_rental_price" class="floating__label tall nobold padl10" data-content="Price per day">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="thr_clmn  wi_50 padl10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['car_manufecturing_year']; ?>" min="1000" max="<?php echo date('Y'); ?>" name="car_manufecturing_year" id="car_manufecturing_year" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="car_manufecturing_year" class="floating__label tall nobold padl10" data-content="Manufecturing year">
											<span class="hidden--visually">
											 Check-out date</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
										 	</div>
											
											<div class="on_clmn  mart20  ">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="text" value="<?php echo $vehicleTypeSelectedCarDetail['car_registration_number']; ?>" min="1" name="car_registration_number" id="car_registration_number" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="car_registration_number" class="floating__label tall nobold padl10" data-content="Registration number">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="is_available" id="is_available" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;">
											<option value="0" class="lgtgrey2_bg">Select</option>	
										 
											<option value="1" class="lgtgrey2_bg" <?php if($vehicleTypeSelectedCarDetail['is_available']==1)  echo 'selected'; ?>>Yes</option>
											<option value="0" class="lgtgrey2_bg" <?php if($vehicleTypeSelectedCarDetail['is_available']==0)  echo 'selected'; ?>>No</option> 					
											</select>
												<label for="is_available" class="floating__label tall nobold padl10" data-content="Available for booking">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
										<script>
										 function updateFood(id)
										   {
											   foodValue=id;
											   dayValue=id;
										   }
										</script>
										
								 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Home delivery available?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($vehicleTypeSelectedCarDetail['home_delivery']==1) echo 'checked'; ?>" onclick="updateFood(1);">
																<input type="checkbox"  class="default" data-true="" data-false=""  >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div> 
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 <?php if($vehicleTypeSelectedCarDetail['home_delivery']==0) echo 'hidden'; ?>" id="food_1">
										 <div class="on_clmn">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['home_delivery_fee']; ?>" min="0" name="feeDetail1" id="feeDetail1" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="feeDetail1" class="floating__label tall nobold padl10" data-content="Home delivery fee">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 </div>
										 
										 <input type="hidden" id="food1" name="food1" value='<?php echo $vehicleTypeSelectedCarDetail['home_delivery']; ?>' />
									  
										 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Pick up delivery available?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($vehicleTypeSelectedCarDetail['pick_up_delivery']==1) echo 'checked'; ?>" onclick="updateFood(1);">
																<input type="checkbox"  class="default" data-true="" data-false=""  >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div> 
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 <?php if($vehicleTypeSelectedCarDetail['pick_up_delivery']==0) echo 'hidden'; ?>" id="food_2">
										 <div class="on_clmn">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['pick_up_delivery_fee']; ?>" min="0" name="feeDetail2" id="feeDetail2" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="feeDetail2" class="floating__label tall nobold padl10" data-content="Pick up delivery fee">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 </div>
										 
										 <input type="hidden" id="food2" name="food2" value='<?php echo $vehicleTypeSelectedCarDetail['pick_up_delivery']; ?>' />
									  	 
										  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Airport pick up?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($vehicleTypeSelectedCarDetail['airport_pickup']==1) echo 'checked'; ?>" onclick="updateFood(3);">
																<input type="checkbox"  class="default" data-true="" data-false=""  >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div> 
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 <?php if($vehicleTypeSelectedCarDetail['airport_pickup']==0) echo 'hidden'; ?>" id="food_3">
										 <div class="on_clmn">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['airport_pickup_fee']; ?>" min="0" name="feeDetail3" id="feeDetail3" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="feeDetail3" class="floating__label tall nobold padl10" data-content="Airport pick up fee">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 </div>
										 
										 <input type="hidden" id="food3" name="food3" value='<?php echo $vehicleTypeSelectedCarDetail['airport_pickup']; ?>' />
									  	 
										 
										  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Airport drop off?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($vehicleTypeSelectedCarDetail['airport_dropoff']==1) echo 'checked'; ?>" onclick="updateFood(4);">
																<input type="checkbox"  class="default" data-true="" data-false=""  >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div> 
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 <?php if($vehicleTypeSelectedCarDetail['airport_dropoff']==0) echo 'hidden'; ?>" id="food_4">
										 <div class="on_clmn">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['airport_dropoff_fee']; ?>" min="0" name="feeDetail4" id="feeDetail4" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="feeDetail4" class="floating__label tall nobold padl10" data-content="Airport drop off fee">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 </div>
										 
										 <input type="hidden" id="food4" name="food4" value='<?php echo $vehicleTypeSelectedCarDetail['airport_dropoff']; ?>' />
									  	 
										 
										  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Deposit fee?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($vehicleTypeSelectedCarDetail['deposit_applicable']==1) echo 'checked'; ?>" onclick="updateFood(5);">
																<input type="checkbox"  class="default" data-true="" data-false=""  >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div> 
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 <?php if($vehicleTypeSelectedCarDetail['deposit_applicable']==0) echo 'hidden'; ?>" id="food_5">
										 <div class="on_clmn">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['deposit_fee']; ?>" min="0" name="feeDetail5" id="feeDetail5" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="feeDetail5" class="floating__label tall nobold padl10" data-content="Deposit fee">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 </div>
										 
										 <input type="hidden" id="food5" name="food5" value='<?php echo $vehicleTypeSelectedCarDetail['deposit_applicable']; ?>' />
									  	 
										 
										  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="GPS available?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($vehicleTypeSelectedCarDetail['gps_available']==1) echo 'checked'; ?>" onclick="updateFood(6);">
																<input type="checkbox"  class="default" data-true="" data-false=""  >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div> 
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 <?php if($vehicleTypeSelectedCarDetail['gps_available']==0) echo 'hidden'; ?>" id="food_6">
										 <div class="on_clmn">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['gps_fee']; ?>" min="0" name="feeDetail6" id="feeDetail6" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="feeDetail6" class="floating__label tall nobold padl10" data-content="GPS fee">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 </div>
										 
										 <input type="hidden" id="food6" name="food6" value='<?php echo $vehicleTypeSelectedCarDetail['gps_available']; ?>' />
									  	 
										 
										  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Child seat available?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($vehicleTypeSelectedCarDetail['child_seat']==1) echo 'checked'; ?>" onclick="updateFood(7);">
																<input type="checkbox"  class="default" data-true="" data-false=""  >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div> 
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 <?php if($vehicleTypeSelectedCarDetail['child_seat']==0) echo 'hidden'; ?>" id="food_7">
										 <div class="on_clmn">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['child_seat_fee']; ?>" min="0" name="feeDetail7" id="feeDetail7" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="feeDetail7" class="floating__label tall nobold padl10" data-content="Child seat fee">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 </div>
										 
										 <input type="hidden" id="food7" name="food7" value='<?php echo $vehicleTypeSelectedCarDetail['child_seat']; ?>' />
									  	 
										 
										  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Home delivery available?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($vehicleTypeSelectedCarDetail['additional_driver']==1) echo 'checked'; ?>" onclick="updateFood(8);">
																<input type="checkbox"  class="default" data-true="" data-false=""  >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div> 
										
										 <div class="container column_m lgtgrey2_bg mart20 padrl20 <?php if($vehicleTypeSelectedCarDetail['additional_driver']==0) echo 'hidden'; ?>" id="food_8">
										 <div class="on_clmn">	
									 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="<?php echo $vehicleTypeSelectedCarDetail['additional_driver_fee']; ?>" min="0" name="feeDetail8" id="feeDetail8" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="feeDetail8" class="floating__label tall nobold padl10" data-content="Driver fee">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 </div>
										 
										 <input type="hidden" id="food8" name="food8" value='<?php echo $vehicleTypeSelectedCarDetail['additional_driver']; ?>' />
									  	 
											
											 
										 	</div>
														
							  <div class="clear"></div>
								<div class=" padt20 red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
							
							<div class="talc padtb20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir" fdprocessedid="ys7aei">Update</button></a> </div>
					 
							
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
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
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