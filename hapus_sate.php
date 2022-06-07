<?php

// Memanggil Koneksi
require_once "koneksi.php";

if (isset($_GET['id_sate'])) {

      // Inisialisasi
      $id_sepatu = $_GET['id_sate'];

      //SQL
      $sql = "DELETE FROM sate WHERE id_sate=:id_sate";

      //bindParam
      $stmt = $koneksi->prepare($sql);
      $stmt->bindParam(":id_sate", $id_sate);
      $stmt->execute();

      //array
      $success =  "Data berhasil dihapus!";
      header("location:sepatu.php");

}


?>

<p><?php echo $success; ?></p>
