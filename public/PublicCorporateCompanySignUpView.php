<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link href="<?php echo $path;?>html/kincss/css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126618362-1"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbhcFHTjnokk1gTCLD_x9eIhVCg4gNIys&libraries=places&callback=initAutocomplete"
			async defer></script>
	
	<script type="text/javascript">
	function checkPosition(id)
		{
			
			if(id==1)
			{
				$("#isHeadquarter").attr('style','display:none');
			 
			}
			
			else 
			{
				$("#isHeadquarter").attr('style','display:block');
			 
			}
			
		}
	function showIdDetails(id)
	{
		if(id==0)
		{
			$('#showDetails').addClass('hidden');
		}
		else
		{
			$('#showDetails').removeClass('hidden');
		}
	}
	
	
	 function updateInvoice(id,link)
   {
	   invoiceShow=1;
	    
   }
   
    function updateInvoicec(id,link)
   {
	   invoiceShowc=1;
	    
   }
   
    function updateName(id,link)
   {
	   nameInfoUpdate=1;
	    
   }
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-11097556-8']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
     	function changeClass(link)
			{
				
				$(".class-toggler").removeClass('active');
				
			}
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
			function closePop()
			{
				document.getElementById("popup_fade").style.display='none';
				$("#popup_fade").removeClass('active');
				document.getElementById("person_informed").style.display='none';
				$(".person_informed").removeClass('active');
			}
			
			
			function checkEmail(id) {
				
				var email = document.getElementById(id);
				var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				
				if (!filter.test(email.value)) {
					$("#error_msg_form").html('Please enter correct email format');
					email.focus();
					return false;
				}
				else
				return true; 
				
				
			}
			 var checkEmailData=0;
			var mnd_phone=0;
			var submit_form=true;
			function informEmployee()
			{
				submit_form=true;
				$("#error_msg_form").html('');
				
				if($("#cntry").val()==0)
				{
				 
				$("#error_msg_form").html("please select country !!!");
				submit_form=false;
					return false;
				}
				if($("#fname").val()=="")
				{
				 
				$("#error_msg_form").html("please enter first name!!!");
				submit_form=false;
					return false;
				}
				
				if($("#lname").val()=="")
				{
				 
				$("#error_msg_form").html("please enter last name !!!");
				submit_form=false;
					return false;
				}
				
				if($("#company_name").val()=="")
				{
				 
				$("#error_msg_form").html("please enter company name !!!");
				submit_form=false;
					return false;
				}
				
				
				if($("#cid").val()=="")
				{
				 
				$("#error_msg_form").html("please enter company identifictaion number !!!");
				submit_form=false;
					return false;
				}
				if($("#company_email_required").val()==1)
				{
				if(!checkEmail("company_email"))
				{
					submitForm = false;
					return false;
				}	
				}
				
				if($("#d_port_numberc").val()=="")
				{
					 
					$("#error_msg_form").html('Please enter company delivery port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#daddressc").val()=="")
				{
					 
					$("#error_msg_form").html('Please enter company delivery address');
					submit_form=false;
					return false;
				}
				  if($("#dzipc").val()=="" || $("#dzipc").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter company delivery zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcityc").val()=="" || $("#dcityc").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter company delivery city');
					submit_form=false;
					return false;
				}
				
				 if($('#invoice_addressc').val()==1)
				 {
				if($('#same_invoicec').val()==0)
				{
				
				
				if($("#iaddressc").val()=="" ||  $("#iaddressc").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_numberc").val()=="" ||  $("#i_port_numberc").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izipc").val()=="" || $("#izipc").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icityc").val()=="" || $("#icityc").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info_c').val()==1)
				 {
				 
				
				  if($("#pickup_city_c").val()=="" || $("#pickup_city_c").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter company pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode_c").val()=="" || $("#pickup_zipcode_c").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter company pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
				if($("#position_type").val()==0)
				{
				 
				$("#error_msg_form").html("please select your position !!!");
				submit_form=false;
					return false;
				}
				
				
				if(!checkEmail("email"))
				{
					submitForm = false;
					return false;
				}
				
				
			var send_data={};
				send_data.email=$("#email").val();
				$.ajax({
					type:"POST",
					url:"../checkmail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						checkEmailData=data1; 
						if(data1==0 || data1==2)
						{
							 
							$("#error_msg_form").html('Registration is not possible with given email address.');
							 submit_form=false;
							return false;
						}
						else
						{
							submit_form=true;
				var send_data={};
				send_data.cid=$("#cid").val();		
					$.ajax({
					type:"POST",
					url:"../checkCompanyId",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						checkEmailData=data1; 
						if(data1==0 || data1==2)
						{
							 
							$("#error_msg_form").html('Registration is not possible with given CID.');
							 submit_form=false;
							return false;
						}
						else
						{
							submit_form=true;
					if($('#company_email_required').val()==1)
					{
					var send_data={};
				send_data.company_email=$("#company_email").val();			
					$.ajax({
					type:"POST",
					url:"../checkCompanyEmail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						checkEmailData=data1; 
						if(data1==0 || data1==2)
						{
							 
							$("#error_msg_form").html('Registration is not possible with given work email.');
							 submit_form=false;
							return false;
						}
						else
						{
							submit_form=true;
			if($('#phone_detail').val()==1)
				 { 
				  
			if($("#phone_number").val()=="")
				{
					$("#error_msg_form").html('Please enter phone number.!!');
					submit_form=false;
					return false;
				}
				else if($("#phone_number").val().charAt(0)==0) 
				{
					$("#error_msg_form").html('Phone number cant start with Zero');
					submit_form=false;
					return false;
				}
				else if(isNaN($("#phone_number").val())) 
				{
					$("#error_msg_form").html('Phone number must be a numeric value');
					submit_form=false;
					return false;
				}
				else if($("#phone_number").val().length<5) 
				{
					$("#error_msg_form").html('Phone number must be minimum five digit');
					submit_form=false;
					return false;
				}
				else if($("#phone_number").val()==0) 
				{
					$("#error_msg_form").html('Phone number can not be Zero');
					submit_form=false;
					return false;
				}
			var send_data={};
			send_data.country_id=$('#cntry').val();
				 send_data.phone_number=$('#phone_number').val();
				 $.ajax({
							type:"POST",
							url:"../checkPhoneNumber",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 
								if(data1==0)
								{
								$('#verify_phone_detail_mandatory').val(0);	
								}
								 else
								 {
									 $('#verify_phone_detail_mandatory').val(1);
								 }
							}
						});
		
			
				 }
				 
				 
				if($('#identificator_info').val()==1)
				 { 
				 var bg_url = $('#image-data').css('background-image');
			$('#image-data1').val(bg_url);
			var bg_url = $('#image-data2').css('background-image');
			$('#image-data3').val(bg_url);
			if($('#identificator').val()==0)
			{
				$("#error_msg_form").html('Please select identificator type !!!'); 
				submit_form=false;
				return false;
			}
			 if($("#id_number").val()==null || $("#id_number").val()=="")
			{
				
				$("#error_msg_form").html('Please enter id number !!!'); 
				submit_form=false;
				return false;
				 
			}
			
			 if($("#issue_date").val()==null || $("#issue_date").val()=="")
			{
				
				$("#error_msg_form").html('Please enter issue date !!!'); 
				submit_form=false;
				return false;
				 
			}
			
			if($("#expiry_date").val()==null || $("#expiry_date").val()=="")
			{
				
				$("#error_msg_form").html('Please enter exiry date !!!'); 
				submit_form=false;
				return false;
				 
			}
			
			var send_data={};
			send_data.country_id=$('#cntry').val();
				 send_data.variation_id=$('#id_number').val();
				 $.ajax({
							type:"POST",
							url:"../checkUsedIdentificator",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1>0)
								{
								$("#errorMsg1").html('This ID has been used by another user. Please try using another ID'); 
								submit_form=false;		
								 submitFlag=0;
									
								return false;
								}
								else
								{
									submit_form=true;
							if($('#card_detail').val()==1)
							 {
							if($("#card_number").val()=="")
							{
							 
							$("#error_msg_form").html("please enter card number !!!");
							submit_form=false;
								return false;
							}
							
							if(isNaN($("#card_number").val()))
							{
							 
							$("#error_msg_form").html("please enter numeric value for card number !!!");
							submit_form=false;
								return false;
							}
							
							if($("#card_number").val().length!=16)
							{
							 
							$("#error_msg_form").html("please enter 16 digit numeric value for card number !!!");
							submit_form=false;
								return false;
							}	
							var send_data={};
						send_data.card_number=$('#card_number').val();
							$.ajax({
								type:"POST",
								url:"../checkCard",
								data:send_data,
								dataType:"text",
								contentType: "application/x-www-form-urlencoded;charset=utf-8",
								success: function(data1){
									 
									if(data1=='Invalid Card')
									{
										
										$("#error_msg_form").html("please enter a valid card !!!");
										submit_form=false;
										return false;
									}
									else
						{
							submit_form=true;
							 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
						}
						
									
								}
							});
							 }
				
				
				
				
				 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
								}
								 
							}
						});
			
			
				 }	 
				 
				else
				{
				submit_form=true;
				if($('#card_detail').val()==1)
				 {
				if($("#card_number").val()=="")
				{
				 
				$("#error_msg_form").html("please enter card number !!!");
				submit_form=false;
					return false;
				}
				
				if(isNaN($("#card_number").val()))
				{
				 
				$("#error_msg_form").html("please enter numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				
				if($("#card_number").val().length!=16)
				{
				 
				$("#error_msg_form").html("please enter 16 digit numeric value for card number !!!");
				submit_form=false;
					return false;
				}	
				var send_data={};
			send_data.card_number=$('#card_number').val();
				$.ajax({
					type:"POST",
					url:"../checkCard",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						 
						if(data1=='Invalid Card')
						{
							
							$("#error_msg_form").html("please enter a valid card !!!");
							submit_form=false;
							return false;
						}
						else
						{
							submit_form=true;
							 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
						}
						
					}
				});
				 }
				
				else
				{
				
				submit_form=true;
				 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
				}

				}
				
				if($('#card_detail').val()==1)
				 {
				if($("#card_number").val()=="")
				{
				 
				$("#error_msg_form").html("please enter card number !!!");
				submit_form=false;
					return false;
				}
				
				if(isNaN($("#card_number").val()))
				{
				 
				$("#error_msg_form").html("please enter numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				
				if($("#card_number").val().length!=16)
				{
				 
				$("#error_msg_form").html("please enter 16 digit numeric value for card number !!!");
				submit_form=false;
					return false;
				}	
				var send_data={};
			send_data.card_number=$('#card_number').val();
				$.ajax({
					type:"POST",
					url:"../checkCard",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						 
						if(data1=='Invalid Card')
						{
							
							$("#error_msg_form").html("please enter a valid card !!!");
							submit_form=false;
							return false;
						}
						else
						{
							submit_form=true;
							 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
						}
						
					}
				});
				 }
				
				else
				{
				
				submit_form=true;
				 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
				}
				
				
					}
						
							}
							});	
						}
						else
						{
							submit_form=true;
			if($('#phone_detail').val()==1)
				 { 
				  
			if($("#phone_number").val()=="")
				{
					$("#error_msg_form").html('Please enter phone number.!!');
					submit_form=false;
					return false;
				}
				else if($("#phone_number").val().charAt(0)==0) 
				{
					$("#error_msg_form").html('Phone number cant start with Zero');
					submit_form=false;
					return false;
				}
				else if(isNaN($("#phone_number").val())) 
				{
					$("#error_msg_form").html('Phone number must be a numeric value');
					submit_form=false;
					return false;
				}
				else if($("#phone_number").val().length<5) 
				{
					$("#error_msg_form").html('Phone number must be minimum five digit');
					submit_form=false;
					return false;
				}
				else if($("#phone_number").val()==0) 
				{
					$("#error_msg_form").html('Phone number can not be Zero');
					submit_form=false;
					return false;
				}
			var send_data={};
			send_data.country_id=$('#cntry').val();
				 send_data.phone_number=$('#phone_number').val();
				 $.ajax({
							type:"POST",
							url:"../checkPhoneNumber",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								 
								if(data1==0)
								{
								$('#verify_phone_detail_mandatory').val(0);	
								}
								 else
								 {
									 $('#verify_phone_detail_mandatory').val(1);
								 }
							}
						});
		
			
				 }
				 
				 
				if($('#identificator_info').val()==1)
				 { 
				 var bg_url = $('#image-data').css('background-image');
			$('#image-data1').val(bg_url);
			var bg_url = $('#image-data2').css('background-image');
			$('#image-data3').val(bg_url);
			if($('#identificator').val()==0)
			{
				$("#error_msg_form").html('Please select identificator type !!!'); 
				submit_form=false;
				return false;
			}
			 if($("#id_number").val()==null || $("#id_number").val()=="")
			{
				
				$("#error_msg_form").html('Please enter id number !!!'); 
				submit_form=false;
				return false;
				 
			}
			
			 if($("#issue_date").val()==null || $("#issue_date").val()=="")
			{
				
				$("#error_msg_form").html('Please enter issue date !!!'); 
				submit_form=false;
				return false;
				 
			}
			
			if($("#expiry_date").val()==null || $("#expiry_date").val()=="")
			{
				
				$("#error_msg_form").html('Please enter exiry date !!!'); 
				submit_form=false;
				return false;
				 
			}
			
			var send_data={};
			send_data.country_id=$('#cntry').val();
				 send_data.variation_id=$('#id_number').val();
				 $.ajax({
							type:"POST",
							url:"../checkUsedIdentificator",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								
								if(data1>0)
								{
								$("#errorMsg1").html('This ID has been used by another user. Please try using another ID'); 
								submit_form=false;		
								 submitFlag=0;
									
								return false;
								}
								else
								{
									submit_form=true;
									if($('#card_detail').val()==1)
				 {
				if($("#card_number").val()=="")
				{
				 
				$("#error_msg_form").html("please enter card number !!!");
				submit_form=false;
					return false;
				}
				
				if(isNaN($("#card_number").val()))
				{
				 
				$("#error_msg_form").html("please enter numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				
				if($("#card_number").val().length!=16)
				{
				 
				$("#error_msg_form").html("please enter 16 digit numeric value for card number !!!");
				submit_form=false;
					return false;
				}	
				var send_data={};
			send_data.card_number=$('#card_number').val();
				$.ajax({
					type:"POST",
					url:"../checkCard",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						 
						if(data1=='Invalid Card')
						{
							
							$("#error_msg_form").html("please enter a valid card !!!");
							submit_form=false;
							return false;
						}
							{
							 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
						}
						
					}
				});
				 }
				
				
				
				
				 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
								}
								 
							}
						});
			
			
				 }	 
				 
				else
				{
				submit_form=true;
				if($('#card_detail').val()==1)
				 {
				if($("#card_number").val()=="")
				{
				 
				$("#error_msg_form").html("please enter card number !!!");
				submit_form=false;
					return false;
				}
				
				if(isNaN($("#card_number").val()))
				{
				 
				$("#error_msg_form").html("please enter numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				
				if($("#card_number").val().length!=16)
				{
				 
				$("#error_msg_form").html("please enter 16 digit numeric value for card number !!!");
				submit_form=false;
					return false;
				}	
				var send_data={};
			send_data.card_number=$('#card_number').val();
				$.ajax({
					type:"POST",
					url:"../checkCard",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
					 
						if(data1=='Invalid Card')
						{
							
							$("#error_msg_form").html("please enter a valid card !!!");
							submit_form=false;
							return false;
						}
						else
						{
							submit_form=true;
							 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
						}
						
					}
				});
				 }
				
				else
				{
				submit_form=true;
				
				 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
				}

				}
				
				if($('#card_detail').val()==1)
				 {
				if($("#card_number").val()=="")
				{
				 
				$("#error_msg_form").html("please enter card number !!!");
				submit_form=false;
					return false;
				}
				
				if(isNaN($("#card_number").val()))
				{
				 
				$("#error_msg_form").html("please enter numeric value for card number !!!");
				submit_form=false;
					return false;
				}
				
				if($("#card_number").val().length!=16)
				{
				 
				$("#error_msg_form").html("please enter 16 digit numeric value for card number !!!");
				submit_form=false;
					return false;
				}	
				var send_data={};
			send_data.card_number=$('#card_number').val();
				$.ajax({
					type:"POST",
					url:"../checkCard",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						 
						if(data1=='Invalid Card')
						{
							
							$("#error_msg_form").html("please enter a valid card !!!");
							submit_form=false;
							return false;
						}
						else
						{
							submit_form=true;
							 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
						}
						
					}
				});
				 }
				
				else
				{
				
				submit_form=true;
				 if($('#delivery_address').val()==1)
				 {
				 if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					submit_form=false;
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					submit_form=false;
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					submit_form=false;
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					submit_form=false;
					return false;
				}
				 }
				 if($('#invoice_address').val()==1)
				 {
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					submit_form=false;
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					submit_form=false;
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					submit_form=false;
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					submit_form=false;
					return false;
				}
				}
				
				 }
				 
				 if($('#pickup_info').val()==1)
				 {
				 
				
				  if($("#pickup_city").val()=="" || $("#pickup_city").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup city');
					submit_form=false;
					return false;
				}
				
				 if($("#pickup_zipcode").val()=="" || $("#pickup_zipcode").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter pickup zipcode');
					submit_form=false;
					return false;
				}
				
				
				 }
				 
					 
				  if(submit_form==true)
				  {
				 document.getElementById('save_indexing').submit();
				  }
				}
				
				
					}
							
					
						}	
						
							}
							});
						}
				}
				});
				 
				 
				}
		</script>
			
			
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="bg_212b3a ffamily_avenir " >
		 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
				 
	
	<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40   xs-mart0 xs-pad0">
								<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn ffamily_avenir">Signup</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please add your details to create your account.</a></div>
									
									<form action="../saveDetails/<?php echo $data['cid']; ?>" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
									<div class="on_clmn mart10 xxs-mart10">
											
										<div class="pos_rel">
											<select class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" name="cntry" id="cntry" >
											<option value="0" class="lgtgrey2_bg">Select country</option>
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>                            
											</select>
											</div>
									</div>
									<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="fname" id="fname"  placeholder="First name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="lname" id="lname"  placeholder="Last name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"     /> 
												 
											</div>
											</div>
										</div>
										
										
										<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="email" id="email"  placeholder="du@epostadress.se" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
										 
												 
										</div>
										
										
										<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="company_name" id="company_name"  placeholder="Company name" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
										 
												 
										</div>
										
										
										<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="cid" id="cid"  placeholder="Company identification number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
										 
												 
										</div>
										
										
										
										<input type="hidden" name="company_email_required" id="company_email_required"  value="<?php echo $signupFieldsInfo['company_email']; ?>" />
										<?php if($signupFieldsInfo['company_email']==1) { ?>
									<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="company_email" id="company_email"  placeholder="Company email" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
										 
												 
										</div>
										<?php } ?>
										
										 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company delivery address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="daddressc" id="daddressc"  placeholder="Delivery address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="d_port_numberc" id="d_port_numberc"  placeholder="Delivery Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="dzipc" id="dzipc"  placeholder="Zipcoe" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="dcityc" id="dcityc"  placeholder="Delivery city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												
											</div>
											</div>
										</div>
										
										
										 
										<input type="hidden" name="company_invoice_address" id="company_invoice_address"  value="<?php echo $signupFieldsInfo['company_invoice_address']; ?>" /> 
										<?php if($signupFieldsInfo['company_invoice_address']==1) { ?>
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If Invoice address is same as delivery address?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked" onclick="updateInvoicec(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<?php } ?>
										<div id="ShowInvoicec" class="hidden">
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company invoice address" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
										<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="iaddressc" id="iaddressc"  placeholder="Invoice address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="i_port_numberc" id="i_port_numberc"  placeholder="Invoice Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="izipc" id="izipc"  placeholder="Zipcoe" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="icityc" id="icityc"  placeholder="Invoice city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												
											</div>
											</div>
										</div>
										</div>
										<input type="hidden" name="company_pickup_info" id="company_pickup_info"  value="<?php echo $signupFieldsInfo['company_pickup_info']; ?>" /> 
										<?php if($signupFieldsInfo['company_pickup_info']==1) {  ?> 
									 
									<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Company Pickup info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
									<div class="on_clmn mart20">
									<div class="thr_clmn  wi_70 padr10">	 
									<div class="pos_rel"  >
													
													
													<input type="text" name="pickup_city_c" id="pickup_city_c"   placeholder="Pickup city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    >
													
													 
												</div>
												</div> 
												<div class="thr_clmn  wi_30 padr10">	 
									<div class="pos_rel"  >
													
													
													<input type="text" name="pickup_zipcode_c" id="pickup_zipcode_c"   placeholder="Pickup zip" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    >
													
													 
												</div>
												</div> 
									</div>
										<?php } ?>
										
										
										<input type="hidden" name="company_digital_delivery" id="company_digital_delivery"  value="<?php echo $signupFieldsInfo['company_digital_delivery']; ?>" /> 
										
											<div class="on_clmn mart20    val1 ">
									<div class="thr_clmn  wi_30 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Your role" class="wi_100 rbrdr pad10 brdb_red_ff2828  tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_70 padl20" id="valy">
								<div class="pos_rel">											
											<select name="position_type" id="position_type" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828    fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" onchange="checkPosition(this.value);"> 
											 <option value="0" class="lgtgrey2_bg">Select</option>
														<option value="1" class="lgtgrey2_bg">Vanlig anställd</option>
													<option value="2" class="lgtgrey2_bg">Chef / Ledare</option>
													<option value="3" class="lgtgrey2_bg">Ägare</option>
														 
											</select>
											</div>
											</div>
											</div>
											 <div class="on_clmn mart20  " id="isHeadquarter" style="display:none;">
												<div class="thr_clmn  wi_30 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Is this headquarter?" class="wi_100 rbrdr pad10 brdb_red_ff2828  tall  minhei_65p xxs-minhei_60p fsz18 black_txt ffamily_avenir" readonly="">
									</div>
									</div>
										<div class="thr_clmn  wi_70 padl20" id="valy">
								<div class="pos_rel">											
											<select name="is_headquarter" id="is_headquarter" class="default_view wi_100 mart0  trans_bg nobrdr nobrdt nobrdl brdb_red_ff2828    fsz18  minhei_65p xxs-minhei_60p   trans_bg dropdown-bg  tall padl0 ffamily_avenir red_f5a0a5_txt" style="text-align-last:center;" > 
											<option value="0" class="lgtgrey2_bg">Nej </option>
													<option value="1" class="lgtgrey2_bg">Ja</option>
														 
											</select>
											</div>
											</div>
											 
											</div>
										<input type="hidden" name="verify_email" id="verify_email"  value="<?php echo $signupFieldsInfo['verify_email']; ?>" /> 
										
										
										<?php if($signupFieldsInfo['phone_detail']==1) { ?>
										<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="phone_number" id="phone_number"  placeholder="Phone number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
										 
												 
										</div>
										
										<?php } ?>
										<input type="hidden" name="verify_phone_detail_mandatory" id="verify_phone_detail_mandatory"  value="0" /> 
										<input type="hidden" name="verify_phone_detail" id="verify_phone_detail"  value="<?php echo $signupFieldsInfo['verify_phone_detail']; ?>" /> 
										<input type="hidden" name="phone_detail" id="phone_detail"  value="<?php echo $signupFieldsInfo['phone_detail']; ?>" /> 
												 
										<?php if($signupFieldsInfo['identificator_info']==1) { ?> 
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Identificator info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										<div class="clear"></div>
										 	<div class="mart20">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: https://www.safeqloud.com/html/usercontent/images/default-profile-pic.jpg;" id="image-data" name="image-data"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
						</div>
								 
								<div class="marb25">
						<div class="wi_100 xxs-wi_100 xxs-padrl85 padrl140">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data3" id="image-data3" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: https://www.safeqloud.com/html/usercontent/images/default-profile-pic.jpg;" id="image-data2" name="image-data2"></div>
											<div class="subimg_load">
												<a href="#" class="load_button" style="background: #FFF;color: #999; display:none;">Change</a>
												
												 
											</div>
										</div>
									</div>
								
								 
							</div>
						</div>	 
								 
											<div class="on_clmn mart10 xxs-mart10">
											
										<div class="pos_rel">
											<select class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" name="identificator" id="identificator" onchange="showIdDetails(this.value);">
											<option value="0" class="lgtgrey2_bg">Select</option> 													
															<option value="1" class="lgtgrey2_bg">ID </option>
														 <option value="2" class="lgtgrey2_bg">Driver license</option>
														<option value="3" class="lgtgrey2_bg">Passport</option>
														                         
											</select>
											</div>
									</div>
										
										<div id="showDetails" class="hidden">
										<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="id_number" id="id_number"  placeholder="ID number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
										 
												 
										</div>
										
										<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="date" name="issue_date" id="issue_date"  placeholder="ID number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" max="<?php echo date('Y-m-d'); ?>" /> 
												 
											</div>
										 
												 
										</div>
										
										
										<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="date" name="expiry_date" id="expiry_date"  placeholder="ID number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" min="<?php echo date('Y-m-d'); ?>" /> 
												 
											</div>
										 
												 
										</div>
										</div>
										
										<?php } ?>
										
										<input type="hidden" name="identificator_info" id="identificator_info"  value="<?php echo $signupFieldsInfo['identificator_info']; ?>" /> 
										
									<?php if($signupFieldsInfo['card_detail']==1) { ?> 
									<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Card info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										<div class="on_clmn mart20 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="card_number" id="card_number"  placeholder="Card number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
										 
												 
										</div>
										
										<div class="on_clmn mart20 ">
										 <div class="thr_clmn  wi_33 padr5">
											<div class="pos_rel">
												
												<select class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" name="exp_month" id="exp_month" >
											<option value="1" class="lgtgrey2_bg">Jan</option>
												<option value="2" class="lgtgrey2_bg">Feb</option>	
												<option value="3" class="lgtgrey2_bg">March</option>
												<option value="4" class="lgtgrey2_bg">April</option>
												<option value="5" class="lgtgrey2_bg">May</option>
												<option value="6" class="lgtgrey2_bg">June</option>
												<option value="7" class="lgtgrey2_bg">July</option>
												<option value="8" class="lgtgrey2_bg">Aug</option>
												<option value="9" class="lgtgrey2_bg">Sep</option>
												<option value="10" class="lgtgrey2_bg">Oct</option>
												<option value="11" class="lgtgrey2_bg">Nov</option>
												<option value="12" class="lgtgrey2_bg">Dec</option>                           
											</select>
												 
											</div>
										 </div>
										<div class="thr_clmn  wi_33 padr5">
											<div class="pos_rel">
												
												<select class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" name="exp_year" id="exp_year" >
											 
												<option value="2021" class="lgtgrey2_bg">2021</option>
												<option value="2022" class="lgtgrey2_bg">2022</option>
												<option value="2023" class="lgtgrey2_bg">2023</option>
												<option value="2024" class="lgtgrey2_bg">2024</option>
												<option value="2025" class="lgtgrey2_bg">2025</option>
												<option value="2026" class="lgtgrey2_bg">2026</option>
												<option value="2027" class="lgtgrey2_bg">2027</option>
												<option value="2028" class="lgtgrey2_bg">2028</option>
												<option value="2029" class="lgtgrey2_bg">2029</option>
												<option value="2030" class="lgtgrey2_bg">2030</option>    
												<option value="2031" class="lgtgrey2_bg">2031</option>
												<option value="2032" class="lgtgrey2_bg">2032</option>   												
											</select>
												 
											</div>
										 </div>		
											<div class="thr_clmn  wi_33 ">
											<div class="pos_rel">
												
												<input type="text" name="cvv" id="cvv"  placeholder="CVV" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  /> 
												 
											</div>
										 </div>	
										</div>
										
										<input type="hidden" name="card_type" id="card_type" class="form-control required" >
										
									<?php } ?>
										<input type="hidden" name="card_detail" id="card_detail"  value="<?php echo $signupFieldsInfo['card_detail']; ?>" /> 
										
									<?php if($signupFieldsInfo['delivery_address']==1 || $signupFieldsInfo['invoice_address']==1) { ?>		
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Address details" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
										
									<?php } ?>
										<?php if($signupFieldsInfo['delivery_address']==1) { ?>	
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If name on the door is same as yours?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked" onclick="updateName(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
									<div class="on_clmn mart0 hidden" id="nameInfo">
										 
										<div class="pos_rel">
										<input type="text" name="flname"  placeholder="Name on the door" id="flname"  class="ffamily_avenir txtind10 fsz18   wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc red_f5a0a5_txt brdb_red_ff2828"     />
										
										  
									</div>
									 
									 
									</div>
										
										<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="addrs" id="addrs"  placeholder="Delivery address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" /> 
												 
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="pnumber" id="pnumber"  placeholder="Delivery Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"     /> 
												 
											</div>
											</div>
										</div>
									 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="dzip" id="dzip"  placeholder="Zipcode" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"     /> 
												 
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="dcity" id="dcity"  placeholder="Delivery city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"      /> 
												 
											</div>
											</div>
										</div>
											<div class="on_clmn mart20">
										 
									<div class="pos_rel"  >
													
													
													<input type="text" name="entry_code" id="entry_code"   placeholder="Entry code" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr llgrey_txt brdb  xxs-minhei_60p ffamily_avenir"    >
													
													 
												</div>
												 
									</div>
										<?php } ?>
											<?php if($signupFieldsInfo['delivery_address']==1 && $signupFieldsInfo['invoice_address']==1) { ?>	
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If Invoice address is same as delivery address?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   checked"  onclick="updateInvoice(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
											<?php }   if($signupFieldsInfo['invoice_address']==1) {  ?> 	
											
										<div id="ShowInvoice" class="<?php if($signupFieldsInfo['delivery_address']==1 && $signupFieldsInfo['invoice_address']==1) { echo 'hidden'; } ?> ">
										<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="iaddress" id="iaddress"  placeholder="Invoice address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												 
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="i_port_number" id="i_port_number"  placeholder="Invoice Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   /> 
												 
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="izip" id="izip"  placeholder="Zipcode" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    /> 
												 
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="icity" id="icity"  placeholder="Invoice city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"     /> 
												 
											</div>
											</div>
										</div>
										</div>
										<?php } if($signupFieldsInfo['pickup_info']==1) {  ?> 
									 
									<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Pickup info" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										 
											 
									 

										</div>
									<div class="on_clmn mart20">
									<div class="thr_clmn  wi_70 padr10">	 
									<div class="pos_rel"  >
													
													
													<input type="text" name="pickup_city" id="pickup_city"   placeholder="Pickup city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    >
													
													 
												</div>
												</div> 
												<div class="thr_clmn  wi_30 padr10">	 
									<div class="pos_rel"  >
													
													
													<input type="text" name="pickup_zipcode" id="pickup_zipcode"   placeholder="Pickup zip" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"    >
													
													 
												</div>
												</div> 
									</div>
										<?php } ?>
									 <input type="hidden" name="delivery_address" id="delivery_address"  value="<?php echo $signupFieldsInfo['delivery_address']; ?>" /> 
									 <input type="hidden" name="invoice_address" id="invoice_address"  value="<?php echo $signupFieldsInfo['invoice_address']; ?>" /> 
									 <input type="hidden" name="pickup_info" id="pickup_info"  value="<?php echo $signupFieldsInfo['pickup_info']; ?>" /> 
									
									<input type="hidden" id="same_name" name="same_name" value="1" />
									 <input type="hidden" id="same_invoice" name="same_invoice" value="<?php if($signupFieldsInfo['delivery_address']==1 && $signupFieldsInfo['invoice_address']==1) { echo 1; } else if($signupFieldsInfo['delivery_address']==1 && $signupFieldsInfo['invoice_address']==0) { echo 1; }else echo 0; ?>" />
									 
									 <input type="hidden" id="same_invoice_company" name="same_invoice_company" value="1" />
									 
									<div class="valm fsz20 red_txt padtb20" id="error_msg_form"> </div>	
								<div class="clear"></div>
								<input type="hidden" id="lstatus" name="lstatus" value='0' />
								<div class="valm fsz20 red_txt marb35" id="error_msg_form"> </div>
							<div class="padtb20 xxs-talc talc">
								
								<button type="button" name="forward" class="forword minhei_55p t_67cff7_bg fsz18" onclick="informEmployee();">Submit</button>
								
							</div>
							<!-- /bottom-wizard -->
						</form>
						
					
					</div>
					<!-- /Wizard container -->
			</div>
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		  
	 
	
	
	<div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb  fsz14 brdrad10 popup_shadow lgtgrey2_bg" id="gratis_popup_error1">
		<div class="modal-content nobrdb talc box_shadox brdrad10 lgtgrey2_bg">
			
			
			<div class="pad25 lgtgrey2_bg brdradtr10">
				<img src="../../../../html/usercontent/images/no_result_found.png" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt" id="error_msg_form1">Du måste....</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb20 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16 black_txt" id="error_msg_form2"> </span>
				</div>
				
				
			</div>
			<div class="on_clmn padt20">
				<input type="button" value="Submit" class="wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt bold curp" onclick="sendInvitation();">
				
			</div>
			
			<a href="#" class="close_popup_modal padt10 fsz18">Close</a>
	</div>
	
	</div>
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/vex-theme-default.css" />

<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
 
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>	
	 
 
</body>
</html>