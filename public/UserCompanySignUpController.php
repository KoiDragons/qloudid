<?php
require_once 'UserCompanySignUpModel.php';
require_once '../configs/utility.php';
require_once('../lib/url_shortener.php');
require_once('../configs/testMandril.php');
require_once('../lib/url_shortener.php'); 
require_once('../AppModel.php');
class UserCompanySignUpController
{		

		public static function howItWorks($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		require_once('UserCompanySignupHowitWorksView.php');
		}
		
		
		public static function demoMarketplace($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		require_once('UserCompanySignupDemoView.php');
		}
		
		public static function brokers($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$a=explode(',',$selectedMarketplaces['signup_type']);
		if (!in_array(2, $a))
		{
		header('location:../selectSignup/'.$data['domain_id']);die;
		}
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);		
		$selectedMarketplaceSubscriptionServicesDetail    = $model1->selectedMarketplaceSubscriptionServicesDetail($data); 
		require_once('UserCompanySignupBrokersView.php');
		}
		
		public static function selectSubscriptionSignup($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		 
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		if(!isset($_POST['subscription_selected']))
		{
		$_POST['subscription_selected']=1;
		}
		$a=explode(',',$selectedMarketplaces['signup_type']);
		if (!in_array(2, $a))
		{
		header('location:../selectSignup/'.$data['domain_id']);die;
		}
		else
		{
		$_POST['user_signup_type']=2;
		$_POST['subscription_type']=2;
		}
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$data['subscription_selected']=$_POST['subscription_selected'];
		 
		$selectedMarketplaceFeeAccountDetail    = $model1->selectedMarketplaceFeeAccountDetail($data);
		// echo '<pre>'; print_r($selectedMarketplaceFeeAccountDetail);  echo '</pre>'; die;
		require_once('UserCompanySignupSelectServicesView.php');
		//require_once('UserCompanySignupSubscriptionSelectView.php');
		}
		
		
		
		public static function selectTXPSubscription($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		 
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		$_POST['subscription_selected']=1;
		$a=explode(',',$selectedMarketplaces['signup_type']);
		if (!in_array(2, $a))
		{
		header('location:../selectSignup/'.$data['domain_id']);die;
		}
		else
		{
		$_POST['user_signup_type']=2;
		$_POST['subscription_type']=2;
		}
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$data['subscription_selected']=$_POST['subscription_selected'];
		 
		$selectedMarketplaceFeeAccountDetail    = $model1->selectedMarketplaceFeeAccountDetail($data);
		require_once('UserCompanySignupTXPServicesView.php');
		
		}
		
		public static function selectDeveloperSubscription($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		 
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		$_POST['subscription_selected']=1;
		$a=explode(',',$selectedMarketplaces['signup_type']);
		if (!in_array(2, $a))
		{
		header('location:../selectSignup/'.$data['domain_id']);die;
		}
		else
		{
		$_POST['user_signup_type']=2;
		$_POST['subscription_type']=2;
		}
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$data['subscription_selected']=$_POST['subscription_selected'];
		 
		$selectedMarketplaceFeeAccountDetail    = $model1->selectedMarketplaceFeeAccountDetail($data);
		require_once('UserCompanySignupDeveloperServicesView.php');
		
		}
		
		public static function updateLicenceNumber()
		{
		$model1       = new UserCompanySignUpModel();
		$updateLicenceNumber    = $model1->updateLicenceNumber();
		echo $updateLicenceNumber; die;
		}
		
		public static function selectSubscriptionGoldSignup($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		if(!isset($_POST['subscription_selected']))
		{
		header('location:../brokers/'.$data['domain_id']); die;	
		}
		$a=explode(',',$selectedMarketplaces['signup_type']);
		if (!in_array(2, $a))
		{
		header('location:../selectSignup/'.$data['domain_id']);die;
		}
		else
		{
		$_POST['user_signup_type']=2;
		$_POST['subscription_type']=2;
		}
		
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		$selectedMarketplaceFeeAccountDetail    = $model1->selectedMarketplaceGoldAccountDetail($data);
		
		if($selectedMarketplaceDetail['charge_on_buyers']==0)
		{
			 
				header('location:../brokers/'.$data['domain_id']); die;
			 
		}
		
		require_once('UserCompanySignupSelectGoldServicesView.php');
		//require_once('UserCompanySignupSubscriptionSelectView.php');
		}
		
		
		public static function selectSubscriptionPremiumSignup($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		if(!isset($_POST['subscription_selected']))
		{
		header('location:../brokers/'.$data['domain_id']); die;	
		}
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		$a=explode(',',$selectedMarketplaces['signup_type']);
		if (!in_array(2, $a))
		{
		header('location:../selectSignup/'.$data['domain_id']);die;
		}
		else
		{
		$_POST['user_signup_type']=2;
		$_POST['subscription_type']=2;
		}
		
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		$selectedMarketplaceFeeAccountDetail    = $model1->selectedMarketplacePremiumAccountDetail($data);
		if($selectedMarketplaceDetail['charge_on_partners']==0)
		{
			 
				header('location:../brokers/'.$data['domain_id']); die;
			 
		}
		require_once('UserCompanySignupSelectPremiumServicesView.php');
		//require_once('UserCompanySignupSubscriptionSelectView.php');
		}
		
		
		public static function listBookableMarketplaces($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$approvedMarketplaces    = $model1->approvedMarketplaces($data);
		$companyDetail    = $model1->companyDetail($data);
		if(count($approvedMarketplaces)==1)
		{
			header('location:../generateTicketandBook/'.$data['cid'].'/'.$approvedMarketplaces[0]['enc']); die;
		}
		require_once('UserCompanySignUpBookingServiceMarketplaceSelectView.php');
		}
		
		
		public static function generateTicketandBook($a=null,$b=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$generateTicketandBook    = $model1->generateTicketandBook($data);
		 
		}
		
		public static function reviewJob($a=null)
		{
				$path = "../../../../";
				$model       = new UserCompanySignUpModel();
				$data=array();
				$data['job_id']=cleanMe($a);
				$postedJobInfo    = $model->postedJobInfo($data);
				if($postedJobInfo['review_done']==1)
				{
				header('location:../reviewAlreadyCompleted');	
				}
				else if($postedJobInfo['job_status']!=2)
				{
				header('location:../jobNotCompleted');	
				}
				require_once('UserCompanySignUpProfessionalServicesAddReviewView.php');
			
		}
		
		public static function addUserReview($a=null)
		{
				$path = "../../../../";
				$model       = new UserCompanySignUpModel();
				$data=array();
				$data['job_id']=cleanMe($a);
				$addUserReview    = $model->addUserReview($data);
				header('location:../thanksReview');
			
		}
		public static function jobNotCompleted()
		{
				$path = "../../../";
				$model       = new UserCompanySignUpModel();
				require_once('UserCompanySignUpJobNotFinishedView.php');
			
		}
		public static function reviewAlreadyCompleted()
		{
				$path = "../../../";
				$model       = new UserCompanySignUpModel();
				require_once('UserCompanySignUpReviewAlreadyDoneView.php');
			
		}
		public static function thanksReview()
		{
				$path = "../../../";
				$model       = new UserCompanySignUpModel();
				require_once('UserCompanySignUpReviewThanksView.php');
			
		}
		public static function getSubcategoryIssue($a=null)
		{
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$getSubcategoryIssue    = $model1->getSubcategoryIssue($data);
		echo $getSubcategoryIssue; die;
		}
		
		public static function updatePriceForService($a=null,$b=null,$c=null)
		{
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['request_id']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
				$model1       = new UserCompanySignUpModel();
				require_once('../configs/testMandril.php');
				$updatePriceForService    = $model1->updatePriceForService($data);
				header('location:../../../completeProfile/'.$data['cid'].'/'.$data['domain_id']);
			
		} 
		 
		public static function updatePriceForProperty($a=null,$b=null,$c=null)
		{
				$path = "../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['request_id']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
				$model1       = new UserCompanySignUpModel();
				require_once('../configs/testMandril.php');
				$updatePriceForService    = $model1->updatePriceForProperty($data);
				header('location:../../../completeProfile/'.$data['cid'].'/'.$data['domain_id']);
			
		} 
		 
		public static function projectPriceBidInfo($a=null,$b=null,$c=null)
		{
				$path = "../../../../../../";
				$data=array();
				$data['cid']=cleanMe($a);
				$data['request_id']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
				$model1       = new UserCompanySignUpModel();
				$serviceRequestReceivedInfo    = $model1->serviceRequestReceivedInfo($data);
				if($serviceRequestReceivedInfo['is_accepted']==2)
				{
					header('location:../../../../../../pickapro/index.php/Employer/serviceRequestReceived/'.$data['cid'].'/'.$data['domain_id']); die;
				}
				else
				{
					if($serviceRequestReceivedInfo['subcategory_id']==218)
					{
					$propertyManagerApartmentList    = $model1->propertyManagerApartmentList($data);
					$companyDetail    = $model1->companyDetail($data);
					require_once('UserCompanySignUpProfessionalCompanyServiceRequestPropertyPriceInfoView.php');	
					}
					else
					{
						$companyDetail    = $model1->companyDetail($data);
						require_once('UserCompanySignUpProfessionalCompanyServiceRequestPriceInfoView.php');
					}
				}
				 
			
		} 
		public static function completeProfile($a=null,$b=null)
		{
				$path = "../../../../../../";
				$model       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				$companyDetail    = $model->companyDetail($data);
				$employeeDetail    = $model->employeeDetail($data);
				require_once('UserCompanySignupProfessionalServiceUpdateCompanyProfileView.php');
			
		}
		public static function addBookingRules($a=null,$b=null,$c=null)
		{
			
				$path = "../../../../../../";
				$model       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
				$companyDetail    = $model->companyDetail($data);
				$bookingRulesInfo    = $model->bookingRulesInfo($data);
				require_once('UserCompanySignupProfessionalServicesEmployeeRuleView.php');
		}
		
		public static function updateBookingRulesInfo($a=null,$b=null,$c=null)
		{
				$data=array();
				$data['cid']=cleanMe($a);
				$data['eid']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
				$model       = new UserCompanySignUpModel();
				$updateBookingRulesInfo = $model->updateBookingRulesInfo($data);	
				header("location:../../../completeProfile/".$data['cid']."/".$data['domain_id']);
			
		}
		public static function professionalHomeRepairCategoryList($a=null,$b=null,$c=null,$d=null)
		{
		$path = "../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['area_id']=cleanMe($c);
		$data['whom_id']=cleanMe($d);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$homeRepairProblemCategoryDetail    = $model1->homeRepairProblemCategoryDetail($data);
		require_once('UserCompanySignUpProfessionalHomeRepairCategoryListView.php');
		}
		
		public static function professionalHomeRepairSubCategoryList($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['subcatg_id']=cleanMe($b);
		$data['domain_id']=cleanMe($c);
		$data['whom_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$homeRepairProblemSubCategoryDetail    = $model1->homeRepairProblemSubCategoryDetail($data);
		require_once('UserCompanySignUpProfessionalHomeRepairSubCategoryListViewNew.php');
		}
		
		
		public static function homeRepairRequestInfo($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['subcatg_id']=cleanMe($b);
		$data['domain_id']=cleanMe($c); 
		$data['whom_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		if(isset($_POST['subpart_type_detail']))
		{
			$data['problem_subpart_id']=$_POST['subpart_type_detail'];
			$selectedProblemSubpartId = $model1->selectedProblemSubpartId($data);	
			
		}
		else
		{
			$selectedProblemSubpartId = $model1->selectedProblemSubpartId($data);	
			$data['problem_subpart_id']    = $selectedProblemSubpartId['id'];
		}
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$selectedCategoryProblemsInfo    = $model1->selectedCategoryProblemsInfo($data);
		require_once('UserCompanySignUpProfessionalHomeRepairRequestViewNew.php');
		}
		
		
		
		
		public static function languageList($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$suportedLanguagesList    = $model1->suportedLanguagesList($data);
		require_once('UserCompanySignUpProfessionalCompanyLanguageView.php');
		}
		
		public static function updateLanguageAvailable($a=null)
		{
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$updateLanguageAvailable    = $model1->updateLanguageAvailable($data);
		echo 1; die;
		}
		
		public static function jobRequirement($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$languageList    = $model1->languageList();
		$vitechCityList    = $model1->vitechCityList();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$professionalCategoryDetail    = $model1->professionalCategoryDetail($data);
		 
		require_once('UserCompanySignUpProfessionalServicesJobRequirementViewNew.php');	
		}
		 
		public static function postJobRequirementInfo($a=null)
		{
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$result    = $model1->postJobRequirementInfo($data);
		header('location:../thanksSignup/'.$data['domain_id']); die;
		}
		
		public static function professionalJobRoleInfo()
		{
		$path = "../../../";
		$model1       = new UserCompanySignUpModel();
		require_once('UserCompanySignUpProfessionalSelectJobRoleView.php');
		}
		
		
		public static function selectLocation($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$vitechCityList    = $model1->vitechCityGet($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		require_once('UserCompanySignUpProfessionalServicesSelectAreaViewNew.php');
		}
		
		
		public static function selectProposalCity($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		if($data['domain_id']=='NldqdHdqT3Y1V0c5K2M5RlhwMERQQT09')
		 {
			 header('location:../apartmentRequest/'.$data['domain_id']); die;
		 }
		 
		if($selectedMarketplaceDetail['booking_signup_type']==1)
		{
			header("location:../selectCity/".$data['domain_id']); die;
		}
		else
		{
		if(isset($_POST['md_id']))
		{
		$data['md_id']=$_POST['md_id'];	
		}
		else
		{
		$data['md_id']=0;
		
		}
		/*$marketplaceSelectedDomainList    = $model1->marketplaceSelectedDomainList($data);
		if(count($marketplaceSelectedDomainList)>0)
		{
		$data['md_id']=$marketplaceSelectedDomainList[0]['enc'];
		$data['marketplace_domain_id']=$marketplaceSelectedDomainList[0]['id'];
		}*/
		
		$vitechCityList    = $model1->vitechCitySelectList();
		 
		if($selectedMarketplaceDetail['start_page_template']==1)
		{
			require_once('UserCompanySignUpProfessionalServicesSelectCityProposalViewNew.php');
		}
		else if($selectedMarketplaceDetail['start_page_template']==3)
		{
			require_once('UserCompanySignUpProfessionalServicesSelectProposalCityTemplateView.php');
		}
		else
		{
			require_once('UserCompanySignUpProfessionalServicesSelectCityProposalTemplate.php');
		}
		}	
		}
		
		
		public static function apartmentRequest($a=null)
		{
			
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$data['md_id']=0;
		$locationList    = $model1->locationList($data);
		require_once('UserCompanySignUpRequestApartmentView.php');
		 
			
		}
		
		 
		public static function addApartmentRequest($a=null)
		{
			
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		 
		$addApartmentRequest    = $model1->addApartmentRequest($data);
		 
		header("location:../mannualPaymentCompanyInfo/".$data['domain_id'].'/'.$addApartmentRequest);	
		}
		
		
		public static function mannualPaymentCompanyInfo($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$serviceRequestDetail    = $model1->serviceRequestDetail($data);
		 $countryOptions    = $model1->countryOptions($data);
		if($serviceRequestDetail['request_type']==2)
		{
		require_once('UserCompanySignUpApartmentCompanyView.php'); 	
		}
		else
		{
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$serviceSelected    = $model1->serviceSelected($data);
		$bookingServiceInvoiceDetail    = $model1->bookingServiceInvoiceDetail($data);
		
		$oldMonth='';
		$i=(int)date('m'); for($j=$i; $j<=12; $j++) {  
        $oldMonth=$oldMonth.'<option value="'.$j.'" class="lgtgrey2_bg changedText">'.$j.'</option>';
		}
		$nextMonth='';
		for($j=1; $j<=12; $j++) {  
        $nextMonth=$nextMonth.'<option value="'.$j.'" class="lgtgrey2_bg changedText">'.$j.'</option>';
		}
		require_once('UserCompanySignUpMannualPaymentCompanyView.php'); 	
		}
		 
		 
		}
		
		public static function selectCity($a=null)
		{
			
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		 if($data['domain_id']=='NldqdHdqT3Y1V0c5K2M5RlhwMERQQT09')
		 {
			 header('location:../apartmentRequest/'.$data['domain_id']); die;
		 }
		if($selectedMarketplaceDetail['booking_signup_type']==2)
		{
			header("location:../selectProposalCity/".$data['domain_id']); die;
		}
		else
		{
		if(isset($_POST['md_id']))
		{
		$data['md_id']=$_POST['md_id'];	
		}
		else
		{
		$data['md_id']=0;
		
		}
		/*$marketplaceSelectedDomainList    = $model1->marketplaceSelectedDomainList($data);
		//print_r($marketplaceSelectedDomainList); die;
		if(count($marketplaceSelectedDomainList)>0)
		{
		$data['md_id']=$marketplaceSelectedDomainList[0]['enc'];
		$data['marketplace_domain_id']=$marketplaceSelectedDomainList[0]['id'];
		}*/
	 
		$vitechCityList    = $model1->vitechCitySelectList();
		if($selectedMarketplaceDetail['start_page_template']==1)
		{
			require_once('UserCompanySignUpProfessionalServicesSelectCityViewNew.php');
		}
		else if($selectedMarketplaceDetail['start_page_template']==3)
		{
			require_once('UserCompanySignUpProfessionalServicesSelectCityTemplateView.php');
		}
		else
		{
			require_once('UserCompanySignUpProfessionalServicesSelectCityTemplate.php');
		}
			
		}
		
		}
		public static function updateSelectedCity($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		 
		$updateSelectedArea    = $model1->updateSelectedCity($data);
		  
		header('location:../professionalDomainsList/'.$data['domain_id'].'/'.$updateSelectedArea.'/'.$_POST['whom_id'].'/'.$_POST['todo_id']);
		}
		
		public static function professionalDomainsList($a=null,$b=null,$c=null,$d=null)
		{
		$path = "../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['city_id']=cleanMe($b);
		$data['whom_id']=cleanMe($c);
		$data['todo_id']=cleanMe($d);
		 $selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$marketplaceSelectedDomainList    = $model1->marketplaceSelectedDomainList($data);
		if(count($marketplaceSelectedDomainList)==1)
		{
			header('location:../../../../professionalServicesList/'.$data['domain_id'].'/'.$data['city_id'].'/'.$data['whom_id'].'/'.$data['todo_id'].'/'.$marketplaceSelectedDomainList[0]['enc']); die;
		}
		require_once('UserCompanySignUpProfessionalServicesDomainsView.php');
		}	
		
		
		public static function professionalServicesList($a=null,$b=null,$c=null,$d=null,$e=null)
		{
		$path = "../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['city_id']=cleanMe($b);
		$data['whom_id']=cleanMe($c);
		$data['todo_id']=cleanMe($d);
		$data['md_id']=cleanMe($e);
		
		 
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$marketplaceSelectedDomainVerification    = $model1->marketplaceSelectedDomainVerification($data);	
		if($marketplaceSelectedDomainVerification==0)
		{
		header('location:../../../../../professionalDomainsList/'.$data['domain_id'].'/'.$data['city_id'].'/'.$data['whom_id'].'/'.$data['todo_id']); die;	
		}
		$selectedCityDetail    = $model1->selectedCityDetail($data);
		 
		if(isset($_POST['catg_id']))
		{
		$data['catg_id']=$_POST['catg_id'];	
		}
		else
		{
		$data['catg_id']=0;
		
		}
		$updateInactiveServices    = $model1->updateInactiveServices($data);
		$professionalSelectedDomainDetail    = $model1->professionalSelectedDomainDetail($data);
		
		$professionalCategoryDetail    = $model1->professionalCategoryDetailCityBased($data);
		 
 		if(count($professionalCategoryDetail)>0)
		{
		$data['design_template']=$professionalCategoryDetail[0]['design_template'];
		$data['catg_id']=$professionalCategoryDetail[0]['enc'];
		$data['catgory_id']=$professionalCategoryDetail[0]['id'];
		$professionalSubCategoryDetailCityBased    = $model1->professionalSubCategoryDetailCityBased($data);	
		
		}
		else
		{
			$data['catg_id']='';
			$data['catgory_id']=0;
			$data['design_template']=1;
			$professionalSubCategoryDetailCityBased =array();
		}
		$homeRepairProblemCategoryDetail    = $model1->homeRepairProblemCategoryDetail($data); 
		 
		$professionalSelectedDomainDetail    = $model1->professionalSelectedDomainDetail($data); 
		require_once('UserCompanySignUpProfessionalServicesInfoView.php');
		}
		
		
		
		
		
		public static function updateSelectedArea($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$updateSelectedArea    = $model1->updateSelectedArea($data);
		header('location:../forWhomYouWant/'.$data['domain_id'].'/'.$updateSelectedArea);
		}
		
		public static function professionalCategoryList($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['area_id']=cleanMe($b);
		$data['whom_id']=cleanMe($c);
		$professionalCategoryDetail    = $model1->professionalCategoryDetailAreaBased($data);
		require_once('UserCompanySignUpProfessionalServicesCategoryView.php');
		}
		
		public static function forWhomYouWant($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['area_id']=cleanMe($b);
		//$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$professionalServiceWhomAvailable    = $model1->professionalServiceWhomAvailable($data);
		require_once('UserCompanySignUpProfessionalServicesWhomAvailableView.php');
		}
		
		
		 
		
		public static function professionalSubcategoryList($a=null,$b=null,$c=null,$d=null)
		{
		$path = "../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['domain_id']=cleanMe($c);
		$data['area_id']=cleanMe($d);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$professionalCategoryDetail    = $model1->professionalSubCategoryDetailAreaBased($data);
		require_once('UserCompanySignUpProfessionalServicesSubCategoryView.php');
		}
		
		
		public static function movingCleaning($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$professionalCategoryDetail    = $model1->professionalSubCategoryDetail($data);
		$propertyType    = $model1->propertyType($data);
		$cleaningExtraInclusion    = $model1->cleaningExtraInclusion($data);
		require_once('UserCompanySignUpProfessionalServicesMovingCleaningTicketViewNew.php');	
		}
		
		
		public static function homeCleaning($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		//print_r($selectedProfessionalCategoryDetailInfo); die;
		$professionalCategoryDetail    = $model1->professionalSubCategoryDetail($data);
		$propertyType    = $model1->propertyType($data);
		$cleaningExtraInclusion    = $model1->cleaningExtraInclusion($data);
		require_once('UserCompanySignUpProfessionalServicesHomeCleaningTicketViewNew.php');	
		}
		
		public static function windowCleaning($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$professionalCategoryDetail    = $model1->professionalSubCategoryDetail($data);
		$propertyType    = $model1->propertyType($data);
		$cleaningExtraInclusion    = $model1->cleaningExtraInclusion($data);
		require_once('UserCompanySignUpProfessionalServicesWindowCleaningTicketViewNew.php');	
		}
		
		public static function constructionCleaning($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$professionalCategoryDetail    = $model1->professionalSubCategoryDetail($data);
		$propertyType    = $model1->propertyType($data);
		$cleaningExtraInclusion    = $model1->cleaningExtraInclusion($data);
		require_once('UserCompanySignUpProfessionalServicesConstructionCleaningTicketView.php');	
		}
		
		
		public static function commonTicketRequest($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
		$professionalCategoryDetail    = $model1->professionalSubCategoryDetail($data);
		$propertyType    = $model1->propertyType($data);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../lib/url_shortener.php');
		$result    = $model1->addCommonProfessionalServiceRequest($data);
		if($data['todo_id']=='QkhHaWQzcnBweFU5MDRIMllxY3IzQT09')
		{
		header('location:../../../../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$result); die;
		}
		else
		{
		header('location:../../../../../../companiesList/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$result); die;		
		}
		require_once('UserCompanySignUpProfessionalServicesCommonTicketViewNew.php');	
		}
		
		public static function listUserProperties($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		$userSignupRequestProperty    = $model1->userSignupRequestProperty($data);
		$userProffesionalRequest    = $model1->userProffesionalRequest($data);
		  
		if($userSignupRequestProperty['user_property_id']=='' || $userSignupRequestProperty['user_property_id']==null || empty($userSignupRequestProperty))
		{
		$vitechCityList    = $model1->vitechCityList($data);
		$userProperty    = $model1->userProperty($data);
		 
		if(empty($userProperty))
		{
		require_once('UserCompanySignUpProfessionalServicesAddPropertyViewNew.php');	
		}
		else
		{
		require_once('UserCompanySignUpProfessionalServicesPropertyListViewNew.php');	
		}
		}
		else
		{
			 
			require_once('UserCompanySignUpAlreadyDoneView.php');
		}
		}
		
		public static function addUserPropertyInfo($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		$userProffesionalRequest    = $model1->userProffesionalRequest($data);
		$userSignupRequestProperty    = $model1->userSignupRequestProperty($data);
		if($userSignupRequestProperty['user_property_id']=='' || $userSignupRequestProperty['user_property_id']==null || empty($userSignupRequestProperty))
		{
		$vitechCityList    = $model1->vitechCityList($data);
		require_once('UserCompanySignUpProfessionalServicesAddPropertyViewNew.php');
		}
		else
		{
			 
			require_once('UserCompanySignUpAlreadyDoneView.php');
		}
		}
		
		public static function getAreaInfo()
		{
				$model1       = new UserCompanySignUpModel();
				$result    = $model1->vitechAreaList();
				echo $result; die;
				}
				
		public static function getSelectedProperty($a=null)
		{
				$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['request_id']=cleanMe($a);
				$result    = $model1->getSelectedProperty($data);
				echo $result; die;
				}
		
		public static function verifyDates()
		{
		$start=strtotime($_POST['start_date']);
		$end=strtotime($_POST['end_date']);
		
		if($start>$end)
		{
			echo 0; die;
		}
		else
		{
			echo 1; die;
		}
		}
		public static function addProfessionalProperty($a=nulll)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		$addProfessionalProperty    = $model1->addProfessionalProperty($data);
		header('location:../thanksSignupProperty/'.$addProfessionalProperty); die;
		}
		
		public static function updatePropertyDetail($a=nulll)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		 
		$updatePropertyDetail    = $model1->updatePropertyDetail($data);
		header('location:../thanksSignupProperty/'.$updatePropertyDetail); die;
		}
		public static function addProfessionalServiceConstrutionCleaningRequest($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$result    = $model1->addProfessionalServiceConstrutionCleaningRequest($data);
		header('location:../../../thanksSignup'); die;
		}
		public static function addProfessionalServiceWindowCleaningRequest($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$result    = $model1->addProfessionalServiceWindowCleaningRequest($data);
		if($data['todo_id']=='QkhHaWQzcnBweFU5MDRIMllxY3IzQT09')
		{
		header('location:../../../../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$result); die;
		}
		else
		{
		header('location:../../../../../../companiesList/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$result); die;		
		}
		}
		
		public static function addProfessionalHomeRepairRequest($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['subcatg_id']=cleanMe($b);
		$data['domain_id']=cleanMe($c); 
		$data['area_id']=cleanMe($d);
		$data['whom_id']=cleanMe($f);
		$data['todo_id']=cleanMe($e);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$data['property_type_detail']=$_POST['property_type_detail'];
		$data['property_type_detail']=$model1->homeRepairSubcategory($data);
		$result    = $model1->addProfessionalHomeRepairRequest($data);
		if($data['todo_id']=='QkhHaWQzcnBweFU5MDRIMllxY3IzQT09')
		{
		header('location:../../../../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$result); die;	
		}
		else
		{
		header('location:../../../../../../companiesList/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['property_type_detail'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$result); die;		
		}
		}
		
		public static function addProfessionalServiceHomeCleaningRequest($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		$result    = $model1->addProfessionalServiceHomeCleaningRequest($data);
		if($data['todo_id']=='QkhHaWQzcnBweFU5MDRIMllxY3IzQT09')
		{
		header('location:../../../../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$result); die;	
		}
		else
		{
		header('location:../../../../../../companiesList/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$result); die;		
		}
		}
		
		public static function addCommonProfessionalServiceRequest($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../lib/url_shortener.php');
		$result    = $model1->addCommonProfessionalServiceRequest($data);
		if($data['todo_id']=='QkhHaWQzcnBweFU5MDRIMllxY3IzQT09')
		{
		header('location:../../../../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$result); die;
		}
		else
		{
		header('location:../../../../../../companiesList/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$result); die;		
		}
		}
		
		public static function addProfessionalServiceRequest($a=null,$b=null,$c=null,$d=null,$e=null,$f=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../lib/url_shortener.php');
		$result    = $model1->addProfessionalServiceRequest($data);
		 
		if($data['todo_id']=='QkhHaWQzcnBweFU5MDRIMllxY3IzQT09')
		{
		header('location:../../../../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$result); die;	
		}
		else
		{
		header('location:../../../../../../companiesList/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$result); die;		
		}
		}
		
		public static function signUpJobEmailInfo($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$serviceRequestDetail    = $model1->serviceRequestDetail($data);
		$serviceSelected    = $model1->serviceSelected($data);
		 $countryOptions    = $model1->countryOptions($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		 if($serviceSelected==1)
		 {
			$bookingServiceInvoiceDetail    = $model1->bookingServiceInvoiceDetail($data); 
			header('location:../../bookingInvoicePayment/'.$data['domain_id'].'/'.$data['job_id'].'/'.$bookingServiceInvoiceDetail); die;
		 }
		require_once('UserCompanySignUpUserEmailView.php');
		}
		
		public static function signUpJobEmailQrInfo($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$serviceSelected    = $model1->serviceSelected($data);
		 
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		 if($serviceSelected==1)
		 {
			$bookingServiceInvoiceDetail    = $model1->bookingServiceInvoiceDetail($data); 
			header('location:../../bookingInvoicePayment/'.$data['domain_id'].'/'.$data['job_id'].'/'.$bookingServiceInvoiceDetail); die;
		 }
		require_once('UserCompanySignupStartPostJobViewLatest.php'); 
		}
		
		public static function bookingInvoicePayment($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$data['invoice_id']=cleanMe($c);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$serviceSelected    = $model1->serviceSelected($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$bookingServiceInvoiceDetail    = $model1->bookingServiceInvoiceDetail($data); 
		 if($serviceSelected==2)
		 {
			
			header('location:../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$data['job_id']); die;
		 }
		require_once('UserCompanySignupStartPostJobPayViewLatest.php');
		}
		
		public static function updateUserInfo($a=null,$b=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		 
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		
		if(isset($_POST['ip']))
		{
		$data['user_id']    = $model1->loginAppAccount($data);	
		if($data['user_id']==0)
		{
		header('location:../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$data['job_id']); die;	
		}
		else
		{
			$data['carried_for']=$_POST['carried_for'];
			$updateUserOnJob    = $model1->updateUserOnJob($data); 
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			$userSummary    = $model1->userSummary($data); 
			$data['email']=$userSummary['email'];
			$data['cid']=$data['job_id'];
			/*require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$result    = $model1->sendPropertyLink($data);*/
			$selectedSubcategoryDetail    = $model1->selectedSubcategoryDetail($data); 
			if($selectedSubcategoryDetail==1)
			{
			header('location:../../listUserProperties/'.$data['cid']); die;	
			}
			else
			{
				header('location:../../thanksPostingJob/'.$data['domain_id']); die;	
			}				
		}
		}
		else
		{
			header('location:../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$data['job_id']); die;	
		}
		 
		 
		}
		
		
		public static function updateUserPayInfo($a=null,$b=null,$c=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$data['invoice_id']=cleanMe($c);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		 
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		
		if(isset($_POST['ip']))
		{
		$data['user_id']    = $model1->loginAppAccount($data);	
		if($data['user_id']==0)
		{
		header('location:../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$data['job_id']); die;	
		}
		else
		{
			$data['carried_for']=$_POST['carried_for'];
			 
			$updateUserOnJob    = $model1->updateUserPayInfo($data); 
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			$userSummary    = $model1->userSummary($data); 
			$data['email']=$userSummary['email'];
			$data['cid']=$data['job_id'];
			$selectedSubcategoryDetail    = $model1->selectedSubcategoryDetail($data); 
			if($selectedSubcategoryDetail==1)
			{
			header('location:../../../listUserProperties/'.$data['cid']); die;	
			}
			else
			{
				header('location:../../../thanksPostingJob/'.$data['domain_id']); die;	
			}				
		}
		}
		else
		{
			header('location:../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$data['job_id']); die;	
		}
		 
		 
		}
		
		
		public static function emailSignUpJobRequest($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		 
		$data['user_id']    =$_POST['user_id'];	
		if($data['user_id']==0)
		{
			if(empty($_POST['email']))
			{
				header('location:../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$data['job_id']); die;	
			}
			require_once('UserCompanySignUpUserViewNew.php'); die;
		 }
		else
		{
			$data['carried_for']=$_POST['carried_for1'];
			$updateUserOnJob    = $model1->updateUserOnJob($data); 
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			$userSummary    = $model1->userSummary($data); 
			$data['email']=$userSummary['email'];
			$data['cid']=$data['job_id'];
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$result    = $model1->sendPropertyLink($data);
			header('location:../../thanksPostingJob/'.$data['domain_id']); die;	
		}
		}
		
		public static function mannualPaymentInfo($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$serviceSelected    = $model1->serviceSelected($data);
		$bookingServiceInvoiceDetail    = $model1->bookingServiceInvoiceDetail($data);
		/*if($serviceSelected==2)
		 {
			header('location:../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$data['job_id']); die;
		 }*/
		require_once('UserCompanySignUpMannualPaymentViewNew.php');  
		 
		}
		
		
		
		
		
		public static function updatePaymentDetail($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		if($_POST['user_id']>0)
		{
			
			$data['user_id']=$_POST['user_id'];
			
		}
		else
		{
			$data=$_POST;
			$data['user_id']=$model1->createUser($data);
			$createUserProfile=$model1->createUserProfile($data);
		}
		 
			$data['carried_for']=1;
			$saveServicePaymentCardData    = $model1->saveServicePaymentCardData($data);
			$updateServicePaymentDetail    = $model1->updateServicePaymentDetail($data);
			$data['invoice_id']= $model1->bookingServiceInvoiceDetail($data);
			$updateUserOnJob    = $model1->updateUserPayInfo($data); 
			header('location:../../thanksPostingJob/'.$data['domain_id']); die;	 
		}
		
		
		public static function updateCompanyPaymentDetail($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		if($_POST['user_id']>0)
		{
			$data['user_id']=$_POST['user_id'];
			
		}
		else
		{
			$data['user_id']=0;
		}
		$data['carried_for']=2;
		//print_r($_POST); die;
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			$data['serviceSelected']    = $model1->serviceSelected($data);
			$updateServicePaymentData    = $model1->updateServicePaymentData($data);
			$data['updateServicePaymentData']=$updateServicePaymentData;
			$updateCompanPaymentData    = $model1->updateCompanPaymentData($data);
			
			header('location:../../verifyPaymentDetail/'.$data['domain_id'].'/'.$data['job_id'].'/'.$updateServicePaymentData);
		
		}
		
		
		public static function updateBrokerCompanyDetail($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		if($_POST['user_id']>0)
		{
			$data['user_id']=$_POST['user_id'];
			
		}
		else
		{
			$data['user_id']=0;
		}
		$data['carried_for']=2;
		//print_r($_POST); die;
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			$data['serviceSelected']    = $model1->serviceSelected($data);
			$updateServicePaymentData    = $model1->updateServicePaymentData($data);
			$data['updateServicePaymentData']=$updateServicePaymentData;
			$updateCompanPaymentData    = $model1->updateCompanPaymentData($data);
			
			header('location:../../verifyPaymentDetail/'.$data['domain_id'].'/'.$data['job_id'].'/'.$updateServicePaymentData);
		
		}
		
		
		public static function sendOtpToBuyer($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$data['verification_id']=cleanMe($c); 
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');
		$sendOtpToBuyer    = $model1->sendOtpToBuyer($data);	
		header('location:../../../verifyUserDetailForPayment/'.$data['domain_id'].'/'.$data['job_id'].'/'.$data['verification_id']); die;	 
		 
		}
		
		
		public static function verifyUserDetailForPayment($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$data['verification_id']=cleanMe($c); 
		$codeInfo    = $model1->codeInfo($data);	
		$domain_id=$model1->decodeDomainID($data); 
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		require_once('UserCompanySignUpMannualPaymentVerificationView.php');  
		 
		}
		
		public static function sellerReviewInformation($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['verification_id']=cleanMe($a);
		$propertyReservationDetail    = $model1->reservationInformation($data); 
		$data['cid']=$propertyReservationDetail['cid'] ;
		$data['pid']=$propertyReservationDetail ['pid'];
		$data['broker_id']=$propertyReservationDetail ['reservation_fixed_by'];
		$fetchPropertiesImages    = $model1->fetchPropertiesImage($data);
		$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
		$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);
		$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
		require_once('UserCompanySignUpSellerReviewViewNew.php');  
		 
		}
		
		
		public static function sellerReview($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['verification_id']=cleanMe($a);
		$propertyReservationDetail    = $model1->reservationInformation($data); 
		$data['broker_id']=$propertyReservationDetail ['reservation_fixed_by']; 
		$data['cid']=$propertyReservationDetail['cid'] ;
		$data['pid']=$propertyReservationDetail ['pid'];
		$brokerInformation    = $model1->brokerInformation($data);
		$fetchPropertiesImages    = $model1->fetchPropertiesImage($data);
		$fetchPropertiesAddress    = $model1->fetchPropertiesAddress($data);
		$fetchPropertyTaskInfo    = $model1->fetchPropertyTaskInfo($data);
		$fetchPropertiesInterior    = $model1->fetchPropertiesInterior($data);
		require_once('UserCompanySignUpSellerOpenReviewView.php');  
		 
		}
		
		public static function updateSellerReview($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['verification_id']=cleanMe($a);
		$updateSellerReview    = $model1->updateSellerReview($data); 
		header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin');  
		 
		}
		
		public static function verifyPaymentDetail($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['job_id']=cleanMe($b);
		$data['verification_id']=cleanMe($c); 
		$codeInfo    = $model1->codeInfo($data);
		$domain_id=$model1->getDomainId($data);
		$serviceRequestDetail    = $model1->serviceRequestDetail($data);
		if($serviceRequestDetail['request_type']==2)
		{
		$data['carried_for']=2;
		$updateVerificationInfo    = $model1->updateVerificationInfo($data);
		$data['user_id']=$updateVerificationInfo;
		$data['cid']    = $model1->addPaymentCompany($data);
		$updatePayingCompany    = $model1->updatePayingCompany($data);
		header('location:../../../thanksPostingJob/'.$data['domain_id']); die;	
		}
		else
		{
		if($domain_id>0)
		{
		$data['serviceSelected']    = $model1->serviceSelected($data);
		if($codeInfo['payment_mode']==0)
		{
			$data['carried_for']=1;
			$updateVerificationInfo    = $model1->updateVerificationInfo($data);
		}
		else
		{
			$data['carried_for']=2;
			$updateVerificationInfo    = $model1->updateVerificationInfo($data);
			$data['user_id']=$updateVerificationInfo;
			$data['cid']    = $model1->addPaymentCompany($data);
			$updatePayingCompany    = $model1->updatePayingCompany($data);
		}
		if($data['serviceSelected']==1)
		{
		$data['invoice_id']= $model1->bookingServiceInvoiceDetail($data);
		$updateUserOnJob    = $model1->updateUserPayInfo($data); 
		}
		
		header('location:../../../thanksPostingJob/'.$data['domain_id']); die;	
		}
		else
		{
			$updateReservationVerificationInfo    = $model1->updateReservationVerificationInfo($data);
			header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin'); die;
		}
		}
		
		}
		
		
		
		public static function verifyEmail($a=null)
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$verifyEmail    = $model1->verifyEmail($data);
			 
			$senverificationCode    = $model1->senverificationCode($data);
			 echo $verifyEmail; 
			 die;
		}
		
		
		
		public static function verifyCompanyIdentification($a=null)
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$verifyCompanyIdentification    = $model1->verifyCompanyIdentification($data);
			 echo $verifyCompanyIdentification; die;
		}
		
		
		public static function sendVerificationCode($a=null)
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$sendVerificationCode    = $model1->sendVerificationCode($data);
			 echo $sendVerificationCode; die;
		}
		
		
		public static function verifyCodeInfo($a=null)
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$verifyCodeInfo    = $model1->verifyCodeInfo($data);
			 echo $verifyCodeInfo; die;
		}
		
		
		public static function verifyEmailCodeInfo($a=null)
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$verifyCodeInfo    = $model1->verifyEmailCodeInfo($data);
			 echo $verifyCodeInfo; die;
		}
		
		public static function verifyEmailPhoneCodeInfo($a=null)
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['job_id']=cleanMe($a);
			 
			require_once('../configs/smsMandril.php');
			$verifyEmailCodeInfo    = $model1->verifyEmailPhoneCodeInfo($data);
			 echo $verifyEmailCodeInfo; die;
		}
		
		public static function checkUserInfo()
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			
			$verifyCodeInfo    = $model1->checkUserInfo();
			 echo $verifyCodeInfo; die;
		}
		
		public static function addUserAndUpdatePostJob($a=null,$b=null)
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['domain_id']=cleanMe($a);
			$data['job_id']=cleanMe($b);
			$data['carried_for']=$_POST['carried_for'];
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$result    = $model1->addUserDetails($data);
			$data['user_id']=$result;
			$updateUserOnJob    = $model1->updateUserOnJob($data); 
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			$userSummary    = $model1->userSummary($data); 
			$data['email']=$userSummary['email'];
			$data['cid']=$data['job_id'];
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$serviceRequestDetail    = $model1->serviceRequestDetail($data);
			if($serviceRequestDetail['request_type']!=2)
			{
			$result    = $model1->sendPropertyLink($data);
			}
			
			header('location:../../thanksUserSignUp/'.$data['domain_id']);
		}
		
		
		public static function companiesList($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null)
		{
		$path = "../../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		 
		$getProfessionalServiceCompanies    = $model1->getProfessionalServiceCompanies($data);
		
		//echo '<pre>'; print_r($getProfessionalServiceCompanies); echo '</pre>'; die;
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		/*if(count($getProfessionalServiceCompanies)==1)
		{
		header('location:../../../../../../../bookableServiceList/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$data['job_id'].'/'.$getProfessionalServiceCompanies[0]['enc']); die;		
		}*/
		require_once('UserCompanySignupProfessionalCompanyListNew.php');
		}
		
		
		public static function bookableServiceList($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null)
		{
		$path = "../../../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		$companyDetail    = $model1->companyDetail($data);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		$updateInactiveServices    = $model1->updateInactiveServices($data);
		$getProfessionalBookableServices    = $model1->getProfessionalBookingServices($data);
		 
		if(count($getProfessionalBookableServices)==1)
		{
			if($getProfessionalBookableServices[0]['one_shared']==1 || $getProfessionalBookableServices[0]['one_shared_type']==2)
			{
			header('location:../../../../../../../../getGeneralCalander/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$data['job_id'].'/'.$data['cid'].'/'.$getProfessionalBookableServices[0]['enc'].'/bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09'); die;	
			}
			else
			{
			header('location:../../../../../../../../sharedServiceDetail/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$data['job_id'].'/'.$data['cid'].'/'.$getProfessionalBookableServices[0]['enc']);	die;	
			}
			
		}
		require_once('UserCompanySignupProfessionalAvailableServiceListView.php');
		}
		
		 
		public static function updateSelectedServices($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null)
		{
		$path = "../../../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		
		$encryptServiceList    = $model1->encryptServiceList($data);
		 
		header('location:../../../../../../../../getGeneralCalander/'.$data['catg_id'].'/'.$data['whom_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id'].'/'.$data['area_id'].'/'.$data['todo_id'].'/'.$data['job_id'].'/'.$data['cid'].'/'.$encryptServiceList.'/bFhCcE1Cc0tqRnhiL0VLdHNzU2VSQT09'); die;	
		}
		
		
		public static function serviceEmployeeList($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null,$i=null)
		{
		$path = "../../../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		$data['service_id']=cleanMe($i);
		$professionalCompanyEmployeeList    = $model1->professionalCompanyEmployeeList($data);
		$selectedServiceInfo    = $model1->selectedServiceInfo($data); 
		 
		$selectedServiceImages    = $model1->selectedServiceImages($data);
		require_once('UserCompanySignUpEmployeeListViewNew.php');
		}
		
		public static function sharedServiceDetail($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null,$i=null)
		{
		$path = "../../../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		$data['service_id']=cleanMe($i);
		$professionalCompanyEmployeeList    = $model1->professionalCompanyEmployeeList($data);
		$selectedServiceInfo    = $model1->selectedServiceInfo($data); 
		 $selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		//$selectedServiceImages    = $model1->selectedServiceImages($data);
		require_once('UsercompanySignupSharedServiceDetailViewNew.php');
		}
		
		public static function getPublicEmployeeCalander($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null,$i=null,$j=null)
		{
		$path = "../../../../../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		$data['service_id']=cleanMe($i);
		$data['employee_id']=cleanMe($j);
		 
		$data['date_flag']=0;
		$data['w_width']=450;
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		$professionalCompanyEmployeeList    = $model1->professionalCompanyEmployeeList($data);
		require_once('UserSignUpOpenServiceEmployeeCalenderViewNew.php');
		}
		
		public static function updateBookingTimeInfo($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null,$i=null,$j=null)
		{
		$path = "../../../../../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		$data['service_id']=cleanMe($i);
		$data['employee_id']=cleanMe($j);
		
		$data['date_flag']=0;
		$updateBookingTimeInfo    = $model1->updateBookingTimeInfo($data);
		header('location:../../../../../../../../../../signUpJobEmailInfo/'.$data['domain_id'].'/'.$data['job_id']);
		}
		
		public static function getOpenNewCalender($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null,$i=null,$j=null)
		{
		$path = "../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		$data['service_id']=cleanMe($i);
		$data['employee_id']=cleanMe($j);
		$data['date_flag']=$_POST['date_flag'];
		$data['w_width']=$_POST['w_width'];
		
		$bookingPrivateCalenderInfo    = $model1->dstrictBookingOpenCalenderInfo($data);
		echo $bookingPrivateCalenderInfo; die;
		}
		
		public static function getGeneralCalander($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null,$i=null,$j=null)
		{
		$path = "../../../../../../../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		$data['service_id']=cleanMe($i);
		$data['employee_id']=cleanMe($j);
		$data['date_flag']=0;
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		$selectedServiceInfo    = $model1->selectedServiceInfo($data);
		$professionalCompanyEmployeeList    = $model1->professionalCompanyEmployeeList($data);
		require_once('UserCompanySignUpEmployeeCalenderViewNew.php');
		}
		
		public static function getNewCalender($a=null,$b=null,$c=null,$d=null,$e=null,$f=null,$g=null,$h=null,$i=null,$j=null)
		{
		$path = "../../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['catg_id']=cleanMe($a);
		$data['whom_id']=cleanMe($b);
		$data['subcatg_id']=cleanMe($c);
		$data['domain_id']=cleanMe($d);
		$data['area_id']=cleanMe($e);
		$data['todo_id']=cleanMe($f);
		$data['job_id']=cleanMe($g);
		$data['cid']=cleanMe($h);
		$data['service_id']=cleanMe($i);
		$data['employee_id']=cleanMe($j);
		$data['date_flag']=$_POST['date_flag'];
		$bookingPrivateCalenderInfo    = $model1->bookingPrivateCalenderInfo($data);
		echo $bookingPrivateCalenderInfo; die;
		}
		
		public static function signUpVerificationQr($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		if($_POST['user_id']!="")
		{
		$data['user_id']    = $_POST['user_id'];	
		$data['cid']    = $_POST['cid'];
		$data['user_signup_info']=$_POST['user_signup_info'];
		$cookie_value=$data['user_id'].'_'.$data['cid'].'_'.$data['user_signup_info'];		
		setcookie('user_company', $cookie_value, time() + (86400 * 30), "/");
		}
		else
		{
			$a=explode('_',$_COOKIE['user_company']);
			$data['user_id']    = $a[0];	
			$data['cid']    = $a[1];
			$data['user_signup_info']=$a[2];
		}
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		require_once('UserCompanySignupVerificationQrViewLatest.php');
		}
		
		
		
		public static function verifyUserRequestInfo($a=null,$b=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['cid']    = cleanMe($b); 
		
		if($_POST['user_id']=="")
		{
			$a=explode('_',$_COOKIE['user_company']);
			$_POST['user_id']    = $a[0];	
			$data['cid']    = $a[1];
			$data['user_signup_info']=$a[2];
		}
		else
		{
			$data['user_signup_info']=$_POST['user_signup_info'];
		}			
	
		$data['user_id']    = $model1->loginAppAccount($data);	
		
		unset($_COOKIE['user_company']);
		
		if($_POST['user_id']!=$data['user_id'])
		{
		header('location:../../signUpEmailInfo/'.$data['domain_id']); die;	
		}
				
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../lib/url_shortener.php');
		
		
		if($data['user_signup_info']==2)
		{
		 
		$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
		$sendPremiumAccountRequest    = $model1->sendPremiumAccountRequest($data);	
		 
		}
		else if($data['user_signup_info']==3)
		{
		$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
		$companySignupMarketplaces    = $model1->companySignupMarketplaces($data);	
		}
		header('location:../../signUpEmailInfo/'.$data['domain_id']); die;	
		}
		
		public static function addCompanyInfo($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		 
		if(!isset($_POST['user_id']))
		{
		header('location:../signUpEmailInfo/'.$data['domain_id']); die;	
		}
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['user_id']=$_POST['user_id'];
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$professionalCategoryDetail = $model1->professionalSubCategoryDetailForCompany($data);
		require_once('UserCompanySignUpCompanyViewNew.php');
		}
		
		
		
		public static function errorVerifyingRequest($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		require_once('UserCompanySignupErrorVericationView.php');
		}
		
		public static function selectSignup($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
	 
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data); 
		require_once('UserCompanySignupSelectViewNew.php');
		}
		
		
		
		
		public static function signUpEmailInfo($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		 
		if(!isset($_POST['user_signup_type']))
		{
			$_POST['user_signup_type']=1;
		}
		
		if(!isset($_POST['subscription_type']))
		{
			$_POST['subscription_type']=0;
		}
		
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		require_once('UserCompanySignupStartView.php');
		}
		
		
		public static function listEmployers($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		$verifyIP = $model1->verifyIP();
		 
		$selectedMarketplaces    = $model1->selectedMarketplaces($data); 
		
		if(isset($_POST['ip']))
		{
		$data['user_id']    = $model1->loginAppAccount($data);	
		if($data['user_id']==0)
		{
		header('location:../signUpEmailInfo/'.$data['domain_id']); die;	
		}
		if($_POST['user_signup_info']==2)
		{
		$employerSummary = $model1->employerSummary($data);
		 
		}
		else if($_POST['user_signup_info']==3)
		{
		$employerSummary = $model1->userCompanySummary($data);	
		}
		else
		{
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
		header('location:../signUpEmailInfo/'.$data['domain_id']); die;		
		}
		}
		else
		{
			header('location:../signUpEmailInfo/'.$data['domain_id']); die;
		}
		require_once('UserCompanyUserSignUpEmployerListViewNew.php');	
		 
		}
		
		
		public static function emailSignUpRequest($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['signup_type']=2;
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../lib/url_shortener.php');
		
		$sendSignUpRequest    = $model1->sendSignUpRequest($data);
		 
		if($sendSignUpRequest['result']==0)
		{
			header('location:../signUpProfessionalInfo/'.$data['domain_id'].'/'.$sendSignUpRequest['id']); die;
		}
		header('location:../verifySignupEmail/'.$data['domain_id'].'/'.$sendSignUpRequest['id']);
		//require_once('UserCompanySignUpStartThanksView.php');
		}
		
		public static function verifySignupEmail($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['request_id']=cleanMe($b);
		$data['signup_type']=2;
		
		
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		$emailRequestReceivedInfo    = $model1->emailRequestReceivedInfo($data);
		  
		 
		require_once('UserCompanyUserSignUpVerifyEmailOtpView.php');	
		 
		}
		
		
		public static function verifyEmailOtpDetail($a=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['request_id']=cleanMe($a);
		 
		$verifyEmailOtpDetail    = $model1->verifyEmailOtpDetail($data);
		echo $verifyEmailOtpDetail; die;	
		 
		}
		
		public static function signUpProfessionalInfo($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['request_id']=cleanMe($b);
		$data['signup_type']=2;
		$emailRequestReceivedInfo    = $model1->emailRequestReceivedInfo($data);
		if(!isset($_POST['otp1']) && $emailRequestReceivedInfo ['user_id']>0)
		{
			header('location:../../verifySignupEmail/'.$data['domain_id'].'/'.$data['request_id']); die;
		}
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$selectedMarketplaces    = $model1->selectedMarketplaces($data);
		
		  
		$professionalCategoryDetail    = $model1->professionalSubCategoryDetailForCompany($data);
		$countryOptions    = $model1->countryOptions();
		 
		if($emailRequestReceivedInfo['user_signup_info']!=1)
		{
		require_once('UserCompanyUserSignUpUserCompanyView.php');	
		}
		
		else
		{
			require_once('UserCompanyUserSignUpUserViewLatest.php');
		}
		
		}
		
		
		public static function invitedEmployeeDetail($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['invitation_id']=cleanMe($a);
		$invitationDetail    = $model1->invitationDetail($data);
		$countryOptions    = $model1->countryOptions();
		$deleteNewEmployeeDetails    = $model1->deleteNewEmployeeDetails($data);
		require_once('UserCompanyUserSignUpInvitedEmployeeView.php');
		 
		}
		
		
		public static function addEmployeeDetails($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['invitation_id']=cleanMe($a);
		require_once('../lib/url_shortener.php');
		require_once('../configs/testMandril.php');
		require_once('../configs/smsMandril.php');
		$addEmployeeDetails    = $model1->addEmployeeDetails($data);
		header('location:../verifyEmployeeIdentity/'.$data['invitation_id']);
		 
		}
		
		
		public static function verifyEmployeeIdentity($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['invitation_id']=cleanMe($a);
		$invitationDetail    = $model1->invitationDetail($data);
		$invitationVerifyUserDetail    = $model1->invitationVerifyUserDetail($data);
		 
		require_once('UserCompanyUserSignUpVerifyInvitedEmployeeView.php');
		 
		}
		
		
		
		public static function verifyEmployeeDetailCreateAccount($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['invitation_id']=cleanMe($a);
		$invitationDetail    = $model1->invitationDetail($data);
		$verifyEmployeeDetailCreateAccount    = $model1->verifyEmployeeDetailCreateAccount($data);
		header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin');
		 
		}
		
		
		public static function addCompanyDetails($a=null)
		{
		$path = "../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		 
			 
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			
			$data=$_POST;
			$isAlreadyUser=$model1->isAlreadyUser($data);
			  
			if(isset($_POST['user_id']))
			{
				$data['user_id']=$_POST['user_id'];
			}
			else
			{
				  
				$data=$_POST;
				$data['user_id']=$model1->createUser($data);
				$createUserProfile=$model1->createUserProfile($data);
			}
			 
			 
			$data['domain_id']=cleanMe($a);
			$data['objectType']=$_POST['objectType'];
			$data['signup_type']=2;
			$selectedMarketplaces    = $model1->selectedMarketplaces($data);
			$data['user_signup_type']=$_POST['user_signup_info'];
			$result    = $model1->addUserSellingCompany($data);
			 
			if($data['user_signup_type']==3)
			{
				if($isAlreadyUser==1)
				{
					if($data['domain_id']=='dllSSkw4cURDVW94V0o4RENKTVRmdz09')
					{
					header('location:https://safeqloud-228cbc38a2be.herokuapp.com/public/index.php/UserCompanySignUp/thanksUserCompanySignUp/'.$data['domain_id']); die;	
					}
					else
					{
						header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin'); die;
					}
					
					
					
				}
				else
				{
					header('location:https://safeqloud-228cbc38a2be.herokuapp.com/public/index.php/UserCompanySignUp/thanksUserSignUp/'.$data['domain_id']); die;
				}
			}
			 if($_POST['subscription_type']<=1)
			 {
				 $result2    = $model1->fetchLicenceNumber($data);
				 if($result2==0)
				 {
					$data['cid']=$result;
					$result2    = $model1->updateLicenceCompany($data);
					header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin'); 	 
				 }
				 else
				 {
					$data['subscription_type']=$_POST['subscription_type'];
					$_POST['subscription_type']=$model1->encodeSubscription($data);
				
					header('location:../companyCardDetailInfo/'.$data['domain_id'].'/'.$result.'/'.$_POST['subscription_type']); 
				 }
				
			 }
			else
			{
			 
				$data['subscription_type']=$_POST['subscription_type'];
				$_POST['subscription_type']=$model1->encodeSubscription($data);
				
				header('location:../companyCardDetailInfo/'.$data['domain_id'].'/'.$result.'/'.$_POST['subscription_type']);
			}
			
		
		}
		
		
		public static function companyCardDetailInfo($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['cid']=cleanMe($b);
		$data['subscription_type']=cleanMe($c);
		$selectedMarketplaceDetail    = $model1->selectedMarketplaceDetail($data);
		$oldMonth='';
		$i=(int)date('m'); for($j=$i; $j<=12; $j++) {  
        $oldMonth=$oldMonth.'<option value="'.$j.'" class="lgtgrey2_bg changedText">'.$j.'</option>';
		}
		$nextMonth='';
		for($j=1; $j<=12; $j++) {  
        $nextMonth=$nextMonth.'<option value="'.$j.'" class="lgtgrey2_bg changedText">'.$j.'</option>';
		}
		require_once('UserCompanySignUpCompanyCardDetailView.php');	
		
		}
		
		
		public static function updateCompanyCardPaymentDetail($a=null,$b=null,$c=null)
		{
		$path = "../../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['domain_id']=cleanMe($a);
		$data['cid']=cleanMe($b);
		$data['subscription_type']=cleanMe($c);
		require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
		$updateCompanyCardPayment    = $model1->updateCompanyCardPayment($data);
		header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/LoginAccount/emailLogin'); 
		
		}
		
		public static function addUserDetails($a=null)
		{
			$path = "../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['domain_id']=cleanMe($a);
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			require_once('../lib/url_shortener.php');
			$result    = $model1->addUserDetails($data);
			$data['user_id']=$result;
			$userSignupMarketplaces    = $model1->userSignupMarketplaces($data);
			header('location:https://safeqloud-228cbc38a2be.herokuapp.com/user/index.php/ShareMonitor/shareMonitorRequestList');
		}
		
		public static function thanksUserSignUp($a=null)
		{
			$path = "../../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['domain_id']=cleanMe($a);
			require_once('UserCompanyUserSignUpThanksView.php');
		}
		public static function thanksUserCompanySignUp($a=null)
		{
			$path = "../../../../";
			$model1       = new UserCompanySignUpModel();
			$data=array();
			$data['domain_id']=cleanMe($a);
			require_once('UserCompanyUserCompanyUploadThanksView.php');
		}
		
		public static function thanksPostingJob($a=null)
		{
		$path = "../../../../";
		$data=array();
		$data['domain_id']=cleanMe($a);
		if(!empty($_POST))
		{
			$lan=$_POST['lang_id'];
		}
		else
		{
		$lan='en';	
		}
		require_once('UserCompanySignUpPostedJobThanksView.php');
		}
		
		public static function thanksSignup($a=null)
		{
		$path = "../../../../";
		$data['domain_id']=cleanMe($a);
		require_once('UserCompanySignUpThanksInfoView.php');
		}
		
		public static function thanksSignupProperty($a=nulll)
		{
		$path = "../../../../";
		$data=array();
		$data['domain_id']=cleanMe($a); 
		require_once('UserCompanySignUpThanksPropertyInfoView.php');
		}
		
		
		
		public static function meetingInfo()
		{
		$path = "../../../";
		require_once('UserCompanyMeetingInfoView.php');
		}
		
		public static function signUpInfo($a=null)
		{
		$path = "../../../../";
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['signup_type']=1;
		require_once('UserCompanySignUpNewView.php');
		}
		
		
		public static function landloardList($a=null)
		{
		$path = "../../../../";
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$model1       = new UserCompanySignUpModel();
		$companyLandloardList    = $model1->companyLandloardList($data);
		if(count($companyLandloardList)==0)
		{
			header('location:../signUpInfo/'.$data['checkout_id']);
		}
		require_once('UserCompanySignUpLandloardListView.php');
		}
		
		public static function verifyConnectionInformation($a=null,$b=null)
		{
		$path = "../../../../../";
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$data['cid']=cleanMe($b);
		$model1       = new UserCompanySignUpModel();
		$buildingList    = $model1->buildingList($data);
		require_once('UserCompanySignUpLandloardConnectDetailView.php');
		}
		
		
		public static function getPorts($a=null,$b=null)
		{
			 
				$path = "../../../../../";
				$data=array();
				 $data['cid']=cleanMe($b);
				$model = new UserCompanySignUpModel();
				$getPorts    = $model->getPorts($data); 
				echo $getPorts; die;
			
		}
		
		public static function getFloors($a=null,$b=null)
		{
		 
				$data=array();
				$data['cid']=cleanMe($b);
				$model = new UserCompanySignUpModel();
				$getFloors    = $model->getFloors($data); 
				echo $getFloors; die;
		 
		}
		
		 public static function sendConnectRequest($a=null,$b=null)
		{
			 
				$path="../../../../../";
				$model1 = new UserCompanySignUpModel();
				$data=array();
				$data['checkout_id']=cleanMe($a);
				$data['cid']=cleanMe($b);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$sendConnectRequest    = $model1->sendConnectRequest($data);
				header("location:https://dstricts.com/public/index.php/BookingInformation/checkedInDetail/".$data['checkout_id']);
			 
			 
		}
		
		
		public static function addCompanyBuilding($a=null)
		{
		$path = "../../../";
		$data=array();
		$data['checkout_id']=cleanMe($a);
		$model1       = new UserCompanySignUpModel();
		$_POST['signup_type']=1;
		$result    = $model1->addProfessionalCompany();
		header("location:../verifyConnectionInformation/".$data['checkout_id'].'/'.$result);
		}
		
		 
		
		
		public static function addBuildingDetails($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['checkout_id']=cleanMe($a);
		if(empty($_POST))
		{
			header('location:../signUpInfo/'.$data['checkout_id']); die;
		}
		$userDetailInfo    = $model1->userDetailInfo($data);
		require_once('UserCompanyBuildingInfoView.php');	
		}
		
		public static function updateAreaInformation($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$selectedAreaDetail    = $model1->selectedAreaDetail($data);
		$companyDetail    = $model1->companyDetail($data);
		require_once('UserCompanySignUpProfessionalSelectedAreaView.php');
		}
		
		public static function updateAllArea($a=null,$b=null)
		{
			 	$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				$result    = $model1->updateAllArea($data);
				$result    = $model1->selectedAreaDetail($data);
				echo $result; die;
			
		}
		
		public static function updateArea($a=null,$b=null)
		{
				$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				$result    = $model1->updateArea($data);
				//$result    = $model1->selectedAreaDetail($data);
				echo $result; die;
			
		}
		
		public static function listApprovedMarketplaces($a=null)
		{
		$path = "../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$data['objectType']=1;
		$data['set_object']=1;
		$approvedMarketplaces    = $model1->approvedMarketplaces($data);
		$companyDetail    = $model1->companyDetail($data);
		require_once('UserCompanySignUpProfessionalApprovedMarketplacesView.php');
		}
		public static function updateServiceInformation($a=null,$b=null)
		{
		$path = "../../../../../";
		$model1       = new UserCompanySignUpModel();
		$data=array();
		$data['cid']=cleanMe($a);
		$data['domain_id']=cleanMe($b);
		$data['objectType']=1;
		$data['set_object']=1;
		$data['set_domain']=1;
		$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
		$serviceTodoDetail    = $model1->serviceTodoDetail($data);
		$companyDetail    = $model1->companyDetail($data);
		require_once('UserCompanySignUpProfessionalServiceCategoryTodoView.php');
		}
		
		public static function pricingList($a=null,$b=null,$c=null,$d=null)
		{
			$path = "../../../../../../../";
			 	$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['catg_id']=cleanMe($b);
				$data['subcatg_id']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
				$pricingList    = $model1->pricingList($data);
				$selectedProfessionalSubCategoryDetailInfo    = $model1->selectedProfessionalSubCategoryDetailInfo($data);
				if(empty($pricingList))
				{
					header('location:../../../../pricingDetail/'.$data['cid'].'/'.$data['catg_id'].'/'.$data['subcatg_id'].'/'.$data['domain_id']); die;
				}
				require_once('UserCompanySignUpProfessionalServicePriceListView.php');
			
		}
		
		public static function pricingDetail($a=null,$b=null,$c=null,$d=null)
		{
			$path = "../../../../../../../";
			 	$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['catg_id']=cleanMe($b);
				$data['subcatg_id']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
				$selectedProfessionalCategoryDetail    = $model1->selectedProfessionalCategoryServicesDetail($data);
				$companyDetail    = $model1->companyDetail($data);
				$workingHrs    = $model1->workingHrs();
				$dayDetail    = $model1->dayDetail();
				$selectedProfessionalSubCategoryDetailInfo    = $model1->selectedProfessionalSubCategoryDetailInfo($data);
				$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo($data);
				$selectedProfessionalCategoryAvailableLocation=$model1->selectedProfessionalCategoryAvailableLocation($data);
				 
				$bookableServiceCategories    = $model1->bookableServiceCategories($data);
				require_once('UserCompanySignUpProfessionalSelectedCategoryServicePricingView.php');
			
		}
		
		
		public static function addPriceDetail($a=null,$b=null,$c=null,$d=null)
		{
			$path = "../../../../../../";
			 	$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['catg_id']=cleanMe($b);
				$data['subcatg_id']=cleanMe($c);
				$data['domain_id']=cleanMe($d);
				$addPriceDetail = $model1->addPriceDetail($data);	
				header("location:../../../../selectSubCategory/".$data['cid']."/".$data['catg_id']."/".$data['domain_id']);
		}
		
		public static function selectSubCategory($a=null,$b=null,$c=null)
		{
			$path = "../../../../../../";
			 	$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['catg_id']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
				$selectedProfessionalCategoryDetail    = $model1->selectedProfessionalCategoryServicesDetail($data);
				$companyDetail    = $model1->companyDetail($data);
				require_once('UserCompanySignUpProfessionalSelectedCategoryServiceListView.php');
			
		}
		public static function listSelectedCategories($a=null,$b=null)
		{
			$path = "../../../../../";
			 	$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['domain_id']=cleanMe($b);
				$selectedProfessionalCategoryDetail    = $model1->selectedProfessionalCategoryDetail($data);
				if(count($selectedProfessionalCategoryDetail)==1)
				{
					header('location:../../selectSubCategory/'.$data['cid'].'/'.$selectedProfessionalCategoryDetail[0]['enc'].'/'.$data['domain_id']); die;
				}
				$companyDetail    = $model1->companyDetail($data);
				require_once('UserCompanySignUpProfessionalSelectedCategoryListView.php');
			
		}
		
		
		
		
		public static function updateCategoryServiceAllTodos($a=null,$b=null,$c=null)
		{
			 	$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
				$result    = $model1->updateCategoryServiceAllTodos($data);
				$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
		
		public static function updateCategoryServiceTodo($a=null,$b=null,$c=null)
		{
				$model1       = new UserCompanySignUpModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['objectType']=cleanMe($b);
				$data['domain_id']=cleanMe($c);
				$result    = $model1->updateCategoryServiceTodo($data);
				//$result    = $model1->serviceTodoDetail($data);
				echo $result; die;
			
		}
		 
		
		
		
		public static function checkCid()
		{
		$model1       = new UserCompanySignUpModel();
		$result    = $model1->checkCid();
		echo $result; die;
		}

}
?>