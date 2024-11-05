<!doctype html>
<html class="home">
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<title>Qloudid</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script>
	var issueM="<?php echo date('m'); ?>";
	var issueY="<?php echo date('Y'); ?>";
	var expiryM="<?php echo date('m'); ?>";
	var expiryY="<?php echo date('Y'); ?>";
	function changeColor(link)
		 {
			 $("#errorMsg1").html('');
			 $(link).removeClass('brd_2px_rgb');
			 $(link).addClass('brdb_new');
		 }
		 
		 function updateMonth(id)
         {
			 var allDays='';
         	if(id<issueY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#issue_month").html(allDays);
			changeIssueDate();
         	}
         	else
         	{
         	for(i=1;i<=issueM;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#issue_month").html(allDays);
			changeIssueDate();			
         	}
         }
         function updateExpiryMonth(id)
         {
			 var allDays='';
         	if(id>expiryY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#expiry_month").html(allDays);
			changeExpiryDate();			
         	}
         	else
         	{
         	for(i=issueM;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#expiry_month").html(allDays);
			changeExpiryDate();
         	}
         }
        
	 function checkIdentificator(id1)
	 {
		 $('#submitButton').addClass('hidden');
		 $('#showDetails').addClass('hidden');
		 $("#errorMsg1").html('');	 
		  if(id1>0)
		  {
			 if(id1==4)
			 {
				 
				 $('#submitButton').addClass('hidden');
				 $('#showDetails').addClass('hidden');
				 var send_data={};
				 send_data.variation_id=id1;
				 $.ajax({
							type:"POST",
							url:"checkSsnInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1==0)
								{
									 window.location.href="https://www.qloudid.com/user/index.php/StoreData/addUserSSN";
								}
								else
								{
									$("#errorMsg1").html('You have already added your ssn. Please check your profile page.');
									return false;
								}
							}
						});
				
				 
			 }
			 else
			 {
				 var send_data={};
				 send_data.variation_id=id1;
				 $.ajax({
							type:"POST",
							url:"checkIdentificator",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1==0)
								{
									  $('#id_number').val('');
									  $('#submitButton').removeClass('hidden');
									  $('#showDetails').removeClass('hidden');
									  if(id1==2)
										 {
											 
											 $('#ladelId').attr('data-content','ID number');
											
										 }
										  else if(id1==3)
										 {
											  
											 $('#ladelId').attr('data-content','Driver license number');
											  
										 }
										 else if(id1==1)
										 {
											  
											 $('#ladelId').attr('data-content','Passport number');
											 
										 }
								}
								else
								{
									 if(id1==2)
										 {
											$("#errorMsg1").html('You have already added your ID. Please try adding other identificator.'); 
											 	
										 }
										  else if(id1==3)
										 {
										 $("#errorMsg1").html('You have already added your Driver license number. Please try adding other identificator.');  
										 }
										 else if(id1==1)
										 {
											 $("#errorMsg1").html('You have already added your Passport number. Please try adding other identificator.');   
										 }
									
									return false;
								}
							}
						});
			 }
			
		  }
			 else
			 {
				 $('#submitButton').addClass('hidden');
				 $('#showDetails').addClass('hidden');
			 }
		 
		 
	 }
	
	function changeIssueDate()
	{
		var send_data={};
				 send_data.year=$("#issue_year").val();
				 send_data.month=$("#issue_month").val();
				 $.ajax({
							type:"POST",
							url:"getDates",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$("#issue_date").html(data1); 
							}
						});
	}
	
	
	function changeExpiryDate()
	{
		var send_data={};
				 send_data.year=$("#expiry_year").val();
				 send_data.month=$("#expiry_month").val();
				 $.ajax({
							type:"POST",
							url:"getDates",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								$("#expiry_date").html(data1); 
							}
						});
	}
	
	function addType(id)
	{
		var getValue=$('#food_type').val();
		if($('#'+id).hasClass('green_bg'))
		{
			$('#'+id).removeClass('green_bg');
			$('#'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#food_type").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_bg');
			$('#'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#food_type").val(getValue);
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
			submitFlag=1;
			$("#errorMsg1").html('');
			$("#errorMsg1").html('');
			var bg_url = $('#image-data').css('background-image');
			$('#image-data1').val(bg_url);
			var bg_url = $('#image-data2').css('background-image');
			$('#image-data3').val(bg_url);
			if($('#identificator').val()==0)
			{
				$("#identificator").removeClass('brdb_new');
				$("#identificator").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			 if($("#id_number").val()==null || $("#id_number").val()=="")
			{
				
				$("#id_number").removeClass('brdb_new');
				$("#id_number").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			if($("#issue_month").val()==0)
			{
				
				$("#issue_month").removeClass('brdb_new');
				$("#issue_month").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			if($("#issue_year").val()=="" || $("#issue_year").val()==null)
			{
				
				$("#issue_year").removeClass('brdb_new');
				$("#issue_year").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			if($("#issue_year").val()>issueY)
			{
				
				$("#issue_year").removeClass('brdb_new');
				$("#issue_year").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			 if($("#issue_month").val()>issueM && $("#issue_year").val()==issueY)
			{
				
				$("#issue_month").removeClass('brdb_new');
				$("#issue_month").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			if($("#expiry_month").val()==0)
			{
				
				$("#expiry_month").removeClass('brdb_new');
				$("#expiry_month").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			if($("#expiry_year").val()=="" || $("#expiry_year").val()==null)
			{
				
				$("#expiry_year").removeClass('brdb_new');
				$("#expiry_year").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			 if($("#expiry_year").val()<expiryY)
			{
				
				$("#expiry_year").removeClass('brdb_new');
				$("#expiry_year").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			
			if(isNaN($("#expiry_year").val()))
			{
				
				$("#expiry_year").removeClass('brdb_new');
				$("#expiry_year").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			
			if(isNaN($("#issue_year").val()))
			{
				
				$("#issue_year").removeClass('brdb_new');
				$("#issue_year").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			 if($("#expiry_month").val()<issueM && $("#expiry_year").val()==issueY)
			{
				
				$("#expiry_month").removeClass('brdb_new');
				$("#expiry_month").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			
			var send_data={};
				 send_data.variation_id=$('#id_number').val();
				 $.ajax({
							type:"POST",
							url:"checkUsedIdentificator",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1==0)
								{
									 submitFlag=1;
								}
								else
								{
									
											$("#errorMsg1").html('This ID has been used by another user. Please try using another ID'); 
										
										  submitFlag=0;
									
									return false;
								}
							}
						});
			
			 if(submitFlag==1)
			 {
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

	<body>
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../NewPersonal/userAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../NewPersonal/userAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
				 
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn">Identify</h1>
									</div>
								 
							<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please add your identificator.</a></div>
							<form action="addIndificator" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 	<div class="marb25">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: https://www.qloudid.com/html/usercontent/images/default-profile-pic.jpg;" id="image-data" name="image-data"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
						</div>
								 
								<div class="marb25">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data3" id="image-data3" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: https://www.qloudid.com/html/usercontent/images/default-profile-pic.jpg;" id="image-data2" name="image-data2"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
						</div>	 
								 
								 
								<div class="marb0 padtrl0">		 
							  <div class="on_clmn   mart10  ">
											  
										<div class="pos_rel">
										
													<select id="identificator" name="identificator" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onchange="checkIdentificator(this.value);" onclick="changeColor(this);">
														
																														
															<option value="0" class="lgtgrey2_bg">Select</option> 													
															<option value="1" class="lgtgrey2_bg">Passport</option>
															<option value="2" class="lgtgrey2_bg">Id number</option>
															<option value="3" class="lgtgrey2_bg">Driving license</option>															
													</select>
												
												 <label for="identificator" class="floating__label tall nobold padl10" data-content="Identificator" >
											<span class="hidden--visually">
											  Identificator</span></label>
												</div>
												 
												 
											 
											</div>
										
											
										<div id="showDetails" class="hidden">
										<div class="on_clmn   mart20  ">
											 <div class="thr_clmn  wi_40 padr10"> 
										<div class="pos_rel">
										
													<select id="pcountry" name="pcountry" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25"  disabled >
														
																														
															<?php foreach($resultContry as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($row_summary['country_of_residence']==$value['id']) echo 'selected';?>><?php echo $value['country_name']; ?></option>
														<?php } ?>   
																													
													</select>
												
												 <label for="pcountry" class="floating__label tall nobold padl10" data-content="Country" >
											<span class="hidden--visually">
											  Country</span></label>
												</div>
												</div>
												 
											
											<div class="thr_clmn  wi_60 padl10"  >
											<div class="pos_rel">
											 
											
											<input type="text" name="id_number" id="id_number"   placeholder="City, State" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);" /> 
												 <label for="id_number" id="ladelId"  class="floating__label tall padl0 nobold" data-content="City, State" >
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
									 
											 
											</div>
										
										 
										
										<div class="on_clmn   mart20  ">
											 
												<div class="thr_clmn  wi_35  padr5"> 
											<div class="pos_rel">
												 <select id="issue_year" name="issue_year" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" onchange='updateMonth(this.value);' >
                                 <?php $date=date('Y'); $year=date('Y')-12;  for($i=$date; $i>=$year;$i--) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg"  ><?php echo $i; ?></option>
                                 <?php } ?>
											</select>
												<label for="issue_year" class="floating__label tall nobold padl10" data-content="Issue year">
											<span class="hidden--visually">
											  Issue year</span></label>
												
											 </div>
											</div>
											 <div class="thr_clmn  wi_35 padrl5"> 
										<div class="pos_rel">
										
													 <select id="issue_month" name="issue_month" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" onchange="changeIssueDate();" >
													 <?php $dateM=date('m');  for($i=1; $i<=12;$i++) { ?>
													 <option value="<?php echo $i; ?>" class="lgtgrey2_bg"><?php echo $i; ?></option>
													  <?php }  ?>
												  </select>
												
												 <label for="issue_month" class="floating__label tall nobold padl10" data-content="Issue month" >
											<span class="hidden--visually">
											  Issue month</span></label>
												</div>
												</div>
												
												<div class="thr_clmn  wi_30 padl5"> 
										<div class="pos_rel">
										
													<select id="issue_date" name="issue_date" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" onclick="changeColor(this);">
												   <option value="0" class="lgtgrey2_bg">Select</option>
												   <option value="1" class="lgtgrey2_bg">1</option>
												   <option value="2" class="lgtgrey2_bg">2</option>
												   <option value="3" class="lgtgrey2_bg">3</option>
												   <option value="4" class="lgtgrey2_bg">4</option>
												   <option value="5" class="lgtgrey2_bg">5</option>
												   <option value="6" class="lgtgrey2_bg">6</option>
												   <option value="7" class="lgtgrey2_bg">7</option>
												   <option value="8" class="lgtgrey2_bg">8</option>
												   <option value="9" class="lgtgrey2_bg">9</option>
												   <option value="10" class="lgtgrey2_bg">10</option>
												   <option value="11" class="lgtgrey2_bg">11</option>
												   <option value="12" class="lgtgrey2_bg">12</option>
												   <option value="13" class="lgtgrey2_bg">13</option>
												   <option value="14" class="lgtgrey2_bg">14</option>
												   <option value="15" class="lgtgrey2_bg">15</option>
												   <option value="16" class="lgtgrey2_bg">16</option>
												   <option value="17" class="lgtgrey2_bg">17</option>
												   <option value="18" class="lgtgrey2_bg">18</option>
												   <option value="19" class="lgtgrey2_bg">19</option>
												   <option value="20" class="lgtgrey2_bg">20</option>
												   <option value="21" class="lgtgrey2_bg">21</option>
												   <option value="22" class="lgtgrey2_bg">22</option>
												   <option value="23" class="lgtgrey2_bg">23</option>
												   <option value="24" class="lgtgrey2_bg">24</option>
												   <option value="25" class="lgtgrey2_bg">25</option>
												   <option value="26" class="lgtgrey2_bg">26</option>
												   <option value="27" class="lgtgrey2_bg">27</option>
												   <option value="28" class="lgtgrey2_bg">28</option>
												   <option value="29" class="lgtgrey2_bg">29</option>
												   <option value="30" class="lgtgrey2_bg">30</option>
												   <option value="31" class="lgtgrey2_bg">31</option>
												</select>
												
												 <label for="issue_date" class="floating__label tall nobold padl10" data-content="Issue date" >
											<span class="hidden--visually">
											  Issue month</span></label>
												</div>
												</div>
											</div>
											
											 <div class="on_clmn mart20">
                        <div class="thr_clmn  wi_35 padr5 "  >
                           <div class="pos_rel">
                              <select id="expiry_year" name="expiry_year" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"  onchange='updateExpiryMonth(this.value);'>
                                 <?php $year=$date+12; for($i=$date; $i<=$year;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
							    <label for="expiry_year" class="floating__label tall nobold padl10" data-content="Expiry year">
											<span class="hidden--visually">
											  Expiry month</span></label>
                           </div>
                        </div>
                        <div class="thr_clmn wi_35 padrl5">
                           <div class="pos_rel">
                              <select id="expiry_month" name="expiry_month" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"  onchange="changeExpiryDate();">
                                 <?php  for($i=1; $i<=12;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
								  <?php } ?>
                              </select>
							    <label for="expiry_month" class="floating__label tall nobold padl10" data-content="Expiry month">
											<span class="hidden--visually">
											  Expiry month</span></label>
                           </div>
                        </div>
									<div class="thr_clmn  wi_30 padl5"> 
										<div class="pos_rel">
										
													<select id="expiry_date" name="expiry_date" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"  onclick="changeColor(this);" >
														<option value="0" class="lgtgrey2_bg">Select</option>
												   <option value="1" class="lgtgrey2_bg">1</option>
												   <option value="2" class="lgtgrey2_bg">2</option>
												   <option value="3" class="lgtgrey2_bg">3</option>
												   <option value="4" class="lgtgrey2_bg">4</option>
												   <option value="5" class="lgtgrey2_bg">5</option>
												   <option value="6" class="lgtgrey2_bg">6</option>
												   <option value="7" class="lgtgrey2_bg">7</option>
												   <option value="8" class="lgtgrey2_bg">8</option>
												   <option value="9" class="lgtgrey2_bg">9</option>
												   <option value="10" class="lgtgrey2_bg">10</option>
												   <option value="11" class="lgtgrey2_bg">11</option>
												   <option value="12" class="lgtgrey2_bg">12</option>
												   <option value="13" class="lgtgrey2_bg">13</option>
												   <option value="14" class="lgtgrey2_bg">14</option>
												   <option value="15" class="lgtgrey2_bg">15</option>
												   <option value="16" class="lgtgrey2_bg">16</option>
												   <option value="17" class="lgtgrey2_bg">17</option>
												   <option value="18" class="lgtgrey2_bg">18</option>
												   <option value="19" class="lgtgrey2_bg">19</option>
												   <option value="20" class="lgtgrey2_bg">20</option>
												   <option value="21" class="lgtgrey2_bg">21</option>
												   <option value="22" class="lgtgrey2_bg">22</option>
												   <option value="23" class="lgtgrey2_bg">23</option>
												   <option value="24" class="lgtgrey2_bg">24</option>
												   <option value="25" class="lgtgrey2_bg">25</option>
												   <option value="26" class="lgtgrey2_bg">26</option>
												   <option value="27" class="lgtgrey2_bg">27</option>
												   <option value="28" class="lgtgrey2_bg">28</option>
												   <option value="29" class="lgtgrey2_bg">29</option>
												   <option value="30" class="lgtgrey2_bg">30</option>
												   <option value="31" class="lgtgrey2_bg">31</option> 
																													
													</select>
												
												 <label for="expiry_date" class="floating__label tall nobold padl10" data-content="Expiry date" >
											<span class="hidden--visually">
											  Issue month</span></label>
												</div>
												</div>
								
                     </div>
									</div>
									 
						
						   <div class="clear"></div>
	 
	 				 


	 	 

										 
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20  ffamily_avenir hidden" id="submitButton"> <a href="#" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Add</button></a> </div>
					 		
						</div>
						</div>
						
					</div> 
		 
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>

	</body>
</html>
