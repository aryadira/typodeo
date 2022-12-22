<?php 

include_once "./koneksi/koneksi.php"; 

$query = $connect->query("SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");
$pecah = $query->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
    <?php echo $title ?> -
    <?php echo $sitename ?> |
    <?php echo $tagline ?>
  </title>
  <?php include "links/link_header.php"; ?>
</head>

<body>
  <nav class="nav">

    <div class="group_nav">
      <div class="logo">
        <h2>
            <?php echo $sitename ?>
        </h2>
      </div>
      <ul>
        <a href="index.php">
          <li>Home</li>
        </a>
        <a href="popular.php">
          <li>Popular Movies</li>
        </a>
        <a href="now-playing.php">
          <li>Now Playing Movies</li>
        </a>
        <a href="upcoming.php">
          <li>On Cinema</li>
        </a>
        <a href="tv-series.php">
          <li>TV SERIES</li>
        </a>
      </ul>

      <div class="form_group">

      <!-- Search Form -->
        <form action="search.php" method="get"> 
          <input type="text" name="search" placeholder="Type Title Here" required>
          <select name="channel" required>
            <option value="movie" selected="selected">Movie
            </option>
            <option value="tv">TV Show
            </option>
          </select>
          <button class="btn_search" type="submit">SEARCH</button>
        </form>

        <!-- Account  -->
        <div class="lay">
          <a href="profile.php?id=<?php echo $_SESSION['username']; ?>">
            <div class="profile">
            <img src="foto_profile/<?= $pecah['foto_doang']; ?> "class="profile">
            </div>
          </a>

          <a href="javascript:void(0)" onclick="openNav()" class="hamburger">
            <div class="profile_btn"><i class="ri-menu-line"></i></div>
          </a>
        </div>
        
      </div>

    </div>
      
  </nav>

  <!-- MOBILE -->
  <nav class="nav_mobile" id="myNav">
    <div class="group_nav_mobile">
    <div class="back" onclick="closeNav()"><i class="ri-close-line"></i></div>

      <div class="logo_mobile">
        <h2>
          <?php echo $sitename ?>
        </h2>
      </div>

      <div class="form_group_mobile">

      <!-- Search Form -->
        <form action="search.php" method="get"> 
        <input type="text" name="search" placeholder="Type Title Here" required>
          <select name="channel" required>
            <option value="movie" selected="selected">Movie
            </option>
            <option value="tv">TV Show
            </option>
          </select>
          <button class="btn_search_mobile" type="submit">SEARCH</button>
        </form>

      </div>

      <ul>
        <a href="index.php">
          <li>Home</li>
        </a>
        <a href="popular.php">
          <li>Popular Movies</li>
        </a>
        <a href="now-playing.php">
          <li>Now Playing Movies</li>
        </a>
        <a href="upcoming.php">
          <li>On Cinema</li>
        </a>
        <a href="tv-series.php">
          <li>TV SERIES</li>
        </a>
      </ul>

    </div>
    
  </nav>

  <script>
      function openNav() {
        document.getElementById("myNav").style.width = "100%";
      }

      function closeNav() {
        document.getElementById("myNav").style.width = "0%";
      }
  </script> 
  
