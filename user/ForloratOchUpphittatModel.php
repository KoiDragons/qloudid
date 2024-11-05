<?php
	require_once('../AppModel.php');
	class ForloratOchUpphittatModel extends AppModel
	{
		function selectIcon($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select app_bg,app_name,app_icon  from apps_detail where id=16");
			
			/* bind parameters for markers */
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
				$stmt->close();
				$dbCon->close();
				return $row;
			
			
		}
		
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			
			
			$stmt = $dbCon->prepare("select first_name,concat_ws(' ', first_name, last_name) as name,last_name,email,passport_image from user_logins where id = ?");
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
		
		function userAccount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select id,first_name,last_name,sex,dob_day,dob_month,dob_year,created_on  from user_logins where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$id=$row['id'];
			 
						$stmt = $dbCon->prepare("select * from found_and_lost where user_login_id=?");
			
							/* bind parameters for markers*/
						$stmt->bind_param("i",$id);
						$stmt->execute();
						$result = $stmt->get_result();
						 
						while($itemRow  = $result->fetch_assoc())	
						{
						$j=0;
			
						while($j==0)
						{
						$code=mt_rand(111111111111,999999999999); 
						$stmt = $dbCon->prepare("select id from used_sr_number where sr_number=?");
						/* bind parameters for markers */
						
						$stmt->bind_param("s",$code);
						$stmt->execute();
						$result = $stmt->get_result();
						$row = $result->fetch_assoc();
						if(empty($row))
						{
							$j++;
						}
						}
						$stmt = $dbCon->prepare("insert into user_lost_and_found(item_number,serial_number,user_id,created_on,unique_serial_code,description,how_lost,item_image,article_name,finders_fee)
						values(?,?,?,now(),?,?,?,?,?,?)");
						$stmt->bind_param("isississi",$itemRow['item_number'],$code,$id,$code,$itemRow['description'],$itemRow['how_lost'],$itemRow['item_image'],$itemRow['article_name'],$itemRow['finders_fee']);
						if($stmt->execute())
						{
							 
						$st=1;
						$id=$stmt->insert_id;
						$enc=$this->encrypt_decrypt('encrypt',$id);
						$stmt = $dbCon->prepare("insert into used_sr_number(sr_number,used_on,created_on)
						values(?,?,now())");
						$stmt->bind_param("si", $code,$st);
						$stmt->execute();
						$stmt = $dbCon->prepare("delete from found_and_lost where id=?");
			
							/* bind parameters for markers*/
						$stmt->bind_param("i",$itemRow['id']);
						$stmt->execute();
						}
						 
						
						}
						
					 
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
			function lostandFoundDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from user_lost_and_found  where user_id=? and status=0  order by created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function lostandFoundCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_lost_and_found where user_id=? and status=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreLostandFoundDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select * from user_lost_and_found  where user_id=? and status=0 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['item_number']==1)
				{
				$item='Cell phone';
				}
				else
					if($row['item_number']==2)
				{
				$item='Key';
				}
				else if($row['item_number']==2)
				{
				$item='Laptop';
				}
				$org=$org.'<a href="ForloratOchUpphittat/updateFound/'.$org1.'" >	<div class="column_m container  marb0   fsz14 dark_grey_txt">	
											 <div class=" white_bg mart0  brdb bg_fffbcc_a" style=""> 
											 <div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
											 <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											 <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['item_name']),0,1).'</div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_75 ">
													
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold black_txt ">'.$item.'</span>
													
													 <span class="edit-text  fsz18 jain2 dblock  lgn_hight_18 ">'.$row['item_name'].'</span> </div>
													 
													<div class="xxs-fleft fright wi_20 xs-padl100 xs-wi_20  fsz40 padl40 marrl30 padb0  hidden-xs ">
																<button type="button" name="Add parent" class="forword2   blue_67cff7_brd2 ffamily_avenir black_txt trans_bg positionAbs xs-padr15 xs-padl15">Lost</button> 
																			</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
												</div></a> ';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
			function forloradDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select * from user_lost_and_found  where user_id=? and status=1  order by created_on desc limit 0,20");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				
				array_push($org,$row);
				$org[$j]['enc']=$this->encrypt_decrypt('encrypt',$row['id']);
				$j++;
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		
		function itemDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("select * from user_lost_and_found  where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function forloradCount($data)
		{
			$dbCon = AppModel::createConnection();
			
			$stmt = $dbCon->prepare("select count(id) as num from user_lost_and_found where user_id=? and status=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $data['user_id']);
			
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		
		
			function moreForloradDetail($data)
		{
			$dbCon = AppModel::createConnection();
			
			$a=$_POST['id']*20;
			$b=$a+20;
			$stmt = $dbCon->prepare("select * from user_lost_and_found  where user_id=? and status=1 order by created_on desc limit ?,? ");
			
			/* bind parameters for markers */
			$stmt->bind_param("iii", $data['user_id'],$a,$b);
			$stmt->execute();
			$result = $stmt->get_result();
			$org='';
			$j=0;
			while($row = $result->fetch_assoc())
			{
				$org1= $this -> encrypt_decrypt('encrypt',$row['id']);
				if($row['item_number']==1)
				{
				$item='Cell phone';
				}
				else
					if($row['item_number']==2)
				{
				$item='Key';
				}
				else if($row['item_number']==2)
				{
				$item='Laptop';
				}
				$org=$org.'<a href="ForloratOchUpphittat/checkStatus/'.$org1.'" >	<div class="column_m container  marb0   fsz14 dark_grey_txt">	
											 <div class=" white_bg mart0  brdb bg_fffbcc_a" style=""> 
											 <div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
											 <div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">
											 <div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"> 
													
													<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;">'.substr(html_entity_decode($row['item_name']),0,1).'</div>
																	</div>
													
													<div class="fleft wi_50 xxs-wi_75">
													
													<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz14 bold black_txt ">'.$item.'</span>
													
													 <span class="edit-text  fsz18 jain2 dblock  lgn_hight_18 ">'.$row['item_name'].'</span> </div>
													 
													<div class="xxs-fleft fright wi_20 xs-padl100 xs-wi_20  fsz40 padl40 marrl30 padb0  hidden-xs ">
																<button type="button" name="Add parent" class="forword2   blue_67cff7_brd2 ffamily_avenir black_txt trans_bg positionAbs xs-padr15 xs-padl15">Found it</button> 
																			</div>
													
												</div>
												
												
												
												
												
											</div>
											<div class="clear"></div>
										</div>
										
											</div>
												</div></a>';
				
			}
			//print_r($org); die;
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
		
		function updateLostValue($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			if($_POST['fee']==0)
			{
				$pay_fee=2;
			}
			else
			{
				$pay_fee=1;
			}
			$stmt = $dbCon->prepare("select * from user_lost_and_found  where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("update user_lost_and_found set status=1,created_on=now(),share_type=? where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ii", $_POST['share_type'],$id);
			$stmt->execute();
			
			$stmt = $dbCon->prepare("insert into users_item_lost_history(lost_id,lost_date,found_date,is_fee,finders_fee)
			values(?,?,now(),?,?)");
			$stmt->bind_param("isii",$id,$row['created_on'],$pay_fee,$_POST['fee']);
			$stmt->execute();
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
		
		function reportLost($data)
		{
			$dbCon = AppModel::createConnection();
			$id=$this->encrypt_decrypt('decrypt',$data['id']);
			$stmt = $dbCon->prepare("update user_lost_and_found set status=0,created_on=now() where id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $id);
			$stmt->execute();
			
			$stmt->close();
			$dbCon->close();
			return 1;
			
			
		}
	}						