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
function selectAirport(id) {
	var send_data={};
	
	send_data.id=id;
	if(id.length >=4)
				{
						$.ajax({
							type:"POST",
							url: "../../getAirportValues",
							data:send_data,
						})
						.done(function(data){
							$('#airportDetail').html(data); 
						});
				}
					}
	function addType(id)
	{
		var getValue=$('#hotel_type').val();
		if($('#'+id).hasClass('green_bg'))
		{
			$('#'+id).removeClass('green_bg');
			$('#'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#hotel_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_bg');
			$('#'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#hotel_type").val(getValue);
		}
		
	}
	
	
	function addRoomType(id)
	{
		var getValue=$('#room_type_available').val();
		if($('#r'+id).hasClass('green_bg'))
		{
			$('#r'+id).removeClass('green_bg');
			$('#r'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#room_type_available").val(getValue);
		}
		else
		{
			$('#r'+id).addClass('green_bg');
			$('#r'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#room_type_available").val(getValue);
		}
		
	}
	
	function addPaymentType(id)
	{
		var getValue=$('#accepted_payments').val();
		if($('#p'+id).hasClass('green_bg'))
		{
			$('#p'+id).removeClass('green_bg');
			$('#p'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#accepted_payments").val(getValue);
		}
		else
		{
			$('#p'+id).addClass('green_bg');
			$('#p'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#accepted_payments").val(getValue);
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
			var total_pic=parseInt($('#total_pics').val())+parseInt($('#indexing_save').val());
			 
			$("#errorMsg1").html('');
			if(total_pic<5)
			{
				
				$("#errorMsg1").html('Please add minimum five images');
				return false;
			}
			 
			 if($("#h_name").val()==null || $("#h_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter hotel name');
				return false;
			}
			
			if($("#h_category").val()==0)
			{
				
				$("#errorMsg1").html('Please enter hotel category');
				return false;
			}
			
			if($("#hotel_type").val()=='')
			{
				
				$("#errorMsg1").html('Please choose hotel type');
				return false;
			}
			
				if($("#hotel_stars").val()==0)
			{
				
				$("#errorMsg1").html('Please enter hotel stars');
				return false;
			}
			 if($("#country_phone").val()==0)
			{
				
				$("#errorMsg1").html('Please select country code');
				return false;
			}
			
			if($("#hotel_description").val()==null || $("#hotel_description").val()=="")
			{
				
				$("#errorMsg1").html('Please enter hotel description');
				return false;
			}
			if($("#front_desk_phone").val()==null || $("#front_desk_phone").val()=="")
			{
				
				$("#errorMsg1").html('Please enter front desk phone number');
				return false;
			}
			 if($("#front_desk_email").val()==null || $("#front_desk_email").val()=="")
			{
				
				$("#errorMsg1").html('Please enter front desk  email');
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
	<body class="white_bg">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/HotelStay/locationInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/HotelStay/locationInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10   trn ffamily_avenir" >Stay</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please provide the basic information about your hotel below.</a></div>
			 
					 <div class="clear"></div>
							
							<form action="../../<?php if(isset($hotelInfo)) echo 'updateHotelDetail'; else echo 'addHotelDetail'; ?>/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="UTF-8">
								
								 <input type="hidden" id="image_data1" name="image_data1" />
								<div id="more_data"></div>
								 <div class="on_clmn mart10 xxs-mart10 marb30 marrl30 xs-marrl0" id="imagesUp" style="display:<?php if($hotelImagesCount==0) { echo 'none'; } else echo 'block'; ?>;">
										<?php foreach($hotelImages as $category => $value) 
														{ $value_a=file_get_contents("../estorecss/".$value ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); ?>
										<img src="<?php echo $value_a; ?>" id="imgs" name="imgs" width="100" height="100"   class="fleft padl10" />
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
								  <input type="hidden" id="total_pics" name="total_pics" value="<?php echo $hotelImagesCount; ?>" />
								 <input type="hidden" id="indexing_save" name="indexing_save" value="0" />
								 <div class="clear"></div>
								<div class="marb0 padtrl0">		 
							 
											
											 
											
											<input type="hidden" name="hotel_type" id="hotel_type" value="<?php if(isset($hotelInfo)) echo $hotelInfo['hotel_type'];  ?>" />
											
											 <div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<input type="text" name="h_name" id="h_name" placeholder="Hotel name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['hotel_name'];  ?>"/> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="h_category" id="h_category"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Hotel Category</option> 
													<?php  foreach($hotelCategory as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if(isset($hotelInfo)) if($hotelInfo['hotel_category']==$value['id']) echo 'selected'; ?>><?php echo $value['hotel_category']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												
												<select name="booking_type" id="booking_type"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											  
														<option value="1" class="lgtgrey2_bg" <?php  if($data['booking_type']==1) echo 'selected';  ?> >Online/Frontdesk checkin</option>
														<option value="2" class="lgtgrey2_bg"  <?php if($data['booking_type']==2) echo 'selected'; ?>>Frontdesk checkin</option>
														 
													 
											</select>
												
											</div>
											 
										</div>
										
										
										 <div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												
												<select name="payment_option" id="payment_option"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											  
														<option value="1" class="lgtgrey2_bg" <?php  if(isset($hotelInfo)) { if($hotelInfo['payment_option']==1) echo 'selected'; } ?> >Book and pay</option>
														<option value="2" class="lgtgrey2_bg"  <?php  if(isset($hotelInfo)) { if($hotelInfo['payment_option']==2) echo 'selected'; } ?>>Book now pay later</option>
														 
													 
											</select>
												
											</div>
											 
										</div>
										
										<div class="on_clmn  mart20  brdb">	
									 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Hotel type" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 
										 
											 
									 

										</div>
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">
										<?php  foreach($hotelType as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
			<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
				<input type="button" value="<?php echo substr($value['hotel_type'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?>  fsz18 white_txt curp" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>">
			</div>
														<?php } ?>

			
		</div>	
											
								 
									 
								 </div>
								 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<select name="hotel_stars" id="hotel_stars"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Hotel Stars</option> 
													<?php  foreach($hotelStars as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if(isset($hotelInfo)) if($hotelInfo['hotel_stars']==$value['id']) echo 'selected'; ?>><?php echo $value['hotel_stars']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="superior_classification" id="superior_classification"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Superior classification</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['superior_classification']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['superior_classification']==2) echo 'selected'; ?>>No</option>  
											</select>
												
											</div>
											</div>
										</div>
								
								 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												
												<input type="text" name="brand" id="brand" placeholder="Brand (e.g. Holiday inn)" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['hotel_brand'];  ?>"/> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
											
												<input type="text" name="chain" id="chain" placeholder="Chain (e.g. InterContinental Hotels Group)" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['hotel_chain'];  ?>"/> 
												
											</div>
											</div>
										</div>
								
								<div class="on_clmn mart20 ">
								<div class="thr_clmn  wi_30 padr10">
											<div class="pos_rel">
												
												<select name="country_phone" id="country_phone"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Country code</option> 
													<?php  foreach($countryOption as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if(isset($hotelInfo)) if($hotelInfo['fdesk_country_code']==$value['id']) echo 'selected'; ?>>+<?php echo $value['country_code']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_70 padl10">
											<div class="pos_rel">
												
												<input type="text" name="front_desk_phone" id="front_desk_phone" placeholder="Front desk phone" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['fdesk_phone_number'];  ?>"/> 
												
											</div>
											</div>
											
										</div>
										
										<div class="on_clmn mart20 ">
								<div class="thr_clmn  wi_30 padr10">
											<div class="pos_rel">
												
												<select name="country_fax" id="country_fax"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Country code</option> 
													 
													<?php  foreach($countryOption as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if(isset($hotelInfo)) if($hotelInfo['fdesk_fax_country_code']==$value['id']) echo 'selected'; ?>>+<?php echo $value['country_code']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_70 padl10">
											<div class="pos_rel">
												
												<input type="text" name="front_desk_fax" id="front_desk_fax" placeholder="Front desk fax" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['fdesk_fax'];  ?>"/> 
												
											</div>
											</div>
											
										</div>
										
										<div class="on_clmn mart20 ">
								 
											<div class="pos_rel">
												
												<input type="text" name="front_desk_email" id="front_desk_email" placeholder="Front desk email" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['fdesk_email'];  ?>"/> 
												
											</div>
											 
											 
										</div>
										 
									 
										<div class="on_clmn mart20 ">
								<div class="thr_clmn  wi_20 padr10">
											<div class="pos_rel">
												
												<select name="webType" id="webType"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="http://" <?php if(isset($hotelInfo)) if($hotelInfo['web_type']=='http://') echo 'selected'; ?>>http://</option> 
											 <option value="https://" <?php if(isset($hotelInfo)) if($hotelInfo['web_type']=='https://') echo 'selected'; ?>>https://</option> 	 
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_80 padl10">
											<div class="pos_rel">
												
												<input type="text" name="h_website" id="h_website" placeholder="Website" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['website'];  ?>"/> 
												
											</div>
											</div>
											
										</div>
										<div class="on_clmn mart20 ">
								<div class="thr_clmn  wi_30 padr10">
											<div class="pos_rel">
												
												<select name="country_phoner" id="country_phoner"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											  <option value="0">Country code</option> 
													<?php  foreach($countryOption as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if(isset($hotelInfo)) if($hotelInfo['rdept_country_code']==$value['id']) echo 'selected'; ?>>+<?php echo $value['country_code']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_70 padl10">
											<div class="pos_rel">
												
												<input type="text" name="reservation_dept_phone" id="reservation_dept_phone" placeholder="Reservation dept phone" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['rdept_phone_number'];  ?>"/> 
												
											</div>
											</div>
											
										</div>
										
										<div class="on_clmn mart20 ">
								<div class="thr_clmn  wi_30 padr10">
											<div class="pos_rel">
												
												<select name="country_faxr" id="country_faxr"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Country code</option> 
													<?php  foreach($countryOption as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if(isset($hotelInfo)) if($hotelInfo['rdept_fax_country_code']==$value['id']) echo 'selected'; ?>>+<?php echo $value['country_code']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_70 padl10">
											<div class="pos_rel">
												
												<input type="text" name="reservation_dept_fax" id="reservation_dept_fax" placeholder="Reservation dept fax" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['rdept_fax_number'];  ?>"/> 
												
											</div>
											</div>
											
										</div>
										
										<div class="on_clmn mart20 ">
								 
											<div class="pos_rel">
												
												<input type="text" name="reservation_dept_email" id="reservation_dept_email" placeholder="Reservation dept email" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['rdept_email'];  ?>"/> 
												
											</div>
											 
											 
										</div>
										
										<div class="on_clmn mart20 ">
								<div class="thr_clmn  wi_20 padr10">
											<div class="pos_rel">
												
												<select name="facebookType" id="facebookType"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="http://" <?php if(isset($hotelInfo)) if($hotelInfo['facebook_type']=='http://') echo 'selected'; ?>>http://</option> 
											 <option value="https://" <?php if(isset($hotelInfo)) if($hotelInfo['facebook_type']=='https://') echo 'selected'; ?>>https://</option> 		 
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_80 padl10">
											<div class="pos_rel">
												
												<input type="text" name="facebook" id="facebook" placeholder="Facebook" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['facebook_address'];  ?>"/> 
												
											</div>
											</div>
											
										</div>
										
										<div class="on_clmn mart20  ">
								<div class="thr_clmn  wi_20 padr10">
											<div class="pos_rel">
												
												<select name="twitterType" id="twitterType"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="http://" <?php if(isset($hotelInfo)) if($hotelInfo['twitter_type']=='http://') echo 'selected'; ?>>http://</option> 
											 <option value="https://" <?php if(isset($hotelInfo)) if($hotelInfo['twitter_type']=='https://') echo 'selected'; ?>>https://</option> 		 
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_80 padl10">
											<div class="pos_rel">
												
												<input type="text" name="twitter" id="twitter" placeholder="Twitter" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['twitter_address'];  ?>"/> 
												
											</div>
											</div>
											
										</div>
										
										<div class="on_clmn mart20 ">
								
											<div class="pos_rel">
												
												<input type="text" name="airport_code" id="airport_code"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg  llgrey_txt tall padl0 ffamily_avenir " style="text-align-last:center;" onkeyup="selectAirport(this.value);" list="airportDetail" placeholder="Search airport" value="<?php if(isset($hotelInfo)) echo $hotelInfo['airport_code'];  ?>"> 
											  
												<datalist id="airportDetail">
																		
																	</datalist>
											</div>
										
										</div>
										
										<div class="on_clmn  mart20   ">	
									 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Near by airports" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 
										 
											 
									 

										</div>
										 <div class="column_m container">
													<div id="collaborators-container">
										<div class="collaborator-row  alit_c pos_rel">
											<?php if(isset($nearest_airports)) { foreach($nearest_airports as $category => $value) { ?>
											 
											<div class="collaborator-row dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f"><?php echo substr($value['airport_name'],0,1); ?></div>
							<div class="flex_1 padr40 padl15 fsz13">
						
						<div><strong><?php echo $value['airport_name']; ?></strong></div>
						
						
						</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd(<?php echo $value['id']; ?>);"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div> 
											<?php } } ?>
										</div>
									</div> 
									</div> 
									<div class="on_clmn   ">
								 
											 
											<div class="pos_rel">
												
												<input type="text" name="nearby_airports"  placeholder="Select nearby airports" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg   llgrey_txt talc padl0 ffamily_avenir ui-autocomplete-input"  id="collaborators-lookup" autocomplete="off"/> 
												
											</div>
										 
											
										</div>
										
										<input type="hidden" id="ind" name="ind" value="<?php if(isset($hotelInfo)) echo $hotelInfo['nearest_airports'];  ?>" />
										
										<div class="on_clmn  mart20   ">	
									 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Languages spoken by staff" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 
										 
											 
									 

										</div>
										
										 <div class="column_m container">
													<div id="collaborators-container1">
										<div class="collaborator-row1 alit_c pos_rel">
											<?php if(isset($languagesKnown)) { foreach($languagesKnown as $category => $value) { ?>
											 
											<div class="collaborator-row1 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f"><?php echo substr($value['lang_eng'],0,1); ?></div>
							<div class="flex_1 padr40 padl15 fsz13">
						
						<div><strong><?php echo $value['lang_eng']; ?></strong></div>
						
						
						</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row1"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd1(<?php echo $value['id']; ?>);"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div> 
											<?php } } ?>
										</div>
									</div> 
									</div> 
									<div class="on_clmn   ">
								 
											 
											<div class="pos_rel">
												
												<input type="text" name="languages_used_by_staff"  placeholder="Select Languages" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg   llgrey_txt talc padl0 ffamily_avenir ui-autocomplete-input"  id="collaborators-lookup1" autocomplete="off"/> 
												
											</div>
										 
											
										</div>
										
										<input type="hidden" id="ind1" name="ind1" value="<?php if(isset($hotelInfo)) echo $hotelInfo['languages_known'];  ?>" />
									
										
									
									
									
										<div class="on_clmn mart20 ">
								
											<div class="pos_rel">
												
												<select name="currency_used" id="currency_used"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Currency used for Hotel Data Cloud inputs </option> 
													<?php  foreach($availableCurrency as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if(isset($hotelInfo)) if($hotelInfo['currency_used']==$value['id']) echo 'selected'; ?>><?php echo $value['short_name']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
										
										</div>
										
										<div class="on_clmn  mart20   ">	
									 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Accepted currencies" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 
										 
											 
									 

										</div>
										
										 <div class="column_m container">
													<div id="collaborators-container2">
										<div class="collaborator-row2 alit_c pos_rel">
											<?php if(isset($acceptedCurrency)) { foreach($acceptedCurrency as $category => $value) { ?>
											 
											<div class="collaborator-row2 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f"><?php echo substr($value['short_name'],0,1); ?></div>
							<div class="flex_1 padr40 padl15 fsz13">
						
						<div><strong><?php echo $value['short_name']; ?></strong></div>
						
						
						</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row2"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd2(<?php echo $value['id']; ?>);"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div> 
											<?php } } ?>
										</div>
									</div> 
									</div> 
									<div class="on_clmn   ">
								 
											 
											<div class="pos_rel">
												
												<input type="text" name="accepted_currency"  placeholder="Select currency" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg   llgrey_txt talc padl0 ffamily_avenir ui-autocomplete-input"  id="collaborators-lookup2" autocomplete="off"/> 
												
											</div>
										 
											
										</div>
										
										<input type="hidden" id="ind2" name="ind2" value="<?php if(isset($hotelInfo)) echo $hotelInfo['accepted_currency'];  ?>" />
									
									
									<div class="on_clmn  mart20   ">	
									 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Loyalty cards" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 
										 
											 
									 

										</div>
										
										 <div class="column_m container">
													<div id="collaborators-container3">
										<div class="collaborator-row3 alit_c pos_rel">
											<?php if(isset($loyaltyCards)) { foreach($loyaltyCards as $category => $value) { ?>
											 
											<div class="collaborator-row3 dflex alit_c pos_rel mart10"><div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f"><?php echo substr($value['card_name'],0,1); ?></div>
							<div class="flex_1 padr40 padl15 fsz13">
						
						<div><strong><?php echo $value['card_name']; ?></strong></div>
						
						
						</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row3"><img src="<?php echo $path; ?>html/usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd3(<?php echo $value['id']; ?>);"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div> 
											<?php } } ?>
										</div>
									</div> 
									</div> 
									<div class="on_clmn   ">
								 
											 
											<div class="pos_rel">
												
												<input type="text" name="loyalty_cards"  placeholder="Select cards" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb   fsz18  minhei_65p xxs-minhei_60p trans_bg   llgrey_txt talc padl0 ffamily_avenir ui-autocomplete-input"  id="collaborators-lookup3" autocomplete="off"/> 
												
											</div>
										 
											
										</div>
										
										<input type="hidden" id="ind3" name="ind3" value="<?php if(isset($hotelInfo)) echo $hotelInfo['loyalty_cards'];  ?>" />
									
										
										
										<div class="on_clmn  mart20  brdb">	
									 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Available room type" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 
										 
											 
									 

										</div>
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">
										<?php  foreach($hotelRoomType as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
			<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
				<input type="button" value="<?php echo substr($value['room_type'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?>  fsz18 white_txt curp" onclick="addRoomType(<?php echo $value['id']; ?>);" id="r<?php echo $value['id']; ?>">
			</div>
														<?php } ?>

			
		</div>	
										<input type="hidden" id="room_type_available" name="room_type_available" value="<?php if(isset($hotelInfo)) echo $hotelInfo['room_type_available'];  ?>" />
										
										
										<div class="on_clmn  mart20  brdb">	
									 
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Accepted forms of payment" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 
										 
											 
									 

										</div>
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">
										<?php  foreach($paymentType as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
			<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
				<input type="button" value="<?php echo substr($value['payment_type'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?>  fsz18 white_txt curp" onclick="addPaymentType(<?php echo $value['id']; ?>);" id="p<?php echo $value['id']; ?>">
			</div>
														<?php } ?>

			
		</div>	
										<input type="hidden" id="accepted_payments" name="accepted_payments" value="<?php if(isset($hotelInfo)) echo $hotelInfo['accepted_payments'];  ?>" />
										
										 <div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="long_term_stay" id="long_term_stay"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Long term stay rooms/apartments available</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['long_term_stay']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['long_term_stay']==2) echo 'selected'; ?>>No</option>  
											</select>
												
											</div>
											 
										</div>
								
									 <div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="motel_type_room" id="motel_type_room"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Motel type rooms</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['motel_type_room']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['motel_type_room']==2) echo 'selected'; ?>>No</option> 
											</select>
												
											</div>
											 
										</div>
										
										 <div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="concierge_available" id="concierge_available"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Concierge available</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['concierge_available']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['concierge_available']==2) echo 'selected'; ?>>No</option>   
											</select>
												
											</div>
											 
										</div>
										
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="porter_bellhop" id="porter_bellhop"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Porter/Bellhop</option> 
												<option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['porter_bellhop']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['porter_bellhop']==2) echo 'selected'; ?>>No</option>  
											</select>
												
											</div>
											 
										</div>
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="doorman" id="doorman"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Doorman</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['doorman']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['doorman']==2) echo 'selected'; ?>>No</option>   
											</select>
												
											</div>
											 
										</div>
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="green_hotel" id="green_hotel"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Green hotel (environmentally friendly)</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['green_hotel']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['green_hotel']==2) echo 'selected'; ?>>No</option> 
											</select>
												
											</div>
											 
										</div>
										
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="adult_only" id="adult_only"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Adult only</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['adult_only']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['adult_only']==2) echo 'selected'; ?>>No</option> 
											</select>
												
											</div>
											 
										</div>
										
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="pet_allowed" id="pet_allowed"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Pets_allowed</option> 
												<option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['pet_allowed']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['pet_allowed']==2) echo 'selected'; ?>>No</option>  
											</select>
												
											</div>
											 
										</div>
										
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="dayrooms_available" id="dayrooms_available"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Dayrooms available</option> 
												<option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['dayrooms_available']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['dayrooms_available']==2) echo 'selected'; ?>>No</option>   
											</select>
												
											</div>
											 
										</div>
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="nonsmoking_hotel" id="nonsmoking_hotel"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Non-smoking hotel & property</option> 
												<option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['nonsmoking_hotel']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['nonsmoking_hotel']==2) echo 'selected'; ?>>No</option>  
											</select>
												
											</div>
											 
										</div>
										
										
										<div class="on_clmn mart20  ">
								 
											 
											<div class="pos_rel">
												
												<input type="text" name="hotel_description" id="hotel_description" placeholder="Hotel description" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['hotel_description'];  ?>"/> 
												
											</div>
										 
											
										</div>
										
										
										<div class="on_clmn mart20  ">
								<div class="thr_clmn  wi_30  ">
											<div class="pos_rel">
												
												<input type="number" name="total_rooms" id="total_rooms" min=5 placeholder="Number of rooms" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['total_rooms'];  ?>"/> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_40 padrl10">
											<div class="pos_rel">
												
												<input type="number" name="total_nonsmoking_rooms" id="total_nonsmoking_rooms" min=0 placeholder="Number of non smoking rooms" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['total_nonsmoking_rooms'];  ?>"/> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="number" name="total_room_whilechair" id="total_room_whilechair" min=0 placeholder="Number of wheelchair accessible rooms" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['total_room_whilechair'];  ?>"/> 
												
											</div>
											</div>
										</div>
										
										
										<div class="on_clmn mart20  ">
								<div class="thr_clmn  wi_50 padr10 ">
											<div class="pos_rel">
												
												<input type="number" name="total_floors" id="total_floors" min=1 placeholder="Number of floors" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['total_floors'];  ?>"/> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<input type="number" name="total_elevators" id="total_elevators" min=0 placeholder="Number of elevators" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir " value="<?php if(isset($hotelInfo)) echo $hotelInfo['total_elevators'];  ?>"/> 
												
											</div>
											</div>
											 
										</div>
										
										
										
										<div class="on_clmn mart20  ">
								<div class="thr_clmn  wi_30  ">
											<div class="pos_rel">
												
												<input type="number" name="year_built" id="year_built" min=1999 max="<?php echo date('Y'); ?>" placeholder="Year built" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['year_built'];  ?>"/> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_40 padrl10">
											<div class="pos_rel">
												<input type="number" name="renovation_year" id="renovation_year"   placeholder="Year of last complete renovation
" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['renovation_year'];  ?>"/> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="number" name="partial_renovation_year" id="partial_renovation_year"   placeholder="Year of last partial renovation" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)) echo $hotelInfo['partial_renovation_year'];  ?>"/> 
												
											</div>
											</div>
										</div>
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="mice_facilities" id="mice_facilities"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">MICE facilities</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['mice_facilities']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['mice_facilities']==2) echo 'selected'; ?>>No</option> 
											</select>
												
											</div>
											 
										</div>
										<div class="on_clmn mart20 ">
											 
											<div class="thr_clmn  wi_30  "> 
											<div class="pos_rel">
												
												<select name="large_room" id="large_room"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Large room (conference hall)</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['large_room']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['large_room']==2) echo 'selected'; ?>>No</option> 
											</select>
												
											</div>
											</div>
											
											<div class="thr_clmn  wi_40  padrl10"> 
											<div class="pos_rel">
												
												<select name="meeting_room" id="meeting_room"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Midsize room (meeting room)</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['meeting_room']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['meeting_room']==2) echo 'selected'; ?>>No</option> 
											</select>
												
											</div>
											</div>
											
											<div class="thr_clmn  wi_30  "> 
											<div class="pos_rel">
												
												<select name="small_room" id="small_room"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Small room (boardroom)</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['small_room']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['small_room']==2) echo 'selected'; ?>>No</option>   
											</select>
												
											</div>
											</div>
											 
										</div>
										
										
										<div class="on_clmn mart20 ">
											 
											 
											<div class="pos_rel">
												
												<select name="facilities_for_wedding_receptions" id="facilities_for_wedding_receptions"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Facilities for wedding receptions</option> 
												<option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['facilities_for_wedding_receptions']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['facilities_for_wedding_receptions']==2) echo 'selected'; ?>>No</option>  
											</select>
												
											</div>
											 
										</div>
										
										
										<div class="on_clmn mart20 ">
											 
											 <div class="thr_clmn  wi_50  padr10"> 
											<div class="pos_rel">
												
												<select name="banquet_hall" id="banquet_hall"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Ballroom/banquet hall</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['banquet_hall']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['banquet_hall']==2) echo 'selected'; ?>>No</option>  
											</select>
												
											</div>
											 </div>
											 
											 <div class="thr_clmn  wi_50  padr10"> 
											<div class="pos_rel">
												
												<select name="dry_cleaning" id="dry_cleaning"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;" onchange="updateRoomServiceDetail(this.value);"> 
											 <option value="0">Laundry service</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['dry_cleaning']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['dry_cleaning']==2) echo 'selected'; ?>>No</option>   
											</select>
												
											</div>
											</div>
										</div>
										
										
										 
										
										<div class="on_clmn mart20 ">
											 
											 
											
											<div class="thr_clmn  wi_50  padr10"> 
											<div class="pos_rel">
												
												<select name="room_service" id="room_service"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;" onchange="updateRoomServiceDetail(this.value);"> 
											 <option value="0">Room service</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['room_service']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['room_service']==2) echo 'selected'; ?>>No</option>   
											</select>
												
											</div>
											</div>
											
											<div class="thr_clmn  wi_50  padl10"> 
											<div class="pos_rel">
												
												<select name="breakfast" id="breakfast"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Breakfast</option> 
												 <option value="1" <?php if(isset($hotelInfo)) if($hotelInfo['breakfast']==1) echo 'selected'; ?>>Yes</option>  
												  <option value="2" <?php if(isset($hotelInfo)) if($hotelInfo['breakfast']==2) echo 'selected'; ?>>No</option>  
											</select>
												
											</div>
											</div>
											 
										</div>
										 <div class="clear"></div>
										<div class="<?php if(isset($hotelInfo)) if($hotelInfo['room_service']!=1) echo 'hidden'; ?>" id="roomServiceDetail">
										
										<div class="on_clmn mart20 ">
											 
											 
											
											<div class="thr_clmn  wi_50  padr10"> 
											<div class="pos_rel">
												
												<select name="room_service_opening" id="room_service_opening"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 
												 <?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(isset($hotelInfo)){if($hotelInfo['room_service_opening']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
												
											</div>
											</div>
											
											<div class="thr_clmn  wi_50  padl10"> 
											<div class="pos_rel">
												
												<select name="room_service_closing" id="room_service_closing"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg llgrey_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											  
												<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(isset($hotelInfo)){if($hotelInfo['room_service_closing']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
												
											</div>
											</div>
											 
										</div>
										 <div class="clear"></div>
								<div class="mart20">
								 
											<div class="pos_rel">
												
												<input type="number" name="delivery_fee" id="delivery_fee" placeholder="Delivery fee" class="wi_100 nobrdr nobrdt nobrdl brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php if(isset($hotelInfo)){ echo $hotelInfo['delivery_fee']; } ?>"> 
												
											</div>
											 
								</div>
								</div>
							 
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><input type="button" value="<?php if($hotelAvailable==0) echo 'Add'; else echo 'Update'; ?>" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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