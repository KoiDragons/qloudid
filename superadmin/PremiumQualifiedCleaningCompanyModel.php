<?php
	require_once('../AppModel.php');
	class PremiumQualifiedCleaningCompanyModel extends AppModel
	{
		
		function PremiumQualifiedMarketplaceCompanyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$org=array();
			
				$stmt = $dbCon->prepare("select profile_pic,cleaning_company_premium_account_request.id,cleaning_company_premium_account_request.created_on,company_name,subscribed_on,last_payment_date,next_payment_date from cleaning_company_premium_account_request left join companies on companies.id=cleaning_company_premium_account_request.company_id left join company_profiles on companies.id=company_profiles.company_id where is_approved=1 and cleaning_company_premium_account_request.domain_id=? order by cleaning_company_premium_account_request.created_on desc");
				$stmt->bind_param("i",$domain_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			 
				$filename="../estorecss/".$row ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['profile_pic'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				 
				$row['photo_info']=	'../../../'.$image;
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			
		
		function suportedLanguagesList($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_suported_languages where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select *  from language_list");
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into professional_company_suported_languages (domain_id,language_id,company_id, created_on, modified_on) values (?,?,?, now(), now())");
			$stmt->bind_param("iii",$domain_id,$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			}
			
			
			$stmt = $dbCon->prepare("select professional_company_suported_languages.id,language_name,is_selected from professional_company_suported_languages left join language_list on language_list.id=professional_company_suported_languages.language_id where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
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
		
		
		function professionalMarketplaceDstrictsSelected()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select professional_marketplace.id,marketplace_name from profession_dstricts_markeplace left join professional_marketplace on professional_marketplace.id=profession_dstricts_markeplace.marketplace_id where is_selected=1");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
		function professionalMarketplaceNonPremiumSelected()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select professional_marketplace.id,marketplace_name from profession_dstricts_markeplace left join professional_marketplace on professional_marketplace.id=profession_dstricts_markeplace.marketplace_id where is_nonpremium=1");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
		
		
		function professionalMarketplaceDstrictsDetail()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from professional_marketplace where id not in (select marketplace_id from profession_dstricts_markeplace)");
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("insert into profession_dstricts_markeplace (marketplace_id) values (?)");
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();
			 
			}
			$stmt = $dbCon->prepare("select profession_dstricts_markeplace.id,is_selected,marketplace_name,is_nonpremium from profession_dstricts_markeplace left join professional_marketplace on professional_marketplace.id=profession_dstricts_markeplace.marketplace_id");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
			
			function apartmentList()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			 
			$stmt = $dbCon->prepare("select * from user_address where is_published=1");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			
			function updateDstrictMarketAvailable()
			{
				$dbCon = AppModel::createConnection();
				$stmt = $dbCon->prepare("select * from profession_dstricts_markeplace  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['mid']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['is_selected']==0)
				{
					$is_selected=1;
				}
				else
				{
					$is_selected=0;
				}
				$stmt = $dbCon->prepare("update profession_dstricts_markeplace  set is_selected=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ii", $is_selected,$_POST['mid']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			function updateNonPremiumMarketAvailable()
			{
				$dbCon = AppModel::createConnection();
				$stmt = $dbCon->prepare("select * from profession_dstricts_markeplace  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['mid']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['is_nonpremium']==0)
				{
					$is_selected=1;
				}
				else
				{
					$is_selected=0;
				}
				$stmt = $dbCon->prepare("update profession_dstricts_markeplace  set is_nonpremium=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ii", $is_selected,$_POST['mid']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			
			function updatePremiumApartment()
			{
				$dbCon = AppModel::createConnection();
				$stmt = $dbCon->prepare("select * from user_address  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['mid']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				if($row['is_premium']==0)
				{
					$is_selected=1;
				}
				else
				{
					$is_selected=0;
				}
				$stmt = $dbCon->prepare("update user_address  set is_premium=? where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ii", $is_selected,$_POST['mid']);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
		function selectedProfessionalDomainDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id=?");
			$stmt->bind_param("i", $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
		 
			$filename="../estorecss/".$rowCategory ['marketplace_domain_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowCategory ['marketplace_domain_image'].".txt"); $rowCategory ['marketplace_domain_image']=str_replace('"','',$value_a);  } 
			$stmt->close();
			$dbCon->close();
			return $rowCategory;	
			}
		
		function addDomainImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			 
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			$stmt = $dbCon->prepare("update  professional_marketplace_domain_info set marketplace_domain_image=? where id=?");
			$stmt->bind_param("si",$img_name1, $domain_id);
			$stmt->execute();
			
			 
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			
		function professionalMarketplaceSelectedCategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id =?");
			$stmt->bind_param("i",$catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;	
			}
		
		function professionalServiceCategoryLocation($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category_location");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select count(id) as num from professional_service_category_available where category_id =? and service_available=?");
			$stmt->bind_param("ii",$catg_id,$row['id']);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowC = $resultC->fetch_assoc();
			if($rowC['num']==0)
			{
				$row['is_selected']=0;
			}
			else
			{
				
				$row['is_selected']=1;
			}
			array_push($org,$row);
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;	
			}
			
			
			
			function professionalServiceMarketplaceLocation($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select * from professional_service_category_location");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select count(id) as num from professional_service_marketplace_location_available where marketplace_id =? and service_available=?");
			$stmt->bind_param("ii",$catg_id,$row['id']);
			$stmt->execute();
			$resultC = $stmt->get_result();
			$rowC = $resultC->fetch_assoc();
			if($rowC['num']==0)
			{
				$row['is_selected']=0;
			}
			else
			{
				
				$row['is_selected']=1;
			}
			array_push($org,$row);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;	
			}
			
			function updateCategoryInfo($data)
			{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$full_name=	htmlentities($_POST['category_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("update `qloudid`.`professional_service_category` set is_property_category=?, design_template=?,`category_name`=?,available_at_domain=? where id=?");
			$stmt->bind_param("iisii",$_POST['is_property_category'],$_POST['design_template'], $full_name,$_POST['available_at_domain'],$catg_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from `qloudid`.`professional_service_category_available` where category_id=?");
			$stmt->bind_param("i",$catg_id);
			$stmt->execute();	
			
			$_POST['inclusion_type_detail']=substr($_POST['inclusion_type_detail'],0,-1);
			$a=explode(',',$_POST['inclusion_type_detail']);
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_service_category_available`(category_id,`service_available`) values (?,?)");
			$stmt->bind_param("ii",$catg_id, $key);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
			}	
			
			
		function addProfessionalMarketplaceDomain()
		{ 
		
			$dbCon = AppModel::createConnection();
			$full_name=	htmlentities($_POST['category_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_marketplace_domain_info`(`marketplace_domain_type`,created_on) values (?,now())");
			$stmt->bind_param("s",$full_name);
			$stmt->execute();
			$id=$stmt->insert_id;
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		function professionalMarketplaceDomainDetail()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
			
		function professionalMarketplaceSelectedDomain($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id not in (select marketplace_domain_id from professional_marketplace_selected_domain where marketplace_id=?)");
			$stmt->bind_param("i",$marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_marketplace_selected_domain`(`marketplace_domain_id`,marketplace_id,created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("ii",$rowCategory['id'],$marketplace_id);
			$stmt->execute();
			}
			
			
			$stmt = $dbCon->prepare("select professional_marketplace_selected_domain.id,is_selected,marketplace_domain_type from  professional_marketplace_selected_domain left join professional_marketplace_domain_info on professional_marketplace_domain_info.id=professional_marketplace_selected_domain.marketplace_domain_id where marketplace_id=?");
			$stmt->bind_param("i",$marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
		
		
		function professionalMarketplaceSelectedMenu($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace_menu_info where id not in (select marketplace_menu_id from professional_marketplace_selected_menu where marketplace_id=?)");
			$stmt->bind_param("i",$marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_marketplace_selected_menu`(`marketplace_menu_id`,marketplace_id,created_on,modified_on) values (?,?,now(),now())");
			$stmt->bind_param("ii",$rowCategory['id'],$marketplace_id);
			$stmt->execute();
			}
			
			
			$stmt = $dbCon->prepare("select professional_marketplace_selected_menu.id,is_selected,marketplace_menu_name from  professional_marketplace_selected_menu left join professional_marketplace_menu_info on professional_marketplace_menu_info.id=professional_marketplace_selected_menu.marketplace_menu_id where marketplace_id=?");
			$stmt->bind_param("i",$marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
		
		
		
			function professionalMarketplacePremiumDomain($data)
			{ 
			
				$dbCon = AppModel::createConnection();
				$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
				$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id not in (select marketplace_domain_id from professional_marketplace_premium_domain where marketplace_id=?)");
				$stmt->bind_param("i",$marketplace_id);
				$stmt->execute();
				$result = $stmt->get_result();
				while($rowCategory = $result->fetch_assoc())
				{
				$stmt = $dbCon->prepare("insert into `qloudid`.`professional_marketplace_premium_domain`(`marketplace_domain_id`,marketplace_id,created_on,modified_on) values (?,?,now(),now())");
				$stmt->bind_param("ii",$rowCategory['id'],$marketplace_id);
				$stmt->execute();
				}
				
				
				$stmt = $dbCon->prepare("select professional_marketplace_premium_domain.id,is_selected,marketplace_domain_type from  professional_marketplace_premium_domain left join professional_marketplace_domain_info on professional_marketplace_domain_info.id=professional_marketplace_premium_domain.marketplace_domain_id where marketplace_id=?");
				$stmt->bind_param("i",$marketplace_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				while($rowCategory = $result->fetch_assoc())
				{
				$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
				array_push($org,$rowCategory);
				}
					$stmt->close();
					$dbCon->close();
					return $org;	
				}
			
			
			function professionalMarketplaceNonPremiumDomain($data)
			{ 
			
				$dbCon = AppModel::createConnection();
				$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
				$stmt = $dbCon->prepare("select * from professional_marketplace_domain_info where id not in (select marketplace_domain_id from professional_marketplace_nonpremium_domain where marketplace_id=?)");
				$stmt->bind_param("i",$marketplace_id);
				$stmt->execute();
				$result = $stmt->get_result();
				while($rowCategory = $result->fetch_assoc())
				{
				$stmt = $dbCon->prepare("insert into `qloudid`.`professional_marketplace_nonpremium_domain`(`marketplace_domain_id`,marketplace_id,created_on,modified_on) values (?,?,now(),now())");
				$stmt->bind_param("ii",$rowCategory['id'],$marketplace_id);
				$stmt->execute();
				}
				
				
				$stmt = $dbCon->prepare("select professional_marketplace_nonpremium_domain.id,is_selected,marketplace_domain_type from  professional_marketplace_nonpremium_domain left join professional_marketplace_domain_info on professional_marketplace_domain_info.id=professional_marketplace_nonpremium_domain.marketplace_domain_id where marketplace_id=?");
				$stmt->bind_param("i",$marketplace_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				while($rowCategory = $result->fetch_assoc())
				{
				$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
				array_push($org,$rowCategory);
				}
					$stmt->close();
					$dbCon->close();
					return $org;	
				}
			
			
			
		function professionalMarketplaceDomain($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			 
			$stmt = $dbCon->prepare("select professional_marketplace_selected_domain.id,is_selected,marketplace_domain_type from  professional_marketplace_selected_domain left join professional_marketplace_domain_info on professional_marketplace_domain_info.id=professional_marketplace_selected_domain.marketplace_domain_id where marketplace_id=? and is_selected=1");
			$stmt->bind_param("i",$marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
			
		function professionalMarketplaceDomainRuleInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$md_id=$this->encrypt_decrypt('decrypt',$data['md_id']);
			 
			$stmt = $dbCon->prepare("select professional_marketplace_selected_domain.id,is_selected,marketplace_domain_type,payment_option from  professional_marketplace_selected_domain left join professional_marketplace_domain_info on professional_marketplace_domain_info.id=professional_marketplace_selected_domain.marketplace_domain_id where  professional_marketplace_selected_domain.id=?");
			$stmt->bind_param("i",$md_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $rowCategory;	
			}	
			
			
		function updatePaymentRules($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$md_id=$this->encrypt_decrypt('decrypt',$data['md_id']);
			 
			$stmt = $dbCon->prepare("update professional_marketplace_selected_domain set payment_option=?  where  professional_marketplace_selected_domain.id=?");
			$stmt->bind_param("ii",$_POST['payment_option'],$md_id);
			$stmt->execute();
			if($_POST['payment_option']<3)
			{
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set payment_option=?  where  domain_id=? and professional_category_id in(select id from professional_service_category  where available_at_domain=?)");
			$stmt->bind_param("iii",$_POST['payment_option'],$marketplace_id,$md_id);
			$stmt->execute();
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
			}	
			
			
			
			
			function updatePremiumDomain()
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from professional_marketplace_premium_domain where id=?");
			$stmt->bind_param("i",$_POST['domain_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$_POST['subcategory_info']=1;	
			}
			else
			{
				$_POST['subcategory_info']=0;
			}
			$stmt = $dbCon->prepare("update professional_marketplace_premium_domain set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['domain_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateNonPremiumDomain()
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from professional_marketplace_nonpremium_domain where id=?");
			$stmt->bind_param("i",$_POST['domain_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$_POST['subcategory_info']=1;	
			}
			else
			{
				$_POST['subcategory_info']=0;
			}
			$stmt = $dbCon->prepare("update professional_marketplace_nonpremium_domain set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['domain_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
			
		function updateAvailableDomain()
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from professional_marketplace_selected_domain where id=?");
			$stmt->bind_param("i",$_POST['domain_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$_POST['subcategory_info']=1;	
			}
			else
			{
				$_POST['subcategory_info']=0;
			}
			$stmt = $dbCon->prepare("update professional_marketplace_selected_domain set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['domain_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function updateAvailableMenu()
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from professional_marketplace_selected_menu where id=?");
			$stmt->bind_param("i",$_POST['domain_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$_POST['subcategory_info']=1;	
			}
			else
			{
				$_POST['subcategory_info']=0;
			}
			$stmt = $dbCon->prepare("update professional_marketplace_selected_menu set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['domain_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateCategoryNonPremiumAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set unaqasa_nonpremium=1,modified_on=now() where marketplace_id=? and professional_category_id=? and is_selected=1");
			$stmt->bind_param("ii", $marketplace_id,$_POST['cleaning_subcategory_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateCategoryNonPremiumServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select unaqasa_nonpremium,professional_category_id,marketplace_id as domain_id from professional_marketplace_service_todos where id=?");
			$stmt->bind_param("i",$_POST['service_todo_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['unaqasa_nonpremium']==0)
			{
			$_POST['subcategory_info']=1;	
			}
			else
			{
				$_POST['subcategory_info']=0;
			}
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set unaqasa_nonpremium=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['service_todo_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_marketplace_service_todos where marketplace_id=? and professional_category_id=? and unaqasa_nonpremium=1");
			$stmt->bind_param("ii",$row['domain_id'],$row['professional_category_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		
		
		function updateCategoryDstrictsServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select published_on_dstricts,professional_category_id,marketplace_id as domain_id from professional_marketplace_service_todos where id=?");
			$stmt->bind_param("i",$_POST['service_todo_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['published_on_dstricts']==0)
			{
			$_POST['subcategory_info']=1;	
			}
			else
			{
				$_POST['subcategory_info']=0;
			}
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set published_on_dstricts=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['service_todo_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_marketplace_service_todos where marketplace_id=? and professional_category_id=? and published_on_dstricts=1");
			$stmt->bind_param("ii",$row['domain_id'],$row['professional_category_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function updateCategoryServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_selected,professional_category_id,marketplace_id as domain_id from professional_marketplace_service_todos where id=?");
			$stmt->bind_param("i",$_POST['service_todo_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$_POST['subcategory_info']=1;	
			}
			else
			{
				$_POST['subcategory_info']=0;
			}
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['service_todo_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_marketplace_service_todos where marketplace_id=? and professional_category_id=? and is_selected=1");
			$stmt->bind_param("ii",$row['domain_id'],$row['professional_category_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function updateCategoryPlanServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$plan_id=$this->encrypt_decrypt('decrypt',$data['sid']);
			if($plan_id==1)
			{
			$stmt = $dbCon->prepare("select free_services as service_selected,professional_category_id,marketplace_id as domain_id from professional_marketplace_service_todos where id=?");	
			}
			else if($plan_id==2)
			{
				$stmt = $dbCon->prepare("select gold_services  as service_selected,professional_category_id,marketplace_id as domain_id from professional_marketplace_service_todos where id=?");
			}
			else if($plan_id==3)
			{
				$stmt = $dbCon->prepare("select premium_services  as service_selected,professional_category_id,marketplace_id as domain_id from professional_marketplace_service_todos where id=?");
			}		
			 
			$stmt->bind_param("i",$_POST['service_todo_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['service_selected']==0)
			{
			$_POST['subcategory_info']=1;	
			}
			else
			{
				$_POST['subcategory_info']=0;
			}
			
			
			if($plan_id==1)
			{
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set free_services=?,modified_on=now() where id=?");	
			}
			else if($plan_id==2)
			{
				$stmt = $dbCon->prepare("update professional_marketplace_service_todos set gold_services=?,modified_on=now() where id=?");
			}
			else if($plan_id==3)
			{
				$stmt = $dbCon->prepare("update professional_marketplace_service_todos set premium_services=?,modified_on=now() where id=?");
			}	
			
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['service_todo_id']);
			$stmt->execute();
			
			
			if($plan_id==1)
			{
			$stmt = $dbCon->prepare("select count(id) as num from professional_marketplace_service_todos where marketplace_id=? and professional_category_id=? and is_selected=1 and free_services=1");	
			}
			else if($plan_id==2)
			{
				$stmt = $dbCon->prepare("select count(id) as num from professional_marketplace_service_todos where marketplace_id=? and professional_category_id=? and is_selected=1 and gold_services=1");
			}
			else if($plan_id==3)
			{
				$stmt = $dbCon->prepare("select count(id) as num from professional_marketplace_service_todos where marketplace_id=? and professional_category_id=? and is_selected=1 and premium_services=1");
			}
			
			$stmt->bind_param("ii",$row['domain_id'],$row['professional_category_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function updateCategoryPlanServiceAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$plan_id=$this->encrypt_decrypt('decrypt',$data['sid']);
			if($plan_id==1)
			{
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set free_services=1,modified_on=now() where marketplace_id=? and professional_category_id=? and is_selected=1");	
			}
			else if($plan_id==2)
			{
				$stmt = $dbCon->prepare("update professional_marketplace_service_todos set gold_services=1,modified_on=now() where marketplace_id=? and professional_category_id=? and is_selected=1");
			}
			else if($plan_id==3)
			{
				$stmt = $dbCon->prepare("update professional_marketplace_service_todos set premium_services=1,modified_on=now() where marketplace_id=? and professional_category_id=? and is_selected=1");
			}	
			
			$stmt->bind_param("ii", $marketplace_id,$_POST['cleaning_subcategory_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateCategoryDstrictsAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set published_on_dstricts=1,modified_on=now() where marketplace_id=? and professional_category_id=? and is_selected=1");
			$stmt->bind_param("ii", $marketplace_id,$_POST['cleaning_subcategory_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function updateCategoryServiceAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set is_selected=1,modified_on=now() where marketplace_id=? and professional_category_id=?");
			$stmt->bind_param("ii", $marketplace_id,$_POST['cleaning_subcategory_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function serviceTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				if($data['objectType']==$row['id'])
				{
					$block='block';
				}
				else
				{
					$block='none';
				}
				$stmt = $dbCon->prepare("select count(id)as num from professional_marketplace_service_todos where professional_category_id=? and is_selected=1 and marketplace_id=?");
				$stmt->bind_param("ii", $row['id'],$marketplace_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText">'.str_ireplace('&','and',html_entity_decode($row['category_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: '.$block.';">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content changedText">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select professional_marketplace_service_todos.id,is_selected,subcategory_name from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where professional_marketplace_service_todos.professional_category_id=? and professional_marketplace_service_todos.marketplace_id=? and is_service_active=1");
			$stmt->bind_param("ii", $row['id'],$marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['subcategory_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function serviceSubscriptionTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$plan_id=$this->encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id in (select professional_category_id from professional_marketplace_service_todos where  is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("i", $marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				if($data['objectType']==$row['id'])
				{
					$block='block';
				}
				else
				{
					$block='none';
				}
				if($plan_id==1)
				{
				$stmt = $dbCon->prepare("select count(id)as num from professional_marketplace_service_todos where professional_category_id=? and is_selected=1 and marketplace_id=? and free_services=1");	
				}
				else if($plan_id==2)
				{
				$stmt = $dbCon->prepare("select count(id)as num from professional_marketplace_service_todos where professional_category_id=? and is_selected=1 and marketplace_id=? and gold_services=1");	
				}
				else if($plan_id==3)
				{
				$stmt = $dbCon->prepare("select count(id)as num from professional_marketplace_service_todos where professional_category_id=? and is_selected=1 and marketplace_id=? and premium_services=1");	
				}
				
				$stmt->bind_param("ii", $row['id'],$marketplace_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText">'.str_ireplace('&','and',html_entity_decode($row['category_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: '.$block.';">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content changedText">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
			if($plan_id==1)
				{
				$stmt = $dbCon->prepare("select professional_marketplace_service_todos.id,free_services as service_selected,subcategory_name from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where professional_marketplace_service_todos.professional_category_id=? and professional_marketplace_service_todos.marketplace_id=? and is_service_active=1 and is_selected=1");	
				}
				else if($plan_id==2)
				{
				$stmt = $dbCon->prepare("select professional_marketplace_service_todos.id,gold_services as service_selected,subcategory_name from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where professional_marketplace_service_todos.professional_category_id=? and professional_marketplace_service_todos.marketplace_id=? and is_service_active=1  and is_selected=1");	
				}
				else if($plan_id==3)
				{
				$stmt = $dbCon->prepare("select professional_marketplace_service_todos.id,premium_services as service_selected,subcategory_name from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where professional_marketplace_service_todos.professional_category_id=? and professional_marketplace_service_todos.marketplace_id=? and is_service_active=1  and is_selected=1");	
				}
		 	 
			$stmt->bind_param("ii", $row['id'],$marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['service_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['subcategory_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		function serviceTodoDetailDstricts($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				if($data['objectType']==$row['id'])
				{
					$block='block';
				}
				else
				{
					$block='none';
				}
				$stmt = $dbCon->prepare("select count(id)as num from professional_marketplace_service_todos where professional_category_id=?  and marketplace_id=? and is_selected=1");
				$stmt->bind_param("ii", $row['id'],$marketplace_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				if($rowTodoSelectedCount['num']==0)
					continue;
				
				$stmt = $dbCon->prepare("select count(id)as num from professional_marketplace_service_todos where professional_category_id=? and published_on_dstricts=1 and marketplace_id=? and is_selected=1");
				$stmt->bind_param("ii", $row['id'],$marketplace_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				 
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText">'.str_ireplace('&','and',html_entity_decode($row['category_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: '.$block.';">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content changedText">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select professional_marketplace_service_todos.id,is_selected,subcategory_name,published_on_dstricts from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where professional_marketplace_service_todos.professional_category_id=? and professional_marketplace_service_todos.marketplace_id=? and is_selected=1");
			$stmt->bind_param("ii", $row['id'],$marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['published_on_dstricts']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['subcategory_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		function serviceTodoDetailNonPremium($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				if($data['objectType']==$row['id'])
				{
					$block='block';
				}
				else
				{
					$block='none';
				}
				
				$stmt = $dbCon->prepare("select count(id)as num from professional_marketplace_service_todos where professional_category_id=? and unaqasa_nonpremium=1 and marketplace_id=? and is_selected=1");
				$stmt->bind_param("ii", $row['id'],$marketplace_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText">'.str_ireplace('&','and',html_entity_decode($row['category_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: '.$block.';">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content changedText">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select professional_marketplace_service_todos.id,is_selected,subcategory_name,unaqasa_nonpremium from professional_marketplace_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_marketplace_service_todos.professional_subcategory_id where professional_marketplace_service_todos.professional_category_id=? and professional_marketplace_service_todos.marketplace_id=? and is_selected=1");
			$stmt->bind_param("ii", $row['id'],$marketplace_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['unaqasa_nonpremium']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['subcategory_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		 function professionalTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$marketplace_id=$this->encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  professional_marketplace_service_todos where marketplace_id=?)");
			$stmt->bind_param("i", $marketplace_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into professional_marketplace_service_todos ( professional_category_id,professional_subcategory_id,marketplace_id, created_on, modified_on) values (?, ?,?, now(), now())");
			$stmt->bind_param("iii",$row['professional_category_id'],$row['id'],$marketplace_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		 
		function addProfessionalMarketplace()
		{ 
		
			$dbCon = AppModel::createConnection();
			if($_POST['image-data1']=='' || $_POST['image-data1']=='none')
			{
			$img_name1='';
			}
			else
			{
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			 
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);	
			}
			
			
			if($_POST['day1']==0)
			{
				$_POST['licence1']=0;
			}
			
			if($_POST['day2']==0)
			{
				$_POST['licence2']=0;
			}
			
			if($_POST['day3']==0)
			{
				$_POST['licence3']=0;
			}
			$marketplace_description=	htmlentities($_POST['marketplace_description'],ENT_NOQUOTES, 'ISO-8859-1');
			$marketplace_review=	htmlentities($_POST['marketplace_review'],ENT_NOQUOTES, 'ISO-8859-1');
			$full_name=	htmlentities($_POST['category_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$heading_info=	htmlentities($_POST['heading_info'],ENT_NOQUOTES, 'ISO-8859-1');
			$subheading_info=	htmlentities($_POST['subheading_info'],ENT_NOQUOTES, 'ISO-8859-1');	
			$_POST['signup_type_value']=substr($_POST['signup_type_value'],0,-1);
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_marketplace`(marketplace_description, marketplace_review, free_licences_required, gold_licences_required, premium_licences_required, start_page_template,heading_info,subheading_info,bg_color_info,background_image,gold_account_payment_term,gold_account_subscription_fee,premium_account_payment_term,premium_account_subscription_fee,booking_signup_type,connection_type,`marketplace_name`,tax_info,charge_on_estore,charge_on_companies,company_charge_info,charge_on_buyers,buyer_charge_info,signup_type,charge_on_partners,partner_charge_info) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssiiiissssiiiiiisiiiiiisii",$marketplace_description,$marketplace_review,$_POST['licence1'],$_POST['licence2'],$_POST['licence3'],$_POST['start_page_template'],$heading_info,$subheading_info,$_POST['bg_color_info'],$img_name1,$_POST['is_recurring_payment2'],$_POST['subscription_fee2'],$_POST['is_recurring_payment3'],$_POST['subscription_fee3'],$_POST['booking_signup_type'],$_POST['connection_type'], $full_name,$_POST['tax_info'],$_POST['food1'],$_POST['day1'],$_POST['company_charge_info'],$_POST['day2'],$_POST['buyer_charge_info'],$_POST['signup_type_value'],$_POST['day3'],$_POST['partner_charge_info']);
			$stmt->execute();
			$id=$stmt->insert_id;
			 
			$_POST['inclusion_type_detail']=substr($_POST['inclusion_type_detail'],0,-1);
			$a=explode(',',$_POST['inclusion_type_detail']);
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_service_marketplace_location_available`(marketplace_id,`service_available`) values (?,?)");
			$stmt->bind_param("ii",$id, $key);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		function updateMarketplaceInfo($data)
		{ 
			$mid= $this -> encrypt_decrypt('decrypt',$data['mid']);
			$dbCon = AppModel::createConnection();
			 
			if($_POST['image-data1']=='' || $_POST['image-data1']=='none')
			{
			$img_name1='';
			}
			else
			{
			$data1 = strip_tags($_POST['image-data1']);
			 
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			 
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);	
			}
			
				
			if($_POST['day1']==0)
			{
				$_POST['licence1']=0;
			}
			
			if($_POST['day2']==0)
			{
				$_POST['licence2']=0;
			}
			
			if($_POST['day3']==0)
			{
				$_POST['licence3']=0;
			}
			$marketplace_description=	htmlentities($_POST['marketplace_description'],ENT_NOQUOTES, 'ISO-8859-1');
			$marketplace_review=	htmlentities($_POST['marketplace_review'],ENT_NOQUOTES, 'ISO-8859-1');
			$full_name=	htmlentities($_POST['category_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$heading_info=	htmlentities($_POST['heading_info'],ENT_NOQUOTES, 'ISO-8859-1');
			$subheading_info=	htmlentities($_POST['subheading_info'],ENT_NOQUOTES, 'ISO-8859-1');	
			$_POST['signup_type_value']=substr($_POST['signup_type_value'],0,-1);
			$stmt = $dbCon->prepare("update `qloudid`.`professional_marketplace` set marketplace_review=?,marketplace_description=?,free_licences_required=?, gold_licences_required=?, premium_licences_required=?, start_page_template=?,heading_info=?,subheading_info=?,bg_color_info=?,background_image=?,gold_account_payment_term=?,gold_account_subscription_fee=?,premium_account_payment_term=?,premium_account_subscription_fee=?,booking_signup_type=?,`marketplace_name`=?,tax_info=?,charge_on_estore=?,charge_on_companies=?,company_charge_info=?,charge_on_buyers=?,buyer_charge_info=?,charge_on_partners=?,partner_charge_info=?,signup_type=? where id=?");
			$stmt->bind_param("ssiiiissssiiiiisiiiiiiiisi",$marketplace_review,$marketplace_description,$_POST['licence1'],$_POST['licence2'],$_POST['licence3'],$_POST['start_page_template'],$heading_info,$subheading_info,$_POST['bg_color_info'],$img_name1,$_POST['is_recurring_payment2'],$_POST['subscription_fee2'],$_POST['is_recurring_payment3'],$_POST['subscription_fee3'],$_POST['booking_signup_type'], $full_name,$_POST['tax_info'],$_POST['food1'],$_POST['day1'],$_POST['company_charge_info'],$_POST['day2'],$_POST['buyer_charge_info'],$_POST['day3'],$_POST['partner_charge_info'],$_POST['signup_type_value'],$mid);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from `qloudid`.`professional_service_marketplace_location_available` where marketplace_id=?");
			$stmt->bind_param("i",$mid);
			$stmt->execute();	
			
			$_POST['inclusion_type_detail']=substr($_POST['inclusion_type_detail'],0,-1);
			$a=explode(',',$_POST['inclusion_type_detail']);
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_service_marketplace_location_available`(marketplace_id,`service_available`) values (?,?)");
			$stmt->bind_param("ii",$mid, $key);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function professionalMarketplaceDetail()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from professional_marketplace");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
		function professionalServiceBookingDetail()
		{
			$dbCon = AppModel::createConnection();
			$org=array();
			$stmt = $dbCon->prepare("select hotel_roomservice_item_ordered.id,concat_ws(' ',user_logins.first_name,user_logins.last_name) as full_name,booking_date  ,booking_time,booking_person_id,booking_checkin_status from hotel_roomservice_item_ordered left join employees on employees.id=hotel_roomservice_item_ordered.booked_employee_id left join user_logins on user_logins.id=hotel_roomservice_item_ordered.booking_person_id where booking_person_id>0 and booked_employee_id>0 group by booking_date, booking_time order by booking_date desc");
			$stmt->execute();
			$result = $stmt->get_result();
			$j=0;
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
				$row['enc1']=$this->encrypt_decrypt('encrypt',$row['meeting_type']);
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				 
				$j=$j+1;
			}
			
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
			
			
		 
			
		function selectedProfessionalMarketplaceDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$mid= $this -> encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id=?");
			$stmt->bind_param("i", $mid);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
			$filename="../estorecss/".$rowCategory['background_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowCategory ['background_image'].".txt"); $value_a=str_replace('"','',$value_a);  }
			else
			{
				$value_a='';
			}
			$rowCategory ['background_image']=$value_a;
			 
			$stmt->close();
			$dbCon->close();
			return $rowCategory;	
			}	
		
		function professionalCategoryDetail()
		{ 
		
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
			
	function professionalJobRequiremnt($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$mid= $this -> encrypt_decrypt('decrypt',$data['mid']);
			$stmt = $dbCon->prepare("select user_id,user_professional_job_requirement.id,service_categories,concat_ws(' ',first_name,last_name) as name,first_name,last_name,user_logins.email,user_professional_job_requirement.address,user_professional_job_requirement.port_number,user_professional_job_requirement.city,user_professional_job_requirement.zipcode from user_professional_job_requirement left join user_logins on user_logins.id=user_professional_job_requirement.user_id where user_professional_job_requirement.domain_id=?");
			$stmt->bind_param("i", $mid);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$row['services']='';
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$stmt = $dbCon->prepare("select * from professional_service_category where find_in_set(id,?)");
			$stmt->bind_param("s", $row['service_categories']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			while($rowCategory = $result2->fetch_assoc())
			{
			$row['services']=$row['services'].$rowCategory['category_name'].' , ';	
			}
			$row['services']=substr($row['services'],0,-2);
			
			array_push($org,$row);
			}
				$stmt->close();
				$dbCon->close();
				return $org;	
			}	
			
		function addProfessionalCategoryDetail()
		{ 
		
			$dbCon = AppModel::createConnection();
			$full_name=	htmlentities($_POST['category_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_service_category`(is_property_category, `category_name`, available_at_domain, design_template ) values (?,?,?,?)");
			$stmt->bind_param("isii",$_POST['is_property_category'], $full_name,$_POST['available_at_domain'],$_POST['design_template']);
			$stmt->execute();
			$id=$stmt->insert_id;
			$_POST['inclusion_type_detail']=substr($_POST['inclusion_type_detail'],0,-1);
			$a=explode(',',$_POST['inclusion_type_detail']);
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_service_category_available`(category_id,`service_available`) values (?,?)");
			$stmt->bind_param("ii",$id, $key);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}	
			
		function addProfessionalSubCategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$full_name=	htmlentities($_POST['category_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$description=	htmlentities($_POST['product_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['inclusion_type_detail']=substr($_POST['inclusion_type_detail'],0,-1);
			if($_POST['flow_url']=='')
			{
				$_POST['flow_url']="#";
			}
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_service_subcategory`(user_licence_required,flow_url,display_name_allowed,property_information_required,service_available_for,`subcategory_name`,professional_category_id,professional_description) values (?,?,?,?,?,?,?,?)");
			$stmt->bind_param("isiissis",$_POST['user_licence_required'],$_POST['flow_url'],$_POST['display_name'],$_POST['property_information_required'],$_POST['inclusion_type_detail'], $full_name,$catg_id,$description);
			$stmt->execute();
			$id=$stmt->insert_id;
			
			$company_id=601907;
			$st=0;
			$st2=2;
			$stmt = $dbCon->prepare("insert into dishes_detail_information(professional_category_id,professional_subcategory_id,  created_on, modified_on,company_id,dish_name,dish_price,is_physical,dish_type)values(?,?,now(),now(),?,?,?,?,?)");
		
			$stmt->bind_param("iiisiii",$catg_id,$id,$company_id,$full_name,$st,$st2,$st2);
			$stmt->execute();
			
			$a=explode(',',$_POST['inclusion_type_detail']);
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_service_subcategory_available`(subcategory_id,`availablity_type`) values (?,?)");
			$stmt->bind_param("ii",$id, $key);
			$stmt->execute();	
			}
			if($catg_id==9)
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`landloard_ticket_subtitle_new`(`subcategory_name`) values (?)");
			$stmt->bind_param("s", $full_name);
			$stmt->execute();
			$id1=$stmt->insert_id;	
			
			$stmt = $dbCon->prepare("update `qloudid`.`professional_service_subcategory` set landloard_ticket_subtitle_id=? where id=?");
			$stmt->bind_param("ii", $id1,$id);
			$stmt->execute();
			
			for($i=1;$i<=3;$i++)
			{
				$tast='Task'.$i;
				$stmt = $dbCon->prepare("insert into `qloudid`.`landloard_ticket_subtitle_repair_issue`(home_repair_issue,landloard_ticket_subtitle_id) values (?,?)");
				$stmt->bind_param("si", $task,$id1);
				$stmt->execute();
			}
			
			
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}		
		
		
		function updateProfessionalSubCategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$full_name=	htmlentities($_POST['category_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$description=	htmlentities($_POST['product_information'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['inclusion_type_detail']=substr($_POST['inclusion_type_detail'],0,-1);
			
			if($_POST['flow_url']=='')
			{
				$_POST['flow_url']="#";
			}
			
			$stmt = $dbCon->prepare("update `qloudid`.`professional_service_subcategory` set user_licence_required=?,flow_url=?,display_name_allowed=?,property_information_required=?,service_available_for=?,`subcategory_name`=?,professional_description=?,is_service_active=? where id=?");
			$stmt->bind_param("isiisssii",$_POST['user_licence_required'],$_POST['flow_url'],$_POST['display_name'],$_POST['property_information_required'],$_POST['inclusion_type_detail'], $full_name,$description,$_POST['is_service_active'],$subcatg_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("delete from `qloudid`.`professional_service_subcategory_available` where subcategory_id=?");
			$stmt->bind_param("i",$subcatg_id);
			$stmt->execute();
			
			if($_POST['is_service_active']==0)
			{
			$stmt = $dbCon->prepare("update professional_marketplace_service_todos set is_selected=0 where professional_subcategory_id=?");
			$stmt->bind_param("i",$subcatg_id);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=0 where professional_subcategory_id=?");
			$stmt->bind_param("i",$subcatg_id);
			$stmt->execute();	
			
			}
			
			$a=explode(',',$_POST['inclusion_type_detail']);
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`professional_service_subcategory_available`(subcategory_id,`availablity_type`) values (?,?)");
			$stmt->bind_param("ii",$subcatg_id, $key);
			$stmt->execute();	
			}
			if($catg_id==9)
			{
			$stmt = $dbCon->prepare("update `qloudid`.`landloard_ticket_subtitle_new` set `subcategory_name`=? where id=(select landloard_ticket_subtitle_id from professional_service_subcategory where id=?)");
			$stmt->bind_param("si", $full_name,$subcatg_id);
			$stmt->execute();
			
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
		}		
			
		
		
		
		function professionalSubCategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=? and is_deleted=0 order by subcategory_name");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($rowCategory = $result->fetch_assoc())
			{
			$rowCategory['enc']=$this->encrypt_decrypt('encrypt',$rowCategory['id']);
			array_push($org,$rowCategory);
			}
			 
				$stmt->close();
				$dbCon->close();
				return $org;	
			}
			
			function professionalSubCategoryInclusionDetail($data)
			{ 
		
			$dbCon = AppModel::createConnection();
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory_available where subcategory_id=?");
			$stmt->bind_param("i", $subcatg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$inclusion='';
			while($rowCategory = $result->fetch_assoc())
			{
				 
			$inclusion=$inclusion.$rowCategory['availablity_type'].',';
			}
				$stmt->close();
				$dbCon->close();
				return $inclusion;	
			}
		function selectedProfessionalSubCategoryDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $catg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCategory = $result->fetch_assoc();
			$filename="../estorecss/".$rowCategory ['subcategory_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowCategory ['subcategory_image'].".txt"); $rowCategory ['subcategory_image']=str_replace('"','',$value_a);  } 
			
			
			$stmt->close();
			$dbCon->close();
			return $rowCategory;	
			}
			
			
			
		function addImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$catg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			$stmt = $dbCon->prepare("update  professional_service_subcategory set subcategory_image=? where id=?");
			$stmt->bind_param("si",$img_name1, $catg_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			
		
		function sendJobRequestInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id= $this -> encrypt_decrypt('decrypt',$data['job_id']);
			$_POST['selected_companies']=substr($_POST['selected_companies'],0,-1);
			
			$stmt = $dbCon->prepare("select category_id,subcategory_id,domain_id from user_professional_service_request where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowSubcategory = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_professional_service_request set selected_qualified_companies=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST['selected_companies'],$job_id);
			$stmt->execute();
			$a=explode(',',$_POST['selected_companies']);
			
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into `qloudid`.`user_professional_service_request_company_info`(  `job_id`  , `company_id`  , `assigned_on`) values (?,?,now())");
			$stmt->bind_param("ii", $job_id,$key);
			$stmt->execute();
			$stmt = $dbCon->prepare("select company_email from companies where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['company_email'] = $row['company_email'];
			$data['job_id']=$job_id;
			$data['domain_id']=$this->encrypt_decrypt('encrypt',$rowSubcategory['domain_id']);
			$data['jid']=$this->encrypt_decrypt('encrypt',$job_id);
			$data['cid']=$this->encrypt_decrypt('encrypt',$key);
			if($rowSubcategory['category_id']==1)
			{
			if($rowSubcategory['subcategory_id']==1)
			{
				$this->movingCleaningEmail($data);
			}
			else if($rowSubcategory['subcategory_id']==2)
			{
				$this->homeCleaningEmail($data);
			} 
			else if($rowSubcategory['subcategory_id']==3)
			{
				$this->windowCleaningEmail($data);
			}
			else
			{
				$this->commonTicketEmail($data);
			}
			}
			else if($rowSubcategory['category_id']==9)
			{
				$this->homeRepairEmail($data);
			}
			else
			{
				$this->commonTicketEmail($data);
			}
			}
			$stmt->close();
			$dbCon->close();
			return 1;	
			
		}
		
		function displayYesNo($data)
		{
			if($data==1)
				return 'Yes';
			else if($data==0)
			{
				return 'No';
			}
			else if($data==2)
			{
				return 'Dont know';
			}
			else
			{
			return 'I am not sure';	
			}
		}
		
			function shortTermRentTicketEmail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select property_nickname,address,port_number,city,zipcode,apartment_property_type.property_type,category_id  ,subcategory_id  ,start_date   ,end_date   ,property_type_detail   ,floor_area   ,total_rooms   ,total_bathrooms  ,inclusion_type_detail  ,material_info_detail   ,furniture_info_detail   ,price_info  ,product_information ,carried_for  ,begin_info    ,pcountry   ,p_number   ,conatct_preffered_on   ,user_professional_service_request.created_on   ,cleaning_type   ,how_often  ,pets_available ,additional_services  ,type_of_window   ,total_window  ,pages_info_detail  ,frame_info_detail  ,exposure_info_detail  ,reachable_info_detail  ,total_properties   ,garbage_removal_required   ,user_property_id   ,selected_qualified_companies,subcategory_name  from user_professional_service_request left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join apartment_property_type on apartment_property_type.id= user_professional_service_request.property_type_detail left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $data['job_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			
			 
			
			if($row['carried_for']==1)
			{
				$row['carried_for']='Private person';
			}
			else if($row['carried_for']==2)
			{
				$row['carried_for']='Company';
			}
			else if($row['carried_for']==3)
			{
				$row['carried_for']='Community';
			}
			else  
			{
				$row['carried_for']='Goverment';
			}
			
			
			
			if($row['begin_info']==1)
			{
				$row['begin_info']='As soon as possible';
			}
			else if($row['begin_info']==3)
			{
				$row['begin_info']='Within 1 month';
			}
			else if($row['begin_info']==4)
			{
				$row['begin_info']='Within 3 months';
			}
			else if($row['begin_info']==5)
			{
				$row['begin_info']='Within 6 months';
			}
			else if($row['begin_info']==6)
			{
				$row['begin_info']='Within 12 months';
			}
			else  
			{
				$row['begin_info']='Timing less important';
			}
			
			$emailContent='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
				<body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;"><h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">Pickapro</h1></td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">'.$row['subcategory_name'].'</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                                                                         
 
 
 
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Building type</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['property_type'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 

 
 
 


 
 
 


 
 
 


 
 
 
																		

 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

 
 
 
 
 
 
 
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">The assignment must be carried out for</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['carried_for'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">When will the assignment begin</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['begin_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

    
                  
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/projectPriceBidInfo/'.$data['cid'].'/'.$data['jid'].'/'.$data['domain_id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Bid project</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  
                
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Cancellation policy
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time.<span>&nbsp;</span></span>
                                                                            <span>You can always transfer your reservation to another person.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Questions?
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            If you have questions about your reservation, contact us at&nbsp;<span>&nbsp;</span><a></a>or by calling<span>&nbsp;</span>
                                                                            <a href="tel:+=" target="_blank">+201 34534534</a>.
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
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            © 2019 TOCK, INC.
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            ALL RIGHTS RESERVED
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    

</body></html>';

			$to            = $data['company_email'];
			$subject       = "Premium Qualified Job request received!";
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		
		function commonTicketEmail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select property_nickname,address,port_number,city,zipcode,apartment_property_type.property_type,category_id  ,subcategory_id  ,start_date   ,end_date   ,property_type_detail   ,floor_area   ,total_rooms   ,total_bathrooms  ,inclusion_type_detail  ,material_info_detail   ,furniture_info_detail   ,price_info  ,product_information ,carried_for  ,begin_info    ,pcountry   ,p_number   ,conatct_preffered_on   ,user_professional_service_request.created_on   ,cleaning_type   ,how_often  ,pets_available ,additional_services  ,type_of_window   ,total_window  ,pages_info_detail  ,frame_info_detail  ,exposure_info_detail  ,reachable_info_detail  ,total_properties   ,garbage_removal_required   ,user_property_id   ,selected_qualified_companies,subcategory_name  from user_professional_service_request left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join apartment_property_type on apartment_property_type.id= user_professional_service_request.property_type_detail left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $data['job_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			
			 
			
			if($row['carried_for']==1)
			{
				$row['carried_for']='Private person';
			}
			else if($row['carried_for']==2)
			{
				$row['carried_for']='Company';
			}
			else if($row['carried_for']==3)
			{
				$row['carried_for']='Community';
			}
			else  
			{
				$row['carried_for']='Goverment';
			}
			
			
			
			if($row['begin_info']==1)
			{
				$row['begin_info']='As soon as possible';
			}
			else if($row['begin_info']==3)
			{
				$row['begin_info']='Within 1 month';
			}
			else if($row['begin_info']==4)
			{
				$row['begin_info']='Within 3 months';
			}
			else if($row['begin_info']==5)
			{
				$row['begin_info']='Within 6 months';
			}
			else if($row['begin_info']==6)
			{
				$row['begin_info']='Within 12 months';
			}
			else  
			{
				$row['begin_info']='Timing less important';
			}
			
			$emailContent='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
				<body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;"><h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">Pickapro</h1></td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">'.$row['subcategory_name'].'</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">Service description</span><span>&nbsp;</span><br>




<p>'.$row['product_information'].'</p>

</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="border-collapse: collapse; display: table-cell;">
                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="left" width="100%" style="
                                                                                                            border-collapse: collapse;
                                                                                                            display: table-cell;
                                                                                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                            font-weight: 400;
                                                                                                            font-size: 16px;
                                                                                                            line-height: 25px;
                                                                                                            color: rgb(79, 79, 101);
                                                                                                        ">
                                                                                                        <span style="
                                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 600;
                                                                                                                vertical-align: middle;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 24px;
                                                                                                                color: rgb(35, 35, 62);
                                                                                                            ">'.$row['property_nickname'].'</span>
                                                                                                        <br>
                                                                                                        '.$row['address'].' '.$row['port_number'].'<br>
                                                                                                        '.$row['city'].'<span>&nbsp;</span>
                                                                                                        <br>
                                                                                                        <a href="https://www.google.com/maps/dir//Brunkebergstorg%209/" style="
                                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 400;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 21px;
                                                                                                                text-decoration: underline;
                                                                                                                color: rgb(32, 32, 192);
                                                                                                            " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.google.com/maps/dir//Brunkebergstorg%25209/&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw3pvtMMgmElE3NrJXWhXVZf">
                                                                                                            Get directions
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                                                        <a href="https://click.pstmrk.it/3s/www.google.com%2Fmaps%2Fdir%2F%2F1350%2BW%2BRandolph%252C%2BChicago%252C%2BIL%252C%2BUS%2B60607%2F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.google.com%252Fmaps%252Fdir%252F%252F1350%252BW%252BRandolph%25252C%252BChicago%25252C%252BIL%25252C%252BUS%252B60607%252F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw2XVxlEclvj8RQCAQEpY-KU">
                                                                                                            <img width="230" height="auto" alt="Map of Love" src="https://ci5.googleusercontent.com/proxy/bEoUffR0vw8NUABf3Frkl1iFpS0yjaU2pLyEphhR14w3wKNiPIP7UlhX04VfvGYpF8bieAcaw1A7ozwGJGJpTZEW3zl_hdCaHHwhYM_8zjmxGx-Pxpk97TLA8ZNZdNXUIwHQGweB62F5jVv5xJJ3Wa9E9slE8WRzS1_j98_ntM66pOsFo1GJqprQmYH-3L27SHH44nzNoTWIyR9XtcUarENFnAfZacfNylTPMbmx2_Z1c6D4VpB_hhlZ53JqIwTkmtf93XLsPazUmrIr0pEN3nEUY2x8MZ-0rewzankXeUqWdpbYQ1R6R1leWZYqFjokuLP87BQJ-KMROv-HmQPdDVVaPyatABbd2Guayi7PvDiJG0kgd7Wrr3gKXBTKWLZ9_W2_QfIubsKa-O7khDp5KyAptVQkIO3I1B55FG65s2E3o8dhWefC7mpVdxDvZ0odrGs-817KPB8rrzZkvV_nadul2u9x6zA7ZMVi5MwybybNA6RSZ6LgT4UwUlT2uY60p-NfbBYKlnHIE3QUmn6LX2oi-OMsKcmR2IpOmfPZhe_uzBrb0QDdIhHWK-Kg2NWeP5aX__Kb7meNU_5fTooD8qCn9NsNkN2zMUo9H8MAz4B6Guu-jN7bGdDNyrpvcmmq5K5XP1Ec29Fav0H547gb4sASoygA8OdKPpgfcY-f6Ry-yt1e9IlL3Ui9WaAA6bEpQiNl6fRbgbvrFK7bVA5n98S-E5CLTNPAWYY72YHmIRrLi8pzrbJYGeQ-CW5LdDqYjOKcEFg1hvg_Qv7nYBPv4N_OqrZIuJuKvp6qQDhaGW2F-09dnHhwXz5QS0lyfXLefyGrYCmfrBPDrmdgmeeamWRUL8iCxe4TCpI3_QU6N53VQ7BrckGvuPR_7uK00XNdyIq8V25Uwygzs8czShruGSH2eTvYnRJu-pDrr936yegZncHsPCeSNYEDyXZmGbNhRagbpp6bdqegHim5hW67jMdl7V0oyUvMxyNdAhPRg2vG5_Y0gnflPywhdatHDF6Rie3Se6PRk1PqRdoCQT6UVhSfdpmWRKJeU9QxGDqj5G1zP88zZh-Zs44w3PPR3GMja0yPFnU71NFotzZSLaFqToOpBhKmqUe2LULDR2JU5NRCdgX-ororbxOoTaE95gMN98fmAU5UsgL7BERhBDD2Qy6BWObhzz6JmdSqpKM-LEIDF7GugFTvZOSshEb-Gxd7_ms2wfFLpEL-_Fu48z2wcWKokdBXR3FNh3qJf9tyRhgabmqSXaGUiPE-gaCRSUE-QJysyn2PyCh5SxDfGbL9-BovAc9FSddq9Ow83C2ZI5k1oQCFTHPIbXYIZ8AmosBLxXtNCU0kRnlXCq3PObQ02JN8EIfSsKNMoz4lU54FAd1yieGT6fq-ewx4L4jTEa01WKwMzqbzFzFa3S8W4F4D6eYPIQXixJeVCNquhJtJYz4CZ3fXw5SMFw22ykAUha0C0nU-oNrNpTlaVbure3-kbmgqhwlkskEauwjZHhFMkHkHbYQG19hIrRlCARtQDDsyJKZYb-2BWJl0r7x3txjGBSf0ZWv4V4dD0ZyPGvUD3zuZjjGoG_GdVINyQM8RlAyiBUbSvwegH7usE5XrdT8If09nsbshk5niv2X6w-Vbts-bs0L4xM1369bRpPjVAwnpX2MaSvbjvhsRd4f63n_I29kDJd2jj8otoORO-u_KQ-I6Ka_0lZ7EsNBSGsz2I4jd_8GAkTHrgXk7lqbScExf3Rp1DyxUD2K1tpp4JeWOiU_mMNA0Lu8xGccVoLkcGRuxbz9cJcdgMosEc2-CdD6ABrChe7SIYRdqrsobVOwwaeL2DYF0lETgHB7tppmJhhUPjvsNbFSRbEZ6TtLWFA2GfpmfE7FOnsvIunI6nPSrmq1rzqaH8a8=s0-d-e1-ft#https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCPd%2DxSabI7QOfKX5NxVVup6bPfcovwFiQ&amp;center=1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;size=300x200&amp;zoom=15&amp;scale=2&amp;format=png&amp;visual%5Frefresh=true&amp;markers=scale%3A2%7Cicon%3Ahttps%3A%2F%2Fstorage.googleapis.com%2Ftock%2Dpublic%2Dassets%2Fimages%2Demail%2Dtemplate%2Femail%2Dmap%2Dmarker.png%7Cshadow%3Afalse%7C1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x4b505b&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Ccolor%3A0xffffff%7Cvisibility%3Aon&amp;style=feature%3Aadministrative.land%5Fparcel%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Aall%7Cvisibility%3Aon&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Ageometry.fill%7Ccolor%3A0xe9e9eb&amp;style=feature%3Apoi%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Aroad%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff&amp;style=feature%3Aroad%7Celement%3Alabels.text.fill%7Ccolor%3A0x787c84&amp;style=feature%3Aroad%7Celement%3Alabels.icon%7Cvisibility%3Aoff&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffbe32&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffbe32&amp;style=feature%3Atransit%7Celement%3Alabels.text.fill%7Cvisibility%3Aon%7Ccolor%3A0x787c84&amp;style=feature%3Atransit.line%7Celement%3Ageometry.fill%7Ccolor%3A0xd2d4d6&amp;signature=3yCSyIXfsSilvB5wcd4OElw40QU=" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block; width: 230px;" class="CToWUd" data-bit="iit">
                                                                                                        </a>
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
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                                                                         
 
 
 
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Building type</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['property_type'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 

 
 
 


 
 
 


 
 
 


 
 
 
																		

 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

 
 
 
 
 
 
 
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">The assignment must be carried out for</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['carried_for'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">When will the assignment begin</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['begin_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

    
                  
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/projectPriceBidInfo/'.$data['cid'].'/'.$data['jid'].'/'.$data['domain_id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Bid project</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  
                
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Cancellation policy
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time.<span>&nbsp;</span></span>
                                                                            <span>You can always transfer your reservation to another person.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Questions?
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            If you have questions about your reservation, contact us at&nbsp;<span>&nbsp;</span><a></a>or by calling<span>&nbsp;</span>
                                                                            <a href="tel:+=" target="_blank">+201 34534534</a>.
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
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            © 2019 TOCK, INC.
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            ALL RIGHTS RESERVED
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    

</body></html>';

			$to            = $data['company_email'];
			$subject       = "Premium Qualified Job request received!";
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		
		function movingCleaningEmail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select property_nickname,address,port_number,city,zipcode,apartment_property_type.property_type,category_id  ,subcategory_id  ,start_date   ,end_date   ,property_type_detail   ,floor_area   ,total_rooms   ,total_bathrooms  ,inclusion_type_detail  ,material_info_detail   ,furniture_info_detail   ,price_info  ,product_information ,carried_for  ,begin_info    ,pcountry   ,p_number   ,conatct_preffered_on   ,user_professional_service_request.created_on   ,cleaning_type   ,how_often  ,pets_available ,additional_services  ,type_of_window   ,total_window  ,pages_info_detail  ,frame_info_detail  ,exposure_info_detail  ,reachable_info_detail  ,total_properties   ,garbage_removal_required   ,user_property_id   ,selected_qualified_companies,subcategory_name  from user_professional_service_request left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join apartment_property_type on apartment_property_type.id= user_professional_service_request.property_type_detail left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $data['job_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from cleaning_extra_inclusion where find_in_set(id,?)");
			$stmt->bind_param("s", $row['inclusion_type_detail']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$inclusion='';
			while($rowInclusion = $result1->fetch_assoc())
			{
				$inclusion=$inclusion.$rowInclusion['extra_inclusion'].', ';
			}
			$inclusion=substr($inclusion,0,-2);
			if($row['price_info']==1)
			{
				$row['price_info']='Fixed price';
			}
			else
			{
				$row['price_info']='Price per hour';
			}
			
			if($row['carried_for']==1)
			{
				$row['carried_for']='Private person';
			}
			else if($row['carried_for']==2)
			{
				$row['carried_for']='Company';
			}
			else if($row['carried_for']==3)
			{
				$row['carried_for']='Community';
			}
			else  
			{
				$row['carried_for']='Goverment';
			}
			
			
			
			if($row['begin_info']==1)
			{
				$row['begin_info']='As soon as possible';
			}
			else if($row['begin_info']==3)
			{
				$row['begin_info']='Within 1 month';
			}
			else if($row['begin_info']==4)
			{
				$row['begin_info']='Within 3 months';
			}
			else if($row['begin_info']==5)
			{
				$row['begin_info']='Within 6 months';
			}
			else if($row['begin_info']==6)
			{
				$row['begin_info']='Within 12 months';
			}
			else  
			{
				$row['begin_info']='Timing less important';
			}
			
			$emailContent='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
				<body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;"><h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">Pickapro</h1></td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">Moving cleaning</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">Service description</span><span>&nbsp;</span><br>




<p>None</p>

</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="border-collapse: collapse; display: table-cell;">
                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="left" width="100%" style="
                                                                                                            border-collapse: collapse;
                                                                                                            display: table-cell;
                                                                                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                            font-weight: 400;
                                                                                                            font-size: 16px;
                                                                                                            line-height: 25px;
                                                                                                            color: rgb(79, 79, 101);
                                                                                                        ">
                                                                                                        <span style="
                                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 600;
                                                                                                                vertical-align: middle;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 24px;
                                                                                                                color: rgb(35, 35, 62);
                                                                                                            ">'.$row['property_nickname'].'</span>
                                                                                                        <br>
                                                                                                        '.$row['address'].' '.$row['port_number'].'<br>
                                                                                                        '.$row['city'].'<span>&nbsp;</span>
                                                                                                        <br>
                                                                                                        <a href="https://www.google.com/maps/dir//Brunkebergstorg%209/" style="
                                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 400;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 21px;
                                                                                                                text-decoration: underline;
                                                                                                                color: rgb(32, 32, 192);
                                                                                                            " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.google.com/maps/dir//Brunkebergstorg%25209/&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw3pvtMMgmElE3NrJXWhXVZf">
                                                                                                            Get directions
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                                                        <a href="https://click.pstmrk.it/3s/www.google.com%2Fmaps%2Fdir%2F%2F1350%2BW%2BRandolph%252C%2BChicago%252C%2BIL%252C%2BUS%2B60607%2F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.google.com%252Fmaps%252Fdir%252F%252F1350%252BW%252BRandolph%25252C%252BChicago%25252C%252BIL%25252C%252BUS%252B60607%252F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw2XVxlEclvj8RQCAQEpY-KU">
                                                                                                            <img width="230" height="auto" alt="Map of Love" src="https://ci5.googleusercontent.com/proxy/bEoUffR0vw8NUABf3Frkl1iFpS0yjaU2pLyEphhR14w3wKNiPIP7UlhX04VfvGYpF8bieAcaw1A7ozwGJGJpTZEW3zl_hdCaHHwhYM_8zjmxGx-Pxpk97TLA8ZNZdNXUIwHQGweB62F5jVv5xJJ3Wa9E9slE8WRzS1_j98_ntM66pOsFo1GJqprQmYH-3L27SHH44nzNoTWIyR9XtcUarENFnAfZacfNylTPMbmx2_Z1c6D4VpB_hhlZ53JqIwTkmtf93XLsPazUmrIr0pEN3nEUY2x8MZ-0rewzankXeUqWdpbYQ1R6R1leWZYqFjokuLP87BQJ-KMROv-HmQPdDVVaPyatABbd2Guayi7PvDiJG0kgd7Wrr3gKXBTKWLZ9_W2_QfIubsKa-O7khDp5KyAptVQkIO3I1B55FG65s2E3o8dhWefC7mpVdxDvZ0odrGs-817KPB8rrzZkvV_nadul2u9x6zA7ZMVi5MwybybNA6RSZ6LgT4UwUlT2uY60p-NfbBYKlnHIE3QUmn6LX2oi-OMsKcmR2IpOmfPZhe_uzBrb0QDdIhHWK-Kg2NWeP5aX__Kb7meNU_5fTooD8qCn9NsNkN2zMUo9H8MAz4B6Guu-jN7bGdDNyrpvcmmq5K5XP1Ec29Fav0H547gb4sASoygA8OdKPpgfcY-f6Ry-yt1e9IlL3Ui9WaAA6bEpQiNl6fRbgbvrFK7bVA5n98S-E5CLTNPAWYY72YHmIRrLi8pzrbJYGeQ-CW5LdDqYjOKcEFg1hvg_Qv7nYBPv4N_OqrZIuJuKvp6qQDhaGW2F-09dnHhwXz5QS0lyfXLefyGrYCmfrBPDrmdgmeeamWRUL8iCxe4TCpI3_QU6N53VQ7BrckGvuPR_7uK00XNdyIq8V25Uwygzs8czShruGSH2eTvYnRJu-pDrr936yegZncHsPCeSNYEDyXZmGbNhRagbpp6bdqegHim5hW67jMdl7V0oyUvMxyNdAhPRg2vG5_Y0gnflPywhdatHDF6Rie3Se6PRk1PqRdoCQT6UVhSfdpmWRKJeU9QxGDqj5G1zP88zZh-Zs44w3PPR3GMja0yPFnU71NFotzZSLaFqToOpBhKmqUe2LULDR2JU5NRCdgX-ororbxOoTaE95gMN98fmAU5UsgL7BERhBDD2Qy6BWObhzz6JmdSqpKM-LEIDF7GugFTvZOSshEb-Gxd7_ms2wfFLpEL-_Fu48z2wcWKokdBXR3FNh3qJf9tyRhgabmqSXaGUiPE-gaCRSUE-QJysyn2PyCh5SxDfGbL9-BovAc9FSddq9Ow83C2ZI5k1oQCFTHPIbXYIZ8AmosBLxXtNCU0kRnlXCq3PObQ02JN8EIfSsKNMoz4lU54FAd1yieGT6fq-ewx4L4jTEa01WKwMzqbzFzFa3S8W4F4D6eYPIQXixJeVCNquhJtJYz4CZ3fXw5SMFw22ykAUha0C0nU-oNrNpTlaVbure3-kbmgqhwlkskEauwjZHhFMkHkHbYQG19hIrRlCARtQDDsyJKZYb-2BWJl0r7x3txjGBSf0ZWv4V4dD0ZyPGvUD3zuZjjGoG_GdVINyQM8RlAyiBUbSvwegH7usE5XrdT8If09nsbshk5niv2X6w-Vbts-bs0L4xM1369bRpPjVAwnpX2MaSvbjvhsRd4f63n_I29kDJd2jj8otoORO-u_KQ-I6Ka_0lZ7EsNBSGsz2I4jd_8GAkTHrgXk7lqbScExf3Rp1DyxUD2K1tpp4JeWOiU_mMNA0Lu8xGccVoLkcGRuxbz9cJcdgMosEc2-CdD6ABrChe7SIYRdqrsobVOwwaeL2DYF0lETgHB7tppmJhhUPjvsNbFSRbEZ6TtLWFA2GfpmfE7FOnsvIunI6nPSrmq1rzqaH8a8=s0-d-e1-ft#https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCPd%2DxSabI7QOfKX5NxVVup6bPfcovwFiQ&amp;center=1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;size=300x200&amp;zoom=15&amp;scale=2&amp;format=png&amp;visual%5Frefresh=true&amp;markers=scale%3A2%7Cicon%3Ahttps%3A%2F%2Fstorage.googleapis.com%2Ftock%2Dpublic%2Dassets%2Fimages%2Demail%2Dtemplate%2Femail%2Dmap%2Dmarker.png%7Cshadow%3Afalse%7C1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x4b505b&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Ccolor%3A0xffffff%7Cvisibility%3Aon&amp;style=feature%3Aadministrative.land%5Fparcel%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Aall%7Cvisibility%3Aon&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Ageometry.fill%7Ccolor%3A0xe9e9eb&amp;style=feature%3Apoi%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Aroad%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff&amp;style=feature%3Aroad%7Celement%3Alabels.text.fill%7Ccolor%3A0x787c84&amp;style=feature%3Aroad%7Celement%3Alabels.icon%7Cvisibility%3Aoff&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffbe32&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffbe32&amp;style=feature%3Atransit%7Celement%3Alabels.text.fill%7Cvisibility%3Aon%7Ccolor%3A0x787c84&amp;style=feature%3Atransit.line%7Celement%3Ageometry.fill%7Ccolor%3A0xd2d4d6&amp;signature=3yCSyIXfsSilvB5wcd4OElw40QU=" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block; width: 230px;" class="CToWUd" data-bit="iit">
                                                                                                        </a>
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
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                                                                         <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Assignment period</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['start_date'].' - '.$row['end_date'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Building type</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['property_type'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Floor area</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['floor_area'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Total rooms</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['total_rooms'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Total bathrooms</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['total_bathrooms'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">What do you want to be included in your cleaning task?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$inclusion.'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
																		
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Will cleaning materials be available?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$this->displayYesNo($row['material_info_detail']).'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Will there be furniture left in the home at the time of cleaning?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$this->displayYesNo($row['furniture_info_detail']).'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do you want a fixed price or a price per hour?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['price_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">The assignment must be carried out for</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['carried_for'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">When will the assignment begin</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['begin_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

    
                  
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/projectPriceBidInfo/'.$data['cid'].'/'.$data['jid'].'/'.$data['domain_id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Bid project</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  
                
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Cancellation policy
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time.<span>&nbsp;</span></span>
                                                                            <span>You can always transfer your reservation to another person.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Questions?
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            If you have questions about your reservation, contact us at&nbsp;<span>&nbsp;</span><a></a>or by calling<span>&nbsp;</span>
                                                                            <a href="tel:+=" target="_blank">+201 34534534</a>.
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
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            © 2019 TOCK, INC.
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            ALL RIGHTS RESERVED
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    

</body></html>';

			$to            = $data['company_email'];
			$subject       = "Premium Qualified Job request received!";
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		function homeCleaningEmail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select property_nickname,address,port_number,city,zipcode,apartment_property_type.property_type,category_id  ,subcategory_id  ,start_date   ,end_date   ,property_type_detail   ,floor_area   ,total_rooms   ,total_bathrooms  ,inclusion_type_detail  ,material_info_detail   ,furniture_info_detail   ,price_info  ,product_information ,carried_for  ,begin_info    ,pcountry   ,p_number   ,conatct_preffered_on   ,user_professional_service_request.created_on   ,cleaning_type   ,how_often  ,pets_available ,additional_services  ,type_of_window   ,total_window  ,pages_info_detail  ,frame_info_detail  ,exposure_info_detail  ,reachable_info_detail  ,total_properties   ,garbage_removal_required   ,user_property_id   ,selected_qualified_companies,subcategory_name  from user_professional_service_request left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join apartment_property_type on apartment_property_type.id= user_professional_service_request.property_type_detail left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $data['job_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from cleaning_extra_inclusion where find_in_set(id,?)");
			$stmt->bind_param("s", $row['inclusion_type_detail']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$inclusion='';
			while($rowInclusion = $result1->fetch_assoc())
			{
				 
				$inclusion=$inclusion.$rowInclusion['extra_inclusion'].', ';
			}
			$inclusion=substr($inclusion,0,-2);
			
			
			if($row['cleaning_type']==1)
			{
				$row['cleaning_type']='Ongoing house cleaning';
			}
			else
			{
				$row['cleaning_type']='A cleaning opportunity';
			}
			
			if($row['price_info']==1)
			{
				$row['price_info']='Fixed price';
			}
			else
			{
				$row['price_info']='Price per hour';
			}
			
			if($row['carried_for']==1)
			{
				$row['carried_for']='Private person';
			}
			else if($row['carried_for']==2)
			{
				$row['carried_for']='Company';
			}
			else if($row['carried_for']==3)
			{
				$row['carried_for']='Community';
			}
			else  
			{
				$row['carried_for']='Goverment';
			}
			
			
			$additiona_service='';
			$a=explode(',',$row['additional_services']);
			foreach($a as $adService)
			{
			if($adService==1)
			{
				$additiona_service=$additiona_service.'Washing clothes, ';
			}
			else if($adService==2)
			{
				$additiona_service=$additiona_service.'Ironing, ';
			}
			else if($adService==3)
			{
				$additiona_service=$additiona_service.'Change of bed linen, ';
			}	
			}
			
			$additiona_service=substr($additiona_service,0,-2);
			
			if($row['begin_info']==1)
			{
				$row['begin_info']='As soon as possible';
			}
			else if($row['begin_info']==3)
			{
				$row['begin_info']='Within 1 month';
			}
			else if($row['begin_info']==4)
			{
				$row['begin_info']='Within 3 months';
			}
			else if($row['begin_info']==5)
			{
				$row['begin_info']='Within 6 months';
			}
			else if($row['begin_info']==6)
			{
				$row['begin_info']='Within 12 months';
			}
			else  
			{
				$row['begin_info']='Timing less important';
			}
			
			$emailContent='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
    <body>
     
    
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;"><h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">Pickapro</h1></td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">'.$row['subcategory_name'].'</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">Service description</span><span>&nbsp;</span><br>'.$row['product_information'].'</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="border-collapse: collapse; display: table-cell;">
                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="left" width="100%" style="
                                                                                                            border-collapse: collapse;
                                                                                                            display: table-cell;
                                                                                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                            font-weight: 400;
                                                                                                            font-size: 16px;
                                                                                                            line-height: 25px;
                                                                                                            color: rgb(79, 79, 101);
                                                                                                        ">
                                                                                                        <span style="
                                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 600;
                                                                                                                vertical-align: middle;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 24px;
                                                                                                                color: rgb(35, 35, 62);
                                                                                                            ">'.$row['property_nickname'].'</span>
                                                                                                        <br>'.$row['address'].' '.$row['port_number'].'<br>'.$row['city'].'<span>&nbsp;</span>
                                                                                                        
                                                                                                        <br>
                                                                                                        <a href="https://www.google.com/maps/dir//Brunkebergstorg%209/" style="
                                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 400;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 21px;
                                                                                                                text-decoration: underline;
                                                                                                                color: rgb(32, 32, 192);
                                                                                                            " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.google.com/maps/dir//Brunkebergstorg%25209/&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw3pvtMMgmElE3NrJXWhXVZf">
                                                                                                            Get directions
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                                                        <a href="https://click.pstmrk.it/3s/www.google.com%2Fmaps%2Fdir%2F%2F1350%2BW%2BRandolph%252C%2BChicago%252C%2BIL%252C%2BUS%2B60607%2F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.google.com%252Fmaps%252Fdir%252F%252F1350%252BW%252BRandolph%25252C%252BChicago%25252C%252BIL%25252C%252BUS%252B60607%252F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw2XVxlEclvj8RQCAQEpY-KU">
                                                                                                            <img width="230" height="auto" alt="Map of Love" src="https://ci5.googleusercontent.com/proxy/bEoUffR0vw8NUABf3Frkl1iFpS0yjaU2pLyEphhR14w3wKNiPIP7UlhX04VfvGYpF8bieAcaw1A7ozwGJGJpTZEW3zl_hdCaHHwhYM_8zjmxGx-Pxpk97TLA8ZNZdNXUIwHQGweB62F5jVv5xJJ3Wa9E9slE8WRzS1_j98_ntM66pOsFo1GJqprQmYH-3L27SHH44nzNoTWIyR9XtcUarENFnAfZacfNylTPMbmx2_Z1c6D4VpB_hhlZ53JqIwTkmtf93XLsPazUmrIr0pEN3nEUY2x8MZ-0rewzankXeUqWdpbYQ1R6R1leWZYqFjokuLP87BQJ-KMROv-HmQPdDVVaPyatABbd2Guayi7PvDiJG0kgd7Wrr3gKXBTKWLZ9_W2_QfIubsKa-O7khDp5KyAptVQkIO3I1B55FG65s2E3o8dhWefC7mpVdxDvZ0odrGs-817KPB8rrzZkvV_nadul2u9x6zA7ZMVi5MwybybNA6RSZ6LgT4UwUlT2uY60p-NfbBYKlnHIE3QUmn6LX2oi-OMsKcmR2IpOmfPZhe_uzBrb0QDdIhHWK-Kg2NWeP5aX__Kb7meNU_5fTooD8qCn9NsNkN2zMUo9H8MAz4B6Guu-jN7bGdDNyrpvcmmq5K5XP1Ec29Fav0H547gb4sASoygA8OdKPpgfcY-f6Ry-yt1e9IlL3Ui9WaAA6bEpQiNl6fRbgbvrFK7bVA5n98S-E5CLTNPAWYY72YHmIRrLi8pzrbJYGeQ-CW5LdDqYjOKcEFg1hvg_Qv7nYBPv4N_OqrZIuJuKvp6qQDhaGW2F-09dnHhwXz5QS0lyfXLefyGrYCmfrBPDrmdgmeeamWRUL8iCxe4TCpI3_QU6N53VQ7BrckGvuPR_7uK00XNdyIq8V25Uwygzs8czShruGSH2eTvYnRJu-pDrr936yegZncHsPCeSNYEDyXZmGbNhRagbpp6bdqegHim5hW67jMdl7V0oyUvMxyNdAhPRg2vG5_Y0gnflPywhdatHDF6Rie3Se6PRk1PqRdoCQT6UVhSfdpmWRKJeU9QxGDqj5G1zP88zZh-Zs44w3PPR3GMja0yPFnU71NFotzZSLaFqToOpBhKmqUe2LULDR2JU5NRCdgX-ororbxOoTaE95gMN98fmAU5UsgL7BERhBDD2Qy6BWObhzz6JmdSqpKM-LEIDF7GugFTvZOSshEb-Gxd7_ms2wfFLpEL-_Fu48z2wcWKokdBXR3FNh3qJf9tyRhgabmqSXaGUiPE-gaCRSUE-QJysyn2PyCh5SxDfGbL9-BovAc9FSddq9Ow83C2ZI5k1oQCFTHPIbXYIZ8AmosBLxXtNCU0kRnlXCq3PObQ02JN8EIfSsKNMoz4lU54FAd1yieGT6fq-ewx4L4jTEa01WKwMzqbzFzFa3S8W4F4D6eYPIQXixJeVCNquhJtJYz4CZ3fXw5SMFw22ykAUha0C0nU-oNrNpTlaVbure3-kbmgqhwlkskEauwjZHhFMkHkHbYQG19hIrRlCARtQDDsyJKZYb-2BWJl0r7x3txjGBSf0ZWv4V4dD0ZyPGvUD3zuZjjGoG_GdVINyQM8RlAyiBUbSvwegH7usE5XrdT8If09nsbshk5niv2X6w-Vbts-bs0L4xM1369bRpPjVAwnpX2MaSvbjvhsRd4f63n_I29kDJd2jj8otoORO-u_KQ-I6Ka_0lZ7EsNBSGsz2I4jd_8GAkTHrgXk7lqbScExf3Rp1DyxUD2K1tpp4JeWOiU_mMNA0Lu8xGccVoLkcGRuxbz9cJcdgMosEc2-CdD6ABrChe7SIYRdqrsobVOwwaeL2DYF0lETgHB7tppmJhhUPjvsNbFSRbEZ6TtLWFA2GfpmfE7FOnsvIunI6nPSrmq1rzqaH8a8=s0-d-e1-ft#https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCPd%2DxSabI7QOfKX5NxVVup6bPfcovwFiQ&amp;center=1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;size=300x200&amp;zoom=15&amp;scale=2&amp;format=png&amp;visual%5Frefresh=true&amp;markers=scale%3A2%7Cicon%3Ahttps%3A%2F%2Fstorage.googleapis.com%2Ftock%2Dpublic%2Dassets%2Fimages%2Demail%2Dtemplate%2Femail%2Dmap%2Dmarker.png%7Cshadow%3Afalse%7C1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x4b505b&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Ccolor%3A0xffffff%7Cvisibility%3Aon&amp;style=feature%3Aadministrative.land%5Fparcel%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Aall%7Cvisibility%3Aon&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Ageometry.fill%7Ccolor%3A0xe9e9eb&amp;style=feature%3Apoi%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Aroad%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff&amp;style=feature%3Aroad%7Celement%3Alabels.text.fill%7Ccolor%3A0x787c84&amp;style=feature%3Aroad%7Celement%3Alabels.icon%7Cvisibility%3Aoff&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffbe32&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffbe32&amp;style=feature%3Atransit%7Celement%3Alabels.text.fill%7Cvisibility%3Aon%7Ccolor%3A0x787c84&amp;style=feature%3Atransit.line%7Celement%3Ageometry.fill%7Ccolor%3A0xd2d4d6&amp;signature=3yCSyIXfsSilvB5wcd4OElw40QU=" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block; width: 230px;" class="CToWUd" data-bit="iit">
                                                                                                        </a>
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
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                                                                         
 
 
 
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Building type</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['property_type'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Floor area</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['floor_area'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">What type of cleaning service is desired?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['cleaning_type'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>


 
 
 

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">What do you want to be included in your cleaning task?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$inclusion.'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
																		
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">What additional services do you want?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$additiona_service.'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Will cleaning materials be available?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$this->displayYesNo($row['material_info_detail']).'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do you have pets in the home?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$this->displayYesNo($row['pets_available']).'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do you want a fixed price or a price per hour?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['price_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">The assignment must be carried out for</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['carried_for'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">When will the assignment begin</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['begin_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/projectPriceBidInfo/'.$data['cid'].'/'.$data['jid'].'/'.$data['domain_id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Bid project</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Cancellation policy
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time.<span>&nbsp;</span></span>
                                                                            <span>You can always transfer your reservation to another person.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Questions?
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            If you have questions about your reservation, contact us at&nbsp;<span>&nbsp;</span><a></a>or by calling<span>&nbsp;</span>
                                                                            <a href="tel:+=" target="_blank">+201 34534534</a>.
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
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            © 2019 TOCK, INC.
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            ALL RIGHTS RESERVED
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    


    

</body></html>';
			
			$to            = $data['company_email'];
			$subject       = "Premium Qualified Job request received!";
			 
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		function windowCleaningEmail($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select property_nickname,address,port_number,city,zipcode,apartment_property_type.property_type,category_id  ,subcategory_id  ,start_date   ,end_date   ,property_type_detail   ,floor_area   ,total_rooms   ,total_bathrooms  ,inclusion_type_detail  ,material_info_detail   ,furniture_info_detail   ,price_info  ,product_information ,carried_for  ,begin_info    ,pcountry   ,p_number   ,conatct_preffered_on   ,user_professional_service_request.created_on   ,cleaning_type   ,how_often  ,pets_available ,additional_services  ,type_of_window   ,total_window  ,pages_info_detail  ,frame_info_detail  ,exposure_info_detail  ,reachable_info_detail  ,total_properties   ,garbage_removal_required   ,user_property_id   ,selected_qualified_companies,subcategory_name  from user_professional_service_request left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join apartment_property_type on apartment_property_type.id= user_professional_service_request.property_type_detail left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $data['job_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from cleaning_extra_inclusion where find_in_set(id,?)");
			$stmt->bind_param("s", $row['inclusion_type_detail']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$inclusion='';
			while($rowInclusion = $result1->fetch_assoc())
			{
				 
				$inclusion=$inclusion.$rowInclusion['extra_inclusion'].',';
			}
			$inclusion=substr($inclusion,0,-1);
			
			
			if($row['type_of_window']==1)
			{
				$row['type_of_window']='Default window';
			}
			else
			{
				$row['type_of_window']='Paned windows';
			}
			
			if($row['price_info']==1)
			{
				$row['price_info']='Fixed price';
			}
			else
			{
				$row['price_info']='Price per hour';
			}
			
			if($row['carried_for']==1)
			{
				$row['carried_for']='Private person';
			}
			else if($row['carried_for']==2)
			{
				$row['carried_for']='Company';
			}
			else if($row['carried_for']==3)
			{
				$row['carried_for']='Community';
			}
			else  
			{
				$row['carried_for']='Goverment';
			}
			
			
			$additiona_service='';
			$a=explode(',',$row['additional_services']);
			foreach($a as $adService)
			{
			if($adService==1)
			{
				$additiona_service=$additiona_service.'Washing clothes,';
			}
			else if($adService==2)
			{
				$additiona_service=$additiona_service.'Ironing,';
			}
			else if($adService==3)
			{
				$additiona_service=$additiona_service.'Change of bed linen,';
			}	
			}
			
			$additiona_service=substr($additiona_service,0,-1);
			
			if($row['begin_info']==1)
			{
				$row['begin_info']='As soon as possible';
			}
			else if($row['begin_info']==3)
			{
				$row['begin_info']='Within 1 month';
			}
			else if($row['begin_info']==4)
			{
				$row['begin_info']='Within 3 months';
			}
			else if($row['begin_info']==5)
			{
				$row['begin_info']='Within 6 months';
			}
			else if($row['begin_info']==6)
			{
				$row['begin_info']='Within 12 months';
			}
			else  
			{
				$row['begin_info']='Timing less important';
			}
			
			$emailContent='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
    <body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;"><h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">Pickapro</h1></td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">Window cleaning</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">Service description</span><span>&nbsp;</span><br>




<p>None</p>

</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                
                                                                
                                                                <tr>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="border-collapse: collapse; display: table-cell;">
                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="left" width="100%" style="
                                                                                                            border-collapse: collapse;
                                                                                                            display: table-cell;
                                                                                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                            font-weight: 400;
                                                                                                            font-size: 16px;
                                                                                                            line-height: 25px;
                                                                                                            color: rgb(79, 79, 101);
                                                                                                        ">
                                                                                                        <span style="
                                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 600;
                                                                                                                vertical-align: middle;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 24px;
                                                                                                                color: rgb(35, 35, 62);
                                                                                                            ">Qloud ID property</span>
                                                                                                        <br>Wazir devi colony 21A<br>Uklana Mandi<span>&nbsp;</span>
                                                                                                        
                                                                                                        <br>
                                                                                                        <a href="https://www.google.com/maps/dir//Brunkebergstorg%209/" style="
                                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 400;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 21px;
                                                                                                                text-decoration: underline;
                                                                                                                color: rgb(32, 32, 192);
                                                                                                            " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.google.com/maps/dir//Brunkebergstorg%25209/&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw3pvtMMgmElE3NrJXWhXVZf">
                                                                                                            Get directions
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                                                        <a href="https://click.pstmrk.it/3s/www.google.com%2Fmaps%2Fdir%2F%2F1350%2BW%2BRandolph%252C%2BChicago%252C%2BIL%252C%2BUS%2B60607%2F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.google.com%252Fmaps%252Fdir%252F%252F1350%252BW%252BRandolph%25252C%252BChicago%25252C%252BIL%25252C%252BUS%252B60607%252F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw2XVxlEclvj8RQCAQEpY-KU">
                                                                                                            <img width="230" height="auto" alt="Map of Love" src="https://ci5.googleusercontent.com/proxy/bEoUffR0vw8NUABf3Frkl1iFpS0yjaU2pLyEphhR14w3wKNiPIP7UlhX04VfvGYpF8bieAcaw1A7ozwGJGJpTZEW3zl_hdCaHHwhYM_8zjmxGx-Pxpk97TLA8ZNZdNXUIwHQGweB62F5jVv5xJJ3Wa9E9slE8WRzS1_j98_ntM66pOsFo1GJqprQmYH-3L27SHH44nzNoTWIyR9XtcUarENFnAfZacfNylTPMbmx2_Z1c6D4VpB_hhlZ53JqIwTkmtf93XLsPazUmrIr0pEN3nEUY2x8MZ-0rewzankXeUqWdpbYQ1R6R1leWZYqFjokuLP87BQJ-KMROv-HmQPdDVVaPyatABbd2Guayi7PvDiJG0kgd7Wrr3gKXBTKWLZ9_W2_QfIubsKa-O7khDp5KyAptVQkIO3I1B55FG65s2E3o8dhWefC7mpVdxDvZ0odrGs-817KPB8rrzZkvV_nadul2u9x6zA7ZMVi5MwybybNA6RSZ6LgT4UwUlT2uY60p-NfbBYKlnHIE3QUmn6LX2oi-OMsKcmR2IpOmfPZhe_uzBrb0QDdIhHWK-Kg2NWeP5aX__Kb7meNU_5fTooD8qCn9NsNkN2zMUo9H8MAz4B6Guu-jN7bGdDNyrpvcmmq5K5XP1Ec29Fav0H547gb4sASoygA8OdKPpgfcY-f6Ry-yt1e9IlL3Ui9WaAA6bEpQiNl6fRbgbvrFK7bVA5n98S-E5CLTNPAWYY72YHmIRrLi8pzrbJYGeQ-CW5LdDqYjOKcEFg1hvg_Qv7nYBPv4N_OqrZIuJuKvp6qQDhaGW2F-09dnHhwXz5QS0lyfXLefyGrYCmfrBPDrmdgmeeamWRUL8iCxe4TCpI3_QU6N53VQ7BrckGvuPR_7uK00XNdyIq8V25Uwygzs8czShruGSH2eTvYnRJu-pDrr936yegZncHsPCeSNYEDyXZmGbNhRagbpp6bdqegHim5hW67jMdl7V0oyUvMxyNdAhPRg2vG5_Y0gnflPywhdatHDF6Rie3Se6PRk1PqRdoCQT6UVhSfdpmWRKJeU9QxGDqj5G1zP88zZh-Zs44w3PPR3GMja0yPFnU71NFotzZSLaFqToOpBhKmqUe2LULDR2JU5NRCdgX-ororbxOoTaE95gMN98fmAU5UsgL7BERhBDD2Qy6BWObhzz6JmdSqpKM-LEIDF7GugFTvZOSshEb-Gxd7_ms2wfFLpEL-_Fu48z2wcWKokdBXR3FNh3qJf9tyRhgabmqSXaGUiPE-gaCRSUE-QJysyn2PyCh5SxDfGbL9-BovAc9FSddq9Ow83C2ZI5k1oQCFTHPIbXYIZ8AmosBLxXtNCU0kRnlXCq3PObQ02JN8EIfSsKNMoz4lU54FAd1yieGT6fq-ewx4L4jTEa01WKwMzqbzFzFa3S8W4F4D6eYPIQXixJeVCNquhJtJYz4CZ3fXw5SMFw22ykAUha0C0nU-oNrNpTlaVbure3-kbmgqhwlkskEauwjZHhFMkHkHbYQG19hIrRlCARtQDDsyJKZYb-2BWJl0r7x3txjGBSf0ZWv4V4dD0ZyPGvUD3zuZjjGoG_GdVINyQM8RlAyiBUbSvwegH7usE5XrdT8If09nsbshk5niv2X6w-Vbts-bs0L4xM1369bRpPjVAwnpX2MaSvbjvhsRd4f63n_I29kDJd2jj8otoORO-u_KQ-I6Ka_0lZ7EsNBSGsz2I4jd_8GAkTHrgXk7lqbScExf3Rp1DyxUD2K1tpp4JeWOiU_mMNA0Lu8xGccVoLkcGRuxbz9cJcdgMosEc2-CdD6ABrChe7SIYRdqrsobVOwwaeL2DYF0lETgHB7tppmJhhUPjvsNbFSRbEZ6TtLWFA2GfpmfE7FOnsvIunI6nPSrmq1rzqaH8a8=s0-d-e1-ft#https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCPd%2DxSabI7QOfKX5NxVVup6bPfcovwFiQ&amp;center=1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;size=300x200&amp;zoom=15&amp;scale=2&amp;format=png&amp;visual%5Frefresh=true&amp;markers=scale%3A2%7Cicon%3Ahttps%3A%2F%2Fstorage.googleapis.com%2Ftock%2Dpublic%2Dassets%2Fimages%2Demail%2Dtemplate%2Femail%2Dmap%2Dmarker.png%7Cshadow%3Afalse%7C1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x4b505b&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Ccolor%3A0xffffff%7Cvisibility%3Aon&amp;style=feature%3Aadministrative.land%5Fparcel%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Aall%7Cvisibility%3Aon&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Ageometry.fill%7Ccolor%3A0xe9e9eb&amp;style=feature%3Apoi%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Aroad%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff&amp;style=feature%3Aroad%7Celement%3Alabels.text.fill%7Ccolor%3A0x787c84&amp;style=feature%3Aroad%7Celement%3Alabels.icon%7Cvisibility%3Aoff&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffbe32&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffbe32&amp;style=feature%3Atransit%7Celement%3Alabels.text.fill%7Cvisibility%3Aon%7Ccolor%3A0x787c84&amp;style=feature%3Atransit.line%7Celement%3Ageometry.fill%7Ccolor%3A0xd2d4d6&amp;signature=3yCSyIXfsSilvB5wcd4OElw40QU=" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block; width: 230px;" class="CToWUd" data-bit="iit">
                                                                                                        </a>
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
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                                                                         
 
 
 
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Building type</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">Lodge</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">What type of window does it apply to?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">Default window</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">How many windows does it apply to?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);"></div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>


 
 
 

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">How many pages should be polished?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);"></div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
																		
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Should window frames be cleaned and dried?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">No</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Have the windows been exposed to paint, soot or other hard dirt and need special washing?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">No</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Are the windows hard to reach so that a ladder is needed?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">No</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do you want a fixed price or a price per hour?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">Fixed price</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">The assignment must be carried out for</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">Private person</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">When will the assignment begin</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">As soon as possible</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/projectPriceBidInfo/'.$data['cid'].'/'.$data['jid'].'/'.$data['domain_id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Bid project</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>                                                                        
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Cancellation policy
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time.<span>&nbsp;</span></span>
                                                                            <span>You can always transfer your reservation to another person.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Questions?
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            If you have questions about your reservation, contact us at&nbsp;<span>&nbsp;</span><a></a>or by calling<span>&nbsp;</span>
                                                                            <a href="tel:+=" target="_blank">+201 34534534</a>.
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
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            © 2019 TOCK, INC.
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            ALL RIGHTS RESERVED
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    

</body></html>';
			 
			$to            = $data['company_email'];
			$subject       = "Premium Qualified Job request received!";
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		function homeRepairEmail($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select property_nickname,address,port_number,city,zipcode,apartment_property_type.property_type,category_id  ,subcategory_id  ,start_date   ,end_date   ,property_type_detail   ,floor_area   ,total_rooms   ,total_bathrooms  ,inclusion_type_detail  ,material_info_detail   ,furniture_info_detail   ,price_info  ,product_information ,carried_for  ,begin_info    ,pcountry   ,p_number   ,conatct_preffered_on   ,user_professional_service_request.created_on   ,cleaning_type   ,how_often  ,pets_available ,additional_services  ,type_of_window   ,total_window  ,pages_info_detail  ,frame_info_detail  ,exposure_info_detail  ,reachable_info_detail  ,total_properties   ,garbage_removal_required   ,user_property_id   ,selected_qualified_companies,subcategory_name  from user_professional_service_request left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join apartment_property_type on apartment_property_type.id= user_professional_service_request.property_type_detail left join user_address on user_address.id=user_professional_service_request.user_property_id where user_professional_service_request.id=?");
			$stmt->bind_param("i", $data['job_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row = $result1->fetch_assoc();
			 
			if($row['price_info']==1)
			{
				$row['price_info']='Fixed price';
			}
			else
			{
				$row['price_info']='Price per hour';
			}
			
			if($row['carried_for']==1)
			{
				$row['carried_for']='Private person';
			}
			else if($row['carried_for']==2)
			{
				$row['carried_for']='Company';
			}
			else if($row['carried_for']==3)
			{
				$row['carried_for']='Community';
			}
			else  
			{
				$row['carried_for']='Goverment';
			}
			
			
			
			if($row['begin_info']==1)
			{
				$row['begin_info']='As soon as possible';
			}
			else if($row['begin_info']==3)
			{
				$row['begin_info']='Within 1 month';
			}
			else if($row['begin_info']==4)
			{
				$row['begin_info']='Within 3 months';
			}
			else if($row['begin_info']==5)
			{
				$row['begin_info']='Within 6 months';
			}
			else if($row['begin_info']==6)
			{
				$row['begin_info']='Within 12 months';
			}
			else  
			{
				$row['begin_info']='Timing less important';
			}
			
			$emailContent='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
				<body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;"><h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">Pickapro</h1></td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">Home repair</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">Service description</span><span>&nbsp;</span><br>




<p>'.$row['product_information'].'</p>

</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                
                                                
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="border-collapse: collapse; display: table-cell;">
                                                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td align="left" width="100%" style="
                                                                                                            border-collapse: collapse;
                                                                                                            display: table-cell;
                                                                                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                            font-weight: 400;
                                                                                                            font-size: 16px;
                                                                                                            line-height: 25px;
                                                                                                            color: rgb(79, 79, 101);
                                                                                                        ">
                                                                                                        <span style="
                                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 600;
                                                                                                                vertical-align: middle;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 24px;
                                                                                                                color: rgb(35, 35, 62);
                                                                                                            ">'.$row['property_nickname'].'</span>
                                                                                                        <br>
                                                                                                        '.$row['address'].' '.$row['port_number'].'<br>
                                                                                                        '.$row['city'].'<span>&nbsp;</span>
                                                                                                        <br>
                                                                                                        <a href="https://www.google.com/maps/dir//Brunkebergstorg%209/" style="
                                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                                font-weight: 400;
                                                                                                                font-size: 16px;
                                                                                                                line-height: 21px;
                                                                                                                text-decoration: underline;
                                                                                                                color: rgb(32, 32, 192);
                                                                                                            " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.google.com/maps/dir//Brunkebergstorg%25209/&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw3pvtMMgmElE3NrJXWhXVZf">
                                                                                                            Get directions
                                                                                                        </a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                        <table align="right" border="0" cellpadding="0" cellspacing="0" width="230" style="border-collapse: collapse; width: 230px;">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                                                        <a href="https://click.pstmrk.it/3s/www.google.com%2Fmaps%2Fdir%2F%2F1350%2BW%2BRandolph%252C%2BChicago%252C%2BIL%252C%2BUS%2B60607%2F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.google.com%252Fmaps%252Fdir%252F%252F1350%252BW%252BRandolph%25252C%252BChicago%25252C%252BIL%25252C%252BUS%252B60607%252F/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/3/pW-tp1lzIQ&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw2XVxlEclvj8RQCAQEpY-KU">
                                                                                                            <img width="230" height="auto" alt="Map of Love" src="https://ci5.googleusercontent.com/proxy/bEoUffR0vw8NUABf3Frkl1iFpS0yjaU2pLyEphhR14w3wKNiPIP7UlhX04VfvGYpF8bieAcaw1A7ozwGJGJpTZEW3zl_hdCaHHwhYM_8zjmxGx-Pxpk97TLA8ZNZdNXUIwHQGweB62F5jVv5xJJ3Wa9E9slE8WRzS1_j98_ntM66pOsFo1GJqprQmYH-3L27SHH44nzNoTWIyR9XtcUarENFnAfZacfNylTPMbmx2_Z1c6D4VpB_hhlZ53JqIwTkmtf93XLsPazUmrIr0pEN3nEUY2x8MZ-0rewzankXeUqWdpbYQ1R6R1leWZYqFjokuLP87BQJ-KMROv-HmQPdDVVaPyatABbd2Guayi7PvDiJG0kgd7Wrr3gKXBTKWLZ9_W2_QfIubsKa-O7khDp5KyAptVQkIO3I1B55FG65s2E3o8dhWefC7mpVdxDvZ0odrGs-817KPB8rrzZkvV_nadul2u9x6zA7ZMVi5MwybybNA6RSZ6LgT4UwUlT2uY60p-NfbBYKlnHIE3QUmn6LX2oi-OMsKcmR2IpOmfPZhe_uzBrb0QDdIhHWK-Kg2NWeP5aX__Kb7meNU_5fTooD8qCn9NsNkN2zMUo9H8MAz4B6Guu-jN7bGdDNyrpvcmmq5K5XP1Ec29Fav0H547gb4sASoygA8OdKPpgfcY-f6Ry-yt1e9IlL3Ui9WaAA6bEpQiNl6fRbgbvrFK7bVA5n98S-E5CLTNPAWYY72YHmIRrLi8pzrbJYGeQ-CW5LdDqYjOKcEFg1hvg_Qv7nYBPv4N_OqrZIuJuKvp6qQDhaGW2F-09dnHhwXz5QS0lyfXLefyGrYCmfrBPDrmdgmeeamWRUL8iCxe4TCpI3_QU6N53VQ7BrckGvuPR_7uK00XNdyIq8V25Uwygzs8czShruGSH2eTvYnRJu-pDrr936yegZncHsPCeSNYEDyXZmGbNhRagbpp6bdqegHim5hW67jMdl7V0oyUvMxyNdAhPRg2vG5_Y0gnflPywhdatHDF6Rie3Se6PRk1PqRdoCQT6UVhSfdpmWRKJeU9QxGDqj5G1zP88zZh-Zs44w3PPR3GMja0yPFnU71NFotzZSLaFqToOpBhKmqUe2LULDR2JU5NRCdgX-ororbxOoTaE95gMN98fmAU5UsgL7BERhBDD2Qy6BWObhzz6JmdSqpKM-LEIDF7GugFTvZOSshEb-Gxd7_ms2wfFLpEL-_Fu48z2wcWKokdBXR3FNh3qJf9tyRhgabmqSXaGUiPE-gaCRSUE-QJysyn2PyCh5SxDfGbL9-BovAc9FSddq9Ow83C2ZI5k1oQCFTHPIbXYIZ8AmosBLxXtNCU0kRnlXCq3PObQ02JN8EIfSsKNMoz4lU54FAd1yieGT6fq-ewx4L4jTEa01WKwMzqbzFzFa3S8W4F4D6eYPIQXixJeVCNquhJtJYz4CZ3fXw5SMFw22ykAUha0C0nU-oNrNpTlaVbure3-kbmgqhwlkskEauwjZHhFMkHkHbYQG19hIrRlCARtQDDsyJKZYb-2BWJl0r7x3txjGBSf0ZWv4V4dD0ZyPGvUD3zuZjjGoG_GdVINyQM8RlAyiBUbSvwegH7usE5XrdT8If09nsbshk5niv2X6w-Vbts-bs0L4xM1369bRpPjVAwnpX2MaSvbjvhsRd4f63n_I29kDJd2jj8otoORO-u_KQ-I6Ka_0lZ7EsNBSGsz2I4jd_8GAkTHrgXk7lqbScExf3Rp1DyxUD2K1tpp4JeWOiU_mMNA0Lu8xGccVoLkcGRuxbz9cJcdgMosEc2-CdD6ABrChe7SIYRdqrsobVOwwaeL2DYF0lETgHB7tppmJhhUPjvsNbFSRbEZ6TtLWFA2GfpmfE7FOnsvIunI6nPSrmq1rzqaH8a8=s0-d-e1-ft#https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyCPd%2DxSabI7QOfKX5NxVVup6bPfcovwFiQ&amp;center=1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;size=300x200&amp;zoom=15&amp;scale=2&amp;format=png&amp;visual%5Frefresh=true&amp;markers=scale%3A2%7Cicon%3Ahttps%3A%2F%2Fstorage.googleapis.com%2Ftock%2Dpublic%2Dassets%2Fimages%2Demail%2Dtemplate%2Femail%2Dmap%2Dmarker.png%7Cshadow%3Afalse%7C1350+W+Randolph%2C+Chicago%2C+IL%2C+US+60607&amp;style=feature%3Aall%7Celement%3Alabels.text.fill%7Ccolor%3A0x4b505b&amp;style=feature%3Aall%7Celement%3Alabels.text.stroke%7Ccolor%3A0xffffff%7Cvisibility%3Aon&amp;style=feature%3Aadministrative.land%5Fparcel%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Aall%7Cvisibility%3Aon&amp;style=feature%3Alandscape.man%5Fmade%7Celement%3Ageometry.fill%7Ccolor%3A0xe9e9eb&amp;style=feature%3Apoi%7Celement%3Aall%7Cvisibility%3Aoff&amp;style=feature%3Aroad%7Celement%3Ageometry.fill%7Ccolor%3A0xffffff&amp;style=feature%3Aroad%7Celement%3Alabels.text.fill%7Ccolor%3A0x787c84&amp;style=feature%3Aroad%7Celement%3Alabels.icon%7Cvisibility%3Aoff&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.fill%7Ccolor%3A0xffbe32&amp;style=feature%3Aroad.highway%7Celement%3Ageometry.stroke%7Ccolor%3A0xffbe32&amp;style=feature%3Atransit%7Celement%3Alabels.text.fill%7Cvisibility%3Aon%7Ccolor%3A0x787c84&amp;style=feature%3Atransit.line%7Celement%3Ageometry.fill%7Ccolor%3A0xd2d4d6&amp;signature=3yCSyIXfsSilvB5wcd4OElw40QU=" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block; width: 230px;" class="CToWUd" data-bit="iit">
                                                                                                        </a>
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
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td style="border-collapse: collapse; display: table-cell; border: 1px solid rgb(211, 211, 216); padding: 24px;">
                                                                         
 
 
 

 
 
 

 
 
 


 
 
 


 
 
 


 
 
 
																		

 
 
 
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">What type of problem do you have?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['subcategory_name'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">Do you want a fixed price or a price per hour?</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['price_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
 
 
 <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">The assignment must be carried out for</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['carried_for'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table><table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>



<table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td width="80%" style="border-collapse: collapse; display: table-cell; text-align: left;">
                                                                                        <div style="
                                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                                font-weight: 400;
                                                                                                font-size: 16px;
                                                                                                line-height: 25px;
                                                                                                color: rgb(79, 79, 101);
                                                                                            ">When will the assignment begin</div>
                                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 14px; color: rgb(123, 123, 139);">'.$row['begin_info'].'</div>
                                                                                    </td>
                                                                                    <td width="20%" align="right" valign="top" style="border-collapse: collapse; display: table-cell; text-align: right;">
                                                                                        
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                
                                                                                
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                        <table border="0" width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(211, 211, 216);">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                                <tr>
                                                                                    <td colspan="2" style="border-collapse: collapse; display: table-cell; height: 12px; line-height: 12px; max-height: 12px;"></td>
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>

    
                  
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody>

                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="center" valign="center" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <table border="0" cellspacing="0" cellpadding="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                            <tbody>
<tr>
                              <td align="center" valign="center" width="100%" class="Button-primary-wrapper" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                              <a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/projectPriceBidInfo/'.$data['cid'].'/'.$data['jid'].'/'.$data['domain_id'].'" target="_blank" class="Button-primary" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; border-radius: 3px; border: 1px solid rgb(32, 32, 192); color: rgb(255, 255, 255); display: block; font-size: 16px; font-weight: 600; padding: 18px; text-decoration: none;">Bid project</a>                                </td>
                            </tr>
                          </tbody>
</table>
                        </td>
                      </tr>
					  
					  <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
					  
					  
					  
                    </tbody>
</table>
                  
                
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Cancellation policy
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            <span>Your reservation can be canceled for a full refund 24 hours prior to the reservation time.<span>&nbsp;</span></span>
                                                                            <span>You can always transfer your reservation to another person.</span>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 600; font-size: 16px; line-height: 21px; color: rgb(35, 35, 62);">
                                                                            Questions?
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="
                                                                                margin-top: 6px;
                                                                                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 400;
                                                                                font-size: 16px;
                                                                                line-height: 21px;
                                                                                color: rgb(79, 79, 101);
                                                                            ">
                                                                            If you have questions about your reservation, contact us at&nbsp;<span>&nbsp;</span><a></a>or by calling<span>&nbsp;</span>
                                                                            <a href="tel:+=" target="_blank">+201 34534534</a>.
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
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            © 2019 TOCK, INC.
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            ALL RIGHTS RESERVED
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    

</body></html>';
			
			$to            = $data['company_email'];
			$subject       = "Premium Qualified Job request received!";
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
		}
		
		function availableProfessionalJobs($data)
		{
				$dbCon = AppModel::createConnection();
				$mid= $this -> encrypt_decrypt('decrypt',$data['mid']);
				$org=array();
				$stmt = $dbCon->prepare("select request_type,property_info_required ,user_professional_service_request.id,category_name,subcategory_name,user_property_id from user_professional_service_request left join professional_service_category on professional_service_category.id=user_professional_service_request.category_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id where  selected_qualified_companies is null and (user_property_id is not null or property_info_required=0 or user_professional_service_request.request_type=2) and domain_id=? order by id desc");
				$stmt->bind_param("i", $mid);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
				$stmt->close();
				$dbCon->close();
				return $org;
		}
		
		function approvePremiumQualified($data)
		{
			$dbCon = AppModel::createConnection();
			$partner_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("update cleaning_company_premium_account_request set is_approved=1,modified_on=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $partner_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select cleaning_company_premium_account_request.domain_id,company_id,company_name from cleaning_company_premium_account_request left join companies on companies.id=cleaning_company_premium_account_request.company_id where cleaning_company_premium_account_request.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $partner_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['cid']=$this -> encrypt_decrypt('encrypt',$row['company_id']);
			$data['domain_id']=$this -> encrypt_decrypt('encrypt',$row['domain_id']);
			$data['company_name']=$row['company_name'];
			$company_id=$row['company_id'];
			$stmt = $dbCon->prepare("select id,user_login_id,email from employees where company_id=? and (user_login_id in (select user_id from manage_employee_permissions where company_id=? and is_admin=1) or user_login_id=43)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$to            = $row['email'];
			$subject       = "Premium Qualified request Approved!";
			$emailContent ='<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></head>
    <body>
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            ">
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                        <h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Qloud ID</font></font>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        ">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" valign="center" width="48" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;"></div>
                                                                    </td>
                                                                    <td width="12" style="border-collapse: collapse; display: table-cell;">&nbsp;</td>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 600;
                                                                                vertical-align: middle;
                                                                                font-size: 16px;
                                                                                line-height: 24px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You are approved</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            ">
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Welcome on board </font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">
                                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Request approved</font></font>
                                                            </span>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <p></p>'.$data['company_name'].' request for Premium Qualified account has been approved by superadmin.<p></p>
                                                                </font>

                                                                
                                                            </font>
                                                            <span>&nbsp;</span><br>
                                                            <font style="vertical-align: inherit;"></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);">
                                                                                        <a href="https://qloudid.com/public/index.php/UserCompanySignUp/updateServiceInformation/'.$data['cid'].'/'.$data['domain_id'].'" style="
                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                border-radius: 3px;
                                                                                                border: 1px solid rgb(32, 32, 192);
                                                                                                color: rgb(255, 255, 255);
                                                                                                display: block;
                                                                                                font-size: 16px;
                                                                                                font-weight: 600;
                                                                                                padding: 18px;
                                                                                                text-decoration: none;
                                                                                            " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.dstricts.com%252Fpublic%252Findex.php%252FHotel%252FverifyCheckin%252FK1p5TzIweWpQa1RQSm5wV3QyOUc1Zz09/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/1/3Ug7SAcXST&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw16u70RZouwQwLMGFz6hYYB">
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Add more services</font></font><span>&nbsp;</span>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;"></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl">
                                            <img src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;" class="CToWUd" data-bit="iit">
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© 2019 TOCK, INC.</font></font>
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ALL RIGHTS RESERVED</font></font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    

</body></html>';
		try {
		  sendEmail($subject, $to, $emailContent);
		 
		}
		//catch exception
		catch(Exception $e) {
			$to='kowaken.ghirmai@gmail.com';
			 sendEmail($subject, $to, $emailContent);
		   
			} 
	}
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		
		
		function rejectPremiumQualified($data)
		{
			$dbCon = AppModel::createConnection();
			$partner_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("update cleaning_company_premium_account_request set is_approved=2,modified_on=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $partner_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("select id,company_email as email from companies where id = (select company_id from cleaning_company_premium_account_request where id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $partner_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$to            = $row['email'];
			$subject       = "Premium Qualified request rejected!";
			$emailContent ='<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

<center style="width:100%;table-layout:fixed">

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">

<tbody><tr>

<td>

    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td>    

         <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">

<table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">

       <tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">

            <tbody><tr>

               <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">

                 <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>

                 <div style="display:none;max-height:0px;overflow:hidden">

								&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;

								

								</div>

            </td>

            </tr>           

        </tbody></table>

    </td>

</tr>

 </tbody></table>

        </div>

        </td>

        </tr>

        </tbody></table>

    



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">

<div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">





        

        </div>

        </td>

        </tr>

</tbody></table>



<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td style="padding-bottom:20px">

         <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">

       <tbody><tr>

<td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                 <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">

            <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>

                </td>

            </tr>

            <tr>

                <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                    <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

 </tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

    <tbody><tr>

	<td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">

		<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

			

			<table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">

				<tbody><tr>

				<td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">

                

					<div style="text-align: center; line-height: 22px; max-width: 600px;
    float: left;
    position: relative; ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828 !important;
width: 960px;
    position: relative;
    margin: 0 auto;




">
                           <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
    padding-left: 30px; margin-right: auto;
    margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                              <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.qloudid.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Rejected</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Your request for Premium Qualified account has been rejected by superadmin. Please contact support for further information.</div>
                           </div>
                        </div>
                     </div>
                 

				</td>

				</tr>

			</tbody></table>

			

		</div>

	</td>

	</tr>

</tbody></table>



 






  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">



    <tbody><tr>



      <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">



        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">



          



          <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">



            <tbody><tr>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



              <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">



                



                <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">



                  <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">



                    <tbody><tr>



                      <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">



                        <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">



                          <tbody><tr>



                            <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">



                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">



                                <tbody><tr>


                                  <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because superadmin have taken action on your Premium Qualified account request,</p>



                                  </td>



                                </tr>



                                

                                                                  

 


 



        



      </tbody></table>



    </td>



  </tr>
 </tbody></table>



                            </td>



                          </tr>



                        </tbody></table>



                      </div></td>



                    </tr>



                  </tbody></table>



                </div>



                



              </td>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



            </tr>



          </tbody></table>



          



        



      </td>



    </tr>



  </tbody></table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>



		

		

   

    </center>

</div></body></html>';

try {
  sendEmail($subject, $to, $emailContent);
  $stmt->close();
$dbCon->close();
return 1;
}

//catch exception
catch(Exception $e) {
	$to='kowaken.ghirmai@gmail.com';
	 sendEmail($subject, $to, $emailContent);
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
		
		
		function PremiumQualifiedCount()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where is_approved=0");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function PremiumQualifiedDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
				$stmt = $dbCon->prepare("select cleaning_company_premium_account_request.id,created_on,company_name from cleaning_company_premium_account_request left join companies on companies.id=cleaning_company_premium_account_request.company_id where is_approved=0 order by created_on desc");
				
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function morePremiumQualifiedRequest()
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select cleaning_company_premium_account_request.id,created_on,company_name from cleaning_company_premium_account_request left join companies on companies.id=cleaning_company_premium_account_request.company_id where is_approved=0 desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_40   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Premium Qualified</span>
																	
																	  <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr($row['company_name'],0,17).'</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="approvePremiumQualified/'.$org1.'"><span class="fas fa-check-circle green_txt" aria-hidden="true"></span></a>
													</div>
																			<div class="fright wi_10 padl0 xs-wi_20  marl15 fsz40  xs-marl0 xxs-marr20  padb0 ">
														<a href="rejectPremiumQualified/'.$org1.'"><span class="fas fa-times-circle red_txt" aria-hidden="true"></span></a>
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
		
		function PremiumQualifiedCountApproved()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where is_approved=1");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function matchingProfessionalCompanies($data)
		{
				$dbCon = AppModel::createConnection();
				$job_id= $this -> encrypt_decrypt('decrypt',$data['job_id']);
				$mid= $this -> encrypt_decrypt('decrypt',$data['mid']);
				$org=array();
			
				$stmt = $dbCon->prepare("select id,company_name,company_email from companies where id in (select company_id from professional_company_selected_service_todos where professional_subcategory_id=(select subcategory_id from user_professional_service_request where id=?) and is_selected=1) and id in (select company_id from cleaning_company_premium_account_request where is_approved=1 and domain_id=?)");
				$stmt->bind_param("ii", $job_id,$mid);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function PremiumQualifiedDetailApproved()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
				$stmt = $dbCon->prepare("select cleaning_company_premium_account_request.id,created_on,company_name from cleaning_company_premium_account_request left join companies on companies.id=cleaning_company_premium_account_request.company_id where is_approved=1 order by created_on desc");
				
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function morePremiumQualifiedRequestApproved()
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select cleaning_company_premium_account_request.id,created_on,company_name from cleaning_company_premium_account_request left join companies on companies.id=cleaning_company_premium_account_request.company_id where is_approved=1 desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_40   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Premium Qualified</span>
																	
																	  <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,17).'</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>  ';
				
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 function PremiumQualifiedCountRejected()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where is_approved=2");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function PremiumQualifiedDetailRejected()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
				$stmt = $dbCon->prepare("select cleaning_company_premium_account_request.id,created_on,company_name from cleaning_company_premium_account_request left join companies on companies.id=cleaning_company_premium_account_request.company_id where is_approved=2 order by created_on desc");
				
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function morePremiumQualifiedRequestRejected()
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*5+1;
			$b=5;
			$stmt = $dbCon->prepare("select cleaning_company_premium_account_request.id,created_on,company_name from cleaning_company_premium_account_request left join companies on companies.id=cleaning_company_premium_account_request.company_id where is_approved=2 desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		 
																	
																	<div class="fleft wi_40   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18  bold  black_txt">Premium Qualified</span>
																	
																	  <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,17).'</span>  
																	</div>
																	
																		<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>  ';
				
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
			
	}
