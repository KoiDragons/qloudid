<?php $path1 = $path."html/usercontent/images/"; ?>
<script>
function submitFormCom()
{
	
	$("#save_indexingcs").submit();
}

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
  <div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs" id="headerData">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="logo  marr15 wi_140p xs-wi_80p hidden-xs hidden-sm visible-xxs">
                    <a href="https://www.qloudid.com">
                        <h3 class="marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt5 black_txt padt10 padb10 ffamily_avenir">Qloud ID</h3> </a>
                </div>
                <div class="visible-xs visible-sm fleft padrl0">
                    <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                        <ul class="menulist sf-menu  fsz14">

                            <li class="first last" style="margin: 0 30px 0 0;">
                                <a href="https://www.safeqloud.com/company/index.php/Brand/employeeAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-bars" aria-hidden="true"></i></a>
                                 </li>

                        </ul>
                    </div>

                </div>

                
               
                <div class="clear"></div>

            </div>
        </div>

        <div class="column_m header xs-header bs_bb lgtgrey2_bg hidden-xs">
            <div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey2_bg">

                <div class="fleft  logo marr15 wi_40p">
                    <a href="https://www.safeqloud.com/user/index.php/NewsfeedDetail">
                        <h3 class="brdr_new marb0 pad0 fsz27 xs-fsz16 xs-bold xs-padt10 black_txt padt10 padb10 ffamily_avenir" >HQ</h3> </a>
                </div>
                <div class="visible-xs visible-sm fleft">
                    <div class="flag_top_menu flefti  padb10 padt5 xxxs-padt20 xs-padt10" style="width: 50px;">
                        <ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows">

                            <li class="first last" style="margin: 0 30px 0 0;">
                               <a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz30" ><i class="fas fa-globe" onclick="togglePopup();"></i></a>
									
                                   </li>

                        </ul>
                    </div>

                </div>
                <div class="hidden-xs hidden-sm fleft padl20 padr10 ">
                    <div class="flag_top_menu flefti padt20 padb10 hidden-xs" style="width: 50px; ">
                        <ul class="menulist sf-menu  fsz14">

                            <li class="hidden-xs first last" style="margin: 0 30px 0 0;">
                                <a href="javascript:void(0);" class="lgn_hight_s1 padl10 fsz18 sf-with-ul"><img src="<?php echo $path1;?>slide/flag_sw.png" width="24" height="16" alt="email" title="email" onclick="togglePopup();"></a>
                                <ul class="popupShow" style="display: none;">
                                    <li class="first">
                                        <div class="top_arrow"></div>
                                    </li>
                                    <li class="last">
                                        <div class="emailupdate_menu padtb15">
                                            <div class="lgtgrey_txt fsz13 padrl15 ffamily_avenir">Du har 6 språk att välja emellan</div>
                                            <ol>
                                                <li class="fsz14 first">
                                                    <div class="user_pic padt5">
                                                        <a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_sw.png" width="28" height="28" alt="email" title="email" data-value="sv" class="lang_selector ffamily_avenir" onclick="togglePopup();"></a>
                                                    </div>
                                                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 ffamily_avenir black_txt lang_selector" data-value="sv" onclick="togglePopup();">  Svenska</a> </div>
                                                </li>
                                                <li>
                                                    <div class="user_pic padt5">
                                                        <a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/flag_us.png" width="28" height="28" alt="email" title="email" data-value="en" class="lang_selector ffamily_avenir" onclick="togglePopup();"></a>
                                                    </div>
                                                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 ffamily_avenir black_txt lang_selector" data-value="en" onclick="togglePopup();">  Engelska </a> </div>
                                                </li>
                                                <li>
                                                    <div class="user_pic padt5">
                                                        <a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/germanf.png" width="28" height="28" alt="email" title="email" data-value="de" class="lang_selector" onclick="togglePopup();"></a>
                                                    </div>
                                                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 black_txt lang_selector ffamily_avenir" data-value="de" onclick="togglePopup();">  German </a> </div>
                                                </li>

                                                <li>
                                                    <div class="user_pic padt5">
                                                        <a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/french.png" width="28" height="28" alt="email" title="email"></a>
                                                    </div>
                                                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 ffamily_avenir black_txt">   Franska</a> </div>
                                                </li>
                                                <li>
                                                    <div class="user_pic padt5">
                                                        <a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/spanish.png" width="28" height="28" alt="email" title="email"></a>
                                                    </div>
                                                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 ffamily_avenir black_txt">   Spanska  </a> </div>
                                                </li>
                                                <li class="last">
                                                    <div class="user_pic padt5">
                                                        <a href="javascript:void(0);"><img src="<?php echo $path1;?>slide/italian.png" width="28" height="28" alt="email" title="email"></a>
                                                    </div>
                                                    <div class="mail_content padt10 "> <a href="javascript:void(0);" class="fsz14 ffamily_avenir black_txt">   Italienska </a> </div>
                                                </li>
                                            </ol>

                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="fright xs-dnone visible_si padt10">
                    <ul class="mar0 pad0">

                        <li class="dblock hidden-xs visible_si fright pos_rel brdl "> <a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase ffamily_avenir lgn_hight_30 black_txt white_txt_h" data-en="Stäng sidan" data-sw="Stäng sidan">Stäng sidan</a> </li>
						
						<li class="dblock hidden-xs visible_si fright pos_rel  "> <a href="https://www.safeqloud.com/company/index.php/EmployeeDetail/employeeAtendence/<?php echo $data['cid']; ?>" id="usermenu_singin" class="translate hei_30pi dblock padrl25 blue_bg_h uppercase lgn_hight_30 black_txt white_txt_h fsz20" ><i class="far fa-clock"></i></a> </li>
                    </ul>
                </div>
                <!--sf-js-enabled sf-arrows hidden-xs-->
                <div class="top_menu frighti padt15 padb20 hidden">
                    <ul class="menulist sf-menu  fsz14 ">

                        <li>
                            <a href="javascript:void(0);" class="lgn_hight_s1 fsz24 sf-with-ul"><span class="fa fa-qrcode black_txt"></span></a>
                        </li>

                    </ul>
                </div>
                <div class="visible-xs visible-xxs fright marr0 xs-padt5 "> <a href="https://www.safeqloud.com/company/index.php/CompanySuppliers/companyAccount/<?php echo $data['cid']; ?>" class="diblock padrl20 brdrad3 pred2_bg lgn_hight_29 fsz14 black_txt ffamily_avenir">Close</a> </div>
                <div class="clear"></div>
            </div>
        </div>

	<div class="clear" id=""></div>
	
		