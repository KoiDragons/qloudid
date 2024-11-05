<?php
	require_once('../AppModel.php');
	class QloudParkingModel extends AppModel
	{
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=17");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select last_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
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
		
		function parkingSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$p_id=$this->encrypt_decrypt('decrypt',$data['p_id']);
			
			$stmt = $dbCon->prepare("select id,address,serial_number,created_on  from qloud_parking where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $p_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function saveInformation($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("insert into qloud_parking(address,serial_number,user_id,created_on)
			values(?,?,?,now())");
			$stmt->bind_param("ssi",$_POST['adrs1'],$_POST['serial'],$data['user_id']);
			if($stmt->execute())
			{
				
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		function updateInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$p_id=$this->encrypt_decrypt('decrypt',$data['p_id']);
			$stmt = $dbCon->prepare("update qloud_parking set address=?,serial_number=? where id=?");
			$stmt->bind_param("ssi",$_POST['adrs1'],$_POST['serial'],$p_id);
			if($stmt->execute())
			{
				
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
		
			
		}
		
		function parkingCount($data)
		{
			$dbCon = AppModel::createConnection();
			//$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num  from qloud_parking where user_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function parkeringDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select id,address,serial_number,created_on  from qloud_parking where user_id=? and status=0 limit 0,20");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
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
			
			function moreParkeringDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$a=$_POST['id']*20;
			$b=20;
			$stmt = $dbCon->prepare("select id,address,serial_number,created_on  from qloud_parking where user_id=? and status=0 limit ?,?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				$org=$org.'<tr class="fsz16 xs-fsz16">
													
													<td class="xs-wi_100 pad5 brdb_new tall cn">
														<div class="padtb5 " ><a href="QloudParking/editParking/'.$enc.'">'.$row['address'].'</div>
													</td>
													
													<td class="pad5 brdb_new hidden-xs tall cd">
														<div class="padtb5 ">'.$row['serial_number'].'</div>
													</td>
													<td class="pad5 brdb_new tall hidden-xs sts">
														<div class="padtb5">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													
												</tr>';
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
	}								