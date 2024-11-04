<?php
require_once 'VisitorsQRModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class VisitorsQRController
{
  
	
	public static function visitorAccount($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['eid']=cleanMe($a);
			
			$model = new VisitorsQRModel();
			$employeeDetail= $model->employeeDetail($data);
			
			require_once('VisitorsQRView.php');
			
		}
		
		  
		public static function visitorFrontDesk($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['lid']=cleanMe($a);
			 
			$model = new VisitorsQRModel();
			$data['cid']= $model->locationDetail($data); 
			require_once('VisitorsDeskQRView.php');
			
		}
		
		
}
?>