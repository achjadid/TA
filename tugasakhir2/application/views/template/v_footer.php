<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
  </footer>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo config_item('assets_bower');?>jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo config_item('assets_bower');?>jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo config_item('assets_bower');?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo config_item('assets_bower');?>raphael/raphael.min.js"></script>
<script src="<?php echo config_item('assets_bower');?>morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo config_item('assets_bower');?>jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo config_item('assets_plugins');?>jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo config_item('assets_plugins');?>jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo config_item('assets_bower');?>jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo config_item('assets_bower');?>moment/min/moment.min.js"></script>
<script src="<?php echo config_item('assets_bower');?>bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo config_item('assets_bower');?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo config_item('assets_plugins');?>bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo config_item('assets_bower');?>jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo config_item('assets_bower');?>fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo config_item('assets_dist');?>js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo config_item('assets_dist');?>js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo config_item('assets_dist');?>js/demo.js"></script>

<!-- DataTables -->
<script src="<?php echo config_item('assets_bower');?>datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo config_item('assets_bower');?>datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
</body>
</html>


<script>
    $(document).ready(function() {
    var t = $('#pengguna').DataTable( {
        "sScrollX": "100%",
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
  $(document).ready(function() {
    var tdurasi = $('#tPengguna').DataTable( {
        "ordering": false,
        "order": [[ 1, 'asc' ]]
    } );
 
    tdurasi.on( 'order.dt search.dt', function () {
        tdurasi.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
  } );
</script>


<script>
$(document).ready(function() {
    var tablepabrik = $('#tablepabrik').DataTable( {
       "sScrollX": "100%",
       "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    });

    tablepabrik.on( 'order.dt search.dt', function () {
        tablepabrik.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
  $('#searchPaNo').on( 'keyup change', function () {
      if ( tablepabrik.column(1).search() !== this.value ) {
          tablepabrik
              .column(1)
              .search( this.value )
              .draw();
      }
  } );
  $('#searchPaDk').on( 'keyup change', function () {
      if ( tablepabrik.column(2).search() !== this.value ) {
          tablepabrik
              .column(2)
              .search( this.value )
              .draw();
      }
  } );
  $('#searchPaTot').on( 'keyup change', function () {
      if ( tablepabrik.column(4).search() !== this.value ) {
          tablepabrik
              .column(4)
              .search( this.value )
              .draw();
      }
  } );
  $('#searchPaKw').on( 'keyup change', function () {
      if ( tablepabrik.column(3).search() !== this.value ) {
          tablepabrik
              .column(3)
              .search( this.value )
              .draw();
      }
  } );
} );
</script>