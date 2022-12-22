<?php 

include "koneksi/koneksi.php"; 


?>

<form method="POST">
    <a href="?id=">Input Link</a>
</form>

<?php

if(isset($_GET['id'])) {
 
  echo "<script>alert('Berhasil terinput');</script>";
}

echo date('d F Y, h:i:s A');

?>