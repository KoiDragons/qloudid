<?php
session_name("admin");session_start();require_once '../configs/database.php';$dbCon = connect_database("");
if(isset($_GET['action']) or isset($_SESSION['qadmin_id']) or isset($_COOKIE['email']))
{
		session_destroy();
		setcookie("email", "",time()-3600);
		header("location:https://www.qloudid.com/superadmin/index.php/LoginAdmin");
}
?>
<?php
    if(isset($_POST['login']))
    {
		session_start();
       $email = strip_tags($_POST['username']);
       $password = md5(strip_tags($_POST['password']));
       $expire=time()+60*60; 
	   
        
        $query = 'select id,email,password from admin_logins where email = "'.$email.'"';
        
        
        $row = mysqli_fetch_array(mysqli_query($dbCon, $query));
        
        
        if(empty($row))
        {
            $warning = "This email address is not registered with us.";
        }
        else
        {
         
            if(trim($row['password']) == $password)
            {
			
				$_SESSION['user_id'] = $row['id'];
                $date = date('Y-m-d H:i:s');
				$last_login= "update admin_logins set last_login ="."'".$date."'"."where id=".$_SESSION['user_id'];
				mysqli_query($dbCon, $last_login);
				header("location:users.php");
            }
            else
            {
                $warning = "Given password is incorrect";
            }
            
            
        }
		
        
    }    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>: TeleZales :</title>
<link href="usercss/css/style.css" rel="stylesheet" media="all" />
<link rel="shortcut icon" type="image/x-icon" href="usercss/images/favicon.ico">
<script type="text/javascript" src="usercss/js/jquery.js"></script>
<script src="usercss/js/custom.js" type="text/javascript"></script>
<script type="text/javascript" src="usercss/js/jquery.bpopup.min.js"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
<script>
function validateLogin()
{
    
    
    var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
                                                       
                    if($("#username").val() == "")
					{
						alert("Enter username");
						$("#username").css("background-color","#FF9494");
						return false;
					}
					if (!reg.test($("#username").val())){
                    
                    $("#username").css("background-color","#FF9494");
                    alert("Incorrect Email address format");
                    return false;
                    
                    }
					if($("#password").val() == "" )
                    {
                    $("#password").css("background-color","#FF9494");
					alert("Enter Password");
                    return false;
                    }
					
                    
                    
                    document.getElementById("loginform").submit();
}
</script>
</head>

<body class="bigheader">
<div id="wrap">
  <div id="header">
    <div id="logo"><a href="superadmin/users.php"><img src="usercss/images/telezales.png" alt="Telezales" /></a></div>
    <div id="usermenu">
      <ul>
        <li><a href="#">How it works</a></li>
        <li><a href="#">Become Contractor</a></li>
        <li><a class="" href="signup.php">Join Today</a></li>
        <li class="login"> <a href="superadminlogin.php">Sign in</a> </li>
      </ul>
    </div>
  </div>
  <div id="container">
    <div class="column_m padtb15">
      <div id="addquestions" class="brdr_whtbg">
        <div class="column_m">
          <div class="pad30">
            <h1 class="fsz44 nobold">Your Feedback is Important to Us</h1>
            <p class="fsz24 nobold pad0">Please help us serve you better by sharing your experience with Remotia.</p>
          </div>
          <div class="padrl30">
            <div class="bline"></div>
          </div>
        </div>
        <div class="column_m padtb30">
          <div class="column_m twth_clmn_bord">
            <div class="twth_clmn">
              <div class="padl30">
                <div class="supportboxes"> 
                
                <a href="#"> <img width="55" height="55" alt="Ask a question" src="usercss/images/qmark.png"><span>Ask a Question</span> </a> 
                
                <a href="#"> <img width="55" height="55" alt="Report a problem" src="usercss/images/report-prob.png"><span>Report a Problem</span> </a> 
                
                <a href="#" target="_blank"><img alt="Tweeter" src="usercss/images/tweeticon.png"><span>Tweet about us</span></a> 
                
                <a href="#"><img width="55" height="55" alt="Propose n idea" src="usercss/images/propose-n-idea.png"><span>Propose and Idea</span> </a> 
                
                <a href="#"><img width="55" height="55" alt="Leave a testimonial" src="usercss/images/testimonial.png"><span>Leave a Testimonial</span></a> 
                
                </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="onth_clmn">
              <div class="padrl30">
			  <form action="" method="POST" id="loginform" onsubmit="return validateLogin();">
                <ul class="verticalform">
                  <li>
                    <h2 class="pad0 fsz22 nobold">Login</h2>
                  </li>
                  <li>
                    <div class="label"> User name</div>
                    <div class="field">
                      <input type="text" name="username" id="username" required="required" />
                    </div>
                  </li>
                  <li>
                    <div class="label">Password</div>
                    <div class="field">
                      <input type="password" name="password" id="password" required="required" />
                    </div>
                  </li>
				  <?php if(isset($warning)) {?>
				   <li style="color: red">
					<?php echo $warning; ?>
				   </li>
				  <?php }?>
                  <li>
                    <input type="submit" value="Submit" class="button" />
					<input type="hidden" name="login" >
                  </li>
                  <li><a href="signup.php">New user</a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href="forgotpassword.php?page=admin">Forgot Password</a></li>
                </ul>
                <div class="clear"></div>
			  </form>
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</div><div class="bigfooter column_m">
  <div class="wrap">
    <div class="fright">PeconGroup &copy; 2012 </div>
    <div class="fleft">
      <div class="footmenu">
        <div class="menu-footer-menu-container">
          <ul class="menu" id="menu-footer-menu">
            <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-457 current_page_item menu-item-467" id="menu-item-467"><a href="http://www.pecongroup.com/pecongroup/">About PeconGroup</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-466" id="menu-item-466"><a href="http://www.pecongroup.com/legals/legal-notice/">Legals</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-307" id="menu-item-307"><a href="http://www.pecongroup.com/career/">Career</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-468" id="menu-item-468"><a onclick="javascript:_gaq.push(['_trackEvent','outbound-menu','http://pecongroup.pressdoc.com']);" href="http://pecongroup.pressdoc.com/">Press</a></li>
            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-349" id="menu-item-349"><a href="http://www.pecongroup.com/partner/">Partner</a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-465" id="menu-item-465"><a onclick="javascript:_gaq.push(['_trackEvent','outbound-menu','http://pecongroup.zendesk.com']);" href="http://pecongroup.zendesk.com/">Support</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</div>


</body>
</html>
