<?php

if(!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

$connect = mysqli_connect("localhost", "root", "", "typodeo");

if(!$connect)
{ 
  echo "<script>alert('Error Deck'); </script>";
}

$ambil = $connect->query("SELECT * FROM users WHERE id = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$hapus = $connect->query("DELETE FROM users WHERE id = '$_GET[id]'");

echo "<script> alert('User Terhapus'); </script>";
echo "<script> location='index.php?halaman=users';</script>";

?>