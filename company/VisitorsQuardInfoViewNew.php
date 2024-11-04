<!doctype html>

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
	$path1 = "../../html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a= $path1."default-profile-pic.jpg";  $imgs=$path1."default-profile-pic.jpg"; } }  else {  $imgs=$path1."default-profile-pic.jpg"; $value_a=$path1."default-profile-pic.jpg"; } ?>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/signup/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
		<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
		<script>
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
			function expressEntry()
			{
				document.getElementById('save_indexing').submit();
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
			
	
		<?php $path1 = $path."html/usercontent/images/"; ?>
		</head>
		<body class="white_bg">
			
			 <div class="column_m header   bs_bb white_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 white_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../visitorsInfo/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
	
	<div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
					 
					<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../../visitorsInfo/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
		<div class="clear" id=""></div>
	 
			
			
			<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 xs-marb0 xs-mart30  marb0  padb30" id="loginBank" onclick="checkFlag();" style="display:<?php if($verifyIP==1) echo 'block'; else echo 'none'; ?> ">
				<div class="padrl10 xs-padrl15">
					<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content bodycolor  class="browngrey_bg" -->
					<div class="wi_400p xsi-wi_360p   pos_rel zi5 marrla pad30  xs-pad0 lgtgrey2_bg  brdrad5" >
						
							<div class="marb50 padt40">
								<img src="<?php echo $imgs; ?>" class="maxwi_100 hei_auto  brdrad5" height="125" width="125" >
							</div>
							<div class="marb30 padt10 xsi-marb30">
									<h1 class="padb5 talc fsz50 xs-fsz40 xsi-fsz45 bold black_txt" >Business Qard</h1>
									<p class="white_txt padt20 xs-padt10 xsi-padb20 xs-padb20 black_txt talc fsz25 xs-fsz20  xsi-fsz23 padb0  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10" >Signera med ditt digitala visitkort. </p>
								</div>
						
						<form action="../../visitorsInfo/<?php echo $data['cid']; ?>/<?php echo $data['bid']; ?>" method="POST" name="send_employee" id="send_employee">
				<div class="marb10 padb10 ">
				
				
				<div class="on_clmn padb30">
				<div class="on_clmn padrl0 padb0 xs-padrl0">
				<input type="text" name="p_codev" id="p_codev" placeholder="Your ID number" class="fsz18 brdb brdrad3 wi_100 trans_bg required minhei_50p nobrd talc" style="border-width:3px;"/> </div>
				<div class="on_clmn padrl0 xs-padrl0">
				
				<div class="clear"></div>
				</div>
				
				<input type="hidden" id="ind" name="ind" value="<?php echo $_POST['inde']; ?>"/>
									<input type="hidden" id="qard_employee" name="qard_employee"/>
				
				<div class="clear"></div>
				
				</div>
				
				</form>
						<div class="padb10  xs-padrl10"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 brd" onclick="informEmployee();">Signera </a> </div>
						
						<?php if($data['comp_id']!=0) { ?>
						<p class="padt20 xs-padt10 xs-padb20 talc fsz18 xs-fsz16 padb0  maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 black_txt">This front desk is managed by <?php echo $data['comp_name']; ?></p>
						<?php } ?>
						
					</div><div class="clear"></div>
				</div></div>
				
				<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			
			<div class="clear"></div>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
			
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/slick.min.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
			<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/custom.js"></script>
			
			
			<script>
				
				function updateInd(id)
				{
					
					$("#ind").val(id);
				}
				// Collborators autocomplete
				var $col_cont = $('#collaborators-container'),
				$col_form = $("#collaborators-form"),
				$lookup = $("#collaborators-lookup");
				
				if($col_cont[0] && $lookup[0]){
					$lookup
					.on('change keyup', function(){
						var $this = $(this),
                        $parent = $this.parent();
						if($this.val().trim().length > 0){
							$parent.addClass('active');
						}
						else{
							$parent.removeClass('active');
						}
					})
					.autocomplete({
						source: function(request, response) {
							$.ajax({
								url: "../employeeList/<?php echo $data['cid']; ?>",
								data: {
									filter: request.term
								}
							})
							.done(function(data){
								data = JSON.parse(data);
								$("#ind").val('');
								response(data);
								/*
									if(data.length > 0){
									response(data);
									}
									else{
									data.push({'id' : -1, 'label' : 'No matches found'});
									response(data);
									}
								*/
							});
						},
						minLength: 1,
						select: function( event, ui ) {
							var item = ui.item;
							if(item.id !== -1){
								var indset=item['id'];
								
								$lookup.data('item', item);
								event.target.value = item['label'];
								$("#ind").val(indset);
							}
							else{
								//var inds=$("#ind").val()+",";
								$lookup.removeData('item');
								event.target.value = '';
								//id_val=id_val.replace(id_val1, "");
							}
							return false;
						}
					});
					$col_form.on('submit', function(){
						var item = $lookup.data('item'),
						val = $lookup.val().trim();
						
						if(item && val === item['label']){
							console.log(1);
							var col_html = '<div class="collaborator-row dflex alit_c pos_rel mart10">';
							if(item.image){
								col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 bgir_norep bgip_c bgis_cov" style="background-image: url(' + item.image + ')"></div>';
							}
							else{
								var fl = item['first-name'] ? item['first-name'].charAt(0) : (item['last-name'] ? item['last-name'].charAt(0) : (item['email'] ? item['email'].charAt(0) : '?'));
								col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + fl.toUpperCase() + '</div>';
							}
                            
							col_html += '<div class="flex_1 padr40 padl15 fsz13">';
							if(item['first-name'] || item['last-name']){
								col_html += '<div><strong>' + item['first-name'] + ' ' + item['last-name'] +  '</strong></div>';
							}
							if(item['email']){
								col_html += '<div class="txt_0_54">' + item['email'] + '</div>';
							}
							col_html += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete" onclick="updateInd('+ item['id'] +');"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
							
							$col_cont.append(col_html);
							
							$lookup
							.val('')
							.parent()
                            .removeClass('active');
						}
						else{
							if(val.length > 3 && val.indexOf('@') > -1 && val.indexOf('.') > -1){
								console.log(2);
								var col_html = '<div class="collaborator-row dflex alit_c pos_rel mart10">';
								col_html += '<div class="wi_40p hei_40p dflex fxshrink_0 alit_c justc_c bxsh_0111_001 brd brdwi_2 brdclr_f brdrad50 bg_ff7a59 uppercase fsz20 txt_f">' + val.charAt(0).toUpperCase() + '</div>';
								col_html += '<div class="flex_1 padr40 padl15 fsz13">';
								col_html += '<div><strong>' + val +  '</strong></div>';
								col_html += '</div><div class="pos_abs pos_cenY right0"><a href="#" class="remove_closest dblock opa50 opa1_h pad3 trans_opa2" data-target=".collaborator-row"><img src="<?php echo $path; ?>usercontent/images/icons/close-icon.svg" width="18" height="18" class="dblock" class="Delete"></a><div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2"><span class="dblock padrl8">Delete</span></div></div></div>';
								$col_cont.append(col_html);
								
								$lookup
								.val('')
								.parent()
                                .removeClass('active');
							}
						}
						return false;
					});
				}
			</script>
			
			
		</body>
	</html>										