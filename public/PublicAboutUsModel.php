<?php

	require_once('../AppModel.php');
	class PublicAboutUsModel extends AppModel
	{
		function base64_to_jpeg($base64_string, $output_file) {
			$ifp = fopen( $output_file, 'wb' ); 
			$data = explode( ',', $base64_string );
			fwrite( $ifp, base64_decode( $data[1] ) );
			fclose( $ifp ); 
			return $output_file; 
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
			$footer='<div class="ovfl_hid padrl10 txt_37404a fsz14 white_bg padt30 xxsi-padrl35 xs-dnone ">
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
						
						$products='<div class="wi_15 marb40 xs-dnone">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">'.$row['product_menu_name'].'</h3>
							<ul class="mar0 pad0">'.$newP.'</ul>
						</div>';
					}
					else
					{
						$products='<div class="wi_15 marb40 xs-dnone"></div>';
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
						
						$resources='<div class="wi_15 marb40 xs-dnone">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">'.$row['resource_menu_name'].'</h3>
							<ul class="mar0 pad0">'.$newP.'</ul>
						</div>';
					}
					else
					{
						$resources='<div class="wi_15 marb40 xs-dnone"></div>';
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
						
						$help='<div class="wi_15 marb40 xs-dnone">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">'.$row['help_menu_name'].'</h3>
							<ul class="mar0 pad0">'.$newP.'</ul>
						</div>';
					}
					else
					{
						$help='<div class="wi_15 marb40 xs-dnone"></div>';
					}
					
			$footer=$footer.''.$help;
			
			if($rowCompany ['profile_pic']!=null) { $filename="../estorecss/".$rowCompany ['profile_pic'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$rowCompany ['profile_pic'].".txt"); $value_a=str_replace('"','',$value_a); $rowCompany['image_path'] = $value_a; } else { $rowCompany['image_path']="../html/usercontent/images/default-profile-pic.jpg"; } }  else $rowCompany['image_path']="../html/usercontent/images/default-profile-pic.jpg";
			
			$rowCompany['image_path']=str_replace("../","https://www.qloudid.com/",$rowCompany['image_path']);
			 
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
			
			
			
			 
				
				$copyright='<div class="wi_100 maxwi_100 dflex  xs-fxwrap_w talc padt20 padb30 hidden-xs ">
				<div class="wi_1200p dflex xxxs-dflex alit_fs marrla">
				<div class="wi_40 dflex xxxs-dflex alit_fs">
				<div class="fsz16 txt_787e89">© '.$row['copyright_text'].'</div>
				<div class="marl50 marr50"><a><span><img width="18px" height="18px" alt="English" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgaGVpZ2h0PSIxODJweCIgdmVyc2lvbj0iMS4xIiB2aWV3Qm94PSIwIDAgMTgyIDE4MiIgd2lkdGg9IjE4MnB4IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnNrZXRjaD0iaHR0cDovL3d3dy5ib2hlbWlhbmNvZGluZy5jb20vc2tldGNoL25zIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+PHRpdGxlLz48ZGVmcy8+PGcgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIiBpZD0iUGFnZS0xIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSI+PGcgaWQ9IlVLIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgxLjAwMDAwMCwgMS4wMDAwMDApIj48Y2lyY2xlIGN4PSI5MCIgY3k9IjkwIiBkPSJNOTAsMTgwIEMxMzkuNzA1NjMsMTgwIDE4MCwxMzkuNzA1NjMgMTgwLDkwIEMxODAsNDAuMjk0MzcwMSAxMzkuNzA1NjMsMCA5MCwwIEM0MC4yOTQzNzAxLDAgMCw0MC4yOTQzNzAxIDAsOTAgQzAsMTM5LjcwNTYzIDQwLjI5NDM3MDEsMTgwIDkwLDE4MCBaIE05MCwxODAiIGZpbGw9IiMzNDZEQTYiIGlkPSJPdmFsLTEtY29weS05IiByPSI5MCIvPjxwYXRoIGQ9Ik0xNjMuMzYxMjIsMzcuODUxOTgzOCBDMTYwLjQ0NTI4NywzMy43NTcyNjQ1IDE1Ny4xOTUxMDIsMjkuOTE3MDg0NSAxNTMuNjUwNDgsMjYuMzcxMjU5NSBMMTUzLjYyODc0LDI2LjM0OTUxOTggQzE1MC4wODI5MTUsMjIuODA0ODk4NCAxNDYuMjQyNzM1LDE5LjU1NDcxMzMgMTQyLjE0ODAxNiwxNi42Mzg3ODAzIEwxNi42Mzg3ODAzLDE0Mi4xNDgwMTYgQzE5LjU1NDcxMzMsMTQ2LjI0MjczNSAyMi44MDQ4OTg0LDE1MC4wODI5MTUgMjYuMzQ5NTE5OSwxNTMuNjI4NzQgTDI2LjM3MTI1OTYsMTUzLjY1MDQ4IEMyOS45MTcwODQ1LDE1Ny4xOTUxMDIgMzMuNzU3MjY0NSwxNjAuNDQ1Mjg3IDM3Ljg1MTk4MzgsMTYzLjM2MTIyIEwxNjMuMzYxMjIsMzcuODUxOTgzOCBaIE0xNjMuMzYxMjIsMzcuODUxOTgzOCIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTYiLz48cGF0aCBkPSJNMTQyLjE0ODAxNiwxNjMuMzYxMjIgQzE0Ni4yNDI3MzYsMTYwLjQ0NTI4NyAxNTAuMDgyOTE2LDE1Ny4xOTUxMDEgMTUzLjYyODc0MSwxNTMuNjUwNDggTDE1My42NTA0ODEsMTUzLjYyODc0IEMxNTcuMTk1MTAyLDE1MC4wODI5MTUgMTYwLjQ0NTI4NywxNDYuMjQyNzM1IDE2My4zNjEyMiwxNDIuMTQ4MDE2IEwzNy44NTE5ODM4LDE2LjYzODc4MDMgQzMzLjc1NzI2NDUsMTkuNTU0NzEzMyAyOS45MTcwODQ1LDIyLjgwNDg5ODQgMjYuMzcxMjU5NSwyNi4zNDk1MTk5IEwyNi4zNDk1MTk4LDI2LjM3MTI1OTYgQzIyLjgwNDg5ODQsMjkuOTE3MDg0NSAxOS41NTQ3MTMzLDMzLjc1NzI2NDUgMTYuNjM4NzgwMywzNy44NTE5ODM4IEwxNDIuMTQ4MDE2LDE2My4zNjEyMiBaIE0xNDIuMTQ4MDE2LDE2My4zNjEyMiIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTUiLz48cGF0aCBkPSJNMTYwLjI4NzQsMzMuNzgzNjY3NCBDMTU4LjE5Nzk1OCwzMS4xNzQ2MjQ4IDE1NS45NjYyNjEsMjguNjg0NDM3OCAxNTMuNjA0MDY3LDI2LjMyNDg2NDcgTDkwLjQwMjAyMDMsODkuNTI2OTExOSBMOTcuNDczMDg4MSw5Ni41OTc5Nzk3IEwxNjAuMjg3NCwzMy43ODM2Njc0IFogTTE2MC4yODc0LDMzLjc4MzY2NzQiIGZpbGw9IiNDQTQ2MzgiIGlkPSJPdmFsLTEtY29weS05IiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5MC4wMDAwMDAsIDkwLjAwMDAwMCkgc2NhbGUoMSwgLTEpIHRyYW5zbGF0ZSgtOTAuMDAwMDAwLCAtOTAuMDAwMDAwKSAiLz48cGF0aCBkPSJNMzMuNzgzNjY3NCwxOS43MTI1OTk2IEMzMS4xNzQ2MjQ4LDIxLjgwMjA0MjMgMjguNjg0NDM3OCwyNC4wMzM3Mzk1IDI2LjMyNDg2NDcsMjYuMzk1OTMyNSBMOTQuNTI2OTExOSw5NC41OTc5Nzk3IEwxMDEuNTk3OTgsODcuNTI2OTExOSBMMzMuNzgzNjY3NCwxOS43MTI1OTk2IFogTTMzLjc4MzY2NzQsMTkuNzEyNTk5NiIgZmlsbD0iI0NBNDYzOCIgaWQ9Ik92YWwtMS1jb3B5LTEwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSg5MC4wMDAwMDAsIDkwLjAwMDAwMCkgc2NhbGUoMSwgLTEpIHRyYW5zbGF0ZSgtOTAuMDAwMDAwLCAtOTAuMDAwMDAwKSAiLz48cGF0aCBkPSJNMTQ2LjIxNjMzMywxNjAuMjg3NCBDMTQ4LjgyNTM3OCwxNTguMTk3OTU2IDE1MS4zMTU1NjcsMTU1Ljk2NjI1NyAxNTMuNjc1MTQxLDE1My42MDQwNjEgTDk1LjQ3MzA4ODEsOTUuNDAyMDIwMyBMODguNDAyMDIwMywxMDIuNDczMDg4IEwxNDYuMjE2MzMzLDE2MC4yODc0IFogTTE0Ni4yMTYzMzMsMTYwLjI4NzQiIGZpbGw9IiNDQTQ2MzgiIGlkPSJPdmFsLTEtY29weS0xMCIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoOTAuMDAwMDAwLCA5MC4wMDAwMDApIHNjYWxlKDEsIC0xKSB0cmFuc2xhdGUoLTkwLjAwMDAwMCwgLTkwLjAwMDAwMCkgIi8+PHBhdGggZD0iTTE5LjcxMjU5OTYsMTQ2LjIxNjMzMyBDMjEuODAyMDQyNSwxNDguODI1Mzc1IDI0LjAzMzczOTgsMTUxLjMxNTU2MyAyNi4zOTU5MzMxLDE1My42NzUxMzYgTDgzLjU5Nzk3OTcsOTYuNDczMDg4MSBMNzYuNTI2OTExOSw4OS40MDIwMjAzIEwxOS43MTI1OTk0LDE0Ni4yMTYzMzMgWiBNMTkuNzEyNTk5NiwxNDYuMjE2MzMzIiBmaWxsPSIjQ0E0NjM4IiBpZD0iT3ZhbC0xLWNvcHktMTAiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDkwLjAwMDAwMCwgOTAuMDAwMDAwKSBzY2FsZSgxLCAtMSkgdHJhbnNsYXRlKC05MC4wMDAwMDAsIC05MC4wMDAwMDApICIvPjxwYXRoIGQ9Ik0xNzguNzU1NjI0LDEwNSBDMTc5LjU3NDAxOCwxMDAuMTIxODczIDE4MCw5NS4xMTA2ODMyIDE4MCw5MCBDMTgwLDg0Ljg4OTMxNjggMTc5LjU3NDAxOCw3OS44NzgxMjcxIDE3OC43NTU2MjQsNzUgTDEuMjQ0Mzc2NDMsNzUgQzAuNDI1OTgxODgxLDc5Ljg3ODEyNzEgMCw4NC44ODkzMTY4IDAsOTAgQzAsOTUuMTEwNjgzMiAwLjQyNTk4MTg4MSwxMDAuMTIxODczIDEuMjQ0Mzc2NDMsMTA1IEwxNzguNzU1NjI0LDEwNSBaIE0xNzguNzU1NjI0LDEwNSIgZmlsbD0iI0ZGRkZGRiIgaWQ9Ik92YWwtMS1jb3B5LTYiLz48cGF0aCBkPSJNMTA1LDE3OC43NTU2MjQgQzEwMC4xMjE4NzMsMTc5LjU3NDAxOCA5NS4xMTA2ODMyLDE4MCA5MCwxODAgQzg0Ljg4OTMxNjgsMTgwIDc5Ljg3ODEyNzEsMTc5LjU3NDAxOCA3NSwxNzguNzU1NjI0IEw3NSwxLjI0NDM3NjQ0IEM3OS44NzgxMjcxLDAuNDI1OTgxODgxIDg0Ljg4OTMxNjgsMCA5MCwwIEM5NS4xMTA2ODMyLDAgMTAwLjEyMTg3MywwLjQyNTk4MTg3NiAxMDUsMS4yNDQzNzY0MSBMMTA1LDE3OC43NTU2MjQgWiBNMTA1LDE3OC43NTU2MjQiIGZpbGw9IiNGRkZGRkYiIGlkPSJPdmFsLTEtY29weS01Ii8+PHBhdGggZD0iTTE3OS40NTA3MTIsMTAwIEMxNzkuODEzNjY3LDk2LjcxNjY2MTUgMTgwLDkzLjM4MDA5MSAxODAsOTAgQzE4MCw4Ni42MTk5MDkgMTc5LjgxMzY2Nyw4My4yODMzMzg1IDE3OS40NTA3MTIsODAgTDAuNTQ5Mjg3Njk4LDgwIEMwLjE4NjMzMzA4OSw4My4yODMzMzg1IDAsODYuNjE5OTA5IDAsOTAgQzAsOTMuMzgwMDkxIDAuMTg2MzMzMDg5LDk2LjcxNjY2MTUgMC41NDkyODc2OTgsMTAwIEwxNzkuNDUwNzEyLDEwMCBaIE0xNzkuNDUwNzEyLDEwMCIgZmlsbD0iI0NBNDYzOCIgaWQ9Ik92YWwtMS1jb3B5LTciLz48cGF0aCBkPSJNMTAwLDE3OS40NTA3MTIgQzk2LjcxNjY2MTUsMTc5LjgxMzY2NyA5My4zODAwOTEsMTgwIDkwLDE4MCBDODYuNjE5OTA5LDE4MCA4My4yODMzMzg1LDE3OS44MTM2NjcgODAsMTc5LjQ1MDcxMiBMODAsMC41NDkyODc2OTggQzgzLjI4MzMzODUsMC4xODYzMzMwODkgODYuNjE5OTA5LDAgOTAsMCBDOTMuMzgwMDkxLDAgOTYuNzE2NjYxNSwwLjE4NjMzMzA4OSAxMDAsMC41NDkyODc2OTggTDEwMCwxNzkuNDUwNzEyIFogTTEwMCwxNzkuNDUwNzEyIiBmaWxsPSIjQ0E0NjM4IiBpZD0iT3ZhbC0xLWNvcHktNyIvPjwvZz48L2c+PC9zdmc+"><span><sup class="padl10 black_txt fsz16 padb30 txt_787e89">English</sup></a></div>
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
				$footer='<div class="ovfl_hid padrl10 txt_37404a fsz14 white_bg padt60 xxsi-padrl35 xs-dnone ">
					<div class="wi_1200p dflex xxxs-dflex alit_fs marrla">
						
