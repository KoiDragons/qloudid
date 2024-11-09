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
	function upadteNotAvailable()
	{
		$('.error_msg_remove').removeClass('hidden');
	}
	function updateRecurringEvent()
{
	recurrEvent=1;
}


function updateTax()
{
	taxInfo=1;
}
 function updateWorkingOpen(id,link)
   {
	   workEmp=1;
	   dayValueId=id;
	   lunchTime=0;
	    
   }
   
function updateVariation()
{
		variationRequired=1;
}
function updateShared(id)
{
var product1='<a href="javascript:void(0);" onclick="updateShared(1);"><div id="toilet-chip" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu"><span class="chip chip_is-selected"><span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">1-to-1</span></span></span></div></div></a><a href="javascript:void(0);" onclick="updateShared(2);"><div id="bath-chip" class="css-cedhmb"><div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu"><span class="chip chip_not-selected"><span class="chip_content"><div class="css-ylfimb"></div><span class="chip_text">Shared</span></span></span></div></div></a>';
var product2='<a href="javascript:void(0);" onclick="updateShared(1);"><div id="bath-chip" class="css-cedhmb"><div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu"><span class="chip chip_not-selected"><span class="chip_content"><div class="css-ylfimb"></div><span class="chip_text">1-to-1</span></span></span></div></div></a><a href="javascript:void(0);" onclick="updateShared(2);"><div id="toilet-chip" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu"><span class="chip chip_is-selected"><span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">Shared</span></span></span></div></div></a>';	
if(id==1)
{
$(".bookSharedType").html(product1);
$('#one_shared').val(1);
$('#productPrice').removeClass('hidden');
$("#sharedInfo").addClass('hidden');
}
else
{
$(".bookSharedType").html(product2);
$('#one_shared').val(2);
$('#productPrice').addClass('hidden');
$("#sharedInfo").removeClass('hidden');
}
}


function upadteOpenInfo(id)
{
if(id==1)
{
$("#OpenInfo").removeClass('hidden');
$("#PrivateInfo").addClass('hidden');
}
else if(id==2)
{
$("#OpenInfo").addClass('hidden');
$("#PrivateInfo").removeClass('hidden');
}
else
{
$("#PrivateInfo").removeClass('hidden');
$("#OpenInfo").removeClass('hidden');
}
}

function updateCustomerPlace()
{
customerPlace=1;
}


function updateTourFee()
{
customerPlaceTourFee=1;
}

function updateMoreEvents()
{
moreEventOnRequest=1;
}

