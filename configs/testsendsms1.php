<?php 
require_once('smsMandril.php');
$longUrl = "https://www.qloudid.com/user/index.php/StoreData/userAccount";
    $postData = array('longUrl' => $longUrl);
    $jsonData = json_encode($postData);

    //4
    //$curlObj = curl_init(); 
   // curl_setopt($curlObj, CURLOPT_URL, );
    $apiurl = 'https://www.googleapis.com/urlshortener/v1/url?key=AIzaSyCrS23n5fjbo-62fzUeunmq8CnTQVNMd-Q';
			$longUrl = "https://www.qloudid.com/user/index.php/StoreData/userAccount";
			$ch = curl_init();
		
			curl_setopt($ch,CURLOPT_URL, $apiurl);
			curl_setopt($ch,CURLOPT_POST,1);
			curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode(array("longUrl"=>$longurl)));
			curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type: application/json"));
		
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HEADER, 0);
   
    
  
			$result = curl_exec($ch);
			
			curl_close($ch);
			
			print_r(json_decode($result,true));
?>