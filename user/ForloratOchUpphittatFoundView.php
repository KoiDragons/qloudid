
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnew.css" />
	
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		 
	
	<script type="text/javascript">
      function getFee(id)
	 {
		
		 $("#error_msg_form").html('');
		 if(id==1)
		 {
			 $('#scrl').removeClass('red_bg_fb2d2d');
			 $('#valy').removeClass('red_bg_ff919159');
			 $('#scrl').addClass('green_bg_64c5af');
			 $('#valy').addClass('green_bg_91e9d57a');
			 $('#fee').removeAttr('readonly');
		 }
		 else  
		 {
			 $('#scrl').addClass('red_bg_fb2d2d');
			 $('#valy').addClass('red_bg_ff919159');
			 $('#scrl').removeClass('green_bg_64c5af');
			 $('#valy').removeClass('green_bg_91e9d57a');
			 $('#fee').attr('readonly','readonly');
			 $('#fee').val(0);
		 }
	 }

	function sendInformation()
			{
				$("#error_msg_form").html('');
				if($('#pay_fee').val()==0)
				{
				$("#error_msg_form").html('please select if you want to pay or not');
				return false;				
				}
				document.getElementById('save_indexing').submit();	 
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

<?php $path1 = $path."html/usercontent/images/"; ?>
		
	<body class="white_bg ffamily_avenir">
		<div class="column_m header xs-header xsip-header xsi-header bs_bb hidden-xs lgtgrey2_bg" >
				<div class="wi_100 hei_65p xs-pos_fix padtb0 padrl0 lgtgrey2_bg"  >
				  <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/ForloratOchUpphittat" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
				<div class="clear"></div>
			</div>
		</div>
		
	<div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/user/index.php/ForloratOchUpphittat" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 
			 
				<div class="clear"></div>
			</div>
		</div>
	<div class="clear"></div>
	<!-- /menu -->
	
	<div class="column_m pos_rel">
			<!-- CONTENT -->
		<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart0 xs-pad0">
					<div class="marb25">
						 
								<img src="../../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto brdb2_red_ff2828 padb15" height="150" width="400" >
							 
								
							</div>
								<div class="padb0 xxs-padb0 hidden">		
							
									<h1 class="marb0  xxs-talc talc fsz60 xxs-fsz45  padb10 black_txt trn hidden-xs ffamily_avenir">Förlorad</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Mark your object as lost. If you declare a finders fee. Your chances to find it will increase by 80%.</a></div>
								 								
									<form action="../updateLostValue/<?php echo $data['id']; ?>" method="POST" name="save_indexing" id="save_indexing"  accept-charset="ISO-8859-1">
									 
									<div class="on_clmn  mart10 padb10 brdb">
									<div class="thr_clmn  wi_60 padr20 padt4">
											 
										<div class="pos_rel talc">
									
										<input type="text"   value="<?php if($itemDetail['item_number']==1) echo 'Cell phone'; else if($itemDetail['item_number']==2) echo 'Key'; else if($itemDetail['item_number']==3) echo 'Laptop'; ?> " class="wi_100 rbrdr pad10 padt25   tall  minhei_50p fsz18 black_txt ffamily_avenir" readonly>
									</div>
									</div>
								<div class="thr_clmn  wi_20 padr0 brd nordl red_bg_fb2d2d minhei_50p hidden" id="scrl">
											<div class="pos_rel">
											<select class="input1 minhei_50p fsz18 white_txt nobrd  trans_bg nobold dropdown-bg" style="text-align-last:center; " name="pay_fee" id="pay_fee" onchange="getFee(this.value);">
											 <option value="1" class="lgtgrey2_bg black_txt">Yes</option>
											<option value="2"  class="lgtgrey2_bg black_txt" selected>No</option>
											                  
											</select>
										</div>
									</div>
									<div class="thr_clmn  wi_40" id="valy">
										<label class="ffamily_avenir">Add finders fee (SEK)</label>	 
										<div class="pos_rel">
									
										<input type="number" name="fee" id="fee" placeholder="Finders fee" min="0" value="0" class="wi_100 nobrd pad0   talc  minhei_40p fsz18 lgtgrey_bg llgrey_txt ffamily_avenir" >
									</div>
									</div>
									</div>
									
									<div class="on_clmn mart20  marb35 padrl50">
									<div class="thr_clmn  wi_40 ">
											 
										<div class="pos_rel talc">
									
										<input type="text"   value="Share" class="wi_100 rbrdr pad10   tall  minhei_50p fsz18 black_txt ffamily_avenir" readonly>
									</div>
									</div>
										<div class="thr_clmn  wi_60" id="valy">
								<div class="pos_rel">											
											<select name="share_type" id="share_type"  class="default_view wi_100 mart0  trans_bg nobrd    fsz18  minhei_50p   trans_bg dropdown-bg black_txt tall padl0 ffamily_avenir " style="text-align-last:center;"> 
											 
														<option value="1">My network</option>
														<option value="2">Public</option>
														<option value="3">Global</option>
														 
											</select>
											</div>
											</div>
											</div>
									<div id="error_msg_form" class="red_txt fsz20 ffamily_avenir"> </div>
									 </form>
									<div class="talc  marb40 "> <a href="#" onclick="sendInformation();"><input type="button" value="Submit" class="forword minhei_55p red_ff2828_bg fsz18 trn ffamily_avenir"  ></a>
										
									
									</div>
								</div>
								
							</div>
							
							
						 
					</div>
					<!-- /Wizard container -->
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
	<!-- /.modal -->
	 
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
		</div>
	</div>
		
	<!-- COMMON SCRIPTS -->
	<script src="<?php echo $path;?>html/kincss/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo $path;?>html/kincss/js/common_scripts.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/velocity.min.js"></script>
	<script src="<?php echo $path;?>html/kincss/js/functions.js"></script>

	<!-- Wizard script -->
	<script src="<?php echo $path;?>html/kincss/js/survey_func.js"></script>
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