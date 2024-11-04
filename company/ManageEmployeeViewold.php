 
<?php if($empl ['passport_image']!=null) { $filename="../estorecss/".$empl ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$empl ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $value_b=$value_a;} else { $value_a="../../../../usercontent/images/default-profile-pic.jpg"; } }  else $value_a="../../../../usercontent/images/default-profile-pic.jpg";
$path1 = "../../../../usercss/images/";
 ?> 

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>usercss/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/applicantCss/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/vacancycontent/css/modulesadmin1.css" />
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.js"></script>
	<script>
	
	function empPermission(id)
	{
		var send_data={};
		send_data.cid=$('[name="ind"]').val();
		send_data.per=id;
		
		$.ajax({
            type:"POST",
            url:"../updatePermission",
            data:send_data,
            dataType:"text",
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            success: function(data1){
									
										}
									});
									
		
	}
	function submitform()
	{
	var work_email=$('[name="email"]');
	var email=$('[name="contacte_p"]');
	//alert(work_email.val()); return false;
			if(email.val() == "" && work_email.val()=="")
			{
				alert("Please input any one personal/work Email !!!");
				return false;
			}
			
			
	document.getElementById("save_indexing").submit();
	}
	
	function submitPosition()
	{
	var position_p=$('[name="titlep"]').val();
	var position_pv=$('[name="inde"]').val();
	//alert(position_p); return false;
			if(position_p==1)
			{
				//alert(position_p); return false;
				$.get("../positionCheck/"+position_p+"/"+position_pv,function(data1,status){
							   //alert(data1); return false;
								  if(data1>0)
									{
										
										alert("you have already added primary position");
										return false;
									}
									else
									{
										document.getElementById("save_indexingp").submit();
									}
								  
								  
								  });
			}
			else
			{
			document.getElementById("save_indexingp").submit();
			}
	}
	
	function submitEditPosition()
	{
	var position_p=$('[name="titlep"]').val();
	var position_pv=$('[name="inde"]').val();
	//alert(position_p); return false;
			if(position_p==1)
			{
				//alert(position_p); return false;
				$.get("../positionEditCheck/"+position_p+"/"+position_pv,function(data1,status){
							   //alert(data1); return false;
								  if(data1>0)
									{
										
										alert("you have already added primary position");
										return false;
									}
									else
									{
										document.getElementById("save_indexingp").submit();
									}
								  
								  
								  });
			}
			else
			{
			document.getElementById("save_indexingp").submit();
			}
	}
	
	function submitActivePosition()
	{
	var position_p=$('[name="titlep"]').val();
	var position_pv=$('[name="inde"]').val();
	//alert(position_p); return false;
			if(position_p==1)
			{
				//alert(position_p); return false;
				$.get("../positionCheck/"+position_p+"/"+position_pv,function(data1,status){
							   //alert(data1); return false;
								  if(data1>0)
									{
										
										alert("you have already added primary position");
										return false;
									}
									else
									{
										document.getElementById("save_indexingp").submit();
									}
								  
								  
								  });
			}
			else
			{
				var rprice= parseInt($('[name="rprice"]').val());
				//alert(rprice);
				if(!($.isNumeric(rprice)))
				{
					alert("please enter numeric value for price");
					return false;
				}
			document.getElementById("save_indexingp").submit();
			}
	}
	
	function submitEditActivePosition()
	{
	var position_p=$('[name="titlep"]').val();
	var position_pv=$('[name="inde"]').val();
	//alert(position_p); return false;
			if(position_p==1)
			{
				//alert(position_p); return false;
				$.get("../positionEditCheck/"+position_p+"/"+position_pv,function(data1,status){
							   //alert(data1); return false;
								  if(data1>0)
									{
										
										alert("you have already added primary position");
										return false;
									}
									else
									{
										document.getElementById("save_indexingp").submit();
									}
								  
								  
								  });
			}
			else
			{
				var rprice= parseInt($('[name="rprice"]').val());
				//alert(rprice);
				if(!($.isNumeric(rprice)))
				{
					alert("please enter numeric value for price");
					return false;
				}
			document.getElementById("save_indexingp").submit();
			}
	}
	
	function job_family1(id)
{
$.get("../jobFamily/"+id,function(data1,status){
							   
								  if(data1)
									{
										document.getElementById("job_function").innerHTML=data1;
									}
									else
									{
										alert("Some error occurred, Please report to web admin !!!");
										return false;
									}
								  
								  
								  });

}


function job_function1(id)
{
$.get("../jobFunction/"+id,function(data1,status){
							   
								  if(data1)
									{
										document.getElementById("pos_name").innerHTML=data1;
									}
									else
									{
										alert("Some error occurred, Please report to web admin !!!");
										return false;
									}
								  
								  
								  });

}

function job_family2(id)
{
$.get("../jobFamily/"+id,function(data1,status){
							   
								  if(data1)
									{
										document.getElementById("job_functionp").innerHTML=data1;
									}
									else
									{
										alert("Some error occurred, Please report to web admin !!!");
										return false;
									}
								  
								  
								  });

}


function job_function2(id)
{
$.get("../jobFunction/"+id,function(data1,status){
							   
								  if(data1)
									{
										document.getElementById("pos_namep").innerHTML=data1;
									}
									else
									{
										alert("Some error occurred, Please report to web admin !!!");
										return false;
									}
								  
								  
								  });

}
		
	
	</script>
</head>

