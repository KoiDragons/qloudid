<?php
 
// Import the Postmark Client Class:
require_once('vendor/autoload.php');
use Postmark\PostmarkClient;

//$client = new PostmarkClient("c9147b89-0b21-4613-80eb-786a7979163b");
function sendEmail($subject, $to, $html, $from = 'support@qloudid.com')
{
	
 $client = new PostmarkClient("c9147b89-0b21-4613-80eb-786a7979163b");
 
$sendResult = $client->sendEmail($from,$to,$subject,$html);
}

/*$subject="Welcome to postmark";
$html="I want to misgrate from send in blue to postmark.";
$from="support@qloudid.com";
$to="support@qloudid.com";

 sendEmail($subject,$to,$html,$from);*/
?>