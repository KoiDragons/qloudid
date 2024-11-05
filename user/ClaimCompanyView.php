<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Subscription</title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercontent/qmatchup/images/favicon.ico"/>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/qmatchup/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/qmatchup/css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/qmatchup/css/style.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/qmatchup/constructor.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/qmatchup/responsive.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo $path; ?>html/usercontent/qmatchup/css/modules.css" />
    <script type="text/javascript" src="<?php echo $path; ?>html/usercontent/qmatchup/js/jquery.js"></script>
	<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=59d34637d184b0001230f7a1&product=inline-share-buttons' async='async'></script>
	
	<script>
	function submitForm()
	{
		
		
		if($("#work_email").val()=="" || $("#work_email").val()==null)
		{
			alert("Please enter work email");
			return false;
		}
		
		if($("#web").val()=="" || $("#web").val()==null)
		{
			alert("Please enter website");
			return false;
		}
	var websiteAddress =  $("#web").val();
    var companyEmail = $("#work_email").val();
    
    var web = companyEmail.split("@")[1];
   
	if($("#indexing_save").val()==0)
	{
    if(!websiteAddress.match(web))
    {
        alert("Email address does not match with Organization 's website URL");
        $("#work_email").css("background-color","#FF9494");
        return false;
    }
	}	
		
		document.getElementById("save_indexing").submit();
	}
	</script>
</head>

<body class="mar0 padt0 padb30 lgtgrey2_bg fsz14 midgrey_txt">

<!-- HEADER -->
	<?php include 'UserHeader.php'; ?>
	<div class="clear"></div>
	
	<div class="padrl5">
		<div class="wrap maxwi_100 marb30 padtb15">
			<div class="lgtgrey_bg">
				<div class="dblue_bg wi_25 hei_10p"></div>
			</div>
		</div>
	</div>
	
	
	
	
	<div class="mart25 padrl5">
		<div class="frtred_bg">
			<div class="wrap maxwi_100 padtb60 padrl15 talc white_txt fsz16">
				<h2 class="padb15 fsz44 white_txt">DINA UPPGIFTER</h2>
				<p class="padb15"><?php echo $row['cid']." I ".html_entity_decode($row['company_name'])." I ".$row['address']." I ".html_entity_decode($row['zipcode'])." I ".$row['city'];?></p>
				<form action="../ownerUpdate/<?php echo $data['id']; ?>" method="POST" id="save_indexing" name="save_indexing">
					<div class="dflex fxwrap_w justc_c marrl-5">
						
						
						<div class="wi_20 sm-wi_33 xs-wi_33 xxs-wi_100 bs_bb marb15 padrl5">
							<label class="sr-only" for="callback-text">Work email</label>
							<input type="text" id="work_email" name="work_email" class="wi_100 hei_36p padrl10 nobrd brdrad3 frtdred_bg fsz16 white_txt"  placeholder="Work email" />
						</div>
						<div class="wi_20 sm-wi_33 xs-wi_33 xxs-wi_100 bs_bb marb15 padrl5">
							<label class="sr-only" for="callback-text">Website</label>
							<input type="text" id="web" name="web" class="wi_100 hei_36p padrl10 nobrd brdrad3 frtdred_bg fsz16 white_txt" value="<?php echo $row['website']; ?>" placeholder="Website" <?php if($row['website']!=null) echo 'readonly'; ?>/>
						</div>
						
						
						
						<div class="wi_100p xxs-wi_100 bs_bb marb15 padrl5">
							<input type="button" value="Submit" onclick="submitForm();" class="wi_100 hei_36p nobrd brdrad3 white_bg frtgrey_bg_h fsz16 frtred_txt curp trans_all2"/>
							<input type="hidden" id="indexing_save" name="indexing_save" value="<?php if($row['website']!="" and $row['company_email']!="") echo '1'; else echo '0'; ?>"/>
						</div>
					</div>
				</form>
				<p class="padt15 padb15 uppercase"> <a href="#" class="white_txt" target="_blank">Läs mer om medlemskapet</a> </p>
			</div>
		</div>
	</div>
	
	
   <script type="text/javascript" src="<?php echo $path; ?>html/usercontent/qmatchup/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo $path; ?>html/usercontent/qmatchup/js/custom.js"></script>
	<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '19ZigBOWPZ';var d=document;var w=window;function l(){
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);}if(d.readyState=='complete'){l();}else{if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>

</html>