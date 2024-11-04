<?php // include our OAuth2 Server object
// include our OAuth2 Server object
require_once 'server.php';
include '../configs/database.php';
$dbCon= connect_database("");
function utf8_converter($array)
{
    array_walk_recursive($array, function(&$item, $key){
        if(!mb_detect_encoding($item, 'utf-8', true)){
                $item = utf8_encode($item);
        }
    });
 
    return $array;
}
// Handle a request to a resource and authenticate the access token
if (!$server->verifyResourceRequest(OAuth2\Request::createFromGlobals())) {
    $server->getResponse()->send();
    die;
}
$req = OAuth2\Request::createFromGlobals();
$auth_code = $req->request('access_token');
$query="select user_logins.id,first_name,last_name,email,summary,country_of_residence from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id where user_logins.id=(select user_id from oauth_check_user where access_token='".$auth_code."')";
//echo $query; die;
  $row=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
  $query="select lice_id from user_licence where user_login_id=".$row['id'];
//echo $query; die;
  $result_lice=mysqli_query($dbCon, $query);
  
  $query="select level_id,country_name from user_language left join country on country.id=user_language.c_id where user_login_id=".$row['id'];
//echo $query; die;
  $result_lang=mysqli_query($dbCon, $query);
  
  $query_edu = "select degree_type,user_educations.id,country.country_name,duration,country.id as c_id,school.name as school,school.id as s_id, class.name as degree,class.id as cl_id,field,grade,duration_start,duration_end,activities,description 
	from user_educations left join country on user_educations.country_id=country.id left join school on user_educations.school=school.id left join class on user_educations.degree=class.id where user_logins_id ='".$row['id']."' AND user_educations.is_deleted=0 order by duration_start desc";
	//echo $query_edu; die;
	$result_edu = mysqli_query($dbCon,$query_edu);
	//$row_edu = mysqli_fetch_array($result_edu);
	mysqli_data_seek($result_edu,0);
	$query_exp = "select r_email,user_employements.id as cv_com_id,company_name,location,title,duration_start_month,duration_start,duration_end_month,duration_end,current_job,description
	from user_employements where user_employements.user_logins_id ='".$row['id']."' AND user_employements.is_deleted=0 order by duration_end desc,duration_end_month desc,duration_start desc";
	//echo $query_exp; die;
	$result_exp = mysqli_query($dbCon,$query_exp);
	//$row_exp = mysqli_fetch_array($result_exp);
  
  
  $query="select user_company_id,user_id from oauth_check_user where access_token='".$auth_code."'";
//echo $query; die;
  $row_company=mysqli_fetch_array(mysqli_query($dbCon, $query));
  
	  $val=array();
	  $val['type']='apply';
	  $val['first_name']=$row['first_name'];
	  $val['country_of_residence']=$row['country_of_residence'];
	  $val['last_name']=$row['last_name'];
	  $val['email']=$row['email'];
	  $val['professional_summary']=html_entity_decode(strip_tags(trim($row['summary'])));
	  $val['experiences']=array();
	  $val['educations']=array();
	  $val['licences']=array();
	  $val['languages']=array();
	  $lice=array();
	  
	  $i=0;
	  while($row_lice=mysqli_fetch_array($result_lice))
	  {
		  if($row_lice['lice_id']==1)
		  {
		  $lice[$i]['licence']='yes';
		  }
		  else
		  {
			  $lice[$i]['licence']='no';
		  }
		  $i++;
	  }
	  //echo '<pre>'; print_r($lice); die;
	  $val['licences'] = $lice;
//array_push($val['licences'],$lice); 
	  $lang=array();
	   $i=0;
	  while($row_lang=mysqli_fetch_array($result_lang))
	  {
		  
		  $lang[$i]['level']=$row_lang['level_id'];
		  $lang[$i]['country_name']=$row_lang['country_name'];
		  $i++;
	  }
		  $val['languages']=$lang;
		 //array_push($val['languages'],$lang); 
		 $edu=array();
		 $i=0;
		 while($row_edu = mysqli_fetch_array($result_edu))
		 {
			 $edu[$i]['country_name']=$row_edu['country_name'];
			 $edu[$i]['school_name']=$row_edu['school'];
			 $edu[$i]['degree']=$row_edu['degree'];
			 $edu[$i]['degree_type']=$row_edu['degree_type'];
			 $edu[$i]['duration_in_years']=$row_edu['duration'];
			 $edu[$i]['start_year']=$row_edu['duration_start'];
			 $edu[$i]['end_year']=$row_edu['duration_end'];
			$i++;
		 }
		 $val['educations']=$edu;
		 //array_push($val['educations'],$edu); 
		 
		  $exp=array();
		 $i=0;
		 while($row_exp = mysqli_fetch_array($result_exp))
		 {
			  $exp[$i]['company_name']=$row_exp['company_name'];
			 $exp[$i]['location']=$row_exp['location'];
			 $exp[$i]['title']=$row_exp['title'];
			 $exp[$i]['start_month']=$row_exp['duration_start_month'];
			 $exp[$i]['start_year']=$row_exp['duration_start'];
			 if($row_exp['current_job']=1)
			 {
				$exp[$i]['end_month']="";
				$exp[$i]['end_year']=""; 
			 }
			 else
			 {
			 $exp[$i]['end_month']=$row_exp['duration_end_month'];
			 $exp[$i]['end_year']=$row_exp['duration_end'];
			 }
			 $i++;
		 }
		 $val['experiences']=$exp;
		 
		 echo json_encode(utf8_converter($val)); 
		  die;
	 // echo json_encode(array('first_name' => $row['first_name'], 'last_name' => $row['last_name'], 'email' => $row['email'],'professional_summary'=> html_entity_decode(strip_tags($row['summary'])))); die;
  

?>