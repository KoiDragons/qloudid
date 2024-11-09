<?php
require_once('../AppModel.php');

class EmployeeDetailModel extends AppModel
{
	
	function employeeVerificationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']); 
				$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=(select user_login_id from employees where id=?)");
				$stmt->bind_param("i", $employee_id);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				 
			$stmt->close();
			$dbCon->close();
			return $rowEmp;
			
			
		}
		
	
	 function professionalTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$employee_id=$this->encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  employee_selected_service_todos where company_id=? and employee_id=?)");
			$stmt->bind_param("ii", $company_id,$employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into employee_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id,employee_id, created_on, modified_on) values (?, ?,?,?, now(), now())");
			$stmt->bind_param("iiii",$row['professional_category_id'],$row['id'],$company_id,$employee_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function serviceTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$employee_id=$this->encrypt_decrypt('decrypt',$data['eid']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_service_category");
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				if($data['objectType']==$row['id'])
				{
					$block='block';
				}
				else
				{
					$block='none';
				}
				$stmt = $dbCon->prepare("select count(id)as num from employee_selected_service_todos where professional_category_id=? and is_selected=1 and company_id=? and employee_id=?");
				$stmt->bind_param("iii", $row['id'],$company_id,$employee_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.safeqloud.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
								<div>
								<span class="apartheading changedText" >'.str_ireplace('&','and',html_entity_decode($row['category_name'])).'</span><span class="aprtSubheading changedText" id="service'.$row['id'].'">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: '.$block.';">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content changedText">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select employee_selected_service_todos.id,is_selected,subcategory_name from employee_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=employee_selected_service_todos.professional_subcategory_id where employee_selected_service_todos.professional_category_id=? and employee_selected_service_todos.company_id=? and employee_id=?");
			$stmt->bind_param("iii", $row['id'],$company_id,$employee_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				if($row1['is_selected']==1)
				{
					$checked='checked';
					$update=0;
				}
				else
				{
					$checked='';
					$update=1;
				}
				$org=$org.' <div data-testid="'.$row1['subcategory_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0 changedText">'.str_ireplace('&','and',html_entity_decode($row1['subcategory_name'])).'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');"><input data-testid="test-checkbox-'.$row1['subcategory_name'].'" name="'.$row1['subcategory_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		
		
		function serviceEmployeeSkillDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$employee_id=$this->encrypt_decrypt('decrypt',$data['eid']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_service_category");
			 
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			 $i=0;
			 $content='';
			while($row = $result->fetch_assoc())
			{
				if($i>0)
				{
					$content='description__section';
				}
				 $org=$org.'<div class="'.$content.'" style="border-color:#23262f; ">
				<div class="description__content">
				<h4 class="changedText" style="margin-bottom:16px;">'.$row['category_name'].'</h4>
				<p class="changedText">Blue marked are skills of the employee. </p>
				<div class="css-1jzh2co">	
										<div class="chip-container" id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select employee_selected_service_todos.id,is_selected,subcategory_name from employee_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=employee_selected_service_todos.professional_subcategory_id where employee_selected_service_todos.professional_category_id=? and employee_selected_service_todos.company_id=? and employee_id=? order by subcategory_name");
			$stmt->bind_param("iii", $row['id'],$company_id,$employee_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
				 
				
			 						
			if($row1['is_selected']==1)
			{
			$org=$org.'<a href="javascript:void(0);"  onclick="updateAminity('.$row1['id'].','.$row['id'].');" >
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected" style="border:1px solid #52d4f4!important; background-color:transparent !important; color:#52d4f4;">
													 <span class="chip_content">
													 
														<span class="chip_text fsz14 changedText">'.$row1['subcategory_name'].'</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$org=$org.'<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['id'].');" >
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:transparent;">
															   <span class="chip_content">
																  
																  <span class="chip_text fsz14 txt_777E90 changedText">'.$row1['subcategory_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
				 	
			}			
				$i++;							
			$org=$org.'</div></div></div></div>';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		 
		
		
		
		
		
		function updateCategoryServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_selected,professional_category_id,employee_id,company_id from employee_selected_service_todos where id=?");
			$stmt->bind_param("i",$_POST['service_todo_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['is_selected']==0)
			{
			$is_selected=1;	
			}
			else
			{
				$is_selected=0;
			}
			$stmt = $dbCon->prepare("update employee_selected_service_todos set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$is_selected,$_POST['service_todo_id']);
			$stmt->execute();
			
			/*$stmt = $dbCon->prepare("select count(id) as num from employee_selected_service_todos where employee_id=? and professional_category_id=? and is_selected=1 and company_id=?");
			$stmt->bind_param("iii",$row['employee_id'],$row['professional_category_id'],$row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();*/
			
			
			$stmt = $dbCon->prepare("select employee_selected_service_todos.id,is_selected,subcategory_name from employee_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=employee_selected_service_todos.professional_subcategory_id where employee_selected_service_todos.professional_category_id=? and employee_selected_service_todos.company_id=? and employee_id=? order by subcategory_name");
			$stmt->bind_param("iii", $row['professional_category_id'],$row['company_id'],$row['employee_id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 $org='';
			while($row1 = $result1->fetch_assoc())
			{
				 
				
			 						
			if($row1['is_selected']==1)
			{
			$org=$org.'<a href="javascript:void(0);"  onclick="updateAminity('.$row1['id'].','.$row['professional_category_id'].');" >
										 <div class="css-cedhmb">
												  <div tabindex="0" role="button" class="css-1w0xfwu">
													 <span class="chip chip_is-selected" style="border:1px solid #52d4f4!important; background-color:transparent !important; color:#52d4f4;">
													 <span class="chip_content">
													 
														<span class="chip_text fsz14 changedText">'.$row1['subcategory_name'].'</span>
													 </span>
												  </span>
												  </div>
											   </div>
											   </a>';
		}
		else
		{
		$org=$org.'<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$row['professional_category_id'].');" >
												<div  class="css-cedhmb">
														 <div tabindex="0" role="button"  class="css-1w0xfwu">
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:transparent;">
															   <span class="chip_content">
																  
																  <span class="chip_text fsz14 txt_777E90 changedText">'.$row1['subcategory_name'].'</span>
															   </span>
															</span>
														 </div>
													  </div></a>';	
		}
				 	
						
			 
			 
			}
			  
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function updateCategoryServiceAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$employee_id=$this->encrypt_decrypt('decrypt',$data['eid']);
			$stmt = $dbCon->prepare("update employee_selected_service_todos set is_selected=1,modified_on=now() where company_id=? and professional_category_id=? and employee_id=?");
			$stmt->bind_param("iii", $company_id,$_POST['cleaning_subcategory_id'],$employee_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
	
	function sendVerifyIdRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("insert into company_idverification_account_request (company_id, user_id, created_on, modified_on) values(?, ?, now(), now())");
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			 //echo $stmt->error; die;
			 
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$to            = 'kowaken.ghirmai@gmail.com';
			$subject       = "Verify ID request received!";
			$emailContent ='<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

<center style="width:100%;table-layout:fixed">

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">

<tbody><tr>

<td>

    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td>    

         <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">

<table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">

       <tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">

            <tbody><tr>

               <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">

                 <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>

                 <div style="display:none;max-height:0px;overflow:hidden">

								&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;

								

								</div>

            </td>

            </tr>           

        </tbody></table>

    </td>

</tr>

 </tbody></table>

        </div>

        </td>

        </tr>

        </tbody></table>

    



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">

<div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">





        

        </div>

        </td>

        </tr>

</tbody></table>



<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td style="padding-bottom:20px">

         <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">

       <tbody><tr>

<td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                 <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">

            <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>

                </td>

            </tr>

            <tr>

                <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                    <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

 </tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

    <tbody><tr>

	<td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">

		<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

			

			<table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">

				<tbody><tr>

				<td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">

                

					<div style="text-align: center; line-height: 22px; max-width: 600px;
    float: left;
    position: relative; ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828 !important;
width: 960px;
    position: relative;
    margin: 0 auto;




">
                           <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
    padding-left: 30px; margin-right: auto;
    margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                              <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Request</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Verify ID account request has beed received from '.$row['company_name'].'</div>
                           </div>
                        </div>
                     </div>
                 

				</td>

				</tr>

			</tbody></table>

			

		</div>

	</td>

	</tr>

</tbody></table>



 






  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">



    <tbody><tr>



      <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">



        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">



          



          <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">



            <tbody><tr>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



              <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">



                



                <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">



                  <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">



                    <tbody><tr>



                      <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">



                        <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">



                          <tbody><tr>



                            <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">



                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">



                                <tbody><tr>


                                  <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because your '.$row['company_name'].' have requested for Verify ID account</p>



                                  </td>



                                </tr>



                                

                                                                  

 


 



        



      </tbody></table>



    </td>



  </tr>
 </tbody></table>



                            </td>



                          </tr>



                        </tbody></table>



                      </div></td>



                    </tr>



                  </tbody></table>



                </div>



                



              </td>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



            </tr>



          </tbody></table>



          



        



      </td>



    </tr>



  </tbody></table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>



		

		

   

    </center>

</div></body></html>';
			sendEmail($subject, $to, $emailContent);
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	
 function developerCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select is_approved from company_idverification_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return -1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['is_approved'];	
			}
			
			
		}
		
	function listCardDetails($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,name_on_card,card_number from  company_cards where `company_id`=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['card_number']='**** **** **** '.substr($row['card_number'],-4);
				array_push($org,$row);
			}
			 
			return $org;
		}
	function isVerificator($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("update employees set is_verificator=1 where company_id=? and user_login_id=43");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select is_verificator from employees where company_id=? and user_login_id=?");
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['is_verificator'];	
			
			
			
		}
	
	function checkPermission($data)
		{
			$dbCon = AppModel::createConnection();
			  
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,is_admin from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			
			else
			{
				if($row['is_admin']==0)
				{
					$stmt->close();
					$dbCon->close();
					return 0;
				}
				else
				{
					$stmt->close();
					$dbCon->close();
					return 1;
				}
			}
			
			
		}
		
		function updateAdmin($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from companies where user_login_id=? and id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$stmt->close();
				$dbCon->close();
				return 0;
			}
			else
			{
			$stmt = $dbCon->prepare("select id,permission from manage_employee_permissions where user_id=? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(!empty($row))
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
			else
			{
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id=?");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		
		
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (is_admin, employee_id, permission, user_id, company_id, page_id, created_date, modified_date ) values(?, ?, ?, ?, ?, ?, now(),now())");
			/* bind parameters for markers */
			$cont=1;
			
		
			$stmt->bind_param("iiiiii",$cont,$row['id'],$cont,$data['user_id'],$company_id,$data['page_id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("select id,user_login_id from employees where company_id=? and user_login_id not in (select user_id from manage_employee_permissions where company_id=?)");
			/* bind parameters for markers */
			
			$stmt->bind_param("ii",$company_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into manage_employee_permissions (user_id,company_id,page_id,created_date,modified_date,employee_id) values(?, ?, ?, now(),now(),?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii",$row['user_login_id'],$company_id,$data['page_id'],$row['id']);
			$stmt->execute();
			}
			}
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			
			
			}
		
		function updateTerminationInfo($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
		$reason=htmlentities($_POST['reason'],ENT_NOQUOTES, 'ISO-8859-1');
		$stmt = $dbCon->prepare("insert into employee_relieving_information (user_id,company_id,created_on,employee_id,reason_for_relieving,when_to_relieve ) values(?, ?, now(),?, ?, ?)");
			/* bind parameters for markers */
			$cont=1;
		$stmt->bind_param("iiiss",$data['emp_user_id'],$company_id,$employee_id,$reason,$_POST['relieving_date']);
		$stmt->execute();
		$stmt->close();
        $dbCon->close();
		 return 1;
        
        
    }
	
	
	function updateTerminationSentInfo($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
		$reason=htmlentities($_POST['reason'],ENT_NOQUOTES, 'ISO-8859-1');
		$stmt = $dbCon->prepare("insert into employee_request_relieving_information (company_id,created_on,employee_id,reason_for_relieving,when_to_relieve ) values( ?, now(),?, ?, ?)");
			/* bind parameters for markers */
			$cont=1;
		$stmt->bind_param("iiss",$company_id,$employee_id,$reason,$_POST['relieving_date']);
		$stmt->execute();
		$stmt->close();
        $dbCon->close();
		 return 1;
        
        
    }
 
    function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		

		
        $stmt = $dbCon->prepare("select company_name from companies where companies.id = ?");
        
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	
	
	function relievingCount($data)
    {
        $dbCon = AppModel::createConnection();
        $employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
		

		
        $stmt = $dbCon->prepare("select count(id) as num from  employee_relieving_information where employee_id = ?");
        
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
   
   
   function relievingSentCount($data)
    {
        $dbCon = AppModel::createConnection();
        $employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select count(id) as num from  employee_request_relieving_information where employee_id = ?");
        /* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("i", $employee_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
		$dbCon->close();
		return $row['num'];
     }
	
	 
	 function employeeIdVerificationCount($data)
    {
        $dbCon = AppModel::createConnection();
        $employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select count(id) as num from  employee_identificator_verification_detail where employee_user_id =(select user_login_id from employees where id=?)");
        /* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		return $row;
        
        
    }
	
	
	 function sendEmailInvitaion($data)
    {
        $dbCon = AppModel::createConnection();
        $employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select concat_ws(' ',first_name,last_name) as name,email from  user_logins where id =(select user_login_id from employees where id=?)");
        /* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$to      = $row['email'];
		$subject = "You need to add ID";
		$emailContent ='<html><head><title>Reservation confirmed</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style type="text/css">
    /* GT AMERICA */

    @font-face {
      font-display: fallback;
      font-family: "GT America Regular";
      font-weight: 400;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Regular.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Medium";
      font-weight: 600;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Standard-Medium.ttf") format("truetype");
    }

    @font-face {
      font-display: fallback;
      font-family: "GT America Condensed Bold";
      font-weight: 700;
      src: url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff2") format("woff2"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.woff") format("woff"), url("https://www.exploretock.com/fonts/gt-america/GT-America-Condensed-Bold.ttf") format("truetype");
    }

    /* CLIENT-SPECIFIC RESET */

    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }

    /* Prevent WebKit and Windows mobile changing default text sizes */

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }

    /* Remove spacing between tables in Outlook 2007 and up */

    img {
      -ms-interpolation-mode: bicubic;
    }

    /* Allow smoother rendering of resized image in Internet Explorer */

    .im {
      color: inherit !important;
    }

    /* DEVICE-SPECIFIC RESET */

    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }

    /* iOS BLUE LINKS */

    /* RESET */

    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      display: block;
    }

    table {
      border-collapse: collapse;
    }

    table td {
      border-collapse: collapse;
      display: table-cell;
    }

    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }

    /* BG COLORS */

    .mainTable {
      background-color: #F0F0F0;
    }

    .mainTable--hospitality {
      background-color: #f7f2ed;
    }

    html {
      background-color: #F0F0F0;
    }

    /* VARIABLES */

    .bg-white {
      background-color: white;
    }

    .hr {
      /* Cross-client horizontal rule. Adapted from https://litmus.com/community/discussions/4633-is-there-a-reliable-1px-horizontal-rule-method */
      background-color: #d3d3d8;
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      mso-line-height-rule: exactly;
      line-height: 1px;
    }

    .textAlignLeft {
      text-align: left !important;
    }

    .textAlignRight {
      text-align: right !important;
    }

    .textAlignCenter {
      text-align: center !important;
    }

    .mt1 {
      margin-top: 6px;
    }

    .list {
      padding-left: 18px;
      margin: 0;
    }

    /* TYPOGRAPHY */

    body {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      color: #4f4f65;
      -webkit-font-smoothing: antialiased;
      -ms-text-size-adjust: 100%;
      -moz-osx-font-smoothing: grayscale;
      font-smoothing: always;
      text-rendering: optimizeLegibility;
    }

    .h1 {
      font-family: "GT America Condensed Bold", "Roboto Condensed", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 700;
      vertical-align: middle;
      font-size: 36px;
      line-height: 42px;
    }

    .h2 {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
      vertical-align: middle;
      font-size: 16px;
      line-height: 24px;
    }

    .text {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 21px;
    }

    .text-list {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 16px;
      line-height: 25px;
    }

    .textSmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 400;
      font-size: 14px;
    }

    .text-xsmall {
      font-family: "GT America Regular", "Roboto", "Helvetica", "Arial", sans-serif;
      font-size: 11px;
      text-transform: uppercase;
      line-height: 22px;
      letter-spacing: 1px;
    }

    .text-bold {
      font-weight: 600;
    }

    .text-link {
      text-decoration: underline;
    }

    .text-linkNoUnderline {
      text-decoration: none;
    }

    .text-strike {
      text-decoration: line-through;
    }

    /* FONT COLORS */

    .textColorDark {
      color: #23233e;
    }

    .textColorNormal {
      color: #4f4f65;
    }

    .textColorBlue {
      color: #2020c0;
    }

    .textColorGrayDark {
      color: #7B7B8B;
    }

    .textColorGray {
      color: #A5A8AD;
    }

    .textColorWhite {
      color: #FFFFFF;
    }

    .textColorRed {
      color: #df3232;
    }

    /* BUTTON */

    .Button-primary-wrapper {
      border-radius: 3px;
      background-color: #2020C0;
    }

    .Button-primary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #ffffff;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    .Button-secondary-wrapper {
      border-radius: 3px;
      background-color: #ffffff;
    }

    .Button-secondary {
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      border-radius: 3px;
      border: 1px solid #2020C0;
      color: #2020C0;
      display: block;
      font-size: 16px;
      font-weight: 600;
      padding: 18px;
      text-decoration: none;
    }

    /* LAYOUT */

    .Content-container {
      padding-left: 60px;
      padding-right: 60px;
    }

    .Content-container--main {
      padding-top: 54px;
      padding-bottom: 60px;
    }

    .Content {
      width: 580px;
      margin: 0 auto;
    }

    .wrapper {
      max-width: 600px;
    }

    .section {
      padding: 24px 0px;
      border-bottom: 1px solid #d3d3d8;
    }

    .section--noBorder {
      padding: 24px 0px 0;
    }

    .section--last {
      padding: 24px 0px;
    }

    .message {
      background-color: #F4F4F5;
      padding: 18px;
    }

    .card {
      border: 1px solid #d3d3d8;
      padding: 18px;
    }

    /* HEADER */

    .header-tockLogoImage {
      display: block;
      color: #F0F0F0;
    }

    .header-heroImage {
      padding-bottom: 24px;
    }

    /* PREHEADER */

    .preheader {
      display: none;
      font-size: 1px;
      color: #FFFFFF;
      line-height: 1px;
      max-height: 0px;
      max-width: 0px;
      opacity: 0;
      overflow: hidden;
    }

    /* BANNER */

    .notice {
      padding: 12px;
      background: #23233E;
      color: #FFFFFF;
      display: block;
      font-size: 14px;
      font-family: "GT America Medium", "Roboto", "Helvetica", "Arial", sans-serif;
      font-weight: 600;
    }

    /* INTRO */

    .section--intro {
      padding-bottom: 48px;
    }

    /* BOOKING INFO */

    .business-logo__container {
      width: 48px;
      height: 48px;
      border-radius: 3px;
      border: 1px solid #d3d3d8;
      overflow: hidden;
    }

    .business-logo__image {
      border: 1px solid transparent;
      border-radius: 3px;
      width: 48px;
      height: 48px;
      display: block;
    }

    .business-address--address {
      width: 50%;
    }

    .business-address--map {
      width: 50%;
    }

    .business-address--map-image {
      width: 100%;
    }

    /* MOBILE TICKETS */

    .mobile-ticket--description {
      width: 65%;
      margin-top: 12px;
      margin-right: 5%;
    }

    .mobile-ticket--code {
      width: 30%;
    }

    .mobile-ticket--code-image {
      width: 100%;
    }

    /* RESERVATION ACTIONS */

    .linksTable {
      border-bottom: 1px solid #d3d3d8;
    }

    .linksTableRow {
      padding: 24px 12px;
    }

    .actions-icon {
      vertical-align: middle;
    }

    .actions-text {
      vertical-align: middle;
    }

    /* RECEIPT */

    .receipt__container {
      border: 1px solid #d3d3d8;
      padding: 24px;
    }

    .receipt__row {
      border-top: 1px solid #d3d3d8;
    }

    /* FEEDBACK ICONS */

    .feedback-link {
      border: 1px solid #d4d5da;
      border-radius: 3px;
      display: inline-block;
      width: calc(32% - 2px);
      padding: 10px 0;
    }

    .feedback-link-bumper {
      display: inline-block;
      width: 1%;
    }

    .feedback-link img {
      height: 50px;
      width: 50px;
    }

    /* SOCIAL ICONS */

    .social-link {
      display: inline-block;
      width: auto;
    }

    .social-link-text {
      padding: 14px 24px 14px 14px;
    }

    /* TABLET STYLES */

    @media screen and (max-width: 648px) {
      /* DEVICE-SPECIFIC RESET */
      div[style*="margin: 16px 0;"] {
        margin: 0 !important;
      }
      /* ANDROID CENTER FIX */
      /* LAYOUT */
      .wrapper {
        width: 100% !important;
        max-width: 100% !important;
      }
      .Content {
        width: 90% !important;
      }
      .Content-container {
        padding-left: 36px !important;
        padding-right: 36px !important;
      }
      .Content-container--main {
        padding-top: 30px !important;
        padding-bottom: 42px !important;
      }
      .responsiveTable {
        width: 100% !important;
      }
      /* RESERVATION ACTIONS */
      .linksTableRow {
        padding-left: 0 !important;
        padding-right: 0 !important;
        padding-top: 12px !important;
        padding-bottom: 12px !important;
      }
      .linksTableRow--borderRight {
        border-right: none !important;
        padding-left: 0 !important;
        padding-right: 0 !important;
      }
      /* FEEDBACK LINK */
      .feedback-link img {
        height: 38px !important;
        width: 38px !important;
      }
    }

    /* MOBILE STYLES */

    @media screen and (max-width: 480px) {
      /* TYPOGRAPHY */
      .h1 {
        font-size: 30px !important;
        line-height: 30px !important;
      }
      .text {
        font-size: 16px !important;
        line-height: 22px !important;
      }
      /* BUTTON */
      .mobile-buttonContainer {
        width: 100% !important;
      }
      /* LAYOUT */
      .Content {
        width: 100% !important;
      }
      .Content-container {
        padding-left: 18px !important;
        padding-right: 18px !important;
      }
      .Content-container--main {
        padding-top: 24px !important;
        padding-bottom: 30px !important;
      }
      .section {
        padding: 18px 0 !important;
      }
      .section--last {
        padding: 18px 0 !important;
      }
      .header {
        padding: 0 18px !important;
      }
      .business-address--address {
        width: 100% !important;
      }
      .business-address--map {
        margin-top: 30px !important;
        width: 100% !important;
      }
      .mobile-ticket--description {
        width: 100% !important;
        margin-top: 0px !important;
      }
      .mobile-ticket--code {
        margin-top: 30px !important;
        margin-left: 0;
        width: 100% !important;
      }
      /* RECEIPT */
      .receipt__container {
        padding: 12px !important;
      }
      /* SOCIAL ICONS */
      .social-link {
        display: block !important;
        width: 100% !important;
        border-bottom: 1px solid #d3d3d8 !important;
      }
      /* INTRO */
      .section--intro {
        padding-top: 18px !important;
        padding-bottom: 18px !important;
      }
    }
  </style>



   
  <!--[if mso]>
    <style type="text/css">
.h1 {font-family: "Helvetica", "Arial", sans-serif !important; font-weight: 700 !important; vertical-align: middle !important; font-size: 36px !important; mso-line-height-rule: exactly;line-height: 42px !important;}
.h2 {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 600 !important;vertical-align: middle !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 24px !important;}
.text {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 21px !important;}
.text-list {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 16px !important;mso-line-height-rule: exactly;line-height: 25px !important;}
.textSmall {font-family: "Helvetica", "Arial", sans-serif !important;font-weight: 400 !important;font-size: 14px !important;}
.text-xsmall {font-family: "Helvetica", "Arial", sans-serif !important;font-size: 11px !important;text-transform: uppercase !important;mso-line-height-rule: exactly;line-height: 22px !important;letter-spacing: 1px !important;}
.text-bold {font-weight: 600 !important;}
.text-link {text-decoration: underline !important;}
.text-linkNoUnderline {text-decoration: none !important;}
.text-strike {text-decoration: line-through !important;}
.textColorDark {color: #23233e !important;}
.textColorNormal {color: #4f4f65 !important;}
.textColorBlue {color: #2020c0 !important;}
.textColorGray {color: #A5A8AD !important;}
.textColorWhite {color: #FFFFFF !important;}
.Button-primary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #ffffff !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
.Button-secondary {font-family: "Helvetica", "Arial", sans-serif !important;border-radius: 3px !important;border: 1px solid #2020C0 !important;color: #2020C0 !important;display: block !important;font-size: 16px !important;font-weight: 600 !important;padding: 18px !important;text-decoration: none !important;}
    </style>
    <![endif]-->
  <!-- HIDDEN PREHEADER TEXT -->
  </head><body><div class="preheader" style="display: none; font-size: 1px; color: rgb(255, 255, 255); line-height: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
  </div>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" class=" mainTable  " style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: rgb(240, 240, 240);">
    <tbody><tr><td style="display:none !important;
 visibility:hidden;
 mso-hide:all;
 font-size:1px;
 color:#ffffff;
 line-height:1px;
 max-height:0px;
 max-width:0px;
 opacity:0;
 overflow:hidden; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> We are thrilled that you will be joining us. If yo... </td>
    <!-- HEADER -->
    </tr><tr>
      <td align="center" class="header" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; width: 580px; margin: 0 auto;">
          <tbody><tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <h1 style="font-size: 33px;font-weight: 800;line-height: 30px;">Dstricts</h1>               </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody></table>
        <!--[if (gte mso 9)|(IE)]>
    </td>
    </tr>
    </table>
    <![endif]-->
      </td>
    </tr>
    <!-- CONTENT -->
    <tr>
      <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
        <!--[if (gte mso 9)|(IE)]>
    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
    <tr>
    <td align="center" valign="top" width="600">
    <![endif]-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" class="Content bg-white" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; background-color: white; width: 580px; margin: 0 auto;">
          <tbody><tr>
            <td class="Content-container Content-container--main text textColorNormal" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101); padding-left: 60px; padding-right: 60px; padding-top: 54px; padding-bottom: 60px;">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                <!-- RESTAURANT INFO -->
                <tbody><tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        
                        <td width="12" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                        <td align="left" valign="middle" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h2 textColorDark" style="font-family: &quot;GT America Medium&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 600; vertical-align: middle; font-size: 16px; line-height: 24px; color: rgb(35, 35, 62);">'.$row["name"].'</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr class="spacer">
                        <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- INTRO -->
                <tr>
                  <td valign="top" align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <span class="h1 textColorDark" style="font-family: &quot;GT America Condensed Bold&quot;, &quot;Roboto Condensed&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 700; vertical-align: middle; font-size: 36px; line-height: 42px; color: rgb(35, 35, 62);">You need to add a identificator</span>                          </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                      <tr>
                        <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                          <!--[if gte mso 15]>&nbsp;<![endif]-->
                        </td>
                      </tr>
                      <tr class="spacer">
                        <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <!-- MESSAGE -->
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" class="message" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                    <div class="text textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                      <span class="text-bold textColorDark" style="font-weight: 600; color: rgb(35, 35, 62);">Please add a identificator to your profile so the employer can match the details with your id provided at frontdesk and verify your details.</span>
                      </div>
                  </td>
                </tr>
                
                
                
                
                <!-- BOOKING INFO -->
                
                <!-- ADDRESS -->
                
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr>
                  <td align="left" colspan="2" valign="top" width="100%" height="1" class="hr" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; mso-line-height-rule: exactly; line-height: 1px;">
                    <!--[if gte mso 15]>&nbsp;<![endif]-->
                  </td>
                </tr>
                
                
                <!-- RECEIPT -->
                
                
                <tr class="spacer">
                  <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- EDIT RECEIPT -->
                <!-- CANCELLATION POLICY -->
                <tr>
                  <td valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse;">
                      <tbody><tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text text-bold textColorDark" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; font-weight: 600; color: rgb(35, 35, 62);">
                            Verification policy
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td align="left" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
                          <div class="text textColorNormal mt1" style="margin-top: 6px; font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                            <span>You must have a identificator added to your profile before you ask the front desk to verify your identification. </span>
                            <span>You can not ask employer to add your identificator for you.</span>
                          </div>
                        </td>
                      </tr>
                    </tbody></table>
                  </td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <tr class="spacer">
                  <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
                </tr>
                <!-- QUESTIONS -->
                
              </tbody></table>
            </td>
          </tr>
        </tbody></table>
      </td>
    </tr>
    <!-- FOOTER -->
    <tr>
      <td align="center" class="Content" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell; width: 580px; margin: 0 auto;">
        <!-- Will most likely required a feature flag -->
        <!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
<tr>
<td align="center" valign="top" width="600">
<![endif]-->
        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" class="Content-container" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
          <tbody><tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" valign="top" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;"> <a href="https://www.exploretock.com" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%;"> <img src="https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png" width="30" height="30" alt="Tock" border="0" style="-ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; display: block;"> </a>              </td>
          </tr>
          <tr class="spacer">
            <td height="18px" colspan="2" style="font-size: 18px; line-height:18px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr>
            <td align="center" style="-webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                © 2019 Tock, Inc.
              </div>
              <div class="text-xsmall textColorNormal" style="font-family: &quot;GT America Regular&quot;, &quot;Roboto&quot;, &quot;Helvetica&quot;, &quot;Arial&quot;, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                All Rights Reserved
              </div>
            </td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
          <tr class="spacer">
            <td height="12px" colspan="2" style="font-size: 12px; line-height:12px; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; display: table-cell;">&nbsp;</td>
          </tr>
        </tbody></table>
        <!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
      </td>
    </tr>
  </tbody></table>



</body></html>';
		try {
				 sendEmail($subject, $to, $emailContent);
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
		$stmt->close();
        $dbCon->close();
		return $row;
        
        
    }
	
	
	 function employeeIdCount($data)
    {
        $dbCon = AppModel::createConnection();
        $employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
		$stmt = $dbCon->prepare("select count(id) as num from  user_identification where user_id =(select user_login_id from employees where id=?)");
        /* bind parameters for markers */
		$cont=1;
		$stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
		return $row;
        
        
    }
   
   function verifyIP()
		{
			$dbCon = AppModel::createConnection();
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			 
				 
				$dbCon->close();
				return $this->encrypt_decrypt('encrypt',$ip);
			 
		}
    function employeeId($data)
    {
        $dbCon = AppModel::createConnection();
        $emp_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
		 $stmt = $dbCon->prepare("select user_login_id from employees where id = ?");
        
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $emp_id);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
    function verificationId($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$row['v_id']="";
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
    function userBankid($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num	from bankid_verified where bank_id =(select ssn from user_profiles where user_logins_id=?)");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row['num'];
			
		}
		
		function verifyIdentificatorDetail($data)
		{
			$dbCon = AppModel::createConnection();
		$ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		 
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$employee_id=$this->encrypt_decrypt('decrypt',$data['eid']);
		
        $stmt = $dbCon->prepare("select login_status,user_id,email from user_certificates left join user_logins on user_logins.id=user_certificates.user_id   where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		if(empty($row))
		{
		$stmt->close();
        $dbCon->close();
		return 0;
		}
		if($row['login_status']!=2)
		{
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,time_out=1 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
				
		$stmt->close();
        $dbCon->close();
		return 0;		
		}
		else
		{
			
			 
		$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
		 
		$_POST['total_value']=str_ireplace("'",'"',$_POST['total_value']);
		$_POST['total_value']=str_replace("\xc2\xa0",'',$_POST['total_value']); 
		$posted_value=json_decode($_POST['total_value'],true);
		
		 
		
		if($posted_value['is_visible']==0)
		{
		$stmt = $dbCon->prepare("insert into employee_identificator_verification_detail(employee_user_id, employee_id,company_id,admin_user_id,is_visible,employee_identity_id,created_on) values(?,?,?,?,?,?,now())");
			
			/* bind parameters for markers */
		$stmt->bind_param("iiiiii",$data['user_id'], $company_id,$employee_id,$data['user_login_id'],$posted_value['is_visible'],$posted_value['identity_id']);	
		}
		else
		{
		$stmt = $dbCon->prepare("insert into employee_identificator_verification_detail(employee_user_id,employee_id,company_id,admin_user_id,is_visible,employee_identity_id,created_on,name_visible, idnumber_visible , issue_date_visible, expiry_date_visible ) values(?,?,?,?,?,?,now(),?,?,?,?)");
			
			/* bind parameters for markers */
		$stmt->bind_param("iiiiiiiiii", $data['user_id'],$company_id,$employee_id,$data['user_login_id'],$posted_value['is_visible'],$posted_value['identity_id'],$posted_value['name_visible'],$posted_value['idnumber_visible'],$posted_value['issue_date_visible'],$posted_value['expiry_date_visible']);		
		}
		
		if($posted_value['is_visible']==0 || $posted_value['identity_id']==0 || $posted_value['name_visible']==0 || $posted_value['idnumber_visible']==0 || $posted_value['issue_date_visible']==0 || $posted_value['expiry_date_visible']==0)
		{
		$stmt = $dbCon->prepare("select email from user_logins where id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();	
		$enc=$this->encrypt_decrypt('encrypt',$posted_value['identity_id']);
			$url="https://www.safeqloud.com/user/index.php/NewPersonal/editDetails/" . $enc;
			 
			$surl=getShortUrl($url);
			
			$to      = $data['email'];
			$subject = "Qloud ID - Verify your email";
			
			$emailContent = '<html><head></head><body><div style="margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding:0">

<center style="width:100%;table-layout:fixed">

<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8" style="text-align:center">

<tbody><tr>

<td>

    <table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td>    

         <div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">

<table align="center" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8;Margin:0 auto;width:100%" bgcolor="#F5F7F8">

       <tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0" bgcolor="#F5F7F8">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#f5f7f8" bgcolor="#F5F7F8">

            <tbody><tr>

               <td style="padding-bottom:0px;padding-top:0px;padding-left:20px;padding-right:20px;background-color:#f5f7f8;color:#f5f7f8;width:100%;font-size:1px;line-height:1px;text-align:left;display:none!important">

                 <p style="text-align:left;line-height:6px;Margin-top:0px;Margin-bottom:0px">Dina domäner är inställda på att förnyas automatiskt. Öppna det här e-postmeddelandet för att säkerställa att allt fortfarande är uppdaterat. Och glöm inte att du får 20 % rabatt på nya produkter. &nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;</p>

                 <div style="display:none;max-height:0px;overflow:hidden">

								&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌<wbr>&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;‌&nbsp;

								

								</div>

            </td>

            </tr>           

        </tbody></table>

    </td>

</tr>

 </tbody></table>

        </div>

        </td>

        </tr>

        </tbody></table>

    



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:20px">

<div style="margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:0px;padding-right:0px">





        

        </div>

        </td>

        </tr>

</tbody></table>



<table width="100%" cellpadding="0" cellspacing="0" bgcolor="#F5F7F8">

    <tbody><tr>

    <td style="padding-bottom:20px">

         <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px" bgcolor="#F5F7F8">

       <tbody><tr>

<td bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="73%" style="border-spacing:0;font-family:Audiowide;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                 <td style="padding-top:5px;padding-bottom:0;padding-right:0;padding-left:0px" align="left">

            <p style="font-size:30px; font-weight:normal; Audiowide;">Qloudid</p>

        </td>

            </tr>

            

        </tbody></table>

    </td>

    <td width="100%" bgcolor="#F5F7F8" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111" bgcolor="#F5F7F8">

            <tbody><tr>

                <td style="padding-top:10px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                 <p style="Margin-top:0px;margin-bottom:0px;font-size:13px;line-height:16px"><strong><a href="tel:077%20588%2080%2023" style="text-decoration:none;color:#111111" target="_blank">Website: <u></u>www.qloudid.com<u></u></a></strong></p>

                </td>

            </tr>

            <tr>

                <td style="padding-top:0px;padding-bottom:0px;padding-left:10px;padding-right:0px;background-color:#f5f7f8;width:100%;text-align:right">

                    <p style="Margin-top:5px;margin-bottom:0px;font-size:13px;line-height:16px">If you have any questions - <u></u>Contact us<u></u></p>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

 </tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

    <tbody><tr>

	<td bgcolor="#F5F7F8" style="background-color:#f5f7f8;padding-top:0;padding-right:0;padding-left:0;padding-bottom:0">

		<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

			

			<table bgcolor="#FFFFFF" width="100%" align="center" border="0" cellspacing="0" cellpadding="0" style="font-family:sans-serif;color:#111111">

				<tbody><tr>

				<td bgcolor="#FFFFFF" align="left" style="padding-top:0px;padding-bottom:0;padding-right:0px;padding-left:0px;text-align:left;background-color:#ffffff;font-weight:bold;font-size:32px;line-height:42px">

                

					<div style="text-align: center; line-height: 22px; max-width: 600px;
    float: left;
    position: relative; ">
                        <div class="wrap maxwi_100 xs-padr25 xs-padl10 padt10 xs-padt0 red_ff2828_bg  brdb_new tall xs-nobrdb" style="max-width: 100%; background-color: #ff2828 !important;
width: 960px;
    position: relative;
    margin: 0 auto;




">
                           <div style="height: 250px; width: auto; max-width: 100%; padding-top: 100px; padding-right: 30px;
    padding-left: 30px; margin-right: auto;
    margin-left: auto;  z-index: 5; max-width: 100%; width: auto;">
                              <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.safeqloud.com/html/usercontent/images/doublecheck.png"width="45px;" height="45px;" /></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Failed</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Your identificator was not able to be verified. Please click on button bellow to edit and submit for verification. </div>
                           </div>
                        </div>
                     </div>
                 

				</td>

				</tr>

			</tbody></table>

			

		</div>

	</td>

	</tr>

</tbody></table>



 


<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

<tbody><tr><td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

<div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">



<table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">

<tbody><tr>

<td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

        <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

            <tbody><tr>

                <td align="left" style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:center padding-bottom:15px;">

                <table border="0" cellspacing="0" cellpadding="0" align="left">

  <tbody><tr>

    <td align="left" style="font-size:18px;line-height:22px;font-weight:bold; text-align:center;"><span><a href="https://www.safeqloud.com/user/index.php/NewPersonal/editDetails/"' . $enc.'" style="border-radius:3px;color:#fedd32;text-decoration:none;background-color:#fedd32;border-top:14px solid #fedd32;border-bottom:14px solid #fedd32;border-left:14px solid #fedd32;border-right:14px solid #fedd32;display:inline-block;border-radius:3px;color:#000000; padding-left:25px; padding-right:25px; font-weight:normal;" target="_blank" data-saferedirecturl="https://www.safeqloud.com/user/index.php/NewPersonal/editDetails/"' . $enc.'">Click here</a></span></td>

  </tr>
<tr style="padding-top:20px;">
			<td align="left" valign="top" scope="col" style="padding-top:20px; padding-bottom:15px;"><div style="font-size:16px; text-align:center;">If the button is not working then copy/paste the link in your browser to edit your identificator <br><br>
			<a href="#" style="text-decoration:none; color:#3691c0;">'.$surl.'</a></div></td>
            </tr>
</tbody></table>

                </td>

            </tr>

        </tbody></table>

    </td>

</tr>

</tbody></table>



        </div>

        </td>

        </tr>

        </tbody></table>



  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#FFFFFF" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#ffffff;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">



    <tbody><tr>



      <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">



        <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:40px;padding-right:20px">



          



          <table align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;max-width:600px">



            <tbody><tr>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



              <td style="padding-top:0px;padding-bottom:0px;padding-right:0;padding-left:0;text-align:center;font-size:0;background-color:#ffffff">



                



                <div style="width:100%;max-width:560px;display:inline-block;vertical-align:top">



                  <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">



                    <tbody><tr>



                      <td style="padding-top:0px;padding-bottom:0px;padding-left:20px;padding-right:20px;background-color:#ffffff">



                        <table style="border-spacing:0;font-family:sans-serif;color:#111111;width:100%;font-size:14px;text-align:left;background-color:#ffffff;border-top-color:#e8eaeb;border-top-style:solid;border-top-width:1px">



                          <tbody><tr>



                            <td style="padding-top:20px;padding-bottom:20px;padding-left:20px;padding-right:10px;background-color:#ffffff;width:100%;text-align:left">



                              <table style="border-spacing:0;font-family:sans-serif;color:#111111;Margin:0 auto;width:100%;table-layout:fixed">



                                <tbody><tr>


                                  <td style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;background-color:#ffffff;width:100%;text-align:center">



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because your idenficator authentication was failed on account of Qloud ID,</p>



                                  </td>



                                </tr>



                                

                                                                  

 


 



        </tr>



      </tbody></table>



    </td>



  </tr>
 </tbody></table>



                            </td>



                          </tr>



                        </tbody></table>



                      </td>



                    </tr>



                  </tbody></table>



                </div>



                



              </td>



              <td width="20" bgcolor="#ffffff" style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">



                <img src="https://ci3.googleusercontent.com/proxy/gvkyMPCroXxkwzdJ2Pg_KqgcjVeVgpVE1dRo8rYCiczuJe5UfJllf1ZtOFiYZsB4FzBoGeU7Xdso4PWQyUOj4qIrHsViEiUFA_KBQA=s0-d-e1-ft#http://imagesak.secureserver.net/promos/std/spc_trans.gif" height="30" width="20" border="0" style="display:block;border-width:0" class="CToWUd">



              </td>



            </tr>



          </tbody></table>



          



        </div>



      </td>



    </tr>



  </tbody></table>

  <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#F5F7F8">

     <tbody><tr>

        <td bgcolor="#F5F7F8" style="padding-top:0px;padding-bottom:0px">

           <div style="max-width:600px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;padding-left:20px;padding-right:20px">

              

                       <table bgcolor="#F5F7F8" align="center" style="border-spacing:0;font-family:sans-serif;color:#111111;margin:0 auto;width:100%;max-width:600px">

                          <tbody><tr>

                             <td style="padding-top:0;padding-bottom:0;padding-right:0;padding-left:0">

                                <table width="100%" style="border-spacing:0;font-family:sans-serif;color:#111111">

                                   <tbody><tr>

                                      <td style="padding-top:25px;padding-bottom:0px;padding-left:40px;padding-right:40px;background-color:#f5f7f8;width:100%;text-align:left">

                                         <p style="margin-top:0px;line-height:0px;margin-bottom:0px;font-size:4px">&nbsp;</p>

                                      </td>

                                   </tr>

                                </tbody></table>

                             </td>

                          </tr>

                       </tbody></table>

                       

           </div>

        </td>

     </tr>

  </tbody></table>

</td>

		</tr>

		</tbody></table>

   

    </center>

</div></body></html>';
sendEmail($subject, $to, $emailContent);
		}
		 
		$stmt->execute();	
		$stmt->close();
        $dbCon->close();
		return 1;		
		}
		
		}
		
    function userAccount($data)
    {
        $dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select user_logins.id,phone_number,address, ssn,sex,dob_day,dob_month,dob_year,user_logins.created_on,email,country_name,first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image,grading_status,get_started_wizard_status,language from user_logins left join country on country.id=user_logins.country_of_residence left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	function userIdentificatorCount($data)
    {
        $dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select count(id) as num from user_identification where user_id = ?");
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
	
	function userIdentificatorDetail($data)
    {
        $dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select identification_type from user_identification where user_id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this->encrypt_decrypt('encrypt',$row['identification_type']);
        
    }
	
	
	function userIdentificatorDetailAll($data)
    {
        $dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select * from user_identification where user_id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['identification_type']);
				array_push($org,$row);
			}
			$stmt->close();
			$dbCon->close();
			return $org;
        
    }
	
	function userSelectedIdentificatorDetail($data)
    {
        $dbCon = AppModel::createConnection();
			$id= $this -> encrypt_decrypt('decrypt',$data['id_id']);
			
			$stmt = $dbCon->prepare("select * from user_identification where user_id = ? and identification_type=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $data['user_id'],$id);
			$stmt->execute();
			$result = $stmt->get_result();
			 
			$row = $result->fetch_assoc();
			if($row['identification_type']==1)
			{
				$row['id_detail']='ID';
			}
			else if($row['identification_type']==2)
			{
				$row['id_detail']='Driving Licence';
			}
			else if($row['identification_type']==3)
			{
				$row['id_detail']='Passport';
			}
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
		function employeeUserAccount($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select email,dob_day,dob_year,dob_month,phone_verified,country_code,ssn,address,user_profiles.port_number,phone_country_code.country_name as country,user_profiles.city,user_profiles.zipcode,phone_number,clearing_number,bank_account_number,language,country_phone from user_profiles left join user_logins on user_logins.id=user_profiles.user_logins_id  left join phone_country_code on user_logins.country_of_residence=phone_country_code.id  where user_logins_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function updateAttendence($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("insert into employee_attendence(company_id,user_id,entry_date,entry_time,created_on) values(?,?,now(),now(),now())");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateExit($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("update employee_attendence set  exit_time=now(),modified_on=now(),is_exit=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['present_id']);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateLeave($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$st=1;
			$next_days=$_POST['day_leave']-1;
			$date = date("Y-m-d");
			$mod_date = date('Y-m-d',strtotime($date."+ ".$next_days." days"));
			//echo $mod_date; echo $date; die;
			$stmt = $dbCon->prepare("insert into employee_leave_vacation(company_id,user_id,leave_start,leave_end,created_on,total_leave,is_approved) values(?,?,now(),?,now(),?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iisii", $company_id,$data['user_id'],$mod_date,$_POST['day_leave'],$st);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateVacationInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$st=2;
			 $diff = strtotime($_POST['end_date']) - strtotime($_POST['start_date']); 
			 $diff = abs(round($diff / 86400))+1; 
			$stmt = $dbCon->prepare("insert into employee_leave_vacation(company_id,user_id,leave_start,leave_end,created_on,total_leave,leave_type) values(?,?,?,?,now(),?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iissii", $company_id,$data['user_id'],$_POST['start_date'],$_POST['end_date'],$diff,$st);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
	 function employeeAccount($data)
    {
        $dbCon = AppModel::createConnection();
         $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
        $stmt = $dbCon->prepare("select id,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile  where company_id=? and user_login_id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $company_id,$data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
         $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
        $stmt->close();
        $dbCon->close();
        return $row;
    }
	
	
	 function employeeSentAccount($data)
    {
        $dbCon = AppModel::createConnection();
         $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 $employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
        $stmt = $dbCon->prepare("select * from estore_employee_invite  where id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $employee_id);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
         $row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
        $stmt->close();
        $dbCon->close();
        return $row;
    }
	
	
	
	function addedDepartments($data)
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select id,department_name from company_department  where property_id=?  order by created_on");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['lid']);
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
		
		function changeDepartment()
		{
			$dbCon = AppModel::createConnection();
			 
			$stmt = $dbCon->prepare("select id,department_name from company_department  where property_id=?  order by created_on");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $_POST['location_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			 
			while($row = $result->fetch_assoc())
			{
				
				$org=$org.'<option value="'.$row['id'].'">'.$row['department_name'].'</option>';
				
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	
	function locationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select property_location.id,property_name,visiting_address from property_location left join property on property.id=property_location.property_id where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
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
		
		
		function employeeLocationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']);
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select location_id from employee_location where employee_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("select id as location_id from property_location where company_id=? and is_headquarter=1");
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			}
			$stmt->close();
			$dbCon->close();
			return $row['location_id'];
			
			
		}
	
	function userCountryList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,country_name,country_code from phone_country_code order by country_code");
			
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
		
	 function updateEmployeeInformation($data)
    {
        $dbCon = AppModel::createConnection();
         $profile_id= $this -> encrypt_decrypt('decrypt',$data['pid']); 
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']); 
		$employee_id= $this -> encrypt_decrypt('decrypt',$data['eid']); 
		if($_POST['permission']==1)
		{
		$_POST['card_id']=$_POST['card_id'];	
		}
		else
		{
			$_POST['card_id']=0;
		}
        $stmt = $dbCon->prepare("update user_company_profile set card_id=?,company_permission=?, d_country=?,department=?,e_number=?,location_id=?,phone=?,mobile=?,email=?,c_id=?  where id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("iisissssssi", $_POST['card_id'],$_POST['permission'], $_POST['d_country'],$_POST['department'],$_POST['e_number'],$_POST['location_id'],$_POST['phone'],$_POST['mobile'],$_POST['email'],$_POST['c_id'],$profile_id);
        $stmt->execute();
		 
		$stmt = $dbCon->prepare("select id from employee_location where employee_id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowEmp = $result->fetch_assoc();
			if(empty($rowEmp))
			{
			$stmt = $dbCon->prepare("insert into employee_location (employee_id,company_id,location_id,created_on) values(?, ?, ?, now())");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii", $employee_id,$company_id,$_POST['location_id']);
			$stmt->execute();	
				
			}
			else
			{
			$stmt = $dbCon->prepare("update employee_location set location_id=? where id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $_POST['location_id'],$rowEmp['id']);
			$stmt->execute();		
				
			}
		
			$stmt = $dbCon->prepare("select email,company_email	from employees left join companies on companies.id=employees.company_id where employees.id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
		
			$fields=array();
			$fields=$_POST;
			$fields['user_email']=$row['email'];
			$fields['company_email']=$row['company_email'];
			
			$url='https://www.qmatchup.com/beta/company/index.php/UpdateUserCompany/updateEmployeeWorkInformation';
			$ch = curl_init();
						
			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_TIMEOUT, 30); //timeout after 30 seconds
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
						
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
			curl_setopt($ch, CURLOPT_POST, true);
						
			curl_setopt($ch, CURLOPT_COOKIESESSION, true);
			curl_setopt($ch, CURLOPT_REFERER, true);
			curl_setopt($ch, CURLOPT_COOKIEJAR, true);
			curl_setopt($ch, CURLOPT_COOKIEFILE, true);
			$result=curl_exec ($ch);
			$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						
			curl_close ($ch);
		
		
		
        $stmt->close();
        $dbCon->close();
        return 1;
    }
    
 function checkEmployeeEmail($data)
    {
        $dbCon = AppModel::createConnection();
         $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 $profile_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
        if($_POST['wemail']!="")
			{
			$stmt = $dbCon->prepare("select id,email,first_name,last_name  from user_logins where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userw = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			$stmt = $dbCon->prepare("select id  from estore_employee_invite where work_email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userw = $result->fetch_assoc();
			if(!empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 2;	
			}
			$stmt = $dbCon->prepare("select id  from user_company_profile where email=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("s", $_POST['wemail']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_userw = $result->fetch_assoc();
			if(empty($row_userw))
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			else
			{
				if($row_userw['id']==$profile_id)
				{
				$stmt->close();
				$dbCon->close();
				return 0;	
				}
				else
				{
				$stmt->close();
				$dbCon->close();
				return 3;
				}
			}
			
			}
        $stmt->close();
        $dbCon->close();
        return $row;
    }
    
    function checkEmployeeAttendence($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id),max(entry_date) edate from employee_attendence where company_id=? and user_id=? and is_exit=0");
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if(date('Y-m-d',strtotime($row['edate']))==date('Y-m-d'))
			{
		
			$stmt->close();
			$dbCon->close();
			return 1;
			}
			
			else
			{
				
			$stmt = $dbCon->prepare("select max(id) as mid from employee_leave_vacation where company_id=? and user_id=? and leave_type=1");
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("select leave_start,leave_end from employee_leave_vacation where id=?");
			$stmt->bind_param("i", $row['mid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 0;	
			}
			else
			{
			if((date('Y-m-d',strtotime($row['leave_start']))==date('Y-m-d') || date('Y-m-d',strtotime($row['leave_end']))==date('Y-m-d')) || (date('Y-m-d',strtotime($row['leave_start']))<date('Y-m-d') && date('Y-m-d',strtotime($row['leave_end']))>date('Y-m-d')))
			{
			$stmt->close();
			$dbCon->close();
			return 2;
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return 0;
			}
			}
			}
			
		}
    
	
	 function checkEmployeeTime($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select max(id) as eid,max(created_on) edate from employee_attendence where company_id=? and user_id=? and is_exit=0");
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			date_default_timezone_set("Europe/Stockholm");
			$starttimestamp = strtotime($row['edate']);
			$endtimestamp = strtotime(date('Y-m-d H:i:s'));
			//date_default_timezone_set("Europe/Stockholm");
			 
			$difference = floor(abs($endtimestamp - $starttimestamp)/3600);
			$difference2 = floor(abs($endtimestamp - $starttimestamp )/60);
			$difference2=$difference2 -($difference*60);
			$difference3 = floor(abs($endtimestamp - $starttimestamp));
			$difference3 = abs($difference3 - ($difference*3600) - ($difference2*60));
			$row['diffh']=$difference;
			$row['diffm']=$difference2;
			$row['diffs']=$difference3;
			// print_r($row); die;
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		 		
		}
    
}