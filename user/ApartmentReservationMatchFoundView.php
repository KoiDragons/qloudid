<!doctype html>
<html>
	<?php $path1 = $path."html/usercontent/images/"; ?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>safeqloud</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			function checkFlag()
			{
				if($(".popupShow").hasClass('active'))
				{
					$(".popupShow").removeClass('active')
					$(".popupShow").attr('style','display:none');
				}
				
			}
			function submitForm()
			{
				 document.getElementById('save_indexing').submit();	
			}
		</script>
	</head>
	
	<body class="lgtgrey2_bg ffamily_avenir">
		
		<!-- HEADER -->
		<div class="column_m header xs-hei_55p bs_bb lgtgrey2_bg"  >
				<div class="wi_100 hei_65p xs-hei_55p xs-pos_fix padtb5 padrl10 lgtgrey2_bg"  >
							 
			<div class="clear"></div>
		</div>
		</div>
		<div class="clear"></div>
	<!-- /menu -->
	
	<div class="column_m   talc lgn_hight_22 fsz16 xs-marb0 xs-mart20  mart40  padb30">
				  
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_550p xsi-wi_360p maxwi_100   pos_rel zi5 marrla   xs-pad0  brdrad5 " >
								<div class="pad25 talc brdradtr10 maxwi_100">
				<img src="../../../../html/usercontent/images/bg/matchFound.png" style="width:100%"/>
			</div>
									<h3 class="marb0  xxs-talc fsz35 xs-fsz25 bold padb5 black_txt talc ffamily_avenir"  >A match </h3>
									<div class="mart20    xxs-talc talc "> <a href="#" class="blacka1_txt fsz20 xs-fsz20 xxs-talc edit-text jain_drop_company black_txt talc ffamily_avenir" ><span class="trn"><?php echo $result['first_name'].' '.$result['last_name']; ?></span>
									 
												</a></div>
												
												<div class="  marb35  xxs-talc talc "> <a href="#" class="blacka1_txt fsz20 xs-fsz20 xxs-talc edit-text jain_drop_company black_txt talc ffamily_avenir" ><span class="trn"><?php echo $result['country_name']; ?></span>
									 
												</a></div>
									<div class="clear"></div> 
									
									<form action="../sendReservationDeail/<?php echo $data['aid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
									<input type="hidden" name="checkin_date" id="checkin_date" value="<?php echo $_POST['checkin_date']; ?>"/>
									<input type="hidden" name="checkout_date" id="checkout_date" value="<?php echo $_POST['checkout_date']; ?>"/>
									<input type="hidden" name="guest_adults" id="guest_adults" value="<?php echo $_POST['guest_adults']; ?>"/>
									<input type="hidden" name="guest_children" id="guest_children" value="<?php echo $_POST['guest_children']; ?>"/>
									<input type="hidden" name="is_paid" id="is_paid" value="<?php if($_POST['is_paid']==3) echo 0; else echo 1; ?>"/>
									<input type="hidden" name="room_price" id="room_price" value="<?php echo $_POST['room_price']; ?>"/>
									<input type="hidden" name="guest_user_id" id="guest_user_id" value="<?php echo $result['id']; ?>"/>
									</form>
						<div class="padtb20 mart35 xxs-talc talc">
								
								<a href="#" onclick='submitForm();'><button type="button"  class="padrl20 forword hei_55p fsz18 trn t_67cff7_bg  ffamily_avenir">Send booking</button></a>
								
							</div>
									
								 
								</div>
								
								</div>
							<!-- /middle-wizard -->
							
							<!-- /bottom-wizard -->
						
					 
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	</div>

		 
		
		 
		
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
				document.getElementById("cv_school").value=data[2];
				selectbox(document.getElementById("degree_type"), data[3]);
				selectbox(document.getElementById("duration"), data[4]);
				selectbox(document.getElementById("cv_school_start"), data[5]);
				selectbox(document.getElementById("cv_school_end"), data[6]);
				document.getElementById("cv_degree").value= data[7];
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
				/*if (duration.value == "0")
					{
					$(duration).css(
					{
					'background-color': '#FF9494'
					});
					return false;
				}*/
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