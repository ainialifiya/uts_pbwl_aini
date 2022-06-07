<?php

// Memanggil Koneksi
require_once "koneksi.php";

//SQL
$sql = "SELECT * FROM sate";

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
    a {
        text-decoration: none;
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
                <li><a href="index.php"><font color="red" style="position: relative;left: 900px;">Logout</font></a></li>
            </ul>
        </div>
    </header>
</div>
<div class="mainc garis">

    <h2>Data Sate</h2> </br>
<a href="input_sate.php">Input Sate</a></br>
            
      <table border="1">
            <tr>

                  <th>No</th>
                  <th>Nama Sate</th>
                  <th>Jenis Sate</th>
                  <th>Harga Sate</th>
                  <th colspan="2">Aksi</th>
                 
            </tr>
            <?php 
            $no =1;
            while ($row = $stmt->fetch()) { ?>
                  <tr>
                        <td><?= $no++?>.</td>
                        <td><?php echo $row['nama_sate']; ?></td>
                        <td><?php echo $row['jenis_sate']; ?> </td>
                        <td>Rp<?php echo number_format($row['harga'], 0, ',', '.');?>,-</td>
                        <td><a href="edit_sate.php?id_sate=<?php echo $row['id_sate']; ?>">Edit</a></td>
                        <td><a href="hapus_sate.php?id_sate=<?php echo $row['id_sate']; ?>">Hapus</a></td>                        
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