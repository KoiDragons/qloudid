<?php
require_once('../AppModel.php');
class PublicResidentialRequestModel extends AppModel
{
	function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
		}
		
		
		 function addressDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select * from user_address where id=(select apartment_id from user_apartment_residential where id=?)");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from user_logins where id=?");
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['owner_detail'] = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function requestDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("select * from user_apartment_residential where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function rejectResidence($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			
			$stmt = $dbCon->prepare("update user_apartment_residential set is_confirmed=2 where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function approveResidence($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$stmt = $dbCon->prepare("update user_apartment_residential set is_confirmed=1 where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;			
			
		}
		
		
		function addSignupRequest($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			$requestDetail    = $this->requestDetail($data);
			$stmt = $dbCon->prepare("insert into qloud_common_signup");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$signup_type=2;
			$stmt = $dbCon->prepare("insert into qloud_common_signup (apartment_id,country_id,phone_number,signup_type,residence_request_id) values (?,?,?,?)");
			$stmt->bind_param("iisi",$requestDetail['apartment_id'],$requestDetail['country_id'],$requestDetail['phone_number'],$signup_type,$request_id);
			$stmt->execute();
			$id=$stmt->insert_id;			
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$id);			
			
		}
		
}