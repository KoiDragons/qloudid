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
		<link rel="stylesheet" type="text/css" media="all" href="https://account.travelnest.com/d566fde/assets/main.css?%20[sm]" />
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<?php $path1 = $path."html/usercontent/images/"; ?>
	<script>
	 function updateDayopen(id,link)
	   {
		   dayValue=id;
		   foodValue=0;
	   }
	   
	 function submitform()
		{
			$('#errorMsg').html('');
			if($('#day1').val()==0 && $('#day2').val()==0)	
			{
			$('#errorMsg').html('Please select atleast one quite hr info');
			return false;			
			}
			
			document.getElementById('save_indexing').submit();
		
		} 
	 function updateDescription()
		{
			$('#errorMsg').html('');
			propertyUpdate=$('#propertyUpdate').val();
			id=$('textarea#description-textarea').val();
			
			$('#wordCount').html(id.length);
				var send_data={};
				 send_data.propertyNickname=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../../updateAmenityDescription/<?php echo $data['aid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								propertyUpdate=id;
								  
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
				
			</script>
			
			
		
	</head>
	<body class="white_bg">
	 
		 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg">
            <div class="fleft padrl0 bg_babdbc padtbz10">
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="../../../checkAmenityInfo/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
                     </li>
                  </ul>
               </div>
            </div>
			 
			  
            <div class="clear"></div>
         </div>
      </div>
		
		 	 
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../../checkAmenityInfo/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="#" class="lgn_hight_s1 fsz25"><span class="fa fa-bars black_txt" aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
				</div>
			  
            <div class="clear"></div>
         </div>
      </div>
		 
	 
		
	<div class="clear"></div>
	<script type="text/javascript">
function readURL(input) {
	var totalfiles=input.files.length;
	for(i=0; i<totalfiles; i++)
	{
	if (input.files && input.files[i]) {
        var reader = new FileReader();
		
		reader.onload = function (e) {
			
			 
			var send_data={};
				 send_data.update_info=e.target.result;
				 
				 $.ajax({
							type:"POST",
							url:"../../../updateAmenityPhotos/<?php echo $data['aid']; ?> ",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
							 getPhoto(); 
							  
							}
						});	
             
             
        };	
	}
    
		 
	
        reader.readAsDataURL(input.files[i]);
    }
	
}



function getImageInfo(id)
{
				var send_data={};
				 send_data.update_info=id;
				  
				 $.ajax({
							type:"POST",
							url:"../../../getAmenityImageInfo/<?php echo $data['aid']; ?> ",
							 data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.lightbox__img-content').html('');
								 $('.lightbox__img-content').html(data1);
							}
						});	
}

function getPhoto()
{
				  
				 $.ajax({
							type:"POST",
							url:"../../../getAmenityPhoto/<?php echo $data['aid']; ?> ",
							 
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.photo-wall__tiles').html('');
								 $('.photo-wall__tiles').html(data1);
							}
						});	
}

function updatePhotoDecrement(id)
{
				 var send_data={};
				 send_data.photoId=id;
				 send_data.addDelete=-1;
				 $.ajax({
							type:"POST",
							url:"../../../updateAmenityPhotoOrder/<?php echo $data['aid']; ?> ",
							 data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.photo-wall__tiles').html('');
								 $('.photo-wall__tiles').html(data1);
							}
						});	
}

function updatePhotoOrderIncreament(id)
{
				 var send_data={};
				 send_data.photoId=id;
				 send_data.addDelete=1;
				 $.ajax({
							type:"POST",
							url:"../../../updateAmenityPhotoOrder/<?php echo $data['aid']; ?> ",
							data:send_data, 
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.photo-wall__tiles').html('');
								 $('.photo-wall__tiles').html(data1);
							}
						});	
}
function deletePhoto(id)
{
				 var send_data={};
				 send_data.photoId=id;
				 
				 $.ajax({
							type:"POST",
							url:"../../../deleteAmenityPhoto/<?php echo $data['aid']; ?> ",
							data:send_data, 
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.photo-wall__tiles').html('');
								 $('.photo-wall__tiles').html(data1);
							}
						});	
}
var draggedItem=0;
var draggedTarget=0;
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev,id) {
  ev.dataTransfer.setData("text", ev.target.id);
  draggedItem=id; 
}

