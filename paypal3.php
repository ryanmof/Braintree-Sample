<?php
session_start();
require_once "vendor/braintree/braintree_php/lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>


<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Braintree Sample Code </title>
    <!-- BOOTSTRAP STYLE SHEET -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM CSS -->
    <style>
        /* GENERAL STYLES */
 body {
            padding-top: 70px; /*REQUIRED FOR FIXED TOP NAVBAR*/
        }
/* CREDIT CARD DIV STYLES */

.credit-card-div  span {
    padding-top:10px;
        }
.credit-card-div img {
    padding-top:30px;
}
.credit-card-div .small-font {
    font-size:9px;
}
.credit-card-div .pad-adjust {
    padding-top:10px;
}
.form-group {
    padding: 5px;
    margin: 1px;
}
    </style>
    <script type="text/javascript" src="https://js.braintreegateway.com/v2/braintree.js"></script>
</head>
<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Braintree</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right  ">
                    <li><a href="index.php">Drop-In</a></li>
                    <li><a href="hosted.php">Credit Card</a></li>
                    <li><a href="paypal3.php">PayPal</a></li>
                    <li><a href="refund2.php">Refund/Void</a></li>
                    <li><a href="#">Transaction Search</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- NAVBAR CODE END -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Braintree Sample PayPal Transaction </h2>
                <h6>Crafted by Ryan </h6>
                <br />
            </div>
        </div>
        <div class="row ">
          <div class="col-md-4 col-md-offset-4">
              <div >
<div class="panel panel-default" >
 <div class="panel-heading">
 
<form class="form-inline" id="merchant-form" action="paypal-transaction.php" method="post">
 <div class="form-group">
        <input type="hidden" name="payment_method_nonce" id="payment-method-nonce"  />
    <div class="form-group">
      Amount:  <input type="text" name="amount" id="amount" class="form-control" value="10.00" />
    </div>
        <div class="form-group">
            <div id="paypal-container"></div>
        </div>
    <div class="form-group">
        <input type="submit" class="btn btn-default" value="Submit" />
    </div>
</form>
 </div>
              <!-- CREDIT CARD DIV END -->
          </div>      
    </div>
    </div>
        </div>
        </div>
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
    <!-- CONATINER END -->
    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- REQUIRED BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    

</body>
</html>
