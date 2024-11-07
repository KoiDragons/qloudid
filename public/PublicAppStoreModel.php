<?php
	require_once('../AppModel.php');
	class PublicAppStoreModel extends AppModel
	{
		
		function getPermissionDetail()
		{
			$dbCon = AppModel::createConnection();
			$country_id= 201;
			$stmt = $dbCon->prepare("select manage_apps_permission.id,is_permission,app_name,is_business,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  and is_permission=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		 function appFeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id=$this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from `qloudid`.`app_start_fee_info` where app_id=(select id from manage_apps_permission where app_id=? and country_id=201)");
					/* bind parameters for markers */
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into app_start_fee_info (app_id) values(?)");
			/* bind parameters for markers */
			$stmt->bind_param("i",$app_id);
			$stmt->execute();
			$stmt = $dbCon->prepare("select * from app_start_fee_info where app_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			}
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function appPriceDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			$stmt = $dbCon->prepare("select * from app_price_info where app_id=? and country_id =201");
			/* bind parameters for markers */
			$cont=0;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			array_push($org,$row);
			$org[$cont]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
			$cont++;
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			}
		
		function changeCountry()
		{
			$dbCon = AppModel::createConnection();
			$country_id= $_POST['cid'];
			$stmt = $dbCon->prepare("select manage_apps_permission.id,is_permission,app_name,is_business,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where country_id=?  and is_permission=1");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $country_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				$enc=$this->encrypt_decrypt('encrypt',$row['id']);
				if($row['is_business']==1)
				{
					$business='Business';
				}
				else
				{
				$business='Personal';
				}
				
				
				$org=$org.'	<div class="xs-wi_100 wi_25 fleft bs_bb pad8 talc " >
														<div class="toggle-parent wi_100 dflex alit_s white_bg" >
															<div class="wi_100 dnone_pa ">
																<a href="PublicAppStore/productPage/'.$enc.'" class="style_base hei_240p dblock bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
																	<div class="trf_y-12p_ph trans_all2">
																		<div class="wi_100 hei_90p dflex justc_c alit_c bs_bb">
																			<span class="dblock wi_100 maxwi_100p  maxhei_100p padtb5  fsz50 black_txt">
																				<span class="fa-stack ">
																				  <i class="far fa-circle fa-stack-2x '.$row['app_bg'].'"></i>
																				  <i class="black_txt '.$value['app_icon'].'" ></i>
																				</span></span>
																		</div>
																		
																		<div class="trf_y-10p_ph trans_all2 padrbl15 padt10">
																			<h3 class="ovfl_hid pad0 txtovfl_el ws_now lgn_hight_24 bold fsz16 segdblue_txt padt10">'.$row['app_name'].'</h3>
																			<span class="dblock marb5 midgrey_txt">'.$business.'</span>
																			<div class="opa0 opa1_ph lgn_hight_15 fsz14 seggreen_txt trans_all2">View details</div>
																		</div>
																	</div>
																</a>
															</div>
															
															<div class="wi_100 hide dblock_pa style_base hei_190p  bs_bb pad25 brd brdclr_seggreen_h brdrad4 trans_all2">
																<h3 class="marb15 talc bold fsz16">Medlemskap HR</h3>
																<div class="marb10 padrl20">
																	<a href="#" class=" dblock blue_bg talc lgn_hight_40 white_txt" data-target="#pipefy_sliding_modal">läs mer</a>
																</div>
																<div class="padrl20">
																	<a href="PublicAppStore/productPage/'.$enc.'" class="dblock pfgreen_bg talc lgn_hight_40 white_txt">Besök sidan</a>
																</div>
															</div>
														</div>
													</div>
												';
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function getAppsPermissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			
			
			
			$stmt = $dbCon->prepare("select country_id,manage_apps_permission.id,is_permission,app_name,presentation,funktioner,nyheter,is_downloaded,image_path,app_id,app_icon,app_bg from manage_apps_permission left join apps_detail on apps_detail.id=manage_apps_permission.app_id where manage_apps_permission.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			$row = $result->fetch_assoc();
			if($row['app_id']!=1 && $row['app_id']!=2 && $row['app_id']!=3 && $row['app_id']!=6  && $row['app_id']!=12 && $row['app_id']!=13 && $row['app_id']!=57)
			{
				$row['image_path']='https://safeqloud-228cbc38a2be.herokuapp.com/html/usercontent/images/dstricts/logo1.jpeg';
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
		function getAppsPermissionDetailRight($data)
		{
			$dbCon = AppModel::createConnection();
			
			$app_id= $this -> encrypt_decrypt('decrypt',$data['aid']);
			
			$stmt = $dbCon->prepare("select app_id from manage_apps_permission where manage_apps_permission.id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row1 = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select apps_detail.id,is_permission,is_business,app_name,presentation,funktioner,nyheter,is_downloaded,image_path,app_id ,app_icon,app_bg from apps_detail left join manage_apps_permission on apps_detail.id=manage_apps_permission.app_id where apps_detail.id!=? and apps_detail.id in(select id from apps_detail where company_id=(select company_id from apps_detail where id=?)) and country_id=?  and is_permission=1 order by app_name");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $row1['app_id'],$row1['app_id'],$data['country_id']);
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
		
		function countryList()
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name from country where id>-1 and is_visible=1");
			/* bind parameters for markers */
			$cont=1;
			
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
			
		
		
		}		