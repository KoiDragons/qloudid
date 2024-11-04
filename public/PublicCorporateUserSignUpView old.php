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
		 
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
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
	function expandThis(id)
{
	 if($("#profile"+id).hasClass('show_data')) 
	 {
		 $("#profile"+id).attr('style','display:block;');
		 $("#profile"+id).removeClass('show_data');
	 }
	else
	{
		$("#profile"+id).addClass('show_data');
		$("#profile"+id).attr('style','display:none;');
	}	
	
}

function readURL(input) {
	 
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
			 
            $('#image-data')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data1').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
    }

	 
} 

function readURL2(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
		reader.onload = function (e) {
            $('#image-data2')
                .attr('style','background-image:url('+e.target.result+')');
				 
				$('#image-data3').val(e.target.result);
				 
        };
		 
	
        reader.readAsDataURL(input.files[0]);
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
				
				if(!checkEmail("email"))
				{
					submitForm = false;
					return false;
				}
				
				
			var send_data={};
				send_data.email=$("#email").val();
				$.ajax({
					type:"POST",
					url:"../../checkmail",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						checkEmailData=data1; 
						if(data1==0)
						{
							 
							$("#error_msg_form").html('Registration is not possible with given email address.');
							 submit_form=false;
							return false;
						}
						else
						{
							$("#account_status").val(data1);
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
							url:"../../checkPhoneNumber",
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
				  
			
			if($('#image-data1').val()=='')
			{
			$("#error_msg_form").html('Please select front image !!!'); 
				submit_form=false;
				return false;	
			}
			
			if($('#image-data3').val()=='')
			{
			$("#error_msg_form").html('Please select back image !!!'); 
				submit_form=false;
				return false;	
			}
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
							url:"../../checkUsedIdentificator",
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
					url:"../../checkCard",
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
					url:"../../checkCard",
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
					url:"../../checkCard",
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
		</script>
			
			
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="bg_212b3a ffamily_avenir" >
		<div class="column_m header   bs_bb trans_bg " style="height:97.44px; border-bottom: 1px solid #353945;">
         <div class="header__center center padding2080 xs-padding032 " style="display: flex;
    align-items: center; width: 100%;
    max-width: 1280px;
    margin: 0 auto;">
	<a class="header__logo xs-fsz20 " href="#" style="border: 2px solid #ffffff; 
    padding: 10px;
    color: white;
    border-radius: 5px;
    font-family: Avenir;
    font-size: 20PX;
    line-height:25px !important">Back</a>
</div>
      </div>
	<div class="clear"></div>
				 
	
	<div class="column_m   talc lgn_hight_22 fsz16 mart40 xs-mart20" id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10 mart40   xs-mart0 xs-pad0">
					<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz65 xxs-fsz45 lgn_hight_70 xxs-lgn_hight_50 padb0 white_txt trn ffamily_avenir changedText">Signup</h1>
									</div>
								 <div class=" xxs-tall talc   ffamily_avenir"> <a href="#" class="txt_777E90 fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_30 changedText">Please add your details to create your account.</a></div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc">
									 
									<?php if($data['domain_id_decrypt']==1) { ?>
									<a href="https://www.qloudid.com/user/index.php/LoginAccount/loginPurchaseVerify?response_type=code&client_id=YzhzVmorMTJWNVBsbHJIQkVYTTRva3JRbTdxcG9aQi9HejFaTGpLT3dvZz0=&state=xyz&purchase=1&total=0" class="txt_777E90 fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_30 changedText" >Please click here to use Qloud ID app to complete the purchase.</a></div>
									<?php } ?>
									
									<form action="../../saveDetails/<?php echo $data['cid']; ?>/<?php echo $data['domain_id']; ?>" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
									 	<div class="clear"></div> 
							 	<div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt20">
								<a href="javascript:void(0);" class="expander-toggler white_txt xs-fsz16 tall bg_2F3C4F  padrl30 padtb10 brdrad5" onclick="expandThis(1);">Basic information 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile1" class="" style="display: block;">	
									<div class="on_clmn mart10 xxs-mart10">
											
										<div class="pos_rel">
											<select class="wi_100 nobrd   brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 txt_777E90  ffamily_avenir  bg_2F3C4F  floating__input padt25" name="cntry" id="cntry" >
											<option value="0" class="lgtgrey2_bg">Select country</option>
												<?php  foreach($resultContry as $category => $value) 
															{
																$category = htmlspecialchars($category); 
															?>
															
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg"><?php echo $value['country_name']; ?></option>
														<?php 	}	?>                            
											</select>
											<label for="cntry" class="floating__label tall nobold padl10" data-content="Country" >
											<span class="hidden--visually">
											  Zip code</span></label> 
											</div>
									</div>
									<div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="fname" id="fname"  placeholder="First name" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" /> 
												 <label for="fname" class="floating__label tall nobold padl10" data-content="First name" >
											<span class="hidden--visually">
											  Zip code</span></label> 
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="lname" id="lname"  placeholder="Last name" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"     /> 
												 <label for="lname" class="floating__label tall nobold padl10" data-content="Last name" >
											<span class="hidden--visually">
											  Zip code</span></label> 
											</div>
											</div>
										</div>
										
										
										<div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="email" id="email"  placeholder="du@epostadress.se" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" /> 
												 <label for="email" class="floating__label tall nobold padl10" data-content="Email" >
											<span class="hidden--visually">
											  Zip code</span></label> 
											</div>
										 
												 
										</div>
										</div>
										 
										<input type="hidden" name="verify_email" id="verify_email"  value="<?php echo $signupFieldsInfo['verify_email']; ?>" /> 
										
										<div class="clear"></div>
										<?php if($signupFieldsInfo['phone_detail']==1) { ?>
										<div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt35">
								<a href="javascript:void(0);" class="expander-toggler white_txt xs-fsz16 tall bg_2F3C4F  padrl30 padtb10 brdrad5" onclick="expandThis(2);">Phone number 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile2" class="" style="display: block;">	
										<div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="phone_number" id="phone_number"  placeholder="Phone number" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" /> 
												<label for="phone_number" class="floating__label tall nobold padl10" data-content="Phone number" >
											<span class="hidden--visually">
											  Zip code</span></label> 
											</div>
										 
												 
										</div>
										
										<?php } ?>
										<input type="hidden" name="verify_phone_detail_mandatory" id="verify_phone_detail_mandatory"  value="0" /> 
										<input type="hidden" name="verify_phone_detail" id="verify_phone_detail"  value="<?php echo $signupFieldsInfo['verify_phone_detail']; ?>" /> 
										<input type="hidden" name="phone_detail" id="phone_detail"  value="<?php echo $signupFieldsInfo['phone_detail']; ?>" /> 
												 </div>
												 <div class="clear"></div>
										<?php if($signupFieldsInfo['identificator_info']==1) { ?> 
										<div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt35">
								<a href="javascript:void(0);" class="expander-toggler white_txt xs-fsz16 tall bg_2F3C4F  padrl30 padtb10 brdrad5" onclick="expandThis(3);">Identificator 
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile3" class="" style="display: block;">
										 
										<div class="clear"></div>
										 	<div class="on_clmn mart10 xxs-mart10">
											<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
						<div class="wi_100 xxs-wi_100">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data1" id="image-data1" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: <?php //echo $value_a; ?>;" id="image-data" name="image-data"></div>
											 
										</div>
									</div>
								</div>
						</div>
								 
							</div>
						
						
						 
								 
						<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">		 
						<div class="wi_100 xxs-wi_100">
								
									<div class="wp_columns_upload wp_columns_upload_custom marb20 brd brdclr_white ">
										<input type="hidden" name="image-data3" id="image-data3" value="<?php //echo $value_a; ?>" class="hidden-image-data" />
										
										
										<div class="imgwrap nobrd ">
								<div class="cropped_image  grey_brd5 " style="background-image: <?php //echo $value_b; ?>;" id="image-data2" name="image-data2"></div>
											 
										</div>
									</div>
								
								</div> 
							</div>
						</div>	 
						</div>	
						<div class="on_clmn mart10 xxs-mart10">
									<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 talc">
											
											<label class="forword " style="border-radius: 50px; background: #ffffff; color: #777E90;">
												Front Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL(this);">
											</label>
											</div></div>
											
											</div>
										</div>
										<div class="thr_clmn  wi_50 padr10"  >
										<div class="pos_rel">
											<div class="wi_100  bs_bb padrl5 padb10 "><div class="wi_100 talc">
											
											<label class="forword " style="border-radius: 50px; background: #ffffff; color: #777E90;">
												Back Photo <input type="file" name="file1" id="file1" style="display: none;" onchange="readURL2(this);">
											</label>
											</div></div>
											
											</div>
											</div>
											
										</div>	 
								 
											<div class="on_clmn mart10 xxs-mart10">
											
										<div class="pos_rel">
											<select class="wi_100 nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" name="identificator" id="identificator" onchange="showIdDetails(this.value);">
											 
														<option value="3" class="lgtgrey2_bg">Passport</option>
														                         
											</select>
											<label for="identificator" class="floating__label tall nobold padl10" data-content="Identificator" >
											<span class="hidden--visually">
											  Zip code</span></label> 
											</div>
									</div>
										
										<div id="showDetails" class="">
										<div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="id_number" id="id_number"  placeholder="ID number" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" /> 
												<label for="id_number" class="floating__label tall nobold padl10" data-content="ID Number" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
										 
												 
										</div>
										
										<div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="date" name="issue_date" id="issue_date"  placeholder="ID number" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" max="<?php echo date('Y-m-d'); ?>" /> 
												 <label for="issue_date" class="floating__label tall nobold padl10" data-content="Issue date" >
											<span class="hidden--visually">
											  Zip code</span></label> 
											</div>
										 
												 
										</div>
										
										
										<div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="date" name="expiry_date" id="expiry_date"  placeholder="ID number" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" min="<?php echo date('Y-m-d'); ?>" /> 
												<label for="expiry_date" class="floating__label tall nobold padl10" data-content="Expiry date" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
										 
												 
										</div>
										</div>
										</div>
										<?php } ?>
										<div class="clear"></div>
										<input type="hidden" name="identificator_info" id="identificator_info"  value="<?php echo $signupFieldsInfo['identificator_info']; ?>" /> 
										
									<?php if($signupFieldsInfo['card_detail']==1) { ?> 
									<div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt35">
								<a href="javascript:void(0);" class="expander-toggler white_txt xs-fsz16 tall bg_2F3C4F  padrl30 padtb10 brdrad5" onclick="expandThis(4);">Card detail
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile4" class="" style="display: block;">
									 
										<div class="on_clmn mart10 ">
										 
											<div class="pos_rel">
												
												<input type="text" name="card_number" id="card_number"  placeholder="Card number" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" /> 
												 	<label for="card_number" class="floating__label tall nobold padl10" data-content="Card number" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
										 
												 
										</div>
										
										<div class="on_clmn mart10 ">
										 <div class="thr_clmn  wi_33 padr5">
											<div class="pos_rel">
												
												<select class="wi_100 nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" name="exp_month" id="exp_month" >
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
												<label for="exp_month" class="floating__label tall nobold padl10" data-content="Expiry month" >
											<span class="hidden--visually">
											  Zip code</span></label>  	 
											</div>
										 </div>
										<div class="thr_clmn  wi_33 padr5">
											<div class="pos_rel">
												
												<select class="wi_100 nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" name="exp_year" id="exp_year" >
											 
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
												 	<label for="exp_year" class="floating__label tall nobold padl10" data-content="Expiry year" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
										 </div>		
											<div class="thr_clmn  wi_33 ">
											<div class="pos_rel">
												
												<input type="text" name="cvv" id="cvv"  placeholder="CVV" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"  /> 
													<label for="cvv" class="floating__label tall nobold padl10" data-content="CVV" >
											<span class="hidden--visually">
											  Zip code</span></label>   
											</div>
										 </div>	
										</div>
										
										<input type="hidden" name="card_type" id="card_type" class="form-control required" >
										</div>
									<?php } ?>
										<input type="hidden" name="card_detail" id="card_detail"  value="<?php echo $signupFieldsInfo['card_detail']; ?>" /> 
										<div class="clear"></div>
									<?php if($signupFieldsInfo['delivery_address']==1 || $signupFieldsInfo['invoice_address']==1) { ?>	
								<div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt35">
								<a href="javascript:void(0);" class="expander-toggler white_txt xs-fsz16 tall bg_2F3C4F  padrl30 padtb10 brdrad5" onclick="expandThis(5);">Address
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile5" class="" style="display: block;">									
									<?php if($signupFieldsInfo['delivery_address']==1) { ?>	
									 
							 
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If name on the door is same as yours?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 white_txt ffamily_avenir" readonly="">
										 
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
										
										<div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="addrs" id="addrs"  placeholder="Delivery address" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25" /> 
												 	<label for="addrs" class="floating__label tall nobold padl10" data-content="Street address" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="pnumber" id="pnumber"  placeholder="Delivery Port number" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"     /> 
												 	<label for="pnumber" class="floating__label tall nobold padl10" data-content="Port number" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
											</div>
										</div>
									 <div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="dzip" id="dzip"  placeholder="Zipcode" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"     /> 
													<label for="dzip" class="floating__label tall nobold padl10" data-content="Zipcode" >
											<span class="hidden--visually">
											  Zip code</span></label>   
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="dcity" id="dcity"  placeholder="Delivery city" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"      /> 
												 	<label for="dcity" class="floating__label tall nobold padl10" data-content="City" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
											</div>
										</div>
											<div class="on_clmn mart10">
										 
									<div class="pos_rel"  >
													
													
													<input type="text" name="entry_code" id="entry_code"   placeholder="Entry code" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"    >
														<label for="entry_code" class="floating__label tall nobold padl10" data-content="Entry code" >
											<span class="hidden--visually">
											  Zip code</span></label>  
													 
												</div>
												 
									</div>
									 
										<?php } ?>
											
											
											<?php if($signupFieldsInfo['delivery_address']==1) { ?>	
											 
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If Invoice address is same as delivery address?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 white_txt ffamily_avenir" readonly="">
										 
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
										<div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="iaddress" id="iaddress"  placeholder="Invoice address" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"   /> 
													<label for="iaddress" class="floating__label tall nobold padl10" data-content="Stree address" >
											<span class="hidden--visually">
											  Zip code</span></label>   
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="i_port_number" id="i_port_number"  placeholder="Invoice Port number" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"   /> 
												 	<label for="i_port_number" class="floating__label tall nobold padl10" data-content="Port number" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart10 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="izip" id="izip"  placeholder="Zipcode" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"    /> 
													<label for="izip" class="floating__label tall nobold padl10" data-content="Zipcode" >
											<span class="hidden--visually">
											  Zip code</span></label>   
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="icity" id="icity"  placeholder="Invoice city" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"     /> 
												 	<label for="icity" class="floating__label tall nobold padl10" data-content="City" >
											<span class="hidden--visually">
											  Zip code</span></label>  
											</div>
											</div>
										</div>
										</div>
										 <?php } ?>
										 </div>
										
										<?php } if($signupFieldsInfo['pickup_info']==1) {  ?> 
										<div class="clear"></div>
									 <div class="marrl0 padb15 brdb fsz16 bg_212b3a tall padt35">
								<a href="javascript:void(0);" class="expander-toggler white_txt xs-fsz16 tall bg_2F3C4F  padrl30 padtb10 brdrad5" onclick="expandThis(6);">Pickup detail
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile6" class="" style="display: block;">
									 
									<div class="on_clmn mart10">
									<div class="thr_clmn  wi_70 padr10">	 
									<div class="pos_rel"  >
													
													
													<input type="text" name="pickup_city" id="pickup_city"   placeholder="Pickup city" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"    >
													
													 	<label for="pickup_city" class="floating__label tall nobold padl10" data-content="Pickup city" >
											<span class="hidden--visually">
											  Zip code</span></label>  
												</div>
												</div> 
												<div class="thr_clmn  wi_30 padr10">	 
									<div class="pos_rel"  >
													
													
													<input type="text" name="pickup_zipcode" id="pickup_zipcode"   placeholder="Pickup zip" class="nobrd tall minhei_65p fsz20 padl10 txt_777E90 ffamily_avenir bg_2F3C4F floating__input padt25"    >
														<label for="pickup_zipcode" class="floating__label tall nobold padl10" data-content="Pickup zip" >
											<span class="hidden--visually">
											  Zip code</span></label>  
													 
												</div>
												</div> 
									</div>
									</div>
										<?php } ?>
									 <input type="hidden" name="delivery_address" id="delivery_address"  value="<?php echo $signupFieldsInfo['delivery_address']; ?>" /> 
									 <input type="hidden" name="invoice_address" id="invoice_address"  value="<?php echo $signupFieldsInfo['invoice_address']; ?>" /> 
									 <input type="hidden" name="pickup_info" id="pickup_info"  value="<?php echo $signupFieldsInfo['pickup_info']; ?>" /> 
									
									<input type="hidden" id="same_name" name="same_name" value="1" />
									 <input type="hidden" id="same_invoice" name="same_invoice" value="<?php if($signupFieldsInfo['delivery_address']==1 && $signupFieldsInfo['invoice_address']==1) { echo 1; } else echo 0; ?>" />
									 
									<div class="valm fsz20 red_txt padtb20" id="error_msg_form"> </div>	
								<div class="clear"></div>
								<input type="hidden" id="lstatus" name="lstatus" value='0' />
								<input type="hidden" id="account_status" name="account_status" value='1' />
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