<!doctype html>
<html>
	 
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
		function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}
			function changeDepartment(id)
			{
			var send_data={};
				
				send_data.location_id=id;
				
				$.ajax({
					type:"POST",
					url:"../../changeDepartment",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						$('#department').html(data1);
						}
				});
				
			}
			function submitform()
			{
				
				$("#errorMsg").html('');
				$("#errorMsgUser").html('');
				
				if($("#email").val()!="")
				{
				if(!checkEmail("email"))
				{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("please enter correct work email format");
					return false;
				}	
				}
				var send_data={};
				
				send_data.wemail=$("#email").val();
				
				$.ajax({
					type:"POST",
					url:"../../checkEmployeeEmail/<?php echo $workInfo['enc']; ?>/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==1)
						{
						$("#popup_fade").addClass('active');
						$("#popup_fade").attr('style','display:block');
						$("#gratis_popup_error").addClass('active');
						$("#gratis_popup_error").attr('style','display:block');
						$("#errorMsg").html("Another user is already registered with given work email  !!!");
						return false;
						}
						else if(data1==2)
						{
						$("#popup_fade").addClass('active');
						$("#popup_fade").attr('style','display:block');
						$("#gratis_popup_error").addClass('active');
						$("#gratis_popup_error").attr('style','display:block');
						$("#errorMsg").html("Another user is already invited to become a employee with given work email  !!!");
						return false;
						}
						else if(data1==3)
						{
						$("#popup_fade").addClass('active');
						$("#popup_fade").attr('style','display:block');
						$("#gratis_popup_error").addClass('active');
						$("#gratis_popup_error").attr('style','display:block');
						$("#errorMsg").html("Another employee is already assigned given work email  !!!");
						return false;
						}
						else
						{
							document.getElementById('save_indexing1').submit();
						}
						
					}
				});
				
				}
				
			
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir" >
		
		<!-- HEADER -->
	
			<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
									<a href="https://www.qloudid.com/company/index.php/CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
                <div class="clear"></div>

            </div>
        </div>
		<div class="clear" id=""></div>
		
		
			<div class="column_m pos_rel">
		 
			<div class="column_m talc lgn_hight_22 fsz16 mart20 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
							 

						 
						<h1 class="lgn_hight_35 padt10 talc fsz35 black_txt padb0"><?php echo $workInfo['name'].' '.$workInfo['last_name']; ?> </h1>
						<p class="lgn_hight_16 padt10 talc fsz20   padb10 marb20 xs-padb5 grey_new_txt">Inactive employee</p>
					 
						 
	<div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
                                            <a href="#" class="dinlblck mar5 padrl30     bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" >Work</a>
                                            
                                               

                                        </div>
  
									
								 
								 
							 
							 
							
							
							<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container padtb15 padrl10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">E</div>
																	</div>
											
												 
										<div class="fleft wi_80   xs-mar0 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh ffamily_avenir"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Email</span></a> 
										
										<div class="fleft wi_100  sm-wi_60 xsip-wi_60 xs-mar0 "> 
										    
													 
									 
											<input type="text" name="email" id="email" value="<?php echo $workInfo['email']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir">
										
													
												</div>
												
												</div>
												
												</div>
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
							
							 
							<div class="white_bg mart0 brdb bg_fffbcc_a marb0" style=""> 
										<div class="container padtb15 padrl10  brdrad1 fsz14 dark_grey_txt"> 
										<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"> 
										<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">W</div>
																	</div>
													
												 
										<div class="fleft wi_80 ">
										<a href="#" class="dark_grey_txt txt_0070e0_sbh"><span class="edit-text padt0 jain2 dblock brdclr_lgtgrey2 bold fsz14">Work email</span></a> 
										<div class="fleft wi_100  xs-mar0  "> 
										    
									 
											<input type="text" name="w_email" id="w_email" value="<?php echo $workInfo['work_email']; ?>" class="edit-text padt0 jain2 dblock  brdclr_lgtgrey2 fsz18 nobrd ffamily_avenir">
										  
										
																				
										
									</select> </div>
										 
												</div>
												 
												</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>	
						
										 
	<div class="clear" id=""></div>
							 
							
							
						<?php if($relievingCount==0) {   ?>			
						<div class=" padb20 talc fsz16  mart35"> <a href="../../terminationSentInfo/<?php echo $data['cid']; ?>/<?php echo $data['eid']; ?>" class="forword minhei_55p red_ff2828_bg fsz18 ffamily_avenir">Relieve </a> </div>
						<?php }  ?>
								
								<div class="clear"></div>
							 
							 
								
								
								
								
								
								
								
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
			 
	 
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		
		 
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist2-fade" data-target="#menulist2-dropdown,#menulist2-fade" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="organization-move-fade" data-target="#organization-move,#organization-move-fade" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="add-userto-group-fade" data-target="#add-userto-group,#add-userto-group-fade" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="more-fade" data-target="#more,#more-fade" data-classes="active" data-toggle-type="separate"></a>
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>

	</body>
	
</html>