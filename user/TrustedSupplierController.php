<?php
require_once 'TrustedSupplierModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class TrustedSupplierController
{
    
    
    public static function index()
    {
		$path = "../../";
		$model = new TrustedSupplierModel();
		$testimonialDetail=$model->testimonialDetail();
		$testimonialDetail2=$model->testimonialDetail2();
		$testimonialDetail3=$model->testimonialDetail3();
		$testimonialDetail4=$model->testimonialDetail4();
    require_once('TrustedSupplierView.php');
	
	}
	
	
	

}
?>