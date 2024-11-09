<?php
	require_once('../AppModel.php');
	class DaycarePricePlanModel extends AppModel
	{
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=33");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		function subId($data)
		{
			 
			return $this -> encrypt_decrypt('decrypt',$data['sub_id']);
		}
		
		function coporateColorDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from corporate_color where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image from user_logins where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function completedEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function employeeAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
			}
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
			function daycareTimelapsed($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
			$stmt = $dbCon->prepare("select * from compnay_app_download where permission_id=(select id from manage_apps_permission where country_id=(select country_id from companies where id=?) and app_id=?) and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $company_id,$app_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return (int)(abs(strtotime(date('Y-m-d')) - strtotime($row['created_on'])) / 86400);
			
			}
			
			
			function getPermissionDetailCompany($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']); 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
			
			function appdownloadStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		    $app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
			//echo $app_id; die;
			$stmt = $dbCon->prepare("select * from compnay_app_download where permission_id=(select id from manage_apps_permission where country_id=(select country_id from companies where id=?) and app_id=?) and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $company_id,$app_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			}
			
		function permission_id($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		    $app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
			//echo $app_id; die;
			$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?) and app_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			 
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
			
			}
			 
			
			function planDetails($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
			$stmt = $dbCon->prepare("select id from safe_qid_plan_detail where app_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $app_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			}
			
			function planInfo($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
				$stmt = $dbCon->prepare("select * from safe_qid_plan_detail where app_id=? and company_id=?");
					/* bind parameters for markers */
				$plan=2;
				$stmt->bind_param("ii", $app_id,$company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row;
			}
			
			
			function subscriptionInfo($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
				$stmt = $dbCon->prepare("select subscription_id,billing_type,billing_period from company_app_payment left join app_price_info on app_price_info.id=company_app_payment.subscription_id where company_app_payment.app_id=? and company_app_payment.company_id=? and next_date_available=0");
					/* bind parameters for markers */
				$plan=2;
				$stmt->bind_param("ii", $app_id,$company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row;
			}
			
			
					
			function createCardTokan()
		{
			$dbCon = AppModel::createConnection();
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2040&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			return $result;  
					
					}
					
		function appDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id=$this -> encrypt_decrypt('decrypt',$data['app_id']);
			$stmt = $dbCon->prepare("select * from `qloudid`.`apps_detail` where id=?");
					/* bind parameters for markers */
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAppFee = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAppFee;
		}
			
		function chargeCard($data)
		{
			$dbCon = AppModel::createConnection();
			//$result=$this->createCardTokan();
			//$result=json_decode($result,true);
			/* 
					
					
			\Stripe\Stripe::setApiKey(secret_key);
				$customer = \Stripe\Customer::retrieve('cus_Qf0S8eV3ELPWLQ');		
			echo '<pre>'; print_r($customer); echo '</pre>'; */
			  
			$data['plan_id']= $_POST['subscription_id'];
			$data['sub_id']= $_POST['subscription_id'];
			$selectSubsriptionPriceDetails    = $this->selectSubsriptionPriceDetails($data);
			
			
				$_POST['app_id']=$this -> encrypt_decrypt('decrypt',$data['app_id']);
				$currency='sek';
				$price=($selectSubsriptionPriceDetails['app_price']*$selectSubsriptionPriceDetails['payment_multi']*100)/100;
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				
				$token =$_POST['stripeToken'];
				
				$stmt = $dbCon->prepare("select * from apps_detail where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $_POST['app_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
				$product_name=$row['app_name'];
				$stmt = $dbCon->prepare("select company_name,company_email,stripe_customer_id,country_id from companies where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $company_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
				$company_name=$row['company_name'];
				$to='kowaken.ghirmai@gmail.com';
				$stmt = $dbCon->prepare("select * from `qloudid`.`manage_apps_permission` where app_id=? and country_id=?");
					/* bind parameters for markers */
				$stmt->bind_param("ii", $_POST['app_id'],$row['country_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowAppFee = $result->fetch_assoc();	
				
				$stmt = $dbCon->prepare("select * from `qloudid`.`app_start_fee_info` where app_id=?");
					/* bind parameters for markers */
				$stmt->bind_param("i", $rowAppFee['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowAppFee = $result->fetch_assoc();
				if($rowAppFee['discount_coupon']==$_POST['discount_coupon'])
				{
					$rowAppFee['licence_fee']=$rowAppFee['licence_fee']*($rowAppFee['licence_fee_discount'])/100;
					$rowAppFee['start_fee']=$rowAppFee['start_fee']*($rowAppFee['start_fee_discount'])/100;
				}
				$price=$price+$rowAppFee['start_fee']+($rowAppFee['licence_fee']*$_POST['licence_required']);
					$price= $price*100;
					  try {
				\Stripe\Stripe::setApiKey(secret_key);
				$customer = \Stripe\Customer::create([
				'name' => $row['company_name'],
				'email' => $row['company_email'],
				'description' => 'My test customer',
				'source' => $token,
					]);
					  $cuId=$customer->id;}
					catch(Exception $e) {
						$stmt->close();
						$dbCon->close();
						return 0;
				}	
					
					
					 
					$stmt = $dbCon->prepare("update companies set stripe_customer_id=? where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("si", $cuId,$company_id);
					$stmt->execute();
					
				 
					
					  try {
				\Stripe\Stripe::setApiKey(secret_key);
				$charge = \Stripe\Charge::create( array( "customer" => $cuId,
							'amount' => $price, 
							'currency' => 'sek',
							'description' => "none",
							 
						) );
			}
			catch(Exception $e) {
				
						$stmt->close();
						$dbCon->close();
						return 0;
				}	
				 
				 
				
				if ($charge->paid == true) {
					
					$Chargeid=$charge->id;
					 
					$stmt = $dbCon->prepare("select id from safe_qid_plan_detail where app_id=? and company_id=?");
					/* bind parameters for markers */
					$plan=2;
					$stmt->bind_param("ii", $_POST['app_id'],$company_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					if(empty($row))
					{
					$stmt = $dbCon->prepare("insert into safe_qid_plan_detail(company_id,plan_type,app_id,created_on)
					values(?,?,?,now())");
					$stmt->bind_param("iii",$company_id,$plan,$_POST['app_id']);
					$stmt->execute();		
					$id=$stmt->insert_id;					
					}
					else
					{
					$stmt = $dbCon->prepare("update safe_qid_plan_detail set plan_type=? where id=?");
					$stmt->bind_param("ii",$plan,$row['id']);
					$stmt->execute();
					$id=$row['id'];
					}
					$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
					$stmt = $dbCon->prepare("select * from app_price_info where id=?");
					 
					$stmt->bind_param("i", $plan_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					if($row['billing_type']==1)
					{
					$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+1 day');
					$periodType="One time";
					$stmt = $dbCon->prepare("insert into company_app_payment (licence_purchased,plan_id,app_id,company_id,amount,currency,created_on,transection_id,subscription_id,customer_id) values (?,?, ?, ?, ?, ?, now(),?, ?, ?)");
					
					/* bind parameters for markers */
					$stmt->bind_param("iiiiissss",$_POST['licence_required'], $id,$_POST['app_id'],$company_id,$price,$currency,$Chargeid,$plan_id,$cuId);
					} 
					else
					{
					if($row['billing_period']==1)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+1 day');
						$periodType="Daily";
					}
					else if($row['billing_period']==2)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+7 day');
						$periodType="Weekly";
					}
					else if($row['billing_period']==3)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+30 day');
						$periodType="Monthly";
					}
					else if($row['billing_period']==4)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+90 day');
						$periodType="Quarterly";
					}	
					else if($row['billing_period']==5)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+180 day');
						$periodType="Half yearly";
					}
					else if($row['billing_period']==6)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+365 day');
						$periodType="Yearly";
					}
					 
					$date= $datetime->format('Y-m-d H:i:s');
					$stmt = $dbCon->prepare("insert into company_app_payment (licence_purchased,plan_id,app_id,company_id,amount,currency,created_on,transection_id,subscription_id,customer_id,next_payment_date) values (?,?, ?, ?, ?, ?, now(),?, ?, ?, ?)");
					
					/* bind parameters for markers */
					$stmt->bind_param("iiiiisssss",$_POST['licence_required'], $id,$_POST['app_id'],$company_id,$price,$currency,$Chargeid,$plan_id,$cuId,$date);
					
					}
					
					$subject='Purcahse completed';
					$emailContent='<html><head></head>

<body>
    <table border="0" cellpadding="0" cellspacing="0" bgcolor="#FEFEFE" width="100" style="font-family: Helvetica; font-size: 12px; font-style: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; background-color: #000000; text-decoration: none; margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 830px;">
        <tbody>
            <tr>
                <td align="center" valign="top" style="vertical-align: top;">
                    <table border="0" cellpadding="0" cellspacing="0" width="600" align="center" bgcolor="#FEFEFE" style="margin: 0px auto; padding: 0px; border: 0px; border-collapse: collapse; width: 600px; background-color: #000000;">
                        <tbody>
                            <tr>
                                <td align="left" valign="top" style="padding-left: 20px; padding-right: 20px; text-align: left; vertical-align: top;">
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 560px; min-width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="padding-left: 20px; padding-right: 20px;">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="15" style="font-size: 15px; line-height: 15px; height: 15px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="left">
                                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td valign="middle" style="font-size: 20px; line-height: 20px; font-weight: bold; vertical-align: middle;"> <a href="https://l.klarna.com/22XC/paebf32a?pid=TRX&amp;c=SE.Monthly.MonthlyCapture.Header&amp;af_adset=Install&amp;af_ad=Link.KlarnaLogo&amp;af_dp=klarna%3A%2F%2F&amp;deep_link_value=&amp;af_param_forwarding=false" rel="noreferrer" target="_blank"><img src="https://www.safeqloud.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a> </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                <td align="left"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nb58FaQEMikQiCyYZFmNuuZ-TxGSx6p73hh502pC8tFKdNWwK9CO9n5plaN7MLFD1M44xVgrsmhb1_AKwZDACWcPhWe3aP9VVU8Fg8AeGL-hnlaGdx9jePMWghdDsWmoiWsZGNAMUnCwhlr6Nwn-SftaOCnfqT5zjtLanhY801yWUPhLMxq1hfhmZjtGRyv5-fwR-ib19jPmu4hkMY6Kpi9rLWAT9zkmXQLJrcudQhSzzS3hh8UTgOBpOrEBvD7W1WvjZgQa37GmtfrfVLPgBqLNO535aMtsg=s0-d-e1-ft#https://impressions.onelink.me/22XC?pid=TRX&amp;c=SE.Monthly.MonthlyCapture&amp;af_adset=Install&amp;af_ad=Link&amp;af_dp=klarna%3A%2F%2F&amp;deep_link_value=&amp;af_viewthrough_lookback=true&amp;af_param_forwarding=false" height="1" width="1" alt="" style="opacity: 0; border: none; margin: 0px;" class="CToWUd" data-bit="iit" jslog="138226; u014N:xr6bB; 53:WzAsMl0."></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="15" style="font-size: 15px; line-height: 15px; height: 15px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size: 30px; line-height: 30px; height: 30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h1 style="font-family: &quot;Klarna Display&quot;, Arial, sans-serif; color: white; font-weight: bold; margin-top: 0px; margin-bottom: 0px; font-size: 36px; line-height: 40px;"> Thank you for your order. </h1>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size: 30px; line-height: 30px; height: 30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: normal; font-size: 16px; line-height: 25px; margin-top: 0px; margin-bottom: 0px;"> You can view and manage your subscription details, including billing information and plan changes, in the Account Settings of your profile. </div>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size: 30px; line-height: 30px; height: 30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size: 30px; line-height: 30px; height: 30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                     
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 560px; min-width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="padding-left: 20px; padding-right: 20px;">
                                                    <h2 style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: bold; margin-top: 0px; margin-bottom: 0px; font-size: 27px; line-height: 30px;"> Summary </h2>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="15" style="font-size: 15px; line-height: 15px; height: 15px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="10" style="font-size: 10px; line-height: 10px; height: 10px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="left" valign="center" width="40" style="width: 40px; padding-right: 15px;">
                                                                    <div style="margin-top: 0px; margin-bottom: 0px;"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nb71Y5zvqQ8bK9xAhw2KHTEGIW2VY-Cmw2JR44mG_Rj0ecN-FOJG2hRZ0_GRpBFAWV6o5smGduqAEofpDPdg4UqkEyOoaTGOlFBGo8RCvClqBMouS9uqA6t3aOmku3WwMP-PNM-6rtOt9hRvCeE6wQ6OP9jB6Rg=s0-d-e1-ft#https://x.klarnacdn.net/mbs/brenda/assets/74589b28b03d7594163b1ba43071822d.png?width=80&amp;height=80" alt="" width="40" height="40" border="1" style="display: block; border: 1px solid rgb(238, 238, 238); outline: 0px; width: 40px; height: 40px; border-radius: 50%;" class="CToWUd" data-bit="iit"></div>
                                                                </td>
                                                                <td align="left" valign="center"> <span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: bold; font-size: 16px; line-height: 25px;"><a href="http://www.safeqloud.com/" target="_blank">Qloud ID</a></span> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="10" style="font-size: 10px; line-height: 10px; height: 10px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="10" style="font-size: 10px; line-height: 10px; height: 10px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="1" style="font-size: 1px; line-height: 1px; height: 1px; background-color: rgb(238, 238, 238);"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="1" style="font-size: 1px; line-height: 1px; height: 1px; background-color: rgb(238, 238, 238);"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td align="left" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px;"><span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: normal; font-size: 16px; line-height: 20px;">Company name</span> </td>
                                                                <td align="right" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px; padding-left: 15px;"> <span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: bold; font-size: 16px; line-height: 20px;">'.$company_name.'</span> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" height="1">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520.016px; min-width: 100%;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="1" style="font-size: 1px; line-height: 1px; height: 1px; background-color: rgb(238, 238, 238);"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td align="left" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px;"><span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: normal; font-size: 16px; line-height: 20px;">Order date</span> </td>
                                                                <td align="right" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px; padding-left: 15px;"> <span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: bold; font-size: 16px; line-height: 20px;">'.date('D m,Y').'</span> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2" height="1">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520.016px; min-width: 100%;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="1" style="font-size: 1px; line-height: 1px; height: 1px; background-color: rgb(238, 238, 238);"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            
<tr>
                                                                <td align="left" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px;"><span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: normal; font-size: 16px; line-height: 20px;">Product name</span> </td>
                                                                <td align="right" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px; padding-left: 15px;"> <span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: bold; font-size: 16px; line-height: 20px;">'.$product_name.'</span> </td>
                                                            </tr><tr>
                                                                <td colspan="2" height="1">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520.016px; min-width: 100%;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="1" style="font-size: 1px; line-height: 1px; height: 1px; background-color: rgb(238, 238, 238);"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
<tr>
                                                                <td align="left" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px;"><span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: normal; font-size: 16px; line-height: 20px;">Product plan</span> </td>
                                                                <td align="right" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px; padding-left: 15px;"> <span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: bold; font-size: 16px; line-height: 20px;">'.$periodType.' invoice</span> </td>
                                                            </tr>
<tr>
                                                                <td colspan="2" height="1">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520.016px; min-width: 100%;">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td height="1" style="font-size: 1px; line-height: 1px; height: 1px; background-color: rgb(238, 238, 238);"></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
<tr>
                                                                <td align="left" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px;"><span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: normal; font-size: 16px; line-height: 20px;">Payment method</span> </td>
                                                                <td align="right" valign="middle" style="vertical-align: middle; padding-top: 15px; padding-bottom: 15px; padding-left: 15px;"> <span style="font-family: &quot;Klarna Text&quot;, Arial, sans-serif; color: white; font-weight: bold; font-size: 16px; line-height: 20px;">Credit card</span> </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size: 30px; line-height: 30px; height: 30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 560px; min-width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="padding-left: 20px; padding-right: 20px;">
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="1" style="font-size: 1px; line-height: 1px; height: 1px; background-color: rgb(238, 238, 238);"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="15" style="font-size: 15px; line-height: 15px; height: 15px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 520px; min-width: 100%;">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size: 30px; line-height: 30px; height: 30px;"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0px; padding: 0px; border: 0px; border-collapse: collapse; width: 560px; min-width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td height="50" style="font-size: 50px; line-height: 50px; height: 50px;"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


</body></html>';
					
					sendEmail($subject, $to, $emailContent);
					
					if($stmt->execute())
					{
						$stmt->close();
						$dbCon->close();
						return 1;
						
					}
					else 
					{
						$stmt->close();
						$dbCon->close();
						return 0;
					}
				}
				else 
					{
						$stmt->close();
						$dbCon->close();
						return 0;
					}
			
			
			
		}
		
		
			
			
		function appPriceDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
			$stmt = $dbCon->prepare("select * from app_price_info where app_id=? and country_id =(select country_id from companies where id=?)");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $app_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$org[$cont]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			$cont++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			}
			
			
			function selectSubsriptionPriceDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
			 
			$plan_id= $data['sub_id'];
			$stmt = $dbCon->prepare("select * from app_price_info where id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $plan_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select payment_info from apps_detail where id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowApp = $result->fetch_assoc();
			if($rowApp['payment_info']==1)
			{
			$row['payment_multi']=1;	
				
			}
			else if($rowApp['payment_info']==2)
			{
			$stmt = $dbCon->prepare("select count(location_id) as num from company_apps_location where company_id=? and app_id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLoc = $result->fetch_assoc();	
			if($rowLoc['num']==0)
			{
			$row['payment_multi']=1;	
			}
			else
			{
			$row['payment_multi']=	$rowLoc['num'];	
			}
			
			}
			else if($rowApp['payment_info']==3)
			{
			$stmt = $dbCon->prepare("select sum(total_desk) as num from company_apps_location where company_id=? and app_id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLoc = $result->fetch_assoc();	
			if($rowLoc['num']==0)
			{
			$row['payment_multi']=1;	
			}
			else
			{
			$row['payment_multi']=	$rowLoc['num'];	
			}
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			
			}
			
			
		function companyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from company_profiles  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				//echo "hi"; die;
				$stmt = $dbCon->prepare("INSERT INTO company_profiles (company_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select stripe_customer_id,country_id,grading_status ,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
    	
		function lockFreePlan($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$plan=1;
			$app=$this -> encrypt_decrypt('decrypt',$data['app_id']);;
			$stmt = $dbCon->prepare("insert into safe_qid_plan_detail(company_id,plan_type,app_id,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("iii",$company_id,$plan,$app);
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		function updateToFreePlan($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$app=$this -> encrypt_decrypt('decrypt',$data['app_id']);
			$stmt = $dbCon->prepare("update company_app_payment set new_plan_is_free=1 where company_id=? and app_id=? and next_date_available=0");
			$stmt->bind_param("ii",$company_id,$app);
			 
			if($stmt->execute())
			{
				 
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				 
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		
			function updatePlanInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id=$this -> encrypt_decrypt('decrypt',$data['app_id']);
			$plan_id= $this -> encrypt_decrypt('decrypt',$data['plan_id']);
			
			$stmt = $dbCon->prepare("select plan_type from safe_qid_plan_detail where app_id=? and company_id=?");
					 
			$stmt->bind_param("ii", $app_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowSafe = $result->fetch_assoc(); 
			
			$stmt = $dbCon->prepare("select * from app_price_info where id=?");
					 
			$stmt->bind_param("i", $plan_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowNewPlan = $result->fetch_assoc(); 
			
			$stmt = $dbCon->prepare("select * from app_price_info where id=(select subscription_id from company_app_payment where app_id=? and company_id=? and next_date_available=0)");
					 
			$stmt->bind_param("ii", $app_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowOldPlan = $result->fetch_assoc(); 
			if($rowNewPlan['billing_type']==2 && $rowNewPlan['billing_period']<$rowOldPlan['billing_period'])
			{
				$stmt = $dbCon->prepare("update company_app_payment set new_subscription_id=? where app_id=? and company_id=? and next_date_available=0");
				$stmt->bind_param("iii",$plan_id,$app_id,$company_id);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			$planTime=1;	
			$stmt = $dbCon->prepare("select payment_info from apps_detail where id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowApp = $result->fetch_assoc();
			if($rowApp['payment_info']==1)
			{
			$rowNewPlan['payment_multi']=1;	
				
			}
			else if($rowApp['payment_info']==2)
			{
			$stmt = $dbCon->prepare("select count(location_id) as num from company_apps_location where company_id=? and app_id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLoc = $result->fetch_assoc();	
			if($rowLoc['num']==0)
			{
			$rowNewPlan['payment_multi']=1;	
			}
			else
			{
			$rowNewPlan['payment_multi']=	$rowLoc['num'];	
			}
			
			}
			else if($rowApp['payment_info']==3)
			{
			$stmt = $dbCon->prepare("select sum(total_desk) as num from company_apps_location where company_id=? and app_id=?");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowLoc = $result->fetch_assoc();	
			if($rowLoc['num']==0)
			{
			$rowNewPlan['payment_multi']=1;	
			}
			else
			{
			$rowNewPlan['payment_multi']=	$rowLoc['num'];	
			}
			}
			
			$gross_price= $rowNewPlan['app_price']*$rowNewPlan['payment_multi'];
			
			$stmt = $dbCon->prepare("select amount,TIMESTAMPDIFF(DAY,company_app_payment.created_on,now()) as timedifference from company_app_payment where app_id=? and company_id=? and next_date_available=0");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $app_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowTime = $result->fetch_assoc();	
			
			if($rowOldPlan['billing_period']==1)
			{
			$planTime=1;	
			}
			else if($rowOldPlan['billing_period']==2)
			{
			$planTime=7;	
			}
			else if($rowOldPlan['billing_period']==3)
			{
			$planTime=30;	
			}	
			else if($rowOldPlan['billing_period']==4)
			{
			$planTime=90;	
			}
			else if($rowOldPlan['billing_period']==5)
			{
			$planTime=180;	
			}
			else if($rowOldPlan['billing_period']==6)
			{
			$planTime=365;	
			}
			if($rowSafe['plan_type']==1)
			{
			$price=$gross_price;
			}
			else
			{
				//echo $planTime; die;
			$price=round($gross_price-($rowTime['amount']-(($rowTime['amount']/$planTime)*$rowTime['timedifference'])));
			}
			if($price<5)
			{
				$price=5;
			}
			
				$currency='sek';
				$stmt = $dbCon->prepare("select company_name,company_email,stripe_customer_id from companies where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $company_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					 $cuId=$row['stripe_customer_id'];	
					 
				 \Stripe\Stripe::setApiKey(secret_key);
				$charge = \Stripe\Charge::create( array( "customer" => $cuId,
							'amount' => $price*100, 
							'currency' => 'sek',
							'description' => "none",
							 
						) );
				
				
				if ($charge->paid == true) {
					
					$Chargeid=$charge->id;
					
					$stmt = $dbCon->prepare("select id from safe_qid_plan_detail where app_id=? and company_id=?");
					/* bind parameters for markers */
					$plan=2;
					$stmt->bind_param("ii", $app_id,$company_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					if(empty($row))
					{
					$stmt = $dbCon->prepare("insert into safe_qid_plan_detail(company_id,plan_type,app_id,created_on)
					values(?,?,?,now())");
					$stmt->bind_param("iii",$company_id,$plan,$app_id);
					$stmt->execute();		
					$id=$stmt->insert_id;					
					}
					else
					{
					$stmt = $dbCon->prepare("update safe_qid_plan_detail set plan_type=? where id=?");
					$stmt->bind_param("ii",$plan,$row['id']);
					$stmt->execute();
					$id=$row['id'];
					}
					
					$stmt = $dbCon->prepare("select * from app_price_info where id=?");
					 
					$stmt->bind_param("i", $plan_id);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();
					
					$stmt = $dbCon->prepare("update company_app_payment  set next_date_available=1 where app_id=? and company_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("ii", $app_id,$company_id);
					$stmt->execute();
					
					if($row['billing_type']==1)
					{
					$stmt = $dbCon->prepare("insert into company_app_payment (plan_id,app_id,company_id,amount,currency,created_on,transection_id,subscription_id,customer_id) values (?, ?, ?, ?, ?, now(),?, ?, ?)");
					
					/* bind parameters for markers */
					$stmt->bind_param("iiiissss", $id,$app_id,$company_id,$price,$currency,$Chargeid,$plan_id,$cuId);
					} 
					else
					{
					if($row['billing_period']==1)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+1 day');
					}
					else if($row['billing_period']==2)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+7 day');
					}
					else if($row['billing_period']==3)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+30 day');
					}
					else if($row['billing_period']==4)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+90 day');
					}	
					else if($row['billing_period']==5)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+180 day');
					}
					else if($row['billing_period']==6)	
					{
						$date=date('Y-m-d h:i:s');
						$datetime = new DateTime($date);
						$datetime->modify('+365 day');
					}
					$date= $datetime->format('Y-m-d H:i:s');
					$stmt = $dbCon->prepare("insert into company_app_payment (plan_id,app_id,company_id,amount,currency,created_on,transection_id,subscription_id,customer_id,next_payment_date) values (?, ?, ?, ?, ?, now(),?, ?, ?, ?)");
					
					/* bind parameters for markers */
					$stmt->bind_param("iiiisssss", $id,$app_id,$company_id,$price,$currency,$Chargeid,$plan_id,$cuId,$date);
					
					}
					if($stmt->execute())
					{
						$stmt->close();
						$dbCon->close();
						return 1;
						
					}
					else 
					{
						$stmt->close();
						$dbCon->close();
						return 0;
					}
				}
				else 
					{
						$stmt->close();
						$dbCon->close();
						return 0;
					}
			
			
			
		}
		
		
		
	}
