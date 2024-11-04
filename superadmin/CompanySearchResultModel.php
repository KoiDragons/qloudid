<?php
require_once('../AppModel.php');
class CompanySearchResultModel extends AppModel
{
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
						$stmt = $dbCon->prepare("select count(companies.id) as num from company_profiles left join companies on companies.id=company_profiles.company_id  where (company_name like ? or cid=?) and email_verification_status=1");
						$stmt->bind_param("ss", $p,$_POST['message']);
					
		
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
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email from company_profiles left join companies on companies.id=company_profiles.company_id   where (company_name like ? or cid=?) and email_verification_status=1 order by company_name limit ?,?");
				 $stmt->bind_param("ssii", $p,$_POST['message'],$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				//$row=mysqli_fetch_array($result);
				//print_r($row); die;
				 while($row=mysqli_fetch_array($result))
					{
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
									$org=$org.'<tr>
												
												<td class="brdb_new"><a href="#" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
					}		 
		}
		
		else if($row1['num']< $a)
		{
				//echo "jain";	
									$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
									$stmt = $dbCon->prepare("select id,company_name,company_email from virtual_company  where is_deleted=0 and (company_name like ? or cid=?) order by company_name limit ?,?");
								 $stmt->bind_param("ssii", $p,$_POST['message'],$a,$b);
								
					$stmt->execute();
					$result = $stmt->get_result();
					 $org="";
					
					 while($row=mysqli_fetch_array($result))
						{
							
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
									$stmt = $dbCon->prepare("select count(companies.id) as num from company_profiles left join companies on companies.id=company_profiles.company_id  where (company_name like ? or cid=?) and email_verification_status=1");
									$stmt->bind_param("ss", $p,$_POST['message']);
									  $stmt->execute();
									$result1 = $stmt->get_result();
									$row1=mysqli_fetch_array($result1);
		
									//echo $a; die;
									//$s=$a+
									$stmt = $dbCon->prepare("select companies.id,company_name,company_email from company_profiles left join companies on companies.id=company_profiles.company_id  where  (company_name like ? or cid=?) and email_verification_status=1 order by company_name limit ?,20");
									$stmt->bind_param("ssi", $p,$_POST['message'],$a);
									
									  $stmt->execute();
									$result = $stmt->get_result();
									 $org="";
									
									 while($row=mysqli_fetch_array($result))
										{
											$enc=$this->encrypt_decrypt('encrypt',$row['id']);
											$org=$org.'<tr>
												
												<td class="brdb_new"><a href="#" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
										}		
										
										$i=20-($row1['num']-$a);
										if($i>0)
										{
									$stmt = $dbCon->prepare("select id,company_name,company_email from virtual_company where is_deleted=0 and (company_name like ? or cid=?) order by company_name limit 0,?");
									$stmt->bind_param("ssi", $p,$_POST['message'],$i);
									  $stmt->execute();
									$result = $stmt->get_result();
									
									
									 while($row=mysqli_fetch_array($result))
										{
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
	$stmt = $dbCon->prepare("select count(companies.id) as num from company_profiles left join companies on companies.id=company_profiles.company_id where  (company_name like ? or cid=?)  and email_verification_status=1");
						$stmt->bind_param("ss", $p,$_POST['message']);
					
		
		  $stmt->execute();
        $result2 = $stmt->get_result();
		$row2=mysqli_fetch_array($result2);
			
		$stmt = $dbCon->prepare("select count(id) as num from virtual_company  where is_deleted=0 and  (company_name like ? or cid=?) ");
						$stmt->bind_param("ss", $p,$_POST['message']);
					
		
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
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						$stmt = $dbCon->prepare("select count(companies.id) as num from company_profiles left join companies on companies.id=company_profiles.company_id  where  (company_name like ? or cid=?)  and email_verification_status=1");
						$stmt->bind_param("ss", $p,$_POST['message']);
					
		
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
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email from company_profiles left join companies on companies.id=company_profiles.company_id   where  (company_name like ? or cid=?)   and email_verification_status=1 order by company_name limit ?,?");
				 $stmt->bind_param("ssii", $p,$_POST['message'],$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				//$row=mysqli_fetch_array($result);
				//print_r($row); die;
				 while($row=mysqli_fetch_array($result))
					{
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
									$org=$org.'<tr>
												
												<td class="brdb_new"><a href="#" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
					}		 
		}
		
		else if($row1['num']< $a)
		{
				//echo "jain";	
									$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
									$stmt = $dbCon->prepare("select id,company_name,company_email from virtual_company  where is_deleted=0 and  (company_name like ? or cid=?) order by company_name limit ?,?");
								 $stmt->bind_param("ssii", $p,$_POST['message'],$a,$b);
								
					$stmt->execute();
					$result = $stmt->get_result();
					 $org="";
					
					 while($row=mysqli_fetch_array($result))
						{
							 
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
									$stmt = $dbCon->prepare("select count(companies.id) as num from company_profiles left join companies on companies.id=company_profiles.company_id  where (company_name like ? or cid=?) and email_verification_status=1");
									$stmt->bind_param("ss", $p,$_POST['message']);
									  $stmt->execute();
									$result1 = $stmt->get_result();
									$row1=mysqli_fetch_array($result1);
		
									//echo $a; die;
									//$s=$a+
									$stmt = $dbCon->prepare("select companies.id,company_name,company_email from company_profiles left join companies on companies.id=company_profiles.company_id  where (company_name like ? or cid=?) and email_verification_status=1 order by company_name");
									$stmt->bind_param("ss", $p,$_POST['message']);
									
									  $stmt->execute();
									$result = $stmt->get_result();
									 $org="";
									
									 while($row=mysqli_fetch_array($result))
										{
											$enc=$this->encrypt_decrypt('encrypt',$row['id']);
											$org=$org.'<tr>
												
												<td class="brdb_new"><a href="#" class=" dark_grey_txt" data-id="facebook">'.$row['company_name'].'</a>
												
												</td>
												
											</tr>';
										}		
										
										$i=$b-($row1['num']-$a);
										if($i>0)
										{
									$stmt = $dbCon->prepare("select id,company_name,company_email from virtual_company where is_deleted=0 and (company_name like ? or cid=?)  order by company_name limit 0,?");
									$stmt->bind_param("ssi", $p,$_POST['message'],$i);
									  $stmt->execute();
									$result = $stmt->get_result();
									
									
									 while($row=mysqli_fetch_array($result))
										{
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
	
	 
}
