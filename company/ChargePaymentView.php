
<body>
	<html>
		<head>
			<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercss/images/favicon.ico">
			<script type="text/javascript" src="../html/usercss/js/jquery.js"></script>
			<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		</head>
		
		<form action="../chargeCard/<?php echo $data['cid']; ?>" method="POST" style="margin-left: 585px;" >
			<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="<?php echo $data['private_key']; ?>"
			data-image=""
			data-name="Qloudid"
			data-description="2 widgets (<?php echo $_POST['amount']; ?>.00)"
			data-amount="<?php echo $_POST['amount']*100; ?>">
			</script>
			
			<input type="hidden" name="price" value= "<?php echo $_POST['amount']*100; ?>">
			
		</form>
	</body>
</html>