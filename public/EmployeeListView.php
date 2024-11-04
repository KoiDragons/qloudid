<!doctype html>
<?php $path_crm="../../../../html/crm_list/qmatchup_profile/html/"; 

$path_crm="../../../../html/crm_list/qmatchup_profile/html/";
 $path1 = $path."html/usercontent/images/"; ?>
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		<script src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
		<style>
		random_bg_a.active {
		background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f5f5f5"; else echo $corporateColor['bg_color']; ?>;
		}
		random_color_a.active {
			color:<?php if($corporateColor['f_color']=="" || $corporateColor['f_color']==null) echo "#000000"; else echo $corporateColor['f_color']; ?>;
		}
		</style>
		<script>
		var dict = {
				"Home": {
					sv: "Início"
				},
				"Download plugin": {
					sv: "Descarregar plugin",
					en: "Download plugin"
				}
			}
			var translator = $('body').translate({lang: "en", t: dict});
			translator.lang("en");
			var translation = translator.get("Home");
			var currentLang = 'en';
			var langVar='<?php echo $verifyLanguage; ?>';
		
		
		var div_id="A";
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
			
			function changeClass(link)
			{
				
				if($(link).hasClass('active'))
				{
					$(link).removeClass('active');
					$(".class-toggler").removeClass('active');
				}	
				else
				{
					$(".class-toggler").removeClass('active');
					$(link).addClass('active');
				}
			}
		function addEmpLoad(link,id)
		{
				

				div_id=id;
								var d1=id+"_iid";
								if($("#emp_search").val()!="")
								{
								$("#"+d1).val("0");
								}
								if(div_id!='A')
								{
									$("#tab_A").val("0");
								}	
							$("#total_count").html("");
									var id_val=0;
								var d=id+"_idata";
								var d1=id+"_iid";
								$("#"+d1).attr('value',0);
								$("#"+d).html("");
								var html1="";
								$("#searche").val("");
								$("#emp_search").val("");
								$(".expanding-input-wrap").removeClass('active');
								
								var send_data={};
		send_data.id=parseInt($(link).attr('value'));
		
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../employeeListNew/<?php echo $data['cid']; ?>",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									html1=data1;
									
								$("#"+d).html('');
								$("#"+d)
									.append($(data1))
									.find('input.init')
										.iCheck({
											checkboxClass: 'icheckbox_minimal-aero',
											radioClass: 'iradio_minimal-aero',
											increaseArea: '20%'
										});
										}
									});
						}
						
						
						
						
		
		
		
							
				function addEmp(link,id)
				{
					
					$("#total_count").html("");
								if(div_id!='A')
								{
									$("#A_iid").val("1");
								}
								div_id=id;
								var d1=id+"_iid";
								if($("#emp_search").val()!="")
								{
								$("#"+d1).val("1");
								}
								if(div_id!='A')
								{
									$("#tab_A").val("0");
								}
								
									var id_val=0;
								var d=id+"_idata";
								
								$("#"+d).html("");
								$("#searche").val("");
								$("#emp_search").val("");
								
								$(".expanding-input-wrap").removeClass('active');
								var html1="";
								var send_data={};
		
		send_data.id=parseInt($(link).attr('value'));
		
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../employeeListNew/<?php echo $data['cid']; ?>",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									html1=data1;
									
								
								$("#"+d)
									.append($(data1))
									.find('input.init')
										.iCheck({
											checkboxClass: 'icheckbox_minimal-aero',
											radioClass: 'iradio_minimal-aero',
											increaseArea: '20%'
										});
										}
									});
								}
								
									
								
								
							
					

			
		
