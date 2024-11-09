<html class="home"><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Qmatchup</title>
	<!--<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
	<link rel="stylesheet" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">
	 
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="../../../../../html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/stylenew.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/floatingLabel.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/constructor.css">
		 
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/responsive.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/modulesnewy_bg.css">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="../../../../../html/usercontent/js/jquery.js"></script>
 <link rel="stylesheet" type="text/css" id="u0" href="https://www.safeqloud.com/html/usercontent/js/tinymce/skins/lightgray/skin.min.css">
 <script>
 var optionInfo='<option value="0">Select</option>';
function getCarModelInfo(id)
{
	  
	  $('#car_model_year').html('');
	  $('#car_model_year').html(optionInfo);
	  $('#car_model_body').html('');
	  $('#car_model_body').html(optionInfo);
	  $('#car_model_generation').html('');
	  $('#car_model_generation').html(optionInfo);
	  $('#car_model_trim').html('');
	  $('#car_model_trim').html(optionInfo);
				var send_data={};
				 send_data.car_type=id;
				 $.ajax({
							type:"POST",
							url:"../../getCarModelInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 $('#car_brand_model').html('');
								  $('#car_brand_model').html(data1);
							}
						});	
}
function getCarYearInfo(id)
{
	 
	  $('#car_model_year').html('');
	  $('#car_model_year').html(optionInfo);
	  $('#car_model_body').html('');
	  $('#car_model_body').html(optionInfo);
	  $('#car_model_generation').html('');
	  $('#car_model_generation').html(optionInfo);
	  $('#car_model_trim').html('');
	  $('#car_model_trim').html(optionInfo);
				var send_data={};
				 send_data.model_id=id;
				 $.ajax({
							type:"POST",
							url:"../../getCarModelYearInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 $('#car_model_year').html('');
								  $('#car_model_year').html(data1);
							}
						});	
}
function getCarBodyInfo(id)
{
	  
	  $('#car_model_body').html('');
	  $('#car_model_body').html(optionInfo);
	  $('#car_model_generation').html('');
	  $('#car_model_generation').html(optionInfo);
	  $('#car_model_trim').html('');
	  $('#car_model_trim').html(optionInfo);
				var send_data={};
				 send_data.model_id= $('#car_brand_model').val();
				 send_data.year=id;
				 $.ajax({
							type:"POST",
							url:"../../getCarModelBodyInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 $('#car_model_body').html('');
								  $('#car_model_body').html(data1);
							}
						});	
}

function getCarGenerationInfo(id)
{
	  
	  $('#car_model_generation').html('');
	  $('#car_model_generation').html(optionInfo);
	  $('#car_model_trim').html('');
	  $('#car_model_trim').html(optionInfo);
				var send_data={};
				 send_data.model_id= $('#car_brand_model').val();
				  send_data.year= $('#car_model_year').val();
				 send_data.body_type=id;
				 $.ajax({
							type:"POST",
							url:"../../getCarModelGenerationInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 $('#car_model_generation').html('');
								  $('#car_model_generation').html(data1);
							}
						});	
}


