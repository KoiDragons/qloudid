<?php
require_once 'LoginAccountModel.php';
require_once '../configs/utility.php';
class LoginAccountController
{
    public static function loginInfo($a = null)
    {
        $valueNew = checkLogin();
        $data = array();
        $data['cid'] = cleanMe($a);

        if ($valueNew == 0)
        {
            $path = "../../../../";
            require_once ('LoginDetailAccountView.php');
        }
        else
        {

            header("location:https://www.safeqloud.com/company/index.php/NoffaAlarm/listChildren/" . $data['cid']);
        }
    }

    public static function loginAccountNoffa($a = null)
    {

        $model = new LoginAccountModel();
        if (isset($_POST['username']) && isset($_POST['password'])) $data = array();
        $data['cid'] = cleanMe($a);
        $expire = time() + 60 * 60;

        $data['email'] = cleanMe($_POST['username']);
        $data['password'] = md5($_POST['password']);

        $result = $model->LoginAccount($data);
        if ($result['result'] == 3)
        {
            start_Session($result['id']);
            $data['user_id'] = $result['id'];
            header("location:https://www.safeqloud.com/company/index.php/NoffaAlarm/listChildren/" . $data['cid']);

        }

        else
        {
            $path = "../../../../";
            require_once ('LoginDetailAccountView.php');
        }
    }

