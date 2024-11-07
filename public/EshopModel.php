<?php
	require_once('../AppModel.php');
	class EshopModel extends AppModel
	{
		
		function displayPhotos($data)
		{ 
		
			$dbCon = AppModel::createConnection();
			$company_id=$this->encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select count(company_id) as num from eshop_photo_info where company_id=?");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select eshop_photo_path,sorting_number,id from eshop_photo_info where company_id=? order by sorting_number ");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result1 = $stmt->get_result();
			$i=1;
			$org=array();
			 
			function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
			while($row1 = $result1->fetch_assoc())
			{
				 
				 $filename="../estorecss/".$row1 ['eshop_photo_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row1 ['eshop_photo_path'].".txt"); $value_a=str_replace('"','',$value_a); $image = base64_to_jpeg( $value_a, '../estorecss/tmp'.$row1['eshop_photo_path'].'.jpg' ); } else { $image="../html/usercontent/images/person-male.png"; } 
				$row1['image_path1']=$image;
				array_push($org,$row1); 
			}	
			$stmt->close();
			$dbCon->close();
			return $org;
		}
		
		
		
		function footerDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select * from company_footer_information where company_id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax,companies.country_id from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$rowCompany = $result->fetch_assoc();
			
			
			$stmt = $dbCon->prepare("select country_code from phone_country_code where id=?");
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $row['country_phone']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowCode = $result->fetch_assoc();
			if(!empty($row)) 
			{
			$footer='
		<link rel="stylesheet" type="text/css" media="all" href="https://safeqloud-228cbc38a2be.herokuapp.com/html/usercontent/constructor.css" />
		 
		<link rel="stylesheet" type="text/css" media="all" href="https://safeqloud-228cbc38a2be.herokuapp.com/html/usercontent/responsive.css" />
		 
		
		<div class="ovfl_hid padrl10 txt_37404a fsz14 white_bg padt30 xxsi-padrl35  padb20">
					<div class="wi_1200p dflex xxxs-dflex alit_fs marrla">';
					
					if($row['show_products']==1)
					{
						$menu=explode(',',$row['product_submenu']);
						$link=explode(',',$row['product_link']);
						$newP='';
						$i=0;
						foreach($menu as $key)
						{
						$newP=$newP.'<li class="dblock lgn_hight_35"><a href="'.$link[$i].'" class="black_txt">'.$key.'</a></li>'	;
						$i++;	
						}
						
						$products='<div class="wi_15 marb40 ">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">'.$row['product_menu_name'].'</h3>
							<ul class="mar0 pad0">'.$newP.'</ul>
						</div>';
					}
					else
					{
						$products='<div class="wi_15 marb40 "></div>';
					}
			
			$footer=$footer.''.$products;
			
			
			if($row['show_resources']==1)
					{
						$menu=explode(',',$row['resource_submenu']);
						$link=explode(',',$row['resource_link']);
						$newP='';
						$i=0;
						foreach($menu as $key)
						{
						$newP=$newP.'<li class="dblock lgn_hight_35"><a href="'.$link[$i].'" class="black_txt">'.$key.'</a></li>'	;
						$i++;	
						}
						
						$resources='<div class="wi_15 marb40 ">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">'.$row['resource_menu_name'].'</h3>
							<ul class="mar0 pad0">'.$newP.'</ul>
						</div>';
					}
					else
					{
						$resources='<div class="wi_15 marb40 "></div>';
					}
			$footer=$footer.''.$resources;
			
			
			if($row['show_help']==1)
					{
						$menu=explode(',',$row['help_submenu']);
						$link=explode(',',$row['help_link']);
						$newP='';
						$i=0;
						foreach($menu as $key)
						{
						$newP=$newP.'<li class="dblock lgn_hight_35"><a href="'.$link[$i].'" class="black_txt">'.$key.'</a></li>'	;
						$i++;	
						}
						
						$help='<div class="wi_15 marb40 ">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">'.$row['help_menu_name'].'</h3>
							<ul class="mar0 pad0">'.$newP.'</ul>
						</div>';
					}
					else
					{
						$help='<div class="wi_15 marb40 "></div>';
					}
					
			$footer=$footer.''.$help;
			if($rowCompany ['profile_pic']!=null) { $filename="../estorecss/".$rowCompany ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowCompany ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $rowCompany['image_path'] =$value_a; } else { $rowCompany['image_path']="../html/usercontent/images/default-profile-pic.jpg"; } }  else $rowCompany['image_path']="../html/usercontent/images/default-profile-pic.jpg";
			
			$rowCompany['image_path']=str_replace("../","https://safeqloud-228cbc38a2be.herokuapp.com/",$rowCompany['image_path']);
			 
			 //echo $rowCompany['image_path']; die;
			if($row['show_company_logo']==1)
			{
				$companyLogo='<div class="marb25">
						<div class="wi_100 xxs-wi_100 " style="padding-left:500px;">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										
										<div class="imgwrap nobrd borderr">
											<div class="cropped_image borderr grey_brd5 " style="background-image: '.$rowCompany['image_path'].';" id="image-data" name="image-data"></div>
											
										</div>
									</div>
								
								 
							</div>
						</div>';
			}
			else
			{
			$companyLogo='';	
			}
			$footer=$footer.'<div class="wi_55 xxs-wi_100 marb10 marrl50 xs-wi_50 xs-marr0">'.$companyLogo;
			if($row['show_company_subtext']==1)
			{
				$footer=$footer.' <h3 class="marb20 pad0 fsz16 talr txt_787e89 marl100"><span class="maxwi_500p">'.$row['company_subtext'].'</span></h3>
						</div>
						
					</div>
					<div class="wi_1200p dflex xxxs-dflex alit_fs brdb padb20 marrla">
					<div class="talr fsz14 fright wi_100"><span class="padr30"><a href="mailto:'.$row['email'].'" class="txt_787e89">'.$row['email'].'</a></span><span><a href="tel:+'.$rowCode['country_code'].''.$row['phone_number'].'" class="txt_787e89">+'.$rowCode['country_code'].''.$row['phone_number'].'</a></span></div>
					</div>
					
				</div>
					';
			}
			
			
			
			 
				
				$copyright='<div class="wi_100 maxwi_100 dflex  xs-fxwrap_w talc padt20 padb30  ">
				<div class="wi_1200p dflex xxxs-dflex alit_fs marrla">
				<div class="wi_40 dflex xxxs-dflex alit_fs">
				<div class="fsz16 txt_787e89">© '.$row['copyright_text'].'</div>
				<div class="marl50 marr50"><a><span><img width="18px" height="18px" alt="English" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxODJweCIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgMTgyIDE4MiIgd2lkdGg9IjE4MnB4IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnNrZXRjaD0iaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoL25zIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PHRpdGxlLz48ZGVmcy8+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSI+PGcgaWQ9IlVLIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxLjAwMDAwMCwgMS4wMDAwMDApIj48Y2lyY2xlIGN4PSI5MCIgY3k9IjkwIiBkPSJNOTAsMTgwIEMxMzkuNzA1NjMsMTgwIDE4MCwxMzkuNzA1NjMgMTgwLDkwIEMxODAsNDAuMjk0MzcwMSAxMzkuNzA1NjMsMCA5MCwwIEM0MC4yOTQzNzAxLDAgMCw0MC4yOTQzNzAxIDAsOTAgQzAsMTM5LjcwNTYzIDQwLjI5NDM3MDEsMTgwIDkwLDE4MCBaIE05MCwxODAiIGZpbGw9IiMzNDZEQTYiIGlkPSJPdmFsLTEtY29weS05IiByPSI5MCIvPjxwYXRoIGQ9Ik0xNjMuMzYxMjIsMzcuODUxOTgzOCBDMTYwLjQ0NTI4NywzMy43NTcyNjQ1IDE1Ny4xOTUxMDIsMjkuOTE3MDg0NSAxNTMuNjUwNDgsMjYuMzcxMjU5NSBMMTUzLjYyODc0LDI2LjM0OTUxOTggQzE1MC4wODI5MTUsMjIuODA0ODk4NCAxNDYuMjQyNzM1LDE5LjU1NDcxMzMgMTQyLjE0ODAxNiwxNi42Mzg3ODAzIEwxNi42Mzg3ODAzLDE0Mi4xNDgwMTYgQzE5LjU1NDcxMzMsMTQ2LjI0MjczNSAyMi44MDQ4OTg0LDE1MC4wODI5MTUgMjYuMzQ5NTE5OSwxNTMuNjI4NzQgTDI2LjM3MTI1OTYsMTUzLjY1MDQ4IEMyOS45MTcwODQ1LDE1Ny4xOTUxMDIgMzMuNzU3MjY0NSwxNjAuNDQ1Mjg3IDM3Ljg1MTk4MzgsMTYzLjM2MTIyIEwxNjMuMzYxMjIsMzcuODUxOTgzOCBaIE0xNjMuMzYxMjIsMzcuODUxOTgzOCIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTYiLz48cGF0aCBkPSJNMTQyLjE0ODAxNiwxNjMuMzYxMjIgQzE0Ni4yNDI3MzYsMTYwLjQ0NTI4NyAxNTAuMDgyOTE2LDE1Ny4xOTUxMDEgMTUzLjYyODc0MSwxNTMuNjUwNDggTDE1My42NTA0ODEsMTUzLjYyODc0IEMxNTcuMTk1MTAyLDE1MC4wODI5MTUgMTYwLjQ0NTI4NywxNDYuMjQyNzM1IDE2My4zNjEyMiwxNDIuMTQ4MDE2IEwzNy44NTE5ODM4LDE2LjYzODc4MDMgQzMzLjc1NzI2NDUsMTkuNTU0NzEzMyAyOS45MTcwODQ1LDIyLjgwNDg5ODQgMjYuMzcxMjU5NSwyNi4zNDk1MTk5IEwyNi4zNDk1MTk4LDI2LjM3MTI1OTYgQzIyLjgwNDg5ODQsMjkuOTE3MDg0NSAxOS41NTQ3MTMzLDMzLjc1NzI2NDUgMTYuNjM4NzgwMywzNy44NTE5ODM4IEwxNDIuMTQ4MDE2LDE2My4zNjEyMiBaIE0xNDIuMTQ4MDE2LDE2My4zNjEyMiIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTUiLz48cGF0aCBkPSJNMTYwLjI4NzQsMzMuNzgzNjY3NCBDMTU4LjE5Nzk1OCwzMS4xNzQ2MjQ4IDE1NS45NjYyNjEsMjguNjg0NDM3OCAxNTMuNjA0MDY3LDI2LjMyNDg2NDcgTDkwLjQwMjAyMDMsODkuNTI2OTExOSBMOTcuNDczMDg4MSw5Ni41OTc5Nzk3IEwxNjAuMjg3NCwzMy43ODM2Njc0IFogTTE2MC4yODc0LDMzLjc4MzY2NzQiIGZpbGw9IiNDQTQ2MzgiIGlkPSJPdmFsLTEtY29weS05IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5MC4wMDAwMDAsIDkwLjAwMDAwMCkgc2NhbGUoMSwgLTEpIHRyYW5zbGF0ZSgtOTAuMDAwMDAwLCAtOTAuMDAwMDAwKSAiLz48cGF0aCBkPSJNMzMuNzgzNjY3NCwxOS43MTI1OTk2IEMzMS4xNzQ2MjQ4LDIxLjgwMjA0MjMgMjguNjg0NDM3OCwyNC4wMzM3Mzk1IDI2LjMyNDg2NDcsMjYuMzk1OTMyNSBMOTQuNTI2OTExOSw5NC41OTc5Nzk3IEwxMDEuNTk3OTgsODcuNTI2OTExOSBMMzMuNzgzNjY3NCwxOS43MTI1OTk2IFogTTMzLjc4MzY2NzQsMTkuNzEyNTk5NiIgZmlsbD0iI0NBNDYzOCIgaWQ9Ik92YWwtMS1jb3B5LTEwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5MC4wMDAwMDAsIDkwLjAwMDAwMCkgc2NhbGUoMSwgLTEpIHRyYW5zbGF0ZSgtOTAuMDAwMDAwLCAtOTAuMDAwMDAwKSAiLz48cGF0aCBkPSJNMTQ2LjIxNjMzMywxNjAuMjg3NCBDMTQ4LjgyNTM3OCwxNTguMTk3OTU2IDE1MS4zMTU1NjcsMTU1Ljk2NjI1NyAxNTMuNjc1MTQxLDE1My42MDQwNjEgTDk1LjQ3MzA4ODEsOTUuNDAyMDIwMyBMODguNDAyMDIwMywxMDIuNDczMDg4IEwxNDYuMjE2MzMzLDE2MC4yODc0IFogTTE0Ni4yMTYzMzMsMTYwLjI4NzQiIGZpbGw9IiNDQTQ2MzgiIGlkPSJPdmFsLTEtY29weS0xMCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoOTAuMDAwMDAwLCA5MC4wMDAwMDApIHNjYWxlKDEsIC0xKSB0cmFuc2xhdGUoLTkwLjAwMDAwMCwgLTkwLjAwMDAwMCkgIi8+PHBhdGggZD0iTTE5LjcxMjU5OTYsMTQ2LjIxNjMzMyBDMjEuODAyMDQyNSwxNDguODI1Mzc1IDI0LjAzMzczOTgsMTUxLjMxNTU2MyAyNi4zOTU5MzMxLDE1My42NzUxMzYgTDgzLjU5Nzk3OTcsOTYuNDczMDg4MSBMNzYuNTI2OTExOSw4OS40MDIwMjAzIEwxOS43MTI1OTk0LDE0Ni4yMTYzMzMgWiBNMTkuNzEyNTk5NiwxNDYuMjE2MzMzIiBmaWxsPSIjQ0E0NjM4IiBpZD0iT3ZhbC0xLWNvcHktMTAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDkwLjAwMDAwMCwgOTAuMDAwMDAwKSBzY2FsZSgxLCAtMSkgdHJhbnNsYXRlKC05MC4wMDAwMDAsIC05MC4wMDAwMDApICIvPjxwYXRoIGQ9Ik0xNzguNzU1NjI0LDEwNSBDMTc5LjU3NDAxOCwxMDAuMTIxODczIDE4MCw5NS4xMTA2ODMyIDE4MCw5MCBDMTgwLDg0Ljg4OTMxNjggMTc5LjU3NDAxOCw3OS44NzgxMjcxIDE3OC43NTU2MjQsNzUgTDEuMjQ0Mzc2NDMsNzUgQzAuNDI1OTgxODgxLDc5Ljg3ODEyNzEgMCw4NC44ODkzMTY4IDAsOTAgQzAsOTUuMTEwNjgzMiAwLjQyNTk4MTg4MSwxMDAuMTIxODczIDEuMjQ0Mzc2NDMsMTA1IEwxNzguNzU1NjI0LDEwNSBaIE0xNzguNzU1NjI0LDEwNSIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTYiLz48cGF0aCBkPSJNMTA1LDE3OC43NTU2MjQgQzEwMC4xMjE4NzMsMTc5LjU3NDAxOCA5NS4xMTA2ODMyLDE4MCA5MCwxODAgQzg0Ljg4OTMxNjgsMTgwIDc5Ljg3ODEyNzEsMTc5LjU3NDAxOCA3NSwxNzguNzU1NjI0IEw3NSwxLjI0NDM3NjQ0IEM3OS44NzgxMjcxLDAuNDI1OTgxODgxIDg0Ljg4OTMxNjgsMCA5MCwwIEM5NS4xMTA2ODMyLDAgMTAwLjEyMTg3MywwLjQyNTk4MTg3NiAxMDUsMS4yNDQzNzY0MSBMMTA1LDE3OC43NTU2MjQgWiBNMTA1LDE3OC43NTU2MjQiIGZpbGw9IiNGRkZGRkYiIGlkPSJPdmFsLTEtY29weS01Ii8+PHBhdGggZD0iTTE3OS40NTA3MTIsMTAwIEMxNzkuODEzNjY3LDk2LjcxNjY2MTUgMTgwLDkzLjM4MDA5MSAxODAsOTAgQzE4MCw4Ni42MTk5MDkgMTc5LjgxMzY2Nyw4My4yODMzMzg1IDE3OS40NTA3MTIsODAgTDAuNTQ5Mjg3Njk4LDgwIEMwLjE4NjMzMzA4OSw4My4yODMzMzg1IDAsODYuNjE5OTA5IDAsOTAgQzAsOTMuMzgwMDkxIDAuMTg2MzMzMDg5LDk2LjcxNjY2MTUgMC41NDkyODc2OTgsMTAwIEwxNzkuNDUwNzEyLDEwMCBaIE0xNzkuNDUwNzEyLDEwMCIgZmlsbD0iI0NBNDYzOCIgaWQ9Ik92YWwtMS1jb3B5LTciLz48cGF0aCBkPSJNMTAwLDE3OS40NTA3MTIgQzk2LjcxNjY2MTUsMTc5LjgxMzY2NyA5My4zODAwOTEsMTgwIDkwLDE4MCBDODYuNjE5OTA5LDE4MCA4My4yODMzMzg1LDE3OS44MTM2NjcgODAsMTc5LjQ1MDcxMiBMODAsMC41NDkyODc2OTggQzgzLjI4MzMzODUsMC4xODYzMzMwODkgODYuNjE5OTA5LDAgOTAsMCBDOTMuMzgwMDkxLDAgOTYuNzE2NjYxNSwwLjE4NjMzMzA4OSAxMDAsMC41NDkyODc2OTggTDEwMCwxNzkuNDUwNzEyIFogTTEwMCwxNzkuNDUwNzEyIiBmaWxsPSIjQ0E0NjM4IiBpZD0iT3ZhbC0xLWNvcHktNyIvPjwvZz48L2c+PC9zdmc+"><span class="padl15"><sub class="padl10 black_txt fsz16 padb30 txt_787e89">English</sub></a></div>
				<div class="padrl5"><a title="Facebook" href="'.$row['facebook'].'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"  style="fill: #f43f85;"  viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-1.924c-.615 0-1.076.252-1.076.889v1.111h3l-.238 3h-2.762v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z"></path></svg></a></div>
				<div class="padrl5"><a title="Instagram" href="'.$row['instagram'].'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" style="fill: #f43f85;" viewBox="0 0 24 24"><path d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z"></path></svg></a></div>
				<div class="padrl5"><a title="Twitter" href="'.$row['twitter'].'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"  style="fill: #f43f85;"  viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z"></path></svg></a></div>
				<div class="padrl5"><a title="Linkedin" href="'.$row['linkdn'].'"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"  style="fill: #f43f85;"  viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg></a></div></div> <div class="talr fright wi_60 marl20">
						';
				if($row['show_privacy']==1)
				{
					$copyright=$copyright.'<span><a href="'.$row['privacy_link'].'" class="fsz14 padrl10 txt_787e89">'.$row['privacy_name'].'</a></span>';
				}
				if($row['show_security']==1)
				{
					$copyright=$copyright.'<span><a href="'.$row['security_link'].'" class="fsz14 padrl10 txt_787e89">'.$row['security_name'].'</a></span>';
				}
				if($row['show_environment']==1)
				{
					$copyright=$copyright.'<span><a href="'.$row['environment_link'].'" class="fsz14 padrl10 txt_787e89">'.$row['environment_name'].'</a></span>';
				}
				$stmt->close();
				$dbCon->close();
				return $footer.''.$copyright;
			}
			else
			{
				$footer='<div class="ovfl_hid padrl10 txt_37404a fsz14 white_bg padt60 xxsi-padrl35  ">
					<div class="wi_1200p dflex xxxs-dflex alit_fs marrla">
						
<div class="wi_15 marb40 ">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">Pages</h3>
							<ul class="mar0 pad0">
								<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Om Safeqid</a></li>
								
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Förskolor</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Föräldrar</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Stockholam, Sweden</a></li><li class="dblock lgn_hight_35"><a href="#" class="black_txt">Stockholam, Sweden</a></li>
								 
							</ul>
						</div>
						<div class="wi_15 marb40 ">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">Help</h3>
							<ul class="mar0 pad0">
								
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Facebook</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Twitter</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Instagram</a></li><li class="dblock lgn_hight_35"><a href="#" class="black_txt">Linkedin</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Magazine</a></li>
								 
							</ul>
						</div>
						
						<div class="wi_15 xxs-wi_100 marb40 ">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">Help</h3>
							<ul class="mar0 pad0">
								<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Helpcenter</a></li>
								<li class="dblock lgn_hight_35"><a href="#" class="black_txt">FAQ</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Chat</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">+46 10 15 10 125</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">support@qualeefy.com</a></li>
								 
							</ul>
						</div>
<div class="wi_15 xxs-wi_100 marb40   xs-wi_50 xs-marr0">
							 
						</div>
						 
						<div class="wi_40 xxs-wi_100 marb40 marrl50 xs-wi_50 xs-marr0">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz30 talr txt_787e89">Teamtailor</h3>
							 <h3 class="marb20 pad0 fsz16 talr txt_787e89 marl100"><span class="maxwi_500p">Teamtailor is the applicant tracking system made for all types of companies. With modern features optimized for you and your candidates, you will get everything you need to recruit successfully.</span></h3>
						</div>
						
					</div>
					<div class="wi_1200p dflex xxxs-dflex alit_fs brdb padb20 marrla">
					<div class="talr fsz14 fright wi_100"><span class="padr30"><a href="mailto:support@teamtailor.com" class="txt_787e89">support@teamtailor.com</a></span><span><a href="tel:+460103302222" class="txt_787e89">+46 (0)10 330 22 22</a></span></div>
					</div>
					
				</div>
				<div class="wi_100 maxwi_100 dflex  xs-fxwrap_w talc padt20 padb30  ">
				<div class="wi_1200p dflex xxxs-dflex alit_fs marrla">
				<div class="wi_40 dflex xxxs-dflex alit_fs">
				<div class="fsz16">© Teamtailor</div>
				<div class="marl50 marr50"><a><span><img width="18px" height="18px" alt="English" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxODJweCIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgMTgyIDE4MiIgd2lkdGg9IjE4MnB4IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnNrZXRjaD0iaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoL25zIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PHRpdGxlLz48ZGVmcy8+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSI+PGcgaWQ9IlVLIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxLjAwMDAwMCwgMS4wMDAwMDApIj48Y2lyY2xlIGN4PSI5MCIgY3k9IjkwIiBkPSJNOTAsMTgwIEMxMzkuNzA1NjMsMTgwIDE4MCwxMzkuNzA1NjMgMTgwLDkwIEMxODAsNDAuMjk0MzcwMSAxMzkuNzA1NjMsMCA5MCwwIEM0MC4yOTQzNzAxLDAgMCw0MC4yOTQzNzAxIDAsOTAgQzAsMTM5LjcwNTYzIDQwLjI5NDM3MDEsMTgwIDkwLDE4MCBaIE05MCwxODAiIGZpbGw9IiMzNDZEQTYiIGlkPSJPdmFsLTEtY29weS05IiByPSI5MCIvPjxwYXRoIGQ9Ik0xNjMuMzYxMjIsMzcuODUxOTgzOCBDMTYwLjQ0NTI4NywzMy43NTcyNjQ1IDE1Ny4xOTUxMDIsMjkuOTE3MDg0NSAxNTMuNjUwNDgsMjYuMzcxMjU5NSBMMTUzLjYyODc0LDI2LjM0OTUxOTggQzE1MC4wODI5MTUsMjIuODA0ODk4NCAxNDYuMjQyNzM1LDE5LjU1NDcxMzMgMTQyLjE0ODAxNiwxNi42Mzg3ODAzIEwxNi42Mzg3ODAzLDE0Mi4xNDgwMTYgQzE5LjU1NDcxMzMsMTQ2LjI0MjczNSAyMi44MDQ4OTg0LDE1MC4wODI5MTUgMjYuMzQ5NTE5OSwxNTMuNjI4NzQgTDI2LjM3MTI1OTYsMTUzLjY1MDQ4IEMyOS45MTcwODQ1LDE1Ny4xOTUxMDIgMzMuNzU3MjY0NSwxNjAuNDQ1Mjg3IDM3Ljg1MTk4MzgsMTYzLjM2MTIyIEwxNjMuMzYxMjIsMzcuODUxOTgzOCBaIE0xNjMuMzYxMjIsMzcuODUxOTgzOCIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTYiLz48cGF0aCBkPSJNMTQyLjE0ODAxNiwxNjMuMzYxMjIgQzE0Ni4yNDI3MzYsMTYwLjQ0NTI4NyAxNTAuMDgyOTE2LDE1Ny4xOTUxMDEgMTUzLjYyODc0MSwxNTMuNjUwNDggTDE1My42NTA0ODEsMTUzLjYyODc0IEMxNTcuMTk1MTAyLDE1MC4wODI5MTUgMTYwLjQ0NTI4NywxNDYuMjQyNzM1IDE2My4zNjEyMiwxNDIuMTQ4MDE2IEwzNy44NTE5ODM4LDE2LjYzODc4MDMgQzMzLjc1NzI2NDUsMTkuNTU0NzEzMyAyOS45MTcwODQ1LDIyLjgwNDg5ODQgMjYuMzcxMjU5NSwyNi4zNDk1MTk5IEwyNi4zNDk1MTk4LDI2LjM3MTI1OTYgQzIyLjgwNDg5ODQsMjkuOTE3MDg0NSAxOS41NTQ3MTMzLDMzLjc1NzI2NDUgMTYuNjM4NzgwMywzNy44NTE5ODM4IEwxNDIuMTQ4MDE2LDE2My4zNjEyMiBaIE0xNDIuMTQ4MDE2LDE2My4zNjEyMiIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTUiLz48cGF0aCBkPSJNMTYwLjI4NzQsMzMuNzgzNjY3NCBDMTU4LjE5Nzk1OCwzMS4xNzQ2MjQ4IDE1NS45NjYyNjEsMjguNjg0NDM3OCAxNTMuNjA0MDY3LDI2LjMyNDg2NDcgTDkwLjQwMjAyMDMsODkuNTI2OTExOSBMOTcuNDczMDg4MSw5Ni41OTc5Nzk3IEwxNjAuMjg3NCwzMy43ODM2Njc0IFogTTE2MC4yODc0LDMzLjc4MzY2NzQiIGZpbGw9IiNDQTQ2MzgiIGlkPSJPdmFsLTEtY29weS05IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5MC4wMDAwMDAsIDkwLjAwMDAwMCkgc2NhbGUoMSwgLTEpIHRyYW5zbGF0ZSgtOTAuMDAwMDAwLCAtOTAuMDAwMDAwKSAiLz48cGF0aCBkPSJNMzMuNzgzNjY3NCwxOS43MTI1OTk2IEMzMS4xNzQ2MjQ4LDIxLjgwMjA0MjMgMjguNjg0NDM3OCwyNC4wMzM3Mzk1IDI2LjMyNDg2NDcsMjYuMzk1OTMyNSBMOTQuNTI2OTExOSw5NC41OTc5Nzk3IEwxMDEuNTk3OTgsODcuNTI2OTExOSBMMzMuNzgzNjY3NCwxOS43MTI1OTk2IFogTTMzLjc4MzY2NzQsMTkuNzEyNTk5NiIgZmlsbD0iI0NBNDYzOCIgaWQ9Ik92YWwtMS1jb3B5LTEwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5MC4wMDAwMDAsIDkwLjAwMDAwMCkgc2NhbGUoMSwgLTEpIHRyYW5zbGF0ZSgtOTAuMDAwMDAwLCAtOTAuMDAwMDAwKSAiLz48cGF0aCBkPSJNMTQ2LjIxNjMzMywxNjAuMjg3NCBDMTQ4LjgyNTM3OCwxNTguMTk3OTU2IDE1MS4zMTU1NjcsMTU1Ljk2NjI1NyAxNTMuNjc1MTQxLDE1My42MDQwNjEgTDk1LjQ3MzA4ODEsOTUuNDAyMDIwMyBMODguNDAyMDIwMywxMDIuNDczMDg4IEwxNDYuMjE2MzMzLDE2MC4yODc0IFogTTE0Ni4yMTYzMzMsMTYwLjI4NzQiIGZpbGw9IiNDQTQ2MzgiIGlkPSJPdmFsLTEtY29weS0xMCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoOTAuMDAwMDAwLCA5MC4wMDAwMDApIHNjYWxlKDEsIC0xKSB0cmFuc2xhdGUoLTkwLjAwMDAwMCwgLTkwLjAwMDAwMCkgIi8+PHBhdGggZD0iTTE5LjcxMjU5OTYsMTQ2LjIxNjMzMyBDMjEuODAyMDQyNSwxNDguODI1Mzc1IDI0LjAzMzczOTgsMTUxLjMxNTU2MyAyNi4zOTU5MzMxLDE1My42NzUxMzYgTDgzLjU5Nzk3OTcsOTYuNDczMDg4MSBMNzYuNTI2OTExOSw4OS40MDIwMjAzIEwxOS43MTI1OTk0LDE0Ni4yMTYzMzMgWiBNMTkuNzEyNTk5NiwxNDYuMjE2MzMzIiBmaWxsPSIjQ0E0NjM4IiBpZD0iT3ZhbC0xLWNvcHktMTAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDkwLjAwMDAwMCwgOTAuMDAwMDAwKSBzY2FsZSgxLCAtMSkgdHJhbnNsYXRlKC05MC4wMDAwMDAsIC05MC4wMDAwMDApICIvPjxwYXRoIGQ9Ik0xNzguNzU1NjI0LDEwNSBDMTc5LjU3NDAxOCwxMDAuMTIxODczIDE4MCw5NS4xMTA2ODMyIDE4MCw5MCBDMTgwLDg0Ljg4OTMxNjggMTc5LjU3NDAxOCw3OS44NzgxMjcxIDE3OC43NTU2MjQsNzUgTDEuMjQ0Mzc2NDMsNzUgQzAuNDI1OTgxODgxLDc5Ljg3ODEyNzEgMCw4NC44ODkzMTY4IDAsOTAgQzAsOTUuMTEwNjgzMiAwLjQyNTk4MTg4MSwxMDAuMTIxODczIDEuMjQ0Mzc2NDMsMTA1IEwxNzguNzU1NjI0LDEwNSBaIE0xNzguNzU1NjI0LDEwNSIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTYiLz48cGF0aCBkPSJNMTA1LDE3OC43NTU2MjQgQzEwMC4xMjE4NzMsMTc5LjU3NDAxOCA5NS4xMTA2ODMyLDE4MCA5MCwxODAgQzg0Ljg4OTMxNjgsMTgwIDc5Ljg3ODEyNzEsMTc5LjU3NDAxOCA3NSwxNzguNzU1NjI0IEw3NSwxLjI0NDM3NjQ0IEM3OS44NzgxMjcxLDAuNDI1OTgxODgxIDg0Ljg4OTMxNjgsMCA5MCwwIEM5NS4xMTA2ODMyLDAgMTAwLjEyMTg3MywwLjQyNTk4MTg3NiAxMDUsMS4yNDQzNzY0MSBMMTA1LDE3OC43NTU2MjQgWiBNMTA1LDE3OC43NTU2MjQiIGZpbGw9IiNGRkZGRkYiIGlkPSJPdmFsLTEtY29weS01Ii8+PHBhdGggZD0iTTE3OS40NTA3MTIsMTAwIEMxNzkuODEzNjY3LDk2LjcxNjY2MTUgMTgwLDkzLjM4MDA5MSAxODAsOTAgQzE4MCw4Ni42MTk5MDkgMTc5LjgxMzY2Nyw4My4yODMzMzg1IDE3OS40NTA3MTIsODAgTDAuNTQ5Mjg3Njk4LDgwIEMwLjE4NjMzMzA4OSw4My4yODMzMzg1IDAsODYuNjE5OTA5IDAsOTAgQzAsOTMuMzgwMDkxIDAuMTg2MzMzMDg5LDk2LjcxNjY2MTUgMC41NDkyODc2OTgsMTAwIEwxNzkuNDUwNzEyLDEwMCBaIE0xNzkuNDUwNzEyLDEwMCIgZmlsbD0iI0NBNDYzOCIgaWQ9Ik92YWwtMS1jb3B5LTciLz48cGF0aCBkPSJNMTAwLDE3OS40NTA3MTIgQzk2LjcxNjY2MTUsMTc5LjgxMzY2NyA5My4zODAwOTEsMTgwIDkwLDE4MCBDODYuNjE5OTA5LDE4MCA4My4yODMzMzg1LDE3OS44MTM2NjcgODAsMTc5LjQ1MDcxMiBMODAsMC41NDkyODc2OTggQzgzLjI4MzMzODUsMC4xODYzMzMwODkgODYuNjE5OTA5LDAgOTAsMCBDOTMuMzgwMDkxLDAgOTYuNzE2NjYxNSwwLjE4NjMzMzA4OSAxMDAsMC41NDkyODc2OTggTDEwMCwxNzkuNDUwNzEyIFogTTEwMCwxNzkuNDUwNzEyIiBmaWxsPSIjQ0E0NjM4IiBpZD0iT3ZhbC0xLWNvcHktNyIvPjwvZz48L2c+PC9zdmc+"><span><sup class="padl10 black_txt fsz16 padb30 txt_787e89">English</sup></a></div>
				<div class="padrl5"><a title="Facebook" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"  style="fill: #f43f85;"  viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-3 7h-1.924c-.615 0-1.076.252-1.076.889v1.111h3l-.238 3h-2.762v8h-3v-8h-2v-3h2v-1.923c0-2.022 1.064-3.077 3.461-3.077h2.539v3z"></path></svg></a></div>
				<div class="padrl5"><a title="Instagram" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" style="fill: #f43f85;" viewBox="0 0 24 24"><path d="M15.233 5.488c-.843-.038-1.097-.046-3.233-.046s-2.389.008-3.232.046c-2.17.099-3.181 1.127-3.279 3.279-.039.844-.048 1.097-.048 3.233s.009 2.389.047 3.233c.099 2.148 1.106 3.18 3.279 3.279.843.038 1.097.047 3.233.047 2.137 0 2.39-.008 3.233-.046 2.17-.099 3.18-1.129 3.279-3.279.038-.844.046-1.097.046-3.233s-.008-2.389-.046-3.232c-.099-2.153-1.111-3.182-3.279-3.281zm-3.233 10.62c-2.269 0-4.108-1.839-4.108-4.108 0-2.269 1.84-4.108 4.108-4.108s4.108 1.839 4.108 4.108c0 2.269-1.839 4.108-4.108 4.108zm4.271-7.418c-.53 0-.96-.43-.96-.96s.43-.96.96-.96.96.43.96.96-.43.96-.96.96zm-1.604 3.31c0 1.473-1.194 2.667-2.667 2.667s-2.667-1.194-2.667-2.667c0-1.473 1.194-2.667 2.667-2.667s2.667 1.194 2.667 2.667zm4.333-12h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm.952 15.298c-.132 2.909-1.751 4.521-4.653 4.654-.854.039-1.126.048-3.299.048s-2.444-.009-3.298-.048c-2.908-.133-4.52-1.748-4.654-4.654-.039-.853-.048-1.125-.048-3.298 0-2.172.009-2.445.048-3.298.134-2.908 1.748-4.521 4.654-4.653.854-.04 1.125-.049 3.298-.049s2.445.009 3.299.048c2.908.133 4.523 1.751 4.653 4.653.039.854.048 1.127.048 3.299 0 2.173-.009 2.445-.048 3.298z"></path></svg></a></div>
				<div class="padrl5"><a title="Twitter" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"  style="fill: #f43f85;"  viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-.139 9.237c.209 4.617-3.234 9.765-9.33 9.765-1.854 0-3.579-.543-5.032-1.475 1.742.205 3.48-.278 4.86-1.359-1.437-.027-2.649-.976-3.066-2.28.515.098 1.021.069 1.482-.056-1.579-.317-2.668-1.739-2.633-3.26.442.246.949.394 1.486.411-1.461-.977-1.875-2.907-1.016-4.383 1.619 1.986 4.038 3.293 6.766 3.43-.479-2.053 1.08-4.03 3.199-4.03.943 0 1.797.398 2.395 1.037.748-.147 1.451-.42 2.086-.796-.246.767-.766 1.41-1.443 1.816.664-.08 1.297-.256 1.885-.517-.439.656-.996 1.234-1.639 1.697z"></path></svg></a></div>
				<div class="padrl5"><a title="Linkedin" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"  style="fill: #f43f85;"  viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"></path></svg></a></div></div>
						 <div class="talr fright wi_60 marl20"><span><a href="#" class="fsz14 padrl10 txt_787e89">Privacy Policy</a></span><span><a href="#" class="fsz14 padrl10 txt_787e89">Security</a></span><span><a href="#" class="fsz14 padrl10 txt_787e89">Environmental</a></span></div> 

						
						</div>
				</div>';
				$stmt->close();
				$dbCon->close();
				return $footer;
			}
		}
		
		  function apiInfo($data)
		{
			$dbCon = AppModel::createConnection();
			 
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select client_id,api_interface_url from oauth_clients where company_id=? and app_type=3 and purchase_from=1 and is_active=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			 
			 	}
				
				
		 function countryOptions()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_name");
			
			/* bind parameters for markers */
			
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
			
			
			function countryCode()
				{
			$dbCon = AppModel::createConnection();
			$stmt = $dbCon->prepare("select * from phone_country_code order by country_code");
			
			/* bind parameters for markers */
			
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
			
		 function completeServiceInfo($data)
		{
			 
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select distinct category_id,category_name,place_of_display,category_discription from eshop_available_services left join eshop_categories on eshop_categories.id=eshop_available_services.category_id where eshop_available_services.company_id=? order by place_of_display");
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row= $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['dishes']=array();
				$i=0;
				 	$stmt = $dbCon->prepare("select eshop_available_services.id,dish_name,dish_detail,dish_image,dish_price from eshop_available_services left join dishes_detail_information on dishes_detail_information.id=eshop_available_services.service_id where eshop_available_services.company_id=? and category_id=?");
					$stmt->bind_param("ii", $company_id,$row['category_id']);
					$stmt->execute();
					$result2 = $stmt->get_result();
					while($rowDishes = $result2->fetch_assoc())
					{
						 $filename="../estorecss/".$rowDishes ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowDishes ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$rowDishes ['dish_image'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; }
						array_push($org[$j]['dishes'],$rowDishes);
						$org[$j]['dishes'][$i]['enc']= $this -> encrypt_decrypt('encrypt',$rowDishes['id']);
						$org[$j]['dishes'][$i]['dish_image']=$imgs;
						$i++;
					}
					 
				
				$j++;
			}
			$stmt->close();
			$dbCon->close();
			return $org;
			
			
		}
	 
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
		}
		
	 	function companyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			
			$stmt = $dbCon->prepare("select country_code ,grading_status,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id left join phone_country_code on phone_country_code.country_name=company_profiles.phone_country  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			
			if($row ['profile_pic']!=null) { $filename="../estorecss/".$row ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['profile_pic'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/default-profile-pic.jpg"; } }  else $row['image_path']="../html/usercontent/images/default-profile-pic.jpg";
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
		
		 function businessImageDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			
			$stmt = $dbCon->prepare("select * from business_dashboard_images where business_id=? and business_type=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			
			if(empty($row))
			{
				$org=array();
				$org['heading_type']=0;
				$org['big_image_path']='../html/usercontent/images/bg/hotel1.jpg';
				$org['small_image1_path']='../html/usercontent/images/bg/hotel2.jpg';
				$org['small_image2_path']='../html/usercontent/images/bg/hotel3.jpg';
				$stmt->close();
				$dbCon->close();
				return $org;
			}
			else
			{
			if($row ['big_image_path']!=null) { $filename="../estorecss/".$row ['big_image_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['big_image_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['big_image_path'] =$this-> base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['big_image_path'].'.jpg' ); } else { $row['big_image_path']="../html/usercontent/images/bg/hotel1.jpg"; } }  else $row['big_image_path']="../html/usercontent/images/bg/hotel1.jpg";
			
			if($row ['small_image1_path']!=null) { $filename="../estorecss/".$row ['small_image1_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['small_image1_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['small_image1_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['small_image1_path'].'.jpg' ); } else { $row['small_image1_path']="../html/usercontent/images/bg/hotel2.jpg"; } }  else $row['small_image1_path']="../html/usercontent/images/bg/hotel2.jpg";
			
			if($row ['small_image2_path']!=null) { $filename="../estorecss/".$row ['small_image2_path'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row['small_image2_path'].".txt"); $value_a=str_replace('"','',$value_a); $row['small_image2_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['small_image2_path'].'.jpg' ); } else { $row['small_image2_path']="../html/usercontent/images/bg/hotel3.jpg"; } }  else $row['small_image2_path']="../html/usercontent/images/bg/hotel3.jpg";
			 
			$stmt->close();
			$dbCon->close();
			return $row;
			}
		}
		
		
		
		 function productInfo($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 $product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select id,dish_name,dish_detail,dish_image,dish_price,variation_type,product_information from dishes_detail_information where id=(select service_id from eshop_available_services where id=?)");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $product_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if($row['variation_type']==1)
			{
			$stmt = $dbCon->prepare("select count(id) as num from dish_variants where dish_id=? and is_active=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row_count = $result->fetch_assoc();
			$row['active_variations']=$row_count['num'];
				
				
			}
			if($row ['dish_image']!=null) { $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a); $row['image_path'] = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row['dish_image'].'.jpg' ); } else { $row['image_path']="../html/usercontent/images/default-profile-pic.jpg"; } }  else $row['image_path']="../html/usercontent/images/default-profile-pic.jpg";
			$stmt->close();
			$dbCon->close();
			return $row;
			 	}
		
		 function productVariations($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 $product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select variation_name,variant_id,sub_variants from dish_variants left join product_variation on product_variation.id=dish_variants.variant_id where dish_id=(select service_id from eshop_available_services where id=?) and is_active=1");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $product_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				$org[$j]['variation_count']=$j+1;
				$org[$j]['variations']=array();
				$stmt = $dbCon->prepare("select id,subvariation_name from product_sub_variation where find_in_set(id,?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $row['sub_variants']);
				$stmt->execute();
				$resultV = $stmt->get_result();
				while($rowV = $resultV->fetch_assoc())
				{
					array_push($org[$j]['variations'],$rowV);
				}
				$j++;
			}
			//echo '<pre>'; print_r($org); echo '</pre>'; die;
			$stmt->close();
			$dbCon->close();
			return $org;
			 	}
		
	function getPrice($data)
		{
			$dbCon = AppModel::createConnection();
			 
			 $product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			
			$stmt = $dbCon->prepare("select combination_price,combination_stock from dish_variation_stock where dish_id=(select service_id from eshop_available_services where id=?) and dish_variant_combination=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("is", $product_id,$_POST['variation']);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($row['combination_stock']==0)
			{
			$stmt->close();
			$dbCon->close();
			return -1;	
			}
			else
			{
			$stmt->close();
			$dbCon->close();
			return $row['combination_price'];
			}
			
			 	}
				
		function addToCart($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$product_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select id from eshop_checkout_detail where ip_address=? and created_on=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $ip,$d,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if($_POST['total_variations']==0)
			{
				$total_variations="";
			}
			else if($_POST['total_variations']==1)
			{
				$total_variations=$_POST['variation1'];
			}
			else if($_POST['total_variations']==2)
			{
				$total_variations=$_POST['variation1'].','.$_POST['variation2'];
			}
			else if($_POST['total_variations']==3)
			{
				$total_variations=$_POST['variation1'].','.$_POST['variation2'].','.$_POST['variation3'];
			}
			$total_price=$_POST['oil_price']*$_POST['oil_numbers'];
			if(empty($row))
			{
				$stmt = $dbCon->prepare("INSERT INTO eshop_checkout_detail (ip_address, created_on,company_id ) VALUES (?, now(), ?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("si", $ip,$company_id);
				$stmt->execute();
				$id=$stmt->insert_id;
				 
				$stmt = $dbCon->prepare("INSERT INTO eshop_checkout_products_detail (eshop_checkout_id, service_id, total_variations, price, number_of_products,variation_combination,created_on,total_price ) VALUES (?,?, ?, ?, ?, ?, now(), ?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("iiiiisi", $id,$product_id,$_POST['total_variations'],$_POST['oil_price'],$_POST['oil_numbers'],$total_variations,$total_price);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			}
			else
			{
				$stmt = $dbCon->prepare("select id,total_price,number_of_products,service_id from eshop_checkout_products_detail where eshop_checkout_id=? and is_paid=0 and service_id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("ii", $row['id'],$product_id);
				$stmt->execute();
				$result = $stmt->get_result();
				$rowProduct = $result->fetch_assoc();
				if(empty($rowProduct))
				{
				$stmt = $dbCon->prepare("INSERT INTO eshop_checkout_products_detail (eshop_checkout_id, service_id, total_variations, price, number_of_products,variation_combination,created_on,total_price ) VALUES (?,?, ?, ?, ?, ?, now(), ?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("iiiiisi", $row['id'],$product_id,$_POST['total_variations'],$_POST['oil_price'],$_POST['oil_numbers'],$total_variations,$total_price);
				$stmt->execute();	
				}
				else
				{
					 
				$total_price=$total_price+$rowProduct['total_price'];	
				$_POST['oil_numbers']=$_POST['oil_numbers']+$rowProduct['number_of_products'];
				$stmt = $dbCon->prepare("update eshop_checkout_products_detail set total_price=?,number_of_products=? where id=?");
			
				/* bind parameters for markers */
				$stmt->bind_param("iii",$total_price,$_POST['oil_numbers'], $rowProduct['id']);
				$stmt->execute();	
				}
				 
				$stmt->close();
				$dbCon->close();
				return 1;
			}
		}
		
		
		function selectedProducts($data)
		{
			$dbCon = AppModel::createConnection();
			 
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select eshop_checkout_products_detail.id,dishes_detail_information.id as dish_id,dish_name,dish_detail,dish_image,total_variations, price, number_of_products,variation_combination,total_price from eshop_checkout_products_detail left join eshop_available_services on eshop_available_services.id=eshop_checkout_products_detail.service_id left join dishes_detail_information on eshop_available_services.service_id=dishes_detail_information.id where eshop_checkout_id=(select id from eshop_checkout_detail where ip_address=? and created_on=? and company_id=?) and is_paid=0");
			 
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $ip,$d,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			$j=0;
			
			while($row = $result->fetch_assoc())
			{
				$row['sub_variantions']='';
				$stmt = $dbCon->prepare("select subvariation_name from product_sub_variation where find_in_set(id,?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("s", $row['variation_combination']);
				$stmt->execute();
				$resultSub = $stmt->get_result();
				while($rowSub = $resultSub->fetch_assoc())
				{
				$row['sub_variantions']=$row['sub_variantions'].','.$rowSub['subvariation_name'];
				 
				}
				 
				array_push($org,$row);
				
				 $filename="../estorecss/".$row ['dish_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row ['dish_image'].".txt"); $value_a=str_replace('"','',$value_a);  $imgs = $this->base64_to_jpeg( $value_a, '../estorecss/tmp'.$row ['dish_image'].'.jpg' );  $imgs='../../../'.$imgs; } else { $value_a="../../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../../html/usercontent/images/default-profile-pic.jpg"; }
				 $org[$j]['image_path']=$imgs;
				  $org[$j]['enc']=$this -> encrypt_decrypt('encrypt',$row['id']);
				 $j++;
			}
			 $stmt->close();
			$dbCon->close();
			return $org;	
			 
			
			 	}
		
		
		function selectedProductsPrice($data)
		{
			$dbCon = AppModel::createConnection();
			 
			 $company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select sum(total_price) as total_amount from eshop_checkout_products_detail  where eshop_checkout_id=(select id from eshop_checkout_detail where ip_address=? and created_on=? and company_id=?) and is_paid=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $ip,$d,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			 
			$stmt->close();
			$dbCon->close();
			return $row;	
			 
			
			 	}
		
		function deleteSelectedItem($data)
		{
			 
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$item_id= $this -> encrypt_decrypt('decrypt',$data['pid']);
			$stmt = $dbCon->prepare("delete from eshop_checkout_products_detail where id=?");
			$stmt->bind_param("i", $item_id);
			$stmt->execute();
			 
			$stmt->close();
			$dbCon->close();
			return 1;
			
		}
		
		function getCompany($data)
		{
			 
			 
			$company_id= $this -> encrypt_decrypt('encrypt',$data['cid']);
			 
			return $company_id;
			
			
		}

	function purchaserInfo($data)
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		if(isset($_POST['ip']))
		{
		$ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);	
		}
		else
		{
			$ip=$data['ip'];
		}		
	
		$resultOut=array();
        $stmt = $dbCon->prepare("select login_status,user_id,purchased_for,delivered_at,delivery_address_id,card_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		//$stmt = $dbCon->prepare("update user_certificates set login_started_for=null,login_status=0,purchased_for=0,delivery_address_id=null,delivered_at=0 where login_started_for = ?");
        
        /* bind parameters for markers */
        //$stmt->bind_param("s", $ip);
        //$stmt->execute();
		
		if($row['purchased_for']==0)
		{
		$stmt = $dbCon->prepare("select * from user_cards where id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['card_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowCards   = $result->fetch_assoc();
		
		 $stmt = $dbCon->prepare("select zipcode,first_name,last_name,email,country_of_residence,user_profiles.invoice_city,user_profiles.state,phone_number,invoice_address,invoice_port,invoice_zipcode from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		$row['card_number']=$rowCards['card_number'];
		$row['card_cvv']=$rowCards['card_cvv'];
		$row['exp_month']=$rowCards['exp_month'];
		$row['exp_year']=$rowCards['exp_year'];
		$row['name_on_card']=$rowCards['name_on_card'];
		$row['user']=1;
		
		 
		
		}
		else
		{
		$stmt = $dbCon->prepare("select * from company_cards where id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['card_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowCards   = $result->fetch_assoc();	
		 $stmt = $dbCon->prepare("select zipcode,first_name,last_name,email,country_of_residence,user_profiles.invoice_city,user_profiles.state,phone_number,invoice_address,invoice_port,invoice_zipcode from user_logins left join user_profiles on user_profiles.user_logins_id=user_logins.id where user_logins.id= ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowUser    = $result->fetch_assoc();	
			
		$stmt = $dbCon->prepare("select cid,company_profiles.phone,country_id,company_email,company_name,property_location.id,street_name_v, city_v, postal_code_v, property_location.d_port_number,street_name_i,city_i,postal_code_i,property_location.i_port_number from  property_location left join companies on companies.id=property_location.company_id left join company_profiles on companies.id=company_profiles.company_id where property_location.id in (select location_id from employee_location where employee_id in (select id from employees where user_login_id=? and company_id =?))");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $row['user_id'],$row['purchased_for']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row   = $result->fetch_assoc();
		$row['user']=0;
		$row['first_name']=$rowUser['first_name'];
		$row['last_name']=$rowUser['last_name'];
		$row['email']=$rowUser['email'];
		$row['card_number']=$rowCards['card_number'];
		$row['card_cvv']=$rowCards['card_cvv'];
		$row['exp_month']=$rowCards['exp_month'];
		$row['exp_year']=$rowCards['exp_year'];
		$row['name_on_card']=$rowCards['name_on_card'];
		}
		 
		$stmt->close();
		$dbCon->close();
		return $row;
		
		 }

	function deliveryInfo()
    {
		$SECRET_KEY = 'qloud_login:system';
        $dbCon = AppModel::createConnection();
		 $ip=$this->encrypt_decrypt('decrypt',$_POST['ip']);
		$resultOut=array();
        $stmt = $dbCon->prepare("select login_status,user_id,purchased_for,delivered_at,delivery_address_id from user_certificates where login_started_for = ?");
        
        /* bind parameters for markers */
        $stmt->bind_param("s", $ip);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		
		
		if($row['delivered_at']==1)
		{
		 $stmt = $dbCon->prepare("select name_on_house, first_name,last_name,email,country_of_residence,user_address.city,user_address.address,user_address.port_number,user_address.zipcode from user_address left join user_logins on user_address.user_id=user_logins.id where user_address.id= ? ");
        
        /* bind parameters for markers */
        $stmt->bind_param("i", $row['delivery_address_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row    = $result->fetch_assoc();
		$row['user']=1;
		
	
		}
		else
		{
		$stmt = $dbCon->prepare("select company_email,company_name,property_location.id,street_name_v, city_v, postal_code_v, d_port_number,street_name_i,city_i,postal_code_i,i_port_number from  property_location left join companies on companies.id=property_location.company_id where property_location.id in (select location_id from employee_location where employee_id in (select id from employees where user_login_id=? and company_id =(select company_id from property_location where id=?)))");
        
        /* bind parameters for markers */
        $stmt->bind_param("ii", $row['user_id'],$row['delivery_address_id']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row   = $result->fetch_assoc();
		$row['user']=0;
		
		}
		 
		$stmt->close();
		$dbCon->close();
		return $row;
		
		 }

				
	 function addDevilveryAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select id from eshop_checkout_detail where ip_address=? and created_on=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $ip,$d,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sum(total_price) as sum  from eshop_checkout_products_detail where eshop_checkout_id=?  and is_paid=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2022&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$_POST['first_name']."&email=".$_POST['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$rowPrice['sum']=$rowPrice['sum']*100;
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$rowPrice['sum']."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
			//print_r($Chargeid); die;	
			 
			$stmt = $dbCon->prepare("update eshop_checkout_products_detail set is_paid=1 where eshop_checkout_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",  $row['id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("update eshop_checkout_address set is_default=0 where eshop_checkout_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",  $row['id']);
			$stmt->execute();
			$name_on_house=htmlentities($_POST['name_on_house'],ENT_NOQUOTES, 'ISO-8859-1');
				$f_name=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1'); 
				$l_name=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$d_address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
				$dcity=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				if($_POST['same_invoice']==1)
				{
				$s_address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');	
				$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$po_number=htmlentities($_POST['dpo_number'],ENT_NOQUOTES, 'ISO-8859-1');
				$zip=htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1');
				$country=$_POST['dcountry'];
				}
				else
				{
				$s_address=htmlentities($_POST['s_address'],ENT_NOQUOTES, 'ISO-8859-1');	
				$city=htmlentities($_POST['city'],ENT_NOQUOTES, 'ISO-8859-1');
				$po_number=htmlentities($_POST['po_number'],ENT_NOQUOTES, 'ISO-8859-1');
				$zip=htmlentities($_POST['zip'],ENT_NOQUOTES, 'ISO-8859-1');	
				$country=$_POST['country'];
				}
				 
				$stmt = $dbCon->prepare("INSERT INTO eshop_checkout_address (delivery_country,eshop_checkout_id, first_name, last_name, email, phone_country, phone_number, street_address, port_number, zipcode, city, country, created_on,name_on_house,delivery_address,delivery_port_number,delivery_zipcode,delivery_city,card_number,card_cvv,exp_month, exp_year, name_on_card,customer_id,transection_id) VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(),?,?,?,?,?,?,?,?,?,?, ?, ?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("iisssisssssissssssssssss",$_POST['dcountry'], $row['id'],$f_name,$l_name,$_POST['email'],$_POST['pcountry'],$_POST['p_number'],$s_address,$po_number,$zip,$city,$country,$name_on_house,$d_address,$_POST['dpo_number'],$_POST['dzip'],$dcity,$_POST['card_number'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],$f_name,$cuId,$Chargeid);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		
		 function addBusinessDevilveryAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			 
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select id from eshop_checkout_detail where ip_address=? and created_on=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $ip,$d,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sum(total_price) as sum  from eshop_checkout_products_detail where eshop_checkout_id=?  and is_paid=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2022&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$_POST['first_name']."&email=".$_POST['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$rowPrice['sum']=$rowPrice['sum']*100;
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$rowPrice['sum']."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
			//print_r($Chargeid); die;	
			 
			$stmt = $dbCon->prepare("update eshop_checkout_products_detail set is_paid=1 where eshop_checkout_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",  $row['id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("update eshop_checkout_address set is_default=0 where eshop_checkout_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",  $row['id']);
			$stmt->execute();
			$name_on_house=htmlentities($_POST['name_on_house'],ENT_NOQUOTES, 'ISO-8859-1');
			$c_name=htmlentities($_POST['company_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$f_name=htmlentities($_POST['first_name'],ENT_NOQUOTES, 'ISO-8859-1'); 
				$l_name=htmlentities($_POST['last_name'],ENT_NOQUOTES, 'ISO-8859-1');
				$d_address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');
				$dcity=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				if($_POST['same_invoice']==1)
				{
				$s_address=htmlentities($_POST['d_address'],ENT_NOQUOTES, 'ISO-8859-1');	
				$city=htmlentities($_POST['dcity'],ENT_NOQUOTES, 'ISO-8859-1');
				$po_number=htmlentities($_POST['dpo_number'],ENT_NOQUOTES, 'ISO-8859-1');
				$zip=htmlentities($_POST['dzip'],ENT_NOQUOTES, 'ISO-8859-1');
				$country=$_POST['dcountry'];
				}
				else
				{
				$s_address=htmlentities($_POST['s_address'],ENT_NOQUOTES, 'ISO-8859-1');	
				$city=htmlentities($_POST['city'],ENT_NOQUOTES, 'ISO-8859-1');
				$po_number=htmlentities($_POST['po_number'],ENT_NOQUOTES, 'ISO-8859-1');
				$zip=htmlentities($_POST['zip'],ENT_NOQUOTES, 'ISO-8859-1');	
				$country=$_POST['country'];
				}
				 
				$stmt = $dbCon->prepare("INSERT INTO eshop_checkout_address (company_name,company_country,company_cid,delivery_country,eshop_checkout_id, first_name, last_name, email, phone_country, phone_number, street_address, port_number, zipcode, city, country, created_on,name_on_house,delivery_address,delivery_port_number,delivery_zipcode,delivery_city,card_number,card_cvv,exp_month, exp_year, name_on_card,customer_id,transection_id) VALUES (?,?,?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(),?,?,?,?,?,?,?,?,?,?, ?, ?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("sisiisssisssssissssssssssss",$c_name,$_POST['company_country'],$_POST['cid'],$_POST['dcountry'], $row['id'],$f_name,$l_name,$_POST['email'],$_POST['pcountry'],$_POST['p_number'],$s_address,$po_number,$zip,$city,$country,$name_on_house,$d_address,$_POST['dpo_number'],$_POST['dzip'],$dcity,$_POST['card_number'],$_POST['cvv'],$_POST['exp_month'],$_POST['exp_year'],$f_name,$cuId,$Chargeid);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		
		
		 function updateDevilveryAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			
			 $stmt = $dbCon->prepare("select pickup_address_id,delivery_type from user_certificates where login_started_for = ?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPickup    = $result->fetch_assoc(); 
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select id from eshop_checkout_detail where ip_address=? and created_on=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $ip,$d,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sum(total_price) as sum  from eshop_checkout_products_detail where eshop_checkout_id=?  and is_paid=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			$data['ip']=$ip;
			$purchaserInfo    = $this->purchaserInfo($data);
			 
			$deliveryInfo    = $this->deliveryInfo($data);
			
			$stmt = $dbCon->prepare("update user_certificates set pickup_address_id=0,delivery_type=0,login_started_for=null,login_status=0,purchased_for=0,delivery_address_id=null,delivered_at=0,client_id=null where login_started_for = ?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
		
			 
			if($deliveryInfo['user']==1) {
				$name_on_house=$deliveryInfo['name_on_house'];
				$d_address=$deliveryInfo['address'];
				$dpo_number=$deliveryInfo['dpo_number'];
				$dzip=$deliveryInfo['zipcode'];
				$dcity=$deliveryInfo['city']; 
			}
			else
			{
			$name_on_house=$deliveryInfo['company_name'];
			$d_address=$deliveryInfo['street_name_v'];
			$dpo_number=$deliveryInfo['d_port_number'];
			$dzip=$deliveryInfo['postal_code_v'];
			$dcity=	$deliveryInfo['city_v'];
			}
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2022&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$_POST['first_name']."&email=".$_POST['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$rowPrice['sum']=$rowPrice['sum']*100;
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$rowPrice['sum']."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
			$stmt = $dbCon->prepare("update eshop_checkout_products_detail set is_paid=1 where eshop_checkout_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",  $row['id']);
			$stmt->execute();
			$stmt = $dbCon->prepare("update eshop_checkout_address set is_default=0 where eshop_checkout_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",  $row['id']);
			$stmt->execute();
				$f_name=$purchaserInfo['first_name']; 
				$l_name=$purchaserInfo['last_name'];
				$saddress=$purchaserInfo['invoice_address'];
				$city=$purchaserInfo['invoice_city'];
				$stmt = $dbCon->prepare("INSERT INTO eshop_checkout_address (pickup_address_id,pickup_type,eshop_checkout_id, first_name, last_name, email, phone_country, phone_number, street_address, port_number, zipcode, city, country, created_on,name_on_house,delivery_address,delivery_port_number,delivery_zipcode,delivery_city,card_number,card_cvv,exp_month, exp_year, name_on_card,customer_id,transection_id) VALUES (?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(),?,?,?,?,?,?,?,?,?,?, ?, ?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("iiisssisssssissssssssssss",$rowPickup['pickup_address_id'],$rowPickup['delivery_type'], $row['id'],$f_name,$l_name,$purchaserInfo['email'],$purchaserInfo['country_of_residence'],$purchaserInfo['phone_number'],$saddress,$purchaserInfo['invoice_port'],$purchaserInfo['invoice_zipcode'],$city,$purchaserInfo['country_of_residence'],$name_on_house,$d_address,$dpo_number,$dzip,$dcity,$purchaserInfo['card_number'],$purchaserInfo['cvv'],$purchaserInfo['exp_month'],$purchaserInfo['exp_year'],$purchaserInfo['card_name'],$cuId,$Chargeid);
				$stmt->execute();
				$stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		
		
		
		
		 function addCompanyDevilveryAddress($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$client  = @$_SERVER['HTTP_CLIENT_IP'];
			$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
			$remote  = $_SERVER['REMOTE_ADDR'];
			
			if(filter_var($client, FILTER_VALIDATE_IP))
			{
				$ip = $client;
			}
			elseif(filter_var($forward, FILTER_VALIDATE_IP))
			{
				$ip = $forward;
			}
			else
			{
				$ip = $remote;
			}
			
			 $stmt = $dbCon->prepare("select pickup_address_id,delivery_type from user_certificates where login_started_for = ?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPickup    = $result->fetch_assoc();
			$d=date('Y-m-d');
			$stmt = $dbCon->prepare("select id from eshop_checkout_detail where ip_address=? and created_on=? and company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("ssi", $ip,$d,$company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			
			$stmt = $dbCon->prepare("select sum(total_price) as sum  from eshop_checkout_products_detail where eshop_checkout_id=?  and is_paid=0");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $row['id']);
			$stmt->execute();
			$result = $stmt->get_result();
			$rowPrice = $result->fetch_assoc();
			
			
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=2&card[exp_year]=2022&card[cvc]=314");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$a=json_decode($result,true);
			 
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/customers');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "name=".$_POST['first_name']."&email=".$_POST['email']."&source=".$a['id']."&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);
			$b=json_decode($result,true);
			$cuId=$b['id'];
			
			$rowPrice['sum']=$rowPrice['sum']*100;
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/charges');
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, "customer=".$b['id']."&amount=".$rowPrice['sum']."&currency=sek&description=My");
			curl_setopt($ch, CURLOPT_USERPWD, 'sk_test_mTVjBSZHopmJyA3wgvzRwUM2' . ':' . '');

			$headers = array();
			$headers[] = 'Content-Type: application/x-www-form-urlencoded';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

			$result = curl_exec($ch);
			if (curl_errno($ch)) {
				echo 'Error:' . curl_error($ch);
			}
			curl_close($ch);			
			$c=json_decode($result,true);
			$Chargeid=$c['id'];	
			$data['ip']=$ip;
			$purchaserInfo    = $this->purchaserInfo($data);
			$deliveryInfo    = $this->deliveryInfo($data);
			$stmt = $dbCon->prepare("update user_certificates set pickup_address_id=0,delivery_type=0,login_started_for=null,login_status=0,purchased_for=0,delivery_address_id=null,delivered_at=0,client_id=null where login_started_for = ?");
        
			/* bind parameters for markers */
			$stmt->bind_param("s", $ip);
			$stmt->execute();
		
			if($deliveryInfo['user']==1) {
				$name_on_house=$deliveryInfo['name_on_house'];
				$d_address=$deliveryInfo['address'];
				$dpo_number=$deliveryInfo['dpo_number'];
				$dzip=$deliveryInfo['zipcode'];
				$dcity=$deliveryInfo['city']; 
			}
			else
			{
			$name_on_house=$deliveryInfo['company_name'];
			$d_address=$deliveryInfo['street_name_v'];
			$dpo_number=$deliveryInfo['d_port_number'];
			$dzip=$deliveryInfo['postal_code_v'];
			$dcity=	$deliveryInfo['city_v'];
			}
			
			
			$stmt = $dbCon->prepare("update eshop_checkout_address set is_default=0 where eshop_checkout_id=?");
			/* bind parameters for markers */
			$stmt->bind_param("i",  $row['id']);
			$stmt->execute();
			
				$company_name=$purchaserInfo['company_name']; 
				$f_name=$purchaserInfo['first_name']; 
				$l_name=$purchaserInfo['last_name'];
				$saddress=$purchaserInfo['street_name_i'];
				$city=$purchaserInfo['city_i'];
				
				$stmt = $dbCon->prepare("INSERT INTO eshop_checkout_address (pickup_address_id,pickup_type,eshop_checkout_id, first_name, last_name, email, phone_country, phone_number, street_address, port_number, zipcode, city, country, created_on, company_name, company_country,company_cid,name_on_house,delivery_address,delivery_port_number,delivery_zipcode,delivery_city,card_number,card_cvv,exp_month, exp_year, name_on_card,customer_id,transection_id) VALUES (?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now(),? , ?, ?,?,?,?,?,?,?,?,?,?,?,?,?)");
			
				/* bind parameters for markers */
				$stmt->bind_param("iiisssisssssisisssssssssssss",$rowPickup['pickup_address_id'],$rowPickup['delivery_type'], $row['id'],$f_name,$l_name,$purchaserInfo['email'],$_POST['pcountry'],$_POST['p_number'],$saddress,$_POST['i_port_number'],$_POST['postal_code_i'],$city,$purchaserInfo['country_id'],$company_name,$purchaserInfo['country_id'],$purchaserInfo['cid'],$name_on_house,$d_address,$dpo_number,$dzip,$dcity,$purchaserInfo['card_number'],$purchaserInfo['cvv'],$purchaserInfo['exp_month'],$purchaserInfo['exp_year'],$purchaserInfo['card_name'],$cuId,$Chargeid);
				$stmt->execute();
				
				$stmt->close();
				$dbCon->close();
				return 1;
			 
		}
		
		function userCompanyDetail($data)
		{
		$dbCon = AppModel::createConnection();
		$stmt = $dbCon->prepare("select client_id,client_secret from oauth_clients where client_id =(select client_id from oauth_check_user where code=?)");
			
		/* bind parameters for markers */
		$stmt->bind_param("s", $data['code']);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$username=$row['client_id'];
        $password=$row['client_secret'];
		
		$fields = ['grant_type'=>'authorization_code','code' => $_GET['code'],'client_id'=>$username, 'client_secret'=>$password];
		 
		$headers = array('PHP_AUTH_USER' => $username , 'PHP_AUTH_PW' => $password);
		$url='http://www.qloudid.com/walk/token.php';
		 
		 $curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://safeqloud-228cbc38a2be.herokuapp.com/walk/token.php",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $fields,
			));

			$result = curl_exec($curl);

			curl_close($curl);
		 
		 
		 
		$val=json_decode($result,true);
		   //print_r($val); die;
		if(isset($val['access_token']) && !empty($val['access_token']))
		{
		$fields = ['access_token'=>$val['access_token']];
		 
		 
		$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://safeqloud-228cbc38a2be.herokuapp.com/walk/resource.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "access_token=".$val['access_token']."",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/x-www-form-urlencoded"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$output=(array)json_decode($response,true); 
		}
		
		$output['company_enc']=$this -> encrypt_decrypt('encrypt',$output['seller_company_id']);
		
				$stmt->close();
				$dbCon->close();
				return $output;
		}
	}	


	