<body class="white_bg">

	<!-- HEADER -->
	<?php include 'UserHeader.php'; ?>
	<div class="clear"></div>
	
		
		<div class="column_m pos_rel">
		<!-- SUB-HEADER -->
	<div class="column_m hidden-xs hidden-sm lgtblue2_bg padt0" >
			<div class="column_m lgtblue2_bg" >
				<div class="wrap sub_header_brdclr_dblue bs_bb">
					<!-- Tab header -->
					<ul class="dflex alit_s justc_c mar0 pad0" style="justify-content: left;">
					<li class="dflex alself_fs marrl10 padrl5 height_93" >
							<a href="https://www.qmatchup.com/beta/user/index.php/NewPersonal/userAccount" class=" minwi_80p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz14 fsz15_a black_txt pblue2_txt_a  padrl10 padt20 "><div class="dflex alit_c pos_rel padr20">
							
								<img src="<?php echo $path;?>html/usercontent/images/wp.png" class="dblock marrla img_style">
								<div class="padl10">
									<h3 class="marb0 pad0 fsz30 " style="font-family: 'Audiowide', sans-serif;">Workplace</h3>
									<span class="fszf"><?php echo $company['company_name']; ?></span>
								</div>
								<div class="hei_60p pos_abs top5 right0 brdr"></div>
							</div></a>
						</li>
						
						<li class="dflex alit_s marrl10 padrl5"  style="height:93px;">
							<a href="../../../vacancy/index.php/SocialKarriar/vacancyAccount/<?php echo $data['cid']; ?>" class=" minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz14 fsz14_a sligtgrey_txt pblue2_txt_a popup_false pad10" data-target="#gratis_popup">
								<span class="mar10 fa fa-file-text-o hei_35p dflex alit_c justc_c talc fsz28 sligtgrey_txt pred2_txt_ph black_txt_pa"></span>
								<span class="dblock mart10">Social Karriärsida</span>
							</a>
						</li>
						<li class="dflex alit_s marrl10 padrl5" style="height:93px;">
								<a href="../../../vacancy/index.php/VacancyList/vacancyAccount/<?php echo $data['cid']; ?>" class=" minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz14 fsz15_a sligtgrey_txt pblue2_txt_a popup_false pad10">
									<span class="mar10 fa fa-home hei_35p dflex alit_c justc_c talc fsz28 sligtgrey_txt pred2_txt_ph black_txt_pa"></span>
									<span class="dblock mart10"> Rekrytering</span>
								</a>
							</li>
							
							<li class="dflex alit_s marrl10 padrl5" style="height:93px;">
								<a href="../../../index.php/ManageEmployee/magazineAccount/<?php echo $data['cid']; ?>" class="active minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz14 fsz15_a black_txt black_txt_a popup_false pad10">
									<span class="mar10 fa fa-book hei_35p dflex alit_c justc_c talc fsz28 black_txt pred2_txt_ph black_txt_pa"></span>
									<span class="dblock mart10">Medarbetar CRM</span>
								</a>
							</li>
							<li class="dflex alit_s marrl10 padrl5" style="height:93px;">
								<a href="../../../index.php/ManageCvBank/magazineAccount/<?php echo $data['cid']; ?>" class="minwi_100p dblock  brdb brdwi_3 brdclr_trans brdclr_pblue2_h brdclr_pblue2_a talc fsz14 fsz15_a sligtgrey_txt pblue2_txt_a popup_false pad10">
									<span class="mar10 fa fa-gears hei_35p dflex alit_c justc_c talc fsz28 sligtgrey_txt pred2_txt_ph pblue2_txt_a"></span>
									<span class="dblock mart10">CV Bank</span>
								</a>
							</li>
						
						
						</ul>
				</div>
			</div>
		</div>
			
		
			<div class="clear"></div>
			<!-- Top info -->
		<div class="scroll-fix column_m container hidden-xs hidden-sm" style="height:47px;">
			<div class="scroll-fix-wrap white_bg">
				<div class="wrap maxwi_100">
					<ul class="mar0 pad0 padt10  tall fsz15 padb15 padl10">
						<li class="diblock marrl10 new_j black_txt yellow_bg" > <a href="#" class="dblock pad5 fsz16 fsz16_a pblue2_txt_h pblue2_txt_a active new_j" data-target="#sales_popup" style="color: #121213;">HR</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock pad5 fsz15 fsz15_a sligtgrey_txt pyellow_txt_h pyellow_txt_a bold_a popup_false" data-target="#sales_popup">Sälj</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock pad5 fsz15 fsz15_a sligtgrey_txt pyellow_txt_h pyellow_txt_a bold_a popup_false" data-target="#gratis_popup_new">Marknad</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="dblock pad5 fsz15 fsz15_a sligtgrey_txt pyellow_txt_h pyellow_txt_a bold_a inkop" data-target="#gratis_popup_new">Inköp</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock pad5 fsz15 fsz15_a sligtgrey_txt pyellow_txt_h pyellow_txt_a bold_a popup_false" data-target="#gratis_popup_new">Ekonomi</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock pad5 fsz15 fsz15_a sligtgrey_txt pyellow_txt_h pyellow_txt_a bold_a popup_false" data-target="#gratis_popup_new">IT</a> </li>
						<li class="diblock marrl10 padrl5"> <a href="#" class="show_popup_modal dblock pad5 fsz15 fsz15_a sligtgrey_txt pyellow_txt_h pyellow_txt_a bold_a popup_false" data-target="#gratis_popup_new">Styrelse</a> </li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
			
		
	
	

	<!-- CONTENT -->
	<div class="column_m container zi5 padt30 mart30">
		<div class="wrap maxwi_100">

				<div class="xs-wi_100_30p dflex justc_sb alit_c bs_bb marb0 xs-marrl-15 padt2 xs-padrl15 xs-lgtgrey_bg">

        <div class="hidden-sm hidden-md hidden-lg opa0">
         <span class="fa fa-plus fsz20"></span>
        </div>
       
	 		
		<div class="marb0" style="width:720px;">
						<form action="" method="post">

						<div class="wd_search default-controls">

							<div class="xs-wi_100_30p fleft dflex justc_sb alit_c bs_bb  xs-marrl-15 padt2 xs-padrl15 xs-lgtgrey_bg">

								<div class="hidden-sm hidden-md hidden-lg opa0">
									<span class="fa fa-plus fsz20"></span>
								</div>
								<div class="tab-header dflex">
									<a href="#" data-id="tab-business"  name="act" data-extra="#new-business-btn,#business-actions" class="dblock martb5 padrl15 brd brdclr_segblue_h brdclr_segblue_a1 brdradtl3 yellow_bg_a lgn_hight_26 fsz14 midgrey_txt segblue_txt_h black_txt_a white_txt_ah active"  >Anställda</a>
									<a href="#" data-id="tab-people" data-extra="#new-person-btn,#user-actions" class="dblock martb5 padrl15 brd brdclr_segblue_h brdclr_segblue_a1 yellow_bg_a lgn_hight_26 fsz14 midgrey_txt segblue_txt_h black_txt_a white_txt_ah ">Konsulter</a>
									<a href="#" data-id="tab-reps"  name="rep_act" data-extra="#new-employee-btn,#reps-actions" class="dblock martb5 padrl15 brd brdclr_segblue_h brdclr_segblue_a1 brdradrb3 yellow_bg_a lgn_hight_26 fsz14 midgrey_txt segblue_txt_h white_txt_a white_txt_ah " >Praktikanter</a>
								</div>
								<div class="hidden-sm hidden-md hidden-lg">
									<span class="fa fa-filter fsz20"></span>
								</div>
							</div>

							<div class="bgcolor-light xs-wi_100 fright talr">
								<div class="xs-wi_100 dflex">
									<div class="expanding-input wi_120p hei_40p dinlblck flex_1 pos_rel marr3 valm">
										<div class="expanding-input-wrap wi_100 wi_250p_a xs-wi_100_a hei_40p bs_bb pos_abs top0 right0 brd brdrad3 white_bg trans_all3" value="0">
											<div class="hide-when-active wi_100 pos_abs top0 left0 lgn_hight_40 talc"> <span class="fa fa-search fsz18i clr-light"></span> <span>Sok</span> </div>
											<input type="text" id="searche" name="searche" class="wi_100 hei_100 pos_abs top0 left0 bs_bb padrl30 nobrd"> <span class="fa fa-search show-when-active pos_abs top0 left0 padl5 lgn_hight_40 fsz18i"></span>
											<a href="#" class="deactivate show-when-active pos_abs top0 right0 padr5 dark_grey_txt"> <span class="fa fa-close fleft lgn_hight_40 fsz18i"></span> </a>
										</div>
										
									</div>
									
									
									
									
									
									<a href="#" data-target=".wd_filters" data-base=".wd_search" class="expander-toggler hei_40p dinlblck bs_bb marr3 padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14 clr-default">
										<span class="hidden-xs">
											<span class="fa fa-angle-down down marr5"></span>
											<span class="fa fa-angle-up up marr5"></span>
											Filter
										</span>
										<span class="fa fa-phone visible-xs lgn_hight_38 fsz20"></span>
									</a>
									<div class="dinlblck hidden-xs hidden-sm valm">
										<div id="new-person-btn" class="dnone diblock_a ">
											<a href="#" class="hei_40p dblock bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg fsz18" title="Add new Person">
												<span class="fa fa-plus valm"></span>
											</a>
										</div>
										<div id="new-business-btn" class="dnone diblock_a active">
											<a href="#" class="hei_40p dblock bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg fsz18" title="Add new Business" >
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
									
									<!--<form action="CompanyList/updateCompanyEmployee" method="POST" id="update_employee" name="update_employee" accept-charset="ISO-8859-1">
									
									<a href="#" data-id="tab-business-employee" data-extra="#new-business-btn1,#business-actions" class="get-company-search business-actions-update dblock martb5 padrl15 brd brdclr_segblue_h brdclr_segblue_a blue_bg lgn_hight_26 fsz14 midgrey_txt segblue_txt_h white_txt_a white_txt_ah " style="background-color: #006CD1; color: #f8f9fb;" value="0" onclick="alertVirtual(virtual_id);">update</a>
									
									
									</form>-->
									
									<div class="dnone diblock_va pos_rel marl3 active" id="business-actions">
										<a href="#" class="action-button class-toggler hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" data-classes="active">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_siba zi1 zi3_siba pos_abs top105 right0">
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall">
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt" onclick="alertVirtual(virtual_id);">Move To</a></li>
												<input type="hidden" name="index_user_id" id="index_user_id" class="wi_100 hei_30p bs_bb pad5 brd fsz13" value="">
											</ul>
										</div>
										<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_siba zi1 pos_fix top0 left0" data-closest="#business-actions" data-target=".action-button" data-classes="active"></a>
									</div>
									
									
									<div class="dnone diblock_va pos_rel marl3" id="business-actions-company">
										<a href="#" class="action-button class-toggler hei_40p dinlblck bs_bb padrl15 brd brdrad3 lgn_hight_38 white_bg valm fsz14" data-classes="active">
											<span class="">Actions</span>
										</a>
										<div class="dnone dblock_siba zi1 zi3_siba pos_abs top105 right0">
											<ul class="minwi_160p mar0 pad0 padtb5 brd brdrad3 white_bg tall">
												<li class="dblock mar0 pad0"><a href="#" class="dblock padtb10 padrl20 lgtgrey2_bg_h dark_grey_txt" onclick="alertVirtualCompany(virtual_id);">Change Owner</a></li>
												<input type="hidden" name="index_company_id" id="index_company_id" class="wi_100 hei_30p bs_bb pad5 brd fsz13">
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
								<div class="filter_crumbs filter_crumbs_1 fsz13_333"> <a href="#" class="clear_filters clr-default">Clear filters</a> </div>
								
								
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
												<input type="text" name="location_search" placeholder="Search locations" class="wi_100 hei_32p bs_bb dblock padrl8 brdrad2 fsz14" data-list="#location_search_dl">
											</div>
											<!-- Checkbox filters -->
											<div class="filter filter-additional-permanent filter-checkbox marb5 fsz13_333">
												<label>
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="any_location" value="0" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> <span class="marl5 valm">Any location</span> </label>
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
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="1" data-text="Aktiebolag" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Aktiebolag
															<span class="count">(25 258)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="Sambruksförening" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Sambruksförening
															<span class="count">(6 578)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="Värdepappersfonder" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="1" data-text="Stockholm" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Stockholm
															<span class="count">(12 961)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="Sambruksförening" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Västra götaland
															<span class="count">(5 783)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="Värdepappersfonder" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="1" data-text="Bank, finans" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Bank, finans &amp; fö...
															<span class="count">(33 900)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="Juridik, ekonomi" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															Juridik, ekonomi ...
															<span class="count">(134)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="Fastighetsverksamhet" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="1" data-text="0" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															0
															<span class="count">(18 874)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="< 1 tkr" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															&lt; 1 tkr
															<span class="count">(4 273)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="1 - 499 tkr" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="1" data-text="0" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															0
															<span class="count">(22 275)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="1 - 4" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
														<span class="flex_1 dflex alit_c justc_sb marl5">
															1 - 4
															<span class="count">(4 919)</span>
														</span>
													</label>
											</div>
											<div class="filter filter-checkbox marb5 fsz13_333">
												<label class="dflex alit_c">
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="2" data-text="5 - 9" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
														<div class="icheckbox_minimal-aero" style="position: relative;"><input type="checkbox" name="cb1" value="1" data-text="Inaktiva bolag" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
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
												<input type="checkbox" name="convert_bool" class="default" data-true="Yes" data-false="No" data-text="Convert">												<div class="filter-slide-checkbox-wrap"><div class="checkbox-background"></div><a href="#" data-value="true" class="filter-slide-checkbox-option true">Yes</a><a href="#" data-value="false" class="filter-slide-checkbox-option false active">No</a><div class="clear"></div></div></div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="padt15"></div>
							</div>
						</div>

						<div class="clear"></div>
					</form>
					<div id="total_count"></div>
					
				</div>
		 
        <div class="hidden-sm hidden-md hidden-lg">
         <span class="fa fa-filter fsz20"></span>
        </div>
       </div>

				
				
				<!-- Total -->
				<div class="tab-content" id="tab-business">
					<div class="wi_100-240p container tab-header padb10 talc dark_grey_txt">
					
									<ul class="tab-header tab-header-custom  tab-header-custom5 xs-dnone lgtblue2_bg">
										<li class="">
											<a href="#" class="dblock tab_header_custom_a brdradt5 active header_color brdclr_pblue2_a brdwi_3 brdbb brdb_a " data-id="tab_inhouse_total" > <span class="count">5</span> </a>
										</li>
										<li class="active">
											<a href="#" data-id="tab_inhouse_property" class="brdclr_pblue2_a brdwi_3 brdbb brdb_a fsz14"  > <span class="count">3</span> <span>Register the employee</span> </a>
										</li>
										<li class="">
											<a href="#" data-id="tab_inhouse_visiting_address" class="brdclr_pblue2_a brdwi_3 brdbb brdb_a fsz14" > <span class="count">2</span> <span>Add a position</span> </a>
										</li>
										<li class="">
											<a href="#" data-id="tab_inhouse_invoicing_address" class="brdclr_pblue2_a brdwi_3 brdbb brdb_a fsz14" > <span class="count">0</span> <span>Invite/offer QID</span> </a>
										</li>
										<!--<li class="">
											<a href="#" data-id="tab_inhouse_contact_details" class="" > <span class="count">0</span> <span>Corporate</span> </a>
										</li>-->
										<li class="">
											<a href="#" data-id="tab_inhouse_closed_details" class="brdclr_pblue2_a brdwi_3 brdbb brdb_a fsz14" > <span class="count">0</span> <span>Exit</span> </a>
										</li>
										
										<div class="clear"></div>
									</ul>
									<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
										<option value="tab_inhouse_total" selected="">2</option>
										<option value="tab_inhouse_property">Not posted</option>
										<option value="tab_inhouse_visiting_address">Posted</option>
										<option value="tab_inhouse_invoicing_address">Published</option>
										<option value="tab_inhouse_contact_details">In progress</option>
										<option value="tab_inhouse_closed_details">Closed</option>
									</select>
									<div class="clear"></div>
								</div>
					<div class="pad15 brdrad3 marb10 lgtblue2_bg" style="width:718px;">
				<p class="pad0 fsz14">
				After years AS a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.

				 </p>
				   </div>
					<div class="wi_100 dflex alit_fs">
					
						<!-- Pagination -->
						<div class="tab-header talc lgn_hight_26 uppercase bold">
							<div class="wi_40p">
								<a href="#" class="dblock brdb brdclr_lgtgrey2 bg_0070e0_h bg_0070e0_a dark_grey_txt white_txt_h white_txt_a active" data-id="tab-total-all">All</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-a">a</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-b">b</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-c">c</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-d">d</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-e">e</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-f">f</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-g">g</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-h">h</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-i">i</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-j">j</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-k">k</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-l">l</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-m">m</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-n">n</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-o">o</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-p">p</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-q">q</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-r">r</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-s">s</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-t">t</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-u">u</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-v">v</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-w">w</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-x">x</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-y">y</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-total-z">z</a>
							</div>
						</div>

						<!-- Results -->
						<div class="flex_1 padl10">
							
							<div class="tab-content" id="tab-total-all">
							
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#total-all-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_0" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5 grey_txt nobold">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<!--<th class="wi_6p pad0 brdb"></th>-->
															<th class="padl10 padr10 brdb grey_txt nobold" style="text-align:left;">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold tall" style="text-align:left;">Name</th>
															<th class="padr10 brdb grey_txt nobold" style="text-align:left;">Score</th>
														<th class="wi_130p padtb5 brdb"></th>
														</tr>
													</thead>
													<tbody id="total_data">
													<?php 
													
													foreach($activeEmployeeDetail as $category => $value) 
													
												{  	
												?>
														<tr class="style_base bg_fffbcc_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#total-all-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<!--<td class="pad0 brdb  valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>-->
															<td class="pad10 brdb">
																<?php if($value['image_path']!=null || $value['image_path']!="") { ?><div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 " ><img src="<?php if(isset($value['image_path'])) { if(file_exists("../../../../profile-image/crop_".$value['image_path'])) echo "../../../../profile-image/crop_".$value['image_path']; else echo "../../../../profile-image/".$value['image_path']; } ?>" width="60" height="60" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;"> </div><?php } else { ?> <div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;" > <?php echo substr($value['last_name'],0,1); } ?> </div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz16 xs-fsz16">
																			<a href="#" class="get-company-info1 dark_grey_txt txt_0070e0_sbh" data-id="<?php echo 'a_'.$value['id']; ?>" id="<?php echo 'a_'.$value['id']; ?>"><?php echo $value['name']; ?></a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a"><?php echo $value['email']; ?></a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_2 brdrad50 bg_f talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_u']; ?></div>
																<div class="wi_40p hei_40p diblock brd brdclr_ffeb18 brdwi_2 brdrad50 bg_fffbcc talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_v']; ?></div>
															</td>
															<td class="pad5 brdb brdclr_cce6fa">
											<div class="dflex fxshrink_0">
												<a href="#" class="wi_70p hei_32p dflex alit_c justc_c vis_hid vis_vis_sbh vis_vis_sba brd brdrad5 bg_f dark_grey_txt">Share</a>
												<a href="#" class="wi_36p hei_32p dflex alit_c justc_c marl10 brd brdrad5 bg_f dark_grey_txt"><span class="fa fa-ellipsis-h"></span></a>
											</div>
										</td>
														</tr>
												<?php } ?>
														</tbody>
												</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" value="1" id="h_id" >View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-278 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="total-all-actions">
											<p class="padb10"><span id="total-all-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
							
							<div class="tab-content" id="tab-total-a">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#total-a-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5 grey_txt nobold">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold tall">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
												
													</thead>
													<tbody>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#total-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="dark_grey_txt txt_0070e0_sbh" data-id="facebook">Facebook</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#total-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">
																	<img src="<?php echo $path; ?>html/usercontent/images/kowaken-ghirmai.jpg" width="50" height="50" class="brdrad100" alt="Profile">
																</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class=" dark_grey_txt txt_0070e0_sbh" data-id="almatv">Almatv</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#total-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="apple">Apple</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#total-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="anglea">Anglea</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#total-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="ario">Ario</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" onclick="add_more_rows(this)">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="total-a-actions">
											<p class="padb10"><span id="total-a-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						
						</div>
					
					</div>					

				</div>
				
				<!-- Not posted -->
				<div class="tab-content" id="tab-not-posted">
					
					<div class="wi_100 dflex alit_fs">

						<!-- Pagination -->
						<div class="tab-header talc lgn_hight_26 uppercase bold">
							<div class="wi_40p">
							<a href="#" class="dblock brdb brdclr_lgtgrey2 bg_0070e0_h bg_0070e0_a dark_grey_txt white_txt_h white_txt_a active" data-id="tab-not-posted-all">All</a>
								
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-a">a</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-b">b</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-c">c</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-d">d</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-e">e</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-f">f</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-g">g</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-h">h</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-i">i</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-j">j</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-k">k</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-l">l</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-m">m</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-n">n</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-o">o</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-p">p</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-q">q</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-r">r</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-s">s</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-t">t</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-u">u</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-v">v</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-w">w</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-x">x</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-y">y</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-not-posted-z">z</a>
							</div>
						</div>

						<!-- Results -->
						<div class="flex_1 padl10">
							
							<div class="tab-content" id="tab-not-posted-all">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#not-posted-all-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5 grey_txt nobold">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold tall">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
												
													</thead>
													<tbody id="screen_data">
													<?php 
													
													foreach($screening as $category => $value) 
													
												{  	
												?>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#not-posted-all-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb  valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
															
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c   uppercase fsz26 xs-fsz20" ><?php if($value['image_path']!=null || $value['image_path']!="") { ?><img src="<?php if(isset($value['image_path'])) { if(file_exists("../../../../../../profile-image/crop_".$value['image_path'])) echo "../../../../../../profile-image/crop_".$value['image_path']; else echo "../../../../../../profile-image/".$value['image_path']; } ?>" width="50" height="50" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 50%;"> <?php } else { echo substr($value['last_name'],0,1); } ?></div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="../../../../../../applicant-cv.php?id=<?php echo encrypt_decrypt('encrypt',$value['id']); ?>&status=hired" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="<?php echo $value['user_login_id']; ?>"><?php echo $value['name']; ?></a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_2 brdrad50 bg_f talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_u']; ?></div>
																<div class="wi_40p hei_40p diblock brd brdclr_ffeb18 brdwi_2 brdrad50 bg_fffbcc talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_v']; ?></div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="<?php if($value['star']>=1)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=2)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=3)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=4)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=5)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																<?php echo date('Y-m-d', strtotime("+0 days", strtotime($value['created_on']))); ?>
															</td>
														</tr>
												<?php } ?>
													</tbody>
												</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" value="1" id="h_id" onclick="add_screen_rows(this,'screen')">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="not-posted-all-actions">
											<p class="padb10"><span id="not-posted-all-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
							
							<div class="tab-content" id="tab-not-posted-a">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#not-posted-a-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
													</thead>
													<tbody>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#not-posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="facebook">Facebook</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#not-posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">
																	<img src="<?php echo $path; ?>html/usercontent/images/kowaken-ghirmai.jpg" width="50" height="50" class="brdrad100" alt="Profile">
																</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="almatv">Almatv</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#not-posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="apple">Apple</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#not-posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="anglea">Anglea</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#not-posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="ario">Ario</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" onclick="add_more_rows(this)">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="not-posted-a-actions">
											<p class="padb10"><span id="not-posted-a-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						
						</div>
					
					</div>					

				</div>
				
				<!-- Posted -->
				<div class="tab-content" id="tab-posted">
					
					<div class="wi_100 dflex alit_fs">

						<!-- Pagination -->
						<div class="tab-header talc lgn_hight_26 uppercase bold">
							<div class="wi_40p">
							<a href="#" class="dblock brdb brdclr_lgtgrey2 bg_0070e0_h bg_0070e0_a dark_grey_txt white_txt_h white_txt_a active" data-id="tab-posted-all">All</a>
								
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-a">a</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-b">b</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-c">c</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-d">d</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-e">e</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-f">f</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-g">g</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-h">h</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-i">i</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-j">j</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-k">k</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-l">l</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-m">m</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-n">n</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-o">o</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-p">p</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-q">q</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-r">r</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-s">s</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-t">t</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-u">u</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-v">v</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-w">w</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-x">x</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-y">y</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-posted-z">z</a>
							</div>
						</div>

						<!-- Results -->
						<div class="flex_1 padl10">
							
							<div class="tab-content" id="tab-posted-all">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#posted-all-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5 grey_txt nobold">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold tall">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
												
													</thead>
													<tbody id="phone_data">
													<?php 
													
													foreach($phone as $category => $value) 
													
												{  	
												?>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#posted-all-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb  valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c   uppercase fsz26 xs-fsz20"><?php if($value['image_path']!=null || $value['image_path']!="") { ?><img src="<?php if(isset($value['image_path'])) { if(file_exists("../../../../../../profile-image/crop_".$value['image_path'])) echo "../../../../../../profile-image/crop_".$value['image_path']; else echo "../../../../../../profile-image/".$value['image_path']; } ?>" width="50" height="50" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 50%;"> <?php } else { echo substr($value['last_name'],0,1); } ?></div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="../../../../../../applicant-cv.php?id=<?php echo encrypt_decrypt('encrypt',$value['id']); ?>&status=hired" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="<?php echo $value['user_login_id']; ?>"><?php echo $value['name']; ?></a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_2 brdrad50 bg_f talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_u']; ?></div>
																<div class="wi_40p hei_40p diblock brd brdclr_ffeb18 brdwi_2 brdrad50 bg_fffbcc talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_v']; ?></div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="<?php if($value['star']>=1)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=2)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=3)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=4)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=5)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																<?php echo date('Y-m-d', strtotime("+0 days", strtotime($value['created_on']))); ?>
															</td>
														</tr>
												<?php } ?>
													</tbody></table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" value="1" id="h_id" onclick="add_phone_rows(this,'phone')">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="posted-all-actions">
											<p class="padb10"><span id="posted-all-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
							
							<div class="tab-content" id="tab-posted-a">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#posted-a-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
													</thead>
													<tbody>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="facebook">Facebook</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">
																	<img src="<?php echo $path; ?>html/usercontent/images/kowaken-ghirmai.jpg" width="50" height="50" class="brdrad100" alt="Profile">
																</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="almatv">Almatv</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="apple">Apple</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="anglea">Anglea</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#posted-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="ario">Ario</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" onclick="add_more_rows(this)">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="posted-a-actions">
											<p class="padb10"><span id="posted-a-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						
						</div>
					
					</div>					

				</div>

				<!-- Published -->
				<div class="tab-content" id="tab-published">
					
					<div class="wi_100 dflex alit_fs">

						<!-- Pagination -->
						<div class="tab-header talc lgn_hight_26 uppercase bold">
							<div class="wi_40p">
							<a href="#" class="dblock brdb brdclr_lgtgrey2 bg_0070e0_h bg_0070e0_a dark_grey_txt white_txt_h white_txt_a active" data-id="tab-published-all">All</a>
								
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-a">a</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-b">b</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-c">c</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-d">d</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-e">e</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-f">f</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-g">g</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-h">h</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-i">i</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-j">j</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-k">k</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-l">l</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-m">m</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-n">n</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-o">o</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-p">p</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-q">q</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-r">r</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-s">s</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-t">t</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-u">u</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-v">v</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-w">w</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-x">x</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-y">y</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-published-z">z</a>
							</div>
						</div>

						<!-- Results -->
						<div class="flex_1 padl10">
							
							<div class="tab-content" id="tab-published-all">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#published-all-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5 grey_txt nobold">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold tall">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
												
													</thead>
													<tbody id="face_data">
													<?php 
													
													foreach($face as $category => $value) 
													
												{  	
												?>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#published-all-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb  valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c   uppercase fsz26 xs-fsz20"><?php if($value['image_path']!=null || $value['image_path']!="") { ?><img src="<?php if(isset($value['image_path'])) { if(file_exists("../../../../../../profile-image/crop_".$value['image_path'])) echo "../../../../../../profile-image/crop_".$value['image_path']; else echo "../../../../../../profile-image/".$value['image_path']; } ?>" width="50" height="50" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 50%;"> <?php } else { echo substr($value['last_name'],0,1); } ?></div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="../../../../../../applicant-cv.php?id=<?php echo encrypt_decrypt('encrypt',$value['id']); ?>&status=hired" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="<?php echo $value['user_login_id']; ?>"><?php echo $value['name']; ?></a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_2 brdrad50 bg_f talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_u']; ?></div>
																<div class="wi_40p hei_40p diblock brd brdclr_ffeb18 brdwi_2 brdrad50 bg_fffbcc talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_v']; ?></div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="<?php if($value['star']>=1)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=2)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=3)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=4)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=5)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																<?php echo date('Y-m-d', strtotime("+0 days", strtotime($value['created_on']))); ?>
															</td>
														</tr>
												<?php } ?>
													</tbody>
											</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" value="1" id="h_id" onclick="add_face_rows(this,'face')">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="published-all-actions">
											<p class="padb10"><span id="published-all-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
							
							<div class="tab-content" id="tab-published-a">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#published-a-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
													</thead>
													<tbody>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#published-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="facebook">Facebook</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#published-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">
																	<img src="<?php echo $path; ?>html/usercontent/images/kowaken-ghirmai.jpg" width="50" height="50" class="brdrad100" alt="Profile">
																</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="almatv">Almatv</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#published-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="apple">Apple</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#published-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="anglea">Anglea</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#published-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="ario">Ario</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" onclick="add_more_rows(this)">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="published-a-actions">
											<p class="padb10"><span id="published-a-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						
						</div>
					
					</div>					

				</div>
		
				<!-- In progress -->
				<div class="tab-content" id="tab-in-progress">
					
					<div class="wi_100 dflex alit_fs">

						<!-- Pagination -->
						<div class="tab-header talc lgn_hight_26 uppercase bold">
							<div class="wi_40p">
							<a href="#" class="dblock brdb brdclr_lgtgrey2 bg_0070e0_h bg_0070e0_a dark_grey_txt white_txt_h white_txt_a active" data-id="tab-in-progress-all">All</a>
								
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-a">a</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-b">b</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-c">c</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-d">d</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-e">e</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-f">f</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-g">g</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-h">h</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-i">i</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-j">j</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-k">k</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-l">l</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-m">m</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-n">n</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-o">o</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-p">p</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-q">q</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-r">r</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-s">s</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-t">t</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-u">u</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-v">v</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-w">w</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-x">x</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-y">y</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-in-progress-z">z</a>
							</div>
						</div>

						<!-- Results -->
						<div class="flex_1 padl10">
							
							<div class="tab-content" id="tab-in-progress-all">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#in-progress-all-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5 grey_txt nobold">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold tall">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
												
													</thead>
													<tbody id="offered_data">
													<?php 
													
													foreach($offered as $category => $value) 
													
												{  	
												?>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#in-progress-all-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb  valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c   uppercase fsz26 xs-fsz20"><?php if($value['image_path']!=null || $value['image_path']!="") { ?><img src="<?php if(isset($value['image_path'])) { if(file_exists("../../../../../../profile-image/crop_".$value['image_path'])) echo "../../../../../../profile-image/crop_".$value['image_path']; else echo "../../../../../../profile-image/".$value['image_path']; } ?>" width="50" height="50" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 50%;"> <?php } else { echo substr($value['last_name'],0,1); } ?></div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="../../../../../../applicant-cv.php?id=<?php echo encrypt_decrypt('encrypt',$value['id']); ?>&status=hired" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="<?php echo $value['user_login_id']; ?>"><?php echo $value['name']; ?></a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_2 brdrad50 bg_f talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_u']; ?></div>
																<div class="wi_40p hei_40p diblock brd brdclr_ffeb18 brdwi_2 brdrad50 bg_fffbcc talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_v']; ?></div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="<?php if($value['star']>=1)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=2)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=3)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=4)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=5)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																<?php echo date('Y-m-d', strtotime("+0 days", strtotime($value['created_on']))); ?>
															</td>
														</tr>
												<?php } ?>
													</tbody>
													</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" value="1" id="h_id" onclick="add_offered_rows(this,'offered')">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="in-progress-all-actions">
											<p class="padb10"><span id="in-progress-all-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
							
							<div class="tab-content" id="tab-in-progress-a">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#in-progress-a-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
													</thead>
													<tbody>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#in-progress-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="facebook">Facebook</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#in-progress-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">
																	<img src="<?php echo $path; ?>html/usercontent/images/kowaken-ghirmai.jpg" width="50" height="50" class="brdrad100" alt="Profile">
																</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="almatv">Almatv</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#in-progress-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="apple">Apple</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#in-progress-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="anglea">Anglea</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#in-progress-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="ario">Ario</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" onclick="add_more_rows(this)">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="in-progress-a-actions">
											<p class="padb10"><span id="in-progress-a-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						
						</div>
					
					</div>					

				</div>
				
				<!-- Сlosed -->
				<div class="tab-content" id="tab-closed">
					
					<div class="wi_100 dflex alit_fs">

						<!-- Pagination -->
						<div class="tab-header talc lgn_hight_26 uppercase bold">
							<div class="wi_40p">
							<a href="#" class="dblock brdb brdclr_lgtgrey2 bg_0070e0_h bg_0070e0_a dark_grey_txt white_txt_h white_txt_a active" data-id="tab-closed-all">All</a>
								
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-a">a</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-b">b</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-c">c</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-d">d</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-e">e</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-f">f</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-g">g</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-h">h</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-i">i</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-j">j</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-k">k</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-l">l</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-m">m</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-n">n</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-o">o</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-p">p</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-q">q</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-r">r</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-s">s</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-t">t</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-u">u</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-v">v</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-w">w</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-x">x</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-y">y</a>
								<a href="#" class="dblock brdb brdclr_lgtgrey2 lgtgrey_bg segblue_bg_h segblue_bg_a dark_grey_txt white_txt_h white_txt_a" data-id="tab-closed-z">z</a>
							</div>
						</div>

						<!-- Results -->
						<div class="flex_1 padl10">
							
							<div class="tab-content" id="tab-closed-all">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#closed-all-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5 grey_txt nobold">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb grey_txt nobold">Image</th>
															<th class="wi_300 padr10 brdb grey_txt nobold tall">Name</th>
															<th class="padr10 brdb grey_txt nobold">Score</th>
															<th class="padr10 brdb grey_txt nobold">Review</th>
															<th class="brdb grey_txt nobold">Applied</th>
														</tr>
												
													</thead>
													<tbody id="hired_data">
													<?php 
													
													foreach($hired as $category => $value) 
													
												{  	
												?>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#closed-all-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb  valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c   uppercase fsz26 xs-fsz20"><?php if($value['image_path']!=null || $value['image_path']!="") { ?><img src="<?php if(isset($value['image_path'])) { if(file_exists("../../../../../../profile-image/crop_".$value['image_path'])) echo "../../../../../../profile-image/crop_".$value['image_path']; else echo "../../../../../../profile-image/".$value['image_path']; } ?>" width="50" height="50" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 50%;"> <?php } else { echo substr($value['last_name'],0,1); } ?></div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="../../../../../../applicant-cv.php?id=<?php echo encrypt_decrypt('encrypt',$value['id']); ?>&status=hired" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="<?php echo $value['user_login_id']; ?>"><?php echo $value['name']; ?></a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_2 brdrad50 bg_f talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_u']; ?></div>
																<div class="wi_40p hei_40p diblock brd brdclr_ffeb18 brdwi_2 brdrad50 bg_fffbcc talc lgn_hight_36  fsz14 lgtgrey_txt"><?php echo $value['point_v']; ?></div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="<?php if($value['star']>=1)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=2)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=3)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=4)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																	<span class="<?php if($value['star']>=5)echo 'fa fa-star'; else echo 'fa fa-star-o'; ?>"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																<?php echo date('Y-m-d', strtotime("+0 days", strtotime($value['created_on']))); ?>
															</td>
														</tr>
												<?php } ?>
													</tbody>
													</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" value="1" id="h_id" onclick="add_hired_rows(this,'hired')">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="closed-all-actions">
											<p class="padb10"><span id="closed-all-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
							
							<div class="tab-content" id="tab-closed-a">
								<div class="dflex alit_fs">
									
									<!-- Center content -->
									<div class="flex_1 dflex fleft padrbl15">
										<form data-count-target="#closed-a-selected-count">
											<div class="xs-wi_100vw-90p xs-ovfl_auto">
												<table class="wi_100 brdsptb_10" cellpadding="0" cellspacing="0">
													<thead>
														<tr>
															<th class="xs-dnone sm-dnone padr5">
																<input type="checkbox" name="check_all" class="check_all" />
															</th>
															<th class="wi_6p pad0 brdb"></th>
															<th class="padl10 padr10 brdb">Image</th>
															<th class="wi_300 padr10 brdb">Name</th>
															<th class="padr10 brdb">Score</th>
															<th class="padr10 brdb">Review</th>
															<th class="brdb">Applied</th>
														</tr>
													</thead>
													<tbody>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#closed-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="facebook">Facebook</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#closed-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">
																	<img src="<?php echo $path; ?>html/usercontent/images/kowaken-ghirmai.jpg" width="50" height="50" class="brdrad100" alt="Profile">
																</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="almatv">Almatv</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#closed-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="apple">Apple</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#closed-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="anglea">Anglea</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
														<tr class="style_base bg_ebf4fd_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#closed-a-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															<td class="pad0 brdb panlyellow_bg valb">
																<div class="wi_6p hei_10p lgtgrey2_bg"></div>
															</td>
															<td class="padrbl10 brdb">
																<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c brdrad1000 lgtgrey_bg uppercase fsz26 xs-fsz20">E</div>
															</td>
															<td class="padrb10 brdb">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz20 xs-fsz16">
																			<a href="crm_company.html" class="get-company-info dark_grey_txt txt_0070e0_sbh" data-id="ario">Ario</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">johan@gmail.com</a></div>
																	<div class="mart2">
																		Employee
																		<span class="padrl5">·</span>
																		Connected
																	</div>
																</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_f talc lgn_hight_36 bold fsz14 lgtgrey_txt">10</div>
																<div class="wi_40p hei_40p diblock brd brdclr_f2f0f0 brdwi_5 brdrad50 bg_fffbcc talc lgn_hight_36 bold fsz14 lgtgrey_txt">0</div>
															</td>
															<td class="padrb10 brdb ws_now">
																<div class="regyellow_txt">
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star"></span>
																	<span class="fa fa-star-o"></span>
																	<span class="fa fa-star-o"></span>
																</div>
																<div class="fsz11">
																	0 reviews
																</div>
															</td>
															<td class="brdb ws_now">
																2017-10-19
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="mart20 talc">
												<a href="#" class="add_more_rows dblue_btn" onclick="add_more_rows(this)">View more</a>
											</div>
										</form>
									</div>

									<!-- Right content -->
									<div class="wi_240p shrink_0 xs-dnone sm-dnone pos_rel zi5 mart-164 padl20">
										<div class="marb50 vis_hid vis_vis_v" id="closed-a-actions">
											<p class="padb10"><span id="closed-a-selected-count"></span> items selected</p>
											<p class="padb5"><a href="#" class="dblock padtb3 padrl20 brdrad3 bg_0070e0 ws_now talc lgn_hight_29 fsz14 white_txt">Download</a></p>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/move.svg" width="32" height="32" class="valm" />
													<span class="valm">Move</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/copy.svg" width="32" height="32" class="valm" />
													<span class="valm">Copy</span>
												</a>
											</div>
											<div>
												<a href="#" class="dblock fsz14 txt_0070e0">
													<img src="<?php echo $path; ?>html/usercontent/images/dropbox icons/delete.svg" width="32" height="32" class="valm" />
													<span class="valm">Delete</span>
												</a>
											</div>
										</div>
										
										<div class="pad10 brd">
											<div class="mart-5 marr-5 talr">
												<a href="#" class="diblock pad5 fsz14 txt_c"><span class="fa fa-close"></span></a>
											</div>
											<div class="padrl20 talc fsz16">
												<img src="<?php echo $path; ?>html/usercontent/images/dropbox-icon.png" class="dblock marrla marb15" />
												<div class="padrl10 padb15">
													Need more space?
													<br>
													Try <b> Pro Business.</b>
												</div>
												<div class="padb10"><a href="#" class="dblock padrl20 brdrad3 brd brdclr_0070e0 ws_now talc lgn_hight_29 fsz14 txt_0070e0">Download</a></div>
											</div>
										</div>
									</div>

								</div>
							</div>
						
						</div>
					
					</div>					

				</div>
				
		</div>
	</div>
	<div class="clear"></div>
