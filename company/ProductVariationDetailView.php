<!doctype html>
<?php
	 $path1 = "../../../../html/usercontent/images/";
	 ?>

<html>
	
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Qmatchup</title>
		<!-- Styles -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path;?>html/usercontent/images/favicon.ico">
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/jquery-ui.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/stylenew.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/floatingLabel.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/keepcss/constructor.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/responsive.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php echo $path;?>html/usercontent/css/modulesnewy_bg.css" />
		<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Allerta+Stencil" rel="stylesheet">
		
		<!-- Scripts -->
		<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.js"></script>
		
		
		<script>
			function submitDepartment()
			{
				
				$("#errorMsg").html('');
				if($("#c_name").val()=="" || $("#c_name").val()==null)
				{
				$("#errorMsg").html('please enter variation name');	
				return false;
				}
				
				
					
					document.getElementById('save_indexing').submit();
				
				
			}
			function clearNewLine()
			{
				if($('#d_type').val()==3)
						{
						$('.color').removeClass('hidden');
						}
						else
						{
						$('.color').addClass('hidden');	
						}
			$('#variationSubDetail').html('');		
			}
			function deleteSubvariation(id)
			{
				
				var send_data={};
				send_data.id=id;
				$.ajax({
					type:"POST",
					url:"../deleteSubVariation",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
					$('#'+id).remove();	
					rId=id+',';
					//var tId=$('#subId').val();
					$('#subId').val().replace(rId, "");
				}
				
					});
			}
			function getBgColorHex(elem){
    var color = elem.css('background-color')
    var hex;
    if(color.indexOf('#')>-1){
        //for IE
        hex = color;
    } else {
        var rgb = color.match(/\d+/g);
        hex = '#'+ ('0' + parseInt(rgb[0], 10).toString(16)).slice(-2) + ('0' + parseInt(rgb[1], 10).toString(16)).slice(-2) + ('0' + parseInt(rgb[2], 10).toString(16)).slice(-2);
    }
    return hex;
}
			function editSubvariation(id)
			{
				//alert(getBgColorHex($('.subColor'+id))); 
				color=getBgColorHex($('.subColor'+id));
				va_name=$('.subName'+id).text();
				if($('#d_type').val()==3)
				{
				var newLineDetail='<div class="on_clmn mart20"><div class="thr_clmn  wi_70 padr10" ><div class="pos_rel"><input type="text" name="v_name" id="v_name" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" placeholder="Write subvariation name "  value="'+va_name+'"></div></div><div class="thr_clmn  wi_30 padl10" ><div class="pos_rel"><input type="color" name="c_code" id="c_code" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"  value="'+color+'" ></div></div></div> <input type="hidden" id="upId" name="upID" value="'+id+'" /> <div class="clear"></div><div class="talc padt20 ffamily_avenir"> <a href="javascript:void(0);" onclick="updateSubVariation();"><input type="button" value="Update" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>';
				}
				else
				{
				var newLineDetail='<div class="on_clmn mart20"><div class="pos_rel"><input type="text" name="v_name" id="v_name" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir" placeholder="Write subvariation name " value="'+va_name+'"></div></div><div class="thr_clmn  wi_30 padl10 hidden" ><div class="pos_rel"><input type="color" name="c_code" id="c_code" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"  value="'+color+'"></div></div> <input type="hidden" id="upId" name="upID" value="'+id+'" />  <div class="clear"></div><div class="talc padt20 ffamily_avenir"> <a href="javascript:void(0);" onclick="updateSubVariation();"><input type="button" value="Update" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>';	
				}
				$('#variationSubDetail').html(newLineDetail);
			}
			function updateSubVariation()
			{
				var send_data={};
				$('#variationSubDetail').addClass('hidden');
				send_data.v_name=$('#v_name').val();
				send_data.c_code=$("#c_code").val();
				send_data.d_type=$('#d_type').val();
				send_data.id=$('#upId').val();
					$.ajax({
					type:"POST",
					url:"../updateSubVariation",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if($('#d_type').val()==3)
						{
							var hiddenD='';
						}
						else
						{
						var hiddenD='hidden';	
						}							
						var listRow='<div class=" white_bg brdb   bg_fffbcc_a "><div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10"><div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"><div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"><a href="#"  onclick="editSubvariation('+send_data.id+');"><div class="fleft  wi_60 xs-wi_70    xs-mar0  "><span class="edit-text bold   jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt subName'+send_data.id+'">'+$('#v_name').val()+'</span></div><div class="fleft wi_50p marr15  "> <div class="wi_20p   hei_20p   fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg subColor'+send_data.id+' color '+hiddenD+'" style="background-repeat: no-repeat;background-position: 50%;border-radius: 10%; background-color:'+$('#c_code').val()+'"> </div></div></a> <a href="#"  onclick="deleteSubvariation('+send_data.id+');"> <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz20    padb0"><span class="fas fa-trash txt_cfdbea" aria-hidden="true"></span> </div></a></div><div class="clear"></div></div></div></div>';
						$('#'+send_data.id).html(listRow);
					$('#variationSubDetail').html('');	
					$('#variationSubDetail').removeClass('hidden');
					 
				}
				
					});
			}
			
			function addSubVariation()
			{
				var send_data={};
				$('#variationSubDetail').addClass('hidden');
				send_data.v_name=$('#v_name').val();
				send_data.c_code=$("#c_code").val();
				send_data.d_type=$('#d_type').val();
					$.ajax({
					type:"POST",
					url:"../addSubVariation",
					data:send_data,
					dataType:"text",
					contentType: "application/x-www-form-urlencoded;charset=utf-8",
					success: function(data1){
						if($('#d_type').val()==3)
						{
							var hiddenD='';
						}
						else
						{
						var hiddenD='hidden';	
						}							
						var listRow='<div class="column_m container  marb5   fsz14 dark_grey_txt" id="'+data1+'"><div class=" white_bg brdb   bg_fffbcc_a "><div class="container padtb15  brdrad1 fsz14 dark_grey_txt padrl10"><div class="passport signin_bx dflex fxwrap_w xs-alit_c pos_rel tall"><div class="wi_100 xs-wi_100 xs-order_3 xs-padt0 fsz12"><a href="#"  onclick="editSubvariation('+data1+');"><div class="fleft  wi_60 xs-wi_70    xs-mar0  "><span class="edit-text bold   jain2 dblock   brdclr_lgtgrey2 fsz18 xs-padt0 black_txt subName'+data1+'">'+$('#v_name').val()+'</span></div><div class="fleft wi_50p marr15  "> <div class="wi_20p   hei_20p   fxshrink_0 dflex alit_c justc_c uppercase fsz25   brdrad1000 yellow_bg_a lgtgrey_bg subColor'+data1+' color '+hiddenD+'" style="background-repeat: no-repeat;background-position: 50%;border-radius: 10%; background-color:'+$('#c_code').val()+'"> </div></div></a> <a href="#"  onclick="deleteSubvariation('+data1+');"> <div class="fright wi_10 padl0 xxs-wi_10 xsip-wi_10 sm-wi_10 marl0 fsz20    padb0"><span class="fas fa-trash txt_cfdbea" aria-hidden="true"></span> </div></a></div><div class="clear"></div></div></div></div></div> ';
						$('#subVariationList').append(listRow);
					$('#variationSubDetail').html('');	
					$('#variationSubDetail').removeClass('hidden');
					var newSubId=data1+',';
					totalId=$('#subId').val()+newSubId;
					$('#subId').val(totalId);
				}
				
					});
			}
			
			function addNewLine()
			{
				if($('#d_type').val()==3)
				{
				var newLineDetail='<div class="on_clmn mart20"><div class="thr_clmn  wi_70 padr10" ><div class="pos_rel"><input type="text" name="v_name" id="v_name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" placeholder="Write subvariation name "><label for="first_name" class="floating__label tall nobold" data-content="Write subvariation name" ><span class="hidden--visually">Write subvariation name</span></label></div></div><div class="thr_clmn  wi_30 padl10" ><div class="pos_rel"><input type="color" name="c_code" id="c_code" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25"  ><label for="first_name" class="floating__label tall nobold" data-content="Color code" ><span class="hidden--visually">Color code</span></label></div></div></div><div class="clear"></div><div class="talc padt20 ffamily_avenir"> <a href="javascript:void(0);" onclick="addSubVariation();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>';
				}
				else
				{
				var newLineDetail='<div class="on_clmn mart20"><div class="pos_rel"><input type="text" name="v_name" id="v_name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" placeholder="Write subvariation name ">  <label for="first_name" class="floating__label tall nobold" data-content="Write subvariation name" ><span class="hidden--visually">Write subvariation name</span></label></div></div><div class="thr_clmn  wi_30 padl10 hidden" ><div class="pos_rel"><input type="color" name="c_code" id="c_code" class="wi_100   lgtgrey_bg txtind10 brd_2px_rgb tall minhei_55p fsz18 red_f5a0a5_txt ffamily_avenir"  ><label for="first_name" class="floating__label tall nobold" data-content="Color code" ><span class="hidden--visually">Color code</span></label></div></div> <div class="clear"></div><div class="talc padt20 ffamily_avenir"> <a href="javascript:void(0);" onclick="addSubVariation();"><input type="button" value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  ></a> </div>';	
				}
				$('#variationSubDetail').html(newLineDetail);
			}
		 
			var currentLang = 'sv';
		</script>
	</head>
	
	<body class="white_bg ffamily_avenir">
		
		
			<!-- HEADER -->
	<div class="column_m header   bs_bb   hidden-xs hidden-xsi">
         <div class="wi_100 hei_65p xs-pos_fix padtb0 padr10 lgtgrey2_bg"  >
            <div class="fleft padrl0 bg_babdbc padtbz10" >
               <div class="flag_top_menu flefti  padb10 wi_80p  " style="padding: 10px 0px 0px 0px;">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../listVariation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			 
            <div class="clear"></div>
         </div>
      </div>	
			
			
		 	
		<div class="column_m header hei_55p  bs_bb white_bg visible-xs visible-xsi">
         <div class="wi_100 hei_55p xs-pos_fix padtb5 padrl10 white_bg">
            <div class="visible-xs visible-sm visible-xsi fleft padrl0">
               <div class="flag_top_menu flefti  padb10 wi_70p padt10">
                  <ul class="menulist sf-menu fsz14 sf-js-enabled sf-arrows">
                     <li class="first last" style="margin: 0 30px 0 0;">
                        <a href="../listVariation/<?php echo $data['cid']; ?>" class="lgn_hight_s1  padl10 fsz30 sf-with-ul"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                     </li>
                  </ul>
               </div>
            </div>
			
			 <div class="visible-xs visible-sm visible-xsi fright marr0 ">
				<div class="top_menu fright  padt10 pad0 wi_140p">
				<ul class="menulist sf-menu  fsz14  sf-js-enabled sf-arrows mart10 marb0">
					 
					<li class="last first marr10i">
						<a href="#" class="lgn_hight_s1 fsz25"><span class="fas fa-bars" aria-hidden="true"></span></a>
					 </li>
				</ul>
			</div>
