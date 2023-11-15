<!DOCTYPE html>
<html>
<head>
    <title>PRODUK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama_produk=input($_POST["nama_produk"]);
        $keterangan=input($_POST["keterangan"]);
        $harga=input($_POST["harga"]);
        $jumlah=input($_POST["jumlah"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into produk (nama_produk,keterangan,harga,jumlah) values
		('$nama_produk','$keterangan','$harga','$jumlah')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" class="form-control" placeholder="Masukan Nama Produk" required />

        </div>
        <div class="form-group">
            <label>Keterangan:</label>
            <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan" required/>
        </div>
       <div class="form-group">
            <label>Harga:</label>
            <input type="text" name="harga" class="form-control" placeholder="Masukan Harga" required/>
        </div>
                </p>
        <div class="form-group">
            <label>Jumlah:</label>
            <input type="text" name="jumlah" class="form-control" placeholder="Masukan Jumlah" required/>
        </div>       

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>