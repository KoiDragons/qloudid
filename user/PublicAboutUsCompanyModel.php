<?php
require_once('../AppModel.php');
class PublicAboutUsCompanyModel extends AppModel
{
 
function companyWebsite($data)
    {
        $dbCon = AppModel::createConnection();
        $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
		
		//echo $company_id; die;
		
		$stmt = $dbCon->prepare("select id,website from companies where id=?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $company_id);
        $stmt->execute();
        $result = $stmt->get_result();
       
        $row = $result->fetch_assoc();
		//print_r($row); die;
		if(empty($row))
		{
			$stmt->close();
        $dbCon->close();
        return 0;
			}
        else
		
		{
			$stmt->close();
        $dbCon->close();
        return $row['website'];
			}
       
    }
    
	
    
}