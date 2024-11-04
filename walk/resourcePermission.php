<?php // include our OAuth2 Server object
// include our OAuth2 Server object
require_once 'server.php';
include '../configs/database.php';
include '../configs/encrypt_decrypt.php';
$dbCon= connect_database("");
// Handle a request to a resource and authenticate the access token
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $server->getResponse()->send();
    die;
}
$req = OAuth2\Request::createFromGlobals();
$auth_code = $req->request('access_token');
$client_id = $req->request('client_id');
$query="select first_name,last_name,email from user_logins where id=(select user_id from oauth_check_user where access_token='".$auth_code."')";
//echo $query; die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  $query="select company_id from oauth_clients where client_id='".$client_id."'";
//echo $query; die;
  $row_seller=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  $query="select user_company_id,user_id from oauth_check_user where access_token='".$auth_code."'";
//echo $query; die;
  $row_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  
  if($row_company['user_company_id']==null || empty($row_company['user_company_id']))
  {
	  echo json_encode(array('first_name' => $row['first_name'], 'last_name' => $row['last_name'], 'email' => $row['email'])); die;
  }
  else
  {
	 /* $query="insert into oauth_permission_check (seller_company_id,user_company_id,user_email,created_on) values(".$row_seller['company_id'].",".$row_company['user_company_id'].",'".$row['email']."',now())";
	  $result=mysqli_query($dbCon, $query);*/
	   $query="select credit_limit from companies where id=".$row_seller['company_id'];
//echo $query; die;
  $row_credit=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  if($row_credit['credit_limit']==0)
  {
	  echo json_encode(array('error_message' => 'You do not have sufficient credits to verify.')); die;
  }
  else
  {
	   $query="select company_permission from user_company_profile where user_login_id=".$row_company['user_id']." and company_id=".$row_company['user_company_id'];
//echo $query; die;
  $row_employee=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  $query="update companies set credit_limit=".($row_credit['credit_limit']-1)." where id=".$row_seller['company_id'];
  $result=mysqli_query($dbCon, $query);
  if($row_employee['company_permission']==1)
  {
	  $out='Yes';
  }
  else
  {
	  $out='No';
  }
  
  echo json_encode(array('permission' => $out)); die;
  }
  }

?>