</div>
			  
            <div class="clear"></div>
         </div>
      </div>	
	 	  
	<div class="clear"></div>
	 
		
		<div class="column_m pos_rel">
			
			 
			<!-- CONTENT -->
			 <div class="column_m talc lgn_hight_22 fsz16 mart40 xs-mart20 ">
				<div class="wrap maxwi_100 padrl75 xs-padrl15 xsi-padrl134">
				 
					<div class="wi_500p maxwi_100 pos_rel zi5 marrla pad10   xs-pad0">
					 
					 <div class="padb0 xxs-padb0 ">		
							
									<h1 class="marb0  xxs-talc talc fsz65 xxs-fsz65 lgn_hight_65 xxs-lgn_hight_65 padb0 black_txt trn"  >Variation</h1>
									</div>
									<div class="mart10 marb5 xxs-talc talc   xs-nobrd xsi-nobrd xs-padb20 padb35"> <a href="#" class="black_txt fsz25  xs-fsz20 xxs-talc talc edit-text jain_drop_company trn lgn_hight_20" >Add and list all product variations</a></div>
						
						
						<div class="padb0 xxs-padb0 marb5">
							
								<div class="container padrl0 xs-padrl0  padb10">
							
							<div class="marrla xs-wi_100">
								
								<form action="../addVariation/<?php echo $data['cid']; ?>" name="save_indexing" id="save_indexing" method="POST" accept-charset="ISO-8859-1">
									<div class="marb0 padb10 ">
										
										
										
										 
										
										<div class="on_clmn ">
											 
											<div class="pos_rel">
													<input type="text" name="c_name" id="c_name" class="white_bg  brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" placeholder="Write variation name " />
												 <label for="c_name" class="floating__label tall nobold" data-content="Write variation name" >
											<span class="hidden--visually">
											 Write variation name</span></label>
											</div>
											
											
											 
												
										</div>
										
										
										 
										
									<div class="on_clmn mart20">
											 
											<div class="pos_rel">
												
												<select name="d_type" id="d_type"  class="white_bg wi_100 brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25 " onchange="clearNewLine();" > 
											 	 
											<option value="1" class="lgtgrey2_bg" >Radio</option>
											<option value="2" class="lgtgrey2_bg " >Select</option>	
											<option value="3" class="lgtgrey2_bg " >Color</option>	
													</select>
												
											  <label for="d_type" class="floating__label tall nobold" data-content="Display type" >
											<span class="hidden--visually">
											 Display type</span></label>
											</div>
										</div>
										
										
										 
											
											 <div class="on_clmn mart20 marb35">
											 
											<div class="pos_rel">
												
												<select name="v_mode" id="v_mode"  class="white_bg wi_100 brdb_new brd_width_2 nobrdt nobrdr nobrdl  tall minhei_55p fsz18 black_txt ffamily_avenir floating__input padt25" > 
											 	 <option value="1" class="lgtgrey2_bg" >Instantly</option>
											<option value="2" class="lgtgrey2_bg " >Dynamically</option>	
											<option value="3" class="lgtgrey2_bg " >Never</option>	
													</select>
												
											  <label for="v_mode" class="floating__label tall nobold" data-content="Display type" >
											<span class="hidden--visually">
											 Display type</span></label>
											</div>
											 
											</div>
										
								
												
											 
											<div class="clear"></div>
									</div>
									
									<input type="hidden" name="subId" id="subId" value="" />
									
									</form>
									<div id="errorMsg" class="red_txt fsz20 talc"></div>	
									
										<div class="talc padt20 ffamily_avenir">  <button   value="Add" class="forword minhei_55p  fsz18 red_ff2828_bg   ffamily_avenir"  onclick="submitDepartment();">Add</button> </div>
									 
							</div>
							
						</div>
					
							
							
							<div class="clear"></div>
						</div>
								 
								
						<div class="on_clmn brdb">
								 
								 
											 
										<div class="pos_rel  ">
									
										<input type="text" value="Variations detail" class="wi_100 rbrdr pad10 padb0 padl0  tall  minhei_45p fsz16 black_txt ffamily_avenir" readonly="">
										 
									</div>
									 </div> 
									 <div id="subVariationList">
									 
									</div>
									<div class="clear"></div> 
									<div id="variationSubDetail" class="marb20">
									 
									</div>
									<div class="clear"></div> 
								 <div class="blue_txt fsz20  tall padt20" id="addNew" onclick="addNewLine();">Add new line</div>
						
						<div class="clear"></div>
					</div>
					
					
				</div>
				<div class="clear"></div>
			</div>
			
			
			<!-- CONTENT -->
			
		</div>
		 
		<div class="clear"></div>
		<div class="hei_80p hidden-xs"></div>
		
		
		<!-- Popup fade -->
		<div id="popup_fade" class="opa0 opa55_a black_bg"></div>
		
	</div>
	
	
	 
	
	<!-- Slide fade -->
	<div id="slide_fade"></div>
	
	<!-- Menu list fade -->
	<a href="#" class="class-toggler wi_100 hei_100 dnone dblock_a pos_abs zi30" id="menulist-fade" data-target="#menulist-dropdown,#menulist-fade" data-classes="active" data-toggle-type="separate"></a>
	
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery-ui.min.js"></script>
	
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/icheck.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/jquery.selectric.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercontent/modules.js"></script>
	<script type="text/javascript" src="<?php echo $path;?>html/usercss/js/custom.js"></script>
	
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 </body>

</html>