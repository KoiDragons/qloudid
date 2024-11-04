<?php
ini_set('MAX_EXECUTION_TIME', -1);
require_once 'configs/database.php';
require_once 'configs/encrypt_decrypt.php';
require_once 'configs/testMandril.php';
     $dbCon = connect_database("telezale_wrd3");
   // require_once'configs/checklogin.php';
	 //require_once'encrypt_decrypt.php';
	echo encrypt_decrypt('encrypt','103.68.32.243'); die;
	 //$user_id=43;
		/*$earthRadius = 4857;
		
			$latFrom = deg2rad(29.505386);
  $lonFrom = deg2rad(75.885704);
  $latTo = deg2rad(29.785406);
  $lonTo = deg2rad(76.401874);

  $latDelta = $latTo - $latFrom;
  $lonDelta = $lonTo - $lonFrom;

  $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
			
	echo $angle * $earthRadius *1.609344*1000;		
	
*/ 
 
  $subject="Welcome to postmark";
$html="I want to misgrate from send in blue to postmark.";
$from="support@qloudid.com";
$to="test@test.com";

 sendEmail($subject,$to,$html,$from);
  
   
?>



