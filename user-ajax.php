<?php

 require_once 'configs/encrypt_decrypt.php';
		if(isset($_POST['emp']))
		{
		require_once 'configs/database.php';
		$dbCon = connect_database("");
			$sql="select company_id from oauth_clients where client_id='".$_POST['client_id']."' and client_secret='".$_POST['pass']."'";
			//echo $sql; die;
			$row=mysqli_fetch_array(mysqli_query($dbCon, $sql));
			if(empty($row))
			{
				echo json_encode(array('error_msg' => 'Authentication failed')); die;
			}
			else
			{
				$employee=encrypt_decrypt('decrypt',$_POST['emp']);
				$sql="select email,company_id,user_login_id from employees where id=".$employee;
				
				$row_em=mysqli_fetch_array(mysqli_query($dbCon, $sql));
				if(empty($row_em))
			{
				echo json_encode(array('error_msg' => 'Invalid credentials')); die;
			}
			else
			{ 
			 $query="select company_permission from user_company_profile where user_login_id=".$row_em['user_login_id']." and company_id=".$row_em['company_id'];

			$row_employee=mysqli_fetch_array(mysqli_query($dbCon, $query));
			
			$query="select company_id from oauth_clients where client_id='".$_POST['client_id']."'";

			$row_seller=mysqli_fetch_array(mysqli_query($dbCon, $query));
			
			 $query="insert into oauth_permission_check (seller_company_id,user_company_id,user_email,created_on) values(".$row_seller['company_id'].",".$row_em['company_id'].",'".$row_em['email']."',now())";
			 $result=mysqli_query($dbCon, $query);
			if($row_employee['company_permission']==1)
			  {
				  $out='Yes';
			  }
			  else
			  {
				  $out='No';
			  }
			  
			  echo json_encode(array('permission' => $out)); 
			}
			}
		}
		
		if(isset($_GET['job_family']))
		{
		require_once 'configs/database.php';
		$dbCon = connect_database("");
			$level1_id=$_GET['job_family'];
			$sql="select id, job_function from job_function_vacancy where job_family_id=".$level1_id;
			//echo $sql; die;
			$result=mysqli_query($dbCon, $sql);
			$output = '<option value="">Select</option>';
			while($row=mysqli_fetch_array($result))
			{
				$output = $output. "<option value=". $row['id'].">". $row['job_function'] ."</option>";
			}
			echo $output;
		}
		
		if(isset($_GET['job_function']))
		{
		require_once 'configs/database.php';
		$dbCon = connect_database("");
			$level1_id=$_GET['job_function'];
			$sql="select id, job_position from job_position where job_function_id=".$level1_id;
			//echo $sql; die;
			$result=mysqli_query($dbCon, $sql);
			$output = '<option value="">Select</option>';
			while($row=mysqli_fetch_array($result))
			{
				$output = $output. "<option value=". $row['id'].">". $row['job_position'] ."</option>";
			}
			echo $output;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
			if(isset($_GET['plan']))
		{
		require_once 'configs/database.php';
		$dbCon = connect_database("");
		//echo $_GET['plan']; die;
			$level1_id=$_GET['plan'];
			$comp_buy="select bussiness_app_id from plan where id=(select plan_id from company_purchased_plan where paid=1 and company_id=".$_GET['cid'].")";
			$bus=mysqli_fetch_array(mysqli_query($dbCon,$comp_buy));
			if(!empty($bus))
			{
			if($bus['bussiness_app_id']==$level1_id)
			{
				$sql="select id,`name` from plan where id > (select plan_id from company_purchased_plan where company_id=".$_GET['cid'].") and bussiness_app_id=".$level1_id;
			}
			else
			{
			$sql="select id,`name` from plan where bussiness_app_id=".$level1_id;
			}
			}
			else
			{
			$sql="select id,`name` from plan where bussiness_app_id=".$level1_id;
			}
			
			//echo $sql; die;
			$result=mysqli_query($dbCon, $sql);
			$output = '<option value="0">Select</option>';
			while($row=mysqli_fetch_array($result))
			{
				$output = $output. "<option value=". $row['id'].">". $row['name'] ."</option>";
			}
			echo $output;
		}
		
		if( isset($_GET['invoice_list']) && isset($_GET['company_id'])  )
		{
			require_once 'configs/database.php';
			$dbCon = connect_database("");
			$company_id = encrypt_decrypt('decrypt',$_GET['company_id']);
			
			$query = "select id,contractor_report_id,is_paid from invoices where posted_project_company_id=".$company_id;
			//echo $query;die;
			$result = mysqli_query($dbCon, $query);
			
			$output = '<tr>
		<th>Invoice No.</th>
		<th>View Invoice</th>
		<th>Status</th>
	</tr>';
			//echo $output; die;
			while($row = mysqli_fetch_array($result))
			{
					$output = $output .'<tr>';
					if($row['is_paid'] == 1)
						$output = $output . '<td>'.$row['id'].'</td><td><a href="genratedreport.php?id='.encrypt_decrypt('encrypt',$row['contractor_report_id']).'&paid=true&type=invoice&invoice_id='.$row['id'].'">View Invoice</a></td>';
					else
						$output = $output . '<td>'.$row['id'].'</td><td><a href="genratedreport.php?id='.encrypt_decrypt('encrypt',$row['contractor_report_id']).'&type=invoice&invoice_id='.$row['id'].'">View Invoice</a></td>';
					
					if($row['is_paid'] == 1)
						$output = $output .'<td>Paid</td>';
					else
						$output = $output .'<td>Not Paid</td>';
					$output = $output .'</tr>';
			}
			echo $output; die;

		}
		
		if(isset($_GET['commodity_estudio']))
		{
		require_once 'configs/database.php';
		$dbCon = connect_database("");
			$level1_id=$_GET['commodity_estudio'];
			$sql="select id, title from commodity_level1 where is_deleted=0 and estudio_id=".$level1_id;
			//echo $sql; die;
			$result=mysqli_query($dbCon, $sql);
			$output = '<option value="0">Select</option>';
			while($row=mysqli_fetch_array($result))
			{
				$output = $output. "<option value=". $row['id'].">". $row['title'] ."</option>";
			}
			echo $output;
		}
		
		if(isset($_GET['position']))
		{
		require_once 'configs/database.php';
		$dbCon = connect_database("");
		$delete="delete from position where id=".strip_tags($_GET['position']);
		$result=mysqli_query($dbCon,$delete);
		$output='';
		$select_position="select * from position where location_id=".strip_tags($_GET['location']); 
					$result_ps=mysqli_query($dbCon,$select_position);
					while($row_position=mysqli_fetch_array($result_ps))
					{
		$output=$output.' <div id="text-field" class="column_m" >
					    <div class="padb10">Question</div>
                        <div class="lgtblue_txt padb10">Question description goes here</div>
                    <ul class="quizfields">
                      <li>
                        <div class="txlabel">Position</div>
                        <div  class="txtfield">
						<select  name="pos_name[]" id="pos_name[]" >
						<option value="'.$row_position['p_name'].'">'.$row_position['p_name'].'</option>
		<option value="CEO">CEO</option>
			<option value="C-level Manager">C-level Manager</option>
			<option value="Division head">Division head</option>
			<option value="Department head">Department head</option>
			<option value="Team Leader">Team Leader</option>
			<option value="Project Manager">Project Manager</option>
			<option value="Employee">Employee</option>
			<option value="Sales Agent">Sales Agent</option>
			<option value="Freelancer/Self-employed">Freelancer/Self-employed</option>
			<option value="Other">Other</option>
			</select>
						</select>
						</div>
                      </li>                       
                    </ul>
                  </div>  	
                      
                      <div class="column_m" >
					   
                    <ul class="quizfields">
                      <li>
                        <div class="txlabel">Full Time</div>
                        <div class="txtfield">
						<input type="number" name="full_num[]" id="full_num[]" width="150" min="1" value="'.$row_position['full_time'].'" class="input_txt_field" size="35"/>
						
						</div>
                      </li>                       
                    </ul>
                  </div>   
				  
                      <div class="column_m" >
					   
                    <ul class="quizfields">
                      <li>
                        <div class="txlabel">Part Time</div>
                        <div class="txtfield">
						<input type="number" name="part_num[]" id="part_num[]" width="150" min="1" value="'.$row_position['part_time'].'" class="input_txt_field" size="35"/>
						
						</div>
                      </li>                       
                    </ul>
                  </div>   
					 

							 <div class="column_m" >
					   
                    <ul class="quizfields">
                      <li>
                        <div class="txlabel">Contract</div>
                        <div class="txtfield">
						<input type="number" name="cont_num[]" id="cont_num[]" width="150" min="1" value="'.$row_position['contract'].'" class="input_txt_field" size="35"/>
						
						</div>
                      </li>                       
                    </ul>
                  </div>  

					 <div class="column_m" >
					   
                    <ul class="quizfields">
                      <li>
                        <div class="txlabel">Temporary </div>
                        <div class="txtfield">
						<input type="number" name="tem_num[]" id="tem_num[]" width="150" min="1" value="'.$row_position['temporary'].'" class="input_txt_field" size="35"/>
						
						</div>
                      </li>                       
                    </ul>
                  </div>   
					  
					   <div class="column_m" >
					   
                    <ul class="quizfields">
                      <li>
                        <div class="txlabel">Volunteer </div>
                        <div class="txtfield">
						<input type="number" name="vol_num[]" id="vol_num[]" width="150" min="1" value="'.$row_position['volunteer'].'" class="input_txt_field" size="35"/>
						
						</div>
                      </li>                       
                    </ul>
                  </div>   
					  
					  <div class="column_m" >
					  
                    <ul class="quizfields">
                      <li>
                        <div class="txlabel">Description</div>
                        <div class="txtfield">
						
						<textarea class="texteditor"  name="dis[]" id="dis[]" rows="6"  cols="58">'.html_entity_decode($row_position['description']).'</textarea>
					
						</div>
                      </li>                       
                    </ul>
                  </div>   
				 
				 <div class="column_m">
                        <div class="fright">
                          <input type="button" value="Remove" onclick="remove_position('.$row_position['id'].');" class="green_btn">
						  
                        </div>
                      </div>
                      <div class="padtb15 clear">
                        <div class="line"></div>
                      </div>';
		
					}
		echo $output; 
		}
		if(isset($_GET['company_value']))
		{
		require_once 'configs/database.php';
		$dbCon = connect_database("");
			//$level1_id=$_GET['commodity_estudio'];
			$sql="select company_name from companies where company_name like '%".$_GET['company_value']."%'";
		//echo $sql; die;
			$result=mysqli_query($dbCon, $sql);
			$output = "";
			while($row=mysqli_fetch_array($result))
			{
				$output = $output. '<option value="'.$row['company_name'].'">';
			}
			echo $output;
		}
		
		if(isset($_GET['get_started']))
		{
			require_once 'configs/database.php';
			$dbCon = connect_database("");
			$user_id = $_SESSION['user_id'];

			$query = "update user_logins set get_started_wizard_status=1 where id=".$user_id;
			mysqli_query($dbCon,$query);

			if(isset($_SESSION['showpopup']))
			unset($_SESSION['showpopup']);
		

		}

		
		if(isset($_GET['commodity_level1']))
		{
		require_once 'configs/database.php';
			$dbCon = connect_database("");
		//echo "heloooooooooooooooo"; die;
			$level1_id=$_GET['commodity_level1'];
			$sql="select id, name from commodity_level2 where is_deleted=0 and level1_id=".$level1_id;
			//echo $sql; die;
			$result=mysqli_query($dbCon,$sql);
			$output = '<option value="0">Select</option>';
			while($row=mysqli_fetch_array($result))
			{
				$output = $output. "<option value=". $row['id'].">". $row['name'] ."</option>";
			}
			echo $output;
		}
		
		if(isset($_GET['commodity_level2']))
		{
		require_once 'configs/database.php';
			$dbCon = connect_database("");
		//echo "heloooooooooooooooo"; die;
			$level2_id=$_GET['commodity_level2'];
			$sql="select id, name from commodity_level3 where is_deleted=0 and level2_id=".$level2_id;
			//echo $sql; die;
			$result=mysqli_query($dbCon,$sql);
			$output = '<option value="0">Select</option>';
			while($row=mysqli_fetch_array($result))
			{
				$output = $output. "<option value=". $row['id'].">". $row['name'] ."</option>";
			}
			echo $output;
		}
		
		
		if(isset($_GET['company_email']))
		{
			require_once 'configs/database.php';
			$dbCon = connect_database("");
			$company_email = $_GET['company_email'];

			$query = "select id from companies where company_email like '%".$company_email."'";
			$row = mysqli_fetch_array(mysqli_query($dbCon,$query));
			if(empty($row))
			echo 0;
			else
			echo 1;
			die;

		}
		
		if(isset($_GET['company_website']))
		{
			require_once 'configs/database.php';
			$dbCon = connect_database("");
			$company_website = $_GET['company_website'];

			$query = "select id from companies where website=".$company_website."'";
			$row = mysqli_fetch_array(mysqli_query($dbCon,$query));
			if(empty($row))
			echo 0;
			else
			echo 1;
			die;

		}
		
		if(isset($_GET['product']))
		{
		require_once 'configs/database.php';
			$dbCon = connect_database("");
			$company_id=$_GET['product'];
			$user_id=$_SESSION['user_id'];		
					$d=date("Y-m-d");			
                    $query = "select articles.id,name  from articles 
					left join article_coupon on article_coupon.article_id=articles.id where article_coupon.end_time >='".$d."'
					and articles.company_id=".$_GET['product'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
					$output = $output."<option value=".$row['id'].">".$row['name']."</option>";
					}
					echo $output;
		}
		if(isset($_GET['product1']))
		{
		require_once 'configs/database.php';
			$dbCon = connect_database("");
			$company_id=$_GET['product1'];
			$user_id=$_SESSION['user_id'];		
					$d=date("Y-m-d");			
                    $query = "select id,name  from articles where article_level=0 and 
					company_id=".$_GET['product1'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
					$output = $output."<option value=".$row['id'].">".$row['name']."</option>";
					}
					echo $output;
		}
		
		if(isset($_GET['deal1']))
		{
		require_once 'configs/database.php';
			$dbCon = connect_database("");
			$company_id=$_GET['deal1'];
			$user_id=$_SESSION['user_id'];										
                    $query = "select price from articles where id=".$_GET['deal1'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					
						//echo $days; die;
						
					
					//$output = '<input value="0">Select</option>';
					$row1=mysqli_fetch_array($result);
					
					echo $row1['price'];
		}
		
		if(isset($_GET['deal']))
		{
		require_once 'configs/database.php';
			$dbCon = connect_database("");
			$company_id=$_GET['deal'];
			$user_id=$_SESSION['user_id'];										
                    $query = "select id,limitation,end_time  from article_coupon where article_id=".$_GET['deal'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					
						//echo $days; die;
						
					
					$output = '<option value="0">Select</option>';
					while($row1=mysqli_fetch_array($result))
					{
					$date1=date("y/m/d h:i:s",strtotime($row1['end_time']));
					$d=date("y/m/d h:i:s");
					//$date2=date("y/m/d h:i:s",strtotime($d));
			if ($date1>$d)
					$output = $output."<option value=".$row1['id'].">".$row1['limitation']."</option>";
					
					}
					echo $output;
		}
		if(isset($_GET['article_id']))
		{
			require_once 'configs/database.php';
			$dbCon = connect_database("");
			$article_id = $_GET['article_id'];
if($article_id==0)
{
echo " ".","." ".","." ";
}
else{
			$query = "select unit_id,vat,price from articles where id=".$article_id;
			// echo $query; die;
			$row = mysqli_fetch_array(mysqli_query($dbCon,$query));
			$query1="select name from article_units where id=".$row['unit_id'];
			$row1 = mysqli_fetch_array(mysqli_query($dbCon,$query1));
			if($row)
			echo $row1['name'].",".$row['vat'].",".$row['price'];
			}

		}
		if(isset($_GET['article_coupon']))
		{
			require_once 'configs/database.php';
			$dbCon = connect_database("");
			$article_id = $_GET['article_coupon'];

			$query = "select price from articles where id=".$article_id;
			// echo $query; die;
			$row = mysqli_fetch_array(mysqli_query($dbCon,$query));
			if($row)
			echo $row['price'];
			

		}
		if(isset($_GET['estore_url']))
		{
			require_once 'configs/database.php';
			$dbCon = connect_database("");
			$getapprovdjob = "select id from companies where estore_url='".$_GET['estore_url']."'";
			// echo $getapprovdjob;
			$row = mysqli_fetch_array(mysqli_query($dbCon,$getapprovdjob));
					if(empty($row))
					{
						echo 0;
					}
					else
					{
						echo 1;
						die;
					}
			
		}
		if(isset($_GET['company_id']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];
					$get_company_id = encrypt_decrypt('decrypt',$_GET['company_id']);										
                    $query = "select id,name  from marketplaces where is_deleted=0";
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{  $encrypted_txt = encrypt_decrypt('encrypt', $row['id']);
					$output = $output."<option value=".$encrypted_txt.">".$row['name']."</option>";
					}
					echo $output;
		}
		
		if(isset($_GET['company']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];
					$get_company_id = $_GET['company'];										
                    $query = "select user_login_id,concat_ws(' ', first_name, last_name) as name from employees where company_id=".$get_company_id;
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{  $encrypted_txt = encrypt_decrypt('encrypt', $row['user_login_id']);
					$output = $output."<option value=".$row['user_login_id'].">".$row['name']."</option>";
					}
					echo $output;
		}
		if(isset($_GET['segment']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,title  from article_families where segment_id=".$_GET['segment'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['title']."</option>";
					}
					echo $output;
		}
		
		
		
		
		if(isset($_GET['cntry']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,state_name  from state where country_id=".$_GET['cntry'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">-- Select State --</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['state_name']."</option>";
					}
					echo $output;
		}
		
		if(isset($_GET['country']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,name  from school where country_id=".$_GET['country'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".iconv("UTF-8", "ISO-8859-1//IGNORE",$row['name'])."</option>";
					}
					echo $output;
		}
		
				if(isset($_GET['school']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,name from class where school_id=".$_GET['school'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".iconv("UTF-8", "ISO-8859-1//IGNORE",$row['name'])."</option>";
					}
					echo $output;
		}

		
		
		
		if(isset($_GET['state']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				if(isset($_GET['state']))
				{
					
				$cid=strip_tags($_GET['com_id']);
				//echo $cid;
$company_id=encrypt_decrypt('decrypt',$cid);
				}
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,city_name  from cities where state_id=".$_GET['state'];
					//." and id not in (select city_id from location where company_id=".$company_id.")";
					//echo $query;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">-- Select City --</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['city_name']."</option>";
					}
					echo $output;
		}
		
		
		
		if(isset($_GET['district']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,district_name  from district where city_id=".$_GET['district'];
					//." and id not in (select city_id from location where company_id=".$company_id.")";
					//echo $query;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">-- Select District --</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['district_name']."</option>";
					}
					echo $output;
		}
		
		
		
		
		
		
		
		if(isset($_GET['city']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$cid=strip_tags($_GET['com_id']);
				//echo $cid;
$company_id=encrypt_decrypt('decrypt',$cid);
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,title from vacancy where location=".$_GET['city'];
					//." and id not in (select city_id from location where company_id=".$company_id.")";
					//echo $query;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['title']."</option>";
					}
					echo $output;
		}
		
		
		
		if(isset($_GET['contry']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];
				$cid=strip_tags($_GET['com_id']);
$company_id=encrypt_decrypt('decrypt',$cid);				
                    $query = "select id,state_name  from state where country_id=".$_GET['contry']." and id in (select state_id from location where company_id=".$company_id.")";
					echo $query; 
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['state_name']."</option>";
					}
					echo $output;
		}
		
		if(isset($_GET['state1']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$cid=strip_tags($_GET['com_id']);
				//echo $cid;
$company_id=encrypt_decrypt('decrypt',$cid);
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,city_name  from cities where state_id=".$_GET['state1']." and id in (select city_id from location where company_id=".$company_id.")";
					echo $query;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['city_name']."</option>";
					}
					echo $output;
		}
		
		if(isset($_GET['family']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,title  from article_classes where families_id=".$_GET['family'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['title']."</option>";
					}
					echo $output;
		}
		if(isset($_GET['class']))
		{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];										
                    $query = "select id,title  from article_commodities where class_id=".$_GET['class'];
					//echo $query; die;
					$result = mysqli_query($dbCon,$query);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
					{
						$output = $output."<option value=".$row['id'].">".$row['title']."</option>";
					}
					echo $output;
		}
		if(isset($_GET['m_id']))
				{
					require_once 'configs/database.php';
					$dbCon = connect_database("");
					$user_id=$_SESSION['user_id'];
					$marketplace_id = encrypt_decrypt('decrypt',$_GET['m_id']);
					$sql="select id, name from marketplace_categories where is_deleted=0 and marketplace_id=$marketplace_id";
					$result=mysqli_query($dbCon, $sql);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
						{ $encrypted_txt = encrypt_decrypt('encrypt', $row['id']);
							$output = $output. "<option value=". $encrypted_txt.">". $row['name'] ."</option>";
						}
					echo $output;
				}
			if(isset($_GET['cat_id']))
				{
					require_once 'configs/database.php';
					$dbCon = connect_database("");
					$user_id=$_SESSION['user_id'];
					$category_id = encrypt_decrypt('decrypt',$_GET['cat_id']);
					$companyId = encrypt_decrypt('decrypt',$_GET['companyId']);
					$sql="select id, name from marketplace_category_services where category_id=".$category_id." and id NOT IN (select services_id from contractors where user_id =".$user_id." and company_id=".$companyId.")";
					// echo $sql; die;
					$result=mysqli_query($dbCon, $sql);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
						{   $encrypted_txt = encrypt_decrypt('encrypt', $row['id']);
							$output = $output. "<option value=". $encrypted_txt.">". $row['name'] ."</option>";
						}
					echo $output;
				}
				
		if(isset($_GET['s_id']))
				{
					require_once 'configs/database.php';
					$dbCon = connect_database("");
					$user_id=$_SESSION['user_id'];
					$category_id = encrypt_decrypt('decrypt',$_GET['s_id']);
					$sql="select id, name from marketplace_category_services where category_id=$category_id";
					//echo $sql; die;
					$result=mysqli_query($dbCon, $sql);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
						{   $encrypted_txt = encrypt_decrypt('encrypt', $row['id']);
							$output = $output. "<option value=". $encrypted_txt.">". $row['name'] ."</option>";
						}
					echo $output;
				}
		if(isset($_GET['checkContractorID']))
			{
				require_once 'configs/database.php';
				$dbCon = connect_database("");
				$user_id=$_SESSION['user_id'];
				// $checkContractorID = encrypt_decrypt('decrypt',$_GET['checkContractorID']);
				$sql="SELECT contractor_id 
					  from form_answers 
					  left join contractors on form_answers.contractor_id = contractors.id
					  WHERE contractors.services_id =".$_GET['checkContractorID'];
				//echo $sql; die;
				$result=mysqli_query($dbCon, $sql);
				$row=mysqli_fetch_array($result);
				if(!$row)
					{
						$output = 0;
					}
				else
					{
						$output = 1;
					}
				echo $output;
			}
		
		if(isset($_GET['article_catid']))
				{
					require_once 'configs/database.php';
					$dbCon = connect_database("");
					$user_id=$_SESSION['user_id'];
					$sql="select id,name from article_groups where is_deleted = 0 and is_live = 0 and article_categories_id =".$_GET['article_catid'];
					//echo $sql; die;
					$result=mysqli_query($dbCon, $sql);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
						{   
							$output = $output. "<option value=".$row['id'].">". $row['name'] ."</option>";
						}
					echo $output;
				}
		if(isset($_GET['getarticle']))
				{
					require_once 'configs/database.php';
					$dbCon = connect_database("");
					$user_id=$_SESSION['user_id'];
					$sql="select id,name from articles where is_deleted = 0 and company_id =".$_GET['getarticle'];
					//echo $sql; die;
					$result=mysqli_query($dbCon, $sql);
					$output = '<option value="0">Select</option>';
					while($row=mysqli_fetch_array($result))
						{   
							$output = $output. "<option value=".$row['id'].">". $row['name'] ."</option>";
						}
					echo $output;
				}
				
		if(isset($_GET['invite_cid']))
		{
			require_once 'configs/database.php';
					$dbCon = connect_database("");
			$decryptedmrkt_txt = encrypt_decrypt('decrypt',$_GET['invite_cid']);
			$getapprovdjob="select id, name from marketplace_categories where marketplace_id=".$decryptedmrkt_txt;
			$getapprovdjobresult=mysqli_query($dbCon, $getapprovdjob);
			$output = '<option value="0">Select</option>';
			while($getapprovedrow=mysqli_fetch_array($getapprovdjobresult))
			{
				$encryptedmrktcat_txt = encrypt_decrypt('encrypt', $getapprovedrow['id']);
				$output = $output. "<option value=". $encryptedmrktcat_txt.">". $getapprovedrow['name'] ."</option>";
			}
			echo $output;
		}
		
		if(isset($_GET['invite_sid']))
		{
			require_once 'configs/database.php';
					$dbCon = connect_database("");
			$decryptedcat_txt = encrypt_decrypt('decrypt',$_GET['invite_sid']);
			$getapprovdjob="select id, name from marketplace_category_services where category_id=".$decryptedcat_txt;
			// echo encrypt_decrypt('decrypt',$_GET['invite_sid']); die;
			$getapprovdjobresult=mysqli_query($dbCon, $getapprovdjob);
			$output = '<option value="0">Select</option>';
			while($getapprovedrow=mysqli_fetch_array($getapprovdjobresult))
			{
				$output = $output. "<option value=". $getapprovedrow['id'].">". $getapprovedrow['name'] ."</option>";
			}
			echo $output;
		}	
	if(isset($_GET['invite_selected_job']))
		{
			require_once 'configs/database.php';
					$dbCon = connect_database("");
			$getapprovdjob="SELECT postedjobs.id, CONCAT_WS(' ',jobpostform.post_form_name, substr(postedjobs.created_on,1,10)) as form_name
							from postedjobs
							left join jobpostform on jobpostform.services_id = postedjobs.services_id
							where postedjobs.approve_status=1 and postedjobs.services_id=".$_GET['invite_selected_job']." and postedjobs.user_id =".$_SESSION['user_id'];
			$getapprovdjobresult=mysqli_query($dbCon, $getapprovdjob);
			$output = '<option value="0">Select</option>';
			while($getapprovedrow=mysqli_fetch_array($getapprovdjobresult))
			{
				$encrypted_txt = encrypt_decrypt('encrypt', $getapprovedrow['id']);
				$output = $output. "<option value=". $encrypted_txt.">". $getapprovedrow['form_name'] ."</option>";
			}
			echo $output;
		}
		
		if(isset($_GET['cque']) && isset($_GET['cmar_id']) &&isset($_GET['cans']) && isset($_GET['contractors_id']) && isset($_GET['cqtitle']) && isset($_GET['csans']) && isset($_GET['csque']) && isset($_GET['cstitle']) && isset($_GET['cstrt']))
		{	
			require_once 'configs/database.php';
					$dbCon = connect_database("");
			$que = substr($_GET['cque'],0,strlen($_GET['cque'])-1);
			$ans = substr($_GET['cans'],0,strlen($_GET['cans'])-1);
			$qtitle = substr($_GET['cqtitle'],0,strlen($_GET['cqtitle'])-1);
			$sans = substr($_GET['csans'],0,strlen($_GET['csans'])-1);
			$sque = substr($_GET['csque'],0,strlen($_GET['csque'])-1);
			$stitle = substr($_GET['cstitle'],0,strlen($_GET['cstitle'])-1);
			$contractors_id = $_GET['contractors_id'];
			$cont_array = explode(",",$contractors_id);
			$que_id = explode(",",$que);
			$que_ans = explode(",",$ans);
			$que_title = explode(",",$qtitle);
			$sque_id = explode(",",$sque);
			$sque_ans = explode(",",$sans);
			$sque_title = explode(",",$stitle);
			$mar_id = $_GET['cmar_id'];
			
			$cont_solr = '';
			
			for($c=0;$c<sizeof($cont_array);$c++)
			{
				$cont_solr = $cont_solr.$cont_array[$c]." OR ";
			}
			$cont_solr = substr($cont_solr,0,strlen($cont_solr)-4); 
			// echo $cont_solr; die;
			
			if((sizeof($que_id) == sizeof($que_ans)))
			{
				if(sizeof(explode(",",$_GET['cque'])) >1)
				{
					$que = $que.",";
				}
				else
				{
					$que = '';
				}
				// echo sizeof(explode(",",$_GET['que'])); die;
				/*$fetchchapters = "select distinct form_questions.chapter_id
									from form_questions
									left join form_chapters on form_questions.chapter_id = form_chapters.id
									left join form_qap on form_chapters.qap_id = form_qap.id
									where form_qap.marketplace_id =".$mar_id;
				$resultchapter = mysqli_query($dbCon,$fetchchapters);
				// $que_row_chap = mysqli_fetch_all($resultchapter);
				$marketplacesss = '';
				
				while($que_row_chap = mysqli_fetch_array($resultchapter))
				{	
							// echo "<pre>"; print_r($que_row_chap);
							$marketplacesss = $que_row_chap['chapter_id'].",";
				}
				$marketplacesss = substr($marketplacesss,0,strlen($marketplacesss)-1); */
				// echo $marketplacesss; die;
				$tocheckempty = $que.$sque;
				// echo $que.$sque; die;
				if(empty($sque))
				{
				$tocheckempty = substr($tocheckempty,0,strlen($tocheckempty)-1);
				}
				if(!empty($tocheckempty))
				{
				
				$question = "select jobpost_questions.id,jobpost_questions.qap_question_id, form_questions.vsfname
								from jobpost_questions
								left join form_questions on jobpost_questions.qap_question_id = form_questions.id
								where qap_question_id not in (0) AND jobpost_questions.id in(".$tocheckempty.")";
				
				// echo $question;
				$result = mysqli_query($dbCon,$question);
				// $que_row = mysqli_fetch_all($result);
				
				$fetchresults = array();
				while($que_row = mysqli_fetch_array($result))
				{	
							$fetchresults[$que_row['id']][] = $que_row['qap_question_id'];
							$fetchresults[$que_row['id']][] = $que_row['vsfname'];
				}				
				// echo "<pre>"; print_r($fetchresults);die;
				$queryvalue = '';
				if(sizeof(explode(",",$_GET['cque'])) >1)
				{
					for($i=0;$i<sizeof($que_id);$i++)
					{
								$backslash = stripos($que_title[$i],"(");
								if($backslash != 0)
								{
									$backslash = substr($que_title[$i],$backslash);
									$backslash = $fetchresults[$que_id[$i]][1]."\\".$backslash;
								}
								else
								{
									$backslash = $fetchresults[$que_id[$i]][1];
								}
								$backslash = str_replace(")","\)",$backslash);
								// echo  $backslash."<br>";
								$queryvalue = $queryvalue.$backslash."_".$fetchresults[$que_id[$i]][0].'_i:"'.$que_ans[$i].'"+AND+';
								// echo queryvalue; die;
					}
				}
				if(!empty($sque))
				{
				for($i=0;$i<sizeof($sque_id);$i++)
				{
							// echo $que_title[$i]; die;
							// $backslash = stripos($que_title[$i],"(");
							// $backslash = substr($que_title[$i],$backslash);
							// echo $backslash."<br>";
							$answers = explode("-",$sque_ans[$i]);
							// print_r($answers);
							$sendslider = array();
							for($k=0;$k<2;$k++)
							{
								if($k==0)
								{
									$sendslider[] = substr($answers[$k],1,strlen($answers[$k])-2);
								}
								else
								{
									$sendslider[] = substr($answers[$k],2,strlen($answers[$k]));
								}
							}
							
						$queryvalue = $queryvalue.$fetchresults[$sque_id[$i]][1]."min_".$fetchresults[$sque_id[$i]][0]."_int:[".$sendslider[0]."+TO+".$sendslider[1]."]+AND+";			
						$queryvalue = $queryvalue.$fetchresults[$sque_id[$i]][1]."max_".$fetchresults[$sque_id[$i]][0]."_int:[".$sendslider[0]."+TO+".$sendslider[1]."]+AND+";				
				}
				}		
				
				$sendslider1 = substr($queryvalue,0,strlen($queryvalue)-5);				
				// echo $sendslider1; die;
				if($cont_solr == '')
					{
					$query_solr = "http://localhost:8983/solr/collection1/select?q=".$sendslider1."&wt=phps&indent=true&start=".$_GET['cstrt']."&rows=10&fl=contractor_id,company_id,points,company_email,company_name,marketplace_name";
					}
					else
					{
					$query_solr = "http://localhost:8983/solr/collection1/select?q=".$sendslider1." AND contractor_id:(".$cont_solr.")&wt=phps&indent=true&start=".$_GET['cstrt']."&rows=10&fl=contractor_id,company_id,points,company_email,company_name,marketplace_name";
					}
				}
				else
				{
					if($cont_solr == '')
					{
						$fetchmarket ="select name from marketplace_category_services where id=".$mar_id;
					$row_market = mysqli_fetch_array(mysqli_query($dbCon,$fetchmarket));
					$query_solr = "http://localhost:8983/solr/collection1/select?q=service_name:\"".$row_market['name']."\"&wt=phps&indent=true&start=".$_GET['cstrt']."&rows=10&fl=contractor_id,company_id,points,company_email,company_name,marketplace_name";
					}
					else
					{
					$fetchmarket ="select name from marketplace_category_services where id=".$mar_id;
					$row_market = mysqli_fetch_array(mysqli_query($dbCon,$fetchmarket));
					$query_solr = "http://localhost:8983/solr/collection1/select?q=service_name:\"".$row_market['name']."\" AND contractor_id:(".$cont_solr.")&wt=phps&indent=true&start=".$_GET['cstrt']."&rows=10&fl=contractor_id,company_id,points,company_email,company_name,marketplace_name";
					}
				}
			}
			$query_solr = str_replace(" ","+",$query_solr);
			// echo $query_solr; die;
			$solr_get = unserialize(file_get_contents($query_solr));
			// echo "<pre>"; print_r($solr_get['response']); die;
			// $_SESSION['invitepoints'] = $solr_get['response']['numFound'];
			// echo $_SESSION['invitepoints']; die;
			$output ='';
			for($j=0;$j<sizeof($solr_get['response']['docs']);$j++)
			{				
				$encrypted_txt = encrypt_decrypt('encrypt', $solr_get['response']['docs'][$j]["company_id"]);
				$output = $output.'<tr>
                  <td class="normal"><input class="minicheck" type="checkbox" name="hirecont[]" id="'.$j.'" value="'.$solr_get['response']['docs'][$j]["company_email"].'"  title="'.$solr_get['response']['docs'][$j]["contractor_id"].'" alt="'.$solr_get['response']['docs'][$j]["company_id"].'"/></td>
                  <td class="normal"><h2 class="padb10 cyanblue_txt fsz13"><a href="../../userprofile/companyprofile.php?id='.$encrypted_txt.'" target="_blank">'.'"'.$solr_get['response']['docs'][$j]["company_name"].'"'.'</a></h2>
                    <p>
Duis aute irure dolor in reprehenderit in <br>voluptate velit esse cillum dolore eu fugiat . <br>Excepteur sint occaecat
<a class="dark_grey_txt undr_line" href="#">read more</a>
</p>
					</td>
                  <td class="normal">'.$solr_get['response']['docs'][$j]["points"].'</td>
                  <td class="normal"><div class="star_rating">
							<div class="stars">
						<div class="rating" style="width:85%"></div>
							</div>
</div>
<div class="fsz11">270 reviews</div></div></td>
                  <td class="normal"><a href="../../userprofile/companyprofile.php?id='.$encrypted_txt.'" target="_blank" class="dblue_btn min_height dblock ">View Profile</a></td>
                </tr>';
			}
				$output = $output.'</ul>'.";;;;".$solr_get['response']['numFound'].";;;;".$solr_get['response']['start'];
				echo $output;
		}
		
	




?>

