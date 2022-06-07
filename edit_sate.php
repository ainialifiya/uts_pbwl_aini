<?php

// Memanggil Koneksi
require_once "koneksi.php";

if (isset($_GET['id_sate'])) {

      // Inisialisasi
      $id_sepatu = $_GET['id_sate'];

      //SQL
      $sql = "SELECT * FROM sate WHERE id_sate=:id_sate";

      //bindParam
      $stmt = $koneksi->prepare($sql);
      $stmt->bindParam(":id_sate", $id_sate);
      $stmt->execute();

      //array
      $row = $stmt->fetch();
}

if (isset($_POST['simpan'])) {

      // Inisialisasi
      $nama_sepatu = $_POST['nama_sate'];
      $merk_sepatu = $_POST['jenis_sate'];
      $harga = $_POST['harga'];

      //SQL
      $sql = "UPDATE sate SET nama_sate=:nama_sate, jenis_sate=:jenis_sate, harga=:harga WHERE id_sate=:id_sate";

      //bindParam
      $stmt = $koneksi->prepare($sql);
      $stmt->bindParam(":nama_sate", $nama_sate);
      $stmt->bindParam(":jenis_sate", $jenis_sate);
      $stmt->bindParam(":harga", $harga);
      $stmt->bindParam(":id_sate", $id_sate);
      $stmt->execute();

      //kembali ke tampil
      header("location:data_pembeli.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta nama_sepatu="viewport" content="wid_sepatuth=device-wid_sepatuth, initial-scale=1.0">
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

    <h2>Edit Sate</h2> </br>
 
       <form method="post" action="">
            <table>
                  <tr>
                        <td>Nama Sate </td>
                        <td>:</td>
                        <td><input type="text" name="nama_sate" value="<?php echo $row['nama_sate']; ?>"></td>
                  </tr>
<tr>
    <td>&nbsp;</td>
    </tr>                  
                  <tr>
                        <td>Jenis Sate </td>
                        <td>:</td>
                        <td><input type="text" name="jenis_sate" value="<?php echo $row['jenis_sate']; ?>"></td>
                  </tr>
<tr>
    <td>&nbsp;</td>
    </tr>                  
                  <tr>
                        <td>Harga Sate </td>
                        <td>:</td>
                        <td><input type="text" name="harga" value="<?php echo $row['harga']; ?>"></td>
                  </tr>
<tr>
    <td>&nbsp;</td>
    </tr>                                                       
                  <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" name="simpan" value="SIMPAN"></td>
                  </tr>
            </table>
      </form>


    </div>

    <footer class="kaki">
        <br><br>
        <p>&copy; ainialifiya</p>
    </footer>
</body>
</html>