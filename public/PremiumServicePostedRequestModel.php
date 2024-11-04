<?php
	require_once('../AppModel.php');
	class PremiumServicePostedRequestModel extends AppModel
	{
		function postedJobsList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$data['user_id']=$this->encrypt_decrypt('decrypt',$data['uid']);
			$stmt = $dbCon->prepare("select address,port_number,zipcode,user_professional_service_request.id,category_name,subcategory_name,user_property_id, selected_qualified_companies from user_professional_service_request left join professional_service_category on professional_service_category.id=user_professional_service_request.category_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id where user_property_id  is not null and user_professional_service_request.user_id=? order by id desc");
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;	
	}

	}	