<?php

$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$myurl = explode( '/', $uri_parts[0] );
//print_r($myurl); die;
array_shift($myurl);
array_shift($myurl);
array_shift($myurl);
//array_shift($myurl);
 
require_once $myurl[1].'Controller.php';

if(!isset($myurl[2])){
	$myurl[2] = "index";
}

call_user_func_array(array($myurl[1].'Controller' , $myurl[2] ), array_slice($myurl, 3) ) ;

?>