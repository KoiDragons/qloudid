<?php
	require_once('../AppModel.php');
	class InstaBoxModel extends AppModel
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
			 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
		
		
		function updateInstabox($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['hid']);
			
			$stmt = $dbCon->prepare("select insta_box_id,booking_id,checkout_room_id from hotel_basic_information where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update hotel_basic_information set login_ip=null,login_status=0,login_started_at=null,insta_box_id=null,booking_id=null,checkout_room_id=0 where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("update hotel_insta_boxes set booking_id=?,in_use=1,room_id=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("iii",$rowProperty['booking_id'],$rowProperty['checkout_room_id'],$rowProperty['insta_box_id']);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			 
			
		}
		
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			
		function hotelImgeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['hid']);
			
			$stmt = $dbCon->prepare("select image_path from hotel_images where property_id=(select property_id from hotel_basic_information where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowImage = $result->fetch_assoc();
			 if(empty($rowImage))
			 {
				$rowImage['image_path']="https://safeqloud-228cbc38a2be.herokuapp.com/html/usercontent/images/dstricts/10.png"; 
			 }
			 else
			 {
			$filename="../estorecss/".$rowImage['image_path'].".txt"; $value_a=file_get_contents("../estorecss/".$rowImage['image_path'].".txt"); $value_a=str_replace('"','',$value_a); $rowImage['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImage['image_path'].'.jpg' );
			$rowImage['image_path']=str_replace('../','https://safeqloud-228cbc38a2be.herokuapp.com/',$rowImage['image_path']);  
			 }
			
			$stmt->close();
			$dbCon->close();
			return $rowImage;
			 
			
		}
		
		
		function verifyKey($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,checkin_code from hotel_checkout_detail where checkin_code=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$_POST['ecode']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select id from hotel_insta_boxes where booking_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowInsta = $result->fetch_assoc();
			
			if(empty($rowInsta))
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			else
			{
			$stmt = $dbCon->prepare("update hotel_checkout_detail set key_received=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update hotel_insta_boxes  set booking_id=null,in_use=0,room_id=0 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$rowInsta['id']);
			$stmt->execute();
			
			$curl = curl_init();
			  curl_setopt_array($curl, array(
			  CURLOPT_URL => 'https://dstricts.com/user/index.php/DstrictsApp/updateKeyReceiving',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => array('checkid' => $row['id']),
			));
			$response = curl_exec($curl);
			curl_close($curl);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
		}
		
		
		function checkTimeReference($data)
		{
			$dbCon = AppModel::createConnection();
			
			$id=$this->encrypt_decrypt('decrypt',$data['hid']);
			
			$stmt = $dbCon->prepare("select insta_box_id,booking_id,login_started_at,login_status from hotel_basic_information where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProperty = $result->fetch_assoc();
			if($rowProperty['login_status']==2)
			{
			$LoginTime=strtotime($rowProperty['login_started_at']);
			$currentTime=strtotime(date('Y-m-d H:i:s'));
			$minutes = round(abs($currentTime - $LoginTime) / 60,2); 
			
			if($minutes>=4)
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}	
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
	}		