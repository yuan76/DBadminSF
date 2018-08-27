<?php
include "koneksi.php";
$Qry1 = mysqli_query($conn,"select sum(nominal) from pengguna where date(tgl_lunas)=date(now())");
$data1 = mysqli_fetch_row($Qry1);
$Qry2 = mysqli_query($conn,"select count(nominal) from pengguna where date(tgl_lunas)=date(now())");
$data2 = mysqli_fetch_row($Qry2);
$Qry3 = mysqli_query($conn,"select sum(nominal) from pengguna where month(tgl_lunas)=month(date(now())) and year(tgl_lunas)=year(date(now()))");
$data3 = mysqli_fetch_row($Qry3);
$Qry4 = mysqli_query($conn,"select count(nominal) from pengguna where month(tgl_lunas)=month(date(now())) and year(tgl_lunas)=year(date(now()))");
$data4 = mysqli_fetch_row($Qry4);

$QryPyt1 = mysqli_query($conn,"select sum(nominal) from pengguna where date(tgl_lunas)=date(now()) and mlm_type='pyt'");
$pyt1 = mysqli_fetch_row($QryPyt1);
$QryPyt2 = mysqli_query($conn,"select sum(nominal) from pengguna where (month(tgl_lunas)=month(date(now())) and year(tgl_lunas)=year(date(now()))) and mlm_type='pyt'");
$pyt2 = mysqli_fetch_row($QryPyt2);

$QryEco1 = mysqli_query($conn,"select sum(nominal) from pengguna where date(tgl_lunas)=date(now()) and mlm_type='eco'");
$eco1 = mysqli_fetch_row($QryEco1);
$QryEco2 = mysqli_query($conn,"select sum(nominal) from pengguna where (month(tgl_lunas)=month(date(now())) and year(tgl_lunas)=year(date(now()))) and mlm_type='eco'");
$eco2 = mysqli_fetch_row($QryEco2);

$QryOri1 = mysqli_query($conn,"select sum(nominal) from pengguna where date(tgl_lunas)=date(now()) and mlm_type='ori'");
$ori1 = mysqli_fetch_row($QryOri1);
$QryOri2 = mysqli_query($conn,"select sum(nominal) from pengguna where (month(tgl_lunas)=month(date(now())) and year(tgl_lunas)=year(date(now()))) and mlm_type='ori'");
$ori2 = mysqli_fetch_row($QryOri2);

?>
<br> <br>
<section class="content-header">
  <h1>
    Halaman Utama
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <div class="small-box" style="background-color:#48c5a3; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><sup style="font-size: 18px">Rp. </sup>
            <?php if (isset($data1[0])) {
              echo $data1[0];
            } else {
              echo "0";
            }
            ?>
          </h3>

          <!--<p>Omset Hari Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>

        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Pendapatan Hari Ini
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box" style="background-color:#af9c8b; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><?php echo $data2[0]; ?><sup style="font-size: 18px"> Orang</sup></h3>

          <!--<p>Jumlah User Hari Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>

        <a href="#" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Jumlah User Hari Ini
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box" style="background-color:#4d80b4; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><sup style="font-size: 18px">Rp. </sup>
            <?php if (isset($data3[0])) {
              echo $data3[0];
            } else {
              echo "0";
            }
            ?>
          </h3>
          <!--<p>Omset Bulan Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Pendapatan Bulan Ini
        </div>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">
      <div class="small-box" style="background-color:#d7b127; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><?php echo $data4[0]; ?><sup style="font-size: 18px"> Orang</sup></h3>
          <!--<p>Jumlah User Bulan Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>

        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Jumlah User Bulan Ini
        </div>
      </div>
    </div>
  </div>