function drop(ev) {
	draggedTarget=ev.target.id;
	 
  ev.preventDefault();
  //var data = ev.dataTransfer.getData("text");
  //ev.target.appendChild(document.getElementById(data));
  
   var send_data={};
				 send_data.draggedItem=draggedItem;
				  send_data.draggedTarget=draggedTarget;
				 $.ajax({
							type:"POST",
							url:"../../../updateAmenityPhotoDragging/<?php echo $data['aid']; ?> ",
							data:send_data, 
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('.photo-wall__tiles').html('');
								 $('.photo-wall__tiles').html(data1);
							}
						});	
}
 
</script>
			<!-- CONTENT -->
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10   trn ffamily_avenir" >Amenity</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir black_txt fsz25  xs-fsz20"> Please add description and photos</div>
			 
					 <div class="on_clmn marb5">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Review description and photos" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div>
									 
									 <div class="css-11wamwp tall">
								   <hr class="css-1fky4oj">
								   
								   <div class="css-ahy16g">
									  <div data-testid="description-page">
										 <div class="css-zp5g9l marrl0">
											<p class="paragraph--b1 paragraph--full css-1680uhd">The description tells guests all about the key features of your amenities. We need a full description so the guest can understand how this work.</p>
											
											
											
											
											<label for="description-textarea" class="css-14q70q0 mart20 bold">Description</label>
											<div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
											<div data-testid="description-textarea-wrapper" class="css-16i74gt">
												<textarea id="description-textarea" data-testid="description-textarea" name="description" minlength="400" maxlength="9000" class="css-13k0qhz" onkeyup="updateDescription();"><?php echo $communitySelectedAmenitiesInfo['amenity_description']; ?></textarea></div>
											<div id="spacer" spacing="smaller" class="css-ihl6nu"></div>
											<div data-testid="description-character-length-text" class="css-ev078v">(minimum 400) <span id="wordCount">654</span>/9000</div>
										 </div>
									  </div>
								   </div>
								</div>
								
								<div class="clear"></div>
									<div class="column_m container      fsz14 dark_grey_txt      ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padt15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Opening hours</span>
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt ">Opening hours are a specific time when the amenity is available to use for all the owners/guest of the society.</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									
									
											 
									</div>
									<div class="clear"></div>
									 <form action="../../../updateSocietyAmenityHrs/<?php echo $data['cid']; ?>/<?php echo $data['sid']; ?>/<?php echo $data['aid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
									 
								 		
											 
											 
										 <div class="container column_m lgtgrey2_bg   padrl20 " id="food_1">
										 
										 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_50">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Open during" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										 
									</div>
									</div>
										 
											 
											<div class="thr_clmn  wi_25  padl30  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="amenity_open_month" id="amenity_open_month"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												<?php 
												for($n=1;$n<=12;$n++) 
												{
												?> 
											<option value="<?php echo $n; ?>" <?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_open_month']==$n) echo 'selected'; } ?> ><?php echo  date("F", mktime(0, 0, 0, $n, 10)); ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
													<select name="amenity_close_month" id="amenity_close_month"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												<?php 
												for($n=1;$n<=12;$n++) 
												{
												?> 
											<option value="<?php echo $n; ?>" <?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_close_month']==$n) echo 'selected'; } ?> ><?php echo  date("F", mktime(0, 0, 0, $n, 10)); ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
										 
										
									 

										</div>
								 
										 
										 
								 <div class="on_clmn  lgtgrey2_bg brdb">
								 
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Mon-Fri" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="M-F" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_mon_fri']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_mon_fri']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_1">
											<div class="thr_clmn  wi_25  padl30  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="amenity_hrs_mon_fri_open" id="amenity_hrs_mon_fri_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg   black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
												<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_mon_fri_open']==$value['work_time']) echo 'selected'; } ?> ><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="amenity_hrs_mon_fri_close" id="amenity_hrs_mon_fri_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_mon_fri_close']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
										
									 

										</div>
								 	
									 <div class="on_clmn  lgtgrey2_bg brdb">
									<div class="thr_clmn  wi_20">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Sat-Sun" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 padr5 fsz18 black_txt ffamily_avenir hidden-xs" readonly="">
										<input type="text" value="S-S" class="wi_100 rbrdr pad10    tall  minhei_55p padl0 fsz16 black_txt ffamily_avenir visible-xs" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_30"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt13 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_sat_sun']==1) echo 'checked'; else echo ''; } ?> " onclick="updateDayopen(2,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											<div class="<?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_sat_sun']==0) echo 'hidden'; else echo ''; } else echo 'hidden'; ?>" id="day_2">
											<div class="thr_clmn  wi_25  padl30  xxs-padl40 "> 
											<div class="pos_rel">
												
												<select name="amenity_hrs_sat_sun_open" id="amenity_hrs_sat_sun_open"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl   nobrdb fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_sat_sun_open']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
											<div class="thr_clmn  wi_25  "> 
											<div class="pos_rel">
												
												<select name="amenity_hrs_sat_sun_close" id="amenity_hrs_sat_sun_close"  class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl nobrdb   fsz16  minhei_55p  trans_bg  black_txt tall padl0 ffamily_avenir" style="text-align-last:right;"> 
											<?php 
												foreach($workingHrs as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['work_time']; ?>" <?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_sat_sun_close']==$value['work_time']) echo 'selected'; } ?>><?php echo $value['work_time']; ?></option> 
												<?php } ?>
											 
											</select>
											</div>	
											 
											</div>
										</div>
											</div>
								 	
									  	
									 
								 	<input type="hidden" id="day1" name="day1" value='<?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_mon_fri']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										 <input type="hidden" id="day2" name="day2" value='<?php if(!empty($communitySelectedAmenitiesInfo)){if($communitySelectedAmenitiesInfo['amenity_hrs_sat_sun']==1) echo '1'; else echo '0'; } else echo '0'; ?>' />
										</div>
										</form>
										<div id="errorMsg" class="red_txt fsz16"> </div>
										<div class="clear"></div>
										<div class="talc padtb20 mart35 ffamily_avenir"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Update" class="forword minhei_55p t_67cff7_bg fsz18"  ></a> </div>
									
									<div class="clear"></div>
								
								
								
									<div class="on_clmn mart35">
									 
										<div class="thr_clmn  wi_60 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 dflex alit_c">
											
											<label class="forword ">
												Photo <input type="file" name="file1[]" id="file1" style="display: none;" multiple onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
											</div>
											
										</div>
										 <div class="clear"></div>
									<div class="css-1jcail2"><div data-testid="did-you-know-headline-info" class="css-1miy8fb"><img role="presentation" src="https://www.qloudid.com/html/usercontent/images/paintbrush-ladder.68ee.svg" class="css-1p436cn"><div class="css-1ai2sgr">Improve your listing with professional photos. Book your property photoshoot now.</div></div></div>	
										
						</div>
						<div class="css-hayuge  ">
										<div class="accordion__item">
													   <div class="photo-wall">
														  <div class="photo-wall__header">
															 <p class="paragraph--d1 paragraph--mid">Here you can view and edit your photos. Reorder them by <span class="mobile-hidden">dragging them into position, or</span> clicking the arrows. The first photo is the most important - guests see it in their search results.</p>
														  </div>
														  <div class="photo-wall__tiles" id="allPhotos">
															 <?php echo $displayPhotos; ?>
														  </div>
													   </div>
													</div>
							
						    </div>
					 
							
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_500p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				 
				<div class="lightbox__img-content"><a class="lightbox__img-nav false"></a><img class="lightbox__img" src="https://travelnest-property-images-production.s3.amazonaws.com/2377742/~Q07zu9lynH9/1024x768.jpg"></div>
				
				
				
				
				
				
			</div>
		</div>
		
	
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	</body>
	<?php 
		if(isset($_GET['error']))
		{
			if($_GET['error']==1)
			{
				echo '<script>alert("Some error occured while completing your request !!!")</script>';	
			}
			else if($_GET['error']==2)
			{
				echo '<script>alert("You have an active employee for the same email !!!")</script>';	
			}
		}
	?>							