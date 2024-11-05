<?php
require_once('../AppModel.php');
class TravelModel extends AppModel
{
	function verifyOtp($data)
		{
			$dbCon = AppModel::createConnection();
			$booking_id= $this -> encrypt_decrypt('decrypt',$data['rid']); 
			$stmt = $dbCon->prepare("select invitation_code,companies.country_id from hotel_room_booking left join hotel_room_detail on hotel_room_detail.id=hotel_room_booking.room_id left join property_location on  hotel_room_detail.property_id=property_location.id left join companies on companies.id=property_location.company_id where user_email = (select email from user_logins where user_logins.id=?) and hotel_room_booking.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$booking_id);
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
			if($row['invitation_code']==$_POST['otp'])
			{
			$stmt = $dbCon->prepare("update user_travel_history set is_left=1 where user_id=? and is_left=0");
			/* bind parameters for markers */
			$stmt->bind_param("i",$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into user_travel_history (country_id,user_id,created_on) values(?, ? , now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$row['country_id'],$data['user_id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update hotel_room_booking set is_connected=1,user_id=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$data['user_id'],$booking_id);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 2;
			}
				
			}
			 
		}
		
	function hotelRequestInvitation($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select hotel_room_booking.id,hotel_name from hotel_room_booking left join hotel_room_detail on hotel_room_detail.id=hotel_room_booking.room_id left join hotel_basic_information on hotel_basic_information.property_id=hotel_room_detail.property_id where user_email = (select email from user_logins where user_logins.id=?) and is_free=0 and is_connected=0 order by hotel_room_booking.created_on desc");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			 $row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			}	
				$stmt->close();
				$dbCon->close();
				 
				return $row;
			
		}
		
		
		function hotelAmenitiesCategory($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from hotel_amenities_category");
			
			/* bind parameters for markers */
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
				$stmt->close();
				$dbCon->close();
				 
				return $org;
			
		}
	
	function hotelConnectionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select hotel_room_booking.id,hotel_name,profile_pic,hotel_room_detail.property_id,property_location.company_id,room_name from hotel_room_booking left join hotel_room_detail on hotel_room_detail.id=hotel_room_booking.room_id left join hotel_basic_information on hotel_basic_information.property_id=hotel_room_detail.property_id left join property_location on hotel_room_detail.property_id=property_location.id left join company_profiles on company_profiles.company_id=property_location.company_id where user_email = (select email from user_logins where user_logins.id=?) and is_free=0 and is_connected=1 order by hotel_room_booking.created_on desc");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			 $row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			}	
				$stmt->close();
				$dbCon->close();
				 
				return $row;
			
		}
	
	
 function countryOption()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name  from country where  is_visible=1 order by country_name ");
			/* bind parameters for markers */
			$cont=1;
			
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
		
		function travelCountry($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select  country_id,country_name  from user_travel_history left join country on country.id=user_travel_history.country_id where  is_left=0 and user_id=? ");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i",$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
	function emergencyDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		   
		$stmt = $dbCon->prepare("select * from travel_emergency_list");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
		while($row = $result->fetch_assoc())
		{
			 
		$stmt = $dbCon->prepare("select count(id) as num from travel_inactive_emergency where emergency_id=? and country_id=(select  country_id  from user_travel_history  where  is_left=0 and user_id=?)");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $row['id'],$data['user_id']);
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
	
	function emergencyAppDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 $app_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select * from travel_emergency_list where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select count(id) as num from travel_inactive_emergency where emergency_id=? and country_id=(select  country_id  from user_travel_history  where  is_left=0 and user_id=?)");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $row['id'],$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$rowCount = $result->fetch_assoc();
		
		$row['is_active']=$rowCount['num'];
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function addedAlamrs($data)
	{
		 $dbCon = AppModel::createConnection();
		  
		$stmt = $dbCon->prepare("select * from emergency_alarm_number where country_id=? limit 0,5");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $data['country_id']);
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
		  
		$stmt = $dbCon->prepare("select count(id) as num from emergency_alarm_number where country_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $data['country_id']);
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
		  $a=$_POST['id']*5;
		 $b=5;
		$stmt = $dbCon->prepare("select * from emergency_alarm_number where country_id=? limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iii", $data['country_id'],$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
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
													 
													 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
												
';
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	function travelAppCompany($data)
	{
		 $dbCon = AppModel::createConnection();
		  
		$emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select company_id,company_name from travel_app_company left join companies on companies.id=travel_app_company.company_id where travel_app_company.country_id=? and emergency_id=? limit 0,5");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $data['country_id'],$emergency_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
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
	
	
	function moreTravelAppCompany($data)
	{
		 $dbCon = AppModel::createConnection();
		  
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 $a=$_POST['id']*5;
		 $b=5;
		$stmt = $dbCon->prepare("select company_id,company_name from travel_app_company left join companies on companies.id=travel_app_company.company_id where travel_app_company.country_id=? and emergency_id=? limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iiii", $data['country_id'],$emergency_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<a href="#">
											<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['company_name'],0,1).' </div>
																	</div>
													
													<div class="fleft wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Company name</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">'.html_entity_decode($row['company_name']).'</span>  </div>
													 
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
	 
	function travelAppCompanyCount($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select count(id) as num from travel_app_company where travel_app_company.country_id=? and emergency_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $data['country_id'],$emergency_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function addTravelCountry($data)
			{
			$dbCon = AppModel::createConnection();
			 $stmt = $dbCon->prepare("insert into user_travel_history (country_id,user_id,created_on) values(?, ? , now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$_POST['ccountry'],$data['user_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			function updateCountry($data)
			{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update user_travel_history set is_left=1 where user_id=? and is_left=0");
			/* bind parameters for markers */
			$stmt->bind_param("i",$data['user_id']);
			$stmt->execute();
			
			 $stmt = $dbCon->prepare("insert into user_travel_history (country_id,user_id,created_on) values(?, ? , now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$_POST['id'],$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select country_name from country where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['country_name'];
			}
 }