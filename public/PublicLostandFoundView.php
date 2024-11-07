<!doctype html>
<html>
	<?php

		$path1 = "../../html/usercontent/images/";
		 ?>	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script>
		var value_ind=1;
		var get_item=0;
		function readURL(input,id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		
		$('#imagesUp').attr('style','display:block;');
		 
		reader.onload = function (e) {
            $('#imgs'+id)
                .attr('src', e.target.result)
                .width(100)
                .height(100);
				 
				$('#image_data'+id).val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }
	 
	var mData='<input type="hidden" id="image_data'+id+'" name="image_data'+id+'" />';
	 
	$('#more_data').append(mData);
}

	function moreItems()
	{
		value_ind=value_ind+1;
		var htmlData='<div class="on_clmn mart20 brdb"><div class="thr_clmn  wi_50 "><div class="pos_rel talc">';
		htmlData=htmlData+'<input type="text"   value="Article type" class="wi_100 rbrdr pad10   tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly></div></div>';
		htmlData=htmlData+'<div class="thr_clmn  wi_50" id="valy"><div class="pos_rel lgtgrey2_bg"><select name="item_name'+value_ind+'" id="item_name'+value_ind+'"  class="default_view wi_100 mart0  trans_bg nobrd    fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg black_txt tall padl0 ffamily_avenir " style="text-align-last:center;">';
		htmlData=htmlData+'<option value="1" class="lgtgrey2_bg lgt_grey_txt fsz18 tall">Cell Phone</option><option value="2" class="lgtgrey2_bg lgt_grey_txt fsz18 tall">Key';
		htmlData=htmlData+'</option><option value="3" class="lgtgrey2_bg lgt_grey_txt fsz18 tall">Laptop</option>';
		htmlData=htmlData+'</select>	</div>	</div></div>';
		htmlData=htmlData+'	<div class="on_clmn mart20 brdb"> ';
		htmlData=htmlData+'<div class="pos_rel">	<input type="text" placeholder="Article name" name="article_name'+value_ind+'" id="article_name'+value_ind+'"   class="txtind10 fsz18  brdb_red_ff2828 red_ff2828_txt  wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc  ffamily_avenir"> </div></div>';
		
		htmlData=htmlData+'<div class="on_clmn mart20"><input type="text" name="description'+value_ind+'" id="description'+value_ind+'" placeholder="Description" class="txtind10 fsz18  brdb_red_ff2828 red_ff2828_txt  wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc lgt_grey_txt ffamily_avenir"> </div>';
		htmlData=htmlData+'<div class="on_clmn mart20 brdb"> ';
		htmlData=htmlData+'<div class="pos_rel lgtgrey2_bg"><input type="file" name="file'+value_ind+'" id="file'+value_ind+'" class="fsz18 talc minhei_65p xxs-minhei_60p ffamily_avenir" onchange="readURL(this,'+value_ind+');" style="border: 0px solid #d2d8dd; padding: 15px;"></div></div>';
		htmlData=htmlData+'<div class="on_clmn mart20 marb35 brdb"><div class="thr_clmn  wi_50 ">	 <div class="pos_rel talc"><input type="text"   value="Finders fee" class="wi_100 rbrdr pad10  padt45 tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly></div></div><div class="thr_clmn  wi_50" id="valy"><label class="ffamily_avenir">Hittelön (SEK)</label><div class="pos_rel lgtgrey2_bg">	<input type="number" name="finders_fee'+value_ind+'" id="finders_fee'+value_ind+'" min="0" value="0" class="txtind10 fsz18  brdb black_txt  wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc  ffamily_avenir"> </div>	</div></div>';
		 htmlData=htmlData+'<input type="hidden" id="image_data'+value_ind+'" name="image_data'+value_ind+'" />';
		 $('#indexing_save').val(value_ind);
		$('#more_data').append(htmlData);
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
			function sendInformation()
			{
				$("#error_msg_form").html('');
				var submit_form=false;
				for(i=1; i<=value_ind; i++)
				{	
				if($("#article_name"+i).val()=="" || $("#article_name"+i).val()==null)
				{
					 
					$("#error_msg_form").html('Please enter article name');
					return false;
				}
				if($("#description"+i).val()=="" || $("#description"+i).val()==null)
				{
					 
					$("#error_msg_form").html('Please enter description of item');
					return false;
				}
				}
				i=0;
				for(i=1; i<=value_ind; i++)
				{
					var send_data={};
					 
					send_data.item_name=$("#item_name"+i).val();
					send_data.description=$("#description"+i).val();
					send_data.how_lost=$("#how_lost").val();
					send_data.finders_fee=$("#finders_fee"+i).val();
					send_data.article_name=$("#article_name"+i).val();
					send_data.image_data=$("#image_data"+i).val();
					send_data.indexing_save=$("#indexing_save").val();
					$.ajax({
						type:"POST",
						url: "PublicLostandFound/sendInformation",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
						  
							if(data1>0)
							{
								get_item=$('#all_items').val();
							    get_item=get_item+data1+',';
								$('#all_items').val(get_item);
								$('#indexing_save').val(get_item);
								 
								 
							}
							 
						}
					});
					
				
				}
				setTimeout(submitForm, 2000)
				
			}
			
			function submitForm()
			{
				document.getElementById("save_indexing").submit();
			}
		</script>
		<?php $path1 = $path."html/usercontent/images/"; ?>
	</head>
	<body class="white_bg ffamily_avenir" >
		<div class="column_m header xs-hei_55p  bs_bb xs-white_bg">
				<div class="wi_100 hei_65p xs-hei_55p  xs-pos_fix padtb5 padrl10 xs-white_bg">
				<div class="logo padt10 wi_50p xs-wi_50p hidden-xs"><a href="#"><img src="<?php echo $path; ?>html/usercontent/images/favicon-32x32.png" alt="Qmatchup" title="Bisswise" height="32" width="32"></a></div>
				
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://safeqloud-228cbc38a2be.herokuapp.com/public/index.php/LostandFoundWelcome" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
			<div class="flag_top_menu flefti padt10 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
                  <li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"data-value="sv" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/germanf.png" width="28" height="28" alt="email" title="email"data-value="de" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German </a> </div>
													</li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
                  </li>
				   <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
                  </li>
                </ol>
									
								</div>
							</li>
						</ul>
					</li>
					
        
       
					
					
				</ul>
			</div>
			</div>
			<div class="fright xs-dnone visible_si padt10">
					<ul class="mar0 pad0">
						<li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
					</ul>
				</div>
			<!--sf-js-enabled sf-arrows hidden-xs-->
			<div class="top_menu frighti padt15 padb20 hidden">
				<ul class="menulist sf-menu  fsz14 ">
					
					
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz24 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
						</li>
						
				</ul>
			</div>
			
			<div class="clear"></div>
		</div>
		</div>
	<div class="clear"></div>
			
		<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
					
						 <div class="padb20 xxs-padb0 ">	
							
									<h1 class="marb0  xxs-talc talc fsz100 xs-fsz45 padb10 red_ff2828_txt trn ffamily_avenir"  >iLost</h1>
									</div>
									<!-- Logo -->
									<div class="martb20  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >I have lost my item and I am not a user.</a></div>	
						 
							 
					<div id="collaborators-container">
						<div class="collaborator-row dflex alit_c pos_rel">
							
						</div>
					</div> 
						
				
						<div class="marb0 padrl0 first">
							
							
							<div class="on_clmn padtb0">
								<div class="on_clmn mart10 brdb hidden">
									<div class="thr_clmn  wi_50 ">
											 
										<div class="pos_rel talc">
									
										<input type="text"   value="What happened" class="wi_100 rbrdr pad10   tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly>
									</div>
									</div>
										<div class="thr_clmn  wi_50" id="valy">
								<div class="pos_rel lgtgrey2_bg">											
											<select name="how_lost" id="how_lost"  class="default_view wi_100 mart0  trans_bg nobrd    fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg black_txt tall padl0 ffamily_avenir " style="text-align-last:center;"> 
											 
														<option value="1">Lost </option>
														<option value="2">Robbed</option>
													 
														 
											</select>
											</div>
											</div>
											</div>
								
								<div class="on_clmn mart10 brdb ">
									<div class="thr_clmn  wi_50 ">
											 
										<div class="pos_rel talc">
									
										<input type="text"   value="Article type" class="wi_100 rbrdr pad10   tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly>
									</div>
									</div>
										<div class="thr_clmn  wi_50" id="valy">
								<div class="pos_rel lgtgrey2_bg">											
											<select name="item_name1" id="item_name1"  class="default_view wi_100 mart0  trans_bg nobrd    fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg black_txt tall padl0 ffamily_avenir " style="text-align-last:center;"> 
											 
														<option value="1" class="lgtgrey2_bg lgt_grey_txt fsz18 tall">Cell Phone</option>
											<option value="2" class="lgtgrey2_bg lgt_grey_txt fsz18 tall">Key</option>
											<option value="3" class="lgtgrey2_bg lgt_grey_txt fsz18 tall">Laptop</option>
													 
														 
											</select>
											</div>
											</div>
											</div>
									 
									 	<div class="on_clmn mart10 brdb">
									 
										 
								<div class="pos_rel">											
											<input type="text" name="article_name1" id="article_name1" placeholder="Article name"  class="txtind10 fsz18  brdb_red_ff2828 red_ff2828_txt  wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc  ffamily_avenir"> 
											</div>
											 
											</div>
												
											 
											 
												<div class="on_clmn mart20 ">
												
											<input type="text" name="description1" id="description1" placeholder="Description" class="txtind10 fsz18  brdb_red_ff2828 red_ff2828_txt  wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc  ffamily_avenir"> </div>
											
											<div class="on_clmn mart20 brdb">
									
										
								<div class="pos_rel lgtgrey2_bg">	
									<input type="file" name="file1" id="file1" onchange="readURL(this,1);" class="fsz18 talc minhei_65p xxs-minhei_60p ffamily_avenir" style="border: 0px solid #d2d8dd; padding: 15px;"> 						
											 </div>
										
											</div>
									<div class="on_clmn mart20 marb35 brdb">
									<div class="thr_clmn  wi_50 ">
											 
										<div class="pos_rel talc">
									
										<input type="text"   value="Hittelön (SEK)" class="wi_100 rbrdr pad10    tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly>
									</div>
									</div>
										<div class="thr_clmn  wi_50" id="valy">
										<!--<label class="ffamily_avenir">Hittelön (SEK)</label>	--> 
								<div class="pos_rel lgtgrey2_bg">											
											<input type="number" name="finders_fee1" id="finders_fee1" min="0"  class="txtind10 fsz18  brdb black_txt  wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc  ffamily_avenir" value="0"> 
											</div>
											</div>
											</div>
								<div class="clear"></div>
							</div>
							
							<input type="hidden" id="image_data1" name="image_data1" />
							
							<input type="hidden" id="indexing_save" name="indexing_save" value="1" />
							
							<form action="PublicLostandFound/registerUser" method="POST" name="save_indexing" id="save_indexing">	 
							<input type="hidden" id="all_items" name="all_items" value="" />
							 
							</form>
							<div id="more_data"></div>
								
							<div id="error_msg_form" class="fsz20 red_txt ffamily_avenir"> </div>
							
							<div class="clear"></div>
							<div class="padtb20  xxs-talc talc">
								
								<button type="button" name="forward" class="forword_red minhei_55p trn ffamily_avenir fsz20  ffamily_avenir wi_55p marr30" onclick="moreItems();">+</button>
								
								<button type="button" name="forward" class="forword minhei_55p red_ff2828_bg fsz18 trn ffamily_avenir" onclick="sendInformation();">Register</button>
								 
								
								
							</div>
						
							 
						</div>
						
						
					
					
					
				 
				
				
				</div>
			</div>
			
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			</div>
			<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				<div class="fsz20 red_txt ffamily_avenir">Items added successfully.Please continue </div>
				
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="submitForm();">Continue</a> </div>
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
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	 
		
	</body>
</html>										