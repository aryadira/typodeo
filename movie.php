<?php
// SESSION
session_start();

if (!isset($_SESSION['login'])) {
  header("location: login.php");
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
include_once "links/link_detail.php";

?>

<?php
if (isset($_GET['id'])) {
  $id_movie = $_GET['id'];
?>
<div class="container">
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

    <?php

      if (isset($_POST['play'])) : ?>
    <?php // $direktori    = "foto_history/";
        // $nama_foto    = $_FILES[$movie_id->poster_path]['name'];
        // $lokasi       = $_FILES[$movie_id->poster_path]['tmp_name'];
        // $result_file  = move_uploaded_file($lokasi, $direktori. $nama_foto);
        $id_akun = $_SESSION['akun']['id'];
        $query     = $connect->query("SELECT * FROM history WHERE id = '$id_akun'");
        $fetch     = $query->fetch_assoc();

        // time
        date_default_timezone_set('Asia/Jakarta');
        $t    = time();
        $date = date('M j, Y', $t);
        $video = $id_movie . ".mp4";

        $connect->query("INSERT INTO history(id_movies, id, id_film, nama_film, foto_film, waktu_film, video_film) VALUES('', '$id_akun', '$id_movie', '$movie_id->original_title', '$movie_id->poster_path', '$date', '$video')");
        ?>
    <script>
    location = 'watch.php?id=<?php echo $id_movie; ?>';
    </script>
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

  <h3>Similar Movies</h3>
  <div class="line"></div>
  <div class="similar_grp">
    <?php
      $count = 4;
      $output = "";
      foreach ($movie_similar_id->results as $sim) {
        $output .= '<div class="similar_card"><a href="movie.php?id=' . $sim->id . '"><img src="http://image.tmdb.org/t/p/w300' . $sim->backdrop_path . '" class="similar_img"><h5>' . $sim->title . '</h5></a></div>';
        if ($count <= 0) {
          break;
          $count--;
        }
      }
      echo $output;
      ?>
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