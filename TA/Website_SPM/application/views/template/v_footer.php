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

<!-- Select2 -->
<script src="<?php echo config_item('assets_bower');?>select2/dist/js/select2.full.min.js"></script>

</body>
</html>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

  })
</script>

<script>
$(document).ready( function () {
    var ttodaysactivities = $('#tTodaysActivities').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 2, 5 ]
        } ],
        "order": [[ 1, 'asc' ]]
    } );

    ttodaysactivities.on( 'order.dt search.dt', function () {
        ttodaysactivities.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

} );
</script>

<script>
$(document).ready( function () {
    var tactivity = $('#tActivity').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 2, 6 ]
        } ],
        "pageLength": 50,
        "bLengthChange": false,
        "order": [[ 3, 'desc' ], [ 4, 'desc' ]]
    } );

    tactivity.on( 'order.dt search.dt', function () {
        tactivity.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
$(document).ready( function () {
    var tdetailactivity = $('#tDetailActivity').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 4 ]
        } ],
        "bLengthChange": false,
        "order": [[ 1, 'desc' ], [ 2, 'desc' ]]
    } );

    tdetailactivity.on( 'order.dt search.dt', function () {
        tdetailactivity.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
$(document).ready( function () {
    var tthisweek = $('#tThisWeek').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 1, 2, 3, 4, 5, 6, 7 ]
        },
        {
            "targets": [ 2 ],
            "visible": false,
            "searchable": false
        } ],
        "bLengthChange": false,
        "bFilter": false,
        "paging": false,
        "info": false,
        "order": [[ 2, 'desc' ]]
    } );

    tthisweek.on( 'order.dt search.dt', function () {
        tthisweek.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
 
} );
</script>

<script>
$(document).ready( function () {
    var thistorypresensi = $('#tHistoryPresensi').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 1, 3, 4, 5, 6, 7 ]  
        },
        {
            "targets": [ 2 ],
            "visible": false,
            "searchable": false
        } ],
        "order": [[ 2, 'desc' ]]
    } );

    thistorypresensi.on( 'order.dt search.dt', function () {
        thistorypresensi.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
$(document).ready( function () {
    var tdevicepegawai = $('#tDevicePegawai').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 2 ]  
        } ],
        "info": false,
        "order": [[ 1, 'asc' ]]
    } );

    tdevicepegawai.on( 'order.dt search.dt', function () {
        tdevicepegawai.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
$(document).ready( function () {
    var tgeneraldevice = $('#tGeneralDevice').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 2 ]  
        } ],
        "info": false,
        "pageLength": 10,
        "order": [[ 1, 'asc' ]]
    } );

    tgeneraldevice.on( 'order.dt search.dt', function () {
        tgeneraldevice.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
$(document).ready( function () {
    var temployeedevice = $('#tEmployeeDevice').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 2 ]  
        } ],
        "info": false,
        "pageLength": 10,
        "order": [[ 1, 'asc' ]]
    } );

    temployeedevice.on( 'order.dt search.dt', function () {
        temployeedevice.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
$(document).ready( function () {
    var temployee = $('#tEmployee').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 3 ]  
        } ],
        "info": false,
        "pageLength": 10,
        "order": [[ 1, 'asc' ]]
    } );

    temployee.on( 'order.dt search.dt', function () {
        temployee.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>

<script>
$(document).ready( function () {
    var tdetailemployee = $('#tDetailEmployee').DataTable( {
        "columnDefs": [ {
            "orderable": false,
            "targets": [ 0, 1, 3, 4, 5, 6, 7 ]  
        },
        {
            "targets": [ 2 ],
            "visible": false,
            "searchable": false
        } ],
        "order": [[ 2, 'desc' ]]
    } );

    tdetailemployee.on( 'order.dt search.dt', function () {
        tdetailemployee.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );
</script>