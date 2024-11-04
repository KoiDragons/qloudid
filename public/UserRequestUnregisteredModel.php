<?php
require_once('../AppModel.php');
class UserRequestUnregisteredModel extends AppModel
{
 

		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt = $dbCon->prepare("select first_name,last_name from user_logins where id=(select request_sender from user_detail_requests where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
		
			$row = $result->fetch_assoc();
			return $row;
			$stmt->close();
			$dbCon->close();
			
		}
    
}