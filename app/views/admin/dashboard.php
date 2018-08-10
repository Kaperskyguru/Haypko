<!DOCTYPE html> 
<html> 
  <head> 
    <meta charset="UTF-8"> 
    <title>Haykpo | Dashboard</title>     
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'> 
    <meta description="Get fuel delivered to your doorstep"> 
    <!-- Bootstrap 3.3.2 -->     
    <link href="<?php echo SITEURL ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> 
    <!-- FontAwesome 4.3.0 -->     
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Ionicons 2.0.0 -->     
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Theme style -->     
    <link href="<?php echo SITEURL ?>/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" /> 
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->     
    <link href="<?php echo SITEURL ?>/assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" /> 
    <!-- iCheck -->     
    <link href="<?php echo SITEURL ?>/assets/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" /> 
    <!-- Morris chart -->     
    <link href="<?php echo SITEURL ?>/assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" /> 
    <!-- enyodashboard Theme style -->     
    <link href="<?php echo SITEURL ?>/assets/dist/css/enyodashboard.css" rel="stylesheet" type="text/css" /> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->     
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->     
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->     
  </head>   
  <body class="skin-blue"> 
    <div class="wrapper"> 
      <header class="main-header"> 
        <!-- Logo -->         
        <a href="#" class="logo"><b>Haykpo</b></a> 
        <!-- Header Navbar: style can be found in header.less -->         
        <nav class="navbar navbar-static-top" role="navigation"> 
          <!-- Sidebar toggle button-->           
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a> 
          <div class="navbar-custom-menu"> 
            <ul class="nav navbar-nav"> 
              <!-- Messages: style can be found in dropdown.less-->               
              <!-- Notifications: style can be found in dropdown.less -->               
              <li class="dropdown notifications-menu"> 
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="label label-danger">10</span></a> 
                <ul class="dropdown-menu"> 
                  <li class="header">You have 10 notifications</li>                   
                  <li> 
                    <!-- inner menu: contains the actual data -->                     
                    <ul class="menu"> 
                      <li> 
                        <a href="#"><i class="fa fa-users text-aqua"></i> 5 new members joined today</a> 
                      </li>                       
                      <li> 
                        <a href="#"><i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems</a> 
                      </li>                       
                      <li> 
                        <a href="#"><i class="fa fa-users text-red"></i> 5 new members joined</a> 
                      </li>                       
                      <li> 
                        <a href="#"><i class="fa fa-shopping-cart text-green"></i> 25 sales made</a> 
                      </li>                       
                      <li> 
                        <a href="#"><i class="fa fa-user text-red"></i> You changed your username</a> 
                      </li>                       
                    </ul>                     
                  </li>                   
                  <li class="footer"> 
                    <a href="#">View all</a> 
                  </li>                   
                </ul>                 
              </li>    
              <li class="dropdown notifications-menu"> 
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
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
                      </select><sup class="gray">Last 10 days</sup></h3> 
                  </div>                   
                  <h4 class="box-title"><ul class="list-inline"> 
                      <span><strong>11,000</strong></span> 
                      <sub class="gray">Total</sub> 
                      <li> 
                        <i class="fa fa-circle text-primary"></i> Petrol
                      </li>                       
                      <li> 
                        <i class="fa fa-circle text-yellow"></i> Diesel
                      </li>                       
                      <li> 
                        <i class="fa fa-circle text-red"></i> Diesel
                      </li>                       
                    </ul></h4> 
                  <div class="box-body chart-responsive"> 
                    <div class="chart" id="bar-chart" style="height: 300px;"></div>                     
                  </div>                   
                  <!-- /.box-body -->                   
                </div>                 
                <!-- TABLE: LATEST ORDERS -->                 
                <!-- /.box -->                 
              </div>               
              <div class="col-sm-4" data-pg-collapsed> 
                <div class="ov-box box-shadow"> 
                  <h5 class="text-left">Order Value <sup class="gray">Today</sup></h5> 
                  <h2><span>N20,000.01</span><img src="<?php echo SITEURL ?>/assets/images/svg/Arrow%20(2).svg"><span class="green">43%</span></h2> 
                  <p class="text-right gray">since yesterday</p> 
                </div>                 
              </div>               
              <div class="col-sm-6"> 
                <div class="box box-success" data-pg-collapsed> 
                  <div class="box-header"> 
                    <h3 class="box-title"><span>Revenues</span> <span class="gray">Last 10 days</span></h3> 
                    <h3>N15,000</h3> 
                    <h6 class="gray">Period Jan 1 - Jan 10</h6> 
                  </div>                   
                  <div class="box-body chart-responsive"> 
                    <div class="chart" id="bar-chart3" style="height: 300px;"></div>                     
                  </div>                   
                  <!-- /.box-body -->                   
                </div>                 
                <!-- TABLE: LATEST ORDERS -->                 
                <!-- /.box -->                 
              </div>               
              <div class="col-sm-6"> 
                <div class="box box-success" data-pg-collapsed> 
                  <div class="box-header"> 
                    <h3 class="box-title"><select> 
                        <option value="-1" selected>Orders Sold</option>                         
                      </select><sup class="gray">Last 10 days</sup></h3> 
                  </div>                   
                  <h4 class="box-title"><ul class="list-inline"> 
                      <li> 
                        <i class="fa fa-circle text-primary"></i> 
                        3, 724
                        <h6 class="gray">New Customers</h6> 
                      </li>                       
                      <li> 
                        <i class="fa fa-circle text-yellow"></i> 5, 788
                        <h6 class="gray">Recurring Customers</h6> 
                      </li>                       
                      <li> 
                        <i class="fa fa-circle text-red"></i>1, 231
                        <h6 class="gray">Returning Customers</h6> 
                      </li>                       
                    </ul></h4> 
                  <div class="box-body chart-responsive"> 
                    <div class="chart" id="bar-chart4" style="height: 300px;"></div>                     
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
                      <table class="table history no-margin"> 
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
                          <tr> 
                            <td> 
                              <a href="#">Jan 13, 2018</a> 
                            </td>                             
                            <td>Petrol</td> 
                            <td>Enyo Retail</td> 
                            <td> 
                              <div class="sparkbar" data-color="#00a65a" data-height="20">10 Litres</div>                               
                            </td>                             
                            <td> 
                              <div class="sparkbar" data-color="#00a65a" data-height="20">N15,500</div>                               
                            </td>                             
                          </tr>                           
                          <tr> 
                            <td> 
                              <a href="#">Jan 13, 2018</a> 
                            </td>                             
                            <td>Petrol</td> 
                            <td>Enyo Retail</td> 
                            <td> 
                              <div class="sparkbar" data-color="#00a65a" data-height="20">10 Litres</div>                               
                            </td>                             
                            <td> 
                              <div class="sparkbar" data-color="#00a65a" data-height="20">N15,500</div>                               
                            </td>                             
                          </tr>                           
                          <tr> 
                            <td> 
                              <a href="#">Jan 13, 2018</a> 
                            </td>                             
                            <td>Petrol</td> 
                            <td>Enyo Retail</td> 
                            <td> 
                              <div class="sparkbar" data-color="#00a65a" data-height="20">10 Litres</div>                               
                            </td>                             
                            <td> 
                              <div class="sparkbar" data-color="#00a65a" data-height="20">N15,500</div>                               
                            </td>                             
                          </tr>                           
                          <tr> 
                            <td> 
                              <a href="#">Jan 13, 2018</a> 
                            </td>                             
                            <td>Petrol</td> 
                            <td>Enyo Retail</td> 
                            <td> 
                              <div class="sparkbar" data-color="#00a65a" data-height="20">10 Litres</div>                               
                            </td>                             
                            <td> 
                              <div class="sparkbar" data-color="#00a65a" data-height="20">N15,500</div>                               
                            </td>                             
                          </tr>                           
                        </tbody>                         
                      </table>                       
                    </div>                     
                    <!-- /.table-responsive -->                     
                  </div>                   
                  <!-- /.box-body -->                   
                  <div class="box-footer clearfix"> 
                    <ul class="pagination pull-right" data-pg-collapsed> 
                      <li> 
                        <a href="#"><i class="fa fa-long-arrow-left"></i> &nbsp; Prev</a> 
                      </li>                       
                      <li class="active"> 
                        <a href="#">1 <span class="sr-only">(current)</span></a> 
                      </li>                       
                      <li> 
                        <a href="#">2</a> 
                      </li>                       
                      <li> 
                        <a href="#">3</a> 
                      </li>                       
                      <li> 
                        <a href="#">Next &nbsp; <i class="fa fa-long-arrow-right"></i></a> 
                      </li>                       
                    </ul>                     

                  </div>                   
                  <!-- /.box-footer -->                   
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
                          <table class="table no-margin ptable"> 
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
                              <tr> 
                                <td> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </td>                                 
                                <td><span>Enyo Retail</span></td> 
                                <td><span>Yaba</span></td> 
                                <td> 
                                  <button type="button" class="btn  btn-info view">view</button>                                   
                                </td>                                 
                                <td> 
                                  <button type="button" class="btn  btn-danger delete">delete</button>                                   
                                </td>                                 
                              </tr> 
                                <tr> 
                                <td> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </td>                                 
                                <td><span>Enyo Retail</span></td> 
                                <td><span>Yaba</span></td> 
                                <td> 
                                  <button type="button" class="btn  btn-info view">view</button>                                   
                                </td>                                 
                                <td> 
                                  <button type="button" class="btn  btn-danger delete">delete</button>                                   
                                </td>                                 
                              </tr>
                                <tr> 
                                <td> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </td>                                 
                                <td><span>Enyo Retail</span></td> 
                                <td><span>Yaba</span></td> 
                                <td> 
                                  <button type="button" class="btn  btn-info view">view</button>                                   
                                </td>                                 
                                <td> 
                                  <button type="button" class="btn  btn-danger delete">delete</button>                                   
                                </td>                                 
                              </tr>
                                <tr> 
                                <td> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </td>                                 
                                <td><span>Enyo Retail</span></td> 
                                <td><span>Yaba</span></td> 
                                <td> 
                                  <button type="button" class="btn  btn-info view">view</button>                                   
                                </td>                                 
                                <td> 
                                  <button type="button" class="btn  btn-danger delete">delete</button>                                   
                                </td>                                 
                              </tr>                              
                            </tbody>                             
                          </table>                           
                        </div>                         
                        <!-- /.table-responsive -->                         
                      </div>                       
                      <!-- /.box-body -->                       
                      <div class="box-footer clearfix"> 
                        <ul class="pagination pull-right" data-pg-collapsed> 
                          <li> 
                            <a href="#"><i class="fa fa-long-arrow-left"></i> &nbsp;Prev</a> 
                          </li>                           
                          <li class="active"> 
                            <a href="#">1 <span class="sr-only">(current)</span></a> 
                          </li>                           
                          <li> 
                            <a href="#">2</a> 
                          </li>                           
                          <li> 
                            <a href="#">3</a> 
                          </li>                           
                          <li> 
                            <a href="#">Next &nbsp;<i class="fa fa-long-arrow-right"></i></a> 
                          </li>                           
                        </ul>                         
                        <span class="bottom"> Show: <select name="datesearch"> 
                            <option value="-1" selected> 10 Results</option>                             
                          </select></span> 
                      </div>                       
                      <!-- /.box-footer -->                       
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
                          <table class="table no-margin"> 
                            <thead> 
                              <tr> 
                                <th> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </th>                                 
                                <th>Partner</th> 
                                <th>Location</th> 
                                <th>View</th> 
                                <th><button type="button" class="btn  btn-danger delete">delete</button></th> 
                              </tr>                               
                            </thead>                             
                            <tbody> 
                              <tr> 
                                <td> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </td>                                 
                                <td><span>Enyo Retail</span></td> 
                                <td><span>Yaba</span></td> 
                                <td> 
                                  <button type="button" class="btn  btn-info view" >view</button>                                   
                                </td>                                 
                                <td> 
                                  <button type="button" class="btn  btn-danger delete">delete</button>                                   
                                </td>                                 
                              </tr> 
                              <tr> 
                                <td> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </td>                                 
                                <td><span>Enyo Retail</span></td> 
                                <td><span>Yaba</span></td> 
                                <td> 
                                  <button type="button" class="btn  btn-info view">view</button>                                   
                                </td>                                 
                                <td> 
                                  <button type="button" class="btn  btn-danger delete">delete</button>                                   
                                </td>                                 
                              </tr> 
                              <tr> 
                                <td> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </td>                                 
                                <td><span>Enyo Retail</span></td> 
                                <td><span>Yaba</span></td> 
                                <td> 
                                  <button type="button" class="btn  btn-info view">view</button>                                   
                                </td>                                 
                                <td> 
                                  <button type="button" class="btn  btn-danger delete">delete</button>                                   
                                </td>                                 
                              </tr> 
                              <tr> 
                                <td> 
                                  <input class="control-label" type="checkbox" value=""> 
                                </td>                                 
                                <td><span>Enyo Retail</span></td> 
                                <td><span>Yaba</span></td> 
                                <td> 
                                  <button type="button" class="btn  btn-info view">view</button>                                   
                                </td>                                 
                                <td> 
                                  <button type="button" class="btn  btn-danger delete">delete</button>                                   
                                </td>                                 
                              </tr>                               
                            </tbody>                             
                          </table>                           
                        </div>                         
                        <!-- /.table-responsive -->                         
                      </div>                       
                      <!-- /.box-body -->                       
                      <div class="box-footer clearfix"> 
                        <ul class="pagination pull-right" data-pg-collapsed> 
                          <li> 
                            <a href="#"><i class="fa fa-long-arrow-left"></i> &nbsp;Prev</a> 
                          </li>                           
                          <li class="active"> 
                            <a href="#">1 <span class="sr-only">(current)</span></a> 
                          </li>                           
                          <li> 
                            <a href="#">2</a> 
                          </li>                           
                          <li> 
                            <a href="#">3</a> 
                          </li>                           
                          <li> 
                            <a href="#">Next &nbsp;<i class="fa fa-long-arrow-right"></i></a> 
                          </li>                           
                        </ul>                         
                        <span class="bottom"> Show: <select name="datesearch"> 
                            <option value="-1" selected>10 Results</option>                             
                          </select></span> 
                      </div>                       
                      <!-- /.box-footer -->                       
                    </div>                     
                  </div>                   
                  <div class="tab-pane" id="tab3"> 
                    <p>Tab 3 content goes here...</p> 
                  </div>                   
                  <div class="tab-pane" id="tab4"> 
                    <p>Tab 4 content goes here...</p> 
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
                            <input type="password" name="password" class="form-control" placeholder="current password"> 
                          </div>                           
                        </div>                         
                        <div class="col-sm-6"> 
                          <div class="form-group"> 
                            <input type="password" name="cpassword" class="form-control input-group form-group" placeholder="new password"> 
                          </div>                           
                        </div>                         
                        <div class="col-sm-6"> 
                          <div class="form-group"> 
                            <input type="password" name="conpass" class="form-control input-group form-group" placeholder="confirm password"> 
                          </div>                           
                        </div>                         
                        <div class="col-sm-6 col-sm-push-6"> 
                          <div class="form-group text-right"> 
                            <input type="button" class="btn btn-primary text-uppercase updatepass" value="update"> 
                            <i class="fa fa-pulse fa-2x passloader fa-spinner"></i> 
                          </div>                           
                        </div>                         
                    </form>                     
                  </div>                   
                  <div class="box-body chart-responsive"> 
                    <form> 
                      <h2>Product Settings</h2> 
                      <div class="row"> 
                        <div class="col-sm-6" data-pg-collapsed> 
                          <div class="form-group"> 
                            <label class="control-label"> 
                              Product
