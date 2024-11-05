<?php
require_once('../AppModel.php');
class PrivateSearchResultModel extends AppModel
{
	function countryDetail()
		{
			$dbCon = AppModel::createConnection();
      		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
					
			$stmt = $dbCon->prepare("select * from country where id in (select country_id from companies  where company_name like ?  and email_verification_status=1) order by country_name");
			
			$stmt->bind_param("s", $p);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$i=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$i]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				$i++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
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
    function companyListSearch()
    {
        $dbCon = AppModel::createConnection();
		ini_set('memory_limit', '-1');
		 $org="";
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						//print_r($p); die;
						$stmt = $dbCon->prepare("select count(companies.id) as num from companies  where company_name like ? and email_verification_status=1");
						$stmt->bind_param("s", $p);
					
		
		  $stmt->execute();
        $result1 = $stmt->get_result();
		$row1=mysqli_fetch_array($result1);
		if(isset($_POST['id']))
		{
			$v=$_POST['id'];
		}
		else
		{
			$v=0;
		}
		$a=$v*20;
		$b=20;
		
		//echo $a; echo $row1['num'];
		if($row1['num']>=($a+19))
		{
			 
			
					$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id  from companies   where company_name like ?  and email_verification_status=1 order by company_name limit ?,?");
				 $stmt->bind_param("sii", $p,$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				//$row=mysqli_fetch_array($result);
				//print_r($row); die;
				 while($row=mysqli_fetch_array($result))
					{
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				$row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);
									$org=$org.'<tr>
												<td class="brdb_new wi_5"><div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../country_flags/'.$row['country_id'].'.png" width="40px;" height="30px;"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></td>
												<td class="brdb_new"><a href="https://www.qloudid.com/company/index.php/About/employeeVerify/'.$enc.'" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
					}		 
		}
		
		else if($row1['num']< $a)
		{
				//echo "jain";	
									$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
									$stmt = $dbCon->prepare("select id,company_name,company_email from virtual_company  where is_deleted=0 and company_name like ?  order by company_name limit ?,?");
								 $stmt->bind_param("sii", $p,$a,$b);
								
					$stmt->execute();
					$result = $stmt->get_result();
					 $org="";
					
					 while($row=mysqli_fetch_array($result))
						{
							$row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);
							$org=$org.'<tr>
												
												<td class="brdb_new"><a href="#" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
						}		 
		}
		
		else
		{
			//echo "hello";
									$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
									$stmt = $dbCon->prepare("select count(companies.id) as num from companies  where company_name like ? and email_verification_status=1");
									$stmt->bind_param("s", $p);
									  $stmt->execute();
									$result1 = $stmt->get_result();
									$row1=mysqli_fetch_array($result1);
		
									//echo $a; die;
									//$s=$a+
									$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id  from companies  where company_name like ? and email_verification_status=1 order by company_name limit ?,20");
									$stmt->bind_param("si", $p,$a);
									
									  $stmt->execute();
									$result = $stmt->get_result();
									 $org="";
									
									 while($row=mysqli_fetch_array($result))
										{
											$enc=$this->encrypt_decrypt('encrypt',$row['id']);
											$row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);
											$org=$org.'<tr>
												<td class="brdb_new wi_5"><div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../country_flags/'.$row['country_id'].'.png" width="40px;" height="30px;"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></td>
												<td class="brdb_new"><a href="https://www.qloudid.com/company/index.php/About/employeeVerify/'.$enc.'" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
										}		
										
