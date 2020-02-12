<?php 
require_once('initialize.php'); 
?>
    
    <!-- jQuery -->
    <script src= <?php echo(url_for("/plugins/jquery/jquery.min.js"))?>></script>

    <!-- Bootstrap 4 -->
    <script src=<?php echo(url_for("plugins/bootstrap/js/bootstrap.bundle.min.js"))?>></script>

    <!-- AdminLTE App -->
    <script src=<?php echo(url_for("dist/js/adminlte.min.js"))?>></script>

      <!-- jQuery UI 1.11.4 -->
    <script src=<?php echo(url_for("plugins/jquery-ui/jquery-ui.min.js"))?>></script>

    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>

       <!-- DataTables -->
    <script src=<?php echo(url_for("plugins/datatables/jquery.dataTables.js"))?>></script>
    <script src=<?php echo(url_for("plugins/datatables-bs4/js/dataTables.bootstrap4.js"))?>></script>

      <!-- ChartJS -->
    <script src=<?php echo(url_for("plugins/chart.js/Chart.min.js"))?>></script>

        <!-- Sparkline -->
    <script src=<?php echo(url_for("plugins/sparklines/sparkline.js"))?>></script>

    <!-- JQVMap -->
    <script src=<?php echo(url_for("plugins/jqvmap/jquery.vmap.min.js"))?>></script>
    <script src=<?php echo(url_for("plugins/jqvmap/maps/jquery.vmap.usa.js"))?>></script>

    <!-- jQuery Knob Chart -->
    <script src=<?php echo(url_for("plugins/jquery-knob/jquery.knob.min.js"))?>></script>

    <!-- daterangepicker -->
    <script src=<?php echo(url_for("plugins/moment/moment.min.js"))?>></script>
    <script src=<?php echo(url_for("plugins/daterangepicker/daterangepicker.js"))?>></script>

    <!-- Tempusdominus Bootstrap 4 -->
    <script src=<?php echo(url_for("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"))?>></script>

    <!-- Summernote -->
    <script src=<?php echo(url_for("plugins/summernote/summernote-bs4.min.js"))?>></script>

    <!-- overlayScrollbars -->
    <script src=<?php echo(url_for("plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"))?>></script>

    <!-- AdminLTE App -->
    <script src=<?php echo(url_for("dist/js/adminlte.js"))?>></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src=<?php echo(url_for("dist/js/pages/dashboard.js"))?>></script>
    
    <!-- AdminLTE for demo purposes -->
    <script src=<?php echo(url_for("dist/js/demo.js"))?>></script>

