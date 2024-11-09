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
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
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
function confirmEmployee(id)
{
	
	$("#location_id_employee").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_employee").addClass('active')
	$("#gratis_popup_employee").attr('style','display:block');
	
}
function confirmOffer(id)
{
	
	$("#location_id_offer").val(id);
	$("#popup_fade").addClass('active')
	$("#popup_fade").attr('style','display:block');
	$("#gratis_popup_offer").addClass('active')
	$("#gratis_popup_offer").attr('style','display:block');
	
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
		
		function searchCompany()
			{
				var send_data={};
				
				send_data.id=$("#cid_number").val();
				$.ajax({
					type:"POST",
					url:"<?php echo $newPath; ?>searchCompanyDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched_company").html('');
						$("#searched_company").append(data1);
						
					}
				});
				
			}
			
		function searchCompanySuppliers()
			{
				var send_data={};
				
				send_data.id=$("#cid_number_supplier").val();
				$.ajax({
					type:"POST",
					url:"<?php echo $newPath; ?>searchCompanyDetailSuppliers",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search_suppliers").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched_company").html('');
						$("#searched_company").append(data1);
						
					}
				});
				
			}
			
			function searchCompanyStudents()
			{
				var send_data={};
				
				send_data.id=$("#cid_number_student").val();
				$.ajax({
					type:"POST",
					url:"<?php echo $newPath; ?>searchCompanyDetailStudents",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search_students").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched_company").html('');
						$("#searched_company").append(data1);
						
					}
				});
				
			}
			
			
			function searchCompanyTenates()
			{
				var send_data={};
				
				send_data.id=$("#cid_number_tenates").val();
				$.ajax({
					type:"POST",
					url:"<?php echo $newPath; ?>searchCompanyDetailTenates",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search_tenates").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched_company").html('');
						$("#searched_company").append(data1);
						
					}
				});
				
			}
		
		function updateErr()
		{
			$("#errInvite").html('');
			$("#errInvite").html('Please select you role');
			return false;
		}
		
		function selectRole(id)
		{
			
			$("#errInvite").html('');
			if(id==2)
			{
				document.getElementById("phoneSelectC").style.display='block';
				document.getElementById("c2").style.display='block';
				document.getElementById("c1").style.display='none';
				document.getElementById("c0").style.display='none';
			}
			else if(id==1)
			{
				document.getElementById("phoneSelectC").style.display='none';
				document.getElementById("c2").style.display='none';
				document.getElementById("c1").style.display='block';
				document.getElementById("c0").style.display='none';
			}
			else
			{
				document.getElementById("phoneSelectC").style.display='none';
				document.getElementById("c2").style.display='none';
				document.getElementById("c1").style.display='none';
				document.getElementById("c0").style.display='block';
			}
			
		}
		
		function inviteManager()
		{
			$("#errInvite").html('');
			if($("#email_idc").val()=="")
			{
				$("#errInvite").html("Please enter email!!!");
				return false;
			}
			document.getElementById("invite_save").submit();
		}
		
		function checkRequest()
		{
			if($("#request_id").val()==0)
			{
				alert("Please select request type!!!");
				return false;
			}
			document.getElementById("save_request_company").submit();
		}
		
		
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>

	 
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  >Consents</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc   xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >These are your private consents, <?php echo $row_summary['first_name']; ?></a></div>
					 
			
			 
					<div class="tab-header martb10 padb10 xs-talc brdb2_ffde00 nobrdt nobrdl nobrdr talc">
                                            <a href="shareMonitorRequestList" class="dinlblck mar5 padrl10 bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir" >Request</a>
                                            <a href="shareMonitorShow" class="dinlblck mar5 padrl10  nobrd bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" >Active</a>
                                             <a href="#" class="dinlblck mar5 padrl30  nobrd bg_ffde00_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h black_txt_a white_txt_ah ffamily_avenir active" >Sent</a>
                                              <a href="shareMonitorRejectedList" class="padrl30_a padrl10 fsz18 midgrey_txt lgn_hight_36 "  ><i class="fas fa-trash-alt"></i></a>

                                        </div>
										<table class="wi_100 marb10 hidden" cellpadding="0" cellspacing="0" id="mytablesent">

																	<thead class="fsz16 brdb brdwi_2 nobrdt nobrdl nobrdr">
																		<tr class="fsz16">
																		
																			<th class="pad5  nobold  tall xs-wi_100 brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt ffamily_avenir">Employer</div>
																			</th>

																			<th class="pad5  nobold   tall brdb brdwi_2 nobrdt nobrdl nobrdr">

																			</th>
																			<th class="pad5  nobold  tall brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt"></div>
																			</th>
																			<th class="pad5 wi_60  nobold  tall brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt"></div>
																			</th>
																			 
																			<th class="pad5  nobold  wi_80p tall brdb brdwi_2 nobrdt nobrdl nobrdr fright">
																				<div class="padtb5 black_txt"><a href="#" class="show_popup_modal" data-target="#gratis_popup_company_search" >+Lägg till </a></div>
																			</th>
																		</tr>

																	</thead>
																			</table>
											 
											<?php $i=0;
												
												foreach($requestPendingDetail as $category => $value) 
												{
													
													
												?> 
											
												<a href="../ConsentProfile/sentAccount/<?php echo $value['enc']; ?>"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Employer</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25); ?></span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
															</a>
	 
												<?php } ?>
	 
												<div  id="myRequest">
										</div>	
										<div class="clear"></div>
										<div class="padt20 padb10 talc <?php if($requestPendingCount['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_my(this);">View more</a>
									</div>
									
										<script>
										function add_more_my(link) {
										//var $tbody = $("#rejected");
										//alert($tbody.html); return false;
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										//send_data.message=id;
										$.ajax({
											type:"POST",
											url:"<?php echo $newPath; ?>moreRequestDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#myRequest"),
												html=html1;
												//alert(data1); 
												$tbody
												.append($(html))
												.find('input.check')
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
	 
	 
										 
										
										<table class="wi_100 marb10 hidden" cellpadding="0" cellspacing="0" id="mytablesent">

																	<thead class="fsz16 brdb brdwi_2 nobrdt nobrdl nobrdr">
																		<tr class="fsz16">
																		
																			<th class="pad5  nobold  tall   brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt ffamily_avenir">Landlord</div>
																			</th>

																			<th class="pad5  nobold   tall brdb brdwi_2 nobrdt nobrdl nobrdr">

																			</th>
																			<th class="pad5 wi_60 nobold xs-wi_33 tall brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt"></div>
																			</th>
																			<th class="pad5  nobold wi_80p xs-wi_30 xs-padl10 tall brdb brdwi_2 nobrdt nobrdl nobrdr ">
																				<div class="padtb5 black_txt"><a href="#" class="show_popup_modal " data-target="#gratis_popup_company_search_tenates" >+Lägg till </a></div>
																			</th>
																		</tr>

																	</thead>
																			</table>
											 
											<?php $i=0;
												
												foreach($requestPendingDetailTenants as $category => $value) 
												{
													
													
												?> 
											
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Landlord</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25); ?></span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
	 
												<?php } ?>
	 
												<div  id="RequestLandlord">
													</div>	
										<div class="clear"></div>
										<div class="padt20 padb10 talc <?php if($requestPendingCountTenants['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_myTenants(this);">View more</a>
									</div>	

										<script>
										function add_more_myTenants(link) {
											//var $tbody = $("#rejected");
											//alert($tbody.html); return false;
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"<?php echo $newPath; ?>moreRequestDetailTenants",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#RequestLandlord"),
													html=html1;
													//alert(data1); 
													$tbody
													.append($(html))
													.find('input.check')
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
									
								<table class="wi_100 marb10 hidden" cellpadding="0" cellspacing="0" id="mytablesent">

																	<thead class="fsz16 brdb brdwi_2 nobrdt nobrdl nobrdr">
																		<tr class="fsz16">
																		
																			<th class="pad5  nobold  tall   brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt ffamily_avenir">Skola</div>
																			</th>

																			<th class="pad5  nobold   tall brdb brdwi_2 nobrdt nobrdl nobrdr">

																			</th>
																			<th class="pad5  nobold wi_60 xs-wi_33 tall brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt"></div>
																			</th>
																			<th class="pad5  nobold  wi_80p xs-wi_30  tall brdb brdwi_2 nobrdt nobrdl nobrdr ">
																				<div class="padtb5 black_txt"><a href="#" class="show_popup_modal " data-target="#gratis_popup_company_search_students" >+Lägg till </a></div>
																			</th>
																		</tr>

																	</thead>
																			</table>
											 
											<?php $i=0;
												
												foreach($requestPendingDetailStudents as $category => $value) 
												{
													
													
												?> 
											
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">School</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25); ?></span>  
																	</div>
																	
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>		 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
	 
												<?php } ?>
	 
												<div  id="RequestSchool">
													</div>	
										<div class="clear"></div>
										<div class="padt20 padb10 talc <?php if($requestPendingCountStudents['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_myStudents(this);">View more</a>
									</div>	
									
									<script>
										function add_more_myStudents(link) {
											//var $tbody = $("#rejected");
											//alert($tbody.html); return false;
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"<?php echo $newPath; ?>moreRequestDetailStudents",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#RequestSchool"),
													html=html1;
													//alert(data1); 
													$tbody
													.append($(html))
													.find('input.check')
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
										
										<table class="wi_100 marb10 hidden" cellpadding="0" cellspacing="0" id="mytablesent">

																	<thead class="fsz16 brdb brdwi_2 nobrdt nobrdl nobrdr">
																		<tr class="fsz16">
																		
																			<th class="pad5  nobold  tall   brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt ffamily_avenir">Supplier</div>
																			</th>

																			<th class="pad5  nobold   tall brdb brdwi_2 nobrdt nobrdl nobrdr">

																			</th>
																			<th class="pad5  nobold wi_60  tall brdb brdwi_2 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt"></div>
																			</th>
																			<th class="pad5 wi_90p nobold  xs-padl15  tall brdb brdwi_2 nobrdt nobrdl nobrdr fright">
																				<div class="padtb5 black_txt"><a href="#" class="show_popup_modal" data-target="#gratis_popup_company_search_suppliers" >+Lägg till </a></div>
																			</th>
																		</tr>

																	</thead>
																			</table>
											 
											<?php $i=0;
												
												foreach($requestPendingDetailSupliers as $category => $value) 
												{
													
													
												?> 
											
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Supplier</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25); ?></span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
	 
												<?php } ?>
	 
												<div  id="RequestSuppliers">
													</div>	
										<div class="clear"></div>
										<div class="padt20 padb10 talc <?php if($requestPendingCountSuppliers['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_mySuppliers(this);">View more</a>
									</div>

										<script>
										function add_more_mySuppliers(link) {
											//var $tbody = $("#rejected");
											//alert($tbody.html); return false;
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"<?php echo $newPath; ?>moreRequestDetailSuppliers",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#RequestSuppliers"),
													html=html1;
													//alert(data1); 
													$tbody
													.append($(html))
													.find('input.check')
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
										
									<?php $i=0;
												
												foreach($kinRequestSentDetail as $category => $value) 
												{
													
													
												?> 
											
												<a href="../ConsentKinRequest/kinInformation/<?php echo $value['enc']; ?>"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Kin Request</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['name']),0,25); ?></span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
															</a>
												<?php } ?>
	 
												<div  id="RequestKin">
													</div>	
										<div class="clear"></div>
										<div class="padt20 padb10 talc <?php if($kinRequestSentCount['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_sentkin(this);">View more</a>
									</div>

										<script>
										function add_more_sentkin(link) {
											//var $tbody = $("#rejected");
											//alert($tbody.html); return false;
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"moreSentKinRequestDetail",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#RequestKin"),
													html=html1;
													//alert(data1); 
													$tbody
													.append($(html))
													.find('input.check')
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
										
	<div class="clear"></div>



</div>
 
</div>
<div class="clear"></div>
</div>
 



<div class="clear"></div>
<div class="hei_80p hidden-xs"></div>

 
<!-- Popup fade -->
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

</div>

<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search_suppliers">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt tall">Anslut till en Leverantör</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in din leverantörs namn eller organisationsnummer i en följd och klicka på sök (utan bindestreck) </span>
				</div>
				
				
			</div>
			
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					
					<input type="text" id="cid_number_supplier" name="cid_number_supplier" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Identification Number">
				</div>
			</div>
			<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompanySuppliers();">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search_students">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 tall black_txt">Anslut till en Skola</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in Skolans namn och klicka på Sök</span>
				</div>
				
				
			</div>
			
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					
					<input type="text" id="cid_number_student" name="cid_number_student" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Identification Number">
				</div>
			</div>
			<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompanyStudents();">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5 " id="gratis_popup_company_search_tenates">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt tall">Anslut till en Landlord</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in din Landlord/bostadsrättsförenings organisationsnummer i en följd och klicka på sök (utan bindestreck) </span>
				</div>
				
				
			</div>
			
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					
					<input type="text" id="cid_number_tenates" name="cid_number_tenates" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Identification Number">
				</div>
			</div>
			<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompanyTenates();">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt tall">Anslut till en Employer</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in Employerns organisationsnummer i en följd och klicka på sök (utan bindestreck) </span>
				</div>
				
				
			</div>
			
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					<input type="text" id="cid_number" name="cid_number" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Identification Number">
				</div>
			</div>
			<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompany();">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_company_searched" id="gratis_popup_company_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_company">
				
				
			</div>
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5 gratis_popup_company" id="gratis_popup_company">
		<div class="modal-content pad25 nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Bjud in ett företag</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Fyll i fälten nedan för att skicka en inbjudan om att registrera ett företag. </span>
				</div>
				
				
			</div>
			<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
				
				<div class="padb10 ">
					
					<div class="pos_rel ">
						
						<input type="text" id="company_name_add" name="company_name_add" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company name">
					</div>
				</div>
				
				<div class="padb10 ">
					
					<div class="pos_rel ">
						
						<input type="text" id="company_website" name="company_website" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company website">
					</div>
				</div>
				
				
				<div class="padb10 ">
					
					<div class="pos_rel ">
						
						<input type="text" id="company_email" name="company_email"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company email">
					</div>
				</div>
				
				<div class="padb10 ">
					
					<div class="pos_rel ">
						
						<select id="inds" name="inds" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
							<option value="0">--Select industry--</option>
							<?php  foreach($resultIndus as $category => $value) 
								{
									$category = htmlspecialchars($category); 
									echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
								}
							?>
						</select>
					</div>
				</div>
				
				<div class="padb0 ">
					
					<div class="pos_rel ">
						
						<select id="cntry" name="cntry" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
							<option value="0">--Select country--</option>
							<?php  foreach($resultContry as $category => $value) 
								{
									$category = htmlspecialchars($category); 
									echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
								}
							?>
						</select>
					</div>
					
				</div>
				
				<div id="errorMsg" class="red_txt"></div>
			</form>
			
			<div class="mart20">
				<input type="button" value="Add company" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="validateAddCompany();" />
				<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				
			</div>
			
			
			
			
		</div>
		</div>
	
	
<!-- Slide fade -->
<div id="slide_fade"></div>

<!-- Menu list fade -->
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>


<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
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