<?php 

include ('Koneksi.php');
$key = $_GET['key'];
$pk = $_POST['kode_produk'];
$nama_produk = $_POST['nama_produk'];
$harga_produk = $_POST['harga_produk'];
$satuan = $_POST['satuan'];
$kategori = $_POST['kategori'];
$gambar = $_POST['gambar'];
$stok = $_POST['stok'];


$result = $con->query ("UPDATE `master` SET `nama_produk` = '$nama_produk', `harga_produk` = '$harga_produk', `satuan` = '$satuan', `kategori` = '$kategori', `gambar` = '$gambar', `stok` = '$stok' WHERE `master`.`kode_produk` = $pk;");

if ($result==TRUE){
    echo "Data berhasil diubah";
    header("location:form.php?info=edit");
}else{
    echo "Maaf data gagal diubah";
}

?>