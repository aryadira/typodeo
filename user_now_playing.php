<?php
// SESSION
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login/login.php");
  exit;
}

include "conf/info.php";
$title = "User Now Playing Movies";
include_once "templates/header.php";
include_once "links/link_style.php";
?>

<div class="container">
  <h2>User Now Playing Movies</h2>
  <?php
  // include_once "api/api_now.php";
  // $min = date('d F Y', strtotime($nowplaying->dates->minimum));
  // $max = date('d F Y', strtotime($nowplaying->dates->maximum));
  // echo "
  //         <h5>From <span>" . $min . "</span> , until <span>" . $max . "</span></h5>";
  ?>
  <div class="line"></div>
  <div class="grp">
    <?php
    $ambil = $connect->query("SELECT * FROM show_data");
    while ($fetch = $ambil->fetch_assoc()) { ?>
    <div class="card">
      <a href="movie.php?id=<?= $fetch['id_movies']; ?>">
        <!-- <img src="" loading=" lazy"> -->
        <h4><?= $fetch['judul_movies']; ?></h4>
        <h6><?= $fetch['release_movies']; ?></h6>
        <h6><?= $fetch['rate_movies']; ?></h6>
      </a>
    </div>
    <?php
    }
    ?>
  </div>
</div>
</div>