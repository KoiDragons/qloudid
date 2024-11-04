<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="https://www.hellobliss.net/html/usercontent/images/favicon.ico">
		<title>Bliss</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/modulesnewy_bg.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/jquery.js"></script>
			
	<script>
	 function updateInvoice(id,link)
   {
	   invoiceShow=1;
	    
   } 
	
	function changeDisplay()
	{
		if($('#ulDisplay').css('display') == 'none')
		{
		$('#ulDisplay').attr('style','display:block');	
		}
		else
		{
			$('#ulDisplay').attr('style','display:none');	
		}
		
	}
	 function changeColor(link)
		 {
			 $(link).removeClass('brd_2px_rgb');
			 $(link).addClass('brdb_new');
		 }
	
	function selectWarning(id)
	{
		if(id==1)
		{
			$('#warningsDetail').removeClass('hidden');
		}
		else
		{
			$('#warningsDetail').addClass('hidden');
		}
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
			$('#errorMsg1').html('');
			var submitFlag=1;
			 if($("#first_name").val()==null || $("#first_name").val()=="")
			{
				$("#first_name").removeClass('brdb_new');
				$("#first_name").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			
			 
			
			 if($("#last_name").val()==null || $("#last_name").val()=="")
			{
				
				$("#last_name").removeClass('brdb_new');
				$("#last_name").addClass('brd_2px_rgb');
				submitFlag=0;
			}
			 if($("#email").val()==null || $("#email").val()=="")
			{
				
				$("#email").removeClass('brdb_new');
				$("#email").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			
			 if($("#p_number").val()==null || $("#p_number").val()=="")
			{
				
				$("#p_number").removeClass('brdb_new');
				$("#p_number").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			if($("#company_name").val()==null || $("#company_name").val()=="")
			{
				
				$("#company_name").removeClass('brdb_new');
				$("#company_name").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			
			if($("#cid").val()==null || $("#cid").val()=="")
			{
				
				$("#cid").removeClass('brdb_new');
				$("#cid").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			
			if(isNaN($("#p_number").val()))
				{
				$("#p_number").removeClass('brdb_new');
				$("#p_number").addClass('brd_2px_rgb');
				submitFlag=0;
				}
			if($("#p_number").val()==0)
			{
				
				$("#p_number").removeClass('brdb_new');
				$("#p_number").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			 if($("#same_invoice").val()==0)
			 {
			 if($("#s_address").val()==null || $("#s_address").val()=="")
			{
				
				$("#s_address").removeClass('brdb_new');
				$("#s_address").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			 if($("#po_number").val()==null || $("#po_number").val()=="")
			{
				
				$("#po_number").removeClass('brdb_new');
				$("#po_number").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			if($("#zip").val()==null || $("#zip").val()=="")
			{
				
				$("#zip").removeClass('brdb_new');
				$("#zip").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			if($("#city").val()==null || $("#city").val()=="")
			{
				
				$("#city").removeClass('brdb_new');
				$("#city").addClass('brd_2px_rgb');
				submitFlag=0;
			} 	 
			 }
			
			if($("#name_on_house").val()==null || $("#name_on_house").val()=="")
			{
				
				$("#name_on_house").removeClass('brdb_new');
				$("#name_on_house").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			
			if($("#d_address").val()==null || $("#d_address").val()=="")
			{
				
				$("#d_address").removeClass('brdb_new');
				$("#d_address").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			
			 if($("#dpo_number").val()==null || $("#dpo_number").val()=="")
			{
				
				$("#dpo_number").removeClass('brdb_new');
				$("#dpo_number").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			
			if($("#dzip").val()==null || $("#dzip").val()=="")
			{
				
				$("#dzip").removeClass('brdb_new');
				$("#dzip").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			
			if($("#dcity").val()==null || $("#dcity").val()=="")
			{
				
				$("#dcity").removeClass('brdb_new');
				$("#dcity").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			
			if($("#card_number").val()==null || $("#card_number").val()=="")
			{
				
				$("#card_number").removeClass('brdb_new');
				$("#card_number").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			if(isNaN($("#card_number").val()))
				{
				$("#card_number").removeClass('brdb_new');
				$("#card_number").addClass('brd_2px_rgb');
				submitFlag=0;
				}
				
				 if($("#card_number").val().length!=16)
				{
				$("#card_number").removeClass('brdb_new');
				$("#card_number").addClass('brd_2px_rgb');
				submitFlag=0;
				}
			if($("#exp_month").val()==null || $("#exp_month").val()=="")
			{
				
				$("#exp_month").removeClass('brdb_new');
				$("#exp_month").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			if($("#exp_year").val()==null || $("#exp_year").val()=="")
			{
				
				$("#exp_year").removeClass('brdb_new');
				$("#exp_year").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			if($("#cvv").val()==null || $("#cvv").val()=="")
			{
				
				$("#cvv").removeClass('brdb_new');
				$("#cvv").addClass('brd_2px_rgb');
				submitFlag=0;
			} 
			if(isNaN($("#cvv").val()))
				{
				$("#cvv").removeClass('brdb_new');
				$("#cvv").addClass('brd_2px_rgb');
				submitFlag=0;
				}
				
				if($("#cvv").val().length!=3)
				{
				$("#cvv").removeClass('brdb_new');
				$("#cvv").addClass('brd_2px_rgb');
				submitFlag=0;
				}
			if(submitFlag==1)	
			{
			document.getElementById('save_indexing').submit();	
			}
			else
			{
				return false;
			}
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
				
					function changeHeader()
			{
				window.location.href ="https://www.qloudid.com/public/index.php/Eshop/guestCheckout/<?php echo $data['cid']; ?>";
			}
				
			</script>
			
		
<body class="lgtgrey2_bg ffamily_avenir">
	 
	<div class="column_m header xs-header xsip-header xsi-header bs_bb hidden-xs">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 white_bg xs-lgtgrey_bg">
				
				<div class="logo marr15 wi_140p xs-wi_130p ">
				
					<a href="../reviewBasket/<?php echo $data['cid']; ?>"> <h3 class="marb0 pad0 fsz27 black_txt padt10 padb10 ffamily_avenir">Dstrict</h3> </a>
					
				
				</div>
			 <div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz16 sf-js-enabled sf-arrows">
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel   first"><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt   ffamily_avenir" data-en="Logga in" data-sw="Logga in" style="background-color: #000000;">Logga in</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel padr20"><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25 lgn_hight_30 black_txt ffamily_avenir padt5">Vår metod</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Om CBD</a></li>
	 
						
					</ul>
				</div>
				
				 
			<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="diblock padl15 padr0 brdrad3 fsz30 black_txt"><i class="fas fa-bars" aria-hidden="true"></i></a> </div>
				<div class="clear"></div>
			</div>
		</div>
	  
	<div class="column_m header xs-hei_55p  bs_bb lgtgrey2_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 black_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="../reviewBasket/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="top_menu talc    wi_60i " style="padding-top:10px;">
				<ul class="menulist sf-menu  fsz20 wi_100 sf-js-enabled sf-arrows">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="white_txt pred_txt_h ffamily_avenir"><?php if($businessImageDetail['free_text']=='' || $businessImageDetail['free_text']==null) echo substr($companyDetail['company_name'],0,12); else  echo substr($businessImageDetail['free_text'],0,12); ?></span></a>
					</li>
				 	 
       			 	</ul>
			</div> 
					
                <div class="clear"></div>

            </div>
        </div>	
		
		
		
		<div class="clear"></div>
	
			<!-- CONTENT -->
			<div class="column_m   talc lgn_hight_22 fsz16 mart40" id="loginBank">
				<div class="wrap maxwi_100 padrl15 xs-padrl25">
					
					
					<!-- Center content -->
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10  xs-pad0">
					
					<div class="padb20 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-tall talc fsz100 xxs-fsz30 xxs-lgn_hight_45 padb10 xs-padb0 black_txt trn" style="
    font-family: Avenir;
">Thank you</h1>
									</div>
									<div class="mart20 xs-mart0 xs-marb20 marb35  xxs-tall talc xs-padb15  "> <a href="#" class="black_txt fsz25 xxs-tall xxs-lgn_hight_20  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn">Please fill in your delivery details.</a></div>
					  <div class="tab-header mart10 padb10 xs-tall brdb_94cffd darkbluebrdcolor nobrdt nobrdl nobrdr tall">
                                           
											 <a href="../guestCheckout/<?php echo $data['cid']; ?>" class="dinlblck mar5 padrl10  nobrd   bg_94cffd_a brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir" onclick="changeHeader();">Personal</a>
											   <a href="#" class="dinlblck mar5 padrl30     darkbluergb brdrad40  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Business</a>  
                                             
                                        </div>
									 
							<form action="../addBusinessDevilveryAddress/<?php echo $data['cid']; ?>" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0   padtrl0 white_bg">		 
							 
											
											 <div class="on_clmn padt10 brdb lgtgrey2_bg ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Company details" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_55p fsz16 black_txt ffamily_avenir bold" readonly="">
										 
									</div>
									 </div>
											
											 <div class="on_clmn ">
											 
											<div class="pos_rel">
												
												<input type="text" name="company_name" id="company_name" placeholder="Company name" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="company_name" class="floating__label tall nobold padl10" data-content="Company name" onclick="changeColor(this);">
											<span class="hidden--visually">
											Company name</span></label> 
												
											 
											</div>
											 
											</div>
											
												<div class="on_clmn padt10">
											 <div class="thr_clmn  wi_30 padr10"> 
										<div class="pos_rel">
										 <select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir" name="company_country"   name="company_country" id="company_country"   >
											       
														<?php foreach($countryOptions as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php if($value['id']==201) echo 'selected';  ?>><?php echo $value['country_name']; ?></option>
														<?php } ?>            
											</select>
										 		<label for="company_country" class="floating__label tall nobold padl10" data-content="Country">
											<span class="hidden--visually">
											  Country</span></label>
													 </div>
												</div>
												<div class="thr_clmn  wi_70  padl10"> 
											<div class="pos_rel">
												
												<input type="text" name="cid" id="cid" placeholder="Company ID" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="cid" class="floating__label tall nobold padl10" data-content="Company ID" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Company ID</span></label> 
												
											 </div>
											</div>
											 
											</div>
											
											
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="first_name" id="first_name" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												
											 <label for="first_name" class="floating__label tall nobold padl10" data-content="First name" onclick="changeColor(this);">
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">
											 
										  
											 
											<div class="pos_rel">
												
												<input type="text" name="last_name" id="last_name" placeholder="Last name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="last_name" class="floating__label tall nobold padl10" data-content="Last name" onclick="changeColor(this);">
											<span class="hidden--visually">
											  Last name</span></label>
											 
											 
											 
											</div>
											</div>
											
												<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="email" id="email" placeholder="Email address" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="email" class="floating__label tall nobold padl10" data-content="Email address" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Email address</span></label> 
												
											 
											</div>
											 
											</div>
											
										
											
											<div class="on_clmn padt10">
											 <div class="thr_clmn  wi_20 padr10"> 
										<div class="pos_rel">
										
												<select id="pcountry" name="pcountry" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25"     />
														
																														
															<?php foreach($countryOptions as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php   if($value['id']==201) echo 'selected';  ?>>+<?php echo $value['country_code']; ?></option>
														<?php } ?>   
																													
													</select>
												 <label for="pcountry" class="floating__label tall nobold padl10" data-content="Code">
											<span class="hidden--visually">
											  Code</span></label>
												</div>
												</div>
												<div class="thr_clmn  wi_80  padl10"> 
											<div class="pos_rel">
												
												<input type="text" name="p_number" id="p_number" placeholder="Phone number" value="" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="p_number" class="floating__label tall nobold padl10" data-content="Mobile" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Mobile</span></label> 
												
											 </div>
											</div>
											 
											</div>
											<input type="hidden" id="same_invoice" name="same_invoice" value="1">
								<div class="on_clmn padt35 brdb lgtgrey2_bg">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Delivery address" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_55p fsz16 black_txt ffamily_avenir bold" readonly="">
										 
									</div>
									 </div>
											 
											 										
										<div class="on_clmn">
											 
											<div class="pos_rel">
												
												<input type="text" name="name_on_house" id="name_on_house" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												
											 <label for="first_name" class="floating__label tall nobold padl10" data-content="Name on door" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Name on door</span></label>
											</div>
											 
											 
											 
											</div>
											
												<div class="on_clmn padt10">
											 	 
											<div class="pos_rel">
												
												<input type="text" name="d_address" id="d_address" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="s_address" class="floating__label tall nobold padl10" data-content="Street address" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Street address</span></label>
												 
											 
											</div>
											
											</div>
											
											
										  <div class="on_clmn padt10"> 
											<div class="pos_rel">
												
												<input type="text" name="dpo_number" id="dpo_number" placeholder="Port  " class="white_bg  brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="po_number" class="floating__label tall nobold padl10  " data-content="Port  " onclick="changeColor(this);">
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											 
											</div>
											
											
												<div class="on_clmn padt10">
								 
											 
										<div class="pos_rel talc">
									 
										<input type="text" name="dzip" id="dzip" placeholder="Zip code" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);"> 
												 <label for="Zipcode" class="floating__label tall nobold padl10" data-content="Zip code" onclick="changeColor(this);">
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div> 
									
									<div class="on_clmn padt10">
											<div class="pos_rel">
											 
											
											<input type="text" name="dcity" id="dcity" placeholder="City, State" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);"> 
												 <label for="city" class="floating__label tall padl10 nobold" data-content="City, State" onclick="changeColor(this);">
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
									
									<div class="on_clmn padtb10 ">
											 
											<div class="pos_rel">
												
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir"   name="dcountry" id="dcountry" >
											       <option value="0" class="lgtgrey2_bg">country</option>
														<?php foreach($countryOptions as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php  if($value['id']==201) echo 'selected'; ?>><?php echo $value['country_name']; ?></option>
														<?php } ?>         
											</select>
											  <label for="country" class="floating__label tall nobold padl10" data-content="Country">
											<span class="hidden--visually">
											  Country</span></label>
											</div>
											 
											</div>
											 			
											
							<div class="on_clmn padt35 brdb lgtgrey2_bg">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Invoice = delivery address" class="wi_100 rbrdr pad10 padl0   tall  minhei_55p fsz18 black_txt ffamily_avenir bold" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25">
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt10 xs-padt15 marl0 fsz25  padb10  ">
														<div class="boolean-control boolean-control-small boolean-control-green fright  checked" onclick="updateInvoice(1,this);" >
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
											<div id="ShowInvoice" class="hidden">
											<div class="on_clmn lgtgrey2_bg padt10 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Invoice address" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_55p fsz16 black_txt ffamily_avenir bold" readonly="">
										 
									</div>
									 </div>
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="s_address" id="s_address" placeholder="Street address" class="white_bg brd_width_2  brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="s_address" class="floating__label tall nobold padl10" data-content="Street address" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Street address</span></label>
												 
											 
											</div>
											 
										
											 
											 
											</div>
											
												<div class="on_clmn padt10">
										 	<div class="pos_rel">
												
												<input type="text" name="po_number" id="po_number" placeholder="Port  " class="white_bg  brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir floating__input padt25" onclick="changeColor(this);"> 
												 <label for="po_number" class="floating__label tall nobold padl10  " data-content="Port  " onclick="changeColor(this);">
											<span class="hidden--visually">
											 Port  </span></label>
												</div>
											</div>
											
												<div class="on_clmn padt10">
									 
											 
										<div class="pos_rel talc">
									 
										<input type="text" name="zip" id="zip" placeholder="Zip code" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);"> 
												 <label for="Zipcode" class="floating__label tall nobold padl10" data-content="Zip code" onclick="changeColor(this);">
											<span class="hidden--visually">
											  Zip code</span></label> 
									 
									</div>
								
									 
									</div>
									
										 <div class="on_clmn padt10">
											<div class="pos_rel">
											 
											
											<input type="text" name="city" id="city" placeholder="City, State" class="white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);"> 
												 <label for="city" class="floating__label tall padl10 nobold" data-content="City, State" onclick="changeColor(this);">
											<span class="hidden--visually">
											  City, State</span></label> 
										</div>
									</div>
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<select class="wi_100 white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl padt25 tall minhei_55p fsz20 padl10 black_txt ffamily_avenir"   name="country" id="country" >
											       <option value="0" class="lgtgrey2_bg">country</option>
														<?php foreach($countryOptions as $category =>$value){ ?>													
															<option value="<?php echo $value['id']; ?>" class="lgtgrey2_bg" <?php  if($value['id']==201) echo 'selected'; ?>><?php echo $value['country_name']; ?></option>
														<?php } ?>         
											</select>
											  <label for="country" class="floating__label tall nobold padl10" data-content="Country">
											<span class="hidden--visually">
											  Country</span></label>
											</div>
											 
											</div>
											</div>
											
										 <div class="on_clmn padt35 brdb lgtgrey2_bg">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Card detail" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_55p fsz16 black_txt ffamily_avenir bold" readonly="">
										 
									</div>
									 </div>
										 
										<div class="on_clmn padt10">
										<input type="text" name="card_number" id="card_number" placeholder="Your card number" class=" white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);">
										 <label for="card_number" class="floating__label tall padl10 nobold" data-content="Card number" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Card number</span></label>
									</div>
									
									<div class="on_clmn padt10">
										<input type="number" name="exp_month" id="exp_month" value="03" min="03" placeholder="Your card number" class=" white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);">
										 <label for="exp_month" class="floating__label tall padl10 nobold" data-content="Expiry month" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Expiry month</span></label>
									</div>
									
									 <div class="on_clmn padt10">
										<input type="number" name="exp_year" id="exp_year" value="2021" min="2021" placeholder="Your card number" class=" white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);">
										 <label for="exp_year" class="floating__label tall padl10 nobold" data-content="Expiry year" onclick="changeColor(this);">
											<span class="hidden--visually">
											 Expiry year</span></label>
									</div>
									 
								 <div class="on_clmn padt10">

												<div class="pos_rel">
										<input type="number" name="cvv" id="cvv" placeholder="CVV" class=" white_bg brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_55p fsz20 padl10 black_txt ffamily_avenir  floating__input padt25" onclick="changeColor(this);">
										<label for="cvv" class="floating__label tall padl10 nobold" data-content="CVV" onclick="changeColor(this);">
											<span class="hidden--visually">
											 CVV</span></label>
									</div>
									</div>
									 
											  
									  	<input type="hidden" id="indexing_save" name="indexing_save">
								<div class="red_txt fsz20 talc" id="errorMsg1"> </div>
								
							
							
						 
							 
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir lgtgrey2_bg"> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18    ffamily_avenir">Submit</button></a> </div>
							
						</div></form>
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10" id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_black_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
	<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/vex.css">
<link rel="stylesheet" type="text/css" media="all" href="https://www.hellobliss.net/html/usercontent/css/vex-theme-default.css">
<script type="text/javascript" src="../../../../html/usercontent/modules_updatetime.js"></script>
		<script type="text/javascript" src="https://www.hellobliss.net/html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/jquery.cropit.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/vex.combined.min.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/slick.min.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/superfish.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/keepcss/js/keep.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/icheck.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/jquery.selectric.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/modules.js"></script>
<script type="text/javascript" src="https://www.hellobliss.net/html/usercontent/js/custom.js"></script>
	
	 						</div><iframe frameborder="0" allowtransparency="true" scrolling="no" name="__privateStripeMetricsController0" allowpaymentrequest="true" src="https://js.stripe.com/v2/m/outer.html#url=https%3A%2F%2Fwww.qloudid.com%2Fpublic%2Findex.php%2FEshop%2FbusinessCheckout%2FQkhHaWQzcnBweFU5MDRIMllxY3IzQT09&amp;title=Bliss&amp;referrer=https%3A%2F%2Fwww.qloudid.com%2Fpublic%2Findex.php%2FEshop%2FguestCheckout%2FQkhHaWQzcnBweFU5MDRIMllxY3IzQT09&amp;muid=41c06445-7848-4d40-8e72-aa9354da900f&amp;sid=ed4d9d69-592f-4e4f-bb40-5cc578785b43&amp;preview=false" aria-hidden="true" tabindex="-1" style="border: none !important; margin: 0px !important; padding: 0px !important; width: 1px !important; min-width: 100% !important; overflow: hidden !important; display: block !important; visibility: hidden !important; position: fixed !important; height: 1px !important; pointer-events: none !important; user-select: none !important;"></iframe></body>