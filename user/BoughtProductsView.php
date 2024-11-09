<!doctype html>
<?php 
	$path1 = $path."html/usercontent/images/";
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
	
	if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../'.$imgs; } else { $value_a="../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../html/usercontent/images/default-profile-pic.jpg"; }
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylewrap.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		
		
		
		<script>
		function changeDisplay(id,link)
		{
				
			if($(link).hasClass('active'))
			{
				$('.expander-toggler').removeClass('active');
				$(link).removeClass('active');	
				if(id==1)
				{
					$('#employees1').attr('style','display:none;');
										
				}
				
				
			}
			else
			{
				$('.expander-toggler').removeClass('active');
				$(link).addClass('active');	
				if(id==1)
				{
					$('#employees1').attr('style','display:block;');
					
				}
			
			}
		}
		
		
		function removeBackground()
			{
				
				$(".bg_fffbcc_a").removeClass("active");
				
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
function submitFormCom()
{
	
	$("#save_indexingcs").submit();
}

			function show_more_data(link,id) {
				//var $tbody = $(link).closest('form').find('tbody');
				var html;
				var id_val1=parseInt($(link).attr('value'));
				var id_val=parseInt($(link).attr('value'))+1;
				//alert(id_val);
				$(link).val(id_val);
				$("#temp").attr('value',id_val);
				//alert($(link).val());
				var send_data={};
				
				send_data.id=id_val1;
				$.ajax({
					type:"POST",
					url:"BoughtProducts/moreEvents",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						html=data1;
						
						$("#more_data")
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
			
			function submit_value(id,link)
			{
				$(".bg_fffbcc_a").removeClass("active");
			$("#gratis_popup_company_searched").addClass("active");
			$('#gratis_popup_company_searched').attr('style','display:block;');
			$(link).closest('.bg_fffbcc_a').addClass('active');
				var send_data={};
				
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"BoughtProducts/userLogsDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched").html('');
						$("#searched").html(data1);
						
					}
				});
				//document.getElementById("save_indexing").submit();
			}
			
			
			
			function removeActive()
			{
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function raActive()
			{
				
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rbActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown2").removeClass('active');
			}
			
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/NewPersonal/userAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/user/index.php/NewPersonal/userAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
				<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 "   >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
						<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn"  >Updates</h1>
									</div>
									<div class="mart20 xs-marb20 marb35 xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn" >These are updates on personal records made by user</a></div>
					 
					 
						  <div class="tab-header mart10 padb10 brdb_new tb_67cff7_bg xs-talc">
                                            <a href="#" class="dinlblck mar5 padrl30_a  padrl10   blue_67cff7_brd_h blue_67cff7_brd_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="tab_created">Updates</a>
                                             
                                             <a href="#" class="dinlblck mar5 padrl30_a  padrl10   blue_67cff7_brd_h blue_67cff7_brd_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah   ffamily_avenir" data-id="tab_user">Händelser</a>
											  <a href="#" class="dinlblck mar5 padrl30_a  padrl10   blue_67cff7_brd_h blue_67cff7_brd_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah   ffamily_avenir" data-id="tab_bought">Köp</a>
											   <a href="#" class="dinlblck mar5 padrl30_a  padrl10   blue_67cff7_brd_h blue_67cff7_brd_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah hidden  ffamily_avenir" data-id="tab_applied">Sökta jobb</a>

                                        </div>
						
						 
							
							<div class="tab_content hide " id="tab_bought" style="display: none;">		
								
								
								
								
								<div class="brd brdrad3 marb20 mart10">
									<div class="dflex fxwrap_w alit_s marrl-10">
										
										<!-- Line chart -->
										<div class="wi_50-20p xs-wi_100-20p marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel">
												<div class="dflex justc_sb alit_fe">
													<div>
														<h4 class="pad0 bold fsz26">54%</h4>
														<span class="fsz10">2.341 new customers</span>
													</div>
													<div class="tall fsz12 lgtgrey4_txt">
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 blue_bg"></span>
															<span class="valm">Upcoming</span>
														</div>
														<div>
															<span class="wi_8p hei_8p diblock valm brdrad50 pur_ba03d9_bg"></span>
															<span class="valm">Incoming</span>
														</div>
													</div>
												</div>
												<div id="line-chart-Inhouse"></div>
											</div>
										</div>
										
										<!-- Donut chart -->
										<div class="wi_50-20p xs-wi_100-20p ovfl_hid marrl10 marb20 padrl10 white_bg">
											<h3 class="marb10 padtb10 brdb bold fsz16 dark_grey_txt">Statistics</h3>
											<div class="wi_100 pos_rel padt10">
												<div class="dflex tab-header padrl10">
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a active" data-id="tab-yearly-Inhouse">Yearly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-monthly-Inhouse">Monthly</a>
													<a href="#" class="diblock marr5 padrl10 brd brdclr_trans brdclr_lgrey_a brdrad10 lgtgrey2_bg_a lgn_hight_22 lgtgrey4_txt dblue_txt_a" data-id="tab-daily-Inhouse">Daily</a>
												</div>
												<div id="tab-yearly-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-yearly-Inhouse" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$13.6k</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">54%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">253</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">18</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
												
												<div id="tab-monthly-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-monthly-Inhouse" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$1600</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">34%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">36</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">2</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
												
												<div id="tab-daily-Inhouse" class="tab-content wi_100 dblocki opa0 opa1_a pos_abs pos_rel_a zi1 zi2_a white_bg">
													<div class="pos_rel marrl10">
														<div id="donut-chart-daily-Inhouse" class="pos_rel zi1"></div>
														<div class="wi_150p hei_150p dflex justc_c alit_c pos_abs zi2 top20p fsz25" style="left: calc(50% - 135px)">
															<span>$341</span>
														</div>
													</div>
													<div class="dflex alit_s talc">
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt">
															<div>
																<big class="dblock fsz20">23%</big>
																<span class="fsz12 lgtgrey4_txt">Revenue</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">10</big>
																<span class="fsz12 lgtgrey4_txt">Sales</span>
															</div>
														</div>
														<div class="wi_33 dflex alit_c justc_c padtb15 brdt brdl">
															<div>
																<big class="dblock fsz20">1</big>
																<span class="fsz12 lgtgrey4_txt">Contracts</span>
															</div>
														</div>
													</div>
												</div>
												
												
											</div>
										</div>
										
									</div>
								</div>
								
								
								<div class="container tab-header mart30 talc dark_grey_txt">
									<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone lgtgrey2_bg">
										<li>
											<a href="#" class="dblock brdradt5 active" data-id="tab_total">
												<span class="count">0</span>
											</a>
										</li>
										
										
										<div class="clear"></div>
									</ul>
									<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_30p pad0 nobrd brdb">
										<option value="tab_total" selected>0</option>
										<option value="tab1_InternalNotPosted">Not Posted</option>
										<option value="tab1_InternalPosted">Posted</option>
										<!--<option value="tab1_InternalPublished">Published</option>
											<option value="tab1_InternalInProgress">In Progress</option>
										<option value="tab1_InternalClosed">Closed</option>-->
									</select>
									<div class="clear"></div>
								</div>
								
								<div class="container  white_bg fsz14 dark_grey_txt">
									
									<!-- Summary -->
									<div class="tab-content " id="tab_total">
										
										<table class="wi_100" cellpadding="0" cellspacing="0">
											<thead class="fsz13" style="color: #c6c8ca;">
												<tr >
													<!--<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Company</div>
													</th>
													<th class="pad5 brdb nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5">Login Type</div>
													</th>
													
												</tr>
												
											</thead>
											<tbody id="pending">
												
											</tbody>
											
										</table>
										<div class="padt20 talc">
											<a href="#" class="load_more_results dblue_btn marrl5" value="1" onclick="add_more_rows(this);">View More</a>
											
										</div>
									</div>
									
									
								</div>
								
								<div class="clear"></div>
							</div>
							<div class="tab_content active" id="tab_created" style="display: block;">	
								<?php $i=0;
											
											foreach($userLogs as $category => $value) 
											{
												
											?> 
											<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['id'],0,1); ?> </div>
																	</div>
																	
																		<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Code</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt"><?php echo  $value['id']; ?></span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt"><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt"><?php echo date('h:i:s',strtotime($value['created_on'])); ?></span>  </div>
													 
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>	 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
											
											
								<div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a hidden" style="">
										<div class="container pad15  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_10 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Code">Code</span> <a href="#" data-target="#gratis_popup_company_click"><span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $value['id']; ?></span></a> </div>
													<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></span> </div>
													<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Time">Time</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo date('h:i',strtotime($value['created_on'])); ?></span> </div>
													<div class="fleft padl30 wi_10 padl0 xs-wi_100 sm-wi_100 marl15 fsz40  xs-mar0 padb0">
														<a href="#" class="trn "  onclick="submit_value('<?php echo $value['id']; ?>',this);" data-target="#gratis_popup_company_searched"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>
													
												</div>
												
												
												
												
												
												<!-- <div class="clear hidden-xs"></div>-->
											</div>
											<div class="clear"></div>
										</div>
									</div>
											<?php } ?>
								<div id="myRequestReceived">
								</div>
								
								<div class="clear"></div>
								<div class="padtb20 talc <?php if($userLogsCount['num']<=5) echo 'hidden'; ?>">
									<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width" value="1" onclick="add_more_row(this);" data-trn-key="Visa fler">View more</a>
									
								</div>
								
								<script>
									function add_more_row(link) {
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
											url:"BoughtProducts/moreUserLogs",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#myRequestReceived"),
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
								
							</div>
							
							<div class="tab_content hide" id="tab_applied" style="display: none;">	
							</div>
							<div class="tab_content hide " id="tab_user" style="display: none;">	
								
								<?php foreach($event as $category => $value ) { ?>
								
								
								
								<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr($value['login_company'],0,1); ?> </div>
																	</div>
																	
																	 
													
													<div class="fleft wi_70  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt"><?php echo $value['event']; ?></span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt"><?php echo html_entity_decode($value['login_company']); ?></span>  </div>
													 
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>	 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											
								
									 
								<?php } ?>
								<div id="more_data">
								</div>
								<div class="clear"></div>
								<div class="padtb20 talc">
									<a href="#" value="1" id="temp" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width" onclick="show_more_data(this,this.value);">View More</a>
									
								</div>
							</div>
						</div>
						
						<div class="clear"></div>
						
					</div>
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		 
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		 
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	<div class="popup_modal wi_500p maxwi_96 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top100p xs-right8 right30 bs_bb  brdradtl5 white_bg trans_all2 box_shadow gratis_popup_company_searched" id="gratis_popup_company_searched">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="close_popup_modal dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold"  onclick="removeBackground();">Close</a>
	
		
			
			<div id="searched">
				
				
			</div>
			
	
	</div>
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
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