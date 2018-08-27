<?php
//kode negara dapat dilihat pada tabel parameter
//kode negara baru ada 10 Negara
//dapat dilihat pada syntax select * from parameter WHERE param1="nomor"
include ("../koneksi.php");

function read_no($conn,$dbname,$nomor){
  $digawalnol=substr($nomor,0,1);
  $digawal=substr($nomor,1,1);
  $digInti=substr($nomor,1);
  $brpDig=strlen($digInti);

  if ($digawalnol == "0") {
    if ($digawal == "8") {
      $ambkode = mysqli_query($conn, "select * from parameter WHERE param1='nomor' and param3='$digawal'");
      while ($data=mysqli_fetch_array($ambkode)){
        $kode = $data[1];
        $negara = $data[3];
      }
    } else {
      $ambkode = mysqli_query($conn, "select * from parameter WHERE (param1='nomor' and param3='$digawal') and param4='$brpDig'");
      while ($data=mysqli_fetch_array($ambkode)){
        $kode = $data[1];
        $negara = $data[3];
      }
    }
    $nomorba=$kode.$digInti;
    return $nomorba." dari negara ".$negara."<br>";
  } else {
    return "Maaf, nomor yang anda masukkan salah. Mohon ulangi";
  }
}
/*
  untuk test nomor dari luar negeri dapat memakai syntax :
  select no_wa from pengguna where no_wa not like "08%"
*/
/*
echo read_no($conn,$dbname,"0983370134");
echo read_no($conn,$dbname,"0199761897");
echo read_no($conn,$dbname,"01123456320");
echo read_no($conn,$dbname,"0535410131");
echo read_no($conn,$dbname,"01133745700");
echo read_no($conn,$dbname,"0535052627");
echo read_no($conn,$dbname,"01112643390");
echo read_no($conn,$dbname,"0283807787957");
echo read_no($conn,$dbname,"085771111776");
*/
?>
