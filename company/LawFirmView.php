
<!doctype html>
<html class="home">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Qmatchup</title>
	<!--<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
	 
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="../html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
	<script>
	function addType4(id)
	{
		var getValue=$('#service_name').val();
		if($('#s'+id).hasClass('green_bg'))
		{
			$('#s'+id).removeClass('green_bg');
			$('#s'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#service_name").val(getValue);
		}
		else
		{
			$('#s'+id).addClass('green_bg');
			$('#s'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#service_name").val(getValue);
		}
		
	} 		
	 function addType(id)
	{
		var getValue=$('#main_practice_areas').val();
		if($('#'+id).hasClass('green_bg'))
		{
			$('#'+id).removeClass('green_bg');
			$('#'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#main_practice_areas").val(getValue);
		}
		else
		{
			$('#'+id).addClass('green_bg');
			$('#'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#main_practice_areas").val(getValue);
		}
		
	}
	
	 function addType1(id)
	{
		var getValue=$('#practice_area').val();
		if($('#p'+id).hasClass('green_bg'))
		{
			$('#p'+id).removeClass('green_bg');
			$('#p'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#practice_area").val(getValue);
		}
		else
		{
			$('#p'+id).addClass('green_bg');
			$('#p'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#practice_area").val(getValue);
		}
		
	}
	
	function addType2(id)
	{
		var getValue=$('#type_of_lawer').val();
		if($('#l'+id).hasClass('green_bg'))
		{
			$('#l'+id).removeClass('green_bg');
			$('#l'+id).addClass('red_ff2828_bg');		
			getValue = getValue.replace(id+",", "");
			$("#type_of_lawer").val(getValue);
		}
		else
		{
			$('#l'+id).addClass('green_bg');
			$('#l'+id).removeClass('red_ff2828_bg');		
			getValue=getValue+id+',';
			$("#type_of_lawer").val(getValue);
		}
		
	} 
								 
								 
	
	function selectWarning(id)
	{
		if(id==1)
		{
			$('#warningsDetail').removeClass('hidden');
		}
		else
		{
			$('#warningsDetail').addClass('hidden');
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
			
			$("#errorMsg1").html('');
			if($("#bar_association").val()==0)
			{
				
				$("#errorMsg1").html('Please select bar association');
				return false;
			}
			
			 
			
			if($("#office_count").val()=='' || $("#office_count").val()==null)
			{
				
				$("#errorMsg1").html('Please enter office count');
				return false;
			}
			if(isNaN($("#office_count").val()))
			{
				
				$("#errorMsg1").html('Please enter numeric value for offices ');
				return false;
			}
			
			if($("#lawer_count").val()=='' || $("#lawer_count").val()==null)
			{
				
				$("#errorMsg1").html('Please enter lawer count');
				return false;
			}
			if(isNaN($("#lawer_count").val()))
			{
				
				$("#errorMsg1").html('Please enter numeric value for lawers ');
				return false;
			}
			if($("#main_practice_areas").val()=='')
			{
				
				$("#errorMsg1").html('Please select atleast one main practice area');
				return false;
			}
			if($("#practice_area").val()=='')
			{
				
				$("#errorMsg1").html('Please select atleast one practice area');
				return false;
			}
			
			
			 
			if($("#type_of_lawer").val()=='')
			{
				
				$("#errorMsg1").html('Please select atleast one type of available lawers');
				return false;
			}	
			
			if($("#service_name").val()=='')
			{
				
				$("#errorMsg1").html('Please select atleast one service area');
				return false;
			}
			document.getElementById('save_indexing').submit();
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
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
					 
							
							<form action="../sendRequest/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 <div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz100 xxs-fsz30 xxs-lgn_hight_45 padb10 xs-padb0 black_txt trn" style="
												font-family: Avenir;
											">Law</h1>
									</div>
									<div class="mart20 xs-mart0 xs-marb20 marb35  xxs-tall talc xs-padb15  "> <a href="#" class="black_txt fsz25 xxs-tall xxs-lgn_hight_20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn">Please provide your practice details here.</a></div>
								<div class="marb0 padtrl0">		 
							 
											 <div class="on_clmn mart10 ">
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="bar_association" id="bar_association">
											       <option value="0" class="lgtgrey2_bg">Select</option>
											<?php 
												
												foreach($barAssociations as $category => $value) 
												{
													
													
												?> 													
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"><?php echo $value['bar_associations']; ?></option>
												<?php } ?>												
														 
											</select>
											 	
											  <label for="country" class="floating__label tall nobold padl10" data-content="Which bar association">
											<span class="hidden--visually">
											  Which bar association</span></label>
											</div>
											 
											</div>
										 
											
											
												 
											 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="number" name="office_count" id="office_count" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25"/> 
												<label for="office_count" class="floating__label tall nobold" data-content="How many offices" >
											<span class="hidden--visually">
											 How many offices</span></label>
											</div>
										 
											 
										</div>
										 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="number" name="lawer_count" id="lawer_count" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25"/> 
												<label for="lawer_count" class="floating__label tall nobold" data-content="How many lawyers" >
											<span class="hidden--visually">
											 How many lawyers</span></label>
											</div>
										 
											 
										</div>
										
										 
										 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Main practice areas" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " id="warningsDetail">
										<?php  foreach($mainPracticeAreas as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="<?php echo substr($value['main_practice_areas'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>">
														</div>
														<?php } ?>

			
																			</div>	
											
								 
									 
								 	 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Practice areas" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " id="warningsDetail">
										<?php  foreach($practiceArea as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="<?php echo substr($value['practice_area'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addType1(<?php echo $value['id']; ?>);" id="p<?php echo $value['id']; ?>">
														</div>
														<?php } ?>

			
																			</div>	
									<input type="hidden" name="service_name" id="service_name" value="" />				
								 <input type="hidden" name="practice_area" id="practice_area" value="" />
								 <input type="hidden" name="main_practice_areas" id="main_practice_areas" value="" />
								 <input type="hidden" name="type_of_lawer" id="type_of_lawer" value="" />
								
								 	 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Type of lawers" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " id="warningsDetail">
										<?php  foreach($typeOfLawer as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="<?php echo substr($value['type_of_lawer'],0,13); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addType2(<?php echo $value['id']; ?>);" id="l<?php echo $value['id']; ?>">
														</div>
														<?php } ?>

			
																			</div>	
											
								 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Select services" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " id="warningsDetail">
										<?php  foreach($serviceArea as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
														<div class=" wi_50 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="<?php echo substr($value['service_name'],0,22); ?>" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addType4(<?php echo $value['id']; ?>);" id="s<?php echo $value['id']; ?>">
														</div>
														<?php } ?>

			
																			</div>	
							 		
						
						   <div class="clear"></div>
	 
	 				 


	 

										 
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Add</button></a> </div>
							
						</div>
						</div>
						
					</div> 
		 
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
<script>
				var tinyMCE_options = {
					selector: '.texteditor',
					plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
					toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
					//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
					//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
					menubar: false,
					max_chars : "25000",
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
				}
				tinyMCE.init(tinyMCE_options);
				
			</script>
	
	</body>
</html>
