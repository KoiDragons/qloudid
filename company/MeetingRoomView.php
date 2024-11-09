<!doctype html>
<html>
	<?php
		$path1 = "../../html/usercontent/images/";
	 ?>	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
			function submitForm(id)
			{
				$("#error_msg_form").html('');
				if($("#room_name").val()=="" || $("#room_name").val()==null)
				{
					
					$("#error_msg_form").html('Please enter name');
					return false;
				}
				
				
				else if($("#room_location").val()=="" || $("#room_location").val()==null)
				{
						
					$("#error_msg_form").html('Please select location');
					return false;
				}
				
				else if($("#standing").val()=="" || $("#standing").val()==null)
				{
						
					$("#error_msg_form").html('Please enter standing capacity');
					return false;
				}
				else if(isNaN($("#standing").val())) 
				{
						
					$("#error_msg_form").html('Standing capacity must be a numeric value');
					return false;
				}
				else if($("#seated").val()=="" || $("#seated").val()==null)
				{
						
					$("#error_msg_form").html('Please enter seated capacity');
					return false;
				}
				else if(isNaN($("#seated").val())) 
				{
						
					$("#error_msg_form").html('Seated capacity must be a numeric value');
					return false;
				}
				else if($("#classroom").val()=="" || $("#classroom").val()==null)
				{
						
					$("#error_msg_form").html('Please enter class room capacity');
					return false;
				}
				else if(isNaN($("#classroom").val())) 
				{
						
					$("#error_msg_form").html('class room capacity must be a numeric value');
					return false;
				}
				else if($("#theater").val()=="" || $("#theater").val()==null)
				{
						
					$("#error_msg_form").html('Please enter theater capacity');
					return false;
				}
				else if(isNaN($("#theater").val())) 
				{
						
					$("#error_msg_form").html('Theater capacity must be a numeric value');
					return false;
				}
				else if($("#banquet").val()=="" || $("#banquet").val()==null)
				{
						
					$("#error_msg_form").html('Please enter banquet capacity');
					return false;
				}
				else if(isNaN($("#banquet").val())) 
				{
						
					$("#error_msg_form").html('Banquet capacity must be a numeric value');
					return false;
				}
				
				else if($("#conference").val()=="" || $("#conference").val()==null)
				{
						
					$("#error_msg_form").html('Please enter conference capacity');
					return false;
				}
				else if(isNaN($("#conference").val())) 
				{
						
					$("#error_msg_form").html('Conference capacity must be a numeric value');
					return false;
				}
				else if($("#ushape").val()=="" || $("#ushape").val()==null)
				{
						
					$("#error_msg_form").html('Please enter U-shape capacity');
					return false;
				}
				else if(isNaN($("#ushape").val())) 
				{
						
					$("#error_msg_form").html('U-shape capacity must be a numeric value');
					return false;
				}
					else if($("#floor_area").val()=="" || $("#floor_area").val()==null)
				{
						
					$("#error_msg_form").html('Please enter floor area');
					return false;
				}
				else if(isNaN($("#floor_area").val())) 
				{
						
					$("#error_msg_form").html('Floor area must be a numeric value');
					return false;
				}
				else 
				{
					document.getElementById("save_meeting").submit();
					
				}
			}
		</script>
		<?php $path1 = $path."html/usercontent/images/"; ?>
	</head>
	<body class="white_bg ffamily_avenir" >
	 
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/MeetingRoom/roomSpaceDetail/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/MeetingRoom/roomSpaceDetail/<?php echo $data['lid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	 
	
	 
		
		<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "   >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45 padb10 black_txt trn"  >Room</h1>
									</div>
									<div class="mart20 padb10 brdb_new red_ff2828_brdclr brd_width_2 xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >Add available open space as meeting room.</a></div>
								
							 
					
					<div id="collaborators-container">
						<div class="collaborator-row dflex alit_c pos_rel">
							
						</div>
					</div> 
					<?php if(isset($data['id'])) { ?>
					
					<form action="../../updateRoomSpaceInfo/<?php echo $data['lid']; ?>/<?php echo $data['id']; ?>" method="POST" name="save_meeting" id="save_meeting" accept-charset="ISO-8859-1">
					<?php } else { ?>
					<form action="../addMeetingRoom/<?php echo $data['lid']; ?>" method="POST" name="save_meeting" id="save_meeting" accept-charset="ISO-8859-1">
					<?php } ?>
						<div class="marb0 padrl0 first">
							
							
							<div class="on_clmn padtb0">
								
								<div class="on_clmn mart10 ">
									
									<div class="pos_rel">
										
										<input type="text" name="room_name" id="room_name" placeholder="Namn på utrymmet" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['room_name']; } ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> </div>												
										
									</div>
								</div>
								
								<div class="on_clmn mart10 padb10 brdb_new hidden">
									
									<div class="pos_rel">
										<label class="fsz14 fleft">I vilket kontor</label>
										<select name="room_location" id="room_location" class="default_view wi_100 mart5 rbrdr padrl10  lgtgrey2_bg hei_50p fsz18 ffamily_avenir llgrey_txt">
											
											 
											<option value="<?php echo $locationDetail['id']; ?>" <?php if(isset($data['id'])) { if($meetingRoomInfo['room_location_id']==$locationDetail['id']) echo 'selected'; } ?> ><?php echo $locationDetail['visiting_address']; ?></option>
													
										</select>													
										
									</div>
								</div>
								
								
								<div class="on_clmn mart10">
								
									<div class="pos_rel ">
									
									<input type="number" name="standing" id="standing" placeholder="How many tables" min="0" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['standing']; } else echo ''; ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> </div>
								
								</div>
									<div class="on_clmn mart10">
								<div class="pos_rel">
									
									<input type="number" name="seated" id="seated" placeholder="How many chairs per table" min="0" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['seated']; } else echo ''; ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> </div>
									

								</div>
								<div class="on_clmn mart10 marb35">
									
									<div class="pos_rel">
									
									<input type="number" name="floor_area" id="floor_area" placeholder="Yta (m2)" min="0" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['floor_area']; } else echo ''; ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> 
									</div>
								</div>
								<div class="padb20 xs-padrl10 xs-padb0"><div class="marrl5 padb10 brdb_black fsz16 bold"><a href="#profile" class="expander-toggler black_txt"><span class="dnone_pa fa fa-chevron-down"></span><span class="dnone diblock_pa fa fa-chevron-up padr15"></span>Placeringsvarianter</a></div>
								<div id="profile" class="marb25" style="display:none;">
									
								<div class="on_clmn mart10 " >
								<div class="thr_clmn wi_50 padr10">
									
								<div class="pos_rel">
								 
									<input type="number" name="classroom" id="classroom" placeholder="Klassrum (Max)*" min="0" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['classroom']; } else echo ''; ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> 
									</div>
									</div>
									<div class="thr_clmn wi_50">
									
									<div class="pos_rel">
									 
									<input type="number" name="theater" id="theater" placeholder="Teater (Max)*" min="0" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['theater']; } else echo ''; ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> 
									</div>
								</div>
								</div>
								<div class="on_clmn mart10">
									<div class="thr_clmn wi_50 padr10">
									<div class="pos_rel">
									 
									<input type="number" name="banquet" id="banquet" placeholder="Bankett (Max)*" min="0" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['banquet']; } else echo ''; ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> 
									</div>
								</div>
								
								<div class="thr_clmn wi_50">
									
									<div class="pos_rel">
									 
									<input type="number" name="conference" id="conference" placeholder="Konferens (Max)*" min="0" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['conference']; } else echo ''; ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> 
									</div>
								</div>
								</div>
								<div class="on_clmn mart10">
									
									<div class="pos_rel">
								 
									<input type="number" name="ushape" id="ushape" placeholder="U-form (Max)*" min="0" value="<?php if(isset($data['id'])) { echo $meetingRoomInfo['ushape']; } else echo ''; ?>" class=" wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"> 
									</div>
								</div>
								
								
								<div class="on_clmn mart10 ">
									 
									<div class="pos_rel">
									
									<textarea name="info_add" id="info_add" placeholder="Additional information about capacity" class="texteditor  wi_100 rbrdr pad10 mart5 brdb talc  minhei_65p fsz18 ffamily_avenir llgrey_txt"><?php if(isset($data['id'])) { echo $meetingRoomInfo['info_additional']; }   ?> </textarea>
									</div>
								</div>
								
								
								</div>
								
								<div class="clear"></div>
							</div>
							
							<div class="red_txt fsz18" id="error_msg_form"></div>
							
							
							<div class="clear"></div>
							<div class="talc padtb20 "> <a href="#" onclick="submitForm();"><input type="button" value="Add" class="forword red_ff2828_bg minhei_55p fsz18 ffamily_avenir"  ></a>
										
									
									</div>
							
							
							
							
						</div>
						
						
					</form>
					
					
				</div>
				
				
				
			</div>
			
			
		</div>
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		 
		
		
		
		
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
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		
		<script>
			tinyMCE.init(
			{
				selector: '.texteditor',
				plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
				toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
				//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
				//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
				menubar: false,
				toolbar_items_size: 'small',
				style_formats: [
				{
					title: 'Bold text',
					inline: 'b'
				},
				{
					title: 'Red text',
					inline: 'span',
					styles:
					{
						color: '#ff0000'
					}
				},
				{
					title: 'Red header',
					block: 'h1',
					styles:
					{
						color: '#ff0000'
					}
				},
				{
					title: 'Example 1',
					inline: 'span',
					classes: 'example1'
				},
				{
					title: 'Example 2',
					inline: 'span',
					classes: 'example2'
				},
				{
					title: 'Table styles'
				},
				{
					title: 'Table row 1',
					selector: 'tr',
					classes: 'tablerow1'
				}],
				templates: [
				{
					title: 'Test template 1',
					content: 'Test 1'
				},
				{
					title: 'Test template 2',
					content: 'Test 2'
				}]
			});
		</script>
		
	</body>
</html>										