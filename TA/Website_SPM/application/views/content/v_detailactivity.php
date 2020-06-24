<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Activity
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>activity"><i class="fa fa-dashboard"></i>Activity</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h2><?php echo $codename; ?></h2>
              <h3>MAC Address : <?php echo $macaddress; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- <div class="row">
            <div class="col-xs-2"></div>
              <div class="col-xs-8"> -->
              <div class="box-body table-responsive">
                <table id="tDetailActivity" class="table table-striped table-hover" style="width: 100%">
                  <thead>
                  <tr>
                    <th class="col-md-1" style="text-align:center">No</th>
                    <th class="col-md-3" style="text-align:center">Date</th>
                    <th class="col-md-3" style="text-align:center">Time</th>
                    <th class="col-md-2" style="text-align:center">Location</th>
                    <th class="col-md-3" style="text-align:center">Images</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($tDetailActivity as $mtr){
                        echo '
                            <tr>
                              <td style="text-align:center; vertical-align:middle;"></td>
                              <td style="text-align:center; vertical-align:middle;">'.$mtr->l_date.'</td>
                              <td style="text-align:center; vertical-align:middle;">'.$mtr->l_time.'</td>
                              <td style="text-align:center; vertical-align:middle;">'.$mtr->l_location.'</td>
                              <td style="vertical-align:middle" align="center">
                                <a href="'.base_url('uploads/images/'.$mtr->l_photo).'" target="_blank">
                                <img style="display: block; margin: 0; width: 50%; max-width: none;" src="'.site_url('uploads/images/'.$mtr->l_photo).'" />
                              </td>
                            </tr>
                        ';
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- </div>
            <div class="col-xs-2"></div> -->
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

