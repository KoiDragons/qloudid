<?php
	require_once('../AppModel.php');
	class ChargePaymentModel extends AppModel
	{
		
		function chargeCard($data)
		{
			$dbCon = AppModel::createConnection();
			
			if(isset($_POST['price'])) {
				
				$currency='sek';
				$price=$_POST['price']/100;
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$token = $_POST['stripeToken'];
				\Stripe\Stripe::setApiKey(secret_key);
				$charge = \Stripe\Charge::create([
				'amount' => $_POST['price'],
				'currency' => 'sek',
				'description' => 'Example charge',
				'source' => $token,
				]);
				
				if ($charge->paid == true) {
					
					$id=$charge->id;
					
					$stmt = $dbCon->prepare("insert into company_noff_subscription (company_id,amount,currency,created_date,transection_id) values (?, ?, ?, now(),?)");
					
					/* bind parameters for markers */
					$stmt->bind_param("iiss", $company_id,$price,$currency,$id);
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
			}
			
			
		}
		
		
		
		
	}			