<?php
	require_once('../AppModel.php');
	class FooterInformationModel extends AppModel
	{
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code order by country_code");
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
		function footerStart($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select * from company_footer_information where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into company_footer_information(company_id,created_on) values( ?, now())");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();	
			$stmt = $dbCon->prepare("select * from company_footer_information where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		 	
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status,grading_status,country_of_residence,country_name,user_logins.created_on from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
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
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,email,country_of_residence  from user_logins where id=?");
			
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
			
			$stmt = $dbCon->prepare("select ssn,address,country,city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone,phone_verified from user_profiles  where user_logins_id=?");
			
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
			
			$stmt = $dbCon->prepare("select companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,companies.country_id from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		 
		 function updateInfo($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 $stmt = $dbCon->prepare("select * from company_footer_information where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			if($_POST['show_products']==1)
			{
				$product=implode(",",$_POST['product_name']);
				$plink=implode(",",$_POST['product_link']);
			}
			else
			{
				$product='';
				$plink='';
			}
			if($_POST['show_resources']==1)
			{
				$resource=implode(",",$_POST['resource_name']);
				$rlink=implode(",",$_POST['resource_link']);
			}
			else
			{
				$resource='';
				$rlink='';
			}
			if($_POST['show_help']==1)
			{
				$help=implode(",",$_POST['help_name']);
				$hlink=implode(",",$_POST['help_link']);
			}
			else
			{
				$help='';
				$hlink='';
			}
			
			if($_POST['rename_products']==1)
			{
				$newPname=htmlentities($_POST['product_menu_name'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			else
			{
				$newPname=$row['product_menu_name'];
			}
			
			if($_POST['rename_resources']==1)
			{
				$newRname=htmlentities($_POST['resource_menu_name'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			else
			{
				$newRname=$row['resource_menu_name'];
			}
			
			if($_POST['rename_help']==1)
			{
				$newHname=htmlentities($_POST['help_menu_name'],ENT_NOQUOTES, 'ISO-8859-1');
			}
			else
			{
				$newHname=$row['help_menu_name'];
			}
			$privacy=htmlentities($_POST['privacy_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$security=htmlentities($_POST['security_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$environment=htmlentities($_POST['environment_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$subtext=htmlentities($_POST['company_subtext'],ENT_NOQUOTES, 'ISO-8859-1');
			$copyright_text=htmlentities($_POST['copyright_text'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update company_footer_information set show_products=?, rename_products=?, product_menu_name=?, product_submenu=?, product_link=?, show_resources=?, rename_resources=?, resource_menu_name=?, resource_submenu=?, resource_link=?, show_help=?, rename_help=?, help_menu_name=?, help_submenu=?, help_link=?, show_company_logo=?, show_company_subtext=?, company_subtext=?, copyright_text=?, facebook=?, instagram=?, twitter=?, linkdn=?, show_privacy=?, privacy_name=?, privacy_link=?, show_security=?, security_name=?, security_link=?, show_environment=?, environment_name=?, environment_link=?, email=?, country_phone=?, phone_number=? where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iisssiisssiisssiissssssissississsisi",$_POST['show_products'], $_POST['rename_products'],$newPname, $product, $plink, $_POST['show_resources'], $_POST['rename_resources'], $newRname, $resource, $rlink, $_POST['show_help'], $_POST['rename_help'], $newHname, $help, $hlink, $_POST['show_company_logo'], $_POST['show_company_subtext'], $subtext, $copyright_text, $_POST['facebook'], $_POST['instagram'], $_POST['twitter'], $_POST['linkdn'], $_POST['show_privacy'], $privacy, $_POST['privacy_link'], $_POST['show_security'], $security, $_POST['security_link'],  $_POST['show_environment'], $environment, $_POST['environment_link'], $_POST['email'], $_POST['ccountry'], $_POST['p_number'], $company_id);
			$stmt->execute();
 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		 }	