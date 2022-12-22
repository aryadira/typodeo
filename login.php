<?php 
session_start(); 

// Koneksi
require_once("koneksi/koneksi.php");

// Process Login
require_once("process_login.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Typodeo - Login</title>

    <!-- Custom fonts for this template-->
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- CSS -->
    <?php include "links/link_login_register.php" ?>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
  </head>

  <body class="back" style="background-image: url(image/footer-wp.jpg);">

    <a href="landpage.php" style="color: #fff; "><-</a>
    <div class="filter"></div>

    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">

                <div class="col-lg-6 login_menu">
                  <div class="p-5">
                    <div class="text-center">
                      <h3 class="mb-3">Typodeo</h3>
                      <h4 class="mb-4">Login</h4>
                    </div>

                    <?php if( isset($error)) {
                           echo "<div class='alert alert-danger'>  
                                Password Salah Deck
                            </div>";
                          } 
                    ?>
                      
                    <form class="user" method="POST">
                      <div class="form-group">
                        <input
                          type="username"
                          class="form-control"
                          name="username"
                          placeholder="Username"
                          autocomplete="off"
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control"
                          name="email"
                          placeholder="Enter Email Address..."
                          autocomplete="off"
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="password"
                          class="form-control"
                          name="password"
                          placeholder="Password"
                          autocomplete="off"
                        />
                      </div>
                      <button
                        name="login"
                        class="btn-block btn_login"> 
                        Login
                      </button>
                      <hr />
                    </form>
                    <div class="text-center">
                      <a class="small" href="register.php"
                        >Create an Account!</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
  </body>
</html>
