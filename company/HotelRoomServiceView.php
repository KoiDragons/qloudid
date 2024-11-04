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
	
	function updateBroad(id,link)
   {
	   broadcast=id;
	  
   }
	 
	
	function addBType(id)
	{
		var getValue=$('#room_service_menu').val();
		if($('#b_'+id).hasClass('green_98ce44'))
		{
			$('#b_'+id).removeClass('green_98ce44');
			$('#b_'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#room_service_menu").val(getValue);
		}
		else
		{
			$('#b_'+id).addClass('green_98ce44');
			$('#b_'+id).removeClass('lgtgrey_bg');		
			getValue=getValue+id+',';
			$("#room_service_menu").val(getValue);
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
			 
			if($("#broadcast_type").val()==0)
			{
				
				document.getElementById('save_indexing').submit();
			}
			else
			{
			if($("#room_service_menu").val()=='')
			{
				
				$("#errorMsg1").html('Please select atleast one dish ');
				return false;
			}	
			
			document.getElementById('save_indexing').submit();
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
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href=".././../../resturantList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href=".././../../resturantList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
				 	<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" >
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" >
								
								
							 		 
							<ul class="dblock marr20 padt250 padl10 fsz18">
									 		
								<li class="dblock padrb10">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10    brdb_black black_txt  padb10"> <span class="valm trn ltr_space" >About</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>	
						
							 
						 
									 
							 						
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_500p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xsi-padrl0 xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Room service</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please select dish availabe for room service at your <?php echo $resturantinfo['resturant_name']; ?></a></div>
					 
					 
							
							<form action="../../../updateRoomservice/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['rid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
									 <div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you offer room service?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($roomServiceInfo['room_service_available']==0) echo ''; else echo 'checked'; ?>" onclick="updateBroad(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div class="<?php if($roomServiceInfo['room_service_available']==0) echo 'hidden'; else echo ''; ?>" id="b_channels">
										 <?php  foreach($completeMenu as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
										<div class="on_clmn   mart10  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="<?php if($value['serve_type']==1) echo 'Breakfast'; else if($value['serve_type']==2) echo 'Brunch'; else if($value['serve_type']==3) echo 'Lunch'; else if($value['serve_type']==4) echo 'Dinner'; else if($value['serve_type']==5) echo 'Beverage'; ?>" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
											 
										<div class="wi_100 maxwi_500p ovfl_hid padt0 brdb ">
										 
										<div class="category-apps email-collab marrbl-2 uppercase fsz12">
										 <?php  foreach($value['category'] as $category => $value1) 
														{
															 
														?>
										 <?php $i=0; foreach($value1['dishes'] as $category => $value2) 
														{
															$category = htmlspecialchars($category); 
														?>
											<a href="javascript:void();" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h  <?php if($value2['is_selected']==0)echo 'lgtgrey_bg'; else echo 'green_98ce44'; ?>  brdr black_txt connect" onclick="addBType(<?php echo $value2['id']; ?>);" id="b_<?php echo $value2['id']; ?>"> <span class="dblock pi1<?php echo $i; ?>"></span><?php echo substr($value2['dish_name'],0,13); ?></a>
														<?php $i++; } } ?>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
														<?php  } ?>
										 		
											 
										<div class="on_clmn   mart10  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Extra charge" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										
									 <div class="on_clmn">
											 
											<div class="pos_rel">
												
												<select name="extra_charge" id="extra_charge"  class="wi_100   lgtgrey_bg txtind10 brd  tall minhei_55p fsz18 llgrey_txt ffamily_avenir" > 
											 <option value="0" <?php if($roomServiceInfo['extra_charge']==0) echo 'selected'; ?>>0%</option> 
											 <option value="1" <?php if($roomServiceInfo['extra_charge']==1) echo 'selected'; ?>>1%</option>
											 <option value="2" <?php if($roomServiceInfo['extra_charge']==2) echo 'selected'; ?>>2%</option>
											 <option value="3" <?php if($roomServiceInfo['extra_charge']==3) echo 'selected'; ?>>3%</option>
											 <option value="4" <?php if($roomServiceInfo['extra_charge']==4) echo 'selected'; ?>>4%</option>
											 <option value="5" <?php if($roomServiceInfo['extra_charge']==5) echo 'selected'; ?>>5%</option>
											 <option value="6" <?php if($roomServiceInfo['extra_charge']==6) echo 'selected'; ?>>6%</option>
											 <option value="7" <?php if($roomServiceInfo['extra_charge']==7) echo 'selected'; ?>>7%</option>
											 <option value="8" <?php if($roomServiceInfo['extra_charge']==8) echo 'selected'; ?>>8%</option>
											 <option value="9" <?php if($roomServiceInfo['extra_charge']==9) echo 'selected'; ?>>9%</option>
											 <option value="10" <?php if($roomServiceInfo['extra_charge']==10) echo 'selected'; ?>>10%</option>
											  <option value="11" <?php if($roomServiceInfo['extra_charge']==11) echo 'selected'; ?>>11%</option>
											 <option value="12" <?php if($roomServiceInfo['extra_charge']==12) echo 'selected'; ?>>12%</option>
											 <option value="13" <?php if($roomServiceInfo['extra_charge']==13) echo 'selected'; ?>>13%</option>
											 <option value="14" <?php if($roomServiceInfo['extra_charge']==14) echo 'selected'; ?>>14%</option>
											 <option value="15" <?php if($roomServiceInfo['extra_charge']==15) echo 'selected'; ?>>15%</option>
											 <option value="16" <?php if($roomServiceInfo['extra_charge']== 16) echo 'selected'; ?>>16%</option>
											 <option value="17" <?php if($roomServiceInfo['extra_charge']==17) echo 'selected'; ?>>17%</option>
											 <option value="18" <?php if($roomServiceInfo['extra_charge']==18) echo 'selected'; ?>>18%</option>
											 <option value="19" <?php if($roomServiceInfo['extra_charge']==19) echo 'selected'; ?>>19%</option>
											 <option value="20" <?php if($roomServiceInfo['extra_charge']==20) echo 'selected'; ?>>20%</option>	 
											</select>
												
											 
											</div>
										</div>
										
									
											
											<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Delivery charge" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
											<div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="number" name="delivery_charge" id="delivery_charge" placeholder="Amount" class="wi_100   lgtgrey_bg txtind10 brd  tall minhei_55p fsz18 llgrey_txt ffamily_avenir" min="0" value="<?php echo $roomServiceInfo['delivery_charge']; ?>"/> 
												
											 
											</div>
											 
											</div>
											
										 
										 </div>
								 		
											
									 
										 
																			
										
																			
								 			 <input type="hidden" id="room_service_menu" name="room_service_menu" value="<?php echo $roomServiceInfo['room_service_menu']; ?>" />									
									 <input type="hidden" id="broadcast_type" name="broadcast_type" value="<?php if($resturantinfo['broadcast_type']==0) echo '0'; else echo '1'; ?>" />										
																			
								  
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
	 						