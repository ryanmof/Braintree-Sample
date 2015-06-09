<?php
session_start();
require_once "vendor/braintree/braintree_php/lib/Braintree.php";

$none = $_POST['payment_method_nonce'];
$result = Braintree_Transaction::sale(array(
    "amount" => trim($_POST['amount']),
    "paymentMethodNonce" => trim($none),
    "options" => array("submitForSettlement" => True
        ),
        
));

$_SESSION['nonce'] = $none;

if ($result->success) {
    print_r("Success ID: " . $result->transaction->id);
    echo "<h2>Result:</h2><br> <pre>";
    print_r($result);
    echo "</pre>";
} else {
    print_r("Error Message: " . $result->message);
    echo "<h2>Result:</h2><br> <pre>";
    print_r($result);
    echo "</pre>";
}