function empSearch(link)
{
		if($("#act").hasClass('active'))
	{
		
	var valt=$("#searche").val();
	//alert(valt);
	}
	else
	{
		var valt="";
	}
	
	if((valt).length>=3)
	{
		
		
	
	var send_data={};
		send_data.id=0;
		
		send_data.message=valt;
		$.ajax({
            type:"POST",
            url:"../representativeListSearch/<?php echo $data['cid']; ?>",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									html1=data1.split("~");
									//alert(html1[1]);
									valt = valt.toLowerCase();
									data1 = html1[1].replace(new RegExp(valt,"g"), '<span class="bold dblue_txt">'+valt+'</span>');
									var str='<h3 class="fsz16">Search results: '+html1[0]+' found</h3>'
									$("#total_count").html(str);
								$("#"+div_id+"_idata").html('');
								$("#"+div_id+"_idata")
									.append($(data1))
									.find('input.init')
										.iCheck({
											checkboxClass: 'icheckbox_minimal-aero',
											radioClass: 'iradio_minimal-aero',
											increaseArea: '20%'
										});
										}
									});
	}
	

	
}		
		</script>
	</head>
	
	
	<body class="white_bg" >
			<div class="column_m header xs-hei_55p  bs_bb  " style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f5f5f5"; else echo $corporateColor['bg_color']; ?>">
				<div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 " style="background-color:<?php if($corporateColor['bg_color']=="" || $corporateColor['bg_color']==null) echo "#f5f5f5"; else echo $corporateColor['bg_color']; ?>" >
					<div class="logo  marr15 wi_140p xs-wi_80p hidden-xs hidden-sm visible-xxs">
						<a href="https://www.qloudid.com"> <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10" style="font-family: 'Audiowide', sans-serif;">Qloud ID</h3> </a>
					</div>
					<div class="visible-xs visible-sm fleft padrl10">
							<div class="flag_top_menu flefti  padb10 " style="width: 70px; padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1  padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw1.png" width="45" height="31" alt="email" title="email" onclick="togglePopup();" class="brdrad5"></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="45" height="45" alt="email" title="email" class="lang_selector" data-value="sv" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="45" height="45" alt="email" title="email"data-value="en" class="lang_selector" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
													</li>
													
													
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/germanf.png" width="45" height="45" alt="email" title="email"class="lang_selector" data-value="de" onclick="togglePopup();"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector" data-value="de" onclick="togglePopup();">  German  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="45" height="45" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="45" height="45" alt="email" title="email"></a></div>
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
					
					<div class="hidden-xs hidden-sm fleft padl20 padr10 ">
						<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="hidden-xs" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
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
					
					<div class="fright xs-dnone sm-dnone">
						<ul class="mar0 pad0">
							<div class="hidden-xs hidden-sm padtrl10">
								<a href="../../PublicEmployeeInfo/companyAccount/<?php echo $data['eid']; ?>" class=" diblock padrl20  ws_now lgn_hight_29 fsz16 black_txt" >
									
									<span class="valm">St&auml;ng Sidan</span>
								</a>
							</div>
							
							
							
						</ul>
					</div>
					<div class="visible-xs visible-sm fright marr0 padt15 "> <a href="../../PublicEmployeeInfo/companyAccount/<?php echo $data['eid']; ?>" class="diblock padl10 padr5 brdrad3   fsz18 black_txt trn" data-target="#gratis_popup_verify" >Go back</a> </div>
					<div class="clear"></div>
					
				</div>
			</div>
		
		<!-- CONTENT -->
		<div class="column_m container zi5" onclick="checkFlag();">
			<div class="wrap maxwi_100">
				
				<!-- Content -->
				<div class="column_m bs_bb pad15">
					<h2 class="hidden-xs">Contacts</h2>
					<!-- Search and filter -->
					<div class="marb15 ">
						<form action="" method="post">

						<div class="wd_search default-controls">

							<div class="xs-wi_100_30p fleft dflex justc_sb alit_c bs_bb marb10 xs-marrl-15 padt2 xs-padrl15 xs-lgtwhite_bg hidden-xs">

								<div class="hidden-sm hidden-md hidden-lg opa0">
									<span class="fa fa-plus fsz20"></span>
								</div>
								<div class="tab-header dflex hidden-xs">
									<a href="#" data-id="tab-people" id="act" name="act" data-extra="#new-person-btn,#user-actions" class="dblock martb5 padrl15 brd brdclr_segblue_h brdclr_segblue_a brdradtl3 segblue_bg_a lgn_hight_26 fsz14 midgrey_txt segblue_txt_h white_txt_a white_txt_a active" value="0" onclick="addEmpLoad(this,div_id);">Employee</a>
									
								</div>
								<div class="hidden-sm hidden-md hidden-lg hidden-xs">
									<span class="fa fa-filter fsz20"></span>
								</div>
							</div>

							<div class="bgcolor-light xs-wi_100 fright talr">
								<div class="xs-wi_100 dflex">
									<div class="expanding-input wi_120p hei_40p dinlblck flex_1 pos_rel marr3 valm">
										<div class="expanding-input-wrap wi_100 wi_250p_a xs-wi_100_a hei_50p bs_bb pos_abs top0 right0  brdrad3 lgtgrey_bg trans_all3" value="0">
											<div class="hide-when-active wi_100 pos_abs top0 left0 lgn_hight_50 talc"> <span class="fa fa-search fsz18i clr-light"></span> <span>Sok</span> </div>
											<input type="text" id="searche" name="searche" class="wi_100 lgtgrey_bg hei_100 pos_abs top0 left0 bs_bb padrl30 nobrd" onkeyup="empSearch();"/> <span class="fa fa-search show-when-active pos_abs top0 left0 padl5 lgn_hight_50 fsz18i"></span>
											<a href="#" class="deactivate show-when-active pos_abs top0 right0 padr5 dark_grey_txt"> <span class="fa fa-close fleft lgn_hight_50 fsz18i"></span> </a>
										</div>
										
									</div>
									
									
									
									
									
									<a href="#" data-target=".wd_filters" data-base=".wd_search" class="expander-toggler hei_40p dinlblck bs_bb marr3 padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14 clr-default hidden">
										<span class="hidden-xs">
											<span class="fa fa-angle-down down marr5"></span>
											<span class="fa fa-angle-up up marr5"></span>
											Filter
										</span>
										<span class="fa fa-phone visible-xs lgn_hight_38 fsz20"></span>
									</a>
									<div class="dinlblck hidden-xs hidden-sm valm hidden">
										<div id="new-person-btn" class="dnone diblock_a ">
											<a href="#" class="hei_40p dblock bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg fsz18" title="Add new Person">
												<span class="fa fa-plus valm"></span>
											</a>
										</div>
										<div id="new-business-btn" class="dnone diblock_a active">
											<a href="#" class="hei_40p dblock bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg fsz18" title="Add new Business">
												<span class="fa fa-plus valm"></span>
											</a>
										</div>
										<div id="new-employee-btn" class="dnone diblock_a">
											<a href="#" class="hei_40p dblock bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg fsz18" title="Add new Employee">
												<span class="fa fa-plus valm"></span>
											</a>
										</div>
									</div>
									
									
									
									
									
									
									
									<div class="dnone diblock_va pos_rel marl3" id="user-actions">
									
										<a href="#" class="hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" onclick="return false;">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_sibf zi1 zi2_sibf pos_abs top105 right0">
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall">
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 1</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 2</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 3</a></li>
											</ul>
										</div>
									</div>
									
									
									
									<div class="dnone diblock_va pos_rel marl3" id="business-actions">
										<a href="#" class="action-button class-toggler hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" data-classes="active">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_siba zi1 zi3_siba pos_abs top105 right0" >
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall" >
												<li class="dblock mar0 pad0" ><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt"  onclick="alertVirtual(virtual_id);">Move To</a></li>
												<input type="hidden" name="index_user_id" id="index_user_id" class="wi_100 hei_30p bs_bb pad5 brd fsz13" />
											</ul>
										</div>
										<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_siba zi1 pos_fix top0 left0" data-closest="#business-actions" data-target=".action-button" data-classes="active"></a>
									</div>
									
									
									<div class="dnone diblock_va pos_rel marl3" id="business-actions-company">
										<a href="#" class="action-button class-toggler hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" data-classes="active">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_siba zi1 zi3_siba pos_abs top105 right0" >
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall" >
												<li class="dblock mar0 pad0" ><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt"  onclick="alertVirtualCompany(virtual_id);">Change Owner</a></li>
												<input type="hidden" name="index_company_id" id="index_company_id" class="wi_100 hei_30p bs_bb pad5 brd fsz13" />
											</ul>
										</div>
										<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_siba zi1 pos_fix top0 left0" data-closest="#business-actions" data-target=".action-button" data-classes="active"></a>
									</div>
									
									<div class="dnone diblock_va pos_rel marl3" id="reps-actions">
										<a href="#" class="hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" onclick="return false;">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_sibf zi1 zi2_sibf pos_abs top105 right0">
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall">
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 1</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 2</a></li>
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt">Option 3</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="clear marb10"></div>
								<div class="filter_crumbs filter_crumbs_1 fsz13_333 hidden"> <a href="#" class="clear_filters clr-default">Clear filters</a> </div>
								
								
							</div>
							<div class="clear"></div>
							<div class="wd_filters bgcolor-light clr-default hide">
								<div class="wd_filters_wrap brd">
									<div class="padt15"></div>
									<div class="clear"></div>

									<!-- Text/Checkbox filter -->
									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Locations
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<!-- Text filter -->
											<div class="filter filter-text marb5 fsz13_333">
												<input type="text" name="location_search" placeholder="Search locations" class="wi_100 hei_32p bs_bb dblock padrl8 brdrad2 fsz14"
												 data-list="#location_search_dl" />
											</div>
											<!-- Checkbox filters -->
											<div class="filter filter-additional-permanent filter-checkbox marb5 fsz13_333">
												<label>
														<input type="checkbox" name="any_location" value="0" /> <span class="marl5 valm">Any location</span> </label>
											</div>
										</div>
									</div>

									<!-- Checkbox filter -->
									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Bolagsform
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="Aktiebolag" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Aktiebolag
															<span class="count">(25 258)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Sambruksförening" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Sambruksförening
															<span class="count">(6 578)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Värdepappersfonder" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Värdepappersfonder
															<span class="count">(1 041)</span>
														</span>
													</label>
											</div>
										</div>
									</div>
									<div class="clear visible-xs"></div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													LAN
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="Stockholm" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Stockholm
															<span class="count">(12 961)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Sambruksförening" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Västra götaland
															<span class="count">(5 783)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Värdepappersfonder" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Skåne
															<span class="count">(4 492)</span>
														</span>
													</label>
											</div>
										</div>
									</div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													BRANSCH
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="Bank, finans" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Bank, finans &amp; fö...
															<span class="count">(33 900)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Juridik, ekonomi" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Juridik, ekonomi ...
															<span class="count">(134)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="Fastighetsverksamhet" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Fastighetsverksamhet
															<span class="count">(88)</span>
														</span>
													</label>
											</div>
										</div>
									</div>
									<div class="clear"></div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													OMSÄTTNING
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="0" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															0
															<span class="count">(18 874)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="&lt; 1 tkr" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															&lt; 1 tkr
															<span class="count">(4 273)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="1 - 499 tkr" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															1 - 499 tkr
															<span class="count">(5 057)</span>
														</span>
													</label>
											</div>
										</div>
									</div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													ANSTÄLLDA
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="0" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															0
															<span class="count">(22 275)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="1 - 4" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															1 - 4
															<span class="count">(4 919)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="2" data-text="5 - 9" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															5 - 9
															<span class="count">(459)</span>
														</span>
													</label>
											</div>
										</div>
									</div>
									<div class="clear visible-xs"></div>

									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Inaktiva bolag
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<input type="checkbox" name="cb1" value="1" data-text="Inaktiva bolag" />
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Inaktiva bolag
														</span>
													</label>
											</div>
										</div>
									</div>

									<!-- Sliding checkbox filter -->
									<div class="filter-base for_clmn xs-wi_50 xxs-wi_100 marb15">
										<a href="#" data-target=".expander-content" data-base=".filter-base" class="expander-toggler dblock pad5 fsz14 dark_grey_txt">
												<span class="dblock padrl10">
													Convert
													<span class="fa fa-angle-down down fright marr5 fsz18"></span>
													<span class="fa fa-angle-up up fright marr5 fsz18"></span>
												</span>
											</a>
										<div class="expander-content hide padrl15">
											<div class="padt5"></div>
											<!-- Slide filter -->
											<div class="filter filter-slide-checkbox filter-slide-checkbox-green pos_rel marb5 fsz13_333">
												<input type="checkbox" name="convert_bool" class="default" data-true="Yes" data-false="No" data-text="Convert" />												</div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="padt15"></div>
							</div>
						</div>

						<div class="clear"></div>
					</form>
					<div id="total_count" class="padt10"> </div>
					
				</div>
					
					
					<!-- People -->
					<div class="tab-content" id="tab-people">
						
						<div class="wi_100 dflex">
							
							<!-- Pagination -->
							<div class="tab-header talc lgn_hight_30 uppercase bold">
								<div class="wi_40p">
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  black_txt_a lgtgrey_bg_a dark_grey_txt white_txt_h  active" id="tab_A" value="0" onclick="addEmpLoad(this,'A')" data-id="tab-people-all">All</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-a" value="0" onclick="addEmp(this,'a');">a</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-b" value="0" onclick="addEmp(this,'b');">b</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-c" value="0" onclick="addEmp(this,'c');">c</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-d" value="0" onclick="addEmp(this,'d');">d</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-e" value="0" onclick="addEmp(this,'e');">e</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-f" value="0" onclick="addEmp(this,'f');">f</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-g" value="0" onclick="addEmp(this,'g');">g</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-h" value="0" onclick="addEmp(this,'h');">h</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-i" value="0" onclick="addEmp(this,'i');">i</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-j" value="0" onclick="addEmp(this,'j');">j</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-k" value="0" onclick="addEmp(this,'k');">k</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-l" value="0" onclick="addEmp(this,'l');">l</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-m" value="0" onclick="addEmp(this,'m');">m</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-n" value="0" onclick="addEmp(this,'n');">n</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-o" value="0" onclick="addEmp(this,'o');">o</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-p" value="0" onclick="addEmp(this,'p');">p</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-q" value="0" onclick="addEmp(this,'q');">q</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-r" value="0" onclick="addEmp(this,'r');">r</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-s" value="0" onclick="addEmp(this,'s');">s</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-t" value="0" onclick="addEmp(this,'t');">t</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-u" value="0" onclick="addEmp(this,'u');">u</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-v" value="0" onclick="addEmp(this,'v');">v</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-w" value="0" onclick="addEmp(this,'w');">w</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-x" value="0" onclick="addEmp(this,'x');">x</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-y" value="0" onclick="addEmp(this,'y');">y</a>
									<a href="#" class="dblock brdb_new brdclr_lgtgrey2 white_bg  lgtgrey_bg_a dark_grey_txt white_txt_h black_txt_a" data-id="tab-people-z" value="0" onclick="addEmp(this,'z');">z</a>
								</div>
							</div>
							
							<!-- Results -->
							<div class="flex_1 padl15">
								<div class="tab-content" id="tab-people-all">
									<input type="hidden" id="emp_search" name="emp_search" />
									<form>
										
											<div id="A_idata">
												
												
											</div>
										
										
										
										<div class="mart20 talc">
											<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd trn" value="0" id="A_iid" onclick="add_more_rows_emp(this,'A')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'A')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-a">
									<form>
										
										<div id="a_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="a_iid" onclick="add_more_rows_emp(this,'a')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'a')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-b">
									<form>
										<div id="b_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="b_iid" onclick="add_more_rows_emp(this,'b')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'b')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-c">
									<form>
										<div id="c_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="c_iid" onclick="add_more_rows_emp(this,'c')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'c')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-d">
									<form>
										<div id="d_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="d_iid" onclick="add_more_rows_emp(this,'d')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'d')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-e">
									<form>
										<div id="e_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="e_iid" onclick="add_more_rows_emp(this,'e')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'e')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-f">
									<form>
										<div id="f_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="f_iid" onclick="add_more_rows_emp(this,'f')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'f')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-g">
									<form>
										<div id="g_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="g_iid" onclick="add_more_rows_emp(this,'g')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'g')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-h">
									<form>
										<div id="h_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="h_iid" onclick="add_more_rows_emp(this,'h')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'h')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-i">
									<form>
										<div id="i_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="i_iid" onclick="add_more_rows_emp(this,'i')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'i')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-j">
									<form>
										<div id="j_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="j_iid" onclick="add_more_rows_emp(this,'j')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'j')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-k">
									<form>
										<div id="k_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="k_iid" onclick="add_more_rows_emp(this,'k')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'k')">Reload</a>
										</div>
									</form>
								</div>
								
								
								<div class="tab-content" id="tab-people-l">
									<form>
										<div id="l_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="l_iid" onclick="add_more_rows_emp(this,'l')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'l')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-m">
									<form>
										<div id="m_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="m_iid" onclick="add_more_rows_emp(this,'m')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs " value="0" onclick="addEmpLoad(this,'m')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-n">
									<form>
										<div id="n_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="n_iid" onclick="add_more_rows_emp(this,'n')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'n')">Reload</a>
										</div>
									</form>
								</div>
								
								
								<div class="tab-content" id="tab-people-o">
									<form>
										<div id="o_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="o_iid" onclick="add_more_rows_emp(this,'o')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'o')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-p">
									<form>
										<div id="p_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="p_iid" onclick="add_more_rows_emp(this,'p')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'p')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-q">
									<form>
										<div id="q_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="q_iid" onclick="add_more_rows_emp(this,'q')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'q')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-r">
									<form>
										<div id="r_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="r_iid" onclick="add_more_rows_emp(this,'r')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'r')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-s">
									<form>
										<div id="s_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="s_iid" onclick="add_more_rows_emp(this,'s')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'s')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-t">
									<form>
										<div id="t_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="t_iid" onclick="add_more_rows_emp(this,'t')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'t')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-u">
									<form>
										<div id="u_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="u_iid" onclick="add_more_rows_emp(this,'u')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'u')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-v">
									<form>
										<div id="v_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="v_iid" onclick="add_more_rows_emp(this,'v')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'v')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-w">
									<form>
										<div id="w_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="w_iid" onclick="add_more_rows_emp(this,'w')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'w')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-x">
									<form>
										<div id="x_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="x_iid" onclick="add_more_rows_emp(this,'x')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'x')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-y">
									<form>
										<div id="y_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="y_iid" onclick="add_more_rows_emp(this,'y')">View more</a>
											<a href="#" class="add_more_rows dblue_btn hidden-xs" value="0" onclick="addEmpLoad(this,'y')">Reload</a>
										</div>
									</form>
								</div>
								
								<div class="tab-content" id="tab-people-z">
									<form>
										<div id="z_idata">
												
											</div>
										<div class="mart20 talc">
										<a href="#" class="add_more_rows xs-trans_bg  xs-black_txt  dblue_btn jan xxs-grey_brd" value="0" id="z_iid" onclick="add_more_rows_emp(this,'z')">View more</a>
											<div class="hidden-xs"><a href="#" class="add_more_rows dblue_btn  hidden-xs" value="0" onclick="addEmpLoad(this,'z')">Reload</a></div>
										</div>
									</form>
								</div>
								
								
								
							</div>
						
						</div>
						
						<script>
						
							function add_more_rows_emp(link,id){
								
								if($("#emp_search").val()=="")
								{
								var id_val=parseInt($(link).attr('value'))+1;
								
								
								var html1="";
								var send_data={};
		send_data.id=parseInt($(link).attr('value'));
		$(link).attr('value',id_val);
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../employeeListNew/<?php echo $data['cid']; ?>",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									html1=data1;
									var $tbody = $(link).closest('form').find('tbody'),
									html=html1;
								
								$tbody
									.append($(data1))
									.find('input.init')
										.iCheck({
											checkboxClass: 'icheckbox_minimal-aero',
											radioClass: 'iradio_minimal-aero',
											increaseArea: '20%'
										});
										}
									});
								}
								else
								{
							if($("#act").hasClass('active'))
							{
								
							var valt=$("#emp_search").val();
							//alert(valt);
							}
							else
							{
								var valt="";
							}
							
							if((valt).length>=3)
							{
								
								var id=parseInt($(link).attr('value'));
							var id_val=parseInt($(link).attr('value'))+1;
							
							$("#emp_search").val(valt);
							
							$(link).attr('value',id_val);
							var d=div_id+"_idata";
							//$("#"+d).html("");
							//$("#"+d).val("1");
							//alert(d); return false;
							var send_data={};
								send_data.id=parseInt($(link).attr('value'));
								//alert(send_data.id); return false;
								$(link).attr('value',id_val);
								send_data.message=valt;
								$.ajax({
									type:"POST",
									url:"../representativeListSearch/<?php echo $data['cid']; ?>",
									data:send_data,
									dataType:"text",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									success: function(data1){
															html1=data1.split("~");
									//alert(html1[1]);
									data1 = html1[1].replace(new RegExp(valt,"g"), '<span class="bold dblue_txt">'+valt+'</span>');
									var str='<h3 class="fsz16">Search results: '+html1[0]+' found</h3>'
									$("#total_count").html(str);
														
														$("#"+d)
															.append($(data1))
															.find('input.init')
																.iCheck({
																	checkboxClass: 'icheckbox_minimal-aero',
																	radioClass: 'iradio_minimal-aero',
																	increaseArea: '20%'
																});
																}
															});
							}
														}
								
								return false;
							}
							
							
							
							
							
							
							
							
							
						</script>
						
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		
	
		<script type="text/javascript" src="<?php echo $path_crm; ?>js/jquery-ui.min.js"></script> 
		<script type="text/javascript" src="<?php echo $path_crm; ?>js/superfish.js"></script> 
		<script type="text/javascript" src="<?php echo $path_crm; ?>js/icheck.js"></script> 
		<script type="text/javascript" src="<?php echo $path_crm; ?>js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path_crm; ?>js/custom.js"></script>
		<script type="text/javascript" src="../../../../html/crm_list/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/flipqard.js"></script>
		</body>
</html>