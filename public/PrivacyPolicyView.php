<!doctype html>
<?php
	 $path1 = "../../../../html/usercontent/images/";
	 ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qloudid</title>
		<!-- Styles -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg_time.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
		
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules_updatetime.js"></script>
			<script>
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
	
	function closePopup()
	{
		if($('#ulDisplay').css('display') == 'block')
		{
		$('#ulDisplay').attr('style','display:none');	
		}
		 
	}
</script> 
		
	 </head>
	
	<body class="white_bg ffamily_avenir">
		
		
		<div class="column_m header xs-header xsip-header xsi-header bs_bb hidden-xs">
				<div class="wi_100 hei_65p xs-pos_fix padtb5 padrl10 lgtgrey2_bg xs-lgtgrey_bg">
				
				<div class="logo marr15 wi_140p xs-wi_130p ">
				
					<a href="#"> <h3 class="marb0 pad0 fsz27 black_txt padt15 padb10 ffamily_avenir">Qloudid</h3> </a>
					
				
				</div>
			 <div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz16">
						
						<li class="dblock hidden-xs hidden-sm fright pos_rel   first"><a href="https://www.qloudid.com/user/index.php/LoginAccount/loginapp" id="usermenu_singin" class="translate hei_30pi dblock padrl25  padtb5  lgn_hight_30 white_txt black_bg ffamily_avenir" data-en="Sign in" data-sw="Sign in">Sign in</a></li>
	<li class="dblock hidden-xs hidden-sm fright pos_rel padr20"><a href="https://www.qloudid.com/user/index.php/CreateAccount" id="usermenu_singin" class="translate hei_30pi dblock padrl25 lgn_hight_30 black_txt ffamily_avenir padt5">Sign up</a></li>
	 
	 <li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="CorporateServicesEng" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Business</a></li>
		<li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="#" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Private</a></li>					
					</ul>
				</div>
				
				 
			<div class="visible-xs visible-sm fright marr0 padt5 "> <a href="#" class="diblock padl15 padr0 brdrad3 fsz30 black_txt"><i class="fas fa-bars" aria-hidden="true"></i></a> </div>
				<div class="clear"></div>
			</div>
		</div>
	  
	  <div class="column_m header xs-hei_55p  bs_bb lgtgrey2_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 lgtgrey2_bg " style="">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14 sf-js-enabled sf-arrows">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="#" class="lgn_hight_s1  padl10 fsz30 sf-with-ul nobold"><i class="fas fa-home black_txt " aria-hidden="true"></i></a>
								</li>
								
								
								
								
								
							</ul>
						</div>
				
					</div>
					
					<div class="top_menu talc    wi_60i " style="padding-top:5px;">
				<ul class="menulist sf-menu  fsz25  bold wi_100">
					<li class="padr10 first last wi_100 talc">
						<a href="#"><span class="black_txt pred_txt_h ffamily_avenir nobold">Qloudid</span></a>
					</li>
				 	 
       			 	</ul>
			</div> 
			<div class="top_menu frighti   padb10 visible-xs maxwi_60p" style="padding-top:8px;">
				<ul class="menulist sf-menu  fsz16">
					 
       			
					<li class="last marr0 padr10 first">
						<a href="javascript:void(0);" class="lgn_hight_s1 fsz30 nobold sf-with-ul"><span class="fas fa-bars black_txt " aria-hidden="true" onclick="changeDisplay();"></span></a>
						<ul style="display: none;" id="ulDisplay">
							<li class="first">
								<div class="top_arrow"></div>
							</li>
							<li class="last marr0">
								<div class="setting_menu pad15">
									<div class="fsz13 trn">Inloggad som</div>
									<ol class="">
									 
									<li class="first">
                    <div class="line martb10"></div>
                  </li>
				 
										
                  <li><a href="QloudidPersonal" class="fsz20">Personal</a></li>
				   
                  <li><a href="CorporateServicesEng" class="fsz20">Business</a></li>
                  <li><a href="https://www.qloudid.com/user/index.php/CreateAccount" class="fsz20">Sign up</a></li>
                   <li><a href="https://www.qloudid.com/user/index.php/LoginAccount/loginapp" class="fsz20">Sign in</a></li> 
                  <li class="last">
                    <div class="line marb10"></div>
                  </li>
										
										
										 
									</ol>
									<div class="clear"></div>
								</div>
							</li>
						</ul>
					</li>
				</ul>
			</div>
			
					
                <div class="clear"></div>

            </div>
        </div>
		 
	<div class="clear"></div>
		
		
		<div class="clear"></div>
		
		
		<div class="column_m pos_rel " onclick="closePopup();">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 xs-padrl15 ">
				 
					<div class="wi_240p fleft pos_rel zi50 ">
						<div class="padrl10">
							
							<!-- Scroll menu -->
							<div class="scroll-fix xs-hei_autoi sm-hei_autoi" data-offset-top="75" >
								<div class="scroll-fix-wrap column_m xs-maxhei_100-90p sm-maxhei_100-90p xs-ovfl_auto sm-ovfl_auto hidden-xs hidden-sm xs-pos_fixi xs-top40pi sm-pos_fixi sm-top40pi xs-bxsh_2220_03 sm-bxsh_2220_03 brdr_new  fsz14" id="scroll_menu" >
								
								 <ul class="dblock marr20 padt250 padl10 fsz18 mart0">
									  
						<li class="dblock padrb10 ">
						<a href="#" class="hei_26p dflex alit_c  pos_rel padr10    brdb_black black_txt  padb10"> <span class="valm trn ltr_space" >Policy</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div></a>
								 </li>
						<li class="dblock padrb10 padt5">
						<a href="#" class="hei_26p dflex alit_c padb10 pos_rel padr10  brdwi_3 grey_txt"> <span class="valm trn ltr_space" >Faq</span> 
						<div class="wi_20p hei_20p hide dblock_pa xs-dnone_i sm-dnone_i pos_abs top3p right-8p pblue2_bg rotate45"></div>
						</a></li>
						 
						  
										 
							 				 
											</ul>
							
								 
									
									
								 		</div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					
					<!-- Center content -->
					<div class="wi_720p   fleft pos_rel zi5    padl20   xs-pad0">
						 
					 <div class="padb0 xxs-padb0 ">		
							<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn">PRIVACY POLICY</h1>
									</div>
									
									<div class="mart10 marb5 tall   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 tall edit-text jain_drop_company trn lgn_hight_20">ABC Tech AB (“QLOUD ID,” “we,” “us,” or “our”) provides identity, access management, and user authentication tools to institutional organizations for internal and external facing applications. This Privacy Policy (“Policy”) explains who we are and describes how we collect, share, and use personal data about visitors to our website at www.qloudid.com (together with its subdomains, such as our blog, the “Site”) and users of our mobile, desktop, and web applications (each an “App” and, collectively, the “Apps”), which are available from the Site and third party sellers like the Google Play and Apple App Stores (any such seller, an “App Store”). The Apps and the Site together are the “Services.” Capitalized words used but not defined in this Policy have the meanings provided in our Terms of Service (the “Terms”).
