<?php require_once 'inc/header.php'?>
<body class="skin-blue">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo SITEURL ?>" class="logo"><b>Haykpo</b></a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="label label-danger"><?php echo $escaper->escapeHtml(count($data['notif']))?></span></a>
                            <ul class="dropdown-menu">
                                <li class="header">You have <?php echo $escaper->escapeHtml(count($data['notif']))?> notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <?php foreach($data['notif'] as $notif): ?>
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
                        <!-- Tasks: style can be found in dropdown.less -->
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="<?php echo $escaper->escapeHtmlAttr( SITEURL ); ?>/users/logout/<?php echo $_SESSION['user_id'] ?>" >
                                <i class="fa fa-power-off"></i></a>
                            </li>
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
                                        <h3 class="box-title">LATEST ORDERS</h3>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="partnerHistory1" class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data['recentHistory'] as $order): ?>
                                                    <tr>
                                                        <td>
                                                            <a href="#"><?php echo $escaper->escapeHtml(get_formatted_date($order->order_date_added))?></a>
                                                        </td>
                                                        <td><?php echo $escaper->escapeHtml($order->product_name)?></td>
                                                        <td><?php echo $escaper->escapeHtml($order->order_litres)?> Litres</td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20">N<?php echo $escaper->escapeHtml($order->order_amount)?></div>
                                                        </td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo ($order->order_status == 0)?'Pending':'Delivered'?></div>
                                                        </td>
                                                        <td>
                                                            <button oid="<?php echo $order->order_id?>" href="#" id="orderStatus" <?php echo ($order->order_status == 0)?'':'disabled'?> class="btn btn-danger"> Delivered </button>

                                                        </td>
                                                        <td>
                                                            <button oid="<?php echo $order->order_id?>" href="#" id="viewOrder" class="btn btn-primary"> View </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- TABLE: LATEST ORDERS -->
                                <!-- /.box -->
                            </div>
                            <div class="col-md-4" data-pg-collapsed>
                                <div class="ov-box box-shadow">
                                    <h5 class="text-left">Order Value <sup class="gray">Jan</sup></h5>
                                    <h2><span>N<?php echo formatNumber(20000)?></span><img src="<?php echo  SITEURL ?>/assets/images/svg/Arrow%20(2).svg"><span class="green">43%</span></h2>
                                    <p class="text-right gray">since last month</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box box-success" data-pg-collapsed>
                                    <div class="box-header">
                                        <h3 class="box-title"><span>Revenues</span>
                                        </h3>
                                        <h3>N<?php echo formatNumber(15000)?></h3>
                                    </div>
                                    <div class="box-body chart-responsive">
                                        <div class="chart" id="revenueChart" style="height: 300px;"></div>
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
                                            <option value="-1" selected>Product Sold</option>
                                        </select>
                                        <!-- <sup class="gray">Last 10 days</sup> -->
                                    </h3>
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
                                    <div class="chart" id="productSoldChart" style="height: 300px;"></div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- TABLE: LATEST ORDERS -->
                            <!-- /.box -->
                        </div>
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
                                        <table id="partnerHistory" class="table no-margin">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Product</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($data['history'] as $order): ?>
                                                    <tr>
                                                        <td>
                                                            <a href="#"><?php echo $escaper->escapeHtml(get_formatted_date($order->order_date_added))?></a>
                                                        </td>
                                                        <td><?php echo $escaper->escapeHtml($order->product_name)?></td>

                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $escaper->escapeHtml($order->order_litres)?> Litres</div>
                                                        </td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20">N<?php echo $escaper->escapeHtml($order->order_amount)?></div>
                                                        </td>
                                                        <td>
                                                            <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo ($order->order_status == 0)?'Pending':'Delivered'?></div>
                                                        </td>
                                                        <td>
                                                            <button oid="<?php echo $order->order_id?>" href="#" id="orderStatus" <?php echo ($order->order_status == 0)?'':'disabled'?> class="btn btn-danger"> Delivered </button>
                                                        </td>
                                                        <td>
                                                            <button oid="<?php echo $order->order_id?>" href="#" id="viewOrder" class="btn btn-primary"> View </button>
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

            <!-- <div class="sections p-section" id="partner">
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
<div class="row">
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
<th>Delete</th>
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
<button type="button" class="btn  btn-success">Label</button>
</td>
<td>
<button type="button" class="btn  btn-danger">Label</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
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
</div>
</div>
<div class="tab-pane" id="tab2">
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">All Partners</h3>
<div class="box-tools pull-right">
<button class="btn btn-box-tool" data-widget="collapse">
<i class="fa fa-minus"></i>
</button>
</div>
</div>
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
<th>Delete</th>
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
<button type="button" class="btn  btn-success">Label</button>
</td>
<td>
<button type="button" class="btn  btn-danger">Label</button>
</td>
</tr>
</tbody>
</table>
</div>
</div>
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
</div>
</div>
</div>
</div>
</div>
</div> -->
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
                        <h3 class="box-title">Change Password</h3>
                    </div>
                    <div class="box-body chart-responsive">
                        <div class="chart" id="bar-chart8" style="height: 300px;">
                            <form>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="password" id="cpassword" name="password" class="form-control" placeholder="current password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="password" id="npassword" name="cpassword" class="form-control input-group form-group" placeholder="new password">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <i class="text-red" id="e"></i>
                                            <input type="password" id="conpass" name="conpass" class="form-control input-group form-group" placeholder="confirm password">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="button" uid="<?php echo $_SESSION['user_id'] ?>" class="btn btn-primary text-uppercase updatePartnerPass" value="update" />
                                            <span class="passloader">
                                                <i class="fa fa-pulse fa-2x  fa-spinner"></i>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- TABLE: LATEST ORDERS -->
                    <!-- /.box -->
                </div>
                <div>
                    <div class="box box-success" data-pg-collapsed>
                        <div class="box-header">
                            <h3 class="box-title">Bank Details</h3>
                        </div>
                        <div class="box-body chart-responsive">
                            <div class="chart" id="bar-chart8" style="height: 300px;">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="text" id="Paccname" name="accname" class="form-control" placeholder="account name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="number" id="Paccnum" name="acc-number" class="form-control input-group form-group" placeholder="account number">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <select id="Pbankname" class="form-control input-group form-group">
                                                    <option value="-1">Select Bank</option>
                                                    <option value="First Bank">First Bank</option>
                                                    <option value="GT Bank">GT Bank</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="button" uid="<?php echo $_SESSION['user_id']; ?>" class="btn btn-primary text-uppercase updatePartnerAccount pull-left" value="update" />
                                                <span class="accloader">
                                                    <i class="fa fa-pulse fa-2x  fa-spinner"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
            <h2 class="text-center text-capitalize">new order</h2>
        </div>
    </div>
