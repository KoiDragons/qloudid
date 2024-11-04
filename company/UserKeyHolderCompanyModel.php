<?php
require_once('../AppModel.php');
class UserKeyHolderCompanyModel extends AppModel
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
		
	function requestDetail($data)
    {
        $dbCon = AppModel::createConnection();
      $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select key_service,user_key_holder_companies.id,company_name,last_name,first_name,email,user_key_holder_companies.created_on,address,user_address.city,user_address.zipcode from user_key_holder_companies left join user_address on user_address.id=user_key_holder_companies.user_address_id left join user_logins on user_logins.id=user_address.user_id left join companies on companies.id=user_key_holder_companies.company_id left join key_holder_services on key_holder_services.id=user_key_holder_companies.key_service_id where company_id=? and is_approved=0 limit 0,20");
        
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
        $stmt = $dbCon->prepare("select key_service,user_key_holder_companies.id,company_name,last_name,first_name,email,user_key_holder_companies.created_on,address,user_address.city,user_address.zipcode from user_key_holder_companies left join user_address on user_address.id=user_key_holder_companies.user_address_id left join user_logins on user_logins.id=user_address.user_id left join companies on companies.id=user_key_holder_companies.company_id left join key_holder_services on key_holder_services.id=user_key_holder_companies.key_service_id where company_id=? and is_approved=0 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 hidden-xs"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['address'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_40 xs-wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$row['address'].' '.$row['city'].' '.$row['zipcode'].'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['key_service'].'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="../approveRequest/'.$org1.'/'.$data['cid'].'"><span class="fas fa-check-circle green_txt" aria-hidden="true"></span></a>
													</div>
																			<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="../rejectRequest/'.$org1.'/'.$data['cid'].'"><span class="fas fa-times-circle red_txt" aria-hidden="true"></span></a>
													</div> 
																		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			
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
        $stmt = $dbCon->prepare("select key_service,user_key_holder_companies.id,company_name,last_name,first_name,email,user_key_holder_companies.created_on,address,user_address.city,user_address.zipcode from user_key_holder_companies left join user_address on user_address.id=user_key_holder_companies.user_address_id left join user_logins on user_logins.id=user_address.user_id left join companies on companies.id=user_key_holder_companies.company_id left join key_holder_services on key_holder_services.id=user_key_holder_companies.key_service_id where company_id=? and is_approved=1 limit 0,20");
        
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
        $stmt = $dbCon->prepare("select key_service,user_key_holder_companies.id,company_name,last_name,first_name,email,user_key_holder_companies.created_on,address,user_address.city,user_address.zipcode from user_key_holder_companies left join user_address on user_address.id=user_key_holder_companies.user_address_id left join user_logins on user_logins.id=user_address.user_id left join companies on companies.id=user_key_holder_companies.company_id left join key_holder_services on key_holder_services.id=user_key_holder_companies.key_service_id where company_id=? and is_approved=2 limit 0,20");
        
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
        $stmt = $dbCon->prepare("select key_service,user_key_holder_companies.id,company_name,last_name,first_name,email,user_key_holder_companies.created_on,address,user_address.city,user_address.zipcode from user_key_holder_companies left join user_address on user_address.id=user_key_holder_companies.user_address_id left join user_logins on user_logins.id=user_address.user_id left join companies on companies.id=user_key_holder_companies.company_id left join key_holder_services on key_holder_services.id=user_key_holder_companies.key_service_id where company_id=? and is_approved=1 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 hidden-xs"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['address'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_40 xs-wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$row['address'].' '.$row['city'].' '.$row['zipcode'].'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['key_service'].'</span>  
																	</div>
																	
																	
																		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			
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
        $stmt = $dbCon->prepare("select key_service,user_key_holder_companies.id,company_name,last_name,first_name,email,user_key_holder_companies.created_on,address,user_address.city,user_address.zipcode from user_key_holder_companies left join user_address on user_address.id=user_key_holder_companies.user_address_id left join user_logins on user_logins.id=user_address.user_id left join companies on companies.id=user_key_holder_companies.company_id left join key_holder_services on key_holder_services.id=user_key_holder_companies.key_service_id where company_id=? and is_approved=2 limit ?,?");
        
        /* bind parameters for markers */
	$stmt->bind_param("iii", $company_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 hidden-xs"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"> '.substr($row['address'],0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_40 xs-wi_60   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$row['address'].' '.$row['city'].' '.$row['zipcode'].'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['key_service'].'</span>  
																	</div>
																	
																	
																		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
			
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
		$stmt = $dbCon->prepare("update user_key_holder_companies set is_approved=1 where id=?");
        
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
		$stmt = $dbCon->prepare("update user_key_holder_companies set is_approved=2 where id=?");
        
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
		$stmt = $dbCon->prepare("select count(id) as num from user_key_holder_companies where company_id=? and is_approved=1");
        
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
		$stmt = $dbCon->prepare("select count(id) as num from user_key_holder_companies where company_id=? and is_approved=0");
        
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
		$stmt = $dbCon->prepare("select count(id) as num from user_key_holder_companies where company_id=? and is_approved=2");
        
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
	

	
	