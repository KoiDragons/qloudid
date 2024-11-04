<?php
require_once('../AppModel.php');

class TravelAppModel extends AppModel
{
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
	 
	
	function travelAppCompany($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select company_id,company_name from travel_app_company left join companies on companies.id=travel_app_company.company_id where travel_app_company.country_id=? and emergency_id=? limit 0,5");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $country_id,$emergency_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
		while($row = $result->fetch_assoc())
		{
			array_push($org,$row);
			$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$j++;
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	function travelAppCompanyLocationCheck($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 $company_id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		  
		$stmt = $dbCon->prepare("select id from property_location where company_id=? and id not in (select location_id from travel_app_company_emergency_locations   where travel_app_company_emergency_locations.country_id=? and emergency_id=?)");
        
        /* bind parameters for markers */
		$stmt->bind_param("iii",$company_id, $country_id,$emergency_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		$j=0;
		while($row = $result->fetch_assoc())
		{
		$stmt = $dbCon->prepare("insert into travel_app_company_emergency_locations(emergency_id,country_id, company_id,location_id) values(? , ?, ?, ?)");
        
        
		$stmt->bind_param("iiii", $emergency_id,$country_id,$company_id, $row['id']);
        $stmt->execute();	
		}
		$stmt->close();
        $dbCon->close();
		 return 1;
	}
	
	function travelAppCompanyLocationActiveCount($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 $company_id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		  
		$stmt = $dbCon->prepare("select count(id) as num from travel_app_company_emergency_locations where travel_app_company_emergency_locations.country_id=? and emergency_id=? and is_active=1 and company_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iii", $country_id,$emergency_id,$company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row['num'];
	}
	
	
	function updateEmergencyService($data)
	{
		 $dbCon = AppModel::createConnection();
		  if($_POST['emergency_location_id_status']==0)
		  {
			$active_status=1;	  
		  }
		  else
		  {
			$active_status=0;	  
		  }
		$stmt = $dbCon->prepare("update travel_app_company_emergency_locations set is_active=? where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii",$active_status,$_POST['emergency_location_id']);
        $stmt->execute();
       $stmt->close();
        $dbCon->close();
		 return 1;
	}
	
	
	function updateAllupdateEmergencyService($data)
	{
		 $dbCon = AppModel::createConnection();
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 $company_id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		$stmt = $dbCon->prepare("update travel_app_company_emergency_locations set is_active=1 where country_id=? and emergency_id=? and company_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iii",$country_id,$emergency_id,$company_id);
        $stmt->execute();
		$stmt->close();
        $dbCon->close();
		 return 1;
	}
	
	function travelAppCompanyLocation($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 $company_id=$this->encrypt_decrypt('decrypt',$data['company_id']);
		  $count=$this->travelAppCompanyLocationActiveCount($data);
		 $emergencyDetail=$this->emergencyDetail($data);  
		$stmt = $dbCon->prepare("select travel_app_company_emergency_locations.id,visiting_address,port_number,travel_app_company_emergency_locations.is_active from travel_app_company_emergency_locations left join property_location on property_location.id=travel_app_company_emergency_locations.location_id left join travel_emergency_list on travel_emergency_list.id=travel_app_company_emergency_locations.emergency_id where travel_app_company_emergency_locations.country_id=? and travel_app_company_emergency_locations.emergency_id=? and travel_app_company_emergency_locations.company_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iii", $country_id,$emergency_id,$company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='<div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  "><div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile1" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen1.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading">'.$emergencyDetail['emergency_name'].'</span><span class="aprtSubheading">'.$count.' locations selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
									
									<div id="profile1" class=" " style="display: block;">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateAllupdateEmergencyService()"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
									   </div>
									   
									    <div class="clear"></div>
											';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			if($row['is_active']==1)
			{
				$boxColor='green_bg_00ff9996';
				$checkBoxColor='green_bg_81ceaa';
				$checked='checked';
			}
			else
			{
				$boxColor='bg_ffc1e0';
				$checkBoxColor='red_ff2828_bg';
				$checked='';
			}
			if($j==0)
			{
				$padt='padt20';
				$j++;
			}
			else
			{
			$padt='';	
			}
			$org=$org.'<div class="column_m container  marb5  fsz14 dark_grey_txt brd '.$padt.'">
												<div class="'.$boxColor.'   bg_fffbcc_a brdrad5">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
																	
																	 
													
													<div class="fleft wi_55 xxs-wi_55  xs-mar0  padt10">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt">'.$emergencyDetail['emergency_name'].'</span>
													 
													<span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt   ">'.$row['visiting_address'].' '.$row['port_number'].'</span>
													 </div>
													 
												 <div class="fright wi_65p marr15 "> <div class="wi_65p   minhei_65p   fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a  '.$checkBoxColor.' " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateEmergencyService('.$row['id'].','.$row['is_active'].');"><input data-testid="test-checkbox-Internet" name="Internet" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>
																	</div>
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									</div>';
		}
		$org=$org.' </div>';
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	
	function moreTravelAppCompany($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 $a=$_POST['id']*5;
		 $b=5;
		$stmt = $dbCon->prepare("select company_id,company_name from travel_app_company left join companies on companies.id=travel_app_company.company_id where travel_app_company.country_id=? and emergency_id=? limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("iiii", $country_id,$emergency_id,$a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		$j=0;
		while($row = $result->fetch_assoc())
		{
			$org=$org.'<a href="#">
											<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['company_name'],0,1).' </div>
																	</div>
													
													<div class="fleft wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">Company name</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">'.html_entity_decode($row['company_name']).'</span>  </div>
													 
												 <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz40  padb0 xxs-marr20 hidden-xs">
														  <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											</div>
											</a> ';
			 
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	 
	function travelAppCompanyCount($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select count(id) as num from travel_app_company where travel_app_company.country_id=? and emergency_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $country_id,$emergency_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	function emergencyDetail($data)
	{
		 $dbCon = AppModel::createConnection();
		 $app_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		  $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("select * from travel_emergency_list where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $app_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select count(id) as num from travel_inactive_emergency where emergency_id=? and country_id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $app_id,$country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$rowCount = $result->fetch_assoc();
		  
		$row['is_active']=$rowCount['num'];
		$stmt->close();
        $dbCon->close();
		 
		 return $row;
		 
	}
	
	function activateEmergency($data)
	{
		 $dbCon = AppModel::createConnection();
		 $app_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("delete from travel_inactive_emergency where emergency_id=? and country_id=?");
        
        
		$stmt->bind_param("ii", $app_id,$country_id);
        $stmt->execute();
        
		$stmt->close();
        $dbCon->close();
		 return 1;
	}
	
	function deactivateEmergency($data)
	{
		 $dbCon = AppModel::createConnection();
		 $app_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$stmt = $dbCon->prepare("insert into travel_inactive_emergency(emergency_id,country_id, created_on) values(? , ?, now())");
        
        
		$stmt->bind_param("ii", $app_id,$country_id);
        $stmt->execute();
        
		$stmt->close();
        $dbCon->close();
		 return 1;
	}

	
	function companyListSearch($data)
    {
        $dbCon = AppModel::createConnection();
		 $country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 
		 $org="";
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						
		$a=0;
		$b=20;
		
		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
		  
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,cid,address  from companies left join company_profiles on company_profiles.company_id=companies.id  where (company_name like ?) and email_verification_status=1 and country_id=?   and companies.id not in (select company_id from travel_app_company where country_id=? and emergency_id=?) limit ?,?");
				 $stmt->bind_param("siiiii", $p,$country_id,$country_id,$emergency_id,$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				
				 while($row=mysqli_fetch_array($result))
					{
					 
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				 
				$company_name=str_ireplace(htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1'),"<span class='bold dblue_txt'>".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."</span>",$row['company_name']);
									$org=$org.'<a href="../../addTravelCompany/'.$data['cid'].'/'.$data['eid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
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
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">'.$company_name.'</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['address'].'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a>  ';
					}	
		
	
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	function companyListSearchCount($data)
    {
        $dbCon = AppModel::createConnection();
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		 
		 $org="";
		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						//echo $p; die;
	$stmt = $dbCon->prepare("select count(companies.id) as num from companies left join company_profiles on company_profiles.company_id=companies.id  where (company_name like ? ) and email_verification_status=1 and country_id=?   and companies.id not in (select company_id from travel_app_company where country_id=? and emergency_id=?) ");
					$stmt->bind_param("siii", $p,$country_id,$country_id,$emergency_id);
					
		
		  $stmt->execute();
        $result2 = $stmt->get_result();
		$row2=mysqli_fetch_array($result2);
			
		
		$stmt->close();
        $dbCon->close();
		return $row2['num'];
	}
	
	 function companyListNew($data)
    {
        $dbCon = AppModel::createConnection();
		$country_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		 $emergency_id=$this->encrypt_decrypt('decrypt',$data['eid']); 
		 $org="";
		 
						$p="%".urldecode($_POST['message'])."%";
		
		$a=$_POST['id']*20;
		$b=20;
		   
		 
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,cid,address  from companies left join company_profiles on company_profiles.company_id=companies.id  where (company_name like ?) and email_verification_status=1 and country_id=?   and companies.id not in (select company_id from travel_app_company where country_id=? and emergency_id=?) limit ?,?");
				 $stmt->bind_param("siiiii", $p,$country_id,$country_id,$emergency_id,$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				 
				 while($row=mysqli_fetch_array($result))
					{
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				$company_name=str_ireplace(urldecode($_POST['message']),"<span class='bold dblue_txt'>".urldecode($_POST['message'])."</span>",$row['company_name']);
									$org=$org.'<a href="../../addTravelCompany/'.$data['cid'].'/'.$data['eid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
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
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">'.$company_name.'</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 ">'.$row['address'].'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
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
	
	function addTravelCompany($data)
			{
			$dbCon = AppModel::createConnection();
			$country_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$emergency_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['company_id']);
			$stmt = $dbCon->prepare("insert into travel_app_company (country_id,emergency_id,company_id,created_on) values(?, ?, ?, now())");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$country_id,$emergency_id,$company_id);
			$stmt->execute();
			
			$travelAppCompanyLocationCheck = $this->travelAppCompanyLocationCheck($data); 
			$stmt->close();
			$dbCon->close();
			return 1;
			}
	 
	}
