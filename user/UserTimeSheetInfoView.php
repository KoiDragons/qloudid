 

<head>
 
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/images/favicon.ico">
		<title>Qloud ID</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/slick-theme.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		 <script type="text/javascript" src="<?php echo $path; ?>html/usercontent/js/jquery.js"></script>
		
	<script>
 var userProject='<option value="0" >Select</option> <option value="1" >User profile</option> <option value="2" >App</option>';
 var companyProject='<option value="0" >Select</option> <option value="1" >Company profile</option> <option value="2" >App</option>';
 var appProject='<option value="0" >Select</option>';
								
		function updateProjectSubcategory(id)
         {
			 $('#appInfo').addClass('hidden');
			 $('#app_id').html('');
			 $('#app_id').html(appProject);
			 if(id==1)
			 {
			 $('#project_subcategory_type').html('');
			 $('#project_subcategory_type').html(userProject); 
			 }
			else if(id==2)
			 {
			 $('#project_subcategory_type').html('');
			 $('#project_subcategory_type').html(companyProject); 
			 }	
			 else
			 {
			 $('#project_subcategory_type').html('');
			 $('#project_subcategory_type').html(appProject);  
			 }
         }
       
	 function updateProjectAvailableApp(id)
	 {
		 if(id==1)
		 {
			 $('#appInfo').addClass('hidden');
			 $('#app_id').html('');
			 $('#app_id').html(appProject); 
		 }
		 else
		 {
			var send_data={};
			send_data.project_type=$('#project_type').val();	 
				 $.ajax({
							type:"POST",
							url:"getAvailableApps",
							data:send_data,
							dataType:"text",
							contentType: "application/x-www-form-urlencoded;charset=utf-8",
							success: function(data1){
								$('#appInfo').removeClass('hidden');
								 $('#app_id').html('');
								 $('#app_id').html(data1); 
								}
						});	
							 
		 }
	 }
	  
		
		function submitform()
		{
			$('#error_msg_form').html('');
			var submitFlag=1;
			
			if($("#project_type").val()==0)
			{
				$("#error_msg_form").html('Please select project type');
                 submitFlag = 0;
                 return false;
			}
			
		 if($("#project_subcategory_type").val()==0)
			{
				$("#error_msg_form").html('Please select project subcategory');
                 submitFlag = 0;
                 return false;
			}
			
			if($("#project_subcategory_type").val()==2)
			{
				if($("#app_id").val()==0)
					{
						$("#error_msg_form").html('Please select app');
						 submitFlag = 0;
						 return false;
					}
			}
			 
			if($("#project_title").val()==null || $("#project_title").val()=="")
			{
				$("#error_msg_form").html('Please enter title of task');
                 submitFlag = 0;
                 return false;
			} 
			
			if($("#project_description").val()==null || $("#project_description").val()=="")
			{
				$("#error_msg_form").html('Please enter description of task');
                 submitFlag = 0;
                 return false;
			}
			if($("#project_time_spent").val()==null || $("#project_time_spent").val()=="")
			{
				$("#error_msg_form").html('Please enter actual time spent on task');
                 submitFlag = 0;
                 return false;
			}
			
			if(isNaN($("#project_time_spent").val()))
			{
				$("#error_msg_form").html('Please enter numeric value for time spent');
                 submitFlag = 0;
                 return false;
			}
			
			  document.getElementById('save_indexing').submit();	 
			
			 
			}
		
		 
	  
	
	 
			</script>
			
			
		
	</head>
	<body class="white_bg ffamily_avenir">
	 
	<div class="column_m header   bs_bb lgtgrey2_bg hidden-xs">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p " style=" padding : 10px 0 0 0;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
				 
                        <a href="taskListing" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
					 
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
					 
						 <a href="taskListing" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
						 
                     </li>
								
								
								
								
								
							</ul>
						</div>
				
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
					 
									<div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz50 xxs-fsz45 lgn_hight_55 xxs-lgn_hight_45 padb0 black_txt trn ffamily_avenir">Timesheet</h1>
									</div>
									
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20">Please add your work info here.</a></div>
									
								 
								<div class="tab-header mart10 padb10 xs-tall brdb tabbluebrdcolor nobrdt nobrdl nobrdr tall hidden">
                                            <a href="#" class="dinlblck mar5 padrl15   tabblueBGcolor brdrad5  lgn_hight_36 fsz16 midgrey_txt seggreen_txt_h white_txt_a white_txt_ah ffamily_avenir active">Basic</a>
											 
											   
                                             
                                        </div>	
									
							<form action="addTaskInformation" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0   padtrl0 white_bg">
								<div class="marrl0 padb15 brdb fsz16 white_bg tall padt20">
								<a href="#profile5" class="expander-toggler white_txt xs-fsz16 tall tabblueBGcolor padrl30 padtb10 brdrad5 active">Task Detail
								<span class="dnone_pa fa fa-chevron-down fright dark_grey_txt "></span><span class="dnone diblock_pa fa fa-chevron-up padr15 fright dark_grey_txt "></span></a></div>
								<div id="profile5" class=" " style="display:block;">	
									
											
										 
											
										 
											 
											
										  
											 
											
											
											
											<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<select id="project_type" name="project_type" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"    onchange="updateProjectSubcategory(this.value);" />
														
													 	 <option value="0" >Select</option>	 												
														 <option value="1" >User</option>
														 <option value="2" >Business</option>
														     
																													
													</select>
													 
												 <label for="project_type" class="floating__label tall nobold padl10" data-content="Project type">
											<span class="hidden--visually">
											  Owner type</span></label>
												</div>
												 
											</div>
											
											
											<div class="on_clmn padt10">
											 
										<div class="pos_rel">
										<select id="project_subcategory_type" name="project_subcategory_type" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"    onchange="updateProjectAvailableApp(this.value);"  />
														
													 													
													 <option value="0" >Select</option>	 
																													
													</select>
													 
												 <label for="project_subcategory_type" class="floating__label tall nobold padl10" data-content="Project subcategory">
											<span class="hidden--visually">
											  Owner type</span></label>
												</div>
												 
											</div>
											
											
											<div class="on_clmn padt10 hidden" id="appInfo">
											 
										<div class="pos_rel">
										<select id="app_id" name="app_id" class="wi_100 white_bg padt25 brd_width_2 brdb_new nobrdt nobrdr nobrdl tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25 custom-select"     />
														
													 													
													 <option value="0" >Select</option>	 
																													
													</select>
													 
												 <label for="app_id" class="floating__label tall nobold padl10" data-content="App name">
											<span class="hidden--visually">
											  Owner type</span></label>
												</div>
												 
											</div>

											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="project_title" id="project_title" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												
											 <label for="project_title" class="floating__label tall nobold padl10" data-content="Project title" >
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="project_description" id="project_description" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												
											 <label for="project_description" class="floating__label tall nobold padl10" data-content="Project description" >
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="date" name="project_task_date" id="project_task_date" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25" value="<?php echo date('Y-m-d'); ?>"> 
												
											 <label for="project_task_date" class="floating__label tall nobold padl10" data-content="Task date" >
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="number" name="project_time_spent" id="project_time_spent" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												
											 <label for="project_time_spent" class="floating__label tall nobold padl10" data-content="Total time" >
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
											
											
											<div class="on_clmn padt10">
											 
											<div class="pos_rel">
												
												<input type="text" name="project_link" id="project_link" placeholder="First name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_65p fsz20 padl10 black_txt ffamily_avenir light_grey_bg floating__input padt25"> 
												
											 <label for="project_link" class="floating__label tall nobold padl10" data-content="Task link" >
											<span class="hidden--visually">
											  First name</span></label>
											</div>
											 
											 
											</div>
																									
											 
											</div>
							
								<div class="clear"></div>
								 
							
										
										
										
										<input type="hidden" id="indexing_save" name="indexing_save">
										
								<div class="red_txt fsz20 talc" id="error_msg_form"> </div>
								
							
							
						 
							 
						    <div class="clear"></div>
					<div class="talc padtb20 ffamily_avenir mart35 "> <a href="javascript:void(0);" onclick="submitform();"><button type="button" value="Add" class="forword minhei_55p  fsz18    ffamily_avenir">Submit</button></a> </div>
							
						</div></form>
							 
							   <div class="clear"></div>
					 
							
						</div>
						</div>
						
								 
			 
			<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		</div>
		
		
		<div class="popup_modal wi_350p maxwi_90 opa0 opa1_a pos_fix pos_cen zi50 bs_bb white_bg fsz14 gratis_popup_company_searched brd brdrad10"  id="gratis_popup_error">
			<div class="modal-content pad25 brd brdrad10">
				
				<h3 class="pos_rel marb15 pad0 padr40 bold fsz20 dark_black_txt">
					<div id="errorMsg">	 </div>
					<a href="#" class="close_popup_modal dblock pos_abs top-10p right-10p pad10 nobold txt_0"><span class="fa fa-close dblock"></span></a>
				</h3>
				
				
				
				
				
				
				
				
			</div>
		</div>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown" data-target="#menulist-dropdown,#menulist-dropdown" data-classes="active" data-toggle-type="separate"></a>
		<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs top0 left0 zi30" id="menulist-dropdown2" data-target="#menulist-dropdown2,#menulist-dropdown2" data-classes="active" data-toggle-type="separate"></a>
		
		
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<!--<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>-->
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	</body>
	 						