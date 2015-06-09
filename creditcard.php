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
#card-number {
  border: 1px solid #333;
  -webkit-transition: border-color 160ms;
  transition: border-color 160ms;
}

#card-number.braintree-hosted-fields-focused {
  border-color: #777;
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
                <a class="navbar-brand" href="#">Braintree</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right  ">
                    <li><a href="hosted.php">Credit Card</a></li>
                    <li><a href="paypal3.php">PayPal</a></li>
                    <li><a href="refund.php">Refund/Void</a></li>
                    <li><a href="#">Transaction Search</a></li>
                </ul>
            </div>

        </div>
    </div>
    <!-- NAVBAR CODE END -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Braintree Sample Credit Card Form </h2>
                <h6>Crafted by Ryan </h6>
                <br />
            </div>
        </div>
        <div class="row ">
          <div class="col-md-4 col-md-offset-4">
              <div class="credit-card-div">
<div class="panel panel-default" >
 <div class="panel-heading">

 <form action="transaction.php" id="hostedcheckout" method="post">
      <div class="row ">
              <label for="credit-card">Card Number</label>
              <div class="col-md-12" id="card-number"></div>
          </div>
     <div class="row ">
         <div class="col-md-4 col-sm-4 col-xs-4" id="expiration-date">
                  <span class="help-block text-muted small-font" >  Exp Date</span>
                  <!--input type="text" class="form-control" placeholder="MMYY" /-->
              </div>
        <div class="col-md-3 col-sm-3 col-xs-3" id="cvv">
                  <span class="help-block text-muted small-font" >  CVV</span>
                  <!--input type="text" class="form-control" placeholder="CVV" /-->
              </div>
         <div class="col-md-3 col-sm-3 col-xs-3">
<img src="assets/img/1.png" class="img-rounded" />
         </div>
          </div>
     <div class="row ">
              <div class="col-md-12 pad-adjust">
                  <!--input type="text" class="form-control" name="amount" id="amount" placeholder="1.00" /-->
                  </div>
          </div>
     <div class="row">
<div class="col-md-12 pad-adjust">
    <div class="checkbox">
    <label>
      <input type="checkbox" checked class="text-muted"> Save card for faster payments
    </label>
  </div>
</div>
     </div>
       <div class="row ">
            <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                 <input type="submit"  class="btn btn-danger" value="CANCEL" />
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                  <input type="submit"  class="btn btn-warning btn-block" value="PAY NOW" method="post" />
                </div>
          </div>
     </form>
                   </div>
              </div>
              </div>
              <!-- CREDIT CARD DIV END -->
          </div>
    </div>
        </div>
    <script src="https://js.braintreegateway.com/js/beta/braintree-hosted-fields-beta.16.js"></script>

    <script>
          braintree.setup("<?php echo $clientToken?>", "custom", {
            id: "hostedcheckout",
            hostedFields: {
              "input": {
      "font-size": "16pt",
      "color": "#3A3A3A"
    },

    // Styling a specific field
    ".number": {
      "font-family": "monospace"
    },

    // Styling element state
    ":focus": {
      "color": "blue"
    },
    ".valid": {
      "color": "green"
    },
    ".invalid": {
      "color": "red"
    },

    // Media queries
    // Note that these apply to the iframe, not the root window.
    "@media screen and (max-width: 700px)": {
      "input": {
        "font-size": "14pt"
      }
    }
  },
  number: { selector: "#card-number-input" },
  cvv: { selector: "#cvv-input" },
  //
              number: {
                selector: "#card-number"
              },
              cvv: {
                selector: "#cvv",
                placeholder: "123"
              },
              expirationDate: {
                selector: "#expiration-date"
              },
              amount: {
                selector: "#amount",
                placeholder: "$1.00"
              }
            }
         }});
         </script>
    <!-- CONATINER END -->
    <!-- REQUIRED SCRIPTS FILES -->
    <!-- CORE JQUERY FILE -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- REQUIRED BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>