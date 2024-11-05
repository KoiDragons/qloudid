<?php
require_once 'FriendFinderModel.php';
require_once '../configs/utility.php';
require_once('../AppModel.php');
class FriendFinderController
{
    
    
    public static function index()
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) 
				{
				$path = "../../";
				header("location:LoginAccount");
				} 
				else 
				{
				$path = "../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new FriendFinderModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
			$friendFinderUserStart    = $model1->friendFinderUserStart($data);
			$data['user_passion']=$friendFinderUserStart['user_passion'];
			$data['count']=count(explode(',',$friendFinderUserStart['user_passion']))-1;
			
			$data['sexual_orientation']=$friendFinderUserStart['sexual_orientation'];
			$data['counts']=count(explode(',',$friendFinderUserStart['sexual_orientation']))-1;
			$userSummary    = $model1->userSummary($data);
			$userPassion    = $model1->userPassion($data);
			$sexualOrientation    = $model1->sexualOrientation($data);
			require_once('FriendFinderView.php');
				}
	}
	
	
	  public static function preference()
    {
		$valueNew = checkLogin();
			if ($valueNew == 0) 
				{
				$path = "../../";
				header("location:../LoginAccount");
				} 
				else 
				{
				$path = "../../../";
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				 
				$model1       = new FriendFinderModel();
				$appId    = $model1->appId($data);
				$appdownloadStatus    = $model1->appdownloadStatus($data);
				if($appdownloadStatus==0)
				{
					$getPermissionDetail    = $model1->getPermissionDetail($data);
					header('location:../NewsfeedDetail/productPage/'.$getPermissionDetail);
					die;
				}
				$friendFinderUserStart    = $model1->friendFinderUserStart($data);
				if($friendFinderUserStart['is_completed']==0)
				{
				header('location:../FriendFinder');
					die;	
				}
			$friendFinderUserStart    = $model1->friendFinderUserPreference($data);
			 
			$data['user_passion']=$friendFinderUserStart['user_passion_preferred'];
			$data['count']=count(explode(',',$friendFinderUserStart['user_passion_preferred']))-1;
			  
			$userSummary    = $model1->userSummary($data);
			$userPassion    = $model1->userPassion($data);
			 
			require_once('FriendFinderPreferenceView.php');
				}
	}
	
	 
	public static function updateInfo()
		{
			$valueNew = checkLogin();  
			if ($valueNew == 0) 
				{
				$path = "../../";
				header("location:../LoginAccount");
				} 
				else 
				{
				  
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model       = new FriendFinderModel();
				$updateInfo = $model->updateInfo($data);	
				header("location:../FriendFinder");
			}	
		} 
	
public static function updatePreferenceInfo()
		{
			$valueNew = checkLogin();  
			if ($valueNew == 0) 
				{
				$path = "../../";
				header("location:../LoginAccount");
				} 
				else 
				{
				  
				$data=array();
				$data['user_id']=$_SESSION['user_id'];
				
				$model       = new FriendFinderModel();
				$updatePreferenceInfo = $model->updatePreferenceInfo($data);
 				
				header("location:../FriendFinder");
			}	
		} 
}
?>