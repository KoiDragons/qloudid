<?php
require_once('../AppModel.php');
class AterforsaljareModel extends AppModel
{
	function deleteImage()
	{
		 $dbCon = AppModel::createConnection();
        
	$stmt = $dbCon->prepare("delete from aterforsaljare_heading_image where id=?");
       
        /* bind parameters for markers */
        $stmt->bind_param("i",$_POST['id']);
		$stmt->execute();
		
		
		$stmt->close();
        $dbCon->close();
		 return 1;
	}
	function updateFileName($data)
	{
		 $dbCon = AppModel::createConnection();
		  $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
       $stmt = $dbCon->prepare("select id from aterforsaljare_subheading where article_id= ? and company_id=? and user_login_id=?");
		$stmt->bind_param("iii", $_POST['id'],$company_id,$_SESSION['user_id']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if(empty($row))
		{
			$stmt = $dbCon->prepare("insert into aterforsaljare_subheading (subheading,article_id,company_id,user_login_id) values (?, ?, ?, ?)");
       
        /* bind parameters for markers */
        $stmt->bind_param("siii", htmlentities($_POST['title_new'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['id'],$company_id,$_SESSION['user_id']);
		$stmt->execute();
		}
		else
		{
		$stmt = $dbCon->prepare("update aterforsaljare_subheading set subheading=? where id=?");
       
        /* bind parameters for markers */
        $stmt->bind_param("si", htmlentities($_POST['title_new'],ENT_NOQUOTES, 'ISO-8859-1'),$row['id']);
		$stmt->execute();	
		}
	
		
		
		$stmt->close();
        $dbCon->close();
		 return 1;
	}
	
	 function createAppsAccount($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$client_id= $this -> encrypt_decrypt('encrypt',$data['company_name']);
		$stmt = $dbCon->prepare("select client_id from oauth_clients where app_name= ?");
			  $stmt->bind_param("s", $data['company_name']);
			  $stmt->execute();
			  $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		//print_r($data); die;
		 if(empty($row))
		 {
			  $stmt = $dbCon->prepare("insert into oauth_clients(app_name,company_id,created_on,client_id,client_secret,redirect_uri) 
			  values(?, ?, ?, ?, ?, ? )");
       
				/* bind parameters for markers */
				$stmt->bind_param("ssssss", $data['company_name'],$company_id, $data['created_on'],$client_id, $data['client_secret'],$data['website']);
				
				
				if (!$stmt->execute()) {
					return 0;
				} 
				else
				{
					return 1;
				}
		 }
		 else
		 {
			 //echo "duplicate"; die;
			 return 0;
		 }
       
        $stmt->close();
        $dbCon->close();
    }
    
    
   function appsDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		

		
        $stmt = $dbCon->prepare("select aterforsaljare_heading.id,heading,created_on from aterforsaljare_heading");
        
        /* bind parameters for markers */
		$cont=1;
       //$stmt->bind_param("ii", $company_id,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$i=0;
		 while($row = $result->fetch_assoc())
		 {
			 array_push($org,$row);
			 $stmt = $dbCon->prepare("select * from aterforsaljare_subheading where article_id=? and company_id=? and user_login_id=?");
        
			$stmt->bind_param("iii",$row['id'],$company_id,$data['user_id'] );
			$stmt->execute();
			$result2 = $stmt->get_result();
			$row2 = $result2->fetch_assoc();
			$org[$i]['subheading']=$row2['subheading'];
			 $org[$i]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$org[$i]['image']=array();
			$stmt = $dbCon->prepare("select * from aterforsaljare_heading_image where article_id=? and company_id=? and user_login_id=?");
        
       $stmt->bind_param("iii",$row['id'],$company_id,$data['user_id'] );
        $stmt->execute();
        $result1 = $stmt->get_result();
		while($row1 = $result1->fetch_assoc())
		{
			array_push($org[$i]['image'],$row1);
		}
		$i++;
		 }
		 
		
		// print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
		function getFileName()
	{
		 $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$_POST['cid']);
		define('UPLOAD_DIR','../estorecss/'); // image dir path
		$img_name1="new".microtime();
		file_put_contents(UPLOAD_DIR.$img_name1.".txt", $_POST['src']); 
		

		$d=date('Y-m-d h:i:s');


		$stmt = $dbCon->prepare("insert into aterforsaljare_heading_image(image_src,article_id,created_on,img_width,img_height,company_id,user_login_id) 
	values(?, ?, ?, ?, ?, ?, ?)");
       
        /* bind parameters for markers */
        $stmt->bind_param("sisiiii",$img_name1,$_POST['id'],$d,$_POST['width'],$_POST['height'],$company_id,$_SESSION['user_id']);
		$stmt->execute();
		
		
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