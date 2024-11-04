<?php
// use mondido\api\transaction;
$ref =  bin2hex(openssl_random_pseudo_bytes(4));
 $username = '5423';
 $secret = '$2a$10$eKOgzDy1aopgrCu7Jx0ye.';
$cus_ref = '1';
$hash = md5($username.$ref.$cus_ref."299.00".'sek'.'test'.$secret);
?>

<html>
<body>

Please click "Pay" button to make a payment for SEK 299.00
<form action="https://pay.mondido.com/v1/form" method="post">
  <input type="hidden" name="payment_ref" value="<?php echo $ref; ?>">
  <input type="hidden" name="customer_ref" value="<?php echo $cus_ref; ?>">
  <input type="hidden" name="amount" value="299.00">
  <input type="hidden" name="currency" value="sek">
  <input type="hidden" name="hash" value="<?php echo $hash; ?>">
  <input type="hidden" name="merchant_id" value="5423">
  <input type="hidden" name="success_url" value="https://www.qloudid.com/mondido/success.php">
  <input type="hidden" name="error_url" value="https://www.qloudid.com/mondido/error.php">
  <input type="hidden" name="test" value="true">
  
  <input type="submit" value="Pay" class="btn">
</form>

</body>
</html>