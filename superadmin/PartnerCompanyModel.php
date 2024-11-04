<?php

require_once('../AppModel.php');
	
	class PartnerCompanyModel extends AppModel
	{
	
			function approvePartner($data)
		{
			$dbCon = AppModel::createConnection();
			$partner_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("update company_partner_type set status=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $partner_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
			function rejectPartner($data)
		{
			$dbCon = AppModel::createConnection();
			$partner_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("update company_partner_type set status=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $partner_id);
			$stmt->execute();
			
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
		
		
		function partnerCount()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_partner_type where status=0");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function partnerDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
				$stmt = $dbCon->prepare("select company_partner_type.id,partner_type,created_on,company_name from company_partner_type left join companies on companies.id=company_partner_type.company_id left join partner_type on partner_type.id= company_partner_type.partner_type_id  where status=0 order by created_on desc limit 0,50");
				
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function morePartnerCompany()
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select company_partner_type.id,partner_type,created_on,company_name from company_partner_type left join companies on companies.id=company_partner_type.company_id left join partner_type on partner_type.id= company_partner_type.partner_type_id  where status=0 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				<td class="brdb_new padr5 padb10 hidden-xs" >
				<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
				</td>
				
				<td class="pad10 brdb_new">
				<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
				background-position: 50%;
				border-radius: 10%;" >'.substr($row['company_name'],0,1).' </div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.substr($row['company_name'],0,20).'</div>
				</td>
				
				
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['partner_type'].'</div>
				</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function partnerCountApproved()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_partner_type where status=1");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function partnerDetailApproved()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
				$stmt = $dbCon->prepare("select company_partner_type.id,partner_type,created_on,company_name from company_partner_type left join companies on companies.id=company_partner_type.company_id left join partner_type on partner_type.id= company_partner_type.partner_type_id  where status=1 order by created_on desc limit 0,50");
				
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function morePartnerCompanyApproved()
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select company_partner_type.id,partner_type,created_on,company_name from company_partner_type left join companies on companies.id=company_partner_type.company_id left join partner_type on partner_type.id= company_partner_type.partner_type_id  where status=1 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				<td class="brdb_new padr5 padb10 hidden-xs" >
				<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
				</td>
				
				<td class="pad10 brdb_new">
				<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
				background-position: 50%;
				border-radius: 10%;" >'.substr($row['company_name'],0,1).' </div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.substr($row['company_name'],0,20).'</div>
				</td>
				
				
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['partner_type'].'</div>
				</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	function partnerCountRejected()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from company_partner_type where status=2");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function partnerDetailRejected()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
				$stmt = $dbCon->prepare("select company_partner_type.id,partner_type,created_on,company_name from company_partner_type left join companies on companies.id=company_partner_type.company_id left join partner_type on partner_type.id= company_partner_type.partner_type_id  where status=2 order by created_on desc limit 0,50");
				
				$stmt->execute();
				$result1 = $stmt->get_result();
				$j=0;
				while($row = $result1->fetch_assoc())
				{
			
				array_push($org,$row);
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$j++;
				}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function morePartnerCompanyRejected()
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select company_partner_type.id,partner_type,created_on,company_name from company_partner_type left join companies on companies.id=company_partner_type.company_id left join partner_type on partner_type.id= company_partner_type.partner_type_id  where status=2 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16">
				<td class="brdb_new padr5 padb10 hidden-xs" >
				<input type="checkbox" class="check toggle-visited toggle-class"  data-closest="form" data-check-all="true" data-classes="active" data-class-closest=".style_base" data-class-check-all="true" />
				</td>
				
				<td class="pad10 brdb_new">
				<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
				background-position: 50%;
				border-radius: 10%;" >'.substr($row['company_name'],0,1).' </div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.substr($row['company_name'],0,20).'</div>
				</td>
				
				
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['partner_type'].'</div>
				</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}	
	}
