<?php
	require_once('../AppModel.php');
	class DeliveryPickupModel extends AppModel
	{
		function corporateColor($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("select * from corporate_color where company_id=?");
				
				$stmt->bind_param("i",$company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
						
						$stmt->close();
						$dbCon->close();
						return $row;
				
			}
			
		function selectWhitelistCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select id from whitelist_company where company_id = ? and status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
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
				$stmt->close();
				$dbCon->close();
				return $row['id'];
			}
			
			
		}
		
		function selectWhitelistCompanyName($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_name,exposed_times from whitelist_company where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['comp_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$exposed=$row['exposed_times']+1;
			$stmt = $dbCon->prepare("update whitelist_company set exposed_times=? where id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $exposed,$data['comp_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $row['company_name'];
			
			
			
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
		
		function sendInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select email,phone_number,country_code from employees left join user_profiles on user_profiles.user_logins_id=employees.user_login_id left join phone_country_code on user_profiles.country_phone=phone_country_code.country_name where employees.id=?");
			
			$stmt->bind_param("i",$_POST['ind']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into package_delivery(company_id,employee_id,description,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("iis",$company_id,$_POST['ind'],$_POST['desc']);
			$stmt->execute();
			
			
			$to=$row['email'];
			$subject       = 'Delivery Information';
			
			$emailContent ='Hi,</br>				
			You have a delivery to pick up at the reception.</br>
			Receptionist</br>';
			
			
			sendEmail($subject, $to, $emailContent);	
			
			$phone="+".trim($row['country_code'])."".trim($row['phone_number']);
			
			$subject='Pickup Info';
			$to=$phone;
			$html='Du har en leverans att hämta...';
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
	}								