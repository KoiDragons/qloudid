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
		<link rel="shortcut icon" type="image/x-icon" href="../../../../html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/jquery-ui.min.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/stylenew.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/floatingLabel.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/constructor.css">
		 
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/responsive.css">
		<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/modulesnewy_bg.css">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="../../../../html/usercontent/js/jquery.js"></script>
 <link rel="stylesheet" type="text/css" id="u0" href="https://www.qloudid.com/html/usercontent/js/tinymce/skins/lightgray/skin.min.css">
 <script>
  
 function submitform()
 {
			if($("#car_detail").val()==0) 
				{
					$("#error_msg_form").html('Please select car for the booking');
					return false;
				}
				 
			 
				document.getElementById("save_indexing").submit();
				 
	 
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
							<ul class="menulist sf-menu  fsz14 sf-js-enabled sf-arrows">
								 
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
					 <div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Booking</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Please verify the booking detail below</a></div>
							
							<form action="../confirmVehicleBooking/<?php echo $data['id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								
								<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="text" name="first_name"  placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value='<?php echo $bookingDetail['first_name'];?>' readonly> 
												<label for="first_name" class="floating__label tall nobold padl10" data-content="First name">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="thr_clmn  wi_50 padl10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="text" name="last_name"  placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value='<?php echo $bookingDetail['last_name'];?>' readonly> 
												<label for="last_name" class="floating__label tall nobold padl10" data-content="Last name">
											<span class="hidden--visually">
											 Check-out date</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
										 	</div>
								
									<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="text" name="first_name"  placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value='<?php echo $bookingDetail['car_model'];?>' readonly> 
												<label for="first_name" class="floating__label tall nobold padl10" data-content="Car model">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="thr_clmn  wi_50 padl10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="text" name="last_name"  placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value='<?php echo $bookingDetail['model_series'];?>' readonly> 
												<label for="last_name" class="floating__label tall nobold padl10" data-content="Model series">
											<span class="hidden--visually">
											 Check-out date</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
										 	</div>
											
												<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="text" name="first_name"  placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value='<?php echo $bookingDetail['car_price'];?>' readonly> 
												<label for="first_name" class="floating__label tall nobold padl10" data-content="Price per day">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="thr_clmn  wi_50 padl10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="text" name="last_name"  placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value='<?php echo $bookingDetail['car_registration_number'];?>' readonly> 
												<label for="last_name" class="floating__label tall nobold padl10" data-content="Registration number">
											<span class="hidden--visually">
											 Check-out date</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
										 	</div>
											
										<div class="on_clmn  mart20  ">	
									<div class="thr_clmn  wi_50 padr10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="text" name="first_name"  placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value='<?php echo date('Y-m-d',$bookingDetail['checkin_date']);?>' readonly> 
												<label for="first_name" class="floating__label tall nobold padl10" data-content="Start date">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 <div class="thr_clmn  wi_50 padl10">
											 
										<div class="pos_rel talc">
											
											 
												<input type="text" name="last_name"  placeholder="Title" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value='<?php echo date('Y-m-d',$bookingDetail['checkout_date']); ?>' readonly> 
												<label for="last_name" class="floating__label tall nobold padl10" data-content="End date">
											<span class="hidden--visually">
											 Check-out date</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
										 	</div>
											
													
								
								 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_brand" id="car_brand" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;" disabled>
											<option value="20" class="lgtgrey2_bg">20%</option>											
											 
											 	 
											</select>
												<label for="car_brand" class="floating__label tall nobold padl10" data-content="Commission">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
											 
											 
									 
											 
											 <div class="on_clmn  mart20  ">	
									 
											 
										<div class="pos_rel talc">
											
											 
											<select name="car_detail" id="car_detail" class="light_grey_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz18 black_txt ffamily_avenir floating__input padt25 wi_100"  fdprocessedid="p73uye" style="height: 65px !important;"  >
											<option value="0" class="lgtgrey2_bg">Select car</option>
											 	<?php foreach($bookingCarAvailable as $category => $value) { ?>							
											<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"><?php echo $value['car_registration_number']; ?></option>
												<?php } ?>
											</select>
												<label for="car_body_type" class="floating__label tall nobold padl10" data-content="Select car for this booking">
											<span class="hidden--visually">
											 A</span></label> 
												
											  
											 </div>
											 
											 </div>	
										 
											 
											 
											
								  <div class="clear"></div>
								<div class="red_txt fsz20 talc padtb20" id="error_msg_form"> </div>
								
							
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir">Confirm</button></a> </div>
					
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="../rejectVehicleBooking/<?php echo $data['id']; ?>"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir">Reject</button></a> </div>
							
						</div>
						</form>
						</div>
						
					</div> 
		 
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/vex.css">
<link rel="stylesheet" type="text/css" media="all" href="../../../../html/usercontent/css/vex-theme-default.css">
		<script type="text/javascript" src="../../../../html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="../../../../html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/modules_updatetime.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/custom.js"></script>
<script type="text/javascript" src="../../../../html/usercontent/js/tinymce/tinymce.min.js"></script>
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