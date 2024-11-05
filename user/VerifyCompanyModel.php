<?php
	require_once('../AppModel.php');
	class VerifyCompanyModel extends AppModel
	{
		function updateAccount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$posted_value=json_decode($_POST['total_value'],true);
			
			
			$stmt = $dbCon->prepare("select company_email from companies where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$posted_value['company_email']=$row['company_email'];
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/updateCompanyDetail';
			
			//$fields = Array('userandcompanydata' => urlencode($data));
			//$fields[]
			/*$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($posted_value));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $posted_value);
				
				//execute post
				$result = curl_exec($ch);
				//echo curl_error($ch); 
				//close connection
			curl_close($ch); //die;*/
			
			//print_r($posted_value); die;
			if($posted_value['general']>0)
			{
				$stmt = $dbCon->prepare("update companies set company_name=?,industry=?  where id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['name'],$posted_value['l_name'],$company_id);
				$stmt->execute();
				
				$stmt = $dbCon->prepare("update company_profiles set cid=?,founded=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['ssn'],$posted_value['dob'],$company_id);
				$stmt->execute();
			}
			if($posted_value['byphone']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set phone_country=?,phone=? where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $posted_value['c_phone'],$posted_value['phone'],$company_id);
				$stmt->execute();
				
			}
			if($posted_value['bypost']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set delivery_address=?,d_city=?,d_country=?,d_zip=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssi", $posted_value['addrs1'],$posted_value['city1'],$posted_value['cntry1'],$posted_value['zip1'],$company_id);
				$stmt->execute();
				
			}
			if($posted_value['va']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set address=?,city=?,country=?,zip=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssi", $posted_value['addrs'],$posted_value['city'],$posted_value['cntry'],$posted_value['zip'],$company_id);
				$stmt->execute();
				//echo "jain"; die; 
			}
			if($posted_value['fors']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set si_address=?,si_city=?,si_country=?,si_zip=?,sd_address=?,sd_city=?,sd_country=?,sd_zip=?,vat=?   where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("sssssssssi", $posted_value['addrssi'],$posted_value['citysi'],$posted_value['cntrysi'],$posted_value['zipsi'],$posted_value['addrssd'],$posted_value['citysd'],$posted_value['cntrysd'],$posted_value['zipsd'],$posted_value['vat'],$company_id);
				$stmt->execute();
			}
			if($posted_value['forc']>0)
			{
				$stmt = $dbCon->prepare("update company_profiles set bankgiro_med=?,bankgiro_utan=?,iban=?,bic=?,bank=?,f_tax=?  where company_id=?");
				
				
				/* bind parameters for markers */
				$stmt->bind_param("ssssssi", $posted_value['bankgiro_med'],$posted_value['bankgiro_utan'],$posted_value['iban'],$posted_value['bic'],$posted_value['bank'],$posted_value['ftax'],$company_id);
				$stmt->execute();
			}
			$stmt = $dbCon->prepare("INSERT INTO company_passport_logs (company_id, created_on) VALUES (?, now())");
			$stmt->bind_param("i", $company_id);
			if( $stmt->execute())
			{
				
				$ch = curl_init();
				
				//set the url, number of POST vars, POST data
				curl_setopt($ch,CURLOPT_URL, $url);
				curl_setopt($ch,CURLOPT_POST, count($posted_value));
				curl_setopt($ch,CURLOPT_POSTFIELDS, $posted_value);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_COOKIESESSION, true);
				curl_setopt($ch, CURLOPT_REFERER, true);
				curl_setopt($ch, CURLOPT_COOKIEJAR, true);
				curl_setopt($ch, CURLOPT_COOKIEFILE, true);
				$result = curl_exec($ch);
				//echo curl_error($ch); 
				//close connection
				curl_close($ch); //die;
				
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			
		}
		
		
		function employeeAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO user_profiles (user_logins_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $data['user_id']);
				$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select ssn,address,country,city,zipcode,phone_number,clearing_number,bank_account_number,language,country_phone from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on,email  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function verificationId($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select max(id) as v_id from company_passport_logs where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$row['v_id']="";
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function partData($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select count(id) as num from companies where company_email like ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['search']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_count = $result->fetch_assoc();
			$org="";
			if($row_count['num'] > 0)
			{
				$stmt = $dbCon->prepare("select id,company_email,company_name,city from companies where company_name like ? or company_email like ? limit 0,50");
				
				/* bind parameters for markers */
				$stmt->bind_param("ss", $data['search'],$data['search']);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$i=0;
				while($row = $result->fetch_assoc())
				{
					if($row['city']=="" || $row['city']=="")
					{
						$city="-";
					}
					else
					{
						$city=$row['city'];
					}
					$cid=$this->encrypt_decrypt('encrypt',$row['id']);
					$org=$org.'<div class="result-item padtb20 brdb">
					<div class="dflex alit_c">
					<div class="flex_1">
					<h4 class="padb10 fsz14">'.$city.'</h4>
					<div class="bold fsz16 dgrey_txt">
					<span class="marr5 valm">'.$row['company_name'].'</span>
					<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
					<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
					</div>
					</div>
					<div class="fxshrink_0 dflex alit_c">
					<a href="../SendRequest/sendRequestNew/'.$cid.'" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 green_txt"><span class="fa fa-check"></span></a>
					<div class="wi_100p talr">
					<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
					<span>2 sources</span>
					<span class="fa fa-caret-up dnone diblock_pa"></span>
					<span class="fa fa-caret-down dnone_pa"></span>
					</a>
					</div>
					</div>
					</div>
					<div class="sources-content dnone">
					<ul class="mar0 pad0 padt10">
					<li class="dflex mart10">
					<div class="ovfl_hid ws_now txtovfl_el">
					<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
					</div>
					<span class="fxshrink_0 marl10">February 28, 2017 </span>
					</li>
					<li class="dflex mart10">
					<div class="ovfl_hid ws_now txtovfl_el">
					<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
					</div>
					<span class="fxshrink_0 marl10">February 28, 2017 </span>
					</li>
					</ul>
					</div>
					</div>
					';
					
				}
				
			}// print_r($row_count); die;
			
			if($row_count['num'] < 50)
			{
				$l=50-$row_count['num'];
				$stmt = $dbCon->prepare("select id,company_email,company_name,city from virtual_company where company_name like ? or  company_email like ? limit 0,?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi",$data['search'],$data['search'], $l);
				$stmt->execute();
				$result = $stmt->get_result();
				while($row = $result->fetch_assoc())
				{
					if($row['city']=="" || $row['city']=="")
					{
						$city="-";
					}
					else
					{
						$city=$row['city'];
					}
					$cid=$this->encrypt_decrypt('encrypt',$row['id']);
					$org=$org.'<div class="result-item padtb20 brdb">
					<div class="dflex alit_c">
					<div class="flex_1">
					<h4 class="padb10 fsz14">'.$city.'</h4>
					<div class="bold fsz16 dgrey_txt">
					<span class="marr5 valm">'.$row['company_name'].'</span>
					<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
					<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
					</div>
					</div>
					<div class="fxshrink_0 dflex alit_c">
					<a href="../ClaimCompany/approve/'.$cid.'" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 grey_txt" title="Save the lead"><span class="fa fa-plus"></span></a>
					<div class="wi_100p talr">
					<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
					<span>2 sources</span>
					<span class="fa fa-caret-up dnone diblock_pa"></span>
					<span class="fa fa-caret-down dnone_pa"></span>
					</a>
					</div>
					</div>
					</div>
					<div class="sources-content dnone">
					<ul class="mar0 pad0 padt10">
					<li class="dflex mart10">
					<div class="ovfl_hid ws_now txtovfl_el">
					<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
					</div>
					<span class="fxshrink_0 marl10">February 28, 2017 </span>
					</li>
					<li class="dflex mart10">
					<div class="ovfl_hid ws_now txtovfl_el">
					<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
					</div>
					<span class="fxshrink_0 marl10">February 28, 2017 </span>
					</li>
					</ul>
					</div>
					</div>';
					
				}
				
				
			}
			//print($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function partDataSearch($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from companies where company_email like ?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $data['search']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_count = $result->fetch_assoc();
			
			$a=50+(50*$data['lmt']);
			$b=$a-50;
			if($row_count['num'] > 0)
			{
				$stmt = $dbCon->prepare("select id,company_email,company_name from companies where company_name like ? or company_email like ? limit 0,?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi", $data['search'],$data['search'],$a);
				$stmt->execute();
				$result = $stmt->get_result();
				
				$i=0;
				while($row = $result->fetch_assoc())
				{
					if($row['city']=="" || $row['city']=="")
					{
						$city="-";
					}
					else
					{
						$city=$row['city'];
					}
					$cid=$this->encrypt_decrypt('encrypt',$row['id']);
					$org=$org.'<div class="result-item padtb20 brdb">
					<div class="dflex alit_c">
					<div class="flex_1">
					<h4 class="padb10 fsz14">'.city.'</h4>
					<div class="bold fsz16 dgrey_txt">
					<span class="marr5 valm">'.$row['company_name'].'</span>
					<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
					<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
					</div>
					</div>
					<div class="fxshrink_0 dflex alit_c">
					<a href="../SendRequest/sendRequestNew/'.$cid.'" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 green_txt"><span class="fa fa-check"></span></a>
					<div class="wi_100p talr">
					<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
					<span>2 sources</span>
					<span class="fa fa-caret-up dnone diblock_pa"></span>
					<span class="fa fa-caret-down dnone_pa"></span>
					</a>
					</div>
					</div>
					</div>
					<div class="sources-content dnone">
					<ul class="mar0 pad0 padt10">
					<li class="dflex mart10">
					<div class="ovfl_hid ws_now txtovfl_el">
					<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
					</div>
					<span class="fxshrink_0 marl10">February 28, 2017 </span>
					</li>
					<li class="dflex mart10">
					<div class="ovfl_hid ws_now txtovfl_el">
					<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
					</div>
					<span class="fxshrink_0 marl10">February 28, 2017 </span>
					</li>
					</ul>
					</div>
					</div>
					';
					
				}
				
			}// print_r($row_count); die;
			
			if($row_count['num'] < $a)
			{
				$l=$a-$row_count['num'];
				$stmt = $dbCon->prepare("select id,company_email,company_name from virtual_company where company_name like ? or  company_email like ? limit 0,?");
				
				/* bind parameters for markers */
				$stmt->bind_param("ssi",$data['search'],$data['search'],$l);
				$stmt->execute();
				$result = $stmt->get_result();
				while($row = $result->fetch_assoc())
				{
					if($row['city']=="" || $row['city']=="")
					{
						$city="-";
					}
					else
					{
						$city=$row['city'];
					}
					$cid=$this->encrypt_decrypt('encrypt',$row['id']);
					$org=$org.'<div class="result-item padtb20 brdb">
					<div class="dflex alit_c">
					<div class="flex_1">
					<h4 class="padb10 fsz14">'.$city.'</h4>
					<div class="bold fsz16 dgrey_txt">
					<span class="marr5 valm">'.$row['company_name'].'</span>
					<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
					<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
					</div>
					</div>
					<div class="fxshrink_0 dflex alit_c">
					<a href="../ClaimCompany/approve/'.$cid.'" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 grey_txt" title="Save the lead"><span class="fa fa-plus"></span></a>
					<div class="wi_100p talr">
					<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
					<span>2 sources</span>
					<span class="fa fa-caret-up dnone diblock_pa"></span>
					<span class="fa fa-caret-down dnone_pa"></span>
					</a>
					</div>
					</div>
					</div>
					<div class="sources-content dnone">
					<ul class="mar0 pad0 padt10">
					<li class="dflex mart10">
					<div class="ovfl_hid ws_now txtovfl_el">
					<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
					</div>
					<span class="fxshrink_0 marl10">February 28, 2017 </span>
					</li>
					<li class="dflex mart10">
					<div class="ovfl_hid ws_now txtovfl_el">
					<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
					</div>
					<span class="fxshrink_0 marl10">February 28, 2017 </span>
					</li>
					</ul>
					</div>
					</div>';
					
				}
				
				
			}
			//print($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
	}
