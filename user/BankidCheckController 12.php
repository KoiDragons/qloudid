<?php
	require_once '../configs/utility.php';
	require_once '../ext/bankid/vendor/autoload.php'; 
	require_once '../ext/bankid/GlobalConstant.php'; 
	require_once('../AppModel.php');
	class BankidCheckController
	{
	
		public static function init()
		{
		if(isset($_REQUEST['personal'])){
   
    $bankIDService = new Nangia\BankID\Service\BankIDService(
        'https://appapi2.test.bankid.com/rp/v5/', #NEW END POINT
        #'188.99.180.242',
        $_SERVER['REMOTE_ADDR'], # Change this with your user's IP
        [
            'verify' => false,
            'cert'   => '../ext/bankid/mycertname.pem', #Change certificate to yours
        ]
    );

    # enter personal number and message for the user
    $response = $bankIDService->getSignResponse($_REQUEST['personal'], 'Hi, Sushil Jain is testing the app. Please verify');
   print_r($response);
    while(1){
    $collectResponse = $bankIDService->collectResponse($response->orderRef);

    if($collectResponse->status === Nangia\BankID\Model\CollectResponse::STATUS_COMPLETED) {
    	echo 'Thanks for verifying';
        break;
    }	
    # status is not pending, then dont wait and exit the loop
    elseif($collectResponse->status!== Nangia\BankID\Model\CollectResponse::STATUS_PENDING){
    	echo 'User cancelled the request or some other error occurred';
    	break;
    }
    # status pending, wait for 3 seconds
    else{
    	sleep(3);	
    }

    }
}
		}
	
		public static function initiate()
		{
			if(isset($_POST['msg']) && $_POST['msg']!=="" && $_POST['msg']!== null)
			{
				$msg=$_POST['msg'];
			}
			else
			{
				$msg='Please verify your identity.';
			}
			
			if(isset($_POST['prnumber']) && $_POST['prnumber'] != '' )
			{
				$bankIDService = new Nangia\BankID\Service\BankIDService(
        'https://appapi2.test.bankid.com/rp/v5/', #NEW END POINT
        #'188.99.180.242',
        $_SERVER['REMOTE_ADDR'], # Change this with your user's IP
        [
            'verify' => false,
            'cert'   => '../ext/bankid/mycertname.pem', #Change certificate to yours
        ]
    );
		$response = $bankIDService->getSignResponse($_REQUEST['prnumber'],$msg);
		
		//$response=var_dump($response); 
		//print_r($response); die;
				if(array_key_exists('error_message', $response)){
					echo $response['error_message'];
				}
				else
				{
					echo $response->orderRef;
				}
			}
			else
			{
				echo 'Internal error';
			}
		}
		
		
		
		public static function initiateDirect()
		{
			//$_REQUEST['prnumber'] = '197603080719';
			
			if(isset($_REQUEST['prnumber']) && $_REQUEST['prnumber'] != '' )
			{
		
				$BASE_PATH = '/var/www/html/qloudid.com/public_html/ext/bankid/python/';
				$path = $BASE_PATH.'bankid_authenticate.py';
				$userIP = $_SERVER['REMOTE_ADDR'];
				
				$personalNumber = $_REQUEST['prnumber'];
				echo $path.' '.$userIP.' '.$personalNumber;
				$output =  exec("$path $userIP $personalNumber");
				
				$response = json_decode($output, true);
				print_r($response); 
				if(array_key_exists('error_message', $response)){
					echo $response['error_message'];
				}
				else
				{
					echo $response['orderRef'];
				}
			}
			else
			{
				echo 'Internal error';
			}
			
			
		}
		
		public static function getCollection()
		{
			if(isset($_REQUEST['order_ref']) && $_REQUEST['order_ref'] != '' )
			{
				$BASE_PATH = '/var/www/html/qloudid.com/public_html/ext/bankid/python/';
				$path = $BASE_PATH.'bankid_collection.py';
				$orderRef = $_REQUEST['order_ref'];
				$output =  exec("$path $orderRef");
				$response = json_decode($output, true);
				if(array_key_exists('error_message', $response)){
					echo $response['error_message'];
				}
				else
				{
					
					echo "<pre>";print_r($response);echo "</pre>";
				}
			}
			else
			{
				echo 'Internal error';
			}
		}
		
		public static function checkOrderReference()
		{
			if(isset($_POST['orderRef']))
			{
		print_r($_POST['orderRef']);
				$collectResponse=$bankIDService->collectResponse($_POST['orderRef']);
				print_r($collectResponse); die;
				if(array_key_exists('error_message', $collectResponse)){
					echo $collectResponse['error_message'];
				}
				else
				{
					if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_COMPLETED) {
						
						
							$dbCon = AppModel::createConnection();
							
							$stmt = $dbCon->prepare("select id from bankid_verified where bank_id = ?");
							/* bind parameters for markers */
							$cont=1;
							$stmt->bind_param("s", $collectResponse['completionData']['user']['personalNumber']);
							$stmt->execute();
							$result = $stmt->get_result();
							$row = $result->fetch_assoc();
							if(empty($row))
							{
								
								$stmt = $dbCon->prepare("insert into bankid_verified(bank_id,verified_name,first_name,last_name) values(?, ?, ?, ?)");
								
								/* bind parameters for markers */
								$stmt->bind_param("ssss", $collectResponse['completionData']['user']['personalNumber'],$collectResponse['completionData']['user']['name'],$collectResponse['completionData']['user']['givenName'],$collectResponse['completionData']['user']['surname']);
								$stmt->execute();
							}
							else
							{
								$stmt = $dbCon->prepare("update  bankid_verified set verified_name=?,first_name=?,last_name=? where bank_id=?");
								
								/* bind parameters for markers */
								$stmt->bind_param("ssss",$collectResponse['completionData']['user']['name'],$collectResponse['completionData']['user']['givenName'],$collectResponse['completionData']['user']['surname'],$collectResponse['completionData']['user']['personalNumber']);
								$stmt->execute();
							}
							$stmt->close();
							$dbCon->close();
						
						
						
						echo $collectResponse['status'];
						die;
					}	
					# status is not pending, then dont wait and exit the loop
					elseif($collectResponse['status']!== Dimafe6\BankID\Model\CollectResponse::STATUS_PENDING){
						
						if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_FAILED && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_FAILED_CANCELLED)
						{
							echo 2; die;
							
						}	
						
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_FAILED && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_FAILED_START_FAILED)
						{
							echo 3; die;
							
						}	
						
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_FAILED && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_FAILED_USER_CANCEL)
						{
							echo 4; die;
							
						}
						else if($collectResponse['status'] !== Dimafe6\BankID\Model\CollectResponse::STATUS_FAILED)
						{
							echo $collectResponse['status'];
							die;
							
						}
						
					}
					
					else{
						if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_PENDING && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_PENDING_OUTSTANDING_TRANSACTION)
						{
							echo "Starta BankID-appen"; die;
							
						}
						
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_PENDING && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_PENDING_NO_CLIENT)
						{
							echo "Starta BankID-appen"; die;
							
						}
						
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_PENDING && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_PENDING_STARTED)
						{
							echo "Söker efter BankID, det kan ta en liten stund… Om det har gått några sekunder och inget BankID har hittats har du sannolikt inget BankID som går att använda för den aktuella identifieringen/underskriften i den här datorn. Om du har ett BankID-kort, sätt in det i kortläsaren. Om du inte har något BankID kan du hämta ett hos din internetbank. Om du har ett BankID på en annan enhet kan du starta din BankID-app där."; die;
							
						}
						
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_PENDING && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_FAILED_CERTIFICATE_ERR)
						{
							echo 1; die;
							
						}
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_PENDING && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_PENDING_USER_SIGN)
						{
							echo "Skriv in din säkerhetskod i BankID-appen och välj Legitimera eller Skriv under."; die;
							
						}	
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_FAILED && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_FAILED_CANCELLED)
						{
							echo 2; die;
							
						}	
						
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_FAILED && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_FAILED_START_FAILED)
						{
							echo 3; die;
							
						}	
						
						else if($collectResponse['status'] === Dimafe6\BankID\Model\CollectResponse::STATUS_FAILED && $collectResponse['hintCode'] === Dimafe6\BankID\Model\CollectResponse::HINT_FAILED_USER_CANCEL)
						{
							echo 4; die;
							
						}
						
						
					}
					
				}
			}
			else
			{
				echo 'Internal error';
			}
			
			
		}
		
	}
?>