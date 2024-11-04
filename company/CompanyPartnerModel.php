<?php
	require_once('../AppModel.php');
	class CompanyPartnerModel extends AppModel
	{
			function countryInfo($data)
			{
				 $dbCon = AppModel::createConnection();
				 $country_id=$data['country_id'];
				$stmt = $dbCon->prepare("select is_visible from country where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $country_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				 return $row['is_visible'];
			}	
		function getMandatoryApps($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$country_id= $data['country_id'];
			$stmt = $dbCon->prepare("select manage_apps_permission.id,app_name from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=0 and is_mandatory=1 order by app_name");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			}
		
		function userDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,first_name,last_name from employees where company_id=? and user_login_id=?");
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function adminDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select is_admin from manage_employee_permissions where company_id=? and user_id=?");
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt->close();
			$dbCon->close();
			return $row['is_admin'];
			
			
		}
	
		function remainingpartnerType($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,partner_type from partner_type where id not in(select partner_type_id from company_partner_type where company_id=?)");
			
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function remainingpartnerTypeCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from partner_type where id not in(select partner_type_id from company_partner_type where company_id=?)");
			
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function employeeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,lower(first_name) first_name,lower(last_name) last_name,lower(email) email from employees where company_id=?");
			
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators[$i]['id']=$row['id'];
				$collaborators[$i]['first-name']=$row['first_name'];
				$collaborators[$i]['last-name']=$row['last_name'];
				$collaborators[$i]['email']=$row['email'];
				
				$collaborators[$i]['label']=$row['first_name'].' '.$row['last_name'].', <'.$row['email'].'>';
				
				$i++;
			}
			//print_r($collaborators); die;
			$filter = strtolower($data['filter']);
			$output = array();
			foreach ($collaborators as $collaborator) {
				if(substr_count($collaborator['label'], $filter) > 0){
					$output[] = $collaborator;
				}
			}
			$out=json_encode($output);
			$stmt->close();
			$dbCon->close();
			return $out;
			
			
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
			
			$stmt = $dbCon->prepare("select country_id,country_name,grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id left join country on country.id=companies.country_id where companies.id=?");
			
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
		
		function sendInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select email from employees where id=?");
			//print_r($_POST); die;
			$stmt->bind_param("i",$_POST['ind']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("insert into company_partner(company_partner_name,address,zip_code,city,country,employee_id,company_id,created_on,cid)
			values(?,?,?,?,?,?,?,now(),?)");
			$stmt->bind_param("sssssiis",htmlentities($_POST['company_name'],ENT_NOQUOTES,'ISO-8859-1'),htmlentities($_POST['address'],ENT_NOQUOTES,'ISO-8859-1'),$_POST['zip_code'],htmlentities($_POST['city'],ENT_NOQUOTES,'ISO-8859-1'),$_POST['ccountry'],$_POST['ind'],$company_id,$_POST['cid']);
			if($stmt->execute())
			{
				$indexing=substr($_POST['indexing_save_partner'],0,-1);
				
				$id=explode(',',$indexing);
				$last_id=$stmt->insert_id;
				foreach($id as $key)
				{
					$stmt = $dbCon->prepare("insert into company_partner_type(partner_type_id,company_id,company_partner_id,created_on)
					values(?,?,?,now())");
					$stmt->bind_param("iii",$key,$company_id,$last_id);
					$stmt->execute();
				}
				$to='kowaken.ghirmai@qmatchup.com';
				$subject       = 'Partner Information';
				
				$emailContent ='Hi,</br>				
				Partner request';
				sendEmail($subject, $to, $emailContent);	
				
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
	}										