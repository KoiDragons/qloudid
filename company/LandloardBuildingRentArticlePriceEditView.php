
<!doctype html>
<html class="home">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Qmatchup</title>
	<!--<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
	 
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script>
	//var indexVal=1;
	
	 		 
			function changeCustom(id1)
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
	 function addType(id1)
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
			if($("#title").val()=='' || $("#title").val()==null)
			{
				
				$("#errorMsg1").html('Please enter price title');
				return false;
			}
			if($("#deposit_amount").val()=='' || $("#deposit_amount").val()==null || $("#deposit_amount").val()==0)
			{
				
				$("#errorMsg1").html('Please enter deposit amount');
				return false;
			}
			if(isNaN($("#deposit_amount").val()))
			{
				$("#errorMsg1").html('Please enter numeric value for deposit amount');
				return false;	
			}
			
			if($("#price").val()=='' || $("#price").val()==null || $("#price").val()==0)
			{
				
				$("#errorMsg1").html('Please enter price');
				return false;
			}
			if(isNaN($("#price").val()))
			{
				$("#errorMsg1").html('Please enter numeric value for price');
				return false;	
			}
			 
			document.getElementById('save_indexing').submit();
			}
		
		 
	 
			 
 			
				 
	</script>
</head>

	<body>
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../listPricing/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../../listPricing/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					 
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					 
							
							<form action="../../../updatePricePlan/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>/<?php echo $data['id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 <div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz100 xxs-fsz30 xxs-lgn_hight_45 padb10 xs-padb0 black_txt trn" style="
												font-family: Avenir;
											">Price</h1>
									</div>
									<div class="mart20 xs-mart0 xs-marb20 marb35  xxs-tall talc xs-padb15  "> <a href="#" class="black_txt fsz25 xxs-tall xxs-lgn_hight_20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn">Please update your pricing details here.</a></div>
								<div class="marb0 padtrl0">		 
											 <div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="title" id="title" value="<?php echo $servicePriceDetail['price_title']; ?>" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25"/> 
												<label for="title0" class="floating__label tall nobold" data-content="Pricing title" >
											<span class="hidden--visually">
											 Pricing title</span></label>
											</div>
										 
											 
										</div>
										
										 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="price_model" id="price_model">
											        
											  													
															<option value="1" class="lgtgrey2_bg">Standard pricing</option>
												 											
														 
											</select>
											 	
											  <label for="price_model" class="floating__label tall nobold padl10" data-content="Pricing model">
											<span class="hidden--visually">
											  Pricing model</span></label>
											</div>
											 
											</div>
											
											
											 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="invoice_date" id="invoice_date">
											        
											  				<?php for($i=1;$i<=28;$i++)
															{ ?>
															<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($i==$servicePriceDetail['invoice_date']) echo 'selected'; ?>><?php echo $i; ?></option>
															<?php } ?> 
												 											
														 
											</select>
											 	
											  <label for="invoice_date" class="floating__label tall nobold padl10" data-content="Invoice date">
											<span class="hidden--visually">
											  Invoice date</span></label>
											</div>
											 
											</div>
											
											
											 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="payment_term" id="payment_term">
											        
											  				
															<option value="5" class="lgtgrey2_bg" <?php if($servicePriceDetail['payment_term']==5) echo 'selected'; ?>>5 days</option>
															<option value="10" class="lgtgrey2_bg" <?php if($servicePriceDetail['payment_term']==10) echo 'selected'; ?>>10 days</option>
															<option value="15" class="lgtgrey2_bg" <?php if($servicePriceDetail['payment_term']==15) echo 'selected'; ?>>15 days</option>
															<option value="30" class="lgtgrey2_bg" <?php if($servicePriceDetail['payment_term']==30) echo 'selected'; ?>>30 days</option>
															
												 											
														 
											</select>
											 	
											  <label for="payment_term" class="floating__label tall nobold padl10" data-content="Payment term">
											<span class="hidden--visually">
											  Payment term</span></label>
											</div>
											 
											</div>
											
											
											 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="payment_tax" id="payment_tax">
											        
											  				
															<?php for($i=1;$i<=25;$i++)
															{ ?>
															<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($i==$servicePriceDetail['payment_tax']) echo 'selected'; ?>><?php echo $i; ?></option>
															<?php } ?> 
															
												 											
														 
											</select>
											 	
											  <label for="payment_tax" class="floating__label tall nobold padl10" data-content="Tax(%)">
											<span class="hidden--visually">
											  Payment term</span></label>
											</div>
											 
											</div>
											
										 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="number" name="deposit_amount" id="deposit_amount"   placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=200 value="<?php echo $servicePriceDetail['deposit_amount']; ?>" /> 
												<label for="deposit_amount" class="floating__label tall nobold" data-content="Deposit amount" >
											<span class="hidden--visually">
											Deposit amount</span></label>
											</div>
										 
											 
										</div>
										
										 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="number" name="price" id="price" value="<?php echo $servicePriceDetail['price']; ?>" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=200 /> 
												<label for="price" class="floating__label tall nobold" data-content="Price/m2" >
											<span class="hidden--visually">
											Price</span></label>
											</div>
										 
											 
										</div>
										
										
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " >
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" id="oneTime" value="One time" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($servicePriceDetail['subscription_info']==1) echo 'green_bg'; else echo 'red_ff2828_bg'; ?> fsz18 white_txt curp ffamily_avenir " onclick="addType(1);" >
														</div>
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="Recurring" id="subs" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd <?php if($servicePriceDetail['subscription_info']==2) echo 'green_bg'; else echo 'red_ff2828_bg'; ?> fsz18 white_txt curp ffamily_avenir" onclick="addType(2);" >
														</div>
														</div>
										
											 <div class="on_clmn mart20  <?php if($servicePriceDetail['subscription_info']==1) echo 'hidden'; ?>" id="recurr">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_type" id="recurring_type" onchange="changeCustom(this.value);">
											       <!--<option value="1" class="lgtgrey2_bg" <?php if($servicePriceDetail['recurring_type']==1) echo 'selected'; ?>>Hourly</option>
												<option value="2" class="lgtgrey2_bg" <?php if($servicePriceDetail['recurring_type']==2) echo 'selected'; ?>>Daily </option>
											<option value="3" class="lgtgrey2_bg" <?php if($servicePriceDetail['recurring_type']==3) echo 'selected'; ?>>Weekly</option>-->
											<option value="4" class="lgtgrey2_bg" <?php if($servicePriceDetail['recurring_type']==4) echo 'selected'; ?>>Monthly</option>		
											<!--<option value="5" class="lgtgrey2_bg" <?php if($servicePriceDetail['recurring_type']==5) echo 'selected'; ?>>Every 3 Month</option>	
											<option value="6" class="lgtgrey2_bg" <?php if($servicePriceDetail['recurring_type']==6) echo 'selected'; ?>>Every 6 Month</option>	
											<option value="7" class="lgtgrey2_bg" <?php if($servicePriceDetail['recurring_type']==7) echo 'selected'; ?>>Yearly</option>											
											<option value="8" class="lgtgrey2_bg" <?php if($servicePriceDetail['recurring_type']==8) echo 'selected'; ?>>Custom</option>-->					 
											</select>
											 	
											  <label for="recurring_type0" class="floating__label tall nobold padl10" data-content="Subscription type">
											<span class="hidden--visually">
											  Subscription type</span></label>
											</div>
											</div>
											<div id="customData" class="<?php if($servicePriceDetail['recurring_type']==8) echo ''; else echo 'hidden'; ?>">
											 <div class="thr_clmn  wi_15 padl10">
											<input type="text"  value="Every" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " readonly /> 
											 
											</div>
											 <div class="thr_clmn  wi_10 padl10">
											<input type="number"  id="total_time" name="total_time" value="<?php echo $servicePriceDetail['custom_time']; ?>" min=1 class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " /> 
											 
											</div>
											
											<div class="thr_clmn  wi_25 padl10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_typec" id="recurring_typec">
											       <option value="1" class="lgtgrey2_bg" <?php if($servicePriceDetail['custom_cycle']==1) echo 'selected'; ?>>Hourly</option>
												<option value="2" class="lgtgrey2_bg" <?php if($servicePriceDetail['custom_cycle']==2) echo 'selected'; ?>>Daily </option>
											<option value="3" class="lgtgrey2_bg" <?php if($servicePriceDetail['custom_cycle']==3) echo 'selected'; ?>>Weekly</option>
											<option value="4" class="lgtgrey2_bg" <?php if($servicePriceDetail['custom_cycle']==4) echo 'selected'; ?>>Monthly</option>		
											<option value="7" class="lgtgrey2_bg" <?php if($servicePriceDetail['custom_cycle']==7) echo 'selected'; ?>>Yearly</option>											
											 			 
											</select>
											 	
											   
											</div>
											</div>
											</div>
										 </div>
										<input type="hidden" name="subscription_info" id="subscription_info" class="subscription_info" value="<?php echo $servicePriceDetail['subscription_info']; ?>" />				
								 
								
								  	
						
						   <div class="clear"></div>
	 
	 				 
							<div id="moreData">
							</div>

	 

										 
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Update</button></a> </div>
							
						</div>
						</div>
						
					</div> 
		 
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
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
</html>