										$i=20-($row1['num']-$a);
										if($i>0)
										{
									$stmt = $dbCon->prepare("select id,company_name,company_email from virtual_company where is_deleted=0 and company_name like ? order by company_name limit 0,?");
									$stmt->bind_param("si", $p,$i);
									  $stmt->execute();
									$result = $stmt->get_result();
									
									
									 while($row=mysqli_fetch_array($result))
										{
											$row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);
											$org=$org.'<tr>
												
												<td class="brdb_new"><a href="#" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
										}
										}
								
		}
		
	
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	function companyListSearchCount()
    {
        $dbCon = AppModel::createConnection();
		ini_set('memory_limit', '-1');
		 $org="";
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						//echo $p; die;
	$stmt = $dbCon->prepare("select count(companies.id) as num from companies where company_name like ? and email_verification_status=1");
						$stmt->bind_param("s", $p);
					
		
		  $stmt->execute();
        $result2 = $stmt->get_result();
		$row2=mysqli_fetch_array($result2);
			
		$stmt = $dbCon->prepare("select count(id) as num from virtual_company  where is_deleted=0 and company_name like ?");
						$stmt->bind_param("s", $p);
					
		
		  $stmt->execute();
        $result = $stmt->get_result();
		$row=mysqli_fetch_array($result);	
			$total1=0;
			$total1=$row['num']+$row2['num'];
		$stmt->close();
        $dbCon->close();
		return $total1;
	}
	 function companyListNew()
    {
        $dbCon = AppModel::createConnection();
		ini_set('memory_limit', '-1');
		 $org="";
						$_POST['message']=preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($_POST['message'])); 
						
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						
						$stmt = $dbCon->prepare("select count(companies.id) as num from companies  where company_name like ? and email_verification_status=1");
						$stmt->bind_param("s", $p);
					
		
		  $stmt->execute();
        $result1 = $stmt->get_result();
		$row1=mysqli_fetch_array($result1);
		//print_r($row1); die;
		if(isset($_POST['id']))
		{
			$v=$_POST['id'];
		}
		else
		{
			$v=1;
		}
		$a=0;
		$b=$v*20;
		//echo $b; die;
		//echo $a; echo $row1['num'];
		if($row1['num']>=($a+$b))
		{
			 
			
					$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id  from companies   where company_name like ?  and email_verification_status=1 order by company_name limit ?,?");
				 $stmt->bind_param("sii", $p,$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				//$row=mysqli_fetch_array($result);
				//print_r($row); die;
				 while($row=mysqli_fetch_array($result))
					{
					$row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);	
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
									$org=$org.'<tr>
												<td class="brdb_new wi_5"><div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../country_flags/'.$row['country_id'].'.png" width="40px;" height="30px;"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></td>
												<td class="brdb_new"><a href="https://www.qloudid.com/company/index.php/About/employeeVerify/'.$enc.'" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
					}		 
		}
		
		else if($row1['num']< $a)
		{
				//echo "jain";	
									$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
									$stmt = $dbCon->prepare("select id,company_name,company_email from virtual_company  where is_deleted=0 and company_name like ?  order by company_name limit ?,?");
								 $stmt->bind_param("sii", $p,$a,$b);
								
					$stmt->execute();
					$result = $stmt->get_result();
					 $org="";
					
					 while($row=mysqli_fetch_array($result))
						{
							 $row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);
							$org=$org.'<tr>
												
												<td class="brdb_new"><a href="#" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
						}		 
		}
		
		else
		{
			//echo "hello";
									$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
									$stmt = $dbCon->prepare("select count(companies.id) as num from companies  where company_name like ? and email_verification_status=1");
									$stmt->bind_param("s", $p);
									  $stmt->execute();
									$result1 = $stmt->get_result();
									$row1=mysqli_fetch_array($result1);
		
									//echo $a; die;
									//$s=$a+
									$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id  from companies  where company_name like ? and email_verification_status=1 order by company_name");
									$stmt->bind_param("s", $p);
									
									  $stmt->execute();
									$result = $stmt->get_result();
									 $org="";
									
									 while($row=mysqli_fetch_array($result))
										{
											$row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);
											$enc=$this->encrypt_decrypt('encrypt',$row['id']);
											$org=$org.'<tr>
												<td class="brdb_new wi_5"><div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../country_flags/'.$row['country_id'].'.png" width="40px;" height="30px;"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></td> 
												<td class="brdb_new"><a href="https://www.qloudid.com/company/index.php/About/employeeVerify/'.$enc.'" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
										}		
										
										$i=$b-($row1['num']-$a);
										if($i>0)
										{
									$stmt = $dbCon->prepare("select id,company_name,company_email from virtual_company where is_deleted=0 and company_name like ? order by company_name limit 0,?");
									$stmt->bind_param("si", $p,$i);
									  $stmt->execute();
									$result = $stmt->get_result();
									
									
									 while($row=mysqli_fetch_array($result))
										{
											$row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);
											$org=$org.'<tr>
												
												<td class="brdb_new"><a href="#" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
										}
										}
								
		}
		
	
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	
	function companyListCountry()
    {
        $dbCon = AppModel::createConnection();
		ini_set('memory_limit', '-1');
		 $org="";
					$_POST['message']=preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($_POST['message'])); 
					$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id  from companies   where company_name like ?  and email_verification_status=1 and country_id=? order by company_name ");
				 $stmt->bind_param("si", $p,$_POST['id']);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				//$row=mysqli_fetch_array($result);
				//print_r($row); die;
				 while($row=mysqli_fetch_array($result))
					{
						$row['company_name']=str_ireplace($_POST['message'],"<span class='bold dblue_txt'>".$_POST['message']."</span>",$row['company_name']);
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
									$org=$org.'<tr>
												<td class="brdb_new wi_5"><div class="wi_40p xs-wi_50p hei_40p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../country_flags/'.$row['country_id'].'.png" width="40px;" height="30px;"  style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div></td>
												<td class="brdb_new"><a href="https://www.qloudid.com/company/index.php/About/employeeVerify/'.$enc.'" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
					}		 
		
		
	
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	
}
