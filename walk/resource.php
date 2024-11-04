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
//echo $auth_code; die;
$query="select zipcode,first_name,last_name,email,country_of_residence,user_profiles.city,user_profiles.state,phone_number,address,port_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=(select user_id from oauth_check_user where access_token='".$auth_code."')";
//echo json_encode(array('type'=>$query)); die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
  $query="select company_id from oauth_clients where client_id=(select client_id from oauth_check_user where access_token='".$auth_code."')";
//echo $query; die;
  $row_seller_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  
  
  $query="select user_company_id,user_id from oauth_check_user where access_token='".$auth_code."'";
//echo $query; die;
  $row_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
  if($row_company['user_company_id']==null || empty($row_company['user_company_id']))
  {
	  if(isset($_GET['login']))
	  {
		   echo json_encode(array('type'=>'login','first_name' => $row['first_name'], 'last_name' => $row['last_name'], 'email' => $row['email'], 'country_of_residence'=>$row['country_of_residence'])); die;
	  }
	  else   if(isset($_GET['signin']))
	  {
		  echo json_encode(array('type'=>'Invalid request')); die;
	  }
	  else
	  { 
  echo json_encode(array('type'=>'purchase','first_name' => $row['first_name'], 'last_name' => $row['last_name'], 'email' => $row['email'], 'country_of_residence'=>$row['country_of_residence'], 'seller_company_id'=>$row_seller_company['company_id'], 'city'=>$row['city'], 'state'=>$row['state'], 'phone_number'=>$row['phone_number'], 'address'=>$row['address'], 'port_number'=>$row['port_number'], 'zipcode'=>$row['zipcode'], 'user'=>'1')); die;
		}
	  
  }
  else
  {
	  
	   $query="select employees.id,company_name,first_name,last_name,email,company_email,address,cid,zip,company_profiles.city,companies.country_id,company_profiles.phone from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=employees.company_id where employees.user_login_id=".$row_company['user_id']." and employees.company_id=".$row_company['user_company_id'];
//echo $query; die;
  $row_employee=mysqli_fetch_array(mysqli_query($dbCon, $query));
  $emp_id=encrypt_decrypt('encrypt',$row_employee['id']);
   if(isset($_GET['login']))
	  {
  echo json_encode(array('type'=>'login','first_name' => $row_employee['first_name'], 'last_name' => $row_employee['last_name'], 'email' => $row_employee['email'], 'company_name' => $row_employee['company_name'],'company_email' => $row_employee['company_email'], 'emp_uniq_code'=>$emp_id)); die;
	  }
	  else   if(isset($_GET['signin']))
	  {
		  echo json_encode(array('type'=>'Invalid request')); die;
	  }
	   else
	  { 
  echo json_encode(array('type'=>'purchase','first_name' => $row_employee['first_name'], 'last_name' => $row_employee['last_name'], 'email' => $row_employee['email'], 'company_name' => $row_employee['company_name'], 'emp_uniq_code'=>$emp_id, 'address'=>$row_employee['address'], 'cid'=>$row_employee['cid'], 'zip'=>$row_employee['zip'], 'city'=>$row_employee['city'], 'seller_company_id'=>$row_seller_company['company_id'],  'state'=>$row['state'], 'phone_number'=>$row['phone_number'], 'port_number'=>$row['port_number'], 'country_id'=>$row_employee['country_id'], 'phone'=>$row_employee['phone'], 'user'=>'0')); die;
	  }
  }

?>