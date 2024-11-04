<?php
	
	require_once 'EshopModel.php';
	require_once '../configs/utility.php';
	require_once('../AppModel.php');
	class EshopController
	{
		 
	 public static function itemInformation($a=null)
		{
			 
				$path = "../../../../";
				$model       = new EshopModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$companyDetail    = $model->companyDetail($data);
				 
				$completeServiceInfo    = $model->completeServiceInfo($data);
				$businessImageDetail    = $model->businessImageDetail($data);
				$displayPhotos    = $model->displayPhotos($data);
				$footerDetail    = $model->footerDetail($data);
				//print_r($footerDetail); die;
				require_once('EshopMenuListViewNew.php');
			
		}
	 	  public static function productInformation($a=null, $b=null)
		{
			 
				$path = "../../../../../";
				$model       = new EshopModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$companyDetail    = $model->companyDetail($data);
				$productInfo    = $model->productInfo($data);
				 
				$businessImageDetail    = $model->businessImageDetail($data);
				$productVariations    = $model->productVariations($data);
				//print_r($productInfo); die;
				require_once('EshopProductPageViewNew.php');
			
		}
		
		
		 
		  public static function reviewBasket($a=null)
		{
			 
				$path = "../../../../";
				$model       = new EshopModel();
				$data=array();
				$data['cid']=cleanMe($a);
				 
				$companyDetail    = $model->companyDetail($data);
				$selectedProducts    = $model->selectedProducts($data);
				if(count($selectedProducts)==0)
				{
					header('location:../itemInformation/'.$data['cid']); die;
				}
				$selectedProductsPrice    = $model->selectedProductsPrice($data); 
				$businessImageDetail    = $model->businessImageDetail($data);
				require_once('EshopReviewBasketViewNew.php');
			
		}
		
		
		 public static function guestCheckout($a=null)
		{
			 
				$path = "../../../../";
				$model       = new EshopModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$businessImageDetail    = $model->businessImageDetail($data); 
				$companyDetail    = $model->companyDetail($data);
				$apiInfo    = $model->apiInfo($data);
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode();
				require_once('EshopDeliveryAddressView.php');
			
		}
		
		 public static function businessCheckout($a=null)
		{
			 
				$path = "../../../../";
				$model       = new EshopModel();
				$data=array();
				$data['cid']=cleanMe($a);
				$businessImageDetail    = $model->businessImageDetail($data); 
				$companyDetail    = $model->companyDetail($data);
				$apiInfo    = $model->apiInfo($data);
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode();
				require_once('EshopDeliveryBusinessAddressViewNew.php');
			
		}
		
		 public static function addDevilveryAddress($a=null)
		{
			$data=array();
				$data['cid']=cleanMe($a);
				 
				$model = new EshopModel();
				$addDevilveryAddress = $model->addDevilveryAddress($data);
				header('location:../thanksForShopping/'.$data['cid']);
		}
		
		 public static function addBusinessDevilveryAddress($a=null)
		{
			$data=array();
				$data['cid']=cleanMe($a);
				 
				$model = new EshopModel();
				$addBusinessDevilveryAddress = $model->addBusinessDevilveryAddress($data);
				header('location:../thanksForShopping/'.$data['cid']);
		}
		
		public static function thanksForShopping($a=null)
		{
			 
				$path = "../../../../";
				$model       = new EshopModel();
				
				$data=array();
				 $data['cid']=cleanMe($a);
				  
				require_once('EshopThanksPurchaseView.php');
			
		}
		
		
		
		 public static function deliveryAddress($a=null)
		{
			 
				$path = "../../../../";
				$model       = new EshopModel();
				
				$data=array();
				$data['cid']=cleanMe($a);
				if(isset($_POST['ip']))
				{
				$purchaserInfo    = $model->purchaserInfo($data); 
				$deliveryInfo    = $model->deliveryInfo($data); 
				 
				$companyDetail    = $model->companyDetail($data);
				$apiInfo    = $model->apiInfo($data);
				$countryOptions    = $model->countryOptions();
				$countryCode    = $model->countryCode();
				if($purchaserInfo['user']==1)
				{
				$updateDevilveryAddress    = $model->updateDevilveryAddress($data);
				}
				else
				{
				$addCompanyDevilveryAddress    = $model->addCompanyDevilveryAddress($data);
				}
				
				require_once('EshopThanksPurchaseView.php');
				}
				else
				{
					header("location:../itemInformation/".$data['cid']); die;
				}
		}
		
		public static function getPrice($a=null)
		{
			$data=array();
				$data['pid']=cleanMe($a);
				 
				$model = new EshopModel();
				$getPrice = $model->getPrice($data);
				echo $getPrice; die;
			
		}
		
	 public static function addToCart($a=null,$b=null)
		{
			$data=array();
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$model = new EshopModel();
				$addToCart = $model->addToCart($data);
				header('location:../../reviewBasket/'.$data['cid']);
		}
		
		
		 public static function addCompanyDevilveryAddress($a=null)
		{
			$data=array();
				$data['cid']=cleanMe($a);
				 
				$model = new EshopModel();
				$addCompanyDevilveryAddress = $model->addCompanyDevilveryAddress($data);
				header('location:../itemInformation/'.$data['cid']);
		}
		public static function deleteSelectedItem($a=null,$b=null)
		{
			$data=array();
				$data['cid']=cleanMe($a);
				$data['pid']=cleanMe($b);
				$model = new EshopModel();
				$deleteSelectedItem = $model->deleteSelectedItem($data);
				header('location:../../reviewBasket/'.$data['cid']);
		}
	}
?>