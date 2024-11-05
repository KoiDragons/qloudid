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
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		 <script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		
	<script>
var issueM="<?php echo date('m'); ?>";
								var issueY="<?php echo date('Y'); ?>";
								var expiryM="<?php echo date('m'); ?>";
								var expiryY="<?php echo date('Y'); ?>";
								
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
			if($("#company_name").val()==null || $("#company_name").val()=="")
			{
				$("#error_msg_form").html('Please enter company name');
                 submitFlag = 0;
                 return false;
			}
			if($("#cid_number").val()==null || $("#cid_number").val()=="")
			{
				$("#error_msg_form").html('Please enter company id number');
                 submitFlag = 0;
                 return false;
			}
			if($("#d_address").val()==null || $("#d_address").val()=="")
			{
				$("#error_msg_form").html('Please enter street address');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#dpo_number").val()==null || $("#dpo_number").val()=="")
			{
				$("#error_msg_form").html('Please enter port number');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#dzip").val()==null || $("#dzip").val()=="")
			{
				$("#error_msg_form").html('Please enter zipcode');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#dcity").val()==null || $("#dcity").val()=="")
			{
				$("#error_msg_form").html('Please enter city');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#indexing_save").val()==0)
			{
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
	<body class="white_bg ffamily_avenir">
	 
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
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
					 
						 <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
						 
                     </li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m   talc lgn_hight_22 fsz16 mart40" id="loginBank">
				<div class="wrap maxwi_100 padrl15 xs-padrl25">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10  xs-pad0">
					 
									<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Property</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" ><?php echo $resultOrg1['name_on_house'].','.$resultOrg1['address'].'-'.$resultOrg1['port_number']; ?></a></div>
									
								 
								<div class="tab-header mart10 padb10 xs-tall brdb tabbluebrdcolor nobrdt nobrdl nobrdr tall hidden">
                                            <a href="#" class="dinlblck mar5 padrl15   tabblueBGcolor brdrad5  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Basic</a>
											 
											   
                                             
                                        </div>	
									
							<form action="../../updateUserCompanyDetail/<?php echo $data['aid']; ?>/<?php echo $data['booking_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0   padtrl0 white_bg">
								 
											 
											 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile1" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Invoicing Address 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile1" class=" " style="display:none;">	
								
								<div class="on_clmn padt10"> 
											 
											 <div class="pos_rel">
												
												<input type="text" name="company_name" id="company_name" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" > 
												 <label for="company_name" class="floating__label tall nobold padl10" data-content="Company name" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											 
											 
											 
											</div>
											
											<div class="on_clmn padt10"> 
											 
											 <div class="pos_rel">
												
												<input type="text" name="cid_number" id="cid_number" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" > 
												 <label for="cid_number" class="floating__label tall nobold padl10" data-content="Vat/CID" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											 
											 
											 
											</div>
								  <div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_70  padr5">   
											 <div class="pos_rel">
												
												<input type="text" name="d_address" id="d_address" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" > 
												 <label for="s_address" class="floating__label tall nobold padl10" data-content="Street address" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											</div>
											 
											<div class="thr_clmn  wi_30 padl5">  
											
											 
											
										
											<div class="pos_rel">
												
												<input type="text" name="dpo_number" id="dpo_number" placeholder="Port  " class="white_bg  brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" > 
												 <label for="po_number" class="floating__label tall nobold padl10  " data-content="Port  " >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											</div>
											
											
												<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
										<div class="pos_rel talc">
									 
										<input type="text" name="dzip" id="dzip" placeholder="Zip code" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" > 
												 <label for="Zipcode" class="floating__label tall nobold padl10" data-content="Zip code" >
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											 
											
											<input type="text" name="dcity" id="dcity" placeholder="City, State" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" > 
												 <label for="city" class="floating__label tall padl10 nobold" data-content="City, State" >
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
									</div>
									 
											 			
							 </div>
							 <div class="clear"></div>
									<?php if($apartmentBookingDetailInfo['is_paid']==0) { ?> 	
								<div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile2" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Company Card detail 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile2" class=" " style="display:none;">	
									
								  <div class="on_clmn padt10"> 
											   
											 <div class="pos_rel">
												
												<input type="text" name="name_on_card" id="name_on_card"   class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" > 
												 <label for="name_on_card" class="floating__label tall nobold padl10" data-content="Name on the card" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											 
											 
											
											</div>
											
											<div class="on_clmn padt10">  
											
											 
											
										
											<div class="pos_rel">
												
												<input type="text" name="card_number" id="card_number"  class="white_bg  brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" > 
												 <label for="card_number" class="floating__label tall nobold padl10  " data-content="Card number  " >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											 
													<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
										<div class="pos_rel talc">
									 
											<select class="wi_100 light_grey_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_65p fsz20 padl10 black_txt ffamily_avenir"   name="expiry_month" id="expiry_month" >
											       
														<?php for($i=1;$i<=12;$i++){  $date='2022-'.$i.'-01'; ?>													
															<option value="<?php echo $i; ?>"   ><?php echo date('M',strtotime($date)); ?></option>
														<?php } ?>         
											</select>
												 <label for="expiry_month" class="floating__label tall nobold padl10" data-content="Expiry month" >
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											 
											
											<select class="wi_100 light_grey_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_65p fsz20 padl10 black_txt ffamily_avenir"   name="expiry_year" id="expiry_year" >
											        
														<?php for($i=0;$i<=12;$i++){ ?>													
															<option value="<?php echo date('Y')+$i; ?>"   ><?php echo date('Y')+$i; ?></option>
														<?php } ?>         
											</select>
												 <label for="expiry_year" class="floating__label tall nobold padl10" data-content="Expiry year" >
											<span class="hidden--visually">
											  Zip code</span></label> 
										</div>
									</div>
									</div> 
									 
									<div class="on_clmn padt10 ">
											 
											<div class="pos_rel">
												<input type="text" name="cvv_number" id="cvv_number"  class="white_bg  brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" > 
												 <label for="cvv_number" class="floating__label tall nobold padl10  " data-content="CVV number  " >
											<span class="hidden--visually">
											 Port  </span></label>
											</div>
											 
											</div>
											 			
							 </div>
									<?php } ?>
							 <div class="clear"></div> 
								 	
										
										<input type="hidden" id="indexing_save" name="indexing_save" value='<?php echo $apartmentBookingDetailInfo['is_paid']; ?>'>
										
								<div class="red_txt fsz20 talc" id="error_msg_form"> </div>
								
							
							
						 
							 
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir mart35 "> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18    ffamily_avenir">Submit</button></a> </div>
							
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
	 						