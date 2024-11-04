<?php
	require_once('../AppModel.php');
	class ViewCompanyModel extends AppModel
	{
		function moreNeighbours($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$data['id']*10;
			$b=10;
			$stmt = $dbCon->prepare("select first_name,last_name from user_logins where id in(select user_login_id from user_tenants where company_id=? and user_login_id!=?  and is_approved=1) limit ?,?");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("iiii", $company_id,$data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<div class=" white_bg mart20 brd brdrad3 box_shadow" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Företag">Företag</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">'.html_entity_decode($row['first_name']).'</span> </div>
													<div class="fleft wi_25 xs-wi_100 sm-wi_100 marl15 xs-mar0 padb10"> <span class="trn" data-trn-key="Adress">Adress</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.html_entity_decode($row['last_name']).'</span> </div>
													<div class="fleft wi_10 padl30 xs-wi_100 sm-wi_100 marl15 fsz50  xs-mar0 padb10">
														<a href="#"><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
									</div>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function listNeighbours($data)
		{
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select first_name,last_name from user_logins where id in(select user_login_id from user_tenants where company_id=? and user_login_id!=?  and is_approved=1) limit 0,10");
			/* bind parameters for markers */
			 $stmt->bind_param("ii", $company_id,$data['user_id']);
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
			
			
				function countNeighbours($data)
		{
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(user_login_id) as num from user_tenants where company_id=? and user_login_id!=?  and is_approved=1");
			/* bind parameters for markers */
			 $stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			}
		
		function verificationId($data)
    {
        $dbCon = AppModel::createConnection();
          $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select max(id) as v_id from company_passport_logs where company_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $company_id);
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
	
	
		  function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image from user_logins where id = ?");
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
		
		$stmt = $dbCon->prepare("select country_name,companies.country_id,companies.id,company_name,cid,founded,company_categories.name industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id left join country on country.id=companies.country_id left join company_categories on company_categories.id=companies.industry  where companies.id=?");
        
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
    	
		
	}
