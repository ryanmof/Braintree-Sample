<?php
session_start();
require_once "vendor/braintree/braintree_php/lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.braintreegateway.com/v2/braintree.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  </head>
<body>
  
<form id="merchant-form" action="paypal-transaction.php" method="post">

<input type="hidden" name="payment_method_nonce" id="payment-method-nonce"  />

  Amount:  <input type="text" name="amount" id="amount" />
    <div id="paypal-container"></div>
    <input type="submit" class="btn btn-large" value="Submit" />
</form>
<script type="text/javascript">
    braintree.setup("<?php echo $clientToken?>", "paypal", {
        container: "paypal-container",
        paymentMethodNonceInputField: "payment-method-nonce",
        enableShippingAddress: "true"
        
    });
</script>

<script>
  window.onBraintreeDataLoad = function() {
    BraintreeData.setup("nchwz64hsmrmgcpz", 'merchant-form', BraintreeData.environments.sandbox);
  };
</script>
<script src="https://js.braintreegateway.com/v1/braintree-data.js" async=true></script>
</body>
</html>