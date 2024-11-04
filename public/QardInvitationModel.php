<?php

	require_once('../AppModel.php');
	class QardInvitationModel extends AppModel
	{
		
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$invitation_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,receiver_id from qard_invitation left join employees on employees.id=qard_invitation.sender_id where qard_invitation.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $invitation_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name from employees where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['receiver_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_profile = $result->fetch_assoc();
			
			$row['rname']=$row_profile['name'];
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['receiver_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
	
	}		