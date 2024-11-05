<?php
require_once('../AppModel.php');
class ConsentKinRequestModel extends AppModel
{
 
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image from user_logins where id = ?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	
    function userAccount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
         $row = $result->fetch_assoc();
        
        $stmt->close();
        $dbCon->close();
        return $row;
        
    }
	
	 
	 function kinDetailInfo($data)
    {
        $dbCon = AppModel::createConnection();
        $request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
        $stmt = $dbCon->prepare("select first_name,last_name,concat_ws(' ',first_name,last_name) as name, passport_image,connect_next_kin.created_on,is_approved,sender_id,receiver_id  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.sender_id where connect_next_kin.id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
		if($row['sender_id']==$data['user_id'])
		{
		$stmt = $dbCon->prepare("select first_name,last_name,concat_ws(' ',first_name,last_name) as name, passport_image,connect_next_kin.created_on,is_approved,sender_id,receiver_id  from connect_next_kin left join user_logins on user_logins.id=connect_next_kin.receiver_id where connect_next_kin.id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $request_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();	
		$stmt->close();
        $dbCon->close();
        return $row;	
		}
        $stmt->close();
        $dbCon->close();
        return $row;
        
    }
	
	
	function approveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt= $dbCon->prepare("update connect_next_kin set is_approved=1 where id=? ");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select sender_id,receiver_id from connect_next_kin where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $row['sender_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_sender = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $row['receiver_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_receiver = $result1->fetch_assoc();
			$fields=array();
			
			$fields['sender']=$row_sender['email'];
			$fields['receiver']=$row_receiver['email'];
			$url='https://www.qmatchup.com/beta/company/index.php/ManageEmployee/updateNextKin';
			$ch = curl_init();
			 
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30);  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
			 
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			 
			$result=curl_exec ($ch);
			curl_close ($ch);
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt("decrypt",$data['id']);
			$stmt= $dbCon->prepare("update connect_next_kin set is_approved=2 where id=? ");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
	 
}