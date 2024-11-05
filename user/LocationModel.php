<?php
require_once('../AppModel.php');
class LocationModel extends AppModel
{
 
       function updateLocation($data)
    {
        $dbCon = AppModel::createConnection();
       
            $stmt   = $dbCon->prepare("UPDATE user_logins SET country=?,state=?,city=?,district=?  WHERE id=?");
            $status = 1;
            /* bind parameters for markers */
            $stmt->bind_param("iiiii", $data['cntry'], $data['state'],$data['city'],$data['district'],$data['user_id']);
            
            $stmt->execute();
            
          
            if (!$stmt->execute()) {
				  $stmt->close();
        $dbCon->close();
		
                return 0;
            } else {
				  $stmt->close();
        $dbCon->close();
		
                return 1;
            }
       
        
        
    }
	
    function selectCountry()
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("select id,country_name  from country where is_visible= ? order by country_name");
        
        /* bind parameters for markers */
		$cont=0;
       $stmt->bind_param("i", $cont);
        $stmt->execute();
        $result = $stmt->get_result();
        $contry = array();
        while ($row = $result->fetch_assoc()) {
            
            array_push($contry, $row);
        }
        return $contry;
        $stmt->close();
        $dbCon->close();
        
    }
	 
	function selectState($cont)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt  = $dbCon->prepare("select id,state_name from state where country_id=? and is_visible= ? order by id");
        
        /* bind parameters for markers */
      $cont1=0;
        $stmt->bind_param("ii", $cont ,$cont1);
        $stmt->execute();
        $resultState = $stmt->get_result();
        $stat        = array();
        while ($row = $resultState->fetch_assoc()) {
           
            array_push($stat, $row);
        }
       
	  // print_r($stat); die;
	   
        return $stat;
		
		
        $stmt->close();
        $dbCon->close();
        
    }
    
    
    function selectCity($cont)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("SELECT id,city_name FROM cities WHERE state_id= ? and is_visible= ? order by city_name");
        $cont1=0;
        /* bind parameters for markers */
       
        $stmt->bind_param("ii", $cont['sid'], $cont1);
        $stmt->execute();
        $result = $stmt->get_result();
        $org    = array();
        while ($row = $result->fetch_assoc()) {
            
            array_push($org, $row);
        } 
        return $org;
        $stmt->close();
        $dbCon->close();
        
    }
    
	function selectDistrict($cont)
    {
        $dbCon = AppModel::createConnection();
        
        $stmt = $dbCon->prepare("SELECT id,district_name FROM district WHERE city_id= ?  and is_visible= ? order by district_name");
        $cont1=0;
        /* bind parameters for markers */
       
        $stmt->bind_param("ii", $cont['sid'], $cont1);
        $stmt->execute();
        $result = $stmt->get_result();
        $org    = array();
        while ($row = $result->fetch_assoc()) {
            
            array_push($org, $row);
        } 
        return $org;
        $stmt->close();
        $dbCon->close();
        
    }
	
  
}