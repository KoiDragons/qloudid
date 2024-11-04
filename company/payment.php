<?php
	require_once('../stripe/vendor/autoload.php');
	require_once('../stripe/vendor/stripe/stripe-php/init.php');
	
	$secret_key='sk_test_mTVjBSZHopmJyA3wgvzRwUM2';
	
	if(isset($_POST['jain'])) {
	//print_r($_POST); die;
	$token = $_POST['stripeToken'];
	\Stripe\Stripe::setApiKey($secret_key);
	$charge = \Stripe\Charge::create([
    'amount' => $_POST['jain'],
    'currency' => 'sek',
    'description' => 'Example charge',
    'source' => $token,
]);
	
	if ($charge->paid == true) {
	
	print_r($charge); die;
	}
	}  ?>



<body>
<html>
<head>
<script type="text/javascript" src="../html/usercss/js/jquery.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
function checkcard()
{
	if($("#card").val() == '')
	{
		$("#card").css("background-color","#FF9494");
		return false;
	}
	card = $("#card").val();
	// alert(card.length);
	if(isNaN($("#card").val()) || card.length != 16)
	{
		alert("Please Enter 16 digit numeric value only !!!");
		$("#card").css("background-color","#FF9494");
		return false;
	}
	if($("#month").val() == '0')
	{
		$("#month").css("background-color","#FF9494");
		return false;
	}
	if($("#year").val() == '0')
	{
		$("#year").css("background-color","#FF9494");
		return false;
	}
	if($("#cvv").val() == '')
	{
		$("#cvv").css("background-color","#FF9494");
		return false;
	}
	cvv = $("#cvv").val();
	// alert(card.length);
	if(isNaN($("#cvv").val()) || cvv.length != 3)
	{
		alert("Please Enter 3 digit numeric value only !!!");
		$("#cvv").css("background-color","#FF9494");
		return false;
	}
	if($("#currency").val() == '0')
	{
		$("#currency").css("background-color","#FF9494");
		return false;
	}
	if($("#amount").val() == '')
	{
		$("#amount").css("background-color","#FF9494");
		return false;
	}
	if(isNaN($("#amount").val()) || $("#amount").val()<50)
	{
		alert("Please Enter numeric value more than 300 only !!!");
		$("#amount").css("background-color","#FF9494");
		return false;
	}
	document.getElementById("payment").submit();
}
</script>
</head>

<form action="" method="POST" style="margin-left: 585px;" >
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_Aiba2a8FtELTkoFpgAd1B2tV"
    data-image=""
    data-name="Qmatchup"
    data-description="2 widgets (<?php echo $_POST['price']; ?>.00)"
    data-amount="<?php echo $_POST['price']*100; ?>">
  </script>
  
  <input type="hidden" name="jain" value= "<?php echo $_POST['price']*100; ?>">
   
</form>
</body>
</html>