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
	var passion=<?php echo $data['count']; ?>;
	var orientation=<?php echo $data['counts']; ?>;
	function updateSmoke(id,link)
   {
	   smoke=id;
	  
   }
   
   function updateDrink(id,link)
   {
	   drink=id;
	  
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
	var newChild=' <div class="on_clmn  mart20"><div class="thr_clmn  wi_50 padr10 "><div class="pos_rel talc"><input type="text" value="Child gender" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" /><select class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir  "   name="child_gender[]" id="child_gender[]" ><option value="1" class="lgtgrey2_bg black_txt"  >Boy</option><option value="2" class="lgtgrey2_bg black_txt"  >Girl</option></select></div></div><div class="thr_clmn  wi_50 padl10"  ><div class="pos_rel"><input type="text" value="Child age" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" /><input type="number" min="0" value="0" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "   name="child_age[]" id="child_age[]" /></div></div></div>';
	$('#moreChild').append(newChild);
   }
	function addType(id)
	{
		var getValue=$('#user_passion').val();
		if($('#'+id).hasClass('green_98ce44'))
		{
			passion--;
			$('#'+id).removeClass('green_98ce44');
			$('#'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#user_passion").val(getValue);
		}
		else
		{
			passion++;
			$('#'+id).addClass('green_98ce44');
			$('#'+id).removeClass('lgtgrey_bg');		
			getValue=getValue+id+',';
			$("#user_passion").val(getValue);
		}
		
	}
	
	function addTypeo(id)
	{
		var getValue=$('#s_orientation').val();
		if($('#s'+id).hasClass('green_98ce44'))
		{
			orientation--;
			$('#s'+id).removeClass('green_98ce44');
			$('#s'+id).addClass('lgtgrey_bg');		
			getValue = getValue.replace(id+",", "");
			$("#s_orientation").val(getValue);
		}
		else
		{
			orientation++;
			$('#s'+id).addClass('green_98ce44');
			$('#s'+id).removeClass('lgtgrey_bg');		
			getValue=getValue+id+',';
			$("#s_orientation").val(getValue);
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
			
			$("#errorMsg1").html('');
			 
			if(passion<3)
			{
				
				$("#errorMsg1").html('Please select atleast three passion');
				return false;
			}
			 
			if(orientation<3)
			{
				
				$("#errorMsg1").html('Please select atleast three sexual orientation');
				return false;
			} 
			
			if($('#address').val()=='' || $('#address').val()==null)
			{
			$("#errorMsg1").html('Please enter address');
				return false;	
			}
			
			if($('#distance').val()=='' || $('#distance').val()==null)
			{
			$("#errorMsg1").html('Please enter distance');
				return false;	
			}
			document.getElementById('save_indexing').submit();
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
                        <a href="NewsfeedDetail" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			<?php if($friendFinderUserStart ['is_completed']==1) { ?>
			<div class="fright xs-dnone sm-dnone padt10 padb10">
					<ul class="mar0 pad0 sf-menu fsz16 sf-js-enabled sf-arrows">
						
						 
	 
	<li class="dblock hidden-xs hidden-sm fright pos_rel   last"><a href="FriendFinder/preference" id="usermenu_singin" class="translate hei_30pi dblock padrl25    lgn_hight_30 black_txt   ffamily_avenir padt5">Preferences</a></li>
	 
						
					</ul>
				</div> 
			<?php } ?>				
            <div class="clear"></div>
         </div>
      </div>
		<div class="column_m header xs-hei_55p  bs_bb white_bg visible-xs">
            <div class="wi_100 xs-hei_55p hei_65p pos_fix padtb5 padrl10 white_bg ">
                <div class="visible-xs visible-sm fleft padrl0">
							<div class="flag_top_menu flefti  padb10 wi_70p " style=" padding : 10px 0 0 0;">
							<ul class="menulist sf-menu  fsz14">
								 
								<li class="first last" style="margin: 0 30px 0 0;">
									<a href="NewsfeedDetail" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left black_txt" aria-hidden="true"></i></a>
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
							
									<h1 class="marb0  xxs-talc talc fsz100 xxs-fsz65 lgn_hight_100 xxs-lgn_hight_65 padb0 black_txt trn ffamily_avenir"  >Finder</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc  xs-padb20 padb35 ffamily_avenir"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Describe userself</a></div>
					 
					 
							
							<form action="FriendFinder/updateInfo" method="POST" id="save_indexing" name="save_indexing" accept-charset="ISO-8859-1">
								
								 
								<div class="marb0 padtrl0">		 
							 
											  
											
											 <div class="on_clmn ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Who you are" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											 
											<div class="on_clmn   ">
											 
											<div class="pos_rel">
												
												<select name="gender" id="gender"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" disabled> 
														<option value="1" class="lgtgrey2_bg" <?php if($userSummary['sex']==1) echo 'selected'; ?>>Male</option>
														<option value="2" class="lgtgrey2_bg" <?php if($userSummary['sex']==2) echo 'selected'; ?>>Female</option>
													 
											</select>
												
											</div>
										 
											 
										</div>
										
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="How tall you are?" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									<div class="on_clmn">
								 
								 
											 
										<div class="pos_rel  ">
									
										<select name="height" id="height"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
														<option value="1" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_height']==1) echo 'selected'; ?>>145cm to 150cm</option>
														<option value="2" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_height']==2) echo 'selected'; ?>>151cm to 160 cm</option>
														<option value="3" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_height']==3) echo 'selected'; ?>>161cm to 170 cm</option>
														<option value="4" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_height']==4) echo 'selected'; ?>>171cm to 180 cm</option>
														<option value="5" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_height']==5) echo 'selected'; ?>>181cm to 190 cm</option>
														<option value="6" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_height']==6) echo 'selected'; ?>>191cm to 2 mtrs</option>
													 
											</select>
										 
									</div>
									 </div> 
									 
									 <div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Your weight" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
											
										<div class="on_clmn">
								 
								 
											 
										<div class="pos_rel  ">
									
										<select name="weight" id="weight"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
														<option value="1" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_weight']==1) echo 'selected'; ?>>Thin</option>
														<option value="2" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_weight']==2) echo 'selected'; ?>>Normal</option>
														<option value="3" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_weight']==3) echo 'selected'; ?>>Athletic</option>
														<option value="4" class="lgtgrey2_bg" <?php if($friendFinderUserStart['user_weight']==4) echo 'selected'; ?>>Over-weight</option>
														 
													 
											</select>
										 
									</div>
									 </div>	 
										
									
										 <div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have body tattoo" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($friendFinderUserStart['user_body_tattoo']==1) echo 'checked'; ?>" onclick="updateTattoo(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>	
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you smoke?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($friendFinderUserStart['smoking']==1) echo 'checked'; ?>" onclick="updateSmoke(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>	
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you Drink?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright <?php if($friendFinderUserStart['drinking']==1) echo 'checked'; ?> " onclick="updateDrink(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										
										
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you use tobbacco?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($friendFinderUserStart['tobbacoo']==1) echo 'checked'; ?>" onclick="updatetobaccoo(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>
										<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Civil status" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
										<div class="on_clmn">
								 
								 
											 
										<div class="pos_rel  ">
									
										<select name="c_status" id="c_status"  class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"> 
														<option value="1" class="lgtgrey2_bg" <?php if($friendFinderUserStart['civil_status']==1) echo 'selected'; ?>>Single</option>
														<option value="2" class="lgtgrey2_bg" <?php if($friendFinderUserStart['civil_status']==2) echo 'selected'; ?>>Married</option>
														 
														 
													 
											</select>
										 
									</div>
									 </div>	 
									 
									 
										<div class="on_clmn  mart20  brdb">	
									<div class="thr_clmn  wi_75 ">
											 
										<div class="pos_rel talc">
									
										<input type="text" value="Do you have children?" class="wi_100 rbrdr pad10 padb0   tall  minhei_55p fsz18 black_txt ffamily_avenir" readonly="">
										 
									</div>
									</div>
										<div class="thr_clmn  wi_25"  >
								<div class="pos_rel">											
											<div class="fright   wi_100 minhei_55p  padt20 xs-padt15 marl0 fsz25  padb0  " >
														<div class="boolean-control boolean-control-small boolean-control-green fright  <?php if($friendFinderUserStart['children']==1) echo 'checked'; ?>" onclick="updateChildren(1,this);">
																<input type="checkbox"  class="default" data-true="" data-false="" />
															</div>
													</div>
											</div>
											</div>
											 
									 

										</div>

										
											
										<div id="childDetails" style="display:<?php if($friendFinderUserStart['children']==1) echo 'block'; else echo 'none'; ?>;">
											 <?php if($friendFinderUserStart['children_gender']=="" || $friendFinderUserStart['children_gender']==null) { ?>
												<div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Child gender" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<select class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir  "   name="child_gender[]" id="child_gender[]" >
											 <option value="1" class="lgtgrey2_bg black_txt"  >Boy</option>
											<option value="2" class="lgtgrey2_bg black_txt"  >Girl</option>
											                
											</select>
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Child age" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="number" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="0" name="child_age[]" id="child_age[]" min="0"/>
											
										</div>
									</div>
									 
									</div>
											 <?php } else { $i=0; $gender=explode(',',$friendFinderUserStart['children_gender']); $age=explode(',',$friendFinderUserStart['children_age']); 
											 foreach($gender as $key)
											 {
											 ?>
											 <div class="on_clmn  mart20   ">
									<div class="thr_clmn  wi_50 padr10 ">
											 
										<div class="pos_rel talc">
									<input type="text" value="Child gender" class="wi_100 nobrd   pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
										<select class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir  "   name="child_gender[]" id="child_gender[]" >
											 <option value="1" class="lgtgrey2_bg black_txt" <?php if($key==1) echo 'selected'; ?> >Boy</option>
											<option value="2" class="lgtgrey2_bg black_txt" <?php if($key==2) echo 'selected'; ?> >Girl</option>
											                
											</select>
									</div>
									</div>
								<div class="thr_clmn  wi_50 padl10"  >
											<div class="pos_rel">
											<input type="text" value="Child age" class="wi_100 nobrd padb0   pad10  padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="" />
											
											<input type="number" class="wi_100    lgtgrey_bg txtind10 brd tall minhei_55p fsz18 llgrey_txt ffamily_avenir "  value="<?php echo $age[$i]; ?>" name="child_age[]" id="child_age[]" min="0"/>
											
										</div>
									</div>
									 
									</div>
											 <?php $i++; } } ?>
									<div id="moreChild">
									</div>
									 <div class="clear"></div>
									<div class="talc padt20 ffamily_avenir mart35"> <a href="javascript:void(0);" onclick="addMore();"><input type="button" value="Add child" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>
									
									</div>
									<div class="on_clmn   mart20 ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Describe yourself" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									<div class="on_clmn ">
												
												<div class="pos_rel ">
											<textarea name="user_description" id="user_description" placeholder="Serial number" class="texteditor wi_100 rbrdr pad10 mart5 hei_50p llgrey_txt lgtgrey2_bg fsz18 brdrad5 ffamily_avenir"><?php echo $friendFinderUserStart['user_description']; ?></textarea> 
											</div>
											</div>
									
									<div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="User passion" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									 <div class="wi_100 maxwi_500p ovfl_hid padt10 brdb">
										 
										<div class="category-apps email-collab marrbl-2 uppercase fsz12">
										 
										 <?php $i=0; foreach($userPassion as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<a href="javascript:void(0);" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h  <?php if($value['is_selected']==0)echo 'lgtgrey_bg'; else echo 'green_98ce44'; ?>  brdr black_txt connect" onclick="addType(<?php echo $value['id']; ?>);" id="<?php echo $value['id']; ?>"> <span class="dblock pi1<?php echo $i; ?> ffamily_avenir"></span><?php echo substr($value['passion_info'],0,13); ?></a>
														<?php $i++; } ?>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
									 	
										 <div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Address" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="address" id="address" placeholder="Address" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $friendFinderUserStart['address']; ?>" /> 
												
											 
											</div>
											 
											</div>
											
											<div class="on_clmn   mart20 brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Sexual Orientation" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									 <div class="wi_100 maxwi_500p ovfl_hid padt10 brdb">
										 
										<div class="category-apps email-collab marrbl-2 uppercase fsz12">
										 
										 <?php $i=0; foreach($sexualOrientation as $category => $value) 
														{
															$category = htmlspecialchars($category); 
														?>
											<a href="javascript:void(0);" class="wi_33 dblock fleft pos_rel zi3_h padt30 brdb brdb_green_h  <?php if($value['is_selected']==0)echo 'lgtgrey_bg'; else echo 'green_98ce44'; ?>  brdr black_txt connect" onclick="addTypeo(<?php echo $value['id']; ?>);" id="s<?php echo $value['id']; ?>"> <span class="dblock pi1<?php echo $i; ?> ffamily_avenir"></span><?php echo substr($value['orientation_type'],0,13); ?></a>
														<?php $i++; } ?>
											<div class="wi_100 hei_1p fleft pos_rel zi2 mart-1 white_bg xs-bg_fa"></div>
										</div>
									</div>
									 	
										 
									 
									 
									  <div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Distance" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="distance" id="distance" placeholder="Distance" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" value="<?php echo $friendFinderUserStart['distance']; ?>" /> 
												
											 
											</div>
											 
											</div>
											
											
											<div class="on_clmn   mart20  ">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Date of birth" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 									
									  <div class="on_clmn">
											<div class="pos_rel">
												
												<input type="text" name="dob" id="dob" value="<?php echo $userSummary['dob_day'].'-'.$userSummary['dob_month'].'-'.$userSummary['dob_year']; ?>" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" readonly> 
												
											 
											</div>
											 
											</div>
																			
								 			 <input type="hidden" id="smoking" name="smoking" value="<?php echo $friendFinderUserStart['smoking']; ?>" />									
									 <input type="hidden" id="user_body_tattoo" name="user_body_tattoo" value="<?php echo $friendFinderUserStart['user_body_tattoo']; ?>" />										
																			
								 	 <input type="hidden" id="user_passion" name="user_passion" value="<?php echo $friendFinderUserStart['user_passion']; ?>" />
							<input type="hidden" id="s_orientation" name="s_orientation" value="<?php echo $friendFinderUserStart['sexual_orientation']; ?>" />
									  <input type="hidden" id="drinking" name="drinking" value="<?php echo $friendFinderUserStart['drinking']; ?>" />	
									  
									   <input type="hidden" id="tobbacoo" name="tobbacoo" value="<?php echo $friendFinderUserStart['tobbacoo']; ?>" />	
									    <input type="hidden" id="children" name="children" value="<?php echo $friendFinderUserStart['children']; ?>" />	
									 
										 <input type="hidden" id="user_gender" name="user_gender" value="<?php echo $userSummary['sex']; ?>" />
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
	 						