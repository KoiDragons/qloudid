<?php
require_once('../AppModel.php');
class LandloardBrokerModel extends AppModel
{
	function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
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
       
			
			$stmt->close();
			$dbCon->close();
			return $row;
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
		
}