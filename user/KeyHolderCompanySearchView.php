<!doctype html>
<?php
	
	$path1 = $path."html/usercontent/images/";
	
?>

<html>
	
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
			var available_yes=0;
			var currentLang = 'sv';
			function submitFormCom()
{
	
	$("#save_indexingcs").submit();
}

function confirmSubmit(id)
{
	
	$("#location_id").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_confirm").addClass('active')
	$("#gratis_popup_confirm").attr('style','display:block');
	
}
function confirmYes(id)
{
	
	$("#location_id_yes").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_yes").addClass('active')
	$("#gratis_popup_yes").attr('style','display:block');
	
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
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
	<?php $path1 = $path."html/usercontent/images/"; ?>
			<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/NewPersonal/apartmentSelectRevisionInfo/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz16 sf-js-enabled sf-arrows">
					 
						<li class="dblock hidden-xs hidden-sm fright pos_rel   first padr10"><a href="../searchCategories/<?php echo $data['aid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt   ffamily_avenir" data-en="Logga in" data-sw="Logga in" style="background-color: #000000;">Second flow</a></li>
						 
					</ul>
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
									<a href="https://www.safeqloud.com/user/index.php/NewPersonal/apartmentSelectRevisionInfo/<?php echo $data['aid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>

		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- SUB-HEADER -->
			
			
			
			<!-- CONTENT -->
			<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn nobold"  >Connect</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc xs-padb15  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn nobold" > Search and connect with your employer, landlord or school.</a></div>	
							
								 
					 
						<form action="../searchCompanies/<?php echo $data['aid']; ?>" method="POST" id="save_indexingcs" name="save_indexingcs" accept-charset="ISO-8859-1">
							<div class="dflex alit_s marb15">
								<input type="message" name="message" class="minhei_65p flex_1 padrl15 lgtgrey_bg nobrd fsz15 ffamily_avenir" placeholder="Company name" value="">
								<button type="submit" class="minhei_65p padrl30 forword button_bg_color nobrd fsz14 bold ffamily_avenir">Search</button>
							</div>
							</form>
							 <?php echo $keyServicesCompaniesList; ?>
							<div class="mart15" id="t_data">
								
								<?php if(isset($_POST['message']))
									{
									echo $companyListSearch; } ?>
								
							</div>
							
							<div class="clear"></div>
							 
							<div class="padtb20 talc  <?php if(isset($_POST['message'])) echo ''; else echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_rows(this);">View more</a>
									</div>	
						
					</div>
					
					<script>
					function add_more_rows(link,id) {
								var html;
								var id_val=parseInt($(link).attr('value'))+1;
								
								$(link).attr('value',id_val);
								var send_data={};
								send_data.message='<?php if(isset($_POST['message'])) echo urlencode(htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')); ?>' ;
								send_data.id=id_val;
								$.ajax({
									type:"POST",
									url:"CompanySearch/companyListNew",
									data:send_data,
									dataType:"text",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									success: function(data1){
										html=data1;
										var $tbody = $("#t_data");
										
										$tbody
										.append($(html))
										.find('input.init')
										.iCheck({
											checkboxClass: 'icheckbox_minimal-aero',
											radioClass: 'iradio_minimal-aero',
											increaseArea: '20%'
										});
										
									}
								});
								
								return false;
							}
							
							
					</script>
					
					<div class="marb10 pad15 brd brdrad3 white_bg hide">
						<div class="dflex alit_c marrl-15">
							<div class="wi_50 padrl15">
								<img src="<?php echo $path; ?>html/usercontent/images/chrome.png" class="wi_100 hei_auto dblock">
							</div>
							<div class="wi_50 padrl15">
								<div class="talr"><a href="#" class="underline dark_grey_txt">Close</a></div>
								<h3 class="marb5 fsz16">Chrome extension</h3>
								<ul class="mar0 marb15 pad0">
									<li class="dblock marb5 pad0">
										<span class="fa fa-check fsz14 green_txt"></span>
										<span>Find email addresses from any website </span>
									</li>
									<li class="dblock marb5 pad0">
										<span class="fa fa-check fsz14 green_txt"></span>
										<span>Save your leads in seconds</span>
									</li>
								</ul>
								<div>
									<a href="#" class="diblock padtb10 padrl13 brdrad3 bg_ff5722 bg_ee3900_h talc bold fsz13 white_txt">
										<span class="fa fa-chrome"></span>
										<span>Add to Chrome</span>
									</a>
								</div>
							</div>
						</div>
					</div>
					
				</div>
