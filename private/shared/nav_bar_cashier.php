<nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="admin.php" class="nav-link">Home</a>
                </li>
                              
            </ul>

            <!-- SEARCH FORM -->
        
        

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
             
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-circle-o"></i>
                       
                    </a>
                   
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
                <li class="nav-item">
                <a class="btn btn-outline-danger my-2 my-sm-0" href=<?php echo url_for('/logout.php'); ?>>Sign Out</a>
                </li>
            </ul>
        </nav>