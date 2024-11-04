<?php
session_start();require_once 'configs/database.php';$dbCon=connect_database("");
require_once 'configs/testMandril.php';
if(isset($_GET['action']) or isset($_COOKIE['email']) or isset($_SESSION['user_id']))
{	
		setcookie("email", "", time()-3600);
		if (isset($_SERVER['HTTP_COOKIE'])) 
		{
		$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
			foreach($cookies as $cookie) 
			{
			$parts = explode('=', $cookie);
			$name = trim($parts[0]);
			setcookie($name, '', time()-1000);
			setcookie($name, '', time()-1000, '/');
			setcookie($name, '', time()-1000, '/','.qmatchup.com');						
			}
		}
		unset($_SESSION['rememberme_qid']);
		
		setcookie('rememberme_qid', '', time() - (3600*24), '/', "qmatchup.com");
		setcookie('rememberme_qid', '', time() - (3600*24), '', "qmatchup.com");
		session_unset();
		session_destroy();
		$viewPath="user/index.php/";
        require_once('user/LoginAccountView.php');	
		//header("location: user/LoginAccountView");
}

if(isset($_POST['login']))
    {
		session_start();
       $email =  strip_tags($_POST['username']);
       $password = md5( strip_tags($_POST['password']));
       $expire=time()+60*60;         
        $query = 'select id,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = "'.$email.'"';
        $row = mysqli_fetch_array(mysqli_query($dbCon, $query));
        if(empty($row))
        {
            $warning = "This email address is not registered with us.";
        }
        else
        {    
            if(trim($row['password']) == $password)
            {
				$userid = $row['id'];
				if(isset($_POST['staylogin']))
				{
				setcookie("email", $userid , $expire);
				}
             if($row['verification_status'] == 1)
                {                    
                    if($row['get_started_wizard_status'] == 0)
                    {
						
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['email'] = $row['email'];				 
						$_SESSION['created_on'] = $row['created_on'];				 
						 $date = date('Y-m-d H:i:s');
						 $last_login= "update user_logins set last_login ="."'".$date."'"."where id=".$_SESSION['user_id'];
						 mysqli_query($dbCon, $last_login);
                         header("Location:user/index.php/GetStarted");
                    }
                    else
                    {	
						$get_company = "select id,company_name,created_on from user_employements where user_logins_id=".$row['id']." and current_job =1";
						$row_comp = mysqli_fetch_array(mysqli_query($dbCon,$get_company ));
						$_SESSION['comp_id'] = $row_comp['id'];
						$_SESSION['comp_name'] = $row_comp['company_name'];
						$_SESSION['comp_date'] = $row_comp['created_on'];
						 $_SESSION['user_id'] = $row['id'];
						$_SESSION['name'] = $row['name'];
						$_SESSION['email'] = $row['email'];				 
						$_SESSION['created_on'] = $row['created_on'];				 
						 $date = date('Y-m-d H:i:s');
						 $last_login= "update user_logins set last_login ="."'".$date."'"."where id=".$_SESSION['user_id'];
						 mysqli_query($dbCon, $last_login);
						 header("Location:profile-user-cv.php");
					}
				}
                else
                {
                    $warning = "Please verify your email address.";
                }                
            }
            else
            {
                $warning = "Given password is incorrect";
            }
      }
    }
?>
<?php

error_reporting(0);
require_once "facebook/fb/facebook.php";

$facebook = new facebook(array(	
	'appId' => '449952851778001',
	'secret' => 'f3f515b11037890616235eab2b67cbc3',
	'Cookie' => true
	));
	
$session = $facebook->getUser();
$me = null;

