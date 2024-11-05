
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
				$("#errorMsg").html('');
				
				var bg_url = $('#image-data').css('background-image');
				
				if(bg_url!="" || bg_url!=null || bg_url!="none")
				{
					$('#image-data1').val(bg_url);
				}
				
				
				if($("#fname").val()=="")
				{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("please enter first name !!!");
					return false;
				}
				if($("#lname").val()=="")
				{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("please enter last name !!!");
					return false;
				}
				if($("#social_number").val()=="")
				{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("please enter personal number !!!");
					return false;
				}
				else
				{
				var send_data={};
				
				send_data.ssn=$("#social_number").val();
				
				$.ajax({
					type:"POST",
					url:"../checkRelativeSsn/<?php echo $data['parent_id']; ?>",
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
				$("#errorMsg").html("You can not add another parent as relative !!!");
					return false;
						}
						else if(data1==2)
						{
						$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("Another relative with given personal number already exist !!!");
					return false;
						}
						
					}
				});
				}
				if($("#search_phone").val()=="")
				{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("please enter phone !!!");
					return false;
				}
				
				else
				{
				var send_data={};
				send_data.cid=$("#cntry").val();
				send_data.cphone=$("#search_phone").val();
				
				$.ajax({
					type:"POST",
					url:"../checkRelative/<?php echo $data['parent_id']; ?>",
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
				$("#errorMsg").html("This phone number is already registered with other relative !!!");
					return false;
						}
						else if(data1==0)
						{
						document.getElementById('save_indexing').submit();
						}
					}
				});
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
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
</script>	
	
</head>

