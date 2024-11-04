<?php
//die;
 require_once 'configs/encrypt_decrypt.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
$myurl = explode( '/', $uri_parts[0] );
array_shift($myurl);
array_shift($myurl);
array_shift($myurl);
//echo "<pre>";print_r($_REQUEST);echo"<pre>"; die;
//echo "<pre>";print_r($_SERVER);echo"<pre>";
//die;
//echo "<pre>";print_r($myurl);echo"<pre>";
//echo "<pre>";print_r($request);echo"<pre>";
//die;

require_once 'api/CompaniesController.php';
$org=array("getComp" => 'GET',"companyDetail" => 'GET',"companyFullDetail" => 'POST');

$link = mysqli_connect('localhost', 'ankita', 'UW4FySRCq4tfFDzW', 'qloud');
mysqli_set_charset($link,'utf8');
 $value=array();
//array_shift($request);
$table = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
//echo "<pre>";print_r($request);echo"<pre>";
$key = encrypt_decrypt('decrypt',array_shift($request));
//echo "<pre>";print_r($request);echo"<pre>";
//die($key);
//echo $key;
if(!$key)
{
	
	 http_response_code(404);
	 echo "error Code 404 Occured"; die;
}
 $key1= array_shift($request)+0;
//echo $method; die;
 	if (array_key_exists($table,$org))
		  {
			  //die("1");
			  if($org[$table]==$method)
			  {
				//echo "jain"; die;
			  }
			  else
				  {
					 //echo "jain"; die;
				  http_response_code(404);
				   echo "error Code 404 Occured"; die;
				  }
		  }
		else
		  {
			//  die("2");
		  http_response_code(404);
		   echo "error Code 404 Occured"; die;
		  }
	  $file_name=array();
	  $file_name[0]='Companies';
switch ($method) {
  case 'GET':
  $value[0]=$table;
  $value[1]=$key;
 
   call_user_func_array(array($file_name[0].'Controller' , $value[0] ), array_slice($value, 1) ) ;
   break;
  case 'POST':
  $value[0]=$table;
  $value[1]=$key;
	call_user_func_array(array($file_name[0].'Controller' , $value[0] ),  array_slice($value, 1) ) ;
	
  
}
 
mysqli_close($link);
?>