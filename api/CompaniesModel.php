<?php
//require_once('AppModel.php');
require_once('user/LoginAccountModel.php');
//require_once('../features_general.php');
class CompaniesModel extends AppModel
{
 
 
  function companyFullDetail($data)
    {
		
		 $dbCon = AppModel::createConnection();
		 $model = new LoginAccountModel();
		$id = $this -> encrypt_decrypt('encrypt',$data['cid']);
		//print_r($data); die;
		if(!isset($_COOKIE['rememberme_qid']))
			{
		 $result = $model->LoginAccount($data);
		 
		if($result['result'] == 0 || $result['result'] == 1)
			{
				echo "Wrong Credentials"; exit();
			}
			else if($result['result'] == 3)
			{
				if(isset($_SESSION['rememberme_qid']))
				{
					setcookie('rememberme_qid', $_SESSION['rememberme_qid'], time()+ (30*60*60*24), '/');
				}
				//echo 1;
//die;
			}
			
			$emal = $this -> encrypt_decrypt('encrypt',$data['email']);	
			}
			else
			{
				$valr=explode(':', $_COOKIE['rememberme_qid']);
				$user_id=$this -> encrypt_decrypt('decrypt',$valr[0]);
		 $stmt = $dbCon->prepare("select email from user_logins where id=?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row1 = $result->fetch_assoc();
		 $emal = $this -> encrypt_decrypt('encrypt',$row1['email']);	
			}		 
		
			
          $stmt = $dbCon->prepare("select name as industry,companies.id,company_name,company_email,website,profile_pic,zipcode,company_profiles.city,cid,company_profiles.country,company_profiles.telephone,address from companies left join company_categories on companies.industry=company_categories.id left join company_profiles on company_profiles.company_id=companies.id where companies.id=?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['cid']);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 if(empty($row))
		 {
			 $stmt->close();
        $dbCon->close();
			 http_response_code(404);
			die(mysqli_error());
		 }
		 else 
		 {
			 if($row['profile_pic']==null || $row['profile_pic']=='')
			{
				     $img = 'images/default-profile-pic.jpg';
			}
			else
			{				
				 $img = '../../../../profile-image/'.$row['profile_pic'];
			}
			$action = '';
			$buttonType = 'button';
			
			
			
        $r['status'] = 'ok';
$r['message'] = [
	'type' => 'user-data',

	'user_content' => [
        'company' => [
            'name' => $row['company_name'],
        ],
        'user' => [
            'id' => '',
            'name' => substr($emal,0,10),
            'image' => [
                'src' => $img,
                'alt' => 'User',
                'title' => 'User',
            ],
        ],
        'fields' => [[
            'type' => 'large',
            'status' => 'success',
            'label' => 'Registration Number',
            'text' => $row['cid'],
        ], [
            'type' => 'large',
            'status' => 'success',
            'label' => 'Industry',
            'text' => $row['industry'],
        ], [
            'type' => 'large',
            'status' => 'success',
            'label' => 'Website',
            'text' => $row['website'],
        ],[
            'type' => 'large',
            'status' => 'success',
            'label' => 'Company Email',
            'text' => $row['company_email'],
        ], [
            'type' => 'large',
            'status' => 'success',
            'label' => 'Address',
            'text' => $row['address'],
        ],  [
            'type' => 'small',
            'status' => 'success',
            'label' => 'Zipcode',
            'text' => $row['zipcode'],
        ], [
            'type' => 'small',
            'status' => 'success',
            'label' => 'City',
            'text' => $row['city'],
        ], [
            'type' => 'small',
            'status' => 'success',
            'label' => 'Country',
            'text' => $row['country'],
        ],[
            'type' => 'small',
            'status' => 'fail',
            'label' => 'Date of Exp',
            'text' => '',
        ], [
            'type' => 'small',
            'status' => 'success',
            'label' => 'Date of issue',
            'text' => '01/13/2016',
        ]],
        'country' => [
            'image' => [
                'src' => 'images/flag.png',
                'alt' => 'Sweden',
                'title' => 'Sweden',
            ],
        ],
        'score' => [
            'image' => [
                'src' => 'images/score.png',
                'alt' => '100/70',
            ],
            'text' => '100/70',
        ]
    ],
];
exit(json_encode($r));
		 
		 }
        
        
    }
	
	
  function getComp($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select * from companies where id = ?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['cid']);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 if(empty($row))
		 {
			 $stmt->close();
        $dbCon->close();
			 http_response_code(404);
			die(mysqli_error());
		 }
		 else 
		 {
			 $json=json_encode($row);
			 $json=$json." Response:".http_response_code(404);
			 $stmt->close();
			 $dbCon->close();
			  return $json;
		 }
		 
		
        
        
    }
	
	
	
	 function companyDetail($data)
    {
        $dbCon = AppModel::createConnection();
       
		$id = $this -> encrypt_decrypt('encrypt',$data['cid']);
		//echo $id; die;
          $stmt = $dbCon->prepare("select company_name,cid,profile_pic from companies left join company_profiles on company_profiles.company_id=companies.id where companies.id = ?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['cid']);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 if(empty($row))
		 {
			 $stmt->close();
        $dbCon->close();
			 http_response_code(404);
			//die(mysqli_error());
		 }
		 else 
		 {
			 if($row['profile_pic']==null || $row['profile_pic']=='')
			{
				     $img = 'images/default-profile-pic.jpg';
			}
			else
			{				
				 $img = '../../../../profile-image/'.$row['profile_pic'];
			}
			$action = '';
			$buttonType = 'button';
			$title="Login";
			$fields="[{'id' => '1','type' => 'email','name' => 'email','label' => 'Email'}, {'id' => '2','type' => 'password','name' => 'password','label' => 'Password'}]";
			//echo $fields; die;
			if($data['login'] == 1)
			{
				$action = '../../../../api.php/companyFullDetail/'.$id;
				$buttonType = 'submit';
				$title='Continue';
				$fields="";
			}
			
			
			
			 $r['status'] = 'ok';
$r['message'] = [
	'type' => 'login-data',

    'user_content' => [
        'company' => [
            'name' => $row['company_name'],
        ],
        'user' => [
            'id' => '',
            'name' => 'User',
            'image' => [
			
            'src' => $img,
                'alt' => 'User',
                'title' => 'User',
            ],
        ],
        'fields' => [[
            'type' => 'large',
            'status' => 'success',
            'label' => 'Social Security Number',
            'text' => $row['cid'],
        ]],
        'country' => [
            'image' => [
                'src' => 'images/flag.png',
                'alt' => 'Sweden',
                'title' => 'Sweden',
            ],
        ],
        'score' => [
            'image' => [
                'src' => 'images/score.png',
                'alt' => '100/70',
            ],
            'text' => '100/70',
        ]
    ],

    'form_content' => [
		'is_logged_in' => $data['login'],
        'id' => 'login-form',
        'method' => 'POST',
        'action' => $action,

        'fields' => [[
            'id' => '1',
            'type' => 'email',
            'name' => 'email',
            'label' => 'Email',
        ], [
            'id' => '2',
            'type' => 'password',
            'name' => 'password',
            'label' => 'Password',
        ]],
        'button' => [
            'type' => $buttonType,
			'id' =>'sub',
            'label' => $title,
        ],
    ]
];
			//echo "<pre>"; print_r($r); echo "</pre>"; die;
			 $json=json_encode($r); //user-data.php
			 //$json=$json." Response:".http_response_code(404);
			 
			 $stmt->close();
			 $dbCon->close();
			// echo $json; die;
			  return $json;
		 }
		 
		
        
        
    }
	
	
	function countryDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
          $stmt = $dbCon->prepare("select id,country_name  from country where id in (select country_id from companies where id= ?)");
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
	
	
	function selectState($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
          $stmt = $dbCon->prepare("select id,state_name  from state where country_id= ?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$output = '<option value="0">-- Select State --</option>';
		 while($row = $result->fetch_assoc())
		 {
			$output = $output."<option value=".$row['id'].">".$row['state_name']."</option>"; 
		 }
		 $stmt->close();
        $dbCon->close();
		 return $output;
        
        
    }
	
	
	function selectCity($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
          $stmt = $dbCon->prepare("select id,city_name  from cities where state_id= ?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$output = '<option value="0">-- Select City --</option>';
		 while($row = $result->fetch_assoc())
		 {
			$output = $output."<option value=".$row['id'].">".$row['city_name']."</option>"; 
		 }
		 $stmt->close();
        $dbCon->close();
		 return $output;
        
        
    }
	
	
	function propertySummary()
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select id,property_name from property order by property_name");
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
	
	
 
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
$forw=checkUser($company_id , $data['user_id'],$dbCon);
			//echo $forw; die;
			if($forw==1)
			{
				header("location:http://qmatchup.com/beta/error404.php");
				die;
			}
		
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
   
    function employeeId($data)
    {
        $dbCon = AppModel::createConnection();
        $emp_id= $this -> encrypt_decrypt('encrypt',$data['user_id']);
		
        $dbCon->close();
		 return $emp_id;
        
        
    }
    
    
   
    
    
    
    
}