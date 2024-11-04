 

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
	function updateApartmentRequired()
{
	apartmentAvailable=1;
}
	var portOptions='<option value="0">Select</option>';
function updatePort(id)
{
	if(id==0)
	{
	$("#tenant_rent_info").html('');	
	$("#tenant_rent_info").html(portOptions);	
	$("#port_id").html('');	
	$("#floor_id").html('');	
	$("#port_id").html(portOptions);	
	$("#floor_id").html(portOptions);
	$("#apartment_id").html(portOptions);		
	}
	else
	{
		$("#floor_id").html('');
		$("#floor_id").html(portOptions);
			$("#apartment_id").html(portOptions);	
		var send_data={};
		send_data.building_id=id;	 
		 
		 $.ajax({
		type:"POST",
		url:"../getPorts/<?php echo $data['cid']; ?>",
		data:send_data,
		dataType:"text",
		contentType: "application/x-www-form-urlencoded;charset=utf-8",
		success: function(data1){
		$("#port_id").html('');	
		$("#port_id").html(data1);																
		}
		});	
	}
 
}


function updateFloor(id)
{
	if(id==0)
	{
	$("#floor_id").html('');	
	$("#floor_id").html(portOptions);	
	$("#apartment_id").html(portOptions);
	
	}
	else
	{
		$("#floor_id").html('');
		$("#floor_id").html(portOptions);
			$("#apartment_id").html(portOptions);	
		var send_data={};
		send_data.port_id=id;	 
		 
		 $.ajax({
		type:"POST",
		url:"../getFloors/<?php echo $data['cid']; ?>",
		data:send_data,
		dataType:"text",
		contentType: "application/x-www-form-urlencoded;charset=utf-8",
		success: function(data1){
		$("#floor_id").html('');	
		$("#floor_id").html(data1);																
		}
		});	
	}
 
}


