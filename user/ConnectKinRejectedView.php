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
		 
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			
			var currentLang = 'sv';
			function closePop (){
				
				$('.yellow_bg').removeClass('yellow_bg');
				
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
					url:"profileInfo",
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
				/*if($("#reque").val()!=3 || $("#reque").val()!=2)
					{
					alert("Please select code!!!");
					return false;
				}*/
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
							url:"searchUserDetailCode",
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
									
									window.location.href ="https://www.safeqloud.com/user/index.php/ConnectKin/connectAccount";
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
							url:"searchUserDetailCode",
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
									
									window.location.href ="https://www.safeqloud.com/user/index.php/ConnectKin/connectAccount";
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
							url:"searchUserDetailCode",
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
									
									window.location.href ="https://www.safeqloud.com/user/index.php/ConnectKin/connectAccount";
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
			
			
			
			
			
			
			
			
			
			
			function submit_form_email()
			{
				
				$("#save_email_connect").submit();
			}
			
			
			
			function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					alert('Please provide a valid email address');
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}
			
			function submit_email()
			{
				
				if($("#search_email").val()=="")
				{
					alert("please enter email !!!");
					return false;
				}
				
				if(!checkEmail("search_email"))
				{
					alert("please enter correct email format");
					return false;
				}
				
				
				var send_data={};
				
				send_data.cemail=$("#search_email").val();
				send_data.cmsg=$("#connect_message").val();
				$.ajax({
					type:"POST",
					url:"searchUserDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); //return false;
						$("#gratis_popup_connect").removeClass('active');
						document.getElementById("gratis_popup_connect").style.display='none';
						document.getElementById("gratis_popup_connect_email").style.display='none';
						document.getElementById("gratis_popup_user_searched").style.display='block';
						$(".gratis_popup_user_searched").addClass('active');
						$("#searched_user").html('');
						$("#searched_user").html(data1);
						
					}
				});
				
			}
			
			function submit_phone()
			{
				
				if($("#search_phone").val()=="")
				{
					alert("please enter phone !!!");
					return false;
				}
				
				
				document.getElementById("gratis_popup_connect").style.display='none';
				document.getElementById("gratis_popup_connect_phone").style.display='none';
				
				var send_data={};
				send_data.cid=$("#cntry").val();
				send_data.cphone=$("#search_phone").val();
				send_data.cmsg=$("#connect_message1").val();
				send_data.fname=$("#f_name").val();
				send_data.lname=$("#l_name").val();
				$.ajax({
					type:"POST",
					url:"searchUserDetailPhone",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); //return false;
						$("#gratis_popup_connect").removeClass('active');
						
						document.getElementById("gratis_popup_user_searched").style.display='block';
						$(".gratis_popup_user_searched").addClass('active');
						$("#searched_user").html('');
						$("#searched_user").html(data1);
						
					}
				});
				
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
                        <a href="contactAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs" id="headerData">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="contactAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="kinInfo" class=" diblock padl7 padr7 brdrad3 fsz30 seggreen_47E2A1_txt"><i class="fas fa-plus " aria-hidden="true"></i></a> </div>
                <div class="clear"></div>

            </div>
        </div>	
			<div class="clear" id=""></div>
	
		
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			  <div class="column_m container zi5  mart40 xs-mart0" onclick="checkFlag();" id="loginBank">
                <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0  ">
					<div class="wi_240p fleft pos_rel zi50 hidden">
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
																	
																	
																	
																	<span class="fa-stack   bgclr_pink_ff5bad white_txt">
																				 <i class="" aria-hidden="true"></i>
																				  <i class="fab fa-affiliatetheme padl5" aria-hidden="true"></i>
																				</span>
																	
																	<a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
																<!-- Meta -->
																<div class="padt20 fsz30"> <span>Noffa</span>  </div>
															</a>																	
																	</div> 																</div>
													</div>		
													<div class="clear"></div>
												</div>
											</div>

	
									
									
									
									<ul class="marr20 pad0">
									<li class=" dblock padr10  padl8">
											<a href="https://www.safeqloud.com/public/index.php/NotifyFamilyFriends" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" >
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Connect</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										 
									</ul>
									
									
									<ul class="dblock marr20  padl10 fsz16">
										
										<li class="dblock padrb10">
	<a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb_blue brdclr_pink_ff5bad black_txt  padb10"> <span class="valm trn" style="letter-spacing: 2px;">Anhöriga</span> 
	<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
										 
							<li class="dblock padrb10 padt5">
	<a href="noffRelatives" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn" style="letter-spacing: 2px;">Relatives</span> 
	<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>			
										 
										
										
										
										
										
									
										
										
									</ul>
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
				
					<!-- Center content -->
					 <div class="wi_720p maxwi_100 pos_rel zi5 marrla pad10  xs-pad0">
						
						<div class="padb20 xxs-padb0 ">
							<!-- Charts -->
							
							 <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 bg_ffde00  " onclick="checkFlag();">
	
	<div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 bg_ffde00  brdb_new tall xs-nobrdb">
	
	<div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  ">
								<div class="padb40 talc fsz45"><i class="fas fa-trash-alt black_txt"></i></div>
			<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 black_txt trn ffamily_avenir">Rejected</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Rejected request.</a></div>
									</div>
	
	</div>
	
	</div>
             <div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  " >
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
                           <div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
                              <div class="martb15  xxs-talc talc ffamily_avenir"> <a href="kinInfo" class="black_txt fsz18 xs-fsz16  xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Add emergency contacts</a></div>
                           </div>
                        </div>
                     </div>  
								 
							 
							
								 <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt   mart20">
                                <div class="container ">
                                    <div class="">

                                        <div class="tab-header mart10 padb10  brdb_ffde00 talc">
                                             <a href="connectAccount" class="dinlblck mar5 padrl30_a padrl10   brdclr_pink_ff5bad_a brdrad40 bgclr_pink_ff5bad_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah "  >Active</a>
                                            <a href="receivedAccount" class="dinlblck mar5 padrl30_a padrl10   brdclr_pink_ff5bad_a brdrad40 bgclr_pink_ff5bad_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah"  >Request</a>
                                            <a href="sentAccount" class="dinlblck mar5 padrl30_a padrl10   brdclr_pink_ff5bad_a brdrad40 bgclr_pink_ff5bad_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah">Sent</a>
                                            <a href="#" class="padrl30_a padrl10 fsz18 red_ff2828_txt lgn_hight_36 active" data-id="utab_AB_Testing"><i class="fas fa-trash-alt"></i></a>

                                        </div>

                               
							
							 
							<div class="tab_container mart10">

                                            <!-- Popular -->
                                           <div class="tab_content active" id="utab_AB_Testing" style="display: block;">
									
									
									 
										
										 
										<div id="myRequest3">
											<?php $i=0;
												
												foreach($requestRejectedDetail as $category => $value) 
												{
													
													
												?> 
												 		
												<div class=" white_bg   brdb" style="">
										<div class="container  padb20 padt15    brdrad1 fsz18 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10"> 
																	
																	<div class="wi_20p   hei_50p xs-hei_45p "><img src="../../<?php echo $value['image']; ?>" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></div>
													
											<div class="fleft wi_50     "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir"><?php if($value['receiver_id']==$data['user_id']) echo 'Received request'; else echo 'Sent request'; ?></span>
											<span class="trn fsz18  black_txt ffamily_avenir  "><?php echo $value['name']; ?></span>  </div>
													
													 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div> 
												 
											<?php } ?>
										</div>
										
									</table>
									<div class="clear"></div>
									<div class="padt20 padb10 talc ">
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width" value="1" onclick="add_more_rejected(this);">View more</a>
										
									</div>
									<script>
										function add_more_rejected(link) {
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
												url:"moreRejectedRequestDetail",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#myRequest3"),
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
							
							<div class="clear"></div>
						</div>
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		</div>
		<div class="clear"></div>
		 
		<div class="hei_80p"></div>
		</div>
		
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
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
		
		
		<!-- Marketing popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
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
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_code">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			<div class="marb20">
				<img src="../../../../html//usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
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
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchUser();">
				
			</div>
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_connect">
		<div class="modal-content pad25 brd nobrdb talc brdrad5">
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Lägg till en anhörig</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Skicka en inbjudan till dina nära och kära om att ansluta sig till ditt Qloud ID konto. </span>
				</div>
				
				
			</div>
			<div class="mart20">
				<input type="button" value="Phone" class="show_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" data-target="#gratis_popup_connect_phone">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Email" class="show_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" data-target="#gratis_popup_connect_email">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5 gratis_popup_connect_phone" id="gratis_popup_connect_phone">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			<div class="marb20">
				<img src="../../../../html//omworkplace/images/random/undraw_gradma_wanr.png" class="wi_75 maxwi_100 hei_auto">
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">Lägg till en anhörig</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Skicka en inbjudan till dina nära och kära om att ansluta sig till ditt Qloud ID konto. </span>
				</div>
				
				
			</div>
			<div class="on_clmn padb10">
				
				<div class="on_clmn ">
					<div class="thr_clmn wi_50">	
						
						
						
						<div class="pos_rel padl0">
							
							<select name="cntry" id= "cntry" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
								
								
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
							
							<input type="number" id="search_phone" name="search_phone" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Phone number">
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="on_clmn padb10">
				
				<div class="on_clmn ">
					<div class="thr_clmn wi_50">	
						
						
						
						<div class="pos_rel padl0">
							
							<input type="text" id="f_name" name="f_name"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="First Name">
							
						</div>
					</div>
					<div class="thr_clmn padl10 wi_50">
						
						
						<div class="pos_rel padr0">
							
							<input type="text" id="l_name" name="l_name"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Last Name">
							
						</div>
					</div>
				</div>
			</div>
			<div class="on_clmn padb15 hidden">
				
				<div class="pos_rel padrl0">
					
					<textarea id="connect_message1" name="connect_message1" class="wi_100 default_view  rbrdr pad10 mart5 hei_100p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Message"></textarea>
				</div>
			</div>
			
			
			
			<div class="on_clmn marb20">
				<input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_phone();" />
				<input type="hidden" name="indexing_save_phone" id="indexing_save_phone" />
				
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
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5 gratis_popup_connect_email" id="gratis_popup_connect_email">
		<div class="modal-content pad25 brd nobrdb talc brdrad5">
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Lägg till en anhörig</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Skicka en inbjudan till dina nära och kära om att ansluta sig till ditt Qloud ID konto. </span>
				</div>
				
				
			</div>
			
			
			<div class="padb10 ">
				
				<div class="pos_rel padrl0">
					
					<input type="text" id="search_email" name="search_email"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Email">
				</div>
			</div>
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					<textarea id="connect_message" name="connect_message" class="wi_100 default_view  rbrdr pad10 mart5 hei_100p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Message"></textarea>
				</div>
			</div>
			
			
			
			<div class="mart20">
				<input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_email();" />
				<input type="hidden" name="indexing_save_email" id="indexing_save_email" />
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_user_searched" id="gratis_popup_user_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_user">
				
				
			</div>
			
		</div>
	</div>
	
	<div class="popup_modal"  id="gratis_popup_user_profile">
		
		<div id="search_user_profile">
			
			
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
	
	<script>
		
		/*function searchCompany()
			{
			var send_data={};
			
			send_data.id=$("#cid_number").val();
			$.ajax({
			type:"POST",
			url:"searchCompanyDetail",
			data:send_data,
			dataType:"text",
			contentType: "application/x-www-form-urlencoded;charset=utf-8",
			success: function(data1){
			//alert(data1); return false;
			
			document.getElementById("gratis_popup_company_search").style.display='none';
			document.getElementById("gratis_popup_company_searched").style.display='block';
			$(".gratis_popup_company_searched").addClass('active');
			$("#searched").html('');
			$("#searched").append(data1);
			
			}
			});
			
		}*/
		
		
		
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
	
</body>

</html>