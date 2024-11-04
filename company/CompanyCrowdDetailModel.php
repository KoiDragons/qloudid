<?php
require_once('../AppModel.php');

class CompanyCrowdDetailModel extends AppModel
{
 
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		

		
        $stmt = $dbCon->prepare("select company_name from companies where companies.id = ?");
        
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
   
      function userAccount($data)
    {
        $dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select sex,dob_day,dob_month,dob_year,created_on,email,country_name,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,get_started_wizard_status from user_logins left join country on country.id=user_logins.country_of_residence where user_logins.id = ?");
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
			
	 function employeeAccount($data)
    {
        $dbCon = AppModel::createConnection();
         $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select id,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country  from user_company_profile  where company_id=? and user_login_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $company_id,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
         $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
        $stmt->close();
        $dbCon->close();
        return $row;
    }
	
	 
    function countPresentEmployee($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$date=date('Y-m-d');
			$stmt = $dbCon->prepare("select count(id) as num from employee_attendence where company_id=? and entry_date=?");
			$stmt->bind_param("is", $company_id,$date);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
    
	 
    function presentEmployees($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$date=date('Y-m-d');
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name, phone_number,country_code from employee_attendence left join user_logins on user_logins.id=employee_attendence.user_id left join user_profiles on user_profiles.user_logins_id=employee_attendence.user_id left join phone_country_code on user_profiles.country_phone=phone_country_code.country_name where company_id=? and entry_date=? limit 0,20");
			$stmt->bind_param("is", $company_id,$date);
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
		function countPresentChildren($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from  child_care_info  where company_id=? and id in(select child_id from dropped_off_children where is_left=0)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function presentChildren($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,address from child_care_info  where company_id=? and id in(select child_id from dropped_off_children where is_left=0) limit 0,20");
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
		function morePresentChildren($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,address from child_care_info  where company_id=? and id in(select child_id from dropped_off_children where is_left=0) limit ?,20");
			$stmt->bind_param("ii", $company_id,$a);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<div class=" white_bg mart10  brdrad3 box_shadow bg_fffbcc_a" style="">
																		<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 black_txt">
																			<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																				<!--<div class="clear hidden-xs"></div>-->

																				<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12 ffamily_avenir">

																					<div class="fleft wi_30 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Fullname">Fullname</span>


																						<a href="#" class="black_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['name'].'</span></a> </div>



																					<div class="fleft wi_50 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Address">Address</span>


																						<a href="#" class="black_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['address'].'</span></a> </div>
																					
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
		function morePresentEmployees($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*20;
			
			$date=date('Y-m-d');
			$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name, phone_number,country_code from employee_attendence left join user_logins on user_logins.id=employee_attendence.user_id left join user_profiles on user_profiles.user_logins_id=employee_attendence.user_id left join phone_country_code on user_profiles.country_phone=phone_country_code.country_name where company_id=? and entry_date=? limit ?,20");
			$stmt->bind_param("isi", $company_id,$date,$a);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<div class=" white_bg mart10  brdrad3 box_shadow bg_fffbcc_a" style="">
																		<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 black_txt">
																			<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																				<!--<div class="clear hidden-xs"></div>-->

																				<div class="wi_100 xs-wi_100 xs-order_3 xs-padt10 fsz12 ffamily_avenir">

																					<div class="fleft wi_30 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Fullname">Fullname</span>


																						<a href="#" class="black_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">'.$row['name'].'</span></a> </div>



																					<div class="fleft wi_20 xs-wi_100 sm-wi_100 xs-mar0 "> <span class="trn " data-trn-key="Phone">Phone</span>


																						<a href="#" class="black_txt txt_0070e0_sbh" ><span class=" edit-text jain2 dblock brdb brdclr_lgtgrey2 fsz16">+'.$row['country_code'].''.$row['phone_number'].'</span></a> </div>
																					
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
		
    
}