<?php
require_once('../AppModel.php');

class DependentListModel extends AppModel
{
	function adminSummary()
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name from admin_logins where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $_SESSION['qadmin_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
	
	function countryInfo($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select is_visible,country_name from country where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	
	function appInfo($data)
	{
		 $dbCon = AppModel::createConnection();
		 $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$stmt = $dbCon->prepare("select app_icon,app_bg,app_name,is_permission,funktioner,presentation,nyheter from manage_apps_permission left join apps_detail on manage_apps_permission.app_id=apps_detail.id where manage_apps_permission.id=? order by app_name");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	 
		function freeDependentDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		
		$stmt = $dbCon->prepare("select child_care_info.id,concat_ws(' ',first_name,last_name) as name,company_name from child_care_info left join companies on companies.id=child_care_info.company_id where company_id in (select id  from companies  where  country_id=? and id in(select company_id from compnay_app_download where permission_id=(select id from manage_apps_permission where country_id=? and app_id=33))) and is_approved_dependent=1  limit 0,5");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $country_id,$country_id);
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
	
	
		function moreFreeDependentDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		  
		    
		   $a=$_POST['id']*5;
		   $b=5;
		$stmt = $dbCon->prepare("select child_care_info.id,concat_ws(' ',first_name,last_name) as name,company_name from child_care_info left join companies on companies.id=child_care_info.company_id where company_id in (select id  from companies  where  country_id=? and id in(select company_id from compnay_app_download where permission_id=(select id from manage_apps_permission where country_id=? and app_id=33))) and is_approved_dependent=1   limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iiii", $country_id,$country_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			$org=$org.' <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.substr(html_entity_decode($row['company_name']),0,25).'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['name']),0,25).'</span>  
																	</div>
																	
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
		 return $org;
	}
	
	 function freeDependentDetailCount($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		   $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$stmt = $dbCon->prepare("select count(id) as num  from child_care_info where company_id in (select id  from companies  where  country_id=? and id in(select company_id from compnay_app_download where permission_id=(select id from manage_apps_permission where country_id=? and app_id=33))) and is_approved_dependent=1  ");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $country_id,$country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
 
	 
	}
