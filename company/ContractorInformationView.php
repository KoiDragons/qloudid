<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
	
	<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
   
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
		 
			function submitForm()
			{
				var submit_form=true;
				$("#errorMsg1").html('');
				if($("#first_name").val()=="" || $("#first_name").val()==null)
				{
				 
				$("#errorMsg1").html("please enter first name !!!");
				submit_form=false;
					return false;
				}
				
				if($("#last_name").val()=="" || $("#last_name").val()==null)
				{
				 
				$("#errorMsg1").html("please enter last name !!!");
				submit_form=false;
					return false;
				}
				 
				
				if($("#email_address").val()=="" || $("#email_address").val()==null)
				{
				 
				$("#errorMsg1").html("please enter email !!!");
				submit_form=false;
					return false;
				}
				else 
				{
					var send_data = {};
					send_data.email_address=$("#email_address").val();
				$.ajax({
					type:"POST",
					url:"../checkEmailInfo/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1>0)
						{
							 
							$("#errorMsg1").html("This person is already invited please select enter other email!!!");
							submit_form=false;
							return false;
						}
						else
						{
						 
						document.getElementById("save_indexing").submit();
						 }
								
					}
				});
				}
				
			} 
</script>	
	
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg" >
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 <div class="clear"></div>
	<!-- /menu -->
	
	  <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 "  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_550p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0">
								<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir">Contractor</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please provide contractor information</a></div>
				  
								 
									<form action="../inviteContractor/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
									<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
										<div class="pos_rel talc">
									 
									 <input type="text" name="first_name" id="first_name" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"  > 
												 <label for="first_name" class="floating__label tall nobold padl10" data-content="First name">
											<span class="hidden--visually">
											 Street address</span></label>
									 
										 
									 
									</div>
								
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											 
											
											 <input type="text" name="last_name" id="last_name" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" > 
												 <label for="last_name" class="floating__label tall nobold padl10" data-content="Last name">
											<span class="hidden--visually">
											 Street address</span></label>
										</div>
									</div>
									</div>
									<div class="on_clmn padt10"> 
											 
											 <div class="pos_rel">
												
												<input type="text" name="email_address" id="email_address" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"  > 
												 <label for="email_address" class="floating__label tall nobold padl10" data-content="Email">
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											 
											 
											 
											</div>
											
											
											<div class="on_clmn mart20 ">
											
											 
												
												<div class="pos_rel">
													
													<select id="location_id" name="location_id" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25 wi_100">
													 
														<?php  
										foreach($locationDetail as $category => $value) 
												{
													
													
												?> 
																													
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"><?php echo $value['visiting_address']; ?></option>
																													
															 
												<?php } ?>													
													</select>
													<label for="location_id" class="floating__label tall nobold padl10" data-content="Location">
											<span class="hidden--visually">
											  Country</span></label>
												</div>
											 
											
											 
											
											
										</div>
											
											
									 <div class="clear"></div>
									 <div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								<div class=" xxs-talc talc mart35">
								
								<button type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18" onclick="submitForm();">Submit</button>
								
							</div>
									
								</div>
									
							</div>
							
						</form>
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
</html>