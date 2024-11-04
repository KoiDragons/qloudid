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
</head>
<?php 

$dbCon= connect_database("");

  include '../user/UserHeaderApi.php';
$request = OAuth2\Request::createFromGlobals();
$response = new OAuth2\Response();
 
// validate the authorize request
if (!$server->validateAuthorizeRequest($request, $response)) {
    $response->send();
    die;
}
if(empty($_POST))
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
				<input type="submit" value="Yes" name="authorized" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd green_bg fsz18 white_txt curp" />
				
			</div>
  <div class="mart10 talc padrl10">
					<input type="submit" value="No" name="authorized" class=" wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd trans_bg fsz18 red_txt curp"/>
					
					<input type="hidden" name="com" id="com" value="0"/>
					</div>
				</div>
				</div>
 </div>
 </div>
 </div>
</form>');  
}
$is_authorized = ($_POST['authorized'] === 'Yes');

$server->handleAuthorizeRequest($request, $response, $is_authorized);
if ($is_authorized) {
	$event=2;
 $query="select id from companies where id=(select company_id from oauth_clients where client_id='".$_GET['client_id']."')";
//echo $query; die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
   
}
 //$response->setHttpHeader('Location',$response->getHttpHeader('Location').'&company=12345'); die;
//var_dump($response->getParameters()); die;
//var_dump($response); die;
$response->send();
	
	

ob_end_flush();
?>