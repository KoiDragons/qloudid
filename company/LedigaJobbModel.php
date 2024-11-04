<?php
	
require_once('../AppModel.php');
class LedigaJobbModel extends AppModel
{
	function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=6");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		function updateContent($data)
    {
        $dbCon = AppModel::createConnection();
      //	print_r($_POST).'</br>';
        $stmt = $dbCon->prepare("update company_ledigajobb_content set content=? where id=?");
        
       $id='a'.$data['id'];
	   //echo $_POST[$id]; die;
        /* bind parameters for markers */
		$stmt->bind_param("si", htmlentities($_POST[$id],ENT_NOQUOTES, 'ISO-8859-1'),$data['id']);
        $stmt->execute();
        
		 $stmt->close();
        $dbCon->close();
		 return 1;
        
        
    }
	
		function contentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
            $stmt   = $dbCon->prepare("select company_ledigajobb_content.id,heading,content,is_active from company_ledigajobb_content left join company_ledigajobb_heading on company_ledigajobb_heading.id=company_ledigajobb_content.company_ledigajobb_id where company_id=?");
            $status = 1;
            /* bind parameters for markers */
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
		
		
		function updateVisual()
    {
        $dbCon = AppModel::createConnection();
			$stmt   = $dbCon->prepare("select is_active from company_ledigajobb_content   where id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("i", $_POST['id']);
            
            $stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_active']==1)
			{
				$is_active=0;
			}
			else
			{
				$is_active=1;
			}
        $stmt = $dbCon->prepare("update company_ledigajobb_content set is_active=? where id=?");
         
        /* bind parameters for markers */
		$stmt->bind_param("ii",$is_active,$_POST['id']);
        $stmt->execute();
        
		 $stmt->close();
        $dbCon->close();
		 return 1;
        
        
    }
		
		
		function companyLedigaJobb($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select company_ledigajobb_content.id,heading,content from company_ledigajobb_content left join company_aboutus_heading on company_aboutus_heading.id=company_ledigajobb_content.company_ledigajobb_id where company_id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$org[0]="";
			$org[1]="";
			$org[2]="";
			$org[3]="";
			$org[4]="";
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org[$j]=$row['content'];
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		
		function contentDetailInsert($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
            $stmt   = $dbCon->prepare("select id from company_ledigajobb_heading");
            $status = 1;
            /* bind parameters for markers */
           // $stmt->bind_param("i", $dropbox_id);
            
            $stmt->execute();
			$result = $stmt->get_result();	
			while($row = $result->fetch_assoc())
			{
			$stmt   = $dbCon->prepare("select id from company_ledigajobb_content where company_id=? and company_ledigajobb_id=?");
            $status = 1;
             $stmt->bind_param("ii", $company_id,$row['id']);
            
            $stmt->execute();
			$result_data = $stmt->get_result();	
			$row_data = $result_data->fetch_assoc();
			
			if(empty($row_data))
			{
			$stmt   = $dbCon->prepare("insert into company_ledigajobb_content(company_id,company_ledigajobb_id,created_on) values(?, ?, now())");
            $status = 1;
             $stmt->bind_param("ii", $company_id,$row['id']);
            
            $stmt->execute();
			}
			
				
			}
			
			$stmt->close();
			$dbCon->close();
			
			return 1;
			
			
		}
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