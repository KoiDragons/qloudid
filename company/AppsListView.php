
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercss/images/favicon.ico"/>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercss/css/style3.css">
<link href="<?php echo $path;?>html/usercss/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" media="all" />
<link href="<?php echo $path;?>html/usercss/css/jquery.bxslider.css" rel="stylesheet" media="all" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/slick-theme.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/style.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modules.css" />
<title>Qmatchup</title>
<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/jquery.js"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>

<script>
function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
 function  showId(id)
 {
	 document.getElementById(id).innerHTML='<h3 class="fsz14 nobold lgtgrey_txt"><a href="#">'+id+'</a>';
 }
</script>

</head>
<body>
	<?php include 'UserHeader.php'; ?>
	<div class="clear"></div>
	
<div class="clear"></div>
<div class="column_m sub_header">
  <div class="column_m sub_header_brd white_bg">
    <div class="wrap">
      <div class="subbrand">
        <ul class="sf-menu application_list">
          <li><a href="#">Companies</a>
            <ul>
              <li><a href="#">Consumers</a></li>
              <li><a href="#">Staffing</a></li>
              <li><a href="#">Consulting</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <div class="subrand_links">
        <ul class="sf-menu">
          <li><a href="../../CreateApps/appsAccount/<?php echo $data['cid']; ?>">+ Add Apps</a>
            <ul style="display:none;">
              <li>
                <div class="padtb10">
                  <p class="padrl15 fsz14 lgtgrey_txt">Here's what you can add</p>
                  <ol>
                    <li><a href="../../CreateApps/appsAccount/<?php echo $data['cid']; ?>">Add App</a></li>
                    <li><a href="#">Product</a></li>
                    <li><a href="#">Invite users</a></li>
                  </ol>
                  <div class="clear"></div>
                </div>
              </li>
            </ul>
          </li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Post project</a></li>
          <li class="right_btn"><a href="#" class="green">Contractor</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<div class="column_m container">
  <div class="clear"></div>
  <div class="wrap">
  <div class="column_m padtb15">
       <!-- <h2 class="pad0 fsz18">Manage Locations</h2>-->
    </div>
   <!-- <div class="column_m">
      <div class="column_m proces_wizard three_step blue_bg">
        <ul>
          
        </ul>
      </div>
    </div>-->
    <div class="column_m white_bg">
      <div class="right_container" style="width: 960px;">
        <div class="pad15">
          <div class="fright">
            <div class="list_grid_view"> <a href="#" class="grid_vw active"> <span></span> </a> <a href="#" class="list_vw"><span></span></a> </div>
            <div class="refine_result">
              <select class="selectric">
                <option>Refine Result</option>
                <option> -- -- </option>
                <option> -- -- </option>
                <option> -- -- </option>
              </select>
            </div>
          </div>
          <h2 class="padtb5 lgtgrey_txt midgrey_txt">Locations</h2>
          <div class="clear"></div>
          <div class="line mart5"></div>
          <div class="clear"></div>
          <div class="column_m padt10">
            <table width="100%" border="0" rules="rows" cellspacing="0" cellpadding="10" bordercolor="#f0f0f0" class="project_detail_table font_opnsns">
              <tr>
		<th style="background: #F5F5F5;" width="1%" class="tall" scope="col"><input onclick="javascript:checkAll(this);" name="chk[]" class="minicheck" type="checkbox"/></th>
              <th style="background: #F5F5F5;" width="25%" class="tall" scope="col">App Name </th>
                <th style="background: #F5F5F5;" width="25%" class="tall" scope="col">Client Secret</th>
               <th style="background: #F5F5F5;" width="25%" class="tall" scope="col">Client ID</th>
				 <th style="background: #F5F5F5;" width="25%" class="tall" scope="col">Created On</th>
                
              </tr>
			  <?php foreach($appsDetail as $category =>$row)
			  
			  {
			  
			  ?>
              <tr class="talc tooltip">
		<td align="center" valign="top"><input name="chk[]" class="minicheck" type="checkbox"/></td>

		<td class="tall"><h3 class="fsz14 nobold lgtgrey_txt"><a href="#"><?php echo $row['app_name'];?></a></h3>
                
				 </td>
                <td class="tall" id="<?php echo $row['client_secret'];?>"  onclick="showId(this.id);"><h3 class="fsz14 nobold lgtgrey_txt"><a href="#">Show</a></h3>
                  </td>
				  <td class="tall"><h3 class="fsz14 nobold lgtgrey_txt"><?php echo $row['client_id'];?></h3>
                  </td>
				  <td class="tall"><h3 class="fsz14 nobold lgtgrey_txt"><?php echo date('Y-m-d',strtotime($row['created_on']));?></h3>
                  </td>
				 
				  
              </tr>
              <?php } ?>
		   </table>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
          <div class="padtb15"></div>
          <div class="column_m">
            <div class="fright wi_20"> <a href="../../CreateApps/appsAccount/<?php echo strip_tags($data['cid']); ?>" class="green_btn dblock">Add</a> </div>
          </div>
          <div class="clear"></div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<div class="column_m padt30">
  <div class="column_m footermain">
    <div class="wrap">
      <div class="column_m padt30">
        <div class="for_clmn">
          <h2 class="fsz26 cyanblue_txt bold font_opnsns">QMatchup</h2>
          
        </div>
        <div class="for_clmn">
          <div class="marrl30 padrl30 blue_left_brd talc">
            <div class="center_bx footer_green_ico icon1 marb10"> </div>
            <h2 class="darkblue_txt font_arial">Know more!</h2>
            <ul class="footer_link_list">
              <li><a href="#">About</a></li>
              <li><a href="#">How it works</a></li>
              <li><a href="#">Additionals</a></li>
              <li><a href="#">Blog</a></li>
            </ul>
            <div class="clear"></div>
          </div>
        </div>
        <div class="for_clmn talc">
          <div class="padrl30 blue_left_brd blue_right_brd talc">
            <div class="center_bx footer_green_ico icon2 marb10"> </div>
            <h2 class="darkblue_txt font_arial">Need Help!</h2>
            <ul class="footer_link_list">
              <li>Call us at : 1 888 341</li>
              <li>Email : <a href="mailto:support@qmatchup.com">support@qmatchup.com</a></li>
              <li><a href="#">Helpcenter</a></li>
              <li><a href="#">FAQ</a></li>
            </ul>
            <div class="clear"></div>
          </div>
        </div>
        <div class="for_clmn talc">
          <div class="padl30">
            <div class="center_bx footer_green_ico icon3 marb10"> </div>
            <h2 class="darkblue_txt font_arial">Stay in touch</h2>
            <p>Get monthly updates from Qmatchup in your inbox. Read our latest news & buzz.</p>
            <ul class="social_hori_color_list">
              <li><a href="#" class="fb"></a></li>
              <li><a href="#" class="tw"></a></li>
              <li><a href="#" class="sk"></a></li>
              <li class="last"><a href="#" class="rs"></a></li>
            </ul>
            <div class="wi_70 center_bx padt10"> <a href="#" class="green_btn dblock min_height">Subscribe Newsletter</a> </div>
          </div>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="column_m grey_ico_bx padt20">
          <div class="for_clmn">
            <h2 class="darkblue_txt fsz16 padb5">Q Outsourcing </h2>
            <div class="grey_icon icon1"></div>
            <p> We care a lot about how people communicate. </p>
          </div>
          <div class="for_clmn">
            <h2 class="darkblue_txt fsz16 padb5">Q Purchase</h2>
            <div class="grey_icon icon2"></div>
            <p>Has helped over 29342 companies with their projects.</p>
          </div>
          <div class="for_clmn">
            <h2 class="darkblue_txt fsz16 padb5">Q Hire</h2>
            <div class="grey_icon icon3"></div>
         <p>Industry specialists project faciliators supervices.</p>
          </div>
          <div class="for_clmn">
            <h2 class="darkblue_txt fsz16 padb5">Q Staffing</h2>
            <div class="grey_icon icon4"></div>
            <p>Continiously expanding and updates our tools.</p>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="dark_footer column_m">
    <div class="wrap">
      <div class="column_m padt15">
        <div class="left_sidebar">
          <h2 class="fsz30 pad0 font_opnsns">QMATCHUP</h2>
        </div>
        <div class="right_container">
          <ul class="footer_nav_list">
            <li><a href="#">About us</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li>
            <li class=""><a href="#">Sitemap</a></li>
          </ul>
        </div>
      </div>
      <div class="column_m padtb10"> &copy; 1998 – 2014 QMatchup, Inc. All rights reserved. </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/superfish.js"></script> 
<!--<script type="text/javascript" src="js/icheck.js"></script> -->
<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/jquery.selectric.min.js"></script> 
<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
</body>
</html>