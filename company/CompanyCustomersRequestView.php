
<!DOCTYPE html>
<html lang="en">
	<?php
			$path1 = $path."html/usercontent/images/";
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
		 
		if($employeeRequestInfo ['passport_image']!=null) { $filename="../estorecss/".$employeeRequestInfo ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$employeeRequestInfo ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; }

	$path1 = $path."html/usercontent/images/";
	?>
<head>
    <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		
	 
	 
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	
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
   
function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
	
			
			function changeRequest(id)
			{
				if(id==1)
				{
					if($("#emp").val()==0)
					{
						$("#emp").val(1);
					}
					else
					{
					$("#emp").val(0);
					}
				}
				else if(id==2)
				{
					if($("#sup").val()==0)
					{
						$("#sup").val(1);
					}
					else
					{
					$("#sup").val(0);
					}
				}
				else if(id==3)
				{
					if($("#tnt").val()==0)
					{
						$("#tnt").val(1);
					}
					else
					{
					$("#tnt").val(0);
					}
				}
				else if(id==4)
				{
					if($("#skl").val()==0)
					{
						$("#skl").val(1);
					}
					else
					{
					$("#skl").val(0);
					}
				}
			}
			
			
			function submitform()
			{
			$('#errorMsg1').html('');
			if($('#property_id').val()==0)
			{
				
				$("#errorMsg1").html("please select office");
				return false;
		
			}
			document.getElementById("save_indexing").submit();
			
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
<?php  $path1 = $path."html/usercontent/images/";  ?>
<body class="white_bg ffamily_avenir">
	
	 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../receivedRequests/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../receivedRequests/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					 
                <div class="clear"></div>

            </div>
        </div>
		 <div class="clear"></div>
	<div class="column_m container zi5 mart20  xs-mart0 white_bg xs-white_bg" id="loginBank"  style="display:block;">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 ">
					
					<div class="padb0 ">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla  brdrad3 white_bg xs-white_bg">
						<div class="padtb0 brdrad3 ">
						
							<div class="padb20  talc padt20">
										<div class="padrl0 ">
											<img src="<?php echo $imgs; ?>" width="160" height="160" class="white_brd borderr">
											
										</div>
									</div>

						<p class="lgn_hight_16 padt20 talc fsz20   padb0 marb0 xs-padb5 yellow_txt bold"><?php if($employeeRequestInfo['is_approved']==0) { echo 'Pending'; } else if($employeeRequestInfo['is_approved']==1) { echo 'Approved'; } else if($employeeRequestInfo['is_approved']==2) { echo 'Rejected'; } ?>	</p>
<h1 class="lgn_hight_35 padt10 padb20 xs-padb10 talc fsz35 black_txt"><?php echo $employeeRequestInfo['name']; ?></h1>
						
						<p class="lgn_hight_16 padt10 talc fsz20   padb10 marb0 xs-padb5 grey_new_txt"><?php echo $companyDetail['company_name']; ?></p>
						 
						
							
						
						<p class="lgn_hight_16 padt0 talc fsz20   padb10 marb20 xs-padb5 xxs-marb100 grey_new_txt"><?php echo date('m/y',strtotime($employeeRequestInfo['created_on']))."      123";?></p>
						
						
				 
					
						<form action="../../approveEmployeeRequest/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
							
							<!-- Leave for security protection, read docs for details -->
							 <div class="on_clmn  mart10 marb25" >
											 

												<div class="pos_rel">
											<select class="wi_100  minhei_65p fsz18 xxs-minhei_60p nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 trans_bg nobold dropdown-bg ffamily_avenir" name="property_id" id="property_id"  style="text-align-last:center;">
												<option value="0">Vilket Arbetställe / Kontor</option>
										<?php 
										foreach($locationDetail as $category => $value) 
													{
													?> 
										<option value="<?php echo $value['id']; ?>" <?php if($value['id']==$locationInfo['property_id']) echo 'selected'; ?>><?php echo $value['visiting_address']; ?></option>
													<?php } ?>                         
											</select>
										</div>
									</div>
									
								</form>	
 									
								 
							
							<div class="red_txt bold fsz16 talc" id="errorMsg1"> </div>
							 
							<?php if($employeeRequestInfo['is_approved']==0) { ?>	 
							
							<div class="marrl0 wi_500p maxwi_100 dflex xs-fxwrap_w talc padt20 padb40   xs-padb0">
						
						 
						
						 	<div class="wi_25-12p marl123 xxs-mar87">
						<a href="#" class="fsz30 " onclick="submitform();">
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #e4e4e4; color: #e4e4e4" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="black_txt fab fa-airbnb fa-stack-1x fab1 bold pad0" aria-hidden="true" style="color:#fcaf16;"></i>
																				</span></a>
						<p class="fsz14  padt5 grey_new_txt">Accept</p>
						</div>
						 
						<div class="wi_25-12p marl10">
					 
				<a href="../../rejectEmployeeRequest/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" class="fsz30 ">
				 
						<span class="fa-stack-info">
																				  <i style="border-radius: 10%;background: #e4e4e4; color: #e4e4e4;" aria-hidden="true" class=" fa-circle fa-stack-2x circle_bg_apps2"></i>
																				  <i class="far fa-building fa-stack-1x fab1 bold pad0" aria-hidden="true" style="color:#01b7f2;"></i>
																				</span></a>
						<p class="fsz14  padt5 grey_new_txt">Reject</p>
						</div>
						
						 
						</div>
						
							<?php } ?>
							</div>
							</div>
							
							<!-- /bottom-wizard -->
						
				 
		<!-- /row-->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	</div>
	 
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