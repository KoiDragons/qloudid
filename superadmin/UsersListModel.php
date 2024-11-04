<?php
require_once('../AppModel.php');

class UsersListModel extends AppModel
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
	
	function userDetail()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select domain_id,user_came_from,user_logins.id,concat_ws(' ', first_name, last_name) as name,email,image_path from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id  where registered_from=1 and verification_status=1 and grading_status=0 order by first_name,last_name  limit 0,20");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			if($row['domain_id']>0)
			{
				$stmt = $dbCon->prepare("select * from `qloudid`.`professional_marketplace` where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['domain_id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				$row['marketplace_name']=$row2['marketplace_name'];
			}
			else
				$row['marketplace_name']='';
			array_push($org,$row);
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	function moreFoundandLostDetail()
	{
		 $dbCon = AppModel::createConnection();
		$a=$_POST['id']*50;
			$b=$a+50;
		$stmt = $dbCon->prepare("select item_number,phone_number,description,country_code,created_on from found_and_lost left join  phone_country_code on phone_country_code.country_name=found_and_lost.country_phone order by created_on desc  limit ?,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ii", $a,$b);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			
				if($row['item_number']==1)
				{
				$item='Cell phone';
				}
				else
					if($row['item_number']==2)
				{
				$item='Key';
				}
				else if($row['item_number']==2)
				{
				$item='Laptop';
				}
				$org=$org.'<tr class="fsz16">
				
				<td class="pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="#">'.$item.'</a></div>
													</td>
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">+'.$row['country_code'].' '.$row['phone_number'].'</div>
													</td>
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['description'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													<td class="pad5 brdb_new   hidden-xs">
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

	
	function foundandLostDetail()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select item_number,phone_number,description,country_code,created_on from found_and_lost left join  phone_country_code on phone_country_code.country_name=found_and_lost.country_phone  order by created_on desc limit 0,20");
        
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
	function foundandLostCount()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from found_and_lost");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	function userDetailUnverified()
	{
		 $dbCon = AppModel::createConnection();  
		$stmt = $dbCon->prepare("select domain_id,user_came_from,user_logins.id,concat_ws(' ', first_name, last_name) as name,email,image_path from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id  where registered_from=1 and verification_status=0 order by user_came_from desc, first_name,last_name  limit 0,20");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
			if($row['domain_id']>0)
			{
				$stmt = $dbCon->prepare("select * from `qloudid`.`professional_marketplace` where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['domain_id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				$row['marketplace_name']=$row2['marketplace_name'];
			}
			else
				$row['marketplace_name']='';
			array_push($org,$row);
		}
		$stmt->close();
        $dbCon->close();
		 return $org;
	}
	function usersCount()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_logins where registered_from=1");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function usersCountVerified()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_logins where registered_from=1 and verification_status=1  and grading_status=0");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	function usersCountUnverified()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_logins where registered_from=1 and verification_status=0");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	function moreUserDetail()
	{
		 $dbCon = AppModel::createConnection();
		$limit=$_POST['id']*20;
		$stmt = $dbCon->prepare("select domain_id,user_came_from,user_logins.id,concat_ws(' ', first_name, last_name) as name,email,image_path from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id  where registered_from=1  and verification_status=1  and grading_status=0 order by first_name,last_name  limit ?,20");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			if(empty($row['name']))
			{
				$row['name']='No name';
			}
			if($row['domain_id']>0)
			{
				$stmt = $dbCon->prepare("select * from `qloudid`.`professional_marketplace` where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['domain_id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				
			}
			 if($row['user_came_from']==1) $user_came_from= "Qloud ID"; else if($row['user_came_from']==2) $user_came_from= "Dstricts - Hotel"; else if($row['user_came_from']==3) $user_came_from= "Dstricts - Apartment"; else if($row['user_came_from']==4) $user_came_from= "Dstricts - Car rental"; else if($row['user_came_from']==5) $user_came_from= "Dstricts - Book services"; else if($row['user_came_from']==6) $user_came_from= "Dstricts - Book a table";else if($value['user_came_from']==7) $user_came_from=$row2['marketplace_name']." - Company Signup"; else if($value['user_came_from']==8) $user_came_from=$row2['marketplace_name']." - Vacant position";  else $user_came_from= 'Qloud ID';
				 
			
			
			$img='';
			if($row['image_path']!=null || $row['image_path']!="") 
			{
				if(isset($row['image_path'])) { if(file_exists("../../../profile-image/crop_".$row['image_path'])) $img1= "../../../profile-image/crop_".$row['image_path']; else $img1= "../../../profile-image/".$row['image_path']; }
				$img=$img.'<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 " ><img src="'.$img1.'" width="60" height="60" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;"></div>';
			}
			else
			{
				$img='<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;" >'.substr($row['name'],0,1).' </div>';
			}
			
			
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
																			<a href="#" class="get-company-info1 dark_grey_txt txt_0070e0_sbh">'.$row['name'].'</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="javascript:void(0);" class="txt_4a">From: '.$user_came_from.'</a></div>
																	
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

	function moreUserUnverifiedDetail()
	{
		 $dbCon = AppModel::createConnection();
		$limit=$_POST['id']*20;
		$stmt = $dbCon->prepare("select domain_id,user_came_from,user_logins.id,concat_ws(' ', first_name, last_name) as name,email,image_path from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id  where registered_from=1  and verification_status=0 order by user_came_from desc,first_name,last_name  limit ?,20");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			if(empty($row['name']))
			{
				$row['name']='No name';
			}
			if($row['domain_id']>0)
			{
				$stmt = $dbCon->prepare("select * from `qloudid`.`professional_marketplace` where id=?");
        
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['domain_id']);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$row2 = $result2->fetch_assoc();
				
			}
			 if($row['user_came_from']==1) $user_came_from= "Qloud ID"; else if($row['user_came_from']==2) $user_came_from= "Dstricts - Hotel"; else if($row['user_came_from']==3) $user_came_from= "Dstricts - Apartment"; else if($row['user_came_from']==4) $user_came_from= "Dstricts - Car rental"; else if($row['user_came_from']==5) $user_came_from= "Dstricts - Book services"; else if($row['user_came_from']==6) $user_came_from= "Dstricts - Book a table";else if($value['user_came_from']==7) $user_came_from=$row2['marketplace_name']." - Company Signup"; else if($value['user_came_from']==8) $user_came_from=$row2['marketplace_name']." - Vacant position";  else $user_came_from= 'Qloud ID';
				
			$img='';
			if($row['image_path']!=null || $row['image_path']!="") 
			{
				if(isset($row['image_path'])) { if(file_exists("../../../profile-image/crop_".$row['image_path'])) $img1= "../../../profile-image/crop_".$row['image_path']; else $img1= "../../../profile-image/".$row['image_path']; }
				$img=$img.'<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 " ><img src="'.$img1.'" width="60" height="60" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;"></div>';
			}
			else
			{
				$img='<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;" >'.substr($row['name'],0,1).' </div>';
			}
			
			
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
																			<a href="#" class="get-company-info1 dark_grey_txt txt_0070e0_sbh">'.$row['name'].'</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="javascript:void(0);" class="txt_4a">From: '.$user_came_from.'</a></div>
																	
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

	function moreUserDetailMobile()
	{
		 $dbCon = AppModel::createConnection();
		$limit=$_POST['id']*20;
		$stmt = $dbCon->prepare("select user_came_from,user_logins.id,concat_ws(' ', first_name, last_name) as name,email,image_path from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id  where registered_from=1  and verification_status=1  and grading_status=1 order by first_name,last_name  limit ?,20");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			if(empty($row['name']))
			{
				$row['name']='No name';
			}
			$img='';
			if($row['image_path']!=null || $row['image_path']!="") 
			{
				if(isset($row['image_path'])) { if(file_exists("../../../profile-image/crop_".$row['image_path'])) $img1= "../../../profile-image/crop_".$row['image_path']; else $img1= "../../../profile-image/".$row['image_path']; }
				$img=$img.'<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 " ><img src="'.$img1.'" width="60" height="60" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;"></div>';
			}
			else
			{
				$img='<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;" >'.substr($row['name'],0,1).' </div>';
			}
			
			
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
																			<a href="#" class="get-company-info1 dark_grey_txt txt_0070e0_sbh">'.$row['name'].'</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">'.$row["email"].'</a></div>
																	
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

	
	function usersCountVerifiedMobile()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_logins where registered_from=1 and verification_status=1  and grading_status=1");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	
	function userDetailMobile()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select user_came_from,user_logins.id,concat_ws(' ', first_name, last_name) as name,email,image_path from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id  where registered_from=1 and verification_status=1 and grading_status=1 order by first_name,last_name  limit 0,20");
        
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
	
	function moreUserDetailBankID()
	{
		 $dbCon = AppModel::createConnection();
		$limit=$_POST['id']*20;
		$stmt = $dbCon->prepare("select user_came_from,user_logins.id,concat_ws(' ', first_name, last_name) as name,email,image_path from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id  where registered_from=1  and verification_status=1  and grading_status=2 order by first_name,last_name  limit ?,20");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			$img='';
			if(empty($row['name']))
			{
				$row['name']='No name';
			}
			if($row['image_path']!=null || $row['image_path']!="") 
			{
				if(isset($row['image_path'])) { if(file_exists("../../../profile-image/crop_".$row['image_path'])) $img1= "../../../profile-image/crop_".$row['image_path']; else $img1= "../../../profile-image/".$row['image_path']; }
				$img=$img.'<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 " ><img src="'.$img1.'" width="60" height="60" alt="Profile " style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;"></div>';
			}
			else
			{
				$img='<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;" >'.substr($row['name'],0,1).' </div>';
			}
			
			
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
																			<a href="#" class="get-company-info1 dark_grey_txt txt_0070e0_sbh">'.$row['name'].'</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a">'.$row["email"].'</a></div>
																	
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

	
	function usersCountVerifiedBankID()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_logins where registered_from=1 and verification_status=1  and grading_status=2");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	
	function userDetailBankID()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select user_came_from,user_logins.id,concat_ws(' ', first_name, last_name) as name,email,image_path from user_logins left join user_profiles on user_logins.id=user_profiles.user_logins_id  where registered_from=1 and verification_status=1 and grading_status=2 order by first_name,last_name  limit 0,20");
        
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
	
	}
