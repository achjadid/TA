<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Device
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>device"><i class="fa fa-dashboard"></i>Device</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>My Device</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-xs-4"></div>
              <div class="col-xs-4">
                <table id="tDevicePegawai" class="table table-striped table-hover" style="width: 100%">
                  <thead>
                  <tr>
                    <th class="col-md-2" style="text-align:center">No</th>
                    <th class="col-md-5" style="text-align:center">Device Name</th>
                    <th class="col-md-5" style="text-align:center">MAC Address</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($tDevicePegawai as $tdd){
                        echo '
                            <tr>
                              <td style="text-align:center; vertical-align:middle;"></td>
                              <td style="text-align:center; vertical-align:middle;">'.$tdd->m_name.'</td>
                              <td style="text-align:center; vertical-align:middle;">'.$tdd->m_address.'</td>
                            </tr>
                        ';
                      }
                    ?>
                  </tbody>
                </table>
                <br>
                <a class="btn btn-primary" href="<?php echo config_item('base_url');?>device/add" role="button" style="float: right;">Add New Device</a>
              </div>
              <div class="col-xs-4"></div>
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

