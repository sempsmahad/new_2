<?php 
require_once('../../../private/initialize.php');
require_admin_login();
?>
<!DOCTYPE html>
<html>

<head>
<?php require_once('../../../private/shared/commn_header_links.php'); ?>  
    <title>VelvetPOS | preferences</title>
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once('../../../private/shared/nav_bar_admin.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once('../../../private/shared/side_bar_admin.php'); ?>

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
        <?php require_once('../../../private/shared/footer_admin.php'); ?>

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