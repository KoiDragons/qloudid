<?php
		$path1 = "../../html/usercontent/images/";
	 
	
	function base64_to_jpeg($base64_string, $output_file) {
			// open the output file for writing
			$ifp = fopen( $output_file, 'wb' ); 
			
			// split the string on commas
			// $data[ 0 ] == "data:image/png;base64"
			// $data[ 1 ] == <actual base64 string>
			$data = explode( ',', $base64_string );
			//print_r($data); die;
			// we could add validation here with ensuring count( $data ) > 1
			fwrite( $ifp, base64_decode( $data[1] ) );
			
			// clean up the file resource
			fclose( $ifp ); 
			
			return $output_file; 
		}
		
		 
	?>

<head>
 
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<title>Qloud ID</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<!--<link rel="stylesheet" media="all" href="../../../../html/fleet/css/app.min.css">-->
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		 <script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		
	<script>
var issueM="<?php echo date('m'); ?>";
								var issueY="<?php echo date('Y'); ?>";
								var expiryM="<?php echo date('m'); ?>";
								var expiryY="<?php echo date('Y'); ?>";
			
function updateFood(id)
   {
	   foodValue=id;
	   dayValue=0;
   }			
		function updateMonth(id)
         {
			 var allDays='';
         	if(id<issueY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#issue_month").html(allDays);							
         	}
         	else
         	{
         	for(i=1;i<=issueM;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#issue_month").html(allDays);							
         	}
         }
         function updateExpiryMonth(id)
         {
			 var allDays='';
         	if(id>expiryY)
         	{
         	for(i=1;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#expiry_month").html(allDays);							
         	}
         	else
         	{
         	for(i=issueM;i<=12;i++)
         	{
         	allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
         	}
         	$("#expiry_month").html(allDays);							
         	}
         }
        
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
	 function changeColor(link)
		 {
			 $(link).removeClass('brd_2px_rgb');
			 $(link).addClass('brdb_new');
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
			$('#error_msg_form').html('');
		 
			if($("#name_on_card").val()==null || $("#name_on_card").val()=="")
			{
				$("#error_msg_form").html('Please enter name on card');
                 submitFlag = 0;
                 return false;
			}
			if($("#card_number").val()==null || $("#card_number").val()=="")
			{
				$("#error_msg_form").html('Please enter card number');
                 submitFlag = 0;
                 return false;
			}
			if(isNaN($("#card_number").val())) 
				{
					$("#error_msg_form").html('Card number must be a numeric value');
					return false;
				}
			if($("#cvv_number").val()==null || $("#cvv_number").val()=="")
			{
				$("#error_msg_form").html('Please enter cvv number');
                 submitFlag = 0;
                 return false;
			}
			if(isNaN($("#cvv_number").val())) 
				{
					$("#error_msg_form").html('CVV number must be a numeric value');
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
	
	function readURL(input) {
	 
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
			 
            $('#image-data')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data1').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }

	 
} 

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
            $('#image-data2')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data3').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }

	 
} 
			</script>
			
			
		
	</head>
	<body class="bg_212b3a ffamily_avenir">
	  <div class="column_m header   bs_bb trans_bg " style="height:97.44px; border-bottom: 1px solid #353945;">
         <div class="header__center center padding2080 xs-padding032 " style="display: flex;
    align-items: center; width: 100%;
    max-width: 1280px;
    margin: 0 auto;
  "><a class="header__logo xs-fsz20 " href="#" style="
    border: 2px solid #ffffff; 
    padding: 10px;
    color: white;
    border-radius: 5px;
    font-family: Avenir;
    font-size: 20PX;
    line-height:25px !important
    "><?php echo $bookingInformationDetail['hotel_name']; ?></a>


		 
			
			
			

</div>
      </div>
	 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart60 " id="loginBank">
				<div class="wrap maxwi_100 padrl25 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_70 xxs-lgn_hight_50 padb0 white_txt trn ffamily_avenir changedText">Confirm</h1>
									</div>
									<div class=" xxs-tall talc xs-padb20 padb35 ffamily_avenir"> <a href="#" class="txt_777E90 fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_30 changedText">Please confirm your reservation before it expires or get blocked</a></div>
									
								 
							 <div class="column_m container  brdb353945  padrl0i   fsz14 dark_grey_txt  ">
												<div class="bg_212b3a  bg_fffbcc_a ">
										<div class="   brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												 <div class="css-1jzh2co marb15">
												   
												   <div class="chip-container">
													  
													 <a href="javascript:void(0);" onclick="updateSale(0);"><div id="bath-chip" class="css-cedhmb">
													   <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="sv8pva">
														  <span class="chip chip_is-selected">
															 <span class="chip_content">
																<div class="css-utgzrm hidden"></div>
																<span class="chip_text">Reserved</span>
															 </span>
														  </span>
													   </div>
													</div></a>
													 <a href="javascript:void(0);" onclick="updateNone(1);"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu" fdprocessedid="29w8s">
															<span class="chip chip_not-selected" style="border: 1px solid #353945 !important;">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text txt_777E90">Pre check-in</span>
															   </span>
															</span>
														 </div>
													  </div></a>
													 
													 
												   </div>
												</div>
												<div class="clear"></div>
											 
											
											
											<div class="clear"></div>
										</div>
										
											</div>
											
											
											
											</div>
													
											 
											 
											 
									</div>
									
							 
								 
									
								 
											
											<div class="on_clmn padt10">  
											
											 
											 <div class="thr_clmn  wi_50 padr5"> 
										
											<div class="pos_rel">
												
												<input type="text" name="fname" id="fname"  class="nobrd tall minhei_65p fsz20 padl10 white_txt ffamily_avenir bg_2F3C4F floating__input padt25" value="<?php echo $userSummary['first_name']; ?>" readonly /> 
												 <label for="card_number" class="floating__label tall nobold padl10  " data-content="First name" >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											 <div class="thr_clmn  wi_50 padl5"> 
										
											<div class="pos_rel">
												
												<input type="text" name="lname" id="lname"  class="nobrd tall minhei_65p fsz20 padl10 white_txt ffamily_avenir bg_2F3C4F floating__input padt25" value="<?php echo $userSummary['last_name']; ?>" readonly /> 
												 <label for="card_number" class="floating__label tall nobold padl10  " data-content="Last name" >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											  </div>
										 
											<div class="on_clmn padt10">  
											
											 
											 <div class="thr_clmn  wi_50 padr5"> 
										
											<div class="pos_rel">
												
												<input type="text" name="cdate" id="cdate"  class="nobrd tall minhei_65p fsz20 padl10 white_txt ffamily_avenir bg_2F3C4F floating__input padt25" value="<?php echo date('Y-m-d',$bookingInformationDetail['checkin_booking_date']); ?>" readonly /> 
												 <label for="cdate" class="floating__label tall nobold padl10  " data-content="Checkin date" >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											 <div class="thr_clmn  wi_50 padl5"> 
										
											<div class="pos_rel">
												
												<input type="text" name="ddate" id="ddate"  class="nobrd tall minhei_65p fsz20 padl10 white_txt ffamily_avenir bg_2F3C4F floating__input padt25" value="<?php echo date('Y-m-d',$bookingInformationDetail['checkout_booking_date']); ?>" readonly /> 
												 <label for="ddate" class="floating__label tall nobold padl10  " data-content="Last name" >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											  </div>
										 
										 
											<div class="on_clmn padt10">  
											
											 
											 
											 <div class="thr_clmn  wi_50 padr5 "> 
										
											<div class="pos_rel">
												
												<input type="text" name="guest_adult" id="guest_adult"  class="nobrd tall minhei_65p fsz20 padl10 white_txt ffamily_avenir bg_2F3C4F floating__input padt25" value="<?php echo $bookingInformationDetail['guest_adult']; ?>" readonly /> 
												 <label for="guest_adult" class="floating__label tall nobold padl10  " data-content="Adults" >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											 
											 <div class="thr_clmn  wi_50 padl5"> 
										
											<div class="pos_rel">
												
												<input type="text" name="guest_child" id="guest_child"  class="nobrd tall minhei_65p fsz20 padl10 white_txt ffamily_avenir bg_2F3C4F floating__input padt25" value="<?php echo $bookingInformationDetail['guest_children']; ?>" readonly /> 
												 <label for="guest_child" class="floating__label tall nobold padl10  " data-content="Children" >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											  </div>
							 
						    <div class="clear"></div>
							
							<div class="padt20 xxs-talc talc padb20 mart35">
								
								<a href="<?php if($bookingInformationDetail['card_id']==null || $bookingInformationDetail['card_id']=='') echo '../invoiceAddressesUser'; else echo '../checkYourDetails'; ?>/<?php echo $data['checkout_id']; ?>" ><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #ffffff; color: #000000;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Start to confirm</font></font></button></a>
								
							</div>
							
					 
							
						</div></form>
							 
							   <div class="clear"></div>
					 
							
						</div>
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_black_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
	 						