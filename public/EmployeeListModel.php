<?php
require_once('../AppModel.php');
class EmployeeListModel extends AppModel
{
		function verifyLanguage()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$stmt = $dbCon->prepare("select language_var from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 'en';
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return $row['language_var'];
			}
		}
		
			function changeLanguage()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			
			$stmt = $dbCon->prepare("select id from public_page_language where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s",$ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("INSERT INTO public_page_language (language_var, ip_address, created_on ) VALUES (?, ?, now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
			
			}
			else
			{
			$stmt = $dbCon->prepare("update public_page_language set language_var=? where ip_address=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ss", $_POST['lang'],$ip);
			$stmt->execute();
				
			}
			
				$stmt->close();
				$dbCon->close();
				return 1;
			
		}
	
	
	function base64_to_jpeg($base64_string, $output_file) {
   
    $ifp = fopen( $output_file, 'wb' ); 

    $data = explode( ',', $base64_string );

    fwrite( $ifp, base64_decode( $data[1] ) );

   
    fclose( $ifp ); 

    return $output_file; 
}

function companyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			
			
			$stmt = $dbCon->prepare("select company_id from employees where id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['company_id']);
			
			
		}
	
	function representativeListSearch($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		ini_set('memory_limit', '-1');
		
						
		$p="%".$_POST['message']."%";
					
		$a=$_POST['id']*20;
		$b=20;
				
					$stmt = $dbCon->prepare("select address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  join company_profiles on company_profiles.company_id=employees.company_id  where  lower(employees.first_name) like ? and employees.company_id=? order by employees.first_name limit ?,?");
				 $stmt->bind_param("siii", $p,$company_id,$a,$b);
				
				
				 $stmt->execute();
				$result = $stmt->get_result();
				 $org="";
				
				 while($row = $result->fetch_assoc())
					{
						$title='';
						$location='';
						$img='';
						$stmt = $dbCon->prepare("select title from user_company_profile where user_login_id=? and company_id=?");
						 $stmt->bind_param("ii", $row['user_login_id'],$company_id);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						if(empty($rowe))
						{
							$title='Employee';
						}
						else
						{
							$title=$rowe['title'];
						}
						
						 $stmt = $dbCon->prepare("select visiting_address from employee_location left join property_location on property_location.id=employee_location.location_id where employee_id=?");
						 $stmt->bind_param("i", $row['id']);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						 if($rowe['visiting_address']==null || $rowe['visiting_address']=='') 
						 {
							$location=$row['address'];
						 }
						 else
						 {
						$location=$rowe['visiting_address'];	 
						 }
						
						$enc=$this -> encrypt_decrypt('encrypt',$row['id']);
						 if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
						$img='
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>';
																	
																	 } else { $img=' <div class="wi_50p xs-wi_80 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" width="45px;" height="45px;" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > '.substr($row['first_name'],0,1).' </div> 
																	 '; }
							$org=$org.'<a href="https://www.safeqloud.com/public/index.php/PublicEmployeeInfo/companyAccount/'.$enc.'" class="black_txt"><div class=" white_bg marb10  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl5 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marl15 xs-mar0"> '.$img.' </div>
													
													<div class="fleft wi_50 xxs-wi_80 sm-wi_50 xsip-wi_50  marl15 xs-mar0"> <span class="trn fsz16 bold" >'.substr(html_entity_decode($row['name']),0,23).'...</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz15">'.substr($title,0,23).'...</span> </div>
													
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div></a>';
	
							
					}		 
		
		
	
			
			$stmt = $dbCon->prepare("select count(employees.id) as num from employees  where lower(first_name) like ? and company_id=? "); 
						$stmt->bind_param("si", $p,$company_id);
					
		
		  $stmt->execute();
        $result1 = $stmt->get_result();
		$row1 = $result1->fetch_assoc();
		
		
			
			 $stmt->close();
        $dbCon->close();
		return $row1['num']."~".$org;
	}
   
	function employeeList($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		ini_set('memory_limit', '-1');
		
		$stmt = $dbCon->prepare("select address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  left join company_profiles on company_profiles.company_id=employees.company_id where employees.company_id=? order by employees.first_name limit 0,20");
		$stmt->bind_param("i", $company_id);
		  $stmt->execute();
        $result = $stmt->get_result();
		 $org="";
		$img='';
		 while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select title from user_company_profile where user_login_id=? and company_id=?");
						 $stmt->bind_param("ii", $row['user_login_id'],$company_id);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						if(empty($rowe))
						{
							$title='Employee';
						}
						else
						{
							$title=$rowe['title'];
						}
						
						 $stmt = $dbCon->prepare("select visiting_address from employee_location left join property_location on property_location.id=employee_location.location_id where employee_id=?");
						 $stmt->bind_param("i", $row['id']);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						 if($rowe['visiting_address']==null || $rowe['visiting_address']=='') 
						 {
							$location=$row['address'];
						 }
						 else
						 {
						$location=$rowe['visiting_address'];	 
						 }
						 
				 if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
						$img='<td class="brdb">
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p " ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></td>';
																	
																	 } else { $img=' <td class="brdb"><div class="wi_50p xs-wi_80 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" width="45px;" height="45px;" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > '.substr($row['first_name'],0,1).' </div> 
																	 </td>'; }
						
			$enc=$this -> encrypt_decrypt('encrypt',$row['id']);	
		$org=$org.'<a href="https://www.safeqloud.com/public/index.php/PublicEmployeeInfo/companyAccount/'.$enc.'" class="black_txt"><div class=" white_bg marb10  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl5 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marl15 xs-mar0"> '.$img.' </div>
													
													<div class="fleft wi_50 xxs-wi_80 sm-wi_50 xsip-wi_50  marl15 xs-mar0"> <span class="trn fsz16 bold" >'.substr(html_entity_decode($row['name']),0,23).'...</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz15">'.substr($title,0,23).'...</span> </div>
													
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div></a>';
			}		 
		
			//print_r($org); die;
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	
	
	function employeeListNew($data)
    {
        $dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		ini_set('memory_limit', '-1');
		$p=strtoupper($_POST['message'].'%');
		$a=$_POST['id']*20;
		$b=20;
		
			//return $p; 
			if($_POST['message']=='A')
						{
							$stmt = $dbCon->prepare("select address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.company_id,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  left join company_profiles on company_profiles.company_id=employees.company_id where employees.company_id=? order by employees.first_name limit ?,?");
						 $stmt->bind_param("iii", $company_id,$a,$b);
						}
		else
				{
					
					$stmt = $dbCon->prepare("select address,passport_image,employees.first_name,employees.id,concat_ws(' ',employees.first_name,employees.last_name)  as name,company_name,employees.email,employees.user_login_id from employees left join companies on companies.id=employees.company_id left join user_logins on user_logins.id=employees.user_login_id  left join company_profiles on company_profiles.company_id=employees.company_id where employees.company_id=? and lower(employees.first_name) like ? order by employees.first_name limit ?,?");
				 $stmt->bind_param("isii",$company_id, $p,$a,$b);
				}
				
				 $stmt->execute();
				$result = $stmt->get_result();
				 $org="";
				 $location='';
				
				 while($row = $result->fetch_assoc())
					{
						
						$stmt = $dbCon->prepare("select title from user_company_profile where user_login_id=? and company_id=?");
						 $stmt->bind_param("ii", $row['user_login_id'],$company_id);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						if(empty($rowe) || $rowe['title']==null || $rowe['title']=='')
						{
							$title='Employee';
						}
						else
						{
							$title=$rowe['title'];
						}
						
						
						$stmt = $dbCon->prepare("select visiting_address from employee_location left join property_location on property_location.id=employee_location.location_id where employee_id=?");
						 $stmt->bind_param("i", $row['id']);
						 $stmt->execute();
						$resulte = $stmt->get_result();
						$rowe = $resulte->fetch_assoc();
						
						 if($rowe['visiting_address']==null || $rowe['visiting_address']=='') 
						 {
							$location=$row['address'];
						 }
						 else
						 {
						$location=$rowe['visiting_address'];	 
						 }
						
					 if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
						 
						
						 
						 
						$img='
																	<div class="wi_50p xs-wi_100 hei_50p xs-hei_45p " ><img src="../../../'.$imgs.'" width="45px;" height="45px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>';
																	
																	 } else { $img='<div class="wi_50p xs-wi_80 hei_50p xs-hei_45p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg" width="45px;" height="45px;" style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;" > '.substr($row['first_name'],0,1).' </div> 
																	'; }	
						
					$enc=$this -> encrypt_decrypt('encrypt',$row['id']);	
			
			
			$org=$org.'<a href="https://www.safeqloud.com/public/index.php/PublicEmployeeInfo/companyAccount/'.$enc.'" class="black_txt"><div class=" white_bg marb10  brdrad3 box_shadow bg_fffbcc_a" style="">
										<div class="container pad25 padb20 xs-pad10 xs-padt20 xs-padb20  brdrad1 fsz14 dark_grey_txt">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padl5 fsz12">
													<div class="fleft wi_10 xxs-wi_20 sm-wi_10 xsip-wi_10 marl15 xs-mar0"> '.$img.' </div>
													
													<div class="fleft wi_50 xxs-wi_80 sm-wi_50 xsip-wi_50  marl15 xs-mar0"> <span class="trn fsz16 bold" >'.substr(html_entity_decode($row['name']),0,23).'...</span> <span class=" edit-text jain1 dblock brdb brdclr_lgtgrey2 fsz15">'.substr($title,0,23).'...</span> </div>
													
													
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
																				
									</div></a>';
			
					}		 
			
			
			
			
			
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	function corporateColor($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("select * from corporate_color where company_id=?");
				
				$stmt->bind_param("i",$company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
						
						$stmt->close();
						$dbCon->close();
						return $row;
				
			}
	
	}
