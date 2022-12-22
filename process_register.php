<?php 
include "koneksi/koneksi.php";
?>

<!-- PROCESS REGISTER FROM FUNCTIONS -->
<?php 

function register($data) {
  global $connect;
  
  $nama            = htmlspecialchars(strtolower(stripslashes($data['nama'])));
  $username        = htmlspecialchars(strtolower(stripslashes($data['username'])));
  $email           = htmlspecialchars(strtolower(stripslashes($data['email'])));
  $password        = mysqli_real_escape_string($connect, $data['password']);
  $password_confir = mysqli_real_escape_string($connect, $data['password_confir']);

  // Mengecek apakah user sudah ada atau belum
  $result = $connect->query("SELECT * FROM users WHERE username = '$username'");
  
  $fetch = $result->fetch_assoc();

  if($fetch) {
    echo "<script>alert('Username Sudah Ada!');</script>";
    return false;
  }


  // Cek Konfirmasi Password
  if($password != $password_confir) {
    echo "<script>alert('Konfirmasi Password tidak sesuai!');</script>";
    return false;
  }

  // Enkripsi Password 
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Menambahkan user baru
  $connect->query("INSERT INTO users VALUES('', '$nama', '$username', '$email', '$password', '');");
  return mysqli_affected_rows($connect);

}


if(isset($_POST['register'])) {

  if(register($_POST) > 0) {
    echo "<script>alert('Data Berhasil ditambahkan!');</script>";
  } 
  else {
    echo mysqli_error($connect);
  }

}

?>
