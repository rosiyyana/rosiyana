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

<?php 
include('Koneksi.php');
$pk = $_GET['key'];
$result = $con->query("SELECT * FROM `master` WHERE `kode_produk`= $pk ");
foreach ($result as $data);{
?>

<div class="container">
    <div class="card mt-4">
    <div class="card-header bg-primary text-white"><center><b>FORM   INPUT   MASTER   &   BARANG</b></center></div>
    <div class="card-body">   
    
     <form action="simpan_edit.php" method="post">
     
    <div class="form-group">
            <label for="exampleInputEmail1">Nama Produk</label>
            <input type="hidden" class="form-control" name="kode_produk" placeholder="Kode Produk" value="<?php echo $data['kode_produk']; ?>">
            <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" value="<?php echo $data['nama_produk']; ?>">
    </div>

    <div class="form-group">
            <label for="exampleInputEmail1">Harga Produk</label>
            <input type="number" class="form-control" name="harga_produk" placeholder="Rp.0" value="<?php echo $data['nama_produk']; ?>">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Satuan Produk</label>
                <select class="form-control" name="satuan" id="">
                    <option value="">Pilih...</option>
                    <option value="Pieces" <?php if ($data ['satuan']=="Pieces"){ echo "selected=selected" ; } ?>>Pieces</option>
                    <option value="Box" <?php if ($data ['satuan']=="Box"){ echo "selected=selected" ; } ?>>Box</option>
                    <option value="DLL" <?php if ($data ['satuan']=="DLL"){ echo "selected=selected" ; } ?>>DLL</option>
                    
                </select>
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Kategori Produk</label>
                <select class="form-control" name="kategori" id="">
                    <option value="">Pilih...</option>
                    <option value="makanan" <?php if ($data ['kategori']=="makanan"){ echo "selected=selected" ; } ?>>Makanan</option>
                    <option value="minuman" <?php if ($data ['kategori']=="minuman"){ echo "selected=selected" ; } ?>>Minuman</option>
                    <option value="dll" <?php if ($data ['kategori']=="dll"){ echo "selected=selected" ; } ?>>Dan lain-lain</option>
                </select>
    </div>
 
    <div class="form-group">
        <label for="exampleInputEmail1">Gambar Produk</label>
        <input type="url" class="form-control" name="gambar" placeholder="Masukan link" value="<?php echo $data['gambar']; ?>" >
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Stok Produk</label>
        <input type="number" class="form-control" name="stok" placeholder="0" value="<?php echo $data['stok']; ?>">
    </div>

    
    <center> <button type="submit" class="btn btn-info"><a href="simpan_edit.php"></a> Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button></center>   

</div>
<?php } ?>   
</form>
</div>
</body>
</html>