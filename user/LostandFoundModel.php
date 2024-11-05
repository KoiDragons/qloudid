<?php
	require_once('../AppModel.php');
	class LostandFoundModel extends AppModel
	{
		function updateAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("update user_lost_and_found set address=? where id=?");
			$stmt->bind_param("si",$_POST['adrs1'],$id);
			if($stmt->execute())
			{
			 
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		function sendInformation($data)
		{
			$dbCon = AppModel::createConnection();
			
			$j=0;
			
			while($j==0)
			{
			$code=mt_rand(111111111111,999999999999); 
			$stmt = $dbCon->prepare("select id from used_sr_number where sr_number=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("s",$code);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$j++;
			}
			}
			$stmt = $dbCon->prepare("insert into user_lost_and_found(item_number,serial_number,user_id,created_on,unique_serial_code,item_name)
			values(?,?,?,now(),?,?)");
			$stmt->bind_param("isiss",$_POST['item_number'],$code,$data['user_id'],$code,htmlentities($_POST['item_name'],ENT_NOQUOTES, 'ISO-8859-1'));
			if($stmt->execute())
			{
			$st=1;
			$id=$stmt->insert_id;
			$enc=$this->encrypt_decrypt('encrypt',$id);
			$stmt = $dbCon->prepare("insert into used_sr_number(sr_number,used_on,created_on)
			values(?,?,now())");
			$stmt->bind_param("si", $code,$st);
			$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return $enc;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
	}								