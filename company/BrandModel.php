<?php
	require_once('../AppModel.php');
	class BrandModel extends AppModel
	{
		function headQuarterID($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from property_location where company_id = ? and is_headquarter=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("update property_location set is_headquarter=1 where company_id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select id from property_location where company_id = ? and is_headquarter=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			
			$enc=$this->encrypt_decrypt('encrypt',$row['id']);
			$stmt->close();
			$dbCon->close();
			return $enc;
					
		}
		
		function employeeID($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from employees where company_id = ? and user_login_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$enc=$this->encrypt_decrypt('encrypt',$row['id']);
			$stmt->close();
			$dbCon->close();
			return $enc;
					
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
		
		function permittedEmployees($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name from employee_app_permission left join employees on employees.id=employee_app_permission.employee_id where employee_app_permission.company_id=? and app_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$app_id);
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
		
		function getPermissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$country_id= $data['country_id'];
			
			 
			$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select app_id,sub_heading,app_link,manage_apps_permission.id,is_permission,app_name,is_downloaded,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=0 and is_mandatory=0");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$stmt = $dbCon->prepare("select count(id) as num from compnay_app_download where permission_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$company_id);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$org[$j]['is_downloaded']=0;
			}
			else
			{
			$org[$j]['is_downloaded']=1;	
			}
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			else
			{
		
			$stmt = $dbCon->prepare("select id,app_name from apps_detail");
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_apps_permission (country_id,app_id,created_on) values(?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$country_id,$row['id']);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select app_id,sub_heading,app_link,manage_apps_permission.id,is_permission,app_name,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  and app_type=0 and is_mandatory=0 and app_id!=52");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$stmt = $dbCon->prepare("select count(id) as num from compnay_app_download where permission_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$company_id);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$org[$j]['is_downloaded']=0;
			}
			else
			{
			$org[$j]['is_downloaded']=1;	
			}
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			}
		
			function verificationId($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$row['v_id']="";
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function getPermissionDetailEmployees($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select app_link,manage_apps_permission.id,is_permission,app_name,is_downloaded,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where manage_apps_permission.id in (select app_id from employee_app_permission where company_id=? and employee_id=(select employees.id from employees where company_id=? and user_login_id=?))  and app_type=0 and is_mandatory=0");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $company_id,$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			
			$stmt = $dbCon->prepare("select count(id) as num from compnay_app_download where permission_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$company_id);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$org[$j]['is_downloaded']=0;
			}
			else
			{
			$org[$j]['is_downloaded']=1;	
			}
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			}
		
		
		
		function getAppsPermissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			
			
			
			$stmt = $dbCon->prepare("select manage_apps_permission.id,is_permission,app_name,presentation,funktioner,nyheter,is_downloaded,image_path,app_id,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where manage_apps_permission.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select count(id) as num from compnay_app_download where permission_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$company_id);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$row['is_downloaded']=0;
			}
			else
			{
			$row['is_downloaded']=1;	
			}
			if($row['app_id']!=1 && $row['app_id']!=2 && $row['app_id']!=3 && $row['app_id']!=6  && $row['app_id']!=12 && $row['app_id']!=13 && $row['app_id']!=57)
			{
				$row['image_path']='https://www.safeqloud.com/html/usercontent/images/dstricts/logo1.jpeg';
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
			}
			function employeeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select id,lower(first_name) first_name,lower(last_name) last_name,lower(email) email from employees where company_id=? and id not in (select employee_id from employee_app_permission where company_id=? and app_id=?)");
			
			$stmt->bind_param("iii",$company_id,$company_id,$app_id);
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
		
		 function appDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$app_id=$this -> encrypt_decrypt('decrypt',$data['aid']);
			 
			$stmt = $dbCon->prepare("select * from `qloudid`.`apps_detail` where id=(select app_id from manage_apps_permission where id=?)");
					/* bind parameters for markers */
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAppFee = $result->fetch_assoc();
			$rowAppFee['enc']=$this->encrypt_decrypt('encrypt',$rowAppFee['id']);
			$stmt->close();
			$dbCon->close();
			return $rowAppFee;
		}
		 function appFeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id=$this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from `qloudid`.`app_start_fee_info` where app_id=?");
					/* bind parameters for markers */
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into app_start_fee_info (app_id) values(?)");
			/* bind parameters for markers */
			$stmt->bind_param("i",$app_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("select * from app_start_fee_info where app_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function appPriceDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from app_price_info where app_id=(select app_id from manage_apps_permission where id=?) and country_id =(select country_id from companies where id=?)");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("ii", $app_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$org[$cont]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			$cont++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			}
		
		
			function downloadApp($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("insert into compnay_app_download(permission_id,company_id,created_on) values(? , ?, now())");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $app_id,$company_id);
			$stmt->execute();
			
			
		$stmt = $dbCon->prepare("select * from `qloudid`.`manage_apps_permission` where id=?");
					/* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowAppFee = $result->fetch_assoc();	
			 
		$stmt = $dbCon->prepare("select * from `qloudid`.`app_start_fee_info` where app_id=?");
					/* bind parameters for markers */
		$stmt->bind_param("i", $rowAppFee['id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowAppFee1 = $result->fetch_assoc(); 

		if($rowAppFee1['trial_period']==1 && $rowAppFee['app_id']==57)
		{
		$stmt = $dbCon->prepare("select count(id) as num from `qloudid`.`vitech_property_proposal` where company_id=?");
        
		/* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$rowProperty = $result->fetch_assoc();	
		if($rowProperty['num']<$rowAppFee1['free_proposals'])
		{
		$stmt->close();
        $dbCon->close();
        return 1;		
		}
		else
		{
		$stmt = $dbCon->prepare("select id from safe_qid_plan_detail where app_id=? and company_id=?");
					/* bind parameters for markers */
		$plan=2;
		$stmt->bind_param("ii", $rowAppFee['app_id'],$company_id);
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
        return 1;		
		}
			
		}	
		}
		else
		{
			 
		$stmt = $dbCon->prepare("select id from safe_qid_plan_detail where app_id=? and company_id=?");
					/* bind parameters for markers */
		$plan=2;
		$stmt->bind_param("ii", $rowAppFee['app_id'],$company_id);
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
        return 1;		
		}	
		}
			
		
		}
		
		
		 
		function lockFreePlan($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$plan=1;
			$app_id=$this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from `qloudid`.`manage_apps_permission` where id=?");
					/* bind parameters for markers */
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAppFee = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from `qloudid`.`safe_qid_plan_detail` where company_id=? and app_id=?");
					/* bind parameters for markers */
			$stmt->bind_param("ii",$company_id,$rowAppFee['app_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowFee = $result->fetch_assoc();
			if(empty($rowFee))
			{
			$stmt = $dbCon->prepare("insert into safe_qid_plan_detail(company_id,plan_type,app_id,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("iii",$company_id,$plan,$rowAppFee['app_id']);
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
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
			
				$stmt->close();
				$dbCon->close();
				return 2;
			
		}
		
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
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status,grading_status,country_of_residence,country_name,user_logins.created_on from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function completedEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
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
		
		
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,email,country_of_residence  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function employeeAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select ssn,address,country,city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone,phone_verified from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
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
			
			$stmt = $dbCon->prepare("select companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,companies.country_id from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		function updateDataPost($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataPostSupplier($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("sssssssssi", $_POST['addrssi'],$_POST['citysi'],$_POST['cntrysi'],$_POST['zipsi'],$_POST['addrssd'],$_POST['citysd'],$_POST['cntrysd'],$_POST['zipsd'],$_POST['vat'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataPostNew($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function countryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select country_name from country where id>-1");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org="";
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['country_name'].",";
			}
			
			$org=substr($org,0,-1);
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function industryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select name from company_categories");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org="";
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['name'].",";
			}
			
			$org=substr($org,0,-1);
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateDataPhone($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set phone_country=?,phone=? where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['c_phone'],$_POST['phone'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateImage($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			//echo $img_name1; print_r($_POST); die;
			$stmt = $dbCon->prepare("update company_profiles set profile_pic=?  where company_id=?");
			
			$stmt->bind_param("si", $img_name1,$company_id);
			$stmt->execute();
			// echo "jain"; die;
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateData($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			//  print_r($_POST); die;
			$stmt = $dbCon->prepare("update companies set company_name=?,industry=?  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['name'],$_POST['l_name'],$company_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update company_profiles set cid=?,founded=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['ssn'],$_POST['dob'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataBank($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update company_profiles set bankgiro_med=?,bankgiro_utan=?,iban=?,bic=?,bank=?,f_tax=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssssi", $_POST['bankgiro_med'],$_POST['bankgiro_utan'],$_POST['iban'],$_POST['bic'],$_POST['bank'],$_POST['ftax'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function addWeblink($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from company_aboutus_weblink  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO company_aboutus_weblink (company_id, created_on , website,wlink ) VALUES (?, now(), ?, ?)");
				
				
				$stmt->bind_param("iss", $company_id,$_POST['web'],$_POST['wlink']);
				$stmt->execute();
				$stmt = $dbCon->prepare("select company_email from companies  where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				//print_r($row); die;
				$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/webLink';
				
				$fields = Array('company_email' => $row['company_email'],'web' => $_POST['web'],'wlink' => $_POST['wlink']);
				//$fields[]
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($fields));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				$result = curl_exec($ch);
				
				curl_close($ch);
				
				$stmt = $dbCon->prepare("select link_id from company_aboutus_weblink where company_id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row['link_id'];
			}
			
			$stmt->close();
			$dbCon->close();
			return 0;
		}
		
		
		function updateLinkid()
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id from companies  where company_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['company_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			
			$stmt = $dbCon->prepare("update company_aboutus_weblink set link_id=? where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si",$_POST['linkid'], $row['id']);
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function aboutUsCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_aboutus_weblink  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		function getLinkid($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select link_id from company_aboutus_weblink where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['link_id'];
		}
		
		function setPermission($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select email from employees where id=?");
			
			$stmt->bind_param("i",$_POST['ind']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into employee_app_permission(app_id,employee_id,company_id,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("iii",$app_id,$_POST['ind'],$company_id);
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
	}	