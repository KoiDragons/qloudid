<?php
	require_once('../AppModel.php');
	class LandloardBrokerModel extends AppModel
	{
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		
		function appId($data)
		{
			
			return $this -> encrypt_decrypt('encrypt',$data['fapp_id']);
		}
		
		function generateInvoiceCommision($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$invoice_id= $this -> encrypt_decrypt('decrypt',$data['invoice_id']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$j=0;
			while($j==0)
					{
					$code=mt_rand(1111,9999); 
					$stmt = $dbCon->prepare("select id from landloard_building_owner_invoice_detail where deposit_code=?");
					/* bind parameters for markers */
					$stmt->bind_param("s",$code);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowCode = $result->fetch_assoc();
					if(empty($rowCode))
					{
						$j++;
					}
					}
			$depositInvoiceDate=strtotime(date('Y-m-d'));	
			$fee_type=3;
			$guestReservationDetail    = $this->guestReservationDetail($data); 
			$stmt = $dbCon->prepare("insert into landloard_building_owner_invoice_detail (company_id, deposit_code, invoice_id,payment_amount,invoice_date,payment_due_by,fee_type,vat,landloard_company_id) values (?,?,?,?,?,?,?,?,?)");
			$stmt->bind_param("iiiissiii",$company_id,$code,$invoice_id,$_POST['total_commission'],$depositInvoiceDate,$depositInvoiceDate,$fee_type,$_POST['total_vat'],$guestReservationDetail['company_details']['id']);
			$stmt->execute();
			$this->sendInvoiceCommissionDetail($data);
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		
		
		function sendInvoiceCommissionDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$invoice_id= $this -> encrypt_decrypt('decrypt',$data['invoice_id']);
			$guestReservationDetail=$this->guestReservationDetail($data);
			
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where invoice_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",$invoice_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCode = $result->fetch_assoc();
			
			
			$to=$guestReservationDetail['company_details']['company_email'];
			$subject='Invoice Generated';
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
                                            <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="https://l.klarna.com/22XC?pid=TRX&amp;c=SE.Monthly.MonthlyCapture.Header&amp;af_adset=Install&amp;af_ad=Link.KlarnaLogo&amp;af_dp=klarna%3A%2F%2F&amp;deep_link_value=&amp;af_param_forwarding=false" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://l.klarna.com/22XC?pid%3DTRX%26c%3DSE.Monthly.MonthlyCapture.Header%26af_adset%3DInstall%26af_ad%3DLink.KlarnaLogo%26af_dp%3Dklarna%253A%252F%252F%26deep_link_value%3D%26af_param_forwarding%3Dfalse&amp;source=gmail&amp;ust=1726305277424000&amp;usg=AOvVaw0oJcf_yuJF78bdmkriuZpy"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
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
                <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Commission invoice generated</h1>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi ! Broker have generated the invoice for installment commission.</div>
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
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Here is your invoice for the reservation.</div>
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
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">Commission invoice generated</span></td>
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
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">Commission</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">'.$rowCode['payment_amount'].'</span></td>
                        </tr>

<tr>
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">VAT</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">'.abs(($rowCode['payment_amount']*$rowCode['vat'])/100).'</span></td>
                        </tr>

<tr>
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">Payment amount</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">'.$rowCode['payment_amount']+abs(($rowCode['vat']*$rowCode['payment_amount'])/100).'</span></td>
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
			try {
				 sendEmail($subject, $to, $emailContent);
						}

					catch(Exception $e) {
						$to      = 'kowaken.ghirmai@gmail.com';
						sendEmail($subject, $to, $emailContent);
					   
					}
					
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		
		
		function brokerInvoicePaidDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$invoice_id= $this -> encrypt_decrypt('decrypt',$data['invoice_id']);
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where id=?");
			$stmt->bind_param("i", $invoice_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$row['rid']=$this -> encrypt_decrypt('encrypt',$row['reservation_request_id']);
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		
		function brokerComissionFeeDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select * from landloard_building_reservation_fee where id=(select reservation_fee_id from landloard_apartment_reservation_information where reservation_request_id=?)");
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function bankAccountList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from company_bank_account_detail where company_id=?");
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
		
		
		function brokerInvoicePaidList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where reservation_request_id in (select id from landloard_society_user_reservation where proposal_received_from=?) and is_paid=1 and fully_paid=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				$stmt = $dbCon->prepare("select count(id) as num from landloard_building_owner_invoice_detail where invoice_id=?");
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['num']==0)
				{
					$row['commission_generated']=0;
				}
				else
				{
					$row['commission_generated']=1;
				}
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			
			
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		 function rejectGuestReservationRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("update landloard_society_user_reservation set is_accepted=3 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		function approveGuestReservationRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("update landloard_society_user_reservation set is_accepted=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("select * from landloard_society_user_reservation where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from landloard_building_reservation_fee where building_id=? and is_active=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['building_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowBuilding = $result->fetch_assoc();
			 
			$stmt = $dbCon->prepare("update landloard_society_user_reservation set is_accepted=3 where is_accepted=0 and apartment_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['apartment_id']);
			$stmt->execute();
			
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
			$date=strtotime(date('Y-m-d'));
			$paid=0;
			 
			$row['apartment_details']['sale_price']=abs(($row['apartment_details']['sale_price']*$rowBuilding['random_reservation_fee'])/100);
			$stmt = $dbCon->prepare("insert into `landloard_apartment_reservation_information`(apartment_id,building_id,company_id,reservation_date,paid_method,total_amount,reservation_request_id,created_on,reservation_fee_id)  values(?,?,?,?,?, ?,?, now(),?)");
			/* bind parameters for markers */
			$stmt->bind_param("iiisiiii", $row['apartment_id'],$row['building_id'],$company_id,$date,$paid,$row['apartment_details']['sale_price'],$request_id,$rowBuilding['id']);
			$stmt->execute();
			
			
			$stmt = $dbCon->prepare("select * from landloard_building_reservation_fee where id=(select reservation_fee_id from landloard_apartment_reservation_information where reservation_request_id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowFee_detail= $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from landloard_apartment_reservation_information where reservation_request_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowReservation_detail = $result->fetch_assoc();
			$date=strtotime($row['reservation_detail']['created_on']);
			
			$date=strtotime('+'.($rowFee_detail['total_weeks']*7).' day',$date);
			 
			$fee_to_be_paid=date('Y-m-d',$date);
			$j=0;
			while($j==0)
					{
					$code=mt_rand(1111,9999); 
					$stmt = $dbCon->prepare("select id from landloard_building_owner_invoice_detail where deposit_code=?");
					/* bind parameters for markers */
					$stmt->bind_param("s",$code);
					$stmt->execute();
					$result = $stmt->get_result();
					$rowCode = $result->fetch_assoc();
					if(empty($rowCode))
					{
						$j++;
					}
					}
			$is_deposit=0;
			$fee_type=1;
			$depositInvoiceDate=strtotime(date('Y-m-d'));
			$stmt = $dbCon->prepare("insert into landloard_building_owner_invoice_detail (company_id, deposit_code, reservation_request_id,payment_amount,invoice_date,payment_due_by,fee_type) values (?,?,?,?,?,?,?)");
			$stmt->bind_param("iiiissi",$company_id,$code,$request_id,$row['apartment_details']['sale_price'],$depositInvoiceDate,$fee_to_be_paid,$fee_type);
			$stmt->execute();
			
			
			$to=$row['user_details']['email'];
			$subject="Apartment reservation confirmed";
			$emailContent='<html><head></head>

<body style="background-color:black"">


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
                                            <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="https://l.klarna.com/22XC?pid=TRX&amp;c=SE.Monthly.MonthlyCapture.Header&amp;af_adset=Install&amp;af_ad=Link.KlarnaLogo&amp;af_dp=klarna%3A%2F%2F&amp;deep_link_value=&amp;af_param_forwarding=false" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://l.klarna.com/22XC?pid%3DTRX%26c%3DSE.Monthly.MonthlyCapture.Header%26af_adset%3DInstall%26af_ad%3DLink.KlarnaLogo%26af_dp%3Dklarna%253A%252F%252F%26deep_link_value%3D%26af_param_forwarding%3Dfalse&amp;source=gmail&amp;ust=1726305277424000&amp;usg=AOvVaw0oJcf_yuJF78bdmkriuZpy"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
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
                <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Confirmation of Your Property Reservation.</h1>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi '.$row['user_details']['first_name'].'! I am pleased to confirm that your reservation for the property located at [Property Address] has been successfully processed..</div>
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
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Here is your invoice for the reservation for deposit code:- '.$code.'</div>
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
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">Processed by store</span></td>
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
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">#'.$row['apartment_details']['office_apartment_number'].', Floor - '.$row['apartment_details']['floor_number'].','.$row['apartment_details']['bedroom_count'].' Bedrooms</span></td>
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
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">Reservation fee:</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">'.$row['apartment_details']['sale_price'].'</span></td>
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
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		
		 function guestReservationRequestList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from landloard_society_user_reservation where society_id in (select id from landloard_society where company_id=?) and is_accepted<3");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
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
				
			array_push($org,$row);
			
			}
			$stmt->close();
			$dbCon->close();
			return $org;
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
		function guestReservationAgreementAdd($data)
		{
		$dbCon = AppModel::createConnection();
		$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
		$is_agreement_approved=0;
		$stmt = $dbCon->prepare("insert into `landloard_apartment_reservation_agreement`(bank_account_id,`reservation_request_id`,`monthly_fee_applicable`,`monthly_fee`,`full_payment`,`total_installment`,`installment_payment_term`,`discount_allowed`,`total_discount`,`late_fee_applicable`,`total_late_fee`,`is_agreement_approved`,`created_on`,`agreement_accept_term`) values (?,?,?,?,?,?,?,?,?,?,?,?,now(),?)");
			
		/* bind parameters for markers */
		$stmt->bind_param("iiiiiiiiiiiii",$_POST['bank_account_id'], $request_id,$_POST['monthly_fee_applicable'],$_POST['monthly_fee'],$_POST['full_payment'],$_POST['total_installment'],$_POST['installment_payment_term'],$_POST['discount_allowed'],$_POST['total_discount'],$_POST['late_fee_applicable'],$_POST['total_late_fee'],$is_agreement_approved,$_POST['agreement_accept_term']);
		$stmt->execute();
		$id=$stmt->insert_id;
		if($_POST['full_payment']==0)
		{
		for($i=1;$i<=$_POST['total_installment'];$i++)
		{
			$dateType='emi_date'.$i;
		$stmt = $dbCon->prepare("insert into `landloard_apartment_reservation_agreement_date`(`agreement_id`,`emi_date`) values (?,?)");
			
		/* bind parameters for markers */
		$stmt->bind_param("is", $id,$_POST[$dateType]);
		$stmt->execute();	
		}	
		}
		
		
		
		$enc=$this -> encrypt_decrypt('encrypt',$id);
		$url="https://www.qloudid.com/public/index.php/LandloardBroker/agreementDetail/".$enc;
		$guestReservationDetail    = $this->guestReservationDetail($data);
		if($guestReservationDetail['agreement_detail']['full_payment']==1) $paymentTerms= 'Payment is to be paid in full in advance'; else $paymentTerms= 'Payment is to be paid in '.$guestReservationDetail['agreement_detail']['total_installment'].' installments';
		
		$to=$guestReservationDetail['user_details']['email'];
		$subject='Agreement detail!';
			
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
                                            <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="https://l.klarna.com/22XC?pid=TRX&amp;c=SE.Monthly.MonthlyCapture.Header&amp;af_adset=Install&amp;af_ad=Link.KlarnaLogo&amp;af_dp=klarna%3A%2F%2F&amp;deep_link_value=&amp;af_param_forwarding=false" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://l.klarna.com/22XC?pid%3DTRX%26c%3DSE.Monthly.MonthlyCapture.Header%26af_adset%3DInstall%26af_ad%3DLink.KlarnaLogo%26af_dp%3Dklarna%253A%252F%252F%26deep_link_value%3D%26af_param_forwarding%3Dfalse&amp;source=gmail&amp;ust=1726305277424000&amp;usg=AOvVaw0oJcf_yuJF78bdmkriuZpy"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
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
                <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Agreement generated</h1>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi '.$guestReservationDetail['user_details']['first_name'].'! I am pleased to confirm that your reservation fee has been received and i have created an agreement for you. Kindly review the same and inform us asap.</div>
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
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Here is your agreement for the reservation.</div>
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
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">Agreement generated by store</span></td>
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
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">Payment terms</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">'.$paymentTerms.'</span></td>
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
<table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:bold;font-size:16px;line-height:18px;text-align:center"><a href="'.$url.'" rel="noreferrer" style="text-align:center;text-decoration:none;display:inline-block;font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:bold;font-size:16px;line-height:18px;padding:12px 20px;border-radius:21px;background-color:white"><font style="vertical-align:inherit"><font style="vertical-align:inherit">View agreement</font></font></a></td>
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
			
		$stmt->close();
		$dbCon->close();
		return 1;
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
			
			
			$stmt = $dbCon->prepare("select company_profiles.company_id ,support_email,support_country,support_phone,sales_email,sales_country,sales_phone,invoice_email,invoice_country,invoice_phone,website,country_id,country_name,companies.id,company_name,cid,founded, industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,fb,twitter,insta,blog from companies left join company_categories on company_categories.id=companies.industry left join company_profiles on companies.id=company_profiles.company_id left join country on country.id=companies.country_id where companies.id=(select proposal_received_from from landloard_society_user_reservation where id=?)");
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
		
		 function updateReservationFeePayment($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$date=strtotime($_POST['transection_date']);
			$stmt = $dbCon->prepare("update landloard_apartment_reservation_information set paid_method=?,amount_paid=?,paid_on=?,modified_on=now() where reservation_request_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iisi",$_POST['payment_method'],$_POST['total_paid'],$date, $request_id);
			$stmt->execute();
			$fully_paid=1;
			$access_payment=0;
			
			$stmt = $dbCon->prepare("update landloard_building_owner_invoice_detail set is_paid=1,payment_date=?,payment_mode=?,payment_amount_received=?,fully_paid=?,access_payment=? where reservation_request_id=?");
			$stmt->bind_param("siiiii",$date,$_POST['payment_method'],$_POST['total_paid'],$fully_paid,$access_payment, $request_id);
			$stmt->execute();
			$_POST['deposit_code']='';
			
			$stmt = $dbCon->prepare("insert into landloard_building_owner_payment_received (company_id, payment_method, total_payment,deposit_code,payment_date,created_on,invoice_matched) values (?,?,?,?,?,now(),?)");
			$stmt->bind_param("iiiiii",$company_id,$_POST['payment_method'],$_POST['total_paid'],$_POST['deposit_code'],$date,$fully_paid);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
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
		
		
		
		
		
		function getLandloardApartmentPropertyList($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				
					$stmt = $dbCon->prepare("select apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 group by bedroom_count");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartmentType = $stmt->get_result();
					$org=array();
					$j=0;
					while($rowApartmentType = $resultApartmentType->fetch_assoc())
					{
						array_push($org,$rowApartmentType);
						$org[$j]['apartment_details']=array();
						$stmt = $dbCon->prepare("select floor_number,terrace_available,terrace_area,balcony_available,balcony_area,office_apartment_number,landloard_building_port_floors_offices.id,short_selling_description,apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices left join landloard_apartment_description on landloard_apartment_description.apartment_id=landloard_building_port_floors_offices.id left join landloard_apartment_exterior on landloard_apartment_exterior.apartment_id=landloard_building_port_floors_offices.id left join landloard_building_port_floors on landloard_building_port_floors.id=landloard_building_port_floors_offices.floor_id where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 and bedroom_count=?");
						/* bind parameters for markers */
						$stmt->bind_param("ii", $bid,$rowApartmentType['bedroom_count']);
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
				
				$stmt->close();
				$dbCon->close();
				return $org;
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
		
		function getLandloardBuildingImages($data)
			{
				$dbCon = AppModel::createConnection();
				$bid=$this->encrypt_decrypt('decrypt',$data['bid']);
				
					$stmt = $dbCon->prepare("select * from landloard_building_photos where building_id=? order by sorting_number");
					/* bind parameters for markers */
					$stmt->bind_param("i", $bid);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$org=array();
					
					while($row = $resultApartment->fetch_assoc())
					{
					array_push($org,$row);	
					}
					
					 
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		 function getLandloardPropertyList($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("select * from landloard_buildings where id in(select buildingid from landloard_building_ports where id in(select port_id from landloard_building_port_floors where id in(select floor_id from landloard_building_port_floors_offices where is_office=0 and is_published=1))) and company_id in (select landloard_company_id from `qloudid`.`landloard_broker_request` where sender_company_id=? and is_approved=1)");
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				while($row = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("select company_name from companies where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['company_name']=$rowPic['company_name']; 
					$stmt = $dbCon->prepare("select * from landloard_building_photos where building_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['imageId']=$rowPic['building_photo_path'];
					$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
					$stmt = $dbCon->prepare("select apartment_size,sale_price,bathroom_count,bedroom_count,orientation from landloard_building_port_floors_offices where floor_id in (select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid=?)) and is_published=1 group by bedroom_count");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$row['shortSellingDescription']='';
					$rowApartment = $resultApartment->fetch_assoc();
					$row['size']=$rowApartment['apartment_size'];
					$row['numberOfBathrooms']=$rowApartment['bathroom_count'];
					$row['numberOfBedrooms']=$rowApartment['bedroom_count'];
					$row['orientation']=$rowApartment['orientation'];
					$row['startingPrice']=$rowApartment['sale_price'];
					$row['shortSellingDescription']=$row['shortSellingDescription'].' '.$rowApartment['bedroom_count'].'1 bedrom ('.$rowApartment['apartment_size'].' m2) starting '.$rowApartment['sale_price'];
					
					
					array_push($org,$row);
				}	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		
		function getLandloardProposalCommunityList($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
				 
				$stmt = $dbCon->prepare("select * from `qloudid`.`landloard_society` where id in (select society_id from landloard_society_buildings where building_id in (select buildingid from landloard_building_ports where id in(select port_id from landloard_building_port_floors where id in(select floor_id from landloard_building_port_floors_offices where is_office=0 and is_published=1)))) and company_id in (select landloard_company_id from `qloudid`.`landloard_broker_request` where sender_company_id=? and is_approved=1)");
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				$j=0;
				while($row = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("select company_name from companies where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['company_name']=$rowPic['company_name']; 
					$stmt = $dbCon->prepare("select * from community_photos where community_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['imageId']=$rowPic['community_photo_path'];
					$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
					array_push($org,$row);
				}	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		function listProposals($data)
		{
		$dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
	 
			 
			$stmt = $dbCon->prepare("select * from landloard_society_proposal where company_id=? and proposal_type=1");
        
			/* bind parameters for markers */
			$stmt->bind_param("i",$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			while($row = $result->fetch_assoc())
			{
				
			 $stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$_POST['country']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$row_country = $result1->fetch_assoc();
			$row['country_code']=$row_country['country_code'];
			$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
			array_push($org,$row);
			}
			
			 
		$stmt->close();
        $dbCon->close();
        return $org;
	}	
	
		function sendPropertyProposal($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']); 
			 $stmt = $dbCon->prepare("select id from landloard_society_proposal where `country_id`=? and `phone_number`=? and `company_id`=? and `created_by`=? and proposal_type=1");
			/* bind parameters for markers */
			 
			$stmt->bind_param("isii",$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `landloard_society_proposal`(user_title,first_name,last_name,email, `country_id`,`phone_number`,`created_on`,`company_id`,`created_by`,team_available,team_members)  values(?,?,?,?,?, ?, now(),?,?,?,?)");
			$stmt->bind_param("ssssisiiis",$_POST['title'],$_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['country'],$_POST['pnumber'],$company_id,$data['user_id'],$_POST['team_available'],$_POST['team_member']);
			$stmt->execute();
			$id=$stmt->insert_id;			
			}
			else
			{
			$stmt = $dbCon->prepare("update `landloard_society_proposal` set team_available=?,team_members=? where id=?");
			$stmt->bind_param("isi",$_POST['team_available'],$_POST['team_member'],$row['id']);
			$stmt->execute();
			$id=$row['id'];				
			}
			
			$a=explode(',',$_POST['proposal_data']);
			foreach($a as $key)
			{ 
			$stmt = $dbCon->prepare("select id from landloard_society_proposal_suggestions where `proposal_id`=? and `property_id`=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("is",$id,$key);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt = $dbCon->prepare("insert into `landloard_society_proposal_suggestions`(proposal_id,property_id)  values(?,?)");
			$stmt->bind_param("is",$id,$key);
			$stmt->execute();	
			}
			
			}
			
			 $stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			 
			$stmt->bind_param("i",$_POST['country']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row_country = $result->fetch_assoc();
			$url="https://www.qloudid.com/public/index.php/LandloardBroker/proposerDetail/".$this->encrypt_decrypt('encrypt',$id);
			$surl=getShortUrl($url);
			$subject="Proposal received";
			$emailContent='Hi '.$_POST['fname'].', I have found great properties for you! Check them out: '.$surl.'. Let me know if you are interested!';
			$to            = '+'.trim($row_country['country_code']).''.trim($_POST['pnumber']);
			try{
				$res=sendSms($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				 
			}
			$stmt->close();
			$dbCon->close();
			return 1;
			 
		}
		
		 function getLandloardCommunityList($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id=$this->encrypt_decrypt('decrypt',$data['bid']);
				 
				$stmt = $dbCon->prepare("select * from `qloudid`.`landloard_society` where id in (select society_id from landloard_society_buildings where building_id in (select buildingid from landloard_building_ports where id in(select port_id from landloard_building_port_floors where id in(select floor_id from landloard_building_port_floors_offices where is_office=0 and is_published=1)))) and company_id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				$j=0;
				while($row = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("select company_name from companies where id=?");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['company_id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['company_name']=$rowPic['company_name']; 
					$stmt = $dbCon->prepare("select * from community_photos where community_id=? and sorting_number=1");
					/* bind parameters for markers */
					$stmt->bind_param("i", $row['id']);
					$stmt->execute();
					$resultApartment = $stmt->get_result();
					$rowPic = $resultApartment->fetch_assoc();
					$row['imageId']=$rowPic['community_photo_path'];
					$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
					array_push($org,$row);
				}	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
		
		 function getLandloardApprovedList($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
				$stmt = $dbCon->prepare("select * from companies where id in (select landloard_company_id from `qloudid`.`landloard_broker_request` where sender_company_id=? and is_approved=1)");
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$org=array();
				$j=0;
				while($row = $result->fetch_assoc())
				{
					$stmt = $dbCon->prepare("select count(landloard_building_port_floors_offices.id) as num  from landloard_building_port_floors_offices  where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid in (select id from landloard_buildings where company_id=?))) and is_published=1");
					$stmt->bind_param("i",$row['id']);
					$stmt->execute();
					$resultProfile = $stmt->get_result();
					$rowRequest = $resultProfile->fetch_assoc();
					if($rowRequest['num']==0)
					{
						continue;
					}
					$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
					array_push($org,$row);
				}	
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			
			
			 function getLandloardCompanyDetail($data)
			{
				$dbCon = AppModel::createConnection();
				$company_id=$this->encrypt_decrypt('decrypt',$data['bid']);
				$stmt = $dbCon->prepare("select companies.id,company_name,country_code,country_name from companies left join phone_country_code on phone_country_code.id=companies.country_id where companies.id=?");
				/* bind parameters for markers */
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$row = $result->fetch_assoc();
				
				$stmt = $dbCon->prepare("select profile_pic from company_profiles where company_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$resultProfile = $stmt->get_result();
				$rowProfile = $resultProfile->fetch_assoc();
			
				 if($rowProfile['profile_pic']!=null || $rowProfile['profile_pic']!="") { 
							 
							 $filename="../estorecss/".$rowProfile ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowProfile ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowProfile['profile_pic'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
					$row['photo_info']=	'../../../'.$imgs;
					
					  
				}
				else
				{
				$row['photo_info']=	'../../../../html/usercontent/images/notavailable.jpg';
				
				}
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']); 
					
				$stmt = $dbCon->prepare("select  * from company_location_contact_info where location_id=(select id from property_location where company_id=? and is_headquarter=1)");
					/* bind parameters for markers */
				$stmt->bind_param("i", $row['id']);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowContact = $result->fetch_assoc();
				$row['sale_email']= $rowContact['sale_email'];	
				$row['sale_phone_number']= $rowContact['sale_phone_number'];
				$stmt->close();
				$dbCon->close();
				return $row;
			}
		
			
		 function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		 
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("ii", $company_id,$data['fapp_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $this -> encrypt_decrypt('encrypt',$row['id']);;
		}
		function base64_to_jpeg($base64_string, $output_file) {
				
				$ifp = fopen( $output_file, 'wb' ); 
				
				
				$data = explode( ',', $base64_string );
				
				fwrite( $ifp, base64_decode( $data[1] ) );
				
				
				fclose( $ifp ); 
				
				return $output_file; 
		}
		
		
		function verifyLicence($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$landloard_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select count(id) as num from landloard_broker_request where landloard_company_id=? and licence_number=? and is_approved=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $landloard_id,$_POST['cid']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
				
			$stmt->close();
			$dbCon->close();
			return $row['num'];
		}
		
		
		function brokerRequestInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from companies where id in (select company_id from compnay_app_download where permission_id in(select id from manage_apps_permission where app_id=46)) and id!=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{ 
	 
			$stmt = $dbCon->prepare("select count(landloard_building_port_floors_offices.id) as num  from landloard_building_port_floors_offices  where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid in (select id from landloard_buildings where company_id=?))) and is_published=1");
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();
			$resultProfile = $stmt->get_result();
			$rowRequest = $resultProfile->fetch_assoc();
			if($rowRequest['num']==0)
			{
				continue;
			}
			
			$stmt = $dbCon->prepare("select count(landloard_building_port_floors_offices.id) as num  from landloard_building_port_floors_offices  where floor_id in(select id from landloard_building_port_floors where port_id in(select id from landloard_building_ports where buildingid in (select id from landloard_buildings where company_id=?))) and is_published=1 and id not in (select apartment_id from landloard_apartment_reservation_information where is_reserved=1)");
			$stmt->bind_param("i",$row['id']);
			$stmt->execute();
			$resultProfile = $stmt->get_result();
			$rowRequest = $resultProfile->fetch_assoc();
			 
			$row['apartment_left']=$rowRequest['num'];
			
			$stmt = $dbCon->prepare("select id,is_approved,licence_number from landloard_broker_request where sender_company_id=? and landloard_company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii",$company_id, $row['id']);
			$stmt->execute();
			$resultProfile = $stmt->get_result();
			$rowRequest = $resultProfile->fetch_assoc();
			
			if(empty($rowRequest))
			{
				$row['is_approved']=-2;
				$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
				$row['licence_number']='-';
			}
			else
			{
				if($rowRequest['is_approved']==2)
				{
					$row['is_approved']=-1;
					$row['licence_number']='-';
				}
				else
				{
					if($rowRequest['licence_number']=='')
					{
						$rowRequest['licence_number']='-';
					}
					$row['licence_number']=$rowRequest['licence_number'];
					$row['is_approved']=$rowRequest['is_approved'];
				}
				
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);	
			}
			$stmt = $dbCon->prepare("select profile_pic from company_profiles where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$resultProfile = $stmt->get_result();
			$rowProfile = $resultProfile->fetch_assoc();
		
			 if($rowProfile['profile_pic']!=null || $rowProfile['profile_pic']!="") { 
						 
						 $filename="../estorecss/".$rowProfile ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowProfile ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowProfile['profile_pic'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
				$row['photo_info']=	'../../../'.$imgs;
				
				  
			}
			else
			{
			$row['photo_info']=	'../../../../html/usercontent/images/notavailable.jpg';
			
			}
			array_push($org,$row);
			$key_values = array_column($org, 'is_approved'); 
			array_multisort($key_values, SORT_DESC, $org);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		 function brokerRequestList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select landloard_broker_request.id,is_approved,company_name,sender_company_id,licence_number,application_type from landloard_broker_request left join companies on companies.id= landloard_broker_request.sender_company_id where landloard_company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{ 
			
			 
			 
			$row['enc']= $this -> encrypt_decrypt('encrypt',$row['id']);
			 
			$stmt = $dbCon->prepare("select profile_pic from company_profiles where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['sender_company_id']);
			$stmt->execute();
			$resultProfile = $stmt->get_result();
			$rowProfile = $resultProfile->fetch_assoc();
		
			if($rowProfile['profile_pic']!=null || $rowProfile['profile_pic']!="") { 
						 
						 $filename="../estorecss/".$rowProfile ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowProfile ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowProfile['profile_pic'].'.jpg' ); } else { $imgs="../html/usercontent/images/notavailable.jpg"; }
				$row['photo_info']=	'../../../'.$imgs;
				
				  
			}
			else
			{
			$row['photo_info']=	'../../../../html/usercontent/images/notavailable.jpg';
			
			}
			array_push($org,$row);
			
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function brokerRequestSentList($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select * from landloard_broker_sent_request where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
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
		
		
		
		
		 function rejectRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("update landloard_broker_request set is_approved=2 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		
		 function approveRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("update landloard_broker_request set is_approved=1 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $request_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
		}
		function sendRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$landloard_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			
			$stmt = $dbCon->prepare("select count(id) as num from landloard_broker_request where sender_company_id=? and landloard_company_id=? and licence_number=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("iis", $company_id,$landloard_id,$_POST['licence_number']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			if($row['num']==0)
			{
			$stmt = $dbCon->prepare("insert into landloard_broker_request(sender_company_id,landloard_company_id,created_on,application_type,licence_number) values(?, ?, now(),?,?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("iiis",$company_id,$landloard_id,$_POST['application_type'],$_POST['licence_number']);
			$stmt->execute();
			}
			else
			{
			$stmt = $dbCon->prepare("update landloard_broker_request set is_approved=0, application_type=? ,licence_number=? where sender_company_id=? and landloard_company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("isii",$_POST['application_type'],$_POST['licence_number'],$company_id,$landloard_id);
			$stmt->execute();	
			}
			$this->sendRequestEmail($data);
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function sendRequestEmail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$landloard_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$stmt = $dbCon->prepare("select first_name,last_name,ssn,country_of_residence,email,sex,dob_day,dob_month,dob_year,country_phone,phone_number, address,user_profiles.city,user_profiles.country,user_profiles.zipcode,grading_status,address,port_number,invoice_zipcode,invoice_city,identity_number,issue_month,issue_year,expiry_month,expiry_year,front_image_path,back_image_path from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id left join user_identification on user_identification.user_id=user_logins.id  where user_logins.id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select * from companies  where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowSender = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select * from companies  where id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i", $landloard_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowReceiver = $result->fetch_assoc();
			$to=$rowReceiver['company_email'];
			$subject='A Broker is Eager to Connect with You!';
			$emailContent='<html class="translated-ltr"><head><link type="text/css" rel="stylesheet" charset="UTF-8" href="https://www.gstatic.com/_/translate_http/_/ss/k=translate_http.tr.26tY-h6gH9w.L.W.O/am=XjA/d=0/rs=AN8SPfqxH6skN0uVuOvXhu1kLTotQ5vZoA/m=el_main_css"></head><body style="background-color:black"><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="600" align="center" bgcolor="#FEFEFE" style="margin:0px auto;padding:0px;border:0px;border-collapse:collapse;width:600px;background-color:black">
        <tbody>
            <tr>
                <td align="left" valign="top" style="padding-left:20px;padding-right:20px;text-align:left;vertical-align:top">

<table border="0" cellpadding="0" cellspacing="0" role="presentation" bgcolor="#FEFEFE" width="100" style="font-family:Helvetica;font-size:12px;font-style:normal;font-variant-caps:normal;font-weight:400;letter-spacing:normal;text-align:start;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:black;text-decoration:none;margin:0px;padding:0px;border:0px;border-collapse:collapse;width:806px">
    <tbody>
        <tr>
            <td align="center" valign="top" style="vertical-align:top">
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
                                                                            <td valign="middle" style="font-size:20px;line-height:20px;font-weight:bold;vertical-align:middle"><a href="https://www.klarna.com/" rel="noreferrer" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.klarna.com/&amp;source=gmail&amp;ust=1723522238441000&amp;usg=AOvVaw2NZlK4_Rg2lcVnGVTtFLBi"><img src="https://www.qloudid.com/html/usercontent/images/gettxp/logo.jpeg" alt="Klarna." width="98" height="98" border="0" style="display:block;outline:0px;width:98px;height:98px" class="CToWUd" data-bit="iit"></a></td>
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
                                                <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dear  '.$rowReceiver['company_name'].'</font></font></h1>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">I hope this message finds you well.</font></font></div>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="margin:0px;padding:0px;border:0px;border-collapse:collapse">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:bold;font-size:16px;line-height:18px;text-align:center"><a href="https://www.qloudid.com/company/index.php/LandloardBroker/brokersList/'.$data['rid'].'" rel="noreferrer" style="text-align:center;text-decoration:none;display:inline-block;font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:bold;font-size:16px;line-height:18px;padding:12px 20px;border-radius:21px;background-color:white" target="_blank" data-saferedirecturl="https://www.qloudid.com/company/index.php/LandloardBroker/brokersList/'.$data['rid'].'"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Confirm request</font></font></a></td>
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
                                                            <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
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
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Click on this link or the button above "Confirm request"</font></font></div>
                                                
                                                
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">We have a broker interested in connecting with you to access your latest property listings. This could be a valuable opportunity for both parties.</font><font style="vertical-align: inherit;"> .</font></font><font style="vertical-align: inherit;"></font></div>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                


<div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Log in to your [Software/Platform Name] account to discover who this broker is and how you can benefit from this potential collaboration.</font><font style="vertical-align: inherit;"> .</font></font><font style="vertical-align: inherit;"></font></div><table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>











<div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Best Regards</font></font></font></font></font><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">.</font></font></font></font></font></font><font style="vertical-align: inherit;"></font></div>



<table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>

<div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:rgb(85,85,85);font-weight:normal;font-size:14px;line-height:20px;margin-top:0px;margin-bottom:0px">'.$row['first_name'].'<br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important">Employee</span><br><span style="font-family:inherit!important;font-size:inherit!important;font-weight:inherit!important;line-height:inherit!important;color:inherit!important;text-decoration:none!important">'.$rowSender['company_name'].'</span><br>'.$row['phone_number'].'
<br>
'.$row['email'].'</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td style="padding-left:20px;padding-right:20px">
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td height="1" style="font-size:1px;line-height:1px;height:1px;background-color:rgb(238,238,238)">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:560px;min-width:100%">
                                    <tbody>
                                        <tr>
                                            <td height="50" style="font-size:50px;line-height:50px;height:50px">&nbsp;</td>
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
</table></td></tr></tbody></table></body></html>';

			try{
				sendEmail($subject, $to, $emailContent);
			}
			catch(Exception $e) {
				$to='kowaken.ghirmai@gmail.com';
				sendEmail($subject, $to, $emailContent);
			}

		}
		function resendRequest($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			 
			$stmt = $dbCon->prepare("update landloard_broker_request set is_approved=0 where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i",$request_id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
	}
