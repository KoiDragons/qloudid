<?php
require_once('../AppModel.php');
class CompanyTenantModel extends AppModel
{
	function headQuarterID($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from property_location where company_id = ? and is_headquarter=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("update property_location set is_headquarter=1 where company_id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("select id from property_location where company_id = ? and is_headquarter=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			
			$enc=$this->encrypt_decrypt('encrypt',$row['id']);
			$stmt->close();
			$dbCon->close();
			return $enc;
					
		}
		function countryInfo($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$data['country_id'];
		  
		$stmt = $dbCon->prepare("select is_visible from country where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row['is_visible'];
	}	
 function getMandatoryApps($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$country_id= $data['country_id'];
			$stmt = $dbCon->prepare("select manage_apps_permission.id,app_name from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=0 and is_mandatory=1 order by app_name");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
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
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on,is_headquarter from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.receiving_company where requesting_company=? and is_approved=0 limit 0,20");
        
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
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on,is_headquarter  from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.receiving_company where requesting_company=? and is_approved=1 limit 0,20");
        
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
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on,is_headquarter  from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.receiving_company where requesting_company=? and is_approved=2 limit 0,20");
        
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
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on,is_headquarter  from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.receiving_company where requesting_company=? and is_approved=0 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_30 xs-wi_100 sm-wi_100  marl15 xs-mar0 padb10"> <span class="trn bold" data-trn-key="Mina hyresgäster">Mina hyresgäster</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">'.html_entity_decode($row['company_name']).'</span> </div>
													<div class="fleft wi_45 xs-wi_100 sm-wi_100 marl15  xs-mar0 padb10"> <span class="trn bold" data-trn-key="'.$office.'">'.$office.'</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['visiting_address'].'</span> </div>
													<div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl15 fsz40  xs-mar0 padb0">
														<a href="#" ><span class="fas fa-arrow-alt-circle-right"></span></a>
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
	
	function moreRequestApprovedDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a=$_POST['id']*20;
	  $b=20;
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on,is_headquarter  from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.receiving_company where requesting_company=? and is_approved=1 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_30 xs-wi_100 sm-wi_100  marl15 xs-mar0 padb10"> <span class="trn bold" data-trn-key="Mina hyresgäster">Mina hyresgäster</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">'.html_entity_decode($row['company_name']).'</span> </div>
													<div class="fleft wi_45 xs-wi_100 sm-wi_100 marl15  xs-mar0 padb10"> <span class="trn bold" data-trn-key="'.$office.'">'.$office.'</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['visiting_address'].'</span> </div>
													<div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl15 fsz40  xs-mar0 padb0">
														<a href="../../CompanyLandloardNews/tenantAccount/'.$org1.'" ><span class="fas fa-arrow-alt-circle-right"></span></a>
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
	function moreRequestRejectedDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
	  $a=$_POST['id']*20;
	  $b=20;
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on,is_headquarter  from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.receiving_company where requesting_company=? and is_approved=2 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			if($row['is_headquarter']==1) $office= 'Huvudkontor'; else $office= 'Arbetställe / Kontor'; 
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_30 xs-wi_100 sm-wi_100  marl15 xs-mar0 padb10"> <span class="trn bold" data-trn-key="Mina hyresgäster">Mina hyresgäster</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">'.html_entity_decode($row['company_name']).'</span> </div>
													<div class="fleft wi_45 xs-wi_100 sm-wi_100 marl15  xs-mar0 padb10"> <span class="trn bold" data-trn-key="'.$office.'">'.$office.'</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['visiting_address'].'</span> </div>
													<div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl15 fsz40  xs-mar0 padb0">
														<a href="#" ><span class="fas fa-arrow-alt-circle-right"></span></a>
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
	
	function pendingCount($data)
    {
        $dbCon = AppModel::createConnection();
	 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from company_landloard where requesting_company=? and is_approved=0");
        
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
		$stmt = $dbCon->prepare("select count(id) as num from company_landloard where requesting_company=? and is_approved=1");
        
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
		$stmt = $dbCon->prepare("select count(id) as num from company_landloard where requesting_company=? and is_approved=2");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $company_id);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
    }
	
	function requestDetailOffice($data)
    {
        $dbCon = AppModel::createConnection();
      $location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
        $stmt = $dbCon->prepare("select company_landloard.id,company_name,visiting_address,company_landloard.created_on,is_headquarter,is_approved,requesting_company  from company_landloard left join property_location on property_location.id=company_landloard.property_id left join companies on companies.id=company_landloard.receiving_company where company_landloard.property_id=?");
        
        /* bind parameters for markers */
	$stmt->bind_param("i", $location_id);
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		 $row['cid']= $this -> encrypt_decrypt('encrypt',$row['requesting_company']);
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	}
	

	
	