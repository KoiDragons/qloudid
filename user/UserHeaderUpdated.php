<?php $path1 = $path."html/usercontent/images/"; ?>
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

</script>
<div class="column_m header xs-header bs_bb lgtblue2_bg">
		<div class="wi_100 hei_65p   padtb5 padrl10 lgtblue2_bg">
			
			<div class="logo wi_140p xs-wi_80p xxxs-wi_140p">
				<a href="https://www.qloudid.com/user/index.php/NewsfeedDetail"> <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10 ffamily_avenir" >Qloud ID</h3> </a>
			</div>
			<div class="visible-xs visible-sm fleft">
							<div class="flag_top_menu flefti  padb10 padt5 xxxs-padt20 xm-padt10" style="width: 50px;">
							<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
								
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									<ul class="popupShow" style="display: none;">
										<li class="first">
											<div class="top_arrow"></div>
										</li>
										<li class="last">
											<div class="emailupdate_menu padtb15">
												<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
												<ol>
													<li class="fsz14 first">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Svenska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Engelska </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">  Tyska  </a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/french.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Franska</a> </div>
													</li>
													<li>
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/spanish.png" width="28" height="28" alt="email" title="email"></a></div>
														<div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt">   Spanska  </a> </div>
													</li>
													<li class="last">
														<div class="user_pic padt5"><a href="javascript:void(0);"><img src="<?php echo $path;?>html/usercontent/images/slide/italian.png" width="28" height="28" alt="email" title="email"></a></div>
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
			<div class="hidden-xs hidden-sm fleft padl10 padr10 ">
			<div class="flag_top_menu flefti padt10 padb10 hidden-xs" style="width: 50px; ">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">
					
					<li class="hidden-xs" style="margin: 0 30px 0 0;">
						<a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30"><i class="fas fa-globe" onclick="togglePopup();"></i></a>
						<ul class="popupShow" style="display: none;">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last">
								<div class="emailupdate_menu padtb15">
								<div class="lgtgrey_txt fsz13 padrl15">Du har 6 språk att välja emellan</div>
									  <ol>
                  <li class="fsz14">
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="sv" onclick="changeLanguage(1);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="sv" onclick="changeLanguage(1);">  Svenska</a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" data-value="en" onclick="changeLanguage(0);"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email"></a></div>
                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt" data-value="en" onclick="changeLanguage(0);">  Engelska </a> </div>
                  </li>
                  <li>
                    <div class="user_pic padt5"><a href="javascript:void(0);" ><img src="<?php echo $path1;?>slide/flag_gm.png" width="28" height="28" alt="email" title="email"></a></div>
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
			<div class="search xs-search padtb5 hidden-xs ">
			<form action="https://www.qloudid.com/user/index.php/PrivateSearchResult" method="POST" id="save_indexingcs" name="save_indexingcs" accept-charset="ISO-8859-1">
      <div class="fleft">
        <input type="text" name="message" id="message" class="search_fld xs-search_fld  wi_537p xs-wi_200p brdrad5" style="height: 44px;">
      </div>
      <div class="fleft">
        
      </div>
	  </form>
    </div>
			<!--sf-js-enabled sf-arrows hidden-xs-->
			<div class="top_menu frighti padt20 padb10 hidden-xs">
				<ul class="menulist sf-menu  fsz14 ">
					<li class="hidden-xs">
						<a href="javascript:void(0);"><span class="black_txt pred_txt_h">+<?php echo substr($row_summary['first_name'],0,10); ?>...</span></a>
					</li>
					<li class="hidden-xs">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18 sf-with-ul"><span class="fa fa-envelope-o black_txt"></span></a>
						<ul style="display: none;">
							<li>
								<div class="top_arrow"></div>
							</li>
							 <li>
              <div class="emailupdate_menu padtb15">
                <div class="lgtgrey_txt fsz13 padrl15">Du har <span class="dark_grey_txt">(6)</span> nya meddelande</div>
                <ol>
                  <li>
                    <div class="user_pic"><a href="javascript:void(0);"><img src="<?php echo $path1;?>/slide/2.png" width="38" height="38" alt="email" title="email" style="border:2px solid #021a40;"></a></div>
                    <div class="mail_content"> <a href="javascript:void(0);"> <span class="mail_time"> Just nu</span> <span class="mail_sender "> <?php echo substr('Superadmin Agent 1',0,16)."..."; ?> </span> <span class="mail_subject">Nytt: Kom igång </span></a> </div>
                  </li>
                 </ol>
                <div class="talc clear all_notification"><a href="javascript:void(0);">Läs alla dina meddelanden</a></div>
                <div class="clear"></div>
              </div>
            </li>
						</ul>
					</li>
					<li class="hidden"><a href="javascript:void(0);" class="lgn_hight_s1 fsz18 sf-with-ul"><span class="fa fa-cog black_txt">5</span></a>
          <ul style="display: none;">
            <li class="hidden-xs">
              <div class="top_arrow"></div>
            </li>
         
          </ul>
        </li>
        <li class="hidden-xs"><a href="javascript:void(0);" class="lgn_hight_s1 fsz18 sf-with-ul"><span class="fa fa-bell-o black_txt">5</span></a>
          <ul style="display: none;">
            <li>
              <div class="top_arrow"></div>
            </li>
              <li class="hidden-xs">
              <div class="notification_menu padtb15">
                <div class="lgtgrey_txt fsz13 padrl15">Du har <span class="dark_grey_txt">(12)</span> nya notifikationer</div>
                <ol class="">
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                  <li><a href="javascript:void(0);"> <span class="fright notification_type">Bid now</span><span class="user_name">Lisa Wong</span><span class="notification_reason">Invitated you for a Bid</span> </a></li>
                </ol>
                <div class="talc clear all_notification"><a href="javascript:void(0);"> Läs alla notifikationer</a></div>
                <div class="clear"></div>
              </div>
            </li>
          </ul>
        </li>
       
					
					<li>
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz18 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
						<ul style="display: none;">
							<li>
								<div class="top_arrow"></div>
							</li>
							<li>
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Inloggad som</div>
									<ol class="">
									<li><a href="javascript:void(0);"><?php echo substr($row_summary['name'],0,10); ?></a>
										</li>
									<li>
                    <div class="line martb10"></div>
                  </li>
				<!--  <li>
											<a class="lang_selector trn" href="#" data-value="en" onclick="changeLanguage(0);">Translate to Engelsa</a>
											
            
										</li>
										<li>
											<a class="lang_selector trn" href="#" data-value="sv" onclick="changeLanguage(1);">Translate to Svenska</a>
										</li>
										<li>
											<a class="lang_selector trn" href="#" data-value="ty" onclick="changeLanguage(1);">Translate to Tyska</a>
										</li>
										<li>
											<a class="lang_selector trn" href="#" data-value="fr" onclick="changeLanguage(1);">Translate to Franska</a>
										</li>
										<li>
											<a class="lang_selector trn" href="#" data-value="sp" onclick="changeLanguage(1);">Translate to Spanska</a>
										</li>
										<li>
											<a class="lang_selector trn" href="#" data-value="it" onclick="changeLanguage(1);">Translate to Italienska</a>
										</li>-->
										
                  <li><a href="javascript:void(0);">Inställningar</a></li>
				  <li><a href="javascript:void(0);" class="show_popup_modal" data-target="#chagePassword">Ändra lösenord</a></li>
                  <li><a href="javascript:void(0);">Support</a></li>
                  <li><a href="javascript:void(0);">Policy</a></li>
                  
                  <li>
                    <div class="line marb10"></div>
                  </li>
										
										
										<li><a href="https://www.qloudid.com/user/index.php/UserLogout?action=logout" class="trn">Logga ut</a>
										</li>
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			<div class="visible-xs visible-xxs  fright marr10 padr10 brdr brdwi_3 xs-padt5"> <a href="#" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt">Close</a> </div>
			<div class="clear"></div>
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="chagePassword">
		<div class="modal-content pad25 nobrdb talc brdrad5">
			<div id="search_new_pass">
				<h2 class="marb10 pad0 bold fsz24 black_txt">Byt lösenord</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">Nedan kan du ändra ditt lösenord. Vi rekommenderar att du gör detta regelbundet.  </span>
						</div>
						
						
					</div>
				
				<form action="https://www.qloudid.com/user/index.php/ChangePassword/changePassword" method="POST" id="loginform1">
				<div class="padb10">
						
						<div class="pos_rel ">
					
					<input type="password" id="cpassword1" name="cpassword" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Nuvarande lösenord">
				</div>
				</div>
				<div class="padb10">
						
						<div class="pos_rel ">
				
					<input type="password" id="newpassword1" name="newpassword" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Nytt lösenord">
				</div>
				</div>
				<div class="padb0">
						
						<div class="pos_rel ">
				
					<input type="password" id="repassword1" name="repassword" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Skriv om nya lösenordet">
				</div>
				</div>
				<div class="mart20">
						<input type="button" value="Skapa" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="validateLogin1();">
						
						
					</div>
				<div class="mart10 talc">
					<a href="#">Avbryt</a>
					
				</div>
				</form>
			</div>
			
		</div>
	</div>
	