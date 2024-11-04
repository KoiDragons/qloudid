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
} ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Qmatchup</title>
	<!-- Styles -->
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
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
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

	<!-- Scripts -->
	<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/jquery.js"></script>
	
	<script>
		var currentLang = 'sv';
		
	function validateAddCompany()
{
     var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
	
	
    if( $("#company_name_add").val() == "" )
    {
        $("#company_name_add").css("background-color","#FF9494");
        return false;
    }
	
    
    if( $("#company_website").val() == "" )
    {
        $("#company_website").css("background-color","#FF9494");
        return false;
    }
	
			
						  
						document.getElementById("save_indexing").submit();
							}
							
							function validateURL(textval) {
											var urlregex = /^(https?|ftp):\/\/([a-zA-Z0-9.-]+(:[a-zA-Z0-9.&%$-]+)*@)*((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}|([a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(:[0-9]+)*(\/($|[a-zA-Z0-9.,?'\\+&%$#=~_-]+))*$/;
											return urlregex.test(textval);
										}

	</script>
</head>

<body class="white_bg xs-lgtgrey_bg sm-lgtgrey_bg">
	
	<!-- HEADER -->
	<?php include 'CompanyHeaderUpdated.php'; ?>		<div class="clear"></div>
			
	<div class="column_m pos_rel" onclick="checkFlag();">
		
		
		<!-- SUB-HEADER -->
	
		
		
		<div class="column_m container zi5 padt10 mart40">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
												<!-- Logo -->
												<div class="pad20 wi_100 xs-wi_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz95 xs-fsz20 brdrad1000 yellow_bg_a greenyellow_bg black_txt" style="
													background-repeat: no-repeat;
													background-position: 50%;
													border-radius: 2%;
													" id="aa_1227620">P</div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padtr10 fsz15"> <span>Partners Portal</span>  </div>
													</a></div>
											</div>		
											<div class="clear"></div>
										</div>
									</div>
									
										<ul class="marr20 pad0">
										
										<li class=" dblock padb10 padl8 ">
											<a href="../../Brand/brandAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Utforska appar</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										<li class=" dblock  padl8 ">
											<a href="../../CompanyPartner/partnerInfo/<?php echo $data['cid']; ?>" class="hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a lgtgrey_bg">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Bli partner</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
									</ul>
									
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Branschpartner</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="../../Receptionist/workInfo/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Företagskunder</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li> 
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Teknisk Partner</h4>
											<ul class="marr20 pad0">
												
												
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Integration</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
											</ul>
											
										</li> 
										
										<li class="dblock pos_rel padb10   brdclr_hgrey brdclr_pblue2_a">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Utvecklar Partner</h4>
											<ul class="marr20 pad0">
												
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">API</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../../WhitelistIP/statistics/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Statistic</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
													<li class="dblock padrb10">
													<a href="../../CompanyDevApps/appsAccount/<?php echo $data['cid']; ?>" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Company Devs App</span>
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
				
				
				<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5  xs-padl0 padl20">
					
					<div class="wrap maxwi_100 dflex alit_fe justc_sb  pos_rel padb10 brdb_new">
							<div class="white_bg tall">
								
								
								
								
								<!-- Logo -->
								<h1 class="fsz25 bold">Dina företagsuppgifter</h1>
								<!-- Logo -->
								<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Din företasprofil består av uppgifter som du delar med dig till dina kunder, anställda och leverantörer. </a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
									<!-- Meta -->
									
								</a></div><div class="hidden-xs hidden-sm padrl10">
								<a href="#" class="show_popup_modal diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt" data-target="#gratis_popup">
									
									<span class="valm">Add App</span>
								</a>
								</div>
							
							
						</div>
					
					
						<div class="wi_100 col-xs-12 col-sm-12 fleft fsz14  marrl0 ">
					
                        <!-- Keep -->
                        <div class="bsa_bb txt_0_87" id="keep">
                            <form>
								<?php $i=0;  foreach($appsDetail as $category => $value)  { ?> 
                                <!-- keep block -->
                                <div class="keep-block pos_rel marb20 brdrad2 bg_f trans_bgc1" id="keep-<?php echo $value['client_id']; ?>" style="background-color: white;">
                                    <input type="checkbox" name="keep-<?php echo $value['client_id']; ?>-check" id="keep-<?php echo $value['client_id']; ?>-check" class="keep-checker default sr-only">
                                    <label for="keep-<?php echo $value['client_id']; ?>-check" class="wi_26p hei_26p dblock opa0 opa1_ph opa1_sibc pos_abs zi5 top-8p left-8p bxsh_0111_001 brdrad50 bg_f bg_6f_sibc curp trans_all1">
                                        <img src="<?php echo $path; ?>html/keepcss/images/icons/check.svg" width="18" height="18" class="dblock opa1 opa0_psibc pos_abs pos_cen trans_opa1" alt="Check">
                                        <img src="<?php echo $path; ?>html/keepcss/images/icons/check-white.svg" width="18" height="18" class="dblock opa0 opa1_psibc pos_abs pos_cen trans_opa1" alt="Check">
                                        <div class="opa0_nph opa80 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Select note</span>
                                        </div>
                                    </label>
                                    <div class="wi_100 hei_100 pos_abs zi-1 top0 left0 bxsh_0220_0_14_031-2_0_2_0150_0_12 bxsh_0_trans_0_trans_02150_0_3_ph bxsh_0004_6f_sibc brdrad2 trans_bxsh1"></div>
                                    <a href="#" class="dblock pos_abs zi5 top4p right4p pad5 " id="<?php echo $value['client_id']; ?>">
                                        <img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="dblock dnone_pa opa50 opa1_h trans_opa1" alt="Pin note">
                                        <img src="<?php echo $path; ?>html/keepcss/images/icons/pin_active.svg" width="18" height="18" class="dnone dblock_pa" alt="Unpin note">
                                        <div class="dblock dnone_pa opa0_nph opa80 pos_abs zi1 top100 right0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Activate</span>
                                        </div>
                                        <div class="dnone dblock_pa opa0_nph opa80 pos_abs zi1 top100 right0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                            <span class="dblock padrl8">Inactivate</span>
                                        </div>
                                    </a>
                                    <div class="minhei_60p pos_rel">
                                        <a href="#" class="wi_100 hei_100_15p dblock pos_abs zi1 top0 left0"></a>
                                       
                                        <div class="dnone dblock_siba"><img src="<?php echo $path; ?>html/keepcss/images/loader-line-2.gif" width="160" height="20" class="maxwi_100 hei_auto dblock marrla"></div>
                                        <h4 class="keep-title wi_100-15p mar0 marb15 padt16 padr16 padb0 padl16 bold fsz20 txt_0_87"><?php echo $value['app_name']; ?> </h4>
                                        <div class="keep-list padr16 padl16 marb15">
                                            <div class="keep-list-item pos_rel padtb5 padl25 txt_21" id="keep-<?php echo $value['id']; ?>-item-1">
                                                <input type="checkbox" name="keep-<?php echo $value['client_id']; ?>-check-1" id="keep-<?php echo $value['client_id']; ?>-check-1" class="default sr-only">
                                                <label for="keep-<?php echo $value['client_id']; ?>-check-1" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1">
                                                    <div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>
                                                </label>
                                                <span class="keep-list-title opa54_sibc txtdec_lt_sibc"><?php echo $value['client_id']; ?></span>
                                            </div>
                                            <div class="keep-list-item pos_rel padtb5 padl25 txt_21" id="keep-<?php echo $value['client_id']; ?>-item-2">
                                                <input type="checkbox" name="keep-1-check-2" id="keep-1-check-2" class="default sr-only">
                                                <label for="keep-1-check-2" class="wi_14p hei_14p dblock opa1_h_i opa54_sibc pos_abs zi5 pos_cenY left0 brd brdclr_21 brdrad2 bg_21_sibc curp trans_opa1">
                                                    <div class="wi_10p hei_6p opa0 opa1_psibc pos_abs top1p left1p brd brdclr_f nobrdt nobrdr rotate-45"></div>
                                                </label>
                                                <span class="keep-list-title opa54_sibc txtdec_lt_sibc"><?php echo $value['client_secret']; ?></span>
                                            </div>
                                        </div>
                                       
                                        <div class="keep-metas dflex fxwrap_w alit_c marb10 padr16 padl16">
                                            <div class="keep-meta maxwi_100 minhei_24p dflex alit_c pos_rel marb6 marr6 xs-padr15 sm-padr15 brdrad2 bg_0_08" id="keep-1-meta-1">
                                                <span class="maxwi_100 dflex alit_c opa1 opa0_ph pos_rel zi1 padtb3 padrl5 txtdec_n">
                                                    <span class="meta-content maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">Created: <?php echo date('Y-m-d',strtotime($value['created_on'])); ?></span>
                                                </span>
                                                <a href="#" class="wi_100 maxwi_100 hei_100 minwi_0 dflex alit_c opa0 opa1_ph pos_abs top0 left0 zi2 padtb3 padr12 padl5 txtdec_n txt_inh">
                                                    <span class="maxwi_100 ovfl_hid flex_1 dblock marrl5 ws_now txtovfl_el fsz11">Created: <?php echo date('Y-m-d',strtotime($value['created_on'])); ?></span>
                                                </a>
                                                <a href="#" class="keep-meta-delete hei_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_abs zi3 top0 right0 pad3">
                                                    <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-close.svg" width="14" height="14" class="opa54" alt="Delete">
                                                    <div class="opa0_nph opa80 xs-opa1 pos_abs zi1 bot100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                        <span class="dblock padrl8">Delete</span>
                                                    </div>
                                                </a>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="keep-actions wi_100 dflex alit_c opa0 xs-opa1 sm-opa1 opa1_ph pos_rel zi5 padb5 trans_opa1">
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-remind dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
                                            </a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Remind me</span>
                                            </div>
											</div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-collaborator dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-collaborator.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Collaborator">
                                            </a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Collaborator</span>
                                            </div>
                                        </div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
                                            </a>
                                            <div class=" wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs bot100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
                                                <a href="#" class="active wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_e0 brdclr_80_h brdclr_80_a brdrad50 bg_f trans_all2 " data-color="#fff"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ff8a80 brdclr_80_h brdrad50 bg_ff8a80 trans_all2" data-color="#ff8a80"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffd180 brdclr_80_h brdrad50 bg_ffd180 trans_all2" data-color="#ffd180"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="yellow_col wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ffff8d brdclr_80_h brdrad50 bg_ffff8d trans_all2 " data-color="#ffff8d"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
                                                <a href="#" class="green_col wi_26p hei-pad-100 dblock pos_rel mar2 brd brdwi_2 brdclr_ccff90 brdclr_80_h brdrad50 bg_ccff90 trans_all2 " data-color="#ccff90"><img src="<?php echo $path; ?>html/keepcss/images/icons/icon-check.svg" class="dnone dblock_pa pos_abs pos_cen"></a>
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
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <label class=" dblock opa50 opa1_h pos_rel pad5 talc curp trans_opa1">
                                               
                                                <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-image.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Add image">
                                            </label>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Add image</span>
                                            </div>
                                        </div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-archive dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
                                            </a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">Archive</span>
                                            </div>
                                        </div>
                                        <div class="keep-action wi_16_666 pos_rel">
                                            <a href="#" class="keep-action-more dblock opa50 opa1_h pad5 talc trans_opa1">
                                                <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
                                            </a>
                                            <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                                                <span class="dblock padrl8">More</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php } ?>
                                <!-- keep block -->
                               
                            </form>
                        </div>
						
						<!-- 1 article, 1 img -->
						
						<!-- 1 article, image on the left -->
							</div>
					
					<!-- Marquee -->
					<div class="wi_100 visible-xs visible-sm fleft bs_bb marb20 padtrl10 xs-padrl15 brd brdrad3 white_bg">
						<h3 class="padb20 uppercase bold fsz16">Lediga jobb</h3>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path; ?>html/keepcss/images/fb.png" width="80" title="Facebook" alt="Facebook" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path; ?>html/keepcss/images/volvo.png" width="80" title="Volvo" alt="Volvo" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="dflex marb10 padb5 brdb brdclr_grey">
							<div class="wi_90p"> <img src="<?php echo $path; ?>html/keepcss/images/spot.png" width="80" title="Spotify" alt="Spotify" /> </div>
							<div class="flex_1">
								<div class="uppercase bold fsz13 midgrey_txt">5 april | digital hr – 1 plats kvar</div>
								<div class="lgn_hight_16">Digitaliseringen handlar inte bara om HR:s roll som förändringsagent. HR måste också digitaliseras och anamma de möjligheter tekniken ger!</div>
							</div>
						</div>
						<div class="marb15 padt15 talc fsz16"> <a href="#">View more</a> </div>
					</div>
					
					<!-- Right content -->
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
				

		</div>
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		<!-- Edit news popup 
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 " id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="marb20"> <img src="<?php echo $path; ?>html/keepcss/images/gratis.png" class="maxwi_100 hei_auto" /> </div>
					<h2 class="marb25 pad0 bold fsz24 black_txt">Läs hela artikeln med SvD digital</h2>
					<div class="wi_60 dflex fxwrap_w marrla marb20 talc">
						<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/keepcss/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/keepcss/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/keepcss/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/keepcss/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/keepcss/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
						<div class="wi_50 marb10"> <img src="<?php echo $path; ?>html/keepcss/images/checkmark.png" width="20" class="marr5 valm"> <span class="valm">Title</span> </div>
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
		-->
		
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
	
		
    </div>

		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
    
    
    <!--Keep modal fade -->
    <div id="keep_fade" class="wi_100 hei_100 dnone pos_fix zi998 top0 left0 bg_0_54"></div>
    
    <!--Keep selected -->
	<div id="keep-selected" class="wi_100 hei_64p dflex xs-dnone sm-dnone alit_c justc_sb opa0 opa1_a pos_fix zi999 top-64p top0_a left0 padrl15 bxsh_0220_0_14_031-2_0_2_0150_0_12 bg_f trans_all2">
        <div class="dflex fxwrap_w alit_c padtb10">
            <div class="pos_rel marr15">
                <a href="#" class="keep-selected-clear dflex alit_c justc_c talc">
                    <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-arrow-left.svg" width="24" height="24" class="maxwi_100 hei_auto" alt="Clear selection">
                </a>
                <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 left0 mart5 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                    <span class="dblock padrl8">Clear selection</span>
                </div>
            </div>
            <div class="marr15 fsz20 txt_0_54">
                <span id="keep-selected-count">0</span> selected
            </div>
        </div>
        <div class="keep-actions wi_100 maxwi_250p dflex alit_c padtb10">
            <div class="keep-action wi_20 pos_rel">
                <a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
                    <img src="<?php echo $path; ?>html/keepcss/images/icons/pin.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Pin">
                </a>
                <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                    <span class="dblock padrl8">Pin</span>
                </div>
            </div>
            <div class="keep-action wi_20 pos_rel">
                <a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
                    <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-remind.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Remind me">
                </a>
                <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                    <span class="dblock padrl8">Remind me</span>
                </div>
            </div>
            <div class="keep-action wi_20 pos_rel">
                <a href="#" class="keep-show-color dblock opa50 opa1_h pad5 talc trans_opa1">
                    <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-color.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Change color">
                </a>
                <div class="keep-colors wi_130p dflex fxwrap_w alit_c opa0 opa1_ph pos_abs zi2 top100 pos_cenXZ0 pad5 bxsh_014_0_03 brdrad2 bg_f pointev_n pointev_a_ph trans_all2">
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
            <div class="keep-action wi_20 pos_rel">
                <a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
                    <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-archive.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="Archive">
                </a>
                <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                    <span class="dblock padrl8">Archive</span>
                </div>
            </div>
            <div class="keep-action wi_20 pos_rel">
                <a href="#" class="dblock opa50 opa1_h pad5 talc trans_opa1">
                    <img src="<?php echo $path; ?>html/keepcss/images/icons/icon-more.svg" width="18" height="18" class="maxwi_100 hei_auto" alt="More">
                </a>
                <div class="opa0_nsibh opa80 xs-opa1 pos_abs zi1 top100 pos_cenXZ0 padtb5 brdrad5 black_bg ws_now bold fsz12 txt_f pointev_n trans_all2">
                    <span class="dblock padrl8">More</span>
                </div>
            </div>
        </div>
    </div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5" id="gratis_popup">
			<div class="modal-content pad25  nobrdb talc brdrad5">
					<h2 class="marb10 pad0 bold fsz24 black_txt">Skapa en koppling</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Fyll i valfritt namn och vart du vill peka API </span>
						</div>
						
						
					</div>
				<form method="POST" action="../createAppsAccount/<?php echo $data['cid']; ?>" id="save_indexing" name="save_indexing"  accept-charset="ISO-8859-1">	
					<div class="on_clmn padb10 ">
			
			<div class="pos_rel ">
			
					<input type="text" id="company_name_add" name="company_name_add" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="App namn">
					</div>
					</div>
					
					<div class="on_clmn padb10 ">
			
			<div class="pos_rel ">
			
					<input type="url" id="company_website" name="company_website" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Vilken URL vill du peka...">
					</div>
					</div>
					</form>
					<div class="mart20">
						<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="validateAddCompany();">
						<input type="hidden" id="indexing_save" name="indexing_save">
						
					</div>
					
					
					
				
			</div>
		</div>
		
	
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
    <script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/autosize.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/jquery.selectric.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>html/keepcss/modules.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>html/keepcss/js/keep.js"></script>
</body>

</html>