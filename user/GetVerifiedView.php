<!doctype html>
<html>
	<?php
		
		require_once '../configs/encrypt_decrypt.php';
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
		
		if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; }
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
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_verify_45.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
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
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-126618362-1');
			
			var placeSearch, autocomplete;
			var timeout=0;
			var a;
			const timeInterval=3000;
			const tout=40;
			var send_data1={};
			var componentForm = {
				street_number: 'short_name',
				route: 'long_name',
				locality: 'long_name',
				administrative_area_level_1: 'short_name',
				country: 'long_name',
				postal_code: 'short_name'
			};
			
			
			function checkFormData()
			{
				
				$("#error_msg_form1").html('');
				if($("#ssecurity").val()=="")
				{
					$("#error_msg_form1").html('Fyll i ditt person nr.!!');
					
					return false;
				}
				
				else if(isNaN($("#ssecurity").val())) 
				{
					$("#error_msg_form1").html('Personal number must be a numeric value');
					return false;
				}
				else if($("#ssecurity").val().length < 12 || $("#ssecurity").val().length > 12) 
				{
					$("#error_msg_form1").html('Personal number must be 12 digit numeric value');
					return false;
				}
				else
				{
					var send_data={};
					send_data.ssn=$("#ssecurity").val();
					$.ajax({
						url: 'checkUserAvailability',
						type: 'POST',
						dataType: 'json',
						data: send_data
					})
					.done(function(data){
						if(data==0)
						{
							$("#error_msg_form1").html('Another user with this personal number already exist.');
							return false;
						}
						else
						{
								$("#loginBank").hide();
								$("#loginBankMsg").attr('style','display:block');
								$("#headerData").attr('style','display:none');
								var send_data={};
								send_data.prnumber=$("#ssecurity").val();
								$.ajax({
									type:"POST",
									url:"../BankidCheck/initiate",
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
											return false;
										}
									}
								});
							
						}
					})
					.fail(function(){})
					.always(function(){});
					
					
					
				}
				
				
				
				
			}
			
			
			function ajaxSend()
			{ 
				$.ajax({
					type:"POST",
					url:"../BankidCheck/checkOrderReference",
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
								return false;
							}
							else if(data2==2)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten. Försök igen.");
								return false;
							}
							else if(data2==3)
							{
								clearInterval(a);
								$("#errorMsg").html("BankID-appen verkar inte finnas i din dator eller telefon. Installera den och hämta ett BankID hos din internetbank. Installera appen från din appbutik eller https://install.bankid.com.");
								return false;
							}
							else if(data2==4)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten.");
								return false;
							}
							else if(timeout>tout)
							{
								clearInterval(a);
								$("#loginBankMsg").attr('style','display:none');
								$("#loginFailMsg").attr('style','display:block');
								return false;
							} 
							else 
							{
								$("#errorMsg").html(data2);
								return false;
							}
						}
						else 
						{
							
							document.getElementById("update_ssn").submit();
							
							
						}
						
					}
				});
				
			}
			
			function verifyUser()
			{
				
				
				if($("#cntryph").val()==0)
				{
					alert("Please Upgrade country!!!");
					return false;
				}
				else if($("#phoneno").val()=="" || $("#phoneno").val()==null)
				{
					alert("Please enter phone number!!!");
					return false;
				}
				else
				{
					var send_data={};
					send_data.countryname=$("#cntryph").val();
					send_data.phoneno=$("#phoneno").val();
					$.ajax({
						type:"POST",
						url:"../GetStartedNew/verifyUserDetail",
						data:send_data,
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							//alert(data1); return false;
							if(data1==0)
							{
								$("#errPhone").html('Please enter another/valid phone number');
							}
							else
							{
								var subst=$("#phoneno").val().substr(-4);
								$("#gratis_popup_phone").removeClass('active');
								$("#gratis_popup_phone").attr('style','display:none;');
								$("#gratis_popup_login").addClass('active');
								$("#gratis_popup_login").attr('style','display:block;');
								$("#infor_id").val(data1);
								$("#lastPh").html(subst);
							}
							
						}
					});
				}
				
			}
			
			function checkOtp()
			{
				$("#error_msg_opt").html('');
				if($("#otp").val()=="")
				{
					$("#error_msg_opt").html('Fyll i lösenordet');
					return false;
					
				}
				
				var send_data={};
				
				send_data.otp=$("#otp").val();
				send_data.infor_id=$("#infor_id").val();
				
				$.ajax({
					type:"POST",
					url:"../GetStartedNew/verifyOtp",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==0)
						{
							$("#error_msg_opt").html('Fyll i rätt lösenord');
						}
						else 
						{
						
							document.getElementById("save_indexing_otp").submit();
						}
					}
				});
				
			}
			
			
			
			
			function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				$(".class-toggler").closest('.fa-caret-down').addClass('hidden');
				$(link).closest('.fa-caret-down').removeClass('hidden');
			}
		
			</script>
			
			
			
		</head>
		</head>
	
	<body class="white_bg ffamily_avenir" >
		
		<!-- HEADER -->
		 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			<?php if($data['user_id']==43) { ?>
					 <div class="fright marr0  ">
				<div class="top_menu fright  padt15 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="https://www.qloudid.com/user/index.php/NewPersonal/userInfo" class="lgn_hight_s1 fsz30" ><span class="fa fa-qrcode  " aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
			</div>
					 <?php } ?>
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<?php if($data['user_id']==43) { ?>
					 <div class="fright marr0  ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="https://www.qloudid.com/user/index.php/NewPersonal/userInfo" class="lgn_hight_s1 fsz30" ><span class="fa fa-qrcode  " aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
			</div>
					 <?php } ?>
                <div class="clear"></div>

            </div>
        </div>
		<div class="clear" id=""></div>
		 
		
		
		
		<!-- CONTENT -->
		<div class="column_m container  zi5  mart40 xs-mart20" onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
					<div class="wi_240p fleft pos_rel zi50">
												<div class="padrl10">

													<!-- Scroll menu -->
													<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
														<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new" id="scroll_menu">
														
														<div class="column_m padb0 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb padb20 marb10">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p talc  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																	<img src="<?php echo $imgs; ?>" height="100" width="100" class="brdrad5 padb0">
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="fsz30 ffamily_avenir"> <span><?php echo $resultOrg['first_name']; ?></span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
											
													 <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="#" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey         black_txt panlyellow_bg_h  black_txt_a show_popup_modal" data-target="#gratis_msg">
                                    <span class="valm trn">Status Q<?php echo $profileStatus; ?></span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p    rotate45"></div>
                                 </a>
                              </li>
							  </ul>
							   <ul class="dblock marr20  padl10 fsz16">
							   <li class="dblock padrb10 brdb marb10">
                                 <a href="../NewPersonal/certificateList" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Exp detail</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>		
							  </ul>	
											     <ul class="marr20 pad0">
							<?php if($resultOrg1['ssn']=="" || $resultOrg1['ssn']== null || $resultOrg1['ssn']== 0) { ?>					 
                              <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="#" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey         black_txt panlyellow_bg_h  black_txt_a show_popup_modal" data-target="#gratis_msg">
                                    <span class="valm trn">Block ID service</span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p    rotate45"></div>
                                 </a>
                              </li>
							  <?php } else { ?>
							   <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="../IDKapad" class=" <?php if($hijackedUser['num']==0) echo 'lgtgrey_bg '; else echo 'red_bg '; ?>  hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey         black_txt panlyellow_bg_h  black_txt_a" >
                                    <span class="valm trn">Block ID service</span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p    rotate45"></div>
                                 </a>
                              </li>
							  <?php } ?>
                           </ul>
                           <ul class="dblock marr20  padl10 fsz16">
							 					
							   <li class="dblock padrb10 ">
                                 <a href="https://www.qloudid.com/user/index.php/NewPersonal/userAccount" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">My profile</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>			
							   
							
								 		 
										
									 <li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb tb_67cff7_bg brd_width_2 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Security setting</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
							  
							  
							  <li class="dblock padrb10 padt5 ">
                                 <a href="../NewPersonal/identificatorsList" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Identificators</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>	
								 			 
												
											</ul>
											
									 
								
								
															 
														 

														</div>
													</div>
													<div class="clear"></div>
												</div>
											</div>

											
				
				
				<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">
						 
					
					<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 bg_ffde00  " onclick="checkFlag();">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 bg_ffde00  brdb_new tall xs-nobrdb">
                           <div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  padrl30">
                              <div class="padb40 talc fsz45"><i class="far fa-list-alt black_txt" aria-hidden="true"></i></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 black_txt trn ffamily_avenir">Security</h1>
                              </div>
                              <div class="mart20 marb10  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Upgrade the level of security</a></div>
                           </div>
                        </div>
                     </div>
					<div class=" lgtblue2_bg brdrad3 xs-marrl0 hide" >
						
						<div class="container pad25 padb20 xs-pad10 xs-padt10 xs-padb20  brdrad1 fsz14 dark_grey_txt">
							<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
								<div class="wi_100 pos_abs xs-pos_sta top0 right0">
									<div class="dflex alit_c justc_fe marb10 ">
										<div class="pos_rel">
											
										</div>
										<div class="pos_rel">
											<a href="#" class="show_popup_modal dblock opa50 opa1_h pad10 trans_opa2" data-target="#reset-pass-modal">
												<img src="<?php echo $path;?>html/usercontent/images/icons/reset-password-24.svg">
											</a>
											<div class="opa0_nsibh opa50 xs-opa1 pos_abs zi1 top100 pos_cenX padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f trans_all2">
												<span class="dblock padrl8">Reset password</span>
											</div>
										</div>
										<div class="pos_rel">
											<a href="#" class="class-toggler dblock opa50 opa1_h pad10 trans_opa2" onclick="addActive();" data-classes="active">
												<img src="<?php echo $path;?>html/usercontent/images/icons/more.svg">
											</a>
											<div class="wi_120p dnone dblocki_a pos_abs zi40 top100 right-20p bxsh_02100_105112113_05 brd bg_f" id="more">
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_rename();">Rename</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-rename-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_restore();">Restore data</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-restore-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_suspend();">Suspend</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-suspend-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
												<div>
													<a href="#" class="chained-trigger wi_100 dblock pad15 bg_e7e9f5_h fsz14 txt_0 trans_all2" data-targets=".show_popup_modal,.class-toggler" data-actions="click" onclick="show_delete();">Delete</a>
													<a href="#" class="show_popup_modal dnone" data-target="#more-delete-modal">Show modal</a>
													<a href="#" class="class-toggler dnone" data-target="#more,#more-fade" data-classes="active">Close popup</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="idcard_header wi_100 xs-wi_70 xs-order_2 bs_bb marb10 xs-padl15 sm-padl5">
									<h2 class="dnone xs-dblock padb15 uppercase bold fsz18 trn">Cloud ID Business</h2>
									<div>
										<img src="<?php echo $path;?>html/usercontent/images/flag.png" width="40" class="marr5 valm">
										<span class="valm bold xs-nobold fsz24 xs-fsz15 trn">User</span>
										<span class="dblock xs-dnone bold fsz14 trn">Passport</span>
									</div>
									<div class="dnone xs-dblock mart10 marb20">
										<img src="<?php echo $path;?>html/usercontent/images/score.png" width="40" class="marr5 valm">
										<span class="valm bold xs-nobold fsz24 xs-fsz15">100/70</span>
									</div>
								</div>
								<!--<div class="clear hidden-xs"></div>-->
								<div class="wi_30 xs-order_1">
									
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white">
										
										<div class="imgwrap nobrd">
											<div class="cropped_image <?php if($row_summary ['passport_image']!=null) { echo "cropped_image_added"; } ?>" style="background-image: <?php echo $value_a; ?>;" id="image-data-1" name="image-data-1"></div>
											
										</div>
									</div>
									
									
								</div>
								<div class="wi_70 xs-wi_100 xs-order_3 xs-padt10 fsz12">
									<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn">Social Security Number</span> <span class=" edit-text jain dblock brdb brdclr_lgtgrey2 fsz20"><?php if($resultOrg1['ssn']!="" || $resultOrg1['ssn']!= null) echo $resultOrg1['ssn']; else echo "-"; ?> </span> </div>
									<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn">Family name</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $resultOrg['last_name']; ?></span> </div>
									<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn">Given names</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16"><?php echo $resultOrg['first_name']; ?></span> </div>
									<div class="wi_50 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn">Address</span> <span class=" edit-address dblock brdb brdclr_lgtgrey2 fsz16"><?php if($resultOrg1['address']!="" || $resultOrg1['address']!= null) echo $resultOrg1['address']; else echo "-"; ?> </span></div>
									<div class="container marrl-2 padl15">
										<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span class="trn">Date of birth</span> <span class=" edit-datepicker dblock brdb brdclr_lgtgrey2 uppercase curt fsz16"><?php echo $resultOrg['dob_month'].'/'.$resultOrg['dob_day'].'/'.$resultOrg['dob_year']; ?></span> </div>
										<div class="fleft wi_10  xs-wi_50 sm-wi_50 bs_bb padrl2"> <span class="trn">Sex</span> <span class=" edit-Upgrade dblock brdb brdclr_lgtgrey2 uppercase curt fsz16" data-options="M,F,T"><?php if($resultOrg['sex']==1) echo "M"; else if($resultOrg['sex']==2) echo "F"; else echo "T"; ?></span> </div>
										
										<div class="fleft wi_25 xs-wi_50 sm-wi_50 bs_bb padrl2"> <span class="trn">Date of issue</span> <span class="  dblock brdb brdclr_lgtgrey2 uppercase curt fsz16"><?php echo date('m/d/Y', strtotime("+0 days", strtotime($resultOrg['created_on']))); ?></span> </div>
										<input type="hidden" id="user_id" value="<?php echo $data['user_id']; ?>" />
										<form method="POST" action="../Verify/domainAccount" id="save_indexing" name="save_indexing" >
											<input type="hidden" id="total_value" name="total_value" value='' />
										</form>
									</div>
									
								</div>
								
								<div class="qapscore_bord hidden-xs" style="position: absolute; z-index: 1; top: 74px; right: 40px;">
									
									<div class="scorenew scorelevelnew"><?php if($row_summary['grading_status']==0) { echo "B"; } else if($row_summary['grading_status']==1) { echo "A"; } else if($row_summary['grading_status']==2) { echo "AA"; } else if($row_summary['grading_status']==3) { echo "AAA"; } ?></div>
								</div>
								
								<div class="right_number hidden-xs bold talc fsz14"> <span><?php echo $verificationId['v_id']; ?></span> </div>
								<!-- <div class="clear hidden-xs"></div>-->
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					
						<div class="column_m container tab-header mart30 talc dark_grey_txt ">
						<ul class="tab-header tab-header-custom tab-header-custom7 xs-dnone lgtgrey2_bg">
						<li >
						<a href="#" class="dblock brdradt5 " data-id="tab_total0">
									<span class="count black_txt" ></span>
									<span class="black_txt trn fsz20 bold" > </span>
								</a>
							</li>
						
							<li>
								<a href="#" class="dblock brdradt5 <?php if($row_summary['grading_status']==0) echo 'active'; else echo ''; ?>" data-id="tab_total0">
									<span class="count black_txt"> </span>
									<span class="black_txt trn fsz20 xs-fsz20 " >B </span>
								</a>
							</li>
							<li>
								<a href="#" class="dblock brdradt5 <?php if($row_summary['grading_status']==1) echo 'active'; else echo ''; ?>" data-id="tab_total0">
									<span class="count black_txt"> </span>
									<span class="black_txt trn fsz20 xs-fsz20 " >A </span>
								</a>
							</li>
							<li>
								<a href="#" class="dblock brdradt5 <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==0) echo 'active'; else echo ''; ?>" data-id="tab_total0">
									<span class="count black_txt"> </span>
									<span class="black_txt trn fsz20 xs-fsz20 " >AA- </span>
								</a>
							</li>
							<li>
								<a href="#" class="dblock brdradt5 <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==1) echo 'active'; else echo ''; ?>" data-id="tab_total0">
									<span class="count black_txt"> </span>
									<span class="black_txt trn fsz20 xs-fsz20 " >AA+ </span>
								</a>
							</li>
							
							<li>
								<a href="#" class="dblock brdradt5 " data-id="tab_total0">
									<span class="count black_txt"> </span>
									<span class="black_txt trn fsz20 xs-fsz20 " >AAA </span>
								</a>
							</li>
							
							<div class="clear"></div>
						</ul>
						
						<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb xs-fsz30 panlpanlyellow_bg xs-wi_100">
						<option value="tab_total0" class="xs-fsz20 ">Description</option>
						<option value="tab_total0" class="xs-fsz20 ">B</option>
						<option value="tab_total0" class="xs-fsz20 ">A</option>
						<option value="tab_total0" class="xs-fsz20 ">AA-</option>
						<option value="tab_total0" class="xs-fsz20 ">AA+</option>
						<option value="tab_total0" class="xs-fsz20 ">AAA</option>
						</select>
						<div class="clear"></div>
					</div>
					
					<div class="column_m container   fsz14 dark_grey_txt">
						<div class="tab-content padt5 " id="tab_total0" style="display:none;">
							
							<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1rej">
								<thead class="fsz14  " style="color: #c6c8ca;">
										<tr class="lgtgrey2_bg">
										
										<th class="wi_30 pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
											<a href="#">	<div class=" padtb5 black_txt">Description</div></a>
										</th>
										
										<th class="wi_11_25 pad5 brdb_new nobold  talc  <?php if($row_summary['grading_status']==0) echo 'bg_ffde00'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn" >  </div>
										</th>
										<th class="wi_11_25 pad5 brdb_new nobold  talc <?php if($row_summary['grading_status']==1) echo 'bg_ffde00'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn"> </div>
										</th>
										<th class="wi_11_25 pad5 brdb_new nobold  talc  <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==0) echo 'bg_ffde00'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn">  </div>
										</th>
										<th class="wi_11_25 pad5 brdb_new nobold  talc  <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==1) echo 'bg_ffde00'; else echo ''; ?>" >
											<div class="padtb5 black_txt trn">  </div>
										</th>
										<th class="wi_11_25 pad5 brdb_new nobold  talc <?php if($row_summary['grading_status']==3) echo 'bg_ffde00'; else echo ''; ?>">
											<div class="padtb5 black_txt trn">  </div>
										</th>
									</tr>
									
								</thead>
								<tbody id="myRequestRejected">
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Email</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "><li class="fas fa-check-circle green_txt fsz25"></li></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "><li class="fas fa-check-circle green_txt fsz25"></li></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "><li class="fas fa-check-circle green_txt fsz25"></li></div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Mobile phone</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "><li class="fas fa-check-circle green_txt fsz25"></li></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "><li class="fas fa-check-circle green_txt fsz25"></li></div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
											<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Name and Last name</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "><li class="fas fa-check-circle green_txt fsz25"></li></div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Social security number</div>
										</td>
										
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc cd <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "><li class="fas fa-check-circle green_txt fsz25"></li></div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										
									</tr>
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 brdb_new tall cn">
											<div class="padtb5 " >Employer verification</div>
										</td>
										
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($row_summary['grading_status']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($row_summary['grading_status']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new hidden-xs tall cd <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==0) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5 "></div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==1) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										<td class="pad5 brdb_new talc <?php if($row_summary['grading_status']==3) echo 'bg_fffbcc'; else echo ''; ?>">
											<div class="padtb5">
												<li class="fas fa-check-circle green_txt fsz25"></li>
											</div>
										</td>
										
									</tr>	
									
									<tr class="fsz16 xs-fsz16">
										
										<td class="pad5 tall cn">
											<div class="padtb5 " ></div>
										</td>
										<?php if($row_summary['grading_status']==0) {  ?>
										<td class="pad5 talc cd <?php if($row_summary['grading_status']==0) echo 'bg_ffde00'; else echo ''; ?>">
											<div class="padtb5 ">Your plan</div>
										</td>
										<?php } else {  ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#"> </a></div>
										</td>
										<?php } if($row_summary['grading_status']==0) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#"> </a></div>
										</td>
										<?php } else if($row_summary['grading_status']==1) { ?>
										<td class="pad5 talc cd <?php if($row_summary['grading_status']==1) echo 'bg_ffde00'; else echo ''; ?>">
											<div class="padtb5 ">Your plan</div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Upgrade</a></div>
										</td>
										<?php } if($row_summary['country_of_residence']==201){ if($row_summary['grading_status']==1) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#" class="show_popup_modal" data-target="#gratis_popup_ssn">Upgrade</a></div>
										</td>
										<?php } else if($row_summary['grading_status']==2 && $resultOrg1['phone_verified']==0) { ?>
										<td class="pad5 talc cd <?php if($row_summary['grading_status']==2) echo 'bg_ffde00'; else echo ''; ?>">
											<div class="padtb5 ">Your plan</div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Upgrade</a></div>
										</td>
										<?php } if($row_summary['grading_status']==2  && $resultOrg1['phone_verified']==0) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="javascript:void(0);" class="show_popup_modal" data-target="#gratis_popup_phone">Upgrade</a></div>
										</td>
										<?php } else if($row_summary['grading_status']==2  && $resultOrg1['phone_verified']==1) { ?>
										<td class="pad5 talc cd <?php if($row_summary['grading_status']==2  && $resultOrg1['phone_verified']==1) echo 'bg_ffde00'; else echo ''; ?>">
											<div class="padtb5 ">Your plan</div>
										</td>
										<?php } else  if($row_summary['grading_status']==1) { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#" class="show_popup_modal" data-target="#gratis_popup_ssn">Upgrade</a></div>
										</td>
										<?php } else { ?>
										
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Upgrade</a></div>
										</td>
										<?php } } else { ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Upgrade</a></div>
										</td>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Upgrade</a></div>
										</td>
										<?php } ?>
										<td class="pad5 talc cd">
											<div class="padtb5 "><a href="#">Upgrade</a></div>
										</td>
									</tr>
									
									</tbody>
								
							</table>
							
						</div>
					
						<!-- Summary -->
						
					</div>
					<div class="clear" id=""></div>
					<div class="padb20 xxs-padb0 mart35 padt40">		
							
									<h1 class="marb0  xxs-talc talc fsz25 padb10 black_txt trn bold"  >Rating explanations</h1>
									</div>
					<div class="column_m container  marb5    fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">B </div>
																	</div>
													
													<div class="fleft wi_90   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">B rating</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">This means that only your email has been verified by you</span>  </div>
													 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
										
					<div class="column_m container  marb5    fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">A </div>
																	</div>
													
													<div class="fleft wi_90   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">A rating</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">This means that your email and phone has been verified by you</span>  </div>
													 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
					<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">A</div>
																	</div>
													
													<div class="fleft wi_90   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">AA- rating</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">This means that your account is verified by Email and Bank ID but your phone is not verified</span>  </div>
													 
												 
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
					
					<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">A </div>
																	</div>
													
													<div class="fleft wi_90   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">AA+ rating</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">This means that you account is verified by email, phone and Bank ID</span>  </div>
													 
												 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
					
					<div class="column_m container  marb40   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">A </div>
																	</div>
													
													<div class="fleft wi_90   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">AAA rating</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">This means that your account has been verified by an employer</span>  </div>
													 
												  
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
					
					<div class=" xs-marrl0 sm-marrl0 white_bg mart30  hide">
						
						<div class="marb10 brdb">
							<h2 class="fleft mar0 padb5 fsz18 ">Current security level</h2>
							
							<div class="clear"></div>
						</div>
					</div>
					<div class="flex_1 white_bg hide">
						<div class="padrl10  xs-pad0">
							<form class="toggle-base">
								<!-- Search results -->
								<div class="search_result_list column_m padb20">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										
										<tbody id="search_results_target">
											<tr>
												
												<td class="pad5 yellowb_bg brdrad3 valt">
													<div class="padrl5">
														<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt"><?php if($row_summary['grading_status']==0) { echo "B"; } else if($row_summary['grading_status']==1) { echo "A"; } else if($row_summary['grading_status']==2) { echo "AA"; } else if($row_summary['grading_status']==3) { echo "AAA"; } ?></a></h3>
														<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
														<div class="marb10">
															<div class="star_rating dinlblck valm">
																<div class="stars">
																	<div class="rating" style="width:85%"></div>
																</div>
															</div>
															<div class="dinlblck valm">(6)</div>
														</div>
														<div class="marb10 fsz14"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
														<div class="marb10"> <a href="#" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Categoty</a> </div>
													</div>
												</td>
											</tr>
											<tr>
												<td class="padt5 padb10">
													<div class=""></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padt5 padb10">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											
											
											
										</tbody>
									</table>
								</div>
								
							</form>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class=" xs-marrl0 sm-marrl0 white_bg mart30 hide">
						
						<div class="marb10 brdb">
							<h2 class="fleft mar0 padb5">Upgrade your security</h2>
							<div class="fright pos_rel padb5 fsz13">
								<a href="#" class="class-toggler" data-target="#profile-dropdown1,#profile-fade" data-classes="active">
									<span>Why</span>
									<span class="fa fa-angle-down"></span>
								</a>
								<div id="profile-dropdown1" class="wi_320p maxwi_100vw-30p dnone dblock_a pos_abs zi40 top100 right-10p bxsh_0060_03 brdrad3 bg_f txt_a5b2bd ">
									<div class="minwi_0 dflex alit_c padtb10 padrl15 bg_f9">
										<div class="ovfl_hid flex_1 pos_rel brdrad10 bg_e3e8eb">
											<div class="hei_8p ovfl_hid brdrad10 bglgrad_r_3298d6_63c7b0" style="width: 60%"></div>
										</div>
										<span class="fxshrink_0 marl15">Step 4/5</span>
									</div>
									<div class="padtb30 padrl15 talc">
										<div class="marb10">
											<span class="fa fa-envelope-open-o fsz40"></span>
										</div>
										<h3 class="marb10 pad0 bold fsz16 txt_485761">Get copies of your email into Help Scout</h3>
										<div class="mart10">
											Don't worry, we'll just make a copy. The emails in your original mailbox will remain untouched.
										</div>
										<div class="mart20">
											<a href="#" class="diblock padtb10 padrl15 brdrad3 bg_3197d6 bg_4aa7e7_h fsz16 txt_f">Forward a Copy of Your Email</a>
										</div>
										<div class="mart20">
											Then verify that it's set up by <a href="#">sending a test email</a>.
										</div>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="flex_1 white_bg hidden">
						
						<div class="tab_container padt10 xs-padt10">
							
							<!-- Popular -->
							<div class="padt0 tab_content   active" id="utab_Popular1" style="display: block;">
								<?php if($row_summary['grading_status']==0) {  ?>
									
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 bg_ffde00 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1" onclick=>
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">B</h3>
													<span class="dblock marb5 midgrey_txt">Company Name </span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">Your plan</div>
												</div>
											</div>
										</a>
									</div>
									
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="../UpdateGrade/UpdateGradeAccount/<?php echo encrypt_decrypt('encrypt',1); ?>" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 <?php if($row_summary['grading_status']==1) { echo "bg_ffde00"; } else echo "white_bg"; ?> bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1">
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">A</h3>
													<span class="dblock marb5 midgrey_txt">Company Name </span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">Upgrade this</div>
												</div>
											</div>
										</a>
									</div>
									
									
									
									
									<?php } else {  ?>
									
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 white_bg bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1" onclick=>
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">B</h3>
													<span class="dblock marb5 midgrey_txt">Company Name </span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
												</div>
											</div>
										</a>
									</div>
								<?php } ?>
								<?php if($row_summary['grading_status']==1) {  ?>
									
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 bg_ffde00 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1" onclick=>
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">A</h3>
													<span class="dblock marb5 midgrey_txt">Company Name </span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">Your plan</div>
												</div>
											</div>
										</a>
									</div>
									
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="../UpdateGrade/UpdateGradeAccount/<?php echo encrypt_decrypt('encrypt',2); ?>" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 white_bg bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1">
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore2.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">AA</h3>
													<span class="dblock marb5 midgrey_txt">Company Name</span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">Upgrade this</div>
												</div>
											</div>
										</a>
									</div>
									<?php } else { ?>
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 white_bg bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1">
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore2.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10"><?php if($row_summary['grading_status']>=2) { echo "A" ; }else echo "AA"; ?></h3>
													<span class="dblock marb5 midgrey_txt">Company Name</span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
												</div>
											</div>
										</a>
									</div>
								<?php } ?>
								
								<?php if($row_summary['grading_status']==2) {  ?>
									
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 bg_ffde00 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1" onclick=>
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">AA</h3>
													<span class="dblock marb5 midgrey_txt">Company Name </span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">Your plan</div>
												</div>
											</div>
										</a>
									</div>
									
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="../UpdateGrade/UpdateGradeAccount/<?php echo encrypt_decrypt('encrypt',3); ?>" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 white_bg bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1">
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore2.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">AAA</h3>
													<span class="dblock marb5 midgrey_txt">Company Name</span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">Upgrade this</div>
												</div>
											</div>
										</a>
									</div>
									<?php } else { ?>
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 white_bg bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1">
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore2.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10"><?php if($row_summary['grading_status']<=2) { echo "AAA" ; }else echo "AA"; ?></h3>
													<span class="dblock marb5 midgrey_txt">Company Name</span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
												</div>
											</div>
										</a>
									</div>
								<?php } ?>
								
								<?php if($row_summary['grading_status']==3) {  ?>
									
									<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc ">
										<a href="#" class="style_base hei_190p dblock bs_bb pad25 brd  brdclr_seggreen_h brdrad4 trans_all2 bg_ffde00 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc brdrad2 trans_bxsh1" onclick=>
											<div class="trf_y-12p_ph trans_all2">
												<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
													<img src="../../../estorecss/appstore1.png" class="dblock wi_100 maxwi_120p maxhei_100p padtb5">
												</div>
												
												<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
													<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">AAA</h3>
													<span class="dblock marb5 midgrey_txt">Company Name </span>
													<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">Your plan</div>
												</div>
											</div>
										</a>
									</div>
									
									
								<?php } ?>
								<div class="clear"></div>
							</div>
							
							
							
							
						</div>
						
						
						<div class="padrl10  xs-pad0 hidden">
							<form class="toggle-base">
								<!-- Search results -->
								<div class="search_result_list column_m padb20">
									<table class="wi_100" cellpadding="0" cellspacing="0">
										
										<tbody id="search_results_target">
											<?php if($row_summary['grading_status']==0) {  ?>
												
												<tr>
													
													<td class="pad5 lgtgrey2_bg brdrad3 valt">
														<div class="padrl5">
															<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">A</a></h3>
															<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
															<div class="marb10">
																<div class="star_rating dinlblck valm">
																	<div class="stars">
																		<div class="rating" style="width:85%"></div>
																	</div>
																</div>
																<div class="dinlblck valm">(6)</div>
															</div>
															<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
															<div class="marb10"><a href="../UpdateGrade/UpdateGradeAccount/<?php echo encrypt_decrypt('encrypt',1); ?>" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
														</div>
													</td>
												</tr>
												<?php } else {  ?>
												
												<tr>
													
													<td class="pad5 lgtgrey2_bg brdrad3 valt">
														<div class="padrl5">
															<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">B</a></h3>
															<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
															<div class="marb10">
																<div class="star_rating dinlblck valm">
																	<div class="stars">
																		<div class="rating" style="width:85%"></div>
																	</div>
																</div>
																<div class="dinlblck valm">(6)</div>
															</div>
															<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
															<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
														</div>
													</td>
												</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											<?php if($row_summary['grading_status']<=1) {  ?>
												
												<tr>
													
													<td class="pad5 lgtgrey2_bg brdrad3 valt">
														<div class="padrl5">
															<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AA</a></h3>
															<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
															<div class="marb10">
																<div class="star_rating dinlblck valm">
																	<div class="stars">
																		<div class="rating" style="width:85%"></div>
																	</div>
																</div>
																<div class="dinlblck valm">(6)</div>
															</div>
															<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
															<div class="marb10"><a href="../UpdateGrade/UpdateGradeAccount/<?php echo encrypt_decrypt('encrypt',2); ?>" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
														</div>
													</td>
												</tr>
												<?php } else {  ?>
												<tr>
													
													<td class="pad5 lgtgrey2_bg brdrad3 valt">
														<div class="padrl5">
															<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">A</a></h3>
															<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
															<div class="marb10">
																<div class="star_rating dinlblck valm">
																	<div class="stars">
																		<div class="rating" style="width:85%"></div>
																	</div>
																</div>
																<div class="dinlblck valm">(6)</div>
															</div>
															<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
															<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
														</div>
													</td>
												</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											<?php if($row_summary['grading_status']<=2) {  ?>
												
												<tr>
													
													<td class="pad5 lgtgrey2_bg brdrad3 valt">
														<div class="padrl5">
															<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AAA</a></h3>
															<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
															<div class="marb10">
																<div class="star_rating dinlblck valm">
																	<div class="stars">
																		<div class="rating" style="width:85%"></div>
																	</div>
																</div>
																<div class="dinlblck valm">(6)</div>
															</div>
															<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
															<div class="marb10"><a href="../UpdateGrade/UpdateGradeAccount/<?php echo encrypt_decrypt('encrypt',3); ?>" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
														</div>
													</td>
												</tr>
												<?php } else {  ?>
												<tr>
													
													<td class="pad5 lgtgrey2_bg brdrad3 valt">
														<div class="padrl5">
															<h3 class="pad0 fsz20"><a href="#" target="_blank" class="black_txt">AA</a></h3>
															<div class=""><a href="#" target="_blank" class="dark_grey_txt fsz14">Company nam</a> </div>
															<div class="marb10">
																<div class="star_rating dinlblck valm">
																	<div class="stars">
																		<div class="rating" style="width:85%"></div>
																	</div>
																</div>
																<div class="dinlblck valm">(6)</div>
															</div>
															<div class="marb10 fsz16"> Professional with several years of experience from marketing/sales, office management as well as HR related tasks, always with demands on high quality abd effe </div>
															<div class="marb10"><a href="#" class="dinlblck marr5 pad5 red_bg panlyellow_bg_h white_txt fsz13 brdrad3">#Upgrade</a> </div>
														</div>
													</td>
												</tr>
											<?php } ?>
											<tr>
												<td class="padb15">
													<div class=""></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
												<td class="padb15">
													<div class="brdt brdclr_lightgrey"></div>
												</td>
											</tr>
											
											
										</tbody>
									</table>
								</div>
								
							</form>
							<div class="clear"></div>
						</div>
					</div>
					
					<div class="column_m  xs-padtb10 talc mart30 marb60 fsz16 white_bg hidden">
						<div class="wrap maxwi_100 padrl10  xs-padt0 xs-padrl15">
							
							<div class="container">
								<div class="">
									
									<div class="tab-header mart10  padb10 brdb_new">
										<a href="#" class="dinlblck mar5 padrl20 padtb5 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz16 xs-fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active" data-id="utab_AB_Testing">B</a>
										<a href="#" class="dinlblck mar5 padrl20 padtb5 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz16 xs-fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah" data-id="utab_Attribution">A</a>
										<a href="#" class="dinlblck mar5 padrl20 padtb5 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz16 xs-fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah " data-id="utab_Popular">AA</a>
										<a href="#" class="dinlblck mar5 padrl20 padtb5 brd brdclr_seggreen_h brdclr_segblue_a brdrad40 segblue_bg_a lgn_hight_26 fsz16 xs-fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah " data-id="utab_Analytics">AAA</a>
										
									</div>
									
									<div class="tab_container padt10 mart30 xs-padt10">
										
										<!-- Popular -->
										<div class="padt0 tab_content hide " id="utab_Popular" style="display: none;">
											<div class="dflex xs-fxwrap_w alit_c">
												<div class="brdb_b  visible-xs visible-sm">
													<h4 class="bold fsz30 padb10 tall visible-xs visible-sm">NOTIFY <span class="fa fa-heart red_txt"></span> Family &amp; Friends</h4>
													<h3 class="fsz18 padb20 tall visible-xs visible-sm ">Hjälp en medmänniska i nöd.</h3>
												</div>
												
												<div class="wi_40 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc">
													
													
													<div class="padb0 xxs-pad0 xxs-padb80">
														
														
														<h4 class="bold fsz40 padb10 tall hidden-xs " style="font-family: 'Audiowide', sans-serif;"><span class="fa fa-heart red_txt"></span>  N O F F</h4>
														<h3 class="fsz25 padb10 brdb_red_new tall hidden-xs lgn_hight_30">Gratis meddelandetjänst till den skadades anhöriga</h3>
														
														<div class="marb0 padrl0 first">
															
															
															
															
															
															<div class="clear"></div>
															
															<div class="mart20 padb10 xs-padrl0" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn  fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" >Meddela med BankID</a> </div>
															
															
															
														</div>
														
														
														
														
														
													</div>
													
													
												</div>
												<div class="wi_60 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc padl80 xs-padr0">
													<h4 class="bold fsz20 padb10 tall hidden-xs">Hur det fungerar</h4>
													<h3 class="fsz18 padb20 tall hidden-xs">Mayday - Notify Family & Friends</h3>
													<ul class="mart10 padl20 tall">
														<li class="black_txt fsz16">Fyll i den skadades person nummer. Se till att det är rätt land</li>
														<li class="black_txt fsz16">Fyll i address var personen befinner sig.</li>
														<li class="black_txt fsz16">Skriv ett kort meddelande</li>
														<li class="black_txt fsz16">Fyll i ditt personnummer</li>
														<li class="black_txt fsz16">Klicka på meddela rutan</li>
													</ul>
												</div>
												
											</div>
											
											<div class="clear"></div>
										</div>
										
										<!-- Analytics -->
										<div class="padt0 tab_content hide" id="utab_Analytics" style="display: none;">
											<div class="dflex xs-fxwrap_w alit_c">
												<div class="brdb_b  visible-xs visible-sm">
													<h4 class="bold fsz30 padb10 tall visible-xs visible-sm">NOTIFY <span class="fa fa-heart red_txt"></span> Family &amp; Friends</h4>
													<h3 class="fsz18 padb20 tall visible-xs visible-sm ">Hjälp en medmänniska i nöd.</h3>
												</div>
												
												<div class="wi_40 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc">
													
													
													<div class="padb0 xxs-pad0 xxs-padb80">
														
														
														<h4 class="bold fsz40 padb10 tall hidden-xs " style="font-family: 'Audiowide', sans-serif;"><span class="fa fa-heart red_txt"></span>  N O F F</h4>
														<h3 class="fsz25 padb10 brdb_red_new tall hidden-xs lgn_hight_30">Gratis meddelandetjänst till den skadades anhöriga</h3>
														
														<div class="marb0 padrl0 first">
															
															
															
															
															
															<div class="clear"></div>
															
															<div class="mart20 padb10 xs-padrl0" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn  fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" >Meddela med BankID</a> </div>
															
															
															
														</div>
														
														
														
														
														
													</div>
													
													
												</div>
												<div class="wi_60 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc padl80 xs-padr0">
													<h4 class="bold fsz20 padb10 tall hidden-xs">Hur det fungerar</h4>
													<h3 class="fsz18 padb20 tall hidden-xs">Mayday - Notify Family & Friends</h3>
													<ul class="mart10 padl20 tall">
														<li class="black_txt fsz16">Fyll i den skadades person nummer. Se till att det är rätt land</li>
														<li class="black_txt fsz16">Fyll i address var personen befinner sig.</li>
														<li class="black_txt fsz16">Skriv ett kort meddelande</li>
														<li class="black_txt fsz16">Fyll i ditt personnummer</li>
														<li class="black_txt fsz16">Klicka på meddela rutan</li>
													</ul>
												</div>
												
											</div>
											
											
											<div class="clear"></div>
										</div>
										
										
										<!-- A/B Testing -->
										<div class="tab_content hide active" id="utab_AB_Testing" style="display: block;">
											
											<div class="dflex xs-fxwrap_w alit_c">
												<div class="brdb_b  visible-xs visible-sm">
													<h4 class="bold fsz30 padb10 tall visible-xs visible-sm">NOTIFY <span class="fa fa-heart red_txt"></span> Family &amp; Friends</h4>
													<h3 class="fsz18 padb20 tall visible-xs visible-sm ">Hjälp en medmänniska i nöd.</h3>
												</div>
												
												<div class="wi_40 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc">
													
													
													<div class="padb0 xxs-pad0 xxs-padb80">
														
														
														<h4 class="bold fsz40 padb10 tall hidden-xs " style="font-family: 'Audiowide', sans-serif;"><span class="fa fa-heart red_txt"></span>  N O F F</h4>
														<h3 class="fsz25 padb10 brdb_red_new tall hidden-xs lgn_hight_30">Gratis meddelandetjänst till den skadades anhöriga</h3>
														
														<div class="marb0 padrl0 first">
															
															
															
															
															
															<div class="clear"></div>
															
															<div class="mart20 padb10 xs-padrl0" > <a href="https://www.qloudid.com/user/index.php/NotifyFamilyFriends#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn  fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" >Meddela med BankID</a> </div>
															
															
															
														</div>
														
														
														
														
														
													</div>
													
													
												</div>
												<div class="wi_60 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc padl80 xs-padr0">
													<h4 class="bold fsz20 padb10 tall hidden-xs">Hur det fungerar</h4>
													<h3 class="fsz18 padb20 tall hidden-xs">Mayday - Notify Family & Friends</h3>
													<ul class="mart10 padl20 tall">
														<li class="black_txt fsz16">Fyll i den skadades person nummer. Se till att det är rätt land</li>
														<li class="black_txt fsz16">Fyll i address var personen befinner sig.</li>
														<li class="black_txt fsz16">Skriv ett kort meddelande</li>
														<li class="black_txt fsz16">Fyll i ditt personnummer</li>
														<li class="black_txt fsz16">Klicka på meddela rutan</li>
													</ul>
												</div>
												
											</div>
											
											
											
											
											<div class="clear"></div>
										</div>
										
										<!-- Attribution -->
										<div class="tab_content hide" id="utab_Attribution" style="display: none;">
											
											<div class="dflex xs-fxwrap_w alit_c">
												<div class="brdb_b  visible-xs visible-sm">
													<h4 class="bold fsz30 padb10 tall visible-xs visible-sm">NOTIFY <span class="fa fa-heart red_txt"></span> Family &amp; Friends</h4>
													<h3 class="fsz18 padb20 tall visible-xs visible-sm ">Hjälp en medmänniska i nöd.</h3>
												</div>
												
												<div class="wi_40 xs-wi_100 flex_1 order_2 xs-order_1 xs-tall tall mart10 brdrad5 talc">
													
													
													<div class="padb0 xxs-pad0 xxs-padb80">
														
														
														<h4 class="bold fsz40 padb10 tall hidden-xs " style="font-family: 'Audiowide', sans-serif;"><span class="fa fa-heart red_txt"></span> Verify ID</h4>
														<h3 class="fsz25 padb10 brdb_red_new tall hidden-xs lgn_hight_30">Gratis meddelandetjänst till den skadades anhöriga</h3>
														
														<div class="marb0 padrl0 first">
															
															
															
															
															
															<div class="clear"></div>
															
															<div class="mart20 padb10 xs-padrl0" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 blue_bgn  fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0" >Meddela med BankID</a> </div>
															
															
															
														</div>
														
														
														
														
														
													</div>
													
													
												</div>
												<div class="wi_60 xs-wi_100 fxshrink_0 order_2 xs-order_2 martb20 marr30 xs-marr0 talc padl80 xs-padr0">
													<h4 class="bold fsz20 padb10 tall hidden-xs">Hur det fungerar</h4>
													<h3 class="fsz18 padb20 tall hidden-xs">Mayday - Notify Family & Friends</h3>
													<ul class="mart10 padl20 tall">
														<li class="black_txt fsz16">Fyll i den skadades person nummer. Se till att det är rätt land</li>
														<li class="black_txt fsz16">Fyll i address var personen befinner sig.</li>
														<li class="black_txt fsz16">Skriv ett kort meddelande</li>
														<li class="black_txt fsz16">Fyll i ditt personnummer</li>
														<li class="black_txt fsz16">Klicka på meddela rutan</li>
													</ul>
												</div>
												
											</div>
											
											<div class="clear"></div>
										</div>
										
										
										
									</div>
								</div>
							</div>
						</div>
					</div>		
					
					
					
					
				</div>
				
				
				
				
				
				
			</div>
			<div class="clear"></div>
			
			
		</div>
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow white_bg" id="gratis_msg">
		 
	
	<div class="modal-content nobrdb talc box_shadox brdrad3 white_bg">
			
			
			<div class="padt25 marb0  brdradtr10">
				 
				<img src="../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_150p">
			 
			</div>
			<h2 class="marb0 padrl10 padt20 bold fsz24 black_txt">Identification</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20 padt10 padb20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 black_txt"> In order to report ID hijacked we need your social security number for identification purposes.</span>
				</div>
				
				
			</div>	
		<div class="on_clmn padb20 padrl20">
				<a href="../StoreData/addUserSSN"  class="padt15 trn wi_300p maxwi_100  hei_50p diblock nobrd bg_ffde00 fsz18 black_txt curp bold"  >Add</a>
				
			</div>
			 <div class="padb20">
			<a href="#" class="talc trn close_popup_modal" >Cancel</a>
			</div>
	</div>
	
	</div>
		
<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_ssn">
				<div class="modal-content pad25  nobrdb talc brdrad5 ">
				<div id="loginBankMsg" style="display:none;">
				<div class="talc fsz75 red_txt"><img src="<?php echo $path; ?>html/usercontent/images/icon_64x64@2x.png" /></span></div>
							<div class="padb10 padt20">
									<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="errorMsg"></h1>
									<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="cinMsg"></h1>
									
								</div>
						
				</div>
				
				<div id="loginFailMsg" style="display:none;">
				<div class="talc fsz75 red_txt"><img src="<?php echo $path; ?>html/usercontent/images/icon_64x64@2x.png" /></span></div>
							<div class="padb10 padt20">
									<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="errorMsg"></h1>
									<h1 class="padb5 talc fsz40 xs-fsz25  lgn_hight_45 xxs-lgn_hight_35" id="cinMsg"></h1>
									
								</div>
						
				</div>
					<div id="loginBank">
					<h2 class="marb10 pad0 bold fsz24 black_txt">Signera med BankID</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">Var vänlig och signera med ditt mobila BankID. </span>
						</div>
						
						
					</div>
					<form method="POST" action="updateSSN" name="update_ssn" id="update_ssn">
					
					<div class="on_clmn padb10">
						
						<div class="on_clmn ">
							
								
								
								<div class="pos_rel padl0">
									
									<input type="text" id="ssecurity" name="ssecurity"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5 ffamily_avenir" placeholder="Enter Personnummer" value='<?php echo $resultOrg1['ssn']; ?>'>
									
							
								
							</div>
							
						</div>
					</div>
					
				</form>					
										
					<div id="error_msg_form1"></div>
					<div class="on_clmn mart10 marb20">
						<input type="button" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlpanlyellow_bg fsz18 black_txt curp ffamily_avenir" onclick="checkFormData();">
						
					</div>
					
					
				</div>	
				</div>
</div>

<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_phone">
				<div class="modal-content pad25  nobrdb talc brdrad5 ">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt">Signera med sms & kod</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">General - Skickas till </span>
						</div>
						
						
					</div>
					
					<form method="POST" action="approveOtp" id="save_indexing_otp" name="save_indexing_otp" accept-charset="ISO-8859-1">
					<div class="on_clmn padb10">
						
						<div class="on_clmn ">
							<div class="thr_clmn wi_50">	
								
								
								
								<div class="pos_rel padl0">
									
									<input type="text" id="cntryph" name="cntryph"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5 ffamily_avenir" placeholder="Enter phone" value='<?php echo $resultOrg1['country_phone']; ?>' readonly>
									
								</div>
								
							</div>
							<div class="thr_clmn padl10 wi_50">
								
								
								<div class="pos_rel padr0">
									
									
									<input type="number" id="phoneno" name="phoneno" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5 ffamily_avenir" placeholder="Enter phone" value='<?php echo $resultOrg1['phone_number']; ?>'>
								</div>
							</div>
						</div>
					</div>
					</form>
					<div id="errPhone"></div>
					<div class="on_clmn mart10 marb20">
						<input type="button" value="Generera kod" class="wi_320p maxwi_100 brdrad3 ffamily_avenir hei_50p diblock nobrd panlpanlyellow_bg fsz18 black_txt curp" onclick="verifyUser();">
						
					</div>
					
					
					
				</div>
			</div>
			
<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_login brdrad5 " id="gratis_popup_login">
				<div class="modal-content pad25 brdrad5 ">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt talc">Slå in koden</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">Låt oss fastställa din identitet. Vi har precis skickat ett text meddelande med en ny kod till telefon numret som slutar på *****<span id="lastPh"></span> </span>
						</div>
						
						
					</div>
					
					
						
						
						<div class="padb0">
							
							<div class="pos_rel ">
								
								<input type="text" name="otp" id="otp" placeholder="Fyll i lösenordet" max="9999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5  ffamily_avenir">
								
							</div>
						</div>
						<div class="red_bg" id="error_msg_opt">
							
							
						</div>
						
						
						
						
						
					
					<div class="mart20 talc marb10">
						<input type="button" value="Signera och kom igång" class="ffamily_avenir wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlpanlyellow_bg fsz18 black_txt curp" onclick="checkOtp();">
						<input type="hidden" id="infor_id" name="infor_id" />
						
					</div>
					<div> Inte fått något sms? Försök igen.</div>
					
				</div>
			</div>
			



<div class="popup_modal wi_600p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="reset-pass-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			Reset password
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		<div class="tab-header">
			<a href="#" class="ws_now txt_0_a active" data-id="reset-pass-set">Set password</a>
			<span class="padrl5">|</span>
			<a href="#" class="ws_now txt_0_a" data-id="reset-pass-auto">Auto-generate password</a>
		</div>
		
		<div class="tab-content padt20" id="reset-pass-set">
			<form action="changePassword" method="POST" id="loginform">
				<div class="wi_100 minhei_190p padb15">
					<div class="dflex fxwrap_w alit_fs padb5">
						<div class="wi_100 maxwi_100 marr15 marb15">
							<label for="reset-pass-password" class="sr-only">Password</label>
							<input type="password" name="cpassword" id="cpassword" class="wi_175p mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Type Current Password" />
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<label for="reset-pass-password" class="sr-only">Password</label>
							<input type="password" name="newpassword" id="newpassword" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Type New Password" />
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<label for="reset-pass-retype" class="sr-only">Password</label>
							<input type="password" name="repassword" id="repassword" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="Retype New Password" />
						</div>
					</div>
					<div class="marb25">
						<span>Password strength:</span>
						<span class="password-strength"></span>
						<div class="wi_175p maxwi_100 mart5 bg_e0">
							<div class="maxwi_100 hei_3p" data-weak="bg_fc3" data-good="bg_69c" data-strong="bg_008000"></div>
						</div>
					</div>
					<label>
						<input type="checkbox" name="require-change" value="1" />
						<span class="marl5">Require a change of password in the next sign in</span>
					</label>
				</div>
				<div class="talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<button type="button" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validateLogin();">Submit</button>
				</div>
			</form>
		</div>
		<div class="tab-content padt20" id="reset-pass-auto">
			<form>
				<div class="wi_100 minhei_190p padb15">
					<div class="dflex fxwrap_w alit_fs padb10">
						<div class="wi_175p maxwi_100 marr15 marb15">
							<input type="password" name="password" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f trans_bg font_helvetica" value="qweqweqweqwe" disabled />
						</div>
						<div class="wi_175p maxwi_100 marr15 marb15">
							<input type="password" name="retype-password" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f trans_bg font_helvetica" value="qweqweqweqwe" disabled />
						</div>
					</div>
					<label>
						<input type="checkbox" name="require-change" value="1" />
						<span class="marl5">Require a change of password in the next sign in</span>
					</label>
				</div>
				<div class="talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Submit</button>
				</div>
			</form>
		</div>
		
	</div>
</div>

<div class="popup_modal wi_640p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="more-rename-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			Rename user
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		
		<div class="marb30">
			Before renaming this user, ask the user to sign out of his or her account. After you rename this user:
			<ul class="padl15">
				<li>All contacts in the user's Google Talk chat list are removed.</li>
				<li>The user might not be able to use chat for up to 3 days.</li>
				<li>The rename operation can take up to 10 minutes.</li>
				<li>The user's current address (bot-first@spam1-samf.com) becomes an alias to ensure email delivery.</li>
				<li>The new name might not be available for up to 10 minutes.</li>
			</ul>
		</div>
		
		<form>
			<div class="wi_100 minhei_190p padb15">
				<div class="dflex fxwrap_w alit_fs padb5">
					<div class="wi_175p maxwi_100 marr15 marb15">
						<label for="more-rename-fname" class="">First name</label>
						<input type="text" name="first-name" id="more-rename-fname1" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Kowaken" />
					</div>
					<div class="wi_175p maxwi_100 marr15 marb15">
						<label for="more-rename-lname" class="">Last name</label>
						<input type="text" name="last-name" id="more-rename-lname" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Ghirmai" />
					</div>
				</div>
				<div class="wi_365p maxwi_100 dflex alit_fe padb5">
					<div class="flex_1 marb15">
						<label for="more-rename-fname" class="">Primary email address</label>
						<input type="text" name="first-name" id="more-rename-fname2" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" value="Kowaken" />
					</div>
					<div class="fxshrink_0 marb15 padb10">
						<span>@qmatchup.com</span>
					</div>
				</div>
			</div>
			<div class="talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Rename user</button>
			</div>
		</form>
		
	</div>
</div>

<!-- More - restore -->
<div class="popup_modal wi_550p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="more-restore-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			Restore data
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		<form>
			<div class="marb30">
				<p>Upgrade data range and target services for data restore. <a href="#">Learn more</a>
				</p>
				
				<div class="wi_100 dflex xxs-fxwrap_w alit_c marb20 padb5">
					<div class="wi_50 xxs-wi_100 maxwi_100 flex_1 pos_rel marr15 marb15">
						<label for="more-restore-from" class="sr-only">From date</label>
						<input type="text" name="from" id="more-restore-from" class="datepicker2 wi_100 mart5 padtbl10 padr30 brd brdclr_dblue_f font_helvetica" placeholder="From" />
						<span class="fa fa-calendar-o pos_abs zi2 pos_cenY right8p padt1"></span>
					</div>
					<div class="wi_50 xxs-wi_100 maxwi_100 flex_1 pos_rel marr15 marb15">
						<label for="more-restore-to" class="sr-only">To date</label>
						<input type="text" name="to" id="more-restore-to" class="datepicker2 wi_100 mart5 padtbl10 padr30 brd brdclr_dblue_f font_helvetica" placeholder="To" />
						<span class="fa fa-calendar-o pos_abs zi2 pos_cenY right8p padt1"></span>
					</div>
					<div class="fxshrink_0 marb15">
						GMT+2:00
					</div>
				</div>
				
				<div class="padtb5">
					<label>
						<input type="radio" name="source" value="drive" />
						<img src="<?php echo $path;?>html/usercontent/images/icons/drive-32.png" width="28" height="28" class="marr5 marl10 valm" />
						<span class="valm">Drive</span>
					</label>
				</div>
				<div class="padtb5">
					<label>
						<input type="radio" name="source" vaue="gmail" />
						<img src="<?php echo $path;?>html/usercontent/images/icons/google_plus_32dp.png" width="28" height="28" class="marr5 marl10 valm" />
						<span class="valm">Gmail</span>
					</label>
				</div>
				
			</div>
			
			
			<div class="mart20 talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Restore data</button>
			</div>
		</form>
		
	</div>
</div>

<!-- More - suspend -->
<div class="popup_modal wi_480p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="more-suspend-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			Suspend Kowaken Ghirmai
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		
		<div class="marb30">
			This user will not be able to:
			<ul class="padl15">
				<li>Login to spam1-samf.com</li>
				<li>Access services like Gmail, Drive, Calendar, but data will not be deleted</li>
				<li>Receive invites sent to Gmail and Calendar</li>
			</ul>
			<p>
				Gmail delegates of the user (if any) will stop seeing him in Account Chooser
				<br> You will be able to activate this user later
			</p>
			<p>
				<strong class="txt_dd4b39">User license fees still apply to suspended users</strong>
			</p>
		</div>
		
		<form>
			<div class="talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Suspend user</button>
			</div>
		</form>
		
	</div>
</div>

<!-- More - delete -->
<div class="popup_modal wi_550p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="more-delete-modal">
	<div class="modal-content pad25 brd">
		
		<h3 class="pos_rel marb25 pad0 padr40 bold fsz20 dark_grey_txt">
			User Deletion
			<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
		</h3>
		<form>
			<div class="marb30">
				<p>Before deleting this account, you have the option to transfer data associated with the account to a new owner.</p>
				
				<div class="fsz13">
					Upgrade data to transfer:
					<div class="martb10">
						<label>
							<input type="checkbox" name="drive-docs" />
							<img src="<?php echo $path;?>html/usercontent/images/icons/drive-32.png" width="28" height="28" class="marr5 marl10 valm" />
							<strong class="valm">
								Drive and Docs
							</strong>
						</label>
						<div class="padt15 padb10 padl30">
							<label>
								<input type="checkbox" name="shared" />
								<span>Also include data that is not shared with anyone</span>
							</label>
						</div>
					</div>
					<div class="martb10">
						<label>
							<input type="checkbox" name="google+pages" />
							<img src="<?php echo $path;?>html/usercontent/images/icons/google_plus_32dp.png" width="28" height="28" class="marr5 marl10 valm" />
							<strong class="valm">
								Google+ Pages
							</strong>
						</label>
						<div class="padt15 padb10 padl30">
							Data from all Brand Accounts will be transferred to a new primary owner. This includes Google+ Pages & Google My Business.
						</div>
					</div>
					<div class="mart20">
						<strong>Note:</strong> All data associated with this account (except data associated with the Google services Your plan above) will be deleted. <a href="#">Learn more</a>
					</div>
				</div>
			</div>
			
			
			<div class="talr">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<button type="submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp">Assign a new owner for this data</button>
			</div>
		</form>
		
	</div>
</div>


<!-- Popup fade -->
<div id="popup_fade" class="opa0 opa55_a black_bg"></div>

<div id="keep-Your plan" class="wi_100 hei_64p dflex xs-dnone sm-dnone alit_c justc_sb opa0 opa1_a pos_fix zi999 top-64p top0_a left0 padrl15 bxsh_0220_0_14_031-2_0_2_0150_0_12 bg_f trans_all2">
	<div class="dflex fxwrap_w alit_c padtb10">
		<div class="pos_rel marr15">
			<a href="#" class="keep-Your plan-clear dflex alit_c justc_c talc">
				<img src="<?php echo $path; ?>/html/keepcss/images/icons/icon-arrow-left.svg" width="24" height="24" class="maxwi_100 hei_auto" alt="Clear selection">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Clear selection</span>
			</div>
		</div>
		<div class="marr15 fsz20 txt_0_54">
			<span id="keep-Your plan-count"></span> updated
		</div>
	</div>
	<div class="keep-actions wi_100 maxwi_250p dflex alit_c padtb10">
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1" onclick="submit_value();">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Pin">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Pin</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Remind me</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
			</a>
			<div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs zi2 top100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_e0 brdclr_80_h brdclr_80_a brdrad50 bg_f trans_all2 active" data-color="#fff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ff8a80 brdclr_80_h brdrad50 bg_ff8a80 trans_all2" data-color="#ff8a80"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffd180 brdclr_80_h brdrad50 bg_ffd180 trans_all2" data-color="#ffd180"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffff8d brdclr_80_h brdrad50 bg_ffff8d trans_all2" data-color="#ffff8d"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ccff90 brdclr_80_h brdrad50 bg_ccff90 trans_all2" data-color="#ccff90"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_a7ffeb brdclr_80_h brdrad50 bg_a7ffeb trans_all2" data-color="#a7ffeb"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_80d8ff brdclr_80_h brdrad50 bg_80d8ff trans_all2" data-color="#80d8ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_82b1ff brdclr_80_h brdrad50 bg_82b1ff trans_all2" data-color="#82b1ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_b388ff brdclr_80_h brdrad50 bg_b388ff trans_all2" data-color="#b388ff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_f8bbd0 brdclr_80_h brdrad50 bg_f8bbd0 trans_all2" data-color="#f8bbd0"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_d7ccc8 brdclr_80_h brdrad50 bg_d7ccc8 trans_all2" data-color="#d7ccc8"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
				<a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_cfd8dc brdclr_80_h brdrad50 bg_cfd8dc trans_all2" data-color="#cfd8dc"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
			</div>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Change color</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">Archive</span>
			</div>
		</div>
		<div class="keep-action wi_20 pos_rel">
			<a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
				<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
			</a>
			<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
				<span class="dblock padrl8">More</span>
			</div>
		</div>
	</div>
</div>


<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist2-fade" data-target="#menulist2-dropdown,#menulist2-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="organization-move-fade" data-target="#organization-move,#organization-move-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="add-userto-group-fade" data-target="#add-userto-group,#add-userto-group-fade" data-classes="active" data-toggle-type="separate"></a>
<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="more-fade" data-target="#more,#more-fade" data-classes="active" data-toggle-type="separate"></a>

<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</body>

</html>


