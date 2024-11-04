
<body>
	<html>
		<head>
			<link rel="shortcut icon" type="image/x-icon" href="<?php echo $path; ?>html/usercss/images/favicon.ico">
			<script type="text/javascript" src="../html/usercss/js/jquery.js"></script>
			<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
		</head>
		
		<form action="../../../chargeCard/<?php echo $data['cid']; ?>/<?php echo $data['app_id']; ?>/<?php echo $data['plan_id']; ?>" method="POST" style="margin-left: 585px;" >
			<script
			src="https://checkout.stripe.com/checkout.js" class="stripe-button"
			data-key="<?php echo $data['private_key']; ?>"
			data-image=""
			data-name="Qloudid"
			data-description="2 widgets (<?php echo $selectSubsriptionPriceDetails['app_price']*$selectSubsriptionPriceDetails['payment_multi']; ?>.00)"
			data-amount="<?php echo $selectSubsriptionPriceDetails['app_price']*$selectSubsriptionPriceDetails['payment_multi']*100; ?>">
			</script>
			
			<input type="hidden" name="price" value= "<?php echo $selectSubsriptionPriceDetails['app_price']*$selectSubsriptionPriceDetails['payment_multi']*100; ?>">
			 <input type="hidden" id="subscription_id" name='subscription_id' value='<?php echo $_POST['subscription_id'];?>' />
			 <input class="field__input" type="hidden" name="licence_required" id="licence_required" value='<?php echo $_POST['licence_required'];?>'  >
			  <input class="field__input" type="hidden" name="discount_coupon" id="discount_coupon"  value='<?php echo $_POST['discount_coupon'];?>'   >
		</form>
	</body>
</html>