<?php require_once APPROOT.'/views/includes/header.php';?>
  <body>
    <div class="container">
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- navigation  section starts here -->
    <section>
     <?php require_once APPROOT.'/views/includes/nav.php'; ?>
    </section>
    <section class="contactsection">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="text-center contact-heading">
              <h3>Contact Us</h3>
              <p>We are always at your service</p>
            </div>
          </div>
          <div class="col-sm-6">
              <?php flash('contact_message'); ?>
            <form role="form" class="contact-form" method="post" action=<?php echo SITEURL?>/pages/contact>
              <div class="form-group">
                <label class="control-label" for="fullname">Full Name</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
                <div class="error">
</div>
              </div>
              <div class="form-group">
                <label class="control-label" for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                <div class="error">
</div>
              </div>
              <div class="form-group">
                <label class="control-label">How may we help you ?</label>
                <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                <div class="error">
</div>
              </div>
              <button type="submit" class="btn" id="contact">Send</button>
            </form>
          </div>
          <div class="col-sm-6">
            <div class="desc">
              <h3>Haypko</h3>
              <p>Haypko helps you order for petroleum products such as Premium motor spirit (petrol), Automated gas oil (diesel), and Liquefied Petroleum Gas from the comfort of your home, office or on the move. You can either request for a home delivery service or for a third party pick-up service.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- footer starts here -->
    <?php require_once APPROOT.'/views/includes/footer.php';?>
  </body>
</html>
