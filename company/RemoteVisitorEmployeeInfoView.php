
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
				 
				
				if($("#email").val()=="" || $("#email").val()==null)
				{
				
					$("#error_msg_form").html('please enter email address.');
					return false;
				}
				
				else if(!checkEmail("email"))
				{
				 
				$("#error_msg_form").html("please enter correct email format");
					return false;
				}
				else if($("#ttl_time").val()==0)
				{
				
					$("#error_msg_form").html('please select time period.');
					return false;
				}	
				else if($("#s_where").val()==0)
				{
				
					$("#error_msg_form").html('please select location type.');
					return false;
				}	
				
				else if($("#s_where").val()==1)
				{
				if($("#m_room").val()==0)
				{
					$("#error_msg_form").html('please select meeting room.');
					return false;
				}
				else{
					var send_data={};
					 
					send_data.email=$("#email").val();
					send_data.ttl_time=$("#ttl_time").val();
					 
					$.ajax({
						type:"POST",
						url: "../checkEmployee/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
						if(data1==0)
						{
							 
							$("#error_msg_form").html('You are not an employee of the company !!!');
							return false;
						}
						else if(data1==1)
						{
							 
							$("#error_msg_form").html('This time slot is already booked !!!');
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
				
				else{
					var send_data={};
					 
					send_data.email=$("#email").val();
					send_data.ttl_time=$("#ttl_time").val();
					 
					$.ajax({
						type:"POST",
						url: "../checkEmployee/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
						if(data1==0)
						{
							 
							$("#error_msg_form").html('You are not an employee of the company !!!');
							return false;
						}
						else if(data1==1)
						{
							 
							$("#error_msg_form").html('This time slot is already booked !!!');
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
		</script>
			
			
</head>
<?php $path1 = $path."html/usercontent/images/"; ?>
<body class="white_bg ffamily_avenir" >
	
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
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
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	 
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 black_txt  xxs-fsz45 padb10 trn ffamily_avenir" >About</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Fill in your details below.</a></div>
							 
								 	
							 
								
								<form action="../activateVisitors/<?php echo $data['cid']; ?>" method="POST" name="collaborators-form" id="collaborators-form"  accept-charset="ISO-8859-1">
									 
										<div class="on_clmn mart10 ">
											 
										<div class="pos_rel">
									
										<input type="text" name="email" id="email" data-translate="Your email" placeholder="Your email" value="" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt xxs-minhei_60p brdb_red_ff2828 ffamily_avenir ">
									</div>
									</div>
									
									<div class="on_clmn mart20 ">
											 
										<div class="pos_rel">
									<select class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0" name="ttl_time" id="ttl_time"  style="text-align-last:center;">
												 
															<option value="0" class="lgtgrey2_bg lgt_grey_txt  tall">Select time</option>
															<option value="15" class="lgtgrey2_bg lgt_grey_txt  tall">15 Mins</option>
															<option value="30" class="lgtgrey2_bg lgt_grey_txt  tall">30 Mins</option>
															<option value="45" class="lgtgrey2_bg lgt_grey_txt  tall">45 Mins</option>
															<option value="60" class="lgtgrey2_bg lgt_grey_txt  tall">60 Mins</option>
															<option value="75" class="lgtgrey2_bg lgt_grey_txt  tall">75 Mins</option>
															<option value="90" class="lgtgrey2_bg lgt_grey_txt  tall">90 Mins</option>
														    <option value="2" class="lgtgrey2_bg lgt_grey_txt  tall">2 Hrs</option>  
															<option value="3" class="lgtgrey2_bg lgt_grey_txt  tall">3 Hrs</option>
															<option value="4" class="lgtgrey2_bg lgt_grey_txt  tall">4 Hrs</option>
															<option value="5" class="lgtgrey2_bg lgt_grey_txt  tall">5 Hrs</option>
															<option value="6" class="lgtgrey2_bg lgt_grey_txt  tall">6 Hrs</option>
															<option value="7" class="lgtgrey2_bg lgt_grey_txt  tall">7 Hrs</option>
															<option value="8" class="lgtgrey2_bg lgt_grey_txt  tall">8 Hrs</option>															
											</select>
										 
									</div>
									</div>
								
									
								 <div class="on_clmn mart20 marb35" id="mLocation">
											 
										<div class="pos_rel">
									<select class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0" name="s_where" id="s_where"  style="text-align-last:center;" onchange="showMeeting(this.value);">
												 
															<option value="0" class="lgtgrey2_bg lgt_grey_txt  tall">Select where</option>
															<option value="1" class="lgtgrey2_bg lgt_grey_txt  tall">Meeting room</option>
															<option value="2" class="lgtgrey2_bg lgt_grey_txt  tall">My own office</option>
															<option value="3" class="lgtgrey2_bg lgt_grey_txt  tall">Public space</option>
															 															
											</select>
										 
									</div>
									</div>
									
									 <div class="on_clmn mart20 marb35" id="mLocation1" style="display:none;">
											 
										<div class="pos_rel">
									<select class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0" name="m_room" id="m_room"  style="text-align-last:center;">
												 
															<option value="0" class="lgtgrey2_bg lgt_grey_txt  tall">Select</option>
															<?php  foreach($meetingRoomDetail as $category => $value) 
															{
																 
															?>
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg lgt_grey_txt  tall"><?php echo $value['room_name']; ?></option>
															<?php } ?> 
															 															
											</select>
										 
									</div>
									</div>
								 
								
							
						</form>
						
						 
							<div class="clear"></div>
						 <div class="valm fsz20 red_txt" id="error_msg_form"> </div>
						<div class="talc padtb20"> <a href="javascript:void(0);" onclick="informEmployee();" ><input type="button" value="Send" class="ffamily_avenir forword red_ff2828_bg white_txt hei_55p fsz18" ></a>
									
								 		
									
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