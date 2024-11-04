<?php
require_once('../AppModel.php');
class UserHijackStatusCheckModel extends AppModel
{
	 function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
	function countryOption()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code order by country_name");
			/* bind parameters for markers */
			$cont=1;
			
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
	
	    function getUserInfo($data)
    {
        $dbCon = AppModel::createConnection();
        if($_POST['stype']==1)
		{
        $stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,count(user_hijacked.id) as num  from user_logins left join user_hijacked on user_logins.id=user_hijacked.user_id left join user_profiles on user_profiles.user_logins_id=user_logins.id where ssn=? and country_of_residence=? and user_hijacked.is_hijacked=0");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $_POST['search_key'],$_POST['ccountry']);
        $stmt->execute();
        $result = $stmt->get_result();
        $org = $result->fetch_assoc();
        }
		else
		{
		 $stmt = $dbCon->prepare("select user_logins.id,first_name,last_name from user_logins  where user_logins.id in (select user_login_id from user_cards where card_number=?)");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $_POST['search_key']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
        while($row = $result->fetch_assoc())
		{
			array_push($org,$row);
			$stmt = $dbCon->prepare("select count(id) as num  from user_hijacked where user_id=? and is_hijacked=0");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultcount = $stmt->get_result();
			$rowcount = $resultcount->fetch_assoc();
			$org[$j]['num']=$rowcount['num'];
			$j++;
		}
		}
		
        $stmt->close();
        $dbCon->close();
        return $org;
        
    }
	   function getUserCount($data)
    {
        $dbCon = AppModel::createConnection();
        if($_POST['stype']==1)
		{
        $stmt = $dbCon->prepare("select count(user_logins_id) as num from user_profiles where ssn=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $_POST['search_key']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        }
		else
		{
		 $stmt = $dbCon->prepare("select count(user_login_id) as num from user_cards where card_number=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $_POST['search_key']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		}
		
        $stmt->close();
        $dbCon->close();
        return $row;
        
    }
	
    function userAccount($data)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
        
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
        $stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    
	
    
}