At Qloud ID, we believe that the less information we have about you, the better. We understand that when you use our Services, you are placing your trust in us to appropriately oversee your personal data. It is this trust that serves as the basis for our commitment to take a straightforward and transparent approach to data protection, and part of this approach is ensuring that you are informed about how we may collect and process your personal data. To ensure you are fully informed of our practices, we recommend that you read the entire Policy.
</a></div>
	
	<div class="column_m xs-padtb10 talc lgn_hight_22 fsz16 white_bg " >
			
			<div class="wrap maxwi_100  xs-padr25 xs-padl10  padt40 xs-padt0 white_bg    tall  ">
				
				<section class=" section  whats-new xs-padt0 ffamily_avenir">
					<div class="section__nav section__nav--small">
						<h2 class="whats-new__headline bold">OUR ROLE</h2>
						
					</div>
					<div class="l-row whats-new__content">
						
						<div class="l-column small-12 medium-9 large-8a small-valign-top">
							<div id="ember239" class="we-truncate we-truncate--multi-line we-truncate--interactive ember-view">    
								
								<div data-clamp="" id="ember241" class="we-clamp ember-view fsz14">
								  




<p class="black_txt  brdb_new fsz16">Certain provisions of the Policy apply only to residents of, or people subject to the laws of, jurisdictions with specific statutes governing individuals’ rights over their Personal Data, such as the California Consumer Privacy Act (“CCPA”), the European Union’s General Data Protection Legislation (“GDPR”), and Japan’s Act on the Protection of Personal Information (“APPI,” together with CCPA and GDPR, the “Data Protection Law”). These provisions are clearly labeled. Otherwise, the Policy applies to all users of our Services. Under Data Protection Law, QLOUD ID is the controller of your Personal Data, as described in this Privacy Policy, unless otherwise stated. However, this Privacy Policy does not apply to the extent that we process Personal Data in the role of a processor (or a comparable role such as “service provider” in certain jurisdictions) on behalf of our customers, including where we offer to our customers the Services, through which our customers (and/or their affiliates) connect their own websites and applications to our Services or otherwise collect, use, share, or process Personal Data via our Services. Each of our customers, not QLOUD ID, controls whether they provide you with access and use to our Services, and if they provide you with such access and use, they control what information about you that they submit to our Services. Please reach out to the respective customer directly for privacy information where a QLOUD ID customer uses our Services to collect your Personal Data as QLOUD ID is not responsible for the privacy or data security practices of our customers. If not stated otherwise either in this Privacy Policy or in a separate disclosure, we process such Personal Data in the role of a processor or service provider on behalf of a customer (and/or its affiliates), who is the responsible controller or “business” of the applicable Personal Data. If your Personal Data has been submitted to us by or on behalf of one of our customers and you wish to exercise any rights you may have under applicable data protection laws, please direct your inquiry to the applicable customer directly as we may only access a customer’s data upon instruction from that customer.</p>
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>As used in this Policy, “Personal Data” means information which, either alone or when combined with other information we hold, identifies an individual, such as name, mailing address, email address, IP address, and telephone number. By contrast, “Anonymous Data” means data that, alone or combined with other information available to us or a third party with whom the data is shared, does not permit identification of an individual. We collect and use both Personal Data and Anonymous Data as described below. </li>
<li>We need certain Personal Data to provide the Services. You will be asked to provide this information — and must agree to this Policy and the Terms —to download and use the Apps. This consent, which you may withdraw at any time, provides the legal basis we need to process your Personal Data. You are not required to provide the Personal Data that we request, but we may not be able to provide you with the Services or respond to your inquiries if you don’t.</li>
 
 </ul>


 

