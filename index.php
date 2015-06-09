<?php
require_once "vendor/braintree/braintree_php/lib/Braintree.php";
$clientToken = Braintree_ClientToken::generate();
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://js.braintreegateway.com/v2/braintree.js"></script>
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
                <h2>Braintree Sample Drop-In Transaction </h2>
                <h6>Crafted by Ryan </h6>
                <br />
            </div>
        </div>
    <div class="row ">
          <div class="col-md-6 col-md-offset-3">
              <div class="panel panel-default" >
 <div class="panel-heading">
<form id="checkout" method="post" action="transdrop.php">
    <div id="dropin"></div>
    <input type="submit" class="btn btn-primary" value="Pay $10">
</form>
            </div>
            </div>
        </div>
    </div>
</div>
</body>
</div>
</html>

<script type="text/javascript">
    braintree.setup("<?php echo $clientToken?>", "dropin", {
        container: 'dropin'
    });
</script>