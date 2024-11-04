<?php
require_once('../AppModel.php');

class VirtualCompanyListModel extends AppModel
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
	
	
	function companyCount()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from user_virtual_company");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		 return $row;
	}
	
	
	function companyDetail()
	{
		 $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select id,company_name from user_virtual_company order by company_name  limit 0,20");
        
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
	
	
	
	function moreCompanyDetail()
	{
		 $dbCon = AppModel::createConnection();
		$limit=$_POST['id']*20;
		$stmt = $dbCon->prepare("select id,company_name from user_virtual_company  order by company_name  limit ?,20");
        
        /* bind parameters for markers */
		$stmt->bind_param("i", $limit);
        $stmt->execute();
        $result = $stmt->get_result();
		$org='';
		while($row = $result->fetch_assoc())
		{
			$img='';
			
				$img='<div class="wi_60p xs-wi_50p hei_60p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 lgtgrey_bg" style="background-repeat: no-repeat;
									background-position: 50%;
									border-radius: 10%;" >'.substr($row['company_name'],0,1).' </div>';
			
			
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
																			<a href="#" class="get-company-info1 dark_grey_txt txt_0070e0_sbh">'.$row['company_name'].'</a>
																		</h3>
																		<a href="#" class="dnone dblock_sbh padl5"><span class="fa fa-star-o"></span></a>
																	</div>
																	<div class="mart5"><a href="mailto:kowaken.ghirmai@qmatchup.com" class="txt_4a"></a></div>
																	
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

	}