<p class="black_txt padt10  padb0"><strong>INFORMATION WE MAY COLLECT ABOUT YOU</strong></p>
<p class="black_txt padt10  padb0">Over the course of the last twelve (12) months, we collect information in the following ways:</p>
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>Contact and Registration Data. We collect contact and professional data about you through communications and through our Services. For example, you provide your contact information to us when you sign up to learn more about our Services, download content, register for an event, and visit our offices. Typically, contact data includes your name and contact methods, such as telephone number, email address, and mailing address, and registration data includes the business name and mailing address, administrator contact information, and may include an end user’s business email address or other information (e.g., biometrical data) provided to authenticate an end user’s access to an App.</li>
<li>Contract and Payment Data. We may receive contract details (like signatures) from you or your organization and use third-party payment processing services to collect payment and billing information, which may contain Personal Data such as billing name, billing address and payment card details, in connection with our Services.</li>
<li>Biographical and Support-related Data.We may also collect biographical and support-related Personal Data from you via our help center and other customer support portals. For example, when you participate in interactive features, trainings, online surveys, contests, promotions, sweepstakes, activities, or events, we may ask you to provide a biographical information, such as your name, occupation, organization name, and areas of expertise. You may also be asked to provide contact information, a summary of the problem you are experiencing, and any other information that would be helpful in resolving a customer support request.</li>
<li>Feedback. If you provide us with Feedback, including reviews posted on App Stores, or suggestions made via direct research or outreach, we may use Personal Data provided in connection with the Feedback in order to respond to you. We may use Feedback without limitation as described in the Terms.</li>
<li>Job Applicant Data.You provide your contact and professional information, including your resume with educational and work background, when you apply for a job with us. You may also provide us with sensitive information, like your Social Security Number or other government identifier, racial or ethnic origin, or other such Personal Data in connection with your job application. </li>
<li>Audio, Electronic, or Visual Data.If you attend a QLOUD ID event, we may record that event, take photos at the event, and interview you at the event. We use this information for business and marketing purposes to better inform the public about QLOUD ID and provide testimonials about our Services.</li>
<li>Other Data. We may also collect other types of information in the manner disclosed by us when the information is collected.</li>
<li>Device and Browser Data. We automatically log the following information about your computer or mobile device when you access the Services: operating system name and version, device identifier, browser type, browser language, geolocation, and IP address, which is collected using cookies, as explained in the Cookie Policy. This data is used to secure your account, ensure the Services are presented in the correct language and optimized for your device, facilitate customer support, and for tax and compliance purposes.</li>
<li>Usage Data. Like many services, we use logs to collect data about the use of the Services (for example, use of features and interactions with the Apps and the Site) in order to provide and improve the Services (“Usage Data”). Usage Data is kept logically separated from Personal Data. Certain QLOUD ID personnel can access Usage Data to analyze the use of the Services and provide user and technical support. Usage Data is also used to automatically send context-appropriate messaging within the Services (e.g., account set-up notices), and to generate Aggregated Data.</li>
<li>Aggregated Data. We derive information about the use of our Services by aggregating Usage Data (e.g., most popular features). This “Aggregated Data” is Anonymous Data, is owned by us, and is primarily used to help analyze and improve the Services.</li>
<li>Cookies. As described in our Cookie Policy, we use cookies and similar technologies to recognize you and/or your device(s) and provide a more personal and seamless experience when interacting with the Services. For general information about what cookies are and how they work, please visit here.</li>
<li>Social Media Platforms. Our Site may use social media features, such as the Facebook “like” button, the Instagram “heart” button, Twitter sharing features, and other sharing widgets (“Social Media Features”). You may be given the option by such Social Media Features to post information about your activities on our Site to a profile page of yours that is provided by a third-party social media network in order to share content with others within your network. Social Media Features are either hosted by the respective social media network or hosted directly on our Site. To the extent the Social Media Features are hosted by the respective social media networks and you click through to these from our Site, the latter may receive information showing that you have visited our website. If you are logged in to your social media account, it is possible that the respective social media network can link your visit to our Site with your social media profile. Your interactions with Social Media Features are governed by the privacy policies of the respective companies that provide the relevant Social Media Features.</li>
<li>We receive information about users from our service providers (such as when validating an account with a payment processor) or from your employer, from publicly available sources like social media accounts, and from data providers such as marketing partners and researchers, where they are legally allowed to share your Information with us.</li>
 </ul>

