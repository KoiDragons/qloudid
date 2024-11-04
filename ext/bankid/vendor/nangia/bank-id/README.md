Bank-ID
=======

Library for connect Swedish BankID to your application.
This library implements BankID API V5. If your needed library for a BankID API V4 please use version 1.*


## Requirements

* PHP 5.6+ or 7.0+
* [curl](http://php.net/manual/en/book.curl.php)


## Usage

```php
<?php
// Create BankIDService
$bankIDService = new BankIDService(
    'https://appapi2.test.bankid.com/rp/v5/',
    $_SERVER["REMOTE_ADDR"],
    [
        'verify' => false,
        'cert'   => 'PATH_TO_TEST_CERT.pem',
    ]
);

// Signing. Step 1 - Get orderRef
/** @var OrderResponse $response */
$response = $bankIDService->getSignResponse('PERSONAL_NUMBER', 'User visible data');

// Signing. Step 2 - Collect orderRef. 
// Repeat until $collectResponse->status !== CollectResponse::STATUS_COMPLETED
$collectResponse = $bankIDService->collectResponse($response->orderRef);
if($collectResponse->status === CollectResponse::STATUS_COMPLETED) {
    return true; //Signed successfully
}

// Authorize. Step 1 - Get orderRef
$response = $bankIDService->getAuthResponse('PERSONAL_NUMBER');

// Authorize. Step 2 - Collect orderRef. 
// Repeat until $authResponse->status !== CollectResponse::STATUS_COMPLETED
$authResponse = $bankIDService->collectResponse($response->orderRef);
if($authResponse->status == CollectResponse::STATUS_COMPLETED) {
    return true; //Authorized
}

// Cancel auth or collect order
// Authorize. Step 1 - Get orderRef
$response = $bankIDService->getAuthResponse('PERSONAL_NUMBER');

// Cancel authorize order
if($bankIDService->cancelOrder($response->orderRef)) {
    return 'Authorization canceled';
}
```

## Testing

1. Copy phpunit.xml.dist to phpunit.xml
``` bash
$ cp phpunit.xml.dist phpunit.xml
```

2. Execute

``` bash
$ ./vendor/bin/phpunit
```