<div class="row">
  <section class="col-lg-8 connectedSortable">

    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-search"></i>

        <h3 class="box-title">Lihat Total Pendapatan</h3>
      </div>
      <div class="box-body">
        <form action="php/cari.php" method="post" id="FormCari">
          <div class="form-group">
            <input type="text" class="form-control" name="user" placeholder="Masukkan Username">
          </div>
          <div class="box-footer clearfix">
            <button type="button" class="pull-right btn btn-warning" id="search">Cari </button>
          </div>
        </form>
      </div>
    </div>

    <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-book"></i>
        <h3 class="box-title">Hasil</h3>
      </div>
      <div class="box-body" id="hasil">
      </div>
    </div>
	
	<!--
	 <div class="box box-warning">
      <div class="box-header">
        <i class="fa fa-search"></i>

        <h3 class="box-title">Link WhatsApp</h3>
      </div>
      <div class="box-body">
        <form action="wa/wa.php" method="get">
          <div class="form-group">
            <input type="type" class="form-control" name="nama" placeholder="Masukkan Username">
          </div>
          <div class="box-footer clearfix">
            <input type="submit" class="pull-right btn btn-info" value="Kirim">
          </div>
        </form>
      </div>
    </div>
	-->
	<form action="wa/wa.php" method="get">
            <input type="hidden" class="form-control" name="nama" placeholder="Masukkan Username">
			<input type="hidden" class="pull-right btn btn-info" value="Kirim">
    </form>
	
  </section>
  <section class="col-lg-4 connectedSortable">
    <div class="box box-danger">
      <div class="box-header">
        <i class="fa fa-money"></i>
        <h3 class="box-title">Pendapatan</h3>
      </div>
      <div class="box-body">

    <div class="col-lg-12">
      <div class="small-box" style="background-color:#83f0e5; color:#FFFFFF">
        <div class="inner" style="text-align:center;">
          <h3><sup style="font-size: 18px">Rp. </sup>
            <?php if (isset($pyt1[0])) {
              echo $pyt1[0];
            } else {
              echo "0";
            }
            ?>
          </h3>

          <!--<p>Omset Hari Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>

        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Pendapatan Paytren Hari Ini
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="small-box" style="background-color:#02c0c0; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><sup style="font-size: 18px">Rp. </sup>
            <?php if (isset($pyt2[0])) {
              echo $pyt2[0];
            } else {
              echo "0";
            }
            ?>
          </h3>

          <!--<p>Omset Hari Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>

        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Pendapatan Paytren Bulan Ini
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="small-box" style="background-color:#dbbb70; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><sup style="font-size: 18px">Rp. </sup>
            <?php if (isset($eco1[0])) {
              echo $eco1[0];
            } else {
              echo "0";
            }
            ?>
          </h3>
          <!--<p>Omset Bulan Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Pendapatan Eco Racing Hari Ini
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="small-box" style="background-color:#a3753a; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><sup style="font-size: 18px">Rp. </sup>
            <?php if (isset($eco2[0])) {
              echo $eco2[0];
            } else {
              echo "0";
            }
            ?>
          </h3>
          <!--<p>Omset Bulan Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Pendapatan Eco Racing Bulan Ini
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="small-box" style="background-color:#ff656d; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><sup style="font-size: 18px">Rp. </sup>
            <?php if (isset($ori1[0])) {
              echo $ori1[0];
            } else {
              echo "0";
            }
            ?>
          </h3>
          <!--<p>Omset Bulan Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Pendapatan Oriflame Hari Ini
        </div>
      </div>
    </div>

    <div class="col-lg-12">
      <div class="small-box" style="background-color:#cb2636; color:#FFFFFF">
        <div class="inner" style="text-align:center">
          <h3><sup style="font-size: 18px">Rp. </sup>
            <?php if (isset($ori2[0])) {
              echo $ori2[0];
            } else {
              echo "0";
            }
            ?>
          </h3>
          <!--<p>Omset Bulan Ini</p>-->
        </div>
        <!--
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        -->
        <div class="small-box-footer">
          Pendapatan Oriflame Bulan Ini
        </div>
      </div>
    </div>

      </div>
    </div>
  </section>
</div>





    </section>
