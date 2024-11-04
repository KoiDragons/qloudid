
<?php
require_once('APIv3-php-library-master/vendor/autoload.php');

$config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');

$apiInstance = new SendinBlue\Client\Api\TransactionalSMSApi(
    new GuzzleHttp\Client(),
    $config
);
$sendTransacSms = new \SendinBlue\Client\Model\SendTransacSms();
$sendTransacSms['sender'] = 'QloudID';
$sendTransacSms['recipient'] = '+919729690589';
$sendTransacSms['content'] = 'This is a transactional SMS';
$sendTransacSms['type'] = 'transactional';
$sendTransacSms['webUrl'] = 'https://www.qloudid.com';

try {
    $result = $apiInstance->sendTransacSms($sendTransacSms);
    print_r($result); echo 'jain'; die;
} catch (Exception $e) {
    echo 'Exception when calling TransactionalSMSApi->sendTransacSms: ', $e->getMessage(), PHP_EOL;
}
?>