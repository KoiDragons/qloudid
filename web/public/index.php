<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$myurl = explode( '/', $uri_parts[0] );

//array_shift($myurl);
//array_shift($myurl);
array_shift($myurl);
array_shift($myurl);
 
require_once $myurl[1].'Controller.php';

if(!isset($myurl[2])){
	$myurl[2] = "index";
}
//print_r($myurl);  
call_user_func_array(array($myurl[1].'Controller' , $myurl[2] ), array_slice($myurl, 4) ) ;

?>
