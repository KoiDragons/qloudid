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
			
			function informEmployee()
			{
				$("#error_msg_form").html('');
				
				if($("#flname").val()!=$("#oflname").val())
				{
					 
					$("#fln").val(1);
				}
				 
				 
				if($("#entry_code").val()!=$("#oentry_code").val())
				{
					 
					$("#ecode").val(1);
				}
				if($("#addrs").val()!=$("#oaddrs").val())
				{
					 
					$("#adr").val(1);
				}
				
				 if($("#pnumber").val()!=$("#opnumber").val())
				{
					 
					$("#prt").val(1);
				}
				
				
				 if($("#dzip").val()!=$("#ozip").val())
				{
					 
					$("#zp").val(1);
				}
				
				if($("#dcity").val()!=$("#ocity").val())
				{
					 
					$("#cty").val(1);
				}
				
				if($("#iaddress").val()!=$("#oiaddrs").val())
				{
					 
					$("#iadr").val(1);
				}
				
				 if($("#iport").val()!=$("#oiport").val())
				{
					 
					$("#iprt").val(1);
				}
				
				
				 if($("#izip").val()!=$("#oizip").val())
				{
					 
					$("#izp").val(1);
				}
				
				if($("#icity").val()!=$("#oicity").val())
				{
					 
					$("#icty").val(1);
				}
				
				
				
				if($('#same_name').val()==0)
				{
				if($("#flname").val()=="" ||  $("#flname").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter name on the door');
					return false;
				}
				}
				 
				if($("#pnumber").val()=="" ||  $("#pnumber").val()==null ||  $("#pnumber").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter port number');
					return false;
				}
				
				
				
				if($("#addrs").val()=="" ||  $("#addrs").val()==null ||  $("#addrs").val()=='-')
				{
					 
					$("#error_msg_form").html('Please enter address');
					return false;
				}
				  if($("#dzip").val()=="" || $("#dzip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter zipcode');
					return false;
				}
				
				 if($("#dcity").val()=="" || $("#dcity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter city');
					return false;
				}
				
				if($('#same_invoice').val()==0)
				{
				
				
				if($("#iaddress").val()=="" ||  $("#iaddress").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice address');
					return false;
				}
					if($("#i_port_number").val()=="" ||  $("#i_port_number").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice port number');
					return false;
				}
				
				
				  if($("#izip").val()=="" || $("#izip").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice zipcode');
					return false;
				}
				
				 if($("#icity").val()=="" || $("#icity").val()==null)
				{
					 
					$("#error_msg_form").html('Please enter invoice city');
					return false;
				}
				}
				document.getElementById('save_indexing').submit();
				/*if($('#lstatus').val()==0)
					{
				var send_data={};
						send_data.address=encodeURIComponent($("#addrs").val());
						$.ajax({
							type:"POST",
							url:"checkAddress",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#error_msg_form').html('we cant find address. Please add coordinates');
									$('#lstatus').val(1);
									return false;									 
								}
								else 
								{
									var obj = JSON.parse(data1);
									 $('#locationDetail').attr('style','display:block;');
									$("#latit").val(obj[0]['lat']);
									
									$("#longi").val(obj[0]['lon']);	
									document.getElementById('save_indexing').submit()
								}
							}
						});	
					}
					
					if($('#lstatus').val()==1)
					{
				var send_data={};
						send_data.address=encodeURIComponent($("#addrs").val());
						send_data.lat=($("#latit").val());
						send_data.lon=($("#longi").val());
						$.ajax({
							type:"POST",
							url:"checkAddresslatLong",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								  
								if(data1==0)
								{
									 
									$('#locationDetail').attr('style','display:block;');
									$('#error_msg_form').html('we cant find address. Please enter valid coordinates');
									$('#lstatus').val(1);
									return false;									 
								}
								else 
								{
									var obj = JSON.parse(data1);
									 $('#locationDetail').attr('style','display:block;');
									 
									document.getElementById('save_indexing').submit();
								}
							}
						});	
					}*/
				}
		</script>
			
			
</head>

<?php $path1 = $path."html/usercontent/images/"; ?>
		
		<body class="white_bg ffamily_avenir" >
		 <div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="https://www.qloudid.com/user/index.php/NewPersonal/userAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="https://www.qloudid.com/user/index.php/NewPersonal/userAccount" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz45  padb10 black_txt trn ffamily_avenir">Address</h1>
									</div>
									<div class="mart20 xs-marb20 marb35  xxs-talc talc"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn ffamily_avenir" >Please add your complete address here.</a></div>
									
									<form action="../NewPersonal/userAccount" method="POST" name="save_indexing" id="save_indexing" accept-charset="ISO-8859-1">
									
									<div class="on_clmn  mart10  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If name on the doar is same as yours?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright   <?php if($resultOrg1['is_name_on_house_same']==1) echo 'checked'; else echo "";  ?>" onclick="updateName(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
									<div class="on_clmn mart0 <?php if($resultOrg1['is_name_on_house_same']==1) echo 'hidden'; else echo "";  ?>" id="nameInfo">
										 
										<div class="pos_rel">
										<input type="text" name="flname"  placeholder="Name on the door" id="flname"  class="ffamily_avenir txtind10 fsz18   wi_100 trans_bg required minhei_65p xxs-minhei_60p nobrdt nobrdr nobrdl talc red_f5a0a5_txt brdb_red_ff2828"  value="<?php if($resultOrg1['name_on_door']!="" || $resultOrg1['name_on_door']!= null)  { if($resultOrg1['name_on_door']!= '-') echo $resultOrg1['name_on_door']; else echo ''; } else echo "";  ?>"  />
										
										  <input type="hidden" name="oflname"  placeholder="Street address " id="oflname"  value="<?php if($resultOrg1['name_on_door']!="" || $resultOrg1['name_on_door']!= null)  { if($resultOrg1['name_on_door']!= '-') echo $resultOrg1['name_on_door']; else echo ''; } else echo "";  ?>"  />
									</div>
									 
									 
									</div>
										
										<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="addrs" id="addrs"  placeholder="Delivery address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if($resultOrg1['address']!="" || $resultOrg1['address']!= null)  { if($resultOrg1['address']!= '-') echo $resultOrg1['address']; else echo ''; } else echo "";  ?>" /> 
												<input type="hidden" name="oaddrs"  placeholder="Street address " id="oaddrs"  value="<?php if($resultOrg1['address']!="" || $resultOrg1['address']!= null)  { if($resultOrg1['address']!= '-') echo $resultOrg1['address']; else echo ''; } else echo "";  ?>"  />
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="pnumber" id="pnumber"  placeholder="Delivery Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if($resultOrg1['port_number']!="" || $resultOrg1['port_number']!= null)  { if($resultOrg1['port_number']!= '-') echo $resultOrg1['port_number']; else echo ''; } else echo "";  ?>"   /> 
												<input type="hidden" name="opnumber"  placeholder="Street address " id="opnumber"  value="<?php if($resultOrg1['port_number']!="" || $resultOrg1['port_number']!= null)  { if($resultOrg1['port_number']!= '-') echo $resultOrg1['port_number']; else echo ''; } else echo "";  ?>"  />
											</div>
											</div>
										</div>
									 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="dzip" id="dzip"  placeholder="Zipcode" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if($resultOrg1['zipcode']!="" || $resultOrg1['zipcode']!= null)  { if($resultOrg1['zipcode']!= '-') echo $resultOrg1['zipcode']; else echo ''; } else echo "";  ?>"    /> 
												<input type="hidden" name="ozip" id="ozip"  placeholder="Zipcoe" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php if($resultOrg1['zipcode']!="" || $resultOrg1['zipcode']!= null)  { if($resultOrg1['zipcode']!= '-') echo $resultOrg1['zipcode']; else echo ''; } else echo "";  ?>"    /> 
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="dcity" id="dcity"  placeholder="Delivery city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   value="<?php if($resultOrg1['city']!="" || $resultOrg1['city']!= null)  { if($resultOrg1['city']!= '-') echo $resultOrg1['city']; else echo ''; } else echo "";  ?>"  /> 
												 <input type="hidden" name="ocity"    id="ocity"  value="<?php if($resultOrg1['city']!="" || $resultOrg1['city']!= null)  { if($resultOrg1['city']!= '-') echo $resultOrg1['city']; else echo ''; } else echo "";  ?>" />
											</div>
											</div>
										</div>
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="If Invoice address is same as delivery address?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($resultOrg1['is_invoice_same']==1) echo 'checked'; else echo "";  ?>" onclick="updateInvoice(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div id="ShowInvoice" class="<?php if($resultOrg1['is_invoice_same']==1) echo 'hidden'; else echo "";  ?>">
										<div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_70 padr20">
											<div class="pos_rel">
												
												<input type="text" name="iaddress" id="iaddress"  placeholder="Invoice address" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if($resultOrg1['invoice_address']!="" || $resultOrg1['invoice_address']!= null)  { if($resultOrg1['invoice_address']!= '-') echo $resultOrg1['invoice_address']; else echo ''; } else echo "";  ?>" /> 
												<input type="hidden" name="oiaddrs"  placeholder="Street address " id="oiaddrs"  value="<?php if($resultOrg1['invoice_address']!="" || $resultOrg1['invoice_address']!= null)  { if($resultOrg1['invoice_address']!= '-') echo $resultOrg1['invoice_address']; else echo ''; } else echo "";  ?>"  />
											</div>
											</div>
												<div class="thr_clmn  wi_30 ">
											<div class="pos_rel">
												
												<input type="text" name="i_port_number" id="i_port_number"  placeholder="Invoice Port number" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if($resultOrg1['invoice_port']!="" || $resultOrg1['invoice_port']!= null)  { if($resultOrg1['invoice_port']!= '-') echo $resultOrg1['invoice_port']; else echo ''; } else echo "";  ?>"   /> 
												<input type="hidden" name="oiport"  placeholder="Street address " id="oiport"  value="<?php if($resultOrg1['invoice_port']!="" || $resultOrg1['invoice_port']!= null)  { if($resultOrg1['invoice_port']!= '-') echo $resultOrg1['invoice_port']; else echo ''; } else echo "";  ?>"  />
											</div>
											</div>
										</div>
										
										 <div class="on_clmn mart20 ">
											<div class="thr_clmn  wi_30 padr20">
											<div class="pos_rel">
												
												<input type="text" name="izip" id="izip"  placeholder="Zipcode" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"  value="<?php if($resultOrg1['invoice_zipcode']!="" || $resultOrg1['invoice_zipcode']!= null)  { if($resultOrg1['invoice_zipcode']!= '-') echo $resultOrg1['invoice_zipcode']; else echo ''; } else echo "";  ?>" /> 
												<input type="hidden" name="oizip"  placeholder="Street address " id="oizip"   value="<?php if($resultOrg1['invoice_zipcode']!="" || $resultOrg1['invoice_zipcode']!= null)  { if($resultOrg1['invoice_zipcode']!= '-') echo $resultOrg1['invoice_zipcode']; else echo ''; } else echo "";  ?>" /> 
											</div>
											</div>
												<div class="thr_clmn  wi_70 ">
											<div class="pos_rel">
												
												<input type="text" name="icity" id="icity"  placeholder="Invoice city" class="wi_100 nobrdt nobrdr nobrdl   trans_bg brdb_red_ff2828 talc xxs-minhei_60p minhei_65p fsz18 red_f5a0a5_txt ffamily_avenir"   value="<?php if($resultOrg1['invoice_city']!="" || $resultOrg1['invoice_city']!= null)  { if($resultOrg1['invoice_city']!= '-') echo $resultOrg1['invoice_city']; else echo ''; } else echo "";  ?>" /> 
												<input type="hidden" name="oicity"  placeholder="Street address " id="oicity"   value="<?php if($resultOrg1['invoice_city']!="" || $resultOrg1['invoice_city']!= null)  { if($resultOrg1['invoice_city']!= '-') echo $resultOrg1['invoice_city']; else echo ''; } else echo "";  ?>" />
											</div>
											</div>
										</div>
										</div>
										
									 
									 
									
									<div class="on_clmn mart20">
										 
									<div class="pos_rel"  >
													
													
													<input type="text" name="entry_code" id="entry_code"   placeholder="Entry code" class="wi_100  pad10   talc  minhei_65p fsz18 nobrdt nobrdl nobrdr llgrey_txt brdb  xxs-minhei_60p ffamily_avenir" value="<?php if($resultOrg1['entry_code']!="" || $resultOrg1['entry_code']!= null)  { if($resultOrg1['entry_code']!= '-') echo $resultOrg1['entry_code']; else echo ''; } else echo "";  ?>"  >
													
													 <input type="hidden" name="oentry_code"    id="oentry_code"  value="<?php if($resultOrg1['entry_code']!="" || $resultOrg1['entry_code']!= null)  { if($resultOrg1['entry_code']!= '-') echo $resultOrg1['entry_code']; else echo ''; } else echo "";  ?>"  />
												</div>
												 
									</div>
									
									<input type="hidden" id="same_name" name="same_name" value="<?php echo $resultOrg1['is_name_on_house_same'];  ?>" />
									 <input type="hidden" id="same_invoice" name="same_invoice" value="<?php echo $resultOrg1['is_invoice_same'];  ?>" />
									 <input type="hidden" id="fln" name="fln" value="0" />
									
									<input type="hidden" id="fnum" name="fnum" value="0" />
									<input type="hidden" id="ecode" name="ecode" value="0" />
									<input type="hidden" id="hname" name="hname" value="0" />
									
									<input type="hidden" id="ind" name="ind" value="0" />
									<input type="hidden" id="prt" name="prt" value="0" />
									<input type="hidden" id="zp" name="zp" value="0" />
									<input type="hidden" id="adr" name="adr" value="0" />
									<input type="hidden" id="cty" name="cty" value="0" />
									
									<input type="hidden" id="iprt" name="iprt" value="0" />
									<input type="hidden" id="izp" name="izp" value="0" />
									<input type="hidden" id="iadr" name="iadr" value="0" />
									<input type="hidden" id="icty" name="icty" value="0" />
									<div class="valm fsz20 red_txt" id="error_msg_form"> </div>	
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
			
	 
<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
</body>
</html>