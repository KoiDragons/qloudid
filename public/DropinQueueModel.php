<?php
	require_once('../AppModel.php');
	class DropinQueueModel extends AppModel
	{
		function companyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$stmt = $dbCon->prepare("select d_port_number,i_port_number,latitude,longitude,support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_profiles on companies.id=company_profiles.company_id left join country on companies.country_id=country.id left join phone_country_code on phone_country_code.country_name=country.country_name  where companies.id=(select company_id from property_location where id=?)");
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function corporateColor($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
				$stmt = $dbCon->prepare("select * from corporate_color where company_id=(select company_id from property_location where id=?)");
				$stmt->bind_param("i",$company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row;
				
			}
			
			function queueDetailInfo($data)
			{  
				$dbCon = AppModel::createConnection();
				$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
				$stmt = $dbCon->prepare("select company_location_queue_info.id,queue_name,visiting_address,is_active,published_queue from  company_location_queue_info  left join property_location on property_location.id=company_location_queue_info.location_id where company_location_queue_info.location_id=? and published_queue=1 and is_active=1");
				$stmt->bind_param("i", $location_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				while($rowAvailable = $result->fetch_assoc())
				{
					$rowAvailable['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
					array_push($org,$rowAvailable);
				}
				//print_r($org); die;
				$stmt->close();
				$dbCon->close();
				 
				return $org;
				
				
			}
		
		
		
		
		
			function queueInfo($data)
			{
				$dbCon = AppModel::createConnection();
				$id= $this -> encrypt_decrypt('decrypt',$data['id']);
				$stmt = $dbCon->prepare("select company_location_queue_info.id,queue_name,visiting_address from  company_location_queue_info  left join property_location on property_location.id=company_location_queue_info.location_id where company_location_queue_info.id=(select queue_id from company_dropin_queue_waitlist where id=?)");
				$stmt->bind_param("i", $id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowAvailable = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				 
				return $rowAvailable;
				
				
			}
		function waitlistGuest($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select * from company_dropin_queue_waitlist where id=?");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable;
			
			
		}
		
		function waitlistCount($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select count(id) as num from company_dropin_queue_waitlist where id<? and is_serviced=0");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			 
			return $rowAvailable['num']+1;
			
			
		}
		
		
		function countryOption()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_name");
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
		
		function addGuestinfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$queue_id= $this -> encrypt_decrypt('decrypt',$data['qid']);			
			$fname=htmlentities($_POST['guest_name'],ENT_NOQUOTES, 'ISO-8859-1');
			  
			$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into company_dropin_queue_waitlist(guest_name,phone_number,country_id,created_on,location_id,queue_id)
			values(?,?,?,now(),?,?)");
			$stmt->bind_param("ssiii",$fname,$_POST['pnumber'],$_POST['country_id'],$location_id,$queue_id);
			$stmt->execute();
			 
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("select company_location_queue_info.id,queue_name,visiting_address from  company_location_queue_info  left join property_location on property_location.id=company_location_queue_info.location_id where company_location_queue_info.id=(select queue_id from company_dropin_queue_waitlist where id=?)");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddress = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_dropin_queue_waitlist where id<? and is_serviced=0");
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc(); 
			$rank=$rowAvailable['num']+1;
			$enc_id= $this -> encrypt_decrypt('encrypt',$id);	
			$url="https://safeqloud-228cbc38a2be.herokuapp.com/public/index.php/DropinQueue/waitingInformation/".$data['lid'].'/'.$enc_id;
			$surl=getShortUrl($url);
			$phone="+".trim($row['country_code'])."".trim($_POST['pnumber']);
			
			$subject='You Are #'.$rank.' on the '.$rowAddress['queue_name'].' waitlist';
			$to=$phone;
			$html='Hi '.$_POST['guest_name'].'! you are waitlisted to '.$rowAddress['queue_name'].' as #'.$rank.' in line. See live update at '.$surl;
			//echo $html; die;
			$res=sendSms($subject, $to, $html);
			$stmt->close();
			$dbCon->close();
			return $id;
			 
			
		}
		
		function deleteFromQueue($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);			
			$stmt = $dbCon->prepare("delete from company_dropin_queue_waitlist where id=?");
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
			
		}
		
	}		