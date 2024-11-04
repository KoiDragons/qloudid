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
  //echo json_encode($row); die;
  $query="select company_id,client_id,pay_from from oauth_clients where client_id=(select client_id from oauth_check_user where access_token='".$auth_code."')";
//echo $query; die;
  $row_seller_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  $query="select * from user_certificates where client_id='".$row_seller_company['client_id']."' and user_id='".$row['id']."'";
//echo $query; die;
  $row_certificate=mysqli_fetch_array(mysqli_query($dbCon, $query));
// echo json_encode($row_certificate); die;

if($row_seller_company['pay_from']==1)
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


 $query="update user_certificates set login_started_for=null,login_status=0,client_id=null where user_id='".$row['id']."'";
	$result=(mysqli_query($dbCon,$query)); 
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
		$rowP['card_number']=$rowCards['card_number'];
		$rowP['card_cvv']=$rowCards['card_cvv'];
		$rowP['exp_month']=$rowCards['exp_month'];
		$rowP['exp_year']=$rowCards['exp_year'];
		$rowP['name_on_card']=$rowCards['name_on_card'];
		$rowP['delivery_address_id']=$row_certificate['delivery_address_id'];
		$rowP['user_id']=$row_certificate['user_id'];
		$rowP['company_id']=$row_certificate['purchased_for'];
		if($row_certificate['delivered_at']==1)
		{
		 $stmt = $dbCon->prepare("select name_on_house, first_name,last_name,email,country_of_residence,user_address.city,user_address.address,user_address.port_number,user_address.zipcode from user_address left join user_logins on user_address.user_id=user_logins.id where user_address.id= ? ");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row_certificate['delivery_address_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowD    = $result->fetch_assoc();
		$rowP['company']=0;
		 $rowP['name_on_house']=$rowD['name_on_house'];
		 $rowP['address']=$rowD['address'];
		 $rowP['city']=$rowD['city'];
		 $rowP['zipcode']=$rowD['zipcode'];
		 $rowP['port_number']=$rowD['port_number'];
		 $rowP['customer_id']=$cuId;
		$rowP['transection_id']=$Chargeid;
		$rowP['delivery_address_id']=$row_certificate['delivery_address_id'];
		$rowP['card_id']=$row_certificate['card_id'];
		$rowP['user_id']=$row_certificate['user_id'];
		$rowP['company_id']=$row_certificate['purchased_for'];
		if($row_certificate['delivery_type']==1)
		{
		$query="select * from company_pickup_address where id='".$row_certificate['pickup_address_id']."'";
		//echo $query; die;
		  $row_pickup=mysqli_fetch_array(mysqli_query($dbCon, $query));	
		  $rowP['pickup_address']=$row_pickup['address'];
		  $rowP['pickup_port']=$row_pickup['port_number'];
		  $rowP['pickup_city']=$row_pickup['city'];
		  $rowP['pickup_state']=$row_pickup['state'];
		  $rowP['pickup_address_name']=$row_pickup['pickup_address_name'];
		  $rowP['pickup_type']=$row_certificate['delivery_type'];
		  $rowP['pickup_zipcode']=$row_pickup['zipcode'];
		}
		else
		{
			$rowP['pickup_zipcode']='';
		 $rowP['pickup_address']='';
		  $rowP['pickup_port']='';
		  $rowP['pickup_city']='';
		  $rowP['pickup_state']='';
		  $rowP['pickup_address_name']='';
		  $rowP['pickup_type']=$row_certificate['delivery_type'];	
		}
		 echo json_encode($rowP); die;
	
		}
		else
		{
		$stmt = $dbCon->prepare("select company_email as email,company_name as name_on_house,property_location.id,street_name_v as address, city_v as city, postal_code_v as zipcode, d_port_number as port_number,street_name_i,city_i,postal_code_i,i_port_number from  property_location left join companies on companies.id=property_location.company_id where property_location.id in (select location_id from employee_location where employee_id = (select id from employees where user_login_id=? and company_id =(select company_id from property_location where id=?)))");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $row_certificate['user_id'],$row_certificate['delivery_address_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowD   = $result->fetch_assoc();
		$rowP['company']=1;
		$rowP['name_on_house']=$rowD['name_on_house'];
		 $rowP['address']=$rowD['address'];
		 $rowP['city']=$rowD['city'];
		 $rowP['zipcode']=$rowD['zipcode'];
		 $rowP['port_number']=$rowD['port_number'];
		 $rowP['customer_id']=$cuId;
		$rowP['transection_id']=$Chargeid;
		$rowP['delivery_address_id']=$row_certificate['delivery_address_id'];
		$rowP['card_id']=$row_certificate['card_id'];
		$rowP['user_id']=$row_certificate['user_id'];
		$rowP['company_id']=$row_certificate['purchased_for'];
		if($row_certificate['delivery_type']==1)
		{
		$query="select * from company_pickup_address where id='".$row_certificate['pickup_address_id']."'";
		//echo $query; die;
		  $row_pickup=mysqli_fetch_array(mysqli_query($dbCon, $query));	
		  $rowP['pickup_address']=$row_pickup['address'];
		  $rowP['pickup_port']=$row_pickup['port_number'];
		  $rowP['pickup_city']=$row_pickup['city'];
		  $rowP['pickup_state']=$row_pickup['state'];
		  $rowP['pickup_address_name']=$row_pickup['pickup_address_name'];
		  $rowP['pickup_type']=$row_certificate['delivery_type'];
		  $rowP['pickup_zipcode']=$row_pickup['zipcode'];
		}
		else
		{
		$rowP['pickup_zipcode']='';
		 $rowP['pickup_address']='';
		  $rowP['pickup_port']='';
		  $rowP['pickup_city']='';
		  $rowP['pickup_state']='';
		  $rowP['pickup_address_name']='';
		  $rowP['pickup_type']=$row_certificate['delivery_type'];	
		}
		 echo json_encode($rowP); die;
		}
		
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
		$rowP['user_country_code']=$rowUser['country_code'];
		$rowP['first_name']=$rowUser['first_name'];
		$rowP['last_name']=$rowUser['last_name'];
		$rowP['email']=$rowUser['email'];
		$rowP['card_number']=$rowCards['card_number'];
		$rowP['card_cvv']=$rowCards['card_cvv'];
		$rowP['exp_month']=$rowCards['exp_month'];
		$rowP['exp_year']=$rowCards['exp_year'];
		$rowP['name_on_card']=$rowCards['name_on_card'];
		$rowP['delivery_address_id']=$row_certificate['delivery_address_id'];
		$rowP['card_id']=$row_certificate['card_id'];
		$rowP['user_id']=$row_certificate['user_id'];
		$rowP['company_id']=$row_certificate['purchased_for'];
		if($row_certificate['delivered_at']==1)
		{
		 $stmt = $dbCon->prepare("select name_on_house, first_name,last_name,email,country_of_residence,user_address.city,user_address.address,user_address.port_number,user_address.zipcode from user_address left join user_logins on user_address.user_id=user_logins.id where user_address.id= ? ");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row_certificate['delivery_address_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowD    = $result->fetch_assoc();
		$rowP['company']=0;
		$rowP['name_on_house']=$rowD['name_on_house'];
		$rowP['address']=$rowD['address'];
		 $rowP['city']=$rowD['city'];
		 $rowP['zipcode']=$rowD['zipcode'];
		 $rowP['port_number']=$rowD['port_number'];
		$rowP['customer_id']=$cuId;
		$rowP['transection_id']=$Chargeid;
		$rowP['delivery_address_id']=$row_certificate['delivery_address_id'];
		$rowP['card_id']=$row_certificate['card_id'];
		$rowP['user_id']=$row_certificate['user_id'];
		$rowP['company_id']=$row_certificate['purchased_for'];
		if($row_certificate['delivery_type']==1)
		{
		$query="select * from company_pickup_address where id='".$row_certificate['pickup_address_id']."'";
		//echo $query; die;
		  $row_pickup=mysqli_fetch_array(mysqli_query($dbCon, $query));	
		  $rowP['pickup_address']=$row_pickup['address'];
		  $rowP['pickup_port']=$row_pickup['port_number'];
		  $rowP['pickup_city']=$row_pickup['city'];
		  $rowP['pickup_state']=$row_pickup['state'];
		  $rowP['pickup_address_name']=$row_pickup['pickup_address_name'];
		  $rowP['pickup_type']=$row_certificate['delivery_type'];
		  $rowP['pickup_zipcode']=$row_pickup['zipcode'];
		}
		else
		{
			$rowP['pickup_zipcode']='';
		 $rowP['pickup_address']='';
		  $rowP['pickup_port']='';
		  $rowP['pickup_city']='';
		  $rowP['pickup_state']='';
		  $rowP['pickup_address_name']='';
		  $rowP['pickup_type']=$row_certificate['delivery_type'];	
		}
		echo json_encode($rowP); die;
		}
		else
		{
		$stmt = $dbCon->prepare("select phone_country_code.country_name,phone_country_code.country_code,companies.country_id,company_email as email,company_name as name_on_house,property_location.id,street_name_v as address, city_v as city, postal_code_v as zipcode, d_port_number as port_number,street_name_i,city_i,postal_code_i,i_port_number from  property_location left join companies on companies.id=property_location.company_id left join phone_country_code on companies.country_id=phone_country_code.id where property_location.id in (select location_id from employee_location where employee_id = (select id from employees where user_login_id=? and company_id =(select company_id from property_location where id=?)))");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $row_certificate['user_id'],$row_certificate['delivery_address_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowD   = $result->fetch_assoc();
		$rowP['company']=1;
		$rowP['name_on_house']=$rowD['name_on_house'];
		$rowP['address']=$rowD['address'];
		 $rowP['city']=$rowD['city'];
		 $rowP['zipcode']=$rowD['zipcode'];
		 $rowP['port_number']=$rowD['port_number'];
		$rowP['customer_id']=$cuId;
		$rowP['transection_id']=$Chargeid;
		$rowP['delivery_address_id']=$row_certificate['delivery_address_id'];
		$rowP['card_id']=$row_certificate['card_id'];
		$rowP['user_id']=$row_certificate['user_id'];
		$rowP['company_id']=$row_certificate['purchased_for'];
		if($row_certificate['delivery_type']==1)
		{
		  $query="select * from company_pickup_address where id='".$row_certificate['pickup_address_id']."'";
		  //echo $query; die;
		  $row_pickup=mysqli_fetch_array(mysqli_query($dbCon, $query));	
		  $rowP['pickup_address']=$row_pickup['address'];
		  $rowP['pickup_port']=$row_pickup['port_number'];
		  $rowP['pickup_city']=$row_pickup['city'];
		  $rowP['pickup_zipcode']=$row_pickup['zipcode'];
		  $rowP['pickup_state']=$row_pickup['state'];
		  $rowP['pickup_address_name']=$row_pickup['pickup_address_name'];
		  $rowP['pickup_type']=$row_certificate['delivery_type'];
		}
		else
		{
			$rowP['pickup_zipcode']='';
		 $rowP['pickup_address']='';
		  $rowP['pickup_port']='';
		  $rowP['pickup_city']='';
		  $rowP['pickup_state']='';
		  $rowP['pickup_address_name']='';
		  $rowP['pickup_type']=$row_certificate['delivery_type'];	
		}
		
		
		echo json_encode($rowP); die;
		}
		 
		}
  
  
   
  
	  
?>