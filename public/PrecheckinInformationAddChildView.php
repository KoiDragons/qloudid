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
								submitFlag=1;
								var todayDate="<?php echo date('d'); ?>";
								var issueM="<?php echo date('m'); ?>";
								var issueY="<?php echo date('Y'); ?>";
								var expiryM="<?php echo date('m'); ?>";
								var expiryY="<?php echo date('Y'); ?>";
								var currentMonths='<?php echo $dobMonthCurrentYear; ?>';
								var oldMonths='<?php echo $dobMonthOldYear; ?>';
								function updateMonths(id)
								{
								 
									if(id==issueY)
									{
										$("#dob_month").html(currentMonths);
									}
									else
									{
										$("#dob_month").html(oldMonths);
									}
								}
								
								function updateDays(id)
								{
									
								var tDays=new Date($("#dob_year").val(), id, 0).getDate();
								 if($("#dob_year").val()==issueY && id==issueM)
								 {
									tDays=todayDate;
								 }
								var allDays='';
								for(i=1;i<=tDays;i++)
								{
									allDays=allDays+'<option value="'+i+'" class="lgtgrey2_bg" >'+i+'</option>';
								}
								$("#dob_day").html(allDays);
								}
								
								
								function submitform()
										{
										$("#error_msg_form").html('');
										
										if($("#dp_type").val()=="0")
										{
										
										$("#error_msg_form").html('Please select dependent type');
										return false;
										}
										if($('#image-data1').val()=='' || $('#image-data1').val()==null)
										{
										$("#error_msg_form").html('Please select profile image');
										return false;	
										}
										if($("#fname").val()=="" || $("#fname").val()==null)
										{
										
										$("#error_msg_form").html('Please enter first name');
										return false;
										}
										if($("#lname").val()=="" || $("#lname").val()==null)
										{
										
										$("#error_msg_form").html('Please enter last name');
										return false;
										}
										 
										
										if($("#is_address_same").val()==0)
										{
										if($("#child_address").val()=="" || $("#child_address").val()==null)
										{
										
										$("#error_msg_form").html('Please enter address');
										return false;
										}	
										if($("#child_port_number").val()=="" || $("#child_port_number").val()==null)
										{
										
										$("#error_msg_form").html('Please enter port number');
										return false;
										}	
										if($("#child_city").val()=="" || $("#child_city").val()==null)
										{
										
										$("#error_msg_form").html('Please enter city');
										return false;
										}	
										
										if($("#child_zipcode").val()=="" || $("#child_zipcode").val()==null)
										{
										
										$("#error_msg_form").html('Please enter zipcode');
										return false;
										}	
										}
										document.getElementById('save_indexing').submit();
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
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_70 xxs-lgn_hight_50 padb0 white_txt trn ffamily_avenir changedText">Child</h1>
									</div>
									<div class=" xxs-tall talc xs-padb20 padb35 ffamily_avenir"> <a href="#" class="txt_777E90 fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_30 changedText">Please provide your child detail below</a></div>
									
								 
								 
									
							<form action="../addDependentInformation/<?php echo $data['hotel_checkin_id']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
							
								 
								 
								<div class="marb0   padtrl0 bg_212b3a">
								 
								 
								 
									
							 	 
								 
								<div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt35">
								<a href="#profile3" class="expander-toggler white_txt xs-fsz16 tall bg_2F3C4F padrl30 padtb10 brdrad5 active">Basic Details 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile3" class=" " style="display:block;">	
											 
						 
											 <div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_50  padr5">   
											 <div class="pos_rel">
												
												<input type="text" name="fname" id="fname" placeholder="Street address" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="fname" class="floating__label tall nobold padl10" data-content="First name" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											</div>
											 
											<div class="thr_clmn  wi_50 padl5">  
											
											 
											
										
											<div class="pos_rel">
												
												<input type="text" name="lname" id="lname" placeholder="Port  " class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="lname" class="floating__label tall nobold padl10  " data-content="Last name" >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											</div>
																 			
							 				<div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_40  padr5">   
											 <div class="pos_rel">
												
												<select id="dob_year" name="dob_year" class="wi_100 bg_2F3C4F nobrd padt25 tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir" onchange='updateMonths(this.value);' >
                                
														<?php echo $dobYears; ?> 
												</select>
							  <label for="dob_year" class="floating__label tall nobold padl10" data-content="Year">
											<span class="hidden--visually">
											  Issue year</span></label>
												</div> 
											 
											</div>
											 
											<div class="thr_clmn  wi_30 padl5 padr5">  
											
											 
											
										
											<div class="pos_rel">
												
												<select id="dob_month" name="dob_month" class="wi_100 bg_2F3C4F nobrd padt25 tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir" onchange='updateDays(this.value);' >
                                
														<?php echo $dobMonthCurrentYear; ?> 
												</select>
											<label for="dob_month" class="floating__label tall nobold padl10" data-content="Month">
											<span class="hidden--visually">
											  Issue year</span></label>
												</div>
											 </div>
											 
											 <div class="thr_clmn  wi_30 padl5  ">  
											
											 
											
										
											<div class="pos_rel">
												
												<select id="dob_day" name="dob_day" class="wi_100 bg_2F3C4F nobrd padt25 tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir" >
                                
														<option value="1" class="lgtgrey2_bg">1</option>
											   <option value="2" class="lgtgrey2_bg">2</option>
											   <option value="3" class="lgtgrey2_bg">3</option>
											   <option value="4" class="lgtgrey2_bg">4</option>
											   <option value="5" class="lgtgrey2_bg">5</option>
											   <option value="6" class="lgtgrey2_bg">6</option>
											   <option value="7" class="lgtgrey2_bg">7</option>
											   <option value="8" class="lgtgrey2_bg">8</option>
											   <option value="9" class="lgtgrey2_bg">9</option>
											   <option value="10" class="lgtgrey2_bg">10</option>
											   <option value="11" class="lgtgrey2_bg">11</option>
											   <option value="12" class="lgtgrey2_bg">12</option>
											   <option value="13" class="lgtgrey2_bg">13</option>
											   <option value="14" class="lgtgrey2_bg">14</option>
											   <option value="15" class="lgtgrey2_bg">15</option>
											   <option value="16" class="lgtgrey2_bg">16</option>
											   <option value="17" class="lgtgrey2_bg">17</option>
											   <option value="18" class="lgtgrey2_bg">18</option>
											   <option value="19" class="lgtgrey2_bg">19</option>
											   <option value="20" class="lgtgrey2_bg">20</option>
											   <option value="21" class="lgtgrey2_bg">21</option>
											   <option value="22" class="lgtgrey2_bg">22</option>
											   <option value="23" class="lgtgrey2_bg">23</option>
											   <option value="24" class="lgtgrey2_bg">24</option>
											   <option value="25" class="lgtgrey2_bg">25</option>
											   <option value="26" class="lgtgrey2_bg">26</option>
											   <option value="27" class="lgtgrey2_bg">27</option>
											   <option value="28" class="lgtgrey2_bg">28</option>
											   <option value="29" class="lgtgrey2_bg">29</option>
											   <option value="30" class="lgtgrey2_bg">30</option>
											   <option value="31" class="lgtgrey2_bg">31</option>
												</select>
												 <label for="dob_day" class="floating__label tall nobold padl10  " data-content="Day" >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											</div>					 
					<input type="hidden" id="d_country" name="d_country" value="<?php echo $userSummary['country_of_residence']; ?>" />
										 <div class="on_clmn    brdb">
										  <div class="thr_clmn  wi_75 ">
											 <div class="pos_rel talc">
												<input type="text" value="Does child share same address as you?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 txt_777E90 ffamily_avenir" readonly="">
											 </div>
										  </div>
										  <div class="thr_clmn  wi_25">
											 <div class="pos_rel">
												<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  ">
												   <div class="boolean-control boolean-control-small boolean-control-green fright checked" onclick="updateInvoice();">
													  <input type="checkbox" class="default" data-true="" data-false="">
												   </div>
												</div>
											 </div>
										  </div>
									   </div>
									   
									   
									   <div id="ShowInvoice" class="hidden ">
									
									<div class="on_clmn padt10"> 
											<div class="thr_clmn  wi_70  padr5">   
											 <div class="pos_rel">
												
												<input type="text" name="child_address" id="child_address" placeholder="Street address" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="child_address" class="floating__label tall nobold padl10" data-content="Street address" >
											<span class="hidden--visually">
											 Street address</span></label>
												</div> 
											 
											</div>
											 
											<div class="thr_clmn  wi_30 padl5">  
											
											 
											
										
											<div class="pos_rel">
												
												<input type="text" name="child_port_number" id="child_port_number" placeholder="Port  " class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="child_port_number" class="floating__label tall nobold padl10  " data-content="Port " >
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 </div>
											</div>
											
											
												<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_40 padr5"> 
											 
										<div class="pos_rel talc">
									 
										<input type="text" name="child_zipcode" id="child_zipcode" placeholder="Zip code" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="child_zipcode" class="floating__label tall nobold padl10" data-content="Zip code" >
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div> 
									
									<div class="thr_clmn  wi_60 padl5"> 
											<div class="pos_rel">
											 
											
											<input type="text" name="child_city" id="child_city" placeholder="City, State" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" > 
												 <label for="child_city" class="floating__label tall padl10 nobold" data-content="City, State" >
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
									</div>
									 </div>	
									 
									 
                     						
					 <div class="clear"></div>
                      
                    					
									
										</div>
									  	
									<div class="clear"></div>
											 <div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt35">
								<a href="#profile4" class="expander-toggler white_txt xs-fsz16 tall bg_2F3C4F padrl30 padtb10 brdrad5 active">Photo
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt"></span><span class="dark_grey_txt dnone diblock_pa fa fa-chevron-up padr15 fright"></span></a></div>
								<div id="profile4" class=" " style="display:none;">	
								
								
								<div class="on_clmn mart10 ">
								 
								<div class="wi_50 xxs-wi_100  ">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="" class="hidden-image-data" />
										 
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: " id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								
								 
							</div>
						 
						 
						 
								 
						</div>	
						<div class="on_clmn mart10 ">
									<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 talc">
											
											<label class="forword " style="border-radius: 50px; background: #ffffff; color: #777E90;">
												  Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
										</div>
										 
										</div>
										<div class="clear"></div>
										 	
					 			
										</div>
										
										
										  <input type='hidden' id='is_ssn_available' name='is_ssn_available' value='0' />
										<input type="hidden" id="indexing_save" name="indexing_save">
										
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
	 						