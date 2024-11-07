<!doctype html>
<?php
	 $path1 = "../../../../html/usercontent/images/";
	 ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qloudid</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_time.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
			<script>
	function changeDisplay()
	{
		if($('#ulDisplay').css('display') == 'none')
		{
		$('#ulDisplay').attr('style','display:block');	
		}
		else
		{
			$('#ulDisplay').attr('style','display:none');	
		}
		
	}
	
	function closePopup()
	{
		if($('#ulDisplay').css('display') == 'block')
		{
		$('#ulDisplay').attr('style','display:none');	
		}
		 
	}
</script> 
		
	 </head>
	
	<body class="white_bg ffamily_avenir">
		
		
		<div class="column_m header xs-header xsip-header xsi-header bs_bb hidden-xs">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey2_bg xs-lgtgrey_bg">
				
				<div class="logo marr15 wi_140p xs-wi_130p ">
				
					<a href="#"> <h3 class="marb0 pad0 fsz27 black_txt padt15 padb10 ffamily_avenir">Qloudid</h3> </a>
					
				
				</div>
			 <div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz16">
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel   first"><a href="https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/loginapp" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt black_bg ffamily_avenir" data-en="Sign in" data-sw="Sign in">Sign in</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel padr20"><a href="https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/CreateAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 lgn_hight_30 black_txt ffamily_avenir padt5">Sign up</a></li>
	 
	 <li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="CorporateServicesEng" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Business</a></li>
		<li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Private</a></li>					
					</ul>
				</div>
				
				 
			<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="diblock padl15 padr0 brdrad3 fsz30 black_txt"><i class="fas fa-bars" aria-hidden="true"></i></a> </div>
				<div class="clear"></div>
			</div>
		</div>
	  
	  <div class="column_m header xs-hei_55p  bs_bb lgtgrey2_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 lgtgrey2_bg " style="">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul nobold"><i class="fas fa-home black_txt " aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="top_menu talc    wi_60i " style="padding-top:5px;">
				<ul class="menulist sf-menu  fsz25  bold wi_100">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="black_txt pred_txt_h ffamily_avenir nobold">Qloudid</span></a>
					</li>
				 	 
       			 	</ul>
			</div> 
			<div class="top_menu frighti   padb10 visible-xs maxwi_60p" style="padding-top:8px;">
				<ul class="menulist sf-menu  fsz16">
					 
       			
					<li class="last marr0 padr10 first">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz30 nobold sf-with-ul"><span class="fas fa-bars black_txt " aria-hidden="true" onclick="changeDisplay();"></span></a>
						<ul style="display: none;" id="ulDisplay">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last marr0">
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Inloggad som</div>
									<ol class="">
									 
									<li class="first">
                    <div class="line martb10"></div>
                  </li>
				 
										
                  <li><a href="QloudidPersonal" class="fsz20">Personal</a></li>
				   
                  <li><a href="CorporateServicesEng" class="fsz20">Business</a></li>
                  <li><a href="https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/CreateAccount" class="fsz20">Sign up</a></li>
                   <li><a href="https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/loginapp" class="fsz20">Sign in</a></li> 
                  <li class="last">
                    <div class="line marb10"></div>
                  </li>
										
										
										 
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		
		<div class="clear"></div>
		
		
		<div class="column_m pos_rel " onclick="closePopup();">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 xs-padrl15 ">
				 
					<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" >
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" >
								
								 <ul class="dblock marr20 padt250 padl10 fsz18 mart0">
									  
						<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10    brdb_black black_txt  padb10"> <span class="valm trn ltr_space" >Documentation</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div></a>
								 </li>
						<li class="dblock padrb10 padt5">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Faq</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
						 
						  
										 
							 				 
											</ul>
							
								 
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_720p   fleft pos_rel zi5    padl20   xs-pad0">
						 
					 <div class="padb0 xxs-padb0 ">		
							<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn">HR API</h1>
									</div>
									
									<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">This is a documentation on how you can integrate your software to Qloud ID platform and generate digital ID for your employees</a></div>
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 white_bg " >
			
			<div class="wrap maxwi_100  xs-padr25 xs-padl10  padt40 xs-padt0 white_bg    tall  ">
				
				<section class=" section  whats-new xs-padt0 ffamily_avenir">
					<div class="section__nav section__nav--small">
						<h2 class="whats-new__headline bold">Information to connect HR API</h2>
						
					</div>
					<div class="l-row whats-new__content">
						
						<div class="l-column small-12 medium-9 large-8a small-valign-top">
							<div id="ember239" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view">    
								
								<div data-clamp="" id="ember241" class="we-clamp ember-view fsz14">
								  




