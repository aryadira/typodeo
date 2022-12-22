<?php
  // SESSION
  session_start(); 

  if(!isset($_SESSION['login'])) {
    header("location: login/login.php");
    exit;
  }

  include "conf/info.php";
  $title="Popular Movies";
  include_once "templates/header.php";
  include_once "links/link_style.php"; 
?>
  <div class="container">

    <h2>Popular Movies</h2>
      <div class="line"></div>
      <div class="grp">
        <?php
          include_once "api/api_popular.php";
          foreach($popular->results as $p){
            echo '<div class="card"><a href="movie.php?id=' . $p->id . '"><img src="'.$imgurl_1.''. $p->poster_path . '" loading="lazy"><h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4><h6>Rate : " . $p->vote_average . " | Vote : " . $p->vote_count . "</h6> <h6 class='release'> Popularity : " . round($p->popularity) . "</h6></a></div>";
          }
        ?>
      </div>

  </div>
    

<?php
  include_once "templates/footer.php";
?>