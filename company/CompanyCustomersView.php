<!doctype html>
<?php
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
	$path1 = $path."html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; } ?>

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
            function checkFlag() {
                if ($(".popupShow").hasClass('active')) {
                    $(".popupShow").removeClass('active')
                    $(".popupShow").attr('style', 'display:none');
                }

            }
            var available_yes = 0;

            function selectLocation() {
                $("#error_location").html('');
                if ($('#location').val() == "" || $('#location').val() == null) {
                    $("#error_location").html('please select location');
                    return false;
                } else {
                    document.getElementById('save_indexing_location').submit();
                }
            }

            function setDisconnect(id) {
                var send_data = {};
                send_data.uid = id;

                $.ajax({
                    type: "POST",
                    url: "../checkConnection/<?php echo $data['cid']; ?>",
                    data: send_data,
                    dataType: "text",
                    contentType: "application/x-www-form-urlencoded;charset=utf-8",
                    success: function(data1) {

                        if (data1 == 1) {
                            document.getElementById("popup_fade").style.display = 'block';
                            $("#popup_fade").addClass('active');
                            document.getElementById("gratis_popup_disconnect").style.display = 'block';
                            $("#gratis_popup_disconnect").addClass('active');
                            $("#uid").val(id);
                        } else {
                            document.getElementById("popup_fade").style.display = 'block';
                            $("#popup_fade").addClass('active');
                            document.getElementById("gratis_popup_error").style.display = 'block';
                            $("#gratis_popup_error").addClass('active');
                        }

                    }
                });
            }

            function setDisconnectSupplier(id) {

                document.getElementById("popup_fade").style.display = 'block';
                $("#popup_fade").addClass('active');
                document.getElementById("gratis_popup_disconnect_supplier").style.display = 'block';
                $("#gratis_popup_disconnect_supplier").addClass('active');
                $("#uids").val(id);

            }

            function closePop() {

                $('.yellow_bg').removeClass('yellow_bg');

            }

            function showUserDetailReceived(id, link, aid, rid) {

                var send_data = {};
                send_data.id = id;
                send_data.aid = aid;
                send_data.rid = rid;
                send_data.cid = "<?php echo $data['cid']; ?>";
                var $this = $(this);
                $(".yellow_bg").removeClass('yellow_bg');
                $(link).closest('tr').addClass('yellow_bg');
                $.ajax({
                    type: "POST",
                    url: "../profileInfo",
                    data: send_data,
                    dataType: "text",
                    contentType: "application/x-www-form-urlencoded;charset=utf-8",
                    success: function(data1) {
                        document.getElementById("gratis_popup_user_profile").style.display = 'none';
                        $("#gratis_popup_user_profile").removeClass('active');
                        $("#search_user_profile").html('');
                        document.getElementById("gratis_popup_user_profile").style.display = 'block';
                        $("#gratis_popup_user_profile").addClass('active');
                        $("#search_user_profile").append(data1);
                    }
                });

            }

            function removeActive() {
                $("#menulist-dropdown2").removeClass('active');
                $("#menulist-dropdown3").removeClass('active');
                $("#menulist-dropdown4").removeClass('active');
            }

            function rActive() {

                $("#menulist-dropdown3").removeClass('active');
                $("#menulist-dropdown4").removeClass('active');
            }

            function raActive() {

                $("#menulist-dropdown2").removeClass('active');
                $("#menulist-dropdown4").removeClass('active');
            }

            function rbActive() {

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
                        <a href="https://www.safeqloud.com/company/index.php/ReceivedChild/verifyRequests/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.safeqloud.com/company/index.php/ReceivedChild/verifyRequests/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					  
					
				</div>
			</div>
	
	<div class="clear"></div>

	 
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart20 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 padb10 black_txt trn nobold"  >Consent</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc xs-padb15  "> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn nobold" > A list of active and rejected consents</a></div>
                                      <div class="tab-header martb10 padb10 xs-talc brdb_94cffd nobrdt nobrdl nobrdr talc">
                                            <a href="../receivedRequests/<?php echo $data['cid']; ?>" class="dinlblck mar5 padrl10 bg_94cffd_a   brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir" >Request</a>
                                            <a href="#" class="dinlblck mar5 padrl10 padrl30_a nobrd bg_94cffd_a   brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active" >Active</a>
                                             <a href="../sentRequests/<?php echo $data['cid']; ?>" class="dinlblck mar5 padrl10 padrl30_a nobrd bg_94cffd_a   brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir " >Sent</a>
                                              <a href="../rejectedList/<?php echo $data['cid']; ?>" class="padrl30_a padrl10 fsz18 midgrey_txt lgn_hight_36 "  ><i class="fas fa-trash-alt"></i></a>

                                        </div>

                                        <div class="tab_container mart10">

                                            <!-- Popular -->
                                            <div class="tab_content active" id="utab_Popular" style="display: block;">
											<?php if(!empty($approveDetail)) { ?>
											 
										<div class="column_m container  marb0   fsz14 dark_grey_txt">						
												<?php $i=0;

													foreach($approveDetail as $category => $value) 
													{

													?>
                                                    <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_50p marr15"> 
																	
																	<?php echo $value['img']; ?></div>
																	
																	<div class="fleft wi_50     xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Att-göra-lista</span>
																	
																	<a href="../../EmployeeDetail/employeeAccount/<?php echo $data['cid']; ?>/<?php echo $value['employee_id']; ?>" class="black_txt"  > <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 "><?php echo  substr(html_entity_decode($value['first_name']).' '.html_entity_decode($value['last_name']),0,18); ?></span>  </a>
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden ">
														 <a href="#" class="fsz30 red_txt" onclick="setDisconnect('<?php echo $value['uid']; ?>');"><span class="fas fa-times"></span> </a>
													</div>	 
																			<div class="xxs-fleft fright wi_20 xs-wi_20 padl20 fsz40   marr30 padb0 ">
																				<a href="../companyCustomersLocation/<?php echo $data['cid']; ?>/<?php echo $value['enc']; ?>"target="_blank"><button type="button" name="Add parent" class="forword2   blue_67cff7_brd2 ffamily_avenir black_txt trans_bgi positionAbs xs-padr15 xs-padl15"   >Allocate</button></a>
																			</div>
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
	 

                                                    <?php } ?>
													
													<div id="approved">
																	</div>
																	<div class="clear"></div>
																	<div class="padtb20 talc <?php if($approveCount['num']<=5) echo 'hidden'; ?>">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width" onclick="add_more_rows_approved(this);" value="1">View more</a>

															</div>
														</div>	
										
															 
																	<?php } ?>
																 

																	<?php 
													foreach($approveDetailLocation as $category => $value) 
													{
														
														
													?> 
																	
																	<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_50p marr15"> 
																	
																	<?php echo $value['img']; ?></div>
																	
																	<div class="fleft wi_75 xxs-wi_80   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Employee</span>
																	
																	<a href="../../EmployeeDetail/employeeAccount/<?php echo $data['cid']; ?>/<?php echo $value['employee_id']; ?>" class="black_txt"  > <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo  substr(html_entity_decode($value['first_name']).' '.html_entity_decode($value['last_name']),0,18); ?></span>  </a>
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden ">
														 <a href="#" class="fsz30 red_txt" onclick="setDisconnect('<?php echo $value['uid']; ?>');"><span class="fas fa-times"></span> </a>
													</div>	 
																			<div class="fright wi_10 padl0  marl0 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 	 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
	 
																	
																 
																	<?php } ?>		

																	<div id="approvedLocation">
																	</div>

																


															
															<div class="clear"></div>
															 
															<div class="padtb20 talc <?php if($approveDetailLocationCount['num']<=5) echo 'hidden'; ?>">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width" onclick="add_more_rows_approved_location(this);" value="1">View more</a>

															</div>
															

															<?php $i=0;
												
												foreach($requestApprovedDetailparent as $category => $value) 
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
																	border-radius: 10%;"> <?php echo substr($value['name'],0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_75 xxs-wi_80   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt"><?php echo  $value['child_name'].' - Parent'; ?></span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo  $value['name']; ?></span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl0 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
	 
												<?php } ?>
	 
												<div  id="ApprovedParent">
										</div>	
										<div class="clear"></div>
														
														<div class="padtb20 talc <?php if($requestApprovedCountparent['num']<=5) echo 'hidden'; ?> ">
																<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width" onclick="add_more_rows_parent(this);" value="1">View more</a>

															</div>
									
										<script>
										function add_more_rows_parent(link) {
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
															url:"../moreApprovedDetailParent/<?php echo $data['cid']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#ApprovedParent"),
															html=html1;
															//alert(data1); 
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
										 
											 
											 
																
                                                <div class="clear"></div>
                                            </div>

                                            <!-- Advertising -->
                                              </div>
                                    </div>
                                </div>

                            </div>

                          
                       
                    
                <div class="clear"></div>
