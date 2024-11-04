<?php
	require_once('../AppModel.php');
	class PickupChildModel extends AppModel
	{
		function checkOpenStatus($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id),max(open_date) edate from safeqid_open_close where company_id=? and status=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(date('Y-m-d',strtotime($row['edate']))==date('Y-m-d'))
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
			function verifyLanguage()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$stmt = $dbCon->prepare("select language_var from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 'en';
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return $row['language_var'];
			}
		}
		
			function changeLanguage()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			
			$stmt = $dbCon->prepare("select id from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("INSERT INTO public_page_language (language_var, ip_address, created_on ) VALUES (?, ?, now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
			
			}
			else
			{
			$stmt = $dbCon->prepare("update public_page_language set language_var=? where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
				
			}
			
				$stmt->close();
				$dbCon->close();
				return 1;
			
		}
		
			function verifyIP($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$stmt = $dbCon->prepare("select id from whitelist_ip where company_id=? and ip_address=? and ip_type=4");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
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
		
			function companyDetail($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				
				
				$stmt = $dbCon->prepare("select companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
				
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
			function corporateColor($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("select * from corporate_color where company_id=?");
				
				$stmt->bind_param("i",$company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
						
						$stmt->close();
						$dbCon->close();
						return $row;
				
			}
			function checkUserInformation($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("select count(id) as num from parent_info where parent_ssn=? and child_id in (select id from child_care_info where company_id=?)");
				
				$stmt->bind_param("si",$_POST['social_number'],$company_id); 
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['num']>0)
				{
				$stmt = $dbCon->prepare("select count(dropped_off_children.id) as num from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id in(select child_id from parent_info where parent_ssn=?))) and is_approved=1 and is_left=0 and child_care_info.company_id=?");
			
				$stmt->bind_param("si",$_POST['social_number'],$company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_count = $result->fetch_assoc();
						if($row_count['num']==0)
						{
						$stmt->close();
						$dbCon->close();
						return 4;	
						}
						else
						{
						$stmt->close();
						$dbCon->close();
						return 1;
						}		
				}
				else
				{
				$stmt = $dbCon->prepare("select id,permission_type from parent_relatives_information where relative_ssn=?  and day_care_id=?");
				
				$stmt->bind_param("si",$_POST['social_number'],$company_id);
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
						if($row['permission_type']==1)
						{
						$stmt = $dbCon->prepare("select count(dropped_off_children.id)as num from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id in(select child_id from parent_info where id=(select parent_id from parent_relatives_information where relative_ssn=?)))) and is_approved=1 and is_left=0 and child_care_info.company_id=?");
			
						$stmt->bind_param("si",$_POST['social_number'],$company_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_count = $result->fetch_assoc();
						if($row_count['num']==0)
						{
						$stmt->close();
						$dbCon->close();
						return 4;	
						}
						else
						{
						$stmt->close();
						$dbCon->close();
						return 1;
						}						
						}
						else
						{
						$stmt->close();
						$dbCon->close();
						return 3;
						}
					}
				}

			}
	
		function getChildren($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			if($_POST['ind']==2)
			{
			$stmt = $dbCon->prepare("select dropped_off_children.id,concat_ws(' ', first_name, last_name) as name,child_image_path,social_number from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id in(select child_id from parent_info where id=(select parent_id from parent_relatives_information where relative_ssn=?)))) and is_approved=1 and is_left=0 and child_care_info.company_id=?");
			
			$stmt->bind_param("si",$_POST['ssn'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			else if($_POST['ind']==1)
			{
			$stmt = $dbCon->prepare("select dropped_off_children.id,concat_ws(' ', first_name, last_name) as name,child_image_path,social_number from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where child_id in (select child_id from parent_info where parent_ssn in (select parent_ssn from parent_info where child_id in(select child_id from parent_info where parent_ssn=?))) and is_approved=1 and is_left=0 and child_care_info.company_id=?");
			
			$stmt->bind_param("si",$_POST['ssn'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if($row ['child_image_path']!=null) { $filename="../estorecss/".$row ['child_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['child_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $org[$j]['image_path'] = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['child_image_path'].'.jpg' ); } else { $org[$j]['image_path']="../html/usercontent/images/person-male.png"; } }  else $org[$j]['image_path']="../html/usercontent/images/person-male.png";
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			}
		}
		
		function updateChild()
		{
			$dbCon = AppModel::createConnection();
			$children=substr($_POST['selected_child'],0,-1);
			$totalChildren=explode(',',$children);
			foreach($totalChildren as $key)
			{
			
			$stmt = $dbCon->prepare("update dropped_off_children set is_left=1 where id=?");
			
			$stmt->bind_param("i",$key);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("select child_id,concat_ws(' ', first_name, last_name) as name,dependent_id  from dropped_off_children left join child_care_info on child_care_info.id=dropped_off_children.child_id where dropped_off_children.id=?");
			
			$stmt->bind_param("i",$key);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select id,plan_type from safeqid_user_plan_detail where dependent_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['dependent_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_plan = $result->fetch_assoc();
			if(empty($row))
			{
			$pln=0;
			}
			 else
			{
			$pln=$row_plan['plan_type'];	 
				 
			}
			
			$stmt = $dbCon->prepare("select min(modified_on) as mdate from parent_info where child_id =? and is_approved=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowParent = $result->fetch_assoc();	
			$timeElap=(int)(abs(strtotime(date('Y-m-d')) - strtotime($rowParent['mdate'])) / 86400); 
			
			if($timeElap>14)
			{
				
				if($pln==2)
				{
					$permissionType=1;
				}
				else
				{
				$permissionType=0;
				}
			}
			else
			{
			$permissionType=1;	
			}
			
			if($_POST['ind_p']==1)
			{
			$stmt = $dbCon->prepare("select parent_info.id as pid,parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name from parent_info left join user_logins on user_logins.id=parent_info.parent_user_id left join phone_country_code on phone_country_code.country_name=parent_info.parent_country where parent_ssn=? and child_id=?");
			
			$stmt->bind_param("si",$_POST['ssn'],$row['child_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_parents = $result->fetch_assoc();	
			$rp='p_'.$row_parents['pid'];
			$stmt = $dbCon->prepare("insert into child_pickup_info(child_id,picked_up_by,person_id,picked_up_person_name,picked_up_person_ssn,created_on,dropped_off_id)
			values(?,?,?,?,?,now(),?)");
			$stmt->bind_param("iisssi",$row['child_id'],$_POST['ind'],$rp,$row_parents['name'],$_POST['ssn'],$key);
			$stmt->execute();
			if($permissionType==1)
			{
			$to= '+'.trim($row_parents['country_code']).''.trim($row_parents['parent_phone']);
			$subject       = "Child Received!";
						
			$emailContent =$row['name']." has been picked up by ".$row_parents['name'];
			
			$res=sendSms($subject, $to, $emailContent);
						
			$to            = $row_parents['parent_email'];
						
			$subject       = "Child pick up info!";
						
			$emailContent =$row['name']." has been picked up by ".$row_parents['name'];
			sendEmail($subject, $to, $emailContent);
			}
			}
			else if($_POST['ind_p']==2)
			{
			$stmt = $dbCon->prepare("select parent_relatives_information.id,relative_email,relative_phone,phone_country_code.country_code,concat_ws(' ', relative_first_name, relative_last_name) as name from parent_relatives_information left join country on country.id=parent_relatives_information.relative_country left join phone_country_code on phone_country_code.country_name=country.country_name where relative_ssn=?");
			
			$stmt->bind_param("s",$_POST['ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_parents = $result->fetch_assoc();	
			$rp='r_'.$row_parents['id'];
			$stmt = $dbCon->prepare("insert into child_pickup_info(person_id,child_id,picked_up_by,picked_up_person_name,picked_up_person_ssn,created_on,dropped_off_id)
			values(?,?,?,?,?,now(),?)");
			$stmt->bind_param("siissi",$rp,$row['child_id'],$_POST['ind'],$row_parents['name'],$_POST['ssn'],$key);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select max(parent_info.id)as pid,parent_email,parent_phone,country_code,concat_ws(' ', first_name, last_name) as name from parent_info left join user_logins on user_logins.id=parent_info.parent_user_id left join phone_country_code on phone_country_code.country_name=parent_info.parent_country where child_id=?");
			
			$stmt->bind_param("s",$row['child_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_parents1 = $result->fetch_assoc();	
			if($permissionType==1)
			{
			$to= '+'.trim($row_parents1['country_code']).''.trim($row_parents1['parent_phone']);
			$subject       = "Child Received!";
			$emailContent =$row['name']." has been picked up by ".$row_parents['name'];
			
			$res=sendSms($subject, $to, $emailContent);
						
			$to            = $row_parents1['parent_email'];
			$subject       = "Child pick up info!";
			$emailContent =$row['name']." has been picked up by ".$row_parents['name'];
			sendEmail($subject, $to, $emailContent);	
			}
			}
				
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
			
	}	