</div>
<div class="clear"></div>
</div>
</div>



<div class="clear"></div>
<div class="hei_80p hidden-xs"></div>


<!-- Edit news popup -->
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
	<div class="modal-content pad25 brd nobrdb talc">
		<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">TJÄNSTEN är en del av vårt premiuminnehåll</h3>
			<div class="marb20">
				<img src="<?php echo $path; ?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" />
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_75 dflex fxwrap_w marrla marb20 tall">
				<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Hålla dig  uppdaterad inom arbetsrätt</span>
				</div>
				<!--<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Använda smarta webblösningar</span>
				</div>
				<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
				</div>
				<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Utföra bakgrundskontroller på din personal eller nästa rekryt </span>
				</div>
				<!--<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Men nästa gång behovet dyker upp då finns allting färdigt.</span>
				</div>-->
			</div>
			
			<div class="marb10">
				<input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Please provide your unique code here" />
			</div>
			<div>
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();"/>
				<input type="hidden" id="indexing_save_unique" name="indexing_save_unique" >
			</div>
			<div class="marb10 padtb10 pos_rel">
				<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div>
				<span class="diblock pos_rel zi2 padrl10 white_bg">
					eller om du redan har en prenumeration
				</span>
			</div>
			<div class="padb0">
				<a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a>
			</div>
		</form>
	</div>
</div>



<!-- Sales popup -->
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
	<div class="modal-content pad25 brd nobrdb talc">
		<form>
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
			<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
			</div>
			<div class="marb25">
			<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
			<div>
				<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
			</div>
		</form>
	</div>
</div>


<!-- Marketing popup -->
<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
	<div class="modal-content pad25 brd nobrdb talc">
		<form>
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
			<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
				<div class="dtrow">
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
					<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
				</div>
			</div>
			<div class="marb25">
			<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
			<div>
				<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
			</div>
		</form>
	</div>
</div>


<!-- Popup fade -->
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

</div>

	
<!-- Slide fade -->
<div id="slide_fade"></div>

<!-- Menu list fade -->
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>


