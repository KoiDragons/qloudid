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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
	<script>
	function updateVerifyEmail(id,link)
   {
	   verifyEmailYes=id;
	  
   }
   
	function updateVerifyPhone(id,link)
   {
	   verifyPhoneYes=id;
	  
   }
	function updatePhone(id,link)
   {
	   phoneYes=id;
	  
   }
   function updateIdentify(id,link)
   {
	   identifyYes=id;
	  
   }
   function updateDelivery(id,link)
   {
	   deliveryYes=id;
	  
   }
   function updateCard(id,link)
   {
	   cardYes=id;
	  
   }
   
   function updateInvoice(id,link)
   {
	   invoiceYes=id;
	  
   }
   
   function updateDigital(id,link)
   {
	   digitalYes=id;
	  
   }
   
   function updatePickup(id,link)
   {
	   pickupYes=id;
	  
   }
   function updateCompanyInvoice(id,link)
   {
	   companyinvoiceYes=id;
	  
   }
   
   function updateCompanyDigital(id,link)
   {
	   companydigitalYes=id;
	  
   }
   
   function updateCompanyPickup(id,link)
   {
	   companypickupYes=id;
	  
   }
   
   function updateCompanyEmail(id,link)
   {
	   companyEmailYes=id;
	  
   }
   
   
	function addType(id)
	{
		var getValue=$('#payment_type').val();
		if($('#'+id).hasClass('green_98ce44'))
		{
			$('#'+id).removeClass('green_98ce44');
			$('#'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#payment_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_98ce44');
			$('#'+id).removeClass('lgtgrey_bg');		
			getValue=getValue+id+',';
			$("#payment_type").val(getValue);
		}
		
	}
	 
		function checkFlag()
		{
			if($(".popupShow").hasClass('active'))
			{
				$(".popupShow").removeClass('active')
				$(".popupShow").attr('style','display:none');
			}
			
		}
		 
		function submitform()
		{
			
			 
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
				 
				
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
				
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 
					 
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Signup</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Fileds required for signup with your eshop</a></div>
					 
					 
							
							<form action="../updateCorporateFieldsinfo/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
									 	 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Country" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<input type="text" value="Mandatory" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
											</div>
											</div>
											 
									 

										</div>
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="First name" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<input type="text" value="Mandatory" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
											</div>
											</div>
											 
									 

										</div>
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Last name" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<input type="text" value="Mandatory" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
											</div>
											</div>
											 
									 

										</div>
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Personal email" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<input type="text" value="Mandatory" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
											</div>
											</div>
											 
									 

										</div>
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company name" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<input type="text" value="Mandatory" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
											</div>
											</div>
											 
									 

										</div>
										
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company identification number" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<input type="text" value="Mandatory" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
											</div>
											</div>
											 
									 

										</div>
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Your role" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<input type="text" value="Mandatory" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
											</div>
											</div>
											 
									 

										</div>
										
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company delivery address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<input type="text" value="Mandatory" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
											</div>
											</div>
											 
									 

										</div>
										
										 <input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['verify_email']; else echo 1; ?>" id="verify_email" name="verify_email" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
																			
									 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to verify email (We recommend not to verify as it will be on restore account)" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['verify_email']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateVerifyEmail(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['phone_detail']; else echo 1; ?>" id="phone_detail" name="phone_detail" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
																			
									 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Phone number" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['phone_detail']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updatePhone(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <div class="<?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['phone_detail']==0){ echo 'hidden'; } else echo '';  } else echo 'hidden'; ?>" id="ifVerifyPhone">
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['verify_phone_detail']; else echo 1; ?>" id="verify_phone_detail" name="verify_phone_detail" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
																			
									 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to verify Phone number" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['verify_phone_detail']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateVerifyPhone(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										</div>
										

										</div>
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['identificator_info']; else echo 1; ?>" id="identificator_info" name="identificator_info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Identificator" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['identificator_info']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateIdentify(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['card_detail']; else echo 1; ?>" id="card_detail" name="card_detail" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
										
										 	 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Credit card info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['card_detail']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateCard(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
											<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['delivery_address']; else echo 1; ?>" id="delivery_address" name="delivery_address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
											
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Delivery address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['delivery_address']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateDelivery(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>	
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['invoice_address']; else echo 1; ?>" id="invoice_address" name="invoice_address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Invoice address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['invoice_address']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateInvoice(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['pickup_info']; else echo 1; ?>" id="pickup_info" name="pickup_info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Pickup info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['pickup_info']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updatePickup(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['digital_delivery']; else echo 1; ?>" id="digital_delivery" name="digital_delivery" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
										
										
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Degital delivery" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['digital_delivery']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateDigital(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['company_email']; else echo 1; ?>" id="company_email" name="company_email" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company email" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['company_email']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateCompanyEmail(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['company_invoice_address']; else echo 1; ?>" id="company_invoice_address" name="company_invoice_address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company invoice address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['company_invoice_address']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateCompanyInvoice(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['company_pickup_info']; else echo 1; ?>" id="company_pickup_info" name="company_pickup_info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company Pickup info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['company_pickup_info']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateCompanyPickup(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<input type="hidden" value="<?php if(!empty($signUpFielsDetail)) echo $signUpFielsDetail['company_digital_delivery']; else echo 1; ?>" id="company_digital_delivery" name="company_digital_delivery" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" /> 
										
										
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company Degital delivery" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($signUpFielsDetail)) { if($signUpFielsDetail['company_digital_delivery']==1) echo 'checked'; else echo ''; } else echo 'checked'; ?>" onclick="updateCompanyDigital(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Information url" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="company_website" id="company_website" value="<?php if(!empty($signUpFielsDetail)) { echo $signUpFielsDetail['information_url']; }  ?>" placeholder="URL" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											 
											</div>
											 
											</div>
										
								 			 
										 <input type="hidden" id="indexing_save" name="indexing_save" />
								<div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Update" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	</body>
	 						