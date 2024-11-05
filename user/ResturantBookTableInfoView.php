<!doctype html>
<?php
	 $path1 = "../../../../html/usercontent/images/";
	 ?>

<html>
	
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_time.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
		
		
		<script>
		function upadteDate()
		{
			$("#booking_date").val('');
			$("#time_detail").val('');
			$("#timeInfo").html('');
			
		}
			function submitDepartment()
			{
				
				$("#errorMsg").html('');
				if($("#booking_date").val()=='' || $("#booking_date").val()==null)
				{
				$("#errorMsg").html('please select date of booking');	
				return false;
				}
				if($("#time_detail").val()=='' || $("#time_detail").val()==null)
				{
				$("#errorMsg").html('please select a time slot to book a table');	
				return false;
				}
				
					document.getElementById('save_indexing').submit();
				
				
			}
			
			function getTime()
			{
				$("#errorMsg").html('');
				var send_data={};
				send_data.dining_hall=$('#dining_hall').val();
				send_data.serve_type=$('#serve_type').val();
				send_data.company_size=$('#company_size').val();
				send_data.booking_date=$('#booking_date').val();
				$.ajax({
					type:"POST",
					url:"../getTime/<?php echo $data['rid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1)
					{
						if(data1==0)
						{
						$("#errorMsg").html('Serve type is not available on selected day!!');	
						return false;	
						}
						else if(data1==1)
						{
						$("#errorMsg").html('Please enter less number of person or select other date!!');	
						return false;	
						}
						$("#timeInfo").removeClass('hidden');
						document.getElementById("timeInfo").innerHTML=data1;
					}
				}
				});
			}
			function addType(id)
			{
				var getValue=$('#time_detail').val();
					$('#'+getValue).addClass('green_bg');
					$('#'+getValue).removeClass('red_ff2828_bg');
					$('#'+id).removeClass('green_bg');
					$('#'+id).addClass('red_ff2828_bg');		
					$("#time_detail").val(id);
			}
			
			 
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		
			<!-- HEADER -->
	<div class="column_m header   bs_bb   hidden-xs hidden-xsi">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p  " style="padding: 10px 0px 0px 0px;">
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
			
			
		 	
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs visible-xsi">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm visible-xsi fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p padt10">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm visible-xsi fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="#" class="lgn_hight_s1 fsz25"><span class="fas fa-bars" aria-hidden="true"></span></a>
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
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						 
					 
					 <div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Booking</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please enter details for table booking</a></div>
						
						
						<div class="padb0 xxs-padb0   marb5">
							
								<div class="container padrl0 xs-padrl0  padb10">
							
							<div class="marrla xs-wi_100">
								
								<form action="../requestTableBooking/<?php echo $data['rid']; ?>" name="save_indexing" id="save_indexing" method="POST" >
									<div class="marb0 padb10 ">
										
										<div class="on_clmn   mart10  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Location" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										
									<div class="on_clmn">
											<div class="pos_rel">
												
												<select name="dining_hall" id="dining_hall"  class="txtind10 default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir black_txt" onchange="upadteDate();"> 
												<option value="0">Select</option>
												<?php    foreach($resturantDiningHall as $category => $value) 
														{
															 
														?>
												<option value="<?php echo $value['id']; ?>"><?php echo $value['dining_hall_name']; ?></option>
														<?php } ?>
													</select>
												
											 
											</div>
										</div>
										
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Serve type" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										
									<div class="on_clmn">
											<div class="pos_rel">
												
												<select name="serve_type" id="serve_type"  class="wi_100 dropdown-bg  lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir  " onchange="upadteDate();"> 
											 <?php echo $resturantWorkInfo; ?>	
													</select>
												
											 
											</div>
										</div>
										
									
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Company size" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<select name="company_size" id="company_size"  class="wi_100 dropdown-bg  lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir  " onchange="upadteDate();"> 
											  <option value="1">1 </option>
											  <option value="2">2 </option>
											  <option value="3">3 </option>
											  <option value="4">4 </option>
											  <option value="5">5 </option>
											  <option value="6">6 </option>
											  <option value="7">7 </option>
											  <option value="8">8 </option>
											  <option value="9">9 </option>
											  <option value="10">10 </option>	
											  <option value="11">11 </option>
											  <option value="12">12 </option>
											  <option value="13">13 </option>
											  <option value="14">14 </option>
											  <option value="15">15 </option>
													</select>
												
												
											 
											</div>
											 
											</div>
										 
										
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Date" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										
									<div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="date" name="booking_date" id="booking_date"  class="wi_100 lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" min="<?php echo date("Y-m-d", time() + 86400); ?>" onchange="getTime();"/> 
											 	 
											 
											</div>
										</div>
										
									<div class="clear"></div>
										 
										<div id="timeInfo" class="hidden mart20">
										</div>										
											
										 <input type="hidden" id="time_detail" name="time_detail" value="" />
											
										</div>
									
									<div class="clear"></div>
									<div id="errorMsg" class="red_txt fsz20 talc"></div>	
									</div>
									
									<div class="talc padt20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitDepartment();"><input type="button" value="Send request" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
									
									</form>
								
							</div>
							
						</div>
					
							
							
							<div class="clear"></div>
						</div>
							 
									
								
					 
			</div>
			
			
			<!-- CONTENT -->
	 
		 
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	 <div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey_bg fsz14 brdrad10 popup_shadow" id="gratis_popup_delete">
		<div class="modal-content nobrdb talc box_shadox brdradtr10  lgtgrey_bg">
			
			
			<div class="pad25 lgtgrey_bg brdradtr10">
				<img src="../../../../../html/usercontent/images/kitten_1.jpg" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Are you Sure?</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">All available dishes in the menu will also be deleted. </span>
				</div>
				
				
			</div>
			
			<form action="../../deleteCategory/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" name="save_indexing2" id="save_indexing2" method="POST" >
			<input type="hidden" name="category_id" id="category_id" />
				</form>
			<div class="on_clmn padtb10">
				<a href="#" onclick="confirmCategoryDelete();"><input type="button" value="Confirm" class="wi_300p maxwi_100   hei_50p diblock nobrd red_ff2828_bg fsz18 white_txt curp bold close_popup_modal"></a>
				
			</div>
			
			<div class="on_clmn padt0">
				<input type="button" value="Close" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold">
				
			</div>
			 
	</div>
	
	</div>
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
 </body>

</html>