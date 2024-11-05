<?php
	require_once 'LoginWrongModel.php';
	require_once '../configs/utility.php';
	class LoginWrongController
	{
		
		
		public static function index()
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				if(isset($_GET['next']))
				{
					$data['client']=$_GET['next'];
					if(isset($_GET['apply']))
					{
						$data['apply']=$_GET['apply'];
					}
					else if(isset($_GET['purchase']))
					{
						$data['purchase']=$_GET['purchase'];
					}
					else if(isset($_GET['login']))
					{
						$data['login']=$_GET['login'];
					}
				}
				require_once('LoginWrongView.php');
				} else {
				
				
				if(isset($_GET['next']))
				{
					//echo $_GET['apply']; die;
					if(isset($_GET['apply']))
					{
						if($_GET['apply']==1){
							header("location:https://www.qloudid.com/walk/authorize.php?response_type=code&client_id=".$_GET['next']."&state=xyz&apply=1");
						}
						else
						{
							header("location:https://www.qloudid.com/walk/authorize_user.php?response_type=code&client_id=".$_GET['next']."&state=xyz&apply=2&job_id=".$_GET['job_id']);
						}
						die;
					}
					else if(isset($_GET['purchase']))
					
					{
						header("location:../../walk/authorize.php?response_type=code&client_id=".$_GET['next']."&state=xyz&purchase=1");
						die;
					}
					else if(isset($_GET['login']))
					
					{
						header("location:../../walk/authorize.php?response_type=code&client_id=".$_GET['next']."&state=xyz&login=1");
						die;
					}
					else
					{
						header("location:../../walk/authorize.php?response_type=code&client_id=".$_GET['next']."&state=xyz");
						die;
					}
					
					//setcookie('rememberme', $result['cookie'], $expire,'/'); exit(0);
				}
				else
				{
					header("location:StoreData/userAccount");
					//setcookie('rememberme', $result['cookie'],$expire,'/'); //exit(0);
				}
			}
		}
		
		
		public static function loginAccount($a = null, $b = null, $c = null)
		{
			
			$model = new LoginWrongModel();
			if (isset($_POST['username']) && isset($_POST['password']))
            $data = array();
			$expire = time() + 60 * 60;
			if(isset($_GET['next']))
			{
				$data['client'] =$_GET['next'];   
			}		
			$data['email']    = cleanMe($_POST['username']);
			$data['password'] = md5($_POST['password']);
			
			$result = $model->loginWrong($data);
			
			$path   = "../../../";
			if ($result['result'] == 1) {
				$warning = warning(0);
				if(isset($_GET['next']))
				{
					if(isset($_GET['apply']))
					{
						if($_GET['apply']=1){
							header("location:../LoginWrong?next=".$data['client']."&apply=1");
						}
						else
						{
							header("location:../LoginWrong?next=".$data['client']."&apply=2");
						}
						
					}
					else if(isset($_GET['purchase']))
					
					{
						header("location:../LoginWrong?next=".$data['client']."&purchase=1");
						die;
					}
					else if(isset($_GET['login']))
					
					{
						header("location:../LoginWrong?next=".$data['client']."&login=1");
						die;
					}
					
					else
					{
						header("location:../LoginWrong?next=".$data['client']);
					}
				}
				else
				{
					header("location:../LoginWrong");
				}
				} else if ($result['result'] == 0) {
				require_once('LoginErrorView.php');
				} else if ($result['result'] == 2) {
				start_Session($result['id']);
				header("location:../StoreData/userAccount");
				} else if ($result['result'] == 3) {
				start_Session($result['id']);
				if(isset($_GET['next']))
				{
					//echo $_GET['apply']; die;
					if(isset($_GET['apply']))
					{
						if($_GET['apply']==1){
							header("location:https://www.qloudid.com/walk/authorize.php?response_type=code&client_id=".$_GET['next']."&state=xyz&apply=1");
						}
						else
						{
							header("location:https://www.qloudid.com/walk/authorize_user.php?response_type=code&client_id=".$_GET['next']."&state=xyz&apply=2");
						}
						
						die;
					}
					else if(isset($_GET['purchase']))
					
					{
						header("location:https://www.qloudid.com/walk/authorize.php?response_type=code&client_id=".$_GET['next']."&state=xyz&purchase=1");
						die;
					}
					else if(isset($_GET['login']))
					
					{
						header("location:https://www.qloudid.com/walk/authorize.php?response_type=code&client_id=".$_GET['next']."&state=xyz&login=1");
						die;
					}
					else
					{
						header("location:../../../walk/authorize.php?response_type=code&client_id=".$data['client']."&state=xyz");
					}
					//setcookie('rememberme', $result['cookie'], $expire,'/'); exit(0);
				}
				else
				{
					header("location:../StoreData/userAccount");
				}
				} else if ($result['result'] == 4) {
				$warning = warning(2);
				
				header("location:https://www.qloudid.com/user/index.php/VerifyEmail/verifyEmailAccount/".$data['email']);
				
				} else if ($result['result'] == 5) {
				$warning = warning(3);
				
				header("location:../LoginWrong");
				
			}
		}
		
	}
	
	
?>