    public static function getLogin()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";
            require_once ('LoginAccountApiView.php');
        }
    }

    public static function index()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../";

            if (isset($_GET['next']))
            {
                $data = array();
                $data['client'] = $_GET['next'];
                if (isset($_GET['apply']))
                {
                    $data['apply'] = $_GET['apply'];
                }
                else if (isset($_GET['purchase']))
                {
                    $data['purchase'] = $_GET['purchase'];
                }
                else if (isset($_GET['login']))
                {
                    $data['login'] = $_GET['login'];
                }
            }

            require_once ('LoginAccountView.php');
        }
        else
        {

            if (isset($_GET['next']))
            {
                //echo $_GET['apply']; die;
                if (isset($_GET['apply']))
                {
                    if ($_GET['apply'] == 1)
                    {
                        header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&apply=1");
                    }
                    else
                    {
                        header("location:https://www.safeqloud.com/walk/authorize_user.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&apply=2&job_id=" . $_GET['job_id']);
                    }

                    die;
                }
                else if (isset($_GET['purchase']))

                {
                    header("location:../../walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&purchase=1");
                    die;
                }
                else if (isset($_GET['login']))

                {
                    header("location:../../walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&login=1");
                    die;
                }
                else
                {
                    header("location:../../walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz");
                    die;
                }

                //setcookie('rememberme', $result['cookie'], $expire,'/'); exit(0);
                
            }
            else
            {
                header("location:ReceivedRequest");
                //setcookie('rememberme', $result['cookie'],$expire,'/'); //exit(0);
                
            }
        }
    }

    public static function loginapp()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";
            if (isset($_GET['next']))
            {
                $data = array();
                $data['client'] = $_GET['next'];
                if (isset($_GET['apply']))
                {
                    $data['apply'] = $_GET['apply'];
                }
                else if (isset($_GET['purchase']))
                {
                    $data['purchase'] = $_GET['purchase'];
                }
                else if (isset($_GET['login']))
                {
                    $data['login'] = $_GET['login'];
                }
            }
			$data1=array();
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
			if (isset($_GET['demo']))
                {
                   require_once ('LoginAppDemoQrView.php'); die;
                }
				else
            require_once ('LoginAppQrView.php');
        }
        else
        {
            if (isset($_GET['next']))
            {
                
                if (isset($_GET['apply']))
                {
                    if ($_GET['apply'] == 1)
                    {
                        header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&apply=1");
                    }
                    else
                    {
                        header("location:https://www.safeqloud.com/walk/authorize_user.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&apply=2&job_id=" . $_GET['job_id']);
                    }

                    die;
                }
                else if (isset($_GET['purchase']))

                {
                    header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&purchase=1");
                    die;
                }
				else if (isset($_GET['signin']))

                {
                    header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&signin=1");
                    die;
                }
                else if (isset($_GET['login']))

                {
                    header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&login=1");
                    die;
                }
                else
                {
                    header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz");
                    die;
                }

                 
                
            }
            else
            {
                header("location:../ReceivedRequest");
            }
        }
    }
	
	
	
	
	 public static function selectProfile()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";
            header('location:emailLogin');
        }
        else
        {
			$path = "../../../";
            $data = array();
            $data['user_id']=$_SESSION['user_id'];
			  
            $model = new LoginAccountModel();
			$userDetail = $model->userDetail($data); 
			require_once ('LoginAccountSelectProfileView.php');
            }
            
           
    }
	

	 public static function selectEmployer()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";
            header('location:emailLogin');
        }
        else
        {
			 $path = "../../../";
              $data = array();
              $data['user_id']=$_SESSION['user_id'];
			  
               $model = new LoginAccountModel();
			   $userDetail = $model->userDetail($data); 
			   
				$listEmployers = $model->listEmployers($data); 
			if(count($listEmployers)==1)
			{
				header('location:https://www.safeqloud.com/company/index.php/CompanySuppliers/companyProfileAction/'.$listEmployers[0]['enc']); die;
			}
				require_once ('LoginAccountEmployerView.php');
            }
            
           
    }
	
 public static function emailLogin()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
			$model = new LoginAccountModel();
            $path = "../../../";
            if (isset($_GET['redirect']))
            {
                $data = array();
                $data['redirect'] = $_GET['redirect'];
                
				$decodeRedirect = $model->decodeRedirect($data);
            }
			$countryOption = $model->countryOption(); 
            require_once ('LoginAccountEmailView.php');
        }
        else
        {
            if (isset($_GET['redirect']))
            {
                $data = array();
                $data['redirect'] = $_GET['redirect'];
               $model = new LoginAccountModel();
				$decodeRedirect = $model->decodeRedirect($data); 
				header("location:".$decodeRedirect);
            }
            
            else
            {
                header("location:selectProfile");
            }
        }
    }
	
	
	 public static function verifyEmailOtp()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";
			$data = array();
			$model = new LoginAccountModel();
            if (isset($_GET['redirect']))
            {
                
                $data['redirect'] = $_GET['redirect'];
                
				$decodeRedirect = $model->decodeRedirect($data);
            }
			 if(!isset($_POST['pnumber']))
			 {
				 if (isset($_GET['redirect']))
					{
				 header('location:emailLogin?'.$_GET['redirect']);
					}
					else
					{
					header('location:emailLogin');	
					}
			 }
			 $userAccountInfo = $model->userAccountInfo($data);
            require_once ('LoginAccountEmailOtpView.php');
        }
        else
        {
            if (isset($_GET['redirect']))
            {
                $data = array();
                $data['redirect'] = $_GET['redirect'];
               $model = new LoginAccountModel();
				$decodeRedirect = $model->decodeRedirect($data); 
				header("location:".$decodeRedirect);
            }
            
            else
            {
                header("location:selectProfile");
            }
        }
    }
	
	
