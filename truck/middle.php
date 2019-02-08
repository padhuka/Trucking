<?php
                            include_once 'lib/config.php';?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="margin-left: -0px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php
                  $result = mysql_query("SELECT * FROM t_pegawai");
                  $num_rows = mysql_num_rows($result);
                  echo "<h3>".$num_rows."</h3>";
              ?>
              <p>Jumlah Pegawai</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="?p=pegawai" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                  $result = mysql_query("SELECT * FROM t_siswa_kelas");
                  $num_rows = mysql_num_rows($result);
                  echo "<h3>".$num_rows."</h3>";
              ?>

              <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="?p=siswa" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php
                  $result = mysql_query("SELECT sum(total_bayar) AS total FROM t_siswa_kewajiban_bayar ");
                  $htagih = mysql_fetch_array($result);
                  echo "<h3>".rupiah($htagih['total'])."</h3>";
              ?>

              <p>Jumlah Tagihan</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?p=wajib_bayar" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
               <?php
                  $result2 = mysql_query("SELECT sum(jml_bayar) AS tunggak FROM t_siswa_bayar ");
                  $htagih2 = mysql_fetch_array($result2);
                  echo "<h3>".rupiah($htagih['total']-$htagih2['tunggak'])."</h3>";
              ?>

              <p>Jumlah Tunggakan</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="?p=siswa_bayar" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->