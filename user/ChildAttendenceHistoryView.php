﻿<!doctype html>
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
		
	if($childrenDetail ['child_image_path']!=null) { $filename="../estorecss/".$childrenDetail ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$childrenDetail ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpeg( $value_a, '../estorecss/tmp'.$childrenDetail['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png"; ?>

<html>

	<head>
		<meta charset="utf-8">
			<meta name="viewport" content="width=device-width,initial-scale=1">
				<title>Qmatchup</title>
				<!-- Styles -->
				<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
					<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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

									var currentLang = 'sv';
			function openPopup()
         {
         if($("#openPop").hasClass('active'))
         {
         $("#openPop").removeClass('active')
         $("#openPop").attr('style','display:none');
         }
         else
         {
         $("#openPop").addClass('active')
         $("#openPop").attr('style','display:block');
         }
         }
		 
			function selectCode(id)
			{
				if(id==1)
				{
					document.getElementById("codeSelect").style.display='block';
				}
				else
				{
					document.getElementById("codeSelect").style.display='none';
				}
			}
		
		function checkFlag()
	{
		if($("#openPop").hasClass('active'))
         {
         $("#openPop").removeClass('active')
         $("#openPop").attr('style','display:none');
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

		function validateLogin1()
{
    
    //alert("hi");
    
                 var cpass=$("#cpassword1").val();
				 var user=<?php echo $data['user_id']; ?>;
                    if($("#cpassword1").val() == "")
					{
						alert("Enter current password");
						$("#cpassword1").css("background-color","#FF9494");
						return false;
					}
					

					
					if($("#newpassword1").val() == "" )
                    {
                    $("#newpassword1").css("background-color","#FF9494");
					alert("Enter New Password");
                    return false;
                    }
					
					if($("#newpassword1").val().length <6 )
                    {
						$("#newpassword1").css("background-color","#FF9494");
					alert("Enter minimum six characters");
                    return false;
                    }
					
					
                    if($("#repassword1").val() == "" )
                    {
                    $("#repassword1").css("background-color","#FF9494");
					alert("Re-Enter New Password");
                    return false;
                    }
					
					
					if($("#repassword1").val().length <6 )
                    {
						$("#repassword1").css("background-color","#FF9494");
					alert("Enter minimum six characters");
                    return false;
                    }
					
					
					if($("#repassword1").val() != $("#newpassword1").val())
                    {
                    $("#repassword1").css("background-color","#FF9494");
					$("#newpassword1").css("background-color","#FF9494");
					alert("New password must match !!");
                    return false;
                    }
                    
					$.get("https://www.qloudid.com/user/index.php/ChangePassword/checkPassword/"+cpass+"/"+user,function(data1,status){
							   
								  if(data1==0)
									{
										$("#cpassword1").css("background-color","#FF9494");
										alert("Your current password don't match !!");
										return false;
									}
									else
									{
									document.getElementById("loginform1").submit();	
									}
								  
								  
								  });
                    
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
						 <div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10  header_blue_67cff738"  >
            <div class="fleft padrl0 header_button_blue_67cff7a3 padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/user/index.php/DayCareRequest/daycareWelcome/<?php echo $data['parent_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left header_arrow_blue_1e96c3" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/user/index.php/DayCareRequest/daycareWelcome/<?php echo $data['parent_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				  <div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25" onclick="openPopup();"><span class="fas fa-list " aria-hidden="true"></span></a>
						<ul id="openPop" style="display:none" class="">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="setting_menu pad15">
									<div class="fsz16 trn">Inloggad som</div>
									<ol class="mart10">
									<li class="first">
                    <div class=" mart10"></div>
                  </li>
									<li class="first"><a href="../childNewsDetail/<?php echo $data['parent_id']; ?>" class="fsz16i" ><span class="fas fa-gift padr15" aria-hidden="true"> </span>Newsfeed</a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				  
										
                  <li><a href="javascript:void(0);" class="fsz16i" ><span class="fas fa-list-ol padr15" aria-hidden="true"> </span> Presence</a></li>
				   <li>
                    <div class="line martb10"></div>
                  </li>
                  <li><a href="../relativeInformation/<?php echo $data['parent_id']; ?>" class="fsz16i" ><span class="fas fa-drafting-compass padr15" aria-hidden="true"> </span> Pick & drop list</a></li>
				  
				   <li class="last">
                    <div class="line martb10"></div>
                  </li>
                    </ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			 
			 
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear" id=""></div>
		
		

								<div class="column_m pos_rel" onclick="checkFlag();">

									<!-- SUB-HEADER -->




									<!-- CONTENT -->
									<div class="column_m container zi5  mart40 xs-mart20" onclick="checkFlag();">
										<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
										
										<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 439px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" style="width: 220px; top: 0px;">
								
								<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb padb20 marb10">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="pad20 wi_100 hei_220p xs-hei_50p talc  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																	<img src="../../../<?php echo $value_a; ?>" height="145" width="145" class="brdrad5 padb0">
																	
																		<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="fsz25 ffamily_avenir tall"> <span><?php echo $childrenDetail['first_name']; ?></span>  </div>
															</a>																
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>	
										
									
									
									
									 
									
									
									
									
									<ul class="dblock mar0 padl10 fsz16">
										
										
										<!-- Company -->
										
										
										
										
										<li class="dblock pos_rel padb10 padt0 brdclr_hgrey  first last">
											 
											<ul class="marr20 pad0">
											  <li class="dblock padrb10  ">
                                 <a href="../childNewsDetail/<?php echo $data['parent_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Newsfeed</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
												<li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb tb_67cff7_bg brd_width_2 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Presence</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
							  
							   
							  <li class="dblock padrb10 padt5">
                                 <a href="../relativeInformation/<?php echo $data['parent_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Pick & drop list</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
								 
												 
											
												 
												
											</ul>
											
										</li>
										
										
										
										
										
									</ul>
								
								
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				
				
					
										
										
											 	<!-- Center content -->
											<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">






												<div class="padb20 xxs-padb0 ">

													<div class="wrap maxwi_100 dflex xxs-dfex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_blue1">
														<div class="white_bg tall xs-talc">




															<!-- Logo -->
															<h1 class="black_txt fsz30 xs-fsz45 xs-talc ffamily_avenir">Presence</h1>
															<!-- Logo -->
															<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz20  edit-text jain_drop_company ffamily_avenir xs-talc">Here is a list of past check ins and check outs</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->

															</a></div>


													</div>

													


													<div class="container  column_m fsz14 dark_grey_txt">

														<!-- Summary -->

														<div class="tab-content padt5 active" id="tab_total1" style="display:block;">

															


															<?php $i=0;
													
													foreach($attendenceDetail as $category => $value) 
													{
														
														
													?> 
															<div class=" white_bg marb10  brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padt15 padb20  brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																		<div class="fleft wi_50 marl0 xs-marr0">
                                                                       <div class="tdcalender" style="width:60px; height:60px;">
																		<div class="tdmonth"><?php echo date('M',strtotime($value['drop_date'])); ?></div>
																		
																		<div class="padtb2 fsz25"><?php echo date('d',strtotime($value['drop_date'])); ?></div>
																		<div class="fsz10 hidden"><?php echo date('Y',strtotime($value['drop_date'])); ?></div>
																	</div>
                                                                    </div>
																		
																			 
																			<div class="fleft xs-talc  wi_20   sm-wi_100 marl15 xs-mar0  xs-padb0"> <span class="trn ffamily_avenir fsz14" data-trn-key="Drop off">Drop off</span> <span class=" edit-text jain1 dblock  brdclr_lgtgrey2 fsz18 ffamily_avenir"><?php echo date('h:i',strtotime($value['drop_date'])); ?></span> </div>
																			<div class="fleft   wi_20   marl15    xs-padb0"> <span class="trn ffamily_avenir fsz14" data-trn-key="Pick up">Pick up</span> <span class=" edit-text jain2 dblock  brdclr_lgtgrey2 fsz18 ffamily_avenir"><?php if($value['pickup_date']==null) echo '-'; else echo date('h:i',strtotime($value['pickup_date'])); ?></span> </div>
																			

																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>



															<?php } ?>

														<div id="more_data">
															</div>
								
													<div class="padt20 talc">
														<a href="javascript:void(0);" value="1" id="temp" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width ffamily_avenir" onclick="show_more_data(this,this.value);">View more</a>
														
													</div>
												<script>
							function show_more_data(link,id) {
				
				var html;
				var id_val1=parseInt($(link).attr('value'));
				var id_val=parseInt($(link).attr('value'))+1;
				
				$(link).val(id_val);
				$("#temp").attr('value',id_val);
				
				var send_data={};
				
				send_data.id=id_val1;
				$.ajax({
					type:"POST",
					url:"../moreAttendenceInfo/<?php echo $data['child_id']; ?>",
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
							</script>
					
														</div>


														

													</div>

													<div class="clear"></div>
												</div>

												<div class="clear"></div>
											</div>

											 
										</div>
										<div class="clear"></div>
									</div>
									
									<div class="clear"></div>
								<div class="hei_80p hidden-xs"></div>
								</div>
								 
								


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

												<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_company_searched">
													<div class="modal-content pad25 brd brdrad10">
														<div id="searched">


														</div>

													</div>
												</div>






												<!-- New client modal -->

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