<?php
$URL = "https://connect.maklare.vitec.net/Image/GetImage?customerId=M19213&imageId=MED2516AC759F884B8396A2F6C5C481E62C";

$ch = curl_init();
 
curl_setopt($ch, CURLOPT_USERNAME, "569");
curl_setopt($ch, CURLOPT_PASSWORD, "Lg9uDAxjbSfVGJHFxaX7xCi52BtBb2jAAakorxtrKBLmFPBq2rm8k6B8v3r2El8Z");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $URL);
 

$result = curl_exec($ch);
  
 
$info = curl_getinfo($ch);
curl_close($ch);
 
$http_code = $info["http_code"];
if ($http_code == 401) {
    // Användarnamnet eller lösenordet är felaktigt
}
if ($http_code == 403) {
    // Begärt data som det saknas åtkomst till
}
if ($http_code == 500) {
    // Oväntat fel, kontakta Vitec
}
if ($http_code == 400) {
    $json = json_decode($result, true);
    // Hantera valideringsfel, presenteras i $json
}	

 
?>

<image src="data:text/x-base64;base64,<?php echo base64_encode($result); ?>" >

