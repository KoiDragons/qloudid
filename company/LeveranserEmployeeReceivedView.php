<!doctype html>
<?php
	$path1 = "../../html/usercontent/images/";
	function base64_to_jpegp($base64_string, $output_file) {
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
		
		if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_p=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_p=str_replace('"','',$value_p); $value_p = base64_to_jpegp( $value_p, '../estorecss/tmp'.$row_summary['passport_image'].'.jpg' ); } else { $value_p="../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_p="../html/usercontent/images/default-profile-pic.jpg";
	 ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
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
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		
		<script>
		function checkFlag()
			{
				if($(".popupShow").hasClass('active'))
				{
					$(".popupShow").removeClass('active')
					$(".popupShow").attr('style','display:none');
				}
				
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
		
		<!-- HEADER -->
		 <div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.safeqloud.com/company/index.php/ReceivedChild/requestedApps/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				  <div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class=" diblock padl7 padr7 brdrad3 fsz30  "><i class="fas fa-plus " aria-hidden="true" style="color: #d9e7f0;"></i></a> </div> 
			 
				<div class="clear"></div>
			</div>
		</div>
		<div class="column_m header   bs_bb  hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/company/index.php/ReceivedChild/requestedApps/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			
            <div class="clear"></div>
         </div>
      </div>
	  <div class="clear"></div>

        <div class="column_m pos_rel">

              <div class="column_m container zi5  mart40  xs-mart0" >
                <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">

                  		<div class="wi_720p maxwi_100 pos_rel zi5 marrla pad10 padt0 mart0 xs-pad0">
 
												<div class="padb20 xxs-padb0 ">
												 
												
							<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 t_67cff7_bg  " onclick="checkFlag();">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 t_67cff7_bg  brdb_new tall xs-nobrdb">
                           <div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  padrl30">
                              <div class="padb40 talc fsz45"><i class="fas fa-list white_txt" aria-hidden="true"></i></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 white_txt trn ffamily_avenir">Delivery</h1>
                              </div>
                              <div class="mart20 marb10  xxs-talc talc ffamily_avenir"> <a href="#" class="white_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Here is a list of past and present deliviries</a></div>
                           </div>
                        </div>
                     </div>					
							<div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
                           <div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
                              <div class="martb15  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz18 xs-fsz16  xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Add deliviery</a></div>
                           </div>
                        </div>
                     </div>		
							
						 
                            

                           <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt mart20">
                                <div class="container ">
                                    

                                        <div class="tab-header mart10 padb10 xs-talc brdb_blue1 talc">
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10   tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Att hämta</a>
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10   tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir" data-id="utab_Analytics">Hämtade</a>
                                             
                                        </div>

                                         

                                        <div class="tab_container mart10">

                                            <!-- Popular -->
                                            <div class="tab_content active" id="utab_Popular" style="display: block;">
										 
										<div class="column_m container  marb20   fsz14 dark_grey_txt">						
												<?php  

													foreach($receivedEmployeePacket as $category => $value) 
													{

													?>
													 <div class=" white_bg marb10  brdb bg_fffbcc_a  " style="">
                                                        <div class="container padrl10 padtb15 brdrad1 fsz14 dark_grey_txt">
                                                            <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

                                                                <!--<div class="clear hidden-xs"></div>-->

                                                                <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
                                                                    <div class="fleft wi_50p marl15">
                                                                       <div class="tdcalender" style="width:50px; height:50px;">
																		<div class="tdmonth"><?php echo date('M',strtotime($value['date_today'])); ?></div>
																		
																		<div class="padtb2 fsz25"><?php echo date('d',strtotime($value['date_today'])); ?></div>
																		<div class="fsz10 hidden"><?php echo date('Y',strtotime($value['date_today'])); ?></div>
																	</div>
                                                                    </div>

                                                                    <div class="fleft wi_50 xxs-wi_70 sm-wi_50 xsip-wi_50  marl15  "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14  ">Item number</span>
                                                                        <a href="#" class="show_popup_modal black_txt"  ><span class="trn fsz18 black_txt"><?php echo $value['item_number']; ?></span></a> </div>

                                                                    
                                                                     

                                                                </div>

                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                    </div>

													
													
													
													
                                                   

                                                    <?php } ?>
													<div id="allReceived">
																</div>
												 
                                                <div class="clear"></div>
                                            </div>
											</div>
                                            <!-- Advertising -->
                                            <div class="tab_content hide" id="utab_Analytics" style="display: none;">
                                                <div class="column_m container  marb20   fsz14 dark_grey_txt">						
												<?php  

													foreach($deliveredEmployeePacket as $category => $value) 
													{

													?>
                                                     <div class=" white_bg marb10  brdb bg_fffbcc_a  " style="">
                                                        <div class="container padrl10 padtb15 brdrad1 fsz14 dark_grey_txt">
                                                            <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

                                                                <!--<div class="clear hidden-xs"></div>-->

                                                                <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
                                                                    <div class="fleft wi_50p marl15">
                                                                       <div class="tdcalender" style="width:50px; height:50px;">
																		<div class="tdmonth"><?php echo date('M',strtotime($value['date_today'])); ?></div>
																		
																		<div class="padtb2 fsz25"><?php echo date('d',strtotime($value['date_today'])); ?></div>
																		<div class="fsz10 hidden"><?php echo date('Y',strtotime($value['date_today'])); ?></div>
																	</div>
                                                                    </div>

                                                                     <div class="fleft wi_50 xxs-wi_70 sm-wi_50 xsip-wi_50  marl15  "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14  ">Item number</span>
                                                                        <a href="#" class="show_popup_modal black_txt"  ><span class="trn fsz18 black_txt"><?php echo $value['item_number']; ?></span></a> </div>

                                                                    
                                                                     

                                                                </div>

                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                    </div>

													
													
                                                    <?php } ?>
													<div id="allDelivered">
																</div>
													<div class="padtb20 talc">
																<a href="javascript:void(0);" class="tb_67cff7_bg  trans_bg brd blue_btn black_txt    trn xxs-brd_width brd_width_2" onclick="add_more_my_del(this);" value="1">Visa fler</a>

															</div> 
                                                <div class="clear"></div>
                                            </div>
										
                                            </div>
											<script>
									function add_more_my_del(link) {
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
											url:"../moreDeliveredEmployeePacket/<?php echo $data['eid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#allDelivered"),
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
                                    </div>
                                </div>

                            </div>

							 
							
							 
							<div class="clear"></div>
						</div>
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
	 
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>

</html>