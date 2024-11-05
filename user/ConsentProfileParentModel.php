<?php
require_once('../AppModel.php');
class ConsentProfileParentModel extends AppModel
{
 
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
		
		function checkUserAvailability($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select user_logins_id  from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where ssn=? and user_logins_id!=? and country_of_residence=(select country_of_residence from user_logins where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $_POST['ssn'],$data['user_id'],$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			 
			if(empty($row))
			{ 
			$stmt = $dbCon->prepare("select phone_number,email from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id where  user_profiles.user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select country_code  from phone_country_code where country_name=(select country_name from country where id=(select country_of_residence from user_logins where id=?))");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowC = $result->fetch_assoc();
			$phone="+".trim($rowC['country_code'])."".trim($row['phone_number']);
			$num=(mt_rand(1111111,9999999)); 
			$subject='Your one time password(OTP) is:'.$num;
			$to=$phone;
			$html='Ditt engångslösenord:'.$num;
			$res=sendSms($subject, $to, $html);
			$rs=json_decode($res,true);
			 
			$to = $row['email'];
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
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		}
		
		function updateSSN($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update user_profiles set ssn=? where user_logins_id=?");
			$stmt->bind_param("si", $_POST['ssn'] ,$data['user_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select email from user_logins   where user_logins.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			$_POST['email']=$row['email'];
			$url='https://www.qmatchup.com/beta/user/index.php/NewPersonal/updateUserSSN';
			
			$ch = curl_init();
			
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($_POST));
			curl_setopt($ch, CURLOPT_POST, true);
			
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			
			curl_close ($ch);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		
		
	 function childDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $parent_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
		 
		$stmt = $dbCon->prepare("select country_of_residence,parent_info.is_approved,parent_info.id,concat_ws(' ', child_care_info.first_name, child_care_info.last_name) as name,child_care_info.first_name,child_care_info.last_name,company_name,profile_pic,child_care_info.created_on,user_profiles.ssn from parent_info left join child_care_info on child_care_info.id=parent_info.child_id left join companies on companies.id=child_care_info.company_id left join company_profiles on company_profiles.company_id=companies.id left join user_profiles on user_profiles.user_logins_id=parent_info.parent_user_id left join user_logins on user_logins.id=parent_info.parent_user_id where parent_info.id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $parent_id);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		 
        
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    
}