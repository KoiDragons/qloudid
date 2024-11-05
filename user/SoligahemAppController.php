<?php
include 'SoligahemAppModel.php';
require_once '../configs/utility.php';

class SoligahemAppController
{
		public static function reserveObject()
		{
			
				$model = new SoligahemAppModel();
				$reserveObject=$model->reserveObject();
				echo  $reserveObject;
				die; 
				
		}
		
		public static function sendLandloardProposal()
		{
			
				$model = new SoligahemAppModel();
				require_once('../lib/url_shortener.php');
				require_once('../configs/testMandril.php');
				require_once('../configs/smsMandril.php');
				 
				$sendLandloardProposal=$model->sendLandloardProposal();
				echo  $sendLandloardProposal;
				die; 
				
		}
		
		public static function updateWheel()
		{
			
				$model = new SoligahemAppModel();
				$updateWheel=$model->updateWheel();
				echo  $updateWheel;
				die; 
				
		}
		
		public static function updateRent()
		{
			
				$model = new SoligahemAppModel();
				$updateRent=$model->updateRent();
				echo  $updateRent;
				die; 
				
		}
		
		public static function updateFinance()
		{
			
				$model = new SoligahemAppModel();
				 
				$updateFinance=$model->updateFinance();
				echo  $updateFinance;
				die; 
				
		}
		
		public static function getFinanceInfo()
		{
			
				$model = new SoligahemAppModel();
				 
				$getFinanceInfo=$model->getFinanceInfo();
				$dataOut=json_encode($getFinanceInfo,true);
				echo  $dataOut;
				 
				die; 
				
		}
		
		public static function updateReservePurchaseInfo()
		{
			
				$model = new SoligahemAppModel();
				$updateReservePurchaseInfo=$model->updateReservePurchaseInfo();
				echo  $updateReservePurchaseInfo;
				die; 
				
		}
		
		public static function reservedPropertyList()
		{
			
				$model = new SoligahemAppModel();
				$reservedPropertyList=$model->reservedPropertyList();
				$dataOut=json_encode($reservedPropertyList,true);
				echo  $dataOut;
				die; 
				
		}
		public static function getLandloardPropertyList()
		{
			
				$model = new SoligahemAppModel();
				$getPropertyList=$model->getLandloardPropertyList();
				$dataOut=json_encode($getPropertyList,true);
				echo  $dataOut;
				die; 
				
		}
		
		
		
		public static function getPropertyDetailVitechNewInfo()
		{
			
				$model = new SoligahemAppModel();
				$getPropertyDetailVitechNewInfo=$model->getPropertyDetailVitechNewInfo();
				$dataOut=json_encode($getPropertyDetailVitechNewInfo,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function getLandloardApartmentDetail()
		{
			
				$model = new SoligahemAppModel();
				$getPropertyList=$model->getLandloardApartmentDetail();
				$dataOut=json_encode($getPropertyList,true);
				echo  $dataOut;
				die; 
				
		}
		
		
		public static function getPropertyListForSale()
		{
			
				$model = new SoligahemAppModel();
				$getPropertyListForSale=$model->getPropertyListForSale();
				$dataOut=json_encode($getPropertyListForSale,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function getLandloardApartmentImageDetail()
		{
			
				$model = new SoligahemAppModel();
				$getPropertyList=$model->getLandloardApartmentImageDetail();
				$dataOut=json_encode($getPropertyList,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function getPropertyList()
		{
			 
				$model = new SoligahemAppModel();
				$getPropertyList=$model->getPropertyList();
				$dataOut=json_encode($getPropertyList,true);
				echo  $dataOut;
				die; 
				
		}
		public static function getPropertyDetailInfo()
		{
			 
				$model = new SoligahemAppModel();
				$getPropertyDetailInfo=$model->getPropertyDetailInfo();
				$dataOut=json_encode($getPropertyDetailInfo,true);
				echo  $dataOut;
				die; 
				
		}
		 
    public static function getPropertyListFilter()
		{
			
				$model = new SoligahemAppModel();
				$getPropertyList=$model->getPropertyListFilter();
				$dataOut=json_encode($getPropertyList,true);
				echo  $dataOut;
				die; 
				
		}
		public static function getLandloardPropertyListFilter()
		{
			
				$model = new SoligahemAppModel();
				$getPropertyList=$model->getLandloardPropertyListFilter();
				$dataOut=json_encode($getPropertyList,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function getLandloardBuildingImages()
		{
			
				$model = new SoligahemAppModel();
				$getLandloardBuildingImages=$model->getLandloardBuildingImages();
				$dataOut=json_encode($getLandloardBuildingImages,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function reservedLandloardPropertyList()
		{
			
				$model = new SoligahemAppModel();
				 
				$reservedLandloardPropertyList=$model->reservedLandloardPropertyList();
				$dataOut=json_encode($reservedLandloardPropertyList,true);
			 
				echo  $dataOut;
				die; 
				
		}
		
		public static function getLandloardBuildingDetails()
		{
			
				$model = new SoligahemAppModel();
				$getLandloardBuildingDetails=$model->getLandloardBuildingDetails();
				$dataOut=json_encode($getLandloardBuildingDetails,true);
				echo  $dataOut;
				die; 
				
		}
		
		public static function getLandloardApartmentPropertyList()
		{
			
				$model = new SoligahemAppModel();
				$getLandloardApartmentPropertyList=$model->getLandloardApartmentPropertyList();
				$dataOut=json_encode($getLandloardApartmentPropertyList,true);
				echo  $dataOut;
				die; 
				
		}
		
		
		 public static function fetchVitechCity()
		{
			
				$model = new SoligahemAppModel();
				$fetchVitechCity=$model->fetchVitechCity();
				echo  $fetchVitechCity;
				die; 
				
		}
		
		 public static function fetchVitechArea()
		{
			
				$model = new SoligahemAppModel();
				$fetchVitechArea=$model->fetchVitechArea();
				echo  $fetchVitechArea;
				die; 
				
		}
}


?>