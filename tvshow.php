<?php
  // SESSION
  session_start(); 

  if(!isset($_SESSION['login'])) {
    header("location: login/login.php");
    exit;
  }

  $id_tv = $_GET['id'];
  include "conf/info.php";
  include_once "api/api_tv_id.php";
  include_once "api/api_tv_video_id.php";
  $title = "Watch TV (" . $tv_id->original_name . ")";
  include_once "templates/header.php";
  include_once "links/link_style.php"; 
  include_once "links/link_detail.php";
?>
<?php
if(isset($_GET['id'])) {
  $rel = date('d F Y', strtotime($tv_id->last_air_date));
?>
  <div class="container">

    <h1><?php echo $tv_id->original_name ?></h1>
    <?php
    echo "<h5>Last Air Date</sub> : <span>" . $rel . "</span></h5>";
    ?>

    <div class="line"></div>
    <div class="detail_grp">
      <div class="detail_img">
        <img src="http://image.tmdb.org/t/p/w300<?php echo $tv_id->poster_path ?>" loading="lazy"/>
        <form method="POST">
            <button type="submit" name="play">Play</button>
          </form>
      </div>

      <?php

      if(isset($_POST['play'])) : ?>
      <?php
        // $direktori    = "foto_history/";
        // $nama_foto    = $_FILES[$tv_id->poster_path]['name'];
        // $lokasi       = $_FILES[$tv_id->poster_path]['tmp_name'];
        // $result_file  = move_uploaded_file($lokasi, $direktori. $nama_foto);
        $id_akun = $_SESSION['akun']['id'];
        $query     = $connect->query("SELECT * FROM history WHERE id = '$id_akun'");
        $fetch     = $query->fetch_assoc();

        // time
        date_default_timezone_set('Asia/Jakarta');
        $t    = time( );
        $date = date('M j, Y', $t);

        $connect->query("INSERT INTO history(id_movies, id, id_film, nama_film, foto_film, waktu_film) VALUES('', '$id_akun', '$id_tv', '$tv_id->original_name', '$tv_id->poster_path', '" . $date . "')");
      ?>
        <script>
          location='watch.php?id=<?php echo $id_tv; ?>';
        </script>
      <?php endif; ?>

      <div class="detail_desc">
        <table>
          <tr>
            <td>Title</td> 
            <td> : <?php echo $tv_id->original_name ?></td>
          </tr>
          <tr>
            <td>Status</td> 
            <td> : <?php echo $tv_id->status ?></td>
          </tr>
          <tr>
            <td>Genres </td>
            <td> :
              <?php
                foreach ($tv_id->genres as $g) {
                  echo '<span>' . $g->name . '</span> ';
                }
              ?>
            </td>
          </tr>
            
          <tr>
            <td>Overview</td>
            <td> : <?php echo $tv_id->overview ?></td>
          </tr>

          <tr>
            <td>First Air Date</td>
            <td> : <?php $rel = date('d F Y', strtotime($tv_id->first_air_date)); echo $rel ?></td>
          </tr>

          <tr>
            <td>Production Companies</td>
            <td> :
              <?php
              foreach ($tv_id->production_companies as $pc) {
                echo $pc->name;
              }
              ?>
            </td>
          </tr>

          <tr>
            <td>Original Country</td>
            <td> :
              <?php
              foreach ($tv_id->origin_country as $pco) {
                echo $pco . "&nbsp;&nbsp;";
              }
              ?>
            </td>
          </tr>

          <tr>
            <td>Created by</td>
            <td> :
              <?php
              foreach ($tv_id->created_by as $pco) {
                echo $pco->name . "&nbsp;&nbsp;";
              }
              ?>
            </td>
          </tr>

          <tr>
            <td>Vote Average</td>
            <td> : <?php echo $tv_id->vote_average ?></td>
          </tr>

          <tr>
            <td>Vote Count</td>
            <td> : <?php echo $tv_id->vote_count ?></td>
          </tr>
        </table>  
        
      
          <?php

            foreach ($tv_video_id->results as $video) {
              echo '<iframe src="' . "https://www.youtube.com/embed/" . $video->key . '" frameborder="0" allowfullscreen></iframe>';
            }
            
          ?>
          
      </div>
    </div>
    

    <h3 class="similar_title">Similar TV Show</h3>
    <div class="line"></div>
    <div class="similar_grp">
      <?php
      $count = 4;
      $output = "";
      foreach ($tv_id_similar->results as $sim) {
        $output .= '
          <div class="similar_card">
            <a href="tvshow.php?id=' . $sim->id . '">
              <img src="http://image.tmdb.org/t/p/w300' . $sim->backdrop_path . '" class="similar_img">
              <h5>' . $sim->original_name . '</h5>
            </a>
          </div>';
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