function getCarTrimInfo(id)
{
	  
	  $('#car_model_trim').html('');
	  $('#car_model_trim').html(optionInfo);
	  
				var send_data={};
				 send_data.model_id= $('#car_brand_model').val();
				  send_data.year= $('#car_model_year').val();
				   send_data.body_type= $('#car_model_body').val();
				 send_data.generation=id;
				 $.ajax({
							type:"POST",
							url:"../../getCarModelTrimInfo",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 $('#car_model_trim').html('');
								  $('#car_model_trim').html(data1);
							}
						});	
}
 
 function submitform()
 {
			if($("#car_brand").val()==0) 
				{
					$("#error_msg_form").html('Please select car brand');
					return false;
				}
				 
				if($("#car_brand_model").val()==0) 
				{
					$("#error_msg_form").html('Please select car brand model series');
					return false;
				}
				
				if($("#car_model_year").val()==0) 
				{
					$("#error_msg_form").html('Please select year');
					return false;
				}
				
				
				if($("#car_model_body").val()==0) 
				{
					$("#error_msg_form").html('Please select body');
					return false;
				}
				
				if($("#car_model_generation").val()==0) 
				{
					$("#error_msg_form").html('Please select generation');
					return false;
				}
				
				if($("#car_model_trim").val()==0) 
				{
					$("#error_msg_form").html('Please select available range');
					return false;
				}
				if($("#total_cars").val()==0 || $("#total_cars").val()=='' || $("#total_cars").val()==null) 
				{
					$("#error_msg_form").html('Please enter available cars');
					return false;
				}
				
				if(isNaN($("#total_cars").val())) 
				{
					$("#error_msg_form").html('Total cars must be a numeric value');
					return false;
				}
				
				if($("#car_rental_price").val()==0 || $("#car_rental_price").val()=='' || $("#car_rental_price").val()==null) 
				{
					$("#error_msg_form").html('Please enter rental price per day');
					return false;
				}
				
				if(isNaN($("#car_rental_price").val())) 
				{
					$("#error_msg_form").html('Rental price must be a numeric value');
					return false;
				}
				document.getElementById("save_indexing").submit();
				 
	 
 }
 
			function checkEmail(id) {
				
				var email = id;
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email)) {
					 
					return 0;
				}
				else
				return 1; 
				
				
			}
 </script>
 </head>

	<body>
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../vehicleList/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
							<ul class="menulist sf-menu  fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../vehicleList/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
					 <div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Vehicle</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please provide the vehicle information below</a></div>
							
							<form action="../../addCarInformation/<?php echo $data['cid']; ?>/<?php echo $data['location_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_brand" id="car_brand" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;" onchange="getCarModelInfo(this.value);">
											<option value="0" class="lgtgrey2_bg">Select</option>
											<?php  
												
												foreach($carAvailableModelList as $category => $value) 
												{
													
													
												?> 									
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"><?php echo $value['car_model']; ?></option>
												<?php } ?>
											 	 
											</select>
												<label for="car_brand" class="floating__label tall nobold padl10" data-content="Car brand">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 
									<div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_brand_model" id="car_brand_model" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;" onchange="getCarYearInfo(this.value);">
											<option value="0" class="lgtgrey2_bg" selected>Select</option>											
											</select>
												<label for="car_brand_model" class="floating__label tall nobold padl10" data-content="Make">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 
											 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_model_year" id="car_model_year" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;" onchange="getCarBodyInfo(this.value);">
											<option value="0" class="lgtgrey2_bg" selected>Select</option>											
											</select>
												<label for="car_model_year" class="floating__label tall nobold padl10" data-content="Year">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 
											 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_model_body" id="car_model_body" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;" onchange="getCarGenerationInfo(this.value);">
											<option value="0" class="lgtgrey2_bg" selected>Select</option>											
											</select>
												<label for="car_model_body" class="floating__label tall nobold padl10" data-content="Body">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>
											 
											 
											 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_model_generation" id="car_model_generation" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;"  onchange="getCarTrimInfo(this.value);">
											<option value="0" class="lgtgrey2_bg" selected>Select</option>											
											</select>
												<label for="car_model_generation" class="floating__label tall nobold padl10" data-content="Generation">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>
											 
											 
											 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_model_trim" id="car_model_trim" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;" >
											<option value="0" class="lgtgrey2_bg" selected>Select</option>											
											</select>
												<label for="car_model_trim" class="floating__label tall nobold padl10" data-content="Trim">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>
											 
											 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_body_type" id="car_body_type" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;" >
											 											
											<option value="1" class="lgtgrey2_bg">Medium car</option>
											<option value="2" class="lgtgrey2_bg">Small car</option>
											<option value="3" class="lgtgrey2_bg">Large car</option>
											<option value="4" class="lgtgrey2_bg">SUVs</option>
											<option value="5" class="lgtgrey2_bg">People carried</option>	
											<option value="6" class="lgtgrey2_bg">Premium car</option>
											</select>
												<label for="car_body_type" class="floating__label tall nobold padl10" data-content="Body type">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 
											<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="1" min="1" name="total_cars" id="total_cars" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="total_cars" class="floating__label tall nobold padl10" data-content="Total cars">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="thr_clmn  wi_50 padl10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="number" value="0" min="0" name="car_rental_price" id="car_rental_price" placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												<label for="car_rental_price" class="floating__label tall nobold padl10" data-content="Price per day">
											<span class="hidden--visually">
											 Check-out date</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
										 	</div>
											
											 
											
											 
											
								  <div class="clear"></div>
								<div class="red_txt fsz20 talc padtb20" id="error_msg_form"> </div>
								
							
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir">Add</button></a> </div>
							
						</div>
						</form>
						</div>
						
					</div> 
		 
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/vex.css">
<link rel="stylesheet" type="text/css" media="all" href="../../../../../html/usercontent/css/vex-theme-default.css">
		<script type="text/javascript" src="../../../../../html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="../../../../../html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/modules_updatetime.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/custom.js"></script>
