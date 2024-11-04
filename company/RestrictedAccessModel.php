<?php
require_once('../AppModel.php');
class RestrictedAccessModel extends AppModel
{
 
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
		
	
    function sendRequest($data)
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
				$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$cont,$row['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id from company_admin_requests where company_id=? and user_id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("iii",$company_id,$data['user_id']);
			$stmt->execute();
			$result_admin = $stmt->get_result();
			$row_admin = $result_admin->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into company_admin_requests (user_id,company_id,created_on,employee_id) values(?, ?,now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii",$data['user_id'],$company_id,$row['id']);
			$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			else
			{
			$stmt = $dbCon->prepare("select id from company_admin_requests where company_id=? and user_id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into company_admin_requests (user_id,company_id,created_on,employee_id) values(?, ?,now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii",$data['user_id'],$company_id,$row['id']);
			$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();
			return 1;
				
			}
			
			
		}
		
}