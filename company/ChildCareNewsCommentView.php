<?php
 
	$path1 = $path."usercontent/images/"; 
	 
?>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	<script>
	var value_ind=0;
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
			$('#errorMsg1').html('');
			if($("#post_title").val()=="" || $("#post_title").val()==null)
			{
				$('#errorMsg1').html('please enter comment');
				return false;
			}
			var total_img=parseInt($('#indexing_save').val());
			if($('#image_data'+total_img).val()=="")
			{
				total_img=total_img-1;
				$('#indexing_save').val(total_img);
			}
			document.getElementById('post_comment').submit();
		}
		
		function showPic(id,link)
		{
			 var filePath= this.files[0].mozFullPath; 
			 alert(filePath);
			var imgs='<img src="'+id+'" width="28" height="28" />';
			$('#imagesUp').append(imgs);
		}
		function imgchange(f) {
           $("#imgs").attr('src',URL.createObjectURL(f.target.files[0]));         
        }
				
			</script>
			
			
		</head>
		
	</head>
	<body class="white_bg">
		<?php $path1 = $path."html/usercontent/images/"; ?>
		 <?php include 'CompanyDayCareHeader.php'; ?>
		<div class="clear" id=""></div>
		
		<div class="column_m pos_rel">
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0">
						
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz60 bold padb10 black_txt trn">Inlägg</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn">Här kan du skriva och visa bilder.</a></div>
						<div class="container padrl0 xs-padrl0">
							
							
							<form action="../postChildNewsComment/<?php echo $data['cid']; ?>" method="POST" id="post_comment" name="post_comment" accept-charset="ISO-8859-1">
								
								<div class="popup-content padb0 xs-padb0">
									
									<div class="padb0 xs-padrl10">
									<div class="on_clmn mart10 xxs-mart10">
										
											<div class="wi_100  bs_bb padrl5 padb10 padt5"><div class="wi_100 dflex alit_c"><input type="text" name="post_title" id="post_title" class="txtind10 fsz18 xs-fsz16 brdb brdrad3 wi_100  required minhei_65p nobrd talc black_txt" placeholder="What's on your mind today" ></div></div>
											
											
											
											
										</div>
										
										<div class="on_clmn mart10 xxs-mart10 marb30 marrl30 xs-marrl0" id="imagesUp" style="display:none;">

										<img src="<?php echo $path1; ?>default-profile-pic.jpg" id="imgs1" name="imgs1" width="100" height="100"   class="fleft" />
										 
										
										</div>
										
									<div class="on_clmn mart10 xxs-mart10">
									<div class="thr_clmn  wi_40 padr10"  >
										<div class="pos_rel">
										 
										<a href="#" onclick="submitform();"><input type="button" value="Lägg till" class="forword "  ></a>
										 
										</div>
										</div>
										<div class="thr_clmn  wi_60 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 dflex alit_c">
											
											<label class="forword ">
												Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
											</div>
											
										</div>
										  
     
</body>
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		
		$('#imagesUp').attr('style','display:block;');
		value_ind=$('#indexing_save').val();
		reader.onload = function (e) {
            $('#imgs'+value_ind)
                .attr('src', e.target.result)
                .width(100)
                .height(100);
				 
				$('#image_data'+value_ind).val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }
	$("#file1").val('');
	
	var total_img=parseInt($('#indexing_save').val())+1;
	$('#indexing_save').val(total_img);
	var newImg='<img src="<?php echo $path1; ?>default-profile-pic.jpg" id="imgs'+total_img+'" name="imgs'+total_img+'" width="100" height="100"  class="fleft"/> ';
	var mData='<input type="hidden" id="image_data'+total_img+'" name="image_data'+total_img+'" />';
	$('#imagesUp').append(newImg);
	$('#more_data').append(mData);
}

function moreImages()
{
	var total_img=parseInt($('#indexing_save').val());
	if($('#image_data'+total_img).val()=="")
	{
		alert('please select image first'); return false;
	}
	$("#file1").val();
	var total_img=parseInt($('#indexing_save').val())+1;
	$('#indexing_save').val(total_img);
	var newImg='<img src="<?php echo $path1; ?>default-profile-pic.jpg" id="imgs'+total_img+'" name="imgs'+total_img+'" class="mart20" width="100" height="100" />';
	var mData='<input type="hidden" id="image_data'+total_img+'" name="image_data'+total_img+'" />';
	$('#imagesUp').append(newImg);
	$('#more_data').append(mData);
}
</script>
										
										
										
									</div>
									
								</div>
								
								<input type="hidden" id="image_data1" name="image_data1" />
								<div id="more_data"></div>
								<input type="hidden" id="indexing_save" name="indexing_save" value="1" />
								<div class="red_txt bold fsz16 talc" id="errorMsg1"> </div>
							</form>
						
						<div class="talc  "> 
										
									
									</div>
									
									<div class="talc mart20" id="moreImg" style="display:none;"> <a href="#" onclick="moreImages();"><input type="button" value="More Image" class="forword minhei_55p"  ></a>
										
									
									</div>
						
					</div>
				</div>
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
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