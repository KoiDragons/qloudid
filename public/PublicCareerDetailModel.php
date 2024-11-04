<?php
	require_once('../AppModel.php');
	class PublicCareerDetailModel extends AppModel
	{
		function companyContentDisplay($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select count(id) as num from company_ledigajobb_content where company_id=?");
			
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
				$stmt->close();
				$dbCon->close();
				return 0;
				
			}
			else
			
			{
				$stmt = $dbCon->prepare("select is_active from company_ledigajobb_content where company_id=?");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['is_active']==0)
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
		
		function companyAboutus($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select company_ledigajobb_content.id,heading,content,is_active from company_ledigajobb_content left join company_ledigajobb_heading on company_ledigajobb_heading.id=company_ledigajobb_content.company_ledigajobb_id where company_id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			 
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select country_name,company_name,grading_status from companies left join country on country.id=companies.country_id where companies.id = ?");
			
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
		
	
		function aboutUsWeblink($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select website,wlink from company_aboutus_weblink where company_id = ?");
			
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
	}	