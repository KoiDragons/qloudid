<!doctype html>
<html class="home">
	<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="https://www.hellobliss.net/html/usercontent/images/favicon.ico">
		<title>Qloudid</title>
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
			submitFlag=1;
			$("#errorMsg1").html('');
			 
			 if($("#id_number").val()==null || $("#id_number").val()=="")
			{
				
				$("#id_number").removeClass('brdb_new');
				$("#id_number").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			 if($("#id_number").val().length<9 || $("#id_number").val().length>9) 
				{
					$("#errorMsg1").html('DUNS number must be nine digit');
					return false;
				}
			var send_data={};
				 send_data.variation_id=$('#id_number').val();
				 $.ajax({
							type:"POST",
							url:"../checkUsedDuns/<?php echo $data['cid']; ?>",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 
								if(data1==1)
								{
									document.getElementById('save_indexing').submit();	 
								}
								else
								{
									
								$("#errorMsg1").html('This DUNS ID has been used by another company. Please try using another ID'); 
										
								submitFlag=0;
									
								return false;
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
				
				 
	</script>
</head>

	<body>
	<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../ReceivedChild/verifyRequests/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../ReceivedChild/verifyRequests/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn">Verify</h1>
									</div>
								 
							<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please add your Duns number.</a></div>
							<form action="../addDuns/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								 
											
									 
										<div class="on_clmn   mart20  ">
											 
												 
											
											 
											<div class="pos_rel">
											 
											
											<input type="text" name="id_number" id="id_number"   placeholder="Duns number" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25"  /> 
												 <label for="id_number" id="ladelId"  class="floating__label tall padl0 nobold" data-content="Duns number" >
											<span class="hidden--visually">
											  Duns number</span></label> 
										</div>
									 
									 
											 
											</div>
										
										 
									 
									 
						
						   <div class="clear"></div>
	 
	 				 


	 	 

										 
								<div class="red_txt fsz20 talc padtb20" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padtb20  ffamily_avenir" id="submitButton"> <a href="#" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  >Add</button></a> </div>
					 		
						</div>
						</div>
						
					</div> 
		 
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="https://www.hellobliss.net/html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/modules.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/custom.js"></script>

	</body>
</html>
