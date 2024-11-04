
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="theme-color" content="<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f5f5f5"; else echo $corporateColor['bg_color']; ?>" />
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
	
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
			
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
			function expressEntry()
			{
				document.getElementById('save_indexing').submit();
			}

			function informEmployee(id)
			{
				$("#error_msg_form").html('');
				if($("#ind").val()=="" || $("#ind").val()==0 || $("#ind").val()==null)
				{
				document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please select employee');
					return false;
				}
				
				if($("#name").val()=="" || $("#name").val()==null)
				{
				document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter name');
					return false;
				}
				
				if($("#lname").val()=="" || $("#lname").val()==null)
				{
					document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter last name');
					return false;
				}
				
				
				
				
				if($("#uphno").val()=="" || $("#uphno").val()==null)
				{
					document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter phone number');
					return false;
				}
				else if(isNaN($("#uphno").val())) {
					document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					alert("Phone number must be a numeric value!!");
					return false;
				}			
				else{
					var send_data={};
					send_data.booked=$("#booked").val();
					send_data.ind=$("#ind").val();
					send_data.name=$("#name").val();
					send_data.lname=$("#lname").val();
					send_data.cname=$("#cname").val();
					send_data.email=$("#email").val();
					send_data.cntry=$("#cntry").val();
					send_data.uphno=$("#uphno").val();
					send_data.car_res_num=$("#car_res_num").val();
					$('#loginBank').attr('style','display:none;');
					$('#processing').attr('style','display:block;');
					$('.footer').addClass('hidden');
					$.ajax({
						type:"POST",
						url: "../informEmployee/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							 
						window.location.href ="https://www.qloudid.com/company/index.php/Company/visitorsThanks/<?php echo $data['cid']; ?>";
						}
					});
				}
				
			}
			
			
		</script>
			
			
</head>

