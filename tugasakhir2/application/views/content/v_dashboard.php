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
              <h3 class="box-title">Monitoring</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tPengguna" class="table table-bordered table-striped table-hover" style="width: 100%;">
                <thead>
                <tr>
                  <th class="col-md-1" style="text-align:center">No</th>
                  <th class="col-md-7" style="text-align:center">Username</th>
                  <th class="col-md-2" style="text-align:center">Nama</th>
                  <th class="col-md-2" style="text-align:center">Email</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($tPengguna as $pgn){
                      echo '
                          <tr>
                            <td style="text-align:center; vertical-align:middle;"></td>
                            <td style="vertical-align:middle">'.$pgn->p_username.'</td>
                            <td style="vertical-align:middle">'.$pgn->p_name.'</td>
                            <td style="vertical-align:middle">'.$pgn->p_email.'</td>
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

