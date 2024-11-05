<?php
	require_once('../AppModel.php');
	
	class GetStartedRequestsModel extends AppModel
	{
		function sendRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id from employee_request_cloud  where user_login_id=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			print_r($row); 
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO employee_request_cloud (user_login_id, company_id, created_on) VALUES (?, ?, now())");
				
				
				$stmt->bind_param("ii", $data['user_id'],$company_id);
				$stmt->execute();
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
		function requestDetailCompany()
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$_POST['id']);
			//echo $company_id; die;
			$stmt = $dbCon->prepare("select company_name,company_email from companies where companies.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
		 	$fields=array();
			$fields['company_email']=$row['company_email'];
			//print_r($fields); die;
			$url='https://www.qmatchup.com/beta/company/index.php/ManageEmployee/verifyRequest';
			$ch = curl_init();
			//curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
			//var_dump($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			//get status code
			//echo $status_code; die;
			$result=curl_exec ($ch);
			curl_close ($ch);
			//echo $result; die;
			$stmt->close();
			$dbCon->close();
			return '<div class="padb10 ">
			<h1 class="padb5 talc fsz50">'.html_entity_decode(substr($row['company_name'],0,20)).'</h1>
			<p class="pad0 talc fsz18 padb20 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">This employer request to fetch details from your Qloud ID account</p>
			</div>
			
			<!-- Center content -->
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
			<div class="pad15 brdrad3 white_bg">
			<h2 class="marb15 fsz20 bold talc">
			
			<a href="#" class="opa90 opa1_h padrl5 fsz16 txt_9d"><span class="fa fa-question-circle"></span></a>
			</h2>
			
			
			
			
			
			<div class="mart15" id="search_data">
			
			<div class="result-item padtb20 brdb">
			<div class="dflex alit_c">
			<div class="flex_1">
			
			<div class="fsz16 dgrey_txt bold">
			<span class="marr5 valm">Details</span>
			<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
			<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
			</div>
			</div>
			<div class="fxshrink_0 dflex alit_c">
			<a href="#" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz14 white_txt" title="Save the lead"><span class="fa fa-minus"></span></a>
			<div class="wi_100p talr">
			<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
			<span></span>
			<span class="fa fa-caret-up dnone diblock_pa"></span>
			<span class="fa fa-caret-down dnone_pa"></span>
			</a>
			</div>
			</div>
			</div>
			<div class="sources-content dnone" >
			<ul class="mar0 pad0 padt10 fsz14">
			'.$result.'
			
			</ul>
			</div>
			</div>
			
			
			
			
			</div>
			
			</div>
			
			</div>
			
			<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart30"> 
			
			<a href="GetStartedRequests/sendRequest/'.$_POST['id'].'" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" >Signera med Mobilt BankId</a> 
			
			
			
			</div>';
			
			
			
			
		}
		
		
		function searchCompanyDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select company_id from company_profiles where cid=?");
			
			// print_r($web); die;
			
			$stmt->bind_param("s", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if (empty($row))
			{
				$org='<div id="search_new">
				<h3 class="pos_rel  pad25  bold fsz20 dark_grey_txt">
				No result found
				
				</h3>
				
				
				</div>';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			else
			{
				$stmt = $dbCon->prepare("select company_id,company_name,company_profiles.city,company_profiles.country,zip,address from company_profiles left join companies on companies.id=company_profiles.company_id where company_id=?");
				
				
				
				$stmt->bind_param("i", $row['company_id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				$company_id= $this -> encrypt_decrypt('encrypt',$row['company_id']);
				$org='<div id="search_new" class="lgtgrey2_bg padtrl15">
				
				<div class="result-item padtb0 lgtgrey2_bg">
				<div class="dflex alit_c">
				<div class="flex_1">
				
				<div class="fsz16 dgrey_txt bold">
				<span class="marr5 valm">Allmän</span>
				<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
				<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
				</div>
				</div>
				<div class="fxshrink_0 dflex alit_c">
				
				<div class="wi_100p talr">
				<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
				<span>Visa mer</span>
				<span class="fa fa-caret-up dnone diblock_pa"></span>
				<span class="fa fa-caret-down dnone_pa"></span>
				</a>
				</div>
				</div>
				</div>
				<div class="sources-content dnone padb20 brdb" style="display: none;">
				<ul class="mar0 pad0 padt10 fsz14 ">
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#">Company</a>
				</div>
				<span class="fxshrink_0 marrl50">'.html_entity_decode(substr($row['company_name'],0,20)).'</span>
				</li>
				
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#">Address</a>
				</div>
				<span class="fxshrink_0 marrl50">'.html_entity_decode(substr($row['address'],0,20)).'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#">City</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['city'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#">Zipcode</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['zip'].'</span>
				</li>
				<li class="dflex mart10  padb5">
				<div class="wi_50 ovfl_hid ws_now txtovfl_el">
				<a href="#">Country</a>
				</div>
				<span class="fxshrink_0 marl100">'.$row['country'].'</span>
				</li>
				
				</ul>
				</div>
				</div>
				
				
				<div class="mart0 padt15 lgtgrey2_bg">
				<label class="marb5  padl0">Select</label>
				<div class="pos_rel padb10">
				<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
				<select name="request_id" id= "request_id" class="txtind25 default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt">
				
				<option value="1">Employee</option>
				
				</select>
				</div>
				</div>
				
				
				
				</div>
				<div class="mart20">
				<input type="button" value="Connect" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="checkRequest();" />
				<input type="hidden" id="compa_id" name="compa_id" value="'.$company_id.'"/>
				
				</div>
				
				';
				
				
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			
		}
		
		
		function empSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
		
		
		
		function headerDetail()
		{
			$dbCon = AppModel::createConnection();
      		
			$stmt = $dbCon->prepare("select * from header_location");
			
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
		}
		
		
		
		
	}
?>