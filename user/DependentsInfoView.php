
<!DOCTYPE html>
<html lang="en">
	<?php $path1 = $path."html/usercontent/images/"; ?>
	<head>
		<meta charset="utf-8">
			<meta name="viewport" content="width=device-width,initial-scale=1">
				<title>Qmatchup</title>
				<!-- Styles -->
				<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">

					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />

					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
					<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
					<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
					<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
						<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
							
							<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
							<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
						<script>
						function updateSSNAvailable()
						{
							ssnAvailable=1;
						}
						function updateAddress()
						{
							sameAddressAsUser=1;
						}
								submitFlag=1;
								var todayDate="<?php echo date('d'); ?>";
								var issueM="<?php echo date('m'); ?>";
								var issueY="<?php echo date('Y'); ?>";
								var expiryM="<?php echo date('m'); ?>";
								var expiryY="<?php echo date('Y'); ?>";
								var currentMonths='<?php echo $dobMonthCurrentYear; ?>';
								var oldMonths='<?php echo $dobMonthOldYear; ?>';
								function updateMonths(id)
								{
								 
									if(id==issueY)
									{
										$("#dob_month").html(currentMonths);
									}
									else
									{
										$("#dob_month").html(oldMonths);
									}
								}
								
								function updateDays(id)
								{
									
								var tDays=new Date($("#dob_year").val(), id, 0).getDate();
								 if($("#dob_year").val()==issueY && id==issueM)
								 {
									tDays=todayDate;
								 }
								var allDays='';
								for(i=1;i<=tDays;i++)
								{
									allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
								}
								$("#dob_day").html(allDays);
								}
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
										
										function final_detail(id)
										{
										if(id==0)
										{
										$('#sType').addClass('marb35');
										$('#finalDetails').attr('style','display:none');
										}
										else
										{
										$('#sType').removeClass('marb35');
										$('#finalDetails').attr('style','display:block');
										}											
										}
										
										function sendInformation()
										{
										$("#error_msg_form").html('');
										
										if($("#dp_type").val()=="0")
										{
										
										$("#error_msg_form").html('Please select dependent type');
										return false;
										}
										if($('#image-data1').val()=='' || $('#image-data1').val()==null)
										{
										$("#error_msg_form").html('Please select profile image');
										return false;	
										}
										if($("#fname").val()=="" || $("#fname").val()==null)
										{
										
										$("#error_msg_form").html('Please enter first name');
										return false;
										}
										if($("#lname").val()=="" || $("#lname").val()==null)
										{
										
										$("#error_msg_form").html('Please enter last name');
										return false;
										}
										if($("#is_ssn_available").val()==1)
										{
										if($("#social_number").val()=="" || $("#social_number").val()==null)
										{
										
										$("#error_msg_form").html('Please enter social security number');
										return false;
										}
										var send_data={};

										send_data.ssn=$("#social_number").val();
										send_data.cntry=$("#d_country").val();

										$.ajax({
										type:"POST",
										url: "checkSsn",
										data:send_data,
										dataType:"text",
										contentType: "application/x-www-form-urlencoded;charset=utf-8",
										success: function(data1){
											if(data!=0)
												{
													window.location.href ="https://www.safeqloud.com/user/index.php/Dependents/requestGuardian/"+data1;
													}
										}											
										});
										}
										
										if($("#is_address_same").val()==0)
										{
										if($("#child_address").val()=="" || $("#child_address").val()==null)
										{
										
										$("#error_msg_form").html('Please enter address');
										return false;
										}	
										if($("#child_port_number").val()=="" || $("#child_port_number").val()==null)
										{
										
										$("#error_msg_form").html('Please enter port number');
										return false;
										}	
										if($("#child_city").val()=="" || $("#child_city").val()==null)
										{
										
										$("#error_msg_form").html('Please enter city');
										return false;
										}	
										
										if($("#child_zipcode").val()=="" || $("#child_zipcode").val()==null)
										{
										
										$("#error_msg_form").html('Please enter zipcode');
										return false;
										}	
										}
										document.getElementById('save_indexing').submit();
										}

 
										
										function readURL(input) {
	 
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
			 
            $('#image-data')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data1').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }

	 
} 

 
									</script>	

								</head>

								<body class="white_bg">

								 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/Dependents/dependentList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		 
	<div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
					 
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/Dependents/dependentList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div> 
								<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" >
