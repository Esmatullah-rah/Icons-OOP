<!doctype html>
<html class="no-js" lang="en">

<head>
  <?php require __DIR__ . '/../layouts/head_links.php'; ?>
</head>

<body>
  <div class="col-lg-12 d-flex justify-content-center">
    <div class="card col-md-6 mt-5">
      <div class="card-header">
        <strong class="card-title">Credit Card ( <u>ONE DAY</u> )</strong>
      </div>
      <div class="card-body">
        <div id="pay-invoice">
          <div class="card-body">
            <div class="card-title">
              <h3 class="text-center">Pay Invoice</h3>
            </div>
            <hr>
            <form action="payment/process" method="post">
              <div class="form-group text-center">
                <ul class="list-inline">
                  <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                  <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                  <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                  <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                </ul>
              </div>
              <div class="form-group has-success">
                <label for="cc-name" class="control-label mb-1">Name on card</label>
                <input id="cc-name" name="payname" type="text" class="form-control cc-name" required>
              </div>
              <div class="form-group">
                <label for="cc-number" class="control-label mb-1">Card number</label>
                <input id="cc-number" name="paynumber" type="tel" class="form-control cc-number" placeholder="0093566865" required>
              </div>
              <div class="text-center">
                <button id="payment-button" type="submit" name="payBtn" class="btn btn-lg btn-info btn-block">
                  <i class="fa fa-lock fa-lg"></i>&nbsp;
                  <span id="payment-button-amount">Pay $10.00</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>