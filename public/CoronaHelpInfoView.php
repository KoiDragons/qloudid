
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	 
 
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		 <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		
			<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	 
	<script type="text/javascript">
	
	
			var currentStatus = 0;
			
			function changeBG(link)
			{
				//alert(currentStatus); 
				if($(link).val()=="" || $(link).val()==null)
				{
					if(currentStatus!=0)
					{
					currentStatus=currentStatus-1;	
					
					}
					
						if($(".buttonBg").hasClass('green_bg'))
						{
							$(".buttonBg").removeClass('green_bg');
							$(".buttonBg").addClass('lgtgrey_bg');
						}
					
					
				}
				else
				{
					if(currentStatus!=3)
					{
					currentStatus=currentStatus+1;	
					}
					
					if(currentStatus==3)
					{
						if($(".buttonBg").hasClass('lgtgrey_bg'))
						{
							$(".buttonBg").addClass('green_bg');
							$(".buttonBg").removeClass('lgtgrey_bg');
						}
					}
				}
			}
			
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
			 

function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					 
					$("#error_msg_form").html('Please provide a valid email address');
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}



			function register(id)
			{
				$("#error_msg_form").html('');
				 
				 if($("#name").val()=="" || $("#name").val()==null)
				{
				
					$("#error_msg_form").html('please enter name.');
					return false;
				}	
				
				 if($("#lname").val()=="" || $("#lname").val()==null)
				{
				
					$("#error_msg_form").html('please enter last name.');
					return false;
				}	
				if($("#email").val()=="" || $("#email").val()==null)
				{
				
					$("#error_msg_form").html('please enter email address.');
					return false;
				}
				 
				if(!checkEmail("email"))
				{
				 
				$("#error_msg_form").html("please enter correct email format");
					return false;
				}
				if($("#cntry").val()=="" || $("#cntry").val()==null)
				{
				
					$("#error_msg_form").html('please select country of residense.');
					return false;
				}	
				 	
				 if($("#uphno").val()=="" || $("#uphno").val()==null)
				{
				
					$("#error_msg_form").html('please enter phone number.');
					return false;
				}
				 if($("#ssn").val()=="" || $("#ssn").val()==null)
				{
				
					$("#error_msg_form").html('please enter social security number.');
					return false;
				}
				
				if($("#pnumber").val()=="" || $("#pnumber").val()==null)
				{
				
					$("#error_msg_form").html('please enter port number.');
					return false;
				}
				
				if($("#adrs1").val()=="" || $("#adrs1").val()==null)
				{
				
					$("#error_msg_form").html('please enter complete address.');
					return false;
				}
				else
				{
					if($('#lstatus').val()==0)
					{
				var send_data={};
						send_data.address=encodeURIComponent($("#adrs1").val());
						$.ajax({
							type:"POST",
							url:"../checkAddress",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#error_msg_form').html('we cant find address. Please add coordinates');
									$('#lstatus').val(1);
									return false;									 
								}
								else 
								{
									var obj = JSON.parse(data1);
									$("#adrs1").val(obj[0]['display_name']);
									 
									$('#locationDetail').attr('style','display:block;');
									$("#latit").val(obj[0]['lat']);
									
									$("#longi").val(obj[0]['lon']);	
									document.getElementById('save_indexing').submit()
								}
							}
						});	
					}
					
					if($('#lstatus').val()==1)
					{
				var send_data={};
						send_data.address=encodeURIComponent($("#adrs1").val());
						send_data.lat=($("#latit").val());
						send_data.lon=($("#longi").val());
						$.ajax({
							type:"POST",
							url:"../checkAddresslatLong",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#error_msg_form').html('we cant find address. Please enter valid coordinates');
									$('#lstatus').val(1);
									return false;									 
								}
								else 
								{
									var obj = JSON.parse(data1);
									$("#adrs1").val(obj['display_name']);
									 
									$('#locationDetail').attr('style','display:block;');
									 
									document.getElementById('save_indexing').submit()
								}
							}
						});	
					}
				}
				//document.getElementById('save_indexing').submit();
			}
			
			function showMeeting(id)
			{
				if(id==1)
				{
					$('#mLocation').removeClass('marb35');
					$('#mLocation1').attr('style','display:block;');
				}
				else
				{
					$('#mLocation').removeClass('marb35');
					$('#mLocation').addClass('marb35');
					$('#mLocation1').attr('style','display:none;');
				}
			}
			
			 
				
				function changeClass(link)
				{
					
					$(".class-toggler").removeClass('active');
					
				}
				
				
				
				 
			
		</script>
			
			
