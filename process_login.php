<?php 

include "koneksi/koneksi.php";

if(isset($_SESSION['login'])) {
  header("location: index.php");
  exit;
}

?>

<!-- PROCESS LOGIN -->
<?php 
  if(isset($_POST['login'])) {

    $username        = $_POST['username'];
    $email           = $_POST['email'];
    $password        = $_POST['password'];

    $result = $connect->query("SELECT * FROM users WHERE username = '$username' AND email = '$email'");

    // Cek username
    if($result->num_rows === 1) {
      
      // Cek password
      $row = $result->fetch_assoc();
      $_SESSION['akun'] = $row;

      if(password_verify($password, $row['password'])){
        // Set SESSION 
        $_SESSION['username'] = $username;
        $_SESSION['login']    = true;

        header('location: index.php');
        exit;
      }
      else {
        $error = true;
        header('refresh: 3;url= login.php');
      }
      
    }
    
  } 

?>