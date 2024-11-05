<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods:  GET');
error_reporting(E_ALL ^ E_DEPRECATED);
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$myurl = explode( '/', $uri_parts[0] );

array_shift($myurl);
array_shift($myurl);
//array_shift($myurl);
//array_shift($myurl);
//array_shift($myurl);
//print_r($myurl); die;
include $myurl[1].'Controller.php';

if(!isset($myurl[2])){
	$myurl[2] = "index";
}
//$obj = new $myurl[1].'Controller';
//echo $_SERVER['REQUEST_URI'];die;
//echo"<pre>"; print_r($myurl); die;
try{
call_user_func_array(array($myurl[1].'Controller' , $myurl[2] ), array_slice($myurl, 3) );
}
catch(Exception $e)
{
	error_log($e->getMessage());
}

?>
