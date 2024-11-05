<?php
	require_once('../AppModel.php');
	class UserSuppliersModel extends AppModel
	{
		 function sendRequest($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select id from user_suppliers  where user_login_id=? and company_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $data['user_id'],$company_id);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		if(empty($row))
		{
			 $stmt = $dbCon->prepare("INSERT INTO user_suppliers (user_login_id, company_id, created_on) VALUES (?, ?, now())");
            
           
             $stmt->bind_param("ii", $data['user_id'],$company_id);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("select company_email from companies  where id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		
		$to=$row['company_email'];
		$subject="Supplier request received";
		$emailContent="Supplier request has been received. To approve/reject please click <a href='https://www.qloudid.com/user/index.php/UserSupplierCompany/monitorAccount/".$data['cid']."'>here</a>";
		sendEmail($subject, $to, $emailContent);
		}
      
        
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	
		function searchCompanyDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_id from company_profiles where cid=?");
			
			// print_r($web); die;
			
			$stmt->bind_param("s", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$org='<div id="search_new">
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
				No result found
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				</div>';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			else
			{
				$stmt = $dbCon->prepare("select company_id,company_name,company_profiles.city,company_profiles.country,zip,address from company_profiles left join companies on companies.id=company_profiles.company_id where company_id=?");
				
				
				
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$company_id= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				$org='<div id="search_new " class="lgtgrey2_bg padtrl15">
				
				<form method="POST" action="sendRequest/'.$company_id.'" id="save_request_company" name="save_request_company">
				
				<div class="result-item padtb0 lgtgrey2_bg">
			<div class="dflex alit_c">
			<div class="flex_1">
			
			<div class="fsz16 dgrey_txt bold">
			<span class="marr5 valm">Allmän</span>
			<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
			<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
			</div>
			</div>
			<div class="fxshrink_0 dflex alit_c">
			
			<div class="wi_100p talr">
			<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
			<span>Visa mer</span>
			<span class="fa fa-caret-up dnone diblock_pa"></span>
			<span class="fa fa-caret-down dnone_pa"></span>
			</a>
			</div>
			</div>
			</div>
			<div class="sources-content dnone padb20 brdb" style="display: none;">
			<ul class="mar0 pad0 padt10 fsz14 ">
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Company</a>
			</div>
			<span class="fxshrink_0 marrl50">'.html_entity_decode(substr($row['company_name'],0,20)).'</span>
			</li>
			
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Address</a>
			</div>
			<span class="fxshrink_0 marrl50">'.html_entity_decode(substr($row['address'],0,20)).'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">City</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row['city'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Zipcode</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row['zip'].'</span>
			</li>
			<li class="dflex mart10  padb5">
			<div class="wi_50 ovfl_hid ws_now txtovfl_el">
			<a href="#">Country</a>
			</div>
			<span class="fxshrink_0 marl100">'.$row['country'].'</span>
			</li>
			
			</ul>
			</div>
			</div>
				
				<div class="mart0 padt15 lgtgrey2_bg">
			<label class="marb5  padl0">Select</label>
			<div class="pos_rel padb10">
			<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
				<select name="request_id" id= "request_id" class="txtind25 default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
				<option value="1">Supplier</option>
				
				</select>
				</div>
				</div>
				</form>
				
				
				</div>
				
				<div class="mart20 talc">
				
				<a href="#"><input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkRequest();"/></a>
				
				</div>
				';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		function searchUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//print_r($_POST); die;
			$stmt = $dbCon->prepare("select first_name,last_name  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			if(isset($_POST['id']))
			{
				$stmt = $dbCon->prepare("select user_id  from user_passport_logs where id=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $_POST['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_vid = $result->fetch_assoc();
					//print_r( $row_vid); die;
					if($row_vid['v_id']==$_POST['id'])
					{
						$stmt = $dbCon->prepare("select first_name,last_name,email  from user_logins where id=?");
						
						/* bind parameters for markers */
						$stmt->bind_param("i", $row['user_id']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_request = $result->fetch_assoc();
						
						$st=3;
						$d=date('Y-m-d h:i:s');
						$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,user_code) values(?,?, ?, ?, ?)");
						
						/* bind parameters for markers */
						//echo $data['user_id']." ".$row['user_id']." ".$d;
						$stmt->bind_param("iiisi", $st,$data['user_id'],$row['user_id'],$d,$_POST['id']);
						$stmt->execute();
						$rsultId=$stmt->insert_id;
						$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
						$to      = $row_request['email'];
						$subject = "Qloudid : Request to access your details";
						
						$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'';
						sendEmail($subject, $to, $emailContent);
						
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
			
			else if(isset($_POST['email_id']))
			{
				$stmt = $dbCon->prepare("select id  from user_logins where email=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					
					$stmt = $dbCon->prepare("select first_name,last_name,email  from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_request = $result->fetch_assoc();
					
					
					$d=date('Y-m-d h:i:s');
					$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,user_email) values(?, ?, ?, ?, ?)");
					$st=2;
					/* bind parameters for markers */
					//echo $data['user_id']." ".$row['user_id']." ".$d;
					$stmt->bind_param("iiiss", $st,$data['user_id'],$row['id'],$d,$_POST['email_id']);
					$stmt->execute();
					$rsultId=$stmt->insert_id;
					//echo $rsultId; die;
					$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
					$to      = $row_request['email'];
					$subject = "Qloudid : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'';
					sendEmail($subject, $to, $emailContent);
					
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
			}
			
			else if(isset($_POST['phoneno']))
			{
				$stmt = $dbCon->prepare("select user_logins_id  from user_profiles where country_phone=? and phone_number=?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ss", $_POST['countryname'],$_POST['phoneno']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				//print_r($row); die;
				if(empty($row))
				{
					return 0;
				}
				else
				{
					
					$stmt = $dbCon->prepare("select id,first_name,last_name,email  from user_logins where id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['user_logins_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_request = $result->fetch_assoc();
					
					
					$d=date('Y-m-d h:i:s');
					$stmt = $dbCon->prepare("insert into user_detail_requests(code_type,request_sender,request_receiver,created_on,country_user,phone_user) values(?, ?, ?, ?, ?,?)");
					$st=1;
					/* bind parameters for markers */
					//echo $data['user_id']." ".$row['user_id']." ".$d;
					$stmt->bind_param("iiisss", $st,$data['user_id'],$row_request['id'],$d,$_POST['countryname'],$_POST['phoneno']);
					$stmt->execute();
					$rsultId=$stmt->insert_id;
					//echo $rsultId; die;
					$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
					$to      = $row_request['email'];
					$subject = "Qloudid : Request to access your details";
					
					$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br>https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc;
					sendEmail($subject, $to, $emailContent);
					
					$stmt = $dbCon->prepare("select country_code,phone_number  from user_profiles left join phone_country_code on phone_country_code.country_name=user_profiles.country_phone where user_profiles.user_logins_id=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("i", $row_request['id']);
					$stmt->execute();
					$result_phone = $stmt->get_result();
					$row_phone = $result_phone->fetch_assoc();
					
					$phone='+'.trim($row_phone['country_code']).''.trim($row_phone['phone_number']);
					$subject='Informationen om din vän/anhörig';
					$to=$phone;
					$html='Du har blivit ombedd att identifiera dig. Qloud ID https://www.qloudid.com/user/index.php/PublicUserRequest/requestAccount/'.$enc;
					//echo $html.' '.$to;
					$res=sendSms($subject, $to, $html);
					$stmt->close();
					$dbCon->close();
					return 1;
					
				}
			}
			
		}
		
		
		function updateEmployeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt= $dbCon->prepare("select invited_user_id from invitation where unique_id=? and status=0");
			//echo $query; die;
			$stmt->bind_param("s", $_POST['unique_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_unique = $result->fetch_assoc();
			//print_r($_POST);
			//print_r($row_unique); die;
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code,country_of_residence from user_logins where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			//print_r($row_id); die;
			if(!empty($row_unique))
			{
				$request_id= $row_unique['invited_user_id'];
				
				$stmt= $dbCon->prepare("update estore_employee_invite set email=? where id=? ");
				$stmt->bind_param("si", $row_id['email'],$request_id);
				$stmt->execute();
				//echo "jain"; die;
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				//print_r($row_emp); die;
				$d=date('Y-m-d');
				
				$stmt= $dbCon->prepare("update invitation set status=1,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si", $d,$request_id);
				if($stmt->execute())
				{
					
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					//$stmt->execute();
					
					$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?)");
					
					//$company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
					$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
					if($stmt->execute())
					{
						
						
						$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
						$stmt->bind_param("ii", $row_id['id'],$request_id);
						$stmt->execute();
						
						
						$stmt= $dbCon->prepare("select mobile_p,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
						$stmt->bind_param("i", $request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_emp = $result->fetch_assoc();
						$company=$row_emp['company_id'];
						
						$stmt= $dbCon->prepare("update user_logins set dob_day=?,dob_month=?,dob_year=?,dob_day_p=?,dob_month_p=?, dob_year_p=? where id=?");
						$stmt->bind_param("iiiiiii", $row_emp['dob_day_p'],$row_emp['dob_month_p'],$row_emp['dob_year_p'],$row_emp['dob_day_p'],$row_emp['dob_month_p'],$row_emp['dob_year_p'],$row['id']);
						$stmt->execute();
						
						
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_company_profile where company_id=? and invited_user_id=?");
						$stmt->bind_param("ii", $company,$request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_virtual = $result->fetch_assoc();
						
						if(empty($row_virtual))
						{
							$stmt= $dbCon->prepare("insert into user_company_profile (company_id,user_login_id,title,email) values (?,?,?,?)");
							$stmt->bind_param("iiss", $company,$row_id['id'],$row_emp['title'],$row_emp['work_email']);
							$stmt->execute();
						}
						else
						{
							if($row_virtual['job_function']=="" || $row_virtual['job_function']==null)
							{
								$row_virtual['job_function']=1;
							}
							$stmt= $dbCon->prepare("insert into user_company_profile (location_id,job_function,ssn,e_number,description_job,e_type,h_date,res_date,company_id,user_login_id,title,department,phone,mobile,email,fax,skype,facebook,twitter,i_street,i_town,i_city,i_zip,i_country,d_street,d_town,d_city,d_zip,d_country,b_member,mentor,c_id,prospect,partner,supplier) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
							$stmt->bind_param("iissssssiisssssssssssssssssssssssss",$row_virtual['location_id'],$row_virtual['job_function'],$row_virtual['ssn'],$row_virtual['e_number'],$row_virtual['description_job'],$row_virtual['e_type'],$row_virtual['h_date'],$row_virtual['res_date'],$company,$row_id['id'],$row_virtual['title'],$row_virtual['department'],$row_virtual['phone'],$row_virtual['mobile'],$row_virtual['email'],$row_virtual['fax'],$row_virtual['skype'],$row_virtual['facebook'],$row_virtual['twitter'],$row_virtual['i_street'],$row_virtual['i_town'],$row_virtual['i_city'],$row_virtual['i_zip'],$row_virtual['i_country'],$row_virtual['d_street'],$row_virtual['d_town'],$row_virtual['d_city'],$row_virtual['d_zip'],$row_virtual['d_country'],$row_virtual['b_member'],$row_virtual['mentor'],$row_virtual['c_id'],$row_virtual['prospect'],$row_virtual['partner'],$row_virtual['supplier']);
							$stmt->execute();
						}
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_profiles where invited_user_id=?");
						$stmt->bind_param("i", $request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_uvirtual = $result->fetch_assoc();
						
						if(!empty($row_uvirtual))
						{
							$stmt= $dbCon->prepare("select id from user_profiles where user_logins_id=?");
							
							$stmt->bind_param("i", $row_id['id']);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_pro = $result->fetch_assoc();
							$d=date('Y-m-d');
							if(empty($row_pro))
							{
								$stmt= $dbCon->prepare("insert into user_profiles (mobile_p,nation,user_logins_id,created_on,modified_on,summary,zipcode,city,state,country,phone_number,address,marital_status,blog,skype,linkedln,facebook,twitter,instagram) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
								$stmt->bind_param("ssissssssssssssssss", $row_emp['mobile_p'],$row_uvirtual['nation'],$row_id['id'],$d,$d,$row_uvirtual['summary'],$row_uvirtual['zipcode'],$row_uvirtual['city'],$row_uvirtual['state'],$row_uvirtual['country'],$row_uvirtual['phone_number'],$row_uvirtual['address'],$row_uvirtual['marital_status'],$row_uvirtual['blog'],$row_uvirtual['skype'],$row_uvirtual['linkedln'],$row_uvirtual['facebook'],$row_uvirtual['twitter'],$row_uvirtual['instagram']);
								$stmt->execute();
							}
							else 
							{
								$stmt= $dbCon->prepare("update user_profiles set modified_on=?,summary=?,zipcode=?,city=?,state=?,country=?,phone_number=?,address=?,marital_status=?,blog=?,skype=?,linkedln=?,facebook=?,twitter=?,instagram=? where user_logins_id=?");
								$stmt->bind_param("sssssssssssssssi", $d,$row_uvirtual['summary'],$row_uvirtual['zipcode'],$row_uvirtual['city'],$row_uvirtual['state'],$row_uvirtual['country'],$row_uvirtual['phone_number'],$row_uvirtual['address'],$row_uvirtual['marital_status'],$row_uvirtual['blog'],$row_uvirtual['skype'],$row_uvirtual['linkedln'],$row_uvirtual['facebook'],$row_uvirtual['twitter'],$row_uvirtual['instagram'],$row_id['id']);
								$stmt->execute();
							}
						}
						
						
					}
					
				}
				
				
				$fields=array();
				$fields=$row_id;
				$fields['qloudid']=$request_id;
				$fields['stat']=1;
				//print_r($fields); die;
				$stmt= $dbCon->prepare("delete from  invitation where invited_user_id= ?");
				$stmt->bind_param("i",$request_id);
				//$stmt->execute();
				$stmt= $dbCon->prepare("delete from  estore_employee_invite where id= ?");
				$stmt->bind_param("i",$request_id);
				//$stmt->execute();
				$stmt= $dbCon->prepare("delete from  virtual_user_company_profile where invited_user_id= ?");
				$stmt->bind_param("i",$request_id);
				//$stmt->execute();
				$stmt= $dbCon->prepare("delete from  virtual_user_profiles where invited_user_id= ?");
				$stmt->bind_param("i",$request_id);
				//$stmt->execute();
				$url='https://www.qmatchup.com/beta/user/index.php/Invitation/updateQloud';
				$ch = curl_init();
				//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_URL,$url);
				curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
				curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
				curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
				//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
				curl_setopt($ch, CURLOPT_POST, true);
				//var_dump($ch);
				$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				//get status code
				//echo $status_code; die;
				$result=curl_exec ($ch);
				curl_close ($ch);
				//print_r($result) ; die;
				if($result==0)
				{
					//echo "none"; die;
					$stmt->close();
					$dbCon->close();
					return 0;
				}
				else
				{
					//echo "jain"; die;
					$stmt->close();
					$dbCon->close();
					return 1;
				}
			}
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		
		
		function createCompanyAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$st=1;
			$stmt = $dbCon->prepare("insert into companies(o_type,industry,country_id,user_login_id,currency_id,company_name,company_email,website,hash_code,created_date) 
			values(?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");
			
			/* bind parameters for markers */
			$stmt->bind_param("isiiisssss", $st,$data['inds'],  $data['country'], $data['user_id'], $data['curr'], $data['company_name'], $data['company_email'], $data['website'], $data['random_hash'], $data['created_on']);
			
			
			if (!$stmt->execute()) {
				$stmt->close();
				$dbCon->close();
				return 0;
				} else {
				$stmt = $dbCon->prepare("select id from companies where id not in(select company_id from user_company_profile where user_login_id=?) and user_login_id=?");
				
				/* bind parameters for markers*/
				$stmt->bind_param("ii", $data['user_id'], $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$myrow  = $result->fetch_assoc();
				// print_r($myrow); die;
				$stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`) values(?, ?)");
				
				$stmt->bind_param("ii", $myrow['id'], $data['user_id']);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("insert into location (company_id,country_id,state_id,city_id,district_id,location,created_on) values (?, ?, ?, ?, ?, ?, ?)");
				
				$stmt->bind_param("iiiiiss", $myrow['id'], $data['country'], $data['state'], $data['city'],$data['district'], $data['location'], $data['created_on']);
				$stmt->execute();
				
				
				
				$locationrow = $stmt->insert_id;
				
				$stmt        = $dbCon->prepare("insert into warehouse(`company_id`,`location_id`,`created_on`) values (?, ?, ?)");
				
				$stmt->bind_param("iis", $myrow['id'], $locationrow, $data['created_on']);
				$stmt->execute();
				$stmt->close();
				
				$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				$userrow = $result->fetch_assoc();
				
				$stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
				$status_emp = 0;
				$stmt->bind_param("ississii", $myrow['id'], $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $data['user_id'], $data['user_id']);
				$stmt->execute();
				
				$stmt       = $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
				$status_per = 1;
				$stmt->bind_param("iiiiiiiiiii", $myrow['id'], $data['user_id'], $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per);
				$stmt->execute();
				
				
				$stmt       = $dbCon->prepare("insert into company_verified (company_id,verified,unvarified,is_verified) values (?, ?, ?, ?)");
				$status_ver = 7;
				$stmt->bind_param("iiii", $myrow['id'], $status_emp, $status_ver, $status_emp);
				$stmt->execute();
				if (!$stmt->execute()) {
					$stmt->close();
					$dbCon->close();
					return 0;
					} else {
					$stmt->close();
					$dbCon->close();
					return 1;
				}
				
				
			}
			
			
		}
		
		function sendCreateCompanyEmail($data)
		{
			
			$to            = $data['company_email'];
			$company_email = $data['company_email'];
			$subject       = "Qmatchup - Please verify your Organization !";
			
			$emailContent = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title></title>
			</head>
			<body style="width:100%; background-color:#f5f5f5; margin:0; padding:0;" align="center">
			<div style="width:100%; background-color:#f5f5f5;" align="center">
			<div align="center" style="padding-top:20px; padding-bottom:20px; font-family:Arial, Helvetica, sans-serif; color:#6b6f74">
			<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
			<tr>
			<td align="right" scope="col" style="font-size:10px; color:#a7a9ac;"><div style="padding-bottom:5px; padding-top:5px;"> <a href="#" style="color:#a7a9ac; text-decoration:none;">View in browser</a> | <a href="#" style="color:#a7a9ac; text-decoration:none;">Read in Swedish</a> </div></td>
			</tr>
			<tr>
			<td><table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#3691c0" style="background-color:#3691c0;">
            <tr>
			<td scope="col" width="50%" align="left" valign="top" style="padding:25px;"><div style="color:#FFFFFF">
			<div style="font-size:36px;">Activate Organization </div>
			<div style="font-size:11px;">' . date("d/m/Y") . '</div>
			</div></td>
			<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/Newsletter/images/qmacthup.png" alt="Qmatchup" title="Qmatchup" style="font-size:35px; color:#FFFFFF;" /></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:18px">Dear <b>' . $company_email . '</b>,</div>
			<div style="font-size:14px; padding-top:20px;">
			<div style="padding-bottom:10px;"> Thank you! You have registered a Organization  to Qmatchup! </div>
			<div style="padding-bottom:10px;"> Please confirm your registration to activate the Organization  account. </div>
			
			</div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><a href="https://www.qloudid.com/company/index.php/Activation/activateAccount/' . $company_email . '/' . $data['random_hash'] . '" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Confirm Now</a></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:14px;">If the button is not working then copy/paste the link in your browser to confirm your registration <br />
			<a href="#" style="text-decoration:none; color:#3691c0;">https://www.qloudid.com/company/index.php/Activation/activateAccount/' . $company_email . '/' . $data['random_hash'] . ' </a></div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
			<div><b style="color:#6b6f74;">The Qmatchup team</b></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $company_email . '</a>. If you dont want to receive these emails from Qmatchup.com in the future, <br />
            please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.qloudid.com"></a> Qmatchup Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
			</tr>
			</table>
			</div>
			</div>
			</body>
			</html>';
			
			
			sendEmail($subject, $to, $emailContent);
			
		}
    	
		function selectOrganizationWeb($web)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from companies where company_email like ?");
			
			// print_r($web); die;
			
			$like = '%' . $web['web'];
			
			$stmt->bind_param("s", $like);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
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
		
		
		
		
		
		function selectIndustry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,name from company_categories where is_deleted=0 and is_live = 1");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org    = array();
			while ($row = $result->fetch_assoc()) {
				
				array_push($org, $row);
			}
			return $org;
			$stmt->close();
			$dbCon->close();
			
		}
		
		
		
		
		function selectCountry()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name  from country  where id>0 and id<240");
			
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
		
		
		function moreEmployerRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and (estore_employee_invite.email=? or estore_employee_invite.work_email=? )  and invitation.status=0 limit ?,?");
				$stmt->bind_param("ssii", $row['email'],$row['email'],$a,$b);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and invitation.status=0 and estore_employee_invite.id= ? limit ?,?");
				$stmt->bind_param("iii", $user_id,$a,$b);
			}
			
			
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				if($row['status']==1) { $st= "Approved"; } else if($row['status']==0) { $st= "Pending"; } else if($row['status']==2) { $st= "Rejected"; }
				$nt='';
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row['status']==0) { 
					$nt=$nt.'<td class="pad5 brdb_new tall ap" id="app">
					<div class="padtb5"><a href="#" onclick="approveUser(this.id,1,this);" id="'.$enc.'">Approve</a></div>
					</td>
					<td class="pad5 brdb_new tall rj" id="rjj">
					<div class="padtb5"><a href="#" onclick="approveUser(this.id,2,this);" id="'.$enc.'">Reject</a></div>
					</td>';
				}
				else
				{
					$nt=$nt.'<td class="pad5 brdb_new tall "> </td>
					<td class="pad5 brdb_new tall"> </td>';
				}
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.html_entity_decode($row['company_name']).'</div>
				</td>
				<td class="pad5 brdb_new hidden-xs tall nm">
				<div class="padtb5 ">Employee</div>
				</td>
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 ">'.$row['created_date'].'</div>
				</td>
				<td class="pad5 brdb_new hidden-xs tall sts">
				<div class="padtb5">'.$st.'</div>
				</td>
				'.$nt.'
				</tr>';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function requestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where user_suppliers.user_login_id=? and is_approved=1 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
			
		function updateRequest($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update user_company_profile set data_request=? where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $_POST['updateR'],$_POST['c_id'],$data['user_id']);
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
		
		
		function requestPendingDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where user_suppliers.user_login_id=? and is_approved=0 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestRejectedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where user_suppliers.user_login_id=? and is_approved=2 limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRequestDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where user_suppliers.user_login_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.html_entity_decode($row['company_name']).'</div>
				</td>
				
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_on'])).'</div>
				</td>
				<td class="pad5 brdb_new tall sts">
				<div class="padtb5">Pending</div>
				</td>
				
				</tr>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		
			function approvedUser($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('MAX_EXECUTION_TIME', -1);
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_e = $result->fetch_assoc();
			
				$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on,company_id from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where user_suppliers.user_login_id=? and is_approved=1 order by company_name desc limit 0,20");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$org='';
				$j=0;
				while($row = $result->fetch_assoc())
				{
					$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
					$company_id=$row['company_id'];
				
					
					$org=$org.'<tr class="fsz14 xs-fsz16">
					
					<td class="pad5 brdb_new tall cn">
					<div class="padtb5 " ><a href="#">'.html_entity_decode($row['company_name']).'</a></div>
					</td>
					
					<td class="pad5 brdb_new hidden-xs tall cd">
					<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_on'])).'</div>
					</td>
					<td class="pad5 brdb_new  tall sts">
					<div class="padtb5 blue_txt"><a href="../ViewCompany/companyAccount/'.$enc_id.'">Visit</a></div>
					</td>
					
					</tr>';
				}
				
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
	function moreRequestApprovedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on,company_id from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where user_suppliers.user_login_id=? and is_approved=1 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
			$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
					$company_id=$row['company_id'];
				
					
					$org=$org.'<tr class="fsz14 xs-fsz16">
					
					<td class="pad5 brdb_new tall cn">
					<div class="padtb5 " ><a href="#">'.html_entity_decode($row['company_name']).'</a></div>
					</td>
					
					<td class="pad5 brdb_new hidden-xs tall cd">
					<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_on'])).'</div>
					</td>
					<td class="pad5 brdb_new  tall sts">
					<div class="padtb5 blue_txt"><a href="../ViewCompany/companyAccount/'.$enc_id.'">Visit</a></div>
					</td>
					
					</tr>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function moreRequestRejectedDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select user_suppliers.id,company_name,last_name,first_name,email,user_suppliers.created_on from user_suppliers left join user_logins on user_logins.id=user_suppliers.user_login_id left join companies on companies.id=user_suppliers.company_id where user_suppliers.user_login_id=? and is_approved=2 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.html_entity_decode($row['company_name']).'</div>
				</td>
				
				<td class="pad5 brdb_new hidden-xs tall cd">
				<div class="padtb5 ">'.date('Y-m-d', strtotime($row['created_on'])).'</div>
				</td>
				
				
				</tr>';
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $org;
			
			
		}
		
		function requestPendingCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_suppliers where user_suppliers.user_login_id=? and is_approved=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $row;
			
			
		}
		
		function requestApprovedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_suppliers where user_suppliers.user_login_id=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $row;
			
			
		}
		
		function requestRejectedCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from user_suppliers where user_suppliers.user_login_id=? and is_approved=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			//print_r($org); die;
			return $row;
			
			
		}
		
		
	
		
		function approveUserRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_emp = $result->fetch_assoc();
			$company=$row_emp['company_id'];
			
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
			//echo $query; die;
			$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_id = $result->fetch_assoc();
			
			
			$d=date('Y-m-d');
			if($data['stat']==2)
			{
				$stmt= $dbCon->prepare("update invitation set status=2,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si",$d,$request_id);
				$stmt->execute();
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				
				$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
				//echo $query; die;
				$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_id = $result->fetch_assoc();
				//echo $row_id['id']; echo $request_id; die;
				$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
				$stmt->bind_param("ii", $row_id['id'],$request_id);
				$stmt->execute();
			}
			else if($data['stat']==1)
			{
				$stmt= $dbCon->prepare("select invited_emp,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
				//echo $query; die;
				$stmt->bind_param("i", $request_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_emp = $result->fetch_assoc();
				$company=$row_emp['company_id'];
				$stmt= $dbCon->prepare("update invitation set status=1,accepted_date=? where invited_user_id= ?");
				$stmt->bind_param("si", $d,$request_id);
				if($stmt->execute())
				{
					$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
					//echo $query; die;
					$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
					$stmt->execute();
					$result = $stmt->get_result();
					$row_id = $result->fetch_assoc();
					$s=0;
					$u=1;
					$stmt= $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?,?,?,?,?,?,?,?,?,?,?)");
					$stmt->bind_param("iiiiiiiiiii", $company,$row_id['id'],$s,$s,$s,$s,$u,$s,$s,$s,$s);
					$stmt->execute();
					if($row_emp['invited_emp']==1)
					{
						$stmt= $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?)");
					}  
					else if($row_emp['invited_emp']==2)
					{
						$stmt= $dbCon->prepare("insert into students (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`) values (?,?,?,?,?,?,?,?)");
					}  
					//echo $company_id."-".$row_id['first_name']."-".$row_id['last_name']."-".$s."-".$row_id['hash_code']."-".$row_id['email']."-".$row_id['id']; die;
					$stmt->bind_param("ississi", $company,$row_id['first_name'],$row_id['last_name'],$s,$row_id['hash_code'],$row_id['email'],$row_id['id']);
					if($stmt->execute())
					{
						
						
						$stmt= $dbCon->prepare("update estore_employee_invite set real_employee_id=? where id=? ");
						$stmt->bind_param("ii", $row_id['id'],$request_id);
						$stmt->execute();
						
						
						$stmt= $dbCon->prepare("select mobile_p,company_id,name,last_name,title,email,work_email,first_name_p,last_name_p,sex_p,email_p,dob_day_p,dob_month_p,dob_year_p from estore_employee_invite where id=?");
						$stmt->bind_param("i", $request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_emp = $result->fetch_assoc();
						$company=$row_emp['company_id'];
						
						$stmt= $dbCon->prepare("update user_logins set dob_day=?,dob_month=?,dob_year=?,dob_day_p=?,dob_month_p=?, dob_year_p=? where id=?");
						$stmt->bind_param("iiiiiii", $row_emp['dob_day_p'],$row_emp['dob_month_p'],$row_emp['dob_year_p'],$row_emp['dob_day_p'],$row_emp['dob_month_p'],$row_emp['dob_year_p'],$row['id']);
						$stmt->execute();
						
						$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where email= ? or email=?");
						//echo $query; die;
						$stmt->bind_param("ss", $row_emp['email'], $row_emp['work_email']);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_id = $result->fetch_assoc();
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_company_profile where company_id=? and invited_user_id=?");
						$stmt->bind_param("ii", $company,$request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_virtual = $result->fetch_assoc();
						
						if(empty($row_virtual))
						{
							$stmt= $dbCon->prepare("insert into user_company_profile (company_id,user_login_id,title,email) values (?,?,?,?)");
							$stmt->bind_param("iiss", $company,$row_id['id'],$row_emp['title'],$row_emp['work_email']);
							$stmt->execute();
						}
						else
						{
							if($row_virtual['job_function']=="" || $row_virtual['job_function']==null)
							{
								$row_virtual['job_function']=1;
							}
							$stmt= $dbCon->prepare("insert into user_company_profile (location_id,job_function,ssn,e_number,description_job,e_type,h_date,res_date,company_id,user_login_id,title,department,phone,mobile,email,fax,skype,facebook,twitter,i_street,i_town,i_city,i_zip,i_country,d_street,d_town,d_city,d_zip,d_country,b_member,mentor,c_id,prospect,partner,supplier) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
							$stmt->bind_param("iissssssiisssssssssssssssssssssssss",$row_virtual['location_id'],$row_virtual['job_function'],$row_virtual['ssn'],$row_virtual['e_number'],$row_virtual['description_job'],$row_virtual['e_type'],$row_virtual['h_date'],$row_virtual['res_date'],$company,$row_id['id'],$row_virtual['title'],$row_virtual['department'],$row_virtual['phone'],$row_virtual['mobile'],$row_virtual['email'],$row_virtual['fax'],$row_virtual['skype'],$row_virtual['facebook'],$row_virtual['twitter'],$row_virtual['i_street'],$row_virtual['i_town'],$row_virtual['i_city'],$row_virtual['i_zip'],$row_virtual['i_country'],$row_virtual['d_street'],$row_virtual['d_town'],$row_virtual['d_city'],$row_virtual['d_zip'],$row_virtual['d_country'],$row_virtual['b_member'],$row_virtual['mentor'],$row_virtual['c_id'],$row_virtual['prospect'],$row_virtual['partner'],$row_virtual['supplier']);
							$stmt->execute();
						}
						
						
						$stmt= $dbCon->prepare("select * from virtual_user_profiles where invited_user_id=?");
						$stmt->bind_param("i", $request_id);
						$stmt->execute();
						$result = $stmt->get_result();
						$row_uvirtual = $result->fetch_assoc();
						
						if(!empty($row_uvirtual))
						{
							$stmt= $dbCon->prepare("select id from user_profiles where user_logins_id=?");
							
							$stmt->bind_param("i", $row_id['id']);
							$stmt->execute();
							$result = $stmt->get_result();
							$row_pro = $result->fetch_assoc();
							$d=date('Y-m-d');
							if(empty($row_pro))
							{
								$stmt= $dbCon->prepare("insert into user_profiles (mobile_p,nation,user_logins_id,created_on,modified_on,summary,zipcode,city,state,country,phone_number,address,marital_status,blog,skype,linkedln,facebook,twitter,instagram) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
								$stmt->bind_param("ssissssssssssssssss", $row_emp['mobile_p'],$row_uvirtual['nation'],$row_id['id'],$d,$d,$row_uvirtual['summary'],$row_uvirtual['zipcode'],$row_uvirtual['city'],$row_uvirtual['state'],$row_uvirtual['country'],$row_uvirtual['phone_number'],$row_uvirtual['address'],$row_uvirtual['marital_status'],$row_uvirtual['blog'],$row_uvirtual['skype'],$row_uvirtual['linkedln'],$row_uvirtual['facebook'],$row_uvirtual['twitter'],$row_uvirtual['instagram']);
								$stmt->execute();
							}
							else 
							{
								$stmt= $dbCon->prepare("update user_profiles set modified_on=?,summary=?,zipcode=?,city=?,state=?,country=?,phone_number=?,address=?,marital_status=?,blog=?,skype=?,linkedln=?,facebook=?,twitter=?,instagram=? where user_logins_id=?");
								$stmt->bind_param("sssssssssssssssi", $d,$row_uvirtual['summary'],$row_uvirtual['zipcode'],$row_uvirtual['city'],$row_uvirtual['state'],$row_uvirtual['country'],$row_uvirtual['phone_number'],$row_uvirtual['address'],$row_uvirtual['marital_status'],$row_uvirtual['blog'],$row_uvirtual['skype'],$row_uvirtual['linkedln'],$row_uvirtual['facebook'],$row_uvirtual['twitter'],$row_uvirtual['instagram'],$row_id['id']);
								$stmt->execute();
							}
						}
						
						
					}
					
				}
			}
			
			$fields=array();
			$fields=$row_id;
			$fields['qloudid']=$request_id;
			$fields['stat']=$data['stat'];
			//print_r($fields); die;
			$stmt= $dbCon->prepare("delete from  invitation where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			//$stmt->execute();
			$stmt= $dbCon->prepare("delete from  estore_employee_invite where id= ?");
			$stmt->bind_param("i",$request_id);
			//$stmt->execute();
			$stmt= $dbCon->prepare("delete from  virtual_user_company_profile where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			//$stmt->execute();
			$stmt= $dbCon->prepare("delete from  virtual_user_profiles where invited_user_id= ?");
			$stmt->bind_param("i",$request_id);
			//$stmt->execute();
			$url='https://www.qmatchup.com/beta/user/index.php/Invitation/updateQloud';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
			//var_dump($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//get status code
			//echo $status_code; die;
			$result=curl_exec ($ch);
			curl_close ($ch);
			//print_r($result) ; die;
			if($result==0)
			{
				//echo "none"; die;
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			else
			{
				//echo "jain"; die;
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
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
		
		function locationCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from location where company_id = ?");
			
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
		
		function connectCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) num from employees where company_id = ?");
			
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
		
		function virtualCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where real_employee_id is null and company_id= ?");
			
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
		
		function virtualEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ', name, last_name) as name,created_by,email,phone,title,location from estore_employee_invite where real_employee_id is null and company_id=? and invited_emp=1 limit 0,20");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			//$org['created_by']=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select id,concat_ws(' ', first_name, last_name) as name from user_logins where id= ?");
				
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("i", $row['created_by']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				array_push($org,$row);
				$org[$i]['created_user']=$row1['name'];
				$i++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
	}
