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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
<script>
var optionsDetail='<option value="0">Select</option>';
var optionCountry='<option value="0">Select</option><option value="1" >Costa Blanca North</option><option value="2" >Costa Blanca South</option>';
function selectRegion(id)
{
	if(id==67)
	{
	 $('#vitech_region_id').html(optionCountry);
	 $('#vitech_city_id').html(optionsDetail);
	 $('#vitech_area_id').html(optionsDetail);	
	}
	else
	{
	
	 $('#vitech_region_id').html(optionsDetail);
	 $('#vitech_city_id').html(optionsDetail);
	 $('#vitech_area_id').html(optionsDetail);	
	
	}
}
					function selectCity(id)
					{
					var send_data={};
					send_data.cid=id;
					 
					$.ajax({
						type:"POST",
						url:"../getCities",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
							 $('#vitech_city_id').html(data1);
							$('#vitech_area_id').html(optionsDetail);
						}
					});
					}
					function selectArea(id)
					{
					var send_data={};
					send_data.cid=id;
					 
					$.ajax({
						type:"POST",
						url:"../getArea",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
							 
							$('#vitech_area_id').html(data1);
						}
					});
					}
              
var ports=1;
function updateElevator(id,link)
{
	
	elevatorUpdate=1;
	
}


function updateBasement(id,link)
{
	
	basementUpdate=1;
	
}


function updatePenthouse(id,link)
{
	
	penthouseUpdate=1;
	
}

function updateGarage(id,link)
{
	
	garageUpdate=1;
	
}

function updateAmenities(id,link)
{
	
	amenitiesUpdate=1;
	
}

function updateTenant(id,link)
{
	
	tenantUpdate=1;
	
}

function updatePricing(id,link)
{
	
	priceUpdate=1;
	
}
function updateInvoice(id,link)
{
	
	invoiceUpdate=1;
	
}

function deleteFloor(id)
		{
		if($('#total_floor'+id).val()==1)
		{
			return false;
		}			
		var floors=parseInt($('#total_floor'+id).val())-1;
		$('#total_floor'+id).val(floors);
		 
		$('#floorCount'+id).html(floors+' floor');
								  
		}
		
function addFloor(id)
		{
		 var floors=parseInt($('#total_floor'+id).val())+1;
		$('#total_floor'+id).val(floors);
		 
		$('#floorCount'+id).html(floors+' floor');
								  
		}
		

