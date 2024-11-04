<?php
ini_set('MAX_EXECUTION_TIME', -1);
require_once 'configs/database.php';
require_once 'configs/encrypt_decrypt.php';
require_once('configs/testMandril.php');
     $dbCon = connect_database("telezale_wrd3");
	// echo date('Y-m-d','1743458400'); die;
	 
 //echo encrypt_decrypt('encrypt',57); die;
echo encrypt_decrypt('decrypt','QkhHaWQzcnBweFU5MDRIMllxY3IzQT09'); die;
	/*  $url="https://us1.locationiq.com/v1/reverse.php?key=pk.1daa15e048f0e38b45be79dc1ecad248&lat=29.5043866&lon=75.8882394&format=json";
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');      
			$responseJson = curl_exec($ch);
			echo curl_error($ch);
			curl_close($ch);
			 
			$response = json_decode($responseJson,true);
	 
	 
	 $select="select id from phone_country_code e country_name='".$response['address']['country']."'";
  
   
	$result=mysqli_query($dbCon, $select); 
 
	 $row=mysqli_fetch_array($result);
	 print_r($row); 
	 die;
	 //
	$to='deservingchandan@gmail.com';
	 $subject='Testing server';
	 $emailContent='Testing server';
	try {
					sendEmail($subject, $to, $emailContent);
					echo 'jain true';
					}

					 
					catch(Exception $e) {
					   
					}
					catch (Error $e) {
						print_r($e); die;
							}
	 
	  $domain = "yellow.com";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.mailcheck.ai/domain/' . $domain);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($ch);
curl_close($ch);

print_r($response); die;*/
	 
 //{"id":"NXJRa0pCb0xqS0VwTGxRK3I5MXBxZz09","rid":"Q1BUeGJBS2g4bENzTXpoK3pCL1VzZz09",rmid":"SlFqNjNlMjBzQk5Id1VTWWlscjB2dz09"}
  //$a=array();
 // $s='av#ng3rs';
 //echo md5($s); 
//echo encrypt_decrypt('decrypt','c3pjOGxlM29IR2tWc0NtcGl4R0dTUT09'); die;
//echo encrypt_decrypt('encrypt',487945);    die;
  /*$a['UserId']=236;दीये
  $a['OtpPin']=126743;
  echo json_encode($a,true);  die;
	 
			ini_set('memory_limit', '-1'); */
 
 
 
 /*$today=strtotime(date('Y-m-d'));   6eqc3258
 echo $today;   
 $select="update hotel_checkout_detail set checkout_booking_date='1648076400' where id<3";
$result=mysqli_query($dbCon, $select); 
 $select="select count(room_id) from hotel_checkout_detail where room_type_id=12 and checkin_booking_date<='".$today."' and checkout_booking_date>'".$today."'";
$result=mysqli_query($dbCon, $select);
$row=mysqli_fetch_array($result);
print_r($row);  
 
date_default_timezone_set("Europe/Stockholm");  
   $date=strtotime(date('Y-m-d'));
   $nextDate=date('Y-m-d', strtotime(date('Y-m-d'). ' + 3 day'));
   $strDate=date('Y-m-d','1652652000'); 
  // echo $strDate; die;
 
  
  
 */
  
