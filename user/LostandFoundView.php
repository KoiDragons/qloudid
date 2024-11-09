
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
	function sendInformation()
			{
				$("#error_msg_form").html('');
				if($("#item_name").val()=="" ||  $("#item_name").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter item name');
					return false;
				}
				document.getElementById("save_indexing").submit();
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
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn">Add</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Register valuable belongings here. </a></div>
								 	<form action="LostandFound/addItem" id="save_indexing" name="save_indexing" method="POST" accept-charset="ISO-8859-1">							
								 
									<div class="on_clmn  mart10  " >
											<div class="pos_rel">
											<select class="default_view wi_100 mart0 trans_bg nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828 ffamily_avenir dropdown-bg  fsz18 xxs-minhei_60p  minhei_65p tall padl0"  style="text-align-last:center;" name="item_number" id="item_number">
												<option value="1">Mobiltelefon</option>
											<option value="2">Nycklar</option>
											<option value="3">Bärbar dator</option>                        
											</select>
										</div>
									</div>
									 
										<div class="on_clmn  mart20 marb35"  >
										<div class="pos_rel">
										<input type="text" name="item_name"  placeholder="Item name " id="item_name"  class="txtind10 fsz18 nobrdt nobrdl nobrdr red_f5a0a5_txt brdb_red_ff2828   wi_100 trans_bg required minhei_65p xxs-minhei_60p  talc  ffamily_avenir">
									</div>
									</div>
									
									 </form>
									 <div class="clear" id=""></div>
									 <div class="valm fsz20 red_txt ffamily_avenir" id="error_msg_form"> </div>
									<div class="talc  padtb20   "> <a href="#" onclick="sendInformation();"><input type="button" value="Next" class="forword minhei_55p red_ff2828_bg fsz18 ffamily_avenir"  ></a>
										
									
									</div>
								</div>
								
							</div>
							
							
						</form>
					</div>
					<!-- /Wizard container -->
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
	<!-- /.modal -->
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div id="error_msg_form" class="fsz20"> </div>
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
			</div>
		</div>
		
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