<p class="black_txt padt10  padb0"><strong>HOW DOES QLOUD ID USE YOUR PERSONAL DATA?</strong></p>
<p class="black_txt padt10  padb0">We use Personal Data to provide and promote the Services and respond to your requests, including to:</p>
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>Establish, maintain, and secure your account.</li>
<li>Identify you as a user and provide the Services you request.</li>
<li>Perform fraud detection and authentication.</li>
<li>Measure traffic and usage activity to improve the Services and your interactions with them. </li>
<li>Send you administrative notifications via email or within the Services, such as payment reminders or support and maintenance advisories. You will receive these notices even if you choose not to receive marketing communications.</li>
<li>Provide you with the correct interfaces and options when you are accessing the Services.</li>
<li>Provide personalized information across the Services by identifying whether you have used specific features within the Services, visited pages on our Site, or seen one of our advertisements.</li>
<li>Respond to customer support inquiries and other requests.</li>
<li>Promote the Services or send you other QLOUD ID marketing information (if you opt-in to receive marketing communications when creating an account or afterwards).</li>
<li>Manage advertising efforts on third-party sites and platforms as further described below.
<ul class="black_txt fsz16  martb0 padb10 padl20 xs-tall ">
<li>With your consent, for example where we have obtained your consent to process your information for certain activities (such as the use of cookies for online tracking and analysis). You are free to withdraw your consent at any time by contacting legal@qloudid.com. If you withdraw your consent, it will not affect the lawfulness of any processing based on your consent before you withdrew it. Where applicable, we may ask for your consent to processing at the point where you provide your information (e.g., cookie banner).</li>
<li>To comply with a contractual obligation (for example, using your contact information to facilitate payment for the Services). We will advise you upon collection whether the provision of your information is mandatory and of the possible consequences if you do not provide us with your information.</li>
<li>For compliance with our legal obligations where other laws require the processing of your information (for example, health and safety, taxation and anti-money laundering laws) or where we need your information to protect your vital interests or those of another person.</li>
<li>Our (and our service providers) legitimate interests which include the provision of the Services, and/or the carrying out of marketing and profiling activities, provided always that our legitimate interests are not outweighed by any prejudice or harm your rights and freedoms.</li>
<li>We do not use your Personal Data for automated decision-making.</li>
</ul>
</li>
 </ul>									

