﻿<!doctype html>


<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
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
		<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/translateCombine.js"></script>
		 <script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/translateLable.js"></script>-->
		<script type="text/javascript">
	  function updateDayopen(id,link)
	   {
		   dayValue=id;
		   foodValue=0;
		   if(id==1)
		   {
			   $('#company_charge_info').val(0);
		   }
		   else
		   {
			   $('#buyer_charge_info').val(0); 
		   }
		   
		    if(id>1)
		   {
		   $('#is_recurring_payment'+id).val(1);
		   $('#subscription_fee'+id).val(0);
		   }
	   }
	   
	   function updateLicence(id)
	{
		 dayValue=0;
		   foodValue=0;
		licenceValue=id;
		updateLicenceValue=1;
	}
   
   
	   function updateFood(id)
	   {
		   $('#day1').val(0);
		   $('#day2').val(0);
		   $('#company_charge_info').val(0);
		   $('#buyer_charge_info').val(0);
		   $('.boolean-control').removeClass('checked');
		    $('#day_1').addClass('hidden');
			$('#day_2').addClass('hidden');
		   foodValue=id;
		   dayValue=0;
	   }

	   
	  function submitform()
		{
			 
			$("#errorMsg1").html('');
			 
			var bg_url = $('#image-data').css('background-image');
			$('#image-data1').val(bg_url);
			 if($("#category_name").val()==null || $("#category_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter Marketplace name ');
				return false;
			}
			
			
			 if($("#heading_info").val()==null || $("#heading_info").val()=="")
			{
				
				$("#errorMsg1").html('Please enter Marketplace heading ');
				return false;
			}
			
			 if($("#subheading_info").val()==null || $("#subheading_info").val()=="")
			{
				
				$("#errorMsg1").html('Please enter Marketplace subheading ');
				return false;
			}
			
			 if($("#bg_color_info").val()==null || $("#bg_color_info").val()=="")
			{
				
				$("#errorMsg1").html('Please enter Marketplace bg color ');
				return false;
			}
			if($("#bg_color_info").val().length<6) 
				{
					$("#errorMsg1").html('Color code must be minimum six digit');
					return false;
				}
			if($("#inclusion_type_detail").val()==null || $("#inclusion_type_detail").val()=="")
			{
				
				$("#errorMsg1").html('Please select where this service is available');
				return false;
			} 
			if($("#signup_type_value").val()==null || $("#signup_type_value").val()=="")
			{
				
				$("#errorMsg1").html('Please select atleast one signup type');
				return false;
			}
			
			if($("#marketplace_review").val()==null || $("#marketplace_review").val()=="")
			{
				
				$("#errorMsg1").html('Please add a review');
				return false;
			}
			
			if(($('#day2').val()+$('#day1').val()+$('#day3').val())==0)
			{
			$("#errorMsg1").html('Please select atleast one subscription type you offer');
			return false;
			}
			
			if($('#food1').val()==1)
			{
				if($('#day1').val()==1)
				{
					 
					if($('#company_charge_info').val()==0)
					{
						$("#errorMsg1").html('Please add free   commission information');
						return false;
					}
				}
				if($('#day2').val()==1)
				{
					if($("#subscription_fee2").val()==0)
					{
						$("#errorMsg1").html('Please enter subscription fee');
						return false;
					}
					if($('#buyer_charge_info').val()==0)
					{
						$("#errorMsg1").html('Please add introduction commission information');
						return false;
					}
					
				}
				
				if($('#day3').val()==1)
				{
					if($("#subscription_fee3").val()==0)
					{
						$("#errorMsg1").html('Please enter subscription fee');
						return false;
					}
					if($('#partner_charge_info').val()==0)
					{
						$("#errorMsg1").html('Please add premium commission information');
						return false;
					}
				}
			}
			 
			 document.getElementById('save_indexing').submit();
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
		
		
			<!-- HEADER -->
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10" style="background-color: #c12219 !important;">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../marketplaceList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
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
                        <a href="../marketplaceList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
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
			<div class="column_m talc lgn_hight_22 fsz16 mart40   "  >
				<div class="wrap maxwi_100 padrl0 xs-padrl25 xsi-padrl134">
					
					 
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_65 xxs-lgn_hight_50 padb0 black_txt trn ffamily_avenir changedText"  >Update</h1>
									</div>
									<div class="mart10 marb5 xxs-tall talc  xs-padb0 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20 changedText" >Please update market place here</a></div>
						 
					 
					 <div class="clear"></div>
									
						 
									 
									  
									  <form action="../updateProfessionalMarketplace/<?php echo $data['mid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1" class="checkout__item js-tabs-item">
									 	<div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile1" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active" style="background-color: #c12219 !important; "><span class="changedText">Marketplace detail</span>
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div class="on_clmn mart10 ">
									 
								<div class="wi_50 xxs-wi_100  ">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="" class="hidden-image-data" />
										 
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: <?php echo $selectedProfessionalMarketplaceDetail['background_image']; ?>" id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								
								 
							</div>
						 
						 
						 
								 
						</div>	
						<div class="on_clmn mart10 ">
									<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 talc">
											
											<label class="forword ">
												Background Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
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
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Template type</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Which template you want on start page?</span> 
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
										 
									
									 <div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="start_page_template" id="start_page_template" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none " fdprocessedid="lyd8d"> 
											  
											<option value="1" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['start_page_template']==1) echo 'selected'; ?>>Template1</option>
											   
												<option value="2" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['start_page_template']==2) echo 'selected'; ?>>Template2</option>
												 
											   <option value="3" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['start_page_template']==3) echo 'selected'; ?>>Template3</option>
																							 		 
											 	 
											</select>
											 	<label for="start_page_template" class="floating__label tall nobold padl10" data-content="Connection type">
											<span class="hidden--visually">
											 Start page template</span></label>
											</div>
										 	</div>
								
								<div class="clear"></div>
										
								<div id="profile1" class=" " style="display:block;">	
									 
											<div id="inclusionInfo" class="padt10">
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
											$i='';	foreach($professionalServiceMarketplaceLocation as $category => $value) 
												{
													
													
												?> 
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20 <?php if($value['is_selected']==1) echo 'checked'; ?>" id="<?php echo $value['id']; ?>">
														<a href="javascript:void(0);" onclick="updateInclutionType(<?php echo $value['id']; ?>)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8" <?php if($value['is_selected']==1) {echo 'checked'; $i=$i.$value['id'].',';} ?>></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText"><?php echo $value['location_name']; ?></label></div>
															
															</div>
												<?php } ?>
										 
												 	
										 
										 
														
									 				
												<input type="hidden" id="inclusion_type_detail" name="inclusion_type_detail" value="<?php echo $i; ?>">				
										</div>
											 
											 
										 <div class="clear"></div>
										 
										 
											<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Signup type</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Purpose of signup on professional services?</span> 
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
											
											
										 <script>
									 function updateSignupType(id,id1)
									 {
										 var getValue=$('#signup_type_value').val();
										 if(id==1)
										 {
											 if(id1==1)
											 {
												 var dataTextInner='<a href="javascript:void(0);" onclick="updateSignupType(1,0);"><div id="bath-chip2" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu" fdprocessedid="gfxwmo"><span class="chip chip_is-selected"> <span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">User</span> </span></span></div></div></a>';
												$('#userSignup').html(dataTextInner);
												getValue=getValue+id+',';
											 }
											 else
											 {
												 var dataTextInner='<a href="javascript:void(0);" onclick="updateSignupType(1,1);"><div id="bath-chip2" class="css-cedhmb"><div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="ryexqi"><span class="chip chip_not-selected"><span class="chip_content"><div class="css-ylfimb"></div><span class="chip_text">User</span> </span></span></div> </div></a>';
												 $('#userSignup').html(dataTextInner);
												 getValue = getValue.replace(id+",", "");
											 }
										 }
										 else if(id==3)
										 {
											 if(id1==1)
											 {
												 var dataTextInner='<a href="javascript:void(0);" onclick="updateSignupType(3,0);"><div id="bath-chip1" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu" fdprocessedid="gfxwmo"><span class="chip chip_is-selected"> <span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">User company</span> </span></span></div></div></a>';
												$('#compnaySignup').html(dataTextInner);
												getValue=getValue+id+',';
											 }
											 else
											 {
												 var dataTextInner='<a href="javascript:void(0);" onclick="updateSignupType(3,1);"><div id="bath-chip1" class="css-cedhmb"><div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="ryexqi"><span class="chip chip_not-selected"><span class="chip_content"><div class="css-ylfimb"></div><span class="chip_text">User company</span> </span></span></div> </div></a>';
												 $('#compnaySignup').html(dataTextInner);
												 getValue = getValue.replace(id+",", "");
											 }
										 }
										 
										 else if(id==2)
										 {
											 if(id1==1)
											 {
												 var dataTextInner='<a href="javascript:void(0);" onclick="updateSignupType(2,0);"><div id="bath-chip" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu" fdprocessedid="gfxwmo"><span class="chip chip_is-selected"> <span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">User selling company</span> </span></span></div></div></a>';
												$('#partnerSignup').html(dataTextInner);
												getValue=getValue+id+',';
											 }
											 else
											 {
												 var dataTextInner='<a href="javascript:void(0);" onclick="updateSignupType(2,1);"><div id="bath-chip" class="css-cedhmb"><div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="ryexqi"><span class="chip chip_not-selected"><span class="chip_content"><div class="css-ylfimb"></div><span class="chip_text">User selling company</span> </span></span></div> </div></a>';
												 $('#partnerSignup').html(dataTextInner);
												 getValue = getValue.replace(id+",", "");
											 }
										 }
										 
										 $('#signup_type_value').val(getValue);
									 }
									 </script>
									 
									 <div class="column_m container  marb5  mart0 fsz14 dark_grey_txt  ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   <p class="paragraph--b1 paragraph--full css-1680uhd hidden">Purpose of signup on professional services</p>
												   <div class="chip-container">
												   <div id="userSignup">
												   <?php $dataWork=explode(',',$selectedProfessionalMarketplaceDetail['signup_type']);
												   if (in_array(1, $dataWork))
													{
													echo '<a href="javascript:void(0);" onclick="updateSignupType(1,0);"><div id="bath-chip2" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu" fdprocessedid="gfxwmo"><span class="chip chip_is-selected"> <span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">User</span> </span></span></div></div></a>';
													}
													else
													{
													echo '<a href="javascript:void(0);" onclick="updateSignupType(1,1);"><div id="bath-chip2" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="ryexqi">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">User</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
													}
														?>							   
													  
													  </div>
													    <div id="compnaySignup">
														<?php if (in_array(3, $dataWork))
													{
													echo '<a href="javascript:void(0);" onclick="updateSignupType(3,0);"><div id="bath-chip1" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu" fdprocessedid="gfxwmo"><span class="chip chip_is-selected"> <span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">User company</span> </span></span></div></div></a>';
													}
													else
													{
													echo '<a href="javascript:void(0);" onclick="updateSignupType(3,1);"><div id="bath-chip1" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="ryexqi">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">User company</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
													}
														?>	
													 
													  </div>
													 <div id="partnerSignup">
													 <?php if (in_array(2, $dataWork))
													{
													echo '<a href="javascript:void(0);" onclick="updateSignupType(2,0);"><div id="bath-chip" class="css-cedhmb"><div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu" fdprocessedid="gfxwmo"><span class="chip chip_is-selected"> <span class="chip_content"><div class="css-utgzrm"></div><span class="chip_text">User selling company</span> </span></span></div></div></a>';
													}
													else
													{
													echo '<a href="javascript:void(0);" onclick="updateSignupType(2,1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="ryexqi">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">User selling company</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
													}
														?>	
													
													  </div>
													 
													 
												   </div>
												</div>
												<div class="clear"></div>
											 
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 <input type="hidden" name="signup_type_value" id="signup_type_value" value="<?php echo $selectedProfessionalMarketplaceDetail['signup_type'].','; ?>" />
											 
									</div>
									
										  <div class="clear"></div>
										  <div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="booking_signup_type" id="booking_signup_type" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none " fdprocessedid="lyd8d"> 
											  
											<option value="1" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['booking_signup_type']==1) echo 'selected'; ?>>Book a pro</option>
											<option value="2" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['booking_signup_type']==2) echo 'selected'; ?>>Compare prices</option>   
											<option value="3" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['booking_signup_type']==3) echo 'selected'; ?>>Both of them</option>
												 
											   
																							 		 
											 	 
											</select>
											 	<label for="booking_signup_type" class="floating__label tall nobold padl10" data-content="Booking type">
											<span class="hidden--visually">
											 Tax</span></label>
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
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Marketplace name</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">What is the name of new marketplace?</span> 
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
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="text" name="category_name" id="category_name" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" value="<?php echo $selectedProfessionalMarketplaceDetail['marketplace_name']; ?>"> 
												
											 <label for="category_name" class="floating__label tall nobold padl10  " data-content="Marketplace name">
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
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Marketplace heading</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">What is the heading on new marketplace?</span> 
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
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="text" name="heading_info" id="heading_info" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36" value="<?php echo $selectedProfessionalMarketplaceDetail['heading_info']; ?>"> 
												
											 <label for="heading_info" class="floating__label tall nobold padl10  " data-content="Marketplace heading">
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
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Marketplace subheading</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">What is the subheading of new marketplace?</span> 
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
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="text" name="subheading_info" id="subheading_info" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"  value="<?php echo $selectedProfessionalMarketplaceDetail['subheading_info']; ?>"> 
												
											 <label for="subheading_info" class="floating__label tall nobold padl10  " data-content="Marketplace subheading">
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
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Marketplace background color</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">What is the bg color of new marketplace?(Use hex code)</span> 
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
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="text" name="bg_color_info" id="bg_color_info" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"  value="<?php echo $selectedProfessionalMarketplaceDetail['bg_color_info']; ?>"> 
												
											 <label for="bg_color_info" class="floating__label tall nobold padl10  " data-content="Marketplace background color">
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
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Marketplace review</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please add a review for you marketplace</span> 
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
									 
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="text" name="marketplace_review" id="marketplace_review" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $selectedProfessionalMarketplaceDetail['marketplace_review']; ?> " fdprocessedid="x4hy36"> 
												
											 <label for="marketplace_review" class="floating__label tall nobold padl10  " data-content="Marketplace review">
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
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Description</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please add a short description about your marketplace</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									
									 
										<div class="on_clmn mart20 ">
											 
											<div class="pos_rel"><textarea class="texteditor "  id="marketplace_description" name="marketplace_description"><?php echo $selectedProfessionalMarketplaceDetail['marketplace_description']; ?>  
										 </textarea></div>
										</div>	  
											
											<div class="clear"></div>
													
										 <div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="tax_info" id="tax_info" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "   fdprocessedid="lyd8d"> 
												<?php for($i=0;$i<=20;$i++) { ?>
												<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['tax_info']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
												 
											  <?php } ?>	 
																							 		 
											 	 
											</select>
											 	<label for="tax_info" class="floating__label tall nobold padl10" data-content="Tax(%)">
											<span class="hidden--visually">
											 Tax</span></label>
											</div>
										 	</div>
										  <div class="clear"></div>
										  <div class="on_clmn    brdb hidden">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you charge customers" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($selectedProfessionalMarketplaceDetail['charge_on_estore']==1) echo 'checked'; ?> " onclick="updateFood(1);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div class="clear"></div>
											<input type="hidden" id="food1" name="food1" value='1' />
									  	 <input type="hidden" id="day1" name="day1" value='<?php echo $selectedProfessionalMarketplaceDetail['charge_on_companies']; ?>' />
										 <input type="hidden" id="day2" name="day2" value='<?php echo $selectedProfessionalMarketplaceDetail['charge_on_buyers']; ?>' />
										  <input type="hidden" id="day3" name="day3" value='<?php echo $selectedProfessionalMarketplaceDetail['charge_on_partners']; ?>' />
										  <div class="" id="food_1">
										   <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have free" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedProfessionalMarketplaceDetail['charge_on_companies']==1) echo 'checked'; ?>" onclick="updateDayopen(1);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div class="<?php if($selectedProfessionalMarketplaceDetail['charge_on_companies']==0) echo 'hidden'; ?>" id="day_1">
										
										
										  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If user need licences" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($selectedProfessionalMarketplaceDetail['free_licences_required']==1) echo 'checked'; ?> " onclick="updateLicence(1);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
										<input type="hidden" id="licence1" name="licence1" value='<?php echo $selectedProfessionalMarketplaceDetail['free_licences_required']; ?>' />
										
										
										 <div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="company_charge_info" id="company_charge_info" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none " fdprocessedid="lyd8d"> 
											  
											<option value="0" class="lgtgrey2_bg">Select</option>
											   
												<?php for($i=1;$i<=20;$i++) { ?>
												<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['company_charge_info']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
												 
											  <?php } ?>											 		 
											 	 
											</select>
											 	<label for="company_charge_info" class="floating__label tall nobold padl10" data-content="Charge(%)">
											<span class="hidden--visually">
											 Tax</span></label>
											</div>
										 	</div>
										</div>
										
										 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have Introduction" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedProfessionalMarketplaceDetail['charge_on_buyers']==1) echo 'checked'; ?>" onclick="updateDayopen(2);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div class="<?php if($selectedProfessionalMarketplaceDetail['charge_on_buyers']==0) echo 'hidden'; ?>" id="day_2">
										
										<div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If user need licences" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($selectedProfessionalMarketplaceDetail['gold_licences_required']==1) echo 'checked'; ?> " onclick="updateLicence(2);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
										<input type="hidden" id="licence2" name="licence2" value='<?php echo $selectedProfessionalMarketplaceDetail['gold_licences_required']; ?>' />
										
										
										<div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="is_recurring_payment2" id="is_recurring_payment2" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "   fdprocessedid="lyd8d"> 
											  
											 
											 <option value="1" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['gold_account_payment_term']==1) echo 'selected'; ?>>One time</option>  									 		 
											 <option value="2" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['gold_account_subscription_fee']==2) echo 'selected'; ?>>Every month</option>	 
											</select>
											 	<label for="is_recurring_payment2" class="floating__label tall nobold padl10" data-content="Payment terms">
											<span class="hidden--visually">
											 Tax</span></label>
											</div>
										 	</div>
											
											
											<div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<input type="number" name="subscription_fee2" id="subscription_fee2" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select  " value="<?php echo $selectedProfessionalMarketplaceDetail['gold_account_subscription_fee']; ?>"  fdprocessedid="lyd8d" /> 
											 
											 	<label for="subscription_fee2" class="floating__label tall nobold padl10" data-content="Subscription fee">
											<span class="hidden--visually">
											 Tax</span></label>
											</div>
										 	</div>
										 <div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="buyer_charge_info" id="buyer_charge_info" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "   fdprocessedid="lyd8d"> 
											  
											<option value="0" class="lgtgrey2_bg">Select</option>
											  <?php for($i=1;$i<=20;$i++) { ?>
												<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['buyer_charge_info']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
												 
											  <?php } ?>	 
																							 		 
											 	 
											</select>
											 	<label for="buyer_charge_info" class="floating__label tall nobold padl10" data-content="Charge(%)">
											<span class="hidden--visually">
											 Tax</span></label>
											</div>
										 	</div>
										</div>
										
										 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have premium" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($selectedProfessionalMarketplaceDetail['charge_on_partners']==1) echo 'checked'; ?>" onclick="updateDayopen(3);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div class="<?php if($selectedProfessionalMarketplaceDetail['charge_on_partners']==0) echo 'hidden'; ?>" id="day_3">
										
										<div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If user need licences" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($selectedProfessionalMarketplaceDetail['premium_licences_required']==1) echo 'checked'; ?> " onclick="updateLicence(1);">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
										<input type="hidden" id="licence3" name="licence3" value='<?php echo $selectedProfessionalMarketplaceDetail['premium_licences_required']; ?>' />
										
										
										<div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="is_recurring_payment3" id="is_recurring_payment3" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "   fdprocessedid="lyd8d"> 
											  
											 
											<option value="1" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['premium_account_payment_term']==1) echo 'selected'; ?>>One time</option>  									 		 
											 <option value="2" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['premium_account_payment_term']==2) echo 'selected'; ?>>Every month</option>	  
											</select>
											 	<label for="is_recurring_payment3" class="floating__label tall nobold padl10" data-content="Payment terms">
											<span class="hidden--visually">
											 Tax</span></label>
											</div>
										 	</div>
											
											
											<div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<input type="number" name="subscription_fee3" id="subscription_fee3" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select  " value="<?php echo $selectedProfessionalMarketplaceDetail['premium_account_subscription_fee']; ?>"   fdprocessedid="lyd8d" /> 
											 
											 	<label for="subscription_fee3" class="floating__label tall nobold padl10" data-content="Subscription fee">
											<span class="hidden--visually">
											 Tax</span></label>
											</div>
										 	</div>
										 <div class="on_clmn mart20 ">
											<div class="pos_rel">
												 
												<select name="partner_charge_info" id="partner_charge_info" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select dropdown-bg" style="appearance: none "   fdprocessedid="lyd8d"> 
											  
											<option value="0" class="lgtgrey2_bg">Select</option>
											  <?php for($i=1;$i<=20;$i++) { ?>
												<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($selectedProfessionalMarketplaceDetail['partner_charge_info']==$i) echo 'selected'; ?>><?php echo $i; ?></option>
												 
											  <?php } ?>	 
																							 		 
											 	 
											</select>
											 	<label for="partner_charge_info" class="floating__label tall nobold padl10" data-content="Charge(%)">
											<span class="hidden--visually">
											 Tax</span></label>
											</div>
										 	</div>
										</div>
										
										
										
										
										  </div>
											 <div class="clear"></div>
									  	</div>
									
									
										
										 
					 </form>
					  <div id="errorMsg1" class="fsz20 red_txt padtb20 tall"></div>
					   <div class="clear"></div>
					 <div class="padt20 xxs-talc talc padb50">
								
								<a href="javascript:void(0);" onclick="submitform();"><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #000000; color: #ffffff;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Update Marketplace</font></font></button></a>
								
							</div>
									</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
			
		</div>
		 
		
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="edit_department">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Verifiera en motpart…</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Be din motpart, privatperson eller företag att legitimera sig innan ett möte eller affär. Välj ur du vill skicka din förfrågan, sms, email eller med Qloud ID kod. </span>
				</div>
				
				
			</div>
			
			
			
			
			<div class="on_clmn padb10">
				
				<div class="pos_rel ">
					
					<input type="text" id="d_name1" name="d_name1" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="avdelning ">
				</div>
			</div>
			
			
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="editDepartment();">
				<input type="hidden" id="did" name="did" />
			</div>
			
			
		</div>
	</div>
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	 
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
	
	 
		function updatePopup(id,id1)
		{
			$("#did").val(id);
			$("#d_name1").val(id1);
			
		}
		// Charts
		google.charts.load('current', { 'packages': ['corechart'] });
		
		
		// Line Chart
		google.charts.setOnLoadCallback(drawLineChartInhouse);
		function drawLineChartInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartStaffing);
		function drawLineChartStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartRecruiting);
		function drawLineChartRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
		function drawLineChartBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// Donut Chart
		// - yearly
		google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
		function drawDonutChartYearlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
		function drawDonutChartYearlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
		function drawDonutChartYearlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
		function drawDonutChartYearlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - monthly
		google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
		function drawDonutChartMonthlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
		function drawDonutChartMonthlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
		function drawDonutChartMonthlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
		function drawDonutChartMonthlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - daily
		google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
		function drawDonutChartDailyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
		function drawDonutChartDailyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
		function drawDonutChartDailyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
		function drawDonutChartDailyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		tinyMCE.init({
			selector: '.texteditor',
			plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
			toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
			//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
			//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
			menubar: false,
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
		});
	</script>
</body>

</html>