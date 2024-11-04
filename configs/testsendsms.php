<?php 
require_once('smsMandril.php');
$longUrl = "https://www.qloudid.com/user/index.php/StoreData/userAccount";
    $postData = array('longUrl' => $longUrl);
    $jsonData = json_encode($postData);

    //4
    $curlObj = curl_init(); 
    curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyCrS23n5fjbo-62fzUeunmq8CnTQVNMd-Q');
    curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curlObj, CURLOPT_HEADER, 0);
    curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
    curl_setopt($curlObj, CURLOPT_POST, 1);
    curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);
	//curl_setopt($curlObj, CURLOPT_REFERER, 'www.qloudid.com/*');
    //5
    $response = curl_exec($curlObj);

    $json = json_decode($response);
//       echo "<pre>";
   print_r($json);exit;
    //6
    curl_close($curlObj);

    //7
    if(isset($json->error)){
        echo $json->error->message;
    }else{
        echo $json->id;
    }   
?>