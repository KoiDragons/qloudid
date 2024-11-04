
<!doctype html>
<html class="home">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Qmatchup</title>
	<!--<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
	 
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
<script>
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
$("#ifRecurr").removeClass('hidden');
$("#ifRecurr").removeClass('hidden');
}
else
{
$(".bookSharedType").html(product2);
$('#one_shared').val(2);
$('#productPrice').addClass('hidden');
$("#sharedInfo").removeClass('hidden');
$("#ifRecurr").addClass('hidden');
}
}


function upadteOpenInfo(id)
{
if(id==1)
{
$("#OpenInfo").removeClass('hidden');
$("#PrivateInfo").addClass('hidden');
$("#recurr").addClass('hidden');
$("#ifRecurr").addClass('hidden');
$('#recurring_event').val(1);
$('#isRecurringEvent').removeClass('hidden');
$('#notRecurringEvent').addClass('hidden');
$('#selectRecurring').removeClass('hidden');
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
$("#recurr").addClass('hidden');
$("#ifRecurr").addClass('hidden');
$('#recurring_event').val(1);
$('#isRecurringEvent').removeClass('hidden');
$('#notRecurringEvent').addClass('hidden');
$('#selectRecurring').addClass('hidden');
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
	
	 function selectSubvariation(id,id1)
	 {
		 	$("#errorMsg1").html('');
			$('#sub'+id1).html('');
		 if(id>0)
		 {
			 if(id1==1)
			 {
				 if($('#variation_id2').val()==id || $('#variation_id3').val()==id)
				 {
						$("#errorMsg1").html('You cant select same variation again'); 
						$('#variation_id1').val(0);
						return false
				 }
			 }
			 
			 else if(id1==2)
			 {
				 if($('#variation_id1').val()==id || $('#variation_id3').val()==id)
				 {
						$("#errorMsg1").html('You cant select same variation again'); 
						$('#variation_id2').val(0);
						return false
				 }
			 }
			 else if(id1==3)
			 {
				 if($('#variation_id1').val()==id || $('#variation_id2').val()==id)
				 {
						$("#errorMsg1").html('You cant select same variation again'); 
						$('#variation_id3').val(0);
						return false
				 }
			 }
		 }
		 var send_data={};
		 send_data.variation_id=id;
		 $.ajax({
					type:"POST",
					url:"../selectSubvariation ",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						 $('#sub'+id1).html(data1);
					}
				});
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
	
	function selectTime(id)
	{
		var product1='<a href="javascript:void(0);" onclick="selectTime(1);"><div id="toilet-chip" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu"><span class="chip chip_is-selected"><span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">Physical product</span></span></span></div></div></a><a href="javascript:void(0);" onclick="selectTime(2);"><div id="bath-chip" class="css-cedhmb"><div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu"><span class="chip chip_not-selected"><span class="chip_content"><div class="css-ylfimb"></div><span class="chip_text">Service</span></span></span></div></div></a>';
		var product2='<a href="javascript:void(0);" onclick="selectTime(1);"><div id="bath-chip" class="css-cedhmb"><div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu"><span class="chip chip_not-selected"><span class="chip_content"><div class="css-ylfimb"></div><span class="chip_text">Physical product</span></span></span></div></div></a><a href="javascript:void(0);" onclick="selectTime(2);"><div id="toilet-chip" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu"><span class="chip chip_is-selected"><span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">Service</span></span></span></div></div></a>';
		if(id==1)
		{
			$(".physicalProduct").html(product1);
			$("#product_type").val(1);
			$("#variationInfo").removeClass('hidden'); 
			$("#row1").removeClass('hidden');
			$("#row2").removeClass('hidden');
			$("#row3").removeClass('hidden');
			$('#timeInfo').addClass('hidden');
			$('#time_required').val(1);
			$('#post_production_time').val(1);
			$('#preparation_time').val(1);
		 
		}
		else
		{
			$(".physicalProduct").html(product2);
			$("#product_type").val(2);
			$("#variationInfo").addClass('hidden'); 
			$("#row1").addClass('hidden');
			$("#row2").addClass('hidden');
			$("#row3").addClass('hidden');
			$('#timeInfo').removeClass('hidden');
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
			
			var bg_url = $('#image-data').css('background-image');
				$('#image-data1').val(bg_url);
			if($('#variation_type').val()==1)
			{
				if($('#variation_count').val()==1)
					{
						 
						 if($("#sub1").select2('val')==null)
						 {
							$('#errorMsg1').html('please select atleast one value for first variation');
							return false;
						 }
						 else
						 {
						$('#selected_variation1').val($("#sub1").select2('val'));	 
						 }
						 }
						  else if($('#variation_count').val()==2)
							{
								 
								if($("#sub1").select2('val')==null)
								 {
									 
									$('#errorMsg1').html('please select atleast one value for first variation');
									return false;
								 }
								else if($("#sub2").select2('val')==null)
								 {
									 
									$('#errorMsg1').html('please select atleast one value for second variation');
									return false;
								 }
								 $('#selected_variation1').val($("#sub1").select2('val'));	
								$('#selected_variation2').val($("#sub2").select2('val'));	
							}
						 else if($('#variation_count').val()==3)
							{
								 
								if($("#sub1").select2('val')==null)
								 {
									 
									$('#errorMsg1').html('please select atleast one value for first variation');
									return false;
								 }
								else if($("#sub2").select2('val')==null)
								 {
									 
									$('#errorMsg1').html('please select atleast one value for second variation');
									return false;
								 }
								 else if($("#sub3").select2('val')==null)
								 {
									 
									$('#errorMsg1').html('please select atleast one value for third variation');
									return false;
								 }		
								
								$('#selected_variation1').val($("#sub1").select2('val'));	
								$('#selected_variation2').val($("#sub2").select2('val'));	
								$('#selected_variation3').val($("#sub3").select2('val'));	
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
				
				function showMoreLine()
				{
					 
					if($('#variation_count').val()==1)
					{
						if($("#sub1").select2('val')=='' || $("#sub1").select2('val')==null)
						{
						$('#errorMsg1').html('please select atleast one value for first variation');
						return false;						
						}
						else
						{
							$('#variation_count').val(2);
							$('#row2').removeClass('hidden');
						}
					
					}
					
					else if($('#variation_count').val()==2)
					{
						if($("#sub2").select2('val')=='' || $("#sub1").select2('val')==null)
						{
						$('#errorMsg1').html('please select atleast one value for first variation');
						return false;						
						}
						else
						{
							$('#variation_count').val(3);
							$('#row3').removeClass('hidden');
						}
					
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

	<body>
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../dishesInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../dishesInformation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					<div class="top_menu talc    wi_60i " style="padding-top:8px;">
				<ul class="menulist sf-menu  fsz25  bold wi_100">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="black_txt pred_txt_h ffamily_avenir nobold">Add article</span></a>
					</li>
				 	 
       			 	</ul>
			</div>
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					 
							
							<form action="../addDishDetail/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											<div class="on_clmn mart20 marb35">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  ">
											<div class="cropped_image   grey_brd5  " style="background-image: <?php echo '../../usercontent/images/default-profile-pic.jpg'; ?>;" id="image-data" name="image-data"></div>
											 
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
											
											<input type="hidden" name="food_type" id="food_type" value="" />
											<!--<div class="clear"></div>
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												 
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Product type</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please select if this is a physical product or service</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											<div class="column_m container fsz14 dark_grey_txt mart0 ">
												<div class="">
										<div class="">
											<div class=" ">
												
												 <div class="css-1jzh2co  ">
												   
												   <div class="chip-container physicalProduct">
													  <a href="javascript:void(0);" onclick="selectTime(1);"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">Physical product</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 
													 <a href="javascript:void(0);" onclick="selectTime(2);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">Service</span>
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
													
										</div>-->
											
											<input type="hidden" name="product_type" id="product_type" value="1" />
											  
											
											<div class="hidden" id="timeInfo">
											<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value=" Is Bookable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateBookable();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden"   name="is_bookable" id="is_bookable" value="0" />
										
										<div class="hidden" id="bookableSevice">
										<div class="column_m container fsz14 dark_grey_txt mart0 ">
												<div class="">
										<div class="">
											<div class=" ">
												
												 <div class="css-1jzh2co  ">
												   
												   <div class="chip-container bookSharedType">
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
													 
													 
												   </div>
												</div>
												<div class="clear"></div>
											 
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
										</div>
										<input type="hidden" name="one_shared" id="one_shared" value="1" />	
										 
										
										
										<div class="on_clmn mart20 hidden" id="sharedInfo">
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
											<div class="wi_50 ">
											<div class="pos_rel">
												 
												<select   name="one_shared_type" id="one_shared_type"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg" onchange="upadteOpenInfo(this.value);"> 
											  
											<option value="1" class="lgtgrey2_bg" >Open</option>
											 
											<option value="2" class="lgtgrey2_bg" >Private</option> 
											<option value="3" class="lgtgrey2_bg" >Both</option> 
											 
														 
											 	 
											</select>
											 	
											</div>
										 	</div>
										<div class=" mart20" id="OpenInfo">
										
										<div class="on_clmn   brdb" id='selectRecurring'>	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is recurring" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked" onclick="updateRecurringEvent();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type='hidden' id='recurring_event' name='recurring_event' value='1' />
										
										 <div class="container column_m lgtgrey2_bg   padrl20 " id='isRecurringEvent'>
										 <?php foreach($dayDetail  as $category => $value) { ?>
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
														<div class="boolean-control boolean-control-small boolean-control-green fright checked" onclick="updateWorkingOpen(<?php echo $value['id']; ?>,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="" id="day_<?php echo $value['id']; ?>">
											<div class="thr_clmn  wi_25  padl60  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="work_start_time_<?php echo $value['id']; ?>" id="work_start_time_<?php echo $value['id']; ?>"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												<?php 
												foreach($workingHrs as $category1 => $value1) 
												{
												?> 
											<option value="<?php echo $value1['id']; ?>" ><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
											 
										</div>
										
									 

										</div>
										
								 	
										 <input type="hidden" id="working_day_<?php echo $value['id']; ?>" name="working_day_<?php echo $value['id']; ?>" value="1" />
										 
										 <?php } ?>
									  	</div>
										
										<div class="on_clmn mart20 hidden" id='notRecurringEvent'>
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
												 
												<input type="date"   name="open_event_date" id="open_event_date"   class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="<?php echo date('Y-m-d'); ?>" /> 
											  
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
											<option value="<?php echo $value1['id']; ?>" ><?php echo $value1['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											  
											 </div>
											 
												
											</div>
										 	</div>
											
										
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
												 
												<input type="number"   name="open_price_per_person" id="open_price_per_person" min="10" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="10" /> 
											  
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
												 
												<input type="number"   name="open_total_person" id="open_total_person"  min="1" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="1" /> 
											  
											 </div>
											 
												
											</div>
										 	</div>
											
											
											<div class="on_clmn mart20 hidden">
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
												 
												<input type="number"   name="total_open_events" id="total_open_events" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="1" /> 
											  
											 </div>
											 
												
											 
										 	</div>
											
											</div>
											
										
										 	</div>
										
										
											<div class="hidden" id="PrivateInfo">
										
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
												 
												<input type="number"   name="private_price" id="private_price" value="10" min="10" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"/> 
											  
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
												 
												<input type="number"   name="private_max_person" id="private_max_person" min="1"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="1" /> 
											  
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
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateCustomerPlace();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="event_at_customer_place" name="event_at_customer_place" value="0"  />
										
										<div class="on_clmn  mart20 brdb hidden" id="customerPlaceTour">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tour fee applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateTourFee();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="tour_fee_applicable" name="tour_fee_applicable" value="0" />
										
										<div class="on_clmn mart20 hidden" id="tourFee">
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
												 
												<input type="number"   name="tour_fee" id="tour_fee" min="0" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="0" /> 
											  
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
												 
												<input type="number" value="1"    name="total_private_events" id="total_private_events" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"/> 
											  
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
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateMoreEvents();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" id="more_event_on_request" name="more_event_on_request" value="0" />
										
										<div class="hidden" id="moreEvents">
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
												 
												<input type="number" value="1"   name="minimum_people_required" id="minimum_people_required" min="1" class="default_view wi_50 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"/> 
											  
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
											<option value="0" class="lgtgrey2_bg"   >0</option>
											<option value="1" class="lgtgrey2_bg" >1</option>
											<option value="2" class="lgtgrey2_bg" >2</option>
											<option value="3" class="lgtgrey2_bg"  >3</option>
											<option value="4" class="lgtgrey2_bg"  >4</option>
											<option value="5" class="lgtgrey2_bg" >5</option>
											<option value="6" class="lgtgrey2_bg"  >6</option>
											<option value="7" class="lgtgrey2_bg" >7</option>
											<option value="8" class="lgtgrey2_bg"  >8</option>
											<option value="9" class="lgtgrey2_bg"  >9</option>
											<option value="10" class="lgtgrey2_bg"  >10</option>
											<option value="11" class="lgtgrey2_bg" >11</option>		 
											</select>
												
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="minimum_time_period" id="minimum_time_period" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg "> 
											 
											<option value="1" class="lgtgrey2_bg" >Days</option>
											<option value="2" class="lgtgrey2_bg" >Weeks</option>
										 	 
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
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateExtraFee();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" id="more_event_extra_fee" name="more_event_extra_fee" value="0" />
										
										
										<div class="on_clmn mart20 hidden" id="extraFee">
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
												 
												<input type="number" value="0"   name="extra_fee" id="extra_fee" min="0" class="default_view  mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt wi_50"/> 
											  
											 </div>
											 
												
											 
										 	</div>
					 
										</div>
											
											
											
											</div>
										
											<div class="on_clmn mart20" >
											
											<div class="pos_rel">
												 
												<select   name="bookable_service_category_id" id="bookable_service_category_id"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
											 <?php  foreach($bookableServiceCategories as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" ><?php echo $value['service_category_name']; ?></option>
											 
											 
											 
														<?php } ?>
											 	 
											</select>
											
											<label for="is_bookable" class="floating__label tall nobold" data-content="Bookable service category" >
											<span class="hidden--visually">
											 Bookable</span></label>
												
											</div>
										 
										 	</div>
											</div>
											<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												<select   name="time_required" id="time_required"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
											<option value="1" class="lgtgrey2_bg">15 minutes</option>
											 
											<option value="2" class="lgtgrey2_bg">30 minutes</option>
											 
											<option value="3" class="lgtgrey2_bg">45 minutes</option>
											 
											<option value="4" class="lgtgrey2_bg">60 minutes</option>
											 	 
											</select>
											
											<label for="time_required" class="floating__label tall nobold" data-content=" Minimum time" >
											<span class="hidden--visually">
											 Minimum time</span></label>
												
											</div>
										 
										 	</div>
											
											<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												<select   name="preparation_time" id="preparation_time"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
											<option value="0" class="lgtgrey2_bg" >0 minutes</option>
											<option value="1" class="lgtgrey2_bg">15 minutes</option>
											 
											<option value="2" class="lgtgrey2_bg">30 minutes</option>
											 
											<option value="3" class="lgtgrey2_bg">45 minutes</option>
											 
											<option value="4" class="lgtgrey2_bg">60 minutes</option>
											 	 
											</select>
											
											<label for="time_required" class="floating__label tall nobold" data-content="Preparation time" >
											<span class="hidden--visually">
											 Preparation time</span></label>
												
											</div>
										 
										 	</div>
											
											
											<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												<select   name="post_production_time" id="post_production_time"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
												<option value="0" class="lgtgrey2_bg" >0 minutes</option>
											<option value="1" class="lgtgrey2_bg">15 minutes</option>
											 
											<option value="2" class="lgtgrey2_bg">30 minutes</option>
											 
											<option value="3" class="lgtgrey2_bg">45 minutes</option>
											 
											<option value="4" class="lgtgrey2_bg">60 minutes</option>
											 	 
											</select>
											
											<label for="post_production_time" class="floating__label tall nobold" data-content="Post production time" >
											<span class="hidden--visually">
											 Post production time</span></label>
												
											</div>
										 
										 	</div>
											
											</div>
												 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												
												<select   name="dish_type" id="dish_type"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  onchange="selectWarning(this.value);"> 
											 <option value="0">Select category</option> 
										 
											<option value="2" class="lgtgrey2_bg" >Drink</option>
											<option value="3" class="lgtgrey2_bg" >Spa</option>
											<option value="4" class="lgtgrey2_bg" >Fitness</option>		 
											</select>
											
											<label for="dish_type" class="floating__label tall nobold" data-content="Dish type" >
											<span class="hidden--visually">
											 Product Category</span></label>
												
											</div>
										 
										 	</div>
											 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="dish_name" id="dish_name" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25"/> 
												<label for="dish_name" class="floating__label tall nobold" data-content="Title" >
											<span class="hidden--visually">
											 Title</span></label>
											</div>
										 
											 
										</div>
										
										
										<div class="on_clmn  mart20 hidden">
											 
											<div class="pos_rel">
												
												
												<input type="text" name="dish_detail" id="dish_detail" placeholder="Description" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25"/> 
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
											 
											<div class="pos_rel"><textarea class="texteditor "  id="product_information" name="product_information"> 
										</textarea></div>
										</div>
										
									
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10 hidden" id="warningsDetail">
										<?php  foreach($foodTypeInformation as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="<?php echo substr($value['food_type'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>">
														</div>
														<?php } ?>

			
																			</div>	
											
								 
									 
								 
								 
								 <div class="on_clmn mart20 " id="productPrice">
											 
											<div class="pos_rel">
												
												
												<input type="number" name="dish_price" id="dish_price" placeholder="Price" min=0 value="0" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" onchange="checkVariation(this.value);"/> 
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
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked"  onclick="updateTax();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="tax_included" name="tax_included" value="1" />
										
										 <div class="on_clmn mart20 hidden" id="taxInfo">
											 
											<div class="pos_rel">
												
												<select   name="tax_amount" id="tax_amount"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"> 
											 <option value="0">0</option> 
										 <?php for($i=1;$i<=25;$i++) { ?>
											<option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
										 <?php } ?>
											</select>
											
											<label for="dish_type" class="floating__label tall nobold" data-content="How much tax" >
											<span class="hidden--visually">
											 How much tax</span></label>
												
											</div>
										 
										 	</div>
										
										
								
							 		<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " id='ifRecurr'>
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" id="oneTime" value="One time" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd green_bg fsz18 white_txt curp ffamily_avenir " onclick="addTypeRec(0,1);" >
														</div>
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="Recurring" id="subs" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addTypeRec(0,2);" >
														</div>
														</div>
										
											 <div class="on_clmn mart20  hidden" id="recurr">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_type" id="recurring_type" onchange="changeCustom(0,this.value);">
											       <option value="1" class="lgtgrey2_bg">Hourly</option>
												<option value="2" class="lgtgrey2_bg">Daily </option>
											<option value="3" class="lgtgrey2_bg">Weekly</option>
											<option value="4" class="lgtgrey2_bg">Monthly</option>		
											<option value="5" class="lgtgrey2_bg">Every 3 Month</option>	
											<option value="6" class="lgtgrey2_bg">Every 6 Month</option>	
											<option value="7" class="lgtgrey2_bg">Yearly</option>											
											<option value="8" class="lgtgrey2_bg">Custom</option>					 
											</select>
											 	
											  <label for="recurring_type" class="floating__label tall nobold padl10" data-content="Subscription type">
											<span class="hidden--visually">
											  Subscription type</span></label>
											</div>
											</div>
											<div id="customData" class="hidden">
											 <div class="thr_clmn  wi_15 padl10">
											<input type="text"  value="Every" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " readonly /> 
											 
											</div>
											 <div class="thr_clmn  wi_10 padl10">
											<input type="number"  id="total_time" name="total_time" value="1" min=1 class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " /> 
											 
											</div>
											
											<div class="thr_clmn  wi_25 padl10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_typec" id="recurring_typec">
											       <option value="1" class="lgtgrey2_bg">Hourly</option>
												<option value="2" class="lgtgrey2_bg">Daily </option>
											<option value="3" class="lgtgrey2_bg">Weekly</option>
											<option value="4" class="lgtgrey2_bg">Monthly</option>		
											<option value="7" class="lgtgrey2_bg">Yearly</option>											
											 			 
											</select>
											 	
											   
											</div>
											</div>
											</div>
										 </div>
										<input type="hidden" name="subscription_info" id="subscription_info" class="subscription_info" value="1" />				
								 
						
						 <div class="on_clmn  mart20  brdb " id="variationInfo">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If this product have Variation?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  "  onclick="updateVariation();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
						<div class="on_clmn mart20 hidden" id="row1">
									<div class="thr_clmn  wi_30 padr10">
											 
										<div class="pos_rel talc">
									
										<select   name="variation_id1" id="variation_id1"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  onchange="selectSubvariation(this.value,1);"> 
										 <option value="0">Select</option> 
										<?php  foreach($variationDetail as $category => $value) 
														{ ?>
											
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" ><?php echo $value['variation_name']; ?></option>
											 
														<?php } ?>											
											</select>
										 <label for="variation_id1" class="floating__label tall nobold" data-content="Variation" >
											<span class="hidden--visually">
											Variation</span></label>
									</div>
									</div>
<div class="thr_clmn  wi_60 padl10">									
											<div class="pos_rel">
												
			<select class="js-example-tokenizer   select2-multiple white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall maxhei_65p minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i select2-hidden-accessible" multiple="" id="sub1" name="sub1" onchange="selectId(1);" tabindex="-1" aria-hidden="true"> </select>
			
			 
		</div>
		</div>
		
		<div class="thr_clmn  wi_10 padl10 padt10">									
											<div class="pos_rel">
												
			 
			<a href="#" class="padrl30_a padrl10 fsz25 midgrey_txt lgn_hight_36  " onclick="deleteRow(1);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
			 
		</div>
		</div>
	 </div>
	 
	 
	 <div class="on_clmn mart20 hidden" id="row2">
									<div class="thr_clmn  wi_30 padr10">
											 
										<div class="pos_rel talc">
									
										<select   name="variation_id2" id="variation_id2"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"   onchange="selectSubvariation(this.value,2);"> 
										 <option value="0">Select</option> 
										<?php  foreach($variationDetail as $category => $value) 
														{ ?>
											
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" ><?php echo $value['variation_name']; ?></option>
											 
														<?php } ?>											
											</select>
										 <label for="variation_id2" class="floating__label tall nobold" data-content="Variation" >
											<span class="hidden--visually">
											Variation</span></label>
									</div>
									</div>
<div class="thr_clmn  wi_60 padl10">									
											<div class="pos_rel">
												
			<select class="js-example-tokenizer   select2-multiple white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i select2-hidden-accessible maxhei_65p" multiple="" id="sub2" name="sub2" onchange="selectId(2);" tabindex="-1" aria-hidden="true"> </select>
			
			 
		</div>
		</div>
		<div class="thr_clmn  wi_10 padl10 padt10">									
											<div class="pos_rel">
												
			 
			<a href="#" class="padrl30_a padrl10 fsz25 midgrey_txt lgn_hight_36  " onclick="deleteRow(2);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
			 
		</div>
		</div>
	 </div>
	 
	 <div class="on_clmn mart20 hidden" id="row3">
									<div class="thr_clmn  wi_30 padr10">
											 
										<div class="pos_rel talc">
									
										<select   name="variation_id3" id="variation_id3"  class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  onchange="selectSubvariation(this.value,3);"> 
										 <option value="0">Select</option> 
										<?php  foreach($variationDetail as $category => $value) 
														{ ?>
											
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" ><?php echo $value['variation_name']; ?></option>
											 
														<?php } ?>											
											</select>
										  <label for="variation_id3" class="floating__label tall nobold" data-content="Variation" >
											<span class="hidden--visually">
											Variation</span></label>
									</div>
									</div>
<div class="thr_clmn  wi_60 padl10">									
											<div class="pos_rel">
												
			<select class="js-example-tokenizer   select2-multiple white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i select2-hidden-accessible maxhei_65p" multiple="" id="sub3" name="sub3" onchange="selectId(3);" tabindex="-1" aria-hidden="true"> </select>
			
			 
		</div>
		</div>
		<div class="thr_clmn  wi_10 padl10 padt10">									
											<div class="pos_rel">
												
			 
			<a href="#" class="padrl30_a padrl10 fsz25 midgrey_txt lgn_hight_36  " onclick="deleteRow(3);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
			 
		</div>
		</div>
	 </div>
	 <div class="clear"></div>
	 
	 <a href="javascript:void(0);" class="hidden" onclick="showMoreLine();" id="moreValues">	<div class="red_txt fsz20 talc padtb20" >Add new variation </div></a>
										 


		<div id="variation_stock"></div>

										<input type="hidden" id="selected_variation1" name="selected_variation1" value="0" />
									  	<input type="hidden" id="selected_variation2" name="selected_variation2" value="0" />
										<input type="hidden" id="selected_variation3" name="selected_variation3" value="0" />
										 <input type="hidden" id="variation_count" name="variation_count" value="1" />
									  	<input type="hidden" id="variation_type" name="variation_type" value="0" />
										 <div class="clear"></div>
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Add</button></a> </div>
							
						</div>
						</div>
						
					</div> 
		 
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
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
		
<script>
function addNew()
{

$('#2').removeClass('hidden');
}
$(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})
function checkVariation(id)
{
	if($('#variation_type').val()==1)
	{
		selectId(1);
	}
}
function selectId(id)
{
	$('#errorMsg1').html('');
	var send_data={};
	 var send_ajax=1;
	send_data.variation_count=$('#variation_count').val();
	send_data.variation_price=$('#dish_price').val();
 if($('#variation_count').val()==1)
{
	send_data.value1=$("#sub1").select2('val');
	 if(send_data.value1==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
	 }
}

 else if($('#variation_count').val()==2)
{
	send_data.value1=$("#sub1").select2('val');
	send_data.value2=$("#sub2").select2('val');
	if(send_data.value1==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for first variation');
	 }
	else if(send_data.value2==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for second variation');
	 }
	 	
	
}

 else if($('#variation_count').val()==3)
{
	send_data.value1=$("#sub1").select2('val');
	send_data.value2=$("#sub2").select2('val');
	send_data.value3=$("#sub3").select2('val');
	if(send_data.value1==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for first variation');
	 }
	else if(send_data.value2==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for second variation');
	 }
	 else if(send_data.value3==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for third variation');
	 }		
	
	
}
 
if(send_ajax==1)
{
  $.ajax({
					type:"POST",
					url:"../createVariationInfo/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						 $('#variation_stock').html(data1);
					}
				});
}
}
function deleteRow(id)
{
	$('#errorMsg1').html('');
	if(id==1)
	{
		$('#errorMsg1').html('you can not delete first variation');
		return false;
	}
	if(id==2)
	{
		if($('#variation_count').val()==3)
		{
		$('#errorMsg1').html('you can not delete second variation till third variation is in use');
		return false;
		}
		else
		{
		$('#row2').addClass('hidden');	
		$('#sub2').html('');
		$('#variation_count').val(1);	
		selectId(1);		
		}
	}
	if(id==3)
	{
		 
		$('#row3').addClass('hidden');	
		$('#sub3').html('');
$('#variation_count').val(2);		
		selectId(1); 
	}
}


	$( ".select2-single, .select2-multiple" ).select2( {
		theme: "bootstrap",
		placeholder: "Select a State",
		maximumSelectionSize: 3,
		containerCssClass: ':all:'
		
		
	} );

	$( ":checkbox" ).on( "click", function() {
		$( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
		alert($('.select2-multiple').val());
	});
</script>

	</body>
</html>
