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
 
function updateMonthlyFee(id,link)
{
	
	vatUpdate=1;
	
}
 
		
		function submitForm()
		{
			$('#error_msg_form').html('');
			if($('#owner_id').val()==0)
			{
			$('#error_msg_form').html('please select owner of the object');
				return false;	
			}
			 if($("#bank_account_id").val()==0)
				{
					$("#error_msg_form").html('Please select account number for payment');
					return false;
				}
			if($('#owner_object_type').val()==0)
			{
			$('#error_msg_form').html('please select object type for the agreement');
				return false;
			}
			 
			if($('#object_id').val()==0)
			{
				$('#error_msg_form').html('please select object for the agreement');
				return false;
			}
			
			 
			
			if($('#vat_applicable').val()==1)
			{
				if($('#total_vat').val()==0)
				{
					$('#error_msg_form').html('please enter applicable monthly fee');
					return false;
				}
			}
			
			if($('#deposit_fee_applicable').val()==1)
			{
				if($('#deposit_fee').val()==0)
				{
					$('#error_msg_form').html('please enter deposit fee');
					return false;
				}
			}
			if($('#remaining_fee_paid_in_full').val()==1 && $('#total_emis').val())
			{
			$('#error_msg_form').html('You must have atleast two EMIs. Else mark paid in full');
			return false;	
			}
			
			if($('#total_emis').val()>1)
			{
			var total_emi_info_val=0;
			
			for(i=1;i<=$('#total_emis').val();i++)
			{
				total_emi_info_val=parseInt(total_emi_info_val)+parseInt($('#emi'+i).val());
			}
 
			if(total_emi_info_val<100 || total_emi_info_val>100)
			{
			$('#error_msg_form').html('Total of EMIs to be paid must be 100%');
			return false;	
			}
			
			for(i=2;i<=$('#total_emis').val();i++)
			{
				j=i-1;
				if($('#emi'+i+'_payment_date').val()<=$('#emi'+j+'_payment_date').val())
					{
					$('#error_msg_form').html('EMI '+i+' payment date must be greater then EMI '+j);
					return false;	
					}
			}
			}
			
			 
			 document.getElementById('save_indexing').submit();
					 
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
				 
                        <a href="../../ownerAgreementList/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
                        <a href="../../ownerAgreementList/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir">Agreement</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please provide agreement detail</a></div>
					 
					 
						 
						<div class="on_clmn brdb marb5">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Complete your sale" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
									 <form action="../../addPurchaseAgreement/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
									 
									  <div class="on_clmn padt10">
								 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Owner</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									 
									<div class="wi_100 pos_rel">
								 <Select  name="owner_id" id="owner_id" class="css-bnguuq dropdown-bg" onchange="getOwnerInformation(this.value);">
								 	<option value="0"  >Select</option>
											<?php  
										foreach($completeOwnerList as $category => $value) 
												{
													
													
												?> 
												<option value="<?php echo $value['id']; ?>"  ><?php echo $value['first_name'].' '.$value['last_name']; ?></option>
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
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Company bank account</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									 
									<div class="wi_100 pos_rel">
								 <Select  name="bank_account_id" id="bank_account_id" class="css-bnguuq dropdown-bg" onchange="getOwnerInformation(this.value);">
								 	<option value="0"  >Select</option>
											<?php  
										foreach($bankAccountList as $category => $value) 
												{
													
													
												?> 
												<option value="<?php echo $value['id']; ?>"  ><?php echo $value['account_number']; ?></option>
												<?php } ?>
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
							
									 <script>
									 function getOwnerInformation(id)
									 {
										var optionAvailable='<option value="0">Select</option>';
										if(id==0)
										{
											$('#objectSelectInfo').addClass('hidden');
											$('#owner_object_type').val(0);
											$('#entryAndPrice').html('');
											$('#objectDetail').addClass('hidden');
											$('#object_id').html(optionAvailable);
										}
										else
										{
										var send_data={};
										send_data.oid=id;
										 
										$.ajax({
											type:"POST",
											url:"../../getOwnerInformation",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												if(data1<3)
												{
												$('#objectSelectInfo').addClass('hidden');
												$('#owner_object_type').val(data1);	
												var send_data={};
												send_data.oid=data1;
												 
												$.ajax({
													type:"POST",
													url:"../../getObjectInformation/<?php echo $data['bid']; ?>",
													data:send_data,
													dataType:"text",
													contentType: "application/x-www-form-urlencoded;charset=utf-8",
													success: function(data1){
														 
														$('#objectDetail').removeClass('hidden');	
														$('#object_id').html(data1);
														$('#entryAndPrice').html(''); 
													}
												});	
												}
												else
												{
												$('#objectSelectInfo').removeClass('hidden');	
												$('#owner_object_type').val(0);
												$('#entryAndPrice').html('');
												}
											}
										});	
										}	
									 }
									 </script>
									 
									 <div class="on_clmn padt10 hidden" id="objectSelectInfo">
								 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Object type</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									 
									<div class="wi_100 pos_rel">
								 <Select  name="owner_object_type" id="owner_object_type" class="css-bnguuq dropdown-bg" onchange="getObjectInformation(this.value);">
								 	<option value="0"  >Select</option>
									<option value="1"  >Apartment</option>	 
									<option value="2"  >Parking</option>	 
											</Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
										<script>
										function getObjectInformation(id)
										{
											var optionAvailable='<option value="0">Select</option>';
											if(id==0)
											{
												$('#objectDetail').addClass('hidden');	
												$('#object_id').html(optionAvailable);
												$('#entryAndPrice').html('');
											}
											else
											{
											var send_data={};
											send_data.oid=id;
											 
											$.ajax({
												type:"POST",
												url:"../../getObjectInformation/<?php echo $data['bid']; ?>",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													 
													$('#objectDetail').removeClass('hidden');	
													$('#object_id').html(data1);
													 $('#entryAndPrice').html('');
												}
											});	
											}
											
										}
										
										
										function getSelectedObjectInformation(id)
										{
											var optionAvailable='<option value="0">Select</option>';
											if(id==0)
											{
												$('#entryAndPrice').html('');
											}
											else
											{
											var send_data={};
											send_data.oid=id;
											send_data.object_type=$('#owner_object_type').val();
											$.ajax({
												type:"POST",
												url:"../../getSelectedObjectInformation",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													 
													$('#entryAndPrice').html(data1);
													 
												}
											});	
											}
											
										}
										</script>
							
							
									 <div class="on_clmn padt10 hidden" id="objectDetail">
								 
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Object detail</span> 
													 </div>
												</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									 
									<div class="wi_100 pos_rel">
								 <Select  name="object_id" id="object_id" class="css-bnguuq dropdown-bg" onchange="getSelectedObjectInformation(this.value);">
								 	<option value="0"  >Select</option>
									 </Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
							
									 
									  <div id="entryAndPrice">
									  </div>
									  
									  <!-- here vat is monthly fee -->
					<input type="hidden" value="1" id="vat_applicable" name="vat_applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If they have a monthly fee(after entry)?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateMonthlyFee(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
									
									<div class="column_m container  marb5   fsz14 dark_grey_txt " id="VatInfo">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Monthly fee</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number" id="total_vat" name="total_vat" class="css-xt766" value="0" />
								
								 </div>
								   
									</div> 
										
										
							<input type="hidden" value="1" id="paid_in_full" name="paid_in_full" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If the payment is made in full in advance ?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updatePaidInfull();" >
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<script>
										function updatePaidInfull()
										{
											paidInFull=1;
										}
										</script>
									
									<div class="hidden" id="paymentEmis">
									<input type="hidden" value="0" id="deposit_fee_applicable" name="deposit_fee_applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb " >	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If deposit fee is applicable?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  depositRequired " onclick="updateDeposit();" >
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div class="hidden" id="depositFee">
										<div class="on_clmn padt10">
										<div class="thr_clmn  wi_35 padr5">
										<div class="pos_rel talc">
										<div class="column_m container  marb5   fsz14 dark_grey_txt ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Deposit fee</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number" id="deposit_fee" name="deposit_fee" class="css-xt766" value="0" min="0">
								
								 </div>
								   
									</div>
									</div>
									</div>
									<div class="thr_clmn  wi_35 padrl5">
										<div class="pos_rel talc">
										<div class="column_m container  marb5   fsz14 dark_grey_txt ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Payment date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date" id="deposit_fee_payment_date" name="deposit_fee_payment_date" class="css-xt766" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
								
								 </div>
								   
									</div>
									</div>
									</div>
									
									<div class="thr_clmn  wi_30 padl5">
										<div class="pos_rel talc">
										<div class="column_m container  marb5   fsz14 dark_grey_txt ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Payment term</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <select class="css-bnguuq dropdown-bg" name="deposit_payment_term" id="deposit_payment_term">
											        
											  				
															<option value="5" class="lgtgrey2_bg" selected="">5 days</option>
															<option value="10" class="lgtgrey2_bg">10 days</option>
															<option value="15" class="lgtgrey2_bg">15 days</option>
															<option value="30" class="lgtgrey2_bg">30 days</option>
															
												 											
														 
											</select>
								
								 </div>
								   
									</div>
									</div>
									</div>
									
									</div>
									</div>
									<input type="hidden" value="1" id="remaining_fee_paid_in_full" name="remaining_fee_paid_in_full" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb" >	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If remaining fee is paid in full" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  remaining_fee_paid checked" onclick="updateRemaining();" >
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div class='hidden' id='fullPayment'>
										<div class="column_m container  marb5   fsz14 dark_grey_txt " id="totalEmis">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">How many EMIs ?</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="number" id="total_emis" name="total_emis" class="css-xt766" value="1" min="1" onblur="getEmiInfo(this.value);">
								
								 </div>
								   
									</div>
									
									
									<script>
									function getEmiInfo(id)
									{
												var send_data={};
												send_data.id=id;
												 
												$.ajax({
													type:"POST",
													url:"../../getEmiInfo",
													data:send_data,
													dataType:"text",
													contentType: "application/x-www-form-urlencoded;charset=utf-8",
													success: function(data1){
														 
														$('#emiData').removeClass('hidden');	
														$('#emiData').html(data1);
														 
													}
												});		
									}
									</script>
									
										<div class="hidden" id='emiData'>
										</div>
										
										 
											<input type="hidden" value="1" id="invoice_date_same" name="invoice_date_same" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb hidden">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If invoice date for EMI is same as for monthly fee for all?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright invoiceDateSelect  checked" onclick="updateInvoiceInfo();" >
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
										<div class="column_m container  marb5   fsz14 dark_grey_txt hidden" id="invoiceDateInfo">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">InvoiceDate</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 
								<select name="invoice_date" id="invoice_date" class="css-bnguuq dropdown-bg">
								 	<?php for($i=1;$i<=28;$i++)
															{ ?>
															<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($i==$buildingDetailInfo['invoice_date']) echo 'selected'; ?>><?php echo $i; ?></option>
															<?php } ?> 
									 </select>
								 </div>
								   
									</div>
									
										
										</div>
										
										<input type="hidden" value="1" id="discount_applicable" name="discount_applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If discount is applicable on early payment ?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateDiscount();" >
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 	<div class="column_m container  marb5   fsz14 dark_grey_txt " id="totalDiscount">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Discount applicable(%)</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 
								<select name="total_discount" id="total_discount" class="css-bnguuq dropdown-bg">
								 	<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option> 
									 </select>
								 </div>
								   
									</div>
									

										</div>
										
										<script>
										function updateInvoiceInfo()
										{
											invoiceDateInfo=1;
										}
										function updateDeposit()
										{
											updateDepositFee=1;
										}
										function updateRemaining()
										{
											remainingPayment=1;
										}
										function updateDiscount()
										{
											discountInfo=1;
										}
										</script>
										
										 
										<input type="hidden" value="1" id="charge_applicable" name="charge_applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If extra charge is applicable on late payment ?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateCharge();" >
																<input type="checkbox"  class="default" data-true="" data-false="" >
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<script>
										function updateCharge()
										{
											chargeInfo=1;
										}
										</script>
										
										<div class="column_m container  marb5   fsz14 dark_grey_txt " id="totalCharge">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">Extra charge applicable(%)</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 
								<select name="total_charge" id="total_charge" class="css-bnguuq dropdown-bg">
								 	<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option> 
									 </select>
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