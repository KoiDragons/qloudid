<?php
include 'LoginAdminModel.php';
include '../configs/utility.php';
class LoginAdminController
{
    
    
    public function index()
    {
        $valueNew = checkadmin();
        if ($valueNew == 0) {
            $path = "../../";
            require_once('LoginAdminView.php');
        } else {
            header("location:AdminServices");
        }
    }
    
    
    public function loginAccount($a = null, $b = null, $c = null)
    {
        
        $model = new LoginAdminModel();
		
		
		if(isset($_SESSION['admin_id']) and !session_name() == '')
			{
				//echo "login"; die;
			header("location:AdminServices");
			}
			
        if (isset($_POST['username']) && isset($_POST['password']))
            $data = array();
        
        
        $result = $model->LoginAdmin();
        
        $path   = "../../../";
        if ($result['result'] == 1) {
			
			//echo "jain"; die;
			header("location:AdminServices");
           
        } else if ($result['result'] == 0) {
            $_SESSION['warning'] = "Wrong username/password ";
            
            header("location:../LoginAdmin");
        }
    }
    
}


?>