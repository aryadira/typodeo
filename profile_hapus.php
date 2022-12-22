<?php include "koneksi/koneksi.php"; ?>

<?php 

    $query = $connect->query("SELECT * FROM users WHERE id ='".$_GET['hapus']."'");
    $pecah = $query->fetch_assoc();

    $hapus = $connect->query("DELETE FROM users WHERE id = '$_GET[hapus]'");

    echo "<script> alert('Akun telah terhapus??); </script>";
    echo "<script> location='landpage.php';</script>";

?>




