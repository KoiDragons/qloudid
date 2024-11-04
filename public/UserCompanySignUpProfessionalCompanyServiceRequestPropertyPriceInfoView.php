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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
	<script>
	function updateBookable()
	{
		bookableCategory=1;
	}
	function updateBroad(id,link)
   {
	   broadcast=id;
	  $("#price_per_hour").val(0);
	  $("#project_fee").val(0);
   }
   
	function updatePropertyType(id)
	   {
		   $("#property_type_detail").val(id);
	   }
	 	function submitform()
		{
			
			$("#errorMsg1").html('');
			 
			if($("#broadcast_type").val()==1)
			{
			if($('#property_type_detail').val()=='' || $('#property_type_detail').val()==null)
			{
			$("#errorMsg1").html('Please select a property');
				return false;	
			}
				
			if($("#property_price").val()==0)
			{
				
				$("#errorMsg1").html('Please enter property price');
				return false;
			}
			
			if(isNaN($("#property_price").val()))
			{
				
				$("#errorMsg1").html('Please enter numeric value for price');
				return false;
			}
			
			 
			if(isNaN($("#deposit_fee").val()))
			{
				
				$("#errorMsg1").html('Please enter numeric value for deposit fee');
				return false;
			}
			
			if(isNaN($("#cleaning_fee").val()))
			{
				
				$("#errorMsg1").html('Please enter numeric value for cleaning fee');
				return false;
			}
			
			}
			document.getElementById('save_indexing').submit();
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
	   
		 	</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 		<!-- HEADER -->
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10" style="background-color: #c12219 !important;">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../../completeProfile/<?php echo $data['cid']; ?>/<?php echo $data['domain_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16">  
					<li class="last first">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18 sf-with-ul" onclick="changeDisplay();"><span class="fas fa-globe black_txt" aria-hidden="true"></span></a>
						<ul id="qrMenu" class="hidden">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li class="first"><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru">Russian</a></li>
                  
                  
                  <li class="last">
				  
				  
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
                        <a href="../../../completeProfile/<?php echo $data['cid']; ?>/<?php echo $data['domain_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left txt_c12219" aria-hidden="true"></i></a>
                     </li>
								 
								
								
								
							</ul>
						</div>
				
					</div>					 
				  
			<div class="top_menu frighti padt10 padb10" style="width:150px !important;">
				<ul class="menulist sf-menu  fsz16">
					 
       			
					<li style="margin-right:20px !important;" class="first last">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25 sf-with-ul" onclick="changeDisplay1();"><span class="black_txt fas fa-globe" aria-hidden="true"></span></a>
						<ul id="qrMenu1" class="hidden" style="display: block;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									 
									<ol class="">
									 
                  <li class="first"><a href="javascript:void(0);" class="dropdown-item changedText" tolang="en" onclick="changeDisplay1();">English</a></li>
				  <li><a href="javascript:void(0);" class="dropdown-item changedText show_popup_modal" tolang="sv" onclick="changeDisplay1();">Swedish</a></li>
                  <li><a href="javascript:void(0);" class="dropdown-item changedText" tolang="ru" onclick="changeDisplay1();">Russian</a></li>
                  
                  
                  <li class="last">
				  
				  
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
	
			 <!-- CONTENT -->
		 
		 <div class="column_m talc lgn_hight_22 fsz16 mart40"  >
				<div class="wrap maxwi_100 padrl15 xs-padrl25">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_65 xxs-lgn_hight_50 padb0 black_txt trn ffamily_avenir changedText"  >Set a price
</h1>
									</div>
									<div class="mart10 marb5 xxs-tall talc  xs-padb0 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20 changedText" >If you want this job. Then set your price for this project</a></div>
								 
									
					 
					 
					 
							
							<form action="../../../updatePriceForProperty/<?php echo $data['cid']; ?>/<?php echo $data['request_id']; ?>/<?php echo $data['domain_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 <?php if($serviceRequestReceivedInfo['is_accepted']==0 || $serviceRequestReceivedInfo['is_accepted']==1) { ?>
								<div class="marb0 ">		 
							 
							 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile1" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active" style="background-color: #c12219 !important; "><span class="changedText">Pricing</span>
								 </a></div>
									  					
									 <div class="on_clmn  mart20  brdb <?php if($serviceRequestReceivedInfo['is_accepted']==1) { echo 'hidden'; } ?>">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Interested (Yes/No)" class="wi_100 rbrdr     tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateBroad(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										 <input type="hidden" id="broadcast_type" name="broadcast_type" value="<?php echo $serviceRequestReceivedInfo['is_accepted']; ?>" />
										<div class="wi_100 maxwi_500p ovfl_hid padt10 <?php if($serviceRequestReceivedInfo['is_accepted']==1) { echo ''; } else echo 'hidden'; ?>" id="b_channels">
										  <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Properties</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please select one property</span> 
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
												foreach($propertyManagerApartmentList as $category => $value) 
												{
													
													
												?> 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20">
														<a href="javascript:void(0);" onclick="updatePropertyType(<?php echo $value['id']; ?>)"><input data-testid="test-checkbox-Walls" name="property_type" type="radio" class="css-radio-1lgzhz8" <?php echo $value['disabled']; ?>></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText"><?php echo str_ireplace('&','and',$value['property_title']); if($value['proposal_sent']==1) echo '('.$value['already_sent'].')'; ?></label></div>
															
															</div>
															
												<?php } ?>	
										<input type="hidden" id="property_type_detail" name="property_type_detail" />
														
										</div>
										<div class="clear"></div>
										<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Price</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please provide the property price?</span> 
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
										
										<div class="on_clmn ">
											 
											<div class="pos_rel">
												
												<input type="number" name="property_price" id="property_price" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="gbvt" value="0"/> 
												
											 <label for="property_price" class="floating__label tall nobold padl10" data-content="Price">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											<div class="clear"></div>
											<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Deposit fee</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please provide the fee if deposit fee applicable?</span> 
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
										

										<div class="on_clmn ">
											 
											<div class="pos_rel">
												
												<input type="number" name="deposit_fee" id="deposit_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="gbvt" value="0"/> 
												
											 <label for="deposit_fee" class="floating__label tall nobold padl10" data-content="Deposit fee">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											<div class="clear"></div>
											<div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Cleaning</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please provide the cleaning fee if applicable?</span> 
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
										
											<div class="on_clmn  ">
											 
											<div class="pos_rel">
												
												<input type="number" name="cleaning_fee" id="cleaning_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="gbvt" value="0"/> 
												
											 <label for="cleaning_fee" class="floating__label tall nobold padl10" data-content="Cleaning fee">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											<div class="clear"></div>
											 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Late arrival</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please provide the late arrival fee if applicable?</span> 
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
										
											<div class="on_clmn  ">
											 
											<div class="pos_rel">
												
												<input type="number" name="late_arrival_fee" id="late_arrival_fee" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="gbvt" value="0"/> 
												
											 <label for="late_arrival_fee" class="floating__label tall nobold padl10" data-content="Late arrival fee">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											<div id="inclusionInfo" class="padt10">
									 <div class="column_m container fsz14 dark_grey_txt">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt20 padb5 brdrad1 fsz14 dark_grey_txt&nbsp;padrl0">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt changedText">Amenities</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt changedText">Please check amenities that are working properly?</span> 
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
											<div class="css-1sjqbna padrl20" id="9">
														<a href="javascript:void(0);" onclick="updateInclutionType(1)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">All door works</label></div>
															
															</div>
												 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="10">
														<a href="javascript:void(0);" onclick="updateInclutionType(2)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">All windows works</label></div>
															
															</div>
												 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="11">
														<a href="javascript:void(0);" onclick="updateInclutionType(3)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">WIFI works</label></div>
															
															</div>
												 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="12">
														<a href="javascript:void(0);" onclick="updateInclutionType(4)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">TV works</label></div>
															
															</div>
												 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="13">
														<a href="javascript:void(0);" onclick="updateInclutionType(5)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Remote control works</label></div>
															
															</div>
												 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="14">
														<a href="javascript:void(0);" onclick="updateInclutionType(6)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Air condition works</label></div>
															
															</div>
												 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="15">
														<a href="javascript:void(0);" onclick="updateInclutionType(7)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Hot & cold water works</label></div>
															
															</div>
												 	
										<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="16">
														<a href="javascript:void(0);" onclick="updateInclutionType(8)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Toilette stol works</label></div>
															
															</div>
														
									 				<div data-testid="Walls-amenity-item" class="css-39yi7y lgtgrey_bg">
										<div class="css-nj7s2c lgtgrey_bg" style="justify-content: left !important;"> 
											<div class="css-1sjqbna padrl20" id="16">
														<a href="javascript:void(0);" onclick="updateInclutionType(9)"><input data-testid="test-checkbox-Walls" name="Walls" type="checkbox" class="css-1lgzhz8"></a>
														</div>
											<label for="oven" class="css-14q70q1 changedText">Shower works</label></div>
															
															</div>
															
												<input type="hidden" id="inclusion_type_detail" name="inclusion_type_detail">				
										</div>
										 
									</div>
										
										 	 								
									  
										 <input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								
							</form>
							<div class="clear"></div>
						  
							
						    <div class="padt20 xxs-talc talc padb50">
								
								<a href="javascript:void(0);" onclick="submitform();"><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #000000; color: #ffffff;" fdprocessedid="x55d"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Submit</font></font></button></a>
								
							</div>
					 
							
						</div>
								 <?php } else if($serviceRequestReceivedInfo['is_accepted']==3) { ?>
								 <div class="clear"></div>
								   <div class="padt20 xxs-talc talc padb50">
								
								<a href="../../completeProfile/<?php echo $data['cid']; ?>" ><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #000000; color: #ffffff;" fdprocessedid="x55d"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Bid closed</font></font></button></a>
								
							</div>
								 
						 
							
								 <?php }  ?>
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
 
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
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
	 						