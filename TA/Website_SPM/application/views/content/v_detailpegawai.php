<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>activity"><i class="fa fa-dashboard"></i>History</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2><?php echo $nama?></h2>
              <h3>NIP : <?php echo $nip; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tDetailEmployee" class="table table-striped table-hover" style="width: 100%">
                <thead>
                <tr>
                  <th class="col-md-1" style="text-align:center">No</th>
                  <th class="col-md-2" style="text-align:left">Date</th>
                  <th style="text-align:center"></th>
                  <th class="col-md-2" style="text-align:center">Time Attendance</th>
                  <th class="col-md-2" style="text-align:center">Time Last Connected</th>
                  <th class="col-md-2" style="text-align:center">Time Return</th>
                  <th class="col-md-2" style="text-align:center">Status</th>
                  <th class="col-md-1" style="text-align:center"></th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($tDetailEmployee as $dmp){
                      echo '
                          <tr>
                            <td style="text-align:center; vertical-align:middle; font-weight:bold; height:50px;"></td>
                            <td style="text-align:left; vertical-align:middle; font-weight:bold;"><span class="fa fa-calendar"></span>&nbsp;'.date("l, d F Y", strtotime($dmp->a_date)).'</td>
                            <td style="text-align:center; vertical-align:middle;">'.$dmp->a_date.'</td>
                            <td style="text-align:center; vertical-align:middle; font-weight:bold;">'.$dmp->a_time.'</td>
                            <td style="text-align:center; vertical-align:middle; font-weight:bold;">'.$dmp->a_timereturn.'</td>
                            <td style="text-align:center; vertical-align:middle; font-weight:bold;">'.$dmp->a_lastconnect.'</td>
                            <td style="text-align:center; vertical-align:middle;">';
                            if($dmp->a_status == 1) echo '<span class="badge bg-green"><i class="glyphicon glyphicon-ok-sign"></i></span>';
                            else echo '<span class="badge bg-red"><i class="glyphicon glyphicon-remove-sign"></i></span>';
                      echo '
                            </td>
                            <td style="text-align:left; vertical-align:middle; font-weight:bold;"></td>
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
