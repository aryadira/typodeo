<?php 

include "koneksi/koneksi.php";

$id_movie = $_GET['del'];

$query_history = $connect->query("SELECT * FROM history");
$fetch_history = $query_history->fetch_assoc();

?>
<?php 
   if(isset($id_movie)) {
  $connect->query("DELETE FROM history WHERE id_movies = '".$id_movie."'");

  header("refresh:1;");
  echo "<script> location='profile.php?id='; </script>";
}
