<?php

require_once "swift/lib/swift_required.php";
require_once 'mailin/Mailin.php';

function sendEmail($subject, $to, $html, $from = array('please-reply@qmatchup.com' =>'Team Qmatchup')   )
{
	
$mailin = new Mailin('kowaken.ghirmai@qmatchup.com', 'pINY4jXhcHSg95E3');
$mailin->
addTo($to, 'Qmatchup')->
setFrom('please-reply@qmatchup.com', 'Team Qmatchup')->
setReplyTo('please-reply@qmatchup.com','Team Qmatchup')->
setSubject($subject)->
setHtml($html);
$res = $mailin->send();
	

unset($mailin);

	//var_dump($res); die;
/*//$subject = 'Hello from Mandrill, PHP!';

$from = array('please-reply@qmatchup.com' =>'Team Qmatchup');


//$html = "<em>Mandrill speaks <strong>HTML</strong></em>";

//$html = "<em>Mandrill speaks <strong>HTML</strong></em>";

$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
$transport->setUsername('please-reply@qmatchup.com');
$transport->setPassword('QADk7L1FpFDov_1vJRgWqA');
$swift = Swift_Mailer::newInstance($transport);

$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setBody($html, 'text/html');
$message->setTo($to);
//$message->addPart($text, 'text/plain');

if ($recipients = $swift->send($message, $failures))
{
 return '1';
} else {
 return '0';
 //print_r($failures);
}*/




}


function sendEmailAttachment($subject, $to, $html, $from = array('please-reply@qmatchup.com' =>'Team Qmatchup'), $attachment   )
{
	
$mailin = new Mailin('kowaken.ghirmai@qmatchup.com', 'pINY4jXhcHSg95E3');
$mailin->
addTo($to, 'Qmatchup')->
setFrom('please-reply@qmatchup.com', 'Team Qmatchup')->
setReplyTo('please-reply@qmatchup.com','Team Qmatchup')->
setSubject($subject)->addAttachment($attachment)->setHtml($html);


$res = $mailin->send();
	

unset($mailin);

	//var_dump($res); die;
/*//$subject = 'Hello from Mandrill, PHP!';

$from = array('please-reply@qmatchup.com' =>'Team Qmatchup');


//$html = "<em>Mandrill speaks <strong>HTML</strong></em>";

//$html = "<em>Mandrill speaks <strong>HTML</strong></em>";

$transport = Swift_SmtpTransport::newInstance('smtp.mandrillapp.com', 587);
$transport->setUsername('please-reply@qmatchup.com');
$transport->setPassword('QADk7L1FpFDov_1vJRgWqA');
$swift = Swift_Mailer::newInstance($transport);

$message = new Swift_Message($subject);
$message->setFrom($from);
$message->setBody($html, 'text/html');
$message->setTo($to);
//$message->addPart($text, 'text/plain');

if ($recipients = $swift->send($message, $failures))
{
 return '1';
} else {
 return '0';
 //print_r($failures);
}*/




}

//unset($mailin);
?>