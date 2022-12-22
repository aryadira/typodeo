<?php

session_start();

session_unset();
session_destroy();

echo "<script>alert('Anda telah Logout')</script>";
echo "<script>location='landpage.php';</script>";