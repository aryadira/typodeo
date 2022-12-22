<?php
// SESSION

include "../koneksi/koneksi.php";
include_once "../links/link_bootstrap.php";

if (!isset($_SESSION['admin'])) {
  echo "<script>alert('Anda Harus Login');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}

include "../conf/info.php";
$title = "Now Playing Movies";
?>

<?php
include_once "../api/api_now.php";

foreach ($nowplaying->results as $p) {
  $id_now_playing = $p->id;
  $title = $p->original_title;
  $release = $p->release_date;
  $rate = $p->vote_average;

  $query = $connect->query("SELECT * FROM now_playing WHERE id_now_playing = '$id_now_playing'");
  $insert = $connect->query("INSERT INTO now_playing (id_all, id_now_playing, judul_now_playing, release_now_playing, rate_now_playing) VALUES ('', '$id_now_playing', '$title', '$release', '$rate')");
}


?>
<!--  -->
<div class="container">
  <h2 class="text-center mb-3">Data Now Playing Movies </h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>ID</th>
        <th>Judul</th>
        <th>Release</th>
        <th>Rate</th>
        <th>Aksi</th>
        <!-- <th>All Result</th> -->
        <!-- <th>Aksi</th> -->
      </tr>
    </thead>
    <tbody>
      <?php $nomor = 1; ?>
      <?php $ambil = $connect->query("SELECT * FROM now_playing"); ?>
      <?php while ($fetch = $ambil->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $nomor; ?></td>
        <td><?= $fetch['id_now_playing'];
              ?></td>
        <td><?= $fetch['judul_now_playing'];
              ?></td>
        <td><?= $fetch['release_now_playing'];
              ?></td>
        <td><?= $fetch['rate_now_playing'];
              ?></td>
        <td>
          <form action="crud-movies/add_movies.php?id_movies=<?= $fetch['id_all']; ?>" method="POST">
            <button type="submit" name="add" class="btn btn-primary" style="margin:10px 0;">Add to User</button>
          </form>

          <a href="" name="btn" class="btn btn-danger" style="margin:10px 0;">Delete from User</a>
        </td>
      </tr>
      <?php $nomor++; ?>
      <?php } ?>
    </tbody>
  </table>

</div>