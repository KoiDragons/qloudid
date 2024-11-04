
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta name="theme-color" content="<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f5f5f5"; else echo $corporateColor['bg_color']; ?>" />
 
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
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
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
var dict = {
				"Home": {
					sv: "Início"
				},
				"Download plugin": {
					sv: "Descarregar plugin",
					en: "Download plugin"
				}
			}
			var translator = $('body').translate({lang: "en", t: dict});
			translator.lang("en");
			var translation = translator.get("Home");
			var currentLang = 'en';
			var langVar='<?php echo $verifyLanguage; ?>';
			var currentStatus = <?php if(isset($_POST['qard_employee'])) echo 3; else echo 0; ?>;
			
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
			function expressEntry()
			{
				document.getElementById('save_indexing').submit();
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



			function informEmployee(id)
			{
				$("#error_msg_form").html('');
				if($("#ind").val()=="" || $("#ind").val()==0 || $("#ind").val()==null)
				{
				
					$("#error_msg_form").html('Skriva i namnet på den du ska träffa så vi kan meddela din ankomst till rätt person.');
					return false;
				}
				
				if($("#name").val()=="" || $("#name").val()==null)
				{
				
					$("#error_msg_form").html('Skriva in dina uppgifter så vi kan meddela mottagaren i förväg om vem du är och varför du har kommit.');
					return false;
				}
				
				if($("#lname").val()=="" || $("#lname").val()==null)
				{
					
					$("#error_msg_form").html('Vi behöver efternamn också...');
					return false;
				}
				
				
				
				
				if($("#uphno").val()=="" || $("#uphno").val()==null)
				{
					$("#error_msg_form").html('Vi behöver nå dig...');
					return false;
				}
				else if(isNaN($("#uphno").val())) {
					
					$("#error_msg_form").html('Det måste vara siffror och till din mobil');
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
					
					$.ajax({
						type:"POST",
						url: "../../checkVisitor/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						if(data1==0)
						{
							 
							$("#error_msg_form").html('Person already registered !!!');
							return false;
						}
						else
						{
							document.getElementById('collaborators-form').submit();
						}
						}
					});
					
				}
				
			}
			
			
		</script>
			
			
