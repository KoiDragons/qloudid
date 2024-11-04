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
var issueM="<?php echo date('m'); ?>";
								var issueY="<?php echo date('Y'); ?>";
								var expiryM="<?php echo date('m'); ?>";
								var expiryY="<?php echo date('Y'); ?>";
								
		function updateMonth(id)
         {
			 var allDays='';
         	if(id<issueY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#issue_month").html(allDays);							
         	}
         	else
         	{
         	for(i=1;i<=issueM;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#issue_month").html(allDays);							
         	}
         }
         function updateExpiryMonth(id)
         {
			 var allDays='';
         	if(id>expiryY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#expiry_month").html(allDays);							
         	}
         	else
         	{
         	for(i=issueM;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#expiry_month").html(allDays);							
         	}
         }
        
	function changeDisplay()
	{
		if($('#ulDisplay').css('display') == 'none')
		{
		$('#ulDisplay').attr('style','display:block');	
		}
		else
		{
			$('#ulDisplay').attr('style','display:none');	
		}
		
	}
	 function changeColor(link)
		 {
			 $(link).removeClass('brd_2px_rgb');
			 $(link).addClass('brdb_new');
		 }
	           
var ports=1;
function updateDeposit(id,link)
{
	depositUpdate=1;
	
}


function updateVAT(id,link)
{
	
	vatUpdate=1;
	
}

		function submitForm()
		{
			$('#error_msg_form').html('');
			if($('#tenant_id').val()==0)
			{
			$('#error_msg_form').html('please select tenant');
				return false;
			}
			
			if($('#tenant_id').val()==-1)
			{
			
			if($("#tenant_rent_info").val()==0)
			{
				$("#error_msg_form").html('Please select rent price subscription');
                 submitFlag = 0;
                 return false;
			}
			 
			 if($("#first_name").val()==null || $("#first_name").val()=="")
			{
				$("#error_msg_form").html('Please enter first name of the tenant');
                 submitFlag = 0;
                 return false;
			}
			 
			if($("#last_name").val()==null || $("#last_name").val()=="")
			{
				$("#error_msg_form").html('Please enter last name of the tenant');
                 submitFlag = 0;
                 return false;
			} 
			
			if($("#email").val()==null || $("#email").val()=="")
			{
				$("#error_msg_form").html('Please enter email of the tenant');
                 submitFlag = 0;
                 return false;
			}
			if($("#p_number").val()==null || $("#p_number").val()=="")
			{
				$("#error_msg_form").html('Please enter a valid mobile number');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#p_number").val()))
			{
				$("#error_msg_form").html('Please enter a valid mobile number');
                 submitFlag = 0;
                 return false;
			}
			
			
			if($("#f_number").val()==null || $("#f_number").val()=="")
			{
				$("#error_msg_form").html('Please enter a valid landline number');
                 submitFlag = 0;
                 return false;
			}
			
			
			if(isNaN($("#f_number").val()))
			{
				$("#error_msg_form").html('Please enter a valid landline number');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#d_address").val()==null || $("#d_address").val()=="")
			{
				$("#error_msg_form").html('Please enter street address');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#dpo_number").val()==null || $("#dpo_number").val()=="")
			{
				$("#error_msg_form").html('Please enter port number');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#dzip").val()==null || $("#dzip").val()=="")
			{
				$("#error_msg_form").html('Please enter zipcode');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#dcity").val()==null || $("#dcity").val()=="")
			{
				$("#error_msg_form").html('Please enter city');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#dcountry").val()==null || $("#dcountry").val()=="")
			{
				$("#error_msg_form").html('Please select country of residence');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#pass_country").val()==null || $("#pass_country").val()=="")
			{
				$("#error_msg_form").html('Please select nationality');
                 submitFlag = 0;
                 return false;
			}
			
			 if($("#id_number").val()==null || $("#id_number").val()=="")
			{
				$("#error_msg_form").html('Please enter a valid passport number');
                 submitFlag = 0;
                 return false;
			}
			 if ($('#image-data1').val() == "" || $('#image-data1').val() == null) {
         
                 $("#error_msg_form").html('Please select front image');
                 submitFlag = 0;
                 return false;
             }
         
             if ($('#image-data3').val() == "" || $('#image-data3').val() == null) {
         
                 $("#error_msg_form").html('Please select back image');
                 submitFlag = 0;
                 return false;
             }
			 
			var bg_url = $('#image-data').css('background-image');
			$('#image-data1').val(bg_url);
			var bg_url1 = $('#image-data2').css('background-image');
			$('#image-data3').val(bg_url1);
			
			 var send_data={};
			send_data.email=$("#email").val();	 
				 $.ajax({
							type:"POST",
							url:"../../../checkEmailInfo/<?php echo $data['bid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								if(data1>0)
								{
								$("#error_msg_form").html('Email already in use by other tenant');
								 submitFlag = 0;
								 return false;	
								}
								 else
								 {
									  var send_data={};
										send_data.id_number=$("#id_number").val();	 
										send_data.pass_country=$("#pass_country").val();	 
											 $.ajax({
														type:"POST",
														url:"../../../checkPassportInfo/<?php echo $data['bid']; ?>",
														data:send_data,
														dataType:"text",
														contentType: "application/x-www-form-urlencoded;charset=utf-8",
														success: function(data1){
															if(data1>0)
															{
															$("#error_msg_form").html('Passport already in use by other tenant');
															 submitFlag = 0;
															 return false;	
															}
															 else
															 {
																if($('#price').val()=='' || $('#price').val()==null)
																{
																	$('#error_msg_form').html('please enter price');
																	return false;
																}
																
																if(isNaN($('#price').val()))
																{
																	$('#error_msg_form').html('please enter numeric value for price');
																	return false;
																}
																
																
																if($('#contract_termination').val()=='' || $('#contract_termination').val()==null)
																{
																	$('#error_msg_form').html('please enter contract renew information');
																	return false;
																}
																
																if(isNaN($('#contract_termination').val()))
																{
																	$('#error_msg_form').html('please enter numeric value for contract renew information');
																	return false;
																}
																
																 
																 
																 
																if($('#deposit_required').val()==1)
																{
																if($('#deposit_amount').val()==null || $('#deposit_amount').val()=='' || $('#deposit_amount').val()==0)
																{
																	$('#error_msg_form').html('please enter deposit amount');
																	return false;
																}
																if(isNaN($('#deposit_amount').val()))
																{
																	$('#error_msg_form').html('please enter numeric value for deposit amount');
																	return false;
																}
																if($('#deposit_payment_date').val()==null || $('#deposit_payment_date').val()=='')
																{
																	$('#error_msg_form').html('please select earliest payment date');
																	return false;
																}
																	
																}
																
																if($('#vat_applicable').val()==1)
																{
																	 
																if($('#total_vat').val()==0)
																{
																	$('#error_msg_form').html('please select applicable VAT');
																	return false;
																}
																	
																}
																 
																 document.getElementById('save_indexing').submit(); 
															 }
														}
													});
									 
								 }
							}
						});	
							
			
			}
			 
			if($('#price').val()=='' || $('#price').val()==null)
			{
				$('#error_msg_form').html('please enter price');
				return false;
			}
			
			if(isNaN($('#price').val()))
			{
				$('#error_msg_form').html('please enter numeric value for price');
				return false;
			}
			
			
			if($('#contract_termination').val()=='' || $('#contract_termination').val()==null)
			{
				$('#error_msg_form').html('please enter contract renew information');
				return false;
			}
			
			if(isNaN($('#contract_termination').val()))
			{
				$('#error_msg_form').html('please enter numeric value for contract renew information');
				return false;
			}
			
			 
			 
			 
			if($('#deposit_required').val()==1)
			{
			if($('#deposit_amount').val()==null || $('#deposit_amount').val()=='' || $('#deposit_amount').val()==0)
			{
				$('#error_msg_form').html('please enter deposit amount');
				return false;
			}
			if(isNaN($('#deposit_amount').val()))
			{
				$('#error_msg_form').html('please enter numeric value for deposit amount');
				return false;
			}
			if($('#deposit_payment_date').val()==null || $('#deposit_payment_date').val()=='')
			{
				$('#error_msg_form').html('please select earliest payment date');
				return false;
			}
				
			}
			
			if($('#vat_applicable').val()==1)
			{
				 
			if($('#total_vat').val()==0)
			{
				$('#error_msg_form').html('please select applicable VAT');
				return false;
			}
			 	
			}
			 
			 document.getElementById('save_indexing').submit(); 
		
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

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
            $('#image-data2')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data3').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
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
				 
                        <a href="../../../parkingAddInInfo/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>/<?php echo $data['pid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
                        <a href="../../../parkingAddInInfo/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>/<?php echo $data['pid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir">Parking</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please provide tenant information</a></div>
					 
					 
						 
						<div class="on_clmn brdb marb5">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Complete your building" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
									 <form action="../../../addParkingTenant/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>/<?php echo $data['pid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
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
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Select tenant</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
										<script>
										function updateTenantInfo(id)
										{
											if(id>0)
											{
											$('#tenantDetailInfo').addClass('hidden');	
											}
											else
											{
											$('#tenantDetailInfo').removeClass('hidden');		
											}
										}
									</script>										
									
									<div class="wi_100 pos_rel">
								 <Select  name="tenant_id" id="tenant_id" class="css-bnguuq dropdown-bg" onchange="updateTenantInfo(this.value);">
								 <option value="0">Select</option>
								 <option value="-1">Not in list</option>
											<?php  
										foreach($tenantList as $category => $value) 
												{
													
													
												?> 
												<option value="<?php echo $value['id']; ?>"><?php echo $value['first_name'].' '.$value['last_name']; ?></option>
												<?php } ?>
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
							
									 <div class="hidden" id="tenantDetailInfo">
									 <div class="clear"></div>
									 	<div class="marrl0 padb15 brdb fsz16 white_bg tall padt20">
								<a href="#profile5" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Tenant type 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile5" class=" " style="display:block;">	
									
											
										 
											
										 
											 
											
										  
											 
											
											
											
											<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Tenant type</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">
										<select id="tenant_type" name="tenant_type" class="css-bnguuq dropdown-bg"     />
														
													 													
														 <option value="1" >First hand contract</option>
														 <option value="2" >Second hand contract</option>
														 <option value="3" >Habitant</option>																
															   
																													
													</select>
													 
												 
												</div>
												 
											</div>	 
											 </div>
												 
											</div>	
											</div>
											
									<div class="clear"></div>
									
								<div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile6" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Rent info 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile6" class=" " style="display:block;">	
									
											
										 
											
										 
											 
											
										  
											 
											
											
											
											<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  "> Select price</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">	
										<select id="tenant_rent_info" name="tenant_rent_info" class="css-bnguuq dropdown-bg"     />
										<option value="0" >Select</option>
										<?php $i=0;
												
												foreach($servicePriceList as $category => $value) 
												{
													
													
												?> 				
													 													
									<option value="<?php echo $value['id']; ?>" ><?php echo $value['price_title']; ?><?php echo ' - '.$value['price'].' SEK'; ?></option>
									  																
												<?php } ?>	   
																													
													</select>
												</div>
												 
											</div>	 
												  
												</div>
												 
											</div>	 
											 
											</div>
											<div class="clear"></div>		
									
									
							 	<div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Basic 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile" class=" " style="display:block;">	
									
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  "> First name</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">	
												<input type="text" name="first_name" id="first_name" placeholder="First name" class="css-xt766"> 
												
											</div>
											 
											 
											</div>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">
											 
										  
											 
											<div class="pos_rel">
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  "> Last name</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">	
												<input type="text" name="last_name" id="last_name" placeholder="Last name" class="css-xt766"  > 
												</div>
											</div>
											 
											</div>
											</div>
											
												<div class="on_clmn padt10">
											 
											<div class="pos_rel">
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Email address</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">	
												<input type="text" name="email" id="email" placeholder="Email address" class="css-xt766"  > 
												 
											</div>
											 
											</div>	
											 
											</div>
											 
											</div>
											
										  
											 
											
											
											
											<div class="on_clmn padt10">
											 <div class="thr_clmn  wi_20 padr5"> 
										<div class="pos_rel">
										<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Code</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">	
										<select id="pcountry" name="pcountry" class="css-bnguuq dropdown-bg"     />
														
														<?php foreach($countryCode as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>" >+<?php echo $value['country_code']; ?></option>
														<?php } ?>
																														
															   
																													
													</select>
													 
												 
												</div>
												</div>
												</div>
												
												</div>
												<div class="thr_clmn  wi_80  padl5"> 
											<div class="pos_rel">
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Mobile</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">	
												<input type="text" name="p_number" id="p_number" placeholder="Phone number"   class="css-xt766"  > 
												 
												
											 </div>
											</div>
											</div>
											</div> 
											</div>
											
											<div class="on_clmn padt10">
											 <div class="thr_clmn  wi_20 padr5"> 
										<div class="pos_rel">
										<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Code</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">
										<select id="fcountry" name="fcountry" class="css-bnguuq dropdown-bg"     />
														
														<?php foreach($countryCode as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>" >+<?php echo $value['country_code']; ?></option>
														<?php } ?>
																														
															   
																													
													</select>
												</div>
												</div>
												</div>
												</div>
												<div class="thr_clmn  wi_80  padl5"> 
											<div class="pos_rel">
												<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Fixed phone</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">	
												<input type="text" name="f_number" id="f_number" placeholder="Phone number"   class="css-xt766"  > 
												   
											 </div>
											</div>	
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
									
								  <div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_70  padr5">   
											 <div class="pos_rel">
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
							   <div class="white_bg  bg_fffbcc_a ">
											<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
												<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
													
													<!--<div class="clear hidden-xs"></div>-->
													
													<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
														
														
														
														<div class="fleft wi_100  xs-mar0 xs-padt10">
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  "> Street address</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">	
												<input type="text" name="d_address" id="d_address" placeholder="Street address" class="css-xt766" > 
												  
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
														
														 
														 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Port</span> 
														 </div>
														 
														
													
													
													
													
													
													
												</div>
												<div class="clear"></div>
											</div>
											
												</div>
												
												</div>
								<div class="wi_100 pos_rel">
												<input type="text" name="dpo_number" id="dpo_number" placeholder="Port  " class="css-xt766" > 
												 
												</div>
											 </div>
											</div>
											</div>
											</div>
											
												<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
										<div class="pos_rel talc">
										<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
						   <div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Zip code</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
							<div class="wi_100 pos_rel">
										<input type="text" name="dzip" id="dzip" placeholder="Zip code" class="css-xt766" > 
												  
									 
									</div>
									</div>
								
									 
									</div> 
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
						   <div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">City, State</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
							<div class="wi_100 pos_rel"> 
											
											<input type="text" name="dcity" id="dcity" placeholder="City, State" class="css-xt766" >
												</div>
									</div>
												 
										</div>
									</div>
									</div>
									<div class="on_clmn padt10 ">
											 
											<div class="pos_rel">
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
							<div class="wi_100 pos_rel">
												<select class="css-bnguuq dropdown-bg"   name="dcountry" id="dcountry" >
											       <option value="0" class="lgtgrey2_bg">Select country</option>
														<?php foreach($countryOptions as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>"   ><?php echo $value['country_name']; ?></option>
														<?php } ?>         
											</select>
											</div>
											 
											</div> 	
											  </div>
											 
											</div>
											 			
							 </div>
							 <div class="clear"></div>
									 	
								 
								<div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile3" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Passport 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile3" class=" " style="display:none;">	
											<div class="on_clmn padt10 ">
											 
											<div class="pos_rel">
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
							<div class="wi_100 pos_rel">
												<select class="css-bnguuq dropdown-bg"   name="pass_country" id="pass_country" >
											       <option value="0" class="lgtgrey2_bg">Select country</option>
														<?php foreach($countryOptions as $category =>$value) { ?>													
															<option value="<?php echo $value['id']; ?>"   ><?php echo $value['country_name']; ?></option>
														<?php } ?>         
											</select>
											 		</div>
											
											</div>
											  
											</div>
											 
											</div>
						 
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
						   <div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Passport number</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
							<div class="wi_100 pos_rel">
												<input type="text" name="id_number" id="id_number" class="css-xt766"  /> 
											 
												
											 </div>
											 
											</div>
											</div>
											 
											</div>
																 			
							 									 
	 
					 <div class="on_clmn padt10">
                        <div class="thr_clmn  wi_50 "  >
                           <div class="pos_rel">
						   <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
						   <div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Issue year</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
							<div class="wi_100 pos_rel">
                              <select id="issue_year" name="issue_year" class="css-bnguuq dropdown-bg" onchange='updateMonth(this.value);' >
                                 <?php $date=date('Y'); $year=date('Y')-12;  for($i=$date; $i>=$year;$i--) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg"  ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
							  </div>
                        </div>
						</div>
                        </div>
                        <div class="thr_clmn wi_50 padl20">
                           <div class="pos_rel">
						    <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
						   <div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Issue month</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
							<div class="wi_100 pos_rel">
                              <select id="issue_month" name="issue_month" class="css-bnguuq dropdown-bg"  >
                                 <?php $dateM=date('m');  for($i=1; $i<=12;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg"><?php echo $i; ?></option>
								  <?php }  ?>
                              </select>
							   </div>
                        </div>
							 
                           </div>
                        </div>
                     </div>
					 
                     						
					 <div class="clear"></div>
                      
                     <div class="on_clmn padt10">
                        <div class="thr_clmn  wi_50 "  >
                           <div class="pos_rel">
						     <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
						   <div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  "> Expiry year</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
							<div class="wi_100 pos_rel">
							 <select id="expiry_year" name="expiry_year" class="css-bnguuq dropdown-bg"  onchange='updateExpiryMonth(this.value);'>
                                 <?php $year=$date+12; for($i=$date; $i<=$year;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
							   </div>
                        </div>
                           </div>
                        </div>
                        <div class="thr_clmn wi_50 padl20">
                           <div class="pos_rel">
						      <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
						   <div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  "> Expiry month</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
							<div class="wi_100 pos_rel">
                              <select id="expiry_month" name="expiry_month" class="css-bnguuq dropdown-bg"  >
                                 <?php  for($i=1; $i<=12;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
								  <?php } ?>
                              </select>
							  </div>
                        </div>
							     
                           </div>
                        </div>
                     </div>
                    						
									
										</div>
									  	
									<div class="clear"></div>
											 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile4" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Passport copies
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile4" class=" " style="display:none;">	
								
								
								<div class="on_clmn mart10 ">
									<div class="thr_clmn  wi_50 padr10"  >
								<div class="wi_100 xxs-wi_100  ">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="" class="hidden-image-data" />
										 
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: " id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								
								 
							</div>
						 
						</div>
						 
								<div class="thr_clmn  wi_50 padl10"  > 
								<div class="marb25  ">
						<div class="wi_100 xxs-wi_100  ">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data3" id="image-data3" value="" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: " id="image-data2" name="image-data2"></div>
											 
										</div>
									</div>
								
								 
							</div>
						</div>	 
						</div>
						</div>	
						<div class="on_clmn mart10 ">
									<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 talc">
											
											<label class="forword ">
												Front Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
										</div>
										<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 talc">
											
											<label class="forword ">
												Back Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL2(this);">
											</label>
											</div></div>
											
											</div>
											</div>
											
										</div>
										<div class="clear"></div>
										 	
					 			
										</div>
										
									 
									 </div>
									 
									 <div class="on_clmn padt10">
								 <div class="thr_clmn  wi_50 padr10"> 
											 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Price</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number"  name="price" id="price" class="css-xt766" value="<?php echo $selectedParkingInfo['parking_price']; ?>" />
								 
								 </div>
								   
									 </div>
									  
									 
									</div>
								
									 
									</div> 
									<div class="thr_clmn  wi_50 padl10"> 
											<div class="pos_rel">
											 
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Frequency</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <select  name="price_frequency" id="price_frequency" class="css-bnguuq dropdown-bg">
								<option value="1">Hourly</option>
								<option value="2">Weekly</option>	
								<option value="3" selected>Monthly</option>
								<option value="4">Yearly</option>
											</Select>
								 </div>
								   
									 </div>
									  
											 
										</div>
									</div>
									 </div>
									
									
									 <div class="on_clmn padt10">
								 <div class="thr_clmn  wi_50 padr10"> 
											 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Move in date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date"  name="move_in_date" id="move_in_date" min="<?php echo date('Y-m-d'); ?>" class="css-xt766" />
								 
								 </div>
								   
									 </div>
									  
									 
									</div>
								
									 
									</div> 
									<div class="thr_clmn  wi_50 padl10"> 
											<div class="pos_rel">
											 
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Move out date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date"  name="move_out_date" id="move_out_date" min="<?php echo date('Y-m-d'); ?>" class="css-xt766" />
								 
								 </div>
								   
									 </div>
									  
											 
										</div>
									</div>
									 </div>
							
									  <div class="on_clmn padt10">
								 <div class="thr_clmn  wi_50 padr10"> 
											 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Contract termination information</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number"  name="contract_termination" id="contract_termination" class="css-xt766" value="1" />
								 
								 </div>
								   
									 </div>
									  
									 
									</div>
								
									 
									</div> 
									<div class="thr_clmn  wi_50 padl10"> 
											<div class="pos_rel">
											 
											<div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Frequency</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <select  name="termination_frequency" id="termination_frequency" class="css-bnguuq dropdown-bg">
								<option value="1">Hour</option>
								<option value="2">Week</option>	
								<option value="3" selected>Month</option>
								<option value="4">Year</option>
											</Select>
								 </div>
								   
									 </div>
									  
											 
										</div>
									</div>
									 </div>
									
						 
					<input type="hidden" value="0" id="deposit_required" name="deposit_required" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If tenant must pay a deposit?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright" onclick="updateDeposit(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
									
									<div class="on_clmn padt10 hidden" id="depositInfo">
									<div class="thr_clmn  wi_50 padr10"> 
								 <div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Deposit amount</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number"  name="deposit_amount" id="deposit_amount" class="css-xt766" value="0" />
								 
								 </div>
								   
									 </div>
									  
									 
									</div>
								
									 
									 
									  </div>
									<div class="thr_clmn  wi_50 padr10"> 
								 <div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Deposit payment date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date"  name="deposit_payment_date" id="deposit_payment_date" class="css-xt766" min="<?php echo date('Y-m-d');?>" />
								 
								 </div>
								   
									 </div>
									  
									 
									</div>
								
									 
									 
									  </div>
									</div>
									
									<input type="hidden" value="0" id="vat_applicable" name="vat_applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="VAT must be added to the rent?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright" onclick="updateVAT(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
										 <div class="on_clmn padt10 hidden" id="VatInfo">
								 <div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">VAT</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <Select  name="total_vat" id="total_vat" class="css-bnguuq dropdown-bg">
								 <option value="0">0</option> 
											<option value="1">1</option> 
												 
											<option value="2">2</option> 
												 
											<option value="3">3</option> 
												 
											<option value="4">4</option> 
												 
											<option value="5">5</option> 
												 
											<option value="6">6</option> 
												 
											<option value="7">7</option> 
												 
											<option value="8">8</option> 
												 
											<option value="9">9</option> 
												 
											<option value="10">10</option> 
												 
											<option value="11">11</option> 
												 
											<option value="12">12</option> 
												 
											<option value="13">13</option> 
												 
											<option value="14">14</option> 
												 
											<option value="15">15</option> 
												 
											<option value="16">16</option> 
												 
											<option value="17">17</option> 
												 
											<option value="18">18</option> 
												 
											<option value="19">19</option> 
												 
											<option value="20">20</option> 
												 
											<option value="21">21</option> 
												 
											<option value="22">22</option> 
												 
											<option value="23">23</option> 
												 
											<option value="24">24</option> 
												 
											<option value="24">25</option> 
												 
											 
											</select>
								 		 
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