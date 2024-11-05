<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" type="image/x-icon" href="../../html/signup/images/favicon.ico">
<link rel="stylesheet" type="text/css" media="all" href="../../html/signup/css/styleget.css">
<link href="../../../html/signup/css/jquery-ui-1.10.4.custom.css" rel="stylesheet" media="all">
<title>Qmatchup</title>
<script type="text/javascript" src="../../html/signup/js/jquery.js"></script>
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
<script>

function submitform1()
	{
		
		var fname  = $("#fname");
		var lname  = $("#lname");
		var sex  = $("#sex");
		var age  = $("#age");
		var cntry  = $("#cntry");
		var state  = $("#state");
		var city  = $("#city");
		var district  = $("#district");

			if(fname.val() == "")
			{
				alert("Please input First Name !!!");
				return false;
			}
			if(lname.val() == "")
			{
				alert("Please input Last Name !!!");
				return false;
			}
			
			if(sex.val() == 0)
			{
				alert("Please Select Gender !!!");
				return false;
			}
			
					
			if(age.val() == "")
			{
				alert("Please input age !!!");
				return false;
			}
			 if(isNaN(age.val()))
			{
				alert("Please input numeric value !!!");
				return false;
			}
			
			if(cntry.val() == 0)
			{
				alert("Please Select country !!!");
				return false;
			}
			 
			 if(state.val() == 0)
			{
				alert("Please Select state !!!");
				return false;
			}
			 
			if(city.val() == 0)
			{
				alert("Please Select city !!!");
				return false;
			}
			 
				
			if(district.val() == 0)
			{
				alert("Please Select district !!!");
				return false;
			}
			 	
			 
			 
			 
			 
			 
			 
			 
			 
		document.getElementById("save_indexing").submit();
	}
	
	
	 function state_select(id)
{
	// sending ajax request to fetch families
	$.get("Savename/selectState/"+id,function(data,status){
							   
								  if(data)
									{
										// appanding data to family id element
										document.getElementById("state").innerHTML = data;
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
	$.get("Savename/selectCity/"+id,function(data2,status){
							   
								  if(data2)
									{
										// appanding data to class id element
										document.getElementById("city").innerHTML = data2;
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
	$.get("Savename/selectDistrict/"+id,function(data3,status){
							   
								  if(data3)
									{
										// appanding data to class id element
										document.getElementById("district").innerHTML = data3;
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
        <h1 style="float:left;">Get Started</h1>
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
                      
                  </ul>

<div class="column_m container">
<div class="column_m proces_wizard four_step blue_bg">
        <ul>
		<!-- showing right tab active or expanded  -->
          <li class="previous inactive"><a href="#"><span></span>Prev</a></li>
          <li class="wizard wizard1 <?php if(isset($done)){ if( $done == 4 or $done == 5 or $done == 1) echo 'active'; else echo 'active'; } else echo 'active'; ?>"> <a href="#"><span>01</span>Get Started</a> </li>
          <li class="wizard wizard2 "><a href="#"><span>02</span>Employee Request</a></li>
          <li class="wizard wizard3 "><a href="#"><span>03</span>Student Request</a></li>
		   <li class="wizard wizard4 last"><a href="#"><span>04</span> Commercial Tenant Request</a></li>
          <li class="next"><a href="#"><span></span>Next</a></li>
        </ul>
      </div>
  <div class="wrap white_bg font_opnsns">
  
    <div class="pad20">
      <div class="twth_clmn">
        
	<div class="pad20">
	<div class="pad30"><img src="../../html/signup/images/Tell.png" width="80%" alt="" class="" />
                                                        <div class="clear">
                                                        </div>
                                                      </div>
                                                  </div>	
      </div>
      <div class="onth_clmn">
        <div class="column_m">
          <div class="blue_bg_brdr_bx signup_bx">
            <div class="pad15">
              <div class="column_m font_opnsns">
                <h2 class="fsz22 cyanblue_txt bold padb5">Tell us more about yourself</h2>
                <p class="fsz14">And explore the magic behind Qmatchup</p>
                
                <form action="Savename/SavenameAccount"  method="POST" name="save_indexing" id="save_indexing" >
                <div class="column_m">
				
                  <input type="text" class="text_field" name="fname" id="fname" placeholder="First name" />
                  </div>
                  <div class="column_m padt10">
                  <input type="text" class="text_field" name="lname" id="lname" placeholder="Last name" />
                </div>
		<div class="column_m padt10">
                  <select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;"  class="text_field" name="sex" id="sex">
			<option value="0">Gender</option>
		<option value="1">Male</option>
			<option value="2">Female</option>
			</select>
                </div>
		<div class="column_m padt10">
                  <input type="number" name="age" id="age" min="18" max="100" class="text_field" placeholder="Age" />
                </div>
		<div class="column_m padt10">
                  <select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;"  class="text_field" name="cntry" id="cntry" onchange="state_select(this.value);">
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
                  <select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;"  class="text_field" name="state" id="state" onchange="city_select(this.value);">
			<option value="0" >-- Select State --</option>
					  
			</select>
                </div>
				
				<div class="column_m padt10">
                  <select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;"  class="text_field" name="city" id="city" onchange="district_select(this.value);">
			<option value="0" >-- Select City --</option>
					  
			</select>
                </div>
				
				
				<div class="column_m padt10">
                  <select style="background-color:white; border-color: #c0c0c0 #d9d9d9 #d9d9d9; border-style: solid; border-width: 1px;    box-sizing: border-box; color: #838383; font-size: 14px; height: 42px; margin: -1px 0 0; padding: 10px; width: 100%;"  class="text_field" name="district" id="district">
			<option value="0" >-- Select District --</option>
					  
			</select>
                </div>
                
                <div class="column_m padt25 talc">
                  <input type="button" value="Save Details"  onclick="submitform1();" class="green_submit_btn wi_100" />
				   <input type="hidden" name = "indexing_save" id="indexing_save" />
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

      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>


</body>
</html>