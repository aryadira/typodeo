<?php
// SESSION
session_start();

if (!isset($_SESSION['login'])) {
	header("location: login/login.php");
	exit;
}
$input   = $_GET['search'];
$channel = $_GET['channel'];
$search  = $input;
include_once "conf/info.php";
$title   = 'Result Search | ' . $input;
include_once "templates/header.php";
include_once "links/link_style.php";
include_once "links/link_detail.php";
include_once "api/api_search.php";
?>
<div class="container">

  <h4>Result Search: <em><?php echo $input; ?></em></h4>
  <div class="line"></div>

  <div class="similar_grp">
    <?php
		if ($channel == "movie") {
			foreach ($search->results as $results) {
				$title 		= $results->title;
				$id 		  = $results->id;
				$release	= $results->release_date;
				if (!empty($release) && !is_null($release)) {
					$tempyear = explode("-", $release);
					$year 		= $tempyear[0];
					if (!is_null($year)) {
						$title = $title . ' (' . $year . ')';
					}
				}
				$backdrop 	= $results->poster_path;
				if (empty($backdrop) && is_null($backdrop)) {
					$backdrop =  dirname($_SERVER['PHP_SELF']) . '/image/no-gambar.jpg';
				} else {
					$backdrop = 'http://image.tmdb.org/t/p/w300' . $backdrop;
				}
				echo '<div class="similar_card"><a href="movie.php?id=' . $id . '"><img src="' . $backdrop . '" class="similar_img"><h4>' . $title . '</h4></a></div>';
			}
		} elseif ($channel == "tv") {
			foreach ($search->results as $results) {
				$title 		= $results->original_name;
				$id 		= $results->id;
				$release	= $results->first_air_date;
				if (!empty($release) && !is_null($release)) {
					$tempyear 	= explode("-", $release);
					$year 		= $tempyear[0];
					if (!is_null($year)) {
						$title = $title . ' (' . $year . ')';
					}
				}
				$backdrop 	= $results->backdrop_path;
				if (empty($backdrop) && is_null($backdrop)) {
					$backdrop = $pathloc . './image/no-gambar.jpg';
				} else {
					$backdrop = 'http://image.tmdb.org/t/p/w300' . $backdrop;
				}
				echo '<div class="similar_card"><a href="tvshow.php?id=' . $id . '"><img src="' . $backdrop . '" class="similar_img"><h4>' . $title . '</h4></a></div>';
			}
		}
		?>
  </div>
</div>