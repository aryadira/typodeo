<?php 

include "../koneksi/koneksi.php"; 
include "../links/link_bootstrap.php";

if(!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>

<link rel="stylesheet" href="css/style.css">

<body>
<div class="container">
<h2 class="text-center mb-3">Data Users</h2>
<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Email</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor = 1; ?>
    <?php $ambil = $connect->query("SELECT * FROM users");?>
    <?php while($pecah = $ambil->fetch_assoc()){ ?>
    <tr>
      <td><?php echo $nomor; ?></td>
      <td><?php echo $pecah['nama']; ?></td>
      <td><?php echo $pecah['username']; ?></td>
      <td><?php echo $pecah['email']; ?></td>
      <td>
        <a href="index.php?halaman=hapus_user&id=<?php echo $pecah['id']; ?>" class="btn-del" id="hapus">hapus</a>
        <a href="index.php?halaman=edit_user&id=<?php echo $pecah['id']; ?>" class="btn-add">ubah</a>
        <!-- <a href="index.php?halaman=beli&id=<?php echo $pecah['id']; ?>" class="btn btn-primary">beli</a> -->
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>

</div>
</body>
