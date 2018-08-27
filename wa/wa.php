<?php
	//error_reporting(0);

	include "../koneksi.php";
	include "readNope.php";
	
	$nama=strtolower($_GET['nama']);
	//$nama="elvi";	
    $qry = mysqli_query($conn,"select no_wa,gender,nama_dpn FROM pengguna WHERE username='$nama'");
		
	while ($data=mysqli_fetch_row($qry)){
		$nope=$data[0];		
		$jk=$data[1];		
		$namadep=$data[2];		
	}
	//echo $nope;
	
	$nopeba=substr(read_no($conn,$dbname,$nope),1);
	if (strtolower($jk) == "female"){
		$jkbaru="bu";
	} else {
		$jkbaru="pak";
	}
	$namadepbaru=strtolower($namadep);
	//echo $nopeba;

//$nopeba="919759700424";
//$nopeba="992983370134";
	header("Location: https://api.whatsapp.com/send?phone=$nopeba&text=Assalamualaikum,%20$jkbaru%20$namadepbaru");

?>