<?php
require_once('../AppModel.php');
class UserStudentCompanyModel extends AppModel
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
		
		$stmt = $dbCon->prepare("select companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
        
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
	
	function requestDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=0 limit 0,20");
        
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
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function moreRequestDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a=$_POST['id']*20;
	  $b=$a+20;
        $stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=0 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<tr class="fsz16">
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " >'.$row['first_name'].' '.$row['last_name'].'</div>
													</td>
													
													<td class="pad5 brdb_new tall cd">
														<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_on'])).'</div>
													</td>
													
													
													<td class="pad5 brdb_new tall ap" >
														<div class="padtb5"><a href="../approveRequest/'.$org1.'/'.$data['cid'].'" >Approve</a></div>
													</td>
													<td class="pad5 brdb_new tall rj">
														<div class="padtb5"><a href="../rejectRequest/'.$org1.'/'.$data['cid'].'">Reject</a></div>
													</td>
													
												</tr>';
			
		}
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function requestDetailApproved($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=1 limit 0,20");
        
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
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function requestDetailRejected($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=2 limit 0,20");
        
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
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function moreRequestDetailApproved($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a=$_POST['id']*20;
	  $b=$a+20;
        $stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=1 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<tr class="fsz16">
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " >'.$row['first_name'].' '.$row['last_name'].'</div>
													</td>
													
													<td class="pad5 brdb_new tall cd">
														<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_on'])).'</div>
													</td>
													
													
													
													
												</tr>';
			
		}
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function moreRequestDetailRejected($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a=$_POST['id']*20;
	  $b=$a+20;
        $stmt = $dbCon->prepare("select user_students.id,company_name,last_name,first_name,email,user_students.created_on from user_students left join user_logins on user_logins.id=user_students.user_login_id left join companies on companies.id=user_students.company_id where company_id=? and is_approved=2 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<tr class="fsz16">
													
													<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " >'.$row['first_name'].' '.$row['last_name'].'</div>
													</td>
													
													<td class="pad5 brdb_new tall cd">
														<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_on'])).'</div>
													</td>
													
													
													
													
												</tr>';
			
		}
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function approveRequest($data)
    {
        $dbCon = AppModel::createConnection();
	 $id= $this -> encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("update user_students set is_approved=1 where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $id);
		
        $stmt->execute();
		
		
       
		
		 $stmt->close();
        $dbCon->close();
		 return 1;
        
    }
	
	
	function rejectRequest($data)
    {
        $dbCon = AppModel::createConnection();
	 $id= $this -> encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("update user_students set is_approved=2 where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $id);
		
        $stmt->execute();
		 $stmt->close();
        $dbCon->close();
		 return 1;
        
    }
	
	
	function approveCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from user_students where company_id=? and is_approved=1");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
	
	
	function pendingCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from user_students where company_id=? and is_approved=0");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
		function rejectedCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from user_students where company_id=? and is_approved=2");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
	}
	

	
	