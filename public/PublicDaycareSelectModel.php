<?php
	require_once('../AppModel.php');
	class PublicDaycareSelectModel extends AppModel
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
		function getPermissionDetail()
		{
			$dbCon = AppModel::createConnection();
			$country_id= 201;
			$stmt = $dbCon->prepare("select manage_apps_permission.id,is_permission,app_name,is_business,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  and is_permission=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
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
		
		
		function changeCountry()
		{
			$dbCon = AppModel::createConnection();
			$country_id= $_POST['cid'];
			$stmt = $dbCon->prepare("select manage_apps_permission.id,is_permission,app_name,is_business,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  and is_permission=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row['is_business']==1)
				{
					$business='Business';
				}
				else
				{
				$business='Personal';
				}
				
				
				$org=$org.'	<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc " >
														<div class="toggle-parent wi_100 dflex alit_s white_bg" >
															<div class="wi_100 dnone_pa ">
																<a href="PublicAppStore/productPage/'.$enc.'" class="style_base hei_240p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
																	<div class="trf_y-12p_ph trans_all2">
																		<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
																			<span class="dblock wi_100 maxwi_100p  maxhei_100p padtb5  fsz50 black_txt">
																				<span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x '.$row['app_bg'].'"></i>
																				  <i class="black_txt '.$value['app_icon'].'" ></i>
																				</span></span>
																		</div>
																		
																		<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
																			<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">'.$row['app_name'].'</h3>
																			<span class="dblock marb5 midgrey_txt">'.$business.'</span>
																			<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
																		</div>
																	</div>
																</a>
															</div>
															
															<div class="wi_100 hide dblock_pa style_base hei_190p  bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
																<h3 class="marb15 talc bold fsz16">Medlemskap HR</h3>
																<div class="marb10 padrl20">
																	<a href="#" class=" dblock blue_bg talc lgn_hight_40 white_txt" data-target="#pipefy_sliding_modal">läs mer</a>
																</div>
																<div class="padrl20">
																	<a href="PublicAppStore/productPage/'.$enc.'" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">Besök sidan</a>
																</div>
															</div>
														</div>
													</div>
												';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function getAppsPermissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			
			
			
			$stmt = $dbCon->prepare("select country_id,manage_apps_permission.id,is_permission,app_name,presentation,funktioner,nyheter,is_downloaded,image_path,app_id,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where manage_apps_permission.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function getAppsPermissionDetailRight($data)
		{
			$dbCon = AppModel::createConnection();
			
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select app_id from manage_apps_permission where manage_apps_permission.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row1 = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select apps_detail.id,is_permission,is_business,app_name,presentation,funktioner,nyheter,is_downloaded,image_path,app_id ,app_icon,app_bg from apps_detail left join manage_apps_permission on apps_detail.id=manage_apps_permission.app_id where apps_detail.id!=? and apps_detail.id in(select id from apps_detail where company_id=(select company_id from apps_detail where id=?)) and country_id=?  and is_permission=1 order by app_name");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $row1['app_id'],$row1['app_id'],$data['country_id']);
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
		
		function countryList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name from country where id>-1 and is_visible=1");
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
			
		
		
		}		