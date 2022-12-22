<?php

session_start();

include "koneksi/koneksi.php";
include_once "links/link_profile.php";
include_once "api/api_toprated.php";

// PROCESS
$movie_id = $_GET['id'];

if (isset($movie_id)) {
  $query = $connect->query("SELECT * FROM users WHERE username ='" . $_SESSION['username'] . "'");
  $pecah = $query->fetch_assoc();
}

?>

<body>
  <div class="toplef">
    <a href="index.php?id=<?= $_GET['id']; ?>">
      <- </a>
        <h3><?= $pecah['nama']; ?></h3>
        <?php //var_dump($_SESSION['id']); 
        ?>
  </div>

  <div class="container_profile">

    <div class="profile">

      <div class="profile_detail">
        <!-- left -->
        <div class="profile_detail_left">
          <img src="foto_profile/<?php echo $pecah['foto_doang']; ?>" alt="">
        </div>

        <!-- right -->
        <div class="profile_detail_right">

          <div class="group_profile_detail_right">

            <div class="profile_username">
              <p><?= $pecah['username']; ?></p>
              <p><?= $pecah['email']; ?></p>
            </div>

            <div class="profile_edit_btn">
              <a href="profile_edit.php?id=<?php echo $pecah['id'] ?>">
                <li>Edit Profile</li>
              </a>
              <a href="profile_hapus.php?hapus=<?php echo $pecah['id'] ?>">
                <li>Hapus Akun</li>
              </a>
            </div>

          </div>

        </div>

      </div>

    </div>

    <div class="history">
      <p class="title">Riwayat Menonton </p>
      <!-- <pre>><?php // print_r($_SESSION)
                  ?></pre> -->

      <?php
      $id_akun = $_SESSION['akun']['id'];
      $query_history = $connect->query("SELECT * FROM history WHERE id = '$id_akun'");

      ?>
      <div class="history_group_bar">
        <?php // var_dump($fetch_history) 
        ?>
        <?php while ($fetch_history = $query_history->fetch_assoc()) { ?>
        <div class="history_bar">
          <div class="frst">
            <!-- <img src="http://image.tmdb.org/t/p<?php // echo $fetch_history['foto_film']
                                                      ?>"> -->
            <h4><?php echo $fetch_history['nama_film'] ?></h4>
          </div>
          <div class="sec">
            <p><?php echo $fetch_history['waktu_film'] ?></p>
            <a href="del_history.php?del=<?php echo $fetch_history['id_movies']; ?>"><img src="image/close-line.png"
                alt=""></a>
          </div>
        </div>
        <?php } ?>
      </div>

    </div>

    <!-- <div class="line"></div> -->

    <div class="profile_btn_crud">

      <a href="logout.php">
        <div class="profile_btn">Logout</div>
      </a>

      <a href="javascript:void(0)" onclick="openNav()">
        <div class="profile_btn">Tambahkan Akun</div>
      </a>

    </div>

  </div>

  <!-- overlay -->
  <div id="myNav" class="overlay">
    <div class="back" onclick="closeNav()"><i class="ri-close-line"></i></div>
    <div class="overlay-content">
      <form method="POST" enctype="multipart/form-data">
        <h4 align="center">Tambah Akun</h4>
        <ul>
          <label for="">Nama</label>
          <li>
            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap"
              autocomplete="off" required />
          </li>
          <label for="">Username</label>
          <li>
            <input type="text" class="form-control form-control-user" id="username" name="username"
              placeholder="Username" autocomplete="off" required />
          </li>
          <label for="">Email</label>
          <li>
            <input type="email" class="form-control form-control-user" id="email" name="email"
              placeholder="contoh@gmail.com" autocomplete="off" required />
          </li>
          <label for="">Password</label>
          <li>
            <input type="password" class="form-control form-control-user" id="password" name="password"
              placeholder="Password" autocomplete="off" required />
          </li>
          <label for="">Konfirmasi Password</label>
          <li>
            <input type="password" class="form-control form-control-user" id="password_confir" name="password_confir"
              placeholder="Konfirmasi password" autocomplete="off" required />
          </li>
          <button type="submit" name="tambah">Tambah</button>
        </ul>
      </form>
    </div>
</body>

<!-- PROSES CREATE -->
<?php

function tambah($data)
{
  global $connect;

  $nama            = htmlspecialchars(strtolower(stripslashes($data['nama'])));
  $username        = htmlspecialchars(strtolower(stripslashes($data['username'])));
  $email           = htmlspecialchars(strtolower(stripslashes($data['email'])));
  $password        = mysqli_real_escape_string($connect, $data['password']);
  $password_confir = mysqli_real_escape_string($connect, $data['password_confir']);

  // Mengecek apakah user sudah ada atau belum
  $result = $connect->query("SELECT * FROM users WHERE username = '$username'");

  $fetch = $result->fetch_assoc();

  if ($fetch) {
    echo "<script>alert('Username Sudah Ada!');</script>";
    return false;
  }


  // Cek Konfirmasi Password
  if ($password != $password_confir) {
    echo "<script>alert('Konfirmasi Password tidak sesuai!');</script>";
    return false;
  }

  // Enkripsi Password 
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Menambahkan user baru
  $connect->query("INSERT INTO users VALUES('', '$nama', '$username', '$email', '$password', '')");
  return mysqli_affected_rows($connect);
}


if (isset($_POST['tambah'])) {

  if (tambah($_POST) > 0) {
    echo "<script>alert('Data Berhasil ditambahkan!');</script>";
  } else {
    echo mysqli_error($connect);
  }
}


// HAPUS
if (isset($_POST['hapus'])) {
  $ambil = $koneksi->query("SELECT * FROM users WHERE id = '$_GET[id]'");
  $pecah = $ambil->fetch_assoc();

  $hapus = $koneksi->query("DELETE FROM users WHERE id = '$_GET[id]'");

  echo "<script> alert('pelanggan Terhapus'); </script>";
  echo "<script> location='index.php?halaman=pelanggan';</script>";
}

?>

<script>
function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
</script>