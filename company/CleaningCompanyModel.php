<?php
	require_once('../AppModel.php');
	class CleaningCompanyModel extends AppModel
	{
		function sendPremiumAccountRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("insert into cleaning_company_premium_account_request (company_id, user_id, created_on, modified_on) values(?, ?, now(), now())");
			/* bind parameters for markers */
			 
			$stmt->bind_param("ii", $company_id,$data['user_id']);
			$stmt->execute();
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
	
 function premiumQualifiedCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_premium_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['num'];		
			
		}
		
		function premiumQualifiedAccountInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select is_approved from cleaning_company_premium_account_request where company_id=?");
			$stmt->bind_param("i", $company_id);
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row['is_approved'];	
			 
		}
		
		
		function updateLeader($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['jid']);
			$leader_id=$this->encrypt_decrypt('decrypt',$data['lid']);
			
			$stmt = $dbCon->prepare("update cleaning_company_employee_jobs set is_leader=0 where cleaning_job_id=?");
			$stmt->bind_param("i",$job_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update cleaning_company_employee_jobs set is_leader=1 where id=?");
			$stmt->bind_param("i",$leader_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		 function assignJobToEmployees($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$job_id=$this->encrypt_decrypt('decrypt',$data['jid']);
			$a=explode(',',substr($_POST['selected_employees'],0,-1));
			 $i=1;
			foreach($a as $key)
			{
			$stmt = $dbCon->prepare("insert into cleaning_company_employee_jobs (is_leader,cleaning_job_id, employee_id, created_on, modified_on) values (?,?, ?,now(), now())");
			$stmt->bind_param("iii",$i,$job_id,$key);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select id,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile  where company_id=? and user_login_id=(select user_login_id from employees where id=?)");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$key);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['email']=='' || $row['email']==null)
			{
			$stmt = $dbCon->prepare("select id,email from employees where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $key);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowEmployeeEmail = $result->fetch_assoc();	
			
			$stmt = $dbCon->prepare("update  user_company_profile set email=? where id=?");
			$stmt->bind_param("si",$row['email'], $row['id']);
			$stmt->execute();
			}
			
			$stmt = $dbCon->prepare("select id,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile  where company_id=? and user_login_id=(select user_login_id from employees where id=?)");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$key);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$to=$row['email'];
				$subject="Property cleaning request received";
				$emailContent='You have received a cleaning request. Please visit https://www.qloudid.com/company/index.php/CleaningCompany/employeeJobs/'.$data['cid'].' to check available jobs';
					try {
					  sendEmail($subject, $to, $emailContent);
					}
					catch(Exception $e) {
					}
			$i=0;
			}
			
			$stmt = $dbCon->prepare("update cleaning_company_user_service_request set is_assigned=1 where id=?");
			$stmt->bind_param("i",$job_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;	
		}
		
		function cleanersList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,is_inspector from employees where company_id=?");
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
		
		
		function cleanersAssignedList($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$job_id= $this -> encrypt_decrypt('decrypt',$data['jid']);
			
			$stmt = $dbCon->prepare("select cleaning_company_employee_jobs.id,concat_ws(' ',first_name,last_name) as name,is_inspector,is_leader from cleaning_company_employee_jobs left join employees on employees.id=cleaning_company_employee_jobs.employee_id where cleaning_job_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $job_id);
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
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		function assignedCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select cleaning_company_user_service_request.id,category_name,address,port_number from cleaning_company_user_service_request left join user_address on user_address.id=cleaning_company_user_service_request.user_address_id left join cleaning_service_category_availability on cleaning_service_category_availability.id=cleaning_company_user_service_request.category_available_id left join cleaning_service_category on cleaning_service_category.id=cleaning_service_category_availability.category_id where cleaning_company_user_service_request.company_id=? and is_assigned=1");
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
		
		
		
		function employeeCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select cleaning_company_user_service_request.id,category_name,address,port_number from cleaning_company_user_service_request left join user_address on user_address.id=cleaning_company_user_service_request.user_address_id left join cleaning_service_category_availability on cleaning_service_category_availability.id=cleaning_company_user_service_request.category_available_id left join cleaning_service_category on cleaning_service_category.id=cleaning_service_category_availability.category_id where cleaning_company_user_service_request.id in (select cleaning_job_id from cleaning_company_employee_jobs where employee_id=(select id from employees where company_id=? and user_login_id=?))");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['user_id']);
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
		
		function receivedCleaningRequest($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select cleaning_company_user_service_request.id,category_name,address,port_number from cleaning_company_user_service_request left join user_address on user_address.id=cleaning_company_user_service_request.user_address_id left join cleaning_service_category_availability on cleaning_service_category_availability.id=cleaning_company_user_service_request.category_available_id left join cleaning_service_category on cleaning_service_category.id=cleaning_service_category_availability.category_id where cleaning_company_user_service_request.company_id=? and is_assigned=0");
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
		
		function updateCategoryPricing($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$service_type_id=$this->encrypt_decrypt('decrypt',$data['sid']);
			$category_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("update cleaning_service_category_availability set start_fee_applicable=?,start_fee=?,inspection_fee_applicable=?,inspection_fee=?,studio_apartment_cleaning_available=?,studio_apartment_cleaning_fee=?,studio_apartment_cleaning_max_area=?,studio_apartment_cleaning_extra_per_sqm=?,bedroom_apartment_cleaning_available1=?,bedroom_apartment_cleaning_fee1=?,bedroom_apartment_cleaning_max_area1=?,bedroom_apartment_cleaning_extra_per_sqm1=?,bedroom_apartment_cleaning_available2=?,bedroom_apartment_cleaning_fee2=?,bedroom_apartment_cleaning_max_area2=?,bedroom_apartment_cleaning_extra_per_sqm2=?,bedroom_apartment_cleaning_available3=?,bedroom_apartment_cleaning_fee3=?,bedroom_apartment_cleaning_max_area3=?,bedroom_apartment_cleaning_extra_per_sqm3=?,bedroom_apartment_cleaning_available4=?,bedroom_apartment_cleaning_fee4=?,bedroom_apartment_cleaning_max_area4=?,bedroom_apartment_cleaning_extra_per_sqm4=?,bedroom_apartment_cleaning_available5=?,bedroom_apartment_cleaning_fee5=?,bedroom_apartment_cleaning_max_area5=?,bedroom_apartment_cleaning_extra_per_sqm5=?,is_pricing_updated=1 where id=?");
			$stmt->bind_param("iiiiiidiiidiiidiiidiiidiiidii",$_POST['start_fee_applicable'],$_POST['start_fee'],$_POST['inspection_fee_applicable'],$_POST['inspection_fee'],$_POST['bedroom_apartment_cleaning_available0'],$_POST['bedroom_apartment_cleaning_fee0'],$_POST['bedroom_apartment_cleaning_max_area0'],$_POST['bedroom_apartment_cleaning_extra_per_sqm0'],$_POST['bedroom_apartment_cleaning_available1'],$_POST['bedroom_apartment_cleaning_fee1'],$_POST['bedroom_apartment_cleaning_max_area1'],$_POST['bedroom_apartment_cleaning_extra_per_sqm1'],$_POST['bedroom_apartment_cleaning_available2'],$_POST['bedroom_apartment_cleaning_fee2'],$_POST['bedroom_apartment_cleaning_max_area2'],$_POST['bedroom_apartment_cleaning_extra_per_sqm2'],$_POST['bedroom_apartment_cleaning_available3'],$_POST['bedroom_apartment_cleaning_fee3'],$_POST['bedroom_apartment_cleaning_max_area3'],$_POST['bedroom_apartment_cleaning_extra_per_sqm3'],$_POST['bedroom_apartment_cleaning_available4'],$_POST['bedroom_apartment_cleaning_fee4'],$_POST['bedroom_apartment_cleaning_max_area4'],$_POST['bedroom_apartment_cleaning_extra_per_sqm4'],$_POST['bedroom_apartment_cleaning_available5'],$_POST['bedroom_apartment_cleaning_fee5'],$_POST['bedroom_apartment_cleaning_max_area5'],$_POST['bedroom_apartment_cleaning_extra_per_sqm5'], $category_id);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
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
			$stmt = $dbCon->prepare("update cleaning_company_selected_service_todos set is_selected=?,modified_on=now() where id=?");
			$stmt->bind_param("ii",$_POST['subcategory_info'],$_POST['service_todo_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function updateCategoryServiceAllTodos($data)
		{ 
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$service_type_id=$this->encrypt_decrypt('decrypt',$data['sid']);
			$category_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("update cleaning_company_selected_service_todos set is_selected=1,modified_on=now() where company_id=? and service_type_id=? and cleaning_category_id=? and cleaning_subcategory_id=?");
			$stmt->bind_param("iiii", $company_id,$service_type_id,$category_id,$_POST['cleaning_subcategory_id']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function serviceTodoDetail($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$service_type_id=$this->encrypt_decrypt('decrypt',$data['sid']);
			$category_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select * from cleaning_service_subcategory where cleaning_category_id=?");
			$stmt->bind_param("i", $category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$j++;
				
				$stmt = $dbCon->prepare("select count(id)as num from cleaning_company_selected_service_todos where cleaning_subcategory_id=? and is_selected=1 and cleaning_category_id=? and company_id=? and service_type_id=?");
				$stmt->bind_param("iiii", $row['id'],$category_id,$company_id,$service_type_id);
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
								<span class="apartheading">'.$row['subcategory_name'].'</span><span class="aprtSubheading">'.$rowTodoSelectedCount['num'].' services selected</span>
								</div>
								</div> 
									<div class="wi_30 padt10">
															<span class="dnone_pa fa fa-chevron-down fright"></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright"></span>
									</div> 
									</div></a></div>
								<div id="profile'.$j.'" class=" " style="display: block;">	
										 
									  <div class="css-2998cc fleft padb20">
									<a href="javascript:void(0);" onclick="updateCategoryAmenities('.$row['id'].')"> <button color="#444444" data-testid="Kitchen-amenity-section-select-all" class="merlin-button css-7wfern" aria-label=""><div class="merlin-button__content">Select all</div></button></a>
									  </div>
									  
									   <div class="clear"></div>
											<div id="'.$row['id'].'">';
		 	$stmt = $dbCon->prepare("select cleaning_company_selected_service_todos.id,is_selected,todo_name from cleaning_company_selected_service_todos left join cleaning_subcategory_todo on cleaning_subcategory_todo.id=cleaning_company_selected_service_todos.cleaning_todo_id where cleaning_company_selected_service_todos.cleaning_subcategory_id=? and cleaning_company_selected_service_todos.cleaning_category_id=? and cleaning_company_selected_service_todos.company_id=? and cleaning_company_selected_service_todos.service_type_id=?");
			$stmt->bind_param("iiii", $row['id'],$category_id,$company_id,$service_type_id);
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
				$org=$org.' <div data-testid="'.$row1['todo_name'].'-amenity-item" class="css-39yi7y"><div class="css-nj7s2c"><label for="oven" class="css-14q70q0">'.$row1['todo_name'].'</label><div class="css-1sjqbna">
				<a href="javascript:void(0);" onclick="updateAminity('.$row1['id'].','.$update.');"><input data-testid="test-checkbox-'.$row1['todo_name'].'" name="'.$row1['todo_name'].'" type="checkbox" class="css-1lgzhz8" '.$checked.'></a>
				</div></div>';
				 
				$org=$org.'</div>';	
			}			
											
			$org=$org.'</div> </div> </div> ';
			 
			}
			  
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		 function cleaningTodoCount($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			$service_type_id=$this->encrypt_decrypt('decrypt',$data['sid']);
			$category_id=$this->encrypt_decrypt('decrypt',$data['catg_id']);
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_company_selected_service_todos where company_id=? and service_type_id=? and cleaning_category_id=?");
			$stmt->bind_param("iii", $company_id,$service_type_id,$category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from cleaning_service_subcategory where cleaning_category_id=?");
			$stmt->bind_param("i", $category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowCategory = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select *  from cleaning_subcategory_todo where cleaning_subcategory_id=?");
			$stmt->bind_param("i", $rowCategory['id']);
			$stmt->execute();
			$result3 = $stmt->get_result();	
			while($rowAmenities= $result3->fetch_assoc())
			{
			$stmt = $dbCon->prepare("insert into cleaning_company_selected_service_todos (service_type_id, cleaning_category_id,cleaning_subcategory_id,cleaning_todo_id,company_id, created_on, modified_on) values (?, ?,?, ?,?, now(), now())");
			$stmt->bind_param("iiiii",$service_type_id,$category_id,$rowCategory['id'],$rowAmenities['id'],$company_id);
			$stmt->execute();
			 				
			}
			
			}				
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
		
		function listServiceType($data)
		{
			$dbCon = AppModel::createConnection();
			
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from cleaning_service_type");
			/* bind parameters for markers */
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
		
		
		function serviceTypeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			
			$service_type_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select * from cleaning_service_type where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $service_type_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function categoryTypeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$service_type_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$category_id= $this -> encrypt_decrypt('decrypt',$data['catg_availability_id']);
			$stmt = $dbCon->prepare("select cleaning_service_category_availability.id,category_id,action_taken,is_available,category_name from cleaning_service_category_availability left join cleaning_service_category on cleaning_service_category.id=cleaning_service_category_availability.category_id where company_id=? and service_type_id=? and cleaning_service_category_availability.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$company_id,$service_type_id,$category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['category_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function categoryTypePricingInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$service_type_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$category_id= $this -> encrypt_decrypt('decrypt',$data['catg_availability_id']);
			$stmt = $dbCon->prepare("select * from cleaning_service_category_availability where company_id=? and service_type_id=? and cleaning_service_category_availability.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iii",$company_id,$service_type_id,$category_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']=$this -> encrypt_decrypt('encrypt',$row['category_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function listServiceCategory($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$service_type_id= $this -> encrypt_decrypt('decrypt',$data['sid']);
			$stmt = $dbCon->prepare("select count(id) as num from cleaning_service_category_availability where service_type_id=? and company_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $service_type_id,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("select * from cleaning_service_category");
			/* bind parameters for markers */
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("INSERT INTO cleaning_service_category_availability (company_id,service_type_id,category_id ) VALUES (?, ?,?)");
				$stmt->bind_param("iii", $company_id,$service_type_id,$row['id']);
				$stmt->execute();	
			}	
			}
			
			
			$stmt = $dbCon->prepare("select cleaning_service_category_availability.id,category_id,action_taken,is_available,category_name from cleaning_service_category_availability left join cleaning_service_category on cleaning_service_category.id=cleaning_service_category_availability.category_id where company_id=? and service_type_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$service_type_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);	
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
		
	 
		
		function updateAdminStatus($data)
		{
			$dbCon = AppModel::createConnection();
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("update employees set is_inspector=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['updateR'],$_POST['id']);
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