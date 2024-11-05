<?php
require_once('../AppModel.php');
class DomainSearchResultsModel extends AppModel
{
	
	  function userSummary($data)
    {
        $dbCon = AppModel::createConnection();
       
		
          $stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,first_name,email,passport_image from user_logins where id = ?");
        /* bind parameters for markers */
		$cont=1;
       $stmt->bind_param("i", $data['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
		 $row = $result->fetch_assoc();
		 $stmt->close();
        $dbCon->close();
		 return $row;
        
        
    }
	
	function partData($data)
    {
        $dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select count(id) as num from companies where company_email like ?");
        
        /* bind parameters for markers */
		$stmt->bind_param("s", $data['search']);
        $stmt->execute();
		$result = $stmt->get_result();
		$row_count = $result->fetch_assoc();
		$org="";
		if($row_count['num'] > 0)
		{
       $stmt = $dbCon->prepare("select id,company_email,company_name,city from companies where company_name like ? or company_email like ? limit 0,50");
        
        /* bind parameters for markers */
		$stmt->bind_param("ss", $data['search'],$data['search']);
        $stmt->execute();
        $result = $stmt->get_result();
		
		$i=0;
		while($row = $result->fetch_assoc())
		{
			if($row['city']=="" || $row['city']=="")
			{
				$city="-";
			}
			else
			{
				$city=$row['city'];
			}
			$cid=$this->encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="result-item padtb20 brdb">
									<div class="dflex alit_c">
										<div class="flex_1">
											<h4 class="padb10 fsz14">'.$city.'</h4>
											<div class="bold fsz16 dgrey_txt">
												<span class="marr5 valm">'.$row['company_name'].'</span>
												<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
												<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
											</div>
										</div>
										<div class="fxshrink_0 dflex alit_c">
											<a href="../SendRequest/sendRequestNew/'.$cid.'" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 green_txt"><span class="fa fa-check"></span></a>
											<div class="wi_100p talr">
												<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
													<span>2 sources</span>
													<span class="fa fa-caret-up dnone diblock_pa"></span>
													<span class="fa fa-caret-down dnone_pa"></span>
												</a>
											</div>
										</div>
									</div>
									<div class="sources-content dnone">
										<ul class="mar0 pad0 padt10">
											<li class="dflex mart10">
												<div class="ovfl_hid ws_now txtovfl_el">
													<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
												</div>
												<span class="fxshrink_0 marl10">February 28, 2017 </span>
											</li>
											<li class="dflex mart10">
												<div class="ovfl_hid ws_now txtovfl_el">
													<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
												</div>
												<span class="fxshrink_0 marl10">February 28, 2017 </span>
											</li>
										</ul>
									</div>
								</div>
								';
			
		}
      
		}// print_r($row_count); die;
		
		if($row_count['num'] < 50)
		{
			$l=50-$row_count['num'];
			$stmt = $dbCon->prepare("select id,company_email,company_name,city from virtual_company where company_name like ? or  company_email like ? limit 0,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ssi",$data['search'],$data['search'], $l);
        $stmt->execute();
        $result = $stmt->get_result();
		while($row = $result->fetch_assoc())
		{
			if($row['city']=="" || $row['city']=="")
			{
				$city="-";
			}
			else
			{
				$city=$row['city'];
			}
			$cid=$this->encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="result-item padtb20 brdb">
									<div class="dflex alit_c">
										<div class="flex_1">
											<h4 class="padb10 fsz14">'.$city.'</h4>
											<div class="bold fsz16 dgrey_txt">
												<span class="marr5 valm">'.$row['company_name'].'</span>
												<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
												<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
											</div>
										</div>
										<div class="fxshrink_0 dflex alit_c">
											<a href="../ClaimCompany/approve/'.$cid.'" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 grey_txt" title="Save the lead"><span class="fa fa-plus"></span></a>
											<div class="wi_100p talr">
												<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
													<span>2 sources</span>
													<span class="fa fa-caret-up dnone diblock_pa"></span>
													<span class="fa fa-caret-down dnone_pa"></span>
												</a>
											</div>
										</div>
									</div>
									<div class="sources-content dnone">
										<ul class="mar0 pad0 padt10">
											<li class="dflex mart10">
												<div class="ovfl_hid ws_now txtovfl_el">
													<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
												</div>
												<span class="fxshrink_0 marl10">February 28, 2017 </span>
											</li>
											<li class="dflex mart10">
												<div class="ovfl_hid ws_now txtovfl_el">
													<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
												</div>
												<span class="fxshrink_0 marl10">February 28, 2017 </span>
											</li>
										</ul>
									</div>
								</div>';
			
		}
       
			
		}
		//print($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	function partDataSearch($data)
    {
        $dbCon = AppModel::createConnection();
		
		$stmt = $dbCon->prepare("select count(id) as num from companies where company_email like ?");
        
        /* bind parameters for markers */
		$stmt->bind_param("s", $data['search']);
        $stmt->execute();
		$result = $stmt->get_result();
		$row_count = $result->fetch_assoc();
		
		$a=50+(50*$data['lmt']);
		$b=$a-50;
       if($row_count['num'] > 0)
		{
       $stmt = $dbCon->prepare("select id,company_email,company_name from companies where company_name like ? or company_email like ? limit 0,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ssi", $data['search'],$data['search'],$a);
        $stmt->execute();
        $result = $stmt->get_result();
		
		$i=0;
		while($row = $result->fetch_assoc())
		{
			if($row['city']=="" || $row['city']=="")
			{
				$city="-";
			}
			else
			{
				$city=$row['city'];
			}
			$cid=$this->encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="result-item padtb20 brdb">
									<div class="dflex alit_c">
										<div class="flex_1">
											<h4 class="padb10 fsz14">'.city.'</h4>
											<div class="bold fsz16 dgrey_txt">
												<span class="marr5 valm">'.$row['company_name'].'</span>
												<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
												<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
											</div>
										</div>
										<div class="fxshrink_0 dflex alit_c">
											<a href="../SendRequest/sendRequestNew/'.$cid.'" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 green_txt"><span class="fa fa-check"></span></a>
											<div class="wi_100p talr">
												<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
													<span>2 sources</span>
													<span class="fa fa-caret-up dnone diblock_pa"></span>
													<span class="fa fa-caret-down dnone_pa"></span>
												</a>
											</div>
										</div>
									</div>
									<div class="sources-content dnone">
										<ul class="mar0 pad0 padt10">
											<li class="dflex mart10">
												<div class="ovfl_hid ws_now txtovfl_el">
													<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
												</div>
												<span class="fxshrink_0 marl10">February 28, 2017 </span>
											</li>
											<li class="dflex mart10">
												<div class="ovfl_hid ws_now txtovfl_el">
													<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
												</div>
												<span class="fxshrink_0 marl10">February 28, 2017 </span>
											</li>
										</ul>
									</div>
								</div>
								';
			
		}
      
		}// print_r($row_count); die;
		
		if($row_count['num'] < $a)
		{
			$l=$a-$row_count['num'];
			$stmt = $dbCon->prepare("select id,company_email,company_name from virtual_company where company_name like ? or  company_email like ? limit 0,?");
        
        /* bind parameters for markers */
		$stmt->bind_param("ssi",$data['search'],$data['search'],$l);
        $stmt->execute();
        $result = $stmt->get_result();
		while($row = $result->fetch_assoc())
		{
			if($row['city']=="" || $row['city']=="")
			{
				$city="-";
			}
			else
			{
				$city=$row['city'];
			}
			$cid=$this->encrypt_decrypt('encrypt',$row['id']);
			$org=$org.'<div class="result-item padtb20 brdb">
									<div class="dflex alit_c">
										<div class="flex_1">
											<h4 class="padb10 fsz14">'.$city.'</h4>
											<div class="bold fsz16 dgrey_txt">
												<span class="marr5 valm">'.$row['company_name'].'</span>
												<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
												<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
											</div>
										</div>
										<div class="fxshrink_0 dflex alit_c">
											<a href="../ClaimCompany/approve/'.$cid.'" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz16 grey_txt" title="Save the lead"><span class="fa fa-plus"></span></a>
											<div class="wi_100p talr">
												<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
													<span>2 sources</span>
													<span class="fa fa-caret-up dnone diblock_pa"></span>
													<span class="fa fa-caret-down dnone_pa"></span>
												</a>
											</div>
										</div>
									</div>
									<div class="sources-content dnone">
										<ul class="mar0 pad0 padt10">
											<li class="dflex mart10">
												<div class="ovfl_hid ws_now txtovfl_el">
													<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
												</div>
												<span class="fxshrink_0 marl10">February 28, 2017 </span>
											</li>
											<li class="dflex mart10">
												<div class="ovfl_hid ws_now txtovfl_el">
													<a href="http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com">http://star-global-conference.com/attend-star-global-conference-2017/speakers#hunter-email:fabien.lacroix@volvo.com</a>
												</div>
												<span class="fxshrink_0 marl10">February 28, 2017 </span>
											</li>
										</ul>
									</div>
								</div>';
			
		}
       
			
		}
		//print($org); die;
		 $stmt->close();
        $dbCon->close();
		 return $org;
        
        
    }
	
	
	
	 
}
