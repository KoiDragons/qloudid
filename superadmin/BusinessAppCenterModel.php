<?php

require_once('../AppModel.php');
	
	class BusinessAppCenterModel extends AppModel
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
		 
		function BusinessAppCenterInformation()
		{
			$dbCon = AppModel::createConnection();
			
			$org=array();
			
			$stmt = $dbCon->prepare("select * from apps_detail where is_business=1");
				
			$stmt->execute();
			$result1 = $stmt->get_result();
			$j=0;
			while($row = $result1->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select count(id) as num  from app_selected_service_todos where app_id=? and is_selected=1");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$row['num']=$rowAmenities['num'];
			array_push($org,$row);
			$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$j++;
			}
			
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		} 
		
		
		function selectedAppServices($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$app_id=$this->encrypt_decrypt('decrypt',$data['app_id']);
			 
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{

			$stmt = $dbCon->prepare("select count(id) as num from professional_service_subcategory where professional_category_id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row1 = $result1->fetch_assoc();
			if($row1['num']==0)
			{
			continue;
			}
			
				$data['category_id']=$row['id'];
				if($j==0)
				{
				$org=$org.'<div class=" " style="border-color:#E8681F; ">
				<div class="description__content">
				<h4 class="changedText">'.$row['category_name'].'</h4>
				<p class="changedText">Orange marked are available services. </p>
				<div class="css-1jzh2co">	
				<div class="chip-container" id="category'.$row['id'].'">';
				$subctaegories=$this->selectedAppSubcategories($data);
				$org=$org.$subctaegories;
				$org=$org.'</div> 
				</div>	
				</div>
				</div> ';
				}
				else
				{

				$org=$org.'<div class="description__section" style="border-color:#E8681F; ">
				<div class="description__content">
				<h4 class="changedText">'.$row['category_name'].'</h4>
				<p class="changedText">Orange marked are available services</p>
				<div class="css-1jzh2co">	
				<div class="chip-container" id="category'.$row['id'].'">';
				$subctaegories=$this->selectedAppSubcategories($data);
				$org=$org.$subctaegories;
				$org=$org.'</div> 
				</div>	
				</div>
				</div> ';
				}
				$j++;
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		
			function selectedAppSubcategories($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$app_id=$this->encrypt_decrypt('decrypt',$data['app_id']);
			 
			$stmt = $dbCon->prepare("select app_selected_service_todos.id,is_selected,subcategory_name from app_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=app_selected_service_todos.professional_subcategory_id where app_selected_service_todos.professional_category_id=? and app_id=?");
			$stmt->bind_param("ii", $data['category_id'],$app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
			if($row['is_selected']==1)
			{
			$selected='<a href="javascript:void(0);"  onclick="updateServiceCategory('.$data['category_id'].','.$row['id'].',0);">
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected" style="border:1px solid #E8681F!important; background-color:#E8681F !important; color:#000000;">
													 <span class="chip_content">
														 
														<span class="chip_text changedText fsz14">'.$row['subcategory_name'].'</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$selected='<a href="javascript:void(0);"   onclick="updateServiceCategory('.$data['category_id'].','.$row['id'].',1);">
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:#23262f;">
															   <span class="chip_content">
																   
																  <span class="chip_text   changedText fsz14" style="color:white;">'.$row['subcategory_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}

		$org=$org.$selected;
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		  function appServicesTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$app_id=$this->encrypt_decrypt('decrypt',$data['app_id']);
			
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  app_selected_service_todos where app_id=?)");
			$stmt->bind_param("i", $app_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into app_selected_service_todos ( professional_category_id,professional_subcategory_id,app_id, created_on, modified_on) values (?, ?,?, now(), now())");
			$stmt->bind_param("iii",$row['professional_category_id'],$row['id'],$app_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		function updateServiceCategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update app_selected_service_todos set is_selected=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'],$_POST['service_id']);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
			
	}