<script>

										 					 
											function add_more_rows_approved(link) {
															var id_val=parseInt($(link).attr('value'))+1;
															var html1="";
															var send_data={};
															send_data.id=parseInt($(link).attr('value'));
															$(link).attr('value',id_val);
															//send_data.message=id;
															$.ajax({
															type:"POST",
															url:"../moreApprovedDetail/<?php echo $data['cid']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#approved"),
															html=html1;

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

															function add_more_rows_approved_location(link) {
															var id_val=parseInt($(link).attr('value'))+1;
															var html1="";
															var send_data={};
															send_data.id=parseInt($(link).attr('value'));
															$(link).attr('value',id_val);
															//send_data.message=id;
															$.ajax({
															type:"POST",
															url:"../moreApprovedDetailLocation/<?php echo $data['cid']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#approvedLocation"),
															html=html1;

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

            </div>
             
        </div>
        <div class="clear"></div>
        <div class="hei_80p hidden-xs"></div>

       
        
        <div id="popup_fade" class="opa0 opa55_a black_bg"></div>

        </div>

        <div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey2_bg fsz14 brdrad5 " id="gratis_popup_location">
            <div class="modal-content   nobrdb talc brdrad5 ">
                <div class="pad25 lgtgrey2_bg brdradtr10">
                    <img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
                </div>
                <h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Välj kontor</h2>

                <div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">

                    <div class="wi_100 marb0 talc">

                        <span class="valm fsz16 black_txt"> Välj det kontoret som personen är anställd hos. </span>
                    </div>

                </div>

                <form action="../inviteEmployeeLocation/<?php echo $data['cid']; ?>" method="POST" id="save_indexing_location" name="save_indexing_location">
                    <div class="on_clmn padb10 ">

                        <div class="on_clmn padrl20">

                            <div class="pos_rel padl0">

                                <select class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 white_bg brdrad5" name="location" id="location">

                                    <?php 
																				foreach($companyLocation as $category => $row_country)
																				{

																				?>
                                        <option value="<?php echo $row_country['enc']; ?>">
                                            <?php echo $row_country['visiting_address']; ?>
                                        </option>
                                        <?php } ?>
                                </select>

                            </div>

                        </div>
                    </div>
                </form>
                <div id="errPhone"></div>
                <div class="on_clmn mart10 padrl20 marb10  brdb_new ">
                    <input type="button" value="Submit" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="selectLocation();">

                </div>
                <div class="marb10">
                    <a href="#" class="marb10">Avbryt</a>
                </div>

            </div>
        </div>

        <div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup_company">
            <div class="modal-content pad25 brd">
                <h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
															Add Company
															<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
														</h3>
                <form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company" accept-charset="ISO-8859-1">

                    <div class="marb15 ">
                        <label for="new-organization-name" class="sr-only">Company Name</label>
                        <input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Name">
                    </div>

                    <div class="marb15 padt15">
                        <label for="new-organization-name" class="sr-only">Website</label>
                        <input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Website">
                    </div>

                    <div class="marb15 padt15">
                        <label for="new-organization-name" class="sr-only">Company Email</label>
                        <input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Email">
                    </div>

                    <div class="marb15 padt15">
                        <label for="new-organization-under" class="txt_0">Industry</label>
                        <select name="inds" id="inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica">

                            <option value="0">--Select--</option>
                            <?php  foreach($resultIndus as $category => $value) 
						{
							$category = htmlspecialchars($category); 
							echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
						}
					?>
                        </select>
                    </div>

                    <div class="marb15 padt15">
                        <label for="new-organization-under" class="txt_0">Country</label>
                        <select name="cntry" id="cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica">

                            <option value="0">--Select--</option>
                            <?php  foreach($resultContry as $category => $value) 
						{
							$category = htmlspecialchars($category); 
							echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
						}
					?>
                        </select>
                    </div>

                    <div class="mart30 talr">
                        <button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
                        <input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validateAddCompany();" />
                        <input type="hidden" name="indexing_save_company" id="indexing_save_company" />
                    </div>
                </form>
            </div>
        </div>

        <div class="popup_modal" id="gratis_popup_user_profile">

            <div id="search_user_profile">

            </div>

        </div>

        <div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_error">
            <div class="modal-content pad25  nobrdb talc brdrad5">

                <h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
                <span></span>
                <div class="wi_100 dflex fxwrap_w marrla marb20 tall">

                    <div class="wi_100 marb10 talc">

                        <span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
                    </div>

                </div>

                <div class="pad15 lgtgrey2_bg">

                    <div id="search_user">
                        <h3 class="pos_rel pad15  bold fsz20 dark_grey_txt">
																				You are not authorized to remove/disconnect owner of the company.

																			</h3>

                    </div>

                </div>

                <div class="mart20">
                    <input type="button" value="Close" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                </div>
            </div>
        </div>

        <div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect">
            <div class="modal-content pad25  nobrdb talc brdrad5">

                <h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
                <span></span>
                <div class="wi_100 dflex fxwrap_w marrla marb20 tall">

                    <div class="wi_100 marb10 talc">

                        <span class="valm fsz16">Are you sure that you want to disconnect?</span>
                    </div>

                </div>

                <form action="../disconnectEmployee/<?php echo $data['cid']; ?>" method="POST">

                    <input type="hidden" id="uid" name="uid" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">

                    <div class="mart20">
                        <input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                    </div>

                    <div class="mart20">
                        <input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                    </div>
                </form>
            </div>
        </div>

        <div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect_supplier">
            <div class="modal-content pad25  nobrdb talc brdrad5">

                <h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
                <span></span>
                <div class="wi_100 dflex fxwrap_w marrla marb20 tall">

                    <div class="wi_100 marb10 talc">

                        <span class="valm fsz16">Are you sure that you want to disconnect?</span>
                    </div>

                </div>

                <form action="../disconnectSupplier/<?php echo $data['cid']; ?>" method="POST">

                    <input type="hidden" id="uids" name="uids" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">

                    <div class="mart20">
                        <input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                    </div>

                    <div class="mart20">
                        <input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                    </div>
                </form>
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
            google.charts.load('current', {
                'packages': ['corechart']
            });

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
                    chartArea: {
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
                    chartArea: {
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
                    chartArea: {
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
                    chartArea: {
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                    chartArea: {
                        width: 320,
                        height: 150,
                        top: 20,
                    },
                    pieStartAngle: -90,
                    legend: {
                        position: 'right',
                        alignment: 'center',
                        textStyle: {
                            fontSize: 13,
                            color: '#c6c8ca',
                        }
                    },
                    pieSliceText: 'none',
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
                style_formats: [{
                    title: 'Bold text',
                    inline: 'b'
                }, {
                    title: 'Red text',
                    inline: 'span',
                    styles: {
                        color: '#ff0000'
                    }
                }, {
                    title: 'Red header',
                    block: 'h1',
                    styles: {
                        color: '#ff0000'
                    }
                }, {
                    title: 'Example 1',
                    inline: 'span',
                    classes: 'example1'
                }, {
                    title: 'Example 2',
                    inline: 'span',
                    classes: 'example2'
                }, {
                    title: 'Table styles'
                }, {
                    title: 'Table row 1',
                    selector: 'tr',
                    classes: 'tablerow1'
                }],
                templates: [{
                    title: 'Test template 1',
                    content: 'Test 1'
                }, {
                    title: 'Test template 2',
                    content: 'Test 2'
                }]
            });
        </script>
    </body>

    </html>