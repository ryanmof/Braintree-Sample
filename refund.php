<?php
session_start();
require_once "vendor/braintree/braintree_php/lib/Braintree.php";

$result = Braintree_Transaction::refund($_POST['transactionId'], $_POST['amount']);
    //array(
   // "amount" => trim($_POST['amount']),
    //"paymentMethodNonce" => trim($none),
    //"transactionId" => trim($_POST['transactionID']),

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