<?php

session_start();

include "koneksi/koneksi.php";
include_once "links/link_profile.php";

// PROCESS
if (isset($_GET['id'])) {
  $query = $connect->query("SELECT * FROM users WHERE username ='" . $_SESSION['username'] . "'");
  $pecah = $query->fetch_assoc();
}

?>

<div class="container_profile">
  <div class="logo">
    <div class="profile_edit">
      <div class="toplef">
        <a href="profile.php?id=<?= $pecah['id']; ?>">
          <i class="ri-arrow-left-line"></i>
        </a>
      </div>

      <div class="profile_photo">
        <img src="foto_profile/<?php echo $pecah['foto_doang']; ?>">
        <!-- <form method="POST" enctype="multipart/form-data">
          
        </form> -->
      </div>

      <form method="POST" class="profile_form" enctype="multipart/form-data">
        <ul>
          <label for="">Nama</label>
          <li>
            <input type="text" name="nama" placeholder="Edit Nama" value="<?php echo $pecah['nama'] ?>" required>
          </li>
          <label for="">Username</label>
          <li>
            <input type="text" name="username" placeholder="Edit Username" value="<?php echo $pecah['username'] ?>" required>
          </li>
          <label for="">Email</label>
          <li>
            <input type="email" name="email" placeholder="Edit Email" value="<?php echo $pecah['email'] ?>" required>
          </li>
          <label for="">Foto Profile</label>
          <li>
            <input type="file" name="infoto" required>
          </li>
          <button type="submit" name="edit">Update</button>
        </ul>

      </form>

    </div>


  </div>

</div>

<?php

if (isset($_POST['edit'])) {
  $direktori    = "foto_profile/";
  $nama_foto    = $_FILES['infoto']['name'];
  $lokasi       = $_FILES['infoto']['tmp_name'];
  $result_file  = move_uploaded_file($lokasi, $direktori . $nama_foto);

  if (!$result_file) {
    return false;
  }

  $update = $connect->query("UPDATE users SET nama = '$_POST[nama]', username = '$_POST[username]', email = '$_POST[email]', foto_doang = '$nama_foto' WHERE id = '" . $_GET['id'] . "' ");

  if ($update) {
    $_SESSION['username'] = $_POST['username'];

    header("refresh:1;");
  } else {
    echo "<script> alert('Data gagal diubah deck!'); </script>";
  }
}

?>