</head>
<?php $path1 = $path."html/usercontent/images/"; ?>
<body class="white_bg">
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../visitors/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			<div class="hidden-xs hidden-xsi fright marr0 padr0 padt20  brdwi_3 <?php if(isset($_POST['qard_employee'])) echo 'hidden'; ?>"> <ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock  fright pos_rel brd2 brdclr_black brdrad5 marl20 "> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  black_txt_h" data-en="Express login" data-sw="Express login"  onclick="expressEntry();" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>">Express login</a> </li>
						
					</ul></div>
			  
            <div class="clear"></div>
         </div>
      </div>
	
	<div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
					 
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../visitors/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					<div class="fright hidden padt10 padb10 <?php if(isset($_POST['qard_employee'])) echo 'hidden'; ?>">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock  fleft pos_rel brd2 brdclr_black brdrad5 marl20 "> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  black_txt_h" data-en="Express login" data-sw="Express login"  onclick="expressEntry();" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color']; ?>">Express login</a> </li>
						
					</ul>
				</div>
				<div class="clear"></div>
				</div>
			</div>
		
	<div class="clear"></div>
	
	
	<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100   xxs-fsz45 padb10 trn ffamily_avenir" style="color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#000000"; else echo $corporateColor['bg_color']; ?>">About</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Fill in your details below or use Express login.</a></div>
							 
								 	
							 
								
								<form action="../../informEmployee/<?php echo $data['cid']; ?>" method="POST" name="collaborators-form" id="collaborators-form"  accept-charset="ISO-8859-1">
							
								
									<input type="hidden" name="booked" id="booked" value="<?php if($getBookId==2) echo 'Bokat besök'; else echo 'Drop in'; ?>" />
									
									
									<div class="on_clmn mart10 xxs-mart10 ">
											<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											
										<input type="text" name="name" id="name" data-translate="Name" placeholder="Name" value="<?php if(isset($_POST['qard_employee'])) echo $userInformation['first_name']; ?>" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir " <?php if(isset($_POST['qard_employee'])) echo 'readonly'; ?> onchange="changeBG(this);">
									</div>
										</div>
										<div class="thr_clmn  wi_50 padl10"  >
											
										<div class="pos_rel">
											
												<input type="text" name="lname" id="lname" data-translate="Lastname" placeholder="Lastname" value="<?php if(isset($_POST['qard_employee'])) echo $userInformation['last_name']; ?>"  class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt xxs-minhei_60p nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir " <?php if(isset($_POST['qard_employee'])) echo 'readonly'; ?> onchange="changeBG(this);" >
											</div>
										</div>
										
									</div>
									<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 "  >
										<div class="pos_rel">
											
										 
											<select class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0" name="cntry" id="cntry"  style="text-align-last:center;">
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>" <?php if(isset($_POST['qard_employee'])){ if($value['country_name']==$userInformation['country_phone']) echo 'selected'; } else if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg lgt_grey_txt  tall">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>                            
											</select>
										 
									</div>
										</div>
										<div class="thr_clmn  wi_70 padl20"  >
											
										<div class="pos_rel">
											
												<input type="number" name="uphno" id="uphno" data-translate="Your mobile phone" placeholder="Your mobile phone" value="<?php if(isset($_POST['qard_employee'])) echo $userInformation['phone_number']; ?>" class="wi_100  pad10   talc xxs-minhei_60p minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir " onchange="changeBG(this);">
											</div>
										</div>
										
									</div>
									
										<div class="on_clmn mart20 ">
											 
										<div class="pos_rel">
									
										<input type="text" name="email" id="email" data-translate="Your email" placeholder="Your email" value="<?php if(isset($_POST['qard_employee'])) echo $userInformation['email']; ?>" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt xxs-minhei_60p brdb_red_ff2828 ffamily_avenir " <?php if(isset($_POST['qard_employee'])) echo 'readonly'; ?>>
									</div>
									</div>
									
									<div class="on_clmn mart20 marb35">
											 
										<div class="pos_rel">
									
										<input type="text" name="cname" id="cname" data-translate="Company name" placeholder="Company name" value="<?php if(isset($_POST['qard_employee'])) echo $userInformation['company_name']; ?>" class="wi_100 rbrdr pad10  brdb talc  minhei_65p fsz18 llgrey_txt xxs-minhei_60p ffamily_avenir" <?php if(isset($_POST['qard_employee'])) echo 'readonly'; ?> >
									</div>
									</div>
								
									
										<input type="hidden" name="car_res_num" id="car_res_num" placeholder="Din bils reg nr." class="form-control required" >
									
									
									<input type="hidden" id="ind" name="ind" value="<?php echo $_POST['ind']; ?>"/>
								
									 
								
							
						</form>
						
						<form action="../../expressVisitor/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" method="POST" id="save_indexing" name="save_indexing">
						<input type="hidden" id="inde" name="inde" value="<?php echo $_POST['ind']; ?>"/>
						</form>
							<div class="clear"></div>
						 <div class="valm fsz20 red_txt" id="error_msg_form"> </div>
						<div class="talc padtb20"> <a href="#" onclick="informEmployee();" style="background:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#000000"; else echo $corporateColor['bg_color']; ?>"><input type="button" value="Send" class="ffamily_avenir forword minhei_55p fsz18"  style="background:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#000000"; else echo $corporateColor['bg_color']; ?>"></a>
									
								<?php if($data['comp_id']!=0) { ?>
						<p class="padt20 xs-padt10 xs-padb20 talc fsz18 xs-fsz16 padb0  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 black_txt ffamily_avenir">This front desk is managed by <?php echo $data['comp_name']; ?></p>
						<?php } ?>			
									
									</div>
						
									
									 
						<div class="clear"></div>
					</div>
					
					
				</div>
				
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	</div>
	<!-- /container-fluid -->

	 
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey_bg fsz14 brdrad10 popup_shadow" id="gratis_popup_nochild">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey_bg">
			
			
			<div class="pad25 lgtgrey_bg brdradtr10">
				<img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Du måste....</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Du måste välja ett eller flera barn genom att klicka och markera de som du är där för att hämta. </span>
				</div>
				
				
			</div>
			<div class="on_clmn padt0">
				<input type="button" value="Stäng" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold">
				
			</div>
	</div>
	
	</div>
	<!-- /.modal -->
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="person_informed">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" >Du måste....</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					
				</div>
				
				
			</div>
			
			<div class="on_clmn padt0">
				<input type="button" value="Stäng" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp">
				
			</div>
	</div>
	
	</div>
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="person_informed_phone">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Vi behöver nå dig...</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 black_txt"> Detta nummer lämnar vi över till din mottagare så hen kan kontakta dig vid behov. Vi behöver det dessutom för din säkerhet ifall det skulle ske en olycka eller fara på kontoret och vi behöver nå dig. </span>
				</div>
				
				
			</div>
			<div class="on_clmn padt0">
				<input type="button" value="Stäng" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp">
				
			</div>
	</div>
	
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div id="error_msg_form" class="fsz20"> </div>
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_65p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/visitors.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/visitorsPlace.js"></script>
</body>
</html>