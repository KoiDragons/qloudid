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
	//$path="../";
?>
<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/responsive.css" />
		<!--	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/modules.css" />-->
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/articlecss/css/editor.css">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/css/modules.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/jquery.js"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			
			gtag('config', 'UA-101260776-1');
		</script>
		
	
		<style>
			
			.custom-scrollbar::-webkit-scrollbar {
			width: 8px;
			}
			.custom-scrollbar::-webkit-scrollbar-track {
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			}
			.custom-scrollbar::-webkit-scrollbar-thumb {
			background-color: darkgrey;
			outline: 1px solid slategrey;
			}
			.keep-completed[data-before]:not(:empty):before{
			content: attr(data-before);
			margin-bottom: 5px;
			padding-left: 25px;
			font-weight: bold;
			}
		</style>
	
	</head>
	
	<body>
		
		<?php $path1 = $path."usercontent/images/"; ?>
		<!-- HEADER -->
		
		<?php include 'CompanyHeaderClosed.php'; ?>
		<div class="clear"></div>
		
	
		
		
		
		
		<!-- CONTENT -->
		<div id="section-content" onclick="checkFlag();">
			<div class="wrap maxwi_100 dflex fxwrap_w md-fxwrap_nw alit_fs justc_sb mart40" >
				<div class="wi_240p fleft pos_rel zi50">
								<div class="padrl10">
									
									<!-- Scroll menu -->
									<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
										<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  white_bg fsz14  brdr_new">
											
											<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt">Min</a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz35 xs-fsz30 sm-fsz30 
														bold">Arbetsprofil</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php echo substr(html_entity_decode($row_summary['name']),0,20); ?></span>  </div>
													</a></div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
											<ul class="marr20 pad0">
									<li class=" dblock padb10 padl8">
											<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Nyhetsflöde </span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8">
											<a href="https://www.safeqloud.com/company/index.php/Brand/employeeAccount/<?php echo $data['eid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Kalender	</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										
										<li class=" dblock padb10 padl8 hidden">
											<a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Hantera företaget</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										
										
										<!-- Newsfeed -->
										
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Personalfrågor</h4>
											<ul class="marr20 pad0">
												
												
												
												
												<li class="dblock padr10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10  greyblue_bg black_txt white_txt_h black_txt_a" style="border-radius:0%;"> <span class="valm trn" >Fråga HR  </span> 
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p greyblue_bg rotate45" style="border-radius:0%;"></div>
													</a>
												</li>
												
											</ul>
											
										</li>
										
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Hantera dina..</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="../../EmployeeVisitors/invitationInfo/<?php echo $data['eid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Besök</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padr10">
													<a href="../../Leveranser/employeeReceivedInfo/<?php echo $data['eid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Brev eller Paket</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li>
										
										<li class="dblock pos_rel padb10 padt10  brdclr_hgrey brdclr_pblue2_a ">
											<h4 class="padb5 uppercase ff-sans black_txt trn bold">Gå till...</h4>
											<ul class="marr20 pad0">
												
											<li class="dblock padrb10">
													<a href="../../EmployeeBusinessCardDetail/shareInfo/<?php echo $data['eid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mitt visitkort</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Min närvaro</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Min lön</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="#" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Mitt schema</span>
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
					
						
				<!-- CENTER CONTENT -->
				<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xs-white_bg sm-white_bg padl10">
					<div class="right_container">
						
						<!-- News -->
						<div class="column_m scroll_menu_header wi_480p brdrad3" data-li-params="class|dblock padb5" data-params="class|dblock padb3 brdb_new brdclr_trans brdclr_white_a lgtgrey2_bg_a dark_grey_txt blue3_txt_a">
							
							<!-- post article form -->
							<div class="container brd brdrad2 white_bg fsz14 dark_grey_txt box_shadow">
								
							
									<input type="hidden" name="poster_name" value="Kowaken Ghirmai">
									<input type="hidden" name="poster_position" value="CEO at Giko">
									<input type="hidden" name="poster_avatar" value="../../../../html/usercontent/images/article/avatar2.jpg">
								
									<div class="padtb15 brdb_new lgtgrey2_bg ">
										<div class="padrl25">
											<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="48" height="48" class="marr10 brdrad40 valm">
											<span class="valm fsz25 bold">Till alla föräldrar...</span>
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
									<div class="padtb20">
										<div class="padrl25">
											<input type="text" name="post_title" id="post_title" placeholder="Skriv det här.." class="fsz18 wi_100 nobrd font_helvetica" required="required">
										</div>
									</div>
									<div class="padb10 talc" id="post_comment_mid">
										<div class="padrl25">
										<button type="button" class="hei_34p padrl15  brdrad2 white_bg blue_txt blue_brd curp" onclick="checkPost();">Skapa inlägg</button>					
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
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
											<img src="../../../../html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">7h</a>
											</div>
												
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
											<img src="../../../../html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
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
													<img src="../../../../html/usercontent/images/news/like.png" class="valm">
												</a>
												<span>·</span>
												<a href="#" class="undln_h lgtgrey_txt">9h</a>
											</div>
											
											<div class="fb-subcomments-holder pos_rel hidden">
												<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
												<form class="fb-subcomment-form mart10">
													<div class="dflex">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
												<img src="../../../../html/usercontent/images/news/tt.png" width="40" class="fleft marr10">
											</a>
											
											<div class="fleft">
												<h3 class="padb5 bold fsz16">
													<a href="#" class="undln_h blue3_txt">LinkedIn</a>
												</h3>
												<div class="lgn_hight_15 lgtgrey_txt">
													<a href="#" class="undln_h lgtgrey_txt">Sponsored</a>
													<span class="">·</span>
													<img src="../../../../html/usercontent/images/news/public.png" width="12" class="valm">
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
														<source media="(min-width: 768px)" srcset="../../../../html/usercontent/images/news/1a1i.jpg">
														<img class="wi_100 hei_auto dblock bs_bb brd" srcset="../../../../html/usercontent/images/news/1a1i.jpg" title="Skadestånd på grund av kollektivavtalsbrott">
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
											<a href="#"><img src="../../../../html/usercontent/images/news/like.png"></a>
											<a href="#"><img src="../../../../html/usercontent/images/news/laught.png"></a>
											<a href="#"><img src="../../../../html/usercontent/images/news/shock.png"></a>
											
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
										<form class="fb-comment-form mart10" data-avatar="../../../../html/usercontent/images/fb-post/ava1.jpg" data-name="Yugov Sergey">
											<div class="dflex">
												<a href="#" class="dblock">
													<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="32" height="32" class="marr10">
												</a>
												<div class="flex_1">
													<textarea name="comment" class="wi_100 dblock bs_bb pad8 brd white_bg" rows="1" placeholder="Write a comment..."></textarea>
												</div>
											</div>
										</form>
											
										<!-- Comment 1 -->
										<div class="fb-comment dflex mart10" data-name="Thomas Blake">
											<a href="#" class="dblock">
												<img src="../../../../html/usercontent/images/fb-post/blake.jpg" width="32" height="32" class="marr10" title="Thomas Blake" alt="Thomas Blake">
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
														<img src="../../../../html/usercontent/images/news/like.png" class="valm">
													</a>
													<span>·</span>
													<a href="#" class="undln_h lgtgrey_txt">7h</a>
												</div>
													
												<div class="fb-subcomments-holder pos_rel hidden">
													<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
													<form class="fb-subcomment-form mart10">
														<div class="dflex">
															<a href="#" class="dblock">
																<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
												<img src="../../../../html/usercontent/images/fb-post/andre.jpg" width="32" height="32" class="marr10" title="Andre Seva " alt="Andre Seva ">
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
														<img src="../../../../html/usercontent/images/news/like.png" class="valm">
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
															<img src="../../../../html/usercontent/images/fb-post/chay.jpg" width="20" height="20" class="marr10" title="Chay Meredith" alt="Chay Meredith">
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
																	<img src="../../../../html/usercontent/images/news/like.png" class="valm">
																</a>
																<span>·</span>
																<a href="#" class="undln_h lgtgrey_txt">3hrs</a>
															</div>
														</div>
													</div>
													
													<!-- Subcomment 2 -->
													<div class="fb-comment dflex mart10" data-name="Scott Tubbs">
														<a href="#" class="dblock">
															<img src="../../../../html/usercontent/images/fb-post/scott.jpg" width="20" height="20" class="marr10" title="Scott Tubbs" alt="Scott Tubbs">
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
																	<img src="../../../../html/usercontent/images/news/like.png" class="valm">
																</a>
																<span>·</span>
																<a href="#" class="undln_h lgtgrey_txt">3hrs</a>
															</div>
														</div>
													</div>
													
													<form class="fb-subcomment-form mart10">
														<div class="dflex">
															<a href="#" class="dblock">
																<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
												<img src="../../../../html/usercontent/images/fb-post/marlin.jpg" width="32" height="32" class="marr10" title="Marlin Dart" alt="Marlin Dart">
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
														<img src="../../../../html/usercontent/images/news/like.png" class="valm">
													</a>
													<span>·</span>
													<a href="#" class="undln_h lgtgrey_txt">9h</a>
												</div>
												
												<div class="fb-subcomments-holder pos_rel hidden">
													<div class="hei_100 pos_abs top0 right100 marr10 brdl brdwi_2"></div>
													<form class="fb-subcomment-form mart10">
														<div class="dflex">
															<a href="#" class="dblock">
																<img src="../../../../html/usercontent/images/fb-post/ava1.jpg" width="20" height="20" class="marr10" title="Yugov Sergey" alt="Yugov Sergey">
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
							<div id="discussions"><div class="discussion mart25 brd brdrad2 white_bg fsz14 dark_grey_txt box_shadow">
										
									<div class="padt15">
										<div class="padrl25">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="48" class="marr10 brdrad40" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb5 bold fsz14">Bo Kjellstrand</h2>
														<h3 class="poster_position opa55 pad0 fsz14">Employee at Demo Förskola</h3>
													</div>
												</a>
											</div>
											 
											<div class="fright padt5">
												
												<span>24days</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="padt15">
										<div class="padrl25">
											<h4 class="fsz16 padb20"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">Ha en trevlig helg alla föräldrar och tack för en bra vecka...</a></h4>
											</div>
									</div>
									
									
									
									<div class="padb15 lgtgrey2_bg">
										<div class="padrl25">
										
												
												<div class="comments_list">
											
											<div id="more_reply3">
													</div>
													<div class="padtb20 talc hidden">
																<a href="javascript:void(0);" class="load_more_results  marrl5 " value="1">view previous comments</a>
																
															</div>
												</div>
												
												<div class="padt15">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td>
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="44" class="marr10 brdrad40" alt="Bo Kjellstrand">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="user_comment3" id="user_comment3" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Kommentera här..." required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_id" value="3">
																
																<button type="button" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp" >Skicka</button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div>
								<div class="discussion mart25 brd brdrad2 white_bg fsz14 dark_grey_txt box_shadow">
										
									<div class="padt15">
										<div class="padrl25">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="48" class="marr10 brdrad40" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb5 bold fsz14">Bo Kjellstrand</h2>
														<h3 class="poster_position opa55 pad0 fsz14">Employee at Demo Förskola</h3>
													</div>
												</a>
											</div>
											 
											<div class="fright padt5">
												
												<span>25days</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="padt15">
										<div class="padrl25">
											<h4 class="fsz16 padb20"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">Imorgon brinner det så kom inte till förskolan</a></h4>
											</div>
									</div>
									
									
									
									<div class="padb15 lgtgrey2_bg">
										<div class="padrl25">
										
												
												<div class="comments_list">
											<div class="comment_row wi_100 dflex alit_fs bs_bb padt15">
														<a href="#" class="flex_0">
															<img src="../../../../estorecss/tmpnew0.92787100 1557644768.jpg" width="44" class="marr10 brdrad40" alt="Jonna Kjellstrand">
														</a>
														<div class="flex_1">
															<p class="padb5">
																<a href="#" class="bold fsz14 dark_grey_txt">HELEN GHIRMAI</a>
																<span>Ok, tack</span>
															</p>
															<div>
																
																<div class="fright">
																	
																	<span>25days</span>
																</div>
																<div class="clear"></div>
															</div>
														</div>
													</div>
											<div id="more_reply2">
													</div>
													<div class="padtb20 talc hidden">
																<a href="javascript:void(0);" class="load_more_results  marrl5 "  value="1">view previous comments</a>
																
															</div>
												</div>
												
												<div class="padt15">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr class="odd">
															<td>
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="44" class="marr10 brdrad40" alt="Bo Kjellstrand">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="user_comment2" id="user_comment2" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Kommentera här..." required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_id" value="2">
																
																<button type="button" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp" >Skicka</button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div>
								<div class="discussion mart25 brd brdrad2 white_bg fsz14 dark_grey_txt box_shadow">
										
									<div class="padt15">
										<div class="padrl25">
											<div class="fleft">
												<a href="#" class="dark_grey_txt">
													<div class="fleft">
														<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="48" class="marr10 brdrad40" alt="Jonna Kjellstrand">
													</div>
													<div class="fleft padt5">
														<h2 class="poster_name padb5 bold fsz14">Bo Kjellstrand</h2>
														<h3 class="poster_position opa55 pad0 fsz14">Employee at Demo Förskola</h3>
													</div>
												</a>
											</div>
											 
											<div class="fright padt5">
												
												<span>27days</span>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									<div class="padt15">
										<div class="padrl25">
											<h4 class="fsz16 padb20"><a href="#" class="post_title dark_grey_txt lnkdblue_txt_h">Vi vill meddela att den 12/9 kommer vi ha ett litet firande. Den börjar klockan 4 em och alla är välkomna. Ta med er ett stort leende</a></h4>
											</div>
									</div>
									
									
									
									<div class="padb15 lgtgrey2_bg">
										<div class="padrl25">
										
												
												<div class="comments_list">
											
											<div id="more_reply1">
													</div>
													<div class="padtb20 talc hidden">
																<a href="javascript:void(0);" class="load_more_results  marrl5 " value="1">view previous comments</a>
																
															</div>
												</div>
												
												<div class="padt15">
													<table class="wi_100" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td>
																<div class="reply_img opa55 opa1_a fleft">
																	<img src="../../../../html/usercontent/images/article/avatar2.jpg" width="44" class="marr10 brdrad40" alt="Bo Kjellstrand">
																</div>
															</td>
															<td class="wi_100 valm">
																<textarea name="user_comment1" id="user_comment1" rows="1" class="wi_100 dblock bs_bb padrl10 padtb9 brd brdclr_lnkdblue_f brdrad2 lgn_hight_14 fsz14" placeholder="Kommentera här..." required="required"></textarea>
															</td>
															<td class="reply_btn padl15 valm">
																<input type="hidden" name="reply_id" value="1">
																
																<button type="button" class="hei_34p padrl15 nobrd brdrad2 blue_bg white_txt curp" >Skicka</button>
															</td>
														</tr>
													</tbody></table>
												</div>
											
											
											<div class="clear"></div>
											
										</div>
									</div>
								</div></div>
							
						</div>
						
						<!-- News -->
						<div class="column_m wi_240p bs_bb padl20 talc">
							<div class="padtb30 brd white_bg talc">
								<div class="marb10 lnkdblue_txt fsz32">4</div>
								<div class="marb5 fsz14">Anslutna föräldrar</div>
								<div class="fsz14">
									<a href="#">Se alla</a>
								</div>
								<div class="padt20">
																	<a href="#"><img src="../../../../estorecss/tmpnew0.92787100 1557644768.jpg" width="36" height="36" class="marl-15 brdrad40"></a>
																		<a href="#"><img src="../../../../estorecss/tmpnew0.07259700 1527955104.jpg" width="36" height="36" class="marl-15 brdrad40"></a>
																		<a href="#"><img src="../../../../estorecss/tmpnew0.92787100 1557644768.jpg" width="36" height="36" class="marl-15 brdrad40"></a>
																		<a href="#"><img src="../../../../estorecss/tmpnew0.52292000 1569848854.jpg" width="36" height="36" class="marl-15 brdrad40"></a>
																	</div>
							</div>
							
							<div class="mart15 padtb15 brd white_bg talc">
								<form class="padrl10">
									<div class="marb10 fsz14">Add personal contacts</div>
									<input type="text" value="kowaken.ghirmai@qmatchup.com" class="wi_100 hei_32p bs_bb marb10 padrl10 brd brdrad3">
									<button type="submit" class="wi_100 hei_32p marb10 nobrd brdrad3 fsz14 blue_bg white_txt">Continue</button>
								</form>
							</div>
							
						</div>
						
						<div class="clear"></div>
						
					</div></div>
			
				
			</div>
		</div>
		
		<script>
			function changeIndex(id){
				if($("#"+id).hasClass("active"))
				{
					var id_val=$("#indexing_save").val();
					var id_val = id_val.replace($("#"+id).attr('id')+',', "");
					$("#indexing_save").val(id_val);
				}
				else
				{
					var id_val=$("#indexing_save").val()+$("#"+id).attr('id')+',';
					$("#indexing_save").val(id_val);
				}
				$("#"+id).toggleClass('active');
				//alert($(this).attr('id'));
				return false;
			};
		</script>
		
		
		<div id="keep_fade" class="wi_100 hei_100 dnone pos_fix zi998 top0 left0 bg_0_54"></div>
		
		<div class="wi_600p maxwi_90 dnone pos_fix zi999 pos_cen  bs_bb fsz14" id="keep-modal">
			<form>
				<div class="keep-block keep-block-modal pos_rel  brdrad2 bg_f txt_0_87 trans_bgc1 setId">
					<a href="#" class="keep-pin dblock pos_abs zi5 top4p right4p pad5">
						<img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="dblock dnone_pa opa50 opa1_h trans_opa1" alt="Pin note">
						<img src="<?php echo $path; ?>html/keepcss/images/icons/pin_active.svg" width="18" height="18" class="dnone dblock_pa" alt="Unpin note">
						<div class="dblock dnone_pa opa0_nph opa80 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8">Pin note</span>
						</div>
						<div class="dnone dblock_pa opa0_nph opa80 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
							<span class="dblock padrl8">Unpin note</span>
						</div>
					</a>
					
					<div class=" custom-scrollbar minhei_60p maxhei_100vh-70p ovfl_auto pos_rel">
						<div class="keep-images dflex fxwrap_w alit_c"></div>
						<div class="padt16 padr16 padl16">
							<textarea name="title" rows="1" cols="1" class="autosize keep-title wi_100 dblock marb16 pad0 nobrd bg_trans ff_inh bold fsz27 txt_0_87" placeholder="Title" readonly></textarea>
						</div>
						<div class="keep-list padr16 padl16 fsz16 mart10"></div>
						
						<div class="keep-completed marb16 padr16 padl16 " data-before="Completed items"></div>
						<div class="keep-metas dflex fxwrap_w alit_c marb10 padr16 padl16 mart15"></div>
					</div>
					<div class="wi_100 dflex fxwrap_w alit_c justc_sb">
						<div class="keep-actions wi_100 maxwi_400p dflex alit_c pos_rel zi5 padb5">
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-action-remind dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Remind me</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-action-collaborator dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-collaborator.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Collaborator">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Collaborator</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
								</a>
								<div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs bot100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
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
							<div class="keep-action wi_12_5 pos_rel">
								<label class="keep-add-image dblock opa50 opa1_h pos_rel pad5 talc curp trans_opa1">
									<input type="file" accept="image/*" class="sr-only">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-image.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Add image">
								</label>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Add image</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-action-archive dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Archive</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="keep-action-more dblock opa50 opa1_h pad5 talc trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">More</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="dblock opa50 opa1_h opa25_na_i pad5 talc curna curp_a trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-undo.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Undo">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Undo</span>
								</div>
							</div>
							<div class="keep-action wi_12_5 pos_rel">
								<a href="#" class="dblock opa50 opa1_h opa25_na_i pad5 talc curna curp_a trans_opa1">
									<img src="<?php echo $path; ?>html/keepcss/images/icons/icon-undo.svg" width="18" height="18" class="maxwi_100 hei_auto scale-11" alt="Redo">
								</a>
								<div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
									<span class="dblock padrl8">Redo</span>
								</div>
							</div>
						</div>
						<div class="fxshrink_0 marr15 marla padb5">
							<button type="submit" class="marl5 padtb5 padrl15 nobrd brdrad3 trans_bg bg_0_08_h uppercase bold fsz13 txt_0_87 curp trans_all2">Close</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		
		
		<!-- Sliding modal tabs -->
		<div class="sliding-modal-tabs active-base wi_400p maxwi_100 hei_100vh pos_fix zi50 top0 right-450p right0_a bs_bb bxsh_00100_03 white_bg fsz14 dark_grey2_txt trans_all3">
			<!-- header -->
			<div class="sliding-modal-header hidden ovfl_hid pos_abs zi1 top25 right100 brdradtl3 fsz16">
				<ul class="mar0 pad0">
					<li class="dblock mar0 pad0">
						<a href="#" class="wp-tooltip dblock wi_40p hei_40p talc lgn_hight_40 dblue_bg blue2_bg_h white_bg_a white_txt dblue_txt_a" data-target=".tab-vacant-position" data-tooltip="Vacant position" data-offset-x="10" data-offset-y="8"><span class="fa fa-book"></span></a>
					</li>
					<li class="dblock mar0 pad0">
						<a href="#" class="wp-tooltip dblock wi_40p hei_40p talc lgn_hight_40 dblue_bg blue2_bg_h white_bg_a white_txt dblue_txt_a" data-target=".tab-passport" data-tooltip="Passport" data-offset-x="10" data-offset-y="8"><span class="fa fa-comments"></span></a>
					</li>
					<li class="dblock mar0 pad0">
						<a href="#" class="wp-tooltip dblock wi_40p hei_40p talc lgn_hight_40 dblue_bg blue2_bg_h white_bg_a white_txt dblue_txt_a" data-target=".tab-cv" data-tooltip="CV" data-offset-x="10" data-offset-y="8"><span class="fa fa-drivers-license-o"></span></a>
					</li>
					<li class="show-when-active dblock mar0 pad0">
						<a href="#" class="wp-tooltip sliding-modal-tabs-close dblock wi_40p hei_40p talc lgn_hight_40 red_bg white_txt" data-tooltip="Close" data-offset-x="10" data-offset-y="8"><span class="fa fa-close"></span></a>
					</li>
				</ul>
			</div>
			
			<!-- content -->
			<div class="sliding-modal-content wi_100 hei_100 ovfl_auto pos_abs zi5 top0 left0 white_bg">
				
				<!-- Vacant position tab -->
				<div class="sliding-modal-tab aero-bold tab-vacant-position">
					<form action="" method="post" class="pos_rel">
						
						<!-- header area -->
						<div class="wi_100 hei_190p pos_abs top0 left0 bs_bb padtrl10 lgtgrey2_bg">
							
							<!-- progress -->
							<div class="progress wi_85 hei_10p ovfl_hid fleft mart10 grey_bg">
								<div class="dblue_bg wi_25 hei_100"></div>
							</div>
							<div class="clear padb30"></div>
							
							<!-- title -->
							<h2 class="bold fsz32">Jobba direkt efter studenten</h2>
							
							<div class="padt10 fsz12">
								<div class="dinlblck marrb10 padr5 brdr valm uppercase">
									<strong>City: </strong> <span>SÖDERTÄLJE</span>
								</div>
								<div class="dinlblck marrb10 padr10 valm uppercase">
									<strong>Position: </strong> <span>Sales</span>
								</div>
							</div>
							
						</div>
						
						<!-- questions  -->
						<div class="mhei_100vh bs_bb padt200 padb125 xs-padb150 sm-padb150">
							
							<div class="padrl10">
								
								<div class="marb20 padb10 brdb fsz12">
									<div class="dinlblck martrb5 padr5 brdr valm"><strong class="uppercase">Conditions:</strong> <span>Normal, Fulltime, Office hours</span> </div>
									<div class="dinlblck martrb5 padr5 brdr valm"><strong class="uppercase">Experience:</strong> <span>Manager, Minimum 2 years</span> </div>
									<div class="dinlblck martrb5 padr5 brdr valm"><strong class="uppercase">Driving license:</strong> <span>Yes, since 5 years</span> </div>
									<div class="dinlblck martrb5 padr5 brdr valm"><strong class="uppercase">Skills:</strong> <span>CRM, Office, Teamleader, Performance</span> </div>
								</div>
								<p>
									Nu expanderar vi vårt drömteam i Södertäkje! Vi söker nu drivna, karismatiska och resultatfokuserade säljare som brinner för kvalitet i allt de tar sig för.
								</p>
								
								<p>OM KEY SOLUTIONS OCH ROLLEN SOM SUPERSÄLJARE</p>
								
								<p>Key Solutions har blivit utsedda till Sveriges bästa Säljbyrå av bl.a. Tele2 och Com Hem. Du kommer att ingå i ett team på 30 säljande superstjärnor. Teamet kommer att sälja fasta och mobila lösningar till både befintliga och presumtiva privatkunder.</p>
								
								<p>Just nu söker vi dig som tog studenten sommaren 2016.</p>
								
								<span>Vad särskiljer oss från alla andra arbetsgivare?</span>
								<ul>
									<li>Garanterad månadslön på 30 000 SEK inom 6 månader</li>
									<li>Säljtävlingar med resor till t.ex. Barcelona, Miami, Los Angeles och New York</li>
									<li>Sveriges skönaste arbetstider för den morgontrötta med start 12:00</li>
									<li>Vi avsätter minst en timme per dag för din personliga utveckling</li>
								</ul>
								
								<span>Vi söker dig som:</span>
								<ul>
									<li>Har god social kompetens och gillar att söka kontakt med nya människor</li>
									<li>Är tävlingsinriktad och älskar att vara i händelsernas centrum</li>
									<li>Är målinriktad och har en stark vilja att ständigt bli bättre</li>
									<li>Körkort och tillgång till egen bil är meriterat (tjänstebil kan vara aktuellt)</li>
								</ul>
								
								<span>Vi erbjuder rätt person:</span>
								<ul>
									<li>Fast garantilön, provision samt generösa bonusar</li>
									<li>Kostnadsfri säljutbildning i Key Business School (Inga studielån och full lön under studietiden, värde: 50 000 SEK)</li>
									<li>Fantastiska möjligheter att utvecklas och göra karriär på Europas 2:a Bästa Arbetsplats 2015</li>
								</ul>
								
								<p>Då vi har några av Sveriges absolut bästa säljare och coacher till förfogande, samt erbjuder säljutbildning i Key Business School, så har vi inget krav på tidigare försäljningserfarenhet. Vi tar ansvaret över att ge våra medarbetare rätt verktyg själva.</p>
								
								<p>Om du tycker detta låter kul, skicka ett mail till oss och berätta vem du är. Du behöver inte bifoga något formellt CV, ett kort mail till <a href="mailto:jobb@keysolutions.se">jobb@keysolutions.se</a> räcker.</p>
								
								<p>Besök gärna några av våra sociala medier för en inblick i hur vardagen för en säljare hos oss ser ut: <a href="https://instagram.com/keysolutionsse">https://instagram.com/keysolutionsse</a> eller <a href="http://www.facebook.com/KeysolutionsSE">http://www.facebook.com/KeysolutionsSE</a>
								</p>
								
								<p><big>Sök jobbet senast <strong>11 mars 2017</strong></big>
								</p>
								
								<a href="#">
									<img src="<?php echo $path; ?>html/articlecss/images/icon-link.png" class="valm" />
									<span class="valm">Ansök på arbetsgivarens webbplats</span>
								</a>
								
							</div>
							
						</div>
						
						<!-- footer area -->
						<div class="wi_100 pos_abs bot0 left0">
							<div class="pad10 lgtgrey2_bg">
								<div class="padtb5">
									<a href="#" class="form-progress-back dinlblock fleft padt10 fsz14">
										<span class="fa fa-chevron-left valm"></span>
										<span class="valm">Back</span>
									</a>
									<a href="#" class="form-progress-next dblue_btn bs_bb fright blue2_bg dblue2_bg_h tall fsz14">Next</a>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="pad10 grey_bg talc fsz14">
								<div class="padtb5">
									Want to get hired for projects? <a href="#">Become a freelancer</a>
								</div>
							</div>
						</div>
						
					</form>
					
				</div>
				
				<!-- Passport tab -->
				<div class="sliding-modal-tab aero-bold tab-passport">
					<form action="" method="post" class="pos_rel">
						
						<!-- header area -->
						<div class="wi_100 hei_190p pos_abs top0 left0 bs_bb padtrl10 lgtgrey2_bg">
							
							<!-- progress -->
							<div class="progress wi_85 hei_10p ovfl_hid fleft mart10 grey_bg">
								<div class="dblue_bg wi_25 hei_100"></div>
							</div>
							<div class="clear padb30"></div>
							
							<table class="wi_100 nobrd" cellpadding="0" cellspacing="0">
								<tr>
									<td class="wi_50 valm">
										<h2 class="bold fsz28">Qmatchup Inc</h2>
										<div class="mart padb5 brd brdst_dot nobrdt nobrdr nobrdl valm"><span class="uppercase">TELECOMMUNICATIONS</strong></div>	
									</td>
									<td class="wi_50 valm talr">
										<a href="#">
											<img src="<?php echo $path; ?>html/articlecss/images/volvo.jpg" class="maxwi_100 hei_auto" />
										</a>
									</td>
								</tr>
							</table>
							
						</div>
						
						<!-- questions  -->
						<div class="mhei_100vh bs_bb padt200 padb125 xs-padb150 sm-padb150">
							
							<div class="padrl10">
								
								<div class="marb20 padb10 fsz14">
									<div class="mart5">
										<span class="dblock fsz12">CID:</span> <span>125113</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Visiting address :</span> <span>Sweden</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Founded :</span> <span>01/03/2017</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Website :</span> <span>GMAIL.COM</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Phone :</span> <span>GMAIL.COM</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Annual Turnover :</span> <span>0</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Employee Size :</span> <span>5 - 9</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
									<div class="mart5">
										<span class="dblock fsz12">Validated Until :</span> <span>01/04/2017</span>
										<div class="wi_75 padt5 brd brdst_dot nobrdt nobrdr nobrdl"></div>
									</div>
								</div>
								
							</div>
							
						</div>
						
						<!-- footer area -->
						<div class="wi_100 pos_abs bot0 left0">
							<div class="pad10 lgtgrey2_bg">
								<div class="padtb5">
									<a href="#" class="form-progress-back dinlblock fleft padt10 fsz14">
										<span class="fa fa-chevron-left valm"></span>
										<span class="valm">Back</span>
									</a>
									<a href="#" class="form-progress-next dblue_btn bs_bb fright blue2_bg dblue2_bg_h tall fsz14">Next</a>
									<div class="clear"></div>
								</div>
							</div>
							
							<div class="pad10 grey_bg talc fsz14">
								<div class="padtb5">
									Want to get hired for projects? <a href="#">Become a freelancer</a>
								</div>
							</div>
						</div>
						
					</form>
					
				</div>
				
				<!-- CV -->
				<div class="sliding-modal-tab active-base2 aero-bold tab-cv">
					<form action="" method="post" class="mhei_100vh pos_rel">
						
						<!-- header area -->
						<div class="wi_100 bs_bb pad10 brd brdst_dot nobrdt nobrdr nobrdl lgtgrey2_bg">
							<a href="#" class="fleft">
								<img src="<?php echo $path; ?>html/articlecss/images/sliding-image.jpg" width="85" class="maxwi_100 hei_auto brd brdclr_white brdrad5 brdwi_2" />
							</a>
							<div class="marl100">
								<h2 class="bold fsz28">Henric Diefke</h2>
								<div class="padb10 valm">
									<span class="uppercase">Parter</span>
								</div>
							</div>
							<div class="clear"></div>
							
						</div>
						
						<!-- questions  -->
						<div class="padb80">
							
							<div class="padrl10">
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16">Professional Summary</h2>
									<div class="cv_px">
										<p>After years as a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.123</p>
									</div>
								</div>
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16 padb20">Experience Summary</h2>
									<div class="career_timeline font_opnsns xs-nobrd xs-mar0 xs-padl0 xs-padr0">
										<span class="trend_start hiddeni-xs"></span>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>Current</span></span>
											<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Remotia</h2>
											<p>January 2016 - Still working | Stockholm</p>
											multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004. Work?
										</div>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>2016</span></span>
											<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Qmatchup Inc</h2>
											<p>May 2014 - March 2016 | Stockholm</p>
											After years as a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.
										</div>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>2015</span></span>
											<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Giko Outsourcing</h2>
											<p>September 2012 - April 2015 | Stockholm</p>
											After years as a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.
										</div>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>2010</span></span>
											<h2 class="padb5"><strong>CEO</strong><strong> @ </strong>Notitia</h2>
											<p>January 2001 - May 2010 | Stockholm</p>
											After years as a multiple awarded sales agent and project leader I was encouraged by the CEO of ThomsonFakta - a Thomson Reuters company to start my own company with them as my first customer. I served Thomsonfakta 2002-2004.
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16 padb20">Educational Summary</h2>
									<div class="career_timeline font_opnsns xs-nobrd xs-mar0 xs-padl0 xs-padr0">
										<span class="trend_start hiddeni-xs"></span>
										
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"><span>2011</span></span>
											<h2 class="padb5"><strong>Inkpare</strong>@ Affrshgskolan</h2>
											<p>2008 - 2011 </p>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16 padb20">Language</h2>
									<div class="career_timeline font_opnsns xs-nobrd xs-mar0 xs-padl0 xs-padr0">
										<span class="trend_start hiddeni-xs"></span>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"></span>
											<h2 class="padb5"><strong>Turkey</strong></h2>
											<p>Level-5 </p>
										</div>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"></span>
											<h2 class="padb5"><strong>Armenia</strong></h2>
											<p>Level-3 </p>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="padtb15">
									<h2 class="cyanblue_txt bold fsz16 padb20">Driving Licence</h2>
									<div class="career_timeline font_opnsns xs-nobrd xs-mar0 xs-padl0 xs-padr0">
										<span class="trend_start hiddeni-xs"></span>
										<div class="column_m career_year_exp padb30">
											<span class="year_trend hiddeni-xs"></span>
											<h2 class="padb5"><strong>Licence</strong></h2>
											<p>Yes </p>
										</div>
										<div class="clear"></div>
									</div>
									<div class="clear"></div>
								</div>
								
							</div>
						</div>
						
						<!-- footer area -->
						<div class="show-when-active2 wi_400p maxwi_100 pos_fix zi10 bot0 right0">
							<div class="pad10 lgtgrey2_bg">
								<div class="padtb5">
									<a href="#" target="_blank" class="close-sliding-modal fa fa-close wi_30p hei_40p dinlblck fright bs_bb marr20 brdrad3 red_bg talc lgn_hight_40 fsz16 white_txt"></a>
									<a href="#" class="form-progress-next dblue_btn wi_360p wi_100-60p bs_bb fright marr10 blue2_bg dblue2_bg_h talc fsz14">Apply</a>
									<div class="clear"></div>
								</div>
							</div>
						</div>
						
					</form>
					
				</div>
				
				
			</div>
		</div>
		
		
		<!-- WP fade -->
		<div id="wp_fade"></div>
		
		
		<!-- Slide fade -->
		<div id="slide_fade"></div>
		
		
		
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/autosize.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/slick.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/icheck.js"></script>
		
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/custom.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/keep_update_new.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/jquery.sticky-kit.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/in-view.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/superfish.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/icheck.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/editor.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/autosize.min.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/jquery.selectric.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/modules.js"></script>
		<script type="text/javascript" src="<?php echo $path; ?>html/articlecss/js/custom.js"></script>
		
		
		
	</body>
	
</html>		