<?php
require_once('../AppModel.php');
class CompanyLandloardModel extends AppModel
{
 function getAppsInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$app_id= 29;
			$stmt = $dbCon->prepare("select id from manage_apps_permission where app_id=? and country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $app_id,$data['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$row['id']);
			
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
		
		$stmt = $dbCon->prepare("select country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
        
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
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.requesting_company where receiving_company=? and is_approved=0 limit 0,20");
        
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
	
	function requestApprovedDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.requesting_company where receiving_company=? and is_approved=1 limit 0,20");
        
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
	function requestRejectedDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.requesting_company where receiving_company=? and is_approved=2 limit 0,20");
        
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
	  $b=20;
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.requesting_company where receiving_company=? and is_approved=0 limit ?,?");
        
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
														<div class="padtb5 " >'.$row['company_name'].'</div>
													</td>
													
													<td class="pad5 brdb_new tall cd">
														<div class="padtb5 ">'.$row['visiting_address'].'</div>
													</td>
													
													
													<td class="pad5 brdb_new tall ap" >
														<div class="padtb5"><a href="../approveRequest/'.$org1.'/'.$data['cid'].'" >Godkänn</a></div>
													</td>
													<td class="pad5 brdb_new tall rj">
														<div class="padtb5"><a href="../rejectRequest/'.$org1.'/'.$data['cid'].'">Avböj</a></div>
													</td>
													
												</tr>';
			
		}
		
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function moreRequestApprovedDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a=$_POST['id']*20;
	  $b=20;
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.requesting_company where receiving_company=? and is_approved=1 limit ?,?");
        
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
														<div class="padtb5 " >'.$row['company_name'].'</div>
													</td>
													
													<td class="pad5 brdb_new tall cd">
														<div class="padtb5 ">'.$row['visiting_address'].'</div>
													</td>
													
													
													
												</tr>';
			
		}
		
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	function moreRequestRejectedDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a=$_POST['id']*20;
	  $b=20;
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.requesting_company where receiving_company=? and is_approved=2 limit ?,?");
        
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
														<div class="padtb5 " >'.$row['company_name'].'</div>
													</td>
													
													<td class="pad5 brdb_new tall cd">
														<div class="padtb5 ">'.$row['visiting_address'].'</div>
													</td>
													
													
													
												</tr>';
			
		}
		
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function pendingCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from company_landloard where receiving_company=? and is_approved=0");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
	
	function approvedCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from company_landloard where receiving_company=? and is_approved=1");
        
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
		$stmt = $dbCon->prepare("select count(id) as num from company_landloard where receiving_company=? and is_approved=2");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
	
	function approveRequest($data)
    {
        $dbCon = AppModel::createConnection();
	 $id= $this -> encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("update company_landloard set is_approved=1 where id=?");
        
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
		$stmt = $dbCon->prepare("update company_landloard set is_approved=2 where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $id);
		
        $stmt->execute();
		 $stmt->close();
        $dbCon->close();
		 return 1;
        
    }
	}
	

	
	