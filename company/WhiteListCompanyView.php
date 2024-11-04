<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		<script>
			function submitform1()
			{
				$('#errorMsg').html("");
				
				var ty=$("#type_c");			
				if(ty.val() == 0)
				{
					
					$('#errorMsg').html("Please select any value !!!");
					return false;
					
				}
				if(ty.val() == 1)
				{
					var full_num=$("#addcomp");			
					if(full_num.val() == 0)
					{
						$('#errorMsg').html("Please select company name !!!");
						return false;
					}
				}
				else if(ty.val() == 2)
				{
					var full_num=$("#addMsg");			
					if(full_num.val() == null || full_num.val() == '')
					{
						$('#errorMsg').html("Please Enter offer !!!");
						return false;
					}
				}
				document.getElementById("save_indexing").submit();
			}
			
			
			
			
			function checkDisplay(id)
			{
				$('#errorMsg').html("");
				if(id==0)
				{
					document.getElementById("cmp").style.display="none";
					document.getElementById("msg").style.display="none";
					
				}
				if(id==1)
				{
					document.getElementById("cmp").style.display="block";
					document.getElementById("msg").style.display="none";
					
				}
				if(id==2)
				{
					document.getElementById("cmp").style.display="none";
					document.getElementById("msg").style.display="block";
					
				}
				
			}
			
			function checkFlag()
			{
				if($(".popupShow").hasClass('active'))
				{
					$(".popupShow").removeClass('active');
					$(".popupShow").attr('style','display:none');
				}
				
			}
			function togglePopup()
			{
				if($(".popupShow").hasClass('active'))
				{
					$(".popupShow").removeClass('active');
					$(".popupShow").attr('style','display:none');
				}
				else
				{
					$(".popupShow").addClass('active');
					$(".popupShow").attr('style','display:block');
				}
			}
		</script>
		
		
	</head>
	
	<body class="white_bg">
		
		
		<?php $path1 = $path."html/usercontent/images/"; ?>
		<!-- HEADER -->
		<?php include 'CompanyHeaderUpdated.php'; ?>
		<div class="clear"></div>
		
		
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- SUB-HEADER -->
			
			
			
			
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel mart40 zi5 marrla pad10  xs-pad0  ">
						<div class="talc fsz75 green_txt"> <span class="fas fa-sign-in-alt"></span></div>
						<div class="padb10 brdb_new">
							
							<h1 class="padb5 talc fsz35 xs-fsz40 bold ">En möjlighet....</h1>
							<p class="pad0 xs-padb10 talc fsz20 xs-fsz20 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Ta var på denna möjlighet och stärk ditt varumärke eller visa ett erbjudande.</p>
						</div>
						
						<div class="container padrl0 xs-padrl0">
							
							<div class="marrla xs-wi_100">
								
								<form action="../addCompanyName/<?php echo $data['cid']; ?>" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
									<div class="marb0 padtb10 ">
										
										
										
										
										
										
										<div class="on_clmn padb10">
										<label class="fleft fsz18">Type</label>
											<div class="on_clmn padrl0 padb0 xs-padrl0">
												<select name="type_c" id="type_c"  class="lgtgrey2_bg default_view nobrd wi_100 mart5 padl10 hei_50p fsz18 llgrey_txt" onchange="checkDisplay(this.value);">
													<option value="0">Välj</option>
													<option value="1">Visa ditt företagsnamn</option>
													<option value="2"> Visa ett erbjudande</option>
												</select>
												
											</div>
											
											<div class="clear"></div>
										</div>
										
										
										
										<div id="cmp" style="display:none;">
											<div class="on_clmn padb10">
											<label class="fleft fsz18">Select company name</label>
												<div class="on_clmn padrl0 padb0 xs-padrl0">
													<select name="addcomp" id="addcomp"  class="lgtgrey2_bg default_view nobrd wi_100 mart5 padl10 hei_50p fsz18 llgrey_txt" placeholder="Skriv företags namnet" >
														<option value="0">select</option>
														<option value="Securitas">Securitas</option>
														<option value="Manpower">Manpower</option>
														<option value="Poolia">Poolia</option>
														<option value="Falck">Falck</option>
														<option value="CWS Boco Inital">CWS Boco Inital</option>
														<option value="Montico HR">Montico HR</option>
														<option value="Volvo">Volvo</option>
														<option value="Vasakronan">Vasakronan</option>
														<option value="Sodexho">Sodexho</option>
														<option value="SEB">SEB</option>
													</select>
												</div>
												
												<div class="clear"></div>
											</div>
										</div>
										
										<div id="msg" style="display:none">
											<div class="on_clmn padb10">
											<label class="fleft fsz18">Add message</label>
												<div class="on_clmn padrl0 padb0 xs-padrl0">
													<input type="text" name="addMsg" id="addMsg"  class="lgtgrey2_bg default_view nobrd wi_100 mart5 padl10 hei_50p fsz18 llgrey_txt"  >
													
													
												</div>
												
												<div class="clear"></div>
											</div>
										</div>
										
										
										
										
										
										
										<div class="clear"></div>
										<div class="red_txt" id="errorMsg"></div>
									</div>
									<div class=" padrl0 talc xs-padrl0">
										<input type="button" value="Submit" class="wi_480p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submitform1();">
										<input type="hidden" name="indexing_save" id="indexing_save" />
									</div>
									
									
									
								</form>
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			
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
		
		
		
	</body>
	
</html>