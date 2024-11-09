<?php
	require_once('../AppModel.php');
	class CompanyModel extends AppModel
	{
	
		function companyVisitor($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			
			
			$stmt = $dbCon->prepare("select status from company_visitors where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row['status'];
					
		}
		
		function visitorsBg($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select image_src from company_product_bg where company_id = ? and product_id=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				$stmt->close();
				$dbCon->close();
				return $row;
					
		}
		function visitorOnPage($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			if($data['visitor']==1)
			{
			
			$stmt = $dbCon->prepare("select name,last_name from company_visitors where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			else if($data['visitor']==0)
			{
			
			$stmt = $dbCon->prepare("select first_name as name,last_name from employees where id = (select employee_id from company_visitors where id = ?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $visitor_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
				$stmt->close();
				$dbCon->close();
				return $row;
					
		}
			
		function updateVisitors($data)
		{
			$dbCon = AppModel::createConnection();
			$visitor_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			//echo $visitor_id;
			$stmt = $dbCon->prepare("update company_visitors set left_office_at=now(),status=1,updated_by=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['visitor'],$visitor_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function searchCompanyCountry($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select country_id from companies where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['country_id']==201)
			{
				$stmt = $dbCon->prepare("select id from bankid_verified where bank_id=(select ssn from user_profiles where user_logins_id=?)");
				
				$stmt->bind_param("i", $data['user_id']);
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
			else
			{
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
		}
		
		
		function selectWhitelistCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select id from whitelist_company where company_id = ? and status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
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
				return $row['id'];
			}
			}
		
		
		function selectWhitelistVisitorCompany($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			
			
			$stmt = $dbCon->prepare("select id from whitelist_company where company_id = (select company_id from company_visitors where id =?) and status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
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
				return $row['id'];
			}
			
			
		}
		
		function selectWhitelistCompanyName($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_name,exposed_times from whitelist_company where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['comp_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$exposed=$row['exposed_times']+1;
			$stmt = $dbCon->prepare("update whitelist_company set exposed_times=? where id = ?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $exposed,$data['comp_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $row['company_name'];
			
			
			
		}
		
		function updateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$posted_value=json_decode($_POST['total_value'],true);
			
			$stmt = $dbCon->prepare("select companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$posted_value['company_email']=$row['company_email'];
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/updateCompanyDetail';
			
			
			$stmt = $dbCon->prepare("INSERT INTO company_passport_logs (company_id, created_on) VALUES (?, now())");
			$stmt->bind_param("i", $company_id);
			 $stmt->execute();
			$id=$stmt->insert_id;
			
			
			//$fields = Array('userandcompanydata' => urlencode($data));
			//$fields[]
			/*$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($posted_value));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $posted_value);
				
				//execute post
				$result = curl_exec($ch);
				//echo curl_error($ch); 
				//close connection
			curl_close($ch); //die;*/
			
			//print_r($posted_value); die;
			if($posted_value['general']>0)
			{
				$stmt = $dbCon->prepare("update companies set company_name=?,industry=?  where id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['name'],$posted_value['l_name'],$company_id);
				$stmt->execute();
				
				if(html_entity_decode($row['company_name'])!=$posted_value['name'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set company_name=?,company_name_old=?,company_name_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['name'],$row['company_name'],$id);
				$stmt->execute();
				}
				
				if($row['industry']!=$posted_value['l_name'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set industry=?,industry_old=?,industry_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("iii", $posted_value['l_name'],$row['industry'],$id);
				$stmt->execute();
				}
				
				$stmt = $dbCon->prepare("update company_profiles set cid=?,founded=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['ssn'],$posted_value['dob'],$company_id);
				$stmt->execute();
				
				if($row['cid']!=$posted_value['ssn'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set cid=?,cid_old=?,cid_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['ssn'],$row['cid'],$id);
				$stmt->execute();
				}
				
				if($row['founded']!=$posted_value['dob'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set founded=?,founded_old=?,founded_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", date('Y-m-d',strtotime($posted_value['dob'])),date('Y-m-d',strtotime($row['founded'])),$id);
				$stmt->execute();
				}
				
			}
			if($posted_value['byphone']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set phone_country=?,phone=? where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['c_phone'],$posted_value['phone'],$company_id);
				$stmt->execute();
				
				if($row['phone_country']!=$posted_value['c_phone'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set phone_country=?,phone_country_old=?,phone_country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['c_phone'],$row['phone_country'],$id);
				$stmt->execute();
				}
				if($row['phone']!=$posted_value['phone'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set phone=?,phone_old=?,phone_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['phone'],$row['phone'],$id);
				$stmt->execute();
				}
				
			}
			if($posted_value['bypost']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssi", $posted_value['addrs1'],$posted_value['city1'],$posted_value['cntry1'],$posted_value['zip1'],$company_id);
				$stmt->execute();
				
				if($row['delivery_address']!=$posted_value['addrs1'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set delivery_address=?,delivery_address_old=?,delivery_address_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['addrs1'],$row['delivery_address'],$id);
				$stmt->execute();
				}
				
				if($row['d_city']!=$posted_value['city1'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set d_city=?,d_city_old=?,d_city_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['city1'],$row['d_city'],$id);
				$stmt->execute();
				}
				
				if($row['d_country']!=$posted_value['cntry1'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set d_country=?,d_country_old=?,d_country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['cntry1'],$row['d_country'],$id);
				$stmt->execute();
				}
				
				if($row['d_zip']!=$posted_value['zip1'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set d_zip=?,d_zip_old=?,d_zip_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['zip1'],$row['d_zip'],$id);
				$stmt->execute();
				}
			}
			if($posted_value['va']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssi", $posted_value['addrs'],$posted_value['city'],$posted_value['cntry'],$posted_value['zip'],$company_id);
				$stmt->execute();
				
				if($row['address']!=$posted_value['addrs'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set address=?,address_old=?,address_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['addrs'],$row['address'],$id);
				$stmt->execute();
				}
				
				if($row['city']!=$posted_value['city'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set city=?,city_old=?,city_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['city'],$row['city'],$id);
				$stmt->execute();
				}
				
				if($row['country']!=$posted_value['cntry'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set country=?,country_old=?,country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['cntry'],$row['country'],$id);
				$stmt->execute();
				}
				
				if($row['zip']!=$posted_value['zip'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set zip=?,zip_old=?,zip_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['zip'],$row['zip'],$id);
				$stmt->execute();
				}
				
				//echo "jain"; die; 
			}
			if($posted_value['fors']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("sssssssssi", $posted_value['addrssi'],$posted_value['citysi'],$posted_value['cntrysi'],$posted_value['zipsi'],$posted_value['addrssd'],$posted_value['citysd'],$posted_value['cntrysd'],$posted_value['zipsd'],$posted_value['vat'],$company_id);
				$stmt->execute();
				
				
				if($row['si_address']!=$posted_value['addrssi'])
				{
					$stmt = $dbCon->prepare("update company_passport_logs set si_address=?,si_address_old=?,si_address_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['addrssi'],$row['si_address'],$id);
				$stmt->execute();
				}
				
				if($row['si_city']!=$posted_value['citysi'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set si_city=?,si_city_old=?,si_city_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['citysi'],$row['si_city'],$id);
				$stmt->execute();
				}
				
				if($row['si_country']!=$posted_value['cntrysi'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set si_country=?,si_country_old=?,si_country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['cntrysi'],$row['si_country'],$id);
				$stmt->execute();
				}
				
				if($row['si_zip']!=$posted_value['zipsi'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set si_zip=?,si_zip_old=?,si_zip_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['zipsi'],$row['si_zip'],$id);
				$stmt->execute();
				}
				
				if($row['sd_address']!=$posted_value['addrssd'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set sd_address=?,sd_address_old=?,sd_address_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['addrssd'],$row['sd_address'],$id);
				$stmt->execute();
				}
				
				if($row['sd_city']!=$posted_value['citysd'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set sd_city=?,sd_city_old=?,sd_city_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['citysd'],$row['sd_city'],$id);
				$stmt->execute();
				}
				
				if($row['sd_country']!=$posted_value['cntrysd'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set sd_country=?,sd_country_old=?,sd_country_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['cntrysd'],$row['sd_country'],$id);
				$stmt->execute();
				}
				
				if($row['sd_zip']!=$posted_value['zipsd'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set sd_zip=?,sd_zip_old=?,sd_zip_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['zipsd'],$row['sd_zip'],$id);
				$stmt->execute();
				}
				
				if($row['vat']!=$posted_value['vat'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set vat=?,vat_old=?,vat_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['vat'],$row['vat'],$id);
				$stmt->execute();
				}
				
			}
			if($posted_value['forc']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set bankgiro_med=?,bankgiro_utan=?,iban=?,bic=?,bank=?,f_tax=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssssi", $posted_value['bankgiro_med'],$posted_value['bankgiro_utan'],$posted_value['iban'],$posted_value['bic'],$posted_value['bank'],$posted_value['ftax'],$company_id);
				$stmt->execute();
				
				if($row['bankgiro_med']!=$posted_value['bankgiro_med'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set bankgiro_med=?,bankgiro_med_old=?,bankgiro_med_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['bankgiro_med'],$row['bankgiro_med'],$id);
				$stmt->execute();
				}
				
				if($row['bankgiro_utan']!=$posted_value['bankgiro_utan'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set bankgiro_utan=?,bankgiro_utan_old=?,bankgiro_utan_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['bankgiro_utan'],$row['bankgiro_utan'],$id);
				$stmt->execute();
				}
				if($row['iban']!=$posted_value['iban'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set iban=?,iban_old=?,iban_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['iban'],$row['iban'],$id);
				$stmt->execute();
				}
				
				if($row['bic']!=$posted_value['bic'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set bic=?,bic_old=?,bic_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['bic'],$row['bic'],$id);
				$stmt->execute();
				}
				
				if($row['bank']!=$posted_value['bank'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set bank=?,bank_old=?,bank_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['bank'],$row['bank'],$id);
				$stmt->execute();
				}
				
				if($row['f_tax']!=$posted_value['ftax'])
				{
				$stmt = $dbCon->prepare("update company_passport_logs set f_tax=?,f_tax_old=?,f_tax_updated=1  where id=?");
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['ftax'],$row['f_tax'],$id);
				$stmt->execute();
				}
			}
			
		
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($posted_value));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $posted_value);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				$result = curl_exec($ch);
				//echo curl_error($ch); 
				//close connection
				curl_close($ch); //die;
				
				$stmt->close();
				$dbCon->close();
				return 1;
			
			
			
		}
		function searchCompanyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$posted_value=json_decode($_POST['total_value'],true);
			if($posted_value['general']>0) {
				
				$general='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">General</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['general'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Company Indentification Number :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['ssn'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Company Name :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['name'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Industry :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['l_name'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Founded :</a>
				</div>
				<span class="fxshrink_0 marl120">'.$posted_value['dob'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			
			{
				$general='';
			}
			
			if($posted_value['va']>0) { 
				
				$va='<div class="result-item padt10  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Visiting Address</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['va'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrs'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zip'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['city'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntry'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$va='';
			}
			
			if($posted_value['bypost']>0) {
				$bypost='<div class="result-item padt10  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Contact by Post</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['bypost'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrs1'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zip1'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['city1'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntry1'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$bypost='';
			}
			
			
			if($posted_value['byphone']>0) { 
				$byphone='<div class="result-item padt10  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Telefon </span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['byphone'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Land :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['c_phone'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Mobil nr. :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['phone'].'</span>
				</li>
				
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$byphone="";
			}
			if($posted_value['fors']>0) { 
				
				$fors='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">For Suppliers</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['fors'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Invoicing Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrssi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zipsi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['citysi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntrysi'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Delivery Address :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['addrssd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Zipcode :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['zipsd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">City :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['citysd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Country :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['cntrysd'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">VAT :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['vat'].'</span>
				</li>
				</ul>
				</div>
				</div>';
			}
			else
			{
				$fors="";
			}
			
			if($posted_value['forc']>0) { 
				
				$forc='<div class="result-item padtb0  lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">For Customers</span>
				
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>'.$posted_value['forc'].'</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content  dnone padb20 " style="display: none;">
				<ul class="mar0 pad0  fsz14">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Bankgiro med OCR :</a>
				</div>
				<span class="fxshrink_0 marrl50">'.$posted_value['bankgiro_med'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Bankgiro utan OCR :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['bankgiro_utan'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">IBAN :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['iban'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">BIC :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['bic'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">Bank :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['bank'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#" class="black_txt">F tax :</a>
				</div>
				<span class="fxshrink_0 marl100">'.$posted_value['ftax'].'</span>
				</li>
				
				</ul>
				</div>
				</div>';
			}
			else
			{
				$forc="";
			}
			$org='<div class="padb0 ">
			<h2 class="tall marb5 pad0 bold fsz24 black_txt">Verifiera</h2>
			<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
			
			
			
			<div class="wi_100 marb10 tall">
			
			<span class="valm fsz16">Signera dina ändrade uppgifter</span>
			</div>
			
			
			</div>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="padtb0 brdrad3 lgtgrey2_bg">
			
			<div class="mart0" id="search_data">
			
			
			'.$general.
			' '.$va.' 
			'.$bypost.' '.$byphone.
			' '.$fors.
			' '.$forc.'
			
			
			
			</div>
			
			</div>
			
			</div>
			<form method="POST" action="../updateAccount/'.$data['cid'].'" id="save_indexing" name="save_indexing" >
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="submit_value_company();">Signera med Mobilt BankId</a> 
			<input type="hidden" id="total_value" name="total_value" value="'.str_ireplace('"',"'",$_POST['total_value']).'" />
			</div>
			</form>';
			
			
			
			return $org;
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
			$stmt = $dbCon->prepare("select id from whitelist_ip where company_id=? and ip_address=? and ip_type=1");
			
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
		
		function getBookId($data)
		{
			
			$book_id= $this -> encrypt_decrypt('decrypt',$data['bid']);
			return $book_id;
			
		}
		
		function verificationId($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id) as v_id from company_passport_logs where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$row['v_id']="";
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
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
		
		function completedEmployeeRequests($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1");
			/* bind parameters for markers */
			$cont=1;
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
		function updateDataPost($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataPostSupplier($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("sssssssssi", $_POST['addrssi'],$_POST['citysi'],$_POST['cntrysi'],$_POST['zipsi'],$_POST['addrssd'],$_POST['citysd'],$_POST['cntrysd'],$_POST['zipsd'],$_POST['vat'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataPostNew($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssi", $_POST['addrs'],$_POST['city'],$_POST['cntry'],$_POST['zip'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function countryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org="";
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['country_name'].",";
			}
			
			$org=substr($org,0,-1);
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
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
		
		
		function industryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select name from company_categories");
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org="";
			while($row = $result->fetch_assoc())
			{
				$org=$org.$row['name'].",";
			}
			
			$org=substr($org,0,-1);
			//echo $org; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function industryListOpt($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,name from company_categories");
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
		
		function updateDataPhone($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update company_profiles set phone_country=?,phone=? where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['c_phone'],$_POST['phone'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateImage($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$data1 = strip_tags($_POST['image-data1']);
			//echo $data; die;
			define('UPLOAD_DIR','../estorecss/'); // image dir path
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			//echo $img_name1; print_r($_POST); die;
			$stmt = $dbCon->prepare("update company_profiles set profile_pic=?  where company_id=?");
			
			$stmt->bind_param("si", $img_name1,$company_id);
			$stmt->execute();
			// echo "jain"; die;
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updateData($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			//  print_r($_POST); die;
			$stmt = $dbCon->prepare("update companies set company_name=?,industry=?  where id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['name'],$_POST['l_name'],$company_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update company_profiles set cid=?,founded=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $_POST['ssn'],$_POST['dob'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateDataBank($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update company_profiles set bankgiro_med=?,bankgiro_utan=?,iban=?,bic=?,bank=?,f_tax=?  where company_id=?");
			
			
			/* bind parameters for markers */
			$stmt->bind_param("ssssssi", $_POST['bankgiro_med'],$_POST['bankgiro_utan'],$_POST['iban'],$_POST['bic'],$_POST['bank'],$_POST['ftax'],$company_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
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
		function informEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select company_name,exposed_times from whitelist_company where company_id = ? and status=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_company = $result->fetch_assoc();
			$exposed=$row_company['exposed_times'];
			
			$stmt = $dbCon->prepare("select email from employees where id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("i",$_POST['ind']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("insert into company_visitors (booked,company_id,employee_id,name,last_name,company_name,email,country,phone_number,created_on,car_res_num )values (?, ?, ?, ?, ?, ?, ?, ?, ?, now(),?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("siisssssis",$_POST['booked'],$company_id,$_POST['ind'],htmlentities($_POST['name'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['lname'],ENT_NOQUOTES, 'ISO-8859-1'),htmlentities($_POST['cname'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['email'],$_POST['cntry'],$_POST['uphno'],$_POST['car_res_num']);
			if($stmt->execute())
			{
		
				$id=$stmt->insert_id;
				$to      = $row['email'];
				$subject = "Your visitor is here";
				
				$emailContent ="Pls attend to your visitor. They are downstairs at ".$row_company['company_name'];
				sendEmail($subject, $to, $emailContent);
				$exposed=$exposed+1;
				
				$stmt = $dbCon->prepare("select country_code,phone_number,passport_image  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone left join user_logins on user_logins.id=user_profiles.user_logins_id where user_profiles.user_logins_id=(select user_login_id from employees where id=?)");
				
				$stmt->bind_param("i",$_POST['ind']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$phone='+'.trim($row['country_code']).''.trim($row['phone_number']);
				$subject='Your visitor is here';
				$to=$phone;
				$html=$_POST['name'].' '.$_POST['lname'].' from '.$_POST['cname'].' is here to meet you at '.$row_company['company_name'];
				//echo $html.' '.$to;
				$res=sendSms($subject, $to, $html);
				$res=json_decode($res,true);
				//print_r($res); //die;
				if($res['status']=="OK")
				{
				$exposed=$exposed+1;
				}
				
				$stmt = $dbCon->prepare("update whitelist_company set exposed_times=? where company_id = ? and status=1");
				/* bind parameters for markers */
				$stmt->bind_param("ii", $exposed,$company_id);
				$stmt->execute();
				
				
				$enc_id=$this->encrypt_decrypt('encrypt',$id);
				$url='https://www.safeqloud.com/user/index.php/Company/confirmVisit/'.$enc_id;
				$surl=getShortUrl($url);
				
				$stmt = $dbCon->prepare("select country_code,phone_number from company_visitors left join phone_country_code on phone_country_code.country_name=company_visitors.country where company_visitors.id=?");
				
				$stmt->bind_param("i",$id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row_phone = $result1->fetch_assoc();
				
				$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
				$subject='Confirm Your visit';
				$to=$phone;
				$html='Hej '.$_POST['name'].', Jag är där alldeles strax.  '.$surl;
				//echo $html.' '.$to;
				$res=sendSms($subject, $to, $html);
				
				function base64_to_jpeg($base64_string, $output_file) {
					// open the output file for writing
					$ifp = fopen( $output_file, 'wb' ); 
					
					// split the string on commas
					// $data[ 0 ] == "data:image/png;base64"
					// $data[ 1 ] == <actual base64 string>
					$data = explode( ',', $base64_string );
					//print_r($data); die;
					// we could add validation here with ensuring count( $data ) > 1
					fwrite( $ifp, base64_decode( $data[1] ) );
					
					// clean up the file resource
					fclose( $ifp ); 
					
					return $output_file; 
				}
				
				if($row ['passport_image']!=null) { $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; } }  else {  $imgs="../../../../../html/usercontent/images/default-profile-pic.jpg"; $value_a="../../../../../html/usercontent/images/default-profile-pic.jpg"; }
				
				$org='<div class="marb20">
				<img src="'.$imgs.'" class="maxwi_100 hei_auto">
				</div>
				<h2 class="marb10 pad0 bold fsz24 black_txt">Din ankomst är meddelad</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Var god och vänta ett par minuter.</span>
				</div>
				
				
				</div>
				
				<div class="on_clmn mart10 marb20">
				<input type="button" value="Close" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp " onclick="closePop();">
				
				</div>';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			else
			{
				$org='
				<h2 class="marb10 pad0 bold fsz24 black_txt">Some Error Occured</h2>
				
				<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb10 talc">
				
				<span class="valm fsz16">Please report to web admin</span>
				</div>
				
				
				</div>
				
				<div class="on_clmn mart10 marb20">
				<input type="button" value="Close" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp " onclick="closePop();">
				
				</div>';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
	}						