<?php
require_once('../AppModel.php');

class ManageAppsLocationModel extends AppModel
{
 
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		

		
        $stmt = $dbCon->prepare("select company_name from companies where companies.id = ?");
        
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	
	
	function assignedAppInfo($data)
    {
        $dbCon = AppModel::createConnection();
        $assigned_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
		

		
        $stmt = $dbCon->prepare("select total_desk,location_id,app_id from company_apps_location where id = ?");
        
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $assigned_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
   
      function userAccount($data)
    {
        $dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select sex,dob_day,dob_month,dob_year,created_on,email,country_name,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,get_started_wizard_status from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
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
			
	 function employeeAccount($data)
    {
        $dbCon = AppModel::createConnection();
         $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select id,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country  from user_company_profile  where company_id=? and user_login_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $company_id,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
         $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
        $stmt->close();
        $dbCon->close();
        return $row;
    }
	
	 
    
		function appsAssignedLocation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,visiting_address,is_headquarter from property_location where id in(select location_id from company_apps_location  where company_apps_location.company_id=?) order by created_on");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$resultP = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowP = $resultP->fetch_assoc())
			{
				array_push($org,$rowP);
				$org[$j]['apps_detail']=array();
			$stmt = $dbCon->prepare("select company_apps_location.id,app_name,visiting_address,total_desk from company_apps_location left join property_location on property_location.id=company_apps_location.location_id left join apps_detail on apps_detail.id=company_apps_location.app_id where company_apps_location.company_id=? and location_id=?");
			$stmt->bind_param("ii", $company_id,$rowP['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org[$j]['apps_detail'],$row);
				$org[$j]['apps_detail'][$i]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				$i++;
			}
			$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
		
		
			function updateAdmin($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from companies where user_login_id=? and id=?");
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
			$stmt = $dbCon->prepare("select id,permission from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
			else
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		
		
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
			/* bind parameters for markers */
			$cont=1;
			
		
			$stmt->bind_param("iiiiii",$cont,$row['id'],$cont,$data['user_id'],$company_id,$data['page_id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
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
		
		function downloadedApps($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select apps_detail.id,app_name from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where manage_apps_permission.id in (select permission_id from compnay_app_download where company_id=?) and apps_detail.is_business=1");
			$stmt->bind_param("i", $company_id);
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
		
		
		function locationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,visiting_address from property_location where id not in(select location_id from company_apps_location where app_id=?) and company_id=?");
			$stmt->bind_param("ii", $_POST['app_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">--Select--</option>';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'">'.$row['visiting_address'].'</option>';
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
    
	
		function locationAll($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,visiting_address from property_location where company_id=?");
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
		
		
		function updateLocationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("insert into company_apps_location (app_id, location_id, user_id, company_id,created_on, total_desk) values(?, ?, ?, ?, now(), ?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiiii",$_POST['app'],$_POST['location'],$data['user_id'],$company_id,$_POST['totl_time']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function updateLocationInfoData($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$assignment_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			if($_POST['app_location']==$_POST['location'])
			{
				if($_POST['totl_time']>0)
				{
				$stmt = $dbCon->prepare("update company_apps_location set total_desk=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ii",$_POST['totl_time'],$assignment_id);
				$stmt->execute();	
				}
				else
				{
				$stmt = $dbCon->prepare("delete from company_apps_location  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $assignment_id);
				$stmt->execute();	
					
				}
				
			}
			else
			{
			$stmt = $dbCon->prepare("select id,total_desk from company_apps_location where app_id=? and location_id=?");
			$stmt->bind_param("ii",$_POST['app'],$_POST['location']);
			$stmt->execute();
			$result = $stmt->get_result();	
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("update company_apps_location set total_desk=?,location_id=? where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("iii",$_POST['totl_time'],$_POST['location'],$assignment_id);
			$stmt->execute();	
				
			}
			else
			{
			$total_desk=$row['total_desk']+	$_POST['totl_time'];
			$stmt = $dbCon->prepare("update company_apps_location set total_desk=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$total_desk,$row['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from company_apps_location  where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $assignment_id);
			$stmt->execute();		
			}
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		
}