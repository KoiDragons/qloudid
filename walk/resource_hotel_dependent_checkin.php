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
//echo 'jain'; die;

	 		
$query="select user_logins.id,zipcode,first_name,last_name,email,country_of_residence,user_profiles.city,user_profiles.state,phone_number,address,port_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=(select user_id from oauth_check_user where access_token='".$auth_code."')";
//echo json_encode(array('type'=>$query)); die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
   
  $query="select company_id,client_id,pay_from from oauth_clients where client_id=(select client_id from oauth_check_user where access_token='".$auth_code."')";
//echo $query; die;
  $row_seller_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
   
  $query="select * from user_certificates where client_id='".$row_seller_company['client_id']."' and user_id='".$row['id']."'";
//echo $query; die;
  $row_certificate=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
//echo json_encode($row_certificate,true); die;
 
			 
 $query="update user_certificates set login_started_for=null,login_status=0,client_id=null,login_type=1,purchased_for=0,delivery_address_id=null,delivered_at=0,card_id=null,session_info=null,total_price=null,delivery_type=0,pickup_address_id=null,hotel_checkin_id=null,dependents_id=null,pay_for_food=0 where user_id='".$row['id']."'";
	$result=(mysqli_query($dbCon,$query)); 
	 
			$a=explode(',',$row_certificate['dependents_id']) ;
			$idh=encrypt_decrypt('decrypt',$row_certificate['hotel_checkin_id']);
			$verified=1;
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into hotel_checkout_dependent_detail(dependent_id,hotel_checkout_id,created_on,is_verified) values (?, ?, now(),?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii",$key,$idh,$verified);
			$stmt->execute();	
			}
			
			$rowP=array();
			$rowP['qloud_checkout_id']=$row_certificate['hotel_checkin_id'];
			$rowP['dependents_id']=$row_certificate['dependents_id'];
			echo json_encode($rowP,true); die;
	  
?>