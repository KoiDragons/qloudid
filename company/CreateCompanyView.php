
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercss/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercss/css/styleget.css">
		<!--<link href="<?php echo $path; ?>html/usercss/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" media="all">-->
		<title>Qmatchup</title>
		<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/jquery.js"></script>
		<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
		<script>
			function validateAddCompany()
			{
			$("#errorMsg").html('');
				var reg = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/
				// var currency=$("#currency");
				var o_type=$("#o_type");
				
				if(o_type.val()==0)
				{
					//alert("This company is already registered in database");
					$("#o_type").css("background-color","#FF9494");
					return false;
					
				}
				if( $("#categry").val() == "" || "0" == $("#categry").val() )
				{
					//alert( $("#categry").val() );
					$("#categry").css("background-color","#FF9494");
					return false;
				}
				/* if( currency.val() == "" || "0" == currency.val() )
					{
					$("#currency").css("background-color","#FF9494");
					return false;
				}*/
				if( $("#company_name_add").val() == "" )
				{
					$("#company_name_add").css("background-color","#FF9494");
					return false;
				}
				var cntry  = $("#cntry");
				var state  = $("#state");
				var city  = $("#city");
				//var phone  = $("#p_number");
				//	var open  = $("#open");
				//	var close  = $("#close");
				if(cntry.val()==0)
				{
					//alert("This company is already registered in database");
					$("#cntry").css("background-color","#FF9494");
					return false;
					
				}
				//alert(cntry.val());
				
				if(cntry.val()==201)
				{
					
					$.ajax({
						type:"POST",
						url:"CreateCompany/checkVerified",
						
						dataType:"text",
						contentType: "application/x-www-form-urlencoded;charset=utf-8",
						success: function(data1){
							//alert(data1); return false;
							if(data1 == 0)
							{
								$("#errorMsg").html("You are not authorized to create this company");
								return false;
							}
							else
							{
								if(state.val()==0)
								{
									$("#state").css("background-color","#FF9494");
									return false;
									
								}
								
								if(city.val()==0)
								{
									$("#city").css("background-color","#FF9494");
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
									$("#errorMsg").html("Incorrect Email address format");
									return false;
									
								}
								
								
								
								
								var websiteAddress =  $("#company_website").val();
								var companyEmail = $("#company_email").val();
								
								var web = companyEmail.split("@")[1];
								
								
								
								if(!websiteAddress.match(web))
								{
									$("#errorMsg").html("Email address does not match with Organization 's website URL");
									$("#company_email").css("background-color","#FF9494");
									return false;
								}
								
								var send_data={};
								
								send_data.web1='@'+web;
								$.ajax({
									type:"POST",
									url:"CreateCompany/selectOrganizationWeb",
									data:send_data,
									dataType:"text",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									success: function(data1){
										//alert(data1); return false;
										if(data1 == 1)
										{
											$("#errorMsg").html("This Organization is already registered in database");
											return false;
										}
										else if(data1 == 0)
										{
											document.getElementById("save_indexing").submit();
										}
										else if(data1 == 2)
										{
											$("#errorMsg").html("Some error occurred, Please report to web admin !!!");
											return false;
										}
									}
								});
							}
						}
					});
				}
				
				else
				{	
				if(state.val()==0)
				{
					$("#state").css("background-color","#FF9494");
					return false;
					
				}
				
				if(city.val()==0)
				{
					$("#city").css("background-color","#FF9494");
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
                    $("#errorMsg").html("Incorrect Email address format");
                    return false;
                    
				}
				
				
				
				
				var websiteAddress =  $("#company_website").val();
				var companyEmail = $("#company_email").val();
				
				var web = companyEmail.split("@")[1];
				
				
				
				if(!websiteAddress.match(web))
				{
					$("#errorMsg").html("Email address does not match with Organization 's website URL");
					$("#company_email").css("background-color","#FF9494");
					return false;
				}
				
				var send_data={};
				
				send_data.web1='@'+web;
				$.ajax({
					type:"POST",
					url:"CreateCompany/selectOrganizationWeb",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						if(data1 == 1)
						{
							$("#errorMsg").html("This Organization is already registered in database");
							return false;
						}
						else if(data1 == 0)
						{
							document.getElementById("save_indexing").submit();
						}
						else if(data1 == 2)
						{
							$("#errorMsg").html("Some error occurred, Please report to web admin !!!");
							return false;
						}
					}
				});
				
				}
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
			
			function state_select(id)
			{
				// sending ajax request to fetch families
				$.get("CreateCompany/selectState/"+id,function(data1,status){
					
					if(data1)
					{
						// appanding data to family id element
						document.getElementById("state").innerHTML = data1;
					}
					else
					{
						// if ajax reques is not successfull
						alert("Some error occurred, Please report to web admin !!!");
						return false;
					}
					
					
				});
			}
			function city_select(id)
			{
				// sending ajax request to fetch classes
				$.get("CreateCompany/selectCity/"+id,function(data1,status){
					
					if(data1)
					{
						// appanding data to class id element
						document.getElementById("city").innerHTML = data1;
					}
					else
					{
						// if ajax reques is not successfull
						alert("Some error occurred, Please report to web admin !!!");
						return false;
					}
					
					
				});
			}
			
			function district_select(id)
			{
				// sending ajax request to fetch classes
				$.get("CreateCompany/selectDistrict/"+id,function(data1,status){
					
					if(data1)
					{
						// appanding data to class id element
						document.getElementById("district").innerHTML = data1;
					}
					else
					{
						// if ajax reques is not successfull
						alert("Some error occurred, Please report to web admin !!!");
						return false;
					}
					
					
				});
			}
			
			
		</script>
	</head>
	<body>
		
		<div class="column_m header blue_bg">
			<div class="wrap">
				<div class="logo padt10">
					<h1 style="float:left;">Organization  registration</h1>
				</div>
				<div class="top-links">
					<ul>
						<li>
							<a class="login" href="#">Help</a>
						</li>
						<li>
							<a class="sign-up" href="#">Close</a>
						</li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		
		<div class="column_m container">
			<div class="wrap">
				<div class="homepage_searchform_tabs column_m prdt_tabs">
					<div class="column_m">
						<ul class="tabs sf-menu">
							<li><a href="#Web">Register</a></li>
							<li><a href="#Images">Unlock apps</a></li>
							<li><a href="#Shopping">Publish</a></li>
						</ul>
						
						
						<div class="column_m container">
							<div class="wrap white_bg font_opnsns">
								<div class="pad20">
									<div class="twth_clmn">
										<div class="padr30">
											<h2 class="fsz28 bold cyanblue_txt padb5">Register your Organization !</h2>
											<p class="fsz14 padb30">You're just 1 step away from expanding your business.</p>
											
											<div class="clear"></div>
											<div class="padb30">
												<h2 class="green_txt fsz16 padb20">Why you should register your Organization </h2>
												<div class="fleft marr20 padl20"><img class="marb20" src="<?php echo $path; ?>html/usercss/images/registration_icon_set.png" width="71" height="279" alt="." title="."></div>
												<div>
													<h3 class="cyanblue_txt padb5 bold">Complete ONE Job Form</h3>
													<p class="padb30">Don't waste time looking for vendors all over the internet. Describe your project ONE time, in one Job form, with no Fees. Once submitted we will get to work looking for talents that are a good fit based on your requirements and budget.</p>
													<h3 class="cyanblue_txt padtb5 bold">Receive Bids</h3>
													<p class="padb30">Once we find your matches we will invite them to bid on your project. You will receive bids from all fitted Contractors that are interested to deliver on your project.</p>
													<h3 class="cyanblue_txt padtb5 bold">Match Up</h3>
													<p class="pad0">All bids will be presented to you in our proposal dashboard. You can easily make vertical searches based on the criterias important to you, and decide which contractor to work with. After the selection process we reveal your ID to the contractor.</p>
												</div>
												<div class="clear"></div>
											</div>
											<div class="clear"></div>
											<div class="padb30">
												
												<div class="clear"></div>
											</div>
											
										</div>
									</div>
									<div class="onth_clmn">
										<div class="column_m">
											<div class="blue_bg_brdr_bx signup_bx">
												<div class="pad15">
													<div class="column_m font_opnsns">
														<h2 class="fsz22 cyanblue_txt bold padb5">Tell us about your Organization </h2>
														<p class="fsz14">And explore the magic with Qmatchup</p>
														
														<form action="CreateCompany/createCompanyAccount" method="POST" name="save_indexing" id="save_indexing" >
															
															<div class="column_m ">
																<select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;" name="o_type" id="o_type"  >
																	<option value="0" >-- Select Organization Type --</option>
																	<?php  foreach($resultOrg as $category => $value) 
																		{
																			$category = htmlspecialchars($category); 
																			echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
																		}
																	?>
																</select>
															</div>
															<div class="column_m padt10">
																<input type="text" name="company_name_add" id="company_name_add" class="text_field" placeholder="Organization  name" />
															</div>
															<div class="column_m padt10">
																<input type="text" name="company_website" id="company_website" class="text_field" placeholder="Website" />
															</div>
															<div class="column_m padt10">
																<input type="text"  name="company_email" id="company_email" class="text_field" placeholder="Your work email" />
															</div>
															<div class="column_m padt10">
																<select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;" name="inds" id="inds" >
																	<option value="0" >-- Select Industry --</option>
																	<?php  foreach($resultIndus as $category => $value) 
																		{
																			$category = htmlspecialchars($category); 
																			echo '<option value="'. $value['id'] .'">'. $value['name'] .'</option>';
																		}
																	?>
																	
																	
																	
																</select>
															</div>
															<!--<div class="column_m padt10">
																<select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;" name="currency" id="currency" >
																<option value="0">-- Select Currency--</option>
																<?php  foreach($resultCurr as $category => $value) 
																	{
																		$category = htmlspecialchars($category); 
																		echo '<option value="'. $value['id'] .'">'. $value['val'] .'</option>';
																	}
																?>
																</select>
															</div>-->
															<div class="column_m padt10">
																<select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;" name="cntry" id="cntry" onchange="state_select(this.value);" >
																	<option value="0" >-- Select Country --</option>
																	<?php  foreach($resultContry as $category => $value) 
																		{
																			$category = htmlspecialchars($category); 
																			echo '<option value="'. $value['id'] .'">'. $value['country_name'] .'</option>';
																		}
																	?>
																	
																</select>
															</div>
															<div class="column_m padt10">
																<select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;" name="state" id="state" onchange="city_select(this.value);" >
																	<option value="0" >-- Select State --</option>
																	
																</select>
															</div>
															<div class="column_m padt10">
																<select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;" name="city" id="city"  onchange="district_select(this.value);">
																	<option value="0" >-- Select City --</option>
																</select>
															</div>
															<div class="column_m padt10">
																<select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;" name="district" id="district"  >
																	<option value="0" >-- Select District --</option>
																</select>
															</div>
															
															
															
															<div id="errorMsg" class="red_txt fsz16"> </div>
 															
															<div class="column_m padt25 talc">
																<input type="button" value="Create Organization " onclick="validateAddCompany();" class="green_submit_btn wi_100" />
																<input type="hidden" name="submit1234" >
															</div>
														</form>
													</div>
													<div class="clear"></div>
												</div>
												<div class="clear"></div>
											</div>
										</div>
										
									</div>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="column_m padt30">
							
							<div class="column_m container">
								<div class="wrap">
									<div class="column_m white_bg">
										
										<div class="full_container">
											<div class="pad15">
												
												<div class="padt5">
													
													
													<div class="white_brd_bx">
														<h2 class="fsz20 pad10 cyanblue_txt">Apps you unlock upon registration of your Organization </h2>
														<div class="padrl10">
															
															<div class="marrl30 padrl30">
																<div class="line"></div>
															</div>
															<div class="clear"></div>
															<div class="padt10">
																
																<div class="column_m">
																	<ul class="contractor_grid_viw">
																		<li>
																			<div class="contractor_bx">
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li>
																			<div class="contractor_bx premium">
																				<div class="batch"></div>
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li>
																			<div class="contractor_bx">
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li>
																			<div class="contractor_bx">
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li>
																			<div class="contractor_bx">
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li class="clear"></li>
																		<li>
																			<div class="contractor_bx">
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li>
																			<div class="contractor_bx">
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li>
																			<div class="contractor_bx premium">
																				<div class="batch"></div>
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li>
																			<div class="contractor_bx">
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li>
																			<div class="contractor_bx">
																				<div class="contractor_logo"><span></span></div>
																				<div class="contractor_name">Contractor Name</div>
																				<div class="clear"></div>
																				<div class="buttons"> <a href="#" class="add_btn tooltip" title="Click to Compare"> </a> <a href="#" class="check_btn tooltip" title="Click to Checkout"> </a>
																					<div class="clear"></div>
																				</div>
																				<div class="clear"></div>
																			</div>
																		</li>
																		<li class="clear"></li>
																	</ul>
																</div>
																<div class="clear"></div>
																
															</div>
															<div class="clear"></div>
														</div>
														<div class="clear"></div>
														
														
														
													</div>
												</div>
												<div class="clear"></div>
											</div>
										</div>
										<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/jquery-ui.min.js"></script> 
										<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/superfish.js"></script> 
										<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/icheck.js"></script> 
										<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/jquery.selectric.min.js"></script> 
										<script type="text/javascript" src="<?php echo $path; ?>html/usercss/js/custom.js"></script>
										
										
									</body>
								</html>																