</div>
<?php
$dat = file_get_contents(SITEURL.'/api/clientRevenue/'.$_SESSION['user_id']);
$mydata = json_decode($dat);

// var_dump($mydata);
$orderData = file_get_contents(SITEURL.'/api/products/'.$_SESSION['user_id']);
$orders = json_decode($orderData);

// var_dump($orders);
?>

<!-- ./wrapper -->
<!-- jQuery 2.1.3 -->
<script src="<?php echo $escaper->escapeHtmlAttr( SITEURL ) ?>/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo $escaper->escapeHtmlAttr( SITEURL ) ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo $escaper->escapeHtmlAttr( SITEURL ) ?>/assets/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo $escaper->escapeHtmlAttr( SITEURL ) ?>/assets/plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="<?php echo $escaper->escapeHtmlAttr( SITEURL ) ?>/assets/dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $escaper->escapeHtmlAttr( SITEURL ) ?>/assets/dist/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script src="<?php echo $escaper->escapeHtmlAttr( SITEURL ) ?>/assets/dist/js/dashboard.js" type="text/javascript"></script>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>

<script type="text/javascript">
$('#partnerHistory').dataTable();
$('#partnerHistory1').dataTable();
$(function () {
    "use strict";

    var bar = new Morris.Donut({
        element: 'revenueChart',
        data: [
            <?php echo $mydata;?>
        ],
        colors: ['#00a65a', '#337ab7', '#82CAFA'],
    });

    Morris.Bar({
        element: 'productSoldChart',
        data: [
            <?php echo $orders; ?>
        ],
        lineColors: ['#337ab7', '#dd4b39', '#db4b79'],
        xkey: 'Month',
        ykeys: ['Petrol', 'Gas', 'Diesel'],
        labels: ['Petrol', 'Gas', 'Diesel']
    });

});
</script>
</body>
</html>
