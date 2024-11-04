<?php
include 'CompaniesModel.php';
include 'utility.php';

class CompaniesController
{
    
    
    public function index()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../user/index.php/Login");
        } else {
            $path         = "../../";
            $model1       = new CompaniesModel();
        
            
            require_once('CompaniesView.php');
        }
    }
      public function getComp($co = null)
    {
       
			$data=array();
			 
			$data['cid']=cleanMe($co);
			//print_r($data['cid']); die;
            $model1       = new CompaniesModel();
			$getComp    = $model1->getComp($data);
            echo $getComp;
			 
        
       
    }
	
	
	   public static function companyDetail($co = null)
    {
    // header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
	  
			$data=array();
			 $valueNew = checkLogin();
        if ($valueNew == 0) {
            $data['login']= 0;
			
			
        } else {
			
           $data['login']= 1;
        }
			$data['cid']=cleanMe($co);
			//print_r($data['cid']); die;
            $model1       = new CompaniesModel();
			$companyDetail    = $model1->companyDetail($data);
            echo $companyDetail; //die;
			 
        
       
    }
	
	
	   public static function companyFullDetail($co = null)
    {
       
			$data=array();
			$value=array();
			//print_r($_GET); die;
			//$value=json_decode($_GET);
			//print_r($value); die;
			$data['cid']=cleanMe($co);
			if(!isset($_COOKIE['rememberme_qid']))
			{
			$data['email']    = cleanMe($_POST['email']);
			$data['password'] = md5($_POST['password']);
			}
            $model1       = new CompaniesModel();
			$companyDetail    = $model1->companyFullDetail($data);
            echo $companyDetail;
			 
        
       
    }
	
	public function selectState($a=null,$co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['id']=cleanMe($a);
			$data['cid']=cleanMe($co);
            $model1       = new CompaniesModel();
           
			$result    = $model1->selectState($data);
          echo $result; die;
        }
	}
	
	public function locationAdd($a=null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			
			$data['cid']=cleanMe($a);
            $model1       = new CompaniesModel();
           
			$result    = $model1->locationAdd($data);
          header("location:../../LocationList/locationAccount/".$data['cid']);
        }
	}
	
	
	public function selectCity($a=null,$co = null)
    {
         $valueNew = checkLogin();
        if ($valueNew == 0) {
            $path = "../../";
            header("location:../../../../user/index.php/LoginAccount");
        } else {
			$data=array();
			
			$data['user_id']=$_SESSION['user_id'];
			$data['id']=cleanMe($a);
			$data['cid']=cleanMe($co);
            $model1       = new CompaniesModel();
           
			$result    = $model1->selectCity($data);
          echo $result; die;
        }
	}
	
	 public function selectJobFunction($co = null)
    {
        $stModel = new CompaniesModel();
        if (isset($co)) {
            
            $val         = cleanMe($co);
            $resultState = $stModel->selectJobFunction($val);
			$resultJob = $stModel->selectJob();
        }
		 $option1 = '<option value="" >-- Select --</option>';
        foreach ($resultJob as $stateCategory => $StateValue) {
            $stateCategory = htmlspecialchars($stateCategory);
			if($StateValue['id']==$val )
			{
            $option1        = $option1 . '<option value="' . $StateValue['id'] . '" selected>' . $StateValue['job_family'] . '</option>';
			}
			else 
			{
				$option1        = $option1 . '<option value="' . $StateValue['id'] . '">' . $StateValue['job_family'] . '</option>';
			}
        }
		
        $option = '<option value="" >-- Select --</option>';
        foreach ($resultState as $stateCategory => $StateValue) {
            $stateCategory = htmlspecialchars($stateCategory);
            $option        = $option . '<option value="' . $StateValue['id'] . '">' . $StateValue['job_function'] . '</option>';
        }
		
		$output="";
        $output=$output.'<li>
					<div class="txlabel">Job Family:</div>
                        <div  class="txtfield">
					
                                        <select  class="job_name" name="job_family[]" id="job_family[]" onchange="job_family1(this.value,this);">
										'.$option1.'
                                        </select>
										
										</div>
                                    </li>
									
									<li class="midd">
								<div class="txlabel">Job Function:</div>
								<div  class="txtfield">
								
                                        <select class="job_jain"  name="job_function[]" id="job_function[]" onchange="job_function1(this.value,this);">
										<div id="app">
									'.$option.'
										</div>
                                            
                                        </select>
										</div>
                                    </li>
									
									  <li>
										<div class="txlabel">Position</div>
										<div  class="txtfield">
										<select class="job_jain1" name="pos_name[]" id="pos_name[]" >
										
										</select>
										
										</div>
									  </li>  ';
        echo $output; die;
    }
    
    
    public function selectJobPosition($c = null)
    {
        $stModel = new CompaniesModel();
        if (isset($c)) {
            
            $val         = cleanMe($c);
            $resultState = $stModel->selectJobFunctionVal($val);
			$resultPosition = $stModel->selectJobPosition($val);
			$resultJob = $stModel->selectJob();
			$jobFamilyVal = $stModel->selectJobFamilyVal($val);
        }
		 $option1 = '<option value="" >-- Select --</option>';
        foreach ($resultJob as $stateCategory => $StateValue) {
            $stateCategory = htmlspecialchars($stateCategory);
			if($StateValue['id']==$jobFamilyVal['job_family_id'] )
			{
            $option1        = $option1 . '<option value="' . $StateValue['id'] . '" selected>' . $StateValue['job_family'] . '</option>';
			}
			else 
			{
				$option1        = $option1 . '<option value="' . $StateValue['id'] . '">' . $StateValue['job_family'] . '</option>';
			}
        }
		
        $option = '<option value="" >-- Select --</option>';
		
        foreach ($resultState as $stateCategory => $StateValue) {
            $stateCategory = htmlspecialchars($stateCategory);
			if($StateValue['id']==$val )
			{
            $option        = $option . '<option value="' . $StateValue['id'] . '" selected>' . $StateValue['job_function'] . '</option>';
			}
			else
			{
				$option        = $option . '<option value="' . $StateValue['id'] . '" >' . $StateValue['job_function'] . '</option>';
			}
        }
		
		$option2 = '<option value="" >-- Select --</option>';
        foreach ($resultPosition as $stateCategory => $StateValue) {
           
			
				$option2        = $option2 . '<option value="' . $StateValue['id'] . '">' . $StateValue['job_position'] . '</option>';
			
        }
		
		
		$output="";
        $output=$output.'<li>
					<div class="txlabel">Job Family:</div>
                        <div  class="txtfield">
					
                                        <select  class="job_name" name="job_family[]" id="job_family[]" onchange="job_family1(this.value,this);">
										'.$option1.'
                                        </select>
										
										</div>
                                    </li>
									
									<li class="midd">
								<div class="txlabel">Job Function:</div>
								<div  class="txtfield">
								
                                        <select class="job_jain"  name="job_function[]" id="job_function[]" onchange="job_function1(this.value,this);">
										<div id="app">
									'.$option.'
										</div>
                                            
                                        </select>
										</div>
                                    </li>
									
									  <li>
										<div class="txlabel">Position</div>
										<div  class="txtfield">
										<select class="job_jain1" name="pos_name[]" id="pos_name[]" >
										'.$option2.'
										</select>
										
										</div>
									  </li>  ';
        echo $output; 
    }
    
    
    
}


?>