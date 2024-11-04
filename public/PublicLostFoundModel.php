<?php
	require_once('../AppModel.php');
	class PublicLostFoundModel extends AppModel
	{
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_code,country_name  from phone_country_code order by country_name");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $contry;
		}
		
		function reportFound()
		{
			$dbCon = AppModel::createConnection();
			$data1 = strip_tags($_POST['indexing_save']);
			
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			$stmt = $dbCon->prepare("INSERT INTO public_found_item (sr_number, description, country_name, phone_number , image_path  ,created_on ) VALUES (?, ?, ?, ?, ?, now())");	
			$stmt->bind_param("sssss",$_POST['sr_number'],$_POST['description'],$_POST['country_phone'],$_POST['phone'],$img_name1);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	}								