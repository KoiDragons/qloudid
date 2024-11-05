<?php
   require_once 'CoronaHelpModel.php';
   require_once '../configs/utility.php';
   require_once('../AppModel.php');
   class CoronaHelpController
   {
       
       
       public static function index()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:LoginAccount");
   				} else {
   				$path = "../../";
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$model1       = new CoronaHelpModel();
   				$userRole    = $model1->userRole($data);
   				 
   				 if($userRole!=2)
   				 {
   					header('location:StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   					 $phoneVerified    = $model1->phoneVerified($data);
   					 $userSummary    = $model1->userSummary($data);
   					 $addressVerified    = $model1->addressVerified($data);
   					 if($addressVerified==0)
   					 {
   						header('location:NewPersonal/addAddressDetail'); die; 
   					 }
   					 
   					 if($phoneVerified==0)
   					 {
   					header('location:StoreData/addPhoneNumber'); die;
   				
   					 }
   					 else
   					 {
   						require_once('CoronaHelpWelcomeView.php');
   					 }
   					 
   				}
   				}
   	}
   	
   	  public static function itemDetailInfo()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else {
   		 
   		$path = "../../../";
   		$data=array();
   		$data['user_id']=$_SESSION['user_id'];
   		$model       = new CoronaHelpModel();
   		$userRole    = $model->userRole($data);
   				 if($userRole==0)
   				 {
   					header('location:../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   					 $phoneVerified    = $model->phoneVerified($data);
   					 $addressVerified    = $model->addressVerified($data);
   					 if($addressVerified==0)
   					 {
   						header('location:../NewPersonal/addAddressDetail'); die; 
   					 }
   					 
   					 if($phoneVerified==0)
   					 {
   					header('location:../StoreData/addPhoneNumber'); die;
   				
   					 }
   					 else
   					 {
   		require_once('CoronaHelpItemDetailView.php');
   					 }
   				 }
   				}
   	
   	}
   	
   	  public static function registerYourself()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else {
   		 
   		$path = "../../../";
   		$data=array();
   		$data['user_id']=$_SESSION['user_id'];
   		$model       = new CoronaHelpModel();
		$addressVerified    = $model->addressVerified($data);
		if($addressVerified==0)
   			{
   			header('location:../NewPersonal/addAddressDetail'); die; 
   			 }
   		$userRole    = $model->userRole($data); 
		 
   		if($userRole==0)
   				 {
   		require_once('CoronaHelpRegisterUserView.php');
   				 }
   				 else
   				 { 
   			 header('location:../CoronaHelp');	 
   				 }
   				}
   	
   	}
   	
   	  public static function moreItemDetailInfo($a=null)
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else {
   		 
   		$path = "../../../../";
   		$data=array();
   		$data['user_id']=$_SESSION['user_id'];
   		$data['eid']=cleanMe($a);
   		$model       = new CoronaHelpModel();
   		$userRole    = $model->userRole($data);
   				 if($userRole!=2)
   				 {
   					header('location:../../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   					 $phoneVerified    = $model->phoneVerified($data);
   					  $addressVerified    = $model->addressVerified($data);
   					 if($addressVerified==0)
   					 {
   						header('location:../../NewPersonal/addAddressDetail'); die; 
   					 }
   					 if($phoneVerified==0)
   					 {
   					header('location:../../StoreData/addPhoneNumber'); die;
   				
   					 }
   					 else
   					 {
   		require_once('CoronaHelpMoreItemDetailView.php');
   					 }
   				 }
   				}
   	
   	}
   	
   	  public static function addItem()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else { 
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$model       = new CoronaHelpModel();
   				$userRole    = $model->userRole($data);
   				 if($userRole==0)
   				 {
   					header('location:../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   				$addItem    = $model->addItem($data);	 
   				header('location:listItemsDetailRequired');
   				 }
   		 
   				}
   	}
   	
   	 public static function addUser()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else { 
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$model       = new CoronaHelpModel();
   				$userRole    = $model->userRole($data);
   				 if($userRole!=0)
   				 {
   					header('location:../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   				$addUser    = $model->addUser($data);	 
   				header('location:thanksRegistration');
   				 }
   		 
   				}
   	}
	
	public static function activateUser()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else { 
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$model       = new CoronaHelpModel();
   				$userRole    = $model->userRole($data);
   				 if($userRole!=0)
   				 {
   					header('location:../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   				$addUser    = $model->activateUser($data);
				if($addUser==1)
				{
   				header('location:listItemsDetailRequired');
				}
				else
				{
					header('location:../CoronaHelp');
				}
   				 }
   		 
   				}
   	}
   	
   	 public static function thanksRegistration()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../../";
   				header("location:../LoginAccount");
   				} else { 
   				$path = "../../../";
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$model       = new CoronaHelpModel();
   				$userRole    = $model->userRole($data);
   				 require_once('CoronaHelpThanksView.php');
   		 
   				}
   	}
   	
   	
   	public static function addMoreItem($a=null)
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else { 
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$data['eid']=cleanMe($a);
   				$model       = new CoronaHelpModel();
   				$userRole    = $model->userRole($data);
   				 if($userRole!=2)
   				 {
   					header('location:../../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   				$addMoreItem    = $model->addMoreItem($data);	 
   				header('location:../moreItemDetailInfo/'.$data['eid']);
   				 }
   		 
   				}
   	}
   			 public static function listPeople()
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../LoginAccount");
   							} else {
   					 
   					$path = "../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									  $addressVerified    = $model->addressVerified($data);
   										 if($addressVerified==0)
   										 {
   											header('location:../NewPersonal/addAddressDetail'); die; 
   										 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {		 
   											 $data['distance']    = $model->userDistance($data);
   											 $peopleInNeed    = $model->peopleInNeed($data);
											 
   											 $userSummary    = $model->userSummary($data);
   											require_once('CoronaHelpPeopleInNeedView.php');
   									 }
   								 }
   							}
   				
   				}	
   				
				public static function joinGroup($a=null)
				{
				$valueNew = checkLogin();
				if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else { 
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$data['gid']=cleanMe($a);
   				$model       = new CoronaHelpModel();
   				$userRole    = $model->userRole($data);
   				 if($userRole!=2)
   				 {
   					header('location:../../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
					require_once('../lib/url_shortener.php');
   					require_once('../configs/smsMandril.php');
   					require_once('../configs/testMandril.php');
   				$joinGroup    = $model->joinGroup($data);	 
   				header('location:../listGroups');
   				 }
   		 
   				}
				}	
			 public static function listGroups()
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../LoginAccount");
   							} else {
   					 
   					$path = "../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									  $addressVerified    = $model->addressVerified($data);
   										 if($addressVerified==0)
   										 {
   											header('location:../NewPersonal/addAddressDetail'); die; 
   										 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {		 
   											 require_once('../lib/url_shortener.php'); 
   											 $viewGroupList    = $model->viewGroupList($data);
   											 $userSummary    = $model->userSummary($data);
   											require_once('CoronaHelpGroupsView.php');
   									 }
   								 }
   							}
   				
   				}	
   				
			 public static function groupStatistics($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					$path = "../../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
					$data['gid']=cleanMe($a);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									  $addressVerified    = $model->addressVerified($data);
   										 if($addressVerified==0)
   										 {
   											header('location:../../NewPersonal/addAddressDetail'); die; 
   										 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {		 
   											 require_once('../lib/url_shortener.php'); 
   											 $viewGroupDetail    = $model->viewGroupDetail($data);
											 $peopleAssigenmentCompleted    = $model->peopleAssigenmentCompleted($data);
											 $totalAssigenmentCompleted    = $model->totalAssigenmentCompleted($data);
   											 $userSummary    = $model->userSummary($data);
   											require_once('CoronaHelpGroupsStatisticView.php');
   									 }
   								 }
   							}
   				
   				}	
   				
		public static function moreAssigenments($a = null)
		{
			$valueNew = checkLogin();
			if ($valueNew == 0) {
				 
				echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
				} else {
				$data=array();
				 
				$model = new CoronaHelpModel();
                $data['user_id']=$_SESSION['user_id'];
				$data['gid']=cleanMe($a);
				$moreAssigenments = $model->moreAssigenments($data);
				echo $moreAssigenments; die;
			}
			
		}

				
	 public static function groupInfo()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else {
   		 
   		$path = "../../../";
   		$data=array();
   		$data['user_id']=$_SESSION['user_id'];
   		$model       = new CoronaHelpModel();
   		$userRole    = $model->userRole($data);
   				 if($userRole!=2)
   				 {
   					header('location:../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   					 $phoneVerified    = $model->phoneVerified($data);
   					 $addressVerified    = $model->addressVerified($data);
   					 if($addressVerified==0)
   					 {
   						header('location:../NewPersonal/addAddressDetail'); die; 
   					 }
   					 
   					 if($phoneVerified==0)
   					 {
   					header('location:../StoreData/addPhoneNumber'); die;
   				
   					 }
   					 else
   					 {
					require_once('CoronaHelpGroupInfoView.php');
   					 }
   				 }
   				}
   	
   	}
   	
		 public static function addGroup()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else { 
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$model       = new CoronaHelpModel();
   				$userRole    = $model->userRole($data);
   				 if($userRole!=2)
   				 {
   					header('location:../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   				$addGroup    = $model->addGroup($data);	 
   				header('location:listGroups');
   				 }
   		 
   				}
   	}		
   				 public static function addDistance()
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../LoginAccount");
   							} else {
   					 
   					$path = "../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									  $addressVerified    = $model->addressVerified($data);
   										 if($addressVerified==0)
   										 {
   											header('location:../NewPersonal/addAddressDetail'); die; 
   										 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {
   											 $userDistance    = $model->userDistance($data);
   											 
   											require_once('CoronaHelpDistanceUpdateView.php');
   									 }
   								 }
   							}
   				
   				}	
   				
   	public static function updateDistance()
       {
   		$valueNew = checkLogin();
   			if ($valueNew == 0) {
   				$path = "../../";
   				header("location:../LoginAccount");
   				} else { 
   				$data=array();
   				$data['user_id']=$_SESSION['user_id'];
   				$model       = new CoronaHelpModel();
   				$userRole    = $model->userRole($data);
   				 if($userRole!=2)
   				 {
   					header('location:../StoreData/userAccount'); die;
   				 }
   				 else
   				 {
   				$updateDistance    = $model->updateDistance($data);	 
   				header('location:listPeople');
   				 }
   		 
   				}
   	}
   				
   				 public static function getPeople()
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							echo '<script> window.location.href="https://www.qloudid.com/user/index.php/LoginAccount"; </script>'; die;
   							} else {
   					 
   					$path = "../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$model       = new CoronaHelpModel();
   					 $peopleInNeedUpdate    = $model->peopleInNeedUpdate($data);
   											 
   					echo $peopleInNeedUpdate; die;
   									 
   								   
   							}
   				
   				}	
   			
   				
   				
   				
   				public static function listItemsRequired($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					$path = "../../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['eid']=cleanMe($a);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									  $addressVerified    = $model->addressVerified($data);
   										 if($addressVerified==0)
   										 {
   											header('location:../../NewPersonal/addAddressDetail'); die; 
   										 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {
   											 $itemList    = $model->itemList($data);
   											 $viewItemList    = $model->viewItemList($data);
   											 $itemListClaimed    = $model->itemListClaimed($data);
   											 $itemListClaimedCount    = $model->itemListClaimedCount($data);
   											 $itemListDelivered    = $model->itemListDelivered($data);
   											 $deliveryAddress    = $model->deliveryAddress($data);
   											require_once('CoronaHelpItemListView.php');
   									 }
   								 }
   							}
   				
   				}	
   				
   				public static function listItemsClaimed($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					$path = "../../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['eid']=cleanMe($a);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									  $addressVerified    = $model->addressVerified($data);
   									 if($addressVerified==0)
   									 {
   										header('location:../../NewPersonal/addAddressDetail'); die; 
   									 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {
   											 $viewGroupInformationApproved    = $model->viewGroupInformationApproved($data);
   											 $itemListClaimed    = $model->itemListClaimed($data);
   											 $countNewItemList    = $model->countNewItemList($data);
   											 $itemListClaimedCount    = $model->itemListClaimedCount($data);
   											 $deliveryAddress    = $model->deliveryAddress($data);
   											require_once('CoronaHelpClaimedItemListView.php');
   									 }
   								 }
   							}
   				
   				}	
   				public static function listItemsDelivered($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					$path = "../../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['eid']=cleanMe($a);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									 $addressVerified    = $model->addressVerified($data);
   									 if($addressVerified==0)
   									 {
   										header('location:../../NewPersonal/addAddressDetail'); die; 
   									 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {
   											  $deliveryAddress    = $model->deliveryAddress($data);
   											  
   											 $itemListDelivered    = $model->itemListDelivered($data);
											 $itemListDeliveredView    = $model->itemListDeliveredView($data);
   											require_once('CoronaHelpDeliveredItemListView.php');
   									 }
   								 }
   							}
   				
   				}	
   				
   				
   				public static function listItemsDetailRequired()
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../LoginAccount");
   							} else {
   					 
   					$path = "../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					 
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									 $addressVerified    = $model->addressVerified($data);
   									 if($addressVerified==0)
   									 {
   										header('location:../NewPersonal/addAddressDetail'); die; 
   									 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {		
   											 
   											 $itemListAdded    = $model->itemListAdded($data);
   											  
   											require_once('CoronaHelpNeedyItemListView.php');
   									 }
   								 }
   							}
   				
   				}	
   			
   			 public static function listItemsDetailDelivered($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					$path = "../../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['aid']=cleanMe($a);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									 $addressVerified    = $model->addressVerified($data);
   									 if($addressVerified==0)
   									 {
   										header('location:../../NewPersonal/addAddressDetail'); die; 
   									 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {
										  $itemListDeliveredyCheckReceived    = $model->itemListDeliveredyCheckReceived($data);
										  if($itemListDeliveredyCheckReceived['is_completed']==1)
										  {
											 header('location:../listItemsDetailReceived/'.$data['aid']); die; 
										  }
   											 $itemListDeliveredVolunteerCount    = $model->itemListDeliveredVolunteerCount($data);
   											 $itemListDeliveredVolunteer    = $model->itemListDeliveredVolunteer($data);
											  
   											 $itemListDeliveredyItemCount    = $model->itemListDeliveredyItemCount($data);
   											
   											require_once('CoronaHelpNeedyItemDeliveredListView.php');
   									 }
   								 }
   							}
   				
   				}	
   			
			
			 public static function listItemsDetailVolunteers()
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../LoginAccount");
   							} else {
   					 
   					$path = "../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					 
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									 $addressVerified    = $model->addressVerified($data);
   									 if($addressVerified==0)
   									 {
   										header('location:../NewPersonal/addAddressDetail'); die; 
   									 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {
											$itemListDelivereyCount    = $model->itemListDelivereyCount($data);
   											 $itemListDeliveredVolunteerInfo    = $model->itemListDeliveredVolunteerInfo($data);
   											  
   											 
   											require_once('CoronaHelpDeliveryVolunteerListView.php');
   									 }
   								 }
   							}
   				
   				}	
   			
			
			
   			 public static function listItemsDetailReceived($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					$path = "../../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					 $data['aid']=cleanMe($a);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									 $addressVerified    = $model->addressVerified($data);
   									 if($addressVerified==0)
   									 {
   										header('location:../../NewPersonal/addAddressDetail'); die; 
   									 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {
   											$itemListDeliveredyCheckReceived    = $model->itemListDeliveredyCheckReceived($data);
   											$itemListReceived    = $model->itemListReceived($data);
   											 
   											require_once('CoronaHelpNeedyItemReceivedListView.php');
   									 }
   								 }
   							}
   				
   				}	
   			
   			public static function listItemsDetailRejected()
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../LoginAccount");
   							} else {
   					 
   					$path = "../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					 
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../StoreData/userAccount'); die;
   							 }
   							 else
   								 {
   									 $addressVerified    = $model->addressVerified($data);
   									 if($addressVerified==0)
   									 {
   										header('location:../NewPersonal/addAddressDetail'); die; 
   									 }
   									 $phoneVerified    = $model->phoneVerified($data);
   									 if($phoneVerified==0)
   									 {
   									header('location:../StoreData/addPhoneNumber'); die;
   								
   									 }
   									 else
   									 {
   											 
   											 $itemListRejected    = $model->itemListRejected($data);
   											require_once('CoronaHelpNeedyItemRejectedListView.php');
   									 }
   								 }
   							}
   				
   				}	
   			
   			
   			public static function deliverProduct($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					
   					$data['eid']=cleanMe($a);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
							 require_once('../lib/url_shortener.php');
   							 require_once('../configs/smsMandril.php');
   							 require_once('../configs/testMandril.php');
   							 $deliverProduct    = $model->deliverProduct($data);
   							 
   							header('location:../listItemsDelivered/'.$data['eid']);
   							}
   				
   				}	
   				 
   				
   					public static function unclaimProduct($a=null,$b=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					$data['eid']=cleanMe($b);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../../StoreData/userAccount'); die;
   							 }
   							 $unclaimProduct    = $model->unclaimProduct($data);
   							 
   							header('location:../../listItemsClaimed/'.$data['eid']);
   							}
   				
   				}	
				
				 
   				
   					public static function claimProduct($a=null,$b=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../../LoginAccount");
   							} else {
   					 
   					 $path = "../../../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					$data['eid']=cleanMe($b);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../../StoreData/userAccount'); die;
   							 }
   									$addressVerified    = $model->addressVerified($data);
   									 if($addressVerified==0)
   									 {
   										header('location:../../../NewPersonal/addAddressDetail'); die; 
   									 }
   							$itemDetailInfo    = $model->itemDetailInfo($data); 
   							require_once('CoronaHelpItemClaimView.php');
   							}
   				
   				}	
   				
   				public static function claimAvailableItem($a=null,$b=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../../LoginAccount");
   							} else {
   					 
   					 $path = "../../../../../";
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					$data['eid']=cleanMe($b);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../../StoreData/userAccount'); die;
   							 }
   							$claimProduct    = $model->claimProduct($data); 
   							header('location:../../listItemsRequired/'.$data['eid']); die;
   							}
   				
   				}
   				
   				public static function receiveProduct($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
					$data['aid']=cleanMe($a);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 $receiveProduct    = $model->receiveProduct($data);
   							 
   							header('location:../listItemsDetailReceived/'.$data['aid']);
   							}
   				
   				}	
   				
   				public static function inactivateProduct($a=null,$b=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					 $data['aid']=cleanMe($b);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../../../StoreData/userAccount'); die;
   							 }
   							 $inactivateProduct    = $model->inactivateProduct($data);
   							 
   							header('location:../../listItemsDetailDelivered/'.$data['aid']);
   							}
   				
   				}	
				
				public static function  activateProduct($a=null,$b=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					 $data['aid']=cleanMe($b);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../../../StoreData/userAccount'); die;
   							 }
   							 $activateProduct    = $model->activateProduct($data);
   							 
   							header('location:../../listItemsDetailDelivered/'.$data['aid']);
   							}
   				
   				}	
				
				public static function movetoTrash($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					 
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 $movetoTrash    = $model->movetoTrash($data);
   							 
   							header('location:../listItemsDetailRejected');
   							}
   				
   				}	
				
   				
   				public static function markDelivered($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					 
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 $markDelivered    = $model->markDelivered($data);
   							 
   							header('location:../listItemsDetailReceived');
   							}
   				
   				}	
   				
   				
   				public static function markRejectRequired($a=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					 
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole==0)
   							 {
   								header('location:../../StoreData/userAccount'); die;
   							 }
   							 $markRequired    = $model->markRequired($data);
   							 
   							header('location:../listItemsDetailRejected');
   							}
   				
   				}	
   				
   				public static function markUndelivered($a=null,$b=null)
   				{
   					$valueNew = checkLogin();
   						if ($valueNew == 0) {
   							$path = "../../";
   							header("location:../../../LoginAccount");
   							} else {
   					 
   					 
   					$data=array();
   					$data['user_id']=$_SESSION['user_id'];
   					$data['pid']=cleanMe($a);
   					$data['eid']=cleanMe($b);
   					$model       = new CoronaHelpModel();
   					$userRole    = $model->userRole($data);
   							 if($userRole!=2)
   							 {
   								header('location:../../../StoreData/userAccount'); die;
   							 }
   							 $markUndelivered    = $model->markUndelivered($data);
   							 
   							header('location:../../listItemsDelivered/'.$data['eid']);
   							}
   				
   				}	
   
   }
   ?>