<p class="black_txt padt10  padb0"><strong>HOW DOES QLOUD ID SHARE PERSONAL DATA?</strong></p>

<p class="black_txt padt10  padb0">QLOUD ID does not sell your Personal Data (as “sell” is normally defined – see the YOUR PRIVACY RIGHTS section for information about “sales” as defined in California) or use it except as stated in this Policy. We share your Personal Data in the following circumstances:</p> 
<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>Third Parties You Designate. We may share Personal Data with third parties where you have instructed us to do so (e.g., by using the Services’ “sharing” or “emergency contact” features). While this data is transferred through our servers, we do not have access to it, as noted elsewhere in this Policy.</li>
<li>Service Providers. We provide Personal Data to service providers solely as required to provide the Services, including to create accounts, provide technical support, process payments, or enable communication between you and QLOUD ID. We review the security and data privacy practices of these service providers to ensure that they comply with applicable laws and this Policy.</li>
<li>Marketing. We provide hashed or deidentified IP addresses and device IDs to service providers to optimize our advertising efforts.</li>
<li>Administrators. Administrators of the Services within your organization can see the email addresses used to access the plan and certain Usage Data.</li>
<li>Corporate Restructuring. If QLOUD ID or its business or assets are acquired by, or merged into, another company, that company will possess any Personal Data we hold at such time, and will assume our rights and obligations under this Policy. Accordingly, we may share Personal Data in connection with any such transaction. Personal Data and other information may also be transferred as a business asset in the event of QLOUD ID’s insolvency, bankruptcy, or receivership.</li>
<li>Other Disclosures. We will inform you of any other disclosures or your Personal Data, and obtain your consent, prior to such disclosure. However, regardless of your choices regarding Personal Data, QLOUD ID may disclose your Personal Data (a) where required to comply with law enforcement directives, applicable laws or governmental orders; or (b) if we believe in good faith that doing so is necessary to protect our rights, those of other users, or the Services.</li>
</ul>		


<p class="black_txt padt10  padb0"><strong>CHILDREN’S PRIVACY</strong></p>

<p class="black_txt padt10  padb0">Our Services are not directed to, and we do not intend to or knowingly collect Personal Data online from, children under the age of majority in the countries where the Services are accessed and used. If you are under the age of under the age of majority in your country, do not provide us with any Personal Data either directly, on any website forums, or by other means.</p> 	
<p class="black_txt padt10  padb0">If you learn that a child has accessed or used the Services without parental permission, please contact us as set forth in the Contact Us section below.</p>		


