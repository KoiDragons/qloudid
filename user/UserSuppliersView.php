<!doctype html>
<?php 
	$path1 = $path."html/usercontent/images/";
	function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );
//print_r($data); die;
    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[1] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}

	if($row_summary ['passport_image']!=null) { $filename="../estorecss/".$row_summary ['passport_image'].".txt"; if (file_exists($filename)) { $value_a=file_get_contents("../estorecss/".$row_summary ['passport_image'].".txt"); $value_a=str_replace('"','',$value_a); $imgs = base64_to_jpeg( $value_a, '../estorecss/tmp.jpg' );  $imgs='../../'.$imgs; } else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg";  $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; } }  else { $value_a="../../../html/usercontent/images/default-profile-pic.jpg"; $imgs="../../../html/usercontent/images/default-profile-pic.jpg"; }
	
?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
			function submitFormCom()
{
	
	$("#save_indexingcs").submit();
}

function changeActive()
{
	if($(".sources-content").hasClass('active'))
	{
$(".sources-content").removeClass('active');

$(".sources-content").attr('style','display:none');
}
	else
	{
$(".sources-content").addClass('active');

$(".sources-content").attr('style','display:block');
}
}

function searchUser()
			{
				/*if($("#reque").val()!=3 || $("#reque").val()!=2)
				{
					alert("Please select code!!!");
					return false;
				}*/
				if($("#reque").val()==1)
				{
					if($("#cntryph").val()==0)
					{
						alert("Please select country!!!");
						return false;
					}
					else if($("#phoneno").val()=="" || $("#phoneno").val()==null)
					{
						alert("Please enter phone number!!!");
						return false;
					}
					else
					{
						var send_data={};
						send_data.countryname=$("#cntryph").val();
						send_data.phoneno=$("#phoneno").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/UserSuppliers/userSuppliersShow";
								}
								
							}
						});
					}
					
				}
				
				else if($("#reque").val()==3)
				{
					if($("#code_id").val()=="" || $("#code_id").val()==null)
					{
						alert("Please enter your verification code!!!");
						return false;
					}
					else
					{
						var send_data={};
						send_data.id=$("#code_id").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/UserSuppliers/userSuppliersShow";
								}
								
							}
						});
					}
					
				}
				
				else if($("#reque").val()==2)
				{
					var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
					if (!reg.test($("#email_id").val())){
                    
                    $("#email_id").css("background-color","#FF9494");
                    alert("Incorrect Email address format");
                    return false;
                    
				}
					if($("#email_id").val()=="" || $("#email_id").val()==null)
					{
						alert("Please enter your verification email!!!");
						return false;
					}
					
					else
					{
						var send_data={};
						send_data.email_id=$("#email_id").val();
						$.ajax({
							type:"POST",
							url:"searchUserDetail",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								//alert(data1); return false;
								if(data1==0)
								{
									$("#gratis_popup_code").removeClass('active');
									document.getElementById("gratis_popup_code").style.display='none';
									
									document.getElementById("gratis_popup_user").style.display='block';
									$("#gratis_popup_user").addClass('active');
									
								}
								else
								{
									
									window.location.href ="https://www.qloudid.com/user/index.php/UserSuppliers/userSuppliersShow";
								}
								
							}
						});
					}
					
				}
				else
					{
					alert("Please select code!!!");
					return false;
				}
				
					
			}
			