</label>                             
                            <h4>Petrol</h4> 
                          </div>                           
                        </div>                         
                        <div class="col-sm-6" data-pg-collapsed> 
                          <div class="form-group"> 
                            <label class="control-label"> 
                              price
</label>
                            <h4 class="price"><input type="number" max="4" class="change-input" placeholder="price" /><span> per litre</span></h4>
                          </div>                           
                        </div>
                        <div class="col-sm-6" data-pg-collapsed> 
                          <div class="form-group"> 
                            <h4>Diesel</h4> 
                          </div>                           
                        </div>
                        <div class="col-sm-6" data-pg-collapsed> 
                          <h4 class="price"><input type="number" max="4" class="change-input" placeholder="price" /><span> per litre</span></h4> 
                        </div>
                        <div class="col-sm-6" data-pg-collapsed> 
                          <div class="form-group"> 
                            <h4>Gas</h4> 
                          </div>                           
                        </div>
                        <div class="col-sm-6" data-pg-collapsed> 
                          <div class="form-group"> 
                            <h4 class="price"><input type="number" max="4" class="change-input" placeholder="price" /><span> per kg</span></h4>
                          </div>                           
                        </div>
                        <div class="col-sm-6"> 
                          <div class="form-group"> 
                            <input type="button" class="btn btn-primary updateprice" value="Update">
                            <i class="fa fa-pulse fa-2x priceloader fa-spinner"></i> 
                          </div>                           
                        </div>                         
                      </div>                       
                    </form>                     
                  </div>                   
                  <!-- /.box-body -->                   
                </div>                 
                <!-- TABLE: LATEST ORDERS -->                 
                <!-- /.box -->                 
              </div>               
              <!-- ./col -->               
            </div>             
            <!-- /.row (main row) -->             
          </section>           
        </div>         
        <!-- Main content -->         
        <!-- /.content -->         
      </div>
      <!-- /.content-wrapper -->       
      <footer class="main-footer"> 
        <strong>Copyright &copy; Haykpo  2018</strong> All rights reserved.
      </footer>       
      <div class="popup-overlay" data-pg-collapsed> 
        <div class="popup-body box-shadow text-left">
          <i class="fa fa-check-circle text-success fa-4x"></i>
          <h2>Account Created</h2>
          <p>Username </p>
          <h4>Enyopay</h4>
          <p>Password </p>
          <h4>Enyo1244</h4>
          <input type="button" class="btn btn-info" name="send" value="send">        
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
              <h2>Add New Retailer</h2>
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
                    <select class="form-control"> name="state" id="state">
                      <option value="" selected="selected"> Select  State</option>
                      <option value="Lagos">Lagos</option>
                    </select>
                  </div>   
                </div>
                <div class="col-md-3">
                  <div class="form-group" data-pg-collapsed>
                    <label class="control-label" for="city">City</label>
                    <select class="form-control">
                      <option value="-1">Select City</option>
                      <option value="yaba">yaba</option>
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
    <div class="view-overlay"> 
      <div class="view-box">
            <div class="row">
              <div class="col-sm-12">
                  <div class="text-center">
                      <i class="fa fa-users fa-3x"></i>
                  </div>
                  <h2>View Account</h2>
                  <p>Username :<span>Enyopay</span></p>
                  <p>Password :<span>EnyoOnline</span></p>
                  <p>Location :<span>Yaba</span></p>
              </div>
            </div>
      </div>
    </div> 
    <!-- ./wrapper -->     
    <!-- jQuery 2.1.3 -->     
    <script src="<?php echo SITEURL ?>/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>     
    <!-- Bootstrap 3.3.2 JS -->     
    <script src="<?php echo SITEURL ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>     
    <!-- Morris.js charts -->     
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>     
    <script src="<?php echo SITEURL ?>/assets/plugins/morris/morris.min.js" type="text/javascript"></script>     
    <!-- FastClick -->     
    <script src='<?php echo SITEURL ?>/assets/plugins/fastclick/fastclick.min.js'></script>     
    <!-- AdminLTE App -->     
    <script src="<?php echo SITEURL ?>/assets/dist/js/app.min.js" type="text/javascript"></script>     
    <!-- AdminLTE for demo purposes -->     
    <script src="<?php echo SITEURL ?>/assets/dist/js/demo.js" type="text/javascript"></script>     
    <!-- page script -->     
    <script src="<?php echo SITEURL ?>/assets/dist/js/dashboard.js" type="text/javascript">
    </script>     
    <script type="text/javascript">
      $(function () {
        "use strict";
        //BAR CHART
        var bar = new Morris.Bar({
          element: 'bar-chart',
          resize: true,
          data: [
            {y: '2006', a: 100, b: 90},
            {y: '2007', a: 75, b: 65},
            {y: '2008', a: 50, b: 40},
            {y: '2009', a: 75, b: 65},
            {y: '2010', a: 50, b: 40},
            {y: '2011', a: 75, b: 65},
            {y: '2012', a: 100, b: 90}
          ],
          barColors: ['#00a65a', '#f56954'],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Petrol', 'Diesel'],
          hideHover: 'auto'
        });
      });
       $(function () {
        "use strict";
        //BAR CHART
        var bar = new Morris.Bar({
          element: 'bar-chart4',
          resize: true,
          data: [
            {y: '2006', a: 100, b: 90},
            {y: '2007', a: 75, b: 65},
            {y: '2008', a: 50, b: 40},
            {y: '2009', a: 75, b: 65},
            {y: '2010', a: 50, b: 40},
            {y: '2011', a: 75, b: 65},
            {y: '2012', a: 100, b: 90}
          ],
          barColors: ['#00a65a', '#f56954'],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Petrol', 'Diesel'],
          hideHover: 'auto'
        });
      });
        $(function () {
        "use strict";
        //BAR CHART
        var bar = new Morris.Bar({
          element: 'bar-chart3',
          resize: true,
          data: [
            {y: '2006', a: 100, b: 90},
            {y: '2007', a: 75, b: 65},
            {y: '2008', a: 50, b: 40},
            {y: '2009', a: 75, b: 65},
            {y: '2010', a: 50, b: 40},
            {y: '2011', a: 75, b: 65},
            {y: '2012', a: 100, b: 90}
          ],
          barColors: ['#00a65a', '#f56954'],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Petrol', 'Diesel'],
          hideHover: 'auto'
        });
      });
    </script>     
  </body>   
</html>
