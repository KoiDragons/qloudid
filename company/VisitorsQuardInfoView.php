<!doctype html>
<html>
	<?php 
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
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_p=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_p=str_replace('"','',$value_p); $value_p = base64_to_jpeg( $value_p, '../estorecss/tmp'.$companyDetail['profile_pic'].'.jpg' ); } else { $value_p="../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_p="../html/usercontent/images/default-profile-pic.jpg";
		
?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Login</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/signup/login/html/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/signup/login/html/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script>
			window.intercomSettings = {
				app_id: "w4amnrly"
			};
		</script>
		<script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',w.intercomSettings);}else{var d=document;var i=function(){i.c(arguments);};i.q=[];i.c=function(args){i.q.push(args);};w.Intercom=i;var l=function(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/w4amnrly';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);};if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
		
		
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
			function changeHeader()
			{
				
				window.location.href="https://www.safeqloud.com/user/index.php/LoginAccountEng";
				
			}
		
				function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
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
			
			function informEmployee(id)
			{
				$("#error_msg_form").html('');
				if($("#p_codev").val()=="" || $("#p_codev").val()==0 || $("#p_codev").val()==null)
				{
				document.getElementById("popup_fade").style.display='block';
				$("#popup_fade").addClass('active');
				document.getElementById("person_informed").style.display='block';
				$(".person_informed").addClass('active');
					$("#error_msg_form").html('Please enter personal code');
					return false;
				}
								else
				{
				var send_data = {};
				send_data.p_id=$("#p_codev").val();
				
				$.ajax({
					url: '../../verifyEmployee',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data){
										
					if(data!=0)
					{
						$('#qard_employee').val(data);
						document.getElementById("send_employee").submit();
					}
					
					else
					{
					$("#error_msg_form").html("Please enter correct personal code !!!");
					return false;	
					}
				})
				.fail(function(){})
				.always(function(){});
				
				}
	
				
				
			}
				
				</script>
				</head>
				
				<?php $path1 = $path."html/usercontent/images/"; ?>
				
			

	<body class="lgtgrey2_bg">
				
				<!-- LOGIN FORM -->
				<div class="column_m container zi5  mart60 xs-mart40" onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
					<div class="wi_400p maxwi_100  pos_rel zi5 marrla pad10  xs-pad0  ">
					<div class="talc fsz75 green_txt hidden"> <span class="fas fa-sign-in-alt"></span></div>
					
					<div class="talc fsz75 green_txt"><img src="<?php echo "../../../../".$value_p;?>" alt=""  class="" width="130px" height="130px"></div>
				<div class="padb10 ">
				
									<h1 class="padb5 talc fsz50 xs-fsz40 bold ">Välkommen</h1>
									<p class="pad0 xs-padb10 talc fsz22 xs-fsz20 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Vänligen logga in för att hantera dina digitala aktiviteter och kommunikation på en och samma plats. </p>
								</div>
				
				<div class="container padrl15 xs-padrl0">
				
				<div class=" marrla xs-wi_100">
				
				<form action="../../visitorsInfo/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" method="POST" name="send_employee" id="send_employee">
				<div class="marb10 padtb10 ">
				
				
				<div class="on_clmn padtb10">
				<div class="on_clmn padrl0 padb10 xs-padrl0">
				<input type="text" name="p_codev" id="p_codev" placeholder=" Enter personal code..." class="white_bg default_view rbrdr wi_100 mart5 pad10 hei_50p fsz18 llgrey_txt" /> </div>
				<div class="on_clmn padrl0 xs-padrl0">
				
				<div class="clear"></div>
				</div>
				
				<input type="hidden" id="ind" name="ind" value="<?php echo $_POST['inde']; ?>"/>
									<input type="hidden" id="qard_employee" name="qard_employee"/>
				
				<div class="clear"></div>
				
				</div>
				<div class=" padrl0 talc xs-padrl0">
						<input type="button" value="Meddela" class="wi_360p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="informEmployee();">
						
					</div>
				<?php if($data['comp_id']!=0) { ?>
						<p class="padt20 xs-padt10 xs-padb20 talc fsz18 xs-fsz16 padb0  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 black_txt">This front desk is managed by <?php echo $data['comp_name']; ?></p>
						<?php } ?>
				
				
				</form>
				
				</div>
				</div>
				
				</div>
				</div>
				</div>
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
				</div>
				<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div id="error_msg_form" class="fsz20"> </div>
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal" onclick="closePop();">Close</a> </div>
			</div>
		</div>
				<div class="clear"></div>
				<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/jquery-ui.min.js"></script>
				<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/superfish.js"></script>
				<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/icheck.js"></script>
				<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/jquery.selectric.js"></script>
				<script type="text/javascript" src="<?php echo $path; ?>html/signup/login/html/js/custom.js"></script>
				</body>
				
				</html>				