<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
   <!-- Center content -->
   <div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
      <div class="padb20 xxs-padb0 ">
         <h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn ffamily_avenir" >Dependent</h1>
      </div>
      <div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Write down the details of the person to whom you act as guardian for.</a></div>
      <!-- Center content -->
      <form action="addDependent" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
         <div class="marb0 padtrl0">
            <div class="clear"></div>
            <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
               <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                  <!--<div class="clear hidden-xs"></div>-->
                  <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                     <div class="fleft wi_100  xs-mar0 xs-padt10">
                        <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Dependent type</span>
                        <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please select the dependent category?</span> 
                     </div>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="on_clmn  mart10  " id="sType" >
               <div class="pos_rel">
                  <select name="dp_type" id="dp_type" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt dropdown-bg"  style="text-align-last:center;" onchange="final_detail(this.value);">
                     <option value="0" class="lgtgrey2_bg" >Select type</option>
                     <option value="1" class="lgtgrey2_bg" >Child</option>
                     <option value="2" class="lgtgrey2_bg" >Elder</option>
                     <option value="3" class="lgtgrey2_bg" >Disabled</option>
                  </select>
               </div>
            </div>
            <div class="clear"></div>
            <div id="finalDetails" style="display:none">
               <div class="marb25  mart25">
                  <div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
                     <div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
                        <input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
                        <div class="imgwrap nobrd ">
                           <div class="cropped_image  grey_brd5 " style="background-image: " id="image-data" name="image-data"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="on_clmn mart10 xxs-mart10">
                  <div class="thr_clmn  wi_100 padr10"  >
                     <div class="pos_rel">
                        <div class="wi_100  bs_bb padrl5 padb10 ">
                           <div class="wi_100 talc">
                              <label class="forword ">
                              Profile Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                  <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                     <!--<div class="clear hidden-xs"></div>-->
                     <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                        <div class="fleft wi_100  xs-mar0 xs-padt10">
                           <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Dependent name</span>
                           <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please enter the name here</span> 
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
               <div class="on_clmn    " >
                  <div class="thr_clmn wi_50 padr10">
                     <div class="pos_rel">
                        <input type="text" name="fname" id="fname" placeholder="Name" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
                     </div>
                  </div>
                  <div class="thr_clmn padl10 wi_50">
                     <div class="pos_rel">
                        <input type="text" name="lname" id="lname" placeholder="Last name" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                  <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                     <!--<div class="clear hidden-xs"></div>-->
                     <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                        <div class="fleft wi_100  xs-mar0 xs-padt10">
                           <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Date of birth</span>
                           <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please select day month and year</span> 
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
               </div>
               <div class="on_clmn    " >
                  <div class="thr_clmn wi_33 padr10">
                     <div class="pos_rel">
                        <select name="dob_year" id="dob_year" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" onchange='updateMonths(this.value);'>
                        <?php echo $dobYears; ?>
                        </select>
                     </div>
                  </div>
                  <div class="thr_clmn padl10 wi_33">
                     <div class="pos_rel">
                        <select name="dob_month" id="dob_month" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" onchange='updateDays(this.value);'>
                        <?php echo $dobMonthCurrentYear; ?>
                        </select>
                     </div>
                  </div>
                  <div class="thr_clmn padl10 wi_33">
                     <div class="pos_rel">
                        <select name="dob_day" id="dob_day" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
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
                     </div>
                  </div>
               </div>
               <input type="hidden" id="d_country" name="d_country" value="<?php echo $userSummary['country_of_residence']; ?>" />
               <div class="on_clmn    brdb">
                  <div class="thr_clmn  wi_75 ">
                     <div class="pos_rel talc">
                        <input type="text" value="Does the child have a Social security number?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
                     </div>
                  </div>
                  <div class="thr_clmn  wi_25">
                     <div class="pos_rel">
                        <div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
                           <div class="boolean-control boolean-control-small boolean-control-green fright " onclick="updateSSNAvailable();">
                              <input type="checkbox" class="default" data-true="" data-false="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <div class='hidden' id='isAvailable'>
                  <div class="clear"></div>
                  <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                     <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                        <!--<div class="clear hidden-xs"></div>-->
                        <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                           <div class="fleft wi_100  xs-mar0 xs-padt10">
                              <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">SSN</span>
                              <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please enter social security number</span> 
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
                  <div class="on_clmn " >
                     <div class="pos_rel">
                        <input type="text" name="social_number" id="social_number" placeholder="xxxx-xxxx-xxxx"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
                     </div>
                     <input type='hidden' id='is_ssn_available' name='is_ssn_available' value='0' />
                  </div>
               </div>
               <div class="on_clmn    brdb">
                  <div class="thr_clmn  wi_75 ">
                     <div class="pos_rel talc">
                        <input type="text" value="Does child share same address as you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
                     </div>
                  </div>
                  <div class="thr_clmn  wi_25">
                     <div class="pos_rel">
                        <div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
                           <div class="boolean-control boolean-control-small boolean-control-green fright checked" onclick="updateAddress();">
                              <input type="checkbox" class="default" data-true="" data-false="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clear"></div>
               <div class="hidden" id='sameAddress'>
                  <div class="clear"></div>
                  <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                     <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                        <!--<div class="clear hidden-xs"></div>-->
                        <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                           <div class="fleft wi_100  xs-mar0 xs-padt10">
                              <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Address</span>
                              <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please enter dependent address</span> 
                           </div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
                  <div class="on_clmn">
                     <div class="thr_clmn wi_75 padr5">
                        <div class="pos_rel">
                           <input type="text" name="child_address" id="child_address" placeholder="Address"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
                        </div>
                     </div>
                     <div class="thr_clmn wi_25 padl5">
                        <div class="pos_rel">
                           <input type="text" name="child_port_number" id="child_port_number" placeholder="Port number"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
                        </div>
                     </div>
                  </div>
                  <div class="on_clmn mart20">
                     <div class="thr_clmn wi_50 padr5">
                        <div class="pos_rel">
                           <input type="text" name="child_city" id="child_city" placeholder="City"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
                        </div>
                     </div>
                     <div class="thr_clmn wi_50 padl5">
                        <div class="pos_rel">
                           <input type="text" name="child_zipcode" id="child_zipcode" placeholder="Zipcode"  class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt">
                        </div>
                     </div>
                  </div>
                  <input type='hidden' id='is_address_same' name='is_address_same' value='1' />
               </div>
               <div id="error_msg_form" class="red_txt fsz20 ffamily_avenir"></div>
               <div class="clear"></div>
            </div>
            <div class="talc padtb20  mart35"> 
               <button type="button" name="Next" class="forword minhei_55p fsz18 t_67cff7_bg ffamily_avenir" onclick="sendInformation();">Next</button>
            </div>
         </div>
      </form>
   </div>
   <div id="popup_fade" class="opa0 opa55_a black_bg"></div>
</div>
<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
   <div class="modal-content pad25  nobrdb talc brdrad5 ">
      <div id="" class="fsz20"> </div>
      <div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
   </div>
</div>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script> 
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script> 
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/s/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_image.js"></script><script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
</body>										
</html>