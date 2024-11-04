<?php
	require_once('../AppModel.php');
	class PublicMissingPeopleModel extends AppModel
	{
		
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code order by country_code");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			return $contry;
			$stmt->close();
			$dbCon->close();
			
		}
		
		function selectCountry1()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country where id>1 and id<240 order by country_name");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			return $contry;
			$stmt->close();
			$dbCon->close();
			
		}
			function addperson()
		{
			$dbCon = AppModel::createConnection();
			
			if($_POST['image_data']=="")
			{
			$img_name1='';	
			}
			else
			{
			$data1 = strip_tags($_POST['image_data']);
					 
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			 
			$stmt = $dbCon->prepare("insert into missing_people_public (first_name,last_name,ssn_country,ssn,phone_country,phone_number,email,description,created_on,person_image)
			values(?,?,?,?,?,?,?,?,now(),?)");
			$stmt->bind_param("ssisissss",$_POST['f_name'],$_POST['l_name'],$_POST['ccountry1'],$_POST['ssn'],$_POST['ccountry'],$_POST['uphno'],$_POST['email'],$_POST['description'],$img_name1);
			
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$_POST['ccountry']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
					$phone='+'.trim($row['country_code']).''.trim($_POST['uphno']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					$html='Pls call this number +46762072192.';
					
					$res=sendSms($subject, $to, $html);
					 
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{ 
		echo "error"; die;
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
	}								