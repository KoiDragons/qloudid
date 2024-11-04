
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercss/images/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercss/css/styleget.css">
<link href="<?php echo $path; ?>html/usercss/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" media="all">
<title>Qmatchup</title>
<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/jquery.js"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>

<script>
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
	
				if(!validateURL($("#company_website").val()))	
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
<body>

<div class="column_m header blue_bg">
  <div class="wrap">
    <div class="logo padt10">
        <h1 style="float:left;">App  registration</h1>
    </div>
    <div class="top-links">
        <ul>
            <li>
                <a class="login" href="#">Help</a>
            </li>
            <li>
                <a class="sign-up" href="#">Close</a>
            </li>
        </ul>
    </div>
    <div class="clear"></div>
  </div>
</div>


<div class="column_m container">
    <div class="wrap">
        <div class="homepage_searchform_tabs column_m prdt_tabs">
              <div class="column_m">
                  <ul class="tabs sf-menu">
                      <li><a href="#Web">Register</a></li>
                      <li><a href="#Images">Unlock apps</a></li>
                      <li><a href="#Shopping">Publish</a></li>
                  </ul>


<div class="column_m container">
  <div class="wrap white_bg font_opnsns">
    <div class="pad20">
      <div class="twth_clmn">
        <div class="padr30">
          <h2 class="fsz28 bold cyanblue_txt padb5">Register your App !</h2>
          <p class="fsz14 padb30">You're just 1 step away from expanding your business.</p>
         
          <div class="clear"></div>
          <div class="padb30">
            <h2 class="green_txt fsz16 padb20">Why you should register your App </h2>
            <div class="fleft marr20 padl20"><img class="marb20" src="<?php echo $path; ?>usercss/images/registration_icon_set.png" width="71" height="279" alt="." title="."></div>
            <div>
              <h3 class="cyanblue_txt padb5 bold">Complete ONE Job Form</h3>
              <p class="padb30">Don't waste time looking for vendors all over the internet. Describe your project ONE time, in one Job form, with no Fees. Once submitted we will get to work looking for talents that are a good fit based on your requirements and budget.</p>
              <h3 class="cyanblue_txt padtb5 bold">Receive Bids</h3>
              <p class="padb30">Once we find your matches we will invite them to bid on your project. You will receive bids from all fitted Contractors that are interested to deliver on your project.</p>
              <h3 class="cyanblue_txt padtb5 bold">Match Up</h3>
              <p class="pad0">All bids will be presented to you in our proposal dashboard. You can easily make vertical searches based on the criterias important to you, and decide which contractor to work with. After the selection process we reveal your ID to the contractor.</p>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="padb30">
            
            <div class="clear"></div>
          </div>
          
        </div>
      </div>
      <div class="onth_clmn">
        <div class="column_m">
          <div class="blue_bg_brdr_bx signup_bx">
            <div class="pad15">
              <div class="column_m font_opnsns">
                <h2 class="fsz22 cyanblue_txt bold padb5">Tell us about your App </h2>
                <p class="fsz14">And explore the magic with Qmatchup</p>
                
                	<form method="POST" action="../../CreateApps/createAppsAccount/<?php echo $data['cid']; ?>" method="POST" name="save_indexing" id="save_indexing" >
					
					
                <div class="column_m padt10">
                  <input type="text" name="company_name_add" id="company_name_add" class="text_field" placeholder="App name" />
                  </div>
                  <div class="column_m padt10">
                  <input type="url" name="company_website" id="company_website" class="text_field" placeholder="Redirect URL" />
                </div>
		
				
				
                <div class="column_m padt25 talc">
                  <input type="button" value="Create App " onclick="validateAddCompany();" class="green_submit_btn wi_100" />
				  <input type="hidden" name="submit1234" >
                </div>
				</form>
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div class="column_m padt30">

<div class="column_m container">
  <div class="wrap">
    <div class="column_m white_bg">
      
      <div class="full_container">
        <div class="pad15">
          
          <div class="padt5">
            
          
          <div class="white_brd_bx">
            <h2 class="fsz20 pad10 cyanblue_txt">Apps you unlock upon registration of your Organization </h2>
            <div class="padrl10">
              
            <div class="marrl30 padrl30">
              <div class="line"></div>
            </div>
            <div class="clear"></div>
            <div class="padt10">
              
              <div class="column_m">
                <ul class="contractor_grid_viw">
                  <li>
                    <div class="contractor_bx">
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="contractor_bx premium">
                      <div class="batch"></div>
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="contractor_bx">
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="contractor_bx">
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="contractor_bx">
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li class="clear"></li>
                  <li>
                    <div class="contractor_bx">
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="contractor_bx">
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="contractor_bx premium">
                      <div class="batch"></div>
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="contractor_bx">
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="contractor_bx">
                      <div class="contractor_logo"><span></span></div>
                      <div class="contractor_name">Contractor Name</div>
                      <div class="clear"></div>
                      <div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
                        <div class="clear"></div>
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li class="clear"></li>
                </ul>
              </div>
              <div class="clear"></div>
             
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          


      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/superfish.js"></script> 
<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/icheck.js"></script> 
<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/jquery.selectric.min.js"></script> 
<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/custom.js"></script>


</body>
</html>