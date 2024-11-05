<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/getstarted/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/getstarted/css/style.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/getstarted/css/idcard.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/getstarted/css/additional.css">
		<link href="<?php echo $path; ?>html/getstarted/css/jquery-ui-1.10.4.custom.html" rel="stylesheet" media="all">
		<title>Qmatchup</title>
		<script src="<?php echo $path; ?>html/getstarted/js/jquery.js"></script>
		<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
		<script>
		function submitForm()
{
	var x = $("#fname").val ();
	if(x == "")
		{
			alert("Please enter your first name");
			$("#fname").css("background-color","#FF9494");
			return false;
		}
		
		var x = $("#lname").val ();
	if(x == "")
		{
			alert("Please enter your last name");
			$("#lname").css("background-color","#FF9494");
			return false;
		}
	
	var x = $("#dt").val ();
	if(x == "")
		{
			alert("Please enter your Date of birth");
			$("#dt").css("background-color","#FF9494");
			return false;
		}
	document.getElementById("save_indexing").submit();
}
		</script>
		<!--<script type="text/javascript" src="<?php echo $path; ?>html/getstarted/js/jquery.js"></script>-->
	</head>
	<body>
		
		
		<!-- CONTENT -->
		<div class="column_m container minwi_960 ovfl_hid">
			
			<!-- Slider -->
			<div class="wi_100 hei_100vh bs_bb fleft pos_rel" id="vide_video" >
				<a href="#" class="video_control_btn">
					<img src="<?php echo $path; ?>html/getstarted/images/icon-youtsube.png" width="100" height="78" title="Play" alt="Play button" />
				</a>
			</div>
			
			<!-- Sliding modal tabs -->
			<div class="sliding-modal-tabs active-base wi_400p hei_100vh pos_abs top0 right-400p right0_a bs_bb white_bg fsz12 dark_grey2_txt trans_all3">
				<!-- header -->
				<div class="sliding-modal-header ovfl_hid pos_abs zi1 top25 right100 brdradtl3 fsz16">
					<ul class="mar0 pad0">
						<li class="dblock mar0 pad0">
							<a href="#" class="wp-tooltip dblock wi_40p hei_40p talc lgn_hight_40 dblue_bg blue2_bg_h white_bg_a white_txt dblue_txt_a" data-target="#tab-articles" data-tooltip="Articles" data-offset-x="10" data-offset-y="8"><span class="fa fa-book"></span></a>
						</li>
						<li class="dblock mar0 pad0">
							<a href="#" class="wp-tooltip dblock wi_40p hei_40p talc lgn_hight_40 dblue_bg blue2_bg_h white_bg_a white_txt dblue_txt_a" data-target="#tab-comments" data-tooltip="Comments" data-offset-x="10" data-offset-y="8"><span class="fa fa-comments"></span></a>
						</li>
						<li class="show-when-active dblock mar0 pad0">
							<a href="#" class="wp-tooltip sliding-modal-tabs-close dblock wi_40p hei_40p talc lgn_hight_40 red_bg white_txt" data-tooltip="Close" data-offset-x="10" data-offset-y="8"><span class="fa fa-close"></span></a>
						</li>
					</ul>
				</div>
				
				<!-- content -->
				<div class="sliding-modal-content wi_100 hei_100 overfl_auto pos_abs zi5 top0 left0 white_bg">
					
					<!-- article tab -->
					<div class="sliding-modal-tab aero-bold" id="tab-articles">
						<form action="GetStarted/GetStartedAccount" method="post" name="save_indexing" id="save_indexing">
							
							<!-- -close button -->
							<a href="#" class="close-sliding-modal dblock fright pos_rel zi5 pad10 fsz18">
								<span class="fa fa-close"></span>
							</a>
							
							<!-- Phase 1 -->
							
							<!-- Final phase -->
							<div class="form-progress pos_rel zi1">
								
								<!-- header area -->
								<div class="wi_100 hei_180p pos_abs top0 left0 bs_bb padtrl10 lgtgrey2_bg">
									
									<!-- progress -->
									<div class="progress wi_85 hei_10p ovfl_hid fleft mart5 grey_bg">
										<div class="dblue_bg  hei_100"  style="width: 75%"></div>
									</div>
									
									<div class="clear padb30"></div>
									
									<!-- title -->
									<h2 class="bold fsz32">Get Started</h2>
									
									<!-- login -->
									
									
									<!-- description -->
									<p class="pad0 fsz16">View your freelancers and more!</p>
									
									<div class="clear"></div>
								</div>
								
								<!-- questions  -->
								<div class="mhei_100vh bs_bb padt200 padb125">
									
									<div class="padb10">
										
										<div class="on_clmn bs_bb padrbl10">
											<input type="text" name="fname" value="<?php echo $result['first_name']; ?>" id="fname" class="wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" placeholder="First name" />
										</div>
										<div class="on_clmn bs_bb padrbl10">
											<input type="text" name="lname" id="lname" value="<?php echo $result['last_name']; ?>" class="wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" placeholder="Last name" />
										</div>
										<div class="on_clmn bs_bb padrbl10">
											<input type="date" name="dt" id="dt" value="<?php if($result['dob_month']>9) 
											{
												if($result['dob_day']>9)
												{
													echo $result['dob_year']."-".$result['dob_month']."-".$result['dob_day']; 
												}
												else
												{
													echo $result['dob_year']."-".$result['dob_month']."-0".$result['dob_day']; 
												}
											}
												
											
											else 
												
												{ 
												if($result['dob_day']>9)
												{
													echo $result['dob_year']."-0".$result['dob_month']."-".$result['dob_day']; 
												}
												else
												{
													echo $result['dob_year']."-0".$result['dob_month']."-0".$result['dob_day']; 
												} 
												}
											
											
											 ?>" class="wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" />
										</div>
										<div class="on_clmn bs_bb padrbl10">
											<select name="sx" id="sx" class="default wi_100i bs_border pad10 brd brdwi_2 brdrad_2 lgtgrey3_txt fsz14">
											<option value="<?php echo $result['sex']; ?>"><?php if($result['sex']==1) echo "Male"; else echo "Female"; ?></option>
												<?php if($result['sex']==2) { ?>
												<option value="1">Male</option>
												<?php } else { ?>
												<option value="2">Female</option>
												<?php } ?>
											</select>
										</div>
										
										<div class="clear padb10"></div>
										<div class="on_clmn bs_bb padrbl10">
											<label><input type="checkbox" name="checkbox1" /> <span class="marl2 valm">Yes! Send me genuinely useful emails every now and then to help me get the most out of Qmatchup.</span></label>
										</div>
										<div class="on_clmn bs_bb padrbl10">
											<label><input type="checkbox" name="checkbox1" /> <span class="marl2 valm">Yes, I understand and agree to the Upwork <a href="#" target="_blank">Terms of Service</a>, including the <a href="#" target="_blank">User Agreement</a> and <a href="#" target="_blank">Privacy Policy</a>.</span></label>
										</div>
										
										<div class="clear"></div>
											
									</div>
									
								</div>
								
								<!-- footer area -->
								<div class="wi_100 pos_abs bot0 left0">
									<div class="pad10 lgtgrey2_bg">
										<div class="padtb5">
											<a href="#" class="form-progress-back dinlblock fleft padt10 fsz14">
												<span class="fa fa-chevron-left valm"></span>
												<span class="valm">Back</span>
											</a>
											<input type="button" value="Submit" onclick="submitForm();" class="dblue_btn bs_bb fright blue2_bg dblue2_bg_h tall fsz14"/>
											<input type="hidden" name="indexing_save" id="indexing_save" class="dblue_btn bs_bb fright blue2_bg dblue2_bg_h tall fsz14"/>	
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="pad10 grey_bg talc fsz14">
										<div class="padtb5">
											Want to get hired for projects? <a href="#">Become a freelancer</a>
										</div>
									</div>
								</div>
								
							</div>
							
						</form>
						
					</div>
					
					<!-- comment tab -->
					<div class="sliding-modal-tab aero-bold" id="tab-comments">
						<form action="" method="post">
							
							<!-- logo -->
							<div class="marb10 pad10 blue2_bg white_txt">
								<div class="marb10">
									<a href="#" class="fsz21 white_txt">
										<img src="<?php echo $path; ?>html/getstarted/images/fortnox.jpg" alt="Qmatchup" title="Bisswise" class="valm" />
										<span class="valm">
											Användarstöd 
										</span>
									</a>
								</div>
								<div class="clear"></div>
								
								<div class="fleft marl5 padt5">
									Användar-ID: <span class="user-support-id">14888</span>
								</div>
								
								<a href="#" class="dblock fright pad5 brd white_txt">
					                <span class="user-support-logon-text">Aktivera</span> <b>supportinlogg</b>
					             </a>
					             
								<div class="clear padb5"></div>
							</div>
							
							<!-- Work 0  -->
							<div class="padb30 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 0
								</div>
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="padrl10">
									 <video width="400" height="220" controls="controls" poster="<?php echo $path; ?>html/getstarted/video/ocean.jpg" class="wi_100 black_bg">
									 	<source src="<?php echo $path; ?>html/getstarted/video/ocean.ogv" type='<?php echo $path; ?>html/getstarted/video/ogg; codecs="theora, vorbis"'>
									 	<source src="<?php echo $path; ?>html/getstarted/video/ocean.mp4" type='<?php echo $path; ?>html/getstarted/video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
									 	<source src="<?php echo $path; ?>html/getstarted/video/ocean.webm" type='<?php echo $path; ?>html/getstarted/video/webm; codecs="vp8, vorbis"'>
									 </video>
								</div>
							</div>
							
							<!-- Work 1  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 1
								</div>
								<div class="padb10">
									<h3 class="fleft mart5 padl10 fsz14">
										Do you work?
									</h3>
									<div class="boolean-control boolean-control-small boolean-control-green fright marr10">
										<input type="checkbox" name="do_you_work" class="default" data-target="#com_do_you_work" data-true="Yes" data-false="No" />
									</div>
									<div class="clear"></div>	
								</div>
								
								<!-- Currently?  -->
								<div class="hide" id="com_do_you_work">
									<div class="padb10">
										<h3 class="fleft mart5 padl10 fsz14">
											Currently?
										</h3>
										<div class="boolean-control boolean-control-small boolean-control-green fright marr10">
											<input type="checkbox" name="work_params" class="default" data-target="#com_work_params" data-true="Yes" data-false="No" />
										</div>
										<div class="clear"></div>
									</div>
									
									<div class="hide" id="com_work_params">
										<!-- Search and results -->
										<div class="">
											<h3 class="padbl10 fsz14">
												Landlord
											</h3>
											
											<div class="padrl10">
												<div class="padb10">
													<input type="text" placeholder="Landlord name" class="autocomplete-custom filter_list_input wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" data-source="landlord_list_data">
													<div class="add_new_form hide">
														<a href="#" class="dblue_btn bs_border talc fsz16">Add new landlord</a>
													</div>
													<script>
														var landlord_list_data = [{label: 'John', location: 'Texas, US', value: 'John'}, {label: 'Kyle', location: 'Texas, US', value: 'kyle'}, {label: 'Smith', location: 'Texas, US', value: 'Smith'}, {label: 'Brian', location: 'Texas, US', value: 'Brian'}, {label: 'Vassiliy', location: 'Texas, US', value: 'Vassiliy'}, {label: 'Serge', location: 'Texas, US', value: 'Serge'}, {label: 'Ivan', location: 'Texas, US', value: 'Ivan'}, {label: 'Mike', location: 'Texas, US', value: 'Mike'}];
													</script>
												</div>
											</div>
											<div class="padb20">
												<div class="padrl10">
													<button type="submit" class="dblue_btn wi_100 bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<!-- Work 1 (copy)  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 1 (copy)
								</div>
								
								<h3 class="mart5 padbl10 fsz14">
									Do you work?
								</h3>
								<div class="padl10">
									<div class="boolean-control boolean-control-small boolean-control-green padb5">
										<input type="checkbox" name="do_you_work" class="default" data-target="#com_do_you_work2" data-true="Yes" data-false="No" />
									</div>
								</div>
								
								<!-- Currently?  -->
								<div class="hide" id="com_do_you_work2">
									<h3 class="mart5 padbl10 fsz14">
										Currently?
									</h3>
									<div class="padl10">
										<div class="boolean-control boolean-control-small boolean-control-green padb5">
											<input type="checkbox" name="work_params" class="default" data-target="#com_work_params2" data-true="Yes" data-false="No" />
										</div>
									</div>
									
									
									<div class="hide" id="com_work_params2">
										<!-- Search and results -->
										<div class="padt10">
											<h3 class="padbl10 fsz14">
												Landlord
											</h3>
											
											<div class="padrl10">
												<div class="padb10">
													<input type="text" placeholder="Landlord name" class="autocomplete-custom filter_list_input wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" data-source="landlord_list_data">
													<div class="add_new_form hide">
														<a href="#" class="dblue_btn bs_border talc fsz16">Add new landlord</a>
													</div>
													<script>
														var landlord_list_data = [{label: 'John', location: 'Texas, US', value: 'John'}, {label: 'Kyle', location: 'Texas, US', value: 'kyle'}, {label: 'Smith', location: 'Texas, US', value: 'Smith'}, {label: 'Brian', location: 'Texas, US', value: 'Brian'}, {label: 'Vassiliy', location: 'Texas, US', value: 'Vassiliy'}, {label: 'Serge', location: 'Texas, US', value: 'Serge'}, {label: 'Ivan', location: 'Texas, US', value: 'Ivan'}, {label: 'Mike', location: 'Texas, US', value: 'Mike'}];
													</script>
												</div>
											</div>
											<div class="padb20">
												<div class="padrl10">
													<button type="submit" class="dblue_btn wi_100 bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							
							<!-- Work 2 -->
							<div class="filter_list padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 2
								</div>
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="padrl10">
									<input type="text" placeholder="Landlord name" class="autocomplete-custom filter_list_input wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" data-source="landlord_list_data">
									<div class="add_new_form hide">
										<a href="#" class="dblue_btn bs_border talc fsz16">Add new landlord</a>
									</div>
									<script>
										var landlord_list_data = [{label: 'John', location: 'Texas, US', value: 'John'}, {label: 'Kyle', location: 'Texas, US', value: 'kyle'}, {label: 'Smith', location: 'Texas, US', value: 'Smith'}, {label: 'Brian', location: 'Texas, US', value: 'Brian'}, {label: 'Vassiliy', location: 'Texas, US', value: 'Vassiliy'}, {label: 'Serge', location: 'Texas, US', value: 'Serge'}, {label: 'Ivan', location: 'Texas, US', value: 'Ivan'}, {label: 'Mike', location: 'Texas, US', value: 'Mike'}];
									</script>
								</div>
								<div class="mart10 padb20">
									<div class="padrl10">
										<button type="submit" class="dblue_btn wi_100 bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
									</div>
								</div>
							</div>
							
							<!-- Work 3 -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 3
								</div>
								<h3 class="fleft mart5 padbl10 fsz14">
									Are you looking for work?
								</h3>
								<div class="boolean-control boolean-control-small boolean-control-green fright marr10">
									<input type="checkbox" name="show_form" class="default" data-target="#com_landlord_params" data-true="Yes" data-false="No" />
								</div>
								<div class="clear"></div>
								
								<div class="hide" id="com_landlord_params">
									
									<!-- Search and results -->
									<div class="padt10">
										<h3 class="padbl10 fsz14">
											Landlord
										</h3>
										
										<div class="padrl10">
											
												<input type="text" placeholder="Landlord name" class="autocomplete-custom filter_list_input wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" data-source="landlord_list_data">
												<div class="add_new_form hide">
													<a href="#" class="dblue_btn bs_border talc fsz16">Add new landlord</a>
												</div>
												<script>
													var landlord_list_data = [{label: 'John', location: 'Texas, US', value: 'John'}, {label: 'Kyle', location: 'Texas, US', value: 'kyle'}, {label: 'Smith', location: 'Texas, US', value: 'Smith'}, {label: 'Brian', location: 'Texas, US', value: 'Brian'}, {label: 'Vassiliy', location: 'Texas, US', value: 'Vassiliy'}, {label: 'Serge', location: 'Texas, US', value: 'Serge'}, {label: 'Ivan', location: 'Texas, US', value: 'Ivan'}, {label: 'Mike', location: 'Texas, US', value: 'Mike'}];
												</script>
										</div>
										<div class="mart10 padb20">
											<div class="padrl10">
												<button type="submit" class="dblue_btn wi_100 bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
											</div>
										</div>
										
									</div>
									
								</div>
							</div>
							
							<!-- Work 4  -->
							<div class="filter_list padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 4
								</div>
								<div class="clear"></div>
								<a href="#" class="filter_list_add fright padr10 blue2_txt" data-id="com_landlord_list">Add</a>
								<h3 class="fleft mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="clear"></div>
								<div class="filter_list_add_form padrl10 hide">
									<div class="padb5">
										<div class="wi_50 bs_border fleft padrb5">
											<input type="text" placeholder="Landlord name to add" class="wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14">
										</div>
										<div class="wi_25 bs_border fleft padrbl5">
											<a href="#" class="dblue_btn wi_100 pad0i bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14" data-action="add" data-id="com_landlord_list" data-row-tag="tr" data-filter-tag="h3"> <span class="fa fa-plus valm fsz16i"></span> <span class="valm">Add</span> </a>
										</div>
										<div class="wi_25 bs_border fleft padbl5">
											<a href="#" class="lgtgrey_btn wi_100 padr0i padl10i bs_border tall fsz14" data-action="cancel"> <span class="fa fa-ban valm fsz16i"></span> <span class="valm">Cancel</span> </a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
								
									
								<div class="padrl10">
									<input type="text" placeholder="Landlord name" class="filter_list_input wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" data-id="com_landlord_list" data-row-tag="tr" data-filter-tag="h3" data-default="hide">
								</div>
									
								<div class="padrl10">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										<tbody id="com_landlord_list">
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
													<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Tom</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">John</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Kyle</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Smith</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Brian</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Vassiliy</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Serge</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Ivan</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Mike</h3> </td>
											</tr>
											<tr class="hide">
												<td class="wi_36p padr15 brdb valm talr">
													<input type="radio" name="selector" /> </td>
												<td class="content-cell padtb5 brdb valm">
													<h3 class="padb5 fsz14">Marcel</h3> </td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="mart10 padb20">
									<div class="padrl10">
										<button type="submit" class="dblue_btn wi_100 bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
									</div>
								</div>
							</div>
							
							<!-- Work 5  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
									Work 5
								</div>
								<h3 class="fleft mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="mart5 padrl10">
									<div class="select-base padb10">
										<select class="binded-select default wi_100i bs_border pad10 brd brdwi_2 brdrad_2 lgtgrey3_txt" data-source="binded_selects_source" id="binded_select1"></select>
									</div>
									<div class="select-base padb10 hide">
										<select class="binded-select default wi_100i bs_border pad10 brd brdwi_2 brdrad_2 lgtgrey3_txt" data-source="binded_selects_source" id="binded_select2"></select>
									</div>
									<div class="select-base padb10 hide">
										<select class="binded-select default wi_100i bs_border pad10 brd brdwi_2 brdrad_2 lgtgrey3_txt" data-source="binded_selects_source" id="binded_select3"></select>
									</div>
								</div>
								<div class="padb20">
									<div class="padrl10">
										<button type="submit" class="dblue_btn wi_100 bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
									</div>
								</div>
								
								<script>
									var binded_selects_source = [
									{							
										title 	: 'level1 - option 1', // title that will go to <option></option>
										value 	: 'level11', // option value
										items	: [ // that will effect other select controls that are bound to this source
										{
											title 	: 'level 11 2 - option 1',
											value 	: 'level1121',
											items	: [
											{
												title 	: 'level 11 21 3 - option 1',
												value 	: 'level112131',
											},
											{
												title 	: 'level 11 21 3 - option 2',
												value 	: 'level112132',
											},
											{
												title 	: 'level 11 21 3 - option 3',
												value 	: 'level112133',
											},
											]
										},
										{
											title 	: 'level 11 2 - option 2',
											value 	: 'level1122',
											items	: [
											{
												title 	: 'level 11 22 3 - option 1',
												value 	: 'level112231',
											},
											{
												title 	: 'level 11 22 3 - option 2',
												value 	: 'level112232',
											},
											{
												title 	: 'level 11 22 3 - option 3',
												value 	: 'level112233',
											},
											]
										},
										{
											title 	: 'level 11 2 - option 3',
											value 	: 'level1123',
											items	: [
											{
												title 	: 'level 11 23 3 - option 1',
												value 	: 'level112331',
											},
											{
												title 	: 'level 11 23 3 - option 2',
												value 	: 'level112332',
											},
											{
												title 	: 'level 11 23 3 - option 3',
												value 	: 'level112333',
											},
											]
										}
										],
									},
									{							
										title 	: 'level1 - option 2',
										value 	: 'level12',
										items	: [
										{
											title 	: 'level 12 2 - option 1',
											value 	: 'level1221',
											items	: [
											{
												title 	: 'level 12 21 3 - option 1',
												value 	: 'level122131',
											},
											{
												title 	: 'level 12 21 3 - option 2',
												value 	: 'level122132',
											},
											{
												title 	: 'level 12 21 3 - option 3',
												value 	: 'level122133',
											},
											]
										},
										{
											title 	: 'level 12 2 - option 2',
											value 	: 'level1222',
											items	: [
											{
												title 	: 'level 12 22 3 - option 1',
												value 	: 'level122231',
											},
											{
												title 	: 'level 12 22 3 - option 2',
												value 	: 'level122232',
											},
											{
												title 	: 'level 12 22 3 - option 3',
												value 	: 'level122233',
											},
											]
										},
										{
											title 	: 'level 12 2 - option 3',
											value 	: 'level1223',
											items	: [
											{
												title 	: 'level 12 23 3 - option 1',
												value 	: 'level122331',
											},
											{
												title 	: 'level 12 23 3 - option 2',
												value 	: 'level122332',
											},
											{
												title 	: 'level 12 23 3 - option 3',
												value 	: 'level122333',
											},
											]
										}
										],
									},
									{							
										title 	: 'level1 - option 3',
										value 	: 'level13',
										items	: [
										{
											title 	: 'level 13 2 - option 1',
											value 	: 'level1321',
											items	: [
											{
												title 	: 'level 13 21 3 - option 1',
												value 	: 'level132131',
											},
											{
												title 	: 'level 13 21 3 - option 2',
												value 	: 'level132132',
											},
											{
												title 	: 'level 13 21 3 - option 3',
												value 	: 'level132133',
											},
											]
										},
										{
											title 	: 'level 13 2 - option 2',
											value 	: 'level1322',
											items	: [
											{
												title 	: 'level 13 22 3 - option 1',
												value 	: 'level132231',
											},
											{
												title 	: 'level 13 22 3 - option 2',
												value 	: 'level132232',
											},
											{
												title 	: 'level 13 22 3 - option 3',
												value 	: 'level132233',
											},
											]
										},
										{
											title 	: 'level 13 2 - option 3',
											value 	: 'level1323',
											items	: [
											{
												title 	: 'level 13 23 3 - option 1',
												value 	: 'level132331',
											},
											{
												title 	: 'level 13 23 3 - option 2',
												value 	: 'level132332',
											},
											{
												title 	: 'level 13 23 3 - option 3',
												value 	: 'level132333',
											},
											]
										}
										],
									},
									]
								</script>
							</div>
							
							<!-- Work 6  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
									Work 6
								</div>
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="padrl10">
									<div class="padb20">
										<div class="wi_75 bs_border fleft padr5">
											<input type="text" placeholder="Landlord name to add" class="wi_100 bs_border pad10 brd brdwi_2 brdrad_2 fsz14" id="com_work6source" />
										</div>
										<div class="wi_25 bs_border fleft padl5">
											<a href="#" class="add_to_list dblue_btn wi_100 pad0i bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14" data-source="#com_work6source" data-target="#com_work6list">
												<span class="fa fa-plus valm fsz16i"></span>
												<span class="valm">Add</span>
											</a>
										</div>
										<div class="clear"></div>
										<div id="com_work6list"></div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							
							<!-- Work 7 -->
							<div class="filter_list padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 7
								</div>
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="no-mce-statusbar mce-brdwi_2 padrl10">
									<textarea class="texteditor" name="texteditor"></textarea>
								</div>
								<div class="mart10 padb20">
									<div class="padrl10">
										<button type="submit" class="dblue_btn wi_100 bs_border padr0i padl10i blue2_bg dblue2_bg_h tall fsz14"> <span class="fa fa-share-square-o marr5 valm fsz16i"></span> <span class="valm">Submit</span> </button>
									</div>
								</div>
							</div>
							
							<!-- Work 8  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 8
								</div>
								
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="padb10">
									
									<div class="tw_clmn bs_bb padrl10">
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 1</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 2</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 3</span></label>
										</div>
									</div>
									
									<div class="tw_clmn bs_bb padrl10">
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 4</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 5</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 6</span></label>
										</div>
									</div>
									
									<div class="clear"></div>	
								</div>
							</div>
							
							<!-- Work 9  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 9
								</div>
								
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="padb10">
									
									<div class="tw_clmn bs_bb padrl10">
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 1</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 2</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 3</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="checkbox" /> <span class="marl2 valm">Checkbox 3</span></label>
										</div>
									</div>
									
									<div class="clear"></div>	
								</div>
							</div>
							
							<!-- Work 10  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 10
								</div>
								
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="padb10">
									
									<div class="tw_clmn bs_bb padrl10">
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio1" checked="checked" /> <span class="marl2 valm">Checkbox 1</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio1" /> <span class="marl2 valm">Checkbox 2</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio1" /> <span class="marl2 valm">Checkbox 3</span></label>
										</div>
									</div>
									
									<div class="tw_clmn bs_bb padrl10">
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio1" /> <span class="marl2 valm">Checkbox 4</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio1" /> <span class="marl2 valm">Checkbox 5</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio1" /> <span class="marl2 valm">Checkbox 6</span></label>
										</div>
									</div>
									
									
									<div class="clear"></div>	
								</div>
							</div>
							
							<!-- Work 11  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 11
								</div>
								
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="padb10">
									
									<div class="tw_clmn bs_bb padrl10">
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio2" checked="checked" /> <span class="marl2 valm">Checkbox 1</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio2" /> <span class="marl2 valm">Checkbox 2</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio2" /> <span class="marl2 valm">Checkbox 3</span></label>
										</div>
										<div class="marb10 padb10 brdb">
											<label><input type="radio" name="radio2" /> <span class="marl2 valm">Checkbox 3</span></label>
										</div>
									</div>
									
									<div class="clear"></div>	
								</div>
							</div>
							
							<!-- Work 12  -->
							<div class="padtb10 brdb">
								<div class="dblock padrl10 fsz14 bold dark_grey2_txt">
									<span class="fa fa-chevron-right wi_20p mart5 blue_txt"></span>
										Work 12
								</div>
								
								<h3 class="mart5 padbl10 fsz14">
									Landlord
								</h3>
								<div class="padrbl10">
									
									<div class="wi_100 dtable brdt brdl brdclr_white">
										<div class="dtrow">
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>Projects</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>Something</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>Bids</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
										</div>
										<div class="dtrow">
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>Administration</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>Accounting</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>Calendar</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
										</div>
										<div class="dtrow">
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>Crm</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>Helpdesk</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
											<a href="#" class="toggle-base toggle-active active-base2 wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg blue_bg_h blue_bg_a valm talc white_txt_h white_txt_a">
												<span>HR</span>
												<div class="wi_60 marrla padt5">
													<img src="<?php echo $path; ?>html/getstarted/images/cloud2.png" class="hide-when-active2 wi_100 hei_auto valb" />
													<img src="<?php echo $path; ?>html/getstarted/images/cloud_h.png" class="show-when-active2 wi_100 hei_auto valb" />
												</div>
											</a>
										</div>
									</div>
									
									
									
									<div class="clear"></div>	
								</div>
							</div>
							
							<!-- Toggle slide list  -->
							<div class="base padb20 brdb brdrad5">
								<div class="pad10">
									<a href="#" class="toggle-btn dblock fsz14 bold dark_grey2_txt target_shown" data-toggle-id="base"> <span class="fa fa-chevron-right arrow-bottom wi_20p mart5 blue_txt"></span> <span class="fa fa-chevron-down arrow-up wi_20p mart5 blue_txt"></span> Hjälpavsnitt </a>
									<div class="toggle_content padt10">
										<ul class="mar0 padl20 lgn_hight_15">
											<li class="marb5 blue2_txt"> <a href="#" class="blue2_txt">Logga in i klientens program</a> </li>
											<li class="marb5 blue2_txt"> <a href="#" class="blue2_txt">Lägg till ny klient</a> </li>
											<li class="marb5 blue2_txt"> <a href="#" class="blue2_txt">Lägg till ny konsult</a> </li>
											<li class="blue2_txt"> <a href="#" class="blue2_txt">Sammankoppling med redan befintlig Fortnoxkund</a> </li>
										</ul>
									</div>
								</div>
							</div>
							<div class="base padb20 brdb brdrad5">
								<div class="pad10">
									<a href="#" class="toggle-btn dblock fsz14 bold dark_grey2_txt target_shown" data-toggle-id="base">
										<span class="fa fa-chevron-right arrow-bottom wi_20p mart5 blue_txt"></span>
										<span class="fa fa-chevron-down arrow-up wi_20p mart5 blue_txt"></span>
										Om oss
									</a>
									<div class="toggle_content padt10">
										<h3>Kort om Consensum AB Sollentuna</h3>
										<p> Consensum gymnasieskola i Sollentuna är en liten trevlig skola med drygt 150 elever på Vård och omsorgsprogrammet. Skolan är certifierad Vård & omsorgscollege vilket borgar för hög kvalitet. </p>
										<p class="pad0"> <a href="http://www.consensum.se" class="blue2_txt">http://www.consensum.se</a> </p>
									</div>
								</div>
							</div>
						
						</form>
						
					</div>
				
				</div>
			</div>
			
		</div>
		
		
		<!-- Vex styles -->
		<link rel="stylesheet" href="<?php echo $path; ?>html/getstarted/css/vex.css" />
		<link rel="stylesheet" href="<?php echo $path; ?>html/getstarted/css/vex-theme-os.css" />
		<link rel="stylesheet" href="<?php echo $path; ?>html/getstarted/css/font-awesome.min.css" />
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/getstarted/js/jquery-ui.min.js"></script> 
		<script type="text/javascript" src="<?php echo $path; ?>html/getstarted/js/superfish.js"></script> 
		<script type="text/javascript" src="<?php echo $path; ?>html/getstarted/js/icheck.js"></script> 
		<script type="text/javascript" src="<?php echo $path; ?>html/getstarted/js/jquery.selectric.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/getstarted/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/getstarted/js/jquery.vide.min.js"></script>
		<script src="<?php echo $path; ?>html/getstarted/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/getstarted/js/custom.js"></script>
		
		
		<script>
			tinyMCE.init({
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
		
			$(document).ready(function() {
				$('#vide_video')
					.vide('<?php echo $path; ?>html/getstarted/video/ocean',{
						 volume: 1,
						 playbackRate: 1,
						 muted: true,
						 loop: false,
						 autoplay: false,
						 position: '50% 50%',
						 posterType: 'detect',
						 resizing: true,
						 bgColor: 'transparent',
						 className: 'vide_video'
					})
					.find('.video_control_btn').on('click', function(){
						var $this = $(this),
							video = $this.parent().find('video').get(0);
						
						console.log($this.parent());
						console.log(video);
						
						if($this.hasClass('pause')){
							$this
								.removeClass('pause')
								.addClass('play');
							video.pause();
						}
						else{
							$this
								.removeClass('play')
								.addClass('pause');
							video.play();
						}
						return false;
					});
			});
		</script>
	</body>
</html>