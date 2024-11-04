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
   function updateAvailable(id)
   {
	   var getValue=$('#available_dishes').val();
	   if($("#"+id).hasClass('lgtgrey_bg'))
	   {
		      
		   $('#'+id).removeClass('lgtgrey_bg');
			$('#'+id).addClass('green_bg');		
			getValue=getValue+id+',';
			$("#available_dishes").val(getValue);
	   }
	   else
	   {
		   $('#'+id).removeClass('green_bg');
			$('#'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#available_dishes").val(getValue);
	   }
   }
   
    
		function submitDishes()
		{
			$('#error_msg_form').html('');
			if($("#available_dishes").val()=="" || $("#available_dishes").val()==null)
			{
			$('#error_msg_form').html('Please select atleast one item');	
			return false;
			}
		 
			document.getElementById('save_indexing').submit();
			}
		
		 	
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs hidden-xsi">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p  " style="padding: 10px 0px 0px 0px;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../roomServiceRequests/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs visible-xsi">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-xsi visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p padt10" style="padding: 10px 0px 0px 0px;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../../roomServiceRequests/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Services</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Here is a list of all services please select which one are available for hotel guests</a></div>
					 
					 
							
							 
								
								  
								<div class="marb0 padtrl0">		 
							  <?php  foreach($completeMenu as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
									 <div class="on_clmn  marb20  xs-brdb brdb ">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="<?php echo $value['category_name'] ?>" class="wi_100 rbrdr pad10  padl0 nobold padb0 tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
										</div>
								 		
										
											 
											<div class="container column_m ">
										 <?php $i=1; foreach($value['category'] as $category => $value2) 
														{
															 
														?>	
														
										<a href="javascript:void(0);" onclick="updateAvailable(<?php echo $value2['id']; ?>);">
													<div class="column_m container  marb5   fsz14 dark_grey_txt" >
												<div class=" <?php if($value2['is_selected']==1) echo 'green_bg'; else echo 'lgtgrey_bg'; ?> bg_fffbcc_a " id="<?php echo $value2['id']; ?>">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													 
													
													<div class="fleft  wi_60 xs-wi_70    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt "><?php   echo $value2['article_name']; ?> </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Price - <?php   echo $value2['price']; ?></span>  </div>
													  
												  
													   
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div> </a>
														
														<?php $i++; } ?>
										</div>
								 	<?php } ?>
									 	 
								 		
						<form action="../../../updateRoomServiceMenu/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>/<?php echo $data['hid']; ?>" method="POST" id="save_indexing" name="save_indexing" >				 
									 
							<input type="hidden" id="available_dishes" name="available_dishes" value="<?php if($roomServiceRequestDetail['available_services']!='' || $roomServiceRequestDetail['available_services']!=null) echo $roomServiceRequestDetail['available_services'].','; ?>" />
							</form>
							 <div class="clear">
							<div class="valm fsz20 red_txt mart35" id="error_msg_form"> </div>
							<div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18" onclick="submitDishes();">Submit</button>
								
							</div>
						    <div class="clear">
							
							</div>
				 </div>
				 </div>
					  
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
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	</body>
	 						