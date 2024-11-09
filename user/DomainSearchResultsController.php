<?php
require_once 'DomainSearchResultsModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class DomainSearchResultsController
{
    
    
    public static function index()
    {
		$path="../../";
		 
		 
		require_once('DomainSearchResultsView.php');
    
	}
	
	public static function domainAccount($a=null)
	{
		 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp");
        } else {
		$path="../../../";
		$model = new DomainSearchResultsModel();
		$data=array();

		$data['user_id']=$_SESSION['user_id'];
		if(isset($_POST['search']))
			{ 
		//print_r($_POST); die;
				 $data['search']="%".$_POST['search'];
				 $partData=$model->partData($data);
			}
			else 
			{
				$data['search']="";
			}
			$row_summary    = $model->userSummary($data);
		require_once('DomainSearchResultsView.php');
	}
	}
	
    public static function domainSearch($a=null , $b=null)
	{
	$valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../LoginAccount");
        } else {
		$path="../../../";
		$model = new DomainSearchResultsModel();
		
				 $data=array();
				 $data['search']="%".cleanMe($a);
				 $data['lmt']=cleanMe($b);
				 //print_r($data); die;
				 $partDataSearch=$model->partDataSearch($data);
			
		echo $partDataSearch; die;
	}
	}
   
}
?>