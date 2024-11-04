<?php
	require_once('../AppModel.php');
	class LandloardInhouseModel extends AppModel
	{
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		
		function appId($data)
		{
			
			return $this -> encrypt_decrypt('encrypt',$data['fapp_id']);
		}
		
		
		 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['fapp_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
		function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
		}
		
		
		function listProposals($data)
		{
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
	 
			 
			$stmt = $dbCon->prepare("select * from landloard_society_proposal where company_id=? and proposal_type=2");
        
			/* bind parameters for markers */
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				
			 $stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$_POST['country']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_country = $result1->fetch_assoc();
			$row['country_code']=$row_country['country_code'];
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
			}
			
			 
		$stmt->close();
        $dbCon->close();
        return $org;
	}	
	
		
		function getLandloardProposalCommunityList($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
				 
				$stmt = $dbCon->prepare("select * from `qloudid`.`landloard_society` where id in (select society_id from landloard_society_buildings where building_id in (select buildingid from landloard_building_ports where id in(select port_id from landloard_building_port_floors where id in(select floor_id from landloard_building_port_floors_offices where is_office=0 and is_published=1)))) and company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				$j=0;
				while($row = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("select company_name from companies where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['company_name']=$rowPic['company_name']; 
					$stmt = $dbCon->prepare("select * from community_photos where community_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['imageId']=$rowPic['community_photo_path'];
					$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
					array_push($org,$row);
				}	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		function sendPropertyProposal($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			 $stmt = $dbCon->prepare("select id from landloard_society_proposal where `country_id`=? and `phone_number`=? and `company_id`=? and `created_by`=? and proposal_type=2");
			/* bind parameters for markers */
			 
			$stmt->bind_param("isii",$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$proposal_type=2;
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `landloard_society_proposal`(proposal_type,user_title,first_name,last_name,email, `country_id`,`phone_number`,`created_on`,`company_id`,`created_by`,team_available,team_members)  values(?,?,?,?,?,?, ?, now(),?,?,?,?)");
			$stmt->bind_param("issssisiiis",$proposal_type,$_POST['title'],$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id'],$_POST['team_available'],$_POST['team_member']);
			$stmt->execute();
			$id=$stmt->insert_id;			
			}
			else
			{
			$stmt = $dbCon->prepare("update `landloard_society_proposal` set team_available=?,team_members=? where id=?");
			$stmt->bind_param("isi",$_POST['team_available'],$_POST['team_member'],$row['id']);
			$stmt->execute();
			$id=$row['id'];				
			}
			
			$a=explode(',',$_POST['proposal_data']);
			foreach($a as $key)
			{ 
			$stmt = $dbCon->prepare("select id from landloard_society_proposal_suggestions where `proposal_id`=? and `property_id`=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("is",$id,$key);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `landloard_society_proposal_suggestions`(proposal_id,property_id)  values(?,?)");
			$stmt->bind_param("is",$id,$key);
			$stmt->execute();	
			}
			
			}
			
			 $stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$url="https://www.qloudid.com/public/index.php/LandloardBroker/proposerDetail/".$this->encrypt_decrypt('encrypt',$id);
			$surl=getShortUrl($url);
			$subject="Proposal received";
			$emailContent='Hi '.$_POST['fname'].', I have found great properties for you! Check them out: '.$surl.'. Let me know if you are interested!';
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			try{
				$res=sendSms($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				 
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		 function getLandloardCommunityList($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id=$this->encrypt_decrypt('decrypt',$data['bid']);
				 
				$stmt = $dbCon->prepare("select * from `qloudid`.`landloard_society` where id in (select society_id from landloard_society_buildings where building_id in (select buildingid from landloard_building_ports where id in(select port_id from landloard_building_port_floors where id in(select floor_id from landloard_building_port_floors_offices where is_office=0 and is_published=1)))) and company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				$j=0;
				while($row = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("select company_name from companies where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['company_name']=$rowPic['company_name']; 
					$stmt = $dbCon->prepare("select * from community_photos where community_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['imageId']=$rowPic['community_photo_path'];
					$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
					array_push($org,$row);
				}	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		 
		
	}
