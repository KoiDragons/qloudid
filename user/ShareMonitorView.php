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
		<script src="https://kit.fontawesome.com/119550d688.js"></script>
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		<script>
		
		function addBG(link,cname)
		{
			$(".bg_fffbcc_a").removeClass("active");
			$("#gratis_popup_company_click").addClass("active");
			$('#gratis_popup_company_click').attr('style','display:block;');
			$(link).closest('.bg_fffbcc_a').addClass('active');
			$('#c_name').html(cname);
		}
		
		function removeBackground()
			{
				
				$(".bg_fffbcc_a").removeClass("active");
				
			}
			
		function changeDisplay(id,link)
		{
				
			if($(link).hasClass('active'))
			{
				$('.expander-toggler').removeClass('active');
				$(link).removeClass('active');	
				if(id==1)
				{
					$('#employees1').attr('style','display:none;');
										
				}
				else if(id==2)
				{
					$('#employees2').attr('style','display:none;');
										
				}
				else if(id==3)
				{
					$('#employees3').attr('style','display:none;');
										
				}
				else if(id==4)
				{
					$('#employees4').attr('style','display:none;');
										
				}
				
			}
			else
			{
				$('.expander-toggler').removeClass('active');
				$(link).addClass('active');	
				if(id==1)
				{
					$('#employees1').attr('style','display:block;');
					$('#employees2').attr('style','display:none;');
					$('#employees3').attr('style','display:none;');
					$('#employees4').attr('style','display:none;');
				}
				else if(id==2)
				{
					$('#employees1').attr('style','display:none;');
					$('#employees2').attr('style','display:block;')
					$('#employees3').attr('style','display:none;');
					$('#employees4').attr('style','display:none;');
				}
				else if(id==3)
				{
					$('#employees1').attr('style','display:none;');
					$('#employees2').attr('style','display:none;')
					$('#employees3').attr('style','display:block;');
					$('#employees4').attr('style','display:none;');
				}
				else if(id==4)
				{
					$('#employees1').attr('style','display:none;');
					$('#employees2').attr('style','display:none;')
					$('#employees3').attr('style','display:none;');
					$('#employees4').attr('style','display:block;');
				}
			}
		}
		
			var user_ssn='<?php echo $row_summary['ssn']; ?>';
			
			var timeout=0;
			var a;
			const timeInterval=3000;
			const tout=40;
			var send_data1={};
			function submitFormCom()
			{
				
				$("#save_indexingcs").submit();
			}
			
			
			function setDisconnect(id)
			{
				var send_data={};
				send_data.cid=id;
				
				$.ajax({
					type:"POST",
					url:"checkConnection",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						if(data1==1)
						{
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_disconnect").style.display='block';
							$("#gratis_popup_disconnect").addClass('active');
							$("#cid").val(id);
						}
						else
						{
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_error").style.display='block';
							$("#gratis_popup_error").addClass('active');
						}
						
					}
				});
			}
			
			
			function setDisconnectSupplier(id)
			{
				
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_disconnect_supplier").style.display='block';
							$("#gratis_popup_disconnect_supplier").addClass('active');
							$("#cidsup").val(id);
						
			}
			
			function setDisconnectTenant(id)
			{
				
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_disconnect_Tenant").style.display='block';
							$("#gratis_popup_disconnect_Tenant").addClass('active');
							$("#cidten").val(id);
						
			}
			
			function setDisconnectStudent(id)
			{
				
							document.getElementById("popup_fade").style.display='block';
							$("#popup_fade").addClass('active');
							document.getElementById("gratis_popup_disconnect_student").style.display='block';
							$("#gratis_popup_disconnect_student").addClass('active');
							$("#cidstu").val(id);
						
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
									
									window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow";
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
									
									window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow";
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
									
									window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow";
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
				
				var send_data={};
				
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"searchToApproveCompanyDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						$("#searched").html('');
						$("#searched").html(data1);
						
					}
				});
				
			}
			
			
			function updateMember(id,id1)
			{
				
				var newId=id+'_'+id1;
				$("#total_value_member").val(newId);
				
				var send_data={};
				
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"searchToApproveMemberDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						$("#searchedMember").html('');
						$("#searchedMember").html(data1);
						
					}
				});
				
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
			
			
			function searchEmployer()
			{
				var send_data={};
				$("#errEmployer").html('');
				send_data.id=$("#cid_number_emp").val();
				$.ajax({
					type:"POST",
					url:"searchEmployerDetail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						
						$("#searchedEmployer").html('');
						$("#searchedEmployer").append(data1);
						
					}
				});
				
			}
			
			function searchCompanySuppliers()
			{
				var send_data={};
				
				send_data.id=$("#cid_number_supplier").val();
				$.ajax({
					type:"POST",
					url:"searchCompanyDetailSuppliers",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search_suppliers").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched_company").html('');
						$("#searched_company").append(data1);
						
					}
				});
				
			}
			
			function searchCompanyStudents()
			{
				var send_data={};
				
				send_data.id=$("#cid_number_student").val();
				$.ajax({
					type:"POST",
					url:"searchCompanyDetailStudents",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search_students").style.display='none';
						document.getElementById("gratis_popup_company_searched").style.display='block';
						$(".gratis_popup_company_searched").addClass('active');
						$("#searched_company").html('');
						$("#searched_company").append(data1);
						
					}
				});
				
			}
			
			function searchCompanyTenates()
			{
				var send_data={};
				
				send_data.id=$("#cid_number_tenates").val();
				$.ajax({
					type:"POST",
					url:"searchCompanyDetailTenates",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						//alert(data1); return false;
						
						document.getElementById("gratis_popup_company_search_tenates").style.display='none';
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
							
							if(cntry.val()==201)
							{
								var send_data={};
								send_data.prnumber=user_ssn;
								$.ajax({
									type:"POST",
									url:"../BankidCheck/initiate",
									data:send_data,
									dataType:"text",
									contentType: "application/x-www-form-urlencoded;charset=utf-8",
									success: function(data1){
										
										if(data1)
										{
											send_data1.orderRef=data1;
											a = setInterval(ajaxSend, timeInterval);
										}
										else 
										{
											$("#errorMsg").html('error request');
											return false;
										}
									}
								});
								
							}
							else
							{
								document.getElementById("save_indexing_company").submit();
							}
						}
						else if(data1 == 2)
						{
							alert("Some error occurred, Please report to web admin !!!");
							return false;
						}
					}
				});
				
			}
			
			function ajaxSend()
			{ 
				$.ajax({
					type:"POST",
					url:"../BankidCheck/checkOrderReference",
					data:send_data1,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data2){
						if(data2!='complete')
						{
							timeout++;
							if(data2==1)
							{
								clearInterval(a);
								$("#errorMsg").html("Det BankID du försöker använda är för gammalt eller spärrat. Använd ett annat BankID eller hämta ett nytt hos din internetbank.");
								return false;
							}
							else if(data2==2)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten. Försök igen.");
								return false;
							}
							else if(data2==3)
							{
								clearInterval(a);
								$("#errorMsg").html("BankID-appen verkar inte finnas i din dator eller telefon. Installera den och hämta ett BankID hos din internetbank. Installera appen från din appbutik eller https://install.bankid.com.");
								return false;
							}
							else if(data2==4)
							{
								clearInterval(a);
								$("#errorMsg").html("Åtgärden avbruten.");
								return false;
							}
							else if(timeout>tout)
							{
								clearInterval(a);
								$("#errorMsg").html('Internt tekniskt fel. Försök igen.');
								return false;
							} 
							else 
							{
								$("#errorMsg").html(data2);
								return false;
							}
						}
						else 
						{
							
							var send_company={};
							send_company.company_name_add=$("#company_name_add").val();
							send_company.company_website=$("#company_website").val();
							send_company.company_email=$("#company_email").val();
							send_company.inds=$("#inds").val();
							send_company.cntry=$("#cntry").val();
							
							
							$.ajax({
								type:"POST",
								url:"createCompanyBankAccount",
								data:send_company,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									
									if(data1)
									{
										
										clearInterval(a);
										window.location.href="https://www.qloudid.com/user/index.php/ShareMonitor/ShareMonitorShow";
									}
									else 
									{
										$("#errorMsg").html('error request');
										return false;
									}
								}
							});
						}
						
					}
				});
				
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
				.done(function(data1){
					
					
					if(data1)
					{
						window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow";
					}
					
					
				})
				.fail(function(){})
				.always(function(){});
				
			}
			
			function approveMember()
			{
				
				
				var ids=$("#total_value_member").val().split('_');
				var send_data = {};
				
				send_data.a_id=ids[0];
				send_data.status=ids[1];
				//alert(send_data.status); return false;
				$.ajax({
					url: '../ShareMonitor/approveMemberRequest',
					type: 'POST',
					//dataType: 'text/xml',
					data: send_data
					//async:false
					
				})
				.done(function(data1){
					
					
					if(data1)
					{
						window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorShow";
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
		function checkFlag()
	{
		if($(".popupShow").hasClass('active'))
		{
			$(".popupShow").removeClass('active')
			$(".popupShow").attr('style','display:none');
			}
		
		}
	function togglePopup()
	{
		if($(".popupShow").hasClass('active'))
		{
			$(".popupShow").removeClass('active')
			$(".popupShow").attr('style','display:none');
			}
		else
		{
			$(".popupShow").addClass('active')
			$(".popupShow").attr('style','display:block');
			}
		}
function submitFormCom()
{
	
	$("#save_indexingcs").submit();
}

		

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
			
			function changeHeader()
			{
				window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorRequestList";
			}
			function changeHeader1()
			{
				window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorSentList";
			}
			function changeHeader2()
			{
				window.location.href ="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorRejectedList";
			}
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		<!-- HEADER -->
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			  
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="https://www.qloudid.com/user/index.php/ReceivedRequest" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		
		<div class="column_m pos_rel" onclick="checkFlag();">
			
			<!-- SUB-HEADER -->
			
			
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn"  >Consents</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc   xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >These are your private consents, <?php echo $row_summary['first_name']; ?></a></div>
					 
			
			 
					<div class="tab-header martb10 padb10 xs-talc brdb2_ffde00 nobrdt nobrdl nobrdr talc">
                                            <a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorRequestList" class="dinlblck mar5 padrl10  bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah  ffamily_avenir " onclick="changeHeader();">Request</a>
                                            <a href="#" class="dinlblck mar5 padrl30  nobrd  bg_ffde00_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h black_txt_a white_txt_ah ffamily_avenir active" >Active</a>
                                             <a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorSentList" class="dinlblck mar5 padrl10  nobrd  bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir " onclick="changeHeader1();">Sent</a>
                                              <a href="https://www.qloudid.com/user/index.php/ShareMonitor/shareMonitorRejectedList" class="padrl30_a padrl10 fsz18 midgrey_txt lgn_hight_36 "  onclick="changeHeader2();"><i class="fas fa-trash-alt"></i></a>

                                        </div>
							
							<div class="column_m container   fsz14 dark_grey_txt">
								
								<!-- Summary -->
								 
								<div class="tab-content padb25 padt active" id="tab_total" style="display: block;">
									
									 
									
									<?php $i=0;
												
												foreach($approvedMemberRequest as $category => $value) 
												{
													
													
												?> 
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?> marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0 ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Styrelseuppdrag</span>
																	
																	 <span class="edit-text  fsz18 jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25); ?></span>  
																	</div>
																	
																	
																		<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right red_ff2828_txt"></span> 
													</div>	 
																			 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
														
											<?php $i++; } ?>
											<div  id="memberRequestApproved">
										</div>	
										
										<div class="clear"></div>
									<div class="padtb20   talc <?php if(($approvedMemberRequestCount['num'])<=5) echo "hide"; ?>">
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width  " value="1" onclick="add_more_approved_member(this);">Visa fler</a>
										
									</div>
									
									<script>
										function add_more_approved_member(link) {
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											
											$.ajax({
												type:"POST",
												url:"moreApprovedMemberRequest",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#memberRequestApproved"),
													html=html1;
													
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
										
									
									 
									
									<?php 
											echo $rowUserApproved;  ?>
											
											<div id="allRequest">
											</div>
											<div class="clear"></div>
									<div class="padtb20   talc <?php if(($requestApprovedCount['num'] + $approveCount['num'])<=5) echo "hide"; ?>">
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width " value="1" onclick="add_more_all(this);">View more</a>
										
									</div>
									
									
									 
											<?php 
											echo $rowUserApprovedTenants;  ?>
											<div  id="allLandlord">
										</div>
										
										<div class="clear"></div>
									<div class="padtb20   talc <?php if(($requestApprovedCountTenants['num'])<=5) echo "hide"; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width " value="1" onclick="add_more_allTenants(this);">View more</a>
									</div>
									<script>
										function add_more_allTenants(link) {
											
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											
											$.ajax({
												type:"POST",
												url:"moreApprovedUserTenants",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#allLandlord"),
													html=html1;
													$tbody.html('');
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
									
									
									
									 
											<?php 
											echo $rowUserApprovedStudents;  ?>
										</tbody>
										<div  id="allSchool">
									</div>
									
									<div class="clear"></div>
									<div class="padtb20   talc <?php if(($requestApprovedCountStudents['num'])<=5) echo "hide"; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width " value="1" onclick="add_more_allStudents(this);">View more</a>
									</div>
									<script>
										function add_more_allStudents(link) {
											
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											
											$.ajax({
												type:"POST",
												url:"moreApprovedUserStudents",
												data:send_data,
												dataType:"text",
												contentType: "application/x-www-form-urlencoded;charset=utf-8",
												success: function(data1){
													html1=data1;
													var $tbody = $("#allSchool"),
													html=html1;
													$tbody.html('');
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
										
										function add_more_all(link) {
											
											var id_val=parseInt($(link).attr('value'))+1;
											var html1="";
											var send_data={};
											send_data.id=parseInt($(link).attr('value'));
											$(link).attr('value',id_val);
											
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
									
									 <?php 
											echo $rowUserApprovedSuppliers;  ?>
											<div  id="allSuppliers">
										</div>
										<div class="clear"></div>
									<div class="padtb20  talc <?php if(($requestApprovedCountSuppliers['num'])<=5) echo "hide"; ?>">
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width " value="1" onclick="add_more_allSuppliers(this);">View more</a>
										
									</div>
									
									
									 <?php $i=0;
												
												foreach($daycareRequestApprovedDetail as $category => $value) 
												{
													
													
												?> 
											
												<a href="../ConsentProfileParent/requestAccount/<?php echo $value['enc']; ?>">
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?> marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Daycare</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo substr(html_entity_decode($value['company_name']),0,25)."..."; ?></span>  
																	</div>
																	
																	
																	
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>		 
															 		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
															</a>
	 
												<?php $i++; } ?>
	 
												<div  id="DaycareRequest">
													</div>	
										<div class="clear"></div>
										<div class="padtb20   talc <?php if($requestDaycareApprovedCount['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_daycare(this);">View more</a>
									</div>	

										<script>
										function add_more_daycare(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"moreDaycareApprovedRequestDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#DaycareRequest"),
												html=html1;
												
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
									 
									 	
									 <?php $i=0;
												
												foreach($kinRequestApprovedDetail as $category => $value) 
												{
													
													
												?> 
											
												<a href="../ConsentKinRequest/kinInformation/<?php echo $value['enc']; ?>">
												<div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" <?php if($i%2==0) echo 'white_bg'; else echo 'lgtgrey_bg'; ?> marb0  bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "><div class="wi_50p xs-wi_100 hei_50p  fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 yellow_bg_a" ><img src="../../<?php echo $value['image']; ?>" width="50px;" height="50px;" alt="Profile " style="background-repeat: no-repeat;
																		background-position: 50%;
																	border-radius: 10%;"> </div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt"><?php if($value['receiver_id']==$data['user_id']) echo 'Received request'; else echo 'Sent request'; ?> - Kin</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo $value['name']; ?></span>  
																	</div>
																	
																	
																	
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>		 
															 		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div>
															</a>
	 
												<?php $i++; } ?>
	 
												<div  id="kinRequest">
													</div>	
										<div class="clear"></div>
										<div class="padtb20   talc <?php if($kinRequestApprovedCount['num']<=5) echo 'hidden'; ?>">
										
										<a href="javascript:void(0);" class="tb_67cff7_bg trans_bg brd blue_btn black_txt  ffamily_avenir  trn xxs-brd_width"  value="1" onclick="add_more_kin(this);">View more</a>
									</div>	

										<script>
										function add_more_kin(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"moreApprovedKinRequestDetail",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#kinRequest"),
												html=html1;
												
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
									 
									<?php $i=0;
												
												foreach($approvedContractorInvitation as $category => $value) 
												{
													
													
												?> 
											
												
												 <div class="column_m container  marb5   fsz14 dark_grey_txt">
												<div class=" white_bg marb0 brdb bg_fffbcc_a" style="">
																<div class="container padrl10 padtb15    brdrad1 fsz18 dark_grey_txt">
																	<div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall">

																		<!--<div class="clear hidden-xs"></div>-->

																		<div class="wi_100 xs-wi_100 xs-order_3 fsz12 ffamily_avenir hei_50p">
																		<div class="fleft wi_50p marr15 "> <div class="wi_50p xs-wi_50p hei_50p xs-hei_50p fxshrink_0 dflex alit_c justc_c uppercase fsz26 xs-fsz20 brdrad1000 yellow_bg_a lgtgrey_bg  " style="background-repeat: no-repeat;
																	background-position: 50%;
																	border-radius: 10%;"><?php echo substr(html_entity_decode($value['company_name']),0,1); ?></div>
																	</div>
																	
																	<div class="fleft wi_70 xxs-wi_75   xs-mar0  ">
																	<span class="padt0 edit-text jain1 dblock brdclr_lgtgrey2  fsz18 bold  black_txt">Contractor</span>
																	
																	 <span class="edit-text  fsz14  jain2 dblock  lgn_hight_18 "><?php echo $value['company_name']; ?></span>  
																	</div>
																	
																	
																	
													<div class="fright wi_10 padl0  marl15 fsz40  padb0 hidden-xs">
														 <span class="fas fa-arrow-alt-circle-right txt_cfdbea"></span> 
													</div>		 
															 		 
													 
																		</div>





																	</div>
																	<div class="clear"></div>
																</div>



															</div>
															</div> 
															
	 
												<?php } ?> 
								</div>
								<script>
									function add_more_allSuppliers(link) {
										
										var id_val=parseInt($(link).attr('value'))+1;
										var html1="";
										var send_data={};
										send_data.id=parseInt($(link).attr('value'));
										$(link).attr('value',id_val);
										
										$.ajax({
											type:"POST",
											url:"moreApprovedUserSuppliers",
											data:send_data,
											dataType:"text",
											contentType: "application/x-www-form-urlencoded;charset=utf-8",
											success: function(data1){
												html1=data1;
												var $tbody = $("#allSuppliers"),
												html=html1;
												$tbody.html('');
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
		<div class="wi_100 hidden  pos_fix zi50 bot0 left0 bs_bb padrl15 brdt lgtgrey_bg">
			
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
		<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup">
			<div class="modal-content pad25 nobrdb talc brdrad5">
				<form action="updateEmployeeDetail" method="POST" id="save_indexing_unique" name="save_indexing_unique">
					
					<h2 class="marb10 pad0 bold fsz24 black_txt">Aktivera din inbjudan</h2>
					
					<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
						
						
						
						<div class="wi_100 marb0 talc">
							
							<span class="valm fsz16">Använd koden som du fått via mejl för att aktivera inbjudan. När du fyller i koden så godkänner per automatik att motpart är ansluten till dig.  </span>
						</div>
						
						
					</div>
					
					<div class="padb0">
						
						<div class="pos_rel ">
							
							<input type="text" id="unique_id" name="unique_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Add the code">
						</div>
					</div>
					<div class="mart20">
						<input type="button" value="aktivera" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="submit_unique();">
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
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brd brdrad5" id="gratis_popup_approve">
		<div class="modal-content pad25  brdrad5">
			<div id="searched">
				
			</div>
			 
				<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="approveUser();">Signera med Mobilt BankId</a> 
					<input type="hidden" id="total_value" name="total_value" value="">
				</div>
			 
		</div>
	</div>
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brd brdrad5" id="gratis_popup_member">
		<div class="modal-content pad25  brdrad5">
			<div id="searchedMember">
				
			</div>
			<form method="POST" action="updateAccount" id="save_indexing_user" name="save_indexing_user">
				<div class="wi_400p maxwi_100 col-xs-12 col-sm-12 pos_rel zi5 marrla mart10"> <a href="#" class="wi_100 maxwi_500p minhei_50p dflex justc_c alit_c opa90_h marrla brdrad3 panlyellow_bg fsz18 xs-fsz16 darkgrey_txt trans_all2" onclick="approveMember();">Signera med Mobilt BankId</a> 
					<input type="hidden" id="total_value_member" name="total_value_member" value="">
				</div>
			</form>
		</div>
	</div>
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 " id="gratis_popup_code">
		<div class="modal-content pad25  nobrdb talc brdrad5 ">
			
			
			<div class="marb20">
				<img src="../../../html/usercontent/images/imageedit_1_5586067974.png" class="maxwi_100 hei_auto">
			</div>
			<h2 class="marb10 pad0 bold fsz24 black_txt">Verifiera en motpart…</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">Be din motpart, privatperson eller företag att legitimera sig innan ett möte eller affär. Välj ur du vill skicka din förfrågan, sms, email eller med Qloud ID kod. </span>
				</div>
				
				
			</div>
			
			<div class="on_clmn padb10">
				
				<div class="pos_rel ">
					
					<select name="reque" id= "reque" class=" wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" onchange="selectCode(this.value);">
						
						<option value="0">--Välj metod--</option>
						<option value="1">Mobile</option>
						<option value="2">Email</option>
						<option value="3">Code</option>
						
						
					</select>
				</div>
			</div>
			<div id="codeSelect" style="display:none">
				<div class="on_clmn padb10">
					
					<div class="pos_rel ">
						
						
						<input type="text" id="code_id" name="code_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter Code">
					</div>
				</div>
			</div>
			<div id="emailSelect" style="display:none">
				<div class="on_clmn padb10">
					
					<div class="pos_rel ">
						
						<input type="text" id="email_id" name="email_id" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter Email">
					</div>
				</div>
			</div>
			
			<div id="phoneSelect" style="display:none">
				<div class="on_clmn padb10">
					
					<div class="on_clmn ">
						<div class="thr_clmn wi_50">	
							
							
							
							<div class="pos_rel padl0">
								
								
								<select id="cntryph" name="cntryph" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
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
						<div class="thr_clmn padl10 wi_50">
							
							
							<div class="pos_rel padr0">
								
								
								<input type="number" id="phoneno" name="phoneno" max="9999999999" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Enter phone">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="on_clmn mart10 marb20">
				<input type="button" value="Prova gratis" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchUser();">
				
			</div>
			
			
			
		</div>
	</div>
	
	
	
	
	<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 brdrad5 gratis_popup_company_searched" id="gratis_popup_company_searched">
		<div class="modal-content pad25 brdrad5">
			
			
			<div id="searched_company">
				
				
			</div>
			
		</div>
	</div>
	
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5 gratis_popup_company" id="gratis_popup_company">
		<div class="modal-content pad25 nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Bjud in ett företag</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Fyll i fälten nedan för att skicka en inbjudan om att registrera ett företag. </span>
				</div>
				
				
			</div>
			<form method="POST" action="createCompanyAccount" id="save_indexing_company" name="save_indexing_company"  accept-charset="ISO-8859-1">
				
				<div class="padb10 ">
					
					<div class="pos_rel ">
						
						<input type="text" id="company_name_add" name="company_name_add" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company name">
					</div>
				</div>
				
				<div class="padb10 ">
					
					<div class="pos_rel ">
						
						<input type="text" id="company_website" name="company_website" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company website">
					</div>
				</div>
				
				
				<div class="padb10 ">
					
					<div class="pos_rel ">
						
						<input type="text" id="company_email" name="company_email"  class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company email">
					</div>
				</div>
				
				<div class="padb10 ">
					
					<div class="pos_rel ">
						
						<select id="inds" name="inds" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
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
				
				<div class="padb0 ">
					
					<div class="pos_rel ">
						
						<select id="cntry" name="cntry" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" >
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
				
				<div id="errorMsg" class="red_txt"></div>
			</form>
			
			<div class="mart20">
				<input type="button" value="Add company" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="validateAddCompany();" />
				<input type="hidden" name="indexing_save_company" id="indexing_save_company" />
				
			</div>
			
			
			
			
		</div>
		</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search_suppliers">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt tall">Anslut till en Leverantör</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in din leverantörs namn eller organisationsnummer i en följd och klicka på sök (utan bindestreck) </span>
				</div>
				
				
			</div>
			
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					
					<input type="text" id="cid_number_supplier" name="cid_number_supplier" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Identification Number">
				</div>
			</div>
			<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompanySuppliers();">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search_students">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 tall black_txt">Anslut till en Skola</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in Skolans namn och klicka på Sök</span>
				</div>
				
				
			</div>
			
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					
					<input type="text" id="cid_number_student" name="cid_number_student" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Identification Number">
				</div>
			</div>
			<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompanyStudents();">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5 " id="gratis_popup_company_search_tenates">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt tall">Anslut till en Landlord</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in din Landlord/bostadsrättsförenings organisationsnummer i en följd och klicka på sök (utan bindestreck) </span>
				</div>
				
				
			</div>
			
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					
					<input type="text" id="cid_number_tenates" name="cid_number_tenates" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Identification Number">
				</div>
			</div>
			<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompanyTenates();">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_company_search">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt tall">Anslut till en Employer</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in Employerns organisationsnummer i en följd och klicka på sök (utan bindestreck) </span>
				</div>
				
				
			</div>
			
			<div class="padb0 ">
				
				<div class="pos_rel padrl0">
					
					<input type="text" id="cid_number" name="cid_number" class="wi_100 default_view  rbrdr pad10 mart5 hei_50p llgrey_txt fsz18 lgtgrey2_bg brdrad5" placeholder="Company Identification Number">
				</div>
			</div>
			<div class="mart20">
				<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchCompany();">
				
				
			</div>
			
			
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_employer_search">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt tall">Anslut till en Employer</h2>
			<span><!--<p>Visserligen kanske du just nu inte är i behov av att</p>--></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				<!--<div class="wi_50 marb10">
					<img src="../../../html/usercontent/images/checkmark.png" width="20" class="marr5 valm">
					<span class="valm">Läsa nyheter och  följa trender </span>
				</div>-->
				
				<div class="wi_100 marb10 tall">
					
					<span class="valm fsz16">Skriv in Employerns organisationsnummer i en följd och klicka på sök (utan bindestreck) </span>
				</div>
				
				
			</div>
			<div id="searchedEmployer">
				<div class="pad15 lgtgrey2_bg">
					
					<div class="pos_rel padrl10">
						<div class=" wi_28p pos_abs zi2 top0 pos_abs zi2 top0 lef0 padt5 talc lgn_hight_40"><span class="fa fa-star fsz14"></span></div>
						<input type="text" id="cid_number_emp" name="cid_number_emp" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
					</div>
				</div>
				<div id="errEmployer" class="red_txt"></div>
				<div class="mart20">
					<input type="button" value="Sök" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp" onclick="searchEmployer();">
					
					
				</div>
				
			</div>
			
			
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_user">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			<h3 class="marb25 pad0 uppercase fsz16 dark_grey_txt">Result</h3>
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
				
				<div id="search_user">
					<h3 class="pos_rel pad15  bold fsz20 dark_grey_txt">
						No result found
						
					</h3>
					
					
					
					
					
					
				</div>
				
				
				
				
			</div>
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_error">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Passa på att bli medlem nu!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Rekrytera eller hyra in personal från över 3000 kvalitetssäkrade leverantörer</span>
				</div>
				
				
			</div>
			
			<div class="pad15 lgtgrey2_bg">
				
				<div id="search_user">
					<h3 class="pos_rel pad15  bold fsz20 dark_grey_txt">
						You are owner of the same company. You can not be disconnected from this company.
						
					</h3>
					
				</div>
				
			</div>
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to disconnect?</span>
				</div>
				
				
			</div>
			<form action="disconnectEmployee" method="POST">
			
			
			<input type="hidden" id="cid" name="cid" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect_supplier">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to disconnect?</span>
				</div>
				
				
			</div>
			<form action="disconnectSupplier" method="POST">
			
			
			<input type="hidden" id="cidsup" name="cidsup" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect_Tenant">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to disconnect?</span>
				</div>
				
				
			</div>
			<form action="disconnectTenant" method="POST">
			
			
			<input type="hidden" id="cidten" name="cidten" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
	<div class="popup_modal wi_350p maxwi_90 pos_fix pos_cen zi50 bs_bb  white_bg fsz14 brdrad5" id="gratis_popup_disconnect_student">
		<div class="modal-content pad25  nobrdb talc brdrad5">
			
			
			
			<h2 class="marb10 pad0 bold fsz24 black_txt">Confirm!</h2>
			<span></span>
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall">
				
				
				<div class="wi_100 marb10 talc">
					
					<span class="valm fsz16">Are you sure that you want to disconnect?</span>
				</div>
				
				
			</div>
			<form action="disconnectStudent" method="POST">
			
			
			<input type="hidden" id="cidstu" name="cidstu" class="white_bg txtind25 wi_100 rbrdr pad10 mart5  white_bg hei_40p black_txt" placeholder="Company Identification Number">
			
			
			<div class="mart20">
				<input type="submit" value="Submit" class="wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			
			<div class="mart20">
				<input type="button" value="Cancel" class="close_popup_modal wi_320p maxwi_100 brdrad3 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp">
				
				
			</div>
			</form>
		</div>
	</div>
	
	
<div class="popup_modal wi_500p maxwi_96 maxhei_100vh-70p ovfl_auto dnone opa0 opa1_a pos_fix zi99 top100p xs-right8 right30 bs_bb  brdradtl5 white_bg trans_all2 box_shadow" id="gratis_popup_company_click">
		<a href="#" class="popup-close fa fa-close dblock hidden-md hidden-lg pos_abs top0 right0 pad5 fsz18 red_txt"></a>
		<a href="#" class="close_popup_modal dblock hidden-xs hidden-sm pos_abs top0 right0 orange_btn brdrad3 bold"  onclick="removeBackground();">Close</a>
	
			<div class="popup-content padb15">
			<h2 class="bold padrl20 padtb10 fsz18 black_txt " id="c_name"></h2>
			<div class="padrbl20 xs-padrl10">
				<div class="white_bg tall padb20">
				<div class="marb0"> <a href="#" class="blacka1_txt fsz15 xs-fsz16 sm-fsz16  edit-text jain_drop_company">Översiktskarta med parter som löpade tar del av dina uppgifter.</a></div><a href="#" class="blacka1_txt fsz45 xs-fsz30 sm-fsz30 ">
										<!-- Meta -->
										
									</a></div>
			<div class="mart10 marrl5 padb10  fsz14  lgtgrey2_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt active" onclick="changeDisplay(1,this);">
			<span class="dnone_pa fa fa-chevron-down"></span>
			<span class="dnone diblock_pa fa fa-chevron-up">
			</span> Bas uppgifter</a>
			</div>
			<div id="employees1" style="display:block;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="fsz14 black_txt white_bg"><tr>
			</tr>
			<tr class="black_txt  fsz13 white_bg">
			<td class="pad5 brdb_new tall">
			<div class="padtb5">SSN</div></td>
			<td class="pad5 brdb_new tall">
			<div class="padtb5">
			<div class="boolean-control boolean-control-small boolean-control-green  fright checked">
			<input type="checkbox" name="ssn" id="ssn" class="default" data-true="Yes" data-false="No">
			</div>
			</div>
			</td>
			</tr>
			<tr class="black_txt  fsz13 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Name</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked ">
													<input type="checkbox" name="first_name" id="first_name" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Last Name</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="last_name" id="last_name" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Day)</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked ">
													<input type="checkbox" name="dob_day" id="dob_day" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Month)</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="dob_month" id="dob_month" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
										
										
									</tr>
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">DOB (Year)</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="dob_year" id="dob_year" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Sex</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="sex" id="sex" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
			
			</tbody>
			</table>
			</div>
			</div>
			</div>
			<div class="mart10 marrl5 padtb10  fsz14  lgtgrey2_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt" onclick="changeDisplay(2,this);">
			<span class="dnone_pa fa fa-chevron-down"></span>
			<span class="dnone diblock_pa fa fa-chevron-up">
			</span> Hem adress</a>
			</div>
			<div id="employees2" style="display:none;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="black_txt  fsz15 white_bg">
				<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">City</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="city" id="city" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">State</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="state" id="state" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Zip</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="zip" id="zip" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Address</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="address" id="address" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Country</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="country" id="country" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
			
			</tbody>
			</table>
			</div>
			</div>
			</div>
			<div class="mart10 marrl5 padtb10  fsz14  lgtgrey2_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt" onclick="changeDisplay(3,this);">
			<span class="dnone_pa fa fa-chevron-down"></span>
			<span class="dnone diblock_pa fa fa-chevron-up">
			</span>Telefon nummer</a>
			</div>
			<div id="employees3" style="display:none;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="black_txt  fsz15 white_bg">
				<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Telephone</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="tel" id="tel" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5">Mobile</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="mobile_p" id="mobile_p" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Marital Status</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="marital_status" id="marital_status" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
			</tbody>
			</table>
			</div>
			</div>
			</div>
			<div class="mart10 marrl5 padtb10  fsz14  lgtgrey2_bg">
			<a href="javascript:void(0);" class="expander-toggler black_txt" onclick="changeDisplay(4,this);">
			<span class="dnone_pa fa fa-chevron-down"></span>
			<span class="dnone diblock_pa fa fa-chevron-up">
			</span>Arbete</a>
			</div>
			<div id="employees4" style="display:none;">
			<div class="mart10 wi_100 dflex fxwrap_w">
			<div class="wi_100 padl5">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
			
			<tbody class="black_txt  fsz15 white_bg">
				<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Nationality</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="nation" id="nation" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Employee Number</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="e_number" id="e_number" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Hiring Date</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="s_date" id="s_date" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Resigned Date</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="r_date" id="r_date" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Phone</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="phone" id="phone" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Mobile</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="mobile" id="mobile" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
									<tr class="black_txt  fsz13 white_bg">
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">Work Email</div>
										</td>
										
										<td class="pad5 brdb_new tall">
											<div class="padtb5 red_txt">
												<div class="boolean-control boolean-control-small boolean-control-green fright checked">
													<input type="checkbox" name="email" id="email" class="default" data-true="Yes" data-false="No">
												</div>
											</div>
										</td>
									</tr>
									
			</tbody>
			</table>
			</div>
			</div>
			</div>
			
			
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
			else if(id==1)
			{
				document.getElementById("codeSelect").style.display='none';
				document.getElementById("emailSelect").style.display='none';
				document.getElementById("phoneSelect").style.display='block';
			}
			else
			{
				document.getElementById("codeSelect").style.display='none';
				document.getElementById("emailSelect").style.display='none';
				document.getElementById("phoneSelect").style.display='none';
			}
		}
		
		function updateErr()
		{
			$("#errInvite").html('');
			$("#errInvite").html('Please select you role');
			return false;
		}
		
		function selectRole(id)
		{
			
			$("#errInvite").html('');
			if(id==2)
			{
				document.getElementById("phoneSelectC").style.display='block';
				document.getElementById("c2").style.display='block';
				document.getElementById("c1").style.display='none';
				document.getElementById("c0").style.display='none';
			}
			else if(id==1)
			{
				document.getElementById("phoneSelectC").style.display='none';
				document.getElementById("c2").style.display='none';
				document.getElementById("c1").style.display='block';
				document.getElementById("c0").style.display='none';
			}
			else
			{
				document.getElementById("phoneSelectC").style.display='none';
				document.getElementById("c2").style.display='none';
				document.getElementById("c1").style.display='none';
				document.getElementById("c0").style.display='block';
			}
			
		}
		
		
		function inviteManager()
		{
			$("#errInvite").html('');
			if($("#email_idc").val()=="")
			{
				$("#errInvite").html("Please enter email!!!");
				return false;
			}
			document.getElementById("invite_save").submit();
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