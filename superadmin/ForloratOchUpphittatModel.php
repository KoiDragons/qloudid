<?php
	require_once('../AppModel.php');
	class ForloratOchUpphittatModel extends AppModel
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
	
		
			function forloradDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from lost_and_found  where status=1  order by created_on desc limit 0,20");
			
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function forloradCount()
		{
			$dbCon = AppModel::createConnection();
		
			$stmt = $dbCon->prepare("select count(id) as num from lost_and_found where status=1");
			
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreForloradDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select * from lost_and_found  where status=1 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
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
													
													
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['serial_number'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
													<td class="pad5 brdb_new tall nm hidden-xs ">
														<a href="#" onclick="updateId('.$row['id'].');"><div class="padtb5 ">Förlorad</div></a>
													</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	
		
		function lostandFoundDetail()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from lost_and_found  where status=0  order by created_on desc limit 0,20");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function lostandFoundCount()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from lost_and_found where  status=0");
			
			/* bind parameters for markers */
			
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreLostandFoundDetail()
		{
			$dbCon = AppModel::createConnection();
		
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select * from lost_and_found  where  status=0 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
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
													
													
													
													
													<td class="pad5 brdb_new tall nm hidden-xs ">'.$row['serial_number'].'
														
													</td>
				
												<td class="pad5 brdb_new tall nm hidden-xs ">
														<div class="padtb5 ">'.date('Y-m-d',strtotime($row['created_on'])).'</div>
													</td>
				
				</tr>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
	}						