function deleteStair()
		{
		if(ports==1)
		{
			return false;
		}			
		ports=ports-1;
		
		 var send_data={};
				 send_data.total_ports=ports;
				 $.ajax({
							type:"POST",
							url:"../getPortsInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('#total_stairs').val(ports);
								$('#portCount').html(ports+' Stair');
								 $('#port_info').html('');
								  $('#port_info').html(data1);
							}
						});	
		}
		
		function addStair()
		{
		 		
		ports=ports+1;
		 var send_data={};
				 send_data.total_ports=ports;
				 $.ajax({
							type:"POST",
							url:"../getPortsInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('#total_stairs').val(ports);
								$('#portCount').html(ports+' Stair');
								 $('#port_info').html('');
								  $('#port_info').html(data1);
							}
						});	
		}
		
		function submitForm()
		{
			$('#error_msg_form').html('');
			if($('#building_type').val()==0)
			{
			$('#error_msg_form').html('please select building subscription type');
				return false;	
			}
			if($('#building_completed').val()==0)
			{
			$('#error_msg_form').html('please select building completion status');
				return false;	
			}
			
			if($('#building_completed').val()==2)
			{
			if($('#s_date').val()=='' || $('#s_date').val()==null)
			{
			$('#error_msg_form').html('please select building start date');
				return false;	
			}

			if($('#e_date').val()=='' || $('#e_date').val()==null)
			{
			$('#error_msg_form').html('please select building expected completion date');
				return false;	
			}
			}
			
			
			if($('#building_completed').val()==1)
			{
			if($('#complete_date').val()=='' || $('#complete_date').val()==null)
			{
			$('#error_msg_form').html('please select building complete date');
				return false;	
			}
 
			}
			if($('#building_seller').val()==0)
			{
			$('#error_msg_form').html('please select who can sell the building');
				return false;
			}
			
			if($('#building_seller').val()>1)
			{
			if($('#broker_commission').val()==0)
			{
			$('#error_msg_form').html('please select broker commission');
				return false;
			}
			}
			
			if($('#country_id').val()==0)
			{
			$('#error_msg_form').html('please select country');
				return false;
			}
			if($('#country_id').val()==67)
			{
			if($('#vitech_region_id').val()==0)
			{
				$('#error_msg_form').html('please select region');
				return false;
			}
			
			if($('#vitech_city_id').val()==0)
			{
				$('#error_msg_form').html('please select city');
				return false;
			}
			
			if($('#vitech_area_id').val()==0)
			{
				$('#error_msg_form').html('please select area');
				return false;
			}
			}
			
			if($('#block_name').val()==null || $('#block_name').val()=='')
			{
				$('#error_msg_form').html('please enter block number');
				return false;
			}
			
			if($('#street_address').val()==null || $('#street_address').val()=='')
			{
				$('#error_msg_form').html('please enter street address');
				return false;
			}
			
			if($('#address_city').val()==null || $('#address_city').val()=='')
			{
				$('#error_msg_form').html('please enter city');
				return false;
			}
			
			if($('#zip_address').val()==null || $('#zip_address').val()=='')
			{
				$('#error_msg_form').html('please enter zipcode');
				return false;
			}
			
			for(i=1;i<=ports;i++)
			{
				if($('#port_number'+i).val()==null || $('#port_number'+i).val()=='')
				{
					$('#error_msg_form').html('please enter port number');
					return false;
				}
				
				
			}
			
			var autoCom=$("#street_address").val();
			var portDetail=$("#port_number1").val()
			var addressDetail=autoCom+' '+portDetail;
			if($('#lstatus').val()==0)
					{
				var send_data={};
						send_data.address=encodeURIComponent(addressDetail);
						$.ajax({
							type:"POST",
							url:"<?php if(isset($data['id'])) { echo '../'; } ?>../checkAddress",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#errorMsg').html('we cant find address. Please add coordinates');
									$('#lstatus').val(1);
									return false;									 
								}
								else 
								{
									var obj = JSON.parse(data1);
									 $('#locationDetail').attr('style','display:block;');
									$("#latit").val(obj[0]['lat']);
									
									$("#longi").val(obj[0]['lon']);	
									document.getElementById('save_indexing').submit();
								}
							}
						});	
					}
					
					if($('#lstatus').val()==1)
					{
				var send_data={};
						send_data.address=encodeURIComponent($("#street_address").val());
						send_data.lat=($("#latit").val());
						send_data.lon=($("#longi").val());
						$.ajax({
							type:"POST",
							url:"<?php if(isset($data['id'])) { echo '../'; } ?>../checkAddresslatLong",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#errorMsg').html('we cant find address. Please enter valid coordinates');
									$('#lstatus').val(1);
									return false;									 
								}
								else 
								{
									var obj = JSON.parse(data1);
									 $('#locationDetail').attr('style','display:block;');
									 
									document.getElementById('save_indexing').submit();
								}
							}
						});	
					}
			
		
		}
</script>

