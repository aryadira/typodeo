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


?>

<div class="container">
<h2>Ubah Data Pelanggan</h2>
<form action="" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama">Nama</label>
    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $pecah['nama']; ?>">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="form-control" value="<?php echo $pecah['username']; ?>">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control" value="<?php echo $pecah['email']; ?>">
  </div>

  <button class="btn btn-primary" name="ubah">Ubah</button>
</form>
</div>

<?php
if(isset($_POST['ubah']))
{  
    $connect->query("UPDATE users SET 
      nama = '$_POST[nama]', 
      email = '$_POST[email]',
      username = '$_POST[username]' WHERE id = '$_GET[id]'");

  echo "<script> alert('Data User Telah DiUbah'); </script>";
  echo "<script> location='index.php?halaman=users'; </script>";
}
?>