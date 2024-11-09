<?php

//require_once 'external_link/mailin_api/sms_api.php';
//require_once 'mailin/Mailin.php';
require_once('/APIv3-php-library-master/vendor/autoload.php');
function sendSms($subject, $to, $html, $from = 'QloudID', $trans='transactional')
{
$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

$apiInstance = new SendinBlue\Client\Api\TransactionalSMSApi(
    new GuzzleHttp\Client(),
    $config
);
$sendTransacSms = new \SendinBlue\Client\Model\SendTransacSms();
$sendTransacSms['sender'] = $from;
$sendTransacSms['recipient'] = $to;
$sendTransacSms['content'] = $html;
$sendTransacSms['type'] = $trans;
$sendTransacSms['webUrl'] = 'https://www.qloudid.com';

try {
    $result = $apiInstance->sendTransacSms($sendTransacSms);
	$res=array();
	$res['status']="OK";
	return json_encode($res,true);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalSMSApi->sendTransacSms: ', $e->getMessage(), PHP_EOL;
}
/**	
$mailin = new MailinSms('pINY4jXhcHSg95E3');
$mailin->
addTo($to)->

		setFrom($from) // If numeric, then maximum length is 17 characters and if alphanumeric maximum length is 11 characters.
        ->setText($html) // 160 characters per SMS.
        ->setTag($subject)

        ->setType($trans) // Two possible values: marketing or transactional.
        ->setCallback('http://callbackurl.com/');

    $res = $mailin->send();


//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
 /**
        Successful SMS sent message will be returned as:
            {"status":"OK","number_sent":1,"to":"00XXXXXXXX","remaining_credit":9525,"reference":{"1":"cz2tjvs79vm079hpa"}}
        Error will be returned as:
            {"status":"KO","description":"Invalid telephone number."}
    **/
	

//unset($mailin);

//return $res;

}





?>