<?php
require_once 'BusinessEventModel.php';
require_once '../configs/utility.php';
class BusinessEventController
{
    
    
    public static function index()
    {
        require_once('BusinessEventView.php');
    }
    
    
    public static function onCompanyActivate($a = null)
    {
        $path="../../../../../";
        $model = new BusinessEventModel();
       
        $data=array();
		$companyID =cleanMe($a['id']);
		//echo $companyID; die;
		$data['company']=$this->getCompanyData($companyID);
		$data['user']=$this->getUserData($companyID);
		//print_r($data); die;
		$output=$this->serializeData($data);
		return $output;
     
    }
	
	public static function getUserData($a=null){
		$model = new BusinessEventModel();
       
        $data=array();
		$data['id']=cleanMe($a);
		$data1=array();
		 $data1 = $model->userDetail($data);
		return $data1;
	}
	
	public static function getCompanyData($a=null)
	{
		$model = new BusinessEventModel();
       
        $data=array();
		$data['id']=cleanMe($a);
		$data1=array();
		 $data1 = $model->companyDetail($data);
		return $data1;
	}
    
	public static function serializeData($a=null)
	{
		$model = new BusinessEventModel();
       
        $data=array();
		$data=$a;
		//$data1=array();
		 $data1 = $model->serialData($data);
		return $data1;
	}
	
	public static function createAccessToken()
	{
		
	}
}


?>