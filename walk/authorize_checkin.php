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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="<?php echo $path;?>html/usercontent/js/Duplicate.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
	
	 
	<script type="text/javascript">
  $(document).ready(function () {
            if (window.IsDuplicate()) {
                swal ( "Oops" ,  "This is duplicate window\n\n Closing..." ,  "error" );
                window.close();
            }
        });
     
function changeBg(id)
{
					if($("#"+id).hasClass('lgtgrey2_bg'))
						{
							$(".yellow_bg").addClass('lgtgrey2_bg');
							$(".yellow_bg").removeClass('yellow_bg');
							$(".yellow_bg").closest("a").addClass('lgtgrey2_bg');
							$("#"+id).removeClass('lgtgrey2_bg');
							$("#"+id).addClass('yellow_bg');
							$(".get"+id).closest("a").removeClass('lgtgrey2_bg');
							$("#com").val(id);
						}
						else
						{
							$("#"+id).addClass('lgtgrey2_bg');
							$("#"+id).removeClass('yellow_bg');
							$(".get"+id).closest("a").removeClass('lgtgrey2_bg');
							$("#com").val();
						}
					}
					
					function submitForm()
					{
						document.getElementById("save_indexing").submit();
					}
					</script>
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
 if (empty($_POST)) {
 exit('<body class="white_bg"  >
 <form method="post" id="save_indexing" name="save_indexing">
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
				 
				<div class="mart30 padrl10 talc">
				<input type="submit" value="Yes" name="authorized" class="wi_100 maxwi_100 brdrad3 hei_50p diblock nobrd green_bg fsz18 white_txt curp" >
				
			</div>
   
				</div>
				</div>
 </div>
 </div>
 </div>
 
</form>
</body>');
 }
else
{
  $client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
		//$ip=encrypt_decrypt('encrypt',$ip);
		 
$query="select id,login_status,user_id from user_certificates where login_started_for='".$ip."'";
//echo $query; die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
   
$is_authorized = ($_POST['authorized'] === 'Yes');

$server->handleAuthorizeRequest($request, $response, $is_authorized);
if ($is_authorized) {
 
  $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
  $query="insert into oauth_check_user (user_id,code,created_on,client_id) values (".$row['user_id'].",'".$code."',now(),'".$_GET['client_id']."')";
  mysqli_query($dbCon, $query);
  
}
 //$response->setHttpHeader('Location',$response->getHttpHeader('Location').'&company=12345'); 
//var_dump($response->getParameters()); 
//var_dump($response); die;
$response->send();
}

	
	

ob_end_flush();
?>

