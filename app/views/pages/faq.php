<?php require_once APPROOT.'/views/includes/header.php';?>
  <body>
    <section>
      <?php require_once APPROOT.'/views/includes/nav.php'; ?>
    </section>
    <section class="section faq-section" data-pg-collapsed>
      <div class="container">
        <h2 class="text-center">How Can We help you?</h2>
        <h2>FAQ'S</h2>
        <div class="panel-group faq-container" id="panels1" data-pg-collapsed>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title"><a data-toggle="collapse" data-parent="#panels1" href="#collapse1">                          1. What is Haypko                            </a> </h2>
            </div>
            <div id="collapse1" class="panel-collapse collapse in">
              <div class="panel-body">  Haykpo helps you purchase petroleum products and have it delivered to your preferred Location                   </div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title"> <a data-toggle="collapse" data-parent="#panels1" href="#collapse2">2. What Products Can be Purchased?                               </a> </h2>
            </div>
            <div id="collapse2" class="panel-collapse collapse">
              <div class="panel-body">Presently, It’s services covers Petrol, Diesel and Cooking Gas</div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title"> <a data-toggle="collapse" data-parent="#panels1" href="#collapse3">3. How do i verify that the delivered goods is what i ordered?</a> </h2>
            </div>
            <div id="collapse3" class="panel-collapse collapse">
              <div class="panel-body">For the liquid products, our jerrycans are caliberated along a transparent line.
                For your cooking gas, a metered gas guage is used to verify the quantity of gas.
</div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title"> <a data-toggle="collapse" data-parent="#panels1" href="#collapse4">4. How do i Make payments</a> </h2>
            </div>
            <div id="collapse4" class="panel-collapse collapse">
              <div class="panel-body">Payment is made online with your debit or credit card
</div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title"> <a data-toggle="collapse" data-parent="#panels1" href="#collapse5">5. How much do i pay for jerrycans?</a> </h2>
            </div>
            <div id="collapse5" class="panel-collapse collapse">
              <div class="panel-body">Jerry Cans are free but a one time damage fee of N200 is charged to every new delivery Address
</div>
            </div>
          </div>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 class="panel-title"> <a data-toggle="collapse" data-parent="#panels1" href="#collapse6">6. when do the goods get delivered ?</a> </h2>
            </div>
            <div id="collapse6" class="panel-collapse collapse">
              <div class="panel-body">Presently , Haypko has 4 delivery times: 8am, 12noon, 2pm and 6pm.
</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <h3>Still have questions?
Give us a call at <a href="tel:09082604087">09082604087</a>
or email <a href="mailto:info@haypko.com">info@haypko.com</a></h3>
          </div>
          <div class="col-md-6">
            <h3>Contact Address:
6th floor, 294 Herbert Macaulay Way,
Sabo, Yaba, Lagos.</h3>
          </div>
        </div>
      </div>
    </section>
    <?php require_once APPROOT.'/views/includes/footer.php';?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo SITEURL;?>/assets/js/enyopay.js" type="text/javascript"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo SITEURL;?>/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
