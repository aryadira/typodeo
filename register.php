<?php
session_start();

// Koneksi
require_once("koneksi/koneksi.php");

// PROCESS REGISTER 
require_once("process_register.php");

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

    <title>Typodeo - Register</title>

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
      <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
          <div class="border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-5 d-none"></div>
                <div class="register_menu  col-lg-7">
                  <div class="p-5">
                    <div class="text-center">
                      <h3 class="mb-3">Typodeo</h3>
                      <h5 class="mb-3">Create an Account!</h5>
                    </div>

                    <form class="user" method="POST">
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="nama"
                          name="nama"
                          placeholder="Nama Lengkap"
                          autocomplete="off"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="text"
                          class="form-control"
                          id="username"
                          name="username"
                          placeholder="Username"
                          autocomplete="off"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          name="email"
                          placeholder="Email"
                          autocomplete="off"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="password"
                          class="form-control"
                          id="password"
                          name="password"
                          placeholder="Add the Password ..."
                          autocomplete="off"
                          required
                        />
                      </div>
                      <div class="form-group">
                        <input
                          type="password"
                          class="form-control"
                          id="password_confir"
                          name="password_confir"
                          placeholder="Confirm the Password ..."
                          autocomplete="off"
                          required
                        />
                      </div>
                      <button 
                        type="submit"
                        name="register"
                        class="btn_register btn-block" 
                        style="background-color: #5f00e5;color:#fff;border:none; "
                      >
                        Register Account
                      </button>
                    
                    </form>
                    <hr />
                    <div class="text-center">
                      <a class="small" href="login.php"
                        >Already have an account? Login!</a
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
  </body>
</html>
