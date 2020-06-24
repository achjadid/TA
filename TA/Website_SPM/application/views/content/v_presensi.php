<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i>Presensi</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2><?php echo date("l, d F Y");?></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 text-center">
                  <?php if(!empty($waktu)){ ?>
                  <h2 style="font-size:xx-large"> Halo <b><?php echo $name; ?></b>, Anda melakukan presensi kedatangan hari ini pada pukul</h2>
                  <span style="font-size:xxx-large; color: limegreen;"><?php echo $waktu; ?></span>
                  <?php } else { ?>
                  <h2 style="font-size:xx-large"> Halo <b><?php echo $name; ?></b>, Anda belum melakukan presensi hari ini.</h2>
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <br>
            <br>
            <br>
            <br>
            <div class="box-header">
              <h3>This Week</h3>
            </div>
            <div class="box-body table-responsive">
              <table id="tThisWeek" class="table table-striped table-hover" style="width: 100%">
                <thead>
                  <tr>
                    <th class="col-md-1" style="text-align:center">No</th>
                    <th class="col-md-2" style="text-align:left">Date</th>
                    <th style="text-align:center"></th>
                    <th class="col-md-1" style="text-align:center">Attendance Time</th>
                    <th class="col-md-1" style="text-align:center">Return Time</th>
                    <th class="col-md-5" style="text-align:center"></th>
                    <th class="col-md-1" style="text-align:center">Attendance Status</th>
                    <th class="col-md-1" style="text-align:center">Return Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($tThisWeek as $atw){
                      echo '
                          <tr>
                            <td style="text-align:center; vertical-align:middle;"></td>
                            <td style="text-align:left; vertical-align:middle; font-weight: bold; height:50px;"><span class="fa fa-calendar"></span>&nbsp;'.date("l, d F Y", strtotime($atw->a_date)).'</td>
                            <td style="text-align:center; vertical-align:middle; font-weight: bold; height:50px;">'.$atw->a_date.'</td>
                            <td style="text-align:center; vertical-align:middle; font-weight:bold;">'.$atw->a_time.'</td>
                            <td style="text-align:center; vertical-align:middle; font-weight:bold;">'.$atw->a_timereturn.'</td>
                            <td style="text-align:center; vertical-align:middle;"></td>
                            <td style="text-align:center; vertical-align:middle; height:50px;">';
                            if($atw->a_status == 1) echo '<span class="badge bg-green"><i class="glyphicon glyphicon-ok-sign"></i></span>';
                            else echo '<span class = "badge bg-red"><i class="glyphicon glyphicon-remove-sign"></i></span>';
                      echo  '</td>
                            <td style="text-align:center; vertical-align:middle; height:50px;">';
                            if($atw->a_statusreturn == 1) echo '<span class="badge bg-green"><i class="glyphicon glyphicon-ok-sign"></i></span>';
                            else echo '<span class = "badge bg-red"><i class="glyphicon glyphicon-remove-sign"></i></span>';
                      echo  '</td>
                          </tr>
                      ';
                    }
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

