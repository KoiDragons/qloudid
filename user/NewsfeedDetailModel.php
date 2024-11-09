<?php
	require_once('../AppModel.php');
	class NewsfeedDetailModel extends AppModel
	{
		function downloadApp($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("insert into user_app_download(permission_id,user_id,created_on) values(? , ?, now())");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $app_id,$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			}
			function getAppsPermissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select app_link,manage_apps_permission.id,is_permission,app_name,presentation,funktioner,nyheter,is_downloaded,image_path,app_id ,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where manage_apps_permission.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select count(id) as num from user_app_download where permission_id=? and user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$data['user_id']);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$row['is_downloaded']=0;
			}
			else
			{
			$row['is_downloaded']=1;	
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			}
			
			
		function getMandatoryApps($data)
		{
			$dbCon = AppModel::createConnection();
			$country_id= $data['country_id'];
		 
			$stmt = $dbCon->prepare("select app_id,manage_apps_permission.id,app_name,app_link from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=1 and is_mandatory=1 order by app_name");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			}
		
			function getPermissionDetail($data)
			{
			$dbCon = AppModel::createConnection();
			
			$country_id= $data['country_id'];
			$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select sub_heading,app_id,app_link,manage_apps_permission.id,is_permission,app_name,is_downloaded,is_business,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  and app_type=1 and is_mandatory=0 and app_id!=35");
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
			$stmt = $dbCon->prepare("select count(id) as num from user_app_download where permission_id=? and user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$data['user_id']);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$org[$j]['is_downloaded']=0;
			}
			else
			{
			$org[$j]['is_downloaded']=1;	
			}
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			}
			else
			{
		
			$stmt = $dbCon->prepare("select id,app_name from apps_detail");
			$stmt->execute();
			$result = $stmt->get_result();
			
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_apps_permission (country_id,app_id,created_on) values(?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("ii",$country_id,$row['id']);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select sub_heading,app_id,app_link,manage_apps_permission.id,is_permission,app_name,is_business,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  and app_type=1  and is_mandatory=0 and app_id!=35");
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
			$stmt = $dbCon->prepare("select count(id) as num from user_app_download where permission_id=? and user_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['id'],$data['user_id']);
			$stmt->execute();
			$result_down = $stmt->get_result();
			$row_down = $result_down->fetch_assoc();
			if($row_down['num']==0)
			{
				$org[$j]['is_downloaded']=0;
			}
			else
			{
			$org[$j]['is_downloaded']=1;	
			}
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			$stmt->close();
			$dbCon->close();
			
			return $org;
			}
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
				$org='<div id="search_new">
				<h3 class="pos_rel marb10 pad0 padr40 bold fsz25 dark_grey_txt">
				Result
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				<form method="POST" action="VerifyRequest/companyRequestAccount/'.$company_id.'" id="save_request_company" name="save_request_company">
				
				<div class="marb15 "  >
				<label for="new-organization-name" class="sr-only">Company Name</label>
				<input type="text" id="name" name="name" value="'.$row['company_name'].'" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="" readonly >
				</div>
				<div class="marb15 "  >
				<label for="new-organization-name" class="sr-only">Address</label>
				<input type="text" id="adr" name="adr" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="'.$row['address'].'" readonly >
				</div>
				
				<div class="marb15 "  >
				<label for="new-organization-name" class="sr-only">City</label>
				<input type="text" id="cty" name="cty" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica " placeholder="'.$row['city'].'" readonly >
				</div>
				
				
				
				<div class="marb15 "  >
				<label for="new-organization-name" class="sr-only">Zipcode</label>
				<input type="text" id="name" name="name" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="'.$row['zip'].'" readonly >
				</div>
				
				<div class="marb15 "  >
				<label for="new-organization-name" class="sr-only">Country</label>
				<input type="text" id="name" name="name" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica" placeholder="'.$row['country'].'" readonly >
				</div>
				
				<div class="marb15 padt15">
				<label for="new-organization-under" class="txt_0">Select:</label>
				<select name="request_id" id= "request_id" class="wi_100 mart5 padtb10 padrl0 nobrd brdb brdclr_dblue_f font_helvetica">
				<option value="0">--Select--</option>
				<option value="1">Employee</option>
				<option value="2">Customer</option>
				</select>
				</div>
				
				<div class="mart30 talc">
				
				<a href="#"><input type="button" value="Connect" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp brdrad5" onclick="checkRequest();"/></a>
				
				</div>
				</form>
				</div>';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
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
			$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code from user_logins where id=?");
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
				$fields['safeqloud']=$request_id;
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
		
		
		
		function countryInfo($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$data['country_id'];
		$stmt = $dbCon->prepare("select is_visible from country where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row['is_visible'];
	}	
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select country_of_residence,last_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status from user_logins where id = ?");
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
			
			
			$stmt = $dbCon->prepare("select employees.company_id,company_name,profile_pic from employees left join companies on employees.company_id=companies.id left join company_profiles on companies.id=company_profiles.company_id where employees.user_login_id = ? and o_type=1 limit 0,20");
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
		
		
		function searchUserDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select first_name,last_name  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_user = $result->fetch_assoc();
			
			
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
					
					$stmt = $dbCon->prepare("select id from user_detail_requests where request_sender=? and request_receiver=?");
					
					/* bind parameters for markers */
					$stmt->bind_param("ii", $data['user_id'],$row['user_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowOut = $result->fetch_assoc();
					if(empty($rowOut))
					{
						$d=date('Y-m-d h:i:s');
						$stmt = $dbCon->prepare("insert into user_detail_requests(request_sender,request_receiver,created_on,user_code) values(?, ?, ?, ?)");
						
						/* bind parameters for markers */
						//echo $data['user_id']." ".$row['user_id']." ".$d;
						$stmt->bind_param("iisi", $data['user_id'],$row['user_id'],$d,$_POST['id']);
						$stmt->execute();
						$rsultId=$stmt->insert_id;
						$enc=$this -> encrypt_decrypt('encrypt',$rsultId);
						$to      = $row_request['email'];
						$subject = "safeqloud : Request to access your details";
						
						$emailContent =$row_user['first_name'].' '.$row_user['last_name'].' has requested to access your personal data. Click <a href="https://www.safeqloud.com/user/index.php/VerifyUserRequest/requestAccount/'.$enc.'">here</a> to take action </br> If above link does not work, please copy the following link in your browser. </br> https://www.safeqloud.com/user/index.php/VerifyUserRequest/requestAccount/'.$enc.'';
						sendEmail($subject, $to, $emailContent);
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
		
		
		
	}
	
?>