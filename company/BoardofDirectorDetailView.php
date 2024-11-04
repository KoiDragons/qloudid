<?php
	$path1 = $path."usercontent/images/"; 
	
?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnew.css" />
	
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer>
			</script>
	<script>
	
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
			
			$("#errorMsg").html('');
			 if($("#first_name").val()=="" || $("#first_name").val()=="")
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please enter first name of board member');
				return false;
			}
			 if($("#last_name").val()=="" || $("#last_name").val()=="")
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please enter last name of board member');
				return false;
			}
			else if($("#memail").val()=="" || $("#memail").val()=="")
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please enter member email');
				return false;
			}
			else if($("#memail").val()!="" || $("#memail").val()!="")
			{
				var send_data={};
				send_data.memail=$("#memail").val();
				
				$.ajax({
					type:"POST",
					url:"../checkEmail/<?php echo $data['cid']; ?>",
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
							$("#errorMsg").html('Please enter unique member email');
							return false;
						}
						else
						{
							
			 if($("#country").val()==0)
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please choose Country');
				return false;
			}
			
			else if($("#pnumber").val()=="" || $("#pnumber").val()=="")
			{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html('Please enter phone number');
				return false;
			}
			
			else if($("#pnumber").val()!="" || $("#pnumber").val()!="")
			{
				var send_data={};
				send_data.pnumber=$("#pnumber").val();
				send_data.country=$("#country").val();
				$.ajax({
					type:"POST",
					url:"../checkPhone/<?php echo $data['cid']; ?>",
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
							$("#errorMsg").html('Please enter unique Phone Number');
							return false;
						}
						else
							{
							document.getElementById('save_indexing').submit();
							}
					}
				});
			}
			
				}
					}
				});
			}
			
				
							
			
			
		}
		
		
		
				
			</script>
			
			
		</head>
		
	</head>
	<body class="white_bg">
		<?php $path1 = $path."html/usercontent/images/"; 
		include 'CompanyHeaderClosed.php';
		?>
		
		<div class="column_m pos_rel">
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz60  padb10 black_txt trn">Styrelse</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Registrera och bjud in styrelseledamöter och ordförande.</a></div>
								
								 
					
						<div class="container padrl0 xs-padrl0">
							
							
							<form action="../addMember/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
									<div class="on_clmn  mart10 " >
											<div class="pos_rel">
													<select id="mtype" name="mtype" class="default_view wi_100 mart0 trans_bg input1 nobold  dropdown-bg  nobrdr nobrdt nobrdl brdb  fsz16  minhei_65p  llgrey_txt tall padl0"  style="text-align-last:center;">
													<?php if($directorCount['num']==0) { ?>
														<option value="1" >Ordförande</option>
													<?php } ?>
													<?php if($bmemberCount['num']<14) { ?>
														<option value="2">Ledamot</option>
														<?php } ?>
													</select>
												</div>
											</div>
										
										<div class="on_clmn  mart10" >
											<div class="thr_clmn  wi_50 padr10"  >
											<div class="pos_rel">
											<input type="text" name="first_name" id="first_name" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" placeholder="Name" >
											</div></div>
										
										<div class="thr_clmn  wi_50 "  >
											<div class="pos_rel">
											<input type="text" name="last_name" id="last_name" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" placeholder="Last Name" >
											</div>
											</div>
										</div>
										<div class="on_clmn  mart10 " >
											<div class="pos_rel">
											<input type="text" name="memail" id="memail" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" placeholder="Email" >
											</div>
											</div>
										
											<div class="on_clmn  mart10 marb25" >
											<div class="thr_clmn  wi_50 padr10"  >
											<div class="pos_rel">
												<select name="country" id="country" class="default_view wi_100 mart0 input1 nobold  dropdown-bg  trans_bg nobrdr nobrdt nobrdl brdb  fsz16  minhei_65p  llgrey_txt tall padl0"  style="text-align-last:center;">
													
													<?php  foreach($resultContry as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($value['id']==$companyDetail['country_id']) echo 'selected'; ?>><?php echo $value['country_name']; ?></option>
													<?php 	}	?>
													
													
												</select>
												
											</div>
											</div>
											
											<div class="thr_clmn  wi_50 "  >
											<div class="pos_rel">
											<input type="text" name="pnumber" id="pnumber" class=" wi_100 rbrdr pad10  brdb talc  minhei_65p fsz18 llgrey_txt" placeholder="Phone nr" >
											</div>
											</div>
											
											</div>
											
										
										
										
								<input type="hidden" id="indexing_save" name="indexing_save" />
								
							</form>
						</div>
						<?php if($memberCount['num']==15) { ?>
						<div class="talc  "> <a href="#"><input type="button" value="Lägg till" class="forword minhei_55p"  ></a>
										
									
									</div>
						
						<?php } else { ?>
						
						<div class="talc  "> <a href="#" onclick="submitform();"><input type="button" value="Lägg till" class="forword minhei_55p"  ></a>
										
									
									</div>
						
						<?php } ?>
					</div>
				</div>
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
	 
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	You have already added maximum Members. </div>
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	</body>
	<?php 
		if(isset($_GET['error']))
		{
			if($_GET['error']==1)
			{
				echo '<script>alert("Some error occured while completing your request !!!")</script>';	
			}
			else if($_GET['error']==2)
			{
				echo '<script>alert("You have an active employee for the same email !!!")</script>';	
			}
		}
	?>							