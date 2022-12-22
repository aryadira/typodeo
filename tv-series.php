<?php
// SESSION
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login/login.php");
  exit;
}

include "conf/info.php";
$title = "TV Series";
include_once "templates/header.php";
include_once "links/link_style.php";
?>
<?php include_once "api/api_tv.php"; ?>
<div class="container">
  <h3>On Air TV Show</h3>
  <div class="line"></div>
  <div class="grp" style="margin-bottom: 30px;">
    <?php
    foreach ($tv_onair->results as $tp) {
      $dd = date('d F Y', strtotime($tp->first_air_date));
      echo '<div class="card"><a href="tvshow.php?id=' . $tp->id . '"><img src="' . $imgurl_2 . '' . $tp->poster_path . '" loading="lazy"><h4>' . $tp->original_name . '</h4><h6>' . $dd . '</h5><h6 class="release">Popularity : ' . round($tp->popularity) . '</h6></a></div>';
    }
    ?>
  </div>

  <h3>Top Rated TV Show</h3>
  <div class="line"></div>
  <div class="grp">
    <?php
    foreach ($tv_top->results as $tt) {
      $de = date('d F Y', strtotime($tt->first_air_date));
      echo '<div class="card"><a href="tvshow.php?id=' . $tt->id . '"><img src="' . $imgurl_2 . '' . $tt->poster_path . '"><h4>' . $tt->original_name . "</h4><h6>First Air Date : " . $tt->first_air_date . "</h6><h6 class='release'>Popularity : " . round($tt->popularity) . "</h6></a></div>";
    }
    ?>
  </div>
</div>




<?php
include_once "templates/footer.php";
?>