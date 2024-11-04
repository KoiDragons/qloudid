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
  $rowP=array();
   $rowP['email']=$row['email'];
  $query="select company_id,client_id,pay_from from oauth_clients where client_id=(select client_id from oauth_check_user where access_token='".$auth_code."')";
//echo $query; die;
  $row_seller_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
   
  $query="select * from user_certificates where client_id='".$row_seller_company['client_id']."' and user_id='".$row['id']."'";
//echo $query; die;
  $row_certificate=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
//echo json_encode($row_certificate,true); die;
 
			 
 $query="update user_certificates set login_started_for=null,login_status=0,client_id=null,login_type=1,purchased_for=0,delivery_address_id=null,delivered_at=0,card_id=null,session_info=null,total_price=null,delivery_type=0,pickup_address_id=null,hotel_checkin_id=null,dependents_id=null,pay_for_food=0 where user_id='".$row['id']."'";
	$result=(mysqli_query($dbCon,$query)); 
	
	
	 
			$id= encrypt_decrypt('decrypt',$row_certificate['session_info']);

			$stmt = $dbCon->prepare("select hotel_basic_information.id,hotel_name,booking_checkin_type,company_hotel_room_type_detail.id as room_type_id   from company_hotel_room_type_detail left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join hotel_basic_information on company_hotel_room_type_detail.location_id=hotel_basic_information.property_id left join property_location on property_location.id=hotel_basic_information.property_id where company_hotel_room_type_detail.id=(select room_type_id from hotel_checkout_detail where id=?) ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select id,box_number,room_id from hotel_insta_boxes where booking_id=? and in_use=1 and is_active=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowInstaBox = $result->fetch_assoc();
			if(empty($rowInstaBox))
			{
				
			$stmt = $dbCon->prepare("select * from hotel_room_detail where room_type=? and id not in(select room_id from hotel_checkout_detail where room_type_id=? and checked_in=1 and room_id is not null) and room_available=1 and id not in (select room_id from hotel_insta_boxes where hotel_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii",$row['room_type_id'],$row['room_type_id'],$row['id']);
			$stmt->execute();
			$resultCountId = $stmt->get_result();
			$rowCountId   = $result->fetch_assoc(); 	
				
			/*$select="select id,room_name,is_approved_cleaning from hotel_room_detail where room_type=".$row['room_type_id']." and id not in(select room_id from hotel_checkout_detail where room_type_id=".$row['room_type_id'].")";
			$resultCountId=mysqli_query($dbCon, $select);
			$rowCountId=mysqli_fetch_array($resultCountId);*/
			$rowP['is_cleaned']=$rowCountId['is_approved_cleaning'];
			$rowP['room_id']=$rowCountId['id'];
			$rowP['insta_id']=0;
			$today=strtotime(date('Y-m-d'))-100;			
			}
			else
			{
			$rowP['is_cleaned']=1;
			$rowP['room_id']=$rowInstaBox['room_id'];
			$rowP['insta_id']=$rowInstaBox['id'];	
			$rowP['box_number']='# 100-'.$rowInstaBox['box_number'];
			$today=strtotime(date('Y-m-d'));
			}
			
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$row_certificate['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowVerified = $result->fetch_assoc();
			$rowP['checkin_verified']=$rowVerified['num'];
			
			$stmt = $dbCon->prepare("update hotel_checkout_detail set checked_in=1,room_id=?,room_cleaning_date=?  where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isi",$rowP['room_id'],$today,$id);
			$stmt->execute();
			
			$rowP['hotel_id']="https://www.qloudid.com/public/index.php/InstaBox/welcome/".encrypt_decrypt('encrypt',$row['id']);
			
			$rowP['qloud_checkout_id']=$row_certificate['session_info'];
			$rowP['user_id']=$row_certificate['user_id'];
			echo json_encode($rowP,true); die;
	  
?>