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
			function submitDepartment()
			{
				
				$("#errorMsg").html('');
				if($("#c_name").val()=="" || $("#c_name").val()==null)
				{
				$("#errorMsg").html('please enter category name');	
				return false;
				}
				
				
					
					document.getElementById('save_indexing').submit();
				
				
			}
			
		  function changeHeader()
		{
			window.location.href ="https://www.qloudid.com/company/index.php/Eshop/categoryDetail/<?php echo $data['cid']; ?>";
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
								
								<li class="dblock padrb10   ">
						<a href="../aboutInformation/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >About</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
											<li class="dblock padrb10">
						<a href="https://www.qloudid.com/public/index.php/Eshop/itemInformation/<?php echo $data['cid']; ?>" target="_blank" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >E-shop </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
						
						<li class="dblock padrb10">
						<a href="../../BussinessImages/displayInformation/<?php echo $data['cid']; ?>/T3E0MjFwcGhVNlhSYlRvL2t1ZXQ2Zz09" target="_blank" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Brand E-shop</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
						
						<li class="dblock padrb10">
						<a href="../photoInformation/<?php echo $data['cid']; ?>" target="_blank" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >E-shop images</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
											<li class="dblock padrb10 first">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space">Categories </span> 
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
									<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Add and list all categories</a></div>
						
						
						<div class="tab-header martb0 padb10 xs-talc  nobrd talc">
                                            
                                              <a href="#" class="dinlblck mar5 padrl10     bg_98cf44 brdrad50  lgn_hight_60 fsz60  white_txt white_txt_ah ffamily_avenir" onclick="changeHeader();">+</a>
                                             

                                        </div>
										
										
										<div class="on_clmn brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Categories" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 

									 <?php $i=0;
												
												foreach($EshopCategories as $category => $value) 
												{
													
													
												?> 

												
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?>   bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['category_name'],0,1); ?> </div>
																	</div>
													
												<a href="../serviceInformation/<?php echo $data['cid']; ?>">	<div class="fleft  wi_60 xs-wi_70    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt"><?php echo substr($companyDetail['company_name'],0,18); ?></span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt"><?php echo $value['category_name']; ?></span>  </div></a>
													 
											 
													
													<a href="../serviceInformation/<?php echo $data['cid']; ?>"> <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40    padb0">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div></a>
												<a href="../categoriesInfoEdit/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>">	 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40    padb0">
														  <span class="far fa-edit txt_cfdbea" aria-hidden="true"></span> 
													</div></a>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											 
												

													
								 
												<?php $i++; } ?>
									 
									
								<div  id="moreCategory">
										</div>	
										<div class="clear"></div>
														
														<div class="padtb20 talc <?php if($eshopCategoriesCount['num']<=10) echo 'hidden'; ?> ">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width" onclick="add_more_rows_category(this);" value="1">View more</a>

															</div>
									
								<script>
										function add_more_rows_category(link) {
															 
															var id_val=parseInt($(link).attr('value'))+1;
															var html1="";
															var send_data={};
															send_data.id=parseInt($(link).attr('value'));
															$(link).attr('value',id_val);
															 
															$.ajax({
															type:"POST",
															url:"../moreCategories/<?php echo $data['cid']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#moreCategory"),
															html=html1;
															  
															$tbody
															.append($(html))
															.find('input.init')
															.iCheck({
															checkboxClass: 'icheckbox_minimal-aero',
															radioClass: 'iradio_minimal-aero',
															increaseArea: '20%'
															});
															}
															});

															return false;
															}

									</script>
										 
											 
											
								 
						
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