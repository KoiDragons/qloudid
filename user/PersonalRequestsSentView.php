<!doctype html>
<?php 
	 
	$path1 = $path."html/usercontent/images/";
	 
	
?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		
		<script>
			
			var langVar='<?php if($userLanguageDetail==0) echo "en"; else echo "sv"; ?>';
			function closeCode()
			{
				
				$("#gratis_popup_code").removeClass('active');
				$("#gratis_popup_code").attr('style','display:none');
			}
			
			function showUserDetailReceived(id,link,aid)
			{
				
				var send_data={};
				send_data.id=id;
				send_data.aid=aid;
				var $this = $(this);
				$(".yellow_bg").removeClass('yellow_bg');
				$(link).closest('tr').addClass('yellow_bg');
				$.ajax({
					type:"POST",
					url:"profileInfoReceived",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						document.getElementById("gratis_popup_user_profile").style.display='none';
						$("#gratis_popup_user_profile").removeClass('active');
						$("#search_user_profile").html('');
						document.getElementById("gratis_popup_user_profile").style.display='block';
						$("#gratis_popup_user_profile").addClass('active');
						$("#search_user_profile").append(data1);
					}
				});
				
				
				
			}
			
			
			
			
			
			
			function submit_unique()
			{
				if($("#unique_id").val()=="" || $("#unique_id").val()==null)
				{
					alert("Please enter your unique code!!!");
					return false;
				}
				document.getElementById("save_indexing_unique").submit();
			}
			function selectCode(id)
			{
				
				
				if(id==3)
				{
					document.getElementById("phoneSelect").style.display='none';
					document.getElementById("codeSelect").style.display='block';
					document.getElementById("emailSelect").style.display='none';
				}
				else if(id==2)
				{
					document.getElementById("phoneSelect").style.display='none';
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='block';
				}
				else if(id==1)
				{
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='none';
					document.getElementById("phoneSelect").style.display='block';
				}
				else
				{
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='none';
					document.getElementById("phoneSelect").style.display='none';
				}
			}
			
			function submit_value(id)
			{
				
				var send_data={};
				
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"senderUserDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched").html('');
						$("#searched").append(data1);
						
					}
				});
				//document.getElementById("save_indexing").submit();
			}
			
			
			function showUserDetail(id,link)
			{
				
				var send_data={};
				send_data.id=id;
				var $this = $(this);
				$(".yellow_bg").removeClass('yellow_bg');
				$(link).closest('tr').addClass('yellow_bg');
				$.ajax({
					type:"POST",
					url:"profileInfo1",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						document.getElementById("gratis_popup_user_profile").style.display='none';
						$("#gratis_popup_user_profile").removeClass('active');
						$("#search_user_profile").html('');
						document.getElementById("gratis_popup_user_profile").style.display='block';
						$("#gratis_popup_user_profile").addClass('active');
						$("#search_user_profile").append(data1);
					}
				});
				
				
				
			}
			
		function searchUser()
			{
				
				if($("#reque").val()==1)
				{
					if($("#cntryph").val()==0)
					{
						alert("Please select country!!!");
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
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests";
								}
								
							}
						});
					}
					
				}
				
				else if($("#reque").val()==3)
				{
					if($("#code_id").val()=="" || $("#code_id").val()==null)
					{
						alert("Please enter your verification code!!!");
						return false;
					}
					else
					{
						var send_data={};
						send_data.id=$("#code_id").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests";
								}
								
							}
						});
					}
					
				}
				
				else if($("#reque").val()==2)
				{
					var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
					if (!reg.test($("#email_id").val())){
						
						$("#email_id").css("background-color","#FF9494");
						alert("Incorrect Email address format");
						return false;
						
					}
					if($("#email_id").val()=="" || $("#email_id").val()==null)
					{
						alert("Please enter your verification email!!!");
						return false;
					}
					
					else
					{
						var send_data={};
						send_data.email_id=$("#email_id").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests";
								}
								
							}
						});
					}
					
				}
				else
				{
					alert("Please select code!!!");
					return false;
				}
				
				
			}
			
			
			
			function changeLanguage(id)
			{
				var send_data1={};
				send_data1.id=id;
				
				$.ajax({
					url: 'updateUserLanguage',
					type: 'POST',
					dataType: 'json',
					data: send_data1
				})
				.done(function(data){
				})
				.fail(function(){})
				.always(function(){});
			}
			
			//var translator = $('body').translate({lang: "sv", t: dict});
			//translator.lang("sv");
			//var translation = translator.get("Home");
			
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
			
			/*var dict = {
				"Home": {
				sv: "Início"
				},
				"Download plugin": {
				sv: "Descarregar plugin",
				en: "Download plugin"
				}
				}
				var translator = $('body').translate({lang: "en", t: dict});
				translator.lang("sv");
			var translation = translator.get("Home");*/
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
		<div class="hidden-xs">
		<?php include 'UserHeaderStang.php'; ?>
		</div>

		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs" id="headerData">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                
                <div class="visible-xs visible-sm fleft padrl0">
                    <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                        <ul class="menulist sf-menu  fsz14">

                            <li class="first last" style="margin: 0 30px 0 0;">
                                <a href="https://www.qloudid.com/user/index.php/NewsfeedDetail" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                                 </li>

                        </ul>
                    </div>

                </div>

                 <div class="visible-xs visible-sm fright marr0 padt5 "> <a href="createRequests" class=" diblock padl7 padr7 brdrad3 fsz30 seggreen_47E2A1_txt"><i class="fas fa-plus " aria-hidden="true"></i></a> </div>
               
                <div class="clear"></div>

            </div>
        </div>

		<div class="clear" id=""></div>
		
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="removeActive();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
								
										<div class="column_m padb10 ">
												<div class="padl10">
													<div class="sidebar_prdt_bx marr20 brdb padb20">
														<div class="white_bg tall">
															
															
															
															<!-- Logo -->
																
																	 <div class="pad20 wi_100 hei_180p xs-hei_50p talc fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
																	background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 2%;
																	">
																	
																	
																	
																	<span class="fa-stack ">
																				 <i class="far fa-circle fa-stack-2x red_ff2828_bg red_ff2828_txt brdrad50" aria-hidden="true"></i>
																				  <i class="white_txt <?php echo $selectIcon['app_icon']; ?>" ></i>
																				</span>
																	
																	<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz30  "> <span><?php echo $selectIcon['app_name']; ?></span>  </div>
															</a>																	
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>

	
								
									
									
									
									
									<ul class="marr20 pad0">
									<li class=" dblock padr10  padl8">
											<a href="#" class=" lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Inställningar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										<li class=" dblock padb10 padl8 visible-xm visible-xs">
											<a href="#" class="show_popup_modal lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" data-target="#gratis_popup_code">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Skapa förfrågan</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										<li class=" dblock padb0 padl8 visible-xm visible-xs">
											<a href="#" class="show_popup_modal  lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" data-target="#gratis_popup">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn" data-trn-key="You got invitation">Aktivera inbjudan</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
									</ul>
									
									
									
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										<!-- Company -->
										
										
										
										
										<li class=" dblock pos_rel padb10 padt0 brdclr_hgrey ">
											 
											<ul class="marr20 pad0">
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  red_ff2828_bg_a  white_txt" style="border-radius:0%;"> <span class="valm trn" >Hantera</span> <span class="counter_position_a"><?php echo $requestPendingCountReceived['num']+$requestPendingCountConnections['num']; ?></span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p red_ff2828_bg rotate45" style="border-radius:0%;"></div>
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
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xs-white_bg sm-white_bg  padl20 xs-padl0">
						
						
						
						
						
						
						<div class="padb20 xxs-padb0 ">
							<!-- Charts -->
							
							
							<div class="column_m container zi1 padb5">
								<div class="wrap maxwi_100 dflex xxs-dfex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 ">
								
								<div class="white_bg tall">

                                    <!-- Logo -->
                                    <h1 class="black_txt fsz30 xs-fsz45 xs-talc ffamily_avenir">Verifiera</h1>

                                    <div class="marb0 xs-talc"> <a href="#" class="blacka1_txt fsz16  xs-fsz20  talc edit-text jain_drop_company ffamily_avenir">Verifiera eller bekräfta identitet på dig själv eller andra..</a></div>
                                    <a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
                                        <!-- Meta -->

                                    </a>
                                </div>
								 
								
								
										<div class="hidden-xs hidden-sm padrl10">
									<a href="createRequests" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt " >
										
										<span class="valm"> Verifiera </span>
									</a> <a href="#"><span class="fas fa-cog fsz22 padl10 lgn_hight_29 valm"></span></a>
								</div>
										
									
									
								</div>
							</div>
							
							  <div class="tab-header mart10 padb10 xs-talc">
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 red_ff2828_brdclr_a red_ff2828_bg_a brdrad40  lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Anslutna</a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 red_ff2828_brdclr_a red_ff2828_bg_a brdrad40  lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" data-id="utab_Analytics">Mottagna</a>
                                            <a href="#" class="dinlblck mar5 padrl30 xs-padrl10 brd_b7b7b7 red_ff2828_brdclr_a red_ff2828_bg_a brdrad40  lgn_hight_36 fsz14 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" data-id="utab_Advertising">Skickade</a>
                                             
											 <a href="#" class="xs-padrl10 padrl30 fsz18 dark_grey_txt red_ff2828_txt_a lgn_hight_36" data-id="utab_AB_Testing"><i class="fas fa-trash-alt"></i></a>
                                        </div>

							
							
							 
							 <div class="tab_container mart10">
								
								<!-- Summary -->
								<div class="tab_content hide" id="utab_AB_Testing" style="display: none;">
									
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1">
										<thead class="fsz16" >
											<tr class="white_bg brdb_red_ff2828 ffamily_avenir">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_red_ff2828 nobold  tall" >
													<a href="https://www.qloudid.com/user/index.php/PersonalRequests/receivedRequests">	<div class="padtb5 black_txt"> Kod / Email</div></a>
												</th>
												
												<th class="pad5 brdb_red_ff2828 nobold hidden-xs tall" >
													<div class="padtb5 black_txt trn" >Skapad</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold  tall" >
													<div class="padtb5 black_txt">Status</div>
												</th>
												
											</tr>
											
										</thead>
										</table>
									<div class="padtb20 talc">
										<a href="#" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width" value="1" >Visa fler</a>
										
									</div>
										<div class="clear"></div>
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1">
										<thead class="fsz16" >
											<tr class="white_bg brdb_red_ff2828 ffamily_avenir">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_red_ff2828 nobold  tall" >
													<a href="https://www.qloudid.com/user/index.php/PersonalRequests/receivedRequests">	<div class="padtb5 black_txt">Företag Kod / Email</div></a>
												</th>
												
												<th class="pad5 brdb_red_ff2828 nobold hidden-xs tall" >
													<div class="padtb5 black_txt trn" >Skapad</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold  tall" >
													<div class="padtb5 black_txt">Status</div>
												</th>
												
											</tr>
											
										</thead>
										</table>
										<div  id="RequestConnections4">
											<?php $i=0;
												
												foreach($requestRejectedDetailConnections as $category => $value) 
												{
													
												?> 
													<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			 
																			<span class="trn fsz14 ffamily_avenir" >Company name</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir"><?php echo html_entity_decode($value['company_name']); ?></span>  
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16"><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></span> </div>
																			 
													<div class="fleft xxs-fright wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Status">Status</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Rejected</span> </div>		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
												
												 
											<?php } ?>
											
										</div>
										
									 
									<div class="padt20 padb10 talc ">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width"  value="1" onclick="add_more_rejected_connections(this);">Visa fler</a>
									</div>
									<script>
										function add_more_rejected_connections(link) {
											
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											
											$.ajax({
												type:"POST",
												url:"moreRequestRejectedDetailConnections",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#RequestConnections4"),
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
									
									
								</div>
								<div class="tab_content hide" id="utab_Popular" style="display: block;">
									
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
										<thead class="fsz16" >
											<tr class="white_bg brdb_red_ff2828 ffamily_avenir">
												<!--<th class="pad5 brdb nobold  tall" >
													<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="wi_30 pad5 brdb_red_ff2828 nobold  tall" >
													<a href="https://www.qloudid.com/user/index.php/PersonalRequests/receivedRequests"><div class="padtb5 black_txt">Kod / Email</div></a>
												</th>
												<th class="visible-xs brdb_red_ff2828 visible-xm"></th>
												<th class="pad5 brdb_red_ff2828 nobold  tall hidden-xs" >
													<div class="padtb5 black_txt trn" >Godkänd</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Status</div>
												</th>
												
											</tr>
											
										</thead>
										
									</table>
											<?php $i=0;
												
												foreach($requestDetail as $category => $value) 
												{
													
												?> 
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			<a href="#" class="show_popup_modal black_txt" data-id="<?php echo $value['request_receiver']; ?>" onclick="showUserDetail(<?php if($value['request_receiver']==$data['user_id']) echo $value['request_sender']; else echo $value['request_receiver']; ?>,this);">
																			<span class="trn fsz14 ffamily_avenir" ><?php if($value['code_type']==1) echo 'Phone'; else if($value['code_type']==2) echo 'Email'; else echo 'Code'; ?></span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir"><?php if($value['code_type']==1) echo '+'.$value['country_code'].''.$value['phone_user']; else if($value['code_type']==2) echo $value['user_email']; else echo $value['user_code']; ?></span> </a>
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16"><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></span> </div>
																			 
													<div class="fleft xxs-fright wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Status">Status</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Ansluten</span> </div>		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
												 
											<?php } ?>
										<div  id="allRequest">
										</div>
										
									<div class="padtb20 talc ">
										<a href="#" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width <?php if($requestApprovedCount['num']<=20) echo 'hidden'; ?>" value="1" onclick="add_more_all(this);" data-trn-key="Visa fler">Visa fler</a>
										
									</div>
									
									<div class="clear"></div>
									<table class="wi_100 padt30" cellpadding="0" cellspacing="0" id="mytable2">
										<thead class="fsz16" >
											<tr class="white_bg brdb_red_ff2828 ffamily_avenir">
												
												<th class="wi_30 xs-wi_100 pad5 brdb_red_ff2828 nobold  tall" >
													<div class="padtb5 black_txt">Företag Kod / Email</div>
												</th>
												<th class="visible-xs brdb_red_ff2828 visible-xm"></th>
												<th class="pad5 brdb_red_ff2828 nobold  tall hidden-xs" >
													<div class="padtb5 black_txt">Godkänd	</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold hidden-xs tall" >
													<div class="padtb5 black_txt">Status	</div>
												</th>
												
											</tr>
											
										</thead>
										
										
									</table>
									<div  id="allConnections">
											<?php 
											echo $rowUserApprovedConnections;  ?>
										</div>
									<div class="padt20 padb10 talc <?php if($approvedDetailConnectionsCount['num']<=20) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width" value="1" onclick="add_more_allConnections(this);">Visa fler</a>
									</div>
									<script>
										function add_more_allConnections(link) {
											
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											
											$.ajax({
												type:"POST",
												url:"moreRequestApprovedDetailConnections",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#allConnections"),
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
									
								</div>
								<script>
									function add_more_all(link) {
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
											url:"moreRequestDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#allRequest"),
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
								
								<div class="tab_content hide" id="utab_Advertising" style="display: none;">
									
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1">
										<thead class="fsz16" >
											<tr class="white_bg brdb_red_ff2828 ffamily_avenir">
												<!--<th class="pad5 brdb_new nobold  tall" >
													<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
												</th>-->
												<th class="pad5 brdb_red_ff2828 nobold  tall" >
													<a href="https://www.qloudid.com/user/index.php/PersonalRequests/receivedRequests">	<div class="padtb5 black_txt"> Kod / Email</div></a>
												</th>
												
												<th class="pad5 brdb_red_ff2828 nobold hidden-xs tall" >
													<div class="padtb5 black_txt trn" >Skapad</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold  tall" >
													<div class="padtb5 black_txt">Status</div>
												</th>
												
											</tr>
											
										</thead>
										</table>
										<div id="myRequest">
											<?php $i=0;
												
												foreach($requestPendingDetail as $category => $value) 
												{
													
												?> 
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			 
																			<span class="trn fsz14 ffamily_avenir" ><?php if($value['code_type']==1) echo 'Phone'; else if($value['code_type']==2) echo 'Email'; else echo 'Code'; ?></span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir"><?php if($value['code_type']==1) echo '+'.$value['country_code'].''.$value['phone_user']; else if($value['code_type']==2) echo $value['user_email']; else echo $value['user_code']; ?></span>  
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Date">Date</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16"><?php echo date('Y-m-d',strtotime($value['created_on'])); ?></span> </div>
																			 
													<div class="fleft xxs-fright wi_20    marl15 xs-mar0 padb10 hidden-xs"> <span class="trn" data-trn-key="Status">Status</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Pending</span> </div>		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
												 
											<?php } ?>
										</div>
										
									
									<div class="padtb20 talc">
										<a href="#" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width" value="1" onclick="add_more_my(this);" data-trn-key="Visa fler">Visa fler</a>
										
									</div>
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
											url:"moreRequestPendingDetail",
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
								<div class="tab_content hide" id="utab_Analytics" style="display: none;">
									
									<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable1">
										<thead class="fsz16" >
											<tr class="white_bg brdb_red_ff2828 ffamily_avenir">
												
												<th class="wi_30  pad5 brdb_red_ff2828 nobold  tall" >
													<a href="https://www.qloudid.com/user/index.php/PersonalRequests/receivedRequests"><div class="padtb5 black_txt trn" data-trn-key="Namn">Namn</div></a>
												</th>
												
												  
												<th class="pad5 brdb_red_ff2828 nobold hidden-xs tall" >
													<div class="padtb5 black_txt trn" data-trn-key="Läs">Läs</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold  tall" >
													<div class="padtb5 black_txt trn" data-trn-key="Godkänt">Godkänt</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold  tall hidden-xs" >
													<div class="padtb5 black_txt">Avböj</div>
												</th>
											</tr>
											
										</thead>
										</table>
										<div id="myRequestReceived">
											<?php $i=0;
												
												foreach($requestPendingDetailReceived as $category => $value) 
												{
													
												?> 
													<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			 
																			<a href="#" class="show_popup_modal black_txt"  onclick="showUserDetailReceived(<?php echo $value['uid']; ?>,this,'<?php echo $value['enc']; ?>');"><span class="trn fsz14 ffamily_avenir" >Name</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir"><?php echo html_entity_decode($value['name']); ?></span> </a> 
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"><a href="../PublicUserRequest/requestAccount/<?php echo $value['enc']; ?>"> <span class="trn" data-trn-key="Action">Action</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Förfrågan</span> </a></div>
													
													<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xxs-marr20 padb0">
																				<span class="far fa-times-circle  red_txt"></span> 
																			</div>						 
													 <div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="#" class="trn show_popup_modal" data-trn-key="Approve" onclick="submit_value('<?php echo $value['enc']; ?>');" data-target="#gratis_popup_company_searched"><span class="fas fa-check-circle green_txt"></span></a>
													</div>		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
												
												 
											<?php } ?>
										</div>
										
									
									<div class="padtb20 talc">
										<a href="#" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width" value="1" onclick="add_more_my_received(this);" data-trn-key="Visa fler">Visa fler</a>
										
									</div>
									
									<script>
										function add_more_my_received(link) {
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
												url:"moreRequestPendingDetailReceived",
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
									
									<table class="wi_100" cellpadding="0" cellspacing="0" id="Request23">
										<thead class="fsz16" >
											<tr class="white_bg brdb_red_ff2828 ffamily_avenir">
												
												<th class="wi_30 pad5 brdb_red_ff2828 nobold  tall" >
													<div class="padtb5 black_txt">Företag Namn</div>
												</th>
												
												 
												<th class="pad5 brdb_red_ff2828 nobold hidden-xs tall" >
													<div class="padtb5 black_txt trn" data-trn-key="Läs">Läs</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold  tall hidden-xs" >
													<div class="padtb5 black_txt">Godkänt</div>
												</th>
												<th class="pad5 brdb_red_ff2828 nobold  tall hidden-xs" >
													<div class="padtb5 black_txt">Avböj</div>
												</th>
											</tr>
											
										</thead>
										<tbody  id="RequestConnections3">
											<?php $i=0;
												
												foreach($requestPendingDetailConnections as $category => $value) 
												{
													
												?> 
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
								
												
											
											
											<div class="  white_bg    brdb bg_fffbcc_a" style="">
											<div class="container padrl10 padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											<div class="wi_100 xs-wi_100 xs-order_3   fsz12 ffamily_avenir">
																			<div class="fleft wi_40 marl15 xxs-marl15 ">
																			 
																			<span class="trn fsz14 ffamily_avenir" >Company name</span> <span class=" edit-text jain1 dblock   brdclr_lgtgrey2 fsz18 black_txt ffamily_avenir"><?php echo html_entity_decode($value['company_name']); ?></span>  
																			</div>
																			 
															
													
													<div class="fleft wi_20    marl15 xs-mar0 padb10 hidden-xs"><a href="../PublicUserRequest/companyConnection/<?php echo $value['enc']; ?>"> <span class="trn" data-trn-key="Action">Action</span> <span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz16">Förfrågan</span> </a></div>
													<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xxs-marr20 padb0">
																				<a href="rejectRequestConnections/<?php echo $value['enc']; ?>"><span class="far fa-times-circle  red_txt"></span></a>
																			</div>						 
													 <div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="approveRequestConnections/<?php echo $value['enc']; ?>"><span class="fas fa-check-circle green_txt"></span></a>
													</div>		
																		</div>
											
											
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
										 
																			</div>
												
											
								
								</div>
												 
											<?php } ?>
											
										</tbody>
										
									</table>
									<div class="padt20 padb10 talc ">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt ffamily_avenir   trn xxs-brd_width"  value="1" onclick="add_more_pending_connections(this);">Visa fler</a>
									</div>
									<script>
										function add_more_pending_connections(link) {
											
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											
											$.ajax({
												type:"POST",
												url:"moreRequestPendingDetailConnections",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#RequestConnections3"),
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
	 
		<div class="hei_80p"></div>
		
		
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup">
			<div class="modal-content pad25 nobrdb talc brdrad5">
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt">Aktivera din inbjudan</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">Använd koden som du fått via mejl för att aktivera inbjudan. När du fyller i koden så godkänner per automatik att motpart är ansluten till dig.  </span>
						</div>
						
						
					</div>
					
					<div class="padb0">
						
						<div class="pos_rel ">
							
							<input type="text" id="unique_id" name="unique_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Add the code">
						</div>
					</div>
					<div class="mart20">
						<input type="button" value="aktivera" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_unique();">
						<input type="hidden" id="indexing_save_unique" name="indexing_save_unique">
						
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
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad3 panlyellow_bg fsz18 white_txt curp">Prova gratis</button>
					</div>
				</form>
			</div>
		</div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_code">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			<div class="marb20">
				<img src="../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">Verifiera en motpart…</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Be din motpart, privatperson eller företag att legitimera sig innan ett möte eller affär. Välj ur du vill skicka din förfrågan, sms, email eller med Qloud ID kod. </span>
				</div>
				
				
			</div>
			
			<div class="on_clmn padb10">
				
				<div class="pos_rel ">
					
					<select name="reque" id= "reque" class=" wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" onchange="selectCode(this.value);">
						
						<option value="0">--Välj metod--</option>
						<option value="1">Mobile</option>
						<option value="2">Email</option>
						<option value="3">Code</option>
						
						
					</select>
				</div>
			</div>
			<div id="codeSelect" style="display:none">
				<div class="on_clmn padb10">
					
					<div class="pos_rel ">
						
						
						<input type="text" id="code_id" name="code_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter Code">
					</div>
				</div>
			</div>
			<div id="emailSelect" style="display:none">
				<div class="on_clmn padb10">
					
					<div class="pos_rel ">
						
						<input type="text" id="email_id" name="email_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter Email">
					</div>
				</div>
			</div>
			
			<div id="phoneSelect" style="display:none">
				<div class="on_clmn padb10">
					
					<div class="on_clmn ">
						<div class="thr_clmn wi_50">	
							
							
							
							<div class="pos_rel padl0">
								
								
								<select id="cntryph" name="cntryph" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
									<option value="0">--Select country--</option>
									<?php  foreach($resultContry as $category => $value) 
										{
											$category = htmlspecialchars($category); 
											echo '<option value="'. $value['country_name'] .'">'. $value['country_name'] .'</option>';
										}
									?>
								</select>
							</div>
							
						</div>
						<div class="thr_clmn padl10 wi_50">
							
							
							<div class="pos_rel padr0">
								
								
								<input type="number" id="phoneno" name="phoneno" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter phone">
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if($selectCredits>0) { ?>
				<div class="on_clmn mart10 marb20">
					<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchUser();">
					
				</div>
				<?php } else { ?>
				<div class="on_clmn mart10 marb20">
					<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp show_popup_modal" data-target="#gratis_alert" onclick="closeCode();">
					
				</div>
			<?php } ?>
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_alert">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			<div class="marb20">
				<img src="../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">You don't have credit to initiate a connect request.</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Please recharge your account</span>
				</div>
				
				
			</div>
			
			
			
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Add Credits" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp " >
				<input type="button" value="Cancel" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd trans_bg fsz18 black_txt curp close_popup_modal" >
			</div>
			
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_user">
		<div class="modal-content pad25 brd brdrad10">
			<div id="search_user">
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					No result found
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
			</div>
			
		</div>
	</div>
	
	<div class="popup_modal"  id="gratis_popup_user_profile">
		
		<div id="search_user_profile">
			
			
		</div>
		
		
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad10 brd" id="gratis_popup_company_search">
		<div class="modal-content pad25 brd brdrad10">
			<div id="search_new">
				<h3 class="pos_rel marb10 pad0 padr40 bold fsz25 dark_grey_txt">
					Search Company
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				<div class="marb15 "  >
					<label for="new-organization-name" class="sr-only">Company Identification Number</label>
					<input type="text" id="cid_number" name="cid_number" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Identification Number">
				</div>
				
				
				
				<div class="mart30 talc">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14  curp white_txt brdrad5" onclick="searchCompany();" />
					
				</div>
				
			</div>
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_company_searched" id="gratis_popup_company_searched">
		<div class="modal-content pad25   talc brdrad5 ">
			
			<div id="searched">
				
				
			</div>
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company brdrad10 brd" id="gratis_popup_company">
		<div class="modal-content pad25 brd brdrad10 ">
			<h3 class="pos_rel marb25 pad0 padr40 bold fsz25 dark_grey_txt">
				Add Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Company Name</label>
					<input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Name">
				</div>
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Website</label>
					<input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Website">
				</div>
				
				<div class="marb10 padt10"  >
					<label for="new-organization-name" class="sr-only">Company Email</label>
					<input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Email">
				</div>
				
				<div class="marb10 padt10">
					<label for="new-organization-under" class="txt_0">Industry</label>
					<select name="inds" id= "inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica lgtgrey2_bg" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultIndus as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				<div class="marb10 padt10">
					<label for="new-organization-under" class="txt_0">Country</label>
					<select name="cntry" id= "cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica lgtgrey2_bg" >
						
						<option value="0">--Select--</option>
						<?php  foreach($resultContry as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
							}
						?>
					</select>
				</div>
				
				
				<div class="mart30 talc">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp padr10 brd brdrad5" onclick="validateAddCompany();" />
					<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				</div>
			</form>
		</div>
	</div>
	
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 brdrad10" id="sales_popup">
		<div class="modal-content pad25 brd brdrad10 ">
			
			<h3 class="pos_rel marb10 pad0 padr40 bold  fsz25 dark_grey_txt">Add Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			
			<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
			</div>
			
			<div class="minwi_100 dflex fxwrap_w alit_s marrl-10 marb10 mart20" id="sales_popup_boxes">
				<div class="minwi_100 dtrow brdrad5 ">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c1">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt" onclick="changeBg('c1');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				<div class="minwi_100 dtrow brdrad5 mart10">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c2">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c2');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				<div class="minwi_100 dtrow brdrad5 mart10">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c3">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c3');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				<div class="minwi_100 dtrow brdrad5 mart10">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c4">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c4');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				<div class="minwi_100 dtrow brdrad5 mart10">
					<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 lgtgrey2_bg marrl10" id="c5">
						
						<a href="#" class="wi_100 dblock red_bg_a lgn_hight_40 talc dark_grey_txt " onclick="changeBg('c5');">
							<span class="dnone_pa">Start subscribe</span>
							<span class="dnone dblock_pa">Unsubscribe</span>
						</a>
					</div>
				</div>
				
				
			</div>
			<script>
				function changeBg(id)
				{
					if($("#"+id).hasClass('lgtgrey2_bg'))
					{
						$("#"+id).removeClass('lgtgrey2_bg');
						$("#"+id).addClass('yellow_bg');
					}
					else
					{
						$("#"+id).addClass('lgtgrey2_bg');
						$("#"+id).removeClass('yellow_bg');
					}
				}
				
				
				/*$(document).ready(function(){
					$('#sales_popup_boxes a').on('click', function(){
					if($(this).hasClass("active"))
					{
					var id_val=$("#indexing_save").val();
					var id_val = id_val.replace($(this).attr('id')+',', "");
					$("#indexing_save").val(id_val);
					}
					else
					{
					var id_val=$("#indexing_save").val()+$(this).attr('id')+',';
					$("#indexing_save").val(id_val);
					}
					$(this).toggleClass('active');
					
					return false;
					})
				});*/
			</script>
			<div class="mart30 talc">
				<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
				<input type="button" value="Submit" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp padr10 brd brdrad5"  />
				
			</div>
			
		</div>
	</div>
	
	
	<!-- New client modal -->
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	<div class="crm-popup profile-popup wi_360p xxx-wi_100 maxwi_90 xxs-maxwi_100 hei_100vh-70p xxs-hei_100vh ovfl_auto dnone pos_fix zi99 top50p xxs-top0 right30 bs_bb bxsh_0220_01 xxs-bxsh_none brdradtl5 xxs-brdrad0 bg_f2 lgn_hight_s14 fsz13 xxs-fsz16 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph opbxsh_0004_6f_sibc">
		<a href="#" class="popup-close dblock xxs-dnone pos_abs top0 right0 padrl10 brdrad3 bg_f80 lgn_hight_40 bold txt_f">Close</a>
		<div class="popup-content"></div>
	</div>
	
	<script>
		// A list of countries to use in country select countrols
		var countries_list = '<option value="" disabled="disabled">Choose your country</option> <option value="AF">Afghanistan</option> <option value="AL">Albania</option> <option value="DZ">Algeria</option> <option value="AS">American Samoa</option> <option value="AD">Andorra</option> <option value="AO">Angola</option> <option value="AI">Anguilla</option> <option value="AQ">Antarctica</option> <option value="AG">Antigua and Barbuda</option> <option value="AR">Argentina</option> <option value="AM">Armenia</option> <option value="AW">Aruba</option> <option value="AU">Australia</option> <option value="AT">Austria</option> <option value="AZ">Azerbaijani Republic</option> <option value="BS">Bahamas</option> <option value="BH">Bahrain</option> <option value="BD">Bangladesh</option> <option value="BB">Barbados</option> <option value="BY">Belarus</option> <option value="BE">Belgium</option> <option value="BZ">Belize</option> <option value="BJ">Benin</option> <option value="BM">Bermuda</option> <option value="BT">Bhutan</option> <option value="BO">Bolivia</option> <option value="BA">Bosnia and Herzegovina</option> <option value="BW">Botswana</option> <option value="BR">Brazil</option> <option value="VG">British Virgin Islands</option> <option value="BN">Brunei Darussalam</option> <option value="BG">Bulgaria</option> <option value="BF">Burkina Faso</option> <option value="BI">Burundi</option> <option value="MP">CNMI</option> <option value="KH">Cambodia</option> <option value="CM">Cameroon</option> <option value="CA">Canada</option> <option value="CV">Cape Verde</option> <option value="BQ">Caribbean Netherlands</option> <option value="KY">Cayman Islands</option> <option value="CF">Central African Republic</option> <option value="TD">Chad</option> <option value="CL">Chile</option> <option value="CN">China</option> <option value="CO">Colombia</option> <option value="KM">Comoros</option> <option value="CG">Congo</option> <option value="CK">Cook Islands</option> <option value="CR">Costa Rica</option> <option value="CI">Cote d&#39;Ivoire</option> <option value="HR">Croatia</option> <option value="CU">Cuba</option> <option value="CY">Cyprus</option> <option value="CZ">Czech Republic</option> <option value="CD">Democratic Republic of the Congo</option> <option value="DK">Denmark</option> <option value="DJ">Djibouti</option> <option value="DM">Dominica</option> <option value="DO">Dominican Republic</option> <option value="EC">Ecuador</option> <option value="EG">Egypt</option> <option value="SV">El Salvador</option> <option value="GQ">Equatorial Guinea</option> <option value="ER">Eritrea</option> <option value="EE">Estonia</option> <option value="ET">Ethiopia</option> <option value="FK">Falkland Islands</option> <option value="FO">Faroe Islands</option> <option value="FJ">Fiji</option> <option value="FI">Finland</option> <option value="FR">France</option> <option value="GF">French Guiana</option> <option value="PF">French Polynesia</option> <option value="GA">Gabonese Republic</option> <option value="GM">Gambia</option> <option value="GE">Georgia</option> <option value="DE">Germany</option> <option value="GH">Ghana</option> <option value="GI">Gibraltar</option> <option value="GR">Greece</option> <option value="GL">Greenland</option> <option value="GD">Grenada</option> <option value="GP">Guadeloupe</option> <option value="GU">Guam</option> <option value="GT">Guatemala</option> <option value="GN">Guinea</option> <option value="GW">Guinea-Bissau</option> <option value="GY">Guyana</option> <option value="HT">Haiti</option> <option value="HN">Honduras</option> <option value="HK">Hongkong, China</option> <option value="HU">Hungary</option> <option value="IS">Iceland</option> <option value="IN">India</option> <option value="ID">Indonesia</option> <option value="IR">Iran</option> <option value="IQ">Iraq</option> <option value="IE">Ireland</option> <option value="IL">Israel</option> <option value="IT">Italy</option> <option value="JM">Jamaica</option> <option value="JP">Japan</option> <option value="JO">Jordan</option> <option value="KZ">Kazakhstan</option> <option value="KE">Kenya</option> <option value="KI">Kiribati</option> <option value="KP">Korea (Democratic People&#39;s Republic of)</option> <option value="KR">Korea (Republic of)</option> <option value="KW">Kuwait</option> <option value="KG">Kyrgyzstan</option> <option value="LA">Laos</option> <option value="LV">Latvia</option> <option value="LB">Lebanon</option> <option value="LS">Lesotho</option> <option value="LR">Liberia</option> <option value="LY">Libya</option> <option value="LI">Liechtenstein</option> <option value="LT">Lithuania</option> <option value="LU">Luxembourg</option> <option value="MO">Macao, China</option> <option value="MK">Macedonia</option> <option value="MG">Madagascar</option> <option value="MW">Malawi</option> <option value="MY">Malaysia</option> <option value="MV">Maldives</option> <option value="ML">Mali</option> <option value="MT">Malta</option> <option value="MH">Marshall Islands</option> <option value="MQ">Martinique</option> <option value="MR">Mauritania</option> <option value="MU">Mauritius</option> <option value="YT">Mayotte</option> <option value="MX">Mexico</option> <option value="FM">Micronesia</option> <option value="MD">Moldova</option> <option value="MC">Monaco</option> <option value="MN">Mongolia</option> <option value="ME">Montenegro</option> <option value="MS">Montserrat</option> <option value="MA">Morocco</option> <option value="MZ">Mozambique</option> <option value="MM">Myanmar</option> <option value="NA">Namibia</option> <option value="NR">Nauru</option> <option value="NP">Nepal</option> <option value="NL">Netherlands</option> <option value="AN">Netherlands Antilles</option> <option value="NC">New Caledonia</option> <option value="NZ">New Zealand</option> <option value="NI">Nicaragua</option> <option value="NE">Niger</option> <option value="NG">Nigeria</option> <option value="NU">Niue</option> <option value="NO">Norway</option> <option value="OM">Oman</option> <option value="PK">Pakistan</option> <option value="PW">Palau</option> <option value="PS">Palestine</option> <option value="PA">Panama</option> <option value="PG">Papua New Guinea</option> <option value="PY">Paraguay</option> <option value="PE">Peru</option> <option value="PH">Philippines</option> <option value="PL">Poland</option> <option value="PT">Portugal</option> <option value="PR">Puerto Rico</option> <option value="QA">Qatar</option> <option value="RE">Reunion</option> <option value="RO">Romania</option> <option value="RU">Russia</option> <option value="RW">Rwanda</option> <option value="SH">Saint Helena</option> <option value="KN">Saint Kitts and Nevis</option> <option value="LC">Saint Lucia</option> <option value="PM">Saint Pierre and Miquelon</option> <option value="VC">Saint Vincent and the Grenadines</option> <option value="WS">Samoa</option> <option value="SM">San Marino</option> <option value="ST">Sao Tome and Principe</option> <option value="SA">Saudi Arabia</option> <option value="SN">Senegal</option> <option value="RS">Serbia</option> <option value="SC">Seychelles</option> <option value="SL">Sierra Leone</option> <option value="SG">Singapore</option> <option value="SX">Sint Marteen</option> <option value="SK">Slovakia</option> <option value="SI">Slovenia</option> <option value="SB">Solomon Islands</option> <option value="SO">Somalia</option> <option value="ZA">South Africa</option> <option value="SS">South Sudan</option> <option value="ES">Spain</option> <option value="LK">Sri Lanka</option> <option value="SD">Sudan</option> <option value="SR">Suriname</option> <option value="SZ">Swaziland</option> <option value="SE">Sweden</option> <option value="CH">Switzerland</option> <option value="SY">Syria</option> <option value="TW">Taiwan</option> <option value="TJ">Tajikistan</option> <option value="TZ">Tanzania</option> <option value="TH">Thailand</option> <option value="TL">Timor-Leste</option> <option value="TG">Togo</option> <option value="TK">Tokelau</option> <option value="TO">Tonga</option> <option value="TT">Trinidad and Tobago</option> <option value="TN">Tunisia</option> <option value="TR">Turkey</option> <option value="TM">Turkmenistan</option> <option value="TC">Turks &amp; Caicos</option> <option value="TV">Tuvalu</option> <option value="AE">UAE</option> <option value="VI">US Virgin Islands</option> <option value="UG">Uganda</option> <option value="UA">Ukraine</option> <option value="GB">United Kingdom</option> <option value="US">United States</option> <option value="UY">Uruguay</option> <option value="UZ">Uzbekistan</option> <option value="VU">Vanuatu</option> <option value="VA">Vatican</option> <option value="VE">Venezuela</option> <option value="VN">Vietnam</option> <option value="WF">Wallis and Futuna</option> <option value="YE">Yemen</option> <option value="ZM">Zambia</option> <option value="ZW">Zimbabwe</option>';
		
		$(document).ready(function () {
			var $window = $(window),
			$body = $(document.body),
			$company_popup = $('.company-popup'),
			$company_popup_content = $company_popup.find('.popup-content'),
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
						html += '<a href="#' + tab.id + '" class="expander-toggler' + ((tab.state && tab.state === 'active') ? ' target_shown' : '')  + '"><span class="dnone_pa fa fa-chevron-down"></span><span class="dnone diblock_pa fa fa-chevron-up"></span> ' + tab.label + '</a>';
						if(tab.postfix){
							html += tab.postfix;
						}
						html += '</div>';
						html += '<div id="' + tab.id + '" class="' + ((tab.state && tab.state === 'active') ? '' : 'dnone ')  + 'padt15"><div class="wi_100 dflex fxwrap_w">';
						
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
										html += '<select name="' + field.name + '" class="default wi_100 hei_30p bs_bb pad5 brd fsz13">';
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
										html += '<input type="' + field.type + '" name="' + field.name + '" placeholder="' + (field.placeholder ? field.placeholder : '') + '" value="' + (field.value ? field.value : '') + '" class="wi_100 hei_30p bs_bb pad5 brd fsz13" />';
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
								html += '<thead class="fsz11"><tr>';
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
				
				$container
				.removeClass('active')
				.html(html);
			}
			
			
			$body.on('click', '.get-company-info', function () {
				var $this = $(this);
				$(".yellow_bg").removeClass('yellow_bg');
				$this.closest('tr').addClass('yellow_bg');
				$profile_popup_content.addClass('active');
				
				$.ajax({
					url: 'profileInfo',
					type: 'POST',
					dataType: 'json',
					data: {
						'id': $this.data('id'),
					},
				})
				.done(function(data){
					
					// Success
					if(data.status == 'ok'){
						populate_profile(data.message, $profile_popup_content);
					}
					
					// Error
					else{
						$profile_popup_content.html('<p class="pad20 red_txt">' + data.message + '</p>');
					}
				})
				.fail(function(){
					$profile_popup_content.html('<p class="pad20 red_txt">An error occured! Please try again later.</p>');
				})
				.always(function(){
					$profile_popup_content.removeClass('active');
				});
				
				if (!$profile_popup.hasClass('active')) {
					show_crm_popup($profile_popup);
				}
				return false;
			});
			
			
			// Populate popup with company info
			var populate_profile = function(data, $container){
				var html = '<div><h2 class="xxs-dnone mar0 padrl20 padtb10 lgn_hight_20 fsz18 black_txt yellownew2_bg">Valid 24 hours</h2>';
				html += '<div class="padb80 xxs-pad0 xxs-padb80" style="background-color:#fdfdfd;">';
				
				// Top info
				html += '<div class="xxs-mar0 padtrl20 xxs-pad0  xxs-bxsh_none yellownew"><div class="dflex xxs-fxdir_col xxs-bxsh_016_577376_035">';
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
					html += '<div class="xxs-wi_100 fxshrink_0 pos_rel xxs-mart-50 padr15 xxs-pad0 xxs-marb5"><img src="' + data.user.avatar + '" width="100" height="100" class="dblock marrla xxs-brd xxs-brdwi_5 xxs-brdclr_f brdrad5" title="' + data.user.name + '" alt="' + data.user.name + '"></div>';
				}
				
				html += '<div class="flex_1 xxs-dflex xxs-fxdir_col xxs-padrl20 xxs-talc">';
				html += '<div class="dflex xxs-dblock xxs-order_1 alit_fs justc_sb padb0 xxs-pad0"><h3 class="mar0 marb10 xxs-mar0 pad0 bold fsz22 black_txt">' + data.user.name + '</h3>';
				if(data.user.rate){
					html += '<div class="xxs-dnone marb10 fsz22">' + data.user.rate.amount + ' /' + data.user.rate.period + '</div>';
				}
				html += '</div>';
				
				if(data.user.description){
					html += '<div class="xxs-order_3 marb10 xxs-marb5 lgn_hight_24 xxs-bold fsz15 xxs-fsz26 black_txt">' + data.user.description + '</div>';
				}
				if(data.user.rising_talent){
					html += '<div class="dnone xxs-dblock xxs-order_4 marb15 uppercase txt_14bff5"><span class="fa fa-star"></span> ' + data.user.rising_talent + '</div>';
				}
				if(data.user.rate){
					html += '<div class="dnone xxs-dblock xxs-order_5 txt_8e"><span class="bold fsz26 txt_37a000">' +data.user.rate.amount + '</span> /' + data.user.rate.period + '</div>';
				}
				if(data.user.location || data.user.time){
					html += '<div class="xxs-order_2 marb10 xxs-marb15 xxs-fsz18 xxs-txt_8e black_txt">';
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
					
					/*if(overview){
						html += '<div class="xxs-dnone mart10 padt20 brdt"><h3 class="mar0 marb20 pad0 bold fsz18">' + overview.label + '</h3>';
						if(overview.content){
						if(overview.content.html){
						html += overview.content.html;
						}
						if(overview.content.more){
						html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold txt_37a000" data-toggle-id="base"><span class="dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
						}
						}
						html += '</div>';
					}*/
				}
				
				html += '</div>';
				
				
				// Sections
				if(data.sections){
					for(var s = 0, sL = data.sections.length; s < sL; s++){
						var section = data.sections[s];
						html += '<div class=" xxs-mart15 xxs-marrl10  bg_f' + (section.class ? ' ' + section.class : '') + '">';
						html += '<h3 class="martrl20 xxs-padt10 xxs-padb15 brdb_new xxs-nobrd xxs-talc bold xxs-fntwei_n fsz16 xxs-txt_8e padt10">' + section.label + '</h3>';
						
						// - section content
						if(section.content){
							html += '<div class="padtb10 padrl20 xxs-pad15 xxs-padt0 fsz14">';
							
							if(section.content.html){
								html += section.content.html;
							}
							
							if(section.content.more){
								if(s==0 || s==2)
								{
									html += '';
								}
								else if(s==1)
								{
									html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock nobold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">View map</span><span class="dnone dblock_pa">less</span></a></div>';
								}
								else
								{
									html += '<div class="base"><div class="toggle_content dnone">' + overview.content.more + '</div><a href="#" class="toggle-btn dblock bold blue_txt" data-toggle-id="base"><span class="padt5 dblock dnone_pa">more</span><span class="dnone dblock_pa">less</span></a></div>';
								}
								
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
								html += '<div class="career_year_exp pos_rel marb0  xs-brdb">';
								
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
				
				html += '</div><div class="wi_350p xxs-wi_100vw maxwi_90 xxs-maxwi_100vw pos_fix bot0 right30 bs_bb pad10 bg_f"><div class="dflex talc bold"><div class="wi_50 padrl30 lgtgrey_bg"><a href="#" class="wi_100 hei_40p dblock brdrad3 lgn_hight_40 txt_37a000">Message</a></div><div class="wi_50 padrl30"><a href="#" class="wi_100 hei_40p dblock brdrad3 bg_37a000 lgn_hight_40 txt_f">Apply</a></div></div></div></div>';
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
			$body.on('click', '#new-business-btn a', function () {
				var $this = $(this);
				if ($window.width() > 991) {
					close_crm_popup($employee_popup);
					$company_popup_content.addClass('active');
					
					$.ajax({
						url: 'new_company_info.php',
						type: 'POST',
						dataType: 'json',
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
				$('.yellow_bg').removeClass('yellow_bg');
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
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_request.js"></script>-->
</body>

</html>