<?php

// Memanggil Koneksi
require_once "koneksi.php";

//SQL
$sql = "SELECT * FROM penjualan JOIN sate ON sate.id_sate=penjualan.id_sate JOIN kategori ON kategori.id_kategori=penjualan.id_kategori";

//Prepare
$stmt = $koneksi->prepare($sql);
$stmt->execute();

?>
<style>
    table{
        background-color: white;
        border-spacing: 1;
        margin: 10px;
        position: relative;
        
        width: 80%;
    }
        table th{

        margin: 0;
        height: 50px;
        font-family: 'Be Vietnam Pro', sans-serif;
    }
        table td{
            text-align: center;
        font-family: 'Be Vietnam Pro', sans-serif;
        padding: 10px;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="garis">
    <header class="kepala">
        <div class="clearfix">
            <div class="logo">
                <h1>WARUNG SATE PADANG DAN KACANG</h1>
            </div>

        </div>
        <div class="bagian-bawah">
            <ul class="menu">
                <li><a href="sate.php">Sate</a></li>
                <li><a href="penjualan_sate.php">Penjualan Sate</a></li>
                <li><a href="index.php" style="position: relative;left: 900px;"><font color="red">Logout</font></a></li>
            </ul>
        </div>
    </header>
</div>
<div class="mainc garis">

    <h2>Data Penjualan Sate</h2> </br><a href="input_penjualan.php">Input Penjualan Sate</a></br></br>
      
      <table border="1">
            <tr>

                  <th>No</th>
                  <th>Nama Pembeli</th>
                  <th>Rasa Yang Dibeli</th>
                  <th>Kategori Sate</th>
                  <th>Harga Sate</th>
                  <th>Total</th>
                  <th colspan="2">Aksi</th>
                 
            </tr>
            <?php 
            $no =1;

            while ($row = $stmt->fetch()) {  
                ?>
                  <tr>
                        <td><?= $no++?>.</td>
                        <td><?php echo $row['nama_pembeli']; ?></td>
                        <td><?php echo $row['nama_sate']; ?></td>
                        <td><?php echo $row['kategori']; ?></td>
                        <td>Rp<?php echo number_format($row['harga'], 0, ',', '.');?>,-</td>
                        <td>Rp<?php echo number_format($row['harga'], 0, ',', '.');?>,-</td>                        
                        <td><a href="hapus_penjualan.php?id_penjualan=<?php echo $row['id_penjualan']; ?>">Hapus</a></td>                        
                  </tr>
            <?php } ?>

      </table>


    </div>

    <footer class="makanan">
        <br><br>
        <p>&copy; ainialifiya</p>
    </footer>
</body>
</html>