<body class="white_bg">
	
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
		<div class="column_m container zi5  mart40 xs-mart40" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 mart40 xs-pad0">
					
						<div class="padb20 xxs-padb0 ">
							
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class=" talc">
									
									
									
									
									<!-- Logo -->
									<h1 class="fsz25 bold">Vem kan vi hälsa ifrån?</h1>
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz20 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Fyll i dina uppgifter nedan. Om du har ett digitalt visitkort från Qard kan du använda det som express registrering...</a></div></div>
										
								
							</div>
						
							<div class="container   fsz14 dark_grey_txt padt30">
								
								
								<form action="" method="POST" name="collaborators-form" id="collaborators-form">
							<!-- Leave for security protection, read docs for details -->
							<div class="hei_160p">
								<div class="step">
								
									<input type="hidden" name="booked" id="booked" value="Drop in" />
									
									
									<div class="row">
									<div class="col-5">
											<div class="form-group">
										<input type="text" name="name" id="name" placeholder="Namn" value="<?php  echo $userInformation['first_name']; ?>" class="fsz18 brdb_new brdrad3 wi_100 nobrdr nobrdt nobrdl transbg required hei_55p  tall dark_grey_txt" <?php  echo 'readonly'; ?>>
									</div>
										</div>
										<div class="col-7">
											<div class="form-group">
												<input type="text" name="lname" id="lname" value="<?php  echo $userInformation['last_name']; ?>" placeholder="Efternamn" class="fsz18 brdb_new brdrad3 wi_100 nobrdr nobrdt nobrdl transbg required hei_55p  tall dark_grey_txt" <?php  echo 'readonly'; ?>>
											</div>
										</div>
										
									</div>
									
									
									<div class="form-group">
										<input type="text" name="cname" id="cname" value="<?php  echo $userInformation['company_name']; ?>" placeholder="Ditt företag" class="fsz18 brdb_new brdrad3 wi_100 nobrdr nobrdt nobrdl transbg required hei_55p  tall dark_grey_txt" >
									</div>
									
									<div class="form-group">
										<input type="text" name="email" id="email" value="<?php  echo $userInformation['visitor_email']; ?>" placeholder="Email" class="fsz18 brdb_new brdrad3 wi_100 nobrdr nobrdt nobrdl transbg required hei_55p  tall dark_grey_txt" <?php  echo 'readonly'; ?>>
									</div>
									
									<div class="row">
									<div class="col-6">
											<div class="form-group">
										<div class="styled-select clearfix fsz18">
											<select class="default_view wi_100 mart0 trans_bg nobrdr nobrdt nobrdl brdb_new  fsz18  hei_55p  dark_grey_txt tall padl0" name="cntry" id="cntry" disabled>
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php  if($value['id']==$userInformation['country_id']) echo 'selected';  ?> class="lgtgrey2_bg fsz18 tall"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>                            
											</select>
										</div>
									</div>
										</div>
										<div class="col-6">
											<div class="form-group nobrd">
												<input type="number" name="uphno" id="uphno" value="<?php  echo $userInformation['phone_number']; ?>" placeholder="Mobil" class="fsz18 brdb_new brdrad3 wi_100 nobrdr nobrdt nobrdl transbg required hei_55p  tall dark_grey_txt" readonly>
											</div>
										</div>
										
									</div>
									
									
										<input type="hidden" name="car_res_num" id="car_res_num" placeholder="Din bils reg nr." class="form-control required" >
									
									
									<input type="hidden" id="ind" name="ind" value="<?php echo $employeeQuardInformation['id']; ?>"/>
								
									<!-- /row -->
									<div class="form-group terms hidden">
										<label class="container_check">Please accept our <a href="#" data-toggle="modal" data-target="#terms-txt">Terms and conditions</a>
											<input type="checkbox" name="terms" value="Yes" class="required">
											<span class="checkmark"></span>
										</label>
									</div>
								</div>
									
								
								</div>
													
						</form>
						
						
							<div class="clear"></div>

						</div>
						
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
				
					<div class="clear"></div>
									
									<div class="wi_100  talc  padb20 mart200 padt10 xxs-mart300">
										<a href="javascript:void(0);" class="wi_360p maxwi_100 minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 lgtgrey_bg bold fsz18 xs-fsz16 darkgrey_txt trans_all2 change_button "  onclick="informEmployee();">Meddela</a>
										
									</div>
			</div>
			<!-- /content-left -->

		
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
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey_bg fsz14 brdrad10 popup_shadow" id="gratis_popup_nochild">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey_bg">
			
			
			<div class="pad25 lgtgrey_bg brdradtr10">
				<img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Du måste....</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Du måste välja ett eller flera barn genom att klicka och markera de som du är där för att hämta. </span>
				</div>
				
				
			</div>
			<div class="on_clmn padt20">
				<input type="button" value="Stäng" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold">
				
			</div>
	</div>
	
	</div>
	<!-- /.modal -->
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
	<script>
			
			function updateInd(id)
			{
				
				$("#ind").val(id);
			}
			// Collborators autocomplete
			function updateForm()
			{
			var $col_cont = $('#collaborators-container'),
			$col_form = $("#collaborators-form"),
			$lookup = $("#collaborators-lookup");
			
			if($col_cont[0] && $lookup[0]){
				$lookup
				.on('change keyup', function(){
					var $this = $(this),
					$parent = $this.parent();
					if($this.val().trim().length > 0){
						$parent.addClass('active');
					}
					else{
						$parent.removeClass('active');
					}
				})
				.autocomplete({
					source: function(request, response) {
						$.ajax({
							url: "DropoffChild/relativeList",
							data: {
								filter: request.term,
								ssn: $("#ssn").val()
							}
						})
						.done(function(data){
							data = JSON.parse(data);
							$("#ind").val('');
							response(data);
							/*
								if(data.length > 0){
								response(data);
								}
								else{
								data.push({'id' : -1, 'label' : 'No matches found'});
								response(data);
								}
							*/
						});
					},
					minLength: 1,
					select: function( event, ui ) {
						var item = ui.item;
						if(item.id !== -1){
							var indset=item['id'];
							
							$lookup.data('item', item);
							event.target.value = item['label'];
							$("#ind").val(indset);
						}
						else{
							//var inds=$("#ind").val()+",";
							$lookup.removeData('item');
							event.target.value = '';
							//id_val=id_val.replace(id_val1, "");
						}
						return false;
					}
				});
			}
				$col_form.on('submit', function(){
					var item = $lookup.data('item'),
					val = $lookup.val().trim();
					
					if(item && val === item['label']){
						console.log(1);
						var col_html = '<div class="collaborator-row dflex alit_c pos_rel mart10">';
						if(item.image){
							col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 bgir_norep bgip_c bgis_cov" style="background-image: url(' + item.image + ')"></div>';
						}
						else{
							var fl = item['first-name'] ? item['first-name'].charAt(0) : (item['last-name'] ? item['last-name'].charAt(0) : (item['email'] ? item['email'].charAt(0) : '?'));
							col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + fl.toUpperCase() + '</div>';
						}
						
						col_html += '<div class="flex_1 padr40 padl15 fsz13">';
						if(item['first-name'] || item['last-name']){
							col_html += '<div><strong>' + item['first-name'] + ' ' + item['last-name'] +  '</strong></div>';
						}
						if(item['email']){
							col_html += '<div class="txt_0_54">' + item['email'] + '</div>';
						}
						col_html += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
						
						$col_cont.append(col_html);
						
						$lookup
						.val('')
						.parent()
						.removeClass('active');
					}
					else{
						if(val.length > 3 && val.indexOf('@') > -1 && val.indexOf('.') > -1){
							console.log(2);
							var col_html = '<div class="collaborator-row dflex alit_c pos_rel mart10">';
							col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + val.charAt(0).toUpperCase() + '</div>';
							col_html += '<div class="flex_1 padr40 padl15 fsz13">';
							col_html += '<div><strong>' + val +  '</strong></div>';
							col_html += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							$col_cont.append(col_html);
							
							$lookup
							.val('')
							.parent()
							.removeClass('active');
						}
					}
					return false;
				});
			}
		</script>
			
	<!-- COMMON SCRIPTS -->
	<script src="<?php echo $path;?>html/kincss/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $path;?>html/kincss/js/common_scripts.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/velocity.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/functions.js"></script>

	<!-- Wizard script -->
	<script src="<?php echo $path;?>html/kincss/js/survey_func.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
</body>
</html>