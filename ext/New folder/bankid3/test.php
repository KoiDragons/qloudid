<?php
#loading bankid php library
require_once './vendor/autoload.php';
$bankIDService = new Dimafe6\BankID\Service\BankIDService(
    'https://appapi2.test.bankid.com/rp/v5/',
    '106.204.53.222', # this is user ip
    [
        'verify' => false,
        'cert'   => './mycertname.pem', #generated certficate
    ]
);

# enter personal number and message for the user
$response = $bankIDService->getSignResponse('198801251946', 'Do you accept ?');

# let the user open app and accept
while(1){
$collectResponse = $bankIDService->collectResponse($response->orderRef);

if($collectResponse->status === Dimafe6\BankID\Model\CollectResponse::STATUS_COMPLETED) {
	var_dump($collectResponse);
    break;
}	
# status is not pending, then dont wait and exit the loop
elseif($collectResponse->status!== Dimafe6\BankID\Model\CollectResponse::STATUS_PENDING){
	var_dump($collectResponse);
	break;
}
# status pending, wait for 3 seconds
else{
	sleep(3);	
}

}


#var_dump($response);

?>
