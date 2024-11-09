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
	  <link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      
      <script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
     
      <script>
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
         return false;
         }	
         }
         function submitform()
         {
         
          
         $("#errorMsgUser").html('');
		 
		 if($("#email").val()=="")
         {
         
         $("#errorMsgUser").html("please enter email !!!");
         return false;
         }
         
         if(!checkEmail("email"))
         {
         
         $("#errorMsgUser").html("please enter correct email format");
         return false;
         }
        
		 var send_data={};
         send_data.ind=$("#ind").val();
         send_data.ssn=$("#ssn").val();
         send_data.email=$("#email").val();
         send_data.c_id=$("#c_id").val();
		 send_data.phone=$("#phone").val();
         $.ajax({
         type:"POST",
         url:"../inviteGuardian/<?php echo $data['did']; ?>",
         data:send_data,
         dataType:"text",
         contentType: "application/x-www-form-urlencoded;charset=utf-8",
         success: function(data1){
         
         if(data1==0)
         {
          
         $("#errorMsgUser").html("User is already a active guardian !!!");
         return false;
         }
		 else if(data1==1)
         {
         window.location.href ="https://www.safeqloud.com/user/index.php/Dependents/guardianList/<?php echo $data['did']; ?>";
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
   </head>
   <body class="ffamily_avenir xs-white_bg">
     <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/Dependents/addGuardianInfo/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/user/index.php/Dependents/addGuardianInfo/<?php echo $data['did']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>
	
      <div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_550p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn">Invite</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Add phone number and email to guardian so that we can send him/her the invitation to connect.</a></div>
				  
                    <form action="#" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
                    
                         
                              <input type="hidden" name="ssn" id="ssn" placeholder="Personnummer" class="txtind10 fsz18 brdb  wi_100 trans_bg required minhei_65p nobrd talc llgrey_txt ffamily_avenir" value="<?php if(isset($_POST['ssn'])) { echo $_POST['ssn']; } ?>" readonly>
                            <input type="hidden" name="ccountry" id="ccountry" placeholder="Personnummer" class="txtind10 fsz18 brdb  wi_100 trans_bg required minhei_65p nobrd talc llgrey_txt ffamily_avenir" value="<?php if(isset($_POST['ccountry'])) { echo $_POST['ccountry']; } ?>" readonly>
                      
                        <div class="on_clmn mart10 xxs-mart10 " id="emailInfo" style="display:block;">
                           <div class="pos_rel">
                              <input type="text" name="email" id="email" placeholder="Employee Email.."   class="txtind10 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828  wi_100 trans_bg required minhei_65p ffamily_avenir talc " value="<?php if(isset($_POST['ind'])) { if($_POST['ind']==1) { echo $userInfo['email']; } } ?>" <?php if(isset($_POST['ind'])) { if($_POST['ind']==1) { echo 'readonly'; } } ?>>
                           </div>
                        </div>
                        <div class="on_clmn mart20 marb35">
                           <div class="thr_clmn  wi_30 "  >
                              <div class="pos_rel">
                                 <select id="c_id" name="c_id" class=" wi_100 minhei_65p fsz18 nobrd brdb trans_bg nobold ffamily_avenir dropdown-bg   llgrey_txt tall padl0"  style="text-align-last:center;">
								 <option value="">Select</option>
                                    <?php  foreach($userCountryList as $category => $value) 
                                       {
                                       	$category = htmlspecialchars($category); 
                                       ?>
                                    <option value="<?php echo $value['country_name']; ?>"  class="lgtgrey2_bg" <?php if(isset($_POST['ind'])) { if($_POST['ind']==1) { if($userInfo['country_phone']==$value['country_name']) echo 'selected'; } } ?>>+<?php echo $value['country_code']; ?></option>
                                    <?php 	}	?>
                                 </select>
                              </div>
                           </div>
                           <div class="thr_clmn wi_70 padl20">
                              <div class="pos_rel">
                                 <input type="text" name="phone" id="phone" placeholder="Phone number" class="txtind10 ffamily_avenir fsz18 brdb  wi_100 trans_bg required minhei_65p nobrd talc llgrey_txt" value="<?php if(isset($_POST['ind'])) { if($_POST['ind']==1) { echo $userInfo['phone_number']; } } ?>">
                              </div>
                           </div>
                        </div>
							<div class="clear"></div>
						  <div id="errorMsgUser" class="red_txt fsz20"></div>
						<input type="hidden" id="ind" name="ind" value="<?php if(isset($_POST['ind'])) {  echo $_POST['ind']; } else echo '0'; ?>" />
						   </form>
						<div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forward minhei_55p fsz18 t_67cff7_bg ffamily_avenir" onclick="submitform();">Submit</button> </br>
								
							</div>
                     </div>
                 
                 
               </div>
			  <div id="popup_fade" class="opa0 opa55_a black_bg"></div>
      </div>
      <div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="gratis_popup_error">
         <div class="modal-content pad25  nobrdb talc brdrad5 ">
            <div id="errorMsg" class="fsz20"> </div>
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