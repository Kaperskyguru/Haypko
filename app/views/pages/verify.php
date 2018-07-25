<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Haypko | </title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo SITEURL;?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL;?>/assets/css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo SITEURL;?>/assets/css/jquery-ui.theme.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL;?>/assets/css/aos.css" rel="stylesheet">
    <link href="<?php echo SITEURL;?>/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL;?>/assets/css/spinner.css" rel="stylesheet">
    <!--<link href="assets/css/inputmask.css" rel="stylesheet"> -->
    <!-- Custom styles for this template -->
    <link href="<?php echo SITEURL;?>/assets/css/Enyopaystyles.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <section class="hero" data-pg-collapsed>
      <div data-aos="slide-left" class="pg-empty-placeholder hero-inner-shape"></div>
      <nav class="navbar navbar-default" role="navigation" data-pg-collapsed>
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Haykpo</a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class="active"></li>
              <li></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#">Home</a>
              </li>
              <li>
                <a href="#">About </a>
              </li>
              <li>
                <a href="#">FAQ</a>
              </li>
              <li>
                <a href="#">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php print_r($_POST['response']);?>
