<?php
	
	require_once('../AppModel.php');
	class LandloardInvoiceModel extends AppModel
	{
		
		function appId()
		{
			
			return $this -> encrypt_decrypt('encrypt',66);
		}
		
		function urlDetail($data)
		{
			 
			return $this -> encrypt_decrypt('encrypt',$data['REQUEST_URI']); 
			 
			 
		}
		
		function getPermissionDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		$country_id= $data['country_id'];
		$stmt = $dbCon->prepare("select id from manage_apps_permission where country_id=(select country_id from companies where id=?)  and app_id=66");
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
		
		
		
		function landloardInvoices($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 $org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function landloardBrokerComissionSelectedInvoice($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc(); 
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		function landloardBrokerComissionInvoices($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where landloard_company_id=? and is_handled=0");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 $org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function bankDetails($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from company_bank_account_detail where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 $org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		function landloardBrokerComissionHandeledInvoices($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where landloard_company_id=?  and is_handled=1");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 $org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function landloardUnpaidInvoices($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where company_id=? and fully_paid=0");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 $org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		function updateInvoiceHandlePayment($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$invoice_id=$this->encrypt_decrypt('decrypt',$data['invoice_id']);
		$transection_date=strtotime($_POST['transection_date']);
		$stmt = $dbCon->prepare("update landloard_building_owner_invoice_detail  set is_handled=1, landloard_payment_mode=?, landloard_transection_date=?, landloard_bank_id=? where id=?");
		$stmt->bind_param("iiii",$_POST['payment_method'],$transection_date,$_POST['banck_account'],$invoice_id);
		$stmt->execute();
		 
		$this->sendInvoiceHandleDetail($data);
		 
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		
		 function sendInvoiceHandleDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$invoice_id=$this->encrypt_decrypt('decrypt',$data['invoice_id']);
				
		$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where id=?");
        $stmt->bind_param("i", $invoice_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$rowCode = $result->fetch_assoc();
		
		$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where id=?");
        $stmt->bind_param("i", $rowCode['invoice_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$data['rid']=$this->encrypt_decrypt('encrypt',$row['reservation_request_id']);
			$guestReservationDetail=$this->guestReservationDetail($data);
			$to=$guestReservationDetail['broker_info']['company_email'];
			$subject='Invoice handled';
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
                <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Commission invoice handled</h1>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi ! landloard have handled the invoice for installment commission.</div>
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
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">Commission invoice handled</span></td>
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
		}
		
		
		
		function updatePayment($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$transection_date=strtotime($_POST['transection_date']);
		$stmt = $dbCon->prepare("insert into landloard_building_owner_payment_received (company_id, payment_method, total_payment,deposit_code,payment_date,created_on) values (?,?,?,?,?,now())");
		$stmt->bind_param("iiiii",$company_id,$_POST['payment_method'],$_POST['total_paid'],$_POST['deposit_code'],$transection_date);
		$stmt->execute();
			
			
		$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where deposit_code=?");
        $stmt->bind_param("i", $_POST['deposit_code']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		if(!empty($row))
		{
		if($row['is_paid']==1)
		{
		$row['payment_amount']=$row['payment_amount']-$row['payment_amount_received'];	
		}
		if($row['payment_amount']==$_POST['total_paid'])
		{
			$fully_paid=1;
			$access_payment=0;
		}
		else if($row['payment_amount']<$_POST['total_paid'])
		{
			$fully_paid=1;
			$access_payment=1;
		}
		else
		{
			$fully_paid=0;
			$access_payment=0;
		}
		$paidNow=$row['payment_amount_received']+$_POST['total_paid'];
		$dateReceived=strtotime($_POST['transection_date']);
		
        $stmt = $dbCon->prepare("update landloard_building_owner_invoice_detail set is_paid=1,payment_date=?,payment_mode=?,payment_amount_received=?,fully_paid=?,access_payment=? where id=?");
        $stmt->bind_param("siiiii",$dateReceived,$_POST['payment_mode'],$paidNow,$fully_paid,$access_payment, $row['id']);
        $stmt->execute();
		if($row['reservation_request_id']!=null)
		{
			$data['payment']=$paidNow;
			$data['rid']=$this->encrypt_decrypt('encrypt',$row['reservation_request_id']);
			$this->sendInvoicePaymentDetail($data);
		}
		
		if($row['fee_type']==2)
		{
		$stmt = $dbCon->prepare("insert into landloard_owner_invoice_payment_received (invoice_id,payment_received,received_date,agreement_id ,created_on) values (?,?,?,?,now())");
		$stmt->bind_param("iisi",$row['id'],$_POST['total_paid'],$dateReceived,$row['agreement_id']);
		$stmt->execute();
		
		
		if($row['is_deposit']==1)
		{
			 $stmt = $dbCon->prepare("update landloard_object_purchase_agreement set deposit_paid=1,payment_method=? where id=?");
			$stmt->bind_param("ii",$_POST['payment_mode'], $row['agreement_id']);
			$stmt->execute();
		}		
		}
		else if($row['fee_type']==1)
		{
			$date=strtotime($_POST['transection_date']);
			$stmt = $dbCon->prepare("update landloard_apartment_reservation_information set paid_method=?,amount_paid=?,paid_on=?,modified_on=now() where reservation_request_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("iisi",$_POST['payment_mode'],$_POST['total_paid'],$date, $row['reservation_request_id']);
			$stmt->execute();
		}
		
		}
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		
		 function sendInvoicePaymentDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$request_id= $this -> encrypt_decrypt('decrypt',$data['rid']);
			$guestReservationDetail=$this->guestReservationDetail($data);
			$to=$guestReservationDetail['broker_info']['company_email'];
			$subject='Invoice paid';
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
                <h1 style="font-family:&quot;Klarna Display&quot;,Arial,sans-serif;color:white;font-weight:bold;margin-top:0px;margin-bottom:0px;font-size:36px;line-height:40px">Invoice paid</h1>
                <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%" style="margin:0px;padding:0px;border:0px;border-collapse:collapse;width:520px;min-width:100%">
                    <tbody>
                        <tr>
                            <td height="30" style="font-size:30px;line-height:30px;height:30px">&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Hi ! I am pleased to confirm that client have made a payment against your reservation. Kindly review the same and provide us the invoice for the same.</div>
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
                                                <div style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:black;font-weight:normal;font-size:16px;line-height:25px;margin-top:0px;margin-bottom:0px">Here is your reservation and payment details.</div>
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
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">Payment made by client</span></td>
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
                            <td align="left" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:normal;font-size:16px;line-height:20px">Amount</span></td>
                            <td align="right" valign="middle" style="vertical-align:middle;padding-top:15px;padding-bottom:15px;padding-left:15px"><span style="font-family:&quot;Klarna Text&quot;,Arial,sans-serif;color:white;font-weight:bold;font-size:16px;line-height:20px">'.$data['payment'].'</span></td>
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
		
		
		
		function updateInvoicePayment($data)
		{
		$dbCon = AppModel::createConnection();
		$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
		$payment_id=$this->encrypt_decrypt('decrypt',$data['payment_id']);
		 
		$stmt = $dbCon->prepare("select * from landloard_building_owner_payment_received where id=?");
        $stmt->bind_param("i", $payment_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$rowPayment = $result->fetch_assoc();
			
		 
		$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where id=?");
        $stmt->bind_param("i", $_POST['invoice_detail']);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		 
		if($row['is_paid']==1)
		{
		$row['payment_amount']=$row['payment_amount']-$row['payment_amount_received'];	
		}
		if($row['payment_amount']==$rowPayment['total_payment'])
		{
			$fully_paid=1;
			$access_payment=0;
		}
		else if($row['payment_amount']<$rowPayment['total_payment'])
		{
			$fully_paid=1;
			$access_payment=1;
		}
		else
		{
			$fully_paid=0;
			$access_payment=0;
		}
		
		
		$paidNow=$row['payment_amount_received']+$rowPayment['total_payment'];
		$dateReceived=$rowPayment['payment_date'];
		if($row['reservation_request_id']!=null)
		{
			$data['payment']=$paidNow;
			$data['rid']=$this->encrypt_decrypt('encrypt',$row['reservation_request_id']);
			$this->sendInvoicePaymentDetail($data);
		}
        $stmt = $dbCon->prepare("update landloard_building_owner_invoice_detail set is_paid=1,payment_date=?,payment_mode=?,payment_amount_received=?,fully_paid=?,access_payment=? where id=?");
        $stmt->bind_param("siiiii",$dateReceived,$rowPayment['payment_method'],$paidNow,$fully_paid,$access_payment, $row['id']);
        $stmt->execute();
		if($row['fee_type']==2)
		{
		$stmt = $dbCon->prepare("insert into landloard_owner_invoice_payment_received (invoice_id,payment_received,received_date,agreement_id ,created_on) values (?,?,?,?,now())");
		$stmt->bind_param("iisi",$row['id'],$rowPayment['total_payment'],$dateReceived,$row['agreement_id']);
		$stmt->execute();
		
		
		if($row['is_deposit']==1)
		{
			 $stmt = $dbCon->prepare("update landloard_object_purchase_agreement set deposit_paid=1,payment_method=? where id=?");
			$stmt->bind_param("ii",$rowPayment['payment_method'], $row['agreement_id']);
			$stmt->execute();
		}		
		}
		else if($row['fee_type']==1)
		{
			$date=$rowPayment['payment_date'];
			$stmt = $dbCon->prepare("update landloard_apartment_reservation_information set paid_method=?,amount_paid=?,paid_on=?,modified_on=now() where reservation_request_id=?");
			 
			$stmt->bind_param("iisi",$rowPayment['payment_method'],$rowPayment['total_payment'],$date, $row['reservation_request_id']);
			$stmt->execute();
		}
		 
		
		 
		$stmt = $dbCon->prepare("update landloard_building_owner_payment_received set invoice_matched=1 where id=?");
        $stmt->bind_param("i", $payment_id);
        $stmt->execute(); 
		 
		$stmt->close();
		$dbCon->close();
		return 1;
		}
		
		function landloardPaymentReceived($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from landloard_building_owner_payment_received where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			 $org=array();
			while($row = $result->fetch_assoc())
			{
				$row['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				array_push($org,$row);
			}
			 
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		function checkDepositCode($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			 
			$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where deposit_code=?");
			$stmt->bind_param("i", $_POST['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
			$stmt->close();
			$dbCon->close();
			return 1;	
			}
			else
			 {
				if($company_id!=$row['company_id'])
				{
				$stmt->close();
				$dbCon->close();
				return 2;		
				}
				else
				{
				if($row['fully_paid']==1)
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
			
		}
		
	}
?>