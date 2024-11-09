<?php
	require_once('../AppModel.php');
	class InvitationModel extends AppModel
	{
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
			<td align="left" valign="top" scope="col"><a href="https://www.safeqloud.com/company/index.php/Activation/activateAccount/' . $company_email . '/' . $data['random_hash'] . '" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Confirm Now</a></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col"><div style="font-size:14px;">If the button is not working then copy/paste the link in your browser to confirm your registration <br />
			<a href="#" style="text-decoration:none; color:#3691c0;">https://www.safeqloud.com/company/index.php/Activation/activateAccount/' . $company_email . '/' . $data['random_hash'] . ' </a></div></td>
            </tr>
            <tr>
			<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
			<div><b style="color:#6b6f74;">The Qmatchup team</b></div></td>
            </tr>
			</table></td>
			</tr>
			<tr>
			<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $company_email . '</a>. If you dont want to receive these emails from Qmatchup.com in the future, <br />
            please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.safeqloud.com"></a> Qmatchup Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
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
				
				<div class="mart30 talc">
				
				<a href="#" class="show_popup_modal" data-target="#gratis_popup_company"><input type="button" value="Add Company" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp brdrad5" /></a>
				
				</div>
				
				
				
				
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
				
				<div class="mart30 talc">
				
				<a href="../VerifyRequest/companyRequestAccount/'.$company_id.'"><input type="button" value="Connect" class="marl5 pad8 nobrd green_bg uppercase bold fsz14 white_txt curp brdrad5" /></a>
				
				</div>
				
				</div>';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
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
			
			$stmt = $dbCon->prepare("select id,country_name  from country");
			
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
					$nt=$nt.'<td class="pad5 brdb tall ap" id="app">
					<div class="padtb5"><a href="#" onclick="approveUser(this.id,1,this);" id="'.$enc.'">Approve</a></div>
					</td>
					<td class="pad5 brdb tall rj" id="rjj">
					<div class="padtb5"><a href="#" onclick="approveUser(this.id,2,this);" id="'.$enc.'">Reject</a></div>
					</td>';
				}
				else
				{
					$nt=$nt.'<td class="pad5 brdb tall "> </td>
					<td class="pad5 brdb tall"> </td>';
				}
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb tall cn">
				<div class="padtb5 " >'.$row['company_name'].'</div>
				</td>
				<td class="pad5 brdb hidden-xs tall nm">
				<div class="padtb5 ">Employee</div>
				</td>
				<td class="pad5 brdb hidden-xs tall cd">
				<div class="padtb5 ">'.$row['created_date'].'</div>
				</td>
				<td class="pad5 brdb hidden-xs tall sts">
				<div class="padtb5">'.$st.'</div>
				</td>'.
				$nt.'
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
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where employee_request_cloud.user_login_id=? and is_approved=1 limit 0,20");
			
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
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where employee_request_cloud.user_login_id=? and is_approved=0 limit 0,20");
			
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
			$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where employee_request_cloud.user_login_id=? and is_approved=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb tall cn">
				<div class="padtb5 " >'.$row['company_name'].'</div>
				</td>
				
				<td class="pad5 brdb hidden-xs tall cd">
				<div class="padtb5 ">'.$row['created_on'].'</div>
				</td>
				<td class="pad5 brdb tall sts">
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
		
		
		function requestPendingCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from employee_request_cloud where employee_request_cloud.user_login_id=? and is_approved=0 limit 0,20");
			
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
			$stmt = $dbCon->prepare("select count(id) as num  from employee_request_cloud where employee_request_cloud.user_login_id=? and is_approved=1 limit 0,20");
			
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
				
				$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code,country_of_residence from user_logins where email= ? or email=?");
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
						
						$stmt= $dbCon->prepare("select id,first_name,last_name,email,email_verification_code as hash_code,country_of_residence from user_logins where email= ? or email=?");
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
			$fields['safeqloud']=$request_id;
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
			
			$stmt = $dbCon->prepare("select first_name, last_name,concat_ws(' ', first_name, last_name) as name from user_logins where id = ?");
			
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
		
		function approveUser($data)
		{
			$dbCon = AppModel::createConnection();
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and (estore_employee_invite.email=? or estore_employee_invite.work_email=? ) and invitation.status=0 limit 0,20");
				$stmt->bind_param("ss", $row['email'],$row['email']);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and invitation.status=0 and estore_employee_invite.id= ? limit 0,20");
				$stmt->bind_param("i", $user_id);
			}
			
			
			
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
		
		
		function approvedUser($data)
		{
			$dbCon = AppModel::createConnection();
			
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_e = $result->fetch_assoc();
			$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name,company_id from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and (estore_employee_invite.email=? or estore_employee_invite.work_email=?) and real_employee_id is not null order by company_name desc limit 0,20");
			$stmt->bind_param("ss", $row_e['email'],$row_e['email']);
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$stmt = $dbCon->prepare("select data_request from user_company_profile where user_login_id=? and company_id=?");
				$stmt->bind_param("ii", $data['user_id'],$row['company_id']);
				$company_id=$row['company_id'];
				$stmt->execute();
				$result_request = $stmt->get_result();
				$row_request = $result_request->fetch_assoc();
				if($row_request['data_request']==1)
				{
				$checked='checked'; }
				else
				{
					$checked='';
				}
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb tall cn">
				<div class="padtb5 " ><a href="../Company/companyAccount/'.$enc_id.'">'.$row['company_name'].'</a></div>
				</td>
				
				<td class="pad5 brdb hidden-xs tall cd">
				<div class="padtb5 ">'.$row['created_date'].'</div>
				</td>
				<td class="pad5 brdb hidden-xs tall sts">
				<div class="padtb5">Employer</div>
				</td>
				<td class="pad5 brdb tall">
				<div class="padtb5">
				<div class="boolean-control boolean-control-small boolean-control-green fright '.$checked.'" onclick="updateRequest('.$company_id.',this);">
				<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No" >
				</div>
				</div>
				</td>
				</tr>';
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite  where created_user=1 and (estore_employee_invite.email=? or estore_employee_invite.work_email=?) and real_employee_id is not null");
			$stmt->bind_param("ss", $row['email'],$row['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']<20)
			{
				$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on,company_id from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where employee_request_cloud.user_login_id=? and is_approved=1 order by company_name desc limit 0,20");
				
				/* bind parameters for markers */
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$j=0;
				while($row = $result->fetch_assoc())
				{
					$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
					$company_id=$row['company_id'];
					$stmt = $dbCon->prepare("select data_request from user_company_profile where user_login_id=? and company_id=?");
					$stmt->bind_param("ii", $data['user_id'],$row['company_id']);
					
					$stmt->execute();
					$result_request = $stmt->get_result();
					$row_request = $result_request->fetch_assoc();
					if($row_request['data_request']==1)
					{
					$checked='checked'; }
					else
					{
						$checked='';
					}
					
					$org=$org.'<tr class="fsz16">
					
					<td class="pad5 brdb tall cn">
					<div class="padtb5 " ><a href="../Company/companyAccount/'.$enc_id.'">'.$row['company_name'].'</a></div>
					</td>
					
					<td class="pad5 brdb hidden-xs tall cd">
					<div class="padtb5 ">'.$row['created_on'].'</div>
					</td>
					<td class="pad5 brdb hidden-xs tall sts">
					<div class="padtb5">Self</div>
					</td>
					<td class="pad5 brdb tall">
					<div class="padtb5">
					<div class="boolean-control boolean-control-small boolean-control-green fright '.$checked.'" onclick="updateRequest('.$company_id.',this);">
					<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No" >
					</div>
					</div>
					</td>
					</tr>';
				}
				
			}
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function moreApprovedUser($data)
		{
			$dbCon = AppModel::createConnection();
			ini_set('memory_limit', '-1');
			$a=0;
			$b=($_POST['id']*20)+20;
			$user_id=$data['user_id'];
			$stmt = $dbCon->prepare("select email from user_logins where id=?");
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			ini_set('memory_limit', '-1');
			$stmt = $dbCon->prepare("select invited_emp,estore_employee_invite.id,invitation.status,invitation.created_date,company_name from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id left join companies on estore_employee_invite.company_id=companies.id where created_user=1 and (estore_employee_invite.email=? or estore_employee_invite.work_email=?) and real_employee_id is not null order by company_name desc limit ?,?");
			$stmt->bind_param("ssii", $row['email'],$row['email'],$a,$b);
			
			
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
				$company_id=$row['company_id'];
				$stmt = $dbCon->prepare("select data_request from user_company_profile where user_login_id=? and company_id=?");
				$stmt->bind_param("ii", $data['user_id'],$row['company_id']);
				
				$stmt->execute();
				$result_request = $stmt->get_result();
				$row_request = $result_request->fetch_assoc();
				if($row_request['data_request']==1)
				{
				$checked='checked'; }
				else
				{
					$checked='';
				}
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb tall cn">
				<div class="padtb5 " ><a href="../Company/companyAccount/'.$enc_id.'">'.$row['company_name'].'</a></div>
				</td>
				
				<td class="pad5 brdb hidden-xs tall cd">
				<div class="padtb5 ">'.$row['created_date'].'</div>
				</td>
				<td class="pad5 brdb hidden-xs tall sts">
				<div class="padtb5">Employer</div>
				</td>
				<td class="pad5 brdb tall">
				<div class="padtb5">
				<div class="boolean-control boolean-control-small boolean-control-green fright '.$checked.'" onclick="updateRequest('.$company_id.',this);">
				<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No" >
				</div>
				</div>
				</td>
				</tr>';
			}
			$org="";
			$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite  where created_user=1 and (estore_employee_invite.email=? or estore_employee_invite.work_email=?) and real_employee_id is not null");
			$stmt->bind_param("ss", $row['email'],$row['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']<$b)
			{
				$b=$b-$row['num'];
				$stmt = $dbCon->prepare("select employee_request_cloud.id,company_name,last_name,first_name,email,employee_request_cloud.created_on,company_id from employee_request_cloud left join user_logins on user_logins.id=employee_request_cloud.user_login_id left join companies on companies.id=employee_request_cloud.company_id where employee_request_cloud.user_login_id=? and is_approved=1 order by company_name desc limit 0,?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $data['user_id'],$b);
				$stmt->execute();
				$result = $stmt->get_result();
				
				while($row = $result->fetch_assoc())
				{
					$enc_id=$this->encrypt_decrypt("encrypt",$row['company_id']);
					$company_id=$row['company_id'];
					$stmt = $dbCon->prepare("select data_request from user_company_profile where user_login_id=? and company_id=?");
					$stmt->bind_param("ii", $data['user_id'],$row['company_id']);
					
					$stmt->execute();
					$result_request = $stmt->get_result();
					$row_request = $result_request->fetch_assoc();
					if($row_request['data_request']==1)
					{
					$checked='checked'; }
					else
					{
						$checked='';
					}
					$org=$org.'<tr class="fsz16">
					
					<td class="pad5 brdb tall cn">
					<div class="padtb5 " ><a href="../Company/companyAccount/'.$enc_id.'">'.$row['company_name'].'</a></div>
					</td>
					
					<td class="pad5 brdb hidden-xs tall cd">
					<div class="padtb5 ">'.$row['created_on'].'</div>
					</td>
					<td class="pad5 brdb hidden-xs tall sts">
					<div class="padtb5">Self</div>
					</td>
					<td class="pad5 brdb tall">
					<div class="padtb5">
					<div class="boolean-control boolean-control-small boolean-control-green fright '.$checked.'" onclick="updateRequest('.$company_id.',this);">
					<input type="checkbox" name="data_request" id="data_request" class="default" data-true="Yes" data-false="No" >
					</div>
					</div>
					</td>
					</tr>';
				}
				
			}
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function allCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select count(estore_employee_invite.id) as num from estore_employee_invite left join invitation on estore_employee_invite.id=invitation.invited_user_id where (estore_employee_invite.email=? or estore_employee_invite.work_email=?) and invitation.status=0");
				$stmt->bind_param("ss", $row['email'],$row['email']);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select count(id) as num from invitation where invited_user_id= ? and status=0");
				$stmt->bind_param("i",  $user_id );
			}
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function approveCount($data)
		{
			$dbCon = AppModel::createConnection();
			if($data['us']==1)
			{
				$user_id=$data['user_id'];
				$stmt = $dbCon->prepare("select email from user_logins where id=?");
				$stmt->bind_param("i", $user_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where (estore_employee_invite.email=? or estore_employee_invite.work_email=?) and real_employee_id is not null ");
				$stmt->bind_param("ss", $row['email'],$row['email']);
			}
			else
			{
				$user_id= $this -> encrypt_decrypt('decrypt',$data['user_id']);
				$stmt = $dbCon->prepare("select count(id) as num from invitation where invited_user_id= ? and status=1");
				$stmt->bind_param("i",  $user_id );
			}
			
			/* bind parameters for markers */
			$cont=1;
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function pendingCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request where company_id= ? and `status`=0");
			
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
		
		function rejectCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from employee_request where company_id= ? and `status`=3");
			
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
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ', name, last_name) as name,created_by,email,phone,title,location from estore_employee_invite where real_employee_id is null and company_id=? and invited_emp=1 ");
			
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
		
		
		function connectedEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select created_by,employees.id,employees.user_login_id,concat_ws(' ', employees.first_name, employees.last_name) as name,employees.email,price,verification_status,image_path,user_profiles.phone_number from employees left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on employees.user_login_id=user_profiles.user_logins_id  where employees.company_id= ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			//$org['created_user']=array();
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
		
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,location.created_on,location.id,companies.company_name,location,country.country_name,state.state_name,cities.city_name from location left join user_logins on location.user_login_id=user_logins.id left join companies on location.company_id=companies.id left join country on country.id=location.country_id left join state on state.id=location.state_id left join cities on cities.id=location.city_id where company_id= ? limit 0,2");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
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
		
		function locationDetailMore($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,location.created_on,location.id,companies.company_name,location,country.country_name,state.state_name,cities.city_name from location left join user_logins on location.user_login_id=user_logins.id left join companies on location.company_id=companies.id left join country on country.id=location.country_id left join state on state.id=location.state_id left join cities on cities.id=location.city_id where company_id= ? limit 0,?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['limit']);
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
