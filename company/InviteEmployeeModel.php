<?php

require_once('../AppModel.php');
class InviteEmployeeModel extends AppModel
{	


function sendEmailInvitationToEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$companyDetail=$this->companyDetail($data);
			
			$stmt = $dbCon->prepare("update companies set more_employee_available=? where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['more_employee_available'],$company_id);
			$stmt->execute();
			if($_POST['more_employee_available']==0)
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			for($i=1; $i<=$_POST['total_employee']; $i++)
			{
			$empEmailid='employee_email'.$i;
			$stmt = $dbCon->prepare("select id from employees where email=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST[$empEmailid],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$code='';
			$stmt = $dbCon->prepare("select id from invite_app_employee where employee_email=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST[$empEmailid]);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			
			$stmt = $dbCon->prepare("INSERT INTO invite_app_employee (company_id,employee_email,created_on,email_otp) VALUES (?, ?, now(),?)");
			$stmt->bind_param("isi", $company_id, $_POST[$empEmailid],$code);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select id from invite_app_employee where employee_email=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST[$empEmailid]);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$enc=$this -> encrypt_decrypt('encrypt',$row['id']);
			$url="https://qloudid.com/public/index.php/EmployeeInvitation/verifyDetails/".$enc;
			$to            = $_POST[$empEmailid];
			$subject='Employee invitaion from '.$companyDetail['company_name'];
			$emailContent='<html><head></head>

<body>


    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:black">
        <tbody>
            <tr>
                <td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                                        <tbody>
                                                            <tr>
                                                                <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Your 6-digit code</h1>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there! Your 6-digit code is:</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">'.$code.'</h2>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">You are invited to become an employee. Click on below link to verify your details</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this code. Qloud ID representatives will never reach out to you to verify this code over the phone or SMS.</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><b>'.$url.'</b></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <h2 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:27px;line-height:30px">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Support</font>
                                        </font>
                                    </h2>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">If you have any questions please contact us on</h3>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">Customer Service</a></div>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <h3 style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:19px;line-height:25px">Want to learn more about us?</h3>
                                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                        <tbody>
                                                            <tr>
                                                                <td height="5" style="font-size:5px;line-height:5px;height:5px">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Visit our website at<span>&nbsp;</span><a href="#" rel="noreferrer" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;text-decoration:underline!important" target="_blank" data-saferedirecturl="#">https://www.qloudid.com</a></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td style="padding-left:20px;padding-right:20px">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                        <tbody>
                            <tr>
                                <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
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
			catch(Exception $e) {
				 
				}	
	
			}
			
			
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	


function listCategories()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from professional_service_category");
			/* bind parameters for markers */
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

function updateServices()
		{
			$dbCon = AppModel::createConnection();
		  
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where professional_category_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0"  class="lgtgrey2_bg">Select</option>';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$row['id'].'"  class="lgtgrey2_bg">'.$row['subcategory_name'].'</option>';
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}


function updateFile($data)
		{
			$dbCon = AppModel::createConnection();
			$allowedExts = array("csv");
			//print_r($_POST);
			$temp = explode(".", $_FILES["email_file"]["name"]);
			$extension = end($temp);
			//echo $extension; die;
			if (in_array($extension, $allowedExts)) {
				if ($_FILES["email_file"]["error"] > 0) {
					$msg = "Return Code: " . $_FILES["file"]["error"] . "<br>";
					return 2;
					} else {
					
					if (file_exists("uploads/employee_csv/" . $_FILES["email_file"]["name"])) 
					unlink("uploads/employee_csv/" . $_FILES["email_file"]["name"]);
					
					move_uploaded_file($_FILES["email_file"]["tmp_name"], "uploads/employee_csv/" . $_FILES["email_file"]["name"]);
					
					$file = file_get_contents('uploads/employee_csv/'.$_FILES["email_file"]["name"], FILE_USE_INCLUDE_PATH);
					$emails = explode("\n" , $file);
					$file_a='/uploads/employee_csv/'.$_FILES["email_file"]["name"];
					
					$file_a= str_replace('\\', '/', getcwd().$file_a);
					
					$file_e=encrypt_decrypt('encrypt',$file_a);
					$_SESSION['file_e']=$file_e;
					return 1;
				}
				
			}	
			else
			{
				
				return 0;
				}
		}	
		
		
		function verifyEmployeeExistance($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("select user_logins.id from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("is", $_POST['p_country'], $_POST['pmobile']);
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
				$stmt = $dbCon->prepare("select user_logins.id from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=? and user_logins.id!=?");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("isi", $_POST['p_country'], $_POST['pmobile'], $row['id']);
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
			
			
		}
		
		function createUser($data)
		{
			$dbCon = AppModel::createConnection();
			$came_from=8;
			$stmt = $dbCon->prepare("select id from user_logins where email=?");
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$rf=0;	
			$st=1; 
			$added_on_place=2;
			$data['first_name']=htmlentities($data['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$data['last_name']=htmlentities($data['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$data['random_hash'] = substr(md5(uniqid(rand(), true)), 16, 16);
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,added_on_place,user_came_from,domain_id) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?,?,?)");
			$stmt->bind_param("ssiissiiiii", $data['fname'], $data['lname'],$st,$st,$data['email'], $data['random_hash'], $data['p_country'],$rf,$added_on_place,$came_from,$_POST['domain_id']);
			$stmt->execute();
			$data['invited_user_id']=$stmt->insert_id;
			}
			else
			{
				$data['invited_user_id']=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return $data['invited_user_id'];
			
		}
	
		function createUserProfile($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id from user_profiles where user_logins_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['invited_user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			 
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number) VALUES (?, ?)");
			$stmt->bind_param("is", $data['invited_user_id'], $data['pmobile']);
			$stmt->execute();
			 
			}
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		
function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
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
				if($row['is_admin']==0)
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
			
			
		}
		
		function updateAdmin($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from companies where user_login_id=? and id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
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
			$stmt = $dbCon->prepare("select id,permission from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
			else
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		
		
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
			/* bind parameters for markers */
			$cont=1;
			
		
			$stmt->bind_param("iiiiii",$cont,$row['id'],$cont,$data['user_id'],$company_id,$data['page_id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			}
			
			
	function userCountryList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_name");
			
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
		function jobFamily($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id, job_family from job_family");
			
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
		
		function jobFunction($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id, job_function from job_function_vacancy where job_family_id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$output = '<option value="">Select</option>';
			while($row = $result->fetch_assoc())
			{
				 
				$output = $output. '<option value="'. $row['id'].'">'. $row['job_function'] .'</option>';
			}
			$stmt->close();
			$dbCon->close();
			return $output;
		}
		
		function jobPosition($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id, job_position from job_position where job_function_id=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$output = '<option value="Employee">Employee</option>';
			while($row = $result->fetch_assoc())
			{
				$output = $output. '<option value="'. $row['job_position'].'">'. $row['job_position'] .'</option>';
			}
			$stmt->close();
			$dbCon->close();
			return $output;
		}
		
		function storeInvitationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
				$stmt = $dbCon->prepare("update property_location set request_type=? where id=?");
				
				
				$stmt->bind_param("ii", $_POST['rtype'],$location_id);
				if($stmt->execute())
				{
				$stmt->close();
				$dbCon->close();
				return 1;
				} 
				else 
				{
				$dbCon->close();
				return 0;
				}
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
			
			$stmt = $dbCon->prepare("select more_employee_available,country_id,grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
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
		
	function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,company_id,is_headquarter,rent_permises,offer_education,add_employee from property_location left join property on property.id=property_location.property_id where property_location.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $location_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			
	function companyLocationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select property_location.id,visiting_address  from property_location  where property_location.company_id=?");
			
			/* bind parameters for markers */
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
		
		function locationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address,company_id,is_headquarter,rent_permises,offer_education,add_employee from property_location left join property on property.id=property_location.property_id where property_location.company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				
			$stmt->close();
			$dbCon->close();
			return $row['enc'];
			
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
	
	 function invitingUserEmail()
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,last_name,email from user_logins where id = (select user_logins_id from user_profiles where ssn=?) and country_of_residence=?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("si", $_POST['ssn'],$_POST['ccountry']);
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
    
		function inviteEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			if($_POST['wemail']!="")
			{
			$stmt = $dbCon->prepare("select id,email,first_name,last_name  from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userw = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 5;	
			}
			$stmt = $dbCon->prepare("select id  from estore_employee_invite where work_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userw = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 6;	
			}
			}
			
			if($_POST['wphone']!="")
			{
			$stmt = $dbCon->prepare("select id from user_profiles where phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wphone']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userwp = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 7;	
			} 
			
			$stmt = $dbCon->prepare("select id from virtual_user_company_profile where phone=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wphone']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userwp = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 8;	
			} 
			}
			
			$stmt = $dbCon->prepare("select count(id) as num from virtual_user_company_profile where ssn=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST['ssn'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_virtual = $result->fetch_assoc();
			if($row_virtual['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 3;	
			}
			$stmt = $dbCon->prepare("select id,email,first_name,last_name  from user_logins where id=(select user_logins_id from user_profiles where ssn=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['ssn']);
			$stmt->execute();
			$result = $stmt->get_result();
			 $row_user = $result->fetch_assoc();
			
			if(empty($row_user))
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
			else 
			{
			$stmt = $dbCon->prepare("select id from employee_request_cloud  where user_login_id=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row_user['id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			
			$stmt = $dbCon->prepare("select id from employees  where user_login_id=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row_user['id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			$stmt = $dbCon->prepare("select email,company_email from companies left join user_logins on companies.user_login_id=user_logins.id where companies.id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_company = $result->fetch_assoc();
			$company_email=$row_company['company_email'];
			$fields=array();
			$fields=$_POST;
			$unique_id=$company_id."_".date('Y-m-d h:i:s');
			$fields['unique_id']=$this->encrypt_decrypt('encrypt',$unique_id);
			$fields['company_email'] = $company_email;
			$fields['email'] = $row_user['email'];
			$fields['user_email'] = $data['email'];
			
			$fields['client_secret'] = 'chandan5af041e1165a9';
			
			$stmt = $dbCon->prepare("select id from estore_employee_invite  where email=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("si", $row_user['email'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 3;	
			}
			 
			$stmt = $dbCon->prepare("insert into estore_employee_invite(work_email,created_by,company_id,name,last_name,email,created_date,phone_country_id_invite,phone) values(?, ?, ?, ?, ?, ?, now(),?,?)");	
			$stmt->bind_param("siisssss", $_POST['wemail'],$data['user_id'],$company_id,$row_user['first_name'],$row_user['last_name'],$row_user['email'],$_POST['p_country'],$_POST['pmobile']);
			$stmt->execute();
			
			$in_id=$stmt->insert_id;
			$fields['qloud_invitation'] = $in_id;
			
			$stmt = $dbCon->prepare("insert into invitation(invited_user_id,created_date,unique_id) values (?, now(), ?)");
			$stmt->bind_param("is", $in_id,$fields['unique_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into virtual_user_company_profile (d_country,c_id,`company_id`,`invited_user_id`, `ssn`, title,e_number,h_date,res_date,company_permission,phone,mobile,email) values (?, ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?)") ;
			$stmt->bind_param("ssiisssssisss", $_POST['d_country'], $_POST['c_id'],$company_id,$in_id,$_POST['ssn'],$_POST['title'],$_POST['employeenumber'],$_POST['hdate'],$_POST['rdate'],$_POST['permission'],$_POST['wphone'],$_POST['wmobile'],$_POST['wemail']);
			$stmt->execute();
				
			$stmt = $dbCon->prepare("insert into virtual_user_profiles (`invited_user_id`,`created_on`,`modified_on`) values (?, ?, ?)");
			$stmt->bind_param("iss", $in_id,$d,$d);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update property_location set add_employee=1 where id=?");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();	
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/inviteQloudEmployee';
			$ch = curl_init();
						
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
						
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
						
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						
			curl_close ($ch);
			
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_invited = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is not null");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_invited_approved = $result->fetch_assoc();
				
				
				$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_request = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=1");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_request_approved = $result->fetch_assoc();
				
				$total_request=$row_invited['num']+$row_request['num'];
				$total_request_approved=$row_invited_approved['num']+$row_request_approved['num'];
				$completed=($total_request_approved/$total_request)*100;
				$completed=round($completed,0);
				
				$stmt = $dbCon->prepare("update company_profiles set completed_requests=? where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("ii", $completed,$company_id);
				$stmt->execute();
			
					$to=$row_user['email'];
					$subject="Employer Connection Request";
					$emailContent='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
					<div style="font-size:36px;">Welcome</div>
					<div style="font-size:11px;">' . date("d/m/Y") . '</div>
					</div></td>
					<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/beta/tabcss/mages/images/qmacthup.png" alt="Qloudid" title="Qloudid" style="font-size:35px; color:#FFFFFF;" /></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:18px">Hej  <b>' .$row_user['email'] . '</b>,</div>
					<div style="font-size:14px; padding-top:20px;">
					
					<div style="padding-bottom:10px;"> <h3>På svenska  </h3> </br>
					
					Jag vill be dig ansluta dig till oss med ditt Qloud ID konto och därmed registrera dig som en anställd i våra system.
					
					
					</div>
					
					</div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Var god och klicka på den gröna knappen </a></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:14px;">Din kod:  <br />
					<a href="#" style="text-decoration:none; color:#3691c0;">'.$fields['unique_id'].' </a></div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
					<div><b style="color:#6b6f74;">The Qloudid team</b></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $row_user['email']. '</a>. If you dont want to receive these emails from Qloudid.com in the future, <br />
					please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.Qloudid.com"></a> Qloudid Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
					</tr>
					</table>
					</div>
					</div>
					</body>
					</html>';
					
					sendEmail($subject, $to, $emailContent  );
				
			$stmt->close();
			$dbCon->close();
			return 4;
			}
			
		}
    
	function inviteEmployeeEmail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			 
			$stmt = $dbCon->prepare("select id,email,first_name,last_name  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$sender = $result->fetch_assoc();
			
			$data['invited_user_id']=$this->createUser($_POST);
			$val=$this->createUserProfile($_POST);
			
			if($_POST['wemail']!="")
			{
			$stmt = $dbCon->prepare("select id,email,first_name,last_name  from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userw = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select id,email,first_name,last_name  from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_usere = $result->fetch_assoc();
			
			if(!empty($row_userw)  && ($row_usere['id']!=$row_userw['id']))
			{
			$stmt->close();
			$dbCon->close();
			return 5;	
			}
			
			
			
			$stmt = $dbCon->prepare("select id  from estore_employee_invite where work_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userw = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 6;	
			}
			}
			
			if($_POST['wphone']!="")
			{
			$stmt = $dbCon->prepare("select id from user_profiles where phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wphone']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userwp = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 7;	
			} 
			
			$stmt = $dbCon->prepare("select id from virtual_user_company_profile where phone=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wphone']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userwp = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 8;	
			} 
			}
			$stmt = $dbCon->prepare("select id,email,first_name,last_name  from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			 $row_user = $result->fetch_assoc();
			 $stmt = $dbCon->prepare("select email,company_email from companies left join user_logins on companies.user_login_id=user_logins.id where companies.id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_company = $result->fetch_assoc();
			$company_email=$row_company['company_email'];
			
			if(empty($row_user))
			{
			$fields=array();
			$fields=$_POST;
			$unique_id=$company_id."_".date('Y-m-d h:i:s');
			$fields['unique_id']=$this->encrypt_decrypt('encrypt',$unique_id);
			$fields['company_email'] = $company_email;
			$fields['email'] = $_POST['email'];
			$fields['user_email'] = $data['email'];
			 
			$fields['client_secret'] = 'chandan5af041e1165a9';
			$stmt = $dbCon->prepare("insert into estore_employee_invite(professional_category_id,professional_subcategory_id,work_email,created_by,company_id,name,last_name,email,created_date,phone_country_id_invite,phone) values(?, ?,?, ?, ?, ?, ?, ?, now(),?,?)");	
			$stmt->bind_param("iisiisssss",$_POST['professional_category_id'],$_POST['professional_subcategory_id'], $_POST['wemail'],$data['user_id'],$company_id,$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['p_country'],$_POST['pmobile']);
			$stmt->execute();
			
			$in_id=$stmt->insert_id;
			$fields['qloud_invitation'] = $in_id;
			$data['invitation_id'] = $this -> encrypt_decrypt('encrypt',$in_id);
			$stmt = $dbCon->prepare("insert into invitation(invited_user_id,created_date,unique_id) values (?, now(), ?)");
			$stmt->bind_param("is", $in_id,$fields['unique_id']);
			$stmt->execute();
			 
			$stmt = $dbCon->prepare("insert into virtual_user_company_profile (location_id,d_country,c_id,`company_id`,`invited_user_id`, `ssn`, title,e_number,h_date,res_date,company_permission,phone,mobile,email,country_id) values (?, ?, ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?,?)") ;
			$stmt->bind_param("issiisssssisssi",$_POST['location_id'],$_POST['d_country'], $_POST['c_id'],$company_id,$in_id,$_POST['ssn'],$_POST['title'],$_POST['employeenumber'],$_POST['hdate'],$_POST['rdate'],$_POST['permission'],$_POST['wphone'],$_POST['wmobile'],$_POST['wemail'],$_POST['country']);
			$stmt->execute();
				
			$stmt = $dbCon->prepare("insert into virtual_user_profiles (`invited_user_id`,`created_on`,`modified_on`) values (?, ?, ?)");
			$stmt->bind_param("iss", $in_id,$d,$d);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update property_location set add_employee=1 where id=?");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/inviteQloudEmployee';
			$ch = curl_init();
						
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
						
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
						
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						
			curl_close ($ch);
			
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_invited = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is not null");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_invited_approved = $result->fetch_assoc();
				
				
				$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_request = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=1");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_request_approved = $result->fetch_assoc();
				
				$total_request=$row_invited['num']+$row_request['num'];
				$total_request_approved=$row_invited_approved['num']+$row_request_approved['num'];
				$completed=($total_request_approved/$total_request)*100;
				$completed=round($completed,0);
				
				$stmt = $dbCon->prepare("update company_profiles set completed_requests=? where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("ii", $completed,$company_id);
				$stmt->execute();
			
					$to=$_POST['email'];
					$subject="Complete Your Corporate Portal Account Setup";
					$emailContent='';
					
					sendEmail($subject, $to, $emailContent  );
				
			$stmt->close();
			$dbCon->close();
			return 4;
			}
			else 
			{
			$stmt = $dbCon->prepare("select id from employee_request_cloud  where user_login_id=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row_user['id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			
			$stmt = $dbCon->prepare("select id from employees  where user_login_id=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row_user['id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			
			$fields=array();
			$fields=$_POST;
			$unique_id=$company_id."_".date('Y-m-d h:i:s');
			$fields['unique_id']=$this->encrypt_decrypt('encrypt',$unique_id);
			$fields['company_email'] = $company_email;
			$fields['email'] = $row_user['email'];
			$fields['user_email'] = $data['email'];
			$fields['client_secret'] = 'chandan5af041e1165a9';
			
			$stmt = $dbCon->prepare("select id from estore_employee_invite  where email=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("si", $row_user['email'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 3;	
			}
			
			$stmt = $dbCon->prepare("insert into estore_employee_invite(professional_category_id, professional_subcategory_id,
			created_by, company_id ,name ,last_name,email,created_date,phone_country_id_invite,phone) values(?, ?,?, ?, ?, ?, ?, now(),?,?)");	
			$stmt->bind_param("iiiisssss",$_POST['professional_category_id'],$_POST['professional_subcategory_id'], $data['user_id'],$company_id,$row_user['first_name'],$row_user['last_name'],$row_user['email'],$_POST['p_country'],$_POST['pmobile']);
			$stmt->execute();
			 
			$in_id=$stmt->insert_id;
			$fields['qloud_invitation'] = $in_id;
			$data['invitation_id'] = $this -> encrypt_decrypt('encrypt',$in_id);
			$stmt = $dbCon->prepare("insert into invitation(invited_user_id,created_date,unique_id) values (?, now(), ?)");
			$stmt->bind_param("is", $in_id,$fields['unique_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into virtual_user_company_profile (location_id,`company_id`,`invited_user_id`, `ssn`) values (?, ?, ?, ?)") ;
			$stmt->bind_param("iiis", $_POST['location_id'],$company_id,$in_id,$_POST['ssn']);
			$stmt->execute();
				
			$stmt = $dbCon->prepare("insert into virtual_user_profiles (`invited_user_id`,`created_on`,`modified_on`) values (?, ?, ?)");
			$stmt->bind_param("iss", $in_id,$d,$d);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update property_location set add_employee=1 where id=?");
			$stmt->bind_param("i",$location_id);
			$stmt->execute();
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/inviteQloudEmployee';
			$ch = curl_init();
						
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
						
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
						
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						
			curl_close ($ch);
			
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_invited = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from estore_employee_invite where company_id=? and real_employee_id is not null");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_invited_approved = $result->fetch_assoc();
				
				
				$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_request = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select count(id) as num from employee_request_cloud where company_id=? and is_approved=1");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_request_approved = $result->fetch_assoc();
				
				$total_request=$row_invited['num']+$row_request['num'];
				$total_request_approved=$row_invited_approved['num']+$row_request_approved['num'];
				$completed=($total_request_approved/$total_request)*100;
				$completed=round($completed,0);
				
				$stmt = $dbCon->prepare("update company_profiles set completed_requests=? where company_id=?");
				
				/* bind parameters for markers */
				
				$stmt->bind_param("ii", $completed,$company_id);
				$stmt->execute();
			
					$to=$row_user['email'];
					 
					$subject="Complete Your Corporate Portal Account Setup";
					$emailContent='<html class="translated-ltr"><head><link type="text/css" rel="stylesheet" charset="UTF-8" href="https://www.gstatic.com/_/translate_http/_/ss/k=translate_http.tr.26tY-h6gH9w.L.W.O/am=XjA/d=0/rs=AN8SPfqxH6skN0uVuOvXhu1kLTotQ5vZoA/m=el_main_css"></head><body><div id="goog-gt-tt" class="VIpgJd-yAWNEb-L7lbkb skiptranslate" style="border-radius: 12px; margin: 0 0 0 -23px; padding: 0; font-family: Google Sans, Arial, sans-serif;" data-id=""><div id="goog-gt-vt" class="VIpgJd-yAWNEb-hvhgNd"><div class=" VIpgJd-yAWNEb-hvhgNd-l4eHX-i3jM8c"><img src="https://fonts.gstatic.com/s/i/productlogos/translate/v14/24px.svg" width="24" height="24" alt=""></div><div class=" VIpgJd-yAWNEb-hvhgNd-k77Iif-i3jM8c"><div class="VIpgJd-yAWNEb-hvhgNd-IuizWc" dir="ltr">Original text</div><div id="goog-gt-original-text" class="VIpgJd-yAWNEb-nVMfcd-fmcmS VIpgJd-yAWNEb-hvhgNd-axAV1"></div></div><div class="VIpgJd-yAWNEb-hvhgNd-N7Eqid ltr"><div class="VIpgJd-yAWNEb-hvhgNd-N7Eqid-B7I4Od ltr" dir="ltr"><div class="VIpgJd-yAWNEb-hvhgNd-UTujCb">Rate this translation</div><div class="VIpgJd-yAWNEb-hvhgNd-eO9mKe">Your feedback will be used to help improve Google Translate</div></div><div class="VIpgJd-yAWNEb-hvhgNd-xgov5 ltr"><button id="goog-gt-thumbUpButton" type="button" class="VIpgJd-yAWNEb-hvhgNd-bgm6sf" title="Good translation" aria-label="Good translation" aria-pressed="false"><span id="goog-gt-thumbUpIcon"><svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M"><path d="M21 7h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 0S7.08 6.85 7 7H2v13h16c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73V9c0-1.1-.9-2-2-2zM7 18H4V9h3v9zm14-7l-3 7H9V8l4.34-4.34L12 9h9v2z"></path></svg></span><span id="goog-gt-thumbUpIconFilled"><svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M"><path d="M21 7h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 0S7.08 6.85 7 7v13h11c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73V9c0-1.1-.9-2-2-2zM5 7H1v13h4V7z"></path></svg></span></button><button id="goog-gt-thumbDownButton" type="button" class="VIpgJd-yAWNEb-hvhgNd-bgm6sf" title="Poor translation" aria-label="Poor translation" aria-pressed="false"><span id="goog-gt-thumbDownIcon"><svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M"><path d="M3 17h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 24s7.09-6.85 7.17-7h5V4H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2zM17 6h3v9h-3V6zM3 13l3-7h9v10l-4.34 4.34L12 15H3v-2z"></path></svg></span><span id="goog-gt-thumbDownIconFilled"><svg width="24" height="24" viewBox="0 0 24 24" focusable="false" class="VIpgJd-yAWNEb-hvhgNd-THI6Vb NMm5M"><path d="M3 17h6.31l-.95 4.57-.03.32c0 .41.17.79.44 1.06L9.83 24s7.09-6.85 7.17-7V4H6c-.83 0-1.54.5-1.84 1.22l-3.02 7.05c-.09.23-.14.47-.14.73v2c0 1.1.9 2 2 2zm16 0h4V4h-4v13z"></path></svg></span></button></div></div><div id="goog-gt-votingHiddenPane" class="VIpgJd-yAWNEb-hvhgNd-aXYTce"><form id="goog-gt-votingForm" action="//translate.googleapis.com/translate_voting?client=te_lib" method="post" target="votingFrame" class="VIpgJd-yAWNEb-hvhgNd-aXYTce"><input type="text" name="sl" id="goog-gt-votingInputSrcLang"><input type="text" name="tl" id="goog-gt-votingInputTrgLang"><input type="text" name="query" id="goog-gt-votingInputSrcText"><input type="text" name="gtrans" id="goog-gt-votingInputTrgText"><input type="text" name="vote" id="goog-gt-votingInputVote"></form><iframe name="votingFrame" frameborder="0"></iframe></div></div></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:black">
        <tbody>
            <tr>
                <td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top">

<table border="0" cellpadding="0" cellspacing="0" role="presentation" bgcolor="#FEFEFE" width="100" style="font-family:Helvetica;font-size:12px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:black;text-decoration:none;margin:0px;padding:0px;border:0px;border-collapse:collapse;width:806px">
    <tbody>
        <tr>
            <td align="center" valign="top" style="vertical-align:top">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:black">
                    <tbody>
                        <tr>
                            <td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="padding-left:20px;padding-right:20px">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left">
                                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="https://www.klarna.com/" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.klarna.com/&amp;source=gmail&amp;ust=1723522238441000&amp;usg=AOvVaw2NZlK4_Rg2lcVnGVTtFLBi"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Hi '.$_POST['fname'].'</font></font></h1>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">We have recently launched our corporate employee portal to significantly improve efficiency, streamline communication and boost collaboration across the company. To ensure you have access to all the resources and updates, we need you to create your account.</font></font></div>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:bold;font-size:16px;line-height:18px;text-align:center"><a href="https://www.qloudid.com/public/index.php/UserCompanySignUp/invitedEmployeeDetail/'.$data['invitation_id'].'" rel="noreferrer" style="text-align:center;text-decoration:none;display:inline-block;font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:bold;font-size:16px;line-height:18px;padding:12px 20px;border-radius:21px;background-color:white" target="_blank" data-saferedirecturl="https://www.qloudid.com/public/index.php/UserCompanySignUp/invitedEmployeeDetail/'.$data['invitation_id'].'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Confirm request</font></font></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Click on this link or the button above "Confirm request"</font></font></div>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(74,32,186);font-weight:bold;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px;text-decoration:none!important"><a href="javascript:void(0);" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(74,32,186);font-weight:bold;font-size:16px;line-height:25px;text-decoration:none!important" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://login.klarna.com/eu/uaps/verify/email/not-me?token%3DQidDCuMaLPUhdSbQuMQLPjl29y%252B8jyxHvjPbIMo3rd4wXIolrbwfmIUtVnd%252BlDfJ0d0t2EvkGa17rkz4BJSq7lWhCXKO36TfT7o8zOtY2J%252BXnfidJtZuzi4bLJ82FMoff9UZeMp1g8DWEDH1x%252BA9Xle7o2GJ63TlPoQ%252B%252B%252F7OzULIS9Pt49gHOowdrgzQPJaggBtVOGbRKUv65D3wevb9vuWATY4a7%252FGvcOwJO%252FlQfEpGODodpoxKijNOd50vPQs1B95KTfQP3ptcpY5%252FwUxTjODk1jlkgPrMxNrAarKZWRjzZvM3%252B0M56fjnBo2Fqs%252FgWFq351o5vq9C%252FlZpqWN5lT%252B0vJ5TvAn7NmHv5LJKB%252Fd7rPTQ5TQ%252BuSfJ58NjMiHNYGdYC9JkXX%252B87P0wAjBOEWLLwah6eI3FcDWR180ZBBQ%253D%26market%3DSE%26locale%3Dsv-SE&amp;source=gmail&amp;ust=1723522238441000&amp;usg=AOvVaw0rzONL8Pppft3Ot7cs7x_Y"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Follow the prompts, using your PERSONAL email.</font></font></a></div>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">This part is very important. You need to create a personal account first in order to connect with us as your employer.</font><font style="vertical-align: inherit;"> .</font></font><font style="vertical-align: inherit;"></font></div>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                


<div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Once set up, you will have access to company updates, HR docs, and more. Plus, you can connect with colleagues and join discussions.</font><font style="vertical-align: inherit;"> .</font></font><font style="vertical-align: inherit;"></font></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>




<div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Reach out to me or HR if you need help. </font></font></font></font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">.</font></font></font></font></font></font><font style="vertical-align: inherit;"></font></div>

<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>



<div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Looking forward to your participation!</font></font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">.</font></font></font></font><font style="vertical-align: inherit;"></font></div>
<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table><div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Best Regards</font></font></font></font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">.</font></font></font></font></font></font><font style="vertical-align: inherit;"></font></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="padding-left:20px;padding-right:20px">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
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
</table></td></tr></tbody></table></body></html>';
					sendEmail($subject, $to, $emailContent  );
				
			$stmt->close();
			$dbCon->close();
			return 4;
			}
			
		}
    
	function resendInvitation($data)
	{
		$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			
			$stmt = $dbCon->prepare("select email,unique_id from estore_employee_invite left join invitation on invitation.invited_user_id=estore_employee_invite.id where id=(select invited_user_id from virtual_user_company_profile where ssn=? and company_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST['ssn'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
					$to=$row['email'];
					$subject="Employer Connection Request";
					$emailContent='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
					<div style="font-size:36px;">Welcome</div>
					<div style="font-size:11px;">' . date("d/m/Y") . '</div>
					</div></td>
					<td scope="col" align="right" width="50%" valign="top" style="padding:25px;"><div style="text-align:right"><img src="https://www.qmatchup.com/beta/tabcss/mages/images/qmacthup.png" alt="Qloudid" title="Qloudid" style="font-size:35px; color:#FFFFFF;" /></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td style="background-color:#FFFFFF;"><table width="100%" border="0" cellspacing="0" cellpadding="20">
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:18px">Hej  <b>' .$row['email'] . '</b>,</div>
					<div style="font-size:14px; padding-top:20px;">
					
					<div style="padding-bottom:10px;"> <h3>På svenska  </h3> </br>
					
					Jag vill be dig ansluta dig till oss med ditt Qloud ID konto och därmed registrera dig som en anställd i våra system.
					
					
					</div>
					
					</div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow" style="display:inline-block; padding:20px 35px; font-weight:bold; color:#FFF; background-color:#6ab743; text-decoration:none; border-radius:3px; -webkit-border-radius:3px; ">Var god och klicka på den gröna knappen </a></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col"><div style="font-size:14px;">Din kod:  <br />
					<a href="#" style="text-decoration:none; color:#3691c0;">'.$row['unique_id'].' </a></div></td>
					</tr>
					<tr>
					<td align="left" valign="top" scope="col" style="font-size:16px;"><div style="padding-bottom:5px;">Warm regards,</div>
					<div><b style="color:#6b6f74;">The Qloudid team</b></div></td>
					</tr>
					</table></td>
					</tr>
					<tr>
					<td align="center" valign="top"><div style="padding-top:10px; font-size:11px;">This message was sent to <a href="mailto:#" style="text-decoration:none; color:#3691c0;">' . $row['email']. '</a>. If you dont want to receive these emails from Qloudid.com in the future, <br />
					please click <a href="#" style="text-decoration:none; color:#3691c0;">unsubscribe</a>. <a style="text-decoration:none; color:#6b6f74;" href="https://www.Qloudid.com"></a> Qloudid Outsourcing AB, Stureplan 6, 114 35, Stockholm, Sweden</div></td>
					</tr>
					</table>
					</div>
					</div>
					</body>
					</html>';
					
					sendEmail($subject, $to, $emailContent  );
					
			$stmt->close();
			$dbCon->close();
			return 1;
	}
	
	function countryOption()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name,country_code  from phone_country_code order by country_name");
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
	function checkEmployeeSSN($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			
			 
			$stmt = $dbCon->prepare("select count(id) as num from virtual_user_company_profile where ssn=? and company_id=? and country_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("sii", $_POST['ssn'],$company_id, $_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_virtual = $result->fetch_assoc();
			 
			if($row_virtual['num']>0)
			{
			$stmt->close();
			$dbCon->close();
			return 3;	
			}
			$stmt = $dbCon->prepare("select user_logins.id,email,first_name,last_name  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where ssn=? and country_of_residence=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("si", $_POST['ssn'],$_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			 $row_user = $result->fetch_assoc();
			
			if(empty($row_user))
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
			else 
			{
				
			$stmt = $dbCon->prepare("select id from employees  where user_login_id=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row_user['id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			
			$stmt = $dbCon->prepare("select id from estore_employee_invite  where email=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("si", $row_user['email'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 3;	
			}	
				
			$stmt = $dbCon->prepare("select id,company_id from employee_request_cloud  where user_login_id=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row_user['id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			else 
			{
			$stmt->close();
			$dbCon->close();
			return 4;
			}
			
			
			
			
			
			}
			
		}
    
}