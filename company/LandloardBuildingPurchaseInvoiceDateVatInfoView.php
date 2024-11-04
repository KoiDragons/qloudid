
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
	function updateParkingTax(id,id1)
	{
		parkingTax=1;
	}
	function updateApartmentTax(id,id1)
	{
		apartmentTax=1;
	} 		 
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
                        <a href="../../buildingAddinsInfo/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../buildingAddinsInfo/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
					 
							
							<form action="../../updateInvoiceDates/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 <div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz100 xxs-fsz30 xxs-lgn_hight_45 padb10 xs-padb0 black_txt trn" style="
												font-family: Avenir;
											">Invoice</h1>
									</div>
									<div class="mart20 xs-mart0 xs-marb20 marb35  xxs-tall talc xs-padb15  "> <a href="#" class="black_txt fsz25 xxs-tall xxs-lgn_hight_20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn">Please update your invoice conditions here.</a></div>
								<div class="marb0 padtrl0">		 
											 
										
										 
											
											
											 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="invoice_date" id="invoice_date">
											        
											  				<?php for($i=1;$i<=28;$i++)
															{ ?>
															<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($i==$buildingDetailInfo['invoice_date']) echo 'selected'; ?>><?php echo $i; ?></option>
															<?php } ?> 
												 											
														 
											</select>
											 	
											  <label for="invoice_date" class="floating__label tall nobold padl10" data-content="Invoice date">
											<span class="hidden--visually">
											  Invoice date</span></label>
											</div>
											 
											</div>
											
											
											 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="invoice_payment_term" id="invoice_payment_term">
											        
											  				
															<option value="5" class="lgtgrey2_bg" <?php if($buildingDetailInfo['invoice_payment_term']==5) echo 'selected'; ?>>5 days</option>
															<option value="10" class="lgtgrey2_bg" <?php if($buildingDetailInfo['invoice_payment_term']==10) echo 'selected'; ?>>10 days</option>
															<option value="15" class="lgtgrey2_bg" <?php if($buildingDetailInfo['invoice_payment_term']==15) echo 'selected'; ?>>15 days</option>
															<option value="30" class="lgtgrey2_bg" <?php if($buildingDetailInfo['invoice_payment_term']==30) echo 'selected'; ?>>30 days</option>
															
												 											
														 
											</select>
											 	
											  <label for="payment_term" class="floating__label tall nobold padl10" data-content="Payment term">
											<span class="hidden--visually">
											  Payment term</span></label>
											</div>
											 
											</div>
											
											
											
											<input type="hidden" value="<?php echo $buildingDetailInfo['parking_tax_applicable']; ?>" id="parking_tax_applicable" name="parking_tax_applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb ">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="if they have tax on parking pricing?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   <?php if($buildingDetailInfo['parking_tax_applicable']==1) echo 'checked'; ?>" onclick="updateParkingTax(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
											
											 <div class="on_clmn mart20 <?php if($buildingDetailInfo['parking_tax_applicable']==0) { echo 'hidden'; } ?>" id='prTaxInfo'>
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="parking_payment_tax" id="parking_payment_tax">
											        
											  				
															<?php for($i=1;$i<=25;$i++)
															{ ?>
															<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($i==$buildingDetailInfo['parking_payment_tax']) echo 'selected'; ?>><?php echo $i; ?></option>
															<?php } ?> 
															
												 											
														 
											</select>
											 	
											  <label for="parking_payment_tax" class="floating__label tall nobold padl10" data-content="Tax(%)">
											<span class="hidden--visually">
											   term</span></label>
											</div>
											 
											</div>
											
										  
										
									<input type="hidden" value="<?php echo $buildingDetailInfo['apartment_tax_applicable']; ?>" id="apartment_tax_applicable" name="apartment_tax_applicable" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" />
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="if they have tax on apartment pricing?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   <?php if($buildingDetailInfo['apartment_tax_applicable']==1) echo 'checked'; ?>" onclick="updateApartmentTax(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>	 
										
									 <div class="on_clmn mart20 <?php if($buildingDetailInfo['apartment_tax_applicable']==0) { echo 'hidden'; } ?>" id='apTaxInfo'>
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="apartment_payment_tax" id="apartment_payment_tax">
											        
											  				
															<?php for($i=1;$i<=25;$i++)
															{ ?>
															<option value="<?php echo $i; ?>" class="lgtgrey2_bg" <?php if($i==$buildingDetailInfo['apartment_payment_tax']) echo 'selected'; ?>><?php echo $i; ?></option>
															<?php } ?> 
															
												 											
														 
											</select>
											 	
											  <label for="apartment_payment_tax" class="floating__label tall nobold padl10" data-content="Tax(%)">
											<span class="hidden--visually">
											   term</span></label>
											</div>
											 
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