<body>
	
	<div class="column_m header xs-header  bs_bb lgtgrey2_bg" id="headerData">
				<div class="wi_100 xs-hei_40p hei_65p pos_fix padtb5 padrl10  lgtgrey2_bg">
					<div class="logo  marr15 wi_140p xs-wi_80p">
						<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 " style="width: 50px; padding : 5px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="hidden-xs hidden-sm fleft padl20 padr10 brdl">
						<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="hidden-xs" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
													</li>
												</ol>
												
											</div>
										</li>
									</ul>
								</li>
								
								
								
								
								
							</ul>
						</div>
					</div>
					
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="https://www.qloudid.com/user/index.php/UserLogout?action=logout" class="diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt">
									
									<span class="valm">Logout</span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
					<div class="visible-xs visible-sm fright marr0 padr0 "> <a href="https://www.qloudid.com/user/index.php/UserLogout?action=logout" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Logout</a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
			<div class="column_m marb30 xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0" id="loginBank1"  onclick="checkFlag();">
				<div class="padrl10 white_bg xs-padrl25">
					<div class="wrap maxwi_100   xs-nobrdb xs-padt15 xs-padb0 mart40 xs-mart0">
					<form action="../addRelative/<?php echo $data['parent_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
						<div class="dflex xs-fxwrap_w alit_c">
							<div class="wi_50 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart10 brdrad5 marr0 xs-marr0 brdr_new padr20">
								
								<h4 class="bold fsz35 xs-fsz30 padb10 tall  ">Lägg till anhöriga...</h4>
								<!--<h3 class="fsz25 padb10 brdb_red_new tall hidden-xs lgn_hight_30"></h3>-->
								
									<div class="marb0 padtrl0">
										
										
										<div class="on_clmn mart0 xxs-mart0" >
											<div class="thr_clmn wi_50">
												<div class="pos_rel">
													
													<input type="text" name="fname" id="fname" placeholder="Förnamn" class=" wi_100 rbrdr pad10 mart5  lgtgrey2_bg hei_50p fsz18 llgrey_txt">
													
												</div>
											</div>
											<div class="thr_clmn padl10 wi_50">
												
												<div class="pos_rel">
													
													<input type="text" name="lname" id="lname" placeholder="Efternamn" class=" wi_100 rbrdr pad10 mart5  lgtgrey2_bg hei_50p fsz18 llgrey_txt">
													
												</div>
												
											</div>
										</div>
										<div class="on_clmn mart10 xxs-mart10 ">
											
											<div class="pos_rel">
												
												<input type="text" name="social_number" id="social_number" placeholder="Personnummer 12 siffror" class=" wi_100 rbrdr pad10 mart5 lgtgrey2_bg fsz18 hei_50p llgrey_txt">
												
											</div>
										</div>
										
										<div class="on_clmn mart10 ">
											
											<div class="thr_clmn  wi_50 "  >
												
												<div class="pos_rel">
													
													<select id="cntry" name="cntry" class=" default_view wi_100 mart5 rbrdr pad10  lgtgrey2_bg hei_50p fsz18 llgrey_txt"  >
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="search_phone" id="search_phone" placeholder="Mobil" class=" wi_100 rbrdr pad10 mart5  lgtgrey2_bg hei_50p fsz18 llgrey_txt">
													
												</div>
												
											</div>
											
											
											
										</div>
										
										<div class="on_clmn mart10 xxs-mart10 ">
											
											<div class="pos_rel">
												
												<input type="text" name="search_email" id="search_email" placeholder="Email" class=" wi_100 rbrdr pad10 mart5 lgtgrey2_bg fsz18 hei_50p llgrey_txt">
												
											</div>
										</div>
										
										
										<div class="on_clmn martb10 xxs-mart10 ">
											<div class="thr_clmn  wi_50 "  >
											<div class="pos_rel">
												
												<select id="permission_type" name="permission_type" class=" default_view wi_100 mart5 rbrdr pad10  lgtgrey2_bg hei_50p fsz18 llgrey_txt"  >
														
														<option value="1" class="lgtgrey2_bg">Drop in</option>
														     <option value="2" class="lgtgrey2_bg">Pick up</option>
															<option value="3" class="lgtgrey2_bg">Both</option>
														
													</select>
												
											</div>
											</div>
											
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<select id="relate" name="relate" class=" default_view wi_100 mart5 rbrdr pad10  lgtgrey2_bg hei_50p fsz18 llgrey_txt"  >
														
														<?php  foreach($relationDetail as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"><?php echo $value['relation_name']; ?></option>
														<?php 	}	?>   
														
													</select>
												
											</div>
											</div>
										</div>
										
										
										
										
										<div class="on_clmn mart10 xxs-mart10 hidden">
											
											<div class="pos_rel">
												
												<select id="interval" name="interval" class=" default_view wi_100 mart5 rbrdr pad10  lgtgrey2_bg hei_50p fsz18 llgrey_txt"  >
														
														<option value="1" class="lgtgrey2_bg">Frequent</option>
														      	<option value="2" class="lgtgrey2_bg">Occasionally</option> 
														
													</select>
												
											</div>
										</div>
										
										
										
										
										
										<div class="clear"></div>
										
										
										
											
											<div class="clear"></div>
											<div class="red_txt bold" id="error_msg_form"> </div>
									</div>
									
									<div class="talc padtb10"> <a href="#" onclick="submitform();"><input type="button" value="Submit" class="nobrd wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2"  ></a>
										
									
									</div>
									
								
								
								
							</div>
							<div class="wi_50 xs-wi_100 fxshrink_0 order_2 xs-order_2 mart10 marr0 xs-marr0 talc  xs-padr0 xs-padl0">
								
							<div class="column_m scroll_menu_header mart10 padb30 " data-params="class|dark_grey_txt" data-text="Passport">
							
							<div class="container pad25 fsz14 dark_grey_txt">
										<div class="passport column_m signin_bx  tall">
											
											<div class="wi_80 fleft">
												<div class="wp_columns_upload wp_columns_upload_custom marr5">
													<input type="hidden" name="image-data1" id="image-data1" value=""  />
										
										
										<div class="imgwrap ">
											<div class="cropped_image "  id="image-data" name="image-data"></div>
														<div class="cropped_image"></div>
														<div class="subimg_load">
															<a href="#" class="load_button">Change</a>
														</div>
													</div>
												</div>
												<div class="mart10 bold talc uppercase fsz16">
													Upload image
												</div>
											</div>
											
										</div>
							</div>
						</div>
							
											</div>
							
						</div>
						</form>
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