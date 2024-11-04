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
	$path1 = $path."html/usercontent/images/";
	//echo $companyDetail ['profile_pic']; die;
if($companyDetail ['profile_pic']!=null) { $filename="../estorecss/".$companyDetail ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$companyDetail ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../html/usercontent/images/default-profile-pic.jpg"; }

if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_p=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_p=str_replace('"','',$value_p); $value_p = base64_to_jpeg( $value_p, '../estorecss/tmp'.$row_summary['passport_image'].'.jpg' ); } else { $value_p="../html/usercontent/images/default-profile-pic.jpg"; } }  else $value_p="../html/usercontent/images/default-profile-pic.jpg";
 ?>

    <html>

    <head>
      <meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		 <script src="https://kit.fontawesome.com/119550d688.js"></script>
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
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
</script>
       
    </head>

    <body class="white_bg ffamily_avenir">

     <div class="column_m header hei_55p  bs_bb white_bg visible-xs"  >
				<div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg"  >
						 
				<div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/company/index.php/ReceivedChild/requestedApps/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>		
				
				  <div class="visible-xs visible-sm fright marr0 padt5 "> <a href="../../InviteVisitors/visitorsInformation/<?php echo $data['eid']; ?>" class=" diblock padl7 padr7 brdrad3 fsz30  "><i class="fas fa-plus " aria-hidden="true" style="color: #d9e7f0;"></i></a> </div> 
			 
				<div class="clear"></div>
			</div>
		</div>
		<div class="column_m header   bs_bb  hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/company/index.php/ReceivedChild/requestedApps/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			
            <div class="clear"></div>
         </div>
      </div>
	  <div class="clear"></div>

        <div class="column_m pos_rel">

            <!-- SUB-HEADER -->

            <!-- CONTENT -->
            <div class="column_m container zi5  mart40  xs-mart0" >
                <div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">

                  		<div class="wi_720p maxwi_100 pos_rel zi5 marrla pad10 padt0 mart0 xs-pad0">
 
												<div class="padb20 xxs-padb0 ">
												 
												
							<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 t_67cff7_bg  " onclick="checkFlag();">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 t_67cff7_bg  brdb_new tall xs-nobrdb">
                           <div class="wi_auto  hei_350p xs-hei_280p maxwi_100   pos_rel zi5 marrla padt100  xs-padt80   brdrad5  padrl30">
                              <div class="padb40 talc fsz45"><i class="fas fa-list white_txt" aria-hidden="true"></i></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 class="marb0  xxs-talc talc fsz50 xs-fsz35 xs-bold  padb10 white_txt trn ffamily_avenir">Visits</h1>
                              </div>
                              <div class="mart20 marb10  xxs-talc talc ffamily_avenir"> <a href="#" class="white_txt fsz20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir"> Here is a list on past and future visits.</a></div>
                           </div>
                        </div>
                     </div>					
							<div class="column_m   talc lgn_hight_22 fsz16 lgtgrey_bg  ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10   lgtgrey_bg    tall  ">
                           <div class="wi_auto  hei_65p maxwi_100   pos_rel zi5 marrla    brdrad5  padrl30">
                              <div class="martb15  xxs-talc talc ffamily_avenir"> <a href="../../InviteVisitors/visitorsInformation/<?php echo $data['eid']; ?>" class="black_txt fsz18 xs-fsz16  xxs-talc talc edit-text jain_drop_company trn ffamily_avenir">Add visit</a></div>
                           </div>
                        </div>
                     </div>		
							
						 
                            

                           <div class="column_m  fsz14 lgn_hight_22 dark_grey_txt mart20">
                                <div class="container ">
                                    

                                        <div class="tab-header mart10 padb10 xs-talc brdb_blue1 talc">
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10   tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah active ffamily_avenir" data-id="utab_Popular">Inbjudna av dig</a>
                                            <a href="#" class="dinlblck mar5 padrl30_a padrl10   tb_67cff7_bg_h tb_67cff7_bg_a brdrad40 t_67cff7_bg_a lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir" data-id="utab_Analytics">Besökt dig</a>
                                             
                                        </div>

                                        <div class="tab_container mart10">

                                            <!-- Popular -->
                                            <div class="tab_content active" id="utab_Popular" style="display: block;">
										 
										<div class="column_m container  marb20   fsz14 dark_grey_txt">						
												<?php  

													foreach($invitedVisitors as $category => $value) 
													{

													?>
                                                    <div class=" white_bg marb10  brdb bg_fffbcc_a  " style="">
                                                        <div class="container padrl10 padtb15 brdrad1 fsz14 dark_grey_txt">
                                                            <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

                                                                <!--<div class="clear hidden-xs"></div>-->

                                                                <div class="wi_100 xs-wi_100 xs-order_3 xs-padl0 fsz12">
                                                                    <div class="fleft wi_50p marl15">
                                                                       <div class="tdcalender" style="width:50px; height:50px;">
																		<div class="tdmonth"><?php echo date('M',strtotime($value['visiting_date'])); ?></div>
																		
																		<div class="padtb2 fsz25"><?php echo date('d',strtotime($value['visiting_date'])); ?></div>
																		<div class="fsz10 hidden"><?php echo date('Y',strtotime($value['visiting_date'])); ?></div>
																	</div>
                                                                    </div>

                                                                    <div class="fleft wi_50 xxs-wi_70 sm-wi_50 xsip-wi_50  marl15  "> <span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2 fsz14  "><?php echo $value['visitor_email']; ?></span>
                                                                        <a href="#" class="show_popup_modal black_txt"  ><span class="trn fsz18 black_txt"><?php echo  substr(html_entity_decode($value['first_name']).' '.html_entity_decode($value['last_name']),0,18); ?></span></a> </div>

                                                                    
                                                                    <div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl0 fsz30  xs-mar0 padb0 hidden-xs padt10">
                                                                      <a href="#" class="fsz30 red_txt"  > <span><i class="fas fa-window-close" aria-hidden="true"></i> </span></a>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <div class="clear"></div>
                                                        </div>

                                                    </div>

                                                    <?php } ?>
													
													 
                                                <div class="clear"></div>
                                            </div>
											</div>
                                            <!-- Advertising -->
                                            <div class="tab_content hide" id="utab_Analytics" style="display: none;">
                                                
                                            </div>

                                          
                                               </div>
                                    </div>
                                </div>

                            </div>

                            <div class="clear"></div>
                        </div>
                    </div>

                </div>
               
        <div class="clear"></div>
        <div class="hei_80p hidden-xs"></div>

        <!-- Edit news popup -->
        <div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
            <div class="modal-content pad25 brd nobrdb talc">
                <form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
                    <h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">TJÄNSTEN är en del av vårt premiuminnehåll</h3>
                    <div class="marb20">
                        <img src="<?php echo $path; ?>html/usercontent/images/gratis.png" class="maxwi_100 hei_auto" />
                    </div>
                    <h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
                    <span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
                    <div class="wi_75 dflex fxwrap_w marrla marb20 tall">
                        <div class="wi_50 marb10">
                            <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
                            <span class="valm">Hålla dig  uppdaterad inom arbetsrätt</span>
                        </div>
                        <!--<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
                        <div class="wi_50 marb10">
                            <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
                            <span class="valm">Använda smarta webblösningar</span>
                        </div>
                        <div class="wi_50 marb10">
                            <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
                            <span class="valm">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
                        </div>
                        <div class="wi_50 marb10">
                            <img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
                            <span class="valm">Utföra bakgrundskontroller på din personal eller nästa rekryt </span>
                        </div>
                        <!--<div class="wi_50 marb10">
					<img src="<?php echo $path; ?>html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Men nästa gång behovet dyker upp då finns allting färdigt.</span>
				</div>-->
                    </div>

                    <div class="marb10">
                        <input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Please provide your unique code here" />
                    </div>
                    <div>
                        <input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();" />
                        <input type="hidden" id="indexing_save_unique" name="indexing_save_unique">
                    </div>
                    <div class="marb10 padtb10 pos_rel">
                        <div class="wi_100 pos_abs zi1 pos_cenY brdt"></div>
                        <span class="diblock pos_rel zi2 padrl10 white_bg">
																		eller om du redan har en prenumeration
																	</span>
                    </div>
                    <div class="padb0">
                        <a href="#" class="diblock padrl15 brd brdclr_dblue brdrad50 white_bg blue_bg_h lgn_hight_30 dark_grey_txt white_txt_h">Logga in</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sales popup -->
        <div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
            <div class="modal-content pad25 brd nobrdb talc">
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
            <div class="modal-content pad25 brd nobrdb talc">
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

        <div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey2_bg fsz14 brdrad5 " id="gratis_popup_location">
            <div class="modal-content   nobrdb talc brdrad5 ">
                <div class="pad25 lgtgrey2_bg brdradtr10">
                    <img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
                </div>
                <h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Välj kontor</h2>

                <div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">

                    <div class="wi_100 marb0 talc">

                        <span class="valm fsz16 black_txt"> Välj det kontoret som personen är anställd hos. </span>
                    </div>

                </div>

                <form action="../inviteEmployeeLocation/<?php echo $data['cid']; ?>" method="POST" id="save_indexing_location" name="save_indexing_location">
                    <div class="on_clmn padb10 ">

                        <div class="on_clmn padrl20">

                            <div class="pos_rel padl0">

                                <select class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 white_bg brdrad5" name="location" id="location">

                                    <?php 
																				foreach($companyLocation as $category => $row_country)
																				{

																				?>
                                        <option value="<?php echo $row_country['enc']; ?>">
                                            <?php echo $row_country['visiting_address']; ?>
                                        </option>
                                        <?php } ?>
                                </select>

                            </div>

                        </div>
                    </div>
                </form>
                <div id="errPhone"></div>
                <div class="on_clmn mart10 padrl20 marb10  brdb_new ">
                    <input type="button" value="Submit" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="selectLocation();">

                </div>
                <div class="marb10">
                    <a href="#" class="marb10">Avbryt</a>
                </div>

            </div>
        </div>

        <div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup_company">
            <div class="modal-content pad25 brd">
                <h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
															Add Company
															<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
														</h3>
                <form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company" accept-charset="ISO-8859-1">

                    <div class="marb15 ">
                        <label for="new-organization-name" class="sr-only">Company Name</label>
                        <input type="text" id="company_name_add" name="company_name_add" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Name">
                    </div>

                    <div class="marb15 padt15">
                        <label for="new-organization-name" class="sr-only">Website</label>
                        <input type="text" id="company_website" name="company_website" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Website">
                    </div>

                    <div class="marb15 padt15">
                        <label for="new-organization-name" class="sr-only">Company Email</label>
                        <input type="text" id="company_email" name="company_email" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Email">
                    </div>

                    <div class="marb15 padt15">
                        <label for="new-organization-under" class="txt_0">Industry</label>
                        <select name="inds" id="inds" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica">

                            <option value="0">--Select--</option>
                            <?php  foreach($resultIndus as $category => $value) 
						{
							$category = htmlspecialchars($category); 
							echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
						}
					?>
                        </select>
                    </div>

                    <div class="marb15 padt15">
                        <label for="new-organization-under" class="txt_0">Country</label>
                        <select name="cntry" id="cntry" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica">

                            <option value="0">--Select--</option>
                            <?php  foreach($resultContry as $category => $value) 
						{
							$category = htmlspecialchars($category); 
							echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
						}
					?>
                        </select>
                    </div>

                    <div class="mart30 talr">
                        <button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
                        <input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="validateAddCompany();" />
                        <input type="hidden" name="indexing_save_company" id="indexing_save_company" />
                    </div>
                </form>
            </div>
        </div>

        <div class="popup_modal" id="gratis_popup_user_profile">

            <div id="search_user_profile">

            </div>

        </div>

        <div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_error">
            <div class="modal-content pad25  nobrdb talc brdrad5">

                <h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
                <span></span>
                <div class="wi_100 dflex fxwrap_w marrla marb20 tall">

                    <div class="wi_100 marb10 talc">

                        <span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
                    </div>

                </div>

                <div class="pad15 lgtgrey2_bg">

                    <div id="search_user">
                        <h3 class="pos_rel pad15  bold fsz20 dark_grey_txt">
																				You are not authorized to remove/disconnect owner of the company.

																			</h3>

                    </div>

                </div>

                <div class="mart20">
                    <input type="button" value="Close" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                </div>
            </div>
        </div>

        <div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect">
            <div class="modal-content pad25  nobrdb talc brdrad5">

                <h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
                <span></span>
                <div class="wi_100 dflex fxwrap_w marrla marb20 tall">

                    <div class="wi_100 marb10 talc">

                        <span class="valm fsz16">Are you sure that you want to disconnect?</span>
                    </div>

                </div>

                <form action="../disconnectEmployee/<?php echo $data['cid']; ?>" method="POST">

                    <input type="hidden" id="uid" name="uid" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">

                    <div class="mart20">
                        <input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                    </div>

                    <div class="mart20">
                        <input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                    </div>
                </form>
            </div>
        </div>

        <div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect_supplier">
            <div class="modal-content pad25  nobrdb talc brdrad5">

                <h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
                <span></span>
                <div class="wi_100 dflex fxwrap_w marrla marb20 tall">

                    <div class="wi_100 marb10 talc">

                        <span class="valm fsz16">Are you sure that you want to disconnect?</span>
                    </div>

                </div>

                <form action="../disconnectSupplier/<?php echo $data['cid']; ?>" method="POST">

                    <input type="hidden" id="uids" name="uids" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">

                    <div class="mart20">
                        <input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                    </div>

                    <div class="mart20">
                        <input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">

                    </div>
                </form>
            </div>
        </div>

        <!-- Slide fade -->
        <div id="slide_fade"></div>

        <!-- Menu list fade -->
      <a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     
    </body>

    </html>