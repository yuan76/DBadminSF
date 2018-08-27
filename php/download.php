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
