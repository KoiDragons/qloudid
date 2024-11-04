<?php
require_once('../AppModel.php');

class CountryListModel extends AppModel
{
	function updateAppStartPricing($data)
		{
		$dbCon = AppModel::createConnection();
		$appid=$this->encrypt_decrypt('decrypt',$data['appid']);
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("update app_start_fee_info set  start_fee=?,licence_fee=?,trial_period=?,free_proposals =?, discount_coupon=?, start_fee_discount=?,licence_fee_discount=? where app_id=?");
		/* bind parameters for markers */
		$stmt->bind_param("iiiisiii",$_POST['start_fee'],$_POST['licence_fee'],$_POST['trial_period'],$_POST['free_proposals'],$_POST['discount_coupon'],$_POST['start_fee_discount'],$_POST['licence_fee_discount'],$appid);	
		$stmt->execute();
		$stmt->close();
		$dbCon->close();
		return 1;
		 
		}
	
	function priceDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		  $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		  	$stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id=$row['app_id'];
		$stmt = $dbCon->prepare("select * from app_price_info where country_id=? and app_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $country_id,$app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
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
	
	function appDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $stmt = $dbCon->prepare("select app_id,app_name from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where manage_apps_permission.id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	
	function appStartFeeDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select * from app_start_fee_info where app_id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		if(empty($row))
		{
		$stmt = $dbCon->prepare("insert into app_start_fee_info (app_id) values(?)");
		/* bind parameters for markers */
		$stmt->bind_param("i",$app_id);
		$stmt->execute();
		$stmt = $dbCon->prepare("select * from app_start_fee_info where app_id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		}
		  
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function planInfo($data)
	{
		$dbCon = AppModel::createConnection();
		$plan_id=$this->encrypt_decrypt('decrypt',$data['planid']);
		$stmt = $dbCon->prepare("select * from app_price_info where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $plan_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		return $row;
	}
	
	function addPrice($data)
		{
		$dbCon = AppModel::createConnection();
		$app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id=$row['app_id'];
		
		if($_POST['metered']==1)
		{
		$meter_range=0;	
		}
		else
		{
		$meter_range=$_POST['meter_range'];
		}
		 
		if($_POST['billing_type']==1)
		{	
 
		$stmt = $dbCon->prepare("insert into app_price_info (country_id,app_id,app_price,created_on,modified_on,billing_type,currency,price_description,metered,meter_range) values(?, ?, ?, now(), now(), ?, ?, ?, ?, ?)");
		/* bind parameters for markers */
		$stmt->bind_param("iiiissii",$country_id,$app_id,$_POST['price'],$_POST['billing_type'],$_POST['currency_code'],$_POST['p_description'],$_POST['metered'],$meter_range);	
		}	
		 else if($_POST['billing_type']==2)
		{			
		$stmt = $dbCon->prepare("insert into app_price_info (country_id,app_id,app_price,created_on,modified_on,billing_type,currency,price_description, billing_period,metered,meter_range) values(?, ?, ?, now(), now(), ?, ?, ?, ?, ?, ?)");
		/* bind parameters for markers */
		 
		$stmt->bind_param("iiiissiii",$country_id,$app_id,$_POST['price'],$_POST['billing_type'],$_POST['currency_code'],$_POST['p_description'],$_POST['billing_period'],$_POST['metered'],$meter_range);
		}
		if($stmt->execute())
			{
				 
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			else
			{
				 
					$stmt->close();
					$dbCon->close();
					return 0;
			
			}
			
			
		}
	
	function updatePrice($data)
		{
		$dbCon = AppModel::createConnection();
		$plan_id=$this->encrypt_decrypt('decrypt',$data['planid']);
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 
		if($_POST['metered']==1)
		{
		$meter_range=0;	
		}
		else
		{
		$meter_range=$_POST['meter_range'];
		}
		
		if($_POST['billing_type']==1)
		{	
 
		$stmt = $dbCon->prepare("update app_price_info set  app_price=?,modified_on=now(),billing_type=?,currency=?,price_description=?,metered=?,meter_range=? where id=?");
		/* bind parameters for markers */
		$stmt->bind_param("iissiii",$_POST['price'],$_POST['billing_type'],$_POST['currency_code'],$_POST['p_description'],$_POST['metered'],$meter_range,$plan_id);	
		}	
		 else if($_POST['billing_type']==2)
		{	
		$stmt = $dbCon->prepare("update app_price_info set  app_price=?,modified_on=now(),billing_type=?,currency=?,price_description=?,billing_period=?  ,metered=?,meter_range=? where id=?");
		/* bind parameters for markers */
		$stmt->bind_param("iissiiii",$_POST['price'],$_POST['billing_type'],$_POST['currency_code'],$_POST['p_description'],$_POST['billing_period'],$_POST['metered'],$meter_range,$plan_id);	
		
		}
		if($stmt->execute())
			{
				 
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			else
			{
				 
					$stmt->close();
					$dbCon->close();
					return 0;
			
			}
			
			
		}
	
	function emergencyDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select * from travel_emergency_list");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
		while($row = $result->fetch_assoc())
		{
		$stmt = $dbCon->prepare("select count(id) as num from travel_inactive_emergency where emergency_id=? and country_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $row['id'],$country_id);
        $stmt->execute();
        $result1 = $stmt->get_result();
		$rowCount = $result1->fetch_assoc();
		
		$row['is_active']=$rowCount['num'];
		
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	function countryDetail()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select id,country_name,is_visible from country where id>0 and id<240 order by country_name");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
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
	
	function addedAlamrs($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select * from emergency_alarm_number where country_id=? limit 0,5");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
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
	function addedAlamrsCount($data)
	{
		 $dbCon = AppModel::createConnection();
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select count(id) as num from emergency_alarm_number where country_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	
		function moreAddedAlamrs($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		  $a=$_POST['id']*5;
		 $b=5;
		$stmt = $dbCon->prepare("select * from emergency_alarm_number where country_id=? limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iii", $country_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			 $enc=$this->encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'	<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['description'],0,1).' </div>
																	</div>
													
													<div class="fleft wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">'.$row['alarm_number'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$row['description'].'</span>  </div>
													 
													 <a href="../deleteAlarm/'.$data['cid'].'/'.$enc.'" class="xs-padr20" ><div class="fright wi_10 padt10 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz25  padb0 xxs-marr20 hidden-xs">
														<span class="fas fa-times-circle red_txt"></span> 
													</div></a>
													
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
	
	function addAlarmNumber($data)
			{
			$dbCon = AppModel::createConnection();
			$country_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("insert into emergency_alarm_number (country_id,alarm_number,description,created_on) values(?, ?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("iis",$country_id,$_POST['alarm_number'],$_POST['description']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
	
	  function deleteAlarm($data)
		{
		$dbCon = AppModel::createConnection();
		 $id=$this->encrypt_decrypt('decrypt',$data['id']);
		$stmt = $dbCon->prepare("delete from emergency_alarm_number where id=?");
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->close();
		$dbCon->close();
		return 1;
		}
	function updateProduct($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
			$stmt = $dbCon->prepare("update manage_apps_permission set presentation=?,funktioner=?,nyheter=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("sssi", htmlentities($_POST['presentation'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['funktioner'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['nyheter'],ENT_NOQUOTES, 'ISO-8859-1'),$app_id);
			if($stmt->execute())
			{
		
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			else
			{
				
					$stmt->close();
					$dbCon->close();
					return 0;
			
			}
			
			
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
		$stmt = $dbCon->prepare("select app_icon,app_name,is_permission,funktioner,presentation,nyheter from manage_apps_permission left join apps_detail on manage_apps_permission.app_id=apps_detail.id where manage_apps_permission.id=? order by app_name");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
		
			
			
	function getPermissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$country_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select id,app_name from apps_detail where id not in (select app_id from manage_apps_permission where country_id=?)");
			$stmt->bind_param("i",$country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_apps_permission (country_id,app_id,created_on) values(?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$country_id,$row['id']);
			$stmt->execute();
			}
		
		
			$stmt = $dbCon->prepare("select manage_apps_permission.id,is_permission,app_name from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  order by app_name");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
			else
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
			
			$stmt = $dbCon->prepare("select manage_apps_permission.id,is_permission,app_name from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  order by app_name");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
			}
			
			
		
	
	
	
	function countryCount()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from country where id>0 and id<240");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function updateVisibleStatus($data)
		{
			$dbCon = AppModel::createConnection();
			
			if($_POST['p_id']==201)
			{
			$_POST['updateR']=1;	
			}
			
		
			$stmt = $dbCon->prepare("update country set is_visible=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['updateR'],$_POST['p_id']);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			else
			{
				
					$stmt->close();
					$dbCon->close();
					return 0;
			
			}
			
			
		}
		
		
		
		function updateAppsStatus($data)
		{
			$dbCon = AppModel::createConnection();
			
			$permission_id= $_POST['p_id'];
			
		
			$stmt = $dbCon->prepare("update manage_apps_permission set is_permission=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['updateR'],$permission_id);
			if($stmt->execute())
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			else
			{
				
					$stmt->close();
					$dbCon->close();
					return 0;
			
			}
			
			
		}
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
	
	}
