<?php
	require_once('../AppModel.php');
	class ProfessionalCompanyModel extends AppModel
	{
		function propertyInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$property_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select  * from property_location where company_id=? and is_headquarter=1");
			/* bind parameters for markers */
			$stmt->bind_param("i", $property_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['id']); 
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function updateServiceCategory($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("update company_selected_service_todos set is_selected=? where id=?");
			$stmt->bind_param("ii",$_POST['update_info'],$_POST['service_id']);
			$stmt->execute();	
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		 function companyServicesTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  company_selected_service_todos where company_id=?)");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into company_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?, ?,?, now(), now())");
			$stmt->bind_param("iii",$row['professional_category_id'],$row['id'],$company_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		


		function selectedCompanyServices($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
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
				$org=$org.'<div class=" " style="border-color:#23262f; ">
				<div class="description__content">
				<h4 class="changedText" style="margin-bottom: 16px !important; font-size:28px !important;">'.$row['category_name'].'</h4>
				<p class="changedText">Blue marked are available services. </p>
				<div class="css-1jzh2co">	
				<div class="chip-container" id="category'.$row['id'].'">';
				$subctaegories=$this->selectedCompanySubcategories($data);
				$org=$org.$subctaegories;
				$org=$org.'</div> 
				</div>	
				</div>
				</div> ';
				}
				else
				{

				$org=$org.'<div class="description__section" style="border-color:#23262f; ">
				<div class="description__content">
				<h4 class="changedText" style="margin-bottom: 16px !important;  font-size:28px !important;">'.$row['category_name'].'</h4>
				<p class="changedText">Blue marked are available services</p>
				<div class="css-1jzh2co">	
				<div class="chip-container" id="category'.$row['id'].'">';
				$subctaegories=$this->selectedCompanySubcategories($data);
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
		
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}

		function selectedCompanySubcategories($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select company_selected_service_todos.id,is_selected,subcategory_name from company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=company_selected_service_todos.professional_subcategory_id where company_selected_service_todos.professional_category_id=? and company_id=? order by subcategory_name");
			$stmt->bind_param("ii", $data['category_id'],$company_id);
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
													 <span class="chip chip_is-selected" style="border:1px solid #52d4f4!important; background-color:transparent !important; color:#52d4f4;">
													 <span class="chip_content">
														 
														<span class="chip_text changedText " style="font-size:13px !important;">'.$row['subcategory_name'].'</span>
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
															<span class="chip chip_not-selected" style="border:1px solid #23262f !important; background-color:transparent;">
															   <span class="chip_content">
																   
																  <span class="chip_text   changedText " style="color:#787f91; font-size:13px !important;">'.$row['subcategory_name'].'</span>
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
		
		 


		 function serviceRequestReceived($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,city,is_accepted from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id where company_id=? order by user_professional_service_request.created_on desc");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				if($row['is_accepted']==0)
				{
				$stmt = $dbCon->prepare("select count(id) as num from user_professional_service_request_company_info where job_id=? and company_id!=? and is_accepted=1");
				/* bind parameters for markers */
				$cont=1;
				$stmt->bind_param("ii", $row['job_id'],$company_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']==5)
				{
				$stmt = $dbCon->prepare("update user_professional_service_request_company_info set is_accepted=3 where id=?");
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$row['is_accepted']=3;
				}					
				}
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		function updatePriceForService($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']);
			if($_POST['broadcast_type']==0)
			{
			$_POST['broadcast_type']=2;	
			}
			$stmt = $dbCon->prepare("update user_professional_service_request_company_info set is_service_bookable=?,bookable_calender=?,is_accepted=?,per_hour_fee=?,project_fee=? where id=?");
			$stmt->bind_param("iiiiii",$_POST['is_bookable'],$_POST['bookable_calender'],$_POST['broadcast_type'],$_POST['price_per_hour'],$_POST['project_fee'],$request_id);
			$stmt->execute();
			
			if($_POST['broadcast_type']==1)
			{
			$this->sendCompanyBidInfo($data);
			}
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function sendCompanyBidInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id=$this->encrypt_decrypt('decrypt',$data['request_id']); 
			$stmt = $dbCon->prepare("select user_logins.email,user_professional_service_request_company_info.id,job_id,subcategory_name,floor_area,user_address.city,is_accepted,company_name from user_professional_service_request_company_info left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_logins on user_logins.id=user_professional_service_request.user_id where user_professional_service_request_company_info.id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$data['job_id']=$this->encrypt_decrypt('encrypt',$row['job_id']);
			$to            = $row['email'];
			$subject       = "Premium Qualified company bid received!";
			$emailContent='<html>
    <head></head>
    <body>
        <table
            border="0"
            cellpadding="0"
            cellspacing="0"
            width="100%"
            style="
                border-collapse: collapse;
                background-color: rgb(240, 240, 240);
                font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                letter-spacing: normal;
                text-indent: 0px;
                text-transform: none;
                word-spacing: 0px;
                text-decoration: none;
            "
        >
            <tbody>
                <tr></tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                        <h1 style="font-size: 33px; font-weight: 800; line-height: 30px;">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Qloud ID</font></font>
                                        </h1>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse; background-color: white; width: 580px; margin: 0px auto;">
                            <tbody>
                                <tr>
                                    <td
                                        style="
                                            border-collapse: collapse;
                                            display: table-cell;
                                            font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif;
                                            font-weight: 400;
                                            font-size: 16px;
                                            line-height: 21px;
                                            color: rgb(79, 79, 101);
                                            padding: 54px 60px 60px;
                                        "
                                    >
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" valign="center" width="48" style="border-collapse: collapse; display: table-cell;">
                                                                        <div style="width: 48px; height: 48px; border-radius: 3px; border: 1px solid rgb(211, 211, 216); overflow: hidden;"></div>
                                                                    </td>
                                                                    <td width="12" style="border-collapse: collapse; display: table-cell;">&nbsp;</td>
                                                                    <td align="left" valign="middle" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 600;
                                                                                vertical-align: middle;
                                                                                font-size: 16px;
                                                                                line-height: 24px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['subcategory_name'].'</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" align="left" style="border-collapse: collapse; display: table-cell;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="left" style="border-collapse: collapse; display: table-cell;">
                                                                        <span
                                                                            style="
                                                                                font-family: GT America Condensed Bold, Roboto Condensed, Roboto, Helvetica, Arial, sans-serif;
                                                                                font-weight: 700;
                                                                                vertical-align: middle;
                                                                                font-size: 36px;
                                                                                line-height: 42px;
                                                                                color: rgb(35, 35, 62);
                                                                            "
                                                                        >
                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">You got a perposal</font></font>
                                                                        </span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td
                                                                        align="left"
                                                                        colspan="2"
                                                                        valign="top"
                                                                        width="100%"
                                                                        height="1"
                                                                        style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"
                                                                    ></td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" valign="top" style="border-collapse: collapse; display: table-cell; background-color: rgb(244, 244, 245); padding: 18px;">
                                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; color: rgb(79, 79, 101);">
                                                            <span style="font-weight: 600; color: rgb(35, 35, 62);">
                                                                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">A perposal from '.$row['company_name'].'</font></font>
                                                            </span>
                                                            <font style="vertical-align: inherit;">
                                                                <font style="vertical-align: inherit;">
                                                                    <p></p>
                                                                    We are thrilled to inform you that a contractor has shown an interest and that this contractor also made a proposal.
                                                                    <p></p>
                                                                </font>

                                                                <font style="vertical-align: inherit;">
                                                                    If you click the button below then you will be able to read&nbsp;the&nbsp;proposal.
                                                                </font>
                                                            </font>
                                                            <span>&nbsp;</span><br />
                                                            <font style="vertical-align: inherit;"></font>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td valign="top" style="border-collapse: collapse; display: table-cell;">
                                                        <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;">
                                                            <tbody>
                                                                <tr>
                                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td
                                                                                        align="center"
                                                                                        valign="center"
                                                                                        width="100%"
                                                                                        style="border-collapse: collapse; display: table-cell; border-radius: 3px; background-color: rgb(32, 32, 192);"
                                                                                    >
                                                                                        <a
                                                                                            href="https://www.qloudid.com/public/index.php/UserProfessionalServiceRequest/receivedbidList/'.$data['job_id'].'"
                                                                                            style="
                                                                                                font-family: GT America Medium, Roboto, Helvetica, Arial, sans-serif;
                                                                                                border-radius: 3px;
                                                                                                border: 1px solid rgb(32, 32, 192);
                                                                                                color: rgb(255, 255, 255);
                                                                                                display: block;
                                                                                                font-size: 16px;
                                                                                                font-weight: 600;
                                                                                                padding: 18px;
                                                                                                text-decoration: none;
                                                                                            "
                                                                                            target="_blank"
                                                                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.dstricts.com%252Fpublic%252Findex.php%252FHotel%252FverifyCheckin%252FK1p5TzIweWpQa1RQSm5wV3QyOUc1Zz09/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/1/3Ug7SAcXST&amp;source=gmail&amp;ust=1684593415394000&amp;usg=AOvVaw16u70RZouwQwLMGFz6hYYB"
                                                                                        >
                                                                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Check proposal</font></font><span>&nbsp;</span>
                                                                                        </a>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" valign="center" width="100%" style="border-collapse: collapse; display: table-cell;">
                                                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;"></table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="center" style="border-collapse: collapse; display: table-cell;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td align="left" colspan="2" valign="top" width="100%" height="1" style="border-collapse: collapse; display: table-cell; background-color: rgb(211, 211, 216); line-height: 1px;"></td>
                                                </tr>
                                                <tr>
                                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="border-collapse: collapse; display: table-cell; width: 580px; margin: 0px auto;">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse: collapse; padding-left: 60px; padding-right: 60px;">
                            <tbody>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" valign="top" style="border-collapse: collapse; display: table-cell;">
                                        <a
                                            href="https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2"
                                            target="_blank"
                                            data-saferedirecturl="https://www.google.com/url?q=https://click.pstmrk.it/3s/www.exploretock.com/qzFR/112tAQ/AQ/8ca0d9d0-e358-4cb7-aead-53ca8cbd4b79/4/6vVH-Jqfb2&amp;source=gmail&amp;ust=1684593415395000&amp;usg=AOvVaw0lQVcFgYUs07mcaxDkFSvl"
                                        >
                                            <img
                                                src="https://ci6.googleusercontent.com/proxy/d_UyQeDDh58PPnTVAfB57FFPf4BgmGx84bl0DRCqJ5V0oaD3dwZiSbLlYHRWWIVpKYsAR7dCz9LXae65k7i_SxitY6s6nk0uzQqOfC7535Yi4A5xhIVIveRcSvbE7LmQF6Utwl1wepfmTb5VKnXBHG4Tjw=s0-d-e1-ft#https://storage.googleapis.com/tock-public-assets/images-email-template/tock-brandmark-color.png"
                                                width="30"
                                                height="30"
                                                alt="Tock"
                                                border="0"
                                                style="border: 0px; height: auto; line-height: 12px; outline: none; text-decoration: none; display: block;"
                                                class="CToWUd"
                                                data-bit="iit"
                                            />
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="18px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 18px; line-height: 18px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="center" style="border-collapse: collapse; display: table-cell;">
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© 2019 TOCK, INC.</font></font>
                                        </div>
                                        <div style="font-family: GT America Regular, Roboto, Helvetica, Arial, sans-serif; font-size: 11px; text-transform: uppercase; line-height: 22px; letter-spacing: 1px; color: rgb(79, 79, 101);">
                                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ALL RIGHTS RESERVED</font></font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td height="12px" colspan="2" style="border-collapse: collapse; display: table-cell; font-size: 12px; line-height: 12px;">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>';

 
			try {
			  sendEmail($subject, $to, $emailContent);
			  
			}

			//catch exception
			catch(Exception $e) {
			  $to            = 'kowaken.ghirmai@gmail.com';
			  sendEmail($subject, $to, $emailContent);
			} 
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
	
  	
		function updateAvailableServiceCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$service_type_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$category_id= $this -> encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("update cleaning_service_category_availability set action_taken=1,is_available=? where company_id=? and service_type_id=? and category_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iiii",$_POST['updateInfo'],$company_id,$service_type_id,$category_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update cleaning_company_selected_service_todos set is_selected=?,modified_on=now() where company_id=? and service_type_id=? and cleaning_category_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iiii",$_POST['updateInfo'],$company_id,$service_type_id,$category_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
			function updateCategoryServiceTodo($data)
		{ 
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select is_selected,professional_category_id,domain_id,company_id from professional_company_selected_service_todos where id=?");
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
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$is_selected,$_POST['service_todo_id']);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where domain_id=? and professional_category_id=? and is_selected=1 and company_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("iiii",$row['domain_id'],$row['professional_category_id'],$row['company_id'],$row['domain_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function updateCategoryServiceAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set is_selected=1,modified_on=now() where company_id=? and professional_category_id=? and domain_id=?");
			$stmt->bind_param("iii", $company_id,$_POST['cleaning_subcategory_id'],$domain_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function marketplaceList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id in (select domain_id from cleaning_company_premium_account_request where company_id=? and is_approved=1)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
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
		
		function sendPremiumAccountRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$domain_id= $this -> encrypt_decrypt('decrypt',$data['domain_id']); 
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into cleaning_company_premium_account_request (domain_id,company_id, user_id, created_on, modified_on) values(?, ?, ?, now(), now())");
			/* bind parameters for markers */
			 
			$stmt->bind_param("iii",$domain_id, $company_id,$data['user_id']);
			$stmt->execute();
			
			$today=strtotime(date('Y-m-d'));
			$nextPay=strtotime("+1 month", $today);
			$stmt = $dbCon->prepare("update cleaning_company_premium_account_request set subscribed_on=?, last_payment_date=?, next_payment_date=?, is_paid=1,   is_approved=1   where company_id=? and domain_id=?");
			$stmt->bind_param("sssii",$today,$today,$nextPay, $company_id,$domain_id);
			$stmt->execute();	
			}
			else
			{
			$stmt = $dbCon->prepare("select id from cleaning_company_premium_account_request where company_id=? and domain_id=? and is_approved=2");
			$stmt->bind_param("ii", $company_id,$domain_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$today=strtotime(date('Y-m-d'));
			$nextPay=strtotime("+1 month", $today);
			$stmt = $dbCon->prepare("update cleaning_company_premium_account_request set subscribed_on=?, last_payment_date=?, next_payment_date=?, is_paid=1,   is_approved=1 where id=?");
			$stmt->bind_param("sssi",$today,$today,$nextPay, $row['id']);
			$stmt->execute();	
			 
			}
			$stmt = $dbCon->prepare("select company_name from companies where id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$to            = 'kowaken.ghirmai@gmail.com';
			$subject       = "Premium Qualified request received!";
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
                              <div class="padding-bottom: 40px; text-align: center; font-size: 45px;"><img src="http://www.qloudid.com/html/usercontent/images/doublecheck.png" width="45px;" height="45px;"></div>
                              <div class="padb0 xxs-padb0 ">
                                 <h1 style="font-size: 50px; font-weight: normal; text-align: center; padding-bottom: 10px; color:white;">Request</h1>
                              </div>
                              <div style="margin-top: 20px; font-weight: normal; margin-bottom: 10px; text-align: center; color:white; font-size: 20px;">Premium qualified account has beed received from '.$row['company_name'].'</div>
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



                                    <p style="Margin-top:0px;line-height:22px;Margin-bottom:0px; fsz14px;">This is sent because your '.$row['company_name'].' have requested for Premium qualified account</p>



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
		
		
		function unconnectedMarketplaceList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from professional_marketplace where id not in (select domain_id from cleaning_company_premium_account_request where company_id=? and (is_approved=1 || is_approved=0))");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$a=explode(',',$row['signup_type']);
				if (!in_array(2, $a))
				{
					continue;
				}
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function availableServiceList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			 $org=array();
		 	$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,is_selected,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.is_selected=1 and professional_company_selected_service_todos.company_id=? and domain_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("iii",$company_id,$domain_id,$domain_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			 
			while($row1 = $result1->fetch_assoc())
			{
			$row1['enc']=$this->encrypt_decrypt('encrypt',$row1['id']);	 
			array_push($org,$row1);
			}			
											
			 
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function serviceCategoryDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			
			$stmt = $dbCon->prepare("select * from professional_company_selected_service_todos where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $subcatg_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select payment_option from professional_marketplace_selected_domain where marketplace_id = ? and marketplace_domain_id=(select available_at_domain from professional_service_category where id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $row['domain_id'], $row['professional_category_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row2 = $result->fetch_assoc();
			 
			$row['domain_payment_rule']=$row2['payment_option'];
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function marketplaceDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			
			$stmt = $dbCon->prepare("select * from professional_marketplace where id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		
		function marketplaceSubscriptionInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from cleaning_company_premium_account_request where domain_id = ? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $domain_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function updateSubscription($data)
		{
			$dbCon = AppModel::createConnection();
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$sub_id=$this->encrypt_decrypt('decrypt',$data['sub_id']);
			$stmt = $dbCon->prepare("update cleaning_company_premium_account_request set selected_subscription=?,subscription_selected_date=now() where domain_id = ? and company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iii",$sub_id, $domain_id,$company_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		 function updateServiceRules($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$subcatg_id=$this->encrypt_decrypt('decrypt',$data['subcatg_id']);
			 
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set payment_option=?,show_profile_page=? where id=?");
			$stmt->bind_param("iii",$_POST['payment_option'],$_POST['show_profile_page'],$subcatg_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from professional_company_selected_service_todos where id=?");
			$stmt->bind_param("i", $domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update professional_company_selected_service_todos set payment_option=? where professional_category_id=? and domain_id=?");
			$stmt->bind_param("ii",$_POST['payment_option'],$row['professional_category_id'],$domain_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function serviceTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_category where id in (select professional_category_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("i", $domain_id);
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
				$stmt = $dbCon->prepare("select count(id)as num from professional_company_selected_service_todos where professional_category_id=? and is_selected=1 and company_id=? and domain_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
				$stmt->bind_param("iiii", $row['id'],$company_id,$domain_id,$domain_id);
				$stmt->execute();
				$result2 = $stmt->get_result();
				$rowTodoSelectedCount = $result2->fetch_assoc();
				
				$org=$org.' <div class="padb10 xs-padrl0 xs-padb0  brdb_dfe3e6 mart10  ">
									 <div class="clear"></div>
								<div class="marrl0 padb10   fsz16 white_bg tall padt20">
								<a href="#profile'.$j.'" class="expander-toggler dark_grey_txt xs-fsz16 tall bold"><div class="dflex wi_100">
									<div class="wi_70 dflex">
								<span class="css-p2kctj"><img src="https://www.qloudid.com/html/usercontent/images/kitchen5.svg" class="css-z0f999"></span> 
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
		 	$stmt = $dbCon->prepare("select professional_company_selected_service_todos.id,is_selected,subcategory_name from professional_company_selected_service_todos left join professional_service_subcategory on professional_service_subcategory.id=professional_company_selected_service_todos.professional_subcategory_id where professional_company_selected_service_todos.professional_category_id=? and professional_company_selected_service_todos.company_id=? and domain_id=? and professional_subcategory_id in (select professional_subcategory_id from professional_marketplace_service_todos where is_selected=1 and marketplace_id=?)");
			$stmt->bind_param("iiii", $row['id'],$company_id,$domain_id,$domain_id);
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
		
		function professionalTodoCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select count(id) as num from professional_company_selected_service_todos where company_id=? and domain_id=?");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from professional_service_category");
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where professional_category_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos (domain_id, professional_category_id,professional_subcategory_id,company_id, created_on, modified_on) values (?,?, ?,?, now(), now())");
			$stmt->bind_param("iiii",$domain_id,$rowCategory['id'],$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			
			}				
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		 function professionalTodoUpdate($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select * from professional_service_subcategory where id not in(select professional_subcategory_id from  professional_company_selected_service_todos where company_id=? and domain_id=?)");
			$stmt->bind_param("ii", $company_id,$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc())
			{
			
			$stmt = $dbCon->prepare("select *  from professional_service_subcategory where id=?");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			$rowAmenities= $result3->fetch_assoc();
			$stmt = $dbCon->prepare("insert into professional_company_selected_service_todos ( professional_category_id,professional_subcategory_id,company_id,domain_id, created_on, modified_on) values (?, ?,?,?, now(), now())");
			$stmt->bind_param("iiii",$row['professional_category_id'],$row['id'],$company_id,$domain_id);
			$stmt->execute();
							
			}	
			
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		
		 function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
			}
		function employeesDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select employees.id,concat_ws(' ', user_logins.first_name, user_logins.last_name) as name,is_inspector,passport_image from employees left join user_logins on user_logins.id=employees.user_login_id where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/person-male.png"; }
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['img']=$imgs;
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		 
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
		
	 
		
	 
		
		
		function companyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from company_profiles  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				//echo "hi"; die;
				$stmt = $dbCon->prepare("INSERT INTO company_profiles (company_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=53");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}

		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',53);
		}
	 
	}	