   <body class="white_bg">
      <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/Dependents/dependentList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
      <div class="column_m header xs-hei_55p  bs_bb  xs-white_bg visible-xs">
         <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10  xs-white_bg">
            <div class="visible-xs visible-sm fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu  fsz14">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.safeqloud.com/user/index.php/Dependents/dependentList" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="clear"></div>
      <div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();">
         <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
            <!-- Center content -->
            <div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40 xs-mart0 xs-pad0">
               <div class="padb20 xxs-padb0 ">
                  <h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn ffamily_avenir" >Dependent</h1>
               </div>
               <div class="mart20 xs-marb20 marb35  xxs-talc talc ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Write down the passport details of the person to whom you act as dependent for.</a></div>
               <!-- Center content -->
               <form action="../updatePassport/<?php echo $data['did']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
                  <div class="marb0 padtrl0">
                     <div class="marb25  mart25">
                        <div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
                           <div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
                              <input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
                              <div class="imgwrap nobrd ">
                                 <div class="cropped_image  grey_brd5 " style="background-image: <?php echo $value_a; ?>;" id="image-data" name="image-data"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="marb25  ">
                        <div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
                           <div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
                              <input type="hidden" name="image-data3" id="image-data3" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
                              <div class="imgwrap nobrd ">
                                 <div class="cropped_image  grey_brd5 " style="background-image: <?php echo $value_b; ?>;" id="image-data2" name="image-data2"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="on_clmn mart10 xxs-mart10">
                        <div class="thr_clmn  wi_50 padr10"  >
                           <div class="pos_rel">
                              <div class="wi_100  bs_bb padrl5 padb10 ">
                                 <div class="wi_100 dflex alit_c">
                                    <label class="forword ">
                                    Front Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="thr_clmn  wi_50 padr10"  >
                           <div class="pos_rel">
                              <div class="wi_100  bs_bb padrl5 padb10 ">
                                 <div class="wi_100 dflex alit_c">
                                    <label class="forword ">
                                    Back Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL2(this);">
                                    </label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="clear"></div>
                     <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                        <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                           <!--<div class="clear hidden-xs"></div>-->
                           <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                              <div class="fleft wi_100  xs-mar0 xs-padt10">
                                 <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Passport</span>
                                 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please enter passport number?</span> 
                              </div>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
                     <div class="on_clmn ">
                        <div class="pos_rel">
                           <input type="text" name="id_number" id="id_number" placeholder="Passport number"  class=" default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt ">
                        </div>
                     </div>
                     <div class="clear"></div>
                     <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                        <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                           <!--<div class="clear hidden-xs"></div>-->
                           <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                              <div class="fleft wi_100  xs-mar0 xs-padt10">
                                 <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Issue date</span>
                                 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please select issue date for passport</span> 
                              </div>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
                     <div class="on_clmn mart20 ">
                        <div class="thr_clmn  wi_30 "  >
                           <div class="pos_rel">
                              <select id="issue_year" name="issue_year" class=" default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt" onchange='updateMonth(this.value);' >
                                 <?php for($i=date('Y'); $i>=(date('Y')-12);$i--) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="thr_clmn wi_70 padl20">
                           <div class="pos_rel">
                              <select id="issue_month" name="issue_month" class=" default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"  >
                                 <?php for($i=1; $i<=date('m');$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="clear"></div>
                     <div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
                        <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
                           <!--<div class="clear hidden-xs"></div>-->
                           <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
                              <div class="fleft wi_100  xs-mar0 xs-padt10">
                                 <span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">Expiry date</span>
                                 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt hidden-xs ">Please select expiry date for passport</span> 
                              </div>
                           </div>
                           <div class="clear"></div>
                        </div>
                     </div>
                     <div class="on_clmn ">
                        <div class="thr_clmn  wi_50 "  >
                           <div class="pos_rel">
                              <select id="expiry_year" name="expiry_year" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"  onchange='updateExpiryMonth(this.value);'>
                                 <?php for($i=date('Y'); $i<=(date('Y')+12);$i++) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                        <div class="thr_clmn wi_50 padl20">
                           <div class="pos_rel">
                              <select id="expiry_month" name="expiry_month" class="default_view wi_100 mart0  trans_bg      fsz18  minhei_65p xxs-minhei_60p   trans_bg tall padl0 ffamily_avenir black_txt"  >
                                 <?php for($i=date('m'); $i<=12;$i--) { ?>
                                 <option value="<?php echo $i; ?>" class="lgtgrey2_bg" ><?php echo $i; ?></option>
                                 <?php } ?>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div id="error_msg_form" class="red_txt fsz20 ffamily_avenir"></div>
                     <div class="clear"></div>
                     <div class="talc padtb20  mart35"> 
                        <button type="button" name="Next" class="forword minhei_55p fsz18 t_67cff7_bg ffamily_avenir" onclick="sendInformation();">Next</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div id="popup_fade" class="opa0 opa55_a black_bg"></div>
      </div>
     
   </body>