<body class="white_bg ffamily_avenir">
		
		
			<!-- HEADER -->
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../listBuildings/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			  
            <div class="clear"></div>
         </div>
      </div>
		
		 	 
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../listBuildings/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="#" class="lgn_hight_s1 fsz25"><span class="fa fa-bars black_txt" aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
				</div>
			  
            <div class="clear"></div>
         </div>
      </div>
		 
	<div class="clear"></div>
		
		<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" >
				<div class="wrap maxwi_100 padrl0 xs-padrl15 xsi-padrl134">
					
					 
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir">Building</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please provide building information</a></div>
					 
					 
						 
						<div class="on_clmn brdb marb5">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Complete your building" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
									 <form action="../addBuilding/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
									 <input type="hidden" id="total_stairs" name="total_stairs" value="1" />
									 <div class="on_clmn padt10">
								 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Building type</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <Select  name="building_type" id="building_type" class="css-bnguuq dropdown-bg" onchange="undpateTenantAvailable(this.value);">
								 <option value="0">Select</option>
												<option value="1">Purchase</option>
												<option value="2">Rental</option>
												<option value="3">Shared</option>
												 
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
									 
									 
									  <div class="on_clmn padt10">
								 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Building completed</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <Select  name="building_completed" id="building_completed" class="css-bnguuq dropdown-bg" onchange="undpateBuildingCompleted(this.value);">
								 <option value="0">Select</option>
												<option value="1">Yes</option>
												<option value="2">No</option>
												 
												 
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
									 
									 
									  <script>
									  function undpateBuildingCompleted(id)
									  {
										  if(id==2)
										  {
											$("#buildingNotDone").removeClass('hidden'); 
											$("#buildingDone").addClass('hidden');											
											 
										  }
										  else if(id==1)
										  {
											$("#buildingDone").removeClass('hidden'); 
											$("#buildingNotDone").addClass('hidden');	
										  }
										  else
										  {
											  $("#buildingDone").addClass('hidden'); 
											$("#buildingNotDone").addClass('hidden');	
										  }
									  }
									  </script>
									 
									 <div class="on_clmn hidden" id="buildingNotDone">
								 <div class="thr_clmn  wi_50 padr10"> 
											 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Start date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date" id="s_date" name="s_date" class="css-xt766"   fdprocessedid="39tflg">
								 </div>
								   
									 </div>
									  
									 
									</div>
								
									 
									</div> 
									<div class="thr_clmn wi_50 padl10"> 
											<div class="pos_rel">
											 
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Expected end date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								  <input type="date" id="e_date" name="e_date" class="css-xt766" min="<?php echo date('Y-m-d'); ?>" fdprocessedid="hiyev">
								 </div>
								   
									 </div>
									  
											 
										</div>
									</div>
									 </div>
									 
									 
									  <div class="on_clmn hidden" id="buildingDone">
								   
											<div class="pos_rel">
											 
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Completion date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								  <input type="date" id="complete_date" name="complete_date" class="css-xt766" max="<?php echo date('Y-m-d'); ?>" fdprocessedid="hiyev">
								 </div>
								   
									 </div>
									  
											 
										</div>
									</div>
									 
									 
									  <div class="on_clmn padt10">
								 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Who can sale the building</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <Select  name="building_seller" id="building_seller" class="css-bnguuq dropdown-bg" onchange="undpateBuildingCommission(this.value);">
								 <option value="0">Select</option>
												<option value="1">Inhouse</option>
												<option value="2">Broker</option>
												<option value="3">Inhouse and broker</option> 
												 
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
									  
									  <script>
									  function undpateBuildingCommission(id)
									  {
										  if(id>1)
										  {
											$("#buildingCommision").removeClass('hidden');  
											$('#broker_commission').val(0);
										  }
										  else
										  {
											$("#buildingCommision").addClass('hidden');    
											$('#broker_commission').val(0);
										  }
									  }
									  </script>
									 
									   <div class="on_clmn padt10 hidden" id="buildingCommision">
								 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Broker commission</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <Select  name="broker_commission" id="broker_commission" class="css-bnguuq dropdown-bg"  >
								 <option value="0">Select</option>
										<?php for($i=1;$i<=20;$i++){ ?>
										<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
										<?php } ?>										
												 
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
									 
									  <div class="on_clmn padt10">
								 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Country</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									<input type="hidden" value="<?php echo $companyDetail['country_id']; ?>"  name="country_id" id="country_id" />
									<div class="wi_100 pos_rel">
								 <Select  class="css-bnguuq dropdown-bg" disabled>
								 
											<?php  
										foreach($countryOptions as $category => $value) 
												{
													
													
												?> 
												<option value="<?php echo $value['id']; ?>" <?php if($companyDetail['country_id']==$value['id']) echo 'selected'; ?>><?php echo $value['country_name']; ?></option>
												<?php } ?>
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
							
									 
									 
									 <div class="on_clmn padt10">
								 <div class="thr_clmn  wi_35 padr5"> 
											 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Region</span> 
													 </div>
													 
													
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <Select  name="vitech_region_id" id="vitech_region_id" class="css-bnguuq dropdown-bg" onchange='selectCity(this.value);'>
								<option value="0">Select</option>
												<?php if($companyDetail['country_id']==67) { ?>
												<option value="1" >Costa Blanca North</option><option value="2" >Costa Blanca South</option>
												<?php } ?>
											 
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div>
								
									 
									</div> 
									<div class="thr_clmn  wi_35 padr5 padl5"> 
											<div class="pos_rel">
											 
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">City</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <Select  name="vitech_city_id" id="vitech_city_id" class="css-bnguuq dropdown-bg"   onchange='selectArea(this.value);'>
								<option value="0">Select</option>
											 
											</Select>
								 </div>
								   
									 </div>
									  
											 
										</div>
									</div>
									<div class="thr_clmn  wi_30 padl5"> 
											<div class="pos_rel">
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Area</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <Select  name="vitech_area_id" id="vitech_area_id" class="css-bnguuq dropdown-bg" >
								<option value="0">Select</option>
											 
											</Select>
								 </div>
								   
									 </div>
									   
											
											 
										</div>
									</div>
									</div>
							
									 
									 
									 <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Building name</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="text" id="building_name" name="building_name" class="css-xt766" value="">
								
								 </div>
								   
									 </div>
									 
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Block number</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="text" id="block_name" name="block_name" class="css-xt766" value="">
								
								 </div>
								   
									 </div>
									 
									 
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Street address</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="text" id="street_address" name="street_address" class="css-xt766" value="">
								
								 </div>
								   
									 </div>
									 
									 <div class="on_clmn">
								 <div class="thr_clmn  wi_50 padr10"> 
											 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">City</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="text" id="address_city" name="address_city" class="css-xt766" value="">
								 </div>
								   
									 </div>
									  
									 
									</div>
								
									 
									</div> 
									<div class="thr_clmn wi_50 padl10"> 
											<div class="pos_rel">
											 
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Zipcode</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								  <input type="text" id="zip_address" name="zip_address" class="css-xt766" value="">
								 </div>
								   
									 </div>
									  
											 
										</div>
									</div>
									 </div>
							
									 
									 <input type="hidden" id="lstatus" name="lstatus" value="0">
									 <div id="locationDetail" style="display:none">
													<div class="on_clmn mart20 ">
												
												
												
												<div class="pos_rel">
													
													
													<input type="text" name="latit" id="latit" placeholder="Latitude" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir" value="">
												</div>
												
												 	</div>
													
													<div class="on_clmn mart20 ">
												
												
												
												<div class="pos_rel">
													
													
													<input type="text" name="longi" id="longi" placeholder="Longitude" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir" value="">
												</div>
												
												 	</div>
													</div>
									 
									 	<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  brdb_dfe3e6 padb10">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Number of stairs</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many stairs does your property have?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div id="bedroom_count" class="css-151xzu3">
										<a href="javascript:void(0);" onclick="deleteStair();">
										 
										<div color="#444444" data-testid="icon-button--minus" class="merlin-button merlin-button--disabled css-ig30wo" aria-label="" disabled="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</div></a>
										<span class="value" id="portCount">1 Stair</span>
									<a href="javascript:void(0);" onclick="addStair();">	
									<div color="#444444" data-testid="icon-button--plus" class="merlin-button css-mgojn5" aria-label="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-r0ilrj">
										</div>
										</div>
										</div>
										</div>
										</div></a>
										</div>
									 	 
											 
									</div>
									
									
									 
									 
									 
							 
					<div id="port_info">
					 <div class="padb10 xs-padrl0 xs-padb0   mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile1" class="expander-toggler dark_grey_txt xs-fsz16 tall bold">Port number 1
								<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile1" class=" " style="display: block;">	
										 
									 
											<div id="6">
											<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt brd" id="extra_8">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_50 xxs-wi_55  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Add port number</span>
													 
													 </div>
													 
											<div class="wi_70  xs-mar0 xs-padt10">		
												<div class="on_clmn mart10 ">
								<div class="pos_rel">											
											 <input type="text" id="port_number1" name="port_number1" class="css-xt766" value="">
											</div>
											</div>
												
											</div>	
											<div class="clear"></div>
												
											</div>
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									<input type="hidden" value="1" id="elevator1" name="elevator1" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If this port number have elevator?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateElevator(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
									
									<input type="hidden" id="total_floor1" name="total_floor1" value="1" />
										<div class="column_m container  marb5  mart10 fsz14 dark_grey_txt  brdb_dfe3e6 padb10">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Number of floors</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">How many floors does this property have?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
											 
										 <div id="floor_count" class="css-151xzu3">
										<a href="javascript:void(0);" onclick="deleteFloor(1);">
										 
										<div color="#444444" data-testid="icon-button--minus" class="merlin-button merlin-button--disabled css-ig30wo" aria-label="" disabled="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-lf4a1m">
										</div>
										</div>
										</div>
										</div>
										</div></a>
										<span class="value" id="floorCount1">1 floor</span>
									<a href="javascript:void(0);" onclick="addFloor(1);">	
									<div color="#444444" data-testid="icon-button--plus" class="merlin-button css-mgojn5" aria-label="">
										<div class="merlin-button__content">
										<div class="css-ibdtyj">
										<div class="css-2llcy8">
										<div data-testid="icon-button--icon-div" class="css-r0ilrj">
										</div>
										</div>
										</div>
										</div>
										</div></a>
										</div>
									 	 
											 
									</div>
									
									
									
									</div>
									<div class="clear"></div>
									</div>
					 		 <div class="clear"></div>
					</div> 					
					
					</div>
					
					<input type="hidden" value="1" id="basement_available" name="basement_available" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If they have a basement?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateBasement(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
									
									
									
									<input type="hidden" value="1" id="penthouse_available" name="penthouse_available" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If they have top floor as penthouse?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updatePenthouse(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
											<input type="hidden" value="1" id="garage_available" name="garage_available" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="if they garage in the same building?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateGarage(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
									
							<input type="hidden" value="1" id="amenities_available" name="amenities_available" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If they have amenities available?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateAmenities(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
									
									<script>
									function undpateTenantAvailable(id)
									{
										if(id==1)
										{
											$('#tID').addClass('hidden');
											$('#tenant_available').val(0);
											$('.tenant_check').removeClass('checked');
										}
										else
										{
											$('#tID').removeClass('hidden');
											$('#tenant_available').val(1);
											$('.tenant_check').addClass('checked');
										}
									}
									</script>
									
									<input type="hidden" value="1" id="tenant_available" name="tenant_available" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb " id="tID">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to add tenant information?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright tenant_check  checked" onclick="updateTenant(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
											<input type="hidden" value="1" id="pricing_available" name="pricing_available" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="if they have different pricing?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updatePricing(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" value="1" id="invoice_available" name="invoice_available" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb" id="InvoiceInfo">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="if they generate invoice in timely order?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateInvoice(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
									
										
					</form>
						<div class="clear"></div>
						<div class="padtb20 valm fsz20 red_txt " id="error_msg_form"> </div>				 
					 <div class=" xxs-talc talc mart35">
								
								<button type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18" onclick="submitForm();">Submit</button>
								
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
			
			<div id="errorMsg1" class="red_txt fsz16"> </div>
			
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="editDepartment();">
				<input type="hidden" id="did" name="did">
			</div>
			
			
		</div>
	</div>
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
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