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
	function addType(id)
	{
		var getValue=$('#bedding_type').val();
		if($('#'+id).hasClass('green_bg'))
		{
			$('#'+id).removeClass('green_bg');
			$('#'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#bedding_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_bg');
			$('#'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#bedding_type").val(getValue);
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
		function changeDetail(id)
		{
			if(id==1)
			{
			$("#late_checkout_info").attr('style','display:block');
			}
			else
			{
			$("#late_checkout_info").attr('style','display:none');	
			}
			 
		}
		
		function changeDetailCharge(id)
		{
			if(id==1)
			{
			$("#fixedCharge").attr('style','display:block');
			$("#PercentCharge").attr('style','display:none');
			}
			else if(id==2)
			{
			$("#fixedCharge").attr('style','display:none');
			$("#PercentCharge").attr('style','display:block');
			}
			else
			{
			$("#fixedCharge").attr('style','display:none');
			$("#PercentCharge").attr('style','display:none');
			}
			 
		}
		
		function submitform()
		{
			
			$("#errorMsg1").html('');
			 
			
				if($("#check_in").val()=='' || $("#check_in").val()==null)
				{
					
					$("#errorMsg1").html('Please enter normal check in time');
					return false;
				}
			   
				if($("#check_out").val()=='' || $("#check_out").val()==null)
				{
					
					$("#errorMsg1").html('Please enter normal check out time');
					return false;
				}
			   
				if($("#late_checkout").val()==0)
				{
					
					$("#errorMsg1").html('Please select if late check out available or not');
					return false;
				}
				
				if($("#late_checkout").val()==1)
				{
					
				if($("#late_checkout_time").val()=='' || $("#late_checkout_time").val()==null)
				{
					
					$("#errorMsg1").html('Please enter late check out time');
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
	<body class="white_bg">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/HotelStay/roomsList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/HotelStay/roomsList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  >Check-in</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please provide the Check in & out policy.</a></div>
					 
			 
					  
							
							<form action="../../addCheckInInfo/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											
											 
											
											 
											
											 <div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<input type="time" name="check_in" id="check_in" value="<?php if(!empty($hotelCheckInDetailInfo)) echo $hotelCheckInDetailInfo['checkin_time']; ?>"   class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828  talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt  ffamily_avenir"   /> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<input type="time" name="check_out" id="check_out" value="<?php if(!empty($hotelCheckInDetailInfo)) echo $hotelCheckInDetailInfo['checkout_time']; ?>"  class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  /> 
												
											</div>
											</div>
										</div>
										
									
											
								 
									 
								 </div>
								 
								
								<div class="on_clmn mart20 ">
								 
											<div class="pos_rel">
												
												<select name="late_checkout" id="late_checkout"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;" onchange="changeDetail(this.value);"> 
											 <option value="0">Late checkout available</option> 
													 
													<option value="1" class="lgtgrey2_bg" <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['late_checkout_available']==1) echo 'selected'; } ?>>Yes</option>
													 <option value="2" class="lgtgrey2_bg" <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['late_checkout_available']==2) echo 'selected'; } ?> >No</option>
											</select>
												
											</div>
											 
											 
											
										</div>
										
										 
										
										 <div id="late_checkout_info" style="display:<?php if(!empty($hotelCheckInDetailInfo)){ if($hotelCheckInDetailInfo['late_checkout_available']==1) echo 'block'; else echo 'none'; } else echo 'none'; ?>">
											
											<div class="on_clmn mart20 " >
								 
											<div class="pos_rel">
												
												<input type="time" name="late_checkout_time" id="late_checkout_time"  value="<?php if(!empty($hotelCheckInDetailInfo)) echo $hotelCheckInDetailInfo['late_checkout_time']; ?>" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											</div>
											 
											 
										</div>
									 
									 	 <div class="on_clmn mart20 ">
								 
											<div class="pos_rel">
												
												<select name="late_checkout_charge" id="late_checkout_charge"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;" onchange="changeDetailCharge(this.value);"> 
											 <option value="0" <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['late_checkout_charge']==0) echo 'selected'; } ?>>Free</option> 
													 
													<option value="1" class="lgtgrey2_bg" <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['late_checkout_charge']==1) echo 'selected'; } ?>>Fixed</option>
													 <option value="2" class="lgtgrey2_bg" <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['late_checkout_charge']==2) echo 'selected'; } ?>>Percentage</option>
											</select>
												
											</div>
											 
											 
											
										</div>	
										
										<div class="on_clmn mart20 " id="fixedCharge" style="display:<?php if(!empty($hotelCheckInDetailInfo)){ if($hotelCheckInDetailInfo['late_checkout_charge']==1) echo 'block'; else echo 'none'; } else echo 'none'; ?>">
								 
											<div class="pos_rel">
												
												<input type="number" name="fixed_charge" id="fixed_charge"  value="<?php if(!empty($hotelCheckInDetailInfo)) echo $hotelCheckInDetailInfo['fixed_charge']; else echo '0'; ?>" min="0" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											</div>
											 
											 
										</div>
									  <div class="on_clmn mart20 "  id="PercentCharge" style="display:<?php if(!empty($hotelCheckInDetailInfo)){ if($hotelCheckInDetailInfo['late_checkout_charge']==2) echo 'block'; else echo 'none'; }  else echo 'none'; ?>">
								 
											<div class="pos_rel">
												
												<select name="percent_charge" id="percent_charge"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;"  > 
											  
											 <option value="10" class="lgtgrey2_bg" <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==10) echo 'selected'; } ?>>10%</option>
													 <option value="20" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==20) echo 'selected'; } ?>>20%</option>
													 <option value="30" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==30) echo 'selected'; } ?>>30%</option>
													 <option value="40" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==40) echo 'selected'; } ?>>40%</option>
													 <option value="50" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==50) echo 'selected'; } ?>>50%</option>
													 <option value="60" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==60) echo 'selected'; } ?>>60%</option>
													 <option value="70" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==70) echo 'selected'; } ?>>70%</option>
													 <option value="80" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==80) echo 'selected'; } ?>>80%</option>
													 <option value="90" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==90) echo 'selected'; } ?>>90%</option>
													 <option value="100" class="lgtgrey2_bg"  <?php if(!empty($hotelCheckInDetailInfo)){if($hotelCheckInDetailInfo['percent_charge']==100) echo 'selected'; } ?>>100%</option>
											</select>
												
											</div>
											 
											 
											
										</div>	
										</div>
										 <input type="hidden" id="indexing_save" name="indexing_save" value="<?php if(!empty($hotelCheckInDetailInfo)) echo $hotelCheckInDetailInfo['id']; else echo '0'; ?>" />
										   <div class="clear"></div>
								<div class="red_txt fsz20 talc mart35" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	</body>
	<?php 
		if(isset($_GET['error']))
		{
			if($_GET['error']==1)
			{
				echo '<script>alert("Some error occured while completing your request !!!")</script>';	
			}
			else if($_GET['error']==2)
			{
				echo '<script>alert("You have an active employee for the same email !!!")</script>';	
			}
		}
	?>							