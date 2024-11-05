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
                        <a href="listPeople" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
                        <a href="listPeople" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
                                       <div class="pad20 wi_100 hei_180p xs-hei_50p talc  fsz40 xs-fsz20 brdrad1000 yellow_bg_a box_shadow  black_txt" style="
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
                                             <div class="padt20 fsz30"> <span>Corona</span>  </div>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="clear"></div>
                              </div>
                           </div>
                           <ul class="marr20 pad0">
                              <li class=" dblock padr10  padl8 fsz16 ">
                                 <a href="groupInfo" class=" lgtgrey_bg hei_35p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey   brdclr_pblue2_a   pblue2_bg_a black_txt panlyellow_bg_h  black_txt_a" >
                                    <span class="valm trn">Add group</span>
                                    <div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
                                 </a>
                              </li>
                           </ul>
                           <ul class="dblock marr20  padl10 fsz16">
                              <li class="dblock padrb10">
                                 <a href="#" class="hei_26p dflex alit_c padb10  pos_rel padr10 brdb_blue brdclr_seggreen_47E2A1 black_txt  padb10">
                                    <span class="valm trn" style="letter-spacing: 2px;">Groups</span> 
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
                              <div class="padb40 talc fsz45"><i class="far fa-list-alt txt_07794a"></i></div>
                              <div class="padb0 xxs-padb0 ">
                                 <p class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 txt_07794a trn ffamily_avenir">Groups</p>
                              </div>
                              <div class="mart20 marb10  xxs-talc talc ffamily_avenir txt_07794a fsz20 ffamily_avenir">List of groups to join. </div>
                           </div>
                        </div>
                     </div>
                     <div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  " >
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
                           <div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
                              <div class="martb15  xxs-talc talc ffamily_avenir"> Groups Info</div>
                           </div>
                        </div>
                     </div>
                     <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt   mart20">
                        <div class="container ">
                           <div class="">
                               <div class="bgcolor-light wi_100 fright talr marb20 visible-xs">
								<div class="xs-wi_100 dflex ">
									<div class="expanding-input wi_120p hei_40p dinlblck flex_1 pos_rel marr3 valm">
										<div class="expanding-input-wrap wi_100  xs-wi_100_a hei_50p bs_bb pos_abs top0 right0  brdrad3 lgtgrey_bg trans_all3 active" value="0">
											<div class="hide-when-active wi_100 pos_abs top0 left0 lgn_hight_50 talc black_txt"> <span class="fa fa-search fsz18i clr-light ffamily_avenir"></span> <span>Sok</span> </div>
											<input type="text" id="searche" name="searche" placeholder="Search" class="wi_100  xxs-hei_60p hei_50p pos_abs top0 left0 bs_bb padrl45 nobrd brdb_67cff7 dblue_txt fsz14 lgtblue_bg talc"> <span class="fa fa-search show-when-active pos_abs top0 left0 padl10 lgn_hight_50 fsz18i dblue_txt"></span>
											<a href="#" class="deactivate show-when-active pos_abs top0 right0 padr10 red_txt"> <span class="fa fa-close fleft lgn_hight_50 fsz18i hidden"></span> </a>
										</div>
										
									</div>
									
									
									
									
									
									 </div>
								<div class="clear marb10"></div>
								<div class="filter_crumbs filter_crumbs_1 fsz13_333 hidden"> <a href="#" class="clear_filters clr-default">Clear filters</a> </div>
								
								
							</div>
                             
                              <div class="tab_container mart10">
                                 <!-- Popular -->
                                 <div id="peopleData">
                                    <?php $i=0;
                                       foreach($viewGroupList as $category => $value) 
                                       {
                                       	
                                       	
                                       ?> 
                                    
                                       <div class=" white_bg   brdb  " >
                                          <div class="container padb20 padt15    brdrad1 fsz18 dark_grey_txt">
                                             <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                                                
                                                <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
				 								
												 
                                                   <div class="fleft wi_50"> 
                                                      <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14 padb0  ffamily_avenir"><?php if($value['group_type']==1) echo 'Open'; else echo 'Close'; ?></span>
                                                      <span class="trn fsz18  black_txt ffamily_avenir  "><?php echo $value['group_name']; ?></span>  
                                                   </div>
												   <?php if($value['is_member']==0) { ?>
												    <div class=" fright wi_10 padl0 xs-wi_30   marr30 fsz40  xs-marl0 xxs-marr60 padb0">
																				<a href="joinGroup/<?php echo $value['enc']; ?>"><button type="button" name="Activate" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bg" >Join</button></a>
																			</div>
												   <?php } else if($value['is_member']==1 && $value['is_approved']==1) { ?>
												   <a href="groupStatistics/<?php echo $value['enc']; ?>"> <div class="fright wi_10 padl0 xs-wi_30  marl15 fsz40  xs-marl0 xxs-marr20 padb0  ">
                                                      <span class="fas fa-arrow-alt-circle-right seggreen_47E2A1_txt"></span>
                                                   </div></a>
												   <?php } else if($value['is_member']==1 && $value['is_approved']==0) { ?>
												   <div class=" fright wi_10 padl0 xs-wi_30   marr50 fsz40  xs-marl0 xxs-marr80 padb0">
																				<button type="button" name="Activate" class="forword2 minhei_45p blue_67cff7_brd2 ffamily_avenir black_txt trans_bg" >Pending</button>
																			</div>
												   <?php } ?>
                                                    
                                                </div>
                                             </div>
                                             <div class="clear"></div>
                                          </div>
                                       </div>
                                    
                                    <?php } ?>
                                 </div>
                                 <div class="clear"></div>
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