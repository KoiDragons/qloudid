<?php 
require_once('smsMandril.php');

$subject='Informationen om din vän/anhörig';
					$to='+919729690589';
					$html='Du har blivit ombedd att identifiera dig. Qloud ID https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/';
					//echo $html.' '.$to;
					$res=sendSms($subject, $to, $html);
					
					print_r($res);
?>