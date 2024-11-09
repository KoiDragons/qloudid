
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
	
	<script type="text/javascript">
        var timeout=0;
			var a;
			const timeInterval=10000;
      function startTime() {
		   
						$.ajax({
						type:"POST",
						url: "../verifyActivation/<?php echo $data['cid']; ?>",
						
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
						if(data1==0)
						{
							a = setInterval(startTime, timeInterval);	  
							 
						}
						else
						{
							window.location.href ="https://www.safeqloud.com/company/index.php/RemoteVisitor/activateVisitorsMeeting/<?php echo $data['cid']; ?>";
						
						}
						}
					});
					 
}
  function ajaxSend() {
						$.ajax({
						type:"POST",
						url: "../verifyActivation/<?php echo $data['cid']; ?>",
						
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							alert(data1); return false; 
						if(data1==0)
						{
							alert(data1); return false; 
							 window.location.href ="https://www.safeqloud.com/company/index.php/RemoteVisitor/activateVisitorsMeeting/<?php echo $data['cid']; ?>";
						}
						}
					});
					 
}
			
    
			
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
						url: "../checkVisitor/<?php echo $data['cid']; ?>",
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
<body class="white_bg ffamily_avenir" onload="startTime();">
	<div class="column_m header  xs-hei_55p bs_bb white_bg" >
				<div class="wi_100 hei_65p  xs-hei_55p xs-pos_fix padtb5 padrl10 white_bg">
				<div class="logo padt5 wi_30p fsz30"  ><a href="#" style="color: #d9e7f0;"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a></div>
				<div class="fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"   style="color: #d9e7f0;"><i class="fas fa-globe" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 	<div class="fright marr0 padr0 padt10  brdwi_3"> <ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock  fright pos_rel brd2 brdclr_black brdrad5 marl20 "> <a href="../remoteVisitorsQrScan/<?php echo $data['cid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  black_txt_h" data-en="Express" data-sw="Express"   >Express</a> </li>
						
					</ul></div>
				<div class="clear"></div>
			</div>
		</div>
	 
	 
		
	<div class="clear"></div>
	
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100   xxs-fsz45 padb10 trn ffamily_avenir" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color'];?>">About</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Fill in your details below.</a></div>
							 
								 	
							 
								
								<form action="../informEmployee/<?php echo $data['cid']; ?>" method="POST" name="collaborators-form" id="collaborators-form"  accept-charset="ISO-8859-1">
									<div class="on_clmn mart10 xxs-mart10 ">
											<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											
										<input type="text" name="name" id="name" data-translate="Name" placeholder="Name" value="" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 xxs-minhei_60p ffamily_avenir " onchange="changeBG(this);">
									</div>
										</div>
										<div class="thr_clmn  wi_50 padl10"  >
											
										<div class="pos_rel">
											
												<input type="text" name="lname" id="lname" data-translate="Lastname" placeholder="Lastname" value=""  class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt xxs-minhei_60p nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir "  onchange="changeBG(this);" >
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
															
															<option value="<?php echo $value['id']; ?>" <?php  if($value['id']==201) echo 'Selected'; ?> class="lgtgrey2_bg lgt_grey_txt  tall">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>                            
											</select>
										 
									</div>
										</div>
										<div class="thr_clmn  wi_70 padl20"  >
											
										<div class="pos_rel">
											
												<input type="number" name="uphno" id="uphno" data-translate="Your mobile phone" placeholder="Your mobile phone" value="" class="wi_100  pad10   talc xxs-minhei_60p minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir " onchange="changeBG(this);">
											</div>
										</div>
										
									</div>
									
										<div class="on_clmn mart20 ">
											 
										<div class="pos_rel">
									
										<input type="text" name="email" id="email" data-translate="Your email" placeholder="Your email" value="" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt xxs-minhei_60p brdb_red_ff2828 ffamily_avenir ">
									</div>
									</div>
									
									<div class="on_clmn mart20 marb35">
											 
										<div class="pos_rel">
									
										<input type="text" name="cname" id="cname" data-translate="Company name" placeholder="Company name" value="" class="wi_100 rbrdr pad10  brdb talc  minhei_65p fsz18 llgrey_txt xxs-minhei_60p ffamily_avenir"  >
									</div>
									</div>
								
									
										<input type="hidden" name="car_res_num" id="car_res_num" placeholder="Din bils reg nr." class="form-control required" >
									
									
								 
								
							
						</form>
						
						 
							<div class="clear"></div>
						 <div class="valm fsz20 red_txt" id="error_msg_form"> </div>
						<div class="talc padtb10"> <a href="javascript:void(0);" onclick="informEmployee();" style="background:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#000000"; else echo $corporateColor['bg_color']; ?>"><input type="button" value="Send" class="ffamily_avenir forword hei_55p fsz18"  style="background:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#000000"; else echo $corporateColor['bg_color']; ?> !important; color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color'];  ?> !important;"></a>
									
								 		
									
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