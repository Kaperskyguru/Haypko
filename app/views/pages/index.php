<?php require_once APPROOT.'/views/includes/header.php'; ?>
  <body>
    <section class="hero">
      <div data-aos="slide-left" class="pg-empty-placeholder hero-inner-shape"></div>
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" data-pg-collapsed>
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
              <img src="<?php echo SITEURL; ?>/assets/images/svg/Grouphaykpo-logo-black.svg" class="black-logo" />
              <img src="<?php echo SITEURL; ?>/assets/images/svg/Grouphaykpo-logo-white.svg" class="white-logo" />
            </a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="<?php echo SITEURL ?>">Home</a>
              </li>
              <li>
                <a href="#">About </a>
              </li>
              <li>
                <a href="pages/faq">FAQ</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
              <li class="nav-btn">
                <a href="#" class="btn-topnav">Sign In</a>
              </li>
              <li class="nav-btn">
                <a href="#" class=" btn-signup showpform">Become A Partner</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <img data-aos="slide-left" class="hero-img" src="<?php echo SITEURL; ?>/assets/images/png/fuel_PNG31.png" />
      <div data-aos="fade-down" class="  ml-40 hero-text-body">
        <p class="border-left hero-subtext">Get Fuel Delivered to your door step with</p>
      </div>
      <h1 data-aos="fade-in" data-aos-delay="500" class="hero-heading text-uppercase">Confidence</h1>
      <div class="ml-40 hero-btn-body">
        <a class="btn  bounce" id="buynow">Buy Now</a>
      </div>
    </section>
    <section class="section guide" data-pg-collapsed>
      <div class="container-fluid" data-pg-collapsed>
        <div class="row">
          <div>
            <div class="border-left  ml-40 section-head">
              <p>How it Works</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <div data-aos="fade-up" class="box text-center">
              <img src="<?php echo SITEURL; ?>/assets/images/svg/log-in.svg" />
              <p>Log on to Enyopay</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <div data-aos="fade-up" data-aos-delay="300" class="box text-center">
              <img src="<?php echo SITEURL; ?>/assets/images/svg/rectangle-tool.svg" />
              <p>Fill in the necessary details</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <div data-aos="fade-up" data-aos-delay="600" class="box text-center">
              <img src="<?php echo SITEURL; ?>/assets/images/svg/oil.svg" />
              <p>Sit while your fuel comes to meet you</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section" data-pg-collapsed>
      <div class="container-fluid" data-pg-collapsed>
        <div class="row">
          <div>
            <div class="border-left  ml-40 section-head">
              <p>Features</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <div data-aos="fade-up" class="box text-center">
              <img src="<?php echo SITEURL; ?>/assets/images/svg/tap.svg" />
              <p>Easy to Use</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <div data-aos="fade-up" data-aos-delay="300" class="box text-center">
              <img src="<?php echo SITEURL; ?>/assets/images/png/runer-silhouette-running-fast.png" class="icon" />
              <p>Fast Delivery</p>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <div data-aos="fade-up" data-aos-delay="600" class="box text-center">
              <img src="<?php echo SITEURL; ?>/assets/images/svg/piggy-bank.svg" />
              <p>Cost Free</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="section gutter sec-partners" data-pg-collapsed>
      <div class="container-fluid">
        <div class="row">
          <div>
            <div class="border-left  ml-40 section-head">
              <p>Our Partners</p>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-4">
            <img src="<?php echo SITEURL; ?>/assets/images/svg/0.svg" />
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <img src="<?php echo SITEURL; ?>/assets/images/svg/logo.svg" />
          </div>
          <div class="col-md-4 col-sm-4 col-xs-4">
            <a class="btn mt-20 showpform" href="#!" id="showpform">Become A Partner</a>
          </div>
        </div>
      </div>
    </section>
    <?php require_once APPROOT.'/views/includes/footer.php'; ?>
