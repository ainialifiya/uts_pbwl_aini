<?php

if (isset($_POST['simpan'])) {

      // Memanggil Koneksi
      require_once "koneksi.php";

      // Inisialisasi
      $id_sepatu = $_POST['id_sate'];
      $id_kategori = $_POST['id_kategori'];
      $nama_pembeli = $_POST['nama_pembeli'];

      //SQL
      $sql = "INSERT INTO penjualan (id_sate, id_kategori, nama_pembeli) VALUES (:id_sate, :id_kategori, :nama_pembeli)";

      //bindParam
      $stmt = $koneksi->prepare($sql);
      $stmt->bindParam(":id_sate", $id_sate);
      $stmt->bindParam(":id_kategori", $id_kategori);
      $stmt->bindParam(":nama_pembeli", $nama_pembeli);
      $stmt->execute();

      //kembali ke tampil
      header("location:penjualan_sate.php");
}

?>
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
            </ul>        </div>
    </header>
</div>
<div class="mainc garis">

    <h2>Input Data Penjualan</h2> </br>
 
       <form method="post" action="">
            <table>
                  <tr>
                        <td>Nama Pembeli </td>
                        <td>:</td>
                        <td><input type="text" name="nama_pembeli" style="width:190px;"></td>
                  </tr> 
<tr>
    <td>&nbsp;</td>
    </tr>                                   
                  <tr>
                        <td>Sate </td>
                        <td>:</td>
                        <td>
            <select name="id_sate" style="width:190px;">
                <option value="">Pilih Nama Sate</option>
                    <?php
                                require_once "koneksi.php";
                                $sql1 = "SELECT * FROM sate";
                                $stmt = $koneksi->prepare($sql1);
                                $stmt->execute();

                                if($stmt != ''){
                                    while($data = $stmt->fetch(PDO::FETCH_NUM))  {
                                ?>
                                        <option value="<?php echo $data[0]?>"><?php echo $data[1]?> Harga : Rp<?php echo number_format($data[3], 0, ',', '.');?>,- </option>
                                <?php

                                    }
                                } else{
                                    echo "Data tidak ada";
                                }

                        ?>
            </select>
 
                        </td>
                  </tr>
<tr>
    <td>&nbsp;</td>
    </tr>                    
                  <tr>
                        <td>Sate </td>
                        <td>:</td>
                        <td>
            <select name="id_kategori" style="width:190px;">
                <option value="">Pilih Nama Sate</option>
                    <?php
                                require_once "koneksi.php";
                                $sql1 = "SELECT * FROM kategori";
                                $stmt = $koneksi->prepare($sql1);
                                $stmt->execute();

                                if($stmt != ''){
                                    while($data = $stmt->fetch(PDO::FETCH_NUM))  {
                                ?>
                                        <option value="<?php echo $data[0]?>"><?php echo $data[1]?> </option>
                                <?php

                                    }
                                } else{
                                    echo "Data tidak ada";
                                }

                        ?>
            </select>
 
                        </td>
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

    <footer class="makanan">
        <br><br>
        <p>&copy; 2022 aini</p>
    </footer>
</body>
</html>