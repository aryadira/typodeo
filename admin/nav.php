<?php

include "../koneksi/koneksi.php";
include_once "../links/link_bootstrap.php";

?>
<nav>
  <ul class="nav" id="main-menu">
    <li style="text-transform:uppercase;">
      <a href="index.php"><i class="ri-dashboard-2-fill"></i></i> Dashboard</a>
      <a href="index.php?halaman=users"><i class="ri-user-fill"></i></i> Data Users</a>
      <a href="index.php?halaman=now-playing"><i class="ri-user-fill"></i></i> Data Film Now Playing</a>
      <a href="index.php?halaman=logout"><i class="ri-logout-box-fill"></i> Logout</a>
    </li>
  </ul>

</nav>