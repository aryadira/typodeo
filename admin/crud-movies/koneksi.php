<?php 

$connect = mysqli_connect("localhost", "root", "", "typodeo");

if(!$connect)
{ 
  echo "<script>alert('Error Deck'); </script>";
}

?>
