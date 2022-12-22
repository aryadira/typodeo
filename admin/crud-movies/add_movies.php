<?php
include "koneksi.php";

$id_movies = $_GET['id_movies'];

if (isset($_POST['add'])) {
  $query = $connect->query("SELECT * FROM now_playing WHERE id_all= '$id_movies'");

  $fetch = $query->fetch_assoc();

  $id_now_playing = $fetch['id_now_playing'];
  $title     = $fetch['judul_now_playing'];
  $release   = $fetch['release_now_playing'];
  $rate      = $fetch['rate_now_playing'];

  $connect->query("INSERT INTO show_data (id_show, id_movies, judul_movies, release_movies, rate_movies) VALUES
  ('', '$id_now_playing', '$title', '$release', '$rate')");

  header('refresh: 1;url= ../index.php?halaman=now-playing');
}