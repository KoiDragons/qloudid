<?php
class AppModel{

   public static function createConnection()
   {
   	ini_set('memory_limit', '-1');
   	 	 $username = "root";
		 $password = "";
	 	 $host = "localhost";
		 $dbname = "qloudid";
		 //$dbcon=@ mysql_connect('localhost', 'root', '','qloudid');
		 $dbCon = new mysqli($host, $username, $password,$dbname);
		
		if ($dbCon->connect_error) {
   			 die("Connection failed: " . $dbCon->connect_error);
		} 
		else
		{
			return $dbCon;
		}
	
   }
   
   function encrypt_decrypt($action, $string) 
	{
		ini_set('memory_limit', '-1');
		$output = false;
		$encrypt_method = "AES-256-CBC";
		$secret_key = 'T3!3Z@L3$@&$E(R3tK3y';
		$secret_iv = 'T3!3Z@L3$@&$E(R3tK3yiv';

		// hash
		$key = hash('sha256', $secret_key);
    
		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if( $action == 'encrypt' ) 
			{
				$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
				$output = base64_encode($output);
			}
		else if( $action == 'decrypt' )
			{
				$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			}

		return $output;
	}

}
