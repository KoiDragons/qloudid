
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
	//var indexVal=1;
	
	 		function addMore()  
			{
				indexVal=parseInt($('#total_row').val());
				var newPrice='<div class="on_clmn mart35 padt20 brdt"><div class="pos_rel"><select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="price_model'+indexVal+'" id="price_model'+indexVal+'"><option value="1" class="lgtgrey2_bg">Standard pricing</option></select> <label for="price_model'+indexVal+'" class="floating__label tall nobold padl10" data-content="Pricing model"><span class="hidden--visually">Pricing model</span></label></div></div> <div class="on_clmn mart20 "><div class="pos_rel"><input type="number" name="price'+indexVal+'" id="price'+indexVal+'" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" value="200" min=200 /> <label for="price'+indexVal+'" class="floating__label tall nobold" data-content="Price" ><span class="hidden--visually">Price</span></label></div></div><div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " ><div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 "><input type="button" value="One time" id="oneTime'+indexVal+'" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd green_bg fsz18 white_txt curp ffamily_avenir " onclick="addType('+indexVal+',1);" ></div><div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 "><input type="button" id="subs'+indexVal+'" value="Recurring" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addType('+indexVal+',2);" ></div></div><div class="on_clmn mart20 recurr hidden" id="recurr'+indexVal+'"> <div class="thr_clmn  wi_50 padr10"><div class="pos_rel"><select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_type'+indexVal+'" id="recurring_type'+indexVal+'" onchange="changeCustom('+indexVal+',this.value);"><option value="1" class="lgtgrey2_bg">Hourly</option><option value="2" class="lgtgrey2_bg">Daily </option><option value="3" class="lgtgrey2_bg">Weekly</option><option value="4" class="lgtgrey2_bg">Monthly</option><option value="5" class="lgtgrey2_bg">Every 3 Month</option><option value="6" class="lgtgrey2_bg">Every 6 Month</option><option value="7" class="lgtgrey2_bg">Yearly</option><option value="8" class="lgtgrey2_bg">Custom</option></select> <label for="recurring_type'+indexVal+'" class="floating__label tall nobold padl10" data-content="Subscription type"><span class="hidden--visually"> Subscription type</span></label>	</div></div><div class="hidden" id="customData'+indexVal+'"> <div class="thr_clmn  wi_15 padl10"><input type="text"  value="Every" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " readonly /> </div> <div class="thr_clmn  wi_10 padl10">	<input type="number" value="1" min=1  id="total_time'+indexVal+'" name="total_time'+indexVal+'" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " /> </div><div class="thr_clmn  wi_25 padl10"><div class="pos_rel"><select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_typec'+indexVal+'" id="recurring_typec'+indexVal+'">   <option value="1" class="lgtgrey2_bg">Hourly</option><option value="2" class="lgtgrey2_bg">Daily</option><option value="3" class="lgtgrey2_bg">Weekly</option><option value="4" class="lgtgrey2_bg">Monthly</option><option value="5" class="lgtgrey2_bg">Every 3 Month</option><option value="6" class="lgtgrey2_bg">Every 6 Month</option><option value="7" class="lgtgrey2_bg">Yearly</option></select></div></div></div> </div><input type="hidden" name="subscription_info'+indexVal+'" id="subscription_info'+indexVal+'" class="subscription_info" value="1" /><div class="clear"></div>';
				$("#moreData").append($(newPrice));
				indexVal=indexVal+1;
				 
				$('#total_row').val(indexVal);
			}
			function changeCustom(id,id1)
			{
				if(id1==8)
				{
				$('#customData'+id).removeClass('hidden');	
				}
				else
				{
					$('#customData'+id).addClass('hidden');
				}
			}
	 function addType(id,id1)
	{
		   $('#subscription_info'+id).val(id1);
		 if(id1==2)
		 {
			$('#oneTime'+id).removeClass('green_bg');
			$('#oneTime'+id).addClass('red_ff2828_bg');
			$('#subs'+id).addClass('green_bg');
			$('#subs'+id).removeClass('red_ff2828_bg');
			$('#recurr'+id).removeClass('hidden'); 
		 }
		 else
		 {
			 $('#oneTime'+id).addClass('green_bg');
			$('#oneTime'+id).removeClass('red_ff2828_bg');
			$('#subs'+id).removeClass('green_bg');
			$('#subs'+id).addClass('red_ff2828_bg');
			$('#recurr'+id).addClass('hidden');  
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
			if($("#title").val()=='' || $("#title").val()==null)
			{
				
				$("#errorMsg1").html('Please enter price title');
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
					 
							
							<form action="../../addPricePlan/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 <div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz100 xxs-fsz30 xxs-lgn_hight_45 padb10 xs-padb0 black_txt trn" style="
												font-family: Avenir;
											">Price</h1>
									</div>
									<div class="mart20 xs-mart0 xs-marb20 marb35  xxs-tall talc xs-padb15  "> <a href="#" class="black_txt fsz25 xxs-tall xxs-lgn_hight_20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn">Please add price for your service.</a></div>
								<div class="marb0 padtrl0">		 
											 <div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="title" id="title" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25"/> 
												<label for="title0" class="floating__label tall nobold" data-content="Pricing title" >
											<span class="hidden--visually">
											 Pricing title</span></label>
											</div>
										 
											 
										</div>
										
										 <div class="on_clmn mart20 ">
											 
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="price_model0" id="price_model0">
											        
											  													
															<option value="1" class="lgtgrey2_bg">Standard pricing</option>
												 											
														 
											</select>
											 	
											  <label for="price_model[]" class="floating__label tall nobold padl10" data-content="Pricing model">
											<span class="hidden--visually">
											  Pricing model</span></label>
											</div>
											 
											</div>
										 
										 <div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="number" name="price0" id="price0" value="200" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" min=200 /> 
												<label for="price0" class="floating__label tall nobold" data-content="Price" >
											<span class="hidden--visually">
											Price</span></label>
											</div>
										 
											 
										</div>
										
										<div class="dflex fxwrap_w alit_s padt0 talc padrl5 mart10  " >
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" id="oneTime0" value="One time" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd green_bg fsz18 white_txt curp ffamily_avenir " onclick="addType(0,1);" >
														</div>
										<div class=" wi_33 xxs-wi_50 maxwi_100  dflex alit_s mart10   padrl5 ">
															<input type="button" value="Recurring" id="subs0" class="wi_100 mart5 maxwi_100 brdrad3 hei_40p diblock nobrd red_ff2828_bg fsz18 white_txt curp ffamily_avenir" onclick="addType(0,2);" >
														</div>
														</div>
										
											 <div class="on_clmn mart20  hidden" id="recurr0">
											 <div class="thr_clmn  wi_50 padr10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_type0" id="recurring_type0" onchange="changeCustom(0,this.value);">
											       <option value="1" class="lgtgrey2_bg">Hourly</option>
												<option value="2" class="lgtgrey2_bg">Daily </option>
											<option value="3" class="lgtgrey2_bg">Weekly</option>
											<option value="4" class="lgtgrey2_bg">Monthly</option>		
											<option value="5" class="lgtgrey2_bg">Every 3 Month</option>	
											<option value="6" class="lgtgrey2_bg">Every 6 Month</option>	
											<option value="7" class="lgtgrey2_bg">Yearly</option>											
											<option value="8" class="lgtgrey2_bg">Custom</option>					 
											</select>
											 	
											  <label for="recurring_type0" class="floating__label tall nobold padl10" data-content="Subscription type">
											<span class="hidden--visually">
											  Subscription type</span></label>
											</div>
											</div>
											<div id="customData0" class="hidden">
											 <div class="thr_clmn  wi_15 padl10">
											<input type="text"  value="Every" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " readonly /> 
											 
											</div>
											 <div class="thr_clmn  wi_10 padl10">
											<input type="number"  id="total_time0" name="total_time0" value="1" min=1 class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " /> 
											 
											</div>
											
											<div class="thr_clmn  wi_25 padl10">
											<div class="pos_rel">
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="recurring_typec0" id="recurring_typec0">
											       <option value="1" class="lgtgrey2_bg">Hourly</option>
												<option value="2" class="lgtgrey2_bg">Daily </option>
											<option value="3" class="lgtgrey2_bg">Weekly</option>
											<option value="4" class="lgtgrey2_bg">Monthly</option>		
											<option value="7" class="lgtgrey2_bg">Yearly</option>											
											 			 
											</select>
											 	
											   
											</div>
											</div>
											</div>
										 </div>
										<input type="hidden" name="subscription_info0" id="subscription_info0" class="subscription_info" value="1" />				
								 
								
								 <input type="hidden" name="total_row" id="total_row" class="subscription_info" value="1" />	
						
						   <div class="clear"></div>
	 
	 				 
							<div id="moreData">
							</div>

	 

										 
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							<a href="javascript:void(0);" onclick="addMore();"><div class="blue_txt fsz20 talc padtb20"  >Add more price </div></a>
							
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
