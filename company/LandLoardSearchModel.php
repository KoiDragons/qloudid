<?php
require_once('../AppModel.php');
class LandLoardSearchModel extends AppModel
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
    function companyListSearch($data)
    {
        $dbCon = AppModel::createConnection();
		$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		ini_set('memory_limit', '-1');
		 $org="";
						$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						
		$a=0;
		$b=20;
		
		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
		
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id,address  from companies left join company_profiles on company_profiles.company_id=companies.id   where company_name like ?  and email_verification_status=1 and companies.id not in (select receiving_company from company_landloard where property_id=?) limit ?,?");
					
					 
				 $stmt->bind_param("siii", $p,$location_id,$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				 while($row=mysqli_fetch_array($result))
					{
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
				$company_name=str_ireplace(htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1'),"<span class='bold dblue_txt'>".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."</span>",$row['company_name']);
									$org=$org.'<a href="../../sendRequest/'.$data['cid'].'/'.$data['lid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
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
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$company_name.'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['address'].'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a> ';
					}	
				 
	
			 $stmt->close();
        $dbCon->close();
		return $org;
	}
	function companyListSearchCount($data)
    {
        $dbCon = AppModel::createConnection();
		$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		ini_set('memory_limit', '-1');
		 $org="";
		$p="%".htmlentities($_POST['message'],ENT_NOQUOTES, 'ISO-8859-1')."%";
						//echo $p; die;
	$stmt = $dbCon->prepare("select count(companies.id) as num from companies where company_name like ? and email_verification_status=1 and id not in (select receiving_company from company_landloard where property_id=?)");
						$stmt->bind_param("si", $p,$location_id);
					
		
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
		
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
		ini_set('memory_limit', '-1');
		 $org="";
						$p="%".urldecode($_POST['message'])."%";
		
		$a=$_POST['id']*20;
		$b=20;
					$stmt = $dbCon->prepare("select companies.id,company_name,company_email,country_id,address  from companies left join company_profiles on company_profiles.company_id=companies.id   where company_name like ?  and email_verification_status=1 and companies.id not in (select receiving_company from company_landloard where property_id=?) limit ?,?");
				 $stmt->bind_param("siii", $p,$location_id,$a,$b);
				
				 $stmt->execute();
				$result = $stmt->get_result();
				
				//$row=mysqli_fetch_array($result);
				//print_r($row); die;
				 while($row=mysqli_fetch_array($result))
					{
						
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				
			$company_name=str_ireplace(urldecode($_POST['message']),"<span class='bold dblue_txt'>".urldecode($_POST['message'])."</span>",$row['company_name']);
									$org=$org.'<a href="../../sendRequest/'.$data['cid'].'/'.$data['lid'].'/'.$enc.'" ><div class="column_m container  marb5   fsz14 dark_grey_txt">
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
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold  black_txt">'.$company_name.'</span>
																	
																	 <span class="edit-text  fsz18  jain2 dblock  lgn_hight_18 ">'.$row['address'].'</span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right blue_67cff7"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div></a> ';
					}	
	
		$stmt->close();
        $dbCon->close();
		return $org;
	}
	function sendRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$location_id= $this -> encrypt_decrypt('decrypt',$data['lid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
				$stmt = $dbCon->prepare("INSERT INTO company_landloard (property_id,created_on,requesting_company,receiving_company) VALUES ( ?, now(), ?, ?)");
				
				
				$stmt->bind_param("iii", $location_id,$company_id,$request_id);
				$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
}
