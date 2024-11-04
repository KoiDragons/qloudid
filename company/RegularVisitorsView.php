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
		$path1 = "../../html/usercontent/images/";
		//echo $companyDetail ['profile_pic']; die;
	if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>	
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
			function informEmployee(id)
			{
				$("#error_msg_form1").html('');
				if($("#ind").val()=="" || $("#ind").val()==0 || $("#ind").val()==null)
				{
					
					$("#error_msg_form1").html('Please select employee');
					return false;
				}
				
				else if($("#name").val()=="" || $("#name").val()==null)
				{
					
					$("#error_msg_form1").html('Please enter name');
					return false;
				}
				 
				else if($("#search_phone").val()=="" || $("#search_phone").val()==null)
				{
						
					$("#error_msg_form1").html('Please enter search_phone');
					return false;
				}
				else if($("#search_phone").val().charAt(0)==0) 
				{
					$("#error_msg_form1").html('Phone number cant start with Zero');
					return false;
				}
				else if(isNaN($("#search_phone").val())) 
				{
					$("#error_msg_form1").html('Phone number must be a numeric value');
					return false;
				}
				else if($("#search_phone").val().length<5) 
				{
					$("#error_msg_form1").html('Phone number must be minimum five digit');
					return false;
				}
				 else if($("#search_phone").val()==0) 
				{
					$("#error_msg_form1").html('Phone number can not be Zero');
					return false;
				}
				else{
					var send_data={};
					send_data.cntry=$("#cntry").val();
					send_data.search_phone=$("#search_phone").val();
					send_data.vtype=$("#typev").val();
					send_data.ind=$("#ind").val();
					send_data.name=$("#name").val();
					send_data.vdate=$("#vdate").val();
					send_data.vtime=$("#vtime").val();
					send_data.email=$("#email").val();
					send_data.vrepeat=$("#vrepeat").val();
					send_data.meeting_room=$("#meeting_room").val();
					$.ajax({
						type:"POST",
						url: "../addVisitor/<?php echo $data['cid']; ?>",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							if(data1==1)
							{
								window.location.href ="https://www.qloudid.com/company/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>";
							}
							else
							{
								
								$("#error_msg_form1").html('Some error occured. Please report to web admin !!!');
								return false;
							}
						}
					});
				}
				
			}
		</script>
		<?php $path1 = $path."html/usercontent/images/"; ?>
	</head>
	<body class="white_bg" >
	<div class="hidden-xs">
			<?php  include 'CompanyHeaderClosed.php'; ?>
			</div>
			<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs" id="headerData">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/company/index.php/WhitelistIP/ipAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
                <div class="clear"></div>

            </div>
        </div>
		<div class="clear"></div>
		
		
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 red_ff2828_txt trn ffamily_avenir">Check-in</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >This is where front desk checks-in a visitor and notify employee</a></div>
					
					 
					<div id="collaborators-container">
						<div class="collaborator-row dflex alit_c pos_rel">
							
						</div>
					</div> 
					
					<form action="" method="POST" name="collaborators-form" id="collaborators-form">
						<div class="marb0 padrl0 first xs-padrl10">
							
							
							<div class="on_clmn padtb0 padrl5">
								
								<div class="on_clmn mart10 hidden">
									
									<div class="pos_rel">
										
										<select name="typev" id="typev" class="default_view wi_100 mart0  nobrdr nobrdt nobrdl brdb  fsz18  minhei_65p  dark_grey_txt trans_bg   mart5 talc padl0">
											
											
											<option value="1" >Visitor</option>
											
											
											
											
											
										</select>													
										
									</div>
								</div>
								<div class="on_clmn mart10">
									
									<div class="pos_rel">
										
										<input type="text" name="empname"  placeholder="Employee name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 red_ff2828_txt talc xxs-minhei_60p minhei_65p fsz18  ffamily_avenir" id="collaborators-lookup" >
										
									</div>
								</div>
								<div class="on_clmn mart20">
									
									
									<div class="pos_rel">
									<input type="text" name="name" id="name" placeholder="Visitors name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 red_ff2828_txt talc xxs-minhei_60p minhei_65p fsz18  ffamily_avenir"> </div>
									
									
									
								</div>
								
								
								<div class="on_clmn mart20 ">
											
											<div class="thr_clmn  wi_30 "  >
												
												<div class="pos_rel">
													
													<select id="cntry" name="cntry" class=" default_view wi_100 mart0  nobrdr nobrdt nobrdl brdb_red_ff2828 red_ff2828_txt  fsz18  minhei_65p txtind25  dropdown-bg85  xxs-minhei_60p talc padl0 ffamily_avenir"  >
														
														<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>"  class="lgtgrey2_bg">+<?php echo $value['country_code']; ?></option>
														<?php 	}	?>
														
													</select>
												</div>
											</div>
											
											<div class="thr_clmn wi_70 padl20">
												
												<div class="pos_rel">
													
													<input type="text" name="search_phone" id="search_phone" placeholder="Visitors mobile no" class=" txtind10 fsz18  brdb_red_ff2828 red_ff2828_txt  wi_100  required minhei_65p xxs-minhei_60p nobrdr nobrdt nobrdl talc  ffamily_avenir">
													
												</div>
												
											</div>
											
											
											
										</div>
								
							
								<div class="on_clmn mart20 marb35" >
									
								<input type="text" name="email" id="email" placeholder="Visitors email" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb llgrey_txt talc xxs-minhei_60p minhei_65p fsz18  ffamily_avenir"> </div>
								
								<div class="clear"></div>
									<div class="padb0 xs-padrl0 xs-padb0 marb35 mart10 lgtgrey2_bg">
								<div class="marrl0 padb10 brdb_dfe3e6 fsz16 white_bg">
								<a href="#profile" class="expander-toggler dark_grey_txt xs-fsz16"><span class="dnone_pa fa fa-chevron-down"></span><span class="dnone diblock_pa fa fa-chevron-up padr15"></span>Optional</a></div>
								<div id="profile" class="lgtgrey2_bg " style="display:none;">
						 <div class="container column_m lgtgrey2_bg">
								<div class="on_clmn mart10 ">
									
									<div class="pos_rel">
										
										<select name="vrepeat" id="vrepeat" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb  fsz16  minhei_65p xxs-minhei_60p trans_bg dropdown-bg dark_grey_txt tall padl0 ffamily_avenir" style="text-align-last:center;">
											
											
											<option value="1" >Inte återkommande</option>
											<option value="2" >Dagligen</option>
											<option value="3" >Veckovis (7 dgr)</option>
											<option value="4" >Månadsvis</option>
											<option value="5" >Årsvis</option>
											<option value="6" >Veckovis (Mån-Fre)</option>
										</select>													
										
									</div>
								</div>
								
								
								
								<div class="on_clmn mart10">
									<div class="thr_clmn  wi_50 padr10"  >
										
										<div class="pos_rel">
										<input type="date" name="vdate" id="vdate"  value="<?php echo date('Y-m-d'); ?>" class="txtind10 fsz16 brdb dark_grey_txt wi_100 lgtgrey2_bg required minhei_65p xxs-minhei_60p nobrdt nobrdl nobrdr talc  ffamily_avenir"> </div>
									</div>
									
									<div class="thr_clmn  wi_50 padl10"  >
										
										<div class="pos_rel">
											
										<input type="time" name="vtime" id="vtime" value="<?php echo date('h:i'); ?>" class="txtind10 fsz16 brdb dark_grey_txt wi_100 lgtgrey2_bg required minhei_65p xxs-minhei_60p nobrdt nobrdl nobrdr talc  ffamily_avenir"> </div>
									</div>
								</div>
								
								
								
								
								
								<div class="on_clmn mart10  ">
									
									<div class="pos_rel">
										
										<select name="meeting_room" id="meeting_room" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb dark_grey_txt fsz16  minhei_65p xxs-minhei_60p trans_bg dropdown-bg  tall padl0 ffamily_avenir" style="text-align-last:center;">
											<option value="">Välj mötesrum</option>
											<?php 
											foreach($meetingRoomDetail as $category => $value) 
												{
												?> 
											<option value="<?php echo $value['id']; ?>" ><?php echo $value['room_name']; ?></option>
												<?php } ?>
										</select>													
										
									</div>
								</div>
								
								</div>
								<input type="hidden" id="ind" name="ind" />
								
								<div class="clear"></div>
							</div>
							</div>
							<div class="red_txt fsz20 talc" id="error_msg_form1"> </div>
								
							
							<div class="talc "> <a href="javascript:void(0);" onclick="informEmployee();"><input type="button" value="Meddela" class="forword minhei_65p red_ff2828_bg ffamily_avenir fsz18 trn"  ></a>
										
									
									</div>
							
							
							
							
							
							
						</div>
						
						
					</form>
					
					
				</div>
				
				
				
			</div>
			
			
		</div>
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div id="error_msg_form" class="fsz20"> </div>
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
			</div>
		</div>
		
		
		
		
		<div class="popup_modal wi_700p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="om_mina">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<h2 class="marb10 pad0 bold fsz24 black_txt">HANTERING AV PERSONUPPGIFTER</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla tall">
					
					
					
					<div class="wi_100 marb10 talc">
						
						<span class="valm fsz16">Vi värnar om din integritet</span>
					</div>
					<ul class="mart10 pad0 tall fsz16">
						
						
						<li class="dblock mar0 marb10 pad0 first">
							<a href="#" class="class-toggler dark_grey_txt active" data-classes="active" onclick="changeClass(this);">
								<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
								<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
								Hantering av personuppgifter
							</a>
							<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
								<p>När du matar in ditt namn och telefonnummer i vårt besökssystem används uppgifterna för att informera den person du besöker per sms och/eller e-post via en extern tjänsteleverantör om din ankomst och lagras i syfte att kunna ta fram en utrymningslista i händelse av brand eller annan fara. Uppgifterna raderas automatiskt från besökssystemet efter 1 dygn men kan lagras under en längre tid hos våra externa tjänsteleverantörer för fakturerings- och statistikändamål.  </p>
								<p>Grunden för insamlingen är att det eter en intresseavvägning finns ett legitimt syfte med att samla in dina uppgifter för att kunna informera om ditt besök och veta vilka personer som vistas i våra lokaler. </p>
							</div>
						</li>
						<li class="dblock mar0 marb10 pad0 last">
							<a href="#" class="class-toggler dark_grey_txt " data-classes="active" onclick="changeClass(this);">
								<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
								<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
								Du äger din data
							</a>
							<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
								<p>Du kan så länge dina personuppgifter finns lagrade begära att få ut utdrag på uppgifterna eller få uppgifterna rättade eller raderade. Du har också rätt att klaga på behandlingen till tillsynsmyndigheten (i Sverige Datainspektionen). Dina personuppgifter kommer inte att lämnas ut till tredje part (utöver vad som angetts ovan), föras över till part i land utanför EU som inte är ”privacyshield”-certifierad eller behandlas för några andra ändamål än vad som angetts ovan. I fall där besöksmottagaren eller du som besökare har telefontjänster eller mailtjänster via leverantörer utanför EU kommer dock uppgifter om besöket aviseras via dessa leverantörer.   </p>
								
								
							</div>
						</li>
						
					</ul>
					
					<div class="wi_100 mart10 talc">
						<input type="button" value="Close" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp ">
						
					</div>
				</div>
			</div>
			
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