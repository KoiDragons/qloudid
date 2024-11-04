<?php
	require_once('../AppModel.php');
	class CompanyPropertyModel extends AppModel
	{
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from phone_country_code order by country_name");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			return $contry;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		function selectCountryCode()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code  order by country_code");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$contry = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($contry, $row);
			}
			return $contry;
			$stmt->close();
			$dbCon->close();
			
		}
		function addLocationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['latit']."&lon=".$_POST['longi']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			
			$fields['city']=$response['address']['city'];
			$fields['state']=$response['address']['state']; 
			$fields['lat']=$_POST['latit'];
			$fields['lon']=$_POST['longi'];
			 if($_POST['same_invoice']==1)
				{
					 $_POST['iaddress']=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
					 $_POST['icity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				}
				else
				{
				$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['icity']=htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1');	
				}
				$_POST['daddress']=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['dcity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
			$stmt = $dbCon->prepare("INSERT INTO property_location (company_id,property_id,visiting_address,created_on, is_headquarter,port_number) VALUES ( ?, ?, ?, now(), ?, ?)");
			$stmt->bind_param("iisis", $company_id,$_POST['property_id'],htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['is_headquarter'],$_POST['port_number']);
			$stmt->execute();
					 
			$property_id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("update property_location set street_name_i=?, city_i=?, postal_code_i=?, street_name_v=?, city_v=?, postal_code_v=?, d_port_number=?,i_port_number=?,is_invoice_same=?,country_v=?,country_i=?,longitude=?,latitude=?,phone_number=?,visiting_city=?,visiting_state=?   where id=?");
				/* bind parameters for markers */
			$stmt->bind_param("ssssssssisssssssi", $_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['country_v'],$_POST['country_i'],$fields['lon'],$fields['lat'],$_POST['phone_number'],$fields['city'],$fields['state'],$property_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select  * from property_location where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_property = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select company_email from companies where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$fields=array();
			$fields=$row_property;
			$fields['company_email']=$row['company_email'];
			$fields_post=array();
			$fields_post['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/addProperty';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields_post));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_post);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//	echo curl_error($ch);
			//echo $status_code; die;
			curl_close ($ch);
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateLocationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['latit']."&lon=".$_POST['longi']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			//print_r($response); 
			$fields['city']=$response['address']['city'];
			$fields['state']=$response['address']['state'];
			$fields['country']=$response['address']['country'];
			$fields['lat']=$_POST['latit'];
			$fields['lon']=$_POST['longi'];
			 //print_r($fields); die;
			if($_POST['same_invoice']==1)
				{
					 $_POST['iaddress']=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
					 $_POST['icity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
					 $_POST['izip']=$_POST['dzip'];
					 $_POST['i_port_number']=$_POST['d_port_number'];
				}
				else
				{
				$_POST['iaddress']=htmlentities($_POST['iaddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['icity']=htmlentities($_POST['icity'],ENT_NOQUOTES, 'ISO-8859-1');	
				}
				$_POST['daddress']=htmlentities($_POST['daddress'],ENT_NOQUOTES, 'ISO-8859-1');
				$_POST['dcity']=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$stmt = $dbCon->prepare("update property_location set   is_headquarter=?,property_id=?,visiting_address=?,port_number=?,street_name_i=?, city_i=?, postal_code_i=?, street_name_v=?, city_v=?, postal_code_v=?, d_port_number=?,i_port_number=?,is_invoice_same=?,country_v=?,country_i=?,longitude=?,latitude=?,phone_number=?,visiting_city=?,visiting_state=? where id=?");
				
				
				$stmt->bind_param("iissssssssssisssssssi", $_POST['is_headquarter'],$_POST['property_id'],htmlentities($_POST['adrs1'],ENT_NOQUOTES, 'ISO-8859-1'),$_POST['port_number'],$_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$fields['country'],$_POST['country_i'],$fields['lon'],$fields['lat'],$_POST['phone_number'],$fields['city'],$fields['state'],$property_id);
				$stmt->execute();
			
			$stmt = $dbCon->prepare("select  * from property_location where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_property = $result->fetch_assoc();
			if($row_property['is_headquarter']==1)
			{
			$stmt = $dbCon->prepare("update company_profiles set  longitude=?,latitude=?,si_address=?, si_city=?, si_zip=?, sd_address=?, sd_city=?, sd_zip=?, d_port_number=?,i_port_number=?,is_invoice_same=?,sd_country=?,si_country=?,phone=? where company_id=?");
				
				
			$stmt->bind_param("ssssssssssisssi",$fields['lon'],$fields['lat'],$_POST['iaddress'],$_POST['icity'],$_POST['izip'],$_POST['daddress'],$_POST['dcity'],$_POST['dzip'],$_POST['d_port_number'],$_POST['i_port_number'],$_POST['same_invoice'],$_POST['country_v'],$_POST['country_i'],$_POST['phone_number'],$row_property['company_id']);
			$stmt->execute();	
			}
			$fields=array();
			$fields=$row_property;
			
			$fields_post=array();
			$fields_post['posted']= $this -> encrypt_decrypt('encrypt',serialize($fields));
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/updateProperty';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch,CURLOPT_POST, count($fields_post));
			curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_post);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//	echo curl_error($ch);
			//echo $status_code; die;
			curl_close ($ch);
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function headquarterDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,created_on,is_headquarter,rent_permises,offer_education,add_employee from property_location left join property on property.id=property_location.property_id where company_id=? and is_headquarter=1 order by created_on desc limit 0,50");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			
			$stmt = $dbCon->prepare("select count(id) num from company_landloard  where property_id=?");
        
        /* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowcount = $result->fetch_assoc();
			$row['count']=$rowcount['num'];
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,created_on,is_headquarter,rent_permises,port_number from property_location left join property on property.id=property_location.property_id where company_id=? and is_headquarter=0 order by created_on desc limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$stmt = $dbCon->prepare("select count(id) num from company_landloard  where property_id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultcount = $stmt->get_result();
				$rowcount = $resultcount->fetch_assoc();
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['count']=$rowcount['num'];
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function locationDetailnfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,created_on,is_headquarter,rent_permises,offer_education,add_employee from property_location left join property on property.id=property_location.property_id where property_location.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select count(id) num from company_landloard  where property_id=?");
        
				/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultcount = $stmt->get_result();
			$rowcount = $resultcount->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$row['count']=$rowcount['num'];
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function headquarterCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from property_location where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function locationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from property_location where company_id=? and is_headquarter=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function checkAddress()
		{
			$dbCon = AppModel::createConnection();
			$address=str_replace(' ', '%20',urldecode($_POST['address'])); 
			$url = "http://api.locationiq.com/v1/autocomplete.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&q=".$address;
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			if(isset($response['error']))
			{
			
			return 0;	
			}
			else
			{
				
			return $responseJson;
			}
				
		}
		
		function checkAddresslatLong()
		{
			$dbCon = AppModel::createConnection();
			
			$address=str_replace(' ', '%20',urldecode($_POST['address'])); 
			$url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=".$_POST['lat']."&lon=".$_POST['lon']."&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
			 
			if(isset($response['error']))
			{
			
			return 0;	
			}
			else
			{
				
			return $responseJson;
			}
				
		}
		
		
		function propertyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select  * from property_location where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['cid']=$this -> encrypt_decrypt('encrypt',$row['company_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function propertyDetailInfo()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select  * from property order by property_name");
			/* bind parameters for markers */
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
			 
			$stmt = $dbCon->prepare("select grading_status ,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,companies.country_id from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
    	
		
		function moreLocationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,created_on,is_headquarter,rent_permises from property_location left join property on property.id=property_location.property_id where company_id=? and is_headquarter=0 order by created_on desc limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org2="'".$org1."'";
				
				$stmt = $dbCon->prepare("select count(id) num from company_landloard  where property_id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultcount = $stmt->get_result();
				$rowcount = $resultcount->fetch_assoc();
				
				if($rowcount['num']==0 || ($data['rent_p']==1 && $row['rent_permises']==0))
				{
					$request='<div class="fright wi_10 padl0 fsz40   marl10 padb0 hidden-xs">
														<a href="../../CompanyProperty/officesTodo/'.$org1.'" ><span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span></a>
													</div>';					
				}
				else
				{
					$request='<div class="fright wi_10 padl0 fsz40  marl10 padb0 hidden-xs">
														<a href="../../CompanyOffices/companyAccount/'.$org1.'" ><span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span></a>
													</div>';
				}
				
				 
				$org=$org.'<div class=" white_bg marb5 brdb bg_fffbcc_a" style="">
										<div class="container padrl10 padtb15 brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
											 
												
												<div class="wi_100 xs-wi_100 xs-order_3 fsz12">
													
													<div class="fleft wi_50p marr15 hidden"> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" >'.substr(html_entity_decode($row['property_name']),0,1).'</div>
																	</div>
												
													<div class="fleft wi_85 xxs-wi_100"> <span class="trn fsz18 bold" data-trn-key="Kontor">Kontor</span>
													 <a href="../editProperty/'.$data['cid'].'/'.$org1.'" class="dark_grey_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock   brdclr_lgtgrey2 fsz14">'.$row['visiting_address'].'</span></a> </div>
													'.$request.'
													<div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz35  padb0 hidden">
														<a href="../editProperty/'.$data['cid'].'/'.$org1.'"><span class="far fa-edit grey_txt  "></span></a>
													</div>
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
								 
									</div>  ';
				
				
			
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	function refuseRent($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$_POST['location_id']);
			
			$stmt = $dbCon->prepare("update property_location set rent_permises=2 where id=?");
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function refuseOffer($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$_POST['location_id_offer']);
			
			$stmt = $dbCon->prepare("update property_location set offer_education=2 where id=?");
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function refuseEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$_POST['location_id_employee']);
			
			$stmt = $dbCon->prepare("update property_location set add_employee=2 where id=?");
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function acceptRent($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$_POST['location_id_yes']);
			
			$stmt = $dbCon->prepare("update property_location set rent_permises=1 where id=?");
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	}
