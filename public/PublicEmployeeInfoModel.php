<?php

	require_once('../AppModel.php');
	class PublicEmployeeInfoModel extends AppModel
	{
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
			function verifyUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select company_id,user_login_id  from employees where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select d_country,phone,email,mobile,title,country_code from user_company_profile left join phone_country_code on user_company_profile.c_id=phone_country_code.country_name  where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row_emp['company_id'],$row_emp['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_profile = $result->fetch_assoc();
			
			$phone="+".trim($row_profile['country_code'])."".trim($row_profile['phone']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$to=$row_profile['email'];
			sendEmail($subject, $to, $html);
				$stmt = $dbCon->prepare("insert into verify_user_phone (otp,created_on) values(?, now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $num);
				$stmt->execute();
				$id=$stmt->insert_id;
				$stmt->close();
				$dbCon->close();
				return $id;
			
		}
		
		
		
		
		function userCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name from country where id>0 and id<240 order by country_name");
			
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
		
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=34");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function savedCards($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select company_name,saved_employee_quard.id,employee_id,first_name,last_name from saved_employee_quard left join employees on employees.id=saved_employee_quard.employee_id left join companies on companies.id=employees.company_id where quard_permission_id=(select id from employee_qard_permission where employee_id=?) limit 0,20");
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$j++;
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function moreSavedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$a=$_POST['id']*20+1;
			$b=20;
			$stmt = $dbCon->prepare("select company_name,saved_employee_quard.id,employee_id,first_name,last_name from saved_employee_quard left join employees on employees.id=saved_employee_quard.employee_id left join companies on companies.id=employees.company_id where quard_permission_id=(select id from employee_qard_permission where employee_id=?) limit ?,?");
			$stmt->bind_param("iii", $employee_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc=$this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$org=$org.'	<div class=" white_bg mart20  brdrad3 box_shadow bg_fffbcc_a" style="">
																		<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
																			<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																				<!--<div class="clear hidden-xs"></div>-->

																				<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12">

																					<div class="fleft wi_30 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Fullname">Fullname</span>


																						<a href="#" class="dark_grey_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['first_name']." ".$row['last_name'].'</span></a> </div>



																					<div class="fleft wi_20 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Company name">Company name</span>


																						<a href="#" class="dark_grey_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['company_name'].'</span></a> </div>
																					<div class="fright wi_10 padl0 xs-wi_100 sm-wi_100 marl0 fsz40  xs-mar0 padb0">
																						<a href="../companyAccount/'.$enc.'" ><span class="fas fa-arrow-alt-circle-right"></span></a>
																					</div>
																					
																				</div>





																			</div>
																			<div class="clear"></div>
																		</div>


																	</div>';
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function quardPermission($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select id from employee_qard_permission where employee_id=?");
			$stmt->bind_param("i", $employee_id);
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
		
		function checkEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select id,employee_id from employee_qard_permission where personal_code=? and password=?");
			$pswd=md5($_POST['pswd']);
			$stmt->bind_param("ss", $_POST['p_id'],$pswd);
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
				if($row['employee_id']==$employee_id)
				{
					$stmt->close();
					$dbCon->close();
					return 3;
				}
			$stmt = $dbCon->prepare("select id from saved_employee_quard where quard_permission_id=? and employee_id=?");
			
			$stmt->bind_param("ii", $row['id'],$employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_saved = $result->fetch_assoc();	
			if(empty($row_saved))
			{
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			
			}
		}
		
		
		function verifyEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select id from employee_qard_permission where personal_code=? and password=? and employee_id=?");
			$pswd=md5($_POST['pswd']);
			$stmt->bind_param("ssi", $_POST['p_id'],$pswd,$employee_id);
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
		
		
		
		
		function saveQardInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select id from employee_qard_permission where personal_code=? and password=?");
			$pswd=md5($_POST['password']);
			$stmt->bind_param("ss", $_POST['p_code'],$pswd);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		
			$stmt = $dbCon->prepare("insert into saved_employee_quard(employee_id,quard_permission_id,created_on) values (?, ?, now())");
			$stmt->bind_param("ii",$employee_id,$row['id']);
			$stmt->execute();	
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select user_logins.created_on,bg_color,f_color,companies.country_id,company_profiles.phone as cphone,passport_image,company_name,country.country_name,user_logins.email,user_logins.first_name,user_logins.last_name,phone_number,phone_country_code.country_code,employees.user_login_id,employees.company_id from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name left join corporate_color on companies.id=corporate_color.company_id  where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_veri = $result->fetch_assoc();
			if(empty($row_veri))
			{
				$row_veri['v_id']="";
			}
			
			
			
			$stmt = $dbCon->prepare("select d_country,phone,email,mobile,title,country_code from user_company_profile left join phone_country_code on user_company_profile.c_id=phone_country_code.country_name  where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_profile = $result->fetch_assoc();
			//print_r($row_profile); die;
			if($row['user_login_id']==43)
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
				
			}
			else
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where id in(select location_id from employee_location where employee_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
			if(empty($row_location))
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();		
			}
			}
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=?)");
			$stmt->bind_param("i",$row['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
			$stmt->bind_param("s",$row_profile['d_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_mobile = $result->fetch_assoc();
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$row['phone']=$row_profile['phone'];
			$row['work_email']=$row_profile['email'];
			$row['mobile']=$row_profile['mobile'];
			if($row_profile['title']==null || $row_profile['title']=='-' || $row_profile['title']=='') { $row_profile['title']='Employee'; }  
		$row['title']=$row_profile['title'];
			$row['location']=$row_location['visiting_address'];
			$row['employee_country_code']=$row_profile['country_code'];
			$row['company_country_code']=$row_phone['country_code'];
			$row['mobile_country_code']=$row_mobile['country_code'];
			$row['v_id']=$row_veri['v_id'];
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function shareEmployeeInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			
			$stmt = $dbCon->prepare("select id,total_share from employee_info_shared where employee_id=? and country_id=? and phone_number=?");
			$stmt->bind_param("iis", $employee_id,$_POST['country_id'],$_POST['phoneno']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=?)");
			$stmt->bind_param("i",$_POST['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phone = $result->fetch_assoc();
			
			
			
			$to = '+'.trim($row_phone['country_code']).''.trim($_POST['phoneno']);
			$subject       = "Connect request received!";
			$url="https://www.qloudid.com/public/index.php/PublicEmployeeInfo/companyAccount/".$data['eid'];
			$surl=getShortUrl($url);
			$emailContent ="You have been invited to visit employee information page. please check here ".$surl;
			$res=sendSms($subject, $to, $emailContent);
			
			if(empty($row))
			{
			$count=1;
			$stmt = $dbCon->prepare("insert into employee_info_shared(employee_id,country_id,phone_number,country_code,total_share,created_on,modified_on) values (?, ?, ?, ?, ?, now(), now())");
			$stmt->bind_param("iisii",$employee_id,$_POST['country_id'],$_POST['phoneno'],$row_phone['country_code'],$count);
			$stmt->execute();	
			}
			else
			{
			$count=$row['total_share']+1;
			$stmt = $dbCon->prepare("update employee_info_shared set total_share=? ,modified_on= now() where id=?");
			$stmt->bind_param("ii",$count,$row['id']);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	
		function shareEmployeeInformationEmail($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			
			$stmt = $dbCon->prepare("select id,total_share from employee_info_shared where employee_id=? and email_id=?");
			$stmt->bind_param("is", $employee_id,$_POST['email_info']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$to = $_POST['email_info'];
			$subject       = "Connect request received!";
			$url="https://www.qloudid.com/public/index.php/PublicEmployeeInfo/companyAccount/".$data['eid'];
			
			$emailContent ="You have been invited to visit employee information page. please check <a href='".$url."'>here</a> ";
			sendEmail($subject, $to, $emailContent);
			
			if(empty($row))
			{
			$count=1;
			$stmt = $dbCon->prepare("insert into employee_info_shared(employee_id,email_id,total_share,created_on,modified_on) values (?, ?, ?, now(), now())");
			$stmt->bind_param("isi",$employee_id,$_POST['email_info'],$count);
			$stmt->execute();	
			}
			else
			{
			$count=$row['total_share']+1;
			$stmt = $dbCon->prepare("update employee_info_shared set total_share=? ,modified_on= now() where id=?");
			$stmt->bind_param("ii",$count,$row['id']);
			$stmt->execute();	
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	
	
	
	}		