<!doctype html>
<?php
   $path1 = "../../html/usercontent/images/";
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
      <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
      <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
      <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
      <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
      <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
      <!-- Scripts -->
      <script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
      <script>
         
         function closePop()
         {
         document.getElementById("popup_fade").style.display='none';
         $("#popup_fade").removeClass('active');
         document.getElementById("person_informed").style.display='none';
         $(".person_informed").removeClass('active');
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
         	 
         	var currentLang = 'sv';
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
                        <a href="../listGroups" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>

 <div class="column_m header hei_55p  bs_bb white_bg visible-xs">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../listGroups" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm fright marr0 padt5 "> <a href="groupInfo" class=" diblock padl7 padr7 brdrad3 fsz30 seggreen_47E2A1_txt"><i class="fas fa-plus " aria-hidden="true"></i></a> </div>
            <div class="clear"></div>
         </div>
      </div>	  
      <div class="clear" id=""></div>
      <div class="column_m pos_rel">
         <!-- CONTENT -->
         <div class="column_m container zi5  mart40 xs-mart0" onclick="checkFlag();" id="loginBank">
            <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0  ">
               <div class="wi_240p fleft pos_rel zi50">
                  <div class="padrl10">
                     <!-- Scroll menu -->
                     <div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
                        <div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
                           <div class="column_m padb10 ">
                              <div class="padl10">
                                 <div class="sidebar_prdt_bx marr20 brdb padb20">
                                    <div class="white_bg tall">
                                       <!-- Logo -->
                                       <div class="padtb20 padrl10 wi_100 hei_240p xs-hei_50p talc  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
                                          background-repeat: no-repeat;
                                          background-position: 50%;
                                          border-radius: 2%;
                                          ">
                                          <span class="fa-stack ">
                                          <i class="far fa-circle fa-stack-2x bgclr_seggreen_47E2A1 seggreen_47E2A1_txt" aria-hidden="true"></i>
                                          <i class="white_txt fab fa-airbnb fa-stack-1x" aria-hidden="true"></i>
                                          </span>
                                          <a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
                                             <!-- Meta -->
                                             <div class="padt20 fsz20"> <span><?php echo $viewGroupDetail['group_name']; ?></span>  </div>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                           </div>
                           <ul class="marr20 pad0">
                              <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="#" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   brdclr_pblue2_a   pblue2_bg_a black_txt panlyellow_bg_h  black_txt_a" >
                                    <span class="valm trn">Invite member</span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
                                 </a>
                              </li>
                           </ul>
                           <ul class="dblock marr20  padl10 fsz16">
                              <li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb_blue brdclr_seggreen_47E2A1 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Statistik</span> 
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
                                 </a>
                              </li>
                                <li class="dblock padrb10 padt5">
                                 <a href="https://www.qmatchup.com/beta/user/index.php/ManageApproved/approveTemplate/NFhMd2p3OXlFSFk5SXd3U1hQbEZoQT09" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt" target="_blank">
                                    <span class="valm trn" style="letter-spacing: 2px;">Spread the word</span> 
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
                  <div class="padb20 xxs-padb0 ">
                     <!-- Charts -->
                     <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 bgclr_seggreen_47E2A1  " onclick="checkFlag();">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 bgclr_seggreen_47E2A1  brdb_new tall xs-nobrdb">
                           <div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  padrl30">
                              <div class="padb40 marb25 talc fsz75 xxs-fsz60 black_txt"><?php echo $totalAssigenmentCompleted['num']; ?></div>
                              <div class="padb0 xxs-padb0 ">
                                 <p class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 black_txt trn ffamily_avenir">Completed</p>
                              </div>
                              <div class="mart20 marb10  xxs-talc talc ffamily_avenir black_txt fsz20 ffamily_avenir">Total number of deliveries made by our members.</div>
                           </div>
                        </div>
                     </div>
                     <div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  " >
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
                           <div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
                              <div class="martb15  xxs-talc talc ffamily_avenir">11 000 member  | <a href="<?php if($viewGroupDetail['link_name']==null || $viewGroupDetail['link_name']=='') echo '#'; else echo $viewGroupDetail['link_name']; ?>" target="_blank"> Visit group page </a></div>
							
                           </div>
                        </div>
                     </div>
                     <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt   mart20">
                        <div class="container ">
                           <div class="">
                            <table class="wi_100 padb0 " cellpadding="0" cellspacing="0" >
                                 <thead class="fsz16" >
                                    <tr class="white_bg ffamily_avenir">
                                       <th class="pad5 brdb_new brdclr_seggreen_47E2A1 nobold  tall" >
                                          <div class="padtb5 black_txt">Grab an assigment</div>
                                       </th>
                                    </tr>
                                 </thead>
                              </table>   
                              <div class="tab_container mart10">
                                 <!-- Popular -->
                                 <div id="peopleData">
                                   <?php $i=0;
                                       foreach($peopleAssigenmentCompleted as $category => $value) 
                                       {
                                       	
                                       	
                                       ?> 
                                    
                                       <div class=" white_bg   brdb  " style="">
                                          <div class="container padb20 padt15    brdrad1 fsz18 dark_grey_txt">
                                             <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                                                <!--<div class="clear hidden-xs"></div>-->
                                                <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
				 								
												
                                                   <div class="fleft wi_10 xxs-wi_15 sm-wi_10 xsip-wi_10 xxs-marr15">
												   <div class="wi_50p xs-wi_100 hei_50p xs-hei_45p newgrey_bg talc valm padt10" style="border-radius: 10%;"><span class="white_txt fsz30 valm talc" height="45px" width="45px"><i class="xxs-fab fabBox fa-stack-1x  bold padt5 xs-padt0 <?php if($value['severity']==1) echo 'red_ff2828_txt fas fa-thermometer-full'; else if($value['severity']==2) echo 'yellow_txt fas fa-thermometer-half'; else echo 'blue_67cff7 fas fa-thermometer-quarter'; ?>" aria-hidden="true"   ></i></span> </div>
                                                      
                                                   </div>
                                                   <div class="fleft wi_75 xxs-wi_75    "> 
                                                      <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir">Uppdrag</span>
                                                      <span class="trn fsz18  black_txt ffamily_avenir  "><?php echo $value['name'].' | '.$value['address'].' '.$value['port_number']; ?></span>  
                                                   </div>
                                                    
                                                </div>
                                             </div>
                                             <div class="clear"></div>
                                          </div>
                                       </div>
                                    
                                    <?php } ?> 
									   
                                 </div>
                                 <div class="clear"></div>
								 <?php if($totalAssigenmentCompleted['num']>20) { ?>
								 <div class="padt20 padb10 talc ">
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt    trn xxs-brd_width " value="1" onclick="add_more_all(this);">Visa fler</a>
										
									</div>
								 <?php } ?>
									
										<script>
									function add_more_all(link) {
										 
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										//send_data.message=id;
										$.ajax({
											type:"POST",
											url:"../moreAssigenments/<?php echo $data['gid']; ?>",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												//alert(data1);
												var $tbody = $("#peopleData"),
												html=html1;
												//$tbody.html('');
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
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
               </div>
            </div>
            <div class="clear"></div>
         </div>
         <div id="popup_fade" class="opa0 opa55_a black_bg"></div>
      </div>
      <div id="slide_fade"></div>
      <a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
      <script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
      <script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
      <script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
      <script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
      <script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
   </body>
</html>