<?php require_once APPROOT.'/views/includes/header.php'; ?>
  <body>
    <section>
      <nav class="navbar navbar-default colored-nav" role="navigation" data-pg-collapsed>
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" data-pg-collapsed>
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo SITEURL ?>">
              <img src="<?php echo SITEURL ?>/assets/images/svg/Grouphaykpo-logo-black.svg" class="white-logo m-hide" />
              <img src="<?php echo SITEURL ?>/assets/images/svg/Grouphaykpo-logo-white.svg" class="black-logo m-display" />
            </a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"></li>
              <li></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="<?php echo SITEURL ?>">Home</a>
              </li>
              <li>
                <a href="#">About </a>
              </li>
              <li>
                <a href="<?php echo SITEURL ?>/pages/faq">FAQ</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
              <li>
                <a href="#" class=" btn-signup showpform">Become A Partner</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </section>
    <section class="section faq-section">
      <div class="container">
        <h2 class="text-center">Login </h2>
        <div class="signin text-center">
          <form role="form">
            <div class="form-group">
              <select id="formInput10" class="form-control">
                <option value="customer">Customer</option>
                <option value="partner"> Partner</option>
              </select>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="uname" name="uname" placeholder="username">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="upass" name="upass" placeholder="Password">
            </div>

            <div class="form-group">

              <a class="help-block text-right">Forgot password.</a>
            </div>
            <button type="submit" class="btn">Sign in</button>
          </form>
        </div>
      </div>
    </section>
<?php require_once APPROOT.'/views/includes/footer.php'; ?>
