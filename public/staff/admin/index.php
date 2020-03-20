<?php
require_once '../../../private/initialize.php';
require_admin_login();
$user = find_user_by_id($_SESSION['user_id']);
?>
<?php 
$users = find_all_items(['tb_name'=>'users']); 

?>

<!DOCTYPE html>
<html>

<head>
    <?php require_once '../../../private/shared/commn_header_links.php'; ?>
    <title>VelvetPOS | admins</title>
   
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php require_once '../../../private/shared/nav_bar_admin.php'; ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require_once '../../../private/shared/side_bar_admin.php'; ?>

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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Administrators</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                            <!-- table -->
                            <table class="table table-striped projects">
                            <!-- thead -->
                            <thead>                            
                            <tr>
                            <th >id</th>
                            <th >first name</th>
                            <th >last name</th>
                            <th style="width: 5%">email</th>                            
                            <th >username</th>
                            <th style="width: 2%">password</th>
                            <th style="width: 5%">type</th>
                            <th >affiliation</th>
                            <th style="width: 2%">image</th>
                            <th >joined</th>
                            <th >logged in</th>
                            <th></th>                            
                            </tr>                            
                            </thead>
                            <!-- /.thead -->
                            <!-- tbody -->
                            <tbody>                           
      <?php while($a_user = mysqli_fetch_assoc($users)) { ?>
    <tr>
        <td><?php echo h($a_user['id']); ?></td>                            
        <td><?php echo h($a_user['first_name']); ?></td>                            
        <td><?php echo h($a_user['last_name']); ?></td>                            
        <td><?php echo h($a_user['email']); ?></td>                            
        <td><?php echo h($a_user['username']); ?></td>                            
        <td><?php echo substr($a_user['password'],0,10).'...'; ?></td>                            
        <td><?php echo h($a_user['type']); ?></td>                            
        <td><?php echo h($a_user['affiliation']); ?></td>                                    
        <td>
        <?php if($a_user['image']!==""){?>
        <img alt="Avatar" class="table-avatar" src=<?php echo url_for($a_user['image'])?>>
        <?php }?>
        </td>                            
        <td><?php echo h($a_user['join_date']); ?></td>                            
        <td><?php echo h($a_user['last_logged_in']); ?></td>                            
        <td><a class="btn btn-primary btn-sm" href="<?php echo url_for('/staff/admin/show.php?id=' . h(u($a_user['id']))); ?>">
                              <i class="fas fa-eye">
                              </i>                              
                          </a>
                          <a class="btn btn-info btn-sm" href="<?php echo url_for('/staff/admin/edit.php?id=' . h(u($a_user['id']))); ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              
                          </a>
                          <a class="btn btn-danger btn-sm" href="<?php echo url_for('/staff/admin/delete.php?id=' . h(u($a_user['id']))); ?>">
                              <i class="fas fa-trash">
                              </i>
                              
                          </a></td>
    </tr>
    <?php } ?>                            
                            </tbody>
                            <!-- /.tbody -->
                            </table>
                            <!-- /.table -->
                            <?php
      mysqli_free_result($users);
    ?>
                            
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
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