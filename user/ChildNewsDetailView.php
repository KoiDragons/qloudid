﻿<!doctype html>
<html>
	<?php
		function base64_to_jpegpp($base64_string, $output_file) {
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
		
		if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_p=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_p=str_replace('"','',$value_p); $value_p = base64_to_jpegpp( $value_p, '../estorecss/tmp'.$row_summary['passport_image'].'.jpg' ); } else { $value_p="../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_p="../html/usercontent/images/default-profile-pic.jpg";
		
		if($childrenDetail ['child_image_path']!=null) { $filename="../estorecss/".$childrenDetail ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$childrenDetail ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $value_a = base64_to_jpegpp( $value_a, '../estorecss/tmp'.$childrenDetail['child_image_path'].'.jpg' ); } else { $value_a="../html/usercontent/images/person-male.png"; } }  else $value_a="../html/usercontent/images/person-male.png";
		
		
		
		$path1 = $path."html/usercontent/images/";
	?>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
			
			function checkPost()
			{
				$('#error_msg_form').html('');
				if($('#post_title').val()=="" || $('#post_title').val()==null)
				{
					$('#popup_fade').addClass('active');
					$('#person_informed').addClass('active');
					$('#popup_fade').attr('style','display:block');
					$('#person_informed').attr('style','display:block');
					$('#error_msg_form').html('please enter comment.');
					return false;
				}
				else
				{
				document.getElementById('post_comment').submit();
				}
			}
			
				function checkPostm()
			{
				$('#error_msg_form').html('');
				if($('#post_titlem').val()=="" || $('#post_titlem').val()==null)
				{
					$('#popup_fade').addClass('active');
					$('#person_informed').addClass('active');
					$('#popup_fade').attr('style','display:block');
					$('#person_informed').attr('style','display:block');
					$('#error_msg_form').html('please enter comment.');
					return false;
				}
				else
				{
				document.getElementById('post_comment').submit();
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

			function sendRequest(){
				var send_data={};
				send_data.id=0;
				send_data.img_path='<?php echo $value_p; ?>';
				$.ajax({
															type:"POST",
															url:"../moreInformationChild/<?php echo $data['parent_id']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															setTimeout(function(){
															sendRequest(); //this will send request again and again;
														}, 25000);
															var $tbody = $("#discussions"),
															html=html1;

															$tbody
															.html($(html))
															.find('input.init')
															.iCheck({
															checkboxClass: 'icheckbox_minimal-aero',
															radioClass: 'iradio_minimal-aero',
															increaseArea: '20%'
															});
															}
															});
   
	}
	
	
	function updateComment(id)
			{
				var comment_count=$.trim($('[name="user_comment'+id+'"]').val()).split(' ').filter(function(v){return v!==''}).length;
				if(comment_count==0)
				{
				$('#popup_fade').addClass('active');
				$('#person_informed').addClass('active');
				$('#popup_fade').attr('style','display:block');
				$('#person_informed').attr('style','display:block');
				$('#error_msg_form').html('please post a comment.');
				return false;
				}
				else 
				{
					document.getElementById("reply_comment"+id).submit();
				}
			}

sendRequest();

</script>

	</head>
	
	<body class="white_bg   ffamily_avenir">
		
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
		<div class="column_m header hei_55p  bs_bb bg_ececec visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 bg_ececec"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/user/index.php/DayCareRequest/daycareWelcome/<?php echo $data['parent_id']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true" style="color:#b5c2c9;"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				 <div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz16  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz25" onclick="openPopup();"><span class="fas fa-list " aria-hidden="true" style="color:#b5c2c9;"></span></a>
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
									<li class="first"><a href="javascript:void(0);" class="fsz16i" ><span class="fas fa-gift padr15" aria-hidden="true"> </span>Newsfeed</a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				  
										
                  <li><a href="../childAttendenceHistory/<?php echo $data['parent_id']; ?>" class="fsz16i" ><span class="fas fa-list-ol padr15" aria-hidden="true"> </span> Presence</a></li>
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
		
		
		
		<div class="column_m pos_rel " onclick="checkFlag();">
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5 mart40 xs-mart0" onclick="checkFlag();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0 xs-padrl0">
				
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
											
												<li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb tb_67cff7_bg brd_width_2 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Newsfeed</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
							  
							  	<li class="dblock padrb10 padt5">
                                 <a href="../childAttendenceHistory/<?php echo $data['parent_id']; ?>" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt">
                                    <span class="valm trn" style="letter-spacing: 2px;">Presence</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
							  <li class="dblock padrb10 ">
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
											
											
		<div class="right_container  xxxs-wi_100  ">
						
						<!-- News -->
					<div class="column_m scroll_menu_header wi_480p  xxxs-wi_100 maxwi_100 brdrad3" data-text=" " data-header="#header-newsfeed" data-li-params="class|dblock padb5" data-params="class|dblock padb3 brdb_new brdclr_trans brdclr_white_a lgtgrey2_bg_a dark_grey_txt blue3_txt_a" id="scroll_menu_header0">
							<div class="brdrad5">
							<div class="wi_500p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla    t_67cff7_bg  ">
						<div class="padtb0 brdrad3 ">
						
							<div class="padb10  talc padt20">
										<div class="padrl0 ">
											<img src="../../../<?php echo $value_a; ?>" width="100" height="100" class="white_brd borderr">
											
										</div>
									</div>

						 
