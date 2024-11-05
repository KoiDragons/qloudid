<?php
require_once('../AppModel.php');
class ConnectedWorkplaceModel extends AppModel
{
  function userProfileSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,summary,phone_verified	from user_profiles where user_logins_id =?");
			
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

		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select country_name,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,get_started_wizard_status from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
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

		function connectedCompanies($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select company_name,employees.company_id,address from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id where employees.user_login_id = ? limit 0,5");
			$stmt->bind_param("i",$user_id);
			
			/* bind parameters for markers */
			$cont=0;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$cont]['enc']=$this->encrypt_decrypt("encrypt",$row['company_id']);
				 $cont++;
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function connectedCompaniesCount($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			
			$stmt = $dbCon->prepare("select count(id) as num from employees  where employees.user_login_id = ?");
			$stmt->bind_param("i",$user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function moreWorkplaces($data)
		{
			$dbCon = AppModel::createConnection();
			$a=($_POST['id']*5)+1;
			$b=5;
			ini_set('memory_limit', '-1');
			$user_id=$data['user_id'];
			 
			$stmt = $dbCon->prepare("select company_name,employees.company_id from employees left join companies on companies.id=employees.company_id  where employees.user_login_id = ? order by company_name desc limit  ?,?");
			$stmt->bind_param("iii", $user_id,$a,$b);
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				 $org=$org.'<a href="../../company/index.php/ReceivedChild/verifyRequests/'.$enc_id.'"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).' </div>
																	</div>
													
													<div class="fleft wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Company name</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">'.html_entity_decode($row['company_name']).'</span>  </div>
													 
												 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
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
		
     
}