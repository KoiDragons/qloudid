
<!DOCTYPE html>
<html lang="en">
<?php 
function base64_to_jpeg($base64_string, $output_file) {
			// open the output file for writing
			$ifp = fopen( $output_file, 'wb' ); 
			
			// split the string on commas
			// $data[ 0 ] == "data:image/png;base64"
			// $data[ 1 ] == <actual base64 string>
			$data = explode( ',', $base64_string );
			//print_r($data); die;
			// we could add validation here with ensuring count( $data ) > 1
			fwrite( $ifp, base64_decode( $data[1] ) );
			
			// clean up the file resource
			fclose( $ifp ); 
			
			return $output_file; 
		}
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_p=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_p=str_replace('"','',$value_p); $value_p = base64_to_jpeg( $value_p, '../estorecss/tmp'.$companyDetail['profile_pic'].'.jpg' ); } else { $value_p="../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_p="../html/usercontent/images/default-profile-pic.jpg";
	 $path1 = $path."html/usercontent/images/"; 	
?>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
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
			
			function informEmployee()
			{
				$("#error_msg_form").html('');
				if($('#ccountry').val()==0)
				{
				$("#error_msg_form").html('Please select country');
				return false;	
					
				}
				else if($("#ssn").val()=="" ||  $("#ssn").val()==null)
				{
				
				$("#error_msg_form").html('Please enter ssn');
				return false;
				}
				
				
				
				else
				{
					var send_data={};
				
				send_data.country=$('#ccountry').val();
				send_data.ssn=$("#ssn").val();
					$.ajax({
					type:"POST",
					url:"../checkEmployeeSSN/<?php echo $data['lid']; ?>/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						if(data1==1)
						{
						$("#ind").val(1);
						document.getElementById('save_indexing').submit();
						}
						else if(data1==0)
						{
						$("#ind").val(0);
						document.getElementById('save_indexing').submit();
						}
						else if(data1==4)
						{
						$("#popup_fade").addClass('active');
						$("#popup_fade").attr('style','display:block');
						$("#gratis_popup_error").addClass('active');
						$("#gratis_popup_error").attr('style','display:block');
						$("#error_msg_form").html("User have already sent request to become a employee  !!!");
						return false;
						}
						else if(data1==2)
						{
						$("#popup_fade").addClass('active');
						$("#popup_fade").attr('style','display:block');
						$("#gratis_popup_error").addClass('active');
						$("#gratis_popup_error").attr('style','display:block');
						$("#error_msg_form").html("User is already active employee of the company  !!!");
						return false;
						}
						else if(data1==3)
						{
						$("#popup_fade").addClass('active');
						$("#popup_fade").attr('style','display:block');
						$("#gratis_popup_error1").addClass('active');
						$("#gratis_popup_error1").attr('style','display:block');
						$("#error_msg_form1").html("User have been already invited to become a employee  !!!");
						$("#error_msg_form2").html("Do you want to send invitation again  !!!");
						return false;
						}
				}
				
					});
				}
				
			}
			
			
			function sendInvitation()
			{
			var send_data={};
				
				
				send_data.ssn=$("#ssn").val();
					$.ajax({
					type:"POST",
					url:"../resendInvitation/<?php echo $data['lid']; ?>/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						window.location.href ="https://www.qloudid.com/company/index.php/CompanyCustomers/companyAccount/<?php echo $data['cid']; ?>";

					}
			});
			}
			
		</script>
			
			
</head>

<body class="white_bg ffamily_avenir">
	
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.qloudid.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45 padb10 black_txt trn ffamily_avenir"  >Employee</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Register and invite employee by using his/hers social security number. </a></div>
					 
								 
					
							<form action="../employeeInfoMore/<?php echo $data['lid']; ?>" method="POST" name="save_indexing" id="save_indexing">
							<!-- Leave for security protection, read docs for details -->
								<div class="on_clmn mart10 xxs-mart10 marb35">
										<div class="thr_clmn  wi_30 padr10"  > 
										<div class="pos_rel">
													<select id="ccountry" name="ccountry"  class="wi_100 minhei_65p fsz18 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828  xxs-minhei_60p trans_bg nobold tall padl0 ffamily_avenir dropdown-bg"  style="text-align-last:center;"  >
														<option value="0">Select</option>
														<?php  foreach($resultContry as $category => $value) 
																{
																	$category = htmlspecialchars($category); 
																?>
																
																<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"  ><?php echo $value['country_name']; ?></option>
															<?php 	}	?>
														
													</select>
												</div>
												</div>
												<div class="thr_clmn  wi_70 padl10"  >
										<div class="pos_rel">
										<input type="text" name="ssn"  placeholder="Social security number " id="ssn"  class="txtind10 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828   wi_100 trans_bg required minhei_65p xxs-minhei_60p  talc  ffamily_avenir">
									</div>
									</div>
									</div>
							 <span class="valm fsz20 red_txt ffamily_avenir" id="error_msg_form"> </span>
							 <div class="clear"></div>
							<div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword minhei_55p red_ff2828_bg fsz18 ffamily_avenir" onclick="informEmployee();">Add</button> </br>
								
							</div>
							<div class="clear"></div>
							<div class="padt20 xxs-talc talc">
							<a href="../employeeInfoMore/<?php echo $data['lid']; ?>" class="fsz18 ffamily_avenir">Click here if you dont have SSN</a>
							</div>
							<!-- /bottom-wizard -->
						</form>
						
					
					</div>
					<!-- /Wizard container -->
			</div>
			<!-- /content-right-->
		
		 
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	 </div>
	 
	 
	
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="gratis_popup_error1">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" id="error_msg_form1">Du måste....</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 black_txt" id="error_msg_form2"> </span>
				</div>
				
				
			</div>
			<div class="on_clmn padt20">
				<input type="button" value="Submit" class="wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp" onclick="sendInvitation();">
				
			</div>
			
			<a href="#" class="close_popup_modal padt10 fsz18">Close</a>
	</div>
	
	</div>
			
	 
<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
</body>
</html>