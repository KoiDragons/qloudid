<?php
	require_once('../AppModel.php');
	class BoughtProductsModel extends AppModel
	{
		function moreEvents($data)
    {
        $dbCon = AppModel::createConnection();
       
		$a=$data['id']*5+1;
		$b=5;
          $stmt = $dbCon->prepare("select * from api_user_logs where user_id=? limit ?,?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("iii", $data['user_id'],$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$i=0;
		 while($row = $result->fetch_assoc())
		 {
			  
		$stmt = $dbCon->prepare("select company_name from companies where id=?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $row['client_company_id']);
        $stmt->execute();
        $result1 = $stmt->get_result();
		$row1 = $result1->fetch_assoc();
			
			if($row['event']==0)
			{
			$evnt="Login";	
			}
			else if($row['event']==1)
			{
			$evnt="Purchase";	
			}
			else if($row['event']==2)
			{
			$evnt="Apply";	
			}
			
			if($row['login_company_id']==null or $row['login_company_id']=="")
			{
				$favour='Individual';
			}
			else
			{
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			/* bind parameters for markers */
			$cont=1;
		   $stmt->bind_param("i", $row['login_company_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row2 = $result1->fetch_assoc();
			$favour=$row2['company_name'];
			}
			$dt=date("Y-m-d h:i",strtotime($row['created_on']));
			$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row1['company_name'],0,1).'</div>
																	</div>
																	
																	 
													
													<div class="fleft wi_70  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">'.$evnt.'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">'.html_entity_decode($row1['company_name']).'</span>  </div>
													 
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>	 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>';
		 }
		 $stmt->close();
        $dbCon->close();
		//print_r($org); die;
		 return $org;
        
        
    }
  
  	function moreUserLogs($data)
    {
        $dbCon = AppModel::createConnection();
       
		$a=$data['id']*5+1;
		$b=5;
          $stmt = $dbCon->prepare("select id,created_on from user_passport_logs where user_id=? order by created_on desc limit ?,?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("iii", $data['user_id'],$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$i=0;
		 while($value = $result->fetch_assoc())
		 {
		$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($value['id'],0,1).' </div>
																	</div>
																	
																		<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Code</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">'. $value['id'].'</span>  </div>
													
													<div class="fleft wi_35   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">'.date('Y-m-d',strtotime($value['created_on'])).'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">'.date('h:i:s',strtotime($value['created_on'])).'</span>  </div>
													 
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>	 
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>';
		 }
		 $stmt->close();
        $dbCon->close();
		//print_r($org); die;
		 return $org;
        
        
    }
  
  
	 function userEvents($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select * from api_user_logs where user_id=? limit 0,5");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$i=0;
		 while($row = $result->fetch_assoc())
		 {
		$stmt = $dbCon->prepare("select company_name from companies where id=?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $row['client_company_id']);
        $stmt->execute();
        $result1 = $stmt->get_result();
		$row1 = $result1->fetch_assoc();
			$org[$i]['login_company']=$row1['company_name'];
			if($row['event']==0)
			{
			$org[$i]['event']="Login";	
			}
			else if($row['event']==1)
			{
			$org[$i]['event']="Purchase";	
			}
			else if($row['event']==2)
			{
			$org[$i]['event']="Apply";	
			}
			else
			{
				$org[$i]['event']="Apply";	
			}
			if($row['login_company_id']==null or $row['login_company_id']=="")
			{
				$org[$i]['favour']='Individual';
			}
			else
			{
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			/* bind parameters for markers */
			$cont=1;
		   $stmt->bind_param("i", $row['login_company_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			$org[$i]['favour']=$row1['company_name'];
			}
			$org[$i]['date']=date("Y-m-d h:i",strtotime($row['created_on']));
			$i++;
		 }
		 $stmt->close();
        $dbCon->close();
		//print_r($org); die;
		 return $org;
        
        
    }
  
			function changePassword($data)
		{
			
			$dbCon = AppModel::createConnection();
			//print_r($data); die;
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email,password,verification_status,get_started_wizard_status,created_on from user_logins where id = ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row    = $result->fetch_assoc();
			//print_r($row); die;
			$np=md5($_POST['newpassword']);
			if($row['password']==md5($_POST['cpassword']))
			{
				$stmt = $dbCon->prepare("update user_logins set password=? where id = ?");
				
				/* bind parameters for markers */
				$stmt->bind_param("si", $np,$data['user_id']);
				$stmt->execute();
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function checkPassword($data)
		{
			
			$dbCon = AppModel::createConnection();
			//print_r($data); die;
			$stmt = $dbCon->prepare("select password from user_logins where id = ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row    = $result->fetch_assoc();
			//print_r($row); die;
			
			if($row['password']==$data['cpass'])
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			$stmt->close();
			$dbCon->close();
			return 0;
		}
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select last_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
		
		function companySummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select company_id,company_name from employees left join companies on employees.company_id=companies.id where employees.user_login_id = ? and companies.email_verification_status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$i]['enc']=$this->encrypt_decrypt('encrypt',$row['company_id']);
				$i++;
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
		
		
		
		function activeEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select company_name,count(employee_request.id) as total from employee_request left join companies on employee_request.company_id=companies.id where employee_request.user_login_id =? and status=0 group by employee_request.user_login_id");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function userLogs($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,created_on from user_passport_logs where user_id=?  order by created_on desc limit 0,5");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function userLogsCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select count(id) as num from user_passport_logs where user_id=?");
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
		
		
		function eventCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			
            $stmt   = $dbCon->prepare("select count(distinct client_company_id) as num from api_user_logs where user_id=?");
            $status = 1;
            /* bind parameters for markers */
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
		
		function userLogsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from user_passport_logs where id=?");
			$stmt->bind_param("i", $data['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_sender = $result->fetch_assoc();
			if($row_sender['sex']==1)
			{
				
				$sex='Male';
			}
			else if($row_sender['sex']==2)
			{
				
				$sex='Female';
			}
			else
			{
				$sex='Transgender';
			}
			
				if($row_sender['sex_old']==1)
			{
				
				$sex_old='Male';
			}
			else if($row_sender['sex_old']==2)
			{
				
				$sex_old='Female';
			}
			else
			{
				$sex_old='Transgender';
			}
			
			if($row_sender['ssn_updated']==1)
			{
			$ssn_update="";
			}
			else 
			{
			$ssn_update="hidden";
			}
			if($row_sender['first_name_updated']==1)
			{
			$first_name_update="";
			}
			else 
			{
			$first_name_update="hidden";
			}
			if($row_sender['last_name_updated']==1)
			{
			$last_name_update="";
			}
			else 
			{
			$last_name_update="hidden";
			}
			if($row_sender['dob_updated']==1)
			{
			$dob_update="";
			}
			else 
			{
			$dob_update="hidden";
			}
			if($row_sender['sex_updated']==1)
			{
			$sex_update="";
			}
			else 
			{
			$sex_update="hidden";
			}
			if($row_sender['address_updated']==1)
			{
			$address_update="";
			}
			else 
			{
			$address_update="hidden";
			}
			
			if($row_sender['city_updated']==1)
			{
			$city_update="";
			}
			else 
			{
			$city_update="hidden";
			}
			
			if($row_sender['country_updated']==1)
			{
			$country_update="";
			}
			else 
			{
			$country_update="hidden";
			}
			if($row_sender['zipcode_updated']==1)
			{
			$zipcode_update="";
			}
			else 
			{
			$zipcode_update="hidden";
			}
			if($row_sender['country_phone_updated']==1)
			{
			$country_phone_update="";
			}
			else 
			{
			$country_phone_update="hidden";
			}
			
			if($row_sender['phone_number_updated']==1)
			{
			$phone_number_update="";
			}
			else 
			{
			$phone_number_update="hidden";
			}
			
			/*$general='<div class="result-item padtb0  lgtgrey2_bg">
			<div class="dflex alit_c">
			<div class="flex_1">
			
			<div class="fsz16 dgrey_txt bold">
			<span class="marr5 valm">General</span>
			
			</div>
			</div>
			<div class="fxshrink_0 dflex alit_c">
			
			<div class="wi_100p talr">
			<a href="#" class="expander-toggler grey_txt active" data-base=".result-item" data-target=".sources-content">
			<span>1</span>
			<span class="fa fa-caret-up dnone diblock_pa"></span>
			<span class="fa fa-caret-down dnone_pa"></span>
			</a>
			</div>
			</div>
			</div>
			<div class="sources-content dnone padb20" style="display: block;">
			<ul class="mar0 pad0  fsz14">
			<li class="dflex mart10  padb5 ">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el tall">
			<a href="#">Filed Name</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			Old Value
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			New Value
			</div>
			
			</li>
			<li class="dflex mart10  padb5 '.$ssn_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el tall">
			<a href="#">Social Security Number</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['ssn_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['ssn'].'
			</div>
			
			</li>
			<li class="dflex mart10  padb5 '.$first_name_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el tall">
			<a href="#">Name</a>
			</div>
			
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['first_name_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['first_name'].'
			</div>
			
			</li>
			<li class="dflex mart10  padb5 tall '.$last_name_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">Last name</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['last_name_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['last_name'].'
			</div>
			</li>
			<li class="dflex mart10  padb5 tall '.$dob_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">Date of birth</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['dob_day_old'].'/'.$row_sender['dob_month_old'].'/'.$row_sender['dob_year_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['dob_day'].'/'.$row_sender['dob_month'].'/'.$row_sender['dob_year'].'
			</div>
			
			
			</li>
			<li class="dflex mart10 tall '.$sex_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">Sex</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$sex_old.'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$sex.'
			</div>
			
			</li>
			<li class="dflex mart10 tall '.$country_phone_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">Country</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['country_phone_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['country_phone'].'
			</div>
			
			</li>
			
			<li class="dflex mart10 tall '.$phone_number_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">Phone Number</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['phone_number_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['phone_number'].'
			</div>
			
			</li>
			
			<li class="dflex mart10 tall '.$address_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">Address</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['address_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['address'].'
			</div>
			
			</li>
			
			<li class="dflex mart10 tall '.$city_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">City</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['city_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['city'].'
			</div>
			
			</li>
			
			<li class="dflex mart10 tall '.$country_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">Country</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['country_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['country'].'
			</div>
			
			</li>
			
			<li class="dflex mart10 tall '.$zipcode_update.'">
			<div class="wi_40 ovfl_hid ws_now txtovfl_el">
			<a href="#">Zipcode</a>
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el tall padl10">
			'.$row_sender['zipcode_old'].'
			</div>
			<div class="wi_30 ovfl_hid ws_now txtovfl_el talr padl10">
			'.$row_sender['zipcode'].'
			</div>
			
			</li>
			</ul>
			</div>
			</div>';
			*/
			
			
			$org='<div class="popup-content padb15">
			<h2 class="bold padrl20 padtb10 fsz18 black_txt " >Ge ditt samtycke</h2>
			<div class="padrbl20 xs-padrl10">
				<div class="white_bg tall padb20">
				<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Här kan du ge ditt samtycke till personen nedan att ta del av dina uppgifter med ditt godkännande.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
			<div class="mart10 marrl5 padb10  fsz14  lgtgrey2_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt active" onclick="changeDisplay(1,this);">
			<span class="dnone_pa fa fa-chevron-down"></span>
			<span class="dnone diblock_pa fa fa-chevron-up">
			</span> General</a>
			</div>
			<div id="employees1" style="display:block;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="fsz14 black_txt white_bg"><tr class="black_txt bold fsz13 white_bg">
			<td class="pad5  brdb_new tall">
			<div class="padtb5">Field Name</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Old Value</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">New Value</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$first_name_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Name</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['first_name_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['first_name'].'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$last_name_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Last Name</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['last_name_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['last_name'].'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$dob_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Date of Birth</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['dob_day_old'].'/'.$row_sender['dob_month_old'].'/'.$row_sender['dob_year_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['dob_day'].'/'.$row_sender['dob_month'].'/'.$row_sender['dob_year'].'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$sex_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Sex</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$sex_old.'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$sex.'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$country_phone_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Country</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['country_phone_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['country_phone'].'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$phone_number_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Phone number</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['phone_number_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['phone_number'].'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$address_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Address</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['address_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['address'].'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$city_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">City</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['city_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['city'].'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$country_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Country</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['country_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['country'].'</div></td>
			</tr>
			<tr class="black_txt  fsz13 white_bg '.$zipcode_update.'">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">Zipcode</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['zipcode_old'].'</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">'.$row_sender['zipcode'].'</div></td>
			</tr>
			
			
			</tbody>
			</table>
			</div>
			</div>
			</div>
			
			
			</div>
			</div>
		
			';
			
			
			
			return $org;
		}
		
		
	}	