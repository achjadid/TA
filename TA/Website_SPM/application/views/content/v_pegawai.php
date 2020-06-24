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
        <li><a href="<?php echo base_url();?>activity"><i class="fa fa-dashboard"></i>Activity</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>Employee List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="tEmployee" class="table table-striped table-hover">
                <thead>
                <tr>
                  <th class="col-md-1" style="text-align:center">No</th>
                  <th class="col-md-1">NIP</th>
                  <th class="col-md-7">Nama</th>
                  <th class="col-md-3">Email</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    foreach($tEmployee as $emp){
                      echo '
                          <tr>
                            <td style="text-align:center; vertical-align:middle;"></td>
                            <td style="vertical-align:middle"><a href="'.base_url('employee/detail/'.$emp->p_id).'">'.$emp->p_nip.'</a></td>
                            <td style="vertical-align:middle"><a href="'.base_url('employee/detail/'.$emp->p_id).'">'.$emp->p_name.'</a></td>
                            <td style="vertical-align:middle;">'.$emp->p_email.'</td>
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

