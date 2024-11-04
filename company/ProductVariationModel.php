<?php
	require_once('../AppModel.php');
	class ProductVariationModel extends AppModel
	{
		function addService($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$a=explode(',',substr($_POST['service_type'],0,-1));
			foreach($a as $key)
			{
			 $stmt = $dbCon->prepare("insert into eshop_available_services(company_id, category_id,service_id,created_on)
			values(?, ?, ?, now())");
			$stmt->bind_param("iii",$company_id, $_POST['w_category'] ,$key);
			$stmt->execute();
			 
			}
		  
			$stmt->close();
			$dbCon->close();
			return 1; 
			 
		 
			
		}
		
		
		 function addVariation($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$c_name=htmlentities($_POST['c_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$stmt = $dbCon->prepare("insert into product_variation(company_id,variation_name,created_on,display_type,variation_mode)values(?, ?, now(), ?, ?)");
			$stmt->bind_param("isii",$company_id,$c_name,$_POST['d_type'],$_POST['v_mode']);
			 
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				
				$stmt = $dbCon->prepare("update product_sub_variation set variation_id=?  where FIND_IN_SET(id,?)");
				$stmt->bind_param("is",$id,$_POST['subId']);
				$stmt->execute();
				 
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
		
		 
		 function addSubVariation()
		{
			$dbCon = AppModel::createConnection();
			$c_name=htmlentities($_POST['v_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$stmt = $dbCon->prepare("insert into product_sub_variation(subvariation_name,created_on,color_code)values(?, now(), ?)");
			$stmt->bind_param("ss",$c_name,$_POST['c_code']);
			 
			 
			if($stmt->execute())
			{
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $id;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		
		 function updateSubVariation()
		{
			$dbCon = AppModel::createConnection();
			$c_name=htmlentities($_POST['v_name'],ENT_NOQUOTES, 'ISO-8859-1');
			 
			$stmt = $dbCon->prepare("update product_sub_variation set subvariation_name=?,color_code=? where id=?");
			$stmt->bind_param("ssi",$c_name,$_POST['c_code'],$_POST['id']);
			 
			 
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
		
		 function deleteSubVariation()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("delete from product_sub_variation where id=?");
			$stmt->bind_param("i",$_POST['id']);
			 
			 
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			 
		}
	
		 function variationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select *  from product_variation  where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				array_push($org,$rowAvailable);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 
		
		   
		
		  function moreVariationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select product_variation.id,variation_name,company_name  from product_variation left join companies on companies.id=product_variation.company_id  where company_id=? limit ?,?");
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			if($a%2==0)
				{
					$i=1;
				}
				else
				{
					$i=0;
				} 
			while($rowAvailable = $result->fetch_assoc())
			{
				if($i%2==0)
				{
					$bg='white_bg';
				}
				else
				{
					$bg='lgtgrey_bg';
				} 
				$enc= $this -> encrypt_decrypt('encrypt',$rowAvailable['id']);
				$org=$org.'<a href="#"><div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" '.$bg.'   bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($rowAvailable['variation_name'],0,1).'</div>
																	</div>
													
													<div class="fleft  wi_60 xs-wi_70    xs-mar0  ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">'.substr($rowAvailable['company_name'],0,20).'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt">'.$rowAvailable['variation_name'].'</span>  </div>
													 
											 
													
													 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40    padb0">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea" aria-hidden="true"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											</a>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 function productVariationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from product_variation  where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAvailable = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $rowAvailable;
			
			
		}
		
	 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=44");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
		
	 
		
	 
			function teamId($data)
		{
			
			return $this -> encrypt_decrypt('decrypt',$data['team_id']);
		}
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',44);
		}
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=44");
			
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
		
		 
		
	}						