public static function verifyEmailAccount($a=null)
    {
         
            $path = "../../../../";
            $data=array();
			$data['cid']=cleanMe($a); 
            $model = new LoginAccountModel();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
		 require_once('../configs/smsMandril.php');
            $verifyEmailAccount = $model->verifyEmailAccount();
           echo $verifyEmailAccount; die;
        
      }
	  
	public static function verifyEmailOtpDetail($a=null)
    {
         
            $path = "../../../../";
            $data=array();
			$data['cid']=cleanMe($a); 
            $model = new LoginAccountModel();
			require_once('../lib/url_shortener.php');
			require_once('../configs/testMandril.php');
            $verifyEmailOtp = $model->verifyEmailOtp();
           echo $verifyEmailOtp; die;
        
      }
	  
	   public static function verifyUserlogin()
    {

        $model = new LoginAccountModel();
        $data = array();
        $expire = time() + 60 * 60;
		$data['email'] = cleanMe($_POST['email']);
        $result = $model->LoginEmailAccount($data);
		 
		 
        if(isset($_GET['redirect']))
            {
                $data = array();
                $data['redirect'] = $_GET['redirect'];
               $model = new LoginAccountModel();
				$decodeRedirect = $model->decodeRedirect($data); 
				header("location:".$decodeRedirect);
            }
            
            else
            {
                header("location:selectProfile");
            }
    }

	  
	  
	public static function loginPurchase($a=null)
    {
         
            $path = "../../../../";
            $data=array();
			$data['cid']=cleanMe($a); 
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
            require_once ('LoginPurchaseQrView.php');
        
      }
	  
	  public static function bookHotel($a=null)
    {
         
            $path = "../../../../../../";
            $data=array();
			$data['id']=cleanMe($a); 
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
			$hotelPrice = $model->hotelPrice($data);
			if(isset($_GET['client_id']))
			{
			 require_once ('LoginBookHotelQrVerifyView.php');
			}
			else
			{
			  require_once ('LoginBookHotelQrView.php');	
			}				
          
        
      }
	  
	  public static function verifyCheckin($a=null)
    {
        
            $path = "../../../../../../";
            $data=array();
			$data['id']=cleanMe($a); 
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
			if(isset($_GET['client_id']))
			{
				 
            require_once ('LoginCheckinHotelQrVerifyView.php');
			}
			else
			{
			  require_once ('LoginVerifyCheckinHotelQrView.php');	
			}	
      }
	  
	  
	   public static function checkinDependent($a=null)
    {
        
            $path = "../../../../../../";
            $data=array();
			$data['id']=cleanMe($a); 
            $model = new LoginAccountModel($data['id']);
            $verifyIP = $model->verifyIP();
			$guestDetailInfo = $model->guestDetailInfo($data);
			if($guestDetailInfo==0)
			{
				header('location:https://dstricts.com/user/index.php/HotelInfo'); die;
			}
			  require_once ('LoginVerifyCheckinDependentQrView.php');	
			
      }
	  
	  
	  public static function payForDishes($a=null)
    {
        
            $path = "../../../../../../";
            $data=array();
			$data['id']=cleanMe($a); 
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
			
			  require_once ('LoginVerifyPayForDishesView.php');	
			
      }
	  
	  public static function loginPurchaseVerify()
    {
         
            $path = "../../../../../";
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
            require_once ('LoginPurchaseVerifyQrView.php');
        
      }
	  
	   public static function loginPurchaseSignin()
    {
         $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../../../";
            $model = new LoginAccountModel();
            $loginPurchaseSignin = $model->loginPurchaseSignin();
           header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=".$_GET['client_id']."&state=xyz&purchase=1&apply=1"); die;
        }
		else
		{
			 header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=".$_GET['client_id']."&state=xyz&purchase=1&apply=1"); die;
		}
      }
	  
	  
	  public static function signInDocument()
    {
         
            $path = "../../../";
            if (isset($_GET['client_id']))
            {
                $data = array();
                $data['client'] = $_GET['client_id'];
                if (isset($_GET['apply']))
                {
                    $data['apply'] = $_GET['apply'];
                }
                else if (isset($_GET['purchase']))
                {
                    $data['purchase'] = $_GET['purchase'];
                }
				 else if (isset($_GET['signin']))
                {
                    $data['signin'] = $_GET['signin'];
                }
                else if (isset($_GET['login']))
                {
                    $data['login'] = $_GET['login'];
                }
            }
			 
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
            require_once ('LoginAppSignInQrView.php');
        
      }

	 
	
	public static function loginPurchaseAccount()
    {
           $model = new LoginAccountModel();
		     
            $loginPurchaseAccount = $model->loginPurchaseAccount();
			  
            if ($loginPurchaseAccount['result'] == 0)
            {
				header("location:https://www.safeqloud.com/user/index.php/LoginAccount/purchasetimeout?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&purchase=1");
                        die;
               
			
               
			}
            else
            {
				$path='../../';
               $sellerCompany = $model->sellerCompany(); 
			   
              require_once('LoginPurchaseRedirect.php');          
				 
            }
       
    
	}
	
	
	public static function loginSignDocument()
    {
           $model = new LoginAccountModel();
		     
            $loginSignDocument = $model->loginSignDocument();
			  
            
				$path='../../';
               $sellerCompany = $model->sellerCompany(); 
			    
              require_once('LoginPurchaseRedirect.php');          
			
       
    
	}
	
	public static function sellerCompany()
    {
           $model = new LoginAccountModel();
		     
            print_r($_GET);
               $sellerCompany = $model->sellerCompany(); 
			   print_r($sellerCompany); die;
               
    
	}
	
	  public static function purchasetimeout()
    {
         
            $path = "../../../";
            if (isset($_GET['next']))
            {
                $data = array();
                $data['client'] = $_GET['next'];
                if (isset($_GET['apply']))
                {
                    $data['apply'] = $_GET['apply'];
                }
                else if (isset($_GET['purchase']))
                {
                    $data['purchase'] = $_GET['purchase'];
                }
                else if (isset($_GET['login']))
                {
                    $data['login'] = $_GET['login'];
                }
            }
            $model = new LoginAccountModel();
            
            require_once ('LoginAppPurchaseTimeOutView.php');
        
         }

	  public static function timeout()
    {
         
            $path = "../../../";
            if (isset($_GET['next']))
            {
                $data = array();
                $data['client'] = $_GET['next'];
                if (isset($_GET['apply']))
                {
                    $data['apply'] = $_GET['apply'];
                }
                else if (isset($_GET['purchase']))
                {
                    $data['purchase'] = $_GET['purchase'];
                }
                else if (isset($_GET['login']))
                {
                    $data['login'] = $_GET['login'];
                }
				 
            }
            $model = new LoginAccountModel();
            
            require_once ('LoginAppTimeOutViewNew.php');
        
         }

    public static function loginAppAccount()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";

            $model = new LoginAccountModel();
            $loginAppAccount = $model->loginAppAccount();
            if ($loginAppAccount == 1)
            {
                if (isset($_GET['next']))
                {

                    if (isset($_GET['apply']))
                    {
                        if ($_GET['apply'] == 1)
                        {
                            header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&apply=1");
                        }
                        else
                        {
                            header("location:https://www.safeqloud.com/walk/authorize_user.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&apply=2&job_id=" . $_GET['job_id']);
                        }

                        die;
                    }
                    else if (isset($_GET['purchase']))

                    {
                        header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&purchase=1");
                        die;
                    }
                    else if (isset($_GET['login']))

                    {
                        header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&login=1");
                        die;
                    }
					else if (isset($_GET['login']))

                    {
                        header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&hotel=1");
                        die;
                    }
					else if (isset($_GET['signin']))

                    {
                        header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&signin=1");
                        die;
                    }
                    else
                    {
                        header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz");
                        die;
                    }

                }
                else
                {
                    header("location:../ReceivedRequest");
                }
            }
            else
            {
                if (isset($_GET['next']))
                {
                    //echo $_GET['apply']; die;
                    if (isset($_GET['apply']))
                    {
                        if ($_GET['apply'] == 1)
                        {
                            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/timeout?next=" . $_GET['next'] . "&state=xyz&apply=1");
                        }
                        else
                        {
                            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/timeout?next=" . $_GET['next'] . "&state=xyz&apply=2&job_id=" . $_GET['job_id']);
                        }

                        die;
                    }
                    else if (isset($_GET['purchase']))

                    {
                        header("location:https://www.safeqloud.com/user/index.php/LoginAccount/timeout?next=" . $_GET['next'] . "&state=xyz&purchase=1");
                        die;
                    }
                    else if (isset($_GET['login']))

                    {
                        header("location:https://www.safeqloud.com/user/index.php/LoginAccount/timeout?next=" . $_GET['next'] . "&state=xyz&login=1");
                        die;
                    }
					 else if (isset($_GET['signin']))

                    {
                        header("location:https://www.safeqloud.com/user/index.php/LoginAccount/timeout?next=" . $_GET['next'] . "&state=xyz&signin=1");
                        die;
                    }
                    else
                    {
                        header("location:https://www.safeqloud.com/user/index.php/LoginAccount/timeout?next=" . $_GET['next'] . "&state=xyz");
                        die;
                    }

                    
                    
                }
				else
				{
				 header("location:timeout");	
				}
            }
        }
        else
        {

            header("location:../ReceivedRequest");
        }
    }

	public static function loginAppThanks()
    {
        if(isset($_POST['ip']))
		{
		 $path = "../../../";

            $model = new LoginAccountModel();
            $loginAppAccount = $model->loginAppThanks();
            require_once ('LoginAppThanksView.php');
            	
		}
		else
        {

            header("location:https://www.safeqloud.com/user/index.php/LoginAccount/loginapp?demo=true");
        }
    }

	
	
 public static function loginAppBusiness()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";
			$data1=array();
            $model = new LoginAccountModel();
            $verifyIP = $model->verifyIP();
			require_once ('LoginAppBusinessView.php');
        }
        else
        {
           
         header("location:../Arbetsplats/minArbetsplats");
            
        }
    }

	public static function loginAppAccountBusiness()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";

            $model = new LoginAccountModel();
            $loginAppAccount = $model->loginAppAccount();
            if ($loginAppAccount == 1)
            {
                
                    header("location:../Arbetsplats/minArbetsplats");
               
            }
            else
            {
                
				 header("location:timeout");	
				
            }
        }
        else
        {

            header("location:../Arbetsplats/minArbetsplats");
        }
    }

    public static function ssnInfoLogin()
    {
        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";
            $model = new LoginAccountModel();
            $resultContry = $model->countryOption();
            require_once ('LoginAccountSSNView.php');
        }
        else
        {

            header("location:../ReceivedRequest");

        }
    }

    public static function verifyUserSSN()
    {

        $model = new LoginAccountModel();
        require_once ('../configs/smsMandril.php');
        $verifyUserSSN = $model->verifyUserSSN();
        echo $verifyUserSSN;
        die;

    }
    public static function verifyOtp()
    {
        $model = new LoginAccountModel();
        $verifyOtp = $model->verifyOtp();

        echo $verifyOtp;
        die;

    }

    public static function loginUser()
    {
        //print_r($_POST); //die;
        if (isset($_POST['email']) && isset($_POST['password']))
        {
            $model = new LoginAccountModel();
            $data = array();

            $data['email'] = cleanMe($_POST['email']);
            $data['password'] = md5($_POST['password']);

            $result = $model->LoginAccount($data);
            //echo $result; die;
            if ($result['result'] == 0 || $result['result'] == 1)
            {
                echo 0;
            }
            else if ($result['result'] == 3)
            {
                if (isset($_SESSION['rememberme']))
                {
                    setcookie('rememberme', $_SESSION['rememberme'], time() + (30 * 60 * 60 * 24) , '/', "safeqloud.com");
                }
                echo 1;
                //die;
                
            }
            exit();

        }

        $valueNew = checkLogin();
        if ($valueNew == 0)
        {
            $path = "../../../";

            if (isset($_GET['next']))
            {
                $data = array();
                $data['client'] = $_GET['next'];
                if (isset($_GET['apply']))
                {
                    $data['apply'] = $_GET['apply'];
                }
            }

            require_once ('LoginAjaxView.php');
        }
    }

    public static function loginApi()
    {

        $model = new LoginAccountModel();

        $data = array();
        $expire = time() + 60 * 60;
        $data = json_decode(file_get_contents('php://input') , true);

        $data['email'] = cleanMe($data['Username']);
        $data['password'] = md5($data['Password']);

        $result = $model->LoginMobileAccount($data);
        $dataOut = json_encode($result, true);

        print_r($dataOut);

        die;

    }

    public static function loginAccount($a = null, $b = null, $c = null)
    {

        $model = new LoginAccountModel();
        if (isset($_POST['username']) && isset($_POST['password'])) $data = array();
        $expire = time() + 60 * 60;
        if (isset($_GET['next']))
        {
            $data['client'] = $_GET['next'];
        }
        $data['email'] = cleanMe($_POST['username']);
        $data['password'] = md5($_POST['password']);

        $result = $model->LoginAccount($data);
        //print_r($result); die;
        $path = "../../../";
        if ($result['result'] == 1)
        {
            $warning = warning(0);
            if (isset($_GET['next']))
            {
                if (isset($_GET['apply']))
                {
                    if ($_GET['apply'] == 1)
                    {
                        header("location:../LoginWrong?next=" . $data['client'] . "&apply=1");
                    }
                    else
                    {
                        header("location:../LoginWrong?next=" . $data['client'] . "&apply=2");
                    }
                }
                else if (isset($_GET['purchase']))

                {
                    header("location:../LoginWrong?next=" . $data['client'] . "&purchase=1");
                    die;
                }
                else if (isset($_GET['login']))

                {
                    header("location:../LoginWrong?next=" . $data['client'] . "&login=1");
                    die;
                }

                else
                {
                    header("location:../LoginWrong?next=" . $data['client']);
                }
            }
            else
            {
                header("location:../LoginWrong");
            }
        }
        else if ($result['result'] == 0)
        {
            require_once ('LoginErrorView.php');
        }
        else if ($result['result'] == 2)
        {
            start_Session($result['id']);
            header("location:../StoreData/userAccount");
        }
        else if ($result['result'] == 3)
        {
            start_Session($result['id']);
            if (isset($_GET['next']))
            {
                //echo $_GET['apply']; die;
                if (isset($_GET['apply']))
                {
                    if ($_GET['apply'] == 1)
                    {
                        header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&apply=1");
                    }
                    else
                    {
                        header("location:https://www.safeqloud.com/walk/authorize_user.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&apply=2");
                    }

                    die;
                }
                else if (isset($_GET['purchase']))

                {
                    header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&purchase=1");
                    die;
                }
                else if (isset($_GET['login']))

                {
                    header("location:https://www.safeqloud.com/walk/authorize.php?response_type=code&client_id=" . $_GET['next'] . "&state=xyz&login=1");
                    die;
                }
                else
                {
                    header("location:../../../walk/authorize.php?response_type=code&client_id=" . $data['client'] . "&state=xyz");
                }
                //setcookie('rememberme', $result['cookie'], $expire,'/'); exit(0);
                
            }
            else
            {
                $data['user_id'] = $result['id'];
                $phoneVerified = $model->phoneVerified($data);
                if ($phoneVerified == 0)
                {
                    header('location:../StoreData/addPhoneNumber');
                    die;

                }
                else
                {
                    header("location:../ReceivedRequest");
                }

            }
        }
        else if ($result['result'] == 4)
        {
            $warning = warning(2);

            header("location:https://www.safeqloud.com/user/index.php/VerifyEmail/verifyEmailAccount/" . $data['email']);
            //setcookie('rememberme', $result['cookie'],$expire, '/'); exit(0);
            
        }
        else if ($result['result'] == 5)
        {
            $warning = warning(3);

            header("location:../LoginWrong");

        }
    }

    public static function loginSSNAccount($a = null, $b = null, $c = null)
    {

        $model = new LoginAccountModel();

        $data = array();
        $expire = time() + 60 * 60;

        $result = $model->LoginSSNAccount($data);
        //print_r($result); die;
        if ($result['result'] == 0)
        {
            require_once ('LoginErrorView.php');
        }
        else if ($result['result'] == 2)
        {
            start_Session($result['id']);
            header("location:../StoreData/userAccount");
        }
        else if ($result['result'] == 3)
        {
            start_Session($result['id']);

            header("location:../ReceivedRequest");

        }
        else if ($result['result'] == 4)
        {
            $warning = warning(2);

            header("location:https://www.safeqloud.com/user/index.php/VerifyEmail/verifyEmailAccount/" . $data['email']);
            //setcookie('rememberme', $result['cookie'],$expire, '/'); exit(0);
            
        }

    }

}

?>
