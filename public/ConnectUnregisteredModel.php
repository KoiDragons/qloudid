<?php
require_once('../AppModel.php');
class ConnectUnregisteredModel extends AppModel
{
 

		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt = $dbCon->prepare("select first_name,last_name,passport_image from user_logins where id=(select sender_id from connect_next_kin where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
		
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
    
	function requestKeenDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt = $dbCon->prepare("select keen_first_name,unique_code from connect_next_kin where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
		
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
}