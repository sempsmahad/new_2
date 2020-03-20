
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
            <!-- Brand Logo -->
            <a href="index3.php" class="brand-link">
                <img src=<?php echo url_for('dist/img/AdminLTELogo.png'); ?> alt="VelvetPOS Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">VelvetPOS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src=<?php echo url_for($user['image']); ?> class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $user['username'].' ('.$user['type'].')'; ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



                        <li class="nav-item">
                            <a href="index.php" class="nav-link <?=echoActiveClassIfRequestMatches("index")?>">
                                <i class="nav-icon fa fa-line-chart"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="sell.php" class="nav-link <?=echoActiveClassIfRequestMatches("sell")?>">
                                <i class="nav-icon fa fa-bitcoin"></i>
                                <p>
                                    Sell
                                </p>
                            </a>
                        </li>                   
                     
                        <li class="nav-item">
                            <a href="stock.php" class="nav-link <?=echoActiveClassIfRequestMatches("stock")?>">
                                <i class="nav-icon fa fa-cubes"></i>
                                <p>
                                    Stock
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>