
<!DOCTYPE html>
<html lang="en">

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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	
	<script type="text/javascript">
       	function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
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
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
			function sendInformation()
			{
				$("#error_msg_form").html('');
				if($("#social_number").val()=="" || $("#social_number").val()==null)
				{
					document.getElementById("popup_fade").style.display='block';
					$("#popup_fade").addClass('active');
					document.getElementById("person_informed").style.display='block';
					$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter social security number');
					return false;
				}
				else {
					var send_data={};
					
					send_data.ssn=$("#social_number").val();
					send_data.country=$("#d_country").val();
					var old_ssn=$("#old_ssn").val();
					if($("#social_number").val()==old_ssn)
					{
						if($("#email").val()=="" || $("#email").val()==null)
						{
						document.getElementById("popup_fade").style.display='block';
						$("#popup_fade").addClass('active');
						document.getElementById("person_informed").style.display='block';
						$(".person_informed").addClass('active');	
						$("#error_msg_form").html('please provide email !!!');	
						return false;
						}
						else
						{
						document.getElementById('save_indexing').submit();	
						}
					}
					else
					{
					$.ajax({
						type:"POST",
						url: "../checkParentSsn/<?php echo $data['child_id']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							if(data1==1)
							{
								document.getElementById("popup_fade").style.display='block';
								$("#popup_fade").addClass('active');
								document.getElementById("person_informed").style.display='block';
								$(".person_informed").addClass('active');	
								$("#error_msg_form").html('This parent is already registered !!!');
								$("#additionalInfo").attr('style','display:none');
								return false;
							}
							else if(data1==3)
							{
								$('#ssnInfo').removeClass('marb35');
								$("#error_msg_form_ssn").html('This parent is not qloudid user. please provide additional info !!!');
								$("#additionalInfo").attr('style','display:block');
								$("#old_ssn").val($("#social_number").val());
								return false;
							}
							else if(data1==2)
							{
							document.getElementById('save_indexing').submit();		
							}
						}
					});
					}
				}
				
			}
		</script>
			
			
</head>
<?php $path1 = $path."html/usercontent/images/"; ?>
<body class="white_bg ffamily_avenir">
					 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../parentRelativeDetail/<?php echo $data['child_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
      <div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../parentRelativeDetail/<?php echo $data['child_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear" id=""></div>
	
	<div class="column_m pos_rel">
		 
			<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_550p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn ffamily_avenir">Parent</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Register and invite the parent by using his/hers social security number.</a></div>
					
				 
							<form action="../addParentInfo/<?php echo $data['child_id']; ?>/<?php echo $data['cid']; ?>" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
							<!-- Leave for security protection, read docs for details -->
							 
									
									<input type="hidden" name="invitation_type" id="invitation_type" />
									 <div class="on_clmn mart10 marb35" id="ssnInfo">
																	<div class="thr_clmn  wi_30 "  >
												
												<div class="pos_rel">
													
													<select id="d_country" name="d_country" class=" default_view wi_100 mart0  nobrdr nobrdt nobrdl   fsz18 ffamily_avenir  minhei_65p xxs-minhei_60p txtind25  red_f5a0a5_txt brdb_red_ff2828 dropdown-bg85    talc padl0"  >
														
														<?php  foreach($countryCodeList as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_70 padl20">			
																	<div class="pos_rel">

																		<input type="text" name="social_number" id="social_number" placeholder="xxxxxx"  class=" wi_100 nobrdt nobrdl nobrdr pad10 xxs-minhei_60p  talc  minhei_65p fsz18 red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir">

																		</div>
																	</div>
																	</div>
									 <input type="hidden" id="old_ssn" name="old_ssn">
									 <div id="additionalInfo" class="marb35" style="display:none;">
									 <div class="on_clmn mart20 " >
										<div class="thr_clmn wi_30 ">
																		
											<div class="pos_rel">

																<select class="default_view wi_100 mart0  nobrdr nobrdt nobrdl   fsz18 ffamily_avenir  minhei_65p xxs-minhei_60p txtind25  llgrey_txt brdb  dropdown-bg85    talc padl0" name="cntry" id="cntry">
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>                            
											</select>

																				</div>
																			</div>
																			<div class="thr_clmn padl10 wi_70">
																				
																				<div class="pos_rel">

																					<input type="number" name="search_phone" id="search_phone" placeholder="Mobil" class="wi_100 nobrdt nobrdl nobrdr pad10 xxs-minhei_60p  talc  minhei_65p fsz18 llgrey_txt brdb  ffamily_avenir">

																					</div>

																				</div>
																			</div>
										<div class="on_clmn mart20  " >
																		
																				<div class="pos_rel">

																					<input type="text" name="email" id="email" placeholder="Email" class="wi_100 nobrdt nobrdl nobrdr pad10  xxs-minhei_60p talc  minhei_65p fsz18 red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir">

																					</div>

																				
																			</div>
									
									 </div>
									
									
									<input type="hidden" id="old_ssn" name="old_ssn">
									 
								 
						<div class="clear"></div>
						<div class="fsz20 red_txt ffamily_avenir" id="error_msg_form_ssn"> </div>
						<div class="talc padtb20 "> <a href="#" onclick="sendInformation();"><input type="button" value="Next" class="ffamily_avenir forword minhei_55p t_67cff7_bg fsz18"  ></a>
										
									
									</div>
							 
							<div class="padb20 xxs-talc talc">
							<a href="../parentEmailDetail/<?php echo $data['child_id']; ?>" class="fsz18 ffamily_avenir">Click here if you dont have SSN</a>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
			 
	 
	 
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div id="error_msg_form" class="fsz20"> </div>
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
			</div>
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
		</div>
	</div>
	 
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>

								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
								<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
</body>
</html>