// $result=mysqli_query($dbCon, $select); 
  
  
 /*$select="delete from user_identification where user_id=368";
  $result=mysqli_query($dbCon, $select);  
  
  $select="delete from user_cards where user_login_id=368";
  $result=mysqli_query($dbCon, $select);  
  
  $select="delete from user_address where user_id=368";
  $result=mysqli_query($dbCon, $select);
  $select="create table `qloudid`.`landloard_building_amenities`( `id` int(11) NOT NULL AUTO_INCREMENT , `building_id` int(11) , `amenity_id` int(11) , `port_id` varchar(1000) , PRIMARY KEY (`id`))  ;";
 $result=mysqli_query($dbCon, $select);   

 $select="create table `qloudid`.`landloard_building_amenities`( `id` int(11) NOT NULL AUTO_INCREMENT , `building_id` int(11) , `amenity_id` int(11) , `port_id` varchar(1000) , PRIMARY KEY (`id`))  ;";
 $result=mysqli_query($dbCon, $select);  
 
 $select="alter table `qloudid`.`landloard_building_amenities` add column `is_available` tinyint(1) DEFAULT '0' NULL after `port_id`;";
 $result=mysqli_query($dbCon, $select);  
  
  601852*/
 //$stop_date= date('Y-m-d');
 //echo date('Y-m-d',strtotime(date('Y-m-d'). ' +5 day')); die;
   
 //echo strtotime(date('2023-08-11')); die;
     
 
 /*$select="alter table `qloudid`.`landloard_building_tenant` add column `invoice_date` varchar(1000) NULL after `tenant_rent_info`, add column `first_invoice_generated` int(1) DEFAULT '0' NULL after `invoice_date`";
$result=mysqli_query($dbCon, $select);   

$select="select * from user_visiting_countries where user_login_id=21";
$result=mysqli_query($dbCon, $select);  


 $select="alter table `qloudid`.`lanloard_building_amenity_info` add column `amenity_type` tinyint(1) DEFAULT '1' NULL COMMENT '1 for indoor, 2 for book, 3 for storage, 4 for trash' after `adult_amenity`;";
$result=mysqli_query($dbCon, $select);  

 $select="update `lanloard_building_amenity_info` set `id`='4',`amenity_name`='Association room',`multi_port_available`='0',`adult_amenity`='1',`amenity_type`='2' where `id`='4';";
$result=mysqli_query($dbCon, $select);  

 $select="update `lanloard_building_amenity_info` set `id`='9',`amenity_name`='Laundry room',`multi_port_available`='1',`adult_amenity`='1',`amenity_type`='2' where `id`='9';";
$result=mysqli_query($dbCon, $select);  

 $select="update `lanloard_building_amenity_info` set `id`='5',`amenity_name`='Stroller room',`multi_port_available`='1',`adult_amenity`='1',`amenity_type`='3' where `id`='5';";
$result=mysqli_query($dbCon, $select);  

 $select="update `lanloard_building_amenity_info` set `id`='6',`amenity_name`='Bicycle room',`multi_port_available`='1',`adult_amenity`='1',`amenity_type`='3' where `id`='6';";
$result=mysqli_query($dbCon, $select);   

$select="alter table `qloudid`.`landloard_object_agreement_emi_info` add column `emi_payment_term` int(11) DEFAULT '5' NULL after `invoice_generated`;";
$result=mysqli_query($dbCon, $select); 

max730368i 95879
 
 //echo date('Y-m-d',strtotime(date('Y-m-d').'-1 day')); die;


$select="update hotel_checkout_detail set guest_children=1,guest_adult=3,checkout_date='".date('Y-m-d',strtotime(date('Y-m-d')."+10days"))."',checkout_booking_date='".strtotime(date('Y-m-d')."+10days")."',user_id=21,checked_in=1 where id=36";
//$result=mysqli_query($dbCon, $select);   

 $select="create table `qloudid`.`landloard_building_owner_invoice_detail`( `id` int(11) NOT NULL AUTO_INCREMENT , `agreement_id` int(11) , `payment_amount` int(11) , `invoice_date` varchar(1000) , `payment_due_by` varchar(1000) , `is_deposit` int(11) , `is_paid` int(11) DEFAULT '0' , `fully_paid` int(11) DEFAULT '0' , `access_payment` int(11) DEFAULT '0' , `payment_date` varchar(1000) , `payment_mode` int(11) , `payment_amount_received` int(11) , PRIMARY KEY (`id`))  ;";
$result=mysqli_query($dbCon, $select); 
 
   $select="create table `qloudid`.`landloard_owner_invoice_payment_received`( `id` int(11) NOT NULL AUTO_INCREMENT , `invoice_id` int(11) , `payment_received` int(11) , `received_date` varchar(1000) , `agreement_id` int(11) , `created_on` date , PRIMARY KEY (`id`))  ;";
	$result=mysqli_query($dbCon, $select); 
	$select="alter table `qloudid`.`landloard_building_owner_invoice_detail` add column `payment_informed_by_user` int(11) DEFAULT '0' NULL after `payment_amount_received`, add column `payment_done_by_user` int(11) NULL after `payment_informed_by_user`;";
	$result=mysqli_query($dbCon, $select);

$select="alter table `qloudid`.`user_address` add column `tourist_tax_updated` tinyint(1) DEFAULT '0' NULL after `policy_updated`, add column `tourist_tax_applicable` tinyint(1) DEFAULT '0' NULL after `tourist_tax_updated`, add column `tourist_tax` int(11) DEFAULT '0' NULL after `tourist_tax_applicable`;";	
$result=mysqli_query($dbCon, $select); T0NIaWtWaUwrRGQ2UnZiV3ZTUkNEQT09 8307992940

Array ( [id] => 47 [room_type_id] => 4 [checkout_booking_date] => 1672959600 [checkin_booking_date] => 1672614000 [checkin_date] => 2023-01-02 [checkout_date] => 2023-01-06 [guest_adult] => 2 [guest_children] => 0 [room_name] => [room_type] => Junior [property_id] => 291084 [first_name] => Chandan [last_name] => Jain )
 	*/
