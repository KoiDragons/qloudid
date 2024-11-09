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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
	<script>
	function addType(id)
	{
		var getValue=$('#bedding_type').val();
		if($('#'+id).hasClass('green_bg'))
		{
			$('#'+id).removeClass('green_bg');
			$('#'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#bedding_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_bg');
			$('#'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#bedding_type").val(getValue);
		}
		
	}
	
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
		function changeDetail()
		{
			$("#errorMsg1").html('');
			$("#userEmail").attr('style','display:none');
			$("#indexing_save").val(0);
		}
		function submitform()
		{
			
			$("#errorMsg1").html('');
			if($("#indexing_save").val()==0)
			{
				 if($("#country_id").val()==0)
				{
					
					$("#errorMsg1").html('Please select country');
					return false;
				}
			
				if($("#phone_number").val()=='' || $("#phone_number").val()==null)
				{
					
					$("#errorMsg1").html('Please enter phone number');
					return false;
				}
			  if($("#phone_number").val().charAt(0)==0) 
				{
					$("#errorMsg1").html('Phone number cant start with Zero');
					return false;
				}
				 if(isNaN($("#phone_number").val())) 
				{
					$("#errorMsg1").html('Phone number must be a numeric value');
					return false;
				}
				 if($("#phone_number").val().length<5) 
				{
					$("#errorMsg1").html('Phone number must be minimum five digit');
					return false;
				}
				 if($("#phone_number").val()==0) 
				{
					$("#errorMsg1").html('Phone number can not be Zero');
					return false;
				}
				
				
				var send_data={};
					send_data.countryname=$("#country_id").val();
					send_data.phoneno=$("#phone_number").val();
					$.ajax({
						type:"POST",
						url:"../../../checkUserQloudInfo",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							 
							if(data1==0)
							{
									document.getElementById('save_indexing').submit();
							}
							else
							{
								$("#userEmail").attr('style','display:block');
								$("#indexing_save").val(data1);
								$("#errorMsg1").html('Please provide more information');
								return false;
							}
							
						}
					});
			}
		else
		{
			 if($("#country_id").val()==0)
				{
					
					$("#errorMsg1").html('Please select country');
					return false;
				}
			
				if($("#phone_number").val()=='' || $("#phone_number").val()==null)
				{
					
					$("#errorMsg1").html('Please enter phone number');
					return false;
				}
			  if($("#phone_number").val().charAt(0)==0) 
				{
					$("#errorMsg1").html('Phone number cant start with Zero');
					return false;
				}
				 if(isNaN($("#phone_number").val())) 
				{
					$("#errorMsg1").html('Phone number must be a numeric value');
					return false;
				}
				 if($("#phone_number").val().length<5) 
				{
					$("#errorMsg1").html('Phone number must be minimum five digit');
					return false;
				}
				 if($("#phone_number").val()==0) 
				{
					$("#errorMsg1").html('Phone number can not be Zero');
					return false;
				}
				if($("#email").val()=='' || $("#email").val()==null)
				{
					
					$("#errorMsg1").html('Please enter guest email');
					return false;
				}
				document.getElementById('save_indexing').submit();
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
                        <a href="https://www.safeqloud.com/company/index.php/HotelStay/roomsList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/HotelStay/roomsList/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  >Check-in</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please provide the guest information.</a></div>
					 
			 
					  
					 
							
							<form action="../../../addGuestInfo/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['rid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											
											 
											
											 
											
											 <div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												
												<input type="date" name="check_in" id="check_in"  value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir"   /> 
												
											</div>
											</div>
											<div class="thr_clmn  wi_50 padl10">
											<div class="pos_rel">
												
												<input type="date" name="check_out" id="check_out" value="<?php $date = date("Y-m-d"); echo  date('Y-m-d',strtotime($date."+ 1 days")); ?>"  class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" min="<?php $date = date("Y-m-d"); echo  date('Y-m-d',strtotime($date."+ 1 days")); ?>"/> 
												
											</div>
											</div>
										</div>
										
									
											
								 
									 
								 </div>
								 
								
								<div class="on_clmn mart20 ">
								<div class="thr_clmn  wi_30 padr10">
											<div class="pos_rel">
												
												<select name="country_id" id="country_id"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828  fsz18  minhei_65p xxs-minhei_60p trans_bg dropdown-bg red_f5a0a5_txt tall padl0 ffamily_avenir" style="text-align-last:center;" onchange="changeDetail();"> 
											 <option value="0">Select country</option> 
													 
															<?php  foreach($countryOption as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														
														<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" >+<?php echo $value['country_code']; ?></option>
													<?php 	}	?>
											</select>
												
											</div>
											</div>
											<div class="thr_clmn  wi_70 padl10" >
											<div class="pos_rel">
												
												<input type="number" name="phone_number" id="phone_number" placeholder="Phone number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" onchange="changeDetail();" /> 
												
											</div>
											</div>
											
										</div>
										
										 
										
										 
											
											<div class="on_clmn mart20 " id="userEmail" style="display:none">
								 
											<div class="pos_rel">
												
												<input type="text" name="email" id="email" placeholder="Guest email" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"/> 
												
											</div>
											 
											 
										</div>
									 
									 	 	
									 
										
										 <input type="hidden" id="indexing_save" name="indexing_save" value="0" />
										   <div class="clear"></div>
								<div class="red_txt fsz20 talc mart35" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Check in" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
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