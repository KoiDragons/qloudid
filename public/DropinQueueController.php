<?php
require_once 'DropinQueueModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class DropinQueueController
{
    
    
    public static function welcomeGuest($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['lid']=cleanMe($a);
		$model1       = new DropinQueueModel();
		$companyDetail    = $model1->companyDetail($data);
		 
		$corporateColor    = $model1->corporateColor($data);
		require_once('DropinQueueWelcomeView.php');
	
	}
	
	
	 public static function queueList($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['lid']=cleanMe($a);
		$model1       = new DropinQueueModel();
		$companyDetail    = $model1->companyDetail($data);
		
		$queueDetailInfo    = $model1->queueDetailInfo($data);
		 
		require_once('DropInQueueListView.php');
	
	}
	
	
	 public static function joinWaitlist($a=null,$b=null)
    {
		$path = "../../../../../";
		$data=array();
		$data['lid']=cleanMe($a);
		$data['qid']=cleanMe($b);
		$model1       = new DropinQueueModel();
		$companyDetail    = $model1->companyDetail($data);
		$countryOption    = $model1->countryOption($data);
		require_once('DropinQueueGuestDetailView.php');
	
	}
	
	 public static function waitingInformation($a=null,$b=null)
    {
		$path = "../../../../../";
		$data=array();
		$data['lid']=cleanMe($a);
		$data['id']=cleanMe($b);
		$model1       = new DropinQueueModel();
		$companyDetail    = $model1->companyDetail($data);
		 
		$corporateColor    = $model1->corporateColor($data);
		$waitlistGuest    = $model1->waitlistGuest($data);
		if(empty($waitlistGuest))
		{
		header('location:../../welcomeGuest/'.$data['lid']);	die;
		}
		$waitlistCount    = $model1->waitlistCount($data);
		$queueInfo    = $model1->queueInfo($data);
		require_once('DropinQueueWaitlistInformationView.php');
	
	}
	
	 public static function addGuestinfo($a=null,$b=null)
    {
		$path = "../../../../../";
		$data=array();
		$data['lid']=cleanMe($a);
		$data['qid']=cleanMe($b);
		$model1       = new DropinQueueModel();
		require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');
		require_once('../lib/url_shortener.php');
		$addGuestinfo    = $model1->addGuestinfo($data);
		header('location:../../thanksForInfomartion/'.$data['lid']);
	
	}
	
	public static function deleteFromQueue($a=null,$b=null)
    {
		
		$data=array();
		$data['lid']=cleanMe($a);
		$data['id']=cleanMe($b);
		$model1       = new DropinQueueModel();
		$deleteFromQueue    = $model1->deleteFromQueue($data);
		header('location:../../welcomeGuest/'.$data['lid']);
	
	}
	
	public static function thanksForInfomartion($a=null)
    {
		$path = "../../../../";
		$data=array();
		$data['lid']=cleanMe($a);
		$model1       = new DropinQueueModel();
		$companyDetail    = $model1->companyDetail($data);
		$corporateColor    = $model1->corporateColor($data);
		require_once('DropinQueueThanksView.php');
	
	}

}
?>