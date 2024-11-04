<?php
require_once('../AppModel.php');
class CardsInformationModel extends AppModel
{
	function developerCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select is_approved from company_developer_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return -1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['is_approved'];	
			}
			
			
		}
		
		function companyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from company_profiles  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				//echo "hi"; die;
				$stmt = $dbCon->prepare("INSERT INTO company_profiles (company_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function saveCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("insert into company_cards(`company_id`,`created_on`,`card_number`,card_cvv,exp_month,exp_year,name_on_card,card_type) values(?, now(), ?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("isiiiss", $company_id,$_POST['card_number'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],htmlentities($_POST['card_name'],ENT_NOQUOTES, 'ISO-8859-1'),$data['card_type']);
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
		
		function updateCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$card_id= $this -> encrypt_decrypt('decrypt',$data['card_id']);
			print_r($data);
			print_r($_POST);
			 
			$stmt = $dbCon->prepare("update company_cards set `card_number`=?,card_cvv=?,exp_month=?, exp_year=?, name_on_card=? ,card_type=? where id=?");
			$stmt->bind_param("siiissi",$_POST['card_number'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],htmlentities($_POST['card_name'],ENT_NOQUOTES, 'ISO-8859-1'),$data['card_type'],$card_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		function listCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,name_on_card,card_number from  company_cards where `company_id`=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['card_number']='**** **** **** '.substr($row['card_number'],-4);
				$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			return $org;
		}
		function cardInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$card_id= $this -> encrypt_decrypt('decrypt',$data['card_id']);
			$stmt = $dbCon->prepare("select * from  company_cards where `id`=?");
			$stmt->bind_param("i", $card_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $row;
		}
		
		
		function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			else
			{
				if($row['is_admin']==0)
				{
					$stmt->close();
					$dbCon->close();
					return 0;
				}
				else
				{
					$stmt->close();
					$dbCon->close();
					return 1;
				}
			}
			
			
		}
		
  function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select hotel_name,property_location.id,property_name,visiting_address,property_location.created_on,is_hotel from property_location left join property on property.id=property_location.property_id left join hotel_basic_information on hotel_basic_information.property_id=property_location.id  where property_location.company_id=? order by created_on desc");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
    
     
    
}