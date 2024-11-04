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
   function updateCategory(id,link)
   {
	   menuCategory=id;
	   menuDish=0;
   }
   
   function updateMenu(id)
   {
	   menuDish=id;
	   menuCategory=0;
   }
		function submitform()
		{
			
		 
			document.getElementById('save_indexing').submit();
			}
		
		function changeHeader()
		{
			window.location.href ="https://www.qloudid.com/company/index.php/Resturant/dishesInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>";
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
                        <a href=".././../availableResturant/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows">
					<li class="hidden-xs padr10 first">
						<a href="https://www.qloudid.com/public/index.php/Resturant/menuInformation/<?php echo $data['rid']; ?>"><span class="black_txt pred_txt_h ffamily_avenir">Menu</span></a>
					</li>
				 	<li class="hidden  padr10"><a href="../../dishesInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="black_txt lgn_hight_s1 fsz18"><span class="valm ffamily_avenir black_txt">Add<i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span></a>
          
        </li>
       			
					 	</ul>
			</div>
			<div class="fright   padtbz10 hidden  "  >
						<ul class="mar0 pad0">
						<li class="hidden-xs padr10 first">
						<a href="https://www.qloudid.com/public/index.php/Resturant/menuInformation/<?php echo $data['rid']; ?>"><span class="black_txt pred_txt_h ffamily_avenir">Menu</span></a>
					</li>
					<li class="hidden-xs ">
							<div class="  padtrl10">
								<a href="../../dishesInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm ffamily_avenir">Add<i class="fas fa-long-arrow-alt-right fsz18 padl10" aria-hidden="true"></i></span>
								</a>
							</div>
							</li>
							
							
						</ul>
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
									<a href=".././../availableResturant/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
						<div class="top_menu frighti padt10 padb10 wi_60i visible-xs visible-sm visible-xsi">
				<ul class="menulist sf-menu  fsz16 ">
					 
       			
					<li class="marri15">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25 sf-with-ul"><span class="fas fa-bars black_txt"></span></a>
						<ul style="display: none;">
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Inloggad som</div>
									<ol class="">
									<li><a href="javascript:void(0);">Resturant</a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				 
										
                
				<li><a href="../../editResturantInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">About</a></li>
				<li><a href="../../cuisineTypeInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" >Type</a></li>
                <li><a href="../../workingInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Opening hours</a></li>
				<li><a href="../../roomServiceRequests/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" >Room service</a></li>
                <li><a href="../../photoInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Add images</a></li>
				 
				<li><a href="../../publishInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>">Publish</a></li>
                  <li>
                    <div class="line marb10"></div>
                  </li>
										
										
										 
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
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
								
								 <ul class="dblock marr20 padt250 padl10 fsz18 mart0">
									 		
								<li class="dblock padrb10   ">
						<a href="../../editResturantInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >About</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 	
						<li class="dblock padrb10   ">
						<a href="../../cuisineTypeInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >Type</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>  						 
						<li class="dblock padrb10">
						<a href="../../workingInfo/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Opening hours  </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
						
							 
						 
								<li class="dblock padrb10">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10    brdb_black black_txt  padb10"> <span class="valm trn ltr_space" >Menu</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
						<li class="dblock padrb10   padt5">
						<a href="../../roomServiceRequests/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Room service</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>	
												  
								<li class="dblock padrb10">
						<a href="../../photoInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>"  class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Add images</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>	

						 
						 <li class="dblock padrb10">
						<a href="../../publishInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Publish</span> 
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
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Menus</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Here is a list of all your menus</a></div>
					 
					 
							
							 
								
								 <div class="tab-header martb0 padb10 xs-talc  nobrd talc">
                                            
                                              <a href="../../dishesInformation/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="dinlblck mar5 padrl10     bg_98cf44 brdrad50  lgn_hight_60 fsz60  white_txt white_txt_ah ffamily_avenir" onclick="changeHeader();">+</a>
                                             

                                        </div>
								<div class="marb0 padtrl0">		 
							  <?php  foreach($completeMenu as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
									 <div class="on_clmn  marb20  xs-brdb brdb ">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="<?php if($value['serve_type']==1) echo 'Breakfast'; else if($value['serve_type']==2) echo 'Brunch'; else if($value['serve_type']==3) echo 'Lunch'; else if($value['serve_type']==4) echo 'Dinner'; else if($value['serve_type']==5) echo 'Beverage'; ?>" class="wi_100 rbrdr pad10  padl0 nobold padb0 tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked" onclick="updateCategory(<?php echo $value['serve_type']; ?>,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									  <input type="hidden" name="serve<?php echo $value['serve_type']; ?>" id="serve<?php echo $value['serve_type']; ?>" value="1" />

										</div>
								 		
										
											 
										 <div class="container column_m  " id="cate_<?php echo $value['serve_type']; ?>">
										  <?php  foreach($value['category'] as $category => $value1) 
														{
															 
														?>	 
								 <div class="on_clmn mart20   brdb hidden">
								 
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="<?php   echo $value1['food_category']; ?>" class="wi_100 rbrdr pad10  padl0 bold  tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked" onclick="updateMenu('<?php echo $value['serve_type'].'-'.$value1['category_food']; ?>',this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 <input type="hidden" name="categ<?php echo $value['serve_type'].'-'.$value1['category_food']; ?>" id="categ<?php echo $value['serve_type'].'-'.$value1['category_food']; ?>" value="1" />
										
										</div>
										
										<div class="container column_m padb20" id="menu_<?php echo $value['serve_type'].'-'.$value1['category_food']; ?>">
										 <?php $i=1; foreach($value1['dishes'] as $category => $value2) 
														{
															 
														?>	
														
										<a href="../../menuItemDetail/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>/<?php echo $value2['enc']; ?>">
													<div class="column_m container  marb5   fsz14 dark_grey_txt" >
												<div class=" <?php if($value2['temp_available_item']==1) echo 'lgtgrey_bg'; else echo 'yellow_bg_crm'; ?> bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 "> 
																	
																	<div class="wi_50p  hei_50p  "><img src="<?php echo $value2['dish_image']; ?>" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
													<div class="fleft  wi_60 xs-wi_70    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt "><?php   echo $value1['food_category']; ?> </span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt "><?php   echo $value2['dish_name']; ?></span>  </div>
													  
												 <div class="fright wi_20  padl20 xs-padl0 xs-wi_20  fsz40    padb0 xs-marrl0 hidden-xs">
																				<button type="button" name="Hotel" class="forword3 minhei_35p red_ff2828_bg ffamily_avenir white_txt pad10 " >Update</button>
																			</div> 
													  <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz25  padb0 padt10 visible-xs ">
														  <span class="fas fa-times red_ff2828_txt" aria-hidden="true"></span> 
													</div>
													
													   
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div> </a>
														
														<?php $i++; } ?>
										</div>
								 	<?php } ?>
									 	</div>
										
														<?php  } ?> 	
								 		
										 
									 
							
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
	 						