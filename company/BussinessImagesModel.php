<?php
	require_once('../AppModel.php');
	class BussinessImagesModel extends AppModel
	{
	 
		 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$app_id= $this -> encrypt_decrypt('decrypt',$data['app_id']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
		
		function bussinessType($data)
		{
			
			return $this -> encrypt_decrypt('decrypt',$data['btype']);
		}
		 
		function appId($data)
		{
			$business=$this -> encrypt_decrypt('decrypt',$data['btype']);
			if($business==1)
			{
			return $this -> encrypt_decrypt('encrypt',44);
			}
			else if($business==2)
			{
			return $this -> encrypt_decrypt('encrypt',40);
			}
			else if($business==3)
			{
			return $this -> encrypt_decrypt('encrypt',41);
			}
			else if($business==4)
			{
			return $this -> encrypt_decrypt('encrypt',42);
			}
		}
		
		
		function bussinessCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$business=$this -> encrypt_decrypt('decrypt',$data['btype']);
			$bid=$this -> encrypt_decrypt('decrypt',$data['bid']);
			if($business==2)
			{
				$stmt = $dbCon->prepare("select company_id from property_location  where id=?");
			}
			else if($business==3)
			{
				$stmt = $dbCon->prepare("select company_id from resturant_information where id=?");
			}
			else if($business==4)
			{
				$stmt = $dbCon->prepare("select company_id from wellness_center_information  where id=?");
			}
			
			$stmt->bind_param("i", $bid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			return $this -> encrypt_decrypt('encrypt',$row['company_id']);
		}
		
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=40");
			
			/* bind parameters for markers */
			
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
		
		
		function businessDisplayInformation($data)
		{
			 
			$dbCon = AppModel::createConnection();
			$business_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			$btype= $this -> encrypt_decrypt('decrypt',$data['btype']);
			$big="new0.09086000 1600564862";
			$small1="new0.13561200 1600564862";
			$small2="new0.15516700 1600564862";
			$stmt = $dbCon->prepare("select * from business_dashboard_images  where business_id=? and business_type=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $business_id,$btype);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				 
				$stmt = $dbCon->prepare("INSERT INTO business_dashboard_images (business_id, business_type,created_on,big_image_path,small_image1_path, small_image2_path) VALUES (?, ?, now(), ?, ?, ?)");
				
				
				$stmt->bind_param("iisss", $business_id,$btype,$big,$small1,$small2);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select * from business_dashboard_images  where business_id=? and business_type=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $business_id,$btype);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			 
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		
		
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code  order by country_code");
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
		
		function addImages($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$business_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			 
			 $data1 = strip_tags($_POST['image-data11']);
			 $data2 = strip_tags($_POST['image-data21']);
			 $data3 = strip_tags($_POST['image-data31']);
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
			
			if($data2!='none')
			{
			define('UPLOAD_DIR1','../estorecss/'); // image dir path
			$img_name2="new".microtime();
			file_put_contents(UPLOAD_DIR1.$img_name2.".txt", $data2);
			}
			else 
			{
				$img_name2="";
			}
			
			if($data3!='none')
			{
			define('UPLOAD_DIR2','../estorecss/'); // image dir path
			$img_name3="new".microtime();
			file_put_contents(UPLOAD_DIR2.$img_name3.".txt", $data3);
			}
			else 
			{
				$img_name3="";
			}
			
			 $text=htmlentities($_POST['free_txt'],ENT_NOQUOTES, 'ISO-8859-1');
			  $text2=htmlentities($_POST['promotional_txt'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update business_dashboard_images set heading_type=?,big_image_path=?,small_image1_path=?, small_image2_path=?,free_text=?,show_footer=?,promotion_type=?,promotional_txt=? where business_id=? and business_type=?");
			$stmt->bind_param("issssiisii", $_POST['variation_type'],$img_name1,$img_name2,$img_name3,$text,$_POST['show_footer'],$_POST['promotion_type'],$text2,$business_id,$data['bussinessType'] );
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
		 
		
	}						