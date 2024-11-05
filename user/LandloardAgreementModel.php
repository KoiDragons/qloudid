<?php
require_once('../AppModel.php');
class LandloardAgreementModel extends AppModel
{
  
    function agreementList($data)
    {
        $dbCon = AppModel::createConnection();
        $stmt = $dbCon->prepare("select landloard_building_owners.id,building_name  from landloard_building_owners left join landloard_buildings on landloard_buildings.id=landloard_building_owners.building_id where owner_email=(select email from user_logins where id=?)");
        $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $org = array();
		$j=0;
        while ($row = $result->fetch_assoc()) {
            
            array_push($org, $row);
			$org[$j]['agreements']=array();
			
			$stmt = $dbCon->prepare("select *  from landloard_object_purchase_agreement where owner_id=? order by object_type");
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result1 = $stmt->get_result();
			while ($row1 = $result1->fetch_assoc()) {
				 
				$row1['enc']=$this->encrypt_decrypt('encrypt',$row1['id']);
				if($row1['object_type']==1)
				{
					$stmt = $dbCon->prepare("select *  from landloard_building_port_floors_offices where id=?");
					$stmt->bind_param("i", $row1['object_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$row2 = $result2->fetch_assoc();
					$row1['object']='Apartment';
					$row1['object_number']=$row2['office_apartment_number'];
					$row1['object_price']=$row2['sale_price'];
				}
				else
				{
					$stmt = $dbCon->prepare("select *  from landloard_building_parking where id=?");
					$stmt->bind_param("i", $row1['object_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$row2 = $result2->fetch_assoc();
					$row1['object']='Parking';
					$row1['object_number']=$row2['parking_number'];
					$row1['object_price']=$row2['parking_area']*$row2['parking_price'];
				}	
				array_push($org[$j]['agreements'],$row1);
			}
			$j++;
        }
       
        $stmt->close();
        $dbCon->close();
        return $org;
    }
	
	function agreementDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $agreement_id=$this->encrypt_decrypt('decrypt',$data['agreement_id']);
        $stmt = $dbCon->prepare("select * from landloard_object_purchase_agreement where id=?");
        $stmt->bind_param("i", $agreement_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
			if($row['object_type']==1)
				{
					$stmt = $dbCon->prepare("select *  from landloard_building_port_floors_offices where id=?");
					$stmt->bind_param("i", $row['object_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$row2 = $result2->fetch_assoc();
					$row['object']='Apartment';
					$row['object_number']=$row2['office_apartment_number'];
					$row['object_price']=$row2['sale_price'];
				}
				else
				{
					$stmt = $dbCon->prepare("select *  from landloard_building_parking where id=?");
					$stmt->bind_param("i", $row['object_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					$row2 = $result2->fetch_assoc();
					$row['object']='Parking';
					$row['object_number']=$row2['parking_number'];
					$row['object_price']=$row2['parking_area']*$row2['parking_price'];
				}	
        $stmt->close();
        $dbCon->close();
        return $row;
    }
	
	
	function emiList($data)
    {
        $dbCon = AppModel::createConnection();
        $agreement_id=$this->encrypt_decrypt('decrypt',$data['agreement_id']);
        $stmt = $dbCon->prepare("select * from landloard_object_agreement_emi_info where agreement_id=?");
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
	
	function emiUnpaidInfo($data)
    {
        $dbCon = AppModel::createConnection();
        $agreement_id=$this->encrypt_decrypt('decrypt',$data['agreement_id']);
        $stmt = $dbCon->prepare("select count(id) as num from landloard_building_owner_invoice_detail where agreement_id=? and payment_informed_by_user=0");
        $stmt->bind_param("i", $agreement_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$stmt->close();
        $dbCon->close();
        return $row;
    }
	
	
	function updateTransferDetail($data)
    {
        $dbCon = AppModel::createConnection();
        $agreement_id=$this->encrypt_decrypt('decrypt',$data['agreement_id']);
		
		$stmt = $dbCon->prepare("select * from landloard_building_owner_invoice_detail where agreement_id=? and payment_informed_by_user=0");
        $stmt->bind_param("i", $agreement_id);
        $stmt->execute();
        $result = $stmt->get_result();
		$row = $result->fetch_assoc();
		
		
		if($row['is_deposit']==1)
		{
		$stmt = $dbCon->prepare("update landloard_object_purchase_agreement set deposit_paid=1,bank_transfer_detail=?,payment_method=2 where id=?");
        $stmt->bind_param("si",$_POST['object_type'], $agreement_id);
        $stmt->execute();	
		}
		$dateReceived=strtotime(date('Y-m-d'));
		$stmt = $dbCon->prepare("update landloard_building_owner_invoice_detail set payment_informed_by_user=1,payment_done_by_user=?,payment_made_on_by_user=? where id=?");
        $stmt->bind_param("isi",$row['payment_amount'],$dateReceived, $row['id']);
        $stmt->execute();
		
		
		$stmt = $dbCon->prepare("insert into landloard_owner_invoice_payment_informed (invoice_id,payment_amount,payment_date,agreement_id) values (?,?,?,?)");
		$stmt->bind_param("iisi",$row['id'],$row['payment_amount'],$dateReceived,$agreement_id);
		$stmt->execute();
		 
        $stmt->close();
        $dbCon->close();
        return 1;
    }
	  
}