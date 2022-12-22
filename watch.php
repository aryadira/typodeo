<?php 
  session_start();

  include "koneksi/koneksi.php";
  $id_movie = $_GET['id'];
  include_once "conf/info.php";
  include_once "api/api_movie_id.php";
  include_once "api/api_movie_video_id.php";

  $query = $connect->query("SELECT * FROM users WHERE username ='" . $_SESSION['username'] . "'");
  $pecah = $query->fetch_assoc();

  $query_history = $connect->query("SELECT * FROM history WHERE id_film = '$id_movie'");
  $fetch_history = $query_history->fetch_assoc();
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Anek+Telugu&family=Bebas+Neue&family=Fira+Code:wght@300&family=Inter&family=Oswald:wght@500&family=Playfair+Display&family=Raleway:wght@200;400&family=Roboto&display=swap');

  * 
  {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    overflow: hidden;
  }

  body {
    scroll-behavior: smooth;
    /* background: linear-gradient(to bottom left, rgb(9, 0, 22), #18003a, #25005a); */
  }

  /* VARIABEL */
  :root 
  {
    --primary-white     : #ffffff;
    --secondary-white   : #eeeeee;
    --transparent-black : rgba(23, 0, 56, 40%);
    --primary-black     : #000000;
    --second-black      : #111111;
    --secondary-black   : rgb(9, 0, 22);
    --third-black       : #18003a;
    --fourth-black      : #25005a;
    --primary-purple    : rgb(95, 0, 229);
    --secondary-purple  : rgb(231, 200, 255);
    --primary-green     : rgb(0, 216, 94);
    --secondary-green   : rgb(206, 255, 227);
  }


  .group {
    width: 1000px;
    height: 100vh;
    margin: auto;
    margin-bottom: 30px;
  }

  video {
    margin: 10px 0;
  }
  .greet {
    font-size: 100px;
  }


  .title_video {
    font-size: 30px;
    margin: 4px 0;

  }
  p {
    font-size: 20px;
    font-weight: 100;
    margin: 5px 0 10px 0;
  }

  .release {
    font-size: 12px;
    display: inline;
    background-color: var(--secondary-purple);
    color: var(--primary-purple);
    padding: 5px 10px;
    border-radius: 8px;
  }

  .click {
    max-width: 1000px;
    width: 100%;
    display: flex;
    justify-content: space-between;
    position: absolute;
    bottom: 10;
  }

  .his {
    padding: 10px 20px;
    background-color: var(--fourth-black);
    color: var(--primary-white);
    text-decoration: none;
    border-radius: 20px;
  }

</style>
<?php if($fetch_history['id_film'] == 634649 || $fetch_history['id_film'] == 157336 || $fetch_history['id_film'] == 317442) : ?>
<div class="group">
    <?php 
    $video = $id_movie.".mp4";
    ?>
      <video width="1000px" height="" controls autoplay name="video">
        <source src="./film/<?php echo $video; ?>" type="video/mp4">
      </video>
    <div>
      <h3 class="title_video"><?php echo $fetch_history['nama_film'] ?><h3>
      <p><?php echo $movie_id->tagline?></p>
    </div>
    <p class="release">Release : <?php echo date('d F Y', strtotime($movie_id->release_date)) ?></p>
  
  <div class="click">
    <a href="movie.php?id=<?php echo $fetch_history['id_film']; ?>" class="his">Kembali</a>
    <a href="profile.php?id=<?php echo $_SESSION['username'] ?>" class="his">Riwayat Menonton</a>
  </div>

</div> 
<?php else : ?>
<div class="group">
  <div class="greet">Coming Soon</div>
  <p>Selamat Menonton "<?php echo $fetch_history['nama_film'] ?>"<p>
  <div class="click">
    <a href="movie.php?id=<?php echo $fetch_history['id_film']; ?>" class="his">Kembali</a>
    <a href="profile.php?id=<?php echo $_SESSION['username'] ?>" class="his">Riwayat Menonton</a>
  </div>
</div> 
<?php endif; ?>

<?php //include "templates/footer.php"; ?>