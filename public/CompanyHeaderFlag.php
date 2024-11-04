<script>
			var currentLang = 'sv';
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
			</script>
 <?php $path1 = $path."html/usercontent/images/"; ?>
	<div class="column_m header  bs_bb lgtblue2_bg">
			<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtblue2_bg">
				<div class="visible-xs visible-sm fleft">
					<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
				</div>
				<div class="logo hidden-xs hidden-sm marr15 wi_160p">
					<a href="#"><h3 class="marb0 padt10 fsz27 red_txt padb10" style="font-family: 'Audiowide', sans-serif;">Qloudid</h3></a>
				</div>
				<div class="hidden-xs hidden-sm fleft padl20 padr10 brdl">
					<div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
						<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
							
							<li class="hidden-xs" style="margin: 0 30px 0 0;">
								<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
								<ul class="popupShow" style="display: none;">
									<li class="first">
										<div class="top_arrow"></div>
									</li>
									<li class="last">
										<div class="emailupdate_menu padtb15">
											<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
											<ol>
												<li class="fsz14">
													<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
												</li>
												<li>
													<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
													<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Italienska </a> </div>
												</li>
											</ol>
											
										</div>
									</li>
								</ul>
							</li>
							
							
							
							
							
						</ul>
					</div>
				</div>
				<div class="top_menu frighti padt10 hidden-xs mart10">
					<ul class="menulist sf-menu">
						<li>
							<a href="https://www.qmatchup.com/beta/user/index.php/NewPersonal/userAccount" ><span class="black_txt pred_txt_h">+<?php echo substr($company['company_name'],0,10); ?>...</span></a>
						</li>
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-envelope-o black_txt"></span></a>
							<ul>
								<li>
									<div class="top_arrow"></div>
								</li>
								<li>
									<div class="application_menu pad20">
										<ol>
											<li>
												<a href="http://jain.com" target="_blank" class="business_prof"> <span></span> First App </a>
											</li>
											<li>
												<a href="http://www.gh.in" target="_blank" class="swedBank"> <span></span> testing 1.2 </a>
											</li>
											<li>
												<a href="http://www.ee.se" target="_blank" class="business_prof"> <span></span> Jobseeking </a>
											</li>
										</ol>
										<div class="padb20">
											<div class="line"></div>
										</div>
										<div class="column_m"> <a href="#" target="_blank" class="contractor_btn"><span></span>View More</a> </div>
										
										<div class="clear"></div>
									</div>
								</li>
							</ul>
						</li>
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-cog black_txt"></span></a>
						</li>
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-bell-o black_txt"></span></a>
						</li>
						<li>
							<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-qrcode black_txt"></span></a>
							<ul>
								<li>
									<div class="top_arrow"></div>
								</li>
								<li>
									<div class="setting_menu pad15">
										<div class="fsz13">Sign in as</div>
										<ol class="">
											<li><a href="javascript:void(0);"><?php echo $company['company_name']; ?></a>
											</li>
											<li>
												<div class="line martb10"></div>
											</li>
											<li>
												<div class="line marb10"></div>
											</li>
											<li><a href="<?php echo $path; ?>userlogout.php?action=logout">Logout</a>
											</li>
										</ol>
										<div class="clear"></div>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<div class="visible-xs visible-sm fright brdr brdwi_3"> <a href="zoho_hr_portal7_subscription.html" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Erbjudande</a> </div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
		