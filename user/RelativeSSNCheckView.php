
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Connect Kin.">
    <meta name="author" content="Ansonika">
    <title>Qmatchup</title>

    <!-- Favicons
    <link rel="shortcut icon" href="<?php echo $path;?>html/kincss/img/favicon.ico" type="image/x-icon">-->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo $path;?>html/kincss/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo $path;?>html/kincss/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo $path;?>html/kincss/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo $path;?>html/kincss/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="<?php echo $path;?>html/kincss/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $path;?>html/kincss/css/menu.css" rel="stylesheet">
    <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
	<link href="<?php echo $path;?>html/kincss/css/vendors.css" rel="stylesheet">
	
    <!-- YOUR CUSTOM CSS -->
    <link href="<?php echo $path;?>html/kincss/css/custom.css" rel="stylesheet">
	
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>
			
	<script src="<?php echo $path;?>html/kincss/js/modernizr.js"></script>
	
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
    </script>
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
				
				if($("#ssn").val()=="")
				{
					$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("please enter personal number !!!");
					return false;
				}
				
				else if($("#ssn").val().length < 12 || $("#ssn").val().length > 12) 
				{
					
					$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("Personal number must be 12 digit numeric value !!!");
					return false;
					
				}
				else
				{
					var send_data={};
					send_data.ssn=$("#ssn").val();
					$.ajax({
						url: '../../../checkRelativeSsn/<?php echo $data['parent_id']; ?>/<?php echo $data['kin_id']; ?>/<?php echo $data['kin_user_id']; ?>',
						type: 'POST',
						dataType: 'json',
						data: send_data
					})
					.done(function(data1){
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
						else if(data1==3)
						{
						$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("Another user with given personal number already exist !!!");
					return false;
						}
						else
						{
							document.getElementById("save_indexing").submit();
							
						}
					})
					.fail(function(){})
					.always(function(){});
					
					
					
				}
				
				
				
			}
			
			function submit_form_connect()
			{
				
				$("#save_info_connect").submit();
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
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
	</div><!-- /loader_form -->
	
	<nav>
		<ul class="cd-primary-nav">
			<li><a href="#" class="animated_link">Home</a></li>
			<li><a href="#" class="animated_link">Quote Version</a></li>
			<li><a href="#" class="animated_link">Review Version</a></li>
			<li><a href="#" class="animated_link">Registration Version</a></li>
			<li><a href="#" class="animated_link">About Us</a></li>
			<li><a href="#" class="animated_link">Contact Us</a></li>
		</ul>
	</nav>
	<!-- /menu -->
	
	<div class="container-fluid full-height">
		<div class="row row-height">
			<div class="col-lg-6 content-left">
				<div class="content-left-wrapper">
					<a href="#" id="logo"><img src="<?php echo $path;?>html/kincss/img/logo.png" alt="" width="49" height="35"></a>
					
					<!-- /social -->
					<div>
						<figure><img src="<?php echo $path;?>html/kincss/img/info_graphic_1.svg" alt="" class="img-fluid"></figure>
						<h2>Satisfaction Survey</h2>
						<p>Tation argumentum et usu, dicit viderer evertitur te has. Eu dictas concludaturque usu, facete detracto patrioque an per, lucilius pertinacia eu vel. Adhuc invidunt duo ex. Eu tantas dolorum ullamcorper qui.</p>
						<a href="#" class="btn rounded">Purchase this template</a>
						<a href="#start" class="btn_1 rounded mobile_btn">Start Now!</a>
					</div>
					<div class="copy ">© 2018 Wilio</div>
				</div>
				<!-- /content-left-wrapper -->
			</div>
			<!-- /content-left -->

			<div class="col-lg-6 content-right" id="start">
				<div id="wizard_container">
					
						<form action="../../../updateInformation/<?php echo $data['parent_id']; ?>/<?php echo $data['kin_id']; ?>/<?php echo $data['kin_user_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
							
							<!-- Leave for security protection, read docs for details -->
							<div >
								<div class="step">
									<h3 class="main_question">Please provide security details</h3>
									<div class="form-group">
										<input type="text" name="ssn" id="ssn" placeholder="Personal number" class="form-control required" <?php if($getKinSSN['ssn']!="" && $getKinSSN['ssn']!=null && $getKinSSN['ssn']!=0) echo 'readonly'; ?> value="<?php echo $getKinSSN['ssn']; ?>" />
									</div>
								<div class="on_clmn martb10 xxs-mart10 ">
											
											<div class="pos_rel">
												
												<select id="permission_type" name="permission_type" class=" default_view wi_100 mart5 rbrdr pad10  lgtgrey2_bg hei_50p fsz18 llgrey_txt"  >
														
														<option value="1" class="lgtgrey2_bg">Drop in</option>
														     <option value="2" class="lgtgrey2_bg">Pick up</option>
															<option value="3" class="lgtgrey2_bg">Both</option>
														
													</select>
												
											</div>
											
											
											
										</div>
										
										
									<!-- /row -->
									<div class="form-group terms hidden">
										<label class="container_check">Please accept our <a href="#" data-toggle="modal" data-target="#terms-txt">Terms and conditions</a>
											<input type="checkbox" name="terms" value="Yes" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>2/5</strong>How do rate your overall satisfaction about the service provided?</h3>
									<div class="form-group">
										<label class="container_radio version_2">Not Satisfied
											<input type="radio" name="question_1" value="Not Satisfied" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_radio version_2">Quite Satisfied
											<input type="radio" name="question_1" value="Quite Satisfied" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_radio version_2">Satisfied
											<input type="radio" name="question_1" value="Satisfied" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_radio version_2">Completely Satisfied
											<input type="radio" name="question_1" value="Completely Satisfied" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>

									<div class="form-group">
										<label class="container_radio version_2">Extremely Satisfied
											<input type="radio" name="question_1" value="Extremely Satisfied" class="required" onchange="getVals(this, 'question_1');">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>3/5</strong>How did you hear about our company?</h3>
									<div class="form-group">
										<label class="container_check version_2">Google Search Engine
											<input type="checkbox" name="question_2[]" value="Google Search Engine" class="required" onchange="getVals(this, 'question_2');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">A friend of mine
											<input type="checkbox" name="question_2[]" value="A friend of mine" class="required" onchange="getVals(this, 'question_2');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Print Advertise
											<input type="checkbox" name="question_2[]" value="Print Advertise" class="required" onchange="getVals(this, 'question_2');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Newspaper
											<input type="checkbox" name="question_2[]" value="Newspaper" class="required" onchange="getVals(this, 'question_2');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_check version_2">Other
											<input type="checkbox" name="question_2[]" value="Other" class="required" onchange="getVals(this, 'question_2');">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
								<!-- /step-->
								<div class="step">
									<h3 class="main_question"><strong>4/5</strong>Do you think to suggest our company to a friend or parent?</h3>
									<div class="form-group">
										<label class="container_radio version_2">No
											<input type="radio" name="question_3" value="No" class="required" onchange="getVals(this, 'question_3');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_radio version_2">Maybe
											<input type="radio" name="question_3" value="Maybe" class="required" onchange="getVals(this, 'question_3');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_radio version_2">Probably
											<input type="radio" name="question_3" value="Probably" class="required" onchange="getVals(this, 'question_3');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label class="container_radio version_2">100% Sure
											<input type="radio" name="question_3" value="100% Sure" class="required" onchange="getVals(this, 'question_3');">
											<span class="checkmark"></span>
										</label>
									</div>
									<div class="form-group">
										<label>In no, please describe with few words why</label>
										<textarea name="additional_message" class="form-control" style="height:100px;" placeholder="Type here additional info..." onkeyup="getVals(this, 'additional_message');"></textarea>
									</div>
								</div>
								<!-- /step-->
								<div class="submit step hidden">
									<h3 class="main_question"><strong>5/5</strong>Summary</h3>
									<div class="summary">
										<ul>
											<li><strong>1</strong>
												<h5>How do rate your overall satisfaction about the service provided?</h5>
												<p id="question_1"></p>
											</li>
											<li><strong>2</strong>
												<h5>How did you hear about our company?</h5>
												<p id="question_2"></p>
											</li>
											<li><strong>3</strong>
												<h5>Do you think to suggest our company to a friend or parent?</h5>
												<p id="question_3"></p>
												<p id="additional_message"></p>
											</li>
										</ul>
									</div>
								</div>
								<!-- /step-->
							</div>
							<!-- /middle-wizard -->
							<div id="bottom-wizard">
								<button type="button" name="backward" class="backward">Prev</button>
								<button type="button" name="forward" class="forward" onclick="submitform();">Submit</button>
								<button type="submit" name="process" class="submit">Submit</button>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		</div>
		<!-- /row-->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	</div>
	<!-- /container-fluid -->

	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- /cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- /cd-overlay-content -->

	<a href="#" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>
	<!-- /menu button -->
	
	<!-- Modal terms -->
	<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="termsLabel">Terms and conditions</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
					<p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn_1" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.modal -->
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
		
	<!-- COMMON SCRIPTS -->
	<script src="<?php echo $path;?>html/kincss/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $path;?>html/kincss/js/common_scripts.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/velocity.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/functions.js"></script>

	<!-- Wizard script -->
	<script src="<?php echo $path;?>html/kincss/js/survey_func.js"></script>
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