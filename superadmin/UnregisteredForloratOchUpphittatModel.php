<?php
require_once('../AppModel.php');

class  UnregisteredForloratOchUpphittatModel extends AppModel
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
	
	
	}