function getService(id)
{
	
	if(id==0)
	{
	$("#apartment_id").html('');	
	$("#apartment_id").html(portOptions);	
	}
	else
	{
		$("#apartment_id").html('');
		$("#apartment_id").html(portOptions);
		var send_data={};
		send_data.floor_id=id;	 
		 
		 $.ajax({
		type:"POST",
		url:"../getApartment/<?php echo $data['cid']; ?>",
		data:send_data,
		dataType:"text",
		contentType: "application/x-www-form-urlencoded;charset=utf-8",
		success: function(data1){
		$("#apartment_id").html('');	
		$("#apartment_id").html(data1);																
		}
		});	
	}
	
	
		var send_data={};
		send_data.building_id=$('#building_id').val();	 
		 
		 $.ajax({
		type:"POST",
		url:"../getService/<?php echo $data['cid']; ?>",
		data:send_data,
		dataType:"text",
		contentType: "application/x-www-form-urlencoded;charset=utf-8",
		success: function(data1){
		$("#tenant_rent_info").html('');	
		$("#tenant_rent_info").html(data1);																
		}
		});	
	}
 

		
		function submitform()
		{
			$('#error_msg_form').html('');
			 
			 if($("#apartment_orientation").val()==0)
			{
				$("#error_msg_form").html('Please select apartment orientation');
                 submitFlag = 0;
                 return false;
			}
			if($("#building_id").val()==0)
			{
				$("#error_msg_form").html('Please select building');
                 submitFlag = 0;
                 return false;
			}
			if($("#port_id").val()==0)
			{
				$("#error_msg_form").html('Please select port');
                 submitFlag = 0;
                 return false;
			}
			if($("#floor_id").val()==0)
			{
				$("#error_msg_form").html('Please select floor');
                 submitFlag = 0;
                 return false;
			}
			 if($("#tenant_rent_info").val()==0)
			{
				$("#error_msg_form").html('Please select tenant rent information');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#apartment_available").val()==0)
			{
			if($("#apartment_number").val()=='' || $("#apartment_number").val()==null)
			{
				$("#error_msg_form").html('Please enter apartment number');
                 submitFlag = 0;
                 return false;
			}	 
			}
			else
			{
			if($("#apartment_id").val()==0)
			{
				$("#error_msg_form").html('Please select apartment ');
                 submitFlag = 0;
                 return false;
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
	
	 
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
					 
						 <a href="../../CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
						 
                     </li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m   talc lgn_hight_22 fsz16 mart40" id="loginBank">
				<div class="wrap maxwi_100 padrl15 xs-padrl25">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10  xs-pad0">
					 
									<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 xxs-fsz45 lgn_hight_55 xxs-lgn_hight_45 padb0 black_txt trn ffamily_avenir">Request</h1>
									</div>
									
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Verify below request detail and provide additional information if this apartment belongs your company</a></div>
									
								 
								<div class="tab-header mart10 padb10 xs-tall brdb tabbluebrdcolor nobrdt nobrdl nobrdr tall hidden">
                                            <a href="#" class="dinlblck mar5 padrl15   tabblueBGcolor brdrad5  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Basic</a>
											 
											   
                                             
                                        </div>	
									
							<form action="../approveApartmentRequest/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0   padtrl0 white_bg">		 
							 	<div class="marrl0 padb15 brdb fsz16 white_bg tall padt20">
								<a href="#profile" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Basic 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile" class=" " style="display:block;">	
									
											<input type="hidden" id="code_detail" name="code_detail" value="<?php echo $_POST['code_detail']; ?>" />
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="first_name" id="first_name" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['first_name']; ?>" readonly> 
												
											 <label for="first_name" class="floating__label tall nobold padl10" data-content="First name" >
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">
											 
										  
											 
											<div class="pos_rel">
												
												<input type="text" name="last_name" id="last_name" placeholder="Last name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['last_name']; ?>" readonly> 
												 <label for="last_name" class="floating__label tall nobold padl10" data-content="Last name" >
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
											</div>
											</div>
											
												<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="email" id="email" placeholder="Email address" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['email']; ?>" readonly> 
												 <label for="email" class="floating__label tall nobold padl10" data-content="Email address" >
											<span class="hidden--visually">
											 Email address</span></label> 
												
											 
											</div>
											 
											</div>
											
										  
											 
											
											
											
											<div class="on_clmn padt10">
											 <div class="thr_clmn  wi_20 padr5"> 
										<div class="pos_rel">
										<select id="pcountry" name="pcountry" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"     />
														
														<?php foreach($countryCode as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>"   <?php if(isset($apartmentRequestDetail)) { if($apartmentRequestDetail['country_of_residence']==$value['id']) echo 'selected';   } else { if($value['id']==201) echo 'selected'; } ?>>+<?php echo $value['country_code']; ?></option>
														<?php } ?>
																														
															   
																													
													</select>
													 
												 <label for="pcountry" class="floating__label tall nobold padl10" data-content="Code">
											<span class="hidden--visually">
											  Code</span></label>
												</div>
												</div>
												<div class="thr_clmn  wi_80  padl5"> 
											<div class="pos_rel">
												
												<input type="text" name="p_number" id="p_number" placeholder="Phone number"   class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['phone_number']; ?>" readonly > 
												 <label for="p_number" class="floating__label tall nobold padl10" data-content="Mobile" >
											<span class="hidden--visually">
											 Mobile</span></label> 
												
											 </div>
											</div>
											 
											</div>
											 </div>
											 <div class="clear"></div>
											 <div class="clear"></div>
											 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile1" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Address 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile1" class=" " style="display:none;">	
									
								 
											 
											 										
										<div class="on_clmn padt10 hidden">
											
											<div class="pos_rel">
												
												<input type="text" name="name_on_house" id="name_on_house" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['name']; ?>"  readonly> 
												
											 <label for="first_name" class="floating__label tall nobold padl10" data-content="Name on door" >
											<span class="hidden--visually">
											 Name on door</span></label>
											</div>
											 </div>
											   <div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_70  padr5">   
											 <div class="pos_rel">
												
												<input type="text" name="d_address" id="d_address" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['address']; ?>"  readonly> 
												 <label for="s_address" class="floating__label tall nobold padl10" data-content="Street address" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											</div>
											 
											<div class="thr_clmn  wi_30 padl5">  
											
											 
											
										
											<div class="pos_rel">
												
												<input type="text" name="dpo_number" id="dpo_number" placeholder="Port  " class="white_bg  brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['port_number']; ?>"  readonly> 
												 <label for="po_number" class="floating__label tall nobold padl10  " data-content="Port  " >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											</div>
											
											
												<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
										<div class="pos_rel talc">
									 
										<input type="text" name="dzip" id="dzip" placeholder="Zip code" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['zipcode']; ?>"  readonly> 
												 <label for="Zipcode" class="floating__label tall nobold padl10" data-content="Zip code" >
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											 
											
											<input type="text" name="dcity" id="dcity" placeholder="City, State" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" value="<?php if(isset($apartmentRequestDetail)) echo $apartmentRequestDetail['city']; ?>"  readonly> 
												 <label for="city" class="floating__label tall padl10 nobold" data-content="City, State" >
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
									</div>
									<div class="on_clmn padt10 ">
											 
											<div class="pos_rel">
												<select class="wi_100 light_grey_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_65p fsz20 padl10 black_txt ffamily_avenir"   name="dcountry" id="dcountry" >
											       <option value="0" class="lgtgrey2_bg">country</option>
														<?php foreach($countryOptions as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>"   <?php  if($value['id']==$apartmentRequestDetail['country_of_residence']) echo 'selected'; ?>><?php echo $value['country_name']; ?></option>
														<?php } ?>         
											</select>
											 	
											  <label for="country" class="floating__label tall nobold padl10" data-content="Country">
											<span class="hidden--visually">
											  Country</span></label>
											</div>
											 
											</div>
											 			
							 </div>
							 <div class="clear"></div>
										 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile2" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Apartment info 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile2" class=" " style="display:none;">	
										
										 
										 
										
									<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<select id="apartment_orientation" name="apartment_orientation" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"   />
										<option value="0">Select</option>
										   	 <option value="1">East</option>
											  <option value="2">West</option> 
											  <option value="3">North</option>
											   <option value="4">South</option>
												 <option value="5">Not specified</option>																	
													</select>
													 
												 <label for="building_id" class="floating__label tall nobold padl10" data-content="Select orientation">
											<span class="hidden--visually">
											  Select price</span></label>
												</div>
												 
											</div>	 
											
											<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<select id="building_id" name="building_id" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"   onchange="updatePort(this.value);" >
										
										    <?php echo $buildingList; ?>
																													
													</select>
													 
												 <label for="building_id" class="floating__label tall nobold padl10" data-content="Select building">
											<span class="hidden--visually">
											  Select price</span></label>
												</div>
												 
											</div>	 
											
											
											<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<select id="port_id" name="port_id" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"  onchange="updateFloor(this.value);"   >
										
										    <option value="0">Select</option>
																													
													</select>
													 
												 <label for="port_id" class="floating__label tall nobold padl10" data-content="Select port">
											<span class="hidden--visually">
											  Select price</span></label>
												</div>
												 
											</div>	 
											
											
											<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<select id="floor_id" name="floor_id" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"   onchange="getService(this.value);">
										
										    <option value="0">Select</option>
																													
													</select>
													 
												 <label for="floor_id" class="floating__label tall nobold padl10" data-content="Select floor">
											<span class="hidden--visually">
											  Select price</span></label>
												</div>
												 
											</div>	 
											 
											 
											  <div class="on_clmn    brdb">
								 
									<div class="thr_clmn  wi_50   xs-padl20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If apartmnet is already added?" class="wi_100 rbrdr pad10    tall  xxs-minhei_60p minhei_65p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 xxs-minhei_60p minhei_65p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  " onclick="updateApartmentRequired();">
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" id="apartment_available" name="apartment_available" value="0" />

										</div>
											
											<div class="on_clmn padt10 " id="NotAdded">
											 
											<div class="pos_rel">
												
												<input type="number" name="apartment_number" id="apartment_number" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" fdprocessedid="s7mcy"> 
												
											 <label for="apartment_number" class="floating__label tall nobold padl10" data-content="Apartment number">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											 
											
											<div class="on_clmn padt10 hidden" id="AlreadyAdded">
											 
											<div class="pos_rel">
										<select id="apartment_id" name="apartment_id" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"   >
										
										   <option value="0">Select</option>
																													
													</select>
													 
												 <label for="port_id" class="floating__label tall nobold padl10" data-content="Select apartment">
											<span class="hidden--visually">
											  Select price</span></label>
												</div>
											 
											 
											</div>
											 
											
									<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<select id="tenant_rent_info" name="tenant_rent_info" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"     />
										<option value="0" >Select</option>
										   
																													
													</select>
													 
												 <label for="tenant_rent_info" class="floating__label tall nobold padl10" data-content="Select price">
											<span class="hidden--visually">
											  Select price</span></label>
												</div>
												 
											</div>
									 
								 
									 </div>
										
									<div class="clear"></div>
								 	
										
										
										<input type="hidden" id="indexing_save" name="indexing_save">
										
								<div class="red_txt fsz20 talc" id="error_msg_form"> </div>
								
							
							
						 
							 
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir mart35 "> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18    ffamily_avenir">Approve</button></a> </div>
						

					<div class="talc padtb20 ffamily_avenir mart35 "> <a href="../rejectApartmentRequest/<?php echo $data['cid']; ?>/<?php echo $apartmentRequestDetail['rid']; ?>"><button type="button" value="Add" class="forword minhei_55p  fsz18    ffamily_avenir">Reject</button></a> </div>						
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
	 						