<script>
		function add_total_rows(link,id){
								
								var id_val=parseInt($(link).attr('value'))+1;
								
								
								var html1="";
								var send_data={};
		send_data.id=parseInt($(link).attr('value'));
		$(link).attr('value',id_val);
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../../../JobApplicants/totalAppliedMore",
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
		
		function add_screen_rows(link,id){
								
								var id_val=parseInt($(link).attr('value'))+1;
								
								
								var html1="";
								var send_data={};
		send_data.id=parseInt($(link).attr('value'));
		$(link).attr('value',id_val);
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../../../JobApplicants/screeningMore",
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
		
		function add_phone_rows(link,id){
								
								var id_val=parseInt($(link).attr('value'))+1;
								
								
								var html1="";
								var send_data={};
		send_data.id=parseInt($(link).attr('value'));
		$(link).attr('value',id_val);
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../../../JobApplicants/phoneMore",
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
		
		function add_face_rows(link,id){
								
								var id_val=parseInt($(link).attr('value'))+1;
								
								
								var html1="";
								var send_data={};
		send_data.id=parseInt($(link).attr('value'));
		$(link).attr('value',id_val);
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../../../JobApplicants/faceMore",
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
		
		function add_offered_rows(link,id){
								
								var id_val=parseInt($(link).attr('value'))+1;
								
								
								var html1="";
								var send_data={};
		send_data.id=parseInt($(link).attr('value'));
		$(link).attr('value',id_val);
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../../../JobApplicants/offeredMore",
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
		
		function add_hired_rows(link,id){
								
								var id_val=parseInt($(link).attr('value'))+1;
								
								
								var html1="";
								var send_data={};
		send_data.id=parseInt($(link).attr('value'));
		$(link).attr('value',id_val);
		send_data.message=id;
		$.ajax({
            type:"POST",
            url:"../../../JobApplicants/hiredMore",
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
		
		</script>
		
	<!-- Mobile bottom menu -->
	<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">

		<!-- primary menu -->
		<div class="tab-content active" id="mob-primary-menu" style="display: block;">
			<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
				<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
					<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
					<span>Senaste</span>
				</a>
				<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
					<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
					<span>Filer</span>
				</a>
				<div class="tab-header">
					<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
						<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtgrey_bg brdrad100 talc lgn_hight_40 fsz32">
							<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
							<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
						</div>
					</a>
				</div>
				<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
					<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
					<span>Foton</span>
				</a>
				<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
					<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
						<span>...</span>
					</div>
					<span>More</span>
				</a>
			</div>
		</div>

		<!-- add  menu -->
		<div class="tab-content padb10" id="mob-add-menu">
			<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
			<ul class="mar0 pad0 brdrad3 white_bg fsz14">
				<li class="dblock mar0 padrl15 brdb">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
							Activity
						</a>
				</li>
				<li class="dblock mar0 padrl15 brdb">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
							Deal
						</a>
				</li>
				<li class="dblock mar0 padrl15 brdb">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
							Note
						</a>
				</li>
				<li class="dblock mar0 padrl15 brdb">
					<a href="crm_add_company.html" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
							Company
						</a>
				</li>
				<li class="dblock mar0 padrl15 brdb">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
							Photo
						</a>
				</li>
				<li class="dblock mar0 padrl15">
					<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
							<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
							Audio Note
						</a>
				</li>
			</ul>
			<div class="tab-header mart10 brdrad3 white_bg talc lgn_hight_50 fsz18">
				<a href="#" class="" data-id="mob-primary-menu">Cancel</a>
			</div>
		</div>
	</div>

	<div class="hei_80p"></div>


	<!-- Dynamic filter menu -->
	<ul class="filter-add-menu filter-add-radio hide" id="filter-add-category">
		<li class="has-submenu">
			<a href="#" class="dblock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1"
			 data-name="radio2" data-value="submenu1">
				Web, Mobile &amp; Software Dev<span class="fa fa-chevron-right fright"></span>
			</a>
			<ul>
				<li>
					<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1"
					 data-name="radio2" data-value="submenu1">
						All subcategories <span class="count">(0)</span>
					</a>
				</li>
				<li class="has-submenu">
					<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu11">
						Software Development<span class="count">(0)</span><span class="fa fa-chevron-right fright"></span>
					</a>
					<ul>
						<li>
							<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1"
							 data-name="radio2" data-value="submenu1">
								All subcategories <span class="count">(0)</span>
							</a>
						</li>
						<li class="has-submenu">
							<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
							 data-value="submenu111">
								Software Development<span class="count">(0)</span><span class="fa fa-chevron-right fright"></span>
							</a>
							<ul>
								<li>
									<a href="#" class="dlock" data-text="Web, Mobile &amp; Software Dev" data-category="Category" data-additional="checkbox1"
									 data-name="radio2" data-value="submenu1">
										All subcategories <span class="count">(0)</span>
									</a>
								</li>
								<li>
									<a href="" class="dblock" data-text="Software Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
									 data-value="submenu1111">
										Software Development<span class="count">(0)</span>
									</a>
								</li>
								<li>
									<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
									 data-value="submenu1112">
										Ecommerce Development<span class="count">(0)</span>
									</a>
								</li>
								<li>
									<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
									 data-value="submenu1113">
										Game Development<span class="count">(0)</span>
									</a>
								</li>
							</ul>
							<div class="clear"></div>
						</li>
						<li>
							<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
							 data-value="submenu112">
								Ecommerce Development<span class="count">(0)</span>
							</a>
						</li>
						<li>
							<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
							 data-value="submenu113">
								Game Development<span class="count">(0)</span>
							</a>
						</li>
					</ul>
					<div class="clear"></div>
				</li>
				<li>
					<a href="" class="dblock" data-text="Ecommerce Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu12">
						Ecommerce Development<span class="count">(0)</span>
					</a>
				</li>
				<li>
					<a href="" class="dblock" data-text="Game Development" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu13">
						Game Development<span class="count">(0)</span>
					</a>
				</li>
			</ul>
			<div class="clear"></div>
		</li>
		<li class="has-submenu">
			<a href="#" class="dblock" data-text="IT &amp; Networking" data-category="Category" data-additional="checkbox1" data-name="radio2"
			 data-value="submenu2">
				IT &amp; Networking<span class="fa fa-chevron-right fright"></span>
			</a>
			<ul>
				<li>
					<a href="#" class="dlock" data-text="IT &amp; Networking" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu2">
						All subcategories <span class="count">(0)</span>
					</a>
				</li>
				<li>
					<a href="" class="dblock" data-text="Database Administration" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu21">
						Database Administration<span class="count">(0)</span>
					</a>
				</li>
				<li>
					<a href="" class="dblock" data-text="ERP / CRM Software" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu22">
						ERP / CRM Software<span class="count">(0)</span>
					</a>
				</li>
				<li>
					<a href="" class="dblock" data-text="Information Security" data-category="Category" data-additional="checkbox1" data-name="radio2"
					 data-value="submenu23">
						Information Security<span class="count">(0)</span>
					</a>
				</li>
			</ul>
			<div class="clear"></div>
		</li>
	</ul>

	<!-- Locations input datalist -->
	<ul class="filter-datalist-menu filter-text-datalist-menu filter-add-checkbox hide" id="location_search_dl">
		<li disabled="disabled">
			<span class="dblock">
				Regions
			</span>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Africa" data-category="Location" data-value="africa" data-name="africa">
				Africa
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Antarctica" data-category="Location" data-value="antarctica" data-name="antarctica">
				Antarctica
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Asia" data-category="Location" data-value="asia" data-name="asia">
				Asia
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Europe" data-category="Location" data-value="europe" data-name="europe">
				Europe
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Oceania" data-category="Location" data-value="oceania" data-name="oceania">
				Oceania
			</a>
		</li>
		<li disabled="disabled">
			<span class="dblock">
				Countries
			</span>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Albania" data-category="Location" data-value="albania" data-name="albania">
				Albania
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Kazakhstan" data-category="Location" data-value="kazakhstan" data-name="kazakhstan">
				Kazakhstan
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Russia" data-category="Location" data-value="russia" data-name="russia">
				Russia
			</a>
		</li>
	</ul>

	<!-- Tests input datalist -->
	<ul class="filter-datalist-menu filter-text-datalist-menu filter-add-checkbox hide" id="tests_search_dl">
		<li>
			<a href="#" class="dblock" data-text="3ds Max 9" data-category="Test" data-additional="test_scores" data-value="3ds_Max_9"
			 data-name="3ds_Max_9">
				3ds Max 9
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Accounting Principles" data-category="Test" data-additional="test_scores" data-value="Accounting_Principles"
			 data-name="Accounting_Principles">
				Accounting Principles
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Accounting Skills Test" data-category="Test" data-additional="test_scores" data-value="Accounting_Skills_Test"
			 data-name="Accounting_Skills_Test">
				Accounting Skills Test
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Accounts Payable" data-category="Test" data-additional="test_scores" data-value="Accounts_Payable"
			 data-name="Accounts_Payable">
				Accounts Payable
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Adobe Flash CS3" data-category="Test" data-additional="test_scores" data-value="Adobe_Flash_CS3"
			 data-name="Adobe_Flash_CS3">
				Adobe Flash CS3
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Adobe Illustrator" data-category="Test" data-additional="test_scores" data-value="Adobe_Illustrator"
			 data-name="Adobe_Illustrator">
				Adobe Illustrator
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="C++ Programming" data-category="Test" data-additional="test_scores" data-value="C++_Programming"
			 data-name="C++_Programming">
				C++ Programming
			</a>
		</li>
		<li>
			<a href="#" class="dblock" data-text="Compiler Design" data-category="Test" data-additional="test_scores" data-value="compiler_design"
			 data-name="compiler_design">
				Compiler Design
			</a>
		</li>
	</ul>

	<!-- Filter input datalist -->
	<div class="filter-datalist-menu filter-range-datalist-menu hide" id="area_search_dl">
		<!-- * NOTE
			- data-weight is required for min/max relationships
			- based on it max values will be hidden if min is selected and otherwise
		-->
		<div class="filter-range-menu-wrap">
			<ul class="filter-range-menu-min wi_50 fleft bs_bb mar0 pad0">
				<li disabled="disabled">
					<span class="dblock">Min</span>
				</li>
				<li>
					<a href="#" class="dblock" data-text="10m²" data-category="Area" data-weight="10">10m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="20m²" data-category="Area" data-weight="20">20m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="30m²" data-category="Area" data-weight="30">30m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="40m²" data-category="Area" data-weight="40">40m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="50m²" data-category="Area" data-weight="50">50m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="60m²" data-category="Area" data-weight="60">60m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="70m²" data-category="Area" data-weight="70">70m²</a>
				</li>
			</ul>
			<ul class="filter-range-menu-max wi_50 fleft bs_bb mar0 pad0">
				<li disabled="disabled">
					<span class="dblock">Max</span>
				</li>
				<li>
					<a href="#" class="dblock" data-text="10m²" data-category="Area" data-weight="10">10m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="20m²" data-category="Area" data-weight="20">20m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="30m²" data-category="Area" data-weight="30">30m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="40m²" data-category="Area" data-weight="40">40m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="50m²" data-category="Area" data-weight="50">50m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="60m²" data-category="Area" data-weight="60">60m²</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="70m²" data-category="Area" data-weight="70">70m²</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="padtb10 talr">
			<button class="datalist-menu-close marr5 lgtgrey_btn min_height">OK</button>
		</div>
	</div>

	<!-- Filter input datalist -->
	<div class="filter-datalist-menu filter-range-datalist-menu hide" id="price_search_dl">
		<div class="filter-range-menu-wrap">
			<ul class="filter-range-menu-min wi_50 fleft bs_bb mar0 pad0">
				<li disabled="disabled">
					<span class="dblock">Min</span>
				</li>
				<li>
					<a href="#" class="dblock" data-text="50 kr" data-category="Price" data-weight="0">50 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="100 tkr" data-category="Price" data-weight="10">100 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="200 tkr" data-category="Price" data-weight="20">200 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="300 tkr" data-category="Price" data-weight="30">300 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="400 tkr" data-category="Price" data-weight="40">400 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="500 tkr" data-category="Price" data-weight="50">500 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="750 tkr" data-category="Price" data-weight="60">750 000</a>
				</li>
			</ul>
			<ul class="filter-range-menu-max wi_50 fleft bs_bb mar0 pad0">
				<li disabled="disabled">
					<span class="dblock">Max</span>
				</li>
				<li>
					<a href="#" class="dblock" data-text="50 kr" data-category="Price" data-weight="0">50 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="100 tkr" data-category="Price" data-weight="10">100 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="200 tkr" data-category="Price" data-weight="20">200 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="300 tkr" data-category="Price" data-weight="30">300 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="400 tkr" data-category="Price" data-weight="40">400 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="500 tkr" data-category="Price" data-weight="50">500 000</a>
				</li>
				<li>
					<a href="#" class="dblock" data-text="750 tkr" data-category="Price" data-weight="60">750 000</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="padtb10 talr">
			<button class="datalist-menu-close marr5 lgtgrey_btn min_height">OK</button>
		</div>
	</div>
<div class="crm-popup profile-popup wi_720p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top50p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16">
		<a href="#" class="popup-close dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f">Close</a>
		<div class="popup-content"></div>
	</div>

	<!-- Company info popup -->
	<div class="crm-popup company-popup wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold">Close</a>
		<form action="../addNewEmployee/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
		<div class="popup-content padb15"></div>
		</form>
	</div>
	
	<div class="crm-popup company-popup-edit wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold">Close</a>
		<form action="../editEmployee/<?php echo $data['cid']; ?>" method="POST" id="save_indexinged" name="save_indexinged" accept-charset="ISO-8859-1">
		<div class="popup-content padb15"></div>
		</form>
	</div>
	
	<div class="crm-popup company-popup-pos wi_600p maxwi_90 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top50p right30 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2" style="background-color: #fdfdfd;">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold">Close</a>
		<form action="../addNewPosition/<?php echo $data['cid']; ?>" method="POST" id="save_indexingp" name="save_indexingp" accept-charset="ISO-8859-1">
		<div class="popup-content padb15"></div>
		</form>
	</div>

	<!-- User info popup -->
	<div class="crm-popup employee-popup wi_720p maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi100 top70p right0 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right5p orange_btn brdrad3 bold">Close</a>
		<div class="popup-content padb15"></div>
	</div>

	<!-- Reps info popup -->
	<div class="crm-popup reps-popup wi_720p maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi100 top70p right0 bs_bb bxsh_0220_01 brdradtl5 white_bg trans_all2">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="popup-close dblock hidden-xs hidden-sm pos_abs top0 right5p orange_btn brdrad3 bold">Close</a>
		<div class="popup-content padb15"></div>
	</div>

	<script>
		// A list of countries to use in country select countrols
		var countries_list = "<?php echo $countryList; ?>";
		var location_list = "<?php echo $locationList; ?>";
		var job_list = "<?php echo $jobList; ?>";
		
		$(document).ready(function () {
			var $window = $(window),
				$body = $(document.body),
				$company_popup = $('.company-popup'),
				$company_popup_content = $company_popup.find('.popup-content'),
				$company_popup_edit = $('.company-popup-edit'),
				$company_popup_content_edit = $company_popup_edit.find('.popup-content'),
				$company_popup_pos = $('.company-popup-pos'),
				$company_popup_content_pos = $company_popup_pos.find('.popup-content'),
				$employee_popup = $('.employee-popup'),
				$employee_popup_content = $employee_popup.find('.popup-content');
			    $popups = $('.crm-popup'),
				$profile_popup = $popups.filter('.profile-popup'),
				$profile_popup_content = $profile_popup.find('.popup-content');
			// Show / close popups
			var show_crm_popup = function ($popup) {
				clearTimeout($popup.data('tm'));
				$popup.css('display', 'block');
				requestAnimationFrame(function () {
					$popup.addClass('active');
				});
			}
			var close_crm_popup = function ($popup) {
				if ($popup.is(':visible')) {
					$popup
						.removeClass('active')
						.data('tm', setTimeout(function () {
							$popup.css('display', 'none');
						}, 200));

					if ($popup.data('keep') == true) {
						$popup.data('keep', false);
						show_crm_popup($popup.data('$pop'));
					}
				}
			}

			// Populate popup with company info
			var populate_company = function(data, $container){
				var html = '<h2 class="marb10 padrl20 padtb10 fsz18 black_txt yellow_bg">' + data.label + '</h2>';
				if(data.tabs){
					for(var tb = 0, tbL = data.tabs.length; tb < tbL; tb++){
						var tab = data.tabs[tb];
						html += '<div class="padrbl20">';
						html += '<div class="marrl5 padb10 brdb fsz13">';
						html += '<a href="#' + tab.id + '" class="expander-toggler black_txt' + ((tab.state && tab.state === 'active') ? ' target_shown' : '')  + '"><span class="dnone_pa fa fa-chevron-down"></span><span class="dnone diblock_pa fa fa-chevron-up"></span> ' + tab.label + '</a>';
						if(tab.postfix){
							html += tab.postfix;
						}
						html += '</div>';
						html += '<div id="' + tab.id + '" class="' + ((tab.state && tab.state === 'active') ? '' : 'dnone ')  + '"><div class="wi_100 dflex fxwrap_w">';
						
						if(tab.fields){
							for(var f = 0, fL = tab.fields.length; f < fL; f++){
								var field = tab.fields[f];

								html += '<div class="' + field.classes + ' bs_bb padrl5 padb15">';
								
								if(field.type === 'line'){
									html += '</div>';
								}
								else{
									html += '<label class="dblock marb5 fsz11">' + field.label + '</label><div class="wi_100 dflex alit_c">';
									
									if(field.prefix){
										html += field.prefix;
									}
									
									if(field.type === 'select'){
										
										if(field.name ==='job_family')
										{
											
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_family1(this.value);">';
										}
										else if(field.name ==='job_function') 
										{
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_function1(this.value);">';
										}
										if(field.name ==='job_familyp')
										{
											
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_family2(this.value);">';
										}
										else if(field.name ==='job_functionp') 
										{
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="job_function2(this.value);">';
										}
										else if(field.name ==='permision') 
										{
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13" onchange="empPermission(this.value);">';
										}
										else
										{
											html += '<select id="' + field.name + '" name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13">';
										}
										
										var field_val = field.value;

										if(field.options){
											if(typeof field.options === 'string'){
												try{
													var options = eval(field.options);
													if(field_val){
														html += options.replace('value="' + field_val + '"', 'value="' + field_val + '" selected');
													}
													else{
														html += options;
													}
													
												}
												catch(e){}
											}
											else if(typeof field.options === 'object'){
												for(var o = 0, oL = field.options.length; o < oL; o++){
													var option = field.options[o];
													html += '<option value="' + option.value + '"' + (field_val == option.value ? ' selected' : '')  + '>' + option.label + '</option>';
												}
											}
										}

										html += '</select>';
									}
									else if(field.type === 'textarea'){
										html += '<textarea name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" class="wi_100 bs_bb pad5 brd fsz13">' + (field.value ? field.value : '') + '</textarea>';
									}
									else{
										if(field.name=='rprice')
										{
											html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class="wi_100 hei_30p bs_bb pad5 brd fsz13" min="0"/>';
										}
										else
										{
											html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class="wi_100 hei_30p bs_bb pad5 brd fsz13" />';
										}
									}

									if(field.postfix){
										html += field.postfix;
									}

									html += '</div></div>';
								}
							}
						}

						if(tab.thead || tab.tbody){
							html += '<div class="wi_100 padl5"><table width="100%" border="0" cellpadding="0" cellspacing="0">';
							
							if(tab.thead){
								html += '<thead class="fsz11 lgtgrey2_bg"><tr>';
								for(var t = 0, tL = tab.thead.length; t < tL; t++){
									html += '<th align="left" class="' + (tab.thead[t].class ? tab.thead[t].class : '') + '"><div class="padtb10">' + tab.thead[t].text + '</div></th>';
								}
								html += '</tr></thead>';
							}
							if(tab.tbody){
								html += '<tbody class="fsz13"><tr>';
								for(var t = 0, tL = tab.tbody.length; t < tL; t++){
									var trs = tab.tbody[t];
									html += '<tr>';
									for(var d = 0, dL = trs.length; d < dL; d++){
										html += '<td class="brdb"><div class="padtb10">' + trs[d] + '</div></td>';
									}
									html += '</tr>';
								}
								html += '</tr></tbody>';
							}

							html += '</table></div>';
						}

						html += '</div></div></div>';
					}
				}

				if(data.buttons){
					html += '<div class="container padrl20 tall">';
					for(var b = 0, bL = data.buttons.length; b < bL; b++){
						html += data.buttons[b];
					}
					html += '</div>';
				}
				//alert(html);
				$container
					.removeClass('active')
					.html(html);
			}

			$body.on('click', '.get-position-info1', function () {
				var $this = $(this);
				
				
				$company_popup_content_pos.addClass('active');

				$.ajax({
					url: '../editActivePosition',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
			
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content_pos);
					}

					// Error
					else{
						$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content_pos.removeClass('active');
				});

				if (!$company_popup_pos.hasClass('active')) {
					show_crm_popup($company_popup_pos);
				}
				return false;
			});

			
			
			$body.on('click', '.get-position-info', function () {
				var $this = $(this);
				
				
				$company_popup_content_pos.addClass('active');

				$.ajax({
					url: '../addPosition',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
			
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content_pos);
					}

					// Error
					else{
						$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content_pos.removeClass('active');
				});

				if (!$company_popup_pos.hasClass('active')) {
					show_crm_popup($company_popup_pos);
				}
				return false;
			});

			$body.on('click', '.get-active-position-info', function () {
				var $this = $(this);
				
				
				$company_popup_content_pos.addClass('active');

				$.ajax({
					url: '../addActivePosition',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
			
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content_pos);
					}

					// Error
					else{
						$company_popup_content_pos.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content_pos.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content_pos.removeClass('active');
				});

				if (!$company_popup_pos.hasClass('active')) {
					show_crm_popup($company_popup_pos);
				}
				return false;
			});

$body.on('click', '.get-company-info', function () {
				var $this = $(this);
				
				
				$company_popup_content.addClass('active');

				$.ajax({
					url: '../addEmployee',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
			
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content);
					}

					// Error
					else{
						$company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content.removeClass('active');
				});

				if (!$company_popup.hasClass('active')) {
					show_crm_popup($company_popup);
				}
				return false;
			});

		$body.on('click', '.get-company-info1', function () {
				var $this = $(this);
				var c_id=$(this).closest('td').find('a').attr('data-id');
				
				$company_popup_content_edit.addClass('active');

				$.ajax({
					url: '../editEmployee',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
						'employee_id' : c_id,
					},
				})
				.done(function(data){
			
					// Success
					if(data.status == 'ok'){
						populate_company(data.message, $company_popup_content_edit);
					}

					// Error
					else{
						$company_popup_content_edit.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$company_popup_content_edit.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$company_popup_content_edit.removeClass('active');
				});

				if (!$company_popup_edit.hasClass('active')) {
					show_crm_popup($company_popup_edit);
				}
				return false;
			});

		
			// Populate popup with company info
			var populate_profile = function(data, $container){
				var html = '<div><h2 class="xxs-dnone mar0 padrl20 padtb10 lgn_hight_20 fsz18 white_txt frmlblue_bg">' + data.user.name + '</h2>';
				html += '<div class="padb80 xxs-pad0 xxs-padb80">';
				
				// Top info
				html += '<div class="xxs-mar0 pad20 xxs-pad0 bxsh_016_577376_035 xxs-bxsh_none bg_f"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035">';
				html += '<div class="hei_125p dnone xxs-dblock padt20 bg_31932c">';
				html += '<div class="minwi_0 dflex alit_fs justc_sb marb20 padrl10 txt_f"><a href="#" class="popup-close wi_70p fxshrink_0 dblock pad5"><img src="images/close-white.svg" width="18" height="18"></a>';
				html += '<div class="minwi_0 flex_1 talc">';
				if(data.job.description){
					html += '<div class="ovfl_hid ws_now txtovfl_el fsz18">' + data.job.description + '</div>';
				}
				if(data.job.match){
					html += '<div class="fsz16">' + data.job.match + '</div>';
				}
				html += '</div>';
				html += '<div class="wi_70p fxshrink_0 dflex justc_fe fsz26"><a href="#" class="fa fa-thumbs-o-up marl10 txt_f"></a><a href="#" class="fa fa-thumbs-o-down marl10 txt_f"></a></div></div>';
				if(data.job.best_match){
					html += '<div class="hei_20p diblock pos_rel padl10 bg_14bff5 uppercase lgn_hight_20 fsz15 txt_f"><span class="pos_abs top0 left100 brd brdwi_10 brdclr_14bff5 brdrclr_transi"></span>' + data.job.best_match + '</div>';
				}
				html += '</div>';
				
				if(data.user.avatar){
					html += '<div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50 padr15 xxs-pad0 xxs-marb5"><img src="' + data.user.avatar + '" width="100" height="100" class="dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brdrad100" title="' + data.user.name + '" alt="' + data.user.name + '"></div>';
				}

				html += '<div class="flex_1 xxs-dflex xxs-fxdir_col xxs-padrl20 xxs-talc">';
				html += '<div class="dflex xxs-dblock xxs-order_1 alit_fs justc_sb padb10 xxs-pad0"><h3 class="mar0 marb10 xxs-mar0 pad0 bold fsz22">' + data.user.name + '</h3>';
				if(data.user.rate){
					html += '<div class="xxs-dnone marb10 fsz22">' + data.user.rate.amount + ' /' + data.user.rate.period + '</div>';
				}
				html += '</div>';

				if(data.user.description){
					html += '<div class="xxs-order_3 marb10 xxs-marb5 lgn_hight_24 xxs-bold fsz15 xxs-fsz26">' + data.user.description + '</div>';
				}
				if(data.user.rising_talent){
					html += '<div class="dnone xxs-dblock xxs-order_4 marb15 uppercase txt_14bff5"><span class="fa fa-star"></span> ' + data.user.rising_talent + '</div>';
				}
				if(data.user.rate){
					html += '<div class="dnone xxs-dblock xxs-order_5 txt_8e"><span class="bold fsz26 txt_37a000">' +data.user.rate.amount + '</span> /' + data.user.rate.period + '</div>';
				}
				if(data.user.location || data.user.time){
					html += '<div class="xxs-order_2 marb10 xxs-marb15 xxs-fsz18 xxs-txt_8e">';
					html += '<span class="fa fa-map-marker xxs-dnone"></span> <span class="xxs-dnone">' + data.user.location + ' - ' + data.user.time.full + '</span>';
					html += '<span class="dnone xxs-dblock">' + data.user.location + ', ' + data.user.time.short + '</span>';
					html += '</div>';
				}

				if(data.user.skills){
					html += '<div class="xxs-dnone marl-5 fsz12">';
					var inline_skills = data.user.skills.inline,
						inline_more_skills = data.user.skills.inlne_more;
					if(inline_skills){
						for(var s = 0, sL = inline_skills.length; s < sL; s++){
							html += '<span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_skills[s] + '</span>';
						}	
					}
					if(inline_more_skills){
						for(var s = 0, sL = inline_more_skills.length; s < sL; s++){
							html += '<span class="dnone diblock_pa marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_more_skills[s] + '</span>';
						}
						html += '<a href="#" class="class-toggler diblock dnone_pa marbl10 bold fsz13 txt_37a000" data-target="parent" data-classes="active">See more</a>';
					}
					html += '</div>';
				}

				if(data.user.jobs || data.user.hours){
					html += '<div class="dnone xxs-dblock xxs-order_6 mart20 padtb15 brdt txt_8e">';
					if(data.user.jobs){
						html += '<span class="marrl5"><span class="bold txt_0">' + data.user.jobs + '</span> jobs</span>';
					}
					if(data.user.hours){
						html += '<span class="marrl5"><span class="bold txt_0">' + data.user.hours + '</span> hours</span>';
					}
					html += '</div>';
				}

				html += '</div></div>';
				
				if(data.sections){
					var overview;

					for(var s = 0, sL = data.sections.length; s < sL; s++){
						var section = data.sections[s];
						if(section.tag === 'overview'){
							overview = section;
							break;
						}
					}

					if(overview){
						html += '<div class="xxs-dnone mart10 padt20 brdt"><h3 class="mar0 marb20 pad0 bold fsz22">' + overview.label + '</h3>';
						if(overview.content){
							if(overview.content.html){
								html += overview.content.html;
							}
							if(overview.content.more){
								html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
							}
						}
						html += '</div>';
					}
				}

				html += '</div>';


				// Sections
				if(data.sections){
					for(var s = 0, sL = data.sections.length; s < sL; s++){
						var section = data.sections[s];
						html += '<div class="mart20 xxs-mart15 xxs-marrl10 bxsh_016_577376_035 bg_f' + (section.class ? ' ' + section.class : '') + '">';
						html += '<h3 class="mar0 pad20 xxs-padt10 xxs-padb15 brdb xxs-nobrd xxs-talc bold xxs-fntwei_n fsz22 xxs-txt_8e">' + section.label + '</h3>';

						// - section content
						if(section.content){
							html += '<div class="pad20 xxs-pad15 xxs-padt0">';
							
							if(section.content.html){
								html += section.content.html;
							}

							if(section.content.more){
								html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
							}

							var inline_content = section.content.inline;
							if(inline_content){
								for(var i = 0, iL = inline_content.length; i < iL; i++){
									html += '<span class="diblock marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_content[i] + '</span>';
								}
							}

							var inline_content_more = section.content.inline_more;
							if(inline_content_more){
								for(var i = 0, iL = inline_content_more.length; i < iL; i++){
									html += '<span class="dnone diblock_pa marl5 marb10 padtb5 padrl10 brdrad4 bg_e0 bg_37a000_h lgn_hight_s1 txt_f_h">' + inline_content_more[i] + '</span>';
								}
								html += '<a href="#" class="class-toggler wi_100 dblock dnone_pa mart10 talc bold txt_37a000" data-target="parent" data-classes="active">See more</a><a href="#" class="class-toggler wi_100 dnone dblock_pa mart10 talc bold txt_37a000" data-target="parent" data-classes="active">See less</a>';
							}
							html += '</div>';
						}


						//  - timeline
						if(section.timeline){
							html += '<div class="padt20 xxs-padt0 xxs-padrl15 padb5"><div class="career_timeline xs-mar0 xs-padrl20 xs-nobrd xxs-fsz16"><span class="trend_start xs-dnone"></span>';
							for(var t = 0, tL = section.timeline.length; t < tL; t++){
								var timeline = section.timeline[t];
								html += '<div class="career_year_exp pos_rel marb15 padb15 xs-brdb">';

								if(timeline.year){
									html += '<span class="year_trend xs-pos_stai xs-marb5"><span>' + timeline.year + '</span></span>';
								}
								if(timeline.title){
									html += '<div class="padb5 fsz18 xxs-fsz17 txt_0">' + timeline.title + '</div>';
								}
								if(timeline.short_description){
									html += '<p>' + timeline.short_description + '</p>';
								}
								if(timeline.description){
									html += '<div>' + timeline.description + '</div>';
								}

								html += '</div>';
							}
							html += '</div></div>';
						}
						html += '</div>';
					}
				}
				
				html += '</div><div class="wi_720p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot0 right0 bs_bb pad10 bg_f"><div class="dflex talc bold"><div class="wi_50 padrl10"><a href="#" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Message</a></div><div class="wi_50 padrl10"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Hire</a></div></div></div></div>';
				$container
					.removeClass('active')
					.html(html);
			}



			// Show company popup and call population function
			/*$body.on('click', '.get-company-info', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($employee_popup);
					$company_popup_content.addClass('active');

					$.ajax({
						url: '../../profileInfo',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){

						// Success
						if(data.status == 'ok'){
							populate_company(data.message, $company_popup_content);
						}

						// Error
						else{
							$company_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$company_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$company_popup_content.removeClass('active');
					});

					if (!$company_popup.hasClass('active')) {
						show_crm_popup($company_popup);
					}
					return false;
				}
			});
*/
			// Show new company popup
			// Show employee popup and call population function
			$body.on('click', '.get-employee-info', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($company_popup);
					$employee_popup.data({
						'keep': $this.data('keep'),
						'$pop': $company_popup
					});
					$employee_popup_content.addClass('active');

					$.ajax({
						url: 'employee_info.php',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){

						// Success
						if(data.status == 'ok'){
							populate_employees(data.message, $employee_popup_content);
						}

						// Error
						else{
							$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$employee_popup_content.removeClass('active');
					});

					if (!$employee_popup.hasClass('active')) {
						show_crm_popup($employee_popup);
					}
					return false;
				}
			});

			// Show new employee popup
			$body.on('click', '#new-employee-btn a', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($company_popup);
					$employee_popup.data({
						'keep': $this.data('keep'),
						'$pop': $company_popup
					});
					$employee_popup_content.addClass('active');

					$.ajax({
						url: 'new_employee_info.php',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){

						// Success
						if(data.status == 'ok'){
							populate_employees(data.message, $employee_popup_content);
						}

						// Error
						else{
							$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$employee_popup_content.removeClass('active');
					});

					if (!$employee_popup.hasClass('active')) {
						show_crm_popup($employee_popup);
					}
					return false;
				}
			});

			// Show new person popup
			$body.on('click', '#new-person-btn a', function () {
				var $this = $(this);
				console.log($this);
				if ($window.width() > 991) {
					close_crm_popup($company_popup);
					$employee_popup.data({
						'keep': $this.data('keep'),
						'$pop': $company_popup
					});
					$employee_popup_content.addClass('active');

					$.ajax({
						url: 'new_person_info.php',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){

						// Success
						if(data.status == 'ok'){
							populate_employees(data.message, $employee_popup_content);
						}

						// Error
						else{
							$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$employee_popup_content.removeClass('active');
					});

					if (!$employee_popup.hasClass('active')) {
						show_crm_popup($employee_popup);
					}
					return false;
				}
			});

			// Show new company person popup
			$body.on('click', '.get-new-employee', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($company_popup);
					$employee_popup.data({
						'keep': $this.data('keep'),
						'$pop': $company_popup
					});
					$employee_popup_content.addClass('active');

					$.ajax({
						url: 'new_company_person_info.php',
						type: 'POST',
						dataType: 'json',
						data: {
							'id': $this.data('id'),
						},
					})
					.done(function(data){

						// Success
						if(data.status == 'ok'){
							populate_employees(data.message, $employee_popup_content);
						}

						// Error
						else{
							$employee_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
						}
					})
					.fail(function(){
						$employee_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
					})
					.always(function(){
						$employee_popup_content.removeClass('active');
					});

					if (!$employee_popup.hasClass('active')) {
						show_crm_popup($employee_popup);
					}
					return false;
				}
			});

			// Close popup
			$body.on('click', '.crm-popup .popup-close', function () {
				close_crm_popup($(this).closest('.crm-popup'));
				return false;
			});

			
			

			// Count selected
			$body.on('ifChecked ifUnchecked', 'input[type=checkbox].toggle-visited', function(event){
				var $this = $(this),
					$form = $this.closest('form'),
					$count_target = $form.data('$count_target'),
					$inputs = $form.find('input[type=checkbox].toggle-visited:checked');
				
				if(!$count_target){
					$count_target = $($form.data('count-target'));
					$form.data('$count_target', $count_target);
				}
				if($count_target[0]){
					$count_target.html($inputs.length);
				}
			});
		
		});
	</script>


	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/applicantCss/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
</body>

</html>