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
$query="select user_logins.id,zipcode,first_name,last_name,email,country_of_residence,user_profiles.city,user_profiles.state,phone_number,address,port_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=(select user_id from oauth_check_user where access_token='".$auth_code."')";
//echo json_encode(array('type'=>$query)); die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
 
  $query="select company_id,client_id,pay_from from oauth_clients where client_id=(select client_id from oauth_check_user where access_token='".$auth_code."')";
//echo $query; die;
  $row_seller_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
  //echo json_encode($row_seller_company); die;
  $query="select * from user_certificates where client_id='".$row_seller_company['client_id']."' and user_id='".$row['id']."'";
//echo $query; die;
  $row_certificate=mysqli_fetch_array(mysqli_query($dbCon, $query));
 
  $rowP=array();
$id= encrypt_decrypt('decrypt',$row_certificate['session_info']);  
 if($row_certificate['pay_for_food']==1)
 {
	 if($id==0)
	 {
		$query="select sum(total_price) as price from hotel_roomservice_item_ordered where qloud_checkout_id='".$id."' and is_verified=0 and service_type=5 and booking_person_id=".$row['id'];  
	 }
	 else
	 {
		$query="select sum(total_price) as price from hotel_roomservice_item_ordered where qloud_checkout_id='".$id."' and is_verified=0 and service_type=".$row_certificate['service_type']; 
	 }
	 
 
  $row_price=mysqli_fetch_array(mysqli_query($dbCon, $query));
	
	$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2030&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$row['first_name']."&email=".$row['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$total_price=$row_price['price']*100;
			if($total_price<500)
			{
				$total_price=500;
			}
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$total_price."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
 


 
	
  if($row_certificate['purchased_for']==0)
		{
		$stmt = $dbCon->prepare("select * from user_cards where id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row_certificate['card_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowCards   = $result->fetch_assoc();	
		
		 $stmt = $dbCon->prepare("select phone_country_code.country_name,phone_country_code.country_code,zipcode,first_name,last_name,email,country_of_residence,user_profiles.invoice_city,user_profiles.state,phone_number,invoice_address,invoice_port,invoice_zipcode from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where user_logins.id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row_certificate['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowP    = $result->fetch_assoc();
		$rowP['user']=1;
		$rowP['buyer_id']=$row['id'];
		$rowP['card_id']=$row_certificate['card_id'];
		$rowP['user_id']=$row['id'];
		$rowP['card_number']=$rowCards['card_number'];
		$rowP['card_cvv']=$rowCards['card_cvv'];
		$rowP['exp_month']=$rowCards['exp_month'];
		$rowP['exp_year']=$rowCards['exp_year'];
		$rowP['name_on_card']=$rowCards['name_on_card'];
		$rowP['customer_id']=$cuId;
		$rowP['charge_id']=$Chargeid; 
		$rowP['qloud_checkout_id']=$row_certificate['session_info'];
		 
		}
		else
		{
		$stmt = $dbCon->prepare("select * from company_cards where id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row_certificate['card_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowCards   = $result->fetch_assoc();	
			
		 $stmt = $dbCon->prepare("select phone_country_code.country_name,phone_country_code.country_code,zipcode,first_name,last_name,email,country_of_residence,user_profiles.invoice_city,user_profiles.state,phone_number,invoice_address,invoice_port,invoice_zipcode from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join phone_country_code on user_logins.country_of_residence=phone_country_code.id where user_logins.id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row_certificate['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();	
			
		$stmt = $dbCon->prepare("select phone_country_code.country_name,phone_country_code.country_code, companies.country_id,cid,company_profiles.phone,country_id,company_email,company_name,property_location.id,street_name_v, city_v, postal_code_v, property_location.d_port_number,street_name_i as invoice_address,city_i as invoice_city,postal_code_i as invoice_zipcode,property_location.i_port_number as invoice_port from  property_location left join companies on companies.id=property_location.company_id left join phone_country_code on companies.country_id=phone_country_code.id left join company_profiles on companies.id=company_profiles.company_id where property_location.id in (select location_id from employee_location where employee_id in (select id from employees where user_login_id=? and company_id =?))");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $row_certificate['user_id'],$row_certificate['purchased_for']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowP   = $result->fetch_assoc();
		$rowP['user']=0;
		$rowP['card_id']=$row_certificate['card_id'];
		$rowP['buyer_id']=$row_certificate['purchased_for'];
		$rowP['user_id']=$row['id'];
		$rowP['user_country_code']=$rowUser['country_code'];
		$rowP['first_name']=$rowUser['first_name'];
		$rowP['last_name']=$rowUser['last_name'];
		$rowP['email']=$rowUser['email'];
		$rowP['card_number']=$rowCards['card_number'];
		$rowP['card_cvv']=$rowCards['card_cvv'];
		$rowP['exp_month']=$rowCards['exp_month'];
		$rowP['exp_year']=$rowCards['exp_year'];
		$rowP['name_on_card']=$rowCards['name_on_card'];
		$rowP['customer_id']=$cuId;
		$rowP['charge_id']=$Chargeid;
		$rowP['qloud_checkout_id']=$row_certificate['session_info']; 
		
		}
		$rowP['is_paid']=1;
	 	 	 
 }
		else
		{
			 
		$rowP['is_paid']=0;	
		$rowP['user']=1;
		$rowP['buyer_id']=$row['id'];
		$rowP['card_id']=0;
		$rowP['user_id']=$row['id'];
		$rowP['card_number']='';
		$rowP['card_cvv']='';
		$rowP['exp_month']='';
		$rowP['exp_year']='';
		$rowP['name_on_card']='';
		$rowP['customer_id']='';
		$rowP['charge_id']=''; 
		$rowP['qloud_checkout_id']=$row_certificate['session_info']; 
		 //print_r($rowP); die;
		
		 
		}
		$rowP['service_type']=$row_certificate['service_type']; 
		  
		if($rowP['service_type']==1 || $rowP['service_type']==2 || $rowP['service_type']==4)
		{
			if($id==0)
			{
			$query="update hotel_roomservice_item_ordered set is_verified=1,is_paid=1, company_id=".$rowP['buyer_id'].", card_id=".$rowP['card_id'].",customer_id='".$rowP['customer_id']."',charge_id='".$rowP['charge_id']."',is_user=".$rowP['user'].",user_id=".$rowP['user_id']." where qloud_checkout_id=".$id." and is_verified=0 and service_type=5 and booking_person_id=".$row['id'];	
			}
			else
			{
			$query="update hotel_roomservice_item_ordered set is_verified=1,is_paid=".$row_certificate['pay_for_food'].", company_id=".$rowP['buyer_id'].", card_id=".$rowP['card_id'].",customer_id='".$rowP['customer_id']."',charge_id='".$rowP['charge_id']."',is_user=".$rowP['user'].",user_id=".$rowP['user_id']." where qloud_checkout_id=".$id." and is_verified=0 and service_type=".$row_certificate['service_type'];	
			}
		
		//echo $query; die;
		$result=(mysqli_query($dbCon,$query)); 	
		}
		else
		{
		$query="update company_hotel_amenities_user_request set is_verified=1 where qloud_checkout_id=".$id." and is_verified=0";
		//echo $query; die;
		$result=(mysqli_query($dbCon,$query)); 		
		}
		   
			$rowP['email']=$row['email'];
			$query="update user_certificates set login_started_for=null,login_status=0,client_id=null,login_type=1,purchased_for=0,delivery_address_id=null,delivered_at=0,card_id=null,session_info=null,total_price=null,service_type=0,delivery_type=0,pickup_address_id=null,hotel_checkin_id=null,dependents_id=null,pay_for_food=0 where user_id='".$row['id']."'";
			$result=(mysqli_query($dbCon,$query)); 
			echo json_encode($rowP,true); die;
	  
?>