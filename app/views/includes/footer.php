
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
            <a href="<?php echo SITEURL;?>/pages/about ">About</a>
          </li>
          <li>
            <a href="<?php echo SITEURL;?>/pages/contact ">Contact</a>
          </li>
          <li>
            <a href="<?php echo SITEURL;?>/pages/terms">Terms and Conditions</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<div class="popup-overlay" data-pg-collapsed>
  <div class="popup-body box-shadow text-center" id="newPartner">

  </div>
</div>
<section class="form-section">
  <div class="container">
    <div class="row">
      <!-- NEW NEW NEW -->
      <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 col-xs-offset-0">
        <form role="form" class="prod-form" id="prod-form">
          <h3 class="detail-h3">Product Details</h3>
          <div class="prod-cart">
            <div class="no-item" data-pg-collapsed>
              <div class="no-item-text text-center" data-pg-collapsed>
                <i class="fa fa-shopping-cart fa-5x"></i>
                <h4>No Product Added</h4>
              </div>
            </div>
          </div>
          <div class="row" data-pg-collapsed>
            <div class="col-xs-12">
              <h6 class="text-right"><a href="#" id="addprod"><i class="fa fa-cart-plus"></i>Add to Cart</a></h6>
            </div>
          </div>
          <h3 class="detail-h3">Your Details</h3>
          <div class="row" data-pg-collapsed>
            <div class="col-xs-12" data-pg-collapsed>
              <div class="form-group">
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6" data-pg-collapsed>
              <div class="form-group">
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Phone Number">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6" data-pg-collapsed>
              <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
              </div>
            </div>
            <div class="col-xs-12 col-sm-6" data-pg-collapsed>
              <div class="form-group">
                  <textarea class="form-control" id="deliveryadd" name="deliveryadd" placeholder="Delivery Address"> </textarea>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6" data-pg-collapsed>
              <div class="form-group">
                  <select name="partner_id" id="partner_id" class="form-control">
                      <option value="0"> Select district </option>
                    <?php foreach($data['partners'] as $partner): ?>
                      <option value="<?php echo $escaper->escapeHtmlAttr($partner->id); ?>"> <?php echo $escaper->escapeHtml($partner->partner_name); ?> </option>
                    <?php endforeach?>
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <label class="su-label">
                <input class="control-label check-signup" type="checkbox" value=""> Sign up to get purchase history
              </label>
              <div class="signup-box">
                <div class="form-group">
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Create Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="conpassword" name="conpassword" placeholder="Confirm Password">
                </div>
                <div class="checkbox">
                </div>
              </div>
            </div>
          </div>
        <div class="row">
           <div class="col-md-12">
              <h5 class="purchase-footer"><span class="text-left back-btn-two"><i class="fa fa-2x fa-long-arrow-left"></i></span><span >Proceed to Checkout<button id="checkout" type="submit" class="checkout-btn ">
                  <i class="fa fa-fw fa-long-arrow-right"></i>
                </button><span></h5>
            </div>
        </div>
        </form>
      </div>
      <!-- NEW NEW NEW -->
      <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 col-xs-offset-0" data-pg-collapsed>
        <form role="form" action="" method="post" class="p-form" id="p-form">
          <h3>Partnership Details</h3>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="rname">Retailers Name</label>
                <input type="text" class="form-control" id="name" name="name">
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
                <input type="text" class="form-control" id="raddr" name="address">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="state">State</label>
                <select class="form-control" name="state" id="state">
                  <option value="" selected="selected">- Select -</option>
                  <option value="Abuja FCT">Abuja FCT</option>
                  <option value="Abia">Abia</option>
                  <option value="Adamawa">Adamawa</option>
                  <option value="Akwa Ibom">Akwa Ibom</option>
                  <option value="Anambra">Anambra</option>
                  <option value="Bauchi">Bauchi</option>
                  <option value="Bayelsa">Bayelsa</option>
                  <option value="Benue">Benue</option>
                  <option value="Borno">Borno</option>
                  <option value="Cross River">Cross River</option>
                  <option value="Delta">Delta</option>
                  <option value="Ebonyi">Ebonyi</option>
                  <option value="Edo">Edo</option>
                  <option value="Ekiti">Ekiti</option>
                  <option value="Enugu">Enugu</option>
                  <option value="Gombe">Gombe</option>
                  <option value="Imo">Imo</option>
                  <option value="Jigawa">Jigawa</option>
                  <option value="Kaduna">Kaduna</option>
                  <option value="Kano">Kano</option>
                  <option value="Katsina">Katsina</option>
                  <option value="Kebbi">Kebbi</option>
                  <option value="Kogi">Kogi</option>
                  <option value="Kwara">Kwara</option>
                  <option value="Lagos">Lagos</option>
                  <option value="Nassarawa">Nassarawa</option>
                  <option value="Niger">Niger</option>
                  <option value="Ogun">Ogun</option>
                  <option value="Ondo">Ondo</option>
                  <option value="Osun">Osun</option>
                  <option value="Oyo">Oyo</option>
                  <option value="Plateau">Plateau</option>
                  <option value="Rivers">Rivers</option>
                  <option value="Sokoto">Sokoto</option>
                  <option value="Taraba">Taraba</option>
                  <option value="Yobe">Yobe</option>
                  <option value="Zamfara">Zamfara</option>
                  <option value="Outside Nigeria">Outside Nigeria</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="city">City</label>
                <select class="form-control" id="city" name="city">
                  <option value="surulere">surulere</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="phone">Phone Number</label>
                <input class="form-control" type="tel" id="phone" name="phone" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" data-pg-collapsed>
                <label class="control-label" for="pemail">Email</label>
                <input class="form-control" id="pemail" name="email" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 clear">
              <div class="pull-right">
                <button type="button" class="btn btn-danger cancel">Cancel</button>
                <button id="register" class="btn btn-primary" type="submit">Submit</button>
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
