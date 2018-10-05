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
            <form role="form" class="contact-form">
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
                <textarea class="form-control" rows="3"></textarea>
                <div class="error">
</div>
              </div>
              <button type="submit" class="btn">Send</button>
            </form>
          </div>
          <div class="col-sm-6">
            <div class="desc">
              <h3>Haypko</h3>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- footer starts here -->
    <?php require_once APPROOT.'/views/includes/footer.php';?>
    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
