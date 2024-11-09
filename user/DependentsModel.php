<?php
	
	require_once('../AppModel.php');
	class DependentsModel extends AppModel
	{
		function checkSsn($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from dependents where ssn=? and country_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST['ssn'],$_POST['cntry']);
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
				$stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$row['id']);
			}
			
		}
		
		
		function dobYears()
		{
				$a=date('Y');
				$org='';
				for($i=$a;$i>=$a-20;$i--)
				{
					$org=$org.'<option value="'.$i.'" class="lgtgrey2_bg" >'.$i.'</option>';
				}
				 
				return $org;
			 
		}
		
		
		function dobMonthOldYear()
		{
				
				$org='';
				for($i=1;$i<=12;$i++)
				{
					if($i<10)
					{
						$org=$org.'<option value="0'.$i.'" class="lgtgrey2_bg" >0'.$i.'</option>';
					}
					else
					$org=$org.'<option value="'.$i.'" class="lgtgrey2_bg" >'.$i.'</option>';
				}
				 
				return $org;
			 
		}
		
		
		function dobMonthCurrentYear()
		{
				$a=date('m');
				$org='';
				for($i=1;$i<=$a;$i++)
				{
					if($i<10)
					{
						$org=$org.'<option value="0'.$i.'" class="lgtgrey2_bg" >0'.$i.'</option>';
					}
					else
					$org=$org.'<option value="'.$i.'" class="lgtgrey2_bg" >'.$i.'</option>';
				}
				 
				return $org;
			 
		}
		
		function checkUsedIdentificator($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select id  from dependents   where  passport_number=? and id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['variation_id'],$dependent_id);
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
				$stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$row['id']);
			}
			 
		}
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,country_of_residence from user_logins where id = ?");
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
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,email  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function daycareRequestReceived($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select child_care_info.id,company_name  from child_care_info left join companies on companies.id=child_care_info.company_id where dependent_id=? and is_approved_dependent=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
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
		
		function daycareRequestApproved($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select child_care_info.id,company_name,child_image_path  from child_care_info left join companies on companies.id=child_care_info.company_id where dependent_id=? and is_approved_dependent=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
			$stmt = $dbCon->prepare("select id  from parent_info where child_id=? and parent_user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['id'],$data['user_id']);
			$stmt->execute();
			$resultP = $stmt->get_result();
			$rowP = $resultP->fetch_assoc();
				 
				array_push($org,$row);
				$org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$rowP['id']);
				$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
		function selectIcon()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=35");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function dependentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['dependent_id']);
			$stmt = $dbCon->prepare("select created_by  from dependents where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['created_by']==$data['user_id'])
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
		
		function dependentInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,image_path,created_on  from dependents where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;	
			
			
		}
		function dependentGuardianInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select id  from dependent_guardian where dependent_id=? and guardian_user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $dependent_id,$data['user_id']);
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
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
		}
		function dependentDetailAdded($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,ssn,email,dependent_type,created_on  from dependents where created_by=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
		
		function dependentCountAdded($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from dependents where created_by=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function dependentDetailApproved($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			
			
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,ssn,first_name,email,dependent_type,created_on,image_path  from dependents where id in (select dependent_id from dependent_guardian where guardian_user_id=? and is_approved=1) and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			
			 $filename="../estorecss/".$row ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['image_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['image_path'].'.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } 
					
			$org[$j]['image']=$imgs;
			
			
			$org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function dependentCountApproved($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from dependents where id in (select dependent_id from dependent_guardian where guardian_user_id=? and is_approved=1) and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function guardianDetailAdded($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select id,guardian_ssn,guardian_email,created_on  from dependent_guardian where dependent_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
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
		
		
		function guardianRequestReceived($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select dependent_guardian.id,guardian_ssn,guardian_email,dependent_guardian.created_on,concat_ws(' ',first_name,last_name) as name  from dependent_guardian left join user_logins on dependent_guardian.guardian_user_id=user_logins.id where dependent_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
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
		
		function guardianCountAdded($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select count(id) as num from dependent_guardian where dependent_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function guardianDetailApproved($data)
		{
			$dbCon = AppModel::createConnection();
			
			function base64_to_jpeg($base64_string, $output_file) {
					
					$ifp = fopen( $output_file, 'wb' ); 
					
					
					$data = explode( ',', $base64_string );
					
					fwrite( $ifp, base64_decode( $data[1] ) );
					
					
					fclose( $ifp ); 
					
					return $output_file; 
				}
			
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name, dependent_guardian.id,guardian_ssn,guardian_email,dependent_guardian.created_on,passport_image  from dependent_guardian left join user_logins on user_logins.id=dependent_guardian.guardian_user_id where dependent_id=?  and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			 
			 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['passport_image'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; } 
					
			$org[$j]['image']=$imgs;
					
				
			$org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function guardianCountApproved($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select count(id) as num from dependent_guardian where dependent_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function countryOption()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code order by country_name");
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
		
		function updatePassport($data)
		{
			$dbCon = AppModel::createConnection();
			$d_id= $this -> encrypt_decrypt('decrypt',$data['dependent_id']);
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			$data2 = strip_tags($_POST['image-data4']);
			
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);
			
			$stmt = $dbCon->prepare("update dependents set front_image_path=?,back_image_path=?,passport_number=?,issue_month=?,issue_year=?,expiry_month=?, expiry_year=?,is_completed=1,is_passport_updated=1 where id=?");
			$stmt->bind_param("sssssssi",$img_name1,$img_name2,$_POST['id_number'],$_POST['issue_month'],$_POST['issue_year'],$_POST['expiry_month'],$_POST['expiry_year'],$d_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select ssn,is_ssn_available from dependents where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $d_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$dependent = $result->fetch_assoc();
			
			if($dependent['is_ssn_available']==0)
			{
			$email=$_POST['id_number'].'@safeqloud.com';
			$stmt = $dbCon->prepare("update dependents set ssn=?,email=? where id=?");
			$stmt->bind_param("ssi",$_POST['id_number'],$email,$d_id);
			$stmt->execute();	
			}
			
				$stmt->close();
				$dbCon->close();
				return 1;
		}
		
		function addDependent($data)
		{
			$dbCon = AppModel::createConnection();
			
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			/*$data2 = strip_tags($_POST['image-data3']);
			
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name2.".txt", $data2);*/
			
			
			$fname=htmlentities($_POST['fname'],ENT_NOQUOTES, 'ISO-8859-1');
			$lname=htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1');
			
			if($data['is_ssn_available']==1)
			{
				$_POST['social_number']=$_POST['social_number'];
				$email=$_POST['social_number'].'@safeqloud.com';
			}
			else
			{
				$_POST['social_number']='';
				$email='';
			}
			
			
			if($_POST['is_address_same']==1)
			{
				$stmt = $dbCon->prepare("select address,city,port_number,zipcode from user_address where user_id=? and is_personal_address=1");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$row = $result->fetch_assoc();
				$_POST['child_address']=$row['address'];
				$_POST['child_city']=$row['city'];
				$_POST['child_port_number']=$row['port_number'];
				$_POST['child_zipcode']=$row['zipcode'];
			}
			 
			
			$stmt = $dbCon->prepare("select country_of_residence from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("insert into dependents(dependent_type,first_name,last_name,ssn,created_by,created_on,email,country_id,is_completed,child_address,child_city,child_zip,child_port_number,is_address_same,is_ssn_available,birth_day,birth_month,birth_year,image_path)
			values(?,?,?,?,?,now(),?,?,?,?, ?,?,?, ?,?,?, ?,?,?)");
			$stmt->bind_param("isssisiissssiiiiis",$_POST['dp_type'],$fname,$lname,$_POST['social_number'],$data['user_id'],$email,$row['country_of_residence'],$_POST['is_ssn_available'],$_POST['child_address'],$_POST['child_city'],$_POST['child_zipcode'],$_POST['child_port_number'],$_POST['is_address_same'],$_POST['is_ssn_available'],$_POST['dob_day'],$_POST['dob_month'],$_POST['dob_year'],$img_name1);
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				
			$stmt = $dbCon->prepare("select email,country_of_residence,phone_number,phone_country_code.country_code,ssn,country_phone  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$st=1;
			$stmt = $dbCon->prepare("insert into dependent_guardian(dependent_id,guardian_ssn,guardian_email,guardian_user_id, inviting_person_user_id,created_on,is_approved,guardian_phone,guardian_country)
			values(?,?,?,?,?,now(),?,?,?)");
			$stmt->bind_param("issiiiss",$id,$row['ssn'],$row['email'],$data['user_id'],$data['user_id'],$st,$row['phone_number'],$row['country_phone']);
			$stmt->execute();
			
			
			$phone="+".trim($row['country_code'])."".trim($row['phone_number']);
			
			$subject='Dependent added';
			$to=$phone;
			$html=$_POST['fname'].' '.$_POST['lname'].' has been added as your dependent. please confirm or reject the same.';
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			$to=$row['email'];
			//sendEmail($subject, $to, $html);
				
				$stmt->close();
				$dbCon->close();
				return $this -> encrypt_decrypt('encrypt',$id);
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		function updateDependentInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['dependent_id']);
			$data1 = strip_tags($_POST['image-data1']);
			if($_POST['image-data1']=="" || $_POST['image-data1']==null || $_POST['image-data1']=='none')
			{
				$img_name1='';
			}
			else
			{
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			}
			
			$stmt = $dbCon->prepare("update dependents set image_path=? where id=?");
			$stmt->bind_param("si",$img_name1,$dependent_id);
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
		
		
			function approveDependent($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("update dependents set is_approved=1 where id=?");
			$stmt->bind_param("i",$_POST['depend_id']);
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_id from dependents where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['depend_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select id from child_care_info where social_number=? and country_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $row['ssn'],$row['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowChild = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 1;
				 
			}
			else 
			{
			$stmt = $dbCon->prepare("update child_care_info set is_approved_dependent=1,dependent_id=?,first_name=?,last_name=? where id=?");
			$stmt->bind_param("issi",$_POST['depend_id'],$row['first_name'],$row['last_name'],$rowChild['id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id from parent_info where parent_user_id=? and child_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$rowChild['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowParent = $result->fetch_assoc();
			if(empty($rowParent))
			{
			$stmt = $dbCon->prepare("select user_logins.id,email,country_of_residence,phone_number,phone_country_code.country_code,ssn,country_phone  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();	
			$st=1;
			$stmt = $dbCon->prepare("insert into parent_info(country_id,invitation_type,parent_ssn,parent_phone,parent_country,parent_email,created_on,child_id,parent_user_id,is_approved,modified_on)
			values(?,?,?,?,?,?,now(),?,?,?,now())");
			$stmt->bind_param("iissssii",$row_user['country_of_residence'],$st,$row_user['ssn'],$row_user['phone_number'],$row_user['country_phone'],$row_user['email'],$rowChild['id'],$row_user['id'],$st);
			$stmt->execute();
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		
		function approveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select is_approved,inviting_person_user_id from dependent_guardian where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user1 = $result->fetch_assoc();
			if($row_user1['is_approved']!=1)
			{
			
			 
			$stmt = $dbCon->prepare("select user_logins.id,email,country_of_residence,phone_number,phone_country_code.country_code,ssn,country_phone  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name where user_logins.id=(select guardian_user_id from dependent_guardian where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("update dependent_guardian set is_approved=1,residence_country=?,guardian_ssn=? where id=?");
			$stmt->bind_param("isi",$row_user['country_of_residence'],$row_user['ssn'],$request_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select child_id from parent_info where parent_user_id=? and parent_user_id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row_user1['inviting_person_user_id'],$row_user['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$st=2;
				$st1=1;
			$stmt = $dbCon->prepare("insert into parent_info(country_id,invitation_type,parent_ssn,parent_phone,parent_country,parent_email,created_on,child_id,parent_user_id,is_approved,modified_on)
			values(?,?,?,?,?,?,now(),?,?,?,now())");
			$stmt->bind_param("iissssii",$row_user['country_of_residence'],$st,$row_user['ssn'],$row_user['phone_number'],$row_user['country_phone'],$row_user['email'],$row['child_id'],$row_user['id'],$st1);
			$stmt->execute();
			
			}
				$stmt->close();
				$dbCon->close();
				return 1;
			 
			}
			else
			{
			$stmt->close();
				$dbCon->close();
				return 1;	
			}
			
		}
		function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select is_approved from dependent_guardian where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			if($row_user['is_approved']!=1)
			{
			$stmt = $dbCon->prepare("update dependent_guardian set is_approved=3 where id=?");
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
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
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		function rejectRequestDaycare($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("update child_care_info set is_approved_dependent=2 where id=?");
			$stmt->bind_param("i",$request_id);
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
		
		function approveRequestDaycare($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$d_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("update child_care_info set is_approved_dependent=1 where id=?");
			$stmt->bind_param("i",$request_id);
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("select user_logins.id,email,first_name,last_name,country_of_residence,phone_number,country_phone,ssn  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id in (select guardian_user_id from dependent_guardian where dependent_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $d_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row_user = $result->fetch_assoc())
			{
				$st=1;
			$stmt = $dbCon->prepare("insert into parent_info(invitation_type,parent_ssn,parent_phone,parent_country,parent_email,created_on,child_id,parent_user_id,country_id,is_approved,modified_on)
			values(?,?,?,?,?,now(),?,?,?,?,now())");
			$stmt->bind_param("issssiiii",$st,$row_user['ssn'],$row_user['phone_number'],$row_user['country_phone'],$row_user['email'],$request_id,$row_user['id'],$row_user['country_of_residence'],$st);
			$stmt->execute();
			}
			
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
		
		function approveReceivedRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select is_approved from dependent_guardian where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			if($row_user['is_approved']!=1)
			{
			$stmt = $dbCon->prepare("update dependent_guardian set is_approved=1,inviting_person_user_id=? where id=?");
			$stmt->bind_param("ii",$data['user_id'],$request_id);
			if($stmt->execute())
			{
			$stmt = $dbCon->prepare("select user_logins.id,email,country_of_residence,phone_number,phone_country_code.country_code,ssn,country_phone  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name where user_logins.id=(select guardian_user_id from dependent_guardian where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select child_id from parent_info where parent_user_id=? and parent_user_id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$row_user['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
				$st=2;
				$st1=1;
			$stmt = $dbCon->prepare("insert into parent_info(country_id,invitation_type,parent_ssn,parent_phone,parent_country,parent_email,created_on,child_id,parent_user_id,is_approved,modified_on)
			values(?,?,?,?,?,?,now(),?,?,?,now())");
			$stmt->bind_param("iissssii",$row_user['country_of_residence'],$st,$row_user['ssn'],$row_user['phone_number'],$row_user['country_phone'],$row_user['email'],$row['child_id'],$row_user['id'],$st1);
			$stmt->execute();
			}
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
			else
			{
			$stmt->close();
				$dbCon->close();
				return 0;	
			}
			
		}
		function rejectReceivedRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select is_approved from dependent_guardian where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			if($row_user['is_approved']!=1)
			{
			$stmt = $dbCon->prepare("update dependent_guardian set is_approved=3 where id=?");
			$stmt->bind_param("i",$request_id);
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
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		
		
		function userCountryList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code   order by country_code");
			
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
		
		function countryCodeList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_code from country where id>0 and id<240  order by country_code");
			
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
		function checkGuardianSSN($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			 
			$stmt = $dbCon->prepare("select count(id) as num from dependent_guardian where guardian_ssn=? and dependent_id=? and residence_country=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['ssn'],$dependent_id,$_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_virtual = $result->fetch_assoc();
			 
			if($row_virtual['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			$stmt = $dbCon->prepare("select user_logins.id,email,first_name,last_name,ssn  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and ssn=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['country'],$_POST['ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			 $row_user = $result->fetch_assoc();
			
			if(empty($row_user))
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
    
		function inviteGuardian($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			
			$stmt = $dbCon->prepare("select count(id) as num from dependent_guardian where guardian_email=? and dependent_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST['email'],$dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			
			$stmt = $dbCon->prepare("select country_code,user_logins.id,country_phone,phone_number,email,ssn,country_of_residence from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['c_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phn = $result->fetch_assoc();
			
			if(empty($row_user))
			{
				$user=0;
			$stmt = $dbCon->prepare("insert into dependent_guardian(dependent_id,guardian_ssn,guardian_email,guardian_user_id, inviting_person_user_id,created_on,guardian_country,guardian_phone,residence_country)
			values(?,?,?,?,?,now(),?,?,?)");
			$stmt->bind_param("issiissi",$dependent_id,$_POST['ssn'],$_POST['email'],$user,$data['user_id'],$_POST['c_id'],$_POST['phone'],$_POST['ccountry']);
			$stmt->execute();
			$to=$row_phn['country_code'].''.trim($_POST['phone']);
			
			}
			else 
			{
				
				if($row_user['phone_number']=="" || $row_user['phone_number']==null)
				{
					$to=$row_phn['country_code'].''.trim($_POST['phone']);
					$cntry=$_POST['c_id'];
					$phone=$_POST['phone'];
				}
				else
				{
				$to=$row_user['country_code'].''.trim($row_user['phone_number']);
				$cntry=$row_user['country_phone'];
				$phone=$row_user['phone_number'];	
				}
			$stmt = $dbCon->prepare("insert into dependent_guardian(dependent_id,guardian_ssn,guardian_email,guardian_user_id, inviting_person_user_id,created_on,guardian_country,guardian_phone,residence_country)
			values(?,?,?,?,?,now(),?,?,?)");
			$stmt->bind_param("issiissi",$dependent_id,$_POST['ssn'],$_POST['email'],$row_user['id'],$data['user_id'],$cntry,$phone,$row_user['country_of_residence']);
			$stmt->execute();
			
			}
			
			$id=$stmt->insert_id;
			$encId=$this->encrypt_decrypt('encrypt',$id);
			$subject='guardian request received';
			$to=$phone;
			$url='https://www.safeqloud.com/user/index.php/ShareMonitor/shareMonitorRequestList';
			$surl=getShortUrl($url);
			 
			$html='You have received a guardian request please approve/reject  here:- '.$surl.' after login your account';
			$res=sendSms($subject, $to, $html);
			
			$to=$_POST['email'];
			$html='<html><head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   </head>
   <body>
      <div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">
         <center style="width:100%;table-layout:fixed">
            <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">
               <tbody>
                  <tr>
                     <td>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td>
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">
                                                               <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>
                                                               <div style="display:none;max-height:0px;overflow:hidden">
                                                                  &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;
                                                               </div>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">
                                    <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td style="padding-bottom:20px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">
                                                               <p style="font-size:30px; font-weight:normal; Audiowide;">safeqloud</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.safeqloud.com<u></u></a></strong></p>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">
                                                               <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">
                                                   <div style="text-align: center; line-height: 22px; max-width: 600px;
                                                      float: left;
                                                      position: relative; ">
                                                      <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #67cff7 !important;
                                                         width: 960px;
                                                         position: relative;
                                                         margin: 0 auto;
                                                         ">
                                                         <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
                                                            padding-left: 30px; margin-right: auto;
                                                            margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                                                            <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/envelopIcon.png" width="45px;" height="45px;"></div>
                                                            <div class="padb0 xxs-padb0 ">
                                                               <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:#ffffff;">Requests</h1>
                                                            </div>
                                                            <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:#ffffff; font-size: 20px;">You have received a request...</div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center">
                                                               <table border="0" cellspacing="0" cellpadding="0" align="left">
                                                                  <tbody>
																   <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                           <div style="font-size:16px; text-align:center;">Click below button to follow the request</div>
                                                                        </td>
                                                                     </tr>
                                                                     <tr>
                                                                        <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center; padding-bottom:15px;"><span><a href="'.$url.'" style="border-radius:3px;color:#ff2828;text-decoration:none;background-color:#ff2828;border-top:14px solid #ff2828;border-bottom:14px solid #ff2828;border-left:14px solid #ff2828;border-right:14px solid #ff2828;display:inline-block;border-radius:3px;color:#ffffff; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="'.$url.'">Follow</a></span></td>
                                                                     </tr>
                                                                     <tr style="padding-top:20px;">
                                                                        <td align="left" valign="top" scope="col" style="padding-top:20px;  padding-bottom:15px;">
                                                                           <div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser to manage your requests
                                                                              <br><br>
                                                                              <a style="text-decoration:none; color:#3691c0;">'.$surl.'</a>
                                                                           </div>
                                                                        </td>
                                                                     </tr>
																	 
																	
                                                                  </tbody>
                                                               </table>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                      <tbody>
                                                         <tr>
                                                            <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">
                                                               <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                                    <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">
                                       <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">
                                          <tbody>
                                             <tr>
                                                <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                                   <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                                </td>
                                                <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">
                                                   <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">
                                                      <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                                         <tbody>
                                                            <tr>
                                                               <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">
                                                                  <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">
                                                                     <tbody>
                                                                        <tr>
                                                                           <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">
                                                                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">
                                                                                 <tbody>
                                                                                    <tr>
                                                                                       <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">
                                                                                          <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; font-size:14px;">This is sent because you have been added as a guardian.</p>
                                                                                       </td>
                                                                                    </tr>
                                                                                 </tbody>
                                                                              </table>
                                                                           </td>
                                                                        </tr>
                                                                     </tbody>
                                                                  </table>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </div>
                                 </td>
                                 <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                    <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">
               <tbody>
                  <tr>
                     <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">
                        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">
                           <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">
                              <tbody>
                                 <tr>
                                    <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">
                                       <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">
                                          <tbody>
                                             <tr>
                                                <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">
                                                   <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </td>
                  </tr>
               </tbody>
            </table>
         </center>
      </div>
   
</body></html>';
			sendEmail($subject, $to, $html);
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
    
	function sendGuardianRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select country_code,user_logins.id,country_phone,phone_number,email,ssn,concat_ws(' ',first_name,last_name) as name from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code,user_logins.id,country_phone,phone_number,email,ssn,country_of_residence from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_logins.id=(select created_by from dependents where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_guardian_user = $result->fetch_assoc();
			
			
			
			$stmt = $dbCon->prepare("select count(id) as num from dependent_guardian where guardian_email=? and dependent_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $row_user['email'],$dependent_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			 
			
				$to=$row_guardian_user['country_code'].''.trim($row_guardian_user['phone_number']);
				$cntry=$row_user['country_phone'];
				$phone=$row_user['phone_number'];	
			$st=2;	
			$stmt = $dbCon->prepare("insert into dependent_guardian(dependent_id,guardian_ssn,guardian_email,guardian_user_id, created_on,guardian_country,guardian_phone,is_approved,residence_country)
			values(?,?,?,?,now(),?,?,?,?)");
			$stmt->bind_param("ississii",$dependent_id,$row_user['ssn'],$row_user['email'],$row_user['id'],$cntry,$phone,$st,$row_user['country_of_residence']);
			$stmt->execute();
			
			
			
			$id=$stmt->insert_id;
			$encId=$this->encrypt_decrypt('encrypt',$id);
			$subject='guardian request received';
			
			$html='You have received a guardian request from '.$row_user['name'].' please approve <a href="https://www.safeqloud.com/user/index.php/Dependents/approveReceivedRequest/'.$encId.'"> here</a> or reject <a href="https://www.safeqloud.com/user/index.php/Dependents/rejectReceivedRequest/'.$encId.'">here </a> after login your account';
			//$res=sendSms($subject, $to, $html);
			$to=$row_guardian_user['email'];
			sendEmail($subject, $to, $html);
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
    
		function userInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			
			$stmt = $dbCon->prepare("select user_logins_id,country_phone,phone_number,email from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where ssn=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			 $row_user = $result->fetch_assoc();
			
			
			$stmt->close();
			$dbCon->close();
			return $row_user;
			
		}
    
		function informUser($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select email,country_of_residence,phone_number,phone_country_code.country_code  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$phone="+".trim($row['country_code'])."".trim($row['phone_number']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			$to=$row['email'];
				try {
					  sendEmail($subject, $to, $emailContent);
					}

					 
					catch(Exception $e) {
					  
					}
				$stmt = $dbCon->prepare("insert into verify_user_phone (otp,created_on) values(?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $num);
				$stmt->execute();
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $id;
			
		}
		
		function verifyOtp()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select otp  from verify_user_phone where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['infor_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['otp']==$_POST['otp'])
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
		
		function verifyGuardian($data)
		{
			$dbCon = AppModel::createConnection();
			$dependent_id= $this -> encrypt_decrypt('decrypt',$data['did']);
			$stmt = $dbCon->prepare("select count(id) as num  from dependent_guardian where dependent_id=? and guardian_user_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $dependent_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
				
				$stmt->close();
				$dbCon->close();
				return $row['num'];
			
		}
		
		
		
	}		