<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
	<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
	<!--<script src="<?php echo $path;?>html/usercontent/js/jquery-ui.js"></script>-->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script>
	function getVals(){
  // Get slider values
  var parent = this.parentNode;
  var slides = parent.getElementsByTagName("input");
    var slide1 = parseFloat( slides[0].value );
    var slide2 = parseFloat( slides[1].value );
  // Neither slider will clip the other, so make sure we determine which is larger
  if( slide1 > slide2 ){ var tmp = slide2; slide2 = slide1; slide1 = tmp; }
  $('#min_age').val(slide1);
  $('#max_age').val(slide2);
  var displayElement = parent.getElementsByClassName("rangeValues")[0];
      displayElement.innerHTML = slide1 + " - " + slide2;
}

window.onload = function(){
  // Initialize Sliders
  var sliderSections = document.getElementsByClassName("range-slider");
      for( var x = 0; x < sliderSections.length; x++ ){
        var sliders = sliderSections[x].getElementsByTagName("input");
        for( var y = 0; y < sliders.length; y++ ){
          if( sliders[y].type ==="range" ){
            sliders[y].oninput = getVals;
            // Manually trigger event first time to display values
            sliders[y].oninput();
          }
        }
      }
}
	</script>
	<script>
	var passion=<?php echo $data['count']; ?>;
  
   
   function updateHeight(id,link)
   {
	   height=id;
	  
   }
   function updateWeight(id,link)
   {
	   weight=id;
	  
   }
   
   
    
	function addType(id)
	{
		var getValue=$('#user_passion').val();
		if($('#'+id).hasClass('green_98ce44'))
		{
			passion--;
			$('#'+id).removeClass('green_98ce44');
			$('#'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#user_passion").val(getValue);
		}
		else
		{
			passion++;
			$('#'+id).addClass('green_98ce44');
			$('#'+id).removeClass('lgtgrey_bg');		
			getValue=getValue+id+',';
			$("#user_passion").val(getValue);
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
			 
			if(passion<3)
			{
				
				$("#errorMsg1").html('Please select atleast three passion');
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
				
			 
  
</script>
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../FriendFinder" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../FriendFinder" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Finder</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Provide your preferences here</a></div>
					 
					 
							
							<form action="updatePreferenceInfo" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
	
	
	
	
											<div class="on_clmn    brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is height important to you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($friendFinderUserStart['height_important']==1) echo 'checked'; ?>" onclick="updateHeight(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>	
											<div class="hidden" id="height_prefer">
											<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Height preference" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									<div class="on_clmn">
								 
								 
											 
										<div class="pos_rel  ">
									
										<select name="height" id="height"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
														 
														<option value="3" class="lgtgrey2_bg" <?php if($friendFinderUserStart['height_preferred']==3) echo 'selected'; ?>>161cm to 170 cm</option>
														<option value="4" class="lgtgrey2_bg" <?php if($friendFinderUserStart['height_preferred']==4) echo 'selected'; ?>>171cm to 180 cm</option>
														<option value="5" class="lgtgrey2_bg" <?php if($friendFinderUserStart['height_preferred']==5) echo 'selected'; ?>>181cm to 190 cm</option>
														<option value="6" class="lgtgrey2_bg" <?php if($friendFinderUserStart['height_preferred']==6) echo 'selected'; ?>>191cm to 2 mtrs</option>
													 
											</select>
										 
									</div>
									 </div> 
									 
										</div>	
											
											<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is weight important to you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($friendFinderUserStart['weight_important']==1) echo 'checked'; ?>" onclick="updateWeight(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>	
											
											
											<div class="hidden" id="weight_preffer">
											 <div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Your weight preference" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
										<div class="on_clmn">
								 
								 
											 
										<div class="pos_rel  ">
									
										<select name="weight" id="weight"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
														<option value="1" class="lgtgrey2_bg" <?php if($friendFinderUserStart['weight_preferred']==1) echo 'selected'; ?>>Thin</option>
														<option value="2" class="lgtgrey2_bg" <?php if($friendFinderUserStart['weight_preferred']==2) echo 'selected'; ?>>Normal</option>
														<option value="3" class="lgtgrey2_bg" <?php if($friendFinderUserStart['weight_preferred']==3) echo 'selected'; ?>>Athletic</option>
														<option value="4" class="lgtgrey2_bg" <?php if($friendFinderUserStart['weight_preferred']==4) echo 'selected'; ?>>Over-weight</option>
														 
													 
											</select>
										 
									</div>
									 </div>	 
										
											</div>
											
											
											
											 
									<div class="on_clmn   mart20 brdb">
								 <div class="pos_rel  ">
									
										<input type="text" value="Distance" class="wi_100 rbrdr pad10 padb0 padl0  tall xs-talc  minhei_45p fsz20  black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
							 
							<div class="   ">
								<input type="text" name="contacts" id="professional-contacts" class="price-addon price-value price-variable-value default wi_100 hei_auto marb15 pad0 nobrd bg_trans bold fsz20 xs-fsz16 txt_2d3e50" value="<?php echo $friendFinderUserStart['max_distance']; ?>" data-min="1" data-base="1" data-each="50" disabled="disabled" data-regularity="monthly" data-label="{init-value} Contacts" data-note="(billed annually)">
								<div class="slider-range hei_8p brd brdrad2 bg_cbd6e2 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-range="min" data-min="0" data-fixed-min="1" data-max="500" data-step="50" data-capture="#professional-contacts" data-capture-trigger="change" data-range-classes="bg_ff7a59" data-handle-classes="wi_24pi hei_24pi top-9pi bxsh_0111_cbd6e2 nobrdi brdrad50 bg_f_i curpi"  onchange="getValue(this);"><div class="ui-slider-range ui-corner-all ui-widget-header ui-slider-range-min bg_ff7a59" style="width: 10%;" ></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default wi_24pi hei_24pi top-9pi bxsh_0111_cbd6e2 nobrdi brdrad50 bg_f_i curpi" style="left: 10%;"></span>
								 
								
								</div>
								<div class="dflex alit_c justc_sb mart15 bold fsz13 txt_7c98b6">
									<span>0</span>
									<span>500</span>
								</div>
							</div>
						 
						<input type="hidden" id="oil_numbers" name="oil_numbers" value="<?php echo $friendFinderUserStart['max_distance']; ?>">
						
						
							<div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="User passion" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									 <div class="wi_100 maxwi_500p ovfl_hid padt10 brdb">
										 
										<div class="category-apps email-collab marrbl-2 uppercase fsz12">
										 
										 <?php $i=0; foreach($userPassion as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<a href="javascript:void(0);" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h  <?php if($value['is_selected']==0)echo 'lgtgrey_bg'; else echo 'green_98ce44'; ?>  brdr black_txt connect" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>"> <span class="dblock pi1<?php echo $i; ?> ffamily_avenir"></span><?php echo substr($value['passion_info'],0,13); ?></a>
														<?php $i++; } ?>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
									 	
										
						
						
						<div class="on_clmn   marb20 brdb">
								 <div class="pos_rel  ">
									
										<input type="text" value="Preferred age range" class="wi_100 rbrdr pad10 padb0 padl0  tall xs-talc  minhei_45p fsz20  black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
						<div class="on_clmn   ">
						<section class="range-slider">
  <span class="rangeValues"></span>
  <input value="<?php echo $friendFinderUserStart['min_age']; ?>" min="18" max="80" step="4" type="range">
  <input value="<?php echo $friendFinderUserStart['max_age']; ?>" min="18" max="80" step="4" type="range">
</section>
</div>
						<input type="hidden" id="min_age" name="min_age" value="<?php echo $friendFinderUserStart['min_age']; ?>" />
						
						<input type="hidden" id="max_age" name="max_age" value="<?php echo $friendFinderUserStart['max_age']; ?>" />
											
											 <div class="on_clmn mart20">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Whom you are looking for?" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											 
											<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<select name="gender" id="gender"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"  > 
														<option value="1" class="lgtgrey2_bg" <?php if($friendFinderUserStart['sex_orientation']==1) echo 'selected'; ?>>Male</option>
														<option value="2" class="lgtgrey2_bg" <?php if($friendFinderUserStart['sex_orientation']==2) echo 'selected'; ?>>Female</option>
													 <option value="2" class="lgtgrey2_bg" <?php if($friendFinderUserStart['sex_orientation']==3) echo 'selected'; ?>>Both</option>
											</select>
												
											</div>
										 
											 
										</div>
										
									 
									 
								 									
								 			 <input type="hidden" id="height_important" name="height_important" value="<?php echo $friendFinderUserStart['height_important']; ?>" />									
									 <input type="hidden" id="weight_important" name="weight_important" value="<?php echo $friendFinderUserStart['weight_important']; ?>" />										
																			
								 	 <input type="hidden" id="user_passion" name="user_passion" value="<?php echo $friendFinderUserStart['user_passion_preferred']; ?>" />
							 
								<div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
						</div>
						</div>
						
								 
			 
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	 
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/trendwatch/js/hubstaff-calculations.js"></script>
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
	 						