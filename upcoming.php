<?php
  // SESSION
  session_start(); 

  if(!isset($_SESSION['login'])) {
    header("location: login/login.php");
    exit;
  }

  include "conf/info.php";
  $title="On Cinemas Movies";
  include_once "templates/header.php";
  include_once "links/link_style.php"; 
?>
  <div class="container">
    <h2>On Cinema</h2>
      <?php
        include_once "api/api_upcoming.php";
        $min = date('d F Y', strtotime($upcoming->dates->minimum));
        $max = date('d F Y', strtotime($upcoming->dates->maximum));
        echo "<h5>Coming soon from <span>". $min . "</span> , until <span>" . $max . "</span></h5>";
      ?>
      <div class="line"></div>
      <div class="grp">
        <?php
          foreach($upcoming->results as $p){
            echo '
            <div class="card">
              <a href="movie.php?id=' . $p->id . '">
                <img src="'.$imgurl_1.''. $p->poster_path . '" loading="lazy">
                <h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4>
                <h6>
                Rate : " . $p->vote_average . " | Vote : " . $p->vote_count . " | Popularity : " . round($p->popularity) . "</h6>
                <p class='release'>Release : ". date('d F Y', strtotime($p->release_date)) . "</p>
              </a>
            </div>";
          }
        ?>
      </div>
  </div>
    

<?php
  include_once "templates/footer.php";
?>