<?php
		$path1 = "../../html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
	if($identificatorDetail ['front_image_path']!=null) { $filename="../estorecss/".$identificatorDetail ['front_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$identificatorDetail ['front_image_path'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg"; 
	
	if($identificatorDetail ['back_image_path']!=null) { $filename="../estorecss/".$identificatorDetail ['back_image_path'].".txt"; if (file_exists($filename)) { $value_b=file_get_contents("../estorecss/".$identificatorDetail ['back_image_path'].".txt"); $value_b=str_replace('"','',$value_b); } else { $value_b="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_b="../../../../html/usercontent/images/default-profile-pic.jpg";
	
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
		
		if($identificatorDetail ['front_image_path']!=null) { $filename="../estorecss/".$identificatorDetail ['front_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$identificatorDetail ['front_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $imgs1 = base64_to_jpeg( $value_a, '../estorecss/tmp'.$identificatorDetail['front_image_path'].'.jpg' );  $imgs1='../../../'.$imgs1; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs1="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs1="../../../html/usercontent/images/default-profile-pic.jpg"; }
		
		
		if($identificatorDetail ['back_image_path']!=null) { $filename="../estorecss/".$identificatorDetail ['back_image_path'].".txt"; if (file_exists($filename)) { $value_b=file_get_contents("../estorecss/".$identificatorDetail ['back_image_path'].".txt"); $value_b=str_replace('"','',$value_b); $imgs = base64_to_jpeg( $value_b, '../estorecss/tmp'.$identificatorDetail['back_image_path'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_b="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_b="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; }
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
			 if($("#first_name").val()==null || $("#first_name").val()=="")
			{
				$("#first_name").removeClass('brdb_new');
				$("#first_name").addClass('brd_2px_rgb');
				 return false;
			}
			
			 
			
			 if($("#last_name").val()==null || $("#last_name").val()=="")
			{
				
				$("#last_name").removeClass('brdb_new');
				$("#last_name").addClass('brd_2px_rgb');
				 return false;
			}
			 if($("#email").val()==null || $("#email").val()=="")
			{
				
				$("#email").removeClass('brdb_new');
				$("#email").addClass('brd_2px_rgb');
				 return false;
			} 
			
			 if($("#p_number").val()==null || $("#p_number").val()=="")
			{
				
				$("#p_number").removeClass('brdb_new');
				$("#p_number").addClass('brd_2px_rgb');
				 return false;
			} 
			
			if(isNaN($("#p_number").val()))
				{
				$("#p_number").removeClass('brdb_new');
				$("#p_number").addClass('brd_2px_rgb');
				 return false;
				}
			if($("#p_number").val()==0)
			{
				
				$("#p_number").removeClass('brdb_new');
				$("#p_number").addClass('brd_2px_rgb');
				 return false;
			} 
			
			
			var send_data={};
				 send_data.email=$('#email').val();
				 send_data.p_number=$('#p_number').val();
				 send_data.pcountry=$('#pcountry').val();
				 $.ajax({
							type:"POST",
							url:"../../../checkUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 
								if(data1==2)
								{
									$("#p_number").removeClass('brdb_new');
									$("#p_number").addClass('brd_2px_rgb');
									$("#error_msg_form").html('This phone number is already in use with other account'); 
										
										  submitFlag=0;
									
									return false;
								}
								else
								{
									
									if($("#name_on_house").val()==null || $("#name_on_house").val()=="")
										{
											
											$("#name_on_house").removeClass('brdb_new');
											$("#name_on_house").addClass('brd_2px_rgb');
											 return false;
										} 
										
										if($("#d_address").val()==null || $("#d_address").val()=="")
										{
											
											$("#d_address").removeClass('brdb_new');
											$("#d_address").addClass('brd_2px_rgb');
											 return false;
										} 
										
										 if($("#dpo_number").val()==null || $("#dpo_number").val()=="")
										{
											
											$("#dpo_number").removeClass('brdb_new');
											$("#dpo_number").addClass('brd_2px_rgb');
											 return false;
										} 
										
										if($("#dzip").val()==null || $("#dzip").val()=="")
										{
											
											$("#dzip").removeClass('brdb_new');
											$("#dzip").addClass('brd_2px_rgb');
											 return false;
										} 
										
										if($("#dcity").val()==null || $("#dcity").val()=="")
										{
											
											$("#dcity").removeClass('brdb_new');
											$("#dcity").addClass('brd_2px_rgb');
											 return false;
										} 
										
										if($("#card_number").val().length>0)
										{
											
										 
										if(isNaN($("#card_number").val()))
											{
											$("#card_number").removeClass('brdb_new');
											$("#card_number").addClass('brd_2px_rgb');
											 return false;
											}
											
											 if($("#card_number").val().length!=16)
											{
											$("#card_number").removeClass('brdb_new');
											$("#card_number").addClass('brd_2px_rgb');
											 return false;
											}
										if($("#exp_month").val()==null || $("#exp_month").val()=="")
										{
											
											$("#exp_month").removeClass('brdb_new');
											$("#exp_month").addClass('brd_2px_rgb');
											 return false;
										} 
										if($("#exp_year").val()==null || $("#exp_year").val()=="")
										{
											
											$("#exp_year").removeClass('brdb_new');
											$("#exp_year").addClass('brd_2px_rgb');
											 return false;
										} 
										if($("#cvv").val()==null || $("#cvv").val()=="")
										{
											
											$("#cvv").removeClass('brdb_new');
											$("#cvv").addClass('brd_2px_rgb');
											 return false;
										} 
										if(isNaN($("#cvv").val()))
											{
											$("#cvv").removeClass('brdb_new');
											$("#cvv").addClass('brd_2px_rgb');
											 return false;
											}
											
											if($("#cvv").val().length!=3)
											{
											$("#cvv").removeClass('brdb_new');
											$("#cvv").addClass('brd_2px_rgb');
											 return false;
											}	

										}
										
										 if ($('#image-data1').val() == "" || $('#image-data1').val() == null) {
									 
											 $("#error_msg_form").html('Please select front image');
											 submitFlag = 0;
											 return false;
										 }
									 
										 if ($('#image-data3').val() == "" || $('#image-data3').val() == null) {
									 
											 $("#error_msg_form").html('Please select back image');
											 submitFlag = 0;
											 return false;
										 }
										 
										var bg_url = $('#image-data').css('background-image');
										$('#image-data1').val(bg_url);
										var bg_url1 = $('#image-data2').css('background-image');
										$('#image-data3').val(bg_url1);
										
										 if($("#id_number").val()==null || $("#id_number").val()=="")
										{
											$("#id_number").removeClass('brdb_new');
											$("#id_number").addClass('brd_2px_rgb');
											 return false;
										}
										alert('jain');
										
							document.getElementById('save_indexing').submit();	
			 
								}
								 
							}
						});

			
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
				 
                        <a href="../../../bookingListForRoomAllocation/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
					 
						 <a href="../../../bookingListForRoomAllocation/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
						 
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
							
									<h1 class="marb0  xxs-talc talc fsz50 xxs-fsz45 lgn_hight_55 xxs-lgn_hight_45 padb0 black_txt trn ffamily_avenir"><?php if(isset($purchaserInfo)) echo $purchaserInfo['name']; ?></h1>
									</div>
									
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Reservation details for <?php if(isset($purchaserInfo)) echo $purchaserInfo['name']; ?>.</a></div>
									
							<form action="../../../addCheckinAdultInfo/<?php echo $data['cid']; ?>/<?php echo $data['lid']; ?>/<?php echo $data['booking_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0   padtrl0 white_bg">		 
							 	<div class="marrl0 padb15 brdb fsz16 white_bg tall padt20">
								<a href="#profile" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Basic 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile" class=" " style="display:block;">	
									
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="first_name" id="first_name" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="" > 
												
											 <label for="first_name" class="floating__label tall nobold padl10" data-content="First name" >
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">
											 
										  
											 
											<div class="pos_rel">
												
												<input type="text" name="last_name" id="last_name" placeholder="Last name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="" > 
												 <label for="last_name" class="floating__label tall nobold padl10" data-content="Last name" >
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
											</div>
											</div>
											
												<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="email" id="email" placeholder="Email address" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="" > 
												 <label for="email" class="floating__label tall nobold padl10" data-content="Email address" >
											<span class="hidden--visually">
											 Email address</span></label> 
												
											 
											</div>
											 
											</div>
											
										  
											 
											
											
											
											<div class="on_clmn padt10">
											 <div class="thr_clmn  wi_20 padr5"> 
										<div class="pos_rel">
										<select id="pcountry" name="pcountry" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"     />
														
														<?php foreach($countryCode as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($value['id']==201) echo 'selected';  ?>>+<?php echo $value['country_code']; ?></option>
														<?php } ?>
																														
															   
																													
													</select>
													 
												 <label for="pcountry" class="floating__label tall nobold padl10" data-content="Code">
											<span class="hidden--visually">
											  Code</span></label>
												</div>
												</div>
												<div class="thr_clmn  wi_80  padl5"> 
											<div class="pos_rel">
												
												<input type="text" name="p_number" id="p_number" placeholder="Phone number"   class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value=""  > 
												 <label for="p_number" class="floating__label tall nobold padl10" data-content="Mobile" >
											<span class="hidden--visually">
											 Mobile</span></label> 
												
											 </div>
											</div>
											 
											</div>
											 </div>
											 <div class="clear"></div>
											 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile1" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Address 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile1" class=" " style="display:none;">	
									
								 
											 
											 										
										<div class="on_clmn hidden">
											 
											<div class="pos_rel">
												
												<input type="text" name="name_on_house" id="name_on_house" placeholder="Name on the door" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg light_grey_bg floating__input padt25" value=""  > 
												
											 <label for="first_name" class="floating__label tall nobold padl10" data-content="Name on door" >
											<span class="hidden--visually">
											 Name on door</span></label>
											</div>
											 
											 
											 
											</div>
											
												 <div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_70  padr5">  
											<div class="pos_rel">
												
												<input type="text" name="d_address" id="d_address" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value=""  > 
												 <label for="s_address" class="floating__label tall nobold padl10" data-content="Street address" >
											<span class="hidden--visually">
											 Street address</span></label>
												 
											 
											</div>
											
											</div>
											 
											<div class="thr_clmn  wi_30 padl5">  
											<div class="pos_rel">
												
												<input type="text" name="dpo_number" id="dpo_number" placeholder="Port  " class="white_bg  brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value=""  > 
												 <label for="po_number" class="floating__label tall nobold padl10  " data-content="Port  " >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 
											</div>
											</div>
											
												<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
											 
										<div class="pos_rel talc">
									 
										<input type="text" name="dzip" id="dzip" placeholder="Zip code" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" value=""  > 
												 <label for="Zipcode" class="floating__label tall nobold padl10" data-content="Zip code" >
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											 
											
											<input type="text" name="dcity" id="dcity" placeholder="City, State" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" value=""  > 
												 <label for="city" class="floating__label tall padl10 nobold" data-content="City, State" >
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
									
									 </div>
											 			
							 </div>
							 <div class="clear"></div>
										 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile2" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Card 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile2" class=" " style="display:none;">	
										 
										 
										<div class="on_clmn padt10">
										<input type="text" name="card_number" id="card_number" placeholder="Your card number" class=" white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" value=""  >
										 <label for="card_number" class="floating__label tall padl10 nobold" data-content="Card number" >
											<span class="hidden--visually">
											 Card number</span></label>
									</div>
									
										<div class="on_clmn padt10">
									 <div class="thr_clmn  wi_50 padr5"> 
										<input type="number" name="exp_month" id="exp_month" value=""   placeholder="Your card number" class=" white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" >
										 <label for="exp_month" class="floating__label tall padl10 nobold" data-content="Expiry month" >
											<span class="hidden--visually">
											 Expiry month</span></label>
									</div>
									
									<div class="thr_clmn  wi_50 padl5"> 
										<input type="number" name="exp_year" id="exp_year"  placeholder="Your card number" class=" white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" value=""  >
										 <label for="exp_year" class="floating__label tall padl10 nobold" data-content="Expiry year" >
											<span class="hidden--visually">
											 Expiry year</span></label>
									</div>
									 </div>
								 <div class="on_clmn padt10">

												<div class="pos_rel">
										<input type="number" name="cvv" id="cvv" placeholder="CVV" class=" white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir  light_grey_bg floating__input padt25" value=""  >
										<label for="cvv" class="floating__label tall padl10 nobold" data-content="CVV" >
											<span class="hidden--visually">
											 CVV</span></label>
									</div>
									</div>
									 </div>
										
									<div class="clear"></div>
											 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile3" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Passport 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile3" class=" " style="display:none;">	
									
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="id_number" id="id_number" placeholder=" Passport number" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="" /> 
												 <label for="id_number" class="floating__label tall nobold padl10" data-content=" Passport number">
											<span class="hidden--visually">
											 Passport number</span></label> 
												
											 
											</div>
											 
											</div>
																 			
							 									 
	 
					 <div class="on_clmn padt10">
                        <div class="thr_clmn  wi_50 "  >
                           <div class="pos_rel">
                              <select id="issue_year" name="issue_year" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" onchange='updateMonth(this.value);' >
                                 <?php $date=date('Y'); $year=date('Y')-12;  for($i=$date; $i>=$year;$i--) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
							  <label for="issue_year" class="floating__label tall nobold padl10" data-content="Issue year">
											<span class="hidden--visually">
											  Issue year</span></label>
                           </div>
                        </div>
                        <div class="thr_clmn wi_50 padl20">
                           <div class="pos_rel">
                              <select id="issue_month" name="issue_month" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"  >
                                 <?php $dateM=date('m');  for($i=1; $i<=date('m');$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php }  ?>
                              </select>
							  <label for="issue_month" class="floating__label tall nobold padl10" data-content="Issue month">
											<span class="hidden--visually">
											  Issue month</span></label>
                           </div>
                        </div>
                     </div>
					 
                     						
					 <div class="clear"></div>
                      
                     <div class="on_clmn padt10">
                        <div class="thr_clmn  wi_50 "  >
                           <div class="pos_rel">
                              <select id="expiry_year" name="expiry_year" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"  onchange='updateExpiryMonth(this.value);'>
                                 <?php $year=$date+12; for($i=$date; $i<=$year;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
							    <label for="expiry_year" class="floating__label tall nobold padl10" data-content="Expiry month">
											<span class="hidden--visually">
											  Expiry month</span></label>
                           </div>
                        </div>
                        <div class="thr_clmn wi_50 padl20">
                           <div class="pos_rel">
                              <select id="expiry_month" name="expiry_month" class=" wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"  >
                                 <?php  for($i=$dateM; $i<=12;$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
							    <label for="expiry_month" class="floating__label tall nobold padl10" data-content="Expiry month">
											<span class="hidden--visually">
											  Expiry month</span></label>
                           </div>
                        </div>
                     </div>
                    						
									
										</div>
									  	<div class="clear"></div>
									 <div class="marrl0 padb15 brdb fsz16 white_bg tall padt35">
								<a href="#profile4" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Passport copies
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile4" class=" " style="display:none;">	
									<div class="on_clmn mart10 ">
									<div class="thr_clmn  wi_50 padr10"  >								
									<div class="wi_100 xxs-wi_100  ">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="" class="hidden-image-data" />
										 
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: " id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								
								 
							</div>
						 
						</div>
						 
								<div class="thr_clmn  wi_50 padl10"  >  
								<div class="marb25  ">
						<div class="wi_100 xxs-wi_100 ">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data3" id="image-data3" value="" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: " id="image-data2" name="image-data2"></div>
											 
										</div>
									</div>
								
								 
							</div>
						</div>	 
						</div>
						</div>
						<div class="on_clmn mart10 xxs-mart10">
									<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 talc">
											
											<label class="forword ">
												Front Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
										</div>
										<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 talc">
											
											<label class="forword ">
												Back Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL2(this);">
											</label>
											</div></div>
											
											</div>
											</div>
											
										</div>
										</div>
										<div class="clear"></div>
										 	
										
										
										<input type="hidden" id="indexing_save" name="indexing_save">
										
								<div class="red_txt fsz20 talc" id="error_msg_form"> </div>
								
							
							
						 
							 
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir  mart35"> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18    ffamily_avenir">Submit</button></a> </div>
							
						</div>
						</form>
							 
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
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	</body>
	 						