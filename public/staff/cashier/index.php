<?php
require_once '../../../private/initialize.php';
require_cashier_login();
// $latest_users = find_all_users(8);
// $latest_products = find_all_things([$limit=>4,$tb_name=>'stock']);
// $most_sold_products = find_all_most_sold([$limit=>5,$tb_name=>'sales']);
// $all_sales = find_all_most_sold([$limit=>'2 years',$tb_name=>'sales']);
// $all_users = find_all_users();
// $profit = calc_profit([limit=>'year']);
// $total_cost = calc_total_cost();
// $revenue=calc_revenue();
?>
    <?php $user = find_user_by_id($_SESSION['user_id']); ?>
        <!DOCTYPE html>
        <html>

        <head>
            <?php require_once '../../../private/shared/commn_header_links.php'; ?>
                <title>VelvetPOS | admins</title>

        </head>

        <body class="hold-transition sidebar-mini layout-fixed">
            <div class="wrapper">

                <!-- Navbar -->
                <?php require_once '../../../private/shared/nav_bar_cashier.php'; ?>
                    <!-- /.navbar -->

                    <!-- Main Sidebar Container -->
                    <?php require_once '../../../private/shared/side_bar_cashier.php'; ?>

                        <!-- Content Wrapper. Contains page content -->
                        <div class="content-wrapper">
                            <!-- Content Header (Page header) -->
                            <div class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1 class="m-0 text-dark">Dashboard</h1>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                                <li class="breadcrumb-item active">Admins</li>
                                            </ol>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>
                            <!-- /.content-header -->

                            <!-- Main content -->
                            <section class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>150</h3>

                                                    <p>Total Revenue</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-bag"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>53<sup style="font-size: 20px">%</sup></h3>

                                                    <p>Total Cost</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-stats-bars"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3>44</h3>

                                                    <p>Total Profit</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3>65</h3>

                                                    <p>Visitors</p>
                                                </div>
                                                <div class="icon">
                                                    <i class="ion ion-pie-graph"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <!-- ./col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Recently Added Products</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <ul class="products-list product-list-in-card pl-2 pr-2">
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <img src=<?php echo url_for( 'dist/img/default-150x150.png'); ?> alt="Product Image" class="img-size-50">
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title">Samsung TV<span class="badge badge-warning float-right">$1800</span></a><span class="product-description">Samsung 32" 1080p 60Hz LED Smart HDTV.</span>
                                                            </div>
                                                        </li>
                                                        <!-- /.item -->
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <img src=<?php echo url_for( 'dist/img/default-150x150.png'); ?> alt="Product Image" class="img-size-50">
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title">Bicycle<span class="badge badge-info float-right">$700</span></a>
                                                                <span class="product-description">26" Mongoose Dolomite Men's 7-speed, Navy Blue.</span>
                                                            </div>
                                                        </li>
                                                        <!-- /.item -->
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <img src=<?php echo url_for( 'dist/img/default-150x150.png'); ?> alt="Product Image" class="img-size-50">
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title">Xbox One <span class="badge badge-danger float-right">$350</span></a>
                                                                <span class="product-description">Xbox One Console Bundle with Halo Master Chief Collection.</span>
                                                            </div>
                                                        </li>
                                                        <!-- /.item -->
                                                        <li class="item">
                                                            <div class="product-img">
                                                                <img src=<?php echo url_for( 'dist/img/default-150x150.png'); ?> alt="Product Image" class="img-size-50">
                                                            </div>
                                                            <div class="product-info">
                                                                <a href="javascript:void(0)" class="product-title">PlayStation 4<span class="badge badge-success float-right">$399</span></a><span class="product-description">PlayStation 4 500GB Console (PS4)</span>
                                                            </div>
                                                        </li>
                                                        <!-- /.item -->
                                                    </ul>
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer text-center">
                                                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>
                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <div class="d-flex justify-content-between">
                                                        <h3 class="card-title">Sales</h3>
                                                        <a href="javascript:void(0);">View Report</a>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex">
                                                        <p class="d-flex flex-column">
                                                            <span class="text-bold text-lg">$18,230.00</span>
                                                            <span>Sales Over Time</span>
                                                        </p>
                                                        <p class="ml-auto d-flex flex-column text-right">
                                                            <span class="text-success"><i class="fas fa-arrow-up"></i> 33.1%</span>
                                                            <span class="text-muted">Since last month</span>
                                                        </p>
                                                    </div>
                                                    <!-- /.d-flex -->

                                                    <div class="position-relative mb-4">
                                                        <div class="chartjs-size-monitor">
                                                            <div class="chartjs-size-monitor-expand">
                                                                <div class=""></div>
                                                            </div>
                                                            <div class="chartjs-size-monitor-shrink">
                                                                <div class=""></div>
                                                            </div>
                                                        </div>
                                                        <canvas id="sales-chart" height="179" style="display: block; height: 200px; width: 561px;" width="504" class="chartjs-render-monitor"></canvas>
                                                    </div>

                                                    <div class="d-flex flex-row justify-content-end">
                                                        <span class="mr-2"><i class="fas fa-square text-primary"></i> This year</span>
                                                        <span><i class="fas fa-square text-gray"></i> Last year</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Latest Members</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <ul class="users-list clearfix">
                                                        <li>
                                                            <img src=<?php echo url_for( 'dist/img/user1-128x128.jpg'); ?> alt="User Image">
                                                            <a class="users-list-name" href="#">Alexander Pierce</a>
                                                            <span class="users-list-date">Today</span>
                                                        </li>
                                                        <li>
                                                            <img src=<?php echo url_for( 'dist/img/user8-128x128.jpg'); ?> alt="User Image">
                                                            <a class="users-list-name" href="#">Norman</a>
                                                            <span class="users-list-date">Yesterday</span>
                                                        </li>
                                                        <li>
                                                            <img src=<?php echo url_for( 'dist/img/user7-128x128.jpg'); ?> alt="User Image">
                                                            <a class="users-list-name" href="#">Jane</a>
                                                            <span class="users-list-date">12 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src=<?php echo url_for( 'dist/img/user6-128x128.jpg'); ?> alt="User Image">
                                                            <a class="users-list-name" href="#">John</a>
                                                            <span class="users-list-date">12 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src=<?php echo url_for( 'dist/img/user2-160x160.jpg'); ?> alt="User Image">
                                                            <a class="users-list-name" href="#">Alexander</a>
                                                            <span class="users-list-date">13 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src=<?php echo url_for( 'dist/img/user5-128x128.jpg'); ?> alt="User Image">
                                                            <a class="users-list-name" href="#">Sarah</a>
                                                            <span class="users-list-date">14 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src=<?php echo url_for( 'dist/img/user4-128x128.jpg'); ?> alt="User Image">
                                                            <a class="users-list-name" href="#">Nora</a>
                                                            <span class="users-list-date">15 Jan</span>
                                                        </li>
                                                        <li>
                                                            <img src=<?php echo url_for( 'dist/img/user3-128x128.jpg'); ?> alt="User Image">
                                                            <a class="users-list-name" href="#">Nadia</a>
                                                            <span class="users-list-date">15 Jan</span>
                                                        </li>
                                                    </ul>
                                                    <!-- /.users-list -->
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer text-center">
                                                    <a href="javascript::">View All Users</a>
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>

                                            <div class="card">
                                                <div class="card-header border-0">
                                                    <h3 class="card-title">Products</h3>
                                                    <div class="card-tools">
                                                        <a href="#" class="btn btn-tool btn-sm">
                                                            <i class="fas fa-download"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-tool btn-sm">
                                                            <i class="fas fa-bars"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-striped table-valign-middle">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Price</th>
                                                                <th>Sales</th>
                                                                <th>More</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <img src=<?php echo(url_for( "dist/img/default-150x150.png"))?> alt="Product 1" class="img-circle img-size-32 mr-2"> Some Product
                                                                </td>
                                                                <td>$13 USD</td>
                                                                <td>
                                                                    <small class="text-success mr-1">                        <i class="fas fa-arrow-up"></i>                        12%                      </small> 12,000 Sold
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="text-muted">
                                                                        <i class="fas fa-search"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src=<?php echo(url_for( "dist/img/default-150x150.png"))?> alt="Product 1" class="img-circle img-size-32 mr-2"> Another Product
                                                                </td>
                                                                <td>$29 USD</td>
                                                                <td>
                                                                    <small class="text-warning mr-1">                        <i class="fas fa-arrow-down"></i>                        0.5%                      </small> 123,234 Sold
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="text-muted">
                                                                        <i class="fas fa-search"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src=<?php echo(url_for( "dist/img/default-150x150.png"))?> alt="Product 1" class="img-circle img-size-32 mr-2"> Amazing Product
                                                                </td>
                                                                <td>$1,230 USD</td>
                                                                <td>
                                                                    <small class="text-danger mr-1">                        <i class="fas fa-arrow-down"></i>                        3%                      </small> 198 Sold
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="text-muted">
                                                                        <i class="fas fa-search"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src=<?php echo(url_for( "dist/img/default-150x150.png"))?> alt="Product 1" class="img-circle img-size-32 mr-2"> Perfect Item
                                                                    <span class="badge bg-danger">NEW</span>
                                                                </td>
                                                                <td>$199 USD</td>
                                                                <td>
                                                                    <small class="text-success mr-1"><i class="fas fa-arrow-up"></i>63%                      </small> 87 Sold
                                                                </td>
                                                                <td>
                                                                    <a href="#" class="text-muted">
                                                                        <i class="fas fa-search"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- /.row -->
                                </div>

                            </section>
                            <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->
                        <?php require_once '../../../private/shared/footer_admin.php'; ?>

                            <!-- Control Sidebar -->
                            <aside class="control-sidebar control-sidebar-dark">
                                <!-- Control sidebar content goes here -->
                            </aside>
                            <!-- /.control-sidebar -->
            </div>
            <!-- ./wrapper -->
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <?php require_once '../../../private/shared/cmn_scripts.php'; ?>

                <script>
                    $(function() {
                        $("#adminTable1").DataTable();
                    });
                </script>
        </body>

        </html>