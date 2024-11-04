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
  //echo json_encode($row); die;
  $query="select company_id,client_id,pay_from from oauth_clients where client_id=(select client_id from oauth_check_user where access_token='".$auth_code."')";
//echo $query; die;
  $row_seller_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
  //echo json_encode($row_seller_company); die;
  $query="select * from user_certificates where client_id='".$row_seller_company['client_id']."' and user_id='".$row['id']."'";
//echo $query; die;
  $row_certificate=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
			$id= encrypt_decrypt('decrypt',$row_certificate['session_info']);  
			
			$stmt = $dbCon->prepare("select payment_option from hotel_basic_information where id=(select hotel_id from hotel_checkout_detail where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPaymentOption = $result->fetch_assoc();
			if($rowPaymentOption['payment_option']==1)
			{
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
			
			$total_price=$row_certificate['total_price']*100;
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
 
	
			}
			else
			{
				$cuId='';
				$Chargeid=''; 
			}
 
 
	
  if($row_certificate['purchased_for']==0)
		{
			
		$stmt = $dbCon->prepare("select id from user_address where user_id= ? and is_personal_address=1");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row_certificate['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowAddress   = $result->fetch_assoc();	
		
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
		$rowP['delivery_address_id']=$rowAddress['id'];
		 
		}
		else
		{
		 
		
			$stmt = $dbCon->prepare("select id from property_location where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row_certificate['purchased_for']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddress = $result->fetch_assoc();	
		
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
		$rowP['qloud_checkout_id']=$row_certificate['session_info']; 
		$rowP['delivery_address_id']=$rowAddress['id'];
		}
		 
		$j=0;
			while($j==0)
					{
					$code=mt_rand(1111,9999); 
					$stmt = $dbCon->prepare("select id from hotel_checkout_detail where checkin_code=?");
					/* bind parameters for markers */
					$stmt->bind_param("s",$code);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowCode = $result->fetch_assoc();
					if(empty($rowCode))
					{
						$j++;
					}
					}
					
				
			$id= encrypt_decrypt('decrypt',$rowP['qloud_checkout_id']);  
			
			$stmt = $dbCon->prepare("select hotel_property_type,checkin_booking_date,room_type_id from hotel_checkout_detail where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheckinType = $result->fetch_assoc();
			
			$rowP['room_type_id_enc']=encrypt_decrypt('encrypt',$rowCheckinType['room_type_id']);  
			
			$checkin_booking_date=$rowCheckinType['checkin_booking_date'];
			if($rowCheckinType['hotel_property_type']==1)
			{
			$stmt = $dbCon->prepare("select hotel_basic_information.id,hotel_name,booking_checkin_type,hotel_basic_information.property_id   from company_hotel_room_type_detail left join hotel_room_type on hotel_room_type.id=company_hotel_room_type_detail.room_type left join hotel_basic_information on company_hotel_room_type_detail.location_id=hotel_basic_information.property_id left join property_location on property_location.id=hotel_basic_information.property_id where company_hotel_room_type_detail.id=(select room_type_id from hotel_checkout_detail where id=?) ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheckinType = $result->fetch_assoc();	
			}
			else
			{
			$rowCheckinType['booking_checkin_type']=1;
			$rowCheckinType['id']=0;
			$rowCheckinType['property_id']=0;
			}
			
			 
			
			$stmt = $dbCon->prepare("update hotel_checkout_detail set payment_option=?,chekin_type=?,is_paid=1, buyer_id=?, card_id=?,cust_id=?,transection_id=?,is_buyer_company=?,user_id=?,checkin_code=?,hotel_id=?,property_id=?,room_cleaning_date=?,delivery_address_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iiiissiisiisii",$rowPaymentOption['payment_option'],$rowCheckinType['booking_checkin_type'],$rowP['buyer_id'],$rowP['card_id'],$rowP['customer_id'],$rowP['charge_id'],$rowP['user'],$rowP['user_id'],$code,$rowCheckinType['id'],$rowCheckinType['property_id'],$checkin_booking_date,$rowP['delivery_address_id'], $id);
			$stmt->execute();
			
			$rowP['booking_checkin_type']=$rowCheckinType['booking_checkin_type'];
			$rowP['hotel_id']=$rowCheckinType['id'];
			$rowP['property_id']=$rowCheckinType['property_id'];
			$rowP['code']=$code;
			$rowP['email']=$row['email'];
			$query="update user_certificates set login_started_for=null,login_status=0,client_id=null,login_type=1,purchased_for=0,delivery_address_id=null,delivered_at=0,card_id=null,session_info=null,total_price=null,delivery_type=0,pickup_address_id=null,hotel_checkin_id=null,dependents_id=null,pay_for_food=0 where user_id='".$row['id']."'";
			$result=(mysqli_query($dbCon,$query)); 
			echo json_encode($rowP,true); die;
	  
?>