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
#card-number{
  border: 1px solid #333;
  height: 30px;
  width: 400px;
  -webkit-transition: border-color 160ms;
  transition: border-color 160ms;
}

#cvv{
  border: 1px solid #333;
  height: 30px;
  width: 75px;
  -webkit-transition: border-color 160ms;
  transition: border-color 160ms;
}

#expiration-date{
  border: 1px solid #333;
  height: 30px;
  width: 75px;
  -webkit-transition: border-color 160ms;
  transition: border-color 160ms;
}
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
                <h2>Braintree Hosted Transaction </h2>
                <h6>Crafted by Ryan </h6>
                <br />
            </div>
        </div>
    <form action="transaction.php" id="hostedcheckout" method="post">
      
        <label for="card-number">Credit Card Number</label>
        <div id="card-number"></div>
      
      
        <label for="cvv">CVV</label>
        <div id="cvv"></div>
      
      
     
        <label for="expiration-date">Expiration Date</label>
        <div id="expiration-date"></div>
        
        <div class="form-group">
      Amount:  <input type="text" name="amount" id="amount" class="form-control" />
    </div>
      
       
      <input type="submit" value="Pay now" class="btn btn-primary" />
    </form>
    </div>
   </div>
     
    
       <script src="https://js.braintreegateway.com/js/beta/braintree-hosted-fields-beta.16.js"></script> 
       <script>
          braintree.setup("<?php echo $clientToken?>", "custom", {
            id: "hostedcheckout",
            hostedFields: {
              number: {
                selector: "#card-number"
              },
              cvv: {
                selector: "#cvv"
              },
              expirationDate: {
                selector: "#expiration-date"
              }
            }
         });
         
         
         
         
         
    </script>
  </body>
</html>
