<html>
<head>
<title>Untitled Document</title>
</head>

<body>
<?php
error_reporting(0);
include ("../koneksi.php");

$user=strtolower($_POST['user']);

	$qryDetail=mysqli_query($conn, "select * FROM pengguna where LEFT(dna_id,(SELECT length(dna_id) from pengguna where lower(username)='$user'))=(select dna_id FROM pengguna where lower(username)='$user')");
	$qryTotal=mysqli_query($conn, "select sum(nominal) FROM pengguna where LEFT(dna_id,(SELECT length(dna_id) from pengguna where lower(username)='$user'))=(select dna_id FROM pengguna where lower(username)='$user')");

	echo "<div class='table-responsive'>
        <div class='col-xs-10'>
        <table class='table table-striped'>
        <thead> <tr> <td> Nama </td> <td> Nominal </td> <td> Username </td> </tr> </thead> <tbody>";
  while ($data=mysqli_fetch_array($qryDetail)){
    echo "<tr> <td> ".strtolower($data[nama_dpn])." ".strtolower($data[nama_blk])."</td> <td>".$data[nominal]."</td> <td>".$data[username]."</td> </tr>";
  }
  echo "</tbody> </table> </div> </div>";

	echo "<div class='table-responsive'>
				<div class='col-xs-10'>
				<table class='table table-striped'>
				<thead> <tr> <td> Total </td> </tr> </thead> <tbody>";
	while ($dataT=mysqli_fetch_row($qryTotal)){
		echo "<tr> <td> ".$dataT[0]."</td> </tr>";
	}
	echo "</tbody> </table> </div> </div>";
?>
</body>
</html>
