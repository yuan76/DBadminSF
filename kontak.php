<br> <br>
    <section class="content-header">
      <h1>
        List Member Baru
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <form method="post" action="php/buatVcf.php?file=contact.vcf" enctype="multipart/form-data">
        <?php
        include "koneksi.php";
        include "php/readNope.php";
        error_reporting(0);

        $qry = mysqli_query($conn,"select nama_dpn,nama_blk,username,no_wa,tgl_lunas,referal FROM pengguna WHERE email is null and tgl_lunas is not null order by nama_dpn asc, nama_blk asc");
        echo "<div class='table-responsive'>
              <div class='col-xs-10'>
              <table class='table table-striped'>
              <thead class='list'> <tr> <td> Nama </td> <td> Username </td> <td> Nomor HP </td> <td> Tanggal Lunas </td> <td> Referal </td> <td> Pilih </td> </tr> </thead> <tbody>";
        while ($data=mysqli_fetch_row($qry)){
          echo "<tr> <td> ".$data[0]." ".$data[1]."</td> <td>".$data[2]."</td> <td>".$data[3]."</td> <td>".$data[4]."</td> <td>".$data[5]."</td> <td> <input type='checkbox' name='user_list[]' value='".$data[2]."'> </td> </tr>";
        }
        echo "</tbody> </table> </div> </div>";
        ?>
      	<div class="form-group row">
			 <input type="submit" class="pull-right btn btn-warning" id="create" name="submit" value="Download VCard" />
		 </div>
      </form>


        </section>