<p class="black_txt padt10  padb0"><strong>DATA SECURITY AND RETENTION.</strong></p>

<p class="black_txt padt10  padb0">We use robust physical, organizational, technical, and administrative measures to safeguard all data we hold or process, and we regularly re-assess and revise our policies and practices to improve security. While we go to great lengths to protect your data, no method of data transmission or storage is totally secure; therefore, we cannot guarantee the security of data in our control. If you believe your data may have been compromised by us or the use of the Services, please contact us immediately. As to our Apps, please review our Security FAQ.</p> 

<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>We will retain your Personal Data for a period of time that is consistent with the original purpose of the data collection, or as necessary to comply with our legal obligations, resolve disputes, and enforce our agreements. We determine the appropriate retention period for Personal Data by considering the amount, nature and sensitivity of your Personal Data processed, the potential risk of harm from unauthorized use or disclosure of your Personal Data and whether we can achieve the purposes of the processing through other means, and on the basis of applicable legal requirements (such as applicable statutes of limitation). Please review our Data Retention Policy for more information.</li>
 
</ul>			


<p class="black_txt padt10  padb0"><strong>YOUR INFORMATION CHOICES</strong></p>

<p class="black_txt padt10  padb0">If you wish to withdraw from direct email marketing communications from us, you may click the “unsubscribe” button included in our emails. Please note, you cannot unsubscribe from critical transactional emails that are related to our provision of our Services (such as those related to security).</p> 

<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>To opt-out of analytics on our Site, you may adjust your cookie preferences as described below. For more information on how to opt-out of tracking technology from Google Analytics, click here. To opt-out of HubSpot’s tracking technology, click here.</li>
<li>You can stop all collection of information by an App by uninstalling that App. You may use the standard uninstall process available as part of your desktop or mobile device or via the mobile application marketplace or network. Uninstalling an App does not delete your Account. To do that, please contact us at support@qloudid.com. </li>
<li>Please see our Cookie Policy for more information. You may adjust your web browser settings to opt-out of non-essential cookies; please understand that blocking or deleting non-essential cookies may affect our Services’ functionality. Since there is no common standard adopted across the industry or regulators for “Do Not Track” signals, we are not able to commit to responding to requested preference changes (please check back as we will continue to monitor developments around this issue). If you came to our Site from personalized advertising, then you may further opt out of interest-based advertising from our advertising vendors through the Digital Advertising Alliance here (for US users) and here (for EEA users).Note that any choice with regards to cookie-based advertising only applies to the web browser through which you exercise that choice. You will still continue to see advertising, including potentially from us, even if you opt-out of personalized advertising.</li>
<li>Most devices provide users with the ability to change device permissions (e.g., disable/access location services, contacts). For most devices, these controls are located in the device’s settings menu. If you have questions about how to change your device permissions, we recommend you contact your mobile service carrier or your device manufacturer as different devices may have different permission settings. Please note that certain functionality of the Services may be impaired or limited depending on your device settings.</li>
 
</ul>			

<p class="black_txt padt10  padb0"><strong>YOUR PRIVACY RIGHTS</strong></p>

  

