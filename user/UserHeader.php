<?php $path1 = $path."html/usercontent/images/"; ?>
<script>
function submitFormCom()
{
	
	$("#save_indexingcs").submit();
}
</script>
<div class="column_m header header_small bs_bb bg_colorn_new">
		<div class="wi_100 hei_40p xs-pos_fix padtb5 padrl10 bg_colorn_new">
			<div class="visible-xs visible-sm fleft">
				<a href="#" class="class-toggler dblock bs_bb talc fsz30 dark_grey_txt " data-target="#scroll_menu" data-classes="hidden-xs hidden-sm" data-toggle-type="separate"> <span class="fa fa-bars dblock"></span> </a>
			</div>
			<div class="logo hidden-xs hidden-sm marr15">
				<a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail"> <img src="<?php echo $path;?>html/usercontent/images/qmatchup_logo_blue2.png" alt="Qmatchup" title="Qmatchup" class="valb" /> </a>
			</div>
			<div class="hidden-xs hidden-sm fleft padl10 padr30">
				<div class="languages">
					<a href="#" id="language_selector" class="padrl10 white_txt"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" /></a>
					<ul class="wi_100 mar0 pad5 blue_bg">
						<li class="dblock">
							<a href="#" class="pad5" data-lang="eng"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="US" alt="US" />
							</a>
						</li>
						<li class="dblock">
							<a href="#" class="pad5" data-lang="swd"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="24" height="16" title="Sweden" alt="Sweden" />
							</a>
						</li>
					</ul>
				</div>
			</div>
		<div class="search padt1 hidden-xs" style="height:28px;">
			<form action="https://www.safeqloud.com/user/index.php/PrivateSearchResult" method="POST" id="save_indexingcs" name="save_indexingcs" accept-charset="ISO-8859-1">
      <div class="fleft">
        <input type="text" name="message" id="message" class="search_fld hi_wi385" style="height:26px;">
      </div>
      <div class="fleft">
        <input type="button" value="" class="search_btn hi26" style="height:26px;" onclick="submitFormCom();">
      </div>
	  </form>
    </div>
			
			<div class="top_menu frighti padt5 hidden-xs">
				<ul class="menulist sf-menu">
					<li class="hidden-xs">
						<a href="javascript:void(0);" ><span class="white_txt pred_txt_h">+<?php echo $row_summary['first_name']; ?>...</span></a>
					</li>
					<li class="hidden-xs">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-envelope-o white_txt"></span></a>
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
									<div class="column_m"> <a href="#" target="_blank" class="contractor_btn "><span ></span><div class="trn">View More</div></a> </div>
			
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
					<li class="hidden-xs"><a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-cog white_txt">5</span></a>
          <ul>
            <li class="hidden-xs">
              <div class="top_arrow"></div>
            </li>
            <li class="hidden-xs">
              <div class="notification_menu padtb15">
                <div class="lgtgrey_txt fsz13 padrl15">You have <span class="dark_grey_txt">(12)</span> new Notifications</div>
                <ol class="">
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                </ol>
                <div class="talc clear all_notification"><a href="javascript:void(0);">View all notifications</a></div>
                <div class="clear"></div>
              </div>
            </li>
          </ul>
        </li>
        <li class="hidden-xs"><a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-bell-o white_txt">5</span></a>
          <ul>
            <li>
              <div class="top_arrow"></div>
            </li>
            <li>
              <div class="emailupdate_menu padtb15">
                <div class="lgtgrey_txt fsz13 padrl15">You have <span class="dark_grey_txt">(6)</span> new mails</div>
                <ol>
                  <li>
                    <div class="user_pic"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>email_user_mini_pic1.jpg" width="38" height="38" alt="email" title="email"></a></div>
                    <div class="mail_content"> <a href="javascript:void(0);"> <span class="mail_time">Just Now</span> <span class="mail_sender"> Lisa Wong </span> <span class="mail_subject">Re : Request for Invoice </span></a> </div>
                  </li>
                  <li>
                    <div class="user_pic"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>email_user_mini_default.jpg" width="38" height="38" alt="email" title="email"></a></div>
                    <div class="mail_content"> <a href="javascript:void(0);"> <span class="mail_time">2:03 am</span> <span class="mail_sender"> Lisa Wong </span> <span class="mail_subject">Re : Request for Invoice </span></a> </div>
                  </li>
                  <li>
                    <div class="user_pic"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>email_user_mini_pic1.jpg" width="38" height="38" alt="email" title="email"></a></div>
                    <div class="mail_content"> <a href="javascript:void(0);"> <span class="mail_time">5:23 am</span> <span class="mail_sender"> Lisa Wong </span> <span class="mail_subject">Re : Request for Invoice </span></a> </div>
                  </li>
                  <li>
                    <div class="user_pic"><a href="javascript:void(0);"><img src="<?php echo $path1; ?>email_user_mini_pic2.jpg" width="38" height="38" alt="email" title="email"></a></div>
                    <div class="mail_content"> <a href="javascript:void(0);"> <span class="mail_time">7:47 pm</span> <span class="mail_sender"> Lisa Wong </span> <span class="mail_subject">Re : Request for Invoice </span></a> </div>
                  </li>
                </ol>
                <div class="talc clear all_notification"><a href="javascript:void(0);">View all mails</a></div>
                <div class="clear"></div>
              </div>
            </li>
          </ul>
        </li>
       
					
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18"><span class="fa fa-qrcode white_txt"></span></a>
						<ul>
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Sign in as</div>
									<ol class="">
									<li><a href="javascript:void(0);"><?php echo $row_summary['name']; ?></a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				  <li>
											<a class="lang_selector trn" href="#" data-value="en">Translate to English</a>
											
            
										</li>
										<li>
											<a class="lang_selector trn" href="#" data-value="sv">Translate to Swedish</a>
										</li>
                  <li><a href="javascript:void(0);">Setting</a></li>
                  <li><a href="javascript:void(0);">FAQs</a></li>
                  <li><a href="javascript:void(0);">Policies</a></li>
                  <li><a href="javascript:void(0);">Report Problem</a></li>
                  <li>
                    <div class="line marb10"></div>
                  </li>
										
										
										<li><a href="https://www.safeqloud.com/user/index.php/UserLogout?action=logout" class="trn">Logout</a>
										</li>
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="visible-xs visible-sm fright marr10 padr10 brdr brdwi_3"> <a href="zoho_hr_portal7_subscription.html" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 white_txt">Erbjudande</a> </div>
			<div class="clear"></div>
		</div>
	</div>
	