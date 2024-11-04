<head>
 
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<title>Qloud ID</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		 <script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		
	<script>
function updateStartFeeApplicable()
{
	serviceFeeAppalicable=1;
}
function updateInspectionFeeApplicable()
{
	inspectionFeeAppalicable=1;
}	

function updateBedroomCleaning(id)
{
	 
	updateBedroomCleaningAvailable=1;
	bedroomId=id;
}	
		
		function submitform()
		{
			$('#error_msg_form').html('');
			var submitFlag=1;
			
			if($("#start_fee_applicable").val()==1)
			{
				if($("#start_fee").val()==null || $("#start_fee").val()=="")
			{
				$("#error_msg_form").html('Please enter a valid start fee');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#start_fee").val()))
			{
				$("#error_msg_form").html('Please enter a valid start fee');
                 submitFlag = 0;
                 return false;
			}
			}
			
		 if($("#inspection_fee_applicable").val()==1)
			{
				if($("#inspection_fee").val()==null || $("#inspection_fee").val()=="")
			{
				$("#error_msg_form").html('Please enter a valid inspection fee');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#inspection_fee").val()))
			{
				$("#error_msg_form").html('Please enter a valid inspection fee');
                 submitFlag = 0;
                 return false;
			}
			}
			bedroom_apartment_cleaning_available0
			if(($("#bedroom_apartment_cleaning_available0").val()+$("#bedroom_apartment_cleaning_available1").val()+$("#bedroom_apartment_cleaning_available2").val()+$("#bedroom_apartment_cleaning_available3").val()+$("#bedroom_apartment_cleaning_available4").val()+$("#bedroom_apartment_cleaning_available5").val())==0)
			{
				$("#error_msg_form").html('Please select atleast one cleaning facility available');
                 submitFlag = 0;
                 return false;
			}
			if($("#bedroom_apartment_cleaning_available0").val()==1)
			{
			if($("#bedroom_apartment_cleaning_fee0").val()==null || $("#bedroom_apartment_cleaning_fee0").val()=="" || $("#bedroom_apartment_cleaning_fee0").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for studio apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#bedroom_apartment_cleaning_fee0").val()))
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for studio apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#bedroom_apartment_cleaning_max_area0").val()==null || $("#bedroom_apartment_cleaning_max_area0").val()=="" || $("#bedroom_apartment_cleaning_max_area0").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid area value for studio apartment');
                 submitFlag = 0;
                 return false;
			}
			}
			
			
			if($("#bedroom_apartment_cleaning_available1").val()==1)
			{
			if($("#bedroom_apartment_cleaning_fee1").val()==null || $("#bedroom_apartment_cleaning_fee1").val()=="" || $("#bedroom_apartment_cleaning_fee1").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for one bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#bedroom_apartment_cleaning_fee1").val()))
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for one bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#bedroom_apartment_cleaning_max_area1").val()==null || $("#bedroom_apartment_cleaning_max_area1").val()=="" || $("#bedroom_apartment_cleaning_max_area1").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid area value for one bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			}	
			
			if($("#bedroom_apartment_cleaning_available2").val()==1)
			{
			if($("#bedroom_apartment_cleaning_fee2").val()==null || $("#bedroom_apartment_cleaning_fee2").val()=="" || $("#bedroom_apartment_cleaning_fee2").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for two bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#bedroom_apartment_cleaning_fee2").val()))
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for two bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#bedroom_apartment_cleaning_max_area2").val()==null || $("#bedroom_apartment_cleaning_max_area2").val()=="" || $("#bedroom_apartment_cleaning_max_area2").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid area value for two bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			}
			
			
			if($("#bedroom_apartment_cleaning_available3").val()==1)
			{
			if($("#bedroom_apartment_cleaning_fee3").val()==null || $("#bedroom_apartment_cleaning_fee3").val()=="" || $("#bedroom_apartment_cleaning_fee3").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for three bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#bedroom_apartment_cleaning_fee3").val()))
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for three bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#bedroom_apartment_cleaning_max_area3").val()==null || $("#bedroom_apartment_cleaning_max_area3").val()=="" || $("#bedroom_apartment_cleaning_max_area3").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid area value for three bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			}
			
			if($("#bedroom_apartment_cleaning_available4").val()==1)
			{
			if($("#bedroom_apartment_cleaning_fee4").val()==null || $("#bedroom_apartment_cleaning_fee4").val()=="" || $("#bedroom_apartment_cleaning_fee4").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for four bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#bedroom_apartment_cleaning_fee4").val()))
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for four bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#bedroom_apartment_cleaning_max_area4").val()==null || $("#bedroom_apartment_cleaning_max_area4").val()=="" || $("#bedroom_apartment_cleaning_max_area4").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid area value for four bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			}
			
			if($("#bedroom_apartment_cleaning_available5").val()==1)
			{
			if($("#bedroom_apartment_cleaning_fee5").val()==null || $("#bedroom_apartment_cleaning_fee5").val()=="" || $("#bedroom_apartment_cleaning_fee5").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for five bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#bedroom_apartment_cleaning_fee5").val()))
			{
				$("#error_msg_form").html('Please enter a valid cleaning fee for five bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#bedroom_apartment_cleaning_max_area5").val()==null || $("#bedroom_apartment_cleaning_max_area5").val()=="" || $("#bedroom_apartment_cleaning_max_area5").val()==0)
			{
				$("#error_msg_form").html('Please enter a valid area value for five bedroom apartment');
                 submitFlag = 0;
                 return false;
			}
			}
			 document.getElementById('save_indexing').submit();	 
			}
		
		 
	 
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../../serviceCategory/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			<div class="fright marr0  ">
				<div class="top_menu fright  padt15 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz16  mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="../../../serviceCategoryTodo/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>/<?php echo $data['catg_availability_id']; ?>" class="lgn_hight_s1 fsz30"><span class="fas fa-edit" aria-hidden="true"></span></a>
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
					 
						 <a href="../../../serviceCategory/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
						 
                     </li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
				<div class="fright marr0  ">
				<div class="top_menu fright  padt15 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz16  mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="../../../serviceCategoryTodo/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>/<?php echo $data['catg_availability_id']; ?>" class="lgn_hight_s1 fsz30"><span class="fas fa-edit" aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
			</div>	 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m   talc lgn_hight_22 fsz16 mart40" >
				<div class="wrap maxwi_100 padrl15 xs-padrl25">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10  xs-pad0">
					 
									<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 xxs-fsz45 lgn_hight_55 xxs-lgn_hight_45 padb0 black_txt trn ffamily_avenir"><?php echo substr($serviceTypeInfo['service_type_name'],0,10); ?></h1>
									</div>
									
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please add/update your service pricing here.</a></div>
									
								 
								<div class="tab-header mart10 padb10 xs-tall brdb tabbluebrdcolor nobrdt nobrdl nobrdr tall hidden">
                                            <a href="#" class="dinlblck mar5 padrl15   tabblueBGcolor brdrad5  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Pricing</a>
											 
											   
                                             
                                        </div>	
									
							<form action="../../../updateCategoryPricing/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>/<?php echo $data['catg_availability_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0   padtrl0 white_bg">
								
										
								<div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If start fee is applicable?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($categoryTypePricingInfo['start_fee_applicable']==1) echo 'checked'; else echo ''; ?>" onclick="updateStartFeeApplicable();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="start_fee_applicable" name="start_fee_applicable" value="<?php echo $categoryTypePricingInfo['start_fee_applicable']; ?>" />

										</div>			
								<div class="on_clmn padt10 <?php if($categoryTypePricingInfo['start_fee_applicable']==0) echo 'hidden'; else echo ''; ?>" id="startFeeInfo">
											 
											<div class="pos_rel">
												
												<input type="text" name="start_fee" id="start_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['start_fee']; ?>"> 
												
											 <label for="start_fee" class="floating__label tall nobold padl10" data-content="Start fee" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
												 
								 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If inspection fee is applicable?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($categoryTypePricingInfo['inspection_fee_applicable']==1) echo 'checked'; else echo ''; ?>" onclick="updateInspectionFeeApplicable();">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="inspection_fee_applicable" name="inspection_fee_applicable" value="<?php echo $categoryTypePricingInfo['inspection_fee_applicable']; ?>" />

										</div>			
								<div class="on_clmn padt10 <?php if($categoryTypePricingInfo['inspection_fee_applicable']==0) echo 'hidden'; else echo ''; ?>" id="inspectionFeeInfo">
											 
											<div class="pos_rel">
												
												<input type="text" name="inspection_fee" id="inspection_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['inspection_fee']; ?>"> 
												
											 <label for="inspection_fee" class="floating__label tall nobold padl10" data-content="Inspection fee" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
												 
								
									
									 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If studio apartment cleaning available?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($categoryTypePricingInfo['studio_apartment_cleaning_available']==1) echo 'checked'; else echo ''; ?>" onclick="updateBedroomCleaning(0);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="bedroom_apartment_cleaning_available0" name="bedroom_apartment_cleaning_available0" value="<?php echo $categoryTypePricingInfo['studio_apartment_cleaning_available']; ?>" />

										</div>			
								<div class="<?php if($categoryTypePricingInfo['studio_apartment_cleaning_available']==0) echo 'hidden'; else echo ''; ?>" id="bedroomApartmentCleaningAvailable0">
								<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_fee0" id="bedroom_apartment_cleaning_fee0" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['studio_apartment_cleaning_fee']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_fee0" class="floating__label tall nobold padl10" data-content="Studio apartment cleaning fee" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_max_area0" id="bedroom_apartment_cleaning_max_area0" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['studio_apartment_cleaning_max_area']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_max_area0" class="floating__label tall nobold padl10" data-content="Studio apartment max area allowed(m2)" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_extra_per_sqm0" id="bedroom_apartment_cleaning_extra_per_sqm0" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['studio_apartment_cleaning_extra_per_sqm']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_extra_per_sqm0" class="floating__label tall nobold padl10" data-content="Extra fee/m2" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
									
								 </div>
										
										
										 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If one bedroom apartment cleaning available?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available1']==1) echo 'checked'; else echo ''; ?>" onclick="updateBedroomCleaning(1);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="bedroom_apartment_cleaning_available1" name="bedroom_apartment_cleaning_available1" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_available1']; ?>" />

										</div>			
								<div class="<?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available1']==0) echo 'hidden'; else echo ''; ?>" id="bedroomApartmentCleaningAvailable1">
								<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_fee1" id="bedroom_apartment_cleaning_fee1" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_fee1']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_fee1" class="floating__label tall nobold padl10" data-content="One bedroom apartment cleaning fee" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_max_area1" id="bedroom_apartment_cleaning_max_area1" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_max_area1']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_max_area1" class="floating__label tall nobold padl10" data-content="One bedroom apartment max area allowed(m2)" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_extra_per_sqm1" id="bedroom_apartment_cleaning_extra_per_sqm1" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_extra_per_sqm1']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_extra_per_sqm1" class="floating__label tall nobold padl10" data-content="Extra fee/m2" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
									
								 </div>
										
									 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If Two bedroom apartment cleaning available?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available2']==1) echo 'checked'; else echo ''; ?>" onclick="updateBedroomCleaning(2);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="bedroom_apartment_cleaning_available2" name="bedroom_apartment_cleaning_available2" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_available2']; ?>" />

										</div>			
								<div class="<?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available2']==0) echo 'hidden'; else echo ''; ?>" id="bedroomApartmentCleaningAvailable2">
								<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_fee2" id="bedroom_apartment_cleaning_fee2" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_fee2']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_fee2" class="floating__label tall nobold padl10" data-content="Two bedroom apartment cleaning fee" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_max_area2" id="bedroom_apartment_cleaning_max_area2" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_max_area2']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_max_area2" class="floating__label tall nobold padl10" data-content="Two bedroom apartment max area allowed(m2)" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_extra_per_sqm2" id="bedroom_apartment_cleaning_extra_per_sqm2" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_extra_per_sqm2']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_extra_per_sqm2" class="floating__label tall nobold padl10" data-content="Extra fee/m2" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
									
								 </div>
										
										 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If three bedroom apartment cleaning available?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available3']==1) echo 'checked'; else echo ''; ?>" onclick="updateBedroomCleaning(3);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="bedroom_apartment_cleaning_available3" name="bedroom_apartment_cleaning_available3" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_available3']; ?>" />

										</div>			
								<div class="<?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available3']==0) echo 'hidden'; else echo ''; ?>" id="bedroomApartmentCleaningAvailable3">
								<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_fee3" id="bedroom_apartment_cleaning_fee3" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_fee3']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_fee3" class="floating__label tall nobold padl10" data-content="three bedroom apartment cleaning fee" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_max_area3" id="bedroom_apartment_cleaning_max_area3" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_max_area3']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_max_area3" class="floating__label tall nobold padl10" data-content="three bedroom apartment max area allowed(m2)" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_extra_per_sqm3" id="bedroom_apartment_cleaning_extra_per_sqm3" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_extra_per_sqm3']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_extra_per_sqm3" class="floating__label tall nobold padl10" data-content="Extra fee/m2" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
									
								 </div>
										
											
									 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If four bedroom apartment cleaning available?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available4']==1) echo 'checked'; else echo ''; ?>" onclick="updateBedroomCleaning(4);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="bedroom_apartment_cleaning_available4" name="bedroom_apartment_cleaning_available4" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_available4']; ?>" />

										</div>			
								<div class="<?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available4']==0) echo 'hidden'; else echo ''; ?>" id="bedroomApartmentCleaningAvailable4">
								<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_fee4" id="bedroom_apartment_cleaning_fee4" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_fee4']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_fee4" class="floating__label tall nobold padl10" data-content="four bedroom apartment cleaning fee" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_max_area4" id="bedroom_apartment_cleaning_max_area4" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_max_area4']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_max_area4" class="floating__label tall nobold padl10" data-content="four bedroom apartment max area allowed(m2)" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_extra_per_sqm4" id="bedroom_apartment_cleaning_extra_per_sqm4" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_extra_per_sqm4']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_extra_per_sqm4" class="floating__label tall nobold padl10" data-content="Extra fee/m2" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
									
								 </div>
										
										 <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If five bedroom apartment cleaning available?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available5']==1) echo 'checked'; else echo ''; ?>" onclick="updateBedroomCleaning(5);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="bedroom_apartment_cleaning_available5" name="bedroom_apartment_cleaning_available5" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_available5']; ?>" />

										</div>			
								<div class="<?php if($categoryTypePricingInfo['bedroom_apartment_cleaning_available5']==0) echo 'hidden'; else echo ''; ?>" id="bedroomApartmentCleaningAvailable5">
								<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_fee5" id="bedroom_apartment_cleaning_fee5" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_fee5']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_fee5" class="floating__label tall nobold padl10" data-content="five bedroom apartment cleaning fee" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_max_area5" id="bedroom_apartment_cleaning_max_area5" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_max_area5']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_max_area5" class="floating__label tall nobold padl10" data-content="five bedroom apartment max area allowed(m2)" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
											
											<div class="on_clmn padt10">			 
											<div class="pos_rel">
												
												<input type="text" name="bedroom_apartment_cleaning_extra_per_sqm5" id="bedroom_apartment_cleaning_extra_per_sqm5" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo $categoryTypePricingInfo['bedroom_apartment_cleaning_extra_per_sqm5']; ?>"> 
												
											 <label for="bedroom_apartment_cleaning_extra_per_sqm5" class="floating__label tall nobold padl10" data-content="Extra fee/m2" >
											<span class="hidden--visually">
											  Start fee</span></label>
											</div>
											 
											 
											</div>
									
								 </div>
										
											
										
										<input type="hidden" id="indexing_save" name="indexing_save">
										
								<div class="red_txt fsz20 talc" id="error_msg_form"> </div>
								
							
							
						 
							 
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir mart35 "> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18    ffamily_avenir">Submit</button></a> </div>
							
						</div></form>
							 
							   <div class="clear"></div>
					 
							
						</div>
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_black_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_cleaning.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
	 						