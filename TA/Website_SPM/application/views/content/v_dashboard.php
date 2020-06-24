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
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i>Monitoring</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo date("l, d F Y");?></h3>
            </div>
            <div class="box-header">
              <h3>Today's Activities</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tTodaysActivities" class="table table-striped table-hover" style="width: 100%">
                <thead>
                <tr>
                  <th class="col-md-1" style="text-align:center">No</th>
                  <th class="col-md-3" style="text-align:center">Code Name</th>
                  <th class="col-md-3" style="text-align:center">MAC Address</th>
                  <th class="col-md-1" style="text-align:center">Time</th>
                  <th class="col-md-1" style="text-align:center">Last Location</th>
                  <th class="col-md-3" style="text-align:center">Last Images</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($tTodaysActivities as $mtr){
                      echo '
                          <tr>
                            <td style="text-align:center; vertical-align:middle;"></td>
                            <td style="vertical-align:middle"><a href="'.base_url('activity/detail/'.$mtr->id).'">'.$mtr->kodenama.'</a></td>
                            <td style="text-align:center; vertical-align:middle;">'.$mtr->mac.'</td>
                            <td style="text-align:center; vertical-align:middle;"><span class="badge bg-green">'.$mtr->jam.'</span></td>
                            <td style="text-align:center; vertical-align:middle;">'.$mtr->lokasi.'</td>
                            <td style="vertical-align:middle" align="center">
                              <a href="'.base_url('uploads/images/'.$mtr->foto).'" target="_blank">
                              <img style="display: block; margin: 0; width: 50%; max-width: none;" src="'.site_url('uploads/images/'.$mtr->foto).'" />
                            </td>
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

