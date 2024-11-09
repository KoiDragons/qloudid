<?php 
	$path1 = "../../../../html/usercontent/images/";
	 

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
	
	$im=0;
if($getInformation ['profile_pic']!=null) { $filename="../estorecss/".$getInformation ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$getInformation ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; $im=1; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>
<!doctype html>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
		var timeout=0;
		var a;
		const timeInterval=3000;
		const tout=40;
		var send_data={};
		var send_data1={};
		function checkBankid()
			{
				//Clear previous message, if any
				$("#errorMsg").html('');
				if($("#prnumber").val()=="")
				{
					$("#errorMsg").html('Personal number can not be blank');
					return false;
				}
				if(isNaN($("#prnumber").val())) 
				{
					$("#errorMsg").html('Personal number must be a numeric value');
					return false;
				}
				if($("#prnumber").val().length < 12 || $("#prnumber").val().length > 12) 
				{
					$("#errorMsg").html('Personal number must be 12 digit numeric value');
					return false;
				}
				
				
				
				var send_ssn={};
				send_ssn.ssecurity1=$("#prnumber").val();
				
				$.ajax({
					type:"POST",
					url:"../checkUserAvailability",
					data:send_ssn,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==0)
						{
							$("#errorMsg").html('This person does not exist in our system');
							return false;
						}
						else 
						{
							send_data1.user_id=data1;
							
						}
					}
				});
				
				
				
				
				
				var send_data={};
				send_data.prnumber=$("#prnumber").val();
				$.ajax({
					type:"POST",
					url:"../../BankidCheck/initiate",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1)
						{
							send_data1.orderRef=data1;
							a = setInterval(ajaxSend, timeInterval);
						}
						else 
						{
							$("#errorMsg").html('error request');
						}
					}
				});
				
			}
			
			function ajaxSend()
			{ 
				$.ajax({
					type:"POST",
					url:"../../BankidCheck/checkOrderReference",
					data:send_data1,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data2){
						if(data2!='complete')
						{
							timeout++;
							if(data2==1)
							{
								clearInterval(a);
								$("#errorMsg").html("Det BankID du försöker använda är för gammalt eller spärrat. Använd ett annat BankID eller hämta ett nytt hos din internetbank.");
							}
							else if(data2==2)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten. Försök igen.");
							}
							else if(data2==3)
							{
								clearInterval(a);
								$("#errorMsg").html("BankID-appen verkar inte finnas i din dator eller telefon. Installera den och hämta ett BankID hos din internetbank. Installera appen från din appbutik eller https://install.bankid.com.");
							}
							else if(data2==4)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten.");
							}
							else if(timeout>tout)
							{
								clearInterval(a);
								$("#errorMsg").html('Internt tekniskt fel. Försök igen.');
							} 
							else 
							{
								$("#errorMsg").html(data2);
							}
						}
						else 
						{
							
							$.ajax({
								type:"POST",
								url:"../loginUpdate",
								data:send_data1,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									
									if(data1==0)
									{
										$("#errorMsg").html('Some error occured please try again later');
										clearInterval(a);
									}
									else 
									{
										clearInterval(a);
										window.location.href="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow";
									}
								}
							});
							
							
							
						}
						
					}
				});
				
			}
			
					
			
		</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
				<div class="column_m header  bs_bb white_bg">
		<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc">
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15 wi_140p">
				<a href="https://www.safeqloud.com"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr30">
			<div class="languages">
					<a href="#" id="language_selector" class="padrl10 black_txt"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="US" alt="US"></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="US" alt="US">
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden">
							</a>
						</li>
					</ul>
				</div>
			</div>
		<div class="usermenu">
					<ul>
						<li class="right hei_30p">
							<a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="translate orange_btn bold xs-padrl10i hei_30p " id="usermenu_singin" data-en="Sign In" data-sw="Logga In">Sign In</a>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="https://www.safeqloud.com/user/index.php/LoginAccount" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Login</a> </div>
				<div class="clear"></div>
			
		</div>
	</div>
	<div class="clear"></div>
	
		<div class="column_m pos_rel">
		
		
		<div class="clear"></div>
		
				
		
		
				<div class="clear"></div>	
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20">
			<div class="wrap maxwi_100 padrl10 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="maxwi_100 wi_640p col-xs-12 col-sm-12 pos_rel zi5  fsz14  marrla  xs-pad0">
				
						
						<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla padrbl10  xs-pad0  ">	
				
				<div class="wi_100 xs-wi_100 flex_1 order_1 xs-order_1 xs-tall tall mart0 brdrad5 talc">
					
					
					<div class="padb0 xxs-pad0 xxs-padb0">
						<?php if($im==0) { ?>
							<div class="padb20 ">
								<div class="talc fsz256 green_txt"> <span class="far fa-building"></span></div>
							</div>
							<?php } else { ?>
							<div class="padb20 ">
								<img src="<?php echo $imgs; ?>" class="maxwi_100 hei_auto brd brdrad5" width="380" height="168.88" style="border-color: #ffffff;">
							</div>
						<?php } ?>
						<div class="padt10 ">
							<h1 class="padb5 tall fsz40 xs-fsz25 bold lgn_hight_35">Bekräfta din identitet</h1>
							<p class="padt10 xs-padb10 tall fsz20 xs-fsz16 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10  lgn_hight_25 ">Du är ombedd att bekräfta din identitet genom att fylla i ditt personnummer och signera med ditt mobila BankID.</p>
						</div>
						<div class="marb0 padrl0 first">
							
							
							<div class="on_clmn padtb0">
								
								
								
								
								
								<!--	<div class="on_clmn mart20">
									
									<select name="reque" id="reque" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 white_bg brdrad5" onchange="selectCode(this.value);" >
									
									<option value="1">Via personnummer</option>
									</select>
								</div>-->
								
								<div class="on_clmn mart10" >
									
									<input type="text" name="prnumber" id="prnumber" placeholder="Ditt personnummer i ett följd" class="wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5">
									
									
								</div>
								
								
								<div id="errorMsg" class="red_txt"></div>
								<div class="clear"></div>
							</div>
							
							
							
							
							<div class="clear"></div>
							
							<div class="padb10 xs-padrl0 mart10" id="submit_button_in_popup"> <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" onclick="checkBankid();">Verifiera dig med BankID</a> </div>
							
							
							
						</div>
						
						
						
						
						
					</div>
					
					
				</div>
				<div class="wi_100 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc  xs-padr0 xs-padl0">
					<h4 class="bold fsz20 xs-fsz20 padb10 tall">Frågor och svar</h4>
					
					
					<ul class="mart10 pad0 tall fsz18">
						
						<li class="dblock mar0 marb10 pad0">
							<a href="javascript:void(0);" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
								<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
								<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
								Frågeställaren
							</a>
							<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
								
								<p class="padb5"><?php echo $getInformation['cid']; ?> 
								</p>
								
								<p class="padb5"><?php echo $getInformation['company_name']; ?>  </p>		
								<p class="hidden"><?php echo $getInformation['industry']; ?>  </p>		
								<p class="padb5"><?php if($getInformation['address']==null || $getInformation['address']=="") echo "-"; else echo $getInformation['address']; ?>  </p>		
								<p class="padb5"> <?php if($getInformation['zip']==null || $getInformation['zip']=="") echo "-"; else echo $getInformation['zip']; ?>  <?php if($getInformation['city']==null || $getInformation['city']=="") echo "-"; else echo html_entity_decode($getInformation['city']); ?> </p>		
								<p class="padb5"><?php if($getInformation['country']==null || $getInformation['country']=="") echo "-"; else echo $getInformation['country']; ?> </p>		
								<p class="padb5"><?php if($getInformation['phone']==null || $getInformation['phone']=="") echo "-"; else echo $getInformation['phone']; ?>   </p>		
								
							</div>
						</li>
						
						<li class="dblock mar0 marb10 pad0">
							<a href="javascript:void(0);" class="class-toggler dark_grey_txt" data-classes="active" onclick="changeClass(this);">
								<span class="fa fa-caret-right wi_10p dnone_pa marr3"></span>
								<span class="fa fa-caret-down wi_10p dnone diblock_pa marr3"></span>
								Om din data
							</a>
							<div class="hide dblock_siba pad15 padb0 lgtgrey2_bg">
								
								<p>När du har verifierat din identitet skickas en bekräftelse till beställaren . Uppgifterna som du lämnar ifrån dig hanteras enligt gällande GDPR-lagstiftning. 
								</p>
								
								<p>Vid frågor kring detta, vänligen hör av dig till beställaren eller oss på Qloud ID på +46 10 1510125. </p>		
							</div>
						</li>
						
						
					</ul>
				</div>
				
			</div>
					</div>
				
				
				
				</div></div>
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="marb20"> <img src="<?php echo $path;?>usercontent/images/gratis.png" class="maxwi_100 hei_auto"> </div>
						<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
						<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
						<div class="marb10 padtb20 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span> </div>
							<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
					</form>
				</div>
			</div>
			
			
			<!-- Sales popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Marketing popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress"> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
					</form>
				</div>
			</div>
			
			
			<!-- Popup fade -->
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
			
		</div>
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_login">
			<div class="modal-content pad25 brd nobrdb talc brdrad5">
				
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Please Login</h3>
					<div class="marb20">
						<img src="../../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						<!--<div class="wi_50 marb10">
							<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Läsa nyheter och  följa trender </span>
						</div>-->
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					
					<div class="pad15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="number" id="prnumber" name="prnumber" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Personal Number/Bankid">
					</div>
					</div>
					
						
					<div id="errorMsg" class="red_txt"></div>
					<div class="mart20">
						<input type="button" value="Search" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkBankid();">
						
						
					</div>
					
					
					
				
			</div>
		</div>
	
	
		
		
		
		
		
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
			
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	
	



</body>

</html>