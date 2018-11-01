<?php require_once 'inc/header.php'?>
  <body class="skin-blue">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo SITEURL;?>" class="logo">
          <img src="<?php echo SITEURL; ?>/assets/images/svg/Grouphaykpo-logo-black.svg" class="black-logo" />
          <!-- <img src="<?php echo SITEURL; ?>/assets/images/svg/Grouphaykpo-logo-white.svg" class="white-logo" /> -->
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="label label-danger"><?php echo $escaper->escapeHtml(count($data['notify']))?></span></a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $escaper->escapeHtml(count($data['notify'])) ?> notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <?php foreach($data['notify'] as $notif): ?>
                      <li>
                        <a href="#"><i class="fa fa-shopping-cart text-green"></i> <?php echo $escaper->escapeHtml($notif->notif_content);?></a>
                      </li>
                    <?php endforeach ?>
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all</a>
                  </li>
                </ul>
              </li>
              <li class="dropdown notifications-menu">
                <a href="<?php echo SITEURL; ?>/users/logout/<?php echo $_SESSION['user_id'] ?>"> <!--class="dropdown-toggle" data-toggle="dropdown">-->
                  <i class="fa fa-power-off"></i></a>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <!-- User Account: style can be found in dropdown.less -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="treeview" data-pg-collapsed>
              <a href="#!" class="links dash-link"><i class="fa fa-dashboard"></i><span> Dashboard</span></a>
            </li>
            <!-- <li data-pg-collapsed>
              <a href="#!" class="links stat-link"><i class="fa fa-th"></i> <span>Stations</span> </a>
            </li> -->
            <li data-pg-collapsed>
              <a href="#!" class="links pat-link"><i class="fa fa-users"></i> Partners</a>
            </li>
            <li>
              <a href="#!" class="links hist-link"><i class="fa fa-bar-chart-o"></i> History</a>
            </li>
            <!-- added delivery link -->
             <li>
              <a href="#!" class="links delv-link"><i class="fa fa-bar-chart-o"></i> Delivery</a>
            </li>
            <!-- delivery link ends here -->
            <li>
              <a href="#!" class="links set-link"><i class="fa  fa-gear"></i> Account Settings</a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="sections dash-section" id="dashboard">
          <section class="content-header" data-pg-collapsed>
            <h1>Dashboard</h1>
            <ol class="breadcrumb">
              <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
              </li>
              <li class="active">Partners</li>
            </ol>
          </section>
          <section class="content" data-pg-collapsed>
            <!-- Small boxes (Stat box) -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-sm-8">
                <div class="box box-success" data-pg-collapsed>
                  <div class="box-header">
                    <h3 class="box-title"><select>
                        <option value="-1" selected>Product Sold</option>
                      </select>
                  </h3>
                  </div>
                  <h4 class="box-title"><ul class="list-inline">
                      <span><strong><?php echo $escaper->escapeHtml($data['totalProductSold']); ?></strong></span>
                      <sub class="gray">Total</sub>
                      <li>
                        <i class="fa fa-circle text-success"></i> Petrol
                      </li>
                      <li>
                        <i class="fa fa-circle text-yellow"></i> Diesel
                      </li>
                      <li>
                        <i class="fa fa-circle text-red"></i> Gas
                      </li>
                    </ul></h4>
                  <div class="box-body chart-responsive">
                    <div class="chart" id="productSoldChart" style="height: 300px;"></div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- TABLE: LATEST ORDERS -->
                <!-- /.box -->
              </div>
              <div class="col-sm-4" data-pg-collapsed>
                <div class="ov-box box-shadow">
                  <h5 class="text-left">Order Value <sup class="gray"><?php echo getMonth(TODAY)?></sup></h5>
                  <h2><span>N<?php echo formatNumber($data['totalRevenueByMonth'])?></span><img src="<?php echo SITEURL ?>/assets/images/svg/Arrow%20(2).svg"><span class="green">43%</span></h2>
                  <p class="text-right gray">since last month</p>
                </div>
              </div>
              <div class="col-sm-7">
                <div class="box box-success" data-pg-collapsed>
                  <div class="box-header">
                    <h3 class="box-title"><span>Revenues</span>
                        <!-- <span class="gray">Last 10 days</span> -->
                    </h3>
                    <h3>N<?php echo $escaper->escapeHtml(formatNumber($data['totalRevenue']))?></h3>
                    <!-- <h6 class="gray">Period Jan 1 - Jan 10</h6> -->
                  </div>
                  <div class="box-body chart-responsive">
                    <div class="chart" id="revenueChart" style="height: 300px;"></div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- TABLE: LATEST ORDERS -->
                <!-- /.box -->
              </div>
              <div class="col-sm-5">
                <div class="box box-success" data-pg-collapsed>
                  <div class="box-header">
                    <h3 class="box-title"><select>
                        <option value="-1" selected>Orders Sold</option>
                      </select>
                      <!-- <sup class="gray">Last 10 days</sup> -->
                  </h3>
                  </div>
                  <h4 class="box-title"><ul class="list-inline">
                      <li>
                        <i class="fa fa-circle text-primary"></i>
                        <?php echo $escaper->escapeHtml($data['total']->new) ?>
                        <h6 class="gray">New Customers</h6>
                      </li>
                      <li>
                        <i class="fa fa-circle text-red"></i>
                        <?php echo $escaper->escapeHtml($data['total']->old) ?>
                        <h6 class="gray">Returning Customers</h6>
                      </li>
                    </ul></h4>
                  <div class="box-body chart-responsive">
                    <div class="chart" id="customerChart" style="height: 300px;"></div>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row (main row) -->
          </section>
        </div>
        <div class="sections h-section" id="history">
          <section class="content-header">
            <h1>History</h1>
            <ol class="breadcrumb">
              <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
              </li>
              <li class="active">history</li>
            </ol>
          </section>
          <section class="content" data-pg-collapsed>
            <!-- Small boxes (Stat box) -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-sm-12" data-pg-collapsed>
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                  <div class="box-header with-border">
                    <h3 class="box-title">All History</h3>
                    <div class="box-tools pull-right">
                      <button class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body" data-pg-collapsed>
                    <div class="table-responsive">
                      <table id="historyTable" class="table history no-margin">
                        <thead>
                          <tr>
                            <th>Date</th>
                            <th>Product</th>
                            <th>Station</th>
                            <th>Quantity</th>
                            <th>Price</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach($data['history'] as $order): ?>
                          <tr>
                            <td>
                              <a href="#"><?php echo $escaper->escapeHtml(get_formatted_date($order->order_date_added))?></a>
                            </td>
                            <td><?php echo $escaper->escapeHtml($order->product_name)?></td>
                            <td>Enyo Retail</td>
                            <td>
                              <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $escaper->escapeHtml($order->order_litres)?> Litres</div>
                            </td>
                            <td>
                              <div class="sparkbar" data-color="#00a65a" data-height="20">N<?php echo $escaper->escapeHtml(formatNumber($order->order_amount))?></div>
                            </td>
                          </tr>
                          <?php endforeach?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>

                </div>
                <!-- /.box -->
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row (main row) -->
          </section>
        </div>
        <div class="sections p-section" id="partner">
          <section class="content-header" data-pg-collapsed>
            <h1>
                Partners</h1>
            <ol class="breadcrumb">
              <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
              </li>
              <li class="active">Partners</li>
            </ol>
          </section>
          <section class="content" data-pg-collapsed>
            <!-- Small boxes (Stat box) -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-sm-12">
                <ul class="nav nav-tabs" data-pg-collapsed>
                  <li class="active">
                    <a href="#tab1" data-toggle="tab">All</a>
                  </li>
                  <li>
                    <a href="#tab2" data-toggle="tab">Recently Added</a>
                  </li>
                  <li class="pull-right">
                    <button class="btn btn-primary add-btn">Add New</button>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab1">
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">All Partners</h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" data-pg-collapsed>
                        <div class="table-responsive">
                          <table id="partnerTable" class="table no-margin ptable">
                            <thead>
                              <tr>
                                <th>
                                  <input class="control-label selectall" type="checkbox" value="">
                                </th>
                                <th>Partner</th>
                                <th>Location</th>
                                <th>View</th>
                                <th><button type="button" class="btn  btn-danger deleteall">delete</button></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['partners'] as $partner): ?>
                                  <tr pid="<?php echo $escaper->escapeHtml( $partner->id ) ?>">
                                    <td>
                                      <input class="control-label" class="partner_checkbox" data-partner-id="<?php echo $escaper->escapeHtml($partner->partner_id) ?>" type="checkbox" value="">
                                    </td>
                                    <td><span><?php echo $escaper->escapeHtml($partner->partner_name) ?></span></td>
                                    <td><span><?php echo $escaper->escapeHtml($partner->partner_location) ?></span></td>
                                    <td>
                                      <button pid="<?php echo $partner->id ?>" type="button" class="btn  btn-info view">view</button>
                                    </td>
                                    <td>
                                      <button pid="<?php echo $partner->id ?>" type="button" class="btn  btn-danger delete">delete</button>
                                    </td>
                                  </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>

                    </div>
                  </div>
                  <div class="tab-pane" id="tab2">
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">Recently Added Partners</h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" data-pg-collapsed>
                        <div class="table-responsive">
                          <table id="recentPartnerTable" class="table no-margin">
                            <thead>
                              <tr>
                                <th>
                                  <input class="control-label" type="checkbox" value="">
                                </th>
                                <th>Partner</th>
                                <th>Location</th>
                                <th>View</th>
                                <th><button type="button" class="btn  btn-danger deleteall">delete</button></th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['partners'] as $partner): ?>
                              <tr>
                                <td>
                                  <input class="control-label" type="checkbox" value="">
                                </td>
                                <td><span><?php echo $escaper->escapeHtml($partner->partner_name) ?></span></td>
                                <td><span><?php echo $escaper->escapeHtml($partner->partner_location) ?></span></td>
                                <td>
                                  <button pid="<?php echo $partner->id ?>" type="button" class="btn  btn-info view">view</button>
                                </td>
                                <td>
                                  <button pid="<?php echo $partner->id ?>" type="button" class="btn  btn-danger delete">delete</button>
                                </td>
                              </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>

                    </div>
                  </div>
                  <!-- <div class="tab-pane" id="tab3">
                    <p>Tab 3 content goes here...</p>
                  </div>
                  <div class="tab-pane" id="tab4">
                    <p>Tab 4 content goes here...</p>
                  </div> -->
                </div>
                <!-- TABLE: LATEST ORDERS -->
                <!-- /.box -->
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row (main row) -->
          </section>
        </div>
        <!-- added delivery section -->
        <div class="sections delivery-section" id="delivery">
          <section class="content-header" data-pg-collapsed>
            <h1>
                Delivery</h1>
            <ol class="breadcrumb">
              <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
              </li>
              <li class="active">Delivery</li>
            </ol>
          </section>
          <section class="content" data-pg-collapsed>
            <!-- Small boxes (Stat box) -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-sm-12">
                <ul class="nav nav-tabs" data-pg-collapsed>
                  <li class="active">
                    <a href="#tab1" data-toggle="tab">All</a>
                  </li>
                  <!-- <li>
                    <a href="#tab2" data-toggle="tab">Recently Added</a>
                  </li> -->
                  <li class="pull-right">
                    <button class="btn btn-primary " id="add-delivery-guy">Add New</button>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab1">
                    <div class="box box-info">
                      <div class="box-header with-border">
                        <h3 class="box-title">All Delivery Agents</h3>
                        <div class="box-tools pull-right">
                          <button class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body" data-pg-collapsed>
                        <div class="table-responsive">
                          <table id="driverTable" class="table no-margin ptable">
                            <thead>
                              <tr>
                                <th>
                                  <input class="control-label selectall" type="checkbox" value="">
                                </th>
                                <th>Delivery Agents</th>
                                <th>Location</th>
                                <th>View</th>
                                <th><button type="button" class="btn  btn-danger deleteall">delete</button></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['drivers'] as $driver): ?>
                                  <tr pid="<?php echo $escaper->escapeHtml( $driver->id ) ?>">
                                    <td>
                                      <input class="control-label" class="partner_checkbox" data-partner-id="<?php echo $escaper->escapeHtml($driver->id) ?>" type="checkbox" value="">
                                    </td>
                                    <td><span><?php echo $escaper->escapeHtml($driver->name) ?></span></td>
                                    <td><span><?php echo $escaper->escapeHtml($driver->location_id) ?></span></td>
                                    <td>
                                      <button aid="<?php echo $driver->id ?>" id="viewDeliverAgent" type="button" class="btn  btn-info">view</button>
                                    </td>
                                    <td>
                                      <button pid="<?php echo $driver->id ?>" type="button" class="btn  btn-danger delete">delete</button>
                                    </td>
                                  </tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>

                    </div>
                  </div>
                </div>
                <!-- TABLE: LATEST ORDERS -->
                <!-- /.box -->
              </div>
              <!-- ./col -->
            </div>
            <!-- /.row (main row) -->
          </section>
        </div>
        <!-- devlivery section ends here -->
        <div class="sections set-section" id="setting">
          <section class="content-header" data-pg-collapsed>
            <h1>Account Settings</h1>
            <ol class="breadcrumb">
              <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
              </li>
              <li class="active">Account Settings</li>
            </ol>
          </section>
          <section class="content">
            <!-- Small boxes (Stat box) -->
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
              <!-- ./col -->
              <!-- ./col -->
              <div class="col-sm-8">
                    <div class="box box-success">
                        <div class="box-header">
                          <h3 class="box-title">Change Password</h3>
                        </div>
                        <div class="box-body chart-responsive">
                          <form>
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                    <input type="password" id="cpassword" name="password" class="form-control" placeholder="current password">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                    <input type="password" id="npassword" name="npassword" class="form-control input-group form-group" placeholder="new password">
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <i class="text-red" id="e"></i>
                                    <input type="password" id="conpass" name="conpass" class="form-control input-group form-group" placeholder="confirm password">
                                  </div>
                                </div>
                                <div class="col-sm-6 col-sm-push-6">
                                  <div class="form-group text-right">
                                    <input type="button" uid="<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary text-uppercase updatepass" value="update">
                                    <span class="passloader"><i class="fa fa-pulse fa-2x  fa-spinner"></i> </span>
                                  </div>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
              </div>
            </div>
                <div class="row">
                  <!-- ./col -->
                  <!-- ./col -->
                  <div class="col-sm-8">
                        <div class="box box-success">
                              <div class="box-header">
                                <h3 class="box-title">Product Settings</h3>
                              </div>
                              <div class="box-body chart-responsive">
                                    <form>
                                        <?php foreach ($data['products'] as $product): ?>
                                        <div class="row">
                                            <div class="col-sm-6">
                                              <h2><?php echo $escaper->escapeHtml( $product->product_name )?></h2>
                                            </div>
                                            <div class="col-sm-6">
                                              <div class="pull-right">
                                                  <h2><span><?php echo $escaper->escapeHtml($product->product_price )?></span> per litre</h2>

                                              </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <div class="col-sm-12">
                                      <div class="pull-right">
                                          <span class="pull-right text-primary change">Change</span>
                                      </div>
                                    </div>
                                    </form>
                                 </div>
                         </div>
                    </div>
              </div>
            </div>
          </section>
        </div>
      </div>
        <!-- /.content-wrapper -->
      <footer class="main-footer">
        <strong>Copyright &copy; Haykpo  <?php echo getYear(TODAY)?></strong> All rights reserved.
      </footer>

      <div class="popup-overlay" data-pg-collapsed>
        <div class="popup-body box-shadow text-center">
        <div class="text-center"><i class="fa fa-check-circle fa-3x text-success"></i></div>
          <h2 class="text-center text-capitalize">Partner Created</h2>
          <div id="newPartner">

          </div>
        </div>
      </div>

      <div class="change-overlay" data-pg-collapsed>
        <div class="change-body box-shadow ">
            <form>
              <h2>Update Price</h2>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Petrol</label>
                      <input type="number" id="petrolprice" class="form-control" name="petrolprice">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Diesel</label>
                      <input type="number" id="dieselprice" class="form-control" name="dieselprice">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Petrol</label>
                      <input type="number" id="gasprice" class="form-control" name="gasprice">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <input type="button" id="update" class="btn btn-primary" value="Update" >
                    </div>
                  </div>
                </div>
            </form>
        </div>
      </div>
      <div class="view-overlay" id="partner-view-overlay" data-pg-collapsed>
        <div class="view-box box-shadow text-center">
        <div class="text-center"><i class="fa fa-users fa-3x text-success"></i></div>
          <h2 class="text-center text-capitalize">View Partner</h2>
          <div id="partnerDetails">

          </div>
        </div>
      </div>

      <div class="view-overlay" id="agent-view-overlay" data-pg-collapsed>
          <div class="view-box box-shadow text-center">
              <div class="text-center"><i class="fa fa-users fa-3x text-success"></i></div>
              <h2 class="text-center text-capitalize">View Delivery Agent</h2>
              <div id="agentDetails"></div>
          </div>
      </div>

    </div>
    <section class="form-section">
      <div class="container">
        <div class="row">
          <!-- NEW NEW NEW -->
          <!-- NEW NEW NEW -->
          <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 col-xs-offset-0">
            <form role="form" class="p-form" id="p-form" data-pg-collapsed>
              <h2>Add New Partner</h2>
              <div class="row">
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
                    <select class="form-control" name="state" id="state">
                      <option value="" selected="selected"> Select State</option>

                      <option value="Lagos">Lagos</option>

                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="city">City</label>
                    <select class="form-control" name="city" id="city">
                      <option value="-1">Select City</option>
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
                    <input class="form-control" id="pemail" name="pemail" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 clear">
                  <div class="pull-right">
                    <button class="btn btn-danger cancel" type="button">Cancel</button>
                    <button id="next" class="btn btn-primary next" type="button">Next</button>
                  </div>
                </div>
              </div>
            </form>
          </div>


          <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 col-xs-offset-0">
            <form role="form" class="acc-form" id="acc-form">
              <h2>Bank account Details</h2>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="rname">Bank</label>
                    <input type="text" class="form-control" id="bname" name="bname">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="accnum">Account Number</label>
                    <input type="number" class="form-control" id="accnum" name="accnum">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="accname">Account Name</label>
                    <input type="text" class="form-control" id="accname" name="accname">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 clear">
                  <div class="pull-right">
                    <button class="btn btn-danger prev" type="button">previous</button>
                    <button id="register" class="btn btn-primary" type="button">create</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>
    <!-- started adding the delivery form section from here -->
    <section class="delv-form-section">
      <div class="container">
        <div class="row">
          <!-- add new delivery guy -->
          <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2 col-xs-offset-0">
            <form role="form" class="devl-form" id="devlivery-form" data-pg-collapsed>
              <h2>Add Delivery Agent </h2>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="dname">Name</label>
                    <input type="text" class="form-control" id="dname" name="dname">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="dpnum">Phone Number</label>
                    <input type="number" class="form-control" id="dpnum" name="dpnum">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="demail">Email</label>
                    <input type="email" class="form-control" id="demail" name="demail">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="daddr">Address</label>
                    <input type="text" class="form-control" id="daddr" name="raddr">
                  </div>
                </div>


              </div>
              <div class="row">
                <div class="col-xs-12 clear">
                  <div class="pull-right mt-30">
                    <button class="btn btn-danger delv-cancel" type="button">Cancel</button>
                    <button id="createDeliveryGuy" pid="admin" class="btn btn-primary create" type="button">Create</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

    </section>
    <!-- ended the delivery form section -->
    <!-- ./wrapper -->

    <?php
        $dat = file_get_contents(SITEURL.'/api/chart');
        $mydata = json_decode($dat);

        $orderData = file_get_contents(SITEURL.'/api/chartOrders');
        $orders = json_decode($orderData);

        $soldData = file_get_contents(SITEURL.'/api/sold');
        $sold = json_decode($soldData);
     ?>


  <!-- jQuery 2.1.3 -->
    <script src="<?php echo SITEURL ?>/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo SITEURL ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo SITEURL ?>/assets/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?php echo SITEURL ?>/assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?php echo SITEURL ?>/assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo SITEURL ?>/assets/dist/js/demo.js" type="text/javascript"></script>

 <script src="<?php echo SITEURL ?>/assets/dist/js/dashboard.js" type="text/javascript"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>

    <!-- page script -->
    <!-- <script src="<?php echo SITEURL ?>/assets/dist/js/pages/dashboard.js" type="text/javascript"></script> -->
    <script type="text/javascript">
    $('#partnerTable').dataTable();
    $('#recentPartnerTable').dataTable();
    $('#historyTable').dataTable();
    $('#driverTable').dataTable();
      $(function () {
        "use strict";
        //BAR CHART

      var bar = new Morris.Bar({
        element: 'productSoldChart',
        resize: true,
        data: [
          <?php echo $sold; ?>
        ],
        barColors: ['#00a65a', '#dd4b39', '#f39c12'],
        xkey: 'Month',
        ykeys: ['Petrol', 'Gas', 'Diesel'],
        labels: ['Petrol', 'Gas', 'Diesel'],
        hideHover: 'auto'
      });

      var bar2 = new Morris.Bar({
        element: 'revenueChart',
        resize: true,
        data: [ <?php echo $mydata; ?>],
        barColors: ['#00a65a', '#f39c12', '#dd4b39'],
        xkey: 'Month',
        ykeys: ['Petrol', 'Gas', 'Diesel'],
        labels: ['Petrol', 'Gas', 'Diesel'],
        hideHover: 'auto'
      });

      var bar3 = new Morris.Bar({
        element: 'customerChart',
        resize: true,
        data: [ <?php echo $orders ?> ],
        barColors: ['#337ab7', '#dd4b39'],
        xkey: 'Month',
        ykeys: ['New', 'Returning'],
        labels: ['New', 'Returning'],
        hideHover: 'auto'
      });

    });

    </script>
</html>
