<?php require_once('../../../private/initialize.php');  ?>
<!DOCTYPE html>
<html>

<head>
<?php require_once('../../../private/shared/commn_header_links.php'); ?>  
    <title>VelvetPOS | preferences</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once('../../../private/shared/nav_bar_admin.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="admin.php" class="brand-link">
                <img src=<?php echo(url_for("dist/img/AdminLTELogo.png"))?> alt="VelvetPOS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">VelvetPOS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src=<?php echo(url_for("dist/img/user2-160x160.jpg"))?> class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Alexander Pierce</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



                        <li class="nav-header">EXAMPLES</li>

                        <li class="nav-item">
                            <a href="admin.php" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Admins
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="cashier.php" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Cashiers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="manager.php" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Managers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="stock.php" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    stock
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="preferences.php" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    preferences
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

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
                                <li class="breadcrumb-item active">Preferences</li>
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
          
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">VelvetPOS.io</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.3-pre
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php require_once('../../../private/shared/cmn_scripts.php'); ?>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>


    <script>
        $(function() {
            $("#adminTable1").DataTable();
        });
    </script>
</body>

</html>