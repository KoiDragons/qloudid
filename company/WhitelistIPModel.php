<?php
	require_once('../AppModel.php');
	class WhitelistIPModel extends AppModel
	{
	function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=2");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
	function employeeList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,lower(first_name) first_name,lower(last_name) last_name,lower(email) email from employees where company_id=?");
			
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators[$i]['id']=$row['id'];
				$collaborators[$i]['first-name']=$row['first_name'];
				$collaborators[$i]['last-name']=$row['last_name'];
				$collaborators[$i]['email']=$row['email'];
				
				$collaborators[$i]['label']=$row['first_name'].' '.$row['last_name'].', <'.$row['email'].'>';
				
				$i++;
			}
			//print_r($collaborators); die;
			$filter = strtolower($data['filter']);
			$output = array();
			foreach ($collaborators as $collaborator) {
				if(substr_count($collaborator['label'], $filter) > 0){
					$output[] = $collaborator;
				}
			}
			$out=json_encode($output);
			$stmt->close();
			$dbCon->close();
			return $out;
			
			
		}
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,company_id,is_headquarter from property_location left join property on property.id=property_location.property_id where property_location.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		
		function meetingRoomDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,room_name,created_on from company_meeting_room where company_id=? order by created_on desc");
			
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
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image from user_logins where id = ?");
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
			
			$stmt = $dbCon->prepare("select country_id,grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
			function approveCountConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select count(id) as num from whitelist_ip where property_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function requestDetailApprovedConnections($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select id,ip_address,ip_type from whitelist_ip  where property_id=?  order by created_on desc limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function visitorsDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,name,last_name,created_on,booked from company_visitors  where company_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function visitorsDetailRegular($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$vdate=date('Y-m-d');
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=1 and visiting_date>=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$vdate);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$row['meeting_type']=1;
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			$vdate=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("select hotel_roomservice_item_ordered.id,concat_ws(' ',first_name,last_name) as full_name,email,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where booking_person_id>0 and booking_checkin_status=0 and dish_id in (select id from dishes_detail_information where company_id=?) and booking_date>=? group by booking_time");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$vdate);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select work_time from working_hrs  where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['booking_time']);
				$stmt->execute();
				$resultHrs = $stmt->get_result();
				$rowHrs = $resultHrs->fetch_assoc();
				
				$row['visiting_time']=$rowHrs['work_time'];
				$row['visiting_date']=date('Y-m-d',$row['booking_date']);
				$row['meeting_type']=2;
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$key_values = array_column($org, 'visiting_time'); 
				array_multisort($key_values, SORT_DESC, $org);
				$j=$j+1;
			}
			
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function visitorsDetailRegularArrived($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			
			$stmt = $dbCon->prepare("select hotel_roomservice_item_ordered.id,concat_ws(' ',first_name,last_name) as full_name,email,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where booking_person_id>0 and booking_checkin_status=1 and dish_id in (select id from dishes_detail_information where company_id=?) group by booking_time");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select work_time from working_hrs  where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['booking_time']);
				$stmt->execute();
				$resultHrs = $stmt->get_result();
				$rowHrs = $resultHrs->fetch_assoc();
				
				$row['visiting_time']=$rowHrs['work_time'];
				$row['visiting_date']=date('Y-m-d',$row['booking_date']);
				$row['meeting_type']=2;
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$key_values = array_column($org, 'visiting_time'); 
				array_multisort($key_values, SORT_DESC, $org);
				$j=$j+1;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function visitorsDetailRegularLamnat($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=3 ");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			$stmt = $dbCon->prepare("select hotel_roomservice_item_ordered.id,concat_ws(' ',first_name,last_name) as full_name,email,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where booking_person_id>0 and booking_checkin_status=2 and dish_id in (select id from dishes_detail_information where company_id=?) group by booking_time");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select work_time from working_hrs  where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['booking_time']);
				$stmt->execute();
				$resultHrs = $stmt->get_result();
				$rowHrs = $resultHrs->fetch_assoc();
				
				$row['visiting_time']=$rowHrs['work_time'];
				$row['visiting_date']=date('Y-m-d',$row['booking_date']);
				$row['meeting_type']=2;
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$key_values = array_column($org, 'visiting_time'); 
				array_multisort($key_values, SORT_DESC, $org);
				$j=$j+1;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function moreRegularVisitors($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=?  and status=1 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				
			
				$org=$org.'<tr class="fsz16 ffamily_avenir">
				
				<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " >'.$row['full_name'].'</div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['visiting_date'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('h:i',strtotime($row['visiting_time'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm tall xs-talr xs-marr10 ">
														<a href="../setArrived/'.$data['cid'].'/'.$enc.'"><div class="padtb5 ">Anlänt</div></a>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														
													</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
			function moreRegularVisitorsArrived($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=2 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				
			
				$org=$org.'<tr class="fsz16 ffamily_avenir">
				
				<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " >'.$row['full_name'].'</div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['visiting_date'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('h:i',strtotime($row['visiting_time'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm tall xs-talr xs-marr10 ">
														<a href="../setLamnat/'.$data['cid'].'/'.$org1.'"><div class="padtb5 ">Lämnat</div></a>
													</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function moreRegularVisitorsLamnat($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select id,full_name,created_on,visiting_date,visiting_time from company_regular_visitor  where company_id=? and status=3 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				
			
				$org=$org.'<tr class="fsz16 ffamily_avenir">
				
				<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " >'.$row['full_name'].'</div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['visiting_date'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('h:i',strtotime($row['visiting_time'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														
													</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
		function visitorsLeftDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,name,last_name,created_on,left_office_at,booked from company_visitors  where company_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateVisitors($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_visitors set left_office_at=now(),status=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function setArrived($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_regular_visitor set status=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function setArrivedServiceBooked($data)
		{
			$dbCon = AppModel::createConnection();
			$meeting_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set booking_checkin_status=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where hotel_roomservice_item_ordered.id=?");
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set booking_checkin_status=1 where booking_date=?  and booking_time=? and booking_person_id=? and dish_id in (select id from dishes_detail_information where company_id=?)");
			$stmt->bind_param("iiii", $row['booking_date'],$row['booking_time'],$row['booking_person_id'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function setLamnatServiceBooking($data)
		{
			$dbCon = AppModel::createConnection();
			$meeting_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set booking_checkin_status=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where hotel_roomservice_item_ordered.id=?");
			$stmt->bind_param("i", $meeting_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update hotel_roomservice_item_ordered set booking_checkin_status=2 where booking_date=?  and booking_time=? and booking_person_id=? and dish_id in (select id from dishes_detail_information where company_id=?)");
			$stmt->bind_param("iiii", $row['booking_date'],$row['booking_time'],$row['booking_person_id'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		function setLamnat($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_regular_visitor set status=3 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		function moreCompanyIps($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select id,ip_address,ip_type from whitelist_ip where property_id=? order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $property_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['ip_type']==1)
				{
			$div='<a href="../../../../company/index.php/Company/visitorsIP/'.$data['cid'].'">V</a>';
			$td=' Besökare';
				}
				else if($row['ip_type']==2)
				{
			$div='<a href="../../../../company/index.php/Parkering/plateInfo/'.$data['cid'].'">V</a>';
			$td='Parkering';
				}
				else if($row['ip_type']==3)
				{
			$div='<a href="../../../../company/index.php/Leveranser/pickupInfo/'.$data['cid'].'">V</a>';
			$td='Leverans';
				}
					else if($row['ip_type']==4)
				{
			$div='<a href="../../../../company/index.php/PublicDaycareSelect/daycareAction/'.$data['cid'].'">V</a>';
			$td='Daycare';
				}
					else if($row['ip_type']==5)
				{
			$div='<a href="../../../../company/index.php/RemoteVisitor/visitorInfo/'.$data['cid'].'">R</a>';
			$td='Visitor lite';
				}
				$ip="'".$row['ip_address']."'";
				
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
				<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">	'.$div.'</div>
																	</div>
													
													<div class="fleft wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">'.$td.'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  dark_grey_txt">'.$row['ip_address'].'</span>  </div>
													 
													<div class="fright wi_10 padt10 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz25  padb0 xxs-marr20 hidden-xs">
														<a href="#" class="show_popup_modal" data-target="#edit_ip" onclick="updatePopup('.$row['id'].','.$ip.');"> <span class="far fa-edit grey_txt"></span> </a>
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
		
		function visitorsCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_visitors where company_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function visitorsCountRegular($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_regular_visitor where company_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function visitorsCountRegularArrived($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_regular_visitor where company_id=? and status=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function visitorsCountRegularLamnat($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_regular_visitor where company_id=? and status=3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function whilistCompanyCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from whitelist_company where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function addedCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,company_name,is_company,status,exposed_times from whitelist_company  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function visitorsLeftCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_visitors where company_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
	
		function addIp($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if (filter_var($_POST['id'], FILTER_VALIDATE_IP)) {
				$stmt = $dbCon->prepare("INSERT INTO whitelist_ip (company_id, created_on , ip_address ) VALUES (?, now(), ?)");
				
				
				$stmt->bind_param("is", $company_id,$_POST['id']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
				} else {
				$dbCon->close();
				return 0;
			}
		}
		
		function userCountryList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_code");
			
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
		function addVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
				$stmt = $dbCon->prepare("insert into company_regular_visitor (visitor_country,visitor_phone,visitor_type,company_id,visiting_employee_id,full_name,visitor_email,visiting_date,visiting_time,created_on,repeating_cycle ) values (?, ?, ?, ?, ?, ?, ?, ?, ?, now(), ?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("isiiissssi",$_POST['cntry'],$_POST['search_phone'],$_POST['vtype'],$company_id,$_POST['ind'],htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['email'],date('Y-m-d',strtotime($_POST['vdate'])),$_POST['vtime'],$_POST['vrepeat']);
				if($stmt->execute())
				{
				$stmt->close();
				$dbCon->close();
				return 1;
				}
				 else {
				 echo $stmt->error();
				 $stmt->close();
				$dbCon->close();
				return 0;
			}
		}	
			
			function addCompanyIp($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			if (filter_var($_POST['ipadd'], FILTER_VALIDATE_IP)) {
				
			$stmt = $dbCon->prepare("select id from whitelist_ip where company_id=? and ip_address=? and ip_type=?");
			$stmt->bind_param("isi", $company_id,$_POST['ipadd'],$_POST['type_c']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				if(empty($row))
				{
				$stmt = $dbCon->prepare("INSERT INTO whitelist_ip (company_id, created_on , ip_address, property_id, ip_type ) VALUES (?, now(), ?, ?, ?)");
				
				
				$stmt->bind_param("isii", $company_id,$_POST['ipadd'],$_POST['property_id'],$_POST['type_c']);
				$stmt->execute();
				}
				$stmt->close();
				$dbCon->close();
				return 1;
				} else {
				$dbCon->close();
				return 0;
			}
			
			
			
			
		}
		
		function appsLocationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select total_desk from company_apps_location where company_id=? and location_id=? and app_id=37");
			$stmt->bind_param("ii", $company_id,$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			$stmt = $dbCon->prepare("select count(id) as num from whitelist_ip where property_id=? and ip_type=5");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			
			if($row['total_desk']>$row2['num'])
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
		function appsSafeqidCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select total_desk from company_apps_location where company_id=? and location_id=? and app_id=33");
			$stmt->bind_param("ii", $company_id,$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			$stmt = $dbCon->prepare("select count(id) as num from whitelist_ip where property_id=? and ip_type=4");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			
			if($row['total_desk']>$row2['num'])
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
		function addCompanyName($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if($_POST['type_c']==1)
			{
				$msg=htmlentities($_POST['addcomp'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			else if($_POST['type_c']==2)
			{
				$msg=htmlentities($_POST['addMsg'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			$stmt = $dbCon->prepare("INSERT INTO whitelist_company (company_id, created_on , company_name,is_company) VALUES (?, now(), ?, ?)");
			
			
			$stmt->bind_param("isi", $company_id,$msg,$_POST['type_c']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function editIp($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if (filter_var($_POST['ip'], FILTER_VALIDATE_IP)) {
			$stmt = $dbCon->prepare("select ip_type from whitelist_ip where id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowT = $result->fetch_assoc();	
			$stmt = $dbCon->prepare("select id from whitelist_ip where company_id=? and ip_address=? and ip_type=?");
			$stmt->bind_param("isi", $company_id,$_POST['ip'],$rowT['ip_type']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{				
				
				$stmt = $dbCon->prepare("update whitelist_ip set ip_address =? where id=? ");
				
				
				$stmt->bind_param("si", $_POST['ip'],$_POST['id']);
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
				} else {
				$dbCon->close();
				return 0;
			}
			
			
			
			
		}
		
		
		
		function activateInactive($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$r_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("update whitelist_company set status =0 where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			
			if($data['st']==0)
			{
			$st=1;
			}
			else if($data['st']==1)
			{
			$st=0;
			}
			
				$stmt = $dbCon->prepare("update whitelist_company set status =? where id=? ");
				$stmt->bind_param("ii", $st,$r_id);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			
			
		
		
	}							