<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Device
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>device"><i class="fa fa-dashboard"></i> Device</a></li>
        <li class="active">Add Device</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if ($this->session->flashdata('device_tambah')) { ?>
    <div class="form-group">
      <div class="alert alert-success alert-primary alert-block">
      <?php echo $this->session->flashdata('device_tambah') ?>
      </div>
    </div>
    <?php } ?>
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add Device</h3>
               <a href="<?php echo base_url('device');?>"><button type="button" class="btn btn-md btn-primary" style="float: right;">Back</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" method="POST" action="<?php echo base_url('device/add') ?>">
                <div class="row">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Device Name</label>
                      <input type="text" class="form-control bradius" name="dname" placeholder="Device Name" required="">
                    </div>
                    <div class="form-group">
                      <label>MAC Address</label>
                      <input type="text" class="form-control bradius" name="macaddress" placeholder="00:00:00:00:00:00" maxlength="17" minlength="17" required="">
                    </div>
                    <br>
                    <div class="form-group">
                      <input type="Submit" class="btn btn-primary mt-10 btn-md" style="float:Right;" value="Submit" />
                    </div>
                  </div>
                  <div class="col-md-4"></div>
                </div>
              </form>
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

