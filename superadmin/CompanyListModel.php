<?php
require_once('../AppModel.php');

class CompanyListModel extends AppModel
{
	function adminSummary()
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name from admin_logins where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $_SESSION['qadmin_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
	
	function countryInfo($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select is_visible,country_name from country where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	
	function appInfo($data)
	{
		 $dbCon = AppModel::createConnection();
		 $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$stmt = $dbCon->prepare("select app_icon,app_bg,app_name,is_permission,funktioner,presentation,nyheter from manage_apps_permission left join apps_detail on manage_apps_permission.app_id=apps_detail.id where manage_apps_permission.id=? order by app_name");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function companyCountVerified()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from companies where email_verification_status=1 and country_id=201");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	function companyCountUnverified()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from virtual_company where country_name=?");
        
		$cu="Sweden";
        /* bind parameters for markers */
		$stmt->bind_param("s", $cu);
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function companyDetail()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select id,company_name from companies  where email_verification_status=1 and country_id=201 order by company_name  limit 0,20");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			array_push($org,$row);
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
		function companyAppsDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		   $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		   	$stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id1=$row['app_id'];
		$stmt = $dbCon->prepare("select id,company_name from companies  where  country_id=? and id in(select company_id from compnay_app_download where permission_id=?) and id not in (select company_id from safe_qid_plan_detail where app_id=? and plan_type=2) order by company_name  limit 0,5");
        
        /* bind parameters for markers */
		$stmt->bind_param("iii", $country_id,$app_id,$app_id1);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			array_push($org,$row);
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	
		function moreCompanyAppsDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		   $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		   	$stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id1=$row['app_id'];
		   $a=$_POST['id']*5;
		   $b=5;
		$stmt = $dbCon->prepare("select id,company_name from companies  where  country_id=? and id in(select company_id from compnay_app_download where permission_id=?)  and id not in (select company_id from safe_qid_plan_detail where app_id=? and plan_type=2)  order by company_name  limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iiiii", $country_id,$app_id,$app_id1,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			$enc=$this->encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<a href="../../paymentHistory/'.$data['cid'].'/'.$data['appid'].'/'.$enc.'">
			<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">User company</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>';
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	
	
		function companyAppsPaidDetail($data)
	{
		$dbCon = AppModel::createConnection();
		 
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id=$row['app_id'];
		$stmt = $dbCon->prepare("select id,company_name from companies  where  country_id=? and id in (select company_id from safe_qid_plan_detail where app_id=? and plan_type=2) order by company_name  limit 0,5");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $country_id,$app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
		while($row = $result->fetch_assoc())
		{
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$j++;
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	
	function paymentDetail($data)
	{
		$dbCon = AppModel::createConnection();
		 
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$company_id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		$stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id=$row['app_id'];
		$stmt = $dbCon->prepare("select company_app_payment.id,company_name,amount,transection_id,company_app_payment.created_on from company_app_payment left join companies on companies.id=company_app_payment.company_id where  company_id=? and app_id=? order by company_app_payment.created_on  limit 0,5");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $company_id,$app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			array_push($org,$row);
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	
	function paymentDetailCount($data)
	{
		$dbCon = AppModel::createConnection();
		 
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$company_id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		$stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id=$row['app_id'];
		$stmt = $dbCon->prepare("select count(id) as num from company_app_payment  where  company_id=? and app_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $company_id,$app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function morePaymentDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		  $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		  $company_id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		  $stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id1=$row['app_id'];
		$a=$_POST['id']*5;
		$b=5;
		$stmt = $dbCon->prepare("select company_app_payment.id,company_name,amount,transection_id,company_app_payment.created_on from company_app_payment left join companies on companies.id=company_app_payment.company_id where  company_id=? and app_id=? order by company_app_payment.created_on  limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iiii", $company_id,$app_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			$enc=$this->encrypt_decrypt('encrypt',$row['id']);
			$org=$org.' 
			<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.date('Y-m-d',strtotime($row['created_on'])).'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['transection_id'].'</span>  
																	</div>
																	
																	<div class="fright wi_10   xs-mar0 hidden-xs">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">Amount</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['amount'].'</span>  
																	</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	
	
		function moreCompanyAppsPaidDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		   $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		   	$stmt = $dbCon->prepare("select app_id from manage_apps_permission where id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$app_id=$row['app_id'];
		   $a=$_POST['id']*5;
		   $b=5;
		$stmt = $dbCon->prepare("select id,company_name from companies  where  country_id=? and id in (select company_id from safe_qid_plan_detail where app_id=? and plan_type=2)  order by company_name  limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iiii", $country_id,$app_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			$org=$org.' <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['company_name']),0,1).'</div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">User company</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.substr(html_entity_decode($row['company_name']),0,25).'</span>  
																	</div>
																	
																	<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>
																			 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>';
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	
	function companyAppsDetailPaidCount($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		   $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$stmt = $dbCon->prepare("select count(id) as num from companies  where  country_id=? and id in(select company_id from safe_qid_plan_detail where app_id=? and plan_type=2)");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $country_id,$app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	
	function companyAppsDetailCount($data)
	{
		 $dbCon = AppModel::createConnection();
		 
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		   $app_id=$this->encrypt_decrypt('decrypt',$data['appid']);
		$stmt = $dbCon->prepare("select count(id) as num from companies  where  country_id=? and id in(select company_id from compnay_app_download where permission_id=?)   and id not in (select company_id from safe_qid_plan_detail where app_id=? and plan_type=2) ");
        
        /* bind parameters for markers */
		$stmt->bind_param("iii", $country_id,$app_id,$app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function companyDetailUnverified()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select id,company_name from virtual_company where country_name=?  order by company_name  limit 0,20");
        $cu="Sweden";
        /* bind parameters for markers */
		$stmt->bind_param("s", $cu);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			array_push($org,$row);
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	function moreCompanyDetail()
	{
		 $dbCon = AppModel::createConnection();
		$limit=$_POST['id']*20;
		$stmt = $dbCon->prepare("select id,company_name from companies  where email_verification_status=1  and country_id=201  order by company_name  limit ?,20");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			$img='';
			
				$img='<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;" >'.substr($row['company_name'],0,1).' </div>';
			
			
			$org=$org.'<tr class="style_base bg_fffbcc_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#total-all-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															
															<td class="padrbl10 brdb_new">
																'.$img.'
															</td>
															<td class="padrb10 brdb_new">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz16 xs-fsz16">
																			<a href="#" class="get-company-info1 dark_grey_txt txt_0070e0_sbh">'.$row['company_name'].'</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a"></a></div>
																	
																</div>
															</td>
														
															<td class="pad5 brdb_new ">
											<div class="dflex fxshrink_0">
												<a href="#" class="wi_70p hei_32p dflex alit_c justc_c vis_hid vis_vis_sbh vis_vis_sba brd brdrad5 bg_f dark_grey_txt">Share</a>
												<a href="#" class="wi_36p hei_32p dflex alit_c justc_c marl10 brd brdrad5 bg_f dark_grey_txt"><span class="fa fa-ellipsis-h"></span></a>
											</div>
										</td>
														</tr>';
												
														
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}	

	function moreCompanyUnverifiedDetail()
	{
		 $dbCon = AppModel::createConnection();
		$limit=$_POST['id']*20;
		$stmt = $dbCon->prepare("select id,company_name from virtual_company where country_name=? order by company_name  limit ?,20");
        $cu="Sweden";
        
        /* bind parameters for markers */
		$stmt->bind_param("si", $cu,$limit);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			$img='';
			
				$img='<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;" >'.substr($row['company_name'],0,1).' </div>';
			
			
			
			$org=$org.'<tr class="style_base bg_fffbcc_a">
															<td class="xs-dnone sm-dnone padr5 padb10">
																<input type="checkbox" class="check toggle-visited toggle-class" data-target="#not-posted-all-actions" data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
															</td>
															
															<td class="padrbl10 brdb_new">
																'.$img.'
															</td>
															<td class="padrb10 brdb_new">
																<div class="wi_100">
																	<div class="dflex alit_c">
																		<h3 class="mar0 pad0 fsz16 xs-fsz16">
																			<a href="#" class="get-company-info1 dark_grey_txt txt_0070e0_sbh">'.$row['company_name'].'</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a"></a></div>
																	
																</div>
															</td>
														
															<td class="pad5 brdb_new ">
											<div class="dflex fxshrink_0">
												<a href="#" class="wi_70p hei_32p dflex alit_c justc_c vis_hid vis_vis_sbh vis_vis_sba brd brdrad5 bg_f dark_grey_txt">Share</a>
												<a href="#" class="wi_36p hei_32p dflex alit_c justc_c marl10 brd brdrad5 bg_f dark_grey_txt"><span class="fa fa-ellipsis-h"></span></a>
											</div>
										</td>
														</tr>';
												
														
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}	

	}
