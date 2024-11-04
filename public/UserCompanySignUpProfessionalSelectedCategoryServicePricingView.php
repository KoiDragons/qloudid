<html class="home"><head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/translateCombine.js"></script>-->
		 
		<script type="text/javascript">
	
function changeLanguage(id)
		{
			var send_data={};
				 send_data.area_id=id;
				 send_data.bodyText=$('#bodyText').html();
				 $.ajax({
							type:"POST",
							url:"../../updateLanguageData",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
							$('#bodyText').html('');
							$('#bodyText').html(data1); 	  	
								  
							}
						});	
		}

function changeDisplay()
		{
			if($('#qrMenu').hasClass('hidden'))
			{
				$('#qrMenu').removeClass('hidden')
				
				$('#qrMenu').css('display','block');
			}
			else
				{
				$('#qrMenu').addClass('hidden')
				$('#qrMenu').css('display','none');
			}
		}	

function changeDisplay1()
		{
			if($('#qrMenu1').hasClass('hidden'))
			{
				$('#qrMenu1').removeClass('hidden')
				
				$('#qrMenu1').css('display','block');
			}
			else
				{
				$('#qrMenu1').addClass('hidden')
				$('#qrMenu1').css('display','none');
			}
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
			if($("#inclusion_type_detail").val()==null || $("#inclusion_type_detail").val()=="")
			{
				
				$("#errorMsg1").html('Please select where this service is available');
				return false;
			}  
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
<link rel="stylesheet" type="text/css" id="u0" href="https://www.qloudid.com/html/usercontent/js/tinymce/skins/lightgray/skin.min.css"></head>

	<body>
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10" style="background-color: #c12219 !important;">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../../../pricingList/<?php echo $data['cid']; ?>/<?php echo $data['catg_id']; ?>/<?php echo $data['subcatg_id']; ?>/<?php echo $data['domain_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">  
					<li class="last">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18" onclick="changeDisplay();"><span class="fas fa-globe black_txt" aria-hidden="true"></span></a>
						<ul id="qrMenu" class="hidden" >
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru">Russian</a></li>
                  
                  
                  <li>
				  
				  
                    <div class="line marb10"></div>
                  </li>
										
										
										 
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>  
			
		  
            <div class="clear"></div>
         </div>
      </div>
		 	<div class="column_m header hei_60p bs_bb lgtgrey2_bg visible-xs">
				<div class="wi_100 hei_60p xs-pos_fix padtb5 padrl0 lgtgrey2_bg">
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../../pricingList/<?php echo $data['cid']; ?>/<?php echo $data['catg_id']; ?>/<?php echo $data['subcatg_id']; ?>/<?php echo $data['domain_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
                     </li>
								 
								
								
								
							</ul>
						</div>
				
					</div>					 
				  
			<div class="top_menu frighti padt10 padb10" style="width:150px !important;">
				<ul class="menulist sf-menu  fsz16 ">
					 
       			
					<li style="margin-right:20px !important;">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25 sf-with-ul" onclick="changeDisplay1();"><span class="black_txt fas fa-globe"></span></a>
						<ul id="qrMenu1" class="hidden" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en" onclick="changeDisplay1();">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv" onclick="changeDisplay1();">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru" onclick="changeDisplay1();">Russian</a></li>
                  
                  
                  <li>
				  
				  
                    <div class="line marb10"></div>
                  </li>
										
										
										 
									</ol>
									<div class="clear"></div>
								</div>
							</li> 
							 
						</ul>
					</li>
				</ul>
			</div>
			
				
				 
				<div class="clear"></div>
			</div>
		</div> 
		 
		 
	<div class="clear"></div>
	
 
	<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 " id="loginBank">
				<div class="wrap maxwi_100 padrl25 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_65 xxs-lgn_hight_50 padb0 black_txt trn ffamily_avenir changedText"  ><?php echo substr(html_entity_decode($selectedProfessionalSubCategoryDetailInfo['subcategory_name']),0,-8); ?></h1>
									</div>
									<div class="mart10 marb5 xxs-tall talc  xs-padb0 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20 changedText" >Please add pricing to this service</a></div>
									
									
							<form action="../../../../addPriceDetail/<?php echo $data['cid']; ?>/<?php echo $data['catg_id']; ?>/<?php echo $data['subcatg_id']; ?>/<?php echo $data['domain_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								<input type="hidden" name="dish_name" id="dish_name" value="<?php echo $data['subcatg_id']; ?>"/>
								<div class="marb0 padtrl0">		 
							 
											 <div id="inclusionInfo" class="padt10 <?php if(count($selectedProfessionalCategoryAvailableLocation)==1) echo 'hidden'; ?>">
											 <script>
											 function updateInclutionType(id)
											   {
												   var getValue=$('#inclusion_type_detail').val();
													if($('#'+id).hasClass('checked'))
													{
														$('#'+id).removeClass('checked');
														getValue = getValue.replace(id+",", "");
														$("#inclusion_type_detail").val(getValue);
													}
													else
													{
														$('#'+id).addClass('checked');
														getValue=getValue+id+',';
														$("#inclusion_type_detail").val(getValue);
													}
											   }
											 </script>
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Service available</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How the contractor can provide the service?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									<div class="clear"></div>
									 	<?php 
										$j='';
												foreach($selectedProfessionalCategoryAvailableLocation as $category => $value) 
												{
												$j=$j.$value['id'].',';	
													
												?> 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="<?php echo $value['id']; ?>">
														<a href="javascript:void(0);" onclick="updateInclutionType(<?php echo $value['id']; ?>)">
														<input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8" checked></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText"><?php echo $value['location_name']; ?></label></div>
															
															</div>
												 	
												<?php } ?>
														
									 				
												<input type="hidden" id="inclusion_type_detail" name="inclusion_type_detail" value="<?php echo $j; ?>">				
										</div>
											 
											 
										 <div class="clear"></div>
											 
											
											<input type="hidden" name="food_type" id="food_type" value="">
											<div class="clear"></div>
											 
											<input type="hidden" name="product_type" id="product_type" value="2">
											  
											
											<div class="" id="timeInfo">
											<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is this service bookable?" class="wi_100 rbrdr pad10 padb0 padl0 xs-padt0  tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateBookable();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" name="is_bookable" id="is_bookable" value="0">
										
											
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
										
										<div class="on_clmn mart20 hidden">
											
											<div class="pos_rel">
												 
												<select name="bookable_service_category_id" id="bookable_service_category_id" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "> 
											 											<option value="1" class="lgtgrey2_bg">Acupressure</option>
											 
											 
											 
																									<option value="2" class="lgtgrey2_bg">Acupuncture</option>
											 
											 
											 
																									<option value="3" class="lgtgrey2_bg">Alternative medicine</option>
											 
											 
											 
																									<option value="4" class="lgtgrey2_bg">Ayurveda</option>
											 
											 
											 
																									<option value="5" class="lgtgrey2_bg">Barber</option>
											 
											 
											 
																									<option value="6" class="lgtgrey2_bg">Car wash</option>
											 
											 
											 
																									<option value="7" class="lgtgrey2_bg">Car care</option>
											 
											 
											 
																									<option value="8" class="lgtgrey2_bg">Bioresonance therapy</option>
											 
											 
											 
																									<option value="9" class="lgtgrey2_bg">Coachning</option>
											 
											 
											 
																									<option value="10" class="lgtgrey2_bg">Dietitians</option>
											 
											 
											 
																									<option value="11" class="lgtgrey2_bg">Animal care</option>
											 
											 
											 
																									<option value="12" class="lgtgrey2_bg">Tire hotel</option>
											 
											 
											 
																									<option value="13" class="lgtgrey2_bg">Tire workshop</option>
											 
											 
											 
																									<option value="14" class="lgtgrey2_bg">Fillers</option>
											 
											 
											 
																									<option value="15" class="lgtgrey2_bg">Photographing</option>
											 
											 
											 
																									<option value="16" class="lgtgrey2_bg">Chiropody</option>
											 
											 
											 
																									<option value="17" class="lgtgrey2_bg">French</option>
											 
											 
											 
																									<option value="18" class="lgtgrey2_bg">Frequency therapy</option>
											 
											 
											 
																									<option value="19" class="lgtgrey2_bg">Wellness</option>
											 
											 
											 
																									<option value="20" class="lgtgrey2_bg">Hairdresser</option>
											 
											 
											 
																									<option value="21" class="lgtgrey2_bg">Golf</option>
											 
											 
											 
																									<option value="22" class="lgtgrey2_bg">Golf training</option>
											 
											 
											 
																									<option value="23" class="lgtgrey2_bg">Healing</option>
											 
											 
											 
																									<option value="24" class="lgtgrey2_bg">Skincare</option>
											 
											 
											 
																									<option value="25" class="lgtgrey2_bg">Dog</option>
											 
											 
											 
																									<option value="26" class="lgtgrey2_bg">Dog groomer</option>
											 
											 
											 
																									<option value="27" class="lgtgrey2_bg">Hypnosis</option>
											 
											 
											 
																									<option value="28" class="lgtgrey2_bg">Hair care</option>
											 
											 
											 
																									<option value="29" class="lgtgrey2_bg">Health</option>
											 
											 
											 
																									<option value="30" class="lgtgrey2_bg">Health care</option>
											 
											 
											 
																									<option value="31" class="lgtgrey2_bg">Injection treatments</option>
											 
											 
											 
																									<option value="32" class="lgtgrey2_bg">Cat</option>
											 
											 
											 
																									<option value="33" class="lgtgrey2_bg">Kinesiology</option>
											 
											 
											 
																									<option value="34" class="lgtgrey2_bg">Chinese medicine</option>
											 
											 
											 
																									<option value="35" class="lgtgrey2_bg">Chiropractic</option>
											 
											 
											 
																									<option value="36" class="lgtgrey2_bg">Cosmetic tattoo</option>
											 
											 
											 
																									<option value="37" class="lgtgrey2_bg">Dietary advice</option>
											 
											 
											 
																									<option value="38" class="lgtgrey2_bg">Craniosacral therapy</option>
											 
											 
											 
																									<option value="39" class="lgtgrey2_bg">Body therapists</option>
											 
											 
											 
																									<option value="40" class="lgtgrey2_bg">Courses</option>
											 
											 
											 
																									<option value="41" class="lgtgrey2_bg">Laser treatment</option>
											 
											 
											 
																									<option value="42" class="lgtgrey2_bg">Limousine</option>
											 
											 
											 
																									<option value="43" class="lgtgrey2_bg">Doctor</option>
											 
											 
											 
																									<option value="44" class="lgtgrey2_bg">Make up</option>
											 
											 
											 
																									<option value="45" class="lgtgrey2_bg">Massage</option>
											 
											 
											 
																									<option value="46" class="lgtgrey2_bg">Media guidance</option>
											 
											 
											 
																									<option value="47" class="lgtgrey2_bg">Meditation</option>
											 
											 
											 
																									<option value="48" class="lgtgrey2_bg">Medium</option>
											 
											 
											 
																									<option value="49" class="lgtgrey2_bg">Nail extension</option>
											 
											 
											 
																									<option value="50" class="lgtgrey2_bg">Nail Care</option>
											 
											 
											 
																									<option value="51" class="lgtgrey2_bg">Nails</option>
											 
											 
											 
																									<option value="52" class="lgtgrey2_bg">Naprapati</option>
											 
											 
											 
																									<option value="53" class="lgtgrey2_bg">Nutrition therapy</option>
											 
											 
											 
																									<option value="54" class="lgtgrey2_bg">Optician</option>
											 
											 
											 
																									<option value="55" class="lgtgrey2_bg">Orthopedics</option>
											 
											 
											 
																									<option value="56" class="lgtgrey2_bg">Osteopathy</option>
											 
											 
											 
																									<option value="57" class="lgtgrey2_bg">Personal shopper</option>
											 
											 
											 
																									<option value="58" class="lgtgrey2_bg">Personal training</option>
											 
											 
											 
																									<option value="59" class="lgtgrey2_bg">Piercing</option>
											 
											 
											 
																									<option value="60" class="lgtgrey2_bg">Plastic surgery</option>
											 
											 
											 
																									<option value="61" class="lgtgrey2_bg">Prophylaxis</option>
											 
											 
											 
																									<option value="62" class="lgtgrey2_bg">Reflexology</option>
											 
											 
											 
																									<option value="63" class="lgtgrey2_bg">Renovation</option>
											 
											 
											 
																									<option value="64" class="lgtgrey2_bg">Advice</option>
											 
											 
											 
																									<option value="65" class="lgtgrey2_bg">Conversation therapy</option>
											 
											 
											 
																									<option value="66" class="lgtgrey2_bg">Physiotherapy</option>
											 
											 
											 
																									<option value="67" class="lgtgrey2_bg">Healthcare</option>
											 
											 
											 
																									<option value="68" class="lgtgrey2_bg">Shoe inserts</option>
											 
											 
											 
																									<option value="69" class="lgtgrey2_bg">Beauty</option>
											 
											 
											 
																									<option value="70" class="lgtgrey2_bg">Spa</option>
											 
											 
											 
																									<option value="71" class="lgtgrey2_bg">Spray</option>
											 
											 
											 
																									<option value="72" class="lgtgrey2_bg">Stylist</option>
											 
											 
											 
																									<option value="73" class="lgtgrey2_bg">Cleaning</option>
											 
											 
											 
																									<option value="74" class="lgtgrey2_bg">Dentist</option>
											 
											 
											 
																									<option value="75" class="lgtgrey2_bg">Dental care</option>
											 
											 
											 
																									<option value="76" class="lgtgrey2_bg">Tattoo</option>
											 
											 
											 
																									<option value="77" class="lgtgrey2_bg">Taxi</option>
											 
											 
											 
																									<option value="78" class="lgtgrey2_bg">Therapy</option>
											 
											 
											 
																									<option value="79" class="lgtgrey2_bg">Threading</option>
											 
											 
											 
																									<option value="80" class="lgtgrey2_bg">Exercise</option>
											 
											 
											 
																									<option value="81" class="lgtgrey2_bg">Educations</option>
											 
											 
											 
																									<option value="82" class="lgtgrey2_bg">Vaccination</option>
											 
											 
											 
																									<option value="83" class="lgtgrey2_bg">Waxing</option>
											 
											 
											 
																									<option value="84" class="lgtgrey2_bg">Workshop</option>
											 
											 
											 
																									<option value="85" class="lgtgrey2_bg">Veterinarians</option>
											 
											 
											 
																									<option value="86" class="lgtgrey2_bg">Zumba</option>
											 
											 
											 
																									<option value="87" class="lgtgrey2_bg">Eyelash extension</option>
											 
											 
											 
																									<option value="88" class="lgtgrey2_bg">Other</option>
											 
											 
											 
																									 	 
											</select>
											
											<label for="is_bookable" class="floating__label tall nobold padl10" data-content="Bookable service category">
											<span class="hidden--visually">
											 Bookable</span></label>
												
											</div>
										 
										 	</div>
										<input type="hidden" name="one_shared" id="one_shared" value="1" />	
										 
										
										
										<div class="hidden" id="sharedInfo">
											 <div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="one_shared_type" id="one_shared_type" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none " onchange="upadteOpenInfo(this.value);"> 
											  
											<option value="1" class="lgtgrey2_bg">Open</option>
											 
											<option value="2" class="lgtgrey2_bg">Private</option> 
											<option value="3" class="lgtgrey2_bg">Both</option> 
											 
														 
											 	 
											</select>
											 	<label for="one_shared_type" class="floating__label tall nobold padl10" data-content="Shared type">
											<span class="hidden--visually">
											 Bookable</span></label>
											</div>
										 	</div>
										<div class=" mart20" id="OpenInfo">
										
										<div class="on_clmn   brdb" id="selectRecurring">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is recurring" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked" onclick="updateRecurringEvent();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" id="recurring_event" name="recurring_event" value="1">
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
											<div class="thr_clmn  wi_50  padl60  xxs-padl40 "> 
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
										
										<div class="on_clmn mart20 hidden" id="notRecurringEvent">
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
												 
												<input type="date" name="open_event_date" id="open_event_date" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" value="2022-11-10"> 
											  
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
												 
												<select name="event_start_time" id="event_start_time" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg"> 
												 
											<option value="1">00:00</option> 
												 
											<option value="2">00:30</option> 
												 
											<option value="3">01:00</option> 
												 
											<option value="4">01:30</option> 
												 
											<option value="5">02:00</option> 
												 
											<option value="6">02:30</option> 
												 
											<option value="7">03:00</option> 
												 
											<option value="8">03:30</option> 
												 
											<option value="9">04:00</option> 
												 
											<option value="10">04:30</option> 
												 
											<option value="11">05:00</option> 
												 
											<option value="12">05:30</option> 
												 
											<option value="13">06:00</option> 
												 
											<option value="14">06:30</option> 
												 
											<option value="15">07:00</option> 
												 
											<option value="16">07:30</option> 
												 
											<option value="17">08:00</option> 
												 
											<option value="18">08:30</option> 
												 
											<option value="19">09:00</option> 
												 
											<option value="20">09:30</option> 
												 
											<option value="21">10:00</option> 
												 
											<option value="22">10:30</option> 
												 
											<option value="23">11:00</option> 
												 
											<option value="24">11:30</option> 
												 
											<option value="25">12:00</option> 
												 
											<option value="26">12:30</option> 
												 
											<option value="27">13:00</option> 
												 
											<option value="28">13:30</option> 
												 
											<option value="29">14:00</option> 
												 
											<option value="30">14:30</option> 
												 
											<option value="31">15:00</option> 
												 
											<option value="32">15:30</option> 
												 
											<option value="33">16:00</option> 
												 
											<option value="34">16:30</option> 
												 
											<option value="35">17:00</option> 
												 
											<option value="36">17:30</option> 
												 
											<option value="37">18:00</option> 
												 
											<option value="38">18:30</option> 
												 
											<option value="39">19:00</option> 
												 
											<option value="40">19:30</option> 
												 
											<option value="41">20:00</option> 
												 
											<option value="42">20:30</option> 
												 
											<option value="43">21:00</option> 
												 
											<option value="44">21:30</option> 
												 
											<option value="45">22:00</option> 
												 
											<option value="46">22:30</option> 
												 
											<option value="47">23:00</option> 
												 
											<option value="48">23:30</option> 
																							 
											 
											</select>
											  
											 </div>
											 
												
											</div>
										 	</div>
											
										
											<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_50 padr10">
											 
											<div class="pos_rel">
												 
												<input type="number" name="open_price_per_person" id="open_price_per_person" min="10" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="10"> 
												
												<label for="open_price_per_person" class="floating__label tall nobold padl10" data-content="Price info">
											<span class="hidden--visually">
											 Price info</span></label>
											  
											 </div>
											 
												
											</div>
										 <div class="thr_clmn  wi_50 padl10">
										 	<div class="pos_rel">
												 
												<input type="number" name="open_total_person" id="open_total_person" min="1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="1"> 
											  <label for="open_total_person" class="floating__label tall nobold padl10" data-content="Maximum person allowed">
											<span class="hidden--visually">
											 Price info</span></label>
											 </div>
											 
												
											</div>
										 	</div>
											
											
											<div class="on_clmn mart20 hidden">
										 	<div class="pos_rel">
												<input type="number" name="total_open_events" id="total_open_events" min="1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="1"> 
											  <label for="total_open_events" class="floating__label tall nobold padl10" data-content="Maximum events allowed">
											<span class="hidden--visually">
											 Price info</span></label> 
												 
											  
											 </div>
											 
												
											 
										 	</div>
											
											</div>
											
										
										 	</div>
										
										
											<div class="hidden" id="PrivateInfo">
										
											<div class="on_clmn mart20 ">
											
											<div class="thr_clmn  wi_50 padr10">
											 <div class="pos_rel">
												 <input type="number" name="private_price" id="private_price" min="1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="1"> 
											  <label for="private_price" class="floating__label tall nobold padl10" data-content="Minimum price for events">
											<span class="hidden--visually">
											 Price info</span></label> 
												 
											  
											 </div>
											 
												
											</div>
										 <div class="thr_clmn  wi_50 padl10">
										 	<div class="pos_rel">
												 <input type="number" name="private_max_person" id="private_max_person" min="1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="1"> 
											  <label for="private_max_person" class="floating__label tall nobold padl10" data-content="Maximum person allowed">
											<span class="hidden--visually">
											 Price info</span></label>  
												 
											  
											 </div>
											 
												
											</div>
										 	</div>
											
											
											
									<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Event available at customer place" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateCustomerPlace();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="event_at_customer_place" name="event_at_customer_place" value="0">
										
										<div class="on_clmn  mart20 brdb hidden" id="customerPlaceTour">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Tour fee applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateTourFee();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="tour_fee_applicable" name="tour_fee_applicable" value="0">
										
										<div class="on_clmn mart20 hidden" id="tourFee">
											 
											<div class="pos_rel">
												  <input type="number" name="tour_fee" id="tour_fee" min="1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="1"> 
											  <label for="tour_fee" class="floating__label tall nobold padl10" data-content="Travel fee">
											<span class="hidden--visually">
											 Price info</span></label>  
												  
											  
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn mart20">
											 <div class="pos_rel">
												  <input type="number" name="total_private_events" id="total_private_events" min="1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="1"> 
											  <label for="total_private_events" class="floating__label tall nobold padl10" data-content="Maximum events per day">
											<span class="hidden--visually">
											 Price info</span></label>  
												 
											  
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn  mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="More events available on request" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
											<div class="pos_rel">											
												<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateMoreEvents();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" id="more_event_on_request" name="more_event_on_request" value="0">
										
										<div class="hidden" id="moreEvents">
										<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												  <input type="number" name="minimum_people_required" id="minimum_people_required" min="1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="1"> 
											  <label for="minimum_people_required" class="floating__label tall nobold padl10" data-content="Minimum person required">
											<span class="hidden--visually">
											 Price info</span></label> 
												 
											 </div>
											 
												
											 
										 	</div>
											
											
											<div class="on_clmn  mart20 ">
											  <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<select name="minimum_time_required" id="minimum_time_required" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "> 
											<option value="0" class="lgtgrey2_bg">0</option>
											<option value="1" class="lgtgrey2_bg">1</option>
											<option value="2" class="lgtgrey2_bg">2</option>
											<option value="3" class="lgtgrey2_bg">3</option>
											<option value="4" class="lgtgrey2_bg">4</option>
											<option value="5" class="lgtgrey2_bg">5</option>
											<option value="6" class="lgtgrey2_bg">6</option>
											<option value="7" class="lgtgrey2_bg">7</option>
											<option value="8" class="lgtgrey2_bg">8</option>
											<option value="9" class="lgtgrey2_bg">9</option>
											<option value="10" class="lgtgrey2_bg">10</option>
											<option value="11" class="lgtgrey2_bg">11</option>		 
											</select>
												<label for="minimum_time_required" class="floating__label tall nobold padl10" data-content="Request period">
											<span class="hidden--visually">
											 Bookable</span></label>
											</div>
										 </div>
										 
										  <div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select name="minimum_time_period" id="minimum_time_period" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "> 
											 
											<option value="1" class="lgtgrey2_bg">Days</option>
											<option value="2" class="lgtgrey2_bg">Weeks</option>
										 	 
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
										<div class="thr_clmn  wi_25">
											<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateExtraFee();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" id="more_event_extra_fee" name="more_event_extra_fee" value="0">
										
										
										<div class="on_clmn mart20 hidden" id="extraFee">
											
											<div class="pos_rel">
												<input type="number" value="0" name="extra_fee" id="extra_fee" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="extra_fee" class="floating__label tall nobold padl10" data-content="Extra fee">
											<span class="hidden--visually">
											 Title</span></label> 
												
											  
											 </div>
											 
												
											 
										 	</div>
					 
										</div>
											
											
											
											</div>
										
											 
											
											
											</div>
											
											
											<div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												
												<select name="time_required" id="time_required" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "> 
											<option value="1" class="lgtgrey2_bg">15 minutes</option>
											 
											<option value="2" class="lgtgrey2_bg">30 minutes</option>
											 
											<option value="3" class="lgtgrey2_bg">45 minutes</option>
											 
											<option value="4" class="lgtgrey2_bg">60 minutes</option>
											 	 
											</select>
											
											<label for="time_required" class="floating__label tall nobold padl10" data-content=" Minimum time">
											<span class="hidden--visually">
											 Minimum time</span></label>
												
											</div>
										 
										 	</div>
											
											<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												<select name="preparation_time" id="preparation_time" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "> 
											<option value="0" class="lgtgrey2_bg">0 minutes</option>
											<option value="1" class="lgtgrey2_bg">15 minutes</option>
											 
											<option value="2" class="lgtgrey2_bg">30 minutes</option>
											 
											<option value="3" class="lgtgrey2_bg">45 minutes</option>
											 
											<option value="4" class="lgtgrey2_bg">60 minutes</option>
											 	 
											</select>
											
											<label for="time_required" class="floating__label tall nobold padl10" data-content="Preparation time">
											<span class="hidden--visually">
											 Preparation time</span></label>
												
											</div>
										 
										 	</div>
											
											
											<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												<select name="post_production_time" id="post_production_time" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "> 
												<option value="0" class="lgtgrey2_bg">0 minutes</option>
											<option value="1" class="lgtgrey2_bg">15 minutes</option>
											 
											<option value="2" class="lgtgrey2_bg">30 minutes</option>
											 
											<option value="3" class="lgtgrey2_bg">45 minutes</option>
											 
											<option value="4" class="lgtgrey2_bg">60 minutes</option>
											 	 
											</select>
											
											<label for="post_production_time" class="floating__label tall nobold padl10" data-content="Post production time">
											<span class="hidden--visually">
											 Post production time</span></label>
												
											</div>
										 
										 	</div>
											
											
											</div>
											 
										 <div class="on_clmn mart20 hidden">
											 
											<div class="pos_rel">
												
												<select name="dish_type" id="dish_type" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none " onchange="selectWarning(this.value);"> 
											
											<option value="2" class="lgtgrey2_bg">Drink</option>
											<option value="3" class="lgtgrey2_bg">Spa</option>
											<option value="4" class="lgtgrey2_bg">Fitness</option>		 
											</select>
											
											<label for="dish_type" class="floating__label tall nobold padl10" data-content="Product type">
											<span class="hidden--visually">
											 Product Category</span></label>
												
											</div>
										 
										 	</div>
											  
										
										<div class="on_clmn  mart20 hidden">
											 
											<div class="pos_rel">
												
												
												<input type="text" name="dish_detail" id="dish_detail" placeholder="Description" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="dish_detail" class="floating__label tall nobold padl10" data-content="Description">
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
										<?php echo $selectedProfessionalSubCategoryDetailInfo['professional_description']; ?></textarea></div>
										</div>
										
									 
									 
								 
								 
								 <div class="on_clmn mart20 " id="productPrice">
											 
											<div class="pos_rel">
												
												
												<input type="number" name="dish_price" id="dish_price" placeholder="Price" min="0" value="0" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" onchange="checkVariation(this.value);"> 
												<label for="dish_price" class="floating__label tall nobold padl10" data-content="Price">
											<span class="hidden--visually">
											Price</span></label>
											</div>
											 
										 
										</div>
										
										
										 <div class="on_clmn  mart20  brdb ">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is tax included (Yes/No)" class="wi_100 rbrdr    tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
										<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked"  onclick="updateTax();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" id="tax_included" name="tax_included" value="1">
										
										 <div class="on_clmn mart20 hidden" id="taxInfo">
											 
											<div class="pos_rel">
												
												<select name="tax_amount" id="tax_amount" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "> 
											 <option value="0">0</option> 
										 											<option value="1" class="lgtgrey2_bg">1</option>
										 											<option value="2" class="lgtgrey2_bg">2</option>
										 											<option value="3" class="lgtgrey2_bg">3</option>
										 											<option value="4" class="lgtgrey2_bg">4</option>
										 											<option value="5" class="lgtgrey2_bg">5</option>
										 											<option value="6" class="lgtgrey2_bg">6</option>
										 											<option value="7" class="lgtgrey2_bg">7</option>
										 											<option value="8" class="lgtgrey2_bg">8</option>
										 											<option value="9" class="lgtgrey2_bg">9</option>
										 											<option value="10" class="lgtgrey2_bg">10</option>
										 											<option value="11" class="lgtgrey2_bg">11</option>
										 											<option value="12" class="lgtgrey2_bg">12</option>
										 											<option value="13" class="lgtgrey2_bg">13</option>
										 											<option value="14" class="lgtgrey2_bg">14</option>
										 											<option value="15" class="lgtgrey2_bg">15</option>
										 											<option value="16" class="lgtgrey2_bg">16</option>
										 											<option value="17" class="lgtgrey2_bg">17</option>
										 											<option value="18" class="lgtgrey2_bg">18</option>
										 											<option value="19" class="lgtgrey2_bg">19</option>
										 											<option value="20" class="lgtgrey2_bg">20</option>
										 											<option value="21" class="lgtgrey2_bg">21</option>
										 											<option value="22" class="lgtgrey2_bg">22</option>
										 											<option value="23" class="lgtgrey2_bg">23</option>
										 											<option value="24" class="lgtgrey2_bg">24</option>
										 											<option value="25" class="lgtgrey2_bg">25</option>
										 											</select>
											
											<label for="dish_type" class="floating__label tall nobold padl10" data-content="How much tax">
											<span class="hidden--visually">
											 How much tax</span></label>
												
											</div>
										 
										 	</div>
										
										
								
							 		<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " id="ifRecurr">
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" id="oneTime" value="One time" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd green_bg fsz18 white_txt curp ffamily_avenir " onclick="addTypeRec(0,1);">
														</div>
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="Recurring" id="subs" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addTypeRec(0,2);">
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
											 	
											  <label for="recurring_type" class="floating__label tall nobold padl10 padl10" data-content="Subscription type">
											<span class="hidden--visually">
											  Subscription type</span></label>
											</div>
											</div>
											<div id="customData" class="hidden">
											 <div class="thr_clmn  wi_15 padl10">
											<input type="text" value="Every" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 " readonly=""> 
											 
											</div>
											 <div class="thr_clmn  wi_10 padl10">
											<input type="number" id="total_time" name="total_time" value="1" min="1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 "> 
											 
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
										<input type="hidden" name="subscription_info" id="subscription_info" class="subscription_info" value="1">				
								 
						
						 <div class="on_clmn  mart20  brdb  hidden" id="variationInfo">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If this product have Variation?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  ">
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateVariation();">
																<input type="checkbox" class="default" data-true="" data-false="">
															<div class="boolean-control-wrap"><div class="boolean-control-options"><a href="#" data-value="true" class="boolean-control-option true"></a><a href="#" data-value="false" class="boolean-control-option false"></a><div class="clear"></div></div></div></div>
													</div>
											</div>
											</div>
											 
									 

										</div>
						<div class="on_clmn mart20 hidden" id="row1">
									<div class="thr_clmn  wi_30 padr10">
											 
										<div class="pos_rel talc">
									
										<select name="variation_id1" id="variation_id1" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100" onchange="selectSubvariation(this.value,1);"> 
										 <option value="0">Select</option> 
																					
											</select>
										 <label for="variation_id1" class="floating__label tall nobold padl10" data-content="Variation">
											<span class="hidden--visually">
											Variation</span></label>
									</div>
									</div>
<div class="thr_clmn  wi_60 padl10">									
											<div class="pos_rel">
												
			<select class="js-example-tokenizer   select2-multiple white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall maxhei_65p minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i select2-hidden-accessible" multiple="" id="sub1" name="sub1" onchange="selectId(1);" tabindex="-1" aria-hidden="true"> </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 100px;"><span class="selection"><span class="select2-selection select2-selection--multiple js-example-tokenizer white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall maxhei_65p minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline first last"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 100px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
			
			 
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
									
										<select name="variation_id2" id="variation_id2" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100" onchange="selectSubvariation(this.value,2);"> 
										 <option value="0">Select</option> 
																					
											</select>
										 <label for="variation_id2" class="floating__label tall nobold padl10" data-content="Variation">
											<span class="hidden--visually">
											Variation</span></label>
									</div>
									</div>
<div class="thr_clmn  wi_60 padl10">									
											<div class="pos_rel">
												
			<select class="js-example-tokenizer   select2-multiple white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i maxhei_65p select2-hidden-accessible" multiple="" id="sub2" name="sub2" onchange="selectId(2);" tabindex="-1" aria-hidden="true"> </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 100px;"><span class="selection"><span class="select2-selection select2-selection--multiple js-example-tokenizer white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i maxhei_65p" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline first last"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 100px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
			
			 
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
									
										<select name="variation_id3" id="variation_id3" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100" onchange="selectSubvariation(this.value,3);"> 
										 <option value="0">Select</option> 
																					
											</select>
										  <label for="variation_id3" class="floating__label tall nobold padl10" data-content="Variation">
											<span class="hidden--visually">
											Variation</span></label>
									</div>
									</div>
<div class="thr_clmn  wi_60 padl10">									
											<div class="pos_rel">
												
			<select class="js-example-tokenizer   select2-multiple white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i maxhei_65p select2-hidden-accessible" multiple="" id="sub3" name="sub3" onchange="selectId(3);" tabindex="-1" aria-hidden="true"> </select><span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 100px;"><span class="selection"><span class="select2-selection select2-selection--multiple js-example-tokenizer white_bg wi_100 nobrdr nobrdt nobrdl brdb_red_ff2828 tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt15i maxhei_65p" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline first last"><input class="select2-search__field" type="search" tabindex="-1" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 100px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
			
			 
		</div>
		</div>
		<div class="thr_clmn  wi_10 padl10 padt10">									
											<div class="pos_rel">
												
			 
			<a href="#" class="padrl30_a padrl10 fsz25 midgrey_txt lgn_hight_36  " onclick="deleteRow(3);"><i class="fas fa-trash-alt" aria-hidden="true"></i></a>
			 
		</div>
		</div>
	 </div>
	 <div class="clear"></div>
	 
	 <a href="javascript:void(0);" class="hidden" onclick="showMoreLine();" id="moreValues">	<div class="red_txt fsz20 talc padtb20">Add new variation </div></a>
										 


		<div id="variation_stock"></div>

										<input type="hidden" id="selected_variation1" name="selected_variation1" value="0">
									  	<input type="hidden" id="selected_variation2" name="selected_variation2" value="0">
										<input type="hidden" id="selected_variation3" name="selected_variation3" value="0">
										 <input type="hidden" id="variation_count" name="variation_count" value="1">
									  	<input type="hidden" id="variation_type" name="variation_type" value="0">
										 <div class="clear"></div>
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir">Add</button></a> </div>
							
						</div></form>
						</div>
						
					</div> 
		 
	</div>
</div>

<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 
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

	

</body></html>