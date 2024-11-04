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
		
	<script>
		function showPrivacy(id,link)
   {
	   showPr=id;
	  
   }
   function showLogo(id,link)
   {
	   showLogo=id;
	  
   }
   
   function showSubtext(id,link)
   {
	   showTxt=id;
	  
   }
   
   	function showSecurity(id,link)
   {
	   showSec=id;
	  
   }
   
   	function showEnvironment(id,link)
   {
	   showEn=id;
	  
   }
	function showProduct(id,link)
   {
	   showP=id;
	  
   }
   
   function renameProduct(id,link)
   {
	   renameP=id;
	  
   }
   
   
   function showresource(id,link)
   {
	   showRe=id;
	  
   }
   
   function renameresource(id,link)
   {
	   renameRe=id;
	  
   }
   
   function showhelp(id,link)
   {
	   showHe=id;
	  
   }
   
   function renamehelp(id,link)
   {
	   renameHe=id;
	  
   }
   
   
   function updatetobaccoo(id,link)
   {
	   tobbacoo=id;
	   
   }
   function updateTattoo(id,link)
   {
	   tattoo=id;
	  
   }
   function updateChildren(id,link)
   {
	   children=id;
	  
   }
   
   function addMore()
   {
	var newChild='<div class="on_clmn  mart20   "><div class="thr_clmn  wi_50 padr10 "><div class="pos_rel talc"><input type="text" value="Product name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" /><input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="product_name[]" id="product_name[]"  />	</div>	</div>	<div class="thr_clmn  wi_50 padl10"  > <div class="pos_rel"> <input type="text" value="Product link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" /> <input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="product_link[]" id="product_link[]" min="0"/> </div> </div> 	</div>';
	$('#moreProduct').append(newChild);
   }
   
    function addMoreResource()
   {
	var newChild='<div class="on_clmn  mart20   "><div class="thr_clmn  wi_50 padr10 "><div class="pos_rel talc"><input type="text" value="Resource name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" /><input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="resource_name[]" id="resource_name[]"  />	</div>	</div>	<div class="thr_clmn  wi_50 padl10"  > <div class="pos_rel"> <input type="text" value="Resource link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" /> <input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="resource_link[]" id="resource_link[]" min="0"/> </div> </div> 	</div>';
	$('#moreresource').append(newChild);
   }
   
   
    function addMoreHelp()
   {
	var newChild='<div class="on_clmn  mart20   "><div class="thr_clmn  wi_50 padr10 "><div class="pos_rel talc"><input type="text" value="Help name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" /><input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="help_name[]" id="help_name[]"  />	</div>	</div>	<div class="thr_clmn  wi_50 padl10"  > <div class="pos_rel"> <input type="text" value="Help link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" /> <input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="help_link[]" id="help_link[]" min="0"/> </div> </div> 	</div>';
	$('#morehelp').append(newChild);
   }
	 
	 
		function closePop()
		{
			document.getElementById("popup_fade").style.display='none';
			$("#popup_fade").removeClass('active');
			document.getElementById("person_informed").style.display='none';
			$(".person_informed").removeClass('active');
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
		function submitform()
		{
			
			$("#errorMsg1").html('');
			 if($('#show_products').val()==1)
			 {
				 if($('#rename_products').val()==1)
				 {
					 if($('#product_menu_name').val()=="" || $('#product_menu_name').val()==null)
					 {
						$("#errorMsg1").html('please enter menu name'); 
						return false;
					 }
				 }
				 var inps = document.getElementsByName('product_name[]');
				 var inps1 = document.getElementsByName('product_link[]');
				 var count=$("input[name='product_name[]']").length
				for(var i=0;  i<count; i++)
				{
					 
					if(inps[i].value=="" || inps[i].value==null)
					{
						$("#errorMsg1").html('please enter product name'); 
						return false;
					}
					if(!validateURL(inps1[i].value))	
				{
					$("#errorMsg1").html('Please add correct redirect url format');
					 
					return false;
				}
					
				}
			 }
			 
			 if($('#show_resources').val()==1)
			 {
				 if($('#rename_resources').val()==1)
				 {
					 if($('#resource_menu_name').val()=="" || $('#resource_menu_name').val()==null)
					 {
						$("#errorMsg1").html('please enter menu name'); 
						return false;
					 }
				 }
				 var inps = document.getElementsByName('resource_name[]');
				 var inps1 = document.getElementsByName('resource_link[]');
				 var count=$("input[name='resource_name[]']").length
				for(var i=0;  i<count; i++)
				{
					 
					if(inps[i].value=="" || inps[i].value==null)
					{
						$("#errorMsg1").html('please enter resource name'); 
						return false;
					}
					if(!validateURL(inps1[i].value))	
				{
					$("#errorMsg1").html('Please add correct redirect url format');
					 
					return false;
				}
					
				}
			 }
			 
			  if($('#show_help').val()==1)
			 {
				 if($('#rename_help').val()==1)
				 {
					 if($('#help_menu_name').val()=="" || $('#help_menu_name').val()==null)
					 {
						$("#errorMsg1").html('please enter menu name'); 
						return false;
					 }
				 }
				 var inps = document.getElementsByName('help_name[]');
				 var inps1 = document.getElementsByName('help_link[]');
				 var count=$("input[name='help_name[]']").length
				for(var i=0;  i<count; i++)
				{
					 
					if(inps[i].value=="" || inps[i].value==null)
					{
						$("#errorMsg1").html('please enter help name'); 
						return false;
					}
					if(!validateURL(inps1[i].value))	
				{
					$("#errorMsg1").html('Please add correct redirect url format');
					 
					return false;
				}
					
				}
			 }
			 if($('#copyright_text').val()=="" || $('#copyright_text').val()==null)
					{
						$("#errorMsg1").html('please enter copyright info'); 
						return false;
					}
					
					if($('#email').val()=="" || $('#email').val()==null)
					{
						$("#errorMsg1").html('please enter email'); 
						return false;
					}
					
					if($('#p_number').val()=="" || $('#p_number').val()==null)
					{
						$("#errorMsg1").html('please enter phone number'); 
						return false;
					}
			 if(!validateURL($('#facebook').val()))	
				{
					$("#errorMsg1").html('Please add correct facebook redirect url format');
					 
					return false;
				}
				 if(!validateURL($('#instagram').val()))	
				{
					$("#errorMsg1").html('Please add correct instagram redirect url format');
					 
					return false;
				}
				 if(!validateURL($('#twitter').val()))	
				{
					$("#errorMsg1").html('Please add correct twitter redirect url format');
					 
					return false;
				}
				 if(!validateURL($('#linkdn').val()))	
				{
					$("#errorMsg1").html('Please add correct linkdn redirect url format');
					 
					return false;
				}
			 
			 
			 if($('#show_privacy').val()==1)
			 {
				if($('#privacy_name').val()=="" || $('#privacy_name').val()==null)
					{
						$("#errorMsg1").html('please enter policy name'); 
						return false;
					}
					if(!validateURL($('#privacy_link').val()))	
				{
					$("#errorMsg1").html('Please add correct policy redirect url format');
					 
					return false;
				}
					
				 
			 }
			 
			  if($('#show_security').val()==1)
			 {
				if($('#security_name').val()=="" || $('#security_name').val()==null)
					{
						$("#errorMsg1").html('please enter security name'); 
						return false;
					}
					if(!validateURL($('#privacy_link').val()))	
				{
					$("#errorMsg1").html('Please add correct security redirect url format');
					 
					return false;
				}
					
				 
			 }
			 
			 if($('#show_environment').val()==1)
			 {
				if($('#environment_name').val()=="" || $('#environment_name').val()==null)
					{
						$("#errorMsg1").html('please enter environment name'); 
						return false;
					}
					if(!validateURL($('#environment_link').val()))	
				{
					$("#errorMsg1").html('Please add correct environment redirect url format');
					 
					return false;
				}
					
				 
			 }
			 
			document.getElementById('save_indexing').submit();
			}
		
		 
	 function validateURL(textval) {
    var urlregex = /^(https?|ftp):\/\/([a-zA-Z0-9.-]+(:[a-zA-Z0-9.&%$-]+)*@)*((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}|([a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(:[0-9]+)*(\/($|[a-zA-Z0-9.,?'\\+&%$#=~_-]+))*$/;
    return urlregex.test(textval);
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
				
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
		<div class="column_m header   bs_bb   hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../../OmOss/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
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
									<a href="../../OmOss/companyAccount/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					 
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 " id="loginBank" onclick="checkFlag();"  >
				<div class="wrap maxwi_100 padrl15 md-padrl0 lg-padrl0">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
						<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Footer</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Provide complete information of footer here	</a></div>
					 
					 
							
							<form action="../updateInfo/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
										<div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to show <?php echo $footerStart['product_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['show_products']==1) echo 'checked'; ?>" onclick="showProduct(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>

										
											
										<div id="productDetails" style="display:<?php if($footerStart['show_products']==1) echo 'block'; else echo 'none'; ?>;">
											 <?php if($footerStart['product_submenu']=="" || $footerStart['product_submenu']==null) { ?>
											 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to rename <?php echo $footerStart['product_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['rename_products']==1) echo 'checked'; ?>" onclick="renameProduct(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div style="display:<?php if($footerStart['rename_products']==1) echo 'block'; else echo 'none'; ?>;" id="renameProduct">
										<div class="on_clmn  mart20   ">
									 
										<div class="pos_rel talc">
									<input type="text" value="Product name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" value="<?php echo $footerStart['product_menu_name']; ?>" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="0" name="product_menu_name" id="product_menu_name" min="0"/>
									</div>
									 
									</div>
									 
									</div>
										
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Product submenu name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="product_name[]" id="product_name[]" />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Product link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="product_link[]" id="product_link[]"  />
											
										</div>
									</div>
									 
									</div>
											 <?php } else { ?>
											 
											  <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to rename <?php echo $footerStart['product_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['rename_products']==1) echo 'checked'; ?>" onclick="renameProduct(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div style="display:<?php if($footerStart['rename_products']==1) echo 'block'; else echo 'none'; ?>;" id="renameProduct">
										<div class="on_clmn  mart20   ">
									 
										<div class="pos_rel talc">
									<input type="text" value="Product name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $footerStart['product_menu_name']; ?>" name="product_menu_name" id="product_menu_name" />
									</div>
									 
									</div>
									 
									</div>

									<?php $i=0; $gender=explode(',',$footerStart['product_submenu']); $age=explode(',',$footerStart['product_link']);
											 foreach($gender as $key)
											 {
											 ?>
											 	<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Product name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $key; ?>" name="product_name[]" id="product_name[]"  />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Product link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $age[$i]; ?>" name="product_link[]" id="product_link[]" min="0"/>
											
										</div>
									</div>
									 
									</div>
											 <?php $i++; } } ?>
									<div id="moreProduct">
									</div>
									 <div class="clear"></div>
									<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="addMore();"><input type="button" value="Add menu" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
									
									</div>
										  
										  
										  <div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to show <?php echo $footerStart['resource_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['show_resources']==1) echo 'checked'; ?>" onclick="showresource(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>

										
											
										<div id="resourceDetails" style="display:<?php if($footerStart['show_resources']==1) echo 'block'; else echo 'none'; ?>;">
											 <?php if($footerStart['resource_submenu']=="" || $footerStart['resource_submenu']==null) { ?>
											 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to rename <?php echo $footerStart['resource_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['rename_resources']==1) echo 'checked'; ?>" onclick="renameresource(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div style="display:<?php if($footerStart['rename_resources']==1) echo 'block'; else echo 'none'; ?>;" id="renameresource">
										<div class="on_clmn  mart20   ">
									 
										<div class="pos_rel talc">
									<input type="text" value="Resource name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" value="<?php echo $footerStart['resource_menu_name']; ?>" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="0" name="resource_menu_name" id="resource_menu_name" min="0"/>
									</div>
									 
									</div>
									 
									</div>
										
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Resource submenu name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="resource_name[]" id="resource_name[]" />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Resource link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="resource_link[]" id="resource_link[]"  />
											
										</div>
									</div>
									 
									</div>
											 <?php } else { ?>
											 
											  <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to rename <?php echo $footerStart['resource_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['rename_resources']==1) echo 'checked'; ?>" onclick="renameresource(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div style="display:<?php if($footerStart['rename_resources']==1) echo 'block'; else echo 'none'; ?>;" id="renameresource">
										<div class="on_clmn  mart20   ">
									 
										<div class="pos_rel talc">
									<input type="text" value="Resource name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $footerStart['resource_menu_name']; ?>" name="resource_menu_name" id="resource_menu_name" />
									</div>
									 
									</div>
									 
									</div>

									<?php $i=0; $gender=explode(',',$footerStart['resource_submenu']); $age=explode(',',$footerStart['resource_link']);
											 foreach($gender as $key)
											 {
											 ?>
											 	<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Resource name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $key; ?>" name="resource_name[]" id="resource_name[]"  />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Resource link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $age[$i]; ?>" name="resource_link[]" id="resource_link[]" min="0"/>
											
										</div>
									</div>
									 
									</div>
											 <?php $i++; } } ?>
									<div id="moreresource">
									</div>
									 <div class="clear"></div>
									<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="addMoreResource();"><input type="button" value="Add menu" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
									
									</div>
									
									
									<div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to show <?php echo $footerStart['help_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['show_help']==1) echo 'checked'; ?>" onclick="showhelp(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>

										
											
										<div id="helpDetails" style="display:<?php if($footerStart['show_help']==1) echo 'block'; else echo 'none'; ?>;">
											 <?php if($footerStart['help_submenu']=="" || $footerStart['help_submenu']==null) { ?>
											 
											 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to rename <?php echo $footerStart['help_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['rename_help']==1) echo 'checked'; ?>" onclick="renamehelp(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div style="display:<?php if($footerStart['rename_help']==1) echo 'block'; else echo 'none'; ?>;" id="renamehelp">
										<div class="on_clmn  mart20   ">
									 
										<div class="pos_rel talc">
									<input type="text" value="Help name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" value="<?php echo $footerStart['help_menu_name']; ?>" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="0" name="help_menu_name" id="help_menu_name" min="0"/>
									</div>
									 
									</div>
									 
									</div>
										
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Help submenu name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="help_name[]" id="help_name[]" />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Help link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="help_link[]" id="help_link[]"  />
											
										</div>
									</div>
									 
									</div>
											 <?php } else { ?>
											 
											  <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to rename <?php echo $footerStart['help_menu_name']; ?>" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['rename_help']==1) echo 'checked'; ?>" onclick="renamehelp(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div style="display:<?php if($footerStart['rename_help']==1) echo 'block'; else echo 'none'; ?>;" id="renamehelp">
										<div class="on_clmn  mart20   ">
									 
										<div class="pos_rel talc">
									<input type="text" value="Help name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $footerStart['help_menu_name']; ?>" name="help_menu_name" id="help_menu_name" />
									</div>
									 
									</div>
									 
									</div>

									<?php $i=0; $gender=explode(',',$footerStart['help_submenu']); $age=explode(',',$footerStart['help_link']);
											 foreach($gender as $key)
											 {
											 ?>
											 	<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Help name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $key; ?>" name="help_name[]" id="help_name[]"  />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Help link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $age[$i]; ?>" name="help_link[]" id="help_link[]" min="0"/>
											
										</div>
									</div>
									 
									</div>
											 <?php $i++; } } ?>
									<div id="morehelp">
									</div>
									 <div class="clear"></div>
									<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="addMoreHelp();"><input type="button" value="Add menu" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
									
									</div>
										  
										  <div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to show company logo?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['show_company_logo']==1) echo 'checked'; ?>" onclick="showLogo(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
										 <div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to show subtext under logo?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['show_company_subtext']==1) echo 'checked'; ?>" onclick="showSubtext(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div id="subText" style="display:<?php if($footerStart['show_company_subtext']==1) echo 'block'; else echo 'none'; ?>;">
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Company subtext" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="company_subtext" id="company_subtext" placeholder="Subtext" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $footerStart['company_subtext']; ?>" /> 
												
											 
											</div>
											 
											</div>
											</div>
										  
										 <div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Copyright" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="copyright_text" id="copyright_text" placeholder="Copyright" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $footerStart['copyright_text']; ?>" /> 
												
											 
											</div>
											 
											</div>
											
											
										
									
									 	 <div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Email" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="email" id="email" placeholder="Email address" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $footerStart['email']; ?>" /> 
												
											 
											</div>
											 
											</div>
											
										 
									 
									  <div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Phone number" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
									  <div class="thr_clmn  wi_30 "  > 
										<div class="pos_rel">
													<select id="ccountry" name="ccountry"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"  >
														
														<?php  foreach($countryOption as $category => $value) 
																{
																	$category = htmlspecialchars($category); 
																?>
																
																<option value="<?php echo $value['id']; ?>" <?php if($value['id']==$footerStart['country_phone']) echo 'selected'; ?> class="lgtgrey2_bg" >+<?php echo $value['country_code']; ?></option>
															<?php 	}	?>
														
													</select>
												</div>
												</div>
												<div class="thr_clmn  wi_70 padl20"  >
											<div class="pos_rel">
												
												<input type="text" name="p_number" id="p_number" placeholder="Phone" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $footerStart['phone_number']; ?>" /> 
												
											 
											</div>
											 </div>
											</div>
											
											
											
												<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Facebook " class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="facebook" id="facebook" placeholder="Facebook page" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $footerStart['facebook']; ?>" /> 
												
											 
											</div>
											 
											</div>
											
											
											<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Instagram" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="instagram" id="instagram" placeholder="Instagram" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $footerStart['instagram']; ?>" /> 
												
											 
											</div>
											 
											</div>
									
									<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Twitter" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="twitter" id="twitter" placeholder="Twitter" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $footerStart['twitter']; ?>" /> 
												
											 
											</div>
											 
											</div>
									
									
									<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Linkdn" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="linkdn" id="linkdn" placeholder="Linkdn" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $footerStart['linkdn']; ?>" /> 
												
											 
											</div>
											 
											</div>
											
											<div class="on_clmn mart20 brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to show privacy policy?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['show_privacy']==1) echo 'checked'; ?>" onclick="showPrivacy(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div id="privacyDetails" style="display:<?php if($footerStart['show_privacy']==1) echo 'block'; else echo 'none'; ?>;">
											  
									
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Privacy policy name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="privacy_name" id="privacy_name" value="<?php echo $footerStart['privacy_name']; ?>" />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Privacy link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="privacy_link" id="privacy_link" value="<?php echo $footerStart['privacy_link']; ?>"  />
											
										</div>
									</div>
									 
									</div>
											  
									</div>
										  
										<div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to show security policy?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['show_security']==1) echo 'checked'; ?>" onclick="showSecurity(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div id="securityDetails" style="display:<?php if($footerStart['show_security']==1) echo 'block'; else echo 'none'; ?>;">
											  
									
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Security policy name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="security_name" id="security_name" value="<?php echo $footerStart['security_name']; ?>" />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Security link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="security_link" id="security_link" value="<?php echo $footerStart['security_link']; ?>"  />
											
										</div>
									</div>
									 
									</div>
											  
									</div>
										  
								<div class="on_clmn  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you want to show environment?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($footerStart['show_environment']==1) echo 'checked'; ?>" onclick="showEnvironment(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										<div id="environmentDetails" style="display:<?php if($footerStart['show_environment']==1) echo 'block'; else echo 'none'; ?>;">
											  
									
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Environment policy name" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="environment_name" id="environment_name" value="<?php echo $footerStart['environment_name']; ?>" />
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Environment link" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="text" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "    name="environment_link" id="environment_link" value="<?php echo $footerStart['environment_link']; ?>"  />
											
										</div>
									</div>
									 
									</div>
											  
									</div>
									<input type="hidden" id="show_company_logo" name="show_company_logo" value="<?php echo $footerStart['show_company_logo']; ?>" /> 
										<input type="hidden" id="show_company_subtext" name="show_company_subtext" value="<?php echo $footerStart['show_company_subtext']; ?>" />  	
									<input type="hidden" id="show_security" name="show_security" value="<?php echo $footerStart['show_security']; ?>" /> 
										<input type="hidden" id="show_environment" name="show_environment" value="<?php echo $footerStart['show_environment']; ?>" />
											<input type="hidden" id="show_privacy" name="show_privacy" value="<?php echo $footerStart['show_privacy']; ?>" /> 
																			
								 			 <input type="hidden" id="show_products" name="show_products" value="<?php echo $footerStart['show_products']; ?>" />									
									 <input type="hidden" id="rename_products" name="rename_products" value="<?php echo $footerStart['rename_products']; ?>" />	
<input type="hidden" id="rename_resources" name="rename_resources" value="<?php echo $footerStart['rename_resources']; ?>" />	
<input type="hidden" id="rename_help" name="rename_help" value="<?php echo $footerStart['rename_help']; ?>" />										 
									 <input type="hidden" id="show_help" name="show_help" value="<?php echo $footerStart['show_help']; ?>" />											
								 	  <input type="hidden" id="show_resources" name="show_resources" value="<?php echo $footerStart['show_resources']; ?>" />	
								<div class="red_txt fsz20 padt20 talc" id="errorMsg1"> </div>
								
							</form>
							
						 
							
						    <div class="clear"></div>
					<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="submitform();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
							
						</div>
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_grey_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	 
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	<script type="text/javascript" src="<?php echo $path; ?>html/vacancycontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/tinymce/tinymce.min.js"></script>
		<script>
			tinyMCE.init(
			{
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
		
	</body>
	 						