<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
	
	// Charts
	google.charts.load('current', { 'packages': ['corechart'] });
	
	
	// Line Chart
	google.charts.setOnLoadCallback(drawLineChartInhouse);
	function drawLineChartInhouse() {
		var data = google.visualization.arrayToDataTable([
		['Day', 'Upcoming', 'Incoming'],
		['MON', 100, 60],
		['TUE', 90, 60],
		['WED', 105, 50],
		['THU', 115, 45],
		['FRI', 110, 50],
		['SAT', 112, 52],
		['SUN', 200, 48]
		]);
		
		var options = {
			curveType: 'function',
			chartArea : {
				width: '100%',
				height: 160,
				top: 20,
			},
			pointSize: 5,
			colors: ['#3691c0', '#ba03d9']
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawLineChartStaffing);
	function drawLineChartStaffing() {
		var data = google.visualization.arrayToDataTable([
		['Day', 'Upcoming', 'Incoming'],
		['MON', 100, 60],
		['TUE', 90, 60],
		['WED', 105, 50],
		['THU', 115, 45],
		['FRI', 110, 50],
		['SAT', 112, 52],
		['SUN', 200, 48]
		]);
		
		var options = {
			curveType: 'function',
			chartArea : {
				width: '100%',
				height: 160,
				top: 20,
			},
			pointSize: 5,
			colors: ['#3691c0', '#ba03d9']
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawLineChartRecruiting);
	function drawLineChartRecruiting() {
		var data = google.visualization.arrayToDataTable([
		['Day', 'Upcoming', 'Incoming'],
		['MON', 100, 60],
		['TUE', 90, 60],
		['WED', 105, 50],
		['THU', 115, 45],
		['FRI', 110, 50],
		['SAT', 112, 52],
		['SUN', 200, 48]
		]);
		
		var options = {
			curveType: 'function',
			chartArea : {
				width: '100%',
				height: 160,
				top: 20,
			},
			pointSize: 5,
			colors: ['#3691c0', '#ba03d9']
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
	function drawLineChartBackgroundChecks() {
		var data = google.visualization.arrayToDataTable([
		['Day', 'Upcoming', 'Incoming'],
		['MON', 100, 60],
		['TUE', 90, 60],
		['WED', 105, 50],
		['THU', 115, 45],
		['FRI', 110, 50],
		['SAT', 112, 52],
		['SUN', 200, 48]
		]);
		
		var options = {
			curveType: 'function',
			chartArea : {
				width: '100%',
				height: 160,
				top: 20,
			},
			pointSize: 5,
			colors: ['#3691c0', '#ba03d9']
		};
		
		var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
		chart.draw(data, options);
	}
	
	
	// Donut Chart
	// - yearly
	google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
	function drawDonutChartYearlyInhouse() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 38],
		['other', 22],
		['23-30 y.o.', 26],
		['18-22 y.o.', 14]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
	function drawDonutChartYearlyStaffing() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 38],
		['other', 22],
		['23-30 y.o.', 26],
		['18-22 y.o.', 14]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
	function drawDonutChartYearlyRecruiting() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 38],
		['other', 22],
		['23-30 y.o.', 26],
		['18-22 y.o.', 14]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
	function drawDonutChartYearlyBackgroundChecks() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 38],
		['other', 22],
		['23-30 y.o.', 26],
		['18-22 y.o.', 14]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
		chart.draw(data, options);
	}
	
	
	// - monthly
	google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
	function drawDonutChartMonthlyInhouse() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 48],
		['other', 12],
		['23-30 y.o.', 16],
		['18-22 y.o.', 24]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
	function drawDonutChartMonthlyStaffing() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 48],
		['other', 12],
		['23-30 y.o.', 16],
		['18-22 y.o.', 24]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
	function drawDonutChartMonthlyRecruiting() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 48],
		['other', 12],
		['23-30 y.o.', 16],
		['18-22 y.o.', 24]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
	function drawDonutChartMonthlyBackgroundChecks() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 48],
		['other', 12],
		['23-30 y.o.', 16],
		['18-22 y.o.', 24]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
		chart.draw(data, options);
	}
	
	
	// - daily
	google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
	function drawDonutChartDailyInhouse() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 53],
		['other', 16],
		['23-30 y.o.', 21],
		['18-22 y.o.', 10]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
	function drawDonutChartDailyStaffing() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 53],
		['other', 16],
		['23-30 y.o.', 21],
		['18-22 y.o.', 10]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
	function drawDonutChartDailyRecruiting() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 53],
		['other', 16],
		['23-30 y.o.', 21],
		['18-22 y.o.', 10]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
		chart.draw(data, options);
	}
	
	google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
	function drawDonutChartDailyBackgroundChecks() {
		var data = google.visualization.arrayToDataTable([
		['Age range', 'Attendance'],
		['< 18 y.o.', 53],
		['other', 16],
		['23-30 y.o.', 21],
		['18-22 y.o.', 10]
		
		]);
		
		var options = {
			pieHole: 0.8,
			chartArea : {
				width: 320,
				height: 150,
				top: 20,
			},
			pieStartAngle : -90,
			legend: {
				position: 'right',
				alignment: 'center',
				textStyle: {
					fontSize: 13,
					color: '#c6c8ca',
				}
			},
			pieSliceText : 'none',
			colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
		chart.draw(data, options);
	}
	
	
	tinyMCE.init({
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