//$select="s";	
//$result=mysqli_query($dbCon, $select);
 

  
 
//$select="update user_certificates set session_info='N25iNlk5dFVZOUdmaS9sQ0R6d1psRGZndTdON3lPN1RURXcyTUpmb050bz0=' where id=1438";	
//$result=mysqli_query($dbCon, $select); 

/*$select="delete from user_profiles where user_logins_id=1769";	
$result=mysqli_query($dbCon, $select);

$select="delete from user_address where user_id=1769";	
$result=mysqli_query($dbCon, $select);

$select="delete from user_address where user_id=1769";	
$result=mysqli_query($dbCon, $select); 

$select="delete hotel_checkout_dependent_detail where id=5";	
$result=mysqli_query($dbCon, $select);*/
// https://qloudid.com/public/index.php/Hotel/verifyPreCheckinQr/'.$data['qloud_checkout_id'].'
 //$select="update vitech_property_pricing_detail set house_rule_updated=0,arrival_updated=0,markup_info_updated=0,pricing_updated=0";	
//$result=mysqli_query($dbCon, $select);
$select="update vitech_property_description set sellPhrase='Location of peace',generally='Location of peace',sellingHeading='Location of peace',shortSellingDescription='Location of peace' where property_id=100";	
//$result=mysqli_query($dbCon, $select);
$select="alter table `qloudid`.`landloard_apartment_reservation_information` add column `modified_on` datetime NULL after `paid_on`,change `created_on` `created_on` datetime NULL , change `amount_paid` `amount_paid` int(11) NULL , change `paid_on` `paid_on` varchar(1000) character set utf8 collate utf8_unicode_ci NULL ;";	
$result=mysqli_query($dbCon, $select);
 
 $i=1;
 $select="select * from vitech_property_broker_request where company_id=601979 and request_type=2";
  $result=mysqli_query($dbCon, $select); 
 
	 while($row=mysqli_fetch_array($result))  
	 { 
		print_r($row);
	 	 
	 } echo 'done'; die;
 $select="select id,apartment_number from `qloudid`.`user_address`";
  $result=mysqli_query($dbCon, $select); 
 
	 while($row=mysqli_fetch_array($result))  
	 { 
 
 echo '<pre>'; print_r($row); echo '</pre>'; 
 
	 	 
	 }
 die;
 $select="select * from landloard_building_port_floors_offices where id=1";
 $result=mysqli_query($dbCon, $select); 
 while($row=mysqli_fetch_array($result))
 {
	  
	  echo '<pre>'; print_r($row); echo '</pre>'; 
	
 }
 // echo json_encode($org,true); 
   die;		
		
		$org=array();
		$timeRequired=round(5/2);
		 
	for($i=0;$i<=6;$i++)
	{		

$org[$i]['date']=strtotime(date('d-m-Y') . ' +'.$i.' day');
	$weekDay=date('w', strtotime(date('d-m-Y') . ' +'.$i.' day')); 
 $a='8,9';
 
 $b=explode(',',$a);
		$query="select id,services_available from employees where id in (1,927067)";
		$result=(mysqli_query($dbCon,$query));
		$ids='';
		while($row=mysqli_fetch_array($result))
		{
			 
			$query2="select working_day from employee_working_hrs where day_id=".$weekDay." and employee_id=".$row['id'];
			$result2=(mysqli_query($dbCon,$query2));
			$row2=mysqli_fetch_array($result2);
			 
			if($row2['working_day']==0)
			{
				continue;
			}
			$res=1;
			$c=explode(',',$row['services_available']);
			foreach($b as $key)
			{
					if (in_array($key, $c))
						{
						$res=1;
						}
						else
						{
						$res=0;
						break;
						}
							
			}
			if($res==1)
			{
			$ids=$ids.$row['id'].',';	
			}
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
				$query="select id,work_time from working_hrs where id=".$key3;
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
	echo '<pre>';	print_r($org);  echo '</pre>';
	die;
			 
 
		 mysqli_close($dbCon);
			
?>

									<div class="on_clmn padt10">
								 <div class="thr_clmn  wi_35 padr5">
										<div class="pos_rel talc">
									  <div class="column_m container  marb5   fsz14 dark_grey_txt    ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">EMI'.$i.'</span> 
													 </div>
												</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									 
									<div class="wi_100 pos_rel">
								 <Select  name="emi'.$i.'" id="emi'.$i.'" class="css-bnguuq dropdown-bg"  >
								 	'.$emis.'
									 </Select>
								 </div>
								   
									 </div>
									  
									 
									</div> 
									  </div>
									  
									  <div class="thr_clmn  wi_35 padrl5">
										<div class="pos_rel talc">
										<div class="column_m container  marb5   fsz14 dark_grey_txt ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">EMI'.$i.' Payment date</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <input type="date" id="emi'.$i.'_payment_date" name="emi'.$i.'_payment_date" class="css-xt766" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>">
								
								 </div>
								   
									</div>
									</div>
									</div>
									
									<div class="thr_clmn  wi_30 padl5">
										<div class="pos_rel talc">
										<div class="column_m container  marb5   fsz14 dark_grey_txt ">
												<div class="white_bg  bg_fffbcc_a ">
										<div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10">
											<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
												
												<!--<div class="clear hidden-xs"></div>-->
												
												<div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12">
													
													
													
													<div class="fleft wi_100  xs-mar0 xs-padt10">
													
													 
													 <span class="edit-text   jain2 dblock   brdclr_lgtgrey2 fsz14  black_txt  ">EMI'.$i.' Payment term</span> 
													 </div>
													 
													
												
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
											
											</div>
													
									
									<div class="wi_100 pos_rel">
								 <select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="emi'.$i.'_payment_term" id="emi'.$i.'_payment_term">
											        
											  				
															<option value="5" class="lgtgrey2_bg" selected="">5 days</option>
															<option value="10" class="lgtgrey2_bg">10 days</option>
															<option value="15" class="lgtgrey2_bg">15 days</option>
															<option value="30" class="lgtgrey2_bg">30 days</option>
															
												 											
														 
											</select>
								
								 </div>
								   
									</div>
									</div>
									</div>
									
</div>
