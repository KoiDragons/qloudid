<?php
	require_once('../AppModel.php');
	class PublicSignupModel extends AppModel
	{
		function verifyEmail($data)
		{
			$dbCon = AppModel::createConnection();
			  
				//$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);  
				  
				$stmt = $dbCon->prepare("select id from user_logins where email=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $_POST['email']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row_country = $result->fetch_assoc();
				   
				if(!empty($row_country))
				{
				$stmt->close();
				$dbCon->close();
				return $row_country['id'];		 
				
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return 0;	
				}
		}
		
		
		function countryOptions()
		{
			$dbCon = AppModel::createConnection();
			 
		    $stmt = $dbCon->prepare("select * from phone_country_code order by country_name");
			/* bind parameters for markers */
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org=array();
			while($row = $result1->fetch_assoc())
			{
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function saveDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['a_id']);
			
			 
			$code=mt_rand(1111,9999); 
			$code1=mt_rand(1111,9999); 
			$_POST['first_name']=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1');
			$_POST['last_name']=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
			
			if($_POST['user_id']>0)
			{
			$stmt = $dbCon->prepare("select country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$_POST['pcountry']=$row_country['country_of_residence'];
			$_POST['pnumber']=$row_country['phone_number'];			
			}
			
			$stmt = $dbCon->prepare("update qloud_common_signup set first_name=?,last_name=?,country_id=?,phone_number=?,email=?,phone_otp=?,email_otp=? where id=?");
			$stmt->bind_param("ssissiii",$_POST['first_name'],$_POST['last_name'],$_POST['pcountry'],$_POST['pnumber'],$_POST['email'],$code1,$code, $request_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select country_code,country_name from phone_country_code where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['pcountry']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			
			 
			$subject='Verify phone';
			$emailContent='Please verify your phone using code - '.$code1;
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			 
			try{
			$res=json_decode(sendSms($subject, $to, $emailContent),true);
			}
			catch(Exception $e) {
						 
					   
					}
				catch (Error $e) {
					 
								}
			
			
			
			$to=$_POST['email'];
			$subject='Verification code';
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
                                                                <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://click.klarna.es/f/a/PQ8x7X08dZooYu41zakhMQ~~/AABVuwA~/RgRoNYYFP0QXaHR0cHM6Ly93d3cua2xhcm5hLmNvbS9XBXNwY2V1QgpmUQUBU2ZZkFjIUhlrb3dha2VuLmdoaXJtYWlAZ21haWwuY29tWAQAAAAC&amp;source=gmail&amp;ust=1718337056152000&amp;usg=AOvVaw3Fdh_8slomy-uTKO2Dq10h"><img src="https://safeqloud-228cbc38a2be.herokuapp.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
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
                                    <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Your 4-digit code</h1>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi there! Your 4-digit code is:</div>
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
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">This code is sent to you so that you can verify your self for signup</div>
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                        <tbody>
                                            <tr>
                                                <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Do not share this code. Qloud ID representatives will never reach out to you to verify this code over the phone or SMS.</div>
                                    
                                    
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
	
		 
			 
			$stmt->close();
			$dbCon->close();
			return 1;		
			 
		}
		
		 
		 function userSignupInformation($data)
		{
			$dbCon = AppModel::createConnection();
			
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			$stmt= $dbCon->prepare("select * from qloud_common_signup where id=?");
			//echo $query; die;
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['signup_type']==1)
			{
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['proposal_id']);	
			}
			else if($row['signup_type']==2)
			{
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['residence_request_id']);	
			}
			$stmt = $dbCon->prepare("select user_logins.id,first_name,last_name,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where email=?");
			$stmt->bind_param("s",  $row['email']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			 
			 
			if(empty($rowUser))
			{
				
				$stmt= $dbCon->prepare("select * from phone_country_code where country_name=?");
				$stmt->bind_param("s", $row['country_name']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowCountry = $result->fetch_assoc();
				
				$row['user_id']=0;
				$row['first_name']=$row['first_name'];
				$row['last_name']=$row['last_name'];
				$row['country']=$rowCountry['id'];
				$row['phone_number']=$row['phone_number'];
			}
			else
			{
				$row['user_id']=$rowUser['id'];
				$row['first_name']=$rowUser['first_name'];
				$row['last_name']=$rowUser['last_name'];
				$row['country']=$rowUser['country_of_residence'];
				$row['phone_number']=$rowUser['phone_number'];
			}
			
			 
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		
		 
		function createUser($data)
		{
			$dbCon = AppModel::createConnection();
			 
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
			$stmt = $dbCon->prepare("INSERT INTO user_logins (first_name,last_name,registered_from,get_started_wizard_status,email,  email_verification_code , created_on , modified_on, country_of_residence,verification_status,added_on_place) VALUES (?, ?, ?, ?,   ?, ?, now(), now(), ?, ?,?)");
			$stmt->bind_param("ssiissiii", $data['first_name'], $data['last_name'],$st,$st,$data['email'], $data['random_hash'], $data['pcountry'],$rf,$added_on_place);
			$stmt->execute();
			$data['user_id']=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("select user_logins.id,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where country_of_residence=? and phone_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $_POST['pcountry'],$_POST['pnumber']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCheck = $result->fetch_assoc();	
			if(!empty($rowCheck))
			{
			$stmt = $dbCon->prepare("update user_profiles   set phone_number='' where user_logins_id=?");
			$stmt->bind_param("i", $rowCheck['id']);
			$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id,phone_number) VALUES (?, ?)");
			$stmt->bind_param("is", $data['user_id'], $data['pnumber']);
			$stmt->execute();
			}
			else
			{
				$data['user_id']=$row['id'];
			}
			$stmt->close();
			$dbCon->close();
			return $data['user_id'];
			
		}
	
		
		function addProposalReservation($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			
			$stmt= $dbCon->prepare("select * from landloard_society_proposal where id=?");
			$stmt->bind_param("i", $_POST['proposal_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProposal = $result->fetch_assoc(); 
			
			$stmt = $dbCon->prepare("insert into `landloard_society_user_reservation`(proposal_id,`society_id`,`building_id`,`apartment_id`,`user_id`,`proposal_received_from`,`created_on`) values ( ?,?,?,?,?,?,now())");
			$stmt->bind_param("iiiiii",$_POST['proposal_id'], $_POST['society_id'],$_POST['building_id'],$_POST['apartment_id'],$data['user_id'],$rowProposal['company_id']);
			$stmt->execute();
			
			$stmt= $dbCon->prepare("delete from qloud_common_signup where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	
		function approveResidence($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['a_id']);
			
			$stmt= $dbCon->prepare("select * from qloud_common_signup where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowProposal = $result->fetch_assoc(); 
			
			$stmt = $dbCon->prepare("update user_apartment_residential set is_confirmed=1,user_id=? where id=?");
			$stmt->bind_param("ii",$data['user_id'], $rowProposal['residence_request_id']);
			$stmt->execute();
			
			$stmt= $dbCon->prepare("delete from qloud_common_signup where id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$rowProposal['residence_request_id']);
			
		}
		 	
		
		
		}		