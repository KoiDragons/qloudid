<?php
	require_once('../AppModel.php');
	
	class PartnerEndCustomerModel extends AppModel
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
		
		
		function receptionistCount()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from receptionist_company");
			
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function receptionistDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select receptionist_company.id,receptionist_company_name,company_name from receptionist_company left join companies on companies.id=receptionist_company.company_id order by created_on desc limit 0,50");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j=$j+1;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function moreReceptionistDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*50;
			$b=$a+50;
			$stmt = $dbCon->prepare("select receptionist_company.id,receptionist_company_name,company_name from receptionist_company left join companies on companies.id=receptionist_company.company_id order by created_on desc limit ?,? ");
			
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
				border-radius: 10%;" >'.substr($row['receptionist_company_name'],0,1).' </div>
				</td>
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['receptionist_company_name'].'</div>
				</td>
				
				
				
				<td class="pad5 brdb_new tall cn">
				<div class="padtb5 " >'.$row['company_name'].'</div>
				</td>
				
				
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	}
