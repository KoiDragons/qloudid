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
		function getLocations(id)
		{
			if(id==1)
			{
				$('#showLocations').removeClass('hidden');
			}
			else
			{
				$('#showLocations').addClass('hidden');
				$('.green_98ce44').addClass('white_bg');
				$('.green_98ce44').removeClass('green_98ce44');
				$('#location_physical').val('');
			}
		}
		function addType(id)
	{
	 
		var getValue=$('#location_physical').val();
		if($('#'+id).hasClass('green_98ce44'))
		{
			$('#'+id).removeClass('green_98ce44');
			$('#'+id).addClass('white_bg');		
			getValue = getValue.replace(id+",", "");
			$("#location_physical").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_98ce44');
			$('#'+id).removeClass('white_bg');		
			getValue=getValue+id+',';
			$("#location_physical").val(getValue);
		}
		
	}
			function submitDepartment()
			{
				
				$("#errorMsg").html('');
				if($("#is_physical_location").val()==1)
				{
					if($('#location_physical').val()=='')
					{
					$("#errorMsg").html('please select atleast one physical location');	
					return false;	
					}
				
				}
				
				
					
					document.getElementById('save_indexing').submit();
				
				
			}
			
		  
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
                        <a href="../../Brand/brandAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			 <div class="fright   padtbz10   ">
						<ul class="mar0 pad0">
							<div class="  padtrl10">
								<a href="../categoryDetail/<?php echo $data['cid']; ?>" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir">Add<i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span>
								</a>
							</div>
							
							
							
						</ul>
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
                        <a href="../../Brand/brandAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
				 
					<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" >
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" >
								
								 
								<ul class="dblock marr20 padt250 padl10 fsz18">
								
											<li class="dblock padrb10 first">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space">About </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>		
							
							<li class="dblock padrb10   ">
						<a href="../categories/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Categories </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_500p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xsi-padrl20 xs-pad0">
						 
					 
					 <div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Eshop</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please provide physical store information</a></div>
						
						
						 	<form action="../updateAboutInformation/<?php echo $data['cid']; ?>" name="save_indexing" id="save_indexing" method="POST" accept-charset="ISO-8859-1">
									<div class="marb0 padb10 ">
										
										 <input type="hidden" id="location_physical" name="location_physical" value="<?php echo $data['locations']; ?>" />
										 
										 <div class="on_clmn   mart10  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Do you have physical shop available?" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
										
									<div class="on_clmn">
											 
											<div class="pos_rel">
												
												<select name="is_physical_location" id="is_physical_location"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir " onchange="getLocations(this.value);" > 
											 	 
											<option value="1" class="lgtgrey2_bg" <?php if($eshopAboutCount['is_physical_location']==1) echo 'selected'; ?>>Yes</option>
											<option value="0" class="lgtgrey2_bg " <?php if($eshopAboutCount['is_physical_location']==0) echo 'selected'; ?>>No</option>	
													</select>
												
											 
											</div>
										</div>
										<div class="<?php if($eshopAboutCount['is_physical_location']==0) echo 'hidden'; ?>" id="showLocations"> 
										 
										<div class="on_clmn brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Company locations" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly />
										 
									</div>
									 </div> 

									 <?php $i=0;
												
												foreach($locationDetail as $category => $value) 
												{
													
													
												?> 

												
												<div class="column_m container  marb5 brdb  fsz14 dark_grey_txt">
												<a href="javascript:void(0);" onclick="addType(<?php echo $value['id']; ?>);">
												<div class=" <?php if($value['is_selected']==0)echo 'white_bg'; else echo 'green_98ce44'; ?>  bg_fffbcc_a "  id="<?php echo $value['id']; ?>">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['visiting_address'],0,1); ?> </div>
																	</div>
													
												<div class="fleft  wi_60 xs-wi_70    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo substr($value['property_name'],0,18); ?></span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt"><?php echo $value['visiting_address']; ?></span>  </div> 
													 
											 
													
													 
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div></a>
											</div>
											 
												

													
								 
												<?php  } ?>
												</div>
									 </form>
									 <div class="clear"></div>
									<div id="errorMsg" class="red_txt fsz20 talc"></div>	
									
										<div class="talc padt20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitDepartment();"><input type="button" value="Update" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
						 <?php if($companyWorkCount['num']==0) { ?>
							<div class="red_txt fsz20 padtb20 talc">You have not added company opening hrs yet. If tou want to add the opening hrs please click the button below.</div>	
									
							<div class="talc padt20  ffamily_avenir"> <a href="../../Company/openingHrs/<?php echo $data['cid']; ?>/<?php echo $data['cid']; ?>"><input type="button" value="Add opening hrs" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
							
						 <?php } ?>
						
						<div class="clear"></div>
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
	
	
	 
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 </body>

</html>