if($session)
{
	try
	{
		$me = $facebook->api('/me');
		$fql = "SELECT pic_cover FROM user WHERE uid =".$me['id'];
		$ret_obj = $facebook->api(array(
			'method' => 'fql.query',
			'query' => $fql,
			));
		$dob = explode('/',$me['birthday']);
		$query = 'select id,concat_ws(" ",first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = "'.$me['email'].'"';
        $row = mysqli_fetch_array(mysqli_query($dbCon, $query));
			if($row)
			{
				$get_company = "select id,company_name,created_on from user_employements where user_logins_id=".$row['id']." and current_job =1";
						$row_comp = mysqli_fetch_array(mysqli_query($dbCon,$get_company ));
						$_SESSION['comp_id'] = $row_comp['id'];
						$_SESSION['comp_name'] = $row_comp['company_name'];
						$_SESSION['comp_date'] = $row_comp['created_on'];
				$modified_on = date('Y-m-d H:i:s');
				$_SESSION['user_id'] = $row['id'];
				$_SESSION['name'] = $row['name'];
				$_SESSION['email'] = $row['email'];				 
				$_SESSION['created_on'] = $row['created_on'];	
				$last_login= "update user_logins set last_login ="."'".$modified_on."'"."where id=".$_SESSION['user_id'];
				mysqli_query($dbCon, $last_login);
				header("location:http://www.qmatchup.com/beta/profile-user-cv.php");
			}
			else
			{
				$created_on = date('Y-m-d H:i:s');
				$modified_on = date('Y-m-d H:i:s');
				$random_hash = substr(md5(uniqid(rand(), true)), 16, 16);
				$rand_hash = substr(md5(uniqid(rand(), true)), 16, 16);
				
				
				
				if($me['gender'] == 'male')
					$me['gender'] = 1;
				else if($me['gender'] == 'female')
					$me['gender'] = 0;
					
				
				
				$query = 'insert into user_logins(first_name,last_name,email,password,sex,dob_month,dob_day,dob_year,email_verification_code,get_started_wizard_status,verification_status,created_on,modified_on,came_from,last_login)
				values("'.$me['first_name'].'","'.$me['last_name'].'","'.$me['email'].'","'.$rand_hash.'","'.$me['gender'].'","'.$dob[0].'","'.$dob[1].'","'.$dob[2].'","'.$random_hash.'","1","0", "'.$created_on.'", "'.$modified_on.'",1,"'.$created_on.'")';
				
				$result = mysqli_query($dbCon, $query);
				
				if(!$result)
				{
						echo "Some error occurred. Please report at webadmin@telezales.com";
						die;
				}
				
				
				$query1 = 'select id,concat_ws(" ",first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = "'.$me['email'].'"';
				$row = mysqli_fetch_array(mysqli_query($dbCon, $query1));
			
				$userid = $row['id'];								
				$p_pic = $userid.'_'.microtime()."profile_facebook.jpg";
				$c_pic = $userid.'_'.microtime()."cover_facebook.jpg";
		// For Profile Pic		
				function curl_redir_exec($ch)
				{
					static $curl_loops = 0;
					static $curl_max_loops = 20;
					if ($curl_loops++ >= $curl_max_loops)
					{
						$curl_loops = 0;
						return FALSE;
					}
					curl_setopt($ch, CURLOPT_HEADER, true);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$data = curl_exec($ch);
					@list($header, $data) = @explode("\n\n", $data, 2);
					$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
					if ($http_code == 301 || $http_code == 302)
					{
						$matches = array();
						preg_match('/Location:(.*?)\n/', $header, $matches);
						$url = @parse_url(trim(array_pop($matches)));
						if (!$url)
						{
							//couldn't process the url to redirect to
							$curl_loops = 0;
							return $data;
						}
					$last_url = parse_url(curl_getinfo($ch, CURLINFO_EFFECTIVE_URL));
					if (!$url['scheme'])
						$url['scheme'] = $last_url['scheme'];
					if (!$url['host'])
						$url['host'] = $last_url['host'];
					if (!$url['path'])
						$url['path'] = $last_url['path'];
						$new_url = $url['scheme'] . '://' . $url['host'] . $url['path'] . (@$url['query']?'?'.$url['query']:'');
						return $new_url;
					} else {
						$curl_loops=0;
						return $data;
					}
				}

				function get_right_url($url) 
				{
						$curl = curl_init($url);
						curl_setopt($curl, CURLOPT_HEADER, false);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
						return curl_redir_exec($curl);
				}

				
				$url = 'http://graph.facebook.com/'.$me['id'].'/picture?type=large';

				$file_handler = fopen("../user/profile-image/".$p_pic, 'w');
				$curl = curl_init(get_right_url($url));
				curl_setopt($curl, CURLOPT_FILE, $file_handler);
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_exec($curl);
				curl_close($curl);
				fclose($file_handler);
	// For Cover Pic
				
				copy($ret_obj[0]['pic_cover']['source'],"../user/cover-image/".$c_pic);
				
				
				if($me['work'][0]['end_date'] == "")
				{
					$current_job = 1;
				}
				else
				{
					$current_job = 0;
				}
				
				mysqli_autocommit($dbCon,false);
				 $query1 = 'insert into user_profiles(user_logins_id,image_path,cover_photo_path,created_on,modified_on)
				values('.$userid.',"'.$p_pic.'","'.$c_pic.'","'.$created_on.'","'.$modified_on.'")';
				$result1 = mysqli_query($dbCon, $query1);
				
				$query2 = 'insert into user_contact_details(user_logins_id,address)
				values('.$userid.',"'.$me['hometown']['name'].'")';
				
				$result2 = mysqli_query($dbCon, $query2);
				
				$query3 = 'insert into user_educations(user_logins_id,school,field)
				values('.$userid.',"'.$me['education'][0]['school']['name'].'","'.$me['education'][0]['type'].'")';
				$result3 = mysqli_query($dbCon, $query3);
				
				$query4 = 'insert into user_employements(user_logins_id,company_name,duration_start,duration_end,title,current_job,created_on)
				values('.$userid.',"'.$me['work'][0]['employer']['name'].'","'.$me['work'][0]['start_date'].'","'.$me['work'][0]['end_date'].'","'.$me['work'][0]['position']['name'].'","'.$current_job.'",NOW())';
				$result4 = mysqli_query($dbCon, $query4);
				
				if( $result !== false or $result1 !== false or $result2 !== false or $result3 !== false or $result4 !== false) 
				{ 
						mysqli_commit($dbCon);
				} 
				else 
					if(!mysqli_commit($dbCon))
					{
						mysqli_rollback($dbCon);
						
					} 
				//echo $query; die;
				
				
				
				if(isset($_POST['staylogin']))
				{
				setcookie("email", $userid , $expire);
				}
                if($row['get_started_wizard_status'] == 0)
                    {
                         $_SESSION['showpopup'] = 1;
                    }
                   /* else
                    {
						$_SESSION['user_id'] = $row['id'];
                        header("location:http://localhost/tele/get-started-wizard.php");
                        
                    }*/					
                     $_SESSION['user_id'] = $row['id'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['email'] = $row['email'];					 
					$_SESSION['created_on'] = $row['created_on'];					 
					 $date = date('Y-m-d H:i:s');
					 $last_login= "update user_logins set last_login ="."'".$date."'"."where id=".$_SESSION['user_id'];
					 mysqli_query($dbCon, $last_login);
					$to = $me['email'];
					$subject = "Telezales - Verify your email";
					$emailContent = "Welcome to teleZales.";
					$from = "admin@telezales.com";
					$headers = "From:" . $from;
					sendEmail($subject, $to, $emailContent  );
					header("location: savename.php");
				}
                
	}
	catch(FacebookApiException $error)
	{
		echo $errror->getMessage();
	}
}
    else
    {
        
         // echo "session error <br/>";
		 
    }
if($me)
{
	$query1 = 'select id,concat_ws(" ",first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where email = "'.$me['email'].'"';
	$row = mysqli_fetch_array(mysqli_query($dbCon, $query1));
	$get_company = "select id,company_name,created_on from user_employements where user_logins_id=".$row['id']." and current_job =1";
						$row_comp = mysqli_fetch_array(mysqli_query($dbCon,$get_company ));
						$_SESSION['comp_id'] = $row_comp['id'];
						$_SESSION['comp_name'] = $row_comp['company_name'];
						$_SESSION['comp_date'] = $row_comp['created_on'];
	$_SESSION['user_id'] = $row['id'];
	$_SESSION['name'] = $row['name'];
	$_SESSION['email'] = $row['email'];				 
	$_SESSION['created_on'] = $row['created_on'];	
	header("location:http://www.qmatchup.com/beta/profile-user-cv.php");
}
else
{
	$fb = $facebook->getLoginUrl(array(
		'scope' => 'email,user_birthday,user_location,user_education_history,user_work_history,user_photos'
	));
}
?>
<?php
if(isset($_GET['error_code']))
{
$warning = "Access Denied";
}
elseif(isset($_GET['error_description']))
{
$warning =  strip_tags($_GET['error_description']);
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="usercss/images/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="usercss/css/style.css">
<link href="usercss/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" media="all">
<title>Qmatchup</title>
<script type="text/javascript" src="usercss/js/jquery.js"></script>
</head>
<body>
<!--<div class="column_m header blue_bg">
  <div class="wrap">
    <div class="logo padt10"><a href="index.php"><img src="usercss/images/qmatchup_logo.png" alt="Qmatchup" title="Qmatchup" /></a></div>
    <div class="usermenu">
      <ul>
        <li class="right active"><a href="index.php">SIGN IN</a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
</div>

<div class="column_m container padt20">
  <div class="wrap white_bg font_opnsns">
    <div class="pad20">
      <div class="twth_clmn">
        <div class="padr30">
          <div class="padb30">
            <h2 class="cyanblue_txt fsz28 bold padb5">Drive your business to success!</h2>
            <p class="green_txt fsz18 pabd30">You are one simple login away.</p>
            <div class="clear"></div>
            <div class="column_m padt15">
            <div class="fleft marr20 padl20"><img class="marb20" src="usercss/images/registration_icon_set.png" width="71" height="279" alt="." title="."></div>
            <div>
              <h3 class="cyanblue_txt padb5 bold">Complete ONE Job Form</h3>
              <p class="padb30">Don't waste time looking for vendors all over the internet. Describe your project ONE time, in one Job form, with no Fees. Once submitted we will get to work looking for talents that are a good fit based on your requirements and budget.</p>
              <h3 class="cyanblue_txt padtb5 bold">Receive Bids</h3>
              <p class="padb30">Once we find your matches we will invite them to bid on your project. You will receive bids from all fitted Contractors that are interested to deliver on your project.</p>
              <h3 class="cyanblue_txt padtb5 bold">Match Up</h3>
              <p class="pad0">All bids will be presented to you in our proposal dashboard. You can easily make vertical searches based on the criterias important to you, and decide which contractor to work with. After the selection process we reveal your ID to the contractor.</p>
            </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="onth_clmn">
        <div class="column_m">
          <div class="blue_bg_brdr_bx signup_bx">
            <div class="pad15">
			
			<form action="" method="POST" id="loginform" onsubmit="return validateLogin();">
              <div class="column_m font_opnsns">
                <h2 class="fsz22 cyanblue_txt bold padb5">Opps, you got logged out!</h2>
                <p class="fsz14">Don't worry, just log back in</p>
                <div class="column_m">
                  <div class="tw_clmn talr"><a href="<?php echo $fb; ?>">  <img src="usercss/images/fb_sign_btn.png" width="119" height="29" alt="Sign in with facebook" class="marr5"> </a></div>
                  <div class="tw_clmn tall"> <a href="#" > <img src="usercss/images/tw_sign_btn.png" width="119" height="29" alt="Sign in with Linkedin" class="marl5"></a> </div>
                </div>
                <div class="column_m padtb20 talc"><img src="usercss/images/or_sep.png" width="247" height="11" alt="or"></div>
                <div class="column_m">
                  <input type="text" class="text_field" name="username" id="username" required="required" placeholder="Enter Email Address" />
                </div>
                <div class="column_m padt10">
                  <input type="password" name="password" id="password" required="required" class="text_field" placeholder="Enter Password" />
                </div>
                
				   <?php if(isset($warning)) {?>
				   <h4 style="color: red">
					<?php echo $warning; ?>
				   </h4>
				  <?php }?>
                <div class="column_m padt25 talc">
                  <input type="submit" value="Sign in" class="green_submit_btn wi_60" />
				  <input type="hidden" name="login" >
                </div>
              </div>
			</form>  
			  
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
        </div>
        <div class="column_m padt15">
          <div class="fleft"><img src="usercss/images/trustus.png" width="72" height="75" alt="Trust us" class="marrl15" /></div>
          <div class="padt15">
            <p class="bold padb5 fsz14">Questions? we will help you</p>
            <p>Call <span class="bold fsz18 cyanblue_txt">+01 356 795 942 12</span></p>
          </div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<div class="column_m padt30">
  <div class="column_m footermain">
    <div class="wrap">
      <div class="column_m padt30">
        <div class="for_clmn">
          <h2 class="fsz26 cyanblue_txt bold font_opnsns">QMatchup</h2>
          <p class="lgn_hight_18">Qmatchup helps clients proqure prequalified outsourcing services. With our global network of pre qualified contractors we have helped thousands of clients get exactly what they whant, when they whant it. </p>
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
      <div class="column_m padtb10">&copy; 1998 – 2014 QMatchup, Inc. All rights reserved.</div>
      <div class="clear"></div>
    </div>
  </div>
</div>
-->
<script type="text/javascript" src="usercss/js/jquery-ui.min.js"></script> 
<script type="text/javascript" src="usercss/js/superfish.js"></script> 
<script type="text/javascript" src="usercss/js/icheck.js"></script> 
<script type="text/javascript" src="usercss/js/jquery.selectric.min.js"></script> 
<script type="text/javascript" src="usercss/js/jquery.cycle.lite.js"></script> 
<script type="text/javascript" src="usercss/js/custom.js"></script> 
<script type="text/javascript"> 
        $(function() {
            var offset = $(".signup_bx").offset();
            var topPadding = 15;
            $(window).scroll(function() {
                if ($(window).scrollTop() > offset.top) {
                    $(".signup_bx").stop().animate({
                        marginTop: $(window).scrollTop() - offset.top + topPadding
                    });
                } else {
                    $(".signup_bx").stop().animate({
                        marginTop: 0
                    });
                };
            });
        });
		
		
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
</body>

</html>