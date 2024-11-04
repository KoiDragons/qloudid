<?php
require_once 'CardsInformationModel.php';
require_once 'EmployeeCheckController.php';
require_once '../configs/utility.php';
class CardsInformationController
{
      public static function cardsList($a = null)
    {
        $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				 header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 $data['cid']=cleanMe($a);
				 $model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CardsInformationModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				 $companyDetail    = $model1->companyDetail($data);
				  $listCardDetails    = $model1->listCardDetails($data);
				require_once('CardsInformationListView.php');
			}
      } 
        
    
    public static function cardsDetail($a = null)
    {
        $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				 header("location:../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 $data['cid']=cleanMe($a);
				 $model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CardsInformationModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				 $companyDetail    = $model1->companyDetail($data);
				require_once('CardsInformationView.php');
			}
      } 
        
		
		  public static function cardsEditInformation($a = null,$b=null)
    {
        $valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				 header("location:../../../../../user/index.php/LoginAccount");
				} else {
				$path         = "../../../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				$data['cid']=cleanMe($a);
				$data['card_id']=cleanMe($b);
				 $model       = new EmployeeCheckController();
					$employeeCheck    = $model->checkUserAccount($data['user_id'],$data['cid']);
					if($employeeCheck==1)
					{
					header("location:https://www.qloudid.com/error404.php");
					}
				$model1       = new CardsInformationModel();
				$checkPermission    = $model1->checkPermission($data);
				 
				if($checkPermission ==0)
				{
					header("location:../../RestrictedAccess/companyAccount/".$data['cid']);
				}
				$cardInfo    = $model1->cardInfo($data);
				 $companyDetail    = $model1->companyDetail($data);
				require_once('CardsEditInformationView.php');
			}
      } 
		
		
        public static function checkCard()
		{
		require "../cardvalidity/vendor/autoload.php";	
		$detector = new CardDetect\Detector();
		$card = $_POST['card_number'];

		echo $detector->detect($card); //Visa
			
		}
    
    
    public static function saveCardDetails($a=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				 $data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				require "../cardvalidity/vendor/autoload.php";	
				$detector = new CardDetect\Detector();
				$card = $_POST['card_number'];

				$data['card_type']= $detector->detect($card);
				$model1       = new CardsInformationModel();
				
				$result    = $model1->saveCardDetails($data);
				header("location:../cardsList/".$data['cid']);
			}
		}
		
     public static function updateCardDetails($a=null,$b=null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				$path = "../../";
				header("location:../../../../../user/index.php/LoginAccount");
				} else {
				$data=array();
				 $data['cid']=cleanMe($a);
				$data['user_id']=$_SESSION['user_id'];
				$data['card_id']=cleanMe($b);
				require "../cardvalidity/vendor/autoload.php";	
				$detector = new CardDetect\Detector();
				$card = $_POST['card_number'];

				$data['card_type']= $detector->detect($card);
				$model1       = new CardsInformationModel();
				
				$result    = $model1->updateCardDetails($data);
				header("location:../../cardsList/".$data['cid']);
			}
		}
       
    
}


?>