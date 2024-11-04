<?php /*$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://ecsiteapp.atlassian.net/rest/api/3/app/field/ECQTSOPS-1366/value');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n   \"updates\": [\n    {\n      \"customField\": \"customfield_10205\",\n      \"issueIds\": [\n        33462\n      ],\n      \"value\": \"Gursewak Singh\"\n    }\n  ]\n}");
curl_setopt($ch, CURLOPT_USERPWD, 'gursewak.singh@wavelabs.ai' . ':' . 'd2ViYWRtaW5AZWNzaXRlYXBwLmNvbTpjRUtIeUtXc3hzVWJ3V0RNblhVdTY3MDc=');

$headers = array();
$headers[] = 'Accept: application/json';
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
echo '<pre>'; print_r($result); echo '</pre>';  
$data=json_decode($result,true);
				echo '<pre>'; print_r($data); echo '</pre>';  
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);*/




require_once 'configs/unirest/vendor/autoload.php';

Unirest\Request::auth('gursewak.singh@wavelabs.ai', 'Basic d2ViYWRtaW5AZWNzaXRlYXBwLmNvbTpjRUtIeUtXc3hzVWJ3V0RNblhVdTY3MDc=');

$headers = array(
  'Authorization'=>'Basic d2ViYWRtaW5AZWNzaXRlYXBwLmNvbTpjRUtIeUtXc3hzVWJ3V0RNblhVdTY3MDc=',
  'Accept' => 'application/json',
  'Content-Type' => 'application/json'
);

$body = <<<REQUESTBODY
{
  "updates": [
    {
      "issueIds": [
        10010
      ],
      "value": "new value"
    }
  ]
}
REQUESTBODY;

$response = Unirest\Request::put(
  'https://ecsiteapp.atlassian.net/rest/api/3/app/field/customfield_10205/value',
  $headers,
  $body
);

var_dump($response)

?>