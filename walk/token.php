<?php 
// include our OAuth2 Server object
require_once 'server.php';
include '../configs/database.php';

$dbCon= connect_database("");
// Handle a request for an OAuth2.0 Access Token and send the response to the client
//$a="jain";
//echo $a; die;
//echo $_REQUEST['code']; die;
$req = OAuth2\Request::createFromGlobals();

$response= $server->handleTokenRequest(OAuth2\Request::createFromGlobals());
$auth_code = $req->request('code');
 
$access_token=$response->getParameter('access_token');
//echo $auth_code.'jain';
//echo $access_token; die;
if(!empty($auth_code) && !empty($access_token)){
	
	$query="update oauth_check_user set access_token='".$access_token."' where code='".$auth_code."'";
	//echo $query; die;
	mysqli_query($dbCon, $query);
}
$response->send();





?>