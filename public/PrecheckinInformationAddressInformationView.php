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
	function updateInvoice(id,link)
   {
	   invoiceShow=1;
	    
   }
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
			
			if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
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
	<body class="bg_212b3a ffamily_avenir">
	 
			 <div class="column_m header   bs_bb bg_212b3a hidden-xs">
         <div class="wi_100 hei_75p xs-pos_fix padtb0 padr10 bg_212b3a brdb353945">
            <div class="fleft padrl0   padtbz10"  >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../userActiveStatus/<?php echo $data['hotel_checkin_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
		 
		  
            <div class="clear"></div>
         </div>
      </div>
		 	<div class="column_m header hei_60p bs_bb bg_212b3a visible-xs">
				<div class="wi_100 hei_60p xs-pos_fix padtb5 padrl0 bg_212b3a">
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../userActiveStatus/<?php echo $data['hotel_checkin_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left white_txt" aria-hidden="true"></i></a>
                     </li>
								 
								
								
								
							</ul>
						</div>
				
					</div>					 
				  
			  
				<div class="clear"></div>
			</div>
		</div> 
		 
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart60 " id="loginBank">
				<div class="wrap maxwi_100 padrl25 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_70 xxs-lgn_hight_50 padb0 white_txt trn ffamily_avenir changedText">Address</h1>
									</div>
									<div class=" xxs-tall talc xs-padb20 padb35 ffamily_avenir"> <a href="#" class="txt_777E90 fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_30 changedText">Please add your delivery address</a></div>
									
								 
								 
									
							<form action="../updateUserPersonalAddress/<?php echo $data['hotel_checkin_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0   padtrl0 bg_212b3a">
								 
											 
											 <div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt35">
								<a href="#profile1" class="expander-toggler txt_777E90 xs-fsz16 tall bg_2F3C4F padrl30 padtb10 brdrad5 active">Guest personal Address 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile1" class=" " style="display:block;">	
									
								  <div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_70  padr5">   
											 <div class="pos_rel">
												
												<input type="text" name="d_address" id="d_address" placeholder="Street address" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="s_address" class="floating__label tall nobold padl10" data-content="Street address" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											</div>
											 
											<div class="thr_clmn  wi_30 padl5">  
											
											 
											
										
											<div class="pos_rel">
												
												<input type="text" name="dpo_number" id="dpo_number" placeholder="Port  " class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="po_number" class="floating__label tall nobold padl10  " data-content="Port  " >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											</div>
											
											
												<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
										<div class="pos_rel talc">
									 
										<input type="text" name="dzip" id="dzip" placeholder="Zip code" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="Zipcode" class="floating__label tall nobold padl10" data-content="Zip code" >
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											 
											
											<input type="text" name="dcity" id="dcity" placeholder="City, State" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="city" class="floating__label tall padl10 nobold" data-content="City, State" >
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
									</div>
									
									 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If Invoice address is same as delivery address?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 txt_777E90 ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked"  onclick="updateInvoice(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
									<div id="ShowInvoice" class="hidden ">
									
									<div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_70  padr5">   
											 <div class="pos_rel">
												
												<input type="text" name="iaddress" id="iaddress" placeholder="Street address" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="iaddress" class="floating__label tall nobold padl10" data-content="Street address" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											</div>
											 
											<div class="thr_clmn  wi_30 padl5">  
											
											 
											
										
											<div class="pos_rel">
												
												<input type="text" name="i_port_number" id="i_port_number" placeholder="Port  " class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="i_port_number" class="floating__label tall nobold padl10  " data-content="Port  " >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											</div>
											
											
												<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
										<div class="pos_rel talc">
									 
										<input type="text" name="izip" id="izip" placeholder="Zip code" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="izip" class="floating__label tall nobold padl10" data-content="Zip code" >
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											 
											
											<input type="text" name="icity" id="icity" placeholder="City, State" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="icity" class="floating__label tall padl10 nobold" data-content="City, State" >
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
									</div>
									 </div>	
									 
									 
									 <div class="on_clmn padt10">
								 
										<div class="pos_rel talc">
									 
										<input type="text" name="entry_code" id="entry_code" placeholder="Zip code" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="entry_code" class="floating__label tall nobold padl10" data-content="Entry code" >
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									 
								
									 
									</div> 
									
									 </div>
							 </div>
							 
							  
									
									<input type="hidden" id="same_name" name="same_name" value="1" />
									 <input type="hidden" id="same_invoice" name="same_invoice" value="1" />
									 
										
								<div class="red_txt fsz20 talc" id="error_msg_form"> </div>
								
							
							
						 
							 
						    <div class="clear"></div>
							<div class="padt20 xxs-talc talc padb50 mart35">
								
								<a href="#" onclick="submitform();"><button type="button" name="forward" class="bold forword minhei_55p   fsz16 padrl70 nobold" style="border-radius: 50px; background: #ffffff; color: #777E90;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;" class="changedText">Submit</font></font></button></a>
								
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
	 						