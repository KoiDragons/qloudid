<!DOCTYPE html>
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
	$path1 = $path."html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="<?php echo $path1;?>default-profile-pic.jpg";  $imgs="<?php echo $path1;?>default-profile-pic.jpg"; } }  else {  $imgs="<?php echo $path1;?>default-profile-pic.jpg"; $value_a="<?php echo $path1;?>default-profile-pic.jpg"; } ?>
  <head>
   <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qloudid</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		 <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
		 <script>
		 var timeout=0;
			var a;
			const timeInterval=10000;
      function startTime() {
		   
						$.ajax({
						type:"POST",
						url: "../verifyActivation/<?php echo $data['cid']; ?>",
						
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
						if(data1==0)
						{
							a = setInterval(startTime, timeInterval);	  
							 
						}
						else
						{
							window.location.href ="https://www.safeqloud.com/company/index.php/RemoteVisitor/activateVisitorsMeeting/<?php echo $data['cid']; ?>";
						
						}
						}
					});
					 
}
  function ajaxSend() {
						$.ajax({
						type:"POST",
						url: "../verifyActivation/<?php echo $data['cid']; ?>",
						
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							alert(data1); return false; 
						if(data1==0)
						{
							alert(data1); return false; 
							 window.location.href ="https://www.safeqloud.com/company/index.php/RemoteVisitor/activateVisitorsMeeting/<?php echo $data['cid']; ?>";
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
  <body class="lgthrey2_bg ffamily_avenir" onload="startTime();">
  	<div class="column_m header  xs-hei_55p bs_bb white_bg" >
				<div class="wi_100 hei_65p  xs-hei_55p xs-pos_fix padtb5 padrl10 white_bg">
				<div class="fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"  ><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 	<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz14">
						
						
						<li class="dblock hidden-xs hidden-sm fleft pos_rel   marl20"> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl20  uppercase lgn_hight_25  fsz30  black_txt_h" style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </li>
						
					</ul>
				</div>
			<div class="visible-xs visible-sm fright marr0 padr0 padt10  brdwi_3"> <a href="#" class="diblock padl20 padr10 brdrad3 transbg  lgn_hight_29 fsz30  " style="color: #d9e7f0;" ><i class="fas fa-globe"></i></a> </div>
				<div class="clear"></div>
			</div>
		</div>
	 <div class="clear"></div>
	
  <div class="column_m pos_rel" onclick="checkFlag();">
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100   xxs-fsz45 padb10 trn ffamily_avenir" style="color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color'];?>">QR code</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Scan QR code from your Employee Flipquard.</a></div>
							 
								 
									
						 
						
    <video id="preview" class="mart20 transformationScale xs-transformationScale marl60 xs-marl25 xsi-marl40 xs-right50 xsi_right0 right50 pos_rel" style="transform: scaleX(-.7);"></video>
	
    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
		  var result = content.split('/');
		  var send_data={};
		send_data.eid=result[7];
		  $.ajax({
						type:"POST",
						url: "../checkExpressVisitor/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							
						if(data1==0)
						{
							 
							$("#error_msg_form").html('Person already registered !!!');
							return false;
						}
						else
						{
							 window.location.href="https://www.safeqloud.com/company/index.php/RemoteVisitor/visitorsExpressInfo/<?php echo $data['cid']; ?>/"+result[7];
						}
						}
					});
       
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
    </script>
	
	 <div class="valm fsz20 red_txt" id="error_msg_form"> </div>
	 
	 <div class="talc padtb10"> <a href="../welcomeVisitors/<?php echo $data['cid']; ?>" onclick="informEmployee();" style="background:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#000000"; else echo $corporateColor['bg_color']; ?>"><input type="button" value="Login manually" class="ffamily_avenir forword hei_55p fsz18"  style="background:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#000000"; else echo $corporateColor['bg_color']; ?> !important; color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#f5f5f5"; else echo $corporateColor['f_color'];  ?> !important;"></a>
									
								 		
									
									</div>
	 
	
	</div>
				</div>
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  </body>
</html>