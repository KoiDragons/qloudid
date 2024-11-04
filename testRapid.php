<?php
function translateText($word,$id)
{
$curl = curl_init();
//echo $word; echo $id; die;
$text="source_language=en&target_language=".$id."&text=".$word;
curl_setopt_array($curl, [
	CURLOPT_URL => "https://text-translator2.p.rapidapi.com/translate",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $text,
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: text-translator2.p.rapidapi.com",
		"X-RapidAPI-Key: c67265f9c9msheb816a7c8862a56p14f1bcjsnbf897eaca59e",
		"content-type: application/x-www-form-urlencoded"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	$response=json_decode($response,true);
	echo $response['data']['translatedText'];
	 
}	
}
//translateText("How are you?",'hu');