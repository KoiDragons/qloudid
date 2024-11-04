<?php
require_once('../AppModel.php');
class DemoSignModel extends AppModel
{
	 function verifyIP()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			 $stmt = $dbCon->prepare("select login_status from user_certificates where login_started_for=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			
			if($row['login_status']!=2)
			{
				$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
				/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();	
			}
			 
				 $t=microtime();
				 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
	
    function updateCertificate()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			 
				$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for=?");
				/* bind parameters for markers */
				$stmt->bind_param("s", $ip);
				$stmt->execute();	
				$dbCon->close();
				return 1;
			 
		}
	
}