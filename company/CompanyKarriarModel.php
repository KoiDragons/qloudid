<?php
require_once('../AppModel.php');
class CompanyKarriarModel extends AppModel
{
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
		
		if(empty($row))
		{
		
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
		
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
  
}