<h1 class="lgn_hight_36 padt10 padb20 xs-padb10 talc fsz35 white_txt"><?php echo $childrenDetail['name']; ?></h1>
						
						 


 				</div>
						
						<div class="tab-header mart10 padb10 xs-talc   nobrdt nobrdl nobrdr talc visible-xs">
                                            <a href="#" class="dinlblck mar5 padrl30  brd_67cff7 brd_67cff7_a t_67cff7_bg_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir">Post</a>
                                            
                                            
                                             

                                        </div>
						
					</div>

							<!-- post article form -->
							<div class="container     xxs-brdrad0 xxs-nobrdrl white_bg fsz14 dark_grey_txt hidden">
								
								<form action="../postChildNews/<?php echo $data['cid']; ?>" method="POST" id="post_comment" name="post_comment" accept-charset="ISO-8859-1">
									<input type="hidden" name="poster_name" value="Kowaken Ghirmai">
									<input type="hidden" name="poster_position" value="CEO at Giko">
									<input type="hidden" name="poster_avatar" value="<?php echo '../../../'.$value_p; ?>">
								
									<div class="padtb15 brdb_new lgtgrey_bg hidden-xs" >
										<div class="padrl25">
											<img src="<?php echo '../../../'.$value_p; ?>" width="48" height="48" class="marr10 brdrad40 valm">
											<span class="valm fsz25 bold black_txt">Till alla föräldrar...</span>
										</div>
									</div>
									<div class="padtb15 brdb_new hide" id="post_comment_top">
										<div class="padrl25">
											<a href="#" class="active valm dark_grey_txt lnkdblue_txt_a" onclick="return false;">
												<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon marr5 valm"><g class="large-icon" style="fill: currentColor"><g><path d="M21.7,5l-2.7-2.7C18.8,2.1,18.5,2,18.3,2s-0.5,0.1-0.7,0.3L5,14.8L3,21l6.2-2L21.7,6.4c0.2-0.2,0.3-0.5,0.3-0.7C22,5.5,21.9,5.2,21.7,5zM7.8,17.8l-1.6-1.6L18.3,4.1l1.6,1.6L7.8,17.8z"></path></g></g></svg>
												<span class="valm">Post discussion</span>
											</a>
											<span class="hei_24p dinlblck marrl15 brdr valm"></span>
											<a href="#" class="valm dark_grey_txt lnkdblue_txt_a" onclick="return false;">
												<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon marr5 valm"><g class="large-icon" style="fill: currentColor"><g><path d="M20,7h-3l0-2c0-1.1-0.9-2-2-2H9C7.9,3,7,3.9,7,5l0,2H4C2.9,7,2,7.9,2,9v9c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V9C22,7.9,21.1,7,20,7zM9,5h6l0,2H9V5zM20,18H4V9h16V18z"></path></g></g></svg>
												<span class="valm">Share job vacancy</span>
											</a>
										</div>
										
									</div>
									<div class="padtb20  hidden-xxxs">
										<div class="padrl25">
											<input type="text" name="post_title" id="post_title" placeholder="Skriv det här.." class="fsz18 wi_100 nobrd ffamily_avenir" required="required">
										</div>
									</div>
									<div class="padb10 talc hidden-xxxs" id="post_comment_mid">
										<div class="padrl25">
										<button type="button" class="hei_34p padrl15  brdrad2 white_bg blue_txt blue_brd curp" onclick="checkPost();">Skapa inlägg</button>					
										</div>
									</div>
									<div class="padtb15  white_bg visible-xs">
									<div class="padrl10">
									<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td>
																<div class="reply_img  opa1_a fleft ">
																	<img src="<?php echo '../../../'.$value_p; ?>" width="45" height="45" class="marr10 brdrad10" alt="Qloud ID Support2">
																</div>
															</td>
															<td class="wi_100 valm">
																<input type="text" name="post_titlem" id="post_titlem" placeholder="Tell something..." class="brdrad5 fsz15 wi_100 nobrd minhei_47p ffamily_avenir lgtgrey_bg pad15 black_txt bold" required="required">
															</td>
															<td class="reply_btn padl15 valm">
																 
																
																<button type="button" class="minhei_40p padrl15  brdrad2 white_bg blue_txt blue_brd curp" onclick="checkPostm();"><span class="fas fa-search"></span></button>	
															</td>
														</tr>
													</tbody></table>
									</div>
									</div>
									<div class="hide" id="comments_img">
										<div class="maxwi_50 dinlblck pos_rel padl25">
											<button href="#" class="remove_image wi_32p hei_32p dblock pos_abs zi10 top-10p right-10p bxsh_dgrey bxsh_dgrey2_h pad0 padt3 nobrd brdrad40 white_bg valm talc curp">
												<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="large-icon" style="fill: currentColor"><g><path d="M20,5.2l-6.8,6.8l6.7,6.7l-1.2,1.2L12,13.2L5.3,20l-1.2-1.2l6.7-6.7L4,5.2L5.2,4L12,10.8L18.8,4L20,5.2z"></path></g></g></svg>
											</button>
										</div>
									</div>
									
									<div class="padb15 hide" id="post_comment_bot">
										<div class="padrl25">
										
											<div class="opa55 opa1_h fleft pos_rel pad10 black_txt curp">
												<svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="dblock"><g class="large-icon" style="fill: currentColor"><g><path d="M15,9.5C15,8.7,15.7,8,16.5,8S18,8.7,18,9.5S17.3,11,16.5,11S15,10.3,15,9.5zM22,6v12c0,1.1-0.9,2-2,2H4c-1.1,0-2-0.9-2-2V6c0-1.1,0.9-2,2-2h16C21.1,4,22,4.9,22,6zM20,17.8l-4-3.1l-1.3,1C14.4,15.9,14,16,13.7,16c-0.5,0-1-0.2-1.4-0.6L8.5,10.8L4,15.7V18h16V17.8zM20,6H4v7.1l3.3-3.6C7.6,9.2,8,9,8.5,9c0.5,0,0.9,0.2,1.2,0.6l3.9,4.7l1.4-1C15.3,13.1,15.7,13,16,13c0.4,0,0.7,0.1,1,0.3L20,15.6V6z"></path></g></g></svg>
												<input type="file" name="comments_img" class="upload-image wi_100 hei_100 opa0 pos_abs zi10 top0 left0 curp">
											</div>
											
											<div class="fright">
												<button tyle="submit" class="dblue_btn">Post</button>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
								
								</form>
							</div>
							
							</div>
							<!-- All fb posts -->
							<div class="fb-posts box_shadow">
								
								<!-- prime template -->
								<div id="fb-prime-comment-template" style="display: none;">
									<div class="fb-comment dflex mart10" data-name="{name}">
										<a href="#" class="dblock">
											<img {avatar}="" width="32" height="32" class="marr10" title="{name}" alt="{name}">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">{name}</a>
											<span>{message}</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">{posted-date}</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img {avatar}="" width="20" height="20" class="marr10" title="{name}" alt="{name}">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								
								<!-- sub comment template -->
								<div id="fb-sub-comment-template" style="display: none;">
									<div class="fb-comment dflex mart10" data-name="{name}">
										<a href="#" class="dblock">
											<img {avatar}="" width="20" height="20" class="marr10" title="{name}" alt="{name}">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">{name}</a>
											<a href="#" class="undln_h blue3_txt">{replied-to}</a>
											<span>{message}</span>
											<div class="mart5 lgn_hight_15">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-subcomment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">{posted-date}</a>
											</div>
										</div>
									</div>
								</div>
								
								<!-- more comments -->
								<div id="fb-more-comments" style="display: none;">
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Thomas Blake</a>
											<span>annnndddd I'm an Elite Member - I have only ever had EVGA cards in my machines. Never had any problems</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Andre Seva</a>
											<span>Seems even though I own an EVGA 1070SC, I am not eligible for Elite Membership, because it was purchased from Best Buy.</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Thomas Blake</a>
											<span>annnndddd I'm an Elite Member - I have only ever had EVGA cards in my machines. Never had any problems</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Andre Seva</a>
											<span>Seems even though I own an EVGA 1070SC, I am not eligible for Elite Membership, because it was purchased from Best Buy.</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Thomas Blake</a>
											<span>annnndddd I'm an Elite Member - I have only ever had EVGA cards in my machines. Never had any problems</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Andre Seva</a>
											<span>Seems even though I own an EVGA 1070SC, I am not eligible for Elite Membership, because it was purchased from Best Buy.</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Thomas Blake</a>
											<span>annnndddd I'm an Elite Member - I have only ever had EVGA cards in my machines. Never had any problems</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Andre Seva</a>
											<span>Seems even though I own an EVGA 1070SC, I am not eligible for Elite Membership, because it was purchased from Best Buy.</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Thomas Blake</a>
											<span>annnndddd I'm an Elite Member - I have only ever had EVGA cards in my machines. Never had any problems</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="fb-comment dflex mart10" data-name="Thomas Blake">
										<a href="#" class="dblock">
											<img src="<?php echo $path;?>html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
										</a>
										<div class="flex_1">
											<a href="#" class="undln_h bold blue3_txt">Andre Seva</a>
											<span>Seems even though I own an EVGA 1070SC, I am not eligible for Elite Membership, because it was purchased from Best Buy.</span>
											<div class="mart5 lgn_hight_15 lgtgrey_txt">
												<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
												<span>·</span>
												<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
													<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
														</a>
														<div class="flex_1">
															<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
								
								<!-- fb post -->
								<div class="fb-post container mart25 brd brdrad2 white_bg fsz14 dark_grey_txt hide">
									<div class="pad10">
									
										<div class="marb10 padb10 brdb_new fsz13 lgtgrey_txt">Suggested Post</div>
									
										<div class="marb10">
											
											<a href="#">
												<img src="<?php echo $path;?>html/usercontent/images/news/tt.png" width="40" class="fleft marr10">
											</a>
											
											<div class="fleft">
												<h3 class="padb5 bold fsz16">
													<a href="#" class="undln_h blue3_txt">LinkedIn</a>
												</h3>
												<div class="lgn_hight_15 lgtgrey_txt">
													<a href="#" class="undln_h lgtgrey_txt">Sponsored</a>
													<span class="">·</span>
													<img src="<?php echo $path;?>html/usercontent/images/news/public.png" width="12" class="valm">
												</div>
											</div>
											
											<div class="fright">
												<a href="#" class="dinlblck padrl10 brd brdwi_2 brdrad3 light_grey_bg lgn_hight_20 valt dark_grey_txt">
													<span class="fa fa-thumbs-up"></span>
													<span>Like Page</span>
												</a>
												<a href="#" class="dinlblck padbl5 valt fsz16 lgtgrey_txt"><span class="fa fa-angle-down"></span></a>
											</div>
											
											<div class="clear"></div>
										</div>
										
										<div class="marb10">
											Exceed you marketing goals with LinkdIn ads. Get started with $50 in ad credits.
										</div>
										
										<div class="marb10 padb10">
											<a href="zoho_hr_portal_inner2.html" class="dblock">
												<figure class="mar0 pad0">
													<picture class="di_teaser__media">
														<source media="(min-width: 768px)" srcset="<?php echo $path;?>html/usercontent/images/news/1a1i.jpg">
														<img class="wi_100 hei_auto dblock bs_bb brd" srcset="<?php echo $path;?>html/usercontent/images/news/1a1i.jpg" title="Skadestånd på grund av kollektivavtalsbrott">
													</picture>
												</figure>
											</a>
											<div class="pad10 brd nobrdt">
												<h2 class="padt10 bold fsz30 xs-fsz24">
													<a href="zoho_hr_portal_inner2.html" class="dark_grey_txt">Skadestånd på grund av kollektivavtalsbrott</a>
												</h2>
												<div>
													<a href="user_page_dom.html" class="dark_grey_txt">
														<span class="midgrey_txt fsz12">VARLDEN <span class="fa fa-clock-o"></span> 10 min</span> Bakgrund Mellan Fackförbundet ST (förbundet) och staten gäller kollektivavtal.
													</a>
												</div>
												
												<div class="mart15">
													<a href="#" class="uppercase fsz13 lgtgrey_txt">business.linkedin.com</a>
													<a href="#" class="dinlblck fright padrl10 brd brdwi_2 brdrad3 light_grey_bg lgn_hight_20 valt dark_grey_txt">Learn More</a>
													<div class="clear"></div>
												</div>
											</div>
										</div>
										
										<div class="marb10 padb10 brdb_new">
											<a href="#"><img src="<?php echo $path;?>html/usercontent/images/news/like.png"></a>
											<a href="#"><img src="<?php echo $path;?>html/usercontent/images/news/laught.png"></a>
											<a href="#"><img src="<?php echo $path;?>html/usercontent/images/news/shock.png"></a>
											
											<div class="fright">
												<a href="#" class="fb-comments-count marl5 undln_h lgtgrey_txt" data-count="23">Comments</a>
												<a href="#" class="fb-shares-count marl5 undln_h lgtgrey_txt" data-count="0">Shares</a>
											</div>
											
											<div class="clear"></div>
										</div>
									
									<div>
										<a href="#" class="marr20 undln_h lgtgrey_txt">
											<span class="fa fa-thumbs-up"></span>
											Like
										</a>
										<a href="#" class="fb-show-comments marr20 undln_h lgtgrey_txt">
											<span class="fa fa-comment"></span>
											Comment
										</a>
										<a href="#" class="marr20 undln_h lgtgrey_txt">
											<span class="fa fa-share"></span>
											Share
										</a>
										
									</div>
									</div>
									<div class="fb-comments-holder padrbl10 brdt lgtgrey2_bg hidden">
										
										<!-- Comment form -->
										<form class="fb-comment-form mart10" data-avatar="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" data-name="Yugov Sergey">
											<div class="dflex">
												<a href="#" class="dblock">
													<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="32" height="32" class="marr10">
												</a>
												<div class="flex_1">
													<textarea name="comment" class="wi_100 dblock bs_bb pad8 brd white_bg" rows="1" placeholder="Write a comment..."></textarea>
												</div>
											</div>
										</form>
											
										<!-- Comment 1 -->
										<div class="fb-comment dflex mart10" data-name="Thomas Blake">
											<a href="#" class="dblock">
												<img src="<?php echo $path;?>html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
											</a>
											<div class="flex_1">
												<a href="#" class="undln_h bold blue3_txt">Thomas Blake</a>
												<span>annnndddd I'm an Elite Member - I have only ever had EVGA cards in my machines. Never had any problems</span>
												<div class="mart5 lgn_hight_15 lgtgrey_txt">
													<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
													<span>·</span>
													<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
													<span>·</span>
													<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
														<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
													</a>
													<span>·</span>
													<a href="#" class="undln_h lgtgrey_txt">7h</a>
												</div>
													
												<div class="fb-subcomments-holder pos_rel hidden">
													<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
													<form class="fb-subcomment-form mart10">
														<div class="dflex">
															<a href="#" class="dblock">
																<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
															</a>
															<div class="flex_1">
																<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
											
											
										<!-- Comment 2 -->
										<div class="fb-comment dflex mart10" data-name="Thomas Blake">
											<a href="#" class="dblock">
												<img src="<?php echo $path;?>html/usercontent/images/fb-post/andre.jpg" width="32" height="32" class="marr10" title="Andre Seva " alt="Andre Seva ">
											</a>
											<div class="flex_1">
												<a href="#" class="undln_h bold blue3_txt">Andre Seva </a>
												<span>Whats the difference between FTW3 and Elite??? The package???</span>
												<div class="mart5 lgn_hight_15 lgtgrey_txt">
													<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
													<span>·</span>
													<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
													<span>·</span>
													<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
														<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
													</a>
													<span>·</span>
													<a href="#" class="undln_h lgtgrey_txt">8h</a>
												</div>
												
												<div class="fb-comment-show-replies mart10 lgn_hight_15">
													<a href="#" class="fb-comment-action-show-replies undln_h blue3_txt">
														<span class="fa fa-share marr10"></span>
														<span>2 Replies</span>
													</a>
												</div>
												
												<div class="fb-subcomments-holder pos_rel hidden">
													<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
																									
													<!-- Subcomment 1 -->
													<div class="fb-comment dflex mart10" data-name="Chay Meredith">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/chay.jpg" width="20" height="20" class="marr10" title="Chay Meredith" alt="Chay Meredith">
														</a>
														<div class="flex_1">
															<a href="#" class="undln_h bold blue3_txt">Chay Meredith</a>
															<span> from the listing, it appears to have swappable face plates[or maybe just the option to have one painted a color of preference] and a reduced price?</span>
															<div class="mart5 lgn_hight_15">
																<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
																<span>·</span>
																<a href="#" class="fb-subcomment-action-reply undln_h blue3_txt">Reply</a>
																<span>·</span>
																<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
																	<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
																</a>
																<span>·</span>
																<a href="#" class="undln_h lgtgrey_txt">3hrs</a>
															</div>
														</div>
													</div>
													
													<!-- Subcomment 2 -->
													<div class="fb-comment dflex mart10" data-name="Scott Tubbs">
														<a href="#" class="dblock">
															<img src="<?php echo $path;?>html/usercontent/images/fb-post/scott.jpg" width="20" height="20" class="marr10" title="Scott Tubbs" alt="Scott Tubbs">
														</a>
														<div class="flex_1">
															<a href="#" class="undln_h bold blue3_txt">Scott Tubbs</a>
															<span>Not swappable, just different colors</span>
															<div class="mart5 lgn_hight_15">
																<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
																<span>·</span>
																<a href="#" class="fb-subcomment-action-reply undln_h blue3_txt">Reply</a>
																<span>·</span>
																<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
																	<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
																</a>
																<span>·</span>
																<a href="#" class="undln_h lgtgrey_txt">3hrs</a>
															</div>
														</div>
													</div>
													
													<form class="fb-subcomment-form mart10">
														<div class="dflex">
															<a href="#" class="dblock">
																<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
															</a>
															<div class="flex_1">
																<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
															</div>
														</div>
													</form>
													
												</div>
											</div>
										</div>
										
										
										<!-- Comment 3 -->
										<div class="fb-comment dflex mart10" data-name="Thomas Blake">
											<a href="#" class="dblock">
												<img src="<?php echo $path;?>html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
											</a>
											<div class="flex_1">
												<a href="#" class="undln_h bold blue3_txt">Andre Seva</a>
												<span>Seems even though I own an EVGA 1070SC, I am not eligible for Elite Membership, because it was purchased from Best Buy.</span>
												<div class="mart5 lgn_hight_15 lgtgrey_txt">
													<a href="#" class="fb-comment-action-like undln_h blue3_txt">Like</a>
													<span>·</span>
													<a href="#" class="fb-comment-action-reply undln_h blue3_txt">Reply</a>
													<span>·</span>
													<a href="#" class="fb-comment-action-show-liked undln_h blue3_txt" data-count="0">
														<img src="<?php echo $path;?>html/usercontent/images/news/like.png" class="valm">
													</a>
													<span>·</span>
													<a href="#" class="undln_h lgtgrey_txt">9h</a>
												</div>
												
												<div class="fb-subcomments-holder pos_rel hidden">
													<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
													<form class="fb-subcomment-form mart10">
														<div class="dflex">
															<a href="#" class="dblock">
																<img src="<?php echo $path;?>html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
															</a>
															<div class="flex_1">
																<textarea name="comment" class="wi_100 dblock bs_bb pad3 brd white_bg" rows="1" placeholder="Write a reply..."></textarea>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
										
										
										<!-- Show more -->
										<div class="fb-comment-view-more mart20">
											<a href="#" class="fleft">View more comments</a>
											<span class="fb-comment-view-more-count fright" data-count="3" data-total="23"></span>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							
							</div>
							
							<!-- discussions -->
							<div id="discussions">
								<?php 
								foreach($childrenNewsInformationDetail as $category => $value) 
													{
														
														
													?> 
								<div class="discussion mart25 brd_e3e2e2 brdrad5  xxs-brdrad0 xxs-nobrdrl white_bg fsz14 dark_grey_txt brd_e3e2e2  nobrdt nobrdb xs-nobrd">
										
									<div class="brd_width_2 padt15 blue_67cff7_brd nobrdb nobrdl nobrdr ">
										<div class="padrl20">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../<?php echo $value['image_path']; ?>" width="48" class="marr10 brdrad25" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb0 bold fsz16 black_txt "><?php echo $value['name']; ?></h2>
														<h3 class="poster_position opa55 pad0 fsz14"><?php   echo substr($value['company_name'],0,41); ?></h3>
													</div>
												</a>
											</div>
											 
											<div class="fright padt5">
												
												<span class="opa55  padr10"><?php if($value['time_diff']<=1) echo 'Just now'; else if($value['time_diff']<=60 && $value['time_diff']>1) echo $value['time_diff']." m"; else if($value['time_diff']>60 && $value['time_diff']<1440) echo  round($value['time_diff']/60,0)." hr"; else if($value['time_diff']>1440 && $value['time_diff']<43200) echo  round($value['time_diff']/1440,0)." days";  else if($value['time_diff']>43200 && $value['time_diff']<525600) echo  round($value['time_diff']/43200,0)." months"; else  echo round($value['time_diff']/525600,0)." yr"; ?></span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="marrl20 padt30 padb10 brdb">
										<div class="lgn_hight_20 ">
											<h4 class="fsz16 padb10"><a href="#" class="post_title black_txt lnkdblue_txt_h"><?php echo $value['information_added']; ?></a></h4>
											</div>
									</div>
									
									<div class="padtb15 hidden">
										<div class="padrl25">
											<a href="#" class="action-like marr10 bold lnkdblue_txt">Like</a>
											<a href="#" class="action-comment marr10 bold lnkdblue_txt">Comment</a>
											<span class="marl5 padr10 brdl">&nbsp;</span>
											<a href="#" class="likes_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet"><g class="small-icon" style="fill-opacity: 1"><g><path d="M11.6,7L9.7,3.8C9.4,3.2,9.2,2.7,9,2.1L8.8,1C8.8,1,8.7,1,8.7,1H7C5.9,1,5,1.9,5,3v0.4c0,0.6,0.1,1.3,0.3,1.9l0.2,0.7C5.5,6,5.5,6,5.5,6L2.5,6c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.1,0.7,0.4,1c0,0,0,0,0,0C1.1,8.8,1,9.1,1,9.5c0,0.5,0.3,1,0.7,1.3c0,0,0,0,0,0c-0.1,0.2-0.2,0.5-0.2,0.7c0,0.8,0.6,1.4,1.3,1.5c0,0,0,0,0,0c-0.1,0.3-0.1,0.6,0,1c0.2,0.6,0.9,1,1.5,1h2.2c0.9,0,1.5-0.1,2.1-0.3l2.1-0.7c0,0,0-0,0-0h3.2c0,0,0-0,0-0V7c0-0-0-0-0-0h-2.3C11.6,7,11.6,7,11.6,7zM12,12h-0.7c-0,0-0,0-0,0l-2.5,0.8c-0.4,0.1-0.8,0.2-1.2,0.2H4.4c-0,0-0-0-0-0c0-0.4-0.1-0.7-0.3-1.1c-0.2-0.3-0.5-0.6-0.9-0.8c-0-0-0-0-0-0c0.1-0.6-0.1-1.3-0.5-1.7c-0-0-0-0-0-0C2.9,9,2.9,8.5,2.8,8C2.8,8,2.8,8,2.8,8H8c0,0,0-0,0-0L6.9,4.7C6.8,4.2,6.8,3.8,6.8,3.4v-0.3c0-0.2,0.2-0.4,0.4-0.4h0.4c0,0,0,0,0,0c0.1,0.7,0.4,1.5,0.7,2l2.6,4.2c0,0,0,0,0,0h1.1C12,9,12,9,12,9v3C12,12,12,12,12,12z"></path></g></g></svg></span>
												<span class="amount valm">1</span>
											</a>
											<a href="#" class="comments_counter opa55 opa1_h marr10 bold black_txt lnkdblue_txt_h">
												<span class="wi_16p hei_16p dinlblck valm"><svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="icon"><g class="small-icon" style="fill-opacity: 1"><g><path d="M13,5v5.4l-2,1.3V10H3V5H13M14,3H2C1.4,3,1,3.4,1,4v7c0,0.6,0.4,1,1,1h7v3l5.3-3.3C14.7,11.4,15,10.9,15,10.4V4C15,3.4,14.6,3,14,3L14,3z"></path></g></g></svg></span>
												<span class="amount valm">2</span>
											</a>
										</div>
									</div>
									
									<div class="  ">
										<div class="padrl0">
											<form action="../postParentReply/<?php echo $data['parent_id']; ?>" method="POST" id="reply_comment<?php echo $value['id']; ?>" name="reply_comment<?php echo $value['id']; ?>" accept-charset="ISO-8859-1">
												
												<div class="comments_list">
												<?php 
								foreach($value['comments'] as $category => $value1) 
													{
														
														
													?> 
													<div class="comment_row wi_100 dflex alit_fs bs_bb padt15 padrl20">
														<a href="#" class="flex_0 padt5">
															<img src="../../../<?php echo $value1['image_path']; ?>" class="marr10 comment_images xxs-comment_images brdrad25" alt="Jonna Kjellstrand">
														</a>
														<div class="flex_1 bg_ddf6ff pad5 brdrad20">
															<p class="padb0 padl10">
																<a href="#" class="bold xxs-fsz12 fsz14 black_txt"><?php echo $value1['name']; ?></a>
																<span class="fright xxs-fsz12 fsz14 opa55  padr10"><?php if($value1['time_diff']<=1) echo 'Just now'; else if($value1['time_diff']<=60 && $value1['time_diff']>1) echo $value1['time_diff']." m"; else if($value1['time_diff']>60 && $value1['time_diff']<1440) echo  round($value1['time_diff']/60,0)." hr"; else if($value1['time_diff']>1440 && $value1['time_diff']<43200) echo  round($value1['time_diff']/1440,0)." days";  else if($value1['time_diff']>43200 && $value1['time_diff']<525600) echo  round($value1['time_diff']/43200,0)." months"; else  echo round($value1['time_diff']/525600,0)." yr"; ?></span>
															</p>
															<div>
																
																<div class="fleft   fsz14 padl10 black_txt">
																	
																	<span class="black_txt"><?php echo $value1['comment_detail']; ?></span>
																</div>
																<div class="clear"></div>
															</div>
														</div>
													</div>
													<?php } ?>
													<div id="more_reply<?php echo $value['id']; ?>">
													</div>
													<div class="padtb20 talc <?php if($value['comments_count']<=5) echo 'hidden'; ?>">
																<a href="javascript:void(0);" class="load_more_results  marrl5 " onclick="add_more_comments(this,<?php echo $value['id']; ?>);" value="1" >view previous comments</a>
																
															</div>
												</div>
												
												<div class="padtb10 padrl20 mart15 lgtgrey_bg">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td class="hidden">
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="<?php echo '../../../'.$value_p; ?>"   class="marr10 comment_images xxs-comment_images brdrad25" alt="<?php echo $value['name']; ?>">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="user_comment<?php echo $value['id']; ?>" id="user_comment<?php echo $value['id']; ?>" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_20 fsz14 " placeholder="Comment here.." required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_id" value="<?php echo $value['id']; ?>">
																
																<button type="button" class="hei_40p padrl15 nobrd brdrad2 t_fcaf17_bg white_txt curp" onclick="updateComment(<?php echo $value['id']; ?>)"><i class="fas fa-paper-plane"></i></button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											</form>
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div>
													<?php } ?>
													
													<div id="moreInformation">
																	</div>
																	
																	<div class="padtb20 talc">
																<a href="javascript:void(0);" class="load_more_results  marrl5 " onclick="add_more_rows_information(this);" value="1" >Visa fler</a>
																
															</div>
															
																<script>
															function add_more_rows_information(link) {
															var id_val=parseInt($(link).attr('value'))+1;
															var html1="";
															var send_data={};
															send_data.id=parseInt($(link).attr('value'));
															$(link).attr('value',id_val);
															send_data.img_path='<?php echo $value_p; ?>';
															$.ajax({
															type:"POST",
															url:"../moreInformationChild/<?php echo $data['parent_id']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#moreInformation"),
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

															function add_more_comments(link,id) {
															var id_val=parseInt($(link).attr('value'))+1;
															var html1="";
															var send_data={};
															send_data.id=parseInt($(link).attr('value'));
															$(link).attr('value',id_val);
															send_data.status_id=id;
															send_data.img_path='<?php echo $value_p; ?>';
															$.ajax({
															type:"POST",
															url:"../moreCommentsChild/<?php echo $data['parent_id']; ?>",
															data:send_data,
															dataType:"text",
															contentType: "application/x-www-form-urlencoded;charset=utf-8",
															success: function(data1){
															html1=data1;
															var $tbody = $("#more_reply"+id),
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
						
						<!-- News -->
						<div class="column_m wi_240p bs_bb padl20 talc hidden-xxxs">
							<div class="padtb30 brd white_bg talc">
								<div class="marb10 lnkdblue_txt fsz32">4</div>
								<div class="marb5 fsz14">Personal online</div>
								<div class="fsz14">
									<a href="#">All personal</a>
								</div>
								<div class="padt20">
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/1.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/2.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/3.jpg" width="36" class="marl-15 brdrad40"></a>
									<a href="#"><img src="<?php echo $path;?>html/usercontent/images/linkedin/4.jpg" width="36" class="marl-15 brdrad40"></a>
								</div>
							</div>
							
							 
							
						</div>
						
						<div class="clear"></div>
						
					</div><div class="clear"></div>
					</div>
				</div>
			
			<div class="clear"></div>
			<div class="hei_80p"></div>
			
			</div>
			
			
			<!-- Edit news popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="marb20"> <img src="<?php echo $path;?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" /> </div>
						<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
						<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
							<div class="wi_50 marb10"> <img src="<?php echo $path;?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						</div>
						<div class="marb25">
						<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
						<div>
							<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
						</div>
						<div class="marb10 padtb20 pos_rel">
							<div class="wi_100 pos_abs zi1 pos_cenY brdt"></div> <span class="diblock pos_rel zi2 padrl10 white_bg">
								eller om du redan har en prenumeration
							</span> </div>
							<div class="padb30"> <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a> </div>
					</form>
				</div>
			</div>
			
			
			<!-- Sales popup -->
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
			<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
				<div class="modal-content pad25 brd nobrdb talc">
					<form>
						<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
						<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							</div>
							<div class="dtrow">
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
								<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
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
					<img src="../../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb10 pad0 bold fsz24 black_txt">Känn dig trygg...</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
					
					
					
					<div class="wi_100 marb0 talc">
						
						<span class="valm fsz16">Använd Qloud ID Verify till att  be din motpart, privatperson som företag att legitimera sig innan ett möte eller affär.</span>
					</div>
					
					
				</div>
				
				<div class="mart0 pad15 lgtgrey2_bg">
					
					<div class="pos_rel ">
						
						<select name="reque" id= "reque" class=" default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt" onchange="selectCode(this.value);">
							
							<option value="0">--Välj en metod--</option>
							<option value="1">Via personnummer</option>
							
							
							
						</select>
					</div>
				</div>
				<div id="codeSelect" style="display:none">
					<div class="padrbl15 lgtgrey2_bg">
						
						<div class="pos_rel ">
							
							
							<input type="text" id="code_id" name="code_id" class="white_bg  wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Mottagarens personnummer">
						</div>
					</div>
				</div>
				
				<div id="errorMsg" class="red_txt"> </div>
				
				
				<div class="mart20">
					<input type="button" value="Skicka förfrågan" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchUser();">
					
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
		
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="person_informed">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
				
				<div id="error_msg_form" class="fsz20"> </div>
				
				<div class="padb10 xs-padrl0 mart20" > <a href="#" class="wi_100 maxwi_500p xs-maxwi_250p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg   fsz18 xs-fsz16 black_txt trans_all2 xs-marrl0 close_popup_modal">Close</a> </div>
			</div>
		</div>
		
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/autosize.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/keepcss/js/keep.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/personal_passport.js"></script>
	</body>
	
</html>