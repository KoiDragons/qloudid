<?php
	require_once('../AppModel.php');
	class UserProfessionalServiceRequestModel extends AppModel
	{
		
	
	function bookingPrivateCalenderInfo($data)
	{
		$dbCon = AppModel::createConnection();
		$employee_id=$this->encrypt_decrypt('decrypt',$data['employee_id']);
		$bookable_service_id=$this->encrypt_decrypt('decrypt',$data['bookable_service_id']);
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$query="select time_required,post_production_time,preparation_time from dishes_detail_information where id =".$bookable_service_id;
		$result=(mysqli_query($dbCon,$query));
		$timeRequired=0;
		$row=mysqli_fetch_array($result);
		$timeRequired=$timeRequired+$row['time_required']+$row['post_production_time']+$row['preparation_time'];
		
		
		$org=array();
		$timeRequired=round($timeRequired/2);
		$flag=$data['date_flag']*7;
	$startDate=date('d-m-Y',strtotime(date('d-m-Y') . ' +'.$flag.' day'));

	for($i=0;$i<=6;$i++)
	{		
	$org[$i]['timerequired']=$timeRequired;
	$org[$i]['date']=strtotime($startDate . ' +'.$i.' day');
	$weekDay=date('w', strtotime($startDate . ' +'.$i.' day')); 
		if($employee_id==0)
		{
		$query="select id,services_available from employees where company_id=".$company_id;	
		}
		else
		{
			$query="select id,services_available from employees where id=".$employee_id;
		}
		$result=(mysqli_query($dbCon,$query));
		$ids='';
		while($row=mysqli_fetch_array($result))
		{
			 
			/*$query2="select working_day from employee_working_hrs where day_id=".$weekDay." and employee_id=".$row['id'];
			$result2=(mysqli_query($dbCon,$query2));
			$row2=mysqli_fetch_array($result2);
			 
			if($row2['working_day']==0)
			{
				continue;
			}
			*/
			$ids=$ids.$row['id'].',';	
			
		}
		$ids=substr($ids,0,-1);
		$emps=explode(',',$ids);
		$org[$i]['work_time_info']=array();
		if($ids=='')
		{
			continue;
		}	
		$workId="0";
		
		foreach($emps as $key1)
		{
			 
		$bookedDate='0';
		$query2="select booking_time from hotel_roomservice_item_ordered where booked_employee_id=".$key1." and booking_date='".$org[$i]['date']."'";
		$result2=(mysqli_query($dbCon,$query2));
		while($row2=mysqli_fetch_array($result2))
		{
			$bookedDate=$bookedDate.",".$row2['booking_time'];
		}
 
		  
		$query2="select work_start_time,work_end_time,lunch_start_time,lunch_end_time from employee_working_hrs where day_id=".$weekDay." and employee_id=".$key1;
		$result2=(mysqli_query($dbCon,$query2));
		$row2=mysqli_fetch_array($result2);
		if(empty($row2))
		{
		$row2=array();
		$row2['work_start_time']=15;
		$row2['work_end_time']=38;
		$row2['lunch_start_time']=30;
		$row2['lunch_end_time']=32;
		}
		$row2['lunch_end_time']=$row2['lunch_end_time']-1; 
		 
		
		 
		$query="select id,work_time from working_hrs where (id between ".$row2['work_start_time']." and ".$row2['work_end_time'].") and (id not between ".$row2['lunch_start_time']." and ".$row2['lunch_end_time'].")  and id not in (select id from working_hrs where id in (".$bookedDate."))";
		$result=(mysqli_query($dbCon,$query));
		$ids='';
		while($row=mysqli_fetch_array($result))
		{
		$workId=$workId.",".$row['id'];
		//$row['emp_id']=$key1;
		//array_push($org[$i]['work_time_info'],$row);
		$ids=$ids.$row['id'].",";
		}
		
		$dataWork=explode(',',substr($ids,0,-1));
		$avail=1;
		$j=0;
		 
		foreach($dataWork as $key3)
		{
			for($t=0;$t<$timeRequired;$t++)
			{
				$value=(int)$key3+$t;
				if (in_array($value, $dataWork))
				{
				$avail=1;
				}
				else
				{
				$avail=0;
				break;
				}
			}
			
			if($avail==1)
			{
				$query="select id from working_hrs where id=".$key3;
				$result=(mysqli_query($dbCon,$query));
				$row=mysqli_fetch_array($result);
				$row['emp_id']=$key1;
				$reg=1;
			foreach($org[$i]['work_time_info'] as $vals)
			{
				
				if($vals['id']==$row['id'])
				{
					$reg=0;
					break;
				}
			}
			if($row['id']==null || $row['id']=='')
				continue;
			if($reg==1)
			array_push($org[$i]['work_time_info'],$row);
			 //if(!in_array($row,$org[$i]['work_time_info']))
				//array_push($org[$i]['work_time_info'],$row);
			}
		}
		$key2 = array_column($org[$i]['work_time_info'], 'id');

		array_multisort($key2, SORT_ASC, $org[$i]['work_time_info']);
		}
		
	
		
	}
	$dbCon->close();  
	$data['calender']=json_encode($org,true);
	$calender=$this->getCalender($data);
	return $calender;
	}
	
	
	function getCalender($data)
		{
			$dbCon = AppModel::createConnection();
			if($data['date_flag']==0)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
 <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender(1);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
  ';
				}
				else if($data['date_flag']==3)
				{
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender(2);" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
  
                                            <div class="absolute right-0 -top-12 z-20"><button class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none !text-green-200 X1LqXa1wBWadrQb2cUbq focus:!ring-0" disabled=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>';
				}
				else
				{
					$e=$data['date_flag']-1;
					$l=$data['date_flag']+1;
					$earlier='<div class="absolute left-0 -top-12 z-20"><button onclick="getNewCalender('.$e.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><span class="flex items-center justify-center mr-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Earlier</font></font></button></div>
  
   <div class="absolute right-0 -top-12 z-20"><button onclick="getNewCalender('.$l.');" class="
  rounded-full
  inline-flex
  items-center
  justify-center
  h-10
  px-4
  !leading-5
  
  border
  border-green
  focus:!outline-none
  focus:!ring-green-200
  focus:!ring-2
  duration-300
  transition-colors text-green border-none  X1LqXa1wBWadrQb2cUbq focus:!ring-0"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Later</font></font><span class="flex items-center justify-center ml-2 h-5 w-5"><svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4 w-3 -rotate-90"><path d="M1.48698 8.81659C1.17469 8.50765 0.999521 8.08836 1 7.65097C1.00048 7.21358 1.17657 6.79392 1.48953 6.4843C1.8025 6.17468 2.2267 6.00047 2.66881 6C3.11093 5.99953 3.53475 6.17282 3.84703 6.48177L11.5056 14.0585L19.1563 6.48967C19.3112 6.3364 19.4951 6.21476 19.6973 6.13169C19.8996 6.04861 20.1164 6.00573 20.3352 6.0055C20.5541 6.00526 20.7708 6.04768 20.9729 6.13032C21.175 6.21296 21.3586 6.33421 21.5132 6.48714C21.6677 6.64007 21.7903 6.8217 21.8738 7.02164C21.9574 7.22159 22.0002 7.43594 22 7.65245C21.9998 7.86897 21.9564 8.08341 21.8724 8.28353C21.7885 8.48366 21.6655 8.66555 21.5106 8.81881L12.7071 17.5282C12.3755 17.8348 11.9377 18.0037 11.4844 17.9999C11.031 17.9961 10.5969 17.8199 10.2721 17.5077L1.48698 8.81659Z" fill="currentColor"></path></svg></span></button></div>
  
                                          ';
				}
			 $flag=$data['date_flag']*7;
			$startDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$flag=($data['date_flag']*7)+6;
			$endDate=date('M d',strtotime(date('d-m-Y') . ' +'.$flag.' day'));
			$calender=json_decode($data['calender'],true); 
			//echo '<pre>'; print_r($calender); echo '</pre>'; die; 
			$header="";		
			$i=0;			
			$weekDays='';
			 foreach($calender as $key)
			 {
				 
				 
				 if($i==0)
				 {
					 $select="selected";
				 }
				 
				 else
					 {
						$select=""; 
					 }
					 if(count($key['work_time_info'])==0)
					 {
						$header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200 bg-white text-center last-of-type:border-r-[1px] colIndex-'.$i.' text-gray-300"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font></span></div>'; $disable='disabled';
					 }
					 else
					 {
						 $header=$header.'<div class="flex-grow basis-0 border-b-[1px] border-l-[1px] border-gray-200 bg-white text-center last-of-type:border-r-[1px] colIndex-'.$i.' text-gray-900"><span class="block pt-2 text-center text-sm capitalize text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('D',$key['date']).'</font></font></span><span class="relative mx-auto mb-1 block h-11 text-lg font-semibold !leading-[44px] text-inherit"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.date('d',$key['date']).'</font></font><span class="absolute bottom-[2px] left-1/2 h-[6px] w-[6px] -translate-x-1/2 rounded-full bg-gray-900"></span></span></div>'; 
					 }
					
				 
						$weekDays=$weekDays.'<div class="flex-shrink flex-grow basis-0 border-l-[1px] border-b-[1px] border-gray-100 text-center last-of-type:border-r-[1px]">';
						
						     
									foreach($key['work_time_info'] as $key1)
									 {
										 
											 
										 
									$stmt = $dbCon->prepare("select work_time from working_hrs where id=?");
									/* bind parameters for markers */
									 
									$stmt->bind_param("i",$key1['id']);
									$stmt->execute();
									$result = $stmt->get_result();
									$row = $result->fetch_assoc();	 
									
									 
									$weekDays=$weekDays.'<span class="mx-1 my-[6px] flex h-auto cursor-pointer flex-col rounded-md border-[1px] border-solid text-center text-xs font-semibold !leading-9 md:m-2   border-green text-green hover:bg-green bg-green-100 hover:text-white" onclick="updateEmployeeTime('.$key['date'].','.$key1['id'].','.$key1['emp_id'].','.$key['timerequired'].');"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$row['work_time'].'</font></font></span></span>
									
									';	 
									 }
								
								$weekDays=$weekDays.'</div>';
								
						 	 
			$i++;
			 }
		
			if(isset($_POST['w_width']))
			{
			if($_POST['w_width']>700)
					{
						$width=700;
					}
					else
					{
					$width=	$_POST['w_width']-50;
					}	
			}	
			else
			{
				$width=700;
			}
		
			 $dataAvailable='<div class="column_m bs_bb  ">
					
					<div style="position: relative;">
                                    <div class="calendar week-view">
									<p class="sticky !top-16 z-[100] m-0 flex flex-col items-center justify-center bg-white p-3 uppercase"><span class="font-semibold text-gray-900"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'.$startDate.' - '.$endDate.'</font></font></span><span class="text-xs text-gray-700"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Week 45</font></font></span></p>
                                         
                                        <div class="sticky !top-32 z-[100] bg-white shadow" style="height:76px;">
                                            <div class="slick-slider slick-calendar slick-initialized">
                                                <div class="slick-list">
                                                    <div class="slick-track" style="width: '.$width.'px; opacity: 1; transform: translate3d(0px, 0px, 0px);">
                                                        <div data-index="0" class="slick-slide slick-active slick-current" tabindex="-1" aria-hidden="false" style="outline: none; width: '.$width.'px;">
                                                            <div>
                                                                <div class="!flex w-full justify-between" tabindex="-1" style="width: 100%; display: inline-block;">
                                                                     '.$header.'
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            '.$earlier.'
                                        </div>
                                        <div class="hours sticky">
                                            <div class="flex w-full" style="min-height: 300px;">
                                               '.$weekDays.'
                                            </div>
                                        </div>
                                    </div>
                                </div>
					
					
					
				</div>';
				
				 
			$dbCon->close();
			return $dataAvailable;
			
			 
			
		}
	
		
		function employeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id,concat_ws(' ',first_name,last_name) as name,email from employees  where company_id=? and user_login_id!=43");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select * from employee_service_booking_rules  where employee_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				if(empty($rowEmp))
				{
				$stmt = $dbCon->prepare("insert into employee_service_booking_rules(employee_id,company_id,created_on) values(?,?,now())");
				
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['id'],$company_id);
				$stmt->execute();	
				}
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function postedJobMatchingServiceList($data)
		{
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			}
			$dbCon = AppModel::createConnection();
			 
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_price,dish_image,is_active from dishes_detail_information where id in (select qloud_service_id from professional_company_selected_service_todos_price_info where company_id=? and list_on_pickapro=1 and is_bookable=? and professional_category_id=? and professional_subcategory_id=? and domain_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiiii", $company_id,$data['is_service_bookable'],$data['category_id'],$data['subcategory_id'],$data['domain_id']);
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
		
		
		function postedJobsList($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$data['user_id']=$this->encrypt_decrypt('decrypt',$data['uid']);
			$domain_id=$this->encrypt_decrypt('decrypt',$data['domain_id']);
			$stmt = $dbCon->prepare("select property_info_required,address,port_number,zipcode,user_professional_service_request.id,category_name,subcategory_name,user_property_id, selected_qualified_companies from user_professional_service_request left join professional_service_category on professional_service_category.id=user_professional_service_request.category_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join user_address on user_address.id=user_professional_service_request.user_property_id where (user_property_id  is not null or property_info_required=0) and user_professional_service_request.user_id=? and user_professional_service_request.domain_id=?  order by id desc");
			$stmt->bind_param("ii", $data['user_id'],$domain_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;	
		}
		
		function approveBid($data)
		{
			$dbCon = AppModel::createConnection();
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			$qloud_bookable_service_id=$this->encrypt_decrypt('decrypt',$data['qloud_bookable_service_id']); 
			
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=2 where job_id=?");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=1,qloud_bookable_service_id=? where id=?");
			$stmt->bind_param("ii", $qloud_bookable_service_id,$bid_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
	 
	function serviceRequestDetailInfo($data)
		{
			$dbCon = AppModel::createConnection();
		    $job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("select user_id,domain_id from user_professional_service_request  where id=?");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['domain_id']=$this->encrypt_decrypt('encrypt',$row['domain_id']);
			$row['uid']=$this->encrypt_decrypt('encrypt',$row['user_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
	
		function serviceBidsList($data)
		{
			$dbCon = AppModel::createConnection();
		    $job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			 
			$stmt = $dbCon->prepare("select user_professional_service_request.user_id,user_professional_service_request_company_info.id,company_name,per_hour_fee,project_fee,bid_accepted from user_professional_service_request_company_info left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id  where job_id=? and is_accepted=1");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$row['uid']=$this->encrypt_decrypt('encrypt',$row['user_id']);
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		
		function propertyBidsList($data)
		{
			$dbCon = AppModel::createConnection();
		    $job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			} 
			$stmt = $dbCon->prepare("select liked_the_property,property_id,property_title,bedroom_count,user_professional_service_request.user_id,user_professional_service_request_property_bid.id,company_name,property_price from user_professional_service_request_property_bid left join property_manager_apartment_list on property_manager_apartment_list.id=user_professional_service_request_property_bid.property_id left join companies on companies.id=user_professional_service_request_property_bid.company_id left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_property_bid.request_id  where user_professional_service_request_property_bid.request_id=?");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
			$stmt = $dbCon->prepare("select image_path from property_manager_apartment_images  where property_manager_apartment_id=?");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $row['property_id']);
			$stmt->execute();
			$resultImage = $stmt->get_result();
			$rowImage = $resultImage->fetch_assoc();
			 $filename="../estorecss/".$rowImage ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImage ['image_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImage ['image_path'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../html/usercontent/images/default-profile-pic.jpg"; } 
				 
			$row['image_path']=$imgs;
			$row['uid']=$this->encrypt_decrypt('encrypt',$row['user_id']);
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);	
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateBookingTimeInfo($data)
		{
			$dbCon = AppModel::createConnection();
			
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			$qloud_bookable_service_id=$this->encrypt_decrypt('decrypt',$data['bookable_service_id']); 
			$serviceBidsInfo=$this->serviceBidsInfo($data);
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=2 where job_id=?");
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			
			
			$service_type=6;
			$is_verified=1;
			$qloud_checkout_id=0;
			$stmt = $dbCon->prepare("insert into  hotel_roomservice_item_ordered (is_confirmed_employee,booked_employee_id, booking_time, booking_date,qloud_checkout_id,is_verified,service_type,booking_person_id,dish_id,dish_quantity,created_on,is_paid,user_id)values(?,?,?,?,?,?,?,?,?,?,now(),?,?)");
			/* bind parameters for markers */
			$stmt->bind_param("iisiiiiiiiii",$_POST['is_confirmed'],$_POST['booking_employee_id'],$_POST['booking_time'],$_POST['booking_date'],$qloud_checkout_id,$is_verified,$service_type,$serviceBidsInfo['user_id'],$qloud_bookable_service_id,$is_verified,$is_verified,$serviceBidsInfo['user_id']);
			$stmt->execute();
			$id=$stmt->insert_id;
			
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=1,qloud_bookable_service_id=?,booking_employee_id=?, booking_time=?, booking_date=?,hotel_room_service_id=? where id=?");
			$stmt->bind_param("iisiii", $qloud_bookable_service_id,$_POST['booking_employee_id'],$_POST['booking_time'],$_POST['booking_date'],$id,$bid_id);
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		function likedTheProperty($data)
		{
			$dbCon = AppModel::createConnection();
			
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			 
			$stmt = $dbCon->prepare("update `user_professional_service_request_company_info` set  bid_accepted=1 where job_id=? and company_id=(select company_id from user_professional_service_request_property_bid where id=?)");
			$stmt->bind_param("ii", $job_id,$bid_id);
			$stmt->execute();
			 
			
			$stmt = $dbCon->prepare("update `user_professional_service_request_property_bid` set  liked_the_property=1 where id=?");
			$stmt->bind_param("i",$bid_id);
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function dislikedTheProperty($data)
		{
			$dbCon = AppModel::createConnection();
			
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			 
			$stmt = $dbCon->prepare("update `user_professional_service_request_property_bid` set  liked_the_property=2 where id=?");
			$stmt->bind_param("i",$bid_id);
			$stmt->execute();
			
			
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function servicePropertyBidsInfo($data)
		{
			 function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
			} 
			$dbCon = AppModel::createConnection();
		    $bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			$stmt = $dbCon->prepare("select city_name,area_name,property_checks_completed,property_id,start_date,end_date,guest_adult,guest_children,guest_infant,bedroom_count,bathroom_count,property_price,user_professional_service_request_property_bid.deposit_fee,user_professional_service_request_property_bid.cleaning_fee,late_arrival_fee,property_title from user_professional_service_request_property_bid left join property_manager_apartment_list on property_manager_apartment_list.id=user_professional_service_request_property_bid.property_id left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_property_bid.request_id left join vitech_city on vitech_city.id=property_manager_apartment_list.vitech_city left join vitech_area on vitech_area.id=property_manager_apartment_list.vitech_area  where user_professional_service_request_property_bid.id=? and liked_the_property=0");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $bid_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['images']=array();
			
			$stmt = $dbCon->prepare("select * from property_manager_apartment_images where property_manager_apartment_id=? limit 0,4");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $row['property_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			while($rowImage = $result->fetch_assoc())
			{
				$filename="../estorecss/".$rowImage ['image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowImage ['image_path'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowImage ['image_path'].'.jpg' );  $rowImage ['image_path']='../../../../'.$imgs; } else { $value_a="../../html/usercontent/images/default-profile-pic.jpg";  $rowImage ['image_path']="../../html/usercontent/images/default-profile-pic.jpg"; } 
				 
			array_push($row['images'],$rowImage);
			}
			
			$stmt = $dbCon->prepare("select * from property_manager_apartment_checklist where find_in_set(id,?)");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("s", $row['property_checks_completed']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['check_list']=array();
			while($rowImage = $result->fetch_assoc())
			{
			array_push($row['check_list'],$rowImage);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		
		function serviceBidsInfo($data)
		{  
			 
			$dbCon = AppModel::createConnection();
		    $bid_id=$this->encrypt_decrypt('decrypt',$data['bid_id']);
			$stmt = $dbCon->prepare("select user_professional_service_request.domain_id,country_name,bookable_calender, booking_date,work_time,country_code,company_email,user_professional_service_request_company_info.company_id,is_service_bookable,user_professional_service_request.category_id,user_professional_service_request.subcategory_id,company_profiles.address as c_address,company_profiles.city as c_city,category_name,subcategory_name,user_professional_service_request.user_id,user_professional_service_request_company_info.id,company_name,per_hour_fee,project_fee,bid_accepted,company_profiles.phone from user_professional_service_request_company_info left join companies on companies.id=user_professional_service_request_company_info.company_id left join user_professional_service_request on user_professional_service_request.id=user_professional_service_request_company_info.job_id left join professional_service_category on professional_service_category.id=user_professional_service_request.category_id left join professional_service_subcategory on professional_service_subcategory.id=user_professional_service_request.subcategory_id left join company_profiles on company_profiles.company_id=companies.id left join phone_country_code on phone_country_code.id=companies.country_id left join working_hrs on working_hrs.id=user_professional_service_request_company_info.booking_time where user_professional_service_request_company_info.id=?");
			/* bind parameters for markers */
			$cont=1;
		    $stmt->bind_param("i", $bid_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			 
			$row['uid']=$this->encrypt_decrypt('encrypt',$row['user_id']);
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			$job_id=$this->encrypt_decrypt('decrypt',$data['job_id']);
			$stmt = $dbCon->prepare("select user_profiles.address,user_profiles.port_number,user_profiles.city,user_profiles.zipcode,user_profiles.phone_number,user_logins.id,first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image,get_started_wizard_status,grading_status,country_of_residence,country_code,country_name,user_logins.created_on from user_logins left join phone_country_code on phone_country_code.id=user_logins.country_of_residence left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id = ?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			
			
			$stmt = $dbCon->prepare("select address,city,zipcode,port_number from user_address where id=(select user_property_id from user_professional_service_request where id=?)");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $job_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAddress = $result->fetch_assoc();
			
			$row['address']=$rowAddress['address'];
			$row['city']=$rowAddress['city'];
			$row['zipcode']=$rowAddress['zipcode'];
			$row['port_number']=$rowAddress['port_number'];
			
			$stmt = $dbCon->prepare("select count(id) as num from user_visiting_countries where user_login_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCountries = $result->fetch_assoc();
			
			if($rowCountries['num']==0)
			{
				
			$stmt = $dbCon->prepare("insert into user_visiting_countries(user_login_id,country_info,default_country,current_country,created_on) values(?,?,?,?,now())");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("iiii", $data['user_id'],$row['country_of_residence'],$cont,$cont);
			$stmt->execute();	
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
	
	}		