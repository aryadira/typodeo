<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}

?>
<?php

include "conf/info.php";
$title = "Welcome to";
include_once "templates/header.php";
include_once "links/link_style.php";

?>
<!-- Layer Animation -->
<div class="layer">
  <img src="image/loading.gif" alt="">
</div>

<div class="container">
  <h2>Top Rated Movies</h2>

  <div class="line"></div>

  <div class="grp">
    <?php
    include_once "api/api_toprated.php";
    foreach ($toprated->results as $p) {
      echo '
              <div class="card">
                <a href="movie.php?id=' . $p->id . '">
                  <img src="http://image.tmdb.org/t/p/w500' . $p->poster_path . '" loading="lazy">
                  <h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4>
                  <h6>Rate : " . $p->vote_average . " |  Vote : " . $p->vote_count . "</h6>
                </a>
              </div>";
    }
    ?>
  </div>

</div>

<?php
include_once "templates/footer.php";
?>