<p class="black_txt  brdb_new fsz16">User need to use a encrypt decrypt function in his code to encrypt  data when sending information to qloudid.</p>
 <p class="black_txt  brdb_new fsz16">This encryption formula will be provided in api php code file encrypt_decrpyt.php</p>

<p class="black_txt padt10  padb0"><strong>For add employee from software user need to send company email and following information to qloudid </strong></p>
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>$_POST[company_email],$_POST['fname'], $_POST['lname'], $_POST['d_country'], $_POST['wmobile'], $_POST['email'], $_POST['wemail'], $_POST['enumber'] </li>
<li>All this information will be added to a array and decrypted to send to qloudid </li>
<li>$id= $this -> encrypt_decrypt('encrypt',$newData);</li>
<li>This data will be sent to qloudid with url like this (you can send in post as well) </li>
<li>https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/Curl/addEmployee/$id;</li>
 </ul>


 

<p class="black_txt padt10  padb0"><strong>If employee is provided with personal email user can be relieved only. But if he is not provided personal email you need a page to edit information if you want to add personal email and send invitation to user to connect. Following information will be sent on edit employee</strong></p>
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>$_POST[company_email],$_POST['fname'], $_POST['lname'], $_POST['d_country'], $_POST['wmobile'], $_POST['email'], $_POST['wemail'], $_POST['enumber'] , $_POST[employee_number](This employee number is same that was added on add employee)</li>
<li>All this information will be added to a array and decrypted to send to qloudid </li>
<li>$id= $this -> encrypt_decrypt('encrypt',$newData);</li>
<li>This data will be sent to qloudid with url like this (you can send in post as well) </li>
<li>https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/Curl/editEmployee/$id</li>
 </ul>

<p class="black_txt padt10  padb0"><strong>Now you can add relieving information on employee and send this to qloudid if it is invited or uninvited employee. Here is information required to be sent to qloudid</strong></p>
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>$_POST[company_email], $_POST[employee_number], $_POST['reason'], $_POST['relieving_date']</li>
<li>All this information will be added to a array and decrypted to send to qloudid </li>
<li>$id= $this -> encrypt_decrypt('encrypt',$newData);</li>
<li>This data will be sent to qloudid with url like this (you can send in post as well) </li>
<li>https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/Curl/ relieveEmployee/$id</li>
 </ul>									

<p class="black_txt padt10  padb0"><strong>Employee will be relieved on next date that is given on relieving </strong></p>

<p class="black_txt padt10  padb0"><strong>This all information will be sent by curl request.</strong></p> 
									
								</div>
								
								
								
								
							<!----></div>
						</div>
					</div>	</section>
				
			</div>		
			
		</div>
	
					  
								 
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
	 
		 
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	 <div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey_bg fsz14 brdrad10 popup_shadow" id="gratis_popup_delete">
		<div class="modal-content nobrdb talc box_shadox brdradtr10  lgtgrey_bg">
			
			
			<div class="pad25 lgtgrey_bg brdradtr10">
				<img src="../../../../../html/usercontent/images/kitten_1.jpg" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Are you Sure?</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">All available dishes in the menu will also be deleted. </span>
				</div>
				
				
			</div>
			
			<form action="../../deleteCategory/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" name="save_indexing2" id="save_indexing2" method="POST" >
			<input type="hidden" name="category_id" id="category_id" />
				</form>
			<div class="on_clmn padtb10">
				<a href="#" onclick="confirmCategoryDelete();"><input type="button" value="Confirm" class="wi_300p maxwi_100   hei_50p diblock nobrd red_ff2828_bg fsz18 white_txt curp bold close_popup_modal"></a>
				
			</div>
			
			<div class="on_clmn padt0">
				<input type="button" value="Close" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold">
				
			</div>
			 
	</div>
	
	</div>
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	
 </body>

</html>