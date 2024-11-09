<?php
	require_once('../AppModel.php');
	class BostadModel extends AppModel
	{
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=19");
			
			/* bind parameters for markers */
			
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
			
			
			$stmt = $dbCon->prepare("select company_name,user_tenants.company_id,address from user_tenants left join companies on companies.id=user_tenants.company_id left join company_profiles on company_profiles.company_id=companies.id where user_tenants.user_login_id = ?  and is_approved=1 order by company_name desc limit 0,10");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['company_id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreEmployers($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$data['id']*10;
		$b=10;
			$stmt = $dbCon->prepare("select company_name,user_tenants.company_id,address from user_tenants left join companies on companies.id=user_tenants.company_id left join company_profiles on company_profiles.company_id=companies.id where user_tenants.user_login_id = ? and is_approved=1 order by company_name desc limit ?,?");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				
				$enc=$this->encrypt_decrypt('encrypt',$row['company_id']);
				$org=$org.'<a href="https://www.safeqloud.com/company/index.php/ViewCompany/landloardAccount/'.$enc.'" class="black_txt"><div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">
													
													<div class="fleft wi_30 xs-wi_100 sm-wi_40 xsip-wi_40  marl15 xs-mar0 padb10 xs-padb15"> <span class="trn" data-trn-key="Företag">Företag</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz16">'.html_entity_decode($row['company_name']).'</span> </div>
													<div class="fleft wi_45 xs-wi_100 sm-wi_50 xsip-wi_50 marl15 xs-mar0 padb10 xs-padb15"> <span class="trn" data-trn-key="Adress">Adress</span> <span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['address'].'</span> </div>
													<div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl15 fsz40  xs-mar0 padb0 hidden-xs hidden-sm hidden-xsip">
														<a href="https://www.safeqloud.com/company/index.php/ViewCompany/landloardAccount/'.$enc.'" ><span class="fas fa-arrow-alt-circle-right"></span></a>
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div></a>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function getAppsPermissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id= 19;
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