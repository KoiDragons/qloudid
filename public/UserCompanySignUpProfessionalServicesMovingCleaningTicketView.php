<!doctype html>


<html>
	
	<head>
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/translateCombine.js"></script>
	   <script>
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
		
	
	   function updateFurnitureType(id)
	   {
		   $("#furniture_info_detail").val(id);
	   }
	   
	   function updatePriceType(id)
	   {
		   $("#price_info").val(id);
	   }
	   
									
	   function updatePropertyType(id)
	   {
		   $("#property_type_detail").val(id);
	   }
	   function updateMaterialType(id)
	   {
		   $("#material_info_detail").val(id);
	   }
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
	  function submitform()
		{
			 
			$("#errorMsg1").html('');
			if($("#start_date").val()==null || $("#start_date").val()=="")
			{
				
				$("#errorMsg1").html('Please select start date');
				return false;
			}
			if($("#end_date").val()==null || $("#end_date").val()=="")
			{
				
				$("#errorMsg1").html('Please select end date');
				return false;
			}
			
			
					var send_data={};
					send_data.start_date=$("#start_date").val();
					send_data.end_date=$("#end_date").val();
					$.ajax({
						type:"POST",
						url:"../../../../../verifyDates",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
							if(data1==0)
							{
								
								$("#errorMsg1").html('End date cant be before start date');
								return false;
							}
						}
					});
			
			if($("#property_type_detail").val()=="" || $("#property_type_detail").val()==0)
			{
				
				$("#errorMsg1").html('Please select property type');
				return false;
			}
			
			if($("#floor_area").val()==null || $("#floor_area").val()=="")
			{
				
				$("#errorMsg1").html('Please enter floor area');
				return false;
			}
			
			if($("#floor_area").val()==0)
			{
				
				$("#errorMsg1").html('Floor area cant be 0');
				return false;
			}
			
			if(isNaN($("#floor_area").val()))
			{
				
				$("#errorMsg1").html('Floor area must be a numeric value');
				return false;
			}
			
			if($("#total_rooms").val()==null || $("#total_rooms").val()=="")
			{
				
				$("#errorMsg1").html('Please enter total rooms');
				return false;
			}
			
			if($("#total_rooms").val()==0)
			{
				
				$("#errorMsg1").html('Rooms cant be 0');
				return false;
			}
			
			if(isNaN($("#total_rooms").val()))
			{
				
				$("#errorMsg1").html('Room count must be a numeric value');
				return false;
			}
			
			
			if($("#total_bathrooms").val()==null || $("#total_bathrooms").val()=="")
			{
				
				$("#errorMsg1").html('Please enter total bathrooms');
				return false;
			}
			
			if($("#total_bathrooms").val()==0)
			{
				
				$("#errorMsg1").html('Bathrooms cant be 0');
				return false;
			}
			
			if(isNaN($("#total_bathrooms").val()))
			{
				
				$("#errorMsg1").html('Bathroom count must be a numeric value');
				return false;
			}
			
			
		/*	 if($("#first_name").val()=="" || $("#first_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter first name ');
				return false;
			}
			 if($("#last_name").val()=="" || $("#last_name").val()=="")
			{
				
				$("#errorMsg1").html('Please enter last name');
				return false;
			}
			 if($("#email").val()=="" || $("#email").val()=="")
			{
				
				$("#errorMsg1").html('Please enter email address ');
				return false;
			}
			 if($("#country").val()==0 || $("#country").val()=="")
			{
				
				$("#errorMsg1").html('Please select country');
				return false;
			}
			if($("#p_number").val()==null || $("#p_number").val()=="")
			{
				
				$("#errorMsg1").html('Please enter phone number');
				return false;
			}
			
			if($("#p_number").val()==0)
			{
				
				$("#errorMsg1").html('phone number cant be 0');
				return false;
			}
			
			if(isNaN($("#p_number").val()))
			{
				
				$("#errorMsg1").html('Phone number must be a numeric value');
				return false;
			}*/
			 
			 document.getElementById('save_indexing').submit();
		}      
		
		
	  </script>
	  
	
	</head>
	
	<body class="white_bg  ">
		
		
			<!-- HEADER -->
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs  hidden">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10" style="background-color: #c12219 !important;">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../../../../../professionalServicesList/<?php echo $data['domain_id']; ?>/<?php echo $data['area_id']; ?>/<?php echo $data['whom_id']; ?>/<?php echo $data['todo_id']; ?>/<?php echo $selectedProfessionalCategoryDetailInfo['md_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
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
		 	<div class="column_m header hei_60p bs_bb lgtgrey2_bg visible-xs  hidden">
				<div class="wi_100 hei_60p xs-pos_fix padtb5 padrl0 lgtgrey2_bg">
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../../../professionalCategoryList/<?php echo $data['domain_id']; ?>/<?php echo $data['area_id']; ?>/<?php echo $data['whom_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
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
		 
		 <div class="column_m header   bs_bb trans_bg " style="height:93px;   padding: 0px 0 22px !important;">
         <div class="header__center center padding2080 xs-padding032 " style="display: flex;
    align-items: center; width: 100%;
    max-width: 1280px;
    margin: 0 auto;
  "><a class="header__logo xs-fsz20 " href="../../../../../../professionalServicesList/<?php echo $data['domain_id']; ?>/<?php echo $data['area_id']; ?>/<?php echo $data['whom_id']; ?>/<?php echo $data['todo_id']; ?>" style="
    border: 2px solid #e11936; 
    padding: 10px;
    color: #ffffff;
	 background-color: #e11936 ;
    border-radius: 5px;
    
    font-size: 20PX;
    line-height:25px !important
    ">Back</a>


		 
			
			
			

</div>
      </div>
	<div class="clear"></div>
		
		<div class="column_m pos_rel" id="bodyText">
			
			 
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 xs-mart65 mart100   "    >
				<div class="wrap maxwi_100 padrl0 xs-padrl25 xsi-padrl134">
					
					 
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="changedText marb0  xxs-tall talc xs-fsz70 bold   fsz80 lgn_hight_90 xs-lgn_hight_75 uppercase padb0 black_txt trn  "  style="font-family: 'DM Sans', sans-serif;  -webkit-font-smoothing: antialiased; -webkit-text-size-adjust: 100%; --vh: 7.8px; letter-spacing:-0.02em;">Moving</h1>
									</div>
									<div class="mart10 marb5 xxs-tall talc  xs-padb0 padb35  "> <a href="#" class="black_txt fsz25  xxs-talc talc edit-text jain_drop_company trn lgn_hight_30 changedText" style="margin-block-start: 0.83em;    margin-block-end: 0.83em;    margin-inline-start: 0px;    margin-inline-end: 0px; font-family: 'DM Sans', sans-serif; font-weight: 100;">Please inform us about your requirement below</a></div>
					 
					 <div class="clear"></div>
									
						 
									  
									  
									  <form action="../../../../../../addProfessionalServiceRequest/<?php echo $data['catg_id']; ?>/<?php echo $data['whom_id']; ?>/<?php echo $data['subcatg_id']; ?>/<?php echo $data['domain_id']; ?>/<?php echo $data['area_id']; ?>/<?php echo $data['todo_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1" class="checkout__item js-tabs-item">
									 	<div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile1" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active" style="background-color: #c12219 !important;"><span class="changedText">Your needs</span>
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								
								<div id="profile1" class=" " style="display:block;">	
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="changedText edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Dates</span>
													 <span class="changedText edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Between which dates would you like to have the cleaning done?</span> 
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
												
												<input type="date" name="start_date" id="start_date" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" min="<?php echo date('Y-m-d'); ?>" fdprocessedid="x4hy36"> 
												
											 <label for="first_name" class="floating__label tall nobold padl10" data-content="From">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="thr_clmn  wi_50 padl5">
											 
										  
											 
											<div class="pos_rel">
												
												<input type="date" name="end_date" id="end_date" placeholder="Last name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="p7xzrb" min="<?php echo date('Y-m-d'); ?>" > 
												 <label for="last_name" class="floating__label tall nobold padl10" data-content="To">
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
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
													
													<span class="changedText edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Building type</span>
													 <span class="changedText edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">What type of building does it apply to?</span> 
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
											<label for="oven" class="css-14q70q1 changedText"><?php echo $value['property_type']; ?></label></div>
															
															</div>
															
												<?php } ?>	
										<input type="hidden" id="property_type_detail" name="property_type_detail" />
														
										</div>
										
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Area</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Enter the area in square meters.</span> 
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
												
												<input type="number" name="floor_area" id="floor_area" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"> 
												
											 <label for="floor_area" class="floating__label tall nobold padl10" data-content="Floor area">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Rooms</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How many rooms & kitchens does it apply to?</span> 
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
												
												<input type="number" name="total_rooms" id="total_rooms" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"> 
												
											 <label for="total_rooms" class="floating__label tall nobold padl10" data-content="Total rooms">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Bathrooms</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">How many bathrooms/toilets does this apply to?</span> 
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
												
												<input type="number" name="total_bathrooms" id="total_bathrooms" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"> 
												
											 <label for="total_bathrooms" class="floating__label tall nobold padl10" data-content="Total bathrooms">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
									 
									 <div class="clear"></div>
									 
								 	<div id="inclusionInfo" class="padt10">
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Inclusions</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">What do you want to be included in your cleaning task?</span> 
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
												foreach($cleaningExtraInclusion as $category => $value) 
												{
													
													
												?> 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="<?php echo $value['id']; ?>">
														<a href="javascript:void(0);"   onclick="updateInclutionType(<?php echo $value['id']; ?>)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8" ></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText"><?php echo $value['extra_inclusion']; ?></label></div>
															
															</div>
												<?php } ?>		
									 				
												<input type="hidden" id="inclusion_type_detail" name="inclusion_type_detail" />				
										</div>
										
									<div class="clear"></div>
									  <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Materials</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Will cleaning materials be available?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									  <div id="materialInfo" class="padt10">
									<div class="clear"></div>
									<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updateMaterialType(1)"><input data-testid="test-checkbox-Walls" name="material_info" type="radio" class="css-radio-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Yes</label></div>
															
															</div>
															
											<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updateMaterialType(0)"><input data-testid="test-checkbox-Walls" name="material_info" type="radio" class="css-radio-1lgzhz8" checked></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">No</label></div>
															
															</div>	

										<input type="hidden" id="material_info_detail" name="material_info_detail" value="0" />	
										</div>
											
										<div class="clear"></div>
									  <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Furniture</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Will there be furniture left in the home at the time of cleaning?</span> 
													 </div>
													 
													<div class="clear"></div>
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div class="clear"></div>
										 
										
											 
									</div>
									 
									  <div id="furnitureInfo" class="padt10">
									<div class="clear"></div>
									<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updateFurnitureType(1)"><input data-testid="test-checkbox-Walls" name="furniture_info" type="radio" class="css-radio-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Yes</label></div>
															
															</div>
															
											<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updateFurnitureType(0)"><input data-testid="test-checkbox-Walls" name="furniture_info" type="radio" class="css-radio-1lgzhz8" checked></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">No</label></div>
															
															</div>	
										<input type="hidden" id="furniture_info_detail" name="furniture_info_detail" value="0" />
															
										</div>
										
									 <div class="clear"></div>
									 
								 	<div id="PriceInfo" class="padt10">
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Price</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Do you want a fixed price or a price per hour?</span> 
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
									<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updatePriceType(1)"><input data-testid="test-checkbox-Walls" name="price_info" type="radio" class="css-radio-1lgzhz8" checked></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Fixed price</label></div>
															
															</div>
															
											<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updatePriceType(2)"><input data-testid="test-checkbox-Walls" name="price_info" type="radio" class="css-radio-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Price per hour</label></div>
															
															</div>	 
									 			<input type="hidden" id="price_info" name="price_info" value="1" />	
															
										</div>
									</div>
									
									
										
										<div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile2" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active" style="background-color: #c12219 !important;"><span class="changedText">Other information</span>
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								
								<div id="profile2" class=" " style="display:none;">	
									
											
											<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Description</span> 
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
											 
											<div class="pos_rel"><textarea class="texteditor "  id="product_information" name="product_information"> 
										 </textarea></div>
										</div>
											
											
												 
											
											<div class="on_clmn padt10">
											 
										  
											 
											<div class="pos_rel">
												
												<select id="carried_for" name="carried_for" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
														
														<option value="1" class="changedText">Private person</option>
														<option value="2" class="changedText">Company</option>
														<option value="3" class="changedText">Community</option>
														<option value="4" class="changedText">Goverment</option>
														</select>
												 <label for="carried_for" class="floating__label tall nobold padl10" data-content="The assignment must be carried out for">
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
											</div>
											</div>
											
										 	
											<div class="on_clmn padt10">
											 
										  
										
											<div class="pos_rel">
												
												<select id="begin_info" name="begin_info" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
														
														<option value="1" class="changedText">As soon as possible</option>
														<option value="3" class="changedText">Within 1 month</option>
														<option value="4" class="changedText">Within 3 months</option>
														<option value="5" class="changedText">Within 6 months</option>
														<option value="6" class="changedText">Within 12 months</option>
														<option value="7" class="changedText">Timing less important</option>
														 
														</select>
												 <label for="begin_info" class="floating__label tall nobold padl10" data-content="When will the assignment begin">
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
											</div>
											</div>		 
											 
											
											 </div>
				
										<div class="clear"></div>
							<!--			<div class="marrl0 padb15 brdb fsz16 white_bg tall padt50">
								<a href="#profile" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active" style="background-color: #c12219 !important;"><span class="changedText">Contact details</span> 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								
								<div id="profile" class=" " style="display:none;">	
									
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="first_name" id="first_name" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="x4hy36"> 
												
											 <label for="first_name" class="floating__label tall nobold padl10" data-content="First name">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">
											 
										  
											 
											<div class="pos_rel">
												
												<input type="text" name="last_name" id="last_name" placeholder="Last name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="p7xzrb"> 
												 <label for="last_name" class="floating__label tall nobold padl10" data-content="Last name">
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
											</div>
											</div>
											
											
											
												<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="email" id="email" placeholder="Email address" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="qc7t4r"> 
												 <label for="email" class="floating__label tall nobold padl10" data-content="Email address">
											<span class="hidden--visually">
											 Email address</span></label> 
												
											 
											</div>
											 
											</div>
											
											
												<div class="on_clmn padt10">
											 <div class="thr_clmn  wi_20 padr5"> 
										<div class="pos_rel">
										<select id="pcountry" name="pcountry" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="qh9hm">
														
																											
															<option value="38">+1</option>
																											
															<option value="143">+1</option>
																											
															<option value="224">+1</option>
																											
															<option value="230">+1</option>
																											
															<option value="182">+7</option>
																											
															<option value="64">+20</option>
																											
															<option value="237">+27</option>
																											
															<option value="86">+30</option>
																											
															<option value="159">+31</option>
																											
															<option value="19">+32</option>
																											
															<option value="73">+33</option>
																											
															<option value="67">+34</option>
																											
															<option value="98">+36</option>
																											
															<option value="236">+38</option>
																											
															<option value="107">+39</option>
																											
															<option value="181">+40</option>
																											
															<option value="40">+41</option>
																											
															<option value="16">+43</option>
																											
															<option value="77">+44</option>
																											
															<option value="60">+45</option>
																											
															<option value="201">+46</option>
																											
															<option value="35">+47</option>
																											
															<option value="160">+47</option>
																											
															<option value="190">+47</option>
																											
															<option value="172">+48</option>
																											
															<option value="57">+49</option>
																											
															<option value="168">+51</option>
																											
															<option value="136">+52</option>
																											
															<option value="52">+53</option>
																											
															<option value="9">+54</option>
																											
															<option value="31">+55</option>
																											
															<option value="41">+56</option>
																											
															<option value="48">+57</option>
																											
															<option value="228">+58</option>
																											
															<option value="150">+60</option>
																											
															<option value="15">+61</option>
																											
															<option value="39">+61</option>
																											
															<option value="53">+61</option>
																											
															<option value="99">+62</option>
																											
															<option value="169">+63</option>
																											
															<option value="163">+64</option>
																											
															<option value="167">+64</option>
																											
															<option value="187">+65</option>
																											
															<option value="208">+66</option>
																											
															<option value="111">+77</option>
																											
															<option value="110">+81</option>
																											
															<option value="117">+82</option>
																											
															<option value="231">+84</option>
																											
															<option value="42">+86</option>
																											
															<option value="216">+90</option>
																											
															<option value="100">+91</option>
																											
															<option value="165">+92</option>
																											
															<option value="2">+93</option>
																											
															<option value="125">+94</option>
																											
															<option value="141">+95</option>
																											
															<option value="103">+98</option>
																											
															<option value="66">+212</option>
																											
															<option value="131">+212</option>
																											
															<option value="62">+213</option>
																											
															<option value="215">+216</option>
																											
															<option value="122">+218</option>
																											
															<option value="83">+220</option>
																											
															<option value="186">+221</option>
																											
															<option value="145">+222</option>
																											
															<option value="139">+223</option>
																											
															<option value="81">+224</option>
																											
															<option value="43">+225</option>
																											
															<option value="21">+226</option>
																											
															<option value="154">+227</option>
																											
															<option value="207">+228</option>
																											
															<option value="20">+229</option>
																											
															<option value="148">+230</option>
																											
															<option value="121">+231</option>
																											
															<option value="192">+232</option>
																											
															<option value="79">+233</option>
																											
															<option value="156">+234</option>
																											
															<option value="206">+235</option>
																											
															<option value="37">+236</option>
																											
															<option value="44">+237</option>
																											
															<option value="50">+238</option>
																											
															<option value="197">+239</option>
																											
															<option value="85">+240</option>
																											
															<option value="76">+241</option>
																											
															<option value="46">+242</option>
																											
															<option value="45">+243</option>
																											
															<option value="3">+244</option>
																											
															<option value="84">+245</option>
																											
															<option value="101">+246</option>
																											
															<option value="222">+246</option>
																											
															<option value="203">+248</option>
																											
															<option value="185">+249</option>
																											
															<option value="183">+250</option>
																											
															<option value="69">+251</option>
																											
															<option value="195">+252</option>
																											
															<option value="58">+253</option>
																											
															<option value="112">+254</option>
																											
															<option value="219">+255</option>
																											
															<option value="220">+256</option>
																											
															<option value="18">+257</option>
																											
															<option value="144">+258</option>
																											
															<option value="238">+260</option>
																											
															<option value="134">+261</option>
																											
															<option value="151">+262</option>
																											
															<option value="180">+262</option>
																											
															<option value="239">+263</option>
																											
															<option value="152">+264</option>
																											
															<option value="149">+265</option>
																											
															<option value="126">+266</option>
																											
															<option value="36">+267</option>
																											
															<option value="202">+268</option>
																											
															<option value="49">+269</option>
																											
															<option value="189">+290</option>
																											
															<option value="65">+291</option>
																											
															<option value="1">+297</option>
																											
															<option value="74">+298</option>
																											
															<option value="88">+299</option>
																											
															<option value="54">+345</option>
																											
															<option value="80">+350</option>
																											
															<option value="175">+351</option>
																											
															<option value="128">+352</option>
																											
															<option value="102">+353</option>
																											
															<option value="105">+354</option>
																											
															<option value="5">+355</option>
																											
															<option value="140">+356</option>
																											
															<option value="70">+358</option>
																											
															<option value="23">+359</option>
																											
															<option value="127">+370</option>
																											
															<option value="129">+371</option>
																											
															<option value="68">+372</option>
																											
															<option value="133">+373</option>
																											
															<option value="10">+374</option>
																											
															<option value="27">+375</option>
																											
															<option value="6">+376</option>
																											
															<option value="132">+377</option>
																											
															<option value="194">+378</option>
																											
															<option value="226">+379</option>
																											
															<option value="221">+380</option>
																											
															<option value="96">+385</option>
																											
															<option value="200">+386</option>
																											
															<option value="26">+387</option>
																											
															<option value="138">+389</option>
																											
															<option value="56">+420</option>
																											
															<option value="199">+421</option>
																											
															<option value="124">+423</option>
																											
															<option value="72">+500</option>
																											
															<option value="188">+500</option>
																											
															<option value="28">+501</option>
																											
															<option value="89">+502</option>
																											
															<option value="193">+503</option>
																											
															<option value="95">+504</option>
																											
															<option value="157">+505</option>
																											
															<option value="51">+506</option>
																											
															<option value="166">+507</option>
																											
															<option value="196">+508</option>
																											
															<option value="97">+509</option>
																											
															<option value="55">+537</option>
																											
															<option value="82">+590</option>
																											
															<option value="30">+591</option>
																											
															<option value="63">+593</option>
																											
															<option value="90">+594</option>
																											
															<option value="92">+595</option>
																											
															<option value="176">+595</option>
																											
															<option value="147">+596</option>
																											
															<option value="198">+597</option>
																											
															<option value="223">+598</option>
																											
															<option value="7">+599</option>
																											
															<option value="212">+670</option>
																											
															<option value="12">+672</option>
																											
															<option value="94">+672</option>
																											
															<option value="155">+672</option>
																											
															<option value="33">+673</option>
																											
															<option value="162">+674</option>
																											
															<option value="171">+675</option>
																											
															<option value="213">+676</option>
																											
															<option value="191">+677</option>
																											
															<option value="232">+678</option>
																											
															<option value="71">+679</option>
																											
															<option value="170">+680</option>
																											
															<option value="233">+681</option>
																											
															<option value="47">+682</option>
																											
															<option value="158">+683</option>
																											
															<option value="234">+685</option>
																											
															<option value="115">+686</option>
																											
															<option value="153">+687</option>
																											
															<option value="217">+688</option>
																											
															<option value="178">+689</option>
																											
															<option value="210">+690</option>
																											
															<option value="75">+691</option>
																											
															<option value="137">+692</option>
																											
															<option value="174">+850</option>
																											
															<option value="93">+852</option>
																											
															<option value="130">+853</option>
																											
															<option value="114">+855</option>
																											
															<option value="119">+856</option>
																											
															<option value="22">+880</option>
																											
															<option value="218">+886</option>
																											
															<option value="135">+960</option>
																											
															<option value="120">+961</option>
																											
															<option value="109">+962</option>
																											
															<option value="204">+963</option>
																											
															<option value="104">+964</option>
																											
															<option value="118">+965</option>
																											
															<option value="184">+966</option>
																											
															<option value="235">+967</option>
																											
															<option value="164">+968</option>
																											
															<option value="177">+970</option>
																											
															<option value="8">+971</option>
																											
															<option value="106">+972</option>
																											
															<option value="24">+973</option>
																											
															<option value="179">+974</option>
																											
															<option value="34">+975</option>
																											
															<option value="142">+976</option>
																											
															<option value="161">+977</option>
																											
															<option value="209">+992</option>
																											
															<option value="211">+993</option>
																											
															<option value="17">+994</option>
																											
															<option value="78">+995</option>
																											
															<option value="113">+996</option>
																											
															<option value="225">+998</option>
																											
															<option value="25">+1242</option>
																											
															<option value="32">+1246</option>
																											
															<option value="4">+1264</option>
																											
															<option value="14">+1268</option>
																											
															<option value="229">+1284</option>
																											
															<option value="29">+1441</option>
																											
															<option value="87">+1473</option>
																											
															<option value="205">+1649</option>
																											
															<option value="146">+1664</option>
																											
															<option value="91">+1671</option>
																											
															<option value="11">+1684</option>
																											
															<option value="123">+1758</option>
																											
															<option value="59">+1767</option>
																											
															<option value="227">+1784</option>
																											
															<option value="173">+1787</option>
																											
															<option value="61">+1809</option>
																											
															<option value="214">+1868</option>
																											
															<option value="116">+1869</option>
																											
															<option value="108">+1876</option>
																											
															<option value="13">+3166</option>
																																												
															   
																													
													</select>
													 
												 <label for="pcountry" class="floating__label tall nobold padl10" data-content="Code">
											<span class="hidden--visually">
											  Code</span></label>
												</div>
												</div>
												<div class="thr_clmn  wi_80  padl5"> 
											<div class="pos_rel">
												
												<input type="text" name="p_number" id="p_number" placeholder="Phone number" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="pb0p6q"> 
												 <label for="p_number" class="floating__label tall nobold padl10" data-content="Mobile">
											<span class="hidden--visually">
											 Mobile</span></label> 
												
											 </div>
											</div>
											 
											</div>
											
											 
											<div class="on_clmn padt10">
											 
										  
											 
											<div class="pos_rel">
												
												<select id="conatct_preffered_on" name="conatct_preffered_on" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select" fdprocessedid="u205l">
														
														<option value="1" class="changedText">Anytime</option>
														<option value="2" class="changedText">Immediately</option>
														<option value="3" class="changedText">Morning</option>
														<option value="4" class="changedText">Afternoon</option>
														<option value="5" class="changedText">Evening</option>

														</select>
												 <label for="conatct_preffered_on" class="floating__label tall nobold padl10" data-content="Conatct preffered on">
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
											</div>
											</div>
											 
											
											 </div>
				-->
					 </form>
					  <div id="errorMsg1" class="fsz20 red_txt padtb20 tall"></div>
					   <div class="clear"></div>
					 <div class="padt20 xxs-talc talc padb50">
								
								<a href="javascript:void(0);" onclick="submitform();"><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #000000;color: #ffffff;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Send your application</font></font></button></a>
								
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
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