</head>
<?php $path1 = $path."html/usercontent/images/"; ?>
<body class="white_bg ffamily_avenir" >
	
	<div class="column_m header  xs-hei_55p bs_bb white_bg" >
				<div class="wi_100 hei_65p  xs-hei_55p xs-pos_fix padtb5 padrl10 white_bg">
				<div class="fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../CoronaHelp" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"  ><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 	<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel   marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  fsz30  black_txt_h" style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr0 padr0 padt10  brdwi_3"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz30  " style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </div>
				<div class="clear"></div>
			</div>
		</div>
	 
	<div class="clear"></div>
	
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100  black_txt xxs-fsz45 padb10 trn ffamily_avenir" >About</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Fill in your details below.</a></div>
							 
								 	
							 
								
								<form action="../registerYourself/<?php echo $data['rid']; ?>" method="POST" name="save_indexing" id="save_indexing"  accept-charset="ISO-8859-1">
									 	<div class="on_clmn mart10  ">
											<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											
										<input type="text" name="name" id="name" data-translate="Name" placeholder="Name"   class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir "  >
									</div>
										</div>
										<div class="thr_clmn  wi_50 padl10"  >
											
										<div class="pos_rel">
											
												<input type="text" name="lname" id="lname" data-translate="Lastname" placeholder="Lastname"   class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"   >
											</div>
										</div>
										
									</div>
										<div class="on_clmn mart20 ">
											 
										<div class="pos_rel">
									
										<input type="text" name="email" id="email" data-translate="Your email" placeholder="Your email" value="" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt xxs-minhei_60p brdb_red_ff2828 ffamily_avenir ">
									</div>
									</div>
									
								 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 "  >
										<div class="pos_rel">
											
										 
											<select class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0" name="cntry" id="cntry"  style="text-align-last:center;">
											<option value="">Select</option>
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg lgt_grey_txt  tall">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>                            
											</select>
										 
									</div>
										</div>
										<div class="thr_clmn  wi_70 padl20"  >
											
										<div class="pos_rel">
											
												<input type="number" name="uphno" id="uphno" data-translate="Your mobile phone" placeholder="Your mobile phone"   class="wi_100  pad10   talc xxs-minhei_60p minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir "  >
											</div>
										</div>
										
									</div>
									
								<div class="on_clmn mart20 ">
											 
										<div class="pos_rel">
									
										<input type="text" name="ssn" id="ssn" data-translate="Social security number" placeholder="Social security number" value="" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt xxs-minhei_60p brdb_red_ff2828 ffamily_avenir ">
									</div>
									</div>
									 
													
													
									<div class="on_clmn mart20  ">
												
												
												<div class="wi_70 thr_clmn padr20">
												<div class="pos_rel"  >
													
													
													<input type="text" name="adrs1" id="adrs1"   placeholder="Finns på adress" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"  >
												</div>
												</div>
												<div class="wi_30 thr_clmn">
												<div class="pos_rel"  >
													
													
													<input type="text" name="pnumber" id="pnumber"   placeholder="Port number" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"  >
												</div>
												
												 	</div>
												 	</div>
													
													<div id="locationDetail" style="display:none">
													<div class="on_clmn mart20 ">
												
												
												
												<div class="pos_rel"  >
													
													
													<input type="text" name="latit" id="latit"   placeholder="Latitude" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"  >
												</div>
												
												 	</div>
													
													<div class="on_clmn mart20 ">
												
												
												
												<div class="pos_rel"  >
													
													
													<input type="text" name="longi" id="longi"   placeholder="Longitude" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir"  >
												</div>
												
												 	</div>
													</div>
							
						</form>
						
						 
							<div class="clear"></div>
							<input type="hidden" id="lstatus" name="lstatus" value='0' />
						 <div class="valm fsz20 red_txt marb35" id="error_msg_form"> </div>
						<div class="talc padtb20"> <a href="javascript:void(0);" onclick="register();"  ><input type="button" value="Register" class="ffamily_avenir forword hei_55p fsz18 t_67cff7_bg"  ></a>
									
								 		
									
									</div>
						
									
									 
						<div class="clear"></div>
					</div>
					
					
				</div>
				
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	</div>
	 
	
	<!-- Wizard script -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		
</body>
</html>