<ul class="black_txt fsz16 brdb_new martb0 padb10 padl20 xs-tall ">
<li>You may withdraw your consent to our processing of your Personal Data, in whole or in part (i.e., for marketing purposes). Certain Services may be ineffective upon opt out.</li>
<li>	It you are located in the EEA or the United Kingdom, the following provisions apply:
<ul class="black_txt fsz16  martb0 padb10 padl20 xs-tall ">
<li>Our legal basis for collecting, using, and processing your Personal Data is contained in the HOW DOES QLOUD ID USE YOUR PERSONAL DATA section above.</li>
<li>Where the collection or processing of your information is subject to the GDPR, you have the following data subject rights. Please note that these rights are not absolute and in certain cases are subject to conditions as specified in applicable law:
<ul class="black_txt fsz16  martb0 padb10 padl20 xs-tall ">
<li>You have the right to request information about how we process your Personal Data and to obtain a copy of that Personal Data.</li>
<li>You have the right to request the rectification of inaccurate information about you and for any incomplete information about you to be completed.</li>
<li>You have the right to object to the processing of your Personal Data, which is based on our legitimate interests (as described above).</li>
<li>You have the right to request the erasure of your Personal Data (subject to certain conditions).</li>
<li>You have the right not to have a decision made about you that is based solely on automated processing if that decision produces legal or similarly significant effects concerning you.</li>
<li>You have the right to ask us to restrict our processing of your Personal Data, so that we no longer process that Personal Data until the restriction is lifted.</li>
<li>You have the right to receive your Personal Data, which you have provided to us, in a structured, commonly used and machine-readable format and to have that Personal Data transmitted to another organization in certain circumstances.</li>
<li>In addition to the above, you have the right to lodge a complaint with a supervisory authority (a list of which is available here) if you consider that our processing of your Personal Data infringes applicable Data Protection Law.</li>
<li>Your Personal Data may be processed outside your jurisdiction, and in countries that are not subject to an adequacy decision by the European Commission or your local legislature and/or regulator, and that may not provide for the same level of data protection as your jurisdiction, such as the EEA. We ensure that the recipient of your Personal Data offers an adequate level of data protection, for example, by entering into the appropriate back-to-back agreements and, if required, standard contractual clauses for the transfer of data as approved by the European Commission (as described in Article 46 of the General Data Protection Regulation), or we will ask you for your prior consent to such international data transfers. By using the Services, you agree to the transfer, storing or processing of your data in accordance with this Policy.
<ul class="black_txt fsz16  martb0 padb10 padl20 xs-tall ">
<li>If you reside in the State of California, the California Consumer Privacy Act (CCPA) provides you with specific rights regarding your Personal Data. This section describes those rights and how to exercise them.
<ul class="black_txt fsz16  martb0 padb10 padl20 xs-tall ">
<li>Our collection of Personal Data is described in sections (a) through (c) of the INFORMATION WE MAY COLLECT ABOUT YOU heading above. We have shared Personal Data as set forth in HOW DOES QLOUD ID SHARE PERSONAL DATA, for business or commercial purposes consistent with this Privacy Policy. We never exchange Personal Data for money or any other consideration (e.g., trade it for free services). However, the CCPA’s definition of “sale” is very broad, and may include situations like when browsing data is sent to advertisers (when you click on an ad that sends you to QLOUD ID, we send a hashed identifier to the referring site so they can receive credit for the referral). While we only send what is needed to properly record the referral, the fact that you clicked on the link and visited QLOUD ID may be added to your profile by the ad publisher. This is all done on the Site with cookies and other similar technology and opting out of the sale of your Personal Data will automatically turn them off. You may direct us not to sell your Personal Data by contacting us directly.</li>
<li>You have the right to request that we disclose certain information to you regarding our collection, use, and disclosure of your Personal Data over the past 12 months, including the categories and specific pieces of Personal Data we possess, the categories of sources of the Personal Data, the business or commercial purpose for collecting the Personal Data, and the categories of third parties with whom we share or sell the information, and the specific pieces of Personal Data we have collected about you.  Upon verified request, we will respond to your request for such information. You also have a right to request that we delete your Personal Data. Please note that, in certain cases, we deny a request to delete your Personal Data if we have a legal basis to do so. For example, we may retain certain information for the reasons stated under the HOW DOES QLOUD ID USE YOUR PERSONAL DATA heading above.</li>
<li>You may make a request on behalf of yourself or you may authorize an agent who is registered with the Secretary of State for the State of California to act on your behalf. You may also make a request on behalf of your minor child.</li>
<li>We will not discriminate against individual for exercising their rights under the CCPA.</li>
</ul>
</li>
</ul>

</li>
</ul>

