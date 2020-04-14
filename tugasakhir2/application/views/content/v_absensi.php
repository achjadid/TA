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
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i>Absensi</a></li>
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
                  <?php if($stabsensi == 1){ ?>
                  <h2 style="font-size:xx-large"> Halo <b><?php echo $name; ?></b>, Anda sudah absen hari ini pada pukul</h2>
                  <span style="font-size:xxx-large; color: limegreen;"><?php echo $waktu; ?></span>
                  <?php } else { ?>
                  <h2 style="font-size:xx-large"> Halo, <b><?php echo $name; ?></b>, Anda belum absen hari ini.</h2>
                  <span style="font-size:xx-large">Anda dapat melakukan absensi dengan connect ke jaringan Wifi yang tersedia untuk Absensi</h2>
                  <?php }?>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <br>
            <br>
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

