<!doctype html>
<html>
	<?php
		$path1 = "../../html/usercontent/images/";
	 ?>	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
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
	<script type="text/javascript">
			function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
			
			function changeValue()
			{
			$("#errorMsgUser").html('');
			$("#ind").val(0);
			$("#emailInfo").attr('style','display:none');	
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
			function checkEmailWork()
			{
			if($("#wemail").val()==$("#email").val())
				{
				$("#popup_fade").addClass('active');
				$("#popup_fade").attr('style','display:block');
				$("#gratis_popup_error").addClass('active');
				$("#gratis_popup_error").attr('style','display:block');
				$("#errorMsg").html("If you add this email address to your work email. Your personal email will be public. Because work email field is public on some product !!!");
 
				}	
			}
			function submitform()
			{
				
				$("#errorMsg").html('');
				
				$("#errorMsgUser").html('');
				if($("#email").val()=="")
				{
					 
				$("#errorMsg").html("please enter email !!!");
					return false;
				}
				
				if(!checkEmail("email"))
				{
				 
				$("#errorMsg").html("please enter correct email format");
					return false;
				}
				if($("#wemail").val()!="")
				{
				if(!checkEmail("wemail"))
				{
				 
				$("#errorMsg").html("please enter correct work email format");
					return false;
				}	
				}
				var send_data={};
				
				send_data.location_id=$("#location_id").val();
				send_data.ind=$("#ind").val();
				send_data.fname=$("#fname").val();
				send_data.lname=$("#lname").val();
				send_data.ssn=$("#ssn").val();
				send_data.email=$("#email").val();
				send_data.wemail=$("#wemail").val();
				send_data.permission=$("#permission").val();
				send_data.employeenumber=$("#employeenumber").val();
				send_data.hdate=$("#hdate").val();
				send_data.rdate=$("#rdate").val();
				send_data.wphone=$("#wphone").val();
				send_data.wmobile=$("#wmobile").val();
				send_data.title=$("#title").val();
				send_data.country=$("#ccountry").val();
				 if(send_data.title=="")
				 {
					 send_data.title='Employee';
				 }
				 
				send_data.c_id=$("#c_id").val();
				send_data.d_country=$("#d_country").val();
				$.ajax({
					type:"POST",
					url:"../inviteEmployeeEmail/<?php echo $data['lid']; ?>/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==1)
						{
						
						$("#errorMsg").html("User have already sent request to become a employee  !!!");
						return false;
						}
						else if(data1==2)
						{
						
						$("#errorMsg").html("User is already a employee of the company  !!!");
						return false;
						}
						else if(data1==3)
						{
						
						$("#errorMsg").html("User have already invited to become a employee  !!!");
						return false;
						}
						else if(data1==5)
						{
						
						$("#errorMsg").html("User is already registered with given work email  !!!");
						return false;
						}
						else if(data1==6)
						{
						
						$("#errorMsg").html("User is already invited to become a employee with given work email  !!!");
						return false;
						}
						else if(data1==7)
						{
						
						$("#errorMsg").html("User is already registered with given work phone  !!!");
						return false;
						}
						else if(data1==8)
						{
						
						$("#errorMsg").html("User is already invited to become a employee with given work phone  !!!");
						return false;
						}
						else if(data1==4)
						{
						window.location.href ="https://www.safeqloud.com/company/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>";
						}
					}
				});
				
				
				}
			
			function job_function1(id)
			{
				var send_data={};
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"../jobFunction",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1)
					{
						$('#function').attr('style','display:block');
						document.getElementById("job_function").innerHTML=data1;
					}
				}
				});
				
				 
				
			}
			
			
			function job_position1(id)
			{
				var send_data={};
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"../jobPosition",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1)
					{
						$('#positi').attr('style','display:block');
						document.getElementById("title").innerHTML=data1;
					}
				}
				});
				
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
									<?php $path1 = $path."html/usercontent/images/"; ?>
	</head>
	<body class="white_bg" >
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/CompanyCrm/adminAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					
						 <div class="padb20 xxs-padb0 ">	
							
									<h1 class="marb0  xxs-talc talc fsz100 xs-fsz45 padb10 black_txt trn ffamily_avenir"  >Connect</h1>
									</div>
									<!-- Logo -->
									<div class="martb20  xxs-talc talc padb10 brdb_red_ff2828 brd_width_2"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >We need to send the employee an invitation to connect.. </a></div>	
					
					<!-- Center content -->
					
					
					<form action="#" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
						 
						 <div class="on_clmn mart10 " >
											<div class="thr_clmn wi_50 padr10">
												<div class="pos_rel">
													
													<input type="text" name="fname" id="fname" placeholder="Name" class="wi_100 nobrdt nobrdr nobrdl ffamily_avenir    talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt trans_bg brdb " value="<?php if(isset($_POST['ssn'])) echo $invitingUserEmail['first_name']; ?>">
													
												</div>
											</div>
											<div class="thr_clmn padl10 wi_50">
												
												<div class="pos_rel">
													
													<input type="text" name="lname" id="lname" placeholder="Last name" class="wi_100 nobrdt nobrdr nobrdl  ffamily_avenir  talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt trans_bg brdb" value="<?php if(isset($_POST['ssn'])) echo $invitingUserEmail['last_name']; ?>">
													
												</div>
												
											</div>
										</div>
										<div class="on_clmn mart20 ">
											
											<div class="thr_clmn  wi_30 "  >
												
												<div class="pos_rel">
													
													<select id="d_country" name="d_country" class=" default_view wi_100 mart0  nobrdr nobrdt nobrdl brdb  fsz18 ffamily_avenir  minhei_65p xxs-minhei_60p txtind25 llgrey_txt dropdown-bg85    talc padl0"  >
														
														<?php  foreach($userCountryList as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_70 padl20">
												
												<div class="pos_rel">
													
													<input type="text" name="wmobile" id="wmobile" placeholder="Work mobile" class=" txtind10 fsz18 brdb  ffamily_avenir wi_100 xxs-minhei_60p required minhei_65p nobrd talc llgrey_txt">
													
												</div>
												
											</div>
											
											
											
										</div>
								
									
										 
										 
									
										 <div class="on_clmn mart20 ">
											
											<div class="pos_rel">
												
												<input type="text" name="wemail" id="wemail" placeholder="Work email" class=" wi_100 nobrdt nobrdr nobrdl    trans_bg  brdb talc xxs-minhei_60p minhei_65p fsz18 llgrey_txt ffamily_avenir"  onchange="checkEmailWork();">
												
											</div>
										</div>
										
										<div class="on_clmn mart20 ">
											
											 
												
												<div class="pos_rel">
													
													<select id="location_id" name="location_id" class=" default_view wi_100 mart0  nobrdr nobrdt nobrdl brdb  fsz18 ffamily_avenir  minhei_65p xxs-minhei_60p txtind25 llgrey_txt dropdown-bg85    talc padl0"  >
														
														<?php  foreach($companyLocationDetail as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg"><?php echo $value['visiting_address']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											 
											
											 
											
											
										</div>
										
										
											<div class="on_clmn mart20 marb35" >
									
								<input type="text" name="email" id="email" placeholder="Personal email" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if(isset($_POST['ssn'])) echo $invitingUserEmail['email']; ?>"> </div>
							 			<div class="clear"></div>
									<div class="padb0 xs-padrl0 xs-padb0 marb35 mart10 lgtgrey2_bg">
								<div class="marrl0 padb10 brdb_dfe3e6 fsz16 white_bg">
								<a href="#profile" class="expander-toggler dark_grey_txt xs-fsz16"><span class="dnone_pa fa fa-chevron-down"></span><span class="dnone diblock_pa fa fa-chevron-up padr15"></span>Position (Optional)</a></div>
								<div id="profile" class="lgtgrey2_bg" style="display:none;">	
										 
										<div class="on_clmn  mart10" >
										<div class="pos_rel lgtgrey2_bg">
											
												<select name="job_family" id="job_family" class="ffamily_avenir nobold  dropdown-bg default_view wi_100 mart0 trans_bg nobrdr nobrdt nobrdl brdb  fsz16  minhei_65p  dark_grey_txt tall xxs-minhei_60p lgtgrey2_bg"  style="text-align-last:center;" onchange="job_function1(this.value);">
													<option value="">Select</option>
													<?php foreach($jobFamily  as $category => $value) { ?>
													 
													<option value="<?php echo $value['id']; ?>"><?php echo $value['job_family']; ?></option>
													<?php } ?>
												</select>
											
											
											</div>
											</div>
											
											 <div class="on_clmn  mart10" id="function" style="display:none;">
										<div class="pos_rel lgtgrey2_bg">
											
												<select name="job_function" id="job_function" class="ffamily_avenir nobold  dropdown-bg default_view wi_100 mart0 trans_bg nobrdr nobrdt nobrdl brdb  fsz16  minhei_65p  dark_grey_txt tall xxs-minhei_60p lgtgrey2_bg" style="text-align-last:center;" onchange="job_position1(this.value);">
													<option value="">Select</option>
													 
												</select>
											
											
											</div>
											</div>
											
											 <div class="on_clmn  mart10 " id="positi" style="display:none;">
										<div class="pos_rel lgtgrey2_bg">
											
												<select name="title" id="title" class="ffamily_avenir nobold  dropdown-bg default_view wi_100 mart0 trans_bg nobrdr nobrdt nobrdl brdb  fsz16  minhei_65p  dark_grey_txt tall xxs-minhei_60p lgtgrey2_bg" style="text-align-last:center;" >
													<option value="">Select</option>
													 
												</select>
											
											
											</div>
											 </div>
											 
											 
									</div>
									<div class="clear"></div>
									</div>
									<div class="clear"></div>
									</div>
								
											 
										  
								<div class="on_clmn mart10 marb30 hidden">
											
											<div class="thr_clmn  wi_50 "  >
												
												<div class="pos_rel">
													
													<select id="c_id" name="c_id" class=" default_view wi_100 mart5 input1 nobold  dropdown-bg rbrdr pad10  brdb minhei_65p fsz18 llgrey_txt" style="text-align-last:center;" >
														
														<?php  foreach($userCountryList as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['country_name']; ?>"  class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_50 padl10">
												
												<div class="pos_rel">
													
													<input type="text" name="wphone" id="wphone" placeholder="Work phone" class=" wi_100 rbrdr pad10 mart5 talc brdb minhei_65p fsz18 llgrey_txt">
													
												</div>
												
											</div>
											
											
											
										</div>
										<div id="errorMsg" class="fsz20 red_txt ffamily_avenir"> </div>
									<input type="hidden" name="ssn" id="ssn" value="<?php if(isset($_POST['ssn'])) { echo $_POST['ssn']; } ?>" />
									<input type="hidden" name="ccountry" id="ccountry" value="<?php if(isset($_POST['ssn'])) { echo $_POST['ccountry']; } ?>" />
									<input type="hidden" name="employeenumber" id="employeenumber"   />
									
									<input type="hidden" name="hdate" id="hdate"   />
									<input type="hidden" name="rdate" id="rdate"   />
									<input type="hidden" name="permission" id="permission"  value='1' />
									
								 <div class="clear"></div>
								 
							
							  
							<div class="talc  padtb20"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Submit" class="forword minhei_55p red_ff2828_bg fsz18 ffamily_avenir"  ></a>
										
									
									</div>
							
							
							
							
						
						
						
					</form>
					
					
				</div>
				
				
				
			</div>
			
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="gratis_popup_error">
																					<div class="modal-content pad25  nobrdb talc brdrad5 ">


																					

																						<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
																					</div>
																				</div>
		
		
		
		
		<div class="popup_modal wi_700p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="om_mina">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<h2 class="marb10 pad0 bold fsz24 black_txt">HANTERING AV PERSONUPPGIFTER</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla tall">
					
					
					
					<div class="wi_100 marb10 talc">
						
						<span class="valm fsz16">Vi värnar om din integritet</span>
					</div>
					<ul class="mart10 pad0 tall fsz16">
						
						
						<li class="dblock mar0 marb10 pad0 first">
							<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
								<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
								<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
								Hantering av personuppgifter
							</a>
							<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
								<p>När du matar in ditt namn och telefonnummer i vårt besökssystem används uppgifterna för att informera den person du besöker per sms och/eller e-post via en extern tjänsteleverantör om din ankomst och lagras i syfte att kunna ta fram en utrymningslista i händelse av brand eller annan fara. Uppgifterna raderas automatiskt från besökssystemet efter 1 dygn men kan lagras under en längre tid hos våra externa tjänsteleverantörer för fakturerings- och statistikändamål.  </p>
								<p>Grunden för insamlingen är att det eter en intresseavvägning finns ett legitimt syfte med att samla in dina uppgifter för att kunna informera om ditt besök och veta vilka personer som vistas i våra lokaler. </p>
							</div>
						</li>
						<li class="dblock mar0 marb10 pad0 last">
							<a href="#" class="class-toggler dark_grey_txt " data-classes="active" onclick="changeClass(this);">
								<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
								<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
								Du äger din data
							</a>
							<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
								<p>Du kan så länge dina personuppgifter finns lagrade begära att få ut utdrag på uppgifterna eller få uppgifterna rättade eller raderade. Du har också rätt att klaga på behandlingen till tillsynsmyndigheten (i Sverige Datainspektionen). Dina personuppgifter kommer inte att lämnas ut till tredje part (utöver vad som angetts ovan), föras över till part i land utanför EU som inte är ”privacyshield”-certifierad eller behandlas för några andra ändamål än vad som angetts ovan. I fall där besöksmottagaren eller du som besökare har telefontjänster eller mailtjänster via leverantörer utanför EU kommer dock uppgifter om besöket aviseras via dessa leverantörer.   </p>
								
								
							</div>
						</li>
						
					</ul>
					
					<div class="wi_100 mart10 talc">
						<input type="button" value="Close" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp ">
						
					</div>
				</div>
			</div>
			
		</div>
		
		<div class="clear"></div>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		
		<script>
			tinyMCE.init(
			{
				selector: '.texteditor',
				plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
				toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
				//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
				//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
				menubar: false,
				toolbar_items_size: 'small',
				style_formats: [
				{
					title: 'Bold text',
					inline: 'b'
				},
				{
					title: 'Red text',
					inline: 'span',
					styles:
					{
						color: '#ff0000'
					}
				},
				{
					title: 'Red header',
					block: 'h1',
					styles:
					{
						color: '#ff0000'
					}
				},
				{
					title: 'Example 1',
					inline: 'span',
					classes: 'example1'
				},
				{
					title: 'Example 2',
					inline: 'span',
					classes: 'example2'
				},
				{
					title: 'Table styles'
				},
				{
					title: 'Table row 1',
					selector: 'tr',
					classes: 'tablerow1'
				}],
				templates: [
				{
					title: 'Test template 1',
					content: 'Test 1'
				},
				{
					title: 'Test template 2',
					content: 'Test 2'
				}]
			});
		</script>
		
	</body>
</html>										