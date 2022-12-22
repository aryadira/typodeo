<?php
// SESSION

include "conf/info.php";

?>

<?php
include_once "api/api_tv.php";
include_once "api/api_now.php";
include_once "api/api_upcoming.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/landpage.css">
  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <!-- TAILWIND -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- ICON -->
  <title>Typodeo</title>
</head>

<body>
  <!-- NAVIGATION -->
  <nav>
    <div class="group_nav">
      <div class="logo">Typodeo</div>
      <ul class="navlist">
        <a href="login.php">Log In</a>
        <a href="register.php">Sign Up</a>
      </ul>
    </div>
  </nav>

  <section class="section">
    <!-- <div class="filter_section"> -->
    <div class="section_content">
      <!-- <div class="filter_section"> -->
      <div class="group">
        <div class="title">
          Typodeo
        </div>
        <p style="max-width: 500px; color: white;text-shadow: 0 0 50px #000;">Lorem ipsum dolor sit amet consectetur
          adipisicing elit.
          Repudiandae
          consequuntur recusandae eos repellendus sit porro pariatur sint impedit illo nostrum voluptatum, rem nobis,
          corporis, sequi accusamus? Beatae dolor sequi veniam!</p>
      </div>
      <!-- </div> -->

    </div>

    <div class="section_content_card">
      <h2 style="color:#FFF;text-shadow: 0 0 20px #000;">Top Rated Movies</h2>
      <div class="grp" style="margin-bottom: 30px;">
        <?php
        include_once "api/api_toprated.php";
        foreach ($toprated->results as $top) {
          echo '
            <a href="movie_landpage.php?id=' . $top->id . '">
              <div class="card" style="width: 140px;
              white-space: nowrap;
              margin: 3px 5px 10px 6px;
              background-color: rgba(9, 0, 22, 50%);
              backdrop-filter: blur(20px);
              padding: 5px;
              color:white;">
                  <img src="http://image.tmdb.org/t/p/w500' . $top->poster_path . '" loading="lazy">
                  <h4 class="judul">' . $top->original_title . " (" . substr($top->release_date, 0, 4) . ")</h4>
                  <h6 class='date'>Rate : " . $top->vote_average . " |  Vote : " . $top->vote_count . "</h6>
              </div>
            </a>";
        }
        ?>
      </div>
    </div>

    <div class="section_content_card">
      <h2 style="color:#FFF;text-shadow: 0 0 20px #000;">Now Playing Movies</h2>
      <div class="grp" style="margin-bottom: 30px;">
        <?php

        foreach ($nowplaying->results as $p) {
          echo '><a href="movie_landpage.php?id=' . $p->id . '">
          <div class="card" style="width: 140px;
          white-space: nowrap;
          margin: 3px 5px 10px 6px;
          background-color: rgba(9, 0, 22, 50%);
          backdrop-filter: blur(20px);
          padding: 5px;
          color:white;"><img src="' . $imgurl_1 . '' . $p->poster_path . '" loading="lazy"><h4 class="judul">' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4><h6 class='date'>Rate : " . $p->vote_average . " | Vote : " . $p->vote_count . " </h6> <h6 class='release'>Popularity : " . round($p->popularity) . "</h6></div></a>";
        }
        ?>
      </div>
    </div>

    <div class="section_content_card">
      <h2 style="color:#FFF;text-shadow: 0 0 20px #000;">Popular Movies</h2>
      <div class="grp" style="margin-bottom: 30px;">
        <?php
        foreach ($upcoming->results as $p) {
          echo '
          <a href="movie_landpage.php?id=' . $p->id . '">
            <div class="card" style="width: 140px;
            white-space: nowrap;
            margin: 3px 5px 10px 6px;
            background-color: rgba(9, 0, 22, 50%);
            backdrop-filter: blur(20px);
            padding: 5px;
            color:white;">
                <img src="' . $imgurl_1 . '' . $p->poster_path . '" loading="lazy">
                <h4>' . $p->original_title . " (" . substr($p->release_date, 0, 4) . ")</h4>
                <h6>
                Rate : " . $p->vote_average . " | Vote : " . $p->vote_count . " | Popularity : " . round($p->popularity) . "</h6>
                <p class='release'>Release : " . date('d F Y', strtotime($p->release_date)) . "</p>
            </div>
            </a>";
        }
        ?>
      </div>
    </div>

  </section>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
  </script>
</body>

</html>