<div class="wi_15 marb40 xs-dnone">
							<h3 class="marb20 pad0 uppercase letspc_15 bold fsz14 black_txt">Pages</h3>
							<ul class="mar0 pad0">
								<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Om Safeqid</a></li>
								
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Förskolor</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Föräldrar</a></li>
<li class="dblock lgn_hight_35"><a href="#" class="black_txt">Stockholam, Sweden</a></li><li class="dblock lgn_hight_35"><a href="#" class="black_txt">Stockholam, Sweden</a></li>
								 
							</ul>
						</div>
						<div class="wi_15 marb40 xs-dnone">
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
				<div class="wi_100 maxwi_100 dflex  xs-fxwrap_w talc padt20 padb30 hidden-xs ">
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
		
		
		function verificationId($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			$stmt = $dbCon->prepare("select max(id) as v_id from company_passport_logs where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			if(empty($row))
			{
				$row['v_id']="";
			}
			$stmt->close();
			$dbCon->close();
			return $row;
			
		}
		function companyDetail($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			$stmt = $dbCon->prepare("select id from company_profiles  where company_id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			if(empty($row))
			{
				//echo "hi"; die;
				$stmt = $dbCon->prepare("INSERT INTO company_profiles (company_id, created_on , modified_on ) VALUES (?, now(), now())");
				
				
				$stmt->bind_param("i", $company_id);
				$stmt->execute();	
			}
			
			$stmt = $dbCon->prepare("select companies.grading_status,website,companies.id,company_name,cid,founded,industry,profile_pic,address,company_profiles.city,zip,company_profiles.country,delivery_address,d_zip,d_city,d_country,company_profiles.phone,company_email,vat,company_profiles.phone_country,si_address,si_city,si_zip,si_country,sd_address,sd_city,sd_zip,sd_country,bankgiro_med,bankgiro_utan,iban,bic,bank,f_tax from companies left join company_profiles on companies.id=company_profiles.company_id  where companies.id=?");
			
			/* bind parameters for markers */
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			//print_r($row); die;
			
			$stmt->close();
			$dbCon->close();
			return $row;
		}
    	
		function userSummary($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select grading_status,country_name,company_name from companies left join country on country.id=companies.country_id where companies.id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function companyContentDisplay($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select count(id) as num from company_aboutus_content where company_id=?");
			
			
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			
			$row = $result->fetch_assoc();
			if($row['num']==0)
			{
				$stmt->close();
				$dbCon->close();
				return 0;
				
			}
			else
			
			{
				$stmt = $dbCon->prepare("select is_active from company_aboutus_content where company_id=?");
				$stmt->bind_param("i", $company_id);
				$stmt->execute();
				$result1 = $stmt->get_result();
				$row1 = $result1->fetch_assoc();
				if($row1['is_active']==0)
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
		
		
		function companyAboutus($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select company_aboutus_content.id,heading,content,is_active from company_aboutus_content left join company_aboutus_heading on company_aboutus_heading.id=company_aboutus_content.company_aboutus_id where company_id=?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$org=array();
			 
			$j=0;
			while($row = $result->fetch_assoc())
			{
				array_push($org,$row);
				 
			}
			$stmt->close();
			$dbCon->close();
			return $org;
		}	
		
		function aboutUsCount($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select count(id) as num from company_aboutus_weblink where company_id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
		function aboutUsWeblink($data)
		{
			$dbCon = AppModel::createConnection();
			$company_id= $this -> encrypt_decrypt('decrypt',$data['cid']);
			
			
			$stmt = $dbCon->prepare("select website,wlink from company_aboutus_weblink where company_id = ?");
			
			/* bind parameters for markers */
			$cont=1;
			$stmt->bind_param("i", $company_id);
			$stmt->execute();
			$result = $stmt->get_result();
			$row = $result->fetch_assoc();
			$stmt->close();
			$dbCon->close();
			return $row;
			
			
		}
		
	}		