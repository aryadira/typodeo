<?php
// SESSION
// session_start();

// if (!isset($_SESSION['login'])) {
//   header("location: login/login.php");
//   exit;
// }

include "conf/info.php";

$id_movie = $_GET['id'];
include_once "api/api_movie_id.php";
include_once "api/api_movie_video_id.php";
include_once "api/api_movie_similar.php";
$title = "Detail Movie (" . $movie_id->original_title . ")";

include_once "links/link_style.php";
include_once "links/link_detail.php";

?>

<?php
if (isset($_GET['id'])) {
  $id_movie = $_GET['id'];
?>
<div class="container" style="padding-top: 35px;">
  <h1><?php echo $movie_id->original_title ?></h1>
  <?php
    echo "<h5>" . $movie_id->tagline . " </h5>";
    ?>

  <div class="line"></div>
  <div class="detail_grp">
    <div class="detail_img">
      <img src="<?php echo $imgurl_2 ?><?php echo $movie_id->poster_path ?>">
      <form method="POST">
        <button type="submit" name="play">Play</button>
      </form>
    </div>

    <?php if (isset($_POST['play'])) : ?>
    <?php if (isset($_SESSION['login'])) : ?>
    <script>
    location = 'watch.php;';
    </script>
    <?php else : ?>
    <script>
    alert("Belum ada akun, silahkan login!!");
    location = 'login.php';
    </script>
    <?php endif; ?>
    <?php endif; ?>


    <div class="detail_desc">
      <table>
        <tr>
          <td>Title</td>
          <td><?php echo $movie_id->original_title ?></td>
        </tr>
        <tr>
          <td>Tagline</td>
          <td> : <?php echo $movie_id->tagline ?></td>
        </tr>
        <tr>
          <td>Genres </td>
          <td> :
            <?php
              foreach ($movie_id->genres as $g) {
                echo '<span>' . $g->name . '</span> ';
              }
              ?>
          </td>
        </tr>

        <tr>
          <td>Overview</td>
          <td> : <?php echo $movie_id->overview ?></td>
        </tr>

        <tr>
          <td>Release Date</td>
          <td> : <?php $rel = date('d F Y', strtotime($movie_id->release_date));
                    echo $rel ?>
          </td>
        </tr>

        <tr>
          <td>Production Companies</td>
          <td> :
            <?php
              foreach ($movie_id->production_companies as $pc) {
                echo $pc->name . " ";
              }
              ?>
          </td>
        </tr>

        <tr>
          <td>Production Countries</td>
          <td> :
            <?php
              foreach ($movie_id->production_countries as $pco) {
                echo $pco->name . "&nbsp;&nbsp;";
              }
              ?>
          </td>
        </tr>

        <tr>
          <td>Budget</td>
          <td> : $
            <?php echo number_format($movie_id->budget) ?>
          </td>
        </tr>

        <tr>
          <td>Vote Average</td>
          <td> : <?php echo $movie_id->vote_average ?></td>
        </tr>

        <tr>
          <td>Vote Count</td>
          <td> : <?php echo $movie_id->vote_count ?></td>
        </tr>
      </table>


      <h2>Trailer</h2>
      <div class="vid">
        <?php

          foreach ($movie_video_id->results as $video) {
            echo '<iframe src="' . "https://www.youtube.com/embed/" . $video->key . '" frameborder="0" allowfullscreen></iframe>';
          }

          ?>
      </div>

    </div>
  </div>

</div>

<?php
} else {
  echo "<h5>Movie tidak ditemukan.</h5>";
}
?>

<?php
include_once "templates/footer.php";
?>