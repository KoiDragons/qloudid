<?php
require_once 'SavenameModel.php';
require_once '../configs/utility.php';
class SavenameController
{
    
    
    public static function index()
    {
		$model = new SavenameModel();
		  $resultContry = $model->selectCountry();
        require_once('SavenameView.php');
    }
    
    
    public static function SavenameAccount($a = null, $b = null, $c = null)
    {
        
        $model = new SavenameModel();
        if (isset($_POST['username']) && isset($b))
            $data = array();
        $data['fname'] = cleanMe($_POST['fname']);
        $data['lname'] = cleanMe($_POST['lname']);
        $data['sex']   = cleanMe($_POST['sex']);
        $data['age']   = cleanMe($_POST['age']);
		 $data['cntry']   = cleanMe($_POST['cntry']);
		  $data['state']   = cleanMe($_POST['state']);
		   $data['city']   = cleanMe($_POST['city']);
		    $data['district']   = cleanMe($_POST['district']);
			
       // echo  $data['district']; die;
        $result        = $model->SavenameAccount($data);
       
        if ($result == 1) {
           header("location:https://www.qmatchup.com/beta/user/index.php/NewPersonal/userAccount");
        } else if ($result == 0) {
            require_once('SavenameErrorView.php');
        }
        
    }
    
	public static function selectState($co = null)
    {
        $stModel = new SavenameModel();
        if (isset($co)) {
            
            $val         = cleanMe($co);
            $resultState = $stModel->selectState($val);
        }
        $option = '<option value="0" >-- Select State --</option>';
        foreach ($resultState as $stateCategory => $StateValue) {
            $stateCategory = htmlspecialchars($stateCategory);
            $option        = $option . '<option value="' . $StateValue['id'] . '">' . $StateValue['state_name'] . '</option>';
        }
        echo $option;
        die;
    }
    
    
    public static function selectCity($c = null)
    {
        $ctModel = new SavenameModel();
        if (isset($c)) {
            $val        = array();
            $val['sid'] = cleanMe($c);
            $resultCity = $ctModel->selectCity($val);
        }
        $option = '<option value="0" >-- Select City --</option>';
        foreach ($resultCity as $category => $value) {
            $category = htmlspecialchars($category);
            $option   = $option . '<option value="' . $value['id'] . '">' . $value['city_name'] . '</option>';
        }
        echo $option;
        die;
    }
    
     public static function selectDistrict($c = null)
    {
        $ctModel = new SavenameModel();
        if (isset($c)) {
            $val        = array();
            $val['sid'] = cleanMe($c);
            $resultDistrict = $ctModel->selectDistrict($val);
        }
        $option = '<option value="0" >-- Select District --</option>';
        foreach ($resultDistrict as $category => $value) {
            $category = htmlspecialchars($category);
            $option   = $option . '<option value="' . $value['id'] . '">' . $value['district_name'] . '</option>';
        }
        echo $option;
        die;
    }
	
	
	
	
	
	
	
}


?>