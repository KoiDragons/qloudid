
<!DOCTYPE html>
<html lang="en">
<?php $path1 = $path."html/usercontent/images/"; ?>
<head>
   <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
<script>

function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
	function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					alert('Please provide a valid email address');
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}
			
			function submitform()
			{
				$("#error_msg_form").html('');
				for(i=0; i<$("#total_contact").val(); i++)
				{ 
				if($("#cntry"+i).val()==0)
				{
				 
				$("#error_msg_form").html("please select country !!!");
					return false;
				}
				if($("#search_phone"+i).val()=="")
				{
				 
				$("#error_msg_form").html("please enter phone !!!");
					return false;
				}
				 if(isNaN($("#search_phone"+i).val()))
				{
				 
				$("#error_msg_form").html("please enter correct phone number !!!");
					return false;
				}
				 if($("#search_phone"+i).val()==0)
				{
				 
				$("#error_msg_form").html("Phone number can not be zero !!!");
					return false;
				}
				}
				$("#save_indexing").submit();
				 
				
			}
			
			function checkFields(id)
			{
				var submit_final=true;
				for(i=0; i<id; i++)
				{
				if($("#cntry"+i).val()==0)
				{
				 
				$("#error_msg_form").html("please select country for rows before this!!!");
					$("#search_phone"+id).val('');
					submit_final=false;
					return false;
				}
				if($("#search_phone"+i).val()=="")
				{
				 
				$("#error_msg_form").html("please enter phone for rows before this!!!");
				$("#search_phone"+id).val('');
				submit_final=false;
					return false;
				}	
					
				}
				
				if($("#cntry"+id).val()==0)
				{
				 
				$("#error_msg_form").html("please select country!!!");
					$("#search_phone"+id).val('');
					submit_final=false;
					return false;
				}
				
				if(submit_final==true)
				{
				if($("#total_contact").val()<=id)
				{
					total=id+1;
					
					$("#total_contact").val(total)
				}
					
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

<body class="white_bg">

 <div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="contactAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>

	<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs" id="headerData">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="contactAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					 
                <div class="clear"></div>

            </div>
        </div>	
			<div class="clear" id=""></div>
	
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">	
							
									<h1 class="marb0  xxs-talc talc fsz100 xs-fsz45 padb10 trn ffamily_avenir">Add</h1>
									</div>
									<!-- Logo -->
									<div class="martb20  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Register the person you wish us to notify when you are in trouble.</a></div>	
								 
								 
								<div class="container padrl15 xs-padrl0">
								<div class="marrla xs-wi_100">
								<form method="POST" action="sendInvitation" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
									<div class="marb0 padtrl0">
										
										
										<div class="on_clmn mart10 " >
											<div class="thr_clmn wi_30 padr10">
												<div class="pos_rel">
													
													<input type="text" name="fname0" id="fname0" placeholder="Name" class="wi_100 nobrdt nobrdr nobrdl  ffamily_avenir    talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt trans_bg brdb">
													
												</div>
											</div>
											<div class="thr_clmn  wi_20 "  >
												
												<div class="pos_rel">
													
													<select id="cntry0" name="cntry0" class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg xxs-minhei_60p fsz18  minhei_65p tall padl0 "  style="text-align-last:center;">
														<option value="0" class="lgtgrey2_bg" >Select</option>
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="search_phone0" id="search_phone0" placeholder="Mobil" class=" wi_100 nobrdt nobrdr nobrdl ffamily_avenir  talc xxs-minhei_60p minhei_65p fsz18  trans_bg  brdb_red_ff2828 red_f5a0a5_txt">
													
												</div>
												
											</div>
										</div>
										 <div class="on_clmn mart20" >
											<div class="thr_clmn wi_30 padr10">
												<div class="pos_rel">
													
													<input type="text" name="fname1" id="fname1" placeholder="Name" class="wi_100 nobrdt nobrdr nobrdl  ffamily_avenir    talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt trans_bg brdb">
													
												</div>
											</div>
											<div class="thr_clmn  wi_20 "  >
												
												<div class="pos_rel">
													
													<select id="cntry1" name="cntry1" class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr llgrey_txt brdb  ffamily_avenir dropdown-bg xxs-minhei_60p fsz18  minhei_65p tall padl0 "  style="text-align-last:center;">
														<option value="0" class="lgtgrey2_bg" >Select</option>
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="search_phone1" id="search_phone1" placeholder="Mobil" class=" wi_100 nobrdt nobrdr nobrdl ffamily_avenir  talc xxs-minhei_60p minhei_65p fsz18  trans_bg  brdb  llgrey_txt" onchange="checkFields(1);">
													
												</div>
												
											</div>
										</div>
										 
										 <div class="on_clmn mart20" >
											<div class="thr_clmn wi_30 padr10">
												<div class="pos_rel">
													
													<input type="text" name="fname2" id="fname2" placeholder="Name" class="wi_100 nobrdt nobrdr nobrdl  ffamily_avenir    talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt trans_bg brdb">
													
												</div>
											</div>
											<div class="thr_clmn  wi_20 "  >
												
												<div class="pos_rel">
													
													<select id="cntry2" name="cntry2" class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr llgrey_txt brdb  ffamily_avenir dropdown-bg xxs-minhei_60p fsz18  minhei_65p tall padl0 "  style="text-align-last:center;">
														<option value="0" class="lgtgrey2_bg" >Select</option>
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="search_phone2" id="search_phone2" placeholder="Mobil" class=" wi_100 nobrdt nobrdr nobrdl ffamily_avenir  talc xxs-minhei_60p minhei_65p fsz18  trans_bg  brdb  llgrey_txt" onchange="checkFields(2);">
													
												</div>
												
											</div>
										</div>
										 
										 
										 <div class="on_clmn mart20" >
											<div class="thr_clmn wi_30 padr10">
												<div class="pos_rel">
													
													<input type="text" name="fname3" id="fname3" placeholder="Name" class="wi_100 nobrdt nobrdr nobrdl  ffamily_avenir    talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt trans_bg brdb">
													
												</div>
											</div>
											<div class="thr_clmn  wi_20 "  >
												
												<div class="pos_rel">
													
													<select id="cntry3" name="cntry3" class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr llgrey_txt brdb  ffamily_avenir dropdown-bg xxs-minhei_60p fsz18  minhei_65p tall padl0 "  style="text-align-last:center;">
														<option value="0" class="lgtgrey2_bg" >Select</option>
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="search_phone3" id="search_phone3" placeholder="Mobil" class=" wi_100 nobrdt nobrdr nobrdl ffamily_avenir  talc xxs-minhei_60p minhei_65p fsz18  trans_bg  brdb  llgrey_txt" onchange="checkFields(3);">
													
												</div>
												
											</div>
										</div>
										 
										 
										 <div class="on_clmn mart20 marb35" >
											<div class="thr_clmn wi_30 padr10">
												<div class="pos_rel">
													
													<input type="text" name="fname4" id="fname4" placeholder="Name" class="wi_100 nobrdt nobrdr nobrdl  ffamily_avenir    talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt trans_bg brdb">
													
												</div>
											</div>
											<div class="thr_clmn  wi_20 "  >
												
												<div class="pos_rel">
													
													<select id="cntry4" name="cntry4" class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr llgrey_txt brdb  ffamily_avenir dropdown-bg xxs-minhei_60p fsz18  minhei_65p tall padl0 "  style="text-align-last:center;">
														<option value="0" class="lgtgrey2_bg" >Select</option>
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="search_phone4" id="search_phone4" placeholder="Mobil" class=" wi_100 nobrdt nobrdr nobrdl ffamily_avenir  talc xxs-minhei_60p minhei_65p fsz18  trans_bg  brdb  llgrey_txt" onchange="checkFields(4);">
													
												</div>
												
											</div>
										</div>
										 <input type="hidden" name="total_contact" id="total_contact" value="1" />
											 	<div class="clear"></div>
											<div class="red_txt fsz20" id="error_msg_form"> </div>
									</div>
									<div class="talc  padtb20"><a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Next" class="forword minhei_55p t_67cff7_bg fsz18 ffamily_avenir"  /></a>
									
									</div>
									
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
			
				<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</div>
	</div>
		
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script> 
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script> 
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script> 
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/s/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_image.js"></script><script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
			

</body>
</html>