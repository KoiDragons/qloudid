<?php
	require_once('../AppModel.php');
	class ArbetsplatsModel extends AppModel
	{
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=18");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
			function getAppsPermissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id= 18;
			$stmt = $dbCon->prepare("select app_link,manage_apps_permission.id,is_permission,app_name,presentation,funktioner,nyheter,is_downloaded,image_path,app_id ,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where manage_apps_permission.app_id=? and country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $app_id,$data['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select count(id) as num from user_app_download where permission_id=? and user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$data['user_id']);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$row['is_downloaded']=0;
			}
			else
			{
			$row['is_downloaded']=1;	
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			}
		
			function getPermissionDetail($data)
			{
			$dbCon = AppModel::createConnection();
			
			$country_id= $data['country_id'];
			$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
		
			$stmt = $dbCon->prepare("select id,app_name from apps_detail");
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_apps_permission (country_id,app_id,created_on) values(?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$country_id,$row['id']);
			$stmt->execute();
			}
			
			}
			else
				{
		
			$stmt = $dbCon->prepare("select id,app_name from apps_detail where id not in (select app_id from manage_apps_permission where country_id=?)");
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_apps_permission (country_id,app_id,created_on) values(?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$country_id,$row['id']);
			$stmt->execute();
			}
			
			}
			
			$stmt->close();
        $dbCon->close();
		 return 1;
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
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select country_of_residence,last_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status from user_logins where id = ?");
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
			function connectedCompaniesCount($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select count(employees.id) as num from employees left join companies on companies.id=employees.company_id where employees.user_login_id=? and companies.country_id=(select country_of_residence from user_logins where id=?)");
			$stmt->bind_param("ii", $user_id, $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function employerSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_name,companies.id,address from companies  left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from employees where user_login_id=?) and companies.country_id=(select country_of_residence from user_logins where id=?) limit 0,5");
			 
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("ii", $data['user_id'], $data['user_id']);
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
		
		
		function employerSummaryMobile($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,last_name,company_name as CompanyName,employees.company_id as CompanyId  from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id where employees.user_login_id = ?");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['CompanyName']=html_entity_decode($row['CompanyName']);
				$row['first_name']=html_entity_decode($row['first_name']);
				$row['last_name']=html_entity_decode($row['last_name']);
				array_push($org,$row);
				//$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['company_id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreEmployers($data)
		{
			$dbCon = AppModel::createConnection();
			$a=($_POST['id']*5);
			$b=5;
			ini_set('memory_limit', '-1');
			$user_id=$data['user_id'];
			 
			$stmt = $dbCon->prepare("select company_name,companies.id,address from companies  left join company_profiles on company_profiles.company_id=companies.id where companies.id in(select company_id from employees where user_login_id=?) and companies.country_id=(select country_of_residence from user_logins where id=?) limit ?,?");
			$stmt->bind_param("iiii", $user_id, $user_id,$a,$b);
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$enc_id=$this->encrypt_decrypt("encrypt",$row['id']);
				 $org=$org.'<a href="../../../company/index.php/ReceivedChild/verifyRequests/'.$enc_id.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).' </div>
																	</div>
													
													<div class="fleft wi_75 xxs-wi_80  xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">'.html_entity_decode($row['company_name']).'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.html_entity_decode($row['address']).'</span>  </div>
													 
												 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											</a> ';
				
				 
				 
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
		
		
	
		
	}
	
?>