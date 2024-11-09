<?php
require_once('../AppModel.php');
class LandloardBrokerModel extends AppModel
{
	function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
	function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
		}
		 function reservationRequestList($data)
		{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from landloard_society_user_reservation where user_id=? and is_accepted<3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{ 
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$stmt = $dbCon->prepare("select floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where landloard_building_port_floors_offices.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['apartment_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['apartment_details'] = $resultApartmentDetail->fetch_assoc();
			$stmt = $dbCon->prepare("select * from user_logins where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['user_details'] = $resultApartmentDetail->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from landloard_society where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['society_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['society_details'] = $resultApartmentDetail->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from companies where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['society_details']['company_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['company_details'] = $resultApartmentDetail->fetch_assoc();
			
			array_push($org,$row);
			
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		 function guestReservationDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from landloard_society_user_reservation where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$stmt = $dbCon->prepare("select floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where landloard_building_port_floors_offices.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['apartment_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['apartment_details'] = $resultApartmentDetail->fetch_assoc();
			$stmt = $dbCon->prepare("select email,first_name,last_name,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['user_details'] = $resultApartmentDetail->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from landloard_society where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['society_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['society_details'] = $resultApartmentDetail->fetch_assoc();
			//print_r($row['society_details']); die;
			 
			$stmt = $dbCon->prepare("select is_invoice_same,currency_id,d_port_number,i_port_number,latitude,longitude,support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,companies.country_id,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_profiles on companies.id=company_profiles.company_id left join country on companies.country_id=country.id left join phone_country_code on phone_country_code.country_name=country.country_name  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['society_details']['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row['company_details'] = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from company_location_contact_info  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['society_details']['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row['company_contact_details'] = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,country_id,country_name,companies.id,company_name,cid,founded, industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_categories on company_categories.id=companies.industry left join company_profiles on companies.id=company_profiles.company_id left join country on country.id=companies.country_id where companies.id=(select proposal_received_from from landloard_society_user_reservation where id=?)");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['broker_info'] = $result->fetch_assoc(); 
			
			$stmt = $dbCon->prepare("select * from company_location_contact_info  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['broker_info']['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row['broker_contact_details'] = $result->fetch_assoc();
			
			
			// print_r($row['company_contact_details']); die;
			$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=? and sorting_number=1");
					/* bind parameters for markers */
			$stmt->bind_param("i", $row['apartment_id']);
			$stmt->execute();
			$resultApartment = $stmt->get_result();
			$rowPic = $resultApartment->fetch_assoc();
			$row['imageId']=$rowPic['apartment_photo_path'];

			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_reservation_fee where building_id=?");
					/* bind parameters for markers */
			$stmt->bind_param("i", $row['building_id']);
			$stmt->execute();
			$resultApartment = $stmt->get_result();
			$rowPic = $resultApartment->fetch_assoc();
			$row['fee_count']=$rowPic['num'];	
			
			$stmt = $dbCon->prepare("select * from landloard_building_reservation_fee where id=(select reservation_fee_id from landloard_apartment_reservation_information where reservation_request_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['fee_detail'] = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from landloard_apartment_reservation_information where reservation_request_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['reservation_detail'] = $result->fetch_assoc();
			$date=strtotime($row['reservation_detail']['created_on']);
			
			$date=strtotime('+'.($row['fee_detail']['total_weeks']*7).' day',$date);
			 
			$row['fee_to_be_paid']=date('Y-m-d',$date);
			
			
			$stmt = $dbCon->prepare("select * from landloard_building_reservation_installments where reservation_price_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['reservation_detail']['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['reservation_installments']=array();
			while($rowreservation_installments = $result->fetch_assoc())
			{
				array_push($row['reservation_installments'],$rowreservation_installments);
			}
			
			$stmt = $dbCon->prepare("select count(id)as num from landloard_apartment_reservation_agreement where reservation_request_id=? and is_agreement_approved!=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAgCount = $result->fetch_assoc();
			$row['agreement_count']=$rowAgCount['num'];
			$stmt = $dbCon->prepare("select * from landloard_apartment_reservation_agreement where reservation_request_id=? and is_agreement_approved!=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['agreement_detail'] = $result->fetch_assoc();
			if(!empty($row['agreement_detail']))
			{
			$row['agreement_detail']['enc']=$this -> encrypt_decrypt('encrypt',$row['agreement_detail']['id']);
			$date=strtotime($row['agreement_detail']['created_on']);
			
			$date=strtotime('+'.($row['agreement_detail']['installment_payment_term']*7).' day',$date);
			 
			$row['agreement_to_be_accepted']=date('Y-m-d',$date);
			}
			else 
			{
				$row['agreement_to_be_accepted']='';
			}
			
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where agreement_id in (select id from landloard_object_purchase_agreement where reservation_request_id=?)");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['emi_payment_information']=array();
			while($rowPayment = $result->fetch_assoc())
			{
				array_push($row['emi_payment_information'],$rowPayment);
			}
			
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where reservation_request_id=?");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['reservation_fee_details']=$result->fetch_assoc();
			 
			
			$stmt->close();
			$dbCon->close();
			return $row;
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
		
		 function agreementDetailInformation($data)
		{
			$dbCon = AppModel::createConnection();
			$agreement_id= $this -> encrypt_decrypt('decrypt',$data['agreement_id']);
			$stmt = $dbCon->prepare("select * from landloard_apartment_reservation_agreement where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $agreement_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row= $result->fetch_assoc();
			$request_id=$row['reservation_request_id'];
			 
			$stmt = $dbCon->prepare("select * from landloard_society_user_reservation where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			$stmt = $dbCon->prepare("select expected_move_in_date,floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where landloard_building_port_floors_offices.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['apartment_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['apartment_details'] = $resultApartmentDetail->fetch_assoc();
			$stmt = $dbCon->prepare("select email,first_name,last_name,country_of_residence,phone_number from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['user_details'] = $resultApartmentDetail->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from landloard_society where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['society_id']);
			$stmt->execute();
			$resultApartmentDetail = $stmt->get_result();
			$row['society_details'] = $resultApartmentDetail->fetch_assoc();
			$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=? and sorting_number=1");
					/* bind parameters for markers */
			$stmt->bind_param("i", $row['apartment_id']);
			$stmt->execute();
			$resultApartment = $stmt->get_result();
			$rowPic = $resultApartment->fetch_assoc();
			$row['imageId']=$rowPic['apartment_photo_path'];

			$stmt = $dbCon->prepare("select count(id) as num from landloard_building_reservation_fee where building_id=?");
					/* bind parameters for markers */
			$stmt->bind_param("i", $row['building_id']);
			$stmt->execute();
			$resultApartment = $stmt->get_result();
			$rowPic = $resultApartment->fetch_assoc();
			$row['fee_count']=$rowPic['num'];	
			
			$stmt = $dbCon->prepare("select *  from landloard_buildings  where id=?");
			$stmt->bind_param("i", $row['building_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['building_info'] = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from landloard_building_reservation_fee where id=(select reservation_fee_id from landloard_apartment_reservation_information where reservation_request_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['fee_detail'] = $result->fetch_assoc();
			$row['fee_detail']['rid']=$this -> encrypt_decrypt('encrypt',$request_id);
			$stmt = $dbCon->prepare("select * from landloard_apartment_reservation_information where reservation_request_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['reservation_detail'] = $result->fetch_assoc();
			$date=strtotime($row['reservation_detail']['created_on']);
			
			$date=strtotime('+'.($row['fee_detail']['total_weeks']*7).' day',$date);
			 
			$row['fee_to_be_paid']=date('Y-m-d',$date);
			$stmt = $dbCon->prepare("select * from landloard_building_reservation_installments where reservation_price_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['fee_detail']['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['reservation_installments']=array();
			while($rowreservation_installments = $result->fetch_assoc())
			{
				array_push($row['reservation_installments'],$rowreservation_installments);
			}
			$stmt = $dbCon->prepare("select count(id)as num from landloard_apartment_reservation_agreement where reservation_request_id=? and is_agreement_approved!=2");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAgCount = $result->fetch_assoc();
			$row['agreement_count']=$rowAgCount['num'];
			 
			$stmt = $dbCon->prepare("select * from landloard_apartment_reservation_agreement where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $agreement_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['agreement_detail'] = $result->fetch_assoc();
			//print_r($row['agreement_detail']); die;
			if(!empty($row['agreement_detail']))
			{
			$date=strtotime($row['agreement_detail']['created_on']);
			//echo '<pre>'; print_r($row['agreement_detail']['created_on']); echo '</pre>';  die;
			$date=strtotime('+'.($row['agreement_detail']['installment_payment_term']*7).' day',$date);
			 
			$row['agreement_to_be_accepted']=date('Y-m-d',$date);
			 
			}
			else 
			{
				$row['agreement_to_be_accepted']='';
			}

			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where agreement_id in (select id from landloard_object_purchase_agreement where reservation_request_id=?)");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row['emi_payment_information']=array();
			while($rowPayment = $result->fetch_assoc())
			{ 
				
				$rowPayment['enc']=$this -> encrypt_decrypt('encrypt',$rowPayment['id']);
				array_push($row['emi_payment_information'],$rowPayment);
			}
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function agreementInstallmentDates($data)
    {
		
		
		$dbCon = AppModel::createConnection();
		$agreement_id= $this -> encrypt_decrypt('decrypt',$data['agreement_id']);
			
		$stmt = $dbCon->prepare("select *  from landloard_apartment_reservation_agreement_date where agreement_id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $agreement_id);
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
		function rejectAgreement($data)
		{
		
		
		$dbCon = AppModel::createConnection();
		$agreement_id= $this -> encrypt_decrypt('decrypt',$data['agreement_id']);
	     	
		$stmt = $dbCon->prepare("update landloard_apartment_reservation_agreement set is_agreement_approved=2 where id=?");
		$stmt->bind_param("i",$agreement_id);
		$stmt->execute();
		$stmt->close();
		$dbCon->close();
		return 1;
        
    }
	
	
		function approveAgreement($data)
		{
		
		
		$dbCon = AppModel::createConnection();
		$agreement_id= $this -> encrypt_decrypt('decrypt',$data['agreement_id']);
	    $agreementDetailInformation=$this->agreementDetailInformation($data);
		//echo '<pre>'; print_r($agreementDetailInformation); echo '</pre>'; die;
		$stmt = $dbCon->prepare("update landloard_apartment_reservation_agreement set agreement_accept_on=now(),is_agreement_approved=1 where id=?");
		$stmt->bind_param("i",$agreement_id);
		$stmt->execute();
		$owner_object_type=1;
		$stmt = $dbCon->prepare("insert into landloard_building_owners (owner_object_type,owner_type,building_id , company_id , first_name  , last_name  , owner_email  , created_on) values (?, ?, ?, ?, ?, ?, ?, now())");
		$stmt->bind_param("iiiisss",$owner_object_type,$owner_object_type, $agreementDetailInformation['building_id'],$agreementDetailInformation['company_id'],$agreementDetailInformation['user_details']['first_name'],$agreementDetailInformation['user_details']['last_name'],$agreementDetailInformation['user_details']['email']);
		$stmt->execute();	
			 
		$owner_id=$stmt->insert_id;
		$_POST['entry_date']=$agreementDetailInformation['apartment_details']['expected_move_in_date'];
		$entry_date	=strtotime($_POST['entry_date']);
		$stmt = $dbCon->prepare("insert into landloard_object_purchase_agreement (bank_account_id,building_id,owner_id,object_type,object_id ,entry_date,entry_date_value,monthly_fee_applicable,monthly_fee, created_on,reservation_request_id) values (?,?,?,?,?,?,?,?,?,now(),?)");
		$stmt->bind_param("iiiiissiii",$agreementDetailInformation['agreement_detail']['bank_account_id'], $agreementDetailInformation['building_id'],$owner_id,$owner_object_type,$agreementDetailInformation['apartment_id'],$_POST['entry_date'],$entry_date,$owner_object_type,$owner_object_type,$agreementDetailInformation['id']);
		$stmt->execute();

		$id=$stmt->insert_id;
		
		$depositInvoiceDate='';
		 
		$buildingDetailInfo['invoice_date']=1;	
		$_POST['deposit_fee']=0;
		$deposit_paid=1;		
		 /*done till here*/
		$agreementDetailInformation['agreement_detail']['deposit_fee_applicable']=0; 
		if($agreementDetailInformation['agreement_detail']['discount_allowed']==0)
		{
		$agreementDetailInformation['agreement_detail']['total_discount']=0;	
		}
		
		if($agreementDetailInformation['agreement_detail']['late_fee_applicable']==0)
		{
		$agreementDetailInformation['agreement_detail']['total_late_fee']=0;	
		}
		
		$stmt = $dbCon->prepare("update landloard_object_purchase_agreement set `paid_in_full` =?,  `deposit_fee_applicable`=?,  `deposit_fee` =?,  `remaining_fee_paid_in_full` =?,  `total_emis`=?,  `discount_applicable` =?,  `total_discount` =?,  `charge_applicable`=?,  `total_charge` =?,invoice_date_same=?,invoice_date=?,deposit_fee_payment_date=?,deposit_payment_term=?,deposit_paid=? where id=?");
		$stmt->bind_param("iiiiiiiiiiisiii",$agreementDetailInformation['agreement_detail']['full_payment'],$agreementDetailInformation['agreement_detail']['deposit_fee_applicable'],$_POST['deposit_fee'],$_POST['deposit_fee'],$agreementDetailInformation['agreement_detail']['total_installment'],$agreementDetailInformation['agreement_detail']['discount_allowed'],$agreementDetailInformation['agreement_detail']['total_discount'],$agreementDetailInformation['agreement_detail']['late_fee_applicable'],$agreementDetailInformation['agreement_detail']['total_late_fee'],$deposit_paid,$buildingDetailInfo['invoice_date'],$depositInvoiceDate,$deposit_paid,$deposit_paid,$id);
		$stmt->execute();
		if($agreementDetailInformation['agreement_detail']['full_payment']==1)
		{
		$emi=100;
		if(date('d')>$buildingDetailInfo['invoice_date'])
		{
			$m=date('m')+1;
		}
		else
		{
			$m=date('m');
		}
		$dateOfPayment=strtotime(date('Y').'-'.$m.'-'.$buildingDetailInfo['invoice_date']);
		$stmt = $dbCon->prepare("insert into landloard_object_agreement_emi_info (agreement_id,payment_amount,invoice_date) values (?,?,?)");
		$stmt->bind_param("iis",$id,$emi,$dateOfPayment);
		$stmt->execute();	
		}
		
			
		$stmt = $dbCon->prepare("select *  from landloard_apartment_reservation_agreement_date where agreement_id=?");
        /* bind parameters for markers */
		$stmt->bind_param("i", $agreement_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$org=array();
		$i=0;
		while($row = $result->fetch_assoc())
		{
		$emi_payment_term=$agreementDetailInformation['agreement_detail']['installment_payment_term']*7;
		$dateOfPayment=strtotime($row['emi_date']);
		    
		$stmt = $dbCon->prepare("insert into landloard_object_agreement_emi_info (agreement_id,payment_amount,invoice_date,emi_payment_term) values (?,?,?,?)");
		$stmt->bind_param("iisi",$id,$agreementDetailInformation['reservation_installments'][$i]['installment_fee'],$dateOfPayment,$emi_payment_term);
		$stmt->execute();	
		
			$is_deposit=0;
			$dueDate=strtotime('+'.$emi_payment_term.' days',$row['emi_date']);
			 
			$EmiAmount=($agreementDetailInformation['apartment_details']['sale_price']*$agreementDetailInformation['reservation_installments'][$i]['installment_fee'])/100;
			
			$j=0;
				while($j==0)
					{
					$code=mt_rand(1111,9999); 
					$stmt = $dbCon->prepare("select id from landloard_building_owner_invoice_detail where deposit_code=?");
					/* bind parameters for markers */
					$stmt->bind_param("s",$code);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$rowCode = $result2->fetch_assoc();
					if(empty($rowCode))
					{
						$j++;
					}
					}
			
			
			$stmt = $dbCon->prepare("insert into landloard_building_owner_invoice_detail (company_id, deposit_code, agreement_id,payment_amount,invoice_date,payment_due_by,is_deposit) values (?,?,?,?,?,?,?)");
			$stmt->bind_param("iiiissi",$agreementDetailInformation['society_details']['company_id'],$code,$id,$EmiAmount,$dateOfPayment,$dueDate,$is_deposit);
			$stmt->execute();
			$i++;
		}
		 
		$stmt->close();
		$dbCon->close();
		return 1;
        
    }
	 
	
		function reserveSocietyApartment($data)
		{
		
		
		$dbCon = AppModel::createConnection();
		$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
	    $sid= $this -> encrypt_decrypt('decrypt',$data['sid']);
		$bid= $this -> encrypt_decrypt('decrypt',$data['bid']);
		$aid= $this -> encrypt_decrypt('decrypt',$data['aid']);
			
		$stmt = $dbCon->prepare("insert into `qloud_common_signup`(proposal_id,`society_id`,`building_id`,`apartment_id` ) values (?,?,?,?)");
		$stmt->bind_param("iiii",$proposal_id,$sid,$bid,$aid);
		$stmt->execute();
		$id=$stmt->insert_id;	
		$stmt->close();
		$dbCon->close();
		return $this -> encrypt_decrypt('encrypt',$id);;
        
    }
	
		
		
	
	function clientProposalDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select *  from landloard_society_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select first_name,last_name  from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id  where country_of_residence=? and phone_number=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("is", $row['country_id'],$row['phone_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUser = $result->fetch_assoc();
			if(empty($rowUser))
			{
				$row['name']=$row['last_name'];
			}
			else
			{
				$row['name']=$rowUser['last_name'];
			}
			
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
	function poposerEmployeeDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
		$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from landloard_society_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from user_profiles where user_logins_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['created_by']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowUserPhone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from employees where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['created_by']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$employee_id= $row['id'];
			 
			$stmt = $dbCon->prepare("select company_profiles.twitter as tw,company_profiles.fb,company_profiles.insta,company_email,user_logins.created_on,bg_color,f_color,companies.country_id,company_profiles.phone as cphone,passport_image,company_name,country.country_name,user_logins.email,user_logins.first_name,user_logins.last_name,phone_number,phone_country_code.country_code,employees.user_login_id,employees.company_id from employees left join companies on companies.id=employees.company_id left join company_profiles on company_profiles.company_id=companies.id left join user_logins on employees.user_login_id=user_logins.id left join user_profiles on user_profiles.user_logins_id=user_logins.id left join country on user_logins.country_of_residence=country.id left join phone_country_code on phone_country_code.country_name=country.country_name left join corporate_color on companies.id=corporate_color.company_id  where employees.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("select max(id) as v_id from user_passport_logs where user_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_veri = $result->fetch_assoc();
			if(empty($row_veri))
			{
				$row_veri['v_id']="";
			}
			
			
			
			$stmt = $dbCon->prepare("select facebook,twitter,d_country,phone,email,mobile,title,country_code from user_company_profile left join phone_country_code on user_company_profile.c_id=phone_country_code.country_name  where company_id=? and user_login_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $row['company_id'],$row['user_login_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_profile = $result->fetch_assoc();
			//print_r($row_profile); die;
			if($row['user_login_id']==43)
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
				
			}
			else
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where id in(select location_id from employee_location where employee_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $employee_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();	
			if(empty($row_location))
			{
			$stmt = $dbCon->prepare("select visiting_address from property_location  where company_id=? and is_headquarter=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_location = $result->fetch_assoc();		
			}
			}
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=(select country_name from country where id=?)");
			$stmt->bind_param("i",$row['country_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_phone = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where country_name=?");
			$stmt->bind_param("s",$row_profile['d_country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_mobile = $result->fetch_assoc();
			$row['cid']=$this->encrypt_decrypt('encrypt',$row['company_id']);
			$row['phone']=$row_profile['phone'];
			$row['work_email']=$row_profile['email'];
			$row['mobile']=$row_profile['mobile'];
			if($row_profile['title']==null || $row_profile['title']=='-' || $row_profile['title']=='') { $row_profile['title']='Employee'; }  
			$row['title']=$row_profile['title'];
			$row['location']=$row_location['visiting_address'];
			$row['employee_country_code']=$row_profile['country_code'];
			$row['company_country_code']=$row_phone['country_code'];
			$row['mobile_country_code']=$row_mobile['country_code'];
			$row['v_id']=$row_veri['v_id'];
			$row['user_phone']=$rowUserPhone['phone_number'];
			$row['facebook']=$row_profile['facebook'];
			$row['twitter']=$row_profile['twitter'];
			
			
			$stmt = $dbCon->prepare("select * from company_aboutus_content where company_id=? and company_aboutus_id=1");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAbout = $result->fetch_assoc();
			$row['about_us']=$rowAbout['content']; 
			$row['about_is_active']=$rowAbout['is_active']; 
			$stmt = $dbCon->prepare("select * from company_aboutus_content where company_id=? and company_aboutus_id=4");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['company_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowAbout = $result->fetch_assoc();
			$row['who_we_are']=$rowAbout['content']; 
			$stmt->close();
			$dbCon->close();
			return $row;
        
    }
	
	
	function poposerDetail($data)
    {
		
		
		$dbCon = AppModel::createConnection();
       $proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
		$stmt = $dbCon->prepare("select * from user_logins  where id=(select created_by from landloard_society_proposal where id=?)");
        
			/* bind parameters for markers */
		$stmt->bind_param("i", $proposal_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
		$dbCon->close();
		return $row;
        
    }
	
	function teamMemberListing($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from landloard_society_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$company_id=$row['company_id'];
			
			$stmt = $dbCon->prepare("select employees.id,user_logins.first_name,user_logins.last_name,user_login_id,passport_image from employees left join user_logins on user_logins.id=employees.user_login_id where company_id=? and find_in_set(employees.id,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $company_id,$row['team_members']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			
			 $stmt = $dbCon->prepare("select country_code,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile left join phone_country_code on phone_country_code.country_name=user_company_profile.d_country where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);
			$stmt->execute();
			$resultEmp = $stmt->get_result();
		   
			$rowEmp = $resultEmp->fetch_assoc();
			
			$row['work_email']=$rowEmp['email']; 
			$row['wmobile']=$rowEmp['mobile']; 
			$row['mobile']='+'.$rowEmp['country_code'].''.$rowEmp['mobile']; 
			
			
			
			$stmt = $dbCon->prepare("select location_id from employee_location where employee_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['employee_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$rowEmpLoca = $result2->fetch_assoc();
			if(empty($rowEmpLoca))
			{
				$row['location_verified']=0;
			}
			else
			{
				$row['location_verified']=1;
			}
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
						 
																	 } else { $imgs='../html/usercontent/images/notavailable.jpg'; 
																	 
																	 
																	 }
				array_push($org,$row);
				$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=(select user_login_id from employees where id=?)");
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				$org[$j]['verify_emp']=$rowEmp['num'];
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$org[$j]['employee_id']= $this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$org[$j]['img']=$imgs;
				$j++;
				
			}
			//print_r($org); 
			//die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	function employeeListingProposal($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			
			$stmt = $dbCon->prepare("select * from landloard_society_proposal where id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("i", $proposal_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$company_id=$row['company_id'];
			
			$stmt = $dbCon->prepare("select distinct employee_id ,passport_image,manage_employee_permissions.id,company_name,concat_ws(' ', first_name, last_name) as name,last_name,first_name,email,manage_employee_permissions.user_id from manage_employee_permissions left join user_logins on user_logins.id=manage_employee_permissions.user_id left join companies on companies.id=manage_employee_permissions.company_id where company_id=? limit 0,4");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
			
			
			 $stmt = $dbCon->prepare("select country_code,company_permission,h_date,res_date,title,phone,mobile,email,c_id,d_country,department,e_number,card_id  from user_company_profile left join phone_country_code on phone_country_code.country_name=user_company_profile.d_country where company_id=? and user_login_id=?");
        
			/* bind parameters for markers */
			$stmt->bind_param("ii", $company_id,$row['user_id']);
			$stmt->execute();
			$resultEmp = $stmt->get_result();
		   
			$rowEmp = $resultEmp->fetch_assoc();
			
			$row['work_email']=$rowEmp['email']; 
			$row['wmobile']=$rowEmp['mobile']; 
			$row['mobile']='+'.$rowEmp['country_code'].''.$rowEmp['mobile']; 
			
			
			
			$stmt = $dbCon->prepare("select location_id from employee_location where employee_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['employee_id']);
			$stmt->execute();
			$result2 = $stmt->get_result();
			$rowEmpLoca = $result2->fetch_assoc();
			if(empty($rowEmpLoca))
			{
				$row['location_verified']=0;
			}
			else
			{
				$row['location_verified']=1;
			}
				if($row['passport_image']!=null || $row['passport_image']!="") { 
						 
						 $filename="../estorecss/".$row ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['passport_image'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
						 
						 
																	 } else { $imgs='../html/usercontent/images/notavailable.jpg'; 
																	 
																	 
																	 }
				array_push($org,$row);
				$stmt = $dbCon->prepare("select count(id) as num from employee_identificator_verification_detail where employee_user_id=(select user_login_id from employees where id=?)");
				$stmt->bind_param("i", $row['employee_id']);
				$stmt->execute();
				$resultEmp = $stmt->get_result();
				$rowEmp = $resultEmp->fetch_assoc();
				$org[$j]['verify_emp']=$rowEmp['num'];
				$org[$j]['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$org[$j]['uid']= $this -> encrypt_decrypt('encrypt',$row['user_id']);
				$org[$j]['employee_id']= $this -> encrypt_decrypt('encrypt',$row['employee_id']);
				$org[$j]['img']=$imgs;
				$j++;
				
			}
			//print_r($org); 
			//die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
	 function displayProposalProperties($data)
		{
			$dbCon = AppModel::createConnection();
			$proposal_id= $this -> encrypt_decrypt('decrypt',$data['proposal_id']);
			 
					 
				$stmt = $dbCon->prepare("select  * from landloard_society where id in (select property_id from landloard_society_proposal_suggestions where proposal_id=?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $proposal_id);
				$stmt->execute();
				$result = $stmt->get_result();
			   $org=array();
				while($row = $result->fetch_assoc())
				{
				 
				$stmt = $dbCon->prepare("select community_photo_path,sorting_number,id from community_photos where community_id=? and sorting_number=1 order by sorting_number ");
				$stmt->bind_param("s", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if(empty($row1))
				{
					$row['image_count']=0;
					$image='../html/usercontent/images/notavailable.jpg';
				}
				else
				{
				$row['image_count']=1;
				$filename="../estorecss/".$row1 ['community_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['community_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['community_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/notavailable.jpg"; } 	
				}
				
				$row['photo_info']=	'../../../'.$image;
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				 
			 
				array_push($org,$row);
				}	
				 
				 
		  
				 
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
	
	 function getLandloardSocietyDetails($data)
			{
				$dbCon = AppModel::createConnection();
				$sid=$this->encrypt_decrypt('decrypt',$data['sid']);
				
					$stmt = $dbCon->prepare("select * from landloard_society where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $sid);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$row = $resultApartment->fetch_assoc();
					
					$stmt = $dbCon->prepare("select company_name,country_code from companies left join phone_country_code on phone_country_code.id=companies.country_id where companies.id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowCompany = $resultApartment->fetch_assoc();
					$row['company_name']=$rowCompany['company_name'];
					$row['country_code']='+'.$rowCompany['country_code'];
					
					$stmt = $dbCon->prepare("select  * from company_location_contact_info where location_id=(select id from property_location where company_id=? and is_headquarter=1)");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowContact = $result->fetch_assoc();
					
									
				$row['sale_phone_number']= $rowContact['sale_phone_number'];
				
				$stmt = $dbCon->prepare("select * from community_photos where community_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['imageId']=$rowPic['community_photo_path'];
				 
				$stmt->close();
				$dbCon->close();
				return $row;
			}
		
		function getLandloardSocietyPhotos($data)
			{
				$dbCon = AppModel::createConnection();
				$sid=$this->encrypt_decrypt('decrypt',$data['sid']);
				//echo $sid; die;
				$stmt = $dbCon->prepare("select * from community_photos where community_id=?  and sorting_number>1");
				/* bind parameters for markers */
				$stmt->bind_param("i", $sid);
				$stmt->execute();
				$resultApartment = $stmt->get_result();
				$org=array();
				while($rowPic = $resultApartment->fetch_assoc())
				{
					array_push($org,$rowPic);
				}
					 
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		function getLandloardSocietyApartmentList($data)
			{
				$dbCon = AppModel::createConnection();
				$sid=$this->encrypt_decrypt('decrypt',$data['sid']);
				
					$stmt = $dbCon->prepare("select * from landloard_buildings where id in (select building_id from landloard_society_buildings where society_id=?)");
					/* bind parameters for markers */
					$stmt->bind_param("i", $sid);
					$stmt->execute();
					$resultApartmentType = $stmt->get_result();
					$org=array();
					$j=0;
					while($rowApartmentType = $resultApartmentType->fetch_assoc())
					{
						
						$stmt = $dbCon->prepare("select count(landloard_building_port_floors_offices.id) as num  from landloard_building_port_floors_offices  where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1");
						$stmt->bind_param("i", $rowApartmentType['id']);
						$stmt->execute();
						$resultApartmentDetail = $stmt->get_result();
						$rowApartmentDetails = $resultApartmentDetail->fetch_assoc();
						if($rowApartmentDetails['num']==0)
						{
							continue;
						}
						$rowApartmentType['enc']=$this->encrypt_decrypt('encrypt',$rowApartmentType['id']);
						array_push($org,$rowApartmentType);
						$org[$j]['apartment_details']=array();
						$stmt = $dbCon->prepare("select floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1");
						/* bind parameters for markers */
						$stmt->bind_param("i", $rowApartmentType['id']);
						$stmt->execute();
						$resultApartmentDetail = $stmt->get_result();
						while($rowApartmentDetails = $resultApartmentDetail->fetch_assoc())
						{
							$stmt = $dbCon->prepare("select count(id) as num from landloard_apartment_reservation_information where apartment_id=? and is_reserved=1");
							/* bind parameters for markers */
							$stmt->bind_param("i", $rowApartmentDetails['id']);
							$stmt->execute();
							$resultApartment = $stmt->get_result();
							$row = $resultApartment->fetch_assoc();
							
							if($row['num']>0)
							{
								continue;
							}
							
							$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=? and sorting_number=1");
							/* bind parameters for markers */
							$stmt->bind_param("i", $rowApartmentDetails['id']);
							$stmt->execute();
							$resultApartment = $stmt->get_result();
							$rowPic = $resultApartment->fetch_assoc();
							$rowApartmentDetails['imageId']=$rowPic['apartment_photo_path'];
							
							$rowApartmentDetails['enc']=$this->encrypt_decrypt('encrypt',$rowApartmentDetails['id']);
							array_push($org[$j]['apartment_details'],$rowApartmentDetails);
						}
						$j++;
					}
		//	echo '<pre>';	print_r($org); echo '</pre>'; die;
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		
	function getLandloardBuildingDetails($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				
					$stmt = $dbCon->prepare("select * from landloard_buildings where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$row = $resultApartment->fetch_assoc();
					
					$stmt = $dbCon->prepare("select company_name,country_code from companies left join phone_country_code on phone_country_code.id=companies.country_id where companies.id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowCompany = $resultApartment->fetch_assoc();
					$row['company_name']=$rowCompany['company_name'];
					$row['country_code']='+'.$rowCompany['country_code'];
					
					$stmt = $dbCon->prepare("select  * from company_location_contact_info where location_id=(select id from property_location where company_id=? and is_headquarter=1)");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowContact = $result->fetch_assoc();
					
				$row['sale_phone_number']= $rowContact['sale_phone_number'];
				 
				$stmt->close();
				$dbCon->close();
				return $row;
			}
		
function getLandloardObjectPhotos($data)
			{
				$dbCon = AppModel::createConnection();
				$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
				 
				$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=?  and sorting_number>1");
				/* bind parameters for markers */
				$stmt->bind_param("i", $aid);
				$stmt->execute();
				$resultApartment = $stmt->get_result();
				$org=array();
				while($rowPic = $resultApartment->fetch_assoc())
				{
					array_push($org,$rowPic);
				}
					 
				$stmt->close();
				$dbCon->close();
				return $org;
			}		
 
 function getLandloardApartmentDetailInfo($data)
			{
				$dbCon = AppModel::createConnection();
				$aid=$this->encrypt_decrypt('decrypt',$data['aid']);
				
					$stmt = $dbCon->prepare("select apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $aid);
					$stmt->execute();
					$resultApartmentType = $stmt->get_result();
					$rowApartmentType = $resultApartmentType->fetch_assoc();
					$stmt = $dbCon->prepare("select floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where landloard_building_port_floors_offices.id=?");
						/* bind parameters for markers */
					$stmt->bind_param("i", $aid);
					$stmt->execute();
					$resultApartmentDetail = $stmt->get_result();
					$rowApartmentDetails = $resultApartmentDetail->fetch_assoc();
					
					$stmt = $dbCon->prepare("select * from landloard_object_photos where object_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $aid);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$rowApartmentDetails['imageId']=$rowPic['apartment_photo_path'];
							
					$rowApartmentDetails['enc']=$this->encrypt_decrypt('encrypt',$rowApartmentDetails['id']);
					
				$stmt->close();
				$dbCon->close();
				return $rowApartmentDetails;
			}
			
			
			
	function sendInvoceInformation($data)
	{
		$dbCon = AppModel::createConnection();
		$guestReservationDetail    = $model->guestReservationDetail($data);
		$to=$guestReservationDetail['company_details']['company_email'];
		$subject='Invoice handled!';
			
		$emailContent='<html><head></head>

<body style="background-color:black" "="">


    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:black">
        <tbody>
            <tr>
                
           <td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top">



<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
    <tbody>
        <tr>
            <td style="padding-left:20px;padding-right:20px">
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td align="left">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                    <tbody>
                                        <tr>
                                            <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="https://l.klarna.com/22XC?pid=TRX&amp;c=SE.Monthly.MonthlyCapture.Header&amp;af_adset=Install&amp;af_ad=Link.KlarnaLogo&amp;af_dp=klarna%3A%2F%2F&amp;deep_link_value=&amp;af_param_forwarding=false" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://l.klarna.com/22XC?pid%3DTRX%26c%3DSE.Monthly.MonthlyCapture.Header%26af_adset%3DInstall%26af_ad%3DLink.KlarnaLogo%26af_dp%3Dklarna%253A%252F%252F%26deep_link_value%3D%26af_param_forwarding%3Dfalse&amp;source=gmail&amp;ust=1726305277424000&amp;usg=AOvVaw0oJcf_yuJF78bdmkriuZpy"><img src="https://www.safeqloud.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td align="left"><img src="https://ci3.googleusercontent.com/meips/ADKq_Nb58FaQEMikQiCyYZFmNuuZ-TxGSx6p73hh502pC8tFKdNWwK9CO9n5plaN7MLFD1M44xVgrsmhb1_AKwZDACWcPhWe3aP9VVU8Fg8AeGL-hnlaGdx9jePMWghdDsWmoiWsZGNAMUnCwhlr6Nwn-SftaOCnfqT5zjtLanhY801yWUPhLMxq1hfhmZjtGRyv5-fwR-ib19jPmu4hkMY6Kpi9rLWAT9zkmXQLJrcudQhSzzS3hh8UTgOBpOrEBvD7W1WvjZgQa37GmtfrfVLPgBqLNO535aMtsg=s0-d-e1-ft#https://impressions.onelink.me/22XC?pid=TRX&amp;c=SE.Monthly.MonthlyCapture&amp;af_adset=Install&amp;af_ad=Link&amp;af_dp=klarna%3A%2F%2F&amp;deep_link_value=&amp;af_viewthrough_lookback=true&amp;af_param_forwarding=false" height="1" width="1" alt="" style="opacity:0;border:none;margin:0px" class="CToWUd" data-bit="iit" jslog="138226; u014N:xr6bB; 53:WzAsMl0."></td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="15" style="font-size:15px;line-height:15px;height:15px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Invoice handled</h1>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi! '.$guestReservationDetail['user_details']['first_name'].' have handled his invoice please check and update the same in account book.</div>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td valign="middle" bgcolor="#EEEEEE" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;padding:15px 20px;background-color:rgb(238,238,238)">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:480px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="padding-top:3px;vertical-align:top;width:20px"><img src="https://ci3.googleusercontent.com/meips/ADKq_NaKwnDDazSw5s684WMOprgCFdydsZ_wcEsa6cN5-rFpiIQn65u3b7Istn5aje8CP-u1laT59w8P4hU4IsNF5BMG1YAmAa3pXImFUiPQHlFg3jngkxrcjSnxl89aNz1jk9T7nSu_TUJIVv9jsHsv0B2ggyjCejbNNA=s0-d-e1-ft#https://x.klarnacdn.net/comms-assets/1.0.9/comms-platform/lollipop/icons/alert-info-color-icon.png" alt="" width="20" height="20" border="0" style="display:block;outline:0px;width:20px;height:20px" class="CToWUd" data-bit="iit"></td>
                                            <td width="15">&nbsp;</td>
                                            <td>
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Here is information of apartment.</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">Status</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">Invoice handled by guest</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" height="1">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520.015625px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">Apartment</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">#'.$guestReservationDetail['apartment_details']['office_apartment_number'].', Floor - '.$guestReservationDetail['apartment_details']['floor_number'].','.$guestReservationDetail['apartment_details']['bedroom_count'].' Bedrooms</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" height="1">
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520.015625px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">Invoice</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">'.substr($guestReservationDetail['company_details']['company_name'],0,4).'/'.date('Y').'/'.$guestReservationDetail['fee_detail']['id'].'</span></td>
                        </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                
            </td>
        </tr>
    </tbody>
</table>
</td>
 </tr>
        </tbody>
    </table>


</body></html>';
try{
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				sendEmail($subject, $to, $emailContent);
			}
			
			
			$to=$guestReservationDetail['broker_info']['company_email'];
			try{
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				sendEmail($subject, $to, $emailContent);
			}
			
	}


		
}