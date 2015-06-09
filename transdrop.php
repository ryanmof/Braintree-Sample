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
</html>

<?php
require_once "vendor/braintree/braintree_php/lib/Braintree.php";

$none = $_POST['payment_method_nonce'];
$result = Braintree_Transaction::sale(array(
    'amount' => '10.00',
    'paymentMethodNonce' => trim($none),
    'options' => array("submitForSettlement" => True
        ),
        
    
));


//$result = Braintree_Transaction::sale(array(
//    'amount' => '23.00',
//    'paymentMethodNonce' => 'nonce-from-the-client'
//));


if ($result->success) {
   echo "<div class='col-md-12' <h1>Transaction Successful!</h1></div>";
    echo "<div class='col-md-12' <h2>Result:</h2><br><pre>";
    print_r($result);
    echo "</pre></div>";
} else {
    foreach($result->errors->deepAll() AS $error) {
        echo($error->code . ": " . $error->message . "\n");
        echo "<h2>Result:</h2><br> <pre>";
        print_r($result);
        echo "</pre>";
    }
}

?>