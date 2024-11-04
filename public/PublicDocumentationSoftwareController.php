<?php

require_once '../configs/utility.php';
require_once('../AppModel.php');
class PublicDocumentationSoftwareController
{
    
    
    public static function index()
    {
		$path = "../../";
    require_once('PublicDocumentationSoftwareView.php');
	
	}
	
	public static function codeofConduct()
    {
		$path = "../../../";
    require_once('PublicDocumentationCodeofConductView.php');
	
	}
	public static function loginApiInfo()
    {
		$path = "../../../";
    require_once('PublicDocumentationSoftwareLoginView.php');
	
	}
	
	public static function terms()
    {
		$path = "../../../";
    require_once('PublicDocumentationTermsView.php');
	
	}
	
	public static function privacy()
    {
		$path = "../../../";
    require_once('PublicDocumentationPrivacyView.php');
	
	}
	
	public static function cookie()
    {
		$path = "../../../";
    require_once('PublicDocumentationCookieView.php');
	
	}
	public static function signinApiInfo()
    {
		$path = "../../../";
    require_once('PublicDocumentationSoftwareSignInView.php');
	
	}
	
	public static function paymentApiInfo()
    {
		$path = "../../../";
    require_once('PublicDocumentationSoftwarePaymentView.php');
	
	}
	
	public static function qloudidAppApiInfo()
    {
		$path = "../../../";
    require_once('PublicDocumentationSoftwareQloudIDAppApiView.php');
	
	}

}
?>