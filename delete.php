<?php
include ('Koneksi.php');

$key = $_GET['key'];
$result = $con->query("DELETE FROM `master` WHERE `kode_produk` =$key ");
if ($result==TRUE) {
  echo "Data Berhasil Dihapus !!";
  header("location:form.php");
}else {
  echo "Data Gagal Dihapus !!";
}
 ?>
