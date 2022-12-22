<?php
session_start();

include "../koneksi/koneksi.php";
include_once "../links/link_bootstrap.php";

if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Typoshop</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <?php include_once "nav.php"; ?>
  <!-- /. NAV SIDE  -->
  <div id="page-wrapper">
    <div id="page-inner" style="padding-top:50px;">
      <?php

            if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "users") {
                    include 'users.php';
                } elseif ($_GET['halaman'] == "edit_user") {
                    include "crud/edit_user.php";
                } elseif ($_GET['halaman'] == "hapus_user") {
                    include "crud/hapus_user.php";
                } elseif ($_GET['halaman'] == "now-playing") {
                    include "data-now-playing.php";
                } elseif ($_GET['halaman'] == "logout") {
                    include "logout.php";
                }
            } else {
                include 'dashboard.php';
            }
            ?>

</body>

</html>