<?php
  // SESSION
  session_start(); 

  if(!isset($_SESSION['login'])) {
    header("location: login/login.php");
    exit;
  }

  include "conf/info.php";

  $id_movie = $_GET['id'];
  include_once "api/api_movie_id.php";
  include_once "api/api_movie_video_id.php";
  include_once "api/api_movie_similar.php";
  $title = "Detail Movie (" . $movie_id->original_title . ")";
  include_once "templates/header.php";
  include_once "links/link_style.php"; 
  include_once "links/link_ticket.php";

?>

<?php
if (isset($_GET['id'])) {
  $id_movie = $_GET['id'];
?>
  <div class="container">

    <h1><?php echo $movie_id->original_title ?></h1>
    <?php
    echo "<h5>" . $movie_id->tagline . "</h5>";
    ?>

    <div class="line"></div>
    <div class="tic_grp">
      <div class="tic_img">
        <img src="<?php echo $imgurl_2 ?><?php echo $movie_id->poster_path ?>">
      </div>

      <div class="tic_time">
        <div class="tic_bar_time">

        </div>
      </div>

      <div class="tic_kurs_grp">
        <div class="tic_bar_grp">
            <?php
            
              for($i = 1; $i <= 50; $i++ ) : ?>
                <div class="tic_bar">
                    <!-- <input type="checkbox"> -->
                  <?= $i ?>
                </div>
            <?php endfor; ?>
        </div>

        <div class="tic_bar_grp">
              <?php
              
                for($i = 51; $i <= 100; $i++ ) : ?>
                  <div class="tic_bar">
                    <!-- <input type="checkbox" onclick="check()"> -->
                    <?= $i ?>
                  </div>
                
              <?php endfor; ?>
        </div>
      </div>
    </div>

    <div class="line"></div>

  </div>

<?php
} else {
  echo "<h5>Movie tidak ditemukan.</h5>";
}
?>

<script>

  // const btn = document.querySelector('.tic_bar');
  // const check = document.querySelector('input');
  

</script>
