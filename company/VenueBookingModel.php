<?php
	require_once('../AppModel.php');
	class VenueBookingModel extends AppModel
	{
		function resturantDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select resturant_name,id  from resturant_information  where company_id=? and property_id=?");
			$stmt->bind_param("ii", $company_id,$_POST['location_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option> ';
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$rowAvailable['id'].'">'.$rowAvailable['resturant_name'].'</option> ';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function hotelDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select hotel_name,id  from hotel_basic_information  where  property_id=?");
			$stmt->bind_param("i", $_POST['location_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option> ';
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$rowAvailable['id'].'">'.$rowAvailable['hotel_name'].'</option> ';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function wellnessDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select center_name,id  from wellness_center_information  where company_id=? and property_id=?");
			$stmt->bind_param("ii", $company_id,$_POST['location_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<option value="0">Select</option> ';
			$j=0;
			while($rowAvailable = $result->fetch_assoc())
			{
				$org=$org.'<option value="'.$rowAvailable['id'].'">'.$rowAvailable['center_name'].'</option> ';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function VenueBookingDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select  company_venue.id,venue_name,visiting_address from company_venue left join property_location on property_location.id=company_venue.location_id where company_venue.company_id=?  order by company_venue.id desc limit 0,5");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		 
		function VenueBookingCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from company_venue where company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function moreVenueBookingDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$a=$_POST['id']*5;
			$b=5;
			$stmt = $dbCon->prepare("select  company_venue.id,venue_name,visiting_address from company_venue left join property_location on property_location.id=company_venue.location_id where company_venue.company_id=? order by company_venue.id desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $company_id,$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
			$enc=$this -> encrypt_decrypt('encrypt',$row['id']);
				
				$org=$org.'<a href="../completeVenueInformation/'.$data['cid'].'/'.$enc.'"> <div class="column_m container  marb5   fsz14 dark_grey_txt"><div class=" white_bg brdb bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													<div class="fleft wi_50p marr15  "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr($row['venue_name'],0,1).'</div>
																	</div>
													
													<div class="fleft wi_75   xs-mar0 ">
													
													<span class="edit-text bold padt0 jain2 dblock   brdclr_lgtgrey2 fsz14 xs-padt0 black_txt">'.$row['venue_name'].'</span>
													  <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz18  black_txt">'.substr($row['visiting_address'],0,18).'</span>  </div>
													 
													<div class="fright wi_10 padt10 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz25  padb0 xxs-marr20 hidden-xs">
														<span class="far fa-edit grey_txt"></span> 
													</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div></div> </a>';
		
				
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image from user_logins where id = ?");
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
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
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
			$stmt = $dbCon->prepare("select ssn,address from user_profiles  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function companyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from company_profiles  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				//echo "hi"; die;
				$stmt = $dbCon->prepare("INSERT INTO company_profiles (company_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function countryInfo($data)
	{
		 $dbCon = AppModel::createConnection();
		 $country_id=$data['country_id'];
		$stmt = $dbCon->prepare("select is_visible from country where id=?");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $country_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		$stmt->close();
        $dbCon->close();
		 return $row['is_visible'];
	}	
		function getMandatoryApps($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$country_id= $data['country_id'];
			$stmt = $dbCon->prepare("select manage_apps_permission.id,app_name from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=? and app_type=0 and is_mandatory=1 order by app_name");
			/* bind parameters for markers */
			$j=0;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
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
	
		function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select hotel_name,property_location.id,property_name,visiting_address,property_location.created_on,is_hotel from property_location left join property on property.id=property_location.property_id left join hotel_basic_information on hotel_basic_information.property_id=property_location.id  where property_location.company_id=? order by created_on desc");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function getVenueType($data)
		{
			$dbCon = AppModel::createConnection();
			$a=explode(',',$_POST['venue_type']);
			if (in_array($_POST['id'], $a))
						{
							$v=$_POST['id'].',';
						$_POST['venue_type']=str_replace($v,'',$_POST['venue_type']);
						}
						else
						{
						$_POST['venue_type']=$_POST['venue_type'].$_POST['id'].',';
						}
						$a=explode(',',$_POST['venue_type']);
			$stmt = $dbCon->prepare("select * from venue_type");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<input type="hidden"  name="venue_type" id="venue_type"  value="'.$_POST['venue_type'].'" />  <div class="css-1jzh2co marb15"><div class="chip-container">';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if (in_array($row['id'], $a))
						{
							$org=$org.' <a href="javascript:void(0);" onclick="updateVenue('.$row['id'].');"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$row['venue_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
						}
						else
						{
						$org=$org.'<a href="javascript:void(0);" onclick="updateVenue('.$row['id'].');"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['venue_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
						}
				
			}
			 $org=$org.'</div></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function getFoodType($data)
		{
			$dbCon = AppModel::createConnection();
			$a=explode(',',$_POST['food_and_drink']);
			if (in_array($_POST['id'], $a))
						{
							$v=$_POST['id'].',';
						$_POST['food_and_drink']=str_replace($v,'',$_POST['food_and_drink']);
						}
						else
						{
						$_POST['food_and_drink']=$_POST['food_and_drink'].$_POST['id'].',';
						}
						$a=explode(',',$_POST['food_and_drink']);
			$stmt = $dbCon->prepare("select * from venue_food_type");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<input type="hidden"  name="food_and_drink" id="food_and_drink"  value="'.$_POST['food_and_drink'].'" />  <div class="css-1jzh2co marb15"><div class="chip-container">';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if (in_array($row['id'], $a))
						{
							$org=$org.' <a href="javascript:void(0);" onclick="updateFood('.$row['id'].');"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$row['food_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
						}
						else
						{
						$org=$org.'<a href="javascript:void(0);" onclick="updateFood('.$row['id'].');"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['food_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
						}
				
			}
			 $org=$org.'</div></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function selectedVenueType($data)
		{
			$dbCon = AppModel::createConnection();
			$a=explode(',',$data['venue_type']);
			
			$stmt = $dbCon->prepare("select * from venue_type");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<input type="hidden"  name="venue_type" id="venue_type"  value="'.$data['venue_type'].'" />  <div class="css-1jzh2co marb15"><div class="chip-container">';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if (in_array($row['id'], $a))
						{
							$org=$org.' <a href="javascript:void(0);" onclick="updateVenue('.$row['id'].');"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$row['venue_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
						}
						else
						{
						$org=$org.'<a href="javascript:void(0);" onclick="updateVenue('.$row['id'].');"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['venue_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
						}
				
			}
			 $org=$org.'</div></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function selectedFoodType($data)
		{
			$dbCon = AppModel::createConnection();
			$a=explode(',',$data['food_and_drink']);
			
			$stmt = $dbCon->prepare("select * from venue_food_type");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<input type="hidden"  name="food_and_drink" id="food_and_drink"  value="'.$data['food_and_drink'].'" />  <div class="css-1jzh2co marb15"><div class="chip-container">';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if (in_array($row['id'], $a))
						{
							$org=$org.' <a href="javascript:void(0);" onclick="updateFood('.$row['id'].');"><div id="toilet-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="toilet-chip" class="css-1w0xfwu">
															<span class="chip chip_is-selected">
															   <span class="chip_content">
																  <div class="css-utgzrm"></div>
																  <span class="chip_text">'.$row['food_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
						}
						else
						{
						$org=$org.'<a href="javascript:void(0);" onclick="updateFood('.$row['id'].');"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['food_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
						}
				
			}
			 $org=$org.'</div></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function foodTypeDetail()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from venue_food_type");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="css-1jzh2co marb15"><div class="chip-container">';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<a href="javascript:void(0);" onclick="updateFood('.$row['id'].');"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['food_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
			}
			 $org=$org.'</div></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		
		function venueTypeDetail()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select * from venue_type");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org='<div class="css-1jzh2co marb15"><div class="chip-container">';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org=$org.'<a href="javascript:void(0);" onclick="updateVenue('.$row['id'].');"><div id="bath-chip" class="css-cedhmb">
														 <div tabindex="0" role="button" id="bath-chip" class="css-1w0xfwu">
															<span class="chip chip_not-selected">
															   <span class="chip_content">
																  <div class="css-ylfimb"></div>
																  <span class="chip_text">'.$row['venue_type'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';
			}
			 $org=$org.'</div></div>';
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function countryOption($data)
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			$stmt = $dbCon->prepare("select id,country_name  from country where id>-1 and id<240 order by country_name");
			/* bind parameters for markers */
			$cont=1;
			
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
		
		function addVenueBooking($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$name=htmlentities($_POST['venue_name'],ENT_NOQUOTES,'ISO-8859-1');
			$description=htmlentities($_POST['description'],ENT_NOQUOTES,'ISO-8859-1');
			if($_POST['owner_type']==1)
			{
				$_POST['owner_type_id']==0;	
			}
			 
			$stmt = $dbCon->prepare("insert into company_venue(company_id,venue_name,location_id,venue_type,owner_of_the_venue,venue_description,bookable_for,created_on,owner_id,food_and_drink)
			values(?,?,?,?,?,?,?,now(),?,?)");
			$stmt->bind_param("isisisiis",$company_id,$name,$_POST['location_id'],$_POST['venue_type'],$_POST['owner_type'],$description,$_POST['bookable_by'],$_POST['owner_type_id'],$_POST['food_and_drink']);
			$stmt->execute();
			
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("insert into company_venue_opening_closing_timings(venue_id)values (?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $id);
			$stmt->execute();	
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',50);
		}
		
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=50");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);
		}
	 
	 function venueInformationDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$venue_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
		 
		$stmt = $dbCon->prepare("select full_day_booking_available,hourly_booking_available,hourly_price,half_day_booking_available,reservation_fee_applicable,cleaning_fee_applicable,company_venue.id,venue_name,venue_type,venue_description,bookable_for,visiting_address, capacity_info, standing_capacity , seating_capacity, classroom_formation, theater_formation, banquet_formation, conference_formation, ushape_formation,floor_area,price_info,cleaning_fee,reservation_deposit,minimum_price,full_day_price,pre_lunch_price,post_lunch_price,nightly_price,food_and_drink from company_venue left join property_location on company_venue.location_id=property_location.id where company_venue.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function updateVenueBookingCapacity($data)
		{
			$dbCon = AppModel::createConnection();
			$venue_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			$stmt = $dbCon->prepare("update company_venue set  capacity_info=1, standing_capacity =?, seating_capacity=?, classroom_formation=?, theater_formation=?, banquet_formation=?, conference_formation=?, ushape_formation=?,floor_area=? where id=?");
			$stmt->bind_param("iiiiiiiii",$_POST['standing_capacity'],$_POST['seating_capacity'],$_POST['classroom_formation'],$_POST['theater_formation'],$_POST['banquet_formation'],$_POST['conference_formation'],$_POST['ushape_formation'],$_POST['floor_area'] ,$venue_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateVenueBooking($data)
		{
			$dbCon = AppModel::createConnection();
			$venue_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			$name=htmlentities($_POST['venue_name'],ENT_NOQUOTES,'ISO-8859-1');
			$description=htmlentities($_POST['description'],ENT_NOQUOTES,'ISO-8859-1');
			$stmt = $dbCon->prepare("update company_venue set  food_and_drink=?,venue_name=?,venue_type=? ,venue_description=?,bookable_for=? where id=?");
			$stmt->bind_param("ssssii",$_POST['food_and_drink'],$name,$_POST['venue_type'],$description,$_POST['bookable_by'],$venue_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		 function venueWorkingInformationDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$venue_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
		 
			$stmt = $dbCon->prepare("select * from company_venue_opening_closing_timings  where venue_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 if(empty($row))
			 {
			$stmt = $dbCon->prepare("insert into company_venue_opening_closing_timings(venue_id)values (?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $venue_id);
			$stmt->execute();	 
			 }
			 
			 $stmt = $dbCon->prepare("select * from company_venue_opening_closing_timings  where venue_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function updateVenueBookingPricing($data)
		{
			$dbCon = AppModel::createConnection();
			$venue_id= $this -> encrypt_decrypt('decrypt',$data['vid']);
			 
			$stmt = $dbCon->prepare("update company_venue set  full_day_booking_available=?,hourly_booking_available=?,hourly_price=?,half_day_booking_available=?,reservation_fee_applicable=?,cleaning_fee_applicable=?,price_info=1,cleaning_fee=?,reservation_deposit=?,minimum_price=?,full_day_price=?,post_lunch_price=?,pre_lunch_price=?,nightly_price=?  where id=?");
			$stmt->bind_param("iiiiiiiiiiiiii",$_POST['full_day_booking_available'],$_POST['hourly_booking_available'],$_POST['hourly_price'],$_POST['half_day_booking_available'],$_POST['reservation_fee_applicable'],$_POST['cleaning_fee_applicable'],$_POST['cleaning_fee'],$_POST['reservation_deposit'],$_POST['minimum_price'],$_POST['full_day_price'],$_POST['post_lunch_price'],$_POST['pre_lunch_price'],$_POST['nightly_price'],$venue_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		function updatePhotoOrder($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$venue_id=$this->encrypt_decrypt('decrypt',$data['vid']);
			
			$stmt = $dbCon->prepare("select sorting_number from company_venue_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$newSort=$row['sorting_number']+$_POST['addDelete'];
			
			
			$stmt = $dbCon->prepare("select id from company_venue_photos where sorting_number=? and venue_id=?");
			$stmt->bind_param("ii", $newSort,$venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update company_venue_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row['sorting_number'], $row1['id']);
			$stmt->execute();	
			
			$stmt = $dbCon->prepare("update company_venue_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $_POST['photoId']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updatePhotoDragging($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$venue_id=$this->encrypt_decrypt('decrypt',$data['vid']);
			
			$stmt = $dbCon->prepare("select sorting_number from company_venue_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedItem']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sorting_number from company_venue_photos where id=?");
			$stmt->bind_param("i", $_POST['draggedTarget']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row1 = $result->fetch_assoc();
			 
			if($row1['sorting_number']>$row['sorting_number'])
			{
			$stmt = $dbCon->prepare("select id,sorting_number from company_venue_photos where sorting_number>? and id<=? and venue_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
			$newSort=$rowUpdate['sorting_number']-1;
			$stmt = $dbCon->prepare("update company_venue_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			else
			{
			$stmt = $dbCon->prepare("select id,sorting_number from company_venue_photos where sorting_number<? and id>=? and venue_id=?");
			$stmt->bind_param("iii", $row['sorting_number'],$_POST['draggedTarget'],$venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowUpdate = $result->fetch_assoc())	
			{
				$newSort=$rowUpdate['sorting_number']+1;
			$stmt = $dbCon->prepare("update company_venue_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $rowUpdate['id']);
			$stmt->execute();		
			}		
			}
			
			$stmt = $dbCon->prepare("update company_venue_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$row1['sorting_number'], $_POST['draggedItem']);
			$stmt->execute();
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function deletePhoto($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$venue_id=$this->encrypt_decrypt('decrypt',$data['vid']);
			
			$stmt = $dbCon->prepare("select sorting_number from company_venue_photos where id=?");
			$stmt->bind_param("i", $_POST['photoId']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("delete from  company_venue_photos where id=?");
			$stmt->bind_param("i",$_POST['photoId']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(venue_id) as num from company_venue_photos where venue_id=?");
			$stmt->bind_param("i", $venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCount = $result->fetch_assoc();
			 
			if($rowCount['num']<5)
			{
			$stmt = $dbCon->prepare("update company_venue set photo_info=0 where id=?");
			$stmt->bind_param("i", $venue_id);
			$stmt->execute();		
			}
			
			$stmt = $dbCon->prepare("select id,sorting_number from company_venue_photos where sorting_number>? and venue_id=?");
			$stmt->bind_param("ii", $row['sorting_number'],$venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row1 = $result->fetch_assoc())	
			{
				$newSort=$row1['sorting_number']-1;
			$stmt = $dbCon->prepare("update company_venue_photos set sorting_number=? where id=?");
			$stmt->bind_param("ii",$newSort, $row1['id']);
			$stmt->execute();		
			}
			 
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function updatePhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$venue_id=$this->encrypt_decrypt('decrypt',$data['vid']);
			$data1 = strip_tags($_POST['update_info']);
			define('UPLOAD_DIR','../estorecss/'); 
			$img_name1="new".microtime();
			file_put_contents(UPLOAD_DIR.$img_name1.".txt", $data1);
			
			
			$stmt = $dbCon->prepare("select count(venue_id) as num from company_venue_photos where venue_id=?");
			$stmt->bind_param("i", $venue_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$snumber=$row['num']+1;
			if($snumber>=5)
			{
			$stmt = $dbCon->prepare("update company_venue set photo_info=1 where id=?");
			$stmt->bind_param("i", $venue_id);
			$stmt->execute();		
			}
			$stmt = $dbCon->prepare("insert into company_venue_photos (venue_photo_path,venue_id,sorting_number) values(?, ?, ?)");
			$stmt->bind_param("sii",$img_name1, $venue_id,$snumber);
			$stmt->execute();	
				
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$aid=$this->encrypt_decrypt('decrypt',$data['vid']);
			
			$stmt = $dbCon->prepare("select count(venue_id) as num from company_venue_photos where venue_id=?");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select venue_photo_path,sorting_number,id from company_venue_photos where venue_id=? order by sorting_number ");
			$stmt->bind_param("i", $aid);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org='';
			if($row['num']==1)
			{
				$first="hidden";
				$last="hidden";
			}
			else
			{
			$first="hidden";
			$last="";	
			}
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($i==$row['num'])
				{
				$last="hidden";	
				}
				
				 $filename="../estorecss/".$row1 ['venue_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['venue_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['venue_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org=$org.'<div class="target-indicator padtb10" id="'.$row1['id'].'" ondrop="drop(event)" ondragover="allowDrop(event)"></div>

						<div class="drag-drop__wrapper " draggable="true" id="drag_'.$row1['id'].'" ondragstart="drag(event,'.$row1['id'].')">
																<div class="photo-tile">
																   <div class="handlebar ">
																	  <div class="handlebar__row handlebar__top">
																		<a href="javascript:void(0);" onclick="updatePhotoDecrement('.$row1['id'].');"> <div class="handlebar__cell handlebar__arrow '.$first.' grabbable"><i class="fas fa-chevron-up fsz16"></i></div>
																	  </div></a>
																	  <div class="handlebar__row handlebar__middle">
																		 <div class="handlebar__cell handlebar__grip grabbable"> </div>
																	  </div>
																	  <div class="handlebar__row handlebar__bottom">
																		<a href="javascript:void(0);" onclick="updatePhotoOrderIncreament('.$row1['id'].');"><div class="handlebar__cell handlebar__arrow '.$last.'" tabindex="0" aria-label="Move down"><i class="fas fa-chevron-down fsz16"></i></div></a>
																	  </div>
																   </div>
																   <div class="photo-tile__body">
																	  <img class="photo-tile__image" src="../../../../'.$image.'" alt="Photo 1">
																	  <div class="photo-tile__content">
																		 <div class="photo-tile__tags xs-tall">
																			<div class="photo-tile__tags__properties"><span class="tag tag--standard tag--success white_txt padrl5">High resolution</span><span class="tag tag--standard tag--neutral padrl5 lgtgrey2_bg">Landscape</span></div>
																			<div class="photo-tile__tags__labels"></div>
																		 </div>
																		 <div class="photo-tile__actions">
																		<a href="javascript:void(0);" class="xsi-mart0 show_popup_modal" data-target="#gratis_popup_error" onclick="getImageInfo('.$row1['id'].');">	<button color="#444444" label="View photo" aria-label="View photo" class="merlin-button css-12d2atf">
																			   <div class="merlin-button__content">View</div>
																			</button></a>
																			<a href="javascript:void(0);" tabindex="0" onclick="deletePhoto('.$row1['id'].');">Delete</a>
																		 </div>
																	  </div>
																   </div>
																</div>
															 </div>';
															 $first="";
															 $i++;
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
			function getImageInfo($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$venue_id=$this->encrypt_decrypt('decrypt',$data['vid']);
			 $stmt = $dbCon->prepare("select venue_photo_path,sorting_number,id from company_venue_photos where id=? ");
			$stmt->bind_param("i", $_POST['update_info']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			$row1 = $result1->fetch_assoc();
				 
			
				
				 $filename="../estorecss/".$row1 ['venue_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['venue_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['venue_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				
				$org='<a class="lightbox__img-nav false"></a><img class="lightbox__img" src="../../../../'.$image.'">'; 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
	}							