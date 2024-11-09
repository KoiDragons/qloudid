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
		
		function updateTotal(id,id1)
			{
				
				var newId=id+'_'+id1;
				$("#total_value").val(newId);
				
				var send_data={};
				
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"searchToApproveCompanyDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						$("#searched").html('');
						$("#searched").html(data1);
						
					}
				});
				
			}
			
			
			function updateMember(id,id1)
			{
				
				var newId=id+'_'+id1;
				$("#total_value_member").val(newId);
				
				var send_data={};
				
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"searchToApproveMemberDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						$("#searchedMember").html('');
						$("#searchedMember").html(data1);
						
					}
				});
				
			}
		function approveUser()
			{
				
				var user=0;
				var ids=$("#total_value").val().split('_');
				var send_data = {};
				send_data.user_id=user;
				send_data.a_id=ids[0];
				send_data.status=ids[1];
				//alert(send_data.a_id); return false;
				$.ajax({
					url: '../ShareMonitor/approveUserRequest',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data1){
					
					
					if(data1)
					{
						window.location.href ="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow";
					}
					
					
				})
				.fail(function(){})
				.always(function(){});
				
			}
			
			function approveMember()
			{
				
				
				var ids=$("#total_value_member").val().split('_');
				var send_data = {};
				
				send_data.a_id=ids[0];
				send_data.status=ids[1];
				//alert(send_data.status); return false;
				$.ajax({
					url: '../ShareMonitor/approveMemberRequest',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data1){
					
					
					if(data1)
					{
						window.location.href ="https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorShow";
					}
					
					
				})
				.fail(function(){})
				.always(function(){});
				
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
                        <a href="https://www.safeqloud.com/user/index.php/Dependents/approvedDependents" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/user/index.php/Dependents/approvedDependents" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
                                            <a href="#" class="dinlblck mar5 padrl30  bg_ffde00_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h black_txt_a white_txt_ah  ffamily_avenir active" >Request</a>
                                            <a href="shareMonitorShow" class="dinlblck mar5 padrl10  nobrd  bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir hidden" >Active</a>
                                             <a href="shareMonitorSentList" class="dinlblck mar5 padrl10  nobrd  bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir hidden" >Sent</a>
                                              <a href="shareMonitorRejectedList" class="padrl30_a padrl10 fsz18 midgrey_txt lgn_hight_36  hidden"  ><i class="fas fa-trash-alt"></i></a>

                                        </div>
										<table class="wi_100 marb10 hidden" cellpadding="0" cellspacing="0" id="mytablesent">

																	<thead class="fsz16 brd_fcaf17 nobrdt nobrdl nobrdr">
																		<tr class="fsz16">
																		
																			<th class="pad5  nobold  tall xs-wi_100 brd_fcaf17 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt ffamily_avenir">Styrelseuppdrag</div>
																			</th>

																			<th class="pad5  nobold   tall brd_fcaf17 nobrdt nobrdl nobrdr">

																			</th>
																			<th class="pad5  nobold  tall brd_fcaf17 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt"></div>
																			</th>
																			<th class="pad5 wi_60  nobold  tall brd_fcaf17 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt"></div>
																			</th>
																			 
																			 
																		</tr>

																	</thead>
																			</table>
											 
											<?php $i=0;
												
												foreach($pendingMemberRequest as $category => $value) 
												{
													
													
												?> 
											
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt"><?php echo substr(html_entity_decode($value['address']),0,25); ?></span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25); ?></span>  
																	</div>
																	
																	
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden">
														<a href="#" class="show_popup_modal" onclick="updateMember(this.id,2);" id="<?php echo encrypt_decrypt('encrypt',$value['id']); ?>" data-target="#gratis_popup_member"><span class="far fa-times-circle red_txt"></span></a>
													</div>
																			 
														<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden">
														<a href="#" class="show_popup_modal" onclick="updateMember(this.id,1);" id="<?php echo encrypt_decrypt('encrypt',$value['id']); ?>" data-target="#gratis_popup_member"><span class="fas fa-check-circle green_txt"></span></a>
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
	 
												<div  id="memberRequest">
										</div>	
										<div class="clear"></div>
										<div class="padtb20 b talc <?php if($pendingMemberRequestCount['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_member_request(this);">View more</a>
									</div>
									
										<script>
										function add_more_member_request(link) {
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											
											$.ajax({
												type:"POST",
												url:"morependingMemberRequest",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#memberRequest"),
													html=html1;
													
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

																	<thead class="fsz16 brd_fcaf17 nobrdt nobrdl nobrdr">
																		<tr class="fsz16">
																		
																			<th class="pad5  nobold  tall   brd_fcaf17 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt ffamily_avenir">Employer</div>
																			</th>

																			<th class="pad5  nobold   tall brd_fcaf17 nobrdt nobrdl nobrdr">

																			</th>
																			<th class="pad5 wi_60 nobold xs-wi_33 tall brd_fcaf17 nobrdt nobrdl nobrdr">
																				<div class="padtb5 black_txt"></div>
																			</th>
																			<th class="pad5  nobold wi_80p xs-wi_30 xs-padl10 tall brd_fcaf17 nobrdt nobrdl nobrdr ">
																				<div class="padtb5 black_txt"></div>
																			</th>
																		</tr>

																	</thead>
																			</table>
											 
											<?php $i=0;
												
												foreach($rowUser as $category => $value) 
												{
													
													
												?> 
											
												<a href="../ConsentProfile/receiveAccount/<?php echo encrypt_decrypt('encrypt',$value['id']); ?>"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
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
															</div></a>
	 
												<?php } ?>
	 
												<div  id="employerRequest">
													</div>	
										<div class="clear"></div>
										<div class="padtb20  talc <?php if($rowP['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_employer(this);">View more</a>
									</div>	

										<script>
										function add_more_employer(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"moreEmployerRequestDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#employerRequest"),
												html=html1;
												
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
												
												foreach($daycareRequestReceivedDetail as $category => $value) 
												{
													
													
												?> 
											
												<a href="../ConsentProfileParent/requestAccount/<?php echo $value['enc']; ?>"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Daycare</span>
																	
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
															</div></a>
	 
												<?php } ?>
	 
												<div  id="DaycareRequest">
													</div>	
										<div class="clear"></div>
										<div class="padtb20   talc <?php if($requestDaycareReceivedCount['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_daycare(this);">View more</a>
									</div>	

										<script>
										function add_more_daycare(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"moreDaycareRequestReceivedDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#DaycareRequest"),
												html=html1;
												
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
												
												foreach($guardianRequestReceived as $category => $value) 
												{
													
													
												?> 
											
												<a href="../ConsentProfileGuardian/dependentAccount/<?php echo $value['enc']; ?>"><div class="column_m container  marb5   fsz14 dark_grey_txt">
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
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Parent</span>
																	
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
															</div></a>
	 
												<?php } ?>	
									 	
									 	<?php $i=0;
												
												foreach($kinRequestReceivedDetail as $category => $value) 
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
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Received kin request</span>
																	
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
	 
												<div  id="kinRequest">
													</div>	
										<div class="clear"></div>
										<div class="padtb20   talc <?php if($kinRequestReceivedCount['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_kin(this);">View more</a>
									</div>	

										<script>
										function add_more_kin(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"moreReceivedKinRequestDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#kinRequest"),
												html=html1;
												
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
												
												foreach($receivedRequestDetailTenants as $category => $value) 
												{
													
													
												?> 
											
											<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 hidden-xs"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['office_apartment_number']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_50 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Received tenant request</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['office_apartment_number']),0,25); ?></span>  
																	</div>
																	
																	
																	
													<a href="unverifyRequest/<?php echo $value['enc']; ?>"><div class="fright wi_10 padl0  marl15 fsz40  padb0  ">
														 <span class="fas fa-times-circle red_txt"></span> 
													</div></a>		

														<a href="verifyRequest/<?php echo $value['enc']; ?>"><div class="fright wi_10 padl0  marl15 fsz40  padb0  ">
														 <span class="fas fa-check-circle green_txt"></span> 
													</div></a>
															 		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> 
															 
	 
												<?php } ?>
	 
												<div  id="tenantRequest">
													</div>	
										<div class="clear"></div>
										<div class="padtb20   talc <?php if($requestReceivedCountTenants['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_tenant(this);">View more</a>
									</div>	

										<script>
										function add_more_tenant(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"moreReceivedRequestDetailTenants",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#tenantRequest"),
												html=html1;
												
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
												
												foreach($receivedContractorInvitation as $category => $value) 
												{
													
													
												?> 
											
											<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 hidden-xs"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_50 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Contractor</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25); ?></span>  
																	</div>
																	
																	
																	
													<a href="rejectContrator/<?php echo $value['enc']; ?>"><div class="fright wi_10 padl0  marl15 fsz40  padb0  ">
														 <span class="fas fa-times-circle red_txt"></span> 
													</div></a>		

														<a href="approveContrator/<?php echo $value['enc']; ?>"><div class="fright wi_10 padl0  marl15 fsz40  padb0  ">
														 <span class="fas fa-check-circle green_txt"></span> 
													</div></a>
															 		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> 
															 
	 
												<?php } ?>
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

<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brd brdrad5" id="gratis_popup_approve">
		<div class="modal-content pad25  brdrad5">
			<div id="searched">
				
			</div>
			 
				<div class="wi_350p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="approveUser();">Signera med Mobilt BankId</a> 
					<input type="hidden" id="total_value" name="total_value" value="">
				</div>
		 
		</div>
	</div>
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brd brdrad5" id="gratis_popup_member">
		<div class="modal-content pad25  brdrad5">
			<div id="searchedMember">
				
			</div>
			 
				<div class="wi_350p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="approveMember();">Signera med Mobilt BankId</a> 
					<input type="hidden" id="total_value_member" name="total_value_member" value="">
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