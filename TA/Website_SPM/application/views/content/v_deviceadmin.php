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
            <div class="box-header" style="text-align: center;">
              <h3>General Device</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-xs-3"></div>
              <div class="col-xs-6">
                <table id="tGeneralDevice" class="table table-striped table-hover" style="width: 100%">
                  <thead>
                  <tr>
                    <th class="col-md-2" style="text-align:center">No</th>
                    <th class="col-md-5" style="text-align:center">Device Name</th>
                    <th class="col-md-5" style="text-align:center">MAC Address</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($tGeneralDevice as $trd){
                        echo '
                            <tr>
                              <td style="text-align:center; vertical-align:middle;"></td>
                              <td style="text-align:center; vertical-align:middle;">'.$trd->mname.'</td>
                              <td style="text-align:center; vertical-align:middle;">'.$trd->maddress.'</td>
                            </tr>
                        ';
                      }
                    ?>
                  </tbody>
                </table>
                <br>
                <a class="btn btn-primary" href="<?php echo config_item('base_url');?>device/add" role="button" style="float: right;">Add New Device</a>
              </div>
              <div class="col-xs-3"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-header" style="text-align: center;">
              <h3>Employee Device</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <div class="col-xs-3"></div>
              <div class="col-xs-6">
                <table id="tEmployeeDevice" class="table table-striped table-hover" style="width: 100%">
                  <thead>
                  <tr>
                    <th class="col-md-1" style="text-align:center">No</th>
                    <th class="col-md-3" style="text-align:center">Name</th>
                    <th class="col-md-3" style="text-align:center">NIP</th>
                    <th class="col-md-2" style="text-align:center">Device Name</th>
                    <th class="col-md-3" style="text-align:center">MAC Address</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($tEmployeeDevice as $trd){
                        echo '
                            <tr>
                              <td style="text-align:center; vertical-align:middle;"></td>
                              <td style="text-align:center; vertical-align:middle;">'.$trd->pname.'</td>
                              <td style="text-align:center; vertical-align:middle;">'.$trd->pnip.'</td>
                              <td style="text-align:center; vertical-align:middle;">'.$trd->mname.'</td>
                              <td style="text-align:center; vertical-align:middle;">'.$trd->maddress.'</td>
                            </tr>
                        ';
                      }
                    ?>
                  </tbody>
                </table>
                <br>
                <a class="btn btn-primary" href="<?php echo config_item('base_url');?>device/add_employee" role="button" style="float: right;">Add New Device</a>
              </div>
              <div class="col-xs-3"></div>
            </div>
            <!-- /.box-body -->
            <br>
            <br>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

