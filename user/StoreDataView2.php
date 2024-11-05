<!doctype html>
<html>
	<?php
		
		if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; 
		function month_s($value)
		{
			if($value==1)
			{
				return "January";
			}
			else if($value==2)
			{
				return "February";
			}
			else if($value==3)
			{
				return "March";
			}
			else if($value==4)
			{
				return "April";
			}
			else if($value==5)
			{
				return "May";
			}
			else if($value==6)
			{
				return "June";
			}
			else if($value==7)
			{
				return "July";
			}
			else if($value==8)
			{
				return "August";
			}
			
			else if($value==9)
			{
				return "September";
			}
			else if($value==10)
			{
				return "October";
			}
			else if($value==11)
			{
				return "November";
			}
			else if($value==12)
			{
				return "December";
			}
		}
		
		
	?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			var dict = {
				"Home": {
					sv: "Início"
				},
				"Download plugin": {
					sv: "Descarregar plugin",
					en: "Download plugin"
				}
			}
			var translator = $('body').translate({lang: "en", t: dict});
			translator.lang("sv");
			var translation = translator.get("Home");
			
			function removeActive()
			{
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function raActive()
			{
				
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rbActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown2").removeClass('active');
			}
			var currentLang = 'sv';
			function imageUpdate()
			{
				
				
				var bg_url = $('#image-data').css('background-image');
				//alert(bg_url);
				if(bg_url=="" || bg_url==null || bg_url=="none")
				{
					alert("please select image");
					return false;
				}
				else
				{
					$('#image-data1').val(bg_url);
					//alert($('#image-data1').val());
				}
				document.getElementById("save_image").submit();
			}
		</script>
		
		<script>	
			function w_state_f(id)
			{
				
				var id1=document.getElementById("cntry").value;
				
				if(id1==0)
				{
					alert("Please Select Country First"); 
					return false;
				}
				
				
				if(id1!=0)
				{
					
					$.get("selectState/"+id1,function(data,status){
						
						if(data)
						{
							// appanding data to family id element
							document.getElementById("state").innerHTML = data;
						}
						else
						{
							// if ajax reques is not successfull
							alert("Some error occurred, Please report to web admin !!!");
							return false;
						}
						
						
					});
					
				}
				
			}
			
			function w_city_f(id)
			{
				
				var id1=document.getElementById("state").value;
				
				if(id1>0)
				{
					
					
					$.get("selectCity/"+id1,function(data2,status){
						
						if(data2)
						{
							// appanding data to class id element
							document.getElementById("city").innerHTML = data2;
						}
						else
						{
							// if ajax reques is not successfull
							alert("Some error occurred, Please report to web admin !!!");
							return false;
						}
						
						
					});
				}
				
			}
			
			
			function w_district_f(id)
			{
				
				var id1=document.getElementById("city").value;
				
				
				
				if(id>0)
				{
					
					
					$.get("selectDistrict/"+id1,function(data3,status){
						
						if(data3)
						{
							// appanding data to class id element
							document.getElementById("district").innerHTML = data3;
						}
						else
						{
							// if ajax reques is not successfull
							alert("Some error occurred, Please report to web admin !!!");
							return false;
						}
						
						
					});
				}
				
			}
			
			function school(id)
			{
				// sending ajax request to fetch families
				$.get("selectCountry/"+id,function(data1,status){
					
					if(data1)
					{
						// appanding data to family id element
						document.getElementById("cv_school").innerHTML = data1;
					}
					else
					{
						// if ajax reques is not successfull
						alert("Some error occurred, Please report to web admin !!!");
						return false;
					}
					
					
				});
			}
			
			function degree(id)
			{
				//alert(id);
				// sending ajax request to fetch families
				$.get("schoolSelect/"+id,function(data1,status){
					
					if(data1)
					{
						// appanding data to family id element
						document.getElementById("cv_degree").innerHTML = data1;
					}
					else
					{
						// if ajax reques is not successfull
						alert("Some error occurred, Please report to web admin !!!");
						return false;
					}
					
					
				});
			}
			
			
			
			
			
			
			function company_select(id)
			{
				var name=id;
				//alert (name.length); return false;
				if(name.length >=4)
				{
					//alert(name);
					$.get("companySelect/"+name,function(data1,status){
						
						if(data1)
						{
							//alert(data1);
							document.getElementById("company_names").innerHTML=data1;
						}
						
						
						
					});
					
				}
				
			}
			
			function checkexperiance1()
			{
				
				
				var avail=$("#show_form");
				var city=$("#city");
				//alert(city.val()); return false;
				if(avail.val() == "on")
				{
					
					var weeks=$("#weeks");
					var hours=$("#hours");
					var wen=$("#wen");
					if(weeks.val() == "0")
					{
						alert("Please Select weeks !!!");
						return false;
					}
					
					if(hours.val() == "0")
					{
						alert("Please Select hours !!!");
						return false;
					}
					
					if(wen.val() == "0")
					{
						alert("Please Select when will you like to work !!!");
						return false;
					}
					var cntry=$("#cntry");
					
					
					if(cntry.val() == "0")
					{
						alert("Please Select Country !!!");
						return false;
					}
					
					
					var state=$("#state");
					
					if(state.val() == "0")
					{
						alert("Please Select state !!!");
						return false;
					}
					
					
					
					var city=$("#city");
					
					if(city.val() == "0")
					{
						alert("Please Select city !!!");
						return false;
					}
					
					
					
					
					var district=$("#district");
					
					if(district.val() == "0")
					{
						alert("Please Select district !!!");
						return false;
					}
					
				}
				document.getElementById("experiance1").submit();
				
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
		</script>
		
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
		<?php include 'UserHeader.php'; ?>
		<div class="clear"></div>
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40" onclick="removeActive();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<!-- Left sidebar -->
					
					
					<!-- Center content -->
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5 white_bg padrl10">
						
						<div class="column_m pos_rel zi1 brdb marb30">
				<div class="wi_100 pos_abs zi1 top0 left0 bgir_norep bgis_cov bgip_c brdb"></div>
				<div class="wrap maxwi_100 pos_rel zi10 ">
					<div class=" bs_bb padtb15 black_txt">
						<div class="padb30">
							
							<a href="#" class="marr5 black_txt fsz16">Step 1 - Store It</a>
							
							
						</div>
						<h1 class="edit-text jain padb5 tall fsz50 black_txt xs-fsz40 uppercase" id="dFJHdit4c3R6VlhXelY0bXdXTUtxUT09">store your data</h1>
						<p class="pad0 tall fsz20 xs-fsz16">Please store your data here</p>
					</div>
				</div>
			</div>
						<!-- Curriculum vitae (professional summary) -->
						
						
							<div class="marrl10 lgtgrey2_bg brdrad3" >
						
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
								<div class="wi_100 pos_abs xs-pos_sta top0 right0">
									<div class="dflex alit_c justc_fe mart-10 marr-10">
										<div class="pos_rel">
											<a href="#" class="show_popup_modal dblock opa50 opa1_h pad10 trans_opa2" data-target="#collaborators-modal">
												<img src="<?php echo $path;?>html/usercontent/images/icons/add-person-to-group-24.svg">
											</a>
											<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
												<span class="dblock padrl8">Add collaborator</span>
											</div>
										</div>
										<div class="pos_rel">
											<a href="#" class="show_popup_modal dblock opa50 opa1_h pad10 trans_opa2" data-target="#reset-pass-modal">
												<img src="<?php echo $path;?>html/usercontent/images/icons/reset-password-24.svg">
											</a>
											<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
												<span class="dblock padrl8">Reset password</span>
											</div>
										</div>
										<div class="pos_rel">
											<a href="#" class="class-toggler dblock opa50 opa1_h pad10 trans_opa2" data-target="#organization-move,#organization-move-fade" data-classes="active">
												<img src="<?php echo $path;?>html/usercontent/images/icons/move-to-another-organization-24.svg">
											</a>
											<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
												<span class="dblock padrl8">Move to another organization</span>
											</div>
											<div class="wi_270p dnone dblocki_a pos_abs zi40 top100 right-20p xxs-right-100p pad10 bxsh_02100_105112113_05 brd bg_f" id="organization-move">
												<h2 class="mar0 padtrl8 padb0 fsz20">Move to organization</h2>
												<div class="minhei_180p padt10 padrl6">
													<div class="pos_rel mart10">
														<a href="#" class="dblock pad8 bg_f bg_e5_h txt_0 trans_all2">qmatchup.com</a>
														<div class="opa0_nsibh opa50 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
															<span class="dblock padrl8">qmatchup.com</span>
															<span class="dblock padrl8">qmatchup.com</span>
														</div>
													</div>
												</div>
												<div class="brdt">
													<a href="#" class="chained-trigger wi_100 dblock pad10 bg_e5_h uppercase talc bold fsz13 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click">Create new</a>
													<a href="#" class="show_popup_modal dnone" data-target="#new-organization-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#organization-move,#organization-move-fade" data-classes="active">Close popup</a>
												</div>
											</div>
										</div>
										<div class="pos_rel">
											<a href="#" class="class-toggler dblock opa50 opa1_h pad10 trans_opa2" data-target="#add-userto-group,#add-userto-group-fade" data-classes="active">
												<img src="<?php echo $path;?>html/usercontent/images/icons/add-person-to-group-24.svg">
											</a>
											<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
												<span class="dblock padrl8">Add user to group</span>
											</div>
											<div class="wi_300p maxwi_100vw-45p dnone dblocki_a pos_abs zi40 top100 right-20p xxs-right-50p pad10 bxsh_02100_105112113_05 brd bg_f" id="add-userto-group">
												<h2 class="mar0 padtrl8 padb0 fsz20">Add to group</h2>
												<form>
													<div class="minhei_200p dflex fxdir_col padt10 padrl6">
														<div class="wi_100 fxshrink_0 pos_rel mart10">
															<span class="fa fa-search pos_abs pos_cenY left0 padt1 txt_6"></span>
															<label id="add-to-group-search" class="sr-only">Search group by email address</label>
															<input type="search" name="search" id="add-to-group-search" class="wi_100 mart5 padtb10 padr0 padl20 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Search group by email address">
														</div>
														<div class="dflex flex_1 justc_c alit_c fsz20 txt_0">
															<span>No groups found</span>
														</div>
													</div>
												</form>
												<div class="brdt">
													<a href="#" class="wi_100 dblock pad10 bg_e5_h uppercase talc bold fsz13 txt_0 trans_all2">Manage groups</a>
												</div>
											</div>
										</div>
										<div class="pos_rel">
											<a href="#" class="class-toggler dblock opa50 opa1_h pad10 trans_opa2" onclick="addActive();" data-classes="active">
												<img src="<?php echo $path;?>html/usercontent/images/icons/more.svg">
											</a>
											<div class="wi_120p dnone dblocki_a pos_abs zi40 top100 right-20p bxsh_02100_105112113_05 brd bg_f" id="more">
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_rename();">Rename</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-rename-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_restore();">Restore data</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-restore-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_suspend();">Suspend</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-suspend-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_delete();">Delete</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-delete-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
											</div>
										</div>
									</div>
								</div>
									<div class="idcard_header wi_100 xs-wi_70 xs-order_2 bs_bb marb10 xs-padl5 sm-padl5">
										<h2 class="dnone xs-dblock padb15 uppercase bold fsz18 trn">Cloud ID Business</h2>
										<div>
											<img src="<?php echo $path;?>html/usercontent/images/flag.png" width="40" class="marr5 valm">
											<span class="valm bold xs-nobold fsz24 xs-fsz15 trn">User</span>
											<span class="dblock xs-dnone bold fsz14 trn">Passport</span>
										</div>
										<div class="dnone xs-dblock mart10">
											<img src="<?php echo $path;?>html/usercontent/images/score.png" width="40" class="marr5 valm">
											<span class="valm bold xs-nobold fsz24 xs-fsz15">100/70</span>
										</div>
									</div>
									<!--<div class="clear hidden-xs"></div>-->
									<div class="wi_30 xs-order_1">
									
										<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
										
									<div class="imgwrap nobrd">
										<div class="cropped_image <?php if($row_summary ['passport_image']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" id="image-data-1" name="image-data-1"></div>
										
									</div>
								</div>
								
										
									</div>
									<div class="wi_70 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn">Social Security Number</span> <span class=" edit-text jain dblock brdb brdclr_lgtgrey2 fsz20"><?php if($resultOrg1['ssn']!="" || $resultOrg1['ssn']!= null) echo $resultOrg1['ssn']; else echo "-"; ?> </span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn">Family name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $resultOrg['last_name']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn">Given names</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $resultOrg['first_name']; ?></span> </div>
										<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn">Address</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16"><?php if($resultOrg1['address']!="" || $resultOrg1['address']!= null) echo $resultOrg1['address']; else echo "-"; ?> </span></div>
										<div class="container marrl-2 padl15">
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span class="trn">Date of birth</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16"><?php echo $resultOrg['dob_month'].'/'.$resultOrg['dob_day'].'/'.$resultOrg['dob_year']; ?></span> </div>
											<div class="fleft wi_10  xs-wi_50 sm-wi_50 bs_bb padrl2"> <span class="trn">Sex</span> <span class=" edit-select dblock brdb brdclr_lgtgrey2 uppercase curt fsz16" data-options="M,F,T"><?php if($resultOrg['sex']==1) echo "M"; else if($resultOrg['sex']==2) echo "F"; else echo "T"; ?></span> </div>
											
											<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span class="trn">Date of issue</span> <span class="  dblock brdb brdclr_lgtgrey2 uppercase curt fsz16"><?php echo date('m/d/Y', strtotime("+0 days", strtotime($resultOrg['created_on']))); ?></span> </div>
											<input type="hidden" id="user_id" value="<?php echo $data['user_id']; ?>" />
										</div>
										
									</div>
									
									<div class="qapscore_bord hidden-xs" style="position: absolute;z-index: 1;top: 130px;right: 40px;">
										<div class="score">100</div>
										<div class="score scorelevel">75</div>
									</div>
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span>5500040N</span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								<div class="clear"></div>
							</div>
						</div>
					
						
						
						<div class="marrl10  mart30 xs-marrl0 sm-marrl0 white_bg">
							
							<div class="marb10 brdb">
								<h2 class="fleft mar0 padb5 fsz15">About us</h2>
								<div class="fright pos_rel padb5 fsz13">
									<a href="#" class="class-toggler" data-target="#profile-dropdown1,#profile-fade1" data-classes="active">
										<span>Setup 60% complete</span>
										<span class="fa fa-angle-down"></span>
									</a>
									<div id="profile-dropdown1" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
										<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
											<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
												<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
											</div>
											<span class="fxshrink_0 marl15">Step 4/5</span>
										</div>
										<div class="padtb30 padrl15 talc">
											<div class="marb10">
												<span class="fa fa-envelope-open-o fsz40"></span>
											</div>
											<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
											<div class="mart10">
												Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
											</div>
											<div class="mart20">
												<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
											</div>
											<div class="mart20">
												Then verify that it's set up by <a href="#">sending a test email</a>.
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						
						<div class="marrl10 white_bg mart10 brd brdrad3" style="">
							<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
								<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
									
									<!--<div class="clear hidden-xs"></div>-->
									
									<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
										<div class="container marrl-2 padl15">
											<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0 "> <span class="trn" data-trn-key="Clearing number">Clearing number</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16 clear_number"><?php if($resultOrg1['clearing_number']!="" || $resultOrg1['clearing_number']!= null) echo $resultOrg1['clearing_number']; else echo "-"; ?> </span></div>
											
											<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0  "> <span class="trn" data-trn-key="Bank account number">Bank account number</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16 bank_acc"><?php if($resultOrg1['bank_account_number']!="" || $resultOrg1['bank_account_number']!= null) echo $resultOrg1['bank_account_number']; else echo "-"; ?></span> </div>
											<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0  "> <span class="trn" data-trn-key="Language">Language</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16 langu"><?php if($resultOrg1['language']!="" || $resultOrg1['language']!= null) echo $resultOrg1['language']; else echo "-"; ?></span> </div>
											
											<input type="hidden" id="user_id" value="<?php echo $data['user_id']; ?>" />
											
										</div>
										
									</div>
									
									
									
									
									<div class="right_number hidden-xs bold talc fsz14"> <span>5500040N</span> </div>
									<!-- <div class="clear hidden-xs"></div>-->
								</div>
								
								<div class="clear"></div>
							</div>
						</div>
						
						<div class="mar10 brdrad1 fsz15 xs-fsz16 sm-fsz16">
							<div class="marrl0 xs-marrl0 sm-marrl0 white_bg">
								<h1 class="mar0 padb10 bold fsz18 blue3_txt">About us</h1>
								<div class="marb20 brdb">
									<h2 class="fleft mar0 padb5 fsz15">Viktigt information
									</h2>
									<div class="fright pos_rel padb5 fsz13">
										<a href="#" class="class-toggler" data-target="#profile-dropdown,#profile-fade" data-classes="active">
											<span>60% complete</span>
											<span class="fa fa-angle-down"></span>
										</a>
										<div id="profile-dropdown" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
											<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
												<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
													<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
												</div>
												<span class="fxshrink_0 marl15">Step 4/5</span>
											</div>
											<div class="padtb30 padrl15 talc">
												<div class="marb10">
													<span class="fa fa-envelope-open-o fsz40"></span>
												</div>
												<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
												<div class="mart10">
													Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
												</div>
												<div class="mart20">
													<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
												</div>
												<div class="mart20">
													Then verify that it's set up by <a href="#">sending a test email</a>.
												</div>
											</div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="white_bg column_m profile_sorting_list " id="curriculum_vitae" >
								
								<div class="column_m">
									<a href="#" class="add_pro_sum tooltip" title="edit"></a>
									<div class="padtrl15 brd brdrad3 marb10">
										<?php
											if($rowsummary['summary'] != '' or $rowsummary['summary'] != null)
											{
											?>
											<h2 class="cyanblue_txt bold fsz16">Professional Summary</h2>
											<p class="fsz14 dark_grey_txt pad0 ">
												<div class="cv_px"> <?php echo html_entity_decode($rowsummary['summary']); ?></div>
											</p>
											<form method="POST" id="summery" action="updateUserSummary">
												<div class="lgtgrey_bg pad15 pro_sum_form hide">
													<textarea class="texteditor" name="summery_text" id="summery_text"><?php echo html_entity_decode($rowsummary['summary']); ?></textarea>
													<div class="clear"></div>
													<div class="column_m padt10"> <a href="javascript:void(0);" onclick="javascript:valsummary();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_pro_sum min_height lgtgrey_btn">Cancel</a> </div>
													<div class="clear"></div>
												<input type="hidden" name="user_summery"> </div>
											</form>
											<?php } else
											{ ?>
											<h2 class="cyanblue_txt bold fsz16">Professional Summary &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn ">Add </a></h2>
											<form method="POST" id="summery" action="updateUserSummary" >	
												<div class="lgtgrey_bg pad15 pro_sum_form hide">
													<textarea class="texteditor" name="summery_text" id="summery_text" ></textarea>
													<div class="clear"></div>
													<div class="column_m padt10"> <a href="javascript:void(0);" onclick="javascript:valsummary();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_pro_sum min_height lgtgrey_btn">Cancel</a> </div>
													<div class="clear"></div>
													<input type="hidden" name="user_summery" >
												</div>
											</form>		
										<?php } ?>
									</div>
								</div>
								
								<div class="column_m">
									<div class="brd brdrad3 marb10">
										<?php
											if($row_exp_count['num'] !=0)
											{
											?>
											<div class="padtrl15">
											<h2 class="cyanblue_txt bold fsz16 padb10">Experience Summary &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn "><span>Add </span></a></h2> </div>
											
											<form action="updateUserExperience" method="POST" name="experiance" id="experiance" accept-charset="ISO-8859-1">	
												<div class="exp_sum_form lgtgrey_bg hide pad15">
													<div class="input_fields_list ">
														<ul>
															<li>
																<div class="field_labl  xs-dnone">Compnay name</div>
																<div class="field_box xs-wi_100i">
																	<input class="input_white_field wi_100" onkeyup="company_select(this.value);" type="text" name="com_name" id="com_name" list="company_names"/>
																	<datalist id="company_names">
																		
																	</datalist>
																	
																</div>
															</li>
															<input type="hidden" name="comp_experiance_loop" value="" >
															<li>
																<div class="field_labl  xs-dnone">Title</div>
																<div class="field_box xs-wi_100i">
																	<input class="input_white_field wi_100" type="text" name="com_title" id="com_title" />
																</div>
															</li>
															<li>
																<div class="field_labl  xs-dnone">Location</div>
																<div class="field_box xs-wi_100i">
																	<input class="input_white_field wi_100" type="text" name="com_loc" id="com_loc" />
																</div>
															</li>
															<li>
																<div class="field_labl xs-dnone">Time Period</div>
																<div class="field_box xs-wi_100i">
																	<div class="dflex xxs-fxwrap_w alit_c">
																		
																		<div class="wi_25 xxs-wi_50 xxs-marb10">
																			<select name="com_start_month" id="com_start_month" class="input_white_field">
																				<option value="0">Select</option>
																				<option value="1">January</option>
																				<option value="2">February</option>
																				<option value="3">March</option>
																				<option value="4">April</option>
																				<option value="5">May</option>
																				<option value="6">June</option>
																				<option value="7">July</option>
																				<option value="8">August</option>
																				<option value="9">September</option>
																				<option value="10">October</option>
																				<option value="11">November</option>
																				<option value="12">December</option>
																			</select>
																		</div>
																		<div class="wi_25 xxs-wi_50 xxs-marb10">
																			<select name="com_start_year" id="com_start_year" class="input_white_field wi_100">
																				<option value="0">Select</option>
																				<option value="2016">2016</option>
																				<option value="2015">2015</option>
																				<option value="2014">2014</option>
																				<option value="2013">2013</option>
																				<option value="2012">2012</option>
																				<option value="2011">2011</option>
																				<option value="2010">2010</option>
																				<option value="2009">2009</option>
																				<option value="2008">2008</option>
																				<option value="2007">2007</option>
																				<option value="2006">2006</option>
																				<option value="2005">2005</option>
																				<option value="2004">2004</option>
																				<option value="2003">2003</option>
																				<option value="2002">2002</option>
																				<option value="2001">2001</option>
																				<option value="2000">2000</option>
																				<option value="1999">1999</option>
																				<option value="1998">1998</option>
																				<option value="1997">1997</option>
																				<option value="1996">1996</option>
																				<option value="1995">1995</option>
																				<option value="1994">1994</option>
																				<option value="1993">1993</option>
																				<option value="1992">1992</option>
																				<option value="1991">1991</option>
																				<option value="1990">1990</option>
																				<option value="1989">1989</option>
																				<option value="1988">1988</option>
																				<option value="1987">1987</option>
																				<option value="1986">1986</option>
																				<option value="1985">1985</option>
																				<option value="1984">1984</option>
																				<option value="1983">1983</option>
																				<option value="1982">1982</option>
																				<option value="1981">1981</option>
																				<option value="1980">1980</option>
																				<option value="1979">1979</option>
																				<option value="1978">1978</option>
																				<option value="1977">1977</option>
																				<option value="1976">1976</option>
																				<option value="1975">1975</option>
																				<option value="1974">1974</option>
																				<option value="1973">1973</option>
																				<option value="1972">1972</option>
																				<option value="1971">1971</option>
																				<option value="1970">1970</option>
																				<option value="1969">1969</option>
																				<option value="1968">1968</option>
																				<option value="1967">1967</option>
																				<option value="1966">1966</option>
																				<option value="1965">1965</option>
																				<option value="1964">1964</option>
																				<option value="1963">1963</option>
																				<option value="1962">1962</option>
																				<option value="1961">1961</option>
																				<option value="1960">1960</option>
																				<option value="1959">1959</option>
																				<option value="1958">1958</option>
																				<option value="1957">1957</option>
																				<option value="1956">1956</option>
																				<option value="1955">1955</option>
																				<option value="1954">1954</option>
																				<option value="1953">1953</option>
																				<option value="1952">1952</option>
																				<option value="1951">1951</option>
																				<option value="1950">1950</option>
																				<option value="1949">1949</option>
																				<option value="1948">1948</option>
																				<option value="1947">1947</option>
																				<option value="1946">1946</option>
																				<option value="1945">1945</option>
																				<option value="1944">1944</option>
																				<option value="1943">1943</option>
																				<option value="1942">1942</option>
																				<option value="1941">1941</option>
																				<option value="1940">1940</option>
																			</select>
																		</div>
																		<div class="xxs-dnone fxshrink_0 padrl10">-</div>
																		<div class="wi_25 xxs-wi_50">
																			<select name="com_end_month" id="com_end_month" class="input_white_field">
																				<option value="0">Select</option>
																				<option value="1">January</option>
																				<option value="2">February</option>
																				<option value="3">March</option>
																				<option value="4">April</option>
																				<option value="5">May</option>
																				<option value="6">June</option>
																				<option value="7">July</option>
																				<option value="8">August</option>
																				<option value="9">September</option>
																				<option value="10">October</option>
																				<option value="11">November</option>
																				<option value="12">December</option>
																			</select>
																		</div>
																		<div class="wi_25 xxs-wi_50">
																			<select class="input_white_field wi_100" name="com_end_year" id="com_end_year">
																				<option value="0">Select</option>
																				<option value="2016">2016</option>
																				<option value="2015">2015</option>
																				<option value="2014">2014</option>
																				<option value="2013">2013</option>
																				<option value="2012">2012</option>
																				<option value="2011">2011</option>
																				<option value="2010">2010</option>
																				<option value="2009">2009</option>
																				<option value="2008">2008</option>
																				<option value="2007">2007</option>
																				<option value="2006">2006</option>
																				<option value="2005">2005</option>
																				<option value="2004">2004</option>
																				<option value="2003">2003</option>
																				<option value="2002">2002</option>
																				<option value="2001">2001</option>
																				<option value="2000">2000</option>
																				<option value="1999">1999</option>
																				<option value="1998">1998</option>
																				<option value="1997">1997</option>
																				<option value="1996">1996</option>
																				<option value="1995">1995</option>
																				<option value="1994">1994</option>
																				<option value="1993">1993</option>
																				<option value="1992">1992</option>
																				<option value="1991">1991</option>
																				<option value="1990">1990</option>
																				<option value="1989">1989</option>
																				<option value="1988">1988</option>
																				<option value="1987">1987</option>
																				<option value="1986">1986</option>
																				<option value="1985">1985</option>
																				<option value="1984">1984</option>
																				<option value="1983">1983</option>
																				<option value="1982">1982</option>
																				<option value="1981">1981</option>
																				<option value="1980">1980</option>
																				<option value="1979">1979</option>
																				<option value="1978">1978</option>
																				<option value="1977">1977</option>
																				<option value="1976">1976</option>
																				<option value="1975">1975</option>
																				<option value="1974">1974</option>
																				<option value="1973">1973</option>
																				<option value="1972">1972</option>
																				<option value="1971">1971</option>
																				<option value="1970">1970</option>
																				<option value="1969">1969</option>
																				<option value="1968">1968</option>
																				<option value="1967">1967</option>
																				<option value="1966">1966</option>
																				<option value="1965">1965</option>
																				<option value="1964">1964</option>
																				<option value="1963">1963</option>
																				<option value="1962">1962</option>
																				<option value="1961">1961</option>
																				<option value="1960">1960</option>
																				<option value="1959">1959</option>
																				<option value="1958">1958</option>
																				<option value="1957">1957</option>
																				<option value="1956">1956</option>
																				<option value="1955">1955</option>
																				<option value="1954">1954</option>
																				<option value="1953">1953</option>
																				<option value="1952">1952</option>
																				<option value="1951">1951</option>
																				<option value="1950">1950</option>
																				<option value="1949">1949</option>
																				<option value="1948">1948</option>
																				<option value="1947">1947</option>
																				<option value="1946">1946</option>
																				<option value="1945">1945</option>
																				<option value="1944">1944</option>
																				<option value="1943">1943</option>
																				<option value="1942">1942</option>
																				<option value="1941">1941</option>
																				<option value="1940">1940</option>
																			</select>
																		</div>
																		
																	</div>
																</div>
																</li> <li>
																<div class="field_labl  xs-dnone">Description</div>
																<div class="field_box xs-wi_100i">
																	<textarea class="texteditor" name="com_desc" id="com_desc" ></textarea>
																</div>
															</li>
															
															<li>
																<div class="field_labl  xs-dnone">Refrence Email</div>
																<div class="field_box xs-wi_100i">
																	<input class="input_white_field wi_100" type="text" name="r_email" id="r_email" />
																</div>
															</li>
															<li>
																<div class="field_labl  xs-dnone">&nbsp;</div>
																<div class="field_box xs-wi_100i">
																	<input type="checkbox" name="com_current" id="com_current" />
																&nbsp; I currently work here</div>
															</li>
														</ul>
													</div>
													<div class="clear"></div>
													<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkexperiance()" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_exp_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink" value="0">Remove This Position</a></div>
													<div class="clear"></div>
												</div>
												<input type="hidden" name="comp_experiance" id="comp_experiance" >
											</form>
											
											<div class="clear"></div>
											<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd font_opnsns xs-fsz16 sm-fsz16"><span class="trend_start xs-dnone"></span>
												<div class="mart15">
													<?php
														
														
														foreach($result_exp as $category => $row_exp)
														{
															
															$start_month=month_s($row_exp['duration_start_month']);
															$endmonth = month_s($row_exp['duration_end_month']);
															$endyear = $row_exp['duration_end'];
															if($row_exp['duration_end']==2100)
															{
																$end_val=0;
															}
															else
															{
																$end_val=$row_exp['duration_end_month'];
															}
														?>
														
														<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit"  class=" tooltip " href="javascript:void(0);"></a> <span class="year_trend xs-pos_stai xs-marb5"><span><?php if($endyear==2100) echo "Current"; else echo $endyear; ?></span></span>
															<h2 class="padb5"><strong><?php echo $row_exp['title']; ?></strong><strong> @ </strong><?php echo $row_exp['company_name']; ?></h2>
															<p><?php echo $start_month." ".$row_exp['duration_start']." - "; if($row_exp['duration_end'] == '2100')
															{ echo "Still working"." | "; } else echo $endmonth." ".$endyear." | "; echo $row_exp['location']; ?></p>
															<?php echo $row_exp['description']; ?>
															<input type="hidden" name="exp<?php echo $row_exp['cv_com_id']; ?>" id="exp<?php echo $row_exp['cv_com_id']; ?>" value="<?php echo $row_exp['description']; ?>" >
														</div>
														
														
													<?php  } ?>	  
												</div>                                    
												<div class="clear"></div>
											</div>
											<?php }
											else
											{ ?>
											
											<div class="padtrl15">
											<h2 class="cyanblue_txt bold fsz16 padb10">Experience Summary &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn "><span>Add </span></a></h2> </div>
											
											<form action="updateUserExperience" method="POST" name="experiance" id="experiance" accept-charset="ISO-8859-1">	
												<div class="exp_sum_form lgtgrey_bg hide pad15">
													<div class="input_fields_list ">
														<ul>
															<li>
																<div class="field_labl xs-dnone">Compnay name</div>
																<div class="field_box  xs-wi_100i">
																	<input class="input_white_field wi_100" type="text" name="com_name" id="com_name" onkeyup="company_select(this.value);" list="company_names" />
																	<datalist id="company_names">
																		
																	</datalist>
																</div>
															</li>
															<input type="hidden" name="comp_experiance_loop" value="" >
															<input type="hidden" name="my_hash" value="<?php echo time();  ?>" >
															<li>
																<div class="field_labl xs-dnone">Title</div>
																<div class="field_box xs-wi_100i">
																	<input class="input_white_field wi_100" type="text" name="com_title" id="com_title" />
																</div>
															</li>
															<li>
																<div class="field_labl xs-dnone">Location</div>
																<div class="field_box xs-wi_100i">
																	<input class="input_white_field wi_100" type="text" name="com_loc" id="com_loc" />
																</div>
															</li>
															<li>
																<div class="field_labl xs-dnone">Time Period</div>
																<div class="field_box xs-wi_100i">
																	<div class="dflex xxs-fxwrap_w alit_c">
																		
																		<div class="wi_25 xxs-wi_50 xxs-marb10">
																			<select name="com_start_month" id="com_start_month" class="input_white_field">
																				<option value="0">Select</option>
																				<option value="1">January</option>
																				<option value="2">February</option>
																				<option value="3">March</option>
																				<option value="4">April</option>
																				<option value="5">May</option>
																				<option value="6">June</option>
																				<option value="7">July</option>
																				<option value="8">August</option>
																				<option value="9">September</option>
																				<option value="10">October</option>
																				<option value="11">November</option>
																				<option value="12">December</option>
																			</select>
																		</div>
																		<div class="wi_25 xxs-wi_50 xxs-marb10">
																			<select name="com_start_year" id="com_start_year" class="input_white_field wi_100">
																				<option value="0">Select</option>
																				<option value="2016">2016</option>
																				<option value="2015">2015</option>
																				<option value="2014">2014</option>
																				<option value="2013">2013</option>
																				<option value="2012">2012</option>
																				<option value="2011">2011</option>
																				<option value="2010">2010</option>
																				<option value="2009">2009</option>
																				<option value="2008">2008</option>
																				<option value="2007">2007</option>
																				<option value="2006">2006</option>
																				<option value="2005">2005</option>
																				<option value="2004">2004</option>
																				<option value="2003">2003</option>
																				<option value="2002">2002</option>
																				<option value="2001">2001</option>
																				<option value="2000">2000</option>
																				<option value="1999">1999</option>
																				<option value="1998">1998</option>
																				<option value="1997">1997</option>
																				<option value="1996">1996</option>
																				<option value="1995">1995</option>
																				<option value="1994">1994</option>
																				<option value="1993">1993</option>
																				<option value="1992">1992</option>
																				<option value="1991">1991</option>
																				<option value="1990">1990</option>
																				<option value="1989">1989</option>
																				<option value="1988">1988</option>
																				<option value="1987">1987</option>
																				<option value="1986">1986</option>
																				<option value="1985">1985</option>
																				<option value="1984">1984</option>
																				<option value="1983">1983</option>
																				<option value="1982">1982</option>
																				<option value="1981">1981</option>
																				<option value="1980">1980</option>
																				<option value="1979">1979</option>
																				<option value="1978">1978</option>
																				<option value="1977">1977</option>
																				<option value="1976">1976</option>
																				<option value="1975">1975</option>
																				<option value="1974">1974</option>
																				<option value="1973">1973</option>
																				<option value="1972">1972</option>
																				<option value="1971">1971</option>
																				<option value="1970">1970</option>
																				<option value="1969">1969</option>
																				<option value="1968">1968</option>
																				<option value="1967">1967</option>
																				<option value="1966">1966</option>
																				<option value="1965">1965</option>
																				<option value="1964">1964</option>
																				<option value="1963">1963</option>
																				<option value="1962">1962</option>
																				<option value="1961">1961</option>
																				<option value="1960">1960</option>
																				<option value="1959">1959</option>
																				<option value="1958">1958</option>
																				<option value="1957">1957</option>
																				<option value="1956">1956</option>
																				<option value="1955">1955</option>
																				<option value="1954">1954</option>
																				<option value="1953">1953</option>
																				<option value="1952">1952</option>
																				<option value="1951">1951</option>
																				<option value="1950">1950</option>
																				<option value="1949">1949</option>
																				<option value="1948">1948</option>
																				<option value="1947">1947</option>
																				<option value="1946">1946</option>
																				<option value="1945">1945</option>
																				<option value="1944">1944</option>
																				<option value="1943">1943</option>
																				<option value="1942">1942</option>
																				<option value="1941">1941</option>
																				<option value="1940">1940</option>
																			</select>
																		</div>
																		<div class="xxs-dnone fxshrink_0 padrl10">-</div>
																		<div class="wi_25 xxs-wi_50">
																			<select name="com_end_month" id="com_end_month" class="input_white_field">
																				<option value="0">Select</option>
																				<option value="1">January</option>
																				<option value="2">February</option>
																				<option value="3">March</option>
																				<option value="4">April</option>
																				<option value="5">May</option>
																				<option value="6">June</option>
																				<option value="7">July</option>
																				<option value="8">August</option>
																				<option value="9">September</option>
																				<option value="10">October</option>
																				<option value="11">November</option>
																				<option value="12">December</option>
																			</select>
																		</div>
																		<div class="wi_25 xxs-wi_50">
																			<select class="input_white_field wi_100" name="com_end_year" id="com_end_year">
																				<option value="0">Select</option>
																				<option value="2016">2016</option>
																				<option value="2015">2015</option>
																				<option value="2014">2014</option>
																				<option value="2013">2013</option>
																				<option value="2012">2012</option>
																				<option value="2011">2011</option>
																				<option value="2010">2010</option>
																				<option value="2009">2009</option>
																				<option value="2008">2008</option>
																				<option value="2007">2007</option>
																				<option value="2006">2006</option>
																				<option value="2005">2005</option>
																				<option value="2004">2004</option>
																				<option value="2003">2003</option>
																				<option value="2002">2002</option>
																				<option value="2001">2001</option>
																				<option value="2000">2000</option>
																				<option value="1999">1999</option>
																				<option value="1998">1998</option>
																				<option value="1997">1997</option>
																				<option value="1996">1996</option>
																				<option value="1995">1995</option>
																				<option value="1994">1994</option>
																				<option value="1993">1993</option>
																				<option value="1992">1992</option>
																				<option value="1991">1991</option>
																				<option value="1990">1990</option>
																				<option value="1989">1989</option>
																				<option value="1988">1988</option>
																				<option value="1987">1987</option>
																				<option value="1986">1986</option>
																				<option value="1985">1985</option>
																				<option value="1984">1984</option>
																				<option value="1983">1983</option>
																				<option value="1982">1982</option>
																				<option value="1981">1981</option>
																				<option value="1980">1980</option>
																				<option value="1979">1979</option>
																				<option value="1978">1978</option>
																				<option value="1977">1977</option>
																				<option value="1976">1976</option>
																				<option value="1975">1975</option>
																				<option value="1974">1974</option>
																				<option value="1973">1973</option>
																				<option value="1972">1972</option>
																				<option value="1971">1971</option>
																				<option value="1970">1970</option>
																				<option value="1969">1969</option>
																				<option value="1968">1968</option>
																				<option value="1967">1967</option>
																				<option value="1966">1966</option>
																				<option value="1965">1965</option>
																				<option value="1964">1964</option>
																				<option value="1963">1963</option>
																				<option value="1962">1962</option>
																				<option value="1961">1961</option>
																				<option value="1960">1960</option>
																				<option value="1959">1959</option>
																				<option value="1958">1958</option>
																				<option value="1957">1957</option>
																				<option value="1956">1956</option>
																				<option value="1955">1955</option>
																				<option value="1954">1954</option>
																				<option value="1953">1953</option>
																				<option value="1952">1952</option>
																				<option value="1951">1951</option>
																				<option value="1950">1950</option>
																				<option value="1949">1949</option>
																				<option value="1948">1948</option>
																				<option value="1947">1947</option>
																				<option value="1946">1946</option>
																				<option value="1945">1945</option>
																				<option value="1944">1944</option>
																				<option value="1943">1943</option>
																				<option value="1942">1942</option>
																				<option value="1941">1941</option>
																				<option value="1940">1940</option>
																			</select>
																		</div>
																		
																	</div>
																</div>
															</li>
															<li>
																<div class="field_labl xs-dnone">Description</div>
																<div class="field_box xs-wi_100i">
																	<textarea class="texteditor" name="com_desc" id="com_desc" ></textarea>
																</div>
															</li>
															
															<li>
																<div class="field_labl xs-dnone">Refrence Email</div>
																<div class="field_box xs-wi_100i">
																	<input class="input_white_field wi_100" type="text" name="r_email" id="r_email" />
																</div>
															</li>
															<li>
																<div class="field_labl xs-dnone">&nbsp;</div>
																<div class="field_box xs-wi_100i">
																	<input type="checkbox" name="com_current" id="com_current" />
																&nbsp; I currently work here</div>
															</li>
														</ul>
													</div>
													<div class="clear"></div>
													<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkexperiance()" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_exp_sum min_height lgtgrey_btn">Cancel</a>&nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink" value="0">Remove This Position</a> </div>
													<div class="clear"></div>
												</div>
												<input type="hidden" name="comp_experiance" >
											</form>
											
											<div class="clear"></div>
										<?php } ?>
										<div class="padtrl15"></div>
									</div>
								</div>
								
								
								<div class="clear"></div>
								<div class="column_m">
									<div class="brd brdrad3 marb10">
										<?php
											if($row_edu_count['num'] !=0)
											{
											?>
											<div class="padtrl15">
											<h2 class="cyanblue_txt bold fsz16 padb10">Educational Summary &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn "><span>Add </span></a></h2> </div>
											<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd font_opnsns xs-fsz16 sm-fsz16"> <span class="trend_start"></span>
												<div class="mart15">
													<?php foreach($result_edu as $category => $row_edu)
														{
															$js =   $row_edu['id'].";;;;;".$row_edu['c_id'].";;;;;".$row_edu['s_id'].";;;;;".$row_edu['cl_id'].";;;;;".$row_edu['duration'].";;;;;".$row_edu['duration_start'].";;;;;".$row_edu['duration_end']; 
															$js = str_replace(array("\r", "\n"), '', $js);
															?>		<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit" class="  tooltip"  href="#"></a> <span class="year_trend xs-pos_stai xs-marb5"><span><?php echo $row_edu['duration_end']; ?></span></span>
															<h2 class="padb5"><strong><?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['degree']); ?></strong>@ <?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['school']); ?></h2> 
															<p><?php echo $row_edu['duration_start']." - ".$row_edu['duration_end']; ?> </p>
															
															
														</div>
													<?php } ?>
													<div class="clear"></div>
												</div>
												<div class="clear"></div>
											</div>
											<div class="padtrl15">
												<form action="updateEducation" method="POST" name="cveducation" id="cveducation" >	
													<div class="edu_sum_form hide lgtgrey_bg pad15">
														<div class="input_fields_list ">
															<ul>
																<li>
																	<div class="field_labl xs-wi_100i">Country</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50 xxs-wi_100" name="country_id" id="country_id" onchange="school(this.value);">
																			<option value="0">---Select----</option>
																			<?php 
																				foreach($result_country as $category => $row_country)
																				{
																					
																				?>			
																				<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																			<?php } ?>
																		</select>
																		
																	</div>
																</li>
																<li>
																	<div class="field_labl xs-wi_100i">School</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50 xxs-wi_100" name="cv_school" id="cv_school" onchange="degree(this.value);">
																			<option>---Select---</option>
																			<?php 
																				foreach($result_school1 as $category => $row_school1)
																				{
																					
																				?>			
																				<option value="<?php echo $row_school1['id']; ?>"><?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_school1['name']); ?></option>
																			<?php } ?>						
																		</select>
																		
																	</div>
																</li>
																<li>
																	<div class="field_labl xs-wi_100i">Class</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50 xxs-wi_100" name="cv_degree" id="cv_degree">
																			<?php foreach($result_school111 as $category => $row_school11)
																				{
																					
																				?>			
																				<option value="<?php echo $row_school11['id']; ?>"><?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_school11['name']); ?></option>
																			<?php } ?>				
																		</select>
																		
																	</div>
																</li>
																
																<li>
																	<div class="field_labl xs-wi_100i">Duration</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50 xxs-wi_100" name="duration" id="duration">
																			
																			<option value="0">---Select---</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>							
																		</select>
																		
																	</div>
																</li>
																
																<li>
																	<div class="field_labl xs-wi_100i">Dates attended</div>
																	<div class="field_box xs-wi_100i">
																		<div class="dflex xs-fxwrap_w alit_c">
																			<div class="padr10">
																				Start year
																			</div>
																			<div class="">
																				<select class="input_white_field wi_100" name="cv_school_start" id="cv_school_start">
																					<option value="0">Select</option>
																					<option value="2014">2014</option>
																					<option value="2013">2013</option>
																					<option value="2012">2012</option>
																					<option value="2011">2011</option>
																					<option value="2010">2010</option>
																					<option value="2009">2009</option>
																					<option value="2008">2008</option>
																					<option value="2007">2007</option>
																					<option value="2006">2006</option>
																					<option value="2005">2005</option>
																					<option value="2004">2004</option>
																					<option value="2003">2003</option>
																					<option value="2002">2002</option>
																					<option value="2001">2001</option>
																					<option value="2000">2000</option>
																					<option value="1999">1999</option>
																					<option value="1998">1998</option>
																					<option value="1997">1997</option>
																					<option value="1996">1996</option>
																					<option value="1995">1995</option>
																					<option value="1994">1994</option>
																					<option value="1993">1993</option>
																					<option value="1992">1992</option>
																					<option value="1991">1991</option>
																					<option value="1990">1990</option>
																					<option value="1989">1989</option>
																					<option value="1988">1988</option>
																					<option value="1987">1987</option>
																					<option value="1986">1986</option>
																					<option value="1985">1985</option>
																					<option value="1984">1984</option>
																					<option value="1983">1983</option>
																					<option value="1982">1982</option>
																					<option value="1981">1981</option>
																					<option value="1980">1980</option>
																					<option value="1979">1979</option>
																					<option value="1978">1978</option>
																					<option value="1977">1977</option>
																					<option value="1976">1976</option>
																					<option value="1975">1975</option>
																					<option value="1974">1974</option>
																					<option value="1973">1973</option>
																					<option value="1972">1972</option>
																					<option value="1971">1971</option>
																					<option value="1970">1970</option>
																					<option value="1969">1969</option>
																					<option value="1968">1968</option>
																					<option value="1967">1967</option>
																					<option value="1966">1966</option>
																					<option value="1965">1965</option>
																					<option value="1964">1964</option>
																					<option value="1963">1963</option>
																					<option value="1962">1962</option>
																					<option value="1961">1961</option>
																					<option value="1960">1960</option>
																					<option value="1959">1959</option>
																					<option value="1958">1958</option>
																					<option value="1957">1957</option>
																					<option value="1956">1956</option>
																					<option value="1955">1955</option>
																					<option value="1954">1954</option>
																					<option value="1953">1953</option>
																					<option value="1952">1952</option>
																					<option value="1951">1951</option>
																					<option value="1950">1950</option>
																					<option value="1949">1949</option>
																					<option value="1948">1948</option>
																					<option value="1947">1947</option>
																					<option value="1946">1946</option>
																					<option value="1945">1945</option>
																					<option value="1944">1944</option>
																					<option value="1943">1943</option>
																					<option value="1942">1942</option>
																					<option value="1941">1941</option>
																					<option value="1940">1940</option>
																				</select>
																			</div>
																			<div class="xs-wi_100 fxshrink_0 padrl10">
																				<span class="xs-dnone">-</span>
																			</div>
																			<div class="padr10">
																				End year
																			</div>
																			<div class="">
																				<select class="input_white_field wi_100" name="cv_school_end" id="cv_school_end">
																					<option value="0">Select</option>
																					<option value="2014">2014</option>
																					<option value="2013">2013</option>
																					<option value="2012">2012</option>
																					<option value="2011">2011</option>
																					<option value="2010">2010</option>
																					<option value="2009">2009</option>
																					<option value="2008">2008</option>
																					<option value="2007">2007</option>
																					<option value="2006">2006</option>
																					<option value="2005">2005</option>
																					<option value="2004">2004</option>
																					<option value="2003">2003</option>
																					<option value="2002">2002</option>
																					<option value="2001">2001</option>
																					<option value="2000">2000</option>
																					<option value="1999">1999</option>
																					<option value="1998">1998</option>
																					<option value="1997">1997</option>
																					<option value="1996">1996</option>
																					<option value="1995">1995</option>
																					<option value="1994">1994</option>
																					<option value="1993">1993</option>
																					<option value="1992">1992</option>
																					<option value="1991">1991</option>
																					<option value="1990">1990</option>
																					<option value="1989">1989</option>
																					<option value="1988">1988</option>
																					<option value="1987">1987</option>
																					<option value="1986">1986</option>
																					<option value="1985">1985</option>
																					<option value="1984">1984</option>
																					<option value="1983">1983</option>
																					<option value="1982">1982</option>
																					<option value="1981">1981</option>
																					<option value="1980">1980</option>
																					<option value="1979">1979</option>
																					<option value="1978">1978</option>
																					<option value="1977">1977</option>
																					<option value="1976">1976</option>
																					<option value="1975">1975</option>
																					<option value="1974">1974</option>
																					<option value="1973">1973</option>
																					<option value="1972">1972</option>
																					<option value="1971">1971</option>
																					<option value="1970">1970</option>
																					<option value="1969">1969</option>
																					<option value="1968">1968</option>
																					<option value="1967">1967</option>
																					<option value="1966">1966</option>
																					<option value="1965">1965</option>
																					<option value="1964">1964</option>
																					<option value="1963">1963</option>
																					<option value="1962">1962</option>
																					<option value="1961">1961</option>
																					<option value="1960">1960</option>
																					<option value="1959">1959</option>
																					<option value="1958">1958</option>
																					<option value="1957">1957</option>
																					<option value="1956">1956</option>
																					<option value="1955">1955</option>
																					<option value="1954">1954</option>
																					<option value="1953">1953</option>
																					<option value="1952">1952</option>
																					<option value="1951">1951</option>
																					<option value="1950">1950</option>
																					<option value="1949">1949</option>
																					<option value="1948">1948</option>
																					<option value="1947">1947</option>
																					<option value="1946">1946</option>
																					<option value="1945">1945</option>
																					<option value="1944">1944</option>
																					<option value="1943">1943</option>
																					<option value="1942">1942</option>
																					<option value="1941">1941</option>
																					<option value="1940">1940</option>
																				</select>
																			</div>
																			<div class="padl10">
																				Or expected graduation year
																			</div>
																		</div>
																	</div>
																</li>
																
																
															</ul>
														</div>
														<div class="clear"></div>
														<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkedu();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_edu_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink1" value="0">Remove This Education</a> </div>
														<div class="clear"></div>
														<input type="hidden" name="cv_edu" id="cv_edu">
													</div>
												</form>
											</div>
											<?php }
											else
											{ ?>
											
											<div class="padtrl15">
												<h2 class="cyanblue_txt bold fsz16 padb10">Educational Summary &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn "><span>Add </span></a></h2>
												
												<form action="updateEducation" method="POST" name="cveducation" id="cveducation" >	
													<div class="edu_sum_form hide lgtgrey_bg pad15">
														<div class="input_fields_list ">
															<ul>
																<li>
																	<div class="field_labl xs-wi_100i">Country</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50 xxs-wi_100" name="country_id" id="country_id" onchange="school(this.value);">
																			<option value="0">---Select----</option>
																			<?php foreach($result_country as $category => $row_country)
																				{
																					
																				?>			
																				<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																			<?php } ?>
																		</select>
																		
																	</div>
																</li>
																<li>
																	<div class="field_labl xs-wi_100i">School</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50 xs-wi_100" name="cv_school" id="cv_school" onchange="degree(this.value);">
																			<option value="0">Select</option>				
																		</select>
																		
																	</div>
																</li>
																<li>
																	<div class="field_labl xs-wi_100i">Class</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50 xs-wi_100" name="cv_degree" id="cv_degree">
																			<option value="0">Select</option>			
																		</select>
																		
																	</div>
																</li>
																<li>
																	<div class="field_labl xs-wi_100i">Duration</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50 xs-wi_100" name="duration" id="duration">
																			
																			<option value="0">---Select---</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>							
																		</select>
																		
																	</div>
																</li>
																
																<li>
																	<div class="field_labl xs-wi_100i">Dates attended</div>
																	<div class="field_box xs-wi_100i">
																		<div class="dflex xs-fxwrap_w alit_c">
																			<div class="padr10">
																				Start year
																			</div>
																			<div class="">
																				<select class="input_white_field wi_100" name="cv_school_start" id="cv_school_start">
																					<option value="0">Select</option>
																					<option value="2014">2014</option>
																					<option value="2013">2013</option>
																					<option value="2012">2012</option>
																					<option value="2011">2011</option>
																					<option value="2010">2010</option>
																					<option value="2009">2009</option>
																					<option value="2008">2008</option>
																					<option value="2007">2007</option>
																					<option value="2006">2006</option>
																					<option value="2005">2005</option>
																					<option value="2004">2004</option>
																					<option value="2003">2003</option>
																					<option value="2002">2002</option>
																					<option value="2001">2001</option>
																					<option value="2000">2000</option>
																					<option value="1999">1999</option>
																					<option value="1998">1998</option>
																					<option value="1997">1997</option>
																					<option value="1996">1996</option>
																					<option value="1995">1995</option>
																					<option value="1994">1994</option>
																					<option value="1993">1993</option>
																					<option value="1992">1992</option>
																					<option value="1991">1991</option>
																					<option value="1990">1990</option>
																					<option value="1989">1989</option>
																					<option value="1988">1988</option>
																					<option value="1987">1987</option>
																					<option value="1986">1986</option>
																					<option value="1985">1985</option>
																					<option value="1984">1984</option>
																					<option value="1983">1983</option>
																					<option value="1982">1982</option>
																					<option value="1981">1981</option>
																					<option value="1980">1980</option>
																					<option value="1979">1979</option>
																					<option value="1978">1978</option>
																					<option value="1977">1977</option>
																					<option value="1976">1976</option>
																					<option value="1975">1975</option>
																					<option value="1974">1974</option>
																					<option value="1973">1973</option>
																					<option value="1972">1972</option>
																					<option value="1971">1971</option>
																					<option value="1970">1970</option>
																					<option value="1969">1969</option>
																					<option value="1968">1968</option>
																					<option value="1967">1967</option>
																					<option value="1966">1966</option>
																					<option value="1965">1965</option>
																					<option value="1964">1964</option>
																					<option value="1963">1963</option>
																					<option value="1962">1962</option>
																					<option value="1961">1961</option>
																					<option value="1960">1960</option>
																					<option value="1959">1959</option>
																					<option value="1958">1958</option>
																					<option value="1957">1957</option>
																					<option value="1956">1956</option>
																					<option value="1955">1955</option>
																					<option value="1954">1954</option>
																					<option value="1953">1953</option>
																					<option value="1952">1952</option>
																					<option value="1951">1951</option>
																					<option value="1950">1950</option>
																					<option value="1949">1949</option>
																					<option value="1948">1948</option>
																					<option value="1947">1947</option>
																					<option value="1946">1946</option>
																					<option value="1945">1945</option>
																					<option value="1944">1944</option>
																					<option value="1943">1943</option>
																					<option value="1942">1942</option>
																					<option value="1941">1941</option>
																					<option value="1940">1940</option>
																				</select>
																			</div>
																			<div class="xs-wi_100 fxshrink_0 padrl10">
																				<span class="xs-dnone">-</span>
																			</div>
																			<div class="padr10">
																				End year
																			</div>
																			<div class="">
																				<select class="input_white_field wi_100" name="cv_school_end" id="cv_school_end">
																					<option value="0">Select</option>
																					<option value="2014">2014</option>
																					<option value="2013">2013</option>
																					<option value="2012">2012</option>
																					<option value="2011">2011</option>
																					<option value="2010">2010</option>
																					<option value="2009">2009</option>
																					<option value="2008">2008</option>
																					<option value="2007">2007</option>
																					<option value="2006">2006</option>
																					<option value="2005">2005</option>
																					<option value="2004">2004</option>
																					<option value="2003">2003</option>
																					<option value="2002">2002</option>
																					<option value="2001">2001</option>
																					<option value="2000">2000</option>
																					<option value="1999">1999</option>
																					<option value="1998">1998</option>
																					<option value="1997">1997</option>
																					<option value="1996">1996</option>
																					<option value="1995">1995</option>
																					<option value="1994">1994</option>
																					<option value="1993">1993</option>
																					<option value="1992">1992</option>
																					<option value="1991">1991</option>
																					<option value="1990">1990</option>
																					<option value="1989">1989</option>
																					<option value="1988">1988</option>
																					<option value="1987">1987</option>
																					<option value="1986">1986</option>
																					<option value="1985">1985</option>
																					<option value="1984">1984</option>
																					<option value="1983">1983</option>
																					<option value="1982">1982</option>
																					<option value="1981">1981</option>
																					<option value="1980">1980</option>
																					<option value="1979">1979</option>
																					<option value="1978">1978</option>
																					<option value="1977">1977</option>
																					<option value="1976">1976</option>
																					<option value="1975">1975</option>
																					<option value="1974">1974</option>
																					<option value="1973">1973</option>
																					<option value="1972">1972</option>
																					<option value="1971">1971</option>
																					<option value="1970">1970</option>
																					<option value="1969">1969</option>
																					<option value="1968">1968</option>
																					<option value="1967">1967</option>
																					<option value="1966">1966</option>
																					<option value="1965">1965</option>
																					<option value="1964">1964</option>
																					<option value="1963">1963</option>
																					<option value="1962">1962</option>
																					<option value="1961">1961</option>
																					<option value="1960">1960</option>
																					<option value="1959">1959</option>
																					<option value="1958">1958</option>
																					<option value="1957">1957</option>
																					<option value="1956">1956</option>
																					<option value="1955">1955</option>
																					<option value="1954">1954</option>
																					<option value="1953">1953</option>
																					<option value="1952">1952</option>
																					<option value="1951">1951</option>
																					<option value="1950">1950</option>
																					<option value="1949">1949</option>
																					<option value="1948">1948</option>
																					<option value="1947">1947</option>
																					<option value="1946">1946</option>
																					<option value="1945">1945</option>
																					<option value="1944">1944</option>
																					<option value="1943">1943</option>
																					<option value="1942">1942</option>
																					<option value="1941">1941</option>
																					<option value="1940">1940</option>
																				</select>
																			</div>
																			<div class="padl10">
																				Or expected graduation year
																			</div>
																		</div>
																	</div>
																</li>
																
																
															</ul>
														</div>
														<div class="clear"></div>
														<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checkedu();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_edu_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_exp_sum min_height lgtgrey_btn" id="mylink1" value="0">Remove This Education</a>  </div>
														<div class="clear"></div>
														<input type="hidden" name="cv_edu" value="0" >
													</div>
												</form>
											</div>
										<?php } ?>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
								<div class="column_m">
									<div class="brd brdrad3 marb10">
										<?php
											
											if($row_lang_count['num']!=0)
											{
											?>
											<div class="padtrl15">
												<h2 class="cyanblue_txt bold fsz16 padb10">Language &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn "><span>Add </span></a></h2>
											</div>
											<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd font_opnsns xs-fsz16 sm-fsz16"> <span class="trend_start xs-dnone"></span>
												<div class="mart15">
													<?php
														
														
														foreach($result_lang as $category => $row_lang)
														{
														?>
														
														<?php
															$js =   $row_lang['id'].";;;;;".$row_lang['c_id'].";;;;;".$row_lang['level_id']; 
															$js = str_replace(array("\r", "\n"), '', $js);
															//echo $js; die;
															//echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['degree']); 
															
															
														?>
														<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit" class="  tooltip"  href="#"></a> <span class="year_trend"></span>
															<h2 class="padb5"><strong><?php echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_lang['country_name']); ?></strong></h2> 
															<p><?php echo "Level-".$row_lang['level_id']; ?> </p>
															
															
														</div>
													<?php } ?>
													<div class="clear"></div>
												</div>
												<div class="clear"></div>
											</div>
											<div class="padtrl15">
												
												
												<form action="updateLanguage" method="POST" name="langu" id="langu" >	
													<div class="edu_lang_form hide lgtgrey_bg pad15">
														<div class="input_fields_list ">
															<ul>
																<li>
																	<div class="field_labl xs-wi_100i">Country</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50" name="lang_id" id="lang_id">
																			<option value="0">---Select----</option>
																			<?php 
																				foreach($result_country as $category => $row_country)
																				{
																					
																				?>			
																				<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																			<?php } ?>
																		</select>
																		
																	</div>
																</li>
																
																<li>
																	<div class="field_labl xs-wi_100i">Level</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50" name="level_id" id="level_id">
																			
																			<option value="0">---Select---</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>							
																		</select>
																		
																	</div>
																</li>
																
																
																
															</ul>
														</div>
														<div class="clear"></div>
														<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checklang();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_lang_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_lang_sum min_height lgtgrey_btn" id="mylang" value="0">Remove This Language</a> </div>
														<div class="clear"></div>
														<input type="hidden" name="cv_lang" id="cv_lang">
													</div>
												</form>
											</div>
											<?php } 
											else
											{ ?>
											
											<div class="padtrl15">
												<h2 class="cyanblue_txt bold fsz16 padb10">Language &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn "><span>Add </span></a></h2>
												
												<form action="updateLanguage" method="POST" name="langu" id="langu" >	
													<div class="edu_lang_form hide lgtgrey_bg pad15">
														<div class="input_fields_list ">
															<ul>
																<li>
																	<div class="field_labl xs-wi_100i">Country</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50" name="lang_id" id="lang_id">
																			<option value="0">---Select----</option>
																			<?php 
																				foreach($result_country as $category => $row_country)
																				{
																					
																				?>			
																				<option value="<?php echo $row_country['id']; ?>"><?php echo $row_country['country_name']; ?></option>
																			<?php } ?>
																		</select>
																		
																	</div>
																</li>
																
																<li>
																	<div class="field_labl xs-wi_100i">Level</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50" name="level_id" id="level_id">
																			
																			<option value="0">---Select---</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>							
																		</select>
																		
																	</div>
																</li>
																
																
																
															</ul>
														</div>
														<div class="clear"></div>
														<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checklang();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_lang_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_lang_sum min_height lgtgrey_btn" id="mylang" value="0">Remove This Language</a> </div>
														<div class="clear"></div>
														<input type="hidden" name="cv_lang" id="cv_lang" value="0">
													</div>
												</form>
											</div>
										<?php } ?>
										<div class="clear"></div>
									</div>
								</div>
								
								<div class="clear"></div>
								<div class="column_m">
									<div class="brd brdrad3 marb10">
										<?php
											if($row_lice['id'] != '' or $row_lice['id'] != null)
											{
											?>
											<div class="padtrl15">
												<h2 class="cyanblue_txt bold fsz16 padb10">Driving Licence &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn "><span>Add </span></a></h2>
											</div>
											<div class="career_timeline xs-mar0 xs-padl15 xs-nobrd font_opnsns xs-fsz16 sm-fsz16"> <span class="trend_start xs-dnone"></span>
												<div class="mart15">
													
													
													<?php
														$js =   $row_lice['id'].";;;;;".$row_lice['lice_id']; 
														$js = str_replace(array("\r", "\n"), '', $js);
														
														//echo iconv("UTF-8", "ISO-8859-1//IGNORE",$row_edu['degree']); 
														
														
													?>
													<div class="column_m career_year_exp marb15 padb15 xs-brdb"><a title="edit" class="edit_user_pro add_lice_sum tooltip" onclick="showlice('<?php echo $js; ?>');" href="javascript:void(0);"></a> <span class="year_trend xs-pos_stai xs-marb5"></span>
														<h2 class="padb5"><strong>Licence</strong></h2> 
														<p><?php if($row_lice['lice_id']==1) echo "Yes"; else if($row_lice['lice_id']==2) echo "No";  ?> </p>
														
														
													</div>
													
													<div class="clear"></div>
												</div>
												<div class="clear"></div>
											</div>
											<div class="padtrl15">
												
												
												<form action="updateLicence" method="POST" name="lice" id="lice" >	
													<div class="lice_sum_form hide lgtgrey_bg pad15">
														<div class="input_fields_list ">
															<ul>
																
																
																
																<li>
																	<div class="field_labl xs-wi_100i">Licence</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50" name="lice_id" id="lice_id">
																			
																			<option value="0">---Select---</option>
																			<option value="1">Yes</option>
																			<option value="2">No</option>
																			
																		</select>
																		
																	</div>
																</li>
																
																
																
															</ul>
														</div>
														<div class="clear"></div>
														<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checklice();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_lice_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_lice_sum min_height lgtgrey_btn" id="mylice" value="0">Remove</a> </div>
														<div class="clear"></div>
														<input type="hidden" name="cv_lice" id="cv_lice">
													</div>
												</form>
											</div>
											<?php }
											else
											{ ?>
											
											<div class="padtrl15">
												<h2 class="cyanblue_txt bold fsz16 padb10">Driving Licence &nbsp;&nbsp;&nbsp;<span class="grey_txt nobold">|</span>&nbsp; &nbsp;&nbsp;<a href="#" class="mini_cyanblue_btn "><span>Add </span></a></h2>
												
												<form action="updateLicence" method="POST" name="lice" id="lice" >	
													<div class="lice_sum_form hide lgtgrey_bg pad15">
														<div class="input_fields_list ">
															<ul>
																
																
																
																<li>
																	<div class="field_labl xs-wi_100i">Licence</div>
																	<div class="field_box xs-wi_100i">
																		<select class="wi_50" name="lice_id" id="lice_id">
																			
																			<option value="0">---Select---</option>
																			<option value="1">Yes</option>
																			<option value="2">No</option>
																			
																		</select>
																		
																	</div>
																</li>
																
																
																
															</ul>
														</div>
														<div class="clear"></div>
														<div class="column_m padt10"> <a href="javascript:void(0);" onclick="checklice();" class="green_btn min_height">Submit</a> &nbsp;&nbsp; <a href="javascript:void(0);" class="add_lice_sum min_height lgtgrey_btn">Cancel</a> &nbsp;&nbsp;<a class="add_lice_sum min_height lgtgrey_btn" id="mylice" value="0">Remove</a> </div>
														<div class="clear"></div>
														<input type="hidden" name="cv_lice" id="cv_lice">
													</div>
												</form>
											</div>
										<?php } ?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div><div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="marb20"> <img src="<?php echo $path;?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" /> </div>
						<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
						<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
						<div class="marb10 padtb20 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span> </div>
							<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
					</form>
				</div>
			</div>
			
			
			<!-- Sales popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Marketing popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		<p>
			
		</p>
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
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
		
		<script type="text/javascript">
			$("a.add_pro_sum").click(function()
			{
				$(".pro_sum_form").toggle();
			});
			$("a.add_exp_sum").click(function()
			{
				$(".exp_sum_form").toggle();
			});
			$("a.add_edu_sum").click(function()
			{
				$(".edu_sum_form").toggle();
			});
			$("a.add_lang_sum").click(function()
			{
				$(".edu_lang_form").toggle();
			});
			$("a.add_lice_sum").click(function()
			{
				$(".lice_sum_form").toggle();
			});
			
			function valsummary()
			{
				document.getElementById("summery").submit();
			}
			
			function checkexperiance()
			{
				var company = document.getElementById("com_name");
				var title = document.getElementById("com_title");
				var startmonth = document.getElementById("com_start_month");
				var startyear = document.getElementById("com_start_year");
				var endmonth = document.getElementById("com_end_month");
				var endyear = document.getElementById("com_end_year");
				var current_company = document.getElementById("com_current");
				if (company.value == "")
				{
					$(company).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (title.value == "")
				{
					$(title).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (startmonth.value == "0")
				{
					$(startmonth).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (startyear.value == "0")
				{
					$(startyear).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (current_company.checked == false)
				{
					if (endmonth.value == "0")
					{
						$(endmonth).css(
						{
							'background-color': '#FF9494'
						});
						return false;
					}
					if (endyear.value == "0")
					{
						$(endyear).css(
						{
							'background-color': '#FF9494'
						});
						return false;
					}
					if (endyear.value < startyear.value)
					{
						alert("End value should be greater than start value !!");
						$(endyear).css(
						{
							'background-color': '#FF9494'
						});
						return false;
					}
				}
				document.getElementById("experiance").submit();
			}
			
			function selectbox(startyear, syear)
			{
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
			
			function selectcountry(startyear, syear)
			{
				//alert(startyear.options[1].value );
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
			
			function selectschool(startyear, syear)
			{
				//alert(startyear.options[1].value );
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
			
			function selectclass(startyear, syear)
			{
				//alert(startyear.options[1].value );
				for (var i = 0; i < startyear.options.length; i++)
				{
					if (startyear.options[i].value == syear)
					{
						startyear.options[i].selected = true;
						break;
						return true;
					}
				}
			}
			
			function showedu(data)
			{
				data = data.split(";;;;;");
				var scrt_var = data[0];
				//alert(data[1]); return false;
				selectcountry(document.getElementById("country_id"), data[1]);
				selectschool(document.getElementById("cv_school"), data[2]);
				selectbox(document.getElementById("cv_degree"), data[3]);
				selectbox(document.getElementById("duration"), data[4]);
				selectbox(document.getElementById("cv_school_start"), data[5]);
				selectbox(document.getElementById("cv_school_end"), data[6]);
				document.getElementById("cv_edu").value = data[0];
				$("#mylink1").attr("href", "removeEdu/" + scrt_var);
			}
			
			function showlang(data)
			{
				data = data.split(";;;;;");
				var scrt_var = data[0];
				//alert(data[1]); return false;
				selectbox(document.getElementById("lang_id"), data[1]);
				selectbox(document.getElementById("level_id"), data[2]);
				document.getElementById("cv_lang").value = data[0];
				$("#mylang").attr("href", "removeLanguage/" + scrt_var);
			}
			
			function showlice(data)
			{
				data = data.split(";;;;;");
				var scrt_var = data[0];
				//alert(data[1]); return false;
				selectbox(document.getElementById("lice_id"), data[1]);
				document.getElementById("cv_lice").value = data[0];
				$("#mylice").attr("href", "removeLicence/" + scrt_var);
			}
			
			function editexp(data)
			{
				data = data.split(";;;;;");
				var scrt_var = data[0];
				//alert(document.getElementById("mylink").value);
				document.getElementById("com_name").value = data[1];
				document.getElementById("com_title").value = data[2];
				document.getElementById("com_loc").value = data[3];
				document.getElementById("comp_experiance").value = data[0];
				document.getElementById("r_email").value = data[8];
				selectbox(document.getElementById("com_start_month"), data[4]);
				selectbox(document.getElementById("com_start_year"), data[5]);
				selectbox(document.getElementById("com_end_month"), data[6]);
				selectbox(document.getElementById("com_end_year"), data[7]);
				if (data[9] == '1')
				{
					com_current = document.getElementById("com_current").parentNode;
					$(com_current).addClass("checked");
					document.getElementById("com_current").checked = true;
				}
				desc = document.getElementById("exp" + data[0]).value;
				editor = tinymce.get('com_desc');
				editor.setContent(desc);
				$("#mylink").attr("href", "removeExp/" + scrt_var);
			}
			
			function checkedu()
			{
				var country = document.getElementById("country_id");
				var school = document.getElementById("cv_school");
				var startyear = document.getElementById("cv_school_start");
				var endyear = document.getElementById("cv_school_end");
				var cv_degree = document.getElementById("cv_degree");
				var duration = document.getElementById("duration");
				if (country.value == "0")
				{
					$(country).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (school.value == "0")
				{
					$(school).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (duration.value == "0")
				{
					$(duration).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (startyear.value == "0")
				{
					$(startyear).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (endyear.value == "0")
				{
					$(endyear).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (endyear.value < startyear.value)
				{
					alert("End value should be greater than start value !!");
					$(endyear).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (cv_degree.value == "0")
				{
					$(cv_degree).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				document.getElementById("cveducation").submit();
			}
			
			function checklang()
			{
				var country = document.getElementById("lang_id");
				var duration = document.getElementById("level_id");
				if (country.value == "0")
				{
					$(country).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				if (duration.value == "0")
				{
					$(duration).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				document.getElementById("langu").submit();
			}
			
			function checklice()
			{
				var country = document.getElementById("lice_id");
				if (country.value == "0")
				{
					$(country).css(
					{
						'background-color': '#FF9494'
					});
					return false;
				}
				document.getElementById("lice").submit();
			}
		</script>
		
	</body>
	
</html>