<footer class="footer" data-pg-collapsed>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h3>Haykpo</h3>
        <p>Short description about EnyoPay and its value to customers.</p>
        <ul class="list-unstyled list-inline">
          <li>
            <i class="fa fa-facebook-square fa-2x"></i>
          </li>
          <li>
            <i class="fa fa-twitter fa-2x"></i>
          </li>
          <li>
            <i class="fa fa-instagram fa-2x"></i>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <h3>Products</h3>
        <ul class="list-unstyled">
          <li>
            <a>Petrol</a>
          </li>
          <li>
            <a>Diesel</a>
          </li>
          <li>
            <a>Gas</a>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <h3>Company</h3>
        <ul class="list-unstyled">
          <li>
            <a>About</a>
          </li>
          <li>
            <a>Contact</a>
          </li>
          <li>
            <a>Terms and Conditions</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<section class="form-section">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 col-xs-offset-0">
        <form role="form" class="prod-form" id="prod-form">
          <h6>
Get Fuel Product Delivered at Your Door Step.Fill in the Details to Buy.</h6>
          <h3>Product Details</h3>
          <div class="row" data-pg-collapsed>
            <div class="col-md-4">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="products0">Product</label>
                <select class="form-control" id="products0" name="products0">
                  <option value="petrol" selected>Petrol</option>
                  <option value="diesel">Diesel</option>
                  <option value="gas">Gas</option>
                </select>
              </div>
            </div>
            <div class="col-md-4" data-pg-collapsed>
              <div class="form-group">
                <label class="control-label" for="price0">Amount ( NGN )</label>
                <input type="number" class="form-control" id="price0" name="price0" placeholder="Amount">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="litres0">Litres</label>
                <input type="number" disabled class="form-control" id="litres0" name="litres0" placeholder="Liters">
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="litres0">Kg</label>
                <input type="number" disabled class="form-control" id="litres0" name="litres0" placeholder="Kg">
              </div>
            </div>
          </div>
          <div class="row" data-pg-collapsed>
            <div class="col-xs-12">
              <h6 class="text-right"><a href="#" id="addprod"><i class="fa fa-cart-plus"></i>Add Another Product</a></h6>
            </div>
          </div>
          <h3 class="detail-h3"><a href="#"><i class="fa fa-circle fore-color"></i></a>Your Details</h3>
          <div class="row" data-pg-collapsed>
            <div class="col-xs-12" data-pg-collapsed>
              <div class="form-group">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6" data-pg-collapsed>
              <div class="form-group">
                <input type="number" class="form-control" id="tel" name="tel" placeholder="Phone Number">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6" data-pg-collapsed>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="col-xs-12" data-pg-collapsed>
              <div class="form-group">
                <input type="text" class="form-control" id="deliveryadd" name="deliveryadd" placeholder="Delivery Address">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label>
                <input class="control-label" type="checkbox" value=""> Sign up to get purchase history
              </label>
              <div class="form-group">
                <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Create Password">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="conpassword" name="conpassword" placeholder="Confirm Password">
              </div>
              <div class="checkbox">
</div>
              <button type="submit" class="btn">Submit</button>
            </div>
            <div class="col-md-6">
              <h3 class="text-right">Proceed to Checkout<button id="checkout" type="submit" class="checkout-btn">
                  <i class="fa fa-fw fa-long-arrow-right"></i>
                </button></h3>
            </div>
          </div>
        </form>
      </div>

      <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 col-xs-offset-0" data-pg-collapsed>
        <form role="form" class="p-form" id="p-form">
          <h3>Partnership Details</h3>
          <div class="row" data-pg-collapsed>
            <div class="col-md-6">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="rname">Retailers Name</label>
                <input type="text" class="form-control" id="rname" name="rname">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="rcnum">RC Number</label>
                <input type="number" class="form-control" id="rcnum" name="rcnum">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="raddr">Street Address</label>
                <input type="text" class="form-control" id="raddr" name="raddr">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="state">State</label>
                <select class="form-control">
                  <option value="surulere">Lagos</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="city">City</label>
                <select class="form-control">
                  <option value="surulere">surulere</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="phone">Phone Number</label>
                <input class="form-control" id="phone" name="phone" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="pemail">Email</label>
                <input class="form-control" id="pemail" name="pemail" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 clear">
              <div class="pull-right">
                <button class="btn btn-danger">Cancel</button>
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo SITEURL; ?>/assets/js/enyopay.js" type="text/javascript"></script>
<script src="https://js.paystack.co/v1/inline.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="<?php echo SITEURL; ?>/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="<?php echo SITEURL; ?>/assets/js/main.js"></script>

</body>
</html>
