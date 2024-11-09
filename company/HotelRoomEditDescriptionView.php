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
	<?php $path1 = $path."html/usercontent/images/"; ?>	
	<script>
	function addType(id)
	{
		var getValue=$('#bedding_type').val();
		if($('#'+id).hasClass('green_bg'))
		{
			$('#'+id).removeClass('green_bg');
			$('#'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#bedding_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_bg');
			$('#'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#bedding_type").val(getValue);
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
			if($("#room_name").val()==null || $("#room_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter room name');
				return false;
			}
			
			if($("#room_type").val()==0)
			{
				
				$("#errorMsg1").html('Please select room type');
				return false;
			}
			if($("#room_price").val()=='' ||  $("#room_price").val()==null )
			{
				
				$("#errorMsg1").html('Please enter room price');
				return false;
			}
			if(isNaN($("#room_price").val()))
			{
				
				$("#errorMsg1").html('Please enter numeric value for room price');
				return false;
			}
			 
			if($("#room_class").val()==0 )
			{
				
				$("#errorMsg1").html('Please select room class');
				return false;
			}
			if($("#hierarchy").val()=='' ||  $("#hierarchy").val()==null )
			{
				
				$("#errorMsg1").html('Please enter hierarchy');
				return false;
			}	
			if($("#size_unit").val()==0 )
			{
				
				$("#errorMsg1").html('Please select room size unit');
				return false;
			}	

		if($("#room_size").val()=='' || $("#room_size").val()==null )
			{
				
				$("#errorMsg1").html('Please enter room size');
				return false;
			}
			if(isNaN($("#room_size").val()))
			{
				
				$("#errorMsg1").html('Please enter numeric value for room size');
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
				
function addType(id)
	{
		var getValue=$('#general_amenities').val();
		if($('#'+id).hasClass('green_bg'))
		{
			$('#'+id).removeClass('green_bg');
			$('#'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#general_amenities").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_bg');
			$('#'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#general_amenities").val(getValue);
		}
		
	}
	
	function addType1(id)
	{
		var getValue=$('#connectivity_amenities').val();
		if($('#c'+id).hasClass('green_bg'))
		{
			$('#c'+id).removeClass('green_bg');
			$('#c'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#connectivity_amenities").val(getValue);
		}
		else
		{
			$('#c'+id).addClass('green_bg');
			$('#c'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#connectivity_amenities").val(getValue);
		}
		
	}
	function addType2(id)
	{
		var getValue=$('#bathroom_amenities').val();
		if($('#b'+id).hasClass('green_bg'))
		{
			$('#b'+id).removeClass('green_bg');
			$('#b'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#bathroom_amenities").val(getValue);
		}
		else
		{
			$('#b'+id).addClass('green_bg');
			$('#b'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#bathroom_amenities").val(getValue);
		}
		
	}
	
	function addType3(id)
	{
		var getValue=$('#kitchen_amenities').val();
		if($('#k'+id).hasClass('green_bg'))
		{
			$('#k'+id).removeClass('green_bg');
			$('#k'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#kitchen_amenities").val(getValue);
		}
		else
		{
			$('#k'+id).addClass('green_bg');
			$('#k'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#kitchen_amenities").val(getValue);
		}
		
	}			 
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
			
		
	</head>
	<body class="white_bg">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/HotelStay/roomsList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/HotelStay/roomsList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10   trn ffamily_avenir" >Stay</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please provide the basic information about your room below.</a></div>
			 
					 <div class="clear"></div>
							
							<form action="../../../../updateRoomDetail/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['id']; ?>/<?php echo $data['rid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								  	 <div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<input type="text" name="room_name" id="room_name" placeholder="Room name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $roomDetail['room_name']; ?>" /> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="room_type" id="room_type"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0" disabled >Room type</option> 
													<?php  foreach($hotelRoomType as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($roomDetail['room_type']==$value['id']) echo 'selected';  ?>><?php echo $value['room_type']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
											</div>
										</div>
										
										<div class="on_clmn mart20  ">
								 
											<div class="pos_rel">
												
												<select name="is_available" id="is_available"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
														<?php if($roomTypeDetail['is_available']==1) { ?>
														<option value="1" class="lgtgrey2_bg" <?php if($roomDetail['room_available']==1) echo 'selected';  ?>>Available</option>
														<?php } ?>
														<option value="2" class="lgtgrey2_bg" <?php if($roomDetail['room_available']==2) echo 'selected';  ?>>Unavailable</option>
													 
											</select>
												
											</div>
											 
											
										</div>
									
											<div class="on_clmn mart20 ">
								 
											<div class="pos_rel">
												
												<input type="number" name="room_price" id="room_price" placeholder="Room price" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $roomDetail['room_price_info']; ?>"/> 
												
											</div>
											 
											 
										</div>
								 
									 <input type="hidden" name="room_class" id="room_class" value="<?php  echo $roomDetail['room_class']; ?>" />
								  
								 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												
												<select  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;" disabled> 
											 <option value="0">Room class</option> 
													<?php  foreach($hotelRoomClass as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($roomDetail['room_class']==$value['id']) echo 'selected';  ?>><?php echo $value['hotel_room_class']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
										 
											 
										</div>
								
								 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												
												<input type="text" name="custom_name" id="custom_name" placeholder="Custom name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php echo $roomDetail['room_name']; ?>"/> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
											
												<input type="text" name="hierarchy" id="hierarchy" placeholder="Hierarchy" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $roomDetail['hierarchy']; ?>" /> 
												
											</div>
											</div>
										</div>
								
								<div class="on_clmn mart20 ">
								<div class="thr_clmn  wi_30 padr10">
											<div class="pos_rel">
												
												<select name="size_unit" id="size_unit"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											 <option value="0">Unit</option> 
													 
														<option value="Square meters" class="lgtgrey2_bg" <?php if('Square meters'==$roomDetail['room_size_unit']) echo 'selected'; ?>>Square meters</option>
													 <option value="Square feet" class="lgtgrey2_bg" <?php if('Square feet'==$roomDetail['room_size_unit']) echo 'selected'; ?>>Square feet</option>
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_70 padl10">
											<div class="pos_rel">
												
												<input type="number" name="room_size" id="room_size" placeholder="Room size" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $roomDetail['room_size']; ?>"/> 
												
											</div>
											</div>
											
										</div>
										
										 
										
										<div class="on_clmn mart20 ">
								 
											<div class="pos_rel">
												
												<input type="text" name="room_view" id="room_view" placeholder="Room view" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php echo $roomDetail['room_view']; ?>" /> 
												
											</div>
											 
											 
										</div>
											
											<div class="on_clmn mart20 ">
								 
											<div class="pos_rel">
												
												<input type="text" name="description" id="description" placeholder="Room description" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir" value="<?php echo $roomDetail['description']; ?>" /> 
												
											</div>
											 
											 
										</div>
										
										<div class="on_clmn mart20  ">
								 
											<div class="pos_rel">
												
												<select name="bedding_type" id="bedding_type"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											  
												<?php  foreach($hotelRoomBeddingType as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>	 
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($value['id']==$roomDetail['bedding_type']) echo 'selected'; ?>><?php echo $value['bedding_type']; ?></option>
													<?php 	} ?>
													 
											</select>
												
											</div>
											 
											
										</div>
									 
									 	
										<div class="on_clmn mart20  ">
								 
											<div class="pos_rel">
												
												<select name="extra_bed" id="extra_bed"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"> 
											  
														<option value="1" class="lgtgrey2_bg" <?php if($roomDetail['extra_bed']==1) echo 'selected'; ?>>Yes</option>
														<option value="2" class="lgtgrey2_bg" <?php if($roomDetail['extra_bed']==2) echo 'selected'; ?>>No</option>
													 
											</select>
												
											</div>
											 
											
										</div>
										
										
										 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="General" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
											 
									 
									 	<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">
										<?php  foreach($hotelGeneralAmenities as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
			<div class=" wi_50 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
				<input type="button" value="<?php echo substr($value['general_amenities'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?> fsz18 white_txt curp" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>">
			</div>
														<?php } ?>

			
												</div>	
												<input type="hidden" id="general_amenities" name="general_amenities" value="<?php echo $roomDetail['room_general_amenities']; ?>" />
										  <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Media, Working & Connectivity" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
										<input type="hidden" id="connectivity_amenities" name="connectivity_amenities" value="<?php echo $roomDetail['room_connectivity_amenities']; ?>"/>
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">
										<?php  foreach($hotelConnectivityAmenities as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
			<div class=" wi_50 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
				<input type="button" value="<?php echo substr($value['connectivity_amenities'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?> fsz18 white_txt curp" onclick="addType1(<?php echo $value['id']; ?>);" id="c<?php echo $value['id']; ?>">
			</div>
														<?php } ?>

			
												</div>	
												 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Bathroom" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										<input type="hidden" id="bathroom_amenities" name="bathroom_amenities" value="<?php echo $roomDetail['room_bathroom_amenities']; ?>" />
												<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">
										<?php  foreach($hotelBathroomAmenities as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
			<div class=" wi_50 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
				<input type="button" value="<?php echo substr($value['bathroom_amenities'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?> fsz18 white_txt curp" onclick="addType2(<?php echo $value['id']; ?>);" id="b<?php echo $value['id']; ?>">
			</div>
														<?php } ?>

			
												</div>	
												 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Kitchen" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
										<input type="hidden" id="kitchen_amenities" name="kitchen_amenities" value="<?php echo $roomDetail['room_kitchen_amenities']; ?>" />
												<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10">
										<?php  foreach($hotelKitchenAmenities as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
			<div class=" wi_50 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
				<input type="button" value="<?php echo substr($value['kitchen_amenities'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?> fsz18 white_txt curp" onclick="addType3(<?php echo $value['id']; ?>);" id="k<?php echo $value['id']; ?>">
			</div>
														<?php } ?>

			
												</div>	
										 <input type="hidden" id="indexing_save" name="indexing_save" value="0" />
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
								
							
								<div class="clear"></div>
						 
							
						     <div class="on_clmn mart10 xxs-mart10 marb30 mart20 marrl30 xs-marrl0" >
									<?php foreach($roomTypeDetailImages as $category => $value) 
														{ $value_a=file_get_contents("../estorecss/".$value ['image_path'].".txt"); $value_a=str_replace('"','',$value_a); ?>
										<img src="<?php echo $value_a; ?>" id="imgs" name="imgs" width="100" height="100"   class="fleft padl10" />
										<?php } ?> 
										
										<?php foreach($roomImages as $category => $value) 
														{ $value_a=file_get_contents("../estorecss/".$value ['room_image_path'].".txt"); $value_a=str_replace('"','',$value_a);  ?>
										<img src="<?php echo $value_a; ?>" id="imgs" name="imgs" width="100" height="100"   class="fleft padl10" />
										<?php } ?> 
										</div>
												<div class="on_clmn mart10 xxs-mart10 marb30 marrl30 xs-marrl0" id="imagesUp" style="display:none;">

										<img src="<?php echo $path1; ?>default-profile-pic.jpg" id="imgs1" name="imgs1" width="100" height="100"   class="fleft padl10" />
										 
										
										</div>
										<div class="clear"></div>
									<div class="on_clmn mart35">
									 <div class="thr_clmn  wi_40 padr10"  >
										<div class="pos_rel">
										 
										<a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir "  ></a>
										 
										</div>
										</div>
										<div class="thr_clmn  wi_60 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 dflex alit_c">
											
											<label class="forword ">
												Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
											</div>
											
										</div>
							</form>
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
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