function updateExtraFee()
{
moreEventOnRequestExtraFee=1;
}
	function updateBookable()
	{
		bookableCategory=1;
	}	
	function changeCustom(id,id1)
			{
				if(id1==8)
				{
				$('#customData').removeClass('hidden');	
				}
				else
				{
					$('#customData').addClass('hidden');
				}
			}
	function addTypeRec(id,id1)
	{
		   $('#subscription_info').val(id1);
		 if(id1==2)
		 {
			$('#oneTime').removeClass('green_bg');
			$('#oneTime').addClass('red_ff2828_bg');
			$('#subs').addClass('green_bg');
			$('#subs').removeClass('red_ff2828_bg');
			$('#recurr').removeClass('hidden'); 
		 }
		 else
		 {
			 $('#oneTime').addClass('green_bg');
			$('#oneTime').removeClass('red_ff2828_bg');
			$('#subs').removeClass('green_bg');
			$('#subs').addClass('red_ff2828_bg');
			$('#recurr').addClass('hidden');  
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
				
				$("#errorMsg1").html('Please select category');
				return false;
			}
			if($("#one_shared").val()==1)
			{
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
				
				
		function updateRow(id)
	 { 
		var send_data={};
		 send_data.id=id;
		 send_data.price=$('#sprice'+id).val();
		 send_data.stock=$('#stock'+id).val();
		 $.ajax({
					type:"POST",
					url:"../../updateRow ",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						  window.location.href='https://www.safeqloud.com/company/index.php/FoodCourt/editDishInformation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>';
					}
				});
	 }		
			
function deleteRow(id)
	 { 
		var send_data={};
		 send_data.id=id;
		 
		 $.ajax({
					type:"POST",
					url:"../../deleteRow ",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1==1)
						{
						 window.location.href='https://www.safeqloud.com/company/index.php/FoodCourt/editDishInformation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>';
						}
						else
						{
							$("#errorMsg1").html('You can not delete all variants');
							return false;
						}	
						
					}
				});
	 }		
	function deleteOption(id,id1)
	 { 
	 if($('#sub_variant_count').val()==1)
	 {
	$("#errorMsgEditVariation").html('You can not delete all variants');
	return false;	 
	 }
		var send_data={};
		 send_data.variant_id=id;
		 send_data.sub_variant_id=id1;
		 $.ajax({
					type:"POST",
					url:"../../deleteOption/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?> ",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1==1)
						{
						 window.location.href='https://www.safeqloud.com/company/index.php/FoodCourt/editDishInformation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>';
						}
						
					}
				});
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
                        <a href="../../dishesInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../dishesInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
							
									 
							
							<form action="../../editDishDetail/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											<div class="on_clmn mart20  ">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  ">
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
										
										<div class="<?php if($selectedDish['is_physical']==1) echo 'hidden'; ?>" id="timeInfo">
										  	
											<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value=" Is Bookable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedDish['is_bookable']==1) echo 'checked'; ?>" onclick="updateBookable();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden"   name="is_bookable" id="is_bookable" value="<?php echo $selectedDish['is_bookable']; ?>" />
										
										
										
										
										<div class="<?php if($selectedDish['is_bookable']==0) echo 'hidden'; ?>" id="bookableSevice">
										<div class="column_m container fsz14 dark_grey_txt mart0 hidden">
												<div class="">
										<div class="">
											<div class=" ">
												
												 <div class="css-1jzh2co  ">
												   
												   <div class="chip-container bookSharedType">
												   <?php if($selectedDish['one_shared']==1) { ?>
													  <a href="javascript:void(0);" onclick="updateShared(1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">1-to-1</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 
													 <a href="javascript:void(0);" onclick="updateShared(2);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Shared</span>
															   </span>
															</span>
														 </div>
													  </div></a>
												   <?php } else { ?>
													 
													 
													 <a href="javascript:void(0);" onclick="updateShared(1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">1-to-1</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													  
													   <a href="javascript:void(0);" onclick="updateShared(2);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Shared</span>
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
													
										</div>
										<input type="hidden" name="one_shared" id="one_shared" value="<?php echo $selectedDish['one_shared']; ?>" />	
										 
										
										
										
										<div class="on_clmn mart20 <?php if($selectedDish['one_shared']==1) echo 'hidden'; ?>" id="sharedInfo">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Shared type</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How the event will be shared among others?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="wi_50">
											<div class="pos_rel">
												 
												<select     class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg" onclick="upadteNotAvailable();" disabled> 
											  
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['one_shared_type']==1) echo 'selected'; else echo 'hidden'; ?>>Open</option>
											 
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['one_shared_type']==2) echo 'selected';  else echo 'hidden'; ?>>Private</option> 
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['one_shared_type']==3) echo 'selected';  else echo 'hidden'; ?>>Both</option> 
											 
														 
											 	 
											</select>
											 	
											</div>
										 	</div>
											
											<div class="padtb20 red_txt fsz16 hidden error_msg_remove">You can't change shared type.Please add a new event. </div>
											<input type="hidden" name="one_shared_type" id="one_shared_type" value='<?php echo $selectedDish['one_shared_type']; ?>' />
										<div class="<?php if($selectedDish['one_shared_type']==2) echo 'hidden'; ?> " id="OpenInfo">
										
										<input type='hidden' id='recurring_event' name='recurring_event' value='<?php echo $selectedDish['recurring_event']; ?>' />
										<?php if($selectedDish['recurring_event']==0) { ?>
										<div class="on_clmn mart20 " id='notRecurringEvent'>
											<div class="thr_clmn  wi_50 padr10">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Event date</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Select date of event?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="date"   name="open_event_date" id="open_event_date"   class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo date('Y-m-d',$selectedDish['open_event_date']); ?>" /> 
											  
											 </div>
											 
												
											</div>
										 <div class="thr_clmn  wi_50 padl10">
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Event start time</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">When event will be started?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<select name="event_start_time" id="event_start_time"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg" > 
												<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" <?php if($value1['id']==$selectedDish['open_event_time']) echo 'selected'; ?>><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											  
											 </div>
											 
												
											</div>
										 	</div>
											
										
										<?php } else { ?>
										 <div class="container column_m lgtgrey2_bg  mart20 padrl20 " id='isRecurringEvent'>
										 <?php foreach($selectedDishRecurringInfo  as $category => $value) { ?>
								 <div class="on_clmn  lgtgrey2_bg brdt">
								 
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="<?php echo $value['day_name']; ?>" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="<?php echo substr($value['day_name'],0,1); ?>" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($value['event_day']==1) echo 'checked'; else echo '';  ?> " onclick="updateWorkingOpen(<?php echo $value['day_id']; ?>,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="" id="day_<?php echo $value['day_id']; ?>">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="work_start_time_<?php echo $value['day_id']; ?>" id="work_start_time_<?php echo $value['day_id']; ?>"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" <?php if($value['event_start_time']== $value1['id']) echo 'selected'; ?>><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
											 
										</div>
										
									 

										</div>
										
								 	
										 <input type="hidden" id="working_day_<?php echo $value['day_id']; ?>" name="working_day_<?php echo $value['day_id']; ?>" value="<?php echo $value['event_day']; ?>" />
										 
										 <?php } ?>
									  	</div>
										<?php } ?>
											<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Price info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Per person cost of the event?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number"   name="open_price_per_person" id="open_price_per_person" min="10" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php   echo $selectedDish['open_price_per_person']; ?>" /> 
											  
											 </div>
											 
												
											</div>
										 <div class="thr_clmn  wi_50 padl10">
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Person info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Maximum person?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number"   name="open_total_person" id="open_total_person"  min="1" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php   echo $selectedDish['open_total_person']; ?>" /> 
											  
											 </div>
											 
												
											</div>
										 	</div>
											
											
											<div class="on_clmn mart20">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Events</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Maximum open events allowed per day?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div> 
											<div class="pos_rel">
												 
												<input type="number"   name="total_open_events" id="total_open_events" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php   echo $selectedDish['total_open_events']; ?>" /> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											</div>
											
										
										 	</div>
										
										
											<div class="<?php if($selectedDish['one_shared_type']==1) echo 'hidden'; ?>" id="PrivateInfo">
										
											<div class="on_clmn mart20 ">
											
											<div class="thr_clmn  wi_50 padr10">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Price info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Minimum price for private event?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number"   name="private_price" id="private_price" value="<?php   echo $selectedDish['private_price']; ?>" min="10" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"/> 
											  
											 </div>
											 
												
											</div>
										 <div class="thr_clmn  wi_50 padl10">
										 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Person info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Maximum person?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number"   name="private_max_person" id="private_max_person" min="1"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php   echo $selectedDish['private_max_person']; ?>" /> 
											  
											 </div>
											 
												
											</div>
										 	</div>
											
											
											
									<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Event available at customer place" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedDish['event_at_customer_place']==1) echo 'checked'; ?>" onclick="updateCustomerPlace();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="event_at_customer_place" name="event_at_customer_place" value="<?php echo $selectedDish['event_at_customer_place']; ?>"  />
										
										<div class="on_clmn  mart20 brdb <?php if($selectedDish['event_at_customer_place']==0) echo 'hidden'; ?>" id="customerPlaceTour">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tour fee applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedDish['tour_fee_applicable']==1) echo 'checked'; ?>" onclick="updateTourFee();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="tour_fee_applicable" name="tour_fee_applicable" value="<?php echo $selectedDish['tour_fee_applicable']; ?>" />
										
										<div class="on_clmn mart20 <?php if($selectedDish['tour_fee_applicable']==0) echo 'hidden'; ?>" id="tourFee">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Tour fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs">Minimum charge of travel?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div> 
											<div class="pos_rel">
												 
												<input type="number"   name="tour_fee" id="tour_fee" min="0" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo $selectedDish['tour_fee']; ?>" /> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn mart20">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Events</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Maximum events per day?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number" value="<?php echo $selectedDish['total_private_events']; ?>"    name="total_private_events" id="total_private_events" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"/> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="More events available on request" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($selectedDish['more_event_on_request']==1) echo 'checked'; ?> " onclick="updateMoreEvents();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" id="more_event_on_request" name="more_event_on_request" value="<?php echo $selectedDish['more_event_on_request']; ?>" />
										
										<div class="<?php if($selectedDish['more_event_on_request']==0) echo 'hidden'; ?>" id="moreEvents">
										<div class="on_clmn mart20">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Person info</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Minimum person required for request?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number" value="<?php echo $selectedDish['minimum_people_required']; ?>"   name="minimum_people_required" id="minimum_people_required" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"/> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn  mart20 ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Request period</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Minimum time required for request?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<select name="minimum_time_required" id="minimum_time_required" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg "> 
											<option value="0" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==0) echo 'selected'; ?> >0</option>
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==1) echo 'selected'; ?>>1</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==2) echo 'selected'; ?>>2</option>
											<option value="3" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==3) echo 'selected'; ?>>3</option>
											<option value="4" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==4) echo 'selected'; ?>>4</option>
											<option value="5" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==5) echo 'selected'; ?> >5</option>
											<option value="6" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==6) echo 'selected'; ?>>6</option>
											<option value="7" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==7) echo 'selected'; ?>>7</option>
											<option value="8" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==8) echo 'selected'; ?>>8</option>
											<option value="9" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==9) echo 'selected'; ?>>9</option>
											<option value="10" class="lgtgrey2_bg"  <?php if($selectedDish['minimum_time_required']==10) echo 'selected'; ?>>10</option>
											<option value="11" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_required']==11) echo 'selected'; ?>>11</option>		 
											</select>
												
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="minimum_time_period" id="minimum_time_period" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg "> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_period']==1) echo 'selected'; ?>>Days</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['minimum_time_period']==2) echo 'selected'; ?>>Weeks</option>
										 	 
											</select>
												
											</div>
										 </div>
											 
											 
										</div>
										
										
										<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Extra fee applicable for event request" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($selectedDish['more_event_extra_fee']==1) echo 'checked'; ?> " onclick="updateExtraFee();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" id="more_event_extra_fee" name="more_event_extra_fee" value="<?php echo $selectedDish['more_event_extra_fee']; ?>" />
										
										
										<div class="on_clmn mart20 <?php if($selectedDish['more_event_extra_fee']==0) echo 'hidden'; ?>" id="extraFee">
											 <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Extra fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Extra fee for on request event</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="pos_rel">
												 
												<input type="number" value="<?php echo $selectedDish['extra_fee']; ?>"   name="extra_fee" id="extra_fee" min="0" class="default_view  mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt wi_50"/> 
											  
											 </div>
											 
												
											 
										 	</div>
					 
										</div>
											
											
											
											</div>
										
										
											<div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												
												<select   name="bookable_service_category_id" id="bookable_service_category_id"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
											 <?php  foreach($bookableServiceCategories as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($selectedDish['bookable_service_category_id']==$value['id']) echo 'selected'; ?>><?php echo $value['service_category_name']; ?></option>
											 
											 
											 
														<?php } ?>
											 	 
											</select>
											
											<label for="bookable_service_category_id" class="floating__label tall nobold" data-content="Bookable service category" >
											<span class="hidden--visually">
											 Bookable</span></label>
												
											</div>
										 
										 	</div>
											
											</div>
											<div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												
												<select   name="time_required" id="time_required"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
											 
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['time_required']==1) echo 'selected'; ?>>15 minutes</option>
											 
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['time_required']==2) echo 'selected'; ?>>30 minutes</option>
											 
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['time_required']==3) echo 'selected'; ?>>45 minutes</option>
											 
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['time_required']==4) echo 'selected'; ?>>60 minutes</option>
											 	 
											</select>
											
											<label for="time_required" class="floating__label tall nobold" data-content=" Minimum time" >
											<span class="hidden--visually">
											 Minimum time</span></label>
												
											</div>
										 
										 	</div>
											
											
											<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												<select   name="preparation_time" id="preparation_time"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
												<option value="0" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==0) echo 'selected'; ?>>0 minutes</option>
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==1) echo 'selected'; ?>>15 minutes</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==2) echo 'selected'; ?>>30 minutes</option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==3) echo 'selected'; ?>>45 minutes</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['preparation_time']==4) echo 'selected'; ?>>60 minutes</option>
										 
											 	 
											</select>
											
											<label for="preparation_time" class="floating__label tall nobold" data-content="Preparation time" >
											<span class="hidden--visually">
											 Preparation time</span></label>
												
											</div>
										 
										 	</div>
											
											<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												<select   name="post_production_time" id="post_production_time"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
												<option value="0" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==0) echo 'selected'; ?>>0 minutes</option>
											<option value="1" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==1) echo 'selected'; ?>>15 minutes</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==2) echo 'selected'; ?>>30 minutes</option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==3) echo 'selected'; ?>>45 minutes</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['post_production_time']==4) echo 'selected'; ?>>60 minutes</option>
											 
											 	 
											</select>
											
											<label for="post_production_time" class="floating__label tall nobold" data-content="Post production time" >
											<span class="hidden--visually">
											 Post production time</span></label>
												
											</div>
										 
										 	</div>
											
											</div>
											<input type="hidden" name="food_type" id="food_type" value="<?php echo $selectedDish['dish_warnings']; ?>" />
											 <div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												
												<select name="dish_type" id="dish_type"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"   onchange="selectWarning(this.value);" > 
											 <option value="0">Select category</option> 
											 
											<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['dish_type']==2) echo 'selected'; ?>>Drink</option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['dish_type']==3) echo 'selected'; ?>>Spa</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['dish_type']==4) echo 'selected'; ?>>Fitness</option>			 
											</select>
											<label for="dish_type" class="floating__label tall nobold" data-content="Dish type" >
											<span class="hidden--visually">
											 Dish type</span></label>	
											</div>
										 
											 
										</div>
											 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="dish_name" id="dish_name" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" value="<?php echo $selectedDish['dish_name']; ?>" /> 
												<label for="dish_name" class="floating__label tall nobold" data-content="Title" >
											<span class="hidden--visually">
											 Title</span></label>
											</div>
										 
											 
										</div>
										
										
										<div class="on_clmn mart20 hidden">
											 
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
											 
											<div class="pos_rel"><textarea class="texteditor "  id="product_information" name="product_information"><?php echo $selectedDish['product_information']; ?> 
										</textarea></div>
										</div>
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10 <?php if($selectedDish['dish_type']>1) echo 'hidden'; ?>" id="warningsDetail">
										<?php  foreach($foodTypeInformation as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="<?php echo substr($value['food_type'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($value['is_selected']==0) echo 'red_ff2828_bg'; else echo 'green_bg'; ?> fsz18 white_txt curp ffamily_avenir" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>">
														</div>
														<?php } ?>

			
																			</div>	
											
								 
									 
								 
								 
								 <div class="on_clmn mart20 <?php if($selectedDish['variation_type']==1) echo 'hidden'; if($selectedDish['one_shared']==2) echo 'hidden';  ?>">
											 
											<div class="pos_rel">
												
												
												<input type="number" name="dish_price" id="dish_price" placeholder="Price" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" value="<?php echo $selectedDish['dish_price']; ?>" <?php if($selectedDish['variation_type']==1) echo 'readonly'; ?> /> 
												<label for="dish_price" class="floating__label tall nobold" data-content="Price" >
											<span class="hidden--visually">
											Price</span></label>
											</div>
											 
										 
										</div>
										
										
										 <div class="on_clmn  mart20  brdb ">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If tax is included in price?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedDish['tax_included']==1) echo 'checked'; ?>"  onclick="updateTax();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="tax_included" name="tax_included" value="<?php echo $selectedDish['tax_included']; ?>" />
										
										 <div class="on_clmn mart20 <?php if($selectedDish['tax_included']==1) echo 'hidden'; ?>" id="taxInfo">
											 
											<div class="pos_rel">
												
												<select   name="tax_amount" id="tax_amount"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
											 <option value="0">0</option> 
										 <?php for($i=1;$i<=25;$i++) { ?>
											<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($selectedDish['tax_amount']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
										 <?php } ?>
											</select>
											
											<label for="dish_type" class="floating__label tall nobold" data-content="How much tax" >
											<span class="hidden--visually">
											 How much tax</span></label>
												
											</div>
										 
										 	</div>
										
										
											<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10   <?php if($selectedDish['one_shared']==2) { if($selectedDish['one_shared_type']==2) echo ''; else echo 'hidden'; } ?>" >
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" id="oneTime" value="One time" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($selectedDish['subscription_info']==1) echo 'green_bg'; else echo 'red_ff2828_bg'; ?> fsz18 white_txt curp ffamily_avenir " onclick="addTypeRec(1);" >
														</div>
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="Recurring" id="subs" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($selectedDish['subscription_info']==2) echo 'green_bg'; else echo 'red_ff2828_bg'; ?> fsz18 white_txt curp ffamily_avenir" onclick="addTypeRec(2);" >
														</div>
														</div>
										
											 <div class="on_clmn mart20  <?php if($selectedDish['subscription_info']==1) echo 'hidden'; ?>" id="recurr">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_type" id="recurring_type" onchange="changeCustom(this.value);">
											       <option value="1" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==1) echo 'selected'; ?>>Hourly</option>
												<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==2) echo 'selected'; ?>>Daily </option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==3) echo 'selected'; ?>>Weekly</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==4) echo 'selected'; ?>>Monthly</option>		
											<option value="5" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==5) echo 'selected'; ?>>Every 3 Month</option>	
											<option value="6" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==6) echo 'selected'; ?>>Every 6 Month</option>	
											<option value="7" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==7) echo 'selected'; ?>>Yearly</option>											
											<option value="8" class="lgtgrey2_bg" <?php if($selectedDish['recurring_type']==8) echo 'selected'; ?>>Custom</option>					 
											</select>
											 	
											  <label for="recurring_type0" class="floating__label tall nobold padl10" data-content="Subscription type">
											<span class="hidden--visually">
											  Subscription type</span></label>
											</div>
											</div>
											<div id="customData" class="<?php if($selectedDish['recurring_type']==8) echo ''; else echo 'hidden'; ?>">
											 <div class="thr_clmn  wi_15 padl10">
											<input type="text"  value="Every" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " readonly /> 
											 
											</div>
											 <div class="thr_clmn  wi_10 padl10">
											<input type="number"  id="total_time" name="total_time" value="<?php echo $selectedDish['custom_time']; ?>" min=1 class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " /> 
											 
											</div>
											
											<div class="thr_clmn  wi_25 padl10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_typec" id="recurring_typec">
											       <option value="1" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==1) echo 'selected'; ?>>Hourly</option>
												<option value="2" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==2) echo 'selected'; ?>>Daily </option>
											<option value="3" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==3) echo 'selected'; ?>>Weekly</option>
											<option value="4" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==4) echo 'selected'; ?>>Monthly</option>		
											<option value="7" class="lgtgrey2_bg" <?php if($selectedDish['custom_cycle']==7) echo 'selected'; ?>>Yearly</option>											
											 			 
											</select>
											 	
											   
											</div>
											</div>
											</div>
										 </div>
										<input type="hidden" name="subscription_info" id="subscription_info" class="subscription_info" value="<?php echo $selectedDish['subscription_info']; ?>" />				
								 
								
								
							 		<div id="product_list" class="<?php if($selectedDish['variation_type']==0) echo 'hidden'; ?>">
									<?php echo $availableVariationInfo; ?>
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
		
		<div class="popup_modal wi_500p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad10 popup_shadow" id="gratis_popup_variation">
		<div class="modal-content nobrdb talc box_shadox   white_bg  ">
			
			 
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Add variation</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				
				 
				<div class="wi_100 marb0 talc">
					
					<?php echo $selectedVariationDetail; ?>
				</div>
				 
				
			</div>
			
			<div id="errorMsgVariation" class="padtb15 red_txt fsz18">	 </div>
			<div class="on_clmn padtb20">
				<input type="button" value="Submit" class="wi_300p maxwi_100   hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick='addVariantDetail();'>
				
			</div>
	</div>
	
	</div>
		
	<div class="popup_modal wi_500p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad10 popup_shadow" id="gratis_popup_edit_variation">
		<div class="modal-content nobrdb talc box_shadox   white_bg  ">
			
			 
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Edit option</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				<form action="../../updateVariation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>" method="POST" id="save_indexing_variant" name="save_indexing_variant" accept-charset="ISO-8859-1">
				 
				<div class="wi_100 marb0 talc">
					
					<?php echo $editableVariationDetail; ?>
				</div>
				 </form>
				 
			</div>
			
			<div id="errorMsgEditVariation" class="padtb15 red_txt fsz18">	 </div>
			<div class="on_clmn padtb20 hidden" id="submitButton">
				<input type="button" value="Submit" class="wi_300p maxwi_100   hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold" onclick='updateStockDetail();'>
				
			</div>
	</div>
	
	</div>
		
		<script>
		function updateStockDetail()
		{
			$('#errorMsgEditVariation').html('');
			if($('#addedVariation').val()==1)
			{
				if($('#sub_variationn_1').val()==0)
				{
				$('#errorMsgEditVariation').html('Please select option');
				return false;
				}
			}
			else if($('#addedVariation').val()==2)
			{
				if($('#sub_variationn_1').val()==0)
				{
				$('#errorMsgEditVariation').html('Please select first option');
				return false;
				}
				if($('#sub_variationn_2').val()==0)
				{
				$('#errorMsgEditVariation').html('Please select second option');
				return false;
				}
			}
			
			document.getElementById('save_indexing_variant').submit();
		}
		function addAvailableVariant()
		{
			 
			var addedValue=$('#addedVariation').val();
			if(addedValue==0)
			{
			$('#addedVariation').val(1);	
			$('#variation1').removeClass('hidden');
			$('#addNewVAriationInfo').removeClass('hidden');
			$('#submitButton').removeClass('hidden');
			}
			else if(addedValue==1)
			{
			$('#addedVariation').val(2);	
			$('#variation2').removeClass('hidden');
			$('#addNewVariationInfo').addClass('hidden'); 
			}
			 
			if((parseInt($('#addedVariation').val())+parseInt($('#activeVariation').val()))==$('#totalVariation').val())
			{
				$('#addNewVariationInfo').addClass('hidden'); 
			}
		}
		function addVariantDetail()
		{
			$('#errorMsgVariation').html('');
			var send_data={};
			send_data.combination='';
			for(i=1;i<=$('#variation_count').val();i++)
			{
			if($('#sub_variation_'+i).val()==0)
			{
			$('#errorMsgVariation').html('please select option value for variant');	
			return false;
			}			
			else 
			{
			send_data.combination=send_data.combination+$('#sub_variation_'+i).val()+',';	
			}				
			}
			$('#gratis_popup_variation').removeClass('active');
			$('#gratis_popup_variation').attr('style','display:none');
			send_data.price=$('#variant_price').val();
			 send_data.stock=$('#variant_stock').val();
			 $.ajax({
						type:"POST",
						url:"../../addVariantToList/<?php echo $data['fid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							if(data1==0)
							{
								$('#gratis_popup_variation').addClass('active');
								$('#gratis_popup_variation').attr('style','display:block');
							$('#errorMsgVariation').html('This combination already exist you can edit on list.');	
							return false;	
							}
							else
							{
								window.location.href='https://www.safeqloud.com/company/index.php/FoodCourt/editDishInformation/<?php echo $data['cid']; ?>/<?php echo $data['fid']; ?>';
								 
							}
						}
					});
		}
		
		 
		
		</script>
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
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
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
	 						