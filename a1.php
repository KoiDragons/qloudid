<?php
/*$URL = "https://connect.maklare.vitec.net/Contacts/GetContacts";

$ch = curl_init();
$data=array();
$data['customerId']='M19213';
$data=json_encode($data,true);
curl_setopt($ch, CURLOPT_USERNAME, "569");
curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $URL);
 
curl_setopt($ch, CURLOPT_POST, true);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: '. strlen($data)
));

$result = curl_exec($ch);
echo '<pre>'; print_r(json_decode($result,true)); echo '</pre>'; 
 
$info = curl_getinfo($ch);
curl_close($ch);	*/	

 $URL = "https://connect.maklare.vitec.net/Estate/GetForeignProperty?estateId=OBJ19213_1912964758&customerId=M19213";

		$ch = curl_init();
				 
		curl_setopt($ch, CURLOPT_USERNAME, "569");
		curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $URL);
				 

		$resultData = curl_exec($ch);
		curl_close($ch);
		$detail=json_decode($resultData,true);
		
		echo '<pre>'; print_r(json_decode($resultData,true)); echo '</pre>'; 
 
$info = curl_getinfo($ch);
curl_close($ch);
?>



