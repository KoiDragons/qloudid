<?php
require_once 'QardInvitationModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class QardInvitationController
{
   
	public static function invitationInfo($a=null)
		{
			
            $path         = "../../../../";
			$data=array();
			
			$data['id']=cleanMe($a);
			
			$model = new QardInvitationModel();
			$employeeDetail= $model->employeeDetail($data);
			
			require_once('QardInvitationView.php');
			
		}
		

}
?>