<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
	
	<script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
   
function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
	function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					alert('Please provide a valid email address');
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}
			function changeCardType()
			{
				$("#card_type").val('');
			}
			function submitform()
			{
				var submit_form=true;
				$("#errorMsg1").html('');
				if($("#card_number").val()=="")
				{
				 
				$("#errorMsg1").html("please enter card number !!!");
				submit_form=false;
					return false;
				}
				
				else if(isNaN($("#card_number").val()))
				{
				 
				$("#errorMsg1").html("please enter numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				
				else if($("#card_number").val().length!=16)
				{
				 
				$("#errorMsg1").html("please enter 16 digit numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				else 
				{
					var send_data = {};
					send_data.card_number=$("#card_number").val();
				$.ajax({
					type:"POST",
					url:"../checkCard",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if(data1=='Invalid Card')
						{
							 
							$("#errorMsg1").html("please enter a valid card !!!");
							submit_form=false;
							return false;
						}
						else
						{
							$("#card_type").val(data1);
							submit_form=true;
							
							var d = new Date();
				var year = d.getFullYear();
				var month=d.getMonth();
				if($("#exp_year").val()<year)
				{
				 
				$("#errorMsg1").html("card is already expired. please enter another card !!!");
				submit_form=false;
				return false;	
					
				}
				if($("#exp_year").val()==year && $("#exp_month").val()<month)
				{
				 
				$("#errorMsg1").html("card is already expired. please enter another card !!!");
				submit_form=false;
				return false;	
					
				}
				if($("#cvv").val()=="")
				{
				 
				$("#errorMsg1").html("please enter CVV !!!");
				submit_form=false;
					return false;
				}
				if(isNaN($("#cvv").val()))
				{
				 
				$("#errorMsg1").html("please enter numeric value for CVV !!!");
				submit_form=false;
					return false;
				}
				
				if($("#cvv").val().length!=3)
				{
				 
				$("#errorMsg1").html("please enter 3 digit numeric value for CVV !!!");
				submit_form=false;
					return false;
				}
				if($("#card_name").val()=="")
				{
					 
				$("#errorMsg1").html("please enter Name of card holder !!!");
				submit_form=false;
					return false;
				}
				if(submit_form==true)
				{
				
				document.getElementById("save_indexing").submit();
				}
							
						}
						
					}
				});
				}
				
			}
			
			function submit_form_connect()
			{
				
				$("#save_info_connect").submit();
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
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
</script>	
	
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg" >
		<div class="column_m header   bs_bb   hidden-xs">
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
	<!-- /menu -->
	
	  <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_550p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz60  padb10 black_txt trn">Kort</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Registrera dina kort för bevakning ifall ditt ID blir kapad eller ifall du vill genomföra betalning.</a></div>
				  
								 
									<form action="../saveCardDetails/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
									
									<div class="on_clmn mart10 xxs-mart10">
										<input type="text" name="card_number" id="card_number" placeholder="Your card number" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" onchange="changeCardType();">
									</div>
									
									
									
									<div class="on_clmn  mart20" >
											<div class="thr_clmn wi_33 padr5">

												<div class="pos_rel">
											<select class="input1 minhei_65p fsz16 nobrd brdb trans_bg nobold dropdown-bg  llgrey_txt tall padl0" name="exp_month" id="exp_month" style="text-align-last:center;">
												<option value="01" class="lgtgrey2_bg">Jan</option>
												<option value="02" class="lgtgrey2_bg">Feb</option>	
												<option value="03" class="lgtgrey2_bg">March</option>
												<option value="04" class="lgtgrey2_bg">April</option>
												<option value="05" class="lgtgrey2_bg">May</option>
												<option value="06" class="lgtgrey2_bg">June</option>
												<option value="07" class="lgtgrey2_bg">July</option>
												<option value="08" class="lgtgrey2_bg">Aug</option>
												<option value="09" class="lgtgrey2_bg">Sep</option>
												<option value="10" class="lgtgrey2_bg">Oct</option>
												<option value="11" class="lgtgrey2_bg">Nov</option>
												<option value="12" class="lgtgrey2_bg">Dec</option>
											</select>
										
								
										</div>
									</div>
										
										<div class="thr_clmn wi_33 padr5">

												<div class="pos_rel">
											<select class="input1 minhei_65p fsz16 nobrd brdb trans_bg nobold dropdown-bg  llgrey_txt tall padl0" name="exp_year" id="exp_year" style="text-align-last:center;">
												<option value="2019" class="lgtgrey2_bg">2019</option>
												<option value="2020" class="lgtgrey2_bg">2020</option>	
												<option value="2021" class="lgtgrey2_bg">2021</option>
												<option value="2022" class="lgtgrey2_bg">2022</option>
												<option value="2023" class="lgtgrey2_bg">2023</option>
												<option value="2024" class="lgtgrey2_bg">2024</option>
												<option value="2025" class="lgtgrey2_bg">2025</option>
												<option value="2026" class="lgtgrey2_bg">2026</option>
												<option value="2027" class="lgtgrey2_bg">2027</option>
												<option value="2028" class="lgtgrey2_bg">2028</option>
												<option value="2029" class="lgtgrey2_bg">2029</option>
												<option value="2030" class="lgtgrey2_bg">2030</option>
											</select>
										</div>
											</div>
										<div class="thr_clmn wi_33">

												<div class="pos_rel">
										<input type="number" name="cvv" id="cvv" placeholder="CVV" class=" wi_100 rbrdr pad10  brdb talc  minhei_65p fsz18 llgrey_txt" >
									</div>
									</div>
									</div>
									
									<div class="on_clmn  mart20 marb35" >
									<div class="pos_rel">
										<input type="text" name="card_name" id="card_name" placeholder="Name of card holder" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 llgrey_txt" value="<?php echo $companyDetail['company_name']; ?>" readonly />
										</div>
									</div>
									<div class="form-group hidden">
									<input type="text" name="card_type" id="card_type" class="form-control required" >
								</div>
									 <div class="clear"></div>
									 <div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								<div class="talc  padtb20"> <a href="#" onclick="submitform();"><input type="button" value="Submit" class="forword minhei_55p"  ></a>
										
									
									</div>	
									
								</div>
									
							</div>
							
						</form>
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
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
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

<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	
</body>
</html>