</li>
<li>If you wish to exercise any of these rights, please submit the request by emailing us at legal@qloudid.com, or write us at the address below. In your request, please make clear: (i) what Personal Data is concerned; and (ii) which of the above rights you would like to enforce. For your protection, we may only fulfil requests with respect to the Personal Data associated with the email address you send your request from, and we will need to verify your identity before doing so. We will comply with your request promptly, but in any event within the legally mandated timeframes (thirty (30) days for the GDPR and forty-five (45) days for the CCPA). We may need to retain certain information for recordkeeping purposes or to complete transactions that you began prior to requesting such change or deletion.</li>
<li>We will verify all requests by contacting you using contact information retained in our systems. If our information does not allow us to contact you, then we will verify your identity by asking you to confirm the data we have in our system. We cannot respond to requests that cannot be verified.</li>
</ul>

</li>
 
 
</ul>	


<p class="black_txt padt10  padb0"><strong>CHANGES TO THIS POLICY</strong></p>	
<p class="black_txt padt10  padb0">This Policy may be updated from time to time, to reflect changes in our practices, technologies, additional factors, and to be consistent with applicable Data Protection Law, and other legal requirements. If we do make updates, we will update the “effective date” at the top of this Privacy Policy webpage. If we make a material update, we may provide you with notice prior to the update taking effect, such as by posting a conspicuous notice on our website or by contacting you using the email address you provided.</p>		
<p class="black_txt padt10  padb0"><strong>CONTACT INFORMATION; COMPLAINTS</strong></p>	
<p class="black_txt padt10  padb0">If you have questions, concerns, or complaints about this Policy or our data collection or processing practices, or if you want to report any security violations, please email legal@qloudid.com, or write the address below:</p>	
<p class="black_txt padt20  padb0">ABC Tech AB</p>		
<p class="black_txt padt0  padb0">Attn: Legal</p>	
<p class="black_txt padt0  padb0">Strindbergsgatan 37,115 31, Stockholm</p>	
<p class="black_txt padt0  padb0">+46 10 1510125</p>	
		
								</div>
								
								
								
								
							<!----></div>
						</div>
					</div>	</section>
				
			</div>		
			
		</div>
	
		
								 
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
	 
		 
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	 <div class="popup_modal wi_300p maxwi_90 pos_fix pos_cen zi50 bs_bb lgtgrey_bg fsz14 brdrad10 popup_shadow" id="gratis_popup_delete">
		<div class="modal-content nobrdb talc box_shadox brdradtr10  lgtgrey_bg">
			
			
			<div class="pad25 lgtgrey_bg brdradtr10">
				<img src="../../../../../html/usercontent/images/kitten_1.jpg" class="maxwi_100 hei_150p">
			</div>
			<h2 class="marb0 padrl10 padt25 bold fsz24 black_txt">Are you Sure?</h2>
			
			<div class="wi_100 dflex fxwrap_w marrla marb0 tall padrl20">
				
				
				
				<div class="wi_100 marb0 talc">
					
					<span class="valm fsz16">All available dishes in the menu will also be deleted. </span>
				</div>
				
				
			</div>
			
			<form action="../../deleteCategory/<?php echo $data['cid']; ?>/<?php echo $data['rid']; ?>" name="save_indexing2" id="save_indexing2" method="POST" >
			<input type="hidden" name="category_id" id="category_id" />
				</form>
			<div class="on_clmn padtb10">
				<a href="#" onclick="confirmCategoryDelete();"><input type="button" value="Confirm" class="wi_300p maxwi_100   hei_50p diblock nobrd red_ff2828_bg fsz18 white_txt curp bold close_popup_modal"></a>
				
			</div>
			
			<div class="on_clmn padt0">
				<input type="button" value="Close" class="close_popup_modal wi_300p maxwi_100 brdradbl10 hei_50p diblock nobrd panlyellow_bg fsz18 black_txt curp bold">
				
			</div>
			 
	</div>
	
	</div>
	
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/vex.combined.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/superfish.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/custom.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.translate.js"></script>
	
	
 </body>

</html>