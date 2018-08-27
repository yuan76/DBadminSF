<?php
error_reporting(0);
include "../koneksi.php";
	if(isset($_POST['submit'])){		
		if(!empty($_POST['user_list'])){
			foreach($_POST['user_list'] as $item){			
			$Query = mysqli_query($conn,"select * FROM pengguna where username='$item'");
while ($data=mysqli_fetch_array($Query)){
  $File .= "BEGIN:VCARD
VERSION:2.1
N:".$data[nama_blk].";".$data[nama_dpn]."
FN:".$data[nama_dpn]." ".$data[nama_blk]."
TEL;CELL;VOICE:".$data[no_wa]."
REV:".date("Y").date("m").date("d")."T".date("m")."3834Z
END:VCARD
";
}
			}
		}
	
/*		
$File = "nama_dpn;nama_blk;nama_fb;no_wa;gender;email;tgl_exp;nominal;tgl_join;username;paytren_id;jaguar;referal;web_training;marketing;tgl_lunas;id;dna_id;dna_seq;dna_level;mlm_type
";
$Query = mysqli_query($conn,"select * FROM pengguna");
while ($data=mysqli_fetch_array($Query)){
$File .= $data[nama_dpn].";".$data[nama_blk].";".$data[nama_fb].";".$data[no_wa].";".$data[gender].";".$data[email].";".$data[tgl_exp].";".$data[nominal].";".$data[tgl_join].";".$data[username].";".$data[paytren_id].";".$data[jaguar].";".$data[referal].";".$data[web_training].";".$data[marketing].";".$data[tgl_lunas].";".$data[id].";".$data[dna_id].";".$data[dna_seq].";".$data[dna_level].";".$data[mlm_type]."
";
}
*/
	}


$a=file_put_contents("contact.vcf", $File);
/*
if ($a) {
  echo "<script> alert('Create Successful');
        window.location='../index.php?page=hal_kontak';
        </script>";
} else {
  echo "<script> alert('Create Failed');
        window.location='../index.php?page=hal_kontak';
        </script>";
}
*/
?>
<?php
if (!empty($_GET['file'])) {
  $fileName=basename($_GET['file']);
  $filePath=$fileName;
  if (file_exists($filePath)) {
    //Define header
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Cache-Control: public");
    header("Content-Transfer-Encoding: binary");

    // Read the file
    readfile($filePath);
    exit;
  }
}
?>
