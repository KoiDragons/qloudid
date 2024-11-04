<?php
require_once('../AppModel.php');
class CreateAppsModel extends AppModel
{
	function checkAddress()
		{
			$dbCon = AppModel::createConnection();
			$address=str_replace(' ', '%20',urldecode($_POST['address'])); 
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.fe4653b2a0dacf4e6aed8f51c1ae9e92&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			 
			if(isset($response['error']))
			{
			
			return 0;	
			}
			else
			{
				
			return $responseJson;
			}
				
		}
		
		function checkAddresslatLong()
		{
			$dbCon = AppModel::createConnection();
			$address=str_replace(' ', '%20',urldecode($_POST['address'])); 
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.fe4653b2a0dacf4e6aed8f51c1ae9e92&lat=".$_POST['lat']."&lon=".$_POST['lon']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			 
			if(isset($response['error']))
			{
			
			return 0;	
			}
			else
			{
				
			return $responseJson;
			}
				
		}
		function addPickupAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);  
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.fe4653b2a0dacf4e6aed8f51c1ae9e92&lat=".$_POST['latit']."&lon=".$_POST['longi']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			$pickup_address_name= htmlentities($_POST['pickup_address_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$dname= htmlentities($response['display_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$adress= htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into company_pickup_address (pickup_address_name,full_address, port_number, address, city, state, zipcode, latitude, langitude,company_id, created_on) values(?, ? ,?, ? , ?, ?, ?, ?, ?, ?, now())");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssi",$pickup_address_name,  $dname,$_POST['pnumber'],$adress,$response['address']['state_district'],$response['address']['state'],$response['address']['postcode'],$response['lat'],$response['lon'],$company_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePickupAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);  
			$address_id= $this -> encrypt_decrypt('decrypt',$data['aid']);  
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.fe4653b2a0dacf4e6aed8f51c1ae9e92&lat=".$_POST['latit']."&lon=".$_POST['longi']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			$pickup_address_name= htmlentities($_POST['pickup_address_name'],ENT_NOQUOTES, 'ISO-8859-1'); 
			$response = json_decode($responseJson,true);
			$dname= htmlentities($response['display_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$adress= htmlentities($_POST['addrs'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update company_pickup_address set pickup_address_name=?, full_address=?, port_number=?, address=?, city=?, state=?, zipcode=?, latitude=?, langitude=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("sssssssssi", $pickup_address_name,$dname,$_POST['pnumber'], $adress,$response['address']['state_district'],$response['address']['state'],$response['address']['postcode'],$response['lat'],$response['lon'],$address_id);
			$stmt->execute();
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
	
	
	function developerCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select is_approved from company_developer_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return -1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['is_approved'];	
			}
			
			
		}
		
		
		
		function addressInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select * from company_pickup_address where id=?");
			$stmt->bind_param("i", $id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;	
		 	
		}
		
		
		
		function addressList($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from company_pickup_address where company_id=? limit 0,5");
			$stmt->bind_param("i", $id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;	
		 	
		}
		
		function addressCount($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select count(id) as num from company_pickup_address where company_id=?");
			$stmt->bind_param("i", $id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
		 	
		}
			function moreAddressDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select * from company_pickup_address where company_id=? limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
			{
			$j=0;	
			}
			else
			{
			$j=1;	
			}
			
			while($row = $result->fetch_assoc())
			{
				$enc= $this -> encrypt_decrypt('encrypt',$row['id']);
				  
				  
				if($j%2==0)
				{
					$bg='lgtgrey_bg';
				}
				else
				{
					$bg='white_bg';
				}
				$org=$org.'<a href="../editAddress/'.$enc.'/'.data['cid'].'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15 hidden-xs "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['full_address'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_60   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt ">'.$row['address'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$row['full_address'].'</span>  </div>
													
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div></a>';
											$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			else
			{
				if($row['is_admin']==0)
				{
					$stmt->close();
					$dbCon->close();
					return 0;
				}
				else
				{
					$stmt->close();
					$dbCon->close();
					return 1;
				}
			}
			
			
		}
		
  function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select hotel_name,property_location.id,property_name,visiting_address,property_location.created_on,is_hotel from property_location left join property on property.id=property_location.property_id left join hotel_basic_information on hotel_basic_information.property_id=property_location.id  where property_location.company_id=? order by created_on desc");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
    
	function stripeInfo($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select stripe_customer_id from companies where id= ?");
		$stmt->bind_param("i", $company_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowStripe = $result->fetch_assoc();
		return $rowStripe;
	}
	
	
	
    function createAppsAccount($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$client_id= $this -> encrypt_decrypt('encrypt',$data['company_name']);
		
		$stmt = $dbCon->prepare("select client_id from oauth_clients where app_name= ?");
		$stmt->bind_param("s", $data['company_name']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if($_POST['app_type']==1)
		{
			$url='https://www.qloudid.com/walk/authorize.php?response_type=code&client_id='.$client_id.'&state=xyz&login=1';
		}
		else if($_POST['app_type']==2)
		{
			$url='https://www.qloudid.com/walk/authorize.php?response_type=code&client_id='.$client_id.'&state=xyz&apply=2&job_id=';
		}
		else if($_POST['app_type']==3)
		{
			$url='https://www.qloudid.com/user/index.php/LoginAccount/loginPurchaseVerify?response_type=code&client_id='.$client_id.'&state=xyz&purchase=1&total=';
		}
		else if($_POST['app_type']==4)
		{
			$url='https://www.qloudid.com/walk/authorize.php?response_type=code&client_id='.$client_id.'&state=xyz&signin=1';
		}
		else if($_POST['app_type']==5)
		{
			$url='https://www.qloudid.com/user/index.php/LoginAccount/bookHotel?response_type=code&client_id='.$client_id.'&state=xyz&hotel=1';
		}
		else if($_POST['app_type']==6)
		{
			$url='https://www.qloudid.com/user/index.php/LoginAccount/checkinHotel?response_type=code&client_id='.$client_id.'&state=xyz&checkin=1';
		}
		else if($_POST['app_type']==7)
		{
			$url='https://www.qloudid.com/user/index.php/LoginAccount/checkinDependent?response_type=code&client_id='.$client_id.'&state=xyz&checkin_dependent=1';
		}
		else if($_POST['app_type']==8)
		{
			$url='https://www.qloudid.com/user/index.php/LoginAccount/payForDishes?response_type=code&client_id='.$client_id.'&state=xyz&payForDishes=1';
		}
		 if(empty($row))
		 {
			 $stmt = $dbCon->prepare("update oauth_clients set is_active=0 where company_id=? and app_type=? and purchase_from=? and location_id=?");
       
			/* bind parameters for markers */
			$stmt->bind_param("iiii", $company_id, $_POST['app_type'],$_POST['purchase_from'], $_POST['p_id']);
			$stmt->execute();
			
			  $stmt = $dbCon->prepare("insert into oauth_clients(app_name,company_id,created_on,client_id,client_secret,redirect_uri,app_type,purchase_from,location_id,api_interface_url,pay_from) 
			  values(?, ?, ?, ?, ?, ? ,?, ?,?,?, ?)");
       
				/* bind parameters for markers */
				$stmt->bind_param("ssssssiiisi", $data['company_name'],$company_id, $data['created_on'],$client_id, $data['client_secret'],$data['website'],$_POST['app_type'],$_POST['purchase_from'], $_POST['p_id'],$url, $_POST['pay_from']);
				
				
				if (!$stmt->execute()) {
					return 0;
				} 
				else
				{
					return 1;
				}
		 }
		 else
		 {
			 //echo "duplicate"; die;
			 return 0;
		 }
       
        $stmt->close();
        $dbCon->close();
    }
	
	
	  function updateAccount($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$client_id= $this -> encrypt_decrypt('decrypt',$data['id']);
		 
	  
			
			  $stmt = $dbCon->prepare("update oauth_clients set pay_from=? where client_id=?");
       
				/* bind parameters for markers */
				$stmt->bind_param("is",  $_POST['pay_from'],$client_id);
				
				
				if (!$stmt->execute()) {
					 $stmt->close();
					$dbCon->close();
					return 0;
				} 
				else
				{
					 $stmt->close();
					 $dbCon->close();
					return 1;
				}
		 
       
    }
    
	 function signUpFielsDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select * from signup_required_fields_info where company_id= ?");
		$stmt->bind_param("s", $company_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
		$dbCon->close();
		 
		return $row;
	}
	
	
	 function corporateSignUpFielsDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select * from corporate_signup_required_fields_info where company_id= ?");
		$stmt->bind_param("s", $company_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
		$dbCon->close();
		return $row;
	}
	 function updateFieldsinfo($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from signup_required_fields_info where company_id= ?");
		$stmt->bind_param("s", $company_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 if($_POST['phone_detail']==0)
		 {
			$_POST['verify_phone_detail']=0; 
		 }
		 if(empty($row))
		 {
			  
			
			$stmt = $dbCon->prepare("insert into signup_required_fields_info(phone_detail, card_detail, identificator_info, delivery_address, invoice_address, pickup_info, digital_delivery, created_on, modified_on, company_id,information_url,verify_email,verify_phone_detail)  values(?, ?, ?, ?, ?, ? ,?, now(), now() ,?, ?, ?, ?)");
       
				/* bind parameters for markers */
			$stmt->bind_param("iiiiiiiisii",$_POST['phone_detail'],$_POST['card_detail'], $_POST['identificator_info'], $_POST['delivery_address'], $_POST['invoice_address'], $_POST['pickup_info'], $_POST['digital_delivery'], $company_id, $_POST['company_website'],$_POST['verify_email'],$_POST['verify_phone_detail']);
				
				
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		 }
		 else
		 {
			 $stmt = $dbCon->prepare("update signup_required_fields_info set phone_detail=?, card_detail=?, identificator_info=?, delivery_address=?, invoice_address=?, pickup_info=?, digital_delivery=?,modified_on=now(),information_url=?,verify_email=?,verify_phone_detail=? where company_id=?");
       
			/* bind parameters for markers */
			$stmt->bind_param("iiiiiiisiii",$_POST['phone_detail'],$_POST['card_detail'], $_POST['identificator_info'], $_POST['delivery_address'], $_POST['invoice_address'], $_POST['pickup_info'], $_POST['digital_delivery'], $_POST['company_website'],$_POST['verify_email'],$_POST['verify_phone_detail'], $company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		 }
        
    }
	
	
	 function updateCorporateFieldsinfo($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from corporate_signup_required_fields_info where company_id= ?");
		$stmt->bind_param("s", $company_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		 if(empty($row))
		 {
			  
			
			$stmt = $dbCon->prepare("insert into corporate_signup_required_fields_info(phone_detail, card_detail, identificator_info, delivery_address, invoice_address, pickup_info, digital_delivery, created_on, modified_on, company_id,company_email,company_invoice_address,company_pickup_info,company_digital_delivery,information_url,verify_email,verify_phone_detail)  values(?, ?, ?, ?, ?, ? ,?, now(), now() ,?, ?, ?, ?, ?, ?, ?, ?)");
       
				/* bind parameters for markers */
			$stmt->bind_param("iiiiiiiiiiiisii",$_POST['phone_detail'],$_POST['card_detail'], $_POST['identificator_info'], $_POST['delivery_address'], $_POST['invoice_address'], $_POST['pickup_info'], $_POST['digital_delivery'], $company_id, $_POST['company_email'], $_POST['company_invoice_address'], $_POST['company_pickup_info'], $_POST['company_digital_delivery'], $_POST['company_website'],$_POST['verify_email'],$_POST['verify_phone_detail']);
				
				
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		 }
		 else
		 {
			 $stmt = $dbCon->prepare("update corporate_signup_required_fields_info set phone_detail=?, card_detail=?, identificator_info=?, delivery_address=?, invoice_address=?, pickup_info=?, digital_delivery=?,modified_on=now(),company_email=?,company_invoice_address=?,company_pickup_info=?,company_digital_delivery=?,information_url=?,verify_email=?,verify_phone_detail=? where company_id=?");
       
			/* bind parameters for markers */
			$stmt->bind_param("iiiiiiiiiiisiii",$_POST['phone_detail'],$_POST['card_detail'], $_POST['identificator_info'], $_POST['delivery_address'], $_POST['invoice_address'], $_POST['pickup_info'], $_POST['digital_delivery'], $_POST['company_email'], $_POST['company_invoice_address'], $_POST['company_pickup_info'], $_POST['company_digital_delivery'], $_POST['company_website'],$_POST['verify_email'],$_POST['verify_phone_detail'], $company_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		 }
        
    }
    
    
}