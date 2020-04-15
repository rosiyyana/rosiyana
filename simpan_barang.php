<?php
include ('Koneksi.php');

$nama_produk = $_POST ['nama_produk'];
$harga_produk = $_POST ['harga_produk'];
$satuan = $_POST ['satuan'];  
$kategori = $_POST ['kategori'];
$gambar = $_POST ['gambar'];
$stok = $_POST ['stok'];

$result = $con->exec ("INSERT INTO `master` (`kode_produk`, `nama_produk`, `harga_produk`, `satuan`, `kategori` , `gambar` , `stok`) VALUES (NULL, '$nama_produk', '$harga_produk', '$satuan', '$kategori', '$gambar' ,'$stok')");

  echo $result;

  if ($result==TRUE) {
    echo "Data Berhasil Disimpan Ke DB !!";
    header("location:form.php");
  }else {
    echo "Data Gagal Disimpan Ke DB !!";
  }