<script type="text/javascript" src="../../../../../html/usercontent/js/tinymce/tinymce.min.js"></script>
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
		
<script>
function addNew()
{

$('#2').removeClass('hidden');
}
$(".js-example-tokenizer").select2({
    tags: true,
    tokenSeparators: [',', ' ']
})
function checkVariation(id)
{
	if($('#variation_type').val()==1)
	{
		selectId(1);
	}
}
function selectId(id)
{
	$('#errorMsg1').html('');
	var send_data={};
	 var send_ajax=1;
	send_data.variation_count=$('#variation_count').val();
	send_data.variation_price=$('#dish_price').val();
 if($('#variation_count').val()==1)
{
	send_data.value1=$("#sub1").select2('val');
	 if(send_data.value1==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
	 }
}

 else if($('#variation_count').val()==2)
{
	send_data.value1=$("#sub1").select2('val');
	send_data.value2=$("#sub2").select2('val');
	if(send_data.value1==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for first variation');
	 }
	else if(send_data.value2==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for second variation');
	 }
	 	
	
}

 else if($('#variation_count').val()==3)
{
	send_data.value1=$("#sub1").select2('val');
	send_data.value2=$("#sub2").select2('val');
	send_data.value3=$("#sub3").select2('val');
	if(send_data.value1==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for first variation');
	 }
	else if(send_data.value2==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for second variation');
	 }
	 else if(send_data.value3==null)
	 {
		send_ajax=0; 
		$('#variation_stock').html('');
		$('#errorMsg1').html('please select atleast one value for third variation');
	 }		
	
	
}
 
if(send_ajax==1)
{
  $.ajax({
					type:"POST",
					url:"../createVariationInfo/<?php echo $data['cid']; ?>",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						 $('#variation_stock').html(data1);
					}
				});
}
}
function deleteRow(id)
{
	$('#errorMsg1').html('');
	if(id==1)
	{
		$('#errorMsg1').html('you can not delete first variation');
		return false;
	}
	if(id==2)
	{
		if($('#variation_count').val()==3)
		{
		$('#errorMsg1').html('you can not delete second variation till third variation is in use');
		return false;
		}
		else
		{
		$('#row2').addClass('hidden');	
		$('#sub2').html('');
		$('#variation_count').val(1);	
		selectId(1);		
		}
	}
	if(id==3)
	{
		 
		$('#row3').addClass('hidden');	
		$('#sub3').html('');
$('#variation_count').val(2);		
		selectId(1); 
	}
}


	$( ".select2-single, .select2-multiple" ).select2( {
		theme: "bootstrap",
		placeholder: "Select a State",
		maximumSelectionSize: 3,
		containerCssClass: ':all:'
		
		
	} );

	$( ":checkbox" ).on( "click", function() {
		$( this ).parent().nextAll( "select" ).prop( "disabled", !this.checked );
		alert($('.select2-multiple').val());
	});
</script>

	

</body></html>