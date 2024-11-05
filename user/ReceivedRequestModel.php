<?php
	require_once('../AppModel.php');
	class ReceivedRequestModel extends AppModel
	{
		
function itemListDelivereyCount($data)
{
$dbCon = AppModel::createConnection();
$stmt = $dbCon->prepare("select count(corona_help_group_assigenment.id) as num  from corona_help_group_assigenment left join corona_pending_received on corona_pending_received.assignment_id=corona_help_group_assigenment.id left join  user_logins on user_logins.id=corona_pending_received.helper_id left join corona_help_groups on corona_help_groups.id=corona_help_group_assigenment.group_id   where items_detail in(select id from item_required where eldery_id=? and is_delivered=1) or ( corona_help_group_assigenment.id in (select assignment_id from corona_pending_received) and corona_help_group_assigenment.user_id=?) and is_completed=0 order by corona_help_group_assigenment.created_on desc");
$stmt->bind_param("ii",  $data['user_id'],$data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
 
$row = $result->fetch_assoc();
$stmt->close();
$dbCon->close();
return $row;
}		
 		
		
function peopleInNeed($data)
{
$dbCon = AppModel::createConnection();

$stmt = $dbCon->prepare("select distance_value from corona_helping_hand where user_id=? and is_active=1");
/* bind parameters for markers */
$stmt->bind_param("i", $data['user_id']);
$stmt->execute();
$result = $stmt->get_result();
$rowDistance = $result->fetch_assoc(); 


$stmt = $dbCon->prepare("select langitude,latitude from  user_profiles where user_logins_id=?");
$stmt->bind_param("i", $data['user_id']); 
$stmt->execute();
$result = $stmt->get_result();
$rowUser = $result->fetch_assoc();
$stmt = $dbCon->prepare("select langitude,latitude,port_number,user_logins.id,concat_ws(' ',first_name,last_name) as name,passport_image,user_profiles.address from user_logins left join corona_helping_hand on corona_helping_hand.user_id=user_logins.id left join user_profiles on user_logins.id=user_profiles.user_logins_id where user_logins.id in(select eldery_id from item_required where is_delivered=0 and eldery_id!=?) or user_logins.id in(select eldery_id from item_required where is_delivered=-1 and volunteer_id=?  and eldery_id!=?)");
$stmt->bind_param("iii", $data['user_id'],$data['user_id'],$data['user_id']); 
$stmt->execute();
$result = $stmt->get_result();
$org=array();
$j=0;
while($row = $result->fetch_assoc())
{
$earthRadius = 4857;
$latFrom = deg2rad($rowUser['latitude']);
$lonFrom = deg2rad($rowUser['langitude']);
$latTo = deg2rad($row['latitude']);
$lonTo = deg2rad($row['langitude']);
$latDelta = $latTo - $latFrom;
$lonDelta = $lonTo - $lonFrom;
$angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) + cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
if($data['user_id']!=43)
{				
if(($angle * $earthRadius *1.609344*1000)>$rowDistance['distance_value'])
{
continue;
}	
 	
}
 
$j=$j+1;	
 
 
}
$stmt->close();
$dbCon->close();
return $j;
}

		function countGuardianRequest($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select count(id) as num  from dependent_guardian where (guardian_user_id=? or guardian_email=?) and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $data['user_id'],$data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
				
				$stmt->close();
				$dbCon->close();
				 
				return $row['num'];
			
		}
		
		
		function countHotelRequest($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select hotel_room_booking.id,hotel_name from hotel_room_booking left join hotel_room_detail on hotel_room_detail.id=hotel_room_booking.room_id left join hotel_basic_information on hotel_basic_information.property_id=hotel_room_detail.property_id where user_email = (select email from user_logins where id=?) and is_free=0 and is_connected=0 order by hotel_room_booking.created_on desc");
			
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
		
		function helpAidInfo($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select *	from corona_helping_hand where user_id =?");
			
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
				function employerRequest($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select count(estore_employee_invite.id) as num from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id where (estore_employee_invite.email=? or estore_employee_invite.work_email=? ) and invitation.status=0");
				$stmt->bind_param("ss", $row['email'],$row['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from parent_info where parent_email=? and is_approved=0");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $row['email']);
				
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row_parent = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from connect_next_kin where receiver_id=? and is_approved=0");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row_connect = $result->fetch_assoc();
				
				$org=array();
				$org['employer']=$row_emp['num'];
				$org['daycare']=$row_parent['num'];
				$org['connect']=$row_connect['num'];
				$org['total']=$row_parent['num']+$row_emp['num']+$row_connect['num'];
				$stmt->close();
				$dbCon->close();
				return $org;
			
			
		}
		
	function daycareRequest($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select company_id,company_name from employees left join companies on companies.id=employees.company_id where employees.user_login_id=? limit 0,5");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				$j=0;
				while($row = $result->fetch_assoc())
				{
				array_push($org,$row);
				$org[$j]['total']=0;	
				$stmt = $dbCon->prepare("select count(id) as num from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved=0 and is_left=0");
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result_received = $stmt->get_result();
				$row_received = $result_received->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from dropped_off_children where child_id in (select id from child_care_info where company_id=?) and is_approved=1 and is_left=1");
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result_picked = $stmt->get_result();
				$row_picked = $result_picked->fetch_assoc();
				$org[$j]['received']=$row_received['num'];
				$org[$j]['picked']=$row_picked['num'];
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['company_id']);
				$org[0]['total']=$org[0]['total']+$row_received['num']+$row_picked['num'];
				$org[$j]['ttl']=$row_received['num']+$row_picked['num'];
				$j++;
				}
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			
			
		}
		
		
		function employeementDetail($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select count(id) as num from employees where employees.user_login_id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from user_rejected_facilities where user_id=? and request_type=1");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowRejected= $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row['num']+$rowRejected['num'];
			
			
		}
		
		
		function kinCount($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select count(id) as num from connect_next_kin where sender_id=? or receiver_id=?");
				$stmt->bind_param("ii", $user_id,$user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row['num'];
			
			
		}
		
		function lostfoundCount($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select count(id) as num from user_lost_and_found where user_id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row['num'];
			
			
		}
		function employeementCount($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select count(id) as num from employees where employees.user_login_id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function employeementCompany($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select company_id from employees where employees.user_login_id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$row['enc']=$this->$row['company_id'];
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function guardianDetail($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("update dependent_guardian set guardian_user_id=?,guardian_ssn=? where guardian_email=?");
				$stmt->bind_param("iss", $user_id,$data['ssn'],$data['email']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("select count(id) as num from dependent_guardian where guardian_user_id=? and is_approved=0");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row= $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row['num'];
			
			
		}
		
		function studentDetail($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select count(id) as num from user_students where user_login_id=? and is_approved=1");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from user_rejected_facilities where user_id=? and request_type=2");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowRejected= $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row['num']+$rowRejected['num'];
			
			
		}
		
		function tenantDetail($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				
				$stmt = $dbCon->prepare("select count(id) as num from user_tenants where user_login_id=? and is_approved=1");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from user_rejected_facilities where user_id=? and request_type=3");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowRejected= $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row['num']+$rowRejected['num'];
			
			
		}
		
		function updateStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("insert into user_rejected_facilities (user_id,request_type,created_on) values(?, ?, now())");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function updateIsEmployeeStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("insert into user_is_employee (user_id,is_employee,created_on) values(?, ?, now())");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function updateIsLandlordStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("insert into user_is_landlord (user_id,is_landlord,created_on) values(?, ?, now())");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
		function updateIsStudentStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("insert into user_is_student (user_id,is_student,created_on) values(?, ?, now())");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function userProfileDetail($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				
				$stmt = $dbCon->prepare("select count(id) as num from user_is_employee where user_id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from user_is_student where user_id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row1 = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from user_is_landlord where user_id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row2 = $result->fetch_assoc();
				
				
				$stmt->close();
				$dbCon->close();
				return $row['num']+$row1['num']+$row2['num'];
			
			
		}
		
		
		function userIsEmployee($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				
				$stmt = $dbCon->prepare("select count(id) as num from user_is_employee where user_id=? and is_employee=1");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row['num'];
		}
		
		
		function userIsStudent($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				
				$stmt = $dbCon->prepare("select count(id) as num from user_is_student where user_id=? and is_student=1");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row['num'];
		}
		
		
		function userIsLandlord($data)
		{
				$dbCon = AppModel::createConnection();
			
				$user_id=$data['user_id'];
				
				$stmt = $dbCon->prepare("select count(id) as num from user_is_landlord where user_id=? and is_landlord=1");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt->close();
				$dbCon->close();
				return $row['num'];
		}
	}	