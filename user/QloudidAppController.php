<?php
include 'safeqloudAppModel.php';
require_once '../configs/utility.php';

class safeqloudAppController
{		

		public static function getServiceInvoiceDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new safeqloudAppModel();
				$getServiceInvoiceDetail    = $model1->getServiceInvoiceDetail($data);
				$dataOut=json_encode($getServiceInvoiceDetail,true);
				echo  $dataOut;
				die;  
				   
		}
		public static function updateServiceInvoicePaymentDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new safeqloudAppModel();
				$updateServiceInvoicePaymentDetail    = $model1->updateServiceInvoicePaymentDetail($data);
				echo  $updateServiceInvoicePaymentDetail;
				die;  
		}
		public static function addProfessionalCompanyService()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new safeqloudAppModel();
				$addProfessionalCompanyService    = $model1->addProfessionalCompanyService($data);
				echo  $addProfessionalCompanyService;
				die;  
		}
		public static function updateLanguageAvailable()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateLanguageAvailable    = $model1->updateLanguageAvailable($data);
				echo  $updateLanguageAvailable;
				die;  
		}
		
		public static function suportedLanguagesList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$suportedLanguagesList    = $model1->suportedLanguagesList($data);
				$dataOut=json_encode($suportedLanguagesList,true);
				echo  $dataOut;
				die;  
		}
		
		public static function updateArea()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateArea    = $model1->updateArea($data);
				echo  $updateArea;
				die;  
		}
		
		public static function selectedAreaDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$selectedAreaDetail    = $model1->selectedAreaDetail($data);
				$dataOut=json_encode($selectedAreaDetail,true);
				echo  $dataOut;
				die;  
		}
		public static function companyMarketplaceList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$companyMarketplaceList    = $model1->companyMarketplaceList($data);
				$dataOut=json_encode($companyMarketplaceList,true);
				echo  $dataOut;
				die;  
		}

		public static function companyMarketplaceProfessionalCategoryDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$companyMarketplaceProfessionalCategoryDetail    = $model1->companyMarketplaceProfessionalCategoryDetail($data);
				$dataOut=json_encode($companyMarketplaceProfessionalCategoryDetail,true);
				echo  $dataOut;
				die;  
		}
		
		public static function companyMarketplaceServiceDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$companyMarketplaceServiceDetail    = $model1->companyMarketplaceServiceDetail($data);
				$dataOut=json_encode($companyMarketplaceServiceDetail,true);
				echo  $dataOut;
				die;  
		}
		
		public static function companyMarketplacePricingDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$companyMarketplacePricingDetail    = $model1->companyMarketplacePricingDetail($data);
				$dataOut=json_encode($companyMarketplacePricingDetail,true);
				echo  $dataOut;
				die;  
		}
		
		public static function professionalTodoUpdate()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$professionalTodoUpdate    = $model1->professionalTodoUpdate($data);
				echo  $professionalTodoUpdate;
				die;  
		}
		
		public static function updateCategoryServiceTodo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateCategoryServiceTodo    = $model1->updateCategoryServiceTodo($data);
				echo  $updateCategoryServiceTodo;
				die;  
		}
		
		
		public static function companyInformation()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$companyInformation    = $model1->companyInformation($data);
				$dataOut=json_encode($companyInformation,true);
				echo  $dataOut;
				die;    
		} 
			

		public static function getProfessionalServiceCompanies()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$getProfessionalServiceCompanies    = $model1->getProfessionalServiceCompanies($data);
				$dataOut=json_encode($getProfessionalServiceCompanies,true);
				echo  $dataOut;
				die;    
		} 
		public static function sendVerificationCode()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			require_once('../configs/smsMandril.php');
				$sendVerificationCode    = $model1->sendVerificationCode($data);
				echo  $sendVerificationCode;
				die;    
		} 
		
		
		public static function updateOwnerCheckinInfo()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$updateOwnerCheckinInfo    = $model1->checkinAparmentOwner($data);
				echo  $updateOwnerCheckinInfo;
				die;    
		} 
		
		public static function getProfessionalBookableServices()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$getProfessionalBookingServices    = $model1->getProfessionalBookingServices($data);
				$dataOut=json_encode($getProfessionalBookingServices,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function companyDetail()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$companyDetail    = $model1->companyDetail($data);
				$dataOut=json_encode($companyDetail,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function dstrictsSelectedServiceInfo()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictsSelectedServiceInfo    = $model1->dstrictsSelectedServiceInfo($data);
				$dataOut=json_encode($dstrictsSelectedServiceInfo,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function cleaningExtraInclusion()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$cleaningExtraInclusion    = $model1->cleaningExtraInclusion($data);
				$dataOut=json_encode($cleaningExtraInclusion,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function homeRepairProblemCategoryDetail()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$homeRepairProblemCategoryDetail    = $model1->homeRepairProblemCategoryDetail($data);
				$dataOut=json_encode($homeRepairProblemCategoryDetail,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function homeRepairProblemSubCategoryDetail()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$homeRepairProblemSubCategoryDetail    = $model1->homeRepairProblemSubCategoryDetail($data);
				$dataOut=json_encode($homeRepairProblemSubCategoryDetail,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function selectedHomeProblemSubpartId()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$selectedHomeProblemSubpartId    = $model1->selectedHomeProblemSubpartId($data);
				$dataOut=json_encode($selectedHomeProblemSubpartId,true);
				echo  $dataOut;
				die;    
		} 
		public static function getSubcategoryIssue()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$getSubcategoryIssue    = $model1->getSubcategoryIssue($data);
				 
				echo  $getSubcategoryIssue;
				die;    
		} 
		public static function selectedCategoryProblemsInfo()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$selectedCategoryProblemsInfo    = $model1->selectedCategoryProblemsInfo($data);
				$dataOut=json_encode($selectedCategoryProblemsInfo,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function addProfessionalServiceHomeCleaningRequest()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$addProfessionalServiceHomeCleaningRequest    = $model1->addProfessionalServiceHomeCleaningRequest($data);
				echo  $addProfessionalServiceHomeCleaningRequest;
				die;    
		} 
		
		public static function addProfessionalHomeRepairRequest()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$addProfessionalHomeRepairRequest    = $model1->addProfessionalHomeRepairRequest($data);
				echo  $addProfessionalHomeRepairRequest;
				die;    
		} 
		
		public static function commonTicketRequest()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$commonTicketRequest    = $model1->commonTicketRequest($data);
				echo  $commonTicketRequest;
				die;    
		} 
		
		public static function addProfessionalServiceRequest()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$addProfessionalServiceRequest    = $model1->addProfessionalServiceRequest($data);
				echo  $addProfessionalServiceRequest;
				die;    
		} 
		
		public static function addProfessionalServiceWindowCleaningRequest()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$addProfessionalServiceWindowCleaningRequest    = $model1->addProfessionalServiceWindowCleaningRequest($data);
				echo  $addProfessionalServiceWindowCleaningRequest;
				die;    
		}
		
		public static function getProfessionalBookingFilteredServices()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$getProfessionalBookingFilteredServices    = $model1->getProfessionalBookingFilteredServices($data);
				$dataOut=json_encode($getProfessionalBookingFilteredServices,true);
				echo  $dataOut;
				die;    
		} 
		
		
		public static function bookingProfessionalSubCategoryList()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$bookingProfessionalSubCategoryList    = $model1->bookingProfessionalSubCategoryList($data);
				$dataOut=json_encode($bookingProfessionalSubCategoryList,true);
				echo  $dataOut;
				die;    
		} 
		public static function bookingServicesProfessionalCategoryList()
		{
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
				$bookingServicesProfessionalCategoryList    = $model1->bookingServicesProfessionalCategoryList($data);
				$dataOut=json_encode($bookingServicesProfessionalCategoryList,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function professionalSelectedDomainDetail()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$professionalSelectedDomainDetail    = $model1->professionalSelectedDomainDetail($data);
				$dataOut=json_encode($professionalSelectedDomainDetail,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function bookingServicesLocationList()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$bookingServicesLocationList    = $model1->bookingServicesLocationList($data);
				$dataOut=json_encode($bookingServicesLocationList,true);
				echo  $dataOut;
				die;    
		} 
		public static function dstrictResturantTableAvailable()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictResturantTableAvailable    = $model1->dstrictResturantTableAvailable($data);
				$dataOut=json_encode($dstrictResturantTableAvailable,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function dstrictRequestTableBooking()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictRequestTableBooking    = $model1->dstrictRequestTableBooking($data);
				$dataOut=json_encode($dstrictRequestTableBooking,true);
				echo  $dataOut;
				die;    
		} 

		
		public static function dstrictRequestBookTable()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictRequestBookTable    = $model1->dstrictRequestBookTable($data);
				$dataOut=json_encode($dstrictRequestBookTable,true);
				echo  $dataOut;
				die;    
		} 
		
		public static function dstrictResturantWorkInfo()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictResturantWorkInfo    = $model1->resturantWorkInfo($data);
				$dataOut=json_encode($dstrictResturantWorkInfo,true);
				echo  $dataOut;
				die;    
		} 
		public static function dstrictDinningHallList()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictDinningHallList    = $model1->resturantDiningHall($data);
				$dataOut=json_encode($dstrictDinningHallList,true);
				echo  $dataOut;
				die;    
		} 
		public static function dstrictListNearByResturant()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictListNearByResturant    = $model1->dstrictListNearByResturant($data);
				$dataOut=json_encode($dstrictListNearByResturant,true);
				echo  $dataOut;
				die;    
		}
		
		public static function dstrictFilterNearByResturant()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictFilterNearByResturant    = $model1->dstrictFilterNearByResturant($data);
				$dataOut=json_encode($dstrictFilterNearByResturant,true);
				echo  $dataOut;
				die;    
		}
		
		
		public static function dstrictProfessionalSubCategoryDetailAreaBased()
		{
				$model1       = new safeqloudAppModel();
				$dstrictProfessionalSubCategoryDetailAreaBased    = $model1->dstrictProfessionalSubCategoryDetailAreaBased();
				$dataOut=json_encode($dstrictProfessionalSubCategoryDetailAreaBased,true);
				echo  $dataOut;
				die;  
		}
		
		public static function dstrictProfessionalNonbookableRequest()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictProfessionalNonbookableRequest    = $model1->dstrictProfessionalNonbookableRequest($data);
				echo  $dstrictProfessionalNonbookableRequest;
				die;  
		}
		
		public static function dstrictProfessionalServiceRequestList()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictProfessionalServiceRequestList    = $model1->dstrictProfessionalServiceRequestList($data);
				$dataOut=json_encode($dstrictProfessionalServiceRequestList,true);
				echo  $dataOut;
				die;    
		}
		public static function dstrictProfessionalBookableRequest()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictProfessionalBookableRequest    = $model1->dstrictProfessionalBookableRequest($data);
				echo  $dstrictProfessionalBookableRequest;
				die;  
		}
		public static function dstrictBookingPrivateCalenderInfo()
		{
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictProfessionalCompanyList    = $model1->dstrictBookingPrivateCalenderInfo($data);
				$dataOut=json_encode($dstrictProfessionalCompanyList,true);
				echo  $dataOut;
				die;  
		}
		
		public static function dstrictBookingOpenCalenderInfo()
		{
			 
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
				$dstrictBookingOpenCalenderInfo    = $model1->dstrictBookingOpenCalenderInfo($data);
				$dataOut=json_encode($dstrictBookingOpenCalenderInfo,true);
				echo  $dataOut;
				die;  
		}
		
		
		 public static function dstrictProfessionalCompanyList()
		{
				$model1       = new safeqloudAppModel();
				$dstrictProfessionalCompanyList    = $model1->dstrictProfessionalCompanyList();
				$dataOut=json_encode($dstrictProfessionalCompanyList,true);
				echo  $dataOut;
				die;  
		}
		public static function dstrictProfessionalCompanyServiceList()
		{
				$model1       = new safeqloudAppModel();
				$dstrictProfessionalCompanyServiceList    = $model1->dstrictProfessionalCompanyServiceList();
				$dataOut=json_encode($dstrictProfessionalCompanyServiceList,true);
				echo  $dataOut;
				die;  
		}
		
		public static function dstrictProfessionalCompanyEmployeeList()
		{
				$model1       = new safeqloudAppModel();
				$dstrictProfessionalCompanyEmployeeList    = $model1->dstrictProfessionalCompanyEmployeeList();
				$dataOut=json_encode($dstrictProfessionalCompanyEmployeeList,true);
				echo  $dataOut;
				die;  
		}
		public static function dstrictProfessionalCategoryDetailAreaBased()
		{
				$model1       = new safeqloudAppModel();
				$dstrictProfessionalCategoryDetailAreaBased    = $model1->dstrictProfessionalCategoryDetailAreaBased();
				$dataOut=json_encode($dstrictProfessionalCategoryDetailAreaBased,true);
				echo  $dataOut;
				die;  
		}
		
		public static function selectedProfessionalCategoryDetailInfo()
		{
				$model1       = new safeqloudAppModel();
				$selectedProfessionalCategoryDetailInfo    = $model1->selectedProfessionalCategoryDetailInfo();
				$dataOut=json_encode($selectedProfessionalCategoryDetailInfo,true);
				echo  $dataOut;
				die;  
		}
		public static function selectedProfessionalSubCategoryDetailInfo()
		{
				$model1       = new safeqloudAppModel();
				$selectedProfessionalSubCategoryDetailInfo    = $model1->selectedProfessionalSubCategoryDetailInfo();
				$dataOut=json_encode($selectedProfessionalSubCategoryDetailInfo,true);
				echo  $dataOut;
				die;  
		}
		public static function jobReviewDetail()
		{
				$model1       = new safeqloudAppModel();
				$jobReviewDetail    = $model1->jobReviewDetail();
				$dataOut=json_encode($jobReviewDetail,true);
				echo  $dataOut;
				die;  
		}
		public static function getTicketSubTitleIssueInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$getTicketSubTitleIssueInfo    = $model1->getTicketSubTitleIssueInfo($data);
				$dataOut=json_encode($getTicketSubTitleIssueInfo,true);
				echo  $dataOut;
				die;  
		}
		public static function updateProfessionalJobStatus()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$updateProfessionalJobStatus    = $model1->updateProfessionalJobStatus($data);
				echo  $updateProfessionalJobStatus;
				die;  
		}
		public static function propertyDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$propertyDetail    = $model1->propertyDetail($data);
				$dataOut=json_encode($propertyDetail,true);
				echo  $dataOut;
				die;  
		}
		public static function employeeProfessionalServiceProposalsDates()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$employeeProfessionalServiceProposalsDates    = $model1->employeeProfessionalServiceProposalsDates($data);
				$dataOut=json_encode($employeeProfessionalServiceProposalsDates,true);
				echo  $dataOut;
				die;  
		}
		public static function employeeProfessionalServiceProposals()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$employeeProfessionalServiceProposals    = $model1->employeeProfessionalServiceProposals($data);
				$dataOut=json_encode($employeeProfessionalServiceProposals,true);
				echo  $dataOut;
				die;  
		}
		public static function sendRequest()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$sendRequest    = $model1->sendRequest($data);
				echo  $sendRequest;
				die;  
		}
		public static function addLandloard()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$addLandloard    = $model1->addLandloard($data);
				echo  $addLandloard;
				die;  
		}
		public static function userProperty()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userProperty    = $model1->userProperty($data);
				$dataOut=json_encode($userProperty,true);
				echo  $dataOut;
				die;  
		}
		public static function companyListSearch()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$companyListSearch    = $model1->companyListSearch($data);
				$dataOut=json_encode($companyListSearch,true);
				echo  $dataOut;
				die;  
		}
		public static function updateTicketCategoryAmenities()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateTicketCategoryAmenities    = $model1->updateTicketCategoryAmenities($data);
				echo  $updateTicketCategoryAmenities;
				die;  
		}

		public static function updateTicketSubcategory()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateTicketSubcategory    = $model1->updateTicketSubcategory($data);
				echo  $updateTicketSubcategory;
				die;  
		}
		public static function updateAminitySubcategory()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateAminitySubcategory    = $model1->updateAminitySubcategory($data);
				echo  $updateAminitySubcategory;
				die;  
		}
		public static function categoryInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$categoryInfo    = $model1->categoryInfo($data);
				$dataOut=json_encode($categoryInfo,true);
				echo  $dataOut;
				die;  
		}
		public static function amenitiesSubcategoryDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$amenitiesSubcategoryDetail    = $model1->amenitiesSubcategoryDetail($data);
				$dataOut=json_encode($amenitiesSubcategoryDetail,true);
				echo  $dataOut;
				die;  
		}
		public static function requestedContactDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$requestedContactDetail    = $model1->requestedContactDetail($data);
				$dataOut=json_encode($requestedContactDetail,true);
				echo  $dataOut;
				die;  
		}
		public static function approveConnectApartmentRequest()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$approveConnectApartmentRequest    = $model1->approveConnectApartmentRequest($data);
				echo  $approveConnectApartmentRequest;
				die;  
		}
		public static function rejectConnectApartmentRequest()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$rejectConnectApartmentRequest    = $model1->rejectConnectApartmentRequest($data);
				echo  $rejectConnectApartmentRequest;
				die;  
		}
		public static function apartmentConnectRequestReceived()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$apartmentConnectRequestReceived    = $model1->apartmentConnectRequestReceived($data);
				$dataOut=json_encode($apartmentConnectRequestReceived,true);
				echo  $dataOut;
				die;  
		}
		
		public static function apartmentConnectRequestRejected()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$apartmentConnectRequestRejected    = $model1->apartmentConnectRequestRejected($data);
				$dataOut=json_encode($apartmentConnectRequestRejected,true);
				echo  $dataOut;
				die;  
		}
		public static function getAvailableApartment()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$getAvailableApartment    = $model1->getAvailableApartment($data);
				$dataOut=json_encode($getAvailableApartment,true);
				echo  $dataOut;
				die;  
		}
		
		
		public static function checkValidEmails()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$checkValidEmails    = $model1->checkValidEmails($data);
				$dataOut=json_encode($checkValidEmails,true);
				echo  $dataOut;
				die;  
		}
		
		
		public static function addNewContactInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addNewContactInfo    = $model1->addNewContactInfo($data);
				echo  $addNewContactInfo;
				die;  
		}
		
		public static function checkValidPhoneNumbers()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$checkValidPhoneNumbers    = $model1->checkValidPhoneNumbers($data);
				$dataOut=json_encode($checkValidPhoneNumbers,true);
				echo  $dataOut;
				die;   
		}
		public static function createUserApartmentTicket()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$createUserApartmentTicket    = $model1->createUserApartmentTicket($data);
				echo  $createUserApartmentTicket;
				die;  
		}
		public static function addUserApartmentTicketImage()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addUserApartmentTicketImage    = $model1->addUserApartmentTicketImage($data);
				echo  $addUserApartmentTicketImage;
				die;  
		}
		
		public static function userApartmentTicketList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userApartmentTicketList    = $model1->userApartmentTicketList($data);
				$dataOut=json_encode($userApartmentTicketList,true);
				echo  $dataOut;
				die;  
		}
		
		public static function bookingUserApartmentTicketList()
		{
		   
				$data=array();
				$data=$_POST;
				$model1       = new safeqloudAppModel();
				$userApartmentTicketList    = $model1->userApartmentTicketList($data);
				$dataOut=json_encode($userApartmentTicketList,true);
				echo  $dataOut;
				die;  
		}
		
		
		public static function homeRepairCompaniesList()
		{
		   
				$data=array();
				$data=$_POST;
				$model1       = new safeqloudAppModel();
				$homeRepairCompaniesList    = $model1->homeRepairCompaniesList($data);
				$dataOut=json_encode($homeRepairCompaniesList,true);
				echo  $dataOut;
				die;  
		}
		public static function userApartmentProblemDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userApartmentProblemDetail    = $model1->userApartmentProblemDetail($data);
				$dataOut=json_encode($userApartmentProblemDetail,true);
				echo  $dataOut;
				die;  
		}
		
		public static function bookingUserApartmentProblemDetail()
		{
		   
				$data=array();
				$data=$_POST;
				$model1       = new safeqloudAppModel();
				$userApartmentProblemDetail    = $model1->userApartmentProblemDetail($data);
				$dataOut=json_encode($userApartmentProblemDetail,true);
				echo  $dataOut;
				die;  
		}
		
		public static function bookingUserApartmentSubProblemDetail()
		{
		   
				$data=array();
				$data=$_POST;
				$model1       = new safeqloudAppModel();
				$userApartmentSubpartProblemDetail    = $model1->userApartmentSubpartProblemDetail($data);
				$dataOut=json_encode($userApartmentSubpartProblemDetail,true);
				echo  $dataOut;
				die;  
		}
		
		
		
		
		public static function userApartmentSubpartProblemDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userApartmentSubpartProblemDetail    = $model1->userApartmentSubpartProblemDetail($data);
				$dataOut=json_encode($userApartmentSubpartProblemDetail,true);
				echo  $dataOut;
				die;  
		}
		
		
		
		public static function userApartmentProblemDetailOld()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userApartmentProblemDetail    = $model1->userApartmentProblemDetail($data);
				$dataOut=json_encode($userApartmentProblemDetail,true);
				echo  $dataOut;
				die;  
		}
		public static function identificatorCountDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$identificatorCountDetail    = $model1->identificatorCountDetail($data);
				$dataOut=json_encode($identificatorCountDetail,true);
				echo  $dataOut;
				die;  
		}
		
		public static function identificatorList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$identificatorList    = $model1->identificatorList($data);
				$dataOut=json_encode($identificatorList,true);
				echo  $dataOut;
				die;  
		}
		
		
		public static function apartmentCheckedOutCleeningHistory()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$apartmentCheckedOutCleeningHistory    = $model1->apartmentCheckedOutCleeningHistory($data);
				$dataOut=json_encode($apartmentCheckedOutCleeningHistory,true);
				echo  $dataOut;
				die;  
		}
	 

		public static function userAddressBookContactDetails()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userAddressBookContactDetails    = $model1->userAddressBookContactDetails($data);
				$dataOut=json_encode($userAddressBookContactDetails,true);
				echo  $dataOut;
				die;  
		}
	
		public static function userAddessBookContactDetailinfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				 
				if($data['is_user']==0)
				{
					$userAddessBookContactDetailinfo    = $model1->userAddessBookContactDetailinfo($data);
				}
				else
				{
					$userAddessBookContactDetailinfo    = $model1->userPersonalAddessBookContactDetailinfo($data);
				}
				
				$dataOut=json_encode($userAddessBookContactDetailinfo,true);
				echo  $dataOut;
				die;  
		}
		public static function displayKeyPhotos()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$displayKeyPhotos    = $model1->displayKeyPhotos($data);
				$dataOut=json_encode($displayKeyPhotos,true);
				echo  $dataOut;
				die;  
		}
		public static function addApartmentKeyPhotos()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addApartmentKeyPhotos    = $model1->addApartmentKeyPhotos($data);
				echo  $addApartmentKeyPhotos;
				die;  
		}
		public static function updateApartmentKeyInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateApartmentKeyInfo    = $model1->updateApartmentKeyInfo($data);
				echo  $updateApartmentKeyInfo;
				die;  
		}
		public static function resendPrecheckinInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$resendPrecheckinInfo    = $model1->resendPrecheckinInfo($data);
				echo  $resendPrecheckinInfo;
					die;
		}
		public static function reservationHistoryList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$reservationHistoryList    = $model1->reservationHistoryList($data);
				$dataOut=json_encode($reservationHistoryList,true);
					echo  $dataOut;
					die;
		}
		
		public static function cleaningJobStatusInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$cleaningJobStatusInfo    = $model1->cleaningJobStatusInfo($data);
				$dataOut=json_encode($cleaningJobStatusInfo,true);
					echo  $dataOut;
					die;
		}
		
		public static function updateCleaningFinalStatus()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateCleaningFinalStatus    = $model1->updateCleaningFinalStatus($data);
				echo  $updateCleaningFinalStatus;
					die;
		}
		public static function startCleaningJob()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$startCleaningJob    = $model1->startCleaningJob($data);
				echo  $startCleaningJob;
					die;
		}
		public static function updateCleaningJobDone()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateCleaningJobDone    = $model1->updateCleaningJobDone($data);
				echo  $updateCleaningJobDone;
					die;
		}
		public static function teamLeaderCleaningJobs()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$teamLeaderCleaningJobs    = $model1->teamLeaderCleaningJobs($data);
				$dataOut=json_encode($teamLeaderCleaningJobs,true);
					echo  $dataOut;
					die;
		}
		
		public static function cleaningServiceAvailableTodoDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$cleaningServiceAvailableTodoDetail    = $model1->cleaningServiceAvailableTodoDetail($data);
				$dataOut=json_encode($cleaningServiceAvailableTodoDetail,true);
					echo  $dataOut;
					die;
		}
		
		public static function cleanersAssignedList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$cleanersAssignedList    = $model1->cleanersAssignedList($data);
				$dataOut=json_encode($cleanersAssignedList,true);
					echo  $dataOut;
					die;
		}
		public static function updateDamagedRentableInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new safeqloudAppModel();
				$updateDamagedRentableInfo    = $model1->updateDamagedRentableInfo($data);
				echo  $updateDamagedRentableInfo;
					die; 
		}
		public static function retriveUserDeliveryAddressesDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$retriveUserDeliveryAddressesDetail    = $model1->retriveUserDeliveryAddressesDetail($data);
				$dataOut=json_encode($retriveUserDeliveryAddressesDetail,true);
					echo  $dataOut;
					die;
		}
		public static function checkoutApartmentGuest()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new safeqloudAppModel();
				$checkoutApartmentGuest    = $model1->checkoutApartmentGuest($data);
				echo  $checkoutApartmentGuest;
					die; 
		}
		public static function apartmentCheckedinInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$apartmentCheckedinInfo    = $model1->apartmentCheckedinInfo($data);
				$dataOut=json_encode($apartmentCheckedinInfo,true);
					echo  $dataOut;
					die;
		}
		
		public static function apartmentCheckedOutInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$apartmentCheckedOutInfo    = $model1->apartmentCheckedOutInfo($data);
				$dataOut=json_encode($apartmentCheckedOutInfo,true);
					echo  $dataOut;
					die;
		}
		public static function updateOwnerInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new safeqloudAppModel();
				$updateOwnerInfo    = $model1->updateOwnerInfo($data);
				echo  $updateOwnerInfo;
					die; 
		}
		public static function updatePropertyStart()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updatePropertyStart    = $model1->updatePropertyStart($data);
				echo  $updatePropertyStart;
					die; 
		}
		public static function apartmentPrecheckinRequiredList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$apartmentPrecheckinRequiredList    = $model1->apartmentPrecheckinRequiredList($data);
				$dataOut=json_encode($apartmentPrecheckinRequiredList,true);
					echo  $dataOut;
					die;
		}
		public static function userIdentificationCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userIdentificationCount    = $model1->userIdentificationCount($data);
				echo  $userIdentificationCount;
					die; 
		}
		
		public static function userCardsCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userCardsCount    = $model1->userCardsCount($data);
				echo  $userCardsCount;
					die; 
		}
		
		


		public static function sendBookingToNewUser()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$sendBookingToNewUser    = $model1->sendBookingToNewUser($data);
				echo  $sendBookingToNewUser;
					die; 
		}
		public static function updateUserPersonalAddress()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$updateUserPersonalAddress    = $model1->updateUserPersonalAddress($data);
				echo  $updateUserPersonalAddress;
					die; 
		}
		
		public static function saveCompanyDetails()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$model1       = new safeqloudAppModel();
				$saveCompanyDetails    = $model1->saveCompanyDetails($data);
				echo  $saveCompanyDetails;
					die; 
		}
		
		public static function sendBookingInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../lib/url_shortener.php');
				$model1       = new safeqloudAppModel();
				$saveCompanyDetails    = $model1->sendBookingInfo($data);
				echo  $saveCompanyDetails;
					die; 
		}
		
		public static function createUser()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$createUser    = $model1->createUser($data);
				$dataOut=json_encode($createUser,true);
					echo  $dataOut;
					die;
		}
		
		
		public static function checkPhoneInfo()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$checkPhoneInfo    = $model1->checkPhoneInfo($data);
				echo  $checkPhoneInfo;
					die; 
		}
		
		
		public static function checkEmailInfo()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$checkEmailInfo    = $model1->checkEmailInfo($data);
				echo  $checkEmailInfo;
					die; 
		}
		
		
		
		public static function apartmentBookingList()
			{
			   
					$data=array();
					$data=json_decode(file_get_contents('php://input'), true);
					$model1       = new safeqloudAppModel();
					$apartmentBookingList    = $model1->apartmentBookingList($data);
					$dataOut=json_encode($apartmentBookingList,true);
					echo  $dataOut;
					die;
			}
			public static function verifyUserUsingPhoneDetail()
			{
			   
					$data=array();
					$data=json_decode(file_get_contents('php://input'), true);
					$model1       = new safeqloudAppModel();
					$verifyUserUsingPhoneDetail    = $model1->verifyUserUsingPhoneDetail($data);
					$dataOut=json_encode($verifyUserUsingPhoneDetail,true);
					echo  $dataOut;
					die;
			}
			public static function checkAvailablityDates()
			{
			   
					$data=array();
					$data=json_decode(file_get_contents('php://input'), true);
					$model1       = new safeqloudAppModel();
					$checkAvailablityDates    = $model1->checkAvailablityDates($data);
					echo  $checkAvailablityDates;
					die; 
				
			   
			}
			public static function sendBookingRequestInfo()
			{
			   
					$data=array();
					$data=json_decode(file_get_contents('php://input'), true);
					$model1       = new safeqloudAppModel();
					require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
					$sendBookingRequestInfo    = $model1->sendBookingRequestInfo($data);
					
							echo  $sendBookingRequestInfo;
							die; 
				
			   
			}
		public static function confirmApartmentReservation()
			{
			   
					$data=array();
					$data=json_decode(file_get_contents('php://input'), true);
					$model1       = new safeqloudAppModel();
					require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
					$confirmApartmentReservation    = $model1->confirmApartmentReservation($data);
					
							echo  $confirmApartmentReservation;
							die; 
				
			   
			}
		public static function apartmentReservationHistoryList()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$apartmentReservationHistoryList    = $model1->apartmentReservationHistoryList($data);
				$dataOut=json_encode($apartmentReservationHistoryList,true);
					echo  $dataOut;
					die; 
		}
		public static function apartmentReservationConfermationRequiredList()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$apartmentReservationConfermationRequiredList    = $model1->apartmentReservationConfermationRequiredList($data);
				$dataOut=json_encode($apartmentReservationConfermationRequiredList,true);
					echo  $dataOut;
					die; 
		}
		public static function publishApartmentonChannel()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$publishApartmentonChannel    = $model1->publishApartmentonChannel($data);
				echo  $publishApartmentonChannel;
				die;  
		}
		
		public static function updateGetStartedPhotos()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateGetStartedPhotos    = $model1->updateGetStartedPhotos($data);
				echo  $updateGetStartedPhotos;
				die;  
		}
		public static function displayGetStartedPhotos()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$displayGetStartedPhotos    = $model1->displayGetStartedPhotos($data);
				$dataOut=json_encode($displayGetStartedPhotos,true);
					echo  $dataOut;
					die; 
		}
		public static function getBlockedDates()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$getBlockedDates    = $model1->getBlockedDates($data);
				$dataOut=json_encode($getBlockedDates,true);
					echo  $dataOut;
					die; 
		}
		public static function updateSelectedBlocked()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateSelectedBlocked    = $model1->updateSelectedBlocked($data);
				echo  $updateSelectedBlocked;
				die;  
		}
		public static function updateSelectedAvailable()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateSelectedAvailable    = $model1->updateSelectedAvailable($data);
				echo  $updateSelectedAvailable;
				die; 
		}
		public static function updateGetStartedDescription()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateGetStartedDescription    = $model1->updateGetStartedDescription($data);
				echo  $updateGetStartedDescription;
				die;  
		}
		public static function getsratedDetail()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$getsratedDetail    = $model1->getsratedDetail($data);
				$dataOut=json_encode($getsratedDetail,true);
					echo  $dataOut;
					die; 
		}
		public static function updateNickname()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateNickname    = $model1->updateNickname($data);
				echo  $updateNickname;
				die;  
		}
		public static function updateChannelPublish()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateChannelPublish    = $model1->updateChannelPublish($data);
				echo  $updateChannelPublish;
				die;  
		}
		public static function updateRent()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateRent    = $model1->updateRent($data);
				echo  $updateRent;
				die;  
		}
		public static function updatePublishRentLong()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updatePublishRentLong    = $model1->updatePublishRentLong($data);
				echo  $updatePublishRentLong;
				die;  
		}
		
		public static function changeListing()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$changeListing    = $model1->changeListing($data);
				echo  $changeListing;
				die;  
		}
		public static function changeDescription()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$changeDescription    = $model1->changeDescription($data);
				echo  $changeDescription;
				die;  
		}
		public static function updateSale()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateSale    = $model1->updateSale($data);
				echo  $updateSale;
				die;  
		}
		public static function updateAir()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateAir    = $model1->updateAir($data);
				echo  $updateAir;
				die;  
		}
		public static function updateBookingChannel()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateBookingChannel    = $model1->updateBookingChannel($data);
				echo  $updateBookingChannel;
				die;  
		}
		public static function updateExpedia()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateExpedia    = $model1->updateExpedia($data);
				echo  $updateExpedia;
				die;  
		}
		public static function updateVrbo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateVrbo    = $model1->updateVrbo($data);
				echo  $updateVrbo;
				die;  
		}
		public static function updateTrip()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateTrip    = $model1->updateTrip($data);
				echo  $updateTrip;
				die;  
		}
		public static function updateTui()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateTui    = $model1->updateTui($data);
				echo  $updateTui;
				die;  
		}
		public static function getUserAppsDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$getUserAppsDetail    = $model1->getUserAppsDetail($data);
				$dataOut=json_encode($getUserAppsDetail,true);
				echo  $dataOut;
				die;  
		}
		public static function addCurrency()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addCurrency    = $model1->addCurrency($data);
				echo  $addCurrency;
				die;  
		}
		public static function addPricingPeriod()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addPricingPeriod    = $model1->addPricingPeriod($data);
				$dataOut=json_encode($addPricingPeriod,true);
				echo  $dataOut;
				die;  
		}
		public static function listPricing()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$listPricing    = $model1->listPricing($data);
				$dataOut=json_encode($listPricing,true);
				echo  $dataOut;
				die;  
		}
		public static function removePricingGap()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$removePricingGap    = $model1->removePricingGap($data);
				echo  $removePricingGap;
				die;  
		}
		public static function timeInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$timeInfo    = $model1->timeInfo($data);
				$dataOut=json_encode($timeInfo,true);
				echo  $dataOut;
				die;  
		}
		
		public static function timeHouserulesInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$timeHouserulesInfo    = $model1->timeHouserulesInfo($data);
				$dataOut=json_encode($timeHouserulesInfo,true);
				echo  $dataOut;
				die;  
		}
		public static function updateAvailable()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateAvailable    = $model1->updateAvailable($data);
				echo  $updateAvailable;
				die;  
		}
		
		public static function updateBlocked()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateBlocked    = $model1->updateBlocked($data);
				echo  $updateBlocked;
				die;  
		}
	
		public static function propertyType()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$propertyType    = $model1->propertyType($data);
				$dataOut=json_encode($propertyType,true);
				echo  $dataOut;
				die;  
		}
		
		public static function floorsInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$floorsInfo    = $model1->floorsInfo($data);
				$dataOut=json_encode($floorsInfo,true);
				echo  $dataOut;
				die;  
		}

		public static function updatePropertyComposition()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updatePropertyComposition    = $model1->updatePropertyComposition($data);
				echo  $updatePropertyComposition;
				die;  
		}

		public static function generatePricing()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$generatePricing    = $model1->generatePricing($data);
				echo  $generatePricing;
				die;  
		}
		
		public static function addPricing()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addPricing    = $model1->addPricing($data);
				echo  $addPricing;
				die;  
		}
		
		public static function deletePricing()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$deletePricing    = $model1->deletePricing($data);
				echo  $deletePricing;
				die;  
		}
		
		public static function updatePricing()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updatePricing    = $model1->updatePricing($data);
				echo  $updatePricing;
				die;  
		}
		
		public static function pricingDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$pricingDetail    = $model1->pricingDetail($data);
				$dataOut=json_encode($pricingDetail,true);
				echo  $dataOut;
				die;  
		}
		public static function updateApartmentHouseRules()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateApartmentHouseRules    = $model1->updateApartmentHouseRules($data);
				echo  $updateApartmentHouseRules;
				die;  
		}
		public static function updateArrival()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateArrival    = $model1->updateArrival($data);
				echo  $updateArrival;
				die;  
		}
		
		public static function updateCleening()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateCleening    = $model1->updateCleening($data);
				echo  $updateCleening;
				die;  
		}
		
		
		public static function updateTouristTax()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateTouristTax    = $model1->updateTouristTax($data);
				echo  $updateTouristTax;
				die;  
		}
		
		public static function updateSecurity()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateSecurity    = $model1->updateSecurity($data);
				echo  $updateSecurity;
				die;  
		}
		
		public static function updateBooking()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateBooking    = $model1->updateBooking($data);
				echo  $updateBooking;
				die;  
		}

		public static function displayPhotos()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$displayPhotos    = $model1->displayPhotos($data);
				$dataOut=json_encode($displayPhotos,true);
				echo  $dataOut;
				die;  
		}
		public static function addApartmentPhotos()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addApartmentPhotos    = $model1->addApartmentPhotos($data);
				echo  $addApartmentPhotos;
				die;  
		}
		public static function updateDescription()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateDescription    = $model1->updateDescription($data);
				echo  $updateDescription;
				die;  
		}
		
		
		
		public static function deleteApartmentPhoto()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$deleteApartmentPhoto    = $model1->deleteApartmentPhoto($data);
				echo  $deleteApartmentPhoto;
				die;  
		}
		
		public static function updateHeading()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateHeading    = $model1->updateHeading($data);
				echo  $updateHeading;
				die;  
		}
		
		public static function updateOtherRoomInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateOtherRoomInfo    = $model1->updateOtherRoomInfo($data);
				echo  $updateOtherRoomInfo;
				die;  
		}
		
		
		public static function reviewUserAddress()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$reviewUserAddress    = $model1->reviewUserAddress($data);
				echo  $reviewUserAddress;
				die;  
		}
		
		
		public static function updateApartmentWifi()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateApartmentWifi    = $model1->updateApartmentWifi($data);
				echo  $updateApartmentWifi;
				die;  
		}
		
		public static function OtherRoomInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$OtherRoomInfo    = $model1->OtherRoomInfo($data);
				$dataOut=json_encode($OtherRoomInfo,true);
				echo  $dataOut;
				die;  
		}
		
		
		public static function travelAppAvailableSos()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$travelAppAvailableSos    = $model1->travelAppAvailableSos($data);
				$dataOut=json_encode($travelAppAvailableSos,true);
				echo  $dataOut;
				die;  
		}
		
		public static function travelAppCompany()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$travelAppCompany    = $model1->travelAppCompany($data);
				$dataOut=json_encode($travelAppCompany,true);
				echo  $dataOut;
				die;  
		}
		
		
		public static function kinsList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$kinsList    = $model1->kinsList($data);
				$dataOut=json_encode($kinsList,true);
				echo  $dataOut;
				die;  
		}
		public static function missingPersonList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$missingPersonList    = $model1->missingPersonList($data);
				$dataOut=json_encode($missingPersonList,true);
				echo  $dataOut;
				die;  
		}
		
		public static function missingPersonEmergencyList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$missingPersonEmergencyList    = $model1->missingPersonEmergencyList($data);
				$dataOut=json_encode($missingPersonEmergencyList,true);
				echo  $dataOut;
				die;  
		}
		
		public static function reportPersonFound()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$reportPersonFound    = $model1->reportPersonFound($data);
				echo  $reportPersonFound;
				die;  
		}
		
		
		public static function addMissingPersonInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addMissingPersonInfo    = $model1->addMissingPersonInfo($data);
				echo  $addMissingPersonInfo;
				die;  
		}
		
		public static function updateNotificationRequirement()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateNotificationRequirement    = $model1->updateNotificationRequirement($data);
				echo  $updateNotificationRequirement;
				die;  
		}
		
		public static function addMissingPersonImages()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addMissingPersonImages    = $model1->addMissingPersonImages($data);
				echo  $addMissingPersonImages;
				die;  
		}
		
		
		public static function travelAppCompanyLocations()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$travelAppCompanyLocations    = $model1->travelAppCompanyLocations($data);
				$dataOut=json_encode($travelAppCompanyLocations,true);
				echo  $dataOut;
				die;  
		}
		public static function approveTenantRequest()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$approveTenantRequest    = $model1->approveTenantRequest($data);
				echo  $approveTenantRequest;
				die;  
		}
		public static function rejectTenantRequest()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$rejectTenantRequest    = $model1->rejectTenantRequest($data);
				echo  $rejectTenantRequest;
				die;  
		}
		public static function receivedRequestDetailTenants()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$receivedRequestDetailTenants    = $model1->receivedRequestDetailTenants($data);
				$dataOut=json_encode($receivedRequestDetailTenants,true);
				echo  $dataOut;
				die;  
		}
		public static function apartmentBuildingParkings()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$apartmentBuildingParkings    = $model1->apartmentBuildingParkings($data);
				$dataOut=json_encode($apartmentBuildingParkings,true);
				echo  $dataOut;
				die;  
		}
		public static function buildingParkingAvailable()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$buildingParkingAvailable    = $model1->buildingParkingAvailable($data);
				echo  $buildingParkingAvailable;
				die; 
		}
		public static function apartmentBuildingAmenities()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$apartmentBuildingAmenities    = $model1->apartmentBuildingAmenities($data);
				$dataOut=json_encode($apartmentBuildingAmenities,true);
				echo  $dataOut;
				die; 
		}
		public static function buildingSelectedParkingInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$buildingSelectedParkingInfo    = $model1->buildingSelectedParkingInfo($data);
				$dataOut=json_encode($buildingSelectedParkingInfo,true);
				echo  $dataOut;
				die; 
		}
		
		public static function buildingSelectedAmenitiesInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$buildingSelectedAmenitiesInfo    = $model1->buildingSelectedAmenitiesInfo($data);
				$dataOut=json_encode($buildingSelectedAmenitiesInfo,true);
				echo  $dataOut;
				die; 
		}
		
		public static function apartmentCommunityParkings()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$apartmentCommunityParkings    = $model1->apartmentCommunityParkings($data);
				$dataOut=json_encode($apartmentCommunityParkings,true);
					echo  $dataOut;
					die; 
		}
	
		public static function currentCountryDetail()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$currentCountryDetail    = $model1->currentCountryDetail($data);
				$dataOut=json_encode($currentCountryDetail,true);
					echo  $dataOut;
					die; 
		}
		
		public static function communitySelectedAmenitiesInfo()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$communitySelectedAmenitiesInfo    = $model1->communitySelectedAmenitiesInfo($data);
				$dataOut=json_encode($communitySelectedAmenitiesInfo,true);
					echo  $dataOut;
					die; 
		}
		
		public static function communitySelectedAmenitiesRulesInfo()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$communitySelectedAmenitiesRulesInfo    = $model1->communitySelectedAmenitiesRulesInfo($data);
				$dataOut=json_encode($communitySelectedAmenitiesRulesInfo,true);
					echo  $dataOut;
					die; 
		}
		
		
		
		public static function verifyOtpDetail()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$verifyOtpDetail    = $model1->verifyOtpDetail($data);
				 
					echo  $verifyOtpDetail;
					die; 
		}
		
		public static function userCountrySummary()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$userCountrySummary    = $model1->userCountrySummary($data);
				echo  $userCountrySummary;
					die; 
		}
		
		public static function checkMobileNumber()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 require_once('../configs/smsMandril.php');
				$model1       = new safeqloudAppModel();
				$checkMobileNumber    = $model1->checkMobileNumber($data);
				 
					echo  $checkMobileNumber;
					die; 
		}
		
		public static function updateCountry()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$updateCountry    = $model1->updateCountry($data);
				echo  $updateCountry;
					die; 
		}
	
		public static function addVisitingCountry()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$addVisitingCountry    = $model1->addVisitingCountry($data);
				echo  $addVisitingCountry;
					die; 
		}
		
		public static function checkPassportInfo()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$checkPassportInfo    = $model1->checkPassportInfo($data);
				echo  $checkPassportInfo;
					die; 
		}
		
		public static function addVisitingCountryIdentificatorImages()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$addVisitingCountryIdentificatorImages    = $model1->addVisitingCountryIdentificatorImages($data);
				echo  $addVisitingCountryIdentificatorImages;
					die; 
		}
	
		public static function societyRulesList()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$societyRulesList    = $model1->societyRulesList($data);
				$dataOut=json_encode($societyRulesList,true);
					echo  $dataOut;
					die; 
		}
		
		public static function tenantInvoiceInfo()
		{
		   
				$data=array();
				
				$data=json_decode(file_get_contents('php://input'), true);
			 
				$model1       = new safeqloudAppModel();
				$tenantInvoiceInfo    = $model1->tenantInvoiceInfo($data);
				$dataOut=json_encode($tenantInvoiceInfo,true);
					echo  $dataOut;
					die; 
		}
		
		public static function checkinAparmentOwner()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$checkinAparmentOwner    = $model1->checkinAparmentOwner($data);
				echo  $checkinAparmentOwner;
				die; 
		}
		
		public static function payRentInvoice()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$payRentInvoice    = $model1->payRentInvoice($data);
				echo  $payRentInvoice;
				die; 
		}
		
		public static function listUserDeliveryAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$listAddresses    = $model1->listUserDeliveryAddresses($data);
				$dataOut=json_encode($listAddresses,true);
					echo  $dataOut;
					die; 
		}
		
		public static function updateAccessibility()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				if($data['update_type']==1)
				{
				$result    = $model1->updatePrivate($data);	
				}
				else if($data['update_type']==2)
				{
				$result    = $model1->updateEnsuit($data);	
				}
				else if($data['update_type']==3)
				{
				$result    = $model1->updateWheelchair($data);	
				}
				echo  $result;
					die; 
				 
			
		   
		}
		
		
		public static function updateBathroom()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				if($data['update_type']==1)
				{
				$result    = $model1->updateToilet($data);	
				}
				else if($data['update_type']==2)
				{
				$result    = $model1->updateBath($data);	
				}
				else if($data['update_type']==3)
				{
				$result    = $model1->updateShower($data);	
				}
				echo  $result;
					die; 
		}
		
		
		public static function updateOverbath()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$result    = $model1->updateOverbath($data);	
				echo  $result;
				die; 
		}
		
		
		public static function bedroomDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$bedroomCount    = $model1->bedroomCount($data);
				$bedroomDetail    = $model1->bedroomDetail($data);
				$dataOut=json_encode($bedroomDetail,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function bathroomDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$bathroomCount    = $model1->bathroomCount($data);
				$bathroomDetail    = $model1->bathroomDetail($data);
				$dataOut=json_encode($bathroomDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function addBathroom()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addBathroom    = $model1->addBathroom($data);
				echo  $addBathroom;
					die; 
				 
			
		   
		}
		
		
		public static function deleteBathroom()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$deleteBathroom    = $model1->deleteBathroom($data);
				echo  $deleteBathroom;
					die; 
				 
			
		   
		}
		
		public static function bedroomBedDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$bedroomBedDetail    = $model1->bedroomBedDetail($data);
				$dataOut=json_encode($bedroomBedDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function bedTypeDetail()
		{
				$model1       = new safeqloudAppModel();
				$bedTypeDetail    = $model1->bedTypeDetail();
				$dataOut=json_encode($bedTypeDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
		public static function addBedroom()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				 
				$model = new safeqloudAppModel();
				$addBedroom=$model->addBedroom($data);
				echo  $addBedroom;
				die;
				
		}
	
		public static function deleteBedroom()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$deleteBedroom=$model->deleteBedroom($data);
				echo  $deleteBedroom;
				die;
				
		}
		
		public static function deleteBedroomBedInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$deleteBedroomBedInfo=$model->deleteBedroomBedInfo($data);
				echo  $deleteBedroomBedInfo;
				die;
				
		}
		
		
		public static function updateBedTypeInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$updateBedTypeInfo=$model->updateBedTypeInfo($data);
				echo  $updateBedTypeInfo;
				die;
				
		}
		
		
		public static function addBedToBedroom()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$addBedToBedroom=$model->addBedToBedroom($data);
				echo  $addBedToBedroom;
				die;
				
		}
	
		public static function communityAvailableTenantsInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$communityAvailableTenantsInfo=$model->communityAvailableTenantsInfo($data);
				$dataOut=json_encode($communityAvailableTenantsInfo,true);
				echo  $dataOut;
				die;
				
		}
		
		
		public static function apartmentCommunityAmenities()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$apartmentCommunityAmenities=$model->apartmentCommunityAmenities($data);
				$dataOut=json_encode($apartmentCommunityAmenities,true);
				echo  $dataOut;
				die;
				
		}
		
		
		public static function getCommunityDetailInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$getCommunityDetailInfo=$model->getCommunityDetailInfo($data);
				$dataOut=json_encode($getCommunityDetailInfo,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function updateApartmentCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$updateApartmentCommunityTicket=$model->updateApartmentCommunityTicket($data);
				echo  $updateApartmentCommunityTicket;
				die; 
				
		}
		public static function acceptApartmentCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$acceptApartmentCommunityTicket=$model->acceptApartmentCommunityTicket($data);
				echo  $acceptApartmentCommunityTicket;
				die; 
				
		}
		
		public static function finishApartmentCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$finishApartmentCommunityTicket=$model->finishApartmentCommunityTicket($data);
				echo  $finishApartmentCommunityTicket;
				die; 
				
		}
		
		public static function rejectApartmentCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$rejectApartmentCommunityTicket=$model->rejectApartmentCommunityTicket($data);
				echo  $rejectApartmentCommunityTicket;
				die; 
				
		}
		
		
		public static function apartmentCommunityTicketCreatedCount()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$apartmentCommunityTicketCreatedCount=$model->apartmentCommunityTicketCreatedCount($data);
				$dataOut=json_encode($apartmentCommunityTicketCreatedCount,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityTicketList()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$apartmentCommunityTicketList=$model->apartmentCommunityTicketList($data);
				$dataOut=json_encode($apartmentCommunityTicketList,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityPendingTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$apartmentCommunityPendingTicket=$model->apartmentCommunityPendingTicket($data);
				$dataOut=json_encode($apartmentCommunityPendingTicket,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityStartedTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$apartmentCommunityStartedTicket=$model->apartmentCommunityStartedTicket($data);
				$dataOut=json_encode($apartmentCommunityStartedTicket,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityCompletedTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$apartmentCommunityCompletedTicket=$model->apartmentCommunityCompletedTicket($data);
				$dataOut=json_encode($apartmentCommunityCompletedTicket,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityCancelledTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$apartmentCommunityCancelledTicket=$model->apartmentCommunityCancelledTicket($data);
				$dataOut=json_encode($apartmentCommunityCancelledTicket,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function apartmentCommunityTicketDetail()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$apartmentCommunityTicketDetail=$model->apartmentCommunityTicketDetail($data);
				$dataOut=json_encode($apartmentCommunityTicketDetail,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function getCommunityInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$getCommunityInfo=$model->getCommunityInfo($data);
				echo  $getCommunityInfo;
				die; 
				
		}
		
		
		public static function addCommunityTicketImage()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$addCommunityTicketImage=$model->addCommunityTicketImage($data);
				echo  $addCommunityTicketImage;
				die; 
				
		}
		
		
		public static function createCommunityTicket()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$createCommunityTicket=$model->createCommunityTicket($data);
				echo  $createCommunityTicket;
				die; 
				
		}
		
		public static function getTicketTitleInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$getTicketTitleInfo=$model->getTicketTitleInfo($data);
				$dataOut=json_encode($getTicketTitleInfo,true);
				echo  $dataOut;
				die;
				
		}
		
		
		public static function getTicketSubTitleInfo()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$getTicketSubTitleInfo=$model->getTicketSubTitleInfo($data);
				$dataOut=json_encode($getTicketSubTitleInfo,true);
				echo  $dataOut;
				die;
				
		}
		
		public static function getTicketBookingSubTitleInfo()
		{
			
				$data=array();
				$data=$_POST;
				$model = new safeqloudAppModel();
				$getTicketSubTitleInfo=$model->getTicketSubTitleInfo($data);
				$dataOut=json_encode($getTicketSubTitleInfo,true);
				echo  $dataOut;
				die;
				
		} 
		
		
		public static function selectedProblemSubpartId()
		{
			
				$data=array();
				$data=$_POST;
				$model = new safeqloudAppModel();
				$getTicketSubTitleInfo=$model->selectedProblemSubpartId($data);
				$dataOut=json_encode($getTicketSubTitleInfo,true);
				echo  $dataOut;
				die;
				
		} 
		
		
		public static function travelEmergencyList()
		{
			
				$data=array();
				$data=$_POST;
				$model = new safeqloudAppModel();
				$emergencyDetail=$model->emergencyDetail($data);
				$dataOut=json_encode($emergencyDetail,true);
				echo  $dataOut;
				die;
				
		} 
		
		
		public static function travelAlarmList()
		{
			
				$data=array();
				$data=$_POST;
				$model = new safeqloudAppModel();
				$travelAlarmList=$model->addedAlamrs($data);
				$dataOut=json_encode($travelAlarmList,true);
				echo  $dataOut;
				die;
				
		} 
		
		public static function travelcompanyListDstricts()
		{
			
				$data=array();
				$data=$_POST;
				$model = new safeqloudAppModel();
				$travelAlarmList=$model->travelAppCompanyDstricts($data);
				$dataOut=json_encode($travelAlarmList,true);
				echo  $dataOut;
				die;
				
		} 
		
	 public static function getTicketBookingSubTitleIssueInfo()
		{
			
				$data=array();
				$data=$_POST;
				$model = new safeqloudAppModel();
				$getTicketSubTitleInfo=$model->getTicketSubTitleIssueInfo($data);
				$dataOut=json_encode($getTicketSubTitleInfo,true);
				echo  $dataOut;
				die;
				
		} 
		
		public static function createBookingUserApartmentTicket()
		{
			
				$data=array();
				$data=$_POST;
				$model = new safeqloudAppModel();
				$createBookingUserApartmentTicket=$model->createBookingUserApartmentTicket($data);
				 
				echo  $createBookingUserApartmentTicket;
				die;
				
		} 
	
		public static function getPreCheckinStatus()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$getPreCheckinStatus=$model->getPreCheckinStatus($data);
				$dataOut=json_encode($getPreCheckinStatus,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function updatePreCheckinStatus()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$updatePreCheckinStatus=$model->updatePreCheckinStatus($data);
				$dataOut=json_encode($updatePreCheckinStatus,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function apartmentDetailInfoDstrictApp()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$apartmentDetailInfoDstrictApp    = $model1->apartmentDetailInfoDstrictApp($data);
				$dataOut=json_encode($apartmentDetailInfoDstrictApp,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function apartmentDetailInfoCheckin()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$apartmentDetailInfoCheckin    = $model1->apartmentDetailInfoCheckin($data);
				$dataOut=json_encode($apartmentDetailInfoCheckin,true);
				echo  $dataOut;
				die; 
		}
		
		public static function getUserActiveStatus()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$getUserActiveStatus    = $model1->getUserActiveStatus($data);
				$dataOut=json_encode($getUserActiveStatus,true);
				echo  $dataOut;
				die; 
		}
		public static function getUserStatus()
		{
				$model = new safeqloudAppModel();
				$getUserStatus=$model->getUserStatus();
				echo $getUserStatus;	die;
		}
		
		public static function getUserStatusCompanyRequirement()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				$model = new safeqloudAppModel();
				$getUserStatus=$model->getUserStatusCompanyRequirement($data);
				echo $getUserStatus;	die;
		}
		
		
		public static function inviteVisitor()
		{
			
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php');
				$model = new safeqloudAppModel();
				$inviteVisitor=$model->inviteVisitor($data);
				echo $inviteVisitor;
				
		}
		public static function invitedVisitorsMeetingList()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$invitedVisitorsMeetingList    = $model1->invitedVisitorsMeetingList($data);
				$dataOut=json_encode($invitedVisitorsMeetingList,true);
				echo  $dataOut;
				die; 
		}
		
		public static function checkedInMeetingList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$checkedInMeetingList 	 = $model1->checkedInMeetingList($data);
				$dataOut=json_encode($checkedInMeetingList,true);
				echo  $dataOut;
				die; 
		}
		
		public static function informEmployee()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				require_once('../lib/url_shortener.php'); 
				$model1       = new safeqloudAppModel();
				$informEmployee    = $model1->informEmployee($data);
				echo  $informEmployee;
				die; 
		}
		
		public static function wellnessCartBookingTimeUpdate()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$wellnessCartBookingTimeUpdate    = $model1->wellnessCartBookingTimeUpdate($data);
				$dataOut=json_encode($wellnessCartBookingTimeUpdate,true);
				echo  $dataOut;
				die; 
		}
		
		public static function hotelBookingListForFrontDeskCheckin()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$hotelBookingListForFrontDeskCheckin    = $model1->hotelBookingListForFrontDeskCheckin($data);
				$dataOut=json_encode($hotelBookingListForFrontDeskCheckin,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function allocateCheckedOutRoomForCleaning()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$allocateCheckedOutRoomForCleaning    = $model1->allocateCheckedOutRoomForCleaning($data);
				echo  $allocateCheckedOutRoomForCleaning;
				die; 
		}
		
		
		public static function hotelCheckedOutListForHousekeepingIncepectionStaff()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$hotelCheckedOutListForHousekeepingIncepectionStaff    = $model1->hotelCheckedOutListForHousekeepingIncepectionStaff($data);
				$dataOut=json_encode($hotelCheckedOutListForHousekeepingIncepectionStaff,true);
					echo  $dataOut;
					die; 
		}
		
		
		public static function allocateCheckedOutRoomForInspection()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$allocateCheckedOutRoomForInspection    = $model1->allocateCheckedOutRoomForInspection($data);
				echo  $allocateCheckedOutRoomForInspection;
				die; 
		}
		
		public static function updateCheckedOutRoomInspection()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				require_once('../configs/testMandril.php');
				$updateCheckedOutRoomInspection    = $model1->updateCheckedOutRoomInspection($data);
				echo  $updateCheckedOutRoomInspection;
				die; 
		}
		
		public static function updateCheckedOutRoomCleaning()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$updateCheckedOutRoomCleaning    = $model1->updateCheckedOutRoomCleaning($data);
				echo  $updateCheckedOutRoomCleaning;
				die; 
			   
		}
		
		public static function hotelCheckedOutListForCleningStaff()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$hotelCheckedOutListForCleningStaff    = $model1->hotelCheckedOutListForCleningStaff($data);
				$dataOut=json_encode($hotelCheckedOutListForCleningStaff,true);
				echo  $dataOut;
				die; 
		}
		
		
		
		public static function handoverKey()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				require_once('../configs/testMandril.php'); 
				$model1       = new safeqloudAppModel();
				$handoverKey    = $model1->handoverKey($data);
				echo  $handoverKey;
				die; 
				 
			
		   
		}
		
		
		public static function checkOutGuest()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				require_once('../configs/testMandril.php'); 
				$model1       = new safeqloudAppModel();
				$checkOutGuest    = $model1->checkOutGuest($data);
				echo  $checkOutGuest;
				die; 
		}
		
		public static function allocateRoomForCleaning()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$allocateRoomForCleaning    = $model1->allocateRoomForCleaning($data);
				echo  $allocateRoomForCleaning;
				die; 
		
		}
		
		
		public static function updateRoomCleaning()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				require_once('../configs/testMandril.php');
				$updateRoomCleaning    = $model1->updateRoomCleaning($data);
				echo  $updateRoomCleaning;
				die; 
		}
		
		
		public static function hotelBookingListForFrontDeskCheckout()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$hotelBookingListForFrontDeskCheckout    = $model1->hotelBookingListForFrontDeskCheckout($data);
				$dataOut=json_encode($hotelBookingListForFrontDeskCheckout,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function hotelBookingListForCleningStaff()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$hotelBookingListForCleningStaff    = $model1->hotelBookingListForCleningStaff($data);
				$dataOut=json_encode($hotelBookingListForCleningStaff,true);
				echo  $dataOut;
				die; 
		}
		
		public static function hotelBookingListForFrontDeskKeyhandling()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$hotelBookingListForFrontDeskKeyhandling    = $model1->hotelBookingListForFrontDeskKeyhandling($data);
				$dataOut=json_encode($hotelBookingListForFrontDeskKeyhandling,true);
				echo  $dataOut;
				die; 
		}
		
		public static function hotelBookingListForFrontDeskReceivedKey()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$hotelBookingListForFrontDeskReceivedKey    = $model1->hotelBookingListForFrontDeskReceivedKey($data);
				$dataOut=json_encode($hotelBookingListForFrontDeskReceivedKey,true);
				echo  $dataOut;
				die; 
		}
		
		public static function hotelBookingListForKeyGeneration()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$hotelBookingListForKeyGeneration    = $model1->hotelBookingListForKeyGeneration($data);
				$dataOut=json_encode($hotelBookingListForKeyGeneration,true);
				echo  $dataOut;
				die; 
		}
		
		
		public static function hotelBookingInstaBoxListForKeyGeneration()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$hotelBookingInstaBoxListForKeyGeneration    = $model1->hotelBookingInstaBoxListForKeyGeneration($data);
				$dataOut=json_encode($hotelBookingInstaBoxListForKeyGeneration,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
	 
		
	public static function checkEmployeeReference($co = null)
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$checkEmployeeReference    = $model1->checkEmployeeReference($data);
            echo  $checkEmployeeReference;
			die; 
			 
        
       
    }
	
	public static function verifEmployeeInfo($co = null)
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);  
			$model1       = new safeqloudAppModel();
			$verifEmployeeInfo    = $model1->verifEmployeeInfo($data);
             
				echo  $verifEmployeeInfo;
				die; 
			 
        
       
    }
	
	public static function releaseHotelInstabox($co = null)
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);  
			$model1       = new safeqloudAppModel();
			$releaseHotelInstabox    = $model1->releaseHotelInstabox($data);
             
				echo  $releaseHotelInstabox;
				die; 
			 
        
       
    }
	
	public static function generateKeyForInstaBox($co = null)
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);  
			$model1       = new safeqloudAppModel();
			$generateKeyForInstaBox    = $model1->generateKeyForInstaBox($data);
             
				echo  $generateKeyForInstaBox;
				die; 
			 
        
       
    }
		
		public static function dependentsCheckedInList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$dependentsCheckedInList    = $model1->dependentsCheckedInList($data);
				$dataOut=json_encode($dependentsCheckedInList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function addDependentChekin()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$addDependentChekin    = $model1->addDependentChekin($data);
				echo  $addDependentChekin;
					die; 
				 
			
		   
		}
		
		public static function verifyDependentChekin()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$verifyDependentChekin    = $model1->verifyDependentChekin($data);
				echo  $verifyDependentChekin;
					die; 
				 
			
		   
		}
		
		
		public static function guestChildrenRemainingCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$guestChildrenRemainingCount    = $model1->guestChildrenRemainingCount($data);
				echo  $guestChildrenRemainingCount;
					die; 
				 
			
		   
		}
		
		public static function emailIinviteAdultForCheckin()
		{
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$emailIinviteAdultForCheckin    = $model1->emailIinviteAdultForCheckin($data);
				echo  $emailIinviteAdultForCheckin;
				die; 
				 
			
		   
		}
		
		public static function phoneIinviteAdultForCheckin()
		{
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$phoneIinviteAdultForCheckin    = $model1->phoneIinviteAdultForCheckin($data);
				echo  $phoneIinviteAdultForCheckin;
				die; 
				 
			
		   
		}
		
		
		public static function resendPhoneIinviteAdultForCheckin()
		{
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$resendPhoneIinviteAdultForCheckin    = $model1->resendPhoneIinviteAdultForCheckin($data);
				echo  $resendPhoneIinviteAdultForCheckin;
				die; 
				 
			
		   
		}
		
		public static function verifyUserInvitationInfo()
		{
				 
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$verifyUserInvitationInfo    = $model1->verifyUserInvitationInfo($data);
				echo  $verifyUserInvitationInfo;
				die; 
				   
		}
		
		public static function confirmUserInvitationInfo()
		{
				 
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$confirmUserInvitationInfo    = $model1->confirmUserInvitationInfo($data);
				echo  $confirmUserInvitationInfo;
				die; 
				   
		}
		
		
		public static function resendInvitation()
		{
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$resendInvitation    = $model1->resendInvitation($data);
				echo  $resendInvitation;
				die; 
				   
		}
		
		public static function adultsCheckedInList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true); 
 			
				$model1       = new safeqloudAppModel();
				$adultsCheckedInList    = $model1->adultsCheckedInList($data);
				$dataOut=json_encode($adultsCheckedInList,true);
				echo  $dataOut;
				die; 
				   
		}
		
		public static function countryCode()
		{
		   
				$model1       = new safeqloudAppModel();
				$countryCode    = $model1->countryCode();
				$dataOut=json_encode($countryCode,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function updateGuestRecord()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$updateGuestRecord    = $model1->updateGuestRecord($data);
				echo  $updateGuestRecord;
				die; 
				 
			
		   
		}
		
		
		public static function userDetailsDstricts()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$userDetailsDstricts    = $model1->userDetailsDstricts($data);
				$dataOut=json_encode($userDetailsDstricts,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function venueInfomationDetail()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$venueInfomationDetail    = $model1->venueInfomationDetail($data);
				$dataOut=json_encode($venueInfomationDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function wellnessSearchFollowingCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$wellnessSearchFollowingCount    = $model1->wellnessSearchFollowingCount($data);
				 
					echo  $wellnessSearchFollowingCount;
					die; 
				 
			
		   
		}
		
		
		public static function deleteWellnessAllCartItems()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$deleteWellnessAllCartItems    = $model1->deleteWellnessAllCartItems($data);
				 
					echo  $deleteWellnessAllCartItems;
					die; 
				 
			
		   
		}
		
		
		public static function countWellnessOneToOneAvailableServices()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$countWellnessOneToOneAvailableServices    = $model1->countWellnessOneToOneAvailableServices($data);
				 
					echo  $countWellnessOneToOneAvailableServices;
					die; 
				 
			
		   
		}
		
		
		public static function selectedWellnessCategoriesandMenu()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$selectedWellnessCategoriesandMenu    = $model1->selectedWellnessCategoriesandMenu($data);
				$dataOut=json_encode($selectedWellnessCategoriesandMenu,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function wellnessUpdateFollowing()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$wellnessUpdateFollowing    = $model1->wellnessUpdateFollowing($data);
				 
					echo  $wellnessUpdateFollowing;
					die; 
				 
			
		   
		}
		
		public static function wellnessSearchList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$wellnessSearchList    = $model1->wellnessSearchList($data);
				$dataOut=json_encode($wellnessSearchList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		public static function resturantPackageComboList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$resturantPackageComboList    = $model1->resturantPackageComboList($data);
				$dataOut=json_encode($resturantPackageComboList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function resturantPackageCategoryList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$resturantPackageCategoryList    = $model1->resturantPackageCategoryList($data);
				$dataOut=json_encode($resturantPackageCategoryList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function resturantPackageCategoryDishesList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$resturantPackageCategoryDishesList    = $model1->resturantPackageCategoryDishesList($data);
				$dataOut=json_encode($resturantPackageCategoryDishesList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	public static function addPublicServiceToCartApp()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$addPublicServiceToCartApp    = $model1->addPublicServiceToCartApp($data);
				$dataOut=json_encode($addPublicServiceToCartApp,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	public static function wellnessSelectedServiceInfo()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new safeqloudAppModel();
				$wellnessSelectedServiceInfo    = $model1->wellnessSelectedServiceInfo($data);
				$dataOut=json_encode($wellnessSelectedServiceInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
	
	public static function deleteWellnessSharedItems()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$deleteWellnessSharedItems    = $model1->deleteWellnessSharedItems($data);
				$dataOut=json_encode($deleteWellnessSharedItems,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
	public static function WellnessPrivateCalenderInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$WellnessPrivateCalenderInfo    = $model1->WellnessPrivateCalenderInfo($data);
				$dataOut=json_encode($WellnessPrivateCalenderInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function wellnessOpenCalenderInfo()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$wellnessOpenCalenderInfo    = $model1->wellnessOpenCalenderInfo($data);
				$dataOut=json_encode($wellnessOpenCalenderInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	  public static function cartInfoWellnessListCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$cartInfoWellnessListCount    = $model1->cartInfoWellnessListCount($data);
				$dataOut=json_encode($cartInfoWellnessListCount,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	 public static function UpdateWellnessCartItem()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$UpdateWellnessCartItem    = $model1->UpdateWellnessCartItem($data);
				$dataOut=json_encode($UpdateWellnessCartItem,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
	 public static function cartInfoWellnessList()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$cartInfoWellnessList    = $model1->cartInfoWellnessList($data);
				$dataOut=json_encode($cartInfoWellnessList,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	
	 public static function addServiceToCartApp()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				 
				$model1       = new safeqloudAppModel();
				$addServiceToCartApp    = $model1->addServiceToCartApp($data);
				$dataOut=json_encode($addServiceToCartApp,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	public static function selectEmployeeForSelectedServices()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new safeqloudAppModel();
				$selectEmployeeForSelectedServices    = $model1->selectEmployeeForSelectedServices($data);
				$dataOut=json_encode($selectEmployeeForSelectedServices,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function availableDatesForbooking()
		{
			
				$data=array();
					$model1       = new safeqloudAppModel();
				$availableDatesForbooking    = $model1->availableDatesForbooking();
				$dataOut=json_encode($availableDatesForbooking,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	public static function employeeBookingCalenderInfoApp()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new safeqloudAppModel();
				$employeeBookingCalenderInfoApp    = $model1->employeeBookingCalenderInfoApp($data);
				$dataOut=json_encode($employeeBookingCalenderInfoApp,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	 public static function selectedWellnessCategories()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new safeqloudAppModel();
				$selectedWellnessCategories    = $model1->selectedWellnessCategories($data);
				$dataOut=json_encode($selectedWellnessCategories,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function selectedWellnessBookingAppMenu()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$selectedWellnessBookingAppMenu    = $model1->selectedWellnessBookingAppMenu($data);
				$dataOut=json_encode($selectedWellnessBookingAppMenu,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		
		public static function selectedWellnessCategoriesSelection()
		{
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				
				$model1       = new safeqloudAppModel();
				$selectedWellnessCategories    = $model1->selectedWellnessCategoriesSelection($data);
				$dataOut=json_encode($selectedWellnessCategories,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
	 
		
		 public static function wellnessServiceInfoCount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$wellnessServiceInfoCount    = $model1->wellnessServiceInfoCount($data);
				$dataOut=json_encode($wellnessServiceInfoCount,true);
					echo  $dataOut;
					die; 
		}
		
		 public static function selectedWellnessBookingAppMenuSelection()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);  
				$model1       = new safeqloudAppModel();
				$selectedWellnessBookingAppMenu    = $model1->selectedWellnessBookingAppMenuSelection($data);
				$dataOut=json_encode($selectedWellnessBookingAppMenu,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	
	public static function selectEmployee()
    {
			$model1       = new safeqloudAppModel();
			$selectEmployee    = $model1->selectEmployee();
		   echo  $selectEmployee;
					die;
	   
    }
	 
	 
	public static function updateBookingTimeInfo()
    {
			$model1       = new safeqloudAppModel();
			$updateBookingTimeInfo    = $model1->updateBookingTimeInfo();
		   echo  $updateBookingTimeInfo;
					die;
	   
    }
	
	public static function bookingCalenderInfo()
    {
			$model1       = new safeqloudAppModel();
			$bookingCalenderInfo    = $model1->bookingCalenderInfo();
		 echo  $bookingCalenderInfo;
					die;
			 
	   
    }
	public static function bookingOpenCalenderInfo()
    {
			$model1       = new safeqloudAppModel();
			$bookingCalenderInfo    = $model1->bookingOpenCalenderInfo();
		 echo  $bookingCalenderInfo;
					die;
			 
	   
    }
	
	public static function bookingPrivateCalenderInfo()
    {
			$model1       = new safeqloudAppModel();
			$bookingPrivateCalenderInfo    = $model1->bookingPrivateCalenderInfo();
		 echo  $bookingPrivateCalenderInfo;
					die;
			 
	   
    }
	 
	
	public static function availableServiceCategories()
    {
			$model1       = new safeqloudAppModel();
			$availableServiceCategories    = $model1->availableServiceCategories();
			$dataOut=json_encode($availableServiceCategories,true);
					echo  $dataOut;
					die;
	   
    }
	
	 public static function addServiceToCart()
		{
		   
				$data=array();
				  
				$model1       = new safeqloudAppModel();
				$addServiceToCart    = $model1->addServiceToCart();
				$dataOut=json_encode($addServiceToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		
		
		public static function addOpenOnetimeServiceToCart()
		{
		   
				$data=array();
				  
				$model1       = new safeqloudAppModel();
				$addOpenOnetimeServiceToCart    = $model1->addOpenOnetimeServiceToCart();
				$dataOut=json_encode($addOpenOnetimeServiceToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	
	public static function selectedServiceInfo()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$selectedServiceInfo    = $model1->selectedServiceInfo($data);
			 $dataOut=json_encode($selectedServiceInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function selectedServiceImages()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$selectedServiceImages    = $model1->selectedServiceImages($data);
			 $dataOut=json_encode($selectedServiceImages,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function getServiceCompanies()
    {
			$model1       = new safeqloudAppModel();
			$getServiceCompanies    = $model1->getServiceCompanies();
			$dataOut=json_encode($getServiceCompanies,true);
					echo  $dataOut;
					die;
	   
    }
	public static function getServiceLocations()
    {
			$model1       = new safeqloudAppModel();
			$getServiceLocations    = $model1->getServiceLocations();
			$dataOut=json_encode($getServiceLocations,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function getEmployeeLocations()
    {
			$model1       = new safeqloudAppModel();
			$getEmployeeLocations    = $model1->getEmployeeLocations();
			$dataOut=json_encode($getEmployeeLocations,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function bookServiceForCheckInUser()
    {
			$model1       = new safeqloudAppModel();
			$bookServiceForCheckInUser    = $model1->bookServiceForCheckInUser();
			$dataOut=json_encode($bookServiceForCheckInUser,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function bookServiceForPublicUser()
    {
			$model1       = new safeqloudAppModel();
			$bookServiceForPublicUser    = $model1->bookServiceForPublicUser();
			$dataOut=json_encode($bookServiceForPublicUser,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function getServices()
    {
			$model1       = new safeqloudAppModel();
			$getServices    = $model1->getServices();
			$dataOut=json_encode($getServices,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function getOneOnOneServices()
    {
			$model1       = new safeqloudAppModel();
			$getServices    = $model1->getOneOnOneServices();
			$dataOut=json_encode($getServices,true);
					echo  $dataOut;
					die;
	   
    }
	 public static function getLocationInfo()
    {
			$model1       = new safeqloudAppModel();
			$getLocationInfo    = $model1->getLocationInfo();
			$dataOut=json_encode($getLocationInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function updateDishStock()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updateDishStock    = $model1->updateDishStock($data);
			echo  $updateDishStock;
			die;
	   
    }
	
	public static function deleteDishItem()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$deleteDishItem    = $model1->deleteDishItem($data);
			echo  $deleteDishItem;
			die;
	   
    }
	public static function availableResturantList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$availableResturantList    = $model1->availableResturantList($data);
			$dataOut=json_encode($availableResturantList,true);
					echo  $dataOut;
					die;
	   
    } 
	public static function addGuestinfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$addGuestinfo    = $model1->addGuestinfo($data);
			echo  $addGuestinfo;
			die;
	   
    }
	
	public static function waitlistResturant()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$waitlistResturant    = $model1->waitlistResturant($data);
			$dataOut=json_encode($waitlistResturant,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function publishedResturantInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$publishedResturantInfo    = $model1->publishedResturantInfo($data);
			$dataOut=json_encode($publishedResturantInfo,true);
					echo  $dataOut;
					die;
	   
    } 
	
	
	public static function hotelBathroomAppAmenities()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$hotelBathroomAppAmenities    = $model1->hotelBathroomAppAmenities($data);
			$dataOut=json_encode($hotelBathroomAppAmenities,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function hotelMediaAppAmenities()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$hotelMediaAppAmenities    = $model1->hotelMediaAppAmenities($data);
			$dataOut=json_encode($hotelMediaAppAmenities,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function hotelRoomAppAmenities()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$hotelRoomAppAmenities    = $model1->hotelRoomAppAmenities($data);
			$dataOut=json_encode($hotelRoomAppAmenities,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function hotelBedAppAmenities()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$hotelBedAppAmenities    = $model1->hotelBedAppAmenities($data);
			$dataOut=json_encode($hotelBedAppAmenities,true);
					echo  $dataOut;
					die;
	   
    } 
	
	public static function selectedDish()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$selectedDish    = $model1->selectedDish($data);
			$dataOut=json_encode($selectedDish,true);
					echo  $dataOut;
					die;
	   
    }
	public static function foodTypeInformationSelected()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$selectedDish    = $model1->selectedDish($data);
			$data['warning']=$selectedDish['dish_warnings'];
			$foodTypeInformationSelected    = $model1->foodTypeInformationSelected($data);
			$dataOut=json_encode($foodTypeInformationSelected,true);
					echo  $dataOut;
					die;
	   
    }
	public static function editDishDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$editDishDetail    = $model1->editDishDetail($data);
			echo  $editDishDetail;
			die;
	   
    }
	public static function updateDishNotAvailable()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updateDishNotAvailable    = $model1->updateDishNotAvailable($data);
			echo  $updateDishNotAvailable;
			die;
	   
    }
	public static function ResturantMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$ResturantMenu    = $model1->ResturantMenu($data);
			$dataOut=json_encode($ResturantMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function resturantSearchList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$resturantSearchList    = $model1->resturantSearchList($data);
			$dataOut=json_encode($resturantSearchList,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function resturantProfileInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$resturantProfileInfo    = $model1->resturantProfileInfo($data);
			$dataOut=json_encode($resturantProfileInfo,true);
					echo  $dataOut;
					die;
	   
    }
	public static function companyList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$companyList    = $model1->companyList($data);
			$dataOut=json_encode($companyList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function usersList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$usersList    = $model1->usersList($data);
			$dataOut=json_encode($usersList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantWorkInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$resturantWorkInfo    = $model1->resturantWorkInfo($data);
			$dataOut=json_encode($resturantWorkInfo,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantServeInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$resturantServeInfo    = $model1->resturantServeInfo($data);
			$dataOut=json_encode($resturantServeInfo,true);
					echo  $dataOut;
					die;
	   
    }
	public static function ResturantServeBasedMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$ResturantServeBasedMenu    = $model1->ResturantServeBasedMenu($data);
			$dataOut=json_encode($ResturantServeBasedMenu,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$resturantDetail    = $model1->resturantDetail($data);
			$dataOut=json_encode($resturantDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function resturantAddedImages()
    {
			$data=array();
			$model1       = new safeqloudAppModel();
			$resturantAddedImages    = $model1->resturantAddedImages();
			$dataOut=json_encode($resturantAddedImages,true);
					echo  $dataOut;
					die;
	   
    }
	public static function reservationList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$reservationList    = $model1->reservationList($data);
			$dataOut=json_encode($reservationList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantTableAvailable()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$resturantTableAvailable    = $model1->resturantTableAvailable($data);
			$dataOut=json_encode($resturantTableAvailable,true);
					echo  $dataOut;
					die;
	   
    }
	public static function resturantDiningHall()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$resturantDiningHall    = $model1->resturantDiningHall($data);
			$dataOut=json_encode($resturantDiningHall,true);
					echo  $dataOut;
					die;
	   
    }
	public static function requestTableBooking()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$requestTableBooking    = $model1->requestTableBooking($data);
			 
					echo  $requestTableBooking;
					die;
	   
    }
	public static function updateNoShow()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$updateNoShow    = $model1->updateNoShow($data);
			 
					echo  $updateNoShow;
					die;
	   
    }
	public static function updateInServicing()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$updateInServicing    = $model1->updateInServicing($data);
			 
					echo  $updateInServicing;
					die;
	   
    }
	public static function updateCloseService()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$updateCloseService    = $model1->updateCloseService($data);
			 
					echo  $updateCloseService;
					die;
	   
    }
	public static function operatorQueueWaitingCount()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$operatorQueueWaitingCount    = $model1->operatorQueueWaitingCount($data);
			echo  $operatorQueueWaitingCount;
			die;
	   
    }
	public static function alertGuest()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php'); 
			$model1       = new safeqloudAppModel();
			$alertGuest    = $model1->alertGuest($data);
			 
					echo  $alertGuest;
					die;
	   
    }
	public static function queueGuestDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$queueGuestDetail    = $model1->queueGuestDetail($data);
			$dataOut=json_encode($queueGuestDetail,true);
					echo  $dataOut;
					die;
	   
    }
	public static function queueServicingGuestDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$queueServicingGuestDetail    = $model1->queueServicingGuestDetail($data);
			$dataOut=json_encode($queueServicingGuestDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function operatorQueueWaitingList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$operatorQueueWaitingList    = $model1->operatorQueueWaitingList($data);
			$dataOut=json_encode($operatorQueueWaitingList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function operatorQueueServingList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$operatorQueueServingList    = $model1->operatorQueueServingList($data);
			$dataOut=json_encode($operatorQueueServingList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function operatorQueueServedList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$operatorQueueServedList    = $model1->operatorQueueServedList($data);
			$dataOut=json_encode($operatorQueueServedList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function operatorQueueList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$operatorQueueList    = $model1->operatorQueueList($data);
			$dataOut=json_encode($operatorQueueList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function addPersonToDesiredQueue()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			require_once('../configs/testMandril.php');
			require_once('../configs/smsMandril.php');
			require_once('../lib/url_shortener.php');
			$addPersonToDesiredQueue    = $model1->addPersonToDesiredQueue($data);
			echo  $addPersonToDesiredQueue;
			die;
	   
    }
	
	public static function userQueueList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$userQueueList    = $model1->userQueueList($data);
			$dataOut=json_encode($userQueueList,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function removeFromList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$removeFromList    = $model1->removeFromList($data);
			 
					echo  $removeFromList;
					die;
	   
    }
	
	public static function userQueueWaitingDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$userQueueWaitingDetail    = $model1->userQueueWaitingDetail($data);
			$dataOut=json_encode($userQueueWaitingDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function avalibleQueueOnTheLocation()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$avalibleQueueOnTheLocation    = $model1->avalibleQueueOnTheLocation($data);
			$dataOut=json_encode($avalibleQueueOnTheLocation,true);
					echo  $dataOut;
					die;
	   
    }
	public static function hotelCompleteInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$hotelCompleteInfo    = $model1->hotelCompleteInfo($data);
			$dataOut=json_encode($hotelCompleteInfo,true);
			echo  $dataOut;
			die;
	   
    }
	public static function cartInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$cartInfo    = $model1->cartInfo($data);
			$dataOut=json_encode($cartInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function cartInfoList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$cartInfo    = $model1->cartInfoList($data);
			$dataOut=json_encode($cartInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function cartAmenityInfoList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$cartAmenityInfoList    = $model1->cartAmenityInfoList($data);
			$dataOut=json_encode($cartAmenityInfoList,true);
					echo  $dataOut;
					die;
	   
    }
	public static function cartItemCount()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$cartItemCount    = $model1->cartItemCount($data);
			 
					echo  $cartItemCount;
					die;
	   
    }
	
	public static function cartAmenityItemCount()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$cartAmenityItemCount    = $model1->cartAmenityItemCount($data);
			 
					echo  $cartAmenityItemCount;
					die;
	   
    }
	
	public static function cartItemCountInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$cartItemCountInfo    = $model1->cartItemCountInfo($data);
			 
					echo  $cartItemCountInfo;
					die;
	   
    }
	
	public static function selectedRoomServiceAppMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$selectedRoomServiceAppMenu    = $model1->selectedRoomServiceAppMenu($data);
			$dataOut=json_encode($selectedRoomServiceAppMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedDrycleaningServeBasedAppMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$selectedDrycleaningServeBasedAppMenu    = $model1->selectedDrycleaningServeBasedAppMenu($data);
			$dataOut=json_encode($selectedDrycleaningServeBasedAppMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedRoomServiceAppServes()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$selectedRoomServiceAppServes    = $model1->selectedRoomServiceAppServes($data);
			$dataOut=json_encode($selectedRoomServiceAppServes,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function selectedLaundaryCategories()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$selectedLaundaryCategories    = $model1->selectedLaundaryCategories($data);
			$dataOut=json_encode($selectedLaundaryCategories,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function selectedRoomServiceServeBasedAppMenu()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$selectedRoomServiceServeBasedAppMenu    = $model1->selectedRoomServiceServeBasedAppMenu($data);
			$dataOut=json_encode($selectedRoomServiceServeBasedAppMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function UpdatecartItemCount()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$UpdatecartItemCount    = $model1->UpdatecartItemCount($data);
			 
					echo  $UpdatecartItemCount;
					die;
	   
    }
	
	public static function UpdateAmenitycartItemCount()
    {
		 
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$UpdateAmenitycartItemCount    = $model1->UpdateAmenitycartItemCount($data);
			 
					echo  $UpdateAmenitycartItemCount;
					die;
	   
    }
	
	public static function UpdatecartItemCountInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$UpdatecartItemCountInfo    = $model1->UpdatecartItemCountInfo($data);
			 
					echo  $UpdatecartItemCountInfo;
					die;
	   
    }
	
	public static function encryptData()
    {
			//$data=array();
			$data=file_get_contents('php://input');
			 
			$model1       = new safeqloudAppModel();
			$encryptData    = $model1->encryptData($data);
			 
					echo  $encryptData;
					die;
	   
    }
	
	public static function decryptData()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$decryptData    = $model1->decryptData($data);
			 
					echo  $decryptData;
					die;
	   
    }
	
	public static function payCartItemUsingApp()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			require_once('../lib/url_shortener.php');
			require_once('../configs/smsMandril.php'); 
			require_once('../configs/testMandril.php');
			 
			$model1       = new safeqloudAppModel();
			$payCartItemUsingApp    = $model1->payCartItemUsingApp($data);
			 
					echo  $payCartItemUsingApp;
					die;
	   
    }
	
	public static function apartmentDetailInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$apartmentDetailInfo    = $model1->apartmentDetailInfo();
            $dataOut=json_encode($apartmentDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentAmenitiesDetailInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$apartmentAmenitiesDetailInfo    = $model1->apartmentAmenitiesDetailInfo();
            $dataOut=json_encode($apartmentAmenitiesDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentImages()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$apartmentImages    = $model1->apartmentImages();
            $dataOut=json_encode($apartmentImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function apartmentList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$apartmentList    = $model1->apartmentList();
            $dataOut=json_encode($apartmentList,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function userDetails()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$userDetails    = $model1->userDetails($data);
			$dataOut=json_encode($userDetails,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function resturantList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$resturantList    = $model1->resturantList();
            $dataOut=json_encode($resturantList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function resturantCityList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$resturantCityList    = $model1->resturantCityList();
            $dataOut=json_encode($resturantCityList,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function resturantImages()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$resturantImages    = $model1->resturantImages();
            $dataOut=json_encode($resturantImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function resturantInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$resturantInfo    = $model1->resturantInfo();
            $dataOut=json_encode($resturantInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function completeMenu()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$completeMenu    = $model1->completeMenu();
            $dataOut=json_encode($completeMenu,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function longTermApartmentList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$longTermApartmentList    = $model1->longTermApartmentList();
            $dataOut=json_encode($longTermApartmentList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentForSaleList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$apartmentForSaleList    = $model1->apartmentForSaleList();
            $dataOut=json_encode($apartmentForSaleList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function apartmentIsAvailable()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$apartmentList    = $model1->apartmentIsAvailable();
           
					echo  $apartmentList;
					die; 
        
       
    }
	
	public static function hotelBathroomAmenities()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$hotelBathroomAmenities    = $model1->hotelBathroomAmenities($data);
			 $dataOut=json_encode($hotelBathroomAmenities,true);
					echo  $dataOut;
					die;
	   
    }
		public static function selectedRoomServiceMenu()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$selectedRoomServiceMenu    = $model1->selectedRoomServiceMenu($data);
			 $dataOut=json_encode($selectedRoomServiceMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function selectedWellnessServiceMenu()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$selectedWellnessServiceMenu    = $model1->selectedWellnessServiceMenu($data);
			 $dataOut=json_encode($selectedWellnessServiceMenu,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedRoomServiceMenuItemInfo()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$selectedRoomServiceMenuItemInfo    = $model1->selectedRoomServiceMenuItemInfo($data);
			 $dataOut=json_encode($selectedRoomServiceMenuItemInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function selectedWellnessServiceMenuItemInfo()
    {
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$selectedWellnessServiceMenuItemInfo    = $model1->selectedWellnessServiceMenuItemInfo($data);
			 $dataOut=json_encode($selectedWellnessServiceMenuItemInfo,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function updatePayRequired()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updatePayRequired    = $model1->updatePayRequired($data);
			  
					echo  $updatePayRequired;
					die;
	   
    }
	
	public static function checkUsedDependentIdentificator()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$checkUsedDependentIdentificator    = $model1->checkUsedDependentIdentificator($data);
			  
					echo  $checkUsedDependentIdentificator;
					die;
	   
    }
	
	public static function dependentDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$dependentDetail    = $model1->dependentDetail($data);
			$dataOut=json_encode($dependentDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function verifyUserBookingExists()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$verifyUserBookingExists    = $model1->verifyUserBookingExists($data);
			  
					echo  $verifyUserBookingExists;
					die;
	   
    }
	
	public static function updateDependentCheckinIds()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updateDependentCheckinIds    = $model1->updateDependentCheckinIds($data);
			  
					echo  $updateDependentCheckinIds;
					die;
	   
    }
	
	public static function checkSsn()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$checkSsn    = $model1->checkSsn($data);
			  
					echo  $checkSsn;
					die;
	   
    }
	
	public static function checkDependentSsn()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$checkDependentSsn    = $model1->checkDependentSsn($data);
			  
					echo  $checkDependentSsn;
					die;
	   
    }
	public static function addDependentImages()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$addDependentImages    = $model1->addDependentImages($data);
			  
					echo  $addDependentImages;
					die;
	   
    }
	
	public static function checkPassport()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$checkPassport    = $model1->checkPassport($data);
			  
					echo  $checkPassport;
					die;
	   
    }
	
	
		public static function updateDependent()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updateDependent    = $model1->updateDependent($data);
			  
					echo  $updateDependent;
					die;
	   
    }
	 
	
	public static function addDependentProfileImages()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$addDependentProfileImages    = $model1->addDependentProfileImages($data);
			  
					echo  $addDependentProfileImages;
					die;
	   
    }
	
	public static function addDependentPassport()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$addDependentPassport    = $model1->addDependentPassport($data);
			  
					echo  $addDependentPassport;
					die;
	   
    }
	
	public static function addDependent()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
			$addDependent    = $model1->addDependent($data);
			  
					echo  $addDependent;
					die;
	   
    }
	
	
	public static function dependentsList()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$dependentsList    = $model1->dependentsList($data);
			$dataOut=json_encode($dependentsList,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function dependentsListForCheckin()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$dependentsList    = $model1->dependentsListForCheckin($data);
			$dataOut=json_encode($dependentsList,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function dependentsListForCheckinDstrict()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$dependentsList    = $model1->dependentsListForCheckinDstrict($data);
			$dataOut=json_encode($dependentsList,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function updateCheckRequired()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updateCheckRequired    = $model1->updateCheckRequired($data);
			  
					echo  $updateCheckRequired;
					die;
	   
    }
	
	
	public static function countPickupAddress()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$countPickupAddress    = $model1->countPickupAddress($data);
			$dataOut=json_encode($countPickupAddress,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function pickupAddressDetail()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$pickupAddressDetail    = $model1->pickupAddressDetail($data);
			$dataOut=json_encode($pickupAddressDetail,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function updatePickupDelivery()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updatePickupDelivery    = $model1->updatePickupDelivery($data);
			 
					echo  $updatePickupDelivery;
					die;
	   
    }
	
	public static function updatePickupAddress()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updatePickupAddress    = $model1->updatePickupAddress($data);
			 
					echo  $updatePickupAddress;
					die;
	   
    }
	public static function orderHotelAppAmenity()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$orderHotelAppAmenity    = $model1->orderHotelAppAmenity($data);
			 
					echo  $orderHotelAppAmenity;
					die;
	   
    }
	public static function orderHotelAmenity()
    {
			$data=array();
			$model1       = new safeqloudAppModel();
			$orderHotelAmenity    = $model1->orderHotelAmenity($data);
			  
					echo  $orderHotelAmenity;
					die;
	   
    }
	
	public static function hotelMediaAmenities()
    {
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$hotelMediaAmenities    = $model1->hotelMediaAmenities($data);
			 $dataOut=json_encode($hotelMediaAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function hotelRoomAmenities()
    {
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$hotelRoomAmenities    = $model1->hotelRoomAmenities($data);
			 $dataOut=json_encode($hotelRoomAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	
	public static function hotelBedAmenities()
    {
			$data=array();
			$data=$_POST; 
			$model1       = new safeqloudAppModel();
			$hotelBedAmenities    = $model1->hotelBedAmenities($data);
			 $dataOut=json_encode($hotelBedAmenities,true);
					echo  $dataOut;
					die;
	   
    }
	
	public static function employeeAtendence()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$checkEmployeeAttendence    = $model1->checkEmployeeAttendence($data);
			 echo $checkEmployeeAttendence; die;
			 
	   
    }
	
	public static function updateAttendence()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$updateAttendence    = $model1->updateAttendence($data);
			 
			echo $updateAttendence; die;
	   
    }
	
	public static function updateExit()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$updateExit    = $model1->updateExit($data);
			 
			echo $updateExit; die;
	   
    }
	
	public static function updateLeave()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$updateLeave    = $model1->updateLeave($data);
			 
			echo $updateLeave; die;
	   
    }
	
	public static function updateVacationInfo()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$model1       = new safeqloudAppModel();
			$updateVacationInfo    = $model1->updateVacationInfo($data);
			 
			echo $updateVacationInfo; die;
	   
    }
	
	public static function checkEmployeeTime()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$checkEmployeeTime    = $model1->checkEmployeeTime($data);
            $dataOut=json_encode($checkEmployeeTime,true);
					echo  $dataOut;
					die; 
        
       
    }
	
    public static function employerRequestCount()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			
			$employerRequestCount    = $model1->employerRequestCount($data);
            echo $employerRequestCount; die;
            
        
       
    }
    
	
	
	
	public static function employerRequestReceived()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$employerRequestReceived    = $model1->employerRequestReceived($data);
            $dataOut=json_encode($employerRequestReceived,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelPayInfo()
    {
       
			 
			$model1       = new safeqloudAppModel();
			$hotelPayInfo    = $model1->hotelPayInfo();
			 
            $dataOut=json_encode($hotelPayInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function contactList()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$contactList    = $model1->contactList($data);
            $dataOut=json_encode($contactList,true);
			echo  $dataOut;
			die; 
        
       
    }
	
	public static function approveEmployerRequest()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$data['stat']=1;
			$model1       = new safeqloudAppModel();
			$approveEmployerRequest    = $model1->approveEmployerRequest($data);
            $dataOut=json_encode($approveEmployerRequest,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	
	public static function daycareRequestCount()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$daycareRequestCount    = $model1->daycareRequestCount($data);
            $dataOut=json_encode($daycareRequestCount,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function rejectEmployerRequest()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$data['stat']=2;  
			$model1       = new safeqloudAppModel();
			$approveEmployerRequest    = $model1->approveEmployerRequest($data);
            $dataOut=json_encode($approveEmployerRequest,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function getCheckedInHotel()
    {
			$data=array();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$model1       = new safeqloudAppModel();
			$getCheckedInHotel    = $model1->getCheckedInHotel();
            echo  $getCheckedInHotel;
			die; 
     }
	 
	public static function getFrontDeskCheckedInHotel()
    {
			$data=array();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$model1       = new safeqloudAppModel();
			$getFrontDeskCheckedInHotel    = $model1->getFrontDeskCheckedInHotel();
            echo  $getFrontDeskCheckedInHotel;
			die; 
     }
	 
	public static function isHotel()
    {
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$model1       = new safeqloudAppModel();
			$isHotel    = $model1->isHotel($data);
            echo  $isHotel;
			die; 
     }
    
      public static function checkConnect($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			  
            $model1       = new safeqloudAppModel();
			$checkConnect    = $model1->checkConnect($data);
            echo $checkConnect; die;
			 
        
       
    }
	
	public static function lawCompanyDetails()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$lawCompanyDetails    = $model1->lawCompanyDetails();
            $dataOut=json_encode($lawCompanyDetails,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function lawersInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$lawersInfo    = $model1->lawersInfo();
            $dataOut=json_encode($lawersInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelList    = $model1->hotelList();
            $dataOut=json_encode($hotelList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	 
	
	public static function carRentalList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$availableCarList    = $model1->carRentalList();
            $dataOut=json_encode($availableCarList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function availableCarSelectedCityList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$availableCarList    = $model1->availableCarSelectedCityList();
            $dataOut=json_encode($availableCarList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function listAvailableCars()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$availableCarList    = $model1->listAvailableCars();
            $dataOut=json_encode($availableCarList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function availableCarList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$availableCarList    = $model1->availableCarList();
            $dataOut=json_encode($availableCarList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function selectedCarTypeImages()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$selectedCarTypeImages    = $model1->selectedCarTypeImages();
            $dataOut=json_encode($selectedCarTypeImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function selectedCarTypeDetail()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$selectedCarTypeDetail    = $model1->selectedCarTypeDetail();
            $dataOut=json_encode($selectedCarTypeDetail,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function selectedCarDetail()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$selectedCarDetail    = $model1->selectedCarDetail();
            $dataOut=json_encode($selectedCarDetail,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	 
	public static function bookCar()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$bookCar    = $model1->bookCar();
            echo  $bookCar;
					die; 
        
       
    }
	
	public static function bookRentalCar()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
			$bookRentalCar    = $model1->bookRentalCar();
           $dataOut=json_encode($bookRentalCar,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function phoneCountryCode()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$phoneCountryCode    = $model1->phoneCountryCode();
            $dataOut=json_encode($phoneCountryCode,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function updatePreCheckinStatusDstrict()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$updatePreCheckinStatus    = $model1->updatePreCheckinStatus($data);
            $dataOut=json_encode($updatePreCheckinStatus,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function bookingInformationDetail()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$bookingInformationDetail    = $model1->bookingInformationDetail($data);
            $dataOut=json_encode($bookingInformationDetail,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function bookingCityDetail()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$bookingCityDetail    = $model1->bookingCityDetail($data);
            $dataOut=json_encode($bookingCityDetail,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function marketplaceDomainList()
    {
       
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$marketplaceSelectedDomainList    = $model1->marketplaceSelectedDomainList($data);
            $dataOut=json_encode($marketplaceSelectedDomainList,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function premiumUnaqasaMarketplaces()
    {
       
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			$premiumMarketplaces    = $model1->premiumUnaqasaMarketplaces($data);
            $dataOut=json_encode($premiumMarketplaces,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function sendRequestToCompnay()
    {
       
			$data=array();
			$data=$_POST;
			 
			$model1       = new safeqloudAppModel();
			require_once('../configs/testMandril.php');	
			$sendRequestToCompnay    = $model1->sendRequestToCompnay($data);
             
					echo  $sendRequestToCompnay;
					die; 
        
       
    }
	
	public static function bookingAdultsCheckedInList()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$bookingAdultsCheckedInList    = $model1->bookingAdultsCheckedInList($data);
            $dataOut=json_encode($bookingAdultsCheckedInList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function bookingDependentsCheckedInList()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$bookingDependentsCheckedInList    = $model1->bookingDependentsCheckedInList($data);
            $dataOut=json_encode($bookingDependentsCheckedInList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function reportMissingChild()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportMissingChild    = $model1->reportMissingChild($data);
            $dataOut=json_encode($reportMissingChild,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function reportFoundChild()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportFoundChild    = $model1->reportFoundChild($data);
            $dataOut=json_encode($reportFoundChild,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function bookingMissingAdultsList()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$bookingMissingAdultsList    = $model1->bookingMissingAdultsList($data);
            $dataOut=json_encode($bookingMissingAdultsList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function missingPersonDetail()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$missingPersonDetail    = $model1->missingPersonDetail($data);
            $dataOut=json_encode($missingPersonDetail,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function reportFoundPublicAdult()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportFoundPublicAdult    = $model1->reportFoundPublicAdult($data);
            $dataOut=json_encode($reportFoundPublicAdult,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function reportFoundPrivateAdult()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportFoundPrivateAdult    = $model1->reportFoundPrivateAdult($data);
            $dataOut=json_encode($reportFoundPrivateAdult,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function reportFoundPrivateChild()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportFoundPrivateChild    = $model1->reportFoundPrivateChild($data);
            $dataOut=json_encode($reportFoundPrivateChild,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function reportFoundAdult()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportFoundAdult    = $model1->reportFoundAdult($data);
            $dataOut=json_encode($reportFoundAdult,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function reportMissingAdult()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportMissingAdult    = $model1->reportMissingAdult($data);
            $dataOut=json_encode($reportMissingAdult,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function reportMissingAdultPhoto()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportMissingAdultPhoto    = $model1->reportMissingAdultPhoto($data);
            $dataOut=json_encode($reportMissingAdultPhoto,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function reportMissingChildPhoto()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$reportMissingChildPhoto    = $model1->reportMissingChildPhoto($data);
            $dataOut=json_encode($reportMissingChildPhoto,true);
					echo  $dataOut;
					die; 
        
       
    }
		public static function bookingGetsratedDetail()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$bookingGetsratedDetail    = $model1->bookingGetsratedDetail($data);
            $dataOut=json_encode($bookingGetsratedDetail,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function bookingSelectedGetsratedDetail()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$bookingSelectedGetsratedDetail    = $model1->bookingSelectedGetsratedDetail($data);
            $dataOut=json_encode($bookingSelectedGetsratedDetail,true);
					echo  $dataOut;
					die; 
        
       
    }
	public static function workingHrs()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$workingHrs    = $model1->workingHrs($data);
            $dataOut=json_encode($workingHrs,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function bookingApartmentInformationDetail()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$bookingApartmentInformationDetail    = $model1->bookingApartmentInformationDetail($data);
            $dataOut=json_encode($bookingApartmentInformationDetail,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentInfo()
    {
       
			$data=array();
			$data=$_POST;
			$model1       = new safeqloudAppModel();
			$apartmentInfo    = $model1->addressDetail($data);
            $dataOut=json_encode($apartmentInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelRoomTypeList    = $model1->hotelRoomTypeList();
            $dataOut=json_encode($hotelRoomTypeList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeCheckinList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$hotelRoomTypeCheckinList    = $model1->hotelRoomTypeCheckinList();
            $dataOut=json_encode($hotelRoomTypeCheckinList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function getAvailableRooms()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$data=json_decode(file_get_contents('php://input'), true); 
			$getAvailableRooms    = $model1->getAvailableRooms($data);
			 
            $dataOut=json_encode($getAvailableRooms,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	 
	
	public static function hotelCheckinList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$hotelCheckinList    = $model1->hotelCheckinList();
            $dataOut=json_encode($hotelCheckinList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentPayInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$apartmentPayInfo    = $model1->apartmentPayInfo();
            $dataOut=json_encode($apartmentPayInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function bookApartment()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$bookApartment    = $model1->bookApartment();
           $dataOut=json_encode($bookApartment,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function apartmentCheckedInList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$apartmentCheckedInList    = $model1->apartmentCheckedInList();
            $dataOut=json_encode($apartmentCheckedInList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	
	public static function apartmentOwnerCheckedInList()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			 
			$apartmentOwnerCheckedInList    = $model1->apartmentOwnerCheckedInList();
            $dataOut=json_encode($apartmentOwnerCheckedInList,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	
	
	
	 
	public static function hotelImages()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelImages    = $model1->hotelImages();
            $dataOut=json_encode($hotelImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelImagesCount()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelImagesCount    = $model1->hotelImagesCount();
            echo  $hotelImagesCount;
			die; 
        
       
    }
	
	public static function bookingDetails()
    {
       
			 
			$model1       = new safeqloudAppModel();
			$bookingDetails    = $model1->bookingDetails();
           $dataOut=json_encode($bookingDetails,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelDetailInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelDetailInfo    = $model1->hotelDetailInfo();
            $dataOut=json_encode($hotelDetailInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function hotelDetailRoomTypeInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelDetailRoomTypeInfo    = $model1->hotelDetailRoomTypeInfo();
            $dataOut=json_encode($hotelDetailRoomTypeInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelRoomTypeInfo    = $model1->hotelRoomTypeInfo();
            $dataOut=json_encode($hotelRoomTypeInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	
	public static function hotelRoomTypePriceInfo()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelRoomTypePriceInfo    = $model1->hotelRoomTypePriceInfo();
            $dataOut=json_encode($hotelRoomTypePriceInfo,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function hotelRoomTypeImages()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$hotelRoomTypeImages    = $model1->hotelRoomTypeImages();
            $dataOut=json_encode($hotelRoomTypeImages,true);
					echo  $dataOut;
					die; 
        
       
    }
	
	public static function languagesKnown()
    {
       
			$data=array();
			$model1       = new safeqloudAppModel();
			$languagesKnown    = $model1->languagesKnown();
            $dataOut=json_encode($languagesKnown,true);
					echo  $dataOut;
					die; 
        
       
    }
	 public static function addAddress()
    {
       
			$data=array();
			$data=json_decode(htmlentities(file_get_contents('php://input'),ENT_NOQUOTES, 'UTF-8'), true);
			//echo html_entity_decode($data['DeliveryAddress'],ENT_NOQUOTES, 'UTF-8');
			//print_r($data); die;
			$model1       = new safeqloudAppModel();
			$addAddress    = $model1->addAddress($data);
            echo $addAddress; die;
			 
        
       
    }
	
	public static function addNewAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$addNewAddress    = $model1->addNewAddress($data);
            echo $addNewAddress; die;
			 
        
       
    }
	
	
	public static function getPurchaseDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$getPurchaseDetail    = $model1->getPurchaseDetail($data);
             $dataOut=json_encode($getPurchaseDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function getBookingDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$getBookingDetail    = $model1->getBookingDetail($data);
             $dataOut=json_encode($getBookingDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function verifyCheckinDetail()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$verifyCheckinDetail    = $model1->verifyCheckinDetail($data);
             $dataOut=json_encode($verifyCheckinDetail,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	public static function updateUserAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updateUserAddress    = $model1->updateUserAddress($data);
            echo $updateUserAddress; die;
			 
        
       
    }
	
	public static function updateCompanyAddress()
    {
       
			$data=array();
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$updateCompanyAddress    = $model1->updateCompanyAddress($data);
            echo $updateCompanyAddress; die;
			 
        
       
    }
	
	public static function checkCard()
		{
		$data=array();
		$data=json_decode(file_get_contents('php://input'), true);
		 
		require "../cardvalidity/vendor/autoload.php";	
		$detector = new CardDetect\Detector();
		$card = $data['CardNumber'];

		$cardValue=$detector->detect($card); //Visa
		 
		if($cardValue=='Invalid Card')
		{
			echo 2; die;
		}
		else
		{
		$data['card_type']=$cardValue;
		$model1       = new safeqloudAppModel();
		$saveCardDetails    = $model1->saveCardDetails($data);
		echo $saveCardDetails; die;			
		}	
		
			
		}
	
	 public static function checkValidity($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			 
            $model1       = new safeqloudAppModel();
			$checkValidity    = $model1->checkValidity($data);
            $dataOut=json_encode($checkValidity,true);
					echo  $dataOut;
					die; 
			 
        
       
    }
	
	
	public static function updateLoginStatus($co = null)
    {
       
			$data=array();
			 $data['certi']=cleanMe($co);
			 
            $model1       = new safeqloudAppModel();
			$updateLoginStatus    = $model1->updateLoginStatus($data);
            echo $updateLoginStatus; die;
			 
        
       
    }
	
	
	  public static function checkPassword($co = null)
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$data['certi']=cleanMe($co);
				
				$data['password']=md5($data['password']);
				 
				$model1       = new safeqloudAppModel();
				$checkPassword    = $model1->checkPassword($data);
				$dataOut=json_encode($checkPassword,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function userDeliveryInvoiceInfo()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$userDeliveryInvoiceInfo    = $model1->userDeliveryInvoiceInfo($data);
				$dataOut=json_encode($userDeliveryInvoiceInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function listCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$listCardDetails    = $model1->listCardDetails($data);
				$dataOut=json_encode($listCardDetails,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function certificateExxpiryInfo()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new safeqloudAppModel();
				$certificateExxpiryInfo    = $model1->certificateExxpiryInfo($data);
				$dataOut=json_encode($certificateExxpiryInfo,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function listAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$listAddresses    = $model1->listAddresses($data);
				$dataOut=json_encode($listAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		
		
		
		
		public static function listDeliveryAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$listAddresses    = $model1->listDeliveryAddresses($data);
				$dataOut=json_encode($listAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function invoiceAddresses()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				
				$model1       = new safeqloudAppModel();
				$invoiceAddresses    = $model1->invoiceAddresses($data);
				$dataOut=json_encode($invoiceAddresses,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		 
		
		public static function addressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addressDetail    = $model1->addressDetail($data);
				$dataOut=json_encode($addressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function deliveryAddressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$addressDetail    = $model1->deliveryAddressDetail($data);
				$dataOut=json_encode($addressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function cardDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$cardDetail    = $model1->cardDetail($data);
				$dataOut=json_encode($cardDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function companyAddressDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$companyAddressDetail    = $model1->companyAddressDetail($data);
				$dataOut=json_encode($companyAddressDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 public static function profileDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$profileDetail    = $model1->profileDetail($data);
				$dataOut=json_encode($profileDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function addFoodToCart()
		{
		   
				$data=array();
				 
				$model1       = new safeqloudAppModel();
				$addFoodToCart    = $model1->addFoodToCart();
				$dataOut=json_encode($addFoodToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function addFoodDetailToCart()
		{
		   
				$data=array();
				 
				$model1       = new safeqloudAppModel();
				$addFoodToCart    = $model1->addFoodDetailToCart();
				$dataOut=json_encode($addFoodToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 public static function addDrycleaningItemToCart()
		{
		   
				$data=array();
				 
				$model1       = new safeqloudAppModel();
				$addDrycleaningItemToCart    = $model1->addDrycleaningItemToCart();
				$dataOut=json_encode($addDrycleaningItemToCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function removeItemFromCart()
		{
		   
				$data=array();
				$model1       = new safeqloudAppModel();
				$removeItemFromCart    = $model1->removeItemFromCart();
				$dataOut=json_encode($removeItemFromCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		 public static function removeBookingFromCart()
		{
		   
				$data=array();
				$model1       = new safeqloudAppModel();
				$removeBookingFromCart    = $model1->removeBookingFromCart();
				$dataOut=json_encode($removeBookingFromCart,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 public static function removeAmenityFromCart()
		{
		   
				$data=array();
				$model1       = new safeqloudAppModel();
				$removeAmenityFromCart    = $model1->removeAmenityFromCart();
				 
					echo  $removeAmenityFromCart;
					die; 
				 
			
		   
		}
		 public static function createNewAccount()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$createNewAccount    = $model1->createNewAccount($data);
				$dataOut=json_encode($createNewAccount,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function createEmailAccount()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$createEmailAccount    = $model1->createEmailAccount($data);
				$dataOut=json_encode($createEmailAccount,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		 public static function restoreAccount()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$restoreAccount    = $model1->restoreAccount($data);
				$dataOut=json_encode($restoreAccount,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function verifyEmailOtpPin()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$verifyEmailOtpPin    = $model1->verifyEmailOtpPin($data);
				$dataOut=json_encode($verifyEmailOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function verifyRestoreOtpPin()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$verifyRestoreOtpPin    = $model1->verifyRestoreOtpPin($data);
				$dataOut=json_encode($verifyRestoreOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		public static function verifyRestoreOtpPinWithMobile()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				
				$model1       = new safeqloudAppModel();
				 
				$verifyRestoreOtpPin    = $model1->verifyRestoreOtpPinWithMobile($data);
				$dataOut=json_encode($verifyRestoreOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function verifyPhoneOtpPin()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$verifyPhoneOtpPin    = $model1->verifyPhoneOtpPin($data);
				$dataOut=json_encode($verifyPhoneOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function verifyPhoneOtpPinWithId()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$verifyPhoneOtpPin    = $model1->verifyPhoneOtpPinWithId($data);
				$dataOut=json_encode($verifyPhoneOtpPin,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function verifyAddMobileOtp()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				 
				$model1       = new safeqloudAppModel();
				$verifyAddMobileOtp    = $model1->verifyAddMobileOtp($data);
				$dataOut=json_encode($verifyAddMobileOtp,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		
		public static function addIdentificator()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$addIdentificator    = $model1->addIdentificator($data);
				$dataOut=json_encode($addIdentificator,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function identificatorDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$identificatorDetail    = $model1->identificatorDetail($data);
				$dataOut=json_encode($identificatorDetail,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		
		public static function addIdentificatorName()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$addIdentificator    = $model1->addIdentificatorName($data);
				$dataOut=json_encode($addIdentificator,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function addIdentificatorImages()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				$addIdentificatorImages    = $model1->addIdentificatorImages($data);
				$dataOut=json_encode($addIdentificatorImages,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		 
		
		public static function generateCertificate()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				$model1       = new safeqloudAppModel();
				 
				$generateCertificate    = $model1->generateCertificate($data);
				$dataOut=json_encode($generateCertificate,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function verifyUserMobile()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$model1       = new safeqloudAppModel();
				$verifyUserMobile    = $model1->verifyUserMobile($data);
				$dataOut=json_encode($verifyUserMobile,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
		public static function checkMobileAvailability()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				  
				require_once('../lib/url_shortener.php');
				require_once('../configs/smsMandril.php');
				$model1       = new safeqloudAppModel();
				$checkMobileAvailability    = $model1->checkMobileAvailability($data);
				$dataOut=json_encode($checkMobileAvailability,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
		
			 public static function purchaseDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$purchaseDetail    = $model1->purchaseDetail($data);
				 
					echo  $purchaseDetail;
					die; 
				 
			
		   
		}
		
		
			 public static function updateCardPurchaseDetail()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$updateCardPurchaseDetail    = $model1->updateCardPurchaseDetail($data);
				 
					echo  $updateCardPurchaseDetail;
					die; 
				 
			
		   
		}
		
		
		 public static function savePurchaseCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$savePurchaseCardDetails    = $model1->savePurchaseCardDetails($data);
				 
					echo  $savePurchaseCardDetails;
					die; 
				 
			
		   
		}
		
		
		 public static function saveUpdatedPurchaseCardDetails()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				 
				$model1       = new safeqloudAppModel();
				$savePurchaseCardDetails    = $model1->saveUpdatedPurchaseCardDetails($data);
				 
					echo  $savePurchaseCardDetails;
					die; 
				 
			
		   
		}
		
		
		 public static function confirmPurchase()
		{
		   
				$data=array();
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$confirmPurchase    = $model1->confirmPurchase($data);
				echo  $confirmPurchase;
				die; 
			}
	
	
	 public static function purchaseDetailUpdate()
		{
		   
				$data=array();
				 
				$data=json_decode(file_get_contents('php://input'), true);
				$model1       = new safeqloudAppModel();
				$purchaseDetailUpdate    = $model1->purchaseDetailUpdate($data);
				 
					$dataOut=json_encode($purchaseDetailUpdate,true);
					echo  $dataOut;
					die; 
				 
			
		   
		}
	
	
	
	 public static function verifyPassword($co = null)
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$data['password']=md5($data['password']);
			
			$data['certi']=cleanMe($co);
			 
            $model1       = new safeqloudAppModel();
			$verifyPassword    = $model1->verifyPassword($data);
            
				echo  $verifyPassword;
				die; 
			 
        
       
    }
	
	
	public static function verifyInterAppPassword()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			
			$data['password']=md5($data['password']);
			$model1       = new safeqloudAppModel();
			$verifyPassword    = $model1->verifyInterAppPassword($data);
            $dataOut=json_encode($verifyPassword,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	public static function verifyInterAppSession($co = null)
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$verifyInterAppSession    = $model1->verifyInterAppSession($data);
            $dataOut=json_encode($verifyInterAppSession,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	public static function verifyAdmin()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$verifyAdmin    = $model1->verifyAdmin($data);
            $dataOut=json_encode($verifyAdmin,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	
	public static function companyDownloadedApps()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			$model1       = new safeqloudAppModel();
			$companyDownloadedApps    = $model1->companyDownloadedApps($data);
            $dataOut=json_encode($companyDownloadedApps,true);
					echo  $dataOut;
					die; ; 
			 
        
       
    }
	
	 public static function verifyUserConsent()
    {
       
			$data=array();
			 
			
			$data=json_decode(file_get_contents('php://input'), true);
			 
			$data['clientId']=$data['clientId'];
			
			$data['certi']=$data['certificate'];
			 
            $model1       = new safeqloudAppModel();
			$verifyUserConsent    = $model1->verifyUserConsent($data);
            
				$dataOut=json_encode($verifyUserConsent,true);
					echo  $dataOut;
				die; 
			 
        
       
    }
	
	
	public static function clearIps($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new safeqloudAppModel();
			$clearIps    = $model1->clearIps($data);
            
				echo  $clearIps;
				die; 
			 
        
       
    }
	
	
	public static function clearLogin($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new safeqloudAppModel();
			$clearLogin    = $model1->clearLogin($data);
            
				echo  $clearLogin;
				die; 
			 
        
       
    }
	
	public static function clearCertificate($co = null)
    {
       
			$data=array();
			$data['certi']=cleanMe($co);
			$model1       = new safeqloudAppModel();
			$clearCertificate    = $model1->clearCertificate($data);
            
				echo  $clearCertificate;
				die; 
			 
        
       
    }
	
	
	public static function checkOrderReference($co = null)
    {
       
			$data=array();
			 
            $model1       = new safeqloudAppModel();
			$checkOrderReference    = $model1->checkOrderReference($data);
             
				echo  $checkOrderReference;
				die; 
			 
        
       
    }
	
	public static function getUserId($co = null)
    {
       
			$data=array();
			 
            $model1       = new safeqloudAppModel();
			$getUserId    = $model1->getUserId($data);
             
				echo  $getUserId;
				die; 
			 
        
       
    }
	   
    public static function updateLoginIp($co = null)
    {
       
			$data=array();
			
			$data=json_decode(file_get_contents('php://input'), true);
			
			$data['certi']=cleanMe($co);
			
            $model1       = new safeqloudAppModel();
			$updateLoginIp    = $model1->updateLoginIp($data);
             echo $updateLoginIp; die;
			 
        
       
    }
}


?>