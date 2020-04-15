<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>

<div class="container">
    <div class="card mt-4">
    <div class="card-header bg-primary text-white"><center><b>FORM   INPUT   MASTER   &   BARANG</b></center></div>
    <div class="card-body">   
        <form action="simpan_barang.php" method="post">
     
    <div class="form-group">
            <label for="exampleInputEmail1">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" placeholder="Nama Barang">
    </div>

    <div class="form-group">
            <label for="exampleInputEmail1">Harga Produk</label>
            <input type="number" class="form-control" name="harga_produk" placeholder="Rp.0">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Satuan Produk</label>
                <select class="form-control" name="satuan" id="">
                    <option value="">Pilih...</option>
                    <option value="Pieces">Pieces</option>
                    <option value="Box">Box</option>
                    <option value="DLL">DLL</option>
                </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Kategori Produk</label>
                <select class="form-control" name="kategori" id="">
                    <option value="">Pilih...</option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                    <option value="dll">Dan lain-lain</option>
                </select>
    </div>
 
    <div class="form-group">
        <label for="exampleInputEmail1">Gambar Produk</label>
        <input type="url" class="form-control" name="gambar" placeholder="Masukan link">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Stok Produk</label>
        <input type="number" class="form-control" name="stok" placeholder="0">
    </div>

    
    <center><button type="submit" class="btn btn-info"><a href="simpan_barang.php"></a> Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button></center>

    <!-- <div class="card-header bg-primary text-white"> <center>Rosiyana XI RPL 2</center> </div> -->
    </div>
<?php
include('Koneksi.php');

$result = $con->query(" SELECT * FROM `master` ");

?>

<table class="table">
  <thead class=" bg-primary text-white">
    <tr class="table-bordered">
        <th scope="col">Kode Produk</th>
        <th scope="col">Nama Produk</th> 
        <th scope="col">Harga Produk</th>
        <th scope="col">Satuan</th>
        <th scope="col">Kategori</th>
        <th scope="col">Gambar URL</th>
        <th scope="col">Stok</th>
        <th scope="col">Modify</th>
    </tr>
  </thead>
  <tbody>
    
<?php  foreach ($result as $data) { ?>

<tr>
  <td><?php echo $data['kode_produk']; ?></td>
  <td><?php echo $data['nama_produk']; ?></td>
  <td><?php echo $data['harga_produk']; ?></td>
  <td><?php echo $data['satuan']; ?></td>
  <td><?php echo $data['kategori']; ?></td>
  <td><?php echo $data['gambar']; ?></td>
  <?php if ($data['stok'] < 5) {?>

    <td bgcolor="red" style="color:white;"><?php echo $data['stok']; ?></td>
    
  <?php }else { ?>
    <td><?php echo $data['stok']; ?></td>

  <?php } ?>

  <td class="bg-warning">
     <a class="text-white" href="delete.php?key=<?php echo $data['kode_produk']; ?>">Delete</a>
  </td>
</tr>

<?php } ?>

  </tbody>
</table>

</table>


</form>

</body>
