<?php 
ob_start();
require_once 'server.php';
require_once '../configs/database.php';
include '../configs/checklogin.php';
$path="../";
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Qmatchup</title>
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
<script type="text/javascript" src="../html/usercontent/js/jquery.js"></script>
<script type="text/javascript" src="../html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="../html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="../html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="../html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="../html/usercontent/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="../html/usercontent/modules.js"></script>
<script type="text/javascript" src="../html/usercontent/js/custom.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<script>
function changeBg(id)
{
					if($("#"+id).hasClass('white_bg'))
						{
							$(".yellow_bg").addClass('white_bg');
							$(".yellow_bg").removeClass('yellow_bg');
							$(".yellow_bg").closest("a").addClass('white_bg');
							$("#"+id).removeClass('white_bg');
							$("#"+id).addClass('yellow_bg');
							$(".get"+id).closest("a").removeClass('white_bg');
							$("#com").val(id);
						}
						else
						{
							$("#"+id).addClass('white_bg');
							$("#"+id).removeClass('yellow_bg');
							$(".get"+id).closest("a").removeClass('white_bg');
							$("#com").val();
						}
					}
					</script>
</head>
<body class="lgtblue2_bg">
<?php


// if user's session is not valid then redirecting him to login page
if(!checkLogin())
{
	//echo "logout"; die;
	 if(isset($_GET['apply']))
  {
	  header('Location: ../user/index.php/LoginAccount?next='.$_GET['client_id'].'&apply=1');
  }
  else  if(isset($_GET['purchase']))
  {
	  header('Location: ../user/index.php/LoginAccount?next='.$_GET['client_id'].'&purchase=1');
  }
   else  if(isset($_GET['login']))
  {
	  header('Location: ../user/index.php/LoginAccount?next='.$_GET['client_id'].'&login=1');
  }
}
else
{
	//print_r($_SESSION); die;
if(isset($_SESSION['rememberme']) && ($_SESSION['rememberme'] != "" || !empty($_SESSION['rememberme']))) {
		setcookie('rememberme', $_SESSION['rememberme'], time()+ (30*60*60*24), '/', "qmatchup.com");
		//echo "done";die;
	}
//echo "jain"; die;
//print_r($_SESSION); die;
$dbCon= connect_database("");
$query="select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,country_of_residence from user_logins where id =".$_SESSION['user_id'];
//echo $query; die;
  $row_summary=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  include '../user/UserHeaderApi.php';
  
$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();

// validate the authorize request
if (!$server->validateAuthorizeRequest($request, $response)) {
    $response->send();
    die;
}
// display an authorization form
if (empty($_POST)) {
	$query="select company_name from companies where id=(select company_id from oauth_clients where client_id='".$_GET['client_id']."')";
//echo $query; die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
  $query="select id,company_name from companies where id in (select company_id from employees where user_login_id=".$_SESSION['user_id'].") and o_type=1 order by company_name desc limit 0,20";
//echo $query; die;
  $result_1=mysqli_query($dbCon, $query);
  
  $query="select id,company_name from companies where id in (select company_id from employees where user_login_id=".$_SESSION['user_id'].") and o_type=2 order by id desc ";
//echo $query; die;
  $result_2=mysqli_query($dbCon, $query);
  
  $query="select id,company_name from companies where id in (select company_id from employees where user_login_id=".$_SESSION['user_id'].") and o_type=3 order by id desc ";
//echo $query; die;
  $result_3=mysqli_query($dbCon, $query);
  $s="";
  while($row1=mysqli_fetch_array($result_1))
  {
	  
  $s=$s.'<div class="wi_360p dtrow brdrad5 mart5 talc">
						<div class="dflex fxdir_col justc_sb alit_c talc brdrad5 white_bg marrl0" id="'.$row1['id'].'">
					
							<a href="#" class="white_bg default_view rbrdr wi_100 mart5 pad10 hei_50p fsz18 llgrey_txt get'.$row1['id'].'" onclick="changeBg('.$row1['id'].');">
								<span class="dnone_pa">'.$row1['company_name'].'</span>
								
							</a>
						</div>
					</div>';
/* $s= $s.'
'.$row1['company_name'].'  <input type="radio" name="com" value="'.$row1['id'].'" ><br/>';*/
 
  }
  if(!empty($s) || $s!="")
  {
	  $s='<br />'.$s.'<br/>';
  }
  
   $r="";
  while($row1=mysqli_fetch_array($result_2))
  {
	  
  
 $r= $r.'
'.$row1['company_name'].'  <input type="radio" name="com" value="'.$row1['id'].'" ><br/>';
 
  }
  if(!empty($r) || $r!="")
  {
	  $r='<label><strong>Schools</strong></label><br />'.$r.'<br/>';
  }
  
  
   $t="";
  while($row1=mysqli_fetch_array($result_3))
  {
	  
  
 $t= $t.'
'.$row1['company_name'].'  <input type="radio" name="com" value="'.$row1['id'].'" ><br/>';
 
  }
  if(!empty($t) || $t!="")
  {
	  $t='<label><strong class="talc fsz20">Landlord</strong></label><br />'.$t.'<br/>';
  }
  
  if(isset($_GET['apply']))
  {
	 exit('
<form method="post">
<div class="column_m pos_rel">
		<!-- CONTENT -->
		<div class="column_m container zi5  mart10 xs-mart40" onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
					<div class="talc fsz75 green_txt"> <span class="fas fa-question-circle"></span></div>
					<div class="padb10 ">
					<h1 class="padb5 talc fsz45 xs-fsz40 bold ">Åtkomst</h1>
						<p class="pad0 xs-padb10 talc fsz22 xs-fsz20 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Välj en profil att logga in med</p>
					</div>
				
				
				<div class="container padrl0 xs-padrl0">
						
						
				
				<div class="wi_100  dflex fxwrap_w alit_s  marb10 mart20 padrl10" id="sales_popup_boxes">
				
				</div>
 <div class="mart30 padrl10 talc">
				<input type="submit" value="yes" name="authorized" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" />
				
			</div>
  <div class="mart10 talc padrl10">
					<input type="submit" value="no" name="authorized" class=" wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd trans_bg fsz18 black_txt curp"/>
					
					<input type="hidden" name="com" id="com" value="0"/>
					</div>
				</div>
				</div>
 </div>
 </div>
 </div>
</form>');  
  }
  else
  {
  exit('
<form method="post">
<div class="column_m pos_rel">
		<!-- CONTENT -->
			<div class="column_m container zi5  mart10 xs-mart40" onclick="checkFlag();">
			<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
				
				<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10  xs-pad0  ">
					<div class="talc fsz75 green_txt"> <span class="fas fa-question-circle"></span></div>
					<div class="padb10 ">
					<h1 class="padb5 talc fsz45 xs-fsz40 bold ">Åtkomst</h1>
						<p class="pad0 xs-padb10 talc fsz22 xs-fsz20 padb0 wi_720p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb10 ">Välj en profil att logga in med</p>
					</div>
				
				
				<div class="container padrl0 xs-padrl0">
						
						
				
				<div class="wi_100  dflex fxwrap_w alit_s  marb10 mart20 padrl10" id="sales_popup_boxes">
				'.$s.'
				</div>
				<div class="mart30 padrl10 talc">
				<input type="submit" value="yes" name="authorized" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" >
				
			</div>
  <div class="mart10 padrl10 talc">
					<input type="submit" value="no" name="authorized" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd trans_bg fsz18 black_txt curp"/>
					
					<input type="hidden" name="com" id="com" value="0"/>
					</div>
				</div>
				</div>
 </div>
 </div>
 </div>
 
</form>');
  }
}

// print the authorization code if the user has authorized your client
$is_authorized = ($_POST['authorized'] === 'yes');
//$is_authorized1 = ($_POST['authorized'] === 'yes');
$server->handleAuthorizeRequest($request, $response, $is_authorized);
if ($is_authorized) {
	$query="select id from companies where id=(select company_id from oauth_clients where client_id='".$_GET['client_id']."')";
//echo $query; die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
  $event=-1;
  if(isset($_GET['apply']))
	  {
		$event=2;  
	  }
	  else if(isset($_GET['purchase']))
	  {
		  $event=1; 
	  }
		else if(isset($_GET['login']))
	  {
		  $event=0; 
	  }  
  // this is only here so that you get to see your code in the cURL request. Otherwise, we'd redirect back to the client
  $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
  if(isset($_POST['com']))
  {
	  
	  //1. Userid , EVENT, on company behalf, third-party_company_id
	  //Event: 0=> Login, 1 => Purchase , 2=> Apply on job
	  if($_POST['com']==0)
	  {
		  $query="insert into api_user_logs (event,user_id,client_company_id,created_on) values (".$event.",".$_SESSION['user_id'].",'".$row['id']."',now())";
	    mysqli_query($dbCon, $query);
$query="insert into oauth_check_user (user_id,code,created_on) values (".$_SESSION['user_id'].",'".$code."',now())";
 mysqli_query($dbCon, $query);
		  }
		  
		  else
		  {
			  $query="insert into api_user_logs (event,user_id,client_company_id,created_on,login_company_id) values (".$event.",".$_SESSION['user_id'].",'".$row['id']."',now(),".$_POST['com'].")";
	    mysqli_query($dbCon, $query);
		
	  $query="insert into oauth_check_user (user_id,code,created_on,user_company_id) values (".$_SESSION['user_id'].",'".$code."',now(),".$_POST['com'].")";
	   mysqli_query($dbCon, $query);
			  }
	   
  }
  else
  {
	  //1. Userid , EVENT,  third-party_company_id
	  $query="insert into api_user_logs (event,user_id,client_company_id,created_on) values (".$event.",".$_SESSION['user_id'].",'".$row['id']."',now())";
	    mysqli_query($dbCon, $query);
$query="insert into oauth_check_user (user_id,code,created_on) values (".$_SESSION['user_id'].",'".$code."',now())";
 mysqli_query($dbCon, $query);
  }
//echo $query; die;
 
  //store in database with user ID and get user id from session
  //exit("SUCCESS! Authorization Code: $code");
  
}
 //$response->setHttpHeader('Location',$response->getHttpHeader('Location').'&company=12345'); 
//var_dump($response->getParameters()); 
//var_dump($response); die;
$response->send();
	
	
}
ob_end_flush();
?>

</body>