function updateTotal(id,id1)
{
	
	var newId=id+'_'+id1;
	$("#total_value").val(newId);
}

			function searchCompany()
			{
			var send_data={};
				
				send_data.id=$("#cid_number").val();
				$.ajax({
					type:"POST",
					url:"searchCompanyDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
							document.getElementById("gratis_popup_company_search").style.display='none';
							document.getElementById("gratis_popup_company_searched").style.display='block';
							$(".gratis_popup_company_searched").addClass('active');
							$("#searched_company").html('');
							$("#searched_company").append(data1);
						
											}
				});
			
			}
			
			function createCompanyPop()
			{
			
				
				
							document.getElementById("gratis_popup_company_search").style.display='none';
							document.getElementById("gratis_popup_company_searched").style.display='none';
							document.getElementById("gratis_popup_company").style.display='block';
							$(".gratis_popup_company").addClass('active');
							
						
						
			
			}
			
			function submit_unique()
			{
				if($("#unique_id").val()=="" || $("#unique_id").val()==null)
				{
					alert("Please enter your unique code!!!");
					return false;
				}
				document.getElementById("save_indexing_unique").submit();
			}
			function validateAddCompany()
			{
				var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
				
				
				if( $("#company_name_add").val() == "" )
				{
					$("#company_name_add").css("background-color","#FF9494");
					return false;
				}
				
				
				if( $("#company_website").val() == "" )
				{
					$("#company_website").css("background-color","#FF9494");
					return false;
				}
				if( $("#company_email").val() == "" )
				{
					$("#company_email").css("background-color","#FF9494");
					return false;
				}
				if (!reg.test($("#company_email").val())){
                    
                    $("#company_email").css("background-color","#FF9494");
                    alert("Incorrect Email address format");
                    return false;
                    
				}
				
				
				
				var inds  = $("#inds");
				
				if(inds.val()==0)
				{
					//alert("This company is already registered in database");
					$("#inds").css("background-color","#FF9494");
					return false;
					
				}
				
				var cntry  = $("#cntry");
				
				if(cntry.val()==0)
				{
					//alert("This company is already registered in database");
					$("#cntry").css("background-color","#FF9494");
					return false;
					
				}
				var websiteAddress =  $("#company_website").val();
				var companyEmail = $("#company_email").val();
				
				var web = companyEmail.split("@")[1];
				
				
				
				if(!websiteAddress.match(web))
				{
					alert("Email address does not match with Organization 's website URL");
					$("#company_email").css("background-color","#FF9494");
					return false;
				}
				
				var send_data={};
				
				send_data.web1='@'+web;
				$.ajax({
					type:"POST",
					url:"selectOrganizationWeb",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						if(data1 == 1)
						{
							alert("This Organization is already registered in database");
							return false;
						}
						else if(data1 == 0)
						{
							document.getElementById("save_indexing_company").submit();
						}
						else if(data1 == 2)
						{
							alert("Some error occurred, Please report to web admin !!!");
							return false;
						}
					}
				});
				// alert("error");
				/*	 $.get("CreateCompany/selectOrganizationWeb/'"+web+"'",function(data1,status){
					
					if(data1 == 1)
					{
					alert("This Organization is already registered in database");
					return false;
					}
					else if(data1 == 0)
					{
					document.getElementById("save_indexing").submit();
					}
					else if(data1 == 2)
					{
					alert("Some error occurred, Please report to web admin !!!");
					return false;
					}
					
					
					});
				*/
				
				//document.getElementById("save_indexing").submit();
			}
			
			var available_yes=0;
			function approveUser()
			{
				
				var user=0;
				var ids=$("#total_value").val().split('_');
				var send_data = {};
				send_data.user_id=user;
				send_data.a_id=ids[0];
				send_data.status=ids[1];
				//alert(send_data.a_id); return false;
				$.ajax({
					url: '../ShareMonitor/approveUserRequest',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data){
					
					
					if(data==1)
					{
						window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow";
					}
					else
					{
						alert("Failed !!!");
					}
					
				})
				.fail(function(){})
				.always(function(){});
				
			}
			
			function updateRequest(id,link)
			{
				var send_data = {};
				send_data.c_id=id;
				if($(link).hasClass('checked'))
				{
					send_data.updateR=0; 
				}
				else
				{ 
					send_data.updateR=1; 
				}
				$.ajax({
					url: '../Invitation/updateRequest',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data){
					
					
					
				})
				.fail(function(){})
				.always(function(){});
				
			}
		</script>
		
		<script>
			function removeActive()
			{
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function raActive()
			{
				
				$("#menulist-dropdown2").removeClass('active');
				$("#menulist-dropdown4").removeClass('active');
			}
			function rbActive()
			{
				
				$("#menulist-dropdown3").removeClass('active');
				$("#menulist-dropdown2").removeClass('active');
			}
			
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg">
		
		<!-- HEADER -->
	<?php include 'UserHeaderUpdated.php'; ?>
	<div class="clear"></div>
		
		
		<div class="column_m pos_rel">
			
			<!-- SUB-HEADER -->
			
			
			
			
			<!-- CONTENT -->
			<div class="column_m container zi5  mart40 xs-mart20" onclick="removeActive();">
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					<!-- Left sidebar -->
				<div class="wi_240p fleft pos_rel zi50">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" style="height: 381px;">
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03  brdr_new fsz14" id="scroll_menu" style="width: 220px; top: 0px;">
									<div class="column_m padb10 ">
										<div class="padl10">
											<div class="sidebar_prdt_bx marr20 brdb_b padb20">
												<div class="white_bg tall">
													
													<div class="padb0 fsz20">
														
														
														<a href="#" class="marr5 black_txt"><?php echo $row_summary['last_name']; ?></a>
														
														
														
													</div>
													
													<!-- Logo -->
													<div class="marb10 padr10"> <a href="#" class="blacka1_txt fsz40 xs-fsz30 sm-fsz30 
														bold"><?php echo $row_summary['first_name']; ?></a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
														<!-- Meta -->
														<div class="padr10 fsz15"> <span><?php date_default_timezone_set("Europe/Stockholm");   echo date("D F j, Y"); ?></span>  </div>
													</a></div>
											</div>
											
											<div class="clear"></div>
										</div>
									</div>
									
									
									
									
									
									
										<ul class="marr20 pad0">
									
									<li class=" dblock padb10 padl8">
											<a href="#" class="show_popup_modal lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" data-target="#gratis_popup_code">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn">Create request</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
										<li class=" dblock padb0 padl8">
											<a href="#" class="show_popup_modal  lgtgrey_bg hei_26p dflex alit_c pos_rel padrl10  brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" data-target="#gratis_popup">
												<span class="fa fa-address-card-o wi_20p dnone_pa"></span>
												<span class="valm trn" data-trn-key="You got invitation">You got invitation</span>
												<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg  rotate45"></div>
											</a>
										</li>
										
									</ul>
									
									<ul class="dblock mar0 padl10 fsz14">
										
										
										<!-- Company -->
										
											
											
												
											<li class="active dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Consent</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">One time</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												<li class="dblock padrb10">
													<a href="../ShareMonitor/shareMonitorShow" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Ongoing</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.qloudid.com/user/index.php/ConnectKin/connectAccount" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Next of kin</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="#" class="active hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Suppliers</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
											</ul>
											
										</li>
										
										
										<li class="dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Get started</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="https://www.qloudid.com/user/index.php/StoreData/userAccount" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Store/Update your data</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
												
												<li class="dblock padrb10">
													<a href="https://www.qloudid.com/user/index.php/BoughtProducts" class="hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a"> <span class="valm trn">Events</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												
											</ul>
											
										</li>
										
											<li class="dblock pos_rel padb10  brdclr_hgrey ">
											<h4 class="padb5 uppercase ff-sans black_txt trn">Later</h4>
											<ul class="marr20 pad0">
												
												<li class="dblock padrb10">
													<a href="#" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a show_popup_modal" data-target="#gratis_popup_company_search"> <span class="valm trn">Search</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
												
												<li class="dblock padrb10">
													<a href="https://www.qloudid.com/user/index.php/Invitation/invitationShow" class=" hei_26p dflex alit_c pos_rel padrl10 brdl brdwi_3 brdclr_hgrey brdclr_pblue2_h brdclr_pblue2_a pblue2_bg_h pblue2_bg_a black_txt white_txt_h black_txt_a" data-target="#gratis_popup_company_search"> <span class="valm trn">Edit</span>
														<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
													</a>
												</li>
											</ul>
											
										</li>
										
										
									</ul>
								</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_720p col-xs-12 col-sm-12 fleft pos_rel zi5   padl20 xs-padl0">
						
							<div class="padb20 xxs-padb0 ">
								<!-- Charts -->
								
								<div class="column_m container zi1 padb5">
							<div class="wrap maxwi_100 dflex alit_fe justc_sb col-xs-12 col-sm-12 pos_rel padb10 brdb_new">
								<div class="white_bg tall">
									
									
									
									
									<!-- Logo -->
									<h1 class="fsz25 bold">Alla förfrågningar & följare</h1>
									<!-- Logo -->
									<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">List of transfered connections (Qloud ID user request connection. After approval by Company in Qloud ID.)</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
									
									<div class="hidden-xs hidden-sm padrl10">
					<a href="#" class="diblock padrl20 brd brdrad3 lgtgrey_bg ws_now lgn_hight_29 fsz14 black_txt">
						<img src="../../../html/usercontent/images/icons/gift.png" width="20" height="20" class="marr5 valm">
						<span class="valm">Skapa din egen</span>
					</a>
				</div>
								
							</div>
						</div>
							
								
								
								<div class="column_m container tab-header  mart0 talc dark_grey_txt">
									<ul class="tab-header tab-header-custom tab-header-custom5 xs-dnone lgtgrey2_bg">
									
									<li>
											<a href="#" class="dblock brdradt5 active" data-id="tab_total">
												<span class="count black_txt"><?php echo $requestApprovedCount['num']; ?></span>
												<span class="black_txt fsz16">Connected </span>
											</a>
										</li>
									
										
										<li>
											<a href="#" class="dblock brdradt5 " data-id="tab_total1">
												<span class="count black_txt"><?php echo $requestPendingCount['num']; ?></span>
												<span class="black_txt fsz16">Sent </span>
											</a>
										</li>
										
										
										<li>
											<a href="#" class="dblock brdradt5 " data-id="tab_total3">
												<span class="count black_txt"><?php echo $requestRejectedCount['num']; ?></span>
												<span class="black_txt fsz16">Rejected </span>
											</a>
										</li>
										<div class="clear"></div>
									</ul>
									<select class="tab-header wi_200p maxwi_100 dnone xs-dblock hei_70p pad0 nobrd brdb xs-fsz30 panlyellow_bg">
										<option value="tab_total" selected class="xs-fsz20"><?php echo $requestApprovedCount['num']; ?></option>
										<option value="tab_total1" class="xs-fsz20">Sent</option>
									<option value="tab_total3" class="xs-fsz20">Rejected</option>
									</select>
									<div class="clear"></div>
								</div>
								
								<div class="column_m container   fsz14 dark_grey_txt">
									
									<!-- Summary -->
									<div class="tab-content padt5" id="tab_total3">
										
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable3">
										
											<thead class="fsz14" style="color: #c6c8ca;">
												<tr class="lgtgrey2_bg">
													
													<th class="pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5 black_txt">Supplier</div>
													</th>
													
													<th class="pad5 brdb_new nobold  tall hidden-xs" style="color:#c6c8ca;">
														Created Date
													</th>
													<th class="pad5 brdb_new nobold  tall hidden-xs" style="color:#c6c8ca;">
														
													</th>
													
												</tr>
												
											</thead>
											<tbody id="myRequest3">
												<?php $i=0;
													
													foreach($requestRejectedDetail as $category => $value) 
													{
														
													?> 
													
													<tr class="fsz16">
														
														<td class="pad5 brdb_new tall cn">
															<div class="padtb5 " ><?php echo html_entity_decode($value['company_name']); ?></div>
														</td>
														
														<td class="pad5 brdb_new hidden-xs tall cd">
															<div class="padtb5 "><?php echo date('Y-m-d', strtotime($value['created_on'])); ?></div>
														</td>
														
														
													</tr>
												<?php } ?>
											</tbody>
											
										</table>
										<div class="padt20 padb10 talc ">
											<a href="javascript:void(0);" class="load_more_results blue_txt fsz16 marrl5"  value="1" onclick="add_more_rejected(this);">More Suppliers</a>
											
										</div>
									<script>
										function add_more_rejected(link) {
											//var $tbody = $("#rejected");
											//alert($tbody.html); return false;
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"moreRequestRejectedDetail",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#myRequest3"),
													html=html1;
													//$tbody.html('');
													$tbody
													.append($(html))
													.find('input.check')
													.iCheck({
														checkboxClass: 'icheckbox_minimal-aero',
														radioClass: 'iradio_minimal-aero',
														increaseArea: '20%'
													});
												}
											});
											
											return false;
										}
									</script>
									
									</div>
									
									<div class="tab-content padb25 padt5 active" id="tab_total" style="display: block;">
										
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable">
											
											<thead class="fsz14" style="color: #c6c8ca;">
												<tr class="lgtgrey2_bg">
												
													<th class="wi_300p pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5 black_txt">Supplier</div>
													</th>
													
													<th class="pad5 brdb_new nobold  tall " style="color:#c6c8ca;">
														Created Date
													</th>
													
													<th class="pad5 brdb_new nobold hidden-xs talr" style="color:#c6c8ca;">
														<div class="padtb5"><a href="#" class="show_popup_modal" data-target="#gratis_popup_company_search" >+Add </a></div>
													</th>
													
												</tr>
												
											</thead>
											<tbody  id="allRequest">
												<?php 
												echo $rowUserApproved;  ?>
											</tbody>
											
										</table>
										<div class="padt20 padb10 talc ">
											<a href="javascript:void(0);" class="load_more_results blue_txt fsz16 marrl5" value="1" onclick="add_more_all(this);">More Suppliers</a>
											
										</div>
									
									</div>
									<script>
										function add_more_all(link) {
											//var $tbody = $("#rejected");
											//alert($tbody.html); return false;
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"moreApprovedUser",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#allRequest"),
													html=html1;
													//$tbody.html('');
													$tbody
													.append($(html))
													.find('input.check')
													.iCheck({
														checkboxClass: 'icheckbox_minimal-aero',
														radioClass: 'iradio_minimal-aero',
														increaseArea: '20%'
													});
												}
											});
											
											return false;
										}
									</script>
									
									<div class="tab-content padt5" id="tab_total1">
										
										<table class="wi_100" cellpadding="0" cellspacing="0" id="mytable0">
										
											<thead class="fsz14" style="color: #c6c8ca;">
												<tr class="lgtgrey2_bg">
													<!--<th class="pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5"><input type="checkbox" name="check_all" class="check_all" /></div>
													</th>-->
													<th class="wi_300p  pad5 brdb_new nobold  tall" style="color:#c6c8ca;">
														<div class="padtb5 black_txt">Supplier</div>
													</th>
													
													<th class="pad5 brdb_new nobold  tall hidden-xs" style="color:#c6c8ca;">
													Created Date	
													</th>
													<th class="pad5 brdb_new nobold hidden-xs talr" style="color:#c6c8ca;">
														<div class="padtb5"><a href="#" class="show_popup_modal" data-target="#gratis_popup_company_search" >+Add </a></div>
													</th>
													
												</tr>
												
											</thead>
											<tbody id="myRequest">
												<?php $i=0;
													
													foreach($requestPendingDetail as $category => $value) 
													{
														
													?> 
													
													<tr class="fsz16">
														
														<td class="pad5 brdb_new tall cn">
															<div class="padtb5 " ><?php echo html_entity_decode($value['company_name']); ?></div>
														</td>
														
														<td class="pad5 brdb_new hidden-xs tall cd">
															<div class="padtb5 "><?php echo date('Y-m-d', strtotime($value['created_on'])); ?></div>
														</td>
														<td class="pad5 brdb_new tall sts">
															<div class="padtb5">Pending</div>
														</td>
														
													</tr>
												<?php } ?>
											</tbody>
											
										</table>
										<div class="padt20 padb10 talc ">
											<a href="javascript:void(0);" class="load_more_results blue_txt fsz16 marrl5" value="1" onclick="add_more_my(this);">More Suppliers</a>
											
										</div>
										
										
										
									</div>
									<script>
										function add_more_my(link) {
											//var $tbody = $("#rejected");
											//alert($tbody.html); return false;
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"moreRequestDetail",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#myRequest"),
													html=html1;
													//alert(data1); 
													$tbody
													.append($(html))
													.find('input.check')
													.iCheck({
														checkboxClass: 'icheckbox_minimal-aero',
														radioClass: 'iradio_minimal-aero',
														increaseArea: '20%'
													});
												}
											});
											
											return false;
										}
										
										function add_more_customer(link) {
											//var $tbody = $("#rejected");
											//alert($tbody.html); return false;
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											//send_data.message=id;
											$.ajax({
												type:"POST",
												url:"moreRequestDetailCustomer",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#myCustomer"),
													html=html1;
													//alert(data1); 
													$tbody
													.append($(html))
													.find('input.check')
													.iCheck({
														checkboxClass: 'icheckbox_minimal-aero',
														radioClass: 'iradio_minimal-aero',
														increaseArea: '20%'
													});
												}
											});
											
											return false;
										}
										</script>
									
								</div>
								
								<div class="clear"></div>
							</div>
							
							<div class="clear"></div>
						</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="wi_100 hidden-md hidden-lg  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">
				
				<!-- primary menu -->
				<div class="tab-content active" id="mob-primary-menu" style="display: block;">
					<div class="wi_100 dflex alit_s justc_sb talc fsz16 xxs-fsz12">
						<a href="https://www.qloudid.com/user/index.php/PersonalRequests/sentRequests" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-clock-o"></span></div>
							<span>One time</span>
						</a>
						<a href="#" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-file-text-o"></span></div>
							<span>Ongoing</span>
						</a>
						<div class="tab-header">
							<a href="#" class="dark_grey_txt dblue_txt_h" data-id="mob-add-menu">
								<div class="wi_80p xxs-wi_50p hei_80p xxs-hei_50p pos_rel mart-30 xxs-mart-20 brd lgtgrey_bg brdrad100 talc lgn_hight_40 fsz32">
									<span class="wi_30p xxs-wi_25p hei_4p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
									<span class="wi_4p hei_30p xxs-hei_25p dblock pos_abs pos_cen brdrad10 blue_bg"></span>
								</div>
							</a>
						</div>
						<a href="https://www.qloudid.com/user/index.php/ConnectKin/connectAccount" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_40 xxs-lgn_hight_28 fsz32 xxs-fsz24"><span class="fa fa-image"></span></div>
							<span>Next of kin</span>
						</a>
						<a href="https://www.qloudid.com/user/index.php/StoreData/userAccount" class="padtb5 dark_grey_txt dblue_txt_h">
							<div class="hei_40p xxs-hei_30p talc lgn_hight_26 xxs-lgn_hight_20 fsz32 xxs-fsz24">
								<span class="fa fa-file-text-o"></span>
							</div>
							<span>Your data</span>
						</a>
					</div>
				</div>
				
				<!-- add  menu -->
				<div class="tab-content padb10" id="mob-add-menu">
					<h2 class="martb15 pad0 talc bold fsz16">Add New</h2>
					<ul class="mar0 pad0 brdrad3 white_bg fsz14">
						<li class="dblock mar0 padrl15 brdb">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup_code">
								<span class="fa fa-calendar-o wi_20p marr10 talc fsz18"></span>
								Create request
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb">
							<a href="#" class="show_popup_modal wi_100 minhei_50p dflex alit_c dark_grey_txt" data-target="#gratis_popup">
								<span class="fa fa-dollar wi_20p marr10 talc fsz18"></span>
								You got an invitation
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb">
							<a href="https://www.qloudid.com/user/index.php/InformRelatives" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
								<span class="fa fa-sticky-note wi_20p marr10 talc fsz18"></span>
								Inform relatives
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb">
							<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
								<span class="fa fa-user wi_20p marr10 talc fsz18"></span>
								Company
							</a>
						</li>
						<li class="dblock mar0 padrl15 brdb">
							<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
								<span class="fa fa-image wi_20p marr10 talc fsz18"></span>
								Photo
							</a>
						</li>
						<li class="dblock mar0 padrl15">
							<a href="#" class="wi_100 minhei_50p dflex alit_c dark_grey_txt">
								<span class="fa fa-microphone wi_20p marr10 talc fsz18"></span>
								Audio Note
							</a>
						</li>
					</ul>
					<div class="tab-header mart10 brdrad3 white_bg talc lgn_hight_50 fsz18">
						<a href="#" class="" data-id="mob-primary-menu">Cancel</a>
					</div>
				</div>
			</div>
			
		<div class="clear"></div>
		<div class="hei_80p"></div>
		
		
		<!-- Edit news popup -->
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb brdwi_10 brdclr_dblue white_bg fsz14 brdrad10" id="gratis_popup">
			<div class="modal-content pad25 brd nobrdb talc brdrad10">
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Premiuminnehåll</h3>
					<div class="marb20">
						<img src="../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						<!--<div class="wi_50 marb10">
							<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Läsa nyheter och  följa trender </span>
						</div>-->
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					
					<div class="marb10">
						<input type="text" id="unique_id" name="unique_id" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz16" placeholder="Add the code">
					</div>
					<div>
						<input type="button" value="Prova gratis" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp" onclick="submit_unique();">
						<input type="hidden" id="indexing_save_unique" name="indexing_save_unique">
					</div>
					
					
				</form>
			</div>
		</div>
		
		
		
		<!-- Sales popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="sales_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="wi_100 dtable marb30 brdt brdl brdclr_white">
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-toggler wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
					</div>
					<div class="marb25">
					<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
					<div>
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
					</div>
				</form>
			</div>
		</div>
		
		
		<!-- Marketing popup -->
		<div class="popup_modal wi_600p maxwi_90 pos_fix pos_cen zi50 bs_bb brdb_new brdwi_10 brdclr_dblue white_bg fsz14 " id="marketing_popup">
			<div class="modal-content pad25 brd nobrdb_new talc">
				<form>
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Artikeln är en del av vårt premiuminnehåll</h3>
					<div class="setter-base wi_100 dtable marb30 brdt brdl brdclr_white">
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
						<div class="dtrow">
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
							<a href="#" class="class-setter wi_33 hei_100p dtcell brdr brdb_new brdclr_white lgtgrey2_bg valm talc" data-classes="active" data-closest=".setter-base"> <span class="dblock marb10 talc">Projects</span> <span class="wi_60p hei_60p dblock dnone_pa marrla brdrad50 green_bg talc uppercase lgn_hight_60 white_txt">HR</span> <span class="wi_60p hei_60p dnone dblock_pa marrla brdrad50 red_bg talc uppercase lgn_hight_60 white_txt">HR</span> </a>
						</div>
					</div>
					<div class="marb25">
					<input type="text" class="wi_320p maxwi_100 hei_38p diblock brd brdrad2 talc fsz18" placeholder="Skriv in din e-postadress" /> </div>
					<div>
						<button type="submit" class="wi_320p maxwi_100 hei_50p diblock nobrd brdrad50 blue_bg dblue_bg_h fsz18 white_txt curp">Prova gratis</button>
					</div>
				</form>
			</div>
		</div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brd brdrad5" id="gratis_popup_approve"">
		<div class="modal-content pad25 brd brdrad10">
			<div id="searched"><div class="padb10 ">
			<h1 class="padb5 talc fsz50">Verifiera</h1>
						<p class="pad0 talc fsz18 padb20 brdb wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla xs-marb15">Signera dina ändrade uppgifter</p>
					</div>
					
					<!-- Center content -->
					<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla pad10 lgtgrey2_bg brdrad3">
						<div class="pad15 brdrad3 white_bg">
							<h2 class="marb15 fsz20 bold talc">
								
								<a href="#" class="opa90 opa1_h padrl5 fsz16 txt_9d"><span class="fa fa-question-circle"></span></a>
							</h2>
							
							
							
							
							
							<div class="mart15" id="search_data">
								<div class="result-item padtb20 brdb">
										<div class="dflex alit_c">
											<div class="flex_1">
												
												<div class="fsz16 dgrey_txt bold">
													<span class="marr5 valm">General</span>
													<span class="wi_10p hei_10p diblock marr5 brdrad10 bg_e18f00 valm" title="Confidence score: 53%"></span>
													<a href="#" class="txt_ca" title="Verify"><span class="fa fa-check"></span></a>
												</div>
											</div>
											<div class="fxshrink_0 dflex alit_c">
												<a href="#" class="wi_36p hei_36p diblock brd brdrad100 bg_fb talc lgn_hight_34 fsz14 white_txt" title="Save the lead"><span class="fa fa-minus"></span></a>
												<div class="wi_100p talr">
													<a href="#" class="expander-toggler grey_txt" data-base=".result-item" data-target=".sources-content">
														<span>1</span>
														<span class="fa fa-caret-up dnone diblock_pa"></span>
														<span class="fa fa-caret-down dnone_pa"></span>
													</a>
												</div>
											</div>
										</div>
										<div class="sources-content dnone" style="display: none;">
											<ul class="mar0 pad0 padt10 fsz14">
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Social Security Number</a>
													</div>
													<span class="fxshrink_0 marl10">-</span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Name</a>
													</div>
													<span class="fxshrink_0 marl10">-</span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Last name</a>
													</div>
													<span class="fxshrink_0 marl10">-</span>
												</li>
												<li class="dflex mart10 brdb padb5">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Date of birth</a>
													</div>
													<span class="fxshrink_0 marl10">-</span>
												</li>
												<li class="dflex mart10">
													<div class="wi_50 ovfl_hid ws_now txtovfl_el">
														<a href="#">Sex</a>
													</div>
													<span class="fxshrink_0 marl10">-</span>
												</li>
											</ul>
										</div>
									</div>  
								
									
								
							</div>
							
						</div>
						
					</div>
					<form method="POST" action="updateAccount" id="save_indexing_user" name="save_indexing_user">
						<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart30"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="approveUser();">Signera med Mobilt BankId</a> 
							<input type="hidden" id="total_value" name="total_value" value="">
						</div>
					</form></div>
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_code">
			<div class="modal-content pad25  nobrdb talc brdrad5 ">
				
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Premiuminnehåll</h3>
					<div class="marb20">
						<img src="../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					
					<div class="mart0 pad15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class="wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
			<select name="reque" id= "reque" class="txtind25 default_view wi_100 mart5 rbrdr pad10  white_bg hei_40p black_txt" onchange="selectCode(this.value);">
					
					<option value="0">--Select--</option>
							<option value="1">Mobile</option>
							<option value="2">Email</option>
							<option value="3">Code</option>
					
					
						</select>
					</div>
					</div>
					<div id="codeSelect" style="display:none">
						<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							
							<input type="text" id="code_id" name="code_id" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Enter Code">
						</div>
					</div>
					</div>
					<div id="emailSelect" style="display:none">
						<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							<input type="text" id="email_id" name="email_id" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Enter Email">
						</div>
					</div>
					</div>
					
					<div id="phoneSelect" style="display:none">
					<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							
							<select id="cntryph" name="cntryph" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" >
							<option value="0">--Select country--</option>
						<?php  foreach($resultContry as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['country_name'] .'">'. $value['country_name'] .'</option>';
							}
						?>
						</select>
						</div>
						
					</div>
						<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							<input type="number" id="phoneno" name="phoneno" max="9999999999" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Enter phone">
						</div>
					</div>
					</div>
					
					<div class="mart20">
						<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchUser();">
						
					</div>
					
					
				
			</div>
		</div>
	
	
	<!--<div class="popup_modal wi_430p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14" id="gratis_popup_company_search">
		<div class="modal-content pad25 brd">
			<div id="search_new">
			<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
				Search Company
				<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
			</h3>
			
				
				<div class="marb15 "  >
					<label for="new-organization-name" class="sr-only">Company Identification Number</label>
					<input type="text" id="cid_number" name="cid_number" class="wi_100 mart5 padtb10 padrl0 nobrd brdb_new brdclr_dblue_f font_helvetica" placeholder="Company Identification Number">
				</div>
				
				
				
				<div class="mart30 talr">
					<button type="button" class="close_popup_modal marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_0 curp">Cancel</button>
					<input type="button" value="Submit" class="marl5 pad8 nobrd trans_bg uppercase bold fsz14 txt_3367d6 curp" onclick="searchCompany();" />
					
				</div>
			
		</div>
		
		</div>
	</div>-->
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_company_searched" id="gratis_popup_company_searched">
		<div class="modal-content pad25 brd">
		<h3 class=" padb15 uppercase fsz16 dark_grey_txt talc">Result</h3>
					<div class="marb20">
						<img src="../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb5 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb10 tall">
						
						
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
			<div id="searched_company">
			
			
		</div>
		
		</div>
	</div>
	
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5 gratis_popup_company" id="gratis_popup_company">
			<div class="modal-content pad25 brd nobrdb talc brdrad5">
				
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Add Company</h3>
					<div class="marb20">
						<img src="../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						<!--<div class="wi_50 marb10">
							<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Läsa nyheter och  följa trender </span>
						</div>-->
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
					<div class="pad15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="text" id="company_name_add" name="company_name_add" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company name">
					</div>
					</div>
					
					<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							
							<input type="text" id="company_website" name="company_website" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company website">
						</div>
					</div>
					
					
					<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							
							<input type="text" id="company_email" name="company_email"  class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company email">
						</div>
					</div>
					
					<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							
							<select id="inds" name="inds" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" >
							<option value="0">--Select industry--</option>
						<?php  foreach($resultIndus as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
							}
						?>
						</select>
						</div>
					</div>
					
					<div class="padrbl15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
							
							<select id="cntry" name="cntry" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" >
							<option value="0">--Select country--</option>
						<?php  foreach($resultContry as $category => $value) 
							{
								$category = htmlspecialchars($category); 
								echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
							}
						?>
						</select>
						</div>
						
					</div>
					</form>
					<div class="mart20">
						<input type="button" value="Add company" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="validateAddCompany();" />
						<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
						
					</div>
					
					
					
				
			</div>
		</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search">
			<div class="modal-content pad25 brd nobrdb talc brdrad5">
				
					<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Search Company</h3>
					<div class="marb20">
						<img src="../../../html/usercontent/images/gratis.png" class="maxwi_100 hei_auto">
					</div>
					<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
					<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						<!--<div class="wi_50 marb10">
							<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
							<span class="valm">Läsa nyheter och  följa trender </span>
						</div>-->
						
						<div class="wi_100 marb10 talc">
							
							<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
						</div>
						
						
					</div>
					
					<div class="pad15 lgtgrey2_bg">
			
			<div class="pos_rel padrl10">
			<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
					<input type="text" id="cid_number" name="cid_number" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
					</div>
					</div>
					<div class="mart20">
						<input type="button" value="Search" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompany();">
						
						
					</div>
					
					
					
				
			</div>
		</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_company_searched">
		<div class="modal-content pad25 brd brdrad10">
			<div id="searched">
				
				
			</div>
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_user">
			<div class="modal-content pad25 brd brdrad10">
				<div id="search_user">
					<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
						No result found
						<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
					</h3>
					
					
					
					
					
					
				</div>
				
			</div>
		</div>
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		
		// Charts
		google.charts.load('current', { 'packages': ['corechart'] });
		
		
		// Line Chart
		google.charts.setOnLoadCallback(drawLineChartInhouse);
		function drawLineChartInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartStaffing);
		function drawLineChartStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartRecruiting);
		function drawLineChartRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawLineChartBackgroundChecks);
		function drawLineChartBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Day', 'Upcoming', 'Incoming'],
			['MON', 100, 60],
			['TUE', 90, 60],
			['WED', 105, 50],
			['THU', 115, 45],
			['FRI', 110, 50],
			['SAT', 112, 52],
			['SUN', 200, 48]
			]);
			
			var options = {
				curveType: 'function',
				chartArea : {
					width: '100%',
					height: 160,
					top: 20,
				},
				pointSize: 5,
				colors: ['#3691c0', '#ba03d9']
			};
			
			var chart = new google.visualization.LineChart(document.getElementById('line-chart-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// Donut Chart
		// - yearly
		google.charts.setOnLoadCallback(drawDonutChartYearlyInhouse);
		function drawDonutChartYearlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyStaffing);
		function drawDonutChartYearlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyRecruiting);
		function drawDonutChartYearlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartYearlyBackgroundChecks);
		function drawDonutChartYearlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 38],
			['other', 22],
			['23-30 y.o.', 26],
			['18-22 y.o.', 14]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-yearly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - monthly
		google.charts.setOnLoadCallback(drawDonutChartMonthlyInhouse);
		function drawDonutChartMonthlyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyStaffing);
		function drawDonutChartMonthlyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyRecruiting);
		function drawDonutChartMonthlyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartMonthlyBackgroundChecks);
		function drawDonutChartMonthlyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 48],
			['other', 12],
			['23-30 y.o.', 16],
			['18-22 y.o.', 24]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-monthly-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		// - daily
		google.charts.setOnLoadCallback(drawDonutChartDailyInhouse);
		function drawDonutChartDailyInhouse() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Inhouse'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyStaffing);
		function drawDonutChartDailyStaffing() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Staffing'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyRecruiting);
		function drawDonutChartDailyRecruiting() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-Recruiting'));
			chart.draw(data, options);
		}
		
		google.charts.setOnLoadCallback(drawDonutChartDailyBackgroundChecks);
		function drawDonutChartDailyBackgroundChecks() {
			var data = google.visualization.arrayToDataTable([
			['Age range', 'Attendance'],
			['< 18 y.o.', 53],
			['other', 16],
			['23-30 y.o.', 21],
			['18-22 y.o.', 10]
			
			]);
			
			var options = {
				pieHole: 0.8,
				chartArea : {
					width: 320,
					height: 150,
					top: 20,
				},
				pieStartAngle : -90,
				legend: {
					position: 'right',
					alignment: 'center',
					textStyle: {
						fontSize: 13,
						color: '#c6c8ca',
					}
				},
				pieSliceText : 'none',
				colors: ['#ba03d9', '#f7f7f7', '#85db18', '#3691c0']
			};
			
			var chart = new google.visualization.PieChart(document.getElementById('donut-chart-daily-BackgroundChecks'));
			chart.draw(data, options);
		}
		
		
		tinyMCE.init({
			selector: '.texteditor',
			plugins: ["advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker", "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking", "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"],
			toolbar1: "bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist ",
			//toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
			//toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
			menubar: false,
			toolbar_items_size: 'small',
			style_formats: [
			{
				title: 'Bold text',
				inline: 'b'
			},
			{
				title: 'Red text',
				inline: 'span',
				styles:
				{
					color: '#ff0000'
				}
			},
			{
				title: 'Red header',
				block: 'h1',
				styles:
				{
					color: '#ff0000'
				}
			},
			{
				title: 'Example 1',
				inline: 'span',
				classes: 'example1'
			},
			{
				title: 'Example 2',
				inline: 'span',
				classes: 'example2'
			},
			{
				title: 'Table styles'
			},
			{
				title: 'Table row 1',
				selector: 'tr',
				classes: 'tablerow1'
			}],
			templates: [
			{
				title: 'Test template 1',
				content: 'Test 1'
			},
			{
				title: 'Test template 2',
				content: 'Test 2'
			}]
		});
	</script>
	
	<script>
			
			/*function searchCompany()
			{
				var send_data={};
				
				send_data.id=$("#cid_number").val();
				$.ajax({
					type:"POST",
					url:"searchCompanyDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched").html('');
						$("#searched").append(data1);
						
					}
				});
				
			}*/
			
			function selectCode(id)
			{
				
				
				if(id==3)
				{
			document.getElementById("phoneSelect").style.display='none';
					document.getElementById("codeSelect").style.display='block';
					document.getElementById("emailSelect").style.display='none';
				}
				else if(id==2)
				{
			document.getElementById("phoneSelect").style.display='none';
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='block';
				}
				else
					{
					document.getElementById("codeSelect").style.display='none';
					document.getElementById("emailSelect").style.display='none';
					document.getElementById("phoneSelect").style.display='block';
				}
				
			}
			
			function checkRequest()
			{
				if($("#request_id").val()==0)
				{
					alert("Please select request type!!!");
					return false;
				}
				document.getElementById("save_request_company").submit();
			}
		</script>

</body>

</html>