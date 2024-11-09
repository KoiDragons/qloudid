<?php
require_once('../AppModel.php');
class ClaimCompanyModel extends AppModel
{
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
	
	
	function approve($data)
    {
        $dbCon = AppModel::createConnection();
        $c_id =  $this -> encrypt_decrypt('decrypt',$data['id']);
        $stmt = $dbCon->prepare("select id,cid,city,zipcode,address,company_name,website  from virtual_company where id= ?");
        
        /* bind parameters for markers */
		$cont=0;
       $stmt->bind_param("i", $c_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $row = $result->fetch_assoc();
		
			$stmt->close();
        $dbCon->close();
		 
		return $row;
		
       
        
        
    }
	
	
	 
   function ownerUpdate($data)
    {
        $dbCon = AppModel::createConnection();
	//	print_r($data); die;
      $company_id =  $this -> encrypt_decrypt('decrypt',$data['id']);
		
		$stmt = $dbCon->prepare("update virtual_company set user_login_id=? where id=? and user_login_id is null ");
		//echo $company_id; die;
		 $stmt->bind_param("ii", $data['user_id'],$company_id);
        $stmt->execute();
		
		$e="";
		$stmt = $dbCon->prepare("select * from virtual_company where id=?");
		//echo $company_id; die;
		 $stmt->bind_param("i", $company_id);
        $stmt->execute();
		$result_company = $stmt->get_result();
		while($row=mysqli_fetch_array($result_company))
		{
			//print_r($row); die;
			$ot=1;
			$ind="";
			$d=date("Y-m-d h:i:s");
			
			if($row['company_email']=="" || $row['company_email']==null)
			{
				$email=$_POST['work_email'];
			}
			else
			{
				$email=$row['company_email'];
			}
			$stmt = $dbCon->prepare("insert into companies(o_type,industry,long_description,short_description,user_login_id,company_name,company_email,website,hash_code,created_date,virtual_company_id) 
	values( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
       
        /* bind parameters for markers */
        $stmt->bind_param("isssisssssi", $ot, $ind, $ind, $ind, $row['user_login_id'], $row['company_name'], $email, $row['web'], $data['random_hash'], $d,$row['id']);
		//$stmt->execute();
		//echo $ot."-".$ind."-".$ind."-".$ind."-".$row['user_login_id']."-".$row['company_name']."-".$email."-".$row['website']."-".$data['random_hash']."-".$d."-".$row['id']; die;
		if (!$stmt->execute()) {
						//	echo "jain"; die;
					} else {
				
						$stmt = $dbCon->prepare("select id from companies where virtual_company_id=?");
            
							/* bind parameters for markers*/
							$stmt->bind_param("i", $row['id']);
							$stmt->execute();
							$result = $stmt->get_result();
							$myrow  = $result->fetch_assoc();
							
							$stmt = $dbCon->prepare("insert into company_profiles(company_id,cid,address,fax,telephone,city) values(?, ?, ?, ?, ?, ?)");
            
							$stmt->bind_param("isssss", $myrow['id'], $row['cid'], $row['address'], $row['fax'], $row['telephone'], $row['city']);
							$stmt->execute();
			
            
            $stmt = $dbCon->prepare("insert into user_company_profile(`company_id`,`user_login_id`,email) values(?, ?, ?)");
            
            $stmt->bind_param("iis", $myrow['id'], $row['user_login_id'],$_POST['work_email']);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("update virtual_employees set active_company_id=? where virtual_company_id=?");
				//echo $company_id; die;
				 $stmt->bind_param("ii", $myrow['id'],$row['id']);
				$stmt->execute();
			
				$stmt = $dbCon->prepare("select * from virtual_employees where virtual_company_id=?");
				//echo $company_id; die;
				 $stmt->bind_param("i",$row['id']);
				$stmt->execute();
				$result  = $stmt->get_result();
				while($row_employee=$result->fetch_assoc())
				{
					$d=date('Y-m-d');
					 $stmt = $dbCon->prepare("insert into estore_employee_invite(company_id,name,last_name,phone,email,website,created_on,i_address,i_zipcode,i_city,i_country,d_address,d_zipcode,d_city,d_country,d_method,d_terms,i_unit,i_rate,i_currency,i_order,i_price,i_cost,i_payment) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			   
				$stmt->bind_param("issssssssssssssiissisiss", $myrow['id'],$row_employee['first_name'],$row_employee['last_name'],$row_employee['phone'],$row_employee['email'],$row_employee['website'],$row_employee['created_on'],$row_employee['i_address'],$row_employee['i_zipcode'],$row_employee['i_city'],$row_employee['i_country'],$row_employee['d_address'],$row_employee['d_zipcode'],$row_employee['d_city'],$row_employee['d_country'],$row_employee['d_method'],$row_employee['d_terms'],$row_employee['i_unit'],$row_employee['i_rate'],$row_employee['i_currency'],$row_employee['i_order'],$row_employee['i_price'],$row_employee['i_cost'],$row_employee['i_payment']);
				$stmt->execute();
				
					$stmt = $dbCon->prepare("select id,title,email,work_email from estore_employee_invite where company_id=? and created_on=? and email=?");
			
			$stmt->bind_param("iss",  $myrow['id'],$row_employee['created_on'],$row_employee['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_invite = $result->fetch_assoc();
			$user_id=$row_invite['id'];
			$in_id=$this -> encrypt_decrypt('encrypt',$row_invite['id']);
			$stmt = $dbCon->prepare("insert into invitation(invited_user_id,created_date) values (?, ?)");
			$stmt->bind_param("is", $row_invite['id'],$d);
			$stmt->execute();
			$stmt = $dbCon->prepare("insert into virtual_user_company_profile (`company_id`,`invited_user_id`) values (?, ?)") ;
			$stmt->bind_param("ii",  $myrow['id'],$user_id);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("insert into virtual_user_profiles (`invited_user_id`,`created_on`,`modified_on`) values (?, ?, ?)");
			$stmt->bind_param("iss", $user_id,$d,$d);
			$stmt->execute();
				
				}
				
				$stmt = $dbCon->prepare("delete from virtual_employees where virtual_company_id=?");
				//echo $company_id; die;
				 $stmt->bind_param("i",$row['id']);
				$stmt->execute();
				
			$stmt = $dbCon->prepare("select first_name,last_name,email,email_verification_code from user_logins where id=?");
            $stmt->bind_param("i", $row['user_login_id']);
            $stmt->execute();
            $result  = $stmt->get_result();
            $userrow = $result->fetch_assoc();
            
            $stmt       = $dbCon->prepare("insert into employees (`company_id`,`first_name`,`last_name`,`status`,`signup_hash`,`email`,`user_login_id`,`created_by`) values(?, ?, ?, ?, ?, ?, ?, ?)");
            $status_emp = 0;
            $stmt->bind_param("ississii", $myrow['id'], $userrow['first_name'], $userrow['last_name'], $status_emp, $userrow['email_verification_code'], $userrow['email'], $row['user_login_id'], $row['user_login_id']);
            $stmt->execute();
            
            $stmt       = $dbCon->prepare("insert into company_permission (`company_id`,`user_login_id`,`purchase`,`alert`,`supplier`,`customer`,`employee`,`proposal`,`project_proposal`,`create_article`,`import_article`) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $status_per = 1;
            $stmt->bind_param("iiiiiiiiiii", $myrow['id'], $row['user_login_id'], $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per, $status_per);
            $stmt->execute();
            
            
            $stmt       = $dbCon->prepare("insert into company_verified (company_id,verified,unvarified,is_verified) values (?, ?, ?, ?)");
            $status_ver = 7;
            $stmt->bind_param("iiii", $myrow['id'], $status_emp, $status_ver, $status_emp);
            $stmt->execute();
			
			$stmt = $dbCon->prepare("delete from virtual_company where id=?");
		//echo $company_id; die;
		 $stmt->bind_param("i", $row['id']);
        $stmt->execute();
			}
			
		}
		//print_r($row); die;
		
		$stmt->close();
        $dbCon->close();
		 return $email;
        
        
    }
	
	 function sendManageCompanyEmail($data)
    {
        
        $to            = $data['company_email1'];
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
            please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.qmatchup.com"></a> Qmatchup Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>';
       
        
        sendEmail($subject, $to, $emailContent);
        
    }
    
	
	
    }
