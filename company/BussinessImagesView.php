
<!doctype html>
 <?php
		$path1 = "../../html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
	if($businessDisplayInformation ['big_image_path']!=null) { $filename="../estorecss/".$businessDisplayInformation ['big_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$businessDisplayInformation ['big_image_path'].".txt"); $value_a=str_replace('"','',$value_a); } else { $value_a="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../usercontent/images/default-profile-pic.jpg";
if($businessDisplayInformation ['small_image1_path']!=null) { $filename="../estorecss/".$businessDisplayInformation ['small_image1_path'].".txt"; if (file_exists($filename)) { $value_a1=file_get_contents("../estorecss/".$businessDisplayInformation ['small_image1_path'].".txt"); $value_a1=str_replace('"','',$value_a1); } else { $value_a1="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a1="../../usercontent/images/default-profile-pic.jpg";

if($businessDisplayInformation ['small_image2_path']!=null) { $filename="../estorecss/".$businessDisplayInformation ['small_image2_path'].".txt"; if (file_exists($filename)) { $value_a2=file_get_contents("../estorecss/".$businessDisplayInformation ['small_image2_path'].".txt"); $value_a2=str_replace('"','',$value_a2); } else { $value_a2="../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a2="../../usercontent/images/default-profile-pic.jpg";
	 if($bussinessType==1) { $url= '../../../Eshop/serviceInformation/'.$data['cid']; } else if($bussinessType==2) { $url= '../../../HotelStay/roomsList/'.$data['cid'].'/'.$data['bid']; } else if($bussinessType==3) { $url= '../../../Resturant/editResturantInformation/'.$data['cid'].'/'.$data['bid']; } else if($bussinessType==4) { $url= '../../../Wellness/editWellnessInformation/'.$data['cid'].'/'.$data['bid']; } ?>
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
		function encodeImageFileAsURL(id,$link) {

    var filesSelected =  $link.files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];

      var fileReader = new FileReader();

      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <--- data: base64
//alert(srcData); return false;
       // var newImage = document.createElement('img');
        //newImage.src = srcData;

       // $("#image-data"+id+"1").val(newImage.outerHTML);
        
       $('#image-data'+id+"1").closest('.imgwrap').find('.cropped_image')
							.addClass('cropped_image_added')
							.css('background-image', 'url(' + srcData + ')');
							$('#image-data'+id).attr('style','background-image: url(' + srcData + ')');
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }
  
  function selectInfo(id)
  {
	  if($('#variation_type').val()<2)
	  {
		  $('#txtInfo').addClass('hidden');
	  }
	  else
	  {
		 $('#txtInfo').removeClass('hidden');  
	  }
  }
  
  
   function selectPromotionalInfo(id)
  {
	  if($('#promotion_type').val()==0)
	  {
		  $('#promotionInfo').addClass('hidden');
		  $('#promotional_txt').val('');
	  }
	  else
	  {
		 $('#promotionInfo').removeClass('hidden');  
	  }
  }
		function submitform()
		{ 
		$('#errorMsg1').html('');
			var bg_url = $('#image-data1').css('background-image');
				$('#image-data11').val(bg_url);
			var bg_url = $('#image-data2').css('background-image');
				$('#image-data21').val(bg_url); 
			var bg_url = $('#image-data3').css('background-image');
				$('#image-data31').val(bg_url);
				if($('#variation_type').val()==2)
				  {
					  if($('#free_txt').val()=='' || $('#free_txt').val()==null)
					  {
						$('#errorMsg1').html('Please enter text to display');
						return false;						
					  }
				  }
				  if($('#promotion_type').val()==1)
				  {
					  if($('#promotional_txt').val()=='' || $('#promotional_txt').val()==null)
					  {
						$('#errorMsg1').html('Please enter promotional text to display');
						return false;						
					  }
				  }
				  
			document.getElementById('save_indexing').submit();
			}
		
		</script>
	 </head>

	<body>
	<div class="column_m header   bs_bb   hidden-xs hidden-xsi">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p  " style="padding: 10px 0px 0px 0px;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="<?php echo $url; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
					<div class="top_menu talc    wi_60i " style="padding-top:8px;">
				<ul class="menulist sf-menu  fsz25  bold wi_100">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="black_txt pred_txt_h ffamily_avenir nobold">Add Images</span></a>
					</li>
				 	 
       			 	</ul>
			</div>
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 	<div class="wi_240p fleft pos_rel zi50 hidden">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" >
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" >
								
								 
								<ul class="dblock marr20 padt250 padl10 fsz18">
								
								<li class="dblock padrb10   ">
						<a href="../../../Eshop/aboutInformation/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space"  >About</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li> 
											<li class="dblock padrb10">
						<a href="https://www.qloudid.com/public/index.php/Eshop/itemInformation/<?php echo $data['cid']; ?>" target="_blank" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >E-shop </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
							<li class="dblock padrb10 first">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10   brdb_black black_txt  padb10"> <span class="valm trn ltr_space">Brand E-shop </span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
											</a></li>
						<li class="dblock padrb10 padt5">
						<a href="../../../Eshop/categories/<?php echo $data['cid']; ?>" target="_blank" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Categories</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
											 		
												 
											</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					 
							
							<form action="../../addImages/<?php echo $data['cid']; ?>/<?php  echo $data['bid']; ?>/<?php  echo $data['btype']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											<div class="on_clmn mart20 brdb">
											<input type="text" value="Big image" class="wi_100 rbrdr pad10 padb0   talc  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white " data-width="300" data-height="300">
										<input type="hidden" name="image-data11" id="image-data11" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  ">
											<div class="cropped_image   grey_brd5  " style="background-image: <?php echo $value_a; ?>;" id="image-data1" name="image-data1"></div>
											<div class="subimg_load">
												<a href="#" class="load_button_image1" style="background: #FFF;color: #999; display:none;"  >Change</a>
												<input type="file"  class="hidden image-to-upload" onchange="encodeImageFileAsURL(1,this);"/>
												 
											</div>
										</div>
									</div>
								
								 
							</div>
						</div>
											 
								 <div class="on_clmn  mart20  brdb marb35">	
									<div class="thr_clmn  wi_50 padr10">
											 <input type="text" value="Small image 1" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										<div class="pos_rel talc">
									
										<div class="wi_100 xxs-wi_100    ">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white "  data-width="300" data-height="300">
										<input type="hidden" name="image-data21" id="image-data21" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  ">
											<div class="cropped_image   grey_brd5  " style="background-image:<?php echo $value_a1; ?>;" id="image-data2" name="image-data2"></div>
											<div class="subimg_load">
												<a href="#" class="load_button_image1" style="background: #FFF;color: #999; display:none;"  >Change</a>
												<input type="file"  class="hidden image-to-upload" onchange="encodeImageFileAsURL(2,this);"/>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
										 
									</div>
									</div>
										<div class="thr_clmn  wi_50 padl10"  >
										 <input type="text" value="Small image 2" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
								<div class="pos_rel">											
										<div class="wi_100 xxs-wi_100   ">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data31" id="image-data31" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd  ">
											<div class="cropped_image   grey_brd5  " style="background-image: <?php echo $value_a2; ?>;" id="image-data3" name="image-data3"></div>
											<div class="subimg_load">
												<a href="#" class="load_button_image1" style="background: #FFF;color: #999; display:none;"  >Change</a>
												<input type="file"  class="hidden image-to-upload" onchange="encodeImageFileAsURL(3,this);"/>
												 
											</div>
										</div>
									</div>
								
								 
							</div>
											</div>
											</div>
											 
									 

										</div>	 
										
										 <div class="on_clmn  mart20  brdb">	
									 
										<div class="pos_rel">
											 
											
											<select  id="show_footer" name="show_footer"   class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onchange="selectInfo(this.value);"> 
											 
													 
														
														
														<option value="1" class="lgtgrey2_bg" <?php if($businessDisplayInformation['show_footer']==1) echo 'selected'; ?> >Yes</option>
														<option value="0" class="lgtgrey2_bg" <?php if($businessDisplayInformation['show_footer']==0) echo 'selected'; ?> >No</option>
													 
											</select>
												 <label for="id_number" id="ladelId"  class="floating__label tall padl0 nobold" data-content=" If you want to display footer?" >
											<span class="hidden--visually">
											  If you want to display footer?</span></label> 
										</div>
											 
									 

										</div>
					
						 <div class="on_clmn  mart20  brdb">	
									 
										<div class="pos_rel">
											 
											
											<select  id="variation_type" name="variation_type"   class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onchange="selectInfo(this.value);"> 
											 
													 
														
														<option value="0" class="lgtgrey2_bg" <?php if($businessDisplayInformation['heading_type']==0) echo 'selected'; ?> >Company name</option>
														<option value="1" class="lgtgrey2_bg" <?php if($businessDisplayInformation['heading_type']==1) echo 'selected'; ?> >Company logo</option>
														<option value="2" class="lgtgrey2_bg" <?php if($businessDisplayInformation['heading_type']==2) echo 'selected'; ?> >Free text</option>
													 
											</select>
												 <label for="id_number" id="ladelId"  class="floating__label tall padl0 nobold" data-content="What you want to display as heading?" >
											<span class="hidden--visually">
											  What you want to display as heading?</span></label> 
										</div>
											 
									 

										</div>
										
										
										<div class="on_clmn mart20 <?php if($businessDisplayInformation['heading_type']==2) echo ''; else echo 'hidden'; ?>" id="txtInfo">
											 
											<div class="pos_rel">
												
												<input type="text" name="free_txt" id="free_txt"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" value="<?php if($businessDisplayInformation['heading_type']==2) echo $businessDisplayInformation['free_text']; ?>" > 
												 <label for="free_txt" class="floating__label tall nobold padl10" data-content="Text to display">
											<span class="hidden--visually">
											 Text to display</span></label> 
												
											 
											</div>
											 
											</div>
										
										
									 <div class="on_clmn  mart20  brdb">	
									 
										<div class="pos_rel">
											 
											
											<select  id="promotion_type" name="promotion_type"   class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onchange="selectPromotionalInfo(this.value);"> 
											 
													 
														
														<option value="1" class="lgtgrey2_bg" <?php if($businessDisplayInformation['promotion_type']==1) echo 'selected'; ?> >Yes</option>
														<option value="0" class="lgtgrey2_bg" <?php if($businessDisplayInformation['promotion_type']==0) echo 'selected'; ?> >No</option>
														 
													 
											</select>
												 <label for="id_number" id="ladelId"  class="floating__label tall padl0 nobold" data-content="Do you want to display promotional header?" >
											<span class="hidden--visually">
											  Do you want to display promotional header?</span></label> 
										</div>
											 
									 

										</div>
										
										
										<div class="on_clmn mart20 <?php if($businessDisplayInformation['promotion_type']==1) echo ''; else echo 'hidden'; ?>" id="promotionInfo">
											 
											<div class="pos_rel">
												
												<input type="text" name="promotional_txt" id="promotional_txt"  class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" value="<?php if($businessDisplayInformation['promotion_type']==1) echo $businessDisplayInformation['promotional_txt']; ?>" > 
												 <label for="free_txt" class="floating__label tall nobold padl10" data-content="Promotional text">
											<span class="hidden--visually">
											Promotional text</span></label> 
												
											 
											</div>
											 
											</div>
											
										
										
										
					  <div class="clear"></div>
	 
	  
									  
										 <div class="clear"></div>
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20 mart35 ffamily_avenir"> <a href="#" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Add</button></a> </div>
							
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
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/customFileUpload.js"></script>
 
	</body>
</html>
