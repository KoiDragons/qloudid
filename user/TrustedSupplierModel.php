<?php
require_once('../AppModel.php');
class TrustedSupplierModel extends AppModel
{
 
function testimonialDetail()
    {
        $dbCon = AppModel::createConnection();
		
       $stmt = $dbCon->prepare("select testimonial from company_testimonial group by testimonial limit 0,10");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
		array_push($org,$row);	
			
			}
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function testimonialDetail2()
    {
        $dbCon = AppModel::createConnection();
		
       $stmt = $dbCon->prepare("select testimonial from company_testimonial where id>=11 and id<21 group by testimonial");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
		array_push($org,$row);	
			
			}
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
    function testimonialDetail3()
    {
        $dbCon = AppModel::createConnection();
		
       $stmt = $dbCon->prepare("select testimonial from company_testimonial where id>=21 and id<31 group by testimonial");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
		array_push($org,$row);	
			
			}
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	function testimonialDetail4()
    {
        $dbCon = AppModel::createConnection();
		
       $stmt = $dbCon->prepare("select testimonial from company_testimonial where id>=31 and id<41 group by testimonial");
        
        /* bind parameters for markers */
		
        $stmt->execute();
        $result = $stmt->get_result();
		$org=array();
		while($row = $result->fetch_assoc())
		{
		array_push($org,$row);	
			
			}
		//print_r($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
}