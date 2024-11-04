<?php
	require_once('../AppModel.php');
	class LawFirmModel extends AppModel
	{
		function addResource($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$data1 = strip_tags($_POST['image-data11']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			$description=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into `law_firm_resources`( `hourly_price`, `type_of_lawer`, `lawer_practice_area` , `languages_used_by_staff`, `description` , `profile_image_lawer`  , `employee_id` ,`created_on`)
			values(?,?,?,?,?,?,?,now())");
			$stmt->bind_param("iissssi",$_POST['price'],$_POST['type_of_lawer'],$_POST['practice_area'],$_POST['ind1'],$description,$img_name1,$employee_id);
			
			$stmt->execute();	
				 $stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		
		function updateResource($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$data1 = strip_tags($_POST['image-data11']);
			if($data1!='none')
			{
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			else 
			{
				$img_name1="";
			}
			$description=htmlentities($_POST['description'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update  `law_firm_resources` set `hourly_price`=?, `type_of_lawer`=?, `lawer_practice_area` =?, `languages_used_by_staff`=?, `description`=? , `profile_image_lawer`=? where `employee_id`=?");
			$stmt->bind_param("iissssi",$_POST['price'],$_POST['type_of_lawer'],$_POST['practice_area'],$_POST['ind1'],$description,$img_name1,$employee_id);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		function languagesKnown($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from world_languages where find_in_set(id,?)");
			$stmt->bind_param("s", $data['languages_known']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function practiceAreaSelectedForLower($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			 
			$stmt = $dbCon->prepare("select * from practice_area");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function resourceInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select * from law_firm_resources  where employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function resourceInfoCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select count(id) as num from law_firm_resources  where employee_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		 function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
			}
		function employeesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employees.id,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,is_lawer,passport_image from employees left join user_logins on user_logins.id=employees.user_login_id where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['img']=$imgs;
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
		
		
		function practiceArea($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select * from practice_area");
			/* bind parameters for markers */
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
		
		function practiceAreaSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$practice_area=explode(',',$data['warning']);
			 
			$stmt = $dbCon->prepare("select * from practice_area");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $practice_area))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function serviceArea($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select * from law_services");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function serviceAreaSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$law_services=explode(',',$data['warning']);
			 
			$stmt = $dbCon->prepare("select * from law_services");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				if (in_array($row['id'], $law_services))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function mainPracticeAreas($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select * from main_practice_areas");
			/* bind parameters for markers */
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
		
		function mainPracticeAreasSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$main_practice_areas=explode(',',$data['warning']);
			 
			$stmt = $dbCon->prepare("select * from main_practice_areas");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $main_practice_areas))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function barAssociations($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select * from bar_associations");
			/* bind parameters for markers */
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
		
		 
		function typeOfLawer($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select * from type_of_lawer");
			/* bind parameters for markers */
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
		
		
		 function typeOfLawerSelected($data)
		{
			$dbCon = AppModel::createConnection();
			$lawer=explode(',',$data['warning']);
			 
			$stmt = $dbCon->prepare("select * from type_of_lawer");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				if (in_array($row['id'], $lawer))
				{
				$org[$j]['is_selected']= 1;
				}
				else
				{
				$org[$j]['is_selected']= 0;	
				}
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateAdminStatus($data)
		{
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update employees set is_lawer=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['updateR'],$_POST['id']);
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
		function servicePriceList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$service_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select * from service_price_type  where company_id=? and service_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$service_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);	
			array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function servicePriceCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$service_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select count(id) as num from service_price_type  where company_id=? and service_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$service_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function servicePriceDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			
			$stmt = $dbCon->prepare("select * from service_price_type  where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function lawCompanyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select * from company_lawfirm_account_request  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
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
			
			$stmt = $dbCon->prepare("select country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		function addPricePlan($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$service_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$title=htmlentities($_POST['title'],ENT_NOQUOTES, 'ISO-8859-1');
			
			 
			for($i=0; $i<$_POST['total_row'];$i++)
			{
			$rtype='recurring_type'.$i;   
			$ttime='total_time'.$i;
			$rtypec='recurring_typec'.$i;
			$pmodel='price_model'.$i;
			$price='price'.$i;	
			$subscription_info=	'subscription_info'.$i;
			if($_POST[$subscription_info]==1)	
			{
			$recurring_type=0;
			$total_time=0;
			$recurring_typec=0;
			}
			else
			{
			$recurring_type=$_POST[$rtype];
			$total_time=$_POST[$ttime];
			$recurring_typec=$_POST[$rtypec];	
			}
			$stmt = $dbCon->prepare("insert into `service_price_type`( `price_title`, `price_model`, `price` , `recurring_type`, `recurring_cycle` , `subscription_info`  , `custom_cycle` , `custom_time`,`created_on`,company_id,service_id)
			values(?,?,?,?,?,?,?,?, now(),?, ?)");
			$stmt->bind_param("siiiiiiiii",$title,$_POST[$pmodel],$_POST[$price],$recurring_type,$recurring_type,$_POST[$subscription_info],$recurring_typec,$total_time,$company_id,$service_id);
			
			$stmt->execute();	
			}
			
			 
				 $stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		
		
		
		
		
		function updatePricePlan($data)
		{
			$dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id']);
			 
			$title=htmlentities($_POST['title'],ENT_NOQUOTES, 'ISO-8859-1');
			$subscription_info=	'subscription_info'.$i;
			if($_POST['subscription_info']==1)	
			{
			$recurring_type=0;
			$total_time=0;
			$recurring_typec=0;
			}
			else
			{
			$recurring_type=$_POST['recurring_type'];
			$total_time=$_POST['total_time'];
			$recurring_typec=$_POST['recurring_typec'];	
			}
			$stmt = $dbCon->prepare("update `service_price_type` set `price_title`=?, `price_model`=?, `price`=? , `recurring_type`=?, `recurring_cycle`=? , `subscription_info`=?  , `custom_cycle`=? , `custom_time`=? where id=?");
			$stmt->bind_param("siiiiiiii",$title,$_POST['price_model'],$_POST['price'],$recurring_type,$recurring_type, $_POST['subscription_info'], $recurring_typec ,$total_time,$id);
			
			$stmt->execute();	
			 $stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		
			function getLanguages($data)
		{
			$dbCon = AppModel::createConnection();
			 $filter = '%'.strtolower($data['filter']).'%';
			$stmt = $dbCon->prepare("select * from world_languages where lang_eng like ?");
			$stmt->bind_param("s", $filter);
			$stmt->execute();
			$result = $stmt->get_result();
			$collaborators = array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$collaborators[$i]['id']=$row['id'];
				$collaborators[$i]['lang_eng']=$row['lang_eng'];
				 
				
				$collaborators[$i]['label']=$row['lang_eng'];
				
				$i++;
			}
			
			$out=json_encode($collaborators);
			$stmt->close();
			$dbCon->close();
			return $out;
			
			
		}
		
		
		function sendRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
			$stmt = $dbCon->prepare("insert into `company_lawfirm_account_request`(`bar_association_id`,`type_of_lawer_info`,`main_practice_areas_detail`,`practice_area_detail`,`how_many_offices`,`how_many_lawers`,`company_id`,`created_on`,`modified_on`,service_area_detail)
			values(?,?,?,?,?,?,?,now(),now(),?)");
			$stmt->bind_param("isssiiis",$_POST['bar_association'],$_POST['type_of_lawer'],$_POST['main_practice_areas'],$_POST['practice_area'],$_POST['office_count'],$_POST['lawer_count'],$company_id,$_POST['service_name']);
			
			$stmt->execute();
			
				$to='kowaken.ghirmai@qmatchup.com';
				$subject       = 'Law firm Information';
				
				$emailContent ='Hi,</br>				
				Law firm request';
				//sendEmail($subject, $to, $emailContent);	
				
				$stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		function developerCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select is_approved from company_developer_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return -1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['is_approved'];	
			}
			
			
		}
		
	function updateRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
			$stmt = $dbCon->prepare("update company_lawfirm_account_request set bar_association_id=?,type_of_lawer_info=?,main_practice_areas_detail=?,practice_area_detail=?,how_many_offices=?,how_many_lawers=?,modified_on=now(),service_area_detail=? where company_id=?");
			$stmt->bind_param("isssiisi",$_POST['bar_association'],$_POST['type_of_lawer'],$_POST['main_practice_areas'],$_POST['practice_area'],$_POST['office_count'],$_POST['lawer_count'],$_POST['service_name'],$company_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
	 
	}	